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
	
	
	var sd = $("#datepicker4").val();
	var ed = $("#datepicker5").val(); 
	//alert(sd);
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
				$("#monthDates").append('<tr style="border-top:solid 1px #deab6f; border-bottom:solid 1px #deab6f; padding-bottom:2px;"><td  style="border-right:solid 1px #deab6f; text-align:left; width:10%; font-size:11.5px;" id="tdtd">'+data.avail_dates[i].day+'-'+data.avail_dates[i].month+'-'+data.avail_dates[i].year+' '+data.avail_dates[i].week_day+'<input type="hidden" name="dates[]" value="'+data.avail_dates[i].date+'"><input type="hidden" name="weekday[]" value="'+data.avail_dates[i].week_day+'"></td><td style="border-right:solid 1px #deab6f; text-align:center; width:10%;" id="tdtd3"><input name="price[]" type="text" class="input-field"  style="height:20px;  background:#F2F2F2;" value="'+data.avail_dates[i].rate+'" size="5" /></td><td style="border-right:solid 1px #deab6f; text-align:center; width:10%;" id="tdtd3"><input name="extra_bed_price[]" type="text" class="input-field"  style="height:20px;  background:#F2F2F2;" value="'+data.avail_dates[i].extra_bed_price+'" size="5"/></td><td style="border-right:solid 1px #deab6f; text-align:center; width:10%;" id="tdtd3"><input name="avail[]" type="text" class="input-field"  style="height:20px;  background:#F2F2F2;" value="'+data.avail_dates[i].available_rooms+'" size="5"/></td><td style="border-right:solid 1px #deab6f; text-align:center; width:10%;" id="tdtd3"><input name="adult[]" id="adult[]" type="text" class="input-field"  style="height:20px;  background:#F2F2F2;" value="'+data.avail_dates[i].adult+'" size="5"/></td><td style="border-right:solid 1px #deab6f; text-align:center; width:10%;" id="tdtd3"><input name="child[]" id="child[]" type="text" class="input-field"  style="height:20px;  background:#F2F2F2;" value="'+data.avail_dates[i].child+'" size="5"/></td><td></td><td style="border-right:solid 1px #deab6f; text-align:center; width:10%;" id="tdtd3"><input name="child_price[]" type="text" class="input-field"  style=" height:20px;  background:#F2F2F2;" value="'+data.avail_dates[i].child_charge+'" size="5"/></td><td style="border-right:solid 1px #deab6f; text-align:center; width:10%;" id="tdtd3"><input name="infant[]" type="text" class="input-field"  style=" height:20px;  background:#F2F2F2;" value="'+data.avail_dates[i].infant+'" size="5"/></td><td style="border-right:solid 1px #deab6f; text-align:center; width:11%;" id="tdtd3"><input name="sup_charge[]" type="text" class="input-field"  style="height:20px;  background:#F2F2F2;" value="'+data.avail_dates[i].supplementary_charge_rate+'" size="5"/></td><td style="border-right:solid 1px #deab6f; text-align:center; width:9%;" id="tdtd3">&nbsp;</td></tr>');
			}
		} 
	  }
	);
	
});

  </script>
<script language="javascript">
fields = 0;
function addInput() {

$("#rowc").html('<table><tr align="right"><td width="100px">Room Category </td><td width="100px"> Amount</td></tr></table>');

if (fields != 10) {
//document.getElementById('rows').innerHTML += '<tr height="35"><td width="300"><input type="text" id="type_name" name="type_name[]" /></td><td><input type="text" id="type_value" name="type_value[]" style="margin-left:167px;" />&nbsp; <span onclick="addErase()"></span> </td></tr><br><br>';

$("#rows").append('<table><tr><td><input type="text" name="roomtype[]" value="" /><input type="text" name="amount[]" value="" /></td></tr></table>');
fields += 1;
} else {
document.getElementById('rows').innerHTML += "<br />Only 10 Category type allowed.";
document.form.add.disabled=true;
}
}
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
<li><a href="<?php echo site_url('index/rate_tactics_list/')?>/<?php echo $this->uri->segment(3); ?>" id="tabs_active" style="width:138.5px;">Room Rates</a></li>
<li><a href="<?php echo site_url('index/open_close_dates/')?>/<?php echo $this->uri->segment(3); ?>" id="newtabe_size">Open/Close Dates</a></li>
<li><a href="<?php echo site_url('index/house_rules/')?>/<?php echo $this->uri->segment(3); ?>" id="newtabe_size">Supplier Policy</a></li>
<li><a href="<?php echo site_url('index/extra_service/')?>/<?php echo $this->uri->segment(3); ?>" id="newtabe_size">Extra Services</a></li>
<li><a href="<?php echo site_url('index/early_bird/')?>/<?php echo $this->uri->segment(3); ?>" id="newtabe_size">Early Bird Promotion</a></li>
<li><a href="<?php echo site_url('index/view_allotment_list/')?>/<?php echo $this->uri->segment(3); ?>" id="newtabe_size">Allotment</a></li>
</ul>
</div>
</div>

