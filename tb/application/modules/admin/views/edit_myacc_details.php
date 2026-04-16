
<?php $this->load->view('header');?>
<div class="contete_area">

<div class="left_al">
<a href="<?php echo site_url('index/myacc_details/')?>" class="my_prifile_bg">My Profile</a>
<a href="<?php echo site_url('index/edit_myacc_details/')?>" class="my_prifile_bg">Edit My Profile</a>
</div>
                            	
		<form action="<?php echo WEB_URL.'index/edit_myacc_details/'.$user_info->user_id; ?>" method="post"  name="reg" >
	<div style="width:960px; float:left;">	
<table border="0" align="center" cellpadding="5" cellspacing="0">

<tr><td align="left" valign="top" class="pler"><b>First Name</b></td>
<td align="left" valign="middle" class="pler">:</td>
<td align="left" valign="top" class="pler">
<input class="agent_text_cover_txt_feil" name="firstname" type="text" value="<?php if( isset($user_info->firstname)) echo $user_info->firstname; ?>" >
<?php echo form_error('firstname');?>
</td></tr>

<tr><td align="left" valign="top" class="pler"><b>Last Name</b></td>
<td align="left" valign="middle" class="pler">:</td>
<td align="left" valign="top" class="pler">
<input class="agent_text_cover_txt_feil" name="lastname" type="text" value="<?php if( isset($user_info->lastname)) echo $user_info->lastname; ?>" >
<?php echo form_error('lastname');?>
</td></tr>

<tr><td align="left" valign="top" class="pler"><b>Email</b></td>
<td align="left" valign="middle" class="pler">:</td>
<td align="left" valign="top" class="pler">
<input class="agent_text_cover_txt_feil" name="email" type="text" value="<?php if( isset($user_info->email)) echo $user_info->email; ?>" >
<?php echo form_error('email');?>
</td></tr>

<tr><td align="left" valign="top" class="pler"><b>Password</b></td>
<td align="left" valign="middle" class="pler">:</td>
<td align="left" valign="top" class="pler">
<input class="agent_text_cover_txt_feil" name="password" type="password" value="" >
<?php echo form_error('password');?>
</td></tr>

<tr><td align="left" valign="top" class="pler"><b>Confirm Password</b></td>
<td align="left" valign="middle" class="pler">:</td>
<td align="left" valign="top" class="pler">
<input class="agent_text_cover_txt_feil" name="comform_password" type="text" value="" >
</td></tr>

<tr><td align="left" valign="top" class="pler"><b>Contact No</b></td>
<td align="left" valign="middle" class="pler">:</td>

<td align="left" valign="top" class="pler">
<input class="agent_text_cover_txt_feil" name="contact_no" type="text" value="<?php if( isset($user_info->contact_no)) echo $user_info->contact_no; ?>" ></td></tr>
<tr><td colspan="2" align="left" valign="top" style='color:#FF0000;' class="pler"><?php echo form_error('contact_no');?></td></tr>


<tr><td align="left" valign="top" class="pler"><b>Address</b></td>
<td align="left" valign="middle" class="pler">:</td>
<td align="left" valign="top" class="pler">
<input class="agent_text_cover_txt_feil" name="address" type="text" value="<?php if( isset($user_info->address)) echo strip_tags($user_info->address); ?>" >
</td></tr>
<tr><td colspan="2" align="left" valign="top" style='color:#FF0000;' class="pler"><?php echo form_error('address');?></td></tr>

<tr>
<td align="left" valign="middle" class="pler">&nbsp;</td>
<td align="left" valign="top" class="pler"></td><td align="left" valign="top" class="pler"><input type="image" name="submit" src="<?php echo WEB_DIR ?>images/sub_mint_btn_admin.jpg" width="109" height="35"  value="Submit" /></td></tr>

</table>
</div>


</form>
        
        <div style="clear:both;"></div></div>
        <div class="footer">
		<div class="copy">©2012  stayaway com. All rights reserved</div>
</div>
       
</body>
</html>
