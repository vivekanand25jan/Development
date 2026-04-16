<script language="javascript1.4" type="text/javascript">
/* stjook */
$(document).ready(function(){
	
	
	//functions for page-home
	setFrontFunctions()
	
	//functions for page-flights
	setFlights_1Functions()
		
	if ($('body').hasClass('page-home')) { $('#search-home-form-2').fadeIn(200) } //init the first form on load
	
	if($('body').hasClass('page-hotels-results')) { 
		setMap();  setIndividualMap(); setAllHotelMap();
		setTimeout(function() { $('#googleMap').css({'visibility':'visible', 'display':'none'}) },1000)
	}
	
	
	if($('body').hasClass('page-multidestinations'))
	{
		setMultiDest()
	}
	
	
	if($('body').hasClass('page-hotels') || $('body').hasClass('page-hotels2')) { setRooms("#search-hotel-form .step3"); }
	if($('body').hasClass('page-hotels-results-2') || $('body').hasClass('page-hotels-results') || $('body').hasClass('page-hotels-results-3')) { setRooms("#left-col #change-search-hotels-form .step4-elems"); }
	
	
	if($('body').hasClass('page-packages')) { setRooms("#left-col #search-packages-form .step4"); }
	
})

$(window).load(function(){
	//set the correct css for map
	
	

})


function setMultiDest()
{
	$('#form_multidest select').selectbox();
	

	$(".datepicker").datepicker({ 
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
		
	
	
		//active form step js
		$('.step input, .step label').click(function(){ //on form input click
			$('#form_multidest .step').each(function() {
				if ($(this).hasClass('active')) { 
					$(this).removeClass('active'); 
					$(this).find('.arr').remove();
				} //remove active step from all
			})
			
			$(this).parents('.step').addClass('active'); //add active step
			// change form top radius if step1 active 
			if ($(this).parents('.step').hasClass('step1')) { $('#mud_pageWrapper .top').addClass('active');   }
			else { $('#mud_pageWrapper .top').removeClass('active'); }
			
			$('#mud_pageWrapper .step').each(function() {
				if ($(this).hasClass('active')) { $(this).find('.itemHead').prepend('<span class="arr"></span>'); }
			})
		})
		
		//add first active on ready
		
		$('#mud_pageWrapper .step1').addClass('active');
		$('#mud_pageWrapper .step1 .itemHead').prepend('<span class="arr"></span>');

	
	
	
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
		var inputId = $(this).next().find('input').attr('id')
		//alert(inputId);
		$('#'+inputId).attr('rel','activeFrame')
	})
	
	
	
	var aClass 		= "fromair1"
	var ajaxUrl 	= "ajax.php?ajax=1"
	var selector 	= "#fromAir1"
	setAjaxAutoComp(selector,ajaxUrl,aClass)

	var aClass 		= "toair1"
	var selector 	= "#toAir1"
	setAjaxAutoComp(selector,ajaxUrl,aClass)
	
	var aClass 		= "fromair2"
	var selector 	= "#fromAir2"
	setAjaxAutoComp(selector,ajaxUrl,aClass)
	
	var aClass 		= "toair2"
	var selector 	= "#toAir2"
	setAjaxAutoComp(selector,ajaxUrl,aClass)
	
	var aClass 		= "fromair3"
	var selector 	= "#fromAir3"
	setAjaxAutoComp(selector,ajaxUrl,aClass)
	
	var aClass 		= "toair3"
	var selector 	= "#toAir3"
	setAjaxAutoComp(selector,ajaxUrl,aClass)
	
	var aClass 		= "fromair4"
	var selector 	= "#fromAir4"
	setAjaxAutoComp(selector,ajaxUrl,aClass)
	
	var aClass 		= "toair4"
	var selector 	= "#toAir4"
	setAjaxAutoComp(selector,ajaxUrl,aClass)
	
	set_multidest_AdvOp();
	
}


function setMap()
{
		
	
	$('#show-hide-map').click(function(){
		toggleMap()
	})	
}

function toggleMap()
{

		$('#googleMap').slideToggle()
		$('#googleMap').toggleClass('open','close')
		
		if($('#googleMap').hasClass('open'))
		{
			$('#show-hide-map').text('Close Map')
		}
		else
		{
			$('#show-hide-map').text('Show Map')
		}
		
}



