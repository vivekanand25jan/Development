<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
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
<li><a href="javascript:void(0)" style="border-radius:8px 0 0 0;width: 270px;">Meet and Greet Airport Rate Master</a></li>

   <!-- <li><a href="#">MY TRAVELERS</a></li>
     <li><a href="#">BILLING INFO</a></li>
          <li><a href="#">CREDIT POINTS</a></li>
               <li><a href="#">TOOLS </a></li>-->
</ul>
</div>

<!-- tab "panes" -->
<div class="panes" style="padding-bottom:10px">
	<div id="containerdount1" class="admin-innerbox">
       <div style="float:right; height:20px;"><a href="<?php echo site_url('index/view_marhaba_markup_details/')?>/<?php echo $this->uri->segment(3); ?>" style="color:#099;">Go Back</a></div>
       <div style="clear:both;"></div>
        
    	

<form  action="<?php echo WEB_URL; ?>index/add_marhaba_markup_details/<?php echo $this->uri->segment(3); ?>" method="post"  name="gen" >
 

<table width="100%" border="0" cellpadding="3" cellspacing="0" style="margin-top:25px; line-height:50px">
	
  <tr>
    <td class="my_profile_name" colspan="5" >Generic (Marhaba Type  & Supplier Based)</td></tr><tr>
    <!-- <td class="my_profile_name">Period</td>
    <td><select name="car_rental_period_id"  class="ma_book_txt_fl_jumb1"  id='api' style="height:28px">
    					
						<option value='all'>ALL</option>
						
						</select></td>-->
    
     <td class="my_profile_name">Supplier</td>
    <td><select name="sup_id[]" id="sup_id" style="width:230px; height:40x;"  multiple="multiple"  required >
						<?php
							for ($i = 0; $i < count($supp); $i++) {
								
								echo "<option value='" . $supp[$i]->agent_id . "'>" . $supp[$i]->company_name.'-'.$supp[$i]->city."</option>";
							}
						?>
						</select></td>
   
   
    <td class="my_profile_name">Markup</td>
    <td><input type="text" name="markup"  class="ma_book_txt_fl_jumb1" value="" style=" width:130px;position:relative; top:-2px" /> %</td>
    <td><input type="image" src="<?php echo WEB_DIR ?>images/sub_mint_btn_admin1.png" name='submit'  style="position:relative; top:-3px"></td>
  </tr>


</table>

</form> 







  
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
