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

<script type="text/javascript" src="<?php echo WEB_DIR ?>gui/ajax/ajaxsbmt.js"></script>
  
  <script type="text/javascript">
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}

$(document).ready(function(){
	
	var sd = $("#datepicker4").val();
	var ed = $("#datepicker5").val(); 
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
	$.post( "<?php print WEB_URL ?>index/getAvailDatesForPromotion", {mmsd:sd, mmed:ed, promo_id:<?php echo $this->uri->segment(6); ?>, selectedDays:selectedDays},
      function(data) {
		 // alert(data);
		if(data != ''){
			$("#filtering").show();
			$("#monthDates").html('');
			//alert(data.avail_dates[0].day);
			for(var i=0; i<data.avail_dates.length; i++){
				
				$("#monthDates").append('<tr style="border-top:solid 1px #deab6f; border-bottom:solid 1px #deab6f; padding-bottom:2px;"><td  style="border-right:solid 1px #deab6f; text-align:left; width:10%; font-size:11.5px;" id="tdtd">'+data.avail_dates[i].day+'-'+data.avail_dates[i].month+'-'+data.avail_dates[i].year+' '+data.avail_dates[i].week_day+'<input type="hidden" name="dates[]" value="'+data.avail_dates[i].date+'"><input type="hidden" name="weekday[]" value="'+data.avail_dates[i].week_day+'"></td><td style="border-right:solid 1px #deab6f; text-align:center; width:10%;" id="tdtd3"><input name="price[]" type="text" class="input-field"  style="height:20px;  background:#F2F2F2;" value="'+data.avail_dates[i].rate+'" size="5" /></td><td style="border-right:solid 1px #deab6f; text-align:center; width:10%;" id="tdtd3"><input name="extra_bed_price[]" type="text" class="input-field"  style="height:20px;  background:#F2F2F2;" value="'+data.avail_dates[i].extra_bed_price+'" size="5"/></td><td style="border-right:solid 1px #deab6f; text-align:center; width:10%;" id="tdtd3"><input name="avail[]" type="text" class="input-field"  style="height:20px;  background:#F2F2F2;" value="'+data.avail_dates[i].available_rooms+'" size="5"/></td><td style="border-right:solid 1px #deab6f; text-align:center; width:10%;" id="tdtd3"><input name="adult[]" id="adult[]" type="text" class="input-field"  style="height:20px;  background:#F2F2F2;" value="'+data.avail_dates[i].adult+'" size="5"/></td><td style="border-right:solid 1px #deab6f; text-align:center; width:10%;" id="tdtd3"><input name="child[]" id="child[]" type="text" class="input-field"  style="height:20px;  background:#F2F2F2;" value="'+data.avail_dates[i].child+'" size="5"/></td><td></td><td style="border-right:solid 1px #deab6f; text-align:center; width:10%;" id="tdtd3"><input name="child_price[]" type="text" class="input-field"  style=" height:20px;  background:#F2F2F2;" value="'+data.avail_dates[i].child_charge+'" size="5"/></td><td style="border-right:solid 1px #deab6f; text-align:center; width:10%;" id="tdtd3"><input name="infant[]" type="text" class="input-field"  style=" height:20px;  background:#F2F2F2;" value="'+data.avail_dates[i].infant+'" size="5"/></td><td style="border-right:solid 1px #deab6f; text-align:center; width:11%;" id="tdtd3"><input name="sup_charge[]" type="text" class="input-field"  style="height:20px;  background:#F2F2F2;" value="'+data.avail_dates[i].supplementary_charge_rate+'" size="5"/></td><td style="border-right:solid 1px #deab6f; text-align:center; width:9%;" id="tdtd3">&nbsp;</td></tr>');
			}
		} 
	  }
	);
	
});


