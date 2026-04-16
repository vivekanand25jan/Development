<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Travel Bay</title>

<link href="<?php echo WEB_DIR; ?>designAccess/css/travel_bay_stylesheet.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo WEB_DIR; ?>designAccess/engine1/style.css" />


<link href="<?php echo WEB_DIR; ?>css/style_sheet.css" rel="stylesheet" type="text/css" />
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
	$('#testinput').val(top_city);
});
return false;
});

</script>
<style>
 hr { border: 1px solid gray;
    height: 1px;
 }
</style>
</head>
<body>
<?php $this->load->view('b2b/header');
$agent_det = $this->B2b_Model->agentInfo($this->session->userdata('agent_id'));
 ?>
<div class="midlebody">
  
    
      <div class="b2b-lhsside">
  
  <div>
  <?php
  if($agent_det->agent_mode != 'cash')
  {
	  ?>
    <div class="b2b-leftdiv-toptit"><span>Account Information</span></div>
  	<div class="b2b_left-secbox">
  		<div style="width:220px; margin:0 auto; font-family:MAIAN; font-size:15px" >
        	<div class="account_body">
					<?php 
					if (isset($balance_credit)) { ?>
					<span style="float:left; width:100px; font-weight:bold;"> Balance </span> :  <?php echo '$'.$balance_credit; ?><br/>
   <span style="float:left; width:100px; font-weight:bold;"> Last Credit </span>         :  <?php if (isset($last_credit)) echo '$' . $last_credit; ?><br/>
				<?php 
				}
				else
				{
				?>
                <span style="float:left; width:100px; font-weight:bold;"> Balance </span> :  $0<br/>
   <span style="float:left; width:100px; font-weight:bold;"> Last Credit </span>         :  $0<br/>
                <?php
				}
				?>
    <span style="float:left; width:100px; font-weight:bold;"> ---------------------------------</span> <br /> 
   <?php //print_r($branch_acc_info);
   if (!empty($branch_acc_info)) :
   for ($i = 0; $i < count($branch_acc_info); $i++) 
   : ?>
	<span style="float:left; width:100px; font-weight:bold;"> Branch </span>         :  <?php echo $branch_acc_info[$i]->branch_name; ?><br/>
    <?php
	
	?>
	<span style="float:left; width:100px; font-weight:bold;"> Balance  </span>         :  <?php if($branch_acc_info[$i]->balance_credit != '')
	{ echo $branch_acc_info[$i]->balance_credit;  } else { echo '0 USD'; }?><br/>
	<span style="float:left; width:100px; font-weight:bold;"> Last Credit </span>         :  <?php if($branch_acc_info[$i]->balance_credit != '') { echo $branch_acc_info[$i]->last_credit;  } else { echo '0 USD'; }?><br/>
    <span style="float:left; width:100px; font-weight:bold;"> ---------------------------------</span> <br /> 
   
   <?php endfor;
   endif;
	//print_r($branch_acc_info);
   ?>
   <!-- <span style="float:left; width:100px; font-weight:bold;"> Time Period</span>      : Aug 21, 2012 -->
   </div>
        </div>
  	</div>
    <?php
  }
  ?>
</div>

<div>
    <div class="b2b-leftdiv-toptit"><span>Notice Board</span></div>
  	<div class="b2b_left-secbox">
  		<div style="width:200px; margin:0 auto;">
        	<!--<ul class="b2b-left-list-notice"  style="margin-left:10px;">
            	<li>Lowest price: Many of our room rates are the best prices you will find anywhere</li>
                <li>Secure booking (via SSL system)</li>
                <li>Great choice of hotels </li>
                <li>Simply structured content</li>
            </ul>-->
            <marquee style="position:relative; top:0px; z-index:0;" direction="up" onmouseover="this.stop();" onmouseout="this.start();" behavior="scroll" scrollamount="3">
          
            
            <?php 
			if(!empty($agent_offers[0]->offer_content))
			   
				echo '<hr />';
			
			for($i=0;$i<count($agent_offers);$i++)
			{
				echo html_entity_decode($agent_offers[$i]->offer_content);
				echo '<hr />';
			}
			?>
			
			
       		</marquee>
        </div>
  	</div>
</div>

<div>
    <div class="b2b-leftdiv-toptit"><span>Booking Information</span></div>
  	<div class="b2b_left-secbox">
  		<div style="width:220px; margin:0 auto;">
        	<ul class="b2b-left-list" style="text-align:left; padding-top:15px;">
            	<li style="text-align:left"><span style="position:relative; top:5px; padding-right:5px;"><img src="<?php echo WEB_DIR; ?>images/b2b-booking-icon1.png" border="0" width="30" /></span><a href="<?php echo WEB_URL.'b2b/my_booking_confirm'; ?>" >Confirmed Bookings</a></li>
                <li  style="text-align:left"><span style="position:relative; top:5px; padding-right:5px;"><img src="<?php echo WEB_DIR; ?>images/b2b-booking-icon.png" border="0"  width="30"/></span> &nbsp;<a href="<?php echo WEB_URL.'b2b/my_booking_cancel'; ?>" >Cancelled Bookings</a></li>
                <li  style="text-align:left"><span style="position:relative; top:5px; padding-right:5px;"><img src="<?php echo WEB_DIR; ?>images/b2b-booking-icon3.png" border="0" width="30"/> </span> <a href="<?php echo WEB_URL.'b2b/my_booking'; ?>" >Search Bookings</a></li>
            </ul>
        </div>
  	</div>
</div>

  </div>
  
    <div class="b2b-mainbody">
   
    <div>
    <div class="hotelnames" style="min-height:329px; width:716px;">
    
   		<!--<div class="right-hotel-name">Youngor Central Suzhou</div>-->
        <table width="100%" border="0" cellspacing="7" cellpadding="3" class="r-hoteldeta">
          <tr>
          	<td colspan="2" class="right-hotel-name" style="font-size:26px; color:#243419; padding-top:0px; padding-bottom:15px">Hotel Search</td>
          </tr>
          <tr>
          	<td colspan="2" class="b2b-subtitle"><strong>Select Cities</strong></td>
          </tr>
          <tr>
            <td colspan="2">
            	<div style="width:650px; margin:0 auto">
                	
                    <div style="float:left; width:660px;">
                    <?php
					$agent_id = $this->session->userdata('agent_id');	
					$agent_type = $this->session->userdata('agent_type');	
					$branch_id = $this->session->userdata('branch_id');	
						$parent_agent = 0;
						//if (!empty($agent_id)) {
						if ($agent_type == 2) {
							$parent_agent = $agent_id;
						} else {
							$parent_agent = $agent_id = $this->session->userdata('parent_id');
						}
		
					$agentTopCities = $this->B2b_Model->getAgentTopCities($parent_agent);
					if($agentTopCities!='')
					{
			for ($i = 0; $i < count($agentTopCities); $i++) : ?>
                    	<div class="b2b-cont-sele">
                        	<span><input name="top_city" type="radio" value="<?php echo $agentTopCities[$i]->city;?>" /></span>
                            <span><?php echo $agentTopCities[$i]->city_name;?> </span>
                        </div>
                        <?php endfor; }?>
                        
                     
                    </div>
                    
                </div>
            </td>
          </tr>
         
          <tr>
          	<td colspan="2">
             <script type="text/javascript" src="<?php print WEB_DIR; ?>autofill/js/bsn.AutoSuggest_c_2.0.js"></script>
          <link rel="stylesheet" href="<?php print WEB_DIR; ?>autofill/css/autosuggest_inquisitor.css" type="text/css" media="screen" charset="utf-8" /> 
			<form action="<?php echo WEB_URL; ?>b2b_hotel/search" method="post" name="form" onsubmit="javascript:return form_sub();">
            <table width="100%" border="0" cellpadding="5" cellspacing="5" style="font-size:13px; font-family:MAIAN">
            <tr>
            	<td>Other Cities:</td>
                <td colspan="4">
                 <script type="text/javascript" src="<?php print WEB_DIR; ?>autofill/js/bsn.AutoSuggest_c_2.0.js"></script>
          <link rel="stylesheet" href="<?php print WEB_DIR; ?>autofill/css/autosuggest_inquisitor.css" type="text/css" media="screen" charset="utf-8" />
          
                 <input type="hidden" id="testid" value="" style="font-size: 10px; width: 20px; z-index:99999; position:absolute;" disabled="disabled" />
              <input type="text" name="cityval" value="<?php echo $this->input->cookie('city'); ?>" id="testinput" class="b2b-txtbox" style="width:379px" />
              <span><font color="#990000"><strong><?php echo form_error('cityval'); ?></strong></font></span>
              <script type="text/javascript">
	var options = {
		script:"<?php print WEB_DIR; ?>test_hotel.php?json=true&",varname:"input",json:true,callback: function (obj) { document.getElementById('testid').value = obj.id; } };
	var as_json = new AutoSuggest('testinput', options);

