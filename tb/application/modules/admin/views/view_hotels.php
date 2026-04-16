
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="<?php echo WEB_DIR; ?>adminstyle.css" rel="stylesheet" type="text/css" />

<script src="<?php echo WEB_DIR ?>jquery.js"></script>
<style>

</style>

   <link rel="stylesheet" href="<?php echo WEB_DIR; ?>datepickernew/themes/base/jquery.ui.all.css">
              
                <script src="<?php echo WEB_DIR; ?>datepickernew/ui/jquery.ui.core.js"></script> 
                <script src="<?php echo WEB_DIR; ?>datepickernew/ui/jquery.ui.widget.js"></script> 
                <script src="<?php echo WEB_DIR; ?>datepickernew/ui/jquery.ui.datepicker.js"></script>
                <link rel="stylesheet" href="<?php echo WEB_DIR; ?>datepickernew/demos.css">
                
  <script type="text/javascript" src="<?php echo WEB_DIR ?>ajaxsbmt.js"></script>
                <script language="javascript1.5" type="text/javascript">
				function hotel_fac_sorting()
		{
		
		var sd =document.search.datepicker.value;
		var ed =document.search.datepicker1.value;
		var bookno =document.search.bookno.value;
			var status =document.search.status.value;
		
		$("#result").empty().html('<div style="padding-left:400px" align="middle"><img src=\'<?php print WEB_DIR ?>images/ajax-loader(5).gif\'></div>');
		  $("#result").load("<?php print WEB_URL ?>index/booking_search/"+sd+"/"+ed+"/"+bookno+"/"+status);
		
		       return false;
                      // For first time page load default results
                         
		 
		}
function goBack()
{
	window.history.go(-1)
}
		</script>
      
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
<ul class="tabs">
	<li><a href="javascript:void(0)">Hotels</a></li>
	<li style="float:right; cursor:pointer; font-size:12px; padding:5px;color:#069;"><span onclick="goBack()">Back</span></li>

   <!-- <li><a href="#">MY TRAVELERS</a></li>
     <li><a href="#">BILLING INFO</a></li>
          <li><a href="#">CREDIT POINTS</a></li>
               <li><a href="#">TOOLS </a></li>-->
</ul>
</ul>
</div>

<!-- tab "panes" -->
<div class="panes" style="padding-bottom:10px">
	<div id="containerdount" class="admin-innerbox">
    	


<table width="938" border="0" align="left" cellpadding="0" cellspacing="1" style="margin:15px 0 0 15px; background-color:#E8E5E5; border:0px solid #ccc;">
  <tr>
    <td align="left" valign="top" class="admin-table-colo">Hotel Name</td>
    <td align="center" valign="top" class="admin-table-colo">City</td>
    <td align="center" valign="top" class="admin-table-colo">Market</td>
    <td align="left" valign="top" class="admin-table-colo">Contact Name</td>
    <td align="left" valign="top" class="admin-table-colo">Contact Email</td>
    <td align="left" valign="top" class="admin-table-colo">Add Date</td>
    <td align="left" valign="top" class="admin-table-colo">Status</td>
    <td align="center" valign="top" class="admin-table-colo">Action</td>
  </tr>
  <?php
  if($result_view!='')
  {
  for($i=0;$i<count($result_view);$i++)
  {
  ?>
  <tr>
    <td align="left" valign="top" class="admin-table-colo1"><a href="<?php echo WEB_URL;?>index/edit_contact_inform/<?php echo $id;  ?>/<?php echo $result_view[$i]->sup_hotel_id ?>"><?php echo $result_view[$i]->hotel_name; ?></a></td>
    <td align="left" valign="top" class="admin-table-colo1"><?php echo $result_view[$i]->city; ?></td>
    <td align="left" valign="top" class="admin-table-colo1"><?php //echo $result_view[$i]->market_name;
   $select=$this->Supplier_Model->get_market_id($result_view[$i]->sup_hotel_id); 
 if($select!='')
  {
  for($k=0;$k<count($select);$k++)
  {
   echo $select[$k]->market_name;
   echo ",&nbsp;";
   if (isset($select[$k+1]->market_name)){ echo $select[$k+1]->market_name;}
   echo '<br/>';
  }
  }
    ?> 	</td>
    <td align="left" valign="top" class="admin-table-colo1"><?php echo $result_view[$i]->main_first_name.' '.$result_view[$i]->main_last_name; ?> </td>
    <td align="left" valign="top" class="admin-table-colo1"><?php echo $result_view[$i]->main_email; ?> </td>
    <td align="left" valign="top" class="admin-table-colo1"><?php echo $result_view[$i]->created_date; ?> </td>
    <td align="left" valign="top" class="admin-table-colo1"><?php if($result_view[$i]->status==1) { echo 'Active'; } else { echo 'InActive'; } ?> </td>
    <td align="left" valign="top" class="admin-table-colo1"><a href="<?php echo WEB_URL; ?>index/update_hotel_status/<?php echo $this->uri->segment(3); ?>/<?php echo $result_view[$i]->sup_hotel_id; ?>/1" style="color:#000;">Active</a> / <a href="<?php echo WEB_URL; ?>index/update_hotel_status/<?php echo $this->uri->segment(3); ?>/<?php echo $result_view[$i]->sup_hotel_id; ?>/0" style="color:#000;">InActive</a> / <a href="<?php echo WEB_URL; ?>index/update_hotel_status/<?php echo $this->uri->segment(3); ?>/<?php echo $result_view[$i]->sup_hotel_id; ?>/2" style="color:#000;">Delete</a> </td>
  </tr>
  <?php
  }
  }
  else
  {
	  ?> <td align="center" valign="top" colspan="9" class="my_profile_name_ex_tab_whit_ex">No Result Found... </td>
      <?php
  }
  ?>
  <tr align="right">
    <td align="right" valign="top" colspan="0" class=""><a href="<?php echo WEB_URL;?>index/add_hotel_ad/<?php echo $id;  ?>" style="color:green;"><font size="4">Add New</font></a> </td>
    
  </tr>
</table>



    
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
