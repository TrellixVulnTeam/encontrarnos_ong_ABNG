<!-- QUERY NACIONALES -->
<?php $args= array(
						'post_type' => 'organismos',
						'tax_query' => array(
							array(
								'taxonomy' => 'tipos-de-organismo',
								'field' => 'slug',
								'terms' => array('nacionales'),	)
						) );
					$query_nac= new WP_Query($args); ?>
<!-- END QUERY NACIONALES -->
<!-- CUSTOM LOOP -->
<?php if($query_nac->have_posts()): 
	while ($query_nac->have_posts()) : $query_nac->the_post(); ?>
		<div class=' <?php echo strip_tags( get_the_term_list( $post->ID, 'tipos-de-organismo', '', ', '));?>'
		id= '<?php echo $post->ID;?>'>
			<h6> <?php the_title();?> </h6>
			<div> <?php the_content();?> </div>				
		</div>
<?php endwhile;	endif;
wp_reset_postdata(); ?>
<!-- END CUSTOM LOOP -->