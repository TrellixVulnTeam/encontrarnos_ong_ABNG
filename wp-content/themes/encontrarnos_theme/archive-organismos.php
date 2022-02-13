<?php 
get_header();
?>

	<main id="primary" class="site-main">


	<?php while ( have_posts() ) : the_post(); ?>
	<?php endwhile; ?>


<?php 
			$args= array(
				'post_type' => 'organismos',
				'tax_query' => array(
					array(
						'taxonomy' => 'tipos-de-organismo',
						'field' => 'slug',
						'terms' => array('ongs')

					)
				)
			);
			$_posts= new WP_Query($args);
			
		?>
<select>
<option value= "" selected>Selecciona una opción</option>
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
    <option><?php echo $id = $term->name; ?></option>
	
<?php
}
?>
</select>

<select>
<option value= "" selected>Selecciona una Provincia</option>
<?php 
$args = array(
    'taxonomy'               => 'tipos-de-organismo',
    'orderby'                => 'term_order', 
	'child_of'               => $parents_terms[2]->term_id,
    'order'                  => 'ASC',
    'hide_empty'             => false,
);
$the_query_2 = new WP_Term_Query($args);
foreach($the_query_2->get_terms() as $term){ 
?>
    <option><?php echo $term->name; ?></option>
	
<?php
}
?>
</select>

			<?php if($_posts->have_posts()): 
				while ($_posts->have_posts()) : $_posts->the_post(); ?>
<?php $terms = get_the_terms( $post->ID , 'tipos-de-organismo' ); ?>
		<?php var_dump($terms) ?>
	<select onchange="console.log(value);">
	<?php foreach ( $terms as $term ) { ?>
		<option value= "hola"> <?php  echo $term->name; ?> </option>	<?php } ?>
	</select>


		<?php	
		endwhile;
	endif;
	wp_reset_postdata(); ?>

	</main><!-- #main -->

<?php
get_footer();
