<?php 
/*
Template Name: Organismos
*/
get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) : the_post(); ?>
		<?php 
			$args= array(
				'post_type' => 'organismos',
				'tax_query' => array(
					array(
						'taxonomy' => 'tipos-de-organismo',
						'field' => 'slug',
						'terms' => 'nacionales', 'provinciales', 'ongs'

					)
				)
			);
			$_posts= new WP_Query($args);
		?>
		
		<?php $terms = get_the_terms( $post->ID , 'tipos-de-organismo' );

		foreach ( $terms as $term ) {

		echo $term->name;

		} ?>

		<?php endwhile; ?>

	</main><!-- #main -->

<?php
get_footer();

?>

