<?php
get_header();

if(have_posts()){
    while(have_posts()){
        the_post();
        the_title('<h1>', '</h1>');
        the_content();
    }
}

$start = microtime(true);

function get5PostsIDs(): array{
    $ids = wp_cache_get('lastPostsIds', 'my-group');
    if($ids === false) {
        global $wpdb;
        $ids = $wpdb->get_results(
            "Select ID from {$wpdb->posts} order by post_date desc limit 5"
        );
        wp_cache_set('lastPostsIds', $ids, 'my-group', 1000);
    }
    return $ids;
}

$result = get5PostsIDs();
var_dump($result);
$end = microtime(true);
echo 'Time: ' . ($end - $start) . ' sec';


get_footer();