$(document).ready(function() {
	
	flightsMain();

/*	
	if ($('body').hasClass('page-flights')) { 
		flightsmainslide(); 
		flightsmaintools();
	} 
*/	
	
	/**************** radio buttons **************/

var d = document;
var safari = (navigator.userAgent.toLowerCase().indexOf('safari') != -1) ? true : false;
var gebtn = function(parEl,child) { return parEl.getElementsByTagName(child); };
onload = function() {

    var body = gebtn(d,'body')[0];
    body.className = body.className && body.className != '' ? body.className + ' has-js' : 'has-js';

    if (!d.getElementById || !d.createTextNode) return;
    var ls = gebtn(d,'label');
    for (var i = 0; i < ls.length; i++) {
        var l = ls[i];
        if (l.className.indexOf('label_') == -1) continue;
        var inp = gebtn(l,'input')[0];
        if (l.className == 'label_check') {
            l.className = (safari && inp.checked == true || inp.checked) ? 'label_check c_on' : 'label_check c_off';
            l.onclick = check_it;
        };
        if (l.className == 'label_radio') {
            l.className = (safari && inp.checked == true || inp.checked) ? 'label_radio r_on blueLab' : 'label_radio r_off';
            l.onclick = turn_radio;
        };
    };
};
var check_it = function() {
    var inp = gebtn(this,'input')[0];
    if (this.className == 'label_check c_off' || (!safari && inp.checked)) {
        this.className = 'label_check c_on';
        if (safari) inp.click();
    } else {
        this.className = 'label_check c_off';
        if (safari) inp.click();
    };
};
var turn_radio = function() {
    var inp = gebtn(this,'input')[0];
    if (this.className == 'label_radio r_off' || inp.checked) {
        var ls = gebtn(this.parentNode,'label');
        for (var i = 0; i < ls.length; i++) {
            var l = ls[i];
            if (l.className.indexOf('label_radio') == -1)  continue;
            l.className = 'label_radio r_off';
        };
        this.className = 'label_radio r_on blueLab';
        if (safari) inp.click();
    } else {
        this.className = 'label_radio r_off';
        if (safari) inp.click();
    };
};

/************ end radio buttons *******************/
	

	
});


/***************************** functions ****************************/

/*
function flightsmainslide(){
	$('#flights-airlines .airlines-wrapper').after('<div id="airlines-nav" />') .cycle({
		fx:     'fade',
		timeout: 0,
		pager:  '#airlines-nav' 
	});	
};
*/

function flightsMain(){
	
	$('.globaltabs').tabs();	
	
	$('.globaljcarousel').jcarousel();
	
	$('.globaljcarousel .jcarousel-item').each(function(){
		
		$(this).mouseenter(function(){
			$(this).find('.top-book-now').css('display','block');
		});
		
		$(this).mouseleave(function(){
			$(this).find('.top-book-now').css('display','none');	
		});
		
		$(this).click(function(){
			var carouzellink = $(this).find('.top-title a').attr('href');
			window.location = carouzellink;				
		})		
		
	});
	
	$('.search-all-airlines-wrapper select#allairlines').selectbox();
	
/*	//slideshow airlines
	$('#flights-airlines .airlines-wrapper').after('<div id="airlines-nav" />') .cycle({
		fx:     'fade',
		timeout: 0,
		pager:  '#airlines-nav' 
	});*/
	
	//type your flight
	$('#flights-departures .flights-departures-bottom .right #search-flight').each(function(i, el) {
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
	
//		$('#flights-airlines .ui-tabs-panel-center').cycle();	
	
}


/*
function flightsmaintools(){
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

//tabs length - back image
/*$('.globaltabs.ui-tabs ul.ui-tabs-nav li').each(function(){
	var lengthtab = $(this).find('a').html();	
	var lengthtabtrim = $.trim(lengthtab);
	if (lengthtabtrim.length > 11 && lengthtabtrim.length < 15){
		$(this).addClass('med');
	}else if (lengthtabtrim.length > 15 && lengthtabtrim.length < 20){
		$(this).addClass('big');
	} 
});
		
}*/
