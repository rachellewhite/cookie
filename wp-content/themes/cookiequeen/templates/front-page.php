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
        <?php echo do_shortcode('[recent_products per_page="3" columns="3" orderby="title" order="desc"]'
        ); ?>

<!--
          <div class="gallery_column--contain w-col w-col-3 w-col-medium-6 w-col-small-small-stack w-col-tiny-tiny-stack">
            <div class="gallery_block-img--contain">
              <div data-w-id="dad8b7b4-5ec9-0d88-d95c-519b2c606c3a" style="opacity:0" class="gallery_img--overlay"></div>
            </div>
          </div>
          <div class="gallery_column--contain w-col w-col-3 w-col-medium-6 w-col-small-small-stack w-col-tiny-tiny-stack">
            <div class="gallery_block-img--contain">
              <div data-w-id="cbbdf117-c446-64bc-75bb-1b95fdf6194b" style="opacity:0" class="gallery_img--overlay"></div>
            </div>
          </div>
          <div class="gallery_column--contain w-col w-col-3 w-col-medium-6 w-col-small-small-stack w-col-tiny-tiny-stack">
            <div class="gallery_block-img--contain">
              <div data-w-id="ac8ca69a-4de0-43e0-45c7-28f5f6f59b2e" style="opacity:0" class="gallery_img--overlay"></div>
            </div>
          </div> -->
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
