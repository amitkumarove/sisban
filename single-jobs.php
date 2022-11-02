<?php
the_post();
get_header();
$page = get_page_by_title('Careers');
$image = get_fields($page->ID);
// print('<pre>');print_r($image['content_blocks'][0]['image']);print('</pre>');
// exit();
?>
<main>
    <div class="page-banner page-banner--light careers-inner">
        <div class="page-banner__image" style="background-image: url(<?php echo $image['content_blocks'][0]['image']['sizes']['container_width']; ?>)"> </div>
        <div class="container">
            <div class="page-banner__content typography">
                <p class="page-banner__content__subline subline">BECOME A SISBANIAN</p>
                <div class="content-area">
                    <h2 class="content-area__title h1"><?php the_title() ?>. <br/> <span><?php the_field('job_location'); ?>.</span></h2>
                    <h3 class="content-area__perks"><?php the_field('stipend'); ?></h3>
                    <div class="content-area__copy">
                        <div class="content-area__copy__content">
                            <p><?php the_field('short_description'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="text-block careers-inner-content">


        <div class="container typography careers-inner-content__content">
            <div class="row">
                <?php if(get_field('content_in_left')) : ?>
                    <div class="col-12 col-md-6">

                    <?php while(have_rows('content_in_left')):the_row() ?>

                        <div class="content-area">
                            <?php lp_write_content_area_fields(); ?>
                        </div>

                    <?php endwhile; ?>

                    </div>
                <?php endif; ?>

                <?php if(get_field('content_in_right')) : ?>
                    <div class="col-12 col-md-6">
                        <?php while(have_rows('content_in_right')):the_row() ?>

                            <div class="content-area bg-white">
                                <?php lp_write_content_area_fields(); ?>
                            </div>

                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>



        <div class="careers-inner-content__application bg-white">
            <div class="container typography">
                <h2 class="careers-inner-content__application__heading">Application</h2>
                <div class="row">

                    <div class="col-12 col-md-8 careers-inner-content__application__forms">
                        <?php echo do_shortcode('[ninja_form id=2]') ?>
                    </div>

                    <?php if(get_field('careers_post_address', 'global_content')) : ?>

                    <div class="col-12 col-md-4 careers-inner-content__application__postadd">
                        <div class="inner">
                            <p class="strapline"><?php echo get_field('careers_post_address_label', 'global_content'); ?></p>
                            <?php echo get_field('careers_post_address', 'global_content'); ?>
                        </div>
                    </div>

                    <?php endif; ?>
                    
                </div>
            </div>
        </div>
    </section>


</main>
<?php get_footer(); ?>
