<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package encontrarnos_theme
 */

get_header();
?>

	<main id="primary" class="site-main">
		<?php
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

		endwhile; // End of the loop.
		?>



	</main><!-- #main -->

<?php

get_footer();