<!-- tab "panes" -->
<div class="panes">
	<div id="containerdount" style="padding-top:30px;">

<div id="result">
<div id="containerdount">

<div id="result1">
    <br/>
    <?php  $period =$this->Supplier_Model->get_period_information($this->uri->segment(4));
		//print '<pre />';print_r($period);exit;
		
	 $room_avail_date_from = $period->room_avail_date_from;
	 $room_avail_date_to =$period->room_avail_date_to;
	 $season_id =$period->season_id;
	 $category_type= $period->category_type;
?>

    <div style="float:right; height:25px; clear:both"><a href="<?php echo site_url('index/promotion_details/')?>/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4); ?>" style="color:#099;">Back</a></div>

<div class="promo_details"> 
<?php $fromD = explode('-',$period->room_avail_date_from);
      $fromD = $fromD[2].'-'.$fromD[1].'-'.$fromD[0];
      
      $toD = explode('-',$period->room_avail_date_to);
      $toD = $toD[2].'-'.$toD[1].'-'.$toD[0];

      echo '<b>Period Information : </b> '.$fromD.' To '.$toD; ?>
</div>

    <form action='<?php echo WEB_URL;?>index/add_promotion/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>/<?php echo $this->uri->segment(5)?>' method='post' name="form1">

 <input type="hidden" name="sup_room_avail_date_from"   value="<?php echo $period->room_avail_date_from; ?>" />
<input type="hidden" name="sup_room_avail_date_to"   value="<?php echo $period->room_avail_date_to; ?>" />
<input type="hidden" name="season_id"   value="<?php echo $season_id; ?>" />

