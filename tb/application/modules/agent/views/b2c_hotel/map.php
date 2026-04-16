<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="http://maps.google.com/maps?file=api&v=2&key=ABQIAAAApz8aTXS5eUyxvs5uMszdKRfgfgRgqqCDjpPIuqwLUuHujN8I3D2s4RShDFoZ233PbhiKTfM2Mr6LzhnYEA" type="text/javascript"></script>
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
 // onload = mapLoad;						
             //   onunload = GUnload;
    			var geocoder;
                function mapLoad() {
					
					var map = new GMap2(document.getElementById("map"),{size:new GSize(700,350)});
					var searchUrl = '<?php echo WEB_URL;  ?>hotel/ajax_map_show';
				GDownloadUrl(searchUrl, function(data)
					{
						
						var xml = GXml.parse(data);
						var markers = xml.documentElement.getElementsByTagName('marker');
						alert(markers);
						if(markers.length>50)
						{
							var mar =50;
						}
						else
						{
							var mar = markers.length;
						}
						for (var i = 0; i < 50; i++)
						{
							 var name = markers[i].getAttribute('name');
							  var desc = markers[i].getAttribute('desc');
							  var starr = markers[i].getAttribute('star');
							   var roomtypee = markers[i].getAttribute('roomtype');
							     var total = markers[i].getAttribute('totalcost');
								     var picc = markers[i].getAttribute('pic');
							  var point = new GLatLng(parseFloat(markers[i].getAttribute('lat')), 
											 parseFloat(markers[i].getAttribute('lng')));	
						
							// var marker = new GMarker(point);
							//map.addOverlay(createMarker(point, i));
							/*map.addControl(new GSmallMapControl());
                        	map.addControl(new GMapTypeControl());*/
							
							//var g = parseInt(markers.length - 1);
							var g = 0;
             var marker = createMarker(point, name,i,g, desc, starr,roomtypee, total, picc);
	                       	map.addOverlay(marker);
						}map.setUIToDefault();
							 map.setCenter(new GLatLng(parseFloat(markers[0].getAttribute('lat')),	 parseFloat(markers[0].getAttribute('lng'))),9);
						// Add 10 markers to the map at random locations
					
                      
					});
					
				            
	   			}
function searchLocationsNear(resultid) 
				{
					
					var map = new GMap2(document.getElementById("map"),{size:new GSize(720,430)});
					var searchUrl = '<?php echo WEB_URL;  ?>hotel/ajax_map_show/'+resultid;
			
					GDownloadUrl(searchUrl, function(data)
					{
						
						var xml = GXml.parse(data);
						var markers = xml.documentElement.getElementsByTagName('marker');
					//alert(markers.length);
						
						for (var i = 0; i < markers.length; i++)
						{
							 var name = markers[i].getAttribute('name');
							  var desc = markers[i].getAttribute('desc');
							  var starr = markers[i].getAttribute('star');
							   var roomtypee = markers[i].getAttribute('roomtype');
							     var total = markers[i].getAttribute('totalcost');
								     var picc = markers[i].getAttribute('pic');
							  
							  
							  var point = new GLatLng(parseFloat(markers[i].getAttribute('lat')), 
												 parseFloat(markers[i].getAttribute('lng')));	
							
							// var marker = new GMarker(point);
							//map.addOverlay(createMarker(point, i));
							/*map.addControl(new GSmallMapControl());

                        	map.addControl(new GMapTypeControl());*/
						
							var g = 0;
							map.addOverlay(createMarker(point, name,i,g, desc, starr,roomtypee, total, picc));
	                       
						}	map.setUIToDefault(); 
						 map.setCenter(new GLatLng(parseFloat(markers[0].getAttribute('lat')), 
												 parseFloat(markers[0].getAttribute('lng'))),11);
							
						// Add 10 markers to the map at random locations
						//map.addOverlay(marker);
                      
					});
					
				            
	   			}
				function createMarker(point, index,val,mark,desc, starr, roomtypee, total, picc) {				
			
					
				  if(val==mark)
				  {
					
					   var baseIcon = new GIcon(G_DEFAULT_ICON);
						baseIcon.shadow = "http://www.google.com/mapfiles/shadow50.png";
						baseIcon.iconSize = new GSize(36, 36);
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
						baseIcon.iconSize = new GSize(35, 35);
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
							
								//<div style="width:233px; float:left;  padding:10px 0 5px 0;"><div style="font-family:Arial, Helvetica, sans-serif; font-size:11px; font-weight:bold; color:#FFF; padding:0 10px 0 5px; float:left;">'+roomtypee+'</div><div style="font-family:Arial, Helvetica, sans-serif; font-size:11px; font-weight:bold; color:#FFF; padding:0 10px 0 5px; float:left;">USD '+total+'</div><div style="font-family:Arial, Helvetica, sans-serif; font-size:10px; font-weight:bold; color:#FFF; padding:0 0px 0 0px; font-style:italic; float:right;">Only 4 rooms left</div></div>
								
								
				var html = '<div style="width:auto; float:left;"><div style="width:246px; float:left; background-image:url(images/map_pop_repeat.png); background-repeat:repeat-y;"><div style="width:246px; float:left; height:26px;"><div style="float:left; height:26px; padding:0px 10px 0 5px; font-size:11px; font-family:Arial, Helvetica, sans-serif; font-weight:bold; color:#039; line-height:25px;">'+index+'</div><div style="width:64px; float:right; height:12px; margin:5px 12px 0 0;">'+starval+'</div><div style="clear:both;"></div></div><div style="clear:both;"></div><div style="width:264px; background-color:#3099da; margin:0 0 0 2px;"><div style="width:63px; float:left; height:75px;margin:5px 0 0 5px;"><img src="'+picc+'" width="70" height="70" /></div><br>Price Starts From '+total+' USD<div style="clear:both;"></div></div></div></div></div>';
	

	 GEvent.addListener(marker, "mouseover", function() {
					marker.setDetailWinHTML(html);
				  });
	
	//marker.setHoverImage("http://provabextranet.com/WDM/555_online/images/hotel_search_icon small.png");
	
			
				  return marker;
				
		
				
				}
		
				
</script>
</head>

<body onload="javascript:return searchLocationsNear(<?php echo $result_id; ?>);">

<span style="float:right; width:100%"><a class="ac_det" href="javascript:void(0);" onClick="parent.$('#rlightbox').attr('src','');parent.$('#rlightbox').hide();">
<div align="right" style="color: rgb(0, 102, 153); font-size: 14px; margin-top:-60px; margin-right:0px">
<img src="<?php echo WEB_DIR.'images/closebutton3-th.png';?>" /></div></a></span>
<div id="map" style="margin-top:60px"></div>
</body>
</html>