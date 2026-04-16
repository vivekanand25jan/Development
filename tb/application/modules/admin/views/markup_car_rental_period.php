<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Console</title>
<link href="<?php echo WEB_DIR; ?>adminstyle.css" rel="stylesheet" type="text/css" />
   			
<script src="<?php echo WEB_DIR ?>jquery.js"></script>
<script type="text/javascript" src="<?php echo WEB_DIR ?>ajaxsbmt.js"></script>
<script src="<?php echo WEB_DIR_FRONT ?>script/jquery.js"></script>

<link rel="stylesheet" href="<?php echo WEB_DIR_FRONT; ?>datepickernew/themes/base/jquery.ui.all.css">
<script src="<?php echo WEB_DIR_FRONT; ?>datepickernew/ui/jquery.ui.core.js"></script> 
<script src="<?php echo WEB_DIR_FRONT; ?>datepickernew/ui/jquery.ui.widget.js"></script> 
<script src="<?php echo WEB_DIR_FRONT; ?>datepickernew/ui/jquery.ui.datepicker.js"></script>
<link rel="stylesheet" href="<?php echo WEB_DIR_FRONT; ?>datepickernew/demos.css">

<script type="text/javascript" src="<?php echo WEB_DIR_FRONT ?>gui/ajax/ajaxsbmt.js"></script>



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
                   
        
                     <div id="navjam">
<ul class="tabs" style="position:relative; top:-4px; left:-3px; border-bottom:none">
	<li><a href="javascript:void(0)" style="border-radius:8px 0 0 0">Car Rate Master</a></li>
	

   <!-- <li><a href="#">MY TRAVELERS</a></li>
     <li><a href="#">BILLING INFO</a></li>
          <li><a href="#">CREDIT POINTS</a></li>
               <li><a href="#">TOOLS </a></li>-->
</ul>
</div>

<!-- tab "panes" -->
<span style="float:right; cursor:pointer; font-size:12px; padding:0px;color:#069;"><A HREF="<?php echo WEB_URL; ?>index/dashboard"> Go Back</A></span>

<div class="panes" style="padding-bottom:10px">
	<div id="containerdount1" class="admin-innerbox">
    	

<div style="margin-top:5px;">
    
   
    <div style="float:left; margin-left:20px;">
    <form name="form1" action="<?php echo WEB_URL; ?>index/markup_car_period" method="post">
    
    
    <table width="780" border="0" cellspacing="1" cellpadding="0"><caption><h4 align="left">Car Rental Period Information</h4></caption>
        
    
   <tr height="35">
    <td width="300">From Date:</td>
    <td><input value="" name="from_date" id="datepicker"  readonly="readonly" onchange="javascript:return check_night_valued(this.value)" type="text" class="b2b-txtbox"  style=" background-image: url('<?php echo WEB_DIR_FRONT; ?>images/b2b-calicon.png');   background-repeat: no-repeat;  background-position: right center;" /> 
    <span style="color:#FF0000;"> <?php echo form_error('from_date');?></span>	
        </td>
    </tr>
    
  <tr height="35">
    <td width="300">To Date:</td>
    <td><input  value="" name="to_date" id="datepicker1" readonly="readonly" onchange="javascript:return check_night_valued(this.value)" type="text" class="b2b-txtbox" style=" background-image: url('<?php echo WEB_DIR_FRONT; ?>images/b2b-calicon.png');   background-repeat: no-repeat;  background-position: right center;" />&nbsp;&nbsp;
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





<div id="g_result" style=" width:100%">
<table align="left" width="100%" border="0" cellspacing="0" cellpadding="0" style="height:50px">

    <tr>
  	<td style="font-size:16px; text-align:left; padding-left:5px;">Generic (Supplier Based) Markup Period Table</td>
  </tr>
 </table> 

<table width="100%" border="0" cellspacing="1" cellpadding="0" style="background-color:#E8E5E5">

  <tr>
  	<td align="center" class="admin-table-colo">No</td>
 	<td align="center" class="admin-table-colo">Period</td>
     <td align="center" class="admin-table-colo">Markup</td>
    <td align="center" class="admin-table-colo">Status</td>
    <td align="center" class="admin-table-colo">Action</td>
  </tr>
  
  <?php 
  if($car_markup[0]!='')
  {
for($i=0;$i<count($car_markup);$i++)
{
	
	?>
    <?php 
			$fd = $car_markup[$i]->from_date ; 
			$fds = explode("-",$fd); 
			$from_date = $fds[2].'-'.$fds[1].'-'.$fds[0]; 
			$td = $car_markup[$i]->to_date ; 
			$tds = explode("-",$td);
		 $to_date = $tds[2].'-'.$tds[1].'-'.$tds[0]; 
	?>
    
   <tr >
  	<td align="center" class="admin-table-colo1"><?php echo $i+1; ?></td>
    <td align="center" class="admin-table-colo1"><a href="<?php echo WEB_URL; ?>index/edit_car_markup_period/<?php echo $car_markup[$i]->car_markup_period_id; ?>" style="text-decoration:none;color:#099; "><?php echo $from_date .'-' .$to_date; ?></a></td>
      <td align="center" class="admin-table-colo1"><a href="<?php echo WEB_URL; ?>index/view_car_markup_details/<?php echo $car_markup[$i]->car_markup_period_id; ?>/<?php echo $car_markup[$i]->sup_car_markup_period_id; ?>" style="text-decoration:none;color:#099; ">Add Markup</a></td>
    <td align="center" class="admin-table-colo1"><?php if($car_markup[$i]->status==1) { echo 'Active'; } else { echo 'InActive'; } ?></td>
    <td align="center" class="admin-table-colo1">
    <a href="<?php echo WEB_URL; ?>index/update_car_markup_period/<?php echo $car_markup[$i]->car_markup_period_id; ?>/1 ">Active</a> / 
    <a href="<?php echo WEB_URL; ?>index/update_car_markup_period/<?php echo $car_markup[$i]->car_markup_period_id; ?>/0">InActive</a>/ 
    <a href="<?php echo WEB_URL; ?>index/update_car_markup_period/<?php echo $car_markup[$i]->car_markup_period_id; ?>/2">Delete</a></td>
  </tr>
 <?php
}
  }
  else
  {
	  
?>
<tr><td align="center"  class="admin-table-colo1" colspan="7">No Result Found...
<?php
  }
  ?>
</table>  
 
 
</div>

  
  </div>
  
    
    
 
</div>

<script>

// perform JavaScript after the document is scriptable.
$(function() {
	// setup ul.tabs to work as tabs for each div directly under div.panes
	$("ul.tabs").tabs("div.panes > div");
});
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
        
        <div style="clear:both; height:30px;">&nbsp;</div>
        

        
 	</div>
 </div>
</body>
</html>
