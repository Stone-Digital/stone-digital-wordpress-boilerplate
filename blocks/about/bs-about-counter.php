<?php
/**
 * AboutCounter Block
 */

$header_title  = get_field( 'header_title' );
$counters  = get_field( 'counter_repeater' );
$button_label  = get_field( 'button_label' );
$button_link  = get_field( 'button_link' );

?>
<section class="section-bg">
    <div class="container">
        <div class="section-title">
            <h2 class="aic-section-title">
            <?php echo esc_html( $header_title ); ?>
            </h2>
        </div>

        <div class="counter">
            <div class="card-grid">
                <?php foreach( $counters as $counter ) : ?>
                    <div class="col">
                        <div class="counter-number">
                        <?php echo esc_html( $counter['counter'] ); ?>+
                        </div>
                        <p>
                            <?php echo wp_kses_post( $counter['description'] ); ?>
                        </p>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php if( $button_label & $button_link ) : ?>
                <div class="button-wrapper">
                    <a class="button primary" href="<?php echo esc_url( $button_link ); ?>"><?php echo esc_html( $button_label ); ?></a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>