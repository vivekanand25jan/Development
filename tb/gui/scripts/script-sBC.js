/* stjook */
$(document).ready(function(){
	//functions for page-home
	setFrontFunctions()
	
	//functions for page-flights
	setFlights_1Functions()
		
	if ($('body').hasClass('page-home')) { $('#search-home-form-2').fadeIn(200) } //init the first form on load
	
	
	setHotelMap()
	
	
})








/************************* FUNCTIONS ***********************************/

function setHotelMap()
{
	if($('body').hasClass('page-hotels-results'))
	{
		
		/*
		var locations = [
      ['Αθήνα', 37.994636052022386, 23.751648349999982, 'images/hotelIco.png'],
      ['Θεσσαλονίκη', 40.607734670341706, 22.94461684999999, 'images/hotelIco.png'],
      ['Ηράκλειο', 35.29033252993668, 25.05755494999994, 'images/hotelIco.png'],
      ['Πάτρα', 37.9748027505484, 21.663764950000086, 'images/hotelIco.png'],
      ['<img src="images/hotelIco.png" /><span>Λάρισα</span>', 39.58834867633802, 22.36551535000001, 'images/hotelIco.png'],
      ['Ρόδος', 36.32856202529708, 27.881650750000063, 'images/hotelIco.png']
    ];
   
    var map = new google.maps.Map(document.getElementById('googleMap'), {
      zoom: 6,
      center: new google.maps.LatLng(39.074207998803764, 21.824311999999964),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {
		var myLatLng =    new google.maps.LatLng(locations[i][1], locations[i][2]);
  		var markerIcon = new google.maps.MarkerImage(
			locations[i][3],
			new google.maps.Size(43,45),
			new google.maps.Point(0,0),
			new google.maps.Point(16,37)
  		); 
 
 	var markerShadow = new google.maps.MarkerImage(
    	"images/shadow-beauty.png",
    	new google.maps.Size(51,37),
    	new google.maps.Point(0,0),
    	new google.maps.Point(16,37)
  	);

     marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
      	icon:markerIcon,
      	shadow:markerShadow
      });
	  
	 google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));

    } 
	  /** info box **
	 	var locations = [
      ['Αθήνα', 37.994636052022386, 23.751648349999982, 'images/hotelIco.png'],
      ['Θεσσαλονίκη', 40.607734670341706, 22.94461684999999, 'images/hotelIco.png'],
      ['Ηράκλειο', 35.29033252993668, 25.05755494999994, 'images/hotelIco.png'],
      ['Πάτρα', 37.9748027505484, 21.663764950000086, 'images/hotelIco.png'],
      ['<img src="images/hotelIco.png" /><span>Λάρισα</span>', 39.58834867633802, 22.36551535000001, 'images/hotelIco.png'],
      ['Ρόδος', 36.32856202529708, 27.881650750000063, 'images/hotelIco.png']
    ];
   
    var map = new google.maps.Map(document.getElementById('googleMap'), {
      zoom: 6,
      center: new google.maps.LatLng(39.074207998803764, 21.824311999999964),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow({
				map : map,
				maxWidth : 400,
				minWidth : 150,
				maxHeight : 300,
				minHeight : 50,
				shadowStyle : 1,
				padding : 10,
				backgroundColor : '#fdead0',
				borderRadius : 8,
				arrowSize : 15,
				borderWidth : 5,
				borderColor : '#ff8000',
				disableAutoPan : false,
				hideCloseButton : false,
				arrowPosition : 50,
				arrowStyle : 0
			});

    var marker, i;

    for (i = 0; i < locations.length; i++) {
		var myLatLng =    new google.maps.LatLng(locations[i][1], locations[i][2]);
  		var markerIcon = new google.maps.MarkerImage(
			locations[i][3],
			new google.maps.Size(43,45),
			new google.maps.Point(0,0),
			new google.maps.Point(16,37)
  		); 
 
 	var markerShadow = new google.maps.MarkerImage(
    	"images/shadow-beauty.png",
    	new google.maps.Size(51,37),
    	new google.maps.Point(0,0),
    	new google.maps.Point(16,37)
  	);

     marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
      	icon:markerIcon,
      	shadow:markerShadow,
		
      });
	  
	 google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
		  infowindow.addOverlay()
        }
      })(marker, i));

    }
  */
  
  	var locations = [
      ['Αθήνα', 37.994636052022386, 23.751648349999982, 'images/hotelIco.png'],
      ['Θεσσαλονίκη', 40.607734670341706, 22.94461684999999, 'images/hotelIco.png'],
      ['Ηράκλειο', 35.29033252993668, 25.05755494999994, 'images/hotelIco.png'],
      ['Πάτρα', 37.9748027505484, 21.663764950000086, 'images/hotelIco.png'],
      ['<img src="images/hotelIco.png" /><span>Λάρισα</span>', 39.58834867633802, 22.36551535000001, 'images/hotelIco.png'],
      ['Ρόδος', 36.32856202529708, 27.881650750000063, 'images/deals.png']
    ];
  
  //start map
var map, infoBubble;
function initialize() {
	var mapCenter = new google.maps.LatLng(37.994636052022386, 23.751648349999982);
	var mtypes = [google.maps.MapTypeId.ROADMAP, google.maps.MapTypeId.TERRAIN, google.maps.MapTypeId.HYBRID, google.maps.MapTypeId.SATELLITE];
	map = new google.maps.Map(document.getElementById('googleMap'), {

				zoom : 16,
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
				maxWidth : 400,
				minWidth : 150,
				maxHeight : 300,
				minHeight : 50,
				shadowStyle : 1,
				padding : 10,
				backgroundColor : '#fdead0',
				borderRadius : 8,
				arrowSize : 15,
				borderWidth : 5,
				borderColor : '#ff8000',
				disableAutoPan : false,
				hideCloseButton : false,
				arrowPosition : 50,
				arrowStyle : 0
			});
			
	 	
			

	infoBubble.addTab('info window', contentString);
	
	
	setUpMarker( marker,infoBubble )
	


}
}


function setUpMarker( marker, infoBubble){
	
	
	
	google.maps.event.addListener(marker, 'click', function () {
		if (!infoBubble.isOpen()) {
			infoBubble.open(map,marker);
		} else {
			infoBubble.close(map,marker);
		}
	});
	
	
	
}


google.maps.event.addDomListener(window, 'load', initialize);

  
	}
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
	$('#seatCat, #airlineComp, #s4return, #s4depart, #frontAdult, #frontInfant, #frontInfant2, #frontChildren, #aieline6, #classOfService, #chInDateOp, #chOutDateOp, #frontRoom, #carPickDrop, #carType, #sPick, #sDrop, #destProvider, #shipDest, #cruiseLength, #cruiseMonth, #cruiseDepart, #discByLive, #cruiseLine, #s4depart-2, #s4return-2, #rooms, #advAdult, #advInfantNoSeat, #advInfantSeat, #advChildren, #advYoung, #advSeniors, #frontAdult-2, #frontAdult-3, #frontAdult-4, #frontAdult-5, #frontInfant-2, #frontInfant-3, #frontInfant-4, #frontInfant-5, #frontChildren-2, #frontChildren-3, #frontChildren-4, #frontChildren-5').selectbox()
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
	
	//if one way clicked hide return div
	$('#frontForm  .step2 .step2-elems input').click(function(){
		if ($('#frontForm .step2-elems #oneWayR').parent().hasClass('label_radio r_on')) {
		    $('#frontForm .step4-elems .dptrtn-wrapper.last').hide();
		}
		
		else { $('#frontForm .step4-elems .dptrtn-wrapper.last').show();  }
	})
		
	
	//form activation
	setBookOption()
	setTextBlur()	
		
		
	//adv options
	setAdvOp();	
	
	//hotels visibility
	setRooms();
	
	}
}


/*** other front page form functions ****/

function setRooms(){
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
}


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
	