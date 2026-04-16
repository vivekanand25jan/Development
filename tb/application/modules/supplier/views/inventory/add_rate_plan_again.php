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
<script src="<?php echo WEB_DIR; ?>js/thickbox.js"></script>
<link rel="stylesheet" href="<?php echo WEB_DIR; ?>css/thickbox.css">
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
	
		
	var sd = $("#sd").val();
	var ed = $("#ed").val();
	
	
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
	var sd1 = new Array();
	var ed1 = new Array();
	
	for(var p=0; p < document.form1.sd.length; p++)
	{
		
			sd1[p]=document.form1.sd[p].value;
						
		
	}
	
	for(var q=0; q < document.form1.ed.length; q++)
	{
		
			ed1[q]=document.form1.ed[q].value;
					
		
	}
	
	//alert(ed1);
	if(selectedDays == ''){ selectedDays = 'All'; }
	$.post( "<?php print WEB_URL ?>index/getDates", {mmsd:sd1, mmed:ed1, selectedDays:selectedDays},
      function(data) {
		 // alert(data);
		if(data != ''){
			$("#filtering").show();
			//$("#room_id").val(room_plan);
			//$("#capacity").val(data.room_plan[0].capacity);
			$("#monthDates").html('');
			
			for(var i=0; i<data.dates.length; i++){
				var day = data.dates[i].toString().split(" "); 
				$("#monthDates").append('<tr style="border-top:solid 1px #deab6f; border-bottom:solid 1px #deab6f; padding-bottom:2px;"><td  style="border-right:solid 1px #deab6f; text-align:left; width:10%;font-size:11.5px;" id="tdtd">'+data.dates[i]+'<input type="hidden" name="dates[]" value="'+day[0]+'"><input type="hidden" name="weekday[]" value="'+day[1]+'"></td><td style="border-right:solid 1px #deab6f; text-align:center; width:10%;" id="tdtd3"><input name="price[]" type="text" class="input-field"  style="height:20px;  background:#F2F2F2;" size="5"/></td><td style="border-right:solid 1px #deab6f; text-align:center; width:10%;" id="tdtd3"><input name="extra_bed_price[]" type="text" class="input-field"  style="height:20px;  background:#F2F2F2;" size="5"/></td><td style="border-right:solid 1px #deab6f; text-align:center; width:10%;" id="tdtd3"><input name="avail[]" type="text" class="input-field"  style="height:20px;  background:#F2F2F2;" size="5"/></td><td style="border-right:solid 1px #deab6f; text-align:center; width:10%;" id="tdtd3"><select name="adult[]" id="adult[]" style="width:60px;"> <option value="1" >1</option> <option value="2"  >2</option> <option value="3" >3</option> <option value="4" >4</option> <option value="5" >5</option> <option value="6" >6</option> </select></td><td style="border-right:solid 1px #deab6f; text-align:center; width:10%;" id="tdtd3"><select name="child[]" id="child[]" style="width:60px;"> <option value="0" >0</option> <option value="1" >1</option> <option value="2">2</option> </select></td><td></td><td style="border-right:solid 1px #deab6f; text-align:center; width:10%;" id="tdtd3"><input name="child_price[]" type="text" class="input-field"  style="height:20px;  background:#F2F2F2;" size="5"/></td><td style="border-right:solid 1px #deab6f; text-align:center; width:10%;" id="tdtd3"><input name="infant[]" type="text" class="input-field"  style="height:20px;  background:#F2F2F2;" size="5"/></td><td style="border-right:solid 1px #deab6f; text-align:center; width:11%;" id="tdtd3"><input name="sup_charge[]" type="text" class="input-field"  style="height:20px;  background:#F2F2F2;" size="5"/></td><td style="border-right:solid 1px #deab6f; text-align:center; width:9%;" id="tdtd3">&nbsp;</td></tr>');
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

$("#rows").append('<table><tr><td><div style="padding-top:2px; margin-left:-32px;font-size:13px;">Nights: <input type="text" name="cancel_policy_nights[]" id="cancel_policy_nights[]" style="width:50px" value="" />Charge <input type="text" name="cancel_policy_percent[]" size="5"/>% &nbsp;or<input type="text" name="cancel_policy_charge[]" size="5"/>amt&nbsp; Date From<input type="text" name="cancel_policy_from[]" size="7"/> &nbsp;To<input type="text" name="cancel_policy_to[]" size="7"/></div></td></tr></table>');

fields += 1;
} else {
$("#rows").append('<br />Only 10 upload fields allowed.');
document.form1.add.disabled=true;
}
}
</script>
<script language="javascript">
f = 0;
function addPeriod() {
	
if (f != 4) {

$("#rows1").append('<table><tr><td style="width:120px;"><input name="sd[]" id="sd" type="text" class="b2b-txtbox"  style="width:100px; height:18px;"/></td><td></td><td style="width:120px;"><input id="ed" name="ed[]" type="text" class="b2b-txtbox"  style="width:100px; height:18px;"/></td></tr></table>');

f += 1;
} else {
$("#rows1").append('<br />Only 4 upload fields allowed.');
document.form1.addperiod.disabled=true;
}
}
</script>
</head>
<body>

<?php /*$this->load->view('header');*/ ?>
 
<div class="midlebody">
<div class="mainbody_signin">
<div>

<div class="hotelnames_signin" style="min-height:auto;">
<!--<div id="mybook-tit">Inventory Management</div>-->

<div class="" style="margin-top:-20px;">            		
<!-- the tabs -->


<!-- tab "panes" -->
<div class="panes">
	
  <div id="containerdount"  class="tab1" style="padding-top:30px; width:989px; height:auto">
   
      
    <div style="float:left; margin-left:20px;">
    
    
    <form name="form1" action="<?php echo WEB_URL; ?>index/add_rate_plan_again/<?php echo $this->uri->segment(3); ?>" method="post">
        <table width="100%" border="0" cellspacing="1" cellpadding="0">
        
            <tr height="35">
                <td colspan="2" style="padding-top:20px;"><b>Add Room Rates</b></td>
            </tr>
        
            <tr height="35">
            <td width="30%"> Season </td>
            <td width="77%">
               <?php
                $cate = $this->Supplier_Model->get_season();
                if(isset($cate[0]->season_id))
                    {
                    for($i=0;$i<count($cate);$i++){
                    ?>
                      <input type="hidden" value="<?php echo $rat_tac_details->season_id; ?>" name="season" />
					  <?php if(isset($rat_tac_details->season_id) && $cate[$i]->season_id == $rat_tac_details->season_id) {echo $cate[$i]->season; } ?>
                    <?php	
                    }
                    }
                    ?>          
               
            </td>
            </tr>
            <tr height="35">
                <td>Category Type, Room Category (Single /Double /Triple etc.):</td>
                <td>
					<?php
                    $cate = $this->Supplier_Model->inventory_cate_type($this->uri->segment(3));
					if(isset($cate[0]->sup_inv_cate_type_id))
					{
                    for($i=0;$i<count($cate);$i++){
                    ?>
                      <input type="hidden" value="<?php echo $rat_tac_details->category_type; ?>" name="category_name" />
        <?php if(isset($rat_tac_details->category_type) && $cate[$i]->sup_inv_cate_type_id == $rat_tac_details->category_type){ echo $cate[$i]->cate_type.' '.$cate[$i]->room_type; } ?>
					<?php	
                    }
					}
                    ?>
            </td>
            </tr>
                
           
            <tr height="35">
                <td colspan="2" style="padding-top:20px;"><b>Room Plan</b></td>
            </tr>

            
            <tr height="35">
                <td valign="top">Child Policy:</td>
               
                <td>
                  
                    <textarea name="child_policy" id="child_policy" cols="50" rows="4">
                 <?php 
				//$supplier_id = $this->session->userdata('supplier_id');
				$policy = $this->Supplier_Model->get_child_policy($this->uri->segment(3));
				   if(isset($policy->child_policy)) {echo $policy->child_policy; }
				   ?>
                   
                </textarea></td>
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
                    Nights: <input type="text" name="cancel_policy_nights[]" id="cancel_policy_nights[]" style="width:50px" value="" />
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
                	Charge<input type="text" id="cancel_policy_percent[]" name="cancel_policy_percent[]" size="5"/>%&nbsp;
                    or<input type="text" id="cancel_policy_charge[]" name="cancel_policy_charge[]" size="5"/>amt&nbsp;
                    Date From<input type="text" id="cancel_policy_from[]" name="cancel_policy_from[]" size="7"/>&nbsp;
                    To<input type="text" id="cancel_policy_to[]" name="cancel_policy_to[]" size="7"/>
                    &nbsp;<input type="button" onclick="addInput()" name="add" value="+ Add" />
                	</td>
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
    <table style="" width="100%">
    <tr>
    <td width="250"><!--Select Category and Plan Type--></td>
    <td width="2"></td>
    <td width="120">From</td>
    <td width="2"></td>
    <td width="120">To</td>
    <td width="20"></td>
    <td width="232"><strong>Day</strong> <span style="float:right;"><input name="all_day" id="all_day" type="checkbox" value="" onclick="return check_all();" /> <strong>Check All</strong></span></td>
    <td colspan="2" style="border-bottom:solid 0px #666">
    </td>
    </tr>
    
    <tr>
    <td style="width:250px;"> Room Available Dates:
        (dd-mm-yyyy)</td>
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
    <td style="width:120px;"><input name="sd[]" id="sd"  onchange="javascript:return check_night_valued(this.value)" type="text" class="b2b-txtbox"  style=" background-image: url('<?php echo WEB_DIR; ?>images/b2b-calicon.png');background-repeat:no-repeat;background-position:right center;width:100px; height:18px;"/></td>
    <td >&nbsp;</td>
    <td  style="width:120px;"><span id="out"><input name="ed[]" id="ed" onchange="javascript:return check_night_valued(this.value)" type="text" class="b2b-txtbox" style=" background-image: url('<?php echo WEB_DIR; ?>images/b2b-calicon.png'); background-repeat:no-repeat;background-position:right center;width:100px; height:18px;"/></span></td>
    <td  style="width:20px;"><input type="button" onclick="addPeriod()" name="addperiod" value="+ Add Period" />
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
    <tr>
    
    <td colspan="2"></td>
    <td id="rows1">
    </td>
    
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
    <td style="border-right:solid 1px #deab6f; text-align:center; padding-left:0px;"><select name="adult" id="adult" style="width:60px;">
                          <option value="">Adults</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                        </select></td>
    <td style="border-right:solid 1px #deab6f; text-align:center; padding-left:0px;"><select name="child" id="child" style="width:60px;">
                          <option value="">Childs</option>
                          <option value="0">0</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                        </select></td>
     <td style="border-right:solid 1px #deab6f; text-align:center; padding-left:0px;"><input name="child_price" id="child_price" type="text" class="input-field"  style="height:20px; margin-top:3px; background:#F2F2F2;" size="5"/></td>
    <td style="border-right:solid 1px #deab6f; text-align:center; padding-left:0px;"><input name="infant" id="infant" type="text" class="input-field"  style="height:20px; margin-top:3px; background:#F2F2F2;" size="5"/></td>
    <td style="border-right:solid 1px #deab6f; text-align:center; padding-left:0px;"><input name="sup_charge" id="sup_charge" type="text" class="input-field"  style="height:20px; margin-top:3px; background:#F2F2F2;" size="5"/></td>
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
    <td align="center">
    <input type="image" src="<?php echo WEB_DIR ?>images/save-but.png" /></td>
</tr>
<tr>
<td></td>
	<td height="20" colspan="2">&nbsp;</td>
</tr>
</table>
</div>
</form>



</div>
    
    
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

</body>
</html>

 <style>
.b2b-AGE_OF2{ width:97px; float: left; color:#fff; font-family:MAIAN; padding:0 0 8px; margin:12px -7px 0 0; color:#000; font-size:12px;}

.check_149{ width:144px; float:right; margin:0 13px 3PX 0; position:relative; left:34px}
</style>