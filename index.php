<?php

/**
 * The main template file
 *
 * @package WordPress
 * @subpackage UrbanElementor
 * @since UrbanElementor 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">

		<?php
		if (have_posts()) :
			while (have_posts()) :
				the_post();

				// Display post content
				the_title('<h2>', '</h2>');
				the_content();

			endwhile;
		else :
			echo '<p>No content found</p>';
		endif;
		?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>