/************************* FUNCTIONS ***********************************/

function setHotelMap(selMap,locations,mode)
{

  	var locations = [
      ['Αθήssssssssssssssssνα',37.994636052022386, 23.751648349999982, 'http://localhost/WDM/provab/gui/images/hotelIco.png'],
      ['Θεσσαλονίκη', 40.607734670341706, 22.94461684999999, 'http://localhost/WDM/provab/gui/images/hotelIco.png'],
      ['Ηράκλειο', 35.29033252993668, 25.05755494999994, 'http://localhost/WDM/provab/gui/images/hotelIco.png'],
      ['Πάτρα', 37.9748027505484, 21.663764950000086, 'http://localhost/WDM/provab/gui/images/hotelIco.png'],
      ['<img src="http://localhost/WDM/provab/gui/images/hotelIco.png" /><span>Λάρισα</span>', 39.58834867633802, 22.36551535000001, 'http://localhost/WDM/provab/gui/images/hotelIco.png'],
      ['Ρόδος', 36.32856202529708, 27.881650750000063, 'http://localhost/WDM/provab/gui/images/hotelIco.png']
    ];
  
  	//start map
	var map, infoBubble;

	function initialize() {
		var flag=true
		var mapCenter = new google.maps.LatLng(locations[0][1], locations[0][2]);
		/*var mtypes = [google.maps.MapTypeId.ROADMAP, google.maps.MapTypeId.TERRAIN, google.maps.MapTypeId.HYBRID, google.maps.MapTypeId.SATELLITE];*/
		var mtypes = [google.maps.MapTypeId.ROADMAP, google.maps.MapTypeId.SATELLITE];
		map = new google.maps.Map(document.getElementById(selMap), {
	
					zoom : 6,
					center : mapCenter,
					
					mapTypeControl: true,
					mapTypeControlOptions: 
					{
						style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
						mapTypeIds: mtypes
					},
					mapTypeId : google.maps.MapTypeId.ROADMAP				
				});
	
	

 		
 		for (i = 0; i < locations.length; i++) {	

			 var image = new google.maps.MarkerImage(
				locations[i][3],
				new google.maps.Size(43,45),
				new google.maps.Point(0,0),
				new google.maps.Point(16,37)
			  );

			var marker = new Object()
			marker = new google.maps.Marker({
						map : map,
						position : new google.maps.LatLng(locations[i][1], locations[i][2]),
						draggable : false,
						icon: image
					});
			
	
			var contentString = locations[i][0];
	
			var infoBubble = new Object()
	
			infoBubble = new InfoBubble({
						map : map,
						maxWidth : 717,
						minWidth : 717,
						maxHeight : 180,
						minHeight : 180,
						shadowStyle : 0,
						padding : 0,
						backgroundColor : 'transparent',
						borderRadius : 0,
						arrowSize : 0,
						borderWidth : 0,
						borderColor : 'transparent',
						disableAutoPan : false,
						hideCloseButton : true,
						arrowPosition : 50,
						arrowStyle : 0,
						background: "url('http://localhost/WDM/provab/gui/images/marker.png') 0 0 no-repeat"
					});
			
	 	
			

		infoBubble.addTab('info window', contentString);
	
	
		setUpMarker( marker,infoBubble )
		//mode=1 opened info box -- 
		if(mode==1 && flag==true)
		{
			infoBubble.open(map,marker);
			flag=false
		}
	
}


		function setUpMarker( marker, infoBubble){
		
			google.maps.event.addListener(marker, 'mouseover', function () {
				if (!infoBubble.isOpen()) {
					infoBubble.open(map,marker);
				}
			});
		
			google.maps.event.addListener(marker, 'mouseout', function () {
					infoBubble.close(map,marker);
			});
		
			
			
		}

}
	if(mode==1)
	{
		setTimeout(function(){ initialize() }, 300)
	}
	else
	{
		initialize()
	}
	 
	
		 
	
  
	
}



