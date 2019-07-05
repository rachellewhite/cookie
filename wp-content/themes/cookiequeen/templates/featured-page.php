<?php
/*
* Template Name: Featured Page
* Template Post Type: page
*/
 ?>
<?php get_header(); ?>
      <div class="page-contain">


      <div class="page_section1--contain">
        <div class="page_s1-title-contain"><?php the_title(); ?></div>
				<div class="page_s1-content--contain">
        <?php if ( have_rows( 'featured' ) ) : ?>
        <?php while ( have_rows( 'featured' ) ) : the_row(); ?>

          <?php endwhile; endif; ?>

				</div>
			</div>
</div>

<?php get_footer(); ?>
