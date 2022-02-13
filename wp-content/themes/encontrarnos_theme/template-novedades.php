<?php 
/*
Template Name: Novedades
*/
get_header();
?>

	<main id="primary" class="site-main">
			<section class="card-wrapper">
			<?php if ( have_posts() ) : ?>
				<header class="page-header"></header><!-- .page-header -->
			<?php
				/* Start the Loop */
			while ( have_posts() ) : the_post();?>
				<div class="card">
					<div class="text-wrapper">
						<?php get_template_part( './src/custom-parts/template', 'acf_novedades' );?>
					</div>
				</div>
				<?php endwhile;
			else :
				get_template_part( 'template-parts/content', 'none' );
			endif; ?>
	</section>
	
	</div>
	
	<?php
	get_footer();


