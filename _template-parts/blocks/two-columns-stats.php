<?php

?><?php
/**
 * CTA with two columns with stats Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.

$id = 'cta-two-columns-with-stats' . $block['id'];
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
$description = get_field('description');
$link = get_field('link');
?>
<!-- banner section -->
<section class="two-columns-section-with-stats- <?php echo esc_attr(implode(' ',$className)); ?> wh-section wh-section_two-columns-stats" id="<?php echo esc_attr($id); ?>">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-5">
          <div class="content left">
            <?php if(get_field('left_main_heading')):?>
            <h2 class="mb-0">
             <?php echo get_field('left_main_heading');?>
            </h2>
            <?php endif;
                if(get_field('left_main_description')):?>
            <div class="fs-normal">
                <?php echo get_field('left_main_description');?>
            </div>
            <?php endif;?>
            <div class="row justify-content-between">
              <div class="col-12">
                <div class="gradient-line-top position-relative w-100"></div>
              </div>
              <div class="col-12 col-lg-6 col-xl-5 text-left">
              <?php if(get_field('inner_sub-heading_left')):?>
                <h3 class="mb-0">
                    <?php echo get_field('inner_sub-heading_left');?>
                </h3>
                <?php endif;
                if(get_field('inner_description_left')):?>
                <div class="fs-normal">
                    <?php echo get_field('inner_description_left');?>
                </div>
                <?php endif;?>
              </div>
              <div class="col-12 col-lg-6 col-xl-5 text-right">
                <?php if(get_field('inner_sub-heading_right')):?>
                <h3 class="mb-0">
                    <?php echo get_field('inner_sub-heading_right');?>
                </h3>
                <?php endif;
                if(get_field('inner_description_right')):?>
                <div class="fs-normal">
                <?php echo get_field('inner_description_right');?>
                </div>
                <?php endif;?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-7">
          <div class="content right">
            <?php  if(get_field('right_main_heading')):?>
            <h2>
            <?php echo get_field('right_main_heading');?>
            </h2>
            <?php endif;
                if(get_field('right_main_description')):?>
            <div class="fs-normal">
            <?php echo get_field('right_main_description');?>
            </div>
            <?php endif;
                $link = get_field('link');
                if($link):?>
            <a href="<?php echo $link['url'];?>" class="link-more fs-small">
            <?php echo $link['title'];?> <img src="./wp-content/themes/eli/assets/infg_arrow_right.svg" alt="">
            </a>
            <?php endif;?>
          </div>
        </div>
      </div>
    </div>
</section>
<script>
   
</script>
