<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="<?php echo WEB_DIR ?>css/postion.css" rel="stylesheet" type="text/css" />
<script src="http://maps.google.com/maps?file=api&v=2&key=ABQIAAAAjoAnqgtNlKhPJ8d33APkoBTLi0P7-tcn95-WtI2SMCbAR1YmLBRQJvuKfLjsZK9IHDCUaH7R9C-mnw" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo WEB_DIR ?>script/pdmarker.js"></script>
<style type="text/css">
      div.markerDetail {
          color: black;
          font-weight: bold;
          background-color: white;
          white-space:wrap;
          margin: 0;
          padding: 2px 4px;
          border: 1px solid black;
       }
	   div.markerTooltip
	   {
          color: black;
          font-weight: bold;
          background-color: white;
          white-space:nowrap;
          margin: 0;
          padding: 2px 4px;
          border: 1px solid black;
       }
    </style>
<script type="text/javascript">

 var map;
    			var geocoder;
                function mapLoad() {
                    if (GBrowserIsCompatible()) {
                        var map = new GMap2(document.getElementById("map"),{size:new GSize(226,193)});
		  			var infowindow = new google.maps.InfoWindow();

                        var point = new GLatLng(<?php print $lat; ?>,<?php print $long; ?>);
                        map.setCenter(new GLatLng(<?php print $lat; ?>,<?php print $long; ?>),13);
                        var marker = new GMarker(point);

                        map.addOverlay(marker);
                      	var customUI = map.getDefaultUI();
						customUI.controls.scalecontrol = false;
						map.setUI(customUI);
                    }
					if (GBrowserIsCompatible()) {
					/*geocoder = new GClientGeocoder();
					map2 = new GMap2(document.getElementById('ajaxmappp'));
					map2.setCenter(new GLatLng(40, -100), 4);*/
					
				/*	var map = new GMap2(document.getElementById("ajaxmappp"));
			        map.setCenter(new GLatLng(37.4419, -122.1419), 13);
        			map.setUIToDefault();*/
					
					/*var customUI = map.getDefaultUI();
					customUI.controls.scalecontrol = false;
					map.setUI(customUI);*/
					
				  }
                     window.focus();
                }
function searchLocationsNear(resultid) 
				{
					
					var map = new GMap2(document.getElementById("map"),{size:new GSize(700,350)});
					var searchUrl = '<?php echo WEB_URL;  ?>hotel/ajax_map_show/'+resultid;
				$("#map").slideToggle("fast",function(){

//Toggles link text between open and close 
//=="Open" is vital in order to close the box
($("#btn-slide").html()=="Show Map")?$("#btn-slide").html("Hide Map"):$("#btn-slide").html("Show Map");
  });
					GDownloadUrl(searchUrl, function(data)
					{
						
						var xml = GXml.parse(data);
						var markers = xml.documentElement.getElementsByTagName('marker');
					//	alert(markers);
						if(markers.length > 100)
						{
							var mar = 100;
						}
						else
						{
							var mar = markers.length;
						}
						for (var i = 0; i < 10; i++)
						{
							 var name = markers[i].getAttribute('name');
						
							  var desc = '';
							  var starr = markers[i].getAttribute('star');
							   var roomtypee = '';
							     var total = markers[i].getAttribute('totalcost');
								     var picc = markers[i].getAttribute('pic');
							  
							  
							  var point = new GLatLng(parseFloat(markers[i].getAttribute('lat')), 
												 parseFloat(markers[i].getAttribute('lng')));	
							  map.setCenter(new GLatLng(parseFloat(markers[i].getAttribute('lat')), 
												 parseFloat(markers[i].getAttribute('lng'))),11);
							
							// var marker = new GMarker(point);
							//map.addOverlay(createMarker(point, i));
							/*map.addControl(new GSmallMapControl());
                        	map.addControl(new GMapTypeControl());*/
							map.setUIToDefault();
							var g = 0;
							map.addOverlay(createMarker(point, name,i,g, desc, starr,roomtypee, total, picc));
	                       
						}
						// Add 10 markers to the map at random locations
						//map.addOverlay(marker);
                      
					});
					
				            
	   			}
				function createMarker(point, index,val,mark,desc, starr, roomtypee, total, picc) {				
			
					
				  if(val==mark)
				  {
					
					   var baseIcon = new GIcon(G_DEFAULT_ICON);
						baseIcon.shadow = "http://www.google.com/mapfiles/shadow50.png";
						baseIcon.iconSize = new GSize(26, 27);
						baseIcon.shadowSize = new GSize(0, 0);
						baseIcon.iconAnchor = new GPoint(9, 34);
						baseIcon.infoWindowAnchor = new GPoint(9, 2);
				  		var letteredIcon = new GIcon(baseIcon);
				 	// letteredIcon.image = "http://provabtechnosoft.com/WDM/555_online/images/icon_blue_H.png";
					 letteredIcon.image = "<?php echo WEB_DIR ?>images/unselect.png";
				  }
				  else
				  {
					   var baseIcon = new GIcon(G_DEFAULT_ICON);
						baseIcon.shadow = "http://www.google.com/mapfiles/shadow50.png";
						baseIcon.iconSize = new GSize(17, 20);
						baseIcon.shadowSize = new GSize(0, 0);
						baseIcon.iconAnchor = new GPoint(9, 34);
						baseIcon.infoWindowAnchor = new GPoint(9, 2);
						  var letteredIcon = new GIcon(baseIcon);
					  //letteredIcon.image = "http://provabtechnosoft.com/WDM/555_online/images/icon_red_H.png";
					  letteredIcon.image = "<?php echo WEB_DIR ?>images/select.png";
				  }
				  		 
				
				  // Set up our GMarkerOptions object
				  markerOptions = { icon:letteredIcon };
				  
				 var marker = new PdMarker(point, markerOptions,index,val);
				marker.setTooltip(index);
		if(starr == 1)
		{
			var starval = "<img src='<?php echo WEB_DIR ?>images/1 star.jpg' />";
		}
		else if(starr == 2)
		{
			var starval = "<img src='<?php echo WEB_DIR ?>images/2 star.jpg'  />";
		}
		else if(starr == 3)
		{
			var starval = "<img src='<?php echo WEB_DIR ?>images/3 star.jpg'  />";
		}
		else if(starr == 4)
		{
			var starval = "<img src='<?php echo WEB_DIR ?>images/4 star.jpg'  />";
		}
		else if(starr == 5)
		{
			var starval = "<img src='<?php echo WEB_DIR ?>images/5 star.jpg'  />";
		}
		else 
		{
			var starval = "Nil";
		}	
		
		
				 //<img src="<?php echo WEB_DIR ?>images/star_icon_4_map_popo_up.jpg" width="64" height="12" />
				 				//  var marker = new GMarker(point, markerOptions);
				var a = roomtypee.split(",");	
				var b = total.split(",");
				//roomminfo.clear();
				var roomminfo = [];
				
				for (var i = 0; i < a.length; i++)
				{
					 roomminfo[i] ='<div style="width:233px; float:left;  padding:10px 0 5px 0;"><div style="font-family:Arial, Helvetica, sans-serif; font-size:11px; font-weight:bold; color:#FFF; padding:0 10px 0 5px; float:left;">'+a[i]+'</div><div style="font-family:Arial, Helvetica, sans-serif; font-size:11px; font-weight:bold; color:#FFF; padding:0 10px 0 5px; float:left;">USD '+b[i]+'</div></div><br>';					
					
				}
			
								
								//<div style="width:233px; float:left;  padding:10px 0 5px 0;"><div style="font-family:Arial, Helvetica, sans-serif; font-size:11px; font-weight:bold; color:#FFF; padding:0 10px 0 5px; float:left;">'+roomtypee+'</div><div style="font-family:Arial, Helvetica, sans-serif; font-size:11px; font-weight:bold; color:#FFF; padding:0 10px 0 5px; float:left;">USD '+total+'</div><div style="font-family:Arial, Helvetica, sans-serif; font-size:10px; font-weight:bold; color:#FFF; padding:0 0px 0 0px; font-style:italic; float:right;">Only 4 rooms left</div></div>
								
								
				var html = '<div style="width:auto; float:left;"><div style="width:246px; float:left; background-image:url(images/map_pop_repeat.png); background-repeat:repeat-y;"><div style="width:246px; float:left; height:26px;"><div style="float:left; height:26px; padding:0px 10px 0 5px; font-size:11px; font-family:Arial, Helvetica, sans-serif; font-weight:bold; color:#039; line-height:25px;">'+index+'</div><div style="width:64px; float:right; height:12px; margin:5px 12px 0 0;">'+starval+'</div><div style="clear:both;"></div></div><div style="clear:both;"></div><div style="width:264px; background-color:#3099da; margin:0 0 0 2px;"><div style="width:63px; float:left; height:75px;margin:5px 0 0 5px;"><img src="'+picc+'" width="70" height="70" /></div><div style="width:153px; float:right; margin:5px 3px 0 0px; font-size:11px; color:#FFF; font-family:Arial, Helvetica, sans-serif; padding:0 3px 0 9px; text-align:justify;">'+desc+'</div><br>Price Starts From '+total+' USD<div style="font-family:Arial, Helvetica, sans-serif; font-size:10px; font-weight:bold; color:#FFF; padding:0 0px 0 0px; font-style:italic; float:right;">Only 4 rooms left</div><div style="clear:both;"></div></div></div><div style="width:246px; height:10px; float:left; background-image:url(images/map_pop_bottom.png); background-repeat:no-repeat;"></div></div>';
	

	 GEvent.addListener(marker, "mouseover", function() {
					marker.setDetailWinHTML(html);
				  });
	
	//marker.setHoverImage("http://provabextranet.com/WDM/555_online/images/hotel_search_icon small.png");
	
			
				  return marker;
				
		
				
				}
		
				
