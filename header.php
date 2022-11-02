<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js" lang="en">
<head>
    <?php the_field('gtm_head_code', 'options') ?>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <?php if (is_singular() && pings_open(get_queried_object())) : ?>
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php endif; ?>

    <?php wp_head(); ?>

    <script type="text/javascript">
      var _ajaxurl = '<?php echo admin_url("admin-ajax.php"); ?>';
      var _pageid = '<?php echo get_the_ID(); ?>';
      var _imagedir = '<?php lp_image_dir(); ?>';
    </script>
    <?php if (WP_ENV !== 'production'): ?>
        <script type="text/javascript" src="https://www.bugherd.com/sidebarv2.js?apikey=tgq2cgkjqzqc2xxue5j6sg"
                async="true"></script>
    <?php endif; ?>
</head>
<body <?php body_class(get_field('disable_all_background_images') ? 'backgroundimagesdisabled' : ''); ?>>
<?php the_field('gtm_body_code', 'options') ?>
<?php
// This fixes an issue where wp_nav_menu applied the_title filter which causes WC and plugins to change nav menu labels
print '<!--';
the_title();
print '-->';

?>
<?php lp_theme_partial('/partials/blocks/main_menu.php');
