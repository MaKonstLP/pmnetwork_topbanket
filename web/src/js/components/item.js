'use strict';
import Swiper from 'swiper';
import 'slick-carousel';
import * as Lightbox from '../../../node_modules/lightbox2/dist/js/lightbox.js';

export default class Item{
	constructor($item){
		var self = this;
		this.sliders = new Array();

		$('[data-action="show_phone"]').on("click", function(){
			$(".object_book").addClass("_active");
			$(".object_book_hidden").addClass("_active");
			$(".object_book_interactive_part").removeClass("_hide");
			$(".object_book_send_mail").removeClass("_hide");
			ym(66603799,'reachGoal','showphone');
			dataLayer.push({'event': 'event-to-ga', 'eventCategory' : 'Search', 'eventAction' : 'ShowPhone'});
		});

		$('[data-action="show_form"]').on("click", function(){
			$(".object_book_send_mail").addClass("_hide");
			$(".send_restaurant_info").removeClass("_hide");
		});

		$('[data-action="show_mail_sent"]').on("click", function(){
			$(".send_restaurant_info").addClass("_hide");
			$(".object_book_mail_sent").removeClass("_hide");
		});

		$('[data-action="show_form_again"]').on("click", function(){
			$(".object_book_mail_sent").addClass("_hide");
			$(".send_restaurant_info").removeClass("_hide");
		});

		$('[data-title-address]').on('click', function(){
            let map_offset_top = $('.map').offset().top;
            let map_height = $('.map').height();
            let header_height = $('header').height();
            let window_height = $(window).height();
            let scroll_length = map_offset_top - header_height - ((window_height - header_height)/2) + map_height/2;
            $('html,body').animate({scrollTop:scroll_length}, 400);
        });

        $('[data-book-open]').on('click', function(){
            $(this).closest('.object_book_email').addClass('_form');
        })

        $('[data-book-email-reload]').on('click', function(){
            $(this).closest('.object_book_email').removeClass('_success');
            $(this).closest('.object_book_email').addClass('_form');
        })


	// 	var galleryThumbs = new Swiper('.gallery-thumbs', {
	// 		spaceBetween: 10,
	// 		slidesPerView: 5,
	// 		slidesPerColumn: 2,
	// 		freeMode: true,
	// 		watchSlidesVisibility: true,
	// 		watchSlidesProgress: true,

	// 		breakpoints: {
	// 			767: {
	// 				slidesPerView: 3,
	// 				slidesPerColumn: 1
	// 			}
	// 		}
	// 	});
	// 	var galleryTop = new Swiper('.gallery-top', {
	// 		spaceBetween: 10,
	// 		thumbs: {
	// 			swiper: galleryThumbs
	// 		}
	// 	});

	// 	$('.object_gallery._room').each((t,e) => {
	// 		let galleryRoomThumbs = new Swiper($(e).find('.gallery-thumbs-room'), {
	//             //el: ".gallery-thumbs-room",
	//             spaceBetween: 10,
	//             slidesPerView: 5,
	//             slidesPerColumn: 1,
	//             freeMode: true,
	//             watchSlidesVisibility: true,
	//             watchSlidesProgress: true,

	//             breakpoints: {
	//                 767: {
	//                     slidesPerView: 3,
	//                     slidesPerColumn: 1
	//                 }
	//             }
	//         });
	//         let galleryRoomTop = new Swiper($(e).find('.gallery-top-room'), {
	//             spaceBetween: 10,
	//             thumbs: {
	//                 swiper: galleryRoomThumbs
	//             }
	//         });

	//         this.sliders.push(galleryRoomThumbs);
	//         this.sliders.push(galleryRoomTop)
	// 	});

	// 	console.log(this.sliders);
	
	// document.querySelectorAll('.item_page_wrapper').forEach(n => {
	// 	const slider = new Swiper(n.querySelector('.swiper-container'), {
	// 		navigation: {
	// 			nextEl: n.querySelector('.swiper-button-next'),
	// 			prevEl: n.querySelector('.swiper-button-prev'),
	// 		},
	// 		// spaceBetween: 10,
	// 	});
	
	// 	const thumbs = new Swiper(n.querySelector('.swiper-container'), {
	// 		// spaceBetween: 5,
	// 		// centeredSlides: true,
	// 		// slidesPerView: 4,
	// 		// touchRatio: 0.2,
	// 		// slideToClickedSlide: true,
	// 		// direction: 'vertical',
	// 	});
	
	// 	slider.controller.control = thumbs;
	// 	thumbs.controller.control = slider;
	// });


	let swiper = new Swiper('.gallery-top', {
		pagination: {
			el: '.top_gallery_counter',
			type: 'fraction',
		},
		navigation: {
			nextEl: '.slider_btn_next',
			prevEl: '.slider_btn_prev',
		},
	});

	let swiper1 = new Swiper('.room_swiper_container', {
		pagination: {
			el: '.room_gallery_counter',
			type: 'fraction',
		},
		navigation: {
			nextEl: '.room_slider_btn_next',
			prevEl: '.room_slider_btn_prev',
		},
		on:{
			activeIndexChange: function () {
				console.log(this.isBeginning, this.isEnd);
				console.log(this.el)
			},
		}
	});

	}
 }
