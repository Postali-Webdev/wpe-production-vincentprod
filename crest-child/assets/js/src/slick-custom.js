
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

	$('#publications-slider').slick({
		dots: false,
        arrows: true,
        appendArrows:'.publications-nav',
		infinite: true,
		fade: false,
		autoplay: false,
  		speed: 800,
		slidesToShow: 2,
		slidesToScroll: 1,
		prevArrow: '<button class="slider-arrow prev"><span class="icon-arrow"></span></button>',
    	nextArrow: '<button class="slider-arrow next"><span class="icon-arrow"></span></button>',
    	swipeToSlide: true,
		cssEase: 'ease-in-out',
		responsive: [
            {
                breakpoint: 821,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
			}
        ]
	});

    $('#achievements-slider').slick({
		dots: false,
        arrows: true,
        appendArrows:'.achievements-nav',
		infinite: false,
		fade: false,
		autoplay: false,
  		speed: 800,
		slidesToShow: 1,
		slidesToScroll: 1,
		prevArrow: '<button class="slider-arrow prev"><span class="icon-arrow"></span></button>',
    	nextArrow: '<button class="slider-arrow next"><span class="icon-arrow"></span></button>',
    	swipeToSlide: true,
		cssEase: 'ease-in-out',
	});
	
});