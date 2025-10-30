<?php 

/**
 * Banner Block template.
 *
 * @param array $block The block settings and attributes.
 */

    $testimonial_block_text_color = get_field('testimonial_block_text_color');
    $google_rating_logo = get_field('google_rating_logo');
    
?>

<div class="testimonials-block" id="testimonials-one">

    <?php
    $featured_post = get_field('single_testimonial');
    if( $featured_post ): ?>
    <div class="rating-details-block">
        <div class="logo-block">
        <?php 
        if( !empty( $google_rating_logo ) ): ?>
            <img src="<?php echo esc_url($google_rating_logo['url']); ?>" alt="<?php echo esc_attr($google_rating_logo['alt']); ?>" />
        <?php endif; ?>
        <div class="stars"></div>
        </div>
        <div class="name-date">
            <?php
            $date = $featured_post->post_date;
            $date = date("F Y",strtotime($date));
            ?>
            <p><?php echo esc_html( $featured_post->post_title ); ?> | <?php echo esc_html( $date ); ?></p>
        </div>
    </div>
    <p><?php echo esc_html( $featured_post->post_content ); ?></p>
    <div class="spacer-30"></div>
    <div class="more"><a href="/reviews/">See More Reviews </a><span class="icon-crest-arrow-right"></span></div>
    <?php endif; ?>

</div>


<style>
    #testimonials-one p, #testimonials-one .more a { color:<?php echo $testimonial_block_text_color; ?> !important; }
</style>
