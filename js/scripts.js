//=include ../node_modules/@popperjs/core/dist/umd/popper.js
//=include ../node_modules/bootstrap/dist/js/bootstrap.js
//=include ../node_modules/vanilla-lazyload/dist/lazyload.js
//=include ../node_modules/sticky-js/dist/sticky.min.js
//=include ../node_modules/basiclightbox/dist/basicLightbox.min.js
//=include ./components/videoplayer.js
//=include ./vendor/jquery.marquee.min.js
//=include ./vendor/ScrollTrigger.min.js
//=include ./vendor/vivus.min.js

gsap.config({
  nullTargetWarn: false,
  trialWarn: false
});

gsap.registerPlugin(ScrollTrigger);

function isMobile() {
  return window.matchMedia("(max-width:767px)").matches;
}

initPolyfills();

$(document).ready(function () {
  // Hides filters toggle box when clicked outside of the box
  $(document).on("click", "body.blog", function (e) {
    if (
      e.target.id == "filter-block-filters" ||
      $(e.target).parents("#filter-block-filters").length ||
      e.target.id == "filter-block"
    ) {} else {
      $(".filter-block__filters").removeClass("show");
    }
  });

  /**
   * main Menu toggle function
   */
  $("#sisbanMenuToggle").click(function () {
    $(this).toggleClass("is-active");
    $("#sisbanMenu").toggleClass("active");
    $("#main-menu-overflow").toggleClass(
      "overflow-customhide overflow-customhide--withbg"
    );
    $(".menu_dropdown").removeClass("menu_dropdown--active");
  });

  $("#sisbanMenuToggleMobile").click(function () {
    $(this).toggleClass("is-active");
    $("#sisbanMenuMobile").toggleClass("active");
    $("body").toggleClass("overflow-customhide");
    $(".menu_dropdown").removeClass("menu_dropdown--active");
  });

  $("#main-menu-overflow").click(function () {
    $(this).toggleClass("overflow-customhide overflow-customhide--withbg");
    $("#sisbanMenuToggle").toggleClass("is-active");
    $("#sisbanMenu").toggleClass("active");
    $(".menu_dropdown").removeClass("menu_dropdown--active");
  });

  $(".results-button-clear").on("click", function () {
    $("#news-page-year").val("");
    $('input[name="newsType"]').each(function () {
      this.checked = false;
    });
    get_filtered_news(true, true, 1);
  });

  $(".results-button-results").on("click", function () {
    get_filtered_news(true, true, 1);
  });

  $(".filter-block__toggle").on("click", function () {
    $(this).toggleClass("active");
    $(".filter-block__filters").toggleClass("show");
  });

  $(".styled-checkbox").click(function () {
    get_filtered_news(false, false, 1);
  });

  $("#news-page-year").on("change", function () {
    get_filtered_news(false, false, 1);
  });

  $(document).on("click", ".page-link", function (e) {
    e.preventDefault();
    let nextPage = $(this).data("page");
    get_filtered_news(true, true, nextPage);
    //alert("You've clicked the link. " + nextPage);
  });

  /**
   * dropdown class toggle function
   */
  $(".menu_dropdown > a").click(function (e) {
    $(".menu_dropdown").removeClass("menu_dropdown--active");
    e.preventDefault();
    $(this).parent().toggleClass("menu_dropdown--active");
  });

  /**
   * Example of starting a plugin with options.
   * I am just passing some of the options in the following example.
   * you can also start the plugin using $('.marquee').marquee(); with defaults
   */
  $("#textloop").marquee({
    //duration in milliseconds of the marquee
    duration: 10000,
    //gap in pixels between the tickers
    gap: 0,
    pauseOnHover: true,
    //time in milliseconds before the marquee will start animating
    delayBeforeStart: 0,
    //'left' or 'right'
    direction: "left",
    //true or false - should the marquee be duplicated to show an effect of continues flow
    duplicated: true,
  });

  /**
   * Homepage carousel/full slider
   */
  $("#sisbanCarousel").slick({
    arrows: false,
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    dots: true,
    autoplay: false,
    speed: 800,
    swipeToSlide: true,
    adaptiveHeight: true,
    dotsClass: "slick-dots sisbanCarousel__carousel__dots",
  });

  /**
   * Homepage carousel/full slider
   */
  $("#statsCrossfade").slick({
    arrows: false,
    dots: false,
    infinite: true,
    speed: 1000,
    fade: true,
    cssEase: 'linear',
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 1500,
  });

  /**
   * video gallery slider on news single page
   */
  $("#videoBlockNews").slick({
    arrows: true,
    infinite: false,
    slidesToShow: 1,
    slidesToScroll: 1,
    dots: true,
    autoplay: false,
    speed: 800,
    swipeToSlide: true
  });

  //ticking machine
  var percentTime;
  var tick;
  var time = 0.1;
  var progressBarIndex = 0;

  $(".progressBarContainer .progressBar").each(function (index) {
    var progress = "<div class='inProgress'></div>";
    $(this).html(progress);
  });

  function startProgressbar() {
    resetProgressbar();
    percentTime = 0;
    tick = setInterval(interval, 15);
  }

  function interval() {
    if (
      $(
        '.sisban-carousel .slick-slider .slick-track div[data-slick-index="' +
        progressBarIndex +
        '"]'
      ).attr("aria-hidden") === "true"
    ) {
      progressBarIndex = $(
        '.sisban-carousel .slick-slider .slick-track div[aria-hidden="false"]'
      ).data("slickIndex");
      startProgressbar();
    } else {
      percentTime += 1 / (time + 5);
      $(".inProgress").css({
        width: percentTime + "%",
      });
      if (percentTime >= 100) {
        $("#sisbanCarousel").slick("slickNext");
        progressBarIndex++;
        if (progressBarIndex > 2) {
          progressBarIndex = 0;
        }
        startProgressbar();
      }
    }
  }

  function resetProgressbar() {
    $(".inProgress").css({
      width: 0 + "%",
    });
    clearInterval(tick);
  }

  startProgressbar();
  // End ticking machine

  /**
   * Carousel/full slider
   */
  $(".sector-story-carousel").slick({
    lazyLoad: "ondemand",
    infinite: true,
    slidesToShow: 1,
    centerMode: true,
    centerPadding: "260px",
    slidesToScroll: 1,
    swipeToSlide: true,
    adaptiveHeight: true,
    responsive: [{
        breakpoint: 900,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          centerPadding: "100px",
        },
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          centerPadding: "0",
        },
      },
    ],
  });

  /**
   * brand slider on business overview page
   */
  $("#brand-slider").slick({
    lazyLoad: false,
    slidesToShow: 4,
    slidesToScroll: 1,
    swipeToSlide: true,
    variableWidth: true,
    swipeToSlide: true,
    responsive: [{
      breakpoint: 900,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      },
    }, ],
  });

  /**
   * brand slider on business overview page
   */
  $(".latest-news-carousel").slick({
    infinite: false,
    arrows: false,
    slidesToShow: 3,
    slidesToScroll: 1,
    swipeToSlide: true,
    responsive: [{
        breakpoint: 900,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 1.2,
          slidesToScroll: 1,
        },
      }
    ],
  });

  get_filtered_news(true, true, 1);
});

