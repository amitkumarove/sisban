<section class="global-reach-common-block">
    <?php $bgImage = get_field('global_reach_background_image', 'global_content') ?>
    <div class="global-reach-common-block__bg" style="<?php echo $bgImage ? "background-image:url({$bgImage['url']})" : '' ?>">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6 global-reach-common-block__content typography">
                <h1><?php the_field('global_reach_title', 'global_content') ?></h1>
                <?php the_field('global_reach_introduction', 'global_content') ?>
            </div>
        </div>
        <div class="row  global-reach-common-block__locations typography">
            <div class="col-12 col-md-6 col-lg-4  global-reach-common-block__locations__location">
                <h2><?php the_field('corporate_offices_title', 'global_content') ?>
                    (<svg class="wheat" xmlns="http://www.w3.org/2000/svg" width="12.373" height="26.859" viewBox="0 0 12.373 26.859">
                        <path id="Path_7490" data-name="Path 7490" d="M532.837,339.735a5.745,5.745,0,0,1-1.566,2.856l-4.365,5.554a4.479,4.479,0,0,0-1.223,3.06v.152a4.47,4.47,0,0,0-.613-.849l-2.491-3.189a5.743,5.743,0,0,1-1.566-2.856l-.275,0s.069,1.178.215,3.245a5.422,5.422,0,0,0,1.626,3.446l2.287,2.929a4.378,4.378,0,0,1,.817,2.856v1.945a4.462,4.462,0,0,0-.613-.848l-2.491-3.189a5.752,5.752,0,0,1-1.566-2.856l-.275,0s.069,1.178.215,3.245a5.427,5.427,0,0,0,1.626,3.446l2.287,2.929a4.374,4.374,0,0,1,.817,2.856v2.12h.61V362.11a4.379,4.379,0,0,1,.817-2.856l2.287-2.929a5.427,5.427,0,0,0,1.626-3.446c.146-2.067.215-3.245.215-3.245l-.275,0a5.735,5.735,0,0,1-1.566,2.856l-2.491,3.189a4.465,4.465,0,0,0-.613.848V354.58a4.375,4.375,0,0,1,.817-2.856l4.161-5.294a5.427,5.427,0,0,0,1.626-3.446c.146-2.067.215-3.245.215-3.245Z" transform="translate(-520.739 -339.735)" fill="#b1994d"/>
                    </svg>)
                </h2>
                <?php the_field('corporate_offices_column', 'global_content') ?>
            </div>
            <div class="col-12 col-md-6 col-lg-4  global-reach-common-block__locations__location">
                <h2><?php the_field('group_business_locations_title', 'global_content') ?>
                (<svg  class="dot" xmlns="http://www.w3.org/2000/svg" width="8" height="8" viewBox="0 0 8 8">
                        <circle id="Ellipse_314" data-name="Ellipse 314" cx="4" cy="4" r="4" fill="#b1994d"/>
                    </svg>)</h2>
                <div class="row">
                    <div class="col-6 col-md-6">
                        <?php the_field('group_business_locations_column_1', 'global_content') ?>
                    </div>
                    <div class="col-6 col-md-6">
                        <?php the_field('group_business_locations_column_2', 'global_content') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
