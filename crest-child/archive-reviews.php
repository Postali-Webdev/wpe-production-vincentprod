<?php
/**
 * Template Name: Blog
 * 
 * @package Postali Parent
 * @author Postali LLC
 */


get_header(); ?>

<div class="body-container">

    <?php get_template_part('block','breadcrumbs'); ?>

    <div class="page-headline"><h1>Reviews</h1></div>

    <section class="blog-header" style="background-image:url('<?php the_field('banner_background','options'); ?>');">
        <div class="container">
            <div class="columns">
                <div class="column-50 centered center block">
                    <h2>Our Reviews</h2>
                    <p>Explore our reviews</p>
                    <a href="/contact/" class="btn txt">Get in Touch</a>
                </div>
            </div>
        </div>
    </section>

    <div class="spacer-60"></div>

	<section class="posts">
        <div class="container">
            <div class="columns">
            <?php while( have_posts() ) : the_post(); ?>
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
                            <h2><?php the_title(); ?></h2>
                            <?php the_content(); ?>
                        </div>
                    </article>
                </a>
            <?php endwhile; wp_reset_postdata(); ?>
            </div>
            <?php the_posts_pagination(); ?>
        </div>
    </section>

</div><!-- #content -->

<?php get_footer(); ?>
