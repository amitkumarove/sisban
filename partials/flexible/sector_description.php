<?php $posts = get_sub_field('featured_stories') ?>
<main class="sector-description">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ul class="nav sector-description__tabs" role="tablist">
                    <li class="nav-item sector-description__tabs__tab">
                        <a class="active" data-toggle="tab" href="#businesses" role="tab" aria-controls="businesses" aria-selected="true">
                            <?php lp_the_label('sector_businesses_tab_title') ?>
                        </a>
                    </li>
                    <li class="nav-item sector-description__tabs__tab">
                        <a data-toggle="tab" href="#strategy" role="tab" aria-controls="strategy" aria-selected="false">
                            <?php lp_the_label('sector_philosophy_strategy_title') ?>
                        </a>
                    </li>
                </ul>

                <div class="tab-content sector-description__content">
                    <div id="businesses" class="tab-pane fade in active show sector-description__business">
                        <h1><?php the_sub_field('businesses_title') ?></h1>
                        <?php if ($posts): ?>
                            <div class="row">
                                <?php foreach($posts as $post): ?>
                                    <div class="col-12 col-lg-4 sector-description__business__cards">
                                        <?php lp_theme_partial('/partials/components/story-card.php', ['post' => $post]) ?>
                                    </div> 
                                <?php endforeach; ?>
                            </div>
                        <?php else: ?>
                        <div class="row">
                            <div class="col-12">
                                <p>There are no businesses selected to display here.</p>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div id="strategy" class="tab-pane fade sector-description__strategy typography">
                            <div class="row">
                                <div class="col col-md-12 col-lg-6">
                                    <h1 class="sector-description__strategy__subline subline"><?php the_sub_field('subline') ?></h1>
                                    <p class="sector-description__strategy__title h1"><?php the_sub_field('title') ?></p>
                                    <h2 class="sector-description__strategy__strategy-subline subline"><?php the_sub_field('strategy_subline') ?></h2>
                                    <div class="sector-description__strategy__strategy-description"><?php the_sub_field('strategy_description') ?></div>
                                </div>
                                <div class="d-sm-none d-md-block d-md-4 col-lg-6 sector-description__strategy__image">
                                    <div class="sector-description__strategy__image__inner">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="577.853" height="639.732"
                                             viewBox="0 0 577.853 639.732">
                                            <g id="Group_2131" data-name="Group 2131" transform="translate(-790 -1015)">
                                                <g id="Group_1908" data-name="Group 1908"
                                                   transform="translate(-33.146 802.152)">
                                                    <g id="leaf-right-fill-lrg" transform="translate(1026.994 339.848)">
                                                        <path id="Path_242" data-name="Path 242"
                                                              d="M1684.667,956.915c-1.083,7.555-4.32,12.392-12.4,22.63l-50.75,64.713c-5.4,7.007-9.7,12.935-9.7,24.252v26.748h4.828l.006-.038c0-11.315,1.079-15.633,6.478-22.631l49.133-62.649c8.082-10.228,12.037-15.332,12.885-27.31,1.159-16.381,1.675-25.715,1.675-25.715Z"
                                                              transform="translate(-1611.82 -956.915)" fill="#bfbea7"/>
                                                    </g>
                                                    <g id="leaf-right-fill-reg" transform="translate(1026.994 466.014)">
                                                        <path id="Path_243" data-name="Path 243"
                                                              d="M1753.066,977.613c-1.083,7.555-4.321,12.393-12.4,22.631l-34.592,44.014c-5.4,7.007-9.7,12.935-9.7,24.252v26.748h4.829l.006-.038c0-11.315,1.078-15.633,6.477-22.631l32.975-41.95c8.081-10.229,12.037-15.332,12.884-27.31,1.16-16.382,1.676-25.716,1.676-25.716Z"
                                                              transform="translate(-1696.377 -977.613)" fill="#bfbea7"/>
                                                    </g>
                                                    <g id="leaf-right-fill-reg-2" data-name="leaf-right-fill-reg"
                                                       transform="translate(1026.994 524.837)">
                                                        <path id="Path_243-2" data-name="Path 243"
                                                              d="M1753.066,977.613c-1.083,7.555-4.321,12.393-12.4,22.631l-34.592,44.014c-5.4,7.007-9.7,12.935-9.7,24.252v26.748h4.829l.006-.038c0-11.315,1.078-15.633,6.477-22.631l32.975-41.95c8.081-10.229,12.037-15.332,12.884-27.31,1.16-16.382,1.676-25.716,1.676-25.716Z"
                                                              transform="translate(-1696.377 -977.613)" fill="#bfbea7"/>
                                                    </g>
                                                    <g id="leaf-right-fill-reg-3" data-name="leaf-right-fill-reg"
                                                       transform="translate(1026.994 583.659)">
                                                        <path id="Path_243-3" data-name="Path 243"
                                                              d="M1753.066,977.613c-1.083,7.555-4.321,12.393-12.4,22.631l-34.592,44.014c-5.4,7.007-9.7,12.935-9.7,24.252v26.748h4.829l.006-.038c0-11.315,1.078-15.633,6.477-22.631l32.975-41.95c8.081-10.229,12.037-15.332,12.884-27.31,1.16-16.382,1.676-25.716,1.676-25.716Z"
                                                              transform="translate(-1696.377 -977.613)" fill="#bfbea7"/>
                                                    </g>
                                                    <g id="leaf-left-fill-reg" transform="translate(973.146 385.699)">
                                                        <path id="leaf-left-fill-lrg"
                                                              d="M1698.535,977.613c1.083,7.555,4.321,12.393,12.4,22.631l34.592,44.014c5.4,7.007,9.7,12.935,9.7,24.252v26.748H1750.4l-.006-.038c0-11.315-1.078-15.633-6.477-22.631l-32.975-41.95c-8.081-10.229-12.037-15.332-12.884-27.31-1.16-16.382-1.676-25.716-1.676-25.716Z"
                                                              transform="translate(-1696.377 -977.613)" fill="#bfbea7"/>
                                                    </g>
                                                    <g id="leaf-left-fill-reg-2" data-name="leaf-left-fill-reg"
                                                       transform="translate(973.146 444.521)">
                                                        <path id="leaf-left-fill-lrg-2" data-name="leaf-left-fill-lrg"
                                                              d="M1698.535,977.613c1.083,7.555,4.321,12.393,12.4,22.631l34.592,44.014c5.4,7.007,9.7,12.935,9.7,24.252v26.748H1750.4l-.006-.038c0-11.315-1.078-15.633-6.477-22.631l-32.975-41.95c-8.081-10.229-12.037-15.332-12.884-27.31-1.16-16.382-1.676-25.716-1.676-25.716Z"
                                                              transform="translate(-1696.377 -977.613)" fill="#bfbea7"/>
                                                    </g>
                                                    <g id="leaf-left-fill-reg-3" data-name="leaf-left-fill-reg"
                                                       transform="translate(973.146 503.344)">
                                                        <path id="leaf-left-fill-lrg-3" data-name="leaf-left-fill-lrg"
                                                              d="M1698.535,977.613c1.083,7.555,4.321,12.393,12.4,22.631l34.592,44.014c5.4,7.007,9.7,12.935,9.7,24.252v26.748H1750.4l-.006-.038c0-11.315-1.078-15.633-6.477-22.631l-32.975-41.95c-8.081-10.229-12.037-15.332-12.884-27.31-1.16-16.382-1.676-25.716-1.676-25.716Z"
                                                              transform="translate(-1696.377 -977.613)" fill="#bfbea7"/>
                                                    </g>
                                                    <g id="leaf-left-fill-reg-4" data-name="leaf-left-fill-reg"
                                                       transform="translate(973.146 562.166)">
                                                        <path id="leaf-left-fill-lrg-4" data-name="leaf-left-fill-lrg"
                                                              d="M1698.535,977.613c1.083,7.555,4.321,12.393,12.4,22.631l34.592,44.014c5.4,7.007,9.7,12.935,9.7,24.252v26.748H1750.4l-.006-.038c0-11.315-1.078-15.633-6.477-22.631l-32.975-41.95c-8.081-10.229-12.037-15.332-12.884-27.31-1.16-16.382-1.676-25.716-1.676-25.716Z"
                                                              transform="translate(-1696.377 -977.613)" fill="#bfbea7"/>
                                                    </g>
                                                    <g id="leaf-left-fill-reg-5" data-name="leaf-left-fill-reg"
                                                       transform="translate(973.146 620.988)">
                                                        <path id="leaf-left-fill-lrg-5" data-name="leaf-left-fill-lrg"
                                                              d="M1698.535,977.613c1.083,7.555,4.321,12.393,12.4,22.631l34.592,44.014c5.4,7.007,9.7,12.935,9.7,24.252v26.748H1750.4l-.006-.038c0-11.315-1.078-15.633-6.477-22.631l-32.975-41.95c-8.081-10.229-12.037-15.332-12.884-27.31-1.16-16.382-1.676-25.716-1.676-25.716Z"
                                                              transform="translate(-1696.377 -977.613)" fill="#bfbea7"/>
                                                    </g>
                                                    <g id="leaf-stem-fill" transform="translate(1026.994 460.498)">
                                                        <rect id="leaf-stem-fill-2" data-name="leaf-stem-fill"
                                                              width="4.865"
                                                              height="392.082" fill="#bfbea7"/>
                                                    </g>
                                                </g>
                                                <g id="Group_1909" data-name="Group 1909"
                                                   transform="translate(132.01 802.152)">
                                                    <g id="leaf-right-fill-reg-4" data-name="leaf-right-fill-reg"
                                                       transform="translate(1026.994 351.191)">
                                                        <path id="Path_243-4" data-name="Path 243"
                                                              d="M1753.066,977.613c-1.083,7.555-4.321,12.393-12.4,22.631l-34.592,44.014c-5.4,7.007-9.7,12.935-9.7,24.252v26.748h4.829l.006-.038c0-11.315,1.078-15.633,6.477-22.631l32.975-41.95c8.081-10.229,12.037-15.332,12.884-27.31,1.16-16.382,1.676-25.716,1.676-25.716Z"
                                                              transform="translate(-1696.377 -977.613)" fill="#bfbea7"/>
                                                    </g>
                                                    <g id="leaf-right-fill-reg-5" data-name="leaf-right-fill-reg"
                                                       transform="translate(1026.994 407.192)">
                                                        <path id="Path_243-5" data-name="Path 243"
                                                              d="M1753.066,977.613c-1.083,7.555-4.321,12.393-12.4,22.631l-34.592,44.014c-5.4,7.007-9.7,12.935-9.7,24.252v26.748h4.829l.006-.038c0-11.315,1.078-15.633,6.477-22.631l32.975-41.95c8.081-10.229,12.037-15.332,12.884-27.31,1.16-16.382,1.676-25.716,1.676-25.716Z"
                                                              transform="translate(-1696.377 -977.613)" fill="#bfbea7"/>
                                                    </g>
                                                    <g id="leaf-right-fill-reg-6" data-name="leaf-right-fill-reg"
                                                       transform="translate(1026.994 466.014)">
                                                        <path id="Path_243-6" data-name="Path 243"
                                                              d="M1753.066,977.613c-1.083,7.555-4.321,12.393-12.4,22.631l-34.592,44.014c-5.4,7.007-9.7,12.935-9.7,24.252v26.748h4.829l.006-.038c0-11.315,1.078-15.633,6.477-22.631l32.975-41.95c8.081-10.229,12.037-15.332,12.884-27.31,1.16-16.382,1.676-25.716,1.676-25.716Z"
                                                              transform="translate(-1696.377 -977.613)" fill="#bfbea7"/>
                                                    </g>
                                                    <g id="leaf-right-fill-reg-7" data-name="leaf-right-fill-reg"
                                                       transform="translate(1026.994 524.837)">
                                                        <path id="Path_243-7" data-name="Path 243"
                                                              d="M1753.066,977.613c-1.083,7.555-4.321,12.393-12.4,22.631l-34.592,44.014c-5.4,7.007-9.7,12.935-9.7,24.252v26.748h4.829l.006-.038c0-11.315,1.078-15.633,6.477-22.631l32.975-41.95c8.081-10.229,12.037-15.332,12.884-27.31,1.16-16.382,1.676-25.716,1.676-25.716Z"
                                                              transform="translate(-1696.377 -977.613)" fill="#bfbea7"/>
                                                    </g>
                                                    <g id="leaf-right-fill-reg-8" data-name="leaf-right-fill-reg"
                                                       transform="translate(1026.994 583.659)">
                                                        <path id="Path_243-8" data-name="Path 243"
                                                              d="M1753.066,977.613c-1.083,7.555-4.321,12.393-12.4,22.631l-34.592,44.014c-5.4,7.007-9.7,12.935-9.7,24.252v26.748h4.829l.006-.038c0-11.315,1.078-15.633,6.477-22.631l32.975-41.95c8.081-10.229,12.037-15.332,12.884-27.31,1.16-16.382,1.676-25.716,1.676-25.716Z"
                                                              transform="translate(-1696.377 -977.613)" fill="#bfbea7"/>
                                                    </g>
                                                    <g id="leaf-left-fill-reg-6" data-name="leaf-left-fill-reg"
                                                       transform="translate(973.146 385.699)">
                                                        <path id="leaf-left-fill-lrg-6" data-name="leaf-left-fill-lrg"
                                                              d="M1698.535,977.613c1.083,7.555,4.321,12.393,12.4,22.631l34.592,44.014c5.4,7.007,9.7,12.935,9.7,24.252v26.748H1750.4l-.006-.038c0-11.315-1.078-15.633-6.477-22.631l-32.975-41.95c-8.081-10.229-12.037-15.332-12.884-27.31-1.16-16.382-1.676-25.716-1.676-25.716Z"
                                                              transform="translate(-1696.377 -977.613)" fill="#bfbea7"/>
                                                    </g>
                                                    <g id="leaf-left-fill-reg-7" data-name="leaf-left-fill-reg"
                                                       transform="translate(973.146 444.521)">
                                                        <path id="leaf-left-fill-lrg-7" data-name="leaf-left-fill-lrg"
                                                              d="M1698.535,977.613c1.083,7.555,4.321,12.393,12.4,22.631l34.592,44.014c5.4,7.007,9.7,12.935,9.7,24.252v26.748H1750.4l-.006-.038c0-11.315-1.078-15.633-6.477-22.631l-32.975-41.95c-8.081-10.229-12.037-15.332-12.884-27.31-1.16-16.382-1.676-25.716-1.676-25.716Z"
                                                              transform="translate(-1696.377 -977.613)" fill="#bfbea7"/>
                                                    </g>
                                                    <g id="leaf-left-fill-reg-8" data-name="leaf-left-fill-reg"
                                                       transform="translate(973.146 562.166)">
                                                        <path id="leaf-left-fill-lrg-8" data-name="leaf-left-fill-lrg"
                                                              d="M1698.535,977.613c1.083,7.555,4.321,12.393,12.4,22.631l34.592,44.014c5.4,7.007,9.7,12.935,9.7,24.252v26.748H1750.4l-.006-.038c0-11.315-1.078-15.633-6.477-22.631l-32.975-41.95c-8.081-10.229-12.037-15.332-12.884-27.31-1.16-16.382-1.676-25.716-1.676-25.716Z"
                                                              transform="translate(-1696.377 -977.613)" fill="#bfbea7"/>
                                                    </g>
                                                    <g id="leaf-left-fill-reg-9" data-name="leaf-left-fill-reg"
                                                       transform="translate(973.146 620.988)">
                                                        <path id="leaf-left-fill-lrg-9" data-name="leaf-left-fill-lrg"
                                                              d="M1698.535,977.613c1.083,7.555,4.321,12.393,12.4,22.631l34.592,44.014c5.4,7.007,9.7,12.935,9.7,24.252v26.748H1750.4l-.006-.038c0-11.315-1.078-15.633-6.477-22.631l-32.975-41.95c-8.081-10.229-12.037-15.332-12.884-27.31-1.16-16.382-1.676-25.716-1.676-25.716Z"
                                                              transform="translate(-1696.377 -977.613)" fill="#bfbea7"/>
                                                    </g>
                                                    <g id="leaf-stem-fill-3" data-name="leaf-stem-fill"
                                                       transform="translate(1026.994 411.498)">
                                                        <rect id="leaf-stem-fill-4" data-name="leaf-stem-fill"
                                                              width="4.865"
                                                              height="441.082" fill="#bfbea7"/>
                                                    </g>
                                                    <g id="leaf-left-fill-lrg-10" data-name="leaf-left-fill-lrg"
                                                       transform="translate(956.99 282.019)">
                                                        <path id="leaf-left-fill-lrg-11" data-name="leaf-left-fill-lrg"
                                                              d="M1613.978,956.915c1.083,7.555,4.32,12.392,12.4,22.63l50.749,64.713c5.4,7.007,9.695,12.935,9.695,24.252v26.748H1682l-.006-.038c0-11.315-1.079-15.633-6.478-22.631l-49.132-62.649c-8.082-10.228-12.037-15.332-12.885-27.31-1.159-16.381-1.675-25.715-1.675-25.715Z"
                                                              transform="translate(-1611.82 -956.915)" fill="#bfbea7"/>
                                                    </g>
                                                </g>
                                                <g id="Group_1910" data-name="Group 1910"
                                                   transform="translate(-166.99 802.152)">
                                                    <g id="leaf-right-fill-reg-9" data-name="leaf-right-fill-reg"
                                                       transform="translate(1026.994 466.014)">
                                                        <path id="Path_243-9" data-name="Path 243"
                                                              d="M1753.066,977.613c-1.083,7.555-4.321,12.393-12.4,22.631l-34.592,44.014c-5.4,7.007-9.7,12.935-9.7,24.252v26.748h4.829l.006-.038c0-11.315,1.078-15.633,6.477-22.631l32.975-41.95c8.081-10.229,12.037-15.332,12.884-27.31,1.16-16.382,1.676-25.716,1.676-25.716Z"
                                                              transform="translate(-1696.377 -977.613)" fill="#bfbea7"/>
                                                    </g>
                                                    <g id="leaf-right-fill-reg-10" data-name="leaf-right-fill-reg"
                                                       transform="translate(1026.994 524.837)">
                                                        <path id="Path_243-10" data-name="Path 243"
                                                              d="M1753.066,977.613c-1.083,7.555-4.321,12.393-12.4,22.631l-34.592,44.014c-5.4,7.007-9.7,12.935-9.7,24.252v26.748h4.829l.006-.038c0-11.315,1.078-15.633,6.477-22.631l32.975-41.95c8.081-10.229,12.037-15.332,12.884-27.31,1.16-16.382,1.676-25.716,1.676-25.716Z"
                                                              transform="translate(-1696.377 -977.613)" fill="#bfbea7"/>
                                                    </g>
                                                    <g id="leaf-right-fill-reg-11" data-name="leaf-right-fill-reg"
                                                       transform="translate(1026.994 583.659)">
                                                        <path id="Path_243-11" data-name="Path 243"
                                                              d="M1753.066,977.613c-1.083,7.555-4.321,12.393-12.4,22.631l-34.592,44.014c-5.4,7.007-9.7,12.935-9.7,24.252v26.748h4.829l.006-.038c0-11.315,1.078-15.633,6.477-22.631l32.975-41.95c8.081-10.229,12.037-15.332,12.884-27.31,1.16-16.382,1.676-25.716,1.676-25.716Z"
                                                              transform="translate(-1696.377 -977.613)" fill="#bfbea7"/>
                                                    </g>
                                                    <g id="leaf-left-fill-reg-10" data-name="leaf-left-fill-reg"
                                                       transform="translate(973.146 562.166)">
                                                        <path id="leaf-left-fill-lrg-12" data-name="leaf-left-fill-lrg"
                                                              d="M1698.535,977.613c1.083,7.555,4.321,12.393,12.4,22.631l34.592,44.014c5.4,7.007,9.7,12.935,9.7,24.252v26.748H1750.4l-.006-.038c0-11.315-1.078-15.633-6.477-22.631l-32.975-41.95c-8.081-10.229-12.037-15.332-12.884-27.31-1.16-16.382-1.676-25.716-1.676-25.716Z"
                                                              transform="translate(-1696.377 -977.613)" fill="#bfbea7"/>
                                                    </g>
                                                    <g id="leaf-left-fill-reg-11" data-name="leaf-left-fill-reg"
                                                       transform="translate(973.146 620.988)">
                                                        <path id="leaf-left-fill-lrg-13" data-name="leaf-left-fill-lrg"
                                                              d="M1698.535,977.613c1.083,7.555,4.321,12.393,12.4,22.631l34.592,44.014c5.4,7.007,9.7,12.935,9.7,24.252v26.748H1750.4l-.006-.038c0-11.315-1.078-15.633-6.477-22.631l-32.975-41.95c-8.081-10.229-12.037-15.332-12.884-27.31-1.16-16.382-1.676-25.716-1.676-25.716Z"
                                                              transform="translate(-1696.377 -977.613)" fill="#bfbea7"/>
                                                    </g>
                                                    <g id="leaf-stem-fill-5" data-name="leaf-stem-fill"
                                                       transform="translate(1026.994 549.498)">
                                                        <rect id="leaf-stem-fill-6" data-name="leaf-stem-fill"
                                                              width="4.865"
                                                              height="303.082" fill="#bfbea7"/>
                                                    </g>
                                                    <g id="leaf-left-fill-lrg-14" data-name="leaf-left-fill-lrg"
                                                       transform="translate(956.99 423.822)">
                                                        <path id="leaf-left-fill-lrg-15" data-name="leaf-left-fill-lrg"
                                                              d="M1613.978,956.915c1.083,7.555,4.32,12.392,12.4,22.63l50.749,64.713c5.4,7.007,9.695,12.935,9.695,24.252v26.748H1682l-.006-.038c0-11.315-1.079-15.633-6.478-22.631l-49.132-62.649c-8.082-10.228-12.037-15.332-12.885-27.31-1.159-16.381-1.675-25.715-1.675-25.715Z"
                                                              transform="translate(-1611.82 -956.915)" fill="#bfbea7"/>
                                                    </g>
                                                </g>
                                                <g id="Group_1907" data-name="Group 1907"
                                                   transform="translate(265.854 802.152)">
                                                    <g id="leaf-right-fill-lrg-2" data-name="leaf-right-fill-lrg"
                                                       transform="translate(1026.994 212.848)">
                                                        <path id="Path_242-2" data-name="Path 242"
                                                              d="M1684.667,956.915c-1.083,7.555-4.32,12.392-12.4,22.63l-50.75,64.713c-5.4,7.007-9.7,12.935-9.7,24.252v26.748h4.828l.006-.038c0-11.315,1.079-15.633,6.478-22.631l49.133-62.649c8.082-10.228,12.037-15.332,12.885-27.31,1.159-16.381,1.675-25.715,1.675-25.715Z"
                                                              transform="translate(-1611.82 -956.915)" fill="#bfbea7"/>
                                                    </g>
                                                    <g id="leaf-right-fill-reg-12" data-name="leaf-right-fill-reg"
                                                       transform="translate(1026.994 295.547)">
                                                        <path id="Path_243-12" data-name="Path 243"
                                                              d="M1753.066,977.613c-1.083,7.555-4.321,12.393-12.4,22.631l-34.592,44.014c-5.4,7.007-9.7,12.935-9.7,24.252v26.748h4.829l.006-.038c0-11.315,1.078-15.633,6.477-22.631l32.975-41.95c8.081-10.229,12.037-15.332,12.884-27.31,1.16-16.382,1.676-25.716,1.676-25.716Z"
                                                              transform="translate(-1696.377 -977.613)" fill="#bfbea7"/>
                                                    </g>
                                                    <g id="leaf-right-fill-reg-13" data-name="leaf-right-fill-reg"
                                                       transform="translate(1026.994 351.191)">
                                                        <path id="Path_243-13" data-name="Path 243"
                                                              d="M1753.066,977.613c-1.083,7.555-4.321,12.393-12.4,22.631l-34.592,44.014c-5.4,7.007-9.7,12.935-9.7,24.252v26.748h4.829l.006-.038c0-11.315,1.078-15.633,6.477-22.631l32.975-41.95c8.081-10.229,12.037-15.332,12.884-27.31,1.16-16.382,1.676-25.716,1.676-25.716Z"
                                                              transform="translate(-1696.377 -977.613)" fill="#bfbea7"/>
                                                    </g>
                                                    <g id="leaf-right-fill-reg-14" data-name="leaf-right-fill-reg"
                                                       transform="translate(1026.994 407.192)">
                                                        <path id="Path_243-14" data-name="Path 243"
                                                              d="M1753.066,977.613c-1.083,7.555-4.321,12.393-12.4,22.631l-34.592,44.014c-5.4,7.007-9.7,12.935-9.7,24.252v26.748h4.829l.006-.038c0-11.315,1.078-15.633,6.477-22.631l32.975-41.95c8.081-10.229,12.037-15.332,12.884-27.31,1.16-16.382,1.676-25.716,1.676-25.716Z"
                                                              transform="translate(-1696.377 -977.613)" fill="#bfbea7"/>
                                                    </g>
                                                    <g id="leaf-right-fill-reg-15" data-name="leaf-right-fill-reg"
                                                       transform="translate(1026.994 466.014)">
                                                        <path id="Path_243-15" data-name="Path 243"
                                                              d="M1753.066,977.613c-1.083,7.555-4.321,12.393-12.4,22.631l-34.592,44.014c-5.4,7.007-9.7,12.935-9.7,24.252v26.748h4.829l.006-.038c0-11.315,1.078-15.633,6.477-22.631l32.975-41.95c8.081-10.229,12.037-15.332,12.884-27.31,1.16-16.382,1.676-25.716,1.676-25.716Z"
                                                              transform="translate(-1696.377 -977.613)" fill="#bfbea7"/>
                                                    </g>
                                                    <g id="leaf-right-fill-reg-16" data-name="leaf-right-fill-reg"
                                                       transform="translate(1026.994 524.837)">
                                                        <path id="Path_243-16" data-name="Path 243"
                                                              d="M1753.066,977.613c-1.083,7.555-4.321,12.393-12.4,22.631l-34.592,44.014c-5.4,7.007-9.7,12.935-9.7,24.252v26.748h4.829l.006-.038c0-11.315,1.078-15.633,6.477-22.631l32.975-41.95c8.081-10.229,12.037-15.332,12.884-27.31,1.16-16.382,1.676-25.716,1.676-25.716Z"
                                                              transform="translate(-1696.377 -977.613)" fill="#bfbea7"/>
                                                    </g>
                                                    <g id="leaf-right-fill-reg-17" data-name="leaf-right-fill-reg"
                                                       transform="translate(1026.994 583.659)">
                                                        <path id="Path_243-17" data-name="Path 243"
                                                              d="M1753.066,977.613c-1.083,7.555-4.321,12.393-12.4,22.631l-34.592,44.014c-5.4,7.007-9.7,12.935-9.7,24.252v26.748h4.829l.006-.038c0-11.315,1.078-15.633,6.477-22.631l32.975-41.95c8.081-10.229,12.037-15.332,12.884-27.31,1.16-16.382,1.676-25.716,1.676-25.716Z"
                                                              transform="translate(-1696.377 -977.613)" fill="#bfbea7"/>
                                                    </g>
                                                    <g id="leaf-left-fill-reg-12" data-name="leaf-left-fill-reg"
                                                       transform="translate(973.146 326.877)">
                                                        <path id="leaf-left-fill-lrg-16" data-name="leaf-left-fill-lrg"
                                                              d="M1698.535,977.613c1.083,7.555,4.321,12.393,12.4,22.631l34.592,44.014c5.4,7.007,9.7,12.935,9.7,24.252v26.748H1750.4l-.006-.038c0-11.315-1.078-15.633-6.477-22.631l-32.975-41.95c-8.081-10.229-12.037-15.332-12.884-27.31-1.16-16.382-1.676-25.716-1.676-25.716Z"
                                                              transform="translate(-1696.377 -977.613)" fill="#bfbea7"/>
                                                    </g>
                                                    <g id="leaf-left-fill-reg-13" data-name="leaf-left-fill-reg"
                                                       transform="translate(973.146 385.699)">
                                                        <path id="leaf-left-fill-lrg-17" data-name="leaf-left-fill-lrg"
                                                              d="M1698.535,977.613c1.083,7.555,4.321,12.393,12.4,22.631l34.592,44.014c5.4,7.007,9.7,12.935,9.7,24.252v26.748H1750.4l-.006-.038c0-11.315-1.078-15.633-6.477-22.631l-32.975-41.95c-8.081-10.229-12.037-15.332-12.884-27.31-1.16-16.382-1.676-25.716-1.676-25.716Z"
                                                              transform="translate(-1696.377 -977.613)" fill="#bfbea7"/>
                                                    </g>
                                                    <g id="leaf-left-fill-reg-14" data-name="leaf-left-fill-reg"
                                                       transform="translate(973.146 444.521)">
                                                        <path id="leaf-left-fill-lrg-18" data-name="leaf-left-fill-lrg"
                                                              d="M1698.535,977.613c1.083,7.555,4.321,12.393,12.4,22.631l34.592,44.014c5.4,7.007,9.7,12.935,9.7,24.252v26.748H1750.4l-.006-.038c0-11.315-1.078-15.633-6.477-22.631l-32.975-41.95c-8.081-10.229-12.037-15.332-12.884-27.31-1.16-16.382-1.676-25.716-1.676-25.716Z"
                                                              transform="translate(-1696.377 -977.613)" fill="#bfbea7"/>
                                                    </g>
                                                    <g id="leaf-left-fill-reg-15" data-name="leaf-left-fill-reg"
                                                       transform="translate(973.146 503.344)">
                                                        <path id="leaf-left-fill-lrg-19" data-name="leaf-left-fill-lrg"
                                                              d="M1698.535,977.613c1.083,7.555,4.321,12.393,12.4,22.631l34.592,44.014c5.4,7.007,9.7,12.935,9.7,24.252v26.748H1750.4l-.006-.038c0-11.315-1.078-15.633-6.477-22.631l-32.975-41.95c-8.081-10.229-12.037-15.332-12.884-27.31-1.16-16.382-1.676-25.716-1.676-25.716Z"
                                                              transform="translate(-1696.377 -977.613)" fill="#bfbea7"/>
                                                    </g>
                                                    <g id="leaf-left-fill-reg-16" data-name="leaf-left-fill-reg"
                                                       transform="translate(973.146 562.166)">
                                                        <path id="leaf-left-fill-lrg-20" data-name="leaf-left-fill-lrg"
                                                              d="M1698.535,977.613c1.083,7.555,4.321,12.393,12.4,22.631l34.592,44.014c5.4,7.007,9.7,12.935,9.7,24.252v26.748H1750.4l-.006-.038c0-11.315-1.078-15.633-6.477-22.631l-32.975-41.95c-8.081-10.229-12.037-15.332-12.884-27.31-1.16-16.382-1.676-25.716-1.676-25.716Z"
                                                              transform="translate(-1696.377 -977.613)" fill="#bfbea7"/>
                                                    </g>
                                                    <g id="leaf-left-fill-reg-17" data-name="leaf-left-fill-reg"
                                                       transform="translate(973.146 620.988)">
                                                        <path id="leaf-left-fill-lrg-21" data-name="leaf-left-fill-lrg"
                                                              d="M1698.535,977.613c1.083,7.555,4.321,12.393,12.4,22.631l34.592,44.014c5.4,7.007,9.7,12.935,9.7,24.252v26.748H1750.4l-.006-.038c0-11.315-1.078-15.633-6.477-22.631l-32.975-41.95c-8.081-10.229-12.037-15.332-12.884-27.31-1.16-16.382-1.676-25.716-1.676-25.716Z"
                                                              transform="translate(-1696.377 -977.613)" fill="#bfbea7"/>
                                                    </g>
                                                    <g id="leaf-stem-fill-7" data-name="leaf-stem-fill"
                                                       transform="translate(1026.994 347.498)">
                                                        <rect id="leaf-stem-fill-8" data-name="leaf-stem-fill"
                                                              width="4.865"
                                                              height="505.082" fill="#bfbea7"/>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</main>
