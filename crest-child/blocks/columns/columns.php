<?php 

/**
 * Banner Block template.
 *
 * @param array $block The block settings and attributes.
 */

    $panel = get_field('panel_layout');
    $layout = get_field('columns_layout');
    if ($layout == '2575') {
        $column1 = '25';
        $column2 = '75';
    }
    if ($layout == '3366') {
        $column1 = '33';
        $column2 = '66';
    }
    if ($layout == '5050') {
        $column1 = '50';
        $column2 = '50';
    }
    if ($layout == '6633') {
        $column1 = '66';
        $column2 = '33';
    }
    if ($layout == '7525') {
        $column1 = '75';
        $column2 = '25';
    }

    if ($layout == '333333') {
        $column1 = '33';
        $column2 = '33';
        $column3 = '33';
    }

    if ($layout == '100') {
        $column1 = 'full';
    }

    $columns_panel_headline = get_field('columns_panel_headline');
    $panel_title_position = get_field('panel_title_position');
    $column1_content = get_field('column_1_content');
    $column2_content = get_field('column_2_content');
    $column3_content = get_field('column_3_content');
?>

<?php if($panel_title_position == 'side') { ?>
    <div class="add-title">
        <div class="panel-title">
            <?php the_field('panel_title'); ?>
        </div>
<?php } ?>


<div class="columns-layout <?php if ($layout == '333333') { ?>three-column<?php } ?> <?php echo $panel; ?> <?php echo $panel_title_position; ?>">
    <div class="container">
        <div class="columns">
            <?php if(!empty($columns_panel_headline)) { ?>
            <div class="column-full block">
                <h2><?php echo $columns_panel_headline; ?></h2>
                <div class="spacer-30"></div>
            </div>
            <?php } ?>

            <!-- both columns, full-left -->
            <?php if($panel == 'full-left') { ?>
            <?php $image_left = get_field('column_1_left_image'); ?>
            <div class="column-<?php echo $column1; ?> block left-image" style="background-image:url('<?php echo esc_url($image_left['url']); ?>');"></div>
            <div class="column-<?php echo $column2; ?> block">
                <?php echo $column2_content; ?>
            </div>
            <?php } ?>
            

            <!-- both columns, full-right -->
            <?php if($panel == 'full-right') { ?>
            <?php $image_right = get_field('column_2_right_image'); ?>
            <div class="column-<?php echo $column1; ?> block">
                <?php echo $column1_content; ?>
            </div>
            <div class="column-<?php echo $column2; ?> block right-image" style="background-image:url('<?php echo esc_url($image_right['url']); ?>');"></div>
            <?php } ?>


            <!-- normal container -->
            <?php if($panel == 'contained' || $panel == 'contained-pad' || $panel == 'contained-pad-skinny') { ?>
            <div class="column-<?php echo $column1; ?> block">

            <?php if($panel_title_position == 'top') { ?>
                <div class="panel-title">
                    <?php the_field('panel_title'); ?>
                </div>
            <?php } ?>

                <?php echo $column1_content; ?>
            </div>
            <?php if($layout != '100') { ?>
            <div class="column-<?php echo $column2; ?> block">
                <?php if($panel_title_position == 'top') { ?>
                    <div class="spacer"></div>
                <?php  } ?>
                <?php echo $column2_content; ?>
            </div>
            <?php } ?>
            <?php if ($layout == '333333') { ?>
            <div class="column-<?php echo $column3; ?> <?php if($panel == 'full-right') { ?> right-image <?php } ?>">
                <?php echo $column3_content; ?>
            </div>
            <?php } ?>
            <?php } ?>

        </div>
    </div>
</div>

<?php if($panel_title_position == 'side') { ?>
</div>
<? } ?>