<?php
/**
 * Functions
 *
 * This file contains general functions
 *
 * @author    Project Name
 * @copyright 2017 Project Name
 * @version   1.0
 */

define( 'THEME_DIRECTORY', get_template_directory() );

/*
Body classes
- add more classes to the body to enable more specific targeting if needed
*/
function ambrosite_body_class($classes) {$post_name_prefix = 'postname-';$page_name_prefix = 'pagename-';$single_term_prefix = 'single-';$single_parent_prefix = 'parent-';$category_parent_prefix = 'parent-category-';$term_parent_prefix = 'parent-term-';$site_prefix = 'site-';global $wp_query;if ( is_single() ) {$wp_query->post = $wp_query->posts[0];setup_postdata($wp_query->post);$classes[] = $post_name_prefix . $wp_query->post->post_name;$taxonomies = array_filter( get_post_taxonomies($wp_query->post->ID), "is_taxonomy_hierarchical" );foreach ( $taxonomies as $taxonomy ) {$tax_name = ( $taxonomy != 'category') ? $taxonomy . '-' : '';$terms = get_the_terms($wp_query->post->ID, $taxonomy);if ( $terms ) {foreach( $terms as $term ) {if ( !empty($term->slug ) )$classes[] = $single_term_prefix . $tax_name . sanitize_html_class($term->slug, $term->term_id);while ( $term->parent ) {$term = &get_term( (int) $term->parent, $taxonomy );if ( !empty( $term->slug ) )$classes[] = $single_parent_prefix . $tax_name . sanitize_html_class($term->slug, $term->term_id);}}}}} elseif ( is_archive() ) {if ( is_category() ) {$cat = $wp_query->get_queried_object();while ( $cat->parent ) {$cat = &get_category( (int) $cat->parent);if ( !empty( $cat->slug ) )$classes[] = $category_parent_prefix . sanitize_html_class($cat->slug, $cat->cat_ID);}} elseif ( is_tax() ) {$term = $wp_query->get_queried_object();while ( $term->parent ) {$term = &get_term( (int) $term->parent, $term->taxonomy );if ( !empty( $term->slug ) )$classes[] = $term_parent_prefix . sanitize_html_class($term->slug, $term->term_id);}}} elseif ( is_page() ) {$wp_query->post = $wp_query->posts[0];setup_postdata($wp_query->post);$classes[] = $page_name_prefix . $wp_query->post->post_name;}if ( is_multisite() ) {global $blog_id;$classes[] = $site_prefix . $blog_id;}return $classes;} add_filter('body_class', 'ambrosite_body_class');

/*
Disable the theme editor
- stop clients from breaking their website
*/
define('DISALLOW_FILE_EDIT', true);

/*
Remove version info
- makes it that little bit harder for hackers
*/
function complete_version_removal() {
    return '';
}
add_filter('the_generator', 'complete_version_removal');

/*
Remove info from headers
- remove the stuff we don't need
*/
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

/*
Excerpt
- this theme supports excerpts
*/
add_post_type_support( 'page', 'excerpt' );

function new_excerpt_more($more) {
     global $post;
	 return '...';
}

function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
	array_pop($excerpt);
	$excerpt = implode(" ",$excerpt).'...';
  } else {
	$excerpt = implode(" ",$excerpt);
  } 
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;
}

/*
Thumbnails
- this theme supports thumbnails
*/
add_theme_support( 'post-thumbnails' );
add_image_size ( 'full', 3000, 3000, true );

/*
Scripts & Styles
- include the scripts and stylesheets
*/
add_action( 'wp_enqueue_scripts', 'script_enqueues' );

add_filter('gform_init_scripts_footer', function() {
	return true;
});

