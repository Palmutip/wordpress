(function($) {
  'use strict';

$(document).ready(function() {
	
        // vertical menu dropdown tigger on click overlay active init
        if ($('.header-vertical-btn').children().length > 0) {
            $('.header-vertical-btn').on('click', function () {
                if ($('body').hasClass('vertical-is-active')) {
                    $('body').removeClass('vertical-is-active');
                } else {
                    $('body').addClass('vertical-is-active');
                }
            });
        }

        // Add/Remove focus classess for accessibility
        $('.header-vertical-bar').find('a').on('focus blur', function() {
          $( this ).parents('ul, li').toggleClass('focus');
        });

        $('.overlay-cover').on('click', function () {
          if ($('body').hasClass('vertical-is-active')) {
            $('body').removeClass('vertical-is-active');
          }
        });
});

}(jQuery));