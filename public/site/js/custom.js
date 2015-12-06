
/**
     * ----------------------------------------------------------------
     * MatchHeight
     * ----------------------------------------------------------------
*/

$(document).ready(function(){
         $('.div-match-height').matchHeight({
                property: 'min-height',
         });
});
$(document).ready(function(){
            $('.news-timetable').matchHeight({
                // property: 'min-height',
         });
});
$(document).ready(function(){
         $('.disc-boxes-height').matchHeight();
});
$(document).ready(function(){
         $('.single-event-height').matchHeight();
});
$(document).ready(function(){
         $('.div-right-sidebar-stablelizer').matchHeight({
                property: 'min-height',
         });
});

/**
     * ----------------------------------------------------------------
     * Form Placeholder Text
     * ----------------------------------------------------------------
*/

$(document).ready(function(){
         $('input, textarea').placeholder();
});

/**
     * ----------------------------------------------------------------
     * Photo Slider
     * ----------------------------------------------------------------
*/
$(window).load(function() {
       var target_flexslider = $('.flexslider');
       target_flexslider.flexslider({
           animation: "fade",  
           slideshow: false,
           controlsContainer: ".slider",

           start: function(slider) {
               target_flexslider.removeClass('loading');
           }

    });

});   


/**
     * ----------------------------------------------------------------
     * Gallery 
     * ----------------------------------------------------------------
*/
lightbox.option({
      'resizeDuration': 200,
      'wrapAround': true
    })


/**
     * ------------------------------------------------------------
     * Media Player
     * ------------------------------------------------------------
*/
$('video,audio').mediaelementplayer();


/**
     * ------------------------------------------------------------
     * Hiding 
     * ------------------------------------------------------------
*/

$("a.gallery img").hover(function(){
 
        // Get the current title
        var title = $(this).attr("title");
 
        // Store it in a temporary attribute
        $(this).attr("tmp_title", title);
 
        // Set the title to nothing so we don't see the tooltips
        $(this).attr("title","");
         
    });
 
  $("a.gallery img").click(function(){// Fired when we leave the element
 
        // Retrieve the title from the temporary attribute
        var title = $(this).attr("tmp_title");

        console.log("am clicked");
 
        // Return the title to what it was
        $(this).attr("title", title);
         
    });

  /**
       * ------------------------------------------------------------
       * Accordion
       * ------------------------------------------------------------
  */
try{Typekit.load();}catch(e){}

(function($) {
// What does the accordion plugin do?
$.fn.accordion = function(options) {

  
  if (!this.length) { return this; }

  var opts = $.extend(true, {}, $.fn.accordion.defaults, options);

  this.each(function() {
    var $this = $(this).find('dl');
    
    var $all_panels = $this.find("dd");


      $this.find("dt:first .arrow").addClass('down');
  

    $this.find("dt > a").on('click', function(event){
      
      event.preventDefault();
      
      if(!$(this).parent().hasClass('active'))
      {
      
       $all_panels.slideUp();
       var $active = $('dl .active').removeClass('active');
       
       $(this).parent().next().slideDown().addClass('active');
       $(this).parent().addClass('active');
       

         $active.filter('dt').find('.arrow').removeClass('down');
         $(this).parent().find('.arrow').addClass('down');
       
      }
      
    });

  });

  return this;
};

// default options
$.fn.accordion.defaults = {};
})(jQuery);



// call plugin
$(".accordion").accordion();



/**
     * ------------------------------------------------------------
     * Lazy Loading
     * ------------------------------------------------------------
*/

$("img").lazyload({
    effect : "fadeIn"
});


/**
     * ------------------------------------------------------------
     * Main site search
     * ------------------------------------------------------------
*/

$('#top-header input').keypress(function (e) {
  if (e.which == 13) {
    $('input[type="search"]').submit();
  }
});



/**
     * ------------------------------------------------------------
     * Cycle 2
     * ------------------------------------------------------------
*/
