/* ========================================================================

 * DOM-based Routing

 * Based on http://goo.gl/EUTi53 by Paul Irish

 *

 * Only fires on body classes that match. If a body class contains a dash,

 * replace the dash with an underscore when adding it to the object below.

 *

 * .noConflict()

 * The routing is enclosed within an anonymous function so that you can

 * always reference jQuery with $, even when in .noConflict() mode.

 * ======================================================================== */



(function($) {



  // Use this variable to set up the common and page specific functions. If you

  // rename this variable, you will also need to rename the namespace below.

  var Sage = {

    // All pages

    'common': {

      init: function() {

        var $owl = $('#blog-slider');



        // $owl.owlCarousel({

        //     center: true,

        //     items:1,

        //     loop:true,

        //     margin:10

        // });

        $owl.owlCarousel({

          // autoWidth: true,

          margin: 20,

          center:true,

          responsive: {

            0: {

              items: 1,

              dots: false,

            },

            768: {

              items: 1,

            },

            1025: {

              items: 1,

              stagePadding: 330,

            }

          },

          loop: true,

          dots: true,

          nav: true,

          navText: ['', ''],

        });

        // JavaScript to be fired on all pages

        $('.tagline h2').each(function() {

            if($(this).html().substr(-2) === '!!') {

              $(this).html(

                  $(this).html().substr(0, $(this).html().length-2) + "<span class='pink-quote'>"+ $(this).html().substr(-2) + "</span>");

            }

        });






      },

      finalize: function() {

        // JavaScript to be fired on all pages, after page specific JS is fired

      }

    },

    // Home page

    'home': {

      init: function() {

        // JavaScript to be fired on the home page

      },

      finalize: function() {

        // JavaScript to be fired on the home page, after the init JS

        



        // Set margin for owl dots based on how many there are

        // var $owlDots = $owl.find('.owl-dots'),

        //   owlDotsNegMargin = $owlDots.width() / 2;



        // $owlDots.css('margin-left', '-' + owlDotsNegMargin + 'px'); 

      }

    },

    // About us page, note the change from about-us to about_us.

    'about_us': {

      init: function() {

        // JavaScript to be fired on the about us page

      }

    }

  };



  // The routing fires all common scripts, followed by the page specific scripts.

  // Add additional events for more control over timing e.g. a finalize event

  var UTIL = {

    fire: function(func, funcname, args) {

      var fire;

      var namespace = Sage;

      funcname = (funcname === undefined) ? 'init' : funcname;

      fire = func !== '';

      fire = fire && namespace[func];

      fire = fire && typeof namespace[func][funcname] === 'function';



      if (fire) {

        namespace[func][funcname](args);

      }

    },

    loadEvents: function() {

      // Fire common init JS

      UTIL.fire('common');



      // Fire page-specific init JS, and then finalize JS

      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {

        UTIL.fire(classnm);

        UTIL.fire(classnm, 'finalize');

      });



      // Fire common finalize JS

      UTIL.fire('common', 'finalize');

    }

  };



  // Load Events

  $(document).ready(UTIL.loadEvents);



})(jQuery); // Fully reference jQuery after this point.

