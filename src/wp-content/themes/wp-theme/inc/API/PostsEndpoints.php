<?php

namespace WpLab\Theme\API;
use WP_REST_Request;

class PostsEndpoints {
    public function register(): void {
        add_action('rest_api_init', [$this, 'registerEndpoints']);
    }

    public function registerEndpoints(): void {
        register_rest_route('plugin/v1', '/post-number', [
            'methods'             => 'GET',
            'callback'            => [$this, 'get_posts_count'],
            'permission_callback' => '__return_true',
            'args'                => [
                'type' =>  ['default' => 'post']
            ],
        ]);

        register_rest_route('plugin/v1', '/create-post', [
            'methods'             => 'POST',
            'callback'            => [$this, 'create_post_callback'],
            'permission_callback' => function () {
                return current_user_can('publish_posts');
            },            
            'args'                => [
                'title'   => ['required' => true],
                'content' => ['required' => true]
            ],
        ]);

        register_rest_route('plugin/v1', '/latest', [
            'methods'             => 'GET',
            'callback'            => [$this, 'get_last_posts'],
            'permission_callback' => '__return_true',
            'args'                => [
                'count' =>  [
                    'default' => 3, 
                    'sanitize_callback' => 'absint'
                ]
            ],
        ]);

        register_rest_route('plugin/v1', '/posts-by-status', [
            'methods'             => 'GET',
            'callback'            => [$this, 'get_posts_by_status'],
            'permission_callback' => '__return_true',
            'args'                => [
                'status' =>  [
                    'default' => 'publish', 
                    'sanitize_callback' => 'sanitize_text_field'
                ]
            ],
        ]);
    }

    public function get_posts_count(WP_REST_Request $request): array {
        $count = wp_count_posts($request->get_param('type'))->publish;
        return ['count' => (int) $count];
    }

    public function create_post_callback(WP_REST_Request $request): array {
        $title   = sanitize_text_field($request->get_param('title'));
        $content = wp_kses_post($request->get_param('content'));

        $post_id = wp_insert_post([
            'post_title'   => $title,
            'post_content' => $content,
        ]);
        if (is_wp_error($post_id)) {
            return ['error' => $post_id->get_error_message()];
        }
        return ['message' => 'Post created successfully', 'id' => (int) $post_id];
    }

    public function get_last_posts(WP_REST_Request $request):array {
        $count = $request->get_param('count');
        $posts = get_posts([
            'numberposts' => $count,
        ]);
        return array_map(function ($post) {
            return [
                'id'      => $post->ID,
                'title'   => $post->post_title,
                'content' => $post->post_content
            ];
        }, $posts);
    }

    public function get_posts_by_status(WP_REST_Request $request): array {
        $status = $request->get_param('status');
        $count  = wp_count_posts()->$status ?? 0;
        return ['count' => (int) $count];
    }
}