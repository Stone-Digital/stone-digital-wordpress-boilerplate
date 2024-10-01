<?php
$section_title  = get_field( 'section_title' );
$section_description  = get_field( 'section_description' );
$services_list  = get_field( 'services_list' );

?>
<section class="services-section section-white">
	<div class="container">
		<div class="services-section__header section-title">
			<h2 class="services-section__title"><?php echo wp_kses_post( $section_title ); ?></h2>
			<p class="services-section__description"><?php echo wp_kses_post( $section_description ); ?></p>
		</div>
		<div class="services-section__list grid">
			<?php if ( $services_list ) : ?>
				<?php foreach ( $services_list as $services ) : ?>
					<div class="service column">
						<div class="icon"><?php echo wp_get_attachment_image( $services['icon'], 'full', '', array( 'class' => 'service__icon', 'alt' => 'circle-logo', 'loading' => 'lazy' ) ); ?></div>
						<h3 class="service__title"><?php echo $services['title']; ?></h3>
						<p class="service__description"><?php echo $services['description']; ?></p>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>			
		</div>
	</div>
</section>
