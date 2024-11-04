jQuery(document).ready(function($) {


    

	// Your JavaScript goes here

      $('.slides').slick({
		  autoplay: true
	  });



    //

    $('.sf-field-taxonomy-condition').append('<a href="#" class="view-more">View more</a>');

    $('.sf-field-taxonomy-condition').find('ul').css({'overflow':'hidden', 'height':'730px'});



    $('.sf-field-taxonomy-condition').on('click','a',function(event){

    	event.preventDefault();

    	var classCheck = $(this).attr('class');

    	

    	if(classCheck == 'view-more'){

    		$(this).parent().find('ul').css({'height':'auto'});

    		$(this).removeClass('view-more').addClass('view-less');

    		$(this).text('View less');

    	}



    	if(classCheck == 'view-less'){

    		$(this).parent().find('ul').css({'height':'730px'});

    		$(this).removeClass('view-less').addClass('view-more');

    		$(this).text('View more');

    	}

    	

    });

    $(".article-only").on('click', function(){

        $('.search-filter-results').find('ul li').hide();

        var article = $('.search-filter-results').find('ul li.No');

        $('.search-filter-results').find('ul li.No').show();

    });

    $(".video-only").on('click', function(){

        $('.search-filter-results').find('ul li').hide();

        var yesli = $('.search-filter-results').find('ul li.Yes');

        $('.search-filter-results').find('ul li.Yes').show();

    });

    $(".view-all").on('click', function(){

        $('.search-filter-results').find('ul li').show();

    });

});



