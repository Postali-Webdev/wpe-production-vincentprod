<?php 

/**
 * Banner Block template.
 *
 * @param array $block The block settings and attributes.
 */

    $testimonials = get_field('testimonials');
    $google_rating_logo = get_field('google_rating_logo');
    $google_rating_average = get_field('google_rating_average');
    $google_rating_total_reviews = get_field('google_rating_total_reviews');
    
?>


<div class="testimonials-block" id="testimonials-three">

            <div class="reviews-block">
                <div class="rating">
                    <div class="average"><?php echo $google_rating_average; ?></div>
                    <div class="total"><?php echo $google_rating_total_reviews; ?> reviews</div>
                </div>
                <div class="logo">
                <?php 
                if( !empty( $google_rating_logo ) ): ?>
                    <img src="<?php echo esc_url($google_rating_logo['url']); ?>" alt="<?php echo esc_attr($google_rating_logo['alt']); ?>" />
                <?php endif; ?>
                </div>
            </div>
            <div class="spacer-30"></div>

            <?php if( have_rows('testimonials') ): ?>
            <?php while( have_rows('testimonials') ): the_row(); ?>
                <?php $post_object = get_sub_field('testimonial'); ?>
                <?php if( $post_object ): ?>
                    <?php // override $post
                    $post = $post_object;
                    setup_postdata( $post );
                    ?>
                    <div class="testimonial column-33">
                        <div class="stars"></div>
                        <p><?php the_content($post->ID); ?></p>
                        <p class="author"><?php echo get_the_title($post->ID); ?></p>
                    </div>
                    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                <?php endif; ?>
            <?php endwhile; ?>
            <?php endif; ?>

</div>
