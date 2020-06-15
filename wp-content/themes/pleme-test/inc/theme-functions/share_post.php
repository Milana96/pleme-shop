<?php 
/**************************************************
* Share posts on social media
**************************************************/
function the_share_post_links() {
   ?>
   <div class="share-buttons">
       <div class="share-links-wrapper">
           <!-- Facebook -->
           <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_the_permalink(); ?>" title="<?php _e('Share on Facebook','Pleme Theme') ?>" target="_blank" class="btn btn-facebook">
               <i class="fa fa-facebook-square transition-all-05"></i>
           </a>
           <!-- Twitter -->
           <a href="http://twitter.com/home?status=<?php echo get_the_permalink(); ?>" title="<?php _e('Share on Twitter', 'Pleme Theme') ?>" target="_blank" class="btn btn-twitter">
               <i class="fa fa-twitter-square transition-all-05"></i>
           </a>
           <!-- LinkedIn -->
           <a href="http://www.linkedin.com/shareArticle?mini=true&url=&title=&summary=<?php echo get_the_permalink(); ?>" title="<?php _e('Share on LinkedIn', 'Pleme Theme') ?>" target="_blank" class="btn btn-linkedin">
               <i class="fa fa-linkedin-square transition-all-05"></i>
           </a>
           <!-- Pinterest -->
           <a href="http://pinterest.com/pin/create/button/?url=<?php echo get_the_permalink(); ?>]&description=<?php the_title(); ?>" class="btn btn-pinterest" title="<?php _e('Share on Pinterest', 'Pleme Theme') ?>" target="_blank" >
               <i class="fa fa-pinterest-square transition-all-05"></i>
           </a>
       </div>
   </div>
   <?php
}