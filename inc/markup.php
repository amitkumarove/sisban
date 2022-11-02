<?php

//use enshrined\svgSanitize\Sanitizer;

/**
 * Get the browser from the $_SERVER special variable
 *
 * @return string
 */
function lp_get_browser()
{
    if (empty($_SERVER['HTTP_USER_AGENT'])) {
        return '';
    }

    $useragent = $_SERVER['HTTP_USER_AGENT'];

    // NOTE: check for Edge before Chrome, because it's sneaky and tries to masquerade as Chrome
    switch($useragent) {
        case(stripos($useragent, 'MSIE') > 0):
        case(stripos($useragent, 'Trident') > 0):
            $browser = 'ie';
            break;
        case(stripos($useragent, 'Edge') > 0):
            $browser = 'ie edge';
            break;
        case(stripos($useragent, 'chrome') > 0):
            $browser = 'chrome';
            break;
        case(stripos($useragent, 'firefox') > 0):
            $browser = 'firefox';
            break;
        case(stripos($useragent, 'safari') > 0):
            $browser = 'safari';
            break;
        default:
            $browser = '';
    }

    return $browser;
}


/**
 * Add classes to the body tag
 *
 * @param $classes
 *
 * @return array
 */
function lp_body_classes($classes)
{
    // Page parent/section
    if ( ! is_archive() && ! is_search() && ! is_404()) {
        $post      = get_post();
        $ancestors = get_post_ancestors($post->ID);

        if ($post->post_parent) {
            $parent_id = end($ancestors);
        } else {
            $parent_id = $post->ID;
        }

        $parent_data = get_post($parent_id, ARRAY_A);
        $classes[]   = 'section-' . $parent_data['post_name'];
    }

    // Browser
    $classes[] = lp_get_browser();

    return $classes;
}

add_filter('body_class', 'lp_body_classes');


/**
 * Add classes to post items
 *
 * @param $classes
 *
 * @return mixed
 */
function lp_post_classes($classes)
{
    return $classes;
}

add_filter('post_class', 'lp_post_classes');


/**
 * remove p around img
 *
 * @param $content
 *
 * @return string|string[]|null
 */
