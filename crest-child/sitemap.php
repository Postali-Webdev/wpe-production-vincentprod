<?php
/**
 * Template Name: Sitemap
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

get_header(); 

$templates = array(
    'page-ppc-landing.php', //replace these with the correct template names
    'page-ppc-landing-options.php'
);
$ppc_ids = array();

foreach ( $templates as $template ) {
    $args = [
        'post_type'  => 'page',
        'fields'     => 'ids',
        'nopaging'   => true,
        'meta_key'   => '_wp_page_template',
        'meta_value' => $template
    ];

    $ppc_pages = get_posts( $args );
    $ppc_ids = array_merge($ppc_ids, $ppc_pages);
}
$ppc_list = implode(', ', $ppc_ids);
?>

<div class="body-container">

    <?php get_template_part('block','breadcrumbs'); ?>

    <?php echo $block_content; ?>

    <div class="spacer-90"></div>

    <section class="main-content">
        <div class="container">
            <div class="columns">
                <div class="column-full center">
                    <?php if (have_posts()) : 
                        while (have_posts()) : the_post(); ?>
                        <div class="column-50 block">
                            <h2>Pages</h2> 
                            <div class="spacer-30"></div>
                            <ul class="sitemap">
                            <?php $args = array(
                                'depth'        => 0,
                                'exclude' => $ppc_list,
                                'sort_column'  => 'menu_order, post_title',
                                'post_type'    => 'page',
                                'post_status'  => 'publish',
                                'title_li'     => ''
                            ); ?>

                            <?php wp_list_pages($args); ?>
                            </ul> 
                        </div>
                        <div class="column-50 block">
                            <h2>Insights</h2> 
                            <div class="spacer-30"></div>
                            <ul class="sitemap">
                                <?php wp_get_archives('type=postbypost'); ?>
                            </ul>
                        </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>


</div><!-- #content -->

<?php get_footer(); ?>
