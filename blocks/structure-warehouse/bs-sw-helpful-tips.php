<?php
$section_subtitle  = get_field( 'section_subtitle' );
$section_title  = get_field( 'section_title' );
$section_content  = get_field( 'section_content' );
$button_label  = get_field( 'button_label' );
$button_link  = get_field( 'button_link' );

?>
<section class="swht-section section-white">
	<div class="container">
        <div class="section-title">
            <div class="text-content">
                <span><?php echo esc_html( $section_subtitle ); ?></span>
                <h2 class="swht-section__title"><?php echo esc_html( $section_title ); ?></h2>
                <?php echo wp_kses_post( $section_content ); ?>
            </div>
        </div>
        <div class="button-wrapper">
            <a class="button primary" href="<?php echo esc_url( $button_link ); ?>"><?php echo esc_html( $button_label ); ?></a>
        </div>
    </div>
</section>