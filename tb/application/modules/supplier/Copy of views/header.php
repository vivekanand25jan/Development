<div class="wrapper">
<div class="logobody">
<div class="logo"><a href="<?php echo WEB_URL; ?>"><img src="<?php echo WEB_DIR; ?>images/logo.jpg" width="255" height="151" border="0" /></a></div>
<div class="regter">
<p style="color:#FFF; padding-right:15px;">  <?php 
							 if(isset($_SESSION['logged_in']) || isset($_SESSION['agent_logged_in']))
							 {
							 ?>
                                    <a href="<?php echo WEB_URL; ?>account/logout" class="sign_up_link">Log Out</a>   | <a href="<?php echo WEB_URL; ?>account/my_account" class="sign_up_link">My Account</a> 
                              
     <?php	 
							 }
							 else
							 {
								 ?>
                                    <a href="<?php echo WEB_URL; ?>home/login_page" class="sign_up_link">SignIn</a>   | <a href="<?php echo WEB_URL; ?>home/b2c_registration" class="sign_up_link">Register</a>   | <a href="<?php echo WEB_URL; ?>b2b/login" class="sign_up_link">Agent</a> 
                              
     <?php
							 }
							 ?>
                                    
                                  | <a href="#" class="sign_up_link">Customer Support</a></p></div>
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
<li><a href="<?php echo WEB_URL; ?>" id="activehome">HOME</a></li>
<li><a href="#" class="activenav">ABOUT US</a></li>
<li><a href="#" class="activenav">ADVANTAGE</a></li>
<li><a href="#" class="activenav">BECOME AGENT</a></li>
<li><a href="#" class="activenav">TERMS & CONDITIONS</a></li>
<li><a href="#" class="activenav">CONTACT US</a></li>
</ul>
</div>                   

</div>

</div>