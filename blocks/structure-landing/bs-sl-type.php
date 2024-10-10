<?php
$section_title  = get_field( 'section_title' );
$sl_lists  = get_field( 'structure_landing_type' );

?>
<section class="slt-section section-bg">
	<div class="container">
		<div class="slt-section__header section-title">
			<h2 class="slt-section__title"><?php echo wp_kses_post( $section_title ); ?></h2>
		</div>
		<div class="slt-section__list slt-card-grid col-4">
			<?php if ( $sl_lists ) : ?>
				<?php foreach ( $sl_lists as $sl ) : ?>
					<div class="slt col">
						<?php echo wp_get_attachment_image( $sl['image'], 'full', '', array( 'class' => 'slt__image', 'alt' => 'slt-image', 'loading' => 'lazy' ) ); ?>
                        <div class="text">
                            <div class="icon"><?php echo wp_get_attachment_image( $sl['icon'], 'full', '', array( 'class' => 'slt__icon', 'alt' => 'slt-logo', 'loading' => 'lazy' ) ); ?></div>
                            <h3 class="slt__title"><?php echo $sl['title']; ?></h3>
                            <a class="primary-color" href="<?php echo esc_url( $sl['button_link'] ); ?>"><?php echo esc_html( $sl['button_label'] ); ?></a>
					    </div>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>			
		</div>
	</div>
</section>
