<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!--sdsdjsajdhsahdjklsahdjkl -->
<style >
.jcarousel-skin-tango .jcarousel-container {
  
}

.jcarousel-skin-tango .jcarousel-direction-rtl {
	direction: rtl;
}

.jcarousel-skin-tango .jcarousel-container-horizontal {
    width: 645px; border:1px solid red;
    padding: 20px 40px;
}

.jcarousel-skin-tango .jcarousel-container-vertical {
    width: 75px;
    height: 245px;
    padding: 40px 20px;
}

.jcarousel-skin-tango .jcarousel-clip {
    overflow: hidden;
}

.jcarousel-skin-tango .jcarousel-clip-horizontal {
    width:  245px;
    height: 75px;
}

.jcarousel-skin-tango .jcarousel-clip-vertical {
    width:  75px;
    height: 245px;
}

.jcarousel-skin-tango .jcarousel-item {
    width: 75px;
    height: 75px;
}

.jcarousel-skin-tango .jcarousel-item-horizontal {
	margin-left: 0;
    margin-right: 10px;
}

.jcarousel-skin-tango .jcarousel-direction-rtl .jcarousel-item-horizontal {
	margin-left: 10px;
    margin-right: 0;
}

.jcarousel-skin-tango .jcarousel-item-vertical {
    margin-bottom: 10px;
}

.jcarousel-skin-tango .jcarousel-item-placeholder {
    background: #fff;
    color: #000;
}

/**
 *  Horizontal Buttons
 */
.jcarousel-skin-tango .jcarousel-next-horizontal {
    position: absolute;
    top: 43px;
    right: 5px;
    width: 32px;
    height: 32px;
    cursor: pointer;
    background: transparent url(next-horizontal.png) no-repeat 0 0;
}

.jcarousel-skin-tango .jcarousel-direction-rtl .jcarousel-next-horizontal {
    left: 5px;
    right: auto;
    background-image: url(prev-horizontal.png);
}

.jcarousel-skin-tango .jcarousel-next-horizontal:hover,
.jcarousel-skin-tango .jcarousel-next-horizontal:focus {
    background-position: -32px 0;
}

.jcarousel-skin-tango .jcarousel-next-horizontal:active {
    background-position: -64px 0;
}

.jcarousel-skin-tango .jcarousel-next-disabled-horizontal,
.jcarousel-skin-tango .jcarousel-next-disabled-horizontal:hover,
.jcarousel-skin-tango .jcarousel-next-disabled-horizontal:focus,
.jcarousel-skin-tango .jcarousel-next-disabled-horizontal:active {
    cursor: default;
    background-position: -96px 0;
}

.jcarousel-skin-tango .jcarousel-prev-horizontal {
    position: absolute;
    top: 43px;
    left: 5px;
    width: 32px;
    height: 32px;
    cursor: pointer;
    background: transparent url(prev-horizontal.png) no-repeat 0 0;
}

.jcarousel-skin-tango .jcarousel-direction-rtl .jcarousel-prev-horizontal {
    left: auto;
    right: 5px;
    background-image: url(next-horizontal.png);
}

.jcarousel-skin-tango .jcarousel-prev-horizontal:hover, 
.jcarousel-skin-tango .jcarousel-prev-horizontal:focus {
    background-position: -32px 0;
}

.jcarousel-skin-tango .jcarousel-prev-horizontal:active {
    background-position: -64px 0;
}

.jcarousel-skin-tango .jcarousel-prev-disabled-horizontal,
.jcarousel-skin-tango .jcarousel-prev-disabled-horizontal:hover,
.jcarousel-skin-tango .jcarousel-prev-disabled-horizontal:focus,
.jcarousel-skin-tango .jcarousel-prev-disabled-horizontal:active {
    cursor: default;
    background-position: -96px 0;
}

