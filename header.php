<?php

// =====================================================================================
// HEADER.PHP
// -------------------------------------------------------------------------------------
// Plantilla base para el <head> y apertura del <body> (<header>)
// =====================================================================================

?>

<!DOCTYPE html>
<html>
	<head>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<?php  wp_body_open(); ?>
		<header>
			<?php if( ! is_home() ) : ?>
				<a href="<?php echo home_url(); ?>">
			<?php endif; ?>
					<img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/logo.png' ) ) ?>" width="160" alt="logo">
			<?php if( ! is_home() ) : ?>
				</a>
			<?php endif; ?>
			<nav>
				<?php wp_nav_menu( array( 'theme_location' => 'primary-menu' ) ); ?>
			</nav>
			<?php get_search_form(); ?>
		</header>
