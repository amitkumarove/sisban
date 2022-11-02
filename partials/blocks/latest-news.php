<?php
$newsCategoryId = get_field('news_category');
?>
<?php
// the query
$args      = [
    'post_type'      => 'post',
    'posts_per_page' => 3,
    'order'          => 'DESC',
    'orderby'        => 'ID'
];

if ($newsCategoryId) {
    $args['tax_query'] = [
        [
            'taxonomy' => 'category',
            'field'    => 'term_taxonomy_id',
            'terms'    => $newsCategoryId,
        ]
    ];
}

$the_query = new WP_Query($args);
?>
<?php if ($the_query->have_posts()) : ?>
    <main class="latest-news">
        <div class="container">
            <section class="latest-news-block">
                <h2>Latest News.</h2>
                <div class="latest-news-carousel">
                    <?php while($the_query->have_posts()) : $the_query->the_post(); ?>
                        <div>
                            <div class="latest-news-carousel__slide">

                                <div class="typography latest-news-carousel__slide__inner">
                                    <time datetime="#"><?php echo get_the_date('d.m.Y', get_the_ID()); ?></time>
                                    <h3><a href="<?php echo get_permalink(get_the_ID()); ?>"
                                           title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
                                </div>

                                <div class="latest-news-carousel__slide__image">
                                    <?=get_the_post_thumbnail(null, 'small');?>
                                </div>

                            </div>
                        </div>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                </div>
                <a class="link with-arrow dark" href="/about/news">View all news</a>
            </section>
        </div>
    </main>
<?php endif; ?>
