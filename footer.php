</div><?php #end .page-wrap ?>

<div class="prefooter-wrap">
	<div class="prefooter">

		<?php if ( is_front_page() ) { ?>

			<?php
				// ----- 6 UPCOMING EVENTS QUERY ----
				$home_page_events_listing_args = [
					'post_type' => 'event',
					'posts_per_page' => '1',
					'order' => 'ASC',
					'orderby' => 'publish',
				];

				// The Query
				$home_page_events_listing_query = new WP_Query( $home_page_events_listing_args );
			?>

			<div class="catering-section-wrap-outer">
				<div class="catering-section-wrap">
					<img class="floating-image line-icon-fish-platter" src="/wp-content/themes/tjs/images/line-icon-fish-on-dish.png">

					<div class="catering-section">
						<?php if ( $home_page_events_listing_query->have_posts() ) : while ($home_page_events_listing_query->have_posts() ) : $home_page_events_listing_query->the_post(); ?>

							<?php
								$event_meta = get_post_meta( $post->ID );
								$event_date = new DateTime(get_field('event_date'));
								$event_date = $event_date->format( "F j, Y" );
								$event_location = get_field('event_location');

								//echo 'Testimonial META<br/><pre>'.print_r( $post_meta, true ).'</pre>';
							?>

							<div class="hp-event-item-link">
								<a class="btn" href="/food-truck">Join us at <span class="event-item-location"><?php echo $event_location; ?></span> for <span class="event-item-name"> <?php the_title(); ?></span> on <span class="event-item-date"> <?php echo $event_date; ?></span></a>
							</div>

						<?php endwhile; ?>

						<?php wp_reset_postdata(); ?>

						<?php endif; ?>

						<div class="catering-text">
				        	<h2>TJ's Seafood Around Town!</h2>

				        	<p>Oviedo's TJ's Seafood Shack isn't just a great place to eat seafood, we cater parties and events as well! We're mobile too. Follow us on Isntagram, Facebook and Twitter to find out where we'll be.</p>

				        	<p><a href="/food-truck" class="btn hp-callout-catering"><i class="fas fa-truck"></i> Upcoming Events & Menu</a></p>
				        </div>

				        <div class="catering-image">
				        	<img class="food-truck" src="/wp-content/themes/tjs/images/img-food-truck.png">
				        </div>

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
				<a class="social-link facebook" href="https://www.facebook.com/tjsseafoodshack"><i class="fab fa-facebook-square"></i></a>
				<a href="https://www.instagram.com/tjsseafoodshack/"><i class="fab fa-instagram"></i></a>
				<a class="social-link twitter" href="https://twitter.com/tjsseafood"><i class="fab fa-twitter-square"></i></a>
			</div>
		</div>

		<div class="footer-section footer-contact">

			<div class="newsletter-signup">
				<?php Ninja_Forms()->display( 3 ); ?>
			</div>

			<div class="contact-info-hours">
				<div class="contact-info">
					<p class="footer-contact-phone">407-365-3365</p>

					<p class="footer-contact-address">
						197 E. Mitchell Hammock&nbsp;Rd<br/>
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

<?php wp_footer(); ?>

</body>
</html>