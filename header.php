<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php if ( is_singular() ) wp_enqueue_script( "comment-reply" ); ?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<header class="global" role="banner">
		<p class="site-description">
			<?php
			if( !get_bloginfo( 'description' ) ) :
				_e( 'The Only Neat Thing to Do', 'emp-attack' );
			else :
				bloginfo( 'description' );
			endif;
			?>
		</p>
		<p class="theme-poweredby">Powerd by <a href="#">EMP theme</a> Version 0.0.1</p>
	</header>
