<?php
/**
 * Template Name: Locations Landing
 * 
 * @package Postali Parent
 * @author Postali LLC
 */

$block_content = do_blocks( '
<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group">
<!-- wp:post-content /-->
</div>
<!-- /wp:group -->'
);

get_header(); ?>

<div class="body-container">

    <?php get_template_part('block','breadcrumbs'); ?>

    <?php echo $block_content; ?>

    <div class="spacer-60"></div>

    <section class="locations-block">
        <div class="container">
            <div class="columns locations">

                <?php if( have_rows('location','options') ): ?>
                <div class="column-50 block map">    
                <?php $m = 1; ?>
                <?php while( have_rows('location','options') ): the_row(); 

                $map = get_sub_field('location_map_embed');
                ?>  
                    
                    <iframe src="<?php echo $map; ?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" id="map_<?php echo $m; ?>"></iframe>
                    
                <?php $m++; ?>
                <?php endwhile; ?>
                </div>
                <?php endif; ?>

                <?php if( have_rows('location','options') ): ?>
                <div class="column-50 block details">
                <?php $d = 1; ?> 
                <?php while( have_rows('location','options') ): the_row();

                $name = get_sub_field('location_name');
                $address = get_sub_field('location_address');
                $directions_link = get_sub_field('directions_link');
                $local_phone = get_sub_field('location_phone');
                $page_object = get_sub_field('location_page');
                if( $page_object ) {
                    $page_id = $page_object->ID;
                    $page_url = get_page_link($page_id);   
                }
                ?>

                    <div class="contact-block" id="block_<?php echo $d; ?>">
                        <h2><?php echo $name; ?></h2>
                        <a href="<?php echo $directions_link; ?>" target="blank"><p><?php echo $address; ?></p></a>
                        <div class="block-links">
                            <a href="tel:<?php echo $local_phone; ?>" class="btn"><?php echo $local_phone; ?></a>
                            <?php if($page_object) { ?>
                            <a href="<?php echo $page_url; ?>" class="btn txt">More Information</a>
                            <?php } ?>
                        </div>
                    </div>

                <?php $d++; ?>
                <?php endwhile; ?>
                </div>
                <?php endif; ?>

            

            </div>
        </div>
    </section>


</div><!-- #content -->

<?php get_footer(); ?>

<script>
jQuery(document).ready(function($) {
    $('.contact-block').hover(
        function() {
            // Get the ID of the hovered contact block
            var blockId = $(this).attr('id').split('_')[1];
            
            // Hide all iframes and remove 'active' class
            $('.map iframe').hide().removeClass('active');
            
            // Show the iframe with the corresponding ID and add 'active' class
            $('#map_' + blockId).show().addClass('active');
            
            // Remove 'active' class from all contact blocks
            $('.contact-block').removeClass('active');
            
            // Add 'active' class to the currently hovered contact block
            $(this).addClass('active');
        }
    );
    
    // Initially hide all iframes except the first one and add 'active' class to it
    $('.map iframe').hide().removeClass('active');
    $('#map_1').show().addClass('active');
    
    // Add 'active' class to the first contact block initially
    $('.contact-block').first().addClass('active');
});
</script>