    <footer class="global-footer">
        <div class = "container">  
            <div class="row">
                <div class="col-md-6">
                    <div class = "footer-menu-items">
                        <nav aria-label="<?php _e( 'Footer Navigation', 'whmbp-theme' ); ?>">
                            <?php wp_nav_menu( array( 'container_class' => 'menu-footer', 'theme_location' => 'footer_menu' ) ); ?>
                        </nav>  
                    </div>           
                </div>
                <div class="col-md-6">
                    <div class="site-logo">
                        <?php $image = get_field('footer_logo', 'option'); 
                        $img_url = $image['url'];
                        $img_alt = $image['alt'];
                        echo'<img src="'.$img_url.'" alt="'.$img_alt.'">'; 
                        ?>
                    </div>
                    <div class="gradient-line-top position-relative w-100 footer-gradient"></div>
                </div>
                <div class="col-md-6">
                    <div class="socials">
                        <ul>
                            <?php 
                            if(get_field('facebook','option')):
                                $facebook = get_field('facebook','option');
                                echo '<li><a href="'.$facebook.'" target="_blank"><i class="fab fa-facebook-f"></i></a></li>';
                            endif;
                            if(get_field('twitter','option')):
                                $twitter = get_field('twitter','option');
                                echo '<li><a href="'.$twitter.'" target="_blank"><i class="fab fa-twitter"></i></a></li>';
                            endif;
                            if(get_field('linked_in','option')):
                                $linked_in = get_field('linked_in','option');
                                echo '<li><a href="'.$linked_in.'" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>';
                            endif;
                            if(get_field('instagram','option')):
                                $instagram = get_field('instagram','option');
                                echo '<li><a href="'.$instagram.'" target="_blank"><i class="fab fa-instagram"></i></a></li>';
                            endif;
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="copyright_text">
                        <p><?php echo get_field('copyright_text', 'option');?> </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <?php wp_footer(); ?>
    </body>
</html>
  