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
<div class="travel_sn"><span style="position:relative; top:-12px;">Follow us:</span> <img src="<?php echo WEB_DIR; ?>designAccess/images/sn_icons.png" width="97" height="33" border="0" /></div>
<div class="travel_sn1"><img src="<?php echo WEB_DIR; ?>designAccess/images/phone_icon.png" width="11" height="31" border="0" style="position:relative; top:5px;" /> <span style="font-size:25px; font-weight:bold;">+ 971 6 5573813</span></div>
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
<li><div><img src="<?php echo WEB_DIR; ?>designAccess/images/nav_line.png" width="1" height="45" border="0" /></div></li>
<li><a href="javascript:void(0)" onclick = "document.getElementById('light1').style.display='block';document.getElementById('fade1').style.display='block'" >ABOUT US</a></li>
<li><div><img src="<?php echo WEB_DIR; ?>designAccess/images/nav_line.png" width="1" height="45" border="0" /></div></li>
<li><a href="javascript:void(0)" onclick = "document.getElementById('light3').style.display='block';document.getElementById('fade3').style.display='block'" >ADVANTAGE</a></li>
<li><div><img src="<?php echo WEB_DIR; ?>designAccess/images/nav_line.png" width="1" height="45" border="0" /></div></li>
<li><a href="<?php echo WEB_URL; ?>../../index.php/b2b/login/" target="_blank" >BECOME AGENT</a></li>
<li><div><img src="<?php echo WEB_DIR; ?>designAccess/images/nav_line.png" width="1" height="45" border="0" /></div></li>
<li><a href="javascript:void(0)" onclick = "document.getElementById('light2').style.display='block';document.getElementById('fade2').style.display='block'">TERMS & CONDITIONS</a></li>
<li><div><img src="<?php echo WEB_DIR; ?>designAccess/images/nav_line.png" width="1" height="45" border="0" /></div></li>
<?php //echo  WEB_URL.'index/contact';exit; ?>
<li><a href=" <?php echo  WEB_URL.'index/contact'; ?>" onclick="$('#lightbox').show();" target="light_box" class="text3">CONTACT US</a></li>

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
<style>

#lightbox{ background:url(<?php echo WEB_DIR ?>images/overlay.png); width:100%; 
height:1900px; display:none; z-index:99999; background-position:left; position:absolute; top:0%; left:0%;}
body{
margin-top:0px;

}
</style>
<style>
a{
 text-decoration:none;
 color:#0A85C8;
}
</style>

<div id="lightbox" align="center"><table align="center" cellpadding="0" cellspacing="0" height="100%" border="0">
<tr><td valign="middle"><div align="right" style="background-color:#FFF; border: 5px solid #63701E; width:600px; margin:0px auto; position: fixed; top:25px; left:32%; ">

<a href="javascript:void(o);" onClick="$('#light_box').attr('src','');$('#lightbox').hide();" class="ac_det"><div align="right" style="color:#069; font-size:14px; height:14; width:14; padding:5px 5px 0px 10px; "  ><img border="0" src="<?php echo WEB_DIR ?>images/Close-button1.png" height="15px" width="55" style="padding:5px 5px 0px 10px; float:right;"/>&nbsp;&nbsp;&nbsp;</div></a>
<iframe src="" id="light_box" name="light_box" frameborder="0" width="600px" height="600px" scrolling="no" style="background-color: #FFFFFF">
</iframe></div></td></tr></table></div>