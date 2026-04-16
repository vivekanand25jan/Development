<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Hotel Booking System</title>
 
    <link href="<?php echo WEB_DIR; ?>designAccess/css/travel_bay_stylesheet.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?php echo WEB_DIR; ?>designAccess/engine1/style.css" />
    <script type="text/javascript" src="<?php echo WEB_DIR; ?>designAccess/engine1/jquery.js"></script>
    <script type="text/javascript">
	function showSup(){
		document.getElementById('age_login').style.display = 'none';
		document.getElementById('sup_login').style.display = 'block';
	}
	function showAge(){
		document.getElementById('sup_login').style.display = 'none';
		document.getElementById('age_login').style.display = 'block';
	}
	function newsletter()
  	{
		

		 var str1 = document.getElementById('email').value;
		 if(str1 =='')
	 	{
		 alert('Please Enter Email Address');
		 return false;
	 	}
	    $('#news').html("<div style='background-color:#FFF' align='middle'><img src='<?php echo WEB_DIR ?>gui/images/ajax-loader.gif'/></div>").fadeIn('fast');
		  if (window.XMLHttpRequest)
			  {// code for IE7+, Firefox, Chrome, Opera, Safari
			  xmlhttp=new XMLHttpRequest();
			  }
			else
			  {// code for IE6, IE5
			  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			  }
			xmlhttp.onreadystatechange=function()
			  {
			  if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
					
					document.getElementById("news").innerHTML=xmlhttp.responseText;
				}
			  }
			  
			
			
				var facilities = encodeURIComponent(str1); 
				
			xmlhttp.open("POST","<?php print WEB_URL ?>hotel/news/"+facilities,true);
			//xmlhttp.open("POST","<?php print WEB_URL ?>hotel/all_filter_new1/"+id,true);
			xmlhttp.send(); //ddd
        
        
       
   }
	
	</script>
    </head>

    <body>
	<?php $this->load->view('header'); ?>



<!--slider start here-->
<div class="sldier_bg">

<div id="wowslider-container1" style="position:relative; top:14px; right:11px;">
	<div class="ws_images"><ul>
      <?php
 if($banner!='')
  {
  for($i=0;$i<count($banner);$i++)
  {
	  if($banner[$i]->status=='0')
	  {
  ?>
<li><img src="<?php echo WEB_DIR; ?>admin/<?php echo $banner[$i]->file_path; ?>" alt="wallpaper-402140" title="wallpaper-402140" id="wows1_0"/></li>
<?php   
	  }
	  }
  }
  else
  { 
  ?>
  
	<li><img src="<?php echo WEB_DIR; ?>designAccess/data1/images/wallpaper402140.jpg" alt="wallpaper-402140" title="wallpaper-402140" id="wows1_0"/></li>
<!-- <li><img src="<?php echo WEB_DIR; ?>designAccess/data1/images/wallpaper663749.jpg" alt="wallpaper-663749" title="wallpaper-663749" id="wows1_1"/></li>
<li><img src="<?php echo WEB_DIR; ?>designAccess/data1/images/wallpaper782090.jpg" alt="wallpaper-782090" title="wallpaper-782090" id="wows1_2"/></li>
<li><img src="<?php echo WEB_DIR; ?>designAccess/data1/images/wallpaper1650173.jpg" alt="wallpaper-1650173" title="wallpaper-1650173" id="wows1_3"/></li>
<li><img src="<?php echo WEB_DIR; ?>designAccess/data1/images/wallpaper1743387.jpg" alt="wallpaper-1743387" title="wallpaper-1743387" id="wows1_4"/></li>   -->
<?php  }
?>
</ul></div>
<div class="ws_bullets"><div>
      <?php
 if($banner!='')
  {
  for($i=0;$i<count($banner);$i++)
  {
	   if($banner[$i]->status=='1')
	  {
  ?>
<a href="#" title="<?php echo $banner[$i]->image_name; ?>"><!--<img src="<?php echo WEB_DIR; ?>admin/<?php echo $banner[$i]->file_path; ?>"/>-->1</a>

<?php   
  }
  }
  }
  else
  { 
  ?>
  <a href="#" title="wallpaper-402140"><img src="<?php echo WEB_DIR; ?>designAccess/data1/tooltips/wallpaper402140.jpg" alt="wallpaper-402140"/>1</a>
<a href="#" title="wallpaper-663749"><img src="<?php echo WEB_DIR; ?>designAccess/data1/tooltips/wallpaper663749.jpg" alt="wallpaper-663749"/>2</a>
<a href="#" title="wallpaper-782090"><img src="<?php echo WEB_DIR; ?>designAccess/data1/tooltips/wallpaper782090.jpg" alt="wallpaper-782090"/>3</a>
<a href="#" title="wallpaper-1650173"><img src="<?php echo WEB_DIR; ?>designAccess/data1/tooltips/wallpaper1650173.jpg" alt="wallpaper-1650173"/>4</a>
<a href="#" title="wallpaper-1743387"><img src="<?php echo WEB_DIR; ?>designAccess/data1/tooltips/wallpaper1743387.jpg" alt="wallpaper-1743387"/>5</a>
  <?php  }
