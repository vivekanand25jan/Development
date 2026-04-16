<script type="text/javascript" src="http://jqueryjs.googlecode.com/files/jquery-1.2.6.min.js"></script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<link rel="stylesheet" type="text/css" href="<?php echo WEB_DIR; ?>map/infobox.css" />
<script type="text/javascript" src="<?php echo WEB_DIR; ?>map/infobox.js"></script>
<script type="text/javascript">

var projmark = '';
 
 var roaming = JSON.parse($.ajax({
     type: 'GET',
     url: '<?php echo WEB_URL.'hotel/fetch_search_result_map'; ?>',
     dataType: 'json',
     global: false,
     async:false,
     success: function(data) {
         return data;
     }
 }).responseText);
 
 


/*
var projmark = [ 									 
		{
			lat:'54.9995', lng:'-7.3228', name:"Derry Travelodge", info:"<div id='mapdetailsbox'><div id='imgbox'><img alt='hotel image' src='http://www.hotelbeds.com/giata/06/068320/068320a_hb_l_003.jpg' width='70' height='70' alt='Hotel image' /></div><div id='hotelname'>Derry Travelodge</div><div id='star'> <img src='../images/star2.5.png' border='0' /></div><div id='avalabletxt'> Avalable From</div><div id='doller'>THB&nbsp;3055.19</div><div id='pernight'> Per Night</div><div style='clear:both'> </div></div>"
		}	
		
		];*/

var roam_array = [];
		
function roam(name)
{

	var roam_key = $('#other_hotel').attr('class');
	
	 if (roam_key == 'show')
	{ 
	  if (roam_array) {
		for(j in roam_array) {
			roam_array[j].setMap(map);
		}
	  }
	  $('#other_hotel').removeClass('show');
	  $('#other_hotel').addClass('hide');
	  $('#other_hotel').val('Hide Other Hotels');
	} 
	else if(roam_key == 'hide')
	{
		if (roam_array) 
		{
			 for (j in roam_array) 
			 {
				 roam_array[j].setMap(null);
			 }
		}
	  $('#other_hotel').removeClass('hide');
	  $('#other_hotel').addClass('show');
	  $('#other_hotel').val('Show Other Hotels');
	}
}// end of Roam function


var center_lat = "<?php echo $result[0]['latitude']; ?>";
var center_lng = "<?php echo $result[0]['longitude']; ?>";

var infos = [];
var centers = new google.maps.LatLng(center_lat, center_lng);



