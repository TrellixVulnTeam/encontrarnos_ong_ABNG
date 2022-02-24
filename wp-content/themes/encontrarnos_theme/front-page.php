<?php get_header(); ?>

</div>
</div>
<!-- END CONTENT WRAPPER -->

<?php 

// VARIABLES HERO
$img_data = get_field('imagen-hp', 'options');
$img_url = $img_data['sizes']['hero-img'];
$img_width = $img_data['sizes']['hero-img-width'];
$img_height = $img_data['sizes']['hero-img-height'];
$img_alt = $img_data['alt'];

?> 

<!-- HERO -->

<!-- HERO BACKGROUND  -->
<div class="hero__bg">
<!-- HERO WRAPPER  -->
	<div class="content-wrapper hero">
		<!-- HERO TEXT WRAPPER  -->
		<div class="hero__text">
			<h1 class= "title title--left"><?php the_field('titulo-hp', 'options'); ?></h1>
			<?php the_field('descripcion-hp', 'options'); ?>
		</div>
		<!-- END HERO TEXT WRAPPER -->
		<img class= 'hero__img' src= '<?php echo $img_url; ?> ' width= " <?php echo $img_width;?>" height= '<?php echo $img_height ; ?>' alt= '<?php echo $img_alt ?>'>
	</div>
	<!-- END HERO WRAPPER -->
</div>
<!-- END HERO BACKGROUND -->

