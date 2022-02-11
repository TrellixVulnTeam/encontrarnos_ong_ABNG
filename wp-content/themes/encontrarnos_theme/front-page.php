<?php get_header(); ?>

<main id="primary" class="site-main">
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