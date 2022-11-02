<main class="about-overview">
    <!--Cards-->
    <div class="about-overview__cards">
        <div class="container">
            <?php if (have_rows('cards')): ?>

                <div class="row">
                    <?php while(have_rows('cards')): the_row(); ?>
                        <div class="col-12 col-md-6 col-xl-4">
                            <div class="about-overview__cards__card">
                                <?php lp_write_img_tag(get_sub_field('icon')) ?>
                                <?php get_sub_field('link'); ?>
                                <?php lp_write_content_area_fields() ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>

            <?php endif; ?>
        </div>
    </div>

    <div class="about-overview__cols">
        
        <div class="container">
                
            <!--Our origins-->
            <div class="about-overview__cols__origins">
                
                <?php if (have_rows('origins')): ?>
                    <div class="col-12 col-md-8 col-lg-6">
                        <div class="content">
                            <?php while(have_rows('origins')): the_row(); ?>
                                <?php lp_write_content_area_fields() ?>
                            <?php endwhile; ?>
                        </div>
                    </div>
                    <!-- <img class="about-overview__cols__origins__graphic" src="<?php // echo lp_theme_url(); ?>/images/origins-image.svg" alt="origins"> -->
                    <object id="ourStoryGraphic" class="about-overview__cols__origins__graphic" type="image/svg+xml" data="<?php echo lp_theme_url(); ?>/images/origins-image.svg"></object>
                <?php endif; ?>
            </div>

            <!--Our evolution-->
            <div class="about-overview__cols__evolution">

                <?php if (have_rows('evolution')): ?>
                    <div class="row align-items-stretch">
                        <div class="col-12 col-md-6 align-self-end">
                            <!-- <img class="about-overview__cols__evolution__graphic" src="<?php // echo lp_theme_url(); ?>/images/evolution-image.svg" alt="evolution"> -->
                            <object id="evolutionGraphic" class="about-overview__cols__evolution__graphic" type="image/svg+xml" data="<?php echo lp_theme_url(); ?>/images/evolution-image.svg"></object>
                        </div>
                        <div class="col-12 col-md-6 align-self-start">
                            <div class="content full">
                                <?php while(have_rows('evolution')): the_row(); ?>
                                    <?php lp_write_content_area_fields() ?>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

            </div>

        </div>

    </div>
</main>



<script>
    $(document).ready(function () {
        new Vivus('ourStoryGraphic', { type: 'oneByOne', duration: 400, reverseStack: true });
        new Vivus('evolutionGraphic', { type: 'oneByOne', duration: 400 });
    });
</script>