function get_promotion_rates(promo_id){
    
	$.post("<?php print WEB_URL ?>index/get_promotion_rates", {"promo_id":promo_id},
	function(data){  
            
		if(data != "")
		{
                    
			$("#rows").html('');
			//$("#add").show();
			for(var i=0; i<data.promo_rates.length; i++)
			{
                           
				//$("#rows").prepend('<table><tr><td><div style="padding-top:2px; margin-left: -17px;">Charge &nbsp; <input type="text" name="cancel_policy_percent[]" value="'+data.can_policies[i].cancel_policy_percent+'" size="8"/>% &nbsp;or&nbsp;&nbsp; <input type="text" name="cancel_policy_charge[]" value="'+data.can_policies[i].cancel_policy_charge+'" size="8"/>amt &nbsp;&nbsp; Date From&nbsp; <input type="text" name="cancel_policy_from[]" value="'+data.can_policies[i].cancel_policy_from+'" size="8"/> &nbsp;To&nbsp; <input type="text" name="cancel_policy_to[]" value="'+data.can_policies[i].cancel_policy_to+'" size="8"/></div></td></tr></table>');
				$("#rows").prepend('<table><tr><td><input type="text" name="roomtype[]" value="'+data.promo_rates[i].room_type+'" /><input type="text" name="amount[]" value="'+data.promo_rates[i].amount+'" /></td></tr></table>');
//				$("#rows").prepend('<table><tr><td><div style="padding-top:2px; margin-left:-32px;font-size:13px;"><select name="cancel_policy_nights[]" id="cancel_policy_nights[]" style="width:60px;"><option value="">nights</option><option value="1 night" '+((data.can_policies[i].cancel_policy_nights =="1 night" )?"selected":"")+'>1 Night</option> <option value="2 nights" '+((data.can_policies[i].cancel_policy_nights =="2 nights" )?"selected":"")+'>2 Nights</option> <option value="3 nights" '+((data.can_policies[i].cancel_policy_nights =="3 nights" )?"selected":"")+'>3 Nights</option> <option value="4 nights" '+((data.can_policies[i].cancel_policy_nights =="4 nights" )?"selected":"")+'>4 Nights</option>  <option value="5 nights" '+((data.can_policies[i].cancel_policy_nights =="5 nights" )?"selected":"")+'>5 Nights</option> <option value="6 nights" '+((data.can_policies[i].cancel_policy_nights =="6 nights" )?"selected":"")+'>6 Nights</option> <option value="7 nights" '+((data.can_policies[i].cancel_policy_nights =="7 nights" )?"selected":"")+'>7 Nights</option> </select>&nbsp;Charge <input type="text" name="cancel_policy_percent[]" value="'+data.can_policies[i].cancel_policy_percent+'" size="5"/>% &nbsp;or<input type="text" name="cancel_policy_charge[]" value="'+data.can_policies[i].cancel_policy_charge+'" size="5"/>amt&nbsp; Date From<input type="text" name="cancel_policy_from[]" value="'+data.can_policies[i].cancel_policy_from+'" size="7"/> &nbsp;To<input type="text" name="cancel_policy_to[]" value="'+data.can_policies[i].cancel_policy_to+'" size="7"/></div></td></tr></table>');
			}
		}
	});
}

<?php if(isset($promo_id) && $promo_id!='') ?>
get_promotion_rates( <?php echo $promo_id;?>);
  </script>
  
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

function getFields()
{
	if(document.getElementById('stay_check').checked)
	{
		document.getElementById('promotion_nights').style.display = 'block';
	}
	else
	{
		document.form1.paynights.value='';
		document.form1.staynights.value='';
		document.getElementById('promotion_nights').style.display = 'none';
	}
	
	if(document.getElementById('bb_check').checked)
	{
		document.getElementById('promotion_dates').style.display = 'block';
	}
	else
	{ 
		document.form1.hhdate.value='';
		document.form1.bbdate.value='';
		document.getElementById('promotion_dates').style.display = 'none';
	}
}
</script>
        
<div id="navjam">
<div class="tabs_width">
<?php
$prop_id = $this->uri->segment(3);
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
<li><a href="<?php echo site_url('index/rate_tactics_list/')?>/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4)?>" id="tabs_active">Room Rates</a></li>
<!--<li><a href="<?php echo site_url('index/maintain_month_list/')?>/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4)?>">Maintain by Month</a></li>
--><li><a href="<?php echo site_url('index/open_close_dates/')?>/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4)?>">Open/Close Dates</a></li>
<li><a href="<?php echo site_url('index/house_rules/')?>/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4)?>">Supplier Policy</a></li>
<li><a href="<?php echo site_url('index/extra_service/')?>/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4)?>">Extra Services</a></li>
<li><a href="<?php echo site_url('index/early_bird/')?>/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4)?>" >Early Bird Promotion</a></li>
<li><a href="<?php echo site_url('index/view_allotment_list/')?>/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4)?>">Allotment</a></li>
</ul>

