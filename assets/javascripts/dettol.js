

jQuery(function() {
  jQuery('input, textarea').placeholder();
});

jQuery(document).ready(function(){
  jQuery('.article-slideshow').slick({
    slidesToShow: 2.05,
    slidesToScroll: 1,
    dots: true,
    arrows: false,
    responsive: [
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 1.05
        }
      }
    ]
  });

  jQuery('.forgot_trigger').click(function(){
    if ( jQuery( ".modal" ).length ) {
      jQuery( ".modal" ).modal('hide');
    }
    jQuery( ".forgot" ).modal('show');
  });

  jQuery('.popup').click(function(event) {
    var width  = 575,
        height = 400,
        left   = (jQuery(window).width()  - width)  / 2,
        top    = (jQuery(window).height() - height) / 2,
        url    = this.href,
        opts   = 'status=1' +
                 ',width='  + width  +
                 ',height=' + height +
                 ',top='    + top    +
                 ',left='   + left;

    window.open(url, 'twitter', opts);

    return false;
  });

  if (jQuery(window).width() <= 992) {
    var pos = jQuery(".narrow").width();
    jQuery(".sorting").css('width', pos);
  }
});

function fbShare(url, title, descr, image, winWidth, winHeight) {
  var winTop = (screen.height / 2) - (winHeight / 2);
  var winLeft = (screen.width / 2) - (winWidth / 2);
  window.open('http://www.facebook.com/sharer.php?s=100&p[title]=' + title + '&p[summary]=' + descr + '&p[url]=' + url + '&p[images][0]=' + image, 'sharer', 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,status=0,width=' + winWidth + ',height=' + winHeight);
}

(function() {
  var triggerBttn = document.getElementById( 'trigger-overlay' ),
    overlay = document.querySelector( 'div.overlay' ),
    closeBttn = overlay.querySelector( 'button.overlay-close' );
    transEndEventNames = {
      'WebkitTransition': 'webkitTransitionEnd',
      'MozTransition': 'transitionend',
      'OTransition': 'oTransitionEnd',
      'msTransition': 'MSTransitionEnd',
      'transition': 'transitionend'
    },
    transEndEventName = transEndEventNames[ Modernizr.prefixed( 'transition' ) ],
    support = { transitions : Modernizr.csstransitions };

  function toggleOverlay() {
    if( classie.has( overlay, 'open' ) ) {
      classie.remove( overlay, 'open' );
      classie.add( overlay, 'close' );
      var onEndTransitionFn = function( ev ) {
        if( support.transitions ) {
          if( ev.propertyName !== 'visibility' ) return;
          this.removeEventListener( transEndEventName, onEndTransitionFn );
        }
        classie.remove( overlay, 'close' );
      };
      if( support.transitions ) {
        overlay.addEventListener( transEndEventName, onEndTransitionFn );
      }
      else {
        onEndTransitionFn();
      }
    }
    else if( !classie.has( overlay, 'close' ) ) {
      classie.add( overlay, 'open' );
    }
  }

  triggerBttn.addEventListener( 'click', toggleOverlay );
  closeBttn.addEventListener( 'click', toggleOverlay );
})();
jQuery(document).ready(function($) {
  $("#owl").owlCarousel();
  $( window ).scroll(function () {
     var sc = $(window).scrollTop()
    if (sc > 100) {
        $("#dettol-header").addClass("full-top")
    } else {
        $("#dettol-header").removeClass("full-top")
    }
  });
});
