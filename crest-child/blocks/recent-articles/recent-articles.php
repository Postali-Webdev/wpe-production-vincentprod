<?php 

/**
 * Recent Articles block template.
 *
 * @param array $block The block settings and attributes.
 */
    
?>

<?php $args = array (
    'post_type' => 'post',
    'posts_per_page' => 3,
    'post_status' => 'publish',
    'order' => 'DESC',
);
$query = new WP_Query($args);
?>

<div class="featured-articles">
    <?php while( $query->have_posts() ) : $query->the_post(); ?> 
    <div class="featured-block">
        <a class="featured-block-link" title="<?php the_title();?>" class="featured-block" href="<?php the_permalink(); ?>"></a>
        <div class="column-25">
        <?php if ( has_post_thumbnail() ) { ?> <!-- If featured image set, use that, if not use options page default -->
            <?php $featImg = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' );?>
            <div id="custom-bg" style="background-image: url('<?php echo $featImg[0]; ?>')"></div>
        <?php } ?>
        </div>
        <div class="column-75">
            <div class="time">
                <?php echo get_the_date("m.d.y"); ?>
            </div>
            <h3><?php the_title(); ?></h3>
        </div>
    </div>
    <?php endwhile; wp_reset_postdata(); ?> 
</div>