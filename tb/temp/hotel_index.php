<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="<?php echo WEB_DIR; ?>css/style_sheet.css" rel="stylesheet" type="text/css" />
<link href="<?php echo WEB_DIR; ?>css/postion.css" rel="stylesheet" type="text/css" />

</head>

<body>
<?php $this->load->view('header'); ?>
<div class="midlebody">
<div class="banner"  id="slider"  style="z-index:-9999; width:967px;">
<img src="<?php echo WEB_DIR; ?>images/ib1.jpg"  width="967" style="position:absolute;"height="402" alt="" />
<img src="<?php echo WEB_DIR; ?>images/ib2.jpg"  style="display:none"  width="967" height="402" alt="" />
<img src="<?php echo WEB_DIR; ?>images/ib3.jpg"  width="967" style="position:absolute; display:none"height="402" alt="" />
<img src="<?php echo WEB_DIR; ?>images/ib4.jpg"   style="display:none"   width="967" height="402" alt="" />
<img src="<?php echo WEB_DIR; ?>images/ib5.jpg"  width="967" style="position:absolute; display:none"height="402" alt="" />
</div>
    <div class="search_box">
      <div class="search_box_top"></div>
        <div class="search_box_middile">
          <h1 style="padding-top:10px;">SEARCH HOTELS </h1>
          <div id="id_hotel">
           <form action="<?php echo WEB_URL; ?>hotel/search" method="post" name="form" onsubmit="javascript:return form_sub();">
     
          <script type="text/javascript" src="<?php print WEB_DIR; ?>autofill/js/bsn.AutoSuggest_c_2.0.js"></script>
          <link rel="stylesheet" href="<?php print WEB_DIR; ?>autofill/css/autosuggest_inquisitor.css" type="text/css" media="screen" charset="utf-8" />
          <div class="destin">
            <p> DESTINATION</p>
            <P>
              <input type="hidden" id="testid" value="" style="font-size: 10px; width: 20px; z-index:99999; position:absolute;" disabled="disabled" />
              <input type="text" name="cityval" value="<?php echo $this->input->cookie('city'); ?>" id="testinput" class="TEX_style" />
              <span><font color="#990000"><strong><?php echo form_error('cityval'); ?></strong></font></span>
              <script type="text/javascript">
			  
	var options = {
		script:"<?php print WEB_DIR; ?>test_hotel.php?json=true&",varname:"input",json:true,callback: function (obj) { document.getElementById('testid').value = obj.id; } };
	var as_json = new AutoSuggest('testinput', options);

