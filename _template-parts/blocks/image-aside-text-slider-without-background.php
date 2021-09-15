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
            <?php
            if( have_rows('slide') ):
            while( have_rows('slide') ) : the_row();
            $title = get_sub_field('title');
            $description = get_sub_field('description');
            $image = get_sub_field('image');
            $link = get_sub_field('link');
            ?>
            <div class="hs-item slider-item w-100">
              <div class="row flex-column flex-md-row">
                <div class="content left col-12 col-md-5 d-flex flex-column justify-content-center ">
                  <?php if($title):echo'<h2>'.$title.'</h2>';endif;
                  if($description):echo'<div class="fs-small">'.$description.'</div>';endif;
                  if($link):?>
                  <a href="<?php echo $link['url'];?>" class="link-more fs-small">
                  <?php echo $link['title'];?>
                    <img src="./wp-content/themes/eli/assets/img_arrow_right.svg" alt="">
                  </a>
                  <?php endif;?>
                </div>
                <?php if($image):?>
                <div class="content right col-12 col-md-7 ml-auto">
                  <img src="<?php echo $image['url'];?>" alt="">
                </div>
                <?php endif;?>
              </div>
            </div>
            <?php endwhile; endif;?>
          </div>
        </div>
      </div>
      <div class="col-12 col-padding">
      <?php if( have_rows('slide') ):
        $i =1;?>
        <div class="hs-dots slider-dots slider-line d-flex position-relative w-100">
       <?php while( have_rows('slide') ) : the_row();?>
          <div class="hs-dot slider-dot <?php if ($i==1) echo 'active';?>"></div>
        <?php $i++; endwhile;?>
        </div>
        <?php endif;?>
      </div>
    </div>
  </div>
</section>
<script>
</script>
