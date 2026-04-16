             	<?php echo $this->load->view('header'); ?>

        <div class="contete_area">    
<form action="<?php echo WEB_URL.'index/edit_deposit_request/'.$result->deposit_id;?>" method="post"  name="reg" >
<table border="0" cellspacing="0" cellpadding="5">
<tr><td class="pler"><b>Name</b></td>
<td class="pler">:</td>

<td class="pler"><?php echo $result->name;?></td></tr>
<tr><td class="pler"><b>Email</b></td>
<td class="pler">:</td>
<td class="pler"><?php echo $result->email_id;?></td></tr>
<tr><td class="pler"><b>Amount</b> </td>
<td class="pler">:</td>
<td class="pler"><?php echo $result->amount_credit; ?></td></tr>
<tr><td class="pler"><b>Date</b></td>
<td class="pler">:</td><td class="pler"><?php echo $result->deposited_date; ?></td></tr>
<tr><td class="pler"><b>Mode</b></td>
<td class="pler">:</td><td class="pler"><?php echo $result->deposit_type; ?></td></tr>

<tr><td class="pler"><b>Status</b></td>
<td class="pler">:</td>
<td class="pler">

<select name="status">
<option value=''>Select Status</option>
<option value='Pending' <?php if ($result->status == 'Pending') echo 'selected'; ?>>Pending</option>
<option value='Accepted' <?php if ($result->status == 'Accepted') echo 'selected'; ?>>Accepted</option>
<option value='Declined' <?php if ($result->status == 'Declined') echo 'selected'; ?>>Declined</option>

</select>
<input type="hidden" name="amount_deposited" value="<?php echo $result->amount_credit; ?>">
<input type="hidden" name="agent_id" value="<?php echo $result->agent_id; ?>">
</td></tr>


<tr><td class="pler"></td>
<td class="pler">&nbsp;</td>
<td class="pler"><input type="image" src="<?php echo WEB_DIR ?>images/sub_mint_btn_admin.jpg" width="109" height="35" name='submit' value="Submit"></td></tr>

</table>

</form>
</div>
<div class="footer">
		<div class="copy">©2012  stayaway com. All rights reserved</div>
</div>
</body>
</html>	