
<!-- Show/Hiden "Latest News Block" -->
<?php
    // Fix for getting invalid or missing acf fileds for this page, query page objects instead of $post->ID
    $pageObject = get_queried_object();

    if($pageObject) {
        if (get_field('show_latest_news_block', $pageObject->ID) && get_field('show_latest_news_block', $pageObject->ID) === true) {
            include_once 'partials/blocks/latest-news.php';
        }
    }
?>

<footer <?php echo body_class('footer') ?> >
    <?php wp_footer() ?>
    <script>
      if (lazyLoadInstance) {
        lazyLoadInstance.update();
      }
    </script>
    <?php
        $slug = basename(get_permalink());
    ?>
    <?php if ($slug === 'contact') : ?>
        <script>
            let zoomLevel = 18;
            let mapUk;
            let mapUKGeo = { lat: 51.50823439641364, lng: -0.1418343167555472};
            let mapSaudiGeo = { lat: 24.736801238189027, lng: 46.64793665741469};
            let mapSaudi;
            let markerIcon = "/wp-content/themes/sisban/images/map-marker.png";
            let markerUK;
            let markerSaudi;

            const styles = [
                    {
                        featureType: "poi.business",
                        stylers: [{ visibility: "off" }],
                    },
                    {
                        featureType: "transit",
                        elementType: "labels.icon",
                        stylers: [{ visibility: "off" }],
                    },
                    {
                        stylers: [{
                        saturation: -100
                        }],
                    },
            ];

            function initMap() {
                // UK map
                mapUk = new google.maps.Map(document.getElementById("gmap-uk"), {
                    center: mapUKGeo,
                    zoom: zoomLevel,
                    icon: markerIcon,
                    styles: styles
                });
                // UK map marker
                markerUK = new google.maps.Marker({
                    position: new google.maps.LatLng(mapUKGeo.lat, mapUKGeo.lng),
                    map: mapUk,
                    icon: markerIcon
                });
                // UK map marker info window
                const ukInfoWindow = new google.maps.InfoWindow({
                    content: "<strong>LONDON</strong><br/>First Floor, <br/>11 Dover St. <br/>Mayfair, <br/>London <br/>W1S 4LH <br/>United Kingdom",
                });
                // UK map marker, click handler
                markerUK.addListener("click", () => {
                    ukInfoWindow.open({
                    anchor: markerUK,
                    mapUk,
                    shouldFocus: false,
                    });
                });

                // Saudia map
                mapSaudi = new google.maps.Map(document.getElementById("gmap-saudia"), {
                    center: mapSaudiGeo,
                    zoom: zoomLevel,
                    styles: styles
                });
                // Saudia map marker
                markerSaudi = new google.maps.Marker({
                    position: new google.maps.LatLng(mapSaudiGeo.lat, mapSaudiGeo.lng),
                    map: mapSaudi,
                    icon: markerIcon
                });
                // Saudia map marker info window
                const saudiaInfoWindow = new google.maps.InfoWindow({
                    content: "<strong>RIYADH</strong><br/>Nora Square, <br/>Al Mohammadiah. <br/>Riyadh, <br/>Saudi Arabia",
                });
                // Saudia map marker, click handler
                markerSaudi.addListener("click", () => {
                    saudiaInfoWindow.open({
                    anchor: markerSaudi,
                    mapSaudi,
                    shouldFocus: false,
                    });
                });
            }
        </script>
        <script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyDMzE8wEHkYEF-75plw1Q7XL9zf4jfFfic&callback=initMap' async></script>
    <?php endif; ?>
    <div class="container">

        <div class="footer-headtext">
            <h3>Inspired Investment. <span>Remarkable Impact.</span></h3>
        </div>

        <div class="footer-menus">
            <div class="row">

                <div class="col-12 col-md-4 col-lg-3">
                    <?php
                    $menu_items = lp_get_menu_location_menu_items('footer-menu-col-1');
                    ?>
                    <?php foreach($menu_items as $item): ?>
                        <?php if ($item->menu_item_parent === '0'): ?>
                            <?php $sub_items = get_nav_menu_item_children($item->ID, $menu_items); ?>
                            <?php if ($sub_items): ?>
                                <p class="heading">
                                    <?php echo $item->title ?>
                                </p>
                                <ul>
                                    <?php foreach($sub_items as $sub_item): ?>
                                        <li>
                                            <?php lp_the_link($sub_item, null, 'heading ' . get_field('class_name', $item->ID), false, false) ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php else: ?>
                                <p class="heading">
                                    <?php lp_the_link($item, null, get_field('class_name', $item->ID), false, false) ?>
                                </p>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>

                <div class="col-12 col-md-4 col-lg-3">
                    <?php
                    $menu_items = lp_get_menu_location_menu_items('footer-menu-col-2');
                    ?>
                    <?php foreach($menu_items as $item): ?>
                        <?php if ($item->menu_item_parent === '0'): ?>
                            <?php $sub_items = get_nav_menu_item_children($item->ID, $menu_items); ?>
                            <?php if ($sub_items): ?>
                                <p class="heading">
                                    <?php echo $item->title ?>
                                </p>
                                <ul>
                                    <?php foreach($sub_items as $sub_item): ?>
                                        <li>
                                            <?php lp_the_link($sub_item, null, 'heading ' . get_field('class_name', $item->ID), false, false) ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php else: ?>
                                <p class="heading">
                                    <?php lp_the_link($item, null, get_field('class_name', $item->ID), false, false) ?>
                                </p>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>

                <div class="col-12 col-md-4 col-lg-3 offset-lg-3 contact-section">
                    <p class="heading">Offices</p>
                    <?php while(have_rows('addresses', 'global_content')): the_row() ?>
                    <p class="address">
                        <?php the_sub_field('address') ?>
                    </p>
                    <?php endwhile; ?>
                    <div class="social-icons">
                        <?php if(lp_get_label('linkedin_url')): ?>
                        <a href="<?php lp_the_label('linkedin_url') ?>" title="Sisban on LinkedIn" target="_blank" rel="noopener">
                            <svg xmlns="http://www.w3.org/2000/svg" width="17.5" height="17.5" viewBox="0 0 17.5 17.5">
                                <path id="Path_3" data-name="Path 3"
                                      d="M3.906,0H.273V-11.68H3.906Zm-1.8-13.281a2.028,2.028,0,0,1-1.484-.625A2.028,2.028,0,0,1,0-15.391a2.028,2.028,0,0,1,.625-1.484A2.028,2.028,0,0,1,2.109-17.5a2.028,2.028,0,0,1,1.484.625,2.028,2.028,0,0,1,.625,1.484,2.028,2.028,0,0,1-.625,1.484A2.028,2.028,0,0,1,2.109-13.281ZM17.5,0H13.867V-5.7a6.31,6.31,0,0,0-.234-2.031,1.644,1.644,0,0,0-1.68-1.055,1.83,1.83,0,0,0-1.758.938A4.361,4.361,0,0,0,9.8-5.781V0H6.211V-11.68H9.688v1.6h.039a3.122,3.122,0,0,1,1.25-1.289,3.851,3.851,0,0,1,2.188-.625,3.877,3.877,0,0,1,3.555,1.6A7.9,7.9,0,0,1,17.5-6.406Z"
                                      transform="translate(0 17.5)" fill="#fff"/>
                            </svg>
                        </a>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>

        <div class="sub-footer">
            <ul class="sub-footer__left">
                <li><p><?php lp_the_label('footer_copyright') ?></p></li>
                <?php
                $menu_items = lp_get_menu_location_menu_items('subfooter-menu');
                ?>
                <?php foreach($menu_items as $item): ?>
                    <li><?php lp_the_link($item, null, 'link ' . get_field('class_name', $item->ID), false, false) ?></li>
                <?php endforeach; ?>
            </ul>
            <a class="sub-footer__right link black" href="https://www.chaosdesign.com" title="Chaos Design" target="_blank" rel="noopener">Site by Chaos</a>
        </div>

    </div>

</footer>
</body>
</html>
