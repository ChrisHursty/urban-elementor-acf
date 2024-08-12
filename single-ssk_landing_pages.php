<?php

/**
 * Landing Page CPT
 *
 * @package Urban Elementor WP
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
get_header();

?>
<?php
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
?>

<section class="container-fw hero-bg">
    <div class="container">
        <div class="row land-hero">
            <div class="col-sm-12 col-md-6 content">
                <h1>Join Our Soccer Training at <?php the_field('location_name'); ?></h1>
                <p><?php the_field('additional_details'); ?></p>
                <a href="<?php the_field('sign_up_url'); ?>" target="_blank" class="urban-acf"><span>REGISTER FOR <?php the_field('location_name'); ?></span></a>
            </div>
            <div class="col-sm-12 col-md-6 image">
                <div class="title-text"><?php the_title();?></div>
                <img src="<?php echo $background_image_url; ?>" alt="Soccer SideKicks Photo of Kids">
            </div>
        </div>
    </div>
    
</section>
<!-- About Section -->
<section class="container about-section">
    <div class="row">
        <div class="col-sm-12 col-md-6 align-left image">
            <img src="<?php echo esc_url(get_field('about_section_image', 'option')); ?>" alt="Soccer Player Cartoon">
        </div>
        <div class="col-sm-12 col-md-6 align-right content">
            <?php echo apply_filters('the_content', get_field('about_section_text', 'option')); ?>
            <a href="<?php the_field('sign_up_url'); ?>" target="_blank" class="urban-acf"><span>Sign Up Now</span></a>
        </div>
    </div>
</section>

<!-- CTA Section with Map -->
<section class="container-fw cta-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6 align-left content">
                <h2><?php echo esc_html(get_field('cta_headline', 'option')); ?></h2>
                <p><?php echo esc_html(get_field('cta_description', 'option')); ?></p>
                <a href="/locations" class="urban-acf">
                    <span>SEE ALL LOCATIONS</span>
                    
                </a>
            </div>
            <div class="col-sm-12 col-md-6 align-right image">
                <img src="<?php echo esc_url(get_field('cta_map_image', 'option')); ?>" alt="Map of Soccer Sidekicks locations">
            </div>
        </div>
    </div>
    
</section>

<!-- About SSK and Ben Section -->
<section class="container about-ssk-ben">
    <div class="row">
        <div class="col-sm-12 col-md-4 align-left image">
            <img src="<?php echo esc_url(get_field('ssk_and_ben_image', 'option')); ?>" alt="SSK and Ben">
        </div>
        <div class="col-sm-12 col-md-8 align-right content">
            <?php echo apply_filters('the_content', get_field('ssk_and_ben_text', 'option')); ?>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<?php if (have_rows('testimonials', 'option')): ?>
    <div class="container-fw testimonials">
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
