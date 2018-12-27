<?php

	add_filter( 'wp_nav_menu_items', 'add_menuitems_to_nav', 10, 2 );
	function add_menuitems_to_nav( $items, $args )
	{
		$items .= '<li><a href="" uk-icon="icon: facebook" class="uk-padding-remove-left"></a></li>';
		$items .= '<li><a href="" uk-icon="icon: twitter" class="uk-padding-remove-left"></a></li>';
		$items .= '<li><a href="" uk-icon="icon: instagram" class="uk-padding-remove-left"></a></li>';
		if ( ( get_field('offcanvas', 'options') == 'true' ) && ( $args->theme_location == 'primary' ) ) {
		    $items .= '<a class="uk-navbar-toggle" uk-navbar-toggle-icon href="#offcanvas" uk-toggle></a>';
		}
		return $items;
	}