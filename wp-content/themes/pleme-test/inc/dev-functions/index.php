<?php
/**************************************************
* Require all files in dev-functions folder except this one
**************************************************/
foreach (scandir(dirname(__FILE__)) as $filename) {
   $path = dirname(__FILE__) . '/' . $filename;
   if (is_file($path)) {
       include_once $path;
   }
}
?>