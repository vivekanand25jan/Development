<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Travel Bay Admin Console</title>
<link href="<?php echo WEB_DIR; ?>adminstyle.css" rel="stylesheet" type="text/css" />

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

function getXMLHTTP() { //fuction to return the xml http object
  var xmlhttp=false; 
  try{
   xmlhttp=new XMLHttpRequest();
  }
  catch(e) {  
   try{   
    xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
   }
   catch(e){
    try{
    xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    }
    catch(e1){
     xmlhttp=false;
    }
   }
  }
    
  return xmlhttp;
    }
	
function check(){
$price = $('#price').val();
$avail = $('#avail').val();
$min_stay = $('#min_stay').val();
$max_stay = $('#max_stay').val();
$checked_val=$('#on_req').val();
if($avail!=''){
$('input[name="avail[]"]').each(function(){
 $('input[name="avail[]"]').val($avail);
});
}
if($price!=''){
$('input[name="price[]"]').each(function(){
 $('input[name="price[]"]').val($price);
});
}
if($min_stay!=''){
$('input[name="min_stay[]"]').each(function(){
 $('input[name="min_stay[]"]').val($min_stay);
});
}
if($max_stay!=''){
$('input[name="max_stay[]"]').each(function(){
 $('input[name="max_stay[]"]').val($max_stay);
});
}
if($checked_val=='checkall'){ 
	
	$("#tablecheckbox input").each( function() {
		$(this).attr("checked",true);
	})
}
if($checked_val=='uncheckall'){
	
	$("#tablecheckbox input").each( function() {
		$(this).attr("checked",false);
		})
	
	}
$checked_val1 = $('#block_arr').val();
if($checked_val1=='checkall'){ 
	$("#tablecheckbox1 input").each( function() {
	$(this).attr("checked",true);
	})
}
if($checked_val1=='uncheckall'){
	$("#tablecheckbox1 input").each( function() {
	$(this).attr("checked",false);
	})
	
	}
$checked_val2 = $('#block_dept').val();
if($checked_val2=='checkall'){ 
	/*$('input[name="select[]"]').each(function(){
	 $('input[name="select[]"]').attr('checked',true);
	});*/
	$("#tablecheckbox2 input").each( function() {
		$(this).attr("checked",true);
	})
}
if($checked_val2=='uncheckall'){
	/*$('input[name="select[]"]').each(function(){
	 $('input[name="select[]"]').attr('checked',false);
	});*/
	$("#tablecheckbox2 input").each( function() {
		$(this).attr("checked",false);
		})
	}
}

function check_new(){
$price = $('#price').val();
$extra_bed_price = $('#extra_bed_price').val();
$avail = $('#avail').val();
$adult = $('#adult').val();
$child = $('#child').val();
$child_price = $('#child_price').val();
$infant = $('#infant').val();
$sup_charge = $('#sup_charge').val();
if($avail!=''){
$('input[name="avail[]"]').each(function(){
 $('input[name="avail[]"]').val($avail);
});
}
if($price!=''){
$('input[name="price[]"]').each(function(){
 $('input[name="price[]"]').val($price);
});
}
if($extra_bed_price!=''){
$('input[name="extra_bed_price[]"]').each(function(){
 $('input[name="extra_bed_price[]"]').val($extra_bed_price);
});
}
if($adult!=''){
$('select[name="adult[]"]').each(function(){
 $('select[name="adult[]"]').val($adult);
});
}
if($child!=''){
$('select[name="child[]"]').each(function(){
 $('select[name="child[]"]').val($child);
});
}
if($child_price!=''){
$('input[name="child_price[]"]').each(function(){
 $('input[name="child_price[]"]').val($child_price);
});
}
if($infant!=''){
$('input[name="infant[]"]').each(function(){
 $('input[name="infant[]"]').val($infant);
});
}
if($sup_charge!=''){
$('input[name="sup_charge[]"]').each(function(){
 $('input[name="sup_charge[]"]').val($sup_charge);
});
}
}

function facilities()
{
	var valcheck2 = [];
	var selectedVariants = $("input[name=day]:checked").serializeArray();
	jQuery.each(selectedVariants, function(i, field){
     // alert(field.value); alert("IValue=="+i);
		valcheck2[i] = field.value;
    });
	$('#apartfec_val').val('');
	$('#apartfec_val').val(valcheck2);
	/*alert(valcheck2);
	alert($('#apartfec_val').val(valcheck2));*/
	
}
function check_all()
{
	if($('#all_day').attr('checked'))
	{

		$("#day input").each( function() {
			$(this).attr("checked",true);
		});
	}
	else
	{
		$("#day input").each( function() {
			$(this).attr("checked",false);
		});
	}
}