function lp_filter_ptags_on_images($content)
{
    return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

add_filter('the_content', 'lp_filter_ptags_on_images');


/**
 * Add a div around tables
 *
 * @param $content
 *
 * @return string|string[]|null
 */
function lp_filter_div_on_table($content)
{
    return preg_replace('/(<table.*<\/table\>)/si', '<div class="table-wrap">$0</div>', $content);
}

add_filter('the_content', 'lp_filter_div_on_table');


/**
 * Add a div around oEmbeds
 *
 * @param $html
 * @param $url
 * @param $attr
 * @param $post_id
 *
 * @return string
 */
function lp_filter_div_on_oembed($html, $url, $attr, $post_id)
{
    return '<div class="oembed">' . $html . '</div>';
}

add_filter('embed_oembed_html', 'lp_filter_div_on_oembed', 100, 4);

/**
 * Write out a link
 *
 * @param $link_array
 * @param null $link_text
 * @param null $class
 * @param bool $should_display_as_button
 */
function lp_the_link($link_array, $link_text = null, $class = null, $should_display_as_button = false, $should_show_arrow = true)
{
    echo lp_get_link($link_array, $link_text, $class, $should_display_as_button, $should_show_arrow);
}

/**
 * Get a link string
 *
 * @param $link_array
 * @param null $link_text
 * @param null $class
 * @param bool $should_display_as_button
 *
 * @return string
 */
function lp_get_link($link_array, $link_text = null, $class = null, $should_display_as_button = false, $should_show_arrow = true)
{
    if (is_object($link_array)) {
        $class_name = get_class($link_array);

        if ($class_name === 'WP_Post') {
            $link_array = [
                'url'    => $link_array->url,
                'target' => $link_array->url ? $link_array->target : '_self',
                'title'  => $link_array->title

            ];
        } else {
            $link_array = (array) $link_array;
        }
    }
    if (($link_text === null || $link_text === '') && $link_array['title']) {
        $link_text = $link_array['title'];
    }
    if ($should_display_as_button) {
        $class .= " btn btn-secondary";
    } elseif($should_show_arrow) {
        $class .= " link with-arrow";
    }
    $html = sprintf(
        '<a href="%s"
	   title="%s"
	   target="%s"
	   class="%s">
		%s</a>',
        esc_attr($link_array['url']),
        esc_attr($link_array['title']),
        esc_attr($link_array['target']),
        esc_attr($class),
        $link_text
    );

    return $html;
}

/**
 * Write out a section bullet list using an ACF list repeater.
 *
 * @param $list ACF repeating field with 'list_item' and 'bullet_icon' fields
 */
function lp_write_bulletlist($list)
{
    foreach($list as $item) { ?>
        <li>
            <?php if ($icon = $item['bullet_icon']): ?>
                <div class="iconbox"><img
                            src="<?php echo $icon['url'] ?>"/></div>
            <?php endif; ?>
            <div class="textbox"><?php echo $item['list_item'] ?></div>
        </li>
    <?php }
}

/**
 * Write a HTML image tag using an ACF image field output
 *
 * @param $acf_image
 * @param null $image_size
 * @param null $class
 * @param bool $lazy_load
 */
function lp_write_img_tag($acf_image, $image_size = null, $class = null, $lazy_load = true, $attr = null)
{
    echo lp_get_img_tag($acf_image, $image_size, $class, $lazy_load, $attr);
}

/**
 * Write a HTML image tag using an ACF image field output
 *
 * @param $acf_image
 * @param null $image_size
 * @param null $class
 * @param bool $lazy_load
 *
 * @return string|null
 */
function lp_get_img_tag($acf_image, $image_size = null, $class = null, $lazy_load = false, $attr = null)
{
    $available_image_sizes = get_intermediate_image_sizes();
    if ( ! $image_size) {
        $image_size = 'xs_width';
    }
    if ($acf_image) {
        $attributes = '';
        if ($attr) {
            foreach($attr as $attr_name => $attr_value) {
                $attributes .= sprintf(' %s="%s"', esc_attr($attr_name), esc_attr($attr_value));
            }
        }

        // If its an SVG, write out the svg html
        if (lp_is_svg($acf_image)) {
            return "<div class=\"{$class}\">" . lp_get_svg_as_html($acf_image['url']) . "</div>";
        } elseif ($lazy_load) {
            $img_tag = '<img src="%s" data-src="%s" title="%s" alt="%s" class="%s" %s />';
            $class   = $class ? 'lazy ' . $class : 'lazy';
            // Check that we can use this image size
            $tiny_image_size = in_array($image_size . '_tiny', $available_image_sizes) ? $image_size . '_tiny' : $image_size;

            $img_url = esc_attr($acf_image['sizes'][$image_size]);

            // Bug fix for WP alwas adding -scaledd to very large images even when trying to use 'full'
            if ($image_size === 'full') {
                $img_url = str_replace('-scaled', '', $img_url);
            }

            return sprintf($img_tag, esc_attr($acf_image['sizes'][$tiny_image_size]), $img_url, esc_attr($acf_image['description']), esc_attr($acf_image['alt']), $class, $attributes);
        } else {
            $img_tag = '<img src="%s" title="%s" alt="%s" class="%s" %s />';

            $img_tag = sprintf($img_tag, esc_attr($acf_image['sizes'][$image_size]), esc_attr($acf_image['description']), esc_attr($acf_image['alt']), $class, $attributes);

            return $img_tag;
        }
    }

    return null;
}

/**
 * echo out lp_get_post_thumbnail_img_tag
 *
 * @param $post_id
 * @param null $image_size
 * @param null $class
 * @param false $lazy_load
 * @param null $attr
 */
function lp_write_post_thumbnail_img_tag($post_id, $image_size = null, $class = null, $lazy_load = false, $attr = null)
{
    echo lp_get_post_thumbnail_img_tag($post_id, $image_size, $class, $lazy_load, $attr);
}

/**
 * Write out a post thumbnail with the lazy load class
 *
 * @param $post_id
 * @param null $image_size
 * @param null $class
 * @param false $lazy_load
 * @param null $attr
 */
function lp_get_post_thumbnail_img_tag($post_id, $image_size = null, $class = null, $lazy_load = false, $attr = null)
{
    $imgMeta   = wp_get_attachment_metadata(get_post_thumbnail_id($post_id));
    $imgSizes = $imgMeta['sizes'];
    $image_size      = isset($imgSizes[$image_size]) ? $image_size : 'thumbnail';
    $image_size_tiny = $image_size . '_tiny';

    $fullImageUrl = get_the_post_thumbnail_url($post_id, $image_size);

    $img_tag    = '<img src="%s" data-src="%s" title="%s" alt="%s" class="%s" %s />';
    $attributes = [
        'data-src' => $fullImageUrl,
        'class'    => 'lazy ' . ($class ? $class : '')
    ];

    return get_the_post_thumbnail($post_id, $image_size_tiny, $attributes);
}

/**
 * Is the ACF image an SVG?
 *
 * @param $acf_image
 *
 * @return bool
 */
function lp_is_svg($acf_image)
{
    if (
        array_key_exists('mime_type', $acf_image)
        &&
        $acf_image['mime_type'] === 'image/svg+xml'
    ) {
        return true;
    } else {
        return false;
    }
}

/**
 * Get the SVG at a specified URL as HTML
 *
 * @param $image_url
 *
 * @return string
 */
function lp_get_svg_as_html($image_url)
{
//    $sanitizer = new Sanitizer();
    if ($svg_contents = @file_get_contents($image_url)) {
//        $sanitizer->minify(true);
//        $sanitizer->removeXMLTag(true);
//        $clean_svg = $sanitizer->sanitize($svg_contents);
        $clean_svg = $svg_contents;
        $svg_html  = sprintf("<div class='embedded-svg'>%s</div>", $clean_svg);
    } else {
        $svg_html = "<!-- SVG not found: $image_url -->";
    }

    return $svg_html;

}

function lp_get_file_ext($file_path)
{
    $ext = pathinfo($file_path, PATHINFO_EXTENSION);

    return $ext;
}

/**
 * Get a files file extension
 *
 * @param $file_path
 *
 * @return mixed
 */
function lp_get_file_ext_icon_embedded_svg($file_path)
{
    $ext           = pathinfo($file_path, PATHINFO_EXTENSION);
    $ext_icon_path = sprintf("%s/images/icons/%s.svg", get_template_directory_uri(), $ext);

    return lp_get_svg_as_html($ext_icon_path);
}


function lp_get_attachement_filesize($attachement_id, $in_mb = true)
{
    $attachment = get_attached_file($attachement_id);

    $fs = filesize($attachment);
    if ($in_mb) {
        $fs = floor($fs / (1024 * 1024));
    }

    return $fs;
}

/**
 * Write out a nice string of the file size
 *
 * @param $attachement_id
 * @param bool $in_mb
 */
function lp_the_attachement_filesize($attachement_id)
{
    $fs = lp_get_attachement_filesize($attachement_id, true);
    echo ($fs && ($fs !== "0")) ? sprintf("(%sMB)", $fs) : '';
}

/**
 * Get a posts terms in a speciifed slug
 *
 * @param string $parent_slug
 * @param null $post_ID
 *
 * @return array
 */
function lp_get_post_terms_by_parent($parent_slug = "", $post_ID = null)
{
    $child_terms = [];
    if ($categories = get_the_terms($post_ID, 'category')):
        if ($slug_category = get_category_by_slug($parent_slug)):
            foreach($categories as $category):
                if (cat_is_ancestor_of($slug_category, $category)) {
                    $child_terms[] = $category;
                }
            endforeach;
        endif;
    endif;

    return $child_terms;
}

/**
 * Renders the media frame
 */
function lp_render_media_frame()
{
    lp_theme_partial('/partials/components/media_frame.php');
}
