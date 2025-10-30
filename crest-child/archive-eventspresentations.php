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

    <div class="page-headline"><h1>Events/Publications</h1></div>

    <section class="blog-header" style="background-image:url('<?php the_field('banner_background','options'); ?>');">
        <div class="container">
            <div class="columns">
                <div class="column-50 centered center">
                    <h2>Our Events & Publications</h2>
                    <p>Explore our events and publications - designed for Ohio educators, executives & leaders.</p>
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
                <a data-lity href="<?php the_field('presentation_link', get_the_ID());?>" class="blog-post">
                    <article>
                        <div class="blog-feed-article-content">
                            <div class="tag-date">
                                <div class="tag"><?php the_field('presentation_type', get_the_ID()); ?></div>
                                <div class="time">
                                    <?php echo get_the_date("m.d.y"); ?>
                                </div>
                            </div>
                            <h2><?php the_field('presentation_title', get_the_ID()) ?></h2>
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
