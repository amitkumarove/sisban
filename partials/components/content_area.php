<?php
$GLOBALS['field_array']     = $field_array;
$GLOBALS['field_prefix']    = $field_prefix;
$GLOBALS['title_field_tag'] = $title_field_tag;
/**
 * Gets the value of a field using the field prefix if defined and if a field_array is specified use this instead of the
 * get_sub_field
 *
 * @param $field_name
 *
 * @return mixed
 */
if ( ! function_exists('lp_get_content_area_field')) {
    function lp_get_content_area_field($field_name)
    {
        $field_array  = $GLOBALS['field_array'];
        $field_prefix = $GLOBALS['field_prefix'];

        if ($field_array && key_exists($field_prefix . $field_name, $field_array)) {
            return $field_array[$field_prefix . $field_name];
        } elseif ( ! $field_array) {
            if ($content = get_sub_field($field_prefix . $field_name)) {
                return $content;
            } elseif ($content = get_field($field_prefix . $field_name)) {
                return $content;
            } else {
                return null;
            }
        } else {
            return null;
        }
    }
}
?>

<div class="content-area">
    <?php if ($strapline = lp_get_content_area_field('content_strapline')): ?>
        <p class="content-area__strapline strapline">
            <?php echo $strapline ?>
        </p>
    <?php endif; ?>

    <?php if ($title = lp_get_content_area_field('content_title')): ?>
    <?php $title_style = $title_field_appear_as ?? 'h1'; ?>
    <<?php echo $title_field_tag ?> class="content-area__title <?php echo $title_style ?>">
    <?php echo $title ?>
</<?php echo $title_field_tag ?>>
<?php endif; ?>
<?php if ($copy = lp_get_content_area_field('content_copy')): ?>
    <?php $is_empty = lp_is_wysiwyg_field_empty($copy); ?>
    <?php if ( ! $is_empty): ?>
        <div class="content-area__copy">
            <div class="content-area__copy__content">
                <?php echo $copy ?>
            </div>
            <?php if ($stats = lp_get_content_area_field('headline_statistic')): ?>
                <div class="content-area__copy__stat" id="statsCrossfade">
                    <?php
                        foreach ($stats as $stat) : ?>
                            <div class="content-area__copy__stat__item">
                                <h2><?php echo $stat['stats_number'] ?></h2>
                                <p><?php echo $stat['stats_title'] ?></p>
                            </div>
                        <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
<?php endif; ?>
<?php if ($links = lp_get_content_area_field('content_links')): ?>
    <?php $links_html = '';
    foreach($links as $link): ?>
        <?php if ($link['link']): ?>
            <?php $links_html .= $link['link'] ? lp_get_link($link['link'], null, null, $link['display_as_button']) : null; ?>
        <?php endif; ?>
    <?php endforeach; ?>
    <?php if ($links_html): ?>
        <div class="content-area__links">
            <?php echo $links_html ?>
        </div>
    <?php endif; ?>
<?php endif; ?>

</div>
