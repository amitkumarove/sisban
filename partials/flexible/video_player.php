<?php
$videos = get_sub_field('video_block');
// echo '<pre>'; print_r( $videos ); echo '</pre>';
?>
<section class="video-player">
    <div id="videoBlockNews" class="video-player__carousel">
        <?php while(have_rows('video_block')):the_row(); ?>   
            <?php lp_render_media_frame() ?>
        <?php endwhile; ?>   
    </div>
</section>
