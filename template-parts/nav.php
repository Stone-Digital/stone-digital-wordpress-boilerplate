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
											<a>
												<?php echo $menu_text; 
												// Render an image next to the base link if sub links exist
												if ( $has_sub_link ) : ?>
													<img src="<?php echo get_template_directory_uri(); ?>/assets/images/svg/icon_arrow_orange.svg" alt="arrow icon" class="link-icon" />
												<?php endif; ?>
											</a>								
											<ul class="ht-nav-desktop__sub-menu ht-nav-desktop__sub-menu-<?php echo $index; ?>">
												<div class="container">
													<?php
													// Sub link loop - Wrapped in a div as a child of the base link
													if ( have_rows( 'sub_link' ) ) : ?>
														<li class="ht-nav-desktop-sub-tab-items ht-nav-desktop-sub-tab-items">											
															
															<span><?php echo $menu_text; ?></span>
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
																					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/svg/icon_arrow_orange.svg" alt="arrow icon" class="link-icon" />
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
																	<span class="switch-text">Currently Viewing Industrial</span>
																	<a class="switch-button" data-attr="rural">Switch to Rural <img src="<?php echo get_template_directory_uri(); ?>/assets/images/svg/switch.svg" alt="switch"/></a>
																</div>
															</ul>
														</li>
														<li class="sub--sub--link-wrapper--images">
															<?php
															if ( have_rows( 'image_cta' ) ) :
																while ( have_rows( 'image_cta' ) ) :
																	the_row();
																	$image = get_sub_field( 'image' );
																	$link  = get_sub_field( 'link' );
																	// Do something...
																	?>
																	<a class="image--cta--card" href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>" aria-label="<?php echo $link['title']; ?>">
																		<img src="<?php echo $image; ?>" alt="cta image"/>
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