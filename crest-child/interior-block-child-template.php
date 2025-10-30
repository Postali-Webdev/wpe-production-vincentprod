<?php
/**
 * Template Name: Interior Block - Child
 * @package Postali Crest Controller Theme
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

    <?php echo $block_content; ?>

</div>

<?php get_footer(); ?>