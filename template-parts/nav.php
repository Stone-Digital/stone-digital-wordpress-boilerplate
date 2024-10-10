<?php
// Navigation menu
?>
<header class="masthead">
	<div class="menu-container">
		<div class="site-main--logo">
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
		<section class="ht-nav-desktop ht-nav-wrap">
			<div class="ht-nav-container">
				<nav class="ht-nav-desktop__main-menu">
					<?php
						// Check if the 'industrial_navigation' repeater field has rows on the options page
					if ( have_rows( 'industrial_navigation', 'options' ) ) :

						echo '<ul>';
						// Loop through 'industrial_navigation'
						while ( have_rows( 'industrial_navigation', 'options' ) ) :
							the_row();

							// Check if 'navigation_link' repeater field has rows
							if ( have_rows( 'navigation_link' ) ) :
								$index = 0;	
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
										<li class="has-sub-menu mega-menu">
											<a class="menu-first-layer">
												<?php echo $menu_text; 
												// Render an image next to the base link if sub links exist
												if ( $has_sub_link ) : ?>
													<svg width="9.268555" height="5.070312" viewBox="0 0 9.26855 5.07031" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
														<mask id="mask1_1711" mask-type="alpha" maskUnits="userSpaceOnUse" x="0.000000" y="0.000000" width="9.268555" height="5.070312">
															<g style="mix-blend-mode:normal">
																<rect id="Rectangle 2085" width="9.268967" height="5.071086" fill="#D12F13" fill-opacity="1.000000"/>
															</g>
														</mask>
														<g mask="url(#mask1_1711)">
															<g style="mix-blend-mode:normal">
																<path id="Path 8108" d="M4.63 5.07C4.21 5.07 3.79 4.91 3.46 4.58L0 1.11L1.11 0L4.58 3.47L8.14 0L9.26 1.11L5.79 4.58C5.47 4.91 5.05 5.07 4.63 5.07Z" fill="#D12F13" fill-opacity="1.000000" fill-rule="nonzero"/>
															</g>
														</g>
													</svg>	
												<?php endif; ?>
											</a>								
											<ul class="ht-nav-desktop__sub-menu ht-nav-desktop__sub-menu-<?php echo $index; ?> slide-up">
												<div class="container">
													<?php
													// Sub link loop - Wrapped in a div as a child of the base link
													if ( have_rows( 'sub_link' ) ) : ?>
														<li class="ht-nav-desktop-sub-tab-items ht-nav-desktop-sub-tab-items fade-in-text">											
															
															<span class="ht-nav-desktop-main-sub-text"><?php echo $menu_text; ?></span>
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
																		<div class="ht-nav-desktop-sub-inner-items">
																			<a
																				href="<?php echo esc_url( $link['url'] ); ?>"
																				aria-label="<?php echo esc_attr( $link['title'] ); ?>"
																				target="<?php echo ! empty( $link['target'] ) ? esc_attr( $link['target'] ) : '_self'; ?>"
																				class="">
																				<?php echo esc_html( $link['title'] ); ?>

																				<?php
																				// Render an image next to the sub-link if sub-sub-links exist
																				if ( $has_sub_sub_link ) : ?>
																					<svg width="9.268555" height="5.070312" viewBox="0 0 9.26855 5.07031" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
																						<mask id="mask1_1711" mask-type="alpha" maskUnits="userSpaceOnUse" x="0.000000" y="0.000000" width="9.268555" height="5.070312">
																							<g style="mix-blend-mode:normal">
																								<rect id="Rectangle 2085" width="9.268967" height="5.071086" fill="#D12F13" fill-opacity="1.000000"/>
																							</g>
																						</mask>
																						<g mask="url(#mask1_1711)">
																							<g style="mix-blend-mode:normal">
																								<path id="Path 8108" d="M4.63 5.07C4.21 5.07 3.79 4.91 3.46 4.58L0 1.11L1.11 0L4.58 3.47L8.14 0L9.26 1.11L5.79 4.58C5.47 4.91 5.05 5.07 4.63 5.07Z" fill="#D12F13" fill-opacity="1.000000" fill-rule="nonzero"/>
																							</g>
																						</g>
																					</svg>	
																				<?php endif; ?>
																			</a>

																			<?php
																			// Sub-sub link loop - Sub-sub-links are children of the sub-link now
																			if ( have_rows( 'sub_sub_link' ) ) :
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
																			endif;
																			?>
																		</div> <!-- Close sub-link-item -->
																		<?php
																	endif;

																endwhile;
																?>
																<div class="ht-nav-desktop-sub-inner-items last-item">
																	<span class="switch-text">Currently viewing Industrial</span>
																	<a class="switch-button" data-attr="rural">Switch to Rural</a>
																</div>
															</ul>
														</li>
														<li class="sub--sub--link-wrapper--images fade-in-image">
															<?php
															if ( have_rows( 'image_cta' ) ) :
																while ( have_rows( 'image_cta' ) ) :
																	the_row();
																	$image = get_sub_field( 'image' );
																	$link  = get_sub_field( 'link' );
																	// Do something...
																	?>
																	<a class="image--cta--card" href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>" aria-label="<?php echo $link['title']; ?>">
																		<span style="position:relative;">
																			<img src="<?php echo $image; ?>" alt="cta image"/>
																			<div class="overlay-blog"></div>
																		</span>
																		<?php if ( $link ) : ?>
																			<h4><?php echo $link['title']; ?></h4>
																		<?php endif; ?>
																	</a>
																	<?php
																	// End loop.
																endwhile;
															endif;
															?>
														</li>
														<?php
													endif;
													?>
												</div>
											</ul>
										</li> <!-- Close base-link-wrapper -->
									<?php
									endif;
									$index++;
								endwhile;						
							endif;
						endwhile;
						echo '</ul>';
					endif; ?>

					<?php
						// Display main menu with custom walker
						wp_nav_menu(
							array(
								'menu'      => 'Main Menu',
								'container' => null,
								'walker' => new Bison_Walker_Nav_Menu()
							)
						);
					?>
				</nav>	
			</div>	
			<a href="tel:0363524449" class="tellink btn--red">
				<div class="tel__link__sub">
					<img src="<?php echo get_template_directory_uri() . '/assets/images/svg/icon_contact.svg'; ?>" alt="Contact Us" class="logo--bison"/>
				</div>
				<div class="tel__link__sub">
					<h5 class="tel__link__sub--smallheading">Sales and support</h5>
					<h4 class="tel__link__sub--largerheading">(03) 6352 4449</h4>
				</div>
			</a>
		</section>
	</div> 
</header>