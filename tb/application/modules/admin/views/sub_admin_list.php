<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Console</title>
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
		</script>
        
                     <div id="navjam">
<ul class="tabs" style="position:relative; top:-4px; left:-3px; border-bottom:none">
	<li><a href="javascript:void(0)" style="border-radius:8px 0 0 0">SubAdmins List (<?php echo $status_cnt->tot_agent; ?>)</a></li>
	<li><a href="javascript:void(0)">Active SubAdmins  (<?php echo $status_cnt->active; ?>)</a></li>
  <?php /*  <li><a href="javascript:void(0)">InActive Users  (<?php echo $status_cnt->inactive; ?>)</a></li> */ ?>

   <!-- <li><a href="#">MY TRAVELERS</a></li>
     <li><a href="#">BILLING INFO</a></li>
          <li><a href="#">CREDIT POINTS</a></li>
               <li><a href="#">TOOLS </a></li>-->
</ul>
</div>
<span style="float:right; cursor:pointer; font-size:12px; padding:5px;color:#069;"><A HREF="<?php echo WEB_URL; ?>index/dashboard"> Go Back</A></span> 
<!-- tab "panes" -->
<div class="panes" style="padding-bottom:10px">
	<div id="containerdount" style="padding-top:30px; margin:0 auto; float:none; border-bottom:1px #FFF solid; padding-bottom:15px">
    	
<table width="100%" border="0" cellspacing="1" cellpadding="0" style="background-color:#E8E5E5">
  <tr>
  	<td class="admin-table-colo">No</td>
    <td class="admin-table-colo">ID</td>
     <td class="admin-table-colo">Type</td>
    <td class="admin-table-colo">First Name</td>
    <td class="admin-table-colo">Last Name</td>
    <td class="admin-table-colo">Email</td>
    <td class="admin-table-colo">Registration Date</td>
    <td class="admin-table-colo">Status</td>
    <td class="admin-table-colo">Action</td>
  </tr>
  <?php 
   if(isset($result[0]))
{
  
  for($i=0;$i<count($result);$i++)
  {
	  ?>
  <tr>
  <td align="center" class="admin-table-colo1"><?php echo $i+1; ?></td>
    <td align="center" class="admin-table-colo1"><?php echo $result[$i]->login_id; ?></td>
        <td align="center" class="admin-table-colo1"><?php echo $result[$i]->sub_admin_type; ?></td>
    <td class="admin-table-colo1"><?php echo $result[$i]->first_name; ?></td>
    <td class="admin-table-colo1"><?php echo $result[$i]->middle_name; ?></td>
    <td class="admin-table-colo1"><?php echo $result[$i]->email; ?></td>
    <td class="admin-table-colo1"><?php echo $result[$i]->created_date; ?></td>
     <td class="admin-table-colo1"><?php if($result[$i]->status==1) { echo 'Active'; } else { echo 'InActive'; } ?></td>
   
    <td class="admin-table-colo1"><a href="<?php echo WEB_URL; ?>index/update_subadmin/<?php echo $result[$i]->user_id; ?>/1">Active</a> / <a href="<?php echo WEB_URL; ?>index/update_subadmin/<?php echo $result[$i]->user_id; ?>/0">InActive</a></td>
  </tr>
  <?php
  }
}
else
{
	echo '<tr><td colspan="5" align="center">No Result Found...</td></tr>';
}
  ?>
</table>

    
  </div>
  
  <div id="containerdount" style="padding-top:30px; margin:0 auto; float:none; border-bottom:1px #FFF solid; padding-bottom:15px">
    	
