(function ($) {
   /**************************************************
   * GlobalThemeData is variable where passed data from PHP  
   **************************************************/
   // console.log(GlobalThemeData);
})(jQuery);

(function ($) {
   var _window = $(window);
      
   var Menu = {
      $dom: {
         container: $('#site-navigation'),
         menu_toggle: $('.menu-toggle'),
         body: $('body'),
         menu: undefined,
         links: undefined,
         sub_menus: undefined,
      },
      vars: {
         activated_screen_resolution : 1199,
         show_arrows_on_desktop : false,
      },
      initDom: function(){
         Menu.$dom.menu = Menu.$dom.container.find('ul').eq(0);
         Menu.$dom.links = Menu.$dom.menu.find('a');
         Menu.$dom.sub_menus = Menu.$dom.menu.find('ul');
      },
      appendArrows: function(){

         if ( _window.width() <= Menu.vars.activated_screen_resolution || Menu.vars.show_arrows_on_desktop ) {
            
            var items_has_children = Menu.$dom.container.find('li.menu-item-has-children');

            items_has_children.each(function () {
   
               if ( $(this).find('.arrow-toggle').length > 0 ) return;
   
               var $parent = this;
   
               var $arrow = $("<span class='arrow-toggle'><i class='fa fa-angle-down'></i></span>");
   
               $(this).prepend($arrow);
   
               $arrow.on('click', function () {
                  $($parent).toggleClass("expandeds");
                  $($parent).find('> .sub-menu').slideToggle(500);
               });
   
            });
   
         } else {
   
            $('.arrow-toggle').remove();
   
         }
      },
      
      toggleMenu: function(){
         Menu.$dom.menu_toggle.on('click', function(e){
            Menu.$dom.menu_toggle.toggleClass('is-active');
            Menu.$dom.body.toggleClass('menu-active');
            Menu.$dom.container.toggleClass('toggled');
            e.stopPropagation();
         })
      },
      closeMenu: function(){

         if($(this).attr('href') != '#' && $(this).attr('href') != '' ){
            Menu.$dom.body.removeClass('menu-active');
            Menu.$dom.menu_toggle.removeClass('is-active');
            Menu.$dom.container.removeClass('toggled');
         }
         
      },
      bindScrollResize: function(){
         _window.on('resize', function(){
            Menu.appendArrows();
         });
      },
      bindClicks: function(){
         $(document).on('click', Menu.closeMenu);
         Menu.$dom.links.on('click', Menu.closeMenu);
         Menu.toggleMenu();

         // Prevent closing mobile menu when clicked inside
         Menu.$dom.container.find('> div').click(function (e) {
            e.stopPropagation();
         });

      },
      init: function(){
         
         Menu.initDom();

         Menu.appendArrows();

         Menu.bindClicks();
         Menu.bindScrollResize();
      }
   }
   Menu.init();
})(jQuery);

(function ($) {
    setTimeout(function() {
        $("#subscribe").css("display","block");
    }, 3000);

    $('#subscribe').before().click(function () {
        $("#subscribe").css("display","none");
    });
})(jQuery);

