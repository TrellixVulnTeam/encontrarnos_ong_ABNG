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

<!-- THE LOOP -->


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


<!-- QUIÉNES SOMOS -->

<section>
	<h3 class="title title--left"><span class="title__span title__span--green"></span>¿Quiénes somos?</h3>
	<?php the_field('descripcion-qs', 'options'); ?>
	<a href= "<?php echo home_url('/equipo') ?>"><button class= "button button--green">Ver más</button></a>
</section>

<!-- PREGUNTAS FRECUENTES -->

</div>
<section>
<div class="section-wrapper--01">
<div class="content-wrapper section-wrapper--m section-wrapper--p">
	<h3 class="title"><span class="title__span"></span>Preguntas Frecuentes</h3>
	<h5 class="title title--left title--mb-0 title--mt">Sobre Búsquedas</h5>
					<?php 
					$args= array(
						'post_type' => 'faqs',
						'posts_per_page' => 2,
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
					<div class="summary"> <?php the_content();?> </div>				
				</details>
					<hr>
			<?php	
				endwhile;
			endif;
			wp_reset_postdata(); ?>
			
			<a href= "<?php echo home_url('/faqs') ?>"><button class= "button button--center">Ver más</button></a>
	<h5 class="title title--left title--mb-0">Sobre Tests y Matchs</h5>
				<?php 
				$args= array(
					'post_type' => 'faqs',
					'posts_per_page' => 2,
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
				endif;
				wp_reset_postdata(); ?>

				<a href= "<?php echo home_url('/faqs') ?>"><button class= "button button--center">Ver más</button></a>
			</div>

</div>
</section>

<!-- GLOSARIO -->

<?php 
$the_query = new WP_Query(array('pagename' => 'glosario') );
$glosario_id = $the_query->get_queried_object_id();
$glosario = get_field('glosario', $glosario_id);

$img_data_glosario = get_field('imagen', $glosario_id);
$img_url_glosario = $img_data_glosario['sizes']['img-glosario'];
$img_width_glosario = $img_data_glosario['sizes']['img-glosario-width'];
$img_height_glosario = $img_data_glosario['sizes']['img-glosario-height'];
$img_alt_glosario = $img_data_glosario['alt'];
?>	

<div class="content-wrapper">

<section>
	<div>
<h3 class="title title--left"><span class="title__span title__span--grey"></span>Glosario</h3>


		<div class="table">
			<h6 class= "table__title-1">Término</h6>
			<h6 class= "table__title-2">Abreviatura</h6>
			<h6 class= "table__title-3">Descripción</h6>
			<p class= "table__item-1 table__item-1--nobg"><?php echo $glosario[0]['termino']?></p>
			<p class= "table__item-2 table__item-1--nobg"><?php echo $glosario[0]['abreviatura'];?></p>
			<p class= "table__item-3 table__item-1--nobg"><?php echo $glosario[0]['descripcion'];?></p>
		</div> 

		<a href= "<?php echo home_url('/glosario') ?>"><button class= "button button--grey">Ver más</button></a>

		<div class="glosario-wrapper">
		<img class= "glosario__img" src='<?php echo $img_url_glosario; ?> ' width= " <?php echo $img_width_glosario;?>" height= '<?php echo $img_height_glosario; ?>' alt= '<?php echo $img_alt_glosario ?>'
		</div>

	</div>
</section>		

<!-- ORGANISMOS Y PAGS UTILES  -->

</div>

<section>
	<div class="section-wrapper--02">
		<div class="content-wrapper section-wrapper--flex section-wrapper--flex">
			<div class="section-wrapper--flex section-wrapper--flex--col">
				<h3 class="title title--left"><span class="title__span title__span--green"></span>Organismos</h3>
				<p>Consultá los organismos Nacionales y Provinciales....</p>
				<a href= "<?php echo home_url('/organismos') ?>"><i class="bi bi-plus"></i></a>
			</div>
			<div class="section-wrapper--flex section-wrapper--flex--col">
				<h3 class="title title--left"><span class="title__span title__span--green"></span>Otras páginas útiles</h3>
				<p>Encontrá otras páginas y aplicaciones útiles</p>
				<a href= "<?php echo home_url('/paginas-utiles') ?>"><i class="bi bi-plus"></i></a>
			</div>
		</div>
	</div>
</section>


<div class="content-wrapper">

<section>
<div class="section-wrapper-censo">
<h3 id= "anchor-censo" class="title title--left"><span class="title__span title__span"></span>Podés brindar datos para colaborar con el censo</h3>
<div class="form-wrapper">
		<div class="form__content--50w">
			<?php the_field('texto_censo'); ?>
		</div>
		<?php echo do_shortcode('[wpforms id="213" title="false" description= "false"]');?>
		</div>
		</div>
</section>


<section id="anchor-madres">
</div>
	<div class="form-wrapper--bg">
	<div class="content-wrapper">
	<h3 class="title title--left title--white"><span class="title__span title__span"></span>Si buscás a un hijo o hija, vos también podés iniciar la búsqueda</h3>
	<div class="form-wrapper form-wrapper--reverse form-wrapper--white">
		<div class="form__content--50w">
			<p class="form__text--white"><?php the_field('texto_madres'); ?></p>
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