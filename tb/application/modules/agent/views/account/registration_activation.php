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
                  <p class="big-txxt">Almost Done!</p> 
                  <div class="wi584"> A step away from being member of Provab
                                            
                                 </div>              <p class="blue-txt">Requires account activation, an activation link has been sent to the e-mail address you provided.

Please check your e-mail for further information.</p>
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
  
   
    
    <div class="content-box">
      
      

      

      <div class="leftcont">

        <div class="inside">

          <div class="info-wrapper">  

            	<div class="text-area">
        
    
    <p>If you do not activate your account in 5 days from the day of creating your account, then your registration data will be deleted from the server.</p>
    
    

  		</div>

    

    	<div class="tickbox">
		<?php 
		  	if($resend == 'Yes')
			  echo "Activation code has been resended";
		?>

        <h3>No activation email?</h3>

        <ul>

			<li>Check your Spam filter settings and look through your Junk folder</li>

            <!--<li>Click <a href="<?php echo WEB_URL.'utility/registration/'.$emailId; ?>">here</a> in order to resend the activation email</li>-->


        </ul>


    </div>
 

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
