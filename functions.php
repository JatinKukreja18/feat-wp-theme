<?php
/**
 * Nowform x Feat functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Nowform_x_Feat
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'nowform_x_feat_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function nowform_x_feat_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Nowform x Feat, use a find and replace
		 * to change 'nowform-x-feat' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'nowform-x-feat', get_template_directory() . '/languages' );

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
				'menu-1' => esc_html__( 'Primary', 'nowform-x-feat' ),
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
				'nowform_x_feat_custom_background_args',
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
endif;
add_action( 'after_setup_theme', 'nowform_x_feat_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function nowform_x_feat_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'nowform_x_feat_content_width', 640 );
}
add_action( 'after_setup_theme', 'nowform_x_feat_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function nowform_x_feat_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'nowform-x-feat' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'nowform-x-feat' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'nowform_x_feat_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function nowform_x_feat_scripts() {
	// wp_enqueue_style( 'nowform-x-feat-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'nowform-x-feat-main', get_template_directory_uri() . '/sass/main.css', array(), rand(111,9999), 'all');
	wp_style_add_data( 'nowform-x-feat-style', 'rtl', 'replace' );

	wp_enqueue_script( 'nowform-x-feat-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'nowform_x_feat_scripts' );


/**
 * Custom Fonts
 * font-family: 'Neue Haas', sans-serif
 */
function enqueue_custom_fonts(){
	if(!is_admin()){
		wp_register_style('neue_haas',get_template_directory_uri() . "/fonts/fonts.css");
		wp_enqueue_style('neue_haas');
	}
}
add_action('wp_enqueue_scripts','enqueue_custom_fonts');


/*
* Creating a function to create our CPT Models
*/

function custom_post_type() {
 
	// Set UI labels for Custom Post Gender
		$labels = array(
			'name'                => _x( 'Models', 'Post Type General Name' ),
			'singular_name'       => _x( 'Model', 'Post Type Singular Name' ),
			'menu_name'           => __( 'Models' ),
			'parent_item_colon'   => __( 'Parent Model' ),
			'all_items'           => __( 'All Models' ),
			'view_item'           => __( 'View Model' ),
			'add_new_item'        => __( 'Add New Model' ),
			'add_new'             => __( 'Add New' ),
			'edit_item'           => __( 'Edit Model' ),
			'update_item'         => __( 'Update Model' ),
			'search_items'        => __( 'Search Model' ),
			'not_found'           => __( 'Not Found' ),
			'not_found_in_trash'  => __( 'Not found in Trash' ),
		);
		 
	// Set other options for Custom Post Type
		 
		$args = array(
			'label'               => __( 'models' ),
			'description'         => __( 'Model news and reviews' ),
			'labels'              => $labels,
			// Features this CPT supports in Post Editor
			'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions' ),
			// You can associate this CPT with a taxonomy or custom taxonomy. 
			'taxonomies'          => array( 'gender','post_tag' ),
			/* A hierarchical CPT is like Pages and can have
			* Parent and child items. A non-hierarchical CPT
			* is like Posts.
			*/ 
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
			'menu_icon'           => 'dashicons-groups',
			'capability_type'     => 'post',
			'show_in_rest' => true,
	 
		);
		 
		// Registering your Custom Post Type
		register_post_type( 'models', $args );
	 
	}
	 
	/* Hook into the 'init' action so that the function
	* Containing our post type registration is not 
	* unnecessarily executed. 
	*/
	 
add_action( 'init', 'custom_post_type', 0 );
	
// Let us create Taxonomy for Custom Post Type
add_action( 'init', 'gender_custom_taxonomy', 0 );
 
//create a custom taxonomy name it "type" for your posts
function gender_custom_taxonomy() {
 
  $labels = array(
    'name' => _x( 'Gender', 'taxonomy general name' ),
    'singular_name' => _x( 'Gender', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Gender' ),
    'all_items' => __( 'All Gender' ),
    'parent_item' => __( 'Parent Gender' ),
    'parent_item_colon' => __( 'Parent Gender:' ),
    'edit_item' => __( 'Edit Gender' ), 
    'update_item' => __( 'Update Gender' ),
    'add_new_item' => __( 'Add New Gender' ),
    'new_item_name' => __( 'New Gender Name' ),
    'menu_name' => __( 'Gender' ),
  ); 	
 
  register_taxonomy('gender',array('models'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
	'show_in_rest'=>true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'gender' ),
  ));
}
// Let us create Taxonomy for Custom Post Type
add_action( 'init', 'type_custom_taxonomy', 0 );
 
