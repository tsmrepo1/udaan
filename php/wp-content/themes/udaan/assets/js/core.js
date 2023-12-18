(function ($) {
	$(document).ready(function () {
		var swiper = new Swiper('.swiper-container', {
			pagination: '.swiper-pagination',
			paginationClickable: true,
			nextButton: '.swiper-button-next',
			prevButton: '.swiper-button-prev',
			spaceBetween: 30,
			autoplay: 5000,
			autoplayDisableOnInteraction: false
		});

		$(window).scroll(function () {
			if ($(document).scrollTop() > 50) {
				$('.navbar').addClass('shrink');
				$('.add').hide();
			} else {
				$('.navbar').removeClass('shrink');
				$('.add').show();
			}
		});
	});



// ---> Courses Carousel
  $(".courses-carousel").owlCarousel({
    loop: false,
    autoplay: false,
    autoWidth: true,
    items: 6,
    autoplayHoverPause: true,
    smartSpeed: 1000,
    margin: 12,
    nav: true,
    navText: ["<i class='fa-solid fa-chevron-left'></i>", "<i class='fa-solid fa-chevron-right'></i>"],
    dots: false,
    responsive: {
      0: {
        margin: 12,
      },
      576: {
        margin: 16,
      },
    },
  });


// ---> Custom tab function
  function tabInit(el) {
    const tButtons = $(el + " " + ".custom-tab__btn");
    const tPanes = $(el + " " + ".custom-tab__content .custom-tab__pane");

    tButtons.on("click", function (e) {
      e.preventDefault();
      tButtons.removeClass("active");
      $(this).addClass("active");

      tPanes.removeClass("active");
      $(el + " " + ".custom-tab__content .custom-tab__pane[data-id=" + "'" + $(this).attr("data-target") + "'" + "]").addClass("active");
    });
  }

  tabInit("#topCollegesTab");



 

  
})(jQuery);





