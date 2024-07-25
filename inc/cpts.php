<?php
/**
 * Urban Elementor Custom Post Types
 *
 * @package Urban Elementor WP
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Sponsors CPT

function company_post_type() {
    $labels = array(
        'name'                  => _x('Companies', 'Post Type General Name', 'urban-elementor'),
        'singular_name'         => _x('Company', 'Post Type Singular Name', 'urban-elementor'),
        'menu_name'             => __('Companies', 'urban-elementor'),
        'name_admin_bar'        => __('Company', 'urban-elementor'),
        'archives'              => __('Company Archives', 'urban-elementor'),
        'attributes'            => __('Company Attributes', 'urban-elementor'),
        'parent_item_colon'     => __('Parent Company:', 'urban-elementor'),
        'all_items'             => __('All Companies', 'urban-elementor'),
        'add_new_item'          => __('Add New Company', 'urban-elementor'),
        'add_new'               => __('Add New', 'urban-elementor'),
        'new_item'              => __('New Company', 'urban-elementor'),
        'edit_item'             => __('Edit Company', 'urban-elementor'),
        'update_item'           => __('Update Company', 'urban-elementor'),
        'view_item'             => __('View Company', 'urban-elementor'),
        'view_items'            => __('View Companies', 'urban-elementor'),
        'search_items'          => __('Search Company', 'urban-elementor'),
        'not_found'             => __('Not found', 'urban-elementor'),
        'not_found_in_trash'    => __('Not found in Trash', 'urban-elementor'),
        'featured_image'        => __('Featured Image', 'urban-elementor'),
        'set_featured_image'    => __('Set featured image', 'urban-elementor'),
        'remove_featured_image' => __('Remove featured image', 'urban-elementor'),
        'use_featured_image'    => __('Use as featured image', 'urban-elementor'),
        'insert_into_item'      => __('Insert into company', 'urban-elementor'),
        'uploaded_to_this_item' => __('Uploaded to this company', 'urban-elementor'),
        'items_list'            => __('Companies list', 'urban-elementor'),
        'items_list_navigation' => __('Companies list navigation', 'urban-elementor'),
        'filter_items_list'     => __('Filter companies list', 'urban-elementor'),
    );

    $args = array(
        'label'               => __('Company', 'urban-elementor'),
        'description'         => __('Post Type Description', 'urban-elementor'),
        'labels'              => $labels,
        'supports'            => array('title', 'thumbnail'),
        'taxonomies'          => array('category', 'post_tag'),
        'hierarchical'        => true,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-building',
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => true,
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => true,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest'        => true,
    );

    register_post_type('company', $args);
}

add_action('init', 'company_post_type');

