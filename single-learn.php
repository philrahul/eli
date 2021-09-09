<?php
/*A template for displaying Single Learn Posts*/
get_header();?>
<div class="container">
    <main id="content" class="single-learn-post">
        <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <h1><?php the_title('<h1 class="learn-title">','</h1>'); ?></h1>
            <div class="author-details-single">
                <div class="published-details">
                    <p class="author_details">
                        <span class="author_image">
                        <?php if($avatar = get_avatar(get_the_author_meta('ID'),32)): ?>
                        <?php echo $avatar; ?>
                        <?php else: ?>
                            <img src="/images/no-image-default.jpg" alt="dummy_image" >
                        <?php endif; ?>
                        </span>by <strong><?php the_author() ?></strong> on <strong><?php echo get_the_date(); ?></strong>
                        <span class="social-share-details">
                    <a title="Click to share this post on Twitter" href="http://twitter.com/intent/tweet?text=Currently reading <?php the_title();?>&url=<?php the_permalink();?>" target="_blank" rel="noopener noreferrer">
                    <svg style="fill: #3ea1f2;">
                            <use href="<?php bloginfo('template_url'); ?>/_images/sprite.svg#icon-twitter"></use>
                        </svg>
                    </a>
                    <a href="https://www.facebook.com/sharer?u=<?php the_permalink();?>&t=<?php the_title();?>" target="_blank" rel="noopener noreferrer">               
                    <svg style="fill: #1978f3;">
                            <use href="<?php bloginfo('template_url'); ?>/_images/sprite.svg#icon-facebook"></use>
                        </svg>
                    </a>
                    <a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink() ?>&title=<?php the_title(); ?>&summary=&source=<?php bloginfo('name'); ?>" target="_new" rel="noopener noreferrer">
                        <svg style="fill: #2767b1;">
                            <use href="<?php bloginfo('template_url'); ?>/_images/sprite.svg#icon-linkedin2"></use>
                        </svg>
                    </a>
                </span>  
                    </p>
                    
                </div>
            
            </div>
            <div class="entry-content">
                <?php the_post_thumbnail('post-thumbnail', ['class' => 'learn-post-thumbnail', 'title' => 'Featured image']);?>
                <div class="row align-center mt-5">
                    <?php the_content();?>
                </div>
            </div>
        </article>
        <?php endwhile; ?>
        <div class="form row">
        <?php echo get_field('form_title', 'option');?>
        <?php echo get_field('form_description', 'option');?>
        </div>
    </main>
</div>
<?php get_footer();?>