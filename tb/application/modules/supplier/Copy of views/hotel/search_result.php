<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="<?php echo WEB_DIR; ?>css/style_sheet.css" rel="stylesheet" type="text/css" />
<link href="<?php echo WEB_DIR; ?>css/postion.css" rel="stylesheet" type="text/css" />
<link href="<?php echo WEB_DIR; ?>acc/listings-59ffb9b6c75d3dc35ae9fc56850da63e.css" rel="stylesheet" type="text/css" />

<style>
#rlightbox{ background:url(<?php echo WEB_DIR ?>images/tr-img.png); width:100%; height:100%; position:fixed; left:0px; display:none; z-index:99999; background-position:left}
body{
margin-top:0px;
}
body{
margin-top:0px;

}
</style>

<div id="rlightbox" align="center"><table align="center" cellpadding="0" cellspacing="0" height="100%" border="0">
<tr><td valign="middle"><div align="right" style="background-color:#FFF; border:5px dashed #2F2F2F;">

<iframe src="" id="rlight_box" name="rlight_box" frameborder="0" width="750px" height="520px" scrolling="yes" style="background-color: #FFFFFF"></iframe></div></td></tr></table></div>
    <style type="text/css">
<!--
.style1 {color: #FF0000}
-->
    </style>

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
width:714px;
float:left; }

</style>

<script language="javascript1.5" type="text/javascript">
  function form_sub()
  {

	 var str1 = document.getElementById('datepicker').value;
	 var str2 = document.getElementById('datepicker1').value;  
	    var dt1  = parseInt(str1.substring(0,2),10);
    var mon1 = parseInt(str1.substring(3,5),10);
    var yr1  = parseInt(str1.substring(6,10),10);
    var dt2  = parseInt(str2.substring(0,2),10);
    var mon2 = parseInt(str2.substring(3,5),10);
    var yr2  = parseInt(str2.substring(6,10),10);
    var date1 = new Date(yr1, mon1, dt1);
    var date2 = new Date(yr2, mon2, dt2);

    if(date2 <= date1)
    {
		alert("CheckOut Date Must Be Greater Than CheckIn Date.");
		return false;
	}
  }
  </script>
    <script language="javascript">

<!-- Calling Multiple Api Function -->
	
$(document).ready(function () {
	
	$('#hotel_facility input, #price_asc, #price_desc, #star_asc, #star_desc, #name_asc, #name_desc').click(function () {
		
		filterSearch('', this.id);
		
		loadData(1);
	});
	

		

	$( "#slider-range" ).slider({
					range: true,
					min: 0,
					max: 0,
					values: [ 0, 0 ],
					slide: function( event, ui ) {
						$( "#amount" ).val( "USD " + ui.values[ 0 ] + " - USD " + ui.values[ 1 ] );
					}
				});
				$( "#amount" ).val( "USD " + $( "#slider-range" ).slider( "values", 0 ) +
					" - USD " + $( "#slider-range" ).slider( "values", 1 ) );
					
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
					
	//var a = [];
	
	$("#reset_filter").click(function() {
	
			$.ajax({
				  url:'<?php echo WEB_URL; ?>hotel/fetch_search_result/',
				  data: "",
				  dataType: "json",
				  beforeSend:function(){
					$('#loading').html('<div  style=" padding-top:22px;"  class="loading" ><img width="253" height="31" src="<?php echo WEB_DIR; ?>gui/slider/images/loading_bar_animated.gif" alt="Loading..." /><br><div class="bottom-header" style="padding-left:105px">Loading</div></div>');
				  },
				  success: function(data){
					$('#result').html(data.hotel_search_result);
					//$("#priceStarts").html(data.low_val);
					$("#result_count").html(data.total_result);
					$("#priceStarts").html(data.min_val);
					
					
				minVal = data.min_val;
				maxVal = data.max_val;
				$( "#slider-range" ).slider({
					range: true,
					min: minVal,
					max: maxVal,
					values: [ minVal, maxVal ],
					slide: function( event, ui ) {
						var r = Math.round(ui.values[ 0 ] / <?php echo $this->session->userdata('currency_value');?>);
						var rr = Math.round(ui.values[ 1 ] / <?php echo $this->session->userdata('currency_value');?>);
						$( "#amount_dummy" ).val( "<?php echo $this->session->userdata('currency');?> " + ui.values[ 0 ] + "  to  <?php echo $this->session->userdata('currency');?> " + ui.values[ 1 ] );
						$( "#amount" ).val( "USD " + r + "  to  USD " + rr );
					},
					  change: function( event, ui ) {
					  if (event.originalEvent) {
					  	filterSearch('price');
                        loadData(1);  // For first time page load default results
                       
					  }
					}
				});
				$( "#amount_dummy" ).val( "<?php echo $this->session->userdata('currency');?> " + $( "#slider-range" ).slider( "values", 0 ) +
					"  to  <?php echo $this->session->userdata('currency');?> " + $( "#slider-range" ).slider( "values", 1 ) );




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
					  	filterSearch();
						loadData(1);
						
					  }
					}
				});
				$( "#star" ).val( $( "#slider-range-star" ).slider( "values", 0 ) +
					" - " + $( "#slider-range-star" ).slider( "values", 1 ) );
					
				for(var i=0; i < document.leftfilter.hotel_fac_val.length; i++){
						if(document.leftfilter.hotel_fac_val[i].checked)
							document.leftfilter.hotel_fac_val[i].checked = false;
						}
						
				loadData(1);
					
					

					 
				  },
				  error:function(request, status, error){
					// failed request; give feedback to user
					$('#result').html('<p class="error" style="padding:30px"><strong>No records found!!!    Please try again in few moments...</strong></p>');
				  }
				  
				});
		return false;
	});
	
	
	
	var a = [<?php echo $api_fs;?>];
	
	
	
	  var i = 0;
	  $('#loading').fadeIn();
	 
	  function nextCall() {
		if(i == a.length) {
			$('#loading').fadeOut();
			$('#loading_image').hide();
			
			$('#loading_result').fadeIn();
			$('#loading_imagea').fadeIn();
			return; 
		}
		
		$.ajax({
		  url:'<?php echo WEB_URL; ?>hotel/call_api/'+a[i],
		  //url:'<?php echo WEB_URL; ?>hotel/ajaxcall',
		  data: '',
		  dataType: "json",
		  beforeSend:function(){
			// this is where we append a loading image
			$('#loading').html('<div  style=" padding-top:22px;"  class="loading" ><img width="253" height="31" src="<?php echo WEB_DIR; ?>gui/images/loading_bar_animated.gif" alt="Loading..." /><br><div class="bottom-header" style="padding-left:105px">Loading</div></div>');
			$('#loading_image').fadeIn();
		  },
		  success: function(data){
			  i++;
			  nextCall();      
			  if(data.hotel_search_result == false || data.hotel_search_result == null)
			  {
				 $('#noresult').fadeIn();
			  }
			$('#result').html(data.hotel_search_result);
			  
			//$(".pagination").html(data.paging);
			$("#result_count").html(data.total_result);

			$("#priceStarts").html(data.min_val);
				
			var minVal = data.min_val;
			var maxVal = data.max_val;
			
			$( "#slider-range" ).slider({
					range: true,
					min: minVal,
					max: maxVal,
					values: [ minVal, maxVal ],
					slide: function( event, ui ) {
						var r = Math.round(ui.values[ 0 ] / <?php echo $this->session->userdata('currency_value');?>);
						var rr = Math.round(ui.values[ 1 ] / <?php echo $this->session->userdata('currency_value');?>);
						$( "#amount_dummy" ).val( "<?php echo $this->session->userdata('currency');?> " + ui.values[ 0 ] + "  to  <?php echo $this->session->userdata('currency');?> " + ui.values[ 1 ] );
						$( "#amount" ).val( "USD " + r + "  to  USD " + rr );
					},
					  change: function( event, ui ) {
					  if (event.originalEvent) {
					  	filterSearch('price');
                        loadData(1);  // For first time page load default results
                       
					  }
					}
				});
				$( "#amount_dummy" ).val( "<?php echo $this->session->userdata('currency');?> " + $( "#slider-range" ).slider( "values", 0 ) +
					"  to  <?php echo $this->session->userdata('currency');?> " + $( "#slider-range" ).slider( "values", 1 ) );
					
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
					  	filterSearch();
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
			//$("#hotelfac").load("<?php print WEB_URL ?>hotel/hotel_fac");
		  },
		  error:function(request, status, error){
			// failed request; give feedback to user
			$('#result').html('<p class="error" style="padding:30px"><strong>No records found!!!    Please try again in few moments...</strong></p>');
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
                           loadData(1);            
                        function loadData(page){
                            
                            loading_show();  
							/*var minVal = $( "#slider-range" ).slider( "values", 0 );
							var maxVal = $( "#slider-range" ).slider( "values", 1 );
							var minStar = $( "#slider-range-star" ).slider( "values", 0 );
							var maxStar = $( "#slider-range-star" ).slider( "values", 1 );
							var params = 'minVal='+minVal+'&maxVal='+maxVal+'&minStar='+minStar+'&maxStar='+maxStar+'&page='+page;*/
						//var params = 'page='+page;
						var minVal = $( "#slider-range" ).slider( "values", 0 );
						var maxVal = $( "#slider-range" ).slider( "values", 1 );
						
						var minStar = $( "#slider-range-star" ).slider( "values", 0 );
						var maxStar = $( "#slider-range-star" ).slider( "values", 1 );
						
						var facilities='';
						for(var i=0; i < document.leftfilter.hotel_fac_val.length; i++){
						if(document.leftfilter.hotel_fac_val[i].checked)
							facilities +='"'+document.leftfilter.hotel_fac_val[i].value+'"'+ " +";
						}
					
						var facilities = encodeURIComponent(facilities); 
						
						var params = 'page='+page+'&minVal='+minVal+'&maxVal='+maxVal+'&minStar='+minStar+'&maxStar='+maxStar+'&facilities='+facilities;
			
						
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
                        
                      // For first time page load default results
                        $('.pagination li.active').live('click',function(){
                            var page = $(this).attr('p');
                            loadData(page);
                            

                        });           
                        
	// Filter
	function filterSearch(filter_type,sorting) { //filterPriceStar
			var minVal = $( "#slider-range" ).slider( "values", 0 );
			var maxVal = $( "#slider-range" ).slider( "values", 1 );
			
			var minStar = $( "#slider-range-star" ).slider( "values", 0 );
   			var maxStar = $( "#slider-range-star" ).slider( "values", 1 );
			
			var facilities='';
			for(var i=0; i < document.leftfilter.hotel_fac_val.length; i++){
			if(document.leftfilter.hotel_fac_val[i].checked)
				facilities +='"'+document.leftfilter.hotel_fac_val[i].value+'"'+ " +";
			}
		
			var facilities = encodeURIComponent(facilities); 
			
			var params = 'minVal='+minVal+'&maxVal='+maxVal+'&minStar='+minStar+'&maxStar='+maxStar+'&facilities='+facilities;
			if (sorting != undefined) {
				params += '&sorting='+sorting;
			}
			
			
			
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
					$("#priceStarts").html(data.min_val);

					/*$('#slider-range').slider( "option", "min", data.min_val );
					$('#slider-range').slider( "option", "max", data.max_val );
					$('#slider-range').slider( "option", "value", $('#slider-range').slider("value"));

					var r = Math.round(data.min_val / <?php echo $this->session->userdata('currency_value');?>);
					var rr = Math.round(data.max_val / <?php echo $this->session->userdata('currency_value');?>);
					$( "#amount_dummy" ).val( "USD " + r + "  to  USD " + rr );*/
					
					<?php /*?>/*if (filter_type != 'price') {
						minVal = data.min_val;
						maxVal = data.max_val;
						$( "#slider-range" ).slider({
							range: true,
							min: minVal,
							max: maxVal,
							values: [ minVal, maxVal ],
							slide: function( event, ui ) {
								var r = Math.round(ui.values[ 0 ] / <?php //echo $this->session->userdata('currency_value');?>);
								var rr = Math.round(ui.values[ 1 ] / <?php echo $this->session->userdata('currency_value');?>);
								$( "#amount_dummy" ).val( "<?php echo $this->session->userdata('currency');?> " + ui.values[ 0 ] + "  to  <?php echo $this->session->userdata('currency');?> " + ui.values[ 1 ] );
								$( "#amount" ).val( "USD " + r + "  to  USD " + rr );
							},
							  change: function( event, ui ) {
							  if (event.originalEvent) {
								filterSearch('price');
								loadData(1);  // For first time page load default results
							   
							  }
							}
						});
						$( "#amount_dummy" ).val( "<?php echo $this->session->userdata('currency');?> " + $( "#slider-range" ).slider( "values", 0 ) +
							"  to  <?php echo $this->session->userdata('currency');?> " + $( "#slider-range" ).slider( "values", 1 ) );
					} // if (filter_type != 'price') {
					<?php */?>

					 
				  },
				  error:function(request, status, error){
					// failed request; give feedback to user
					$('#result').html('<p class="error" style="padding:30px"><strong>No records found!!!    Please try again in few moments...</strong></p>');
				  }
				  
				});
	} // function filterSearch() 
	
				
	 return false;
		
   });
   
  
  
