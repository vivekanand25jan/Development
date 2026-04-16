<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Travel Bay</title>
<link href="<?php echo WEB_DIR; ?>css/style_sheet.css" rel="stylesheet" type="text/css" />
<link href="<?php echo WEB_DIR; ?>css/postion.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="<?php echo WEB_DIR; ?>gui/slider/scripts/jquery-1.7.2.min.js"></script>	
<script language="javascript" type="text/javascript">	
function callModifyForm()
{
	$('#mofifyForm').toggle();
	$('#serachbarbg').toggle();
}
</script>
<style>
.wi40 {
	margin-left: 10px;
}
.AGE_OF2{
	margin: 0 -8px 0 0;
}
</style>
</head>
<body>
<?php $this->load->view('b2b/header'); 

$agent_det = $this->B2b_Model->agentInfo($this->session->userdata('agent_id'));
	
?>
<div class="midlebody">
  <div class="lhsside">
  <div class="serachbar">
  
  	<div class="mid-txt" style="color:#fff; padding-top:10px; margin-top:10px; text-align:right">
    <span style="font-size:30px;">You</span> are searching</div>
 		<div class="left-topbox">
        	<div><img src="<?php echo WEB_DIR; ?>images/bang-icon.jpg" border="0" style="position:relative; top:4px; padding-right:6px;" /><?php echo $_SESSION['city']; ?></div>
            <div><img src="<?php echo WEB_DIR; ?>images/bang-icon1.jpg" border="0" style="position:relative; top:4px; padding-right:6px;" /><?php echo $_SESSION['sd']; ?> to <?php echo $_SESSION['ed']; ?></div>
            <div><img src="<?php echo WEB_DIR; ?>images/bang-icon2.jpg" border="0" style="position:relative; top:4px; padding-right:6px;" /><?php echo $_SESSION['adult_count']; ?> Adults <?php echo $_SESSION['child_count']; ?> Childs</div>
            <div><img src="<?php echo WEB_DIR; ?>images/bang-icon3.jpg" border="0" style="position:relative; top:4px; padding-right:6px;" /><?php echo $_SESSION['room_count']; ?> Room</div>
            
            
            <div style="float:right">
				<!--<img src="<?php echo WEB_DIR; ?>images/modify-sbut.png" border="0" style="position:relative; top:30px;" />-->
				<a onclick="callModifyForm();"><img src="<?php echo WEB_DIR; ?>images/modify-sbut.png" border="0" style="position:relative; top:10px; cursor:pointer;"/></a>
			</div>      
        </div>


<div style="clear:both; padding-top:20px;"></div>

 <form name="search_result" action="<?php echo WEB_URL; ?>b2b_hotel/search"  onsubmit="javascript:return form_sub();" method="post" id="mofifyForm" style="display:none;">
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
<input value="<?php echo $next_dte; ?>"   readonly="readonly"  name="ed" id="datepicker1" type="text" class="check_bg_2" />
  
  
 </div>
  <div class="room_bor_bottom"  style="background-color:#243419; ">
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
<div style="float:left; width:230px; background:#243419;">
  <p style="color:#FFF; font-size:12px; padding-right:10px; padding-bottom:20px;background:#243419;"><input type="image" src="<?php echo WEB_DIR; ?>images/search_bt.png" width="83" height="27" border="0" align="right" /></p>
  </div><p>&nbsp;</p>
  </form>
  </div>
   <div class="serachbarbg" id="serachbarbg" style="display:none;"></div>
  	 </div>
    <div class="mainbody">
   <div>
   
    <div class="hotelnames" style="min-height:329px;border: 1px solid #BEE7FF;">
    
   		<!--<div class="right-hotel-name">Youngor Central Suzhou</div>-->
        <table width="100%" border="0" cellspacing="7" cellpadding="3" class="r-hoteldeta">
          <tr>
          	<td colspan="2" class="right-hotel-name"><?php echo $service->hotel_name;?>
            <br />
