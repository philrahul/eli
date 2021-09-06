<?php get_header(); ?>
<main id="content">
	<article id="post-0" class="post error404 not-found">
		<!--Display specific message for 410 error code: -->
		<?php if( http_response_code() == 410 ) : ?>
		<h1><?php _e( "This page has been removed.", 'whmbp-theme' ); ?></h1>
		<p><?php _e( "Please try searching below.", 'whmbp-theme' );?></p>
		<?php else: ?>
		<!--Display specific message for 404 error code: -->
		<h1><?php esc_html_e( "404 Page Not Found", 'whmbp-theme' );?></h1>
		<p><?php esc_html_e( "We're sorry, that page cannot be found. Please try searching below.", 'whmbp-theme' );?></p>
		<?php endif ?>
		<?php get_search_form(); ?>
	</article>
</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
