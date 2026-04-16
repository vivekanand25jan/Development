<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="<?php echo WEB_DIR; ?>account_gui/css/postion.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="<?php echo WEB_DIR; ?>account_gui/scripts/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="<?php echo WEB_DIR; ?>account_gui/scripts/jquery-ui-1.8.18.custom.min.js"></script>
<script type="text/javascript" src="<?php echo WEB_DIR; ?>account_gui/scripts/jquery.selectbox-1.2.js"></script>
<script type="text/javascript" src="<?php echo WEB_DIR; ?>account_gui/scripts/jquery.jcarousel.min.js"></script>
<script type="text/javascript" src="<?php echo WEB_DIR; ?>account_gui/scripts/script-jim.js"></script></head>
</head>

<body  class=' page-login'>
		<div id="main_continer">
   		  <div class="header">
                	<?php $this->load->view('header'); ?>
            
                    <div class="inner_banner"><img src="<?php echo WEB_DIR; ?>account_gui/images/inner_banner.jpg" width="979" height="230" /></div>
                    <div class="content_cover"><p class="mm"></p>
                  <p class="big-txxt">Sign Up</p> <div class="wi584">
                                            
                                 </div>              <p class="blue-txt">Thank you for booking your travel . You will receive your confirmation/ invoice in the next few minutes. If you receive no confirmation email in the next few minutes, please contact our service center.</p>
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
                            </div>      <div class="right_pannel_new">
                            	
                                
  <div class="for_loop_second">
  <div class="gray">Log In<span style="float:right"><blink><font color="#990000"> <?php
		   
		  if(isset($status))
		  {
			  echo $status;
		  }
		  ?></font></blink></span></div>
  
         
  <div class="login">
    
<div id="login-container">
    <div class="content-box">
      
      

      

      <div class="leftcont">

        <div class="inside">

          <div class="info-wrapper">  

          <ul>

            <li class="opened">

              <h3>Access you Account :</h3>

              <div class="infos one">

                <div class="infosinner"> Already a Member?<br />

                  Just type in your log-in email and password.<br />

                   <form action="<?php echo WEB_URL.'home/user_login'; ?>" method="post"  name="login" >


                    <input type="text"  value=""  name="email">
<span style=" color:#09C"><?php
    echo form_error('email');

 ?></span>
                    <input type="password" value=""   name="pass">
  <span style="color:#09C"> <?php
    echo form_error('pass');
 
 ?></span>
    
                  
                  <div class="login_btn"><input type="image"  onClick="javascript:return validate_login()" src="<?php echo WEB_DIR; ?>account_gui/images/login_btn.jpg" width="109" height="35" /></div>

                  </form>

                </div>

              </div>

            </li>

            <!--<li>

              <h3>Forgot your Log-in Name ? </h3>

              <div class="infos two">

                <div class="infosinner"> We can email your log-in name to your account email address.<br />

                  <form action="<?php echo WEB_URL.'account/forget_login'; ?>" method="post"  name="forget" >

                    <input type="text" value="First Name" id="firstnm" name="firstnm">

                    <input type="text" value="Email Address" id="rirtstnm" name="firstnm">

                    <input type="password" value="Password" id="password" name="password">

                  </form>

<div class="login_btn"><a href="#"><img src="<?php echo WEB_DIR; ?>account_gui/images/send_btn.jpg" width="109" height="35" /></a></div>
                  

                </div>

              </div>

            </li>-->

            <li>

              <h3>Forgot your Password ?</h3>

              <div class="infos three">

                <div class="infosinner"> We can email your password to your account email address.<br />
<form action="<?php echo WEB_URL.'home/forget_pass'; ?>" method="post"  name="forget" >


                    <input type="text" value=""   name="useremail">
<span style="color:#09C"> <?php
    echo form_error('useremail');
 
 ?></span>
              
<div class="login_btn"><input type="image" src="<?php echo WEB_DIR; ?>account_gui/images/send_btn.jpg" width="109" height="35" /></div>
                      </form>

                </div>

              </div>

              </li>

             </ul> 

          </div>

        </div>



  </div>

    

  </div>

   

</div>





  </div>
  
  <div class="OR"></div>
  
  <div class="login"> <hr />
  <div class="bul-txxt">Create you Account :	</div>
  <p class="fl">You will need to create an account to complete your request. It's fast and free.<br />
 
Here are just a few of the benefits you receive as a  member:<br />
 
Choose free services such as FareWatcher PlusSM, RSS Instant Fare Notification, and Flight Alert Notification. Get Low Fare Alerts and other special travel offers. Enjoy superior customer Care 24/7.<br />
</p>

<div class="create-butn"><a href="<?php echo WEB_URL.'home/b2c_registration'; ?>"><img src="<?php echo WEB_DIR; ?>account_gui/images/create.jpg" width="109" height="35" /></a></div>
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
