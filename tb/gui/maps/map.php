<?php
	require_once('functions.php');
	
	 readCSV();
	
	if(isset($_GET[ajaxOp]) && isset($_GET[action]))
	{
		if($_GET[action]=="getAir")
		{
			$airports = readCSV();
			echo getAirports($_GET[ajaxOp], $airports);
		}
		else if($_GET[action]=="getCountries")
		{
			$airports = readCSV();
			echo getCountries($_GET[ajaxOp], $airports);
		}
	}
	else
	{

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="jquery.vector-map.css" media="screen" rel="stylesheet" type="text/css" />
<link href="maps.css" media="screen" rel="stylesheet" type="text/css" />
<link href="../styles/reset.css" media="screen" rel="stylesheet" type="text/css" />
<script src="../scripts/jquery-1.4.2.min.js" type="text/javascript"></script>
<script src="../scripts/jquery-ui-1.8.18.custom.min.js" type="text/javascript"></script>
<script type="text/javascript" src="../scripts/jquery.jscrollpane.js"></script>
<script type="text/javascript" src="../scripts/jquery.mousewheel.js"></script>
<script type="text/javascript" src="../scripts/autocomplete-ui.js"></script>
<script src="jquery.vector-map.js" type="text/javascript"></script>
<script src="world-en.js" type="text/javascript"></script>
<script src="africa-en.js" type="text/javascript"></script>
<script src="asia-en.js" type="text/javascript"></script>
<script src="caribbean-en.js" type="text/javascript"></script>
<script src="centaral-america-en.js" type="text/javascript"></script>
<script src="europe-en.js" type="text/javascript"></script>
<script src="north-america-en.js" type="text/javascript"></script>
<script src="oceania-en.js" type="text/javascript"></script>
<script src="south-america-en.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){ 
	 initMaps()
	 
	 
	 //setMenu
	 setMapsMenu()
	 
	 setAutoComplete('#countries')
	
	$('.leftCol .map').click(function() {
		var map=""
		if($(this).hasClass('af'))
		{
			map = '.af.map'
		}
		else if($(this).hasClass('as'))
		{
			map = '.as.map'
		}
		else if($(this).hasClass('cr'))
		{
			map = '.cr.map'
		}
		else if($(this).hasClass('ca'))
		{
			map = '.ca.map'
		}
		else if($(this).hasClass('eu'))
		{
			map = '.eu.map'
		}
		else if($(this).hasClass('na'))
		{
			map = '.na.map'	
		}
		else if($(this).hasClass('oc'))
		{
			map = '.oc.map'
		}
		else if($(this).hasClass('sa'))
		{
			map = '.sa.map'
		}
	
		
		
	}) 
	

})


$(window).load(function(){
	
	
	setMapCordinates('all','load')

})
/**************** functions ****************/
function setMapsCordinates()
{
	var cordArr = {"maps" : [{"reg" : "af", "cord" : "scale(1.4209999999999998) translate(-313.6101337086557, -160.39408866995075)" },
						 {"reg" : "as", "cord" : "scale(1.2) translate(-502.97084548104954, -48.871720116618)" },
						 {"reg" : "cr", "cord" : "scale(1.55) translate(-200.8571428571428, -141.99999999999997)" },	
						 {"reg" : "ca", "cord" : "scale(1.5) translate(-15, -100)" },	
						 {"reg" : "eu", "cord" : "scale(0.88) translate(-315, 120)" },	
						 {"reg" : "na", "cord" : "scale(1.2) translate(30, 50)" },	
						 {"reg" : "oc", "cord" : "scale(0.5) translate(10, -100)" },	
						 {"reg" : "sa", "cord" : "scale(1.6) translate(-120, -260)" }]}
						 
						 
	for(var i=0;cordArr.maps.length>i;i++)
	{
		var m = '.'+cordArr.maps[i].reg+'.map' 	
		var sel = $(m+' svg g')[0]
		sel.getAttributeNode('transform').value = cordArr.maps[i].cord
		
	}					 
}




