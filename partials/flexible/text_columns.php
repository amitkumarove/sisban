<!-- <h1>Block: Text columns</h1> -->
<?php
    global $wp_query;
    $pagename = $wp_query->queried_object->post_name;
?>
<div class="text-columns text-columns--<?= $pagename; ?>">
    <div class="container">
        <div class="row">
            <div class="col-12 col-xl-12 left-col">
                <?php
                    lp_write_content_area_fields();
                ?>
            </div>
        </div>

        <div class="row">
            <?php
            $i = 1;
            while(have_rows('columns')):the_row() ?>
                <div class="col-12 col-lg-6 col-xl-4">
                    <?php lp_write_img_tag(get_sub_field('icon')); ?>
                    <?php lp_write_content_area_fields(); ?>
                </div>
            <?php $i++; endwhile; ?>
        </div>

        <img class="text-columns--<?= $pagename; ?>__leaf" src="<?php echo lp_theme_url(); ?>/images/intro-graphics.png" alt="info">

    </div>
</div>

<script>

// $(document).ready(function() {

//     const svgAnimation = document.querySelectorAll('.embedded-svg');

//     const config = {
//         rootMargin: '50px',
//         threshold: [0, 0.25, 0.75, 1]
//     };

//     observer = new IntersectionObserver((entries) => {
//       entries.forEach(entry => {
//         if (entry.intersectionRatio > 0) {
//             $(".embedded-svg > svg").each(function(){
//                 gsap.fromTo(this, { opacity:"0"}, {duration: 1, opacity:"1"});
//             });
//         } else {
//             $(".embedded-svg > svg").each(function(){
//                 gsap.fromTo(this, { opacity:"1"}, {duration: 1, opacity:"0"});
//             });
//         }
//       });
//     }, config);

//     svgAnimation.forEach(image => {
//       observer.observe(image);
//     });
// });
</script>