function setIndividualMap()
{
	var selMap = "googleMap"
	var markerIco = 'images/hotelIco.png'
	
	$('#hotel-list-wrapper .hotel-list-contents > ul.contents > li.row .map-link').live("click",function(){
		
		if(!$('#'+selMap).hasClass('open'))
		{
			toggleMap()
		}
		
		 $('html, body').animate({scrollTop:450}, 1200);
		
		var locations=[]
		var rowArr=[]
		firstCord = $(this).parent().parent().find('.field-hidden .cor').text()
		var cordArr = firstCord.split(',')
		var infoWinHtml = $(this).parent().parent().find('.field-hidden').html()
		var long = parseFloat(cordArr[0])
		var lang = parseFloat(cordArr[1])
		rowArr[0] = [infoWinHtml, long, lang, markerIco]
		
		j = 1
		$('#hotel-list-wrapper .hotel-list-contents > ul.contents > li.row').each(function() {
			var currCord = $(this).find('.field-hidden .cor').text()
			
			if(firstCord != currCord)
			{
				var cord = $(this).find('.field-hidden .cor').text()
				var cordArr = cord.split(',')
				var infoWinHtml = $(this).find('.field-hidden').html()
				var long = parseFloat(cordArr[0])
				var lang = parseFloat(cordArr[1])
				console.log(j)
				rowArr[j] = [infoWinHtml, long, lang, markerIco]
				j++
			}
		})
		
		locations.push.apply(locations, rowArr)
		var mode = 1 //opened info box
		setHotelMap(selMap, locations, mode)
		
	})
	
	
}
function setAllHotelMap()
{
	var selMap = "googleMap"
	var markerIco = 'images/hotelIco.png'
		var locations=[]
		var rowArr=[]
		
	$('#hotel-list-wrapper .hotel-list-contents > ul.contents > li.row').each(function(i) {
		
		var cord = $(this).find('.field-hidden .cor').text()
		var cordArr = cord.split(',')
		var infoWinHtml = $(this).find('.field-hidden').html()
		var long = parseFloat(cordArr[0])
		var lang = parseFloat(cordArr[1])
		
		rowArr[i] = [infoWinHtml, long, lang, markerIco]
    	
			
		
	})
	
	locations.push.apply(locations, rowArr)
	setHotelMap(selMap, locations, 0)
}







function setFlights_1Functions()
{
	if ($('body').hasClass('page-flights')) {
		
		var aClass 		= "flights"
		var ajaxUrl 	= "ajax.php?ajax=1"
		var selector 	= "#airport-from"
		setAjaxAutoComp(selector,ajaxUrl,aClass)
		selector  = "#airport-to"			
		setAjaxAutoComp(selector,ajaxUrl,aClass)
	}	
}





