<?php
// Action hook
if ( get_field('enable_before_topnav_hook', 'options') ) {
	do_action('ena_before_topnav');
}
?>
<div class="uk-background-primary uk-light <?php the_field('navbar_padding', 'options'); ?>" <?php if ( get_field('sticky_navbar', 'options') ) { echo 'uk-sticky=""'; } ?> > <!-- ONLY IF IS STICKY -->
	<nav class="uk-margin-left uk-margin-right" uk-navbar>
		<a class="uk-navbar-item uk-logo" href="#">Logo</a>
	
		<?php
			$menu_alignment = get_field('menu_alignment', 'options');
			wp_nav_menu( array(
				'theme_location'    => 'primary',
				'depth'             => 4,
				'container'         => 'div',
				'container_class'   => $menu_alignment,
				'menu_class'        => 'uk-navbar-nav',
				'walker'            => new Primary_Walker_Nav_Menu(),
			) );
		?>
	</nav>
</div>
<?php
// Action hook
if ( get_field('enable_after_topnav_hook', 'options') ) {
	do_action('ena_after_topnav');
}
?>