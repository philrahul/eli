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
            <h2 class="mb-0">
              3x
            </h2>
            <div class="fs-normal">
              Lorem ipsum dolor sit amet.
            </div>
            <div class="row justify-content-between">
              <div class="col-12">
                <div class="gradient-line-top position-relative w-100"></div>
              </div>
              <div class="col-5 text-left">
                <h3 class="mb-0">
                  90%
                </h3>
                <div class="fs-normal">
                  Lorem ipsum dolor sit amet.
                </div>
              </div>
              <div class="col-5 text-right">
                <h3 class="mb-0">
                  18%
                </h3>
                <div class="fs-normal">
                  Lorem ipsum dolor sit amet.
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-7">
          <div class="content right">
            <h2>
              Opportunities of Hemp
            </h2>
            <div class="fs-normal">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tellus ipsum, interdum a fermentum id, aliquet eu ligula. Nulla fermentum ex ut facilisis egestas. Donec interdum sollicitudin rhoncus. Etiam quam nisi, sodales ut nisi ac, fringilla pellentesque nibh.
              <br><br><br>
              Donec interdum sollicitudin rhoncus. Etiam quam nisi, sodales ut nisi ac, fringilla pellentesque nibh.
            </div>
            <a href="#" class="link-more fs-small">
              Learn More <img src="./wp-content/themes/eli/assets/infg_arrow_right.svg" alt="">
            </a>
          </div>
        </div>
      </div>
    </div>
</section>
<script>
   
</script>
