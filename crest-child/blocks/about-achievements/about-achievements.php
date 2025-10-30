<?php 

/**
 * Banner Block template.
 *
 * @param array $block The block settings and attributes.
 */
    
?>


<?php 

/**
 * Banner Block template.
 *
 * @param array $block The block settings and attributes.
 */
    
?>

<div class="achievements-slider">
    <div id="achievements-slider">
    <?php $n = 0; ?>
    <?php if( have_rows('achievements') ): ?>
        <?php while( have_rows('achievements') ): the_row(); ?>  
            <?php if($n % 3 == 0) { ?>
                <div class="slide">
            <?php } ?>

            <div class="slide-item" id="slide_<?php echo $n + 1; ?>">
                <div class="top">
                    <div class="tag"><?php the_sub_field('achievement_category'); ?></div>
                    <p class="sans red"><?php the_sub_field('achievement_location'); ?></p>
                </div>
                <?php the_sub_field('achievement_copy'); ?>
            </div>
            
            <?php $n++; ?>
            <?php if($n % 3 == 0) { ?>
                </div>
            <?php } ?>
        <?php endwhile; ?>

        <!-- Close the last slide div if it wasn't closed in the loop -->
        <?php if($n % 3 != 0) { ?>
            </div>
        <?php } ?>
    <?php endif; ?> 
    </div>
    <div class="achievements-nav">
        
    </div>
</div>