<?php 
/*
Template Name: Novedades
*/
get_header();
?>

</div>
</div>



<?php 
$img_data = get_field('imagen-n', 'options');
$img_url = $img_data['sizes']['hero-img'];
$img_width = $img_data['sizes']['hero-img-width'];
$img_height = $img_data['sizes']['hero-img-height'];
$img_alt = $img_data['alt'];
?> 

	
<div class="hero__bg">
<div class="content-wrapper hero">
<div class="hero__text">
<h1 class= "title title--left"><?php the_field('titulo-n', 'options'); ?></h1>
<?php the_field('descripcion-n', 'options'); ?>
</div>

<img class= 'hero__img' src= '<?php echo $img_url; ?> ' width= " <?php echo $img_width;?>" height= '<?php echo $img_height ; ?>' alt= '<?php echo $img_alt ?>'>


</div>
</div>
<div class="content-wrapper">


	<main id="primary" class="site-main">
			<section class="card-wrapper">
			<?php if ( have_posts() ) : ?>
				<header class="page-header"></header><!-- .page-header -->
			<?php
				/* Start the Loop */
			while ( have_posts() ) : the_post();?>
						<?php get_template_part( './src/custom-parts/template', 'acf_novedades' );?>

				<?php endwhile;
			else :
				get_template_part( 'template-parts/content', 'none' );
			endif; ?>
	</section>
	
	</div>
	
	<?php
	get_footer();


