<!DOCTYPE html>

<html lang="en">
<head>
   <meta charset="utf-8">
   <title>Login</title>

<script type="text/javascript" src="<?php echo WEB_DIR_FRONT; ?>script/jquery-1.4.2.min.js"></script>

<link type="text/css" href="<?php echo WEB_DIR_FRONT; ?>datepickernew/css/overcast/jquery-ui-1.8.6.custom.css" rel="stylesheet" />
<script type="text/javascript" src="<?php print WEB_DIR_FRONT; ?>datepickernew/ui.core.js"></script>
<script type="text/javascript" src="<?php print WEB_DIR_FRONT; ?>datepickernew/ui.datepicker.js"></script>

<script>
function __zeroPad(num,count)
{
	var numZeropad = num + '';
	while(numZeropad.length < count) {
	numZeropad = "0" + numZeropad;
	}
	return numZeropad;
}
function __valid_date()
{
	var sd = document.getElementById('datepicker3').value;
	var ed = document.getElementById('datepicker4').value;
	
	if(sd=='' || ed=='')
	{
		alert("Please enter date");
		return false; 
	}
	
}
function __dateADD(currentDate)
{
 var valueofcurrentDate=currentDate.valueOf()+(24*60*60*1000);
 var newDate =new Date(valueofcurrentDate);
 return newDate;
} 

$(document).ready(function(){
			  
			$(function() {
							$( "#datepicker3" ).datepicker({
								changeMonth: true,
								changeYear: true,
								minDate: -30
							});

						});
						
				 $('#datepicker3').change(function(){
				   var selectedDate = $(this).datepicker('getDate');
			       var nextdayDate  = dateADD(selectedDate);
				   var nextDateStr = zeroPad(nextdayDate.getDate(),2)+"/"+zeroPad((nextdayDate.getMonth()+1),2)+"/"+(nextdayDate.getFullYear());
				   
				   $t = nextDateStr;
				   
							$( "#datepicker4" ).datepicker({
								changeMonth: true,
								changeYear: true,
								minDate: $t
							});
				   $( "#datepicker4" ).val($t);
				  });					  
									

} )

$(document).ready(function(){


			$(function() {
							$( "#datepicker" ).datepicker({
								changeMonth: true,
								changeYear: true,
								minDate: 0
							});

						});
						
				 $('#datepicker').change(function(){
				   //$t=$(this).val();
				  // alert($t);
				   var selectedDate = $(this).datepicker('getDate');
			       var nextdayDate  = dateADD(selectedDate);
				   var nextDateStr = zeroPad(nextdayDate.getDate(),2)+"/"+zeroPad((nextdayDate.getMonth()+1),2)+"/"+(nextdayDate.getFullYear());
				   
				   $t = nextDateStr;
							$( "#datepicker1" ).datepicker({
								changeMonth: true,
								changeYear: true,
								minDate: $t
							});
				   $( "#datepicker1" ).val($t);
				  });						

} )


$(document).ready(function(){
			  
			$(function() {
							$( "#deposited_date" ).datepicker({
								changeMonth: true,
								changeYear: true,
								minDate: -30
							});
							
							$( "#cheque_date" ).datepicker({
								changeMonth: true,
								changeYear: true,
								minDate: -30
							});

						});
			
						
				/* $('#deposited_date').change(function(){
				   var selectedDate = $(this).datepicker('getDate');
			       var nextdayDate  = dateADD(selectedDate);
				   var nextDateStr = zeroPad(nextdayDate.getDate(),2)+"/"+zeroPad((nextdayDate.getMonth()+1),2)+"/"+(nextdayDate.getFullYear());
				   
				   $t = nextDateStr;
				   
							$( "#datepicker6" ).datepicker({
								changeMonth: true,
								changeYear: true,
								minDate: $t
							});
				   $( "#datepicker6" ).val($t);
				  });		*/			  
									

} )
	</script>
<script type="text/javascript">
function __valid()
{
	 fname=document.advance_search;
	var val=fname.sel_date_type.value;
	if(val!=''){
		
	if(fname.fdate.value=='')
	{
	alert('Please Select From date');
	fname.fdate.focus();
	return false;
	}
	if(fname.tdate.value=='')
	{
	alert('Please Select To Date');
	fname.tdate.focus();
	return false;
	}
	if (CompareDates(fname.tdate.value,fname.fdate.value))
	{
	alert("From  Date cannot be greater than To Date"); 
	fname.tdate.focus();        
	return false; 
	}
	}


}
function __CompareDates(str1,str2) 
{ 
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
		return false; 
	} 
	else 
	{ 
		return true; 
	} 
} 

</script>
	
<script type="text/javascript">
function __MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}


$(document).ready(function(){
	 $('#deposit_type').change(function(){
		if ($(this).val() == '') {
			$('#deposit_dtls').css('display', 'none');
			$('#edeposit').css('display', 'none');
			$('#cheque_deposit').css('display', 'none');
		} else {
			$('#deposit_dtls').css('display', 'block');
			if ($(this).val() == 'etransfer') {
				$('#edeposit').css('display', 'block');
				$('#cheque_deposit').css('display', 'none');
			} else if ($(this).val() == 'cheque') {
				$('#edeposit').css('display', 'none');
				$('#cheque_deposit').css('display', 'block');
				
			}
			
		}
	 });
});
</script>


