<main class="cards business-overview">
    <div class="container">
        <div class="row">
            <?php while(have_rows('cards')):the_row(); ?>
                <div class="col-12 col-sm-6 col-md-4 cards__card">
                    <div class="cards__card__inner typography">
                        <h2><?php echo get_sub_field('title'); ?></h2>
                        <div class="cards__card__inner__imagebox">
                            <div class="overlay"></div>
                            <?php lp_write_img_tag(get_sub_field('icon'), null, 'cards__card__inner__imagebox__icon'); ?>
                            <?php lp_write_img_tag(get_sub_field('image')); ?>
                        </div>
                        <?php lp_write_content_area_fields(); ?>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</main>
