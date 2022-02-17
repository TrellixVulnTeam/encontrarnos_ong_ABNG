<?php 
/*
Template Name: Contacto
*/

get_header();
?>

</div>
</div>


<?php 
$img_data = get_field('imagen-c', 'options');
$img_url = $img_data['sizes']['hero-img'];
$img_width = $img_data['sizes']['hero-img-width'];
$img_height = $img_data['sizes']['hero-img-height'];
$img_alt = $img_data['alt'];
?> 

	
<div class="hero__bg">
<div class="content-wrapper hero">
<div class="hero__text">
<h1 class= "title title--left"><?php the_field('titulo-c', 'options'); ?></h1>
<?php the_field('descripcion-c', 'options'); ?>
</div>

<img class= 'hero__img' src= '<?php echo $img_url; ?> ' width= " <?php echo $img_width;?>" height= '<?php echo $img_height ; ?>' alt= '<?php echo $img_alt ?>'>


</div>
</div>
<div class="content-wrapper">

	<main id="primary" class="site-main">

	

		<?php
		while ( have_posts() ) : the_post(); ?>
		<h3 class="title title--left"><span class="title__span title__span"></span><?php the_title(); ?></h3>

		<?php the_content(); ?>

		<?php endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();

?>