</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Docume	nt</title>
<link href="<?php echo WEB_DIR; ?>css/postion.css" rel="stylesheet" type="text/css" />
 <script type="text/javascript" src="<?php print WEB_DIR; ?>script/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="<?php print WEB_DIR; ?>script/jquery.jcarousel.min.js"></script>
  <script type="text/javascript">
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}

$(document).ready(function(){
	$("input:radio[name=top_city]").click(function() {
		var top_city = $(this).val();
		//alert(top_city);
		$('#cityval').val(top_city);
	});
	return false;
});

  </script>
</head>

<body>
<div id="main_continer">
  <div class="header"> <?php echo $this->load->view('b2b/header'); ?>
    <div class="b2b_banner"><img src="<?php echo WEB_DIR ?>images/b2b_banner.jpg" width="977" height="143" /></div>
    
    <div class="content_cover">
    <div class="left_pannel">
    		<div class="change_pannel_header">Account Information</div>
            <div class="left_pannel_body">
            		<div class="account_body">
					<?php 
					if (isset($balance_credit)) : ?>
					<span style="float:left; width:100px; font-weight:bold;"> Balance Credit</span> :  <?php echo '$'.$balance_credit; ?><br/>
   <span style="float:left; width:100px; font-weight:bold;"> Last Credit </span>         :  <?php if (isset($last_credit)) echo '$' . $last_credit; ?><br/>
				<?php endif;?>
   
   <?php //print_r($branch_acc_info);
   if (!empty($branch_acc_info)) :
   for ($i = 0; $i < count($branch_acc_info); $i++) 
   : ?>
	<span style="float:left; width:100px; font-weight:bold;"> Branch </span>         :  <?php echo $branch_acc_info[$i]->branch_name; ?><br/>
	<span style="float:left; width:100px; font-weight:bold;"> Balance Credit </span>         :  <?php echo $branch_acc_info[$i]->balance_credit; ?><br/>
	<span style="float:left; width:100px; font-weight:bold;"> Last Credit </span>         :  <?php echo $branch_acc_info[$i]->last_credit; ?><br/>
   <?php endfor;
   endif;
	//print_r($branch_acc_info);
   ?>
   <!-- <span style="float:left; width:100px; font-weight:bold;"> Time Period</span>      : Aug 21, 2012 -->
   </div>
   
            </div>
            <div class="change_search_pannel">
            			<div class="change_pannel_header">Notice Board</div>
                        <div class="left_pannel_body">
                        		<ul style="margin:20px 0 20px 35px; padding:0px; float:left; width:180px;">
                                		<li style="margin:0 0 10px 0;">Lowest price: Many of our room rates are the best prices you will find anywhere</li>
                                        <li style="margin:0 0 10px 0;" >Secure booking (via SSL system) </li>
                                        <li style="margin:0 0 10px 0;"> Great choice of hotels </li>
                                        <li style="margin:0 0 10px 0;"> Simply structured content </li>
                                </ul>
                        </div>
            </div>
            
            <div class="change_search_pannel">
            			<div class="change_pannel_header">Booking information</div>
                        <div class="left_pannel_body">
                        		<div class="con_wi221">
                                <div class="wi24_24"><img src="<?php echo WEB_DIR ?>images/tick_for_con.png" width="24" height="24" /></div>
                                <div class="wi24_24_cont">Confirmed Bookings </div>
                                </div>
                                <div class="con_wi221">
                                <div class="wi24_24"><img src="<?php echo WEB_DIR ?>images/close_btn (2).png" width="24" height="24" /></div>
                                <div class="wi24_24_cont">Cancelled Bookings  </div>
                                </div>
                                <div class="con_wi221">
                                <div class="wi24_24"><img src="<?php echo WEB_DIR ?>images/search icon.png" width="24" height="24" /></div>
                                <div class="wi24_24_cont">Confirmed Bookings </div>
                                </div>
                                
                        </div>
            </div>
            
    </div>
    <div class="hotel_right_panel">
    		<div class="hotel_search_name">Hotel Search</div>
            <div class="top_citie">Top City</div>
            <div class="wi600_hot">
            	<div class="wi_chec_cover"><div class="wichec_01"><input name="top_city" type="radio" value="London, United Kingdom" /></div>
                <div class="wichec_02">London </div>
                </div>
                <div class="wi_chec_cover"><div class="wichec_01"><input name="top_city" type="radio" value="Paris, France" /></div>
                <div class="wichec_02">Paris </div>
                </div>
                <div class="wi_chec_cover"><div class="wichec_01"><input name="top_city" type="radio" value="Dubai, United Arab Emirates" /></div>
                <div class="wichec_02">Dubai </div>
                </div>
               
            </div>
            <div class="wi600_hot_other">
             <script type="text/javascript" src="<?php print WEB_DIR; ?>autofill/js/bsn.AutoSuggest_c_2.0.js"></script>
          <link rel="stylesheet" href="<?php print WEB_DIR; ?>autofill/css/autosuggest_inquisitor.css" type="text/css" media="screen" charset="utf-8" /> 
			 <form action="<?php echo WEB_URL; ?>b2b_hotel/search" method="post">
            		<table width="600" border="0" align="left" cellpadding="0" cellspacing="0" style="margin:20px 0 0 0; border-top:1px dotted #999;">
  <tr>
    <td align="left" valign="top" style="padding:20px 0 0 0; font-weight:bold;">Other Cities : </td>
    <td align="left" valign="top" style="padding:20px 0 0 0; font-weight:bold;" >
    
    <input type="hidden" id="testid" value="" style="font-size: 10px; width: 20px;" disabled="disabled" />
              <input type="text" name="cityval" id="testinput" class="TEX_style" />
              <span><font color="#990000"><strong><?php echo form_error('cityval'); ?></strong></font></span>
              <script type="text/javascript">
	var options = {
		script:"<?php print WEB_DIR; ?>test_hotel.php?json=true&",varname:"input",json:true,callback: function (obj) { document.getElementById('testid').value = obj.id; } };
	var as_json = new AutoSuggest('testinput', options);

