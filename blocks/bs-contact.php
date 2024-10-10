<?php
/**
 * Home Contact Block
 */

$contact_shortcode  = get_field( 'contact_shortcode' );

?>
<section class="contact-section">
	<div class="contact-inner">		
		<div class="contact-header">
			<h2 class="hc-section-title">CONTACT US</h2>
		</div>
        <?php echo do_shortcode( $contact_shortcode ); ?>
	</div>
</section>
