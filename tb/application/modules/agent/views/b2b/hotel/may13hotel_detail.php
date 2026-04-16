<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="<?php echo WEB_DIR ?>css/postion.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
</script>
<link type="text/css" href="<?php echo WEB_DIR; ?>gui/slider/styles/jquery-ui-1.8.20.custom.css" rel="stylesheet" />
		<script type="text/javascript" src="<?php echo WEB_DIR; ?>gui/slider/scripts/jquery-1.7.2.min.js"></script>
		<script type="text/javascript" src="<?php echo WEB_DIR; ?>gui/slider/scripts/jquery-ui-1.8.20.custom.min.js"></script>

		<style type="text/css">
			/*demo page css*/
			body{ font: 62.5% "Trebuchet MS", sans-serif; margin: 50px;}
			.demoHeaders { margin-top: 2em; }
			#dialog_link {padding: .4em 1em .4em 20px;text-decoration: none;position: relative;}
			#dialog_link span.ui-icon {margin: 0 5px 0 0;position: absolute;left: .2em;top: 50%;margin-top: -8px;}
			ul#icons {margin: 0; padding: 0;}
			ul#icons li {margin: 2px; position: relative; padding: 4px 0; cursor: pointer; float: left;  list-style: none;}
			ul#icons span.ui-icon {float: left; margin: 0 4px;}
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
                    		<div class="left_pannel">
                            		<div class="left_pannel_head">
                                    		<h1><b>Hotels starting at</b></h1>
                                            <h2><div id="priceStarts"></div></h2>
                                            <p>total per night</p>
                                    </div>
                                    <div class="left_pannel_body">
                                    		<div class="wi159">Reset Filters</div>
                                            <div class="wi159"><b>Filter your results</b>
                                          <div class="arrow">
                                            	<div class="arrow_down"></div>
                                                <div class="wi120">By Price (Per Night)</div>
                                            	</div>
                                              <div class="price_rate"><span class="pw7">Price</span>: 150 € - 500 €</div>
                                                <div class="jq_bg"><img src="<?php echo WEB_DIR ?>images/jquery_img.jpg" width="140" height="17" /></div>
                                      </div>
                                      <div class="wi159">
                                          <div class="arrow">
                                            	<div class="arrow_down"></div>
                                                <div class="wi120">By Star Rating</div>
                                            	</div>
                                              <div class="price_rate"><span class="pw7">Star Rating:</span>: 150 € - 500 €</div>
                                                <div class="jq_bg"><img src="<?php echo WEB_DIR ?>images/jquery_img.jpg" width="140" height="17" /></div>
                                      </div>
                                      <div class="wi159">
                                          <div class="arrow">
                                            	<div class="arrow_down"></div>
                                                <div class="wi120">By Review Rating</div>
                                            	</div>
                                              <div class="price_rate"><span class="pw7">Review Rating: </span>: 150 € - 500 €</div>
                                                <div class="jq_bg"><img src="<?php echo WEB_DIR ?>images/jquery_img.jpg" width="140" height="17" /></div>
                                      </div>
                                      <div class="wi159">
                                          <div class="arrow">
                                            	<div class="arrow_down"></div>
                                                <div class="wi120">By Review Rating</div>
                                            	</div>
                                              <div class="price_rate"><span class="pw7">Price</span>: 150 € - 500 €</div>
                                                <div class="jq_bg"><img src="<?php echo WEB_DIR ?>images/jquery_img.jpg" width="140" height="17" /></div>
                                      </div>
                                      <div class="wi159">
                                          <div class="arrow">
                                            	<div class="arrow_down"></div>
                                                <div class="wi120">By Hotel Type</div>
                                            	</div>
                                         <div class="hotel_cover">
                                         	<div class="check_box_cover"><input name="" type="checkbox" value="" /></div>
                                            <div class="hotel_cover47">Apartment </div><div class="wi56">16 Hotels</div>
                                         </div>    
                                         <div class="hotel_cover">
                                         	<div class="check_box_cover"><input name="" type="checkbox" value="" /></div>
                                            <div class="hotel_cover47">Apartment </div><div class="wi56">16 Hotels</div>
                                         </div>
                                         <div class="hotel_cover">
                                         	<div class="check_box_cover"><input name="" type="checkbox" value="" /></div>
                                            <div class="hotel_cover47">Apartment </div><div class="wi56">16 Hotels</div>
                                         </div>
                                         <div class="hotel_cover">
                                         	<div class="check_box_cover"><input name="" type="checkbox" value="" /></div>
                                            <div class="hotel_cover47">Apartment </div><div class="wi56">16 Hotels</div>
                                         </div> 
                                          <div class="hotel_cover">
                                         	<div class="check_box_cover"><input name="" type="checkbox" value="" /></div>
                                            <div class="hotel_cover47">Apartment </div><div class="wi56">16 Hotels</div>
                                         </div> 
                                                
                                      </div> 
                                      <div class="wi159">
                                          <div class="arrow">
                                            	<div class="arrow_down"></div>
                                                <div class="wi120">By Facility</div>
                                            	</div>
                                         <div class="hotel_cover">
                                         	<div class="check_box_cover"><input name="" type="checkbox" value="" /></div>
                                            <div class="hotel_cover47">Apartment </div><div class="wi56">16 Hotels</div>
                                         </div>    
                                         <div class="hotel_cover">
                                         	<div class="check_box_cover"><input name="" type="checkbox" value="" /></div>
                                            <div class="hotel_cover47">Apartment </div><div class="wi56">16 Hotels</div>
                                         </div>
                                         <div class="hotel_cover">
                                         	<div class="check_box_cover"><input name="" type="checkbox" value="" /></div>
                                            <div class="hotel_cover47">Apartment </div><div class="wi56">16 Hotels</div>
                                         </div>
                                         <div class="hotel_cover">
                                         	<div class="check_box_cover"><input name="" type="checkbox" value="" /></div>
                                            <div class="hotel_cover47">Apartment </div><div class="wi56">16 Hotels</div>
                                         </div> 
                                          <div class="hotel_cover">
                                         	<div class="check_box_cover"><input name="" type="checkbox" value="" /></div>
                                            <div class="hotel_cover47">Apartment </div><div class="wi56">16 Hotels</div>
                                         </div> 
                                                
                                      </div>
                                      <div class="wi159">
                                          <div class="arrow">
                                            	<div class="arrow_down"></div>
                                                <div class="wi120">By Hotel Theme</div>
                                            	</div>
                                         <div class="hotel_cover">
                                         	<div class="check_box_cover"><input name="" type="checkbox" value="" /></div>
                                            <div class="hotel_cover47">Apartment </div><div class="wi56">16 Hotels</div>
                                         </div>    
                                         <div class="hotel_cover">
                                         	<div class="check_box_cover"><input name="" type="checkbox" value="" /></div>
                                            <div class="hotel_cover47">Apartment </div><div class="wi56">16 Hotels</div>
                                         </div>
                                         <div class="hotel_cover">
                                         	<div class="check_box_cover"><input name="" type="checkbox" value="" /></div>
                                            <div class="hotel_cover47">Apartment </div><div class="wi56">16 Hotels</div>
                                         </div>
                                         <div class="hotel_cover">
                                         	<div class="check_box_cover"><input name="" type="checkbox" value="" /></div>
                                            <div class="hotel_cover47">Apartment </div><div class="wi56">16 Hotels</div>
                                         </div> 
                                          <div class="hotel_cover">
                                         	<div class="check_box_cover"><input name="" type="checkbox" value="" /></div>
                                            <div class="hotel_cover47">Apartment </div><div class="wi56">16 Hotels</div>
                                         </div> 
                                                
                                      </div>
                                         
                                    </div>
                                    
                                    <div class="change_search_pannel">
                                    	<div class="change_pannel_header">Change your Search</div>
                                        <div class="left_pannel_body">
                                        		<div class="modifi_search">
                                                <p>Destination / Hotel Name: </p>
                                                  <p><input name="" type="text" class="modi_text" /></p>
                                                </div>
                           	  <div class="modifi_search">
                                                <div class="check_box_cover_two"><input name="" type="checkbox" value="" /></div>Destination / Hotel Name:
                                                 
                                          </div>
                                          <div class="modifi_search">
                                                <p>Check-in Date:  </p>
                                                  <p><input name="" type="text" class="check_bg_2" /></p>
                                          </div>
                                                
                                                
                                              <div class="modifi_search">
                                                <p>Check-out Date:   </p>
                                                  <p><input name="" type="text" class="check_bg_2" /></p>
                                          </div>
                                          
                                          <div class="room_bor_bottom">
                                                <div class="modifi_search">
                                                
                                        <div class="modi_l">Room</div>
                                        <div class="modi_R">
                                          
                                            <select name="jumpMenu2" id="jumpMenu2" onchange="MM_jumpMenu('parent',this,0)">
                                              <option>item1</option>
                                            </select>
                                          
                                        </div>
                                                </div>
                                                <div class="modifi_search">
                                                
                                        <div class="modi_l">Room</div>
                                        <div class="modi_R">
                                          
                                            <select name="jumpMenu2" id="jumpMenu2" onchange="MM_jumpMenu('parent',this,0)">
                                              <option>item1</option>
                                            </select>
                                          
                                        </div>
                                                </div>
                                                <div class="modifi_search">
                                                
                                        <div class="modi_l">Room</div>
                                        <div class="modi_R">
                                          
                                            <select name="jumpMenu2" id="jumpMenu2" onchange="MM_jumpMenu('parent',this,0)">
                                              <option>item1</option>
                                            </select>
                                          
                                        </div>
                                                </div>
                                                <div class="modifi_search">
                                                
                                        <div class="modi_l">Room</div>
                                        <div class="modi_R">
                                          
                                            <select name="jumpMenu2" id="jumpMenu2" onchange="MM_jumpMenu('parent',this,0)">
                                              <option>item1</option>
                                            </select>
                                          
                                        </div>
                                                </div>
                                                </div>
                                                <div class="wi138"><a href="#"><img src="<?php echo WEB_DIR ?>images/search_btn2.jpg" width="138" height="40" /></a></div>
                                                
                                      </div>
                                    </div>
                            </div>
                            <div class="right_pannel">
                            		<div class="wi714">
                                    		<div class="wi584"> Hotels found in <?php echo$_SESSION['city']; ?></div>
                                            <div class="wi100">Show hide</div>
                                    </div>
                                    <div class="search_result_section">
                                    
                                    <div id="ryt-col">
        <div class="box">Hotel Name : <?php echo $service->hotel_name; ?> <br />
        Hotel Code : <?php echo $service->hotel_code; ?> <br />
        City : <?php echo $service->city; ?> <br />
        </div>
        
        <div class="box">Star Rating : <?php echo $service->star; ?>
      <br />
        Adult : <?php echo $_SESSION['adult_count']; ?> <br />
        Child : <?php echo $_SESSION['child_count']; ?>
      
         </div>
         
         
           <div class="box">Address : <?php echo $service->address; ?>
        <br />
        Phone : <?php echo $service->phone; ?> <br />
        Fax : <?php echo $service->fax; ?>
         </div>
         
         
        <div class="box" style="height:auto;">
       
        <table width="100%" border="0">
  <tr>
    <td><strong>Room Type</strong></td>
    <td><strong>Inclusion</strong></td>
    <td><strong>Night</strong></td>
    <td><strong>Cost</strong></td>
    <td><strong>Status</strong></td>
    <td>&nbsp;</td>
  </tr>
