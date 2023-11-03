<?php

add_action('wp_enqueue_scripts', 'parent_enqueue_styles');

function parent_enqueue_styles()
{
    wp_enqueue_style('style', get_template_directory_uri() .'/style.css');
}
