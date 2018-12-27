<?php 
if ( ( get_field('show_navbar') == 'show' ) || ( get_field('show_navbar' ) == null ) ) {
	require_once get_template_directory() . '/components/navbar.php';
	if ( get_field('offcanvas', 'options') == 'true' ) {
		require_once get_template_directory() . '/components/offcanvas.php';
	}
}

require_once get_template_directory() . '/components/content.php';

if ( ( get_field('show_footer') == 'show' ) || ( get_field('show_footer' ) == null ) ) {
	require_once get_template_directory() . '/components/footer.php';
}
?>