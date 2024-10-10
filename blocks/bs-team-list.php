<?php
/**
 * About Lists Block
 */

 $subtitle  = get_field( 'subtitle' );
 $title  = get_field( 'title' );
 $image  = get_field( 'image' );
 $button_label  = get_field( 'button_label' );
 $button_link  = get_field( 'button_link' );
 $description  = get_field( 'description' );
?>

<section class="team-section-list bg-primary team">
    <div class="container">
        <div class="section-wrapper"> 
            <div class="text-content">
                <b>
                <?php echo esc_html( $subtitle ); ?>
                </b>
                <h2>
                <?php echo esc_html( $title ); ?>
                </h2>
                <p>
                <?php echo wp_kses_post( $description ); ?>
                </p>
                <a class="button black" href="<?php echo esc_url( $button_link ); ?>"><?php echo esc_html( $button_label ); ?></a>
            </div>
            <div class="image">
                <?php echo wp_get_attachment_image( $image, 'full', '', array( 'class' => '', 'alt' => 'about-full-image', 'loading' => 'lazy' ) ); ?>
            </div>
        </div>
    </div>
</section>
<?php 