?>
</div></div>
	</div>
	<script type="text/javascript" src="<?php echo WEB_DIR; ?>designAccess/engine1/wowslider.js"></script>
	<script type="text/javascript" src="<?php echo WEB_DIR; ?>designAccess/engine1/script.js"></script>
</div>
<!--slider end here-->


<!--login start here-->
<div class="login_div">
<form id="age_login" action="<?php echo WEB_URL.'b2b/user_login'; ?>" method="post"  name="login" >
<div class="agent_login">
<div class="agent_login_header">Agent Login</div>
<table width="300" border="0" align="center" cellpadding="0" cellspacing="7">
  <tr>
    <td align="left" class="email_pass">Email ID:</td>
    <td align="left"><input value="<?php if( isset($login_email)) echo $login_email; ?>"  name="login_email" type="text"  class="email_textbox"/><div style="color:#FF0000;"> <?php echo form_error('login_email');?></div></td>
  </tr>
  <tr>
    <td align="left" class="email_pass">Password</td>
    <td align="left"><input name="login_password" type="password"  class="email_textbox"/></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="left"><a href="#" class="forget_password">Forgot your password ?</a></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="left"><a href="#"><input type="image" src="<?php echo WEB_DIR; ?>designAccess/images/login_hbt.png" border="0" width="73" height="25"/>
    <!--<img src="<?php echo WEB_DIR; ?>designAccess/images/login_hbt.png" width="73" height="25" border="0" />--></a></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="left" style="color:#63701E; font-size:12px;"><input name="" type="checkbox" value="" style="position:relative; top:2px;" /> Stay Logged in</td>
  </tr>
</table>
</div>
</form>

<form id="sup_login" action="<?php echo WEB_URL.'../supplier/index.php/index/user_login'; ?>" method="post"  name="login">
<div class="supplier_login">
<div class="agent_login_header">Suppliers Login</div>
<table width="300" border="0" align="center" cellpadding="0" cellspacing="7">
  <tr>
    <td align="left" class="email_pass">Email ID:</td>
    <td align="left"><input value="<?php if( isset($login_email)) echo $login_email; ?>" name="login_email" type="text"  class="email_textbox"/><div style="color:#FF0000;"> <?php echo form_error('login_email');?></div></td>
  </tr>
  <tr>
    <td align="left" class="email_pass">Password</td>
    <td align="left"><input name="login_password" type="password"  class="email_textbox"/></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="left"><a href="#" class="forget_password">Forgot your password ?</a></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="left"><a href="#"><input type="image" src="<?php echo WEB_DIR; ?>designAccess/images/login_hbt.png" border="0" width="73" height="25"/>
    <!--<img src="<?php echo WEB_DIR; ?>designAccess/images/login_hbt.png" width="73" height="25" border="0" />--></a>
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="left" style="color:#63701E; font-size:12px;"><input name="" type="checkbox" value="" style="position:relative; top:2px;" /> Stay Logged in</td>
  </tr>
