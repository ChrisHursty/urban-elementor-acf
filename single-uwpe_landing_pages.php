<?php

/**
 * Landing Page CPT
 *
 * @package Urban Elementor WP
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
get_header();

// Define a hard-coded default image URL
$bg_image_url = get_template_directory_uri() . '/dist/images/dark-bg.webp';
?>
<section class="container-fw" style="background-image: url('<?php echo esc_url($bg_image_url); ?>');">
    <div class="container">
        <div class="row land-hero">
            <div class="col-sm-12 col-md-6 content">
                <h1>Professional Web Design and Hosting, <?php the_field('location_name'); ?></h1>
                <p><?php the_field('additional_details'); ?></p>
                <a href="<?php the_field('sign_up_url'); ?>" target="_blank" class="urban-acf"><span>Book My Discovery Call</span></a>
            </div>
            <div class="col-sm-12 col-md-6 image">
            <?php
            // Get the featured image ID
            $featured_image_id = get_post_thumbnail_id();
            $alt_text = get_post_meta($featured_image_id, '_wp_attachment_image_alt', true);

            // Get the featured image URL
            $featured_image_url = get_the_post_thumbnail_url();

            if ($featured_image_url): ?>
                <img src="<?php echo esc_url($featured_image_url); ?>" alt="<?php echo esc_attr($alt_text ? $alt_text : 'Default Alt Text'); ?>">
            <?php endif; ?>
            </div>
        </div>
    </div>
    
</section>
<!-- About Section -->
<section class="container about-section">
    <div class="row">
        <div class="col-sm-12 col-md-6 align-left image">
            <?php
                $image_id = get_field('about_section_image', 'option');
                if ($image_id) {
                    $image_url = wp_get_attachment_image_url($image_id, 'full'); // Get the image URL
                    $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true); // Get the alt text
                    ?>
                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
                    <?php
                }
                ?>
        </div>
        <div class="col-sm-12 col-md-6 align-right content">
            <?php echo apply_filters('the_content', get_field('about_section_text', 'option')); ?>
            <a href="<?php the_field('sign_up_url'); ?>" target="_blank" class="urban-acf"><span>Sign Up Now</span></a>
        </div>
    </div>
</section>

<!-- CTA Section with Map -->
<section class="container-fw cta-section dark-bg">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6 align-left content">
                <h2><?php echo esc_html(get_field('cta_headline', 'option')); ?></h2>
                <p><?php echo apply_filters('the_content', get_field('cta_description', 'option')); ?></p>
                <a href="<?php the_field('cta_button_url', 'option'); ?>" class="urban-acf light-btn" target="_blank">
                    <span><?php the_field('cta_button_text', 'option'); ?></span>
                    
                </a>
            </div>
            <div class="col-sm-12 col-md-6 align-right image">
                <?php
                $image_id = get_field('cta_image', 'option');
                if ($image_id) {
                    $image_url = wp_get_attachment_image_url($image_id, 'full'); // Get the image URL
                    $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true); // Get the alt text
                    ?>
                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
                    <?php
                }
                ?>

            </div>
        </div>
    </div>
    
</section>

<!-- Image, Headline & Test -->
<section class="container-fw about-company light-bg">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6 align-left image">
                <?php
                    $image_id = get_field('about_company_image', 'option');
                    if ($image_id) {
                        $image_url = wp_get_attachment_image_url($image_id, 'full'); // Get the image URL
                        $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true); // Get the alt text
                        ?>
                        <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
                        <?php
                    }
                    ?>
            </div>
            <div class="col-sm-12 col-md-6 align-right content">
                <?php echo apply_filters('the_content', get_field('about_company_text', 'option')); ?>
                <a href="<?php the_field('sign_up_url'); ?>" target="_blank" class="urban-acf"><span>Sign Up Now</span></a>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<?php if (have_rows('testimonials', 'option')): ?>
    <div class="container-fw testimonials">
        <div class="container align-center text-center">
            <h2 class="section-heading">Testimonials</h2>
        </div>
        <div class="container">
            <div class="row">
            <?php while (have_rows('testimonials', 'option')): the_row(); ?>
                <div class="col-sm-12 col-md-4 text-center single-testi">
                    <h2><?php echo esc_html(get_sub_field('testimonial_heading')); ?></h2>
                    <blockquote>
                        <p><?php echo esc_html(get_sub_field('testimonial_text')); ?></p>
                    </blockquote>
                    <h4><?php echo esc_html(get_sub_field('name')); ?></h4>
                </div>
            <?php endwhile; ?>
            </div>
        </div>
        
    </div>
<?php endif; ?>

<?php
// Ensure ACF is active
if( function_exists('have_rows') && have_rows('mobile_buttons', 'option') ):

    while( have_rows('mobile_buttons', 'option') ): the_row();

    $button_one_text = get_sub_field('button_one_text', 'option');
    $button_one_url = get_sub_field('button_one_url', 'option');
    $button_one_icon = get_sub_field('button_one_icon', 'option');
    $button_one_bg_color = get_sub_field('button_one_bg_color', 'option');
    $button_one_text_color = get_sub_field('button_one_text_color', 'option');

    $button_two_text = get_sub_field('button_two_text', 'option');
    $button_two_url = get_sub_field('button_two_url', 'option');
    $button_two_icon = get_sub_field('button_two_icon', 'option');
    $button_two_bg_color = get_sub_field('button_two_bg_color', 'option');
    $button_two_text_color = get_sub_field('button_two_text_color', 'option');

    ?>

    <div class="mobile-buttons">
        <a href="<?php echo esc_url($button_one_url); ?>" class="mobile-button" style="background-color: <?php echo esc_attr($button_one_bg_color); ?>; color: <?php echo esc_attr($button_one_text_color); ?>;">
            <?php echo esc_html($button_one_text); ?><i class="fas <?php echo esc_attr($button_one_icon); ?>" aria-label="Free Class" aria-hidden="true"></i>
        </a>
        <?php if ($button_two_text && $button_two_url): ?>
            <a href="<?php echo esc_url($button_two_url); ?>" class="mobile-button" style="background-color: <?php echo esc_attr($button_two_bg_color); ?>; color: <?php echo esc_attr($button_two_text_color); ?>;">
                <?php echo esc_html($button_two_text); ?><i class="fas <?php echo esc_attr($button_two_icon); ?>" aria-label="Register for Events" aria-hidden="true"></i>
            </a>
        <?php endif; ?>
    </div>

<?php endwhile; endif; ?>

<?php get_footer();
