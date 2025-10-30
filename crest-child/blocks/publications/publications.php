<?php 

/**
 * Publications slider template.
 *
 * @param array $block The block settings and attributes.
 */
    
?>

<?php 


$enable_manual_publications = get_field('add_publications_manually');

if( $enable_manual_publications ) { ?>
    <div class="publications-slider">
        <div id="publications-slider">
        <?php while( have_rows('publications') ): the_row(); $headline = get_sub_field('publication_headline'); $link = get_sub_field('publication_link'); ?> 
            <div class="slide">
                <p class="x-large"><?php echo $headline; ?></p>
                <a href="<?php echo $link['url'] ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?> <span class="icon-download"></span></a>
                <a class="publication-link" title="<?php echo $link['title']; ?>" href="<?php echo $link['url'] ?>" target="<?php echo $link['target']; ?>"></a>
            </div>
        <?php endwhile; wp_reset_postdata(); ?> 

        </div>
        <div class="spacer-30"></div>
        <div class="publications-nav">

        </div>
        <div class="spacer-60"></div>
    </div>

<?php
} else {
    $args = array (
        'post_type' => 'publications',
        'posts_per_page' => -1,
        'post_status' => 'publish',
        'order' => 'DESC',
    );
    $query = new WP_Query($args); ?>

    <div class="publications-slider">
        <div id="publications-slider">
        <?php while( $query->have_posts() ) : $query->the_post(); ?> 
            <div class="slide">
                <p class="x-large"><?php the_field('headline', get_the_ID()); ?></p>
                <a href="<?php the_field('download_link', get_the_ID()); ?>" target="blank">Download <span class="icon-download"></span></a>
                <a class="publication-link" title="Download" href="<?php the_field('download_link', get_the_ID()); ?>" target="blank"></a>
            </div>
        <?php endwhile; wp_reset_postdata(); ?> 

        </div>
        <div class="spacer-30"></div>
        <div class="publications-nav">

        </div>
        <div class="spacer-60"></div>
    </div>
    
<?php } 

?>

