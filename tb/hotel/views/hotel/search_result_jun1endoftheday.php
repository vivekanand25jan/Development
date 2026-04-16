<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="<?php echo WEB_DIR ?>css/postion.css" rel="stylesheet" type="text/css" /> 
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
					
	//var a = [];','gta','hotelsbed
	var a = ['hotelsbed'];
	  var i = 0;
	  $('#loading').fadeIn();
	 
	  function nextCall() {
		if(i == a.length) {
			$('#loading').fadeOut();
			$('#loading_image').fadeOut();
			$('#loading_result').fadeIn();
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
						var r = Math.round(ui.values[ 0 ] / <?php echo $this->session->userdata('currency_value');?>);
						var rr = Math.round(ui.values[ 1 ] / <?php echo $this->session->userdata('currency_value');?>);
						$( "#amount_dummy" ).val( "<?php echo $this->session->userdata('currency');?> " + ui.values[ 0 ] + "  to  <?php echo $this->session->userdata('currency');?> " + ui.values[ 1 ] );
						$( "#amount" ).val( "USD " + r + "  to  USD " + rr );
					},
					  change: function( event, ui ) {
					  if (event.originalEvent) {
					  	filterPriceStar();
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
                           loadData(1);            
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
                        
                      // For first time page load default results
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
					$("#priceStarts").html(data.min_val);
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
		total +=document.leftfilter.hotel_fac_val[i].value + ", +"
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
		
		function price_rating_asc()
{
		$.ajax({
				  url:'<?php echo WEB_URL; ?>hotel/asc_order_price_new',
				 
				  dataType: "json",
				  beforeSend:function(){
				  $("#result").empty().html('<div style="background-color:#FFF" align="middle"><img src=\'<?php print WEB_DIR ?>gui/images/loading.gif\'></div>');
				  },
				  success: function(data){
					$('#result').html(data.hotel_search_result);
					//$("#priceStarts").html(data.low_val);
					//$("#result_count").html(data.total_result);
					//alert(data.min_val);
					 
				  },
				  error:function(request, status, error){
					// failed request; give feedback to user
					$('#result').html('<p class="error"><strong>Oops!</strong> Try that again in a few moments.</p>');
				  }
				  
				});
	  // Put an animated GIF image insight of content


  // Make AJAX call
 // $("#result").load("<?php print WEB_URL ?>hotel/asc_order_price_new");


}


		function price_rating_desc()
{
		$.ajax({
				  url:'<?php echo WEB_URL; ?>hotel/desc_order_price_new',
				 
				  dataType: "json",
				  beforeSend:function(){
				  $("#result").empty().html('<div style="background-color:#FFF" align="middle"><img src=\'<?php print WEB_DIR ?>gui/images/loading.gif\'></div>');
				  },
				  success: function(data){
					$('#result').html(data.hotel_search_result);
					//$("#priceStarts").html(data.low_val);
					//$("#result_count").html(data.total_result);
					//alert(data.min_val);
				
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
                                url: "<?php echo WEB_URL.'hotel/pagination_call_desc'; ?>",
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
							loadData(1);
				  },
				  error:function(request, status, error){
					// failed request; give feedback to user
					$('#result').html('<p class="error"><strong>Oops!</strong> Try that again in a few moments.</p>');
				  }
				
				 
				});
				
	  // Put an animated GIF image insight of content


  // Make AJAX call
 // $("#result").load("<?php print WEB_URL ?>hotel/asc_order_price_new");


}


	function name_rating_asc()
{
		$.ajax({
				  url:'<?php echo WEB_URL; ?>hotel/asc_order_name_new',
				 
				  dataType: "json",
				  beforeSend:function(){
				  $("#result").empty().html('<div style="background-color:#FFF" align="middle"><img src=\'<?php print WEB_DIR ?>gui/images/loading.gif\'></div>');
				  },
				  success: function(data){
					$('#result').html(data.hotel_search_result);
					//$("#priceStarts").html(data.low_val);
					//$("#result_count").html(data.total_result);
					//alert(data.min_val);
					 
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
                                url: "<?php echo WEB_URL.'hotel/pagination_name_asc'; ?>",
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
							loadData(1);
				  },
				  error:function(request, status, error){
					// failed request; give feedback to user
					$('#result').html('<p class="error"><strong>Oops!</strong> Try that again in a few moments.</p>');
				  }
				  
				});
	  // Put an animated GIF image insight of content


  // Make AJAX call
 // $("#result").load("<?php print WEB_URL ?>hotel/asc_order_price_new");


}

	function star_rating_asc()
{
		$.ajax({
				  url:'<?php echo WEB_URL; ?>hotel/asc_order_star_new',
				 
				  dataType: "json",
				  beforeSend:function(){
				  $("#result").empty().html('<div style="background-color:#FFF" align="middle"><img src=\'<?php print WEB_DIR ?>gui/images/loading.gif\'></div>');
				  },
				  success: function(data){
					$('#result').html(data.hotel_search_result);
					//$("#priceStarts").html(data.low_val);
					//$("#result_count").html(data.total_result);
					//alert(data.min_val);
					 
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
                                url: "<?php echo WEB_URL.'hotel/pagination_star_asc'; ?>",
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
							loadData(1);
				  },
				  error:function(request, status, error){
					// failed request; give feedback to user
					$('#result').html('<p class="error"><strong>Oops!</strong> Try that again in a few moments.</p>');
				  }
				  
				});
	  // Put an animated GIF image insight of content


  // Make AJAX call
 // $("#result").load("<?php print WEB_URL ?>hotel/asc_order_price_new");


}

	function star_rating_desc()
{
		$.ajax({
				  url:'<?php echo WEB_URL; ?>hotel/desc_order_star_new',
				 
				  dataType: "json",
				  beforeSend:function(){
				  $("#result").empty().html('<div style="background-color:#FFF" align="middle"><img src=\'<?php print WEB_DIR ?>gui/images/loading.gif\'></div>');
				  },
				  success: function(data){
					$('#result').html(data.hotel_search_result);
					//$("#priceStarts").html(data.low_val);
					//$("#result_count").html(data.total_result);
					//alert(data.min_val);
					 
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
                                url: "<?php echo WEB_URL.'hotel/pagination_star_desc'; ?>",
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
							loadData(1);
				  },
				  error:function(request, status, error){
					// failed request; give feedback to user
					$('#result').html('<p class="error"><strong>Oops!</strong> Try that again in a few moments.</p>');
				  }
				  
				});
	  // Put an animated GIF image insight of content


  // Make AJAX call
 // $("#result").load("<?php print WEB_URL ?>hotel/asc_order_price_new");


}

	function name_rating_desc()
{
	
		$.ajax({
				  url:'<?php echo WEB_URL; ?>hotel/desc_order_name_new',
				 
				  dataType: "json",
				  beforeSend:function(){
				  $("#result").empty().html('<div style="background-color:#FFF" align="middle"><img src=\'<?php print WEB_DIR ?>gui/images/loading.gif\'></div>');
				  },
				  success: function(data){
					$('#result').html(data.hotel_search_result);
					//$("#priceStarts").html(data.low_val);
					//$("#result_count").html(data.total_result);
					//alert(data.min_val);
					 
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
                                url: "<?php echo WEB_URL.'hotel/pagination_name_desc'; ?>",
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
							loadData(1);
				  },
				  error:function(request, status, error){
					// failed request; give feedback to user
					$('#result').html('<p class="error"><strong>Oops!</strong> Try that again in a few moments.</p>');
				  }
				  
				});
	  // Put an animated GIF image insight of content


  // Make AJAX call
 // $("#result").load("<?php print WEB_URL ?>hotel/asc_order_price_new");


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
				 function rrr1_desc(id)
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
		  
            
        xmlhttp.open("POST","<?php print WEB_URL ?>hotel/all_filter_new1_desc/"+id,true);
        xmlhttp.send();
        
        
       
             
                }
				 function name_asc(id)
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
		  
            
        xmlhttp.open("POST","<?php print WEB_URL ?>hotel/all_filter_name_asc/"+id,true);
        xmlhttp.send();
        
        
       
             
                }
				 function name_desc(id)
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
		  
            
        xmlhttp.open("POST","<?php print WEB_URL ?>hotel/all_filter_name_desc/"+id,true);
        xmlhttp.send();
        
        
       
             
                }
				
				 function star_asc(id)
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
		  
            
        xmlhttp.open("POST","<?php print WEB_URL ?>hotel/all_filter_star_asc/"+id,true);
        xmlhttp.send();
        
        
       
             
                }
				 function star_desc(id)
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
		  
            
        xmlhttp.open("POST","<?php print WEB_URL ?>hotel/all_filter_star_desc/"+id,true);
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
                 	<?php  echo $this->load->view('header'); ?>
                    <div class="inner_banner"><img src="<?php echo WEB_DIR ?>images/inner_banner.jpg" width="979" height="230" /></div>
                    <div class="content_cover">
                    <form  name="leftfilter"  id="hotels-results-form">
                    		<div class="left_pannel">
                            		<div class="left_pannel_head">
                                    <div class="left_pannel_head_inner" style="padding-left: 28px;">
                                    <div  id="loading_image" style="margin-left:-18px; padding-top:10px;">
                                    <font color="#FFFFFF" size="+1">&nbsp;&nbsp; <strong>Loading...</strong></font>
                                    <div class="gif_animation" >
                                            <img src="<?php echo WEB_DIR ?>images/ajax-loader-index.gif" width="220" height="30"  />
                                            </div>
                                            <br /><br /> <br /><br /> <br /><br />
                                            </div>
                                    		<h1><b>Hotels starting at <?php echo $this->session->userdata('currency'); ?></b></h1>
                                            <h2><div id="priceStarts"></div></h2>
                                            <p>total per night</p>
                                            </div>
                                            
                                    </div>
                                    <div class="left_pannel_body">
                                    		<div class="wi159">Reset Filters </div>
                                            <div class="wi159"><b>Filter your results</b>
                                          <div class="arrow">
                                            	<div class="arrow_down"></div>
                                                <div class="wi120">By Price (Per Night)</div>
                                            	</div>
                                              <!-- <div class="price_rate"><span class="pw7">Price</span>: 150 € - 500 €</div>
                                                <div class="jq_bg"><img src="<?php //echo WEB_DIR ?>images/jquery_img.jpg" width="140" height="17" /></div> -->
                                                <p>
   <input type="text" id="amount_dummy" style="border:0; color:#f6931f; font-weight:bold; width: 217px;" />
      <input type="hidden" id="amount" style="border:0; color:#f6931f; font-weight:bold; width: 217px;" />
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
                                         	<div class="check_box_cover"><input type="checkbox" name="hotel_fac_val" onclick="javascript:hotel_fac_sorting()"  value="WLAN" id="1" /></div>
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
                                    <form name="search_result" action="<?php echo WEB_URL; ?>hotel/search"  onsubmit="javascript:return form_sub();" method="post">
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
                                                  <input  value="<?php echo $current_dte; ?>"   readonly="readonly"  name="sd" id="datepicker" type="text" class="check_bg_2" /></p>
                                          </div>
                                                
                                                
                                              <div class="modifi_search">
                                                <p>Check-out Date:   </p>
                                                  <p><input   value="<?php echo $next_dte; ?>"   readonly="readonly"  name="ed" id="datepicker1" type="text" class="check_bg_2" /></p>
                                          </div>
                                          <?php 
										/*  echo "<pre/>";
										  print_r($_SESSION);*/
										  
										  ?>
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
                  <p>ADULT</p>
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
                  <p id="child_header">CHILDREN</p>
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
                <div class="AGE_OF2">AGE OF CHILD 1</div>
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
                <div class="AGE_OF2">AGE OF CHILD 1</div>
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
                <div class="AGE_OF2">AGE OF CHILD 2</div>
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
                <div class="AGE_OF2">AGE OF CHILD 2</div>
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
                <div class="AGE_OF2">AGE OF CHILD 3</div>
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
                <div class="AGE_OF2">AGE OF CHILD 3</div>
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
                <div class="AGE_OF2">AGE OF CHILD 2</div>
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
                <div class="AGE_OF2">AGE OF CHILD 3</div>
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
                <div class="AGE_OF2">AGE OF CHILD 1</div>
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
                <div class="AGE_OF2">AGE OF CHILD 1</div>
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
                <div class="AGE_OF2">AGE OF CHILD 2</div>
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
                <div class="AGE_OF2">AGE OF CHILD 2</div>
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
                <div class="AGE_OF2">AGE OF CHILD 3</div>
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
                <div class="AGE_OF2">AGE OF CHILD 3</div>
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
                <div class="AGE_OF2">AGE OF CHILD 1</div>
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
                <div class="AGE_OF2">AGE OF CHILD 2</div>
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
                <div class="AGE_OF2">AGE OF CHILD 3</div>
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
                <div class="AGE_OF2">AGE OF CHILD 1</div>
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
                <div class="AGE_OF2">AGE OF CHILD 1</div>
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
                <div class="AGE_OF2">AGE OF CHILD 2</div>
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
                <div class="AGE_OF2">AGE OF CHILD 2</div>
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
                <div class="AGE_OF2">AGE OF CHILD 3</div>
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
                <div class="AGE_OF2">AGE OF CHILD 3</div>
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
                <div class="AGE_OF2">AGE OF CHILD 1</div>
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
                <div class="AGE_OF2">AGE OF CHILD 2</div>
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
                <div class="AGE_OF2">AGE OF CHILD 3</div>
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
                                                <div class="wi138">
                                                 <input type="image" src="<?php echo WEB_DIR ?>images/search_btn.jpg" width="200" height="34" />
                                                
                                   </div>
                                                
                                      </div>
                                    </div>
                                    </form>
                                    <div class="hotel_left_panel_cont_2">
        <div class="hotel_left_panel_cont_1">My Viewed Hotels</div>
        <?php
		
	   if(isset($_SESSION['fav_hotel_detail']))
		{
			if($_SESSION['fav_hotel_detail']!='')
			{
			
	for($i=0;$i< count($_SESSION['fav_hotel_detail']); $i++)
	{
	if($_SESSION['fav_hotel_detail'][$i] != 'images')
	{
		$res_idd = explode(",",$_SESSION['fav_hotel_detail'][$i]);
			$detailss=$this->Hotel_Model->get_searchresult($res_idd[0]);
		
		if($detailss!='')
		{
		$hotel_id = $detailss->hotel_code;
		$image_hotelspro=$detailss->image;
		?>
        <div class="hotel_left_panel_cont_1_in">
          <div class="pic_container"><img src="<?php echo WEB_DIR.'image_hotelspro1/'.$hotel_id.'.jpg'; ?>" alt="Image Not Available" title="london" width="32" height="32" style="margin:10px 10px 10px 10px;" /> </div>
          <div class="hotel_view_right_cont"><a class="hotel_link_new" href="<?php echo WEB_URL.'hotel/hotel_detail/'.$res_idd[0]; ?>"><?php echo $detailss->hotel_name; ?></a>
            <p> <?php
				$star = $detailss->star;
				if($star==1)
											   {
											   ?>
                                               <img src="<?php echo WEB_DIR.'images/1 star.jpg'; ?>" />
                                               <?php
											   }
											   elseif($star==2)
											   {
												?>   <img src="<?php echo WEB_DIR.'images/2 star.jpg'; ?>" />
                                                <?php
												  }
											   elseif($star==3)
											   {
												?> <img src="<?php echo WEB_DIR.'images/3 star.jpg'; ?>" />
                                                 <?php
												  }
											   elseif($star==4)
											   {
												?> <img src="<?php echo WEB_DIR.'images/4 star.jpg'; ?>" />
                                                 <?php
												  }
											   elseif($star==5)
											   {
												?> <img src="<?php echo WEB_DIR.'images/5 star.jpg'; ?>" />
                                                 <?php
												  }
										else
											   {
												?>
                                                <?php
											   }
				
				?></p>
            <div class="clr"></div>
          </div>
          <div class="clr"></div>
        </div>
<?php }else
		{
			//echo "No Hotels Found..";
		}	 } }
		}
		else
		{
			echo "No Hotels Found..";
		}
		}
		?>
        <div class="clr"></div>
      </div>
                            </div>
                            
                            <div class="right_pannel">
                            		<div class="wi714">
                                    	<?php
										$city=explode(",",$_SESSION['city']);
									