</head>
<body>
                	<?php echo $this->load->view('header'); ?>
<?php //print_r($agent_details);
?>
<a href="<?php echo site_url('index/agent_details/'.$agent_id)?>">Contact Details</a>
<a href="<?php echo site_url('index/agent_deposit_details/'.$agent_id)?>">Credit / Deposit</a>
<a href="<?php echo site_url('index/agent_markup/'.$agent_id)?>">Commission/ Mark up</a>
<a href="<?php echo site_url('index/agent_top_cities/'.$agent_id)?>">Maintain Top City List</a>

<form action="<?php echo WEB_URL.'index/agent_deposit_details/'.$agent_id;?>" method="post"  name="reg" >
<table border="0" cellspacing="0" cellpadding="5">
<tr><td>Agent Name </td><td><?php echo $agent_details->name;?></td></tr> 
<tr><td>Balance Amount</td><td><?php echo $agent_details->balance_credit;?></td></tr> 

<tr><td>Amount Deposited *</td><td>
<input class="agent_text_cover_txt_feil" name="amount_credit" type="text" value="<?php echo set_value('amount_credit'); ?>" >
<?php echo form_error('amount_credit');?>
</td></tr>

<tr><td>Date of Deposite *</td><td>
<input class="agent_text_cover_txt_feil" name="deposited_date" id="deposited_date" type="text" value="<?php echo set_value('deposited_date'); ?>" >
<?php echo form_error('deposited_date');?>
</td></tr>

<tr><td>Mode of Deposit *</td><td>
<select name='deposit_type' id='deposit_type'>
<option value="">Select Mode of Deposit</option>
<option value="cash" <?php echo set_select('deposit_type', 'cash'); ?>>Cash Deposit</option>
<option value="etransfer" <?php echo set_select('deposit_type', 'etransfer'); ?>>e Transfer</option>
<option value="cheque" <?php echo set_select('deposit_type', 'cheque'); ?>>Cheque / DD Deposit</option>
</select>
<?php echo form_error('deposit_type');?>
</td></tr>

<tr><td colspan="2">
<div id="deposit_dtls" style='display:none;'>
<table>
<tr><td>Bank</td><td>
<input class="agent_text_cover_txt_feil" name="deposited_bank" type="text" value="<?php echo set_value('deposited_bank'); ?>" >
<?php echo form_error('deposited_bank');?>
</td></tr>

<tr><td>Branch</td><td>
<input class="agent_text_cover_txt_feil" name="deposited_branch" type="text" value="<?php echo set_value('deposited_branch'); ?>" >
<?php echo form_error('deposited_branch');?>
</td></tr>

<tr><td>City</td><td>
<input class="agent_text_cover_txt_feil" name="deposited_city" type="text" value="<?php echo set_value('deposited_city'); ?>" >
<?php echo form_error('deposited_city');?>
</td></tr>

<tr><td colspan="2">
<div id="edeposit" style='display:none;'>
<table>
<tr><td>Transaction ID</td><td>
<input class="agent_text_cover_txt_feil" name="transaction_id" type="text" value="<?php echo set_value('transaction_id'); ?>" >
<?php echo form_error('transaction_id');?>
</td></tr>
</table>
</div>
</td></tr>

<tr><td colspan="2">
<div id="cheque_deposit" style='display:none;'>
<table>
<tr><td>DD / Cheque Date</td><td>
<input class="agent_text_cover_txt_feil" name="cheque_date" id="cheque_date" type="text" value="<?php echo set_value('cheque_date'); ?>" >
<?php echo form_error('cheque_date');?>
</td></tr>

<tr><td>DD / Cheque No</td><td>
<input class="agent_text_cover_txt_feil" name="cheque_number" type="text" value="<?php echo set_value('cheque_number'); ?>" >
<?php echo form_error('cheque_number');?>
</td></tr>

</table>
</div>
</td></tr>

<tr><td>Remarks</td><td>
<input class="agent_text_cover_txt_feil" name="remarks" type="text" value="<?php echo set_value('remarks'); ?>" >
<?php echo form_error('remarks');?>
</td></tr>
</table>
</div>
</td><tr>

<tr><td></td><td><input type="submit" name='submit' value="Submit"></td></tr> 
</table>
</form>
<br /><br />
<table border="0" cellspacing="0" cellpadding="5">
<tr><td>Amount Credit</td><td>Deposit Type</td><td>Deposited Date</td><td>Remarks</td></tr>
<?php
if (!empty($agent_deposit_details)) {
for ($i = 0; $i < count($agent_deposit_details); $i++)
{
	echo '<tr><td>'.$agent_deposit_details[$i]->amount_credit.'</td><td>'.$agent_deposit_details[$i]->deposit_type.'</td><td>'.$agent_deposit_details[$i]->deposited.'</td><td>'.$agent_deposit_details[$i]->remarks.'</td></tr>';
}
} else {
echo '<tr><td>No data available</td></tr>';
}
?>
</table>


</body>
</html>	