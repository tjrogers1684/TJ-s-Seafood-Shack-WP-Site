<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

<div class="header-stripe-store">
	<p class="store-cart-info"><a class="cart-customlocation" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><i class="fa fa-shopping-cart"></i> <?php echo sprintf ( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?> - <span class="store-header-cart-total"><?php echo WC()->cart->get_cart_total(); ?></span></a>
	</p>
</div>

<?php if( isset($_GET['pid']) ){ $posttype = get_post( $_GET['pid'] )->post_type; } ?>


	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		// do_action( 'woocommerce_before_main_content' );
	?>

	<div class="content-wrap">
		<div class="floating-image-hidden-container">
			<img class="floating-image line-icon-shells-small" src="/wp-content/themes/tjs/images/line-icon-shells-small.png">
			<img class="floating-image line-icon-shells-large" src="/wp-content/themes/tjs/images/line-icon-shells-large.png">
		</div>

		<div class="content-area <?php if ( is_active_sidebar( 'right_sidebar' ) ) { echo 'has-sidebar'; } ?>">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php wc_get_template_part( 'content', 'single-product' ); ?>

			<?php endwhile; // end of the loop. ?>

		</div>

	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

	<?php
		/**
		 * woocommerce_sidebar hook.
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		//do_action( 'woocommerce_sidebar' );
	?>

<?php get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