function abc()
{
	var valcheck2 = [];
	var selectedVariants = $("input[name=day]:checked").serializeArray();
	jQuery.each(selectedVariants, function(i, field){
     // alert(field.value); alert("IValue=="+i);
		valcheck2[i] = field.value;
    });
	$('#apartfec_val').val('');
	$('#apartfec_val').val(valcheck2);
	document.getElementById("maintain_month").submit();
}
function month(month,year)
{

	$('#month').val(month);
	$('#year').val(year);
	var valcheck2 = [];
	var selectedVariants = $("input[name=day]:checked").serializeArray();
	jQuery.each(selectedVariants, function(i, field){
     // alert(field.value); alert("IValue=="+i);
		valcheck2[i] = field.value;
    });
	$('#apartfec_val').val('');
	$('#apartfec_val').val(valcheck2);
	document.getElementById("maintain_month").submit();
}
function checked()
{
	var valcheck2 = [];
	var selectedVariants = $("input[name=on_req_checked_val]:checked").serializeArray();
	jQuery.each(selectedVariants, function(i, field){
     //alert(field.value); alert("IValue=="+i);
		valcheck2[i] = field.value;
    });
	$('#on_req_checked').val('');
	$('#on_req_checked').val(valcheck2);
	var valcheck3 = [];
	var selectedVariants1 = $("input[name=on_arr_checked_val]:checked").serializeArray();
	jQuery.each(selectedVariants1, function(j, field){
     //alert(field.value); alert("IValue=="+i);
		valcheck3[j] = field.value;
    });
	$('#on_arr_checked').val('');
	$('#on_arr_checked').val(valcheck3);
	var valcheck4 = [];
	var selectedVariants2 = $("input[name=on_blk_checked_val]:checked").serializeArray();
	jQuery.each(selectedVariants2, function(k, field){
     //alert(field.value); alert("IValue=="+i);
		valcheck4[k] = field.value;
    });
	$('#on_blk_checked').val('');
	$('#on_blk_checked').val(valcheck4);
	var stdate = $('#stdate').val();
	var eddate = $('#eddate').val();
	$('#from').val(stdate);
	$('#to').val(eddate);
}
function getDates(){
	
	var sd = $("#datepicker2").val();
	var ed = $("#datepicker3").val(); 
	//var room_plan = $("#room_plan").val();
	if(sd == ''){
		alert("Please select from date");
		return false;
	}
	if(ed == ''){
		alert("Please select end date");
		return false;
	}
	var selectedDays = new Array();
	var j=0;
	for(var i=0; i < document.form1.day.length; i++){
		if(document.form1.day[i].checked == true){
			selectedDays[j]=document.form1.day[i].value;
			j++;			
		}
	}
	if(selectedDays == ''){ selectedDays = 'All'; }
	$.post( "<?php print WEB_URL ?>index/getDates", {mmsd:sd, mmed:ed, selectedDays:selectedDays},
      function(data) {
		if(data != ''){
			$("#filtering").show();
			//$("#room_id").val(room_plan);
			//$("#capacity").val(data.room_plan[0].capacity);
			$("#monthDates").html('');
			
			for(var i=0; i<data.dates.length; i++){
				$("#monthDates").append('<tr style="border-top:solid 1px #deab6f; border-bottom:solid 1px #deab6f; padding-bottom:2px;"><td  style="border-right:solid 1px #deab6f; text-align:left; width:10%;font-size:11.5px;" id="tdtd">'+data.dates[i]+'<input type="hidden" name="dates[]" value="'+data.dates[i]+'"></td><td style="border-right:solid 1px #deab6f; text-align:center; width:10%;" id="tdtd3"><input name="price[]" type="text" class="input-field"  style="height:20px;  background:#F2F2F2;" size="5"/></td><td style="border-right:solid 1px #deab6f; text-align:center; width:10%;" id="tdtd3"><input name="extra_bed_price[]" type="text" class="input-field"  style="height:20px;  background:#F2F2F2;" size="5"/></td><td style="border-right:solid 1px #deab6f; text-align:center; width:10%;" id="tdtd3"><input name="avail[]" type="text" class="input-field"  style="height:20px;  background:#F2F2F2;" size="5"/></td><td style="border-right:solid 1px #deab6f; text-align:center; width:10%;" id="tdtd3"><select name="adult[]" id="adult[]" style="width:60px;"> <option value="1" >1</option> <option value="2"  >2</option> <option value="3" >3</option> <option value="4" >4</option> <option value="5" >5</option> <option value="6" >6</option> </select></td><td style="border-right:solid 1px #deab6f; text-align:center; width:10%;" id="tdtd3"><select name="child[]" id="child[]" style="width:60px;"> <option value="0" >0</option> <option value="1" >1</option> <option value="2">2</option> </select></td><td></td><td style="border-right:solid 1px #deab6f; text-align:center; width:10%;" id="tdtd3"><input name="child_price[]" type="text" class="input-field"  style="height:20px;  background:#F2F2F2;" size="5"/></td><td style="border-right:solid 1px #deab6f; text-align:center; width:10%;" id="tdtd3"><input name="infant[]" type="text" class="input-field"  style="height:20px;  background:#F2F2F2;" size="5"/></td><td style="border-right:solid 1px #deab6f; text-align:center; width:11%;" id="tdtd3"><input name="sup_charge[]" type="text" class="input-field"  style="height:20px;  background:#F2F2F2;" size="5"/></td><td style="border-right:solid 1px #deab6f; text-align:center; width:9%;" id="tdtd3">&nbsp;</td></tr>');
			}
		} 
	  }
	);
}
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

