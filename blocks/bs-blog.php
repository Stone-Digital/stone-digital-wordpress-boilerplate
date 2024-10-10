<?php
$section_title  = get_field( 'section_title' );
$section_description  = get_field( 'section_description' );
$blogs_items  = get_field( 'blogs_list' );

?>
<section class="blog-section section-bg">
	<div class="container">
		<div class="blog-header section-title">
			<span class="section-description"><?php echo wp_kses_post( $section_title ); ?></span>		
			<h2 class="section-title"><?php echo esc_html( $section_description ); ?></h2>
		</div>
		<div class="blog-list card-grid">
			<?php if ( $blogs_items ) : ?>
				<?php foreach ( $blogs_items as $blogs ) : ?>
					<div class="blog-item col">
						<div class="blog-image-container">	
							<?php echo wp_get_attachment_image( $blogs['image'], 'full', '', array( 'class' => 'blog-image', 'alt' => 'blog-image', 'loading' => 'lazy' ) ); ?>
							<!-- <div class="overlay-blog"></div> -->
						</div>	
						
						<div class="blog-item-list text">
							<span class="blog-title"><?php echo esc_html( $blogs['title'] ); ?></span>
							<h3 class="blog-description"><?php echo wp_kses_post( $blogs['description'] ); ?></h3>
							<a href="<?php echo esc_url( $blogs['button_link'] ); ?>" class="primary-color"><?php echo esc_html( $blogs['button_label'] ); ?></a>
						</div>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
</section>
