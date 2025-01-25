<div class="container">
    <div class="row">
        <?php if ($title = get_field('image_slider_title', 'option')) : ?>
            <h2 class="align-center"><?php echo esc_html($title); ?></h2>
        <?php endif; ?>
    </div>
</div>

<?php
$args = array(
    'post_type'      => 'company',
    'posts_per_page' => -1, // Retrieve all companies
); ?>
<div class="container">
    <div class="row">
<?php
$companies = new WP_Query($args); ?>
    <div class="owl-carousel owl-theme logo-carousel">
        <?php while ($companies->have_posts()) : $companies->the_post(); ?>
            <?php if (has_post_thumbnail()) : ?>
                <div class="item">
                    <?php the_post_thumbnail('medium'); ?>
                </div>
            <?php endif; ?>
        <?php endwhile; ?>
    </div>
<?php 
wp_reset_postdata(); ?>
    </div>
</div>