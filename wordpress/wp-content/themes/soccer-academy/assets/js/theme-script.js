function soccer_academy_gb_Menu_open() {
	jQuery(".side_gb_nav").addClass('show');
}
function soccer_academy_gb_Menu_close() {
	jQuery(".side_gb_nav").removeClass('show');
}

jQuery(function($){
  
	$('.gb_toggle').click(function () {
    soccer_academy_Keyboard_loop($('.side_gb_nav'));
  });

  jQuery(window).scroll(function(){
  	if (jQuery(this).scrollTop() > 50) {
  		jQuery('.scrollup').addClass('is-active');
  	} else {
    		jQuery('.scrollup').removeClass('is-active');
  	}
  });
  
  jQuery(window).scroll(function(){
    if (jQuery(this).scrollTop() > 120) {
      jQuery('.menu_header').addClass('fixed');
    } else {
        jQuery('.menu_header').removeClass('fixed');
    }
  });

  jQuery( document ).ready(function() {
  	jQuery('#soccer-academy-scroll-to-top').click(function (argument) {
  		jQuery("html, body").animate({
        scrollTop: 0
      }, 600);
  	})
  })

});

jQuery('document').ready(function(){
  var owl = jQuery('#player .owl-carousel');
    owl.owlCarousel({
    margin:20,
    nav: true,
    autoplay :true,
    lazyLoad: true,
    autoplayTimeout: 3000,
    loop: true,
    dots:false,
    navText : ['<i class="fa fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
    responsive: {
      0: {
        items: 1
      },
      576: {
        items: 1
      },
      768: {
        items: 1
      },
      1000: {
        items: 1
      }
    },
    autoplayHoverPause : true,
    mouseDrag: true
  });
});


/* Custom Cursor
 **-----------------------------------------------------*/
// Add this in custom-cursor.js
jQuery(document).ready(function($) {
  var cursor = $(".custom-cursor");
  var follower = $(".custom-cursor-follower");
  var offsetX = 15; // Set your desired horizontal offset
  var offsetY = 15; // Set your desired vertical offset

  $(document).mousemove(function(e) {
    cursor.css({
      top: e.clientY - offsetY + "px",
      left: e.clientX - offsetX + "px"
    });
    follower.css({
      top: e.clientY + "px",
      left: e.clientX + "px"
    });
  });

  $("a, button").hover(
    function() {
      cursor.addClass("active");
      follower.addClass("active");
    },
    function() {
      cursor.removeClass("active");
      follower.removeClass("active");
    }
  );
});

/*preloader*/
jQuery(document).ready(function($) {

  // Function to hide preloader
  function hidePreloader() {
    $("#preloader ").delay(2000).fadeOut("slow");
  }

  // Check if all resources have been loaded
  if (document.readyState === "complete") {
    hidePreloader();
  } else {
    window.onload = hidePreloader;
  }
});


// SEARCH POPUP

// jQuery(document).ready(function($){
//   $('.header-search-wrapper .search-main').click(function(){
//       $('.search-form-main').toggleClass('active-search');
//       $('.search-form-main .search-field').focus();
//   });
// });



jQuery(document).ready(function($) {
    $('.header-search-wrapper .search-main').click(function() {
        $('.search-form-main').toggleClass('active-search');
        $('.search-form-main .search-field').focus();
        $('.header-search-wrapper').toggleClass('icon-toggle');
    });

    $('.search-close-icon').click(function() {
        $('.search-form-main').removeClass('active-search');
        $('.header-search-wrapper').removeClass('icon-toggle');
    });
});
