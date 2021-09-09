<?php get_header(); ?>
<main id="content" class="category-page">
		<!--<header>
			<h1 class="entry-title"><?php single_post_title();; ?></h1>
		</header>-->
		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>">
			<header>
				<h2><?php the_title(); ?></h2>
			</header>
			<?php the_excerpt(); ?>
			<p><a href="<?php the_permalink(); ?>"><?php _e( 'View', 'whmbp-theme' ); ?> <span class="screen-reader-text"><?php the_title(); ?></span></a></p>
        </article>
		<?php endwhile; ?>
		<footer>
			<?php whmbp_pagination($pages = '', $range = 2,"Posts"); ?>
		</footer>
</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>