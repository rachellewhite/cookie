<?php
/*
* Template Name: Order Page
* Template Post Type: page
*/
 ?>

<?php get_header(); ?>
      <div class="page-contain">
        <div class="order-header-holder">
          <h1 class="page-heading"><?php the_title(); ?></h1>
            <div class="form-announce"><?php the_field('order_announce'); ?></div>
        </div>
        <div class="order-columns w-row">
          <div class="order-column-01 w-col w-col-4 w-col-stack">
              <?php if ( have_rows( 'left_bar' ) ) : ?>
              <?php while ( have_rows( 'left_bar' ) ) : the_row(); ?>

                  <?php if ( have_rows( 'button' ) ) : ?>
          <div class="order-buttons">
                  <?php while ( have_rows( 'button' ) ) : the_row(); ?>
                        <a href="<?php the_sub_field( 'button_link' ); ?>" class="button melon small w-button order"><?php the_sub_field( 'button_text' ); ?></a>
                  <?php endwhile; endif; ?>
          </div>
            <h4 class="order-notes-title">Notes about ordering:</h4>

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

              <div class="order-column-02 w-col w-col-8 w-col-stack">

                <div class="order-top-text"><?php the_field('form_intro'); ?></div>
  

              <?php echo do_shortcode("[ninja_form id=4]"); ?>


            </div>
          </div>
        </div>
      </div>



<?php get_footer(); ?>
