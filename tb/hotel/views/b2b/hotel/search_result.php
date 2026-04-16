<?php //echo "hiiiiiiiiiiiiiiiiiiiiiiiiiiii";exit;?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Travel Bay</title>


<link href="<?php echo WEB_DIR; ?>designAccess/css/travel_bay_stylesheet.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo WEB_DIR; ?>designAccess/engine1/style.css" />

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
h2 {
font-size: 15px;	
}
.wi40{
	width: 54px;
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
						$( "#amount" ).val( "<?php echo $this->session->userdata('currency_type');?> " + ui.values[ 0 ] + " - <?php echo $this->session->userdata('currency_type');?> " + ui.values[ 1 ] );
					}
				});
				$( "#amount" ).val( "<?php echo $this->session->userdata('currency_type');?> " + $( "#slider-range" ).slider( "values", 0 ) +
					" - <?php echo $this->session->userdata('currency_type');?> " + $( "#slider-range" ).slider( "values", 1 ) );
					
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
				  url:'<?php echo WEB_URL; ?>b2b_hotel/fetch_search_result/',
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
						$( "#amount" ).val( "<?php echo $this->session->userdata('currency_type');?>  " + r + "  to  <?php echo $this->session->userdata('currency_type');?> " + rr );
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
					$('#result').html('<p class="error" style="padding:140px"><strong>No records found!!!    Please try again in few moments...</strong></p>');
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
		  url:'<?php echo WEB_URL; ?>b2b_hotel/call_api/'+a[i],
		  //url:'<?php echo WEB_URL; ?>hotel/ajaxcall',
		  data: '',
		  dataType: "json",
		  beforeSend:function(){
		  	//alert("helllooo");
			// this is where we append a loading image
			//$('#loading').html('<div  style=" padding-top:22px;"  class="loading" ><img width="253" height="31" src="<?php echo WEB_DIR; ?>gui/images/loading_bar_animated.gif" alt="Loading..." /><br><div class="bottom-header" style="padding-left:105px">Loading</div></div>');
			//$('#loading_image').fadeIn();
		  },
		  success: function(data){ //alert(data);
			  $('#preloading_div').fadeOut('slow');
			  $('#black_grid').fadeOut('slow'); 
			  i++;
			  nextCall();      
			  if(data.hotel_search_result == false || data.hotel_search_result == null)
			  {
				 $('#noresult').fadeIn();
			  }
			$('#result').html(data.hotel_search_result);
			  
			//$(".pagination").html(data.paging); 
			//alert(data.total_result);
			if(data.total_result == null){
			$('#result').html('<p class="error" style="padding:140px"><strong>No records found!!! Please try again in few moments...</strong></p>');
			}
			$("#result_count").html(data.total_result);

$("#p_0").html(data.p_0);
$("#p_1").html(data.p_1);
$("#p_2").html(data.p_2);
$("#p_3").html(data.p_3);
$("#p_4").html(data.p_4);
			
$("#p_00").html(data.p_00);
$("#p_10").html(data.p_10);
$("#p_20").html(data.p_20);
$("#p_30").html(data.p_30);
$("#p_40").html(data.p_40);

$("#p_01").html(data.p_01);
$("#p_11").html(data.p_11);
$("#p_21").html(data.p_21);
$("#p_31").html(data.p_31);
$("#p_41").html(data.p_41);

$("#p_02").html(data.p_02);
$("#p_12").html(data.p_12);
$("#p_22").html(data.p_22);
$("#p_32").html(data.p_32);
$("#p_42").html(data.p_42);

$("#p_03").html(data.p_03);
$("#p_13").html(data.p_13);
$("#p_23").html(data.p_23);
$("#p_33").html(data.p_33);
$("#p_43").html(data.p_43);

$("#p_04").html(data.p_04);
$("#p_14").html(data.p_14);
$("#p_24").html(data.p_24);
$("#p_34").html(data.p_34);
$("#p_44").html(data.p_44);

$("#p_05").html(data.p_05);
$("#p_15").html(data.p_15);
$("#p_25").html(data.p_25);
$("#p_35").html(data.p_35);
$("#p_45").html(data.p_45);

$("#p_06").html(data.p_06);
$("#p_16").html(data.p_16);
$("#p_26").html(data.p_26);
$("#p_36").html(data.p_36);
$("#p_46").html(data.p_46);

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
						$( "#amount_dummy" ).val( "<?php echo $this->session->userdata('currency_type');?> " + ui.values[ 0 ] + "  to  <?php echo $this->session->userdata('currency_type');?> " + ui.values[ 1 ] );
						$( "#amount" ).val( "<?php echo $this->session->userdata('currency_type');?>" + r + "  to  <?php echo $this->session->userdata('currency_type');?> " + rr );
					},
					  change: function( event, ui ) {
					  if (event.originalEvent) {
					  	filterSearch('price');
                        loadData(1);  // For first time page load default results
                       
					  }
					}
				});
				$( "#amount_dummy" ).val( "<?php echo $this->session->userdata('currency_type');?> " + $( "#slider-range" ).slider( "values", 0 ) +
					"  to <?php echo $this->session->userdata('currency_type');?> " + $( "#slider-range" ).slider( "values", 1 ) );
					
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
			$('#result').html('<p class="error" style="padding:140px"><strong>No records found!!! Please try again in few moments...</strong></p>');
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
                                url: "<?php echo WEB_URL.'b2b_hotel/pagination_call'; ?>",
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
				  url:'<?php echo WEB_URL; ?>b2b_hotel/fetch_search_result_filter/',
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
					$( "#amount_dummy" ).val( "<?php echo $this->session->userdata('currency_type');?> " + r + "  to  <?php echo $this->session->userdata('currency_type');?> " + rr );*/
					
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
					$('#result').html('<p class="error" style="padding:140px"><strong>No records found!!! Please try again in few moments...</strong></p>');
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
     url: '<?php echo WEB_URL.'b2b_hotel/fetch_search_result_map'; ?>',
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
			
		xmlhttp.open("POST","<?php print WEB_URL ?>b2b_hotel/all_filter_new1/"+params,true);
        //xmlhttp.open("POST","<?php print WEB_URL ?>b2b_hotel/all_filter_new1/"+id,true);
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
<div id="small_preloader" align="center" style="display:none;"><h1>Loading your Request......</h1></div>
<div id="preloading_div" align="center" >
<!--<img src="<?php echo WEB_DIR; ?>images/logo.png" id="preload_logo" style="margin-left:-60px;"><br />
<img src="<?php echo WEB_DIR; ?>images/loading-bar.gif" id="preload_load" />-->

<div id="preload_Msg">  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size:13px;">
  <tr>
    <td>&nbsp;</td>
    <td align="center" valign="middle"><table width="618" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="616" height="84" align="center" valign="top"><img src="<?php print WEB_DIR; ?>designAccess/images/travel_bay_logo.png" width="300" height="80" /></td>
      </tr>
      <tr>
        <td height="30" align="center" valign="baseline" class="underline">&nbsp;</td>
      </tr>
      <tr>
        <td height="30" align="center" valign="baseline" class="text" style="font-size:14px;"><p>Please do not refresh the screen or press backspace key , as we are currently searching for the</p>
          <p> &quot;Best Priced Hotels&quot; for you</p></td>
      </tr>
      <tr>
        <td height="100" align="center" valign="middle">
        <img src="<?php echo WEB_DIR ?>images/loading-bar.gif" width="197" height="34"/>
        </td>
      </tr>
      <tr>
        <td height="30" align="center" valign="baseline"><table width="90%" border="0" align="center" cellpadding="0" cellspacing="4">
          <tr>
            <td align="left" class="text">City </td>
            <td align="left" class="text">Check in date</td>
            <td align="left" class="text">Check out date.</td>
              
          </tr>
          <tr>
            <td align="left" class="textBlack"><?php echo $_SESSION['city']; ?></td>
            <td align="left" class="textBlack"><?php print $_SESSION['sd']; ?></td>
            <td align="left" class="textBlack"><?php print $_SESSION['ed']; ?></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="30" align="center" valign="baseline">&nbsp;</td>
      </tr>
    </table></td>
    <td>&nbsp;</td>
  </tr>
</table></div>

</div>
<div id="black_grid" >&nbsp;</div>

<?php $this->load->view('b2b/header'); ?>
<div class="midlebody">

  <div class="lhsside">
  

  <div class="serachbar">
  
  <div class="hotellist">  
  <div style="width:25px; padding:4px; height:25px; float:left; "  id="loading_image">
  
  <img src="<?php echo WEB_DIR; ?>images/276486.gif"  width="35" /></div>
    <div style="width:25px; padding:4px; height:25px; display:none; float:left; "  id="loading_imagea">
  
