<?php
/**
 * Fullwidth Images Block
 */

$main_images  = get_field( 'aif_images_repeater' );

?>

<section class="aif-section fullwidth">
    <div class="aif-card-grid no-gap">
        <?php foreach( $main_images as $mi ) : ?>
            <div class="col">
                <?php echo wp_get_attachment_image( $mi['image'], 'full', '', array( 'class' => '', 'alt' => 'about-full-image', 'loading' => 'lazy' ) ); ?>
            </div>
        <?php endforeach; ?>
    </div>
</section>