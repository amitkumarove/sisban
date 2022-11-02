<?php
/**
 * Advanced custom fields customisation
 */

add_filter('acf/settings/remove_wp_meta_box', '__return_false');


/**
 * Set up ACF
 */
function setup_acf() {
	// Hide from admin menu
	//acf_update_setting('show_admin', false);

	// Google maps
	if(defined('LP_GMAPS_KEY') && LP_GMAPS_KEY) {
		acf_update_setting('google_api_key', LP_GMAPS_KEY);
	}

	if(function_exists('acf_add_options_page')) {
		acf_add_options_page(array(
			'page_title' => 'Project Options',
			'post_id' => 'projects',
			'parent_slug' => 'edit.php?post_type=project',
		));

		acf_add_options_page(array(
			'page_title' => 'Website Options',
			'post_id' => 'website_options',
		));

        acf_add_options_page(array(
            'page_title' => 'Global Content',
            'post_id' => 'global_content',
        ));
	}
}
add_action('acf/init', 'setup_acf');

/**
 * Add Google maps API key
 *
 * @param $api
 *
 * @return mixed
 */
function lp_acf_google_map_api( $api ){
	$api['key'] = 'AIzaSyA-8pIx133xsqhjVX9M6Q7l-AdnhD9I7Rc';
	return $api;
}
add_filter('acf/fields/google_map/api', 'lp_acf_google_map_api');

/**
 * Supply the license key
 *
 * @param $value
 *
 * @return string
 */
function lp_acf_license($value) {
	return (defined('LP_ACF_LICENSE') ? LP_ACF_LICENSE : $value);
}
apply_filters('pre_option_acf_pro_license', 'lp_acf_license', 10, 1);

/**
 * Re-enable the Custom Fields metabox on certain post types
 */
function lp_show_acf_customfields() {
	if(in_array(get_post_type(), array('shop_order', 'shop_subscription'))) {
		acf_update_setting('remove_wp_meta_box', false);
	}
}
add_action('acf/input/admin_head', 'lp_show_acf_customfields', 1);
