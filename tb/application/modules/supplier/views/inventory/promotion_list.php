<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Travel Bay</title>

<link href="<?php echo WEB_DIR; ?>designAccess/css/travel_bay_stylesheet.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo WEB_DIR; ?>designAccess/engine1/style.css" />


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
<?php $this->load->view('header'); ?>
 
<div class="midlebody">
<div class="mainbody_signin">
<div>

<div id="navjam">
<div class="tabs_width">
<ul class="tabs">
<li><a href="<?php echo WEB_URL;?>index/edit_contact_inform/<?php echo $this->uri->segment(3)?>">Hotel Details </a></li>
<li><a href="" id="tabs_active">Inventory Management </a></li>
<li><a href="">Booking Details </a></li>
<li><a href="<?php echo WEB_URL;?>index/accounting/<?php echo $this->uri->segment(3)?>">Accounting </a></li>
</ul>
</div>
</div>


<div class="hotelnames_signin" style="min-height:329px;">
<!--<div id="mybook-tit">Inventory Management</div>-->

<div class="" style="margin-top:20px;">            		
<!-- the tabs -->
<div id="navjam">
<div class="tabs_width">
<ul class="tabs">
<li><a href="<?php echo site_url('index/inventory_category_list/')?>/<?php echo $this->uri->segment(3); ?>" id="newtabe_size">Category Type</a></li>
<li><a href="<?php echo site_url('index/rate_tactics_list/')?>/<?php echo $this->uri->segment(3); ?>" id="tabs_active" style="width:138.5px;">Room Rates</a></li>
<li><a href="<?php echo site_url('index/open_close_dates/')?>/<?php echo $this->uri->segment(3); ?>" id="newtabe_size">Open/Close Dates</a></li>
<li><a href="<?php echo site_url('index/house_rules/')?>/<?php echo $this->uri->segment(3); ?>" id="newtabe_size">Supplier Policy</a></li>
<li><a href="<?php echo site_url('index/extra_service/')?>/<?php echo $this->uri->segment(3); ?>" id="newtabe_size">Extra Services</a></li>
<li><a href="<?php echo site_url('index/early_bird/')?>/<?php echo $this->uri->segment(3); ?>" id="newtabe_size">Early Bird Promotion</a></li>
<li><a href="<?php echo site_url('index/view_allotment_list/')?>/<?php echo $this->uri->segment(3); ?>" id="newtabe_size">Allotment</a></li>
</ul>
</div>
</div>

<!-- tab "panes" -->
<div class="panes">
	<div id="containerdount" style="padding-top:30px;">

<div id="result">
<div id="containerdount">

    
    <div class="promo_details"> 
<?php echo '<B>Category Type, Room Category : </B>'.$cate_details->cate_type.'&nbsp;'.$cate_details->room_type; ?>
</div>   

<div style="float:right; height:25px;"><a href="<?php echo site_url('index/rate_tactics_list/')?>/<?php echo $this->uri->segment(3); ?>" style="color:#099;">Back</a></div>

<div class="promo_details"> <?php echo '<B>Season : </B> '.$cate_details->season; ?></div>

<div class="promo_details"> 
<?php $fromD = explode('-',$cate_details->room_avail_date_from);
      $fromD = $fromD[2].'-'.$fromD[1].'-'.$fromD[0];
      
      $toD = explode('-',$cate_details->room_avail_date_to);
      $toD = $toD[2].'-'.$toD[1].'-'.$toD[0];

      echo '<b>Period : </b> '.$fromD.' To '.$toD; ?>
</div>

<div id="result1">
    
<table width="942" border="0" align="left" cellpadding="0" cellspacing="0" style="margin:15px 0 0 17px; ">

  <tr>
    <td align="right" valign="top" class="" colspan="6" height="30"><a href="<?php echo site_url('index/add_promotion_view')?>/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4); ?>" style="color:#099; font-weight:bold;">Add Promotion</a></td>
  </tr>
   <tr>
    <td align="left" valign="top" class="my_profile_name_ex_tab">No</td>
<!--    <td align="left" valign="top" class="my_profile_name_ex_tab">Category Type, Room Category </td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Allocations</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Season</td>-->
    <td align="left" valign="top" class="my_profile_name_ex_tab">Period</td>
<!--    <td align="left" valign="top" class="my_profile_name_ex_tab">Promotion</td>-->
    <td align="left" valign="top" class="my_profile_name_ex_tab">Stay Nights</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Pay Nights</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Status</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Action</td>
  </tr>
	<?php 
    if(isset($promo_details[0]))
    {
    for($i=0;$i<count($promo_details);$i++)
    {
    ?>
  <tr>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $i+1; ?></td>
     
<!--    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><a href="<?php echo WEB_URL; ?>index/view_rate_tactics_details/<?php echo $this->uri->segment(3); ?>/<?php echo $promo_details[$i]->sup_rate_tactics_id; ?>" style="text-decoration:none;color:#099; text-transform:capitalize; float:left;">
	<?php  //$category_name = $this->Supplier_Model->get_category_name($promo_details[$i]->category_type); 
	
	//echo $category_name->cate_type.' '.$category_name->room_type; ?></a></td>-->
    <!--<td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $promo_details[$i]->allocation_rooms; ?></td>-->
   
<!--    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php $select=$this->Supplier_Model->get_season_id($promo_details[$i]->season_id); if(isset($select['0']->season)){ echo $select['0']->season;} ?></td>-->
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><a href='<?php echo site_url('index/promotion_view_details')?>/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4); ?>/<?php echo $promo_details[$i]->promo_id; ?>' ><?php $fd = $promo_details[$i]->from_date; $fds = explode("-",$fd); $from_date = $fds[2].'-'.$fds[1].'-'.$fds[0]; $td = $promo_details[$i]->to_date; $tds = explode("-",$td); $to_date = $tds[2].'-'.$tds[1].'-'.$tds[0]; echo $from_date.' To '.$to_date;	
	 ?></a></td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $promo_details[$i]->stay_nights; ?></td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $promo_details[$i]->pay_nights; ?></td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php if($promo_details[$i]->status==1) { echo 'Active'; } else { echo 'InActive'; } ?></td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><a href="<?php echo WEB_URL; ?>index/update_promotion/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4); ?>/<?php echo $promo_details[$i]->promo_id; ?>/1"  style="color:#000;">Active</a> / <a href="<?php echo WEB_URL; ?>index/update_promotion/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4); ?>/<?php echo $promo_details[$i]->promo_id; ?>/0" style="color:#000;">InActive</a> / <a href="<?php echo WEB_URL; ?>index/update_promotion/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4); ?>/<?php echo $promo_details[$i]->promo_id; ?>/2" style="color:#000;">Delete</a></td>
  </tr>
  <?php
	}
}
else
{
	  ?> <td align="center" valign="top" colspan="6" class="my_profile_name_ex_tab_whit_ex">No Result Found... </td>
      <?php
  }
  ?>
</table>
    
</div>
</div>
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

</div></div>
<div style="clear:both"></div>
<?php $this->load->view('footer'); ?>
</body>
</html>

 <style>
.b2b-AGE_OF2{ width:97px; float: left; color:#fff; font-family:MAIAN; padding:0 0 8px; margin:12px -7px 0 0; color:#000; font-size:12px;}

.check_149{ width:144px; float:right; margin:0 13px 3PX 0; position:relative; left:34px}
</style>