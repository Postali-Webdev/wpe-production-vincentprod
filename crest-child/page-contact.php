<?php
/**
 * Template Name: Contact
 * 
 * @package Postali Parent
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

    <section>
        <div class="container">
            <div class="columns">
                <div class="column-50 block">
                    <div class="panel-title"><?php the_field('left_panel_title'); ?></div>
                    <h2><?php the_field('left_panel_headline'); ?></h2>
                    <div class="spacer-30"></div>

                    <?php
                    $locations = get_field('location', 'options');
                    $page_ids = array(); // Array to store page IDs

                    // Collect all page IDs from the repeater field
                    foreach ( $locations as $location ) {
                        $location_page = $location['location_page'];
                        if( $location_page ) {
                            $page_ids[] = $location_page->ID;
                        }
                    }

                    // Get the parent ID of the current page
                    $parent_id = wp_get_post_parent_id(get_the_ID());

                    // Check if the parent ID of the current page exists in the collected page IDs
                    $use_location_fields = in_array($parent_id, $page_ids);

                    // Find the matching location if any
                    $matching_location = null;
                    if ($use_location_fields) {
                        foreach ($locations as $location) {
                            if ($location['location_page']->ID == $parent_id) {
                                $matching_location = $location;
                                break;
                            }
                        }
                    }

                    // Use fields from the matching location or global options
                    $phone = $use_location_fields ? $matching_location['location_phone'] : get_field('global_phone', 'options');
                    $email = get_field('global_email', 'options');
                    $fax = get_field('global_fax', 'options');
                    $address = $use_location_fields ? $matching_location['location_address'] : get_field('global_address', 'options');
                    $map_embed = get_field('map_embed', 'options');
                    ?>

                    <div class="contact-info">

                        <div class="contact-left">
                            <?php if( $phone ) : ?>
                            <div class="contact-btn">
                                <div class="contact-btn-text">
                                    Phone
                                </div>
                                <div class="contact-btn-btn">
                                    <a href="tel:<?php echo $phone; ?>" class="btn"><?php echo $phone; ?></a>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php if( $email ) : ?>
                            <div class="contact-btn">
                                <div class="contact-btn-text">
                                    Email
                                </div>
                                <div class="contact-btn-btn">
                                    <a href="mailto:<?php echo $email; ?>" class="btn"><?php echo $email; ?></a>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php if( $fax ) : ?>
                            <div class="contact-btn">
                                <div class="contact-btn-text">
                                    Fax
                                </div>
                                <div class="contact-btn-btn">
                                    <span class="btn"><?php echo $fax; ?></span>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>

                        <div class="contact-right">
                            <p><strong>Location</strong></p>
                            <p><?php echo $address; ?></p>
                            <iframe src="<?php echo $map_embed; ?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
                
                <div class="column-50">
                    <div class="pre-footer-form">
                        <?php the_field('form_header_copy'); ?>
                        <?php echo do_shortcode(' [gravityform id="1" title="false"] '); ?>
                    </div>
                </div>

            </div>
        </div>
    </section>

</div><!-- #content -->

<?php get_footer(); ?>