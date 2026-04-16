<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Travel Bay Admin Console</title>
<link href="<?php echo WEB_DIR; ?>adminstyle.css" rel="stylesheet" type="text/css" />



</head>

<body>

 <div id="div_wrapper">
 	<div id="div_container">
    	
        <table width="986" align="center" border="0" cellpadding="0" cellspacing="0" style="border:1px #aaaaaa solid; margin-top:30px; border-top:none; border-radius:10px; ">
         <?php $this->load->view('header'); ?>
          <tr>
          	<td>
            	<table width="966" border="0" align="center" style="border:1px #9d9d9d solid; margin-top:10px; background-color:#edefed; border-radius:8px;">
                    <tr>
                      <td width="580" valign="top">
                      <script src="<?php echo WEB_DIR ?>jquery.js"></script>
                      
                      <script language="javascript1.5" type="text/javascript">
				function hotel_fac_sorting()
		{
		
		var sd =document.search.datepicker.value;
		var ed =document.search.datepicker1.value;
		var bookno =document.search.bookno.value;
			var status =document.search.status.value;
		
		$("#result").empty().html('<div style="padding-left:400px" align="middle"><img src=\'<?php print WEB_DIR ?>images/ajax-loader(2).gif\'></div>');
		  $("#result").load("<?php print WEB_URL ?>account/booking_search/"+sd+"/"+ed+"/"+bookno+"/"+status);
		
		       return false;
                      // For first time page load default results
                         
		 
		}
		function goBack()
{
	window.history.go(-1);
}
		</script>
        
<div id="navjam">
<div class="tabs_width">
<?php
$prop_id = $this->uri->segment(3);
if(isset($prop_id) && $prop_id!="")
{
?>
<ul class="tabs1">
<li><a href="<?php echo WEB_URL;?>index/edit_contact_inform/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>" >Hotel Details </a></li>
<li><a href="<?php echo WEB_URL;?>index/inventory_category_list/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>" id="tabs_active">Inventory Management </a></li>
<li><a href="">Booking Details </a></li>
<li><a href="<?php echo WEB_URL;?>index/accounting/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>">Accounting </a></li>

<li style="float:right; cursor:pointer; font-size:12px; padding:5px;color:#069;"><span onclick="goBack()">Back</span></li>
</ul>
<?php
}
else
{
?>
	<ul class="tabs1">
    <li><a href="javascript:void(0)" >Hotel Details </a></li>
    <li><a href="javascript:void(0" id="tabs_active">Inventory Management </a></li>
    <li><a href="">Booking Details </a></li>
    <li style="float:right; cursor:pointer; font-size:12px; padding:5px;color:#069;"><span onclick="goBack()">Back</span></li>
	</ul>
<?php
}
?>
</div>
</div>

<div id="navjam">
<ul class="tabs">
<li><a href="<?php echo site_url('index/inventory_category_list/')?>/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4)?>" >Category Type</a></li>
<li><a href="<?php echo site_url('index/rate_tactics_list/')?>/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4)?>" id="tabs_active">Room Rates</a></li>
<!--<li><a href="<?php echo site_url('index/maintain_month_list/')?>/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4)?>">Maintain by Month</a></li>
--><li><a href="<?php echo site_url('index/open_close_dates/')?>/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4)?>">Open/Close Dates</a></li>
<li><a href="<?php echo site_url('index/house_rules/')?>/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4)?>">Supplier Policy</a></li>
<li><a href="<?php echo site_url('index/extra_service/')?>/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4)?>">Extra Services</a></li>
<li><a href="<?php echo site_url('index/early_bird/')?>/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4)?>">Early Bird Promotion</a></li>
<li><a href="<?php echo site_url('index/view_allotment_list/')?>/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4)?>">Allotment</a></li>
</ul>

</div>

<!-- tab "panes" -->
<div class="panes" style="padding-bottom:10px">
<!--This is the contact information division-->
	
<div id="containerdount">
<div style="float:right; height:25px;"><a href="<?php echo site_url('index/rate_tactics_list/')?>/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4); ?>" style="color:#099;">Back</a></div>
   
<div class="promo_details"> 
<?php echo '<B>Category Type, Room Category: </B>'.$cate_details->cate_type.'&nbsp;'.$cate_details->room_type; ?>
</div>   

<div class="promo_details"> <?php echo '<B>Season:</B> '.$cate_details->season; ?></div>

<div class="promo_details"> 
<?php $fromD = explode('-',$cate_details->room_avail_date_from);
      $fromD = $fromD[2].'-'.$fromD[1].'-'.$fromD[0];
      
      $toD = explode('-',$cate_details->room_avail_date_to);
      $toD = $toD[2].'-'.$toD[1].'-'.$toD[0];

      echo '<b>Period:</b> '.$fromD.''.$toD; ?>
</div>

    
<table width="942" border="0" align="left" cellpadding="0" cellspacing="0" style="margin:15px 0 0 17px; ">
  <tr>
    <td align="right" valign="top" class="" colspan="6" height="30"><a href="<?php echo site_url('index/add_promotion_view')?>/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4); ?>/<?php echo $this->uri->segment(5); ?>" style="color:#099; font-weight:bold;">Add Promotion</a></td>
  </tr>
   <tr>
    <td align="left" valign="top" class="my_profile_name_ex_tab">No</td>
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
     
         <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><a href='<?php echo site_url('index/promotion_view_details')?>/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4); ?>/<?php echo $this->uri->segment(5); ?>/<?php echo $promo_details[$i]->promo_id; ?>' ><?php $fd = $promo_details[$i]->from_date; $fds = explode("-",$fd); $from_date = $fds[2].'-'.$fds[1].'-'.$fds[0]; $td = $promo_details[$i]->to_date; $tds = explode("-",$td); $to_date = $tds[2].'-'.$tds[1].'-'.$tds[0]; echo $from_date.' To '.$to_date;	
	 ?></a></td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $promo_details[$i]->stay_nights; ?></td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $promo_details[$i]->pay_nights; ?></td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php if($promo_details[$i]->status==1) { echo 'Active'; } else { echo 'InActive'; } ?></td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><a href="<?php echo WEB_URL; ?>index/update_promotion/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4); ?>/<?php echo $this->uri->segment(5); ?>/<?php echo $promo_details[$i]->promo_id; ?>/1"  style="color:#000;">Active</a> / <a href="<?php echo WEB_URL; ?>index/update_promotion/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4); ?>/<?php echo $this->uri->segment(5); ?>/<?php echo $promo_details[$i]->promo_id; ?>/0" style="color:#000;">InActive</a> / <a href="<?php echo WEB_URL; ?>index/update_promotion/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4); ?>/<?php echo $this->uri->segment(5); ?>/<?php echo $promo_details[$i]->promo_id; ?>/2" style="color:#000;">Delete</a></td>
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

<script>
/*This is to perform the tabs changing function*/
// perform JavaScript after the document is scriptable.
/*$(function() {
	// setup ul.tabs to work as tabs for each div directly under div.panes
	$("ul.tabs").tabs("div.panes > div");
});*/
</script>
                                      </td>
                      
                    </tr>
                  </table>

            </td>
          </tr>
          <tr>
          	<td>&nbsp;</td>
          </tr>
        </table>
        
       
        

        
 	</div>
 </div>
</body>
</html>
