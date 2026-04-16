<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
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
            <script type="text/javascript" src="<?php echo WEB_DIR_FRONT; ?>gui/scripts/jquery-1.4.2.min.js"></script>
<script>
   $(document).ready(function(){
	$('#country').change(function() {
		var country = $(this).val();
		$.ajax({
			  url:'<?php echo WEB_URL; ?>index/fetch_cities/', //+country,
			  data: "country="+country,
			  dataType: "json",
			  type: 'POST',
			  success: function(data){
				 var select = $('#city');
			//var options = select.attr('optvions');
			//$('option', select).remove();
			var city_str = '<option value="">Select Citi</option>';
			
				$.each(data, function(index, array) {
				//options[options.length] = new Option(array['city_name']);
				city_str+= "<option value='" + array['city_id'] + "'>"+ array['city_name'] + "</option>";
				});
				
				select.html(city_str);
				
				
			
			}
			});
	});
});
</script>
                     <div id="navjam">
<ul class="tabs" style="position:relative; top:-4px; left:-3px; border-bottom:none">
	<li><a href="<?php echo WEB_URL; ?>index/suplier_available_market" style="border-radius:8px 0 0 0">Market Management</a></li>
	

   <!-- <li><a href="#">MY TRAVELERS</a></li>
     <li><a href="#">BILLING INFO</a></li>
          <li><a href="#">CREDIT POINTS</a></li>
               <li><a href="#">TOOLS </a></li>-->
</ul>
</div>
<span style="float:right; cursor:pointer; font-size:12px; padding:5px;color:#069;"><A HREF="<?php echo WEB_URL; ?>index/suplier_available_market"> Go Back</A></span>

<!-- tab "panes" -->
<div class="panes" style="padding-bottom:10px">
	<div id="containerdount" class="admin-innerbox">
    	
<form action="<?php echo WEB_URL.'index/sup_market_country';?>/<?php echo $this->uri->segment(3); ?>" method="post"  name="reg" >
			
<table width="100%" border="0" cellspacing="1" cellpadding="0" style="background-color:#E8E5E5">
  <tr>
  <td align="left" class="admin-table-colo">Country </td>
    <td align="left" class="admin-table-colo">
      <select name='country_id' class="ma_pro_txt" id='country_id' required >
        <option value=''>Select Country</option>
        <?php
							
							for ($i = 0; $i < count($countries); $i++) { ?>
								<option value="<?php echo $countries[$i]->country_id;?>" ><?php echo $countries[$i]->name; ?></option>
						<?php	}
						?>
      </select>
      <?php echo form_error('country');?></td>
   
    </tr>

  
  <tr><td >&nbsp;</td><td><input type="image" src="<?php echo WEB_DIR ?>images/sub_mint_btn_admin.png"   name='submit' value="Submit"></td></tr>
</table>

</form>

<br /><br />

<table width="100%" border="0" cellspacing="1" cellpadding="0" style="background-color:#E8E5E5">

  <tr>
  	<td align="center" class="admin-table-colo">No</td>
 	<td align="center" class="admin-table-colo">Country Name</td>
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
    <td align="center" class="admin-table-colo1"><?php echo $this->admin_model->get_country_name($result[$i]->country_id); ?></td>
      <td align="center" class="admin-table-colo1">
    <a href="<?php echo WEB_URL; ?>index/update_market_country/<?php echo $this->uri->segment(3); ?>/<?php echo $result[$i]->sup_market_country_id; ?>"><img src="<?php  echo WEB_DIR_FRONT ;?>/images/gray-close-delete-circle-icon.png" /></a> 
   
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
<?php /*?><table border="0" cellspacing="0" cellpadding="5">
<tr><td>No</td><td>Top City</td><td>Action</td></tr>
<?php
if (!empty($top_city)) {
for ($i = 0; $i < count($top_city); $i++)
{
	echo '<tr><td>'.$top_city[$i]->city_name.'</td><td><a href="'. WEB_URL . 'index/delete_top_city/' . $agent_id . "/" . $top_city[$i]->top_citi_id . '"><img src="'.WEB_DIR_FRONT.'images/gray-close-delete-circle-icon.png" /></a></td></tr>';
}
} else {
echo '<tr><td>data not available</td></tr>';
}
?>
</table><?php */?>
		  
    
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
