<?php
/*
* Template Name: Front Page
* Template Post Type: page
*/
 ?>

<?php get_header(); ?>

      <div class="home_section-1--contain">
        <div class="home_s1--block">
          <div class="home-header-content"><img src="<?= get_template_directory_uri(); ?>/images/logo_homepage.png" srcset="<?= get_template_directory_uri(); ?>/images/logo_homepage-p-500.png 500w, <?= get_template_directory_uri(); ?>/images/logo_homepage-p-800.png 800w, <?= get_template_directory_uri(); ?>/images/logo_homepage-p-1080.png 1080w, <?= get_template_directory_uri(); ?>/images/logo_homepage.png 1400w" sizes="(max-width: 479px) 100vw, (max-width: 991px) 400px, 500px" alt="" class="home_img--logo">
            <div class="home-header-text desk">Welcome to Corner Hutch Cookies, where custom-designed, hand-decorated <br>cookies are made from scratch <br>and baked fresh to order.</div>
            <div class="home-header-text mob">Welcome to Corner Hutch Cookies, where custom-designed, <br>hand-decorated cookies are made from scratch and baked fresh to order.</div><a href="<?php home_url(); ?>/gallery" class="button melon w-button">Browse Designs</a></div>
          <div class="header-imgs"><img src="<?= get_template_directory_uri(); ?>/images/home_rabbit.png" width="100.5" data-w-id="07c53d67-4a2d-9399-7477-c80d3adc99fd" style="opacity:0" alt="" class="fade-cookie header-img-01"><img src="<?= get_template_directory_uri(); ?>/images/ch_home-whale.png" data-w-id="94929c15-20e1-581c-abd1-f5899196b250" style="opacity:0" alt="" class="fade-cookie header-img-02"><img src="<?= get_template_directory_uri(); ?>/images/ch_home-giraffe.png" data-w-id="34537a2a-9ade-168d-729f-b32887d27bf9" style="opacity:0" alt="" class="fade-cookie header-img-03"><img src="<?= get_template_directory_uri(); ?>/images/ch_home--flower.png" data-w-id="96f57d2b-1efa-f345-4e3d-5ad60ec96f45" style="opacity:0" alt="" class="fade-cookie header-img-08"><img src="<?= get_template_directory_uri(); ?>/images/ch_home--field.png" data-w-id="8544ac8a-bdd2-53a6-edce-dac8995863f6" style="opacity:0" alt="" class="fade-cookie header-img-07"><img src="<?= get_template_directory_uri(); ?>/images/ch_home--lab.png" data-w-id="266e8f69-4762-1a06-51a7-98cb3e008d79" style="opacity:0" alt="" class="fade-cookie header-img-09"><img src="<?= get_template_directory_uri(); ?>/images/home_fox.png" data-w-id="2cc70a5d-bb40-079f-6e94-a7d696914472" style="opacity:0" alt="" class="fade-cookie header-img-04"><img src="<?= get_template_directory_uri(); ?>/images/ch_home-ladyflower.png" data-w-id="893ee423-2232-25c8-1383-9b8a6858f71e" style="opacity:0" alt="" class="fade-cookie header-img-05"><img src="<?= get_template_directory_uri(); ?>/images/ch_home-frisky.png" data-w-id="893ee423-2232-25c8-1383-9b8a6858f71d" style="opacity:0" alt="" class="fade-cookie header-img-06"><img src="<?= get_template_directory_uri(); ?>/images/ch_home--owl.png" data-w-id="187e0e00-4a55-627b-d2dd-c38e76a400ad" style="opacity:0" alt="" class="fade-cookie header-img-10"></div>
        </div>
      </div>
      <div class="home_section-2--contain">
        <div class="home_section-2--columns w-row">
        <div class="gallery_column--contain w-col w-col-3 w-col-medium-6 w-col-small-small-stack w-col-tiny-tiny-stack">
            <div class="home_gallery--block1">
              <h1 class="gallery_block-1--title">Designs fresh from the bakery</h1><a href="<?php home_url(); ?>/gallery" class="button melon green small w-button">View All</a></div>
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