</script>
<link type="text/css" href="<?php echo WEB_DIR; ?>gui/slider/styles/jquery-ui-1.8.20.custom.css" rel="stylesheet" />
		<script type="text/javascript" src="<?php echo WEB_DIR; ?>gui/slider/scripts/jquery-1.7.2.min.js"></script>
		<script type="text/javascript" src="<?php echo WEB_DIR; ?>gui/slider/scripts/jquery-ui-1.8.20.custom.min.js"></script>

		<style type="text/css">
			/*demo page css*/
			body{ }
			.demoHeaders { margin-top: 2em; }
			#dialog_link {padding: .4em 1em .4em 20px;text-decoration: none;position: relative;}
			#dialog_link span.ui-icon {margin: 0 5px 0 0;position: absolute;left: .2em;top: 50%;margin-top: -8px;}
			ul#icons {margin: 0; padding: 0;}
			ul#icons li {margin: 2px; position: relative; padding: 4px 0; cursor: pointer; float: left;  list-style: none;}
			ul#icons span.ui-icon {float: left; margin: 0 4px;}
		</style>
        <style>
        	/*Link*/
a.button{
text-decoration:none;
outline:none;
font-weight:bold;
font-size:12px;


color : #000;
}

/*Visited*/
a.button:visited {
color : #000;

margin-bottom:20px;
outline:none;
text-decoration:none;}

/*Hover*/
a.button:hover {

text-decoration:none;
outline:none;}

/*Focus*/
a.button:active:focus{

text-decoration:none;
outline:none;}
/*Set the background styles for the content*/
.content_for_map{
width:714px; background-color:#F00;
float:left; }

</style>
<script type="text/javascript">
$(document).ready(function(){
 
//Hide the box       
  $("#map").hide();

//Sets up the click function and speed 
  $("#btn-slide").click(function(){
  $("#map").slideToggle("fast",function(){

//Toggles link text between open and close 
//=="Open" is vital in order to close the box
($("#btn-slide").html()=="Show Map")?$("#btn-slide").html("Hide Map"):$("#btn-slide").html("Show Map");
  });
  return false;
});
 
});
</script>

    <script language="javascript">

<!-- Calling Multiple Api Function -->
	
