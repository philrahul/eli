<?php
/**
 * banner Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.

$id = 'banner-' . $block['id'];
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
$section_title = get_field('title');
$select_option = get_field('select_option');
$cta_label = get_field('cta_label');
$cta_link = get_field('cta_link');
$hide_cta = get_field('hide_cta');
?>
<!-- banner section -->
<section class="hero-section <?php echo esc_attr(implode(' ',$className)); ?>" id="<?php echo esc_attr($id); ?>">
        <?php if($select_option=='image'){ $upload_background_image = get_field('upload_background_image');?>
        <div class="image-wrap">
            <img src="<?php echo $upload_background_image['url']; ?>" alt="<?php echo $upload_background_image['alt']; ?>" class="banner">
        </div>
        <?php }elseif($select_option=='vimeo_video'){ $add_vimeo_video_id = get_field('add_vimeo_video_id'); ?>
        <div class="video-wrap">
            <iframe src="https://player.vimeo.com/video/<?php echo $add_vimeo_video_id; ?>?autoplay=1&muted=1&background=1&loop=1&color=b61211&title=0&byline=0&portrait=0" width="640" height="360" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <?php }elseif($select_option=='youtube_video'){ $add_youtube_video_id = get_field('add_youtube_video_id'); ?>
        <div class="video-wrap">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/jssO8-5qmag?controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    <?php } ?>
        <div class="container">
            <div class="banner-caption">
                <?php if($section_title){ ?><h1 class="hero-heading"><?php echo $section_title; ?></h1><?php } ?>
                <?php if($hide_cta!=1){ if($cta_link['url'] !='' && $cta_label ){ ?><a href="<?php echo $cta_link['url']; ?>" target="<?php echo $cta_link['target']; ?>" class="btn-custom-evx">
                    <span class="animate__animated wow animate__fadeInLeft"> 
                     <svg xmlns="http://www.w3.org/2000/svg" width="16.414" height="14.296" viewBox="0 0 16.414 14.296">
                        <g id="Group_144" data-name="Group 144" transform="translate(-956.5 -1870.352)">
                            <line id="Line_13" data-name="Line 13" x2="15" transform="translate(956.5 1877.5)" fill="none" stroke="#fff" stroke-width="2"/>
                            <path id="Path_77" data-name="Path 77" d="M10209.494,5644l6.441,6.441-6.441,6.441" transform="translate(-9244.436 -3772.941)" fill="none" stroke="#fff" stroke-width="2"/>
                        </g>
                </svg></span>
                 <?php echo $cta_label; ?></a><?php } }?>
            </div>
        </div>
    </section>
<script>
    function hero_function_<?php echo $block['id']; ?>(){
        //console.log('test');
    }
    window.addEventListener('load', (event) => {
        hero_function_<?php echo $block['id']; ?>();
    });
    <?php if(is_admin()){ ?>
    if (typeof jQuery !== 'undefined') {
        hero_function_<?php echo $block['id']; ?>();
    }
    <?php ;} ?>
</script>
