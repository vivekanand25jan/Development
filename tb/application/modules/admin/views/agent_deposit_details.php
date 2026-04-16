<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="<?php echo WEB_DIR; ?>adminstyle.css" rel="stylesheet" type="text/css" />

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
                      <script type="text/javascript" src="<?php echo WEB_DIR_FRONT; ?>script/jquery-1.4.2.min.js"></script>

<link type="text/css" href="<?php echo WEB_DIR; ?>datepickernew/css/overcast/jquery-ui-1.8.6.custom.css" rel="stylesheet" />
<script type="text/javascript" src="<?php print WEB_DIR; ?>datepickernew/ui.core.js"></script>
<script type="text/javascript" src="<?php print WEB_DIR; ?>datepickernew/ui.datepicker.js"></script>

<script>


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
			
						
						  
									

} )
	</script>

	
<script type="text/javascript">



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
		</script>
        
                     <div id="navjam">
<ul class="tabs">
	<li><a href="javascript:void(0)">Credit / Deposit</a></li>
   

   <!-- <li><a href="#">MY TRAVELERS</a></li>
     <li><a href="#">BILLING INFO</a></li>
          <li><a href="#">CREDIT POINTS</a></li>
               <li><a href="#">TOOLS </a></li>-->
</ul>
</div>

<!-- tab "panes" -->
<div class="panes" style="padding-bottom:10px">
	<div id="containerdount" class="admin-innerbox">
    	

    <form action="<?php echo WEB_URL.'index/agent_deposit_details/'.$agent_id;?>" method="post"  name="reg" >
    <table width="100%">
    <tr><td width="40%">
<table border="0" cellspacing="0" cellpadding="5">
<tr><td>Agent Name </td><td><?php echo $agent_details->name;?></td></tr> 
<tr><td>Balance Amount</td><td><?php echo $agent_details->balance_credit.' '.$agent_details->currency_type;?></td></tr> 

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

</td><tr>

<tr><td></td><td><input type="image" src="<?php echo WEB_DIR ?>images/sub_mint_btn_admin.png"  /></td></tr> 
</table>
</td><td width="60%"><div id="deposit_dtls" style='display:none;'>
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
</div></td></tr></table>
</form>
<div style="clear:both"></div>
<table width="100%" border="0" cellspacing="1" cellpadding="0" style="background-color:#E8E5E5">
 <tr>
 <td class="admin-table-colo">No </td>
    <td class="admin-table-colo">Deposit Type</td>
    <td class="admin-table-colo">Amount</td>
    <td class="admin-table-colo">Deposit Date</td>
    <td class="admin-table-colo">Bank</td>
    <td class="admin-table-colo">Branch</td>
    <td class="admin-table-colo">City</td>
    <td class="admin-table-colo">Transaction ID</td>
    <td class="admin-table-colo">Remarks</td>
    <td class="admin-table-colo">Status</td>

 </tr>
  <?php 
// echo '<pre/>';print_r($result_a).'ssssssssss';
  if(isset($agent_deposit_details[0]))
{
  
  for($j=0;$j<count($agent_deposit_details);$j++)
  {
	  ?>
  <tr>
  <td align="center" class="admin-table-colo1"><?php echo $j+1; ?></td>
    <td align="center" class="admin-table-colo1"><?php echo $agent_deposit_details[$j]->deposit_type; ?></td>
    <td class="admin-table-colo1"><?php echo $agent_deposit_details[$j]->amount_credit.' USD'; ?></td>
    <td class="admin-table-colo1"><?php echo $agent_deposit_details[$j]->deposited_date; ?></td>
    <td class="admin-table-colo1"><?php echo $agent_deposit_details[$j]->bank; ?></td>
    <td class="admin-table-colo1"><?php echo $agent_deposit_details[$j]->branch; ?></td>
    <td class="admin-table-colo1"><?php echo $agent_deposit_details[$j]->city; ?></td>
    <td class="admin-table-colo1"><?php echo $agent_deposit_details[$j]->transaction_id; ?></td>
    <td class="admin-table-colo1"><?php echo $agent_deposit_details[$j]->remarks; ?></td>
     <td class="admin-table-colo1"><?php echo $agent_deposit_details[$j]->status; ?></td>
   
   
     
    
    
  </tr>
  <?php
  }
}
else
{
	echo '<tr><td colspan="10" align="center">No Result Found...</td></tr>';
}
  ?>
</table>

  </div>
  
    
    
 
  
  

</div>

<script>

// perform JavaScript after the document is scriptable.
$(function() {
	// setup ul.tabs to work as tabs for each div directly under div.panes
	$("ul.tabs").tabs("div.panes > div");
});
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
        
        <div style="clear:both; height:30px;">&nbsp;</div>
        

        
 	</div>
 </div>
</body>
</html>
