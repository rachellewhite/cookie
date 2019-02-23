<?php
/*
* Template Name: Front Page
* Template Post Type: page
*/
 ?>

<?php get_header(); ?>

      <div class="home_section-1--contain">
        <div class="home_s1--block">
          <div class="columns w-row">
            <div class="column-4 w-col w-col-2 w-col-small-small-stack w-col-stack"></div>
            <div class="column-3 w-col w-col-8 w-col-small-small-stack w-col-stack"><img src="<?= get_template_directory_uri(); ?>/images/ch_logo-full.png" alt="" class="home_img--logo">
              <div class="home_s1-block--text">Welcome to Corner Hutch Cookies, <br>where custom-designed, hand-decorated cookies <br>are made from scratch and baked fresh to order.</div>
              <div class="home_s1-block--button">Browse Designs <span class="home_s1-block-button--arrow">&gt;</span></div>
            </div>
            <div class="column-5 w-col w-col-2 w-col-small-small-stack w-col-stack"></div>
          </div>
        </div>
      </div>
      <div class="home_section-2--contain">
        <div class="home_section-2--columns w-row">
          <div class="gallery_column--contain w-col w-col-3 w-col-medium-6 w-col-small-small-stack w-col-tiny-tiny-stack">
            <div class="home_gallery--block1">
              <h1 class="gallery_block-1--title">Designs fresh from the bakery</h1><img src="<?= get_template_directory_uri(); ?>/images/ch_home-gal-block--ornament.png" width="123.5" alt="">
              <h2 class="gallery_block-1--subtitle"><a href="#" class="gallery_block1-title--link">view all &gt;</a></h2>
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

                  <?php
                    $item_row_counter++;
                    if( $item_row_counter == 1 || $item_row_counter % 3 == 1 ) {
                      echo '';
                    }
                  ?>
                  <?php if ( has_post_thumbnail() ): ?>

                  <div data-src="<?= get_the_post_thumbnail_url(); ?>" class="gallery_column--contain w-col w-col-3 w-col-medium-6 w-col-small-small-stack w-col-tiny-tiny-stack" data-fancybox="gallery" style="background-image: url('<?php the_post_thumbnail_url(array(500,500)); ?>'); background-size: cover; background-position: center;">

                <div class="gallery_block-img--contain">
                        <!-- <?php the_post_thumbnail(array(300,300)); ?> -->
                        </div>

                  </div>
                    <?php endif; ?>

                  <?php if( $item_row_counter % 3 == 0 || $counter == ($length - 1) ){  echo '';
                  }
                    $counter++;
                  ?>

                <?php endforeach; ?>
              <?php wp_reset_postdata(); ?>

            <?php endif; ?>


        </div>
      </div>
      <div class="home_section-3--contain">
        <div class="home_section-3--columns w-row">
          <div class="home_section3_quote w-col w-col-5 w-col-stack"><img src="<?= get_template_directory_uri(); ?>/images/ch_home-taste.gif" alt="" class="home-s3-taste-quote--img"></div>
          <div class="home_news-block--contain w-col w-col-7 w-col-stack"><img src="<?= get_template_directory_uri(); ?>/images/ch_home-s3--title.png" width="240.5" alt="" class="home-s3-news-title-img">
          <?php
               // Define our WP Query Parameters
               $query_options = array(
                   'posts_per_page' => 1,
               );
               $the_query = new WP_Query( $query_options );

               while ($the_query -> have_posts()) : $the_query -> the_post();
          ?>

            <h1 class="news_title-1"><?php the_title(); ?></h1>

            <div class="news_content--text"><?php the_content(); ?></div>

          <?php
               endwhile;
               wp_reset_postdata();
          ?>
            <a href="quote"><div class="news_block--button">Request A Quote</div></a>
          </div>
        </div>
      </div>

<?php get_footer(); ?>
