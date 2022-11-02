<main class="about-our-culture">

    <!--Our Vision-->
    <?php if (have_rows('our_vision')): ?>
        <div class="about-our-culture__our-vision">
            <div class="container">
                <?php while(have_rows('our_vision')): the_row(); ?>
                    <h2><?php the_sub_field('title') ?></h2>
                    <!-- Our Vision / columns -->
                    <div class="row">
                        <?php
                        $i = 1;
                        while(have_rows('columns')): the_row(); ?>
                            <div class="col-12 col-md-6 col-xl-3">
                                <?php // lp_write_img_tag(get_sub_field('icon')) ?>
                                <object class="embedded-svg" id="textColumns-<?= $i; ?>" type="image/svg+xml" data="<?php echo get_sub_field('icon')['url'] ?>"></object>
                                <?php lp_write_content_area_fields() ?>
                            </div>
                        <?php $i++; endwhile; ?>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    <?php endif; ?>


    <!-- Our values -->
    <?php if (have_rows('our_values')): ?>
        <div class="about-our-culture__our-values">
            <div class="container">
                <div class="row">
                    <?php while(have_rows('our_values')): the_row(); ?>
                        <div class="col-12 col-md-6 about-our-culture__our-values__summary">
                            <!-- Main content -->
                            <?php lp_write_content_area_fields() ?>
                            <div class="d-block text-center">
                                <img class="about-our-culture__our-values__graphic" src="<?php echo lp_theme_url(); ?>/images/our-culture-values-image.svg" alt="our values">
                            </div>
                        </div>

                        
                        <!-- Columns -->
                        <?php while(have_rows('columns')): the_row(); ?>
                            <div class="col-12 col-md-3 about-our-culture__our-values__points">
                                <?php the_sub_field('content'); ?>
                            </div>
                        <?php endwhile; ?>
    
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    
    <!--Our personality -->
    <?php if (have_rows('our_personality')): ?>
        <div class="about-our-culture__our-personality">
            <div class="container position-relative">
                <?php while(have_rows('our_personality')): the_row(); ?>
                    <!--        Main title-->
                    <h2><?php the_sub_field('title') ?></h2>
                    <!--        Columns-->

                    <div class="row">
                        <div class="col-12 col-lg-8 about-our-culture__our-personality__maindiv">
                            <div class="row">
                                <?php
                                $i = 1;
                                while(have_rows('columns')): the_row(); ?>
                                    <div class="col-12 col-md-4 about-our-culture__our-personality__maindiv__box">
                                        <?php //lp_write_img_tag(get_sub_field('icon')) ?>
                                        <object class="embedded-svg" id="ourPersonality-<?= $i; ?>" type="image/svg+xml" data="<?php echo get_sub_field('icon')['url'] ?>"></object>
                                        <?php lp_write_content_area_fields() ?>
                                    </div>
                                <?php $i++; endwhile; ?>
                            </div>
                        </div>
                    </div>

                    <img class="about-our-culture__our-personality__graphic" src="<?php echo lp_theme_url(); ?>/images/our-personality-section-image.svg" alt="our personality">
                    
                <?php endwhile; ?>
            </div>
        </div>
    <?php endif; ?>
    


</main>


<script>
    $(document).ready(function () {
        new Vivus('textColumns-1', { type: 'delayed', duration: 200 });
        new Vivus('textColumns-2', { type: 'delayed', duration: 200 });
        new Vivus('textColumns-3', { type: 'delayed', duration: 200 });
        new Vivus('textColumns-4', { type: 'delayed', duration: 200 });
        new Vivus('ourPersonality-1', { type: 'delayed', duration: 200 });
        new Vivus('ourPersonality-2', { type: 'delayed', duration: 200 });
        new Vivus('ourPersonality-3', { type: 'delayed', duration: 200 });
    });
</script>