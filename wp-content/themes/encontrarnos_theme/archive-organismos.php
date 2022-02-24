<?php 
get_header();
?>

</div>
</div>
<!-- END CONTENT WRAPPER -->

<?php 

// VARIABLES HERO
$img_data = get_field('imagen-o', 'options');
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
            <h1 class= "title title--left"><?php the_field('titulo-o', 'options'); ?></h1>
            <?php the_field('descripcion-o', 'options'); ?>
        </div>
        <!-- END HERO TEXT WRAPPER -->
    <img class= 'hero__img' src= '<?php echo $img_url; ?> ' width= " <?php echo $img_width;?>" height= '<?php echo $img_height ; ?>' alt= '<?php echo $img_alt ?>'>
    </div>
    <!-- END HERO WRAPPER -->
</div>
<!-- END HERO BACKGROUND -->

<!-- CONTENT WRAPPER -->
<div class="content-wrapper">
	<!-- MAIN -->
	<main id="primary" class="site-main">
		<!-- THE LOOP	 -->
        <?php while ( have_posts() ) : the_post(); endwhile; ?>
        <div class="organismos-wrapper">
        <!-- SELECT WRAPPER -->
            <div class= 'select-wrapper'>
                <h6 class= 'title title--left title--mb-0'>Organismos</h6>
                <!-- FORM -->
                <form>
                    <!-- SELECT ORGANISMOS -->
                <select id= "select-organismos" class="select select--b">

                <option>Seleccionar</option>
                <?php 

                // TERMS QUERY
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
                $espacio = ',';
                // END TERMS QUERY
                foreach($the_query->get_terms() as $term){ ?>
                    <!-- OPTION -->
                    <option value= "<?php if($term->name == 'Nacionales'){?>
                    <?php get_template_part('./src/custom-parts/template', 'query_nacionales'); } 
                        else {
                        $termchildren = get_term_children( $term->term_id, 'tipos-de-organismo' );
                        foreach ( $termchildren as $child ) {
                            $child_term = get_term_by( 'id', $child, 'tipos-de-organismo');?>
                            <?php echo $child_term->slug.$espacio;?>  <?php echo $child_term->name.$espacio;}}?>"><?php echo $term->name; ?></option>
                    <!-- END OPTION -->
                    <?php } ?>

                </select>
                <!-- END SELECT ORGANISMOS-->
            </form>
            <!-- END FORM -->

            <!-- FORM -->
            <form>
                <!-- SELECT PROVINCIAS -->
                <select id= "select-provincias" class="select">
                    <option value= "">Selecciona una Provincia</option>
                </select>
                <!-- END SELECT PROVINCIAS -->
                </form>
                <!-- END FORM -->
            </div>
            <!-- END SELECT WRAPPER -->

        <!-- CONTENT -->
        <!-- TEXT WRAPPER -->
        <div class="text-wrapper">
            <!-- CONTENT NACIONALES -->
            <div id= 'div-nacionales'></div>
            <!-- END CONTENT NACIONALES -->
            <!-- CONTENT PROVINCIAS -->
            <?php get_template_part('./src/custom-parts/template', 'query_provincias'); ?>
        <!-- END CONTENT PROVINCIAS -->
        </div>
        <!-- END TEXT WRAPPER -->
    </main>
    <!-- END MAIN -->
</div>
<!-- END CONTENT WRAPPER -->
<?php
get_footer();