<img src="<?php echo WEB_DIR; ?>images/load_c.png"  width="35" /></div>

    <p style="color:#FFF; font-size:13px;"><span style="font-size:18px;	">Hotels starting at</span> <br />
      <?php echo $this->session->userdata('currency_type');?> <span style="font-size:40px;"><span id="priceStarts"> <img src="<?php echo WEB_DIR; ?>images/276491.gif"   /></span></span><br />
    Avg Per Night</p>
  </div>
  <form name="search_result" action="<?php echo WEB_URL; ?>b2b_hotel/search"  onsubmit="javascript:return form_sub();" method="post">
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
		xmlhttp.open("GET","<?php print WEB_URL ?>b2b_hotel/child_dd_single/",true);
		xmlhttp.send();
	}
	else if(adult==2)
	{
		 document.getElementById('inputfiled1_1').style.display='block'; 
		  document.getElementById('child_header').style.display='block'; 
		  document.getElementById('age1').style.display='none'; 
			  document.getElementById('age12').style.display='none'; 
			    document.getElementById('age13').style.display='none'; 
		xmlhttp.open("GET","<?php print WEB_URL ?>b2b_hotel/child_dd_double/",true);
		xmlhttp.send();
	}
	else if(adult==3)
	{
		 document.getElementById('inputfiled1_1').style.display='block'; 
		  document.getElementById('child_header').style.display='block';
		  document.getElementById('age1').style.display='none'; 
			  document.getElementById('age12').style.display='none'; 
			    document.getElementById('age13').style.display='none';  
		xmlhttp.open("GET","<?php print WEB_URL ?>b2b_hotel/child_dd_triple/",true);
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
		xmlhttp.open("GET","<?php print WEB_URL ?>b2b_hotel/child_dd_single/",true);
		xmlhttp.send();
	}
	else if(adult==2)
	{
		 document.getElementById('inputfiled1_2').style.display='block'; 
		  document.getElementById('child_header2').style.display='block'; 
		   document.getElementById('age2').style.display='none'; 
			  document.getElementById('age22').style.display='none'; 
			    document.getElementById('age23').style.display='none'; 
		xmlhttp.open("GET","<?php print WEB_URL ?>b2b_hotel/child_dd_double/",true);
		xmlhttp.send();
	}
	else if(adult==3)
	{
		 document.getElementById('inputfiled1_2').style.display='block'; 
		  document.getElementById('child_header2').style.display='block'; 
		   document.getElementById('age2').style.display='none'; 
			  document.getElementById('age22').style.display='none'; 
			    document.getElementById('age23').style.display='none'; 
		xmlhttp.open("GET","<?php print WEB_URL ?>b2b_hotel/child_dd_triple/",true);
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
		xmlhttp.open("GET","<?php print WEB_URL ?>b2b_hotel/child_dd_single/",true);
		xmlhttp.send();
	}
	else if(adult==2)
	{
		 document.getElementById('inputfiled1_3').style.display='block'; 
		  document.getElementById('child_header3').style.display='block';
		  	   document.getElementById('age3').style.display='none'; 
			  document.getElementById('age32').style.display='none'; 
			    document.getElementById('age33').style.display='none';  
		xmlhttp.open("GET","<?php print WEB_URL ?>b2b_hotel/child_dd_double/",true);
		xmlhttp.send();
	}
	else if(adult==3)
	{
		 document.getElementById('inputfiled1_3').style.display='block'; 
		  document.getElementById('child_header3').style.display='block'; 
		  	   document.getElementById('age3').style.display='none'; 
			  document.getElementById('age32').style.display='none'; 
			    document.getElementById('age33').style.display='none'; 
		xmlhttp.open("GET","<?php print WEB_URL ?>b2b_hotel/child_dd_triple/",true);
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
  <input type="hidden" name="hotel_name" value="" />
    <input type="hidden" name="star_rate" value="all" />
        <!--<input type="hidden" name="country" value="<?php echo $_SESSION['nationality']; ?>" />-->
<input   value="<?php echo $next_dte; ?>"   readonly="readonly"  name="ed" id="datepicker1" type="text" class="check_bg_2" />
  <p style="color:#FFF; font-size:12px;"></p>
  
 </div>
  <div class="room_bor_bottom">
                                                <div class="modifi_search">
        <div class="wi102_0">
        <p  style="color: #FFFFFF;
        font-size: 12px;">Room</p>
        <p>  
        <script type="text/javascript">
function display_adult_count(value)
{
if(value==1)
{
document.getElementById('room1').style.display='block'; 
document.getElementById('room2').style.display='none'; 
document.getElementById('room3').style.display='none'; 
document.getElementById('room4').style.display='none'; 
document.getElementById('room5').style.display='none'; 
document.getElementById('room6').style.display='none'; 
document.getElementById('room7').style.display='none'; 
document.getElementById('room8').style.display='none'; 
document.getElementById('room9').style.display='none'; 
document.getElementById('room10').style.display='none'; 
}
if(value==2)
{
document.getElementById('room1').style.display='block'; 
document.getElementById('room2').style.display='block'; 
document.getElementById('room3').style.display='none';
document.getElementById('room4').style.display='none'; 
document.getElementById('room5').style.display='none'; 
document.getElementById('room6').style.display='none'; 
document.getElementById('room7').style.display='none'; 
document.getElementById('room8').style.display='none'; 
document.getElementById('room9').style.display='none'; 
document.getElementById('room10').style.display='none'; 
}
if(value==3)
{
document.getElementById('room1').style.display='block'; 
document.getElementById('room2').style.display='block'; 
document.getElementById('room3').style.display='block';
document.getElementById('room4').style.display='none'; 
document.getElementById('room5').style.display='none'; 
document.getElementById('room6').style.display='none'; 
document.getElementById('room7').style.display='none'; 
document.getElementById('room8').style.display='none'; 
document.getElementById('room9').style.display='none'; 
document.getElementById('room10').style.display='none'; 
}
if(value==4)
{
document.getElementById('room1').style.display='block'; 
document.getElementById('room2').style.display='block'; 
document.getElementById('room3').style.display='block';
document.getElementById('room4').style.display='block'; 
document.getElementById('room5').style.display='none'; 
document.getElementById('room6').style.display='none'; 
document.getElementById('room7').style.display='none'; 
document.getElementById('room8').style.display='none'; 
document.getElementById('room9').style.display='none'; 
document.getElementById('room10').style.display='none'; 
}
if(value==5)
{
document.getElementById('room1').style.display='block'; 
document.getElementById('room2').style.display='block'; 
document.getElementById('room3').style.display='block';
document.getElementById('room4').style.display='block'; 
document.getElementById('room5').style.display='block'; 
document.getElementById('room6').style.display='none'; 
document.getElementById('room7').style.display='none'; 
document.getElementById('room8').style.display='none'; 
document.getElementById('room9').style.display='none'; 
document.getElementById('room10').style.display='none'; 
}
if(value==6)
{
document.getElementById('room1').style.display='block'; 
document.getElementById('room2').style.display='block'; 
document.getElementById('room3').style.display='block';
document.getElementById('room4').style.display='block'; 
document.getElementById('room5').style.display='block'; 
document.getElementById('room6').style.display='block'; 
document.getElementById('room7').style.display='none'; 
document.getElementById('room8').style.display='none'; 
document.getElementById('room9').style.display='none'; 
document.getElementById('room10').style.display='none'; 
}
if(value==7)
{
document.getElementById('room1').style.display='block'; 
document.getElementById('room2').style.display='block'; 
document.getElementById('room3').style.display='block';
document.getElementById('room4').style.display='block'; 
document.getElementById('room5').style.display='block'; 
document.getElementById('room6').style.display='block'; 
document.getElementById('room7').style.display='block'; 
document.getElementById('room8').style.display='none'; 
document.getElementById('room9').style.display='none'; 
document.getElementById('room10').style.display='none'; 
}
if(value==8)
{
document.getElementById('room1').style.display='block'; 
document.getElementById('room2').style.display='block'; 
document.getElementById('room3').style.display='block';
document.getElementById('room4').style.display='block'; 
document.getElementById('room5').style.display='block'; 
document.getElementById('room6').style.display='block'; 
document.getElementById('room7').style.display='block'; 
document.getElementById('room8').style.display='block'; 
document.getElementById('room9').style.display='none'; 
document.getElementById('room10').style.display='none'; 
}
if(value==9)
{
document.getElementById('room1').style.display='block'; 
document.getElementById('room2').style.display='block'; 
document.getElementById('room3').style.display='block';
document.getElementById('room4').style.display='block'; 
document.getElementById('room5').style.display='block'; 
document.getElementById('room6').style.display='block'; 
document.getElementById('room7').style.display='block'; 
document.getElementById('room8').style.display='block'; 
document.getElementById('room9').style.display='block'; 
document.getElementById('room10').style.display='none'; 
}
if(value==10)
{
document.getElementById('room1').style.display='block'; 
document.getElementById('room2').style.display='block'; 
document.getElementById('room3').style.display='block';
document.getElementById('room4').style.display='block'; 
document.getElementById('room5').style.display='block'; 
document.getElementById('room6').style.display='block'; 
document.getElementById('room7').style.display='block'; 
document.getElementById('room8').style.display='block'; 
document.getElementById('room9').style.display='block'; 
document.getElementById('room10').style.display='block'; 
}
}

function display_child_count(value)
{
if(value==1)
{
	document.getElementById('age1').style.display='block'; 
	document.getElementById('age12').style.display='none'; 
	document.getElementById('age13').style.display='none'; 
	document.getElementById('age14').style.display='none'; 
	document.getElementById('age15').style.display='none'; 
	document.getElementById('age16').style.display='none'; 
}
if(value==2)
{
	document.getElementById('age1').style.display='block'; 
	document.getElementById('age12').style.display='block'; 
	document.getElementById('age13').style.display='none'; 
	document.getElementById('age14').style.display='none'; 
	document.getElementById('age15').style.display='none'; 
	document.getElementById('age16').style.display='none'; 
}
if(value==3)
{
	document.getElementById('age1').style.display='block'; 
	document.getElementById('age12').style.display='block';  
	document.getElementById('age13').style.display='block'; 
	document.getElementById('age14').style.display='none'; 
	document.getElementById('age15').style.display='none'; 
	document.getElementById('age16').style.display='none'; 
}
if(value==4)
{
	document.getElementById('age1').style.display='block'; 
	document.getElementById('age12').style.display='block';  
	document.getElementById('age13').style.display='block'; 
	document.getElementById('age14').style.display='block'; 
	document.getElementById('age15').style.display='none'; 
	document.getElementById('age16').style.display='none'; 
}
if(value==5)
{
	document.getElementById('age1').style.display='block'; 
	document.getElementById('age12').style.display='block';  
	document.getElementById('age13').style.display='block'; 
	document.getElementById('age14').style.display='block'; 
	document.getElementById('age15').style.display='block'; 
	document.getElementById('age16').style.display='none'; 
}
if(value==6)
{
	document.getElementById('age1').style.display='block'; 
	document.getElementById('age12').style.display='block';  
	document.getElementById('age13').style.display='block'; 
	document.getElementById('age14').style.display='block'; 
	document.getElementById('age15').style.display='block'; 
	document.getElementById('age16').style.display='block'; 
}
if(value==0)
{
	document.getElementById('age1').style.display='none'; 
	document.getElementById('age12').style.display='none'; 
	document.getElementById('age13').style.display='none'; 
	document.getElementById('age14').style.display='none'; 
	document.getElementById('age15').style.display='none'; 
	document.getElementById('age16').style.display='none'; 
}

}

function display_child_count1(value)
{
if(value==1)
{
	document.getElementById('age2').style.display='block'; 
	document.getElementById('age22').style.display='none'; 
	document.getElementById('age23').style.display='none'; 
	document.getElementById('age24').style.display='none'; 
	document.getElementById('age25').style.display='none'; 
	document.getElementById('age26').style.display='none'; 
}
if(value==2)
{
	document.getElementById('age2').style.display='block'; 
	document.getElementById('age22').style.display='block'; 
	document.getElementById('age23').style.display='none'; 
	document.getElementById('age24').style.display='none'; 
	document.getElementById('age25').style.display='none'; 
	document.getElementById('age26').style.display='none'; 
}
if(value==3)
{
	document.getElementById('age2').style.display='block'; 
	document.getElementById('age22').style.display='block';  
	document.getElementById('age23').style.display='block'; 
	document.getElementById('age24').style.display='none'; 
	document.getElementById('age25').style.display='none'; 
	document.getElementById('age26').style.display='none'; 
}
if(value==4)
{
	document.getElementById('age2').style.display='block'; 
	document.getElementById('age22').style.display='block';  
	document.getElementById('age23').style.display='block'; 
	document.getElementById('age24').style.display='block'; 
	document.getElementById('age25').style.display='none'; 
	document.getElementById('age26').style.display='none'; 
}
if(value==5)
{
	document.getElementById('age2').style.display='block'; 
	document.getElementById('age22').style.display='block';  
	document.getElementById('age23').style.display='block'; 
	document.getElementById('age24').style.display='block'; 
	document.getElementById('age25').style.display='block'; 
	document.getElementById('age26').style.display='none'; 
}
if(value==6)
{
	document.getElementById('age2').style.display='block'; 
	document.getElementById('age22').style.display='block';  
	document.getElementById('age23').style.display='block'; 
	document.getElementById('age24').style.display='block'; 
	document.getElementById('age25').style.display='block'; 
	document.getElementById('age26').style.display='block'; 
}
if(value==0)
{
	document.getElementById('age2').style.display='none'; 
	document.getElementById('age22').style.display='none'; 
	document.getElementById('age23').style.display='none'; 
	document.getElementById('age24').style.display='none'; 
	document.getElementById('age25').style.display='none'; 
	document.getElementById('age26').style.display='none'; 
}

}
function display_child_count2(value)
{
if(value==1)
{
	document.getElementById('age3').style.display='block'; 
	document.getElementById('age32').style.display='none'; 
	document.getElementById('age33').style.display='none'; 
	document.getElementById('age34').style.display='none'; 
	document.getElementById('age35').style.display='none'; 
	document.getElementById('age36').style.display='none'; 
}
if(value==2)
{
	document.getElementById('age3').style.display='block'; 
	document.getElementById('age32').style.display='block'; 
	document.getElementById('age33').style.display='none'; 
	document.getElementById('age34').style.display='none'; 
	document.getElementById('age35').style.display='none'; 
	document.getElementById('age36').style.display='none'; 
}
if(value==3)
{
	document.getElementById('age3').style.display='block'; 
	document.getElementById('age32').style.display='block';  
	document.getElementById('age33').style.display='block'; 
	document.getElementById('age34').style.display='none'; 
	document.getElementById('age35').style.display='none'; 
	document.getElementById('age36').style.display='none'; 
}
if(value==4)
{
	document.getElementById('age3').style.display='block'; 
	document.getElementById('age32').style.display='block';  
	document.getElementById('age33').style.display='block'; 
	document.getElementById('age34').style.display='block'; 
	document.getElementById('age35').style.display='none'; 
	document.getElementById('age36').style.display='none'; 
}
if(value==5)
{
	document.getElementById('age3').style.display='block'; 
	document.getElementById('age32').style.display='block';  
	document.getElementById('age33').style.display='block'; 
	document.getElementById('age34').style.display='block'; 
	document.getElementById('age35').style.display='block'; 
	document.getElementById('age36').style.display='none'; 
}
if(value==6)
{
	document.getElementById('age3').style.display='block'; 
	document.getElementById('age32').style.display='block';  
	document.getElementById('age33').style.display='block'; 
	document.getElementById('age34').style.display='block'; 
	document.getElementById('age35').style.display='block'; 
	document.getElementById('age36').style.display='block'; 
}
if(value==0)
{
	document.getElementById('age3').style.display='none'; 
	document.getElementById('age32').style.display='none'; 
	document.getElementById('age33').style.display='none'; 
	document.getElementById('age34').style.display='none'; 
	document.getElementById('age35').style.display='none'; 
	document.getElementById('age36').style.display='none'; 
}

}
function display_child_count3(value)
{
if(value==1)
{
	document.getElementById('age4').style.display='block'; 
	document.getElementById('age42').style.display='none'; 
	document.getElementById('age43').style.display='none'; 
	document.getElementById('age44').style.display='none'; 
	document.getElementById('age45').style.display='none'; 
	document.getElementById('age46').style.display='none'; 
}
if(value==2)
{
	document.getElementById('age4').style.display='block'; 
	document.getElementById('age42').style.display='block'; 
	document.getElementById('age43').style.display='none'; 
	document.getElementById('age44').style.display='none'; 
	document.getElementById('age45').style.display='none'; 
	document.getElementById('age46').style.display='none'; 
}
if(value==3)
{
	document.getElementById('age4').style.display='block'; 
	document.getElementById('age42').style.display='block';  
	document.getElementById('age43').style.display='block'; 
	document.getElementById('age44').style.display='none'; 
	document.getElementById('age45').style.display='none'; 
	document.getElementById('age46').style.display='none'; 
}
if(value==4)
{
	document.getElementById('age4').style.display='block'; 
	document.getElementById('age42').style.display='block';  
	document.getElementById('age43').style.display='block'; 
	document.getElementById('age44').style.display='block'; 
	document.getElementById('age45').style.display='none'; 
	document.getElementById('age46').style.display='none'; 
}
if(value==5)
{
	document.getElementById('age4').style.display='block'; 
	document.getElementById('age42').style.display='block';  
	document.getElementById('age43').style.display='block'; 
	document.getElementById('age44').style.display='block'; 
	document.getElementById('age45').style.display='block'; 
	document.getElementById('age46').style.display='none'; 
}
if(value==6)
{
	document.getElementById('age4').style.display='block'; 
	document.getElementById('age42').style.display='block';  
	document.getElementById('age43').style.display='block'; 
	document.getElementById('age44').style.display='block'; 
	document.getElementById('age45').style.display='block'; 
	document.getElementById('age46').style.display='block'; 
}
if(value==0)
{
	document.getElementById('age4').style.display='none'; 
	document.getElementById('age42').style.display='none'; 
	document.getElementById('age43').style.display='none'; 
	document.getElementById('age44').style.display='none'; 
	document.getElementById('age45').style.display='none'; 
	document.getElementById('age46').style.display='none'; 
}

}
function display_child_count4(value)
{
if(value==1)
{
	document.getElementById('age5').style.display='block'; 
	document.getElementById('age52').style.display='none'; 
	document.getElementById('age53').style.display='none'; 
	document.getElementById('age54').style.display='none'; 
	document.getElementById('age55').style.display='none'; 
	document.getElementById('age56').style.display='none'; 
}
if(value==2)
{
	document.getElementById('age5').style.display='block'; 
	document.getElementById('age52').style.display='block'; 
	document.getElementById('age53').style.display='none'; 
	document.getElementById('age54').style.display='none'; 
	document.getElementById('age55').style.display='none'; 
	document.getElementById('age56').style.display='none'; 
}
if(value==3)
{
	document.getElementById('age5').style.display='block'; 
	document.getElementById('age52').style.display='block';  
	document.getElementById('age53').style.display='block'; 
	document.getElementById('age54').style.display='none'; 
	document.getElementById('age55').style.display='none'; 
	document.getElementById('age56').style.display='none'; 
}
if(value==4)
{
	document.getElementById('age5').style.display='block'; 
	document.getElementById('age52').style.display='block';  
	document.getElementById('age53').style.display='block'; 
	document.getElementById('age54').style.display='block'; 
	document.getElementById('age55').style.display='none'; 
	document.getElementById('age56').style.display='none'; 
}
if(value==5)
{
	document.getElementById('age5').style.display='block'; 
	document.getElementById('age52').style.display='block';  
	document.getElementById('age53').style.display='block'; 
	document.getElementById('age54').style.display='block'; 
	document.getElementById('age55').style.display='block'; 
	document.getElementById('age56').style.display='none'; 
}
if(value==6)
{
	document.getElementById('age5').style.display='block'; 
	document.getElementById('age52').style.display='block';  
	document.getElementById('age53').style.display='block'; 
	document.getElementById('age54').style.display='block'; 
	document.getElementById('age55').style.display='block'; 
	document.getElementById('age56').style.display='block'; 
}
if(value==0)
{
	document.getElementById('age5').style.display='none'; 
	document.getElementById('age52').style.display='none'; 
	document.getElementById('age53').style.display='none'; 
	document.getElementById('age54').style.display='none'; 
	document.getElementById('age55').style.display='none'; 
	document.getElementById('age56').style.display='none'; 
}

}
function display_child_count5(value)
{
if(value==1)
{
	document.getElementById('age6').style.display='block'; 
	document.getElementById('age62').style.display='none'; 
	document.getElementById('age63').style.display='none'; 
	document.getElementById('age64').style.display='none'; 
	document.getElementById('age65').style.display='none'; 
	document.getElementById('age66').style.display='none'; 
}
if(value==2)
{
	document.getElementById('age6').style.display='block'; 
	document.getElementById('age62').style.display='block'; 
	document.getElementById('age63').style.display='none'; 
	document.getElementById('age64').style.display='none'; 
	document.getElementById('age65').style.display='none'; 
	document.getElementById('age66').style.display='none'; 
}
if(value==3)
{
	document.getElementById('age6').style.display='block'; 
	document.getElementById('age62').style.display='block';  
	document.getElementById('age63').style.display='block'; 
	document.getElementById('age64').style.display='none'; 
	document.getElementById('age65').style.display='none'; 
	document.getElementById('age66').style.display='none'; 
}
if(value==4)
{
	document.getElementById('age6').style.display='block'; 
	document.getElementById('age62').style.display='block';  
	document.getElementById('age63').style.display='block'; 
	document.getElementById('age64').style.display='block'; 
	document.getElementById('age65').style.display='none'; 
	document.getElementById('age66').style.display='none'; 
}
if(value==5)
{
	document.getElementById('age6').style.display='block'; 
	document.getElementById('age62').style.display='block';  
	document.getElementById('age63').style.display='block'; 
	document.getElementById('age64').style.display='block'; 
	document.getElementById('age65').style.display='block'; 
	document.getElementById('age66').style.display='none'; 
}
if(value==6)
{
	document.getElementById('age6').style.display='block'; 
	document.getElementById('age62').style.display='block';  
	document.getElementById('age63').style.display='block'; 
	document.getElementById('age64').style.display='block'; 
	document.getElementById('age65').style.display='block'; 
	document.getElementById('age66').style.display='block'; 
}
if(value==0)
{
	document.getElementById('age6').style.display='none'; 
	document.getElementById('age62').style.display='none'; 
	document.getElementById('age63').style.display='none'; 
	document.getElementById('age64').style.display='none'; 
	document.getElementById('age65').style.display='none'; 
	document.getElementById('age66').style.display='none'; 
}

}
function display_child_count6(value)
{
if(value==1)
{
	document.getElementById('age7').style.display='block'; 
	document.getElementById('age72').style.display='none'; 
	document.getElementById('age73').style.display='none'; 
	document.getElementById('age74').style.display='none'; 
	document.getElementById('age75').style.display='none'; 
	document.getElementById('age76').style.display='none'; 
}
if(value==2)
{
	document.getElementById('age7').style.display='block'; 
	document.getElementById('age72').style.display='block'; 
	document.getElementById('age73').style.display='none'; 
	document.getElementById('age74').style.display='none'; 
	document.getElementById('age75').style.display='none'; 
	document.getElementById('age76').style.display='none'; 
}
if(value==3)
{
	document.getElementById('age7').style.display='block'; 
	document.getElementById('age72').style.display='block';  
	document.getElementById('age73').style.display='block'; 
	document.getElementById('age74').style.display='none'; 
	document.getElementById('age75').style.display='none'; 
	document.getElementById('age76').style.display='none'; 
}
if(value==4)
{
	document.getElementById('age7').style.display='block'; 
	document.getElementById('age72').style.display='block';  
	document.getElementById('age73').style.display='block'; 
	document.getElementById('age74').style.display='block'; 
	document.getElementById('age75').style.display='none'; 
	document.getElementById('age76').style.display='none'; 
}
if(value==5)
{
	document.getElementById('age7').style.display='block'; 
	document.getElementById('age72').style.display='block';  
	document.getElementById('age73').style.display='block'; 
	document.getElementById('age74').style.display='block'; 
	document.getElementById('age75').style.display='block'; 
	document.getElementById('age76').style.display='none'; 
}
if(value==6)
{
	document.getElementById('age7').style.display='block'; 
	document.getElementById('age72').style.display='block';  
	document.getElementById('age73').style.display='block'; 
	document.getElementById('age74').style.display='block'; 
	document.getElementById('age75').style.display='block'; 
	document.getElementById('age76').style.display='block'; 
}
if(value==0)
{
	document.getElementById('age7').style.display='none'; 
	document.getElementById('age72').style.display='none'; 
	document.getElementById('age73').style.display='none'; 
	document.getElementById('age74').style.display='none'; 
	document.getElementById('age75').style.display='none'; 
	document.getElementById('age76').style.display='none'; 
}

}
function display_child_count7(value)
{
if(value==1)
{
	document.getElementById('age8').style.display='block'; 
	document.getElementById('age82').style.display='none'; 
	document.getElementById('age83').style.display='none'; 
	document.getElementById('age84').style.display='none'; 
	document.getElementById('age85').style.display='none'; 
	document.getElementById('age86').style.display='none'; 
}
if(value==2)
{
	document.getElementById('age8').style.display='block'; 
	document.getElementById('age82').style.display='block'; 
	document.getElementById('age83').style.display='none'; 
	document.getElementById('age84').style.display='none'; 
	document.getElementById('age85').style.display='none'; 
	document.getElementById('age86').style.display='none'; 
}
if(value==3)
{
	document.getElementById('age8').style.display='block'; 
	document.getElementById('age82').style.display='block';  
	document.getElementById('age83').style.display='block'; 
	document.getElementById('age84').style.display='none'; 
	document.getElementById('age85').style.display='none'; 
	document.getElementById('age86').style.display='none'; 
}
if(value==4)
{
	document.getElementById('age8').style.display='block'; 
	document.getElementById('age82').style.display='block';  
	document.getElementById('age83').style.display='block'; 
	document.getElementById('age84').style.display='block'; 
	document.getElementById('age85').style.display='none'; 
	document.getElementById('age86').style.display='none'; 
}
if(value==5)
{
	document.getElementById('age8').style.display='block'; 
	document.getElementById('age82').style.display='block';  
	document.getElementById('age83').style.display='block'; 
	document.getElementById('age84').style.display='block'; 
	document.getElementById('age85').style.display='block'; 
	document.getElementById('age86').style.display='none'; 
}
if(value==6)
{
	document.getElementById('age8').style.display='block'; 
	document.getElementById('age82').style.display='block';  
	document.getElementById('age83').style.display='block'; 
	document.getElementById('age84').style.display='block'; 
	document.getElementById('age85').style.display='block'; 
	document.getElementById('age86').style.display='block'; 
}
if(value==0)
{
	document.getElementById('age8').style.display='none'; 
	document.getElementById('age82').style.display='none'; 
	document.getElementById('age83').style.display='none'; 
	document.getElementById('age84').style.display='none'; 
	document.getElementById('age85').style.display='none'; 
	document.getElementById('age86').style.display='none'; 
}

}
function display_child_count8(value)
{
if(value==1)
{
	document.getElementById('age9').style.display='block'; 
	document.getElementById('age92').style.display='none'; 
	document.getElementById('age93').style.display='none'; 
	document.getElementById('age94').style.display='none'; 
	document.getElementById('age95').style.display='none'; 
	document.getElementById('age96').style.display='none'; 
}
if(value==2)
{
	document.getElementById('age9').style.display='block'; 
	document.getElementById('age92').style.display='block'; 
	document.getElementById('age93').style.display='none'; 
	document.getElementById('age94').style.display='none'; 
	document.getElementById('age95').style.display='none'; 
	document.getElementById('age96').style.display='none'; 
}
if(value==3)
{
	document.getElementById('age9').style.display='block'; 
	document.getElementById('age92').style.display='block';  
	document.getElementById('age93').style.display='block'; 
	document.getElementById('age94').style.display='none'; 
	document.getElementById('age95').style.display='none'; 
	document.getElementById('age96').style.display='none'; 
}
if(value==4)
{
	document.getElementById('age9').style.display='block'; 
	document.getElementById('age92').style.display='block';  
	document.getElementById('age93').style.display='block'; 
	document.getElementById('age94').style.display='block'; 
	document.getElementById('age95').style.display='none'; 
	document.getElementById('age96').style.display='none'; 
}
if(value==5)
{
	document.getElementById('age9').style.display='block'; 
	document.getElementById('age92').style.display='block';  
	document.getElementById('age93').style.display='block'; 
	document.getElementById('age94').style.display='block'; 
	document.getElementById('age95').style.display='block'; 
	document.getElementById('age96').style.display='none'; 
}
if(value==6)
{
	document.getElementById('age9').style.display='block'; 
	document.getElementById('age92').style.display='block';  
	document.getElementById('age93').style.display='block'; 
	document.getElementById('age94').style.display='block'; 
	document.getElementById('age95').style.display='block'; 
	document.getElementById('age96').style.display='block'; 
}
if(value==0)
{
	document.getElementById('age9').style.display='none'; 
	document.getElementById('age92').style.display='none'; 
	document.getElementById('age93').style.display='none'; 
	document.getElementById('age94').style.display='none'; 
	document.getElementById('age95').style.display='none'; 
	document.getElementById('age96').style.display='none'; 
}

}
function display_child_count9(value)
{
if(value==1)
{
	document.getElementById('age101').style.display='block'; 
	document.getElementById('age102').style.display='none'; 
	document.getElementById('age103').style.display='none'; 
	document.getElementById('age104').style.display='none'; 
	document.getElementById('age105').style.display='none'; 
	document.getElementById('age106').style.display='none'; 
}
if(value==2)
{
	document.getElementById('age101').style.display='block'; 
	document.getElementById('age102').style.display='block'; 
	document.getElementById('age103').style.display='none'; 
	document.getElementById('age104').style.display='none'; 
	document.getElementById('age105').style.display='none'; 
	document.getElementById('age106').style.display='none'; 
}
if(value==3)
{
	document.getElementById('age101').style.display='block'; 
	document.getElementById('age102').style.display='block';  
	document.getElementById('age103').style.display='block'; 
	document.getElementById('age104').style.display='none'; 
	document.getElementById('age105').style.display='none'; 
	document.getElementById('age106').style.display='none'; 
}
if(value==4)
{
	document.getElementById('age101').style.display='block'; 
	document.getElementById('age102').style.display='block';  
	document.getElementById('age103').style.display='block'; 
	document.getElementById('age104').style.display='block'; 
	document.getElementById('age105').style.display='none'; 
	document.getElementById('age106').style.display='none'; 
}
if(value==5)
{
	document.getElementById('age101').style.display='block'; 
	document.getElementById('age102').style.display='block';  
	document.getElementById('age103').style.display='block'; 
	document.getElementById('age104').style.display='block'; 
	document.getElementById('age105').style.display='block'; 
	document.getElementById('age106').style.display='none'; 
}
if(value==6)
{
	document.getElementById('age101').style.display='block'; 
	document.getElementById('age102').style.display='block';  
	document.getElementById('age103').style.display='block'; 
	document.getElementById('age104').style.display='block'; 
	document.getElementById('age105').style.display='block'; 
	document.getElementById('age106').style.display='block'; 
}
if(value==0)
{
	document.getElementById('age101').style.display='none'; 
	document.getElementById('age102').style.display='none'; 
	document.getElementById('age103').style.display='none'; 
	document.getElementById('age104').style.display='none'; 
	document.getElementById('age105').style.display='none'; 
	document.getElementById('age106').style.display='none'; 
}

}

</script>
        <select name="room_count"   onChange="display_adult_count(this.value)" class="jumb_25_for_new_1 pl5"  style="width:72px">
        <option value="1" <?php if($_SESSION['room_count']==1) { ?>selected="selected" <?php } ?>>Room 1</option>
        <option value="2" <?php if($_SESSION['room_count']==2) { ?>selected="selected" <?php } ?>>Room 2</option>
        <option value="3" <?php if($_SESSION['room_count']==3) { ?>selected="selected" <?php } ?>>Room 3</option>
        <option value="4" <?php if($_SESSION['room_count']==4) { ?>selected="selected" <?php } ?>>Room 4</option>
        <option value="5" <?php if($_SESSION['room_count']==5) { ?>selected="selected" <?php } ?>>Room 5</option>
        <option value="6" <?php if($_SESSION['room_count']==6) { ?>selected="selected" <?php } ?>>Room 6</option>
        <option value="7" <?php if($_SESSION['room_count']==7) { ?>selected="selected" <?php } ?>>Room 7</option>
        <option value="8" <?php if($_SESSION['room_count']==8) { ?>selected="selected" <?php } ?>>Room 8</option>
        <option value="9" <?php if($_SESSION['room_count']==9) { ?>selected="selected" <?php } ?>>Room 9</option>
        <option value="10" <?php if($_SESSION['room_count']==10) { ?>selected="selected" <?php } ?>>Room 10</option>
        </select></p>
        </div>
        
        
        
		<?php if($_SESSION['room_count']==1 || $_SESSION['room_count']==2 || $_SESSION['room_count']==3 || $_SESSION['room_count']==4 || $_SESSION['room_count']==5 || $_SESSION['room_count']==6 || $_SESSION['room_count']==7 || $_SESSION['room_count']==8 || $_SESSION['room_count']==9 || $_SESSION['room_count']==10)
        {
        ?>   
        <div class="check_139 " id="room1">
        <DIV class="check_139" >
        <!--<div class="rooms_left"></div>-->
        
        <div class="wi40"  style="height: auto;">
        <p style="color: #FFFFFF;
        font-size: 12px;">Adult</p>
        <p>
        <select name="adult[]" id="jumpMenu2" class="jumb_25_for_new_1 pl5">
        <?php $s_adult = $_SESSION['org_adult'][0]; ?>
        <option value="0" <?php if($s_adult==0) { ?>selected="selected" <?php } ?>>0</option>
        <option value="1" <?php if($s_adult==1) { ?>selected="selected" <?php } ?>>1</option>
        <option value="2" <?php if($s_adult==2) { ?>selected="selected" <?php } ?>>2</option>
        <option value="3" <?php if($s_adult==3) { ?>selected="selected" <?php } ?>>3</option>
        <option value="4" <?php if($s_adult==4) { ?>selected="selected" <?php } ?>>4</option>
        <option value="5" <?php if($s_adult==5) { ?>selected="selected" <?php } ?>>5</option>
        <option value="6" <?php if($s_adult==6) { ?>selected="selected" <?php } ?>>6</option>
        <option value="7" <?php if($s_adult==7) { ?>selected="selected" <?php } ?>>7</option>
        <option value="8" <?php if($s_adult==8) { ?>selected="selected" <?php } ?>>8</option>
        <option value="9" <?php if($s_adult==9) { ?>selected="selected" <?php } ?>>9</option>
        <option value="10" <?php if($s_adult==10) { ?>selected="selected" <?php } ?>>10</option>
        <option value="11" <?php if($s_adult==11) { ?>selected="selected" <?php } ?>>11</option>
        <option value="12" <?php if($s_adult==12) { ?>selected="selected" <?php } ?>>12</option>
        </select>
        </p>
        </div>
        <div class="wi40 padding_le ml10">
        <p id="child_header"  style="color: #FFFFFF;
        font-size: 12px;">Children</p>
        <p>
        <select name="child[]" id="inputfiled1_1"  class="jumb_25_for_new_1"  onChange="display_child_count(this.value)">
        <?php $s_child = $_SESSION['org_child'][0]; ?>
        <option value="0" <?php if($s_child==0) { ?>selected="selected" <?php } ?>>0</option>
        <option value="1" <?php if($s_child==1) { ?>selected="selected" <?php } ?>>1</option>
        <option value="2" <?php if($s_child==2) { ?>selected="selected" <?php } ?>>2</option>
        <option value="3" <?php if($s_child==3) { ?>selected="selected" <?php } ?>>3</option>
        <option value="4" <?php if($s_child==4) { ?>selected="selected" <?php } ?>>4</option>
        <option value="5" <?php if($s_child==5) { ?>selected="selected" <?php } ?>>5</option>
        <option value="6" <?php if($s_child==6) { ?>selected="selected" <?php } ?>>6</option>
        </select>
        </p>
        </div>
        </DIV>
        <?php
        if($s_child  == 1 || $s_child  == 2 || $s_child  == 3 || $s_child  == 4 || $s_child  == 5 || $s_child  == 6)
        {
        ?>
        <DIV class="check_149" id="age1" >
        <div class="AGE_OF2">Age Of Child 1</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1"  >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
        <option value="<?php echo $i; ?>" <?php if($_SESSION['child_age'][0]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
        <?php }
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
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <?php
        }
        
        if($s_child  == 2 || $s_child  == 3 || $s_child  == 4 || $s_child  == 5 || $s_child  == 6)
        {
        ?>
        <DIV class="check_149"  id="age12" >
        <div class="AGE_OF2">Age Of Child 2</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
        <option value="<?php echo $i; ?>" <?php if($_SESSION['child_age'][1]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
        <?php }
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
        <DIV class="check_149"  id="age12"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 2</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <?php
        }
        ?>
        <?php
        if($s_child  == 3 || $s_child  == 4 || $s_child  == 5 || $s_child  == 6)
        { 	
        ?>
        <DIV class="check_149"  id="age13" >
        <div class="AGE_OF2">Age Of Child 3</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
        <option value="<?php echo $i; ?>" <?php if($_SESSION['child_age'][2]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
        <?php }
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
        <DIV class="check_149" id="age13"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 3</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <?php
        }
        ?>
        <?php
        if($s_child  == 4 || $s_child  == 5 || $s_child  == 6)
        { 	
        ?>
        <DIV class="check_149"  id="age14" >
        <div class="AGE_OF2">Age Of Child 4</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
        <option value="<?php echo $i; ?>" <?php if($_SESSION['child_age'][3]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
        <?php }
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
        <DIV class="check_149"  id="age14"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 4</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <?php
        }
        ?>
        <?php
        if($s_child  == 5 || $s_child  == 6)
        { 	
        ?>
        <DIV class="check_149"  id="age15" >
        <div class="AGE_OF2">Age Of Child 5</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
        <option value="<?php echo $i; ?>" <?php if($_SESSION['child_age'][4]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
        <?php }
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
        <DIV class="check_149"  id="age15"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 5</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <?php
        }
        ?>
        <?php
        if($s_child  == 6)
        { 	
        ?>
        <DIV class="check_149"  id="age16" >
        <div class="AGE_OF2">Age Of Child 6</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
        <option value="<?php echo $i; ?>" <?php if($_SESSION['child_age'][5]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
        <?php }
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
        <DIV class="check_149"  id="age16"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 6</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
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
        <select name="adult[]" id="jumpMenu2" class="jumb_25_for_new_1 pl5">
        <option value="0">0</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
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
        <option value="2">2</option> 
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
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
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
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
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
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
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <DIV class="check_149"  id="age14"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 4</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <DIV class="check_149"  id="age15"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 5</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <DIV class="check_149"  id="age16"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 6</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
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
        
        <?php if($_SESSION['room_count']==2 || $_SESSION['room_count']==3 || $_SESSION['room_count']==4 || $_SESSION['room_count']==5 || $_SESSION['room_count']==6 || $_SESSION['room_count']==7 || $_SESSION['room_count']==8 || $_SESSION['room_count']==9 || $_SESSION['room_count']==10)
        {
        ?>                       
        <div class="check_139	 ml17" style="float:right; margin-right:4px" id="room2">
        <DIV class="check_139" >
        <!--<div class="rooms_left"></div>-->
        <div class="wi40"  style="height: auto;">
        <p></p>
        <p>
        <select name="adult[]" id="jumpMenu2" class="jumb_25_for_new_1 pl5">
        <?php $s_adult1 = $_SESSION['org_adult'][1]; ?>
        <option value="0" <?php if($s_adult1==0) { ?>selected="selected" <?php } ?>>0</option>
        <option value="1" <?php if($s_adult1==1) { ?>selected="selected" <?php } ?>>1</option>
        <option value="2" <?php if($s_adult1==2) { ?>selected="selected" <?php } ?>>2</option>
        <option value="3" <?php if($s_adult1==3) { ?>selected="selected" <?php } ?>>3</option>
        <option value="4" <?php if($s_adult1==4) { ?>selected="selected" <?php } ?>>4</option>
        <option value="5" <?php if($s_adult1==5) { ?>selected="selected" <?php } ?>>5</option>
        <option value="6" <?php if($s_adult1==6) { ?>selected="selected" <?php } ?>>6</option>
        <option value="7" <?php if($s_adult1==7) { ?>selected="selected" <?php } ?>>7</option>
        <option value="8" <?php if($s_adult1==8) { ?>selected="selected" <?php } ?>>8</option>
        <option value="9" <?php if($s_adult1==9) { ?>selected="selected" <?php } ?>>9</option>
        <option value="10" <?php if($s_adult1==10) { ?>selected="selected" <?php } ?>>10</option>
        <option value="11" <?php if($s_adult1==11) { ?>selected="selected" <?php } ?>>11</option>
        <option value="12" <?php if($s_adult1==12) { ?>selected="selected" <?php } ?>>12</option>
        </select>
        </p>
        </div>
        <div class="wi40 padding_le ml10">
        <p id="child_header2"></p>
        <p>
        <select name="child[]" id="inputfiled1_2"  class="jumb_25_for_new_1"  onChange="display_child_count1(this.value)">
        <?php $s_child1 = $_SESSION['org_child'][1]; ?>
        <option value="0" <?php if($s_child1==0) { ?>selected="selected" <?php } ?>>0</option>
        <option value="1" <?php if($s_child1==1) { ?>selected="selected" <?php } ?>>1</option>
        <option value="2" <?php if($s_child1==2) { ?>selected="selected" <?php } ?>>2</option>
        <option value="3" <?php if($s_child1==3) { ?>selected="selected" <?php } ?>>3</option>
        <option value="4" <?php if($s_child1==4) { ?>selected="selected" <?php } ?>>4</option>
        <option value="5" <?php if($s_child1==5) { ?>selected="selected" <?php } ?>>5</option>
        <option value="6" <?php if($s_child1==6) { ?>selected="selected" <?php } ?>>6</option>
        </select>
        </p>
        </div>
        </DIV>
        <?php
        if($s_child1  == 1 || $s_child1  == 2 || $s_child1  == 3 || $s_child1  == 4 || $s_child1  == 5 || $s_child1  == 6)
        {
        ?>
        <DIV class="check_149" id="age2" >
        <div class="AGE_OF2">Age Of Child 1</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1"  >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>" <?php if($_SESSION['child_age'][6]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
        <?php }
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
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <?php
        }
        
        if( $s_child1  == 2 || $s_child1  == 3 || $s_child1  == 4 || $s_child1  == 5 || $s_child1  == 6)
        {
        ?>
        <DIV class="check_149"  id="age22" >
        <div class="AGE_OF2">Age Of Child 2</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>" <?php if($_SESSION['child_age'][7]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
        <?php }
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
        <DIV class="check_149"  id="age22"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 2</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <?php
        }
        ?>
        <?php
        if($s_child1  == 3 || $s_child1  == 4 || $s_child1  == 5 || $s_child1  == 6)
        { 	
        ?>
        <DIV class="check_149"  id="age23" >
        <div class="AGE_OF2">Age Of Child 3</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>" <?php if($_SESSION['child_age'][8]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
        <?php }
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
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <?php
        }
        ?>
        <?php
        if($s_child1  == 4 || $s_child1  == 5 || $s_child1  == 6)
        { 	
        ?>
        <DIV class="check_149"  id="age24" >
        <div class="AGE_OF2">Age Of Child 4</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>" <?php if($_SESSION['child_age'][9]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
        <?php }
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
        <DIV class="check_149"  id="age24"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 4</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <?php
        }
        ?>
        <?php
        if($s_child1  == 5 || $s_child1  == 6)
        { 	
        ?>
        <DIV class="check_149"  id="age25" >
        <div class="AGE_OF2">Age Of Child 5</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>" <?php if($_SESSION['child_age'][10]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
        <?php }
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
        <DIV class="check_149"  id="age25"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 5</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <?php
        }
        ?>
        <?php
        if($s_child1  == 6)
        { 	
        ?>
        <DIV class="check_149"  id="age26" >
        <div class="AGE_OF2">Age Of Child 6</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>" <?php if($_SESSION['child_age'][11]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
        <?php }
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
        <DIV class="check_149"  id="age26"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 6</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
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
        <select name="adult[]" id="jumpMenu2" class="jumb_25_for_new_1 pl5">
        <option value="0">0</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        </select>
        </p>
        </div>
        <div class="wi40 padding_le ml10">
        <p id="child_header2"></p>
        <p>
        <select name="child[]" id="inputfiled1_2"  class="jumb_25_for_new_1"  onChange="display_child_count1(this.value)">
        <option value="0">0</option>
        <option value="1">1</option>
        <option value="2">2</option> 
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
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
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
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
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
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
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <DIV class="check_149"  id="age24"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 4</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <DIV class="check_149"  id="age25"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 5</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <DIV class="check_149"  id="age26"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 6</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
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
        if($_SESSION['room_count']==3 || $_SESSION['room_count']==4 || $_SESSION['room_count']==5 || $_SESSION['room_count']==6 || $_SESSION['room_count']==7 || $_SESSION['room_count']==8 || $_SESSION['room_count']==9 || $_SESSION['room_count']==10)
        {
        ?>
        <div class="check_139	 ml17" style="float:right;  margin-right:4px" id="room3">
        <DIV class="check_139" >
        <!--<div class="rooms_left"></div>-->
        <div class="wi40" style="height: auto;">
        <p></p>
        <p>
        <select name="adult[]" id="jumpMenu2" class="jumb_25_for_new_1 pl5">
        <?php $s_adult2 = $_SESSION['org_adult'][2]; ?>
        <option value="0" <?php if($s_adult2==0) { ?>selected="selected" <?php } ?>>0</option>
        <option value="1" <?php if($s_adult2==1) { ?>selected="selected" <?php } ?>>1</option>
        <option value="2" <?php if($s_adult2==2) { ?>selected="selected" <?php } ?>>2</option>
        <option value="3" <?php if($s_adult2==3) { ?>selected="selected" <?php } ?>>3</option>
        <option value="4" <?php if($s_adult2==4) { ?>selected="selected" <?php } ?>>4</option>
        <option value="5" <?php if($s_adult2==5) { ?>selected="selected" <?php } ?>>5</option>
        <option value="6" <?php if($s_adult2==6) { ?>selected="selected" <?php } ?>>6</option>
        <option value="7" <?php if($s_adult2==7) { ?>selected="selected" <?php } ?>>7</option>
        <option value="8" <?php if($s_adult2==8) { ?>selected="selected" <?php } ?>>8</option>
        <option value="9" <?php if($s_adult2==9) { ?>selected="selected" <?php } ?>>9</option>
        <option value="10" <?php if($s_adult2==10) { ?>selected="selected" <?php } ?>>10</option>
        <option value="11" <?php if($s_adult2==11) { ?>selected="selected" <?php } ?>>11</option>
        <option value="12" <?php if($s_adult2==12) { ?>selected="selected" <?php } ?>>12</option>
        </select>
        </p>
        </div>
        <div class="wi40 padding_le ml10">
        <p id="child_header3"></p>
        <p>
        <select name="child[]" id="inputfiled1_3"  class="jumb_25_for_new_1"  onChange="display_child_count2(this.value)">
        <?php $s_child2 = $_SESSION['org_child'][2]; ?>
        <option value="0" <?php if($s_child2==0) { ?>selected="selected" <?php } ?>>0</option>
        <option value="1" <?php if($s_child2==1) { ?>selected="selected" <?php } ?>>1</option>
        <option value="2" <?php if($s_child2==2) { ?>selected="selected" <?php } ?>>2</option>
        <option value="3" <?php if($s_child2==3) { ?>selected="selected" <?php } ?>>3</option>
        <option value="4" <?php if($s_child2==4) { ?>selected="selected" <?php } ?>>4</option>
        <option value="5" <?php if($s_child2==5) { ?>selected="selected" <?php } ?>>5</option>
        <option value="6" <?php if($s_child2==6) { ?>selected="selected" <?php } ?>>6</option>
        </select>
        </p>
        </div>
        </DIV>
        <?php
        if($s_child2  == 1 || $s_child2  == 2 || $s_child2  == 3 || $s_child2  == 4 || $s_child2  == 5 || $s_child2  == 6)
        {
        ?>
        <DIV class="check_149" id="age3" >
        <div class="AGE_OF2">Age Of Child 1</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1"  >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>" <?php if($_SESSION['child_age'][12]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
        <?php }
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
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <?php
        }
        
        if($s_child2  == 2 || $s_child2  == 3 || $s_child2  == 4 || $s_child2  == 5 || $s_child2  == 6)
        {
        ?>
        <DIV class="check_149"  id="age32" >
        <div class="AGE_OF2">Age Of Child 2</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>" <?php if($_SESSION['child_age'][13]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
        <?php }
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
        <DIV class="check_149"  id="age32"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 2</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <?php
        }
        ?>
        <?php
        if($s_child2  == 3 || $s_child2  == 4 || $s_child2  == 5 || $s_child2  == 6)
        { 	
        ?>
        <DIV class="check_149"  id="age33" >
        <div class="AGE_OF2">Age Of Child 3</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>" <?php if($_SESSION['child_age'][14]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
        <?php }
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
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <?php
        }
        ?>
        <?php
        if($s_child2  == 4 || $s_child2  == 5 || $s_child2  == 6)
        { 	
        ?>
        <DIV class="check_149"  id="age34" >
        <div class="AGE_OF2">Age Of Child 4</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>" <?php if($_SESSION['child_age'][15]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
        <?php }
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
        <DIV class="check_149"  id="age34"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 4</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <?php
        }
        ?>
        <?php
        if($s_child2  == 5 || $s_child2  == 6)
        { 	
        ?>
        <DIV class="check_149"  id="age35" >
        <div class="AGE_OF2">Age Of Child 5</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>" <?php if($_SESSION['child_age'][16]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
        <?php }
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
        <DIV class="check_149"  id="age35"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 5</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <?php
        }
        ?>
        <?php
        if($s_child2  == 6)
        { 	
        ?>
        <DIV class="check_149"  id="age36" >
        <div class="AGE_OF2">Age Of Child 6</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>" <?php if($_SESSION['child_age'][17]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
        <?php }
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
        <DIV class="check_149"  id="age36"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 6</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
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
        <select name="adult[]" id="jumpMenu2" class="jumb_25_for_new_1 pl5">
        <option value="0">0</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        </select>
        </p>
        </div>
        <div class="wi40 padding_le ml10">
        <p id="child_header3"></p>
        <p>
        <select name="child[]" id="inputfiled1_3"  class="jumb_25_for_new_1"  onChange="display_child_count2(this.value)">
        <option value="0">0</option>
        <option value="1">1</option>
        <option value="2">2</option> 
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
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
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
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
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
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
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <DIV class="check_149"  id="age34"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 4</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <DIV class="check_149"  id="age35"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 5</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <DIV class="check_149"  id="age36"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 6</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
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
        if($_SESSION['room_count']==4 || $_SESSION['room_count']==5 || $_SESSION['room_count']==6 || $_SESSION['room_count']==7 || $_SESSION['room_count']==8 || $_SESSION['room_count']==9 || $_SESSION['room_count']==10)
        {
        ?>
        <div class="check_139	 ml17" style="float:right;  margin-right:4px" id="room4">
        <DIV class="check_139" >
        <!--<div class="rooms_left"></div>-->
        <div class="wi40" style="height: auto;">
        <p></p>
        <p>
        <select name="adult[]" id="jumpMenu2" class="jumb_25_for_new_1 pl5">
        <?php $s_adult3 = $_SESSION['org_adult'][3]; ?>
        <option value="0" <?php if($s_adult3==0) { ?>selected="selected" <?php } ?>>0</option>
        <option value="1" <?php if($s_adult3==1) { ?>selected="selected" <?php } ?>>1</option>
        <option value="2" <?php if($s_adult3==2) { ?>selected="selected" <?php } ?>>2</option>
        <option value="3" <?php if($s_adult3==3) { ?>selected="selected" <?php } ?>>3</option>
        <option value="4" <?php if($s_adult3==4) { ?>selected="selected" <?php } ?>>4</option>
        <option value="5" <?php if($s_adult3==5) { ?>selected="selected" <?php } ?>>5</option>
        <option value="6" <?php if($s_adult3==6) { ?>selected="selected" <?php } ?>>6</option>
        <option value="7" <?php if($s_adult3==7) { ?>selected="selected" <?php } ?>>7</option>
        <option value="8" <?php if($s_adult3==8) { ?>selected="selected" <?php } ?>>8</option>
        <option value="9" <?php if($s_adult3==9) { ?>selected="selected" <?php } ?>>9</option>
        <option value="10" <?php if($s_adult3==10) { ?>selected="selected" <?php } ?>>10</option>
        <option value="11" <?php if($s_adult3==11) { ?>selected="selected" <?php } ?>>11</option>
        <option value="12" <?php if($s_adult3==12) { ?>selected="selected" <?php } ?>>12</option>
        </select>
        </p>
        </div>
        <div class="wi40 padding_le ml10">
        <p id="child_header3"></p>
        <p>
        <select name="child[]" id="inputfiled1_3"  class="jumb_25_for_new_1"  onChange="display_child_count3(this.value)">
        <?php $s_child3 = $_SESSION['org_child'][3]; ?>
        <option value="0" <?php if($s_child3==0) { ?>selected="selected" <?php } ?>>0</option>
        <option value="1" <?php if($s_child3==1) { ?>selected="selected" <?php } ?>>1</option>
        <option value="2" <?php if($s_child3==2) { ?>selected="selected" <?php } ?>>2</option>
        <option value="3" <?php if($s_child3==3) { ?>selected="selected" <?php } ?>>3</option>
        <option value="4" <?php if($s_child3==4) { ?>selected="selected" <?php } ?>>4</option>
        <option value="5" <?php if($s_child3==5) { ?>selected="selected" <?php } ?>>5</option>
        <option value="6" <?php if($s_child3==6) { ?>selected="selected" <?php } ?>>6</option>
        </select>
        </p>
        </div>
        </DIV>
        <?php
        if($s_child3  == 1 || $s_child3  == 2 || $s_child3  == 3 || $s_child3  == 4 || $s_child3  == 5 || $s_child3  == 6)
        {
        ?>
        <DIV class="check_149" id="age4" >
        <div class="AGE_OF2">Age Of Child 1</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1"  >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>" <?php if($_SESSION['child_age'][18]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
        <?php }
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
        <DIV class="check_149" id="age4" style="display:none;">
        <div class="AGE_OF2">Age Of Child 1</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1"  >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <?php
        }
        
        if($s_child3  == 2 || $s_child3  == 3 || $s_child3  == 4 || $s_child3  == 5 || $s_child3  == 6)
        {
        ?>
        <DIV class="check_149"  id="age42" >
        <div class="AGE_OF2">Age Of Child 2</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>" <?php if($_SESSION['child_age'][19]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
        <?php }
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
        <DIV class="check_149"  id="age42"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 2</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <?php
        }
        ?>
        <?php
        if($s_child3  == 3 || $s_child3  == 4 || $s_child3  == 5 || $s_child3  == 6)
        { 	
        ?>
        <DIV class="check_149"  id="age43" >
        <div class="AGE_OF2">Age Of Child 3</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>" <?php if($_SESSION['child_age'][20]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
        <?php }
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
        <DIV class="check_149"  id="age43"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 3</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <?php
        }
        ?>
        <?php
        if($s_child3  == 4 || $s_child3  == 5 || $s_child3  == 6)
        { 	
        ?>
        <DIV class="check_149"  id="age44" >
        <div class="AGE_OF2">Age Of Child 4</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>" <?php if($_SESSION['child_age'][21]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
        <?php }
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
        <DIV class="check_149"  id="age44"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 4</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <?php
        }
        ?>
        <?php
        if($s_child3  == 5 || $s_child3  == 6)
        { 	
        ?>
        <DIV class="check_149"  id="age45" >
        <div class="AGE_OF2">Age Of Child 5</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>" <?php if($_SESSION['child_age'][22]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
        <?php }
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
        <DIV class="check_149"  id="age45"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 5</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <?php
        }
        ?>
        <?php
        if($s_child3  == 6)
        { 	
        ?>
        <DIV class="check_149"  id="age46" >
        <div class="AGE_OF2">Age Of Child 6</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>" <?php if($_SESSION['child_age'][23]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
        <?php }
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
        <DIV class="check_149"  id="age46"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 6</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
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
        <div class="check_139	 ml17" style="float:right; display:none; margin-right:4px" id="room4">
        <DIV class="check_139" >
        <!--<div class="rooms_left"></div>-->
        <div class="wi40" style="height: auto;">
        <p></p>
        <p>
        <select name="adult[]" id="jumpMenu2" class="jumb_25_for_new_1 pl5">
        <option value="0">0</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        </select>
        </p>
        </div>
        <div class="wi40 padding_le ml10">
        <p id="child_header3"></p>
        <p>
        <select name="child[]" id="inputfiled1_3"  class="jumb_25_for_new_1"  onChange="display_child_count3(this.value)">
        <option value="0">0</option>
        <option value="1">1</option>
        <option value="2">2</option> 
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        </select>
        </p>
        </div>
        </DIV>
        <DIV class="check_149" id="age4" style="display:none;">
        <div class="AGE_OF2">Age Of Child 1</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1"  >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <DIV class="check_149"  id="age42"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 2</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <DIV class="check_149"  id="age43"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 3</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <DIV class="check_149"  id="age44"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 4</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <DIV class="check_149"  id="age45"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 5</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <DIV class="check_149"  id="age46"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 6</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
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
        if($_SESSION['room_count']==5 || $_SESSION['room_count']==6 || $_SESSION['room_count']==7 || $_SESSION['room_count']==8 || $_SESSION['room_count']==9 || $_SESSION['room_count']==10)
        {
        ?>
        <div class="check_139	 ml17" style="float:right;  margin-right:4px" id="room5">
        <DIV class="check_139" >
        <!--<div class="rooms_left"></div>-->
        <div class="wi40" style="height: auto;">
        <p></p>
        <p>
        <select name="adult[]" id="jumpMenu2" class="jumb_25_for_new_1 pl5">
        <?php $s_adult4 = $_SESSION['org_adult'][4]; ?>
        <option value="0" <?php if($s_adult4==0) { ?>selected="selected" <?php } ?>>0</option>
        <option value="1" <?php if($s_adult4==1) { ?>selected="selected" <?php } ?>>1</option>
        <option value="2" <?php if($s_adult4==2) { ?>selected="selected" <?php } ?>>2</option>
        <option value="3" <?php if($s_adult4==3) { ?>selected="selected" <?php } ?>>3</option>
        <option value="4" <?php if($s_adult4==4) { ?>selected="selected" <?php } ?>>4</option>
        <option value="5" <?php if($s_adult4==5) { ?>selected="selected" <?php } ?>>5</option>
        <option value="6" <?php if($s_adult4==6) { ?>selected="selected" <?php } ?>>6</option>
        <option value="7" <?php if($s_adult4==7) { ?>selected="selected" <?php } ?>>7</option>
        <option value="8" <?php if($s_adult4==8) { ?>selected="selected" <?php } ?>>8</option>
        <option value="9" <?php if($s_adult4==9) { ?>selected="selected" <?php } ?>>9</option>
        <option value="10" <?php if($s_adult4==10) { ?>selected="selected" <?php } ?>>10</option>
        <option value="11" <?php if($s_adult4==11) { ?>selected="selected" <?php } ?>>11</option>
        <option value="12" <?php if($s_adult4==12) { ?>selected="selected" <?php } ?>>12</option>
        </select>
        </p>
        </div>
        <div class="wi40 padding_le ml10">
        <p id="child_header3"></p>
        <p>
        <select name="child[]" id="inputfiled1_3"  class="jumb_25_for_new_1"  onChange="display_child_count4(this.value)">
        <?php $s_child4 = $_SESSION['org_child'][4]; ?>
        <option value="0" <?php if($s_child4==0) { ?>selected="selected" <?php } ?>>0</option>
        <option value="1" <?php if($s_child4==1) { ?>selected="selected" <?php } ?>>1</option>
        <option value="2" <?php if($s_child4==2) { ?>selected="selected" <?php } ?>>2</option>
        <option value="3" <?php if($s_child4==3) { ?>selected="selected" <?php } ?>>3</option>
        <option value="4" <?php if($s_child4==4) { ?>selected="selected" <?php } ?>>4</option>
        <option value="5" <?php if($s_child4==5) { ?>selected="selected" <?php } ?>>5</option>
        <option value="6" <?php if($s_child4==6) { ?>selected="selected" <?php } ?>>6</option>
        </select>
        </p>
        </div>
        </DIV>
        <?php
        if($s_child4  == 1 || $s_child4  == 2 || $s_child4  == 3 || $s_child4  == 4 || $s_child4  == 5 || $s_child4  == 6)
        {
        ?>
        <DIV class="check_149" id="age5" >
        <div class="AGE_OF2">Age Of Child 1</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1"  >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>" <?php if($_SESSION['child_age'][24]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
        <?php }
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
        <DIV class="check_149" id="age5" style="display:none;">
        <div class="AGE_OF2">Age Of Child 1</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1"  >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <?php
        }
        
        if($s_child4  == 2 || $s_child4  == 3 || $s_child4  == 4 || $s_child4  == 5 || $s_child4  == 6)
        {
        ?>
        <DIV class="check_149"  id="age52" >
        <div class="AGE_OF2">Age Of Child 2</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>" <?php if($_SESSION['child_age'][25]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
        <?php }
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
        <DIV class="check_149"  id="age52"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 2</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <?php
        }
        ?>
        <?php
        if($s_child4  == 3 || $s_child4  == 4 || $s_child4  == 5 || $s_child4  == 6)
        { 	
        ?>
        <DIV class="check_149"  id="age53" >
        <div class="AGE_OF2">Age Of Child 3</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>" <?php if($_SESSION['child_age'][26]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
        <?php }
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
        <DIV class="check_149"  id="age53"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 3</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <?php
        }
        ?>
        <?php
        if($s_child4  == 4 || $s_child4  == 5 || $s_child4  == 6)
        { 	
        ?>
        <DIV class="check_149"  id="age54" >
        <div class="AGE_OF2">Age Of Child 4</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>" <?php if($_SESSION['child_age'][27]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
        <?php }
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
        <DIV class="check_149"  id="age54"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 4</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <?php
        }
        ?>
        <?php
        if($s_child4  == 5 || $s_child4  == 6)
        { 	
        ?>
        <DIV class="check_149"  id="age55" >
        <div class="AGE_OF2">Age Of Child 5</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>" <?php if($_SESSION['child_age'][28]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
        <?php }
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
        <DIV class="check_149"  id="age55"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 5</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <?php
        }
        ?>
        <?php
        if($s_child4  == 6)
        { 	
        ?>
        <DIV class="check_149"  id="age56" >
        <div class="AGE_OF2">Age Of Child 6</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>" <?php if($_SESSION['child_age'][29]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
        <?php }
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
        <DIV class="check_149"  id="age56"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 6</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
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
        <div class="check_139	 ml17" style="float:right; display:none; margin-right:4px" id="room5">
        <DIV class="check_139" >
        <!--<div class="rooms_left"></div>-->
        <div class="wi40" style="height: auto;">
        <p></p>
        <p>
        <select name="adult[]" id="jumpMenu2" class="jumb_25_for_new_1 pl5">
        <option value="0">0</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        </select>
        </p>
        </div>
        <div class="wi40 padding_le ml10">
        <p id="child_header3"></p>
        <p>
        <select name="child[]" id="inputfiled1_3"  class="jumb_25_for_new_1"  onChange="display_child_count4(this.value)">
        <option value="0">0</option>
        <option value="1">1</option>
        <option value="2">2</option> 
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        </select>
        </p>
        </div>
        </DIV>
        <DIV class="check_149" id="age5" style="display:none;">
        <div class="AGE_OF2">Age Of Child 1</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1"  >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <DIV class="check_149"  id="age52"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 2</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <DIV class="check_149"  id="age53"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 3</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <DIV class="check_149"  id="age54"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 4</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <DIV class="check_149"  id="age55"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 5</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <DIV class="check_149"  id="age56"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 6</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
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
        if($_SESSION['room_count']==6 || $_SESSION['room_count']==7 || $_SESSION['room_count']==8 || $_SESSION['room_count']==9 || $_SESSION['room_count']==10)
        {
        ?>
        <div class="check_139	 ml17" style="float:right;  margin-right:4px" id="room6">
        <DIV class="check_139" >
        <!--<div class="rooms_left"></div>-->
        <div class="wi40" style="height: auto;">
        <p></p>
        <p>
        <select name="adult[]" id="jumpMenu2" class="jumb_25_for_new_1 pl5">
        <?php $s_adult5 = $_SESSION['org_adult'][5]; ?>
        <option value="0" <?php if($s_adult5==0) { ?>selected="selected" <?php } ?>>0</option>
        <option value="1" <?php if($s_adult5==1) { ?>selected="selected" <?php } ?>>1</option>
        <option value="2" <?php if($s_adult5==2) { ?>selected="selected" <?php } ?>>2</option>
        <option value="3" <?php if($s_adult5==3) { ?>selected="selected" <?php } ?>>3</option>
        <option value="4" <?php if($s_adult5==4) { ?>selected="selected" <?php } ?>>4</option>
        <option value="5" <?php if($s_adult5==5) { ?>selected="selected" <?php } ?>>5</option>
        <option value="6" <?php if($s_adult5==6) { ?>selected="selected" <?php } ?>>6</option>
        <option value="7" <?php if($s_adult5==7) { ?>selected="selected" <?php } ?>>7</option>
        <option value="8" <?php if($s_adult5==8) { ?>selected="selected" <?php } ?>>8</option>
        <option value="9" <?php if($s_adult5==9) { ?>selected="selected" <?php } ?>>9</option>
        <option value="10" <?php if($s_adult5==10) { ?>selected="selected" <?php } ?>>10</option>
        <option value="11" <?php if($s_adult5==11) { ?>selected="selected" <?php } ?>>11</option>
        <option value="12" <?php if($s_adult5==12) { ?>selected="selected" <?php } ?>>12</option>
        </select>
        </p>
        </div>
        <div class="wi40 padding_le ml10">
        <p id="child_header3"></p>
        <p>
        <select name="child[]" id="inputfiled1_3"  class="jumb_25_for_new_1"  onChange="display_child_count5(this.value)">
        <?php $s_child5 = $_SESSION['org_child'][5]; ?>
        <option value="0" <?php if($s_child5==0) { ?>selected="selected" <?php } ?>>0</option>
        <option value="1" <?php if($s_child5==1) { ?>selected="selected" <?php } ?>>1</option>
        <option value="2" <?php if($s_child5==2) { ?>selected="selected" <?php } ?>>2</option>
        <option value="3" <?php if($s_child5==3) { ?>selected="selected" <?php } ?>>3</option>
        <option value="4" <?php if($s_child5==4) { ?>selected="selected" <?php } ?>>4</option>
        <option value="5" <?php if($s_child5==5) { ?>selected="selected" <?php } ?>>5</option>
        <option value="6" <?php if($s_child5==6) { ?>selected="selected" <?php } ?>>6</option>
        </select>
        </p>
        </div>
        </DIV>
        <?php
        if($s_child5  == 1 || $s_child5  == 2 || $s_child5  == 3 || $s_child5  == 4 || $s_child5  == 5 || $s_child5  == 6)
        {
        ?>
        <DIV class="check_149" id="age6" >
        <div class="AGE_OF2">Age Of Child 1</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1"  >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>" <?php if($_SESSION['child_age'][30]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
        <?php }
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
        <DIV class="check_149" id="age6" style="display:none;">
        <div class="AGE_OF2">Age Of Child 1</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1"  >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <?php
        }
        
        if($s_child5  == 2 || $s_child5  == 3 || $s_child5  == 4 || $s_child5  == 5 || $s_child5  == 6)
        {
        ?>
        <DIV class="check_149"  id="age62" >
        <div class="AGE_OF2">Age Of Child 2</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>" <?php if($_SESSION['child_age'][31]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
        <?php }
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
        <DIV class="check_149"  id="age62"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 2</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <?php
        }
        ?>
        <?php
        if($s_child5  == 3 || $s_child5  == 4 || $s_child5  == 5 || $s_child5  == 6)
        { 	
        ?>
        <DIV class="check_149"  id="age63" >
        <div class="AGE_OF2">Age Of Child 3</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>" <?php if($_SESSION['child_age'][32]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
        <?php }
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
        <DIV class="check_149"  id="age63"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 3</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <?php
        }
        ?>
        <?php
        if($s_child5  == 4 || $s_child5  == 5 || $s_child5  == 6)
        { 	
        ?>
        <DIV class="check_149"  id="age64" >
        <div class="AGE_OF2">Age Of Child 4</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>" <?php if($_SESSION['child_age'][33]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
        <?php }
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
        <DIV class="check_149"  id="age64"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 4</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <?php
        }
        ?>
        <?php
        if($s_child5  == 5 || $s_child5  == 6)
        { 	
        ?>
        <DIV class="check_149"  id="age65" >
        <div class="AGE_OF2">Age Of Child 5</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>" <?php if($_SESSION['child_age'][34]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
        <?php }
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
        <DIV class="check_149"  id="age65"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 5</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <?php
        }
        ?>
        <?php
        if($s_child5  == 6)
        { 	
        ?>
        <DIV class="check_149"  id="age66" >
        <div class="AGE_OF2">Age Of Child 6</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>" <?php if($_SESSION['child_age'][35]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
        <?php }
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
        <DIV class="check_149"  id="age66"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 6</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
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
        <div class="check_139	 ml17" style="float:right; display:none; margin-right:4px" id="room6">
        <DIV class="check_139" >
        <!--<div class="rooms_left"></div>-->
        <div class="wi40" style="height: auto;">
        <p></p>
        <p>
        <select name="adult[]" id="jumpMenu2" class="jumb_25_for_new_1 pl5">
        <option value="0">0</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        </select>
        </p>
        </div>
        <div class="wi40 padding_le ml10">
        <p id="child_header3"></p>
        <p>
        <select name="child[]" id="inputfiled1_3"  class="jumb_25_for_new_1"  onChange="display_child_count5(this.value)">
        <option value="0">0</option>
        <option value="1">1</option>
        <option value="2">2</option> 
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        </select>
        </p>
        </div>
        </DIV>
        <DIV class="check_149" id="age6" style="display:none;">
        <div class="AGE_OF2">Age Of Child 1</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1"  >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <DIV class="check_149"  id="age62"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 2</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <DIV class="check_149"  id="age63"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 3</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <DIV class="check_149"  id="age64"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 4</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <DIV class="check_149"  id="age65"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 5</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <DIV class="check_149"  id="age66"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 6</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
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
        if($_SESSION['room_count']==7 || $_SESSION['room_count']==8 || $_SESSION['room_count']==9 || $_SESSION['room_count']==10)
        {
        ?>
        <div class="check_139	 ml17" style="float:right;  margin-right:4px" id="room7">
        <DIV class="check_139" >
        <!--<div class="rooms_left"></div>-->
        <div class="wi40" style="height: auto;">
        <p></p>
        <p>
        <select name="adult[]" id="jumpMenu2" class="jumb_25_for_new_1 pl5">
        <?php $s_adult6 = $_SESSION['org_adult'][6]; ?>
        <option value="0" <?php if($s_adult6==0) { ?>selected="selected" <?php } ?>>0</option>
        <option value="1" <?php if($s_adult6==1) { ?>selected="selected" <?php } ?>>1</option>
        <option value="2" <?php if($s_adult6==2) { ?>selected="selected" <?php } ?>>2</option>
        <option value="3" <?php if($s_adult6==3) { ?>selected="selected" <?php } ?>>3</option>
        <option value="4" <?php if($s_adult6==4) { ?>selected="selected" <?php } ?>>4</option>
        <option value="5" <?php if($s_adult6==5) { ?>selected="selected" <?php } ?>>5</option>
        <option value="6" <?php if($s_adult6==6) { ?>selected="selected" <?php } ?>>6</option>
        <option value="7" <?php if($s_adult6==7) { ?>selected="selected" <?php } ?>>7</option>
        <option value="8" <?php if($s_adult6==8) { ?>selected="selected" <?php } ?>>8</option>
        <option value="9" <?php if($s_adult6==9) { ?>selected="selected" <?php } ?>>9</option>
        <option value="10" <?php if($s_adult6==10) { ?>selected="selected" <?php } ?>>10</option>
        <option value="11" <?php if($s_adult6==11) { ?>selected="selected" <?php } ?>>11</option>
        <option value="12" <?php if($s_adult6==12) { ?>selected="selected" <?php } ?>>12</option>
        </select>
        </p>
        </div>
        <div class="wi40 padding_le ml10">
        <p id="child_header3"></p>
        <p>
        <select name="child[]" id="inputfiled1_3"  class="jumb_25_for_new_1"  onChange="display_child_count6(this.value)">
        <?php $s_child6 = $_SESSION['org_child'][6]; ?>
        <option value="0" <?php if($s_child6==0) { ?>selected="selected" <?php } ?>>0</option>
        <option value="1" <?php if($s_child6==1) { ?>selected="selected" <?php } ?>>1</option>
        <option value="2" <?php if($s_child6==2) { ?>selected="selected" <?php } ?>>2</option>
        <option value="3" <?php if($s_child6==3) { ?>selected="selected" <?php } ?>>3</option>
        <option value="4" <?php if($s_child6==4) { ?>selected="selected" <?php } ?>>4</option>
        <option value="5" <?php if($s_child6==5) { ?>selected="selected" <?php } ?>>5</option>
        <option value="6" <?php if($s_child6==6) { ?>selected="selected" <?php } ?>>6</option>
        </select>
        </p>
        </div>
        </DIV>
        <?php
        if($s_child6  == 1 || $s_child6  == 2 || $s_child6  == 3 || $s_child6  == 4 || $s_child6  == 5 || $s_child6  == 6)
        {
        ?>
        <DIV class="check_149" id="age7" >
        <div class="AGE_OF2">Age Of Child 1</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1"  >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>" <?php if($_SESSION['child_age'][36]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
        <?php }
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
        <DIV class="check_149" id="age7" style="display:none;">
        <div class="AGE_OF2">Age Of Child 1</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1"  >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <?php
        }
        
        if($s_child6  == 2 || $s_child6  == 3 || $s_child6  == 4 || $s_child6  == 5 || $s_child6  == 6)
        {
        ?>
        <DIV class="check_149"  id="age72" >
        <div class="AGE_OF2">Age Of Child 2</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>" <?php if($_SESSION['child_age'][37]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
        <?php }
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
        <DIV class="check_149"  id="age72"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 2</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <?php
        }
        ?>
        <?php
        if($s_child6  == 3 || $s_child6  == 4 || $s_child6  == 5 || $s_child6  == 6)
        { 	
        ?>
        <DIV class="check_149"  id="age73" >
        <div class="AGE_OF2">Age Of Child 3</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>" <?php if($_SESSION['child_age'][38]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
        <?php }
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
        <DIV class="check_149"  id="age73"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 3</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <?php
        }
        ?>
        <?php
        if($s_child6  == 4 || $s_child6  == 5 || $s_child6  == 6)
        { 	
        ?>
        <DIV class="check_149"  id="age74" >
        <div class="AGE_OF2">Age Of Child 4</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>" <?php if($_SESSION['child_age'][39]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
        <?php }
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
        <DIV class="check_149"  id="age74"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 4</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <?php
        }
        ?>
        <?php
        if($s_child6  == 5 || $s_child6  == 6)
        { 	
        ?>
        <DIV class="check_149"  id="age75" >
        <div class="AGE_OF2">Age Of Child 5</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>" <?php if($_SESSION['child_age'][40]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
        <?php }
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
        <DIV class="check_149"  id="age75"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 5</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <?php
        }
        ?>
        <?php
        if($s_child6  == 6)
        { 	
        ?>
        <DIV class="check_149"  id="age76" >
        <div class="AGE_OF2">Age Of Child 6</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>" <?php if($_SESSION['child_age'][41]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
        <?php }
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
        <DIV class="check_149"  id="age76"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 6</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
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
        <div class="check_139	 ml17" style="float:right; display:none; margin-right:4px" id="room7">
        <DIV class="check_139" >
        <!--<div class="rooms_left"></div>-->
        <div class="wi40" style="height: auto;">
        <p></p>
        <p>
        <select name="adult[]" id="jumpMenu2" class="jumb_25_for_new_1 pl5">
        <option value="0">0</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        </select>
        </p>
        </div>
        <div class="wi40 padding_le ml10">
        <p id="child_header3"></p>
        <p>
        <select name="child[]" id="inputfiled1_3"  class="jumb_25_for_new_1"  onChange="display_child_count6(this.value)">
        <option value="0">0</option>
        <option value="1">1</option>
        <option value="2">2</option> 
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        </select>
        </p>
        </div>
        </DIV>
        <DIV class="check_149" id="age7" style="display:none;">
        <div class="AGE_OF2">Age Of Child 1</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1"  >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <DIV class="check_149"  id="age72"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 2</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <DIV class="check_149"  id="age73"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 3</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <DIV class="check_149"  id="age74"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 4</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <DIV class="check_149"  id="age75"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 5</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <DIV class="check_149"  id="age76"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 6</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
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
        if($_SESSION['room_count']==8 || $_SESSION['room_count']==9 || $_SESSION['room_count']==10)
        {
        ?>
        <div class="check_139	 ml17" style="float:right;  margin-right:4px" id="room8">
        <DIV class="check_139" >
        <!--<div class="rooms_left"></div>-->
        <div class="wi40" style="height: auto;">
        <p></p>
        <p>
        <select name="adult[]" id="jumpMenu2" class="jumb_25_for_new_1 pl5">
        <?php $s_adult7 = $_SESSION['org_adult'][7]; ?>
        <option value="0" <?php if($s_adult7==0) { ?>selected="selected" <?php } ?>>0</option>
        <option value="1" <?php if($s_adult7==1) { ?>selected="selected" <?php } ?>>1</option>
        <option value="2" <?php if($s_adult7==2) { ?>selected="selected" <?php } ?>>2</option>
        <option value="3" <?php if($s_adult7==3) { ?>selected="selected" <?php } ?>>3</option>
        <option value="4" <?php if($s_adult7==4) { ?>selected="selected" <?php } ?>>4</option>
        <option value="5" <?php if($s_adult7==5) { ?>selected="selected" <?php } ?>>5</option>
        <option value="6" <?php if($s_adult7==6) { ?>selected="selected" <?php } ?>>6</option>
        <option value="7" <?php if($s_adult7==7) { ?>selected="selected" <?php } ?>>7</option>
        <option value="8" <?php if($s_adult7==8) { ?>selected="selected" <?php } ?>>8</option>
        <option value="9" <?php if($s_adult7==9) { ?>selected="selected" <?php } ?>>9</option>
        <option value="10" <?php if($s_adult7==10) { ?>selected="selected" <?php } ?>>10</option>
        <option value="11" <?php if($s_adult7==11) { ?>selected="selected" <?php } ?>>11</option>
        <option value="12" <?php if($s_adult7==12) { ?>selected="selected" <?php } ?>>12</option>
        </select>
        </p>
        </div>
        <div class="wi40 padding_le ml10">
        <p id="child_header3"></p>
        <p>
        <select name="child[]" id="inputfiled1_3"  class="jumb_25_for_new_1"  onChange="display_child_count7(this.value)">
        <?php $s_child7 = $_SESSION['org_child'][7]; ?>
        <option value="0" <?php if($s_child7==0) { ?>selected="selected" <?php } ?>>0</option>
        <option value="1" <?php if($s_child7==1) { ?>selected="selected" <?php } ?>>1</option>
        <option value="2" <?php if($s_child7==2) { ?>selected="selected" <?php } ?>>2</option>
        <option value="3" <?php if($s_child7==3) { ?>selected="selected" <?php } ?>>3</option>
        <option value="4" <?php if($s_child7==4) { ?>selected="selected" <?php } ?>>4</option>
        <option value="5" <?php if($s_child7==5) { ?>selected="selected" <?php } ?>>5</option>
        <option value="6" <?php if($s_child7==6) { ?>selected="selected" <?php } ?>>6</option>
        </select>
        </p>
        </div>
        </DIV>
        <?php
        if($s_child7  == 1 || $s_child7  == 2 || $s_child7  == 3 || $s_child7  == 4 || $s_child7  == 5 || $s_child7  == 6)
        {
        ?>
        <DIV class="check_149" id="age8" >
        <div class="AGE_OF2">Age Of Child 1</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1"  >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>" <?php if($_SESSION['child_age'][42]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
        <?php }
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
        <DIV class="check_149" id="age8" style="display:none;">
        <div class="AGE_OF2">Age Of Child 1</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1"  >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <?php
        }
        
        if($s_child7  == 2 || $s_child7  == 3 || $s_child7  == 4 || $s_child7  == 5 || $s_child7  == 6)
        {
        ?>
        <DIV class="check_149"  id="age82" >
        <div class="AGE_OF2">Age Of Child 2</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>" <?php if($_SESSION['child_age'][43]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
        <?php }
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
        <DIV class="check_149"  id="age82"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 2</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <?php
        }
        ?>
        <?php
        if($s_child7  == 3 || $s_child7  == 4 || $s_child7  == 5 || $s_child7  == 6)
        { 	
        ?>
        <DIV class="check_149"  id="age83" >
        <div class="AGE_OF2">Age Of Child 3</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>" <?php if($_SESSION['child_age'][44]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
        <?php }
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
        <DIV class="check_149"  id="age83"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 3</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <?php
        }
        ?>
        <?php
        if($s_child7  == 4 || $s_child7  == 5 || $s_child7  == 6)
        { 	
        ?>
        <DIV class="check_149"  id="age84" >
        <div class="AGE_OF2">Age Of Child 4</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>" <?php if($_SESSION['child_age'][45]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
        <?php }
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
        <DIV class="check_149"  id="age84"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 4</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <?php
        }
        ?>
        <?php
        if($s_child7  == 5 || $s_child7  == 6)
        { 	
        ?>
        <DIV class="check_149"  id="age85" >
        <div class="AGE_OF2">Age Of Child 5</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>" <?php if($_SESSION['child_age'][46]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
        <?php }
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
        <DIV class="check_149"  id="age85"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 5</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <?php
        }
        ?>
        <?php
        if($s_child7  == 6)
        { 	
        ?>
        <DIV class="check_149"  id="age86" >
        <div class="AGE_OF2">Age Of Child 6</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>" <?php if($_SESSION['child_age'][47]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
        <?php }
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
        <DIV class="check_149"  id="age86"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 6</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
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
        <div class="check_139	 ml17" style="float:right; display:none; margin-right:4px" id="room8">
        <DIV class="check_139" >
        <!--<div class="rooms_left"></div>-->
        <div class="wi40" style="height: auto;">
        <p></p>
        <p>
        <select name="adult[]" id="jumpMenu2" class="jumb_25_for_new_1 pl5">
        <option value="0">0</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        </select>
        </p>
        </div>
        <div class="wi40 padding_le ml10">
        <p id="child_header3"></p>
        <p>
        <select name="child[]" id="inputfiled1_3"  class="jumb_25_for_new_1"  onChange="display_child_count7(this.value)">
        <option value="0">0</option>
        <option value="1">1</option>
        <option value="2">2</option> 
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        </select>
        </p>
        </div>
        </DIV>
        <DIV class="check_149" id="age8" style="display:none;">
        <div class="AGE_OF2">Age Of Child 1</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1"  >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <DIV class="check_149"  id="age82"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 2</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <DIV class="check_149"  id="age83"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 3</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <DIV class="check_149"  id="age84"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 4</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <DIV class="check_149"  id="age85"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 5</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <DIV class="check_149"  id="age86"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 6</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
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
        if($_SESSION['room_count']==9 || $_SESSION['room_count']==10)
        {
        ?>
        <div class="check_139	 ml17" style="float:right;  margin-right:4px" id="room9">
        <DIV class="check_139" >
        <!--<div class="rooms_left"></div>-->
        <div class="wi40" style="height: auto;">
        <p></p>
        <p>
        <select name="adult[]" id="jumpMenu2" class="jumb_25_for_new_1 pl5">
        <?php $s_adult8 = $_SESSION['org_adult'][8]; ?>
        <option value="0" <?php if($s_adult8==0) { ?>selected="selected" <?php } ?>>0</option>
        <option value="1" <?php if($s_adult8==1) { ?>selected="selected" <?php } ?>>1</option>
        <option value="2" <?php if($s_adult8==2) { ?>selected="selected" <?php } ?>>2</option>
        <option value="3" <?php if($s_adult8==3) { ?>selected="selected" <?php } ?>>3</option>
        <option value="4" <?php if($s_adult8==4) { ?>selected="selected" <?php } ?>>4</option>
        <option value="5" <?php if($s_adult8==5) { ?>selected="selected" <?php } ?>>5</option>
        <option value="6" <?php if($s_adult8==6) { ?>selected="selected" <?php } ?>>6</option>
        <option value="7" <?php if($s_adult8==7) { ?>selected="selected" <?php } ?>>7</option>
        <option value="8" <?php if($s_adult8==8) { ?>selected="selected" <?php } ?>>8</option>
        <option value="9" <?php if($s_adult8==9) { ?>selected="selected" <?php } ?>>9</option>
        <option value="10" <?php if($s_adult8==10) { ?>selected="selected" <?php } ?>>10</option>
        <option value="11" <?php if($s_adult8==11) { ?>selected="selected" <?php } ?>>11</option>
        <option value="12" <?php if($s_adult8==12) { ?>selected="selected" <?php } ?>>12</option>
        </select>
        </p>
        </div>
        <div class="wi40 padding_le ml10">
        <p id="child_header3"></p>
        <p>
        <select name="child[]" id="inputfiled1_3"  class="jumb_25_for_new_1"  onChange="display_child_count8(this.value)">
        <?php $s_child8 = $_SESSION['org_child'][8]; ?>
        <option value="0" <?php if($s_child8==0) { ?>selected="selected" <?php } ?>>0</option>
        <option value="1" <?php if($s_child8==1) { ?>selected="selected" <?php } ?>>1</option>
        <option value="2" <?php if($s_child8==2) { ?>selected="selected" <?php } ?>>2</option>
        <option value="3" <?php if($s_child8==3) { ?>selected="selected" <?php } ?>>3</option>
        <option value="4" <?php if($s_child8==4) { ?>selected="selected" <?php } ?>>4</option>
        <option value="5" <?php if($s_child8==5) { ?>selected="selected" <?php } ?>>5</option>
        <option value="6" <?php if($s_child8==6) { ?>selected="selected" <?php } ?>>6</option>
        </select>
        </p>
        </div>
        </DIV>
        <?php
        if($s_child8  == 1 || $s_child8  == 2 || $s_child8  == 3 || $s_child8  == 4 || $s_child8  == 5 || $s_child8  == 6)
        {
        ?>
        <DIV class="check_149" id="age9" >
        <div class="AGE_OF2">Age Of Child 1</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1"  >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>" <?php if($_SESSION['child_age'][48]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
        <?php }
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
        <DIV class="check_149" id="age9" style="display:none;">
        <div class="AGE_OF2">Age Of Child 1</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1"  >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <?php
        }
        
        if($s_child8  == 2 || $s_child8  == 3 || $s_child8  == 4 || $s_child8  == 5 || $s_child8  == 6)
        {
        ?>
        <DIV class="check_149"  id="age92" >
        <div class="AGE_OF2">Age Of Child 2</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>" <?php if($_SESSION['child_age'][49]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
        <?php }
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
        <DIV class="check_149"  id="age92"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 2</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <?php
        }
        ?>
        <?php
        if($s_child8  == 3 || $s_child8  == 4 || $s_child8  == 5 || $s_child8  == 6)
        { 	
        ?>
        <DIV class="check_149"  id="age93" >
        <div class="AGE_OF2">Age Of Child 3</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>" <?php if($_SESSION['child_age'][50]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
        <?php }
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
        <DIV class="check_149"  id="age93"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 3</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <?php
        }
        ?>
        <?php
        if($s_child8  == 4 || $s_child8  == 5 || $s_child8  == 6)
        { 	
        ?>
        <DIV class="check_149"  id="age94" >
        <div class="AGE_OF2">Age Of Child 4</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>" <?php if($_SESSION['child_age'][51]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
        <?php }
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
        <DIV class="check_149"  id="age94"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 4</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <?php
        }
        ?>
        <?php
        if($s_child8  == 5 || $s_child8  == 6)
        { 	
        ?>
        <DIV class="check_149"  id="age95" >
        <div class="AGE_OF2">Age Of Child 5</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>" <?php if($_SESSION['child_age'][52]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
        <?php }
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
        <DIV class="check_149"  id="age95"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 5</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <?php
        }
        ?>
        <?php
        if($s_child8  == 6)
        { 	
        ?>
        <DIV class="check_149"  id="age96" >
        <div class="AGE_OF2">Age Of Child 6</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>" <?php if($_SESSION['child_age'][53]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
        <?php }
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
        <DIV class="check_149"  id="age96"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 6</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
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
        <div class="check_139	 ml17" style="float:right; display:none; margin-right:4px" id="room9">
        <DIV class="check_139" >
        <!--<div class="rooms_left"></div>-->
        <div class="wi40" style="height: auto;">
        <p></p>
        <p>
        <select name="adult[]" id="jumpMenu2" class="jumb_25_for_new_1 pl5">
        <option value="0">0</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        </select>
        </p>
        </div>
        <div class="wi40 padding_le ml10">
        <p id="child_header3"></p>
        <p>
        <select name="child[]" id="inputfiled1_3"  class="jumb_25_for_new_1"  onChange="display_child_count8(this.value)">
        <option value="0">0</option>
        <option value="1">1</option>
        <option value="2">2</option> 
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        </select>
        </p>
        </div>
        </DIV>
        <DIV class="check_149" id="age9" style="display:none;">
        <div class="AGE_OF2">Age Of Child 1</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1"  >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <DIV class="check_149"  id="age92"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 2</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <DIV class="check_149"  id="age93"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 3</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <DIV class="check_149"  id="age94"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 4</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <DIV class="check_149"  id="age95"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 5</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <DIV class="check_149"  id="age96"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 6</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
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
        if($_SESSION['room_count']==10)
        {
        ?>
        <div class="check_139	 ml17" style="float:right;  margin-right:4px" id="room10">
        <DIV class="check_139" >
        <!--<div class="rooms_left"></div>-->
        <div class="wi40" style="height: auto;">
        <p></p>
        <p>
        <select name="adult[]" id="jumpMenu2" class="jumb_25_for_new_1 pl5">
        <?php $s_adult9 = $_SESSION['org_adult'][9]; ?>
        <option value="0" <?php if($s_adult9==0) { ?>selected="selected" <?php } ?>>0</option>
        <option value="1" <?php if($s_adult9==1) { ?>selected="selected" <?php } ?>>1</option>
        <option value="2" <?php if($s_adult9==2) { ?>selected="selected" <?php } ?>>2</option>
        <option value="3" <?php if($s_adult9==3) { ?>selected="selected" <?php } ?>>3</option>
        <option value="4" <?php if($s_adult9==4) { ?>selected="selected" <?php } ?>>4</option>
        <option value="5" <?php if($s_adult9==5) { ?>selected="selected" <?php } ?>>5</option>
        <option value="6" <?php if($s_adult9==6) { ?>selected="selected" <?php } ?>>6</option>
        <option value="7" <?php if($s_adult9==7) { ?>selected="selected" <?php } ?>>7</option>
        <option value="8" <?php if($s_adult9==8) { ?>selected="selected" <?php } ?>>8</option>
        <option value="9" <?php if($s_adult9==9) { ?>selected="selected" <?php } ?>>9</option>
        <option value="10" <?php if($s_adult9==10) { ?>selected="selected" <?php } ?>>10</option>
        <option value="11" <?php if($s_adult9==11) { ?>selected="selected" <?php } ?>>11</option>
        <option value="12" <?php if($s_adult9==12) { ?>selected="selected" <?php } ?>>12</option>
        </select>
        </p>
        </div>
        <div class="wi40 padding_le ml10">
        <p id="child_header3"></p>
        <p>
        <select name="child[]" id="inputfiled1_3"  class="jumb_25_for_new_1"  onChange="display_child_count9(this.value)">
        <?php $s_child9 = $_SESSION['org_child'][9]; ?>
        <option value="0" <?php if($s_child9==0) { ?>selected="selected" <?php } ?>>0</option>
        <option value="1" <?php if($s_child9==1) { ?>selected="selected" <?php } ?>>1</option>
        <option value="2" <?php if($s_child9==2) { ?>selected="selected" <?php } ?>>2</option>
        <option value="3" <?php if($s_child9==3) { ?>selected="selected" <?php } ?>>3</option>
        <option value="4" <?php if($s_child9==4) { ?>selected="selected" <?php } ?>>4</option>
        <option value="5" <?php if($s_child9==5) { ?>selected="selected" <?php } ?>>5</option>
        <option value="6" <?php if($s_child9==6) { ?>selected="selected" <?php } ?>>6</option>
        </select>
        </p>
        </div>
        </DIV>
        <?php
        if($s_child9  == 1 || $s_child9  == 2 || $s_child9  == 3 || $s_child9  == 4 || $s_child9  == 5 || $s_child9  == 6)
        {
        ?>
        <DIV class="check_149" id="age101" >
        <div class="AGE_OF2">Age Of Child 1</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1"  >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>" <?php if($_SESSION['child_age'][54]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
        <?php }
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
        <DIV class="check_149" id="age101" style="display:none;">
        <div class="AGE_OF2">Age Of Child 1</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1"  >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <?php
        }
        
        if($s_child9  == 2 || $s_child9  == 3 || $s_child9  == 4 || $s_child9  == 5 || $s_child9  == 6)
        {
        ?>
        <DIV class="check_149"  id="age102" >
        <div class="AGE_OF2">Age Of Child 2</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>" <?php if($_SESSION['child_age'][55]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
        <?php }
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
        <DIV class="check_149"  id="age102"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 2</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <?php
        }
        ?>
        <?php
        if($s_child9  == 3 || $s_child9  == 4 || $s_child9  == 5 || $s_child9  == 6)
        { 	
        ?>
        <DIV class="check_149"  id="age103" >
        <div class="AGE_OF2">Age Of Child 3</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>" <?php if($_SESSION['child_age'][56]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
        <?php }
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
        <DIV class="check_149"  id="age103"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 3</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <?php
        }
        ?>
        <?php
        if($s_child9  == 4 || $s_child9  == 5 || $s_child9  == 6)
        { 	
        ?>
        <DIV class="check_149"  id="age104" >
        <div class="AGE_OF2">Age Of Child 4</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>" <?php if($_SESSION['child_age'][57]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
        <?php }
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
        <DIV class="check_149"  id="age104"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 4</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <?php
        }
        ?>
        <?php
        if($s_child9  == 5 || $s_child9  == 6)
        { 	
        ?>
        <DIV class="check_149"  id="age105" >
        <div class="AGE_OF2">Age Of Child 5</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>" <?php if($_SESSION['child_age'][58]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
        <?php }
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
        <DIV class="check_149"  id="age105"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 5</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <?php
        }
        ?>
        <?php
        if($s_child9  == 6)
        { 	
        ?>
        <DIV class="check_149"  id="age106" >
        <div class="AGE_OF2">Age Of Child 6</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>" <?php if($_SESSION['child_age'][59]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
        <?php }
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
        <DIV class="check_149"  id="age106"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 6</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
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
        <div class="check_139	 ml17" style="float:right; display:none; margin-right:4px" id="room10">
        <DIV class="check_139" >
        <!--<div class="rooms_left"></div>-->
        <div class="wi40" style="height: auto;">
        <p></p>
        <p>
        <select name="adult[]" id="jumpMenu2" class="jumb_25_for_new_1 pl5">
        <option value="0">0</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        </select>
        </p>
        </div>
        <div class="wi40 padding_le ml10">
        <p id="child_header3"></p>
        <p>
        <select name="child[]" id="inputfiled1_3"  class="jumb_25_for_new_1"  onChange="display_child_count9(this.value)">
        <option value="0">0</option>
        <option value="1">1</option>
        <option value="2">2</option> 
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        </select>
        </p>
        </div>
        </DIV>
        <DIV class="check_149" id="age101" style="display:none;">
        <div class="AGE_OF2">Age Of Child 1</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1"  >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <DIV class="check_149"  id="age102"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 2</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <DIV class="check_149"  id="age103"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 3</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <DIV class="check_149"  id="age104"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 4</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <DIV class="check_149"  id="age105"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 5</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
        ?>
        </select>
        </p>
        </div>
        </DIV>
        <DIV class="check_149"  id="age106"  style="display:none;">
        <div class="AGE_OF2">Age Of Child 6</div>
        <div class="wi40 padding_le">
        <p></p>
        <p>
        <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
		<?php for($i=0;$i< 13 ;$i++)
        { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php }
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
    <p style="padding-left:15px;"><a href="javascript:void(0);" class="home_link">Home</a> / <a href="<?php echo WEB_URL.'b2b_hotel/country_search/'.$con; ?>" class="home_link"><?php echo $city[1]; ?></a> / <a href="javascript:void(0);" class="home_link"><?php echo $city[0]; ?></a></p>
    </div>
    <div class="searchlinksphone"><span style="padding-left:10px; font-family:MAIAN;">Have A Question</span> <span style="padding-left:70px; font-family:MAIAN;"><strong>+971 6 5573813</strong></span></div>
    </div>
    
    <div  id="my_fav_id">
    

    </div>
    <div style="width:725px;">
   
    <div style="width:600px; float:left;margin-top: 10px;"><h1><span id="result_count"></span>
    &nbsp;Hotels Availables in <?php echo$_SESSION['city']; ?> </h1></div>
    <div style="width:100px; float:right; margin-top:10px; font-family:MAIAN;"><img src="<?php echo WEB_DIR; ?>images/map_icon.png" width="22" height="22" align="top" /> <a style="color:#06F; text-decoration:none;" href="<?php print WEB_URL.'b2b_hotel/mapping_fun_all/'; ?> "  onclick="$('#rlightbox').show();" target="rlight_box" class="text3">Showmap</a></div>
    
    </div>
    <h1>&nbsp;</h1>
    <div class="sortby">
      <div class="sortbytext">Sort BY:</div>
    <div class="sortbytextrate"><a href="javascript:void(0);"  id="price_asc"><img src="<?php echo WEB_DIR; ?>images/uparror.png" width="8" height="10" /></a><span class="pricespace">Price</span><a href="javascript:void(0);"  id='price_desc'><img src="<?php echo WEB_DIR; ?>images/downarror.png" width="8" height="10" /></a></div>
    <div class="sortbytextrateone"><a href="javascript:void(0);"  id="star_asc" oonclick="javascript:return  hotel_fac_sorting('star_asc')" ><img src="<?php echo WEB_DIR; ?>images/uparror.png" width="8" height="10" /></a><span class="pricespace">Star Rating</span><a href="javascript:void(0);"  id="star_desc" oonclick="javascript:return  hotel_fac_sorting('star_desc')"><img src="<?php echo WEB_DIR; ?>images/downarror.png" width="8" height="10" /></a></div>
    <div class="sortbytextrateone"><a href="javascript:void(0);"  id="name_asc" oonclick="javascript:return  hotel_fac_sorting('name_asc')"><img src="<?php echo WEB_DIR; ?>images/uparror.png" width="8" height="10" /></a><span class="pricespace">Hotel Name</span><a href="javascript:void(0);"  id="name_desc" oonclick="javascript:return  hotel_fac_sorting('name_desc')"><img src="<?php echo WEB_DIR; ?>images/downarror.png" width="8" height="10" /></a></div>
  <style>
  ull {
 
}
ull lii {
  display: block;
  position: relative;
  float: left;
}
lii ull { display: none; }
ull lii a {
  display: block;

}
ull lii a:hover {  }
lii:hover ull {
  display: block;
  position: absolute;
}
lii:hover lii {
  float: none;
  font-size: 11px;
}
lii:hover a { background: #617F8A; }
lii:hover lii a:hover { background: #95A9B1; }
</style>  <div class="sortbytextrate"><span class="pricespace">
  
 Currency
  
    
    </span></div>
    <div class="nextpage"><div class="pagination" style="line-height:17px; padding-top:0px; padding-left:4px; margin-top:-9px;">
             <div class="data"></div>
				
	  </div></div>
            <!--<div style="width:100%; float:left; min-height:25px; "><table style="font-family:MAIAN;" width="100%" border="0" cellspacing="2" cellpadding="0"  >
  <tr>
    <td align="center" bgcolor="#D6D6D6">Rate Matrix</td>
    <td align="center" bgcolor="#EAEAEA">No Star</td>
    <td align="center" bgcolor="#EAEAEA">1-Star</td>
    <td align="center" bgcolor="#EAEAEA">2-Star</td>
    <td align="center" bgcolor="#EAEAEA">3-Star</td>
    <td align="center" bgcolor="#EAEAEA">4-Star</td>
    <td align="center" bgcolor="#EAEAEA">5-Star</td>
  </tr>
  <tr>
    <td align="center" bgcolor="#EAEAEA">0 - 100</td>
    <td bgcolor="#F5F5F5" align="center"><span id="p_0"><img src="<?php echo WEB_DIR; ?>images/ajax-loader(5).gif" /></span></td>
    <td bgcolor="#F5F5F5" align="center"><span id="p_00"><img src="<?php echo WEB_DIR; ?>images/ajax-loader(5).gif" /></span></td>
    <td bgcolor="#F5F5F5" align="center"><span id="p_01"><img src="<?php echo WEB_DIR; ?>images/ajax-loader(5).gif" /></span></td>
    <td bgcolor="#F5F5F5" align="center"><span id="p_02"><img src="<?php echo WEB_DIR; ?>images/ajax-loader(5).gif" /></span></td>
    <td bgcolor="#F5F5F5" align="center"><span id="p_03"><img src="<?php echo WEB_DIR; ?>images/ajax-loader(5).gif" /></span></td>
    <td bgcolor="#F5F5F5" align="center"><span id="p_04"><img src="<?php echo WEB_DIR; ?>images/ajax-loader(5).gif" /></span></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#EAEAEA">100 - 200</td>
     <td bgcolor="#F5F5F5" align="center"><span id="p_1"><img src="<?php echo WEB_DIR; ?>images/ajax-loader(5).gif" /></span></td>
    <td bgcolor="#F5F5F5" align="center"><span id="p_10"><img src="<?php echo WEB_DIR; ?>images/ajax-loader(5).gif" /></span></td>
    <td bgcolor="#F5F5F5" align="center"><span id="p_11"><img src="<?php echo WEB_DIR; ?>images/ajax-loader(5).gif" /></span></td>
    <td bgcolor="#F5F5F5" align="center"><span id="p_12"><img src="<?php echo WEB_DIR; ?>images/ajax-loader(5).gif" /></span></td>
    <td bgcolor="#F5F5F5" align="center"><span id="p_13"><img src="<?php echo WEB_DIR; ?>images/ajax-loader(5).gif" /></span></td>
    <td bgcolor="#F5F5F5" align="center"><span id="p_14"><img src="<?php echo WEB_DIR; ?>images/ajax-loader(5).gif" /></span></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#EAEAEA">200 - 300</td>
     <td bgcolor="#F5F5F5" align="center"><span id="p_2"><img src="<?php echo WEB_DIR; ?>images/ajax-loader(5).gif" /></span></td>
    <td bgcolor="#F5F5F5" align="center"><span id="p_20"><img src="<?php echo WEB_DIR; ?>images/ajax-loader(5).gif" /></span></td>
    <td bgcolor="#F5F5F5" align="center"><span id="p_21"><img src="<?php echo WEB_DIR; ?>images/ajax-loader(5).gif" /></span></td>
    <td bgcolor="#F5F5F5" align="center"><span id="p_22"><img src="<?php echo WEB_DIR; ?>images/ajax-loader(5).gif" /></span></td>
    <td bgcolor="#F5F5F5" align="center"><span id="p_23"><img src="<?php echo WEB_DIR; ?>images/ajax-loader(5).gif" /></span></td>
    <td bgcolor="#F5F5F5" align="center"><span id="p_24"><img src="<?php echo WEB_DIR; ?>images/ajax-loader(5).gif" /></span></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#EAEAEA">300 - 500</td>
     <td bgcolor="#F5F5F5" align="center"><span id="p_3"><img src="<?php echo WEB_DIR; ?>images/ajax-loader(5).gif" /></span></td>
    <td bgcolor="#F5F5F5" align="center"><span id="p_30"><img src="<?php echo WEB_DIR; ?>images/ajax-loader(5).gif" /></span></td>
    <td bgcolor="#F5F5F5" align="center"><span id="p_31"><img src="<?php echo WEB_DIR; ?>images/ajax-loader(5).gif" /></span></td>
    <td bgcolor="#F5F5F5" align="center"><span id="p_32"><img src="<?php echo WEB_DIR; ?>images/ajax-loader(5).gif" /></span></td>
    <td bgcolor="#F5F5F5" align="center"><span id="p_33"><img src="<?php echo WEB_DIR; ?>images/ajax-loader(5).gif" /></span></td>
    <td bgcolor="#F5F5F5" align="center"><span id="p_34"><img src="<?php echo WEB_DIR; ?>images/ajax-loader(5).gif" /></span></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#EAEAEA">500 - 500+</td>
     <td bgcolor="#F5F5F5" align="center"><span id="p_4"><img src="<?php echo WEB_DIR; ?>images/ajax-loader(5).gif" /></span></td>
    <td bgcolor="#F5F5F5" align="center"><span id="p_40"><img src="<?php echo WEB_DIR; ?>images/ajax-loader(5).gif" /></span></td>
    <td bgcolor="#F5F5F5" align="center"><span id="p_41"><img src="<?php echo WEB_DIR; ?>images/ajax-loader(5).gif" /></span></td>
    <td bgcolor="#F5F5F5" align="center"><span id="p_42"><img src="<?php echo WEB_DIR; ?>images/ajax-loader(5).gif" /></span></td>
    <td bgcolor="#F5F5F5" align="center"><span id="p_43"><img src="<?php echo WEB_DIR; ?>images/ajax-loader(5).gif" /></span></td>
    <td bgcolor="#F5F5F5" align="center"><span id="p_44"><img src="<?php echo WEB_DIR; ?>images/ajax-loader(5).gif" /></span></td>
  </tr>
</table>
 </div>-->
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
          <strong>No records found!!! Please try again in few moments</strong></td>
      </tr>
      <tr><td>&nbsp;</td></tr>
      <tr><td align="left"><div>
      <strong>What now? Call us and we'll help you find a hotel:</strong>
     <br />
          Speak to a Travel Bay.com travel specialist: <strong>000 00 000 (India Toll Free) +91 124 487 3878 (From abroad)</strong>,&nbsp;24 Hours,&nbsp;toll free
        
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
  
</div>

</div>

</div>


<div style="clear:both;"></div>
<?php $this->load->view('b2b/footer'); ?>
</body>
</html>
 
