    <footer class="mastfoot">

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
		                distance: "45px",
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