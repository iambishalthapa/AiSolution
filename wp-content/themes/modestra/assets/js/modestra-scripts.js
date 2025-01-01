(function ($) {
  "use strict";
  //Loading AOS animation with css class

  //fade animation
  $(".modestra-fade-up").attr({
    "data-aos": "fade-up",
  });
  $(".modestra-fade-down").attr({
    "data-aos": "fade-down",
  });
  $(".modestra-fade-left").attr({
    "data-aos": "fade-left",
  });
  $(".modestra-fade-right").attr({
    "data-aos": "fade-right",
  });
  $(".modestra-fade-up-right").attr({
    "data-aos": "fade-up-right",
  });
  $(".modestra-fade-up-left").attr({
    "data-aos": "fade-up-left",
  });
  $(".modestra-fade-down-right").attr({
    "data-aos": "fade-down-right",
  });
  $(".modestra-fade-down-left").attr({
    "data-aos": "fade-down-left",
  });

  //slide animation
  $(".modestra-slide-left").attr({
    "data-aos": "slide-left",
  });
  $(".modestra-slide-right").attr({
    "data-aos": "slide-right",
  });
  $(".modestra-slide-up").attr({
    "data-aos": "slide-up",
  });
  $(".modestra-slide-down").attr({
    "data-aos": "slide-down",
  });

  //zoom animation
  $(".modestra-zoom-in").attr({
    "data-aos": "zoom-in",
  });
  $(".modestra-zoom-in-up").attr({
    "data-aos": "zoom-in-up",
  });
  $(".modestra-zoom-in-down").attr({
    "data-aos": "zoom-in-down",
  });
  $(".modestra-zoom-in-left").attr({
    "data-aos": "zoom-in-left",
  });
  $(".modestra-zoom-in-right").attr({
    "data-aos": "zoom-in-right",
  });
  $(".modestra-zoom-out").attr({
    "data-aos": "zoom-out",
  });
  $(".modestra-zoom-out-up").attr({
    "data-aos": "zoom-out-up",
  });
  $(".modestra-zoom-out-down").attr({
    "data-aos": "zoom-out-down",
  });
  $(".modestra-zoom-out-left").attr({
    "data-aos": "zoom-out-left",
  });
  $(".modestra-zoom-out-right").attr({
    "data-aos": "zoom-out-right",
  });

  //flip animation
  $(".modestra-flip-up").attr({
    "data-aos": "flip-up",
  });
  $(".modestra-flip-down").attr({
    "data-aos": "flip-down",
  });
  $(".modestra-flip-left").attr({
    "data-aos": "flip-left",
  });
  $(".modestra-flip-right").attr({
    "data-aos": "flip-right",
  });

  //animation ease attributes
  $(".modestra-linear").attr({
    "data-aos-easing": "linear",
  });
  $(".modestra-ease").attr({
    "data-aos-easing": "ease",
  });
  $(".modestra-ease-in").attr({
    "data-aos-easing": "ease-in",
  });
  $(".modestra-ease-in-back").attr({
    "data-aos-easing": "ease-in-back",
  });
  $(".modestra-ease-out").attr({
    "data-aos-easing": "ease-out",
  });
  $(".modestra-ease-out-back").attr({
    "data-aos-easing": "ease-out-back",
  });
  $(".modestra-ease-in-out-back").attr({
    "data-aos-easing": "ease-in-out-back",
  });
  $(".modestra-ease-in-shine").attr({
    "data-aos-easing": "ease-in-shine",
  });
  $(".modestra-ease-out-shine").attr({
    "data-aos-easing": "ease-out-shine",
  });
  $(".modestra-ease-in-out-shine").attr({
    "data-aos-easing": "ease-in-out-shine",
  });
  $(".modestra-ease-in-quad").attr({
    "data-aos-easing": "ease-in-quad",
  });
  $(".modestra-ease-out-quad").attr({
    "data-aos-easing": "ease-out-quad",
  });
  $(".modestra-ease-in-out-quad").attr({
    "data-aos-easing": "ease-in-out-quad",
  });
  $(".modestra-ease-in-cubic").attr({
    "data-aos-easing": "ease-in-cubic",
  });
  $(".modestra-ease-out-cubic").attr({
    "data-aos-easing": "ease-out-cubic",
  });
  $(".modestra-ease-in-out-cubic").attr({
    "data-aos-easing": "ease-in-out-cubic",
  });
  $(".modestra-ease-in-quart").attr({
    "data-aos-easing": "ease-in-quart",
  });
  $(".modestra-ease-out-quart").attr({
    "data-aos-easing": "ease-out-quart",
  });
  $(".modestra-ease-in-out-quart").attr({
    "data-aos-easing": "ease-in-out-quart",
  });

  setTimeout(function () {
    AOS.init({
      once: true,
      duration: 1200,
    });
  }, 100);

  $(window).scroll(function () {
    var scrollTop = $(this).scrollTop();
    var modestraStickyMenu = $(".modestra-sticky-menu");
    var modestraStickyNavigation = $(".modestra-sticky-navigation");

    if (modestraStickyMenu.length && scrollTop > 0) {
      modestraStickyMenu.addClass("sticky-menu-enabled modestra-zoom-in-up");
    } else {
      modestraStickyMenu.removeClass("sticky-menu-enabled");
    }
  });
  jQuery(window).scroll(function () {
    if (jQuery(this).scrollTop() > 100) {
      jQuery(".modestra-scrollto-top a").fadeIn();
    } else {
      jQuery(".modestra-scrollto-top a").fadeOut();
    }
  });
  jQuery(".modestra-scrollto-top a").click(function () {
    jQuery("html, body").animate({ scrollTop: 0 }, 600);
    return false;
  });
})(jQuery);
