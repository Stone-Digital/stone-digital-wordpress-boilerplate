<?php
function register_custom_block_categories( $categories ) {
	return array_merge(
		$categories,
		array(
			array(
				'slug'  => 'bison-blocks',
				'title' => 'Bison: Custom Blocks',
			),
		)
	);
}
add_action( 'block_categories_all', 'register_custom_block_categories', 10, 2 );

add_theme_support( 'editor-styles' );

add_action( 'admin_init', 'add_custom_editor_styles' );
function add_custom_editor_styles() {
	add_editor_style( get_stylesheet_directory_uri() . '/css/generic.css' );
	add_editor_style( get_stylesheet_directory_uri() . '/css/custom.css' );
	add_editor_style( get_stylesheet_directory_uri() . '/css/admin-dashboard.css' );
}

// Register ACF Blocks
add_action( 'acf/init', 'custom_acf_init' );
function custom_acf_init() {
	// check function exists.
	if ( function_exists( 'acf_register_block_type' ) ) {

			acf_register_block_type(
				array(
					'name'            => 'bs-home-banner',
					'title'           => 'BC Home Banner',
					'description'     => 'Block: Home Banner',
					'render_template' => 'blocks/bs-banner.php',
					'category'        => 'bison-blocks',
					'icon'            => 'bison',
					'enqueue_assets'  => function () {
						wp_enqueue_style( 'banner', get_stylesheet_directory_uri() . '/assets/css/banner.css', array(), time() );
					},
				)
			);
			acf_register_block_type(
				array(
					'name'            => 'bs-home-services',
					'title'           => 'BC Home Services',
					'description'     => 'Block: Home Services',
					'render_template' => 'blocks/bs-services.php',
					'category'        => 'bison-blocks',
					'icon'            => 'bison',
					// 'enqueue_assets'  => function () {
					// 	wp_enqueue_style( 'services', get_stylesheet_directory_uri() . '/assets/css/services.css', array(), time() );
					// },
				)
			);
			acf_register_block_type(
				array(
					'name'            => 'bs-home-challenge',
					'title'           => 'BC Home Challenge',
					'description'     => 'Block: Home Big Challenge',
					'render_template' => 'blocks/bs-challenge.php',
					'category'        => 'bison-blocks',
					'icon'            => 'bison',
					// 'enqueue_assets'  => function () {
					// 	wp_enqueue_style( 'challenge', get_stylesheet_directory_uri() . '/assets/css/challenge.css', array(), time() );
					// },
				)
			);
			acf_register_block_type(
				array(
					'name'            => 'bs-home-our-client',
					'title'           => 'BC Home Our Client',
					'description'     => 'Block: Home Our Client',
					'render_template' => 'blocks/bs-our-client.php',
					'category'        => 'bison-blocks',
					'icon'            => 'bison',
					// 'enqueue_assets'  => function () {
					// 	wp_enqueue_style( 'our-client', get_stylesheet_directory_uri() . '/assets/css/client.css', array(), time() );
					// },
				)
			);
			acf_register_block_type(
				array(
					'name'            => 'bs-home-our-project',
					'title'           => 'BC Home Our Project',
					'description'     => 'Block: Home Our Project',
					'render_template' => 'blocks/bs-our-project.php',
					'category'        => 'bison-blocks',
					'icon'            => 'bison',
					// 'enqueue_assets'  => function () {
					// 	wp_enqueue_style( 'our-project', get_stylesheet_directory_uri() . '/assets/css/project.css', array(), time() );
					// },
				)
			);
			
			acf_register_block_type(
				array(
					'name'            => 'bs-home-map',
					'title'           => 'BC Home Map',
					'description'     => 'Block: Home Map',
					'render_template' => 'blocks/bs-map.php',
					'category'        => 'bison-blocks',
					'icon'            => 'bison',
					// 'enqueue_assets'  => function () {
					// 	wp_enqueue_style( 'map', get_stylesheet_directory_uri() . '/assets/css/map.css', array(), time() );
					// },
				)
			);
			
			acf_register_block_type(
				array(
					'name'            => 'bs-home-contact',
					'title'           => 'BC Home Contact',
					'description'     => 'Block: Home Contact',
					'render_template' => 'blocks/bs-contact.php',
					'category'        => 'bison-blocks',
					'icon'            => 'bison',
					'enqueue_assets'  => function () {
						wp_enqueue_style( 'contact', get_stylesheet_directory_uri() . '/assets/css/contact.css', array(), time() );
					},
				)
			);
			
			acf_register_block_type(
				array(
					'name'            => 'bs-home-support',
					'title'           => 'BC Home Support',
					'description'     => 'Block: Home Support',
					'render_template' => 'blocks/bs-support.php',
					'category'        => 'bison-blocks',
					'icon'            => 'bison',
					// 'enqueue_assets'  => function () {
					// 	wp_enqueue_style( 'support', get_stylesheet_directory_uri() . '/assets/css/support.css', array(), time() );
					// },
				)
			);
			
			acf_register_block_type(
				array(
					'name'            => 'bs-home-blog',
					'title'           => 'BC Home Blog',
					'description'     => 'Block: Home Blog',
					'render_template' => 'blocks/bs-blog.php',
					'category'        => 'bison-blocks',
					'icon'            => 'bison',
					// 'enqueue_assets'  => function () {
					// 	wp_enqueue_style( 'blog', get_stylesheet_directory_uri() . '/assets/css/blog.css', array(), time() );
					// },
				)
			);
	}
}
