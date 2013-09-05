<?php
/*
 * Add the modified css of the parent store
 */
add_action('wp_head', function() {
    $parent_theme = get_option('_fik_parent_store', null);
    if($parent_theme !== null) {
        switch_to_blog($parent_theme);
        $custom_css = get_theme_mod( 'fik_theme_css', '' );
        if ($custom_css !== '') {
          echo ('<style type="text/css" id="fik_custom_css_parent">'.$custom_css.'</style>');
        }
        restore_current_blog();
    }
});

/*
 * Add the modified css of the parent store
 */
add_action('wp_footer', function() {
    $parent_theme = get_option('_fik_parent_store', null);
    if($parent_theme !== null) {
        switch_to_blog($parent_theme);
        $custom_js = get_theme_mod( 'fik_theme_js', '' );
        if ($custom_js !== '') {
          echo ($custom_js); // <script type="text/javascript" id="fik_custom_js_parent">jQuery(document).ready(function() {});</script>
        }
        restore_current_blog();
    }
});

add_filter('wp_nav_menu_items','add_menu_first_item', 20, 2);
function add_menu_first_item( $nav, $args ) {
    if( $args->theme_location == 'primary' ) {
        return '<li id="menu-item-29" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home menu-item-29"><a href="http://dosdemarket.fikstore.com/">Vuelve al DOSDE Market</a></li>'.$nav;
    }

    return $nav;
}
