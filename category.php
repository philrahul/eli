<?php get_header(); ?>
<main id="content" class="category-page">
		<header>
			<h1 class="entry-title">
				<?php echo single_cat_title( __( '', 'whmbp-theme' ) ); ?> <?php _e( 'Articles', 'whmbp-theme' ); ?>
			</h1>
		</header>
    <ul>
  		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    		<li id="post-<?php the_ID(); ?>" class="clickable-list">
    				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <?php the_excerpt(); ?>
        </li>
  		<?php endwhile; ?>
    </ul>
		<footer>
			<?php whmbp_pagination($pages = '', $range = 2,"Posts"); ?>
		</footer>
</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
