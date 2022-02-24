<?php if(have_rows('glosario')): while(have_rows('glosario')): the_row(); ?>
        <p class= "table__item-1"><?php the_sub_field('termino');?></p>
        <p class= "table__item-2"><?php the_sub_field('abreviatura');?></p>
        <p class= "table__item-3"><?php the_sub_field('descripcion');?></p>
<?php endwhile; endif; ?>