<?php
/* A template for displaying single page for the Products */
get_header();
//$title = get_field('main_heading');
//$description = get_field('description');

/* Text aside image repeater starts */
// if( have_rows('text_aside_image') ):
//     while( have_rows('text_aside_image') ) : the_row();
//         $title = get_sub_field('title');
//         $description = get_sub_field('description');
//         $image = get_sub_field('image');
//     endwhile;
//   endif;
/* Text aside image repeater ends */


/*two columns starts*/
$two_columns = get_field('two_columns');
$main_heading = $two_columns['main_heading'];
if($main_heading){
    ?>
    <div class="two-columns-text">
        <h2 class="two-columns-heading mb-5"><?php echo $main_heading;?></h2>
        <div class="row">
            <?php 
            $left = $two_columns['left'];
            if($left)
            {
            ?>
            <div class="col-md-6">
                <?php foreach($left as $single_left):
                    $title = $single_left['left_title'];
                    $description = $single_left['left_description'];
                    ?>
                    <div class="two-columns-left mb-5">
                        <h3><?php echo $title;?></h3>
                        <p><?php echo $description;?></p>
                    </div>
                <?php endforeach;?> 
            </div>
            <?php }
            $right = $two_columns['right'];
            if($right)
            {?>
                <div class="col-md-6">
                <?php foreach($right as $single_right):
                    $title = $single_right['right_title'];
                    $description = $single_right['right_description'];
                    ?>
                    <div class="two-columns-right mb-5">
                        <h3><?php echo $title;?></h3>
                        <p><?php echo $description;?></p>
                    </div>
                <?php endforeach;?> 
                </div>
            <?php }   ?>    
        </div>                
    </div>
<?php
}

/*two columns ends*/

/*Slider Starts*/
//$slider_heading = get_field('slider_heading');
// if( have_rows('slides') ):
//     while( have_rows('slides') ) : the_row();
//         $title = get_sub_field('title');
//         $description = get_sub_field('description');
//         $image = get_sub_field('image');
//     endwhile;
//   endif;


/*Slider Ends*/
?>






<?php get_footer();?>