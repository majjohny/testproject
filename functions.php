<?php


// Include customizer.
require get_template_directory() . '/inc/customizer.php';



// -----------------------------------------Create Menu Location.----------------------------------------
function register_my_menus() {

register_nav_menus(
    array(
      'main-menu' => __( 'Footer Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );



// -----------------------------------------Create Widget Location.----------------------------------------
function majo_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Side Bar', 'majo' ),
		'id'            => 'sidebar',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'majo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="side-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'majo_widgets_init' );


// -----------------------------------------Create Custom Post Type.----------------------------------------
/*function create_post_type() {
  register_post_type( 'custom_posts',
 array(
$supports = array(
  'title',
  'editor', 
  'excerpt', 
  'thumbnail', 
  'custom-fields', 
  'comments',
  'revisions' 
	),
  
      'labels' => array(
        'name' => __( 'Custom Posts' ),
        'singular_name' => __( 'Custom Posts' ),
		
      ),
      'public' => true,
      'has_archive' => true,
	  
	  'supports'  => $supports,
	  'taxonomies' => array('category', 'post_tag'),
    )
  );
  
  
  
  
}

add_action( 'init', 'create_post_type' );*/




// rewrite urls
function taxonomy_slug_rewrite($wp_rewrite) {
    $rules = array();
    $taxonomies = get_taxonomies(array('_builtin' => false), 'objects');
    $post_types = get_post_types(array('public' => true, '_builtin' => false), 'names');
    foreach ($post_types as $post_type) {
	foreach ($taxonomies as $taxonomy) {
	    if ($taxonomy->object_type[0] == $post_type) {
		$categories = get_categories(array('type' => $post_type, 'taxonomy' => $taxonomy->name, 'hide_empty' => 0));
		foreach ($categories as $category) {
		    $rules[$post_type . '/' . $category->slug . '/?$'] = 'index.php?' . $category->taxonomy . '=' . $category->slug;
		}
	    }
	}
    }
    $wp_rewrite->rules = $rules + $wp_rewrite->rules;
}
add_filter( 'generate_rewrite_rules', 'taxonomy_slug_rewrite' );

//
//function create_post_types() {
//    register_post_type('custom_posts', array(
//	
//	$supports = array(
//  title',
//  editor', 
//  excerpt', 
//  thumbnail', 
//  custom-fields', 
//  comments',
//  revisions' 
//	),
//	
//        labels' => array(
//            name' => 'Custom Posts',
//            all_items' => 'All Posts'
//        ),
//        public' => true,
//		supports'  => $supports,
//		has_archive' => true,
//    ));
//}
//add_action('init', 'create_post_types');
//
// register taxonomy
//function create_taxonomies() {
//    register_taxonomy('recipes-categories', array('custom_posts'), array(
//        labels' => array(
//            name' => 'Categories'
//        ),
//        show_ui' => true,
//        show_tagcloud' => true,
//		post_tag' => true,
//		
//        rewrite' => array('slug' => 'custom_posts')
//    ));
//}
//add_action('init', 'create_taxonomies');













// register Custom Post Types
function create_post_types() {

    register_post_type('custom_posts', array(
	
	
	$supports = array(
  'title',
  'editor', 
  'excerpt', 
  'thumbnail', 
  'custom-fields', 
  'comments',
  'revisions' 
	),
	
	
	
        'labels' => array(
	    'name' => 'Projects',
	    'all_items' => 'All Projects'
	),
        'public' => true,
        'has_archive' => true,
		'supports'  => $supports,
			
	'rewrite' => array('slug' => 'custom_posts'),
	//'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
	'exclude_from_search' => false,
    'taxonomies' => array('post_tag'),
    ));

}
add_action('init', 'create_post_types');


// register Taxonomies
function create_taxonomies() {

    register_taxonomy('project-categories', array('custom_posts'), array(
	'labels' => array('name' => 'Categories'),
        'show_ui' => true,
	'show_tagcloud' => false,
	'hierarchical' => true,
	'rewrite' => array(
	 'slug' => 'custom_posts',

	)
    ));
	
	

}
add_action('init', 'create_taxonomies');










/*Add Custom post type to category page*/

function custom_post_type_cat_filter($query) {
  if ( !is_admin() && $query->is_main_query() ) {
    if ($query->is_category()) {
      $query->set( 'post_type', array( 'post', 'custom_posts' ) );
    }
  }
}

add_action('pre_get_posts','custom_post_type_cat_filter');






/*add_action('admin_menu', 'my_remove_sub_menus');

function my_remove_sub_menus() {
    remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=category');
    remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=post_tag');
}



function ryanbenhase_unregister_tags() {
    unregister_taxonomy_for_object_type( 'post_tag', 'post' );
}
add_action( 'init', 'ryanbenhase_unregister_tags' );*/



// -----------------------------------------Featured omage in pages show.----------------------------------------




if ( ! function_exists( 'twentyfourteen_setup' ) ) :
/**
 * Twenty Fourteen setup.
 *
 * Set up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support post thumbnails.
 *
 * @since Twenty Fourteen 1.0
 */
function twentyfourteen_setup() {

	/*
	 * Make Twenty Fourteen available for translation.
	 *
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/twentyfourteen
	 * If you're building a theme based on Twenty Fourteen, use a find and
	 * replace to change 'twentyfourteen' to the name of your theme in all
	 * template files.
	 */
	load_theme_textdomain( 'twentyfourteen' );

	// This theme styles the visual editor to resemble the theme style.
	//add_editor_style( array( 'css/editor-style.css', twentyfourteen_font_url(), 'genericons/genericons.css' ) );

	// Add RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// Enable support for Post Thumbnails, and declare two sizes.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 672, 372, true );
	add_image_size( 'twentyfourteen-full-width', 1038, 576, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		//'primary'   => __( 'Top primary menu', 'twentyfourteen' ),
		//'secondary' => __( 'Secondary menu in left sidebar', 'twentyfourteen' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery',
	) );

	// This theme allows users to set a custom background.
	add_theme_support( 'custom-background', apply_filters( 'twentyfourteen_custom_background_args', array(
		'default-color' => 'f5f5f5',
	) ) );

	// Add support for featured content.
	add_theme_support( 'featured-content', array(
		'featured_content_filter' => 'twentyfourteen_get_featured_posts',
		'max_posts' => 6,
	) );

	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );

	// Indicate widget sidebars can use selective refresh in the Customizer.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif; // twentyfourteen_setup
add_action( 'after_setup_theme', 'twentyfourteen_setup' );



// -----------------------------------------Thubnail image function.----------------------------------------



// -----------------------------------------For SE0.----------------------------------------

function defer_parsing_of_js ( $url ) {
if ( FALSE === strpos( $url, '.js' ) ) return $url;
if ( strpos( $url, 'jquery.js' ) ) return $url;
return "$url' defer ";
}
add_filter( 'clean_url', 'defer_parsing_of_js', 11, 1 );
// -----------------------------------------For SE0.----------------------------------------






?>