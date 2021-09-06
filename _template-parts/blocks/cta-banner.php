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
$description = get_field('description');
$link = get_field('link');
$background_image = get_field('background_image');

?>
<!-- banner section -->
<section class="banner-section <?php echo esc_attr(implode(' ',$className)); ?> wh-section wh-section__banner position-relative" id="<?php echo esc_attr($id); ?>">
  <?php if($background_image):?>
  <div class="backgound-image border-bottom-round wh-section__banner--backgound-image">
    <img src="<?php echo $background_image['url'];?>" alt="<?php echo $background_image['alt'];?>">
  </div>
  <?php endif;?>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="wh-section__banner--content">
          <h1>
            <?php echo $title;?>
          </h1>
          <div class="fs-small">
           <?php echo $description;?>
          </div>
          <?php if($link):
          $link_title = $link['title'];
          $link_url = $link['url'];
          echo '<a href="'.$link_url.'" class="link-more link-more-white fs-small">
            '.$link_title.'
          </a>';
           endif;?>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
   
</script>
