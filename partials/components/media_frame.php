<?php
$image_ratio = get_field('image_ratio') ? get_field('image_ratio') : get_sub_field('image_ratio');
?>
<div class="media-frame">
    <?php
    $video_platform = get_sub_field('video_platform') ? get_sub_field('video_platform') : get_field('video_platform')
    ?>
    <?php if ($video_platform !== 'none') : ?>
        <?php
        $video_code = "";
        if ($video_platform === 'embed') {
            $video_code = get_sub_field('html_embed_code') ? get_sub_field('html_embed_code') : get_field('html_embed_code');
        } elseif ($video_platform === 'url') {
            $video_code = get_sub_field('url') ? get_sub_field('url') : get_field('url');
        } else if ($video_platform === 'image') {
            $video_code = get_sub_field('image') ? get_sub_field('image') : get_field('image');
        } else {
            $video_code = get_sub_field('video_id') ? get_sub_field('video_id') : get_field('video_id');
        }
        ?>
        <?php if ($video_platform === 'url'): ?>
            <a class="media-frame__poster" href="<?php echo esc_attr($video_code) ?>" title="View the video" target="_blank">
        <?php else: ?>
            <div class="media-frame__poster" onclick="playVideo(event)">
        <?php endif; ?>
        <div class="media-frame__player">
            <div class="media-frame__player__plyr"
                 data-platform="<?php echo get_sub_field('video_platform') ? get_sub_field('video_platform') : get_field('video_platform') ?>"
                 data-video-code="<?php echo esc_attr($video_code) ?>"
            ></div>
        </div>
        <div class="media-frame__poster__image">
            <?php if ($image = get_sub_field('image')): ?>
                <?php lp_write_img_tag(get_sub_field('image') ? get_sub_field('image') : get_field('image'), $image_ratio ? $image_ratio : 'sixteennine'); ?>
            <?php endif ?>
            <?php if ( ! $image && $platform = get_sub_field('video_platform')): ?>
                <?php if ($platform === 'youtube'): ?>
                    <?php echo lp_get_video_poster_image($video_code, $platform) ?>
                <?php elseif ( ! $image && $platform === 'vimeo'): ?>
                    <?php echo lp_get_video_poster_image($video_code, $platform) ?>
                <?php elseif ( ! $image && $platform === 'image'): ?>
                    <?php echo lp_get_video_poster_image($video_code, $platform) ?>
                <?php endif; ?>
            <?php endif; ?>
        </div>
        <?php if ($video_platform !== 'image'): ?>
            <div class="media-frame__poster__play-button"></div>
        <?php endif; ?>

        <?php if ($video_platform !== 'url'): ?>
            </div>
        <?php else: ?>
            </a>
        <?php endif; ?>
    <?php else : ?>
        <div class="media-frame__poster__image">
            <?php lp_write_img_tag(get_sub_field('image') ? get_sub_field('image') : get_field('image'), $image_ratio ? $image_ratio : 'container_width'); ?>
        </div>
    <?php endif; ?>
</div>
