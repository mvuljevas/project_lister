var $ = jQuery.noConflict();

/* ----------------------------------------------------------------
↓                             Global                              ↓
-----------------------------------------------------------------*/

var showcaser = showcaser || {};

(function($){
    
    // USE STRICT
  "use strict";

  showcaser.magic = {

    init: function(){
      showcaser.magic.textRotater();
      showcaser.magic.animations();
      //showcaser.magic.customScroll();
      showcaser.magic.magnificPop();
      showcaser.magic.darkHover();
      showcaser.magic.addOns();
    },  

/* ----------------------------------------------------------------
↓                           Text Rotator                          ↓
-----------------------------------------------------------------*/
        
    textRotater: function(){
      if( $textRotate.length > 0 ){
        $textRotate.each(function(){
          var element = $(this),
            tRotate = $(this).attr('data-rotate'),
            tSpeed = $(this).attr('data-speed'),
            tSeparator = $(this).attr('data-separator');

            if( !tRotate ) { tRotate = "fadeIn"; }
            if( !tSpeed ) { tSpeed = 1200; }
            if( !tSeparator ) { tSeparator = ","; }

          var tRotater = $(this).find('.rotate-this');

          tRotater.Morphext({
            animation: tRotate,
            separator: tSeparator,
            speed: Number(tSpeed)
          });
        });
      }
    },   
            
/* ----------------------------------------------------------------
↑                           Text Rotator                          ↑
-----------------------------------------------------------------*/


/* ----------------------------------------------------------------
↓                         Animate.css                             ↓
-----------------------------------------------------------------*/        
        
    animations: function(){
      var $dataAnim = $('[data-animate]');
      if( $dataAnim.length > 0 ){
        //if( $body.hasClass('device-lg') || $body.hasClass('device-md') || $body.hasClass('device-sm') ){
          $dataAnim.each(function(){
            var element = $(this),
              animationDelay = element.attr('data-delay'),
              animationDelayTime = 0;

            if( animationDelay ) { animationDelayTime = Number( animationDelay ) + 500; } else { animationDelayTime = 500; }

            if( !element.hasClass('animated') ) {
              element.addClass('not-animated');
              var elementAnimation = element.attr('data-animate');
              element.appear(function () {
                setTimeout(function() {
                  element.removeClass('not-animated').addClass( elementAnimation + ' animated');
                }, animationDelayTime);
              },{accX: 0, accY: -80},'easeInCubic');
            }
          });
        //}
      }
    },   
        
/* ----------------------------------------------------------------
↑                         Animate.css                             ↑
-----------------------------------------------------------------*/  


/* ----------------------------------------------------------------
↓                           Nice Scroll                           ↓
-----------------------------------------------------------------*/

 /* not used by default, firefox bug */
  customScroll: function(){
    if (jQuery().niceScroll) {
      jQuery("html").niceScroll({
        cursorcolor: 'rgba(255,255,255,.2)',
        cursorborder: '0px',
        cursorborderradius: '1px',
        cursorwidth: '6px',
        smoothscroll: false,
        autohidemode: false
      });
    }      
  },

/* ----------------------------------------------------------------
↑                           Nice Scroll                           ↑
-----------------------------------------------------------------*/


/* ----------------------------------------------------------------
↓                            MISC                                 ↓
-----------------------------------------------------------------*/

  darkHover: function(){
    $( ".ghost-link" ).hover(
      function() {
        $( this ).find( ".folder-hover" ).addClass( "folder-hovered" );
        $( this ).find( "figcaption" ).addClass( "fig-hover" );
        $( this ).find( ".folder-hover" ).addClass( "i-press" );
      }, function() {
        $( this ).find( ".folder-hover" ).removeClass( "folder-hovered" );
        $( this ).find( "figcaption" ).removeClass( "fig-hover" );
        $( this ).find( ".folder-hover" ).removeClass( "i-press" );
      }
    );     
  },

  addOns: function(){
    $(".image-modal").insertAfter(".star");
  },
  

/* ----------------------------------------------------------------
↑                              MISC                               ↑
-----------------------------------------------------------------*/


   
/* ----------------------------------------------------------------
↓                      Magnific PopUp                             ↓
-----------------------------------------------------------------*/     
    
    magnificPop: function(){

    // Images
    $('.grid_image').magnificPopup({
        delegate: 'a',
        type: 'image',
        removalDelay: 500, //delay removal by X to allow out-animation
        callbacks: {
            beforeOpen: function() {
                // just a hack that adds mfp-anim class to markup 
                this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
                this.st.mainClass = this.st.el.attr('data-effect');
            }
        },
        closeOnContentClick: true,
        midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
    });
   }

/* ----------------------------------------------------------------
↑                      Magnific PopUp                             ↑
-----------------------------------------------------------------*/       
    


  }; //magic ends


  showcaser.documentOnReady = {
    init: function(){
      showcaser.magic.init();
    },  
  };  


  var $window = $(window),
    $textRotate = $('.text-rotater')
  ; 

    
  $(document).ready( showcaser.documentOnReady.init );
    
})(jQuery);