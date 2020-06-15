<?php
/**
 * File that's included each time we cann get_search_form function
 *
 * @package Pleme Theme
 */

?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<input type="search" class="search-field" placeholder="<?php esc_html_e( 'Search', 'Pleme Theme' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
		<button class="submit-button-search" type="submit">
			<i class="fa fa-search"></i>
		</button>
	</label>
</form>
