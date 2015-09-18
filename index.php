<?php
/**
 * このテーマでは, index.phpで404ステータス・ヘッダを出力します。
 */

status_header( 404 ); get_header(); ?>

	<main role="main">
			<article class="hentry">
				<header>
					<h1 class="entry-title">404 Page Not Found</h1>
				</header>
				<div class="entry-content">
					<p>We can't find your request page.</p>
				</div>
			</article>
	</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
