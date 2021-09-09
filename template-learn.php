<?php
/* Template Name: Learn 
A template for displaying all posts of learn type
*/
get_header();?>
<div class="row posts-banner learn-more-banner">
    <div class="col-md-6 bg-darkgreen">
        <h2>Branding, Marketing and Advertising in This Economic Crisis</h2>

    </div>
    <div class="col-md-6">
        <img src="<?php echo get_template_directory_uri();?>/assets/img_farm.jpg" alt="">
    </div>
</div>
<div class="container">
<div class="row all-learn-posts">
    <div class="col-md-9">
        <?php $args = array(  
                'post_type' => 'learn',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'orderby' => 'date',
                'order'   => 'DESC',
            );
            $loop = new WP_Query( $args );             
            while ( $loop->have_posts() ) : $loop->the_post();?> 
                    <div class="single-learn-loop">
                        <div class="single-learn-img">
                            <?php the_post_thumbnail();?>
                        </div>
                        <div class="single-learn-title">
                            <a href="<?php the_permalink();?>">   
                                <?php the_title('<h4 class="learn post_title">','</h4>');?>
                            </a>
                            <p class="author_details">
                                <span class="author_image">
                                <?php if($avatar = get_avatar(get_the_author_meta('ID'),32)): ?>
                                <?php echo $avatar; ?>
                                <?php else: ?>
                                    <img src="/images/no-image-default.jpg" alt="dummy_image" >
                                <?php endif; ?>
                                </span>by <strong><?php the_author() ?></strong> on <strong><?php echo get_the_date(); ?></strong>
                            </p>
                        </div>
                    </div>
            <?php endwhile;
            wp_reset_postdata(); 
            ?>
    </div>
    <div class="col-md-3">
        <?php get_search_form(); ?>
        <h3 class="learn-heading">Categories</h3>
        <?php
        $args = array(
                    'taxonomy' => 'learn-categories',
                    'orderby' => 'name',
                    'order'   => 'ASC'
                );
        $cats = get_categories($args);
            if($cats){
                echo '<ul class="categories-list">';
                foreach($cats as $cat) {
                    ?>  <li>
                        <a href="<?php echo get_category_link( $cat->term_id ) ?>">
                            <?php echo $cat->name; ?>
                        </a>
                        </li>
                    <?php
                    }
                echo '</ul>';
            }
        ?>
    </div>
</div>
</div>

<div class="entry-content">
    <?php the_content(); ?>
</div>

<?php get_footer();?>