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

    <div class="" style="color:#F60;
    font-family: MAIAN;
    font-size: 19px;
    font-weight: bold;
    padding-bottom: 8px;">
    
   <?php if(isset($exist)) { echo $exist; } ?>
    <div>
    <div class="hotelnames_signin" style="min-height:329px;">
    
   		<!--<div class="right-hotel-name">Youngor Central Suzhou</div>-->
         <form action="<?php echo WEB_URL.'home/registration_process'; ?>" method="post"  name="reg" >
         <table width="975" border="0" cellspacing="3" cellpadding="5" class="r-hoteldeta">
          <tr>	
          	<td width="295" valign="top" style="border-right:1px dotted #868484">
            	<table width="285" align="center" border="0" cellpadding="3" cellspacing="0">
                    <tr>
                      <td class="right-hotel-name" style="font-size:30px; color:#336699">Thank you.</td>
                    </tr>
                   
                    <tr>
                      <td class="mid-txt_register"  style="font-size:24px; color:#F60;">Its almost done!</td>
                    </tr>
                    <tr>
                      <td  style="font-size:15px; color:#999;  ">

An activation link has been sent to the e-mail address you provided. Please check your e-mail for further information.

</td>
                    </tr>
                    <tr>
                    	<td>&nbsp;</td>
                    </tr>
                  
                    <tr>
                      <td class="sum-txt" style=" font-size:12px;  color:#999;  ">Already have a StayAway Account?<a href="<?php echo WEB_URL; ?>home/user_login" style="color:#ff6600;text-decoration:underline"> Sign in here »</a></td>
                    </tr>
                    <tr>
                    	<td>&nbsp;</td>
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

</form>    </div>
 

  </div>
  </div>
  
  
</div><div style="clear:both"></div>
<?php $this->load->view('footer'); ?>
</body>
</html>
 