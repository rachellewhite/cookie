  <div data-collapse="medium" data-animation="default" data-duration="400" class="main-navbar w-nav">

    <div class="main-navbar--contain w-container">
      <nav role="navigation" class="main-navlink-contain w-nav-menu">
        <?php
          $args = array (
            'theme_location' => 'nav-menu-left',
            'container' => '',
            'items_wrap' => '%3$s', // just menu items
            'echo' => false, // dont' display, storing in $headermenu
          );
          $navmenu =  wp_nav_menu($args);
          $find = array('<li', '><a', '</li>');
          // replace the former with an opening tag, then a space between class and uri, then nothing (deleting closing li)
          $replace = array('<a class="main-navlink-block w-nav-link"', ' ', '');
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
        $replace = array('<a class="main-navlink-block w-nav-link"', ' ', '');
        echo str_replace( $find, $replace, $navmenu );
       ?>
      </nav>



  <div class="social desk"><a href="https://www.instagram.com/cornerhutchcookies/" target="_blank" class="social-link-home w-inline-block"><img src="<?= get_template_directory_uri(); ?>/images/insta.png" alt="" class="social-image-home"></a><a href="https://www.facebook.com/cornerhutchcookies" target="_blank" class="social-link-home w-inline-block"><img src="<?= get_template_directory_uri(); ?>/images/facebook.png" alt="" class="social-image-home"></a></div>
    </div>
<div class="navbar-mobile-menu w-nav-button">
  <div class="navbar-mobile--text">menu</div>
</div>
  </div>
