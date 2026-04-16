<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Travel Bay Admin Console</title>
<link href="<?php echo WEB_DIR; ?>adminstyle.css" rel="stylesheet" type="text/css" />

<script src="<?php echo WEB_DIR_FRONT ?>script/jquery.js"></script>

<link rel="stylesheet" href="<?php echo WEB_DIR_FRONT; ?>datepickernew/themes/base/jquery.ui.all.css">
<script src="<?php echo WEB_DIR_FRONT; ?>datepickernew/ui/jquery.ui.core.js"></script> 
<script src="<?php echo WEB_DIR_FRONT; ?>datepickernew/ui/jquery.ui.widget.js"></script> 
<script src="<?php echo WEB_DIR_FRONT; ?>datepickernew/ui/jquery.ui.datepicker.js"></script>
<link rel="stylesheet" href="<?php echo WEB_DIR_FRONT; ?>datepickernew/demos.css">

<script type="text/javascript" src="<?php echo WEB_DIR_FRONT ?>gui/ajax/ajaxsbmt.js"></script>
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
function get_maintain_month_dates(){
	var maintain_month = $("#maintain_month").val();
	$.post( "<?php print WEB_URL ?>index/get_maintain_month_dates", {maintain_month:maintain_month},
      function(data) {
		if(data != ''){
			$("#getCateTypes").html('');
			for(var j=0; j<data.cate_types.length; j++){
				$("#getCateTypes").append('<tr><td width="100%" style="padding-left:5px;"><span style="font-size:13px;font-weight:bold;color:green;">'+data.cate_types[j].room_type+'</span></td><tr><td id="viewRateTactics">'+data.cate_types[j].rate_plan_name+'</td></tr></tr>');
				//getRateTactics(data.cate_types[j].sup_inv_cate_type_id);
			}
			
			$("#getMonthDates").html('');
			$("#getMonthDates").append('<td align="left" width="130" valign="top" style="padding-left:5px;">Days of '+maintain_month+'</td><td align="left" valign="top">&nbsp;</td>');
			
			$("#getMonthDatesMarks").html('');
			$("#getMonthDatesMarks").append('<td align="left" width="130" valign="top" style="padding-left:5px;padding-top:10px;">Close out all rate plans</td><td align="left" valign="top">&nbsp;</td>');
			
			for(var i=0; i<data.dates.length; i++){
				$("#getMonthDates").append('<td width="20" style="border:1px solid #CCC;padding-left:0px;">'+data.dates[i]+'</td>');
				$("#getMonthDatesMarks").append('<td align="center" width="20" style="border:1px solid #CCC;padding-left:0px;"><img src="<?php echo WEB_DIR ?>images/b2b-booking-icon1.png" width="15" /><img src="<?php echo WEB_DIR ?>images/b2b-booking-icon.png" width="14" /></td>');		
				$("#viewRateTactics").append('<span align="center" width="20" style="border:1px solid #CCC;padding-left:0px;"><img src="<?php echo WEB_DIR ?>images/b2b-booking-icon1.png" width="15" /></span>');
			}
		} 
	  }
	);
}
function getRateTactics(invCateTypeId)
{
	$.post( "<?php print WEB_URL ?>index/getRateTactics", {invCateTypeId:invCateTypeId},
      function(data) {
		if(data != ''){
			for(var j=0; j<data.rate_tactics.length; j++){
				$("#viewRateTactics_"+data.rate_tactics[j].rate_of_room_plan).append('<tr><td style="padding-left:5px;">'+data.rate_tactics[j].rate_plan_name+'</td></tr>');
			}
		} 
	  }
	);
}

/*function check()
{
	<?php 
	for($j=1; $j<=$results; $j++)
	{ ?>
		if($('#avail<?php echo $j; ?>').attr('checked')){
		$("#avail_all<?php echo $j; ?>").each( function() { 
			$(this).attr("checked",true);
		});
	}
	else{
		$("#avail_all<?php echo $j; ?>").each( function() {
			$(this).attr("checked",false);
		});
	}
	<?php } ?>
}*/
function setStatusActivate(prop_id,id,val)
{
	$.get( "<?php print WEB_URL ?>index/set_open_close_dates", {prop_id:prop_id,id:id,val:val},
	function(data) {
	  if(data != ''){
		parent.location.reload()
		/*var date = data.month+'-'+data.year;
		$("#maintain_month").val(data.month+'-'+data.year);
		return false;*/
		} 
	});return false;
}
</script>
</head>

