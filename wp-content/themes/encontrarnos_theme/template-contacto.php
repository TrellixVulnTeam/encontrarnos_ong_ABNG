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
		<div class="form__content"><?php the_content(); ?></div>

		<div class="form-wrapper">
		<div class="form-wrapper form-wrapper--rs">
		<h6>Contactate con nosotros</h6>
		<ul class= "ul-form-contact">
			<li>Teléfonos: <?php the_field('telefonos');?>
			</li>
			<li>Email: <?php the_field('email');?>
			</li>
			<li>Redes Sociales: 
			<a href="#facebook"><i class="bi bi-facebook bi--form"></i></a>
			<a href="#instragram"><i class="bi bi-instagram bi--form"></i></a>
			<a class= "link-padding" href="#twitter"><i class="bi bi-twitter bi--form"></i></a>
			</li>
		</ul>
		</div>
		<?php echo do_shortcode('[wpforms id="26" title="true" description="false"]');?>
		</div>

		<?php endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();

?>

<!-- <script>

//FORM AJAX

(function($){

$('#contact-form').on('submit',(e)=>{
	e.preventDefault();

	let endpoint = ' <?php echo admin_url('admin-ajax.php'); ?>';
	let form = $('#contact-form').serialize();

	let formdata = new FormData();

	formdata.append('action', 'contact');
	formdata.append('contact', form);

	$.ajax(endpoint, {
		type: 'POST',
		data: formdata,
		processData: false,
		contentType: false,

		success: (res) => {
			alert(res.data)
		},

		error: ()=> {

		}
	})
})


})(jQuery);


</script> -->