$(document).ready(function () {
	
	$( "#slider-range" ).slider({
					range: true,
					min: 0,
					max: 0,
					values: [ 0, 0 ],
					slide: function( event, ui ) {
						$( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
					}
				});
				$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
					" - $" + $( "#slider-range" ).slider( "values", 1 ) );
					
			$( "#slider-range-star" ).slider({
					range: true,
					min: 0,
					max: 5,
					values: [ 0, 5 ],
					slide: function( event, ui ) {
						$( "#star" ).val( ui.values[ 0 ] + " - " + ui.values[ 1 ] );
					}
				});
				$( "#star" ).val( $( "#slider-range-star" ).slider( "values", 0 ) +
					" - " + $( "#slider-range-star" ).slider( "values", 1 ) );
					
	//var a = ['hotelsbed_pre','gta','hotelsbed'];
	var a = ['gta'];
	  var i = 0;
	  $('#loading').fadeIn();
	 
	  function nextCall() {
		if(i == a.length) {
			$('#loading').fadeOut();
			$('#loading_result').fadeIn();
			return; 
		}
		
		$.ajax({
		  url:'<?php echo WEB_URL; ?>b2b/call_api/'+a[i],
		  //url:'<?php echo WEB_URL; ?>hotel/ajaxcall',
		  data: '',
		  dataType: "json",
		  beforeSend:function(){
			// this is where we append a loading image
			$('#loading').html('<div  style=" padding-top:22px;"  class="loading" ><img width="253" height="31" src="<?php echo WEB_DIR; ?>gui/images/loading_bar_animated.gif" alt="Loading..." /><br><div class="bottom-header" style="padding-left:105px">Loading</div></div>');
		  },
		  success: function(data){
			  i++;
			  nextCall();      
			$('#result').html(data.hotel_search_result);
			
			//$(".pagination").html(data.paging);
			$("#result_count").html(data.total_result);
			//alert(data.total_result);
			
			//alert(data.min_val);
			//alert(data.max_val);
			$("#priceStarts").html(data.min_val);
				
			var minVal = data.min_val;
			var maxVal = data.max_val;
			
			$( "#slider-range" ).slider({
					range: true,
					min: minVal,
					max: maxVal,
					values: [ minVal, maxVal ],
					slide: function( event, ui ) {
						$( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
					},
					  change: function( event, ui ) {
					  if (event.originalEvent) {
					  	filterPriceStar();
                        loadData(1);  // For first time page load default results
                       
					  }
					}
				});
				$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
					" - $" + $( "#slider-range" ).slider( "values", 1 ) );
					
			$( "#slider-range-star" ).slider({
					range: true,
					min: 0,
					max: 5,
					values: [ 0, 5 ],
					slide: function( event, ui ) {
						$( "#star" ).val( ui.values[ 0 ] + " - " + ui.values[ 1 ] );
					},
					  change: function( event, ui ) {
					  if (event.originalEvent) {
					  	filterPriceStar();
						loadData(1);
						
					  }
					}
				});
				$( "#star" ).val( $( "#slider-range-star" ).slider( "values", 0 ) +
					" - " + $( "#slider-range-star" ).slider( "values", 1 ) );
		//	$('#price').slider('refresh');
			
			//<input type="text" id="price" class="range-txt" />
			//<div id="price-range-sel" class="globalslider"></div>
	
			//$('#result_result').fadeOut();
			// Paging 
			loadData(1);
			//$("#roomfac").load("<?php print WEB_URL ?>hotel/room_fac");
			$("#hotelfac").load("<?php print WEB_URL ?>hotel/hotel_fac");
		  },
		  error:function(request, status, error){
			// failed request; give feedback to user
			$('#result').html('<p class="error"><strong>Oops!</strong> Try that again in a few moments.</p>');
		  }
		  
		});
		
	  }
	  
	  nextCall();

	function loading_show(){
                            $('#loadssing').html("<img src='images/loading.gif'/>").fadeIn('fast');
                        }
                        function loading_hide(){
                            $('#loassding').fadeOut('fast');
                        }
                                     
                        function loadData(page){
                            
                            loading_show();  
							/*var minVal = $( "#slider-range" ).slider( "values", 0 );
							var maxVal = $( "#slider-range" ).slider( "values", 1 );
							var minStar = $( "#slider-range-star" ).slider( "values", 0 );
							var maxStar = $( "#slider-range-star" ).slider( "values", 1 );
							var params = 'minVal='+minVal+'&maxVal='+maxVal+'&minStar='+minStar+'&maxStar='+maxStar+'&page='+page;*/
						var params = 'page='+page;
							//alert(params);
                          $.ajax
                            ({
                                type: "POST",
                                url: "<?php echo WEB_URL.'hotel/pagination_call'; ?>",
                                 data: params,
                                 success: function(msg)
                                {
                                    $(".pagination").ajaxComplete(function(event, request, settings)
                                    {
                                        loading_hide();
                                        $(".pagination").html(msg);
                                            
                                    });
                                    
                                }
                            
                            });
                            
        
                        }
                        
                       // loadData(1);  // For first time page load default results
                        $('.pagination li.active').live('click',function(){
                            var page = $(this).attr('p');
                            loadData(page);
                            

                        });           
                        /*$('#go_btn').live('click',function(){
                            var page = parseInt($('.goto').val());
                            var no_of_pages = parseInt($('.total').attr('a'));
                            if(page != 0 && page <= no_of_pages){
                                loadData(page);
                            }else{
                                alert('Enter a PAGE between 1 and '+no_of_pages);
                                $('.goto').val("").focus();
                                return false;
                            }
                            
                        });*/
	// Filter
	function filterPriceStar() {
			var minVal = $( "#slider-range" ).slider( "values", 0 );
			var maxVal = $( "#slider-range" ).slider( "values", 1 );
			//alert(minVal + "," + maxVal);
			var minStar = $( "#slider-range-star" ).slider( "values", 0 );
   			var maxStar = $( "#slider-range-star" ).slider( "values", 1 );
			
			var params = 'minVal='+minVal+'&maxVal='+maxVal+'&minStar='+minStar+'&maxStar='+maxStar;
			
			$.ajax({
				  url:'<?php echo WEB_URL; ?>hotel/fetch_search_result_filter/',
				  data: params,
				  dataType: "json",
				  beforeSend:function(){
					$('#loading').html('<div  style=" padding-top:22px;"  class="loading" ><img width="253" height="31" src="<?php echo WEB_DIR; ?>gui/slider/images/loading_bar_animated.gif" alt="Loading..." /><br><div class="bottom-header" style="padding-left:105px">Loading</div></div>');
				  },
				  success: function(data){
					$('#result').html(data.hotel_search_result);
					//$("#priceStarts").html(data.low_val);
					$("#result_count").html(data.total_result);
					//alert(data.min_val);
					 
				  },
				  error:function(request, status, error){
					// failed request; give feedback to user
					$('#result').html('<p class="error"><strong>Oops!</strong> Try that again in a few moments.</p>');
				  }
				  
				});
	} // function filterPriceStar() 


		
				
	 return false;
		
   });
    
	
	function hotel_fac_sorting()
		{
		
		//	var val =document.leftfilter.room_fac_val.value;
		//	alert(document.leftfilter.room_fac_val.length);
		
		var total='';
		for(var i=0; i < document.leftfilter.hotel_fac_val.length; i++){
			//alert(document.leftfilter.room_fac_val[i].checked);
		if(document.leftfilter.hotel_fac_val[i].checked)
		total +=document.leftfilter.hotel_fac_val[i].value + ","
		}
		
		var finval = encodeURIComponent(total); 
		//var finval = total; 
			  // Put an animated GIF image insight of content
		 $("#result").empty().html('<div style="background-color:#FFF" align="middle"><img src=\'<?php print WEB_DIR ?>gui/images/loading.gif\'></div>');
								
		//loadData(1); 
		  // Make AJAX call
		  $("#result").load("<?php print WEB_URL ?>hotel/hotel_fac_sorting/"+finval);
		
		//$("#result_count").empty().html('<img src="<?php echo WEB_DIR ?>gui/images/ajax-loader.gif" width="16" height="16" />');
		$("#result_count").load("<?php print WEB_URL ?>hotel/room_fac_sorting_count/"+finval);
	//	$("#result_count").html(11);
		
		 
		 // For first time page load default results
			//var params = 'finval='+finval;
		function loading_show(){
                            $('#loadssing').html("<img src='images/loading.gif'/>").fadeIn('fast');
                        }
                        function loading_hide(){
                            $('#loassding').fadeOut('fast');
                        }
                                     
                        function loadData(page){
                            
                            loading_show();  
							/*var minVal = $( "#slider-range" ).slider( "values", 0 );
							var maxVal = $( "#slider-range" ).slider( "values", 1 );
							var minStar = $( "#slider-range-star" ).slider( "values", 0 );
							var maxStar = $( "#slider-range-star" ).slider( "values", 1 );
							var params = 'minVal='+minVal+'&maxVal='+maxVal+'&minStar='+minStar+'&maxStar='+maxStar+'&page='+page;*/
						var params = 'val='+finval+'&page='+page;
							//alert(params);
                          $.ajax
                            ({
                                type: "POST",
                                url: "<?php echo WEB_URL.'hotel/pagination_call_room_fac'; ?>",
                                 data: params,
                                 success: function(msg)
                                {
                                    $(".pagination").ajaxComplete(function(event, request, settings)
                                    {
                                        loading_hide();
                                        $(".pagination").html(msg);
                                            
                                    });
                                    
                                }
                            
                            });
                            
        
                        }
                         loadData(1);  
                      // For first time page load default results
                        $('.pagination li.active').live('click',function(){
                            var page = $(this).attr('p');
                            loadData(page);
                            

                        });       
		 
		}
		
		
      
   
