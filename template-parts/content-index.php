		<article id="post-<?php the_ID(); ?>" <?php post_class( array( 'article', 'has_icon' ) ); ?>>

			<header class="article__header">
			<?php if ( has_post_thumbnail() ) : ?>
				<figure class="article__thumbnail">
				<?php the_post_thumbnail( 'thumbnail' ); ?>
				</figure>
			<?php endif; ?>
				<h1 class="article__header__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
			</header>
			<div class="article__content">
			<?php if( has_post_thumbnail() ): ?>
				<?php emp::the_excerpt( 20 ); ?>
			<?php else: ?>
				<?php emp::the_excerpt( 30 ); ?>
			<?php endif; ?>
			</div>
			<footer class="article__footer">
				<div class="bookmark"><span class="article__footer__title"><?php printf( __( 'Permalink: %s' ), '</span><a href="' . get_the_permalink() . '">' . get_the_permalink() . '</a>' ); ?></div>
				<div class="published"><span class="article__footer__title"><?php _e( 'Last updated' ); ?>: </span><?php emp::the_modified();?></div>
				<div class="tags"><span class="article__footer__title"><?php _e( 'Tags' ); ?>: </span><?php the_tags( '' ); ?></div>
			</footer>
		</article>
