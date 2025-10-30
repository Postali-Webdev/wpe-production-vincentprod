<?php 

/**
 * Banner Block template.
 *
 * @param array $block The block settings and attributes.
 */

?>

<div class="video-embed">
    <iframe class="responsive-video" src="<?php echo ( get_field('video_source') === "vimeo" ? "https://player.vimeo.com/video/": "https://www.youtube.com/embed/" ); ?><?php the_field('video_embed_code'); ?><?php echo ( get_field('video_embed_type') === "vimeo" ? "?&title=0&byline=0&portrait=0" : "" ); ?>" width="640" height="360px" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
</div>