function initialize() {
  var mapOptions = {
    zoom: 12,
    mapTypeId: 'roadmap',
    center: centers
	
  };

  map = new google.maps.Map(document.getElementById("map_div"), mapOptions);
  //map.setTilt(45);


  var hotel_img =  '<?php echo WEB_DIR.'images/select.png'; ?>';
  var roam_arrnd =  '<?php echo WEB_DIR.'images/unselect.png'; ?>';
  
  for (index in projmark){ addMainmark(projmark[index], hotel_img);}
  
  if(roaming.length > 0)
 {
 	for (index in roaming){ addMarker_roam(roaming[index], roam_arrnd); }
  }
function orderOfCreation(marker,b) {
        return 1;
      }
    function addMainmark(data, img) 
  {
	  var marker = new google.maps.Marker({
	      	 position: new google.maps.LatLng(data.lat, data.lng),
	        map: map,	       
	        draggable: false,
	        animation: google.maps.Animation.DROP,
	        icon: img,
			zIndex:2

	});

	var content_main = document.createElement("DIV");
	var title = document.createElement("DIV");
	title.innerHTML = data.info;					
	content_main.appendChild(title);
	var myInfoOptions1 = {
			 content: content_main
			,disableAutoPan: false
			,maxWidth: 0
			,pixelOffset: new google.maps.Size(-140, 0)
			,zIndex: null
			,boxStyle: { 
			 // border: "2px solid #3399FE"
			 // ,background: "white",
			  opacity: 1
			  ,width: "300px"
			  ,height: "95px"
			  
			 }
			,closeBoxMargin: "10px 2px 2px 2px"
			,closeBoxURL: ""
			,infoBoxClearance: new google.maps.Size(1, 1)
			,isHidden: false
			,pane: "floatPane"
			,enableEventPropagation: false
		};
                   
      google.maps.event.addListener(marker, 'mouseover', function () { 
      	   closeInfos();     	                 
		ib.open(map, this);
	   infos[0]=ib;
             });     
	
	 google.maps.event.addListener(marker, 'mouseout', function () { 
      	   closeInfos();     	                 
		ib.close(map, this);
	   infos[0]=ib;
             }); 
			 
	  var ib = new InfoBox(myInfoOptions1);
		 
	
  }
  
  function addMarker_roam(data, img) 
  {
      var marker = new google.maps.Marker({
                   position: new google.maps.LatLng(data.lat, data.lng),
                   map: map,                
                   draggable: false,
                   animation: google.maps.Animation.DROP,
                   icon: img,
				    zIndex:1
      });
    roam_array.push(marker);
     var content = document.createElement("DIV");
      var title = document.createElement("DIV");
      title.innerHTML = data.info;    					
      content.appendChild(title);       


		var myInfoOptions = {
			 content: content
			,disableAutoPan: false
			,maxWidth: 0
			,pixelOffset: new google.maps.Size(-140, 0)
			,zIndex: null
			,boxStyle: { 
			  //border: "2px solid #ECA425"
			  //,background: "white",
			  opacity: 1
			  ,width: "300px"
			  ,height: "95px"
			  
			 }
			,closeBoxMargin: "10px 2px 2px 2px"
			,closeBoxURL: ""
			,infoBoxClearance: new google.maps.Size(1, 1)
			,isHidden: false
			,pane: "floatPane"
			,enableEventPropagation: false
		};
                   
      google.maps.event.addListener(marker, 'mouseover', function () { 
      	   closeInfos();     	                 
		ib.open(map, this);
	   infos[0]=ib;
             });     
	
	 google.maps.event.addListener(marker, 'mouseout', function () { 
      	   closeInfos();     	                 
		ib.close(map, this);
	   infos[0]=ib;
             }); 
			 
	  var ib = new InfoBox(myInfoOptions);
		
        
  } //end of for loop of roaming places
  
/*
 var bounds = new google.maps.LatLngBounds();

	for (index in roaming) 
	{
		var data = roaming[index];
		bounds.extend(new google.maps.LatLng(data.lat, data.lng));
	}
	map.fitBounds(bounds); 

     */    
} // end of Initialize Function


function closeInfos(){
	   if(infos.length > 0){
	  
	      infos[0].set("marker",null);	    
	      infos[0].close();	     
	      infos.length = 0;
	   }
	} // end of close Infos

google.maps.event.addDomListener(window, 'load', initialize);


</script>
   <strong style="color:#3399FE; font-size:14px; padding:6px 0 0 15px;">        
        <img  width="37" height="43"src="<?php echo WEB_DIR.'/images/unselect.png' ?>"  style="float:left;"/> <span style="float:left; margin:3px 0 0 10px; font-size:14px; font-family:Arial, Helvetica, sans-serif;"><?php echo $_SESSION['city']; ?> </span>   
  
    </strong>  

<span style="float:right; width:250px; margin:0 22px 0 0; ">
<div align="right"  style=" margin:0 0 0 15px"><a class="ac_det" href="javascript:void(0);" onClick="parent.$('#rlightbox').attr('src','');parent.$('#rlightbox').hide();"><input type="button"  value="Go Back"  style="-moz-border-radius:4px;
	-webkit-border-radius:4px;
	border:1px solid #fc7700;
	color:#fff;
	text-shadow:0 -1px 0  #CCC;
	padding:2px 10px 2px 10px;
	font-size:13px;
	 
	cursor:pointer;
	background-attachment: scroll;
	background-color: #fc7700;
	
	background-repeat: repeat-x;
	background-position: 0 0;
	" /></a></div>
 	
	
    
 </span>
 
<div>

	<div id="map_div" style="width:850px; height: 430px; border:5px solid #F2F2F2; float:left;" >Hotel's Location Map</div>
 
</div>
