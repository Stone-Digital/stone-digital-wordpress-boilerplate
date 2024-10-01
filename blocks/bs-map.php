<?php
/**
 * Home Contact Block
 */

$section_title  = get_field( 'section_title' );
$section_subtitle  = get_field( 'section_subtitle' );
$section_image  = get_field( 'section_image' );
$button_label  = get_field( 'button_label' );
$button_link  = get_field( 'button_link' );
$main_image  = get_field( 'main_image' );

?>
<section class="split-section map">
	<div class="map-wrapper">
		<div class="map-title">
			<span class="hm-section-subtitle"><?php echo esc_html( $section_subtitle ); ?></span>			
			<h2 class="hm-section-title"><?php echo wp_kses_post( $section_title ); ?></h2>
			<a class="button primary" href="<?php echo esc_url( $button_link ); ?>"><?php echo esc_html( $button_label ); ?></a>
			<?php echo wp_get_attachment_image( $section_image, 'full', '', array( 'class' => 'small-image', 'alt' => 'map-image', 'loading' => 'lazy' ) ); ?>
		</div>
		<div class="right-side galley">
			<?php echo wp_get_attachment_image( $main_image, 'full', '', array( 'class' => 'full-image', 'alt' => 'map-two-image', 'loading' => 'lazy' ) ); ?>
		</div>
	</div>
</section>

