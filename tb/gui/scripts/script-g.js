$(document).ready(function() {
   browserClass();
   if ($('body').hasClass('page-flights') || $('body').hasClass('page-flights2')) { flights_page();  }
   if ($('body').hasClass('page-flights-results')) { page_flights_results();  }
   if ($('body').hasClass('page-flights-results-3')) { page_flights_results3(); }
   if ($('body').hasClass('page-flights-results-3')) { page_flights_results3_new(); }
   if ($('body').hasClass('page-flights-results-4')) { page_flights_results4(); }
   if ($('body').hasClass('page-mytravelers')) { page_mytravelers(); }
   if ($('body').hasClass('page-hotels-results')) { page_hotels_results(); }
   if ($('body').hasClass('page-hotels-results-2') || $('body').hasClass('page-hotels-results-3') ) { page_hotels_results_2(); }
   if ($('body').hasClass('page-hotels') || $('body').hasClass('page-hotels2')) { page_hotels(); }
   if ($('body').hasClass('page-hotels-results-5')) { page_hotels_results_5(); }
   if ($('body').hasClass('page-hotels-results-6')) { page_hotels_results_6(); }
   if ($('body').hasClass('page-packages')) { page_packages(); }
   if ($('body').hasClass('page-packages-results')) { page_packages_results(); }
   if ($('body').hasClass('page-packages-results-03')) {  page_packages_results_03(); }
   if ($('body').hasClass('page-packages-results-6')) { page_packages_results_6(); }
});

/*function flight_results_3_new (){
	$('.step1-elems.step-elems .milescardholder').click(function() {
	  $('.step1-elems.step-elems .adult-milescard-wrapper').animate({
	    height: '112px',
	  }, 5000, function() {
	    // Animation complete.
	  });
	});
}*/
	
$(window).load(function(){
	if ($('body').hasClass('page-flights')) { wl_flights_page(); }
	if ($('body').hasClass('page-mytravelers')) { wl_page_mytravelers(); }
})


function flights_page() { 
	
	
	
	
	$('.flights-top-banner').cycle({
		timeout	: 3000,
		fx		: 'fade'
	});
	
	
		$('#reservation-manager input#email,#reservation-manager input#aft-number').each(function(i, el) {
		var initialVal = $(el).val();
		$(el).focus(function() {
			if ($(this).val() == initialVal) {
				$(this).val("");
			}
		}).blur(function() {
			if ($(this).val() == "") {
				$(this).val(initialVal);
			}
		});
	}); 
	
	
	if ($('body').hasClass('page-flights2')) {
		var aClass 		= "flights2"
		var ajaxUrl 	= "ajax.php?ajax=1"
		var selector 	= "#airport-from"
		setAjaxAutoComp(selector,ajaxUrl,aClass)
		selector  = "#airport-to"			
		setAjaxAutoComp(selector,ajaxUrl,aClass)
	}	



	//scrollbar in first tab
	$('.find-out-hot-prices ul').jScrollPane({
		verticalDragMinHeight: 45,
		verticalDragMaxHeight: 45
	});

	$(".datepicker").datepicker({ 
		dateFormat: 'dd/mm/yy', 
		closeText: 'CLOSE X', 
		showButtonPanel: true,
		numberOfMonths: 2
	});
	
	
	$('#search-flight-form select').selectbox();
	
	//active form step js
	
	$('.step-elems input').bind('click', function(){ //on form input click
		$('#search-flight-form .step').each(function() {
			if ($(this).hasClass('active')) { 
				$(this).removeClass('active'); 
				$(this).find('.step-active-arrow').remove();
			} //remove active step from all
		})
		
		$(this).parents('.step').addClass('active'); //add active step
		// change form top radius if step1 active 
		if ($(this).parents('.step').hasClass('step1')) { $('#search-flight-form .topformradius').addClass('active'); }
		else { $('#search-flight-form .topformradius').removeClass('active'); }
		
		$('#search-flight-form .step').each(function() {
			if ($(this).hasClass('active')) { $(this).find('.step-info').append('<div class="step-active-arrow"></div>'); }
		})
	})
	
	
	//add first active on ready
	$('#search-flight-form .step1').addClass('active');
	$('#search-flight-form .topformradius').addClass('active');
	$('#search-flight-form .step1-info').append('<div class="step-active-arrow"></div>');
	
	
	//if one way clicked hide return div
	$(' #search-flight-form .step-elems.step1-elems input').click(function(){
		if ($(' #search-flight-form .step-elems.step1-elems #oneway').parent().hasClass('label_radio r_on')) {
		    $(' #left-col .step3-elems .dptrtn-wrapper2').hide();
		}
		else { $(' #left-col .step3-elems .dptrtn-wrapper2').show();  }
	})
	
	
	//different background in tools and more	
	$('#flights-tools-more .ui-tabs-panel-center .views-row').each(function(){
		 $(this).find('.item').each(function(){
			 var lengthitem = $(this).find('a').html();	
			 var lengthitemtrim = $.trim(lengthitem);
		
			if (lengthitemtrim.length > 25){
				$(this).addClass('big');
			 }
		});
	});
	
	
	$('#flights-airlines .airlines-wrapper').after('<div id="airlines-nav" />') .cycle({
		fx:     'fade',
		timeout: 0,
		pager:  '#airlines-nav' 
	});
	
	
	
	$('.deals-wrapper').after('<div id="nav">').cycle({
		timeout	: 0,
		fx		: 'fade', 
		pager	:"#nav"
	});
	//navigator in center
	var navwidth = $('#nav').width();
	$('#nav').css('margin-left',(354-navwidth)/2).css('width',navwidth)

	$('.infoToolTip a').cluetip({ 
			local: true, 
			hideLocal: false,
			topOffset:20,
			leftOffset:-59,
			width:  137, 
			dropShadow:	false,
			onShow:       function(e) {
				var h = $('.cluetip-inner .infoPop').height();
				if(h>30){
					$('.cluetip-inner').css('height',(h-30)+'px')
				}
				return true;
			},
			onHide: function(ct, ci){
				$('.cluetip-inner').css('height','0px')
			}
		})
		
		
		
	//map fancybox
	$(".mapsFrame").fancybox({
				'width'				: 852,
				'height'			: 586,
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'type'				: 'iframe',
				'onStart': function() {  $('body').addClass('svg-map-is-opened');  },
				'onClosed' : function(){ $('body').removeClass('svg-map-is-opened'); }
				
	});
	
	
	//set airports input to get the iframe value
	$('.mapsFrame').click(function(e){
		e.preventDefault()
		var inputId = $(this).next('input').attr('id')
		$('#'+inputId).attr('rel','activeFrame')
	})		
}