</script> 
  </td>
  </tr>
  <tr>
    <td align="left" valign="top" style="padding:10px 0 0 0; font-weight:bold;">Hotel Name (Optional) :</td>
    <td align="left" valign="top" style="padding:10px 0 0 0; font-weight:bold;"><input name="" type="text" class="txte_4445" /></td>
  </tr>
  <tr>
    <td align="left" valign="top" style="padding:10px 0 0 0; font-weight:bold;">Category:</td>
    <td align="left" valign="top" style="padding:10px 0 0 0; font-weight:bold;"><input name="" type="text"  class="txte_4445"/></td>
  </tr>
  <tr> 
    <td align="left" valign="top" style="padding:10px 0 0 0; font-weight:bold;">Clients' Nationality :</td>
    <td align="left" valign="top" style="padding:10px 0 0 0; font-weight:bold;"><input name="" type="text" class="txte_4445" /></td>
  </tr>
  <tr>
    <td align="left" valign="top"><table width="100" border="0" align="left" cellpadding="0" cellspacing="0">
  <tr>
    <td align="left" valign="top" style="padding:10px 0 0 0; font-weight:bold;" >Check in</td>
    </tr>
    <link rel="stylesheet" href="<?php echo WEB_DIR; ?>datepickernew/themes/base/jquery.ui.all.css">
                <script src="<?php echo WEB_DIR; ?>datepickernew/jquery-1.7.2.js"></script> 
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

			$current_dte = date("d-m-Y",strtotime("+7 days"));
			$next_dte = date("d-m-Y",strtotime("+8 days"));
			?>
    <tr>
    <td align="left" valign="top" style="padding:10px 0 0 0; font-weight:bold;"><input value="<?php echo $current_dte; ?>" name="sd" id="datepicker"   style="widows:100px; border:1px solid #e5e5e; height:25px;" type="text" /></td>
  </tr>