function setFrontFunctions(){
	if ($('body').hasClass('page-home')) 
	{
		
		
		
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
		
		//datepicker
		$(".datepicker").datepicker({ 
			dateFormat: 'dd/mm/yy', 
			closeText: 'CLOSE X', 
			showButtonPanel: true,
			numberOfMonths: 2
		});
		
		var aClass 		= "front"
		var ajaxUrl 	= "ajax.php?ajax=1"
		var selector 	= "#airport-from"
		setAjaxAutoComp(selector,ajaxUrl,aClass)
		selector  = "#airport-to"			
		setAjaxAutoComp(selector,ajaxUrl,aClass)
		
		
		var aClass 		= "front"
		var ajaxUrl 	= "ajax.php?ajax=1"
		var selector 	= "#airport-from-2"
		setAjaxAutoComp(selector,ajaxUrl,aClass)
		selector  = "#airport-to-2"			
		setAjaxAutoComp(selector,ajaxUrl,aClass)
		
		
		$('.deals-wrapper').after('<div id="nav">').cycle({
		timeout	: 0,
		fx		: 'fade', 
		pager	:"#nav"
	});
	
	$('.home-left-static-banner').cycle({
		timeout	: 3000,
		fx		: 'fade'
	});

	//selectboxes
	$('#frontInfant-5-c, #frontAdult-5-c, #frontChildren-4-c, #frontInfant-4-c, #frontAdult-4-c, #frontChildren-3-c, #frontInfant-3-c, #frontAdult-3-c, #frontChildren-2-c, #frontInfant-2-c, #frontAdult-2-c, #rooms-c,#frontChildren-5-c, #frontChildren-a, #frontAdult-a, #frontChildren-5-b, #frontInfant-5-b, #frontAdult-5-b, #frontChildren-4-b, #frontInfant-4-b, #frontAdult-4-b, #frontChildren-3-b, #frontInfant-3-b, #frontAdult-3-b, #frontChildren-2-b, #frontInfant-2-b, #frontAdult-2-b, #rooms-b,#seatCat, #airlineComp, #s4return, #s4depart, #frontAdult, #frontInfant, #frontInfant2, #frontChildren, #aieline6, #classOfService, #chInDateOp, #chOutDateOp, #frontRoom, #carPickDrop, #carType, #sPick, #sDrop, #destProvider, #shipDest, #cruiseLength, #cruiseMonth, #cruiseDepart, #discByLive, #cruiseLine, #s4depart-2, #s4return-2, #rooms, #advAdult, #advInfantNoSeat, #advInfantSeat, #advChildren, #advYoung, #advSeniors, #frontAdult-2, #frontAdult-3, #frontAdult-4, #frontAdult-5, #frontInfant-2, #frontInfant-3, #frontInfant-4, #frontInfant-5, #frontChildren-2, #frontChildren-3, #frontChildren-4, #frontChildren-5').selectbox()
	//active form step js
	$('.step-elems input, .step-elems label').click(function(){ //on form input click
		$('#frontForm .step').each(function() {
			if ($(this).hasClass('active')) { 
				$(this).removeClass('active'); 
				$(this).find('.step-active-arrow').remove();
			} //remove active step from all
		})
		
		$(this).parents('.step').addClass('active'); //add active step
		// change form top radius if step1 active 
		if ($(this).parents('.step').hasClass('step1')) { $('#frontForm .topFormRadius').addClass('active');   }
		else { $('#frontForm .topFormRadius').removeClass('active'); }
		
		$('#frontForm .step').each(function() {
			if ($(this).hasClass('active')) { $(this).find('.step-info').append('<div class="step-active-arrow"></div>'); }
		})
	})
	
	//add first active on ready
	$('#frontForm .step1').addClass('active');
	$('#frontForm .topFormRadius').addClass('active');
	$('#frontForm .step1-info').append('<div class="step-active-arrow"></div>');
	
	//if one way clicked hide return div from flight only
	$('#search-home-form-2  .step2 .step2-elems input').click(function(){
		if ($('#search-home-form-2 .step2-elems #oneWayR').parent().hasClass('label_radio r_on')) {
		    $('#search-home-form-2 .step4-elems .dptrtn-wrapper.last').hide();
		}
		
		else { $('#frontForm .step4-elems .dptrtn-wrapper.last').show();  }
	})
		
	
	//form activation
	setBookOption()
	setTextBlur()	
		
		
	//adv options
	setAdvOp();	
	
	//hotels visibility
	setRooms("#search-home-form-1 .step5");
	setRooms("#search-home-form .step5");
	
	
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
}


/*** other front page form functions ****/


function setRooms(form_step){
	$(form_step+' .line1 select').change(function(){
		var it = $(this).parent().find('.selectbox-wrapper ul li.selected').html();

		for(i=2;i<=5;i++){ 
			if(i<=it){
				$(form_step+' .line'+(i+1)).addClass('active')
				
			}else{
				$(form_step+' .line'+(i+1)).removeClass('active')
			}
		}
		$(form_step).attr('rel',it)
		
	})
}

/*function setRooms_OLD(){
	$('#search-home-form .step5 .line1 select').change(function(){
		var it = $(this).parent().find('.selectbox-wrapper ul li.selected').html();
		for(i=2;i<=5;i++){
			if(i<=it){
				$('#search-home-form .step5 .line'+(i+1)).addClass('active')
			}else{
				$('#search-home-form .step5 .line'+(i+1)).removeClass('active')
			}
		}
		$('#search-home-form .step5 ').attr('rel',it)
		
	})
	
	$('#search-home-form-1 .step5 .line1 select').change(function(){
		var it = $(this).parent().find('.selectbox-wrapper ul li.selected').html();
		for(i=2;i<=5;i++){
			if(i<=it){
				$('#search-home-form-1 .step5 .line'+(i+1)).addClass('active')
			}else{
				$('#search-home-form-1 .step5 .line'+(i+1)).removeClass('active')
			}
		}
		$('#search-home-form-1 .step5 ').attr('rel',it)
		
	})
}*/


function setAdvOp()
{
	$('#search-home-form-2 .directFlight a:first').live('click',function(e){
		e.preventDefault()
		
		if ($(this).hasClass('close'))
		{
			$('#search-home-form-2 .step5 .line1:first, #search-home-form-2 .flightOption').fadeIn(200)
			$('#search-home-form-2 .step5 #advOptionsWrapper, #search-home-form-2 .step6').css('display','none')
			$('#search-home-form-2 .directFlight .closeBtn').remove()
			$('#search-home-form-2 .step5').removeClass('advOp-active')
			$('#search-home-form-2 .adOpLink').css('display','block')
		}
		else
		{
			$('#search-home-form-2 .step5 .line1:first, #search-home-form-2 .flightOption,  #search-home-form-2 .adOpLink').css('display','none')
			$('#search-home-form-2 .step5 #advOptionsWrapper, #search-home-form-2 .step6').fadeIn(200)
			$('#search-home-form-2 .directFlight').prepend('<div class="closeBtn"><a class="close" href="#">Close Advanced Options</a></div>')
			$('#search-home-form-2 .step5').addClass('advOp-active')
		}	
	})
	
	$('#search-home-form .directFlight a:first').live('click',function(e){
		e.preventDefault()
		
		if ($(this).hasClass('close'))
		{
			$('#search-home-form .step5 .line1:first, #search-home-form .flightOption').fadeIn(200)
			$('#search-home-form .step5 #advOptionsWrapper, #search-home-form .step6').css('display','none')
			$('#search-home-form .directFlight .closeBtn').remove()
			$('#search-home-form .step5').removeClass('advOp-active')
			$('#search-home-form .adOpLink').css('display','block')
		}
		else
		{
			$('#search-home-form .flightOption,  #search-home-form .adOpLink').css('display','none')
			$('#search-home-form .step5 #advOptionsWrapper, #search-home-form .step6').fadeIn(200)
			$('#search-home-form .directFlight').prepend('<div class="closeBtn"><a class="close" href="#">Close Advanced Options</a></div>')
			$('#search-home-form .step5').addClass('advOp-active')
		}	
	})
}














function set_multidest_AdvOp() {
	$('#mud_pageWrapper #form_multidest .directFlight a:first').live('click',function(e){
		e.preventDefault()
		

		if ($(this).hasClass('close'))
		{
			$('#mud_pageWrapper .step.advhidden').removeClass('advOp-active').css('display', 'none')
			$('#mud_pageWrapper #form_multidest .step3 .r1-item.advhidden').css('display','none')
			$('#mud_pageWrapper #form_multidest .adOpLink').css('display','block')
			$('#mud_pageWrapper .directFlight .closeBtn').remove()
			$('#mud_pageWrapper #form_multidest .step3 .r1-item.advshow').css('display','block')
			
		}
		else
		{
			
			$('#mud_pageWrapper #form_multidest .adOpLink').css('display','none')
			$('#mud_pageWrapper #form_multidest .step3 .r1-item.advhidden').css('display','block')
			$('#mud_pageWrapper #form_multidest .step3 .r1-item.advshow').css('display','none')
			$('#mud_pageWrapper .step.advhidden').fadeIn(200)
			$('#mud_pageWrapper #form_multidest .directFlight .flightOption').after('<div class="closeBtn"><a class="close" href="#">Close Advanced Options</a></div>')
			$('#mud_pageWrapper .step.advhidden').addClass('advOp-active')
		}	
	})
}







function setBookOption()
{
	
	

	$('#frontForm .step1-elems label').click(function(e){
		e.preventDefault();
		var formId =  $(this).find('input').attr('rel')
		$('#frontForm .bookingForm').css('display','none').removeClass('active')
		$('#'+formId).addClass('active').fadeIn(300)
	})
}


function setTextBlur()
{
	$('#search-home-form-1 #hotelName').each(function(i, el) {
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
	</script>