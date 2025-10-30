<?php
/**
 * Single template
 *
 * @package Postali Parent
 * @author Postali LLC
 */

get_header();

$block_content = do_blocks( '
<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group">
<!-- wp:post-content /-->
</div>
<!-- /wp:group -->'
);

?>

<div class="body-container">

    <?php get_template_part('block','breadcrumbs'); ?>

    <section class="post-content">
        <div class="container">
            <div class="columns">
                <div class="column-full">
                    <div class="author-date">
                        <div class="time">
                            Published: <?php echo date("m.d.y"); ?>
                        </div>
                        <p class="author">Written By: Dr. Gregory Vincent</p>
                    </div>
                    <h1><?php the_title(); ?></h1>
                </div>

                <div class="overview-block">
                    <div class="column-50">
                       <p class="caps red spaced">overview</p>
                       <p><?php the_field('overview'); ?></p>
                    </div>
                    <div class="column-50">
                        <?php if ( has_post_thumbnail() ) { ?> <!-- If featured image set, use that, if not use options page default -->
                        <?php $featImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
                            <div class="featured-image" style="background:url('<?php echo $featImg[0]; ?>') no-repeat; background-size:cover;"></div>
                        <?php } ?>
                    </div>
                </div>

                <div class="column-66 center post"> 
                    <?php echo $block_content; ?>
                    <div class="lets-connect">
                        <p><strong>Let’s Connect.</strong></p>
                        <?php echo do_shortcode('[phone]'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="related">
        <div class="container">
            <div class="columns">
                <div class="column-full">
                    <p class="red caps spaced">insights</p> <h2>Related Posts</h2>
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part('block','posts'); ?>

</div>

<?php get_footer(); ?>