<?php
$room_count = $_SESSION['room_count'];

if($room_count == 1)
		{
			
            $room_info  = $this->Hotel_Model->fetch_gta_temp_result_room($_SESSION['ses_id'],$service->hotel_code);

for($t=0;$t< count($room_info);$t++)
{
	?>
    <form action="<?php echo WEB_URL.'hotel/pre_booking'; ?>" method="post">
    <input type="hidden" value="<?php echo $room_info[$t]->api_temp_hotel_id; ?>" name="result_id" />
  <tr>
     <td><?php echo $room_info[$t]->room_type; ?></td>
    <td><?php echo $room_info[$t]->inclusion; ?></td>
    <td><?php echo $_SESSION['days']; ?></td>
    <td><?php echo $room_info[$t]->total_cost.' USD'; ?></td>
    <td><?php echo $room_info[$t]->status; ?></td>
    <td><input type="submit" value="Book Now" /></td>
  </tr>
  </form>
  <?php
}

         
		}
		else
		{
			
         $merge_inclsuion = $this->Hotel_Model->get_merge_inclsuion_hotelsbed($service->hotel_code,$service->api,$service->session_id,$service->contractnameVal);
		
for($tt=0;$tt< count($merge_inclsuion);$tt++)
{
		$merge_inclsuionroom = $this->Hotel_Model->get_merge_inclsuion_hotelsbed_room($service->hotel_code,$service->api,$service->session_id,$service->inclusion);
		
			$merge_room_type='';
			$merger_total_cost=0;
			$merge_result_id='';
			$merge_inclusion='';
			$merge_total_cost='';
			foreach($merge_inclsuionroom as $row)
		    {
								$merger_total_cost= $merger_total_cost +$row->total_cost;
								$merge_room_type .=$row->room_type.'<br>';
								$merge_inclusion .=$row->inclusion.'<br>';
								
								$merge_status = $row->status.'<br>';
								$merge_total_cost .= $row->total_cost.'<br>';
								$merge_result_id .= $row->api_temp_hotel_id.'-';
			}
			$merge_room_type .= "<br>";
		$merge_result_id = substr($merge_result_id, 0, -1);
	?>
     <form action="<?php echo WEB_URL.'hotel/pre_booking'; ?>" method="post">
    <input type="hidden" value="<?php echo $merge_result_id; ?>" name="result_id" />
  <tr>
     <td><?php echo $merge_room_type; ?></td>
    <td><?php echo $merge_inclusion; ?></td>
    <td><?php echo $_SESSION['days']; ?></td>
    <td><?php echo $merger_total_cost.' USD'; ?></td>
    <td><?php echo $merge_status; ?></td>
    <td><input type="submit" value="Book Now" /></td>
  </tr>
  </form>
  <?php
}

         
		}
