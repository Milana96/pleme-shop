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
