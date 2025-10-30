<?php 

    $button_link_type = get_field('button_link_type');
    $underline_color = get_field('button_underline_color');
    $button_text = get_field('button_text');
    $button_link_internal = get_field('button_link_internal');
    $button_link_external = get_field('button_link_external');

?>
<?php if($button_link_type == 'external') { ?>
    <a href="<?php echo $button_link_external; ?>" class="btn txt <?php echo $underline_color; ?>" target="blank"><?php echo $button_text; ?></a>
    <div class="spacer-30"></div>
<?php } elseif ($button_link_type == 'internal') { ?>
    <a href="<?php echo $button_link_internal; ?>" class="btn txt <?php echo $underline_color; ?>"><?php echo $button_text; ?></a>
    <div class="spacer-30"></div>
<?php } ?>