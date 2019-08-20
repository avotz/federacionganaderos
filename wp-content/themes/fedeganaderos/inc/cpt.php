<?php

function fedeganaderos_meta_box($meta_boxes)
{
    $prefix = 'rw_';


    $meta_boxes[] = array(
        'id' => 'additional',
        'title' => esc_html__('Additional Information', 'fedeganaderos'),
        'post_types' => array('solucion'),
        'context' => 'advanced',
        'priority' => 'default',
        'autosave' => false,
        'fields' => array(
            array(
                'name' => 'Seleccione productos',
                'id' => $prefix . 'producto',
                'type' => 'post',
                'multiple' => true,
    // Post type.
                'post_type' => 'producto',

    // Field type.
                'field_type' => 'checkbox_tree',

    // Placeholder, inherited from `select_advanced` field.
                'placeholder' => 'Seleccione productos',

    // Query arguments. See https://codex.wordpress.org/Class_Reference/WP_Query
                'query_args' => array(
                    'post_status' => 'publish',
                    'posts_per_page' => -1,
                ),
            ),
            array(
                'id' => $prefix . 'url_video_solution',
                'name' => esc_html__('Video Url', 'fedeganaderos'),
                'type' => 'text',
                
            ),

        ),
    );


    return $meta_boxes;
}
add_filter('rwmb_meta_boxes', 'fedeganaderos_meta_box');