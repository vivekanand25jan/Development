<div class="logo">
                    	<a href="#"><img src="images/logo.jpg" width="247" height="139" /> </a>
                    </div>
                    <div class="header_r">
<div class="wi700">   		<div class="sign_cover">
                            		<div class="sign_bg_L"></div>
                                    <div class="sign_bg_M">
                             <?php 
							 if(isset($_SESSION['logged_in']) || isset($_SESSION['agent_logged_in']))
							 {
							 ?>
                                    <a href="<?php echo WEB_URL; ?>account/logout" class="sign_up_link">Log Out</a>   | <a href="<?php echo WEB_URL; ?>account/my_account/<?php  echo $_SESSION['b2c_userid']; ?>" class="sign_up_link">My Account</a> 
                              
     <?php	 
							 }
							 else
							 {
								 ?>
                                    <a href="<?php echo WEB_URL; ?>home/login_page" class="sign_up_link">SignIn</a>   | <a href="<?php echo WEB_URL; ?>home/b2c_registration" class="sign_up_link">Register</a>   | <a href="<?php echo WEB_URL; ?>b2b/login" class="sign_up_link">Agent</a> 
                              
     <?php
							 }
							 ?>
                                    
                                  | <a href="#" class="sign_up_link">Customer Support</a> | <a href="#" class="sign_up_link">Feedback</a></div>
                                    <div class="sign_bg_R"></div>
                            </div></div>
             <div class="wi700">   <div class="wi251">
                         		<div class="wi40"><img src="images/phone.jpg" width="40" height="28" /></div>
               <div class="wi198_28">240 57 95 145</div>
                      </div></div>
                         <div class="meunwi700">
                         
                         		<div class="menu_L"></div>
                           <div class="menu_M"> <a href="<?php echo WEB_URL.'hotel' ?>" class="menu_link pd10">HOME</a>      <a href="#" class="menu_link pd10">ABOUT US</a>      <a href="#" class="menu_link pd10">ADVANTAGE</a>       <a href="#" class="menu_link pd10">WHY BOOK ONLINE</a>      <a href="#" class="menu_link pd10">TERMS & CONDITION</a>       <a href="#" class="menu_link pd10">BECOME AGENT</a> 
</div>
                           <div class="menu_R"></div>
                         </div>
        </div>
        