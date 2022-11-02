<?php
/**
 * Theme functions
 */

require 'inc/constants.php';
require 'inc/acf.php';
require 'inc/blocks.php';
require 'inc/admin.php';
require 'inc/customposttypes.php';
require 'inc/enqueue.php';
require 'inc/forms.php';
require 'inc/fvm.php';
require 'inc/markup.php';
require 'inc/media.php';
require 'inc/menus.php';
require 'inc/misc.php';
require 'inc/query.php';
require 'inc/register.php';
require 'inc/rewrites.php';
require 'inc/news.php';

// Set the homepage <title> attribute;
/*function different_document_title($title) {
    if(lp_is_homepage()) {
        $title = get_bloginfo('name');
    }

    return $title;
}
add_filter('pre_get_document_title', 'different_document_title', 100);*/

/**
 * Reroute inaccessible pages to 404
 *
 * @param $template
 *
 * @return string
 */
function lp_reroute_to_404($template)
{
    if (get_field('page_inaccessible')) {
        return locate_template('404.php');
    } else {
        return $template;
    }
}
add_filter('template_include', 'lp_reroute_to_404');

/**
 * Redirect to a URL
 */
function lp_redirect_to_url()
{
    $redirect = get_field('page_redirect');
    if ($redirect && $redirect['url']) {
        wp_redirect($redirect['url']);
    }
}
add_action('template_redirect', 'lp_redirect_to_url');

function sess_start()
{
    if (!session_id()) {
        session_start();
    }
}
add_action('init', 'sess_start');

function custom_excerpt_length( $length )
{
    return 50;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
