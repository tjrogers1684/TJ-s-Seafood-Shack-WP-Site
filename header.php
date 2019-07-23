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
	<div class="specials-banner-wrap-outer">
	    <div class="specials-banner-wrap">
	        <div class="special-today">
				<p>Today’s Special: Kids Eat Free</p>
			</div>

			<a href="#" class="see-more-specials">See Weekly Specials</a>
	    </div><!-- END LOGIN SOCIAL WRAP -->
	</div><!-- END LOGIN SOCIAL WRAP OUTER -->

	<div class="header-wrap-outer">
	    <div class="header-wrap">
	        <p class="header-banner-social-menu">
				<a href="https://www.facebook.com/fromthegroundupincfl/"><i class="fab fa-facebook-square"></i></a>
				<a href="https://twitter.com/sodnrocks"><i class="fab fa-twitter-square"></i></a>
				<a href="https://www.youtube.com/channel/UCle7ByEOF7XT4nqK8StIwXg"><i class="fab fa-youtube"></i></a>
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
		    	<div class="subfeature">
		    		<p><img src="/wp-content/themes/tjs/images/feat-subpage-placeholder.jpg" alt="TJ's Seafood Shack"></p>
		    	</div>
		    </div>
		</div>
	<?php } ?>