<table width="100%" border="0" cellspacing="1" cellpadding="0" style="background-color:#E8E5E5">
  <tr>
  <td class="admin-table-colo">No </td>
   <td class="admin-table-colo">ID</td>
     <td class="admin-table-colo">Type</td>
   
    <td class="admin-table-colo">First Name</td>
    <td class="admin-table-colo">Last Name</td>
    <td class="admin-table-colo">Email</td>
     <td class="admin-table-colo">Registration Date</td>
    <td class="admin-table-colo">Edit</td>
    <td class="admin-table-colo">Delete</td>
    <td class="admin-table-colo">View Bookings</td>
  </tr>
  <?php 
 //print_r($result_a).'ssssssssss';
  if(isset($result_a[0]))
{
  
  for($j=0;$j<count($result_a);$j++)
  {
	  ?>
  <tr>
  <td align="center" class="admin-table-colo1"><?php echo $j+1; ?></td>
      <td align="center" class="admin-table-colo1"><?php echo $result_a[$j]->login_id; ?></td>
        <td align="center" class="admin-table-colo1"><?php echo $result_a[$j]->sub_admin_type; ?></td>
 
    <td class="admin-table-colo1"><?php echo $result_a[$j]->first_name; ?></td>
    <td class="admin-table-colo1"><?php echo $result_a[$j]->middle_name; ?></td>
    <td class="admin-table-colo1"><?php echo $result_a[$j]->email; ?></td>
    <td class="admin-table-colo1"><?php echo $result_a[$j]->created_date; ?></td>
   <td class="admin-table-colo1"><a href="<?php echo WEB_URL; ?>index/edit_user_subadmin/<?php echo $result_a[$j]->user_id; ?> ">Edit</a> &nbsp;&nbsp;<img src="<?php echo WEB_DIR ?>images/edit-icon.png" border="0" /></td>
    <td class="admin-table-colo1"><a href="<?php echo WEB_URL; ?>index/delete_user_subadmin/<?php echo $result_a[$j]->user_id; ?> ">Delete</a> &nbsp;&nbsp;<img src="<?php echo WEB_DIR ?>images/delete-icon.png" border="0" /></td>
    <td align="center" class="admin-table-colo1"><a href="<?php echo WEB_URL; ?>index/view_booking_sa/<?php echo $result_a[$j]->user_id; ?>">View</a> </td>
  </tr>
  <?php
  }
}
else
{
	echo '<tr><td colspan="9" align="center">No Result Found...</td></tr>';
}
  ?>
</table>

    
  </div>
  
  <div id="containerdount" style="padding-top:30px; margin:0 auto; float:none; border-bottom:1px #FFF solid; padding-bottom:15px">
    	
<table width="100%" border="0" cellspacing="1" cellpadding="0" style="background-color:#E8E5E5">
  <tr>
  <td class="admin-table-colo">No</td>
    <td class="admin-table-colo">UserID</td>
    <td class="admin-table-colo">First Name</td>
    <td class="admin-table-colo">Last Name</td>
    <td class="admin-table-colo">Email</td>
    <td class="admin-table-colo">Registration Date</td>
    <td class="admin-table-colo">Delete</td>
    <td class="admin-table-colo">Action</td>
  </tr>
  <?php 
  if(isset($result_i[0]))
{
  
  for($k=0;$k<count($result_i);$k++)
  {
	  ?>
 <tr>
<td class="admin-table-colo1"><?php echo $k+1; ?></td>
    <td class="admin-table-colo1"><?php echo $result_i[$k]->user_id; ?></td>
    <td class="admin-table-colo1"><?php echo $result_i[$k]->first_name; ?></td>
    <td class="admin-table-colo1"><?php echo $result_i[$k]->middle_name; ?></td>
    <td class="admin-table-colo1"><?php echo $result_i[$k]->email; ?></td>
    <td class="admin-table-colo1"><?php echo $result_i[$k]->created_date; ?></td>
    <td class="admin-table-colo1"><a href="<?php echo WEB_URL; ?>index/delete_user/<?php echo $result_i[$k]->user_id; ?> ">Delete</a></td>
    <td class="admin-table-colo1"><a href="<?php echo WEB_URL; ?>index/update_user/<?php echo $result_i[$k]->user_id; ?>/1">Active</a> / <a href="<?php echo WEB_URL; ?>index/update_user/<?php echo $result_i[$k]->user_id; ?>/0">InActive</a></td>
  </tr>
  <?php
  }
}
else
{
	echo '<tr><td colspan="9" align="center">No Result Found...</td></tr>';
}
  ?>
</table>

    
  </div>
  
    
    
 
  
  
<div id="containerdount">3</div>
<div id="containerdount">4</div>
<div id="containerdount">5</div>
<div id="containerdount">6</div>
</div>

<script>

// perform JavaScript after the document is scriptable.
$(function() {
	// setup ul.tabs to work as tabs for each div directly under div.panes
	$("ul.tabs").tabs("div.panes > div");
});
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
        
        <div style="clear:both; height:30px;">&nbsp;</div>
        

        
 	</div>
 </div>
</body>
</html>
