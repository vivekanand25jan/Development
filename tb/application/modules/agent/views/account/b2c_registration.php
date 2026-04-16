<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="<?php echo WEB_DIR; ?>account_gui/css/postion.css" rel="stylesheet" type="text/css" />

</head>

<body>
		<div id="main_continer">
   		  <div class="header">
                <?php $this->load->view('header'); ?>
            
                    <div class="inner_banner"><img src="<?php echo WEB_DIR; ?>account_gui/images/inner_banner.jpg" width="979" height="230" /></div>
                    <div class="content_cover" style="height:800px;"><p class="mm"></p>
                  <p class="big-txxt">Sign Up</p> <div class="wi584"> Welcome to your account
                                            
                                 </div>              <p class="blue-txt">
                                 
                               
                                 Thank you for booking your travel . You will receive your confirmation/ invoice in the next few minutes. If you receive no confirmation email in the next few minutes, please contact our service center.
                                 
                                 
                                 </p>
                           <div class="left_pannel">
                            		
                              <div class="add">
               		  <div class="wi182_bor_bottom">
                                    		<div class="wi115_bor_bottom">DO YOU 
NEED HELP ?</div>
<div class="wi56_47"><img src="<?php echo WEB_DIR; ?>account_gui/images/Contact_pic.jpg" width="56" height="47" /></div>
                                    </div>
                                    <div class="wi115_bor_bottom_call"><span style="font-size:16px;">CALL US</span><br/>210 27 18127 1452</div>
                              </div>
                              <div class="add">
               		  <div class="wi182_bor_bottom">
                                    		<div class="wi115_bor_bottom">DO YOU 
NEED HELP ?</div>
<div class="wi56_47"><img src="<?php echo WEB_DIR; ?>account_gui/images/Contact_pic.jpg" width="56" height="47" /></div>
                                    </div>
                                    <div class="wi115_bor_bottom_call"><span style="font-size:16px;">CALL US</span><br/>210 27 18127 1452</div>
                              </div>
                            </div>
                            
                             <div class="right_pannel_new">
                            		<div class="wi714">
                                    		
                                 
 
                               </div>
                                
  <div class="for_loop">
  <div class="gray">Create your Member Account<span style="float:right"><blink><font color="#990000"> <?php
		   
		  if(isset($exist))
		  {
			  echo $exist;
		  }
		  ?></font></blink></span></div>
  <div class="formmm">
   
  
  <div class="bul-txxt1">Access your Account :	</div>
  <br />
  <div class="tbb">
 
<script type="text/javascript">
		function validate_reg()
		{
			
		filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		
		if(document.reg.fname.value == "First Name")
		{
			alert("Please Enter First Name");
			
			return false;
		}
		
		/*if(document.reg.mname.value=="Middle Name")
		{
			alert("Please Enter Middle Name");
		
			return false;
		}*/
		
		if(document.reg.sname.value=="Surname")
		{
			alert("Please Enter Sure Name");
		
			return false;
		}
		
		if(document.reg.email.value=="Email Address")
		{
			alert("Please Enter EmailID");
		
			return false;
		}
		if (filter.test(document.reg.email.value) == false) {
			alert('Enter Valide Email Address');
			return false;
		}
		
		if(document.reg.pass.value=="Password")
		{
			alert("Please Enter Password");
			
			return false;
		}
		if(document.reg.cpass.value=="Verify Password")
		{
			alert("Please Enter Verify Password");
			
			return false;
		}
		if(document.reg.pass.value != document.reg.cpass.value)
		{
			alert("Password Are Mismatching");
		
			return false;
		}
		
		if(document.reg.countryProvider.value == '0')
		{
			alert("Please Enter Country");
			
			return false;
		}
	
	        document.reg.submit();
		
		}
		
		
		function validate_login()
		{
			
		
		if(document.login.email.value=="Email Address")
		{
			alert("Please Enter Email Address");
			
			return false;
		}
		
		if(document.login.pass.value=="Password")
		{
			alert("Please Enter Password");
		
			return false;
		}
		
		
	        document.login.submit();
		
		}
