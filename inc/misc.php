<?php
/*
 * Template utilities
 */

/**
 * Disable the emoji's
 */
function lp_disable_emojis()
{
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    add_filter('tiny_mce_plugins', 'disable_emojis_tinymce');
    add_filter('wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2);
}

//add_action('init', 'lp_disable_emojis');

/**
 * Filter function used to remove the tinymce emoji plugin.
 *
 * @param array $plugins
 *
 * @return array Difference betwen the two arrays
 */
function disable_emojis_tinymce($plugins)
{
    if (is_array($plugins)) {
        return array_diff($plugins, array('wpemoji'));
    } else {
        return array();
    }
}

/**
 * Remove emoji CDN hostname from DNS prefetching hints.
 *
 * @param array $urls URLs to print for resource hints.
 * @param string $relation_type The relation type the URLs are printed for.
 *
 * @return array Difference betwen the two arrays.
 */
function disable_emojis_remove_dns_prefetch($urls, $relation_type)
{
    if ('dns-prefetch' == $relation_type) {
        /** This filter is documented in wp-includes/formatting.php */
        $emoji_svg_url = apply_filters('emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/');

        $urls = array_diff($urls, array($emoji_svg_url));
    }

    return $urls;
}

/**
 * Is this a blog post page?
 *
 * @return bool
 */
function is_blog()
{
    return (is_archive() || is_author() || is_category() || is_single() || is_tag()) && 'post' == get_post_type();
}

/**
 * Get LP theme URL
 *
 * @return string
 */
function lp_theme_url()
{
    return get_stylesheet_directory_uri();
}

/**
 * Get theme directory path
 *
 * @return string
 */
function lp_theme_dir()
{
    return get_stylesheet_directory();
}

/**
 * Include a PHP file in a template and pass in optional args
 *
 * @param $path
 * @param array $args
 */
function lp_theme_partial($path, $args = array())
{
    extract($args);
    include lp_theme_dir() . $path;
}

/**
 * Get the theme image directory
 */
function lp_image_dir()
{
    echo lp_theme_url() . '/images';
}

/**
 * Convert a given string to a slug
 *
 * @param $text
 *
 * @return string
 */
function lp_slugify($text)
{
    return sanitize_title($text);
}

/**
 * Theme file contents
 *
 * @param $path
 *
 * @return false|string
 */
function lp_file_contents($path)
{
    return file_get_contents(lp_theme_dir() . $path);
}

/**
 * SVG icons
 *
 * @param $id
 * @param int $width
 * @param int $height
 * @param string $class
 *
 * @return string
 */
function lp_svg_use($id, $width = 32, $height = 32, $class = 'icon')
{
    return '<svg class="' . $class . '" width="' . $width . '" height="' . $height . '"><use xlink:href="#' . $id . '"></use></svg>';
}

/**
 * Write out a  FontAwesome tag
 *
 * @param $icon
 * @param string $alt
 *
 * @return string
 */
function lp_fa($icon, $alt = '')
{
    return '<i class="fa ' . $icon . '" aria-hidden="true"></i>' . ($alt ? '<span class="sr-only">' . $alt . '</span>' : '');
}

/**
 * Check if a plugin is active
 *
 * @param $plugin_file name of plugin file eg woocommerce/woocommerce.php
 *
 * @return bool
 */
function lp_is_plugin_active($plugin_file)
{
    static $plugins = null;

    if ( ! $plugins) {
        $plugins = get_option('active_plugins');
    }

    return in_array($plugin_file, $plugins);
}

/**
 * Return the type part of a mime type, eg for image/jpeg returns jpeg
 *
 * @param $mime the mime type to parse
 *
 * @return string
 */
function lp_parse_mime($mime)
{
    preg_match('/.*\/(\w*)\+?.*/', $mime, $matches);

    return $matches[1];
}

/**
 * Disable the searchwp live search CSS
 */
function lp_remove_searchwp_live_search_theme_css()
{
    wp_dequeue_style('searchwp-live-search');
}

add_action('wp_enqueue_scripts', 'lp_remove_searchwp_live_search_theme_css');
//add_filter( 'searchwp_live_search_base_styles', '__return_false' );

/**
 * Is WYSIWYG field empty?
 *
 * @param $field_value
 *
 * @return bool
 */
function lp_is_wysiwyg_field_empty($field_value)
{
    $string = strip_tags(html_entity_decode($field_value));
    $string = trim(preg_replace('/\s+/', '', $string));
    $string = lp_trim($string);

    if (empty($string)) {
        return true;
    } else {
        return false;
    }
}

/**
 * Write out an insights and events item date in the format for an event or a news item
 */
function write_insights_events_item_date()
{
    $post_id       = acf_get_valid_post_id();
    $post_category = lp_get_post_category($post_id);
    if ($post_category->slug === 'event') {
        echo get_field('event_start_date') . ' - ' . get_field('event_end_date');
    } else {
        echo get_the_date("d.m.y");
    }
}

/**
 * Get the first category associated with a post
 *
 * @param $post_id
 *
 * @return WP_Term|null
 */
function lp_get_post_category($post_id = false)
{
    $post_id = acf_get_valid_post_id($post_id);
    if ($category = get_the_category($post_id)) {
        if (sizeof($category) > 0) {
            return $category[0];
        }
    }

    return null;
}

/**
 * Renders content area fields using a partial
 *
 * @param string $field_prefix If defined, prefixes the content area fields with the prefix
 * @param null $field_array If defined the content area fields are written using the array contents rather than the *_sub_field methods
 */
function lp_write_content_area_fields($field_prefix = '', $field_array = null, $title_field_tag = null, $title_field_appear_as = null)
{
    $title_field_tag       = $title_field_tag ?? 'h2'; // This is an inline isset READMORE: https://stackoverflow.com/questions/53610622/what-does-double-question-mark-operator-mean-in-php
    $title_field_appear_as = $title_field_appear_as ?? 'h1';
    lp_theme_partial('/partials/components/content_area.php', [
        'field_prefix'          => $field_prefix,
        'field_array'           => $field_array,
        'title_field_tag'       => $title_field_tag,
        'title_field_appear_as' => $title_field_appear_as
    ]);
}

/**
 * Trim a string (fixes some ACF issues with random chars in empty fields)
 *
 * @param $string
 *
 * @return string|string[]|null
 */
function lp_trim($string)
{
    $string = preg_replace('/\s*$^\s*/m', "\n", $string);
    $string = preg_replace('/[ \t]+/', ' ', $string);
    $string = trim($string, "\u{a0}");

    return $string;

}

/**
 * Generates a string of random chars
 *
 * @param int $length
 *
 * @return string
 */
function lp_get_random_string($length = 6)
{
    $characters       = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString     = '';
    for($i = 0; $i < $length; $i ++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }

    return $randomString;
}

/**
 * Get current page URL
 *
 * @return string|void
 */
function lp_get_current_url()
{
    global $wp;

    return home_url(add_query_arg(array(), $wp->request));
}


/**
 * Remove archive pages
 */
function lp_remove_wp_archives()
{
    //If we are on category or tag or date or author archive
    if (is_tag() || is_date() || is_author()) {
        wp_redirect(home_url(), 301);
        exit;
    }
}

add_action('template_redirect', 'lp_remove_wp_archives');


/**
 * Write out the contents of an SVG file
 *
 * @param $svg_filename
 */
function lp_write_embed_svg($svg_filename)
{
    echo lp_get_embed_svg($svg_filename);
}

/**
 * Returns the contents of an SVG file
 *
 * @param $svg_filename
 *
 * @return false|string
 */
function lp_get_embed_svg($svg_filename)
{
    $svg_path = get_template_directory() . DIRECTORY_SEPARATOR . 'images' . $svg_filename;
    if (file_exists($svg_path)) {
        return file_get_contents($svg_path);
    } else {
        return "SVG does not exist at $svg_path";
    }
}


/**
 * Allows SearchWP to index the site behind HTTP basic auth
 * @return array
 */
function lp_searchwp_basic_auth_creds()
{
    $credentials = array(
        'username' => 'chaos', // the HTTP BASIC AUTH username
        'password' => 'chaosdev332'  // the HTTP BASIC AUTH password
    );

    return $credentials;
}

add_filter('searchwp_basic_auth_creds', 'lp_searchwp_basic_auth_creds');

/**
 * inject a throttle to the SearchWP indexer process to reduce server load
 *
 * @param int $wait_time_seconds
 *
 * @return int
 */
function lp_searchwp_indexer_throttle($wait_time_seconds = 1)
{
    return $wait_time_seconds;
}

add_filter('searchwp_indexer_throttle', 'lp_searchwp_indexer_throttle');


add_filter('jpeg_quality', function ($arg) {
    return 100;
});

/**
 * Get the related / latest news items for the current page
 *
 * @param null $post_id
 */
function lp_get_featured_news($max_posts = 4, $post_id = null)
{
    if ( ! $post_id) {
        $post_id = get_the_ID();
    }
    $excluded_post_ids   = [];
    $excluded_post_ids[] = $post_id;

    $related_items = [];
    // 1. Do we have specified pages?
    if (($page_level_related_news = get_field('related_news_items', $post_id)) && sizeof($related_items) < $max_posts) {
        $related_items     = array_merge($related_items, $page_level_related_news);
        $excluded_post_ids = array_merge($excluded_post_ids, array_column($related_items, 'ID'));
    }
    // 2. Do we have related product page specified?
    if (($related_product = get_field('related_product_page', $post_id)) && sizeof($related_items) < $max_posts) {
        // Get pages with this product page specified
        $related_product_items = get_posts(array(
            'numberposts' => $max_posts,
            'meta_key'    => 'related_product_page',
            'meta_value'  => $related_product->ID,
            'exclude'     => $excluded_post_ids,
            'category'    => get_cat_ID('News'),
        ));
        $related_items         = array_merge($related_items, $related_product_items);
        $excluded_post_ids     = array_merge($excluded_post_ids, array_column($related_items, 'ID'));
    }
    // 3. Do we have global pages specified?
    if (($global_featured_news = get_field('featured_insights_and_events', 'options')) && sizeof($related_items) < $max_posts) {
        $related_items     = array_merge($related_items, $global_featured_news);
        $excluded_post_ids = array_merge($excluded_post_ids, array_column($related_items, 'ID'));
    }
    // 4. Get latest news
    if (sizeof($related_items) < $max_posts) {
        $latest_news       = get_posts([
            'category'         => get_cat_ID('News'),
            'post_type'        => 'post',
            'numberposts'      => $max_posts,
            'orderby'          => 'date',
            'order'            => 'DESC',
            'suppress_filters' => true,
            'exclude'          => $excluded_post_ids,
        ]);
        $related_items     = array_merge($related_items, $latest_news);
        $excluded_post_ids = array_merge($excluded_post_ids, array_column($related_items, 'ID'));
    }

    return array_splice($related_items, 0, $max_posts);
}


/**
 * Get all fields data for a have_rows loop's current flexible content block
 */
function lp_get_current_block_data()
{
    $index  = get_row_index();
    $fields = get_fields();
    $data   = $fields['content_sections'][$index - 1];

    return $data;
}

function lp_get_current_block_data_json()
{
    return json_encode(lp_get_current_block_data());
}


/**
 * Try and get a poster image from a video automatically based on the platform
 *
 * @param $video_code
 * @param $video_platform
 *
 * @return string
 */
function lp_get_video_poster_image($video_code, $video_platform)
{
    if ($video_platform === 'vimeo') {
        $hash    = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$video_code.php"));
        $img_url = $hash[0]['thumbnail_medium'];
        $img     = sprintf("<img src=\"%s\"
                             title=\"Video poster image\" alt=\"\"/>", $img_url);
    } elseif ($video_platform === 'youtube') {
        $img = sprintf("<img src=\"https://img.youtube.com/vi/%s/mqdefault.jpg\" title=\"Video poster image\" alt=\"\"/>", $video_code);
    }

    return $img;
}


/**
 * Get a string as an excerpt with a .. if necessary
 *
 * @param $string
 * @param $length
 *
 * @return string
 */
function lp_get_excerpt_from_string($string, $length)
{
    $excerpt = $string;
    if (strlen($excerpt) < $length) {
        return $excerpt;
    } else {
        $excerpt = html_entity_decode($excerpt);
        $excerpt = mb_substr($excerpt, 0, $length) . '&hellip;';

        return $excerpt;
    }
}

/**
 * Get a label from the global content
 *
 * @param $labelKey
 */
function lp_get_label($labelKey)
{
    $labels = get_field('labels', 'global_content');
    try {
        $labels = array_filter($labels, function ($label) use ($labelKey) {
            if ($label['key'] === $labelKey) {
                return true;
            }

            return false;
        });

        $labels = array_reverse($labels);
        $label  = array_pop($labels);

        if(!$label) {
            throw new Exception('No label found');
        }
        return sizeof($label) && isset($label['value']) ? $label['value'] : "No label with key ${labelKey} found.";

    } catch(Exception $ex) {
        return "Unable to find label with key \"{$labelKey}\"<pre>{$ex->getMessage()}</pre>";
    }
}

/**
 * Proxy with echo for lp_get_label
 *
 * @param $labelKey
 */
function lp_the_label($labelKey)
{
    echo lp_get_label($labelKey);
}

/**
 * Get tax terms for a post
 *
 * @param null $postId
 */
function lp_get_post_terms($postId = null)
{
    $postType      = get_post_type($postId ? $postId : get_the_ID());
    $taxonomies     = get_object_taxonomies($postType);
    $taxonomyNames = wp_get_object_terms(get_the_ID(), $taxonomies, array("fields" => "names"));
    $terms          = '';
    if ( ! empty($taxonomyNames)) {
        foreach($taxonomyNames as $tax_name) {
            $terms .= $tax_name . ' ';
        }
    }

    return $terms;
}
