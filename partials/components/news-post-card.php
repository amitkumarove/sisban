<article class="news-post-card">
    <?php if ($thumbnail = get_the_post_thumbnail(get_the_ID())): ?>
        <div class="news-post-card__image <?=get_post_type()?>">
            <a href="<?php the_permalink() ?>"
               title="<?php echo esc_attr(get_the_title()) ?>">
                <?php echo $thumbnail ?>
            </a>
        </div>
    <?php endif; ?>
    <div class="typography news-post-card__inner">
        <p class="news-post-card__inner__meta">
            <time datetime="#"><?php echo get_the_date('m.Y', get_the_ID()) ?></time>
        </p>
        <h3 class="news-post-card__inner__title">
            <a href="<?php the_permalink() ?>" title="<?php echo esc_attr(the_title()) ?>">
                <?php the_title() ?>
            </a></h3>
    </div>
</article>
