<?php if(have_rows('items', 'options')): ?>
    <?php while(have_rows('items', 'options')): the_row(); ?>
    <li class="ul-mision__li"><?php the_sub_field('item');?></li>
    <?php endwhile; ?>
    <?php endif; ?>