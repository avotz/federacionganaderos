;(function($){

 /* var movementStrength = 50;
  var height = movementStrength / $(window).height();
  var width = movementStrength / $(window).width();
  $(".layer").mousemove(function(e){
            //var pageX = e.pageX - ($(window).width() / 2);
            var pageY = e.pageY - ($(window).height() / 2);
           // var newvalueX = width * pageX * -1 - 25;
            var newvalueX = 0;
            var newvalueY = height * pageY * -1 - 50;
            $(this).css("background-position", newvalueX+"px     "+newvalueY+"px");
  });*/
  var isMobile = {
          Android: function() {
              return navigator.userAgent.match(/Android/i);
          },
          BlackBerry: function() {
              return navigator.userAgent.match(/BlackBerry/i);
          },
          iOS: function() {
              return navigator.userAgent.match(/iPhone|iPad|iPod/i);
          },
          Opera: function() {
              return navigator.userAgent.match(/Opera Mini/i);
          },
          Windows: function() {
              return navigator.userAgent.match(/IEMobile/i);
          },
          any: function() {
              return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
          }
      };
     
       new WOW().init();

//   $('.lazy').Lazy({
//         // your configuration goes here
//         scrollDirection: 'vertical',
//         effect: 'fadeIn',
//         effectTime: 500,
//         threshold : 200,
//         //visibleOnly: true,
//         onError: function(element) {
//             console.log('error loading ' + element.data('src'));
//         },
//         afterLoad: function(element) {
            
//             if( ! isMobile.any() ) {
        
//                element.interactive_bg({
//                  strength: 25,
//                  scale: 1.05,
//                  animationSpeed: "100ms",
//                  contain: true,
//                  wrapContent: false
//                });         
//             }
      
            
//         },
//         onFinishedAll: function() {
            
//             /*$(".layer").interactive_bg({
//              strength: 25,
//              scale: 1.05,
//              animationSpeed: "100ms",
//              contain: true,
//              wrapContent: false
//            });*/

//         }
//     });

  // Pretty simple huh?
   

  var $btnMenu = $('#btn-menu'),
      $menu = $('.nav-container');
      $body = $('body');

 
  
  //new WOW().init();

  $btnMenu.on('click', function (e) {
    
      $body.toggleClass('nav-is-open');

  });

 $menu.find(".menu-item-has-children").hoverIntent({
      over: function() {
            $(this).find(">.sub-menu").slideDown(200 );
          },
      out:  function() {
            $(this).find(">.sub-menu").slideUp(200);
          },
      timeout: 200

       });
 
 $('.banner-slider').slick({
        dots: false,
        autoplay:true,
        autoplaySpeed:5000,
        speed: 500,
        arrows: false,
        cssEase: 'linear',
        fade: true,
        pauseOnHover: false
    });
// $(".owl-carousel").owlCarousel({
//       animateOut: 'fadeOut',
//       items : 1,
//       autoplay : true,
//       loop : true,
//       nav : true,
//       navText : ['','']
//       /*onChange : function (e) {
//         console.log(e.target);
//         $('.owl-item.active span').addClass('animated');
//         $('.owl-item.active h1').addClass('animated');
//       }*/
//       /*slideSpeed : 300,
//       paginationSpeed : 400,*/
//       /*singleItem:true*/
//   });
 $(".clients-container").owlCarousel({
      animateOut: 'fadeOut',
      items : 10,
      autoplay : true,
      loop : true,
      nav : true,
      margin: 40,
      navText : ['<i class="fas fa-angle-left"></i>','<i class="fas fa-angle-right"></i>'],
      responsiveClass:true,
      responsive:{
            0:{
                items:3,
                nav:true
            },
            480:{
                items:5,
                nav:true
            },
           
            1024:{
                items:8,
                nav:true
            },
            1200:{
                items:10,
                nav:true
            },
           
        }
     
  });

  $('.solution-products-popup-link').magnificPopup({
    type: 'inline',
    midClick: true,
    removalDelay: 500, //delay removal by X to allow out-animation
    callbacks: {
        beforeOpen: function () {

            this.st.mainClass = 'mfp-zoom-out';
            $('body').addClass('mfp-open');
        },
        beforeClose: function () {


            $('body').removeClass('mfp-open');
        }

    }


});

$('body').on('click', '.popup-video', function (e) {
  e.preventDefault();

  $(this).magnificPopup({
      disableOn: 700,
      type: 'iframe',
      mainClass: 'mfp-fade',
      removalDelay: 160,
      preloader: false,
      iframe: {
          patterns: {
              youtube: {
                  index: 'youtube.com/', // String that detects type of video (in this case YouTube). Simply via url.indexOf(index).

                  id: 'v=', // String that splits URL in a two parts, second part should be %id%
                  // Or null - full URL will be returned
                  // Or a function that should return %id%, for example:
                  // id: function(url) { return 'parsed id'; }

                  src: '//www.youtube.com/embed/%id%?autoplay=1&rel=0&showinfo=0' // URL that will be set as a source for iframe.
              },


          },


      },
      fixedContentPos: false
  }).magnificPopup('open');

});

 // SMOOTH ANCHOR SCROLLING
    var $root = jQuery('html, body');
    jQuery('a.anchor').click(function(e) {
        var href = jQuery.attr(this, 'href');

        if (typeof(jQuery(href)) != 'undefined' && jQuery(href).length > 0) {
            var anchor = '';

            if (href.indexOf("#") != -1) {
                anchor = href.substring(href.lastIndexOf("#"));
            }
           
            if (anchor.length > 0) {
                /*console.log(jQuery(anchor).offset().top);
                console.log(anchor);*/


                $root.animate({
                    scrollTop: jQuery(anchor).offset().top-75
                }, 500, function() {
                    window.location.hash = anchor;
                });
                e.preventDefault();
            }
        }else{ // si no esta la seccion se va al home
           window.location.replace('/' + href);
        }
    });

     //SCROLL WINDOW FUNCTIONALITY

    $(window).scroll(function () {
          if ($(this).scrollTop() > 50) {
              $('.header').addClass("header-scroll");
              
          } else {
              $('.header').removeClass("header-scroll");
              
          }
          /*if ($(this).scrollTop() > 300) {
              
              $('.scroll-top').addClass("on");
          } else {
             
              $('.scroll-top').removeClass("on");
          }*/
      });

 $(window).load(function() {
     
     
      resizes();

    });

    $(window).resize(resizes);

    function resizes()
     {
      
      
        

          //$('.tours-img').height($(".tours").height());

           if(getWindowWidth() > 1000)
            $('.banner-video video').height('auto').width($(".banner").width());
          else
            $('.banner-video video').height($(".banner").height()).width('auto');
        
        
       
      

     }
  

    
})(jQuery);

function getWindowHeight() {
  var windowHeight=0;
  if (typeof(window.innerHeight)=='number') {
    windowHeight=window.innerHeight;
  } else {
    if (document.documentElement && document.documentElement.clientHeight) {
      windowHeight = document.documentElement.clientHeight;
    } else {
      if (document.body && document.body.clientHeight) {
        windowHeight=document.body.clientHeight;
      }
    }
  }
  return windowHeight;
}

function getWindowWidth() {
  var windowWidth=0;
  if (typeof(window.innerWidth)=='number') {
    windowWidth=window.innerWidth;
  } else {
    if (document.documentElement && document.documentElement.clientWidth) {
      windowWidth = document.documentElement.clientWidth;
    } else {
      if (document.body && document.body.clientWidth) {
        windowWidth=document.body.clientWidth;
      }
    }
  }
  return windowWidth;
}


