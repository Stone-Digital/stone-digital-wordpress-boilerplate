<?php
$section_title  = get_field( 'section_title' );
$section_description  = get_field( 'section_description' );
$process_lists  = get_field( 'process_lists' );

?>
<section class="spm-section section-black">
	<div class="container">
		<div class="spm-section__header section-title">
			<h2 class="spm-section__title"><?php echo esc_html( $section_title ); ?></h2>
			<p class="spm-section__desc"><?php echo wp_kses_post( $section_description ); ?></p>
		</div>
		<div class="spm-section__list spm-card-grid col-4 text-black">
			<?php if ( $process_lists ) : $index = 1; ?>
				<?php foreach ( $process_lists as $pl ) : ?>
					<div class="spm col">
                        <div class="spm-overlay-text">
                            0<?php echo $index; ?>
                        </div>
						<?php echo wp_get_attachment_image( $pl['image'], 'full', '', array( 'class' => 'spm__image', 'alt' => 'spm-image', 'loading' => 'lazy' ) ); ?>
                        <div class="text">
                            <h3 class="spm__title"><?php echo $pl['title']; ?></h3>
                            <p class="spm__desc"><?php echo wp_kses_post( $pl['description'] ); ?></p>
					    </div>
					</div>
				<?php $index++; endforeach; ?>
			<?php endif; ?>			
		</div>
	</div>
</section>
