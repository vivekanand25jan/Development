<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Travel Bay</title>

<link href="<?php echo WEB_DIR; ?>designAccess/css/travel_bay_stylesheet.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo WEB_DIR; ?>designAccess/engine1/style.css" />


<link href="<?php echo WEB_DIR; ?>css/style_sheet.css" rel="stylesheet" type="text/css" />
<link href="<?php echo WEB_DIR; ?>css/postion.css" rel="stylesheet" type="text/css" />
<script src="<?php echo WEB_DIR ?>script/jquery.js"></script>

<link rel="stylesheet" href="<?php echo WEB_DIR; ?>datepickernew/themes/base/jquery.ui.all.css">

<script src="<?php echo WEB_DIR; ?>datepickernew/ui/jquery.ui.core.js"></script> 
<script src="<?php echo WEB_DIR; ?>datepickernew/ui/jquery.ui.widget.js"></script> 
<script src="<?php echo WEB_DIR; ?>datepickernew/ui/jquery.ui.datepicker.js"></script>
<link rel="stylesheet" href="<?php echo WEB_DIR; ?>datepickernew/demos.css">

<script type="text/javascript" src="<?php echo WEB_DIR ?>gui/ajax/ajaxsbmt.js"></script>

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
</head>
<body>
<?php $this->load->view('header'); ?>
 
<div class="midlebody">
<div class="mainbody_signin">
<div>
<div id="navjam">
<div class="tabs_width">
<ul class="tabs">
<li><a href="<?php echo WEB_URL;?>index/edit_contact_inform/<?php echo $this->uri->segment(3)?>">Hotel Details </a></li>
<li><a href="" id="tabs_active">Inventory Management </a></li>
<li><a href="">Booking Details </a></li>
<li><a href="<?php echo WEB_URL;?>index/accounting/<?php echo $this->uri->segment(3)?>">Accounting </a></li>
</ul>
</div>
</div>
<div class="hotelnames_signin" style="min-height:329px;">
<!--<div id="mybook-tit">Inventory Management</div>-->

<div class="" style="margin-top:20px;">            		
<!-- the tabs -->
<div id="navjam">
<div class="tabs_width">
<ul class="tabs">
<li><a href="<?php echo site_url('index/inventory_category_list/')?>/<?php echo $this->uri->segment(3); ?>" id="newtabe_size">Category Type</a></li>
<li><a href="<?php echo site_url('index/rate_tactics_list/')?>/<?php echo $this->uri->segment(3); ?>" id="newtabe_size">Room Rates</a></li>
<li><a href="<?php echo site_url('index/open_close_dates/')?>/<?php echo $this->uri->segment(3); ?>" id="newtabe_size">Open/Close Dates</a></li>
<li><a href="<?php echo site_url('index/house_rules/')?>/<?php echo $this->uri->segment(3); ?>" id="newtabe_size">Supplier Policy</a></li>
<li><a href="<?php echo site_url('index/extra_service/')?>/<?php echo $this->uri->segment(3); ?>" id="tabs_active" style="width:138.5px;">Extra Services</a></li>
<li><a href="<?php echo site_url('index/early_bird/')?>/<?php echo $this->uri->segment(3); ?>" id="newtabe_size">Early Bird Promotion</a></li>
<li><a href="<?php echo site_url('index/view_allotment_list/')?>/<?php echo $this->uri->segment(3); ?>" id="newtabe_size">Allotment</a></li>
</ul>
</div>
</div>

