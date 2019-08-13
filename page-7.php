<?php
	// ---------------------------------------------------------------------------------
	// ----- FOOD TRUCK PAGE THEME -----------------------------------------------------
	// ---------------------------------------------------------------------------------

	get_header();

	// ----- 6 UPCOMING EVENTS QUERY ----
	$foodtruck_page_events_listing_args = [
		'post_type' => 'event',
		'posts_per_page' => '600',
		'order' => 'ASC',
		'orderby' => 'publish',
	];

	// The Query
	$foodtruck_page_events_listing_query = new WP_Query( $foodtruck_page_events_listing_args );

?>

<?php if( isset($_GET['pid']) ){ $posttype = get_post( $_GET['pid'] )->post_type; } ?>

<div class="content-wrap">

	<?php if ( have_posts() ) { ?>

	    <div class="content-area has-sidebar">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					$post_meta = get_post_meta( $post->ID );

					//echo 'PAGE META<br/><pre>'.print_r( $post_meta, true ).'</pre>';
				?>

				<h1 class="page-title"><?php the_title(); ?></h1>

				<?php the_content(); ?>

				<?php

					// check if the repeater field has rows of data
					if( have_rows('food_truck_menu_item') ):

					$menu_item = get_field('food_truck_menu_item');
					//echo '<p>Menu Item Meta</p><pre>'.print_r($menu_item, true). '</pre>';
				?>

				<div class="food-truck-menu-container">

					<?php
					 	// loop through the rows of data
					    while ( have_rows('food_truck_menu_item') ) : the_row();

					        // display a sub field value
					        //the_sub_field('sub_field_name');
					        // vars
							$menu_item_name = get_sub_field('menu_item_name');
							$menu_item_price = get_sub_field('food_truck_menu_item_price');
							$menu_item_price_tier_2 = get_sub_field('food_truck_menu_item_price_tier_2');
							$menu_item_image = get_sub_field('food_truck_menu_item_picture');
							$menu_item_availability = get_sub_field('food_truck_menu_item_currently_available');
							$menu_item_availability = $menu_item_availability['0'];

					?>

						<?php if ( $menu_item_availability == 'available' ) { ?>
							<div class="menu-item">
								<div class="menu-item-photo">
									<img src="<?php echo $menu_item_image['url']; ?>" alt="<?php echo $menu_item_image['alt'] ?>" />
								</div>

								<div class="menu-item-content">
									<p class="menu-item-name"><?php echo $menu_item_name; ?></p>
									<p class="menu-item-price">
										<span class="menu-item-price-tier-1"><?php echo $menu_item_price; ?></span>
										<?php if( $menu_item_price_tier_2 ): ?>
											<span class="menu-item-price-tier-2"><?php echo $menu_item_price_tier_2; ?></span>
										<?php endif; ?>
									</p>
								</div>
							</div>
						<?php } ?>

						<?php endwhile; ?>

						<?php else : ?>

						    <p>We are currently revamping our food truck menu. Check back periodically to see what we've changed!</p>

						<?php endif; ?>
					</div>

			<?php endwhile; ?><!-- PAGE MAIN QUERY -->
		</div>

	<?php } ?>

	<div class="sidebar-area">
		<?php // ------------------------------- EVENTS LISTING ------------------------------- ?>
		<div class="food-truck-page-events-listing-container">

			<h2>Food Truck Schedule</h2>

			<div class="food-truck-page-events-listing">
				<?php if ( $foodtruck_page_events_listing_query->have_posts() ) : while ($foodtruck_page_events_listing_query->have_posts() ) : $foodtruck_page_events_listing_query->the_post(); ?>

					<?php
						$event_meta = get_post_meta( $post->ID );
						$event_date = new DateTime(get_field('event_date'));
						$event_date = $event_date->format( "F j, Y" );
						$event_location = get_field('event_location');

						//echo 'Testimonial META<br/><pre>'.print_r( $post_meta, true ).'</pre>';
					?>

					<div class="event-item">
						<div class="event-item-content">
							<div class="event-item-name-date-icon-container">
								<div class="event-item-calendar-icon-container">
									<i class="fas fa-calendar-week"></i>
								</div>
								<div class="event-item-name-date-container">
									<p class="event-item-name"> <?php the_title(); ?></p>
									<p class="event-item-date"> <?php echo $event_date; ?></p>
								</div>
							</div>

							<div class="event-item-location-container">
								<p class="event-item-location"><i class="fas fa-map-pin"></i> <?php echo $event_location; ?></p>
							</div>
						</div>
					</div>

				<?php endwhile; ?>

				<?php wp_reset_postdata(); ?>

				<?php endif; ?>
			</div>

		</div>
	</div>

</div>

<?php get_footer(); ?>