</script> 
              </td>
            </tr>
                <tr>
                  <td>Category:</td>
                  <td colspan="4"><select name="star_rate" class="b2b-txtbox-lis">
                  <?php $st = $this->input->cookie('star_rate'); ?>
                  
               
                  <?php if($st=='') { ?>
                  <option value="all" selected="selected">All</option>
                  <?php } else { ?>
                  <option value="all">All</option>
                  <?php } ?>
                  
                  <?php if($st==1) { ?>
                  <option value="1" selected="selected">1 Star</option>
                  <?php } else { ?>
                  <option value="1">1 Star</option>
                  <?php } ?>
                  
                
                  <?php if($st==2) { ?>
                  <option value="2" selected="selected">2 Star</option>
                  <?php } else { ?>
                  <option value="2">2 Star</option>
                  <?php } ?>
                  
              
                  <?php if($st==3) { ?>
                  <option value="3" selected="selected">3 Star</option>
                  <?php } else { ?>
                  <option value="3">3 Star</option>
                  <?php } ?>
                  
                  
                  <?php if($st==4) { ?>
                  <option value="4" selected="selected">4 Star</option>
                  <?php } else { ?>
                  <option value="4">4 Star</option>
                  <?php } ?>
                  
             
                  <?php if($st==5) { ?>
                  <option value="5" selected="selected">5 Star</option>
                  <?php } else { ?>
                  <option value="5">5 Star</option>
                  <?php } ?>
                  
                  <?php if($st=='6') { ?>
                  <option value="6" selected="selected">Standard</option>
                  <?php } else { ?>
                  <option value="6">Standard</option>
                  <?php } ?>
                  
                  <?php if($st=='7') { ?>
                  <option value="7" selected="selected">Deluxe</option>
                  <?php } else { ?>
                  <option value="7">Deluxe</option>
                  <?php } ?>
                  
               
                 
                  </select></td>
                 <!-- <td>Clients' Nationality :</td>
                  <td>
				  <select  name="country"   class="b2b-txtbox-lis">
                      <option value="<?php echo $this->session->userdata('country'); ?>"><?php echo $this->session->userdata('country'); ?></option>
                      <?php
                        $country = $this->B2b_Model->country_list();
						
						 for($iii=0;$iii<count($country);$iii++)
		  					{
							?>
                            <option  value="<?php  echo $country[$iii]->name;  ?>"  ><?php  echo $country[$iii]->name;  ?></option>
                            <?php	
							}
                      ?>
                      </select>
				 </td>-->
                </tr>
                <tr>
                  <td style="width:100px;">Check-in Date:</td>
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
			?>
                  <td><input  value="<?php echo $current_dte; ?>" name="sd" id="datepicker"  onchange="javascript:return check_night_valued(this.value)"    type="text" class="b2b-txtbox"  style=" background-image: url('<?php echo WEB_DIR; ?>images/b2b-calicon.png');   background-repeat: no-repeat;  background-position: right center; width:150px;" /></td>

                  
                  <td colspan="2"  style="width:500px;"> Nights <span id="night_ajax"> <select style="width:50px"  class="b2b-txtbox-lis" onchange="javascript:return  check_date_valued(this.value)" name="night" >
             <?php
             for($i=1;$i< 32; $i++)
			 {
				 echo '<option value="'.$i.'">'.$i.'</option>';
			 }
			 ?></select>  </span>&nbsp;&nbsp;&nbsp;&nbsp;
			 Check out Date:</td>
                  <td id="datepicker1_ajax"><input  value="<?php echo $next_dte; ?>" name="ed" id="datepicker1" onchange="javascript:return check_night_valued(this.value)"    type="text" class="b2b-txtbox" style=" background-image: url('<?php echo WEB_DIR; ?>images/b2b-calicon.png');   background-repeat: no-repeat;  background-position: right center; width:150px;" /></td>
                </tr>
                <tr>
                  <td>Room Count :</td>
                  <script type="text/javascript">
