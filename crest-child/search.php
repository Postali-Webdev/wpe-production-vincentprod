<?php
/**
 * Search results template
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

    <div class="banner-block" id="banner-child" style="background-image:url('/wp-content/uploads/2025/05/header-insights.jpg');">
        <div class="columns">
            <div class="column-66 centered center">
                <p class="large">Search Results</p>
                <h1>Results for "<?php echo get_search_query(); ?>"</h1>
                <a href="/" class="btn txt">Back to Website</a>
            </div>
        </div>
    </div>

    <div class="spacer-60"></div>

    <section class="results">
        <div class="container">
            <div class="columns">
                <div class="column-66 center block">
                <?php while ( have_posts() ) : the_post(); ?>
                    <a class="result-block" href="<?php the_permalink(); ?>">
                        <h2><?php the_title(); ?></h2>
                        <?php the_excerpt(); ?>
                    </a>
                <?php endwhile; ?>
                </div>
                <?php the_posts_pagination(); ?>
            </div>
        </div>
    </section>


</div><!-- #content -->

<?php get_footer(); ?>
