<?php get_header(); ?>
<div class="page-contain">
<div class="pricing-contain">
<h1 class="page-heading"><?php the_title(); ?></h1>
		<?php if (have_posts()): while (have_posts()) : the_post(); ?>
  			<?php the_content(); ?>
		<?php endwhile; ?>

		<?php endif; ?>
</div>
</div>
<?php get_footer(); ?>
