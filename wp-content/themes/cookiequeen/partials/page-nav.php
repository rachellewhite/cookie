  <div data-collapse="medium" data-animation="default" data-duration="400" class="main-navbar w-nav">
    <div class="page--navbar-contain w-container">
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
<a href="<?php home_url(); ?>" class="page-logo-link">
  <img src="<?= get_template_directory_uri(); ?>/images/logo_page.png" alt="Corner Hutch Cookies, LLC" class="page-logo">
</a>
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
      <div class="navbar-mobile-menu w-nav-button">
        <div class="navbar-mobile--text">menu</div>
      </div>
    </div>
  </div>
