<?php 

/**
 * Banner Block template.
 *
 * @param array $block The block settings and attributes.
 */

    $links_background_color = get_field('links_background_color');
    $links_text_color = get_field('links_text_color');
    $links_background_hover_color = get_field('links_background_hover_color');
    $links_text_hover_color = get_field('links_text_hover_color');

?>

    <?php if( have_rows('links_slim') ): ?>
    <div class="link-block" id="links-slim">
    <ul class="links">
    <?php while( have_rows('links_slim') ): the_row(); ?>  
    
        <?php if (get_sub_field('link_type') == 'internal') { ?>
        <li><a href=""><?php the_sub_field('link_text'); ?></a></li>
        <?php } elseif (get_sub_field('link_type') == 'external') { ?>
        <li><a href="" target="blank"><?php the_sub_field('link_text'); ?></a></li>
        <?php } ?>
        
    <?php endwhile; ?>
    </ul>
    </div>
    <?php endif; ?> 

<style>
    .links a { background:<?php echo $links_background_color; ?> !important; color: <?php echo $links_text_color; ?> !important; }
    .links a:hover { background:<?php echo $links_background_hover_color; ?> !important; color: <?php echo $links_text_hover_color; ?> !important; }
</style>