function wl_flights_page(){
	//scrollbar in first tab
	$('.ui-tabs-panel .ui-tabs-panel-center-right ul').jScrollPane({
		verticalDragMinHeight: 45,
		verticalDragMaxHeight: 45
	});
	
	
	$("#tabs-flights .flights-live a").click(function() {$('#flights-live .ui-tabs-panel-center-right ul').jScrollPane({ verticalDragMinHeight: 45,  verticalDragMaxHeight: 45})  } )
	$("#tabs-flights .hot-price a").click(function() {$('#hot-price .ui-tabs-panel-center-right ul').jScrollPane({ verticalDragMinHeight: 45,  verticalDragMaxHeight: 45})  } )
	$("#tabs-flights .hot-price-weekend a").click(function() {$('#hot-price-weekend .ui-tabs-panel-center-right ul').jScrollPane({ verticalDragMinHeight: 45,  verticalDragMaxHeight: 45})  } )
	

}



function page_flights_results3() {
	//selectboxes
	$('body.page-flights-results-3 #search-results-passenger-form select').selectbox();


	//datepickers
	$(".datepicker").datepicker({ 
		dateFormat: 'dd/mm/yy', 
		closeText: 'CLOSE X', 
		showButtonPanel: true,
		numberOfMonths: 2
	});
	
	

	//adults
	$('#search-results-passenger-form .optionsselectwrapper.adult .milescardholder').click(function(){	
	   $('#search-results-passenger-form .adult-preferences-wrapper').hide();
	   $('#search-results-passenger-form .optionsselectwrapper.adult .preferencesrequests span').text('+');
	   $('#search-results-passenger-form .optionsselectwrapper.adult .preferencesrequests').removeClass('active');
		$('#search-results-passenger-form .adult-milescard-wrapper').slideToggle("slow", function() {

			
			if ($("#search-results-passenger-form .adult-milescard-wrapper").is(':visible')) {  
				$('#search-results-passenger-form .optionsselectwrapper.adult .milescardholder').addClass('active'); 
				$('#search-results-passenger-form .optionsselectwrapper.adult .milescardholder span').text("-"); 
				
			}
			else {
				$('#search-results-passenger-form .optionsselectwrapper.adult .milescardholder').removeClass('active');
				$('#search-results-passenger-form .optionsselectwrapper.adult .milescardholder span').text("+");
			}
		});
	})
	
	$('#search-results-passenger-form .optionsselectwrapper.adult .preferencesrequests').click(function(){
		$('#search-results-passenger-form .adult-milescard-wrapper').hide();
		
		
		
		
		$('#search-results-passenger-form .optionsselectwrapper.adult .milescardholder span').text("+");
		$('#search-results-passenger-form .optionsselectwrapper.adult .milescardholder').removeClass('active');
		$('#search-results-passenger-form .adult-preferences-wrapper').slideToggle("slow", function() {
			
				if ( $("#search-results-passenger-form .adult-preferences-wrapper").is(':visible')) { 
				 $('#search-results-passenger-form .optionsselectwrapper.adult .preferencesrequests').addClass('active'); 
				$('#search-results-passenger-form .optionsselectwrapper.adult .preferencesrequests span').text('-');}
				else { $('#search-results-passenger-form .optionsselectwrapper.adult .preferencesrequests').removeClass('active'); 
				$('#search-results-passenger-form .optionsselectwrapper.adult .preferencesrequests span').text('+');}
				
		});
		
	})
	
	
	$('#search-results-passenger-form .adult-preferences-wrapper .has-pets #pets-yes').click(function(){
		$("#search-results-passenger-form .adult-preferences-wrapper").css("height", "290px")
		$('#search-results-passenger-form .adult-preferences-wrapper .pets-wrapper').show();
	})
	
	$('#search-results-passenger-form .adult-preferences-wrapper .has-pets #pets-no').click(function(){
		$("#search-results-passenger-form .adult-preferences-wrapper").css("height", "230px")
		$('#search-results-passenger-form .adult-preferences-wrapper .pets-wrapper').hide();
	})
	
	
	
	//child
	$('#search-results-passenger-form .optionsselectwrapper.child .milescardholder').click(function(){
	   $('#search-results-passenger-form .child-preferences-wrapper').hide();
	   $('#search-results-passenger-form .optionsselectwrapper.child .preferencesrequests span').text('+');
	   $('#search-results-passenger-form .optionsselectwrapper.child .preferencesrequests').removeClass('active');
		$('#search-results-passenger-form .child-milescard-wrapper').slideToggle("slow", function() {
				if ( $("#search-results-passenger-form .child-milescard-wrapper").is(':visible')) {  $('#search-results-passenger-form .optionsselectwrapper.child .milescardholder').addClass('active'); $('#search-results-passenger-form .optionsselectwrapper.child .milescardholder span').text("-"); }
				else {$('#search-results-passenger-form .optionsselectwrapper.child .milescardholder').removeClass('active'); $('#search-results-passenger-form .optionsselectwrapper.child .milescardholder span').text("+");}
			});
	})
	
	$('#search-results-passenger-form .optionsselectwrapper.child .preferencesrequests').click(function(){
		$('#search-results-passenger-form .child-milescard-wrapper').hide();
		$('#search-results-passenger-form .optionsselectwrapper.child .milescardholder span').text("+");
		$('#search-results-passenger-form .optionsselectwrapper.child .milescardholder').removeClass('active');
		$('#search-results-passenger-form .child-preferences-wrapper').slideToggle("slow", function() {
				if ( $("#search-results-passenger-form .child-preferences-wrapper").is(':visible')) {  $('#search-results-passenger-form .optionsselectwrapper.child .preferencesrequests').addClass('active'); $('#search-results-passenger-form .optionsselectwrapper.child .preferencesrequests span').text('-');}
				else { $('#search-results-passenger-form .optionsselectwrapper.child .preferencesrequests').removeClass('active'); $('#search-results-passenger-form .optionsselectwrapper.child .preferencesrequests span').text('+');}
		});
		
	})
	
	
	
	$('#search-results-passenger-form .child-preferences-wrapper .has-pets #child-pets-yes').click(function(){
		$("#search-results-passenger-form .child-preferences-wrapper").css("height", "290px")
		$('#search-results-passenger-form .child-preferences-wrapper .pets-wrapper').show();
	})
	
	$('#search-results-passenger-form .child-preferences-wrapper .has-pets #child-pets-no').click(function(){
		$("#search-results-passenger-form .child-preferences-wrapper").css("height", "230px")
		$('#search-results-passenger-form .child-preferences-wrapper .pets-wrapper').hide();
	})
	
	//infants
	
	
	
	$('#search-results-passenger-form .optionsselectwrapper.infant .milescardholder').click(function(){
	   $('#search-results-passenger-form .infant-preferences-wrapper').hide();
	   $('#search-results-passenger-form .optionsselectwrapper.infant .preferencesrequests span').text('+');
	   $('#search-results-passenger-form .optionsselectwrapper.infant .preferencesrequests').removeClass('active');
		$('#search-results-passenger-form .infant-milescard-wrapper').slideToggle("slow", function() {
				if ( $("#search-results-passenger-form .infant-milescard-wrapper").is(':visible')) {  $('#search-results-passenger-form .optionsselectwrapper.infant .milescardholder').addClass('active'); $('#search-results-passenger-form .optionsselectwrapper.infant .milescardholder span').text("-"); }
				else {$('#search-results-passenger-form .optionsselectwrapper.infant .milescardholder').removeClass('active'); $('#search-results-passenger-form .optionsselectwrapper.infant .milescardholder span').text("+");}
			});
	})
	
	$('#search-results-passenger-form .optionsselectwrapper.infant .preferencesrequests').click(function(){
		$('#search-results-passenger-form .infant-milescard-wrapper').hide();
		$('#search-results-passenger-form .optionsselectwrapper.infant .milescardholder span').text("+");
		$('#search-results-passenger-form .optionsselectwrapper.infant .milescardholder').removeClass('active');
		$('#search-results-passenger-form .infant-preferences-wrapper').slideToggle("slow", function() {
				if ( $("#search-results-passenger-form .infant-preferences-wrapper").is(':visible')) {  $('#search-results-passenger-form .optionsselectwrapper.infant .preferencesrequests').addClass('active'); $('#search-results-passenger-form .optionsselectwrapper.infant .preferencesrequests span').text('-');}
				else { $('#search-results-passenger-form .optionsselectwrapper.infant .preferencesrequests').removeClass('active'); $('#search-results-passenger-form .optionsselectwrapper.infant .preferencesrequests span').text('+');}
		});
		
	})
	
	
	
	$('#search-results-passenger-form .infant-preferences-wrapper .has-pets #infant-pets-yes').click(function(){
		$("#search-results-passenger-form .infant-preferences-wrapper").css("height", "290px")
		$('#search-results-passenger-form .infant-preferences-wrapper .pets-wrapper').show();
	})
	
	$('#search-results-passenger-form .infant-preferences-wrapper .has-pets #infant-pets-no').click(function(){
		$("#search-results-passenger-form .infant-preferences-wrapper").css("height", "230px")
		$('#search-results-passenger-form .infant-preferences-wrapper .pets-wrapper').hide();
	})
	
	$('.discount-newsletter-wrapper .discount-code input[type="text"], .discount-newsletter-wrapper .newsletter-sign-up input[type="text"]').each(function(i, el) {
		var initialVal = $(el).val();
		$(el).focus(function() {
			if ($(this).val() == initialVal) {
				$(this).val("");
			}
		}).blur(function() {
			if ($(this).val() == "") {
				$(this).val(initialVal);
			}
		});
	}); 
	
	
}

