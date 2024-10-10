<?php
$section_title  = get_field( 'section_title' );
$section_description  = get_field( 'section_description' );
$button_label  = get_field( 'button_label' );
$button_link  = get_field( 'button_link' );
$project_items  = get_field( 'project_items' );

?>

<!-- project Section -->
<section class="project-section products section-bg">
	<div class="project-section__header container">
		<div class="section-title">
			<span class="project-section__title"><?php echo esc_html( $section_title ); ?></span>
			<h2 class="project-section__subscription"><?php echo wp_kses_post( $section_description ); ?></h2>
		</div>
	</div>
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
			<?php if ( $project_items ) : ?>
				<?php foreach ( $project_items as $projects ) : ?>					
					<div class="swiper-slide">
						<div class="slider-card">
							<img src="<?php echo esc_url( $projects['image'] ); ?>" alt="">
							<div class="slide-content content-top">							
								<span class="location"><?php echo esc_html( $projects['location'] ); ?></span>
								<p><?php echo wp_kses_post( $projects['title'] ); ?></p>
							</div>
							
							<div class="slide-content-tw content-bottom">							
								<a class="project-il-button button secondary" href="<?php echo esc_url( $projects['btn_link'] ); ?>"><?php echo esc_html( $projects['btn_label'] ); ?></a>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
        <!-- Add Pagination and Navigation -->
		<div class="swiper-pagination"></div>
        <div id="swiper-but-next" class="swiper-button-next">
			<svg width="9.268555" height="5.070312" viewBox="0 0 9.26855 5.07031" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
				<mask id="mask1_1711" mask-type="alpha" maskUnits="userSpaceOnUse" x="0.000000" y="0.000000" width="9.268555" height="5.070312">
					<g style="mix-blend-mode:normal">
						<rect id="Rectangle 2085" width="9.268967" height="5.071086" fill="#ffffff" fill-opacity="1.000000"/>
					</g>
				</mask>
				<g mask="url(#mask1_1711)">
					<g style="mix-blend-mode:normal">
						<path id="Path 8108" d="M4.63 5.07C4.21 5.07 3.79 4.91 3.46 4.58L0 1.11L1.11 0L4.58 3.47L8.14 0L9.26 1.11L5.79 4.58C5.47 4.91 5.05 5.07 4.63 5.07Z" fill="#ffffff" fill-opacity="1.000000" fill-rule="nonzero"/>
					</g>
				</g>
			</svg>	
		</div>
        <div id="swiper-but-prev" class="swiper-button-prev fade-in-image">
			<svg width="9.268555" height="5.070312" viewBox="0 0 9.26855 5.07031" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
				<mask id="mask1_1711" mask-type="alpha" maskUnits="userSpaceOnUse" x="0.000000" y="0.000000" width="9.268555" height="5.070312">
					<g style="mix-blend-mode:normal">
						<rect id="Rectangle 2085" width="9.268967" height="5.071086" fill="#ffffff" fill-opacity="1.000000"/>
					</g>
				</mask>
				<g mask="url(#mask1_1711)">
					<g style="mix-blend-mode:normal">
						<path id="Path 8108" d="M4.63 5.07C4.21 5.07 3.79 4.91 3.46 4.58L0 1.11L1.11 0L4.58 3.47L8.14 0L9.26 1.11L5.79 4.58C5.47 4.91 5.05 5.07 4.63 5.07Z" fill="#ffffff" fill-opacity="1.000000" fill-rule="nonzero"/>
					</g>
				</g>
			</svg>	
		</div>
		
    </div>
	<!-- View All Projects Button -->
	<div class="view-all-btn-wrapper button-wrapper">
		<a class="project-button button primary" href="<?php echo esc_url( $button_link ); ?>"><?php echo esc_html( $button_label ); ?></a>
	</div>
</section>
