<?php
/**
 * Heading Block
 */

$main_image  = get_field( 'image' );
$header_title  = get_field( 'header_title' );
$header_description  = get_field( 'main_description' );
$button_label  = get_field( 'button_label' );
$button_link  = get_field( 'button_link' );

?>
<section class="structure-landing-heading section-white">
    <div class="container">
        <div class="structure">
            <?php echo wp_get_attachment_image( $main_image, 'full', '', array( 'class' => 'small-image', 'alt' => 'map-image', 'loading' => 'lazy' ) ); ?>
            <h2 class="swh-section-title"><?php echo esc_html( $header_title ); ?></h2>
            <?php echo wp_kses_post( $header_description ); ?>
        </div>
        <?php if( $button_label & $button_link ) : ?>
            <div class="button-wrapper">
                <a class="button primary" href="<?php echo esc_url( $button_link ); ?>"><?php echo esc_html( $button_label ); ?></a>
            </div>
        <?php endif; ?>
    </div>
</section>