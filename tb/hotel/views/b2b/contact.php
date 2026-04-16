<?php $details_contact= $this->B2b_Model->get_records_of_agent($this->session->userdata('agent_logged_in'));
//print '<pre />';print_r($details_contact);

?>
         <form method="post"  name="reg"  action="<?php echo WEB_URL.'hotel/contact_process'; ?>">
          
         <table width="600" border="0" cellspacing="3" cellpadding="5" class="r-hoteldeta">
          <tr>	
          <td>	</td>
            <td width="680" valign="top"  class="">
            <span class="right-hotel-name" style="font-size:26px; color:#243419;font-weight:bold;">
            Contact Us </span><br />
            </td>
            </tr>
         <tr>
       </table>
    	<table width="600" border="0" cellspacing="5" cellpadding="5" style="color:#243419">
              <tr>
    <td valign="top">Name</td>
    <td valign="top">:</td>
   

<td>
    <input type="text" name="person_name" style="width:200px"  value="<?php if(isset($details_contact->name)){ echo $details_contact->name;  } ?>"  id="contact_name" required/><br />
<p>  <font color="#FF0000">  <?php echo form_error('name'); ?></font></p></td>

  </tr>
  <tr>
    <td valign="top">Email Address</td>
    <td valign="top">:</td>
    
   
   <td><input type="email" name="email" style="width:200px" value="<?php if(isset($details_contact->email_id)) echo $details_contact->email_id; ?>" id="contact_email" required /><br />
   <p> <font  color="#FF0000">  <?php echo form_error('email'); ?></font></p></td>
  
  </tr>
   <tr>
     <td valign="top">Questions/Problems/Feedback</td>
     <td valign="top">:</td>
     <td><textarea cols="30" rows="8" name="comm" id="contact_comm" required><?php if(isset($comm)) echo $comm; ?></textarea><br />
    <p><font color="#FF0000">  <?php echo form_error('comm'); ?></font></p></td>
   </tr>
   
  <tr>
  <td>&nbsp;</td>  <td>&nbsp;</td>  <td>
  <br>
 <blink><font color="#990000"><?php  if(isset($exits)) { echo $exits; } ?></font></blink><br />
  <input type="image" src="<?php echo WEB_DIR; ?>account_gui/images/send_btn.jpg" /></td>
</table>
        

</form>    