function page_flights_results4() {
	//selectboxes
	$('body.page-flights-results-4 #main-content form select').selectbox();
		
}


function page_flights_results() {

	//selectboxes
	$('body.page-flights-results  #flights-results-left-section2 select').selectbox();


	//datepickers
	$(".datepicker").datepicker({ 
		dateFormat: 'dd/mm/yy', 
		closeText: 'CLOSE X', 
		showButtonPanel: true,
		numberOfMonths: 2,
    	beforeShow: function(input, inst)   { 
    	   if(input.id=="compare-depart" || input.id=="compare-arrival") {inst.dpDiv.css({marginLeft: -input.offsetWidth + 32+ 'px'}); }
    	   else { inst.dpDiv.css({marginLeft: 0 + 'px'});  }
    	}
	});
	


	//autocomplete
	var aClass 		= "left-col"
	var ajaxUrl 	= "ajax.php?ajax=1"
	var selector 	= "#airport-from"
	setAjaxAutoComp(selector,ajaxUrl,aClass)
	selector  = "#airport-to"			
	setAjaxAutoComp(selector,ajaxUrl,aClass)
	
	var aClass 		= "right-col"
	selector  = "#compare-airport-from"			
	setAjaxAutoComp(selector,ajaxUrl,aClass)
	selector  = "#compare-airport-to"			
	setAjaxAutoComp(selector,ajaxUrl,aClass)


	  //DATE RANGES
	  $( "#depart-range-sel").addClass("globalslider-time").slider({
	        range: true,
	        min: 0,
	        max: 86399,
	        step: 300,
	        values: [46800, 61200],
			slide: function( event, ui ) {
				var t1 =   setTimeFormat(ui.values[ 0 ])
				var t2 =   setTimeFormat(ui.values[ 1 ])
				$( "#depart-range" ).val(  t1 + " - " + t2 );
			}
		});

		$( "#depart-range" ).val(  setTimeFormat($( "#depart-range-sel").slider( "values", 0 )) + " - " + setTimeFormat($( "#depart-range-sel").slider( "values", 1 )) );	
		
		
	   $( "#arrive-range-sel" ).addClass("globalslider-time").slider({
	        range: true,
	        min: 0,
	        max: 86399,
	        step: 300,
	        values: [46000, 61200],
			slide: function( event, ui ) {
				var t1 =   setTimeFormat(ui.values[ 0 ])
				var t2 =   setTimeFormat(ui.values[ 1 ])
				$( "#arrive-range" ).val(  t1 + " - " + t2 );
			}
		});
		$( "#arrive-range" ).val(  setTimeFormat($( "#arrive-range-sel").slider( "values", 0 )) + " - " + setTimeFormat($( "#arrive-range-sel").slider( "values", 1 )) );	
		
		
		// PRICES RANGES
		$( "#price-range-sel" ).addClass("globalslider-price").slider({
			range: true,
			min: 0,
			max: 1500,
			values: [ 0 , 100 ],
			step: 0.1,
			slide: function( event, ui ) {
				$( "#price" ).val( ui.values[ 0 ] + " $ - " + ui.values[ 1 ] + " $");
			}
		}); 
		$( "#price" ).val( $( "#price-range-sel" ).slider( "values", 0 ) + " $ - " +
			$( "#price-range-sel" ).slider( "values", 1 ) + " $");
		
		
		$('.reset-filters').click(function(e){
			e.preventDefault();
			flights_results_form_reset($(this).parents('form'));
		})
		
	//slidetoggle left form regions
	$('#flight-results-form .step-info h3').click(function(){
		$(this).parent().toggleClass('closed');
	    $(this).parent().parent().find('.step-elems').slideToggle();
	})
	
		
		
	//if one way clicked hide return div
	$('body.page-flights-results #left-col #flights-results-left-section2 .step1-elems input').click(function(){
		if ($('body.page-flights-results #left-col #flights-results-left-section2 .step1-elems #oneway').parent().hasClass('label_radio r_on')) {
		    $('body.page-flights-results #left-col #flights-results-left-section2 .step3-elems .dptrtn-wrapper2').hide();
		}
		else { $('body.page-flights-results #left-col #flights-results-left-section2 .step3-elems .dptrtn-wrapper2').show();  }
	})
		

}



