<?php get_header(); ?>

	<main class="main" role="main">
	<?php while ( have_posts() ) : the_post(); ?>

		<?php if( get_post_format() == 'aside' ) : ?>
				<?php get_template_part( 'template-parts/aside', 'single' ); ?>
		<?php else : ?>
				<?php get_template_part( 'template-parts/content', 'single' ); ?>
		<?php endif; ?>
		<?php
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
		?>

	<?php endwhile; ?>
	</main>
	<?php posts_nav_link(); ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