function initPolyfills() {
  // CSS object-fit for IE
  objectFitImages();

  // polyfill for IE - startsWith
  if (!String.prototype.startsWith) {
    String.prototype.startsWith = function (searchString, position) {
      position = position || 0;
      return this.indexOf(searchString, position) === position;
    };
  }

  // polyfill for IE - forEach
  if ("NodeList" in window && !NodeList.prototype.forEach) {
    NodeList.prototype.forEach = function (callback, thisArg) {
      thisArg = thisArg || window;
      for (var i = 0; i < this.length; i++) {
        callback.call(thisArg, this[i], i, this);
      }
    };
  }
}

// Get news based on filters
function get_filtered_news(showHTML, hideButtons, page) {
  // Categories
  let categories = [];
  $('input[type="checkbox"]:checked').each(function (i, v) {
    categories.push($(v).val());
  });

  // Date
  let date = $("#news-page-year option:selected").val();

  // Url
  let url = `/wp-admin/admin-ajax.php?action=get_news`;

  $.ajax({
    type: "get",
    url: url,
    data: {
      categories: categories,
      selectedDate: date,
      page: page,
    },
    success: function (response) {
      let result = JSON.parse(response);
      $(".results-button_text").text(`${result.totalPosts == 0 ? '' : "View"} ${result.totalPosts} results`);

      if (result.totalPosts == 0) {
        $(".results-button-results").addClass("disable");
      } else {
        $(".results-button-results").removeClass("disable");
      }

      if (showHTML && result.data) {
        let html = "";
        for (let i = 0; i < result.data.length; i++) {
          html += '<div class="col-12 col-md-6 col-lg-4">';
          html += '<article class="news-post-card">';
          html += `<div class="news-post-card__image">`;
          html += `<a href='${result.data[i].link}' title='${result.data[i].title}'><img src='${result.data[i].image}' /></a>`;
          html += "</div>";
          html += '<div class="typography news-post-card__inner">';
          html += '<p class="news-post-card__inner__meta">';
          html += `<time datetime="#">${result.data[i].date}</time>`;
          html += "</p>";
          html += '<h3 class="news-post-card__inner__title">';
          html += `<a href="${result.data[i].link}" title="${result.data[i].title}">${result.data[i].title}</a></h3>`;
          html += "</div>";
          html += "</article>";
          html += "</div>";
        }
        // Show our results
        $("#news-content").html(html);

        let navHTML = "";

        // If Next is not same as currect page
        if (page != 1) {
          navHTML += `<li class="page-item previous"><a class="page-link" href="#" data-page="${
            page == 1 ? "1" : page - 1
          }"><svg xmlns="http://www.w3.org/2000/svg" width="5.918" height="9.492" viewBox="0 0 5.918 9.492">
          <g id="icon_-_arrow_down_01" data-name="icon - arrow down 01" transform="translate(5.918) rotate(90)">
            <path id="Path_20" data-name="Path 20" d="M13.574-11,10-7.422,6.426-11,5.254-9.824,10-5.078l4.746-4.746Z" transform="translate(-5.254 10.996)" fill="#b1994d"/>
          </g>
        </svg>
        </a></li>`;
        }

        // Loop all page nos available
        for (let c = 1; c < result.totalPages + 1; c++) {
          navHTML += `<li class="page-item ${
            page === c ? "active" : ""
          }"><a class="page-link" data-page="${c}" href="#">${c}</a></li>`;
        }

        // If Next is not same as currect page
        if (result.totalPages != page) {
          navHTML += `<li class="page-item next"><a class="page-link" href="#" data-page="${
            page + 1
          }"><svg xmlns="http://www.w3.org/2000/svg" width="5.918" height="9.492" viewBox="0 0 5.918 9.492">
          <g id="icon_-_arrow_down_01" data-name="icon - arrow down 01" transform="translate(0 9.492) rotate(-90)">
            <path id="Path_20" data-name="Path 20" d="M13.574-11,10-7.422,6.426-11,5.254-9.824,10-5.078l4.746-4.746Z" transform="translate(-5.254 10.996)" fill="#b1994d"/>
          </g>
        </svg>
        </a></li>`;
        }

        // $("#pagination-news").html(navHTML);
      }
      if (hideButtons) {
        $(".results-button-results").hide();
        $(".results-button-clear").hide();
      } else {
        $(".results-button-results").show();
        $(".results-button-clear").show();
      }
    },
  });
}

$(window).scroll(function () {
  if ($(this).scrollTop() > 0) {
    $("#headerLogo").addClass("animate__fadeOutUp invisible");
    $("#headerLogo").removeClass("animate__fadeInDown");
    $(".main-menu--mobile").addClass("active");
  } else if ($(this).scrollTop() === 0) {
    $("#headerLogo").toggleClass(
      "animate__fadeOutUp invisible animate__fadeInDown"
    );
    $(".main-menu--mobile").toggleClass("active");
  }
});

var lazyLoadInstance = new LazyLoad({
  elements_selector: ".lazy",
});