function getMealBoard(){
	if(document.getElementById('meal_plan').value=='0'){
		document.getElementById('halfBoard').style.display = 'block';
		document.getElementById('fullBoard').style.display = 'none';
	}
	if(document.getElementById('meal_plan').value=='1'){
		document.getElementById('halfBoard').style.display = 'none';
		document.getElementById('fullBoard').style.display = 'block';
	}
}
</script>
<script language="javascript">
fields = 0;
function addInput() {
if (fields != 10) {
//document.getElementById('rows').innerHTML += '<tr height="35"><td width="300"><input type="text" id="type_name" name="type_name[]" /></td><td><input type="text" id="type_value" name="type_value[]" style="margin-left:167px;" />&nbsp; <span onclick="addErase()"></span> </td></tr><br><br>';

document.getElementById('rows').innerHTML += '<tr><td valign="top">&nbsp;</td><td>Charge &nbsp; <input type="text" id="cancel_policy_percent" name="cancel_policy_percent" size="8"/>% &nbsp;or&nbsp;&nbsp; <input type="text" id="cancel_policy_charge" name="cancel_policy_charge" size="8"/>amt &nbsp;&nbsp; Date From&nbsp; <input type="text" id="cancel_policy_percent" name="cancel_policy_percent" size="8"/> &nbsp;To&nbsp; <input type="text" id="cancel_policy_charge" name="cancel_policy_charge" size="8"/> &nbsp;&nbsp;<input type="button" onclick="addInput()" name="add" value="Add More" /></td> </tr>';

fields += 1;
} else {
document.getElementById('rows').innerHTML += "<br />Only 10 upload fields allowed.";
document.form.add.disabled=true;
}
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
                      <script src="<?php echo WEB_DIR ?>jquery.js"></script>
                      
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
<?php
$sup_id= $this->uri->segment(3);
$prop_id = $this->uri->segment(4);
if(isset($prop_id) && $prop_id!="")
{
?>
<ul class="tabs1">
<li><a href="<?php echo WEB_URL;?>index/edit_contact_inform/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>" >Hotel Details </a></li>
<li><a href="<?php echo WEB_URL;?>index/inventory_category_list/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>" id="tabs_active">Inventory Management </a></li>
<li><a href="">Booking Details </a></li>
<li><a href="<?php echo WEB_URL;?>index/accounting/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>">Accounting </a></li>

<li style="float:right; cursor:pointer; font-size:12px; padding:5px;color:#069;"><span onclick="goBack()">Back</span></li>
</ul>
<?php
}
else
{
?>
	<ul class="tabs1">
    <li><a href="javascript:void(0)" >Hotel Details </a></li>
    <li><a href="javascript:void(0" id="tabs_active">Inventory Management </a></li>
    <li><a href="">Booking Details </a></li>
    <li style="float:right; cursor:pointer; font-size:12px; padding:5px;color:#069;"><span onclick="goBack()">Back</span></li>
	</ul>
<?php
}
?>
</div>
</div>

<div id="navjam">
<ul class="tabs">
<li><a href="<?php echo site_url('index/inventory_category_list/')?>/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4)?>" >Category Type</a></li>
<li><a href="<?php echo site_url('index/rate_tactics_list/')?>/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4)?>">Room Rates</a></li>
<!--<li><a href="<?php echo site_url('index/maintain_month_list/')?>/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4)?>">Maintain by Month</a></li>
--><li><a href="<?php echo site_url('index/open_close_dates/')?>/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4)?>">Open/Close Dates</a></li>
<li><a href="<?php echo site_url('index/house_rules/')?>/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4)?>" >Supplier Policy</a></li>
<li><a href="<?php echo site_url('index/extra_service/')?>/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4)?>" id="tabs_active">Extra Services</a></li>
<li><a href="<?php echo site_url('index/early_bird/')?>/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4)?>">Early Bird Promotion</a></li>
<li><a href="<?php echo site_url('index/view_allotment_list/')?>/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4)?>">Allotment</a></li>
</ul>

</div>

<!-- tab "panes" -->
<div class="panes" style="padding-bottom:10px">
<!--This is the contact information division-->
	
<div id="containerdount">

 <div style="font-weight:normal; float:left; margin-left:20px; font-size:16px;">Extra Services</div>
    <br />
    <div style="float:left; margin-left:20px;clear:both">
   <?php if(isset($result[0]->sup_apart_list_id)){ ?>
    <form action="<?php echo WEB_URL; ?>index/edit_extra_service/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4); ?>/<?php echo $result[0]->sup_apart_list_id; ?>" method="post">
    <?php } else { ?>
    <form action="<?php echo WEB_URL; ?>index/set_extra_service/<?php echo $this->uri->segment(3); ?>//<?php echo $this->uri->segment(4); ?>" method="post">
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
    <td colspan="5" align="center"><input type="image" src="<?php echo WEB_DIR ?>images/sub_mint_btn_admin.png"  />
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
