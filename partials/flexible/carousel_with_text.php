<div class="sisban-carousel">
    <?php lp_write_content_area_fields(); ?>

    <div id="sisbanCarousel" class="sisban-carousel__slick">
        <?php while(have_rows('slides')):the_row() ?>
            <div class="sisban-carousel__slick__slider">

                <?php lp_write_img_tag(get_sub_field('image')); ?>

                <!-- <div class="overlay"></div> -->

                <div class="container">
                    <?php lp_write_content_area_fields(); ?>
                </div>

            </div>
        <?php endwhile; ?>
    </div>


    <div class="sisban-carousel__design">
        <svg id="sisbanCarouselDesign" xmlns="http://www.w3.org/2000/svg" width="369" height="604" viewBox="0 0 369 604">
            <g id="Group_2131" data-name="Group 2131" transform="translate(-966.001 -1323)">
                <path id="Path_196" data-ignore="true" data-name="Path 196" d="M771.53,463.789s-30,0-30-40c0,40-30,40-30,40Z" transform="translate(2046.531 1787.789) rotate(180)" fill="#f4f4f0" stroke="#f4f4f0" stroke-width="2"/>
                <path id="Path_197" data-ignore="true" data-name="Path 197" d="M771.53,463.789s-30,0-30-40c0,40-30,40-30,40Z" transform="translate(254.471 1462.211)" fill="#f4f4f0" stroke="#f4f4f0" stroke-width="2"/>
                <path id="Path_198" data-name="Path 198" d="M369.32,1096.865v-45.9c0-34.977,17.256-67.988,46.745-89.422l215.7-156.931c29.371-21.349,46.559-54.23,46.559-89.068V543.293" transform="translate(626.68 810.439)" fill="none" stroke="#f4f4f0" stroke-width="2"/>
            </g>    
        </svg>
    </div>

    <div class="container progressBarContainer">
        <div class="item">
            <span class="progressBar"></span>
        </div>
    </div>
    
</div>

<script>
    $(document).ready(function () {
        
        const carouselLineAnimation = new Vivus('sisbanCarouselDesign');

        $('#sisbanCarousel').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
        carouselLineAnimation.reset();
        });

        $('#sisbanCarousel').on('afterChange', function (event, slick, currentSlide, nextSlide) {
        carouselLineAnimation.play();
        });
    })
</script>