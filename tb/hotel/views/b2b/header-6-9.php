<div class="wrapper">
<div class="logobody">
<div class="logo"><a href="<?php echo WEB_URL; ?>"><img src="<?php echo WEB_DIR; ?>images/logo.jpg" width="255" height="151" border="0" /></a></div>
<div class="regter">
<p style="color:#FFF; padding-right:15px;">  <?php 
							
							 ?>
                                    <a href="<?php echo WEB_URL; ?>b2b/logout/" class="sign_up_link">Log Out</a>   
  
                                    
                                    | Welcome <?php echo $this->session->userdata('name'); ?></p></div>
<div class="ormsg">
<p style="color:#FFF; padding-right:50px;"><strong style="padding-right:132px; line-height:40px;">+91.12345 12345</strong> <strong style="padding-right::30px;"><a href="#" style="color:#FFF;">LEAVE US A MESSAGE</a></strong></p>
</div>

<!--<div class="meunwi700">
                         
                         		<div class="menu_L"></div>
                           <div class="menu_M"> <a href="<?php echo WEB_URL.'hotel' ?>" class="menu_link pd10">HOME</a>      <a href="#" class="menu_link pd10">ABOUT US</a>      <a href="#" class="menu_link pd10">ADVANTAGE</a>       <a href="#" class="menu_link pd10">WHY BOOK ONLINE</a>      <a href="#" class="menu_link pd10">TERMS & CONDITION</a>       <a href="#" class="menu_link pd10">BECOME AGENT</a> 
</div>
                           <div class="menu_R"></div>
                         </div>-->
                         
<div class="nav">
<ul>
<li><a href="<?php echo WEB_URL; ?>b2b/agent_page/" id="activehome">HOME</a></li>
<li><a href="<?php echo WEB_URL; ?>b2b/my_booking/" class="activenav">My Booking</a></li>
<li><?php if ($this->session->userdata('agent_logged_in')) :?>
						   <a href="<?php echo WEB_URL; ?>b2b/agent_profile" class="activenav">MY-C-PANNEL</a>      
						   <?php endif;?></li>
<li><a href="<?php echo WEB_URL; ?>b2b/my_favourite/" class="activenav">My Favourite </a></li>
<li><a href="#" class="activenav">TERMS & CONDITIONS</a></li>
<li><a href="#" class="activenav">CONTACT US</a></li>
</ul>
</div>                   

</div>

</div>