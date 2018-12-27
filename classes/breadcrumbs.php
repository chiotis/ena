<?php
/**
 * Breadcrumbs
 * @return html
 * @source http://yootheme.com (Warp Themes)
 */
function basey_breadcrumbs() {
	global $wp_query;
	if (!is_home() && !is_front_page()) {
		$output = '<ul class="uk-breadcrumb uk-hidden-small">';
		$output .= '<li><a href="'.get_option('home').'">Home</a></li>';
		if (is_single()) {
			$cats = get_the_category();
			if ($cats) {
				$cat = $cats[0];
				if (is_object($cat)) {
					if ($cat->parent != 0) {
						$cats = explode("@@@", get_category_parents($cat->term_id, true, "@@@"));
						unset($cats[count($cats)-1]);
						$output .= str_replace('<li>@@','<li>', '<li>'.implode("</li><li>", $cats).'</li>');
					} else {
						$output .= '<li><a href="'.get_category_link($cat->term_id).'">'.$cat->name.'</a></li>';
					}
				}
			}
		}
		if (is_category()) {
			$cat_obj = $wp_query->get_queried_object();
			$cats = explode("@@@", get_category_parents($cat_obj->term_id, TRUE, '@@@'));
			unset($cats[count($cats)-1]);
			$cats[count($cats)-1] = '@@<span>'.strip_tags($cats[count($cats)-1]).'</span>';
			$output .= str_replace('<li>@@','<li class="uk-active">', '<li>'.implode("</li><li>", $cats).'</li>');
		} elseif (is_tag()) {
			$output .= '<li class="uk-active"><span>'.single_cat_title('',false).'</span></li>';
		} elseif (is_date()) {
			$output .= '<li class="uk-active"><span>'.single_month_title(' ',false).'</span></li>';
		} elseif (is_author()) {
			$user = get_user_by( 'login', get_the_author() );
			$output .= '<li class="uk-active"><span>'.$user->display_name.'</span></li>';
		} elseif (is_search()) {
			$output .= '<li class="uk-active"><span>'.stripslashes(strip_tags(get_search_query())).'</span></li>';
		} elseif (is_tax()) {
			$taxonomy = get_taxonomy (get_query_var('taxonomy'));
			$term = get_query_var('term');
			$output .= '<li class="uk-active"><span>'.$taxonomy->label .': '.$term.'</span></li>';
		} else {
			if (!in_array(get_post_type(), array('post', 'page'))) {
				$cpt = get_post_type_object( get_post_type() );
				$output .= '<li><a href="' . get_post_type_archive_link(get_post_type()) . '">' . $cpt->labels->name . '</a></li>';
			}
			$ancestors = get_ancestors(get_the_ID(), 'page');
			for($i = count($ancestors)-1; $i >= 0; $i--) {
				$output .= '<li><a href="'.get_page_link($ancestors[$i]).'" title="'.get_the_title($ancestors[$i]).'">'.get_the_title($ancestors[$i]).'</a></li>';
			}
			$output .= '<li class="uk-active"><span>'.get_the_title().'</span></li>';
		}
		$output .= '</ul>';
	} else {
		$output = '<ul class="uk-breadcrumb">';
		$output .= '<li class="uk-active"><span>Home</span></li>';
		$output .= '</ul>';
	}
	echo $output;
}