<?php
//
// Site Wide Hooks, managed from the options page
//
function ena_before_topnav() {
	the_field('before_topnav_html', 'options');
}
add_action('ena_before_topnav','ena_before_topnav');

function ena_after_topnav() {
	the_field('after_topnav_html', 'options');
}
add_action('ena_after_topnav','ena_after_topnav');

function ena_after_footer() {
	the_field('after_footer_html', 'options');
}
add_action('ena_after_footer','ena_after_footer');
//
// Single Template Action Hooks
//
// function ena_before_content() {
// 	echo '<div class="uk-alert-warning" uk-alert>ena_before_content</div>';
// }
// add_action('ena_before_content','ena_before_content');

// function ena_after_content() {
// 	echo '<div class="uk-alert-warning" uk-alert>ena_after_content</div>';
// }
// add_action('ena_after_content','ena_after_content');