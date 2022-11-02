<?php
the_post();
get_header();
$theme = "light";
?>
<main class="news-page news-page--<?= $theme; ?>">
    <img class="news-page__leaf" src="<?php echo lp_theme_url(); ?>/images/people/corner-mask.svg" alt="news-page">
    <section class="news-page__inner typography">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 news-page__inner__leftside">
                    <h1><?php the_field('banner_title') ?></h1>
                    <ul class="news-page__inner__content__links">
                        <li>
                            <a href="/about/news">NEWS</a>
                        </li>
                        <li>
                            <?php 
                                $my_date = the_date( 'F Y', '<p class="date_posted">', '</p>', false ); 
                                echo $my_date;
                            ?>
                        </li>
                    </ul>
                    <img src="<?= get_the_post_thumbnail_url($post->ID, 'full'); ?>" alt="<?php the_field('banner_title') ?>">
                    <?php lp_theme_partial('/partials/flexible/testimonial.php'); ?>
                </div>
                <div class="col-12 col-md-6 news-page__inner__rightside">
                    <?php
                        while(have_rows('blocks')) {
                            $i = 0;
                            the_row();
                            lp_theme_partial('/partials/flexible/' . get_row_layout() . '.php', ['block_index' => $i]);
                        }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Show news related with this category -->
    <section class="bg-white">
        <?php 
        $postcats = get_the_category($post->ID);
        if ($postcats && count($postcats) > 0) :
            include_once 'partials/blocks/category-related-news.php';
        endif;
            
        ?>
    </section>
</main>
<?php get_footer(); ?>
