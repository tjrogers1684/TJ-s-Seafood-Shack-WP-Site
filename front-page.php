<?php get_header();
// ---------------------------------------------------------------------------------
// ----- HOMEPAGE THEME ------------------------------------------------------------
// ---------------------------------------------------------------------------------

?>

<div class="page-wrap">

	<div class="content-top">
		<!-- HP CALLOUTS -->

	</div><!-- END CONTENT TOP -->

	<div class="content-wrap-outer">
		<div class="content-wrap">
			<div class="floating-image-hidden-container">
				<img class="floating-image line-icon-shells-small" src="/wp-content/themes/tjs/images/line-icon-shells-small.png">
				<img class="floating-image line-icon-shells-large" src="/wp-content/themes/tjs/images/line-icon-shells-large.png">
			</div>

			<div class="homepage-callouts">
				<a href="/menu/" class="hp-callout callout-order-online">
					<span class="callout-icon"><img src="/wp-content/themes/tjs/images/icon-callout-order-online.svg"></span>
					<span class="callout-text">
						<span class="callout-text-tagline">seafood to go</span>
						<span class="callout-text-main font-alt">Order Ahead</span>
					</span>
				</a>

				<a href="/food-truck/" class="hp-callout callout-food-truck-menu">
					<span class="callout-icon"><img src="/wp-content/themes/tjs/images/icon-callout-food-truck-menu.svg"></span>
					<span class="callout-text">
						<span class="callout-text-tagline">TJ's in the community</span>
						<span class="callout-text-main font-alt">Food Truck Menu</span>
					</span>
				</a>

				<a href="/shop" class="hp-callout callout-merch">
					<span class="callout-icon"><img src="/wp-content/themes/tjs/images/icon-callout-shop-merch.svg"></span>
					<span class="callout-text">
						<span class="callout-text-tagline">shirts and stuff</span>
						<span class="callout-text-main font-alt">Shop TJs Merch</span>
					</span>
				</a>
			</div>

			<div class="content-area">
		        <div class="taste-of-oviedo-section">
		        	<img src="/wp-content/themes/tjs/images/img-taste-of-oviedo-award-1.png">

					<div class="taste-of-oviedo-text">
			        	<h1>Oviedo's Award-Winning Seafood Shack</h1>

			        	<p>Even though TJ's Seafood Shack is a casual seafood restaurant in the Orlando suburb of Oviedo, it is evident that the owners are serious about their business - winning the restaurant category of "Taste of Oviedo" every year since 2009!</p>

			        	<?php // echo do_shortcode('[ninja_form id=3]'); ?>

			        	<p><a href="/about" class="btn hp-callout-about"><i class="fas fa-utensils"></i> About TJs Seafood Shack</a></p>
			        </div>
		        </div>
			</div>

		</div>
	</div>

	<?php
		// ------------------------------- QUERIES ----
		// ----- WEEKLY SPECIALS QUERY ----
		$hp_specials_args = [
			'post_type' => 'specials',
//			'posts_per_page' => '7',
			'order' => 'DESC',
			'orderby' => 'date',
		];

		// The Query
		$hp_specials_query = new WP_Query( $hp_specials_args );

		// ------------------------------- WEEKLY SPECIALS -- ?>
		<a name="specials"></a>
		<div class="weekly-specials-container">
			<div class="weekly-specials">
				<div class="weekly-specials-heading">
					<h2>TJ’s Seafood Oviedo Weekly Specials</h2>
					<p class="font-alt"><i class="fas fa-calendar-alt fa-sm"></i> Closed Sundays</p>
				</div>

				<div class="weekly-specials-days">
					<?php
						$day = 1;
						if ( $hp_specials_query->have_posts() ) : while ($hp_specials_query->have_posts() ) : $hp_specials_query->the_post(); ?>

						<?php
							$special_meta = get_post_meta( $post->ID );
							$specials_day = date('N');
							?>

						<div class="weekly-specials-day day-<?php echo $day; ?> <?php if( $specials_day == $day && $specials_day < 6 ) { echo 'today'; } ?>">
							<h3><?php the_title(); ?></h3>
							<p><?php echo get_field('specials_description'); ?></p>
						</div>

						<?php $day++; ?>
						<?php wp_reset_postdata(); ?>
					<?php endwhile; else : ?>
					<?php endif; ?>

				</div>
			</div>
		</div>

<?php get_footer(); ?>
