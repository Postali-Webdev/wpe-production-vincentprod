<?php 

/**
 * Publications slider template.
 *
 * @param array $block The block settings and attributes.
 */
    
?>

<?php 

$enable_manual_events = get_field('enable_manual_events_presentations');

if( $enable_manual_events ) { ?>

    <?php if( have_rows('events_presentations') ) { ?>
        <div class="events-block">
            <?php while( have_rows('events_presentations') ) : the_row();  $event_object = get_sub_field('presentation_event'); $event_id = $event_object->ID;?> 
                <div class="column-full">
                    <div class="tag-date">
                        <div class="tag"><?php the_field('presentation_type', $event_id); ?></div>
                        <div class="time">
                            <?php echo get_the_date("m.j.y"); ?>
                        </div>
                    </div>
                    <p class="x-large"><?php the_field('presentation_title', $event_id); ?></p>
                    <a class="events-link" title="<?php the_field('presentation_title', $event_id); ?>" href="<?php the_field('presentation_link', $event_id); ?>" data-lity></a>
                </div>
            <?php endwhile; wp_reset_postdata(); ?> 
        </div>
    <?php } ?>

<?php } else {
    $args = array (
        'post_type' => 'eventspresentations',
        'posts_per_page' => 3,
        'post_status' => 'publish',
        'order' => 'DESC',
    );
    $query = new WP_Query($args);

    ?>

<div class="events-block">
    <?php while( $query->have_posts() ) : $query->the_post(); ?> 
        <div class="column-full">
            <div class="tag-date">
                <div class="tag"><?php the_field('presentation_type', get_the_ID()); ?></div>
                <div class="time">
                    <?php echo get_the_date("m.j.y"); ?>
                </div>
            </div>
            <p class="x-large"><?php the_field('presentation_title', get_the_ID()); ?></p>
            <a class="events-link" title="<?php the_field('presentation_title', get_the_ID()); ?>" href="<?php the_field('presentation_link', get_the_ID()); ?>" data-lity></a>
        </div>
    <?php endwhile; wp_reset_postdata(); ?> 
</div>

<?php } ?>

