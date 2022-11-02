<?php
global $wp_query;
$pagename = $wp_query->queried_object->post_name;
$image = get_sub_field('image');
$imageArray = get_sub_field('image_banner');
?>
<div class="page-banner page-banner--<?php the_sub_field('banner_type') ?> <?= $pagename; ?>">
    <div class="page-banner__image <?= ($imageArray && sizeof($imageArray) > 1) ? 'slideshowBG' : '' ?>" style="background-image: url(<?php echo $image['sizes']['container_width'] ?>)">
    </div>
    <?php if (is_front_page()): ?>
        <!-- <object class="page-banner__wheat" id="mywheat" type="image/svg+xml" data="<?php // echo get_template_directory_uri() ?>/images/banner-wheat.svg"></object> -->
        <svg class="page-banner__wheat" id="mywheat" xmlns="http://www.w3.org/2000/svg" width="135.848" height="433.98" viewBox="0 0 135.848 433.98">
            <g id="Group_1898" data-name="Group 1898" transform="translate(-1024.802 -218.317)">
                <g id="leaf-left-line-reg-5" data-name="leaf-left-line-reg" transform="translate(1025.801 402.158)">
                    <path class="animate-me" id="leaf-left-line-reg-6" data-name="leaf-left-line-reg" d="M1911.867,974.765c1.083,7.555,4.32,12.393,12.4,22.631l36.749,46.862c5.4,7.007,9.7,12.935,9.7,24.252v33.1c0-11.315-1.078-15.632-6.477-22.631l-37.809-48.337c-8.082-10.229-12.037-15.332-12.885-27.31Z" transform="translate(-1911.867 -974.765)" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="2"/>
                </g>
                <g id="leaf-right-line-reg-2" data-name="leaf-right-line-reg" transform="translate(1084.646 363)">
                    <path class="animate-me" id="Path_245-2" data-name="Path 245" d="M1970.713,974.765c-1.083,7.555-4.32,12.393-12.4,22.631l-36.749,46.862c-5.4,7.007-9.7,12.935-9.7,24.252v33.1c0-11.315,1.078-15.632,6.477-22.631l37.809-48.337c8.082-10.229,12.037-15.332,12.885-27.31Z" transform="translate(-1911.867 -974.765)" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="2"/>
                </g>
                <g id="leaf-left-line-reg-3" data-name="leaf-left-line-reg" transform="translate(1025.801 338.737)">
                    <path class="animate-me" id="leaf-left-line-reg-4" data-name="leaf-left-line-reg" d="M1911.867,974.765c1.083,7.555,4.32,12.393,12.4,22.631l36.749,46.862c5.4,7.007,9.7,12.935,9.7,24.252v33.1c0-11.315-1.078-15.632-6.477-22.631l-37.809-48.337c-8.082-10.229-12.037-15.332-12.885-27.31Z" transform="translate(-1911.867 -974.765)" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="2"/>
                </g>
                <g id="leaf-right-line-reg" transform="translate(1084.646 299.579)">
                    <path class="animate-me" id="Path_245" data-name="Path 245" d="M1970.713,974.765c-1.083,7.555-4.32,12.393-12.4,22.631l-36.749,46.862c-5.4,7.007-9.7,12.935-9.7,24.252v33.1c0-11.315,1.078-15.632,6.477-22.631l37.809-48.337c8.082-10.229,12.037-15.332,12.885-27.31Z" transform="translate(-1911.867 -974.765)" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="2"/>
                </g>
                <g id="leaf-left-line-reg" transform="translate(1025.801 275.316)">
                    <path class="animate-me" id="leaf-left-line-reg-2" data-name="leaf-left-line-reg" d="M1911.867,974.765c1.083,7.555,4.32,12.393,12.4,22.631l36.749,46.862c5.4,7.007,9.7,12.935,9.7,24.252v33.1c0-11.315-1.078-15.632-6.477-22.631l-37.809-48.337c-8.082-10.229-12.037-15.332-12.885-27.31Z" transform="translate(-1911.867 -974.765)" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="2"/>
                </g>
                <g id="leaf-right-line-lrg" transform="translate(1084.646 218.459)">
                    <path class="animate-me" id="Path_244" data-name="Path 244" d="M1898.227,954.066c-1.083,7.556-4.321,12.393-12.4,22.631l-52.908,67.561c-5.4,7.007-9.7,12.935-9.7,24.252v33.1c0-11.315,1.079-15.632,6.478-22.631l53.968-69.036c8.082-10.228,12.037-15.332,12.885-27.31Z" transform="translate(-1823.221 -954.066)" fill="none" stroke="#fff" stroke-miterlimit="10" stroke-width="2"/>
                </g>
                <line id="Line_70" data-name="Line 70" y2="124.798" transform="translate(1084.646 527.5)" fill="none" stroke="#fff" stroke-width="2"/>
            </g>
        </svg>
    <?php endif ?>

    <div class="container">
        <div class="page-banner__content typography">
            <?php if(get_sub_field('subline') || lp_get_post_terms()): ?>
            <p class="page-banner__content__subline subline">
                <?php
                $sublineLink = get_sub_field('subline_link') ? get_sub_field('subline_link') : null;
                $subline = get_sub_field('subline') ? get_sub_field('subline') : lp_get_post_terms();
                ?>
                <?php if($sublineLink): ?>
                <?php lp_the_link($sublineLink, $subline, '', false, false); ?>
                <?php else: ?>
                <?php echo $subline ?>
                <?php endif ?>
            </p>
            <?php endif; ?>
            <?php if($icon = get_sub_field('icon')): ?>
            <div class="page-banner__content__icon">
                <?php lp_write_img_tag($icon) ?>
            </div>
            <?php endif; ?>
            <?php lp_write_content_area_fields(); ?>
        </div>
    </div>

    <?php if (is_front_page()): ?>
        <p class="page-banner__scrollbottom animate__animated animate__delay-3s animate__slow m-0">Scroll</p>
    <?php endif ?>

