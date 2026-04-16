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
			body{ }
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
	//var a = ['hotelsbed_pre'];
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
					}
				});
				$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
					" - $" + $( "#slider-range" ).slider( "values", 1 ) );
					
			$( "#slider-range-star" ).slider({
					range: true,
					min: minVal,
					max: maxVal,
					values: [ minVal, maxVal ],
					slide: function( event, ui ) {
						$( "#star" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
					}
				});
				$( "#star" ).val( "$" + $( "#slider-range-star" ).slider( "values", 0 ) +
					" - $" + $( "#slider-range-star" ).slider( "values", 1 ) );
		//	$('#price').slider('refresh');
			
			//<input type="text" id="price" class="range-txt" />
			//<div id="price-range-sel" class="globalslider"></div>
	
			//$('#result_result').fadeOut();
			// Paging 
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
					$("#result_count").html(data.total_result);
					 
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
                    		<div class="registration_wi662">
                            			<div class="agent_profile_head">Agent Profile</div>
                                        <div class="agent_text_cover">
                                        		<div class="agent_text_cover_L">Agent Name *</div>
                                                <div class="agent_text_cover_R"><input class="agent_text_cover_txt_feil" name="" type="text" /></div>
                                        </div>
                                            <div class="agent_text_cover">
                                        		<div class="agent_text_cover_L">Company / Agency Name *</div>
                                                <div class="agent_text_cover_R"><input class="agent_text_cover_txt_feil" name="" type="text" /></div>
                                        </div>
                                            <div class="agent_text_cover">
                                        		<div class="agent_text_cover_L">Address *</div>
                                                <div class="agent_text_cover_R"><input class="agent_text_cover_txt_feil" name="" type="text" /></div>
                                        </div>
                                            <div class="agent_text_cover">
                                        		<div class="agent_text_cover_L">Country *</div>
                                                <div class="agent_text_cover_R"><input class="agent_text_cover_txt_feil" name="" type="text" /></div>
                                        </div>
                                        <div class="agent_text_cover">
                                        		<div class="agent_text_cover_L">City *</div>
                                                <div class="agent_text_cover_R"><input class="agent_text_cover_txt_feil" name="" type="text" /></div>
                                        </div>
                                        <div class="agent_text_cover">
                                        		<div class="agent_text_cover_L"> Zip Code *</div>
                                                <div class="agent_text_cover_R"><input class="agent_text_cover_txt_feil" name="" type="text" /></div>
                                        </div>
                                        <div class="agent_text_cover">
                                        		<div class="agent_text_cover_L">Office Phone *</div>
                                                <div class="agent_text_cover_R"><input class="agent_text_cover_txt_feil" name="" type="text" /></div>
                                        </div>
                                        <div class="agent_text_cover">
                                        		<div class="agent_text_cover_L">Mobile No *</div>
                                                <div class="agent_text_cover_R"><input class="agent_text_cover_txt_feil" name="" type="text" /></div>
                                        </div>
                                        <div class="agent_text_cover">
                                        		<div class="agent_text_cover_L">Currency Type *</div>
                                                <div class="agent_text_cover_R"><input class="agent_text_cover_txt_feil" name="" type="text" /></div>
                                        </div>
                                    <div class="agent_profile_head">Login Information</div>    
                                    <div class="agent_text_cover">
                                        		<div class="agent_text_cover_L"> E-mail *</div>
                                                <div class="agent_text_cover_R"><input class="agent_text_cover_txt_feil" name="" type="text" /></div>
                                        </div>
                                        <div class="agent_text_cover">
                                        		<div class="agent_text_cover_L"> Password * </div>
                                                <div class="agent_text_cover_R"><input class="agent_text_cover_txt_feil" name="" type="text" /></div>
                                        </div>
                                        <div class="agent_text_cover">
                                        		<div class="agent_text_cover_L">Confirm Password *</div>
                                                <div class="agent_text_cover_R"><input class="agent_text_cover_txt_feil" name="" type="text" /></div>
                                        </div>
                                        <div class="agent_text_cover">
                                        		<div class="agent_text_cover_L"></div>
                                                <div class="agent_text_cover_R"><input name="" type="checkbox" value="" /> &nbsp;&nbsp;  <span style="font-weight:normal;">I accept Agency <a href="#" class="book_condition2"> Terms and Conditions</a></span> </div>
                                        </div>
                                        <div class="wiregis_btn"><a href="#"><img src="<?php echo WEB_DIR ?>images/register_btn.jpg" width="109" height="35" /></a></div>
                                        
                            </div>
                            
                            <div class="registration_right_pannel">
                            
                            		<div class="agentright_pannel_head">Agent Login</div>
                                    <div class="agent_text_cover_right_pannel">
                                    		<div class="agent_text_cover_right_pannel_L">E-mail *</div>
                                            <div class="agent_text_cover_right_pannel_R"><input name="" type="text" class="agent_text_cover_right_pannel_txt" /></div>
                                    </div>
                                    <div class="agent_text_cover_right_pannel">
                                    		<div class="agent_text_cover_right_pannel_L">Password  *</div>
                                            <div class="agent_text_cover_right_pannel_R"><input name="" type="text" class="agent_text_cover_right_pannel_txt" /></div>
                                    </div>
                                    <div class="agent_text_cover_right_pannel">
                                    		<div class="agent_text_cover_right_pannel_L"></div>
                                            <div class="agent_text_cover_right_btn"><a href="#"><img src="<?php echo WEB_DIR ?>images/login.jpg" width="109" height="35" /></a></div>
                                    </div>
                            </div>
                            <div class="registration_right_pannel">
                            
                            		<div class="agentright_pannel_head">Why Register?</div>
                                    
                                    <div class="agent_text_cover_right_pannel">
                                    	<div class="wi18_17"><img src="<?php echo WEB_DIR ?>images/point_icon.jpg" width="18" height="17" /></div>
                                        <div class="wi18_17_200txt">	Single and user friendly platform for selling hotels, transfers and sightseeing</div>	
                                    </div>
                                    <div class="agent_text_cover_right_pannel">
                                    	<div class="wi18_17"><img src="<?php echo WEB_DIR ?>images/point_icon.jpg" width="18" height="17" /></div>
                                        <div class="wi18_17_200txt">	Avail the login with Credit/Deposit Accounts</div>	
                                    </div>
                                    <div class="agent_text_cover_right_pannel">
                                    	<div class="wi18_17"><img src="<?php echo WEB_DIR ?>images/point_icon.jpg" width="18" height="17" /></div>
                                        <div class="wi18_17_200txt">	Best Commission on all travel products</div>	
                                    </div>
                                    <div class="agent_text_cover_right_pannel">
                                    	<div class="wi18_17"><img src="<?php echo WEB_DIR ?>images/point_icon.jpg" width="18" height="17" /></div>
                                        <div class="wi18_17_200txt">	Access to over 1,00,000+ hotels across the globe</div>	
                                    </div>
                                    <div class="agent_text_cover_right_pannel">
                                    	<div class="wi18_17"><img src="<?php echo WEB_DIR ?>images/point_icon.jpg" width="18" height="17" /></div>
                                        <div class="wi18_17_200txt">	View Commissionable and Net Rate with search result</div>	
                                    </div>
                                    <div class="agent_text_cover_right_pannel">
                                    	<div class="wi18_17"><img src="<?php echo WEB_DIR ?>images/point_icon.jpg" width="18" height="17" /></div>
                                        <div class="wi18_17_200txt">	Instant invoicing</div>	
                                    </div>
                                    <div class="agent_text_cover_right_pannel">
                                    	<div class="wi18_17"><img src="<?php echo WEB_DIR ?>images/point_icon.jpg" width="18" height="17" /></div>
                                        <div class="wi18_17_200txt">	Online Cancellation </div>	
                                    </div>
                                    <div class="agent_text_cover_right_pannel">
                                    	<div class="wi18_17"><img src="<?php echo WEB_DIR ?>images/point_icon.jpg" width="18" height="17" /></div>
                                        <div class="wi18_17_200txt">	Online branch and user management facility</div>	
                                    </div>
                                    <div class="agent_text_cover_right_pannel">
                                    	<div class="wi18_17"><img src="<?php echo WEB_DIR ?>images/point_icon.jpg" width="18" height="17" /></div>
                                        <div class="wi18_17_200txt">	Dedicated Customer Support</div>	
                                    </div>
                                    
                            </div>
                    </div>
          
          
          <div class="border_dd"></div>
           <?php echo $this->load->view('footer'); ?>
        </div>
        </div>
</body>
</html>
