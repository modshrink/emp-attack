<?php get_header(); ?>

	<main role="main">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'template-parts/content', 'single' ); ?>
		<?php endwhile; ?>
		<nav class="paginate">
		<?php echo paginate_links(); ?>
		</div>
	</main>

<?php get_footer(); ?>
