<div class="statistics">
    <div class="container">
        <div class="row">
            <div class="col-12 col-xl-3">
                <?php lp_write_content_area_fields(); ?>
            </div>
            <div class="col-12 col-xl-8 offset-xl-1 mainblock">
                <div class="row">
                    <?php while(have_rows('statistics')):the_row() ?>
                        <div class="col-12 col-md-6">
                            <?php lp_write_content_area_fields(); ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
</div>
