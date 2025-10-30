<?php

if(is_single()) {
    $count = 3;
    $heading = 'h4';
} else {
    $count = 9;
    $heading = 'h2';
}

$args = array (
	'post_type' => 'post',
	'post_per_page' => $count,
	'post_status' => 'publish',
	'order' => 'DESC',
);
$the_query = new WP_Query($args);

?>

	<section class="posts">
        <div class="container">
            <div class="columns">
            <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
                <a href="<?php the_permalink();?>" class="blog-post">
                    <article>
                        <?php if ( has_post_thumbnail() ) { ?> <!-- If featured image set, use that, if not use options page default -->
                        <?php $featImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
                            <div id="blog-feed-article-image-dynamic" class="blog-feed-article-image" style="background:url('<?php echo $featImg[0]; ?>') no-repeat; background-size:cover;">
                        <?php } else { ?>
                            <div id="blog-feed-article-image-default" class="blog-feed-article-image" style="background:url('') no-repeat; background-size:cover;" >
                        <?php } ?>
                            </div><!-- Close blog featured image -->
                        <div class="blog-feed-article-content">
                            <<?php echo $heading; ?>><?php the_title(); ?></<?php echo $heading; ?>>
                        </div>
                    </article>
                </a>
            <?php endwhile; wp_reset_postdata(); ?>
            </div>
            <?php the_posts_pagination(); ?>
        </div>
    </section>