<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package encontrarnos_theme
 */

get_header();
?>

<section>
	
<h3 class="title title--left"><span class="title__span title__span--green"></span>Nuestra Misión</h3>

</section>

<h3 class="title"><span class="title__span"></span>Integrantes</h3>

<section class="card-wrapper">


		<?php if ( have_posts() ) : ?>

			<header class="page-header">
			</header><!-- .page-header -->
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();?>
			<div class="card">
			<img src="<?php the_post_thumbnail_url(); ?>" class="card__img"></img>
			<a href= <?php the_permalink(); ?>><h5 class= "card__title"> <?php the_title();?> </h5></a>
			<div class="text-wrapper">
			<?php get_template_part( './src/custom-parts/template', 'acf_equipo' );?>
			<p class= "card__text"><?php the_excerpt(); ?> </p>
			</div>
			</div>
			<?php endwhile;
			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
</section>
</div>
<?php

get_footer();