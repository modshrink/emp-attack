		<article id="post-<?php the_ID(); ?>" <?php post_class( array( 'article' ) ); ?>>
			<header class="article__header">
				<h1 class="article__header__title"><?php the_title(); ?></h1>
			</header>
			<div class="article__conent">
				<?php the_content(); ?>
			</div>
			<footer class="article__footer">
				<div class="bookmark"><a href="<?php the_permalink(); ?>">Permalink</a></div>
				<div class="published"><?php echo get_the_date( 'Y-m-d' ); ?></div>
				<div class="tags"><?php the_tags(); ?></div>
			</footer>
		</article>
