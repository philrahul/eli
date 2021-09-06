<?php
/**
 * CTA Banner Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.

$id = 'cta-banner-' . $block['id'];
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
$sub_title = get_field('sub_title');
$description = get_field('description');
$link = get_field('link');
$background_image = get_field('background_image');

?>
<!-- banner section -->
<section class="banner-section <?php echo esc_attr(implode(' ',$className)); ?> wh-section wh-section__banner position-relative" id="<?php echo esc_attr($id); ?>">
  <div class="backgound-image border-bottom-round wh-section__banner--backgound-image">
    <img src="./wp-content/themes/eli/assets/banner_homepage.jpg" alt="">
  </div>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="wh-section__banner--content">
          <h1>
            Industrial Hemp
          </h1>
          <p class="fs-small">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tellus ipsum, interdum a fermentum id, aliquet eu ligula. Nulla fermentum ex ut facilisis egestas. Donec interdum sollicitudin rhoncus. Etiam quam nisi, sodales ut nisi ac, fringilla pellentesque nibh.
          </p>
          <a href="#" class="link-more link-more-white fs-small">
            Learn More
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
   
</script>
