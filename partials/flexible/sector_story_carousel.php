<div class="sector-story-carousel">
    <?php while(have_rows('images')):the_row() ?>
        <div class="sector-story-carousel__slide">
            <?php lp_write_img_tag(get_sub_field('image'), 'max_width', null, false) ?>
        </div>
    <?php endwhile; ?>
</div>
