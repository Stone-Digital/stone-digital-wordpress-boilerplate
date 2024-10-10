<?php 
    $heading_with_link = get_field('heading_with_link', 'options');
    $phone_number = get_field('phone_number', 'options');
    $opening_times = get_field('opening_times', 'options');
    $email_address = get_field('email_address', 'options');
?>
<footer class="mastfoot">
		<div class="mastfoot_footer__logo">
	   	 	<img 
	   	 	src="<?= get_template_directory_uri() . '/assets/images/svg/bison_logo_white.svg'; ?>" 
	   	 	alt="Bison Construction" 
	   	 	class="footer--logo"
	   	 	width="136"
	   	 	height="81"
	   	 	/>
		</div>
	    <div class="sub__foot">
	    <section class="form--wrapper">
	    	<h5 class="mobile--newsletter--heading">Sign up to our newsletter</h5>
	        <?php echo do_shortcode('[gravityform id="1" title="true"]')?>
	    </section>
	    <section class="mastfoot__menus">
	        <div class="menu--items item-1">
	            <?php
	            if( have_rows('menu_one','options') ):
					$index = 1;
	                while( have_rows('menu_one','options') ) : the_row();
	                    $heading = get_sub_field('heading');
	                    ?>
	                    <h5 
	                    class="heading--link<?php if( $index > 1 ) echo ' sub-heading--link';?><?php if( $index == 1 ) echo ' sub-heading--mb';?>">
	                    	<a 
	                    	 href="<?= $heading['url']; ?>" 
	                    	 target="<?= $heading['target'] ? $heading['target'] : '_self'; ?>"
	                    	 aria-label="<?= $heading['title']; ?>"><?= $heading['title']; ?>
	                    	 </a>
	                    </h5>
	                    <?php
	                    if( have_rows('link') ):
	                        while( have_rows('link') ) : the_row();
	                            $link = get_sub_field('link');
	                            ?>
	                            <a 
	                            class="menu--link" 
	                            href="<?= $link['url']; ?>" 
	                            target="<?= $link['target'] ? $link['target'] : '_self'; ?>" 
	                            aria-label="<?= $link['title']; ?>"><?= $link['title']; ?>
	                            </a>
	                            <?php
	                        endwhile;
	                    endif;
						$index++;
	                endwhile;
	            endif;
	            ?>
	        </div>
	        <div class="menu--items item-2">
	            <?php
	            if( have_rows('menu_two','options') ):
					$zindex = 1;
	                while( have_rows('menu_two','options') ) : the_row();
	                    $heading = get_sub_field('heading');
	                    ?>
	                    <h5 class="heading--link<?php if( $zindex > 1 ) echo ' sub-heading--link';?><?php if( $zindex == 1 ) echo ' sub-heading--mb';?>">
	                    	<a 
	                    	href="<?= $heading['url']; ?>" 
	                    	target="<?= $heading['title']; ?>">
	                    	<?= $heading['title']; ?>
	                    	</a>
	                    </h5>
	                    <?php
	                    if( have_rows('link') ):
	                        while( have_rows('link') ) : the_row();
	                            $link = get_sub_field('link');
	                            ?>
	                            <a 
	                            class="menu--link" 
	                            href="<?= $link['url']; ?>" target="<?= $link['target'] ? $link['target'] : '_self'; ?>" 
	                            aria-label="<?= $link['title']; ?>"><?= $link['title']; ?>
	                            </a>
	                            <?php
	                        endwhile;
	                    endif;
						$zindex++;
	                endwhile;
	            endif;
	            ?>
	        </div>
	        <div class="menu--items item-3">
	           <?php
			    if( have_rows('locations', 'options') ):
			        $counter = 0; // Initialize a counter to track the number of headings
			        while( have_rows('locations', 'options') ) : the_row();
			            $heading_with_link = get_sub_field('heading_with_link');
			            $address = get_sub_field('address');
			            $note = get_sub_field('note');
			            ?>
			            <?php if($heading_with_link): ?>
			                <h5 class="heading--link<?= $counter > 0 ? ' sub-heading' : ''; ?>">
			                	<a 
			                	href="<?= esc_url($heading_with_link['url']); ?>" 
			                	target="<?= $heading_with_link['target'] ? esc_attr($heading_with_link['target']) : '_self'; ?>" 
			                	aria-label="<?= esc_attr($heading_with_link['title']); ?>">
			                		<?= esc_html($heading_with_link['title']); ?>
			                	</a>
			                </h5>
			            <?php endif; ?>
			            <?php if($address): ?>
			                <p class="footer--address<?php if( $counter > 2 ) echo ' foot-note--link';?>"><?= $address; ?></p>
			            <?php endif; ?>
			            <?php if($note): ?>
			                <p class="footer--notes"><?= $note; ?></p>
			            <?php endif; ?>
			            <?php
			            $counter++; // Increment the counter after each iteration
			        endwhile;
			    endif;
			?>

	        </div>
	        <div class="menu--items menu--contact item-4">
	        	<?php $contact_link = get_field('heading_with_link','options'); ?>
	            <?php if($contact_link): ?>
	                <h5 class="heading--link">
	                	<a 
	                	href="<?= $contact_link['url']; ?>">
	                	<?= $contact_link['title']; ?>
	                	</a>
	                </h5>
	            <?php endif; ?>
	            <?php if($phone_number ): ?>
					<div class="footer--contact-ph">
						<img 
						src="<?= get_template_directory_uri() . '/assets/images/svg/icon_contact.svg' ?>" 
						class="footer--contact--icon"
						width="27"
						height="27"
						/>
						<a 
						href="tel:<?=  preg_replace('/[^0-9]/', '', $phone_number); ?>"
						class="footer--tell--link">
						<?= $phone_number; ?></a>
					</div>
	            <?php endif; ?>
	            <?php if($opening_times ): ?>
	                <p class="footer--opening--times"><?= $opening_times; ?></p>
	            <?php endif; ?>
	           <a href="mailto:<?= $email_address; ?>" class="footer--email--address"><?= $email_address; ?></a>

	            <!-- socials -->
	            <?php
	            if( have_rows('socials','options') ):
	            	?>
	            	<div class="social--links">
		            	<?php
		                while( have_rows('socials','options') ) : the_row();
		                    $icon = get_sub_field('icon');
		                    $social_link = get_sub_field('social_link');
		                    ?>
		                    <a 
		                    href="<?= $social_link['url']; ?>" 
		                    target="<?= $social_link['target']; ?>"
		                    class="social--icon">
		                        <img src="<?= $icon; ?>" 
		                        alt="<?= $social_link['title']; ?>"/>
		                    </a>
		                    <?php
		                endwhile;
		                ?>
	            	</div>
	                <?php
	            endif;
	            ?>
	            <p class="footer--copyright">© Bison Constructions</p>
	            <p class="footer--copyright" style="margin-top:0;">All rights reserved</p>
	            <img 
		            src="<?= get_template_directory_uri() . '/assets/images/webp/bison-crest.webp'; ?>" 
		            alt="Bison Construction" 
		            class="crest--logo" 
		            width="138" 
		            height="138"/>
	        </div>
	    </section>
	</div>
</footer>

<?php wp_footer(); ?>
<script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>
<script>
    $(document).ready(function() {
        // Ensure ScrollReveal is available before initializing
        if (typeof ScrollReveal !== 'undefined') {
            window.sr = ScrollReveal({
                easing: "cubic-bezier(0.6, 0.2, 0.1, 1)",
                opacity: 0,
                distance: "15px",
                delay: 0,
                origin: "bottom",
                scale: 1,
                duration: 2000,
                reset: false
            });

            // Regular fade up for single elements
            sr.reveal(".fade--up");

            // Sequence reveal for elements with the class 'sequence--fade-up'
            sr.reveal(".sequence--fade-up", {
                interval: 200 // Delay between each element in milliseconds
            });
        } else {
            console.error('ScrollReveal is not loaded.');
        }
    });
</script>
</body>
</html>