function page_hotels() {
		//selectboxes
		$(' #search-hotel-form select').selectbox();
	
	
		//datepickers
		$("#search-hotel-form .datepicker").datepicker({ 
			dateFormat: 'dd/mm/yy', 
			closeText: 'CLOSE X', 
			showButtonPanel: true,
			numberOfMonths: 2
		});
		
		
		
		
		//tooltip
		$('.infoToolTip a').cluetip({ 
			local: true, 
			hideLocal: false,
			topOffset:20,
			leftOffset:-59,
			width:  137, 
			dropShadow:	false,
			onShow:       function(e) {
							var h = $('.cluetip-inner .infoPop').height();
							if(h>30){
								$('.cluetip-inner').css('height',(h-30)+'px')
							}
							return true;
						},
						onHide: function(ct, ci){
							$('.cluetip-inner').css('height','0px')
						}
		})
		
		
		//autocomplete
		var aClass 		= "left-col"
		var ajaxUrl 	= "ajax.php?ajax=1"
		var selector 	= "#hotelName"
		setAjaxAutoComp(selector,ajaxUrl,aClass)
		
		
	//active form step js
	$('.step-elems input, .step-elems label').click(function(){ //on form input click
		$('#search-hotel-form .step').each(function() {
			if ($(this).hasClass('active')) { 
				$(this).removeClass('active'); 
				$(this).find('.step-active-arrow').remove();
			} //remove active step from all
		})
		
		$(this).parents('.step').addClass('active'); //add active step
		// change form top radius if step1 active 
		if ($(this).parents('.step').hasClass('step1')) { $('#search-hotel-form .topformradius').addClass('active');   }
		else { $('#search-hotel-form .topformradius').removeClass('active'); }
		
		$('#search-hotel-form .step').each(function() {
			if ($(this).hasClass('active')) { $(this).find('.step-info').append('<div class="step-active-arrow"></div>'); }
		})
	})
	
	//add first active on ready
	$('#search-hotel-form .step1').addClass('active');
	$('#search-hotel-form .topformradius').addClass('active');
	$('#search-hotel-form .step1-info').append('<div class="step-active-arrow"></div>');	
	
	
	
	
	$('#search-hotel-form .step1 .step1-elems input[type="text"], .above-footer-region .above-footer-newsletter-area form input[type="text"], #reservation-manager input[type="text"]').each(function(i, el) {
		var initialVal = $(el).val();
		$(el).focus(function() {
			if ($(this).val() == initialVal) {
				$(this).val("");
			}
		}).blur(function() {
			if ($(this).val() == "") {
				$(this).val(initialVal);
			}
		});
	}); 
	
	
	
	
	
	$('#hotel-top-destinations .hotel-top-destinations-center ul > li').hover(function(){
			
			var bookBautton = $(this).find('.book-link-layer');
		
			if(bookBautton.hasClass('off')) {
				bookBautton.removeClass('off');
				bookBautton.addClass('on');
			} else {
				bookBautton.addClass('off');
				bookBautton.removeClass('on');
			}
		})
	
}




function page_packages() {
		//selectboxes
		$('#search-packages-form select').selectbox();
	
	
		//datepickers
		$("#search-packages-form .datepicker").datepicker({ 
			dateFormat: 'dd/mm/yy', 
			closeText: 'CLOSE X', 
			showButtonPanel: true,
			numberOfMonths: 2
		});
		
		
	$('#flights-airlines .airlines-wrapper').after('<div id="airlines-nav" />') .cycle({
		fx:     'fade',
		timeout: 0,
		pager:  '#airlines-nav' 
	});		
		
		//tooltip
		$('.infoToolTip a').cluetip({ 
			local: true, 
			hideLocal: false,
			topOffset:20,
			leftOffset:-59,
			width:  137, 
			dropShadow:	false,
			onShow:       function(e) {
							var h = $('.cluetip-inner .infoPop').height();
							if(h>30){
								$('.cluetip-inner').css('height',(h-30)+'px')
							}
							return true;
						},
						onHide: function(ct, ci){
							$('.cluetip-inner').css('height','0px')
						}
		})
		
		
		//autocomplete

		var ajaxUrl 	= "ajax.php?ajax=1"
		var aClass 		= "airport-from"
		var selector 	= "#airport-from"
		setAjaxAutoComp(selector,ajaxUrl,aClass)
		
		
		var aClass 		= "airport-to"
		var selector 	= "#airport-to"
		setAjaxAutoComp(selector,ajaxUrl,aClass)
		
		
	//active form step js
	$('.step-elems input, .step-elems label').click(function(){ //on form input click
		$('#search-packages-form .step').each(function() {
			if ($(this).hasClass('active')) { 
				$(this).removeClass('active'); 
				$(this).find('.step-active-arrow').remove();
			} //remove active step from all
		})
		
		$(this).parents('.step').addClass('active'); //add active step
		// change form top radius if step1 active 
		if ($(this).parents('.step').hasClass('step1')) { $('#search-packages-form .topformradius').addClass('active');   }
		else { $('#search-packages-form .topformradius').removeClass('active'); }
		
		$('#search-packages-form .step').each(function() {
			if ($(this).hasClass('active')) { $(this).find('.step-info').append('<div class="step-active-arrow"></div>'); }
		})
	})
	
	//add first active on ready
	$('#search-packages-form .step1').addClass('active');
	$('#search-packages-form .topformradius').addClass('active');
	$('#search-packages-form .step1-info').append('<div class="step-active-arrow"></div>');	
	
		$('.deals-wrapper').after('<div id="nav">').cycle({
		timeout	: 0,
		fx		: 'fade', 
		pager	:"#nav"
	});
	//navigator in center
	var navwidth = $('#nav').width();
	$('#nav').css('margin-left',(354-navwidth)/2).css('width',navwidth)
	
	
	$('#search-packages-form.step1 .step1-elems input[type="text"], .above-footer-region .above-footer-newsletter-area form input[type="text"], #reservation-manager input[type="text"]').each(function(i, el) {
		var initialVal = $(el).val();
		$(el).focus(function() {
			if ($(this).val() == initialVal) {
				$(this).val("");
			}
		}).blur(function() {
			if ($(this).val() == "") {
				$(this).val(initialVal);
			}
		});
	}); 
	
	
	//if one way clicked hide return div
	$(' #search-packages-form .step-elems.step1-elems input').click(function(){
		if ($(' #search-packages-form .step-elems.step1-elems #oneway').parent().hasClass('label_radio r_on')) {
		    $(' #left-col .step3-elems .dptrtn-wrapper2').hide();
		}
		else { $(' #left-col .step3-elems .dptrtn-wrapper2').show();  }
	})
	
	
	$('#hotel-top-destinations .hotel-top-destinations-center ul > li').hover(function(){
			
			var bookBautton = $(this).find('.book-link-layer');
		
			if(bookBautton.hasClass('off')) {
				bookBautton.removeClass('off');
				bookBautton.addClass('on');
			} else {
				bookBautton.addClass('off');
				bookBautton.removeClass('on');
			}
		})
		
		
		
	//map fancybox
	$(".mapsFrame").fancybox({
				'width'				: 852,
				'height'			: 586,
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'type'				: 'iframe',
				'onStart': function() {  $('body').addClass('svg-map-is-opened');  },
				'onClosed' : function(){ $('body').removeClass('svg-map-is-opened'); }
				
	});
	
	
	//set airports input to get the iframe value
	$('.mapsFrame').click(function(e){
		e.preventDefault()
		var inputId = $(this).next('input').attr('id')
		$('#'+inputId).attr('rel','activeFrame')
	})
}
















