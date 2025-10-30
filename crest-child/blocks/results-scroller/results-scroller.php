<?php 

/**
 * Banner Block template.
 *
 * @param array $block The block settings and attributes.
 */


    
?>

<div class="results-scroller">

    <div id="results" class="slide">
    <?php if( have_rows('results') ): ?>
    <?php while( have_rows('results') ): the_row(); ?>
        <?php $post_object = get_sub_field('result'); ?>
        <?php if( $post_object ): ?>
            <?php // override $post
            $post = $post_object;
            setup_postdata( $post );
            ?>
            <a class="result" href="<?php the_permalink($post->ID); ?>">
                <h3><?php echo get_the_title($post->ID); ?></h3>
                <p><?php the_content($post->ID); ?></p>
            </a>
            <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
        <?php endif; ?>
    <?php endwhile; ?>
    <?php endif; ?>
    </div>
                
</div>