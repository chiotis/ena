<?php
function ena_body_classes( $classes ) {
    global $post;
    // return some of these things
    if ( is_category() ) {
        $classes[] =  'cat-archive';
    } elseif ( is_search() ) {
        $classes[] = 'search-page';
    } elseif ( is_tag() ) {
        $classes[] = 'tag-archive';
    } elseif ( is_home() ) {
        $classes[] = 'home-page';
    } elseif ( is_404() ) {
        $classes[] = 'error-page';
    }
    // return page-(page name)
    if ( is_page() ) {
        $pn = $post->post_name;
        $classes[] = 'page-' . $pn;
    }
    if ( is_page() && $post->post_parent ) {
        $classes[] = 'child-of-' . $parentSlug;
    }
    // if WPML has been installed return the language code
    if ( in_array( 'sitepress-multilingual-cms/sitepress.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
        if ( defined( 'ICL_LANGUAGE_CODE' ) ) {
            $lang = 'lang-' . ICL_LANGUAGE_CODE;
            $classes[] = $lang;
        }
    }
    return $classes;
    
}
add_filter( 'body_class', 'ena_body_classes' );

// Add browser agent in body class
function ena_browser_body_class($classes) {
        global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
        if($is_lynx) $classes[] = 'lynx';
        elseif($is_gecko) $classes[] = 'gecko';
        elseif($is_opera) $classes[] = 'opera';
        elseif($is_NS4) $classes[] = 'ns4';
        elseif($is_safari) $classes[] = 'safari';
        elseif($is_chrome) $classes[] = 'chrome';
        elseif($is_IE) {
                $classes[] = 'ie';
                if(preg_match('/MSIE ([0-9]+)([a-zA-Z0-9.]+)/', $_SERVER['HTTP_USER_AGENT'], $browser_version))
                $classes[] = 'ie'.$browser_version[1];
        } else $classes[] = 'unknown';
        if($is_iphone) $classes[] = 'iphone';
        if ( stristr( $_SERVER['HTTP_USER_AGENT'],"mac") ) {
                 $classes[] = 'osx';
           } elseif ( stristr( $_SERVER['HTTP_USER_AGENT'],"linux") ) {
                 $classes[] = 'linux';
           } elseif ( stristr( $_SERVER['HTTP_USER_AGENT'],"windows") ) {
                 $classes[] = 'windows';
           } elseif ( stristr( $_SERVER['HTTP_USER_AGENT'],"Android") ) {
                 $classes[] = 'os-android';
           }
        return $classes;
}
add_filter('body_class','ena_browser_body_class');