</script>
 <form action="<?php echo WEB_URL.'home/registration_process'; ?>" method="post"  name="reg" >
  <table width="680" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>First Name<input name="fname" type="text" value="<?php echo set_value('fname'); ?>"  class="white-new"/><span style="color:#09C"> <?php
    echo form_error('fname');
 
 ?></span></td>
    
    <td>Middle Name<input name="mname" type="text" value="<?php echo set_value('mname'); ?>"  class="white-new"/><span style="color:#09C"> <?php
    echo form_error('mname');
 
 ?></span></td>
    
    <td>Surname<input name="sname" type="text" value="<?php echo set_value('sname'); ?>"  class="white-new"/><span style="color:#09C"> <?php
    echo form_error('sname');
 
 ?></span></td>
  </tr>
  
  
  <tr>
    <td>E-mail Address<input name="email" type="text" value="<?php echo set_value('email'); ?>"  class="white-new"/><span style="color:#09C"> <?php
    echo form_error('email');
 
 ?></span></td>
    
    <td>Password<input name="pass" type="password" value="<?php echo set_value('pass'); ?>"  class="white-new"/><span style="color:#09C"> <?php
    echo form_error('pass');
 
 ?></span></td>
    
    <td>Verify Password<input name="cpass" type="password" value="<?php echo set_value('cpass'); ?>"  class="white-new"/><span style="color:#09C"> <?php
    echo form_error('cpass');
 
 ?></span></td>
  </tr>
  
  
 <tr>
    <td><select name="Country" class="white-new"><option value="india">India</option></select></td>
    
    <td>&nbsp;</td>
    
    <td><input type="image"  src="<?php echo WEB_DIR; ?>account_gui/images/create.jpg" width="109" height="35" /></td>
  </tr>
 <tr>
   <td>&nbsp;</td>
   <td>&nbsp;</td>
   <td>&nbsp;</td>
 </tr>
 
  <tr>
   <td><p class="chk"><input type="checkbox" name="terms" id="checkbox" /></p><span style="color:#09C"> <?php
    echo form_error('terms');
 
 ?></span>
   <p class="agrrmnt">Terms & Conditions Agreement</p>
     </td>
   <td>&nbsp;</td>
   <td>&nbsp;</td>
 </tr>
  <tr>
    <td colspan="2"><p class="chk"><input type="checkbox" name="news-agree" id="checkbox" /></p>
   <p class="agrrmnt">I want to recieve Newsletter & Great Savings Offers</p></td>
    <td>&nbsp;</td>
  </tr>
  </table>
  </form>
  <hr />
 <div class="bul-txxt1">Already a Member?</div>
   <p class="fl">
  Just type in your log-in name and password.
</p><div class="neww">
 
        <form action="<?php echo WEB_URL.'home/user_login'; ?>" method="post"  name="login" >


<p><input name="email" type="text"  value="E-mail" class="white-new" /></p>
<p><input name="pass" type="password" class="white-new" /></p>

<div class="lgo-butn1"><input type="image" onClick="javascript:return validate_login()" src="<?php echo WEB_DIR; ?>account_gui/images/login.jpg" width="109" height="35" /></div>
</form>
</div>

<div class="neww">
 
<div class="bul-txxt1">Account Benefits :</div>

<ul>
<li>Enjoy faster checkouts</li>
<li>Save current, past and future bookings</li>
<li>Get Low Fare Alerts and other special travle offers</li>
<li>Quickly access the best offers to your favourite destinations</li>
<li>Quickly earn points towards travel rewards with  Rewards</li>
<li>
Become fully eligible for coupons</li>
</ul>






</div>

  </div>
  </div>
         
  
  </div>    
                            </div>
                    </div>
          
          
          <div class="border_dd"></div>
          <?php $this->load->view('footer'); ?>
        </div>
        </div>
</body>
</html>