</script>
  <script type="text/javascript" src="<?php echo WEB_DIR ?>gui/ajax/ajaxsbmt.js"></script>
          <script type="text/javascript">
		  
		  /*$(document).ready(function () {
		  	 	var minVal = $( "#slider-range" ).slider( "values", 0 );
				var maxVal = $( "#slider-range" ).slider( "values", 1 );
			
				var minStar = $( "#slider-range-star" ).slider( "values", 0 );
   				var maxStar = $( "#slider-range-star" ).slider( "values", 1 );
			
				var params = 'minVal='+minVal+'&maxVal='+maxVal+'&minStar='+minStar+'&maxStar='+maxStar;
				alert(params);
		  });*/
			
                function rrr1(id)
                {
					
         $('#result').html("<div style='background-color:#FFF' align='middle'><img src='<?php echo WEB_DIR ?>gui/images/loading.gif'/></diV>").fadeIn('fast');
      if (window.XMLHttpRequest)
          {// code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp=new XMLHttpRequest();
          }
        else
          {// code for IE6, IE5
          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
          }
        xmlhttp.onreadystatechange=function()
          {
          if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
				
			    document.getElementById("result").innerHTML=xmlhttp.responseText;
            }
          }
		  
            
        xmlhttp.open("POST","<?php print WEB_URL ?>hotel/all_filter_new1/"+id,true);
        xmlhttp.send();
        
        
       
             
                }
				
				    function rrr2(id,value)
                {
					
         $('#result').html("<div style='background-color:#FFF' align='middle'><img src='<?php echo WEB_DIR ?>gui/images/loading.gif'/></diV>").fadeIn('fast');
      if (window.XMLHttpRequest)
          {// code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp=new XMLHttpRequest();
          }
        else
          {// code for IE6, IE5
          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
          }
        xmlhttp.onreadystatechange=function()
          {
          if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
				
			    document.getElementById("result").innerHTML=xmlhttp.responseText;
            }
          }
		  
            
        xmlhttp.open("POST","<?php print WEB_URL ?>hotel/all_filter_new1_facility/"+id+"/"+value,true);
        xmlhttp.send();
        
        
       
             
                }
                
               
                </script>
             <style type="text/css">
                  
                    .pagination ul li.inactive,
                    .pagination ul li.inactive:hover{
                        background-color:#ededed;
                        color:#bababa;
                        border:1px solid #bababa;
                        cursor: default;
                    }
                     .data ul li{
                        list-style: none;
                        font-family: verdana;
                        margin: 5px 0 5px 0;
                        color: #000;
                        font-size: 15px;
                    }
        
                    .pagination{
                        width: 800px;
                        height: 25px;
                    }
                    .pagination ul li{
                       
            color: #006699;
            float: left;
            font-family: arial;
            font-size: 9px;
            font-weight: bold;
            list-style: none outside none;
            
            padding: 4px;
                    }
                    .pagination ul li:hover{
                        color: #fff;
                        background-color: #006699;
                        cursor: pointer;
                    }
                    .go_button
                    {
                    background-color:#f2f2f2;border:1px solid #006699;color:#cc0000;padding:2px 6px 2px 6px;cursor:pointer;position:absolute;margin-top:-1px;
                    }
                    .total
                    {
                    float:right;font-family:arial;color:#999;
                    }
        
                </style>
</head>

