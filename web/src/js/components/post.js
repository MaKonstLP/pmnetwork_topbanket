'use strict';
import Swiper from 'swiper';

export default class Post{
	constructor($block){
		self = this;
		this.block = $block;
		
		var postGalleryThumbs = new Swiper('.post-gallery-thumbs', {
	        spaceBetween: 5,
	        slidesPerView: 7,
	        slidesPerColumn: 1,
	        freeMode: true,
	        watchSlidesVisibility: true,
	        watchSlidesProgress: true,

	        breakpoints: {
	            1440: {
	              slidesPerView: 5,
	            },

	            767: {
	              slidesPerView: 4,
	            }
	        }
	      });
	      var postGalleryTop = new Swiper('.post-gallery-top', {
			spaceBetween: 0,
			thumbs: {
				swiper: postGalleryThumbs
			}
	      }); 
	}
}