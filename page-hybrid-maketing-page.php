<?php

/**
 * Template Name: Hybrid Marketing Page
 *
 * @package Urban Elementor ACF
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
get_header(); ?>

<?php
// Ensure ACF is active
if( function_exists('get_field') ):

    // Get the necessary fields
    $intro_paragraph = get_field('intro_paragraph');
    $cta_text = get_field('cta_text');
    $cta_url = get_field('cta_url');
    $featured_image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');

    ?>

    <section class="container-fw hybrid-hero" style="background-image: url('<?php echo esc_url($featured_image_url); ?>');">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-10 align-center content">
                    <h1><?php the_title(); ?></h1>
                    <h2><?php echo esc_html($intro_paragraph); ?></h2>
                    <?php if($cta_url && $cta_text): ?>
                        <a href="<?php echo esc_url($cta_url); ?>" class="urban-acf white-btn"><span><?php echo esc_html($cta_text); ?></span></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <?php if( have_rows('listicle') ): ?>
        <section class="container">
            <div class="row">
                <?php $count = 1; ?>
                <?php while( have_rows('listicle') ): the_row(); ?>
                    <?php 
                        $image = get_sub_field('image');
                        $title = get_sub_field('title');
                        $content = get_sub_field('content');
                        $cta_text = get_sub_field('cta_text');
                        $cta_url = get_sub_field('cta_url');
                    ?>
                    <div class="col-sm-12 col-md-8 align-center">
                        <div class="listicle">
                            <div class="listicle-headline">
                                <h2><?php echo esc_html($title); ?></h2>
                            </div>
                            <div class="listicle-img">
                                <?php echo wp_get_attachment_image($image, 'full'); ?>
                                <div class="listicle-number"><?php echo $count; ?></div>
                            </div>
                            <div class="listicle-content">
                                <p><?php echo esc_html($content); ?></p>
                                <?php if($cta_url && $cta_text): ?>
                                    <a href="<?php echo esc_url($cta_url); ?>" class="urban-acf white-btn"><span><?php echo esc_html($cta_text); ?></span></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php $count++; ?>
                <?php endwhile; ?>
            </div>
        </section>
    <?php endif; ?>

    <?php 
    $image_text_image = get_field('it_image');
    $image_text_title = get_field('it_title');
    $image_text_content = get_field('it_content');
    $image_text_cta_text = get_field('it_cta_text');
    $image_text_cta_url = get_field('it_cta_url');
    if($image_text_image || $image_text_title || $image_text_content): ?>
        <section class="container image-text">
            <div class="row">
                <div class="col-sm-12 col-md-6 align-right">
                    <?php if ($image_text_image): ?>
                        <?php echo wp_get_attachment_image($image_text_image, 'full'); ?>
                    <?php endif; ?>
                </div>
                <div class="col-sm-12 col-md-6 align-left content">
                    <?php if ($image_text_title): ?>
                        <h2><?php echo esc_html($image_text_title); ?></h2>
                    <?php endif; ?>
                    <?php if ($image_text_content): ?>
                        <div><?php echo $image_text_content; ?></div>
                    <?php endif; ?>
                    <?php if($image_text_cta_url && $image_text_cta_text): ?>
                        <a href="<?php echo esc_url($image_text_cta_url); ?>" class="urban-acf white-btn"><span><?php echo esc_html($image_text_cta_text); ?></span></a>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php
    $testimonials_bg_img = get_field('testimonial_bg_img'); // Get the background image field
    ?>

    <?php if( have_rows('testimonials') ): ?>
        <section class="container-fw testimonials-section" style="background-image: url('<?php echo esc_url($testimonials_bg_img); ?>');">
            <div class="container">
                <div class="row">
                    <?php while( have_rows('testimonials') ): the_row(); ?>
                        <div class="col-sm-12 col-md-4 text-center single-testi">
                            <div class="profile-pic">
                                <?php 
                                    $profile_image = get_sub_field('profile_image');
                                    echo wp_get_attachment_image($profile_image, 'thumbnail'); 
                                ?>
                            </div>
                            <blockquote>
                                <p><?php the_sub_field('content'); ?></p>
                                <footer><?php the_sub_field('name'); ?></footer>
                            </blockquote>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
<?php endif; ?>
<?php
// Ensure ACF is active
if( function_exists('have_rows') && have_rows('mobile_buttons') ):

while( have_rows('mobile_buttons') ): the_row();

$button_one_text = get_sub_field('button_one_text');
$button_one_url = get_sub_field('button_one_url');
$button_one_icon = get_sub_field('button_one_icon');
$button_one_bg_color = get_sub_field('button_one_bg_color');
$button_one_text_color = get_sub_field('button_one_text_color');

$button_two_text = get_sub_field('button_two_text');
$button_two_url = get_sub_field('button_two_url');
$button_two_icon = get_sub_field('button_two_icon');
$button_two_bg_color = get_sub_field('button_two_bg_color');
$button_two_text_color = get_sub_field('button_two_text_color');

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



<?php
get_footer();
