<?php 

/**
 * Banner Block template.
 *
 * @param array jQueryblock The block settings and attributes.
 */

$enable_mobile_dropdown = get_field('enable_mobile_dropdown'); 
?>


<div class="tabs_wrapper"> 
    <ul class="tabs <?php echo $enable_mobile_dropdown ? 'mobile-dropdown' : ''; ?>">
    <?php $n=1; ?>
    <?php if( have_rows('tab_content') ): ?>
    <?php while( have_rows('tab_content') ): the_row(); ?> 
        <li <?php if($n==1) { ?>class="active"<?php } ?> rel="tab<?php echo $n; ?>"><?php the_sub_field('tab_title'); ?></li>
        <?php $n++; ?>
    <?php endwhile; ?>
    <?php endif; ?> 
    </ul>

    <div class="tab_container">
    <?php $i=1; ?>
    <?php if( have_rows('tab_content') ): ?>
    <?php while( have_rows('tab_content') ): the_row(); ?> 
        <div id="tab<?php echo $i; ?>" class="tab_content">
            <div class="tab-contents">
            <?php if (get_sub_field('add_image')) { ?>
                <div class="tab-image">
                <?php 
                $image = get_sub_field('tab_image');
                if( !empty( $image ) ): ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                <?php endif; ?>
                </div>
            <?php } ?>
                <div class="tab-copy">
                    <?php the_sub_field('tab_content_copy'); ?>
                    <?php if (get_sub_field('add_link')) { ?>
                        <div class="spacer-30"></div>
                        <a href="<?php the_sub_field('link_location'); ?>" class="btn"><?php the_sub_field('link_text'); ?> <span class="icon-crest-arrow-right"></span></a>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php $i++; ?>
    <?php endwhile; ?>
    <?php endif; ?> 
    </div>
</div>



<script>

    jQuery(".tab_content").hide();
    jQuery(".tab_content:first").show();

  /* if in tab mode */
    jQuery("ul.tabs li").click(function() {
		
        jQuery(".tab_content").hide();
        var activeTab = jQuery(this).attr("rel"); 
        jQuery("#"+activeTab).fadeIn();		
            
        jQuery("ul.tabs li").removeClass("active");
        jQuery(this).addClass("active");

        jQuery(".tab_drawer_heading").removeClass("d_active");
        jQuery(".tab_drawer_heading[rel^='"+activeTab+"']").addClass("d_active");
    });

    jQuery(".tab_container").css("min-height", function(){ 
        return jQuery(".tabs").outerHeight() + 50;
    });
	/* if in drawer mode */
	jQuery(".tab_drawer_heading").click(function() {
      
        jQuery(".tab_content").hide();
        var d_activeTab = jQuery(this).attr("rel"); 
        jQuery("#"+d_activeTab).fadeIn();
        
        jQuery(".tab_drawer_heading").removeClass("d_active");
        jQuery(this).addClass("d_active");
        
        jQuery("ul.tabs li").removeClass("active");
        jQuery("ul.tabs li[rel^='"+d_activeTab+"']").addClass("active");
    });
		
</script>