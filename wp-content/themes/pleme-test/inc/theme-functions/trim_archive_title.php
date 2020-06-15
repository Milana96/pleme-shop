<?php
/**************************************************
* Disable text before and after archive title
**************************************************/
function get_trim_archive_title( $before_title = "", $after_title = "" ) {

    if ( is_category() ) {
        $title = $before_title . single_cat_title( '', false ) . $after_title;
    } elseif ( is_tag() ) {
        $title = $before_title . single_tag_title( '', false ) . $after_title;
    } elseif ( is_author() ) {
        $title = $before_title . get_the_author() . $after_title;
    } elseif ( is_year() ) {
        $title = $before_title . get_the_date( _x( 'Y', 'yearly archives date format' ) )  . $after_title;
    } elseif ( is_month() ) {
        $title = $before_title . get_the_date( _x( 'F Y', 'monthly archives date format' ) )  . $after_title;
    } elseif ( is_day() ) {
        $title = $before_title . get_the_date( _x( 'F j, Y', 'daily archives date format' ) )  . $after_title;
    } elseif( is_tax() ){
        $title = $before_title . single_term_title() . $after_title;
    } elseif ( is_post_type_archive() ) {
        $title = $before_title . post_type_archive_title( '', false )  . $after_title;
    } elseif( is_single() ) {
        $title = $before_title . get_the_title() . $after_title;
    } else{
        $title = $before_title . '' . $after_title;
    }

    return $title;

}
function the_trim_archive_title( $before_title = "", $after_title = "" ){
    echo get_trim_archive_title( $before_title, $after_title ); 
}
?>