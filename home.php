<?php
// ---------------------------------------------------------------------------------
// ----- NEWS LANDING TEMPLATE -----------------------------------------------------
// ---------------------------------------------------------------------------------
get_header(); ?>

<?php if( isset($_GET['pid']) ){ $posttype = get_post( $_GET['pid'] )->post_type; } ?>

<div class="content-wrap">

	<?php if ( have_posts() ) { ?>

	    <div class="content-area <?php if ( is_active_sidebar( 'right_sidebar' ) ) { echo 'has-sidebar'; } ?>">

	    	<h1>NCS News Desk</h1>

			<?php while ( have_posts() ) : the_post(); ?>
				<?php
					$categories = wp_get_object_terms( $post->ID, 'category' );
				?>

				<div class="news-item">
					<h2 class="news-item-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<p class="news-item-meta">Posted on <?php echo get_the_time( "F j, Y" );  ?> in
						<?php 
							foreach ( $categories as $category ) {
						        echo '<span class="category-item">'.$category->name.'<span class="category-divider">, </span></span>';
						    }
						?>
					</p>
				</div>

			<?php endwhile; ?><!-- PAGE MAIN QUERY -->

			<div class="pagination members-pagination">
			    <?php
			        echo paginate_links( array(
			            'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
			            'current'      => max( 1, get_query_var( 'paged' ) ),
			            'format'       => '?paged=%#%',
			            'show_all'     => false,
			            'type'         => 'plain',
			            'end_size'     => 2,
			            'mid_size'     => 1,
			            'prev_next'    => true,
			            'prev_text'    => sprintf( '<i></i> %1$s', __( ' <i class="fas fa-chevron-left"></i> Prev', 'text-domain' ) ),
			            'next_text'    => sprintf( '%1$s <i></i>', __( 'Next <i class="fas fa-chevron-right"></i>', 'text-domain' ) ),
			            'add_args'     => false,
			            'add_fragment' => '',
			        ) );
			    ?>
			</div>
		</div>

	<?php } ?>

	<?php get_sidebar(); ?>

	<br class="clearfloat" />
</div>

<?php get_footer(); ?>