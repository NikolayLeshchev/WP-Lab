<?php

namespace WpLab\Theme\API;
use WP_REST_Request;

class Api {
    public function register(): void {
        add_action('rest_api_init', [$this, 'registerApis']);
    }

    public function registerApis(): void {
        register_rest_route('wp-theme/v1', '/posts-count', [
            'methods'             => 'GET',
            'callback'            => [$this, 'get_posts_count'],
            'permission_callback' => function() {
                return current_user_can('manage_options');
            },
            'args'                => [
                'type' =>  ['default' => 'post']
            ],
        ]);
    }

    public function get_posts_count(WP_REST_Request $request): array {
        $count = wp_count_posts($request->get_param('type'))->publish;
        return ['count' => (int) $count];
    }
}