<?php
/**
 * 404 Page Not Found.
 *
 * @package Postali Parent
 * @author Postali LLC
 */

get_header(); ?>

<div class="body-container">

    <?php get_template_part('block','breadcrumbs'); ?>

    <div class="wp-block-group">
        <div class="wp-block-group__inner-container is-layout-constrained wp-block-group-is-layout-constrained">
            <div class="entry-content wp-block-post-content is-layout-flow wp-block-post-content-is-layout-flow">
                <div class="wp-block-group wide">
                    <div class="wp-block-group__inner-container is-layout-constrained wp-block-group-is-layout-constrained">

                        <div class="page-headline"><h1>404: Page Not Found.</h1></div>
                        <div class="banner-block" id="banner-child" style="background-image:url('http://gregvincent.local/wp-content/uploads/2025/05/header-insights.jpg');">
                            <div class="columns">
                                <div class="column-66 centered center">
                                    <p class="xx-large tan caps">We’re Sorry, This Page Doesn’t Exist.</p>
                                    <p class="lrg">The page you’re looking for has moved or the URL is incorrect.</p>
                                        
                                    <div class="banner-cta">
                                        <a href="/" class="btn txt red error">Back to Website</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php get_footer();
