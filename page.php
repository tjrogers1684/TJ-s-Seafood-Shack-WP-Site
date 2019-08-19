<?php
// ---------------------------------------------------------------------------------
// ----- GENERIC PAGE THEME --------------------------------------------------------
// ---------------------------------------------------------------------------------
get_header(); ?>

<?php if( isset($_GET['pid']) ){ $posttype = get_post( $_GET['pid'] )->post_type; } ?>

<!-- REVIEW [OTHER PLATFORMS] CALLOUT -->
<?php if ( is_page(9) ) { ?>
	<div class="review-platforms-conatiner">

		<h2>We'd love to hear from you! <span> Review TJ's Seafood Shack on these platforms</span></h2>

		<p class="review-platforms">
			<a href="https://www.yelp.com/biz/tjs-seafood-shack-oviedo"><img class="footer-review-site review-yelp" src="/wp-content/themes/tjs/images/icon-yelp.svg" alt=""></a>
			<a href="https://www.google.com/search?q=tjs+seafood+shack+orlando&rlz=1C5CHFA_enUS721US721&oq=tjs+seafood+shack+orlando&aqs=chrome..69i57j69i64l3j69i60l2.8631j1j4&sourceid=chrome&ie=UTF-8#lrd=0x88e767d097120473:0x5b2adada89dfb423,1,,,"><img class="footer-review-site review-google" src="/wp-content/themes/tjs/images/icon-google-logo-black.svg" alt=""></a>
			<a href="https://www.tripadvisor.com/Restaurant_Review-g34521-d1913393-Reviews-TJ_s_Seafood_Shack-Oviedo_Florida.html"><img class="footer-review-site review-trip-advisor" src="/wp-content/themes/tjs/images/tripadvisor-black.svg" alt=""></a>
		</p>
	</div>
<?php } ?>

<div class="content-wrap">
	<div class="floating-image-hidden-container">
		<img class="floating-image line-icon-shells-small" src="/wp-content/themes/tjs/images/line-icon-shells-small.png">
		<img class="floating-image line-icon-shells-large" src="/wp-content/themes/tjs/images/line-icon-shells-large.png">
	</div>

	<?php if ( have_posts() ) { ?>

	    <div class="content-area <?php if ( is_active_sidebar( 'right_sidebar' ) ) { echo 'has-sidebar'; } ?>">

			<?php while ( have_posts() ) : the_post(); ?>

				<h1 class="page-title"><?php the_title(); ?></h1>

				<?php // echo do_shortcode('[ninja_form id=3]'); ?>

				<?php the_content(); ?>
			<?php endwhile; ?><!-- PAGE MAIN QUERY -->
		</div>

	<?php } ?>

	<?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>