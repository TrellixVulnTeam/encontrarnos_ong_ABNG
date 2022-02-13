

<?php if(have_rows('links')): ?>
    <?php while(have_rows('links')): the_row(); ?>

    <?php $link = get_sub_field('link'); ?>

        <a href=" <?php echo $link['url'];?> " ><?php echo $link['title'];?></a>
    <?php endwhile; ?>
    <?php endif; ?>