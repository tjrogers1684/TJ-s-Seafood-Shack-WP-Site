<?php
// ---------------------------------------------------------------------------------
// ----- GENERIC PAGE THEME --------------------------------------------------------
// ---------------------------------------------------------------------------------
get_header(); ?>

<?php if( isset($_GET['pid']) ){ $posttype = get_post( $_GET['pid'] )->post_type; } ?>

<div class="content-wrap">

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