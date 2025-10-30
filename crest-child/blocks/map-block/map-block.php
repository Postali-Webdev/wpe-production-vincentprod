<?php 

/**
 * Banner Block template.
 *
 * @param array $block The block settings and attributes.
 */

    $map_iframe = get_field('map_iframe');

?>
<div class="map-block">
    <iframe src="<?php echo $map_iframe; ?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
