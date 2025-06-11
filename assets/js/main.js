/* ===================================================================
    
    Author          : Valid Theme
    Template Name   : Digalu - Digital Marketing Agency Template
    Version         : 1.0
    
* ================================================================= */
(function($) {
	"use strict";

	$(document).ready(function() {


		if ($('.custom-flex-wrap-class').hasClass('custom-flex-wrap-class')) {
			$('.custom-flex-wrap-class .elementor-column-gap-no').addClass('digalu-flex');
		}


		/* ==================================================
		    # Wow Init
		 ===============================================*/
		var wow = new WOW({
			boxClass: 'wow', // animated element css class (default is wow)
			animateClass: 'animated', // animation css class (default is animated)
			offset: 0, // distance to the element when triggering the animation (default is 0)
			mobile: true, // trigger animations on mobile devices (default is true)
			live: true // act on asynchronously loaded content (default is true)
		});
		wow.init();


		/* ==================================================
		    # Tooltip Init
		===============================================*/
		$('[data-toggle="tooltip"]').tooltip();


		/* ==================================================
		    # Youtube Video Init
		 ===============================================*/
		$('.player').mb_YTPlayer();


		/* ==================================================
		    # Slide Animated Button
		===============================================*/
		var $slideLink = $(".text-slide"),
			slideLinkText = $slideLink.find("span")[0];

		$slideLink.on("mouseenter", linkOver);

		function linkOver() {
			TweenLite.to(slideLinkText, 0.3, {
				y: -25,
				ease: Cubic.easeIn,
				onComplete: function() {
					TweenLite.fromTo(slideLinkText, 0.3, {
						y: 25
					}, {
						y: 0,
						ease: Cubic.easeOut
					})
				}
			});
		}


		/* ==================================================
            # imagesLoaded active
        ===============================================*/
        $('#portfolio-grid,.blog-masonry').imagesLoaded(function() {

            /* Filter menu */
            $('.mix-item-menu').on('click', 'button', function() {
                var filterValue = $(this).attr('data-filter');
                $grid.isotope({
                    filter: filterValue
                });
            });

            /* filter menu active class  */
            $('.mix-item-menu button').on('click', function(event) {
                $(this).siblings('.active').removeClass('active');
                $(this).addClass('active');
                event.preventDefault();
            });

            /* Filter active */
            var $grid = $('#portfolio-grid').isotope({
                itemSelector: '.pf-item',
                percentPosition: true,
                masonry: {
                    columnWidth: '.pf-item',
                }
            });

            /* Filter active */
            $('.blog-masonry').isotope({
                itemSelector: '.blog-item',
                percentPosition: true,
                masonry: {
                    columnWidth: '.blog-item',
                }
            });

        });


		/* ==================================================
		    # Fun Factor Init
		===============================================*/
		// $('.timer').countTo();
		// $('.fun-fact').appear(function() {
		// 	$('.timer').countTo();
		// }, {
		// 	accY: -100
		// });


		/* ==================================================
		    # Magnific popup init
		 ===============================================*/
		$(".popup-link").magnificPopup({
			type: 'image',
			// other options
		});

		$(".popup-gallery").magnificPopup({
			type: 'image',
			gallery: {
				enabled: true
			},
			// other options
		});

		$(".popup-youtube, .popup-vimeo, .popup-gmaps").magnificPopup({
			type: "iframe",
			mainClass: "mfp-fade",
			removalDelay: 160,
			preloader: false,
			fixedContentPos: false
		});

		$('.magnific-mix-gallery').each(function() {
			var $container = $(this);
			var $imageLinks = $container.find('.item');

			var items = [];
			$imageLinks.each(function() {
				var $item = $(this);
				var type = 'image';
				if ($item.hasClass('magnific-iframe')) {
					type = 'iframe';
				}
				var magItem = {
					src: $item.attr('href'),
					type: type
				};
				magItem.title = $item.data('title');
				items.push(magItem);
			});

			$imageLinks.magnificPopup({
				mainClass: 'mfp-fade',
				items: items,
				gallery: {
					enabled: true,
					tPrev: $(this).data('prev-text'),
					tNext: $(this).data('next-text')
				},
				type: 'image',
				callbacks: {
					beforeOpen: function() {
						var index = $imageLinks.index(this.st.el);
						if (-1 !== index) {
							this.goTo(index);
						}
					}
				}
			});
		});


		/* ==================================================
		    _Progressbar Init
		 ===============================================*/
		function animateElements() {
			$('.progressbar').each(function() {
				var elementPos = $(this).offset().top;
				var topOfWindow = $(window).scrollTop();
				var percent = $(this).find('.circle').attr('data-percent');
				var animate = $(this).data('animate');
				if (elementPos < topOfWindow + $(window).height() - 30 && !animate) {
					$(this).data('animate', true);
					$(this).find('.circle').circleProgress({
						// startAngle: -Math.PI / 2,
						value: percent / 100,
						size: 90,
						thickness: 3,
						lineCap: 'round',
						emptyFill: '#f1f1f1',
						fill: {
							gradient: ['#0c5adb']
						}
					}).on('circle-animation-progress', function(event, progress, stepValue) {
						$(this).find('strong').text((stepValue * 100).toFixed(0) + "%");
					}).stop();
				}
			});

			$('.progressbar-hard').each(function() {
				var elementPos = $(this).offset().top;
				var topOfWindow = $(window).scrollTop();
				var percent = $(this).find('.circle').attr('data-percent');
				var animate = $(this).data('animate');
				if (elementPos < topOfWindow + $(window).height() - 30 && !animate) {
					$(this).data('animate', true);
					$(this).find('.circle').circleProgress({
						// startAngle: -Math.PI / 2,
						value: percent / 100,
						size: 110,
						thickness: 10,
						lineCap: 'round',
						emptyFill: '#f1f1f1',
						fill: {
							gradient: ['#0c5adb']
						}
					}).on('circle-animation-progress', function(event, progress, stepValue) {
						$(this).find('strong').text((stepValue * 100).toFixed(0) + "%");
					}).stop();
				}
			});
		}

		animateElements();
		$(window).scroll(animateElements);


		/* ==================================================
            # Banner Carousel
         ===============================================*/
		const bannerSlide = new Swiper(".banner-slide", {
			// Optional parameters
			direction: "horizontal",
			loop: false,
			grabCursor: true,
			autoplay: true,
			speed: 2000,

			// If we need pagination
			pagination: {
				el: '.swiper-pagination',
				type: 'bullets',
				clickable: true,
			},

			// Navigation arrows
			navigation: {
				nextEl: ".swiper-button-next",
				prevEl: ".swiper-button-prev"
			}

			// And if we need scrollbar
			/*scrollbar: {
            el: '.swiper-scrollbar',
          },*/
		});

		/* ==================================================
		    # Project Carousel
		 ===============================================*/
		const swiperStage = new Swiper(".carousel-stage", {
			// Optional parameters
			loop: true,
			freeMode: true,
			grabCursor: true,
			slidesPerView: 1,
			centeredSlides: true,
			spaceBetween: 15,
			pagination: {
				el: ".swiper-pagination",
				clickable: true,
			},
			// Navigation arrows
			navigation: {
				nextEl: ".swiper-button-next",
				prevEl: ".swiper-button-prev"
			},
			breakpoints: {
				800: {
					slidesPerView: 2.5,
				},
			},
		});



		/* ==================================================
		    # Brand Carousel
		 ===============================================*/
		// const brand3col = new Swiper(".brand3col", {
		// 	// Optional parameters
		// 	loop: true,
		// 	slidesPerView: 2,
		// 	spaceBetween: 30,
		// 	autoplay: true,
		// 	pagination: {
		// 		el: ".swiper-pagination",
		// 		clickable: true,
		// 	},
		// 	// Navigation arrows
		// 	navigation: {
		// 		nextEl: ".swiper-button-next",
		// 		prevEl: ".swiper-button-prev"
		// 	},
		// 	breakpoints: {
		// 		768: {
		// 			slidesPerView: 3,
		// 			spaceBetween: 30,
		// 		},
		// 		992: {
		// 			slidesPerView: 3,
		// 			spaceBetween: 30,
		// 		}
		// 	},
		// });


		/* ==================================================
		    # Brand Carousel
		 ===============================================*/
		const brand4col = new Swiper(".brand4col", {
			// Optional parameters
			loop: true,
			slidesPerView: 2,
			spaceBetween: 30,
			autoplay: true,
			pagination: {
				el: ".swiper-pagination",
				clickable: true,
			},
			// Navigation arrows
			navigation: {
				nextEl: ".swiper-button-next",
				prevEl: ".swiper-button-prev"
			},
			breakpoints: {
				768: {
					slidesPerView: 3,
					spaceBetween: 40,
				},
				992: {
					slidesPerView: 4,
					spaceBetween: 60,
				}
			},
		});


		/* ==================================================
		    # Testimonails Carousel
		 ===============================================*/
		const testimonialCarousel = new Swiper(".testimonial-style-one-carousel", {
			// Optional parameters
			loop: true,
			slidesPerView: 1,
			spaceBetween: 30,
			autoplay: true,
			pagination: {
				el: ".swiper-pagination",
				clickable: true,
			},
			// Navigation arrows
			navigation: {
				nextEl: ".swiper-button-next",
				prevEl: ".swiper-button-prev"
			},
			breakpoints: {
				768: {
					slidesPerView: 1,
				},
				1200: {
					slidesPerView: 2,
				}
			},
		});


		/* ==================================================
		    # Project Carousel
		 ===============================================*/
		const projectCarousel = new Swiper(".project-carousel", {
			// Optional parameters
			loop: true,
			slidesPerView: 1,
			spaceBetween: 30,
			autoplay: true,
			pagination: {
				el: ".swiper-pagination",
				clickable: true,
			},

			// If we need pagination
			pagination: {
				el: '.swiper-pagination',
				type: 'fraction'
			},

			// Navigation arrows
			navigation: {
				nextEl: ".swiper-button-next",
				prevEl: ".swiper-button-prev"
			},
			breakpoints: {
				768: {
					slidesPerView: 2,
					spaceBetween: 30,
				},
				992: {
					slidesPerView: 2,
					spaceBetween: 30,
				}
			},
		});


		/* ==================================================
            # Banner Carousel
         ===============================================*/
		//  const bannerFade = new Swiper(".banner-fade", {
		// 	// Optional parameters
		// 	direction: "horizontal",
		// 	loop: true,
		// 	autoplay: true,
		// 	effect: "fade",
		// 	fadeEffect: {
		// 		crossFade: true
		// 	},
		// 	speed: 3000,
		// 	autoplay: {
		// 		delay: 5000,
		// 		disableOnInteraction: false,
		// 	},
		// 	// If we need pagination
		// 	pagination: {
		// 		el: '.swiper-pagination',
		// 		type: 'bullets',
		// 		clickable: true,
		// 	},

		// 	// Navigation arrows
		// 	navigation: {
		// 		nextEl: ".swiper-button-next",
		// 		prevEl: ".swiper-button-prev"
		// 	}

		// 	// And if we need scrollbar
		// 	/*scrollbar: {
  //           el: '.swiper-scrollbar',
  //         },*/
		// });

		/* ==================================================
            # Stage Carousel
         ===============================================*/
		//  const stageCarousel = new Swiper(".stage-carousel", {
		// 	// Optional parameters
		// 	loop: true,
		// 	freeMode: true,
		// 	grabCursor: true,
		// 	slidesPerView: 1,
		// 	spaceBetween: 30,
		// 	autoplay: true,
		// 	// If we need pagination
		// 	pagination: {
		// 		el: '.swiper-pagination',
		// 		clickable: true,
		// 	},
		// 	// Navigation arrows
		// 	navigation: {
		// 		nextEl: ".swiper-button-next",
		// 		prevEl: ".swiper-button-prev"
		// 	},
		// 	breakpoints: {
		// 		768: {
		// 			slidesPerView: 2,
		// 			spaceBetween: 50,
		// 		},
		// 		1400: {
		// 			slidesPerView: 2.5,
		// 			spaceBetween: 60,
		// 		},

		// 		1800: {
		// 			spaceBetween: 60,
		// 			slidesPerView: 2.8,
		// 		},
		// 	},
		// });


		/* ==================================================
		    # SEO Carousel
		 ===============================================*/
		const seoCarousel = new Swiper(".seo-carousel", {
			// Optional parameters
			loop: true,
			slidesPerView: 1,
			spaceBetween: 30,
			autoplay: true,
			pagination: {
				el: ".swiper-pagination",
				clickable: true,
			},
			// Navigation arrows
			navigation: {
				nextEl: ".swiper-button-next",
				prevEl: ".swiper-button-prev"
			},
			breakpoints: {
				768: {
					slidesPerView: 2,
				},
				992: {
					slidesPerView: 3,
					spaceBetween: 40,
				}
			},
		});

		/* ==================================================
            # Related Product Carousel
         ===============================================*/
         const relatedProduct = new Swiper(".related-product-carousel", {
            // Optional parameters
            loop: true,
            slidesPerView: 1,
            spaceBetween: 30,
            autoplay: true,
            breakpoints: {
                768: {
                    slidesPerView: 3,
                },
                992: {
                    slidesPerView: 3,
                },
                1200: {
                    slidesPerView: 4,
                },
            },
        });

         /* ==================================================
            # Product Gallery Carousel
         ===============================================*/
         const productGallery = new Swiper(".product-gallery-carousel", {
            // Optional parameters
            loop: true,
            slidesPerView: 2,
            spaceBetween: 30,
            autoplay: true,
            breakpoints: {
                768: {
                    slidesPerView: 3,
                },
                992: {
                    slidesPerView: 3,
                },
                1200: {
                    slidesPerView: 4,
                },
            },
        });


		/* ==================================================
		    # Scrolla active
		===============================================*/
		$('.animate').scrolla();


		/* ==================================================
        Preloader Init
     	===============================================*/
		function loader() {
			$(window).on('load', function() {
				$('#ambrox-preloader').addClass('loaded');
				$("#loading").fadeOut(500);
				// Una vez haya terminado el preloader aparezca el scroll

				if ($('#ambrox-preloader').hasClass('loaded')) {
					// Es para que una vez que se haya ido el preloader se elimine toda la seccion preloader
					$('#preloader').delay(900).queue(function() {
						$(this).remove();
					});
				}
			});
		}
		loader();



		// /* ==================================================
		//     Contact Form Validations
		// ================================================== */
		// $('.contact-form').each(function() {
		// 	var formInstance = $(this);
		// 	formInstance.submit(function() {

		// 		var action = $(this).attr('action');

		// 		$("#message").slideUp(750, function() {
		// 			$('#message').hide();

		// 			$('#submit')
		// 				.after('<img src="assets/img/ajax-loader.gif" class="loader" />')
		// 				.attr('disabled', 'disabled');

		// 			$.post(action, {
		// 					name: $('#name').val(),
		// 					email: $('#email').val(),
		// 					phone: $('#phone').val(),
		// 					comments: $('#comments').val()
		// 				},
		// 				function(data) {
		// 					document.getElementById('message').innerHTML = data;
		// 					$('#message').slideDown('slow');
		// 					$('.contact-form img.loader').fadeOut('slow', function() {
		// 						$(this).remove()
		// 					});
		// 					$('#submit').removeAttr('disabled');
		// 				}
		// 			);
		// 		});
		// 		return false;
		// 	});
		// });

	}); // end document ready function
})(jQuery); // End jQuery