		<article id="post-<?php the_ID(); ?>" <?php post_class( array( 'article' ) ); ?>>
			<header class="article__header">
				<div class="published"><?php emp::the_date(); ?></div>
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
				<div class="published">Last modified: <?php emp::the_modified();?></div>
				<div class="tags"><?php the_tags(); ?></div>
			</footer>
			<?php if( !is_sticky() && ( get_adjacent_post() || get_adjacent_post( '', '', false ) ) ): ?>
			<div class ="article__pagination">
				<?php if( get_adjacent_post() ) : ?>
				<div class="article__pagination__previous">
				<?php emp::get_post_pagination(); ?>
				</div> <!-- article__pagination__previous -->
				<?php endif; ?>
				<?php if( get_adjacent_post( '', '', false ) ) : ?>
				<div class="article__pagination__next">
				<?php emp::get_post_pagination( false ); ?>
				</div> <!-- article__pagination__next -->
				<?php endif; ?>
			</div> <!-- article__pagination -->
			<?php endif; ?>
		</article>
