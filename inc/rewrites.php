<?php
/**
 *  All rewrite rules go in here
 */
function sisban_posts_add_rewrite_rules( $wp_rewrite )
{
    $new_rules = [
        'news/(.+?)/?$' => 'index.php?post_type=post&name='. $wp_rewrite->preg_index(1),
    ];
    $wp_rewrite->rules = $new_rules + $wp_rewrite->rules;
    return $wp_rewrite->rules;
}
add_action('generate_rewrite_rules', 'sisban_posts_add_rewrite_rules');

function sisban_posts_change_blog_links($post_link, $id=0){
    $post = get_post($id);
    if( is_object($post) && $post->post_type == 'post'){
        return home_url('/news/'. $post->post_name.'/');
    }
    return $post_link;
}
add_filter('post_link', 'sisban_posts_change_blog_links', 1, 3);



function sisban_add_people_rewrite_rules( $wp_rewrite )
{
    $new_rules = [
        'about/our-people/(.+?)/?$' => 'index.php?post_type=people&name='. $wp_rewrite->preg_index(1),
    ];
    $wp_rewrite->rules = $new_rules + $wp_rewrite->rules;
    return $wp_rewrite->rules;
}
add_action('generate_rewrite_rules', 'sisban_add_people_rewrite_rules');

function sisban_change_people_links($post_link, $id=0){
    $post = get_post($id);
    if( is_object($post) && $post->post_type == 'people'){
        return home_url('/about/our-people/'. $post->post_name.'/');
    }
    return $post_link;
}
add_filter('post_type_link', 'sisban_change_people_links', 1, 3);
