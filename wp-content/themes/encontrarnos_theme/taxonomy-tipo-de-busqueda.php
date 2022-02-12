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
				<?php

				?>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content', get_post_type() );
				$tags = get_the_terms(get_post(), 'tipo-de-busqueda');
				if($tags):
				foreach($tags as $tag):?>
				<a href= "<?php echo get_term_link($tag->term_id);
				?>">
				<?php echo $tag->name;?>
				</a>
				<?php endforeach;
				endif;
			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
	</main><!-- #main -->

<?php

get_footer();