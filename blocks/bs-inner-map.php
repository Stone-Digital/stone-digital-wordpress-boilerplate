<?php
/**
 * Inner Page Map Block
 */

$main_image  = get_field( 'main_image' );

?>
<section class="map-inner-section map">	
	<?php echo wp_get_attachment_image( $main_image, 'full', '', array( 'class' => '', 'alt' => 'map-image', 'loading' => 'lazy' ) ); ?>
</section>

