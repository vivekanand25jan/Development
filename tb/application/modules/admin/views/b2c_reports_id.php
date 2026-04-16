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
	<li><a href="javascript:void(0)">Booking Reports</a></li>
	

   <!-- <li><a href="#">MY TRAVELERS</a></li>
     <li><a href="#">BILLING INFO</a></li>
          <li><a href="#">CREDIT POINTS</a></li>
               <li><a href="#">TOOLS </a></li>-->
</ul>
</div>

<!-- tab "panes" -->
<div class="panes" style="padding-bottom:10px">
	<div id="containerdount" class="admin-innerbox">
    	


<table width="920" border="0" align="left" cellpadding="0" cellspacing="1" style="margin:15px 0 0 15px; background-color:#E8E5E5; border:0px solid #ccc;">
  <tr>
    <td align="left" valign="top" class="admin-table-colo">Booking Number</td>
    <td align="center" valign="top" class="admin-table-colo">From</td>
    <td align="center" valign="top" class="admin-table-colo">To</td>
    <td align="left" valign="top" class="admin-table-colo">Rooms</td>
    <td align="left" valign="top" class="admin-table-colo">Adult</td>
    <td align="left" valign="top" class="admin-table-colo">Child</td>
    <td align="left" valign="top" class="admin-table-colo">Voucher Date</td>
    <td align="center" valign="top" class="admin-table-colo">Price</td>
    <td align="center" valign="top" class="admin-table-colo">Status</td>
  </tr>
  <?php
  if($result_view!='')
  {
  for($i=0;$i<count($result_view);$i++)
  {
  ?>
  <tr>
    <td align="left" valign="top" class="admin-table-colo1"><?php echo $result_view[$i]->booking_number; ?></td>
    <td align="left" valign="top" class="admin-table-colo1"><?php echo $result_view[$i]->check_in; ?></td>
    <td align="left" valign="top" class="admin-table-colo1"><?php echo $result_view[$i]->check_out; ?> 	</td>
    <td align="left" valign="top" class="admin-table-colo1"><?php echo $result_view[$i]->no_of_room; ?> </td>
    <td align="left" valign="top" class="admin-table-colo1"><?php echo $result_view[$i]->adult; ?> </td>
    <td align="left" valign="top" class="admin-table-colo1"><?php echo $result_view[$i]->child; ?> </td>
    <td align="left" valign="top" class="admin-table-colo1"><?php echo $result_view[$i]->voucher_date; ?> </td>
    <td align="left" valign="top" class="admin-table-colo1"><?php echo $result_view[$i]->amount; ?> </td>
    <td align="left" valign="top" class="admin-table-colo1">Confirmed </td>
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
  <!--<tr>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit_second">454022</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit_second">ATH</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit_second">SKG 	</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit_second">Olympic Air</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit_second">13/06/12 12:35</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit_second">18/06/12 21:00</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit_second">3</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit_second">1.268,16 €</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit_second_ex">Confirmed</td>
  </tr>-->
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
