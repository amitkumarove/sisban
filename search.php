<?php /* Template Name: Search Results Layout */ ?>

<?php
    get_header();
    $page =  $_REQUEST['page'] ??  1;
    $query = new WP_Query(
        array(
          's' => $_REQUEST['s'],
          'paged' => $page,
          'posts_per_page' => 9,
          'post_type' => array(
            'post', 'page', 'brands', 'facilities', 'location',
          )
        )
    );
    //print('<pre>');print_r($query);print('</pre>');exit;
    ?>

<section class="search-results">

    <!-- page banner  -->
    <div class="banner typography">
        <div class="wrapper">
            <h3>Searched "<?php echo ucwords(urldecode($_REQUEST['s'])); ?>"</h3>
        </div>
    </div>

    <div class="search-results__results typography">
        <div class="wrapper">
            <?php if ($query->found_posts > 0) : ?>
                <div class="text">
                    <p>Total search results : <span> <?php echo $query->found_posts; ?> </span></p>
                    <div class="icons">
                        <div id="list-style" class="icon">
                            <img src="<?php echo lp_theme_url(); ?>/images/list_icon.png" alt="list-style">
                        </div>
                        <div id="box-style" class="icon">
                            <img src="<?php echo lp_theme_url(); ?>/images/box_icon.png" alt="box-style">
                        </div>
                    </div>
                </div>
                <ul id="apply-style" class="search-results__results__box box-style">
                    <?php
                    while($query->have_posts()) : 
                        $query->the_post();
                        $featured_img_url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()), 'thumbnail');

                        ?>
                        <li class="search-results__results__box__result">
                        <a href="<?php echo get_post_permalink(); ?>" class="inner">
                            <?php if($featured_img_url) : ?>
                                <div class="image">
                                    <img src="<?php echo $featured_img_url; ?>" alt="">
                                </div>
                            <?php endif; ?>
                                <div class="content">
                                    <h4><?php the_title(); ?></h4>
                                    <p><?php the_excerpt(); ?></p>
                                </div>
                            </a>
                        </li>
                        <?php 
                    endwhile;
                    
                    ?>
                    <?php wp_reset_postdata(); ?>
                </ul>
            <?php else: ?>
                <div class="no-post-found">
                    <h3>No results found</h3>
                    <br>
                    <button onclick="goBack()" class="btn dark mr-3">Go Back</button>
                    <a href="/" class="btn btn-secondary">Go to Homepage</a>
                </div>
            <?php endif; ?>
            
            

            <nav class="Page navigation">
                <ul class="pagination align-items-center justify-content-end">
                <p>Showing page <span><?php echo $page; ?></span> of <span><?php echo $query->max_num_pages; ?> </span></p>
                    <?php 
                        echo paginate_links(
                            array(
                            'total'        => $query->max_num_pages,
                            'current'      => max(1, get_query_var('page')),
                            'format'       => '?page=%#%',
                            'show_all'     => false,
                            'type'         => 'list',
                            'end_size'     => 2,
                            'mid_size'     => 1,
                            'prev_next'    => true,
                            'prev_text'    => sprintf('<i></i> %1$s', __('«', 'text-domain')),
                            'next_text'    => sprintf('%1$s <i></i>', __('»', 'text-domain')),
                            'add_args'     => false,
                            'add_fragment' => '',
                            ) 
                        );
                    ?>
                </ul>
            </nav>

        </div>
    </div>

</section>

<?php
    get_footer();
?>

<script>
    function goBack() {
        window.history.back();
    }
</script>