function page_hotels_results() {

		//selectboxes
		$('body.page-hotels-results  #hotels-results-left-section2 select').selectbox();
	
	
		//datepickers
		$("body.page-hotels-results  #hotels-results-left-section2 .datepicker").datepicker({ 
			dateFormat: 'dd/mm/yy', 
			closeText: 'CLOSE X', 
			showButtonPanel: true,
			numberOfMonths: 2
		});
		
	
	
		//autocomplete
		var aClass 		= "left-col"
		var ajaxUrl 	= "ajax.php?ajax=1"
		var selector 	= "#destinationhotelname"
		setAjaxAutoComp(selector,ajaxUrl,aClass)

		// PRICES RANGES
	
		$( "#price-range-sel" ).addClass("globalslider-price").slider({
	
			range: true,
			min: minn,
			max: maxx,
			values: [  0 , 5000],
			step: 1,
			slide: $( "#price-range-sel" ).bind( "slidestop", function(event, ui)  {
				$( "#price" ).val( ui.values[ 0 ] + " $ - " + ui.values[ 1 ] + " $");
					price_filter(ui.values[ 0 ],ui.values[ 1 ]);
			})
			
		}); 
		$( "#price" ).val( $( "#price-range-sel" ).slider( "values", 0 ) + " $ - " +
			$( "#price-range-sel" ).slider( "values", 1 ) + " $");
	

		//STAR RANGES
		$( "#starrating-range-sel" ).addClass("globalslider-star").slider({
			range: true,
			min: 0,
			max: 5,
			values: [ 0, 5 ],
			step: 1,
			slide:  $( "#starrating-range-sel" ).bind( "slidestop", function(event, ui)  {
				$( "#starrating" ).val( ui.values[ 0 ] + " * - " + ui.values[ 1 ] + " *");
				start_rating(ui.values[ 0 ],ui.values[ 1 ]);
			})
		});
		$( "#starrating" ).val( $( "#starrating-range-sel" ).slider( "values", 0 ) + " * - " +
			$( "#starrating-range-sel" ).slider( "values", 1 ) + " *");
			
			
		//REVIEW RANGES	
		$("#reviewrating-range-sel" ).addClass("globalslider-star").slider({
			range: true,
			min: 0,
			max: 5,
			values: [ 1, 3 ],
			step: 1,
			slide: function( event, ui ) {
				$( "#reviewrating" ).val( ui.values[ 0 ] + " - " + ui.values[ 1 ]);
				
			}
		}); 
		$( "#reviewrating" ).val( $( "#reviewrating-range-sel" ).slider( "values", 0 ) + " - " +
			$( "#reviewrating-range-sel" ).slider( "values", 1 ));	
	
		
		$('.reset-filters').click(function(e){
			e.preventDefault();
			hotels_form_reset($(this).parents('form'));
		})
		
		
		//slidetoggle left form regions
		$('#hotels-results-form .step-info h3').click(function(){
			$(this).parent().toggleClass('closed');
		    $(this).parent().parent().find('.step-elems').slideToggle();
		})
}





function page_hotels_results_5() {
	$('#search-results-payment-form select').selectbox();
}

function page_hotels_results_6() {
		$('.infoToolTip a').cluetip({ 
			local: true, 
			hideLocal: false,
			topOffset:20,
			leftOffset:-59,
			width:  137, 
			dropShadow:	false,
			onShow:       function(e) {
				var h = $('.cluetip-inner .infoPop').height(); 
				if(h>30){
					$('.cluetip-inner').css('height',(h-30)+'px')
				}
				$("#cluetip").addClass("big");
				return true;
			},
			onHide: function(ct, ci){
				$('.cluetip-inner').css('height','0px')
				$("#cluetip").removeClass("big");
			}
		})
}


function page_packages_results_6() {
		$('.infoToolTip a').cluetip({ 
			local: true, 
			hideLocal: false,
			topOffset:20,
			leftOffset:-59,
			width:  137, 
			dropShadow:	false,
			onShow:       function(e) {
				var h = $('.cluetip-inner .infoPop').height(); 
				if(h>30){
					$('.cluetip-inner').css('height',(h-30)+'px')
				}
				$("#cluetip").addClass("big");
				return true;
			},
			onHide: function(ct, ci){
				$('.cluetip-inner').css('height','0px')
				$("#cluetip").removeClass("big");
			}
		})
}




