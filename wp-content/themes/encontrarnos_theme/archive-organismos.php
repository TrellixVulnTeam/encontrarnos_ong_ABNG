<?php 
get_header();
?>

	<main id="primary" class="site-main">


	<?php while ( have_posts() ) : the_post(); ?>
	<?php endwhile; ?>


<form>
<select id= "select-organismos">

<option>Selecciona una opción</option>
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
<option value="<?php $termchildren = get_term_children( $term->term_id, 'tipos-de-organismo' );
foreach ( $termchildren as $child ) {
$termz = get_term_by( 'id', $child, 'tipos-de-organismo' ); ?>
 <?php echo $termz->name .$espacio;} ?>
 "><?php echo $term->name; ?></option>
	
<?php
}
?>
</select>
</form>


<script>

(function($){
    $('#select-organismos').on('change', (e)=>{

		e.preventDefault();

    let select = $('#select-organismos').val();
    let select_name = $('#select-organismos').find('option:selected').text();
	let endpoint = '<?php echo admin_url('admin-ajax.php');?>'
	
	console.log(select);

    console.log(select_name);
            let data = select.split(",");
            let sel = document.getElementById('select-provincias');
            let newClassname = select_name.toLowerCase() + '--done';
            if(!sel.classList.contains(newClassname)){
                for (let i= 0; i< data.length-1; i++) {
                let opt = document.createElement('option');
                opt.className = select_name.toLowerCase();
                opt.text = data[i];
                sel.classList.add(newClassname);
                sel.appendChild(opt);                  
                if(select_name.toLowerCase() == opt.className){
                    opt.style.display = "block";}
                    else {
                        opt.style.display = "none";
                    }
            }
            }

})
})(jQuery);


</script>


<form>
<select id= "select-provincias">
<option value= "">Selecciona una Provincia</option>

</select>
</form>

</main><!-- #main -->

<?php
get_footer();
