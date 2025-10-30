<?php 

/**
 * Banner Block template.
 *
 * @param array $block The block settings and attributes.
 */

    $video_transcript_intro = get_field('video_transcript_intro');
    $video_transcript_remainder = get_field('video_transcript_remainder');

?>

<div class="content-box">
    <p><?php echo $video_transcript_intro; ?><span class="ellipsis visible"> ...</span>
    <span class="extra closed"><?php echo $video_transcript_remainder; ?></p>
    <div class="transcript-more"><div class="plus"><span>+</span></div> <p class="small spaced caps">Read Full Video Transcript</p></div>
</div>

<script>
    jQuery(".transcript-more").on("click", function() {
        // will (slide) toggle the related panel.
        jQuery(this).parent().find('.extra').toggleClass("closed");
        jQuery(this).parent().find('.extra').toggleClass("fadein");
        jQuery(this).parent().find('.ellipsis').toggleClass("visible");
        jQuery(this).toggleClass("clicked");
    });
</script>