function display_adult_count(value)
{
	alert(value);
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
                  <td colspan="2">
                 <select name="room_count" onChange="display_adult_count(this.value)"  class="b2b-txtbox-lis">
                 
                <?php
				$room_count = $this->input->cookie('room_count');
				
				$adult_o = explode("||",$this->input->cookie('org_adult'));
				$child_o = explode("||",$this->input->cookie('org_child'));
				$child_ao = explode("||",$this->input->cookie('child_age'));
				?>
				<option value="1" <?php if($room_count==1) { ?>selected="selected" <?php } ?>>Room 1</option>
				<option value="2" <?php if($room_count==2) { ?>selected="selected" <?php } ?>>Room 2</option>
				<option value="3" <?php if($room_count==3) { ?>selected="selected" <?php } ?>>Room 3</option>
				<option value="4" <?php if($room_count==4) { ?>selected="selected" <?php } ?>>Room 4</option>
				<option value="5" <?php if($room_count==5) { ?>selected="selected" <?php } ?>>Room 5</option>
				<option value="6" <?php if($room_count==6) { ?>selected="selected" <?php } ?>>Room 6</option>
				<option value="7" <?php if($room_count==7) { ?>selected="selected" <?php } ?>>Room 7</option>
				<option value="8" <?php if($room_count==8) { ?>selected="selected" <?php } ?>>Room 8</option>
				<option value="9" <?php if($room_count==9) { ?>selected="selected" <?php } ?>>Room 9</option>
				<option value="10" <?php if($room_count==10) { ?>selected="selected" <?php } ?>>Room 10</option>
                 </select> </td>
                  <td>Hotel Name (Optional) :</td>
                  <td><input value="<?php echo $this->input->cookie('hotel_name'); ?>" name="hotel_name"  type="text" class="b2b-txtbox" /></td>
                </tr>
                <tr>
                  <td></td>
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
				<td width="200" style="border:0px #000 solid"  colspan="2">
                <?php if($room_count==1 || $room_count==2 || $room_count==3 || $room_count==4 || $room_count==5 || $room_count==6 || $room_count==7 || $room_count==8 || $room_count==9 || $room_count==10)
				{
				?>
                <div class="check_139" id="room1">
                <DIV class="check_139">
                <div class="wi40"  style="height: auto; margin-right:30px; float:left;">              
                  <p style="color:#000">ADULT</p>
                  <p>
                    <select name="adult[]" id="jumpMenu2" class="b2b-txtbox-lis_new_sort">
                      <?php $s_adult = $adult_o[0]; ?>
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
                <div class="wi40 padding_le ml10" style="float:right; position:relative; left:18px">
                  <p id="child_header" style="color:#000">CHILDREN</p>
                  <p>
                    <select name="child[]" id="inputfiled1_1"  class="b2b-txtbox-lis_new_sort"  onChange="display_child_count(this.value)">
                        <?php $s_child = $child_o[0]; ?>
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
                    <DIV class="check_149" id="age1">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 1</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" <?php if($child_ao[0]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
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
                    <div class="b2b-AGE_OF2">AGE OF CHILD 1</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
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
                    if($s_child  == 2 || $s_child  == 3 || $s_child  == 4 || $s_child  == 5 || $s_child  == 6)
                    {
                    ?>
                    <DIV class="check_149" id="age12" >
                    <div class="b2b-AGE_OF2">AGE OF CHILD 2</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" <?php if($child_ao[1]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
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
                    <DIV class="check_149" id="age12" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 2</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
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
                    <DIV class="check_149" id="age13" >
                    <div class="b2b-AGE_OF2">AGE OF CHILD 3</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" <?php if($child_ao[2]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
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
                    <DIV class="check_149" id="age13" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 3</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
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
                    <DIV class="check_149" id="age14" >
                    <div class="b2b-AGE_OF2">AGE OF CHILD 4</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" <?php if($child_ao[3]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
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
                    <DIV class="check_149" id="age14" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 4</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
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
                    <DIV class="check_149" id="age15" >
                    <div class="b2b-AGE_OF2">AGE OF CHILD 5</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" <?php if($child_ao[4]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
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
					<DIV class="check_149" id="age15" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 5</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
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
                    <DIV class="check_149" id="age16" >
                    <div class="b2b-AGE_OF2">AGE OF CHILD 6</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" <?php if($child_ao[5]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
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
					<DIV class="check_149" id="age16" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 6</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
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
				<div class="check_139" id="room1">
                <DIV class="check_139">
                <div class="wi40" style="height: auto; margin-right:30px; float:left;">              
                  <p style="color:#000">ADULT</p>
                  <p>
                    <select name="adult[]" id="jumpMenu2" class="b2b-txtbox-lis_new_sort">
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
                <div class="wi40 padding_le ml10" style="float:right; position:relative; left:18px">
                  <p id="child_header" style="color:#000">CHILDREN</p>
                  <p>
                    <select name="child[]" id="inputfiled1_1"  class="b2b-txtbox-lis_new_sort"  onChange="display_child_count(this.value)">
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
                    <div class="b2b-AGE_OF2">AGE OF CHILD 1</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php }
                        ?>
                        </select>
                      </p>
                    </div>
                    </DIV>
              		
                    <DIV class="check_149" id="age12" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 2</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php }
                        ?>
                        </select>
                      </p>
                    </div>
                    </DIV>

                    <DIV class="check_149" id="age13" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 3</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php }
                        ?>
                        </select>
                      </p>
                    </div>
                    </DIV>

                    <DIV class="check_149" id="age14" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 4</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php }
                        ?>
                        </select>
                      </p>
                    </div>
                    </DIV>
                    
					<DIV class="check_149" id="age15" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 5</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php }
                        ?>
                        </select>
                      </p>
                    </div>
                    </DIV>

					<DIV class="check_149" id="age16" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 6</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
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

                <?php if($room_count==2 || $room_count==3 || $room_count==4 || $room_count==5 || $room_count==6 || $room_count==7 || $room_count==8 || $room_count==9 || $room_count==10)
				{
				?>
                <div class="check_139" id="room2">
                <DIV class="check_139">
                <div class="wi40"  style="height: auto; margin-right:30px; float:left;">              
                  <p style="color:#000">ADULT</p>
                  <p>
                    <select name="adult[]" id="jumpMenu2" class="b2b-txtbox-lis_new_sort">
                      <?php $s_adult1 = $adult_o[1]; ?>
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
                <div class="wi40 padding_le ml10" style="float:right; position:relative; left:18px">
                  <p id="child_header" style="color:#000">CHILDREN</p>
                  <p>
                    <select name="child[]" id="inputfiled1_1"  class="b2b-txtbox-lis_new_sort"  onChange="display_child_count1(this.value)">
                        <?php $s_child1 = $child_o[1]; ?>
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
                    <div class="b2b-AGE_OF2">AGE OF CHILD 1</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" <?php if($child_ao[6]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
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
                    <DIV class="check_149" id="age2" style="display:none;" >
                    <div class="b2b-AGE_OF2">AGE OF CHILD 1</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
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
                    if($s_child1  == 2 || $s_child1  == 3 || $s_child1  == 4 || $s_child1  == 5 || $s_child1  == 6)
                    {
                    ?>
                    <DIV class="check_149" id="age22" >
                    <div class="b2b-AGE_OF2">AGE OF CHILD 2</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" <?php if($child_ao[7]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
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
                    <DIV class="check_149" id="age22" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 2</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
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
                    <DIV class="check_149" id="age23" >
                    <div class="b2b-AGE_OF2">AGE OF CHILD 3</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" <?php if($child_ao[8]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
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
                    <DIV class="check_149" id="age23" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 3</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
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
                    <DIV class="check_149" id="age24" >
                    <div class="b2b-AGE_OF2">AGE OF CHILD 4</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" <?php if($child_ao[9]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
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
                    <DIV class="check_149" id="age24" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 4</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
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
                    <DIV class="check_149" id="age25" >
                    <div class="b2b-AGE_OF2">AGE OF CHILD 5</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" <?php if($child_ao[10]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
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
                    <DIV class="check_149" id="age25" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 5</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
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
                    <DIV class="check_149" id="age26" >
                    <div class="b2b-AGE_OF2">AGE OF CHILD 6</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" <?php if($child_ao[11]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
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
                    <DIV class="check_149" id="age26" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 6</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" ><?php echo $i; ?></option>
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
				<div class="check_139" id="room2" style="display:none;">
                <DIV class="check_139">
                <div class="wi40"  style="height: auto; margin-right:30px; float:left;">              
                  <p style="color:#000">ADULT</p>
                  <p>
                    <select name="adult[]" id="jumpMenu2" class="b2b-txtbox-lis_new_sort">
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
                <div class="wi40 padding_le ml10" style="float:right; position:relative; left:18px">
                  <p id="child_header" style="color:#000">CHILDREN</p>
                  <p>
                    <select name="child[]" id="inputfiled1_1"  class="b2b-txtbox-lis_new_sort"  onChange="display_child_count1(this.value)">
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
                   
                    <DIV class="check_149" id="age2" style="display:none;" >
                    <div class="b2b-AGE_OF2">AGE OF CHILD 1</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php }
                        ?>
                        </select>
                      </p>
                    </div>
                    </DIV>
					
                    <DIV class="check_149" id="age22" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 2</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php }
                        ?>
                        </select>
                      </p>
                    </div>
                    </DIV>

                    <DIV class="check_149" id="age23" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 3</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php }
                        ?>
                        </select>
                      </p>
                    </div>
                    </DIV>
                    
                    <DIV class="check_149" id="age24" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 4</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php }
                        ?>
                        </select>
                      </p>
                    </div>
                    </DIV>
					
                    <DIV class="check_149" id="age25" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 5</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php }
                        ?>
                        </select>
                      </p>
                    </div>
                    </DIV>

                    <DIV class="check_149" id="age26" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 6</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" ><?php echo $i; ?></option>
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
                
                <?php if($room_count==3 || $room_count==4 || $room_count==5 || $room_count==6 || $room_count==7 || $room_count==8 || $room_count==9 || $room_count==10)
				{
				?>
                <div class="check_139" id="room3">
                <DIV class="check_139">
                <div class="wi40"  style="height: auto; margin-right:30px; float:left;">              
                  <p style="color:#000">ADULT</p>
                  <p>
                    <select name="adult[]" id="jumpMenu2" class="b2b-txtbox-lis_new_sort">
                      <?php $s_adult2 = $adult_o[2]; ?>
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
                <div class="wi40 padding_le ml10" style="float:right; position:relative; left:18px">
                  <p id="child_header" style="color:#000">CHILDREN</p>
                  <p>
                    <select name="child[]" id="inputfiled1_1"  class="b2b-txtbox-lis_new_sort"  onChange="display_child_count2(this.value)">
                        <?php $s_child2 = $child_o[2]; ?>
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
                    <div class="b2b-AGE_OF2">AGE OF CHILD 1</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" <?php if($child_ao[12]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
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
                    <div class="b2b-AGE_OF2">AGE OF CHILD 1</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" ><?php echo $i; ?></option>
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
                    if($s_child2  == 2 || $s_child2  == 3 || $s_child2  == 4 || $s_child2  == 5 || $s_child2  == 6)
                    {
                    ?>
                    <DIV class="check_149" id="age32" >
                    <div class="b2b-AGE_OF2">AGE OF CHILD 2</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" <?php if($child_ao[13]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
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
                    <DIV class="check_149" id="age32" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 2</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
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
                    <DIV class="check_149" id="age33" >
                    <div class="b2b-AGE_OF2">AGE OF CHILD 3</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" <?php if($child_ao[14]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
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
                    <DIV class="check_149" id="age33" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 3</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" ><?php echo $i; ?></option>
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
                    <DIV class="check_149" id="age34" >
                    <div class="b2b-AGE_OF2">AGE OF CHILD 4</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" <?php if($child_ao[15]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
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
                    <DIV class="check_149" id="age34" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 4</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
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
                    <DIV class="check_149" id="age35" >
                    <div class="b2b-AGE_OF2">AGE OF CHILD 5</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" <?php if($child_ao[16]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
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
                    <DIV class="check_149" id="age35" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 5</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" ><?php echo $i; ?></option>
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
                    <DIV class="check_149" id="age36" >
                    <div class="b2b-AGE_OF2">AGE OF CHILD 6</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" <?php if($child_ao[17]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
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
                    <DIV class="check_149" id="age36" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 6</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
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
				<div class="check_139" id="room3" style="display:none;">
                <DIV class="check_139">
                <div class="wi40"  style="height: auto; margin-right:30px; float:left;">              
                  <p style="color:#000">ADULT</p>
                  <p>
                    <select name="adult[]" id="jumpMenu2" class="b2b-txtbox-lis_new_sort">
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
                <div class="wi40 padding_le ml10" style="float:right; position:relative; left:18px">
                  <p id="child_header" style="color:#000">CHILDREN</p>
                  <p>
                    <select name="child[]" id="inputfiled1_1"  class="b2b-txtbox-lis_new_sort"  onChange="display_child_count2(this.value)">
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
                    <div class="b2b-AGE_OF2">AGE OF CHILD 1</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" ><?php echo $i; ?></option>
                        <?php }
                        ?>
                        </select>
                      </p>
                    </div>
                    </DIV>
                    
                    <DIV class="check_149" id="age32" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 2</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php }
                        ?>
                        </select>
                      </p>
                    </div>
                    </DIV>
                    
                    <DIV class="check_149" id="age33" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 3</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" ><?php echo $i; ?></option>
                        <?php }
                        ?>
                        </select>
                      </p>
                    </div>
                    </DIV>
                    
                    <DIV class="check_149" id="age34" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 4</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php }
                        ?>
                        </select>
                      </p>
                    </div>
                    </DIV>
                    
                    <DIV class="check_149" id="age35" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 5</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" ><?php echo $i; ?></option>
                        <?php }
                        ?>
                        </select>
                      </p>
                    </div>
                    </DIV>
                    
                    <DIV class="check_149" id="age36" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 6</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
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

                <?php if($room_count==4 || $room_count==5 || $room_count==6 || $room_count==7 || $room_count==8 || $room_count==9 || $room_count==10)
				{
				?>
                <div class="check_139" id="room4">
                <DIV class="check_139">
                <div class="wi40"  style="height: auto; margin-right:30px; float:left;">              
                  <p style="color:#000">ADULT</p>
                  <p>
                    <select name="adult[]" id="jumpMenu2" class="b2b-txtbox-lis_new_sort">
                      <?php $s_adult3 = $adult_o[3]; ?>
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
                <div class="wi40 padding_le ml10" style="float:right; position:relative; left:18px">
                  <p id="child_header" style="color:#000">CHILDREN</p>
                  <p>
                    <select name="child[]" id="inputfiled1_1"  class="b2b-txtbox-lis_new_sort"  onChange="display_child_count3(this.value)">
                        <?php $s_child3 = $child_o[3]; ?>
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
                    <div class="b2b-AGE_OF2">AGE OF CHILD 1</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" <?php if($child_ao[18]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
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
                    <div class="b2b-AGE_OF2">AGE OF CHILD 1</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
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
                    if($s_child3  == 2 || $s_child3  == 3 || $s_child3  == 4 || $s_child3  == 5 || $s_child3  == 6)
                    {
                    ?>
                    <DIV class="check_149" id="age42" >
                    <div class="b2b-AGE_OF2">AGE OF CHILD 2</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" <?php if($child_ao[19]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
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
                    <DIV class="check_149" id="age42" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 2</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" <?php if($child_ao[0]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
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
                    <DIV class="check_149" id="age43" >
                    <div class="b2b-AGE_OF2">AGE OF CHILD 3</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" <?php if($child_ao[20]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
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
                    <DIV class="check_149" id="age43" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 3</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
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
                    <DIV class="check_149" id="age44" >
                    <div class="b2b-AGE_OF2">AGE OF CHILD 4</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" <?php if($child_ao[21]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
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
                    <DIV class="check_149" id="age44" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 4</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
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
                    <DIV class="check_149" id="age45" >
                    <div class="b2b-AGE_OF2">AGE OF CHILD 5</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" <?php if($child_ao[22]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
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
                    <DIV class="check_149" id="age45" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 5</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" ><?php echo $i; ?></option>
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
                    <DIV class="check_149" id="age46" >
                    <div class="b2b-AGE_OF2">AGE OF CHILD 6</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" <?php if($child_ao[23]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
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
                    <DIV class="check_149" id="age46" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 6</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
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
                <div class="check_139" id="room4" style="display:none;">
                <DIV class="check_139">
                <div class="wi40"  style="height: auto; margin-right:30px; float:left;">              
                  <p style="color:#000">ADULT</p>
                  <p>
                    <select name="adult[]" id="jumpMenu2" class="b2b-txtbox-lis_new_sort">
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
                <div class="wi40 padding_le ml10" style="float:right; position:relative; left:18px">
                  <p id="child_header" style="color:#000">CHILDREN</p>
                  <p>
                    <select name="child[]" id="inputfiled1_1"  class="b2b-txtbox-lis_new_sort"  onChange="display_child_count3(this.value)">
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
                    <div class="b2b-AGE_OF2">AGE OF CHILD 1</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php }
                        ?>
                        </select>
                      </p>
                    </div>
                    </DIV>

                    <DIV class="check_149" id="age42" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 2</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" <?php if($child_ao[0]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
                        <?php }
                        ?>
                        </select>
                      </p>
                    </div>
                    </DIV>

                    <DIV class="check_149" id="age43" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 3</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php }
                        ?>
                        </select>
                      </p>
                    </div>
                    </DIV>

                    <DIV class="check_149" id="age44" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 4</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php }
                        ?>
                        </select>
                      </p>
                    </div>
                    </DIV>

                    <DIV class="check_149" id="age45" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 5</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" ><?php echo $i; ?></option>
                        <?php }
                        ?>
                        </select>
                      </p>
                    </div>
                    </DIV>

                    <DIV class="check_149" id="age46" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 6</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
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
                
                <?php if($room_count==5 || $room_count==6 || $room_count==7 || $room_count==8 || $room_count==9 || $room_count==10)
				{
				?>
                <div class="check_139" id="room5">
                <DIV class="check_139">
                <div class="wi40"  style="height: auto; margin-right:30px; float:left;">              
                  <p style="color:#000">ADULT</p>
                  <p>
                    <select name="adult[]" id="jumpMenu2" class="b2b-txtbox-lis_new_sort">
                      <?php $s_adult4 = $adult_o[4]; ?>
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
                <div class="wi40 padding_le ml10" style="float:right; position:relative; left:18px">
                  <p id="child_header" style="color:#000">CHILDREN</p>
                  <p>
                    <select name="child[]" id="inputfiled1_1"  class="b2b-txtbox-lis_new_sort"  onChange="display_child_count4(this.value)">
                        <?php $s_child4 = $child_o[4]; ?>
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
                    <div class="b2b-AGE_OF2">AGE OF CHILD 1</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" <?php if($child_ao[24]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
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
                    <div class="b2b-AGE_OF2">AGE OF CHILD 1</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
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
                    if($s_child4  == 2 || $s_child4  == 3 || $s_child4  == 4 || $s_child4  == 5 || $s_child4  == 6)
                    {
                    ?>
                    <DIV class="check_149" id="age52" >
                    <div class="b2b-AGE_OF2">AGE OF CHILD 2</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" <?php if($child_ao[25]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
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
                    <DIV class="check_149" id="age52" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 2</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
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
                    <DIV class="check_149" id="age53" >
                    <div class="b2b-AGE_OF2">AGE OF CHILD 3</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" <?php if($child_ao[26]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
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
                    <DIV class="check_149" id="age53" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 3</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
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
                    <DIV class="check_149" id="age54" >
                    <div class="b2b-AGE_OF2">AGE OF CHILD 4</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" <?php if($child_ao[27]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
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
                    <DIV class="check_149" id="age54" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 4</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
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
                    <DIV class="check_149" id="age55" >
                    <div class="b2b-AGE_OF2">AGE OF CHILD 5</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" <?php if($child_ao[28]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
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
                    <DIV class="check_149" id="age55" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 5</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
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
                    <DIV class="check_149" id="age56" >
                    <div class="b2b-AGE_OF2">AGE OF CHILD 6</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" <?php if($child_ao[29]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
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
                    <DIV class="check_149" id="age56" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 6</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
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
                <div class="check_139" id="room5" style="display:none;">
                <DIV class="check_139">
                <div class="wi40"  style="height: auto; margin-right:30px; float:left;">              
                  <p style="color:#000">ADULT</p>
                  <p>
                    <select name="adult[]" id="jumpMenu2" class="b2b-txtbox-lis_new_sort">
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
                <div class="wi40 padding_le ml10" style="float:right; position:relative; left:18px">
                  <p id="child_header" style="color:#000">CHILDREN</p>
                  <p>
                    <select name="child[]" id="inputfiled1_1"  class="b2b-txtbox-lis_new_sort"  onChange="display_child_count4(this.value)">
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
                    <div class="b2b-AGE_OF2">AGE OF CHILD 1</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php }
                        ?>
                        </select>
                      </p>
                    </div>
                    </DIV>

                    <DIV class="check_149" id="age52" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 2</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php }
                        ?>
                        </select>
                      </p>
                    </div>
                    </DIV>

                    <DIV class="check_149" id="age53" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 3</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php }
                        ?>
                        </select>

                      </p>
                    </div>
                    </DIV>

                    <DIV class="check_149" id="age54" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 4</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php }
                        ?>
                        </select>
                      </p>
                    </div>
                    </DIV>

                    <DIV class="check_149" id="age55" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 5</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php }
                        ?>
                        </select>
                      </p>
                    </div>
                    </DIV>

                    <DIV class="check_149" id="age56" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 6</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
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
                
                <?php if($room_count==6 || $room_count==7 || $room_count==8 || $room_count==9 || $room_count==10)
				{
				?>
                <div class="check_139" id="room6">
                <DIV class="check_139">
                <div class="wi40"  style="height: auto; margin-right:30px; float:left;">              
                  <p style="color:#000">ADULT</p>
                  <p>
                    <select name="adult[]" id="jumpMenu2" class="b2b-txtbox-lis_new_sort">
                      <?php $s_adult5 = $adult_o[5]; ?>
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
                <div class="wi40 padding_le ml10" style="float:right; position:relative; left:18px">
                  <p id="child_header" style="color:#000">CHILDREN</p>
                  <p>
                    <select name="child[]" id="inputfiled1_1"  class="b2b-txtbox-lis_new_sort"  onChange="display_child_count5(this.value)">
                        <?php $s_child5 = $child_o[5]; ?>
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
                    <div class="b2b-AGE_OF2">AGE OF CHILD 1</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" <?php if($child_ao[30]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
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
                    <div class="b2b-AGE_OF2">AGE OF CHILD 1</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
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
                    if($s_child5  == 2 || $s_child5  == 3 || $s_child5  == 4 || $s_child5  == 5 || $s_child5  == 6)
                    {
                    ?>
                    <DIV class="check_149" id="age62" >
                    <div class="b2b-AGE_OF2">AGE OF CHILD 2</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" <?php if($child_ao[31]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
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
                    <DIV class="check_149" id="age62" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 2</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
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
                    <DIV class="check_149" id="age63" >
                    <div class="b2b-AGE_OF2">AGE OF CHILD 3</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" <?php if($child_ao[32]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
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
                    <DIV class="check_149" id="age63" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 3</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
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
                    <DIV class="check_149" id="age64" >
                    <div class="b2b-AGE_OF2">AGE OF CHILD 4</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" <?php if($child_ao[33]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
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
                    <DIV class="check_149" id="age64" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 4</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
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
                    <DIV class="check_149" id="age65" >
                    <div class="b2b-AGE_OF2">AGE OF CHILD 5</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" <?php if($child_ao[34]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
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
                    <DIV class="check_149" id="age65" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 5</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
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
                    <DIV class="check_149" id="age66" >
                    <div class="b2b-AGE_OF2">AGE OF CHILD 6</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" <?php if($child_ao[35]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
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
                    <DIV class="check_149" id="age66" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 6</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
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
                <div class="check_139" id="room6" style="display:none;">
                <DIV class="check_139">
                <div class="wi40"  style="height: auto; margin-right:30px; float:left;">              
                  <p style="color:#000">ADULT</p>
                  <p>
                    <select name="adult[]" id="jumpMenu2" class="b2b-txtbox-lis_new_sort">
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
                <div class="wi40 padding_le ml10" style="float:right; position:relative; left:18px">
                  <p id="child_header" style="color:#000">CHILDREN</p>
                  <p>
                    <select name="child[]" id="inputfiled1_1"  class="b2b-txtbox-lis_new_sort"  onChange="display_child_count5(this.value)">
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
                    <div class="b2b-AGE_OF2">AGE OF CHILD 1</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php }
                        ?>
                        </select>
                      </p>
                    </div>
                    </DIV>

                    <DIV class="check_149" id="age62" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 2</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php }
                        ?>
                        </select>
                      </p>
                    </div>
                    </DIV>

                    <DIV class="check_149" id="age63" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 3</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php }
                        ?>
                        </select>
                      </p>
                    </div>
                    </DIV>

                    <DIV class="check_149" id="age64" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 4</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php }
                        ?>
                        </select>
                      </p>
                    </div>
                    </DIV>

                    <DIV class="check_149" id="age65" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 5</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php }
                        ?>
                        </select>
                      </p>
                    </div>
                    </DIV>

                    <DIV class="check_149" id="age66" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 6</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
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
                
                <?php if($room_count==7 || $room_count==8 || $room_count==9 || $room_count==10)
				{
				?>
                <div class="check_139" id="room7">
                <DIV class="check_139">
                <div class="wi40"  style="height: auto; margin-right:30px; float:left;">              
                  <p style="color:#000">ADULT</p>
                  <p>
                    <select name="adult[]" id="jumpMenu2" class="b2b-txtbox-lis_new_sort">
                      <?php $s_adult6 = $adult_o[6]; ?>
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
                <div class="wi40 padding_le ml10" style="float:right; position:relative; left:18px">
                  <p id="child_header" style="color:#000">CHILDREN</p>
                  <p>
                    <select name="child[]" id="inputfiled1_1"  class="b2b-txtbox-lis_new_sort"  onChange="display_child_count6(this.value)">
                        <?php $s_child6 = $child_o[6]; ?>
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
                    <div class="b2b-AGE_OF2">AGE OF CHILD 1</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" <?php if($child_ao[36]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
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
                    <div class="b2b-AGE_OF2">AGE OF CHILD 1</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
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
                    if($s_child6  == 2 || $s_child6  == 3 || $s_child6  == 4 || $s_child6  == 5 || $s_child6  == 6)
                    {
                    ?>
                    <DIV class="check_149" id="age72" >
                    <div class="b2b-AGE_OF2">AGE OF CHILD 2</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" <?php if($child_ao[37]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
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
                    <DIV class="check_149" id="age72" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 2</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
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
                    <DIV class="check_149" id="age73" >
                    <div class="b2b-AGE_OF2">AGE OF CHILD 3</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" <?php if($child_ao[38]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
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
                    <DIV class="check_149" id="age73" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 3</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" ><?php echo $i; ?></option>
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
                    <DIV class="check_149" id="age74" >
                    <div class="b2b-AGE_OF2">AGE OF CHILD 4</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" <?php if($child_ao[39]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
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
                    <DIV class="check_149" id="age74" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 4</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" ><?php echo $i; ?></option>
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
                    <DIV class="check_149" id="age75" >
                    <div class="b2b-AGE_OF2">AGE OF CHILD 5</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" <?php if($child_ao[40]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
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
                    <DIV class="check_149" id="age75" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 5</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" ><?php echo $i; ?></option>
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
                    <DIV class="check_149" id="age76" >
                    <div class="b2b-AGE_OF2">AGE OF CHILD 6</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" <?php if($child_ao[41]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
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
                    <DIV class="check_149" id="age76" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 6</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
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
                <div class="check_139" id="room7" style="display:none;">
                <DIV class="check_139">
                <div class="wi40"  style="height: auto; margin-right:30px; float:left;">              
                  <p style="color:#000">ADULT</p>
                  <p>
                    <select name="adult[]" id="jumpMenu2" class="b2b-txtbox-lis_new_sort">
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
                <div class="wi40 padding_le ml10" style="float:right; position:relative; left:18px">
                  <p id="child_header" style="color:#000">CHILDREN</p>
                  <p>
                    <select name="child[]" id="inputfiled1_1"  class="b2b-txtbox-lis_new_sort"  onChange="display_child_count6(this.value)">
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
                    <div class="b2b-AGE_OF2">AGE OF CHILD 1</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php }
                        ?>
                        </select>
                      </p>
                    </div>
                    </DIV>

                    <DIV class="check_149" id="age72" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 2</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php }
                        ?>
                        </select>
                      </p>
                    </div>
                    </DIV>

                    <DIV class="check_149" id="age73" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 3</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" ><?php echo $i; ?></option>
                        <?php }
                        ?>
                        </select>
                      </p>
                    </div>
                    </DIV>

                    <DIV class="check_149" id="age74" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 4</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" ><?php echo $i; ?></option>
                        <?php }
                        ?>
                        </select>
                      </p>
                    </div>
                    </DIV>

                    <DIV class="check_149" id="age75" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 5</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" ><?php echo $i; ?></option>
                        <?php }
                        ?>
                        </select>
                      </p>
                    </div>
                    </DIV>

                    <DIV class="check_149" id="age76" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 6</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
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
                
                <?php if($room_count==8 || $room_count==9 || $room_count==10)
				{
				?>
                <div class="check_139" id="room8">
                <DIV class="check_139">
                <div class="wi40"  style="height: auto; margin-right:30px; float:left;">              
                  <p style="color:#000">ADULT</p>
                  <p>
                    <select name="adult[]" id="jumpMenu2" class="b2b-txtbox-lis_new_sort">
                      <?php $s_adult7 = $adult_o[7]; ?>
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
                <div class="wi40 padding_le ml10" style="float:right; position:relative; left:18px">
                  <p id="child_header" style="color:#000">CHILDREN</p>
                  <p>
                    <select name="child[]" id="inputfiled1_1"  class="b2b-txtbox-lis_new_sort"  onChange="display_child_count7(this.value)">
                        <?php $s_child7 = $child_o[7]; ?>
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
                    <div class="b2b-AGE_OF2">AGE OF CHILD 1</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" <?php if($child_ao[42]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
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
                    <div class="b2b-AGE_OF2">AGE OF CHILD 1</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
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
                    if($s_child7  == 2 || $s_child7  == 3 || $s_child7  == 4 || $s_child7  == 5 || $s_child7  == 6)
                    {
                    ?>
                    <DIV class="check_149" id="age82" >
                    <div class="b2b-AGE_OF2">AGE OF CHILD 2</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" <?php if($child_ao[43]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
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
                    <DIV class="check_149" id="age82" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 2</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
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
                    <DIV class="check_149" id="age83" >
                    <div class="b2b-AGE_OF2">AGE OF CHILD 3</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" <?php if($child_ao[44]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
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
                    <DIV class="check_149" id="age83" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 3</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
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
                    <DIV class="check_149" id="age84" >
                    <div class="b2b-AGE_OF2">AGE OF CHILD 4</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" <?php if($child_ao[45]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
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
                    <DIV class="check_149" id="age84" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 4</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
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
                    <DIV class="check_149" id="age85" >
                    <div class="b2b-AGE_OF2">AGE OF CHILD 5</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" <?php if($child_ao[46]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
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
                    <DIV class="check_149" id="age85" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 5</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
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
                    <DIV class="check_149" id="age86" >
                    <div class="b2b-AGE_OF2">AGE OF CHILD 6</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" <?php if($child_ao[47]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
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
                    <DIV class="check_149" id="age86" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 6</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
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
                <div class="check_139" id="room8" style="display:none;">
                <DIV class="check_139">
                <div class="wi40"  style="height: auto; margin-right:30px; float:left;">              
                  <p style="color:#000">ADULT</p>
                  <p>
                    <select name="adult[]" id="jumpMenu2" class="b2b-txtbox-lis_new_sort">
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
                <div class="wi40 padding_le ml10" style="float:right; position:relative; left:18px">
                  <p id="child_header" style="color:#000">CHILDREN</p>
                  <p>
                    <select name="child[]" id="inputfiled1_1"  class="b2b-txtbox-lis_new_sort"  onChange="display_child_count7(this.value)">
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
                    <div class="b2b-AGE_OF2">AGE OF CHILD 1</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php }
                        ?>
                        </select>
                      </p>
                    </div>
                    </DIV>

                    <DIV class="check_149" id="age82" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 2</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php }
                        ?>
                        </select>
                      </p>
                    </div>
                    </DIV>

                    <DIV class="check_149" id="age83" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 3</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php }
                        ?>
                        </select>
                      </p>
                    </div>
                    </DIV>

                    <DIV class="check_149" id="age84" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 4</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php }
                        ?>
                        </select>
                      </p>
                    </div>
                    </DIV>

                    <DIV class="check_149" id="age85" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 5</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php }
                        ?>
                        </select>
                      </p>
                    </div>
                    </DIV>

                    <DIV class="check_149" id="age86" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 6</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
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
                
                <?php if($room_count==9 || $room_count==10)
				{
				?>
                <div class="check_139" id="room9">
                <DIV class="check_139">
                <div class="wi40"  style="height: auto; margin-right:30px; float:left;">              
                  <p style="color:#000">ADULT</p>
                  <p>
                    <select name="adult[]" id="jumpMenu2" class="b2b-txtbox-lis_new_sort">
                      <?php $s_adult8 = $adult_o[8]; ?>
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
                <div class="wi40 padding_le ml10" style="float:right; position:relative; left:18px">
                  <p id="child_header" style="color:#000">CHILDREN</p>
                  <p>
                    <select name="child[]" id="inputfiled1_1"  class="b2b-txtbox-lis_new_sort"  onChange="display_child_count8(this.value)">
                        <?php $s_child8 = $child_o[8]; ?>
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
                    <div class="b2b-AGE_OF2">AGE OF CHILD 1</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" <?php if($child_ao[48]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
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
                    <div class="b2b-AGE_OF2">AGE OF CHILD 1</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
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
                    if($s_child8  == 2 || $s_child8  == 3 || $s_child8  == 4 || $s_child8  == 5 || $s_child8  == 6)
                    {
                    ?>
                    <DIV class="check_149" id="age92" >
                    <div class="b2b-AGE_OF2">AGE OF CHILD 2</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" <?php if($child_ao[49]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
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
                    <DIV class="check_149" id="age92" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 2</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
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
                    <DIV class="check_149" id="age93" >
                    <div class="b2b-AGE_OF2">AGE OF CHILD 3</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" <?php if($child_ao[50]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
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
                    <DIV class="check_149" id="age93" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 3</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
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
                    <DIV class="check_149" id="age94" >
                    <div class="b2b-AGE_OF2">AGE OF CHILD 4</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" <?php if($child_ao[51]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
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
                    <DIV class="check_149" id="age94" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 4</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
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
                    <DIV class="check_149" id="age95" >
                    <div class="b2b-AGE_OF2">AGE OF CHILD 5</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" <?php if($child_ao[52]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
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
                    <DIV class="check_149" id="age95" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 5</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
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
                    <DIV class="check_149" id="age96" >
                    <div class="b2b-AGE_OF2">AGE OF CHILD 6</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" <?php if($child_ao[53]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
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
                    <DIV class="check_149" id="age96" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 6</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" ><?php echo $i; ?></option>
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
                <div class="check_139" id="room9" style="display:none;">
                <DIV class="check_139">
                <div class="wi40"  style="height: auto; margin-right:30px; float:left;">              
                  <p style="color:#000">ADULT</p>
                  <p>
                    <select name="adult[]" id="jumpMenu2" class="b2b-txtbox-lis_new_sort">
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
                <div class="wi40 padding_le ml10" style="float:right; position:relative; left:18px">
                  <p id="child_header" style="color:#000">CHILDREN</p>
                  <p>
                    <select name="child[]" id="inputfiled1_1"  class="b2b-txtbox-lis_new_sort"  onChange="display_child_count8(this.value)">
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
                    <div class="b2b-AGE_OF2">AGE OF CHILD 1</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php }
                        ?>
                        </select>
                      </p>
                    </div>
                    </DIV>

                    <DIV class="check_149" id="age92" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 2</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php }
                        ?>
                        </select>
                      </p>
                    </div>
                    </DIV>

                    <DIV class="check_149" id="age93" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 3</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php }
                        ?>
                        </select>
                      </p>
                    </div>
                    </DIV>

                    <DIV class="check_149" id="age94" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 4</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php }
                        ?>
                        </select>
                      </p>
                    </div>
                    </DIV>

                    <DIV class="check_149" id="age95" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 5</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php }
                        ?>
                        </select>
                      </p>
                    </div>
                    </DIV>

                    <DIV class="check_149" id="age96" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 6</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" ><?php echo $i; ?></option>
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
                
                <?php if($room_count==10)
				{
				?>
                <div class="check_139" id="room10">
                <DIV class="check_139">
                <div class="wi40"  style="height: auto; margin-right:30px; float:left;">              
                  <p style="color:#000">ADULT</p>
                  <p>
                    <select name="adult[]" id="jumpMenu2" class="b2b-txtbox-lis_new_sort">
                      <?php $s_adult9 = $adult_o[9]; ?>
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
                <div class="wi40 padding_le ml10" style="float:right; position:relative; left:18px">
                  <p id="child_header" style="color:#000">CHILDREN</p>
                  <p>
                    <select name="child[]" id="inputfiled1_1"  class="b2b-txtbox-lis_new_sort"  onChange="display_child_count9(this.value)">
                        <?php $s_child9 = $child_o[9]; ?>
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
                    <div class="b2b-AGE_OF2">AGE OF CHILD 1</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" <?php if($child_ao[54]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
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
                    <div class="b2b-AGE_OF2">AGE OF CHILD 1</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
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
                    if($s_child9  == 2 || $s_child9  == 3 || $s_child9  == 4 || $s_child9  == 5 || $s_child9  == 6)
                    {
                    ?>
                    <DIV class="check_149" id="age102" >
                    <div class="b2b-AGE_OF2">AGE OF CHILD 2</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" <?php if($child_ao[55]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
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
                    <DIV class="check_149" id="age102" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 2</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
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
                    <DIV class="check_149" id="age103" >
                    <div class="b2b-AGE_OF2">AGE OF CHILD 3</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" <?php if($child_ao[56]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
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
                    <DIV class="check_149" id="age103" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 3</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
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
                    <DIV class="check_149" id="age104" >
                    <div class="b2b-AGE_OF2">AGE OF CHILD 4</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" <?php if($child_ao[57]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
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
                    <DIV class="check_149" id="age104" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 4</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
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
                    <DIV class="check_149" id="age105" >
                    <div class="b2b-AGE_OF2">AGE OF CHILD 5</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" <?php if($child_ao[58]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
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
                    <DIV class="check_149" id="age105" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 5</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
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
                    <DIV class="check_149" id="age106" >
                    <div class="b2b-AGE_OF2">AGE OF CHILD 6</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>" <?php if($child_ao[59]==$i) { ?> selected="selected" <?php } ?> ><?php echo $i; ?></option>
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
                    <DIV class="check_149" id="age106" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 6</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
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
                <div class="check_139" id="room10" style="display:none;">
                <DIV class="check_139">
                <div class="wi40"  style="height: auto; margin-right:30px; float:left;">              
                  <p style="color:#000">ADULT</p>
                  <p>
                    <select name="adult[]" id="jumpMenu2" class="b2b-txtbox-lis_new_sort">
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
                <div class="wi40 padding_le ml10" style="float:right; position:relative; left:18px">
                  <p id="child_header" style="color:#000">CHILDREN</p>
                  <p>
                    <select name="child[]" id="inputfiled1_1"  class="b2b-txtbox-lis_new_sort"  onChange="display_child_count9(this.value)">
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
                    <div class="b2b-AGE_OF2">AGE OF CHILD 1</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php }
                        ?>
                        </select>
                      </p>
                    </div>
                    </DIV>

                    <DIV class="check_149" id="age102" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 2</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php }
                        ?>
                        </select>
                      </p>
                    </div>
                    </DIV>

                    <DIV class="check_149" id="age103" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 3</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php }
                        ?>
                        </select>
                      </p>
                    </div>
                    </DIV>

                    <DIV class="check_149" id="age104" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 4</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php }
                        ?>
                        </select>
                      </p>
                    </div>
                    </DIV>

                    <DIV class="check_149" id="age105" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 5</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
                        <?php for($i=0;$i< 13 ;$i++)
                        { ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php }
                        ?>
                        </select>
                      </p>
                    </div>
                    </DIV>

                    <DIV class="check_149" id="age106" style="display:none;">
                    <div class="b2b-AGE_OF2">AGE OF CHILD 6</div>
                    <div class="wi40 padding_le">
                      <p></p>
                      <p>
                        <select name="child_age[]" id="jumpMenu2"  class="b2b-txtbox-lis_new_sort"   >
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
                </td>
                <td align="left" valign="top"colspan="2"><input type="checkbox" />&nbsp;
                  Available Hotels Only</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                 <tr>
                  <td colspan="3" align="right">&nbsp;</td>
                  <td align="left"><input type="image" src="<?php echo WEB_DIR; ?>images/b2b-search-hot-bu.png" style="position:relative; left:-23px"  border="0" /></td>
                </tr>
              </table>
              </form>
              </td>
          </tr>
          
        </table>
      
    </div>
    
    
    <table align="right" width="722" border="0" cellspacing="0" cellpadding="0" style="padding-top:25px">
      
      <tr>
        <td width="15" align="left" class="b2b-ratingslid-left"> </td>
        <td class="b2b-ratingslid" style="width:692px">
        	<span><img src="<?php echo WEB_DIR; ?>images/b2b-last-new.png" border="0" style="position:relative; top:-8px; left:-15px; z-index:1" /></span>
           <span><marquee style="position:relative; top:-41px; z-index:0" onmouseover="this.stop();" onmouseout="this.start();"><?php echo html_entity_decode($news_list->news); ?></marquee></span></td>
        <td width="15" align="right" valign="top"><img src="<?php echo WEB_DIR; ?>images/b2b-rat-s-rignt-img.jpg" border="0" /></td>
      </tr>
    
    </table>
    
        
     
    
 
    <table align="left" width="722" border="0" cellspacing="0" cellpadding="0" style="padding-top:10px">
      
      <tr>
        <td valign="top"><img src="<?php echo WEB_DIR; ?>images/b2b-add-img.jpg" border="0" /></td>
        <td valign="top"><img src="<?php echo WEB_DIR; ?>images/b2b-add-img1.jpg" border="0" /></td>
      </tr>
    
    </table>
    

  </div>
  </div>
