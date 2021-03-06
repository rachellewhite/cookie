<?php
/*
* Template Name: Gallery Page
* Template Post Type: gallery
*/
 ?>
<?php get_header(); ?>

  <div class="page-contain gallery">
  <div class="global-breadcrumb"><a href="<?php home_url(); ?>/gallery" class="breadcrumb w-inline-block"><img src="<?= get_template_directory_uri(); ?>/images/left.png" alt="" class="left"><div class="breadcrumb-link">back to gallery</div></a></div>

  <h1 class="page-heading"><?php the_title(); ?></h1>

<div class="gallery-summary-text"><?php the_field('gallery_text'); ?></div>



    <?php
    $gallery_items = get_field('gallery_items');
    $item_row_counter = 0;
    ?>

    <?php if( $gallery_items ): ?>

      <?php
        $counter = 0;
        $length = count($gallery_items);
      ?>

    <?php foreach( $gallery_items as $post):
        setup_postdata($post);

        $featured_img_url = get_the_post_thumbnail_url();
        ?>


        <?php
          $item_row_counter++;
          if( $item_row_counter == 1 || $item_row_counter % 4 == 1 ) {
            echo '<div class="gallery-flex-contain">';
          }
        ?>
        <?php if ( has_post_thumbnail() ): ?>

          <div class="product-contain">
            <a href="<?= $featured_img_url ?>" data-fancybox="gallery">
              <div class="product-thumb--contain w-clearfix">
                <div class="product-thumb-overlay"><img src="<?= get_template_directory_uri(); ?>/images/zoom.png" alt="" class="zoom"></div>
              <?php the_post_thumbnail(array(300,300)); // Declare pixel size you need inside the array ?>
                <div class="gallery-caption">
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                </div>
              </div>
            </a>
          </div>

          <?php endif; ?>

            <?php if( $item_row_counter % 4 == 0 || $counter == ($length - 1) ){  echo '</div>
';
            }
              $counter++;
            ?>

      <?php endforeach; ?>
    <?php wp_reset_postdata(); ?>

  <?php endif; ?>

</div>
<?php get_footer(); ?>
