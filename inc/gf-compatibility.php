<?php
// Add the appropriate classes to the form submit button
add_filter( 'gform_submit_button', 'add_custom_css_classes', 10, 2 );
function add_custom_css_classes( $button, $form ) {
    $dom = new DOMDocument();
    $dom->loadHTML( $button );
    $input = $dom->getElementsByTagName( 'input' )->item(0);
    $classes = $input->getAttribute( 'class' );
    $classes .= " uk-button uk-button-primary uk-width-1-1";
    $input->setAttribute( 'class', $classes );
    return $dom->saveHtml( $input );
}

/**
 * Gravity Forms Bootstrap Styles
 *
 * Applies bootstrap classes to various common field types.
 * Requires Bootstrap to be in use by the theme.
 *
 * Using this function allows use of Gravity Forms default CSS
 * in conjuction with Bootstrap (benefit for fields types such as Address).
 *
 * @see  gform_field_content
 * @link http://www.gravityhelp.com/documentation/page/Gform_field_content
 *
 * @return string Modified field content
 */
add_filter("gform_field_content", "bootstrap_styles_for_gravityforms_fields", 10, 5);
function bootstrap_styles_for_gravityforms_fields($content, $field, $value, $lead_id, $form_id){
	
	// Currently only applies to most common field types, but could be expanded.
	
	if($field["type"] != 'hidden' && $field["type"] != 'list' && $field["type"] != 'select' && $field["type"] != 'multiselect' && $field["type"] != 'checkbox' && $field["type"] != 'fileupload' && $field["type"] != 'date' && $field["type"] != 'html' && $field["type"] != 'address') {
		$content = str_replace('class=\'medium', 'class=\'uk-input', $content);
	}
	
	if($field["type"] == 'name' || $field["type"] == 'address' || $field["type"] == 'text' || $field["type"] == 'email' ) {
		$content = str_replace('<input ', '<input class=\'uk-input\' ', $content);
	}
	
	if($field["type"] == 'address') {
		$content = str_replace('<select ', '<select class=\'uk-select\' ', $content);
	}

	if($field["type"] == 'textarea') {
		$content = str_replace('class=\'textarea', 'class=\'uk-textarea', $content);
	}

	if($field["type"] == 'select' || $field["type"] == 'multiselect' ) {
		$content = str_replace('class=\'medium', 'class=\'uk-select', $content);
	}
	
	if($field["type"] == 'checkbox') {
		// $content = str_replace('li class=\'', 'li class=\'checkbox ', $content);
		$content = str_replace('<input ', '<input class=\'uk-checkbox uk-margin-small-right uk-margin-remove-top \' ', $content);
	}
	
	if($field["type"] == 'radio') {
		// $content = str_replace('li class=\'', 'li class=\'radio ', $content);
		$content = str_replace('<input ', '<input class=\'uk-radio uk-margin-small-right uk-margin-remove-top \' ', $content);
	}
	
	return $content;
	
} // End bootstrap_styles_for_gravityforms_fields()

add_filter( 'gform_validation_message', 'change_message', 10, 2 );
function change_message( $message, $form ) {
    return "<div class='uk-alert-danger' uk-alert><a class='uk-alert-close' uk-close></a><p>There was a problem with your submission. Errors have been highlighted below.</p></div>";
}