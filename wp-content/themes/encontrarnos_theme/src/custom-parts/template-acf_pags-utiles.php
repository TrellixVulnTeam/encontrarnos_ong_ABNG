<?php if(have_rows('paginas-utiles')): ?>
    <?php while(have_rows('paginas-utiles')): the_row(); ?>
        <p class= "table__item-1"><?php the_sub_field('categoria');?></p>
        <p class= "table__item-2"><?php the_sub_field('productos-y-servicios-de-genealogia');?></p>
        <p class= "table__item-3"><?php the_sub_field('descripcion');?></p>
    <?php endwhile; ?>
    <?php endif; ?>