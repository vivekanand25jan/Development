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
	//var a = ['hotelsbed_pre','gta','hotelsbed'];
	var a = ['hotelsbed_pre'];
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
			//alert(data.total_result);
					
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
                                url: "<?php //echo WEB_URL.'hotel/pagination_call'; ?>",
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
                                    		<div class="wi584"><div id="result_count"></div> Hotels found in <?php echo$_SESSION['city']; ?></div>
                                            <div class="wi100">Show hide</div>
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