</div>
</div>
</div><div style="clear:both"></div>
<?php $this->load->view('b2b/footer'); ?>
</body>
</html>
<script>

function check_date_valued(val)
{
	
    var laterdate = document.getElementById('datepicker1').value;     // 1st January 2000
 var earlierdate = document.getElementById('datepicker').value;  // 13th March 1998

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
   		 document.getElementById("datepicker1_ajax").innerHTML=xmlhttp.responseText;
    }
  }
  			xmlhttp.open("GET","<?php print WEB_URL ?>b2b/check_date_valued/"+laterdate+"/"+earlierdate+"/"+val,true);
		xmlhttp.send();
	
		
} 

function check_night_valued(val)
{
	
    var laterdate = document.getElementById('datepicker1').value;     // 1st January 2000
 var earlierdate = document.getElementById('datepicker').value;  // 13th March 1998

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
   		 document.getElementById("night_ajax").innerHTML=xmlhttp.responseText;
    }
  }
  			xmlhttp.open("GET","<?php print WEB_URL ?>b2b/check_date/"+laterdate+"/"+earlierdate,true);
		xmlhttp.send();
	
	
		
} 
</script>
 <style>
.b2b-AGE_OF2{ width:97px; float: left; color:#fff; font-family:MAIAN; padding:0 0 8px; margin:12px -7px 0 0; color:#000; font-size:12px;}

.check_149{ width:144px; float:right; margin:0 13px 3PX 0; position:relative; left:34px}
</style>
