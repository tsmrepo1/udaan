<?php
/**
 * udaan functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package udaan
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function udaan_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on udaan, use a find and replace
		* to change 'udaan' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'udaan', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'udaan' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'udaan_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'udaan_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function udaan_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'udaan_content_width', 640 );
}
add_action( 'after_setup_theme', 'udaan_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function udaan_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'udaan' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'udaan' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'udaan_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function udaan_scripts() {
	wp_enqueue_style( 'udaan-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'udaan-style', 'rtl', 'replace' );

	wp_enqueue_script( 'udaan-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'udaan_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Register Custom Navigation Walker
 */
function aussie_register_navwalker(){
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'aussie_register_navwalker' );

function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );
//Acf Option
if( function_exists('acf_add_options_page') ) {	
	acf_add_options_page();	
}

remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_after_shop_loop' , 'woocommerce_result_count', 20 );

/**
 * Change number of products that are displayed per page (shop page)
 */
add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 3 );

function new_loop_shop_per_page( $cols ) {
  // $cols contains the current number of products per page based on the value stored on Options –> Reading
  // Return the number of products you wanna show per page.
  $cols = 6;
  return $cols;
}

// Number Pagination Function 
function njengah_number_pagination() {
	/** 
	 * Create numeric pagination in WordPress
	 */	 
	// Get total number of pages
	global $wp_query;
	$total = $wp_query->max_num_pages;
	// Only paginate if we have more than one page
	if ( $total > 1 )  {
	     // Get the current page
	     if ( !$current_page = get_query_var('paged') )
	          $current_page = 1;
	     // Structure of “format” depends on whether we’re using pretty permalinks
	     $format = empty( get_option('permalink_structure') ) ? '&page=%#%' : 'page/%#%/';
	     echo paginate_links(array(
	          'base' => get_pagenum_link(1) . '%_%',
	          'format' => $format,
	          'current' => $current_page,
	          'total' => $total,
	          'mid_size' => 4,
	          'type' => 'list'
	     ));
	}
}


//Our Packages Post Type
function my_custom_post_packages() {

//labels array added inside the function and precedes args array
 
$labels = array(
'name' => _x( 'Packages', 'post type general name' ),
'singular_name' => _x( 'Packages', 'post type singular name' ),
'add_new' => _x( 'Add New', 'Packages' ),
'add_new_item' => __( 'Add New Packages' ),
'edit_item' => __( 'Edit Packages' ),
'new_item' => __( 'New Packages' ),
'all_items' => __( 'All Packages' ),
'view_item' => __( 'View Packages' ),
'search_items' => __( 'Search Packages' ),
'not_found' => __( 'No Packages found' ),
'not_found_in_trash' => __( 'No Packages found in the Trash' ),
'parent_item_colon' => '',
'menu_name' => 'Packages'
);

// args array

$args = array(
'labels' => $labels,
'description' => 'Displays Packages and their ratings',
'public' => true,
'menu_position' => 8,
'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
'has_archive' => true,
);

register_post_type( 'packages', $args );
register_taxonomy('category', 'packages', array('hierarchical' => true, 'label' => 'Category', 'singular_name' => 'Category', "rewrite" => true, "query_var" => true));
}
add_action( 'init', 'my_custom_post_packages' );


// create custom post type "Manage Bookings"
add_action( 'init', 'manage_bookings_post_type', 0 );
function manage_bookings_post_type() {
    $labels = array(
        'name'                => _x( 'Bookings', 'Post Type General Name', 'manage_bookings' ),
        'singular_name'       => _x( 'Booking', 'Post Type Singular Name', 'manage_bookings' ),
        'menu_name'           => __( 'Manage Bookings', 'manage_bookings' ),
        'parent_item_colon'   => __( 'Parent Booking', 'manage_bookings' ),
        'all_items'           => __( 'All Bookings', 'manage_bookings' ),
        'view_item'           => __( 'View Booking', 'manage_bookings' ),
        'add_new_item'        => __( 'Add New Booking', 'manage_bookings' ),
        'add_new'             => __( 'Add New', 'manage_bookings' ),
        'edit_item'           => __( 'Edit Booking', 'manage_bookings' ),
        'update_item'         => __( 'Update Booking', 'manage_bookings' ),
        'search_items'        => __( 'Search Booking', 'manage_bookings' ),
        'not_found'           => __( 'Not Found', 'manage_bookings' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'manage_bookings' ),
    );
      
    $args = array(
        'label'               => __( 'Bookings', 'manage_bookings' ),
        'description'         => __( 'Manage all Bookings done from Carnival form.', 'manage_bookings' ),
        'labels'              => $labels,
        'supports'            => array( 'title'),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest'        => true,
		/*'capabilities' => array(
	        'create_posts' => false
	    )*/
    );
      
    // Registering your Custom Post Type
    register_post_type( 'manage_bookings', $args );
}

