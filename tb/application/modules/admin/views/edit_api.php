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
	<li><a href="javascript:void(0)">Currency Converter</a></li>
    <li><a href="<?php echo WEB_URL; ?>index/api_manage">Back</a></li>
	

   <!-- <li><a href="#">MY TRAVELERS</a></li>
     <li><a href="#">BILLING INFO</a></li>
          <li><a href="#">CREDIT POINTS</a></li>
               <li><a href="#">TOOLS </a></li>-->
</ul>
</div>

<!-- tab "panes" -->
<div class="panes" style="padding-bottom:10px">
	<div id="containerdount" class="admin-innerbox">
    	



<div class="contete_area">
<form action="<?php echo WEB_URL.'index/edit_api/'.$result->api_id;?>" method="post"  name="reg" >
<table border="0" cellspacing="5" cellpadding="5" style="margin-top:20px">
<tr><td class="pl15"><b>API</b></td>
<td class="pl15">:</td>
<td class="pl15"><?php echo $result->api_name;?></td></tr>

												
<tr><td class="pl15"><b>API Order:</b></td>
<td class="pl15">:</td>
<td class="pl15"><input class="ma_pro_txt" style="height:21px; width:127px" name="api_order" type="text" value="<?php if( isset($result->api_order)) echo $result->api_order; ?>" />
<div style="color:#FF0000;"> <?php echo form_error('api_order');?></div>
</td></tr>

<tr><td class="pl15"><b>Status:</b></td>
<td class="pl15">:</td>
<td class="pl15"> 
<input type="radio" name="active" value="1" <?php if (isset($result->active) && $result->active == 1) echo 'checked'; ?> /> Active &nbsp;
						<input type="radio" name="active" value="0" <?php if (isset($result->active) && $result->active == 0) echo 'checked'; ?> /> Inactive <br />
						<div style="color:#FF0000;"> <?php echo form_error('active');?>
</td></tr>

<tr><td></td>
<td class="pl15">&nbsp;</td><td class="pl15"><input type="image" name='submit' src="<?php echo WEB_DIR ?>images/sub_mint_btn_admin.png" width="109" height="35"  value="Submit"></td></tr>

</table>

</form>
</div>

    
  </div>
  
    
    
 
</div>


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
