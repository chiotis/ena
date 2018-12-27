<?php
class Primary_Walker_Nav_Menu extends Walker_Nav_Menu {

    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        if ( array_search( 'menu-item-has-children', $item->classes ) ) {
            $output .= sprintf( "\n<li class='%s'><a href='%s' >%s</a>\n", ( array_search( 'current-menu-item', $item->classes ) || array_search( 'current-page-parent', $item->classes ) ) ? 'uk-active' : '', $item->url, $item->title );
        } else {
            $output .= sprintf( "\n<li %s><a href='%s'>%s</a>\n", ( array_search( 'current-menu-item', $item->classes) ) ? ' class="uk-active"' : '', $item->url, $item->title );
        }
    }

    function start_lvl( &$output, $depth = 0, $args = Array() ) {
        $indent = str_repeat( "\t", $depth );
        $output .= "\n$indent<div class=\"uk-navbar-dropdown\">\n";
        $output .= "\n$indent<ul class=\"uk-nav uk-navbar-dropdown-nav\">\n";
    }

}