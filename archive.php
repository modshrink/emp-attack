<?php get_header(); ?>

	<main role="main">
		<?php while ( have_posts() ) : the_post(); ?>
			<article class="hentry">
				<header>
					<h1 class="entry-title"><?php the_title(); ?></h1>
				</header>
				<div class="entry-content">
					<?php the_excerpt(); ?>
				</div>
				<footer>
					<div class="bookmark"><a href="<?php the_permalink(); ?>">Permalink</a></div>
					<div class="published">2015-07-07</div>
				</footer>
			</article>
		<?php endwhile; ?>
 		<?php wp_link_pages(); ?>
	</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