<body> 
		<div id="main_continer">
   		  <div class="header">
                 	<?php echo $this->load->view('header'); ?>
                    <div class="inner_banner"><img src="<?php echo WEB_DIR ?>images/inner_banner.jpg" width="979" height="230" /></div>
                    <div class="content_cover">
                    <form  name="leftfilter"  id="hotels-results-form">
                    		<div class="left_pannel">
                            		<div class="left_pannel_head">
                                    <div class="left_pannel_head_inner">
                                    		<h1><b>Hotels starting at</b></h1>
                                            <h2><div id="priceStarts"></div></h2>
                                            <p>total per night</p>
                                            </div>
                                            <div class="gif_animation">
                                            <img src="<?php echo WEB_DIR ?>images/loading_new.gif" width="40" height="25" />
                                            </div>
                                    </div>
                                    <div class="left_pannel_body">
                                    		<div class="wi159">Reset Filters</div>
                                            <div class="wi159"><b>Filter your results</b>
                                          <div class="arrow">
                                            	<div class="arrow_down"></div>
                                                <div class="wi120">By Price (Per Night)</div>
                                            	</div>
                                              <!-- <div class="price_rate"><span class="pw7">Price</span>: 150 € - 500 €</div>
                                                <div class="jq_bg"><img src="<?php //echo WEB_DIR ?>images/jquery_img.jpg" width="140" height="17" /></div> -->
                                                <p>
   <input type="text" id="amount" style="border:0; color:#f6931f; font-weight:bold;" /></p>
  
  											<div id="slider-range"></div>
                                                
                                                
                                      </div>
                                      <div class="wi159">
                                          <div class="arrow">
                                            	<div class="arrow_down"></div>
                                                <div class="wi120">By Star Rating</div>
                                            	</div>
                                             <!-- <div class="price_rate"><span class="pw7">Star Rating:</span>: 150 € - 500 €</div>
                                                <div class="jq_bg"><img src="<?php echo WEB_DIR ?>images/jquery_img.jpg" width="140" height="17" /></div>-->
                                                <p>
   <input type="text" id="star" style="border:0; color:#f6931f; font-weight:bold;" /></p>
  
  											<div id="slider-range-star"></div>
                                            
                                      </div>
                                     <!-- <div class="wi159">
                                          <div class="arrow">
                                            	<div class="arrow_down"></div>
                                                <div class="wi120">By Review Rating</div>
                                            	</div>
                                              <div class="price_rate"><span class="pw7">Review Rating: </span>: 150 € - 500 €</div>
                                                <div class="jq_bg"><img src="<?php //echo WEB_DIR ?>images/jquery_img.jpg" width="140" height="17" /></div>
                                      </div>
                                      <div class="wi159">
                                          <div class="arrow">
                                            	<div class="arrow_down"></div>
                                                <div class="wi120">By Review Rating</div>
                                            	</div>
                                              <div class="price_rate"><span class="pw7">Price</span>: 150 € - 500 €</div>
                                                <div class="jq_bg"><img src="<?php //echo WEB_DIR ?>images/jquery_img.jpg" width="140" height="17" /></div>
                                      </div>-->
                                      
                                      <!--<div class="wi159">
                                          <div class="arrow">
                                            	<div class="arrow_down"></div>
                                                <div class="wi120">By Room Facility</div>
                                            	</div>
                                             
                                       	<div id="roomfac" >
        </div>-->
                                        <div class="wi159">
                                          <div class="arrow">
                                            	<div class="arrow_down"></div>
                                                <div class="wi120">By Facility</div>
                                            	</div>
                                       <div class="hotel_cover">
                                         	<div class="check_box_cover"><input type="checkbox" name="hotel_fac_val" onclick="javascript:hotel_fac_sorting()"  value="wifi" id="1" /></div>
                                            <div class="hotel_cover47">Wi-Fi</div><div class="wi56"></div>
                                         </div>
                                         <div class="hotel_cover">
                                         	<div class="check_box_cover"><input type="checkbox" name="hotel_fac_val" onclick="javascript:hotel_fac_sorting()"  value="park" id="2" /></div>
                                            <div class="hotel_cover47">Parking</div><div class="wi56"></div>
                                         </div>
                                          <div class="hotel_cover">
                                         	<div class="check_box_cover"><input type="checkbox" name="hotel_fac_val" onclick="javascript:hotel_fac_sorting()"  value="bar" id="3" /></div>
                                            <div class="hotel_cover47">Bar </div><div class="wi56"></div>
                                         </div>
                                          <div class="hotel_cover">
                                         	<div class="check_box_cover"><input type="checkbox" name="hotel_fac_val" onclick="javascript:hotel_fac_sorting()"  value="internet" id="4" /></div>
                                            <div class="hotel_cover47">Internet Services</div><div class="wi56"></div>
                                         </div>
                                          <div class="hotel_cover">
                                         	<div class="check_box_cover"><input type="checkbox" name="hotel_fac_val" onclick="javascript:hotel_fac_sorting()"  value="fitness,gym" id="5" /></div>
                                            <div class="hotel_cover47">Fitness Centre</div><div class="wi56"></div>
                                         </div>
                                          
                                          <div class="hotel_cover">
                                         	<div class="check_box_cover"><input type="checkbox" name="hotel_fac_val" onclick="javascript:hotel_fac_sorting()"  value="pool" id="6" /></div>
                                            <div class="hotel_cover47">Indoor Swimming Pool </div><div class="wi56"></div>
                                         </div>
                                          
                                          <div class="hotel_cover">
                                         	<div class="check_box_cover"><input type="checkbox" name="hotel_fac_val" onclick="javascript:hotel_fac_sorting()"  value="petsallowed" id="7" /></div>
                                            <div class="hotel_cover47">Pets Allowed</div><div class="wi56"></div>
                                         </div>
                                          <div class="hotel_cover">
                                         	<div class="check_box_cover"><input type="checkbox" name="hotel_fac_val" onclick="javascript:hotel_fac_sorting()"  value="restaurant" id="8" /></div>
                                            <div class="hotel_cover47">Restaurant</div><div class="wi56"></div>
                                         </div>
                                         
                                                
                                      </div>        
                                      </div> 
                                      
                                      <!--<div class="wi159">
                                          <div class="arrow">
                                            	<div class="arrow_down"></div>
                                                <div class="wi120">By Hotel Theme</div>
                                            	</div>
                                             
                                        
                                                
                                      </div>
                                         
                                    </div>-->
                                    </form>
                                    <form name="search_result" action="<?php echo WEB_URL; ?>hotel/search" method="post">
                                    <div class="change_search_pannel">
                                    	<div class="change_pannel_header">Change your Search</div>
                                        <div class="left_pannel_body">
                                        		<div class="modifi_search">
                                                <p>Destination / Hotel Name: </p>
                                                  <script type="text/javascript" src="<?php print WEB_DIR; ?>autofill/js/bsn.AutoSuggest_c_2.0.js"></script>
          <link rel="stylesheet" href="<?php print WEB_DIR; ?>autofill/css/autosuggest_inquisitor.css" type="text/css" media="screen" charset="utf-8" />
                                                  <p> <input type="hidden" id="testid" value="" style="font-size: 10px; width: 20px;" disabled="disabled" />
              <input type="text" name="cityval" value="<?php echo $_SESSION['city']; ?>" id="testinput" class="modi_text" />
              <script type="text/javascript">
	var options = {
		script:"<?php print WEB_DIR; ?>test_hotel.php?json=true&",varname:"input",json:true,callback: function (obj) { document.getElementById('testid').value = obj.id; } };
	var as_json = new AutoSuggest('testinput', options);

