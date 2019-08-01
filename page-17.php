<?php
// ---------------------------------------------------------------------------------
// ----- MENU PAGE -----------------------------------------------------------------
// ---------------------------------------------------------------------------------
get_header();

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
					<?php $menu_types = get_terms('menu_item_type', array('hide_empty' => 0, 'parent' =>0)); foreach($menu_types as $menu_type) : ?>

						<?php

							$term_slug = $menu_type->slug;

							//echo '<pre>'. print_r( $menu_type, true) .'</pre>';
							echo '<p>'. $term_slug .'</p>';

							// ----- STEM ARTICLES QUERY ----
							// $menu_items_listing_args = [
							// 	'post_type' => 'menu_item',
							// 	'orderby'	=> 'title',
							// 	'order'		=> 'ASC',
							// 	'posts_per_page' => 600,
							// 	'tax_query' => array(
							//         array(
							//             'taxonomy' => 'menu_item_type',
							//             'field'    => 'slug',
							//             'terms'    => $term_slug,
							//         ),
							//     ),
							// ];

							$post_args = array(
								'posts_per_page' => 50,
								'post_type' => 'menu_item', // you can change it according to your custom post type
								'tax_query' => array(
									array(
										'taxonomy' => 'menu_item_type', // you can change it according to your taxonomy
										'field' => 'slug', // this can be 'term_id', 'slug' & 'name'
										'terms' => $term_slug,
									)
								)
							);

							// The Query
							//$menu_items_listing_query = new WP_Query( $menu_items_listing_args );

							$myposts = get_posts($post_args);

						?>

					<?php foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
						<div class="link-item">
							<h2 class="link-item-title"><?php the_title(); ?></h2>
						</div>
					<?php endforeach; // Term Post foreach ?>

					<?php wp_reset_postdata(); ?>

					<?php endforeach; // End Term foreach; ?> 

				</div><!-- END MEMBERS LISTING -->
			</div><!-- END MEMBERS LISTING CONTAINER -->
		</div><!-- END CONTENT AREA -->

	<?php } ?>

	<?php get_sidebar(); ?>

	<br class="clearfloat" />
</div><!-- END CONTENT WRAP -->

<?php get_footer(); ?>