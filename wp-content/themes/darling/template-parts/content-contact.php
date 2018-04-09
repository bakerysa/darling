<?php
/**
 * Template part for displaying Contact page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Darling
 */

?>

<div class="container">
  <div class="col-md-7">
    <div class="description">
      <h1><?php the_field('contact_description'); ?></h1>
      <p><?php the_field('address'); ?> | <?php the_field('phone'); ?></p>
      <p><?php the_field('email'); ?></p>
      <div class="social">
        <a target="_blank" href="<?php the_field('facebook'); ?>"><i class="fa fa-facebook border-square" aria-hidden="true"></i></a>
        <a target="_blank" href="<?php the_field('twitter'); ?>"><i class="fa fa-twitter border-square" aria-hidden="true"></i></a>
        <a target="_blank" href="<?php the_field('instagram'); ?>"><i class="fa fa-instagram border-square" aria-hidden="true"></i></a>
      </div>
    </div>
  </div>
  <div class="col-md-5">
    <?php the_field('contact_details'); ?>
  </div>
</div>
