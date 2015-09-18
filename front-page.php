<?php get_header(); ?>

	<main role="main">
		<?php while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header>
					<div class="published"><?php echo get_the_date( 'Y-m-d' );?></div>
					<h1 class="entry-title"><?php the_title(); ?></h1>
				</header>
				<div class="entry-content">
					<?php if ( has_post_thumbnail() ) : ?>
						<figure class="thumbnail">
						<?php the_post_thumbnail( 'thumbnail' ); ?>
						</figure>
					<?php endif; ?>
					<?php the_excerpt(); ?>
				</div>
				<footer>
					<ul>
						<li class="bookmark"><a href="<?php the_permalink(); ?>">Permalink</a></li>
						<li class="published">Last modified: <?php the_modified_time( 'Y-m-d' );?></li>
					</ul>
				</footer>
			</article>
		<?php endwhile; ?>
		<nav class="paginate">
		<?php echo paginate_links(); ?>
		</div>
	</main>

<?php get_footer(); ?>