</script></p>
                                                </div>
                           	  <!--<div class="modifi_search">
                                                <div class="check_box_cover_two"><input name="" type="checkbox" value="" /></div>Destination / Hotel Name:
                                                 
                                          </div>-->
                                          <div class="modifi_search">
                                                <p>Check-in Date:  </p>
                                                  <p>
                                                     <link rel="stylesheet" href="<?php echo WEB_DIR; ?>datepickernew/themes/base/jquery.ui.all.css">
            
                <script src="<?php echo WEB_DIR; ?>datepickernew/ui/jquery.ui.core.js"></script> 
                <script src="<?php echo WEB_DIR; ?>datepickernew/ui/jquery.ui.widget.js"></script> 
                <script src="<?php echo WEB_DIR; ?>datepickernew/ui/jquery.ui.datepicker.js"></script>
                <link rel="stylesheet" href="<?php echo WEB_DIR; ?>datepickernew/demos.css">
                <script>
	 function zeroPad(num,count)
{
	var numZeropad = num + '';
	while(numZeropad.length < count) {
	numZeropad = "0" + numZeropad;
	}
	return numZeropad;
}
 function dateADD(currentDate)
{
 var valueofcurrentDate=currentDate.valueOf()+(24*60*60*1000);
 var newDate =new Date(valueofcurrentDate);
 return newDate;
}

	$(function() {
		$( "#datepicker" ).datepicker({
			numberOfMonths: 3,
			dateFormat: 'dd-mm-yy',
			
			minDate: 0
		  
		});
		 $('#datepicker').change(function(){
		   //$t=$(this).val();
		  // alert($t);
		   var selectedDate = $(this).datepicker('getDate');
		   var nextdayDate  = dateADD(selectedDate);
		   var nextDateStr = zeroPad(nextdayDate.getDate(),2)+"-"+zeroPad((nextdayDate.getMonth()+1),2)+"-"+(nextdayDate.getFullYear());

		   $t = nextDateStr;
					$( "#datepicker1" ).datepicker({


						numberOfMonths: 3,
						minDate: $t,
						
						dateFormat : 'dd-mm-yy'
					});
		   $( "#datepicker1" ).val($t);
		  });
		  
		$( "#anim" ).change(function() {
			$( "#datepicker" ).datepicker( "option", "showAnim", $( this ).val() );
		});
	});
	function hide_child1(adult)
{


if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
   		 document.getElementById("inputfiled1_1").innerHTML=xmlhttp.responseText;
    }
  }
  	if(adult==1)
	{
		 document.getElementById('inputfiled1_1').style.display='block'; 
		  document.getElementById('child_header').style.display='block'; 
		    document.getElementById('age1').style.display='none'; 
			  document.getElementById('age12').style.display='none'; 
			    document.getElementById('age13').style.display='none'; 
		xmlhttp.open("GET","<?php print WEB_URL ?>hotel/child_dd_single/",true);
		xmlhttp.send();
	}
	else if(adult==2)
	{
		 document.getElementById('inputfiled1_1').style.display='block'; 
		  document.getElementById('child_header').style.display='block'; 
		  document.getElementById('age1').style.display='none'; 
			  document.getElementById('age12').style.display='none'; 
			    document.getElementById('age13').style.display='none'; 
		xmlhttp.open("GET","<?php print WEB_URL ?>hotel/child_dd_double/",true);
		xmlhttp.send();
	}
	else if(adult==3)
	{
		 document.getElementById('inputfiled1_1').style.display='block'; 
		  document.getElementById('child_header').style.display='block';
		  document.getElementById('age1').style.display='none'; 
			  document.getElementById('age12').style.display='none'; 
			    document.getElementById('age13').style.display='none';  
		xmlhttp.open("GET","<?php print WEB_URL ?>hotel/child_dd_triple/",true);
		xmlhttp.send();
	}
	else
	{
		 document.getElementById('inputfiled1_1').style.display='none'; 
		  document.getElementById('child_header').style.display='none'; 
		  document.getElementById('age1').style.display='none'; 
			  document.getElementById('age12').style.display='none'; 
			    document.getElementById('age13').style.display='none'; 
		
	}



}
function hide_child2(adult)
{


if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
   		 document.getElementById("inputfiled1_2").innerHTML=xmlhttp.responseText;
    }
  }
  	if(adult==1)
	{
		 document.getElementById('inputfiled1_2').style.display='block'; 
		  document.getElementById('child_header2').style.display='block'; 
		  document.getElementById('age2').style.display='none'; 
			  document.getElementById('age22').style.display='none'; 
			    document.getElementById('age23').style.display='none'; 
		xmlhttp.open("GET","<?php print WEB_URL ?>hotel/child_dd_single/",true);
		xmlhttp.send();
	}
	else if(adult==2)
	{
		 document.getElementById('inputfiled1_2').style.display='block'; 
		  document.getElementById('child_header2').style.display='block'; 
		   document.getElementById('age2').style.display='none'; 
			  document.getElementById('age22').style.display='none'; 
			    document.getElementById('age23').style.display='none'; 
		xmlhttp.open("GET","<?php print WEB_URL ?>hotel/child_dd_double/",true);
		xmlhttp.send();
	}
	else if(adult==3)
	{
		 document.getElementById('inputfiled1_2').style.display='block'; 
		  document.getElementById('child_header2').style.display='block'; 
		   document.getElementById('age2').style.display='none'; 
			  document.getElementById('age22').style.display='none'; 
			    document.getElementById('age23').style.display='none'; 
		xmlhttp.open("GET","<?php print WEB_URL ?>hotel/child_dd_triple/",true);
		xmlhttp.send();
	}
	else
	{
		 document.getElementById('inputfiled1_2').style.display='none'; 
		  document.getElementById('child_header2').style.display='none'; 
		   document.getElementById('age2').style.display='none'; 
			  document.getElementById('age22').style.display='none'; 
			    document.getElementById('age23').style.display='none'; 
		
	}



}
function hide_child3(adult)
{


if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
   		 document.getElementById("inputfiled1_3").innerHTML=xmlhttp.responseText;
    }
  }
  	if(adult==1)
	{
		 document.getElementById('inputfiled1_3').style.display='block'; 
		  document.getElementById('child_header3').style.display='block'; 
		   document.getElementById('age3').style.display='none'; 
			  document.getElementById('age32').style.display='none'; 
			    document.getElementById('age33').style.display='none'; 
		xmlhttp.open("GET","<?php print WEB_URL ?>hotel/child_dd_single/",true);
		xmlhttp.send();
	}
	else if(adult==2)
	{
		 document.getElementById('inputfiled1_3').style.display='block'; 
		  document.getElementById('child_header3').style.display='block';
		  	   document.getElementById('age3').style.display='none'; 
			  document.getElementById('age32').style.display='none'; 
			    document.getElementById('age33').style.display='none';  
		xmlhttp.open("GET","<?php print WEB_URL ?>hotel/child_dd_double/",true);
		xmlhttp.send();
	}
	else if(adult==3)
	{
		 document.getElementById('inputfiled1_3').style.display='block'; 
		  document.getElementById('child_header3').style.display='block'; 
		  	   document.getElementById('age3').style.display='none'; 
			  document.getElementById('age32').style.display='none'; 
			    document.getElementById('age33').style.display='none'; 
		xmlhttp.open("GET","<?php print WEB_URL ?>hotel/child_dd_triple/",true);
		xmlhttp.send();
	}
	else
	{
		 document.getElementById('inputfiled1_3').style.display='none'; 
		  document.getElementById('child_header3').style.display='none'; 
		  	   document.getElementById('age3').style.display='none'; 
			  document.getElementById('age32').style.display='none'; 
			    document.getElementById('age33').style.display='none'; 
		
	}



}
	</script>
                <?php
$current_dte = $_SESSION['sd'];
$next_dte = $_SESSION['ed'];
		
			?>
                                                  <input  value="<?php echo $current_dte; ?>" name="sd" id="datepicker" type="text" class="check_bg_2" /></p>
                                          </div>
                                                
                                                
                                              <div class="modifi_search">
                                                <p>Check-out Date:   </p>
                                                  <p><input   value="<?php echo $next_dte; ?>" name="ed" id="datepicker1" type="text" class="check_bg_2" /></p>
                                          </div>
                                          
                                          <div class="room_bor_bottom">
                                                <div class="modifi_search">
                                             <div class="wi102_0">
                                             		<p>Room</p>
                                                    <p>  <script type="text/javascript">
