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

<section>
	
<h3 class="title title--left"><span class="title__span title__span--green"></span>Nuestra Misión</h3>
<ul class="ul-mision">
	<li class="ul-mision__li"><span class="li__span li__span--bold">Brindar contención </span>a personas cuya identidad ha sido sustituida al nacer así como a las familias que los buscan.</li>
	<li class="ul-mision__li"><span class="li__span li__span--bold">Colaborar en su búsqueda </span>con herramientas informáticas y conocimientos de genealogía genética para una mejor lectura de los resultados de test de ADN privados de acceso público.</li>
	<li class="ul-mision__li"><span class="li__span li__span--bold">Apoyar todas las iniciativas </span>que tengan el objetivo de lograr leyes de protección del derecho a la identidad del recién nacido, que prevengan y eviten la trata de bebés y aquéllas que reconozcan el derecho a la identidad para todos los habitantes de la República Argentina.</li>
	<li class="ul-mision__li"><span class="li__span li__span--bold">Apoyar la iniciativa de generar un Banco Nacional de Datos Genéticos</span> con la tecnología necesaria para aquéllos que no tenemos ningún dato de las personas a las que buscamos. No un cotejo uno a uno, sino una Base de Datos que permita un cotejo multidimensional.</li>
	<li class="ul-mision__li">Difundir entre la sociedad argentina y a través del mundo <span class="li__span li__span--bold">campañas que desalienten la práctica aún vigente de la compra de niños y alienten la adopción.</span></li>
</ul>

</section>

<h3 class="title"><span class="title__span"></span>Integrantes</h3>

<section class="card-wrapper">
		<?php if ( have_posts() ) : ?>
			<header class="page-header"></header><!-- .page-header -->
		<?php
			/* Start the Loop */
		while ( have_posts() ) : the_post();?>
			<div class="card">
				<img src="<?php the_post_thumbnail_url('card-img'); ?>" class="card__img"></img>
				<a href= <?php the_permalink(); ?>><h5 class= "card__title"> <?php the_title();?> </h5></a>
			
				<div class="card__text-wrapper">
					<?php get_template_part( './src/custom-parts/template', 'acf_equipo' );?>
						<p class= "card__text"><?php the_excerpt(); ?> </p>
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