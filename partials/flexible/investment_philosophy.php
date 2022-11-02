<main class="cards investment-philosophy">
    <div class="container">
        <div class="heading">
            <h2><?php the_sub_field('title'); ?></h2>
            <p><?php the_sub_field('text'); ?></p>
        </div>
        <div class="row">
            <?php while(have_rows('cards')):the_row(); ?>
                <div class="col-12 col-sm-6 col-md-3 cards__card">
                    <div class="cards__card__inner typography">
                        <?php lp_write_img_tag(get_sub_field('icon'), null, 'cards__card__icon') ?>
                        <?php lp_write_content_area_fields() ?>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</main>
