<?php
the_post();
get_header();

if ($pagename && $pagename === 'about/news' ) :
    $categories = get_categories();
    $postYears = get_posts_years();
    $featured_news = get_field('featured_news_items', 'website_options') ? get_field('featured_news_items', 'website_options')[0] : null;
endif;

?>
<main class="news-listing-page" name="news-listing-page">
    <img class="news-listing-page__leaf" src="<?php echo lp_theme_url(); ?>/images/people/corner-mask.svg" alt="news-listing-page">

    <div class="news-listing-page__banner">
        <div class="container position-relative">
            <div class="row align-items-center typography">
                <div class="col-12 col-md-4">
                    <!-- <p class="strapline">About</p> -->
                    <h1>News</h1>
                </div>
                <?php if ($featured_news) : ?>
                    <div class="col banner-block">
                        <a href="<?= get_permalink($featured_news->ID); ?>" class="banner-block__post">
                            <div class="image">
                                <?php echo get_the_post_thumbnail($featured_news->ID) ?>
                                <svg xmlns="http://www.w3.org/2000/svg" width="785.998" height="43.002" viewBox="0 0 785.998 43.002">
                                    <path id="Subtraction_2" data-name="Subtraction 2" d="M-17811,2222l0-42a39.6,39.6,0,0,1,15.375,3.29,39.765,39.765,0,0,1,12.537,8.6,39.743,39.743,0,0,1,8.449,12.655,39.772,39.772,0,0,1,3.1,15.453,39.616,39.616,0,0,1,3.141-15.573,39.872,39.872,0,0,1,8.568-12.713,39.828,39.828,0,0,1,12.713-8.573,39.7,39.7,0,0,1,15.568-3.142H-17026l0,42-785,0Z" transform="translate(17811.498 -2179.499)" fill="#f4f4f0" stroke="rgba(0,0,0,0)" stroke-miterlimit="10" stroke-width="1"/>
                                </svg>
                                <p class="hero-title">Featured news</p>
                            </div>

                            <time datetime="#"><?php echo get_the_date('m.Y', $featured_news->ID) ?></time>
                            <h2><?php echo $featured_news->post_title ?></h2>
                        </a>
                    </div>
                <?php endif ?>
            </div>

            <img class="news-listing-page__banner__divider img-fluid" src="<?php echo lp_theme_url(); ?>/images/newspage-banner-graphic.svg" alt="news-listing-page">

        </div>
    </div>
    <!-- Show/Hiden "News Filter Block" -->

    <?php
        // Fix for getting invalid or missing acf fileds for this page, query page objects instead of $post->ID
        $pageObject = get_queried_object();

        if (get_field('show_filters_on_news_page', $pageObject->ID) && get_field('show_filters_on_news_page', $pageObject->ID) === true) : ?>
        <div class="container news-listing-page__listing">
            <div class="heading typography">
                <h2>Latest news</h2>
                <?php include_once 'partials/components/news-filter.php'; ?>
            </div>
            <div class="row" id="news-content">

            </div>
            <nav aria-label="Page navigation example filter-navigation">
                <ul class="pagination filter-navigation__pagination" id="pagination-news">
                </ul>
            </nav>
            <div class="wd-100 text-center d-none">
                <button class="btn btn-primary" type="button">Load more</button>
            </div>
        </div>
    <?php endif; ?>

</main>

<?php get_footer(); ?>