</div>

<!-- tab "panes" -->
<div class="panes" style="padding-bottom:10px">
<!--This is the contact information division-->
	
<div id="containerdount">

   
<div style="margin-top:10px;">
     <div style="float:right; height:25px; margin-top:10px ;"><a href="<?php echo site_url('index/promotion_details/')?>/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4); ?>/<?php echo $this->uri->segment(5); ?>" style="color:#099;">Back</a></div>
     <div class="promo_details"> 
<?php echo '<B>Category Type, Room Category: </B>'.$cate_details->cate_type.'&nbsp;'.$cate_details->room_type; ?>
</div>   

<div class="promo_details"> <?php echo '<B>Season:</B> '.$cate_details->season; ?></div>

<div class="promo_details"> 
<?php $fromD = explode('-',$cate_details->room_avail_date_from);
      $fromD = $fromD[2].'-'.$fromD[1].'-'.$fromD[0];
      
      $toD = explode('-',$cate_details->room_avail_date_to);
      $toD = $toD[2].'-'.$toD[1].'-'.$toD[0];

      echo '<b>Period:</b> '.$fromD.' To '.$toD; 
	  
	  $promFD = explode('-',$promo_view_details->from_date);
      $promFDate = $promFD[2].'-'.$promFD[1].'-'.$promFD[0];
      
      $promTD = explode('-',$promo_view_details->to_date);
      $promTDate = $promTD[2].'-'.$promTD[1].'-'.$promTD[0];

      
	  ?>
