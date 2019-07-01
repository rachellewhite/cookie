    </div>
		<!-- /global_content--contain--> <!-- Keeps footer pushed down -->

		</div>
		<!-- /global_site--contain-->

<div class="global-footer-contain">
  <div class="social desk footer"><a href="https://www.instagram.com/cornerhutchcookies/" target="_blank" class="social-link w-inline-block"><img src="<?= get_template_directory_uri(); ?>/images/insta.png" alt="" class="social-image"></a><a href="https://www.facebook.com/cornerhutchcookies" target="_blank" class="social-link w-inline-block"><img src="<?= get_template_directory_uri(); ?>/images/facebook.png" alt="" class="social-image"></a></div>
  <div class="footer-colophon">&copy; Copyright Corner Hutch Cookies, LLC 2019</div>
  <div data-collapse="medium" data-animation="default" data-duration="400" class="footer-navbar w-nav">
    <div class="w-container">
      <div class="w-nav-button">
        <div class="w-icon-nav-menu"></div>
      </div>

      <nav role="navigation" class="footer-navlink-contain w-nav-menu">  <?php
          $args = array (
            'theme_location' => 'nav-menu-left',
            'container' => '',
            'items_wrap' => '%3$s', // just menu items
            'echo' => false, // dont' display, storing in $headermenu
          );
          $navmenu =  wp_nav_menu($args);
          $find = array('<li', '><a', '</li>');
          // replace the former with an opening tag, then a space between class and uri, then nothing (deleting closing li)
          $replace = array('<a class="footer-navlink-block w-nav-link"', ' ', '');
          echo str_replace( $find, $replace, $navmenu );
         ?>
      <?php
        $args = array (
          'theme_location' => 'nav-menu-right',
          'container' => '',
          'items_wrap' => '%3$s', // just menu items
          'echo' => false, // dont' display, storing in $headermenu
        );
        $navmenu =  wp_nav_menu($args);
        $find = array('<li', '><a', '</li>');
        // replace the former with an opening tag, then a space between class and uri, then nothing (deleting closing li)
        $replace = array('<a class="footer-navlink-block w-nav-link"', ' ', '');
        echo str_replace( $find, $replace, $navmenu );
       ?></nav>

    </div>
  </div>
</div></div>
		<?php wp_footer(); ?>

		<!-- analytics -->
		<!-- <script>
		(function(f,i,r,e,s,h,l){i['GoogleAnalyticsObject']=s;f[s]=f[s]||function(){
		(f[s].q=f[s].q||[]).push(arguments)},f[s].l=1*new Date();h=i.createElement(r),
		l=i.getElementsByTagName(r)[0];h.async=1;h.src=e;l.parentNode.insertBefore(h,l)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-XXXXXXXX-XX', 'yourdomain.com');
		ga('send', 'pageview');
		</script> -->

	</body>
</html>
