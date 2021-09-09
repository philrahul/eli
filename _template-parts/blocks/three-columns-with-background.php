<?php
/**
 * Three columns with background.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.

$id = 'three-columns-background-' . $block['id'];
if( !empty($block['anchor']) ) {
  $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = [];
if( !empty($block['className']) ) {
  $className[] =  $block['className'];
}
if( !empty($block['align']) ) {
  $className[] = 'align' . $block['align'];
}

if(!$block['data']['hh_heading_tag']){
  $block['data']['hh_heading_tag'] = 'h2';
};

$title = get_field('title');
?>
<!-- banner section -->
<section class="three-columns-background- <?php echo esc_attr(implode(' ',$className)); ?>" id="<?php echo esc_attr($id); ?>">
        
<?php
// Check rows exists.
if( have_rows('columns') ):

    // Loop through rows.
    while( have_rows('columns') ) : the_row();

        // Load sub field value.
        $title = get_sub_field('title');
        $sub_title = get_sub_field('sub_title');
        $email = get_sub_field('email');
        $linked_in = get_sub_field('linked_in');
        // Do something...

    // End loop.
    endwhile;

// No value.
else :
    // Do something...
endif;
?>
</section>
<script>
   
</script>
