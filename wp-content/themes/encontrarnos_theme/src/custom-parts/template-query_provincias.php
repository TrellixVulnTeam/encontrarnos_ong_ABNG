		<?php
	$args= array(
						'post_type' => 'organismos',
						'tax_query' => array(
							array(
								'taxonomy' => 'tipos-de-organismo',
								'field' => 'slug',
								'terms' => array('ongs', 'provinciales'),

							)
						)
					);
					$_posts= new WP_Query($args);
					?>
        <?php 
                if($_posts->have_posts()): 
						while ($_posts->have_posts()) : $_posts->the_post(); ?>

                            <div class='<?php foreach(get_the_terms( $post->ID, 'tipos-de-organismo') as $termy){
									echo $termy->slug;
							};?> <?php foreach(get_the_terms($post->ID, 'tipos-de-organismo') as $term ){
								echo get_term( $term->parent)->name;}?> display--n'>
							<h6> <?php the_title();?> </h6>
							<div> <?php the_content();?> </div>				
							</div>

					<?php	
						endwhile;
					endif;
					wp_reset_postdata(); ?>