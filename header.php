<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php wp_head(); ?>
</head>

<?php
$addl_body_classes = array();
$addl_body_classes[] = 'section-'.explode('/', $_SERVER['REQUEST_URI'])[1];
if( !empty(explode('/', $_SERVER['REQUEST_URI'])[2]) && !strstr(explode('/', $_SERVER['REQUEST_URI'])[2], '?') ){
	$addl_body_classes[] = 'section-'.explode('/', $_SERVER['REQUEST_URI'])[1].'-'.explode('/', $_SERVER['REQUEST_URI'])[2];
}

if ( !is_front_page() ) {
	$addl_body_classes[] = 'not-front';
}

if( !is_user_logged_in() ){ $addl_body_classes[] = 'not-logged-in'; }
?>

<body <?php body_class( $addl_body_classes ); ?>>
	<nav class="mobile-nav">
		<?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
	</nav>

	<?php // -------------- SPECIALS BANNER -- ?>
	<?php

		// ------------------------------- QUERIES ----
		// ----- WEEKLY SPECIALS QUERY ----
		$hp_specials_banner_args = [
			'post_type' => 'specials',
			'posts_per_page' => '7',
			'order' => 'DESC',
			'orderby' => 'date',
		];

		// The Query
		$hp_specials_banner_query = new WP_Query( $hp_specials_banner_args );

	?>

	<div class="specials-banner-wrap-outer">
	    <div class="specials-banner-wrap">
			<?php
				$day = 0;
				if ( $hp_specials_banner_query->have_posts() ) : while ($hp_specials_banner_query->have_posts() ) : $hp_specials_banner_query->the_post(); ?>

				<?php
					$post_meta = get_post_meta( $post->ID );
					$specials_day = date('N');
					//$specials_day = 4;
					$excerpt = get_the_excerpt();
					$excerpt = wp_strip_all_tags($excerpt);

					//$specials_day = 4;

					$day ++;
				?>

				<div class="special-today day-<?php echo $day; ?> <?php if( $specials_day == $day ) { echo 'today'; } ?>">
					<p>Today's Special: <?php echo $excerpt; ?></p>
				</div>

				<?php endwhile; else : ?>
				<?php endif; ?>

				<a href="#specials" class="see-more-specials">See Weekly Specials</a>

		</div><!-- END SPECIALS BANNER WRAP -->
	</div><!-- END SPECIALS BANNERL WRAP OUTER -->

	<div class="header-wrap-outer">
	    <div class="header-wrap">
	        <p class="header-banner-social-menu">
				<a href="https://www.facebook.com/tjsseafoodshack"><i class="fab fa-facebook-square"></i></a>
				<a href="https://twitter.com/tjsseafood"><i class="fab fa-twitter-square"></i></a>
				<a href="#"><i class="fab fa-youtube"></i></a>
			</p>

	        <a href="/" class="site-logo"><img src="/wp-content/themes/tjs/images/site-logo.png" alt="TJs Seafood Shack"></a>

	        <div class="header-contact-wrap">
	        	<div class="header-contact-address">
	        		<p>
	        			197 E. Mitchell Hammock Rd<br/>
	        			Oviedo, FL 32765
	        		</p>
	        	</div>

	        	<div class="header-contact-phone-hours">
	        	<p>
	        		<span class="header-contact-phone">407-365-3365</span>
	        		<span class="header-contact-hours">M-F: 11am-9pm, Closed Sunday</span>
	        	</p>
	        	</div>
	        </div>

	        <nav class="top-nav">
	            <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
	        </nav>
	        <a class="mobile-nav-activate" href="#mobilenav"><i class="fa fa-bars"></i> Menu</a>
	        <a class="mobile-nav-close" href="#mobilenavclose"><i class="fa fa-times"></i> Close</a>

	    </div><!-- END HEADER WRAP -->
	</div><!-- END HEADER WRAP OUTER -->

	<?php if ( is_front_page() ) { ?>
    	<div class="feature-wrap-outer">
    		<div class="feature-wrap">
				<div class="floating-image-container shrimp">
		    		<img class="line-icon-shrimp-1" src="/wp-content/themes/tjs/images/line-icon-shrimp.png">
		    		<img class="line-icon-shrimp-2" src="/wp-content/themes/tjs/images/line-icon-shrimp.png">
		    	</div>

	    		<div class="feature feat-hp">
		    		<p class="tagline"><span>Seafood Galore</span>& a whole lot more!</p>
		    	</div>
	    	</div>

	    	<div class="floating-image-container lemon">
	    		<img class="line-icon-lemon" src="/wp-content/themes/tjs/images/line-icon-lemon.png">
	    	</div>
    	</div>

    <?php } else { ?>
    	<div class="feature-wrap-outer">
    		<div class="feature-wrap">
				<div class="floating-image-container shrimp">
		    		<img class="line-icon-shrimp-1" src="/wp-content/themes/tjs/images/line-icon-shrimp.png">
		    		<img class="line-icon-shrimp-2" src="/wp-content/themes/tjs/images/line-icon-shrimp.png">
		    	</div>

	    		<div class="subfeature feat-hp">
		    		<p>&nbsp;</p>
		    	</div>
	    	</div>

	    	<div class="floating-image-container lemon">
	    		<img class="line-icon-lemon" src="/wp-content/themes/tjs/images/line-icon-lemon.png">
	    	</div>
    	</div>
	<?php } ?>