</table>
</td>
    <td align="left" valign="top"><table width="100" border="0" align="left" cellpadding="0" cellspacing="0">
  <tr>
    <td align="left" valign="top" style="padding:10px 0 0 0; font-weight:bold;" >Check Out</td>
    </tr>
    <tr>
    <td align="left" valign="top" style="padding:10px 0 0 0; font-weight:bold;"><input  value="<?php echo $current_dte; ?>" id="datepicker1" name="ed"  style="widows:100px; border:1px solid #e5e5e; height:25px;" type="text" /></td>
  </tr>
</table></td>
  </tr>
  <tr>
  <td>
    <div class="check_cover">
            <div class="check_139">
              <p>ROOM</p>
              <p> <script type="text/javascript">
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
                <select name="room_count"   onChange="display_adult_count(this.value)" class="jump" >
                  <option value="1">Room 1</option>
                  <option value="2">Room 2</option>
                  <option value="3">Room 3</option>
                </select>
              </p>
            </div>
            <div class="check_139 ml17" id="room1">
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
              
              <DIV class="check_139" id="age1" style="display:none;">
                <div class="AGE_OF">AGE OF CHILD 1</div>
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
              <DIV class="check_139"  id="age12"  style="display:none;">
                <div class="AGE_OF">AGE OF CHILD 2</div>
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
              <DIV class="check_139"  id="age13"  style="display:none;">
                <div class="AGE_OF">AGE OF CHILD 3</div>
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
          <div class="check_139	 ml17" style="float:right; display:none; margin-right:25px" id="room2">
              <DIV class="check_139" >
                <!--<div class="rooms_left"></div>-->
                <div class="wi40"  style="height: auto;">
                  <p>ADULT</p>
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
                  <p id="child_header2">CHILDREN</p>
                  <p>
                    <select name="child[]" id="inputfiled1_2"  class="jumb_25_for_new_1"  onChange="display_child_count1(this.value)">
                      <option value="0">0</option>
                      <option value="1">1</option>
                      <option value="2">2</option> <option value="3">3</option>
                    </select>
                  </p>
                </div>
              </DIV>
               <DIV class="check_139" id="age2" style="display:none;">
                <div class="AGE_OF">AGE OF CHILD 1</div>
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
              <DIV class="check_139"  id="age22"  style="display:none;">
                <div class="AGE_OF">AGE OF CHILD 2</div>
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
              <DIV class="check_139"  id="age23"  style="display:none;">
                <div class="AGE_OF">AGE OF CHILD 3</div>
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
          <div class="check_139	 ml17" style="float:right; display:none; margin-right:25px" id="room3">
              <DIV class="check_139" >
                <!--<div class="rooms_left"></div>-->
                <div class="wi40" style="height: auto;">
                  <p>ADULT</p>
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
                  <p id="child_header3">CHILDREN</p>
                  <p>
                    <select name="child[]" id="inputfiled1_3"  class="jumb_25_for_new_1"  onChange="display_child_count2(this.value)">
                      <option value="0">0</option>
                      <option value="1">1</option>
                      <option value="2">2</option> <option value="3">3</option>
                    </select>
                  </p>
                </div>
              </DIV>
               <DIV class="check_139" id="age3" style="display:none;">
                <div class="AGE_OF">AGE OF CHILD 1</div>
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
              <DIV class="check_139"  id="age32"  style="display:none;">
                <div class="AGE_OF">AGE OF CHILD 2</div>
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
              <DIV class="check_139"  id="age33"  style="display:none;">
                <div class="AGE_OF">AGE OF CHILD 3</div>
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
          </td></tr>
</table>
<div class="wiregis_btn"><a href="#"><input type='image' src="<?php echo WEB_DIR; ?>images/search_btn_new.jpg" width="109" height="35" /></a></div>
</form>

        </div>
    </div>
      
    </div>
    <div class="border_dd"></div>
    <?php echo $this->load->view('b2b/footer'); ?> </div>
</div>
</body>
</html>
