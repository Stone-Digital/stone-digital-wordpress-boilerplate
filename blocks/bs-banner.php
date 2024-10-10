<?php
/**
 * Home Banner Block
 */

$main_background_video  = get_field( 'main_background_video' );

$header_title  = get_field( 'header_title' );
$header_description  = get_field( 'header_description' );
$main_logo = get_field('main_logo');

?>
<section class="video-background-section">
	<video width="100%" autoplay loop muted plays-inline class="video-background">
		<source src="<?php echo esc_url( $main_background_video ); ?>" type="video/mp4">
	</video>
	<div class="overlay">
		<div class="logo-top">
			<img src="<?php echo ( $main_logo['url'] ); ?>" alt="Bison Construction" class="logo--banner"/>
		</div>
		<div class="br-content-bottom">
			<h1 class="hb-section-title fade-in-text"><?php echo esc_html( $header_title ); ?></h1>
			<div class="hb-section-description fade-in-text"><?php echo wp_kses_post( $header_description ); ?></div>
		</div>
		<script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script> 
		<div class="logo-bottom-right fade-in-image">	
    		<dotlottie-player id="bison-crest" src="<?php echo get_template_directory_uri() . '/assets/images/bison_crest.json'; ?>" background="transparent" speed="1" style="width: 200px; height: 200px;" loop></dotlottie-player>
		</div>
	</div>
</section>
<script>
  window.addEventListener('load', function() {

  	 setTimeout(function() {
      const lottieAnimation = document.getElementById('bison-crest');
      // Trigger the Lottie animation playback
      lottieAnimation.play();
    }, 3000); // 2 seconds delay

    // Delay of 2 seconds
    setTimeout(function() {
      const lottieAnimation = document.getElementById('bison-crest');
      // Trigger the Lottie animation playback
      lottieAnimation.pause();
    }, 7000); // 2 seconds delay
  });
</script>