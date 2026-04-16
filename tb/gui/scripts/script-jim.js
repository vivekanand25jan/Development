$(document).ready(function() {
	
	moreFacilities('#hotel-list-wrapper .moretypes a, #packages-results-03-container .moretypes a');
	
	initUiTabs("#flights-step2-tabs");

	initSelectbox('#dropdown-list-hotels, #dropdown-list-cars, .rooms-type-select, #step-1-form-container .form-type-select, #res-sort2, #countryProvider');
	
	if($('body').hasClass('page-hotels-results-2')) { initFancybox(); }
		
	if (!$('body').hasClass('page-packages-results')) {  imagePreview("a.preview"); }
	if ($('body').hasClass('page-cars')) { page_cars(); }
	if ($('body').hasClass('page-login')) { page_login(); }	
	
	
	
	
	openBox();
	
	showBookingDetails();
	
	topLink();
	
	if($('body').hasClass('page-hotels-results-4')) {
		defaultDatepicker();
	}
		
	filterDropdown();

	if($('body').hasClass('page-hotels') || $('body').hasClass('page-hotels-results-2') ||  $('body').hasClass('page-hotels2') ){
		removeItem();
	}
	
	setDots();
	
	initTooltip('.info-icon');
	
	setInputValue();
	
	initFlightCalendar();
	
	
	if ($('body').hasClass('page-flights-results')) { page_flights_results_j(); }

});

$(window).load(function(){
	
	if($('body').hasClass('page-hotels')){	
		wl_hotels_page();
	}
})



function page_flights_results_j() {
	$('#tabs-flights-results li a').click(function(){
		if ($(this).parent().hasClass('plus_tdays_t')) { 
			$('#tabs-flights-results .delete-results-info').hide(); 
			$('#tabs-flights-results .flights-results-bottom-curve').addClass('three_days_active');
		}
		else { 
			$('#tabs-flights-results .delete-results-info').show(); 
			$('#tabs-flights-results .flights-results-bottom-curve').removeClass('three_days_active');
		}
	})
}

function initFlightCalendar() {

		var currentCol = $('.table-header td');
		var currentRow = $('.table-left td');
		
		$('.table-results td').hover(function(){
			$(this).addClass('over');
			var currClass = $(this).attr('class')
			currClassArr = currClass.split(' ')
			var currCell = currClassArr[0].split('-');
			var curreCellNumber = currCell[1];	
			$('.table-header .col-' + curreCellNumber).addClass('highlight');
			var currRow = currClassArr[1].split('-');
			var currRowNumber = currRow[1];
			console.log('row-' + currRowNumber);
			$('.table-left .row-' + currRowNumber + ' > td').addClass('highlight');
			
			$(this).find('.info-box').css('display','block');
			
		}, 
		function() {	
			$(this).removeClass('over');
			currentCol.removeClass('highlight');
			currentRow.removeClass('highlight');
			$(this).find('.info-box').css('display','none');
		})
		
		$('.table-results td').click(function(){
			
			var countActiveCells = $('.table-results').children('tbody').children('tr').children('td.active').length;
			var radio = $(this).find('.check-flight');
			
			if(radio.length > 0) {
				if(!countActiveCells > 0) {
						radio.attr('checked', 'checked')
						$(this).addClass('active');
						var currClass = $(this).attr('class')
						currClassArr = currClass.split(' ')
						var currCell = currClassArr[0].split('-');
						var curreCellNumber = currCell[1];	
						$('.table-header .col-' + curreCellNumber).addClass('active');
						var currRow = currClassArr[1].split('-');
						var currRowNumber = currRow[1];
						$('.table-left .row-' + currRowNumber + ' > td').addClass('active');
				} else {
					 $('td.active').each(function(){
						$(this).removeClass('active');
						radio.attr('checked', '')
					})
				}
			}		
		})
		
}	

