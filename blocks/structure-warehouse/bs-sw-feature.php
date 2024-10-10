<?php
$section_title  = get_field( 'section_title' );
$feature_items  = get_field( 'structure_warehouse_features' );
$button_label  = get_field( 'button_label' );
$button_link  = get_field( 'button_link' );

?>
<section class="swf-section section-white">
	<div class="container">
		<div class="swf-section__header section-title">
			<h2 class="swf-section__title"><?php echo esc_html( $section_title ); ?></h2>
		</div>
		<div class="swf-section__list swf-card-grid col-4 text-center">
			<?php if ( $feature_items ) : ?>
				<?php foreach ( $feature_items as $swf ) : ?>
					<div class="swf col">
						<?php echo wp_get_attachment_image( $swf['image'], 'full', '', array( 'class' => 'swf__icon circle', 'alt' => 'circle-logo', 'loading' => 'lazy' ) ); ?>
						<p class="swf__description"><?php echo wp_kses_post( $swf['description'] ); ?></p>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>			
		</div>
		<div class="button-wrapper">
			<a class="button primary" href="<?php echo esc_url( $button_link ); ?>"><?php echo esc_html( $button_label ); ?></a>
		</div>
	</div>
</section>
