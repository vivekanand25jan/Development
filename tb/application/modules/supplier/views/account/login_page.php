<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="<?php echo WEB_DIR; ?>css/style_sheet.css" rel="stylesheet" type="text/css" />
<link href="<?php echo WEB_DIR; ?>css/postion.css" rel="stylesheet" type="text/css" />

</head>
<body>
<?php $this->load->view('header'); ?>
<div class="midlebody">

    <div class="mainbody_signin">
   
    <div>
    <div class="hotelnames_signin" style="min-height:329px;">
    
   		<!--<div class="right-hotel-name">Youngor Central Suzhou</div>-->
         <form action="<?php echo WEB_URL.'home/user_login'; ?>" method="post"  name="login" >

        <table width="975" border="0" cellspacing="7" cellpadding="3" class="r-hoteldeta">
          <tr>	
          	<td width="295" valign="top" style="border-right:1px dotted #868484">
            	<table width="260" align="center" border="0" cellpadding="5" cellspacing="0">
                    <tr>
                      <td class="right-hotel-name" style="font-size:26px; color:#336699">Sign in</td>
                    </tr>
                   
                    <tr>
                      <td class="mid-txt">Email ID</td>
                    </tr>
                    <tr>
                      <td>
                       <input class="sign-txt-box" type="text"  value=""  name="email">
<span style=" color:#09C"><?php
    echo '<br>'.form_error('email');

 ?></span>
                      <br /><span class="sum-txt" style="color:#999999; font-size:11.5px">This is the email address you registered with</span></td>
                    </tr>
                    <tr>
                      <td class="mid-txt">Password</td>
                    </tr>
                    <tr>
                      <td>                      
                       <input type="password" class="sign-txt-box" value=""   name="pass">
  <span style="color:#09C"> <?php
    echo '<br>'.form_error('pass');
 
 ?></span>
 
 <br /><input name="" type="checkbox" value="" />
                      <span class="sum-txt" style="color:#333333; font-size:14px">Remember me on this computer</span></td>
                    </tr>
                    <tr>
                      <td><input type="image"  onClick="javascript:return validate_login()" src="<?php echo WEB_DIR; ?>images/sign-but.png"  /></td>
                    </tr>
                    <tr>
                      <td class="mid-txt" style="color:#336699">Don't have a StayAway Account?</td>
                    </tr>
                    <tr>
                      <td class="sum-txt"><a href="<?php echo WEB_URL; ?>home/b2c_registration" style="color:#ff6600; font-size:14px; text-decoration:underline">Sign up for one</a></td>
                    </tr>
                  </table>
            </td>
            <td width="680"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td><img src="<?php echo WEB_DIR; ?>images/sign-slid-img.jpg" border="0"  /></td>
                                </tr>
                              </table>
                              </td>
          </tr>
        </table>
      </form>
    </div>
 

  </div>
  </div>
  
  
</div><div style="clear:both"></div>
<?php $this->load->view('footer'); ?>
</body>
</html>
 