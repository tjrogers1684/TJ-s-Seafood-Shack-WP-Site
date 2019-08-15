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

			<?php endwhile; ?><!-- PAGE MAIN QUERY -->

			<?php //echo do_shortcode('[ninja_form id=3]'); ?>

			<!-- ARTICLES LISTING -->
			<div class="menu-items-categories-container">

				<?php $menu_types = get_terms('menu_item_type', array('hide_empty' => 0, 'parent' =>0)); foreach($menu_types as $menu_type) : ?>

					<?php

						// ---- CATEGORY VARIABLES --
						$category_slug = $menu_type->slug;
						$category_name = $menu_type->name;

						//echo '<pre>'. print_r( $menu_type, true) .'</pre>';
						//echo '<p>'. $term_slug .'</p>';

						$menu_item_args = array(
							'posts_per_page' => 100,
							'post_type' => 'menu_item', // you can change it according to your custom post type
							'tax_query' => array(
								array(
									'taxonomy' => 'menu_item_type', // you can change it according to your taxonomy
									'field' => 'slug', // this can be 'term_id', 'slug' & 'name'
									'terms' => $category_slug,
								)
							)
						);

						// The Query
						//$menu_items_listing_query = new WP_Query( $menu_items_listing_args );

						$menu_items = get_posts($menu_item_args);

						// ---- CATEGORY VARIABLES --
						foreach ( $menu_items as $post ) : setup_postdata( $post );
								$post_meta = get_post_meta($post->ID);

								//echo '<pre>'. print_r( $post_meta, true) .'</pre>';
						endforeach;

					?>

					<div class="menu-items-category <?php echo $category_slug; ?>">
						<h2><?php echo $category_name ?></h2>

						<div class="menu-items-listing">
							<?php foreach ( $menu_items as $post ) : setup_postdata( $post ); ?>
								<?php
									$post_meta = get_post_meta($post->ID);
									$new_item = get_field('item_info_group_menu_item_type_new_menu_item');
									$featured_item = get_field('item_info_group_menu_item_type_featured_menu_item');
									$featured_img = get_the_post_thumbnail_url(get_the_ID(),'full');

									//echo '<pre>'. print_r( $new, true) .'</pre>';
								?>

								<div class="menu-item<?php if( $new_item == 1 ) { echo ' new-item'; } ?><?php if( $featured_item == 1 ) { echo ' featured-item'; } ?>">
									<?php if( $new_item == 1 ) { ?>
										<p class="new-item-banner">New</p>
									<?php } ?>

									<?php if( $featured_item == 1 ) { ?>
										<p class="featured-item-image"><img src="<?php echo $featured_img; ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>"></p>
									<?php } ?>

									<h3 class="menu-item-title"><?php the_title(); ?></h3>

									<?php the_excerpt(); ?>
								</div>
							<?php endforeach; // Term Menu Item foreach ?>

							<?php wp_reset_postdata(); ?>
						</div><?php // END MENU ITEMS LISTING ?>

					</div><?php // END MENU CATEGORY ?>

				<?php endforeach; // End Category foreach; ?> 

			</div><?php // END MENU CATEGORIES CONTAINER ?>
		</div><?php // END CONTENT AREA ?>

	<?php } ?>

	<?php get_sidebar(); ?>

	<br class="clearfloat" />
</div><!-- END CONTENT WRAP -->

<?php get_footer(); ?>