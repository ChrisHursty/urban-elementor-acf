<?php
/**
 * Urban Elementor ACF functions and definitions
 *
 * @package Urban Elementor ACF
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Customizer
require_once get_template_directory() . '/inc/theme-customizer.php';
// Theme Options
require_once get_template_directory() . '/inc/theme-options.php';
// Custom Post Types
require_once get_template_directory() . '/inc/cpts.php';
// Widgets
require get_template_directory() . '/inc/widgets.php';

function urban_elementor_theme_setup() {
    // Add theme support for Automatic Feed Links
    add_theme_support( 'automatic-feed-links' );

    // Add theme support for Post Thumbnails
    add_theme_support( 'post-thumbnails' );

    // Register Navigation Menu
    register_nav_menus( array(
        'primary' => esc_html__( 'Primary Menu', 'urban-elementor' ),
    ) );

    // Add theme support for HTML5 and Title Tag
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'custom-fields' ) );
    add_theme_support( 'title-tag' );

    // Custom Logo
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    add_image_size('portfolio_slider', 810, 810, true); // true for hard crop mode
}

add_action( 'after_setup_theme', 'urban_elementor_theme_setup' );

function generate_elementor_dynamic_css() {
    if (!did_action('elementor/loaded')) {
        return;
    }

    $global_settings = \Elementor\Plugin::$instance->kits_manager->get_active_kit_for_frontend()->get_settings();
    
    $colors = isset($global_settings['global_colors']) ? $global_settings['global_colors'] : [];
    $fonts = isset($global_settings['global_fonts']) ? $global_settings['global_fonts'] : [];

    $css = ':root {' . PHP_EOL;

    if ($colors) {
        foreach ($colors as $key => $value) {
            $css .= '--' . $key . ': ' . $value . ';' . PHP_EOL;
        }
    }

    if ($fonts) {
        foreach ($fonts as $key => $value) {
            $css .= '--' . $key . '-font: ' . $value . ';' . PHP_EOL;
        }
    }

    $css .= '}' . PHP_EOL;

    $file_path = get_template_directory() . '/dist/css/elementor-global-settings.css';
    file_put_contents($file_path, $css);
}
add_action('elementor/frontend/after_enqueue_styles', 'generate_elementor_dynamic_css');


/**
 * Enqueue scripts and styles.
 */
function urban_elementor_scripts_styles() {
    // Enqueue Owl Carousel & Magnific Popup Stuff
    wp_enqueue_style('owl-carousel-css', get_template_directory_uri() . '/library/owl-carousel/css/owl.carousel.min.css');
    wp_enqueue_style('owl-carousel-theme', get_template_directory_uri() . '/library/owl-carousel/css/owl.theme.default.min.css');
    wp_enqueue_script('owl-carousel-js', get_template_directory_uri() . '/library/owl-carousel/js/owl.carousel.min.js', array('jquery'), '2.3.4', true);
    // Deregister Elementor's FontAwesome
    wp_deregister_style('font-awesome');
    wp_dequeue_style('font-awesome');
    // FontAwesome
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/library/font-awesome/font-awesome-5-15-4l.min.css');

    // Theme CSS
    wp_enqueue_style( 'urban-elementor-style', get_template_directory_uri() . '/dist/css/main.min.css', array(), '1.0.0', 'all');

    // Generated Elementor Global Settings CSS
    if (file_exists(get_template_directory() . '/dist/css/elementor-global-settings.css')) {
        wp_enqueue_style('elementor-global-settings', get_template_directory_uri() . '/dist/css/elementor-global-settings.css', array(), '1.0.0', 'all');
    }

    // Theme JS
    wp_enqueue_script('urban-elementor-main-js', get_template_directory_uri() . '/dist/js/main.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('urban-elementor-smart-header-js', get_template_directory_uri() . '/dist/js/smart-header.min.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'urban_elementor_scripts_styles');


function urban_elementor_admin_styles() {
    wp_enqueue_style('urban-elementor-admin-styles', get_template_directory_uri() . '/dist/css/admin-styles.min.css');
    wp_enqueue_media();
}
add_action('admin_enqueue_scripts', 'urban_elementor_admin_styles');

// SVG upload compatibility
function custom_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'custom_mime_types');
  
function fix_svg_thumb_display() {
    echo '
      <style>
        td.media-icon img[src$=".svg"], img[src$=".svg"].attachment-post-thumbnail {
          width: 100% !important;
          height: auto !important;
        }
      </style>
    ';
}
add_action('admin_head', 'fix_svg_thumb_display');

// Customizer CSS
function ccs_custom_css() {
    $hero_btn_bg_color         = get_theme_mod('hero_button_bg_color');
    $hero_btn_text_color       = get_theme_mod('hero_button_text_color');
    $cta_btn_bg_color          = get_theme_mod('button_background_color');
    $cta_btn_text_color        = get_theme_mod('button_text_color');
    $hero_btn_bg_color         = get_theme_mod('hero_button_bg_color');
    $header_cta_bg_color       = get_theme_mod('header_cta_bg_color', '#000000');
    $header_cta_bg_hover_color = get_theme_mod('header_cta_bg_hover_color', '#000000');
    $header_cta_text_color     = get_theme_mod('header_cta_text_color', '#FFFFFF');
 
    $custom_css = "
        /* Customizer CSS */
        .hero-button {
            background-color: $hero_btn_bg_color !important;
            border: 1px solid $hero_btn_bg_color !important;
        }

        .hero-button span {
            color: $hero_btn_text_color !important;
        }

        .hero-button:hover {
            background-color: $hero_btn_text_color !important;
            border: 1px solid $hero_btn_text_color !important;
        }

        .hero-button:hover span {
            color: $hero_btn_bg_color !important;
        }

        .cta-button {
            border: 4px solid $cta_btn_text_color !important;
        }

        .cta-button:hover {
            background-color: $cta_btn_text_color !important;
            border: 4px solid $cta_btn_text_color !important;
        }
        .cta-button:hover span {
            color: $cta_btn_bg_color !important;
        }

        /* Header CTA Customizer CSS */
        .site-header .main-navigation .apply-btn {
            background-color: $header_cta_bg_color !important;
        }

        .site-header .main-navigation .apply-btn a  {
            color: $header_cta_text_color !important;
        }

        .site-header .main-navigation .apply-btn:hover {
            background-color: $header_cta_bg_hover_color !important;
        }
    ";

    wp_add_inline_style('ccs-customizer-css', $custom_css);
}
add_action('wp_enqueue_scripts', 'ccs_custom_css', 20);

function ccs_enqueue_scripts_and_styles() {
    wp_enqueue_style( 'ccs-customizer-css', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'ccs_enqueue_scripts_and_styles' );

add_filter('acf/settings/remove_wp_meta_box', '__return_false');
