<div class="uk-grid-collapse" uk-grid uk-height-viewport uk-height-match="row: false">
	<div class="uk-width-1-4@m uk-width-1-5@l uk-width-1-6@xl uk-background-secondary uk-light <?php the_field('navbar_padding', 'options'); ?> uk-panel">
		<h3>Nav</h3>
	</div>
	
	<div class="uk-width-expand@m uk-padding uk-panel">
		<?php require_once get_template_directory() . '/components/content.php'; ?>
		<?php
			if ( ( get_field('show_footer') == 'show' ) || ( get_field('show_footer' ) == null ) ) {
				require_once get_template_directory() . '/components/footer.php';
			}
		?>
	</div>
</div>