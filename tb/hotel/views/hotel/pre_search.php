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
  
   
    <style>
	.Buttons_all {
    background-attachment: scroll;
    background-color: #0089B7;
   
    background-position: 0 0;
    background-repeat: repeat-x;
    border: 1px solid #0089B7;
    border-radius: 4px 4px 4px 4px;
    color: #FFFFFF;
    cursor: pointer;
    font-size: 13px;
    margin: 0 auto;
    padding: 2px 10px;
    text-shadow: 0 -1px 0 #CCCCCC;
  
	}
		.Buttons_all1 {
    background-attachment: scroll;
    background-color:#C60;
   
    background-position: 0 0;
    background-repeat: repeat-x;
    border: 1px solid #C60;
    border-radius: 4px 4px 4px 4px;
    color: #FFFFFF;
    cursor: pointer;
    font-size: 13px;
    margin: 0 auto;
    padding: 2px 10px;
    text-shadow: 0 -1px 0 #CCCCCC;
  
	}
	.Buttons_all:hover {
    background-color: #FC7700;
  
    background-position: 0 0;
    background-repeat: repeat-x;
    border: 1px solid #FC7700;
    color: #FFFFFF;
}
.Buttons_all1:hover {
    background-color:#F39;
  
    background-position: 0 0;
    background-repeat: repeat-x;
    border: 1px solid #F39;
    color: #FFFFFF;
}
</style>
   <?php
// print_r($city_val_pre);exit;
  if(isset($city_val_pre[0]))
  {
   for($i=0;$i<count($city_val_pre);$i++)
   {
	  
		  
	   ?>
       <form action="<?php echo WEB_URL.'hotel/pre_search'; ?>" method="post">
       <div style="padding-left:40px; padding-top:10px ; font-stretch:normal "><img src="<?php echo WEB_DIR ?>images/bullet.png" width="16" height="13" /><strong><font color="#0066CC">
	
<input type="submit" class="Buttons_all1"  value="<?php   echo $city_val_pre[$i]->city; ?>" /><Br>
<input type="hidden"  name="city" value="<?php print $city_val_pre[$i]->city; ?>" />
    </font></strong></div></form>
    <?php
	
   }
   }
    ?>
</div><div style="clear:both"></div>
<?php $this->load->view('footer'); ?>
</body>
</html>
 