function page_hotels_results_2() {

		//selectboxes
		$('#change-search-hotels-form select').selectbox();
	
	
		//datepickers
		$(" #change-search-hotels-form .datepicker").datepicker({ 
			dateFormat: 'dd/mm/yy', 
			closeText: 'CLOSE X', 
			showButtonPanel: true,
			numberOfMonths: 2
		});
		
	
	
		//autocomplete
		var aClass 		= "left-col"
		var ajaxUrl 	= "ajax.php?ajax=1"
		var selector 	= "#destinationhotelname"
		setAjaxAutoComp(selector,ajaxUrl,aClass)
		
		$('#destinationhotelname').each(function(i, el) {
			var initialVal = $(el).val();
			$(el).focus(function() {
				if ($(this).val() == initialVal) {
					$(this).val("");
				}
			}).blur(function() {
				if ($(this).val() == "") {
					$(this).val(initialVal);
				}
			});
		}); 
		
		$("a#showmaplink").fancybox({
				'transitionIn'		: 'elastic',
				'transitionOut'		: 'elastic',
				'overlayColor': '#222',
				'centerOnScroll': true,
				'onStart': function() { 
					$('body').addClass('google-map-is-opened');  
					setHotelMap('googleMap', locations, mode); 
					},
				'onClosed' : function(){
                	$('body').removeClass('google-map-is-opened');    
            	}
			});
		
		if($('body').hasClass('page-hotels-results-2'))
		{
		/* GALLERY INIT */
				// Initialize Advanced Galleriffic Gallery
				var gallery = $('#thumbs').galleriffic({
					delay:                     2500,
					numThumbs:                 20,
					preloadAhead:              10,
					enableTopPager:            false,
					enableBottomPager:         false,
					maxPagesToShow:            7,
					imageContainerSel:         '#slideshow',
					controlsContainerSel:      '#controls',
					captionContainerSel:       '#caption',
					loadingContainerSel:       '#loading',
					renderSSControls:          true,
					renderNavControls:         true,
					playLinkText:              'Play Slideshow',
					pauseLinkText:             'Pause Slideshow',
					prevLinkText:              '&lsaquo; Previous Photo',
					nextLinkText:              'Next Photo &rsaquo;',
					nextPageLinkText:          'Next &rsaquo;',
					prevPageLinkText:          '&lsaquo; Prev',
					enableHistory:             false,
					autoStart:                 false,
					syncTransitions:           true,
					defaultTransitionDuration: 900
				});
				
				
				
			
		}
		
		
}











function page_packages_results() {
	//map fancybox
	$(".galleryFrame").fancybox({
				'width'				: 830,
				'height'			: 410,
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'type'				: 'iframe',
				'onStart': function() {  $('body').addClass('gallery-is-opened');  },
				'onClosed' : function(){ $('body').removeClass('gallery-is-opened'); }
				
	});
	
	$('#change-search-package-form select').selectbox();
	//datepickers
	$(".datepicker").datepicker({ 
		dateFormat: 'dd/mm/yy', 
		closeText: 'CLOSE X', 
		showButtonPanel: true,
		numberOfMonths: 2
	});
	
	//autocomplete
	var aClass 		= "left-col"
	var ajaxUrl 	= "ajax.php?ajax=1"
	var selector 	= "#airport-from"
	setAjaxAutoComp(selector,ajaxUrl,aClass)
	selector  = "#airport-to"			
	setAjaxAutoComp(selector,ajaxUrl,aClass)
	
	var aClass 		= "right-col"
	selector  = "#compare-airport-from"			
	setAjaxAutoComp(selector,ajaxUrl,aClass)
	selector  = "#compare-airport-to"			
	setAjaxAutoComp(selector,ajaxUrl,aClass)
	
	
	
	$('.reset-filters').click(function(e){
			e.preventDefault();
			packages_results_form_reset($(this).parents('form'));
	})
		
	
	
	//slidetoggle left form regions
	$('#packages-results-form .step-info h3').click(function(){
		$(this).parent().toggleClass('closed');
	    $(this).parent().parent().find('.step-elems').slideToggle();
	})
	
		
		
	//if one way clicked hide return div
	$('#packages-results-left-section2 .step1-elems input').click(function(){
		if ($('#packages-results-left-section2 .step1-elems #oneway').parent().hasClass('label_radio r_on')) {
		    $('#packages-results-left-section2 .step3-elems .dptrtn-wrapper2').hide();
		}
		else { $('#packages-results-left-section2 .step3-elems .dptrtn-wrapper2').show();  }
	})
	
	
	
	
	// maps start
	locations=[];
	var mode=1;
	$("a.map-link").click(function(){ 
		var this_obj=$(this);
		var selector=$('.hotel-list-contents > ul.contents > li.row');
		var parent='li.row';
		locations=individualMapList(this_obj, selector, parent);
	})
	
	$("a.map-link").fancybox({
		'width': 800,
		'height':500,
		'transitionIn'		: 'elastic',
		'transitionOut'		: 'elastic',
		'overlayColor': '#222',
		'centerOnScroll': true,
		'onStart': function() { 
			$('body').addClass('google-map-is-opened');  
			$('#googleMap').css("display", "block"); 
			setTimeout(function(){ setHotelMap('googleMap', locations, mode); }, 500)
		},
		'onClosed' : function(){
        	$('body').removeClass('google-map-is-opened');  
        	$('#googleMap').css("display", "none");  
	    }
	});
	// maps end
		

	
}


function page_packages_results_03() {
	// maps start
	locations=[];
	var mode=1;
	$("a.map-link").click(function(){ 
		var this_obj=$(this);
		var selector=$('#packages-results-03-container .result-container .hotel-result-container');
		var parent='.hotel-result-container';
		locations=individualMapList(this_obj, selector, parent)
		
	})
	
	$("a.map-link").fancybox({
		'width': 800,
		'height':500,
		'transitionIn'		: 'elastic',
		'transitionOut'		: 'elastic',
		'overlayColor': '#222',
		'centerOnScroll': true,
		'onStart': function() { 
			$('body').addClass('google-map-is-opened');  
			$('#googleMap').css("display", "block"); 
			setTimeout(function(){ setHotelMap('googleMap', locations, mode); }, 500)
		},
		'onClosed' : function(){
        	$('body').removeClass('google-map-is-opened');  
        	$('#googleMap').css("display", "none");  
	    }
	});
	// maps end

}