function script_enqueues() {
	
	if ( wp_script_is( 'jquery', 'registered' ) ) {
		wp_deregister_script( 'jquery' );
	}

	// Enqueue jQuery from Google CDN
	wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.2.1/jquery.min.js', array(), '2.2.1', false );

	

	// Enqueue compiled and minified style.css from /dist/css/
	wp_enqueue_style( 'swiper', get_template_directory_uri() . '/dist/css/swiper.min.css', false, '11.1.14', 'all' );
  	wp_enqueue_style('mobilemenu-css', get_stylesheet_directory_uri() . '/dist/css/jquery-simple-mobilemenu-slide.css', '', time());
	wp_enqueue_style( 'style', get_template_directory_uri() . '/dist/css/style.css', false, time(), 'all' );
	wp_enqueue_style( 'style-main', get_stylesheet_directory_uri() . '/style.css', '', time() );

  // Enqueue custom JavaScript file
	wp_enqueue_script( 'swiper', get_template_directory_uri() . '/dist/js/swiper.min.js', array('jquery'), '11.1.14', true );  
  	wp_enqueue_script('mobile-menu-js', get_stylesheet_directory_uri() . '/dist/js/jquery-simple-mobilemenu.min.js', array('jquery'), time(), true);
	wp_enqueue_script('lottie-js', 'https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.6/lottie.min.js', array(), null, true);
	wp_enqueue_script( 'clean', get_template_directory_uri() . '/dist/js/custom.js', array('jquery','mobile-menu-js'), time(), true );
	wp_enqueue_script( 'custom', get_template_directory_uri() . '/dist/js/main-min.js', array(), '1.0.0', true );
}

add_action( 'wp_enqueue_scripts', 'script_enqueues' );

/*
Admin Bar
- hide the admin bar
*/
add_filter('show_admin_bar', '__return_false');

/*
Menus
- enable WordPress Menus
*/
if (function_exists('register_nav_menus')){register_nav_menus(array('header' => __( 'Main Nav' ),'footer' => __( 'Footer Nav' )));}

/*
Menu Classes
- add first and last to menu items
*/
function wpdev_first_and_last_menu_class($items) {
	$items[1]->classes[] = 'first';
	$items[count($items)]->classes[] = 'last';
	return $items;
}
add_filter('wp_nav_menu_objects', 'wpdev_first_and_last_menu_class');

/*
Admin Menus
- hide unused menu items
*/
function remove_menus(){
  
  remove_menu_page( 'edit-comments.php' );
  
}
add_action( 'admin_menu', 'remove_menus' );

