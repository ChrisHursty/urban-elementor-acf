<?php

/**
 * Blog Archive
 *
 * @package Urban Elementor WP
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
get_header();

$post_id = get_the_ID();
    $featured_image_url = get_the_post_thumbnail_url($post_id, 'full');

    // Define a default image URL
    $default_image_url = get_template_directory_uri() . '/dist/images/default-hero-img.jpg';

    // Use the featured image if available, otherwise use the default
    $background_image_url = $featured_image_url ? $featured_image_url : $default_image_url;

    echo '<section class="container-fw hero-title-area" style="background-image: url(' . esc_url($background_image_url) . ');">';
    echo '<div class="container"><div class="row"><div class="align-center text-center">';
    echo '<h1>' . get_the_title() . '</h1>';
    echo '</div></div></div></section>';
?>


<section class="container content-bg">
    <div class="row">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div class="col-md-6 single-card">
                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                        <?php if (has_post_thumbnail()) : ?>
                            <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title_attribute(); ?>">
                        <?php endif; ?>
                        <div class="content">
                            <h3><?php the_title(); ?></h3>
                            <a href="<?php the_permalink(); ?>" class="urban-acf white-btn"><span>Read More</span></a>
                        </div>
                    </a>
                </div>
            <?php endwhile;
        else : ?>
            <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
        <?php endif;
        wp_reset_postdata(); ?>

    </div><!-- .row -->
</section>
<?php get_footer();