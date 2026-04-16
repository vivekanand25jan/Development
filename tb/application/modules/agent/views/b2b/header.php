<div class="logo">
                    	<a href="#"><img src="images/logo.jpg" width="247" height="139" /> </a>
                    </div>
                    <div class="header_r">
<div class="wi700">   		<div class="sign_cover">
                            		<div class="sign_bg_L"></div>
									
                                    <div class="sign_bg_M">
                             
                                    <a href="<?php echo WEB_URL; ?>b2b/logout/" class="sign_up_link">Logout</a>
                              
     
                                    
                                  | <a href="#" class="sign_up_link">Customer Support</a> | <a href="#" class="sign_up_link">Feedback</a></div>
                                    <div class="sign_bg_R"></div>
                            </div></div>
							<div style="text-align:right;">Welcome <?php echo $this->session->userdata('name'); ?></div>
             <div class="wi700">   <div class="wi251">
                         		<div class="wi40"><img src="images/phone.jpg" width="40" height="28" /></div>
               <div class="wi198_28">240 57 95 145</div>
                      </div></div>
                         <div class="meunwi700_r">
                         <div class="menu_R_rRI"></div>
                         		
                           <div class="menu_M_R1"> <a href="<?php echo WEB_URL; ?>b2b/agent_page/" class="menu_link pd10">HOME</a>      <a href="<?php echo WEB_URL; ?>b2b/my_booking/" class="menu_link pd10">MY BOOKING</a>      <a href="#" class="menu_link pd10">SUPPORT TICKET</a>       
						   <?php if ($this->session->userdata('agent_logged_in')) :?>
						   <a href="<?php echo WEB_URL; ?>b2b/agent_profile" class="menu_link pd10">MY-C-PANNEL</a>      
						   <?php endif;?>
</div>
                   <div class="menu_L_R1"></div>        
                         </div>
        </div>
        