<?php 
get_header();
?>

	<main id="primary" class="site-main">


	<?php while ( have_posts() ) : the_post(); ?>
	<?php endwhile; ?>
	

<form>
<select id= "select-organismos">

<option selected>Selecciona una opción</option>
<?php 
$args = array(
    'taxonomy'               => 'tipos-de-organismo',
    'orderby'                => 'term_order',
	'parent'              => 0,   
    'order'                  => 'ASC',
    'hide_empty'             => false,
);

$the_query = new WP_Term_Query($args);
$parents_terms= $the_query->get_terms();
foreach($the_query->get_terms() as $term){ 
?>
    <option value="<?php echo $term->term_id; ?> "><?php echo $term->name; ?></option>
	
<?php
}
?>
</select>
</form>


<form>
<select>
<option value= "" selected>Selecciona una Provincia</option>

<?php 
$args2 = array(
    'taxonomy'               => 'tipos-de-organismo',
    'orderby'                => 'term_order',
    'order'                  => 'ASC',
    'hide_empty'             => false,
);
$the_query_2 = new WP_Term_Query($args2);
foreach($the_query_2->get_terms() as $termx){ 
?>
    <option disabled><?php echo $termx->name; ?></option>
	
<?php
}
?>

</select>
</form>
</main><!-- #main -->

<?php
get_footer();
