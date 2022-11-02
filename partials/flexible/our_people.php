<div class="our-people">
    <img class="our-people__leaf" src="<?php echo lp_theme_url(); ?>/images/people/corner-mask.svg" alt="OUR PEOPLE">
    <div class="container">
        <div class="row">
            <div class="col-md-6 typography our-people__heading">
                <?php lp_write_content_area_fields(null, null, 'h1') ?>
            </div>

            <?php if ($people = get_sub_field('people')): ?>
                <?php foreach($people as $person): ?>
                    <div class="col-md-3 mb-32">
                        <a href="<?php the_permalink($person->ID); ?>" title="<?php echo esc_attr($person->post_title) ?>" class="our-people__member">
                            <?php lp_write_post_thumbnail_img_tag($person->ID) ?>
                            <p class="name"><?php echo $person->post_title ?></p>
                            <p class="designation"><?php the_field('job_title', $person->ID) ?></p>
                        </a>
                    </div>
                <?php endforeach ?>
            <?php endif; ?>

        </div>
    </div>
</div>
