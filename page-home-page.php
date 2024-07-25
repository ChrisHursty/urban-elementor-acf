<?php

/**
 * Template Name: Home Page
 *
 * @package Urban Elementor WP
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
get_header();
?>

<section class="container home-hero">
    <div class="row">
        <div class="col-md-6 hero-content">
            <h1>TITLE HERE</h1>
            <p class="intro">
            
            
        </div>

        <div class="col-md-6 hero-image">
            IMAGE HERE
        </div>
    </div><!-- .row -->
</section>

<section class="cta">
    <?php get_template_part('template-parts/call-to-action'); ?>
</section>
<?php
get_footer();
