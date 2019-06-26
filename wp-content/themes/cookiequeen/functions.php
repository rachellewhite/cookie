<?php
/*
 *  Author: Todd Motto | @toddmotto
 *  URL: html5blank.com | @html5blank
 *  Custom functions, support, custom post types and more.
 */

/*------------------------------------*\
	External Modules/Files
\*------------------------------------*/

// Load any external files you have here

/*------------------------------------*\
	Theme Support
\*------------------------------------*/


/*------------------------------------*\
	Functions
\*------------------------------------*/


// Load styles
function cookiequeen_styles()
{
    wp_register_style('normalize', get_template_directory_uri() . '/css/normalize.css', array(), '', 'all');

    wp_register_style('webflow', get_template_directory_uri() . '/css/webflow.css', array(), '1.0', 'all');

    wp_register_style('fancybox', get_template_directory_uri() . '/css/jquery.fancybox.min.css', array(), '1.0', 'all');

    wp_register_style('wf-export', get_template_directory_uri() . '/css/corner-hutch-cookies.webflow.css', array(), '1.0', 'all');

    wp_register_style('custom-styles', get_template_directory_uri() . '/css/style.css', array(), '1.0', 'all');

    wp_register_style('form-styles', get_template_directory_uri() . '/css/form.css', array(), '1.0', 'all');

    wp_enqueue_style('normalize'); // Enqueue it!
    wp_enqueue_style('webflow'); // Enqueue it!
    wp_enqueue_style('fancybox'); // Enqueue it!
    wp_enqueue_style('wf-export'); // Enqueue it!
    wp_enqueue_style('custom-styles'); // Enqueue it!
    wp_enqueue_style('form-styles'); // Enqueue it!

}

add_action('wp_enqueue_scripts', 'cookiequeen_styles'); // Add Theme Stylesheet



// Load Scripts
function cookiequeen_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

				wp_register_script('jquery-3.3.1', get_template_directory_uri() . '/js/jquery-3.3.1.min.js', array(), '1.0.0', true);
        wp_enqueue_script('jquery-3.3.1'); // Enqueue it!

        wp_register_script('webflow', get_template_directory_uri() . '/js/webflow.js', array('jquery-3.3.1'), '', true); // Custom scripts
        wp_enqueue_script('webflow'); // Enqueue it!

        wp_register_script('html5blankscripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '', true); // Custom scripts
        wp_enqueue_script('html5blankscripts'); // Enqueue it!

        wp_register_script('fancybox',get_template_directory_uri() . '/js/jquery.fancybox.min.js', array('jquery-3.3.1'), '1.0', true);
				wp_enqueue_script('fancybox'); // Enqueue it!

    }
}
add_action('init', 'cookiequeen_scripts'); // Add Custom Scripts to wp_head

// Register main menu

function chc_custom_new_menu() {
  register_nav_menu('nav-menu-left',__( 'Nav Menu Left' ));
  register_nav_menu('nav-menu-right',__( 'Nav Menu Right' ));
  // register_nav_menu('modal-menu',__( 'Modal Menu' ));
}
add_action( 'init', 'chc_custom_new_menu' );


// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
    return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}


// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function html5wp_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}

// Custom Excerpts
function html5wp_index($length) // Create 20 Word Callback for Index page Excerpts, call using html5wp_excerpt('html5wp_index');
{
    return 20;
}

// Create 40 Word Callback for Custom Post Excerpts, call using html5wp_excerpt('html5wp_custom_post');
function html5wp_custom_post($length)
{
    return 40;
}

// Create the Custom Excerpts callback
function html5wp_excerpt($length_callback = '', $more_callback = '')
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}

// Custom View Article link to Post
function html5_blank_view_article($more)
{
    global $post;
    return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('View Article', 'html5blank') . '</a>';
}

// // Remove Admin bar
// function remove_admin_bar()
// {
//     return false;
// }

// Remove 'text/css' from our enqueued stylesheet
function html5_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}


/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/