</div>
   
    <div style="float:left; margin-left:20px;">
    <form name="form1" action="<?php echo WEB_URL; ?>index/edit_promotion_plan/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4); ?>/<?php echo $id; ?>/<?php echo $promo_id; ?>" method="post">
    
    
    
    <table width="800" border="0" cellspacing="1" cellpadding="0"><caption><h4 align="left">Edit Promotion</h4></caption>
       
     <tr height="35">
               <td width='150px'>
          From Date:  
        </td>
         <td width='170px'>
            <input type="text" name='fromdate' value='<?php echo $promFDate;?>' id="datepicker"  onchange="javascript:return check_night_valued(this.value)" style=" background-image: url('<?php echo WEB_DIR_FRONT; ?>images/b2b-calicon.png');background-repeat:no-repeat;background-position:right center;width:100px; height:18px;" />
        </td>
    
    <td width='170px'>
          To Date:  
        </td>
         <td>
            <input type="text" name='todate' value='<?php echo $promTDate;?>' id="datepicker1"  onchange="javascript:return check_night_valued(this.value)" style=" background-image: url('<?php echo WEB_DIR_FRONT; ?>images/b2b-calicon.png');background-repeat:no-repeat;background-position:right center;width:100px; height:18px;" />
        </td>
        </tr>
        <tr height="35">
        <td>
			<?php
				
				if($promo_view_details->stay_nights!='' && $promo_view_details->stay_nights!=0){ 
			?>
        <input type="checkbox" name="stayn" value="apply" id="stay_check"  onchange="getFields()" checked="checked"/>
        <?php }else{ ?>
        <input type="checkbox" name="stayn" value="notapply" id="stay_check"  onchange="getFields()" />
        <?php } ?>
        &nbsp;&nbsp;&nbsp;Promotion Nights 
        </td>
        <td>
			<?php
		$tttt = $promo_view_details->hh_date;
				if($tttt!=''){ 
			?>
        <input type="checkbox" id="bb_check" onchange="getFields()" checked="checked" />
        <?php }else{?>
        <input type="checkbox" id="bb_check" onchange="getFields()"  />
        <?php } ?>&nbsp;&nbsp;&nbsp;Promotion Dates 
        </td>  
        </tr>
  </table>
  <table width="800" border="0" align="left" cellpadding="5" cellspacing="5" style="margin:15px 0 0 17px;">
    <tr id="promotion_nights" <?php if($promo_view_details->stay_nights==''){?>style="display:none;"<?php } ?>>        
         
        <td>
          Stay Nights:  
        </td>
        <td>
            <input type="text" name='staynights' value='<?php echo $promo_view_details->stay_nights;?>' size="12" />
        </td>
    
   		<td>
          Pay Nights:  
        </td>
        <td>
            <input type="text" name='paynights' value='<?php echo $promo_view_details->pay_nights;?>' size='12' />
        </td>
        <td><input type="checkbox" name='multiple' value='1' size='12' <?php if($promo_view_details->multiple=='1'){ ?> checked="checked" <?php }?>/>
            Is promotion in multiple?
    	</td>
    </tr>
    </table>
     <?php $bbDate = explode('-',$promo_view_details->bb_date);
      $bbD = $bbDate[2].'-'.$bbDate[1].'-'.$bbDate[0];
      
      $hhDate = explode('-',$promo_view_details->hh_date);
      $hhD = $hhDate[2].'-'.$hhDate[1].'-'.$hhDate[0];

     ?>
    
   <table width="800" border="0" align="left" cellpadding="5" cellspacing="5" style="margin:15px 0 0 17px; ">
    <tr  id="promotion_dates" <?php if($bbD=='00-00-0000'){?>style="display:none;"<?php } ?>><td>
          BB Date:  
        </td>
        <td>
            <input type="text" name='bbdate' value='<?php echo $bbD;?>' id="datepicker2"  onchange="javascript:return check_night_valued(this.value)" style=" background-image: url('<?php echo WEB_DIR_FRONT; ?>images/b2b-calicon.png');background-repeat:no-repeat;background-position:right center;width:100px; height:18px;" />
        </td>
    
    <td>
          HB Date:  
        </td>
        <td>
            <input type="text" name='hhdate' value='<?php echo $hhD;?>' id="datepicker3"  onchange="javascript:return check_night_valued(this.value)" style=" background-image: url('<?php echo WEB_DIR_FRONT; ?>images/b2b-calicon.png');background-repeat:no-repeat;background-position:right center;width:100px; height:18px;" />
        </td>
    </tr>
            
    </table>
    
    
    
    
     <input type="hidden" id="apartfec_val" name="apartfec_val" value=""/>
    <input type="hidden" name="month" id="month" value=""/>
    <input type="hidden" name="year" id="year" value=""/>
    <div style="margin-top:5px;">
     <table style="" width="100%">
     <tr>
    <td width="250">
          Booking Code:  
        </td>
        <td width="120">
            <input type="text" name="booking_code" value="<?php  if(isset($promo_view_details->booking_code)){ echo $promo_view_details->booking_code; } ?>"  size="20"/>
        </td>
    
    <td>
         
        </td>
        <td>
           
        </td>
    </tr>  
    </table>      
    <table style="" width="100%"><caption><h4 align="left">Room Rates</h4></caption>
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
        </td>
        <td >&nbsp;</td>
        <script>
		
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
        $( "#datepicker4" ).datepicker({
        numberOfMonths: 1,
        dateFormat: 'dd-mm-yy',
        
        minDate: 0
        });
        $( "#datepicker5" ).datepicker({
        numberOfMonths: 1,
        dateFormat: 'dd-mm-yy',
        
        minDate: 1
        });
        
        $('#datepicker4').change(function(){
        //$t=$(this).val();
        var selectedDate = $(this).datepicker('getDate');
        var str1 = $( "#datepicker5" ).val();
        
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
                $( "#datepicker5" ).datepicker({
                    numberOfMonths: 3,
                    dateFormat : 'dd-mm-yy',
                    minDate: 1
                });
        $( "#datepicker5" ).val($t);
        // $('#datepicker1').datepicker('option', 'minDate', $t);s
        }
        });
        
        $('#datepicker5').change(function(){
        //$t=$(this).val();
        
        var selectedDate = $(this).datepicker('getDate');
        var str1 = $( "#datepicker4" ).val();
        
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
                $( "#datepicker4" ).datepicker({
                    numberOfMonths: 3,
                    dateFormat : 'dd-mm-yy',
                    minDate: 0
                });
        $( "#datepicker4" ).val($t);
        }
        else
        {
        }
        });
        
        });
		
		
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