?>		

</table>

        <br />
        <?php
		for($j=0;$j<count($img_array);$j++)
		{
		?>
			<img src="<?php echo $img_array[$j]; ?>" width="280" height="160" />
            <?php
		}
		?>
        </div>
         
       
             <div class="box">
           
           

<script src="http://maps.google.com/maps?file=api&v=2&key=ABQIAAAApz8aTXS5eUyxvs5uMszdKRRgqqCDjpPIuqwLUuHujN8I3D2s4RShDFoZ233PbhiKTfM2Mr6LzhnYEA" type="text/javascript"></script>
                 
<script type="text/javascript">
                //<![CDATA[
                function mapLoad() {
                    if (GBrowserIsCompatible()) {
                        var map = new GMap2(document.getElementById("map"));

                        var point = new GLatLng(<?php print $service->latitude; ?>,<?php print $service->longitude;; ?>);
                        map.setCenter(new GLatLng(<?php print $service->latitude; ?>,<?php print $service->longitude;; ?>),16);
                        var marker = new GMarker(point);

                        map.addOverlay(marker);
                        map.addControl(new GSmallMapControl());
                        map.addControl(new GMapTypeControl());
                    }

  panoClient = new GStreetviewClient();
    panoClient.getNearestPanorama(new GLatLng(<?php print $service->latitude; ?>,<?php print $service->longitude;; ?>),function(a){



    if (a.code == 200){

       

        var fenwayPark = new GLatLng(<?php print $service->latitude; ?>,<?php print $service->longitude;; ?>);
          panoramaOptions = { latlng:fenwayPark };
          myPano = new GStreetviewPanorama(document.getElementById("pano"), panoramaOptions);
          GEvent.addListener(myPano, "error", handleNoFlash);
    }


    });

        handleNoFlash = function (errorCode) {
      if (errorCode == '603') {
       
        //alert("Error: Flash doesn't appear to be supported by your browser");
        return;
      }
    }

                    window.focus();
                }
                //]]>
                </script>
                        
                <script language="JavaScript" type="text/javascript">
                onload = mapLoad;
                onunload = GUnload;
                </script>                   
<div id="map" style="width: 630px; height:390px;margin-bottom:5px">Not Available</div>
  <br />
  <div id="pano" style="width: 630px; height:390px;margin-bottom:5px"></div>           
       
        
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