<!-- MAIN -->
<main id="primary" class="site-main">
	<!-- CONTENT WRAPPER -->
	<div class="content-wrapper">
	<!-- THE LOOP -->
		<?php if(have_posts() ) : while ( have_posts() ) : the_post(); endwhile;
		else : get_template_part( 'template-parts/content', 'none' ); endif; ?>
	<!-- END LOOP -->
	
	<!-- SECTION QUIÉNES SOMOS -->
		<section class= "mt">
			<h3 class="title title--left"><span class="title__span title__span--green"></span>¿Quiénes somos?</h3>
			<?php the_field('descripcion-qs', 'options'); ?>
			<a href= "<?php echo home_url('/equipo') ?>"><button class= "button button--green">Ver más</button></a>
		</section>
		<!-- END SECTION QUIENES SOMOS -->
	</div>	
	<!-- END CONTENT WRAPPER -->
	
	<!-- SECTION PREGUNTAS FRECUENTES -->
	<section class = "mt">
		<!-- SECTION BACKGROUND -->
		<div class="section-bg--01">
		<!-- CONTENT WRAPPER -->
			<div class="content-wrapper">
				<h3 class="title"><span class="title__span"></span>Preguntas Frecuentes</h3>
				<!-- SOBRE BUSQUEDAS -->
				<h5 class="title title--left title--mb-0 title--mt">Sobre Búsquedas</h5>
				<?php 
				// QUERY SOBRE BUSQUEDAS
				$args= array(
					'post_type' => 'faqs',
					'posts_per_page' => 2,
					'tax_query' => array(
						array(
							'taxonomy' => 'tipo-de-busqueda',
							'field' => 'slug',
							'terms' => 'sobre-busquedas' )
					) );
				$query_sb = new WP_Query($args);
				// END QUERY BUSQUEDAS
				?>
				<?php 
				// CUSTOM LOOP
				if($query_sb->have_posts()): while ($query_sb->have_posts()) : $query_sb->the_post(); ?>
				<!-- DETAILS -->
					<details>
						<summary class= "question-wrapper"> <?php the_title();?> <i class="bi bi-chevron-compact-down"></i> </summary>
						<hr>
						<div class="summary"> <?php the_content();?> </div>				
					</details>
					<!-- END DETAILS -->
						<hr>
				<?php endwhile;	endif;
				wp_reset_postdata(); ?>
				<!-- END CUSTOM LOOP -->
					<a href= "<?php echo home_url('/faqs') ?>"><button class= "button button--center">Ver más</button></a>
					<!-- END SOBRE BUSQUEDAS -->
					<!-- SOBRE TESTS Y MATCHS -->
					<h5 class="title title--left title--mb-0">Sobre Tests y Matchs</h5>
					<?php 
					// QUERY TESTS Y MATCHS
					$args= array(
						'post_type' => 'faqs',
						'posts_per_page' => 2,
						'tax_query' => array(
							array(
								'taxonomy' => 'tipo-de-busqueda',
								'field' => 'slug',
								'terms' => 'sobre-tests-matchs'	)
						) );
					$query_stm= new WP_Query($args);
					// END QUERY TESTS Y MATCHS
					?>
					<?php 
					// CUSTOM LOOP
					if($query_stm->have_posts()): while ($query_stm->have_posts()) : $query_stm->the_post(); ?>
					<!-- DETAILS -->
						<details>
							<summary class= "question-wrapper"> <?php the_title();?> <i class="bi bi-chevron-compact-down"></i>	</summary>
							<hr>
							<div> <?php the_content();?> </div>				
						</details>
						<!-- END DETAILS -->
							<hr>
					<?php endwhile;	endif;
					wp_reset_postdata(); ?>
					<!-- END CUSTOM LOOP -->
					<a href= "<?php echo home_url('/faqs') ?>"><button class= "button button--center">Ver más</button></a>
					<!-- END SOBRE TESTS Y MATCHS -->
				</div>
				<!-- END CONTENT WRAPPER -->
			</div>
		<!-- END SECTION BACKGROUND -->
	</section>
	<!-- END SECTION PREGUNTAS FRECUENTES -->

	<?php 
	// QUERY GLOSARIO
	$query_glosario = new WP_Query(array('pagename' => 'glosario') );
	$glosario_id = $query_glosario->get_queried_object_id();
	$glosario = get_field('glosario', $glosario_id);

	$img_data_glosario = get_field('imagen', $glosario_id);
	$img_url_glosario = $img_data_glosario['sizes']['img-glosario'];
	$img_width_glosario = $img_data_glosario['sizes']['img-glosario-width'];
	$img_height_glosario = $img_data_glosario['sizes']['img-glosario-height'];
	$img_alt_glosario = $img_data_glosario['alt'];
	// END QUERY GLOSARIO
	?>	

	<!-- CONTENT WRAPPER -->
	<div class="content-wrapper">
		<!-- SECTION GLOSARIO -->
		<section class= "mt">
			<h3 class="title title--left"><span class="title__span title__span--grey"></span>Glosario</h3>
			<!-- TABLE -->
			<div class="table">
				<h6 class= "table__title-1">Término</h6>
				<h6 class= "table__title-2">Abreviatura</h6>
				<h6 class= "table__title-3">Descripción</h6>
				<p class= "table__item-1 table__item-1--nobg"><?php echo $glosario[0]['termino']?></p>
				<p class= "table__item-2 table__item-1--nobg"><?php echo $glosario[0]['abreviatura'];?></p>
				<p class= "table__item-3 table__item-1--nobg"><?php echo $glosario[0]['descripcion'];?></p>
			</div> 
			<!-- END TABLE -->
			<a href= "<?php echo home_url('/glosario') ?>"><button class= "button button--grey">Ver más</button></a>
			<!-- IMG GLOSARIO -->
			<div class="glosario-wrapper">
				<img class= "glosario__img" src='<?php echo $img_url_glosario; ?> ' width= " <?php echo $img_width_glosario;?>" height= '<?php echo $img_height_glosario; ?>' alt= '<?php echo $img_alt_glosario ?>'>
			</div>
			<!-- END IMG GLOSARIO -->
		</section>		
		<!-- END SECTION GLOSARIO -->
	</div>
	<!-- END CONTENT WRAPPER -->

	<!-- SECTION ORGANISMOS Y PAGS UTILES  -->
	<section>
		<!-- SECTION BACKGROUND -->
		<div class="section-bg--02">
			<!-- CONTENT WRAPPER -->
			<div class="content-wrapper section--flex">
				<!-- COLUMNA ORGANISMOS -->
				<div class="section--flex section--flex--col">
					<h3 class="title title--left"><span class="title__span title__span--green"></span>Organismos</h3>
					<p>Consultá los organismos Nacionales y Provinciales....</p>
					<a href= "<?php echo home_url('/organismos') ?>"><i class="bi bi-plus"></i></a>
				</div>
				<!-- END COLUMNA ORGANISMOS -->
				<!-- COLUMNA PAGS UTILES -->
				<div class="section--flex section--flex--col">
					<h3 class="title title--left"><span class="title__span title__span--green"></span>Otras páginas útiles</h3>
					<p>Encontrá otras páginas y aplicaciones útiles</p>
					<a href= "<?php echo home_url('/paginas-utiles') ?>"><i class="bi bi-plus"></i></a>
				</div>
				<!-- END COLUMNA PAGS UTILES -->
			</div>
			<!-- END CONTENT WRAPPER -->
		</div>
		<!-- END SECTION BACKGROUND -->
	</section>
	<!-- END SECTION ORGANISMOS Y PAGS UTILES -->

	<!-- CONTENT WRAPPER -->
	<div class="content-wrapper">
	<!-- SECTION FORM CENSO -->
		<section>
				<h3 id= "anchor-censo" class="title title--left"><span class="title__span title__span"></span>Podés brindar datos para colaborar con el censo</h3>
				<!-- FORM WRAPPER -->
				<div class="form-wrapper">
					<!-- FORM DESCRIPTION -->
					<div class="form__content--50w">
						<?php the_field('texto_censo'); ?>
					</div>
					<!-- END FORM DESCRIPTION -->
					<?php echo do_shortcode('[wpforms id="213" title="false" description= "false"]');?>
				</div>
				<!-- END FORM WRAPPER -->
		</section>
	<!-- END SECTION FORM CENSO -->
	</div>
	<!-- END CONTENT WRAPPER -->
	
	<!-- SECTION FORM MADRES -->
	<section id="anchor-madres" class= "mt--5">
		<!-- SECTION BACKGROUND -->
		<div class="form-wrapper--bg">
			<!-- CONTENT WRAPPER -->
			<div class="content-wrapper">
				<h3 class="title title--left title--white"><span class="title__span title__span"></span>Si buscás a un hijo o hija, vos también podés iniciar la búsqueda</h3>
				<!-- FORM WRAPPER -->
				<div class="form-wrapper form-wrapper--reverse form-wrapper--white">
					<!-- FORM DESCRIPTION -->
					<div class="form__content--50w">
						<p class="form__text--white"><?php the_field('texto_madres'); ?></p>
					</div>
					<!-- END FORM DESCRIPTION -->
					<?php echo do_shortcode('[wpforms id="227" title="false" description= "false"]');?>
				</div>
				<!-- END FORM WRAPPER -->
			</div>
			<!-- END CONTENT WRAPPER -->
		</div>
		<!-- END SECTION BACKGROUND -->
	</section>
	<!-- END SECTION FORM MADRES -->
</main>
<!-- END MAIN -->

<?php 	get_footer();?>