</table>

</div>
</form>

<div class="become_agent">
<p style="color:#63701e; font-size:14px; text-transform:uppercase;"><strong>Become a agent</strong></p>
<p>Manage your bookings and obtain access to wholesale rates and inventories in more than 1200 cities worldwide.</p>
<p><a href="<?php echo WEB_URL; ?>b2b/login/" style="color:#63701e; font-size:14px;">Register here >></a></p>
</div>
<div class="become_agent" style="margin-top:2px;">
<p style="color:#63701e; font-size:14px; text-transform:uppercase;"><strong>Become a supplier</strong></p>
<p>Contract online, load your hotels, rates, inventory, images, descriptions and distribute to over 150,000 hotel agents worldwide.</p>
<p><a href="<?php echo WEB_URL; ?>../supplier/index.php/index/login/" style="color:#63701e; font-size:14px;">Register here >></a></p>
</div>
</div>
<!--login end here-->





<!--preferred_hotels start here-->
<div class="preferred_hotels">
<h1 class="h1_header">Preferred Hotels</h1>
<div class="rollBox" style="position:relative; top:-60px;">
<img onmousedown="ISL_GoDown()" onmouseup="ISL_StopDown()" onmouseout="ISL_StopDown()"  class="img1" src="<?php echo WEB_DIR; ?>designAccess/images/shqm_left_pic.gif" width="42" height="37"  style="position:relative; top:150px;"/>
     <div class="Cont" id="ISL_Cont">
      <div class="ScrCont">
       <div id="List1">
       
		<?php 
        foreach ($preferred_hotels as $preferred_hotels)
        {
        ?>
        <div class="pic">
          <a href="#" target="_blank"><img src="<?php echo WEB_DIR; ?>supplier_hotels_images/<?php echo $preferred_hotels->image_name;; ?>" width="154" height="194" />
          <p class="hotel_header"><?php if(isset($preferred_hotels->hotel_name)) echo $preferred_hotels->hotel_name;?></p>
          <p class="hotel_price"><?php if(isset($preferred_hotels->city)) echo $preferred_hotels->city;?></p></a>
        </div>
        <?php               
		}
		?> 
        
      	<!-- <div class="pic">
          <a href="#" target="_blank"><img src="<?php echo WEB_DIR; ?>designAccess/images/newd_img.jpg" width="154" height="194" />
          <p class="hotel_header">NEW DELHI</p>
          <p class="hotel_price">$532.98</p></a>
         </div>
         <div class="pic">
          <a href="#" target="_blank"><img src="<?php echo WEB_DIR; ?>designAccess/images/london_img.jpg" width="154" height="194" />
          <p class="hotel_header">LONDON</p>
          <p class="hotel_price">$532.98</p></a>
         </div>
         <div class="pic">
          <a href="#" target="_blank"><img src="<?php echo WEB_DIR; ?>designAccess/images/paris_img.jpg" width="154" height="194" />
          <p class="hotel_header">PARIS</p>
          <p class="hotel_price">$532.98</p></a>
         </div>
         <div class="pic">
          <a href="#" target="_blank"><img src="<?php echo WEB_DIR; ?>designAccess/images/dubai_img.jpg" width="154" height="194" />
          <p class="hotel_header">DUBAI</p>
          <p class="hotel_price">$532.98</p></a>
         </div>
         <div class="pic">
          <a href="#" target="_blank"><img src="<?php echo WEB_DIR; ?>designAccess/images/singa_img.jpg" width="154" height="194" />
          <p class="hotel_header">SINGAPORE</p>
          <p class="hotel_price">$532.98</p></a>
         </div>
      	 <div class="pic">
          <a href="#" target="_blank"><img src="<?php echo WEB_DIR; ?>designAccess/images/newd_img.jpg" width="154" height="194" />
          <p class="hotel_header">NEW DELHI</p>
          <p class="hotel_price">$532.98</p></a>
         </div>
         <div class="pic">
          <a href="#" target="_blank"><img src="<?php echo WEB_DIR; ?>designAccess/images/london_img.jpg" width="154" height="194" />
          <p class="hotel_header">LONDON</p>
          <p class="hotel_price">$532.98</p></a>
         </div>
         <div class="pic">
          <a href="#" target="_blank"><img src="<?php echo WEB_DIR; ?>designAccess/images/paris_img.jpg" width="154" height="194" />
          <p class="hotel_header">PARIS</p>
          <p class="hotel_price">$532.98</p></a>
         </div>
         <div class="pic">
          <a href="#" target="_blank"><img src="<?php echo WEB_DIR; ?>designAccess/images/dubai_img.jpg" width="154" height="194" />
          <p class="hotel_header">DUBAI</p>
          <p class="hotel_price">$532.98</p></a>
         </div>-->
       </div>
       <div id="List2"></div>
      </div>
     </div>
