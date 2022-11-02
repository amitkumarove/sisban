<main class="cards">
    <div class="container">
        <div class="row">
            <?php while(have_rows('cards')):the_row(); ?>
                <div class="col-12 col-sm-6 col-md-4 cards__card">
                    <div class="cards__card__inner typography">
                        <?php lp_write_img_tag(get_sub_field('icon'), null, 'cards__card__icon') ?>
                        <?php lp_write_content_area_fields() ?>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</main>
