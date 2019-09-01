<!doctype html>
<html <?php language_attributes(); ?> class="no-js" data-wf-page="5b3d158e82ecaec646022c4d" data-wf-site="5b3d158e82ecaeac2c022c4c">
<head>
  <meta charset="utf-8">
		<title><?php bloginfo( 'name' ); ?>  <?php wp_title('|'); ?></title>

	<link href="//www.google-analytics.com" rel="dns-prefetch">
      <link href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico" rel="shortcut icon">
      <link href="<?php echo get_template_directory_uri(); ?>/images/touch.png" rel="apple-touch-icon-precomposed">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<?php wp_head(); ?>

<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700&display=swap" rel="stylesheet">
</head>

<body <?php body_class("body"); ?>>
  <div class="global_site--contain">
        <div class="global--content--contain">

<?php if ( is_front_page() ): ?>
<?php  include(locate_template('partials/home-nav.php')); ?>

<?php else: ?>
    <?php include(locate_template('partials/page-nav.php')); ?>
<?php endif; ?>
