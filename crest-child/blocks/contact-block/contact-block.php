<?php 

/**
 * Banner Block template.
 *
 * @param array $block The block settings and attributes.
 */

    $form_shortcode = get_field('form_shortcode');

?>
<div class="form-block">
    <?php echo do_shortcode('' . $form_shortcode . ''); ?>
</div>