jQuery(function ($) {
  /**************************************************
  * GlobalThemeData is variable where passed data from PHP
  **************************************************/
  // console.log(GlobalThemeData);

  var Theme = {
    dom: {
      backToTop: $('#return-to-top'),
      shareLink: $('.share-buttons a'),
      svgElemnts: $('.convert-svg'),
      smoothScrollLinks: $('a[href*="#"]'),
    },

    /**************************************************
    * Back to top
    * In footer paste this html <div id="return-to-top"><i class="fas fa-chevron-up"></i></div> 
    **************************************************/
    back_to_top: function () {
      if (Theme.dom.backToTop.length > 0) {
        $(window).on('load scroll', function () {
          if ($(this).scrollTop() >= $(window).height() / 2) {
            Theme.dom.backToTop.fadeIn(200);
          } else {
            Theme.dom.backToTop.fadeOut(200);
          }
        });
        Theme.dom.backToTop.on('click', function () {
          $('body,html').animate({
            scrollTop: 0
          }, 500);
        });
      }

    },

    /**************************************************
    * Share links
    **************************************************/
    share: function () {
      $('.share-buttons a').on("click", function (e) {
        e.preventDefault();
        Theme.PopupCenter($(this).attr('href'), $(this).attr('title'), 500, 300);
      });
    },

    /**************************************************
    * Share links popup
    **************************************************/
    PopupCenter: function (url, title, w, h) {
      // Fixes dual-screen position                         Most browsers      Firefox
      var dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : screen.left;
      var dualScreenTop = window.screenTop != undefined ? window.screenTop : screen.top;

      var width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
      var height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

      var left = ((width / 2) - (w / 2)) + dualScreenLeft;
      var top = ((height / 2) - (h / 2)) + dualScreenTop;
      var newWindow = window.open(url, title, 'scrollbars=yes, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);

      // Puts focus on the newWindow
      if (window.focus) {
        newWindow.focus();
      }
    },

    /**************************************************
    * Smooth scroll
    ***************************************************/
    smooth_scroll: function () {

      Theme.dom.smoothScrollLinks
        // Remove links that don't actually link to anything
        .not('[href="#"]')
        .not('[href="#0"]')
        .click(function (event) {
          // On-page links
          if (
            location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
            &&
            location.hostname == this.hostname
          ) {
            // Figure out element to scroll to
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            // Does a scroll target exist?
            if (target.length) {
              // Only prevent default if animation is actually gonna happen
              event.preventDefault();
              $('html, body').animate({
                scrollTop: target.offset().top
              }, 1000, function () {
                // Callback after animation
                // Must change focus!
                var $target = $(target);
                $target.focus();
                if ($target.is(":focus")) { // Checking if the target was focused
                  return false;
                } else {
                  $target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable
                  $target.focus(); // Set focus again
                };
              });
            }
          }
        });

    },

    /**************************************************
    * Convert SVG img to SVG tags
    **************************************************/
    convert_svg: function () {
      Theme.dom.svgElemnts.each(function () {
        var $img = $(this);
        var imgURL = $img.attr("src");
        var attributes = $img.prop("attributes");

        $.get(
          imgURL,
          function (data) {
            // Get the SVG tag, ignore the rest
            var $svg = $(data).find("svg");

            // Remove any invalid XML tags
            $svg = $svg.removeAttr("xmlns:a");

            // Loop through IMG attributes and apply on SVG
            $.each(attributes, function () {
              $svg.attr(this.name, this.value);
            });

            // Replace IMG with SVG
            $img.replaceWith($svg);

            var svg_id = $svg.attr("id");
          },
          "xml"
        );
      });
    },
    /**************************************************
    * Equal height
    **************************************************/
    equal_height: function () {
      $(window).on('resize load', function () {
        var heights = {
          'full': {}
        };

        $("[data-equal]").css('height', 'auto');
        $("[class*='data-equal-']").css('height', 'auto');

        $("[data-equal], [class*='data-equal-']").each(function () {

          var data_type = $(this).is("[class*='data-equal-']") ? 'class' : 'data';

          if (data_type == 'data') {
            var $elem = $(this).attr('data-equal');
            var size = $(this).attr('data-equal-width');
          } else {
            var classes = this.className.split(/\s+/);

            for (var i = 0; i < classes.length; i++) {

              var class_name = classes[i];

              if (class_name.indexOf('data-equal-') > -1) {
                $elem = class_name.replace('data-equal-', '');
              }
              if (class_name.indexOf('data-equal-width-') > -1) {
                size = class_name.replace('data-equal-width-', '');
              }
            }
          }

          if (size == undefined)
            size = 'full';

          if (heights[size] == undefined) {
            heights[size] = {}
          }

          if (heights[size][$elem] == undefined) {
            heights[size][$elem] = 0;
          }

          var this_height = $(this).outerHeight();

          if (this_height > heights[size][$elem]) {
            heights[size][$elem] = this_height;
          }
        });

        var $window_width = $(window).outerWidth();

        for (var breakpoint in heights) {
          var element_data_value = heights[breakpoint];

          for (var element in element_data_value) {

            if ($window_width > parseInt(breakpoint) || breakpoint == 'full') {
              $("[data-equal='" + element + "'], [class*='data-equal-" + element + "']").css('height', element_data_value[element]);
            }
          }
        }

      });
    },

    /**************************************************
    * Initial all theme functions
    **************************************************/
    init: function () {
      Theme.back_to_top();
      Theme.share();
      Theme.smooth_scroll();
      Theme.convert_svg();
      Theme.equal_height();
    },
  };

  // Init Theme optional JS
  Theme.init();
});