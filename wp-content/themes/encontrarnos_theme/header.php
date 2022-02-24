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


// VARIABLES LOGO

$custom_logo_id = get_theme_mod( 'custom_logo' );
$image = wp_get_attachment_image_src( $custom_logo_id , 'logo-lg'); 

$image_width = $image[1];
$image_height = $image[2];

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

<?php wp_body_open(); ?>

<!-- NAV -->
<nav id="site-navigation" class="main-navigation">
	<!-- HEADER TOP BAR -->
	<div class="header-bar">
		<!-- MENU MOBILE -->
		<div>
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="bi bi-list"></button></i>
		</div>
		<!-- END MENU MOBILE -->
		<!-- RSS -->
		<div class= "header-rss">
			<a  href= "<?php the_field('facebook', 'options');?>"><i class="bi bi-facebook"></i></a>
			<a href= "<?php the_field('instagram', 'options');?>"><i class="bi bi-instagram"></i></a>
			<a class= "link-padding" href="<?php the_field('twitter', 'options');?>"><i class="bi bi-twitter"></i></a>
		</div>
		<!-- END RSS -->
	</div>
	<!-- END HEADER TOP BAR -->

	<!-- CONTENT WRAPPER -->
	<div class="content-wrapper">
		<div id="page" class="site">
			<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'encontrarnos_theme' ); ?></a>
			<header id="masthead" class="site-header">
				<!-- LOGO -->
				<a href= "<?php echo home_url(); ?>"><figure class= "logo--menu"><img src= "<?php echo $image[0] ?>" width= "<?php echo $image_width ?>" height= "<?php echo $image_height ?> "></figure></a>
				<!-- END LOGO -->
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
						'menu_class'     => 'menu'
					)
				);
				?>
		</nav>
			<!-- END NAV -->
</header>
