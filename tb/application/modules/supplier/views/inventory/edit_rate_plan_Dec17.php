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
//function getDates(){
$(document).ready(function(){	
	var sd = $("#datepicker2").val();
	var ed = $("#datepicker3").val(); 
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
	$.post( "<?php print WEB_URL ?>index/getAvailDates", {mmsd:sd, mmed:ed, rate_id:<?php echo $this->uri->segment(4); ?>, selectedDays:selectedDays},
      function(data) {
		if(data != ''){
			$("#filtering").show();
			$("#monthDates").html('');
			for(var i=0; i<data.avail_dates.length; i++){
				$("#monthDates").append('<tr style="border-top:solid 1px #deab6f; border-bottom:solid 1px #deab6f; padding-bottom:2px;"><td  style="border-right:solid 1px #deab6f; text-align:left; width:10%; font-size:11.5px;" id="tdtd">'+data.avail_dates[i].day+'-'+data.avail_dates[i].month+'-'+data.avail_dates[i].year+' '+data.avail_dates[i].week_day+'<input type="hidden" name="dates[]" value="'+data.avail_dates[i].date+'"><input type="hidden" name="weekday[]" value="'+data.avail_dates[i].week_day+'"></td><td style="border-right:solid 1px #deab6f; text-align:center; width:10%;" id="tdtd3"><input name="price[]" type="text" class="input-field"  style="height:20px;  background:#F2F2F2;" value="'+data.avail_dates[i].rate+'" size="5" /></td><td style="border-right:solid 1px #deab6f; text-align:center; width:10%;" id="tdtd3"><input name="extra_bed_price[]" type="text" class="input-field"  style="height:20px;  background:#F2F2F2;" value="'+data.avail_dates[i].extra_bed_price+'" size="5"/></td><td style="border-right:solid 1px #deab6f; text-align:center; width:10%;" id="tdtd3"><input name="avail[]" type="text" class="input-field"  style="height:20px;  background:#F2F2F2;" value="'+data.avail_dates[i].available_rooms+'" size="5"/></td><td style="border-right:solid 1px #deab6f; text-align:center; width:10%;" id="tdtd3"><select name="adult[]" id="adult[]" style="width:60px;"> <option value="1" '+((data.avail_dates[i].adult =="1" )?"selected":"")+'>1</option> <option value="2" '+((data.avail_dates[i].adult =="2" )?"selected":"")+'>2</option> <option value="3" '+((data.avail_dates[i].adult =="3" )?"selected":"")+'>3</option> <option value="4" '+((data.avail_dates[i].adult =="4" )?"selected":"")+'>4</option> <option value="5" '+((data.avail_dates[i].adult =="5" )?"selected":"")+'>5</option> <option value="6" '+((data.avail_dates[i].adult =="6" )?"selected":"")+'>6</option> </select></td><td style="border-right:solid 1px #deab6f; text-align:center; width:10%;" id="tdtd3"><select name="child[]" id="child[]" style="width:60px;"> <option value="0" '+((data.avail_dates[i].child =="0" )?"selected":"")+'>0</option> <option value="1" '+((data.avail_dates[i].child =="1" )?"selected":"")+'>1</option> <option value="2" '+((data.avail_dates[i].child =="2" )?"selected":"")+'>2</option> </select></td><td></td><td style="border-right:solid 1px #deab6f; text-align:center; width:10%;" id="tdtd3"><input name="child_price[]" type="text" class="input-field"  style=" height:20px;  background:#F2F2F2;" value="'+data.avail_dates[i].child_charge+'" size="5"/></td><td style="border-right:solid 1px #deab6f; text-align:center; width:10%;" id="tdtd3"><input name="infant[]" type="text" class="input-field"  style=" height:20px;  background:#F2F2F2;" value="'+data.avail_dates[i].infant+'" size="5"/></td><td style="border-right:solid 1px #deab6f; text-align:center; width:11%;" id="tdtd3"><input name="sup_charge[]" type="text" class="input-field"  style="height:20px;  background:#F2F2F2;" value="'+data.avail_dates[i].supplementary_charge_rate+'" size="5"/></td><td style="border-right:solid 1px #deab6f; text-align:center; width:9%;" id="tdtd3">&nbsp;</td></tr>');
			}
		} 
	  }
	);
} 
);

