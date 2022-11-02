<?php 
  $the_query = new WP_Query(
      array(
        'post_type' => 'post',
        'posts_per_page' => 3,
        'order' => 'DESC',
        'orderby' => 'ID',
        'cat' => $postcats[0]->cat_ID
      )
  ); 
?>

<?php if ($the_query->have_posts()) : ?>
  <div class="container">
        <section class="related-news-block">
          <h2>Related News.</h2>
          <div class="row">
              <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                <div class="col-12 col-md-6 col-lg-4">
                  <article class="related-news-block__box">
                    <div class="related-news-block__box__image">
                      <a href="<?php echo get_permalink(get_the_ID()); ?>" title="<?php the_title(); ?>">
                      <?php echo get_the_post_thumbnail(); ?></a>
                    </div>
                    <div class="typography related-news-block__box__inner">
                      <time datetime="#"><?php echo get_the_date('d.m.Y', get_the_ID()); ?></time>
                      <h3 class="related-news-block__box__inner__title">
                        <a href="<?php echo get_permalink(get_the_ID()); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                      </h3>
                    </div>
                  </article>
                </div>
              <?php endwhile; ?>
              <?php wp_reset_postdata(); ?>
          </div>
          <a class="link with-arrow dark" href="/about/news">View all news</a>
        </section>
  </div>
<?php endif; ?>
