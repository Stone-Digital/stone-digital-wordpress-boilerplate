<?php
$section_subtitle  = get_field( 'section_subtitle' );
$section_title  = get_field( 'section_title' );
$location  = get_field( 'location' );
$description  = get_field( 'description' );
$button_label  = get_field( 'button_label' );
$button_link  = get_field( 'button_link' );
$view_all_button  = get_field( 'view_all_button' );
$view_all_button_link  = get_field( 'view_all_button_link' );
$swsc_image  = get_field( 'swsc_image' );

?>
<section class="swcs-section section-bg">
	<div class="container">
        <div class="section-wrapper">
            <div class="text-content">
                <b><?php echo esc_html( $section_subtitle ); ?></b>
                <h2 class="swcs-section__title"><?php echo esc_html( $section_title ); ?></h2>
                <span class="location">
                    <span></span>
                    <?php echo esc_html( $location ); ?>
                </span>
                <p class="swcs__description"><?php echo wp_kses_post( $description ); ?></p>
                <a class="button primary" href="<?php echo esc_url( $button_link ); ?>"><?php echo esc_html( $button_label ); ?></a>
                <p class="primary-color">
                    <?php echo wp_kses_post( $view_all_button ); ?>
                </p>
            </div>
            <div class="swcs__image image">
                <?php echo wp_get_attachment_image( $swsc_image, 'full', '', array( 'class' => 'swf__icon circle', 'alt' => 'circle-logo', 'loading' => 'lazy' ) ); ?>
            </div>
        </div>
    </div>
</section>