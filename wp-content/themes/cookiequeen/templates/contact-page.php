<?php
/*
* Template Name: Contact Page
* Template Post Type: page
*/
 ?>
<?php get_header(); ?>
<div class="page-contain">
<div class="pricing-contain">
<h1 class="page-heading"><?php the_title(); ?></h1>

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>
<div class="form-announce">
  			<?php the_content(); ?>
</div>
		<?php endwhile; ?>

		<?php endif; ?>


<?php echo do_shortcode("[ninja_form id=6]"); ?>

</div>
</div>
<?php get_footer(); ?>