if( function_exists('acf_add_options_page') ) {

    // Add the main options page
    acf_add_options_page(array(
        'page_title'    => 'Theme General Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));

    // Add a sub page under the main options page (optional)
    acf_add_options_sub_page(array(
        'page_title'    => 'Navigation Settings',
        'menu_title'    => 'Navigation',
        'parent_slug'   => 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Footer Settings',
        'menu_title'    => 'Footer',
        'parent_slug'   => 'theme-general-settings',
    ));
}

function enqueue_scrollreveal() {
    wp_enqueue_script('scrollreveal', 'https://unpkg.com/scrollreveal', array(), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_scrollreveal');

// add class on main menu child ul
class Bison_Walker_Nav_Menu extends Walker_Nav_Menu {
	function start_lvl(&$output, $depth = 0, $args = NULL) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"ht-nav-desktop__sub-menu sub-menu-packages\">\n";
	}
}

// output wordpress menu in ul, li, a html tag
function bison_generate_menu_mobile($menu_items, $parent_id = 0) {
	$menu_html = '';

	// Loop through the menu items for the given parent ID
	foreach ($menu_items as $menu_item) {
		if ($menu_item->menu_item_parent == $parent_id) {
			$menu_html .= '<li>';
			$menu_url = $menu_item->url ? 'href="'. $menu_item->url . '"' : '';
			$menu_html .= '<a ' . $menu_url . '>' . $menu_item->title . '</a>';

			// Check if the menu item has any child items
			$child_items = bison_generate_menu_mobile($menu_items, $menu_item->ID);
			if ($child_items) {
				$menu_html .= '<ul class="submenu">' . $child_items . '</ul>';
			}

			$menu_html .= '</li>';
		}
	}

	return $menu_html;
}

/* Add custom post type for stores */
add_action('init', 'bison_construction_projects_post_type');
function bison_construction_projects_post_type() {
    $args = array(
        'labels' => array(
            'name' => 'Projects',
            'singular_name' => 'Project',
            'add_new' => 'Add New',
            'add_new_item' => 'Add New Project',
            'edit_item' => 'Edit Project',
            'new_item' => 'New Project',
            'all_items' => 'All Projects',
            'view_item' => 'View Project',
            'search_items' => 'Search Projects',
            'not_found' =>  'No Project found',
            'not_found_in_trash' => 'No Project found in Trash',
            'menu_name' => 'Projects'
        ),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_rest' => true, // To use Gutenberg editor.
        'capability_type' => 'post',
        'has_archive' => false,
        'hierarchical' => false,
        'menu_position' => null,
        'menu_icon'     => 'dashicons-store',
        'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' )
    );
    register_post_type('bs-projects', $args);
}

/**
 * Packages - Custom taxonomy added to product
 *
 * @return void
 */
function custom_taxonomy_packages() {
	$labels = array(
		'name'                       => 'project category',
		'singular_name'              => 'Project Category',
		'menu_name'                  => 'Project Category',
		'all_items'                  => 'All project categorys',
		'parent_item'                => 'Parent Project Category',
		'parent_item_colon'          => 'Parent Project Category:',
		'new_item_name'              => 'New Project Category Name',
		'add_new_item'               => 'Add New Project Category',
		'edit_item'                  => 'Edit Project Category',
		'update_item'                => 'Update Project Category',
		'separate_items_with_commas' => 'Separate Project Category with commas',
		'search_items'               => 'Search Project Categorys',
		'add_or_remove_items'        => 'Add or remove Project Categorys',
		'choose_from_most_used'      => 'Choose from the most used Project Categorys',
	);
	$args   = array(
		'labels'            => $labels,
		'hierarchical'      => true,
		'public'            => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud'     => true,
		'show_in_rest'      => true,
		'rewrite'           => array(
			'hierarchical' => true,
			'slug'         => 'package',
		),
	);
	register_taxonomy( 'pfs-category', 'bs-projects', $args );
	register_taxonomy_for_object_type( 'pfs-category', 'bs-projects' );
}
add_action( 'init', 'custom_taxonomy_packages' );

function bison_contact_popup() {
	?>
	<!-- Popup Modal Structure -->
	<div id="successModal" class="modal">
		<div class="modal-content">
			<span class="close">&times;</span>
			<div class="main-content">
				<span><svg id="icon_tick" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="34" height="34" viewBox="0 0 34 34">
					<defs>
						<clipPath id="clip-path">
						<rect id="Rectangle_2164" data-name="Rectangle 2164" width="34" height="34" fill="#4da738"/>
						</clipPath>
					</defs>
					<g id="Group_2551" data-name="Group 2551" clip-path="url(#clip-path)">
						<path id="Path_8537" data-name="Path 8537" d="M16.658,0A16.658,16.658,0,1,0,33.316,16.659,16.658,16.658,0,0,0,16.658,0M12.872,25.7,5.3,18.123,8.227,15.2l4.645,4.645L25.089,7.623l2.927,2.927Z" transform="translate(0.342 0.341)" fill="#4da738"/>
					</g>
					</svg>
				</span>
				<h3>Thank you for your enquiry.</h3>
				<p class="modal-desc">We’ll get back to you soon</p>
			</div>
		</div>
	</div>
	<style>
		/* Modal styling */
		.modal {
			display: none;
			position: fixed;
			z-index: 1000;
			left: 0;
			top: 0;
			width: 100%;
			height: 100%;
			background-color: rgba(0, 0, 0, 0.5);
		}

		.modal-content {
			position: relative;
			background-color: #fff;
			margin: 10% auto;
			padding: 20px;
			border-radius: 5px;
			width: 80%;
			max-width: 500px;
		}
		
		.modal-content .main-content{
			display: flex;
			align-items: center;
			flex-direction: column;
		}

		.close {
			position: absolute;
			top: 10px;
			right: 15px;
			font-size: 24px;
			cursor: pointer;
		}
		#gform_confirmation_message_2 {
		display:none;
		}
	</style>
	<?php
}
add_action( 'wp_footer', 'bison_contact_popup' );