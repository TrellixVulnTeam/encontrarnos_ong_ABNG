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


</div>
</div>

<?php 
$img_data = get_field('imagen-hp', 'options');
$img_url = $img_data['sizes']['hero-img'];
$img_width = $img_data['sizes']['hero-img-width'];
$img_height = $img_data['sizes']['hero-img-height'];
$img_alt = $img_data['alt'];
?> 


<main id="primary" class="site-main">

	
<div class="hero__bg">
<div class="content-wrapper hero">
<div class="hero__text">
<h1 class= "title title--left"><?php the_field('titulo-faqs', 'options'); ?></h1>
<?php the_field('descripcion-faqs', 'options'); ?>
</div>

<img class= 'hero__img' src= '<?php echo $img_url; ?> ' width= " <?php echo $img_width;?>" height= '<?php echo $img_height ; ?>' alt= '<?php echo $img_alt ?>'>


</div>
</div>
<div class="content-wrapper">


	<main id="primary" class="site-main">

<!-- THE LOOP -->

	<?php if ( have_posts() ) : ?>
			<header class="page-header">
			</header><!-- .page-header -->
			<?php
			while ( have_posts() ) : the_post();	
			endwhile;
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif;
		?>

<!-- SOBRE BUSQUEDAS -->
<section>
		<h5 class="title title--left title--mb-0">Sobre Búsquedas</h5>
					<?php 
					$args= array(
						'post_type' => 'faqs',
						'tax_query' => array(
							array(
								'taxonomy' => 'tipo-de-busqueda',
								'field' => 'slug',
								'terms' => 'sobre-busquedas'

							)
						)
					);
					$_posts= new WP_Query($args);
					?>

			<?php 

			if($_posts->have_posts()): 
				while ($_posts->have_posts()) : $_posts->the_post(); ?>
				<details>
					<summary class= "question-wrapper"> <?php the_title();?> 
						<i class="bi bi-chevron-compact-down"></i>
					</summary>
					<hr>
					<div> <?php the_content();?> </div>				
				</details>
					<hr>
			<?php	
				endwhile;
			endif;
			wp_reset_postdata(); ?>

</section>

<!-- SOBRE TESTS Y MATCHS  -->

<section class="section-faqs">

		<h5 class="title title--left title--mb-0">Sobre Tests y Matchs</h5>
					<?php 
					$args= array(
						'post_type' => 'faqs',
						'tax_query' => array(
							array(
								'taxonomy' => 'tipo-de-busqueda',
								'field' => 'slug',
								'terms' => 'sobre-tests-matchs'

							)
						)
					);
					$_posts= new WP_Query($args);
					?>

					<?php 

					if($_posts->have_posts()): 
						while ($_posts->have_posts()) : $_posts->the_post(); ?>
						<details>
							<summary class= "question-wrapper"> <?php the_title();?> 
								<i class="bi bi-chevron-compact-down"></i>
							</summary>
							<hr>
							<div> <?php the_content();?> </div>				
						</details>
							<hr>
					<?php	
						endwhile;
					endif;
					wp_reset_postdata(); ?>

</section>
	</main><!-- #main -->

<?php

get_footer();