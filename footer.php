<?php wp_footer(); ?>

</div><?php #end .page-wrap ?>

<div class="prefooter-wrap">
	<div class="prefooter">
		<?php

			// ------------------------------- QUERIES ----
			// ----- WEEKLY SPECIALS QUERY ----
			$hp_specials_args = [
				'post_type' => 'specials',
				'posts_per_page' => '1',
				'order' => 'DESC',
				'orderby' => 'date',
			];

			// The Query
			$hp_specials_query = new WP_Query( $hp_specials_args );

		?>

		<?php if ( is_front_page() ) { ?>
			<?php // ------------------------------- WEEKLY SPECIALS -- ?>
			<a name="specials"></a>
			<div class="weekly-specials-container">
				<div class="weekly-specials">
					<div class="weekly-specials-heading">
						<h2>TJ’s Seafood Oviedo Weekly Specials</h2>
						<p class="font-alt"><i class="fas fa-calendar-alt"></i> Closed Sundays</p>
					</div>

					<div class="weekly-specials-days">

						<?php
							if ( $hp_specials_query->have_posts() ) : while ($hp_specials_query->have_posts() ) : $hp_specials_query->the_post(); ?>

							<?php

								$fields = get_field_objects();
								$day = 0;
								$specials_day = date('N');
								//$specials_day = 4;

								// echo 'Day: '.$day;
								// echo 'Specials Day: '.$specials_day;

								if( $fields ) {

									foreach( $fields as $field_name => $field ) {
										if( $field['value'] ) {
											$day ++;
							?>
										<div class="weekly-specials-day day-<?php echo $day; ?> <?php if( $specials_day == $day ) { echo 'today'; } ?>">
											<h3><?php echo $field['label']; ?></h3>
											<p><?php echo $field['value']; ?></p>
										</div>
							<?php
										}
									}
								}

							?>

						<?php endwhile; else : ?>
						<?php endif; ?>

					</div>
				</div>
			</div>

			<div class="catering-section-wrap-outer">
				<div class="catering-section-wrap">
					<img class="floating-image line-icon-fish-platter" src="/wp-content/themes/tjs/images/line-icon-fish-on-dish.png">

					<div class="catering-section">
						<div class="catering-text">
				        	<h2>Let Us Cater Your Next Event!</h2>

				        	<p>Oviedo's TJ's Seafood Shack isn't just a great place to eat seafood, we cater parties and events as well, whether a small party at  your home or planning a large event.</p>

				        	<p><a href="/catering" class="btn hp-callout-catering"><i class="fas fa-truck"></i> Our Seafood Catering</a></p>
				        </div>

				        <img class="food-truck" src="/wp-content/themes/tjs/images/img-food-truck.png">

				        <span class="img-hidden-container"><img class="background-oval" src="/wp-content/themes/tjs/images/bkd-food-truck-oval.png"></span>
				    </div>
				</div>
			</div>
		<?php } ?>

	</div>
</div>

<div class="footer-wrap-outer">
	<div class="footer-wrap">
		<img class="floating-image line-icon-crab" src="/wp-content/themes/tjs/images/line-icon-crab.png">
		<img class="floating-image shirmp-1" src="/wp-content/themes/tjs/images/img-shrimp.png">
		<img class="floating-image shirmp-2" src="/wp-content/themes/tjs/images/img-shrimp.png">

		<div class="footer-section footer-logo">
			<a href="/" class="site-logo-footer"><img src="/wp-content/themes/tjs/images/site-logo.png" alt="TJs Seafood Shack"></a>

			<div class="social-links">
				<a class="social-link facebook" href="http://www.facebook.com/ncsinformation"><i class="fab fa-facebook-square"></i></a>
				<a class="social-link twitter" href="http://www.twitter.com/ncsinformation"><i class="fab fa-twitter-square"></i></a>
				<a class="social-link youtube" href="https://www.flickr.com/photos/ncsinformation/sets/"><i class="fab fa-youtube"></i></a>
			</div>
		</div>

		<div class="footer-section footer-contact">

			<div class="newsletter-signup">
				<p class="form-label">Sign up for news, updates, and offers:</p>
				<p class="form-input">Email address...</p>
			</div>

			<div class="contact-info-hours">
				<div class="contact-info">
					<p class="footer-contact-phone">407-365-3365</p>

					<p class="footer-contact-address">
						197 E. Mitchell Hammock Rd<br/>
						Oviedo, FL 32765
					</p>
				</div>

				<div class="contact-hours">
					<p class="hours-open">
						<span>Monday-Friday:</span><br/>
						11:00am-9:00pm
					</p>

					<p class="hours-closed">Closed Sunday</p>
				</div>
			</div>
		</div>

		<div class="footer-section footer-nav">
			<?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
		</div>

		<div class="footer-section site-info">
			<p>
				©<?php echo date("Y"); ?> TJs Seafood Shack | Website design by <a href="https://www.thrivecreativelabs.com">Thrive Creative Labs</a>
			</p>
		</div>
	</div>
</div>

</body>
</html>