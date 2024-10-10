<?php
/**
 * Inner Banner Block
 */

$main_background_image  = get_field( 'main_background_image' );
$header_title  = get_field( 'header_title' );
$header_subtitle  = get_field( 'header_subtitle' );

?>
<section class="image-background-section inner-banner" style="background-image: url('<?php echo esc_url( $main_background_image ); ?>')">
    <div class="text">
        <p><?php echo wp_kses_post( $header_subtitle ); ?></p>
        <h1 class="hbi-section-title"><?php echo esc_html( $header_title ); ?></h1>
    </div>
</section>
