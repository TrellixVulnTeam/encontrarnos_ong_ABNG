<?php
// QUERY PROVINCIALES
$args= array(
				'post_type' => 'organismos',
				'tax_query' => array(
					array(
						'taxonomy' => 'tipos-de-organismo',
						'field' => 'slug',
						'terms' => array('ongs', 'provinciales'), ) 
						) );
			$query_prov= new WP_Query($args);
			?>
<!-- END QUERY PROVINCIALES -->
<!-- CUSTOM LOOP -->
<?php if($query_prov->have_posts()): while ($query_prov->have_posts()) : $query_prov->the_post(); ?>
		<div class='<?php foreach(get_the_terms( $post->ID, 'tipos-de-organismo') as $term){
							echo $term->slug; };?> display--n'>
			<h6> <?php the_title();?> </h6>
			<div> <?php the_content();?> </div>				
		</div>

<?php endwhile; endif;
wp_reset_postdata(); ?>
<!-- END CUSTOM LOOP -->