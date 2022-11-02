<main class="global-reach">
    <div class="container">
        <div class="heading">
            <h2><?php echo get_sub_field('title'); ?></h2>
            <p><?php echo get_sub_field('subline'); ?></p>
        </div>
    </div>

    <div class="global-reach__textloop">
        
        <div id="textloop" class="textbox">

            <?php while(have_rows('textloop')):the_row() ?>

            <text>
                <b class="state"><?php echo get_sub_field('country'); ?></b>
                <span><?php echo get_sub_field('cities'); ?></span> / 
            </text>

            <?php endwhile; ?>
        </div>

    </div>

</main>