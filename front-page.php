<?php get_header(); ?>

	<main class="main" role="main">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'template-parts/content', 'index' ); ?>
		<?php endwhile; ?>
		<nav class="paginate">
		</div>
	</main>
	<?php echo paginate_links(); ?>

<?php get_footer(); ?>
