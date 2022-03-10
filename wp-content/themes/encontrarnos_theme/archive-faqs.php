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
<!-- END CONTENT WRAPPER -->

<?php 

// VARIABLES HERO
$img_data = get_field('imagen-hp', 'options');
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
			<h1 class= "title title--left"><?php the_field('titulo-faqs', 'options'); ?></h1>
			<?php the_field('descripcion-faqs', 'options'); ?>
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
		<?php if ( have_posts() ) :	while ( have_posts() ) : the_post(); endwhile; 
		else :
		get_template_part( 'template-parts/content', 'none' );
		endif; ?>
		<!-- END LOOP -->
		<!-- SECTION SOBRE BUSQUEDAS -->
		<section>
			<h5 class="title title--left title--mb-0">Sobre Búsquedas</h5>
			<!-- QUERY SOBRE BUSQUEDAS -->
			<?php 
			
			$args= array(
			'post_type' => 'faqs',
			'tax_query' => array(
			array(
				'taxonomy' => 'tipo-de-busqueda',
				'field' => 'slug',
				'terms' => 'sobre-busquedas')
				) );
			$query_sb= new WP_Query($args);

			?>
			<!-- END QUERY SOBRE BUSQUEDAS -->
			<?php 
			// CUSTOM LOOP
			if($query_sb->have_posts()): while ($query_sb->have_posts()) : $query_sb->the_post(); ?>
			<!-- DETAILS -->
			<details>
				<!-- SUMMARY -->
				<summary class= "question-wrapper"> <?php the_title();?> 
				<svg class="chevron-compact-down" width="30" height="18" viewBox="0 0 30 18" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M2 2L14.75 14L27.5 2" stroke="#3A5743" stroke-width="5"/>
				</svg>
				</summary>
				<!-- END SUMMARY  -->
				<hr>
				<div> <?php the_content();?> </div>				
			</details>
			<!-- END DETAILS -->
			<hr>
			<?php endwhile;	endif;
			wp_reset_postdata(); ?>
			<!-- END CUSTOM LOOP -->
		</section>
		<!-- END SECTION SOBRE BUSQUEDAS -->

		<!-- SECTION SOBRE TESTS Y MATCHS  -->
		<section class="section-faqs">
			<h5 class="title title--left title--mb-0">Sobre Tests y Matchs</h5>
			<!-- QUERY SOBRE TESTS Y MATCHS -->
			<?php 

			$args= array(
			'post_type' => 'faqs',
			'tax_query' => array(
			array(
				'taxonomy' => 'tipo-de-busqueda',
				'field' => 'slug',
				'terms' => 'sobre-tests-matchs')
				) );
			$query_stm= new WP_Query($args);

			?>
			<!-- END QUERY SOBRE TESTS Y MATCHS -->
			<!-- CUSTOM LOOP -->
			<?php if($query_stm->have_posts()): while ($query_stm->have_posts()) : $query_stm->the_post(); ?>
			<!-- DETAILS -->
			<details>
				<!-- SUMMAMRY -->
				<summary class= "question-wrapper"><?php the_title('<p>', '</p>');?>
				<svg class="chevron-compact-down" width="30" height="18" viewBox="0 0 30 18" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M2 2L14.75 14L27.5 2" stroke="#3A5743" stroke-width="5"/>
				</svg>
				</summary>
				<!-- END SUMMARY -->
				<hr>
				<div> <?php the_content();?> </div>				
			</details>
			<!-- END DETAILS -->
			<hr>
			<?php endwhile; endif;
			wp_reset_postdata(); ?>
			<!-- END CUSTOM LOOP -->
		</section>
		<!-- END SECTION SOBRE TESTS Y MATCHS -->
	</main>
	<!-- END MAIN -->
</div>
<!-- END CONTENT WRAPPER -->

<?php
get_footer();