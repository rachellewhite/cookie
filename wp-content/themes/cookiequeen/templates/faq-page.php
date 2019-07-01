<?php
/*
* Template Name: FAQ Page
* Template Post Type: page
*/
 ?>
<?php get_header(); ?>

  <div class="page-contain order">
    <div class="about-contain">
      <div class="order-header-holder">
        <h1 class="page-heading"><?php the_title(); ?></h1>
      </div>
    <?php if ( have_rows( 'faq' ) ) : ?>
    <?php
        while ( have_rows( 'faq' ) ) : the_row(); ?>
          <button class="accordion">
            <?php the_sub_field( 'question' ); ?>
          </button>
          <div class="panel">
          <?php the_sub_field( 'answer' ); ?>
          </div>
          <?php endwhile; endif; ?>
      </div>
        </div>


<?php get_footer(); ?>
