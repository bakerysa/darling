<?php
/**
 * The template for displaying work page
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Darling
 * Template Name: Home
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<div class="home-logo">
				<img src="<?php the_field('home_logo'); ?>" />
			</div>

		</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
