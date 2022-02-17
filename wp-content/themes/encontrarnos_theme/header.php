<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package encontrarnos_theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>


<?php wp_body_open();

?>

<div class="header-bar">
<a  href="#facebook"><i class="bi bi-facebook"></i></a>
<a href="#instragram"><i class="bi bi-instagram"></i></a>
<a class= "link-padding" href="#twitter"><i class="bi bi-twitter"></i></a>
</div>

<div class="content-wrapper">
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'encontrarnos_theme' ); ?></a>

		<header id="masthead" class="site-header">

			<figure><?php
				if ( function_exists( 'the_custom_logo' ) ) {
					the_custom_logo(); 
				}
			?></figure>

			<nav id="site-navigation" class="main-navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'encontrarnos_theme' ); ?></button>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
						'menu_class'     => 'menu'
					)
				);
				?>
			</nav><!-- #site-navigation -->

		</header><!-- #masthead -->
