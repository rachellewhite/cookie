<?php
/*
* Template Name: Front Page
* Template Post Type: page
*/
 ?>

<?php get_header(); ?>

      <div class="home_section-1--contain">
        <div class="home_s1--block">

<div class="header-left-imgs">
<img src="<?= get_template_directory_uri(); ?>/images/goldfish.png" alt="" class="home-cookie-01"><img src="<?= get_template_directory_uri(); ?>/images/giraffe.png" alt="" class="home-cookie-02"><img src="<?= get_template_directory_uri(); ?>/images/watermelon.png" alt="" class="home-cookie-03">
<img src="<?= get_template_directory_uri(); ?>/images/hare.png" alt="" class="home-cookie-04"><img src="<?= get_template_directory_uri(); ?>/images/gingy.png" alt="" class="home-cookie-09 cookie"><img src="<?= get_template_directory_uri(); ?>/images/snowman.png" alt="" class="home-cookie-12 cookie"></div>
          <div class="home-header-content"><img src="<?= get_template_directory_uri(); ?>/images/logo_homepage.png" srcset="<?= get_template_directory_uri(); ?>/images/logo_homepage-p-500.png 500w, <?= get_template_directory_uri(); ?>/images/logo_homepage-p-800.png 800w, <?= get_template_directory_uri(); ?>/images/logo_homepage-p-1080.png 1080w, <?= get_template_directory_uri(); ?>/images/logo_homepage.png 1400w" sizes="(max-width: 479px) 100vw, (max-width: 991px) 400px, 500px" alt="" class="home_img--logo">
            <div class="home-header-text desk">Welcome to Corner Hutch Cookies, where custom-designed, hand-decorated <br>cookies are made from scratch <br>and baked fresh to order.</div>
          <a href="<?php home_url(); ?>/gallery" class="button melon w-button">Browse Designs</a></div>
  <div class="header-right-imgs">
<img src="<?= get_template_directory_uri(); ?>/images/frisky.png" alt="" class="home-cookie-05"><img src="<?= get_template_directory_uri(); ?>/images/whale.png" alt="" class="home-cookie-06"><img src="<?= get_template_directory_uri(); ?>/images/owl.png" alt="" class="home-cookie-07">
<img src="<?= get_template_directory_uri(); ?>/images/fox.png" alt="" class="home-cookie-08"><img src="<?= get_template_directory_uri(); ?>/images/ch_home-ladyflower.png" alt="" class="home-cookie-10 cookie"><img src="<?= get_template_directory_uri(); ?>/images/lemons.png" alt="" class="home-cookie-11 cookie"></div>
        </div>
      </div>
      <div class="home_section-2--contain">
        <div class="home_section-2--columns w-row">
        <div class="gallery_column--contain w-col w-col-3 w-col-medium-6 w-col-small-small-stack w-col-tiny-tiny-stack">
          <div class="home_gallery--block1">
            <h1 class="gallery_block-1--title">Designs fresh from the bakery</h1><img src="<?= get_template_directory_uri(); ?>/images/ch_home-gal-block--ornament.png" alt="" class="designs-divider"><a href="<?php home_url(); ?>/gallery" class="view-button w-button">View All</a>
</div>
        </div>

            <?php
              $featured_products = get_field('featured_products');
              $item_row_counter = 0;
            ?>
            <?php if( $featured_products ): ?>

              <?php
                $counter = 0;
                $length = count($featured_products);
              ?>

              <?php foreach( $featured_products as $post): ?>
                <?php setup_postdata($post); ?>
            <div class="gallery_column--contain w-col w-col-3 w-col-medium-6 w-col-small-small-stack w-col-tiny-tiny-stack">
                  <?php
                    $item_row_counter++;
                    if( $item_row_counter == 1 || $item_row_counter % 3 == 1 ) {
                      echo '';
                    }
                  ?>
                  <?php if ( has_post_thumbnail() ): ?>

                  <div data-src="<?= get_the_post_thumbnail_url(); ?>" class="gallery_block-img--contain" data-fancybox="gallery" style="background-image: url('<?php the_post_thumbnail_url(array(500,500)); ?>'); background-size: cover; background-position: center;">


                  </div>
                    <?php endif; ?>

                  <?php if( $item_row_counter % 3 == 0 || $counter == ($length - 1) ){  echo '';
                  }
                    $counter++;
                  ?>
                  </div>

                <?php endforeach; ?>
              <?php wp_reset_postdata(); ?>

            <?php endif; ?>


        </div>
      </div>
      <div class="home_section-3--contain">
  <div class="home-text-contain"><img src="<?= get_template_directory_uri(); ?>/images/ch_home-taste.gif" alt="" class="joy"></div>
          <div class="home-news-contain">
          <img src="<?= get_template_directory_uri(); ?>/images/ch_home-s3--title.png" width="400" alt="" class="home-s3-news-title-img">
          <?php
               // Define our WP Query Parameters
               $query_options = array(
                   'posts_per_page' => 1,
               );
               $the_query = new WP_Query( $query_options );

               while ($the_query -> have_posts()) : $the_query -> the_post();
          ?>

            <h1 class="news_title-1"><?php the_title(); ?></h1>

            <div class="news_content--text"><?php the_content(); ?>
            </div>
          <a href="<?php home_url(); ?>/order" class="button melon w-button">Request a Quote</a>
              </div>

          <?php
               endwhile;
               wp_reset_postdata();
          ?>


        </div>

<?php get_footer(); ?>
