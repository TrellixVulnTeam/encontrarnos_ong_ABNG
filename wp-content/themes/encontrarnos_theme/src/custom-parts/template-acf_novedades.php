
<?php if(have_rows('links')): ?>
    <?php while(have_rows('links')): the_row(); ?>

    <?php 
    $img_data = get_sub_field('imagen');
    $img_url = $img_data['sizes']['card-img'];
    $img_width = $img_data['sizes']['card-img-width'];
    $img_height = $img_data['sizes']['card-img-height'];
    $img_alt = $img_data['alt'];
    ?> 

    <?php $link = get_sub_field('link'); ?>


    <div class="card">
    <img class= 'card__img' src= '<?php echo $img_url; ?> ' width= " <?php echo $img_width;?>" height= '<?php echo $img_height ; ?>' alt= '<?php echo $img_alt ?>'>
        <div class="card__text-wrapper">
           <a href=" <?php echo $link['url'];?>">  <h5 class= "card__title card__title--left"> <?php echo $link['title'];?> </h5></a>
            <p class= "card__text card__text--left"> <?php the_sub_field('descripcion')?></p>
        </div>
	</div>
    <?php endwhile; ?>
    <?php endif; ?>