<?php
/**
 * Form aside text.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.

$id = 'form-aside-text-' . $block['id'];
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
$form_shortcode = get_field('form_shortcode');
?>
<!-- banner section -->
<section class="form-aside-text <?php echo esc_attr(implode(' ',$className)); ?>" id="<?php echo esc_attr($id); ?>">
  
<div class="row">
  <div class="col-md-6">
    <?php if($title):
    echo '<h2>'.$title.'</h2>';
    endif;
    if($description):
    echo '<div class="fs-small">'.$description.'</div>';
    endif;
    ?>
  </div>
  <div class="col-md-6">
    <?php
    if($form_shortcode):?>
    <div class="contact-form">
      <?php echo $form_shortcode;?>
    </div>
    <?php endif;?>
  </div>
</div>
 
  
</section>  
<script>
   
</script>
