<?php
/**
 * Home Banner Block
 */

// $main_background_video  = get_field( 'main_background_video' );
// $main_logo_id  = get_field( 'main_logo' );
// $header_title  = get_field( 'header_title' );
// $header_description  = get_field( 'header_description' );
// $circle_logo_id  = get_field( 'circle_logo' );

/*?>
<section class="video-background-section banner">
	<div class="banner-bg">
		<video width="100%" autoplay loop muted plays-inline class="video-background">
			<source src="<?php echo esc_url( $main_background_video ); ?>" type="video/mp4">
		</video>
	</div>
	<div class="banner-content">
		<div class="image">
			<?php echo wp_get_attachment_image( $main_logo_id, 'full', '', array( 'class' => '', 'alt' => 'circle-logo', 'loading' => 'lazy' ) ); ?>
		</div>
		<div class="banner-content-bottom">
			<div class="br-content-bottom text">
				<h1 class="hb-section-title"><?php echo esc_html( $header_title ); ?></h1>
				<p class="hb-section-description"><?php echo wp_kses_post( $header_description ); ?></p>
			</div>
			<?php if ( $circle_logo_id ) : ?>
				<div class="logo-bottom-right circle">
					<?php echo wp_get_attachment_image( $circle_logo_id, 'full', '', array( 'class' => '', 'alt' => 'circle-logo', 'loading' => 'lazy' ) ); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
*/ 

$main_background_video  = get_field( 'main_background_video' );

$header_title  = get_field( 'header_title' );
$header_description  = get_field( 'header_description' );
$circle_logo_id  = get_field( 'circle_logo' );
$main_logo = get_field('main_logo');
?>
<section class="video-background-section">
	<video width="100%" autoplay loop muted plays-inline class="video-background">
		<source src="<?php echo esc_url( $main_background_video ); ?>" type="video/mp4">
	</video>
	<div class="overlay">
		<div class="logo-top">
			<img src="<?= $main_logo['url']; ?>" alt="Bison Construction" class="logo--banner"/>
		</div>
		<div class="br-content-bottom">
			<h1 class="hb-section-title"><?php echo esc_html( $header_title ); ?></h1>
			<div class="hb-section-description"><?php echo wp_kses_post( $header_description ); ?></div>
		</div>
		<?php if ( $circle_logo_id ) : ?>
			<div class="logo-bottom-right">
				<?php echo wp_get_attachment_image( $circle_logo_id, 'full', '', array( 'class' => '', 'alt' => 'circle-logo', 'loading' => 'lazy' ) ); ?>
			</div>
		<?php endif; ?>
	</div>
</section>
