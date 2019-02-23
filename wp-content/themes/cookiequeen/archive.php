<?php get_header(); ?>

		<!-- section -->

			<h1><?php _e( 'Archives', 'html5blank' ); ?></h1>
<div class="gallery_pg_columns-row w-row">

<?php if (have_posts()): while (have_posts()) : the_post(); ?>

		<!-- post thumbnail -->
	<?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
  <div class="col w-col w-col-3 w-col-medium-3 w-col-small-6 w-col-tiny-6">
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
      <div class="product-thumb--contain">
			<?php the_post_thumbnail(array(300,300)); // Declare pixel size you need inside the array ?>
			</a>
		</div>
		<?php endif; ?>
		<!-- /post thumbnail -->
		<!-- post title -->
		<div class="gallery_pg_cat-title">
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
		</div>
		<!-- /post title -->
	</div>

<?php endwhile; ?>

<?php endif; ?>
</div>

			<?php get_template_part('pagination'); ?>


<?php get_sidebar(); ?>

<?php get_footer(); ?>
