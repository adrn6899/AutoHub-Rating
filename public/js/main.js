(function($){
  "use strict";
  var fullHeight=function(){
    $('.js-fullheight').css('height',$(window).height());
    $(window).resize(function(){
      $('.js-fullheight').css('height',$(window).height());
    });};

    function delay(callback, ms) {
      var timer = 0;
      return function () {
        var context = this,
          args = arguments;
        clearTimeout(timer);
        timer = setTimeout(function () {
          callback.apply(context, args);
        }, ms || 0);
      };
    }
    
    fullHeight();
    
    $('#sidebarCollapse').on('click',function(){
      $('#sidebar').toggleClass('active');
    });

  })(jQuery);
