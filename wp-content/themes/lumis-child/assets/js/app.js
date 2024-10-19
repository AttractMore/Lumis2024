(function ($) {
  // "use strict"; // Start of use strict
  // "use strict"; // Start of use strict
  $.fn.extend({
    // Define the threeBarToggle function by extending the jQuery object
    threeBarToggle: function (options) {
      // Set the default options
      var defaults = {
        color: "black",
        width: 30,
        height: 25,
        speed: 300,
        animate: true,
      };
      var options = $.extend(defaults, options);

      return this.each(function () {
        $(this).empty().css({ "width": options.width, "height": options.height, "background": "transparent" });
        $(this).addClass("tb-menu-toggle");
        // $('#page').addClass('tb-menu-toggle');
        $(this)
          .prepend("<i></i><i></i><i></i>")
          .on("click", function (event) {
            event.preventDefault();
            $(this).toggleClass("tb-active-toggle");
            // $('#page').toggleClass('content_overlay_active');
            $("#content_overlay_").toggleClass("content_overlay_onoff");
            $(".site-branding").toggleClass("content_overlay_active");
            $("body").toggleClass("unset_scroll");
            if (options.animate) {
              $(this).toggleClass("tb-animate-toggle");
            }
            $(".tb-mobile-menu").slideToggle(options.speed);
            // $('#page').hide();
          });
        $(this).children().css("background", options.color);
      });
    },

    // Define the accordionMenu() function that adds the sliding functionality
    accordionMenu: function (options) {
      // Set the default options
      var defaults = {
        speed: 400,
      };
      var options = $.extend(defaults, options);

      return this.each(function () {
        $(this).addClass("tb-mobile-menu");
        var menuItems = $(this).children("li");
        menuItems.find(".sub-menu").parent().addClass("tb-parent");
        $(".tb-parent ul").hide();
        $(".tb-parent > a").on("click", function (event) {
          event.stopPropagation();
          event.preventDefault();
          $(this).siblings().slideToggle(options.speed);
        });
      });
    },
  });
  $(".menu-item-has-children").children("a").attr("href", "javascript:void(0)");

  // Convert any element into a three bar toggle
  // Optional arguments are 'speed' (number in ms, 'slow' or 'fast') and 'animation' (true or false) to disable the animation on the toggle
  $("#menu-toggle").threeBarToggle({ color: "#ffffff", width: 30, height: 25 });

  // Make any nested ul-based menu mobile
  // Optional arguments are 'speed' and 'accordion' (true or false) to disable the behavior of closing other sub
  $("#mobile_menu").accordionMenu();

  if (screen.width <= 991) {
    /* Change mobile header on scroll */
    $(window).on("scroll", function () {
      if ($(this).scrollTop() > 50) {
        $("#masthead").addClass("sticky_desktop_header ");
      } else {
        $("#masthead").removeClass("sticky_desktop_header ");
      }
    });
  }

  /* Accessible Submenu */
  if (screen.width >= 991) {
    $(".lumis-top-menu li.menu-item-has-children > a").on("click", function (e) {
      $(this).siblings("ul.sub-menu").toggle();
      e.preventDefault();
    });
  }
})(jQuery);
window.onscroll = function () {
  throttle(stickyHeaderOnScroll(), 1000);
};

var header = document.querySelector(".menu_desktop");
var sticky = header.offsetTop;
var logo = document.querySelector(".custom-logo");
var rightcol = document.querySelector(".right_column_header_text");
var mobile_nav = document.querySelector("#mobile_menu");
var mobile_nav_button = document.querySelector("#menu-toggle");

function stickyHeaderOnScroll() {
  if (window.pageYOffset > 220) {
    // header.classList.add("sticky_desktop_header");
    logo.classList.add("small");
    rightcol.classList.add("rightcolpad");
    header.classList.add("header_shadow");
    mobile_nav.classList.add("mobile_nav_scrolled");
    mobile_nav_button.classList.add("mobile_button_scrolled");
    // content_page.style.marginTop="255";
  } else {
    // header.classList.remove("sticky_desktop_header");
    logo.classList.remove("small");
    rightcol.classList.remove("rightcolpad");
    header.classList.remove("header_shadow");
    mobile_nav.classList.remove("mobile_nav_scrolled");
    mobile_nav_button.classList.remove("mobile_button_scrolled");
  }
}
/* throttle */
function throttle(fn, wait) {
  var time = Date.now();
  return function () {
    if (time + wait - Date.now() < 0) {
      fn();
      time = Date.now();
    }
  };
}

/* Validation Events for changing response CSS classes */
document.addEventListener(
  "wpcf7invalid",
  function (event) {
    $(".wpcf7-response-output").addClass("alert alert-danger");
  },
  false
);
document.addEventListener(
  "wpcf7spam",
  function (event) {
    $(".wpcf7-response-output").addClass("alert alert-warning");
  },
  false
);
document.addEventListener(
  "wpcf7mailfailed",
  function (event) {
    $(".wpcf7-response-output").addClass("alert alert-warning");
  },
  false
);
document.addEventListener(
  "wpcf7mailsent",
  function (event) {
    $(".wpcf7-response-output").addClass("alert alert-success");
  },
  false
);

/**
 * Testimonials slider
 */

if (document.body.classList.contains("page-template-services-2024-page")) {
  if (document.getElementById("testimonial-set")) {
    const slidesContainer = document.getElementById("testimonial-set");
    const slide = document.querySelector(".testimonial");

    const prevButton = document.getElementById("slide-arrow-prev");
    const nextButton = document.getElementById("slide-arrow-next");

    const allSlides = document.querySelectorAll(".testimonial");
    const numSlides = allSlides.length;
    //Current slide index initialised to 0
    let index = 0;
    compStyles = window.getComputedStyle(slidesContainer);
    gapPx = compStyles.getPropertyValue("--testimonial-gap");
    gap = parseInt(gapPx, 10);

    nextButton.addEventListener("click", () => {
      const slideWidth = slide.clientWidth + gap;
      slidesContainer.scrollLeft += slideWidth;
      index = index + 1;
      buttonDisplay(index);
    });
    prevButton.addEventListener("click", () => {
      const slideWidth = slide.clientWidth + gap;
      slidesContainer.scrollLeft -= slideWidth;
      index = index - 1;
      buttonDisplay(index);
    });
    function buttonDisplay(index) {
      if (index == 0) {
        prevButton.style.display = "none";
      } else {
        prevButton.style.display = "block";
      }
      if (index === numSlides - 2) {
        nextButton.style.display = "none";
      } else {
        nextButton.style.display = "block";
      }
    }
  }
}