function display_adult_count(value)
{
	
if(value==1)
    {
       document.getElementById('room1').style.display='block'; 
       document.getElementById('room2').style.display='none'; 
       document.getElementById('room3').style.display='none'; 
    }
    if(value==2)
        {
		
        document.getElementById('room1').style.display='block'; 
       document.getElementById('room2').style.display='block'; 
       document.getElementById('room3').style.display='none';     
        }
        if(value==3)
            {
       document.getElementById('room1').style.display='block'; 
       document.getElementById('room2').style.display='block'; 
       document.getElementById('room3').style.display='block';     
                
            }
}

function display_child_count(value)
{

		if(value==1)
		{
		   document.getElementById('age1').style.display='block'; 
		   document.getElementById('age12').style.display='none'; 
		   document.getElementById('age13').style.display='none'; 
		   
		}
  		 if(value==2)
        {
		
       document.getElementById('age1').style.display='block'; 
       document.getElementById('age12').style.display='block'; 
	   document.getElementById('age13').style.display='none';   
        }
		 if(value==3)
        {
		
       document.getElementById('age1').style.display='block'; 
       document.getElementById('age12').style.display='block';  
	   document.getElementById('age13').style.display='block';  
        }
		 if(value==0)
        {
		
       document.getElementById('age1').style.display='none'; 
       document.getElementById('age12').style.display='none'; 
	   document.getElementById('age13').style.display='none';    
        }
      
}
function display_child_count1(value)
{

		if(value==1)
		{
		   document.getElementById('age2').style.display='block'; 
		   document.getElementById('age22').style.display='none'; 
		   document.getElementById('age23').style.display='none'; 
		   
		}
  		 if(value==2)
        {
		
       document.getElementById('age2').style.display='block'; 
       document.getElementById('age22').style.display='block'; 
	   document.getElementById('age23').style.display='none';   
        }
		 if(value==3)
        {
		
       document.getElementById('age2').style.display='block'; 
       document.getElementById('age22').style.display='block';  
	   document.getElementById('age23').style.display='block';  
        }
		 if(value==0)
        {
		
       document.getElementById('age2').style.display='none'; 
       document.getElementById('age22').style.display='none'; 
	   document.getElementById('age23').style.display='none';    
        }
      
}
function display_child_count2(value)
{

		if(value==1)
		{
		   document.getElementById('age3').style.display='block'; 
		   document.getElementById('age32').style.display='none'; 
		   document.getElementById('age33').style.display='none'; 
		   
		}
  		 if(value==2)
        {
		
       document.getElementById('age3').style.display='block'; 
       document.getElementById('age32').style.display='block'; 
	   document.getElementById('age33').style.display='none';   
        }
		 if(value==3)
        {
		
       document.getElementById('age3').style.display='block'; 
       document.getElementById('age32').style.display='block';  
	   document.getElementById('age33').style.display='block';  
        }
		 if(value==0)
        {
		
       document.getElementById('age3').style.display='none'; 
       document.getElementById('age32').style.display='none'; 
	   document.getElementById('age33').style.display='none';    
        }
      
}
 </script>
                <select name="room_count"   onChange="display_adult_count(this.value)" class="jum_menu_102" >
                  <option value="1">Room 1</option>
                  <option value="2">Room 2</option>
                  <option value="3">Room 3</option>
                </select></p>
                                             </div>
                                             <div class="check_139 " id="room1">
              <DIV class="check_139" >
                <!--<div class="rooms_left"></div>-->
                <div class="wi40"  style="height: auto;">
                  <p>ADULT</p>
                  <p>
                    <select name="adult[]" id="jumpMenu2" onchange="hide_child1(this.value)"  class="jumb_25_for_new_1 pl5">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                    </select>
                  </p>
                </div>
                <div class="wi40 padding_le ml10">
                  <p id="child_header">CHILDREN</p>
                  <p>
                    <select name="child[]" id="inputfiled1_1"  class="jumb_25_for_new_1"  onChange="display_child_count(this.value)">
                      <option value="0">0</option>
                      <option value="1">1</option>
                      <option value="2">2</option> <option value="3">3</option>
                    </select>
                  </p>
                </div>
              </DIV>
              
              <DIV class="check_149" id="age1" style="display:none;">
                <div class="AGE_OF2">AGE OF CHILD 1</div>
                <div class="wi40 padding_le">
                  <p></p>
                  <p>
                    <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1"  >
                      <option value="0">0</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                    </select>
                  </p>
                </div>
              </DIV>
              <DIV class="check_149"  id="age12"  style="display:none;">
                <div class="AGE_OF2">AGE OF CHILD 2</div>
                <div class="wi40 padding_le">
                  <p></p>
                  <p>
                    <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
                      <option value="0">0</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                    </select>
                  </p>
                </div>
              </DIV>
              <DIV class="check_149"  id="age13"  style="display:none;">
                <div class="AGE_OF2">AGE OF CHILD 3</div>
                <div class="wi40 padding_le">
                  <p></p>
                  <p>
                    <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
                      <option value="0">0</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                    </select>
                  </p>
                </div>
              </DIV>
            
              <!--<DIV class="check_139" style="display:none;">
                <div class="rooms_left"></div>
                <div class="wi40">
                  <p></p>
                  <p>
                    <select name="adult[]" id="jumpMenu2"  class="jumb_25_for_new pl5">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                    </select>
                  </p>
                </div>
                <div class="wi40 padding_le">
                  <p></p>
                  <p>
                    <select name="child[]" id="jumpMenu2"  class="jumb_25_for_new"  onChange="display_child_count(this.value)">
                      <option value="0">0</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                    </select>
                  </p>
                </div>
              </DIV>
              <DIV class="check_139" style="display:none;">
                <div class="rooms_left"></div>
                <div class="wi40">
                  <p></p>
                  <p>
                    <select name="adult[]" id="jumpMenu2" class="jumb_25_for_new pl5">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                    </select>
                  </p>
                </div>
                <div class="wi40 padding_le">
                  <p></p>
                  <p>
                    <select name="child[]" id="jumpMenu2"  class="jumb_25_for_new"  onChange="display_child_count(this.value)">
                      <option value="0">0</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                    </select>
                  </p>
                </div>
              </DIV>
              <DIV class="check_139" style="display:none;">
                <div class="rooms_left"></div>
                <div class="wi40">
                  <p></p>
                  <p>
                    <select name="adult[]" id="jumpMenu2"  class="jumb_25_for_new pl5">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                    </select>
                  </p>
                </div>
                <div class="wi40 padding_le">
                  <p></p>
                  <p>
                    <select name="child[]" id="jumpMenu2"  class="jumb_25_for_new"  onChange="display_child_count(this.value)">
                      <option value="0">0</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                    </select>
                  </p>
                </div>
              </DIV>-->
            </div>
                                        
                                        
                                                </div>
                                               
                                           <div class="check_139	 ml17" style="float:right; display:none; margin-right:4px" id="room2">
              <DIV class="check_139" >
                <!--<div class="rooms_left"></div>-->
                <div class="wi40"  style="height: auto;">
                  <p></p>
                  <p>
                    <select name="adult[]" id="jumpMenu2" onchange="hide_child2(this.value)"  class="jumb_25_for_new_1 pl5">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                    </select>
                  </p>
                </div>
                <div class="wi40 padding_le ml10">
                  <p id="child_header2"></p>
                  <p>
                    <select name="child[]" id="inputfiled1_2"  class="jumb_25_for_new_1"  onChange="display_child_count1(this.value)">
                      <option value="0">0</option>
                      <option value="1">1</option>
                      <option value="2">2</option> <option value="3">3</option>
                    </select>
                  </p>
                </div>
              </DIV>
               <DIV class="check_149" id="age2" style="display:none;">
                <div class="AGE_OF2">AGE OF CHILD 1</div>
                <div class="wi40 padding_le">
                  <p></p>
                  <p>
                    <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1"  >
                      <option value="0">0</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                    </select>
                  </p>
                </div>
              </DIV>
              <DIV class="check_149"  id="age22"  style="display:none;">
                <div class="AGE_OF2">AGE OF CHILD 2</div>
                <div class="wi40 padding_le">
                  <p></p>
                  <p>
                    <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
                      <option value="0">0</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                    </select>
                  </p>
                </div>
              </DIV>
              <DIV class="check_149"  id="age23"  style="display:none;">
                <div class="AGE_OF2">AGE OF CHILD 3</div>
                <div class="wi40 padding_le">
                  <p></p>
                  <p>
                    <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
                      <option value="0">0</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                    </select>
                  </p>
                </div>
              </DIV>
              
          </div>
                                           <div class="check_139	 ml17" style="float:right; display:none; margin-right:4px" id="room3">
              <DIV class="check_139" >
                <!--<div class="rooms_left"></div>-->
                <div class="wi40" style="height: auto;">
                  <p></p>
                  <p>
                    <select name="adult[]" id="jumpMenu2" onchange="hide_child3(this.value)"  class="jumb_25_for_new_1 pl5">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                    </select>
                  </p>
                </div>
                <div class="wi40 padding_le ml10">
                  <p id="child_header3"></p>
                  <p>
                    <select name="child[]" id="inputfiled1_3"  class="jumb_25_for_new_1"  onChange="display_child_count2(this.value)">
                      <option value="0">0</option>
                      <option value="1">1</option>
                      <option value="2">2</option> <option value="3">3</option>
                    </select>
                  </p>
                </div>
              </DIV>
               <DIV class="check_149" id="age3" style="display:none;">
                <div class="AGE_OF2">AGE OF CHILD 1</div>
                <div class="wi40 padding_le">
                  <p></p>
                  <p>
                    <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1"  >
                      <option value="0">0</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                    </select>
                  </p>
                </div>
              </DIV>
              <DIV class="check_149"  id="age32"  style="display:none;">
                <div class="AGE_OF2">AGE OF CHILD 2</div>
                <div class="wi40 padding_le">
                  <p></p>
                  <p>
                    <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
                      <option value="0">0</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                    </select>
                  </p>
                </div>
              </DIV>
              <DIV class="check_149"  id="age33"  style="display:none;">
                <div class="AGE_OF2">AGE OF CHILD 3</div>
                <div class="wi40 padding_le">
                  <p></p>
                  <p>
                    <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
                      <option value="0">0</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                    </select>
                  </p>
                </div>
              </DIV>
              
          </div>
        
                                        
                                        
                                               
                                                
                                            
                                                
                                                </div>
                                                <div class="wi138">
                                                 <input type="image" src="<?php echo WEB_DIR ?>images/search_btn.jpg" width="200" height="34" />
                                                
                                   </div>
                                                
                                      </div>
                                    </div>
                                    </form>
                            </div>
                            
                            <div class="right_pannel">
                            		<div class="wi714">
                                    		
