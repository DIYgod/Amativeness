<?php get_header(); ?>
	<div class="main" id="thumbs">
		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'wzpage', get_post_format() ); ?>
			<?php endwhile; ?>
		<?php else : ?>
			<article id="post-0" class="block post">

			<?php if ( current_user_can( 'edit_posts' ) ) :
				// Show a different message to a logged-in user who can add posts.
			?>
				<header class="entry-header">
					<p class="title"><?php _e( 'No posts to display', 'amativeness' ); ?></p>
				</header>

				<div class="entry-content">
					<p><?php printf( __( 'Ready to publish your first post? <a href="%s">Get started here</a>.', 'amativeness' ), admin_url( 'post-new.php' ) ); ?></p>
				</div><!-- .entry-content -->

			<?php else :
				// Show the default message to everyone else.
			?>
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Nothing Found', 'amativeness' ); ?></h1>
				</header>
				<div class="entry-content">
					<p><?php _e( 'Apologies, but no results were found. Perhaps searching will help find a related post.', 'amativeness' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .entry-content -->
			<?php endif; // end current_user_can() check ?>
			</article><!-- #post-0 -->
		<?php endif; // end have_posts() check ?>
	</div><!-- main -->
	<?php get_sidebar(); ?>	
	<div id="pagination">
	<?php next_posts_link(__('点击加载更多')); ?>
	</div>
</div><!-- #main .wrapper -->
</div>
<?php get_footer(); ?>