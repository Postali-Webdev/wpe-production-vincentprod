<?php 

/**
 * Banner Block template.
 *
 * @param array $block The block settings and attributes.
 */

    $columns_panel_headline = get_field('columns_panel_headline');
    $column1_content = get_field('column_1_top_content');
    $column2_content = get_field('column_2_top_content');
?>

<?php if(get_field('add_panel_title')) { ?>
<div class="add-title">
    <div class="panel-title">
        <?php the_field('panel_title'); ?>
    </div>
<? } ?>

<div class="columns-layout">
    <div class="container">
        <div class="columns">
            <?php if(!empty($columns_panel_headline)) { ?>
            <div class="column-full block">
                <h2><?php echo $columns_panel_headline; ?></h2>
                <div class="spacer-30"></div>
            </div>
            <?php } ?>


            <div class="column-66 block">
                <?php echo $column1_content; ?>
            </div>

            <div class="column-33 block">
                <?php echo $column2_content; ?>
            </div>

            <div class="column-full">
                <div class="tabs-content">
                    <div id="tab1">
                    <?php if (have_rows('bottom_accordions')) : ?>
                    <?php while (have_rows('bottom_accordions')) : the_row(); ?>
                        <span class="accordions">
                            <span class="accordions_title">
                                <?php the_sub_field('title'); ?>
                            </span>
                            <span class="accordions_content">
                                <span class="content">
                                    <?php the_sub_field('content'); ?>
                                </span>
                            </span>
                            <span class="background-image">
                                <?php $tab_bg_image = get_sub_field('background_image'); ?>
                                <img src="<?php echo $tab_bg_image['url']; ?>" alt="<?php echo $tab_bg_image['alt']; ?>">
                            </span>
                        </span>
                    <?php endwhile; ?>
                    <?php endif; ?>
                    </div>

                    <div id="tab2">
                    <?php if (have_rows('bottom_sectors','options')) : ?>
                        <span class="columns">
                        <span class="spacer-30"></span>
                        <?php while (have_rows('bottom_sectors','options')) : the_row(); ?>
                            <span class="column-25 sectors">
                                <p><?php the_sub_field('title'); ?></p>
                            </span>
                        <?php endwhile; ?>
                        </span>
                    <?php endif; ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php if(get_field('add_panel_title')) { ?>
</div>
<? } ?>

<script src="/wp-content/themes/crest-child/blocks/assets/js/tabs.js"></script>