<?php
$section_title  = get_field( 'section_title' );
$background_image  = get_field( 'background_image' );
?>
<section class="challenge-section">
	<div class="page-header__container bg-image" style="background-image: url('<?php echo esc_url( $background_image ); ?>')">
		<div class="page-header__inner container">
			<h2><?php echo wp_kses_post( $section_title ); ?></h2>
		</div>
	</div>
</section>