$con =  strtr(base64_encode($city[1]),array('+' => '.','=' => '-','/' => '~'));										?>	
<div style="float:left; margin:0 0 15px 0;"><a href="javascript:void(0);" class="home_link">Home</a> > <a href="<?php echo WEB_URL.'hotel/country_search/'.$con; ?>" class="home_link"><?php echo $city[1]; ?></a> > <a href="javascript:void(0);" class="home_link"><?php echo 'greater '.$city[0]; ?></a> > <a href="javascript:void(0);" class="home_link"><?php echo 'search results for '.$city[0]; ?></a></div> 
<div class="wi584"><div id="result_count" style='float:left;'></div>&nbsp;Hotels Available in <?php echo$_SESSION['city']; ?>  </div>                                         
                                            <div class="wi100">
                                            </div>
                                    </div>
                                    <div style="float:left; width:700px; "><!--<div  style="float:right; margin:-15px 0 0 0;"><a class="button"  href="#" id="btn-slide" title="Open">Show Map</a></div>-->
                             <div style="float:left; width:714px; height:280px" id="map">
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
		<a href="javascript:void(0);">Price</a>
        	<ul>
			<li><a href="javascript:void(0);"  onclick="javascript:return  price_rating_asc()">Low To high</a></li>

			<li><a href="javascript:void(0);"   onclick="javascript:return  price_rating_desc()">High To Low</a></li>
		</ul>
	</li>

	<li>
		<a href="javascript:void(0);">Stars</a>
		<ul>
			<li><a href="javascript:void(0);"  onclick="javascript:return  star_rating_asc()" >1star to 5star</a></li>

			<li><a href="javascript:void(0);"  onclick="javascript:return  star_rating_desc()">5star to 1star</a></li>
		</ul>
	</li>
	<li>
		<a href="javascript:void(0);">Name</a>

		<ul>
			<li><a href="javascript:void(0);"  onclick="javascript:return  name_rating_asc()">A to Z</a></li>
			<li><a href="javascript:void(0);"  onclick="javascript:return  name_rating_desc()">Z to A</a></li>
		</ul>

	</li>
	<li>
		<a href="javascript:void(0);">Currency Convertion</a>
		<ul>
			<li><a  href="<?php echo WEB_URL.'hotel/currency_convertion/USD'; ?>">USD</a></li>
			<li><a   href="<?php echo  WEB_URL.'hotel/currency_convertion/GBP'; ?>">GBP</a></li>
            <li><a   href="<?php echo  WEB_URL.'hotel/currency_convertion/AUD'; ?>">AUD</a></li>
			<li><a  href="<?php echo  WEB_URL.'hotel/currency_convertion/THB'; ?>">THB</a></li>
		

			
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
