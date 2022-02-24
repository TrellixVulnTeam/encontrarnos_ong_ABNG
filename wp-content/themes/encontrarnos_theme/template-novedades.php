<?php 
/*
Template Name: Novedades
*/
get_header();
?>

</div>
</div>
<!-- END CONTENT WRAPPER -->

<?php 

// VARIABLES HERO
$img_data = get_field('imagen-n', 'options');
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
			<h1 class= "title title--left"><?php the_field('titulo-n', 'options'); ?></h1>
			<?php the_field('descripcion-n', 'options'); ?>
		</div>
		<!-- END HERO TEXT WRAPPER -->
		<img class= 'hero__img' src= '<?php echo $img_url; ?> ' width= " <?php echo $img_width;?>" height= '<?php echo $img_height ; ?>' alt= '<?php echo $img_alt ?>'>
	</div>
	<!-- END HERO WRAPPER -->
</div>
<!-- END HERO BACKGROUND -->

<!-- CONTENT WRAPPER -->
<div class="content-wrapper section-novedades">
	<!-- MAIN -->
	<main id="primary" class="site-main">
		<!-- CARD WRAPPER -->
		<section class="card-wrapper">
			<!-- THE LOOP -->
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>
				<?php get_template_part( './src/custom-parts/template', 'acf_novedades' );?>
				<?php endwhile; else :
				get_template_part( 'template-parts/content', 'none' );
			endif; ?>
			<!-- END LOOP -->
		</section>
		<!-- END CARD WRAPPER -->
	</main>
	<!-- END MAIN -->
</div>
<!-- END CONTENT WRAPPER -->
	
<?php
get_footer();


