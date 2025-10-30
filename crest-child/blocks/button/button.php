<?php 

    $button_link_type = get_field('button_link_type');
    $button_text = get_field('button_text');
    $button_link_internal = get_field('button_link_internal');
    $button_link_external = get_field('button_link_external');
    $button_link_phone = get_field('button_link_phone');
    $button_background_color = get_field('button_background_color');
    $button_text_color = get_field('button_text_color');
    $button_background_hover_color = get_field('button_background_hover_color');
    $button_text_hover_color = get_field('button_text_hover_color');
    $button_position = get_field('button_position');

?>
<?php if($button_link_type == 'external') { ?>
    <a href="<?php echo $button_link_external; ?>" class="btn <?php echo $button_position; ?>" target="blank"><?php echo $button_text; ?></a>
<?php } elseif ($button_link_type == 'internal') { ?>
    <a href="<?php echo $button_link_internal; ?>" class="btn <?php echo $button_position; ?>"><?php echo $button_text; ?></a>
<?php } elseif ($button_link_type == 'phone') { ?>
    <a href="<?php echo $button_link_phone; ?>" class="btn <?php echo $button_position; ?>"><?php echo $button_text; ?></a>
<?php } ?>

<style>
    .btn { background:<?php echo $button_background_color; ?> !important; color: <?php echo $button_text_color; ?>; }
    .btn:hover { background:<?php echo $button_background_hover_color; ?> !important; color: <?php echo $button_text_hover_color; ?>; }
    .btn.centered { margin:0 auto; display:block; }
</style>