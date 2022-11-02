<main class="sector-story-statistics">
    <div class="container">
        <div class="row">
            <?php while(have_rows('statistics')):the_row() ?>
                <div class="col-6 col-md-4 sector-story-statistics__item typography">
                    <p class="h1"><?php the_sub_field('figure') ?></p>
                    <p class="sector-story-statistics__item__detail"><?php the_sub_field('description') ?></p>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</main>