//create a custom taxonomy name it "type" for your posts
function type_custom_taxonomy() {
 
  $labels = array(
    'name' => _x( 'Talent Type', 'taxonomy general name' ),
    'singular_name' => _x( 'Talent Type', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Talent Type' ),
    'all_items' => __( 'All Talent Type' ),
    'parent_item' => __( 'Parent Talent Type' ),
    'parent_item_colon' => __( 'Parent Talent Type:' ),
    'edit_item' => __( 'Edit Talent Type' ), 
    'update_item' => __( 'Update Talent Type' ),
    'add_new_item' => __( 'Add New Talent Type' ),
    'new_item_name' => __( 'New Talent Type Name' ),
    'menu_name' => __( 'Talent Type' ),
  ); 	
 
  register_taxonomy('talent_type',array('talents'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
	'show_in_rest'=>true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'talent_type' ),
  ));
}
add_action( 'init', 'portfolio_tag_custom_taxonomy', 0 );

//create a custom taxonomy name it "portfolio tag" for your posts
function portfolio_tag_custom_taxonomy() {
 
	$labels = array(
	  'name' => _x( 'Portfolio Tag', 'taxonomy general name' ),
	  'singular_name' => _x( 'Portfolio Tag', 'taxonomy singular name' ),
	  'search_items' =>  __( 'Search Portfolio Tag' ),
	  'all_items' => __( 'All Portfolio Tag' ),
	  'parent_item' => __( 'Parent Portfolio Tag' ),
	  'parent_item_colon' => __( 'Parent Portfolio Tag:' ),
	  'edit_item' => __( 'Edit Portfolio Tag' ), 
	  'update_item' => __( 'Update Portfolio Tag' ),
	  'add_new_item' => __( 'Add New Portfolio Tag' ),
	  'new_item_name' => __( 'New Portfolio Tag Name' ),
	  'menu_name' => __( 'Portfolio Tag' ),
	); 	
   
	register_taxonomy('portfolio_tag',array('talent_portfolio'), array(
	  'hierarchical' => true,
	  'labels' => $labels,
	  'show_ui' => true,
	  'show_admin_column' => true,
	  'show_in_rest'=>true,
	  'query_var' => true,
	  'rewrite' => array( 'slug' => 'portfolio_tag' ),
	));
  }

add_action( 'init', 'project_type_custom_taxonomy', 0 );
  
//create a custom taxonomy name it "Project type " for your posts
function project_type_custom_taxonomy() {
 
	$labels = array(
	  'name' => _x( 'Project Type', 'taxonomy general name' ),
	  'singular_name' => _x( 'Project Type', 'taxonomy singular name' ),
	  'search_items' =>  __( 'Search Project Type' ),
	  'all_items' => __( 'All Project Type' ),
	  'parent_item' => __( 'Parent Project Type' ),
	  'parent_item_colon' => __( 'Parent Project Type:' ),
	  'edit_item' => __( 'Edit Project Type' ), 
	  'update_item' => __( 'Update Project Type' ),
	  'add_new_item' => __( 'Add New Project Type' ),
	  'new_item_name' => __( 'New Project Type Name' ),
	  'menu_name' => __( 'Project Type' ),
	); 	
   
	register_taxonomy('project_type',array('projects'), array(
	  'hierarchical' => true,
	  'labels' => $labels,
	  'show_ui' => true,
	  'show_admin_column' => true,
	  'show_in_rest'=>true,
	  'query_var' => true,
	  'rewrite' => array( 'slug' => 'project_type' ),
	));
  }
  
// owner taxonomy
// add_action( 'init', 'owner_custom_taxonomy', 0 );

