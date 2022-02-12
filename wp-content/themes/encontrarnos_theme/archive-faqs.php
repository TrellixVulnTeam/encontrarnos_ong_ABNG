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

	<main id="primary" class="site-main">

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
			endif; ?>

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
					endif; ?>


	</main><!-- #main -->

<?php

get_footer();