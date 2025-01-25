<?php
/**
 * Template Name: Full Width with Header & Footer
 * Template Post Type: page
 *
 * A full-width template for Elementor that includes the theme's header and footer.
 *
 * @package YourThemeName
 */

get_header(); // Include the theme's header.
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <?php
        // Elementor's main content.
        while ( have_posts() ) :
            the_post();

            the_content();

        endwhile; // End of the loop.
        ?>
    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer(); // Include the theme's footer.
