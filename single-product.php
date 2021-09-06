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
// $column = get_field('two_columns');
// $main_heading = $column['main_heading'];
// $left = $column['left'];
// $right = $column['right'];
// if($left){
//     foreach($left as $single_left)
//     {
//         echo '<h1>'.$single_left['left_title'].'</h1>';
//         echo '<p>'.$single_left['left_description'].'</p>';
//     }
// }
// if($right){
//     foreach($right as $single_right)
//     {
//         echo '<h1>'.$single_right['right_title'].'</h1>';
//         echo '<p>'.$single_right['right_description'].'</p>';
//     }
// }
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