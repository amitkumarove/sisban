<?php
the_post();
get_header();
?>
<main class="leftspace-100">
    <?php
    while(have_rows('content_blocks')) {
        $i = 0;
        the_row();
        lp_theme_partial('/partials/flexible/' . get_row_layout() . '.php', ['block_index' => $i]);
    }
    ?>
</main>
<?php get_footer(); ?>