</script>
		
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<link rel="stylesheet" type="text/css" href="<?php echo WEB_DIR; ?>map/infobox.css" />
<script type="text/javascript" src="<?php echo WEB_DIR; ?>map/infobox.js"></script>
<script type="text/javascript">

$('#btn-slide').live("click",function () {

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
 
			$("#map_div").slideToggle("fast",function(){
				

($("#btn-slide").html()=="Show Map")?$("#btn-slide").html("Hide Map"):$("#btn-slide").html("Show Map");
  });
  });
	
						
		//});
		
var center_lat = "51.872139";
var center_lng = "0.193988";

var infos = [];
var center = new google.maps.LatLng(center_lat, center_lng);



function initialize() {
  var mapOptions = {
    zoom: 8,
    mapTypeId: 'roadmap',
    center: center
  };

  map = new google.maps.Map(document.getElementById("map_div"), mapOptions);
  //map.setTilt(45);


  var roam_arrnd =  '<?php echo WEB_DIR.'images/unselect.png'; ?>';
  
// alert(roaming.length);
  if(roaming.length > 0)
 {
 	for (index in roaming){ addMarker_roam(roaming[index], roam_arrnd); }
  }

  
  function addMarker_roam(data, img) 
  {
      var marker = new google.maps.Marker({
                   position: new google.maps.LatLng(data.lat, data.lng),
                   map: map,                 
                   draggable: false,
                   animation: google.maps.Animation.DROP,
                   icon: img
      });
         
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
			//  border: "1px solid black"
			//  ,background: "white",
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
 
  <script type="text/javascript" src="<?php echo WEB_DIR ?>gui/ajax/ajaxsbmt.js"></script>
          <script type="text/javascript">
		  

			
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
		  
        var minVal = $( "#slider-range" ).slider( "values", 0 );
			var maxVal = $( "#slider-range" ).slider( "values", 1 );
			
			var minStar = $( "#slider-range-star" ).slider( "values", 0 );
   			var maxStar = $( "#slider-range-star" ).slider( "values", 1 );
			
			var facilities='';
			for(var i=0; i < document.leftfilter.hotel_fac_val.length; i++){
			if(document.leftfilter.hotel_fac_val[i].checked)
				//facilities +=document.leftfilter.hotel_fac_val[i].value + " +"
				facilities +='"'+document.leftfilter.hotel_fac_val[i].value+'"'+ " +";
			}
		
			var facilities = encodeURIComponent(facilities); 
			
			var params = id+'/'+minVal+'/'+maxVal+'/'+minStar+'/'+maxStar+'/'+facilities;
			
		xmlhttp.open("POST","<?php print WEB_URL ?>hotel/all_filter_new1/"+params,true);
        //xmlhttp.open("POST","<?php print WEB_URL ?>hotel/all_filter_new1/"+id,true);
        xmlhttp.send(); //ddd
        
        
       
             
                }
				
				 
                
               
                </script>
                
             <style type="text/css">
                  
                    .pagination ul li.inactive,
                    .pagination ul li.inactive:hover{
                      /*  background-color:#ededed;
                        color:#bababa;
                        border:1px solid #bababa;
                        cursor: default;*/
                    }
                     .data ul li{
                        list-style: none;
                        font-family: verdana;
                        margin: 5px 0 5px 0;
                        color: #000;
                        font-size: 15px;
                    }
        
                    .pagination{
                        width: 329px;
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
<?php $this->load->view('header'); ?>
<div class="midlebody">
  <div class="lhsside">
  <div class="serachbar">
  <div class="hotellist">  
  <div style="width:25px; padding:4px; height:25px; float:left; "  id="loading_image">
  
  <img src="<?php echo WEB_DIR; ?>images/276486.gif"  width="35" /></div>
    <div style="width:25px; padding:4px; height:25px; display:none; float:left; "  id="loading_imagea">
  
<img src="<?php echo WEB_DIR; ?>images/load_c.png"  width="35" /></div>

    <p style="color:#FFF; font-size:13px;"><span style="font-size:18px;	">Hotels starting at</span> <br />
      USD <span style="font-size:40px;"><span id="priceStarts"> <img src="<?php echo WEB_DIR; ?>images/276491.gif"   /></span></span><br />
    Avg Per Night</p>
  </div>
  <form name="search_result" action="<?php echo WEB_URL; ?>hotel/search"  onsubmit="javascript:return form_sub();" method="post">
 <div style="width:210px; margin-left:10px;">

  <p style="color:#FFF; font-size:12px; padding-bottom:10px;"><span style="font-size:28px;">Modify</span> your search</p>
  <p style="color:#FFF; font-size:12px;">Destination / Hotel Name: </p>
      <script type="text/javascript" src="<?php print WEB_DIR; ?>autofill/js/bsn.AutoSuggest_c_2.0.js"></script>
          <link rel="stylesheet" href="<?php print WEB_DIR; ?>autofill/css/autosuggest_inquisitor.css" type="text/css" media="screen" charset="utf-8" />
                                                  <p> <input type="hidden" id="testid" value="" style="font-size: 10px; width: 20px;" disabled="disabled" />
    <input  name="cityval" value="<?php echo $_SESSION['city']; ?>"  style="width:205px;height:22px"  id="testinput"  type="text" size="28" />
   <script type="text/javascript">
	var options = {
		script:"<?php print WEB_DIR; ?>test_hotel.php?json=true&",varname:"input",json:true,callback: function (obj) { document.getElementById('testid').value = obj.id; } };
	var as_json = new AutoSuggest('testinput', options);

</script>
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

 function dateADD1(currentDate)
{
 var valueofcurrentDate=currentDate.valueOf()-(24*60*60*1000);
 var newDate =new Date(valueofcurrentDate);
 return newDate;
}

	$(function() {
		$( "#datepicker" ).datepicker({
			numberOfMonths: 3,
			dateFormat: 'dd-mm-yy',
			
			minDate: 0
		  
		});
		$( "#datepicker1" ).datepicker({
			numberOfMonths: 3,
			dateFormat: 'dd-mm-yy',
			
			minDate: 0
		  
		});
		
		
		
		 $('#datepicker').change(function(){
		   //$t=$(this).val();
		   var selectedDate = $(this).datepicker('getDate');
		   var str1 = $( "#datepicker1" ).val();
		
    var predayDate  = dateADD(selectedDate);
	var str2 = zeroPad(predayDate.getDate(),2)+"-"+zeroPad((predayDate.getMonth()+1),2)+"-"+(predayDate.getFullYear());

	
	var dt1  = parseInt(str1.substring(0,2),10);
    var mon1 = parseInt(str1.substring(3,5),10);
    var yr1  = parseInt(str1.substring(6,10),10);
    var dt2  = parseInt(str2.substring(0,2),10);
    var mon2 = parseInt(str2.substring(3,5),10);
    var yr2  = parseInt(str2.substring(6,10),10);
    var date1 = new Date(yr1, mon1, dt1);
    var date2 = new Date(yr2, mon2, dt2);
    if(date2 < date1)
    {
		 
	}
	else
	{
		  var nextdayDate  = dateADD(selectedDate);
		   var nextDateStr = zeroPad(nextdayDate.getDate(),2)+"-"+zeroPad((nextdayDate.getMonth()+1),2)+"-"+(nextdayDate.getFullYear());

		   $t = nextDateStr;
					$( "#datepicker1" ).datepicker({
	             		numberOfMonths: 3,
						dateFormat : 'dd-mm-yy',
						minDate: 0
					});
		   $( "#datepicker1" ).val($t);
		  // $('#datepicker1').datepicker('option', 'minDate', $t);s
	}
		 /*  var selectedDate = $(this).datepicker('getDate');
		   var nextdayDate  = dateADD(selectedDate);
		   var nextDateStr = zeroPad(nextdayDate.getDate(),2)+"-"+zeroPad((nextdayDate.getMonth()+1),2)+"-"+(nextdayDate.getFullYear());

		   $t = nextDateStr;
					$( "#datepicker1" ).datepicker({
	             		numberOfMonths: 3,
						dateFormat : 'dd-mm-yy',
						minDate: $t
					});
		   $( "#datepicker1" ).val($t);
		   $('#datepicker1').datepicker('option', 'minDate', $t);*/

		  });
		  
		  $('#datepicker1').change(function(){
		   //$t=$(this).val();
		 
		   var selectedDate = $(this).datepicker('getDate');
		   var str1 = $( "#datepicker" ).val();
		
    var predayDate  = dateADD1(selectedDate);
	var str2 = zeroPad(predayDate.getDate(),2)+"-"+zeroPad((predayDate.getMonth()+1),2)+"-"+(predayDate.getFullYear());

	
	var dt1  = parseInt(str1.substring(0,2),10);
    var mon1 = parseInt(str1.substring(3,5),10);
    var yr1  = parseInt(str1.substring(6,10),10);
    var dt2  = parseInt(str2.substring(0,2),10);
    var mon2 = parseInt(str2.substring(3,5),10);
    var yr2  = parseInt(str2.substring(6,10),10);
    var date1 = new Date(yr1, mon1, dt1);
    var date2 = new Date(yr2, mon2, dt2);
    if(date2 < date1)
    {
		  var nextdayDate  = dateADD1(selectedDate);
		   var nextDateStr = zeroPad(nextdayDate.getDate(),2)+"-"+zeroPad((nextdayDate.getMonth()+1),2)+"-"+(nextdayDate.getFullYear());

		   $t = nextDateStr;
					$( "#datepicker" ).datepicker({
	             		numberOfMonths: 3,
						dateFormat : 'dd-mm-yy',
						minDate: 0
					});
		   $( "#datepicker" ).val($t);
	}
	else
	{
		 
		  // $('#datepicker1').datepicker('option', 'minDate', $t);s
	}
		

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
  <p style="color:#FFF; font-size:12px;">&nbsp; </p>
  <p style="color:#FFF; font-size:12px;">Check-in Date: </p>
  <input  value="<?php echo $current_dte; ?>"   readonly="readonly"  name="sd" id="datepicker" type="text" class="check_bg_2" />
  <p style="color:#FFF; font-size:12px;">&nbsp;</p>
  <p style="color:#FFF; font-size:12px;">Check-out Date: </p>
<input   value="<?php echo $next_dte; ?>"   readonly="readonly"  name="ed" id="datepicker1" type="text" class="check_bg_2" />
  <p style="color:#FFF; font-size:12px;"></p>
  
 </div>
  <div class="room_bor_bottom">
                                                <div class="modifi_search">
                                             <div class="wi102_0">
                                             		<p  style="color: #FFFFFF;
    font-size: 12px;">Room</p>
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
                <select name="room_count"   onChange="display_adult_count(this.value)" class="jumb_25_for_new_1 pl5"  style="width:70px">
                <?php
				if($_SESSION['room_count']==1 )
				{
                 echo ' <option value="1" selected="selected">Room 1</option>';
                  echo '  <option value="2">Room 2</option>';
                  echo '  <option value="3">Room 3</option>';
				}
				elseif($_SESSION['room_count']==2 )
				{
                 echo ' <option value="1" >Room 1</option>';
                  echo '  <option value="2"  selected="selected">Room 2</option>';
                  echo '  <option value="3">Room 3</option>';
				}elseif($_SESSION['room_count']==3 )
				{
                 echo ' <option value="1">Room 1</option>';
                  echo '  <option value="2">Room 2</option>';
                  echo '  <option value="3"  selected="selected">Room 3</option>';
				}
				else
				{
                 echo ' <option value="1" selected="selected">Room 1</option>';
                  echo '  <option value="2">Room 2</option>';
                  echo '  <option value="3">Room 3</option>';
				}
				
				?>
                </select></p>
                                             </div>
                                              <?php if($_SESSION['room_count']==1 || $_SESSION['room_count']==3 || $_SESSION['room_count']==2)
						{
						
							?>   
                                             
                                             <div class="check_139 " id="room1">
              <DIV class="check_139" >
                <!--<div class="rooms_left"></div>-->
              
                <div class="wi40"  style="height: auto;">
                  <p style="color: #FFFFFF;
    font-size: 12px;">Adult</p>
                  <p>
                    <select name="adult[]" id="jumpMenu2" onchange="hide_child1(this.value)"  class="jumb_25_for_new_1 pl5">
                      <?php $s_adult = $_SESSION['org_adult'][0];
					  if($s_adult == 1 )
					  {
                      echo '<option selected="selected" value="1">1</option>';
					   echo '<option value="2">2</option>';
                       echo '<option value="3">3</option>';
                       echo '<option value="4">4</option>';
					  }
					  elseif($s_adult == 2 )
					  {
                      echo '<option value="1">1</option>';
					   echo '<option selected="selected"  value="2">2</option>';
                       echo '<option value="3">3</option>';
                       echo '<option value="4">4</option>';
					   
					  }
					    elseif($s_adult == 3 )
					  {
                      echo '<option value="1">1</option>';
					   echo '<option value="2">2</option>';
                       echo '<option  selected="selected" value="3">3</option>';
                       echo '<option value="4">4</option>';
					   
					  }
					    elseif($s_adult == 4 )
					  {
                      echo '<option value="1">1</option>';
					   echo '<option value="2">2</option>';
                       echo '<option value="3">3</option>';
                       echo '<option selected="selected"  value="4">4</option>';
					   
					  }
					  else
					  {
						  echo '<option value="1">1</option>';
					   echo '<option value="2">2</option>';
                       echo '<option value="3">3</option>';
                       echo '<option  value="4">4</option>';
						  
					  }
					  ?>
                    </select>
                  </p>
                </div>
                <div class="wi40 padding_le ml10">
                  <p id="child_header"  style="color: #FFFFFF;
    font-size: 12px;">Children</p>
                  <p>
                    <select name="child[]" id="inputfiled1_1"  class="jumb_25_for_new_1"  onChange="display_child_count(this.value)">
                        <?php $s_child = $_SESSION['org_child'][0];
					    if($s_child == 0 && $s_adult == 1 )
					  {
                      echo '<option selected="selected" value="0">0</option>';
					  echo '<option value="1">1</option>';
                      echo '<option value="2">2</option>';
					  echo '<option value="3">3</option>';
					  
					  }
					  elseif($s_child == 0 && $s_adult == 2 )
					  {
                      echo '<option selected="selected" value="0">0</option>';
					  echo '<option value="1">1</option>';
                      echo '<option value="2">2</option>';
					  }
					  elseif($s_child == 0 && $s_adult == 3 )
					  {
                      echo '<option selected="selected" value="0">0</option>';
					  echo '<option value="1">1</option>';
                	  }
					  elseif($s_child == 0 && $s_adult == 4 )
					  {
                      echo '<option selected="selected" value="0">0</option>';
					  }
					  elseif($s_child == 1  && $s_adult == 1 )
					  {
                      echo '<option value="0">0</option>';
					   echo '<option selected="selected"  value="1">1</option>';
                       echo '<option value="2">2</option>';
                       echo '<option value="3">3</option>';
					   
					  }
					   elseif($s_child == 1  && $s_adult == 2 )
					  {
                      echo '<option value="0">0</option>';
					   echo '<option selected="selected"  value="1">1</option>';
                       echo '<option value="2">2</option>';
                   
					   
					  }
					   elseif($s_child == 1  && $s_adult == 3 )
					  {
                      echo '<option value="0">0</option>';
					   echo '<option selected="selected"  value="1">1</option>';
                     
					   
					  }
					   
					    elseif($s_child == 2   && $s_adult == 1 )
					  {
                      echo '<option value="0">0</option>';
					   echo '<option value="1">1</option>';
                       echo '<option  selected="selected" value="2">2</option>';
                       echo '<option value="3">3</option>';
					   
					  }
					  elseif($s_child == 2   && $s_adult == 2 )
					  {
                      echo '<option value="0">0</option>';
					   echo '<option value="1">1</option>';
                       echo '<option  selected="selected" value="2">2</option>';
                     
					   
					  }
					  
					    elseif($s_child == 3  && $s_adult == 1)
					  {
                      echo '<option value="0">0</option>';
					   echo '<option value="1">1</option>';
                       echo '<option value="2">2</option>';
                       echo '<option selected="selected"  value="3">3</option>';
					   
					  }
					 
					  else
					  {
						  echo '<option value="0">0</option>';
					   echo '<option value="1">1</option>';
                       echo '<option value="2">2</option>';
                       echo '<option  value="3">3</option>';
						  
					  }
					  ?>
                    </select>
                  </p>
                </div>
              </DIV>
              <?php
			  if($s_child  == 1 || $s_child  == 2 || $s_child  == 3)
			  {
			  ?>
              <DIV class="check_149" id="age1" >
                <div class="AGE_OF2">Age Of Child 1</div>
                <div class="wi40 padding_le">
                  <p></p>
                  <p>
                    <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1"  >
                      <?php for($i=1;$i< 13 ;$i++)
					{
						if($_SESSION['child_age'][0] == $i)
						{
                     echo '<option selected="selected" value="'.$i.'">'.$i.'</option>';
						}
						else
						{
                     echo '<option value="'.$i.'">'.$i.'</option>';
						}
					}
					?>
                    </select>
                  </p>
                </div>
              </DIV>
              <?php
			  }
			  else
			  {
				 ?>
                 <DIV class="check_149" id="age1" style="display:none;">
                <div class="AGE_OF2">Age Of Child 1</div>
                <div class="wi40 padding_le">
                  <p></p>
                  <p>
                    <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1"  >
                     <?php for($i=1;$i< 13 ;$i++)
					{
						
                     echo '<option value="'.$i.'">'.$i.'</option>';
						
					}
					?>
                    </select>
                  </p>
                </div>
              </DIV>
                 <?php
			  }
			 
			  if($s_child  == 2 || $s_child  == 3)
			  {
			  ?>
              <DIV class="check_149"  id="age12" >
                <div class="AGE_OF2">Age Of Child 2</div>
                <div class="wi40 padding_le">
                  <p></p>
                  <p>
                    <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
                      <?php for($i=1;$i< 13 ;$i++)
					{
						if($_SESSION['child_age'][1] == $i)
						{
                     echo '<option selected="selected" value="'.$i.'">'.$i.'</option>';
						}
						else
						{
                     echo '<option value="'.$i.'">'.$i.'</option>';
						}
					}
					?>
                    </select>
                  </p>
                </div>
              </DIV>
              <?php
			  }
			  else
			  {
				  ?><DIV class="check_149"  id="age12"  style="display:none;">
                <div class="AGE_OF2">Age Of Child 2</div>
                <div class="wi40 padding_le">
                  <p></p>
                  <p>
                    <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
                     <?php for($i=1;$i< 13 ;$i++)
					{
						
                     echo '<option value="'.$i.'">'.$i.'</option>';
						
					}
					?>
                    </select>
                  </p>
                </div>
              </DIV>
                  <?php
			  }
			  ?>
              <?php
              if( $s_child  == 3)
			  { 	
				  ?>
              <DIV class="check_149"  id="age13" >
                <div class="AGE_OF2">Age Of Child 3</div>
                <div class="wi40 padding_le">
                  <p></p>
                  <p>
                    <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
                      <?php for($i=1;$i< 13 ;$i++)
					{
						if($_SESSION['child_age'][2] == $i)
						{
                     echo '<option selected="selected" value="'.$i.'">'.$i.'</option>';
						}
						else
						{
                     echo '<option value="'.$i.'">'.$i.'</option>';
						}
					}
					?>
                    </select>
                  </p>
                </div>
              </DIV>
            <?php
			  }
			  else
			  {
			  ?>
              <DIV class="check_149"  id="age13"  style="display:none;">
                <div class="AGE_OF2">Age Of Child 3</div>
                <div class="wi40 padding_le">
                  <p></p>
                  <p>
                    <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
                    <?php for($i=1;$i< 13 ;$i++)
					{
						
                     echo '<option value="'.$i.'">'.$i.'</option>';
						
					}
					?>
                    </select>
                  </p>
                </div>
              </DIV>
              <?php
			  }
			  ?>
             
            </div>
            <?php
						}
						else
						{
						?>
                        <div class="check_139 " id="room1">
              <DIV class="check_139" >
                <!--<div class="rooms_left"></div>-->
               
                <div class="wi40"  style="height: auto;">
                  <p style="color: #FFFFFF;
    font-size: 12px;">Adult</p>
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
                  <p id="child_header"  style="color: #FFFFFF;
    font-size: 12px;">Children</p>
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
                <div class="AGE_OF2">Age Of Child 1</div>
                <div class="wi40 padding_le">
                  <p></p>
                  <p>
                    <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1"  >
                      <?php for($i=1;$i< 13 ;$i++)
					{
						
                     echo '<option value="'.$i.'">'.$i.'</option>';
						
					}
					?>
                    </select>
                  </p>
                </div>
              </DIV>
              <DIV class="check_149"  id="age12"  style="display:none;">
                <div class="AGE_OF2">Age Of Child 2</div>
                <div class="wi40 padding_le">
                  <p></p>
                  <p>
                    <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
                     <?php for($i=1;$i< 13 ;$i++)
					{
						
                     echo '<option value="'.$i.'">'.$i.'</option>';
						
					}
					?>
                    </select>
                  </p>
                </div>
              </DIV>
              <DIV class="check_149"  id="age13"  style="display:none;">
                <div class="AGE_OF2">Age Of Child 3</div>
                <div class="wi40 padding_le">
                  <p></p>
                  <p>
                    <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
                     <?php for($i=1;$i< 13 ;$i++)
					{
						
                     echo '<option value="'.$i.'">'.$i.'</option>';
						
					}
					?>
                    </select>
                  </p>
                </div>
              </DIV>
            
             
            </div>
                        <?php
						}
						?>
						
             </div>
                        <?php if($_SESSION['room_count']==2 || $_SESSION['room_count']==3)
						{
						
							?>                       
        <div class="check_139	 ml17" style="float:right; margin-right:4px" id="room2">
              <DIV class="check_139" >
                <!--<div class="rooms_left"></div>-->
                <div class="wi40"  style="height: auto;">
                  <p></p>
                  <p>
                    <select name="adult[]" id="jumpMenu2" onchange="hide_child2(this.value)"  class="jumb_25_for_new_1 pl5">
                      <?php $s_adult1 = $_SESSION['org_adult'][1];
					  if($s_adult1 == 1 )
					  {
                      echo '<option selected="selected" value="1">1</option>';
					   echo '<option value="2">2</option>';
                       echo '<option value="3">3</option>';
                       echo '<option value="4">4</option>';
					  }
					  elseif($s_adult1 == 2 )
					  {
                      echo '<option value="1">1</option>';
					   echo '<option selected="selected"  value="2">2</option>';
                       echo '<option value="3">3</option>';
                       echo '<option value="4">4</option>';
					   
					  }
					    elseif($s_adult1 == 3 )
					  {
                      echo '<option value="1">1</option>';
					   echo '<option value="2">2</option>';
                       echo '<option  selected="selected" value="3">3</option>';
                       echo '<option value="4">4</option>';
					   
					  }
					    elseif($s_adult1 == 4 )
					  {
                      echo '<option value="1">1</option>';
					   echo '<option value="2">2</option>';
                       echo '<option value="3">3</option>';
                       echo '<option selected="selected"  value="4">4</option>';
					   
					  }
					  else
					  {
						  echo '<option value="1">1</option>';
					   echo '<option value="2">2</option>';
                       echo '<option value="3">3</option>';
                       echo '<option  value="4">4</option>';
						  
					  }
					  ?>
                    </select>
                  </p>
                </div>
                <div class="wi40 padding_le ml10">
                  <p id="child_header2"></p>
                  <p>
                    <select name="child[]" id="inputfiled1_2"  class="jumb_25_for_new_1"  onChange="display_child_count1(this.value)">
                       <?php $s_child1 = $_SESSION['org_child'][1];
					  if($s_child1 == 0 && $s_adult1 == 1 )
					  {
                      echo '<option selected="selected" value="0">0</option>';
					  echo '<option value="1">1</option>';
                      echo '<option value="2">2</option>';
					  echo '<option value="3">3</option>';
					  
					  }
					  elseif($s_child1 == 0 && $s_adult1 == 2 )
					  {
                      echo '<option selected="selected" value="0">0</option>';
					  echo '<option value="1">1</option>';
                      echo '<option value="2">2</option>';
					  }
					  elseif($s_child1 == 0 && $s_adult1 == 3 )
					  {
                      echo '<option selected="selected" value="0">0</option>';
					  echo '<option value="1">1</option>';
                	  }
					  elseif($s_child1 == 0 && $s_adult1 == 4 )
					  {
                      echo '<option selected="selected" value="0">0</option>';
					  }
					  elseif($s_child1 == 1  && $s_adult1 == 1 )
					  {
                      echo '<option value="0">0</option>';
					   echo '<option selected="selected"  value="1">1</option>';
                       echo '<option value="2">2</option>';
                       echo '<option value="3">3</option>';
					   
					  }
					   elseif($s_child1 == 1  && $s_adult1 == 2 )
					  {
                      echo '<option value="0">0</option>';
					   echo '<option selected="selected"  value="1">1</option>';
                       echo '<option value="2">2</option>';
                   
					   
					  }
					   elseif($s_child1 == 1  && $s_adult1 == 3 )
					  {
                      echo '<option value="0">0</option>';
					   echo '<option selected="selected"  value="1">1</option>';
                     
					   
					  }
					   
					    elseif($s_child1 == 2   && $s_adult1 == 1 )
					  {
                      echo '<option value="0">0</option>';
					   echo '<option value="1">1</option>';
                       echo '<option  selected="selected" value="2">2</option>';
                       echo '<option value="3">3</option>';
					   
					  }
					  elseif($s_child1 == 2   && $s_adult1 == 2 )
					  {
                      echo '<option value="0">0</option>';
					   echo '<option value="1">1</option>';
                       echo '<option  selected="selected" value="2">2</option>';
                     
					   
					  }
					  
					    elseif($s_child1 == 3  && $s_adult1 == 1)
					  {
                      echo '<option value="0">0</option>';
					   echo '<option value="1">1</option>';
                       echo '<option value="2">2</option>';
                       echo '<option selected="selected"  value="3">3</option>';
					   
					  }
					 
					  
					  
					  ?>
                    </select>
                  </p>
                </div>
              </DIV>
               <?php
			  if($s_child1  == 1 || $s_child1  == 2 || $s_child1  == 3)
			  {
			  ?>
              <DIV class="check_149" id="age2" >
                <div class="AGE_OF2">Age Of Child 1</div>
                <div class="wi40 padding_le">
                  <p></p>
                  <p>
                    <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1"  >
                      <?php for($i=1;$i< 13 ;$i++)
					{
						if($_SESSION['child_age'][3] == $i)
						{
                     echo '<option selected="selected" value="'.$i.'">'.$i.'</option>';
						}
						else
						{
                     echo '<option value="'.$i.'">'.$i.'</option>';
						}
					}
					?>
                    </select>
                  </p>
                </div>
              </DIV>
              <?php
			  }
			  else
			  {
				 ?>
                 <DIV class="check_149" id="age2" style="display:none;">
                <div class="AGE_OF2">Age Of Child 1</div>
                <div class="wi40 padding_le">
                  <p></p>
                  <p>
                    <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1"  >
                     <?php for($i=1;$i< 13 ;$i++)
					{
						
                     echo '<option value="'.$i.'">'.$i.'</option>';
						
					}
					?>
                    </select>
                  </p>
                </div>
              </DIV>
                 <?php
			  }
			 
			  if($s_child1  == 2 || $s_child1  == 3)
			  {
			  ?>
              <DIV class="check_149"  id="age22" >
                <div class="AGE_OF2">Age Of Child 2</div>
                <div class="wi40 padding_le">
                  <p></p>
                  <p>
                    <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
                      <?php for($i=1;$i< 13 ;$i++)
					{
						if($_SESSION['child_age'][4] == $i)
						{
                     echo '<option selected="selected" value="'.$i.'">'.$i.'</option>';
						}
						else
						{
                     echo '<option value="'.$i.'">'.$i.'</option>';
						}
					}
					?>
                    </select>
                  </p>
                </div>
              </DIV>
              <?php
			  }
			  else
			  {
				  ?><DIV class="check_149"  id="age22"  style="display:none;">
                <div class="AGE_OF2">Age Of Child 2</div>
                <div class="wi40 padding_le">
                  <p></p>
                  <p>
                    <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
                     <?php for($i=1;$i< 13 ;$i++)
					{
						
                     echo '<option value="'.$i.'">'.$i.'</option>';
						
					}
					?>
                    </select>
                  </p>
                </div>
              </DIV>
                  <?php
			  }
			  ?>
              <?php
              if( $s_child1  == 3)
			  { 	
				  ?>
              <DIV class="check_149"  id="age23" >
                <div class="AGE_OF2">Age Of Child 3</div>
                <div class="wi40 padding_le">
                  <p></p>
                  <p>
                    <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
                      <?php for($i=1;$i< 13 ;$i++)
					{
						if($_SESSION['child_age'][5] == $i)
						{
                     echo '<option selected="selected" value="'.$i.'">'.$i.'</option>';
						}
						else
						{
                     echo '<option value="'.$i.'">'.$i.'</option>';
						}
					}
					?>
                    </select>
                  </p>
                </div>
              </DIV>
            <?php
			  }
			  else
			  {
			  ?>
              <DIV class="check_149"  id="age23"  style="display:none;">
                <div class="AGE_OF2">Age Of Child 3</div>
                <div class="wi40 padding_le">
                  <p></p>
                  <p>
                    <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
                    <?php for($i=1;$i< 13 ;$i++)
					{
						
                     echo '<option value="'.$i.'">'.$i.'</option>';
						
					}
					?>
                    </select>
                  </p>
                </div>
              </DIV>
              <?php
			  }
			  ?>
              
          </div>
          <?php
						}
						else
						{
						?>
                        	                    
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
                <div class="AGE_OF2">Age Of Child 1</div>
                <div class="wi40 padding_le">
                  <p></p>
                  <p>
                    <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1"  >
                    <?php for($i=1;$i< 13 ;$i++)
					{
						
                     echo '<option value="'.$i.'">'.$i.'</option>';
						
					}
					?>
                    </select>
                  </p>
                </div>
              </DIV>
              <DIV class="check_149"  id="age22"  style="display:none;">
                <div class="AGE_OF2">Age Of Child 2</div>
                <div class="wi40 padding_le">
                  <p></p>
                  <p>
                    <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
                    <?php for($i=1;$i< 13 ;$i++)
					{
						
                     echo '<option value="'.$i.'">'.$i.'</option>';
						
					}
					?>
                    </select>
                  </p>
                </div>
              </DIV>
              <DIV class="check_149"  id="age23"  style="display:none;">
                <div class="AGE_OF2">Age Of Child 3</div>
                <div class="wi40 padding_le">
                  <p></p>
                  <p>
                    <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
                     <?php for($i=1;$i< 13 ;$i++)
					{
						
                     echo '<option value="'.$i.'">'.$i.'</option>';
						
					}
					?>
                    </select>
                  </p>
                </div>
              </DIV>
              
          </div>
          <?php
						}
						?>
                        
                         <?php 
						
						 if($_SESSION['room_count']==3 )
						{
							
							?>
  <div class="check_139	 ml17" style="float:right;  margin-right:4px" id="room3">
              <DIV class="check_139" >
                <!--<div class="rooms_left"></div>-->
                <div class="wi40" style="height: auto;">
                  <p></p>
                  <p>
                    <select name="adult[]" id="jumpMenu2" onchange="hide_child3(this.value)"  class="jumb_25_for_new_1 pl5">
                      <?php $s_adult2 = $_SESSION['org_adult'][2];
					  
					  
					  if($s_adult2 == 1 )
					  {
                      echo '<option selected="selected" value="1">1</option>';
					   echo '<option value="2">2</option>';
                       echo '<option value="3">3</option>';
                       echo '<option value="4">4</option>';
					  }
					  elseif($s_adult2 == 2 )
					  {
                      echo '<option value="1">1</option>';
					   echo '<option selected="selected"  value="2">2</option>';
                       echo '<option value="3">3</option>';
                       echo '<option value="4">4</option>';
					   
					  }
					    elseif($s_adult2 == 3 )
					  {
                      echo '<option value="1">1</option>';
					   echo '<option value="2">2</option>';
                       echo '<option  selected="selected" value="3">3</option>';
                       echo '<option value="4">4</option>';
					   
					  }
					    elseif($s_adult2 == 4 )
					  {
						 
                      echo '<option value="1">1</option>';
					   echo '<option value="2">2</option>';
                       echo '<option value="3">3</option>';
                       echo '<option selected="selected"  value="4">4</option>';
					   
					  }
					  else
					  {
						  echo '<option value="1">1</option>';
					   echo '<option value="2">2</option>';
                       echo '<option value="3">3</option>';
                       echo '<option  value="4">4</option>';
						  
					  }
					  ?>
                    </select>
                  </p>
                </div>
                <div class="wi40 padding_le ml10">
                  <p id="child_header3"></p>
                  <p>
                    <select name="child[]" id="inputfiled1_3"  class="jumb_25_for_new_1"  onChange="display_child_count2(this.value)">
                      <?php $s_child2 = $_SESSION['org_child'][2];
					  if($s_child2 == 0 && $s_adult2 == 1 )
					  {
                      echo '<option selected="selected" value="0">0</option>';
					  echo '<option value="1">1</option>';
                      echo '<option value="2">2</option>';
					  echo '<option value="3">3</option>';
					  
					  }
					  elseif($s_child2 == 0 && $s_adult2 == 2 )
					  {
                      echo '<option selected="selected" value="0">0</option>';
					  echo '<option value="1">1</option>';
                      echo '<option value="2">2</option>';
					  }
					  elseif($s_child2 == 0 && $s_adult2 == 3 )
					  {
                      echo '<option selected="selected" value="0">0</option>';
					  echo '<option value="1">1</option>';
                	  }
					  elseif($s_child2 == 0 && $s_adult2 == 4 )
					  {
                      echo '<option selected="selected" value="0">0</option>';
					  }
					  elseif($s_child2 == 1  && $s_adult2 == 1 )
					  {
                      echo '<option value="0">0</option>';
					   echo '<option selected="selected"  value="1">1</option>';
                       echo '<option value="2">2</option>';
                       echo '<option value="3">3</option>';
					   

					  }
					   elseif($s_child2 == 1  && $s_adult2 == 2 )
					  {
                      echo '<option value="0">0</option>';
					   echo '<option selected="selected"  value="1">1</option>';
                       echo '<option value="2">2</option>';
                   
					   
					  }
					   elseif($s_child2 == 1  && $s_adult2 == 3 )
					  {
                      echo '<option value="0">0</option>';
					   echo '<option selected="selected"  value="1">1</option>';
                     
					   
					  }
					   
					    elseif($s_child2 == 2   && $s_adult2 == 1 )
					  {
                      echo '<option value="0">0</option>';
					   echo '<option value="1">1</option>';
                       echo '<option  selected="selected" value="2">2</option>';
                       echo '<option value="3">3</option>';
					   
					  }
					  elseif($s_child2 == 2   && $s_adult2 == 2 )
					  {
                      echo '<option value="0">0</option>';
					   echo '<option value="1">1</option>';
                       echo '<option  selected="selected" value="2">2</option>';
                     
					   
					  }
					  
					    elseif($s_child2 == 3  && $s_adult2 == 1)
					  {
                      echo '<option value="0">0</option>';
					   echo '<option value="1">1</option>';
                       echo '<option value="2">2</option>';
                       echo '<option selected="selected"  value="3">3</option>';
					   
					  }
					 
					  else
					  {
						  echo '<option value="0">0</option>';
					   echo '<option value="1">1</option>';
                       echo '<option value="2">2</option>';
                       echo '<option  value="3">3</option>';
						  
					  }
					  ?>
                    </select>
                  </p>
                </div>
              </DIV>
              <?php
			  if($s_child2  == 1 || $s_child2  == 2 || $s_child2 == 3)
			  {
			  ?>
              <DIV class="check_149" id="age3" >
                <div class="AGE_OF2">Age Of Child 1</div>
                <div class="wi40 padding_le">
                  <p></p>
                  <p>
                    <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1"  >
                      <?php for($i=1;$i< 13 ;$i++)
					{
						if($_SESSION['child_age'][6] == $i)
						{
                     echo '<option selected="selected" value="'.$i.'">'.$i.'</option>';
						}
						else
						{
                     echo '<option value="'.$i.'">'.$i.'</option>';
						}
					}
					?>
                    </select>
                  </p>
                </div>
              </DIV>
              <?php
			  }
			  else
			  {
				 ?>
                 <DIV class="check_149" id="age3" style="display:none;">
                <div class="AGE_OF2">Age Of Child 1</div>
                <div class="wi40 padding_le">
                  <p></p>
                  <p>
                    <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1"  >
                     <?php for($i=1;$i< 13 ;$i++)
					{
						
                     echo '<option value="'.$i.'">'.$i.'</option>';
						
					}
					?>
                    </select>
                  </p>
                </div>
              </DIV>
                 <?php
			  }
			 
			  if($s_child2  == 2 || $s_child2  == 3)
			  {
			  ?>
              <DIV class="check_149"  id="age32" >
                <div class="AGE_OF2">Age Of Child 2</div>
                <div class="wi40 padding_le">
                  <p></p>
                  <p>
                    <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
                      <?php for($i=1;$i< 13 ;$i++)
					{
						if($_SESSION['child_age'][7] == $i)
						{
                     echo '<option selected="selected" value="'.$i.'">'.$i.'</option>';
						}
						else
						{
                     echo '<option value="'.$i.'">'.$i.'</option>';
						}
					}
					?>
                    </select>
                  </p>
                </div>
              </DIV>
              <?php
			  }
			  else
			  {
				  ?><DIV class="check_149"  id="age32"  style="display:none;">
                <div class="AGE_OF2">Age Of Child 2</div>
                <div class="wi40 padding_le">
                  <p></p>
                  <p>
                    <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
                     <?php for($i=1;$i< 13 ;$i++)
					{
						
                     echo '<option value="'.$i.'">'.$i.'</option>';
						
					}
					?>
                    </select>
                  </p>
                </div>
              </DIV>
                  <?php
			  }
			  ?>
              <?php
              if( $s_child2  == 3)
			  { 	
				  ?>
              <DIV class="check_149"  id="age33" >
                <div class="AGE_OF2">Age Of Child 3</div>
                <div class="wi40 padding_le">
                  <p></p>
                  <p>
                    <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
                      <?php for($i=1;$i< 13 ;$i++)
					{
						if($_SESSION['child_age'][8] == $i)
						{
                     echo '<option selected="selected" value="'.$i.'">'.$i.'</option>';
						}
						else
						{
                     echo '<option value="'.$i.'">'.$i.'</option>';
						}
					}
					?>
                    </select>
                  </p>
                </div>
              </DIV>
            <?php
			  }
			  else
			  {
			  ?>
              <DIV class="check_149"  id="age33"  style="display:none;">
                <div class="AGE_OF2">Age Of Child 3</div>
                <div class="wi40 padding_le">
                  <p></p>
                  <p>
                    <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
                    <?php for($i=1;$i< 13 ;$i++)
					{
						
                     echo '<option value="'.$i.'">'.$i.'</option>';
						
					}
					?>
                    </select>
                  </p>
                </div>
              </DIV>
              <?php
			  }
			  ?>
              
          </div>
          <?php
						}
						else
						{
							?>
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
                <div class="AGE_OF2">Age Of Child 1</div>
                <div class="wi40 padding_le">
                  <p></p>
                  <p>
                    <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1"  >
                    <?php for($i=1;$i< 13 ;$i++)
					{
						
                     echo '<option value="'.$i.'">'.$i.'</option>';
						
					}
					?>
                    </select>
                  </p>
                </div>
              </DIV>
              <DIV class="check_149"  id="age32"  style="display:none;">
                <div class="AGE_OF2">Age Of Child 2</div>
                <div class="wi40 padding_le">
                  <p></p>
                  <p>
                    <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
                     <?php for($i=1;$i< 13 ;$i++)
					{
						
                     echo '<option value="'.$i.'">'.$i.'</option>';
						
					}
					?>
                    </select>
                  </p>
                </div>
              </DIV>
              <DIV class="check_149"  id="age33"  style="display:none;">
                <div class="AGE_OF2">Age Of Child 3</div>
                <div class="wi40 padding_le">
                  <p></p>
                  <p>
                    <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
                   <?php for($i=1;$i< 13 ;$i++)
					{
						
                     echo '<option value="'.$i.'">'.$i.'</option>';
						
					}
					?>
                    </select>
                  </p>
                </div>
              </DIV>
              
          </div><?php
						}
						?>
        
                                        
                                        
                                               
                                                
                                            
                                                
                                                </div>
  <p style="color:#FFF; font-size:12px; padding-right:10px; padding-bottom:20px;"><input type="image" src="<?php echo WEB_DIR; ?>images/search_bt.png" width="83" height="27" border="0" align="right" /></p>
  </form>
  <p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
 
  </div>
  
  <div class="serachbarbg"></div>
  <br />
  <div class="left_pannel_head_ruby">
  <form  name="leftfilter"  id="hotels-results-form">
      <div class="">
           		<?php /*?><div class="wi159"><a id="reset_filter" href=""  style="color:#09F; text-decoration:none; text-align:center;margin-left: 63px; font-weight:bold; ">Reset Filters </a></div><?php */?>
                                            <div class="wi159"><img src="<?php echo WEB_DIR; ?>images/title-filter-engine.png" />
                                          <div class="arrow">
                                            	<div class="arrow_down"></div>
                                                <div class="wi120">By Price (Per Night)</div>
                                            	</div>
                                              <!-- <div class="price_rate"><span class="pw7">Price</span>: 150 € - 500 €</div>
                                                <div class="jq_bg"><img src="<?php //echo WEB_DIR ?>images/jquery_img.jpg" width="140" height="17" /></div> -->
                                                <p>
   <input type="text" id="amount_dummy" style="border:0; background-color:#dee5eb; color:#999;    width: 207px; text-align:center;" />
      <input type="hidden" id="amount" style="border:0; color:#f6931f; font-weight:bold; width: 228px;" />
   </p>
  
  											<div id="slider-range"></div>
                                                
                                                
                                      </div>
                                      <div class="wi159">
                                          <div class="arrow">
                                            	<div class="arrow_down"></div>
                                                <div class="wi120">By Star Rating</div>
                                            	</div>
                                             <!-- <div class="price_rate"><span class="pw7">Star Rating:</span>: 150 € - 500 €</div>
                                                <div class="jq_bg"><img src="<?php echo WEB_DIR ?>images/jquery_img.jpg" width="140" height="17" /></div>-->
             <input type="text" id="amoussdsnt_dummy" style="border:0; background-color:#dee5eb; color:#999;    width: 207px; text-align:center;" />                                      <p>
   <input type="text" id="star" style="border:0;  background-color:#dee5eb; color:#999;  width:207px; text-align:center;" />
   <br /></p>
  
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
										<div id="hotel_facility">
                                       <div class="hotel_cover">
                                         	<div class="check_box_cover"><input type="checkbox" name="hotel_fac_val" oonclick="javascript:hotel_fac_sorting()"  value="WLAN" id="1" /></div>
                                            <div class="hotel_cover47">Wi-Fi</div><div class="wi56"></div>
                                         </div>
                                         <div class="hotel_cover">
                                         	<div class="check_box_cover"><input type="checkbox" name="hotel_fac_val" oonclick="javascript:hotel_fac_sorting()"  value="park" id="2" /></div>
                                            <div class="hotel_cover47">Parking</div><div class="wi56"></div>
                                         </div>
                                          <div class="hotel_cover">
                                         	<div class="check_box_cover"><input type="checkbox" name="hotel_fac_val" oonclick="javascript:hotel_fac_sorting()"  value="bar" id="3" /></div>
                                            <div class="hotel_cover47">Bar </div><div class="wi56"></div>
                                         </div>
                                          <div class="hotel_cover">
                                         	<div class="check_box_cover"><input type="checkbox" name="hotel_fac_val" oonclick="javascript:hotel_fac_sorting()"  value="internet" id="4" /></div>
                                            <div class="hotel_cover47">Internet Services</div><div class="wi56"></div>
                                         </div>
                                          <div class="hotel_cover">
                                         	<div class="check_box_cover"><input type="checkbox" name="hotel_fac_val" oonclick="javascript:hotel_fac_sorting()"  value="gym" id="5" /></div>
                                            <div class="hotel_cover47">Fitness Centre</div><div class="wi56"></div>
                                         </div>
                                          
                                          <div class="hotel_cover">
                                         	<div class="check_box_cover"><input type="checkbox" name="hotel_fac_val" oonclick="javascript:hotel_fac_sorting()"  value="pool" id="6" /></div>
                                            <div class="hotel_cover47">Indoor Swimming Pool </div><div class="wi56"></div>
                                         </div>
                                          
                                          <div class="hotel_cover">
                                         	<div class="check_box_cover"><input type="checkbox" name="hotel_fac_val" oonclick="javascript:hotel_fac_sorting()"  value="petsallowed" id="7" /></div>
                                            <div class="hotel_cover47">Pets Allowed</div><div class="wi56"></div>
                                         </div>
                                          <div class="hotel_cover">
                                         	<div class="check_box_cover"><input type="checkbox" name="hotel_fac_val" oonclick="javascript:hotel_fac_sorting()"  value="restaurant" id="8" /></div>
                                            <div class="hotel_cover47">Restaurant</div><div class="wi56"></div>
                                         </div>
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
  </div>

  </div>
    <div class="mainbody">
    <div class="searchlinks">
    <div class="searchlinkstext">
     <?php
										$city=explode(",",$_SESSION['city']);
									
$con =  strtr(base64_encode($city[1]),array('+' => '.','=' => '-','/' => '~'));										?>	
    <p style="padding-left:15px;"><a href="javascript:void(0);" class="home_link">Home</a> / <a href="<?php echo WEB_URL.'hotel/country_search/'.$con; ?>" class="home_link"><?php echo $city[1]; ?></a> / <a href="javascript:void(0);" class="home_link"><?php echo $city[0]; ?></a></p>
    </div>
    <div class="searchlinksphone"><span style="padding-left:10px; font-family:MAIAN;">Have A Question</span> <span style="padding-left:70px; font-family:MAIAN;"><strong>Call 257 88 777</strong></span></div>
    </div>
    <div style="width:725px;">
   
    <div style="width:600px; float:left;"><h1><div id="result_count" style='float:left;'></div>&nbsp; Hotels Available in <?php echo$_SESSION['city']; ?> </h1></div>
    <div style="width:100px; float:right; margin-top:20px; font-family:MAIAN;"><img src="<?php echo WEB_DIR; ?>images/map_icon.png" width="22" height="22" align="top" /> <a style="color:#06F; text-decoration:none;" href="<?php print WEB_URL.'hotel/mapping_fun_all/'; ?> "  onclick="$('#rlightbox').show();" target="rlight_box" class="text3">Showmap</a></div>
    </div>
    <h1>&nbsp;</h1>
    <div class="sortby">
      <div class="sortbytext">Sort BY:</div>
    <div class="sortbytextrate"><a href="javascript:void(0);"  id="price_asc"><img src="<?php echo WEB_DIR; ?>images/uparror.png" width="8" height="10" /></a><span class="pricespace">Price</span><a href="javascript:void(0);"  id='price_desc'><img src="<?php echo WEB_DIR; ?>images/downarror.png" width="8" height="10" /></a></div>
    <div class="sortbytextrateone"><a href="javascript:void(0);"  id="star_asc" oonclick="javascript:return  hotel_fac_sorting('star_asc')" ><img src="<?php echo WEB_DIR; ?>images/uparror.png" width="8" height="10" /></a><span class="pricespace">Star Rating</span><a href="javascript:void(0);"  id="star_desc" oonclick="javascript:return  hotel_fac_sorting('star_desc')"><img src="<?php echo WEB_DIR; ?>images/downarror.png" width="8" height="10" /></a></div>
    <div class="sortbytextrateone"><a href="javascript:void(0);"  id="name_asc" oonclick="javascript:return  hotel_fac_sorting('name_asc')"><img src="<?php echo WEB_DIR; ?>images/uparror.png" width="8" height="10" /></a><span class="pricespace">Hotel Name</span><a href="javascript:void(0);"  id="name_desc" oonclick="javascript:return  hotel_fac_sorting('name_desc')"><img src="<?php echo WEB_DIR; ?>images/downarror.png" width="8" height="10" /></a></div>
  <style>
ull {
  font-family: Arial, Verdana;
  font-size: 14px;
  margin: 0;
  padding: 0;
  list-style: none;
}
ull lil {
  display: block;
  position: relative;
  float: left;
}
lil ull { display: none; }
ull lil a {
  display: block;
  text-decoration: none;
 
  padding: 9px 3px;
  font-size:13px;
 
  margin-left: 1px;
  white-space: nowrap;
}
ull lil a:hover {
	border-top:#0099ff solid 1px;
	
	 background:#bee6ff }
lil:hover ull {
  display: block;
  position: absolute;
}
lil:hover lil {
  float: none;
  font-size: 11px;
}
lil:hover a { background: #bee6ff; }
lil:hover lil a:hover { background:#0099ff }
</style>  <div class="sortbytextrate"><span class="pricespace">
 <ull id="menu">
  
 <lil><a href="">Currency</a>
    <ull>
    <lil style=" width:60px"><a href="<?php echo WEB_URL.'hotel/currency_convertion/USD'; ?>">USD</a></lil>
    <lil style=" width:60px"><a href="<?php echo WEB_URL.'hotel/currency_convertion/GBP'; ?>">GBP</a></lil>
    <lil style=" width:60px"><a href="<?php echo WEB_URL.'hotel/currency_convertion/AUD'; ?>">AUD</a></lil>
     <lil style=" width:60px"><a href="<?php echo WEB_URL.'hotel/currency_convertion/THB'; ?>">THB</a></lil>

    </ull>
  </lil>
</ull>
 
  
   
    </span></div>
    <div class="nextpage"><div class="pagination" style="line-height:17px; padding-top:7px; padding-left:4px;">
             <div class="data"></div>
				
			</div></div>
    <div class="contents" id="result" >
			<div style="padding-left:325px; padding-top:55px" >
			<img src="<?php echo WEB_DIR ?>gui/images/loading.gif" />
			</div>
		</div>
        <div style="display:none" id="noresult">
       <div class="" style=" float:left; padding-left:5px"> 
  <div style="background-attachment: scroll;
  font-family:Maian;
background-clip: border-box;
background-color: transparent;
background-image: none;
background-origin: padding-box;
clear: right;
color: #555;
display: block;

font-size: 12px;
font-style: normal;
font-variant: normal;
font-weight: normal;
height: 110px;
line-height: 16px;
margin-bottom: 0px;
margin-left: 0px;
margin-right: 0px;
margin-top: 0px;
overflow-x: hidden;
overflow-y: hidden;
padding-bottom: 10px;
padding-left: 10px;
padding-right: 0px;
padding-top: 10px;
position: relative;
width: 699px;">
  <div style="background-attachment: scroll;
background-clip: border-box;
background-color: transparent;
background-image: none;
background-origin: padding-box;
color: #555;
display: block;

font-size: 12px;
font-style: normal;
font-variant: normal;
font-weight: normal;
height: 116px;
line-height: 16px;
margin-bottom: 0px;
margin-left: 0px;
margin-right: 0px;
margin-top: 0px;
padding-bottom: 0px;
padding-left: 0px;
padding-right: 0px;
padding-top: 0px;
width: 691px;">
    <div style="background-attachment: scroll;
background-clip: border-box;
background-color: transparent;
background-image: none;
background-origin: padding-box;
border-bottom-color: #BFBFBF;
border-bottom-style: solid;
border-bottom-width: 1px;
border-left-color: #BFBFBF;
border-left-style: solid;
border-left-width: 1px;
border-right-color: #BFBFBF;
border-right-style: solid;
border-right-width: 1px;
border-top-color: #BFBFBF;
border-top-style: solid;
border-top-width: 1px;
color: #555;
display: block;

font-size: 12px;
font-style: normal;
font-variant: normal;
font-weight: normal;
height: 100px;

line-height: 16px;
margin-bottom: 10px;
margin-left: 0px;
margin-right: 0px;
margin-top: 0px;
padding-bottom: 1px;
padding-left: 1px;
text-align:center;
padding-right: 1px;
padding-top: 5px;
width: 691px;">
  <table width="100%">
    <tbody>
      <tr>
       
        <td align="center"  style="font-size:16px">
          <strong>No records found!!!    Please try again in few moments</strong></td>
      </tr>
      <tr><td>&nbsp;</td></tr>
      <tr><td align="left"><div>
      <strong>What now? Call us and we'll help you find a hotel:</strong>
     <br />
          Speak to a Stayaway.com travel specialist: <strong>257 88 777 (India Toll Free) +91 124 487 3878 (From abroad)</strong>,&nbsp;24 Hours,&nbsp;toll free
        
    </div>
    </td></tr>
    </tbody>
  </table>
</div>
  </div>
  <div class="paginationContainerBottom notVisible">
    <div class="paginationContainerBottom notVisible">
      </div>
  </div>
  <div class="notificationMsg">
    <p id="disclaimer">
      </p>
    </div>
</div><br /></div>
        </div>
  </div>
  </div>
</div><div style="clear:both"></div>
<?php $this->load->view('footer'); ?>
</body>
</html>
 