function initMaps()
{
	
	//init the maps
	 $('.af.map').vectorMap({
		 map: 'africa_en',
		 backgroundColor : '#212121',
		 color : '#121212',
		 hoverColor : '#E84C09',
	 	 onRegionClick: function(event, code){
			 				getAirports(code)
							setActiveColor(code) 
							var countryLab = $('.jvectormap-label').eq(0).text()
							$('#airportsByMap .rightCol h3').text(countryLab)
						},
		onRegionOver: function(event, code){
							setHoverColor(code)
						},
		onRegionOut: function(event, code){
							setOutColor(code)
		}								
	 })
	  $('.as.map').vectorMap({
		 map: 'asia_en',
		 backgroundColor : '#212121',
		 color : '#121212',
		 hoverColor : '#E84C09',
	 	 onRegionClick: function(event, code){
			 				getAirports(code)
							setActiveColor(code) 
							var countryLab = $('.jvectormap-label').eq(1).text()
							$('#airportsByMap .rightCol h3').text(countryLab)
						},
		onRegionOver: function(event, code){
							setHoverColor(code)
						},
		onRegionOut: function(event, code){
							setOutColor(code)
		}								
	 })
	 $('.cr.map').vectorMap({	 
		 map: 'caribbean_en',
		 backgroundColor : '#212121',
		 color : '#121212',
		 hoverColor : '#E84C09',
	 	 onRegionClick: function(event, code){
			 				getAirports(code)
							setActiveColor(code) 
							var countryLab = $('.jvectormap-label').eq(2).text()
							$('#airportsByMap .rightCol h3').text(countryLab)
						},
		onRegionOver: function(event, code){
							setHoverColor(code)
						},
		onRegionOut: function(event, code){
							setOutColor(code)
		}								
	 })
	 $('.ca.map').vectorMap({	 
		 map: 'central_america_en',
		 backgroundColor : '#212121',
		 color : '#121212',
		 hoverColor : '#E84C09',
	 	 onRegionClick: function(event, code){
			 				getAirports(code)
							setActiveColor(code) 
							var countryLab = $('.jvectormap-label').eq(3).text()
							$('#airportsByMap .rightCol h3').text(countryLab)
						},
		onRegionOver: function(event, code){
							setHoverColor(code)
						},
		onRegionOut: function(event, code){
							setOutColor(code)
		}								
	 })
	 $('.eu.map').vectorMap({	 
		 map: 'europe_en',
		 backgroundColor : '#212121',
		 color : '#121212',
		 hoverColor : '#E84C09',
	 	 onRegionClick: function(event, code){
			 				getAirports(code)
							setActiveColor(code) 
							var countryLab = $('.jvectormap-label').eq(4).text()
							$('#airportsByMap .rightCol h3').text(countryLab)
						},
		onRegionOver: function(event, code){
							setHoverColor(code)
						},
		onRegionOut: function(event, code){
							setOutColor(code)
		}								
	 })
	 $('.na.map').vectorMap({	 
		 map: 'north_america_en',
		 backgroundColor : '#212121',
		 color : '#121212',
		 hoverColor : '#E84C09',
	 	 onRegionClick: function(event, code){
			 				getAirports(code)
							setActiveColor(code) 
							var countryLab = $('.jvectormap-label').eq(5).text()
							$('#airportsByMap .rightCol h3').text(countryLab)
						},
		onRegionOver: function(event, code){
							setHoverColor(code)
						},
		onRegionOut: function(event, code){
							setOutColor(code)
		}								
	 })
	 $('.oc.map').vectorMap({	 
		 map: 'oceania_en',
		 backgroundColor : '#212121',
		 color : '#121212',
		 hoverColor : '#E84C09',
	 	 onRegionClick: function(event, code){
			 				getAirports(code)
							setActiveColor(code) 
							var countryLab = $('.jvectormap-label').eq(6).text()
							$('#airportsByMap .rightCol h3').text(countryLab)
						},
		onRegionOver: function(event, code){
							setHoverColor(code)
						},
		onRegionOut: function(event, code){
							setOutColor(code)
		}								
	 })
	 $('.sa.map').vectorMap({	 
		 map: 'south_america_en',
		 backgroundColor : '#212121',
		 color : '#121212',
		 hoverColor : '#E84C09',
	 	 onRegionClick: function(event, code){
			 				getAirports(code)
							setActiveColor(code) 
							var countryLab = $('.jvectormap-label').eq(7).text()
							$('#airportsByMap .rightCol h3').text(countryLab)
						},
		onRegionOver: function(event, code){
							setHoverColor(code)
						},
		onRegionOut: function(event, code){
							setOutColor(code)
		}								
	 })
}


