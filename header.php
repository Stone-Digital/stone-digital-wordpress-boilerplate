<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
    <head>
        <meta HTTP-EQUIV="Content-type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=9;IE=10;IE=Edge,chrome=1"/>
        <title><?php wp_title(); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
        <!--<script src="<?php bloginfo('template_directory'); ?>/js/vendor/modernizr-2.8.0.min.js"></script>-->
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
        
    <header class="masthead">
        <nav class="navigation__menu" data-attr="industrial">
            <div class="navigation__rural_sub rural--logo">
                <a href="<?= home_url(); ?>" aria-label="Bison Construction">
                    <img 
                    src="<?= get_template_directory_uri() . '/assets/images/svg/bison_logo.svg'; ?>" 
                    alt="Bison Badge" 
                    class="logo--bison"
                    width="115"
                    height="69"
                    />
                </a>
            </div>
              <div class="navigation__rural--sub rural--menu"> 
                <div class="navigation__rural--sub--sub">
                     <?php
                // Check if the 'industrial_navigation' repeater field has rows on the options page
                if( have_rows('industrial_navigation', 'options') ):

                    // Loop through 'industrial_navigation'
                    while( have_rows('industrial_navigation', 'options') ) : the_row();
                        
                        // Check if 'navigation_link' repeater field has rows
                        if( have_rows('navigation_link') ):
                            
                            while( have_rows('navigation_link') ) : the_row();
                                $base_link = get_sub_field('base_link');
                                $has_sub_link = false; // Initialize flag for sub_links

                                // Check if 'sub_link' exists for this navigation link
                                if( have_rows('sub_link') ) {
                                    $has_sub_link = true; // Set flag to true if sub_links exist
                                }

                                if ( !empty($base_link) && isset($base_link['url'], $base_link['title']) ):
                                    ?>
                                    <div class="base--link--wrapper">
                                        <a 
                                            href="<?= esc_url( $base_link['url'] ); ?>" 
                                            aria-label="<?= esc_attr( $base_link['title'] ); ?>"
                                            target="<?= !empty( $base_link['target'] ) ? esc_attr( $base_link['target'] ) : '_self'; ?>"
                                            class="parent--link">
                                            <?= esc_html( $base_link['title'] ); ?>

                                            <?php
                                            // Render an image next to the base link if sub links exist
                                            if ( $has_sub_link ):
                                                ?>
                                                <img src="<?= get_template_directory_uri(); ?>/assets/images/svg/icon_arrow_orange.svg" alt="arrow icon" class="link-icon" />
                                                <?php
                                            endif;
                                            ?>
                                        </a>

                                        <?php
                                        // Sub link loop - Wrapped in a div as a child of the base link
                                        if( have_rows('sub_link') ):
                                            echo '<div class="sub--link--wrapper">'; // Open div wrapper for sub links
                                            echo '<div class="sub--sub--link-wrapper">';
                                            while( have_rows('sub_link') ) : the_row();
                                                $link = get_sub_field('link');
                                                $has_sub_sub_link = false; // Flag for sub-sub links

                                                // Check if sub-sub-links exist under this sub-link
                                                if( have_rows('sub_sub_link') ) {
                                                    $has_sub_sub_link = true; // Set flag if sub-sub links exist
                                                }

                                                if ( !empty($link) && isset($link['url'], $link['title']) ):
                                                ?>
                                                <div class="sub-link-item">
                                                    <a 
                                                        href="<?= esc_url( $link['url'] ); ?>" 
                                                        aria-label="<?= esc_attr( $link['title'] ); ?>"
                                                        target="<?= !empty( $link['target'] ) ? esc_attr( $link['target'] ) : '_self'; ?>"
                                                        class="sub--link">
                                                        <?= esc_html( $link['title'] ); ?>

                                                        <?php
                                                        // Render an image next to the sub-link if sub-sub-links exist
                                                        if ( $has_sub_sub_link ):
                                                            ?>
                                                            <img src="<?= get_template_directory_uri(); ?>/assets/images/svg/icon_arrow_orange.svg" alt="arrow icon" class="link-icon" />
                                                            <?php
                                                        endif;
                                                        ?>
                                                    </a>

                                                    <?php
                                                    // Sub-sub link loop - Sub-sub-links are children of the sub-link now
                                                    if( have_rows('sub_sub_link') ):
                                                        ?>
                                                        <div class="sub--sub--parent--wrap">
                                                            <?php
                                                            while( have_rows('sub_sub_link') ) : the_row();
                                                                $sub_link = get_sub_field('sub_link');

                                                                if ( !empty($sub_link) && isset($sub_link['url'], $sub_link['title']) ):
                                                                ?>
                                                                <div class="sub--sub--link--item">
                                                                    <a 
                                                                        href="<?= esc_url( $sub_link['url'] ); ?>" 
                                                                        aria-label="<?= esc_attr( $sub_link['title'] ); ?>"
                                                                        target="<?= !empty( $sub_link['target'] ) ? esc_attr( $sub_link['target'] ) : '_self'; ?>"
                                                                        class="sub--sub--link">
                                                                        <?= esc_html( $sub_link['title'] ); ?>
                                                                    </a>
                                                                </div>
                                                                <?php
                                                                endif;

                                                            endwhile;
                                                            ?>
                                                        </div>
                                                        <?php
                                                    endif;
                                                    ?>

                                                </div> <!-- Close sub-link-item -->
                                                <?php
                                                endif;

                                            endwhile;
                                            ?>
                                            <button class="switch-button" data-attr="rural">Switch to Rural Structures <img src="<?= get_template_directory_uri(); ?>/assets/images/svg/switch.svg" alt="switch"/></button>
                                           
                                        </div>
                                             <div class="sub--sub--link-wrapper--images">
                                                <?php
                                                if( have_rows('image_cta') ):
                                                    while( have_rows('image_cta') ) : the_row();
                                                        $image = get_sub_field('image');
                                                        $link = get_sub_field('link');
                                                        // Do something...
                                                        ?>
                                                        <a class="image--cta--card" href="<?= $link['url']; ?>" target="<?= $link['target']; ?>" aria-label="<?= $link['title']; ?>"> 
                                                            <img src="<?= $image; ?>" alt="cta image"/>
                                                            <?php if($link):  ?>
                                                               <h4><?= $link['title']; ?></h4>
                                                            <?php endif; ?>
                                                        </a>
                                                        <?php
                                                    // End loop.
                                                    endwhile;
                                                else :
                                                endif;
                                                ?>
                                            </div>
                                            <?php

                                            // Now render the button only once, after all sub-links are rendered
                                            ?>
                                            
                                            <?php
                                            echo '</div>'; // Close div wrapper for sub links
                                        endif;
                                        ?>
                                    </div> <!-- Close base-link-wrapper -->
                                    <?php
                                endif;

                            endwhile;
                        else:
                            echo '<p>No navigation links found</p>'; // Debugging Output
                        endif;

                    endwhile;
                else:
                    echo '<p>No industrial navigation found</p>'; // Debugging Output
                endif;
                ?>
                 <a href="tel:0363524449" class="tellink btn--red">
                        <div class="tel__link__sub">
                            <img src="<?= get_template_directory_uri() . '/assets/images/svg/icon_contact.svg'; ?>" alt="Contact Us" class="logo--bison"/>
                        </div>
                        <div class="tel__link__sub">
                             <h5 class="tel__link__sub--smallheading">Sales and support</h5>
                             <h4 class="tel__link__sub--largerheading">(03) 6352 4449</h4>
                        </div>
                    </a>
                


                </div>
            </div>
        </nav>
        <nav class="navigation__menu" data-attr="rural">
            <div class="navigation__rural_sub rural--logo">
                <a href="<?= home_url(); ?>" aria-label="Bison Construction">
                    <img 
                    src="<?= get_template_directory_uri() . '/assets/images/svg/bison_logo.svg'; ?>" 
                    alt="Bison Badge" 
                    class="logo--bison"
                    width="115"
                    height="69"
                    />
                </a>
            </div>
            <div class="navigation__rural--sub rural--menu"> 
                <div class="navigation__rural--sub--sub">
                   <?php
                // Check if the 'rural_navigation' repeater field has rows on the options page
                if( have_rows('rural_navigation', 'options') ):

                    // Loop through 'rural_navigation'
                    while( have_rows('rural_navigation', 'options') ) : the_row();
                        
                        // Check if 'navigation_link' repeater field has rows
                        if( have_rows('navigation_link') ):
                            
                            while( have_rows('navigation_link') ) : the_row();
                                $base_link = get_sub_field('base_link');
                                $has_sub_link = false; // Initialize flag for sub_links

                                // Check if 'sub_link' exists for this navigation link
                                if( have_rows('sub_link') ) {
                                    $has_sub_link = true; // Set flag to true if sub_links exist
                                }

                                if ( !empty($base_link) && isset($base_link['url'], $base_link['title']) ):
                                    ?>
                                    <div class="base--link--wrapper">
                                        <a 
                                            href="<?= esc_url( $base_link['url'] ); ?>" 
                                            aria-label="<?= esc_attr( $base_link['title'] ); ?>"
                                            target="<?= !empty( $base_link['target'] ) ? esc_attr( $base_link['target'] ) : '_self'; ?>"
                                            class="parent--link">
                                            <?= esc_html( $base_link['title'] ); ?>

                                            <?php
                                            // Render an image next to the base link if sub links exist
                                            if ( $has_sub_link ):
                                                ?>
                                                <img src="<?= get_template_directory_uri(); ?>/assets/images/svg/icon_arrow_orange.svg" alt="arrow icon" class="link-icon" />
                                                <?php
                                            endif;
                                            ?>
                                        </a>

                                        <?php
                                        // Sub link loop - Wrapped in a div as a child of the base link
                                        if( have_rows('sub_link') ):
                                            echo '<div class="sub--link--wrapper">'; // Open div wrapper for sub links
                                            echo '<div class="sub--sub--link-wrapper">';
                                            while( have_rows('sub_link') ) : the_row();
                                                $link = get_sub_field('link');
                                                $has_sub_sub_link = false; // Flag for sub-sub links

                                                // Check if sub-sub-links exist under this sub-link
                                                if( have_rows('sub_sub_link') ) {
                                                    $has_sub_sub_link = true; // Set flag if sub-sub links exist
                                                }

                                                if ( !empty($link) && isset($link['url'], $link['title']) ):
                                                ?>
                                                <div class="sub-link-item">
                                                    <a 
                                                        href="<?= esc_url( $link['url'] ); ?>" 
                                                        aria-label="<?= esc_attr( $link['title'] ); ?>"
                                                        target="<?= !empty( $link['target'] ) ? esc_attr( $link['target'] ) : '_self'; ?>"
                                                        class="sub--link">
                                                        <?= esc_html( $link['title'] ); ?>

                                                        <?php
                                                        // Render an image next to the sub-link if sub-sub-links exist
                                                        if ( $has_sub_sub_link ):
                                                            ?>
                                                            <img src="<?= get_template_directory_uri(); ?>/assets/images/svg/icon_arrow_orange.svg" alt="arrow icon" class="link-icon" />
                                                            <?php
                                                        endif;
                                                        ?>
                                                    </a>

                                                    <?php
                                                    // Sub-sub link loop - Sub-sub-links are children of the sub-link now
                                                        if( have_rows('sub_sub_link') ):
                                                            ?>
                                                            <div class="sub--sub--parent--wrap">
                                                            <?php
                                                            while( have_rows('sub_sub_link') ) : the_row();
                                                                $sub_link = get_sub_field('sub_link');

                                                                if ( !empty($sub_link) && isset($sub_link['url'], $sub_link['title']) ):
                                                                ?>
                                                                <div class="sub--sub--link--item">
                                                                    <a 
                                                                        href="<?= esc_url( $sub_link['url'] ); ?>" 
                                                                        aria-label="<?= esc_attr( $sub_link['title'] ); ?>"
                                                                        target="<?= !empty( $sub_link['target'] ) ? esc_attr( $sub_link['target'] ) : '_self'; ?>"
                                                                        class="sub--sub--link">
                                                                        <?= esc_html( $sub_link['title'] ); ?>
                                                                    </a>
                                                                </div>
                                                                <?php
                                                                endif;

                                                            endwhile;
                                                            ?>
                                                            </div>
                                                            <?php
                                                        endif;

                                                        ?>
                                                </div> <!-- Close sub-link-item -->
                                                <?php
                                                endif;

                                            endwhile;
                                            ?>
                                            <button class="switch-button" data-attr="industrial">Switch to Industrial Structures <img src="<?= get_template_directory_uri(); ?>/assets/images/svg/switch.svg" alt="switch"/></button>
                                           
                                        </div>
                                             <div class="sub--sub--link-wrapper--images">
                                                <?php
                                                if( have_rows('Image_CTA') ):
                                                    while( have_rows('Image_CTA') ) : the_row();
                                                        $image = get_sub_field('image');
                                                        $link = get_sub_field('link');
                                                        // Do something...
                                                        ?>
                                                        <a class="image--cta--card" href="<?= $link['url']; ?>" target="<?= $link['target']; ?>" aria-label="<?= $link['title']; ?>"> 
                                                            <img src="<?= $image; ?>" alt="cta image"/>
                                                            <?php if($link):  ?>
                                                               <h4><?= $link['title']; ?></h4>
                                                            <?php endif; ?>
                                                        </a>
                                                        <?php
                                                    // End loop.
                                                    endwhile;
                                                else :
                                                endif;
                                                ?>
                                            </div>
                                            <?php

                                            // Now render the button only once, after all sub-links are rendered
                                            ?>
                                            
                                            <?php
                                            echo '</div>'; // Close div wrapper for sub links
                                        endif;
                                        ?>
                                    </div> <!-- Close base-link-wrapper -->
                                    <?php
                                endif;

                            endwhile;
                        else:
                            echo '<p>No navigation links found</p>'; // Debugging Output
                        endif;

                    endwhile;
                else:
                    echo '<p>No rural navigation found</p>'; // Debugging Output
                endif;
                ?>





                     <a href="tel:0363524449" class="tellink btn--red">
                        <div class="tel__link__sub">
                            <img src="<?= get_template_directory_uri() . '/assets/images/svg/icon_contact.svg'; ?>" alt="Contact Us" class="logo--bison"/>
                        </div>
                        <div class="tel__link__sub">
                             <h5 class="tel__link__sub--smallheading">Sales and support</h5>
                             <h4 class="tel__link__sub--largerheading">(03) 6352 4449</h4>
                        </div>
                    </a>
               


                </div>
            </div>
            
        </nav>
    </header>