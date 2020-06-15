<?php
/**************************************************
* Pagination function
**************************************************/
function the_archive_pagination(){
   ?>
   <div class="nav-links">
      <?php
      global $wp_query;

      $big = 999999999; // need an unlikely integer

      echo paginate_links(array(
         'Pleme Theme' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
         'format' => '?paged=%#%',
         'current' => max(1, get_query_var('paged')),
         'total' => $wp_query->max_num_pages,
         'prev_text'          => __('<i class="fa fa-angle-left" aria-hidden="true"></i>'),
         'next_text'          => __('<i class="fa fa-angle-right" aria-hidden="true"></i>')
      ));
      ?>
   </div>
<?php }