add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('init', 'html5wp_pagination'); // Add our HTML5 Pagination

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('avatar_defaults', 'html5blankgravatar'); // Custom Gravatar in Settings > Discussion
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('excerpt_more', 'html5_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
// add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'html5_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether


function remove_extra_image_sizes() {
    foreach ( get_intermediate_image_sizes() as $size ) {
        if ( !in_array( $size, array( 'thumbnail', 'medium', 'medium_large', 'large' ) ) ) {
            remove_image_size( $size );
        }
    }
}
add_filter( 'intermediate_image_sizes', function( $sizes )
{
    return array_filter( $sizes, function( $val )
    {
        return 'medium_large' !== $val; // Filter out 'medium_large'
    } );
} );


add_action('init', 'remove_extra_image_sizes');
add_theme_support( 'post-thumbnails', array( 'post','product', 'gallery' ) );


// Register Custom Post Type Product
// Post Type Key: product
function create_product_cpt() {

	$labels = array(
		'name' => __( 'Product', 'Post Type General Name', 'textdomain' ),
		'singular_name' => __( 'Product', 'Post Type Singular Name', 'textdomain' ),
		'menu_name' => __( 'Products', 'textdomain' ),
		'name_admin_bar' => __( 'Products', 'textdomain' ),
		'archives' => __( 'Product Archives', 'textdomain' ),
		'attributes' => __( 'Product Attributes', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Product:', 'textdomain' ),
		'all_items' => __( 'All Products', 'textdomain' ),
		'add_new_item' => __( 'Add New Product', 'textdomain' ),
		'add_new' => __( 'Add New', 'textdomain' ),
		'new_item' => __( 'New Product', 'textdomain' ),
		'edit_item' => __( 'Edit Product', 'textdomain' ),
		'update_item' => __( 'Update Product', 'textdomain' ),
		'view_item' => __( 'View Product', 'textdomain' ),
		'view_items' => __( 'View Products', 'textdomain' ),
		'search_items' => __( 'Search Products', 'textdomain' ),
		'not_found' => __( 'Not found', 'textdomain' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
		'featured_image' => __( 'Featured Image', 'textdomain' ),
		'set_featured_image' => __( 'Set featured image', 'textdomain' ),
		'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
		'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
		'insert_into_item' => __( 'Insert into Product', 'textdomain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Product', 'textdomain' ),
		'items_list' => __( 'Products list', 'textdomain' ),
		'items_list_navigation' => __( 'Products list navigation', 'textdomain' ),
		'filter_items_list' => __( 'Filter Products list', 'textdomain' ),
	);
	$args = array(
		'label' => __( 'Product', 'textdomain' ),
		'description' => __( 'Products', 'textdomain' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-store',
		'supports' => array('title', 'editor', 'thumbnail', 'page-attributes', 'post-formats', ),
		'taxonomies' => array('category'),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'product', $args );

}
add_action( 'init', 'create_product_cpt', 0 );

/* Make sure custom post type shows on category page */
function custom_post_type_cat_filter($query) {
  if ( !is_admin() && $query->is_main_query() ) {
    if ($query->is_category()) {
      $query->set( 'post_type', array( 'post', 'product' ) );
    }
  }
}

add_action('pre_get_posts','custom_post_type_cat_filter');

// Register Custom Post Type Gallery
// Post Type Key: Gallery
function create_Gallery_cpt() {

	$labels = array(
		'name' => __( 'Gallery', 'Post Type General Name', 'textdomain' ),
		'singular_name' => __( 'Gallery', 'Post Type Singular Name', 'textdomain' ),
		'menu_name' => __( 'Galleries', 'textdomain' ),
		'name_admin_bar' => __( 'Galleries', 'textdomain' ),
		'archives' => __( 'Gallery Archives', 'textdomain' ),
		'attributes' => __( 'Gallery Attributes', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Gallery:', 'textdomain' ),
		'all_items' => __( 'All Galleries', 'textdomain' ),
		'add_new_item' => __( 'Add New Gallery', 'textdomain' ),
		'add_new' => __( 'Add New', 'textdomain' ),
		'new_item' => __( 'New Gallery', 'textdomain' ),
		'edit_item' => __( 'Edit Gallery', 'textdomain' ),
		'update_item' => __( 'Update Gallery', 'textdomain' ),
		'view_item' => __( 'View Gallery', 'textdomain' ),
		'view_items' => __( 'View Galleries', 'textdomain' ),
		'search_items' => __( 'Search Galleries', 'textdomain' ),
		'not_found' => __( 'Not found', 'textdomain' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
		'featured_image' => __( 'Featured Image', 'textdomain' ),
		'set_featured_image' => __( 'Set featured image', 'textdomain' ),
		'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
		'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
		'insert_into_item' => __( 'Insert into Gallery', 'textdomain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Gallery', 'textdomain' ),
		'items_list' => __( 'Galleries list', 'textdomain' ),
		'items_list_navigation' => __( 'Galleries list navigation', 'textdomain' ),
		'filter_items_list' => __( 'Filter Galleries list', 'textdomain' ),
	);
	$args = array(
		'label' => __( 'Gallery', 'textdomain' ),
		'description' => __( 'Galleries', 'textdomain' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-screenoptions',
		'supports' => array('title', 'editor', 'thumbnail', 'page-attributes', 'post-formats', ),
		'taxonomies' => array(''),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'Gallery', $args );

}
add_action( 'init', 'create_Gallery_cpt', 0 );


?>
