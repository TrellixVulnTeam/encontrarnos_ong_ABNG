<?php 
get_header();
?>

</div>
</div>

<main id="primary" class="site-main">

	
<div class="hero__bg">
<div class="content-wrapper hero">
<div class="hero__text">
<h1 class= "title title--left"><?php the_field('titulo-o', 'options'); ?></h1>
<?php the_field('descripcion-o', 'options'); ?>
</div>

<img class= 'hero__img' src= '<?php the_field('imagen-o', 'options'); ?>'>


</div>
</div>
<div class="content-wrapper">


	<main id="primary" class="site-main">


	<?php while ( have_posts() ) : the_post(); ?>
	<?php endwhile; ?>
<div class="organismos-wrapper">
    <!-- SELECT ORGANISMOS -->


<div class= 'form-wrapper'>
<h6 class= 'title title--left title--mb-0'>Organismos</h6>
<form>
<select id= "select-organismos" class="select select--b">

<option>Seleccionar</option>
<?php 
$args = array(
    'taxonomy'               => 'tipos-de-organismo',
    'orderby'                => 'term_order',
	'parent'              => 0,   
    'order'                  => 'ASC',
    'hide_empty'             => false,
);
?>

<?php


$taxonomy_name = 'tipos-de-organismo';
$the_query = new WP_Term_Query($args);
$parents_terms= $the_query->get_terms();

$espacio = ',';

foreach($the_query->get_terms() as $term){ 
?>
<option value= "<?php if($term->name == 'Nacionales'){?>
    <?php get_template_part('./src/custom-parts/template', 'query_nacionales'); } 
    else {
$termchildren = get_term_children( $term->term_id, 'tipos-de-organismo' );
foreach ( $termchildren as $child ) {
$termz = get_term_by( 'id', $child, 'tipos-de-organismo');?>
 <?php echo $termz->slug.$espacio;?>  <?php echo $termz->name.$espacio;}}?>"><?php echo $term->name; ?></option>
	
<?php
}
?>
</select>
</form>

<!-- SELECT PROVINCIAS -->
<form>
<select id= "select-provincias" class="select">
<option value= "">Selecciona una Provincia</option>

</select>
</form>
</div>

<!-- CONTENT -->


<div class="text-wrapper">
<div id= 'div-nacionales'></div>

<?php 

get_template_part('./src/custom-parts/template', 'query_provincias');


?>

</div>
</main><!-- #main -->
</div>
<?php
get_footer();
