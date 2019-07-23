<?php get_header(); ?>

<div class="content-wrap">

	<div class="content-area">

		<?php if ( have_posts() ) : while (have_posts() ) : the_post(); ?>

			<h1 class="title" id="page-title"><?php the_title(); ?></h1>
			<?php the_content(); ?>

		<?php endwhile; else : ?>

			<?php // do something else ?>

		<?php endif; ?>

	</div>

</div>

<?php get_footer(); ?>