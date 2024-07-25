<?php
// Prevent direct access to the file
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

function urban_elementor_register_sidebars()
{
    register_sidebar(array(
        'id'            => 'sidebar-1',
        'name'          => __('Primary Sidebar', 'urban-elementor'),
        'description'   => __('The main sidebar appears on the right on each page except the front page template', 'urban-elementor'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<hr><h2 class="widget-title">',
        'after_title'   => '</h2><hr>',
    ));
}
add_action('widgets_init', 'urban_elementor_register_sidebars');


