<?php 
/*
Template Name: Glosario
*/

get_header();
?>

</div>
</div>

	
<div class="hero__bg">
<div class="content-wrapper hero">
<div class="hero__text">
<h1 class= "title title--left"><?php the_field('titulo-g', 'options'); ?></h1>
<?php the_field('descripcion-g', 'options'); ?>
</div>

<img class= 'hero__img' src= '<?php the_field('imagen-g', 'options'); ?>'>


</div>
</div>
<div class="content-wrapper">

	<main id="primary" class="site-main">
		<?php
		while ( have_posts() ) :
			the_post();
			?>
			<div class="table">
			<h6 class= "table__title-1">Término</h6>
			<h6 class= "table__title-2">Abreviatura</h6>
			<h6 class= "table__title-3">Descripción</h6>
			<?php get_template_part( './src/custom-parts/template', 'acf_glosario' );?> 
			</div>       
		<?php 
		endwhile; // End of the loop.
		?>
	</main><!-- #main -->

<?php get_footer(); ?>


