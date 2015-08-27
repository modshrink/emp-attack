		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header>
			</header>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
			<footer>
				<div class="bookmark"><a href="<?php the_permalink(); ?>">Permalink</a></div>
				<div class="published"><?php echo get_the_date( 'Y-m-d' ); ?></div>
				<div class="tags"><?php the_tags(); ?></div>
				<div class="post-format"><?php echo get_post_format(); ?></div>
			</footer>
		</article>