function getDates(){
	var sd = $("#datepicker2").val();
	var ed = $("#datepicker3").val(); 
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
	$.post( "<?php print WEB_URL ?>index/getAvailDates", {mmsd:sd, mmed:ed, rate_id:<?php echo $this->uri->segment(4); ?>, selectedDays:selectedDays, da:'days'},
      function(data) {
		if(data != ''){
			$("#filtering").show();
			$("#monthDates").html('');
			for(var i=0; i<data.dates.length; i++){
				var day = data.dates[i].toString().split(" "); 
				$("#monthDates").append('<tr style="border-top:solid 1px #deab6f; border-bottom:solid 1px #deab6f; padding-bottom:2px;"><td style="border-right:solid 1px #deab6f; text-align:left; width:10%;font-size:11.5px;padding-left:0px;" id="tdtd">'+data.dates[i]+'<input type="hidden" name="datess[]" value="'+day[0]+'"><input type="hidden" name="weekday[]" value="'+day[1]+'"></td><td style="border-right:solid 1px #deab6f; text-align:center; width:10%;padding-left:0px;" id="tdtd3"><input name="price[]" type="text" class="input-field" style="height:20px; background:#F2F2F2;" size="5"/></td><td style="border-right:solid 1px #deab6f; text-align:center; width:10%;padding-left:0px;" id="tdtd3"><input name="extra_bed_price[]" type="text" class="input-field" style="height:20px;  background:#F2F2F2;" size="5"/></td><td style="border-right:solid 1px #deab6f;padding-left:0px; text-align:center; width:10%;" id="tdtd3"><input name="avail[]" type="text" class="input-field" style="height:20px; background:#F2F2F2;" size="5"/></td><td style="border-right:solid 1px #deab6f;padding-left:0px; text-align:center; width:10%;" id="tdtd3"><select name="adult[]" id="adult[]" style="width:60px;"> <option value="1" >1</option> <option value="2">2</option> <option value="3">3</option> <option value="4" >4</option> <option value="5" >5</option> <option value="6" >6</option> </select></td><td style="border-right:solid 1px #deab6f; padding-left:0px;text-align:center; width:10%;" id="tdtd3"><select name="child[]" id="child[]" style="width:60px;"> <option value="0">0</option> <option value="1" >1</option> <option value="2">2</option> </select></td><td></td><td style="border-right:solid 1px #deab6f; text-align:center; width:10%;padding-left:0px;" id="tdtd3"><input name="child_price[]" type="text" class="input-field" style="height:20px; background:#F2F2F2;" size="5"/></td><td style="padding-left:0px;border-right:solid 1px #deab6f; text-align:center; width:10%;" id="tdtd3"><input name="infant[]" type="text" class="input-field" style="height:20px; background:#F2F2F2;" size="5"/></td><td style="padding-left:0px;border-right:solid 1px #deab6f; text-align:center; width:11%;" id="tdtd3"><input name="sup_charge[]" type="text" class="input-field" style="height:20px;  background:#F2F2F2;" size="5"/></td><td style="border-right:solid 1px #deab6f; text-align:center; width:9%;" id="tdtd3">&nbsp;</td></tr>');
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
	if(document.getElementById('meal_plan').value=='2'){
		document.getElementById('halfBoard').style.display = 'none';
		document.getElementById('fullBoard').style.display = 'none';
	}
	if(document.getElementById('meal_plan').value=='3'){
		document.getElementById('halfBoard').style.display = 'none';
		document.getElementById('fullBoard').style.display = 'none';
	}
}
</script>

<script language="javascript">
fields = 0;
function addInput() {
if (fields != 10) {

//$("#rows").append('<table><tr><td><div style="padding-top:2px; margin-left: -17px;">Charge &nbsp; <input type="text" name="cancel_policy_percent[]" size="8"/>% &nbsp;or&nbsp;&nbsp; <input type="text" name="cancel_policy_charge[]" size="8"/>amt &nbsp;&nbsp; Date From&nbsp; <input type="text" name="cancel_policy_from[]" size="8"/> &nbsp;To&nbsp; <input type="text" name="cancel_policy_to[]" size="8"/></div></td></tr></table>');

$("#rows").append('<table><tr><td><div style="padding-top:2px; margin-left:-32px;font-size:13px;">Nights: <input type="text" name="cancel_policy_nights[]" id="cancel_policy_nights[]" style="width:50px" value="" />&nbsp;Charge <input type="text" name="cancel_policy_percent[]" size="5"/>% &nbsp;or<input type="text" name="cancel_policy_charge[]" size="5"/>amt&nbsp; Date From<input type="text" name="cancel_policy_from[]" size="7"/> &nbsp;To<input type="text" name="cancel_policy_to[]" size="7"/></div></td></tr></table>');

fields += 1;
} else {
$("#rows").append('<br />Only 10 upload fields allowed.');
document.form.add.disabled=true;
}
}

function getCancelPolicies(room_rate_id){
	$.post("<?php print WEB_URL ?>index/getCancelPolicies", {"room_rate_id":room_rate_id},
	function(data){  
		if(data != "")
		{
			$("#rows").html('');
			//$("#add").show();
			for(var i=0; i<data.can_policies.length; i++)
			{
				//$("#rows").prepend('<table><tr><td><div style="padding-top:2px; margin-left: -17px;">Charge &nbsp; <input type="text" name="cancel_policy_percent[]" value="'+data.can_policies[i].cancel_policy_percent+'" size="8"/>% &nbsp;or&nbsp;&nbsp; <input type="text" name="cancel_policy_charge[]" value="'+data.can_policies[i].cancel_policy_charge+'" size="8"/>amt &nbsp;&nbsp; Date From&nbsp; <input type="text" name="cancel_policy_from[]" value="'+data.can_policies[i].cancel_policy_from+'" size="8"/> &nbsp;To&nbsp; <input type="text" name="cancel_policy_to[]" value="'+data.can_policies[i].cancel_policy_to+'" size="8"/></div></td></tr></table>');
				
				$("#rows").prepend('<table><tr><td><div style="padding-top:2px; margin-left:-32px;font-size:13px;">Nights: <input type="text" name="cancel_policy_nights[]" id="cancel_policy_nights[]" style="width:50px" value="'+data.can_policies[i].cancel_policy_charge+'" />Charge <input type="text" name="cancel_policy_percent[]" value="'+data.can_policies[i].cancel_policy_percent+'" size="5"/>% &nbsp;or<input type="text" name="cancel_policy_charge[]" value="'+data.can_policies[i].cancel_policy_charge+'" size="5"/>amt&nbsp; Date From<input type="text" name="cancel_policy_from[]" value="'+data.can_policies[i].cancel_policy_from+'" size="7"/> &nbsp;To<input type="text" name="cancel_policy_to[]" value="'+data.can_policies[i].cancel_policy_to+'" size="7"/></div></td></tr></table>');
			}
		}
	});
}

<?php if(isset($id) && $id!='') ?>
getCancelPolicies( <?php echo $id;?>);
</script>
</head>
<body>
<?php $this->load->view('header'); ?>



<?php //echo $this->uri->segment(4); ?>

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
<li><a href="<?php echo site_url('index/inventory_category_list/')?>/<?php echo $this->uri->segment(3); ?>">Category Type</a></li>
<li><a href="<?php echo site_url('index/rate_tactics_list/')?>/<?php echo $this->uri->segment(3); ?>" id="tabs_active">Room Rates</a></li>
<!--<li><a href="<?php echo site_url('index/maintain_month_list/')?>/<?php echo $this->uri->segment(3); ?>">Maintain by Month</a></li>
--><li><a href="<?php echo site_url('index/open_close_dates/')?>/<?php echo $this->uri->segment(3); ?>">Open/Close Dates</a></li>
<li><a href="<?php echo site_url('index/house_rules/')?>/<?php echo $this->uri->segment(3); ?>">Supplier Policy</a></li>
<li><a href="<?php echo site_url('index/extra_service/')?>/<?php echo $this->uri->segment(3); ?>">Extra Services</a></li>
<li><a href="<?php echo site_url('index/early_bird/')?>/<?php echo $this->uri->segment(3); ?>">Promotion</a></li>
</ul>
</div>
</div>

<!-- tab "panes" -->
<div class="panes">
	
  <div id="containerdount"  class="tab1" style="padding-top:40px;">
   
    <div style="font-weight:normal; float:left; margin-left:20px; font-size:16px;"><strong>Room Rates</strong></div>
    <br />
     <div style="float:right; height:25px;"><a href="<?php echo site_url('index/rate_tactics_list/')?>/<?php echo $this->uri->segment(3); ?>" style="color:#099;">Back</a></div>
    <div style="float:left; margin-left:20px;">
    
    <form name="form1" action="<?php echo WEB_URL; ?>index/edit_rate_plan/<?php echo $prop_id; ?>/<?php echo $id; ?>" method="post">
        <table width="100%" border="0" cellspacing="1" cellpadding="0">
            <tr height="35">
                <td width="29%"> Season </td>
                <td width="71%">
                <select name='season' id='season' style="width:150px;">
                <option value="">Select</option>
                <?php
                $cate = $this->Supplier_Model->get_season();
                if(isset($cate[0]->season_id))
                    {
                    for($i=0;$i<count($cate);$i++){
                    ?>
                      <option value="<?php echo $cate[$i]->season_id; ?>"<?php if($cate[$i]->season_id == $rat_tac_details->season_id){ echo "selected='selected'"; } ?>><?php echo $cate[$i]->season ?></option>
                    <?php	
                    }
                    }
                    ?>          
                </select>
                </td>
            </tr>
            <tr height="35">
                <td>Category Type, Room Category <br />(Single /Double /Triple etc.):</td>
                <td><select name="category_name" id="category_name" style="width:150px;">
                      <option value="">Select Category</option>
					<?php
                    $cate = $this->Supplier_Model->inventory_cate_type($this->uri->segment(3));
					if(isset($cate[0]->sup_inv_cate_type_id))
					{
                    for($i=0;$i<count($cate);$i++){
                    ?>
                      <option value="<?php echo $cate[$i]->sup_inv_cate_type_id; ?>"  <?php if($cate[$i]->sup_inv_cate_type_id == $rat_tac_details->category_type){ echo "selected='selected'"; } ?>><?php echo $cate[$i]->cate_type.' '.$cate[$i]->room_type; ?></option>
					<?php	
                    }
					}
                    ?>
                    </select><span style="color:#FF0000;"> <?php echo form_error('category_name');?></span></td>
            </tr>
            
            <!--<tr height="35">
                <td colspan="2" style="padding-top:15px;"><b>Allocations</b></td>
            </tr>-->
            
            <!--<tr> 
            <td colspan="2"><table width="1111" style="border:#999 solid 0px; width:890px;">
           
            <tr height="35">
                <td width="249">No of Rooms:</td>
                <td width="629"><input type="text" id="allocation_rooms" name="allocation_rooms" value="<?php echo $rat_tac_details->allocation_rooms; ?>"/><span style="color:#FF0000;"> <?php echo form_error('allocation_rooms');?></span></td>
            </tr>
            <tr height="35">
                <td>Release Period:</td>
                <td><input type="text" id="allocation_release_days" name="allocation_release_days" value="<?php echo $rat_tac_details->allocation_release_days; ?>" size="5"/>&nbsp;days&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" id="allocation_release_period" name="allocation_release_period" value="<?php echo $rat_tac_details->allocation_release_period; ?>" size="5"/>&nbsp;hrs<span style="color:#FF0000;"> <?php echo form_error('allocation_release_period');?></span></td>
            </tr>
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
				
				$sd = $rat_tac_details->allocation_validity_from;
				$sds = explode("-",$sd);
				$strd = $sds[2].'-'.$sds[1].'-'.$sds[0];
				$ed = $rat_tac_details->allocation_validity_to;
				$eds = explode("-",$ed);
				$endd = $eds[2].'-'.$eds[1].'-'.$eds[0];
            ?>
            <tr height="35">
                <td>Validity From:</td>
                <td><input value="<?php echo $strd; ?>" name="sds" id="datepicker"  onchange="javascript:return check_night_valued(this.value)" type="text" class="b2b-txtbox"  style=" background-image: url('<?php echo WEB_DIR; ?>images/b2b-calicon.png');background-repeat:no-repeat;background-position:right center;width:100px; height:18px;"/> &nbsp; 
                	To <span id="out"><input value="<?php echo $endd; ?>" name="eds" id="datepicker1" onchange="javascript:return check_night_valued(this.value)" type="text" class="b2b-txtbox" style=" background-image: url('<?php echo WEB_DIR; ?>images/b2b-calicon.png'); background-repeat:no-repeat;background-position:right center;width:100px; height:18px;"/></span></td>
            </tr></table></td>
            </tr>-->
            
            <tr height="35">
                <td colspan="2" style="padding-top:20px;"><b>Room Plan</b></td>
            </tr>

            <tr height="35">
                <td>Occupancy:</td>
                <td><select name="occupancy" id="occupancy" style="width:150px;">
                      <option value="">Select capacity</option>
                    <?php
                    for($j=1;$j<=20;$j++){
                    ?>
                      <option value="<?php echo $j; ?>" <?php if($j == $rat_tac_details->occupancy){ echo "selected='selected'"; } ?>><?php echo $j; ?></option>
					<?php	
                    }
                    ?>
                    </select><span style="color:#FF0000;"> <?php echo form_error('occupancy');?></span></td>
            </tr>
            <tr height="35">
                <td>Adult: </td>
                <td><select name="no_of_adults" id="no_of_adults" style="width:150px;">
                      <option value="">Select Adults</option>
                      <option value="1" <?php if($rat_tac_details->adult == '1'){ echo "selected='selected'"; } ?>>1</option>
                      <option value="2" <?php if($rat_tac_details->adult == '2'){ echo "selected='selected'"; } ?>>2</option>
                      <option value="3" <?php if($rat_tac_details->adult == '3'){ echo "selected='selected'"; } ?>>3</option>
                      <option value="4" <?php if($rat_tac_details->adult == '4'){ echo "selected='selected'"; } ?>>4</option>
                    </select><span style="color:#FF0000;"> <?php echo form_error('adult');?></span></td>
            </tr>
            <tr height="35">
                <td>Child: </td>
                <td><select name="no_of_childs" id="no_of_childs" style="width:150px;">
                      <option value="">Select Childs</option>
                      <option value="0" <?php if($rat_tac_details->child == '0'){ echo "selected='selected'"; } ?>>0</option>
                      <option value="1" <?php if($rat_tac_details->child == '1'){ echo "selected='selected'"; } ?>>1</option>
                      <option value="2" <?php if($rat_tac_details->child == '2'){ echo "selected='selected'"; } ?>>2</option>
                      <option value="3" <?php if($rat_tac_details->child == '3'){ echo "selected='selected'"; } ?>>3</option>
                    </select>&nbsp; Below <input type="text" id="child_below_age" name="child_below_age" value="<?php echo $rat_tac_details->child_below_age; ?>" size="5"/> age<span style="color:#FF0000;"> <?php echo form_error('child');?></span></td>
            </tr>
            <tr height="35">
                <td>&nbsp; </td>
                <td><span style="margin-left:150px;">&nbsp;</span> Above <input type="text" id="child_above_age" name="child_above_age" value="<?php echo $rat_tac_details->child_above_age; ?>" size="5"/> age&nbsp;&nbsp;&nbsp;&nbsp; charge
                <input type="text" id="child_above_age_charge" name="child_above_age_charge" value="<?php echo $rat_tac_details->child_above_age_charge; ?>" size="5"/>&nbsp;</td>
            </tr>
            
            <tr height="35">
                <td>Infant: </td>
                <td><input type="text" id="no_of_infants" name="no_of_infants" value="<?php if(isset($rat_tac_details->infant) && $rat_tac_details->infant != '0')  echo $rat_tac_details->infant; ?>" /></td>
            </tr>
            
            <tr height="35">
                <td>Breakfast:</td>
                <td><input type="radio" id="breakfast" name="breakfast" value="1" <?php if($rat_tac_details->breakfast == '1') { echo "checked='checked' "; } ?>/>Excluded
                <input type="radio" id="breakfast" name="breakfast" value="2" <?php if($rat_tac_details->breakfast == '2') { echo "checked='checked' "; } ?>/>Included
                <input type="radio" id="breakfast" name="breakfast" value="3" <?php if($rat_tac_details->breakfast == '3') { echo "checked='checked' "; } ?>/>Not offered</td>
            </tr>
            <tr height="35">
                <td>Breakfast Type:</td>
                <td><input type="text" id="breakfast_type" name="breakfast_type" value="<?php echo $rat_tac_details->breakfast_type; ?>"/></td>
            </tr>
            <tr height="35">
                <td>Breakfast Hours from:</td>
                <td><select name="breakfast_hrs_from" id="breakfast_hrs_from" style="width:160px;">
							<option value="">Select breakfast from</option> 
					<?php 
					  	$start = strtotime('12am'); 
					for ($i = 0; $i < (24 * 4); $i++) { 
						$tod = $start + ($i * 15 * 60); 
						$display = date('h:i A', $tod); 
						if (substr($display, 0, 2) == '00') { 
							$display = '12' . substr($display, 2); 
						} ?>
						<option value="<?php echo $display; ?>" <?php if($display == $rat_tac_details->breakfast_hrs_from){ echo "selected='selected'"; } ?>><?php echo $display; ?></option>
                    <?php 
					} ?>
					</select>
                  &nbsp;&nbsp;to 
                    <select name="breakfast_hrs_to" id="breakfast_hrs_to" style="width:160px;">
							<option value="">Select breakfast to</option> 
					<?php 
					  	$start = strtotime('12am'); 
					for ($i = 0; $i < (24 * 4); $i++) { 
						$tod = $start + ($i * 15 * 60); 
						$display = date('h:i A', $tod); 
						if (substr($display, 0, 2) == '00') { 
							$display = '12' . substr($display, 2); 
						} ?>
						<option value="<?php echo $display; ?>" <?php if($display == $rat_tac_details->breakfast_hrs_to){ echo "selected='selected'"; } ?>><?php echo $display; ?></option>
                    <?php 
					} ?>
					</select>
                    <span style="color:#FF0000;"> <?php echo form_error('breakfast_hrs_from');?> <?php echo form_error('breakfast_hrs_to');?></span></td>
            </tr>
            <tr height="35">
                <td>Meal plan <!--(Room Only basis)-->:</td>
                <td><select name="meal_plan" id="meal_plan" style="width:150px;" onchange="getMealBoard();">
                      <option value="">Select Meal plan</option>
                      <option value="0" <?php if($rat_tac_details->meal_plan == '0'){ echo "selected='selected'"; } ?>>Half Board</option>
                      <option value="1" <?php if($rat_tac_details->meal_plan == '1'){ echo "selected='selected'"; } ?>>Full Board</option>
                      <option value="2" <?php if($rat_tac_details->meal_plan == '2'){ echo "selected='selected'"; } ?>>Room Only</option>
                      <option value="3" <?php if($rat_tac_details->meal_plan == '3'){ echo "selected='selected'"; } ?>>All Inclusive</option>
                    </select>
                </td>
            </tr>
            <?php if($rat_tac_details->meal_plan == '0'){ ?>
            <tr height="">
                <td></td>
                <td id="halfBoard">
                <input type="radio" id="meal_plan_lunch" name="meal_plan_lunch" value="Lunch" <?php if($rat_tac_details->meal_plan_lunch == 'Lunch') { echo "checked='checked' "; } ?>/>Lunch &nbsp;
                <input type="radio" id="meal_plan_lunch" name="meal_plan_lunch" value="Dinner" <?php if($rat_tac_details->meal_plan_dinner == 'Dinner') { echo "checked='checked' "; } ?>/>Dinner  </td>
            </tr>
            <tr height="">
                <td></td>
                <td id="fullBoard" style="display:none;">
                <input type="checkbox" id="lunch" name="lunch" value="Lunch"/>Lunch &nbsp;
                <input type="checkbox" id="dinner" name="dinner" value="Dinner"/>Dinner  </td>
            </tr>
            <?php } ?>
            
            <?php if($rat_tac_details->meal_plan == '1'){ ?>
            <tr height="">
                <td></td>
                <td id="halfBoard" style="display:none;">
                <input type="radio" id="meal_plan_lunch" name="meal_plan_lunch" value="Lunch"/>Lunch &nbsp;
                <input type="radio" id="meal_plan_lunch" name="meal_plan_lunch" value="Dinner"/>Dinner  </td>
            </tr>
            <tr height="">
                <td></td>
                <td id="fullBoard">
                <input type="checkbox" id="lunch" name="lunch" value="Lunch" <?php if($rat_tac_details->meal_plan_lunch == 'Lunch') { echo "checked='checked' "; } ?>/>Lunch &nbsp;
                <input type="checkbox" id="dinner" name="dinner" value="Dinner" <?php if($rat_tac_details->meal_plan_dinner == 'Dinner') { echo "checked='checked' "; } ?>/>Dinner  </td>
            </tr>
            <?php } ?>
            
            <tr height="35">
                <td valign="top">Child Policy:</td>
                <td><textarea name="child_policy" id="child_policy" cols="50" rows="4"><?php echo $rat_tac_details->child_policy; ?></textarea></td>
            </tr>
            <tr height="35">
                <td valign="top">Remarks:</td>
                <td><textarea name="remarks" id="remarks" cols="50" rows="4"><?php if(isset($rat_tac_details->remarks)) echo $rat_tac_details->remarks; ?></textarea></td>
            </tr>
            <tr><td>&nbsp;</td><td>&nbsp;</td>
            </tr>
            <!--<tr height="130">
                <td valign="top">Cancellation Policy: </td>
                <td>
                	<select name="cancel_policy_nights" id="cancel_policy_nights" style="width:110px;">
                      <option value="">Select nights</option>
                        <option value="1 night" <?php if($rat_tac_details->cancel_policy_nights == '1 night'){ echo "selected='selected'"; } ?>>1 Night</option>
                        <option value="2 nights" <?php if($rat_tac_details->cancel_policy_nights == '2 nights'){ echo "selected='selected'"; } ?>>2 Nights</option>
                        <option value="3 nights" <?php if($rat_tac_details->cancel_policy_nights == '3 nights'){ echo "selected='selected'"; } ?>>3 Nights</option>
                        <option value="4 nights" <?php if($rat_tac_details->cancel_policy_nights == '4 nights'){ echo "selected='selected'"; } ?>>4 Nights</option>
                        <option value="5 nights" <?php if($rat_tac_details->cancel_policy_nights == '5 nights'){ echo "selected='selected'"; } ?>>5 Nights</option>
                        <option value="6 nights" <?php if($rat_tac_details->cancel_policy_nights == '6 nights'){ echo "selected='selected'"; } ?>>6 Nights</option>
                        <option value="7 nights" <?php if($rat_tac_details->cancel_policy_nights == '7 nights'){ echo "selected='selected'"; } ?>>7 Nights</option>
                    </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                   Charge 
                    <input type="text" id="cancel_policy_percent" name="cancel_policy_percent" size="8" value="<?php echo $rat_tac_details->cancel_policy_percent; ?>"/>% &nbsp;or&nbsp;
                    <input type="text" id="cancel_policy_charge" name="cancel_policy_charge" size="8" value="<?php echo $rat_tac_details->cancel_policy_charge; ?>"/><br /><br />
                    <textarea name="cancel_policy_desc" id="cancel_policy_desc" cols="50" rows="4"><?php echo $rat_tac_details->cancel_policy_desc; ?></textarea>
                	</td>
            </tr>-->
            
            <tr>
                <td valign="top">Cancellation Policy: </td>
                <td style="color:#999;"> Date Format should be      dd-mm-yyyy 
                <input type="button" onclick="addInput()" name="add" id="add" value="Add Policy" style="float:right; margin-right:20px;" />
                	</td>
            </tr>
            <!--<tr>
                <td valign="top">&nbsp; </td>
                <td>
                	Charge &nbsp;
                    <input type="text" id="cancel_policy_percent[]" name="cancel_policy_percent[]" size="8"/>% &nbsp;or&nbsp;&nbsp;
                    <input type="text" id="cancel_policy_charge[]" name="cancel_policy_charge[]" size="8"/>amt &nbsp;&nbsp;
                    Date From&nbsp;
                    <input type="text" id="cancel_policy_from[]" name="cancel_policy_from[]" size="8"/> &nbsp;To&nbsp;
                    <input type="text" id="cancel_policy_to[]" name="cancel_policy_to[]" size="8"/>
                    &nbsp;&nbsp;<input type="button" onclick="addInput()" name="add" value="Add More" />
                	</td>
            </tr>-->
            
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
                <td><textarea name="cancel_policy_desc" id="cancel_policy_desc" cols="50" rows="4"><?php  if(isset($rat_tac_details->cancel_policy_desc)) echo $rat_tac_details->cancel_policy_desc; ?></textarea></td>
                </tr>
            
            <tr height="35">
                <td colspan="2" style="padding-top:20px;"><b>Room Rates</b></td>
            </tr>
        </table>
        
        <input type="hidden" id="apartfec_val" name="apartfec_val" value=""/>
        <input type="hidden" name="month" id="month" value=""/>
        <input type="hidden" name="year" id="year" value=""/>   
        <div style="margin-top:5px;">
        <table style="" width="100%">
        <tr>
    <td width="250"><!--Select Category and Plan Type--></td>
    <td width="2"></td>
    <td width="120">From</td>
    <td width="2"></td>
    <td width="120">To</td>
    <td width="232"><strong>Day</strong> <span style="float:right;"><input name="all_day" id="all_day" type="checkbox" value="" onclick="return check_all();" /> <strong>Check All</strong></span></td>
    <td colspan="2" style="border-bottom:solid 0px #666">
    </td>
    </tr>
        
        <tr>
        <td style="width:250px;"> Room Available Dates:
            <!--<select name="room_plan" id="room_plan" class="getfields" style="width:250px; height:30px;" >
            <option value="">Select Category</option>
            <?php
            $rate_tactics = $this->Supplier_Model->rate_tactics_list($this->session->userdata('supplier_id'), $this->uri->segment(3));
            for($i=0;$i<count($rate_tactics);$i++)
            {
                $room_rate_plan = $this->Supplier_Model->get_rate_of_room_plan($rate_tactics[$i]->category_name);
            ?>
                <option value="<?php echo $rate_tactics[$i]->sup_rate_tactics_id; ?>"><?php echo $room_rate_plan->room_type; ?>, <?php echo $rate_tactics[$i]->rooms_type; ?> </option>
            <?php	
                
            }
            ?>
            </select>-->
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
				
				$fm = $rat_tac_details->room_avail_date_from;
				$fmd = explode("-",$fm);
				$fdate = $fmd[2].'-'.$fmd[1].'-'.$fmd[0];
				$td = $rat_tac_details->room_avail_date_to;
				$tda = explode("-",$td);
				$tdate = $tda[2].'-'.$tda[1].'-'.$tda[0];
            ?>
        <td style="width:120px;"><input value="<?php echo $fdate; ?>" name="sd" id="datepicker2"  onchange="javascript:return check_night_valued(this.value)" type="text" class="b2b-txtbox"  style=" background-image: url('<?php echo WEB_DIR; ?>images/b2b-calicon.png');background-repeat:no-repeat;background-position:right center;width:100px; height:18px;"/></td>
        <td >&nbsp;</td>
        <td  style="width:120px;"><span id="out"><input value="<?php echo $tdate; ?>" name="ed" id="datepicker3" onchange="javascript:return check_night_valued(this.value)" type="text" class="b2b-txtbox" style=" background-image: url('<?php echo WEB_DIR; ?>images/b2b-calicon.png'); background-repeat:no-repeat;background-position:right center;width:100px; height:18px;"/></span></td>
        
        <td colspan="3" id="day">
            <input name="day" id="dayy" type="checkbox" value="Mon" style="margin-right:5px;"/>Mon &nbsp; 
            <input name="day" id="dayy" type="checkbox" value="Tue" style="margin-right:5px;"/>Tue &nbsp;
            <input name="day" id="dayy" type="checkbox" value="Wed" style="margin-right:5px;"/>Wed &nbsp;
            <input name="day" id="dayy" type="checkbox" value="Thu" style="margin-right:5px;"/>Thu<br />
            <input name="day" id="dayy" type="checkbox" value="Fri" style="margin-right:5px;"/>Fri &nbsp;
            <input name="day" id="dayy" type="checkbox" value="Sat" style="margin:5px 6px;"/>Sat &nbsp;
            <input name="day" id="dayy" type="checkbox" value="Sun" style="margin-right:5px;"/>Sun
                     </td>
        <td colspan="2" align="left"><input name="" type="button"  value="submit" onclick="getDates();"/></td>
        </tr>
        </table>
        
        </div>
        
        
<div id="filtering" style="coloir:#fff; width:100%; background:#f8f8f8; isplay:none;">
<table width="100%" border="0" align="left" cellpadding="0" cellspacing="0" class="display tableStatic">
    
    <tr style="background:#243419"  height="45">
    <td style="border-right:solid 1px #deab6f; text-align:center; padding-top:3px;color:#fff;padding-left:0px;">Smart Update</td>
    
    <td style="border-right:solid 1px #deab6f; text-align:center;padding-left:0px;"><input name="price" id="price" type="text" class="input-field"  style="height:20px; margin-top:3px; background:#F2F2F2;" size="5" /></td>
    <td style="border-right:solid 1px #deab6f; text-align:center;padding-left:0px;"><input name="extra_bed_price" id="extra_bed_price" type="text" class="input-field"  style="height:20px; margin-top:3px; background:#F2F2F2;" size="5"/></td>
    <td style="border-right:solid 1px #deab6f; text-align:center;padding-left:0px;"><input name="avail" id="avail" type="text" class="input-field"  style="height:20px; margin-top:3px; background:#F2F2F2;" size="5"/></td>
    <td style="border-right:solid 1px #deab6f; text-align:center;padding-left:0px;"><select name="adult" id="adult" style="width:60px;">
                          <option value="">Adults</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                        </select></td>
    <td style="border-right:solid 1px #deab6f; text-align:center;padding-left:0px;"><select name="child" id="child" style="width:60px;">
                          <option value="">Childs</option>
                          <option value="0">0</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                        </select></td>
    <td style="border-right:solid 1px #deab6f; text-align:center; padding-left:0px;"><input name="child_price" id="child_price" type="text" class="input-field" style="height:20px; margin-top:3px; background:#F2F2F2;" size="5"/></td>
    <td style="border-right:solid 1px #deab6f; text-align:center; padding-left:0px;"><input name="infant" id="infant" type="text" class="input-field" style="height:20px; margin-top:3px; background:#F2F2F2;" size="5"/></td>
    <td style="border-right:solid 1px #deab6f; text-align:center; padding-left:0px;"><input name="sup_charge" id="sup_charge" type="text" class="input-field" style="height:20px; margin-top:3px; background:#F2F2F2;" size="5"/></td>
    <td style="border-right:solid 1px #deab6f; text-align:center; padding-left:0px;"><input type="button" value="Update" style="margin-top:3px;" onclick="check_new();"/></td>
    </tr>
    
    <tr height="30" style="font-size:12px;">
    <td style="border-right:solid 1px #f8d1a3; text-align:center; width:10%; padding-left:0px;">Dates</td>
    <td style="border-right:solid 1px #f8d1a3; text-align:center; width:10%; padding-left:0px;">Per Night Charge</td>
    <td style="border-right:solid 1px #f8d1a3; text-align:center; width:10%; padding-left:0px;">Extra Bed Charge</td>
    <td style="border-right:solid 1px #f8d1a3; text-align:center; width:10%; padding-left:0px;">Available Rooms</td>
    <td style="border-right:solid 1px #f8d1a3; text-align:center; width:10%; padding-left:0px;">Adults</td>
    <td style="border-right:solid 1px #f8d1a3; text-align:center; width:10%; padding-left:0px;">Childs</td>
    <td style="border-right:solid 1px #f8d1a3; text-align:center; width:10%; padding-left:0px;">Child Charge</td>
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
    <td align="center"><input type="image" src="<?php echo WEB_DIR ?>images/save-but.png"  /></td>
</tr>
<tr>
	<td height="20" colspan="2">&nbsp;</td>
</tr>
</table>
</div>

</form>
</div>

<!--    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin:20px;">
        <tr>
        <td colspan="5" align="center"><input type="image" src="<?php echo WEB_DIR ?>images/save-but.png"  /></td>
        </tr>
    </table>
    </form>
    
-->    
    </div>

    
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
</div></div>
<div style="clear:both"></div>
<?php $this->load->view('footer'); ?>
</body>
</html>

 <style>
.b2b-AGE_OF2{ width:97px; float: left; color:#fff; font-family:MAIAN; padding:0 0 8px; margin:12px -7px 0 0; color:#000; font-size:12px;}

.check_149{ width:144px; float:right; margin:0 13px 3PX 0; position:relative; left:34px}
</style>