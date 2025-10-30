<?php 

/**
 * Banner Block template.
 *
 * @param array $block The block settings and attributes.
 */

?>

<div class="awards-block">

    <div id="awards" class="slide">
        <?php $n=1 ?>
        <?php if( have_rows('awards','options') ): ?>
        <?php while( have_rows('awards','options') ): the_row(); ?>  
            <div class="column-20" id="award_<?php echo $n; ?>">
            <?php 
            $image = get_sub_field('award_image');
            if( !empty( $image ) ): ?>
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
            <?php endif; ?>
            </div>
            <?php $n++; ?>
        <?php endwhile; ?>
        <?php endif; ?> 
    </div>

</div>