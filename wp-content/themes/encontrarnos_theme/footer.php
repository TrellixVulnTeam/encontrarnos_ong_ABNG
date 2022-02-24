<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package encontrarnos_theme
 */

// VARIABLES LOGO

$custom_logo_id = get_theme_mod( 'custom_logo' );
$image = wp_get_attachment_image_src( $custom_logo_id , 'logo-sm' ); 

$image_width = $image[1];
$image_height = $image[2];

?>

<!-- END CONTENT WRAPPER -->
	</div>

	<!-- FOOTER -->
	<footer id="colophon" class="site-footer">
		<!-- CONTENT WRAPPER -->
		<div class="content-wrapper">
			<div class="site-info">
				<!-- FOOTER WRAPPER -->
				<div class="footer-wrapper">
					<!-- LOGO & RSS-->
					<div class="footer-logo">
						<a href= " <?php echo home_url(); ?> " ><figure class= "logo">
							<img src= "<?php echo $image[0] ?>" width= "<?php echo $image_width ?>" height= "<?php echo $image_height ?>">
						</figure></a>

						<p class="li--bold"> Seguinos </p>
						<!-- RSS -->
						<div class="footer-rss">
							<a  href="<?php the_field('facebook', 'options');?>"><i class="bi bi-facebook"></i></a>
							<a href="<?php the_field('instagram', 'options');?>"><i class="bi bi-instagram"></i></a>
							<a href="<?php the_field('twitter', 'options');?>"><i class="bi bi-twitter"></i></a>
						</div>
						<!-- END RSS -->
					</div>
					<!-- END LOGO & RSS -->
					<!-- LISTS -->
					<div class="footer-lists">
						<!-- LIST 1 -->
						<ul>
							<li class="li--bold">ONG</li>
							<li><a href="<?php echo home_url('/equipo/#equipo') ?>" >¿Quiénes somos?</a></li>
							<li><a href="<?php echo home_url('equipo/#mision') ?>" >Misión</a></li>
							<li><a href="<?php echo home_url('/novedades') ?>" >Novedades</a></li>
						</ul>
						<!-- END LIST 1 -->
						<!-- LIST 2 -->
						<ul>
							<li class="li--bold">INFORMACIÓN</li>
							<li><a href="<?php echo home_url('/faqs') ?>" >Preguntas Frecuentes</a></li>
							<li><a href="<?php echo home_url('/glosario') ?>" >Glosario</a></li>
							<li><a href="<?php echo home_url('/organismos') ?>" >Organismos</a></li>
							<li><a href="<?php echo home_url('/paginas-utiles') ?>" >Páginas Útiles</a></li>
						</ul>
						<!-- END LIST 2 -->
						<!-- LIST 3 -->
						<ul>
							<li class="li--bold">CONTACTANOS</li>
							<li><a href="tel:<?php
							$the_query = new WP_Query(array('pagename' => 'contacto') );
							$contacto_id = $the_query->get_queried_object_id();
							echo get_field('telefonos', $contacto_id);?>">
							Teléfono</a></li>
							<li><a href="mailto:<?php 
							echo get_field('email', $contacto_id);?>"
							>Mail</a></li>
							<li><a href="<?php echo home_url('/#anchor-censo') ?>" >Censo</a></li>
							<li><a href="<?php echo home_url('/#anchor-madres') ?>" >Madres</a></li>
						</ul>
						<!-- END LIST 3 -->
					</div>
					<!-- END LISTS -->
				</div>
				<!-- END FOOTER WRAPPER -->
			</div>
			<!-- END CONTENT WRAPPER -->
		</div>
		<!-- .site-info -->
	</footer>
	<!-- END FOOTER -->

<?php wp_footer(); ?>

</body>
</html>
