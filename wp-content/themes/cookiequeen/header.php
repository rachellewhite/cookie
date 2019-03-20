<!doctype html>
<html <?php language_attributes(); ?> class="no-js" data-wf-page="5b3d158e82ecaec646022c4d" data-wf-site="5b3d158e82ecaeac2c022c4c">
<head>
  <meta charset="utf-8">
		<title><?php wp_title(''); ?></title>
 	<meta content="width=device-width, initial-scale=1" name="viewport">

		<?php wp_head(); ?>

<link href="https://fonts.googleapis.com/css?family=Arvo:400,700|Open+Sans:300,400,700" rel="stylesheet">



</head>

<body <?php body_class("body"); ?>>

<?php if ( is_front_page() ) {
  include(locate_template('partials/home-nav.php'));
}
else {
    include(locate_template('partials/page-nav.php'));
} ?>

  <div class="global_site--contain">
        <div class="global--content--contain">
