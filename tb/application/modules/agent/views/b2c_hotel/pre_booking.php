<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
                <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <title>Untitled Document</title>
                <link href="<?php echo WEB_DIR ?>css/postion.css" rel="stylesheet" type="text/css" />
        
                <link type="text/css" href="<?php echo WEB_DIR; ?>gui/slider/styles/jquery-ui-1.8.20.custom.css" rel="stylesheet" />
                <script type="text/javascript" src="<?php echo WEB_DIR; ?>gui/slider/scripts/jquery-1.7.2.min.js"></script>
                <script type="text/javascript" src="<?php echo WEB_DIR; ?>gui/slider/scripts/jquery-ui-1.8.20.custom.min.js"></script>
                <style type="text/css">
/*demo page css*/
	/*		body {
	font: 62.5% "Trebuchet MS", sans-serif;
/*	margin: 50px;*/
}
.demoHeaders {
	margin-top: 2em;
}
#dialog_link {
	padding: .4em 1em .4em 20px;
	text-decoration: none;
	position: relative;
}
#dialog_link span.ui-icon {
	margin: 0 5px 0 0;
	position: absolute;
	left: .2em;
	top: 50%;
	margin-top: -8px;
}
ul#icons {
	margin: 0;
	padding: 0;
}
ul#icons li {
	margin: 2px;
	position: relative;
	padding: 4px 0;
	cursor: pointer;
	float: left;
	list-style: none;
}
ul#icons span.ui-icon {
	float: left;
	margin: 0 4px;
}
</style>
                <script language="javascript">

<!-- Calling Multiple Api Function -->
	