<input type="hidden" name="category_type"   value="<?php echo $category_type; ?>" />

        <table width="942" border="0" align="left" cellpadding="5" cellspacing="5" style="margin:15px 0 0 17px; "><caption><h3 align="left">Add Promotion</h3></caption>
           
           <?php
                $current_dte = date("d-m-Y",strtotime("+7 days"));
                $next_dte = date("d-m-Y",strtotime("+8 days"));
				if(isset($cate_details->room_avail_date_from) && $cate_details->room_avail_date_from!='')
				{
				$sd = $cate_details->room_avail_date_from;
				$sds = explode("-",$sd);
				$strd = $sds[2].'-'.$sds[1].'-'.$sds[0];
				}
				if(isset($cate_details->room_avail_date_to) && $cate_details->room_avail_date_to!='')
				{
				$ed = $cate_details->room_avail_date_to;
				$eds = explode("-",$ed);
				$endd = $eds[2].'-'.$eds[1].'-'.$eds[0];
				}
            ?>
           
    <tr><td width='150px'>
          From Date:  
        </td>
        <td width='170px'>
            <input type="text" name='fromdate' value="<?php if (isset($strd) && $strd!='') {echo $strd; }?>" id="datepicker"  onchange="javascript:return check_night_valued(this.value)" style=" background-image: url('<?php echo WEB_DIR_FRONT; ?>images/b2b-calicon.png');background-repeat:no-repeat;background-position:right center;width:100px; height:18px;" />
        </td>
    
    <td width='170px'>
          To Date:  
        </td>
        <td>
            <input type="text" name='todate' value="<?php if(isset($endd) && $endd!='') {echo $endd;} ?>" id="datepicker1"  onchange="javascript:return check_night_valued(this.value)" style=" background-image: url('<?php echo WEB_DIR_FRONT; ?>images/b2b-calicon.png');background-repeat:no-repeat;background-position:right center;width:100px; height:18px;" />
        </td>
    </tr>
    
    
    <tr><td>
          <input type="checkbox" id="stay_check"  onchange="getFields()"/>&nbsp;&nbsp;&nbsp;Promotion Nights 
        </td>
        <td>
          <input type="checkbox" id="bb_check" onchange="getFields()"/>&nbsp;&nbsp;&nbsp;Promotion Dates 
        </td>
    
    <td>
          
        </td>
        <td>
           
        </td>
    </tr>
    
    
    <tr>
    <table width="942" border="0" align="left" cellpadding="5" cellspacing="5" style="margin:15px 0 0 17px;">
    <tr  id="promotion_nights" style="display:none;">
    <td>
          Stay Nights:  
        </td>
        <td>
            <input type="text" name='staynights' value='' size="12" />
        </td>
    
    <td>
          Pay Nights:  
        </td>
        <td>
            <input type="text" name='paynights' value='' size='12' />
        </td>
        <td>
			<input type="checkbox" name='multiple' value='1' size='12' />Is promotion in multiple?
		</td>
    </tr>
    </table>
    </tr>
    
        
    <tr>
    <table width="942" border="0" align="left" cellpadding="5" cellspacing="5" style="margin:15px 0 0 17px; ">
    <tr  id="promotion_dates" style="display:none;">
    <td>
         BB Date:  
        </td>
        <td>
            <input type="text" name='bbdate' value='' id="datepicker2"  onchange="javascript:return check_night_valued(this.value)" style=" background-image: url('<?php echo WEB_DIR_FRONT; ?>images/b2b-calicon.png');background-repeat:no-repeat;background-position:right center;width:100px; height:18px;" />
        </td>
    
    <td>
          HB Date:  
        </td>
        <td>
            <input type="text" name='hhdate' value='' id="datepicker3"  onchange="javascript:return check_night_valued(this.value)" style=" background-image: url('<?php echo WEB_DIR_FRONT; ?>images/b2b-calicon.png');background-repeat:no-repeat;background-position:right center;width:100px; height:18px;" />
        </td>
    </tr>
    </table>
    </tr>
           
                <tr></tr>
          
                
           
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
            <input type="text" name="booking_code" value=""  size="20"/>
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
	$.post( "<?php print WEB_URL ?>index/getDates", {mmsd:sd, mmed:ed, selectedDays:selectedDays},
      function(data) {
		if(data != ''){
			$("#filtering").show();
			//$("#room_id").val(room_plan);
			//$("#capacity").val(data.room_plan[0].capacity);
			$("#monthDates").html('');
			
			for(var i=0; i<data.dates.length; i++){
				var day = data.dates[i].toString().split(" "); 
				$("#monthDates").append('<tr style="border-top:solid 1px #deab6f; border-bottom:solid 1px #deab6f; padding-bottom:2px;"><td  style="border-right:solid 1px #deab6f; text-align:left; width:10%;font-size:11.5px;" id="tdtd">'+data.dates[i]+'<input type="hidden" name="dates[]" value="'+day[0]+'"><input type="hidden" name="weekday[]" value="'+day[1]+'"></td><td style="border-right:solid 1px #deab6f; text-align:center; width:10%;" id="tdtd3"><input name="price[]" type="text" class="input-field"  style="height:20px;  background:#F2F2F2;" size="5"/></td><td style="border-right:solid 1px #deab6f; text-align:center; width:10%;" id="tdtd3"><input name="extra_bed_price[]" type="text" class="input-field"  style="height:20px;  background:#F2F2F2;" size="5"/></td><td style="border-right:solid 1px #deab6f; text-align:center; width:10%;" id="tdtd3"><input name="avail[]" type="text" class="input-field"  style="height:20px;  background:#F2F2F2;" size="5"/></td><td style="border-right:solid 1px #deab6f; text-align:center; width:10%;" id="tdtd3"><input name="adult[]" id="adult[]" type="text" class="input-field"  style="height:20px;  background:#F2F2F2;" size="5"/></td><td style="border-right:solid 1px #deab6f; text-align:center; width:10%;" id="tdtd3"><input name="child[]" id="child[]" type="text" class="input-field"  style="height:20px;  background:#F2F2F2;" size="5"/></td><td></td><td style="border-right:solid 1px #deab6f; text-align:center; width:10%;" id="tdtd3"><input name="child_price[]" type="text" class="input-field"  style="height:20px;  background:#F2F2F2;" size="5"/></td><td style="border-right:solid 1px #deab6f; text-align:center; width:10%;" id="tdtd3"><input name="infant[]" type="text" class="input-field"  style="height:20px;  background:#F2F2F2;" size="5"/></td><td style="border-right:solid 1px #deab6f; text-align:center; width:11%;" id="tdtd3"><input name="sup_charge[]" type="text" class="input-field"  style="height:20px;  background:#F2F2F2;" size="5"/></td><td style="border-right:solid 1px #deab6f; text-align:center; width:9%;" id="tdtd3">&nbsp;</td></tr>');
			}
		} 
	  }
	);
}
        </script>
        <?php
            $current_dte = date("d-m-Y",strtotime("+7 days"));
            $next_dte = date("d-m-Y",strtotime("+8 days"));
        ?>
    <td style="width:120px;"><input name="sd" id="datepicker4"  onchange="javascript:return check_night_valued(this.value)" type="text" class="b2b-txtbox"  style=" background-image: url('<?php echo WEB_DIR; ?>images/b2b-calicon.png');background-repeat:no-repeat;background-position:right center;width:100px; height:18px;" value="<?php if (isset($strd) && $strd!='') {echo $strd; }?>"/></td>
    <td >&nbsp;</td>
    <td  style="width:120px;"><span id="out"><input name="ed" id="datepicker5" onchange="javascript:return check_night_valued(this.value)" type="text" class="b2b-txtbox" style=" background-image: url('<?php echo WEB_DIR; ?>images/b2b-calicon.png'); background-repeat:no-repeat;background-position:right center;width:100px; height:18px;" value="<?php if(isset($endd) && $endd!='') {echo $endd;} ?>"/></span></td>
    
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
    <td style="border-right:solid 1px #deab6f; text-align:center; padding-left:0px;">
    					<!--<select name="adult" id="adult" style="width:60px;">
                          <option value="">Adults</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                        </select>-->
                        <input name="adult" id="adult" type="text" class="input-field"  style="height:20px; margin-top:3px; background:#F2F2F2;" size="5"/>
                        </td>
    <td style="border-right:solid 1px #deab6f; text-align:center; padding-left:0px;">
      
    					<!--<select name="child" id="child" style="width:60px;">
                          <option value="">Childs</option>
                          <option value="0">0</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                        </select>-->
                         <input name="child" id="child" type="text" class="input-field"  style="height:20px; margin-top:3px; background:#F2F2F2;" size="5"/>
                        </td>
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
    <td align="center"><input type="image" src="<?php echo WEB_DIR ?>images/save-but.png"  /></td>
</tr>
<tr>
	<td height="20" colspan="2">&nbsp;</td>
</tr>
</table>
</div>          
                   
                <!--</td>
            </tr>
            <tr>
                <td colspan='5'>
                         
                <span id="rowc"></span>
                
                </td>
            </tr>
            <tr>
                <td colspan='5'>
                         
                <span id="rows"></span>
                
                </td>
            </tr>
    <tr>
        <td colspan='4' align="center">
            <input type="submit" name='submit' value='Submit' />
        </td>
    </tr>
</table>-->
        
</form>
    
     
 
</div>
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
<?php $this->load->view('footer'); ?>
</body>
</html>

 <style>
.b2b-AGE_OF2{ width:97px; float: left; color:#fff; font-family:MAIAN; padding:0 0 8px; margin:12px -7px 0 0; color:#000; font-size:12px;}

.check_149{ width:144px; float:right; margin:0 13px 3PX 0; position:relative; left:34px}
</style>
