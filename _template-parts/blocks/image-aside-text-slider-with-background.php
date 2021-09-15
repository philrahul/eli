<?php
/**
 * Image aside text Slider with Background Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.

$id = 'image-aside-text-slider-bg' . $block['id'];
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
}
$title = get_field('title');
?>

<?php
// if( have_rows('slide') ):
//     while( have_rows('slide') ) : the_row();
//         $title = get_sub_field('title');
//         $description = get_sub_field('description');
//         $image = get_sub_field('image');
//         $link = get_sub_field('link');
//     endwhile;
//   endif;
?>

<!-- banner section -->
<section class="image-aside-text-slider-bg hs-section wh-section wh-section_image-aside-text-slider-bg <?php echo esc_attr(implode(' ',$className)); ?>" id="<?php echo esc_attr($id); ?>">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="hs-scroll overflow-hidden w-100">
          <div class="d-flex w-100">
            <div class="hs-item slider-item w-100">
              <div class="row flex-column flex-md-row">
                <div class="content left col-12 col-md-5 d-flex flex-column justify-content-center ">
                  <h2>
                    Farmer-focused
                  </h2>
                  <div class="fs-small">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tellus ipsum, interdum a fermentum id, aliquet eu ligula. Nulla fermentum ex ut facilisis egestas. Donec interdum sollicitudin rhoncus. Etiam quam nisi, sodales ut nisi ac, fringilla pellentesque nibh. Donec interdum sollicitudin rhoncus. Etiam quam nisi, sodales ut nisi ac, fringilla pellentesque nibh.
                  </div>
                  <a href="#" class="link-more fs-small">
                    Learn More
                    <img src="./wp-content/themes/eli/assets/img_arrow_right.svg" alt="">
                  </a>
                </div>
                <div class="content right col-12 col-md-7 ml-auto">
                  <img src="./wp-content/themes/eli/assets/img_farmer_focused.jpg" alt="">
                </div>
              </div>
            </div>
            <div class="hs-item slider-item w-100">
              <div class="row flex-column flex-md-row">
                <div class="content left col-12 col-md-5 d-flex flex-column justify-content-center ">
                  <h2>
                    Farmer-focused
                  </h2>
                  <div class="fs-small">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tellus ipsum, interdum a fermentum id, aliquet eu ligula. Nulla fermentum ex ut facilisis egestas. Donec interdum sollicitudin rhoncus. Etiam quam nisi, sodales ut nisi ac, fringilla pellentesque nibh. Donec interdum sollicitudin rhoncus. Etiam quam nisi, sodales ut nisi ac, fringilla pellentesque nibh.
                  </div>
                  <a href="#" class="link-more fs-small">
                    Learn More
                    <img src="./wp-content/themes/eli/assets/img_arrow_right.svg" alt="">
                  </a>
                </div>
                <div class="content right col-12 col-md-7 ml-auto">
                  <img src="./wp-content/themes/eli/assets/img_farmer_focused.jpg" alt="">
                </div>
              </div>
            </div>
            <div class="hs-item slider-item w-100">
              <div class="row flex-column flex-md-row">
                <div class="content left col-12 col-md-5 d-flex flex-column justify-content-center ">
                  <h2>
                    Farmer-focused
                  </h2>
                  <div class="fs-small">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tellus ipsum, interdum a fermentum id, aliquet eu ligula. Nulla fermentum ex ut facilisis egestas. Donec interdum sollicitudin rhoncus. Etiam quam nisi, sodales ut nisi ac, fringilla pellentesque nibh. Donec interdum sollicitudin rhoncus. Etiam quam nisi, sodales ut nisi ac, fringilla pellentesque nibh.
                  </div>
                  <a href="#" class="link-more fs-small">
                    Learn More
                    <img src="./wp-content/themes/eli/assets/img_arrow_right.svg" alt="">
                  </a>
                </div>
                <div class="content right col-12 col-md-7 ml-auto">
                  <img src="./wp-content/themes/eli/assets/img_farmer_focused.jpg" alt="">
                </div>
              </div>
            </div>
            <div class="hs-item slider-item w-100">
              <div class="row flex-column flex-md-row">
                <div class="content left col-12 col-md-5 d-flex flex-column justify-content-center ">
                  <h2>
                    Farmer-focused
                  </h2>
                  <div class="fs-small">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tellus ipsum, interdum a fermentum id, aliquet eu ligula. Nulla fermentum ex ut facilisis egestas. Donec interdum sollicitudin rhoncus. Etiam quam nisi, sodales ut nisi ac, fringilla pellentesque nibh. Donec interdum sollicitudin rhoncus. Etiam quam nisi, sodales ut nisi ac, fringilla pellentesque nibh.
                  </div>
                  <a href="#" class="link-more fs-small">
                    Learn More
                    <img src="./wp-content/themes/eli/assets/img_arrow_right.svg" alt="">
                  </a>
                </div>
                <div class="content right col-12 col-md-7 ml-auto">
                  <img src="./wp-content/themes/eli/assets/img_farmer_focused.jpg" alt="">
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
      <div class="col-12 col-padding">
        <div class="hs-dots slider-dots slider-line d-flex position-relative w-100">
          <div class="hs-dot slider-dot active"></div>
          <div class="hs-dot slider-dot"></div>
          <div class="hs-dot slider-dot"></div>
          <div class="hs-dot slider-dot"></div>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
</script>
