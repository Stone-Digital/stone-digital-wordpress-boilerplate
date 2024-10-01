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
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
		
    </div>
	<!-- View All Projects Button -->
	<div class="view-all-btn-wrapper button-wrapper">
		<a class="project-button button primary" href="<?php echo esc_url( $button_link ); ?>"><?php echo esc_html( $button_label ); ?></a>
	</div>
</section>
