<?php

use Roots\WPConfig\Config;

/**
 * Enqueue JS and CSS
 */
function lp_enqueue_frontend()
{
    // Dequeue existing scripts
    wp_dequeue_script('jquery');
    wp_deregister_script('jquery');
    // Remove gutenberg block library
    wp_dequeue_style('wp-block-library');

    $version = substr(md5_file(get_template_directory() . '/dist/css/main.min.css'), 0, 5);
    wp_enqueue_style('main-style', get_template_directory_uri() . '/dist/css/main.min.css', null, $version);

    // Third-party scripts
    wp_enqueue_script('jquery', '//code.jquery.com/jquery-3.6.0.min.js');

    // Our scripts
    $version = substr(md5_file(get_template_directory() . '/dist/js/vendor.min.js'), 0, 5);
    wp_enqueue_script('vendor-script', get_template_directory_uri() . '/dist/js/vendor.min.js', null, $version);
    $version = substr(md5_file(get_template_directory() . '/dist/js/main.min.js'), 0, 5);
    wp_enqueue_script('main-script', get_template_directory_uri() . '/dist/js/main.min.js', null, $version);
    // Boxicons
//    wp_enqueue_script('boxicons', 'https://unpkg.com/boxicons@latest/dist/boxicons.js', null, null, true);
}

add_action('wp_enqueue_scripts', 'lp_enqueue_frontend');

/**
 * Enqueue admin css and JS
 */
function lp_enqueue_admin()
{
//    add_editor_style(get_template_directory_uri().'/dist/css/admin.css');
    wp_enqueue_script('lp-admin-js', get_template_directory_uri() . '/js/admin.js', array(), null, true);

}

//add_action('admin_init', 'lp_enqueue_admin');

function lp_enqueue_admin_acf()
{
//    add_editor_style(get_template_directory_uri().'/dist/css/admin.css');
    wp_enqueue_script('lp-admin-acf-js', get_template_directory_uri() . '/js/acf.js', array(), null, true);

}

add_action('acf/input/admin_enqueue_scripts', 'lp_enqueue_admin_acf');
