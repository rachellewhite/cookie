<?php
/*
* Template Name: Specials Page
* Template Post Type: page
*/
 ?>
<?php get_header(); ?>
<div class="page-contain specials">
  <div class="specials-contain">
    <div class="order-header-holder">
    <h1 class="page-heading"><?php the_title(); ?></h1>
      <div class="specials-summary"><?php the_field('specials_page_description'); ?>
      </div>
<?php if ( have_rows( 'button' ) ) : ?>
      <div class="order-buttons">
              <?php while ( have_rows( 'button' ) ) : the_row(); ?>
                    <a href="<?php the_sub_field( 'button_link' ); ?>" class="button melon small w-button order"><?php the_sub_field( 'button_text' ); ?></a>
              <?php endwhile; endif; ?>
      </div>

    </div>





<?php

// check if the flexible content field has rows of data
if( have_rows('specials_layout') ):

 	// loop through the rows of data
    while ( have_rows('specials_layout') ) : the_row();

  // check current row layout
      if( get_row_layout() == 'specials_row' ):
    ?>

  <div class="specials-row">
    <div class="specials-title"><?php the_sub_field('product_name'); ?></div>

      <div class="specials-block">

    <?php if( have_rows('set_item') ): ?>
      <?php while ( have_rows('set_item') ) : the_row();

          $title = get_sub_field('set_title');
          $img = get_sub_field('set_image');
          $thumb = esc_url($img['sizes']['thumbnail']);
          $price = get_sub_field('set_price');
          $descrip = get_sub_field('set_description');


        ?>
        <div class="special-item">

          <div class="special-id"><?php echo $title; ?></div>


        <a href="<?php echo $img['url']; ?>" data-fancybox class="special-img">

        <img src="<?php echo $thumb; ?>" alt="">

        </a>


          <div class="special-price"><?php echo $price; ?></div>
          <div class="special-descrip"><?php echo $descrip; ?></div>
        </div>
        <?php endwhile; endif; ?>

      </div>
    </div>

  <?php endif; endwhile; endif; ?>

	</div>
</div>

<?php get_footer(); ?>
