<?php
	/*
	* Generate a unique ID for each form and a string containing an aria-label if
	* one was passed to get_search_form() in the args array.
	* Taken from twentytwenty theme.
	*/
    $unique_id = esc_attr( uniqid( 'search-form-' ) );
    $aria_label = ! empty( $args['label'] ) ? 'aria-label="' . esc_attr( $args['label'] ) . '"' : '';
?>
<div class="header-search-container">
  <div class="search-icon">
    <button type="button" onclick="openSearchModal();"><img width="20" height="20" src="<?php bloginfo('template_url') ?>/_images/search-icon.svg" alt="<?php esc_attr_e( 'Search', 'whmbp-theme' ); ?>"></button>
  </div>
  <div class="search-modal-container" id="<?php echo 'container-'.$unique_id; ?>">
    <button type="button" onclick="closeSearchModal();;" class="search-modal-background"><span class="screen-reader-text"><?php _e( 'Close search', 'whmbp-theme' ); ?></span></button>
    <div class="search-modal">
      <div class="search-form-container">
        <form <?php echo $aria_label; ?> method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        	<label for="<?php echo esc_attr( $unique_id ); ?>">
        		<span class="screen-reader-text">
        			<?php _e( 'Search for:', 'whmbp-theme' );  ?>
        		</span>
        		<input type="search" id="<?php echo esc_attr( $unique_id ); ?>" class="search-field" placeholder="<?php echo esc_attr_x( 'Search&hellip;', 'placeholder', 'whmbp-theme' ); ?>" value="<?php echo get_search_query(); ?>" name="s" required />
        	</label>
            <input class="screen-reader-text" type="submit" value="<?php esc_attr_e( 'Submit Search', 'whmbp-theme' ); ?>">
        </form>
      </div>
      <div class="search-close-modal">
      <button type="button" onclick="closeSearchModal();"><img width="20" height="20" src="<?php bloginfo('template_url') ?>/_images/close-icon.svg" alt=""><span class="screen-reader-text"><?php _e( 'Close search', 'whmbp-theme' ); ?></span></button>
      </div>
    </div>
  </div>
</div>
<script>
  function openSearchModal(){
    jQuery('#<?php echo 'container-'.$unique_id; ?>').addClass('open');
    setTimeout(function(){
      jQuery('#<?php echo esc_attr( $unique_id ); ?>').focus();
    },400);
  }
  function closeSearchModal(){
    jQuery('#<?php echo 'container-'.$unique_id; ?>').removeClass('open');
  }
</script>
