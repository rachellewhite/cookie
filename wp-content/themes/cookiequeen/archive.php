<?php get_header(); ?>


<h1 class="page_s1-title-contain">Gallery</h1>

	<div class="gallery_section1--contain">
		<?php if (have_posts()): ?>
			<?php while (have_posts()) : the_post(); ?>
  			<div class="col w-col w-col-3 w-col-medium-3 w-col-small-6 w-col-tiny-6">

		<!-- post thumbnail -->
	<?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>

      <div class="product-thumb--contain">
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
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


<?php get_footer(); ?>