</script> 
            </P>
          </div>
          <div class="check_covers">
            <div class="check_139">
              <p>CHECK IN</p>
              <p>
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
			
			minDate: 1
		  
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
						minDate: 1
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
		  
		   
		  
		
	
	
		$( "#datepicker2" ).datepicker({
			numberOfMonths: 3,
			dateFormat: 'dd-mm-yy',
			
			minDate: 0
		  
		});
		$( "#datepicker3" ).datepicker({
			numberOfMonths: 3,
			dateFormat: 'dd-mm-yy',
			
			minDate: 1
		  
		});
		
		
		
		 $('#datepicker2').change(function(){
		   //$t=$(this).val();
		   var selectedDate = $(this).datepicker('getDate');
		   var str1 = $( "#datepicker3" ).val();
		
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
					$( "#datepicker3" ).datepicker({
	             		numberOfMonths: 3,
						dateFormat : 'dd-mm-yy',
						minDate: 1
					});
		   $( "#datepicker3" ).val($t);
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
		  
		  $('#datepicker3').change(function(){
		   //$t=$(this).val();
		 
		   var selectedDate = $(this).datepicker('getDate');
		   var str1 = $( "#datepicker2" ).val();
		
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
					$( "#datepicker2" ).datepicker({
	             		numberOfMonths: 3,
						dateFormat : 'dd-mm-yy',
						minDate: 0
					});
		   $( "#datepicker2" ).val($t);
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

			$current_dte = date("d-m-Y",strtotime("+7 days"));
			$next_dte = date("d-m-Y",strtotime("+8 days"));
			if(!$this->input->cookie('sd'))
			{
				$sd_val = $current_dte;
				$ed_val = $next_dte;
			}
			else
			{
				$sd_val = $this->input->cookie('sd');
				$ed_val = $this->input->cookie('ed');
			}
			?>
                <input  value="<?php echo $sd_val; ?>" name="sd" id="datepicker"   readonly="readonly" class="CHECK_TX_BG" type="text" />
                  <span><font color="#990000"><strong><?php echo form_error('sd'); ?></strong></font></span>
              </p>
            </div>
            <div class="check_139 ml17">
              <p>CHECK OUT</p>
              <p>
                <input  value="<?php echo $ed_val; ?>" name="ed" id="datepicker1"   readonly="readonly" class="CHECK_TX_BG" type="text" />
                  <span><font color="#990000"><strong><?php echo form_error('ed'); ?></strong></font></span>
              </p>
            </div>
          </div>
         <div class="room_bor_bottom">
                                                <div class="check_cover">
                                             <div class="check_139">
                                             		<p>ROOM</p>
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
                <select name="room_count"   onChange="display_adult_count(this.value)" class="jump" >
                <?php
				$room_count = $this->input->cookie('room_count');
				
				$adult_o = explode("||",$this->input->cookie('org_adult'));
				$child_o = explode("||",$this->input->cookie('org_child'));
				$child_ao = explode("||",$this->input->cookie('child_age'));
			//	$ed_val = $this->input->cookie('ed');
				
				if($room_count==1 )
				{
                 echo ' <option value="1" selected="selected">Room 1</option>';
                  echo '  <option value="2">Room 2</option>';
                  echo '  <option value="3">Room 3</option>';
				}
				elseif($room_count==2 )
				{
                 echo ' <option value="1" >Room 1</option>';
                  echo '  <option value="2"  selected="selected">Room 2</option>';
                  echo '  <option value="3">Room 3</option>';
				}elseif($room_count==3 )
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
                                              <?php if($room_count==1 || $room_count==3 || $room_count==2)
						{
						
							?>   
                                             
                                             <div class="check_139 ml17 " id="room1">
              <DIV class="check_139" >
                <!--<div class="rooms_left"></div>-->
              
                <div class="wi40"  style="height: auto;">
                  <p>ADULT</p>
                  <p>
                    <select name="adult[]" id="jumpMenu2" onchange="hide_child1(this.value)"  class="jumb_25_for_new_1 pl5">
                      <?php $s_adult = $adult_o[0];
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
                        <?php $s_child = $child_o[0];
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
						if($child_ao[0] == $i)
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
						if($child_ao[1] == $i)
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
						if($child_ao[2] == $i)
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
						
          
                        <?php if($room_count==2 || $room_count==3)
						{
						//echo $adult_o[1];
							?>                       
        <div class="check_139	 ml17" style="float:right; margin-right:0px" id="room2">
              <DIV class="check_139" >
                <!--<div class="rooms_left"></div>-->
                <div class="wi40"  style="height: auto;">
                  <p></p>
                  <p>
                    <select name="adult[]" id="jumpMenu2" onchange="hide_child2(this.value)"  class="jumb_25_for_new_1 pl5">
                      <?php $s_adult1 = $adult_o[1];
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
                  <p id="child_header"></p>
                  <p>
                    <select name="child[]" id="inputfiled1_2"  class="jumb_25_for_new_1"  onChange="display_child_count1(this.value)">
                       <?php $s_child1 = $child_o[1];
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
						if($child_ao[3] == $i)
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
						if($child_ao[4] == $i)
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
                <div class="AGE_OF3">AGE OF CHILD 2</div>
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
						if($child_ao[5] == $i)
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
                        	                    
        <div class="check_139	 ml17" style="float:right; display:none; margin-right:0px" id="room2">
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
						
						 if($room_count==3 )
						{
							
							?>
  <div class="check_139	 ml17" style="float:right;  margin-right:0px" id="room3">
              <DIV class="check_139" >
                <!--<div class="rooms_left"></div>-->
                <div class="wi40" style="height: auto;">
                  <p></p>
                  <p>
                    <select name="adult[]" id="jumpMenu2" onchange="hide_child3(this.value)"  class="jumb_25_for_new_1 pl5">
                      <?php $s_adult2 = $adult_o[2];
					  
					  
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
                      <?php $s_child2 = $child_o[2];
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
						if($child_ao[6] == $i)
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
						if($child_ao[7] == $i)
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
						if($child_ao[8] == $i)
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
                              <div class="check_139	 ml17" style="float:right; display:none; margin-right:0px" id="room3">
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
                                               
                                                
                                            
                                                
                                                </div>
          <div class="search_btn" style="margin-bottom:20px;">
            <input type="image" src="<?php echo WEB_DIR ?>images/search_btn.png" width="200" height="35" />
          </div>
           </form>
           </div>
            <div id="id_flight" style="display:none">
           <form action="<?php echo WEB_DIR; ?>flight/index.php/index/search" method="post" name="flight" >
     
   <table  border="0" align="left" cellpadding="0" cellspacing="0" style="width:340px; float:left; font-family:MAIAN; color:#FFF;">
    <tr>
      <td>
      <table  border="0" align="center" cellpadding="0" cellspacing="0" style="width:340px; float:left;">
        <tr>
          <td width="150" align="left">
            <input name="mode" type="radio" id="Domestic" value="1" checked="checked" />
            <label for="Domestic"></label>
          DOMESTIC
         </td>
          <td><input name="mode" type="radio" id="Domestic2" value="2" />
            <label for="Domestic2"></label>
INTERNATIONAL </td>
        </tr>
      </table>
      
        <table border="0" align="center" cellpadding="2" cellspacing="0" style="width:340px; float:left; text-indent:20px; font-family:MAIAN; color:#FFF; font-weight:bold;">
          <tr>
            <td height="30" align="left" valign="middle">BOOK YOUR DOMESTIC FLIGHTS</td>
          </tr>
      </table>
        <table border="0" align="center" cellpadding="0" cellspacing="0" style="border-bottom:#09F dotted 2px; width:340px; float:left; font-family:MAIAN; color:#FFF;">
          <tr>
            <td width="70" align="left" valign="top">
              <p class="flight_oneway">
		  <input name="trip" type="radio" id="One Way" class="tripType" value="1" checked="checked" />
                <label for="One Way"></label>
                ONE WAY
              </p>
            </td>
            <td width="85" align="left" valign="top">
              <p class="flight_oneway">
                <input type="radio" name="trip"  class="tripType" id="Roundtrip" value="2" />
                <label for="Roundtrip"></label>
                ROUNDTRIP 
              </p>
           </td>
            <td width="140" height="30" align="left" valign="top">
              <p class="flight_oneway">
                <input type="radio" name="trip" id="Round Trip Special" value="3" />
                <label for="Round Trip Special"></label>
                ROUNDTRIP SPECIAL
              </p>
            </td>
          </tr>
      </table>
        <table border="0" align="center" cellpadding="2" cellspacing="0" style="width:340px; float:left; text-indent:10px; margin-top:5px; margin-bottom:10px; font-family:MAIAN; color:#FFF;">
          <tr>
            <td  align="left" class="flight_selectall">FROM</td>
            <td ><select name="dep_point" id="select4" class="selectall" >
                                                                <?php
																$airport_list = $this->Hotel_Model->airport_city_list();
		
                                                                for($l=0;$l<count($airport_list);$l++)
                                                                {
                                                                    if ($airport_list[$l]->city_code == "BLR")
                                                                        echo '<option value="' . $airport_list[$l]->city_code . '" selected="selected">' . $airport_list[$l]->city . '</option>';
                                                                    echo '<option value="' . $airport_list[$l]->city_code . '">' . $airport_list[$l]->city . '</option>';
                                                                    if ($airport_list[$l]->city_code == 'PNQ')
                                                                        echo '<option value="">-------------</option>';
                                                                }
                                                                ?>
                                                            </select></td>
            <td  align="right" class="flight_selectall">DEPART</td>
            <td ><input name="sd" type="text" class="selectall" id="datepicker2" /></td>
          </tr>
          <tr>
            <td align="left" class="flight_selectall">TO</td>
            <td><select name="arr_point" id="select4" class="selectall">
                                                                <?php
																$airport_list = $this->Hotel_Model->airport_city_list();
		
                                                                for($l=0;$l<count($airport_list);$l++)
                                                                {
                                                                    if ($airport_list[$l]->city_code == "BLR")
                                                                        echo '<option value="' . $airport_list[$l]->city_code . '" selected="selected">' . $airport_list[$l]->city . '</option>';
                                                                    echo '<option value="' . $airport_list[$l]->city_code . '">' . $airport_list[$l]->city . '</option>';
                                                                    if ($airport_list[$l]->city_code == 'PNQ')
                                                                        echo '<option value="">-------------</option>';
                                                                }
                                                                ?>
                                                            </select></td>
            <td align="right" class="flight_selectall">RETURN</td>
            <td><input name="ed" type="text" class="selectall" id="datepicker3" value="" /></td>
          </tr>
          <tr>
            <td align="left" class="flight_selectall">AIRLINES</td>
            <td><select class="srch_flgt_sltbx1" id="airline" name="air_line">
                                                                            <option selected="selected" value="AI,G8,IC,6E,9W,S2,IT,SG">Select All</option>
                                                                            <option value="AI">Air India</option>
                                                                            <option value="G8">Go Air</option>
                                                                            <option value="IC">Indian Airlines</option>
                                                                            <option value="6E">Indigo</option>
                                                                            <option value="9W">Jet Airways</option>
                                                                            <option value="S2">Jet Lite</option>
                                                                            <option value="IT">King Fisher</option>
                                                                            <option value="SG">Spice Jet</option>
                                                                        </select></td>
            <td align="right" class="flight_selectall">CABIN</td>
            <td><select class="srch_flgt_sltbx1" name="cabin" id="class">
                                                                            <option selected="selected" value="E">Economy</option>
                                                                            <option value="B">Business</option>
                                                                        </select></td>
          </tr>
          <tr>
            <td colspan="4"><table width="330" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td align="center" class="flight_selectall2">ADULT <br />
(12+)Yrs</td>
                <td align="center"><select name="adult" class="selectall2" id="Adult">
                  <option selected="selected">1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                  <option>6</option>
                  <option>7</option>
                  <option>8</option>
                  <option>9</option>
                </select></td>
                <td align="center" class="flight_selectall2">CHILD <br />
(2-11)Yrs</td>
                <td align="center"><select name="child" class="selectall2" id="Adult2">
                  <option selected="selected">0</option>
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                  <option>6</option>
                </select></td>
                <td align="center" class="flight_selectall2">INFANT <br />
(&lt;2)Yrs</td>
                <td align="center"><select name="infant" class="selectall2" id="Adult3">
                  <option>0</option>
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                </select></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td height="40" colspan="4" align="center"><input type="image" src="<?php echo WEB_DIR; ?>images/flights_serach_bt.png" width="191" height="35" border="0" /></td>
          </tr>
          </table>
      </td>
    </tr>
  </table>
          
          
          
         
          
           </form>
           </div>
        </div>
     
      <div class="SEARCH_BOTOOM"></div>
    </div>
    <div class="middlebodywrapper">
    <div class="content_continer">
      <div class="sam_wi944">
        <div class="sub_heding_left_cover">
          <div class="sub_heding_cover">
            <div class="wi5_15"></div>
            <div class="wi600">TOP DESTINATIONS</div>
          </div>
      
          
      		<div style="width:672px; margin:0 auto">
                                   
                                    	<div style="float:left; width:672px;">
                                         <a href="<?php echo WEB_URL ;?>hotel/search_index/2">
                                        	<div class="div-topdes-bg">
                                            	<div class="div-topdes-img"><img src="<?php echo WEB_DIR ?>images/ind-top-desimg2.jpg" width="192" height="120" /></div>
                                                <div style="width:192px; margin:0 auto;">
                                                	<span  class="sum-txt-hotname">London</span>
                                                    <span class="sum-txt-hotname1">402 hotels</span>
                                                </div>
                                            </div>
                                            </a>
                                              <a href="<?php echo WEB_URL ;?>hotel/search_index/1">
                                            <div class="div-topdes-bg">
                                            	<div class="div-topdes-img"><img src="<?php echo WEB_DIR ?>images/parisy.jpg" width="192" height="120" /></div>
                                                <div style="width:192px; margin:0 auto;">
                                                	<span  class="sum-txt-hotname">Paris</span>
                                                    <span class="sum-txt-hotname1">389 hotels</span>
                                                </div>
                                            </div>
                                            </a>
                                              <a href="<?php echo WEB_URL ;?>hotel/search_index/3">
                                            <div class="div-topdes-bg">
                                            	<div class="div-topdes-img"><img src="<?php echo WEB_DIR ?>images/dubai.jpg" width="192" height="120" /></div>
                                                <div style="width:192px; margin:0 auto;">
                                                	<span  class="sum-txt-hotname">Dubai</span>
                                                    <span class="sum-txt-hotname1">337 hotels</span>
                                                </div>
                                            </div>
                                            </a>
                                              <a href="<?php echo WEB_URL ;?>hotel/search_index/4">
                                            <div class="div-topdes-bg">
                                            	<div class="div-topdes-img"><img src="<?php echo WEB_DIR ?>images/ind-top-desimg4.jpg" width="192" height="120" /></div>
                                                <div style="width:192px; margin:0 auto;">
                                                	<span  class="sum-txt-hotname">Singapore</span>
                                                    <span class="sum-txt-hotname1">252 hotels</span>
                                                </div>
                                            </div>
                                            </a>
                                              <a href="<?php echo WEB_URL ;?>hotel/search_index/5">
                                            <div class="div-topdes-bg">
                                            	<div class="div-topdes-img"><img src="<?php echo WEB_DIR ?>images/sydney.jpg" width="192" height="120" /></div>
                                                <div style="width:192px; margin:0 auto;">
                                                	<span  class="sum-txt-hotname">Sydney</span>
                                                    <span class="sum-txt-hotname1">112 hotels</span>
                                                </div>
                                            </div>
                                            </a>
                                              <a href="<?php echo WEB_URL ;?>hotel/search_index/6">
                                            <div class="div-topdes-bg">
                                            	<div class="div-topdes-img"><img src="<?php echo WEB_DIR ?>images/ind-top-desimg.jpg" width="192" height="120" /></div>
                                                <div style="width:192px; margin:0 auto;">
                                                	<span  class="sum-txt-hotname">New Delhi</span>
                                                    <span class="sum-txt-hotname1">206 hotels</span>
                                                </div>
                                            </div>
                                              </a>                                      
                                        </div>
                                    	
                                    </div>    
          
          
          
          
          
          
          
        </div>
        
        <div class="wi278_r_new">
        		<div class="sub_heding_cover_2">
                		<div class="wi5_15"></div>
                        <div class="wisib_gead">SPECIALS OF THE WEEK</div>
                        <!--<div class="view_all"><a href="#" class="view_all_link">View All</a></div>-->
                </div>
                <div class="wi253_287">
                		<img src="<?php echo WEB_DIR ?>images/view_all_image.jpg" width="253" height="287" />
                </div>
                <div class="view_all_caption"><span class="blue_01">DE LA FLORA / JAPAN</span> Enjoy the crystal clear water and tropical surroundings with 15% off and free breakfast. <!--<div class="view_all"><a href="#" class="view_all_link">more »</a></div>-->	 </div>
        </div>
      </div>
      <div class="news_hotel_cover">
      
      		<div class="newhotel_268_new">
            	<div class="news_hotel_sub_head">
                		<div class="wi5_15"></div>
                        <div class="wisib_gead_second" style="text-transform:uppercase; width:220px">Why Use Stayaway.com</div>
                        <!--<div class="view_all"><a href="#" class=" view_all_link">View All</a></div>-->
                </div>
                
                <div class="lond_234">
                <div class="plzce_cover">
                		<div class="wid173_new">1. Best Rates Guaranteed</div>
                </div>
                <div class="plzce_cover">
                		<div class="wid173_new">2. 70,000 Hotels Worldwide</div>
                </div>
                <div class="plzce_cover">
                		<div class="wid173_new">3. instant Booking & Confirmation</div>
                </div><div class="plzce_cover">
                		<div class="wid173_new">4. Active Customer Support</div>
                </div>
                <div class="plzce_cover">
                		<div class="wid173_new">5. Avail Great Discounts</div>
                </div>
                </div>
                
            </div>
            <div class="newhotel_268_second">
            	<div class="news_hotel_sub_head">
                		<div class="wi5_15"></div>
                        <div class="wisib_gead_second">TOP DESTINATIONS</div>
                        <!--<div class="view_all"><a href="#" class=" view_all_link">View All</a></div>-->
                </div>
                <div class="lond_234">
                <div class="plzce_cover">
                		<div class="wid173">LONDON</div>
                        <div class="rate_wi70">130 GBP</div>
                </div>
                <div class="plzce_cover">
                		<div class="wid173">PARIS   </div>
                        <div class="rate_wi70">160 GBP</div>
                </div>
                <div class="plzce_cover">
                		<div class="wid173">BERLIN  </div>
                        <div class="rate_wi70">230 GBP</div>
                </div><div class="plzce_cover">
                		<div class="wid173">NEW YORK CITY </div>
                        <div class="rate_wi70">130 GBP</div>
                </div>
                <div class="plzce_cover">
                		<div class="wid173">ZURICH   </div>
                        <div class="rate_wi70">540 GBP</div>
                </div>
                <div class="plzce_cover">
                		<div class="per_96">(FROM (PER NIGHT)</div>
                </div>
                
                </div>
            </div>
            <div class="newhotel_268_third_new">
            	<div class="news_hotel_sub_head_3">
                		<div class="wi5_15"></div>
                        <div class="wisib_gead_second">HOT DEALS</div>
                        <!--<div class="view_all"><a href="#" class=" view_all_link">View All</a></div>-->
                </div>
                <div class="lond_234_third">
                <div class="plzce_cover_second">
                		<div class="wid173_third_new">VIENNA OPENING SPECIAL    </div>
                        <div class="rate_wi70">130 GBP</div>
                </div>
                <div class="plzce_cover_second">
                		<div class="wid173_third_new">30% OFF IN SWITZERLAND    </div>
                        <div class="rate_wi70">130 GBP</div>
                </div>
                <div class="plzce_cover_second">
                		<div class="wid173_third_new">LONGSTAY SPECIAL BRAZIL   </div>
                        <div class="rate_wi70">130 GBP</div>
                </div>
                <div class="plzce_cover_second">
                		<div class="wid173_third_new">FREE UPGRADE IN PORTO     </div>
                        <div class="rate_wi70">130 GBP</div>
                </div>
                <div class="plzce_cover_second">
                		<div class="wid173_third_new">LONGSTAY SPECIAL BRAZIL    </div>
                        <div class="rate_wi70">130 GBP</div>
                </div>
                
                
                
                <div class="plzce_cover_second">
                		<div class="per_96" style="margin:0 30px 0 0;">(FROM (PER NIGHT)</div>
                </div>
                
                </div>
            </div>
      </div>
      <div class="news_hotel_cover">
      		<div class="wi656">
            		<div class="sub_heding_cover">
            <div class="wi5_15"></div>
            <div class="wi600">BOOK WITH US TODAY  <span style="color:#747373; font-weight:normal;">( See all the benefits )</span></div>
          </div>
          <div class="one_icon_cover">
          		<div class="one_icon">
                <img src="<?php echo WEB_DIR ?>images/i_icon_bg.jpg" width="24" height="66" />
                </div>
                <div class="best_rate"><span style="color:#227fb0; font-variant:small-caps; font-size:14px; font-weight:bold;"> BEST RATE <br/>
GUARANTEE</span><br/>
<span style="color:#808080; font-size:12px;">
Found a lower rate?<br/>
We'll beat it »</span>
</div>
          </div>
          <div class="one_icon_cover">
          		<div class="one_icon">
                <img src="<?php echo WEB_DIR ?>images/2_icon_bg.jpg" width="24" height="66" />
                </div>
                <div class="best_rate"><span style="color:#227fb0; font-variant:small-caps; font-size:14px; font-weight:bold;"> MEMBERS ONLY <br/>
-50% PROMOTIONS</span><br/>
<span style="color:#808080; font-size:12px;">
Join the club for free <br/>
today »</span>
</div>
          </div>
          <div class="one_icon_cover">
          		<div class="one_icon">
                <img src="<?php echo WEB_DIR ?>images/3_icon_bg.jpg" width="24" height="66" />
                </div>
                <div class="best_rate"><span style="color:#227fb0; font-variant:small-caps; font-size:14px; font-weight:bold;">HANDPICKED,
 <br/>
UNIQUE HOTELS</span><br/>
<span style="color:#808080; font-size:12px;">
Only 200 hotels matched <br/>
our criteria »</span>
</div>
          </div>
            </div>
            <div class="search_wi291">
            		<div class="sub_heding_cover_2">
                		<div class="wi5_15"></div>
                        <div class="wisib_gead_4th">HOT DEALS AND NEW HOTELS</div>
                        
                </div>
                <div class="search_bg_240">
                	<p><img src="<?php echo WEB_DIR ?>images/messege_icon.jpg" width="14" height="10" /> sign up for newsletter</p>
                    <div class="text_cov"><input name="" type="text" class="wi156_126" /></div>
                    <div class="ok_btn"><a href="#"><img src="<?php echo WEB_DIR ?>images/ok_btn.jpg" width="43" height="35" /></a></div>
                </div>
            </div>
      </div>
    </div>
    </div>
</div><div style="clear:both"></div>
<?php $this->load->view('footer'); ?>
</body>
</html>
 <link href="<?php echo WEB_DIR; ?>css/postion-slider.css" rel="stylesheet" type="text/css" />
 	<!--<script type="text/javascript" src="<?php echo WEB_DIR ?>js/jquery.js"></script>-->
  
	<script type="text/javascript" src="<?php echo WEB_DIR; ?>script/jquery.nivo.slider.pack.js"></script>
    
      
<script type="text/javascript">
    $(window).load(function() {
		
		 $('#slider').nivoSlider();
    });
</script>
  <script type="text/javascript">
function hotel_li()
{

	$( "#id_hotel" ).show();
	$( "#id_flight" ).hide();
}
function flight_li()
{
	$( "#id_flight" ).show();
	$( "#id_hotel" ).hide();
}

$(document).ready(function()
{
   //$("#datepicker3").datepicker("disable");
   $(".tripType").change(function()
    {
	$val=$(this).val();
	if($val==1)
	{	   
	    $("#datepicker3").datepicker("destroy");

	}
	else
	{
	    $("#datepicker3").datepicker();
	}
    });
});
</script>;
</script>t>cript>;
</script>