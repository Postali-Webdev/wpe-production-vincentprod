/**
 * Slick Custom
 *
 * @package Postali Child
 * @author Postali LLC
 */
/*global jQuery: true */
/*jslint white: true */
/*jshint browser: true, jquery: true */

jQuery( function ( $ ) {
	"use strict";

    $(function() {
        $('.tabs-nav span').click(function() {
    
            // Check for active
            $('.tabs-nav li').removeClass('active');
            $(this).parent().addClass('active');
    
            // Display active tab
            let currentTab = jQuery(this).attr('id');
            $('.tabs-content div').hide();
            $(currentTab).show();
    
            return false;
        });
    });
	
});