<img  onmousedown="ISL_GoUp()" onmouseup="ISL_StopUp()" onmouseout="ISL_StopUp()"  class="img2" src="<?php echo WEB_DIR; ?>designAccess/images/shqm_right_pic.gif" width="42" height="37"  style="position:relative; float:right; top:-150px;"/>
    </div>
</div>
<!--preferred_hotels end here-->

<div class="why_travelbay">
<h1>Why Use travel bay.com</h1>
<div class="travel_topic">
<ul style="list-style-type:decimal; padding-left:35px; padding-top:10px;">
<?php 
foreach ($why_choose_us as $why_choose_us)
{
?>
<li><?php if(isset($why_choose_us->city1_name)) echo $why_choose_us->city1_name;?></li>
<li><?php if(isset($why_choose_us->city2_name)) echo $why_choose_us->city2_name;?></li>
<li><?php if(isset($why_choose_us->city3_name)) echo $why_choose_us->city3_name;?></li>
<li><?php if(isset($why_choose_us->city4_name)) echo $why_choose_us->city4_name;?></li>
<li><?php if(isset($why_choose_us->city5_name)) echo $why_choose_us->city5_name;?></li>
<?php } ?>
</ul>
</div>
</div>
<div class="why_travelbay" style="margin-left:15px;">
<h1>SPECIALS OF THE WEEK</h1>
<?php 
if($spl_week != ''){
?>
<img src="<?php if(isset($spl_week->img_path_div1)) print WEB_DIR.'admin/'.$spl_week->img_path_div1;?>" width="281" height="127" border="0" style="padding-top:10px; padding-left:8px;" />
<p style="font-size:12px; width:280px;  padding-left:8px; text-align:justify;"><strong style="color:#243419; font-size:14px;"><?php if(isset($spl_week->c1)) echo $spl_week->c1;?></strong> <br />
<?php if(isset($spl_week->p1)) echo $spl_week->p1;?> <!--<a href="#" style="color:#F00;"> more »</a>--></p>
<?php
}
?>
</div>
<div class="why_travelbay" style="border:none; margin-left:15px;">
<h1>HOT DEALS</h1>
<?php 
foreach ($hot_deals as $hot_deals)
{
?>
<div class="travel_topic">
<ul style="list-style-type:none; padding-left:15px; padding-top:10px;">
<li><?php if(isset($hot_deals->city1_name)) echo $hot_deals->city1_name;?><span class="hotdeal_gps"><?php if(isset($hot_deals->city1_value)) echo $hot_deals->city1_value;?></span></li>
<li><?php if(isset($hot_deals->city2_name)) echo $hot_deals->city2_name;?><span class="hotdeal_gps"><?php if(isset($hot_deals->city2_value)) echo $hot_deals->city2_value;?></span></li>
<li><?php if(isset($hot_deals->city3_name)) echo $hot_deals->city3_name;?><span class="hotdeal_gps"><?php if(isset($hot_deals->city3_value)) echo $hot_deals->city3_value;?></span></li>
<li><?php if(isset($hot_deals->city4_name)) echo $hot_deals->city4_name;?><span class="hotdeal_gps"><?php if(isset($hot_deals->city4_value)) echo $hot_deals->city4_value;?></span></li>
<li><?php if(isset($hot_deals->city5_name)) echo $hot_deals->city5_name;?><span class="hotdeal_gps"><?php if(isset($hot_deals->city5_value)) echo $hot_deals->city5_value;?></span></li>
<!--<li>VIENNA OPENING SPECIAL  <span class="hotdeal_gps">188 EUR</span></li>-->
</ul>
</div>
<?php               
}
?> 
</div>

