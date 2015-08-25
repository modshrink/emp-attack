		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header>
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
			<footer>
				<div class="bookmark"><a href="<?php the_permalink(); ?>">Permalink</a></div>
				<div class="published">2015-07-07</div>
				<div class="tags"><?php the_tags(); ?></div>
			</footer>
		</article>
