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

	$('#awards').slick({
		dots: false,
		infinite: true,
        arrows:true,
		fade: false,
		autoplay: true,
  		autoplaySpeed: 3000,
  		speed: 800,
		slidesToShow: 6,
		slidesToScroll: 1,
    	swipeToSlide: true,
		cssEase: 'ease-in-out',
        responsive: [
            {
                breakpoint: 1025,
                settings: {
                    slidesToShow: 4,
                }
            },
            {
              breakpoint: 821,
              settings: {
                    slidesToShow: 3,
                }
            },
            {
              breakpoint: 601,
              settings: {
                    slidesToShow: 2,
                }
            }
        ]
	});

    $('#publications-slider').slick({
		dots: false,
		infinite: true,
		fade: false,
		autoplay: false,
  		speed: 800,
		slidesToShow: 2,
		slidesToScroll: 1,
		prevArrow: $('.prev-arrow'),
        nextArrow: $('.next-arrow'),
    	swipeToSlide: true,
		cssEase: 'ease-in-out',
		responsive: [
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
			}
        ]
	});
	
});