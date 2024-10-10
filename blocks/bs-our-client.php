<?php
$section_title  = get_field( 'section_title' );
$section_description  = get_field( 'section_description' );
$clients_list  = get_field( 'clients_list' );

?>
<section class="logo-section client">
	<div class="page-client__container bg-primary">
		<!-- <div class="container-client"> -->
			<span><?php echo esc_html( $section_title ); ?></span>
			<h2 class="logo-section__subscription"><?php echo wp_kses_post( $section_description ); ?></h2>
			
			<div class="logo-section__logos lg-slider">
				<div class="slide-track">
					<?php if ( $clients_list ) : ?>
						<?php foreach ( $clients_list as $client ) : ?>		
							<div class="slide">		
								<img src="<?php echo $client['logo']; ?>" alt="" class="logo-section__logo"/>
							</div>				
						<?php endforeach; ?>
					<?php endif; ?>
				</div>
			</div>
			
		<!-- </div> -->
	</div>
</section>