// function owner_custom_taxonomy() {
 
// 	$labels = array(
// 	  'name' => _x( 'Portfolio Owner', 'taxonomy general name' ),
// 	  'singular_name' => _x( 'Portfolio Owner', 'taxonomy singular name' ),
// 	  'search_items' =>  __( 'Search Portfolio Owner' ),
// 	  'all_items' => __( 'All Portfolio Owner' ),
// 	  'parent_item' => __( 'Parent Portfolio Owner' ),
// 	  'parent_item_colon' => __( 'Parent Portfolio Owner:' ),
// 	  'edit_item' => __( 'Edit Portfolio Owner' ), 
// 	  'update_item' => __( 'Update Portfolio Owner' ),
// 	  'add_new_item' => __( 'Add New Portfolio Owner' ),
// 	  'new_item_name' => __( 'New Portfolio Owner Name' ),
// 	  'menu_name' => __( 'Portfolio Owner' ),
// 	); 	
   
// 	register_taxonomy('owner',array('talent_portfolio'), array(
// 	  'hierarchical' => true,
// 	  'labels' => $labels,
// 	  'show_ui' => true,
// 	  'show_admin_column' => true,
// 	  'show_in_rest'=>true,
// 	  'query_var' => true,
// 	  'rewrite' => array( 'slug' => 'owner' ),
// 	));
//   }
   
/*
* Creating a function to create our CPT
*/
 
function custom_post_type_projects() {
 
	// Set UI labels for Custom Post Type
		$labels = array(
			'name'                => _x( 'Projects', 'Post Type General Name' ),
			'singular_name'       => _x( 'Project', 'Post Type Singular Name' ),
			'menu_name'           => __( 'Projects' ),
			'parent_item_colon'   => __( 'Parent Project' ),
			'all_items'           => __( 'All Projects' ),
			'view_item'           => __( 'View Project' ),
			'add_new_item'        => __( 'Add New Project' ),
			'add_new'             => __( 'Add New' ),
			'edit_item'           => __( 'Edit Project' ),
			'update_item'         => __( 'Update Project' ),
			'search_items'        => __( 'Search Project' ),
			'not_found'           => __( 'Not Found' ),
			'not_found_in_trash'  => __( 'Not found in Trash' ),
		);
		 
	// Set other options for Custom Post Type
		 
		$args = array(
			'label'               => __( 'projects' ),
			'description'         => __( 'Project news and reviews' ),
			'labels'              => $labels,
			// Features this CPT supports in Post Editor
			'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields', ),
			// You can associate this CPT with a taxonomy or custom taxonomy. 
			'taxonomies'          => array( 'genres' ),
			/* A hierarchical CPT is like Pages and can have
			* Parent and child items. A non-hierarchical CPT
			* is like Posts.
			*/ 
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
			'menu_icon'           => 'dashicons-groups',
			'capability_type'     => 'post',
			'show_in_rest' => true,
	 
		);
		 
		// Registering your Custom Post Type
		register_post_type( 'projects', $args );
	 
	}
	 
	/* Hook into the 'init' action so that the function
	* Containing our post type registration is not 
	* unnecessarily executed. 
	*/
	 
add_action( 'init', 'custom_post_type_projects', 0 );

/*
* Creating a function to create our CPT Talents
*/

