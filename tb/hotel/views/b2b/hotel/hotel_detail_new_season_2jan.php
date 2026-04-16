<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Travel Bay</title>
<link href="<?php echo WEB_DIR; ?>css/style_sheet.css" rel="stylesheet" type="text/css" />
<link href="<?php echo WEB_DIR; ?>css/postion.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="<?php echo WEB_DIR; ?>gui/slider/scripts/jquery-1.7.2.min.js"></script>	
<script language="javascript" type="text/javascript">
function validate() {
    var r = document.getElementById("room");
    alert(r);
    var c = 0

    for(var i=0; i < r.length; i++){
       if(c[i].checked) {
          c = i; }
    }

    alert("please select radio");
    $("#submit").hide();
}	
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
<?php $this->load->view('b2b/header'); ?>
<div class="midlebody">
  <div class="lhsside">
  <div class="serachbar" style="height: auto;">
  
  	<div class="mid-txt" style="color:#fff; padding-top:10px; margin-top:10px; text-align:right">
    <span style="font-size:30px;">You</span> are searching</div>
 		<div class="left-topbox" style="width:210px">
<?php $s_adult=0; $s_child=0;
for($i=0; $i<$_SESSION['room_count']; $i++) 
{ 
	$s_adult= $s_adult + $_SESSION['org_adult'][$i];
	$s_child= $s_child + $_SESSION['org_child'][$i];
}
?>
        	<div><img src="<?php echo WEB_DIR; ?>images/bang-icon.jpg" border="0" style="position:relative; top:4px; padding-right:6px;" /><?php echo $_SESSION['city']; ?></div>
            <div><img src="<?php echo WEB_DIR; ?>images/bang-icon1.jpg" border="0" style="position:relative; top:4px; padding-right:6px;" /><?php echo $_SESSION['sd']; ?> to <?php echo $_SESSION['ed']; ?></div>
            <div><img src="<?php echo WEB_DIR; ?>images/bang-icon2.jpg" border="0" style="position:relative; top:4px; padding-right:6px;" /><?php echo $_SESSION['adult_count']=$s_adult; //$_SESSION['adult_count']; ?> Adults <?php echo $_SESSION['child_count']=$s_child; //$_SESSION['child_count']; ?> Childs</div>
            <div><img src="<?php echo WEB_DIR; ?>images/bang-icon3.jpg" border="0" style="position:relative; top:4px; padding-right:6px;" /><?php echo $_SESSION['room_count']; ?> Room</div>
            
            
            <div style="float:right">
			<!--<a href="<?php echo WEB_URL.'b2b/agent_page'; ?>">
            <img src="<?php echo WEB_DIR; ?>images/modify-sbut.png" border="0" style="position:relative; top:30px;" /></a>-->
			<a onclick="callModifyForm();"><img src="<?php echo WEB_DIR; ?>images/modify-sbut.png" border="0" style="position:relative; top:10px; cursor:pointer;"/></a>
            </div>
        </div>

<div style="clear:both; padding-top:20px;"></div>

<form name="search_result" action="<?php echo WEB_URL; ?>b2b_hotel/search"  onsubmit="javascript:return form_sub();" method="post" id="mofifyForm" style="display:block;">
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
<!--
   <link href="<?php echo WEB_DIR; ?>css/master.css" rel="stylesheet" type="text/css">
    <link href="<?php echo WEB_DIR; ?>css/master1.css" rel="stylesheet" type="text/css">
-->
     <script type="text/javascript">
//<![CDATA[
if (typeof (HC) == 'undefined') {var HC = {}}; HC.query = ''; HC.path = '';
//]]>
</script>
<!--
    <script type="text/javascript" src="<?php echo WEB_DIR; ?>script/master.js"></script>
-->
    

 
   <!--<div style="float:left; margin-top:10px;">
   <img src="<?php echo WEB_DIR; ?>images/last-view-img.jpg" width="229" height="63" />
   </div>-->
  	<!--<div class="left-secbox">
  		<div class="hc_m_v14" id="hc_usrHtlHistory">
                   <div class="hc_m_outer">		<div class="hc_m_content">
                        
                            <div id="hc_viewedHotels" class="hc_m_v11">
                                <b class="b1h"></b><b class="b2h"></b><b class="b3h"></b><b class="b4h"></b><div class="hc_m_outer">		<div class="hc_m_content">
                                    
<script type="text/javascript">HC.Translations.set("ShowAll", "Show all"); HC.Translations.set("DeleteAll", "Delete all"); HC.Translations.set("ShowTopNumber", "Show top 5");</script>
     <?php
	
	   if(isset($_SESSION['fav_hotel_detail']))
		{
			 $arra_u = array_unique($_SESSION['fav_hotel_detail']);
			// print_r($arra_u);
			 //echo count($arra_u);exit;
	for($i=0;$i< count($arra_u); $i++)
	{
	if($arra_u[$i] != 'images')
	{
		
		$res_idd = explode(",",$arra_u[$i]);
			$detailss=$this->B2b_Hotel_Model->get_searchresult($res_idd[0]);
		
		$hotel_id = $detailss->hotel_code;
		$image_hotelspro=$detailss->image;
		?>
    <div id="<?php echo $i; ?>" class="hc_i_wrapper">
     
             <a class="hotel_link_new" href="<?php echo WEB_URL.'b2b_hotel/hotel_detail/'.$res_idd[0]; ?>"><?php echo $detailss->hotel_name; ?></a>
              
           <br />
        <div class="hc_i">
           
            <a href="" class="hc_i_photo ">
               <?php
              if($api=='hotelsbed')
									  {
										  ?>
               <img src="<?php echo 'http://www.hotelbeds.com/giata/'.$image_hotelspro; ?>" alt="">
               
                                      <?php
									  }
									  else
		 {
			 ?>
               <img width="80" height="80" src="<?php echo 'http://www.hotelbeds.com/giata/'.$image_hotelspro; ?>" alt=""> 
                <?php
		 }
		 ?>
            </a>
            <a href="javascript:void(0);" onclick='HC.ViewedHotels.remove("1186706");' class="hc_i_remove" title="Delete hotel"></a>
            <dl>
                
                <dd class="hc_i_booking"><span>  
                <?php
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
											   ?>   </span></dd>
                
            </dl>
            <div class="cDiv"></div>
        </div>    
    </div>
    
    
    
    
    
    <?php } }
		}?>
    
    
    
   
    
      
    
    
    
                                      
<?php /*?><a style="display: none;" href="javascript:void(0);" onclick="HC.ViewedHotels.toggleAll()" class="hc_f_btn_showAll">Show all<span></span></a><?php */?>
<a href="javascript:void(0);" onclick="HC.ViewedHotels.removeAll()" class="hc_f_btn_deleteAll">Delete all<span></span></a>
<div class="cDivRight"></div>
<script type="text/javascript">
//<![CDATA[
HC.ViewedHotels.init(5, $('#hc_viewedHotels'), {liClass: 'hc_i_photos_', ulClass: 'hc_i_photos'});
//]]>
</script>

                                	</div>	<div class="hc_m_ft"></div></div><b class="b4bh"></b><b class="b3bh"></b><b class="b2bh"></b><b class="b1h"></b>
                            </div>
                            
                            
                            	</div>	<div class="hc_m_ft"></div></div><b class="b4bh"></b><b class="b3bh"></b><b class="b2bh"></b><b class="b1h"></b>
                </div>
                
                
  	</div>-->
    
    
     </div>
    <div class="mainbody">
   <div>
    <div class="hotelnames" style="min-height:auto;border: 1px solid #BEE7FF;">
    
   		<!--<div class="right-hotel-name">Youngor Central Suzhou</div>-->
        <table width="100%" border="0" cellspacing="7" cellpadding="3" class="r-hoteldeta" style="">
          <tr>
          	<td colspan="2" class="right-hotel-name"><?php echo $service->hotel_name; ?><br />
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
											   ?>  
			</td>
          </tr>
          <tr>
          	<td><?php echo $service->address."., ".$service->city; ?><br />
Tel: <?php echo $service->phone; ?> Fax: <?php echo $service->fax; ?></td>
          </tr>
       
          <tr>
          	<td><p style="font-size:13px;"><?php echo $service->description; ?></p></td>
          </tr>	
          <?php /*?><tr>
          	<td style="color:#fb5a05">View on the map</td>
          </tr><?php */?>
                 
          <!--<tr>
            <td><table width="" border="0" cellspacing="3" cellpadding="3">
            <tr>
            <td><img width="60" src="<?php echo $img_array; ?>" border="0" /></td>
            <?php  echo $img_array;
            if($img_array!='')
            {
             for($q=0;$q<count($img_array);$q++)
            { 
            ?>
             <td><img width="60" src="<?php echo $img_array[$q]; ?>" border="0" /></td>
            <?php
            }
            }
            ?>
            </tr>-->
            </table>
            </td>
          </tr>
        </table>
      </div>  
      
      
