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
					'name'            => 'bs-home-landing-page',
					'title'           => 'BC Home Landing Page',
					'description'     => 'Block: Home Landing Page',
					'render_template' => 'blocks/bs-home-landing-page.php',
					'category'        => 'bison-blocks',
					'icon'            => 'bison',
				)
			);
			
			acf_register_block_type(
				array(
					'name'            => 'bs-home-banner',
					'title'           => 'BC Home Banner',
					'description'     => 'Block: Home Banner',
					'render_template' => 'blocks/bs-banner.php',
					'category'        => 'bison-blocks',
					'icon'            => 'bison',
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
				)
			);
			acf_register_block_type(
				array(
					'name'            => 'bs-inner-banner',
					'title'           => 'BC Inner Page Banner',
					'description'     => 'Block: Inner Page Banner',
					'render_template' => 'blocks/bs-inner-banner.php',
					'category'        => 'bison-blocks',
					'icon'            => 'bison',
				)
			);
			
			acf_register_block_type(
				array(
					'name'            => 'bs-heading',
					'title'           => 'BC Heading',
					'description'     => 'Block: Heading',
					'render_template' => 'blocks/bs-heading.php',
					'category'        => 'bison-blocks',
					'icon'            => 'bison',
				)
			);
			
			acf_register_block_type(
				array(
					'name'            => 'bs-structure-landing-type',
					'title'           => 'BC Structure Landing Type',
					'description'     => 'Block: Structure Landing Type',
					'render_template' => 'blocks/structure-landing/bs-sl-type.php',
					'category'        => 'bison-blocks',
					'icon'            => 'bison',
				)
			);
			
			acf_register_block_type(
				array(
					'name'            => 'bs-structure-warehouse-slider',
					'title'           => 'BC Structure Warehouse Slider',
					'description'     => 'Block: Structure Warehouse Slider',
					'render_template' => 'blocks/structure-warehouse/bs-sw-slider.php',
					'category'        => 'bison-blocks',
					'icon'            => 'bison',
				)
			);
			
			acf_register_block_type(
				array(
					'name'            => 'bs-structure-warehouse-feature',
					'title'           => 'BC Structure Warehouse Feature',
					'description'     => 'Block: Structure Warehouse Feature',
					'render_template' => 'blocks/structure-warehouse/bs-sw-feature.php',
					'category'        => 'bison-blocks',
					'icon'            => 'bison',
				)
			);
			
			acf_register_block_type(
				array(
					'name'            => 'bs-structure-warehouse-case-study',
					'title'           => 'BC Structure Warehouse Case Study',
					'description'     => 'Block: Structure Warehouse Case Study',
					'render_template' => 'blocks/structure-warehouse/bs-sw-case-study.php',
					'category'        => 'bison-blocks',
					'icon'            => 'bison',
				)
			);
			
			acf_register_block_type(
				array(
					'name'            => 'bs-structure-warehouse-helpful-tips',
					'title'           => 'BC Structure Warehouse Helpful Tips',
					'description'     => 'Block: Structure Warehouse Helpful Tips',
					'render_template' => 'blocks/structure-warehouse/bs-sw-helpful-tips.php',
					'category'        => 'bison-blocks',
					'icon'            => 'bison',
				)
			);
			
			acf_register_block_type(
				array(
					'name'            => 'bs-process-main',
					'title'           => 'BC Process Main',
					'description'     => 'Block: Process Main',
					'render_template' => 'blocks/process/bs-process-main.php',
					'category'        => 'bison-blocks',
					'icon'            => 'bison',
				)
			);
			
			acf_register_block_type(
				array(
					'name'            => 'bs-project-filter',
					'title'           => 'BC Projects Filter',
					'description'     => 'Block: Projects Filter',
					'render_template' => 'blocks/bs-project-filter.php',
					'category'        => 'bison-blocks',
					'icon'            => 'bison',
				)
			);
			
			acf_register_block_type(
				array(
					'name'            => 'bs-inner-map',
					'title'           => 'BC Inner Page Map',
					'description'     => 'Block: Inner Page Map',
					'render_template' => 'blocks/bs-inner-map.php',
					'category'        => 'bison-blocks',
					'icon'            => 'bison',
				)
			);
			
			acf_register_block_type(
				array(
					'name'            => 'bs-about-full-images',
					'title'           => 'BC About Fullwidth Images',
					'description'     => 'Block: About Fullwidth Images',
					'render_template' => 'blocks/about/bs-about-full-images.php',
					'category'        => 'bison-blocks',
					'icon'            => 'bison',
				)
			);
			acf_register_block_type(
				array(
					'name'            => 'bs-about-counter',
					'title'           => 'BC About Counter',
					'description'     => 'Block: About Counter',
					'render_template' => 'blocks/about/bs-about-counter.php',
					'category'        => 'bison-blocks',
					'icon'            => 'bison',
				)
			);
			acf_register_block_type(
				array(
					'name'            => 'bs-about-slider',
					'title'           => 'BC About Slider',
					'description'     => 'Block: About Slider',
					'render_template' => 'blocks/about/bs-about-slider.php',
					'category'        => 'bison-blocks',
					'icon'            => 'bison',
				)
			);
			
			acf_register_block_type(
				array(
					'name'            => 'bs-about-list',
					'title'           => 'BC About List',
					'description'     => 'Block: About List',
					'render_template' => 'blocks/about/bs-about-list.php',
					'category'        => 'bison-blocks',
					'icon'            => 'bison',
				)
			);
			
			acf_register_block_type(
				array(
					'name'            => 'bs-team',
					'title'           => 'BC Team',
					'description'     => 'Block: Team',
					'render_template' => 'blocks/bs-team.php',
					'category'        => 'bison-blocks',
					'icon'            => 'bison',
				)
			);
			
			acf_register_block_type(
				array(
					'name'            => 'bs-team-feature',
					'title'           => 'BC Team Feature',
					'description'     => 'Block: Team Feature',
					'render_template' => 'blocks/bs-team-feature.php',
					'category'        => 'bison-blocks',
					'icon'            => 'bison',
				)
			);
			
			acf_register_block_type(
				array(
					'name'            => 'bs-team-list',
					'title'           => 'BC Career',
					'description'     => 'Block: Career',
					'render_template' => 'blocks/bs-team-list.php',
					'category'        => 'bison-blocks',
					'icon'            => 'bison',
				)
			);
	}
}
