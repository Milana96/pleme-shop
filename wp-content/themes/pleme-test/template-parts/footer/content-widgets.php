<?php 
/**************************************************
* Footer widgets file
**************************************************/
?>
<div class="site-footer-widgets-wrapper">
    
    <div class="footer_style">
        <?php dynamic_sidebar( 'footer-1' ); ?>
        <?php dynamic_sidebar( 'footer-2' ); ?>
        <?php echo do_shortcode('[social-media]'); ?>  
    </div>
</div>