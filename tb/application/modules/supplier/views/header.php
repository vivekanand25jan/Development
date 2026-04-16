<!--<script src="<?php echo WEB_DIR; ?>script/jquery.js"></script>
<script src="<?php echo WEB_DIR; ?>script/jquery-1.8.3.min.js"></script>
<script src="<?php echo WEB_DIR; ?>script/thickbox.js"></script>
<link rel="stylesheet" href="<?php echo WEB_DIR; ?>script/thickbox.css">-->

<div class="wrapper">
<div class="travel_signin">

<?php $supplier_logged_in = $this->session->userdata('supplier_logged_in');
if(isset($supplier_logged_in)&& $supplier_logged_in != '')
{
?>
<p>Welcome <?php echo $this->session->userdata('name'); ?> <span class="travel_signin_space">|</span>   <a href="<?php echo WEB_URL; ?>index/logout/" class="sign_up_link">Log Out</a> <span class="travel_signin_space">|</span>  <a href="#">Feedback</a></p>
<?php	 
}
else
{
?>
<p><a href="<?php echo WEB_URL; ?>../../">Signin</a> <span class="travel_signin_space">|</span>   <a href="<?php echo WEB_URL; ?>index/login/">Supplier</a> <span class="travel_signin_space">|</span>   <a href="<?php echo WEB_URL; ?>../../index.php/b2b/login/">Agent</a> <span class="travel_signin_space">|</span>   <a href="#">Feedback</a></p>
<?php
}
?>

</div>
<div style="clear:both;"></div>
<div class="bodymain">
<div class="bodymain_top_bg"></div>
<div class="bodymain_middle_bg">
<div class="body1000">
<!--top banner here-->
<div class="travel_logo_top">
<div class="travelbay_logo"><a href="<?php echo WEB_URL; ?>"><img src="<?php echo WEB_DIR; ?>designAccess/images/travel_bay_logo.png" width="310" height="68" border="0" /></a></div>
<div class="travel_sndiv">
<div class="travel_sn"><span style="position:relative; top:-12px;">Follow us:</span> <a target="_blank" href="http://www.facebook.com/travebayuae"><img src="<?php echo WEB_DIR; ?>designAccess/images/sn_icons-fb.jpg" border="0" /></a><a target="_blank" href="http://www.twitter.com/travelbayy"><img src="<?php echo WEB_DIR; ?>designAccess/images/sn_icons1.jpg" border="0" /></a><img src="<?php echo WEB_DIR; ?>designAccess/images/sn_icons21.jpg" border="0" /></div>
<div class="travel_sn1"><img src="<?php echo WEB_DIR; ?>designAccess/images/phone_icon.png" width="11" height="31" border="0" style="position:relative; top:5px;" /> <span style="font-size:25px; font-weight:bold;">+971 6 5573813</span></div>
</div>
</div>
<!--top banner end here-->

<!--navigation start here-->
<div class="navfull">
<div class="nav_left"></div>
<div class="nav_middle">
<div class="nav">
<ul>
<li><a href="<?php echo WEB_URL; ?>" id="nav_active">HOME</a></li>
<li><div><img src="<?php echo WEB_DIR; ?>designAccess/images/nav_line.png" width="1" height="45" border="0" /></div></li>
<li><a href="<?php echo WEB_URL; ?>index/supplier_detail_edit">PROFILE</a></li>
<li><div><img src="<?php echo WEB_DIR; ?>designAccess/images/nav_line.png" width="1" height="45" border="0" /></div></li>
<li><a href="javascript:void(0)" onclick = "document.getElementById('light1').style.display='block';document.getElementById('fade1').style.display='block'" >ABOUT US</a></li>
<li><div><img src="<?php echo WEB_DIR; ?>designAccess/images/nav_line.png" width="1" height="45" border="0" /></div></li>
<li><a href="javascript:void(0)" onclick = "document.getElementById('light3').style.display='block';document.getElementById('fade3').style.display='block'" >ADVANTAGE</a></li>
<li><div><img src="<?php echo WEB_DIR; ?>designAccess/images/nav_line.png" width="1" height="45" border="0" /></div></li>
<li><a href="<?php echo WEB_DIR; ?>index.php/b2b/login" target="_blank">BECOME AGENT</a></li>
<li><div><img src="<?php echo WEB_DIR; ?>designAccess/images/nav_line.png" width="1" height="45" border="0" /></div></li>
<li><a href="javascript:void(0)" onclick = "document.getElementById('light2').style.display='block';document.getElementById('fade2').style.display='block'">TERMS & CONDITIONS</a></li>

</ul>
</div>
</div>
<div class="nav_right"></div>
</div>
<!--navigation end here-->
<?php include('about_us.php');?>
<?php include('advantage.php');?>
<?php include('contact_us.php'); ?>
<?php include('terms_conditions.php'); ?>


<style>
.close_btn {
    background: url("<?php echo WEB_DIR; ?>images/close.png") no-repeat scroll 0 0 transparent;
    display: block;
    height: 42px;
    left: 507px;
    position: relative;
    text-indent: -9999px;
    width: 42px;
}
</style>