<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>StayAway.com</title>
<link href="<?php echo WEB_DIR; ?>css/style_sheet.css" rel="stylesheet" type="text/css" />
<link href="<?php echo WEB_DIR; ?>css/postion.css" rel="stylesheet" type="text/css" />
<script src="<?php echo WEB_DIR ?>script/jquery.js"></script>
<link rel="stylesheet" href="<?php echo WEB_DIR; ?>datepickernew/themes/base/jquery.ui.all.css">

<script src="<?php echo WEB_DIR; ?>datepickernew/ui/jquery.ui.core.js"></script> 
<script src="<?php echo WEB_DIR; ?>datepickernew/ui/jquery.ui.widget.js"></script> 
<script src="<?php echo WEB_DIR; ?>datepickernew/ui/jquery.ui.datepicker.js"></script>
<link rel="stylesheet" href="<?php echo WEB_DIR; ?>datepickernew/demos.css">

<script type="text/javascript" src="<?php echo WEB_DIR ?>gui/ajax/ajaxsbmt.js"></script>

<script type="text/javascript">
function MM_jumpMenu(targ,selObj,restore){ //v3.0
eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
if (restore) selObj.selectedIndex=0;
}

$(document).ready(function(){

$("input:radio[name=top_city]").click(function() {
var top_city = $(this).val();
$('#testinput').val(top_city);
});
return false;
});

</script>
</head>
<body>
<?php	 $this->load->view('header'); ?>
 
<div class="midlebody">
<div class="mainbody_signin">
<div>
<div id="navjam">
<div class="tabs_width">
<ul class="tabs">
<li><a href="javascript:void(0)" id="tabs_active">Property Details </a></li>
<li><a href="<?php echo WEB_URL;?>index/inventory_category_list">Inventory Management </a></li>
<li><a href="">Booking Details </a></li>
</ul>
</div>
</div>
<div class="hotelnames_signin" style="min-height:329px;">
<!--<div id="mybook-tit">Property Profile</div>-->

<div class="" style="margin-top:20px;">            		
<!-- the tabs -->
<div id="navjam">
<?php $this->load->view('profile/left_inner_menu')?>
</div>

<!-- tab "panes" -->
<div class="panes">
	<div id="containerdount" style="padding-top:30px;">

<div id="result">
<table width="700" border="0" align="left" cellpadding="0" cellspacing="0" style="margin:15px 0 0 15px; border:1px solid #ccc;">
  <tr><td colspan='5'>
	<?php 
	
		//	if(isset($this->session->flashdata('errmsg')))
		{
			echo $this->session->flashdata('errmsg');
		}
  ?></td></tr>
   <tr>
			<td>Slno</td>
			<td>Country</td>
			<td>City </td>
			<td>Accommodation Name</td>
			<td>Room Status</td>
			<td>View Details</td>
	</tr>
	<?php
	
		    $slno=1;
			
			if(is_array($result))
			{
			
				foreach($result as $value)
				{
			?>
			<tr>
				<td><?php echo $slno ?></td>
				<td><?php echo $value->name ?></td>
				<td><?php echo $value->city_name ?></td>
				<td><?php echo $value->property_name ?></td>
				<td>Room Status</td>
				<td><a href="<?php echo WEB_URL;?>index/edit_contact_inform/<?php echo $value->sup_id ?>/<?php echo $value-> sup_contact_inform_id ?>">Click</a></td>
			</tr>
			<?php
			$slno++;
				}
			}
			else
			{
			?>
				<tr><td colspan='6' align="center">No record found!</td></tr>
			<?php
			}
		?>
		<!--<tr>
			<td colspan="6" align="right"><a href="<?php echo WEB_URL;?>index/contact_inform">Add Accomidation</a></td>
		</tr>-->
</table>
</div>

    
  </div>
  
</div>


<!-- This JavaScript snippet activates those tabs -->
<!--<script>
$(function() {
$("ul.tabs").tabs("div.panes > div");
});
</script>-->
</div>
    
</div>
</div>
</div>
</div>
<div style="clear:both"></div>
<?php $this->load->view('footer'); ?>
</body>
</html>
 <style>
.b2b-AGE_OF2{ width:97px; float: left; color:#fff; font-family:MAIAN; padding:0 0 8px; margin:12px -7px 0 0; color:#000; font-size:12px;}

.check_149{ width:144px; float:right; margin:0 13px 3PX 0; position:relative; left:34px}
</style>