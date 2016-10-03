/* 
 * Tutorial Javascript Methods
 * @author    Zone
 * @email     hello@thisiszone.com
 * @url       http://thisiszone.com 
 * @copyright Copyright (c) 2012, thisiszone.com. All rights reserved.
 */
var Tutorial;
(function ($) {
  Tutorial = {
    init: function () {

      //This is the content container, containing all of the articles
      Tutorial.masonry = $('.masonry');
      
      //Navigation bar
      Tutorial.filters = $('.filters');
      
      //Pagination div containing the next button
      Tutorial.pagination = $('.pagination');
      
      //Boolean set to true to disable filtering when new content is being loaded
      Tutorial.isScrolling = false;
      Tutorial.animationSpeed = 300;
      
      Tutorial.filters.find('a').bind('click', Tutorial.filter);
     
      Tutorial.masonry.imagesLoaded(function(){
        Tutorial.initImgLazyLoad();
      });
      Tutorial.initMasonry();
      
      //if user enters site on a filter url, find the filter in the nav and add an active class.  
      $('.filters li.current-menu-item').addClass('active');
      
      Tutorial.initScroll();        
      Tutorial.checkContentFillsPage();   
    },
  
    initMasonry: function() {
      //initialise isotope to work on items of class .post
      //use masonry layout with a column width of 100
      var $container = jQuery('.masonry');
      var $windowWidth = jQuery( window ).width();
      var $setWidth = $container.width();
      if ($windowWidth < 992) { 
        $setWidth = Math.floor($container.width() / 2);
      } else if ($windowWidth >= 992) { 
        $setWidth = Math.floor($container.width() / 4); 
      }
      if ($windowWidth < 768) { 
        jQuery('.narrow').css("width", $setWidth - 10);
      } else {
        jQuery('.narrow').css("width", $setWidth - 40);
      }
      Tutorial.masonry.imagesLoaded(function(){
        Tutorial.masonry.isotope({
          itemSelector : '.post',
          masonry: {
            columnWidth: $setWidth
          }
        });
      });
    },
    
    initImgLazyLoad: function() {
      //img opacity is set to 0 in css.  loading gif is added to surrounding a tag
      //once all images have loaded, the opacity of the images is then set to 1 and the loading gif is removed by adding the class loaded to the a tag.
      $('img').animate({
        'opacity':'1'
      }, Tutorial.animationSpeed, 'linear', function(){
        $(this).closest('.image').addClass('loaded');
      })
    },
    
    initScroll:function(){      
      //initialise infinite scroll  
      Tutorial.masonry.infinitescroll({
        navSelector  : '.pagination',    // selector for the pagination container
        nextSelector : '.pagination a',  // selector for the NEXT link (to page 2)
        itemSelector : 'div.post, div.the_post',     // selector for all items you'll retrieve 
        loading: {
          speed:'fast',
          finishedMsg: '<span class="loading">No more articles</span>',
          msg: $('<div id="infscr-loading"><div class="isi"><span class="loading">Load more</span></div><img alt="Loading..." src="/wp-content/themes/dettol-wunderman/assets/images/ajax-loader.gif" /></div>')
        },
        errorCallback: function(){Tutorial.isScrolling = false;}
      },
      // append the new items to isotope on the infinitescroll callback function.  
      function( newElements ) {
        var $container = jQuery('.masonry');
        var $windowWidth = jQuery( window ).width();
        var $setWidth = $container.width();
        
        if ($windowWidth < 992) { 
          $setWidth = Math.floor($container.width() / 2);
        } else if ($windowWidth >= 992) { 
          $setWidth = Math.floor($container.width() / 4); 
        }
        
        if ($windowWidth < 768) { 
          jQuery('.narrow').css("width", $setWidth - 10);
        } else {
          jQuery('.narrow').css("width", $setWidth - 40);
        }
        Tutorial.masonry.imagesLoaded(function(){
          Tutorial.masonry.isotope( 'appended', $( newElements ), Tutorial.finishedAppending ); 
        });
      });
    },
    
    finishedAppending: function(){
      //when the new elements have been appended, this function is called as a callback
      //set isScrolling back to false to enable filtering once more
      Tutorial.isScrolling = false;
      //check that there is enough content on the page for the user to be able to scroll
      Tutorial.checkContentFillsPage();
      Tutorial.masonry.imagesLoaded(function(){
        Tutorial.initImgLazyLoad();
      });
    },
    
    checkContentFillsPage: function(){
      //if the height of the article container is less than that of the window height, add more content automatically.
      if($('.masonry').height() < $(window).height()){
        Tutorial.masonry.infinitescroll('scroll');
      } 
    }, 
    
    resetScroll:function(newPath){
      //update infinitescroll with the new (filtered) path
      Tutorial.masonry.infinitescroll('update', {     
        path  : [(newPath) + 'page/',''],    // new path for the paged navigation             
        state: {
          isDuringAjax: false,
          isInvalidPage: false,
          isDestroyed: false,
          isDone: false, // For when it goes all the way through the archive.
          isPaused: false,
          currPage: 1
        },
        loading: {
          msg: $('<div id="infscr-loading"><div class="isi"><span class="loading">Load more</span></div><img alt="Loading..." src="/wp-content/themes/dettol-wunderman/assets/images/ajax-loader.gif" /></div>')
        }
      });    
      Tutorial.masonry.infinitescroll('bind');
    },
    
    filter:function(e){
      
      //alert('successfully binding');
      console.log('inside filter function');
      e.preventDefault();

      var $this = $(this);
      
      if(Tutorial.isScrolling || $this.hasClass('btn')){
        return;
      }
      // don't proceed if already selected
      else if ( !$this.parent('li').hasClass('active') )       {
        Tutorial.isScrolling = true;
        //add active class to filter and remove from old active filter.
        Tutorial.filters.find('.active').removeClass('active');
        $this.parent('li').addClass('active');
        
        if($this.hasClass('brand')){
          $('ul.nav li.all').addClass('active');
        }
        
        //get filtered url
        var $url = $this.attr('href');	
        
        //update url without reloading the page
        if(history.pushState ){
          history.pushState('', document.title,$url);
        }   
	  
        //get content from page with url filtered content
        $.get($url, function(data){
          //find the masonry container
          $data = $("<div>" + data + "</div>");
          $data = $data.find(".masonry");
          
          //get the new articles
          var $new =  $data.find('div.post');

          //alert($new);
          //remove articles from isotope
          Tutorial.masonry.isotope( 'remove', $('.post' )); 
          //reset the pagination
          Tutorial.resetScroll($url); 
          //add new items to isotope
          
          Tutorial.masonry.isotope('insert',$new);
          
          Tutorial.masonry.imagesLoaded(function(){
            Tutorial.initImgLazyLoad();
          });
           
          //scroll back up to top of page
          // window.scrollTo(0,0);
          
		  Tutorial.finishedAppending();
        }); 
      }
    }
    
  };

  $(function() {

    Tutorial.init();

  });

})(jQuery);