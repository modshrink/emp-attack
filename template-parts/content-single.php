		<article id="post-<?php the_ID(); ?>" <?php post_class( array( 'article', 'has_icon' ) ); ?>>
			<header class="article__header">
				<div class="published"><?php emp::the_date(); ?></div>
				<h1 class="article__header__title"><?php the_title(); ?></h1>
			</header>
			<div class="article__content">
				<?php the_content(); ?>
			</div>
			<footer class="article__footer">
				<div class="bookmark"><span class="article__footer__title"><?php printf( __( 'Permalink: %s' ), '</span><a href="' . get_the_permalink() . '">' . get_the_permalink() . '</a>' ); ?></div>
				<div class="published"><span class="article__footer__title"><?php _e( 'Last updated' ); ?>: </span><?php emp::the_modified();?></div>
				<div class="tags"><span class="article__footer__title"><?php _e( 'Tags' ); ?>: </span><?php the_tags( '' ); ?></div>
			</footer>
			<?php if( get_adjacent_post() || get_adjacent_post( '', '', false ) ): ?>
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
