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
$blogs = get_field('blogs');
?>
<!-- banner section -->
<section class="blog-list <?php echo esc_attr(implode(' ',$className)); ?> wh-section_blog-list" id="<?php echo esc_attr($id); ?>">
<!-- <?php 
if( $blogs ): ?>
    <div class="container">
      <div class="row">
        <?php foreach( $blogs as $post ): 
            // Setup this post for WP functions (variable must be named $post).
            setup_postdata($post); ?>
            <div class="col-md-4">
            <div class="card">
              <div class="card-body">
              <?php echo get_the_post_thumbnail( $post->ID, 'thumbnail', array( 'class' => 'card-img-top' ) );
                    echo '<p class="blog-date">'.get_the_date().'</p>';
                ?>
                <h3><?php the_title(); ?></h3>
                <a href="<?php the_permalink(); ?>">Read More <img src="./wp-content/themes/eli/assets/infg_arrow_right.svg" alt=""></a>
              </div>
            </div>
                </div>
        <?php endforeach; ?>
        </ul>
        <?php 
        // Reset the global post object so that the rest of the page works correctly.
        wp_reset_postdata(); ?>
      </div>
    </div>
<?php endif; ?> -->
  <div class="container">
    <div class="row">
      <div class="col-12 cards-wrapper">
          <div class="row">
            <div class="col-lg-4 col-md-6">
              <div class="card">
                <div class="card-image-wrapper">
                  <img src="./wp-content/themes/eli/assets/banner_fibre_product.jpg" alt="">
                </div>
                <div class="card-content-wrap">
                  <p class="card-date">May 13, 2020</p>
                  <p class="card-detail">News or blog headline here that could go two lines.</p>
                  <a href="#" class="link-more fs-small">
                    Read More<img src="./wp-content/themes/eli/assets/img_arrow_right.svg" alt="">
                  </a>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="card">
                <div class="card-image-wrapper">
                  <img src="./wp-content/themes/eli/assets/banner_fibre_product.jpg" alt="">
                </div>
                <div class="card-content-wrap">
                  <p class="card-date">May 13, 2020</p>
                  <p class="card-detail">News or blog headline here that could go two lines.</p>
                  <a href="#" class="link-more fs-small">
                    Read More<img src="./wp-content/themes/eli/assets/img_arrow_right.svg" alt="">
                  </a>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="card">
                <div class="card-image-wrapper">
                  <img src="./wp-content/themes/eli/assets/banner_fibre_product.jpg" alt="">
                </div>
                <div class="card-content-wrap">
                  <p class="card-date">May 13, 2020</p>
                  <p class="card-detail">News or blog headline here that could go two lines.</p>
                  <a href="#" class="link-more fs-small">
                    Read More<img src="./wp-content/themes/eli/assets/img_arrow_right.svg" alt="">
                  </a>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>

</section>
<script>
   
</script>
