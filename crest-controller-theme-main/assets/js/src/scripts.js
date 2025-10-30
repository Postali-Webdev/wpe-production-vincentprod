/**
 * Theme scripting
 *
 * @package Postali Crest Controller Theme
 * @author Postali LLC
 */
/*global jQuery: true */
/*jslint white: true */
/*jshint browser: true, jquery: true */

jQuery( function ( $ ) {
	"use strict";
    console.log('parent scripts ready!');
    // set all needed classes when we start
    $('.sub-menu').addClass('closed');

    //Hamburger animation
    $('.toggle-nav').click(function() {
        $(this).toggleClass('active');
        $('.nav-container').toggleClass('opened');
        $('.nav-container').toggleClass('active'); 
        $('.sub-menu').removeClass('opened');
        $('.sub-menu').addClass('closed');
        return false;
    });
     
    //Close navigation on anchor tap
    $('.active').click(function() {	
        $('.nav-container').addClass('closed');
        $('.nav-container').toggleClass('opened');
        $('.nav-container .sub-menu').removeClass('opened');
        $('.nav-container .sub-menu').addClass('closed');
    });	

    //Mobile menu accordion toggle for sub pages
    $('.nav-container > ul.menu > li.menu-item-has-children').prepend('<div class="accordion-toggle"><span class="icon-arrow"></span></div>');
    $('.nav-container > ul.menu > li.menu-item-has-children > .sub-menu').prepend('<div class="child-close"><span class="icon-chevron-left"></span> back</div>');

    //Mobile menu accordion toggle for third-level pages
    $('.nav-container > ul.menu > li.menu-item-has-children > .sub-menu > li.menu-item-has-children').prepend('<div class="accordion-toggle2"><span class="icon-arrow"></span></div>');
    $('.nav-container > ul.menu > li.menu-item-has-children > .sub-menu > li.menu-item-has-children > .sub-menu').prepend('<div class="tertiary-close"><span class="icon-chevron-left"></span> back</div>');

    $('.nav-container .accordion-toggle').click(function(event) {
        event.preventDefault();
        $(this).siblings('.sub-menu').addClass('opened');
        $(this).siblings('.sub-menu').removeClass('closed');
        console.log('clicked');
    });

    $('.nav-container .accordion-toggle2').click(function(event) {
        event.preventDefault();
        $(this).siblings('.sub-menu').addClass('opened');
        $(this).siblings('.sub-menu').removeClass('closed');
        console.log('clicked');
    });

    $('.child-close').click(function() {
        $(this).parent().toggleClass('opened');
        $(this).parent().toggleClass('closed');
    });

    $('.tertiary-close').click(function() {
        $(this).parent().toggleClass('opened');
        $(this).parent().toggleClass('closed');
    });

    // desktop child click close parent subnav
    $('.nav-container > .menu > li.menu-item-has-children > .sub-menu > li > a').click(function(event) {
        $(this).closest('.sub-menu').css('display', 'none');
    });

    //add button before child links on landing page
    $("<div class='all-pages'>View All Pages <span></span></div>").insertBefore('.children');
    $('.all-pages').click(function() {
        $(this).toggleClass("active");
        $(this).parent().find('.children').toggleClass("active");
        $(this).parent().find('.children').slideToggle(400);
	});

    // script to make accordions function
	$(".accordions").on("click", ".accordions_title", function() {
        // will (slide) toggle the related panel.
        $(this).toggleClass("active").next().slideToggle();
        $(this).parent().toggleClass("active");
    });

	// Toggle search function in nav
	$( document ).ready( function() {
		var width = $(document).outerWidth();
		if (width > 992) {
			var open = false;
			$('#search-button').attr('type', 'button');
			
			$('#search-button').on('click', function(e) {
					if ( !open ) {
						$('#search-input-container').removeClass('hdn');
						$('#search-button span').removeClass('icon-icon-search').addClass('icon-icon-close');
						$('.nav-container li.menu-item').addClass('disable');
						open = true;
						return;
					}
					if ( open ) {
						$('#search-input-container').addClass('hdn');
						$('#search-button span').removeClass('icon-icon-close').addClass('icon-icon-search');
						$('.nav-container li.menu-item').removeClass('disable');
						open = false;
						return;
					}
			}); 
			$('html').on('click', function(e) {
				var target = e.target;
				if( $(target).closest('.navbar-form-search').length ) {
					return;
				} else {
					if ( open ) {
						$('#search-input-container').addClass('hdn');
						$('#search-button span').removeClass('icon-icon-close').addClass('icon-icon-search');
						$('.nav-container li.menu-item').removeClass('disable');
						open = false;
						return;
					}
				}
			});
		}
	});


    $(window).scroll(function(){
        if ($(this).scrollTop() > 50) {
           $('header').addClass('scrolled');
        } else {
           $('header').removeClass('scrolled');
        }
    });

});