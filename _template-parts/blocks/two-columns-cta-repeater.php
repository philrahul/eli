<?php
/**
 * Two columns CTA Repeater Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.

$id = 'two-columns-cta-repeater' . $block['id'];
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
?>
<!-- banner section -->
<section class="two-columns-cta-repeater-section <?php echo esc_attr(implode(' ',$className)); ?>" id="<?php echo esc_attr($id); ?>">
<?php
if( have_rows('cta') ):?>
<div class="container">
  <div class="row">
    <?php
    $j = 0;
    while( have_rows('cta') ) : the_row();
      $title = get_sub_field('title');
      $description = get_sub_field('description');
      $image = get_sub_field('image');
      $link = get_sub_field('link'); 
      if($j%2==0):
      ?>
      <div class="col-md-6">
        <?php if($title):?>
          <h2><?php echo $title;?></h2>
        <?php endif;?>
        <?php if($description):
          echo '<div class="fs-small">'.$description.'</div>';
        endif;
        if($link):?>
          <a href="<?php echo $link['url'];?>" class="link-more fs-small">
          <?php echo $link['title'];?> <img src="./wp-content/themes/eli/assets/infg_arrow_right.svg" alt="">
          </a>
          <?php endif;?>
      </div>
      <div class="col-md-6">
        <?php if($image):?>
            <img src = "<?php echo $image['url'];?>" alt="<?php echo $image['alt'];?>">
        <?php endif;?>
      </div>
      <?php else:?>
      <div class="col-md-6">
        <?php if($image):?>
            <img src = "<?php echo $image['url'];?>" alt="<?php echo $image['alt'];?>">
        <?php endif;?>
      </div>
      <div class="col-md-6">
        <?php if($title):?>
          <h2><?php echo $title;?></h2>
        <?php endif;?>
        <?php if($description):
          echo '<div class="fs-small">'.$description.'</div>';
        endif;
        if($link):?>
          <a href="<?php echo $link['url'];?>" class="link-more fs-small">
          <?php echo $link['title'];?> <img src="./wp-content/themes/eli/assets/infg_arrow_right.svg" alt="">
          </a>
          <?php endif;?>
      </div>
    <?php endif;
    $j++;
    endwhile;?>
   </div>
</div>
  <?php endif;
?>       
</section>
<script>
  
</script>
