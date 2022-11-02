<?php

// Get filtered news
add_action("wp_ajax_get_news", "get_news");
add_action("wp_ajax_nopriv_get_news", "get_news");

function get_news()
{
    $categories = $_REQUEST['categories'];
    $date = $_REQUEST['selectedDate'];
    $page = $_REQUEST['page'];

    $args = array(
        'post_type' => 'post',
        'cat' => $categories,
        'order' => 'DESC',
        'orderby' => 'date'
    );

    // If date is provided
    if ($date && $date != '') {
        $dateArgs = array(
            'date_query' => array(
                array(
                    'year'  => $date,
                ),
            ),
        );
        $args = array_merge($args, $dateArgs);
    }

    $totalQuery = new WP_Query($args);

    $totalPosts = $totalQuery->post_count;

    $args['paged'] = $page;
    $args['posts_per_page'] = -1;

    $query = new WP_Query($args);
    $totalPages = $query->max_num_pages;
    $postsArr = null;

    if ($query->have_posts()) {
        while ( $query->have_posts() ) {
            $query->the_post();
            $postsArr[] = array(
              "title" => get_the_title(),
              "link" => get_permalink($post->ID),
              "image" => get_the_post_thumbnail_url($post->ID, 'small'),
              "date" => get_the_date('m.Y', $post->ID)
            );
        }
        wp_reset_postdata();
    }

    echo json_encode(
        [
            "status" => 'success',
            "data" => $postsArr,
            "count" => $query->post_count,
            "totalPosts" => $totalPosts,
            "totalPages" => $totalPages
        ]
    );
    exit;
}

// Get all distinct dates for posts created
function get_posts_years()
{
    global $wpdb;
    $result = array();
    $years = $wpdb->get_results(
        "SELECT YEAR(post_date) as year FROM {$wpdb->posts} WHERE post_status = 'publish' GROUP BY YEAR(post_date) DESC", ARRAY_A
    );

    return $years;
}