function setInputValue() {

$('.form-component.discount .input-text, .form-component.newsletter .input-text, #login-container input').each(function(i, el) {
	
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

function initTooltip(selector) {
		
		$(selector).hover(function() {
			var infoBox = $(this).find('.info-box');
			$(this).addClass('over')
			infoBox.addClass('open');
		  }, 
		  function() {
			 var infoBox = $(this).find('.info-box');
			$(this).removeClass('over');
			infoBox.removeClass('open');
		})
}

function defaultDatepicker() {
	
		$(".datepicker").datepicker({ 
				dateFormat: 'dd/mm/yy', 
				closeText: 'CLOSE X', 
				showButtonPanel: true,
				numberOfMonths: 2
			});
}

function setDots() {
	$('.field-book-details .right-col li.row').each(function(){
		var Label =	$(this).find('.label span').text()
		//document.title=$(this).attr('class')
		formatLine($(this), Label, '' , 290)
			
	})	
}

function formatLine(Selector, label, Value , MaxWidth) {
		dots=''
		counter = 0
		var line=''
		
		var labelSelector=Selector.find('.label span')
		var valueSelector=Selector.find('.price span')
		labelSelector.css({width: 'auto', float: 'left', overflow: 'visible'})
		while ((labelSelector.outerWidth() + valueSelector.outerWidth()) < (MaxWidth-5)) {
		   
			line=label+dots+Value
			
			Selector.find('.label span').text(line)
			counter++
			if(counter >100) break
			dots+='.'
		}
}


function initFancybox() {
	
	$("#change-dates-form-wrapper").fancybox({
			'transitionIn'	: 'none',
			'transitionOut'	: 'none',
			'onStart' 		: function()
			{
				$('body').addClass('change-dates-box-is-opened');
				$('#fancybox-inner').width(636);
				$('#fancybox-wrap').width(636);
				$('#fancybox-content').width(636);
			},
			'onClosed' 		: function()
			{	
				$('.select-input-wrapper select').remove(); 
				$('body').removeClass('change-dates-box-is-opened');
				
			},	
			
			'onComplete'	: function(){
				$('#fancybox-inner').width(636);
				$('#fancybox-wrap').width(636);
				$('#fancybox-content').width(636);

				initSelectbox('.change-dates-box-is-opened #fancybox-content .select-input-wrapper select');
				
					$(".datepicker").datepicker({ 
						dateFormat: 'dd/mm/yy', 
						closeText: 'CLOSE X', 
						showButtonPanel: true,
						numberOfMonths: 2
					});
				
   			}		
	});
		
}

function wl_hotels_page() {
	
	$('.page-hotels #tabs-flights .ui-tabs-panel-center-right ul').jScrollPane({
		verticalDragMinHeight: 45,
		verticalDragMaxHeight: 45
	});
	
	$("#tabs-flights .hotels-live a").click(function() {
		$('.ui-tabs-panel .ui-tabs-panel-center-right ul').jScrollPane({ 
			verticalDragMinHeight: 45,
			verticalDragMaxHeight: 45
		})
	})
	
	$("#tabs-flights .hot-price a").click(function() {
		$('#hot-price .ui-tabs-panel-center-right ul').jScrollPane({ 
			verticalDragMinHeight: 45,  
			verticalDragMaxHeight: 45
		})
	})
	
	$("#tabs-flights .hot-price-weekend a").click(function() {
		$('#hot-price-weekend .ui-tabs-panel-center-right ul').jScrollPane({
			verticalDragMinHeight: 45,  
			verticalDragMaxHeight: 45
		})  
	})

}


function removeItem() {
	
	$('.field-remove').live('click', function(){
	
	 var listWrapper = $(this).parent().parent();
	 var rowItem = $(this).parent();
	 var newRow = rowItem.html()

		rowItem.fadeOut(800, function() {
			$(this).remove();
			//listWrapper.append('<li class="row new-row" style="display:none;">' + newRow + '</li>');
		});
		
		setTimeout(function(){
			$('.new-row').fadeIn(800, function() {
			//	$(".latest-searches-list").load("gui/ajax.php .latest-searches-list", function() {
					removeItem(); //calling same function onSuccess
			//	});
			});
		}, 1000);
	});
	
}

function initUiTabs(selector) {
	
	$(selector).tabs('option', 'fx', { opacity: 'toggle', duration: 'fast' });
	
}

function initSelectbox(selectors) {

	$(selectors).selectbox();
	
}


function filterDropdown() {
	
	$('#hotel-filter-wrapper .filter-item span a').click(function(e){
		e.preventDefault();
	})
	
	$('#hotel-filter-wrapper .filter-item span').click(function(){
		
		var element = $(this).parent().find('.option-list-wrapper');
		var listItem = element.find('li');
		var itemHeight = listItem.outerHeight();
		var countItems = listItem.length;
		var heightWrapper = itemHeight * countItems;
		
		//$(this).parent().parent().parent().find('.filter-item').each(function(elem) {
			//if($(this).hasClass('highlight')) {	
			
			//$('.option-list-wrapper').animate({height: 0}, 200);
						
			//$(this).find('open').animate({height: 0}, 200);
			//}
		//});
				
		if(countItems != 0) {
			if(!element.hasClass('open')) {
				element.addClass('open');
				element.animate({height: heightWrapper + 'px'}, 200);				
				$(this).parent().addClass('highlight');
			} else {
				element.removeClass('open');
				element.animate({height: 0}, 200);
				$(this).parent().removeClass('highlight');
			}
		}
	})
}

function topLink() {
	
	$('.top-link').click(function(e){
		e.preventDefault();
		  $('html, body').animate({scrollTop:0}, 1200);
	       return false;
	})
}

function openBox() {
	
	$('.small-banner.box-animate .content a').click(function(e){
		e.preventDefault()
		var element = $('.small-banner .modal-box');
		var content = $('.small-banner.box-animate .content');
		
		if(!element.hasClass('open')) {
			element.animate({height:250}, 500);
			element.addClass('open');
			content.addClass('grow-up');
			$(this).addClass('enabled');
		} else {
			element.removeClass('open');
			element.animate({height:10}, 500);
			content.removeClass('grow-up');
			$(this).removeClass('enabled');
		}
	})
}


function showBookingDetails() {
	
	$(".flight-title-info").click(function(e){
		e.preventDefault();
		
		if ($('body').hasClass('page-hotels-results-6')) { var c_height=1931; }
		if ($('body').hasClass('page-packages-results-6')) { var c_height=3140; }
		else {var c_height=1931;}
		
		
		var element = $('#booking-details');
			if(!element.hasClass('open')) {
				element.animate({height:c_height}, 1500);
				element.addClass('open');
				$(this).addClass('enabled');
			} else {
				element.removeClass('open');
				element.animate({height:0}, 1000);
				$(this).removeClass('enabled');
			}
	})
}






/*

function showBookingDetails_old() {
	
	$(".flight-title-info").click(function(e){
		e.preventDefault();
		
		
		var element = $('#booking-details');
		if ($('body').hasClass('page-hotels-results-6')) { 
			if(!element.hasClass('open')) {
				element.animate({height:1931}, 1500);
				element.addClass('open');
				$(this).addClass('enabled');
			} else {
				element.removeClass('open');
				element.animate({height:0}, 1000);
				$(this).removeClass('enabled');
			}
		}
		
		else { 
			if(!element.hasClass('open')) {
				element.animate({height:1400}, 1500);
				element.addClass('open');
				$(this).addClass('enabled');
			} else {
				element.removeClass('open');
				element.animate({height:0}, 1000);
				$(this).removeClass('enabled');
			}
		}
		
	
	})
}
*/

function moreFacilities(selector) {
	
		$(selector).live('click',function(e){
		e.preventDefault();
		
		var field = $(this).parent().parent().parent().find('.field-facilities');
		var row = $(this).parent().parent().parent().find('.row.hidden');
		var content = $(this).parent().parent().parent();
		
		if(!field.hasClass('open')) {
			field.addClass('open');
			content.addClass('is-opened');
			$(this).addClass('arrow-up');
			if(!row.hasClass('appended')) {
				row.addClass('appended');
				setTimeout(function(){
					row.stop().animate({opacity: "1"}, 500);
				}, 200)
			}
			field.animate({height:140}, 500);
		} else {
			field.removeClass('open');
			setTimeout(function(){
				content.removeClass('is-opened');
			}, 100)
			$(this).removeClass('arrow-up');
			
			if(row.hasClass('appended')) {
				row.removeClass('appended');
				setTimeout(function(){
					row.stop().animate({opacity: "0"}, 500);
				}, 10)
			}
			field.animate({height:71}, 500);
		}
	})
}

this.imagePreview = function(selector){	
	xOffset = 10;
	yOffset = 30;
	$(selector).click(function(e){
			e.preventDefault();
	});
	$(selector).hover(function(e){
		this.t = this.title;
		this.title = "";	
		var c = (this.t != "") ? "<br/>" + this.t : "";
		$("body").append("<p id='preview'><img src='" + this.href + "' alt='Image preview' />" + c + "</p>");							 
		$("#preview")
			.css("top",(e.pageY - xOffset) + "px")
			.css("left",(e.pageX + yOffset) + "px")
			.fadeIn(500);
    },
	function(){
		this.title = this.t;	

		$("#preview").fadeOut(200, function() {
   			$(this).remove();
  		});
	
    });	
	$(selector).mousemove(function(e){
		$("#preview")
			.css("top",(e.pageY - xOffset) + "px")
			.css("left",(e.pageX + yOffset) + "px");
	});			
};



function page_cars(){
	//scrollbar in first tab
	$('.find-out-hot-prices ul').jScrollPane({
		verticalDragMinHeight: 45,
		verticalDragMaxHeight: 45
	});
	


	var aClass 		= "cars"
	var ajaxUrl 	= "ajax.php?ajax=1"
	var selector 	= "#airport-car"
	setAjaxAutoComp(selector,ajaxUrl,aClass)

	
	$(".datepicker").datepicker({ 
		dateFormat: 'dd/mm/yy', 
		closeText: 'CLOSE X', 
		showButtonPanel: true,
		numberOfMonths: 2
	});
	
	$('#search-home-form-3 select').selectbox();

		//active form step js
	
	$('.step-elems input').bind('click', function(){ //on form input click
		$('#search-home-form-3 .step').each(function() {
			if ($(this).hasClass('active')) { 
				$(this).removeClass('active'); 
				$(this).find('.step-active-arrow').remove();
			} //remove active step from all
		})
		
		$(this).parents('.step').addClass('active'); //add active step
		// change form top radius if step1 active 
		if ($(this).parents('.step').hasClass('step2')) { $('#frontForm .topFormRadius').addClass('active'); }
		else { $('#frontForm .topFormRadius').removeClass('active'); }
		
		$('#search-home-form-3 .step').each(function() {
			if ($(this).hasClass('active')) { $(this).find('.step-info').append('<div class="step-active-arrow"></div>'); }
		})
	})
	
	//add first active on ready
	$('#search-home-form-3 .step2').addClass('active');
	$('#frontForm .topFormRadius').addClass('active');
	$('#search-home-form-3 .step2-info').append('<div class="step-active-arrow"></div>');
	

	$('.banner').cycle({
		timeout	: 5000,
		fx		: 'fade'
	});	


	$('.deals-wrapper').after('<div id="nav">').cycle({
		timeout	: 8000,
		fx		: 'fade', 
		pager	:"#nav"
	});
	//navigator in center
	var navwidth = $('#nav').width();
	$('#nav').css('margin-left',(354-navwidth)/2).css('width',navwidth)


	//Remove latest Search
	$('.field-remove').live('click', function(){
	
	 var listWrapper = $(this).parent().parent();
	 var rowItem = $(this).parent();
	 var newRow = rowItem.html()

		rowItem.fadeOut(800, function() {
			$(this).remove();
			listWrapper.append('<li class="row new-row" style="display:none;">' + newRow + '</li>');
		});
		
		setTimeout(function(){
			$('.new-row').fadeIn(800, function() {
				$(".latest-searches-list").load("el/cars .latest-searches-list", function() {
					//removeItem(); //calling same function onSuccess
					$('.addthis_button_compact').append('<span class="at300bs at15nc at15t_compact"></span>');
				});
			});
		}, 1000);
	});


};

function page_login () {
	
	/*$('.info-wrapper h3.1').click(function(){
	    $(this).parent().find('.one').slideToggle();
		$(".two").addClass("closed");
		$(".three").addClass("closed");
	})
	$('.info-wrapper h3.2').click(function(){
	    $(this).parent().find('.two').slideToggle();
	})
	$('.info-wrapper h3.3').click(function(){
	    $(this).parent().find('.three').slideToggle();
	})*/
		
	$('.info-wrapper li.opened').each(function(){
		
		var itemHeight = $(this).find('.infos .infosinner').outerHeight();
		
			$(this).find('.infos').animate({
					height: itemHeight + 'px'
				}, 200)
			})
		
	//Login Accordion	
	$('.info-wrapper h3').not('disabled').click(function(event){
			
		 	if($(this).parent().hasClass('opened'))
			{return}
		$('.info-wrapper h3').addClass('disabled')
		var itemHeight = $(this).parent().find('.infos .infosinner').outerHeight();
		
		if(!$('.info-wrapper ul > li').hasClass('opened')) {
			//$(this).parent().addClass('opened');
			$(this).parent().find('.infos').animate({
				height: itemHeight + 'px'
			}, 200)

		} else {

				$('li.opened .infos').animate({
					height: 0,
				}, 200,
				 function() {
						$(this).parent().removeClass('opened');
				  }
				)
				$(this).parent().addClass('opened');
			$(this).parent().find('.infos').animate({
				height: itemHeight + 'px'
			}, 200)
		}
		$('.info-wrapper h3').removeClass('disabled')
	})
	
	$('select').selectbox();

};