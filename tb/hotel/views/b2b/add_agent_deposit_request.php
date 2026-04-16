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
<style>

</style>

 <script type="text/javascript" src="<?php echo WEB_DIR; ?>script/jquery-1.4.2.min.js"></script>

<link type="text/css" href="<?php echo WEB_DIR; ?>datepickernew/css/overcast/jquery-ui-1.8.6.custom.css" rel="stylesheet" />
<script type="text/javascript" src="<?php print WEB_DIR; ?>datepickernew/ui.core.js"></script>
<script type="text/javascript" src="<?php print WEB_DIR; ?>datepickernew/ui.datepicker.js"></script>

<script>
function zeroPad(num,count)
{
	var numZeropad = num + '';
	while(numZeropad.length < count) {
	numZeropad = "0" + numZeropad;
	}
	return numZeropad;
}
function valid_date()
{
	var sd = document.getElementById('datepicker3').value;
	var ed = document.getElementById('datepicker4').value;
	
	if(sd=='' || ed=='')
	{
		alert("Please enter date");
		return false; 
	}
	
}
function dateADD(currentDate)
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
function valid()
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
function CompareDates(str1,str2) 
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
function MM_jumpMenu(targ,selObj,restore){ //v3.0
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
  <script type="text/javascript" src="<?php echo WEB_DIR ?>gui/ajax/ajaxsbmt.js"></script>
                <script language="javascript1.5" type="text/javascript">
				function change_password()
		{
		
			var email_id =document.change_pass.email_id.value;
		var old_password =document.change_pass.old_password.value;
		var password =document.change_pass.password.value;
		var comform_password =document.change_pass.comform_password.value;
		
		$(".tab1").empty().html('<div style="padding-left:400px" align="middle"><img src=\'<?php print WEB_DIR ?>images/ajax-loader(2).gif\'></div>');
  $(".tab1").load("<?php print WEB_URL ?>b2b/password_change"+email_id+"/"+old_password+"/"+password+"/"+comform_password);
		
		       return false;
                      // For first time page load default results
                         
		 
		}
		</script>
</head>
<body>
<?php $this->load->view('b2b/header'); ?>
<div class="midlebody">

    <div class="mainbody_signin">
   
    <div>
    <div class="hotelnames_signin" style="min-height:329px;">
    
   		<!--<div class="right-hotel-name">Youngor Central Suzhou</div>--><div id="mybook-tit">  <?php  echo 'Agent Deposit Request To Admin'; ?>   <span style="float:right"><a href="<?php echo WEB_URL; ?>b2b/agent_profile"><img src="<?php echo WEB_DIR;?>images/b2b-back-but.png" /></a></span></div>
   
        <div class="">     
           		
<!-- the tabs -->
<form action="<?php echo WEB_URL.'b2b/add_agent_deposit_request/';?>" method="post"  name="reg" >
<table border="0" cellspacing="0" cellpadding="5">

<tr><td>Amount Deposited:</td><td>
<input class="agent_text_cover_txt_feil" name="amount_credit" type="text" value="<?php echo set_value('amount_credit'); ?>" >
<?php echo form_error('amount_credit');?>
</td></tr>

<tr><td>Date of Deposite:</td><td>
<input class="agent_text_cover_txt_feil" name="deposited_date" id="deposited_date" type="text" value="<?php echo set_value('deposited_date'); ?>" >
<?php echo form_error('deposited_date');?>
</td></tr>

<tr><td>Mode of Deposit:</td><td>
<select  class="agent_text_cover_txt_feil"  name='deposit_type' id='deposit_type'>
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
<tr><td>Bank:</td><td>
<input class="agent_text_cover_txt_feil" name="deposited_bank" type="text" value="<?php echo set_value('deposited_bank'); ?>" >
<?php echo form_error('deposited_bank');?>
</td></tr>

<tr><td>Branch:</td><td>
<input class="agent_text_cover_txt_feil" name="deposited_branch" type="text" value="<?php echo set_value('deposited_branch'); ?>" >
<?php echo form_error('deposited_branch');?>
</td></tr>

<tr><td>City:</td><td>
<input class="agent_text_cover_txt_feil" name="deposited_city" type="text" value="<?php echo set_value('deposited_city'); ?>" >
<?php echo form_error('deposited_city');?>
</td></tr>

<tr><td colspan="2">
<div id="edeposit" style='display:none;'>
<table>
<tr><td>Transaction ID:</td><td>
<input class="agent_text_cover_txt_feil" name="transaction_id" type="text" value="<?php echo set_value('transaction_id'); ?>" >
<?php echo form_error('transaction_id');?>
</td></tr>
</table>
</div>
</td></tr>

<tr><td colspan="2">
<div id="cheque_deposit" style='display:none;'>
<table>
<tr><td>DD / Cheque Date:</td><td>
<input class="agent_text_cover_txt_feil" name="cheque_date" id="cheque_date" type="text" value="<?php echo set_value('cheque_date'); ?>" >
<?php echo form_error('cheque_date');?>
</td></tr>

<tr><td>DD / Cheque No:</td><td>
<input class="agent_text_cover_txt_feil" name="cheque_number" type="text" value="<?php echo set_value('cheque_number'); ?>" >
<?php echo form_error('cheque_number');?>
</td></tr>

</table>
</div>
</td></tr>

<tr><td>Remarks:</td><td>
<input class="agent_text_cover_txt_feil" name="remarks" type="text" value="<?php echo set_value('remarks'); ?>" >
<?php echo form_error('remarks');?>
</td></tr>
</table>
</div>
</td><tr>

<tr><td></td><td><input type="image" src="<?php echo WEB_DIR ?>images/save-but.png" width="75" height="35" /></td></tr> 
</table>
</form>

<!-- tab "panes" -->



<!-- This JavaScript snippet activates those tabs -->

</div>
                            
                    </div>
 

  </div>
  </div>
  
  
</div>
</div></div>
<div style="clear:both"></div>
<?php $this->load->view('b2b/footer'); ?>
</body>
</html>
 