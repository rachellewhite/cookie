<?php
/*
* Template Name: Gallery Page
* Template Post Type: gallery
*/
 ?>
<?php get_header(); ?>
  <div class="global-breadcrumb"><a href="<?php home_url(); ?>/gallery" class="back-to-gallery"><span class="text-span">&lt; </span>back to gallery</a></div>

<h1 class="page_s1-title-contain"><?php the_title(); ?></h1>

<p class="gallery-summary-text"><?php the_field('gallery_text'); ?></p>

<div class="gallery_section1--contain">
  <?php
    $gallery_items = get_field('gallery_items');
    $item_row_counter = 0;
  ?>
  <?php if( $gallery_items ): ?>

    <?php
      $counter = 0;
      $length = count($gallery_items);
    ?>

    <?php foreach( $gallery_items as $post): ?>
      <?php setup_postdata($post); ?>

        <?php
          $item_row_counter++;
          if( $item_row_counter == 1 || $item_row_counter % 4 == 1 ) {
            echo '<div class="gallery_pg_columns-row w-row">';
          }
        ?>
        <?php if ( has_post_thumbnail() ): ?>

        <div class="col w-col w-col-4 w-col-medium-4 w-col-small-6 w-col-tiny-6">
          <a href="<?= get_the_post_thumbnail_url(); ?>" data-fancybox="gallery">
            <div class="product-thumb--contain">
              <?php the_post_thumbnail('thumbnail'); ?>
            </div>
          </a>
        </div>
          <?php endif; ?>

        <?php if( $item_row_counter % 4 == 0 || $counter == ($length - 1) ){  echo '</div>';
        }
          $counter++;
        ?>

      <?php endforeach; ?>
    <?php wp_reset_postdata(); ?>

  <?php endif; ?>

</div>

<?php get_footer(); ?>