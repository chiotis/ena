<div class="uk-child-width-1-4@m uk-grid-collapse uk-grid-match " uk-grid >
    <div>
        <div class="uk-card uk-card-secondary uk-card-body">
            <h3 class="uk-card-title">Footer</h3>
            <p>&copy; <?php the_date('Y'); ?> Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
        </div>
    </div>
    <div>
        <div class="uk-card uk-card-primary uk-card-body">
            <h3 class="uk-card-title">Footer</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
        </div>
    </div>
    <div>
        <div class="uk-card uk-card-secondary uk-card-body">
            <h3 class="uk-card-title">Footer</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
        </div>
    </div>
    <div>
        <div class="uk-card uk-card-primary uk-card-body">
            <h3 class="uk-card-title">Footer</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </a></p>
			<ul class="uk-iconnav">
				<li><a href="#" uk-icon="icon: facebook;"></a></li>
				<li><a href="#" uk-icon="icon: instagram"></a></li>
				<li><a href="#" uk-icon="icon: twitter"></a></li>
				<li><a href="#" uk-icon="icon: linkedin"></a></li>
				<li><a href="#" uk-icon="icon: whatsapp"></a></li>
				<li><a href="#" uk-icon="icon: wordpress;"></a></li>
				<li><a href="#" uk-icon="icon: youtube"></a></li>
			</ul>
        </div>
    </div>
</div>
<?php
// Action hook
if ( get_field('enable_after_footer_hook', 'options') ) {
    do_action('ena_after_footer');
}
?>