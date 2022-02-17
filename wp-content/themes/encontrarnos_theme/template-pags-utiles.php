<?php 
/*
Template Name: Páginas Útiles
*/
get_header();
?>

</div>
</div>

<?php 
$img_data = get_field('imagen-pu', 'options');
$img_url = $img_data['sizes']['hero-img'];
$img_width = $img_data['sizes']['hero-img-width'];
$img_height = $img_data['sizes']['hero-img-height'];
$img_alt = $img_data['alt'];
?> 


<main id="primary" class="site-main">

	
<div class="hero__bg">
<div class="content-wrapper hero">
<div class="hero__text">
<h1 class= "title title--left"><?php the_field('titulo-pu', 'options'); ?></h1>
<?php the_field('descripcion-pu', 'options'); ?>
</div>

<img class= 'hero__img' src= '<?php echo $img_url; ?> ' width= " <?php echo $img_width;?>" height= '<?php echo $img_height ; ?>' alt= '<?php echo $img_alt ?>'>


</div>
</div>
<div class="content-wrapper">

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