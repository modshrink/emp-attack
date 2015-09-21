		<article id="post-<?php the_ID(); ?>" <?php post_class( array( 'article' ) ); ?>>
			<header class="article__header">
				<div class="published"><?php echo get_the_date( 'Y-m-d' );?></div>
				<h1 class="article__header__title"><?php the_title(); ?></h1>
			</header>
			<div class="article__content">
			<?php if ( has_post_thumbnail() ) : ?>
				<figure class="article__content__thumbnail">
				<?php the_post_thumbnail( 'thumbnail' ); ?>
				</figure>
			<?php endif; ?>

			<?php if( is_home() ): ?>
				<?php the_excerpt(); ?>
			<?php else: ?>
				<?php the_content(); ?>
			<?php endif; ?>
			</div>
			<footer class="article__footer">
				<div class="bookmark"><a href="<?php the_permalink(); ?>">Permalink</a></div>
				<div class="published">Last modified: <?php the_modified_time( 'Y-m-d' );?></div>
				<div class="tags"><?php the_tags(); ?></div>
			</footer>
		</article>
