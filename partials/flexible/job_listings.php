<?php $posts = get_sub_field('active_job_posts') ?>

<section class="careers-jobs">
    <article>

        <div class="container careers-jobs__filters">
            <div class="row">
                <div class="col-12 col-md-3 typography">
                    <div class="select-block">
                        <label for="filter-select">JOB TYPE</label>
                        <select aria-label="filter-select">
                            <option value="all" selected>All</option>
                            <option value="software">IT - Software</option>
                            <option value="hardware">IT - Hardware</option>
                            <option value="marketing">Marketing</option>
                            <option value="sales">Sales</option>
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-3 typography">
                    <div class="select-block">
                        <label for="filter-select">LOCATION</label>
                        <select aria-label="filter-select">
                            <option value="all" selected>All</option>
                            <option value="LONDON">LONDON</option>
                            <option value="RHIYADH">RHIYADH</option>
                            <option value="CALIFORNIA">CALIFORNIA</option>
                            <option value="BRATISLAVA">BRATISLAVA</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="container careers-jobs__jobs">
            <div class="row">

                <?php foreach($posts as $post): ?>

                    <div class="col-12 col-md-4 mb-32">
                        <div class="careers-jobs__jobs__job">
                            <div class="item item--top">
                                <p class="city"><?php echo get_field("job_location", $post->ID); ?></p>
                                <h2><?php echo get_the_title($post->ID); ?></h2>
                            </div>
                            <div class="item item--bottom">
                                <h4><?php echo get_field("stipend", $post->ID); ?></h4>
                                <a href="<?php echo get_permalink($post->ID); ?>" class="link with-arrow">Full job description </a>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>

            </div>
        </div>
    </article>
</section>