<?php /*?><?php for($i=0;$i<3;$i++)
{


?>
<?php if($i==0) { ?>
<div  style="float:left; width:300px;margin-right:20px; " >
<div style=" height:120px;" >
<a href="#"><img src="<?php echo WEB_DIR; ?>supplier_hotels_images/<?php if(isset($preferred_hotels_dubai[$i]->image_name))echo $preferred_hotels_dubai[$i]->image_name;?>" width="310" height="120" border="0" /></a>
</div>
<div style="height:50px; background-color:#399ac7;" >

</div>
</div>
<?php } else if($i==1) { ?>
<div  style="float:left; width:300px;margin-right:20px; " >
<div style=" height:120px;" >
<a href="#"><img src="<?php echo WEB_DIR; ?>supplier_hotels_images/<?php if(isset($preferred_hotels_dubai[$i]->image_name))echo $preferred_hotels_dubai[$i]->image_name;?>" width="310" height="120" border="0" /></a>
</div>
<div style="height:50px; background-color:#00a096;" >

</div>
</div>
<?php } else {?>
<div  style="float:left; width:300px;margin-right:20px; " >
<div style=" height:120px;" >
<a href="#"><img src="<?php echo WEB_DIR; ?>supplier_hotels_images/<?php if(isset($preferred_hotels_dubai[$i]->image_name))echo $preferred_hotels_dubai[$i]->image_name;?>" width="310" height="120" border="0" /></a>
</div>
<div style="height:50px; background-color:#005896;" >

</div>
</div>
<?php } } ?><?php */?>

<div class="ads_div">
<?php //print '<pre />';print_r($preferred_hotels_dubai);exit;?>
<?php for($i=0;$i<3;$i++)
{


?>
<?php if($i==0) { ?>
<div style="float:left;">
	<div style="float:left; clear:both;"><img src="<?php echo WEB_DIR; ?>supplier_hotels_images/<?php if(isset($preferred_hotels_dubai[$i]->image_name))echo $preferred_hotels_dubai[$i]->image_name;?>" width="310" height="120" border="0" /></div>
	<div class="add-txt">
		<span class="add-tit-txt"><?php if(isset($preferred_hotels_dubai[$i]->hotel_name)){ echo substr($preferred_hotels_dubai[$i]->hotel_name,0,12).'&nbsp'; ?>
		<?php if(isset($preferred_hotels_dubai[$i]->rate)) echo 'from&nbsp;$'.$preferred_hotels_dubai[$i]->rate;  }?></span>
        <span class="add-tit-txt1"><a href="#" style="color:#fff;">Shop Now!</a></span>
    </div>
</div>
<?php } else if($i==1) { ?>
<div style="float:left; margin-left:20px;">
	<div style="float:left; clear:both;"><img src="<?php echo WEB_DIR; ?>supplier_hotels_images/<?php if(isset($preferred_hotels_dubai[$i]->image_name))echo $preferred_hotels_dubai[$i]->image_name;?>" width="310" height="120" border="0" /></div>
	<div class="add-txt" style="background-color:#de2c1e">
		<span class="add-tit-txt"><?php if(isset($preferred_hotels_dubai[$i]->hotel_name)){ echo substr($preferred_hotels_dubai[$i]->hotel_name,0,12).'&nbsp'; ?>
		<?php if(isset($preferred_hotels_dubai[$i]->rate)) echo 'from&nbsp;$'.$preferred_hotels_dubai[$i]->rate;  }?></span>
       <span class="add-tit-txt1"><a href="#" style="color:#fff;">Shop Now!</a></span>
    </div>
</div>
<?php } else {?>
<div style="float:right;">
	<div style="float:left; clear:both;"><img src="<?php echo WEB_DIR; ?>supplier_hotels_images/<?php if(isset($preferred_hotels_dubai[$i]->image_name))echo $preferred_hotels_dubai[$i]->image_name;?>" width="310" height="120" border="0" /></div>
	<div class="add-txt" style="background-color:#8acb25;">
		<span class="add-tit-txt"><?php if(isset($preferred_hotels_dubai[$i]->hotel_name)){ echo substr($preferred_hotels_dubai[$i]->hotel_name,0,12).'&nbsp'; ?>
		<?php if(isset($preferred_hotels_dubai[$i]->rate)) echo 'from&nbsp;$'.$preferred_hotels_dubai[$i]->rate;  }?></span>
        <span class="add-tit-txt1"><a href="#" style="color:#fff;">Shop Now!</a></span>
    </div>
</div>
<?php } } ?>
</div>

