<?php 
/*
Template Name: Contacto
*/

get_header();
?>

</div>
</div>

	
<div class="hero__bg">
<div class="content-wrapper hero">
<div class="hero__text">
<h1 class= "title title--left"><?php the_field('titulo-c', 'options'); ?></h1>
<?php the_field('descripcion-c', 'options'); ?>
</div>

<img class= 'hero__img' src= '<?php the_field('imagen-c', 'options'); ?>'>


</div>
</div>
<div class="content-wrapper">

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content', 'page' );
		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();

?>

