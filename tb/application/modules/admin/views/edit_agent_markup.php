<!DOCTYPE html>

<html lang="en">
<head>
   <meta charset="utf-8">
   <title>Login</title>
</head>

<body>
                	<?php echo $this->load->view('header'); ?>
<a href="<?php echo site_url('index/agent_details/'.$agent_id)?>">Contact Details</a>
<a href="<?php echo site_url('index/agent_deposit_details/'.$agent_id)?>">Credit / Deposit</a>
<a href="<?php echo site_url('index/agent_markup/'.$agent_id)?>">Commission/ Mark up</a>
<a href="<?php echo site_url('index/agent_top_cities/'.$agent_id)?>">Maintain Top City List</a>

<?php
$agent_markup_id = '';
if (isset($result->agent_markup_id)) {
	$agent_markup_id = $result->agent_markup_id;
}
?>
<form action="<?php echo WEB_URL.'index/edit_agent_markup/'.$agent_id.'/'.$result->api_id;?>" method="post"  name="reg" >
<table border="0" cellspacing="0" cellpadding="5">
<tr><td>API:</td><td><?php echo $result->api_name;?></td></tr>

												
<tr><td>Commission (%) *</td><td><input class="agent_text_cover_txt_feil" name="commission" type="text" value="<?php if( isset($result->commission)) echo $result->commission; ?>" />
<div style="color:#FF0000;"> <?php echo form_error('postal_code');?></div>
</td></tr>
<tr><td>Markup (%) *</td><td><input class="agent_text_cover_txt_feil" name="markup" type="text" value="<?php if( isset($result->markup)) echo $result->markup; ?>" />
<div style="color:#FF0000;"> <?php echo form_error('markup');?></div>
</td></tr>
<input type='hidden' name='agent_id' value='<?php echo $agent_id; ?>'>
<input type='hidden' name='api_id' value='<?php echo $result->api_id; ?>'>

<tr><td></td><td><input type="submit" name='submit' value="Submit"></td></tr>

</table>

</form>


</body>
</html>	