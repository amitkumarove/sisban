<?php
/**
 * Returns all child nav_menu_items under a specific parent
 *
 * @param int the parent nav_menu_item ID
 * @param array nav_menu_items
 * @param bool gives all children or direct children only
 *
 * @return array returns filtered array of nav_menu_items
 */
function get_nav_menu_item_children($parent_id, $nav_menu_items, $depth = true)
{
    $nav_menu_item_list = array();
    foreach((array) $nav_menu_items as $nav_menu_item) {
        if ($nav_menu_item->menu_item_parent == $parent_id) {
            $nav_menu_item_list[] = $nav_menu_item;
            if ($depth) {
                if ($children = get_nav_menu_item_children($nav_menu_item->ID, $nav_menu_items)) {
                    $nav_menu_item_list = array_merge($nav_menu_item_list, $children);
                }
            }
        }
    }

    return $nav_menu_item_list;
}


/**
 * Get menu items for a specified menu location slug
 *
 * @param $nav_menu_location_slug
 */
function lp_get_menu_location_menu_items($nav_menu_location_slug)
{
    $menu = lp_get_nav_menu_term($nav_menu_location_slug);

    return $menu ? wp_get_nav_menu_items($menu->term_id) : null;
}

/**
 * Get a nav menu term by nav menu location slug
 *
 * @param $nav_menu_location_slug
 *
 * @return array|WP_Error|WP_Term|null
 */
function lp_get_nav_menu_term($nav_menu_location_slug)
{
    $locations = get_nav_menu_locations();

    return count($locations) > 0 ? get_term($locations[$nav_menu_location_slug], 'nav_menu') : null;
}
