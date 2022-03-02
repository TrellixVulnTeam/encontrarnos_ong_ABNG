<?php 
/*
Template Name: Glosario
*/

get_header();
?>

</div>
</div>
<!-- END CONTENT WRAPPER -->

<?php 

// VARIABLES HERO
$img_data = get_field('imagen-g', 'options');
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
			<h1 class= "title title--left"><?php the_field('titulo-g', 'options'); ?></h1>
			<?php the_field('descripcion-g', 'options'); ?>
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
		<!-- THE LOOP -->
		<?php while ( have_posts() ) : the_post(); ?>
			<!-- TABLE -->
			<div class="table">
				<h6 class= "table__title-1">Término</h6>
				<h6 class= "table__title-2">Abreviatura</h6>
				<h6 class= "table__title-3">Descripción</h6>
				<?php get_template_part( './src/custom-parts/template', 'acf_glosario' );?> 
			</div>       
			<!-- END TABLE -->
		<?php endwhile; ?>
		<!-- END LOOP -->

		<!-- GLOSARIO WRAPPER -->
		<div class="glosario-img-wrapper">
			<img class= "glosario-img__img" src='
			<?php
			
			// VARIABLES IMG GLOSARIO
			$img_data_glosario = get_field('imagen');
			$img_url_glosario = $img_data_glosario['sizes']['img-glosario'];
			$img_width_glosario = $img_data_glosario['sizes']['img-glosario-width'];
			$img_height_glosario = $img_data_glosario['sizes']['img-glosario-height'];
			$img_alt_glosario = $img_data_glosario['alt'];
			// URL IMG GLOSARIO
			echo $img_url_glosario; 
			?> 
			' width= " <?php echo $img_width_glosario;?>" height= '<?php echo $img_height_glosario; ?>' alt= '<?php echo $img_alt_glosario ?>'>
		</div>
		<!-- END GLOSARIO WRAPPER -->
	</main>
	<!-- EMD MAIN -->
</div>
<!-- END CONTENT WRAPPER -->

<?php get_footer(); ?>


