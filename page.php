<?php

/**
 * Page
 *
 * @package Urban Elementor WP
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
get_header();

// Featured Image Background and Title for a regular page
if (is_page()) {
    $post_id = get_the_ID();
    $featured_image_url = get_the_post_thumbnail_url($post_id, 'full');

    // Get the default hero image from the options page using ACF Pro
    $acf_default_hero_image_url = get_field('default_hero_image', 'option');

    // Define a hard-coded default image URL
    $default_image_url = get_template_directory_uri() . '/dist/images/default-hero-img.webp';

    // Determine the background image URL
    if ($featured_image_url) {
        $background_image_url = $featured_image_url;
    } elseif ($acf_default_hero_image_url) {
        $background_image_url = $acf_default_hero_image_url;
    } else {
        $background_image_url = $default_image_url;
    }

    // Get Customizer options
    $title_bg_color = get_theme_mod('urban_elementor_title_bg_color', 'rgba(0, 0, 0, 0.5)');
    $title_text_color = get_theme_mod('urban_elementor_title_text_color', '#FFFFFF');

    echo '<section class="container-fw hero-title-area" style="background-image: url(' . esc_url($background_image_url) . ');">';
    echo '<div class="container"><div style="background-color:' . esc_attr($title_bg_color) . ';" class="row"><div class="align-center text-center">';
    echo '<h1 style="color:' . esc_attr($title_text_color) . ';">' . get_the_title() . '</h1>';
    echo '</div></div></div></section>';
}
?>


<section class="container content-bg slim-page">
    <div class="row">
        <div class="col-12 align-center content">
            <div class="content-area">
                <?php the_content(); ?>
            </div>
        </div>
    </div><!-- .row -->
</section>
<?php
get_footer();