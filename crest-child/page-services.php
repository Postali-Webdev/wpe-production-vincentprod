<?php
/**
 * Template Name: Services Landing
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

    <section class="services">
        <div class="container">
            <div class="columns">
                <div class="column-full">
                    <div class="filter-buttons">
                        <p>SHOW:</p>
                        <div class="tabs-nav">
                            <ul>
                                <li class="active"><span id="#all" class="all">All Services & Sectors</span></li>
                                <li><span id="#<?php the_field('service_button_id'); ?>"><?php the_field('services_button_text'); ?></span></li>
                                <li><span id="#<?php the_field('sectors_button_id'); ?>"><?php the_field('sectors_button_text'); ?></span></li>
                                <li><span id="#<?php the_field('regional_services_button_id'); ?>"><?php the_field('regional_services_button_text'); ?></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="spacer-90"></div>
                    
                    <div class="tabs-content">

                        <div id="all">
                        <?php if (have_rows('bottom_services')) : ?>
                        <?php while (have_rows('bottom_services')) : the_row(); ?>
                            <span class="service">
                                <?php $parent_link = get_sub_field('parent_link'); ?>
                                <a href="<?php echo $parent_link; ?>" class="service-parent">
                                    <h2><?php the_sub_field('parent_title'); ?></h2>
                                </a>
                                <?php if (have_rows('children')) : ?>
                                    <ul class="child_pages">
                                    <?php while (have_rows('children')) : the_row(); 
                                        $child_link = get_sub_field('child_link'); ?>
                                        <li><a href="<?php echo $child_link; ?>"><?php the_sub_field('child_title'); ?></a></li>
                                    <?php endwhile; ?>
                                    </ul>
                                <?php endif; ?>
                            </span>
                        <?php endwhile; ?>
                        <?php endif; ?>

                        <div class="spacer-60"></div>

                        <h2>Sectors</h2>
                        <div class="sectors-content">
                            <?php if (have_rows('bottom_sectors','options')) : ?>
                            <?php while (have_rows('bottom_sectors','options')) : the_row(); ?>
                                <span class="column-25 sectors">
                                    <p><?php the_sub_field('title'); ?></p>
                                </span>
                            <?php endwhile; ?>
                            <?php endif; ?>
                            </div>
                        </div>

                        <div id="<?php the_field('service_button_id'); ?>">
                        <?php if (have_rows('bottom_services')) : ?>
                        <?php while (have_rows('bottom_services')) : the_row(); ?>
                            <span class="service">
                                <a href="<?php the_sub_field('parent_link'); ?>" class="service-parent"><h2><?php the_sub_field('parent_title'); ?></h2></a>
                                <?php if (have_rows('children')) : ?>
                                    <ul class="child_pages">
                                    <?php while (have_rows('children')) : the_row(); ?>
                                        <li><a href="<?php the_sub_field('child_link'); ?>"><?php the_sub_field('child_title'); ?></a></li>
                                    <?php endwhile; ?>
                                    </ul>
                                <?php endif; ?>
                            </span>
                        <?php endwhile; ?>
                        <?php endif; ?>
                        </div>

                        <div id="<?php the_field('sectors_button_id'); ?>">
                            <div class="sectors-content">
                            <?php if (have_rows('bottom_sectors','options')) : ?>
                            <?php while (have_rows('bottom_sectors','options')) : the_row(); ?>
                                <span class="column-25 sectors">
                                    <p><?php the_sub_field('title'); ?></p>
                                </span>
                            <?php endwhile; ?>
                            <?php endif; ?>
                            </div>
                        </div>

                        <div id="<?php the_field('regional_services_button_id'); ?>">
                        <?php if (have_rows('bottom_regional')) : ?>
                        <?php while (have_rows('bottom_regional')) : the_row(); ?>
                            <h2><?php the_sub_field('regional_location_name'); ?></h2>
                            <?php if (have_rows('regional_location_services')) : ?>
                            <span class="spacer-30"></span>
                            <ul class="regional-services">
                            <?php while (have_rows('regional_location_services')) : the_row(); ?>
                                <li>
                                    <a href="<?php the_sub_field('parent_link'); ?>" class="service-parent"><h3><?php the_sub_field('parent_title'); ?></h3></a>
                                    <?php if (have_rows('children')) : ?>
                                        <ul class="child_pages">
                                        <?php while (have_rows('children')) : the_row(); ?>
                                            <li><a href="<?php the_sub_field('child_link'); ?>"><?php the_sub_field('child_title'); ?></a></li>
                                        <?php endwhile; ?>
                                        </ul>
                                    <?php endif; ?>
                                    </li>
                            <?php endwhile; ?>
                            </ul>
                            <?php endif; ?>
                        <?php endwhile; ?>
                        <?php endif; ?>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>

    

    

</div><!-- #content -->

<style type="text/css">
.tabs-content { width:100%; }
#all { width:100%; }
#<?php the_field('service_button_id'); ?> { width:100%; }
#<?php the_field('sectors_button_id'); ?> { width:100%; }
#<?php the_field('regional_service_button_id'); ?> { width:100%; }
</style>

<script src="/wp-content/themes/crest-child/blocks/assets/js/tabs.js"></script>

<?php get_footer(); ?>
