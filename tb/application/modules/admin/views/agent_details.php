<!DOCTYPE html>

<html lang="en">
<head>
   <meta charset="utf-8">
   <title>Login</title>
</head>
<body>
                	<?php echo $this->load->view('header'); ?>
<a href="<?php echo site_url('index/agent_details/'.$agent_details->agent_id)?>">Contact Details</a>
<a href="<?php echo site_url('index/agent_deposit_details/'.$agent_details->agent_id)?>">Credit / Deposit</a>
<a href="<?php echo site_url('index/agent_markup/'.$agent_details->agent_id)?>">Commission/ Mark up</a>
<a href="<?php echo site_url('index/agent_top_cities/'.$agent_details->agent_id)?>">Maintain Top City List</a>


<form action="<?php echo WEB_URL.'index/agent_details/'.$agent_details->agent_id;?>" method="post"  name="reg" >
<table border="0" cellspacing="0" cellpadding="5">
<tr><td>Name:</td><td><?php echo $agent_details->name;?></td></tr>
<tr><td>Company Name:</td><td><?php echo $agent_details->company_name;?></td></tr>
<tr><td>Address:</td><td><?php echo $agent_details->address; ?></td></tr>
<tr><td>City:</td><td><?php echo $agent_details->city; ?></td></tr>
<tr><td>Pin:</td><td><?php echo $agent_details->postal_code; ?></td></tr>
<tr><td>Country:</td><td><?php echo $agent_details->country; ?></td></tr>
<tr><td>Email:</td><td><?php echo $agent_details->email_id; ?></td></tr>
<tr><td>Office Phone:</td><td><?php echo $agent_details->office_phone; ?></td></tr>
<tr><td>mobile:</td><td><?php echo $agent_details->mobile; ?></td></tr>
<tr><td>Currency:</td><td>

<select name="currency">
<option value=''>Select Currency</option>
<?php
    
    for ($i = 0; $i < count($currency); $i++) {
        if (trim($currency[$i]->country) == trim($agent_details->currency_type)) { 
            $select = 'selected';
        }
        else {
            $select = '';
        }
        echo "<option $select value='" . $currency[$i]->country . "'>" . $currency[$i]->country."</option>";
    }
?>
</select>
                        
</td></tr>
<tr><td>Alloted Call Center:</td><td>
<select name="call_center">
<option value=''>Select Call Center</option>
<?php
    
    for ($i = 0; $i < count($callcenter); $i++) {
        if (trim($callcenter[$i]->call_center_id) == trim($agent_details->call_center_id)) { 
            $select = 'selected';
        }
        else {
            $select = '';
        }
        echo "<option $select value='" . $callcenter[$i]->call_center_id . "'>" . $callcenter[$i]->call_center."</option>";
    }
?>
</select>

</td></tr>

<tr><td></td><td><input type="submit" name='submit' value="Submit"></td></tr>

</table>

</form>


</body>
</html>	