function setMapCordinates(map,mode)
{
	var cordArr = {"maps" : [{"reg" : "af", "cord" : "scale(1.4209999999999998) translate(-313.6101337086557, -160.39408866995075)" },
						 {"reg" : "as", "cord" : "scale(1.2) translate(-502.97084548104954, -48.871720116618)" },
						 {"reg" : "cr", "cord" : "scale(1.55) translate(-200.8571428571428, -141.99999999999997)" },	
						 {"reg" : "ca", "cord" : "scale(1.5) translate(-15, -100)" },	
						 {"reg" : "eu", "cord" : "scale(0.88) translate(-315, 120)" },	
						 {"reg" : "na", "cord" : "scale(1.2) translate(30, 50)" },	
						 {"reg" : "oc", "cord" : "scale(0.5) translate(10, -100)" },	
						 {"reg" : "sa", "cord" : "scale(1.6) translate(-120, -260)" }]}
				
	/*if(mode=='click')
	{
		var sel =""
		for(var i=0;cordArr.maps.length>i;i++)
		{
		  var m = '.'+cordArr.maps[i].reg+'.map' 	
		  
		  if(m==map)
		  {
			  
			sel = $(map+' svg g')[0]
			sel.getAttributeNode('transform').value = cordArr.maps[i].cord
			return; 
		  }
		}
		
	}
	else*/ if(mode=='load')
	{
		for(var i=0;cordArr.maps.length>i;i++)
		{
		  	var m = '.'+cordArr.maps[i].reg+'.map' 	
			var sel = $(m+' svg g')[0]
			sel.getAttributeNode('transform').value = cordArr.maps[i].cord
			
		}
	}

	
}



function setMapsMenu()
{
	$('#airportsByMap .mapMenu li').click(function(){
		var curRel = $(this).attr('rel')
		var curName = $(this).text()
		$('#airportsByMap .mapMenu li').removeClass('active')
		$(this).addClass('active')
		$('#airportsByMap .mapBody .map').css('display','none')
		$('#airportsByMap .mapBody .map.'+curRel).fadeIn(200)	
		$('#airportsByMap .rightCol h3').text(curName)
		
		getCountries(curRel)
		
		resetActiveMapCountry()
	
	})
} 


function setAutoComplete(sel)
{
	var itemSel = "#autoItemsWrapper"
	if(sel=='#airports')
	{
		itemSel = "#autoItemsWrapper2"
	}
	//init autocomplete
	$( sel ).combobox();
	$('.ui-button').trigger('click')
	//init css for jscrollpane
	setTimeout(function(){
		$(itemSel).jScrollPane({
							verticalDragMinHeight: 130,
							verticalDragMaxHeight: 130
						})
	},200)
	
	var timeoutId = null	
		
	$( ".ui-autocomplete-input" ).autocomplete({
		appendTo: itemSel,
   		select: function(event, ui) { 
					if(ui.item.option.value!='undifined' && ui.item.option.value!=null && $('#countries').length>0)
					{	
						getAirports(ui.item.option.value)
						$('#airportsByMap .rightCol h3').text(ui.item.option.label)
						//console.log(ui)
						
						//set active the map country
						var activeMap = $('#airportsByMap .mapMenu li.active').attr('rel')
						var currId =""
						var codeArr = new Array()
						resetActiveMapCountry() //reset active regions
						$('.map.'+activeMap+' path').each(function(){
							currId = $(this).attr('id')
							//console.log(currId)
							codeArr = currId.split('_')
							//console.log(codeArr[1]+'=='+ui.item.option.value)
							if(codeArr[1]==ui.item.option.value)
							{
								$('#'+currId).attr('fill','#e84c09').attr('rel','active')
							} 
						})
					}
					else if(ui.item.option.value!='undifined' && ui.item.option.value!=null && $('#airports').length>0)
					{
						parent.$('[rel="activeFrame"]').val(ui.item.option.label)
						parent.$('[rel="activeFrame"]').attr('rel','')
						parent.$('#fancybox-close').trigger('click')
						
					}
					
					
		},
		search: function(event, ui) {
					if(timeoutId)
					{
						clearTimeout(timeoutId)
					}				
					timeoutId = setTimeout(function() {
						$(itemSel).jScrollPane({
							verticalDragMinHeight: 130,
							verticalDragMaxHeight: 130
						})
					}, 300)
	}
	})
}

