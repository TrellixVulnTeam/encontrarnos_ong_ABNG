<?php 
/*
Template Name: Páginas Útiles
*/
get_header();

?>

</div>
</div> 
<!-- END CONTENT WRAPPER -->

<?php 

// VARIABLES HERO
$img_data = get_field('imagen-pu', 'options');
$img_url = $img_data['sizes']['hero-img'];
$img_width = $img_data['sizes']['hero-img-width'];
$img_height = $img_data['sizes']['hero-img-height'];
$img_alt = $img_data['alt'];

?> 

<!-- HERO -->

<!-- HERO BACKGROUND  -->
<div class="hero__bg">
<!-- HERO WRAPPER  -->
	<div class="content-wrapper hero">
	<!-- HERO TEXT WRAPPER  -->
		<div class="hero__text">
			<h1 class= "title title--left"><?php the_field('titulo-pu', 'options'); ?></h1>
			<?php the_field('descripcion-pu', 'options'); ?>
		</div>
		<!-- END HERO TEXT WRAPPER -->
		<img class= 'hero__img' src= '<?php echo $img_url; ?> ' width= " <?php echo $img_width;?>" height= '<?php echo $img_height ; ?>' alt= '<?php echo $img_alt ?>'>
	</div>
	<!-- END HERO WRAPPER -->
</div>
<!-- END HERO BACKGROUND -->

<!-- CONTENT WRAPPER -->
<div class="content-wrapper">
	<!-- MAIN -->
	<main id="primary" class="site-main">
		<!-- THE LOOP	 -->
			<?php while ( have_posts() ) : the_post(); ?>
				<div class="table section-pagsutiles">
					<h6 class= "table__title-1">Categoría</h6>
					<h6 class= "table__title-2">Productos y servicios de Genealogía</h6>
					<h6 class= "table__title-3">Descripción</h6>
					<?php get_template_part( './src/custom-parts/template', 'acf_pags-utiles' );?> 
				</div>       
			<?php endwhile; ?>
			<!-- END LOOP -->
	</main>

<?php get_footer(); ?>