function individualMapList(selector, row, parent) {
		var locations=[]
		var rowArr=[]
		var markerIco = 'images/hotelIco.png'
		
		firstCord = selector.parents(parent).find('.field-hidden .cor').text()
		var cordArr = firstCord.split(',')
		
		var infoWinHtml = selector.parents(parent).find('.field-hidden .mapbaloonhtml').html()
		var long = parseFloat(cordArr[0])
		var lang = parseFloat(cordArr[1])
		rowArr[0] = [infoWinHtml, long, lang, markerIco]
		
		j = 1
		
		row.each(function() {
			var currCord = $(this).find('.field-hidden .cor').text()
			if(firstCord != currCord)
			{
				var cord = $(this).find('.field-hidden .cor').text()
				var cordArr = cord.split(',')
				var infoWinHtml = $(this).find('.field-hidden .mapbaloonhtml').html()
				var long = parseFloat(cordArr[0])
				var lang = parseFloat(cordArr[1])
				
				rowArr[j] = [infoWinHtml, long, lang, markerIco]
				j++
			}
		})
		
		locations.push.apply(locations, rowArr)
		return locations;
}





function page_mytravelers() {
	$('body.page-mytravelers #mytravelers-tabs form select').selectbox();
	
	//datepickers
	$(".datepicker").datepicker({ 
		dateFormat: 'dd/mm/yy', 
		closeText: 'CLOSE X', 
		showButtonPanel: true,
		numberOfMonths: 2
	});
	
	//My profile tab
	$('body.page-mytravelers #my-profile form .milescard-wrapper input').click(function() {
		$('body.page-mytravelers #my-profile form .milescard-holder-wrapper').slideToggle();
	})
	
	//My travelers tab	
	$('body.page-mytravelers #my-travelers #my-travelers-form-edit-account .milescard-wrapper input').click(function() {
		$('body.page-mytravelers #my-travelers #my-travelers-form-edit-account .milescard-holder-wrapper').slideToggle();
	})

	
	
	//INIT VALS -- MY PROFILE -- MY TRAVELERS
	$('body.page-mytravelers #my-profile form #login-info-ad').val('xxx@xxxx.ss');
	$('body.page-mytravelers #my-profile form #personal-info-name, body.page-mytravelers #my-travelers #my-travelers-form-edit-account #personal-info-namet').val('Name');
	$('body.page-mytravelers #my-profile form #personal-info-surname, body.page-mytravelers #my-travelers #my-travelers-form-edit-account #personal-info-surnamet').val('Surname');
	$('body.page-mytravelers #my-profile form #birthdatech, body.page-mytravelers #my-travelers #my-travelers-form-edit-account #birthdatecht').val('Birthdate');
	$('body.page-mytravelers #my-profile form #mobile-phone-ad, body.page-mytravelers #my-travelers #my-travelers-form-edit-account #mobile-phone-adt').val('Mobile phone number');
	$('body.page-mytravelers #my-profile form #alternative-phone-ad, body.page-mytravelers #my-travelers #my-travelers-form-edit-account #alternative-phone-adt').val('Alternative phone number');	
	$('body.page-mytravelers #my-profile form #country-ad, body.page-mytravelers #my-travelers #my-travelers-form-edit-account #country-adt').val('Country');
	$('body.page-mytravelers #my-profile form #city-ad, body.page-mytravelers #my-travelers #my-travelers-form-edit-account #city-adt').val('City');
	$('body.page-mytravelers #my-profile form #address-ad, body.page-mytravelers #my-travelers #my-travelers-form-edit-account #address-adt').val('Address');
	$('body.page-mytravelers #my-profile form #postalcode-ad, body.page-mytravelers #my-travelers #my-travelers-form-edit-account #postalcode-adt').val('Postal Code');
	$('body.page-mytravelers #my-profile form #document-type-ad, body.page-mytravelers #my-travelers #my-travelers-form-edit-account #document-type-adt').val('Document Type');
	$('body.page-mytravelers #my-profile form #nationality-ad, body.page-mytravelers  #my-travelers #my-travelers-form-edit-account #nationality-adt').val('Nationality');
	$('body.page-mytravelers #my-profile form #passport-number-ad, body.page-mytravelers #my-travelers #my-travelers-form-edit-account #passport-number-adt').val('Passport Number');
	$('body.page-mytravelers #my-profile form #issuing-country-ad, body.page-mytravelers #my-travelers #my-travelers-form-edit-account #issuing-country-adt').val('Issuing Country');
	$('body.page-mytravelers #my-profile form #mile-card-num-ad, body.page-mytravelers #my-travelers #my-travelers-form-edit-account #mile-card-num-adt').val('Mile Card Number');
	

	
		$('body.page-mytravelers #my-profile form input[type="text"], body.page-mytravelers #my-travelers #my-travelers-form-edit-account input[type="text"]').each(function(i, el) {
		var initialVal = $(el).val();
		$(el).focus(function() {
			if ($(this).val() == initialVal) {
				$(this).val("");
			}
		}).blur(function() {
			if ($(this).val() == "") {
				$(this).val(initialVal);
			}
		});
	});
	
	
	

}








function wl_page_mytravelers() {
	/* change page-lead on tab click */
	$('body.page-mytravelers #mytravelers-tabs ul.ui-tabs-nav li:nth-child(1) a').click(function(){  
		$('body.page-mytravelers .page-lead').hide();
		$('body.page-mytravelers .page-lead.my-profile-lead').show();
	})
	$('body.page-mytravelers #mytravelers-tabs ul.ui-tabs-nav li:nth-child(2) a').click(function(){
			$('body.page-mytravelers .page-lead').hide();
			$('body.page-mytravelers .page-lead.my-bookings-lead').show();
	})
	$('body.page-mytravelers #mytravelers-tabs ul.ui-tabs-nav li:nth-child(3) a').click(function(){ 
			$('body.page-mytravelers .page-lead').hide();
			if ( $('#my-travelers-form-see-travelers').is(":visible") ) { 
				$('body.page-mytravelers .page-lead.my-travelers-edit').show();
			}
			
			else { $('body.page-mytravelers .page-lead.my-travelers-add').show(); }
	})


	/* My travelers from first to second step */
	$('body.page-mytravelers #my-travelers #my-travelers-form-edit-account').submit(function(e){
		e.preventDefault();
		$(this).hide();
		$('body.page-mytravelers #my-travelers #my-travelers-form-see-travelers').show();
		$('body.page-mytravelers .page-lead').hide();
		$('body.page-mytravelers .page-lead.my-travelers-edit').show();
	})
	
	/* My travelers from second to first step */
	$('body.page-mytravelers #my-travelers #my-travelers-form-see-travelers').submit(function(e){
		e.preventDefault();
		$(this).hide();
		$('body.page-mytravelers #my-travelers #my-travelers-form-edit-account').show();
		$('body.page-mytravelers .page-lead').hide();
		$('body.page-mytravelers .page-lead.my-travelers-add').show();
	})


}






