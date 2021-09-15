<?php
/**
 * Products CTA.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.

$id = 'products-cta-' . $block['id'];
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
$image = get_field('image');
?>
<!-- banner section -->
<section class="products-cta <?php echo esc_attr(implode(' ',$className)); ?> wh-section_products position-relative" id="<?php echo esc_attr($id); ?>">
    <div class="content left">
      <img class="" src="/wp-content/themes/eli/assets/banner_fibre_product.jpg" alt="">
    </div>
    <div class="background-color">
      <div class="container">
        <div class="row">
          <div class="ml-auto col-12 col-lg-7">
            <div class="content right">
              <h2>Products</h2>
              <div class="fs-small">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tellus ipsum, interdum a fermentum id, aliquet eu ligula. Nulla fermentum ex ut facilisis egestas. Donec interdum sollicitudin rhoncus. Etiam quam nisi, sodales ut nisi ac, fringilla pellentesque nibh.
              </div>
              <div class="d-flex flex-wrap link-group">
                <h3>Herd</h3>
                <h3>Long Fiber</h3>
                <h3>Short Fiber</h3>
                <h3>Dust</h3>
              </div>
              <a href="#" class="link-more link-more-white fs-small">
                View All Products<img src="./wp-content/themes/eli/assets/img_arrow_white.svg" alt="">
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
<script>
   
</script>
