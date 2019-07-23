<?php if ( is_active_sidebar( 'right_sidebar' ) ) { ?>
	<?php echo '<div class="sidebar-area">'; ?>
	<?php dynamic_sidebar( 'right_sidebar' ); ?>

	<?php echo '</div>'; ?>
<?php } ?>