		<article id="post-<?php the_ID(); ?>" <?php post_class( array( 'article' ) ); ?>>
			<header class="article__header">
				<h1 class="article__header__title"><?php the_title(); ?></h1>
			</header>
			<div class="article__content">
			<?php if ( has_post_thumbnail() ) : ?>
				<figure class="article__content__thumbnail">
				<?php the_post_thumbnail( 'thumbnail' ); ?>
				</figure>
			<?php endif; ?>

			<?php if( has_post_thumbnail() ): ?>
				<?php emp::the_excerpt( 20 ); ?>
			<?php else: ?>
				<?php emp::the_excerpt( 200 ); ?>
			<?php endif; ?>
			</div>
		</article>
