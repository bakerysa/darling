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

			<div style="background: url('<?php the_field('home_background'); ?>');">

		</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
