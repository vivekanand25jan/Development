<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Console</title>
<link href="<?php echo WEB_DIR; ?>adminstyle.css" rel="stylesheet" type="text/css" />
   			
<script src="<?php echo WEB_DIR ?>jquery.js"></script>
<script type="text/javascript" src="<?php echo WEB_DIR ?>ajaxsbmt.js"></script>
<script src="<?php echo WEB_DIR_FRONT ?>script/jquery.js"></script>

<link rel="stylesheet" href="<?php echo WEB_DIR_FRONT; ?>datepickernew/themes/base/jquery.ui.all.css">
<script src="<?php echo WEB_DIR_FRONT; ?>datepickernew/ui/jquery.ui.core.js"></script> 
<script src="<?php echo WEB_DIR_FRONT; ?>datepickernew/ui/jquery.ui.widget.js"></script> 
<script src="<?php echo WEB_DIR_FRONT; ?>datepickernew/ui/jquery.ui.datepicker.js"></script>
<link rel="stylesheet" href="<?php echo WEB_DIR_FRONT; ?>datepickernew/demos.css">

<script type="text/javascript" src="<?php echo WEB_DIR_FRONT ?>gui/ajax/ajaxsbmt.js"></script>



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
                   
        
                     <div id="navjam">
<ul class="tabs" style="position:relative; top:-4px; left:-3px; border-bottom:none">
	<li><a href="<?php echo WEB_URL; ?>index/suplier_available_market" style="border-radius:8px 0 0 0">Market Management</a></li>
	

   <!-- <li><a href="#">MY TRAVELERS</a></li>
     <li><a href="#">BILLING INFO</a></li>
          <li><a href="#">CREDIT POINTS</a></li>
               <li><a href="#">TOOLS </a></li>-->
</ul>
</div>

<!-- tab "panes" -->
<span style="float:right; cursor:pointer; font-size:12px; padding:0px;color:#069;"><A HREF="<?php echo WEB_URL; ?>index/dashboard"> Go Back</A></span>

<div class="panes" style="padding-bottom:10px">
	<div id="containerdount1" class="admin-innerbox">
    	

<div style="margin-top:5px; float:right; ">
    
   
    <div style=" margin-left:20px;">
    <form name="f2" action="<?php echo WEB_URL;?>index/sup_add_market" method="post">
<table style="float:right; ">

        <tr>
            <td>Add Market</td>
        
            <td><input type="text" name="add_market_name" id="add_market_name" required></td>
            <td><input type="submit" name="add_new" id="add_new" value="Add"></td>
        </tr>
    </table>
    </form>
  
    
    
    </div>
   
    
  </div> 





<div id="g_result" style=" width:100%">
<table align="left" width="100%" border="0" cellspacing="0" cellpadding="0" style="height:20px">

    <tr>
  	<td style="font-size:16px; text-align:left; padding-left:5px;"></td>
  </tr>
 </table> 

<table width="100%" border="0" cellspacing="1" cellpadding="0" style="background-color:#E8E5E5">

  <tr>
  	<td align="center" class="admin-table-colo">No</td>
 	<td align="center" class="admin-table-colo">Market Name</td>
     <td align="center" class="admin-table-colo">Country</td>
    <td align="center" class="admin-table-colo">Status</td>
    <td align="center" class="admin-table-colo">Action</td>
  </tr>
  <?php //print '<pre />';print_r($result);exit; ?>
  <?php 
  if($result[0]!='')
  {
for($i=0;$i<count($result);$i++)
{
	
	?>
    
    
   <tr >
  	<td align="center" class="admin-table-colo1"><?php echo $i+1; ?></td>
    <td align="center" class="admin-table-colo1"><?php echo $result[$i]->market_name; ?></td>
      <td align="center" class="admin-table-colo1"><a href="<?php echo WEB_URL; ?>index/market_add_country/<?php echo $result[$i]->market_id; ?>" style="text-decoration:none;color:#099; ">Add Country</a></td>
    <td align="center" class="admin-table-colo1"><?php if($result[$i]->status==1) { echo 'Active'; } else { echo 'InActive'; } ?></td>
    <td align="center" class="admin-table-colo1">
    <a href="<?php echo WEB_URL; ?>index/update_market_management/<?php echo $result[$i]->market_id; ?>/1 ">Active</a> / 
    <a href="<?php echo WEB_URL; ?>index/update_market_management/<?php echo $result[$i]->market_id; ?>/0">InActive</a>/ 
    <a href="<?php echo WEB_URL; ?>index/update_market_management/<?php echo $result[$i]->market_id; ?>/2">Delete</a></td>
  </tr>
 <?php
}
  }
  else
  {
	  
?>
<tr><td align="center"  class="admin-table-colo1" colspan="7">No Result Found...
<?php
  }
  ?>
</table>  
 
 
</div>

  
  </div>
  
    
    
 
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
