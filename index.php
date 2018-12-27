<!doctype html>
<html <?php language_attributes(); ?> >
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?> style="background: #eee;" >
		<?php 
			echo '<div class="' . get_field('website_width', 'options') . ' uk-padding-remove" style="background: #fff;" >';
			// Main Layout Choice from settings
			if ( get_field('layout', 'options') == 'nav-top' ) {
				require_once get_template_directory() . '/layout/nav-top.php';
			} elseif ( get_field('layout', 'options') == 'nav-side' ) {
				require_once get_template_directory() . '/layout/nav-side.php';
			}
			echo '</div>';
			wp_footer(); 
		?>
	</body>
</html>