<main class="investment_journey">
    <div class="container">

        <div class="row align-items-end investment_journey__head">

            <div class="col-12 col-md-6">
                <h2><?php echo get_sub_field('title'); ?></h2>
                <p><?php echo get_sub_field('subline'); ?></p>
            </div>

            <div class="col-12 col-md-6 typography opacity-0">
                <div class="select-block ml-auto">
                    <label for="filter-select">FILTER</label>
                    <select id="sliderFilter" aria-label="filter-select">
                        <option value="all" selected>View all</option>
                        <option value="real-estate">Real Estate</option>
                        <option value=".food">Food & beverage</option>
                        <option value=".agriculture">Agriculture</option>
                    </select>
                </div>
            </div>

        </div>

        <div id="brand-slider" class="investment_journey__slider">
            <?php while(have_rows('slider')):the_row() ?>


            <?php if(get_sub_field('slide_type') === 'brand') : ?>
                <div class="slide <?php echo sanitize_title(get_sub_field('subline')); ?>">
                    <?php lp_write_img_tag(get_sub_field('image')); ?>
                    <div class="content">
                        <p class="name"><?php echo get_sub_field('title')?></p>
                        <p class="tag"><?php echo get_sub_field('subline')?></p>
                    </div>
                </div>
            <?php else : ?>
            <div class="slide year <?php echo sanitize_title(get_sub_field('subline')); ?>">
                <div class="image">
                    <?php lp_write_img_tag(get_sub_field('image')); ?>
                </div>
                
                <div class="content">
                    <p class="name year"><?php echo get_sub_field('title')?></p>
                </div>
            </div>
            <?php endif; ?>


            <?php endwhile; ?>

        </div>

    </div>
</main>