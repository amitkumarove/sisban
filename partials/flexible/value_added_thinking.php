<section class="value-added-thinking">
    <div class="container">

        <div class="row value-added-thinking__intro">
            <div class="col">
                <h2><?php the_sub_field('title') ?></h2>
            </div>
        </div>

        <div class="row value-added-thinking__boxes">
            <?php while(have_rows('boxes')):the_row() ?>
                <div class="col-12 col-md-4 value-added-thinking__boxes__box">
                    <div class="inner">
                        <?php the_sub_field('content') ?>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

    </div>

</section>
