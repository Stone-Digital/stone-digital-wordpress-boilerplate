<?php 
// Mobile Navigation menu
?>
<header class="mobile-only">
    <nav class="navigation__menu" data-attr="industrial">
        <div class="navigation__rural_sub rural--logo">
            <a href="<?php echo home_url(); ?>" aria-label="Bison Construction">
                <img
                src="<?php echo get_template_directory_uri() . '/assets/images/svg/bison_logo.svg'; ?>"
                alt="Bison Badge"
                class="logo--bison"
                width="115"
                height="69"
                />
            </a>
        </div>
    </nav>
    <div class="mm-contact">
        <a href="tel:0363524449" class="tellink">
            <svg fill="#D12F13" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="27.116" height="27.116" viewBox="0 0 27.116 27.116">
            <defs>
                <clipPath id="clip-path">
                <rect id="Rectangle_2045" data-name="Rectangle 2045" width="27.116" height="27.116" fill="#fff"/>
                </clipPath>
            </defs>
            <g id="Group_2274" data-name="Group 2274" clip-path="url(#clip-path)">
                <path id="Path_8107" data-name="Path 8107" d="M13.558,0A13.558,13.558,0,1,0,27.116,13.558,13.558,13.558,0,0,0,13.558,0m7.5,18.557c0,.713-2.142,2.5-3.571,2.5s-4.284-.715-7.5-3.928-3.928-6.07-3.928-7.5S7.844,6.06,8.559,6.06H9.988l1.427,4.284c0,.357-1.785,1.072-1.785,1.786s1.427,2.5,2.142,3.214,2.5,2.142,3.214,2.142S16.415,15.7,16.771,15.7l4.286,1.427Z" fill="#fff"/>
            </g>
            </svg>
        </a>
    </div>
    <div class="sm_menu_ham"><span></span><span></span><span></span></div>
    <ul class="mobile_menu">
        <li>
            <a href="tel:0363524449" class="tellink">
                <div class="tel__link__sub">
                    <img src="<?php echo get_template_directory_uri() . '/assets/images/svg/icon_contact.svg'; ?>" alt="Contact Us" class="logo--bison"/>
                </div>
                <div class="tel__link__sub">
                    <h5 class="tel__link__sub--smallheading">Sales and support</h5>
                    <h4 class="tel__link__sub--largerheading">(03) 6352 4449</h4>
                </div>
            </a>
        </li>
        <?php
            // Check if the 'industrial_navigation' repeater field has rows on the options page
        if ( have_rows( 'industrial_navigation', 'options' ) ) :

            // Loop through 'industrial_navigation'
            while ( have_rows( 'industrial_navigation', 'options' ) ) :
                the_row();

                // Check if 'navigation_link' repeater field has rows
                if ( have_rows( 'navigation_link' ) ) :
                    $index = 1;	
                    while ( have_rows( 'navigation_link' ) ) :
                        the_row();
                        $base_link    = get_sub_field( 'base_link' );
                        $has_sub_link = false; // Initialize flag for sub_links

                        // Check if 'sub_link' exists for this navigation link
                        if ( have_rows( 'sub_link' ) ) {
                            $has_sub_link = true; // Set flag to true if sub_links exist
                        }

                        if ( ! empty( $base_link ) && isset( $base_link['url'], $base_link['title'] ) ) :
                            $menu_text = isset( $base_link['title'] ) ? $base_link['title'] : '';
                            if( empty( $menu_text) ){
                                continue;
                            } ?>
                            <li class="has-child">
                                <a>
                                    <?php echo $menu_text; ?>
                                </a>								
                                <ul class="submenu">
                                    <?php
                                    // Sub link loop - Wrapped in a div as a child of the base link
                                    if ( have_rows( 'sub_link' ) ) : ?>
                                        <li class="<?php echo ( $index == 1 ) ? 'is-active' : '';?>">											
                                            <ul>
                                                <?php 
                                                while ( have_rows( 'sub_link' ) ) :
                                                    the_row();
                                                    $link             = get_sub_field( 'link' );
                                                    $has_sub_sub_link = false; // Flag for sub-sub links

                                                    // Check if sub-sub-links exist under this sub-link
                                                    if ( have_rows( 'sub_sub_link' ) ) {
                                                        $has_sub_sub_link = true; // Set flag if sub-sub links exist
                                                    }

                                                    if ( ! empty( $link ) && isset( $link['url'], $link['title'] ) ) :
                                                        ?>
                                                        <li>
                                                            <a
                                                                href="<?php echo esc_url( $link['url'] ); ?>"
                                                                aria-label="<?php echo esc_attr( $link['title'] ); ?>"
                                                                target="<?php echo ! empty( $link['target'] ) ? esc_attr( $link['target'] ) : '_self'; ?>"
                                                                class="">
                                                                <?php echo esc_html( $link['title'] ); ?>

                                                                <?php
                                                                // Render an image next to the sub-link if sub-sub-links exist
                                                                if ( $has_sub_sub_link ) : ?>
                                                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/svg/icon_arrow_orange.svg" alt="arrow icon" class="link-icon" />
                                                                <?php endif; ?>
                                                            </a>

                                                            <?php
                                                            // Sub-sub link loop - Sub-sub-links are children of the sub-link now
                                                            if ( have_rows( 'sub_sub_link' ) ) :
                                                                echo '<ul>';
                                                                while ( have_rows( 'sub_sub_link' ) ) :
                                                                    the_row();                                                                    
                                                                    $sub_link = get_sub_field( 'sub_link' );

                                                                    if ( ! empty( $sub_link ) && isset( $sub_link['url'], $sub_link['title'] ) ) :?>
                                                                        <li>
                                                                            <a
                                                                                href="<?php echo esc_url( $sub_link['url'] ); ?>"
                                                                                aria-label="<?php echo esc_attr( $sub_link['title'] ); ?>"
                                                                                target="<?php echo ! empty( $sub_link['target'] ) ? esc_attr( $sub_link['target'] ) : '_self'; ?>"
                                                                                class="">
                                                                                    <?php echo esc_html( $sub_link['title'] ); ?>
                                                                            </a>
                                                                        </li>
                                                                        <?php
                                                                    endif;                                                                   
                                                                endwhile;
                                                                echo '</ul>';
                                                            endif;
                                                            ?>
                                                        </li> <!-- Close sub-link-item -->
                                                        <?php
                                                    endif;

                                                endwhile;
                                                ?>
                                                <div class="ht-nav-desktop-sub-inner-items last-item">
                                                    <span class="switch-text">Currently Viewing Industrial</span>
                                                    <a class="switch-button" data-attr="rural">Switch to Rural <img src="<?php echo get_template_directory_uri(); ?>/assets/images/svg/switch.svg" alt="switch"/></a>
                                                </div>
                                            </ul>
                                        </li>
                                        <?php
                                    endif;
                                    ?>
                                </ul>
                            </li> <!-- Close base-link-wrapper -->
                        <?php
                        endif;
                        $index++;
                    endwhile;						
                endif;
            endwhile;
        endif; ?>

        <?php
            // Display main menu with custom walker
            echo bison_generate_menu_mobile( wp_get_nav_menu_items(2) );
        ?>
    </ul>
</header>
