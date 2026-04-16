$(document).ready(function() {
   
   //language switcher
   langswitcher();
   
   //search form
   search_newsltr_form();
   
   //deals above footer cycle
  
  
/*
  	if ($('body').hasClass('page-flights')) { 
  		//cycle effect
		flightsabovefooterdeals(); 
		
		//tooltip
		flightsleftform_tooltip()
	}
*/
	
	if ($('body').hasClass('page-flights-results')) { 
		//scrollbar in Lowest Fare Summary
		flightsresult_scroll();
		
		//flights result pager
		//flightsresult_pager();
		
		//flights result moreinfo slide toggle
		flightsresult_moreinfo();
		flightsresult_moreinfo_returnflights(); //for return flights
		
		//flights result sorting
		flightsresult_sorting();
		
		//selectboxes
		flightsresult_select();
	}
	
	
	
});


function langswitcher(){
	$('#header .header-first-bar .language-switcher .lang-sw ul li.active').click(function(){
		$('#header .header-first-bar .language-switcher .lang-sw ul li:not(.active)').slideToggle();
		return false;
	}) 
}

function search_newsltr_form(){
	//search block
	$('.search-form input, .footer-newsletter input, .above-footer-region .left-col .deal-alerts .form-components input[type="text"], #right-col .deal-alerts .alert-content .form-components input[type="text"], #homecontent-bottom .deal-alerts .alert-content .form-components input[type="text"]').each(function(i, el) {
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

/*
function flightsabovefooterdeals(){
	$('.deals-wrapper').after('<div id="nav">').cycle({
		timeout	: 0,
		fx		: 'fade', 
		pager	:"#nav"
	});
	//navigator in center
	var navwidth = $('#nav').width();
	$('#nav').css('margin-left',(354-navwidth)/2).css('width',navwidth)
}
*/


/*
function flightsleftform_tooltip(){
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
}
*/

function flightsresult_scroll(){
	$('#main-col #lowest-fare .fare-results').jScrollPane({
		verticalDragMinHeight: 45,
		verticalDragMaxHeight: 45
	});
}


//function flightsresult_pager(){
//	$('#separate .results-list').cycle({
//        fx:      'turnDown',
//        timeout:  0,
//        prev:    '#result-prev',
//        next:    '#result-next',
//        pager:   '#result-nav',
//    });
//
//	$('#return .results-list').cycle({
//        fx:      'turnDown',
//        timeout:  0,
//        prev:    '#result-ret-prev',
//        next:    '#result-ret-next',
//        pager:   '#result-ret-nav',
//    });
//
//}


function flightsresult_moreinfo(){
	var count=0;
	var show ='See Flight Details';
	var hide = 'Close';
	$('#tabs-flights-results .ui-tabs-panel .ui-tabs-panel-center .results-list .result .price-info .details-btn a').click(function(e){
		e.preventDefault();
		if($(this).text()==show){
			$(this).text(hide);
		}else{
			$(this).text(show);	
		}
		
		$(this).toggleClass('opened');
		//$(this).parents('.result').find('.line-3').slideToggle();
		//$(this).parents('.result').find('.price-details').slideToggle();
		$(this).parents('.result').find('.line-3').animate({height: 'toggle'});
		$(this).parents('.result').find('.price-details').animate({height: 'toggle'});
	})
}




function flightsresult_moreinfo_returnflights(){
	var count=0;
	var show ='See Flight Details';
	var hide = 'Close';
	//.ui-tabs-panel-center .results-list 
	$('#tabs-flights-results .ui-tabs-panel .result .ret-flight-info-wrapper .details-btn a').click(function(e){ 
		e.preventDefault();
		if($(this).text()==show){
			$(this).text(hide);
		}else{
			$(this).text(show);	
		}
		//$(this).toggleClass('opened');
			////$(this).parents('.result').find('.line-3').slideToggle();
			////$(this).parents('.result').find('.price-details').slideToggle();
		//$(this).parents('.flight-info').find('.line-3').animate({height: 'toggle'});
		
		
		 
//		var opened_num=0;
//		$('#tabs-flights-results .ui-tabs-panel .ui-tabs-panel-center .results-list .result .ret-flight-info-wrapper .details-btn a').each(function(){
//			if($(this).hasClass('opened')) {opened_num++;}
//		})
		
		

		if($(this).parents('.flight-info').hasClass('ret-flight-from')){

			if(!$(this).parents('.result').hasClass('opened1')){
				$(this).parents('.result').addClass('opened1 opened-info').find('.ret-flight-from .line-3').slideDown()//.css('display','block');
				$(this).parents('.result').find('.price-details').slideDown()//.css('display','block');
			}else{
				if($(this).parents('.result').hasClass('opened2')){
					$(this).parents('.result').removeClass('opened1 opened-info').find('.ret-flight-from .line-3').slideUp()//.css('display','none');
				}else{
					$(this).parents('.result').removeClass('opened1 opened-info').find('.ret-flight-from .line-3').slideUp()//.css('display','none');
					$(this).parents('.result').find('.price-details').slideUp()//.css('display','none');
				}
			}
		}
		if($(this).parents('.flight-info').hasClass('ret-flight-to')){
			if(!$(this).parents('.result').hasClass('opened2')){
				$(this).parents('.result').addClass('opened2 opened-info').find('.ret-flight-to .line-3').slideDown()//.css('display','block');
				$(this).parents('.result').find('.price-details').slideDown()//.css('display','block');
			}
			else{
				if($(this).parents('.result').hasClass('opened1')){
					$(this).parents('.result').removeClass('opened2 opened-info').find('.ret-flight-to .line-3').slideUp()//.css('display','none');
				}else{
					$(this).parents('.result').removeClass('opened2 opened-info').find('.ret-flight-to .line-3').slideUp()//.css('display','none');
					$(this).parents('.result').find('.price-details').slideUp()//.css('display','none');
				}
			}
		} 
		
        
	})
}


function flightsresult_sorting(){
	$('#separate .result-sorting select').selectbox();
	$('#return .result-sorting select').selectbox();
}


function flightsresult_select(){
	$('#right-col .compare-tickets .body .travellers select').selectbox();
}






