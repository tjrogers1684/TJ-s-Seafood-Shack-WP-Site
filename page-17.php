<?php
// ---------------------------------------------------------------------------------
// ----- MENU PAGE -----------------------------------------------------------------
// ---------------------------------------------------------------------------------
get_header();

?>

<?php $menu_types = get_terms('menu_item_type', array('hide_empty' => 0, 'parent' =>0)); foreach($menu_types as $menu_type) : ?>

	<?php

		$term_slug = $menu_type->slug;

		//echo '<pre>'. print_r( $menu_type, true) .'</pre>';
		echo '<p>'. $term_slug .'</p>';

		// ----- STEM ARTICLES QUERY ----
	$menu_items_listing_args = [
		'post_type' => 'menu_item',
		'orderby'	=> 'title',
		'order'		=> 'ASC',
		'posts_per_page' => 600,
		'tax_query' => array(
	        array(
	            'taxonomy' => 'menu_item_type',
	            'field'    => 'slug',
	            'terms'    => $term_slug,
	            'compare' => '=',
	        ),
	    ),
	];

	// The Query
	$menu_items_listing_query = new WP_Query( $menu_items_listing_args );

	?>

<?php
	endforeach;
?>




<?php if( isset($_GET['pid']) ){ $posttype = get_post( $_GET['pid'] )->post_type; } ?>

<div class="content-wrap">

	<?php if ( have_posts() ) { ?>

	    <div class="content-area <?php if ( is_active_sidebar( 'right_sidebar' ) ) { echo 'has-sidebar'; } ?>">

			<?php while ( have_posts() ) : the_post(); ?>

				<h1 class="page-title"><?php the_title(); ?></h1>

				<?php the_content(); ?>
			<?php endwhile; ?><!-- PAGE MAIN QUERY -->

			<!-- ARTICLES LISTING -->
			<div class="academic-links-listing-container">

				<div class="academic-links-listing">

					<?php if ( $menu_items_listing_query->have_posts() ) : while ($menu_items_listing_query->have_posts() ) : $menu_items_listing_query->the_post(); ?>

						<?php
							$title  = the_title('','',false);
							$post_meta = get_post_meta( $post->ID );
							//$link_url = get_field('link_url');

							echo $link_url;
							echo '<pre>'.print_r($post_meta, true).'</pre>';
							$categories = wp_get_object_terms( $post->ID, 'resource_link_categories' );
							echo '<pre>'.print_r($categories, true).'</pre>';

							// foreach ( $categories as $category ) {
						 //        echo '<span class="category-item">'.$category->name;
						 //    }
						?>

						<div class="link-item">
							<h2 class="link-item-title"><?php the_title(); ?></h2>
						</div>

					<?php endwhile; ?>

					<?php wp_reset_postdata(); ?>

					<?php endif; ?>

				</div><!-- END MEMBERS LISTING -->
			</div><!-- END MEMBERS LISTING CONTAINER -->
		</div><!-- END CONTENT AREA -->

	<?php } ?>

	<?php get_sidebar(); ?>

	<br class="clearfloat" />
</div><!-- END CONTENT WRAP -->

<?php get_footer(); ?>