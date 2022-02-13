<?php 
/*
Template Name: Páginas Útiles
*/
get_header();
?>

<main id="primary" class="site-main">
		<?php
		while ( have_posts() ) :
			the_post();
			?>
			<div class="table">
			<h6 class= "table__title-1">Categoría</h6>
			<h6 class= "table__title-2">Productos y servicios de Genealogía</h6>
			<h6 class= "table__title-3">Descripción</h6>
			<?php get_template_part( './src/custom-parts/template', 'acf_pags-utiles' );?> 
			</div>       
		<?php 
		endwhile; // End of the loop.
		?>
	</main><!-- #main -->

<?php get_footer(); ?>