<form onclick="javscript:return newsletter();" method="post">
<div class="news_letter">
<p><img src="<?php echo WEB_DIR; ?>designAccess/images/newsletter_icon.png" width="54" height="36" border="0" /> <strong style="position:relative; top:-10px; padding-left:15px; color:#999; font-size:24px;">News letter</strong> 
<span style="position:relative; top:-10px; color:#666;">Enter please your email</span> 
<span style="padding-left:25px;" id="news"><input name="email" type="text"  class="news_letter_box" id="email" /></span>

<input onclick="javscript:return newsletter();" type="image" src="<?php echo WEB_DIR ?>designAccess/images/go_bt.png" width="76" height="35" border="0"/> 
<!--<a href="#" style="padding-left:15px;"><img src="<?php echo WEB_DIR; ?>designAccess/images/go_bt.png" width="76" height="35" border="0" /></a>--></p>

</div>
</form>
</div>
</div>
</div>
<div align="center"><img src="<?php echo WEB_DIR; ?>designAccess/images/body_bt_bg.png" width="1018" height="12" border="0" /></div>

<?php $this->load->view('footer'); ?>
</body>
</html>
<link href="<?php echo WEB_DIR; ?>css/postion-slider.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo WEB_DIR; ?>script/jquery.nivo.slider.pack.js"></script>
<script type="text/javascript">
    $(window).load(function() {
		
	$('#slider').nivoSlider();
    });
</script>
<script type="text/javascript">
    function hotel_li()
    {

	$( "#id_hotel" ).show();
	$( "#id_flight" ).hide();
    }
    function flight_li()
    {
	$( "#id_flight" ).show();
	$( "#id_hotel" ).hide();
    }

    $(document).ready(function()
    {
	//$("#datepicker3").datepicker("disable");
	$("#datepicker3").datepicker("destroy");
	$(".tripType").change(function()
	{
	    $val=$(this).val();
	    if($val==1)
	    {	   
		$("#datepicker3").datepicker("destroy");

	    }
	    else
	    {
		$("#datepicker3").datepicker();
	    }
	});
    });
</script>

<style>
.add-txt {  background-color:#399ac7; height:40px; width:310px; line-height:30px; float:left; clear:both;}
.add-tit-txt { float:left; font-size:15px; font-weight:bold; color:#FFF; width:200px; padding-left:5px;   }
.add-tit-txt1 { float:right; text-align:left; font-weight:bold; font-size:15px; color:#FFF; width:100px; padding-right:5px; margin-right:-18px; }
</style>