  <div data-collapse="medium" data-animation="default" data-duration="400" class="page-navbar w-nav">
    <div class="page--navbar-contain w-container">
<a href="<?php echo esc_url( site_url( '/' ) ); ?>" class="page-logo-link">
  <img src="<?= get_template_directory_uri(); ?>/images/logo_page.png" alt="Corner Hutch Cookies, LLC" class="page-logo">
</a>
      <nav role="navigation" class="page-navlink--contain w-nav-menu">

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
    $replace = array('<a class="page-navlink--block w-nav-link"', ' ', '');
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
    $replace = array('<a class="page-navlink--block w-nav-link"', ' ', '');
    echo str_replace( $find, $replace, $navmenu );
   ?>
</nav>
<div class="social desk"><a href="https://www.instagram.com/cornerhutchcookies/" target="_blank"class="social-link w-inline-block"><img src="<?= get_template_directory_uri(); ?>/images/insta-pg.png" alt="" class="social-image"></a><a href="https://www.facebook.com/cornerhutchcookies" target="_blank" class="social-link w-inline-block"><img src="<?= get_template_directory_uri(); ?>/images/facebook-pg.png" alt="" class="social-image"></a></div>
    </div>
      <div class="navbar-mobile-menu w-nav-button">
        <div class="navbar-mobile--text">menu</div>
      </div>
  </div>
