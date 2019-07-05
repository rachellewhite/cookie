<?php get_header(); ?>

  <div class="page-contain">
  <h1 class="page-heading">Gallery</h1>

<div class="gallery-summary-text"><?php the_field('gallery_description',  get_option('page_for_posts')); ?></div>

  <div class="gallery-flex-contain">
		<?php if (have_posts()): ?>
			<?php while (have_posts()) : the_post(); ?>
  		<div class="product-contain">

		<!-- post thumbnail -->
	<?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>

        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
        <div class="product-thumb--contain w-clearfix">
          <div class="product-thumb-overlay"><img src="<?= get_template_directory_uri(); ?>/images/zoom.png" alt="" class="zoom"></div>
					<?php the_post_thumbnail(array(300,300)); // Declare pixel size you need inside the array ?>
			</div>
				</a>

	<?php endif; ?>
		<!-- /post thumbnail -->
		<!-- post title -->
		<div class="gallery-caption">
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
		</div>
		<!-- /post title -->
			</div>
		<?php endwhile; ?>
  <?php endif; ?>
	</div>
</div>

<?php get_footer(); ?>
