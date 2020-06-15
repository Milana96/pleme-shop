<?php
//* Add support for custom flexible header
add_theme_support( 'custom-header', array(
   'flex-width' => true,
   'width' => 260,
   'flex-height' => true,
   'height' => 100,
   'header-selector' => '.site-title a',
   'header-text' => false
) );
