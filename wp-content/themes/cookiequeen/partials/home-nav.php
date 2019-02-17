  <div data-collapse="medium" data-animation="default" data-duration="400" class="main-navbar w-nav">
    <div class="main-navbar--contain w-container">
      <div class="div-block-5"></div>
      <nav role="navigation" class="main-navlink-contain w-nav-menu">
        <?php
          $args = array (
            'theme_location' => 'nav-menu',
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
      <div class="navbar-mobile-menu w-nav-button">
        <div class="navbar-mobile--text">menu</div>
      </div>
    </div>
  </div>
