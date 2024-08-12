<?php

/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Urban Elementor WP
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <!-- DNS Prefetch -->
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php do_action('wp_body_open'); ?>
    <div class="site" id="page">

        <!-- ******************* The Navbar Area ******************* -->
        <header id="masthead" class="site-header">
            <div class="container">
                <div class="site-branding">
                    <?php
                    if (has_custom_logo()) {
                        the_custom_logo();
                    } else {
                        echo '<a href="' . esc_url(home_url('/')) . '" rel="home"><img src="path/to/default-logo.svg" alt="' . get_bloginfo('name') . '"></a>';
                    }
                    ?>
                </div>
                <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false" aria-label="Open menu">
                    <span class="hamburger fa fa-bars"></span>
                </button>
                <nav role="navigation" aria-label="Main menu" id="site-navigation" class="main-navigation">
                    <button class="menu-close fa fa-times" aria-label="Close menu"></button> <!-- Close Button -->
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_id'        => 'primary-menu',
                        'menu_class'     => 'menu-list',
                        'container'      => false,
                    ));
                    ?>
                    <!-- Hamburger Socials -->
                    <div class="social-media">
                        <?php
                        if (have_rows('social_profiles', 'option')) {
                            while (have_rows('social_profiles', 'option')) {
                                the_row();
                                $profile_url = get_sub_field('profile_url');
                                $icon_type   = get_sub_field('icon_type');
                                $icon_color  = get_sub_field('icon_color');

                                echo '<a href="' . esc_url($profile_url) . '" style="color:' . esc_attr($icon_color) . ';" target="_blank" rel=noopener noreferrer>';

                                if ($icon_type === 'fontawesome') {
                                    $fontawesome_class = get_sub_field('fontawesome_class');
                                    echo '<i class="fab ' . esc_attr($fontawesome_class) . '"></i>';
                                } else if ($icon_type === 'svg') {
                                    $svg_icon_url = get_sub_field('svg_icon');
                                    echo '<img src="' . esc_url($svg_icon_url) . '" alt="Social Icon" style="fill:' . esc_attr($icon_color) . ';">';
                                }

                                echo '</a>';
                            }
                        }
                        ?>
                    </div>
                </nav>
            </div>
        </header>
        <div class="header-spacer"></div>