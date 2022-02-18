<?php get_header(); ?>

</div>
</div>



<?php 
$img_data = get_field('imagen-hp', 'options');
$img_url = $img_data['sizes']['hero-img'];
$img_width = $img_data['sizes']['hero-img-width'];
$img_height = $img_data['sizes']['hero-img-height'];
$img_alt = $img_data['alt'];
?> 

<main id="primary" class="site-main">

<div class="hero__bg">
<div class="content-wrapper hero">
<div class="hero__text">
<h1 class= "title title--left"><?php the_field('titulo-hp', 'options'); ?></h1>
<?php the_field('descripcion-hp', 'options'); ?>
</div>

<img class= 'hero__img' src= '<?php echo $img_url; ?> ' width= " <?php echo $img_width;?>" height= '<?php echo $img_height ; ?>' alt= '<?php echo $img_alt ?>'>


</div>
</div>
<div class="content-wrapper">
<section>
		<?php if(have_posts() ) : while ( have_posts() ) : the_post();?>

        <?php endwhile;

		else :

			get_template_part( 'template-parts/content', 'none' );
            
		endif;
		?>
</section>

<section>
	<h3 class="title title--left"><span class="title__span title__span--green"></span>¿Quiénes somos?</h3>
</section>

<section>

	<h3 class="title"><span class="title__span"></span>Preguntas Frecuentes</h3>

</section>
<section>
<h3 class="title title--left"><span class="title__span title__span--grey"></span>Glosario</h3>
</section>		

<section>
<div class="section-wrapper-censo">
<h3 class="title title--left"><span class="title__span title__span"></span>Podés brindar datos para colaborar con el censo</h3>
<div class="form-wrapper">
		<div class="form__content--50w">
			<?php the_field('texto_censo'); ?>
		</div>
		<?php echo do_shortcode('[wpforms id="213" title="false" description= "false"]');?>
		</div>
		</div>
</section>


<section>
</div>
	<div class="form-wrapper--bg">
	<div class="content-wrapper">
	<h3 class="title title--left title--white"><span class="title__span title__span"></span>Si buscás a un hijo o hija, vos también podés iniciar la búsqueda</h3>
	<div class="form-wrapper form-wrapper--reverse form-wrapper--white">
		<div class="form__content--50w">
			<p><?php the_field('texto_madres'); ?></p>
		</div>
		<?php echo do_shortcode('[wpforms id="227" title="false" description= "false"]');?>
</section>

	</div>
	</div>
	</div>


<div class= "content-wrapper">

	</main><!-- #main -->
	</div>
    <?php 	get_footer();?>