function custom_post_type_talents() {
 
	// Set UI labels for Custom Post Talents
		$labels = array(
			'name'                => _x( 'Talents', 'Post Type General Name' ),
			'singular_name'       => _x( 'Talent', 'Post Type Singular Name' ),
			'menu_name'           => __( 'Talents' ),
			'parent_item_colon'   => __( 'Parent Talent' ),
			'all_items'           => __( 'All Talents' ),
			'view_item'           => __( 'View Talent' ),
			'add_new_item'        => __( 'Add New Talent' ),
			'add_new'             => __( 'Add New' ),
			'edit_item'           => __( 'Edit Talent' ),
			'update_item'         => __( 'Update Talent' ),
			'search_items'        => __( 'Search Talent' ),
			'not_found'           => __( 'Not Found' ),
			'not_found_in_trash'  => __( 'Not found in Trash' ),
		);
		 
	// Set other options for Custom Post Type
		 
		$args = array(
			'label'               => __( 'talents' ),
			'description'         => __( 'Talent news and reviews' ),
			'labels'              => $labels,
			// Features this CPT supports in Post Editor
			'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions','custom-fields', ),
			// You can associate this CPT with a taxonomy or custom taxonomy. 
			'taxonomies'          => array( 'talent_type' ),
			/* A hierarchical CPT is like Pages and can have
			* Parent and child items. A non-hierarchical CPT
			* is like Posts.
			*/ 
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 6,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'menu_icon'           => 'dashicons-groups',
			'capability_type'     => 'post',
			'show_in_rest' => true,
	 
		);
		 
		// Registering your Custom Post Type
		register_post_type( 'talents', $args );
	 
	}
	 
	/* Hook into the 'init' action so that the function
	* Containing our post type registration is not 
	* unnecessarily executed. 
	*/
	 
add_action( 'init', 'custom_post_type_talents', 0 );	


/*
* Creating a function to create our CPT Talents
*/

function custom_post_type_talent_portfolio() {
 
	// Set UI labels for Custom Post Gender
		$labels = array(
			'name'                => _x( 'Talent Portfolios', 'Post Type General Name' ),
			'singular_name'       => _x( 'Talent Portfolio', 'Post Type Singular Name' ),
			'menu_name'           => __( 'Talent Portfolios' ),
			'parent_item_colon'   => __( 'Parent Talent Portfolio' ),
			'all_items'           => __( 'All Talent Portfolios' ),
			'view_item'           => __( 'View Portfolio' ),
			'add_new_item'        => __( 'Add New Portfolio' ),
			'add_new'             => __( 'Add New' ),
			'edit_item'           => __( 'Edit Portfolio' ),
			'update_item'         => __( 'Update Portfolio' ),
			'search_items'        => __( 'Search Portfolio' ),
			'not_found'           => __( 'Not Found' ),
			'not_found_in_trash'  => __( 'Not found in Trash' ),
		);
		 
	// Set other options for Custom Post Type
		 
		$args = array(
			'label'               => __( 'talent_portfolio' ),
			'description'         => __( 'Talent Portfolios' ),
			'labels'              => $labels,
			// Features this CPT supports in Post Editor
			'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions','custom-fields' ),
			// You can associate this CPT with a taxonomy or custom taxonomy. 
			'taxonomies'          => array('portfolio_tag' ),
			/* A hierarchical CPT is like Pages and can have
			* Parent and child items. A non-hierarchical CPT
			* is like Posts.
			*/ 
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 7,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'menu_icon'           => 'dashicons-images-alt2',
			'capability_type'     => 'post',
			'show_in_rest' => true,
	 
		);
		 
		// Registering your Custom Post Type
		register_post_type( 'talent_portfolio', $args );
	 
	}
	 
	/* Hook into the 'init' action so that the function
	* Containing our post type registration is not 
	* unnecessarily executed. 
	*/
	
add_action( 'init', 'custom_post_type_talent_portfolio', 0 );

add_filter('manage_talent_portfolio_posts_columns', function($columns) {
	return array_merge($columns, ['owner' => __('Owner', 'textdomain')]);
});
 
add_action('manage_talent_portfolio_posts_custom_column', function($column_key, $post_id) {
	if ($column_key == 'owner') {
		$ownerID = get_post_meta($post_id, 'owner')[0];
		
		$owner = get_post($ownerID);

		if ($owner) {
			// var_dump($owner);
			
			echo '<a target="blank" href="'.admin_url().'post.php?post='.$ownerID.'&action=edit'.'"style="color:dodgerblue;">'. $owner->post_title .'</a>';
		} 
	}
}, 10, 2);

add_filter( 'rest_talent_portfolio_query', function( $args, $request ){
    if ( $meta_key = $request->get_param( 'metaKey' ) ) {
        $args['meta_key'] = $meta_key;
        $args['meta_value'] = $request->get_param( 'metaValue' );
    }
    return $args;
}, 10, 2 );
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