<form name="hotelDetails" method="post" action="<?php echo WEB_URL.'b2b_hotel/pre_booking/'?>" >   
        
<?php
  //$hotel_season_prices = $this->B2b_Hotel_Model->get_hotel_season_prices($s_adult, $s_child,$hotel_code,$sec_res,$s_date,$e_date,$hotel_category_types[$c]->category_type);
//echo "<pre/>";print_r($services);exit;

//echo $_SESSION['room_count']; 
 $hotel_code = $service->hotel_code;?>
<?php for($i=0; $i<$_SESSION['room_count']; $i++) 
{ 
	$room_no = $i+1;
	$s_adult = $_SESSION['org_adult'][$i];
	$s_child = $_SESSION['org_child'][$i];
	$s_date = $_SESSION['sd'];
	$e_date = $_SESSION['ed'];
	$sec_res =$_SESSION['ses_id'];
	$hotel_category_types = $this->B2b_Hotel_Model->get_hotel_category_types($s_adult,$s_child,$hotel_code,$sec_res,$s_date,$e_date);


?>  

<table width="100%" border="0" cellspacing="10" cellpadding="0" class="hotelnames" style="margin-bottom:3px;border: 1px solid #BEE7FF;">
    <tr>
        <td width="100%" align="left" style="font-size:15px;;" colspan="2" class="right-hotel-name"><?php echo 'ROOM NUMBER '.$room_no; ?>: <?php echo $s_adult; ?>ADULT/S AND <?php echo $s_child; ?> CHILD/S
        </td>
    </tr>
    <?php

     for($c=0;$c < count($hotel_category_types);$c++) {  
	$hotel_season_prices = $this->B2b_Hotel_Model->get_hotel_season_prices($s_adult, $s_child,$hotel_code,$sec_res,$s_date,$e_date,$hotel_category_types[$c]->category_type);
//echo "<pre/>";print_r($hotel_season_prices);
?>
    
    <!--<tr>
        <td width="100%" align="left" style="font-size:14px; color:#227FB0; font-weight:bold;" colspan="2"><?php echo strtoupper($hotel_category_types[$c]->room_type);?> ROOM</td>
    </tr>-->
    <tr>
    <td align="left" valign="top" width="700">
    	<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#dee5eb" style="font-size:12px;" >
        <!--<tr class="classic_room">
            <td align="center" valign="middle" class="classic_room_div" width="170" height="25" style="font-family:Arial, Helvetica, sans-serif; font-size:14px;color:#227FB0;">Season</td>
            <td align="center" valign="middle" class="classic_room_div" width="170" style="font-family:Arial, Helvetica, sans-serif; font-size:14px;color:#227FB0;">Market</td>
            <td align="center" valign="middle" class="classic_room_div" width="170" style="font-family:Arial, Helvetica, sans-serif; font-size:14px;color:#227FB0;">Room Cost</td>
            <td align="center" valign="middle" class="classic_room_div" width="170" style="font-family:Arial, Helvetica, sans-serif; font-size:14px;color:#227FB0;">Select</td>
        </tr>-->
        <?php //for($sp=0;$sp < count($hotel_season_prices);$sp++) {
			$pay_count = 0;
			$stay_count = 0;
			$freedayss_v1=0;
			$checkfornight ='ok';
			for($sp=0;$sp < 1;$sp++) { 
				//echo $_SESSION['sd'];
				?>
        <tr class='classic_room'>
            <td align='center' valign='middle' width="170" colspan="4">
            <div style="border:1px solid #CCC; margin-top:5px;">
            <table border="0" cellpadding="4" cellspacing="0" width="100%">
            
            <tr class='classic_room' width="700" id="DailyRates_<?php echo $c.$sp.$i;?>" style="display:none">
            <td align='left' valign='middle' colspan="4" style="line-height:35px;font-size:13px;">
				<?php 
				//echo "watsuppppp".$_SESSION['sd'];exit;
					$start_date = explode('-',$_SESSION['sd']);
					$end_date = explode('-',$_SESSION['ed']);
					
		$room_alloc_date = $start_date[2].'-'.$start_date[1].'-'.$start_date[0];
			$room_vecate_date = $end_date[2].'-'.$end_date[1].'-'.$end_date[0];
				$start = strtotime($room_alloc_date);
					$end = strtotime($room_vecate_date);
					$days = $end - $start;
					$days1 = $end - $start;
					 $days = ceil($days/86400);	
					$hotel_id = explode('CRS',$hotel_code);
					
					$get_hotel_promotion_stay_pay = $this->B2b_Hotel_Model->get_hotel_promotion_stay_pay($days1,$days,$room_alloc_date, $room_vecate_date, $hotel_id[1], $hotel_category_types[$c]->sup_rate_tactics_id); 
					//echo "hjhfehdfjherjhgjer";
					//echo "<pre/>";print_r($get_hotel_promotion_stay_pay);

					if(!empty($get_hotel_promotion_stay_pay)){
						$pay_nights = $get_hotel_promotion_stay_pay[0]->pay_nights;
					$stay_nights = $get_hotel_promotion_stay_pay[0]->stay_nights;
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
					$valid = '';
					$grand_total_cost;
					$markups;
					$org_costs; 	
					for($d=0;$d < $days;$d++)
					{ 
						$a=0;
						if($counter < $days ) {  
						//echo "hellooooooooooooooo";exit;
                		?>
            	<div style='color:#178AA0; border-bottom:1px solid #A3B6C8;height: 35px;line-height: 15px;'>
                <?php  
					$first_date = $room_alloc_date;
					$fdate = $first_date; 
					$fd = explode("-", $fdate); 		
					$priceDate = date("Y-m-d", mktime(0,0,0,$fd[1], $fd[2] + $d, $fd[0]));
					//=================================
					$first_date1 = $room_vecate_date;
					$fdate1 = $first_date1; 
					$fd1 = explode("-", $fdate1); 	
					//$priceDate1=$fd1;	
					$priceDate1 = date("Y-m-d", mktime(0,0,0,$fd1[1], $fd1[2] , $fd1[0]));
					//==================================
					$daily_Date = date("l M, d Y", mktime(0,0,0,$fd[1], $fd[2] + $d, $fd[0])); ?>
                    <span style="width:250px;"><?php echo $daily_Date; ?></span>
					<?php $hotel_id = explode('CRS',$hotel_code); 
					$sup_rate_tactics_id = $hotel_category_types[$c]->sup_rate_tactics_id;
					//$category_type = $hotel_season_prices[$sp]->category_type;
					$category_type = $hotel_category_types[$c]->category_type;
					$room_type = $hotel_season_prices[$sp]->room_type; 
					 $season_id = $hotel_season_prices[$sp]->season;
					$market_id = $hotel_season_prices[$sp]->market_id;
					//echo "hiiiiiii";print_r($hotel_season_prices);
					 $get_hotel_daily_rates = $this->B2b_Hotel_Model->get_hotel_daily_rates($s_adult, $s_child, $hotel_id[1], $priceDate,  $sup_rate_tactics_id, $category_type, $season_id, $market_id);
					 //echo "hiiiiii";
					 //echo "<pre/>";print_r($get_hotel_daily_rates);exit;
					 $nnnn=count($hotel_season_prices);
					 $count=0;
					 $cxcxcx=0;
					//=====================================================
					 	for($ith=0;$ith<count($hotel_season_prices);$ith++){

					 		$se_id[$cxcxcx]=$hotel_season_prices[$ith]->season;
					 		$cxcxcx++;

					 	}
					 	//print_r($se_id);echo "hiiiii";
					 	$sesion_im=implode("-",$se_id);
					 	$get_hotel_daily_allotment= $this->B2b_Hotel_Model->get_hotel_daily_allotment($hotel_id[1], $priceDate, $priceDate1,$room_type, $sesion_im);
					 	//print_r($get_hotel_daily_allotment);
					 //================================================
					
		
				if($get_hotel_daily_rates[0]->meal_plan=='0')
				{
					echo '<br> Including meals: Half Board'; if($get_hotel_daily_rates[0]->breakfast_type!='') echo ' - '.$get_hotel_daily_rates[0]->breakfast_type;
				}
				else if($get_hotel_daily_rates[0]->meal_plan=='1')
				{
					echo '<br> Including meals: Full Board'; if($get_hotel_daily_rates[0]->breakfast_type!='') echo ' - '.$get_hotel_daily_rates[0]->breakfast_type;
				}
				else if($get_hotel_daily_rates[0]->meal_plan=='2')
				{
					echo '<br> Room Only'; if($get_hotel_daily_rates[0]->breakfast_type!='') echo ' - '.$get_hotel_daily_rates[0]->breakfast_type;
				}
				else if($get_hotel_daily_rates[0]->meal_plan=='3')
				{
					echo '<br> Including meals: All Inclusive'; if($get_hotel_daily_rates[0]->breakfast_type!='') echo ' - '.$get_hotel_daily_rates[0]->breakfast_type;
				}
				else if($get_hotel_daily_rates[0]->meal_plan=='4')
				{
					echo '<br> Including meals: Breakfast'; if($get_hotel_daily_rates[0]->breakfast_type!='') echo ' - '.$get_hotel_daily_rates[0]->breakfast_type;
				}
				else{
					echo '<br> Room Only';
				}
				
				?> 
                <div style="float:right;margin-right:215px;height:40px;line-height:15px;margin-top: -10px;">
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


					//$amountv1 = $roomPlusSupplementCharge=$get_hotel_daily_rates[0]->rate + $get_hotel_daily_rates[0]->supplementary_charge_rate;

					$splChar = $get_hotel_daily_rates[0]->supplementary_charge_rate + $c_child_above_age_charge + $c_sec_child_charge;
					
					$amountv1 = $roomPlusSupplementCharge=$get_hotel_daily_rates[0]->rate + $splChar;
					
					
					$b2b_user_id =$this->session->userdata('agent_logged_in'); 
					$contry = $this->B2b_Hotel_Model->get_country($_SESSION['city']);
					$markup =  $this->B2b_Hotel_Model->get_markup_detail($contry,$hotel_id[1],$b2b_user_id);
					$pay_charge = $this->B2b_Hotel_Model->get_payment_charge();
					//echo $markup;
					if(!empty($markup))
					{
						$amountv2 = ($markup /100);
						$amountv3 = $amountv2*$amountv1;
						$splCharMark = $amountv2*$splChar;
						
						 $total_cost = $amountv3+$amountv1;//echo "withmarkup";
						$splCharCost = $splCharMark+$splChar;
					
					}else {
						$amountv3 = '';
						$splCharMark = '';
						$total_cost = $amountv1;
						$splCharCost = $splChar;
					}
					$agent_det = $this->B2b_Model->agentInfo($this->session->userdata('agent_id'));
					$agent_mode = $agent_det->agent_mode; 
					
					$amountv3pay = 0;
					$splCharCostPay = 0;
					if(!empty($agent_mode) && $agent_mode == '4'){
					$amountv2pay = ($pay_charge /100);
					$amountv3pay = $amountv2pay*$total_cost;

					$splCharCostPay = $amountv2pay*$splCharCost;
					
					}
					$total_cost = $total_cost + $amountv3pay;

					$splCharCost = $splCharCost + $splCharCostPay;
								
					
				 $get_hotel_early_bird_rates = $this->B2b_Hotel_Model->get_hotel_early_bird_rates($room_alloc_date, $room_vecate_date, $hotel_id[1], $room_type, $season_id);
				
					$discount;
					if(isset($get_hotel_early_bird_rates[0]->discount) && $get_hotel_early_bird_rates[0]->discount!= '')
					{  
						 $discount = $get_hotel_early_bird_rates[0]->discount;
						$discount_amt = ($discount /100) * $total_cost ;
						 $total_cost = $total_cost - $discount_amt;
						
					}
					else if(isset($get_hotel_early_bird_rates[0]->amount) && $get_hotel_early_bird_rates[0]->amount!= '')
					{	//echo "hello";
						$discount_amt = $get_hotel_early_bird_rates[0]->amount;
						$total_cost = $total_cost - $discount_amt;
					}
					else
					{	//echo "welcome";
						//$discount = $get_hotel_early_bird_rates[0]->amount;
						//$total_cost = $total_cost - $discount;
					}
					//echo 'pay'.$pay_nights;
					//echo 'stay'.$stay_nights;
					//echo 'counter'.$counter;
					//echo 'days'.$days;
					//echo 'freedays'.$freedays = $stay_nights - $pay_nights;
					//$pay_nights = 1;
					//$stay_nights = 2;
					
					$freedays = $stay_nights - $pay_nights;
					$freedayss = 1;
					$multipleAccess=$get_hotel_promotion_stay_pay[0]->multiple;
					if($multipleAccess=='1')
					{
						$freedayss = floor($days / $stay_nights);
					}
					
				$pay_count = $pay_count+1;
				if(!empty($get_hotel_promotion_stay_pay) && $pay_nights < $pay_count)
				{ //echo "jfnkjsdvkgdfjkgjdfkgbjmkf";
				  if($checkfornight != '')
				  {
					echo '<div style="color:rgb(20, 185, 6);font-size:16px;float:right;">FREE STAY</div>';
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
					$total_cost=$splCharCost;
					if($total_cost!='0'){ //echo "hi";
						//echo $hotel_season_prices[$sp]->xml_currency;
						//echo ' '.number_format((float)$total_cost, 2, '.', '');
						echo '<span style="font-soze:11px; position:absolute;margin-top:15px;margin-left:73px;">'.$hotel_season_prices[$sp]->xml_currency.' '.number_format((float)$total_cost, 2, '.', '').' (Child charge & Supplementary charge)</span> ';
					}
				 }
				 else{ //echo "hello1";
					echo $hotel_season_prices[$sp]->xml_currency;
					echo ' '.number_format((float)$total_cost, 2, '.', '');
				}
				}
				else{ //echo "welcome1";
					echo $hotel_season_prices[$sp]->xml_currency;
					echo ' '.number_format((float)$total_cost, 2, '.', '');
				}//exit;

									
					$org_costs = $org_costs + $amountv1; 
					$markups = $markups + $amountv3; 
				$grand_total_cost=$grand_total_cost+$total_cost;
					$grand_total_cost=number_format((float)$grand_total_cost, 2, '.', '');
					
				
					//$days_ago = date('Y-m-d', strtotime('-5 days', strtotime($priceDate)));
					$days_ago = date('Y-m-d', strtotime('-'.$allocation_release_days.' days', strtotime($priceDate)));
					
					$exp_date = $days_ago;
					$todays_date = date("Y-m-d");
					
					$today = strtotime($todays_date);
					$expiration_date = strtotime($exp_date);
					//print_r($get_hotel_daily_allotment);
					//for($nn=0;$nn<count($get_hotel_daily_allotment);$nn++)
					//{
						$allocation_release_days = $get_hotel_daily_allotment[0][0]->allocation_release_days; 
						//echo "   hi   ";
	  					 $allocation_room_count = $get_hotel_daily_allotment[0][0]->allocation_rooms;
			//echo " ";

			//print_r($allocation_room_count);exit;
					if ($allocation_room_count>0) {
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
						
				//}
					
				//}
                ?></div>
                </div>
				<?php $a++;} $fd[2] = $fd[2] + $d; $counter++; array_push($stack, $valid); array_push($cancelsAmt, $total_cost); $c_child_above_age_charge=0; $c_sec_child_charge=0;

			} 
				//print_r($stack);
				//print_r($cancelsAmt);
				?>
            </td>
        </tr>
        
			<tr class='classic_room'>
            <td align='left' valign='middle' width="370" bgcolor="#eee" style="color:#227FB0; font-size:14px;line-height:25px;" colspan="2"><!--<?php $season_name = $this->B2b_Hotel_Model->get_season($hotel_season_prices[$sp]->season); echo $season_name->season;?>-->
            <?php echo strtoupper($hotel_category_types[$c]->room_type);?> ROOM <div style="color:#517194; font-size:12px;line-height: 15px;">Total
            <?php if($get_hotel_daily_rates[0]->meal_plan=='0')
				{
					echo ' including Half Board:'; 
				}
				else if($get_hotel_daily_rates[0]->meal_plan=='1')
				{
					echo ' including Full Board:'; 
				}
				else if($get_hotel_daily_rates[0]->meal_plan=='2')
				{
					echo ''; 
				}
				else if($get_hotel_daily_rates[0]->meal_plan=='3')
				{
					echo ' including All Inclusive:'; 
				}
				else if($get_hotel_daily_rates[0]->meal_plan=='4')
				{
					echo ' including Breakfast:'; 
				}
			?>
            </div>
			<?php 
			//echo "<pre/>";print_r($get_hotel_promotion_stay_pay);
			//echo $days."days".$get_hotel_promotion_stay_pay[0]->stay_nights."stay nights";
			if(!empty($get_hotel_promotion_stay_pay)){ 
				if(($get_hotel_promotion_stay_pay[0]->stay_nights!='' && $days >= $get_hotel_promotion_stay_pay[0]->stay_nights && $get_hotel_promotion_stay_pay[0]->stay_nights!='0') || $get_hotel_promotion_stay_pay[0]->bb_date!='0000-00-00'){ 
			?>
				
				<div><img src="<?php echo WEB_DIR; ?>images/promotion.gif" /> 
                <span style="color:#178AA0;">Special Offer: The following special/s apply for this booking:</span>
                <?php } ?>
                <?php if($get_hotel_promotion_stay_pay[0]->stay_nights!='' && $days >= $get_hotel_promotion_stay_pay[0]->stay_nights && $get_hotel_promotion_stay_pay[0]->stay_nights!='0' ) { ?>
				<div style="color:#517194; font-size:12px;line-height: 15px;">STAY <?php echo $get_hotel_promotion_stay_pay[0]->stay_nights; ?> PAY <?php echo $get_hotel_promotion_stay_pay[0]->pay_nights; ?> PROMO - Stay <?php echo $get_hotel_promotion_stay_pay[0]->stay_nights; ?> Pay for <?php echo $get_hotel_promotion_stay_pay[0]->pay_nights; ?></div>
                
                <?php } if($get_hotel_promotion_stay_pay[0]->bb_date!='0000-00-00' ){ ?>
                <div style="color:#517194; font-size:12px;line-height: 15px;">BOOK BB 
				<?php $bb_date = explode("-", $get_hotel_promotion_stay_pay[0]->bb_date); echo $bb_date[2].'-'.$bb_date[1].'-'.$bb_date[0]; ?> UPGRADE TO HB 
				<?php $hh_date = explode("-", $get_hotel_promotion_stay_pay[0]->hh_date); echo $hh_date[2].'-'.$hh_date[1].'-'.$hh_date[0]; ?></div>
                <?php } ?>
				</div>
			<?php }
			?>
            
            
            
            </td>
            <!--<td align="center" valign="middle" width="170" bgcolor="#eee" style="color:#227FB0; font-size:14px;"><?php $market_name = $this->B2b_Hotel_Model->get_market($hotel_season_prices[$sp]->market_id); echo $market_name->market_name; ?></td>-->
            <td align="center" valign="top" width="155" bgcolor="#eee" style="color:#966693; font-size:14px;"><?php echo $hotel_season_prices[$sp]->xml_currency;?> <?php echo $grand_total_cost; //$hotel_season_prices[$sp]->total_cost;?> <br />
            <?php 
				if (in_array("On Request", $stack)) {
					echo "<span style='color:#ff9900;font-weight: bold;'>On Request</span>";
				}
				else{
				    echo "<span style='color:green;'>Available</span>";
				}
            ?>
            </td>
            <td align="center" valign="top" width="155" bgcolor="#eee">
            
            <?php //$hotel_room_cancel_policy = $this->B2b_Hotel_Model->get_hotel_room_cancel_policy($hotel_season_prices[$sp]->sup_rate_tactics_id);
				  $hotel_room_cancel_policy = $this->B2b_Hotel_Model->get_hotel_room_cancel_policy_new($hotel_season_prices[$sp]->sup_rate_tactics_id);
				 //echo "<pre/>"; print_r($hotel_room_cancel_policy);exit;
				 $hotel_minimum_stay = $this->B2b_Hotel_Model->get_hotel_minimum_stay($hotel_season_prices[$sp]->sup_rate_tactics_id, $_SESSION['sd']); ?>
          
            <?php 

			$min_stay_from = strtotime($hotel_minimum_stay[0]->minimum_stay_from);
			$min_stay_to = strtotime($hotel_minimum_stay[0]->minimum_stay_to);
			
			//echo $hotel_minimum_stay[0]->minimum_stay_nights;
			if(isset($hotel_minimum_stay[0]->minimum_stay_nights) && $hotel_minimum_stay[0]->minimum_stay_nights!='' && $min_stay_from >= $_SESSION['sd'] && $min_stay_to >= $_SESSION['ed']){  
				if($hotel_minimum_stay[0]->minimum_stay_nights <= $days){
					//$_SESSION['minstay']='false'; 
					$minstay=0;
			?> 
            
            <input type="radio" name="room_<?php echo $i;?>" id="room" value="<?php echo $grand_total_cost; ?>,<?php echo $hotel_season_prices[$sp]->api_temp_hotel_id; ?>,<?php echo $org_costs; ?>,<?php echo $markups; ?>,<?php echo $hotel_season_prices[$sp]->sup_apart_maintain_month_id; ?>,<?php echo $hotel_season_prices[$sp]->room_code; ?>,<?php echo $hotel_season_prices[$sp]->market_id; ?>,<?php echo $hotel_season_prices[$sp]->room_type; ?>,<?php echo $hotel_season_prices[$sp]->category_type; ?>,<?php echo $hotel_season_prices[$sp]->season; ?>" class="radiobutton"/><br />
            
            <?php } else { echo '<span style="color:red;font-weight:normal;">Minimum Stay Nights: '.$hotel_minimum_stay[0]->minimum_stay_nights.' required.</span><br />'; } }
			else { ?>
             <input type="radio" name="room_<?php echo $i;?>" id="room" value="<?php echo $grand_total_cost; ?>,<?php echo $hotel_season_prices[$sp]->api_temp_hotel_id; ?>,<?php echo $org_costs; ?>,<?php echo $markups; ?>,<?php echo $hotel_season_prices[$sp]->sup_apart_maintain_month_id; ?>,<?php echo $hotel_season_prices[$sp]->room_code; ?>,<?php echo $hotel_season_prices[$sp]->market_id; ?>,<?php echo $hotel_season_prices[$sp]->room_type; ?>,<?php echo $hotel_season_prices[$sp]->category_type; ?>,<?php echo $hotel_season_prices[$sp]->season; ?>" class="radiobutton"/><br />
             <?php } ?>
            <span id="showDailyRates_<?php echo $c.$sp.$i;?>" style="color:#178AA0; cursor:pointer; text-decoration:underline;" onclick="showDailyRates('<?php echo $c.$sp.$i;?>')">Daily Rates</span>
            
            <input type="hidden" name="temp_id" id="temp_id" value="<?php echo $hotel_season_prices[$sp]->api_temp_hotel_id; ?>" />
            <input type="hidden" name="org_amt" id="org_amt" value="<?php echo $hotel_season_prices[$sp]->org_amt; ?>" />
            <input type="hidden" name="markup" id="markup" value="<?php echo $hotel_season_prices[$sp]->markup; ?>" />
            <input type="hidden" name="grand_total_cost[]" id="grand_total_cost" value="<?php echo $grand_total_cost; ?>" />
            </td>
        </tr>
        
        <tr class='classic_room' width="700">
            <td align='left' valign='middle' colspan="4" style="line-height:22px;color:#966693;font-size:13px;">
                       
            
            <!--Start of Cancel Deadline--> 
            <?php if(isset($hotel_room_cancel_policy[0]->cancel_policy_from) && $hotel_room_cancel_policy[0]->cancel_policy_from!=''){					//echo $hotel_room_cancel_policy[1]->cancel_policy_nights;
					//echo $room_alloc_date; 
				
					$deadline_date = date('Y-m-d', strtotime('-'.$hotel_room_cancel_policy[0]->cancel_policy_nights.' days', strtotime($s_date)));
					$cancel_policy_from = strtotime($deadline_date);
				$ss_date = strtotime($todays_date);
					if($cancel_policy_from <= $ss_date){  ?>
            <div style='color:red;font-weight:normal;'>WITH IN CANCELLATION DEADLINE</div> <?php }} ?>
            <!--Start of Cancel Deadline-->
             
            
            <!--Start of Remarks-->
            <?php if(isset($hotel_season_prices[$sp]->remarks) && $hotel_season_prices[$sp]->remarks!= ''){ ?>
            <?php echo $hotel_season_prices[$sp]->remarks; ?><br /> <?php } ?>            
            <!--End of Remarks-->
            
            <!--Start of Minimum Stay Nights-->   
            <?php if(isset($hotel_minimum_stay[0]->minimum_stay_nights) && $hotel_minimum_stay[0]->minimum_stay_nights!=''){ 
			 $minimum_stay_fromS = strtotime($hotel_minimum_stay[0]->minimum_stay_from);
			 $minimum_stay_toS = strtotime($hotel_minimum_stay[0]->minimum_stay_to);
			 $ss_date = strtotime($todays_date);
			if($minimum_stay_fromS <= $ss_date && $ss_date <=$minimum_stay_toS){
			?> Minimum Stay Nights: <?php echo $hotel_minimum_stay[0]->minimum_stay_nights; ?> from <?php echo $hotel_minimum_stay[0]->minimum_stay_from; ?> to <?php echo $hotel_minimum_stay[0]->minimum_stay_to; ?><br /><?php } } ?>
            <!--End of Minimum Stay Nights--> 
            
            <!--Start of Cancellation Policy with rates-->
            <?php if(isset($hotel_season_prices[$sp]->cancel_policy_desc) && $hotel_season_prices[$sp]->cancel_policy_desc!= ''){ ?>
            <?php echo $hotel_season_prices[$sp]->cancel_policy_desc; ?><br /> <?php } ?>
                       
            
            <?php //echo "hello";//echo "<pre/>";print_r($hotel_room_cancel_policy);exit;
            	for($hcp=0; $hcp< count($hotel_room_cancel_policy); $hcp++)
            	{	
            		//echo "hiiiiiii";
            		$cancel_date_start = date('Y-m-d', strtotime('-'.$hotel_room_cancel_policy[$hcp]->cancel_policy_nights.' days', strtotime($hotel_room_cancel_policy[$hcp]->cancel_policy_from)));
					
					if($hotel_room_cancel_policy[$hcp]->cancel_policy_charge!='')
					{	
						//echo "hellllooooo";echo $hotel_room_cancel_policy[$hcp]->cancel_policy_charge;
						$noOfNights = $hotel_room_cancel_policy[$hcp]->cancel_policy_charge;
						//$dailyRatesArray=array_reverse($cancelsAmt); 
						$dailyRatesArray=$cancelsAmt; 
						//print_r($dailyRatesArray);
						count($dailyRatesArray);
						$per_all_nights_cancel_rate=0;
						for($sA=0; $sA< $noOfNights; $sA++)
						{
							$per_all_nights_cancel_rate += $dailyRatesArray[$sA];
						}
						//echo 'total'.$per_all_nights_cancel_rate;
			  		}
            		else if($hotel_room_cancel_policy[$hcp]->cancel_policy_percent!='')
					{	
						//echo "welcome";
						//echo $hotel_room_cancel_policy[$hcp]->cancel_policy_percent;
						$cancel_rate = ($hotel_room_cancel_policy[$hcp]->cancel_policy_percent/100) * $grand_total_cost;		
						$dailyRatesArray=$cancelsAmt;
						if($cancel_rate=='0')
						{
							$per_all_nights_cancel_rate = $cancel_rate;
						}
						else if($cancel_rate<$dailyRatesArray[0])
						{
							$per_all_nights_cancel_rate = $dailyRatesArray[0];
						} 
						else if($cancel_rate>=$dailyRatesArray[0]) 
						{
							$per_all_nights_cancel_rate = $cancel_rate;
						} 
					} 
					$per_all_nights_cancel_rate=number_format((float)$per_all_nights_cancel_rate, 2, '.', '');
			?>	
            		A charge of AED <?php echo $per_all_nights_cancel_rate; ?> will apply if Cancelled or Amended for <?php echo $hotel_room_cancel_policy[$hcp]->cancel_policy_nights; ?> days prior to arrival.<br />

			<?php  }//exit; ?>
            <!--End of Cancellation Policy with rates-->
            <?php echo $service->child_policy; //echo $todays_date."hello".$deadline_date ?>
            </td>
        </tr>
</table>
            </div>
            </td>
        </tr>
         <tr class='classic_room' width="700" style="height:0px; line-height:0px;">
            <td align='left' valign='middle' colspan="4">&nbsp;</td>
        </tr>
		<?php $grand_total_cost=0; $org_costs=0; $markups=0; unset($cancelsAmt);} ?>
        </table>
    </td>
    </tr>
     <tr>
     <td height="1" colspan="2" bgcolor="#999"></td>
 	</tr>
	<?php } ?>
</table>
<?php } ?>  
 
<table width="100%" border="0" cellspacing="10" cellpadding="0" class="hotelnames" style="margin-bottom:3px;border: 1px solid #BEE7FF;">
    <tr>
        <td width="25%" align="left" style="font-size:15px;">
        <input type="hidden" name="api_temp_hotel_id" id="api_temp_hotel_id" value="" />
        <input type="hidden" name="totalOrgAmt" id="totalOrgAmt" value="" />
        <input type="hidden" name="totalMarkAmt" id="totalMarkAmt" value="" />
        
        <input type="hidden" name="maintain_month_id" id="maintain_month_id" value="" />
        <input type="hidden" name="room_code" id="room_code" value="" />
        <input type="hidden" name="market_id" id="market_id" value="" />
        <input type="hidden" name="room_type" id="room_type" value="" />
        <input type="hidden" name="cate_type" id="cate_type" value="" />
        <input type="hidden" name="season" id="season" value="" />
        
        </td>
        <td width="25%" align="left" style="font-size:15px;"><input type="hidden" name="totalValue" id="totalValue" value="" /></td>
        <td width="25%" align="center" style="font-size:15px;color:#966693; font-size:14px; isplay:none;" id="resultTotal">&nbsp;</td>
        <?php
        $start_date = explode('-',$_SESSION['sd']);
					$end_date = explode('-',$_SESSION['ed']);
					
		$room_alloc_date = $start_date[2].'-'.$start_date[1].'-'.$start_date[0];
			$room_vecate_date = $end_date[2].'-'.$end_date[1].'-'.$end_date[0];
					
        $start = strtotime($room_alloc_date);
					$end = strtotime($room_vecate_date);
					$days = $end - $start;
					 $days = ceil($days/86400);
if(isset($hotel_minimum_stay[0]->minimum_stay_nights) && $hotel_minimum_stay[0]->minimum_stay_nights!='' && $min_stay_from >= $_SESSION['sd'] && $min_stay_to >= $_SESSION['ed']){ 
//echo $hotel_minimum_stay[0]->minimum_stay_nights; echo"   ";echo $days; 
			if($days<$hotel_minimum_stay[0]->minimum_stay_nights)
{ //echo "hello"; exit; ?>
<td width="100%" align="right" style="font-size:15px;">
	<marquee style="color:red;"><b>Sorry! minimum stay night is : <?php echo $hotel_minimum_stay[0]->minimum_stay_nights;?></b></marquee></td>
<?php
}
else
{//echo "hello";?>
        	<td width="100%" align="right" style="font-size:15px;">
        	<input type="image" src="<?php echo WEB_DIR; ?>images/bookin-img.jpg" name="Submit" />
        	</td>
        <?php
   }
}else
{
    ?>
<td width="100%" align="right" style="font-size:15px;">
        	<input type="image" src="<?php echo WEB_DIR; ?>images/bookin-img.jpg" name="Submit" />
        	</td>
        	<?php }?>
        </td>
    </tr>
 </table>
</form>   
    
<!--    <table align="left" width="724" border="0" cellspacing="5" cellpadding="5" class="sum-txt" style="margin-top:15px; font-size:15px; font-weight:bold; background-color:#bee7ff; border-radius:10px;">
    
    <tr>
     <td width="260" align="left">Room Type</td>
     <td width="110" align="center">Inclusion</td>
     <td width="30" align="center">Night</td>
     <td width="50" align="center">Cost</td>
     <td width="80" align="center">Status</td>
     <td width="80">&nbsp;</td>
     
    </tr>
    </table>
    <table align="left" width="724" border="0" cellspacing="5" cellpadding="5" class="sum-txt" style="margin-top:2px; font-size:13px; border:1px #bee7ff solid; border-radius:10px;">
    <?php
    $room_count = $_SESSION['room_count'];
    
    if($room_count == 1)
    {
        
        $room_info  = $this->B2b_Hotel_Model->fetch_gta_temp_result_room($_SESSION['ses_id'],$service->hotel_code);
    
    for($t=0;$t< count($room_info);$t++)
    {
    if(count($room_info)-1 == $t )
    {
    echo '<tr class="hotelfa-div_bootom">';
    }
    else
    {
    echo '<tr class="hotelfa-div">';
    }
    ?>
    
    
     <td width="260" align="left"><?php echo $room_info[$t]->room_type; ?> </td>
     <td width="110" align="center"><?php echo $room_info[$t]->inclusion; ?></td>
     <td width="30" align="center"><?php echo $_SESSION['days']; ?></td>
     <td width="50" align="center"><?php echo $room_info[$t]->total_cost.' USD'; ?></td>
     <td width="80" align="center"><?php echo $room_info[$t]->status; ?></td>
     <td width="80" align="center"><a  href="<?php echo WEB_URL.'b2b_hotel/pre_booking/'.$room_info[$t]->api_temp_hotel_id; ?> "><img src="<?php echo WEB_DIR; ?>images/bookin-img.jpg" border="0" /></a></td>
    </tr>
    
    <?php
    }
    
     
    }
    else
    {
    if($service->api =='hotelsbed')
    {	
    //echo "<pre/>";
    //print_r($service);exit;
    $merge_inclsuion = $this->B2b_Hotel_Model->get_merge_inclsuion_hotelsbed($service->hotel_code,$service->api,$service->session_id,$service->contractnameVal);
    //$merge_inclsuion = $this->Search_Model->get_merge_inclsuion_hbm($row->hotel_id,$row->api_name,$row->criteria_id,$row->cancellation_enddate);
                    
     /*?>$strings=array();
    for($tt=0;$tt< count($merge_inclsuion);$tt++)
    {
    
         $strings_inc = $merge_inclsuion[$tt]->inclusion;  
         $merge_inclsuion_inc = $this->Hotel_Model->get_merge_inclsuion_hotelsbed_inc($service->hotel_code,$service->api,$service->session_id,$strings_inc);
         for($rr=0;$rr<count($merge_inclsuion_inc);$rr++)
         {
                $strings[]=$merge_inclsuion_inc[$rr]->api_temp_hotel_id 	;
         }
        //echo "<pre/>";
        //print_r($strings);exit;
    } 
        //$strings = explode(' ', $string);
        
        $b=array();
        
        $a = $this->Hotel_Model->concatss($strings, "");
        
        for($i=0;$i<count($a);$i++)
        {
            
            $haystack="||";
            
            $cnt_val = strlen($a[$i]) - strlen(str_replace(str_split($haystack), '', $a[$i]));
        $count = $_SESSION['room_count']*2;
    
        if($cnt_val == $count)
        {
            
            $cut_val = substr($a[$i],2);
            $cut_expl = explode("||",$cut_val);
            
        $b[]=$cut_expl;
     $c_c=array();
     $a_a=array();
     $a_b=array();
    $codt=''; 
    for($ss=0;$ss<count($b);$ss++)
    {
    $a_a=$cut_expl;
    
    $a_b=$b[$ss];
    $c_c =  array_diff($a_a, $a_b);
    
    if($c_c !='')
    {
        $merger_total_cost=0;
        $merge_room_type='';
        $merge_inclusion='';
        $merge_status='';
        $merge_result_id='';
            for($ii=0;$ii<count($cut_expl);$ii++)
            {
            
            $merge_inclsuionroom = $this->Hotel_Model->get_merge_inclsuion_hotelsbed_mapping($service->hotel_code,$service->api,$service->session_id,$cut_expl[$ii]);
        
                            $merger_total_cost = $merger_total_cost + $merge_inclsuionroom->total_cost;
                            $merge_room_type .=$merge_inclsuionroom->room_type.'<br>';
                            $merge_inclusion .=$merge_inclsuionroom->inclusion.'<br>';
                            $merge_status .= $merge_inclsuionroom->status.'<br>';
                            $merge_result_id .= $merge_inclsuionroom->api_temp_hotel_id.'-';
    
            }
    }
    }
    
        $merge_result_id1 = substr($merge_result_id,0,-1);
    
        $this->Hotel_Model->insert_hotel_detail_mapping($service->session_id,$merge_room_type,$merge_inclusion,$_SESSION['days'],$merger_total_cost.' USD',$merge_status,$merge_result_id1);
            
            }
        }
    
        $row = $this->Hotel_Model->get_hotel_detail_mapping($service->session_id);
               <?php */?>
               <?php
               // echo "<pre/>";
               // print_r($merge_inclsuion);exit;
               //  echo count($merge_inclsuion);exit;
               foreach($merge_inclsuion as $row1)
                  {
                        $merge_total =0;
                        $usd_hb_total=0;
                        $merge_roomtype = '';
                        $merge_nightprice='';
                        $merge_result_id='';
                        $show_room='';
                        $resultid_hbval=array();
                        //$a_adult=array();
                    //$a_child=array();
                    //	for($ee=0;$ee<$_SESSION['room_count'];$ee)
                    //	{
                    //		$a_adult = $_SESSION['org_adult'][$ee];
                    //		$a_child = $_SESSION['org_child'][$ee];
                    //		$merge_room_result = $this->Hotel_Model->get_mergeroom_result_hbm_only_meal($row1->hotel_code,$row1->api,$row1->session_id,$row1->inclusion,$a_adult,$a_child);
                    //	}
                    //	echo "<pre/>";
                    //	print_r($a_adult);exit;
                        $merge_room_result = $this->B2b_Hotel_Model->get_mergeroom_result_hbm_only_meal($row1->hotel_code,$row1->api,$row1->session_id,$row1->inclusion);
                    //	echo "<pre/>";
                    //	print_r($merge_room_result);exit;
                     /*  for ($e = 0; $e < count($merge_room_result); $e++)
    {
    $duplicate = null;
    for ($ee = $e+1; $ee < count($merge_room_result); $ee++)
    {
    
    if (strcmp($merge_room_result[$ee]->adult,$merge_room_result[$e]->adult) === 0)
    {
    $duplicate = $ee;
    break;
    }
    }
    if (!is_null($duplicate))
    array_splice($merge_room_result,$duplicate,1);
    }
                */	
                        foreach($merge_room_result as $row)
                        {
                            
                            $tot_cost = $row->total_cost;
                            $status=$row->status;
                            $usd_hb_total = $usd_hb_total + $tot_cost;
                            $USD_hotelsbed = $usd_hb_total;
                            
                            $merge_roomtype .=$row->room_type.'<br/>';
                            $resultid_hbval[] = $row->api_temp_hotel_id;
                            $merge_total = $merge_total + number_format($tot_cost,'2','.','');
    
    
                        }
                        $merge_result_id=implode("-",$resultid_hbval);
                    
    
    
    ?>	
    
    <tr  class="hotelfa-div">
     <td width="260" align="left"><?php echo $merge_roomtype; ?> </td>
     <td width="110" align="center"><?php echo $row1->inclusion; ?></td>
     <td width="50" align="center"><?php echo $_SESSION['days']; ?></td>
     <td width="30" align="center"><?php echo $merge_total; ?></td>
     <td width="80" align="center"><?php echo $row1->status; ?></td>
     <td width="80" align="center"><a  href="<?php echo WEB_URL.'b2b_hotel/pre_booking/'.$merge_result_id; ?> "><img src="<?php echo WEB_DIR; ?>images/bookin-img.jpg" border="0" /></a></td>
    </tr>
    <?php
    }
    //$merge_room_type .= "<br>";
    //$merge_result_id = substr($merge_result_id, 0, -1);
    //echo $ruby;
    }
    elseif($service->api =='gta')
    {
    $room_info  = $this->B2b_Hotel_Model->fetch_gta_temp_result_room($_SESSION['ses_id'],$service->hotel_code);
    for($t=0;$t< count($room_info);$t++)
    {
        if(count($room_info)-1 == $t )
    {
        echo '<tr class="hotelfa-div_bootom">';
    }
    else
    {
        echo '<tr class="hotelfa-div">';
    }
    ?>
    
     <td width="260" align="left"><?php echo $room_info[$t]->room_type; ?></td>
     <td width="110" align="center"><?php echo $room_info[$t]->inclusion; ?></td>
     <td width="50" align="center"><?php echo $_SESSION['days']; ?></td>
     <td width="30" align="center"><?php echo $room_info[$t]->total_cost.' USD'; ?></td>
     <td width="80" align="center"><?php echo $room_info[$t]->status; ?></td>
     <td width="80" align="center"><a  href="<?php echo WEB_URL.'b2b_hotel/pre_booking/'.$room_info[$t]->api_temp_hotel_id; ?> "><img src="<?php echo WEB_DIR; ?>images/bookin-img.jpg" border="0" /></a></td>
    </tr>
    <?php
    }
    
     
    
    }
    elseif($service->api == 'hotelspro')
    {
        
             $room_info  = $this->B2b_Hotel_Model->fetch_gta_temp_result_room($_SESSION['ses_id'],$service->hotel_code);
    
    for($t=0;$t< count($room_info);$t++)
    {
    ?>
    
    <tr>
    <td style="padding-top:4px;" class="table_colom-row" ><?php echo $room_info[$t]->room_type; ?></td>
    <td class="table_colom-row"><?php echo $room_info[$t]->inclusion; ?></td>
    <td class="table_colom-row"><?php echo $_SESSION['days']; ?></td>
    <td class="table_colom-row"><?php echo $room_info[$t]->total_cost.' USD'; ?></td>
    <td class="table_colom-row"><?php echo $room_info[$t]->status; ?></td>
    <td align="right" class="table_colom-row">
    <?php
    if( $room_info[$t]->api=='hotelspro')
    {
    ?> <a href="<?php echo WEB_URL.'b2b_hotel/pro_pre_booking/'.$room_info[$t]->api_temp_hotel_id; ?> "><img src="<?php echo WEB_DIR; ?>images/bookin-img.jpg" border="0" /></a>
    <?php
    }
    else
    {
    ?> <a href="<?php echo WEB_URL.'b2b_hotel/pre_booking/'.$room_info[$t]->api_temp_hotel_id; ?> "><img src="<?php echo WEB_DIR; ?>images/bookin-img.jpg" border="0" /></a>
    <?php
    }
    ?>
    </td>
    </tr>
    
    <?php
    }
    }
    elseif($service->api == 'travco')
    {
            
    
    //echo "<pre/>";
    //print_r($service);exit;
    $merge_inclsuion = $this->B2b_Hotel_Model->get_merge_inclsuion_travco($service->hotel_code,$service->api,$service->session_id);
    
        //	foreach($merge_inclsuion as $row1)
               //  {
                        $merge_total =0;
                        $usd_hb_total=0;
                        $merge_roomtype = '';
                        $merge_nightprice='';
                        $merge_result_id='';
                        $merge_inclusion='';
                        $merge_statis='';
                        $show_room='';
                        $resultid_hbval=array();
                        $merge_room_result = $this->B2b_Hotel_Model->get_mergeroom_result_hbm_only_meal_travco($service->hotel_code,$service->api,$service->session_id,$service->api_temp_hotel_id);
                        
                        foreach($merge_room_result as $row)
                        {
                            
                            $tot_cost = $row->total_cost;
                            $status=$row->status;
                            $usd_hb_total = $usd_hb_total + $tot_cost;
                            $USD_hotelsbed = $usd_hb_total;
                            
                            $merge_roomtype .=$row->room_type.'<br/>';
                            $merge_inclusion .=$row->inclusion.'<br/>';
                            $merge_statis .=$row->status.'<br/>';
                            $resultid_hbval[] = $row->api_temp_hotel_id;
                            $merge_total = $merge_total + number_format($tot_cost,'2','.','');
    
    
                        }
                        $merge_result_id=implode("-",$resultid_hbval);
                    
    
    
    ?>	
    
    <tr  class="hotelfa-div">
     <td width="260" align="left"><?php echo $merge_roomtype; ?> </td>
     <td width="110" align="center"><?php echo $merge_inclusion; ?></td>
     <td width="50" align="center"><?php echo $_SESSION['days']; ?></td>
     <td width="30" align="center"><?php echo $merge_total; ?></td>
     <td width="80" align="center"><?php echo $merge_statis; ?></td>
     <td width="80" align="center"><a  href="<?php echo WEB_URL.'b2b_hotel/pre_booking/'.$merge_result_id; ?> "><img src="<?php echo WEB_DIR; ?>images/bookin-img.jpg" border="0" /></a></td>
    </tr>
    <?php
    
               }
    
    }
    
    
    ?>
    
    </table>
-->    
    <table align="left" width="724" border="0" cellspacing="5" cellpadding="5" class="sum-txt" style="margin-top:15px; font-size:15px; font-weight:bold; background-color:#bee7ff; border-radius:10px;">
      
      <tr>
         <td width="200" align="left">Hotel Facilities</td>
         <td  align="left">&nbsp;</td>
         
      </tr>
    </table>
    <?php 
$hotel='';
$room='';
/*if($hotel_facility!='')
{
	for($k=0;$k<count($hotel_facility);$k++)
	{
		$hotel = $hotel_facility[$k]->fac.', '.$hotel;
	}
}
if($room_facility!='')
{
	for($sd=0;$sd<count($room_facility);$sd++)
	{
		$room = $room_facility[$sd]->fac.', '.$room;
	}
}*/

?>
<table align="left" width="724" border="0" cellspacing="0" cellpadding="5" class="sum-txt" style="margin-top:2px; font-size:13px; border:1px #bee7ff solid; border-radius:10px;">
<tr>
<td align="left">
<div style="width:700px; margin:0 auto;">

<div class="hotelfa-div" style="border:none">
<!--<div style="width:150px; float:left; font-weight:bold">Generals </div>-->
<div style="width:650px; float:left"><?php echo trim($hotel_facility, ","); ?>
</div>
</div>

<!-- <div class="hotelfa-div">
<div style="width:150px; float:left;  font-weight:bold">Services </div>
<div style="width:550px; float:left">
<?php
$string = $hotel;
$hot = explode(", ",$hotel);
$hotel_ser='';
for($a=0;$a< count($hot);$a++)
{
if(stristr($hot[$a], 'service') == TRUE) {
$hotel_ser = $hot[$a].', '.$hotel_ser;
}
else
{
$hotel_ser = $hotel_ser; 
}
}
echo $hotel_ser;
?>
</div>
</div>

<div class="hotelfa-div">
<div style="width:150px; float:left;  font-weight:bold">Internet </div>
<div style="width:550px; float:left"> <?php
$string = $hotel;
if(stristr($string, 'WLAN') == TRUE)
{
$string = $string.',wi-fi';
}
if(stristr($string, 'wi-fi') === FALSE) 
{
echo ' Wi-fi is Not available in the entire hotel.';
}
else
{
echo ' Wi-fi is available in the entire hotel.'; 
}
?>
</div>
</div>

<div class="hotelfa-div_bootom">
<div style="width:150px; float:left;  font-weight:bold">Parking </div>
<div style="width:550px; float:left"> <?php
$string = $hotel;
if(stristr($string, 'park') === FALSE) {
echo 'No parking available.';
}
else
{
echo 'Parking available.'; 
}
?>
</div>
</div>-->

</div>
</td>
</tr>
</table>


<table align="left" width="724" border="0" cellspacing="5" cellpadding="5" class="sum-txt" style="margin-top:15px; font-size:15px; font-weight:bold; background-color:#bee7ff; border-radius:10px;">

<tr>
<td width="200" align="left">Room Facilities</td>
<td  align="left">&nbsp;</td>

</tr>
</table>
<table align="left" width="724" border="0" cellspacing="0" cellpadding="5" class="sum-txt" style="margin-top:2px; font-size:13px; border:1px #bee7ff solid; border-radius:10px;">
<tr>
<td align="left">
<div style="width:700px; margin:0 auto;">

<div class="hotelfa-div" style="border:none">
<!--<div style="width:150px; float:left; font-weight:bold">Generals </div>-->
<div style="width:650px; float:left"><?php echo trim($room_facility, ","); ?>
</div>
</div>

</div>
</td>
</tr>
</table>


<!-- <table align="left" width="724" border="0" cellspacing="5" cellpadding="5" class="sum-txt" style="margin-top:15px; font-size:15px; font-weight:bold; background-color:#bee7ff; border-radius:10px;">

<tr>
<td width="200" align="left">Hotel Address</td>
<td  align="left">&nbsp;</td>

</tr>
</table>
<table align="left" width="724" border="0" cellspacing="0" cellpadding="5" class="sum-txt" style="margin-top:2px; font-size:13px; border:1px #bee7ff solid; border-radius:10px;">
<tr>
<td align="left">
<div style="width:700px; margin:0 auto;">

<div class="hotelfa-div">
<div style="width:150px; float:left; font-weight:bold">Address </div>
<div style="width:550px; float:left"><?php echo $service->address."<br>".$service->city; ?>t</div>
</div>

<div class="hotelfa-div">
<div style="width:150px; float:left; font-weight:bold">Phone </div>
<div style="width:550px; float:left"><?php echo $service->phone; ?></div>
</div>


<div class="hotelfa-div_bootom">
<div style="width:150px; float:left; font-weight:bold">Fax </div>
<div style="width:550px; float:left"><?php echo $service->fax; ?></div>
</div>
</div>
</td>
</tr>
</table>-->

<table align="left" width="724" border="0" cellspacing="5" cellpadding="5" class="sum-txt" style="margin-top:15px; font-size:15px; font-weight:bold; background-color:#bee7ff; border-radius:10px;">
<tr>
<td width="200" align="left">Check in and Check out</td>
<td  align="left">&nbsp;</td>
</tr>
</table>
<table align="left" width="724" border="0" cellspacing="0" cellpadding="5" class="sum-txt" style="margin-top:2px; font-size:13px; border:1px #bee7ff solid; border-radius:10px;">
<tr>
<td align="left">
<div style="width:700px; margin:0 auto;">
<div class="hotelfa-div">
<div style="width:650px; float:left">All hotels check in time is between <?php echo $service->checkinfrom; ?> to <?php echo $service->checkinto; ?> and check out time is between <?php echo $service->checkoutfrom; ?> to <?php echo $service->checkoutto; ?></div>
</div>
<div class="hotelfa-div">
<div style="width:650px; float:left">Automatically check-in guest after <?php echo $service->checkin_guest_after; ?> hrs and Automatically check-out guest after <?php echo $service->checkout_guest_after; ?> hrs</div>
</div>
<div class="hotelfa-div">
<div style="width:650px; float:left">Key Collection is <?php if($service->key_collection == '1') { echo 'On-Site'; } if($service->key_collection == '2') { echo 'Off-Site '.$service->key_collection_desc; } ?></div>
</div>
<div class="hotelfa-div">
<div style="width:650px; float:left">Tax is <?php echo $service->tax; ?> </div>
</div>
<div class="hotelfa-div_bootom">
<div style="width:650px; float:left">Service Charge is <?php echo $service->service_charge; ?> </div>
</div>
</div>
</td>
</tr>
</table>

<table align="left" width="724" border="0" cellspacing="5" cellpadding="5" class="sum-txt" style="margin-top:15px; font-size:15px; font-weight:bold; background-color:#bee7ff; border-radius:10px;">
<tr>
<td width="200" align="left">Detail Locations</td>
<td  align="left">&nbsp;</td>
</tr>
</table>
<table align="left" width="724" border="0" cellspacing="0" cellpadding="5" class="sum-txt" style="margin-top:2px; font-size:13px; border:1px #bee7ff solid; border-radius:10px;">
<tr>
<td align="left">
<div style="width:700px; margin:0 auto;">
<div class="hotelfa-div">
<div style="width:200px; float:left; font-weight:bold">Location (detailed location) </div>
<div style="width:450px; float:left"><?php echo $service->detail_location; ?></div>
</div>
<div class="hotelfa-div">
<div style="width:200px; float:left; font-weight:bold">Nearest Airport </div>
<div style="width:450px; float:left"><?php echo $service->nearby_airport; ?></div>
</div>
<div class="hotelfa-div">
<div style="width:200px; float:left; font-weight:bold">Nearest Public Transport </div>
<div style="width:450px; float:left"><?php echo $service->nearby_transport; ?></div>
</div>
<div class="hotelfa-div_bootom">
<div style="width:200px; float:left; font-weight:bold">Places of Interest Nearby </div>
<div style="width:450px; float:left"><?php echo $service->nearby_placeinterest; ?></div>
</div>
</div>
</td>
</tr>
</table>

<table align="left" width="724" border="0" cellspacing="5" cellpadding="5" class="sum-txt" style="margin-top:15px; font-size:15px; font-weight:bold; background-color:#bee7ff; border-radius:10px;">
<tr>
<td width="200" align="left">Map</td>
<td  align="left">&nbsp;</td>
</tr>
</table>
<script src="http://maps.google.com/maps?file=api&v=2&key=ABQIAAAApz8aTXS5eUyxvs5uMszdKRfgfgRgqqCDjpPIuqwLUuHujN8I3D2s4RShDFoZ233PbhiKTfM2Mr6LzhnYEA" type="text/javascript"></script>

<script type="text/javascript">
//<![CDATA[
function mapLoad() {
if (GBrowserIsCompatible()) {
var map = new GMap2(document.getElementById("map"));

var point = new GLatLng(<?php print $service->latitude; ?>,<?php print $service->longitude; ?>);
map.setCenter(new GLatLng(<?php print $service->latitude; ?>,<?php print $service->longitude; ?>),14);
var marker = new GMarker(point);

map.addOverlay(marker);
map.addControl(new GSmallMapControl());
map.addControl(new GMapTypeControl());
}

panoClient = new GStreetviewClient();
panoClient.getNearestPanorama(new GLatLng(<?php print $service->latitude; ?>,<?php print $service->longitude; ?>),function(a){



if (a.code == 200){



var fenwayPark = new GLatLng(<?php print $service->latitude; ?>,<?php print $service->longitude; ?>);
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
<table align="left" width="724" border="0" cellspacing="0" cellpadding="5" class="sum-txt" style="margin-top:2px; font-size:15px; border:1px #bee7ff solid; border-radius:10px;">
<tr>
<td align="left">
<div id="map" style="width: 711px; height:250px;margin-bottom:5px">Not Available</div>
</td>
</tr>
</table>

<table align="left" width="724" border="0" cellspacing="5" cellpadding="5" class="sum-txt" style="margin-top:15px; font-size:15px; font-weight:bold; background-color:#bee7ff; border-radius:10px;">

<tr>
<td width="200" align="left">Street Map</td>
<td  align="left">&nbsp;</td>

</tr>
</table>
<table align="left" width="724" border="0" cellspacing="0" cellpadding="5" class="sum-txt" style="margin-top:2px; font-size:15px; border:1px #bee7ff solid; border-radius:10px;">
<tr>
<td align="left">
   
<div id="pano" style="width: 711px; height:250px;margin-bottom:5px"></div>

</td>
</tr>
</table>

    
  </div>
  </div>
</div>
</div></div>
<div style="clear:both"></div>
<?php $this->load->view('b2b/footer'); ?>
</body>
</html>

<script>
$('.classic_room').click(function(){
	var val = [];
	var temp = [];
	var orgAmt = [];
	var markAmt = [];
	var maintain_month_id = [];
	var room_code = [];
	var market_id = [];
	var room_type = [];
	var cate_type = [];
	var season = [];
	$(':radio:checked').each(function(i){
		var arr = $(this).val().toString().split(","); 
		//alert(arr[0]); 
		val[i] = arr[0];
		temp[i] = arr[1];
		orgAmt[i] = arr[2];
		markAmt[i] = arr[3];
		maintain_month_id[i] = arr[4];
		room_code[i] = arr[5];
		market_id[i] = arr[6];
		room_type[i] = arr[7];
		cate_type[i] = arr[8];
		season[i] = arr[9];
	});
	//alert(val);
	var totAmt = val.toString().split(","); //alert(totAmt[0]);
	var totorgAmt = orgAmt.toString().split(","); 
	var totmarkAmt = markAmt.toString().split(","); 
	var count = totAmt.length;
	var countorgAmt = totorgAmt.length;
	var countmarkAmt = totmarkAmt.length;
	var totalAmt=0.00; var totalOrgAmt=0.00; var totalMarkAmt=0.00;
	for(var i=0; i<count; i++){
		
	totalAmt = parseFloat(totalAmt) + parseFloat(totAmt[i]);
	totalAmt = parseFloat(totalAmt).toFixed(2);
	
	totalOrgAmt = parseFloat(totalOrgAmt) + parseFloat(totorgAmt[i]);
	totalOrgAmt = parseFloat(totalOrgAmt).toFixed(2);
	
	totalMarkAmt = parseFloat(totalMarkAmt) + parseFloat(totmarkAmt[i]);
	totalMarkAmt = parseFloat(totalMarkAmt).toFixed(2);
	}
	//alert(totalAmt);
	if(totalAmt!='NaN'){
	$('#resultTotal').html('AED '+totalAmt); }
	$('#totalValue').val(totalAmt);
	$('#totalOrgAmt').val(totalOrgAmt);
	$('#totalMarkAmt').val(totalMarkAmt);
	$('#api_temp_hotel_id').val(temp);
	
	$('#maintain_month_id').val(maintain_month_id);
	$('#room_code').val(room_code);
	$('#market_id').val(market_id);
	$('#room_type').val(room_type);
	$('#cate_type').val(cate_type);
	$('#season').val(season);
	
	
});
function showDailyRates(id){
	$('#DailyRates_'+id).toggle('slow');
	$('#showDailyRates_'+id).html('Daily Rates');
}
</script>
 
