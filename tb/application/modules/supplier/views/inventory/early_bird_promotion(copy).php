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

<script language="javascript">
fields = 0;
function addInput() {
if (fields != 10) {

$("#rows").append('<tr height="35" style="border:1px solid #666;padding-top:5px;"> <td valign="top">&nbsp; </td> <td> Date From&nbsp; <input type="text" id="cancel_policy_from[]" name="cancel_policy_from[]" size="8"/> &nbsp;To&nbsp; <input type="text" id="cancel_policy_to[]" name="cancel_policy_to[]" size="8"/> &nbsp;&nbsp; </td> </tr> <tr height="35"> <td>&nbsp; </td> <td>  Stay&nbsp; <input type="text" id="cancel_policy_from[]" name="cancel_policy_from[]" size="8"/>Nights  &nbsp;&nbsp; Pay&nbsp; <input type="text" id="cancel_policy_to[]" name="cancel_policy_to[]" size="8"/>Nights &nbsp;&nbsp; </td> </tr> <tr height="35"> <td>&nbsp; </td> <td> Contract Rate &nbsp; <input type="text" id="cancel_policy_from[]" name="cancel_policy_from[]" size="8"/>Amt  </td> </tr><br>');
fields += 1;
} else {
$("#rows").append('<br />Only 10 upload fields allowed.');
document.form.add.disabled=true;
}
}
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
<li><a href="<?php echo site_url('index/extra_service/')?>/<?php echo $this->uri->segment(3); ?>" id="newtabe_size">Extra Services</a></li>
<li><a href="<?php echo site_url('index/early_bird/')?>/<?php echo $this->uri->segment(3); ?>" id="tabs_active" style="width:138.5px;">Early Bird Promotion</a></li>
<li><a href="<?php echo site_url('index/view_allotment_list/')?>/<?php echo $this->uri->segment(3); ?>" id="newtabe_size">Allotment</a></li>
</ul>
</div>
</div>