function getDates(){
	
	var sd = $("#datepicker4").val();
	var ed = $("#datepicker5").val(); 
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
	$.post( "<?php print WEB_URL ?>index/getAvailDatesForPromotion", {mmsd:sd, mmed:ed, promo_id:<?php echo $this->uri->segment(6); ?>, selectedDays:selectedDays, da:'days'},
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
        <?php
                $current_dte = date("d-m-Y",strtotime("+7 days"));
                $next_dte = date("d-m-Y",strtotime("+8 days"));
				
				$sd = $promo_view_details->promotion_avail_date_from;
				$sds = explode("-",$sd);
				$strd = $sds[2].'-'.$sds[1].'-'.$sds[0];
				$ed = $promo_view_details->promotion_avail_date_to;
				$eds = explode("-",$ed);
				$endd = $eds[2].'-'.$eds[1].'-'.$eds[0];
            ?>
    <td style="width:120px;"><input name="sd" value="<?php echo $strd; ?>" id="datepicker4"  onchange="javascript:return check_night_valued(this.value)" type="text" class="b2b-txtbox"  style=" background-image: url('<?php echo WEB_DIR_FRONT; ?>images/b2b-calicon.png');background-repeat:no-repeat;background-position:right center;width:100px; height:18px;"/></td>
    <td >&nbsp;</td>
    <td  style="width:120px;"><span id="out"><input name="ed" value="<?php echo $endd; ?>" id="datepicker5" onchange="javascript:return check_night_valued(this.value)" type="text" class="b2b-txtbox" style="background-image: url('<?php echo WEB_DIR_FRONT; ?>images/b2b-calicon.png');background-repeat:no-repeat;background-position:right center;width:100px; height:18px;"/></span></td>
    
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
    </div>
    <div id="filtering" style="coloir:#fff; width:100%; background:#f8f8f8; display:none;">
    <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0" class="display tableStatic">
    
    <tr style="background:#243419"  height="45">
    <td style="border-right:solid 1px #deab6f; text-align:center; padding-top:3px; color:#fff; padding-left:0px;">Smart Update</td>
    
    <td style="border-right:solid 1px #deab6f; text-align:center; padding-left:0px;"><input name="price" id="price" type="text" class="input-field"  style="height:20px; margin-top:3px; background:#F2F2F2;" size="5"/></td>
    <td style="border-right:solid 1px #deab6f; text-align:center; padding-left:0px;"><input name="extra_bed_price" id="extra_bed_price" type="text" class="input-field"  style="height:20px; margin-top:3px; background:#F2F2F2;" size="5"/></td>
    <td style="border-right:solid 1px #deab6f; text-align:center; padding-left:0px;"><input name="avail" id="avail" type="text" class="input-field"  style="height:20px; margin-top:3px; background:#F2F2F2;" size="5"/></td>
    <td style="border-right:solid 1px #deab6f; text-align:center; padding-left:0px;"><input name="adult" id="adult" type="text" class="input-field"  style="height:20px; margin-top:3px; background:#F2F2F2;" size="5"/></td>
    <td style="border-right:solid 1px #deab6f; text-align:center; padding-left:0px;"><input name="child" id="child" type="text" class="input-field"  style="height:20px; margin-top:3px; background:#F2F2F2;" size="5"/></td>
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
    <td style="border-right:solid 1px #f8d1a3; text-align:center; width:10%; padding-left:0px;">Child Charge</td>
    <td style="border-right:solid 1px #f8d1a3; text-align:center; width:10%; padding-left:0px;">Infants</td>
    <td style="border-right:solid 1px #f8d1a3; text-align:center; width:11%; padding-left:0px;">Supplementary charge</td>
    <td style="border-right:solid 1px #f8d1a3; text-align:center; width:9%; ">&nbsp;</td>
    </tr>
    </table>


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
    <td align="center"><input type="image" src="<?php echo WEB_DIR ?>images/sub_mint_btn_admin.png"  /></td>
</tr>
<tr>
	<td height="20" colspan="2">&nbsp;</td>
</tr>
</table>
</div> 
 
    
    
 
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin:20px;">
    <tr>
   
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
