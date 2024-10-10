<?php
/**
 * Heading Block
 */

$header_title  = get_field( 'header_title' );
$header_description  = get_field( 'main_description' );
$teams_list  = get_field( 'team_repeater' );
?>
<section class="team-section section-bg">
    <div class="container">
        <div class="section-title">
            <h2 class="swh-section-title"><?php echo esc_html( $header_title ); ?></h2>
            <?php echo wp_kses_post( $header_description ); ?>
        </div>
        <div class="card-grid col-4 team-card">
            <?php if ( $teams_list ) : ?>
                <?php foreach ( $teams_list as $teams ) : ?>
                    <div class="col">
                        <div class="image-card">
                            <div class="image">
                                <?php echo wp_get_attachment_image( $teams['image'], 'full', '', array( 'class' => '', 'alt' => 'team-image', 'loading' => 'lazy' ) ); ?>
                            </div>
                            <div class="content">
                                <h3><?php echo $teams['title']; ?></h3>
                                <p><?php echo $teams['position']; ?></p>
                                <div class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 448 512">
                                        <path
                                            d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>        
        </div>
    </div>
</section>