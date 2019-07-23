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
				<?php
					$categories = wp_get_object_terms( $post->ID, 'category' );
					$post_meta = get_post_meta( $post->ID );
					//$post_uploads = get_field('news_article_uploads');

					//echo '<pre>'.print_r($post_upload, true).'</pre>';
				?>

				<h1 class="page-title"><?php the_title(); ?></h1>
				<p class="news-article-meta">Posted on <?php echo get_the_time( "F j, Y" );  ?> in
					<?php
						foreach ( $categories as $category ) {
					        echo '<span class="category-item">'.$category->name.'<span class="category-divider">, </span></span>';
					    }
					?>
				</p>

				<?php // ARTICLE MAIN IMAGE ?>
				<?php if ( has_post_thumbnail() ) : ?>
					<?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); ?>

				    <div class="news-article-main-image flt-right">
				    	<img src="<?php echo $featured_img_url; ?>" alt="">
				    </div>
				<?php endif; ?>

				<?php // ARTICLE TEXT ?>
				<?php the_content(); ?>

				<?php // ARTICLE GALLERY ?>
				<?php if( !empty(get_field( 'news_article_gallery' ) ) ) { ?>

					<div class="news-article-gallery">

						<h2>Article Gallery</h2>

					    <div class="news-article-gallery-grid">
							<?php
								$gallitems = get_field( 'news_article_gallery' );

								foreach ($gallitems as $item) {
									// echo '<pre>'.print_r($item, true).'</pre>';
									echo '<div class="news-article-gallery-image" style="background-image: url('.$item['url'].')">'.
										'<a rel=”lightbox” class="gallery-node-gallery-image-lightbox" href="'.$item['sizes']['large'].'">'.
										'</a>'.
										'</div>';

									// echo '<div class="news-article-gallery-image">'.
									// '<a rel=”lightbox” class="gallery-node-gallery-image-lightbox" href="'.$item['sizes']['large'].'">'.
									// '<img src="'.$item['sizes']['gallery-thumbnail'].'" />'.
									// '</a>'.
									// '</div>';
								}

							?>
					    </div>
					</div>
				<?php } ?>

				<?php // DOWNLOADS SECTION ?>
				<?php if( !empty(get_field( 'news_article_uploads' ) ) ) { ?>

					<div class="news-article-uploads-listing-container">

						<h2>Related Downloads</h2>

					    <div class="news-article-uploads-listing">
							<?php

								$post_uploads = get_field('news_article_uploads', $post->ID);

								if (have_rows('news_article_uploads')) {
								  while (have_rows('news_article_uploads')) { ?>

								    <?php
								    	the_row();
								    	$file = get_sub_field('news_article_upload');
								    ?>

									<?php if( !empty(get_sub_field( 'news_article_upload' ) ) ) { ?>
									    <div class="news-article-upload-item">
											<a href="<?php echo $file['url']; ?>" download> <i class="fas fa-file-alt"></i> <?php echo $file['title']; ?></a>
										</div>
									<?php } ?>
							<?php } } ?>

					    </div>
					</div>
				<?php } ?>

				<div class="news-article-social-share">
					<h2>Share This Article</h2>
					<?php echo do_shortcode( '[addtoany]' ); ?> 
				</div>

			<?php endwhile; ?><!-- PAGE MAIN QUERY -->
		</div>

	<?php } ?>

	<?php get_sidebar(); ?>

	<br class="clearfloat" />
</div>

<?php get_footer(); ?>