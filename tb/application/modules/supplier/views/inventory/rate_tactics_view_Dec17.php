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
<li><a href="<?php echo site_url('index/inventory_category_list/')?>/<?php echo $this->uri->segment(3); ?>">Category Type</a></li>
<li><a href="<?php echo site_url('index/rate_tactics_list/')?>/<?php echo $this->uri->segment(3); ?>" id="tabs_active">Room Rates</a></li>
<!--<li><a href="<?php echo site_url('index/maintain_month_list/')?>/<?php echo $this->uri->segment(3); ?>">Maintain by Month</a></li>
--><li><a href="<?php echo site_url('index/open_close_dates/')?>/<?php echo $this->uri->segment(3); ?>">Open/Close Dates</a></li>
<li><a href="<?php echo site_url('index/house_rules/')?>/<?php echo $this->uri->segment(3); ?>">Supplier Policy</a></li>
<li><a href="<?php echo site_url('index/extra_service/')?>/<?php echo $this->uri->segment(3); ?>">Extra Services</a></li>
<li><a href="<?php echo site_url('index/early_bird/')?>/<?php echo $this->uri->segment(3); ?>">Promotion</a></li>
</ul>
</div>
</div>

<!-- tab "panes" -->
<div class="panes">
	<div id="containerdount" style="padding-top:30px;">

<div id="result">
<div id="containerdount">

<div id="result1">
<table width="942" border="0" align="left" cellpadding="0" cellspacing="0" style="margin:15px 0 0 17px; ">
  <tr>
    <td align="right" valign="top" class="" colspan="9" height="30"><a href="<?php echo site_url('index/add_rate_plan_view/')?>/<?php echo $this->uri->segment(3); ?>/1/1" style="color:#099; font-weight:bold;">Add room rate</a></td>
  </tr>
   <tr>
    <td align="left" valign="top" class="my_profile_name_ex_tab">No</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Category Type, Room Category </td>
    <!--<td align="left" valign="top" class="my_profile_name_ex_tab">Allocations</td>-->
    <td align="left" valign="top" class="my_profile_name_ex_tab" colspan="3">Season</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Period</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Promotion</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Status</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Action</td>
  </tr>
  
   <?php
	
	for($k=0;$k<count($cate_list);$k++) 
	{  //$k=1;
	   $supplier_id = $cate_list[$k]->sup_id;
	   $prop_id = $cate_list[$k]->hotel_id;
	   $cate_type = $cate_list[$k]->category_type;
	  
	  $season_list = $this->Supplier_Model->season_rate_tactics($supplier_id,$prop_id,$cate_type);
	  //print'<pre />';print_r($season_list);exit;
	  $rate_tactics = $this->Supplier_Model->rate_tactics_list($supplier_id,$prop_id,$cate_type);
	 // print'<pre />';print_r($rate_tactics);exit;
	  $counter = count($rate_tactics);
	  $sno =0;
	  for($j=0;$j<count($season_list);$j++)
	  {	
	    $supplier_id = $season_list[$j]->sup_id;
		$prop_id = $season_list[$j]->hotel_id;
	    $season_id = $season_list[$j]->season_id;
		$cate_type = $season_list[$j]->category_type;
	    $result = $this->Supplier_Model->rate_tactics_list_by_season($supplier_id,$prop_id,$season_id,$cate_type);
		//print'<pre />';print_r($result);exit;
		
	     
	 ?>
  
  
  
	<?php 
    if(isset($result[0]))
    {
    for($i=0;$i<count($result);$i++)
    { $sno = $sno + 1;
    ?>  
  <tr>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $sno; ?></td>
     
<?php if($i==0 && $j==0) { ?>
    <td align="left" valign="center" class="my_profile_name_ex_tab_whit" rowspan="<?php echo $counter;?>">
    
    
	<?php  $category_name = $this->Supplier_Model->get_category_name($cate_list[$k]->category_type); 
	
	echo $category_name->cate_type.' '.$category_name->room_type; ?></td>

    <!--<td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $result[$i]->allocation_rooms; ?></td>-->
  
   <?php } if($i==0) { ?>
   <td align="left" valign="center" class="my_profile_name_ex_tab_whit" rowspan="<?php echo count($result);?>">
	<?php $select=$this->Supplier_Model->get_season_id($result[$i]->season_id); if(isset($select['0']->season)){ echo $select['0']->season;} ?>
    </td>
    
    <td align="left" valign="center" class="my_profile_name_ex_tab_whit" rowspan="<?php echo count($result);?>">
     <a href="<?php echo site_url('index/add_rate_plan_view/')?>/<?php echo $this->uri->segment(3); ?>/<?php echo $result[$i]->season_id; ?>/<?php echo $result[$i]->category_type; ?>" title="Add Season Period">
     <img src="<?php echo WEB_DIR; ?>images/plus.png"  style="border:0px;"/>
     </a>
     
     </td>
     
     <td align="left" valign="center" class="my_profile_name_ex_tab_whit" rowspan="<?php echo count($result);?>">
     
     <a href="<?php echo site_url('index/add_allocations/')?>/<?php echo $this->uri->segment(3); ?>/<?php echo $result[$i]->season_id; ?>/<?php echo $result[$i]->category_type; ?>" title="Add Allocations">
     <img src="<?php echo WEB_DIR; ?>images/alot.png"  style="border:0px;"/>
     </a>
     
     </td>
    
<?php } ?>
    
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit">
    <a href="<?php echo WEB_URL; ?>index/view_rate_tactics_details/<?php echo $this->uri->segment(3); ?>/<?php echo $result[$i]->sup_rate_tactics_id; ?>" style="text-decoration:none;color:#099; text-transform:capitalize; float:left;">
	<?php $fd = $result[$i]->room_avail_date_from; $fds = explode("-",$fd); $from_date = $fds[2].'-'.$fds[1].'-'.$fds[0]; $td = $result[$i]->room_avail_date_to; $tds = explode("-",$td); $to_date = $tds[2].'-'.$tds[1].'-'.$tds[0]; 
	
	echo '<b>'.$from_date.'</b> To <b>'.$to_date.'</b>';	
	 ?>
     </a>
     </td>
             
     
   </td>
   
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit">
    <a href='<?php echo WEB_URL; ?>index/promotion_details/<?php echo $this->uri->segment(3); ?>/<?php echo $result[$i]->sup_rate_tactics_id; ?>' style="text-decoration:none;color:#099; text-transform:capitalize; float:left;" >Promotion</a>
    </td>
    
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit">
	<?php if($result[$i]->status==1) { echo 'Active'; } else { echo 'InActive'; } ?>
    </td>
    
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit">
    <a href="<?php echo WEB_URL; ?>index/update_rate_tactics/<?php echo $this->uri->segment(3); ?>/<?php echo $result[$i]->sup_rate_tactics_id; ?>/1"  style="color:#000;">Active</a> / <a href="<?php echo WEB_URL; ?>index/update_rate_tactics/<?php echo $this->uri->segment(3); ?>/<?php echo $result[$i]->sup_rate_tactics_id; ?>/0" style="color:#000;">InActive</a> / <a href="<?php echo WEB_URL; ?>index/update_rate_tactics/<?php echo $this->uri->segment(3); ?>/<?php echo $result[$i]->sup_rate_tactics_id; ?>/2" style="color:#000;">Delete</a>
    </td>
    
  </tr>
  <?php
	}
}
else
{
	  ?> <td align="center" valign="top" colspan="6" class="my_profile_name_ex_tab_whit_ex">No Result Found... </td>
      <?php
  }
 }
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