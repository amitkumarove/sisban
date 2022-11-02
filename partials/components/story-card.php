<?php $post = $args['post'] ?>
<?php $title = get_the_title($post->ID) ?>
<?php $link = get_permalink($post->ID) ?>
<?php //$excerpt = get_the_excerpt($post->ID); ?>
<?php $image = get_the_post_thumbnail($post->ID, 'medium'); ?>
<?php
$fields = get_field('content_blocks', $post->ID);
$excerpt = $fields[0]['content_copy']
?>

<a href="<?php echo $link ?>" title="<?php echo $title ?>" class="story-card">
    <div class="story-card__image">
        <?php echo $image ?>
    </div>
    <div class="story-card__content">
        <h2 class="story-card__title"><?php echo $title ?></h2>
        <div class="story-card__summary">
            <?php echo $excerpt; ?>
        </div>
        <p class="story-card__more read-more">
            <?php lp_the_label('read_more'); ?>
        </p>
    </div>
</a>
