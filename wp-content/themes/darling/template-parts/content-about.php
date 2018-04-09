<?php
/**
 * Template part for displaying About page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Darling
 */

?>

<div class="about">
  <p>
    <?php the_field('about_description'); ?>
  </p>
  <div class="social">
    <a target="_blank" href="<?php the_field('facebook'); ?>"><i class="fa fa-facebook border-square" aria-hidden="true"></i></a>
    <a target="_blank" href="<?php the_field('twitter'); ?>"><i class="fa fa-twitter border-square" aria-hidden="true"></i></a>
    <a target="_blank" href="<?php the_field('instagram'); ?>"><i class="fa fa-instagram border-square" aria-hidden="true"></i></a>
  </div>
</div>
