<?php get_header(); ?>

</div>
</div>

<main id="primary" class="site-main">

	
<div class="hero__bg">
<div class="content-wrapper hero">
<div class="hero__text">
<h1 class= "title title--left"><?php the_field('titulo-hp', 'options'); ?></h1>
<?php the_field('descripcion-hp', 'options'); ?>
</div>

<img class= 'hero__img' src= '<?php the_field('imagen-hp', 'options'); ?>'>


</div>
</div>
<div class="content-wrapper">
<section>
		<?php if(have_posts() ) : while ( have_posts() ) : the_post();?>

            <h1> <?php the_title() ?> </h1>
            <p> <?php the_content() ?> </p>

        <?php endwhile;

		else :

			get_template_part( 'template-parts/content', 'none' );
            
		endif;
		?>
</section>

<section>
	<h3>¿Quiénes somos?</h3>
</section>
<section>
	<h3>Preguntas Frecuentes</h3>
	<h5>Sobre búsquedas</h5>
</section>
		
	</main><!-- #main -->
	</div>
    <?php 	get_footer();?>