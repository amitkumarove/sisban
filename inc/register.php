<?php
/**
 * Register WP entities
 *
 * Register WP entities (menus, image sizes, theme capabilities, taxonomies)
 *
 */

/**
 * Register theme support
 */
function lp_register_theme_support()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'lp_register_theme_support');

/**
 * Register available image sizes
 */
function lp_register_image_sizes()
{
    add_image_size('medium_tiny', 5, 0, false);
    add_image_size('max_width', 1920, 0, false);
    add_image_size('max_width_tiny', 5, 0, false);
    add_image_size('container_width', 1200, 0, false);
    add_image_size('container_width_tiny', 5, 0, false);
    add_image_size('xs_width', 768, 0, false);
    add_image_size('xs_width_tiny', 5, 0, false);
    add_image_size('fourthree', 800, 600, true);
    add_image_size('fourthree_tiny', 5, 0, true);
    add_image_size('sixteennine', 800, 450, true);
    add_image_size('sixteennine_tiny', 5, 0, true);
//    add_image_size('squarethumbnail', 50, 50, true);
//    add_image_size('squarethumbnail_tiny', 5, 2, true);
//    add_image_size('logo', 150, 0, false);
//    add_image_size('logo_tiny', 5, 0, false);
    add_image_size('full', 0, 0, false);
    add_image_size('full_tiny', 5, 0, false);

//    add_image_size('post-thumbnail', 400, 225, true);
}

add_action('after_setup_theme', 'lp_register_image_sizes');

/**
 * Register menus
 */
function lp_register_menus()
{
    register_nav_menus(array(
        'header-menu' => 'Header Menu',
        'main-menu'   => 'Main Menu',
        'footer-menu-col-1' => 'Footer Menu - Column 1',
        'footer-menu-col-2' => 'Footer Menu - Column 2',
        'subfooter-menu' => 'Sub-footer Menu',
    ));
}

add_action('init', 'lp_register_menus');
