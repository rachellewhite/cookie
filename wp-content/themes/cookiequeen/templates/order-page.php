<?php
/*
* Template Name: Order Page
* Template Post Type: page
*/
 ?>

<?php get_header(); ?>
      <div class="order-contain">
        <div class="order-header-holder">
          <h1 class="heading-4">Request a quote</h1>
          <div class="order-top-text">Please begin by reading the <a href="#" class="link-2">FAQ</a> and <a href="#" class="link">Pricing</a> pages and then fill out the form below to request more information and a quote for your custom cookie order.</div>
        </div>
        <div class="order-holder">
          <div class="order-columns w-row">
            <div class="order-column-01 w-col w-col-3">


    <?php if ( have_rows( 'left_bar' ) ) : ?>
    <?php while ( have_rows( 'left_bar' ) ) : the_row(); ?>

        <?php if ( have_rows( 'button' ) ) : ?>
        <?php while ( have_rows( 'button' ) ) : the_row(); ?>
              <a href="<?php the_sub_field( 'button_link' ); ?>" class="order-button"><?php the_sub_field( 'button_text' ); ?></a>
        <?php endwhile; endif; ?>

      <?php if ( have_rows( 'order_info_list' ) ) : ?>
        <ul class="order-list">
        <?php while ( have_rows( 'order_info_list' ) ) : the_row(); ?>

                <li class="order-list-item">
              <?php the_sub_field( 'order_info_text' ); ?>
                </li>

          <?php endwhile; ?>
            </ul>
      <?php endif; ?>
    </div>
  <?php endwhile; endif; ?>

            <div class="order-column-02 w-col w-col-9">
              <div class="form-announce"><?php the_field('order_announce'); ?>

              </div>

              <?php echo do_shortcode("[ninja_form id=4]"); ?>

              <div class="form-text"><strong class="bold-text-2">(Filling out this form does not commit you to ordering, it is just a starting place)</strong></div>
            </div>
          </div>
        </div>
      </div>



<?php get_footer(); ?>
