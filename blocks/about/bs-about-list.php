<?php
/**
 * About Lists Block
 */

$about_lists  = get_field( 'lists_repeater' );


foreach( $about_lists as $list ) : ?>

    <section class="about-list <?php echo ( $list['layouts'] == 'one' ) ? 'section-bg' : 'section-white'; ?>">
        <div class="container">
            <div class="section-wrapper">
                <?php if( $list['layouts'] == 'one' ) : ?>
                    <div class="image">
                        <?php echo wp_get_attachment_image( $list['image'], 'full', '', array( 'class' => '', 'alt' => 'about-list-image', 'loading' => 'lazy' ) ); ?>
                    </div>
                <?php endif; ?> 
                <div class="text-content">
                    <b>
                    <?php echo esc_html( $list['subtitle'] ); ?>
                    </b>
                    <h2>
                    <?php echo esc_html( $list['title'] ); ?>
                    </h2>
                    <p>
                    <?php echo wp_kses_post( $list['description'] ); ?>
                    </p>
                    <a class="button primary" href="<?php echo esc_url( $list['button_link'] ); ?>"><?php echo esc_html( $list['button_label'] ); ?></a>
                </div>
                <?php if( $list['layouts'] == 'two' ) : ?>
                    <div class="image">
                        <?php echo wp_get_attachment_image( $list['image'], 'full', '', array( 'class' => '', 'alt' => 'about-full-image', 'loading' => 'lazy' ) ); ?>
                    </div>
                <?php endif; ?> 
            </div>
        </div>
    </section>
<?php endforeach;