<div style="float:left; margin:0 0 15px 0;"><a href="#" class="home_link">Home</a> | <a href="#" class="home_link"><?php echo$_SESSION['city']; ?></a></div> 
<div class="wi584"><div id="result_count" style='float:left;'></div>&nbsp;Hotels Available in <?php echo$_SESSION['city']; ?>  </div>                                         
                                            <div class="wi100">
                                            </div>
                                    </div>
                                    <div style="float:left; width:700px; "><div  style="float:right; margin:-15px 0 0 0;"><a class="button"  href="#" id="btn-slide" title="Open">Show Map</a></div>
                             <div style="float:left; width:714px;" id="map">
<div class="content_for_map">
Map
</div>
</div>      
                                    </div>
                                    <div class="search_result_section">
                                    <div class="wi714menu">
                                    		<div class="wi714menu01">Sort by</div><div class="wei507">
                                            <ul id="nav">
	<li>
		<a href="#">Recommented</a>
	</li>

	<li>
		<a href="#">Stars</a>
		<ul>
			<li><a href="#">star(5 to 1)</a></li>

			<li><a href="#">star(1 to 5)</a></li>
		</ul>
	</li>
	<li>
		<a href="#">Distance</a>

		<!--<ul>
			<li><a href="#">Sevice one</a></li>
			<li><a href="#">Sevice two</a></li>

			<li><a href="#">Sevice three</a></li>
			<li><a href="#">Sevice four</a></li>
		</ul>-->

	</li>
	<li>
		<a href="#">Price</a>
		<ul>
			<li><a href="#">Lorem ipsum</a></li>

			<li><a href="#">Lorem ipsum</a></li>
			<li><a href="#">Lorem ipsum</a></li>
			<li><a href="#">Lorem ipsum</a></li>

			
		</ul>
	</li>
	<!--<li>
		<a href="#">Contact</a>

		<ul>
			<li><a href="#">Out-of-hours</a></li>
			<li><a href="#">Directions</a></li>

		</ul>
	</li>-->
</ul><div class="pagination">
             <div class="data"></div>
				
			</div>
                                            </div>
                                            
                                    </div>
                                    <div class="contents" id="result" >
			<div style="padding-left:325px; padding-top:55px" >
			<img src="<?php echo WEB_DIR ?>gui/images/loading.gif" />
			</div>
		</div>
                                     
                            </div>
                            </div>
                    </div>
          
          
          <div class="border_dd"></div>
           <?php echo $this->load->view('footer'); ?>
        </div>
        </div>
</body>
</html>
