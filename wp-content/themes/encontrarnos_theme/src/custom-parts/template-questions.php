<?php if($_posts->have_posts()): 
				while ($_posts->have_posts()) : $_posts->the_post(); ?>
				<div class="question-wrapper">
				<p> <?php the_title();?> </p>
				<i class="bi bi-chevron-compact-down"></i>
				</div>
				<hr>
				<p> <?php the_content();?> </p>
			<?php	endwhile;
		endif;
			?>