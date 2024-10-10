<?php
/**
 * About Slider Block
 */

$header_title  = get_field( 'header_title' );
$sliders  = get_field( 'slider_repeater' );

?>
<div class="section-white">
    <div class="container">
        <div class="section-title">
            <h2 class="ais-section-title"><?php echo esc_html( $header_title ); ?></h2>
        </div>

        <div class="swiper myAboutSwiper slider-2">
            <div class="swiper-wrapper">
                <?php foreach( $sliders as $slider ) : ?>
                    <div class="swiper-slide">
                        <div class="slider-card-2">
                            <?php echo wp_get_attachment_image( $slider['image'], 'full', '', array( 'class' => '', 'alt' => 'abou-image', 'loading' => 'lazy' ) ); ?>
                            <div class="content">
                                <h2><?php echo wp_kses_post( $slider['title'] ); ?> </h2>
                                <p><?php echo wp_kses_post( $slider['description'] ); ?>
                                </p>
                                <div class="button-wrapper">
                                    <div class="swiper-button-prev"></div>
                                    <div class="swiper-button-next"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</div>