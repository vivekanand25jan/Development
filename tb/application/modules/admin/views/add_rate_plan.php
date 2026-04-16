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
$('input[name="adult[]"]').each(function(){
 $('input[name="adult[]"]').val($adult);
});
}
if($child!=''){
$('input[name="child[]"]').each(function(){
 $('input[name="child[]"]').val($child);
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
	
	var sd=[];
	var ed=[];
	
	$('input[id^="datepickeram"]').each(function() {
		 sd.push($(this).val()); ;
	});

	$('input[id^="datepickerbm"]').each(function() {
		ed.push($(this).val());; 

});
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
	
	
	var sd1 = new Array();
	var ed1 = new Array();
	
	for(var p=0; p <sd.length; p++)
	{
		
			sd1[p]=sd[p];
						
		
	}
	
	for(var q=0; q < ed.length; q++)
	{
		
			ed1[q]=ed[q];
					
		
	}
	
	
	if(sd1 == '')
	{
		sd1 = sd;
	}
	if(ed1 == '')
	{
		ed1 = ed;
	}
	if(selectedDays == ''){ selectedDays = 'All'; }
	$.post( "<?php print WEB_URL ?>index/getDates", {mmsd:sd1, mmed:ed1, selectedDays:selectedDays},
      function(data) {
		if(data != ''){
			$("#filtering").show();
			//$("#room_id").val(room_plan);
			//$("#capacity").val(data.room_plan[0].capacity);
			$("#monthDates").html('');
			//alert(data.count_days);
			if(data.count_days < 93)
			{

			for(var i=0; i<data.count_days; i++){
				var day = data.dates[i].toString().split(" ");
				$("#monthDates").append('<tr style="border-top:solid 1px #deab6f; border-bottom:solid 1px #deab6f; padding-bottom:2px;"><td  style="border-right:solid 1px #deab6f; text-align:left; width:10%;font-size:11.5px;" id="tdtd">'+data.dates[i]+'<input type="hidden" name="dates[]" value="'+day[0]+'"><input type="hidden" name="weekday[]" value="'+day[1]+'"></td><td style="border-right:solid 1px #deab6f; text-align:center; width:10%;" id="tdtd3"><input name="price[]" type="text" class="input-field"  style="height:20px;  background:#F2F2F2;" size="5"/></td><td style="border-right:solid 1px #deab6f; text-align:center; width:10%;" id="tdtd3"><input name="extra_bed_price[]" type="text" class="input-field"  style="height:20px;  background:#F2F2F2;" size="5"/></td><td style="border-right:solid 1px #deab6f; text-align:center; width:10%;" id="tdtd3"><input name="avail[]" type="text" class="input-field"  style="height:20px;  background:#F2F2F2;" size="5"/></td><td style="border-right:solid 1px #deab6f; text-align:center; width:10%;" id="tdtd3"><input name="adult[]" type="text"  id="adult[]" class="input-field"  style="height:20px;  background:#F2F2F2;" size="5"/></td><td style="border-right:solid 1px #deab6f; text-align:center; width:10%;" id="tdtd3"><input name="child[]" type="text"  id="child[]" class="input-field"  style="height:20px;  background:#F2F2F2;" size="5"/></td><td></td><td style="border-right:solid 1px #deab6f; text-align:center; width:10%;" id="tdtd3"><input name="child_price[]" type="text" class="input-field"  style="height:20px;  background:#F2F2F2;" size="5"/></td><td style="border-right:solid 1px #deab6f; text-align:center; width:10%;" id="tdtd3"><input name="infant[]" type="text" class="input-field"  style="height:20px;  background:#F2F2F2;" size="5"/></td><td style="border-right:solid 1px #deab6f; text-align:center; width:11%;" id="tdtd3"><input name="sup_charge[]" type="text" class="input-field"  style="height:20px;  background:#F2F2F2;" size="5"/></td><td style="border-right:solid 1px #deab6f; text-align:center; width:9%;" id="tdtd3">&nbsp;</td></tr>');
			}
		}
		else
		{
			alert ("Sorry. You can enter only upto 93 days !! ")
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
		document.getElementById('meanPlanRates').style.display = 'block';
		document.getElementById('fullBoard').style.display = 'none';
		//document.getElementById('meanRates').style.display = 'none';
		document.getElementById('supRate').style.display = 'none';
	}
	if(document.getElementById('meal_plan').value=='1'){
		document.getElementById('halfBoard').style.display = 'none';
		//document.getElementById('meanRates').style.display = 'none';
		document.getElementById('fullBoard').style.display = 'block';
		document.getElementById('meanPlanRates').style.display = 'block';
		document.getElementById('supRate').style.display = 'none';
	}
	if(document.getElementById('meal_plan').value=='2'){
		document.getElementById('halfBoard').style.display = 'none';
		document.getElementById('fullBoard').style.display = 'none';
		//document.getElementById('meanRates').style.display = 'none';
		document.getElementById('meanPlanRates').style.display = 'block';
		document.getElementById('supRate').style.display = 'none';
	}
	if(document.getElementById('meal_plan').value=='3'){
		document.getElementById('halfBoard').style.display = 'none';
		document.getElementById('fullBoard').style.display = 'none';
		document.getElementById('meanPlanRates').style.display = 'block';
		document.getElementById('supRate').style.display = 'block';
	}
	if(document.getElementById('meal_plan').value=='4'){
		document.getElementById('halfBoard').style.display = 'none';
		document.getElementById('fullBoard').style.display = 'none';
		//document.getElementById('meanRates').style.display = 'none';
		document.getElementById('meanPlanRates').style.display = 'block';
		document.getElementById('supRate').style.display = 'none';
	}
}
</script>
<script>
function get_more_data()
{
	var a=confirm("Do you want to Add for more dates ?");
	if(a== true)
	{
		document.getElementById("more_dates").value="true";
		
	}
	else 
	{
		document.getElementById("more_dates").value="false";
	}



}
</script>
<script language="javascript">
nights = 0;
function addNights() {
if (nights != 100) {

//$("#rows").append('<table><tr><td><div style="padding-top:2px; margin-left: -17px;">Charge &nbsp; <input type="text" name="cancel_policy_percent[]" size="8"/>% &nbsp;or&nbsp;&nbsp; <input type="text" name="cancel_policy_charge[]" size="8"/>amt &nbsp;&nbsp; Date From&nbsp; <input type="text" name="cancel_policy_from[]" size="8"/> &nbsp;To&nbsp; <input type="text" name="cancel_policy_to[]" size="8"/></div></td></tr></table>');

$("#rowsNight").append('<table><tr><td><div style="padding-top:2px; margin-left:-6px;font-size:13px;">From<input type="text" name="minimum_stay_from[]" size="7"/> &nbsp;To<input type="text" name=minimum_stay_to[]" size="7"/>&nbsp;Nights: <input type="text" name="minimum_stay_nights[]" id="minimum_stay_nights[]" style="width:50px" value="" /></div></td></tr></table>');

nights += 1;
} else {
$("#rowsNight").append('<br />Only 100 upload fields allowed.');
document.form1.addnights.disabled=true;
}
}
</script>
<script language="javascript">
fields = 0;
function addInput() {
if (fields != 100) {
cnt = $("#c_count").val();
id = parseInt(cnt) + 1;
			id1 = id + 1;
$("#rows").append('<table><tr><td><div style="padding-top:2px; margin-left:-7px;font-size:13px;">DayPrior: <input type="text" name="cancel_policy_nights[]" id="cancel_policy_nights[]" size="3" /> Charge<input type="text" name="cancel_policy_percent[]" size="4"/>% &nbsp;or<input type="text" name="cancel_policy_charge[]" size="4"/>Night Charge&nbsp; From<input type="text" name="cancel_policy_from[]" id="datepickercm' + id1 + '_1" size="7"/><input type="hidden"  id="c_from' + id1 + '_1" /> &nbsp;To<input type="text" name="cancel_policy_to[]" id="datepickerdm' + id1 + '_1" size="7"/><input type="hidden"  id="c_to' + id1 + '_1" /></div></td></tr></table>');

$("#datepickercm" + id1 + "_1").datepicker({
				numberOfMonths: 1,
				dateFormat: 'dd-mm-yy',
				minDate: 0,

 onSelect: function(selectedDate){
var xx=$('input[id^="c_from"][id$=_1]').attr('id');
//alert(xx);
document.getElementById("c_from" + id1 + '_1').value=selectedDate;
 }

			});


			$("#datepickerdm" + id1 + "_1").datepicker({
				numberOfMonths: 1,
				dateFormat: 'dd-mm-yy',
				minDate: 0,
onSelect: function(selectedDate){
var yy=$('input[id^="c_to"][id$=_1]').attr('id');
//alert("datepickerbm" + id1 + "_1");
//alert("hid_ed" + id1 + '_1');
document.getElementById("c_to" + id1 + '_1').value=selectedDate;
 }
			});	

fields += 1;

$("#c_count").val(id1);

} else {
$("#rows").append('<br />Only 100 upload fields allowed.');
document.form1.add.disabled=true;
}
}
</script>
<script type="text/javascript">
function getBreakfast(){
	if(document.getElementById('breakfast').checked){
		document.getElementById('breakfast_rate').style.display = 'block';
	}
	else{
		document.getElementById('breakfast_rate').style.display = 'none';
	}
}
function getBreakfast1(){
	if(document.getElementById('break_fast').checked){
		document.getElementById('full_board_breakfast').style.display = 'block';
	}
	else{
		document.getElementById('full_board_breakfast').style.display = 'none';
	}
}
</script>
<script type="text/javascript">
f = 0;
function addPeriod() 
{
	
if (f != 25) {
cnt = $("#f_count").val();
id = parseInt(cnt) + 1;
			id1 = id + 1;
$("#rows1").append('<table><tr><td style="width:183px;"></td><td>&nbsp;</td><td style="width:120px;"><input name="sd[]" id="datepickeram' + id1 + '_1" type="text" class="b2b-txtbox"  style="width:100px; height:18px;"/><input type="hidden"  id="hid_sd' + id1 + '_1" /></td><td>&nbsp;</td><td style="width:120px;"><input id="datepickerbm' + id1 + '_1" name="ed[]" type="text" class="b2b-txtbox"  style="width:100px; height:18px;"/><input type="hidden" id="hid_ed' + id1 + '_1" /></td><td style="width:20px;"></td><td colspan="3"></td><td colspan="2" align="left"></td></tr></table>');
$("#datepickeram" + id1 + "_1").datepicker({
				numberOfMonths: 1,
				dateFormat: 'dd-mm-yy',
				minDate: 0
				/*

 onSelect: function(selectedDate){
var xx=$('input[id^="hid_sd"][id$=_1]').attr('id');
//alert(xx);
document.getElementById("hid_sd" + id1 + '_1').value=selectedDate;
 }*/

			});


			$("#datepickerbm" + id1 + "_1").datepicker({
				numberOfMonths: 1,
				dateFormat: 'dd-mm-yy',
				minDate: 0
				/*
onSelect: function(selectedDate){
var yy=$('input[id^="hid_ed"][id$=_1]').attr('id');
//alert("datepickerbm" + id1 + "_1");
//alert("hid_ed" + id1 + '_1');
document.getElementById("hid_ed" + id1 + '_1').value=selectedDate;
 }*/
			});	

			
			f += 1;
			$("#f_count").val(id1);
} else {
$("#rows1").append('<br />Only 25 upload fields allowed.');
document.form1.addperiod.disabled=true;
}
}
</script>
<script>
   
    $(function() {
    $( "#datepickeram" ).datepicker({
    numberOfMonths: 1,
    dateFormat: 'dd-mm-yy',
    
    minDate: 0
    });
    
	$('#datepickeram').change(function(){
    //$t=$(this).val();
    var selectedDate = $(this).datepicker('getDate');
   var sd_val=document.getElementById("datepickeram").value;
   //alert(sd_val);
   document.getElementById("hid_sd").value=sd_val;
    
    });
	
	$( "#datepickerbm" ).datepicker({
    numberOfMonths: 1,
    dateFormat: 'dd-mm-yy',
    
    minDate: 0
    });
    
	
	$('#datepickerbm').change(function(){
    //$t=$(this).val();
    var selectedDate = $(this).datepicker('getDate');
    
    var ed_val=document.getElementById("datepickerbm").value;
   //alert(ed_val);
  document.getElementById("hid_ed").value=ed_val;
    });

	
     });
	 
	 
    </script>
    <script>
   
    $(function() {
    $( "#cancel_from" ).datepicker({
    numberOfMonths: 1,
    dateFormat: 'dd-mm-yy',
    
    minDate: 0
    });
    
	$('#cancel_from').change(function(){
    //$t=$(this).val();
    var selectedDate = $(this).datepicker('getDate');
   var sd_val=document.getElementById("cancel_from").value;
   //alert(sd_val);
   document.getElementById("c_from").value=sd_val;
    
    });
	
	$( "#cancel_to" ).datepicker({
    numberOfMonths: 1,
    dateFormat: 'dd-mm-yy',
    
    minDate: 0
    });
    
	
	$('#cancel_to').change(function(){
    //$t=$(this).val();
    var selectedDate = $(this).datepicker('getDate');
    
    var ed_val=document.getElementById("cancel_to").value;
   //alert(ed_val);
  document.getElementById("c_to").value=ed_val;
    });

	
     });
	 
	 
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
<?php
$sup_id=$this->uri->segment(3);
$prop_id = $this->uri->segment(4);
//echo $sup_id;
//echo $prop_id;

if(isset($prop_id) && $prop_id!="")
{
?>
<ul class="tabs1">
<li><a href="<?php echo WEB_URL;?>index/edit_contact_inform/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>" >Hotel Details </a></li>
<li><a href="<?php echo WEB_URL;?>index/inventory_category_list/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>" id="tabs_active">Inventory Management </a></li>
<li><a href="">Booking Details </a></li>
<li><a href="<?php echo WEB_URL;?>index/accounting/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>">Accounting </a></li>


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

	</ul>
<?php
}
?>
</div>
</div>

<div id="navjam">
<ul class="tabs">
<li><a href="<?php echo site_url('index/inventory_category_list/')?>/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4)?>" >Category Type</a></li>
<li><a href="<?php echo site_url('index/rate_tactics_list/')?>/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4)?>" id="tabs_active">Room Rates</a></li>
<!--<li><a href="<?php echo site_url('index/maintain_month_list/')?>/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4)?>">Maintain by Month</a></li>
--><li><a href="<?php echo site_url('index/open_close_dates/')?>/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4)?>">Open/Close Dates</a></li>
<li><a href="<?php echo site_url('index/house_rules/')?>/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4)?>">Supplier Policy</a></li>
<li><a href="<?php echo site_url('index/extra_service/')?>/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4)?>">Extra Services</a></li>
<li><a href="<?php echo site_url('index/early_bird/')?>/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4)?>">Early Bird Promotion</a></li>
<li><a href="<?php echo site_url('index/view_allotment_list/')?>/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4)?>">Allotment</a></li>
</ul>

</div>

<!-- tab "panes" -->
<div class="panes" style="padding-bottom:10px">
<!--This is the contact information division-->

<div id="containerdount"  class="tab1" style="padding-top:20px;">
   
    <div style="font-weight:normal; float:left; margin-left:20px; font-size:16px;"><strong>Room Rates</strong></div>
    <br />
     <div style="float:right; height:25px;"><a href="<?php echo site_url('index/rate_tactics_list/')?>/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4); ?>" style="color:#099;">Back</a></div>
     
    <div style="margin-left:532px; margin-top:22px;">
        
    <form action='<?php echo WEB_URL; ?>index/add_season/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4); ?>' method='post'>    
    <table>
    <tr><td>
    Add Season
    </td>
    <td>
    <input type='text' name='season'  required value='' />
    <input type='submit' name='submit' value='Add' />
    </td>
    </tr>
    </table> 
    </form>
    </div>
     
    <div style="float:left; margin-left:20px;">
    
     <form name="form1" action="<?php echo WEB_URL; ?>index/add_rate_plan/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4); ?>" method="post">
        <table width="100%" border="0" cellspacing="1" cellpadding="0">
        	<tr height="35">
            <td width="30%"> Market</td>
            <td width="77%"><select name='market_id[]' id='market_id' style="width:150px;" multiple="multiple" required>
                <option value="">Select</option>
               <?php
                $market = $this->Supplier_Model->get_market_available();
                if(isset($market[0]->market_id))
                    {
                    for($i=0;$i<count($market);$i++){
                    ?>
                      <option value="<?php echo $market[$i]->market_id; ?>"><?php echo $market[$i]->market_name; ?></option>
                    <?php	
                    }
                    }
                    ?>          
                </select>
            </td>
            </tr>
            <tr height="35">
            <td width="30%"> Season </td>
            <td width="77%"><select name='season' id='season' style="width:150px;" required>
                <option value="">Select</option>
               <?php
                $cate = $this->Supplier_Model->get_season();
                if(isset($cate[0]->season_id))
                    {
                    for($i=0;$i<count($cate);$i++){
                    ?>
                      <option value="<?php echo $cate[$i]->season_id; ?>"<?php if(isset($rat_tac_details->season_id) && $cate[$i]->season_id == $rat_tac_details->season_id){ echo "selected='selected'"; } ?>><?php echo $cate[$i]->season ?></option>
                    <?php	
                    }
                    }
                    ?>          
                </select>
            </td>
            </tr>
            <tr height="35">
                <td>Category Type, Room Category (Single /Double /Triple etc.):</td>
                <td><select name="category_name" id="category_name" style="width:150px;"  required>
                      <option value="">Select Category</option>
					<?php
                    $cate = $this->Supplier_Model->inventory_cate_type($this->uri->segment(3),$this->uri->segment(4));
					if(isset($cate[0]->sup_inv_cate_type_id))
					{
                    for($i=0;$i<count($cate);$i++){
                    ?>
                      <option value="<?php echo $cate[$i]->sup_inv_cate_type_id; ?>"  <?php if(isset($rat_tac_details->category_type) && $cate[$i]->sup_inv_cate_type_id == $rat_tac_details->category_type){ echo "selected='selected'"; } ?>><?php echo $cate[$i]->cate_type.' '.$cate[$i]->room_type; ?></option>
					<?php	
                    }
					}
                    ?>
                    </select><span style="color:#FF0000;"> <?php echo form_error('category_name');?></span></td>
            </tr>
         
           
            <tr height="35">
                <td colspan="2" style="padding-top:20px;"><b>Room Plan</b></td>
            </tr>

            <tr height="35">
                <td>Occupancy:</td>
                <td><select name="occupancy" id="occupancy" style="width:150px;" required>
                      <option value="">Select capacity</option>
                    <?php
                    for($j=1;$j<=20;$j++){
                    ?>
                      <option value="<?php echo $j; ?>" <?php if(isset($rat_tac_details->occupancy) && $j == $rat_tac_details->occupancy){ echo "selected='selected'"; } ?>><?php echo $j; ?></option>
					<?php	
                    }
                    ?>
                    </select><span style="color:#FF0000;"> <?php echo form_error('occupancy');?></span></td>
            </tr>
            <tr height="35">
                <td>Adult: </td>
                <td>
                
                 <input type="text" id="no_of_adults" name="no_of_adults" value="<?php if(isset($rat_tac_details->adult) && $rat_tac_details->adult!='') echo $rat_tac_details->adult; ?>" />
             <span style="color:#FF0000;"> <?php echo form_error('no_of_adults');?></span></td>
            </tr>
            <tr height="35">
                <td>Child: </td>
                <td>
                  <input type="text" id="no_of_childs" name="no_of_childs" value="<?php if(isset($rat_tac_details->child) && $rat_tac_details->child!='') echo $rat_tac_details->child; ?>" />
                
                &nbsp; Below <input type="text" id="child_below_age" name="child_below_age" value="<?php if(isset($rat_tac_details->child_below_age) && $rat_tac_details->child_below_age!='')echo $rat_tac_details->child_below_age; ?>" size="5"/> age<span style="color:#FF0000;"> <?php echo form_error('child');?></span></td>
            </tr>
            <tr height="35">
                <td>&nbsp; </td>
               <td><span style="margin-left:150px;">&nbsp;</span> Above <input type="text" id="child_above_age" name="child_above_age" value="<?php if(isset($rat_tac_details->child_above_age) && $rat_tac_details->child_above_age!='')echo $rat_tac_details->child_above_age; ?>" size="5"/> age&nbsp;&nbsp;&nbsp;&nbsp; charge
                <input type="text" id="child_above_age_charge" name="child_above_age_charge" value="<?php if(isset($rat_tac_details->child_above_age_charge) && $rat_tac_details->child_above_age_charge!='') {echo $rat_tac_details->child_above_age_charge;} ?>" size="5"/>&nbsp;</td>
            </tr>
            
              <tr height="35">
                <td>Child Extra Bed Charge: </td>
                <td><input type="text" id="child_extra_bed_charge" name="child_extra_bed_charge" value="<?php if(isset($rat_tac_details->child_extra_bed_charge) && $rat_tac_details->child_extra_bed_charge != '0')  echo $rat_tac_details->child_extra_bed_charge; ?>" /></td>
            </tr>
            
            <tr height="35">
                <td>Infant: </td>
                <td><input type="text" id="no_of_infants" name="no_of_infants" value="<?php if(isset($rat_tac_details->infant) && $rat_tac_details->infant != '0')  echo $rat_tac_details->infant; ?>" /></td>
            </tr>
            
          
            <tr height="35">
                 <td>Meal plan <!--(Room Only basis)-->:</td>
                <td><select name="meal_plan" id="meal_plan" style="width:150px;" onchange="getMealBoard();">
                      <option value="">Select Meal plan</option>
                      <option value="0">Half Board</option>
                      <option value="1">Full Board</option>
                      <option value="2">Room Only</option>
                      <option value="3">All Inclusive</option>
                      <option value="4">Break-Fast</option>
                    </select>
                </td>
            </tr>
           <tr height="">
                <td></td>
                <td id="halfBoard" style="display:none;" colspan="2">
                <input type="radio" id="meal_plan_lunch" name="meal_plan_lunch" value="Lunch"/>Lunch &nbsp;
                <input type="radio" id="meal_plan_lunch" name="meal_plan_lunch" value="Dinner"/>Dinner &nbsp; 
                 <input type="checkbox" id="meal_plan_breakfast" name="meal_plan_breakfast" value="Breakfast" />Break-Fast
                
                </td>
            </tr>
            <tr height="">
                <td></td>
                <td id="fullBoard" style="display:none;" colspan="2">
                <input type="checkbox" id="lunch" name="lunch" value="Lunch"/>Lunch &nbsp;
                <input type="checkbox" id="dinner" name="dinner" value="Dinner"/>Dinner &nbsp; 
                <input type="checkbox" name="meal_plan_breakfast" value="Breakfast" />Break-Fast

                </td>
            </tr>
            
            
            <tr>
                <td></td>
                <td id="meanPlanRates" style="display:none;">
              <br />   
           Breakfast Type: <input type="text" name="breakfast_type" value="<?php if(isset($rat_tac_details->breakfast_type) && $rat_tac_details->breakfast_type != '') echo $rat_tac_details->breakfast_type; ?>" />
           <br />
           Adult Meal Rates:- Breakfast:<input type="text" name="adult_meal_plan_breakfast_rate" size="5" value="<?php if(isset($rat_tac_details->adult_meal_plan_breakfast_rate) && $rat_tac_details->adult_meal_plan_breakfast_rate != '0') echo $rat_tac_details->adult_meal_plan_breakfast_rate; ?>"/>amt,
           &nbsp;Lunch:<input type="text" name="adult_meal_plan_lunch_rate" size="5" value="<?php if(isset($rat_tac_details->adult_meal_plan_lunch_rate) && $rat_tac_details->adult_meal_plan_lunch_rate != '0') echo $rat_tac_details->adult_meal_plan_lunch_rate; ?>"/>amt,
           &nbsp;Dinner:<input type="text" name="adult_meal_plan_dinner_rate"  size="5" value="<?php if(isset($rat_tac_details->adult_meal_plan_dinner_rate) && $rat_tac_details->adult_meal_plan_dinner_rate != '0') echo $rat_tac_details->adult_meal_plan_dinner_rate; ?>"/>amt    
             <br /> 
             
             Child Meal Rates:- Breakfast:<input type="text" name="child_meal_plan_breakfast_rate" size="5" value="<?php if(isset($rat_tac_details->child_meal_plan_breakfast_rate) && $rat_tac_details->child_meal_plan_breakfast_rate != '0') echo $rat_tac_details->child_meal_plan_breakfast_rate; ?>"/>amt,
           &nbsp;Lunch:<input type="text" name="child_meal_plan_lunch_rate" size="5" value="<?php if(isset($rat_tac_details->child_meal_plan_lunch_rate) && $rat_tac_details->child_meal_plan_lunch_rate != '0') echo $rat_tac_details->child_meal_plan_lunch_rate; ?>"/>amt,
           &nbsp;Dinner:<input type="text" name="child_meal_plan_dinner_rate"  size="5" value="<?php if(isset($rat_tac_details->child_meal_plan_dinner_rate) && $rat_tac_details->child_meal_plan_dinner_rate != '0') echo $rat_tac_details->child_meal_plan_dinner_rate; ?>"/>amt    
                </td>
            </tr>
            
            <tr height="">
                <td></td>
                <td id="supRate" style="display:none;" colspan="2">
Supplement Rate:<input type="text" name="supplement_rate" size="5" value="<?php if(isset($rat_tac_details->supplement_rate) && $rat_tac_details->supplement_rate != '0') echo $rat_tac_details->supplement_rate; ?>"/>amt
				</td>
            </tr>

             <!--<tr>
                <td></td>
                <td id="meanRates" style="display:none;">
              <br />   
           Breakfast Type: <input type="text" name="breakfast_type" value="<?php if(isset($rat_tac_details->breakfast_type) && $rat_tac_details->breakfast_type != '') echo $rat_tac_details->breakfast_type; ?>" />
           <br />
           Adult Meal Rates:- Breakfast:<input type="text" name="adult_meal_plan_breakfast_rate" size="5" value="<?php if(isset($rat_tac_details->adult_meal_plan_breakfast_rate) && $rat_tac_details->adult_meal_plan_breakfast_rate != '0') echo $rat_tac_details->adult_meal_plan_breakfast_rate; ?>"/>amt,
           &nbsp;Lunch:<input type="text" name="adult_meal_plan_lunch_rate" size="5" value="<?php if(isset($rat_tac_details->adult_meal_plan_lunch_rate) && $rat_tac_details->adult_meal_plan_lunch_rate != '0') echo $rat_tac_details->adult_meal_plan_lunch_rate; ?>"/>amt,
           &nbsp;Dinner:<input type="text" name="adult_meal_plan_dinner_rate"  size="5" value="<?php if(isset($rat_tac_details->adult_meal_plan_dinner_rate) && $rat_tac_details->adult_meal_plan_dinner_rate != '0') echo $rat_tac_details->adult_meal_plan_dinner_rate; ?>"/>amt    
             <br /> 
             
             Child Meal Rates:- Breakfast:<input type="text" name="child_meal_plan_breakfast_rate" size="5" value="<?php if(isset($rat_tac_details->child_meal_plan_breakfast_rate) && $rat_tac_details->child_meal_plan_breakfast_rate != '0') echo $rat_tac_details->child_meal_plan_breakfast_rate; ?>"/>amt,
           &nbsp;Lunch:<input type="text" name="child_meal_plan_lunch_rate" size="5" value="<?php if(isset($rat_tac_details->child_meal_plan_lunch_rate) && $rat_tac_details->child_meal_plan_lunch_rate != '0') echo $rat_tac_details->child_meal_plan_lunch_rate; ?>"/>amt,
           &nbsp;Dinner:<input type="text" name="child_meal_plan_dinner_rate"  size="5" value="<?php if(isset($rat_tac_details->child_meal_plan_dinner_rate) && $rat_tac_details->child_meal_plan_dinner_rate != '0') echo $rat_tac_details->child_meal_plan_dinner_rate; ?>"/>amt   </br> 
            Supplement Rate:<input type="text" name="supplement_rate" size="5" value="<?php if(isset($rat_tac_details->supplement_rate) && $rat_tac_details->supplement_rate != '0') echo $rat_tac_details->supplement_rate; ?>"/>amt
                </td>
            </tr>-->
            
            <tr height="35">
                <td valign="top">Child Policy:</td>
               
                <td>
                  
                    <textarea name="child_policy" id="child_policy" cols="50" rows="4">
                 <?php 
				//$supplier_id = $this->session->userdata('supplier_id');
				$policy = $this->Supplier_Model->get_child_policy($this->uri->segment(4));
				   if(isset($policy->child_policy)) {echo $policy->child_policy; }
				   ?>
                   
                </textarea></td>
            </tr>
            <tr height="35">
                <td valign="top">Remarks:</td>
                <td><textarea name="remarks" id="remarks" cols="50" rows="4"></textarea></td>
            </tr>
            <tr><td>&nbsp;</td><td>&nbsp;</td>
            </tr>
            <tr>
                <td valign="top">Cancellation Policy: </td>
                <td style="color:#999;"> Date Format should be dd-mm-yyyy
                	</td>
            </tr>
            <tr>
                <td valign="top">&nbsp; </td>
                <td style="font-size:13px;">
                    DayPrior: <input type="text" name="cancel_policy_nights[]" id="cancel_policy_nights[]" size="3" />
<!--                <select name="cancel_policy_nights[]" id="cancel_policy_nights[]" style="width:60px;">
                      	<option value=""> Nights</option>
                      	<option value="1 night" >1 Night</option>
                        <option value="2 nights" >2 Nights</option>
                        <option value="3 nights" >3 Nights</option>
                        <option value="4 nights" >4 Nights</option>
                        <option value="5 nights" >5 Nights</option>
                        <option value="6 nights" >6 Nights</option>
                        <option value="7 nights" >7 Nights</option>
                    </select>&nbsp;-->
                	Charge<input type="text" id="cancel_policy_percent[]" name="cancel_policy_percent[]" size="4"/>%&nbsp;
                    or<input type="text" id="cancel_policy_charge[]" name="cancel_policy_charge[]" size="4"/>Night Charge&nbsp;
                    From<input type="text" id="cancel_from" name="cancel_policy_from[]" size="7"/>&nbsp;
                    <input type="hidden" id="c_from" />&nbsp;
                    To<input type="text" id="cancel_to" name="cancel_policy_to[]" size="7"/>
                    <input type="hidden" id="c_to" />
                    &nbsp;<input type="button" onclick="addInput()" name="add" value="+ Add" />
                	</td>
                	<input type="hidden" id="c_count" name="c_count" value="4"/>
            </tr>
            
            	<tr>
                <td>&nbsp;</td>
                <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td id="rows" align="left">
                    </td>
                  </tr>
                </table>
                </td></tr>
                
                <tr>
                <td>&nbsp;</td>
                <td><textarea name="cancel_policy_desc" id="cancel_policy_desc" cols="50" rows="4"><?php if(isset($policy->cancel_policy_desc)) {echo $policy->cancel_policy_desc;} ?></textarea></td>
                </tr>
                
                
                <tr>
                <td valign="top">Minimum Stay: </td>
                <td style="color:#999;"> Date Format should be dd-mm-yyyy
                
                	</td>
            </tr>
            <tr>
                <td valign="top">&nbsp; </td>
                <td style="font-size:13px;">
                  
                    From<input type="text" id="minimum_stay_from[]" name="minimum_stay_from[]" size="7"/>&nbsp;
                    To<input type="text" id="minimum_stay_to[]" name="minimum_stay_to[]" size="7"/>
                    
                     Nights: <input type="text" name="minimum_stay_nights[]" id="minimum_stay_nights[]" style="width:50px" value="" />
                    &nbsp;<input type="button" onclick="addNights()" name="addnights" value="+ Add" />
                	</td>
            </tr>
            
            	<tr>
                <td>&nbsp;</td>
                <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td id="rowsNight" align="left">
                    </td>
                  </tr>
                </table>
                </td></tr>
               <tr height="35">
                <td valign="top">Booking code:</td>
                <td><input type="text" name="booking_code" value="" /></td>
            </tr>  
            
            <tr height="35">
                <td colspan="2" style="padding-top:20px;"><b>Room Rates</b></td>
            </tr>
        </table>
    <!--</form>   
        
    <form action="<?php echo WEB_URL; ?>index/maintain_by_month/<?php echo $this->uri->segment(3); ?>" method="post">-->

    <input type="hidden" id="apartfec_val" name="apartfec_val" value=""/>
    <input type="hidden" name="month" id="month" value=""/>
    <input type="hidden" name="year" id="year" value=""/>   
    <div style="margin-top:5px;">
    <table style="margin-left:10px;" width="100%">
    <tr>
    <td><!--Select Category and Plan Type--></td>
    <td></td>
    <td>From</td>
    <td></td>
    <td>To</td>
    <td></td>
    <td colspan="2" style="border-bottom:solid 0px #666"><strong>Day</strong> <span style="float:right;"><input name="all_day" id="all_day" type="checkbox" value="" onclick="return check_all();" /> <strong>Check All</strong></span>
    <!--<input type="checkbox" id="supplementary" name="supplementary" value="1"/> Supplementary charge -->
    </td>
    <td><!--<input type="text" id="supplementary_charge_rate" name="supplementary_charge_rate" size="5"/>--></td>
    </tr>
    
    <tr>
    <td style="width:250px;"> Room Available Dates:
        </td>
        <td >&nbsp;</td>
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
        $( "#datepicker2" ).datepicker({
        numberOfMonths: 1,
        dateFormat: 'dd-mm-yy',
        
        minDate: 0
        });
        $( "#datepicker3" ).datepicker({
        numberOfMonths: 1,
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
        }
        });
        
        });
        </script>
        <?php
            $current_dte = date("d-m-Y",strtotime("+7 days"));
            $next_dte = date("d-m-Y",strtotime("+8 days"));
        ?>
    <td style="width:120px;"><input name="sd[]" id="datepickeram"  onchange="javascript:return check_night_valued(this.value)" type="text" class="b2b-txtbox"  style=" background-image: url('<?php echo WEB_DIR_FRONT; ?>images/b2b-calicon.png');background-repeat:no-repeat;background-position:right center;width:100px; height:18px;"/><input type="hidden" id="hid_sd" /></td>
    <td >&nbsp;</td>
    <td  style="width:120px;"><span id="out"><input name="ed[]" id="datepickerbm" onchange="javascript:return check_night_valued(this.value)" type="text" class="b2b-txtbox" style=" background-image: url('<?php echo WEB_DIR_FRONT; ?>images/b2b-calicon.png'); background-repeat:no-repeat;background-position:right center;width:100px; height:18px;"/></span><input type="hidden" id="hid_ed" /></td>
     <td style="width:20px;">
     	<input type="hidden" id="f_count" name="f_count" value="4"/>
     <input type="button" onclick="addPeriod()" name="addperiod" value="+ Add Period" />
      </td>
    <td colspan="3" id="day">
            <input name="day" id="dayy" type="checkbox" value="Mon" style="margin-right:5px;"/>Mon &nbsp; 
            <input name="day" id="dayy" type="checkbox" value="Tue" style="margin-right:5px;"/>Tue &nbsp;
            <input name="day" id="dayy" type="checkbox" value="Wed" style="margin-right:5px;"/>Wed &nbsp;
            <input name="day" id="dayy" type="checkbox" value="Thu" style="margin-right:5px;"/>Thu<br />
            <input name="day" id="dayy" type="checkbox" value="Fri" style="margin-right:5px;"/>Fri &nbsp;
            <input name="day" id="dayy" type="checkbox" value="Sat" style="margin:5px 6px;"/>Sat &nbsp;
            <input name="day" id="dayy" type="checkbox" value="Sun" style="margin-right:5px;"/>Sun
            
                 </td>
    <td colspan="2"><input name="" type="button"  value="submit" onclick="getDates();"/></td>
    </tr>
    </table>
    
    <table width="700">
        <tr>
      
        <td id="rows1"></td>
        
        </tr>
       
        </table>
    </div>
        
    
    <div id="filtering" style="coloir:#fff; width:100%; background:#f8f8f8; display:none;">
    <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0" class="display tableStatic">
    
    <tr style="background:#243419"  height="45">
    <td style="border-right:solid 1px #deab6f; text-align:center; padding-top:3px; color:#fff; padding-left:0px;">Smart Update</td>
    
    <td style="border-right:solid 1px #deab6f; text-align:center; padding-left:0px;"><input name="price" id="price" type="text" class="input-field"  style="height:20px; margin-top:3px; background:#F2F2F2;" size="5"/></td>
    <td style="border-right:solid 1px #deab6f; text-align:center; padding-left:0px;"><input name="extra_bed_price" id="extra_bed_price" type="text" class="input-field"  style="height:20px; margin-top:3px; background:#F2F2F2;" size="5"/></td>
    <td style="border-right:solid 1px #deab6f; text-align:center; padding-left:0px;"><input name="avail" id="avail" type="text" class="input-field"  style="height:20px; margin-top:3px; background:#F2F2F2;" size="5"/></td>
    <td style="border-right:solid 1px #deab6f; text-align:center; padding-left:0px;"><input name="adult" id="adult" type="text" class="input-field"  style="height:20px; margin-top:3px; background:#F2F2F2;" size="5"/></td>
    <td style="border-right:solid 1px #deab6f; text-align:center; padding-left:0px;">   <input name="child" id="child" type="text" class="input-field"  style="height:20px; margin-top:3px; background:#F2F2F2;" size="5"/></td>
     <td style="border-right:solid 1px #deab6f; text-align:center; padding-left:0px;"><input name="child_price" id="child_price" type="text" class="input-field"  style="height:20px; margin-top:3px; background:#F2F2F2;" size="5"/></td>
    <td style="border-right:solid 1px #deab6f; text-align:center; padding-left:0px;"><input name="infant" id="infant" type="text" class="input-field"  style="height:20px; margin-top:3px; background:#F2F2F2;" size="5"/></td>
    <td style="border-right:solid 1px #deab6f; text-align:center; padding-left:0px;"><input name="sup_charge" id="sup_charge" type="text" class="input-field"  style="height:20px; margin-top:3px; background:#F2F2F2;" size="5"/></td>
    <td style="border-right:solid 1px #deab6f; text-align:center; padding-left:0px;"><input type="button" value="Update" style="margin-top:3px;" onclick="check_new();"/></td>
    </tr>
    
    <tr height="30" style="font-size:12px;">
    <td style="border-right:solid 1px #f8d1a3; text-align:center; width:10%; padding-left:0px;">Dates</td>
    <td style="border-right:solid 1px #f8d1a3; text-align:center; width:10%; padding-left:0px;">Room Charge</td>
    <td style="border-right:solid 1px #f8d1a3; text-align:center; width:10%; padding-left:0px;">Extra Bed Charge</td>
    <td style="border-right:solid 1px #f8d1a3; text-align:center; width:10%; padding-left:0px;">Available Rooms</td>
    <td style="border-right:solid 1px #f8d1a3; text-align:center; width:10%; padding-left:0px;">Adults</td>
    <td style="border-right:solid 1px #f8d1a3; text-align:center; width:10%; padding-left:0px;">Childs</td>
    <td style="border-right:solid 1px #f8d1a3; text-align:center; width:10%; padding-left:0px;">2nd Child Charge</td>
    <td style="border-right:solid 1px #f8d1a3; text-align:center; width:10%; padding-left:0px;">Infants</td>
    <td style="border-right:solid 1px #f8d1a3; text-align:center; width:11%; padding-left:0px;">Supplementary charge</td>
    <td style="border-right:solid 1px #f8d1a3; text-align:center; width:9%; ">&nbsp;</td>
    </tr>
    </table>

<!--<form action="<?php echo WEB_URL; ?>index/add_maintain_month/<?php echo $this->uri->segment(3); ?>" method="post">-->

<table  width="100%" border="0" align="left" cellpadding="0" cellspacing="0" class="display tableStatic" style="background:#fff; margin-top:0px;">

<tr><td>&nbsp;</td></tr>
<span id="monthDates"></span>
<tr>
    <td height="30" style="color:red;">Once you finish all settings please click the "Save" button to save.</td>
</tr>
<input type="hidden" name="cnt" value=""/>
<input type="hidden" name="from" id="from" value=""/>
<input type="hidden" name="to" id="to" value=""/>
<input type="hidden" name="room_id" id="room_id" value=""/>
<input type="hidden" name="capacity" id="capacity" value=""/>

<input type="hidden" name="on_req_checked" id="on_req_checked"/>
<input type="hidden" name="on_arr_checked" id="on_arr_checked"/>
<input type="hidden" name="on_blk_checked" id="on_blk_checked"/>
</table>
<div style="clear:both; height:1px;"></div>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
    <td align="center"><input type="image" src="<?php echo WEB_DIR ?>images/sub_mint_btn_admin.png" onclick="get_more_data()" /></td>
    <input type="hidden" id="more_dates" name="more_dates" />
</tr>
<tr>
	<td height="20" colspan="2">&nbsp;</td>
</tr>
</table>
</div>
</form>
</div>
    
    
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
