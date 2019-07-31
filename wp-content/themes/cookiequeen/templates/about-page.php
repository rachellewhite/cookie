<?php
/*
* Template Name: About Page
* Template Post Type: page
*/
 ?>

<?php get_header(); ?>
          <div class="page-contain">
            <div class="about-contain">
              <div class="order-header-holder">
                <h1 class="page-heading"><?php the_title(); ?></h1>
              </div>

  <?php if ( have_rows( 'about' ) ) : ?>
  <?php while ( have_rows( 'about' ) ) : the_row();

  $image = get_sub_field('about_image');
  $text = get_sub_field('about_paragraph');
?>

  <div class="about-row">
<?php if (get_sub_field('about_image')): ?>
        <img src="<?php echo $image['url']; ?>" class="about-img">
<?php endif; ?>
    <div class="about-text">
      <?php echo $text; ?>
    </div>
  </div>

  <?php endwhile; endif; ?>


  </div>
</div>


<?php get_footer(); ?>
