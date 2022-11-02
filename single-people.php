<?php
the_post();
get_header();
$peoplePage = get_page_by_title( 'Our People' );
?>  
<main class="person-page">
    <img class="our-people__leaf" src="<?php echo lp_theme_url(); ?>/images/people/corner-mask.svg" alt="OUR PEOPLE">

    <div class="container">

        <div class="row">
            <div class="col-12 col-md-8 col-lg-6 order-2 order-sm-1">
                <div class="person-page__content">
                    <p class="strapline">OUR PEOPLE</p>
                    <h1><?php the_title() ?></h1>
                    <p class="designaton"><?php the_field('job_title'); ?></p>
                    <div class="description">
                        <?php the_content() ?>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4 col-lg-6 order-1 order-sm-2">
                <div class="person-page__profile-image">
                    <?php the_post_thumbnail(); ?>
                    <a href="<?php echo get_permalink($peoplePage->ID); ?>" class="with-arrow">View all of our people</a>
                </div>
            </div>
        </div>

    </div>
</main>
<?php get_footer(); ?>
