<section class="text-block careers-inner-content">
    <div class="container typography careers-inner-content__content">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="content-area">

                    <?php if(get_sub_field('areas_of_responsibility')) : ?>

                        <h2 class="content-area__title">Areas of responsibility</h2>

                        <div class="content-area__copy mb-32">
                            <div class="content-area__copy__content">
                                <?php echo get_sub_field('areas_of_responsibility'); ?>
                            </div>
                        </div>

                    <?php endif; ?>

                    
                    <?php if(get_sub_field('requirements')) : ?>

                        <h2 class="content-area__title">Requirements</h2>

                        <div class="content-area__copy mb-32">
                            <div class="content-area__copy__content">
                                <?php echo get_sub_field('requirements'); ?>
                            </div>
                        </div>

                    <?php endif; ?>

                </div>
            </div>


            <?php if(get_sub_field('benefits')) : ?>

                <div class="col-12 col-md-6">
                    <div class="content-area bg-white">
                        <h2 class="content-area__title">Benefits</h2>
                        <div class="content-area__copy mb-32">
                            <div class="content-area__copy__content">
                                <?php echo get_sub_field('benefits'); ?>
                            </div>
                        </div>
                    </div>
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

                <?php if(get_sub_field('apply_via_post')) : ?>
                    <div class="col-12 col-md-4 careers-inner-content__application__postadd">
                        <div class="inner">
                            <p class="strapline">APPLY VIA POST</p>
                            <?php echo get_sub_field('apply_via_post'); ?>
                        </div>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</section>