<!-- tab "panes" -->
<div class="panes">
  <div id="containerdount"  class="tab1" style="padding-top:30px;">
    <div style="font-weight:normal; float:left; margin-left:20px; font-size:16px;">Extra Services</div>
    <br />
    <div style="float:left; margin-left:20px;">
   <?php if(isset($result[0]->sup_apart_list_id)){ ?>
    <form action="<?php echo WEB_URL; ?>index/edit_extra_service/<?php echo $this->uri->segment(3); ?>/<?php echo $result[0]->sup_apart_list_id; ?>" method="post">
    <?php } else { ?>
    <form action="<?php echo WEB_URL; ?>index/set_extra_service/<?php echo $this->uri->segment(3); ?>" method="post">
    <?php } ?>
    <table width="100%" border="0" cellspacing="1" cellpadding="0">
    <tr height="35">
    <td width="150" valign="top">Extra Servies:</td>
    <td>
    <?php for($i=0; $i<4; $i++){ ?>
    	Service: <input type="text" id="service[]" name="service[]" value="<?php if(isset($result[$i]->extraservice)){ echo $result[$i]->extraservice; } ?>" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    	
        Mode: 
        <select name="mode[]" id="mode[]" style="width:120px;">
            <option value="">Select Option</option>
            <option value="1" <?php if(isset($result[$i]->mode) && $result[$i]->mode == '1'){ echo "selected='selected'"; } ?>>Included</option>
            <option value="2" <?php if(isset($result[$i]->mode) && $result[$i]->mode == '2'){ echo "selected='selected'"; } ?>>Not Included</option>
        </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        
        Cost: <input type="text" id="cost[]" name="cost[]" size="8" value="<?php if(isset($result[$i]->cost)){ echo $result[$i]->cost; } ?>" />
        <br /><br />
       <?php } ?>
	</td>
    </tr>
    </table>
    
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin:20px;">
    <tr>
    <td colspan="5" align="center"><input type="image" src="<?php echo WEB_DIR ?>images/save-but.png"  />
    <!--<input type="submit" id="submit" name="submit" value="Save and Continue" />--></td>
    </tr>
    </table>
    </form>
    
    
    </div>
    <div style="clear:both;"></div>
    
    <!--<div style="margin-top:20px;">
    <div style="font-weight:normal; float:left; margin-left:20px; font-size:16px;">Early Bird Promotion</div>
    <br />
    <div style="float:left; margin-left:20px;">
    <table width="100%" border="0" cellspacing="1" cellpadding="0">
   
    <tr height="35">
        <td>Date From: </td>
        <td> 
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
            <input value="<?php echo $current_dte; ?>" name="sd" id="datepicker"  onchange="javascript:return check_night_valued(this.value)" type="text" class="b2b-txtbox"  style=" background-image: url('<?php echo WEB_DIR; ?>images/b2b-calicon.png');   background-repeat: no-repeat;  background-position: right center;" /> 					
            To <input  value="<?php echo $next_dte; ?>" name="ed" id="datepicker1" onchange="javascript:return check_night_valued(this.value)" type="text" class="b2b-txtbox" style=" background-image: url('<?php echo WEB_DIR; ?>images/b2b-calicon.png');   background-repeat: no-repeat;  background-position: right center;" /></td>
    </tr>
    
    <tr height="35">
    <td width="300">Discount:</td>
    <td><input type="text" id="discount" name="discount"value="<?php if( isset($discount)) echo $discount; ?>"/></td>
    </tr>
    </table>
    
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin:20px;">
    <tr>
    <td colspan="5" align="center"><input type="image" src="<?php echo WEB_DIR ?>images/save-but.png"/></td>
    </tr>
    </table>
    </form>
    
    
    </div>
    </form>
    
  </div>-->
</div>


<!-- This JavaScript snippet activates those tabs -->
<!--<script>
$(function() {
$("ul.tabs").tabs("div.panes > div");
});
</script>-->
</div>
    
</div>
</div>
</div>
</div>
</div>
</div></div>
<div style="clear:both"></div>
<?php $this->load->view('footer'); ?>
</body>
</html>

 <style>
.b2b-AGE_OF2{ width:97px; float: left; color:#fff; font-family:MAIAN; padding:0 0 8px; margin:12px -7px 0 0; color:#000; font-size:12px;}

.check_149{ width:144px; float:right; margin:0 13px 3PX 0; position:relative; left:34px}
</style>