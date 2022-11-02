<main class="text-and-accordion">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 text-and-accordion__left">
                <div class="typography">
                    <?php lp_write_content_area_fields() ?>
                </div>
            </div>

            <div class="col-12 col-md-6 text-and-accordion__right">

                <div class="accordion" id="esgAccordionItems">

                    <?php $i=0; while(have_rows('accordion_items')):the_row(); ?>

                        <div class="text-and-accordion__right__box">
                            <a class="text-and-accordion__right__box__link collapsed" data-toggle="collapse" href="#collapse-<?= sanitize_title(get_sub_field('title')); ?>" data-target="#collapse-<?= sanitize_title(get_sub_field('title')); ?>" aria-expanded="false" aria-controls="collapse-<?= sanitize_title(get_sub_field('title')); ?>">
                                <?php
                                    the_sub_field('title');
                                ?>

                                <svg xmlns="http://www.w3.org/2000/svg" width="18.971" height="18.971" viewBox="0 0 18.971 18.971">
                                    <g id="Group_2237" data-name="Group 2237" transform="translate(-732.029 -1193.515)">
                                        <line id="Line_212" data-name="Line 212" x1="12" y2="12" transform="translate(733.029 1203) rotate(-45)" fill="none" stroke="#b1994d" stroke-width="2"/>
                                        <line id="Line_213" data-name="Line 213" x2="12" y2="12" transform="translate(733.029 1203) rotate(-45)" fill="none" stroke="#b1994d" stroke-width="2"/>
                                    </g>
                                </svg>
                            </a>
            
                            <div id="collapse-<?= sanitize_title(get_sub_field('title')); ?>" class="text-and-accordion__right__box__content collapse" data-parent="#esgAccordionItems">
                                <div class="text-and-accordion__right__box__content__box">
                                    <?php the_sub_field('content') ?>
                                </div>
                            </div>
                        </div>

                    <?php $i++; endwhile; ?>
                </div>

            </div>
        </div>
    </div>
</main>
