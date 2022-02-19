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


</div>
</div>


<?php 
$img_data = get_field('imagen-qs', 'options');
$img_url = $img_data['sizes']['hero-img'];
$img_width = $img_data['sizes']['hero-img-width'];
$img_height = $img_data['sizes']['hero-img-height'];
$img_alt = $img_data['alt'];
?> 

<main id="primary" class="site-main">

	
<div class="hero__bg">
<div class="content-wrapper hero">
<div class="hero__text">
<h1 class= "title title--left"><?php the_field('titulo-qs', 'options'); ?></h1>
<?php the_field('descripcion-qs', 'options'); ?>
</div>

<img class= 'hero__img' src= '<?php echo $img_url; ?> ' width= " <?php echo $img_width;?>" height= '<?php echo $img_height ; ?>' alt= '<?php echo $img_alt ?>'>


</div>
</div>
<div class="content-wrapper">


<section>
	
<h3 id= "mision" class="title title--left"><span class="title__span title__span--green"></span>Nuestra Misión</h3>
<ul class="ul-mision">
	<?php get_template_part( 'src/custom-parts/template', 'acf_mision' ); ?>
</ul>

</section>

</div>
</div>

<div class="card-wrapper--bg">
<section class="content-wrapper section-equipo">

<h3 id= "equipo" class="title"><span class="title__span"></span>Integrantes</h3>
<div class="card-wrapper">
		<?php if ( have_posts() ) : ?>
			<header class="page-header">
			</header><!-- .page-header -->
		<?php
			/* Start the Loop */
		while ( have_posts() ) : the_post();?>

<!-- CARD -->

			<div id="<?php echo get_the_ID(); ?>" class="card">
				<img src="<?php the_post_thumbnail_url('card-img-team'); ?>" class="card__img--br"></img>
				<h5 class= "card__title"> <?php the_title();?> </h5>
			
				<div class="card__text-wrapper">
				<p class= "card__subtitle"><?php echo get_field('puesto_laboral'); ?></p>
						<p class= "card__text"><?php the_excerpt(); ?> </p>
				</div>
			</div>

<!-- MODAL -->

			<div class="<?php echo get_the_ID(); ?> modal display--n">
				<?php $post_id = get_the_ID(); ?>
				
				<img src="<?php the_post_thumbnail_url('card-img-team'); ?>" class="card__img--br card__img--nw"></img>
				
				<div class="card__text-wrapper card__text-wrapper--modal">
				<h5 class= "card__title card__title--modal"> <?php the_title();?> </h5>
				<p class= "card__subtitle card__subtitle--modal"><?php echo get_field('puesto_laboral'); ?></p>
				<p class= "card__text card__text--modal"><?php echo get_the_content(); ?> </p>
				</div>
			</div>

			<?php endwhile;
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif; ?>

</section>
</div>	
</div>	
<?php
get_footer();