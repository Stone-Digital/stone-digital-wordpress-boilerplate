<?php
/**
 * Home CTA Block
 */

$section_image  = get_field( 'section_image' );
$section_title  = get_field( 'section_title' );
$section_description  = get_field( 'section_description' );
$phone_number  = get_field( 'phone_number' );
$timing_details  = get_field( 'timing_details' );

?>
<section class="info-section contact bg-primary">
	<div class="container">
		<div class="flex">
			<!-- Left Side: Circular Image -->
			<div class="image-container image">
				<?php echo wp_get_attachment_image( $section_image, 'full', '', array( 'class' => 'circular-image', 'alt' => 'circle-image', 'loading' => 'lazy' ) ); ?>
			</div>

			<!-- Right Side: Text and Details -->
			<div class="details-container content">
				<h2 class="hs-section-title"><?php echo esc_html( $section_title ); ?></h2>
				<p class="hs-section-description"><?php echo wp_kses_post( $section_description ); ?></p>
				<div class="contact-wrapper">
					<span><svg width="28" height="28" viewBox="0 0 28 28" fill="none"
							xmlns="http://www.w3.org/2000/svg">
							<path
								d="M13.5581 0C6.07015 0 0 6.07015 0 13.5581C0 21.0461 6.07015 27.1162 13.5581 27.1162C21.0461 27.1162 27.1162 21.0461 27.1162 13.5581C27.1162 6.07015 21.0461 0 13.5581 0ZM21.0564 18.5573C21.0564 19.2699 18.9146 21.0564 17.4854 21.0564C16.0582 21.0564 13.2018 20.3418 9.98804 17.1281C6.77442 13.9144 6.05981 11.058 6.05981 9.63073C6.05981 8.20162 7.84432 6.05981 8.55893 6.05981H9.98804L11.4153 10.3434C11.4153 10.7007 9.63073 11.4152 9.63073 12.1298C9.63073 12.8445 11.058 14.629 11.7725 15.3436C12.4872 16.0562 14.2717 17.4854 14.9863 17.4854C15.7009 17.4854 16.4155 15.7009 16.7708 15.7009L21.0564 17.1281V18.5573Z"
								fill="#F8F6F4" />
						</svg>
					</span>
					<span><?php echo esc_html( $phone_number ); ?></span>
				</div>
				<p class="timings open"><?php echo esc_html( $timing_details ); ?></p>
			</div>
		</div>
	</div>
</section>