<?php $star = $service->star; 
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
											   elseif($star=='7')
											   {
												?> <span style="color:#243419">Deluxe</span>
                                                 <?php
											   }
											   elseif($star=='6')
											   {
												?> <span style="color:#243419">Standard</span>
                                                 <?php
											   }
											   else
											   {
												?><img src="<?php echo WEB_DIR.'images/0 star copy.jpg'; ?>" />
                                                <?php
											   }
											   ?>  </td>
          </tr>
          <tr>
            <td>Location :</td>
            <td style="color:#227fb0"><?php echo $service->address; ?> ., <?php echo $service->city; ?></td>
          </tr>
          <tr>
          	<td>Check-in:</td>
            <td style="color:#227fb0"><?php echo $_SESSION['sd']; ?></td>
          </tr>
          <tr>
          	<td>Check-Out:</td>
            <td style="color:#227fb0"><?php echo $_SESSION['ed']; ?></td>
          </tr>
          <tr>
          	<td>Number of Rooms  </td>
            <td style="color:#227fb0"><?php echo $_SESSION['room_count']; ?></td>
          </tr>
          <!--<tr>
          	<td colspan="2">&nbsp;</td>
          </tr>-->
        </table>
        
        <form name="prices" method="post">
        <table class="btnadd" width="98%" border="0" cellspacing="0" cellpadding="5" bgcolor="#dee5eb" style="font-size:12px; margin-left:7px; margin-bottom:5px;border: 1px solid #BEE7FF;"  >
        <tr class="classic_room">
            <td align="center" valign="middle" class="classic_room_div" width="100" style=" font-size:14px;color:#227FB0;">Rooms</td>
            <td align="center" valign="middle" class="classic_room_div" width="100" style=" font-size:14px;color:#227FB0;" colspan="3">Room Type-Category</td>
            <!--<td align="center" valign="middle" class="classic_room_div" width="100" style=" font-size:14px;color:#227FB0;">Season</td>
            <td align="center" valign="middle" class="classic_room_div" width="100" style=" font-size:14px;color:#227FB0;">Market</td>-->
            <td align="center" valign="middle" class="classic_room_div" width="100" style=" font-size:14px;color:#227FB0;">Room Cost</td>
        </tr>
        
        <?php $api_temp_hotel_ids = explode(',',$api_temp_hotel_id);
		      //$api_temp_hotel_ids = count($api_temp_hotel_ids)
			  $s_date = $_SESSION['sd'];
			  
			  $grandSpecial;
			  $rr_type;
			  $grandCancelPolicyPlan;
			  $grandBookCode;
			  $grandbeCancelDateCharge;
		?>
        <!--<input type="text" name="countBook" id="countBook" value="<?php echo count($api_temp_hotel_ids); ?>" />-->
        <?php       
		for($i=0; $i< count($api_temp_hotel_ids); $i++)
		{
		$room_no = $i+1;
		$book_room_details = $this->B2b_Hotel_Model->get_book_room_details($api_temp_hotel_ids[$i]);
//echo "<pre/>";print_r($book_room_details);exit;
		$pay_count = 0;
		$stay_count = 0;
		$freedayss_v1=0;
		$checkfornight ='ok';


		?>
        <?php for($j=0;$j < count($book_room_details);$j++) { ?>
        <tr class='classic_room'>
        	<td align='center' valign='middle' width="170" colspan="5">
            <div style="border:1px solid #CCC; margin-top:0px;">
            <table border="0" cellpadding="7" cellspacing="0" width="100%">
            
            
            <tr class='classic_room' width="700" id="DailyRates_<?php echo $i.$j;?>" style="display:none;">
            <td align='left' valign='middle' colspan="5" style="line-height:35px;font-size:13px;">
				<?php 
					$start_date = explode('-',$_SESSION['sd']);
					$end_date = explode('-',$_SESSION['ed']);
					
					$room_alloc_date = $start_date[2].'-'.$start_date[1].'-'.$start_date[0];
					$room_vecate_date = $end_date[2].'-'.$end_date[1].'-'.$end_date[0];
					$start = strtotime($room_alloc_date);
					$end = strtotime($room_vecate_date);
					$days = $end - $start;
					$days1 = $end - $start;
					$days = ceil($days/86400);	
					$hotel_id = explode('CRS',$book_room_details[$j]->hotel_code);
					$sup_rate_tactics_id = $book_room_details[$j]->sup_rate_tactics_id;
										
					$get_hotel_promotion_stay_pay = $this->B2b_Hotel_Model->get_hotel_promotion_stay_pay($start,$days,$room_alloc_date, $room_vecate_date, $hotel_id[1], $sup_rate_tactics_id); 
					//echo "hiiii".$get_hotel_promotion_stay_pay[0][0]->stay_nights;
					$counterdays=$_SESSION['counterdays'];
					if(!empty($get_hotel_promotion_stay_pay)){
						$pay_nights = $get_hotel_promotion_stay_pay[0][0]->pay_nights;
						$stay_nights = $get_hotel_promotion_stay_pay[0][0]->stay_nights;
					}
					
					$start = strtotime($room_alloc_date);
					$end = strtotime($room_vecate_date);
					$days = $end - $start;
					$days = ceil($days/86400);
					$counter=0;
					$c_child_above_age_charge=0;
					$c_sec_child_charge=0;
					$stack = array();
					$cancelsAmt = array();
					$cancelsAmtwm = array();
					$valid = '';
					$grand_total_cost;
					$grand_total_costwm;
					$markups;
					$org_costs; 
					for($d=0;$d < $days;$d++)
					{ 
					//if($counter < 7 ) { 
					if($counter < $days ) {  
                ?>
            	<div style='color:#178AA0; border-bottom:1px solid #A3B6C8;height: 35px;line-height: 15px;'>
                <?php  
					$first_date = $room_alloc_date;
					$fdate = $first_date; 
					$fd = explode("-", $fdate); 	

					$last_date = $room_vecate_date;	
					$lldate = $last_date; 
					$lld = explode("-", $lldate); 

					$priceDate = date("Y-m-d", mktime(0,0,0,$fd[1], $fd[2] + $d, $fd[0]));
					$priceDate1 = date("Y-m-d", mktime(0,0,0,$lld[1], $lld[2] + $d, $lld[0]));
					$daily_Date = date("l M, d Y", mktime(0,0,0,$fd[1], $fd[2] + $d, $fd[0])); 
                    $dates_daily_prom = date("Y-m-d", mktime(0,0,0,$fd[1], $fd[2] + $d, $fd[0])); ?>
                    <span style="width:250px;"><?php echo $daily_Date; ?></span>
					<?php //$hotel_id = explode('CRS',$hotel_code);
					$hotel_id = explode('CRS',$book_room_details[$j]->hotel_code); 
					$sup_rate_tactics_id = $book_room_details[$j]->sup_rate_tactics_id;
					$category_type =$book_room_details[$j]->category_type;
					$room_type = $book_room_details[$j]->room_type; 
					$season_id = $book_room_details[$j]->season;
					$market_id = $book_room_details[$j]->market_id;
					$s_adult = $book_room_details[$j]->adult;
					$s_child = $book_room_details[$j]->child;
					
					$get_hotel_daily_rates = $this->B2b_Hotel_Model->get_hotel_daily_rates($s_adult, $s_child, $hotel_id[1], $priceDate,  $sup_rate_tactics_id, $category_type, $season_id, $market_id);
					$get_hotel_daily_allotment = $this->B2b_Hotel_Model->get_hotel_daily_allotment($hotel_id[1], $priceDate,$priceDate1,$room_type, $season_id);
				//echo 'rate'.$get_hotel_daily_rates[0]->rate;
				
				if($get_hotel_daily_rates[0]->meal_plan=='0')
				{
					'<br> Including meals: Half Board'; if($get_hotel_daily_rates[0]->breakfast_type!='') echo ' - '.$get_hotel_daily_rates[0]->breakfast_type;
				}
				else if($get_hotel_daily_rates[0]->meal_plan=='1')
				{
					'<br> Including meals: Full Board'; if($get_hotel_daily_rates[0]->breakfast_type!='') echo ' - '.$get_hotel_daily_rates[0]->breakfast_type;
				}
				else if($get_hotel_daily_rates[0]->meal_plan=='2')
				{
					'<br> Room Only'; if($get_hotel_daily_rates[0]->breakfast_type!='') echo ' - '.$get_hotel_daily_rates[0]->breakfast_type;
				}
				else if($get_hotel_daily_rates[0]->meal_plan=='3')
				{
					'<br> Including meals: All Inclusive'; if($get_hotel_daily_rates[0]->breakfast_type!='') echo ' - '.$get_hotel_daily_rates[0]->breakfast_type;
				}
				else if($get_hotel_daily_rates[0]->meal_plan=='4')
				{
					'<br> Including meals: Breakfast'; if($get_hotel_daily_rates[0]->breakfast_type!='') echo ' - '.$get_hotel_daily_rates[0]->breakfast_type;
				}
				else{
					'<br> Room Only';
				}
				?> 
                <div style="float:right;margin-right:215px;height:35px;line-height:15px;margin-top: -10px;">
				<?php 
					//echo $get_hotel_daily_rates[0]->rate;

					//print_r($_SESSION['child_age'][$i]);
				if($i=='0'){
					for($rch=0; $rch<6; $rch++){
						if($_SESSION['child_age'][$rch]!='0'){
							if($_SESSION['child_age'][$rch] >= $get_hotel_daily_rates[0]->child_above_age)
							{
								//echo $get_hotel_daily_rates[0]->child_above_age_charge;;
								$c_child_above_age_charge += $get_hotel_daily_rates[0]->child_above_age_charge;
							}
							if($_SESSION['child_age'][$rch] < $get_hotel_daily_rates[0]->child_above_age)
							{
								$c_sec_child_charge += $get_hotel_daily_rates[0]->child_charge;
							}
						}
					}
				}
				if($i=='1'){
					for($rch=6; $rch<12; $rch++){
						if($_SESSION['child_age'][$rch]!='0'){
							if($_SESSION['child_age'][$rch] >= $get_hotel_daily_rates[0]->child_above_age)
							{
								$c_child_above_age_charge += $get_hotel_daily_rates[0]->child_above_age_charge;
							}
							if($_SESSION['child_age'][$rch] < $get_hotel_daily_rates[0]->child_above_age)
							{
								$c_sec_child_charge += $get_hotel_daily_rates[0]->child_charge;
							}
						}
					}
				}
				if($i=='2'){
					for($rch=12; $rch<18; $rch++){
						if($_SESSION['child_age'][$rch]!='0'){
							if($_SESSION['child_age'][$rch] >= $get_hotel_daily_rates[0]->child_above_age)
							{
								$c_child_above_age_charge += $get_hotel_daily_rates[0]->child_above_age_charge;
							}
							if($_SESSION['child_age'][$rch] < $get_hotel_daily_rates[0]->child_above_age)
							{
								$c_sec_child_charge += $get_hotel_daily_rates[0]->child_charge;
							}
						}
					}
				}
				if($i=='3'){
					for($rch=18; $rch<24; $rch++){
						if($_SESSION['child_age'][$rch]!='0'){
							if($_SESSION['child_age'][$rch] >= $get_hotel_daily_rates[0]->child_above_age)
							{
								$c_child_above_age_charge += $get_hotel_daily_rates[0]->child_above_age_charge;
							}
							if($_SESSION['child_age'][$rch] < $get_hotel_daily_rates[0]->child_above_age)
							{
								$c_sec_child_charge += $get_hotel_daily_rates[0]->child_charge;
							}
						}
					}
				}
				if($i=='4'){
					for($rch=24; $rch<30; $rch++){
						if($_SESSION['child_age'][$rch]!='0'){
							if($_SESSION['child_age'][$rch] >= $get_hotel_daily_rates[0]->child_above_age)
							{
								$c_child_above_age_charge += $get_hotel_daily_rates[0]->child_above_age_charge;
							}
							if($_SESSION['child_age'][$rch] < $get_hotel_daily_rates[0]->child_above_age)
							{
								$c_sec_child_charge += $get_hotel_daily_rates[0]->child_charge;
							}
						}
					}
				}
				if($i=='5'){
					for($rch=30; $rch<36; $rch++){
						if($_SESSION['child_age'][$rch]!='0'){
							if($_SESSION['child_age'][$rch] >= $get_hotel_daily_rates[0]->child_above_age)
							{
								$c_child_above_age_charge += $get_hotel_daily_rates[0]->child_above_age_charge;
							}
							if($_SESSION['child_age'][$rch] < $get_hotel_daily_rates[0]->child_above_age)
							{
								$c_sec_child_charge += $get_hotel_daily_rates[0]->child_charge;
							}
						}
					}
				}
				if($i=='6'){
					for($rch=36; $rch<42; $rch++){
						if($_SESSION['child_age'][$rch]!='0'){
							if($_SESSION['child_age'][$rch] >= $get_hotel_daily_rates[0]->child_above_age)
							{
								$c_child_above_age_charge += $get_hotel_daily_rates[0]->child_above_age_charge;
							}
							if($_SESSION['child_age'][$rch] < $get_hotel_daily_rates[0]->child_above_age)
							{
								$c_sec_child_charge += $get_hotel_daily_rates[0]->child_charge;
							}
						}
					}
				}
				if($i=='7'){
					for($rch=42; $rch<48; $rch++){
						if($_SESSION['child_age'][$rch]!='0'){
							if($_SESSION['child_age'][$rch] >= $get_hotel_daily_rates[0]->child_above_age)
							{
								$c_child_above_age_charge += $get_hotel_daily_rates[0]->child_above_age_charge;
							}
							if($_SESSION['child_age'][$rch] < $get_hotel_daily_rates[0]->child_above_age)
							{
								$c_sec_child_charge += $get_hotel_daily_rates[0]->child_charge;
							}
						}
					}
				}
				if($i=='8'){
					for($rch=48; $rch<54; $rch++){
						if($_SESSION['child_age'][$rch]!='0'){
							if($_SESSION['child_age'][$rch] >= $get_hotel_daily_rates[0]->child_above_age)
							{
								$c_child_above_age_charge += $get_hotel_daily_rates[0]->child_above_age_charge;
							}
							if($_SESSION['child_age'][$rch] < $get_hotel_daily_rates[0]->child_above_age)
							{
								$c_sec_child_charge += $get_hotel_daily_rates[0]->child_charge;
							}
						}
					}
				}
				if($i=='9'){
					for($rch=54; $rch<60; $rch++){
						if($_SESSION['child_age'][$rch]!='0'){
							if($_SESSION['child_age'][$rch] >= $get_hotel_daily_rates[0]->child_above_age)
							{
								$c_child_above_age_charge += $get_hotel_daily_rates[0]->child_above_age_charge;
							}
							if($_SESSION['child_age'][$rch] < $get_hotel_daily_rates[0]->child_above_age)
							{
								$c_sec_child_charge += $get_hotel_daily_rates[0]->child_charge;
							}
						}
					}
				}



					
					$amountv1 = $roomPlusSupplementCharge=$get_hotel_daily_rates[0]->rate + $get_hotel_daily_rates[0]->supplementary_charge_rate;

					$splChar = $get_hotel_daily_rates[0]->supplementary_charge_rate + $c_child_above_age_charge + $c_sec_child_charge;
					
					$amountv1 = $roomPlusSupplementCharge=$get_hotel_daily_rates[0]->rate + $splChar;
					
					$b2b_user_id =$this->session->userdata('agent_logged_in'); 
					$contry = $this->B2b_Hotel_Model->get_country($_SESSION['city']);
					$markup =  $this->B2b_Hotel_Model->get_markup_detail($contry,$hotel_id[1],$b2b_user_id);
					$pay_charge = $this->B2b_Hotel_Model->get_payment_charge(); 
					if(!empty($markup))
					{
						$amountv2 = ($markup /100);
						$amountv3 = $amountv2*$amountv1;
						$splCharMark = $amountv2*$splChar;

						$total_cost = $amountv3+$amountv1;
						$splCharCost = $splCharMark+$splChar;
						
						$splCharMarkwm = $splChar;

						$total_costwm = $amountv1;
						$splCharCostwm = $splCharMarkwm+$splChar;
						
						
					
					}else {
						$amountv3 = '';
						$splCharMark = '';
						$total_cost = $amountv1;
						$splCharCost = $splChar;
						
						$total_costwm = $amountv1;
						$splCharCostwm = $splChar;
					}
					$agent_det = $this->B2b_Model->agentInfo($this->session->userdata('agent_id'));
					$agent_mode = $agent_det->agent_mode; 
					
					$amountv3pay = 0;
					$splCharCostPay = 0;
					$splCharCostPaywm = 0;
					if(!empty($agent_mode) && $agent_mode == '4'){
					$amountv2pay = ($pay_charge /100);
					$amountv3pay = $amountv2pay*$total_cost;
					$amountv3paywm = $amountv2pay*$total_costwm;

					$splCharCostPay = $amountv2pay*$splCharCost;
					
					$splCharCostPaywm = $amountv2pay*$splCharCostwm;
					}
					$total_cost = $total_cost + $amountv3pay;
					$total_costwm = $total_costwm + $amountv3paywm;

					$splCharCost = $splCharCost + $splCharCostPay;
					$splCharCostwm = $splCharCostwm + $splCharCostPaywm;
								
					
					$get_hotel_early_bird_rates = $this->B2b_Hotel_Model->get_hotel_early_bird_rates($room_alloc_date, $room_vecate_date, $hotel_id[1], $room_type, $season_id);
					
					$discount;
					if(isset($get_hotel_early_bird_rates[0]->discount) && $get_hotel_early_bird_rates[0]->discount!= '')
					{
						$discount = $get_hotel_early_bird_rates[0]->discount;
						$discount_amt = ($discount /100) * $total_cost ;
						$total_cost = $total_cost - $discount_amt;
						$total_costwm = $total_costwm - $discount_amt;
						
						$_SESSION['earlyBirdPer'] = $discount;
					}
					else if(isset($get_hotel_early_bird_rates[0]->amount) && $get_hotel_early_bird_rates[0]->amount!= '')
					{
						$discount_amt = $get_hotel_early_bird_rates[0]->amount;
						$total_cost = $total_cost - $discount_amt;
						$total_costwm = $total_costwm - $discount_amt;
						
						$_SESSION['earlyBirdAmt'] = $discount_amt;
					}
					else
					{
						//$discount = $get_hotel_early_bird_rates[0]->amount;
						//$total_cost = $total_cost - $discount;
					}
					
					$freedays = $stay_nights - $pay_nights;
					$freedayss = 1;
					$multipleAccess=$get_hotel_promotion_stay_pay[0][0]->multiple;
					if($multipleAccess=='1')
					{
						$freedayss = floor($days / $stay_nights);
					}
					
					$pay_count = $pay_count+1;
					//$prom_from=$get_hotel_promotion_stay_pay[0][0]->promotion_avail_date_from;  old
					$prom_from=$get_hotel_promotion_stay_pay[0][0]->from_date;
				 //echo "end".$end;
				//$prom_to=$get_hotel_promotion_stay_pay[0][0]->promotion_avail_date_to; old
				$prom_to=$get_hotel_promotion_stay_pay[0][0]->to_date;
$paystr = 24*60*60*$pay_nights;
$strtf= strtotime($prom_from)+$paystr;
$dailystr = strtotime($dates_daily_prom);
//echo $get_hotel_promotion_stay_pay.'s';echo "<br/>"; echo $stay_nights.'s';echo "<br/>"; echo $pay_nights.'t';echo "<br/>"; echo $dates_daily_prom.'fo'; echo "<br/>"; echo $prom_from.'fi'; echo "<br/>"; echo $prom_to.'si';echo "<br/>"; echo $pay_nights.'se';echo "<br/>"; echo $pay_count.'ei'; die;
//echo "<br/>";
//echo $checkfornight.'f'; echo  $dailystr.'s'; echo $strtf.'t'; die;
					if(!empty($get_hotel_promotion_stay_pay) && $stay_nights!='' && $pay_nights!='' && $dates_daily_prom >= $prom_from && $dates_daily_prom <= $prom_to && $pay_nights < $pay_count)
					{
						$stay=0; //echo $checkfornight.'f'; echo  $dailystr.'s'; echo $strtf.'t'; die;
					  if($checkfornight != ''  &&  $dailystr >= $strtf)
					  {
						  //&& $get_hotel_daily_rates[0]->statuss!=0 (this is removed from IF
						echo '<span style="color:rgb(20, 185, 6);font-size:16px;">FREE STAY</span>';
						$stay++;
						$stay_count = $stay_count+1;
						if($freedays == $stay_count)
						{
							$pay_count =0;
							$stay_count=0;
						
							$freedayss_v1 = $freedayss_v1+1;
						   if($freedayss == $freedayss_v1)
						   {
								$checkfornight = '';
						   }
						}
						//$total_cost=0;
						$total_cost=$splCharCost;
						$total_costwm=$splCharCostwm;
						if($total_cost!='0'){
							//echo $hotel_season_prices[$sp]->xml_currency;
							//echo ' '.number_format((float)$total_cost, 2, '.', '');
$kk = $this->session->userdata('curr_values')*$total_cost;
							echo '<span style="font-soze:11px; position:absolute;margin-top:15px;margin-left:73px;">'.$hotel_season_prices[$sp]->xml_currency.' '.number_format((float)$kk, 2, '.', '').' (Child charge & Supplementary charge)</span> ';
						}
					 }
					 else{
						$kk = $this->session->userdata('curr_values')*$total_cost;
						echo $book_room_details[$j]->xml_currency;
						echo ' '.number_format((float)$kk, 2, '.', '');
						$room_daily_rate[$h] = number_format((float)$kk, 2, '.', '');
					}
					}
					else{
						$kk = $this->session->userdata('curr_values')*$total_cost;
						echo $book_room_details[$j]->xml_currency;
						echo ' '.number_format((float)$kk, 2, '.', '');
						$room_daily_rate[$h] = number_format((float)$kk, 2, '.', '');
					}
				$h++;
					//$remainingDays = $days - ($freedays*$freedayss);
					
					//if(!empty($get_hotel_promotion_stay_pay) && $stay_nights!='0' && !empty($pay_nights) && $pay_nights <= $counter && $counter>=$remainingDays && $stay_nights <= $days){ 
						//echo '<span style="color:rgb(20, 185, 6);font-size:16px;">FREE STAY</span>';
						//$total_cost=0;
					//}
					//else{
						//echo $book_room_details[$j]->xml_currency;
						//echo ' '.number_format((float)$total_cost, 2, '.', '');
					//}
					
					$org_costs = $org_costs + $amountv1;
					$markups = $markups + $amountv3;
					$grand_total_cost=($grand_total_cost+$total_cost);
					$grand_total_costwm = ($grand_total_costwm+$total_costwm);
					$grand_total_cost=number_format((float)$grand_total_cost, 2, '.', '');
					$grand_total_costwm=number_format((float)$grand_total_costwm, 2, '.', '');
					$allocation_release_days = $get_hotel_daily_allotment[0][0]->allocation_release_days;
                                        $allocation_room_count = $get_hotel_daily_allotment[0][0]->allocation_rooms;
					//$days_ago = date('Y-m-d', strtotime('-5 days', strtotime($priceDate)));
					$days_ago = date('Y-m-d', strtotime('-'.$allocation_release_days.' days', strtotime($priceDate)));
					
					$exp_date = $days_ago;
					$todays_date = date("Y-m-d");
					
					$today = strtotime($todays_date);
					
					$expiration_date = strtotime($exp_date);
                                     
                                        
                                        $start_date = explode('-',$_SESSION['sd']);
		$room_alloc_date = $start_date[2].'-'.$start_date[1].'-'.$start_date[0];
		$first_date = $room_alloc_date;
					$fdate = $first_date; 
					$fd = explode("-", $fdate); 		
				$priceDate = date("Y-m-d", mktime(0,0,0,$fd[1], $fd[2] + $d, $fd[0]));
                                
                                
                
               $allocation_validty_from = $get_hotel_daily_allotment[0][0]->allocation_validity_from;
                //echo $allocation_validty_from;
               $strallocationfrom = strtotime($allocation_validty_from);
               
               $tdate = strtotime(date("Y-m-d"));
         
               $strtoprice = strtotime($priceDate)-(86400*($allocation_release_days-1));
                
                 $ainstrtime = $strallocationfrom;
               //echo date("Y-m-d",$ainstrtime); echo "--";
                 
                 $alocto = strtotime($get_hotel_daily_allotment[0][0]->allocation_validity_to);
					
					/*if ($allocation_release_days!='' && $expiration_date > $today) {
						if(isset($pay_nights) && $pay_nights <= $counter && $counter>=$remainingDays){ 
							$valid = "Available";
							echo "<div style='color:green;font-weight: bold;'>Available</div>";
						}else{ 
						 $valid = "On Request";
						echo "<div style='color:green;font-weight: bold;'>On Request</div>";
						}
					} else { 
						//if(isset($pay_nights) && $pay_nights <= $counter){
						//}else{
						 $valid = "On Request";
						 echo "<div style='color:#ff9900;font-weight: bold;'>On Request</div>";
						//}
					}*/
                 
                  if(!empty($allocation_release_days) && $allocation_room_count > 0 && $strtoprice>=$ainstrtime && $get_hotel_daily_rates[0]->statuss!=0) {

			//print_r($allocation_room_count);exit;
                        
					//if ($allocation_room_count>0 && $get_hotel_daily_rates[0]->statuss==1 ) {
						//echo "hi    ";
						
						/*if(isset($pay_nights) && $pay_nights <= $counter && $counter>=$remainingDays){
						echo "yy";	$valid = "Available";//echo	$expiration_date;
							echo "<div style='color:green;font-weight: bold;'>Available</div>";
						}else{
							*/
						 $valid = "Available";//echo	$expiration_date;
						echo "<div style='color:green;font-weight: bold;'>Available</div>";
						//}
					} else { //echo "empty"; 
						//if(isset($pay_nights) && $pay_nights <= $counter){
						//}else{
						 $valid = "On Request";//echo	$expiration_date;
                                                 
						 echo "<div style='color:#ff9900;font-weight: bold;'>On Request</div>";
						//}
					}
                ?></div>
                </div>
				<?php } $fd[2] = $fd[2] + $d; $counter++; array_push($cancelsAmtwm, $amountv1);array_push($stack, $valid); array_push($cancelsAmt, $total_cost);$c_child_above_age_charge=0;$c_sec_child_charge=0;} 
				//print_r($stack);
				//print_r($cancelsAmt);
				?>
            </td>
        </tr>
            
            
			<tr class='classic_room'>
            <td align='center' valign='middle' width="100" bgcolor="#eee" style="color:#227FB0; font-size:14px;">Room Number <?php echo $room_no;?></td>
            <td align='center' valign='middle' width="100" bgcolor="#eee" style="color:#227FB0; font-size:14px;" colspan="3"><?php echo $book_room_details[$j]->room_type;?>
            ROOM <div style="color:#517194; font-size:12px;line-height: 15px;">Total
            <?php if($get_hotel_daily_rates[0]->meal_plan=='0')
				{
					echo $meal=' including Half Board:'; 
				}
				else if($get_hotel_daily_rates[0]->meal_plan=='1')
				{
					echo $meal=' including Full Board:'; 
				}
				else if($get_hotel_daily_rates[0]->meal_plan=='2')
				{
					echo $meal=''; 
				}
				else if($get_hotel_daily_rates[0]->meal_plan=='3')
				{
					echo $meal=' including All Inclusive:'; 
				}
				else if($get_hotel_daily_rates[0]->meal_plan=='4')
				{
					echo $meal=' including Breakfast:'; 
				}
			?>
            </div>
            <?php if(!empty($get_hotel_promotion_stay_pay)){ //echo "hello";
				if(($stay>0 && $get_hotel_promotion_stay_pay[0][0]->stay_nights!='' && $counterdays >= $get_hotel_promotion_stay_pay[0][0]->stay_nights && $get_hotel_promotion_stay_pay[0][0]->stay_nights!='0') || $get_hotel_promotion_stay_pay[0][0]->bb_date!='0000-00-00'){
					//echo "hi";exit;
		$special_offer.='<div><img src="'.WEB_DIR.'images/promotion.gif" /> 
                <span style="color:#178AA0;">Special Offer: The following special/s apply for this booking:</span>';  } 
                if($stay>0 && $get_hotel_promotion_stay_pay[0][0]->stay_nights!='' && $counterdays >= $get_hotel_promotion_stay_pay[0][0]->stay_nights && $get_hotel_promotion_stay_pay[0][0]->stay_nights!='0' ) { 
		$special_offer.='<div style="color:#517194; font-size:12px;line-height: 15px;">STAY'. $get_hotel_promotion_stay_pay[0][0]->stay_nights.' PAY '. $get_hotel_promotion_stay_pay[0][0]->pay_nights .' PROMO - Stay '. $get_hotel_promotion_stay_pay[0][0]->stay_nights .' Pay for '. $get_hotel_promotion_stay_pay[0][0]->pay_nights.'</div>';
                
                } if($get_hotel_promotion_stay_pay[0][0]->bb_date!='0000-00-00' ){ 
         $special_offer.='<div style="color:#517194; font-size:12px;line-height: 15px;">BOOK BB';
				 $bb_date = explode("-", $get_hotel_promotion_stay_pay[0][0]->bb_date);
		$special_offer.=$bb_date[2].'-'.$bb_date[1].'-'.$bb_date[0];
		$special_offer.=' UPGRADE TO HB ';
				 $hh_date = explode("-", $get_hotel_promotion_stay_pay[0][0]->hh_date);
		$special_offer.=$hh_date[2].'-'.$hh_date[1].'-'.$hh_date[0];
		$special_offer.='</div>';}
		$special_offer.='</div>';
		$booking_code=$get_hotel_promotion_stay_pay[0][0]->booking_code;}
		$rr_type.='<div style="color:#227FB0; font-size:14px;margin-top:5px;">'.$book_room_details[$j]->room_type.'</div>';
		echo $special_offer;
		$grandSpecial.= '<div style="color:#227FB0; font-size:14px;margin-top:5px;">'.$book_room_details[$j]->room_type.'</div>'.$special_offer;
		$grandBookCode.= $booking_code;
		
			?>
            </td>
            <!--<td align='center' valign='middle' width="100" bgcolor="#eee" style="color:#227FB0; font-size:14px;"><?php $season_name = $this->B2b_Hotel_Model->get_season($book_room_details[$j]->season); echo $season_name->season;?></td>
            <td align="center" valign="middle" width="100" bgcolor="#eee" style="color:#227FB0; font-size:14px;"><?php $market_name = $this->B2b_Hotel_Model->get_market($book_room_details[$j]->market_id); echo $market_name->market_name; ?></td>-->
            <td align="center" valign="top" width="100" bgcolor="#eee" style="color:#966693; font-size:14px;">
			<div id="showDailyRates_<?php echo $i.$j;?>" style="color:#178AA0; cursor:pointer; text-decoration:underline; font-size:12px;" onclick="showDailyRates('<?php echo $i.$j;?>')">Daily Rates</div>
			<?php echo $book_room_details[$j]->xml_currency;?> <?php echo number_format((float)$grand_total_cost*$this->session->userdata('curr_values'), 2, '.', ''); //echo $book_room_details[$j]->total_cost;?><br /><!--<span style="color:green;">Available</span>-->
            <?php 
				if (in_array("On Request", $stack)) {
					echo "<span style='color:#ff9900;font-weight: bold;'>On Request</span>";
					$bookStatusRequest = "OnRequest";
				}
				else{ 
				    echo "<span style='color:green;'>Available</span>";	
				}
            ?>
            </td>
			</tr>
            
            <tr class='classic_room'>
            <!--<td align="center" valign="middle" width="10" bgcolor="#eee"></td>-->
            <td align='center' colspan="5" valign='middle' width="100" bgcolor="#eee" style="color:#227FB0; font-size:14px;">
            
            
            <table border="0" cellpadding="1" cellspacing="1" bgcolor="#91a3b7" width="100%" style="font-size:11px;">
                    
                    <tr bgcolor="#f0f2ec" height="25" style="font-size:13px;">
                    	
                        <td width="20%" align="center" nowrap><font class="home-text"><b>Rate Type</b></font></td>
                        <?php 
                        $start_date = explode('-',$_SESSION['sd']);
                        $end_date = explode('-',$_SESSION['ed']);
                        
                        $room_alloc_date = $start_date[2].'-'.$start_date[1].'-'.$start_date[0];
                        $room_vecate_date = $end_date[2].'-'.$end_date[1].'-'.$end_date[0];
                        
                        $start = strtotime($room_alloc_date);
                        $end = strtotime($room_vecate_date);
                        $days = $end - $start;
                        $days = ceil($days/86400);
                        $counter=0;                         
                        for($d=0;$d < $days;$d++)
                         { 
                           if($counter < $days ) { 
                        ?>
                        <td width="10%" align="center"> <font class="home-text"><b> 
                        <?php  
                               $first_date = $room_alloc_date;
                               $fdate = $first_date; 
                               $fd = explode("-", $fdate); 		
                               echo date("D", mktime(0,0,0,$fd[1], $fd[2] + $d, $fd[0]));
                        ?> </b></font></td>
                        <?php } $fd[2] = $fd[2] + $d; $counter++; } ?>
                        
                        <?php for($r=0;$r<($days - $d);$r++) {  $fd[2] = $fd[2]+1;?>
                        <td width="10%" align="center"><font class="home-text"><b>
                        <?php 
                        echo date("D", mktime(0,0,0,$fd[1], $fd[2], $fd[0])); ?></b></font></td>
                        <?php } ?>
                        
                        <td width="9%" align="center"> <font class="home-text"><b>Total</b></font> </td>
                        <td width="5%" align="center"><!--<input type="checkbox" name="all[]" id="[]" />--></td>
                    </tr>
                    
                    <tr bgcolor="#DDDDDD">
                    	
                        <td valign="middle" align="left" rowspan="1" nowrap bgcolor="#ffffff"> <font class="home-text">Adult Extra Bed</font> </td>
                        <?php 
						 $counter1=0; $totalAED = 0;$totalAEDw=0;
						for($d=0;$d < $days;$d++)
                        { 
                           if($counter1 < $days ) { 
                        ?>
                        <td align="center" valign="middle" height="5" bgcolor="#ffffff"> <font color="#966693">
                        <?php  
							$first_date = $room_alloc_date;
							$fdate = $first_date; 
							$fd = explode("-", $fdate); 		
							$priceDate = date("Y-m-d", mktime(0,0,0,$fd[1], $fd[2] + $d, $fd[0]));
							 
							$s_adult = $book_room_details[$j]->adult;
							$s_child = $book_room_details[$j]->child;
							$hotel_id = explode('CRS',$book_room_details[$j]->hotel_code);
							$sup_rate_tactics_id = $book_room_details[$j]->sup_rate_tactics_id;
							$category_type = $book_room_details[$j]->category_type;
							$season_id = $book_room_details[$j]->season;
							$market_id = $book_room_details[$j]->market_id;
							
							$get_hotel_daily_rates = $this->B2b_Hotel_Model->get_hotel_daily_rates($s_adult, $s_child, $hotel_id[1], $priceDate,  $sup_rate_tactics_id, $category_type, $season_id, $market_id);

							$ebpForMarkup = $get_hotel_daily_rates[0]->extra_bed_price;
							
							$b2b_user_id =$this->session->userdata('agent_logged_in'); 
							$contry = $this->B2b_Hotel_Model->get_country($_SESSION['city']);
							$markup =  $this->B2b_Hotel_Model->get_markup_detail($contry,$hotel_id[1],$b2b_user_id);
							if(!empty($markup))
							{
								$forcent = ($markup /100);
								$totMark = $forcent*$ebpForMarkup;
								$totalForEbp = $totMark+$ebpForMarkup;
							
							}else {
								$totMark = '';
								$totalForEbp = $ebpForMarkup;
							}
                                                        
                                                        $totalForEbpw = $ebpForMarkup;
                                                        
                                                        number_format((float)$totalForEbpw*$this->session->userdata('curr_values'), 2, '.', '');
							$totalAEDw = $totalAEDw+number_format((float)$totalForEbpw, 2, '.', '');
							$totelw1 = $totalAEDw;
							//$totalForEbp = $totalForEbp*$this->session->userdata('curr_values');
							echo number_format((float)$totalForEbp*$this->session->userdata('curr_values'), 2, '.', '');
							$totalAED = $totalAED+number_format((float)$totalForEbp, 2, '.', '');
							$totel1 = $totalAED;
							  
                        ?></font></td>
                        <?php } $fd[2] = $fd[2] + $d; $counter1++; } ?>
                        <?php for($r=0;$r<($days - $d);$r++) {  $fd[2] = $fd[2]+1;?>
                        
                        <td width="10%" align="center"><font class="home-text"><b>
                        <?php 
                        echo date("D", mktime(0,0,0,$fd[1], $fd[2], $fd[0])); ?></b></font></td>
                        <?php } ?>
                        
                        <td width="8%" bgcolor="#ffffff" align="center"><font class=small1><font color="#966693"><b><?php echo number_format((float)$totel1*$this->session->userdata('curr_values'), 2, '.', ''); ?></b></font></font></td>
                        <td width="5%" align="center"><input type="checkbox" name="aeb" id="aeb_<?php echo $i.$j; ?>" value="aeb--<?php echo $totel1*$this->session->userdata('curr_values'); ?>--<?php echo $totelw1*$this->session->userdata('curr_values'); ?>" /></td>
                    </tr>
                    <tr bgcolor="#DDDDDD">
                        <td valign="middle" align="left" rowspan="1" nowrap bgcolor="#ffffff"> <font class="home-text">2nd Child Charge</font> </td>
                        <?php 
						 $counter1=0; $totalCC = 0;$totalCCw=0;
						for($d=0;$d < $days;$d++)
                        { 
                           if($counter1 < $days ) { 
                        ?>
                        <td align="center" valign="middle" height="5" bgcolor="#ffffff"> <font color="#966693">
                        <?php  
                               $first_date = $room_alloc_date;
                               $fdate = $first_date; 
                               $fd = explode("-", $fdate); 		
                               $priceDate = date("Y-m-d", mktime(0,0,0,$fd[1], $fd[2] + $d, $fd[0]));
							 
							$s_adult = $book_room_details[$j]->adult;
							$s_child = $book_room_details[$j]->child;
							$hotel_id = explode('CRS',$book_room_details[$j]->hotel_code);
							$sup_rate_tactics_id = $book_room_details[$j]->sup_rate_tactics_id;
							$category_type = $book_room_details[$j]->category_type;
							$season_id = $book_room_details[$j]->season;
							$market_id = $book_room_details[$j]->market_id;
							
							$get_hotel_daily_rates = $this->B2b_Hotel_Model->get_hotel_daily_rates($s_adult, $s_child, $hotel_id[1], $priceDate,  $sup_rate_tactics_id, $category_type, $season_id, $market_id);
							//print_r($get_hotel_daily_rates);
							$ccForMarkup = $get_hotel_daily_rates[0]->child_charge;
							
							$b2b_user_id =$this->session->userdata('agent_logged_in'); 
							$contry = $this->B2b_Hotel_Model->get_country($_SESSION['city']);
							$markup =  $this->B2b_Hotel_Model->get_markup_detail($contry,$hotel_id[1],$b2b_user_id);
							if(!empty($markup))
							{
								$forcent = ($markup /100);
								$totMark = $forcent*$ccForMarkup;
								$totalForCc = $totMark+$ccForMarkup;
							
							}else {
								$totMark = '';
								$totalForCc = $ccForMarkup;
							}
                                                        
                                                        $totalForCcw = $ccForMarkup;
                                                        
                                                        number_format((float)$totalForCcw*$this->session->userdata('curr_values'), 2, '.', '');
							$totalCCw = $totalCCw+number_format((float)$totalForCcw, 2, '.', '');
							$totelw2 = $totalCCw;
							//$totalForCc = $totalForCc*$this->session->userdata('curr_values');
							echo number_format((float)$totalForCc*$this->session->userdata('curr_values'), 2, '.', '');
							$totalCC = $totalCC+number_format((float)$totalForCc, 2, '.', '');
							$totel2 = $totalCC;
                        ?></font></td>
                        <?php } $fd[2] = $fd[2] + $d; $counter1++; } ?>
                        <?php for($r=0;$r<($days - $d);$r++) {  $fd[2] = $fd[2]+1;?>
                        <td width="10%" align="center"><font class="home-text"><b>
                        <?php 
                        echo date("D", mktime(0,0,0,$fd[1], $fd[2], $fd[0])); ?></b></font></td>
                        <?php } ?>
                        <td width="8%" bgcolor="#ffffff" align="center"><font class=small1><font color="#966693"><b><?php echo number_format((float)$totel2*$this->session->userdata('curr_values'), 2, '.', ''); ?></b></font></font></td>
                        <td width="5%" align="center"><input type="checkbox" name="cc" id="cc_<?php echo $i.$j; ?>" value="cc--<?php echo $totel2*$this->session->userdata('curr_values'); ?>--<?php echo $totelw2*$this->session->userdata('curr_values'); ?>" /></td>
                    </tr>
                    <tr bgcolor="#DDDDDD">
                    	
                        <td valign="middle" align="left" rowspan="1" nowrap bgcolor="#ffffff"> <font class="home-text">Child Charge (Between the ages <?php echo $book_room_details[$j]->child_above_age; ?> to <?php echo $book_room_details[$j]->child_below_age; ?>)</font> </td>
                        <?php 
						 $counter1=0; $totalCAA=0; $totalCAAw=0;
						for($d=0;$d < $days;$d++)
                        { 
                           if($counter1 < $days ) { 
                        ?>
                        <td align="center" valign="middle" height="5" bgcolor="#ffffff"> <font color="#966693">
                        <?php  
                               $first_date = $room_alloc_date;
                               $fdate = $first_date; 
                               $fd = explode("-", $fdate); 		
                              $priceDate = date("Y-m-d", mktime(0,0,0,$fd[1], $fd[2] + $d, $fd[0]));
							 
							$s_adult = $book_room_details[$j]->adult;
							$s_child = $book_room_details[$j]->child;
							$hotel_id = explode('CRS',$book_room_details[$j]->hotel_code);
							$sup_rate_tactics_id = $book_room_details[$j]->sup_rate_tactics_id;
							$category_type = $book_room_details[$j]->category_type;
							$season_id = $book_room_details[$j]->season;
							$market_id = $book_room_details[$j]->market_id;
							
							$get_hotel_daily_rates = $this->B2b_Hotel_Model->get_hotel_daily_rates($s_adult, $s_child, $hotel_id[1], $priceDate,  $sup_rate_tactics_id, $category_type, $season_id, $market_id);

							$cagForMarkup = $get_hotel_daily_rates[0]->child_above_age_charge;
							
							$b2b_user_id =$this->session->userdata('agent_logged_in'); 
							$contry = $this->B2b_Hotel_Model->get_country($_SESSION['city']);
							$markup =  $this->B2b_Hotel_Model->get_markup_detail($contry,$hotel_id[1],$b2b_user_id);
							if(!empty($markup))
							{
								$forcent = ($markup /100);
								$totMark = $forcent*$cagForMarkup;
								$totalForCag = $totMark+$cagForMarkup;
							
							}else {
								$totMark = '';
								$totalForCag = $cagForMarkup;
							}
							$totalForCagw = $cagForMarkup;
                                                        
                                                        number_format((float)$totalForCagw*$this->session->userdata('curr_values'), 2, '.', '');
							$totalCAAw = $totalCAA+number_format((float)$totalForCagw, 2, '.', '');
							$totelw3 = $totalCAAw;
                                                        
							echo number_format((float)$totalForCag*$this->session->userdata('curr_values'), 2, '.', '');
							$totalCAA = $totalCAA+number_format((float)$totalForCag, 2, '.', '');
							$totel3 = $totalCAA;
							
                        ?></font></td>
                        <?php } $fd[2] = $fd[2] + $d; $counter1++; } ?>
                        <?php for($r=0;$r<($days - $d);$r++) {  $fd[2] = $fd[2]+1;?>
                        <td width="10%" align="center"><font class="home-text"><b>
                        <?php 
                        echo date("D", mktime(0,0,0,$fd[1], $fd[2], $fd[0])); ?></b></font></td>
                        <?php } ?>
                        <td width="8%" bgcolor="#ffffff" align="center"><font class=small1><font color="#966693"><b><?php echo number_format((float)$totel3*$this->session->userdata('curr_values'), 2, '.', ''); ?></b></font></font></td>
                        <td width="5%" align="center"><input type="checkbox" name="caa" id="caa_<?php echo $i.$j; ?>" value="caa--<?php echo $totel3*$this->session->userdata('curr_values'); ?>--<?php echo $totelw3*$this->session->userdata('curr_values'); ?>" /></td>
                    </tr>
                    <tr bgcolor="#DDDDDD">
                    	
                        <td valign="middle" align="left" rowspan="1" nowrap bgcolor="#ffffff"> <font class="home-text">Child Extra Bed</font> </td>
                        <?php 
						 $counter1=0; $totalCEB=0;$totalCEBWTM=0;
						for($d=0;$d < $days;$d++)
                        { 
                           if($counter1 < $days ) { 
                        ?>
                        <td align="center" valign="middle" height="5" bgcolor="#ffffff"> <font color="#966693">
                        <?php  
                               $first_date = $room_alloc_date;
                               $fdate = $first_date; 
                               $fd = explode("-", $fdate); 		
                               $priceDate = date("Y-m-d", mktime(0,0,0,$fd[1], $fd[2] + $d, $fd[0]));
							 
							$s_adult = $book_room_details[$j]->adult;
							$s_child = $book_room_details[$j]->child;
							$hotel_id = explode('CRS',$book_room_details[$j]->hotel_code);
							$sup_rate_tactics_id = $book_room_details[$j]->sup_rate_tactics_id;
							$category_type = $book_room_details[$j]->category_type;
							$season_id = $book_room_details[$j]->season;
							$market_id = $book_room_details[$j]->market_id;
							
							$get_hotel_daily_rates = $this->B2b_Hotel_Model->get_hotel_daily_rates($s_adult, $s_child, $hotel_id[1], $priceDate,  $sup_rate_tactics_id, $category_type, $season_id, $market_id);

							$cebgForMarkup = $get_hotel_daily_rates[0]->child_extra_bed_charge;
							
							$b2b_user_id =$this->session->userdata('agent_logged_in'); 
							$contry = $this->B2b_Hotel_Model->get_country($_SESSION['city']);
							$markup =  $this->B2b_Hotel_Model->get_markup_detail($contry,$hotel_id[1],$b2b_user_id);
							if(!empty($markup))
							{
								$forcent = ($markup /100);
								$totMark = $forcent*$cebgForMarkup;
								$totalForCebg = $totMark+$cebgForMarkup;
							
							}else {
								$totMark = '';
								$totalForCebg = $cebgForMarkup;
							}
                                                        
                                                         /* WITHOUT MARKUP */
							$totalForCebgw = $cebgForMarkup;
							
                                                        
                                                        number_format((float)$totalForCebgw*$this->session->userdata('curr_values'), 2, '.', '');
							$totalCEBWTM = $totalCEBWTM + number_format((float)$totalForCebgw, 2, '.', '');
							$totelw4 = $totalCEBWTM;
                                                        
                                                        /* WITHOUT MARKUP */
							
							echo number_format((float)$totalForCebg*$this->session->userdata('curr_values'), 2, '.', '');
							$totalCEB = $totalCEB + number_format((float)$totalForCebg, 2, '.', '');
							$totel4 = $totalCEB;
                        ?></font></td>
                        <?php } $fd[2] = $fd[2] + $d; $counter1++; } ?>
                        <?php for($r=0;$r<($days - $d);$r++) {  $fd[2] = $fd[2]+1;?>
                        <td width="10%" align="center"><font class="home-text"><b>
                        <?php 
                        echo date("D", mktime(0,0,0,$fd[1], $fd[2], $fd[0])); ?></b></font></td>
                        <?php } ?>
                        <td width="8%" bgcolor="#ffffff" align="center"><font class=small1><font color="#966693"><b><?php echo number_format((float)$totel4*$this->session->userdata('curr_values'), 2, '.', ''); ?></b></font></font></td>
                        <td width="5%" align="center"><input type="checkbox" name="ceb" id="ceb_<?php echo $i.$j; ?>" value="ceb--<?php echo $totel4*$this->session->userdata('curr_values'); ?>--<?php echo $totelw4*$this->session->userdata('curr_values'); ?>" /></td>
                    </tr>
                     <tr bgcolor="#DDDDDD">
                    	
                        <td valign="middle" align="left" rowspan="1" nowrap bgcolor="#ffffff"> <font class="home-text">Adult Meal Plan Breakfast</font> (for <?php echo $book_room_details[$j]->adult;?> adults) </td>
                        <?php 
						 $counter1=0; $totalAMPB=0; $totalAMPBWTM=0;
						for($d=0;$d < $days;$d++)
                        { 
                           if($counter1 < $days ) { 
                        ?>
                        <td align="center" valign="middle" height="5" bgcolor="#ffffff"> <font color="#966693">
                        <?php  
                               $first_date = $room_alloc_date;
                               $fdate = $first_date; 
                               $fd = explode("-", $fdate); 		
                              $priceDate = date("Y-m-d", mktime(0,0,0,$fd[1], $fd[2] + $d, $fd[0]));
							 
							$s_adult = $book_room_details[$j]->adult;
							$s_child = $book_room_details[$j]->child;
							$hotel_id = explode('CRS',$book_room_details[$j]->hotel_code);
							$sup_rate_tactics_id = $book_room_details[$j]->sup_rate_tactics_id;
							$category_type = $book_room_details[$j]->category_type;
							$season_id = $book_room_details[$j]->season;
							$market_id = $book_room_details[$j]->market_id;
							
							$get_hotel_daily_rates = $this->B2b_Hotel_Model->get_hotel_daily_rates($s_adult, $s_child, $hotel_id[1], $priceDate,  $sup_rate_tactics_id, $category_type, $season_id, $market_id);

							$ampbrForMarkup = $get_hotel_daily_rates[0]->adult_meal_plan_breakfast_rate;
                                                        $ampbrForMarkupWithoutMarkup = $get_hotel_daily_rates[0]->adult_meal_plan_breakfast_rate;
							
							$b2b_user_id =$this->session->userdata('agent_logged_in'); 
							$contry = $this->B2b_Hotel_Model->get_country($_SESSION['city']);
							$markup =  $this->B2b_Hotel_Model->get_markup_detail($contry,$hotel_id[1],$b2b_user_id);
							if(!empty($markup))
							{
								$forcent = ($markup /100);
								$totMark = $forcent*$ampbrForMarkup;
								$totalForampbr = $totMark+$ampbrForMarkup;
								$totalForampbr = $totalForampbr * $s_adult;
							}else {
								$totMark = '';
								$totalForampbr = $ampbrForMarkup;
								$totalForampbr = $totalForampbr * $s_adult;
							}
                                                        /* WITHOUT MARKUP */
							$totalForampbrw = $ampbrForMarkup;
							$totalForampbrw = $totalForampbrw * $s_adult;
                                                        
                                                        number_format((float)$totalForampbrw*$this->session->userdata('curr_values'), 2, '.', '');
							$totalAMPBWTM = $totalAMPBWTM + number_format((float)$totalForampbrw, 2, '.', '');
							$totelw5 = $totalAMPBWTM;
                                                        
                                                        /* WITHOUT MARKUP */
							echo number_format((float)$totalForampbr*$this->session->userdata('curr_values'), 2, '.', '');
							$totalAMPB = $totalAMPB + number_format((float)$totalForampbr, 2, '.', '');
							$totel5 = $totalAMPB;
                                                        
                                                        
                        ?></font></td>
                        <?php } $fd[2] = $fd[2] + $d; $counter1++; } ?>
                        <?php for($r=0;$r<($days - $d);$r++) {  $fd[2] = $fd[2]+1;?>
                        <td width="10%" align="center"><font class="home-text"><b>
                        <?php 
                        echo date("D", mktime(0,0,0,$fd[1], $fd[2], $fd[0])); ?></b></font></td>
                        <?php } ?>
                        <td width="8%" bgcolor="#ffffff" align="center"><font class=small1><font color="#966693"><b><?php echo number_format((float)$totel5*$this->session->userdata('curr_values'), 2, '.', ''); ?></b></font></font></td>
                        <td width="5%" align="center"><input type="checkbox" name="ampb" id="ampb_<?php echo $i.$j; ?>" value="ampb--<?php echo $totel5*$this->session->userdata('curr_values'); ?>--<?php echo $totelw5*$this->session->userdata('curr_values'); ?>" /></td>
                    </tr>
                     <tr bgcolor="#DDDDDD">
                    	
                        <td valign="middle" align="left" rowspan="1" nowrap bgcolor="#ffffff"> <font class="home-text">Adult Meal Plan Lunch</font> (for <?php echo $book_room_details[$j]->adult;?> adults)</td>
                        <?php 
						 $counter1=0; $totalAMPL=0;$totalAMPLw=0;
						for($d=0;$d < $days;$d++)
                        { 
                           if($counter1 < $days ) { 
                        ?>
                        <td align="center" valign="middle" height="5" bgcolor="#ffffff"> <font color="#966693">
                        <?php  
                               $first_date = $room_alloc_date;
                               $fdate = $first_date; 
                               $fd = explode("-", $fdate); 		
                              $priceDate = date("Y-m-d", mktime(0,0,0,$fd[1], $fd[2] + $d, $fd[0]));
							 
							$s_adult = $book_room_details[$j]->adult;
							$s_child = $book_room_details[$j]->child;
							$hotel_id = explode('CRS',$book_room_details[$j]->hotel_code);
							$sup_rate_tactics_id = $book_room_details[$j]->sup_rate_tactics_id;
							$category_type = $book_room_details[$j]->category_type;
							$season_id = $book_room_details[$j]->season;
							$market_id = $book_room_details[$j]->market_id;
							
							$get_hotel_daily_rates = $this->B2b_Hotel_Model->get_hotel_daily_rates($s_adult, $s_child, $hotel_id[1], $priceDate,  $sup_rate_tactics_id, $category_type, $season_id, $market_id);

							$amplrForMarkup = $get_hotel_daily_rates[0]->adult_meal_plan_lunch_rate;
							
							$b2b_user_id =$this->session->userdata('agent_logged_in'); 
							$contry = $this->B2b_Hotel_Model->get_country($_SESSION['city']);
							$markup =  $this->B2b_Hotel_Model->get_markup_detail($contry,$hotel_id[1],$b2b_user_id);
							if(!empty($markup))
							{
								$forcent = ($markup /100);
								$totMark = $forcent*$amplrForMarkup;
								$totalForamplr = $totMark+$amplrForMarkup;
								$totalForamplr = $totalForamplr * $s_adult;
							
							}else {
								$totMark = '';
								$totalForamplr = $amplrForMarkup;
								$totalForamplr = $totalForamplr * $s_adult;
							}
                                                        
                                                        $totalForamplrw = $amplrForMarkup;
							$totalForamplrw = $totalForamplrw * $s_adult;
							
                                                        number_format((float)$totalForamplrw*$this->session->userdata('curr_values'), 2, '.', '');
							$totalAMPLw = $totalAMPLw + number_format((float)$totalForamplrw, 2, '.', '');
							$totelw6 = $totalAMPLw;
                                                        
							echo number_format((float)$totalForamplr*$this->session->userdata('curr_values'), 2, '.', '');
							$totalAMPL = $totalAMPL + number_format((float)$totalForamplr, 2, '.', '');
							$totel6 = $totalAMPL;
                        ?></font></td>
                        <?php } $fd[2] = $fd[2] + $d; $counter1++; } ?>
                        <?php for($r=0;$r<($days - $d);$r++) {  $fd[2] = $fd[2]+1;?>
                        <td width="10%" align="center"><font class="home-text"><b>
                        <?php 
                        echo date("D", mktime(0,0,0,$fd[1], $fd[2], $fd[0])); ?></b></font></td>
                        <?php } ?>
                        <td width="8%" bgcolor="#ffffff" align="center"><font class=small1><font color="#966693"><b><?php echo number_format((float)$totel6*$this->session->userdata('curr_values'), 2, '.', ''); ?></b></font></font></td>
                        <td width="5%" align="center"><input type="checkbox" name="ampl" id="ampl_<?php echo $i.$j; ?>" value="ampl--<?php echo $totel6*$this->session->userdata('curr_values'); ?>--<?php echo $totelw6*$this->session->userdata('curr_values'); ?>" /></td>
                    </tr>
                     <tr bgcolor="#DDDDDD">
                    	
                        <td valign="middle" align="left" rowspan="1" nowrap bgcolor="#ffffff"> <font class="home-text">Adult Meal Plan Dinner</font> (for <?php echo $book_room_details[$j]->adult;?> adults)</td>
                        <?php 
						 $counter1=0; $totalAMPD=0;$totalAMPDw=0;
						for($d=0;$d < $days;$d++)
                        { 
                           if($counter1 < $days ) { 
                        ?>
                        <td align="center" valign="middle" height="5" bgcolor="#ffffff"> <font color="#966693">
                        <?php  
                               $first_date = $room_alloc_date;
                               $fdate = $first_date; 
                               $fd = explode("-", $fdate); 		
                               $priceDate = date("Y-m-d", mktime(0,0,0,$fd[1], $fd[2] + $d, $fd[0]));
							 
							$s_adult = $book_room_details[$j]->adult;
							$s_child = $book_room_details[$j]->child;
							$hotel_id = explode('CRS',$book_room_details[$j]->hotel_code);
							$sup_rate_tactics_id = $book_room_details[$j]->sup_rate_tactics_id;
							$category_type = $book_room_details[$j]->category_type;
							$season_id = $book_room_details[$j]->season;
							$market_id = $book_room_details[$j]->market_id;
							
							$get_hotel_daily_rates = $this->B2b_Hotel_Model->get_hotel_daily_rates($s_adult, $s_child, $hotel_id[1], $priceDate,  $sup_rate_tactics_id, $category_type, $season_id, $market_id);

							$ampdrForMarkup = $get_hotel_daily_rates[0]->adult_meal_plan_dinner_rate;
							
							$b2b_user_id =$this->session->userdata('agent_logged_in'); 
							$contry = $this->B2b_Hotel_Model->get_country($_SESSION['city']);
							$markup =  $this->B2b_Hotel_Model->get_markup_detail($contry,$hotel_id[1],$b2b_user_id);
							if(!empty($markup))
							{
								$forcent = ($markup /100);
								$totMark = $forcent*$ampdrForMarkup;
								$totalForampdr = $totMark+$ampdrForMarkup;
								$totalForampdr = $totalForampdr * $s_adult;
							
							}else {
								$totMark = '';
								$totalForampdr = $ampdrForMarkup;
								$totalForampdr = $totalForampdr * $s_adult;
							}
							$totalForampdrw = $ampdrForMarkup;
							$totalForampdrw = $totalForampdrw * $s_adult;
                                                                
                                                        number_format((float)$totalForampdrw*$this->session->userdata('curr_values'), 2, '.', '');
							$totalAMPDw = $totalAMPDw + number_format((float)$totalForampdrw, 2, '.', '');
							$totelw7 = $totalAMPDw;
                                                        
							echo number_format((float)$totalForampdr*$this->session->userdata('curr_values'), 2, '.', '');
							$totalAMPD = $totalAMPD + number_format((float)$totalForampdr, 2, '.', '');
							$totel7 = $totalAMPD;
                        ?></font></td>
                        <?php } $fd[2] = $fd[2] + $d; $counter1++; } ?>
                        <?php for($r=0;$r<($days - $d);$r++) {  $fd[2] = $fd[2]+1;?>
                        <td width="10%" align="center"><font class="home-text"><b>
                        <?php 
                        echo date("D", mktime(0,0,0,$fd[1], $fd[2], $fd[0])); ?></b></font></td>
                        <?php } ?>
                        <td width="8%" bgcolor="#ffffff" align="center"><font class=small1><font color="#966693"><b><?php echo number_format((float)$totel7*$this->session->userdata('curr_values'), 2, '.', ''); ?></b></font></font></td>
                        <td width="5%" align="center"><input type="checkbox" name="ampd" id="ampd_<?php echo $i.$j; ?>" value="ampd--<?php echo $totel7*$this->session->userdata('curr_values'); ?>--<?php echo $totelw7*$this->session->userdata('curr_values'); ?>" /></td>
                    </tr>
                     <tr bgcolor="#DDDDDD">
                    	
                        <td valign="middle" align="left" rowspan="1" nowrap bgcolor="#ffffff"> <font class="home-text">Child Meal Plan Breakfast</font> (for <?php echo $book_room_details[$j]->child;?> childs)</td>
                        <?php 
						 $counter1=0; $totalCMPB=0;$totalCMPBw=0;
						for($d=0;$d < $days;$d++)
                        { 
                           if($counter1 < $days ) { 
                        ?>
                        <td align="center" valign="middle" height="5" bgcolor="#ffffff"> <font color="#966693">
                        <?php  
                               $first_date = $room_alloc_date;
                               $fdate = $first_date; 
                               $fd = explode("-", $fdate); 		
                               $priceDate = date("Y-m-d", mktime(0,0,0,$fd[1], $fd[2] + $d, $fd[0]));
							 
							$s_adult = $book_room_details[$j]->adult;
							$s_child = $book_room_details[$j]->child;
							$hotel_id = explode('CRS',$book_room_details[$j]->hotel_code);
							$sup_rate_tactics_id = $book_room_details[$j]->sup_rate_tactics_id;
							$category_type = $book_room_details[$j]->category_type;
							$season_id = $book_room_details[$j]->season;
							$market_id = $book_room_details[$j]->market_id;
							
							$get_hotel_daily_rates = $this->B2b_Hotel_Model->get_hotel_daily_rates($s_adult, $s_child, $hotel_id[1], $priceDate,  $sup_rate_tactics_id, $category_type, $season_id, $market_id);

							$cmpbrForMarkup = $get_hotel_daily_rates[0]->child_meal_plan_breakfast_rate;
							
							$b2b_user_id =$this->session->userdata('agent_logged_in'); 
							$contry = $this->B2b_Hotel_Model->get_country($_SESSION['city']);
							$markup =  $this->B2b_Hotel_Model->get_markup_detail($contry,$hotel_id[1],$b2b_user_id);
							if(!empty($markup))
							{
								$forcent = ($markup /100);
								$totMark = $forcent*$cmpbrForMarkup;
								$totalForcmpbr = $totMark+$cmpbrForMarkup;
								$totalForcmpbr = $totalForcmpbr * $s_child;
							
							}else {
								$totMark = '';
								$totalForcmpbr = $cmpbrForMarkup;
								$totalForcmpbr = $totalForcmpbr * $s_child;
							}
							$totalForcmpbrw = $cmpbrForMarkup;
							$totalForcmpbrw = $totalForcmpbrw * $s_child;
                                                        
                                                        number_format((float)$totalForcmpbrw*$this->session->userdata('curr_values'), 2, '.', '');
							$totalCMPBw = $totalCMPBw + number_format((float)$totalForcmpbrw, 2, '.', '');
							$totelw8 = $totalCMPBw;
                                                        
							echo number_format((float)$totalForcmpbr*$this->session->userdata('curr_values'), 2, '.', '');
							$totalCMPB = $totalCMPB + number_format((float)$totalForcmpbr, 2, '.', '');
							$totel8 = $totalCMPB;
                        ?></font></td>
                        <?php } $fd[2] = $fd[2] + $d; $counter1++; } ?>
                        <?php for($r=0;$r<($days - $d);$r++) {  $fd[2] = $fd[2]+1;?>
                        <td width="10%" align="center"><font class="home-text"><b>
                        <?php 
                        echo date("D", mktime(0,0,0,$fd[1], $fd[2], $fd[0])); ?></b></font></td>
                        <?php } ?>
                        <td width="8%" bgcolor="#ffffff" align="center"><font class=small1><font color="#966693"><b><?php echo number_format((float)$totel8*$this->session->userdata('curr_values'), 2, '.', ''); ?></b></font></font></td>
                        <td width="5%" align="center"><input type="checkbox" name="cmpb" id="cmpb_<?php echo $i.$j; ?>" value="cmpb--<?php echo $totel8*$this->session->userdata('curr_values'); ?>--<?php echo $totelw8*$this->session->userdata('curr_values'); ?>" /></td>
                    </tr>
                     <tr bgcolor="#DDDDDD">
                        <td valign="middle" align="left" rowspan="1" nowrap bgcolor="#ffffff"> <font class="home-text">Child Meal Plan Lunch</font> (for <?php echo $book_room_details[$j]->child;?> childs)</td>
                        <?php 
						 $counter1=0; $tatalCMPL=0;$tatalCMPLw=0;
						for($d=0;$d < $days;$d++)
                        { 
                           if($counter1 < $days ) { 
                        ?>
                        <td align="center" valign="middle" height="5" bgcolor="#ffffff"> <font color="#966693">
                        <?php  
                               $first_date = $room_alloc_date;
                               $fdate = $first_date; 
                               $fd = explode("-", $fdate); 		
                               $priceDate = date("Y-m-d", mktime(0,0,0,$fd[1], $fd[2] + $d, $fd[0]));
							 
							$s_adult = $book_room_details[$j]->adult;
							$s_child = $book_room_details[$j]->child;
							$hotel_id = explode('CRS',$book_room_details[$j]->hotel_code);
							$sup_rate_tactics_id = $book_room_details[$j]->sup_rate_tactics_id;
							$category_type = $book_room_details[$j]->category_type;
							$season_id = $book_room_details[$j]->season;
							$market_id = $book_room_details[$j]->market_id;
							
							$get_hotel_daily_rates = $this->B2b_Hotel_Model->get_hotel_daily_rates($s_adult, $s_child, $hotel_id[1], $priceDate,  $sup_rate_tactics_id, $category_type, $season_id, $market_id);

							$cmplrForMarkup = $get_hotel_daily_rates[0]->child_meal_plan_lunch_rate;
							
							$b2b_user_id =$this->session->userdata('agent_logged_in'); 
							$contry = $this->B2b_Hotel_Model->get_country($_SESSION['city']);
							$markup =  $this->B2b_Hotel_Model->get_markup_detail($contry,$hotel_id[1],$b2b_user_id);
							if(!empty($markup))
							{
								$forcent = ($markup /100);
								$totMark = $forcent*$cmplrForMarkup;
								$totalForcmplr = $totMark+$cmplrForMarkup;
								$totalForcmplr = $totalForcmplr * $s_child;
							
							}else {
								$totMark = '';
								$totalForcmplr = $cmplrForMarkup;
								$totalForcmplr = $totalForcmplr * $s_child;
							}
							$totalForcmplrw = $cmplrForMarkup;
							$totalForcmplrw = $totalForcmplrw * $s_child;
                                                        
                                                        number_format((float)$totalForcmplrw*$this->session->userdata('curr_values'), 2, '.', '');
							$tatalCMPLw = $tatalCMPLw + number_format((float)$totalForcmplrw, 2, '.', '');
							$totelw9 = $tatalCMPLw;
                                                        
							echo number_format((float)$totalForcmplr*$this->session->userdata('curr_values'), 2, '.', '');
							$tatalCMPL = $tatalCMPL + number_format((float)$totalForcmplr, 2, '.', '');
							$totel9 = $tatalCMPL;
                        ?></font></td>
                        <?php } $fd[2] = $fd[2] + $d; $counter1++; } ?>
                        <?php for($r=0;$r<($days - $d);$r++) {  $fd[2] = $fd[2]+1;?>
                        <td width="10%" align="center"><font class="home-text"><b>
                        <?php 
                        echo date("D", mktime(0,0,0,$fd[1], $fd[2], $fd[0])); ?></b></font></td>
                        <?php } ?>
                        <td width="8%" bgcolor="#ffffff" align="center"><font class=small1><font color="#966693"><b><?php echo number_format((float)$totel9*$this->session->userdata('curr_values'), 2, '.', ''); ?></b></font></font></td>
                        <td width="5%" align="center"><input type="checkbox" name="cmpl" id="cmpl_<?php echo $i.$j; ?>" value="cmpl--<?php echo $totel9*$this->session->userdata('curr_values'); ?>--<?php echo $totelw9*$this->session->userdata('curr_values'); ?>" /></td>
                    </tr>
                    <tr bgcolor="#DDDDDD">
                    	
                        <td valign="middle" align="left" rowspan="1" nowrap bgcolor="#ffffff"> <font class="home-text">Child Meal Plan Dinner</font> (for <?php echo $book_room_details[$j]->child;?> childs) </td>
                        <?php 
						 $counter1=0; $totalCMPD=0;$totalCMPDw=0;
						for($d=0;$d < $days;$d++)
                        { 
                           if($counter1 < $days ) { 
                        ?>
                        <td align="center" valign="middle" height="5" bgcolor="#ffffff"> <font color="#966693">
                        <?php  
                               $first_date = $room_alloc_date;
                               $fdate = $first_date; 
                               $fd = explode("-", $fdate); 		
                               $priceDate = date("Y-m-d", mktime(0,0,0,$fd[1], $fd[2] + $d, $fd[0]));
							 
							$s_adult = $book_room_details[$j]->adult;
							$s_child = $book_room_details[$j]->child;
							$hotel_id = explode('CRS',$book_room_details[$j]->hotel_code);
							$sup_rate_tactics_id = $book_room_details[$j]->sup_rate_tactics_id;
							$category_type = $book_room_details[$j]->category_type;
							$season_id = $book_room_details[$j]->season;
							$market_id = $book_room_details[$j]->market_id;
							
							$get_hotel_daily_rates = $this->B2b_Hotel_Model->get_hotel_daily_rates($s_adult, $s_child, $hotel_id[1], $priceDate,  $sup_rate_tactics_id, $category_type, $season_id, $market_id);

							 $cmpdrForMarkup = $get_hotel_daily_rates[0]->child_meal_plan_dinner_rate;
							$totalForcmpdr = $cmpdrForMarkup;
								$totalForcmpdr = $totalForcmpdr * $s_child;


							$b2b_user_id =$this->session->userdata('agent_logged_in'); 
							$contry = $this->B2b_Hotel_Model->get_country($_SESSION['city']);
							$markup =  $this->B2b_Hotel_Model->get_markup_detail($contry,$hotel_id[1],$b2b_user_id);
							if(!empty($markup))
							{
								$forcent = ($markup /100);
								$totMark = $forcent*$cmpdrForMarkup;
								$totalForcmpdr = $totMark+$cmpdrForMarkup;
								$totalForcmpdr = $totalForcmpdr * $s_child;
							
							}else {
								$totMark = '';
								$totalForcmpdr = $cmpdrForMarkup;
								$totalForcmpdr = $totalForcmpdr * $s_child;
							}
							$totalForcmpdrw = $cmpdrForMarkup;
							$totalForcmpdrw = $totalForcmpdrw * $s_child;
                                                        
                                                        number_format((float)$totalForcmpdrw*$this->session->userdata('curr_values'), 2, '.', '');
							$totalCMPDw = $totalCMPDw + number_format((float)$totalForcmpdrw, 2, '.', '');
							$totelw10 = $totalCMPDw;
                                                        
							echo number_format((float)$totalForcmpdr*$this->session->userdata('curr_values'), 2, '.', '');
							$totalCMPD = $totalCMPD + number_format((float)$totalForcmpdr, 2, '.', '');
							$totel10 = $totalCMPD;

							//echo number_format((float)$totel10, 2, '.', '');
                        ?></font></td>
                        <?php } $fd[2] = $fd[2] + $d; $counter1++; } ?>
                        <?php for($r=0;$r<($days - $d);$r++) {  $fd[2] = $fd[2]+1;?>
                        <td width="10%" align="center"><font class="home-text"><b>
                        <?php 
                        echo date("D", mktime(0,0,0,$fd[1], $fd[2], $fd[0])); ?></b></font></td>
                        <?php } ?>
                        <td width="8%" bgcolor="#ffffff" align="center"><font class=small1><font color="#966693"><b><?php echo number_format((float)$totel10*$this->session->userdata('curr_values'), 2, '.', ''); ?></b></font></font></td>
                        <td width="5%" align="center"><input type="checkbox" name="cmpd" id="cmpd_<?php echo $i.$j; ?>" value="cmpd--<?php echo $totel10*$this->session->userdata('curr_values'); ?>--<?php echo $totelw10*$this->session->userdata('curr_values'); ?>" /></td>
                    </tr>
                    
          			<!--<tr bgcolor="#FFFFFF"  align="center" bordor=no height="25" style="font-size:13px;">
                       <td class="home-text"> <font class="home-text"><b> Status</b></font></td>
                       <td class="DHSOnRequest" colspan="9" style="color:#ff9900;"> <b>On Request</b></td>
                    </tr>-->
            </table>
            
            
            
            </td>
			</tr>

			<tr class='classic_room' width="700">
            <td align='left' valign='middle' colspan="5" style="line-height:22px;color:#966693;font-size:13px;">
           
			<?php //$hotel_room_cancel_policy = $this->B2b_Hotel_Model->get_hotel_room_cancel_policy($book_room_details[$j]->sup_rate_tactics_id);
				  $hotel_room_cancel_policy = $this->B2b_Hotel_Model->get_hotel_room_cancel_policy_new($book_room_details[$j]->sup_rate_tactics_id);
				  $hotel_minimum_stay = $this->B2b_Hotel_Model->get_hotel_minimum_stay($book_room_details[$j]->sup_rate_tactics_id, $_SESSION['sd']); 
           //echo "<pre/>";print_r($hotel_room_cancel_policy);exit;
            ?>
             <!--Start of Cancel Deadline--> 
            <?php if(isset($hotel_room_cancel_policy[0]->cancel_policy_from) && $hotel_room_cancel_policy[0]->cancel_policy_from!=''){					
					$deadline_date = date('Y-m-d', strtotime('-'.$hotel_room_cancel_policy[0]->cancel_policy_nights.' days', strtotime($s_date)));
					$cancel_policy_from = strtotime($deadline_date);
					$ss_date = strtotime($todays_date);
					if($cancel_policy_from <= $ss_date){ 
        $cancelPolicyPlan.='<div style="color:red;font-weight:normal;">WITH IN CANCELLATION DEADLINE</div>';  }}
            
             if(isset($book_room_details[$j]->remarks) && $book_room_details[$j]->remarks!= ''){ 
        $cancelPolicyPlan.=$book_room_details[$j]->remarks;
		$cancelPolicyPlan.='<br />';  }             
             if(isset($hotel_minimum_stay[0]->minimum_stay_nights) && $hotel_minimum_stay[0]->minimum_stay_nights!=''){ 
			 $minimum_stay_fromS = strtotime($hotel_minimum_stay[0]->minimum_stay_from);
			 $minimum_stay_toS = strtotime($hotel_minimum_stay[0]->minimum_stay_to);
			 $ss_date = strtotime($todays_date);
			 if($minimum_stay_fromS <= $ss_date && $ss_date <=$minimum_stay_toS){
		$cancelPolicyPlan.=' Minimum Stay Nights:'; $hotel_minimum_stay[0]->minimum_stay_nights;
		$cancelPolicyPlan.=' from'; $hotel_minimum_stay[0]->minimum_stay_from;
		$cancelPolicyPlan.='to'; $hotel_minimum_stay[0]->minimum_stay_to;
		$cancelPolicyPlan.='<br />'; } } 
             if(isset($book_room_details[$j]->cancel_policy_desc) && $book_room_details[$j]->cancel_policy_desc!= ''){ 		 				  		$cancelPolicyPlan.=$book_room_details[$j]->cancel_policy_desc; 
	    $cancelPolicyPlan.='<br />'; } 
            	for($hcp=0; $hcp< count($hotel_room_cancel_policy); $hcp++)
            	{
            		$cancel_date_start = date('Y-m-d', strtotime('-'.$hotel_room_cancel_policy[$hcp]->cancel_policy_nights.' days', strtotime($hotel_room_cancel_policy[$hcp]->cancel_policy_from)));
					
					if($hotel_room_cancel_policy[$hcp]->cancel_policy_charge!='')
					{	//echo "hi";
						 //$noOfNights = $hotel_room_cancel_policy[$hcp]->cancel_policy_nights;
						 
						 $noOfNights = $hotel_room_cancel_policy[$hcp]->cancel_policy_charge;
						// echo "  ";
						$dailyRatesArray=$cancelsAmt; 
						$dailyRatesArraywm=$cancelsAmtwm; 
						
						//print_r($dailyRatesArray);
						count($dailyRatesArray);
						$per_all_nights_cancel_rate=0;
						$per_all_nights_cancel_ratewm=0;
						//for($sA=0; $sA< $noOfNights; $sA++)
						for($sA=0; $sA< $noOfNights; $sA++)
						{	
							 $dailyRatesArray[$sA];echo "   ";
							 $per_all_nights_cancel_rate+= $dailyRatesArray[$sA];
							 $per_all_nights_cancel_ratewm+= $dailyRatesArraywm[$sA];
						} //echo $per_all_nights_cancel_rate;exit;
						$ggg[] = $per_all_nights_cancel_rate;
			  		}
            		else if($hotel_room_cancel_policy[$hcp]->cancel_policy_percent!='')
					{	//echo "welcome";
						//echo $hotel_room_cancel_policy[$hcp]->cancel_policy_percent;
						$cancel_rate = ($hotel_room_cancel_policy[$hcp]->cancel_policy_percent/100) * $grand_total_cost;
						$cancel_ratewm = ($hotel_room_cancel_policy[$hcp]->cancel_policy_percent/100) * $grand_total_costwm;		
						$dailyRatesArray=$cancelsAmt;  
						$dailyRatesArraywm=$cancelsAmtwm;  
						if($cancel_rate=='0')
						{
							$per_all_nights_cancel_rate = $cancel_rate;
							$per_all_nights_cancel_ratewm = $cancel_ratewm;
						}
						else if($cancel_rate<$dailyRatesArray[0])
						{
							$per_all_nights_cancel_rate = $dailyRatesArray[0];
							$per_all_nights_cancel_ratewm = $dailyRatesArraywm[0];
						} 
						else if($cancel_rate>=$dailyRatesArray[0]) 
						{
							$per_all_nights_cancel_rate = $cancel_rate;
							$per_all_nights_cancel_ratewm = $cancel_ratewm;
						} 
					}   //echo $cancel_rate.'cancelrate'; echo $dailyRatesArray[0].'dalyrates';
					$per_all_nights_cancel_rate=number_format((float)$per_all_nights_cancel_rate, 2, '.', '');
					$per_all_nights_cancel_ratewm=number_format((float)$per_all_nights_cancel_ratewm, 2, '.', '');
         $cancelPolicyPlan.="A charge of ".$this->session->userdata('currency_type'); 
		 $cancelPolicyPlan.=$per_all_nights_cancel_rate*$this->session->userdata('curr_values'); 
		 $cancelPolicyPlan.='will apply if Cancelled or Amended for ';
		 $cancelPolicyPlan.= $hotel_room_cancel_policy[$hcp]->cancel_policy_nights;
		 $cancelPolicyPlan.=' days prior to arrival.<br />';

		 $beCancelDate = date('Y-m-d', strtotime('-'.$hotel_room_cancel_policy[$hcp]->cancel_policy_nights.' days', strtotime($s_date)));
		 $beCancelDateCharge.= $beCancelDate.'___'.$per_all_nights_cancel_rate.'___'.$per_all_nights_cancel_ratewm.'//';
         } ?>
            <!--End of Cancellation Policy with rates-->
            <?php //print_r($ggg);
            $beCancelDateCharge = substr($beCancelDateCharge, 0, -2);
			$grandbeCancelDateCharges.=','.$beCancelDateCharge;
			$grandbeCancelDateCharge = substr($grandbeCancelDateCharges, 1);
			
            echo $cancelPolicyPlan;
			$grandCancelPolicyPlan.= '<div style="color:#227FB0; font-size:14px;margin-top:5px;">'.$book_room_details[$j]->room_type.'</div>'.$cancelPolicyPlan; 
			$cancelaion_till_date = $hotel_room_cancel_policy[0]->cancel_policy_to;
			$cancelaion_till_d = explode("-", $cancelaion_till_date); 
			$new_cancelaion_till_date = $cancelaion_till_d[2].'-'.$cancelaion_till_d[1].'-'.$cancelaion_till_d[0];

			$cancelaion_till_d1 = explode("-", $_SESSION['sd']); 
			$new_cancelaion_till_date1 = $cancelaion_till_d1[2].'-'.$cancelaion_till_d1[1].'-'.$cancelaion_till_d1[0];?>

			<?php echo $service->child_policy;?>
			<?php //echo "<pre/>";print_r($service);?>
            </td>
        </tr>

</table>
            </div>
            </td>
        </tr>
		<?php  $grand_total_cost=0; $org_costs=0; $markups=0; unset($cancelsAmt); unset($special_offer); unset($cancelPolicyPlan); unset($beCancelDateCharge); } } ?>
        </table>
         
        <table width="95%" border="0" cellspacing="1" cellpadding="5" style="font-size:12px; margin-left:20px; margin-bottom:5px;" >
        <tr class='' width="100">
            <td align='right' valign='middle' colspan="4" style="color:#227FB0; font-size:14px;">Reservation Total Cost</td>
            <input id="totalValues" name="totalValues" type="hidden" value="<?php echo $totalValue; ?>" />
            <td align="center" valign="middle" width="150" style="color:#966693; font-size:14px; font-weight:bold;height:32px;line-height:32px;" id="ttttotal"><span style="height:32px;line-height:32px;"><?php echo $this->session->userdata('currency_type');?> 
			<?php echo $totalValue = number_format((float)$totalValue, 2, '.', ''); ?> </span>
              </td
        </tr><tr><td><strong>Important Note:&nbsp;&nbsp;</strong><font color="red">Extra Bed are provided as per the room configuration of the hotel and subject to availability upon check in .</font></td></tr>
        </table>
        </form>
    </div>
    <?php $api_temp_hotel_ids = explode(',',$api_temp_hotel_id);
		  $result_id = implode("-", $api_temp_hotel_ids);
	?>
 
    <form name="book" action="<?php echo WEB_URL ?>b2b_hotel/pre_booking" method="post" onsubmit="javascript:return check_booking()">
    <input id="t" name="t" type="hidden" /> 
    <input id="tServices" name="tServices" type="hidden" />
    <input id="tServicesw" name="tServicesw" type="hidden" />
    <input type="hidden" name="result_id" value="<?php echo $result_id; ?>" />
    <input type="hidden" name="amount" id="amount" value="<?php echo $totalValue; ?>" />
    <input type="hidden" name="api" value="<?php echo $api; ?>" />
    <input type="hidden" name="xml_currency" value="<?php echo $xml_currency; ?>" />
    <input type="hidden" name="payment_charge" value="<?php echo $payment_charge; ?>" />
    <input type="hidden" name="org_amt" value="<?php echo $org_amt; ?>" />
    <input type="hidden" name="markup" value="<?php echo $markup; ?>" />
    <input type="hidden" name="currency_val" value="<?php echo $currency_val; ?>" />
    <!--<input type="hidden" name="cancel_policy" value="<?php echo $grandCancelPolicyPlan; ?>" />-->
    <textarea name="cancel_policy" style="display:none;"><?php echo $grandCancelPolicyPlan; ?></textarea>
    <textarea name="special_offer" style="display:none;"><?php echo $special_offer; ?></textarea><?php /* 8-oct-2014 replace for special offer $grandSpecial by $special_offer */ ?>
    <textarea name="booking_code" style="display:none;"><?php echo $grandBookCode; ?></textarea>
     <input type="hidden" name="bookStatusRequest" value="<?php echo $bookStatusRequest; ?>" />
      <input type="hidden" name="meal_plan" value="<?php echo $meal; ?>" />
    
    <input type="hidden" name="maintain_month_id" value="<?php echo $maintain_month_id; ?>" />
    <input type="hidden" name="room_code" value="<?php echo $room_code; ?>" />
    <input type="hidden" name="market_id" value="<?php echo $market_id; ?>" />
    <textarea name="room_type" style="display:none;"><?php echo $rr_type; ?></textarea><?php /* 8-oct-2014 replace $room_type by $r_type */ ?>
    <?php /* ?><input type="text" name="room_type" value="<?php //echo $rr_type; ?>" /><?php */ ?>
    <input type="hidden" name="cate_type" value="<?php echo $cate_type; ?>" />
    <input type="hidden" name="season" value="<?php echo $season; ?>" />
    <input type="hidden" name="hotId" value="<?php echo $service->hotel_id; ?>" />
      
    <table align="left" width="724" border="0" cellspacing="5" cellpadding="5" class="sum-txt">
    <input type="hidden" name="email" value="<?php echo $this->session->userdata('email_id'); ?>"> 
    <input type="hidden" name="cemail" value="<?php echo $this->session->userdata('email_id'); ?>">
    <input type="hidden" name="address" value="<?php echo $this->session->userdata('address'); ?>">
    <input type="hidden" name="city" value="<?php echo $this->session->userdata('city'); ?>">
    <input type="hidden" name="pin" value="<?php echo $this->session->userdata('postal_code'); ?>">
    <input type="hidden" name="country" value="<?php //echo $_SESSION['nationality']; ?>">
    <input type="hidden" name="mobile" value="<?php echo $this->session->userdata('mobile'); ?>">
    <input type="hidden" name="cancel_charge_n" value="<?php echo $grandbeCancelDateCharge; ?>">
<!--<input type="hidden" name="cancel_till_n" value="<?php echo $new_cancelaion_till_date; ?>">-->
    <input type="hidden" name="cancel_till_n" value="<?php echo $new_cancelaion_till_date1; ?>">
    
    <input type="hidden" name="agent_mode" value="<?php echo $agent_det->agent_mode; ?>">
<input type="hidden" name="room_daily_rate" value="<?php echo implode(',',$room_daily_rate);?>"/>
    </table>
      <?php
		
		  for($i=0;$i< count($room_info); $i++)
		  {
			  ?>
    <div id="r-box" style="height:40px">
    	<div class="mid-txt" style="margin:10px 5px 5px 15px; text-transform:uppercase;">ROOM NUMBER <?php echo $i+1; ?>: <?php echo $room_info[$i]->room_type; ?> ROOM FOR <?php echo $room_info[$i]->adult; ?> ADULT/S AND <?php echo $room_info[$i]->child;?> CHILD/S</div>
    </div>
     <?php
		  for($j=0;$j<  $room_info[$i]->adult; $j++)
		  {
			  ?>
      <table align="left" width="724" border="0" cellspacing="5" cellpadding="5" class="sum-txt" style="margin-top:15px; border:1px #227fb0 solid; border-radius:10px;">
      
      <tr>
        <td width="70">Title *</td>
        <td width="220">First Name</td>
         <td width="220">Last Name</td>
         <td >Max Persons</td>
      </tr>
      <tr>
        <td> <select name="sal[]" style="width:60px" class="r-txtbox">
                 <option value="Mr">Mr</option>
                 <option value="Mrs">Mrs</option>
              </select>
        </td>
        <td> <input type="text" name="fname[]" style="width:200px" class="r-txtbox"  /></td>
         <td><input style="width:200px" type="text" name="lname[]" class="r-txtbox"  /></td>
         <td ><?php echo $room_info[$i]->adult; ?> guests</td>
      </tr>
    </table>
     <?php
		  }
			  ?>
    <?php
		  }
		  ?>

		 <!-- special request -->

 <table align="left" width="724" border="0" cellspacing="5" cellpadding="5" class="sum-txt" style="margin-top:15px; border:1px #227fb0 solid; border-radius:10px;">
      
      <tr>
        <td width="100">Special Request (if any)</td>
        
            
        <td> <textarea height="50" width="100" name="request"></textarea></td>
        
        <td width="100">AGT voucher number:</td>
        <td><input style="width:200px" class="r-txtbox" type="text" name="agtvoucher" value="" id="agtvoucher" /></td>
      </tr>
    </table>
		 <!-- ends -->
   <div style="float:left; width:700px;margin-bottom: 10px;"> <input type="checkbox" name="terms" /> A agree <a href="http://travel-bay.com/index.php/b2b_hotel/terms" class="text3" target="light_box" onclick="$('#lightbox').show();" style="color:#06C;">Terms and Conditions</a> of agency. </div>
    <?php
		//$net_price = $cost-$markup;totalValue
		$net_price = $totalValue;
		
		$agent_det = $this->B2b_Model->agentInfo($this->session->userdata('agent_id'));
		
		//echo $agent_det->agent_mode;
	
		if($agent_det->agent_mode == '1' || $agent_det->agent_mode == '3' || $agent_det->agent_mode == '4')
		{ ?>
			<div class="lessCurrentBalance"></div>
			<?php if ($balance_credit < $net_price) { ?>
                <br />
                <br />
                <font color="#FF0000" style="font-size:14px; padding:10px"><strong>You do not have sufficient balance in your account to do this booking!</strong></font><br />
                <a href="<?php echo WEB_URL; ?>b2b/agent_page/"><img src="<?php echo WEB_DIR; ?>images/contiu-but.png" width="100" height="35" /></a>
			<?php 
			} 
  		    else
		    { ?>
                 <div style="float:left; margin-top:10px;" class="moreCurrentBalance"><input type="image" src="<?php echo WEB_DIR; ?>images/contiu-but.png" width="100" height="35" /></div>
           <?php }
		}
		elseif($agent_det->agent_mode == '2')
		{
			$cin = $_SESSION['sd'];
			$datacin = explode("-",$cin);
			$cindata = $datacin[2].'-'.$datacin[1].'-'.$datacin[0];
			//	   echo $cindata;exit;
			$diff = strtotime($cindata) - strtotime(date('Y-m-d'));

			$sec   = $diff % 60;
			$diff  = intval($diff / 60);
			$min   = $diff % 60;
			$diff  = intval($diff / 60);
			$hours = $diff % 24;
			$days  = intval($diff / 24);
			
			if($days > 7)
			{
           ?>
            	<div style="float:left; margin-top:10px;"><input type="image" src="<?php echo WEB_DIR; ?>images/contiu-but.png" width="100" height="35"/></div>
           <?php
			}
			else
			{
			?>
            <div color="#FF0000" style="font-size:14px;margin:10px;">
            <strong style="color:#FF0000;">You are not able to do the booking. Please Change CheckIn date.</strong>
            </div >
            <a href="<?php echo WEB_URL; ?>b2b/agent_page/" ><img src="<?php echo WEB_DIR; ?>images/contiu-but.png" width="100" height="35" /></a>
           <?php 
			}
		}
		else
		{
			?>
			<br />
			<br />
			<font color="#FF0000" style="font-size:14px; padding:10px"><strong>You are not able to do the booking. Please contact to admin</strong></font><br />
			<img src="<?php echo WEB_DIR; ?>images/contiu-but.png" width="100" height="35" />
			<?php 
		}
		?>
    
</form>
  </div>
  </div>
</div></div></div>
<div style="clear:both"></div> 
<?php $this->load->view('b2b/footer'); ?>
</body>
</html>
<!--
<script type="text/javascript" src="<?php echo WEB_DIR; ?>script/master.js"></script>
-->
<script>
function check_booking()
{
	var fname = document.getElementsByName('fname[]');
	for (var i = 0; i < fname.length; i++)
	{
		if (fname[i].value=='')
		{
			alert("Please enter First Name.");
			return false;
		}
	} 
	 var lname = document.getElementsByName('lname[]');
	 for (var i = 0; i < lname.length; i++)
	{
		if (lname[i].value=='')
		{
			alert("Please enter Last Name.");
			return false;
		}
	}
	var agtvoucher = document.getElementById('agtvoucher');
		if (agtvoucher.value=='')
		{
			alert("Please enter agent voucher number.");
			return false;
		}

	 if(!document.book.terms.checked)
	 {
		 alert("please accept terms & condition");
		 return false;
	 }
	return confirm('Are You Sure, You want to confirm this booking?');
}

function updateTextArea() {
	var allVals = [];
	var allValsS = [];
        var allValsSw = [];
	$('.btnadd :checked').each(function() {
		var arr = $(this).val().toString().split("--"); 
		allVals.push(arr[1]);
		allValsS.push(arr[0]+'--'+arr[1]);
                allValsSw.push(arr[2]);
	});
	
	$('.btnadd :not:checked').each(function() {
	});
	$('#t').val(allVals)
	$('#tServices').val(allValsS)
        $('#tServicesw').val(allValsSw)
	
	var rates = allVals.toString().split(","); 
	var count = rates.length;
	var totalAmt = 0.00; 
	for(var i=0; i<count; i++)
	{
		totalAmt = parseFloat(totalAmt) + parseFloat(rates[i]);
		totalAmt = parseFloat(totalAmt).toFixed(2);
	}
	callTotal(totalAmt);
}
$(function() {
	$('.btnadd input').live("click", function(){  updateTextArea();  });   
});

function callTotal(totalAmt)
{
	$('#ttttotal').html('<img src="<?php echo WEB_DIR; ?>images/ajax-loader.gif">');
	setTimeout(function() {
		var totalAmount = 0.00;
		var amount = $('#totalValues').val();	 
		totalAmount = parseFloat(totalAmt) + parseFloat(amount)
		totalAmount = parseFloat(totalAmount).toFixed(2); //alert(totalAmount);
		if(totalAmount != 'NaN'){
		var curr = '<?php echo $this->session->userdata("currency_type");?>';
			$('#amount').val(totalAmount);	
			$('#ttttotal').html('<span style="height:32px;line-height:32px;">'+ curr+' '+totalAmount+'</span>');
			var balance_credit = '<?php echo $balance_credit; ?>';
			balance_credit = Math.abs(balance_credit);
			totalAmount = Math.abs(totalAmount);
			if(balance_credit < totalAmount)
			{ 
				$('.moreCurrentBalance').hide();
				$('.lessCurrentBalance').html(' <br />  <br />  <font color="#FF0000" style="font-size:14px; padding:10px"><strong>You do not have sufficient balance in your account to do this booking!</strong></font><br /> <a href="<?php echo WEB_URL; ?>b2b/agent_page/"><img src="<?php echo WEB_DIR; ?>images/contiu-but.png" width="100" height="35" /></a>'); 
				alert('You do not have sufficient balance in your account to do this booking!');
			}
			if(balance_credit >= totalAmount)
			{
				$('.moreCurrentBalance').hide();
				$('.lessCurrentBalance').html('<div style="float:left; margin-top:10px;" class="moreCurrentBalance"><input type="image" src="<?php echo WEB_DIR; ?>images/contiu-but.png" width="100" height="35" /></div>'); 
			}
		}
		else{
		$('#amount').val(amount);	 
		$('#ttttotal').html('<span style="height:32px;line-height:32px;"><?php echo $this->session->userdata("currency_type");?>'+amount+'</span>');
		}
	}, 1000);
}

function showDailyRates(id){
	$('#DailyRates_'+id).toggle('slow');
	$('#showDailyRates_'+id).html('Daily Rates');
}
</script> 
