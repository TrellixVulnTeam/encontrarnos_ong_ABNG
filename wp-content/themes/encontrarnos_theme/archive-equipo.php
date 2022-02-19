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
	
<h3 class="title title--left"><span class="title__span title__span--green"></span>Nuestra Misión</h3>
<ul class="ul-mision">
	<?php get_template_part( 'src/custom-parts/template', 'acf_mision' ); ?>
</ul>

</section>

</div>
</div>

<div class="card-wrapper--bg">
<section class="content-wrapper">

<h3 class="title"><span class="title__span"></span>Integrantes</h3>
<div class="card-wrapper">
		<?php if ( have_posts() ) : ?>
			<header class="page-header">
			</header><!-- .page-header -->
		<?php
			/* Start the Loop */
		while ( have_posts() ) : the_post();?>
			<div class="card">
				<img src="<?php the_post_thumbnail_url('card-img-team'); ?>" class="card__img--br"></img>
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
</div>
</section>
</div>

</div>

<?php
get_footer();