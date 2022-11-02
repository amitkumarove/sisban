<div class="contact-page">

    <section class="contact-page__form">
        <img class="contact-page__form__leaf" src="<?php echo lp_theme_url(); ?>/images/contact-page/header-clip.png" alt="info">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-md-5 col-lg-6">
                    <div class="text-content">
                        <?php if($strapline = get_sub_field('strapline')): ?>
                        <p class="subline"><?php echo $strapline ?></p>
                        <?php endif ?>
                        <h1>
                            <?php the_sub_field('title_line_1') ?><br>
                            <span><?php the_sub_field('title_line_2') ?></span>
                        </h1>
                    </div>
                </div>

                <div class="col-12 col-md-7 col-lg-6">
                    <?php echo do_shortcode('[ninja_form id=2]') ?>
                </div>
            </div>
            <img class="contact-page__form__bottomDesign img-fluid" src="<?php echo lp_theme_url(); ?>/images/contact-page/form-graphic-bottom.svg" alt="form-graphic-bottom">
        </div>
    </section>


    <section class="contact-page__corp-offices">
        <div class="container">
            <div class="heading">
                <h2><?php the_sub_field('offices_title'); ?></h2>
            </div>
            <div class="d-flex flex-wrap align-items-start">

            <?php while(have_rows('corporate_offices')):the_row(); ?>

                <div class="contact-page__corp-offices__office">
                    <p><b><?php the_sub_field('title'); ?></b></p>

                    <div><?php the_sub_field('address'); ?></div>

                    <div class="map-container">
                        <div id="<?php the_sub_field('map_id'); ?>" class="gmap"></div>
                    </div>

                </div>

            <?php endwhile; ?>

            </div>
        </div>
    </section>


</div>
