<?php

/**************************************************
 * Chanege Logo in admin panel
 **************************************************/


function kamaengine_remove_admin_wp_logo()
{
   global $wp_admin_bar;
   $wp_admin_bar->remove_menu('wp-logo');
}
function kamaengine_wp_logo(\WP_Admin_Bar $bar)
{
   $args = [
      'img_url' => "https://www.google.rs/images/branding/googlelogo/2x/googlelogo_color_272x92dp.png",
      'img_width' => "130px",
      'text_domain' => "Pleme Theme",
      'link'   => 'https://www.example-site.com',
      'title' => 'Site name'
   ];

   $bar->add_menu(array(
      'id'     => 'wpse',
      'parent' => null,
      'group'  => null,
      'title'  => __('<img style="width: ' . $args['img_width'] . '" src="' . $args['img_url'] . '" />', $args['text_domain']),
      'href'   => $args['link'],
      'meta'   => array(
         'target'   => '_blank',
         'title'    => __($args['title'], 'wk'),
         'html'     => '',
         'class'    => 'wpse--item',
         'rel'      => strtolower(str_replace(' ', '-', $args['title'])),
         'tabindex' => PHP_INT_MAX,
      ),
   ));
}
// add_action('wp_before_admin_bar_render', 'kamaengine_remove_admin_wp_logo', 0);
// add_action( 'admin_bar_menu', 'kamaengine_wp_logo');

function kamaengine_login_logo()
{
   $logo_id = get_theme_mod('custom_logo');
   $logo_url = wp_get_attachment_url($logo_id);

   if ($logo_id && $logo_id != '' && $logo_url) :
?>
      <style type="text/css">
         #login h1 a,
         .login h1 a {
            background-image: url("<?php echo $logo_url ?>");
            /* Custom css */
            height: 84px;
            width: 84px;
            background-size: 84px;
            background-repeat: no-repeat;
            background-position: center;
         }
      </style>
<?php
   endif;
}
add_action('login_enqueue_scripts', 'kamaengine_login_logo');
function kamaengine_login_logo_url()
{
   return home_url();
}
add_filter('login_headerurl', 'kamaengine_login_logo_url');