<body>
 <div id="div_wrapper">
 	<div id="div_container">
    	
        <table width="986" align="center" border="0" cellpadding="0" cellspacing="0" style="border:1px #aaaaaa solid; margin-top:30px; border-top:none; border-radius:10px; ">
         <?php $this->load->view('header'); ?>
          <tr>
          	<td>
            	<table width="966" border="0" align="center" style="border:1px #9d9d9d solid; margin-top:10px; background-color:#edefed; border-radius:8px;">
                    <tr>
                      <td width="580" valign="top">
                    
                      
                      <script language="javascript1.5" type="text/javascript">
				function hotel_fac_sorting()
		{
		
		var sd =document.search.datepicker.value;
		var ed =document.search.datepicker1.value;
		var bookno =document.search.bookno.value;
			var status =document.search.status.value;
		
		$("#result").empty().html('<div style="padding-left:400px" align="middle"><img src=\'<?php print WEB_DIR ?>images/ajax-loader(2).gif\'></div>');
		  $("#result").load("<?php print WEB_URL ?>account/booking_search/"+sd+"/"+ed+"/"+bookno+"/"+status);
		
		       return false;
                      // For first time page load default results
                         
		 
		}
		function goBack()
{
	window.history.go(-1);
}
		</script>
        
<div id="navjam">
<div class="tabs_width">

<ul class="tabs1">

 <li><a href="<?php echo WEB_URL;?>index/excursion" id="tabs_active">Excursion</a></li>
</ul>

</div>
</div>



<!-- tab "panes" -->
<div class="panes" style="padding-bottom:10px">
<!--This is the contact information division-->
	
<div id="containerdount">

   
<div style="margin-top:8px;">
     <div style="float:right; height:25px; margin-top:10px ; margin-right:-130px;"><a href="<?php echo site_url('index/excursion')?>" style="color:#099;">Back</a></div>
   
    <div style="float:left; margin-left:20px;">
    <form name="form1" action="<?php echo WEB_URL; ?>index/edit_excursion_period_details/<?php echo $this->uri->segment(3); ?>" method="post">
    <?php 
			$fd = $car_period->from_date ; 
			$fds = explode("-",$fd); 
			$from_date = $fds[2].'-'.$fds[1].'-'.$fds[0]; 
			$td = $car_period->to_date ; 
			$tds = explode("-",$td);
		 $to_date = $tds[2].'-'.$tds[1].'-'.$tds[0]; 
	?>
    
    <table width="780" border="0" cellspacing="1" cellpadding="0"><caption><h4 align="left">Car Rental Period Information</h4></caption>
        
    
   <tr height="35">
    <td width="300">From Date:</td>
    <td><input value="<?php echo $from_date; ?>" name="from_date" id="datepicker"  onchange="javascript:return check_night_valued(this.value)" type="text" class="b2b-txtbox"  style=" background-image: url('<?php echo WEB_DIR_FRONT; ?>images/b2b-calicon.png');   background-repeat: no-repeat;  background-position: right center;" /> 
    <span style="color:#FF0000;"> <?php echo form_error('from_date');?></span>	
        </td>
    </tr>
    
  <tr height="35">
    <td width="300">To Date:</td>
    <td><input  value="<?php echo $to_date; ?>" name="to_date" id="datepicker1" onchange="javascript:return check_night_valued(this.value)" type="text" class="b2b-txtbox" style=" background-image: url('<?php echo WEB_DIR_FRONT; ?>images/b2b-calicon.png');   background-repeat: no-repeat;  background-position: right center;" />&nbsp;&nbsp;
    <span style="color:#FF0000;"> <?php echo form_error('to_date');?></span>
    </td>
    </tr>
    </table>
  
    
    
   
   
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
numberOfMonths: 1,
dateFormat: 'dd-mm-yy',

minDate: 0
});
$( "#datepicker1" ).datepicker({
numberOfMonths: 1,
dateFormat: 'dd-mm-yy',

minDate: 1
});

$( "#datepicker2" ).datepicker({
numberOfMonths: 1,
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
        minDate: 1
    });
$( "#datepicker1" ).val($t);
// $('#datepicker1').datepicker('option', 'minDate', $t);s
}
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
}
});

});
</script>
        <?php
            $current_dte = date("d-m-Y",strtotime("+7 days"));
            $next_dte = date("d-m-Y",strtotime("+8 days"));
        ?>
            
   
    
 
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin:20px;">
    <tr>
    <td colspan="5" align="center"><input type="image" src="<?php echo WEB_DIR ?>images/sub_mint_btn_admin.png"  />
    <!--<input type="submit" id="submit" name="submit" value="Save and Continue" />--></td>
    </tr>
    </table>
    </form>
  
    
    
    </div>
   
    
  </div>
    
  
</div>

<script>
/*This is to perform the tabs changing function*/
// perform JavaScript after the document is scriptable.
/*$(function() {
	// setup ul.tabs to work as tabs for each div directly under div.panes
	$("ul.tabs").tabs("div.panes > div");
});*/
</script>
                                      </td>
                      
                    </tr>
                  </table>

            </td>
          </tr>
          <tr>
          	<td>&nbsp;</td>
          </tr>
        </table>
        
       
        

        
 	</div>
 </div>
</body>
</html>
 <style>
.b2b-AGE_OF2{ width:97px; float: left; color:#fff; font-family:MAIAN; padding:0 0 8px; margin:12px -7px 0 0; color:#000; font-size:12px;}

.check_149{ width:144px; float:right; margin:0 13px 3PX 0; position:relative; left:34px}
</style>