<?php
/**
 * Image aside text with background Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.

$id = 'image-aside-text-background-' . $block['id'];
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
$image = get_field('image');
?>
<!-- banner section -->
<section class="image-aside-text-background-section <?php echo esc_attr(implode(' ',$className)); ?> wh-section wh-section_image-aside-text-background" id="<?php echo esc_attr($id); ?>">
    <div class="background-image backgroung-image-right background-image-small">
      <img src="./wp-content/themes/eli/assets/img_chemical_bond.svg" alt="">
    </div>
</section>
<script>
  
</script>
