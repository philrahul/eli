<?php
/***************************************************************
This file makes the feature image required.
You can also provide a list of post types that do not require a featured image.
Add the min width/height details below for the minimum size message below the featured image.
A "Hide Featured Image" checkbox is also added below the featured image.
hide_featured_image() will return true if the checked. you can also pass post id or post object to this function
***************************************************************/

define("MINIMUM_SIZE", [
    'width' => 0, // 0 means no min width required
    'height' => 0 // 0 means no min height required
]);
define("DISABLED_FOR_POST_TYPES", [ // list the post types that should not apply this feature
    //'post-type-slug',
]);


add_action( 'transition_post_status', 'wh_guard', 10, 3 );
add_action( 'admin_enqueue_scripts', 'wh_enqueue_edit_screen_js' );
add_action( 'init', 'wh_register_meta' );
add_filter( 'admin_post_thumbnail_html', 'wh_featured_image_display_settings', 10, 2 );
add_action( 'save_post', 'wh_save_featured_image_cb', 10, 3 );


function wh_guard( $new_status, $old_status, $post ) {
    if ( isset($_GET['_locale']) && $_GET['_locale'] == 'user' ) {
        return; //doesn't work with gutenberg so bypass. gutenberg is managed via js
    }
    if ( $new_status === 'publish' && wh_should_stop_post_publishing( $post ) ) {
        // transition_post_status comes after the post has changed statuses, so we must roll back here
        // because publish->publish->... is an infinite loop, move a published post without an image to draft
        if ( $old_status == 'publish' ) {
            $old_status = 'draft';
        }
        $post->post_status = $old_status;
        wp_update_post( $post );
        wp_die( 'You cannot publish without a featured image.' );
    }
}

function wh_enqueue_edit_screen_js( $hook ) {
    global $post;
    if ( $hook !== 'post.php' && $hook !== 'post-new.php' ) {
        return;
    }

    if ( wh_is_supported_post_type( $post ) ) {
        wp_register_script( 'wh-admin-js', get_template_directory_uri().'/_js/require-featured-image-on-edit.js', array( 'jquery', 'wp-element', 'wp-hooks' ) );
        wp_enqueue_script( 'wh-admin-js' );

        wp_localize_script(
            'wh-admin-js',
            'passedFromServer',
            array(
                'jsMsg' => wh_minimum_size_message(),
                'jsWarningHtml' => __( '<strong>This post has no featured image.</strong> Please set one. You need to set a featured image before publishing.', 'wh' ),
                'width' => MINIMUM_SIZE['width'],
                'height' => MINIMUM_SIZE['height'],
            )
        );
    }
}

// register a meta field for gutenberg editor
function wh_register_meta() {
    register_meta( 'post', 'disable_featured_image', array(
        'show_in_rest' => true,
        'single' => true,
        'type' => 'boolean',
    ) );
}

// adds checkbox and instructions for classic editor
function wh_featured_image_display_settings( $content, $post_id ) {
	$field_id    = 'disable_featured_image';
    $field_value = get_post_meta( $post_id, $field_id, true );
    $field_label = "Hide featured image";
	$field_text  = "Checking this will hide the featured image in frontend";
	$field_state = checked( $field_value, 1, false);
    $field = '<strong>'.wh_minimum_size_message().'</strong><hr>';
    $field .= '<p><label for="'.$field_id.'"><strong>'.$field_label.'</strong> <input type="checkbox" name="'.$field_id.'" id="'.$field_id.'" value="'.$field_value.'" '.$field_state.'></label><br>'.$field_text.'</p>';
    $field .= '<input type="hidden" name="is_gutenberg" value="false">';
	return $content .= $field;
}

// updates checkbox state in db
function wh_save_featured_image_cb( $post_ID, $post, $update ) {
    if(!wh_is_gutenberg_post()){
        $field_id    = 'disable_featured_image';
        $field_value = isset( $_REQUEST[ $field_id ] ) ? 1 : 0;
        update_post_meta( $post_ID, $field_id, $field_value );
    }
}

//check if featured image is set to be hidden
function hide_featured_image($post = 0){
    $post = get_post( $post );
    return get_post_meta($post->ID, 'disable_featured_image', true) == true;
}

/**
 * These are helpers that aren't ever registered with events
 */

function wh_is_gutenberg_post() {
    return !(isset($_REQUEST['is_gutenberg']) && $_REQUEST['is_gutenberg'] == "false");
}

function wh_should_stop_post_publishing( $post ) {
    $is_watched_post_type = wh_is_supported_post_type( $post );

    if ( $is_watched_post_type ) {
        $image_id = get_post_thumbnail_id( $post->ID );
        if ( $image_id === null ) {
            return true;
        }
    }
    return false;
}

function wh_is_supported_post_type( $post ) {
    return !in_array( $post->post_type, DISABLED_FOR_POST_TYPES );
}

function wh_minimum_size_message(){
    $msg = '';
    if(MINIMUM_SIZE['width'] || MINIMUM_SIZE['height']){
        $msg .= "Please use an image with a minimum of ";
        if(MINIMUM_SIZE['width'] && MINIMUM_SIZE['height']){
            $msg .= MINIMUM_SIZE['width'] ."px width and ". MINIMUM_SIZE['height'] ."px height.";
        }else if(MINIMUM_SIZE['width']){
            $msg .= MINIMUM_SIZE['width'] ."px width.";
        }else if(MINIMUM_SIZE['height']){
            $msg .= MINIMUM_SIZE['height'] ."px height.";
        }
    }
    return $msg;
}