<!-- tab "panes" -->
<div class="panes">
  <div id="containerdount"  class="tab1" style="padding-top:30px;">
    
   <!--<div style="margin-top:20px;">
    <div style="font-weight:normal; float:left; margin-left:20px; font-size:16px;">Promotion</div>
    <br />
    <div style="float:left; margin-left:20px;">
  <table width="100%" border="0" cellspacing="1" cellpadding="0">
    
    <tr height="35">
        <td>Category Type, Room Category:</td>
        <td width="649"><select name="category_name" id="category_name" style="width:150px;">
              <option value="">Select</option>
            <?php
            $cate = $this->Supplier_Model->inventory_cate_type($this->uri->segment(3));
            if(isset($cate[0]->sup_inv_cate_type_id))
            {
            for($i=0;$i<count($cate);$i++){
            ?>
              <option value="<?php echo $cate[$i]->sup_inv_cate_type_id; ?>"><?php echo $cate[$i]->cate_type.' '.$cate[$i]->room_type; ?></option>
            <?php	
            }
            }
            ?>
            </select><span style="color:#FF0000;"> <?php echo form_error('category_name');?></span></td>
    </tr>
    <tr><td>&nbsp;</td><td>&nbsp;</td>
            </tr>
    
    <tr>
        <td valign="top">Promotions: </td>
        <td style="color:#999;"> Date Format should be      dd-mm-yyyy 
        <input type="button" onclick="addInput()" name="add" value="Add Promotion" style="float:right; margin-right:20px;"/>
            </td>
    </tr>
    

    <tr height="35">
        <td valign="top">&nbsp; </td>
        <td style="padding-left:50px;">
            Date From&nbsp;
            <input type="text" id="cancel_policy_from[]" name="cancel_policy_from[]" size="8"/> &nbsp;To&nbsp;
            <input type="text" id="cancel_policy_to[]" name="cancel_policy_to[]" size="8"/>
            &nbsp;&nbsp;
         </td>
    </tr>
    <tr height="35">
        <td>&nbsp; </td>
        <td style="padding-left:50px;">
            Stay&nbsp; <input type="text" id="cancel_policy_from[]" name="cancel_policy_from[]" size="8"/>Nights  &nbsp;&nbsp;
            Pay&nbsp; <input type="text" id="cancel_policy_to[]" name="cancel_policy_to[]" size="8"/>Nights &nbsp;&nbsp;
         </td>
    </tr>
    <tr height="35">
        <td>&nbsp; </td>
        <td style="padding-left:50px;">
            Contract Rate &nbsp; <input type="text" id="cancel_policy_from[]" name="cancel_policy_from[]" size="8"/>Amt  
         </td>
    </tr>

    
    		<tr>
            <td>&nbsp;</td>
            <td>
            <table>
            <span id="rows"></span>
            </table>
            </td></tr>
            
            
    </table>

 
 <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0" style="margin:15px 0 0 17px; ">
  <tr>
    <td align="right" valign="top" class="" colspan="6" height="30"><a href="<?php echo site_url('index/add_rate_plan/')?>/<?php echo $this->uri->segment(3); ?>" style="color:#099; font-weight:bold;">Add room rate</a></td>
  </tr>
   <tr>
    <td align="left" valign="top" class="my_profile_name_ex_tab">No</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Period</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Status</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Action</td>
  </tr>
	<?php 
    if(isset($result[0]))
    {
    for($i=0;$i<count($result);$i++)
    {
    ?>
  <tr>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $i+1; ?></td>
     
	<?php  $category_name = $this->Supplier_Model->get_category_name($result[$i]->category_type); 
	
	echo $category_name->cate_type.' '.$category_name->room_type; ?></a></td>
   
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php $select=$this->Supplier_Model->get_season_id($result[$i]->season_id); if(isset($select['0']->season)){ echo $select['0']->season;} ?></td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php $fd = $result[$i]->room_avail_date_from; $fds = explode("-",$fd); $from_date = $fds[2].'-'.$fds[1].'-'.$fds[0]; $td = $result[$i]->room_avail_date_to; $tds = explode("-",$td); $to_date = $tds[2].'-'.$tds[1].'-'.$tds[0]; echo $from_date.' To '.$to_date;	
	 ?></td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php if($result[$i]->status==1) { echo 'Active'; } else { echo 'InActive'; } ?></td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><a href="<?php echo WEB_URL; ?>index/update_rate_tactics/<?php echo $this->uri->segment(3); ?>/<?php echo $result[$i]->sup_rate_tactics_id; ?>/1"  style="color:#000;">Active</a> / <a href="<?php echo WEB_URL; ?>index/update_rate_tactics/<?php echo $this->uri->segment(3); ?>/<?php echo $result[$i]->sup_rate_tactics_id; ?>/0" style="color:#000;">InActive</a> / <a href="<?php echo WEB_URL; ?>index/update_rate_tactics/<?php echo $this->uri->segment(3); ?>/<?php echo $result[$i]->sup_rate_tactics_id; ?>/2" style="color:#000;">Delete</a></td>
  </tr>
  <?php
	}
}
else
{
	  ?> <td align="center" valign="top" colspan="6" class="my_profile_name_ex_tab_whit_ex">No Result Found... </td>
      <?php
  }
  ?>
</table>
 
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin:10px;">
    <tr>
    <td colspan="5" align="center"><input type="image" src="<?php echo WEB_DIR ?>images/save-but.png"  /></td>
    </tr>
    </table>
    </form>    
    
    </div>
    </form>
    
  </div>-->
  
 	<div style="margin-top:20px;">
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
            <input value="<?php echo $current_dte; ?>" name="sd" id="datepicker"  onchange="javascript:return check_night_valued(this.value)" type="text" class="b2b-txtbox"  style=" background-image: url('<?php echo WEB_DIR; ?>images/b2b-calicon.png');   background-repeat: no-repeat;  background-position: right center;" /> 					
            To <input  value="<?php echo $next_dte; ?>" name="ed" id="datepicker1" onchange="javascript:return check_night_valued(this.value)" type="text" class="b2b-txtbox" style=" background-image: url('<?php echo WEB_DIR; ?>images/b2b-calicon.png');   background-repeat: no-repeat;  background-position: right center;" /></td>
    </tr>
    
    <tr height="35">
    <td width="300">Discount:</td>
    <td><input type="text" id="discount" name="discount"value="<?php if( isset($discount)) echo $discount; ?>" /></td>
    </tr>
    
    <tr height="35">
    <td width="300">Book Before:</td>
    <td><input value="" name="bb" id="datepicker2"  onchange="javascript:return check_night_valued(this.value)" type="text" class="b2b-txtbox"  style=" background-image: url('<?php echo WEB_DIR; ?>images/b2b-calicon.png');   background-repeat: no-repeat;  background-position: right center;" /></td>
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
    </form>
    
  </div>
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