add_filter( 'manage_manage_bookings_posts_columns','carnival_filter_posts_columns', 10, 2);
add_action( 'manage_manage_bookings_posts_custom_column','carnival_manage_bookings_column', 10, 2);	
function carnival_filter_posts_columns( $columns ) {
	unset($columns['date']);
    $columns = array(
      'cb' => $columns['cb'],
      'title' => __( 'Title' ),
      'user_name' => __( 'Name' ),
      'user_email' => __( 'Email' ),
      'user_phone' => __( 'Phone' ),
      'category_id' => __( 'Category Id' ),
      'airport' => __( 'Airport Name' ),
      'travelling_date' => __( 'Travelling Date' ),
      'user_category' => __( 'Category' ),
      'user_booking_date' => __( 'Booking Date' ),
      'date_range' => __( 'Selective date' ),
      'partner' => __( 'Selective Partner' ),
      'season' => __( 'Season' )
    );
  return $columns;
}


function carnival_manage_bookings_column( $column, $post_id ) {
	// Image column
	if ( 'user_name' === $column ) {
		echo get_post_meta( $post_id, 'user_name', true );
	}
	if ( 'user_email' === $column ) {
		echo get_post_meta( $post_id, 'user_email', true );
	}
	if ( 'user_phone' === $column ) {
		echo get_post_meta( $post_id, 'user_phone', true );
	}
	if ( 'user_category' === $column ) {
		echo get_post_meta( $post_id, 'user_category', true );
	}
	if ( 'date_range' === $column ) {
		echo get_post_meta( $post_id, 'date_range', true );
	}
	if ( 'partner' === $column ) {
		echo get_post_meta( $post_id, 'partner', true );
	}
	if ( 'season' === $column ) {
		echo get_post_meta( $post_id, 'season', true );
	}
	if ( 'category_id' === $column ) {
		echo get_post_meta( $post_id, 'category_id', true );
	}
	if ( 'airport' === $column ) {
		echo get_post_meta( $post_id, 'airport', true );
	}
	if ( 'travelling_date' === $column ) {
		echo get_post_meta( $post_id, 'travelling_date', true );
	}
}

add_action( 'wp_ajax_carnival_frm_action', 'carnival_frm_action_callback');
add_action( 'wp_ajax_nopriv_carnival_frm_action', 'carnival_frm_action_callback');	
function carnival_frm_action_callback(){
	if(isset($_POST['action']) && $_POST['action'] == "carnival_frm_action"){
	    
	    $category_id = $_POST['category_id'];
	    $airport = $_POST['airport'];
	    $travelling_date = $_POST['travelling_date'];
	
		$user_name = $_POST['user_name'];
		$user_email = $_POST['user_email'];
		$user_phone = $_POST['user_phone'];
		$user_category = $_POST['user_category'];
		$date_range = $_POST['date_range'];
		$partner = $_POST['partner'];
		$season = $_POST['season'];
		$insert_post = array(
		  'post_title'    => wp_strip_all_tags( $user_name." (".$user_email.")" ),
		  'post_content'  => '',
		  'post_status'   => 'publish',
		  'post_type' => 'manage_bookings'
		);
		$insert_post_id = wp_insert_post( $insert_post );
		if(!empty($insert_post_id)){
		    update_post_meta( $insert_post_id, 'category_id', $category_id );
		    update_post_meta( $insert_post_id, 'airport', $airport );
		    update_post_meta( $insert_post_id, 'travelling_date', $travelling_date );
		
			update_post_meta( $insert_post_id, 'user_name', $user_name );
			update_post_meta( $insert_post_id, 'user_email', $user_email );
			update_post_meta( $insert_post_id, 'user_phone', $user_phone );
			update_post_meta( $insert_post_id, 'user_category', $user_category );
			update_post_meta( $insert_post_id, 'date_range', $date_range );
			update_post_meta( $insert_post_id, 'partner', $partner );
			update_post_meta( $insert_post_id, 'season', $season );				
			echo "ok";
		}
	}
	exit;
}

function get_availability_by_category($user_category,$date,$time_slot,$slots){
	$booked_args = array(
	  	'post_type'      => 'manage_bookings',
	  	'posts_per_page' => -1,
	  	'post_status'    => 'publish',
		'meta_query'     => array(
			'relation'=>'AND',
			array(
			    'key'     => 'user_booking_date',
			    'value'   => $date,
			    'compare' => '='
			),
			array(
			    'key'     => 'user_booking_time',
			    'value'   => $time_slot,
			    'compare' => '='
			),
			array(
			    'key'     => 'user_category',
			    'value'   => $user_category,
			    'compare' => '='
			),
			array(
			    'key'     => 'category_id',
			    'value'   => $category_id,
			    'compare' => '='
			),
			array(
			    'key'     => 'airport',
			    'value'   => $airport,
			    'compare' => '='
			),
			array(
			    'key'     => 'travelling_date',
			    'value'   => $travelling_date,
			    'compare' => '='
			)

		),
	);
	$booked_query = get_posts( $booked_args );
	if($booked_query){
		$user_slot_qty_val = 0;
		foreach($booked_query as $booked_query_val){
			$user_slot_qty_val +=get_post_meta( $booked_query_val->ID, 'user_slot_qty', true );
		}
	}
	//echo '<pre>'; print_r($booked_query); 
	return $user_slot_qty_val;
}