function getAirports(countryCode)
{
	
	$.ajax({
		url:'map.php?ajaxOp='+countryCode+'&action=getAir',
		cache:false,
		success: function(data){
		    /*Custom Code*/
		    $('#autoItemsWrapper2').remove()
		    /*End Of Custom COde*/
			$('#autoCompleteWrapper').empty().append(data)
			$('#autoItemsWrapper').remove()
			$('#autoCompleteWrapper').after('<div id="autoItemsWrapper2"/>')
			setTimeout(function(){ 
					setAutoComplete('#airports') 
					$('.ui-autocomplete-input').val('')
			}, 200)
		}
	})
}
function getCountries(regionCode)
{
	$.ajax({
		url:'map.php?ajaxOp='+regionCode+'&action=getCountries',
		cache:false,
		success: function(data){
			$('#autoCompleteWrapper').empty().append(data)
			$('#autoItemsWrapper2, #autoItemsWrapper').remove()
			$('#autoCompleteWrapper').after('<div id="autoItemsWrapper"/>')
			setTimeout(function(){ 
							setAutoComplete('#countries')
							$('.ui-autocomplete-input').val('')
			 }, 200)
		}
	})
}

function setOutColor(code)
{
	
	sel = getMapItemSelector(code)
	thisRel = $(sel).attr('rel')
	//console.log('out '+sel)
	if(thisRel!='active')
	{
		$(sel).attr('fill','#121212')
	}
	
}

function setActiveColor(code)
{
	//reset all the colors
	resetActiveMapCountry()
	
	
	sel = getMapItemSelector(code)
	$(sel).attr('rel','active')
	$(sel).attr('fill','#e84c09')

}
function setHoverColor(code)
{
		var sel = getMapItemSelector(code)
		thisRel = $(sel).attr('rel')
		
			//console.log('hover '+sel)
			$(sel).attr('fill','#e84c09')
		
}

function getMapItemSelector(code)
{
	var sel =""
	var mapIds = [{'mapId' : 'af', 'itemId' :'jvectormap1_'},
              {'mapId' : 'as', 'itemId' :'jvectormap2_'},
              {'mapId' : 'cr', 'itemId' :'jvectormap3_'},
              {'mapId' : 'ca', 'itemId' :'jvectormap4_'},
              {'mapId' : 'eu', 'itemId' :'jvectormap5_'},
              {'mapId' : 'na', 'itemId' :'jvectormap6_'},
              {'mapId' : 'oc', 'itemId' :'jvectormap7_'},
              {'mapId' : 'sa', 'itemId' :'jvectormap8_'}
				] 
	var activeMap = $('#airportsByMap .mapMenu ul li.active').attr('rel')
	for(var i = 0; mapIds.length>i;i++)
	{
		if(mapIds[i].mapId==activeMap)
		{
			sel = mapIds[i].itemId
		}
	}
	sel = '#'+sel+code
	return sel
}
function resetActiveMapCountry()
{
	$('path').attr('fill','#121212')
	$('path').attr('rel','')
}
</script>
</head>

<body>
<div id="airportsByMap">
  <div class="mapMenu">
    <ul>
      <li rel="af">Africa</li>
      <li rel="as">Asia</li>
      <li rel="cr" class="med">Caribbean</li>
      <li rel="ca" class="big">Central America</li>
      <li rel="eu" class="active">Europe</li>
      <li rel="na" class="big">North America</li>
      <li rel="oc">Oceania</li>
      <li rel="sa" class="big last">South America</li>
    </ul>
  </div>
  <!-- /#mapMenu -->
  <div class="mapBody">
  <div class="leftCol">
    <div class="af map"></div>
    <div class="as map"></div>
    <div class="cr map"></div>
    <div class="ca map"></div>
    <div class="eu map" style="display:block;"></div>
    <div class="na map"></div>
    <div class="oc map"></div>
    <div class="sa map"></div>
  </div>
  <div class="rightCol">
    <h3>Europe</h3>
    <div id="autoCompleteWrapper">
      <?php
       	$airports = readCSV();
		echo getCountries('eu', $airports);
	   ?>
    </div>
    <div id="autoItemsWrapper"></div>
  </div>
</div>
</div>
<!-- / #airportsByMap -->

</body>
</html>
<?php
	}
?>