</div>
<script>
    $(document).ready(function () {
        $(".page-banner__scrollbottom").addClass('animate__fadeInUp');

        $(".page-banner__scrollbottom").click(function() {
            $('html, body').animate({
                scrollTop: parseInt($(this).offset().top + 50)
            }, 500);
        });

        // Leaf Animation
        let tl = gsap.timeline({
            // yes, we can add it to an entire timeline!
            scrollTrigger: {
                trigger: ".landing-page",
                pin: true,   // pin the trigger element while active
                start: "top top", // when the top of the trigger hits the top of the viewport
                end: "bottom center", // end after scrolling 500px beyond the start
                scrub: 1, // smooth scrubbing, takes 1 second to "catch up" to the scrollbar
            }
        });

        tl
        .fromTo("#Line_70", {opacity:"0"}, {duration: 0.3, opacity:"1", stagger: 0.1})
        .fromTo(".animate-me", { opacity:"0"}, {duration: 1, opacity:"1", stagger: 0.2}, "+=0.1");
        // new Vivus('mywheat', { type: 'scenario', duration: 200, reverseStack: true, animTimingFunction: Vivus.EASE_IN });
    });

    <?php if($imageArray && sizeof($imageArray) > 1): ?>
    $(document).ready(function() {
        var timeToDisplay = 5000;
        var slideshow = $('.slideshowBG');
        <?php
            echo "var urls = [";
            foreach ($imageArray as $imgurl) {
                $urlprint = $imgurl['img']['sizes']['container_width'];
                echo "'$urlprint',";
            }
            echo "]";
        ?>

        var index = 0;
        var transition = function() {
            var url = urls[index];
            slideshow.css('background-image', 'url(' + url + ')');
            index = index + 1;
            if (index > urls.length - 1) { index = 0; }
        };

        var run = function() {
            transition();
            slideshow.fadeIn('slow', function() {
                setTimeout(function() {
                    slideshow.fadeOut('slow', run);
                }, timeToDisplay);
            });
        }
        run();
    });
    <?php endif ?>
</script>