function browserClass()
{ 

	var userAgent = navigator.userAgent.toLowerCase();
    $.browser.chrome = /chrome/.test(navigator.userAgent.toLowerCase());
	
	var platform=navigator.platform;
	
	if (platform.indexOf("Mac") != -1) { $('body').addClass('mac'); }
	if (platform.indexOf("Win") != -1) { $('body').addClass('windows'); }
	
	
	if ($.browser.chrome) {
		$('body').addClass('chrome');
	}
	
	else if ($.browser.mozilla) {
		$('body').addClass('ff');
		if ($.browser.version == "1.9.1.9" || $.browser.version == "1.9.1.10" || $.browser.version == "1.9.1.11" || $.browser.version == "1.9.1.12") {
			$('body').addClass('ff35');
		}
	}
	else if ($.browser.opera) {
		$('body').addClass('oo');
		//alert ($.browser.version);
	}
	else if ($.browser.safari) {
		$('body').addClass('sf');
	}
	
	else if ($.browser.msie) {
		$('body').addClass('ie');
		if ($.browser.version == "6.0") {
			$('body').addClass('ie6');
		}
		else if($.browser.version == "7.0") {
			$('body').addClass('ie7');
		}
		else if($.browser.version == "8.0") {
			$('body').addClass('ie8');
		}else if($.browser.version == "9.0") {
			$('body').addClass('ie9');
		}
	}	
	
}



function setTimeFormat(totalSec)
{
	totalSec++ 
	var hours = Math.floor( totalSec / 3600); 
	var minutes =  Math.floor(( totalSec - hours * 3600 ) /60)     
	
	if(hours<10)
	{
		hours = "0"+hours
	}
	if(minutes<10)
	{
		minutes = "0"+minutes
	}
	time = hours + ":" + minutes
	return time;

}


function flights_results_form_reset(form_obj) {
	//radio buttons reset
	$('.step-elems').each(function(){ $(this).find('input[type="radio"]:first').parent().click(); })
	
	//depart time reset
	$("#depart-range-sel").slider("values", 0, 46800 );
	$("#depart-range-sel").slider("values", 1, 61200 );
	$( "#depart-range" ).val(  setTimeFormat($( "#depart-range-sel").slider( "values", 0 )) + " - " + setTimeFormat($( "#depart-range-sel").slider( "values", 1 )) );	

	//arrive time reset	
	$("#arrive-range-sel").slider("values", 0, 46800 );
	$("#arrive-range-sel").slider("values", 1, 61200 );
	$( "#arrive-range" ).val(  setTimeFormat($( "#arrive-range-sel").slider( "values", 0 )) + " - " + setTimeFormat($( "#arrive-range-sel").slider( "values", 1 )) );	
	
	//price reset	
	$("#price-range-sel").slider("values", 0, 0);
	$("#price-range-sel").slider("values", 1, 100 );
	$( "#price" ).val( $( "#price-range-sel" ).slider( "values", 0 ) + " $ - " + $( "#price-range-sel" ).slider( "values", 1 ) + " $");
}



function packages_results_form_reset(form_obj) {
		//radio buttons reset
		$('.step-elems').each(function(){ $(this).find('input[type="radio"]:first').parent().click(); })

		//checkboxes reset
		$('#packages-results-form .step3-elems input[type="checkbox"]').removeAttr("checked");
}




function hotels_form_reset(form_obj) {
	//checkboxes reset
	$('body.page-hotels-results #left-col #hotels-results-left-section1 .step-elems').each(function(){ $(this).find('input[type="checkbox"]').removeAttr('checked', 'false'); })

	//price reset	
	$("#price-range-sel").slider("values", 0, 0 );
	$("#price-range-sel").slider("values", 1,  100 );
	$( "#price" ).val( $( "#price-range-sel" ).slider( "values", 0 ) + " $ - " + $( "#price-range-sel" ).slider( "values", 1 ) + " $");

	//star rating reset	
	$("#starrating-range-sel").slider("values", 0, 1 );
	$("#starrating-range-sel").slider("values", 1, 3 );
	$( "#starrating" ).val( $( "#starrating-range-sel" ).slider( "values", 0 ) + " * - " + $( "#starrating-range-sel" ).slider( "values", 1 ) + " *");
	
	
	//review rating reset	
	$("#reviewrating-range-sel").slider("values", 0, 1 );
	$("#reviewrating-range-sel").slider("values", 1, 3 );
	$( "#reviewrating" ).val( $( "#reviewrating-range-sel" ).slider( "values", 0 ) + " - " + $( "#reviewrating-range-sel" ).slider( "values", 1 ));		
	
}



/* ***************** *
AUTOCOMPLETE FUNCTIONS
* ***************** */

function setAjaxAutoComp(selector,ajaxUrl,aClass) {
var tc = new Date().getTime();
	$(selector).autocomplete(
	  ajaxUrl+"&_="+tc,
	  {
				delay:3,
				minChars:2,
				matchSubset:1,
				matchContains:1,
				cacheLength:10,
				onItemSelect:selectItem,
				onFindValue:findValue, 
				formatItem:formatItem,
				autoFill:true,
				resultsClass:"ac_results "+aClass
			}
	);
	
	
	
	$('.cl').parent().parent().parent().css('display','none')
	
}

//autocomplete
function findValue(li) {
  	if( li == null ) return alert("No match!");
  	// if coming from an AJAX call, let's use the CityId as the value
  	if( !!li.extra ) var sValue = li.extra[0];
  	// otherwise, let's just display the value in the text box
  	else var sValue = li.selectValue;
  	//alert("The value you selected was: " + sValue);
}

function selectItem(li) {
	findValue(li);
}

function formatItem(row) {
	rows = row[0].match(/(.*),(.*)/);
	return rows[1]+", "+"<span>"+rows[2]+"</span>";
}

function lookupAjax(){
	var oSuggest = $("#airport-from,#airport-to")[0].autocompleter;
oSuggest.findValue();
	return false;
}

function lookupLocal(){
	var oSuggest = $("#airport-from,#airport-to")[0].autocompleter;
	oSuggest.findValue();
	return false;
}