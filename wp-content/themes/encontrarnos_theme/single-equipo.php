<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package encontrarnos_theme
 */

get_header();
?>

	<main id="primary" class="site-main">
	<div class= "prueba">
		<?php
		while ( have_posts() ) :
			the_post(); ?>
			
			<div class="card-wrapper--modal">
			<div class="card card--maxw">
			<img src="<?php the_post_thumbnail_url('card-img-team'); ?>" class="card__img--br"></img>
			<h5 class= "card__title"> <?php the_title();?> </h5>

			<div class="card__text-wrapper">
			<?php get_template_part( './src/custom-parts/template', 'acf_equipo' );?>
			<p class= "card__text"><?php the_content(); ?> </p>
			</div>
			</div>
			</div>

			</div>


		<?php endwhile; // End of the loop.
		?>

	</main><!-- #main -->

	<?php get_template_part( './src/custom-parts/template', 'acf_equipo' );?>

	</div>
<?php

get_footer();

?>