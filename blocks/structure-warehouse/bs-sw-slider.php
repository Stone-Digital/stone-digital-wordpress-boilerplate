<?php
$section_title  = get_field( 'section_title' );
$section_description  = get_field( 'section_description' );
$slider_items  = get_field( 'slider_items' );

?>

<!-- project Section -->
<section class="sws-section section-bg">
	<div class="sws-section__header container">
		<div class="section-title">
			<h2 class="sws-section__title"><?php echo esc_html( $section_title ); ?></h2>
			<p class="sws-section__subscription"><?php echo esc_html( $section_description ); ?></p>
		</div>
	</div>
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
			<?php if ( $slider_items ) : ?>
				<?php foreach ( $slider_items as $projects ) : ?>					
					<div class="swiper-slide">
						<div class="slider-card">
							<img src="<?php echo esc_url( $projects['image'] ); ?>" alt="">
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
</section>