$(document).ready(function () {
	//var a = ['hotelsbed','gta','hotelspro'];
	var a = ['hotelsbed_pre','gta','hotelsbed'];
	  var i = 0;
	  $('#loading').fadeIn();
	 
	  function nextCall() {
		if(i == a.length) {
			$('#loading').fadeOut();
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
		  },
		  success: function(data){
			  i++;
			  nextCall();      
			$('#result').html(data.hotel_search_result);
			
			//$(".pagination").html(data.paging);
			$("#result_count").html(data.total_result);
					
			//$("#price").val( 120 + " € - " + 180 + " €");
			//$("#price-range-sel").val(3);
			//$( "#depart-range" ).val(  120 + " - " + 180 );
			
			//$("#price").val( 120 + " € - " + 180 + " €");
			//alert(data.total_result);
			//alert(data.min_val + "," + data.max_val);
			$("#priceStarts").html(data.min_val);
			
function loading_show(){
                            $('#loadssing').html("<img src='images/loading.gif'/>").fadeIn('fast');
                        }
                        function loading_hide(){
                            $('#loassding').fadeOut('fast');
                        }
                                     
                        function loadData(page){
                            
                            loading_show();                    
                          $.ajax
                            ({
                                type: "POST",
                                url: "<?php echo WEB_URL.'hotel/pagination_call'; ?>",
                                 data: "page="+page,
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
                        
                        loadData(1);  // For first time page load default results
                        $('.pagination li.active').live('click',function(){
                            var page = $(this).attr('p');
                            loadData(page);
                            

                        });           
                        $('#go_btn').live('click',function(){
                            var page = parseInt($('.goto').val());
                            var no_of_pages = parseInt($('.total').attr('a'));
                            if(page != 0 && page <= no_of_pages){
                                loadData(page);
                            }else{
                                alert('Enter a PAGE between 1 and '+no_of_pages);
                                $('.goto').val("").focus();
                                return false;
                            }
                            
                        });
						
						var minVal = data.min_val;
			var maxVal = data.max_val;
			
			$( "#slider-range" ).slider({
					range: true,
					min: minVal,
					max: maxVal,
					values: [ minVal, maxVal ],
					slide: function( event, ui ) {
						$( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
					}
				});
				$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
					" - $" + $( "#slider-range" ).slider( "values", 1 ) );
		//	$('#price').slider('refresh');
			
			//<input type="text" id="price" class="range-txt" />
			//<div id="price-range-sel" class="globalslider"></div>
	
			//$('#result_result').fadeOut();
		  },
		  error:function(request, status, error){
			// failed request; give feedback to user
			$('#result').html('<p class="error"><strong>Oops!</strong> Try that again in a few moments.</p>');
		  }
		  
		});
		
	  }
	  
	  nextCall();

	 return false;
		
   });
    
   $(document).ready(function () {
   
		$("#slider-range").click(function () {
		
			var minVal = $( "#slider-range" ).slider( "values", 0 );
			var maxVal = $( "#slider-range" ).slider( "values", 1 );
			
			$.ajax({
				  url:'<?php echo WEB_URL; ?>hotel/fetch_search_result_price_filter/',
				  data: 'minVal='+minVal+'&maxVal='+maxVal,
				  dataType: "json",
				  beforeSend:function(){
					$('#loading').html('<div  style=" padding-top:22px;"  class="loading" ><img width="253" height="31" src="<?php echo WEB_DIR; ?>gui/slider/images/loading_bar_animated.gif" alt="Loading..." /><br><div class="bottom-header" style="padding-left:105px">Loading</div></div>');
				  },
				  success: function(data){
					$('#result').html(data.hotel_search_result);
					//$("#priceStarts").html(data.low_val);
					 function loading_show(){
                            $('#loadssing').html("<img src='images/loading.gif'/>").fadeIn('fast');
                        }
                        function loading_hide(){
                            $('#loassding').fadeOut('fast');
                        }
                                     
                        function loadData(page){
                            
                            loading_show();                    
                          $.ajax
                            ({
                                type: "POST",
                                url: "<?php echo WEB_URL.'hotel/pagination_call_price'; ?>",
                                 data: "page="+page+"&minval="+minVal+"&maxval="+maxVal,
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
                        
                        loadData(1);  // For first time page load default results
                        $('.pagination li.active').live('click',function(){
                            var page = $(this).attr('p');
                            loadData(page);
                            
                        });           
                        $('#go_btn').live('click',function(){
                            var page = parseInt($('.goto').val());
                            var no_of_pages = parseInt($('.total').attr('a'));
                            if(page != 0 && page <= no_of_pages){
                                loadData(page);
                            }else{
                                alert('Enter a PAGE between 1 and '+no_of_pages);
                                $('.goto').val("").focus();
                                return false;
                            }
                            
                        });
				  },
				  error:function(request, status, error){
					// failed request; give feedback to user
					$('#result').html('<p class="error"><strong>Oops!</strong> Try that again in a few moments.</p>');
				  }
				  
				});
		}); // $("#slider-range").click(function () {
		
		/*$("#slider-range").slider({
			start: function(event, ui) {
				// ui.value is the starting value
				start = ui.value;
				alert("aa" + ui.value);
			},
			stop: function(event, ui) {
				// now ui.value is the value the user set after stopping the sliding.
				//$("#delta").text(ui.value > start ? "increasing" : "decreasing");
				alert("bb" + ui.value);
			}
		});*/

		
   });
   
   
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
            
        xmlhttp.open("POST","<?php print WEB_URL ?>hotel/all_filter_new1/"+id,true);
        xmlhttp.send();
        
        
       
             
                }
                
               
                </script>
                <style type="text/css">
.pagination ul li.inactive,  .pagination ul li.inactive:hover {
	background-color:#ededed;
	color:#bababa;
	border:1px solid #bababa;
	cursor: default;
}
.data ul li {
	list-style: none;
	font-family: verdana;
	margin: 5px 0 5px 0;
	color: #000;
	font-size: 15px;
}
.pagination {
	width: 800px;
	height: 25px;
}
.pagination ul li {
	color: #006699;
	float: left;
	font-family: arial;
	font-size: 9px;
	font-weight: bold;
	list-style: none outside none;
	padding: 4px;
}
.pagination ul li:hover {
	color: #fff;
	background-color: #006699;
	cursor: pointer;
}
.go_button {
	background-color:#f2f2f2;
	border:1px solid #006699;
	color:#cc0000;
	padding:2px 6px 2px 6px;
	cursor:pointer;
	position:absolute;
	margin-top:-1px;
}
.total {
	float:right;
	font-family:arial;
	color:#999;
}
</style>
                </head>

                <body>
                <div id="main_continer">
                  <div class="header"> <?php echo $this->load->view('header'); ?>
                    <div class="inner_banner"><img src="<?php echo WEB_DIR ?>images/inner_banner.jpg" width="979" height="230" /></div>
                    <div class="content_cover">
                      <div class="hotel_container">
      <form name="search_result" action="<?php echo WEB_URL; ?>hotel/search" method="post">
    <div class="hotel_left_panel">
      <div class="hotel_left_panel_cont_1">
    Change Your Search 
    </div>
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
        
        <div class="hotel_left_panel_cont_2">
        <div class="hotel_left_panel_cont_1">My Viewed Hotels</div>
        <?php
	   if(isset($_SESSION['fav_hotel_detail']))
		{
	for($i=0;$i< count($_SESSION['fav_hotel_detail']); $i++)
	{
	if($_SESSION['fav_hotel_detail'][$i] != 'images')
	{
		$res_idd = explode(",",$_SESSION['fav_hotel_detail'][$i]);
			$detailss=$this->Hotel_Model->get_searchresult($res_idd[0]);
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
<?php } }
		}?>
        <div class="clr"></div>
      </div>
      <?php /*?><div class="hotel_left_panel_cont_2">
        <div class="hotel_left_panel_cont_1">Search Near by Hotels</div>
            <?php
		 if($nearby_hotel!='')
		 {
			 for($i=0;$i<count($nearby_hotel);$i++)
		 {
			 $img =  WEB_DIR.'image_hotelspro1/'.$nearby_hotel[$i]->hotel_code.'.jpg';
			 ?>
        <div class="hotel_left_panel_cont_1_in">
          <div class="pic_container">  <a class="hotel_link_new" href="<?php echo WEB_URL.'hotel/hotel_detail/'.$nearby_hotel[$i]->api_temp_hotel_id; ?>" ><img  src="<?php echo $img; ?>"width="32" height="32" style="margin:10px 10px 10px 10px;"  alt="Image Not Available"  /></a>  </div>
          <div class="hotel_view_right_cont">  <a  class="hotel_link_new" href="<?php echo WEB_URL.'hotel/hotel_detail/'.$nearby_hotel[$i]->api_temp_hotel_id; ?>" ><?php echo $nearby_hotel[$i]->hotel_name; ?></a>
            <p> <?php $star =  $nearby_hotel[$i]->star; 
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
			?>
            
            
            
            </p>
            <div class="clr"></div>
          </div>
          <div class="clr"></div>
        </div>
          <?php
		 }
		 }
		 else
		 {
			 echo 'No Hotel Found';
		 }
		 ?>
        
       
        <div class="clr"></div>
      </div><?php */?>
     
      <!-- 2nd Step Starts : My Viewd Hotels: --> 
     
      
      
      
      <div class="clr"></div>
    </div>
    </form>
    <!-- Right Container Starts -->
     <div class="hotel_right_panel">
    <div class="wi584" style="margin:0 0 10px 0;"> <?php echo $service->hotel_name; ?> &nbsp; <span style="font-size:12px;">  <?php echo $service->city; ?> </span></div>
     <div>
        <div style="float:left; margin-right:10px; padding:2px; border:1px solid #CCC; box-shadow:1px 1px 5px #999; margin-top:10px;"> <img src="<?php echo $img_array[0]; ?>" width="128" height="128" /></div>
        <div class="wi550_cover">
        <div class="wi550_c">
        		<div class="wi550_c_100">Location :</div>
                <div class="wi550_R_400"><?php echo $service->address; ?></div>
        </div>
        <div class="wi550_c">
        		<div class="wi550_c_100">Check-in:</div>
                <div class="wi550_R_400"><?php echo $_SESSION['sd']; ?></div>
        </div>
        <div class="wi550_c">
        		<div class="wi550_c_100">Check-Out:</div>
                <div class="wi550_R_400"><?php echo $_SESSION['ed']; ?></div>
        </div>
        <div class="wi550_c">
        		<div class="wi550_c_100">Room Type</div>
                <div class="wi550_R_400"><?php
				 $cost=0;
				  $a=explode("-",$result_id);
				  $sec_res=$_SESSION['ses_id'];
				  $room_type='';
				  for($k=0;$k<count($a);$k++)
				  {
					 $b=  $this->Hotel_Model->fetch_gta_temp_result_room_result_id($sec_res,$a[$k]);
					$cost = $cost + $b->total_cost;  
					$room_type .= $b->room_type."-".$b->inclusion."<br>";  
				  }
				
				 echo $room_type; ?></div>
        </div>
        <div class="wi550_c">
        		<div class="wi550_c_100">For</div>
                <div class="wi550_R_400"><?php echo $_SESSION['days']; ?> night, <?php echo $_SESSION['room_count']; ?> rooms, max. <?php echo $_SESSION['adult_count']; ?> people.</div>
        </div>
        <div class="wi550_c">
        		<div class="wi550_c_100"><?php echo $_SESSION['room_count']; ?> Rooms</div>
                <div class="wi550_R_400"><?php
				 
				  ?> $ <?php echo $cost; ?></div>
        </div>
        <div class="wi550_c">
        		<div class="wi550_c_100">VAT (0%) included</div>
                <div class="wi550_R_400">$ 0.00</div>
        </div>
        <div class="wi550_c">
        		<a class="book_condition" href="#">Booking conditions</a>
        </div>
      
        </div>
        
       <div class="forth_text">
         <?php echo $cancel_policy; ?>
         </div>
      
        <br />
       <form name="book" action="<?php echo WEB_URL ?>hotel/pre_booking/<?php echo $result_id; ?>" method="post">
<input type="hidden" name="result_id" value="<?php echo $result_id; ?>" />
<input type="hidden" name="amount" value="<?php echo $cost; ?>" />
<input type="hidden" name="cancel_policy" value="<?php echo $cancel_policy; ?>" />
<input type="hidden" name="room_type" value="<?php echo $room_type; ?>" />

        <div class="contact_cont">
          <h2 style="color:#172841; font-family:calibrib;">Customer Details</h2>
        
          <p>Please fill the names of the passengers as they officially appear on identities or passports. The names should appear only in latin characters. You canenter up to 23 characters. Last names should be given whole. Neither special characters nor spaces are allowed. Warning ! Airlines do not allow changes to the names of passengers</p>
          <div class="forth_text">
          <div class="wid567_cover">
          <div class="wid567_c">
          <div class="wi180_C">Email Address *</div>
          <div class="wi382_C">
          <?php
		 
							 if(isset($_SESSION['logged_in']))
							 {
								 $email = $_SESSION['b2c_email'];
							 }
							 else
							 {
								 $email ='';
							 }
							 
		  
		   ?>
            <input type="text" name="email"  value="<?php if(set_value('email')!=''){ echo set_value('email'); } else { echo $email; } ?>" class="wi382_C_text_fie" >
            <span style="  margin-left: 3px;
    margin-top: -9px;
    position: absolute;
    width: 240px; color:#900"><?php
    echo form_error('email');

 ?></span>
          </div>
          </div>
          <div class="wid567_c">
          <div class="wi180_C">Confirm Email Address *</div>
          <div class="wi382_C">
            <input type="text" name="cemail"   value="<?php if(set_value('cemail')!=''){ echo set_value('cemail'); } else { echo $email; } ?>"  class="wi382_C_text_fie" autocomplete="off">
            <span style=" margin-left: 3px;
    margin-top: -9px;
    position: absolute;
    width: 240px; color:#900"><?php
    echo form_error('cemail');

 ?></span>
          </div>
          </div>
          <div class="wid567_c">
          <div class="wi180_C">Address *</div>
          <div class="wi382_C">
            <input type="text" name="address" value="<?php echo set_value('address'); ?>" class="wi382_C_text_fie" autocomplete="off">
            <span style=" margin-left: 3px;
    margin-top: -9px;
    position: absolute;
    width: 240px; color:#900"><?php
    echo form_error('address');

 ?></span>
          </div>
          </div>
          <div class="wid567_c">
          <div class="wi180_C">City *</div>
          <div class="wi382_C">
            <input type="text" name="city"  value="<?php echo set_value('city'); ?>"  class="wi382_C_text_fie" autocomplete="off">
            <span style=" margin-left: 3px;
    margin-top: -9px;
    position: absolute;
    width: 240px; color:#900"><?php
    echo form_error('city');

 ?></span>
          </div>
          </div>
          <div class="wid567_c">
          <div class="wi180_C">Zip/Post Code *</div>
          <div class="wi382_C">
            <input type="text" name="pin"  value="<?php echo set_value('pin'); ?>"  class="wi382_C_text_fie" autocomplete="off">
            <span style=" margin-left: 3px;
    margin-top: -9px;
    position: absolute;
    width: 240px; color:#900"><?php
    echo form_error('pin');

 ?></span>
          </div>
          </div>
          <div class="wid567_c">
          <div class="wi180_C">Country *</div>
          <div class="wi382_C">
            <input type="text" name="country"  value="<?php echo set_value('country'); ?>"  class="wi382_C_text_fie" autocomplete="off">
            <span style=" margin-left: 3px;
    margin-top: -9px;
    position: absolute;
    width: 240px; color:#900"><?php
    echo form_error('country');

 ?></span>
          </div>
          </div>
          <div class="wid567_c">
          <div class="wi180_C">Telephone *</div>
          <div class="wi382_C">
            <input type="text" name="mobile"  value="<?php echo set_value('mobile'); ?>"  class="wi382_C_text_fie" autocomplete="off">
            <span style=" margin-left: 3px;
    margin-top: -9px;
    position: absolute;
    width: 240px; color:#900"><?php
    echo form_error('mobile');

 ?></span>
          </div>
          </div>
          
          
          
          
     
          </div>
          </div>
          <div>
          <?php
		
		  for($i=0;$i< count($room_info); $i++)
		  {
			  ?>
            <h3> Room <?php echo $i+1; ?>: Special Offer - <?php echo $room_info[$i]->room_type; ?> - Non refundable / <?php echo $room_info[$i]->inclusion; ?></h3>
            <div style="float:left; margin-top:10px;">
              <div style="float:left">
                <div> <strong>Saluation *  &nbsp;  &nbsp;First Name  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;&nbsp;  &nbsp;Last Name</strong> </div>
                <div>
                 <select name="sal[]" style="width:60px" class="wi382_C_text_fie">
                 <option value="Mr">Mr</option>
                 <option value="Mrs">Mrs</option>
                 </select>
                 <input type="text" name="fname[]" style="width:200px" class="wi382_C_text_fie"  />&nbsp;<input style="width:200px" type="text" name="lname[]" class="wi382_C_text_fie"  />
                </div>
                <div class="clr"></div>
              </div>
              <div style="float:left; margin-left:15px;">
                <div> <strong>Max Persons</strong> </div>
                <div style="margin-top:6px;"> <?php echo $room_info[$i]->adult; ?> guests </div>
                <div class="clr"></div>
              </div>
              
            </div>
            
            <br />
            <br /><br />
<br />
<?php
		  }
		  ?>

            
            <div style="clear:both">
              <div><strong> Special Requirement : </strong></div>
              <div>
<textarea name="req" cols="" rows=""  class="wi382_C_text_fie_area"></textarea>
              </div>
            </div>
          </div>
          <div class="clr"></div>
        </div><br />

        <div style="float:left; margin:0px 0 15px 0;">
        <?php 
		if($api != 'travco')
		{
			?>
        	<input type="image" src="<?php echo WEB_DIR ?>images/contact_btn.jpg" width="106" height="26" />
            <?php
		}
		else
		{
		?><font color="#FF0000"><strong>This is LIVE CREDIENTIAL. So Dont Make Booking...</strong></font><?php	
		}
		?>
        </div>
        </form>
      </div>
     
     </div>
    <div class="clr"></div>
  </div>
                    </div>
                    <div class="border_dd"></div>
                    <?php echo $this->load->view('footer'); ?> </div>
                </div>
</body>
</html>
