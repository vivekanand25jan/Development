<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Console</title>
<link href="<?php echo WEB_DIR; ?>adminstyle.css" rel="stylesheet" type="text/css" />
   			
<script src="<?php echo WEB_DIR ?>jquery.js"></script>
<script type="text/javascript" src="<?php echo WEB_DIR ?>ajaxsbmt.js"></script>
<script language="javascript1.5" type="text/javascript">
function gen_markup()
{
	var g_markup =document.gen.g_markup.value;
	//var g_api =document.gen.g_api.value;
	var g_type ='generic';
	var g_country=document.gen.g_country.value;
	var g_agent=document.gen.g_agent.value;
	$("#g_result").empty().html('<table width="100%"><tr><td colspan="6" align="center"><img src=\'<?php print WEB_DIR ?>images/ajax-loader(5).gif\'></td></tr></table>');
	$("#g_result").load("<?php print WEB_URL ?>index/genuric_markup_b2b/"+g_markup+"/"+g_type+"/"+g_country+"/"+g_agent);
	
	return false;
	// For first time page load default results
}

/*function sp_markup()
{
var s_markup =document.sp.s_markup.value;
var s_api =document.sp.s_api.value;
var s_country =document.sp.s_country.value;
if(s_country != '')
{
var s_type ='specific';
$("#g_result").empty().html('<table width="100%"><tr><td colspan="6" align="center"><img src=\'<?php print WEB_DIR ?>images/ajax-loader(5).gif\'></td></tr></table>');
$("#g_result").load("<?php print WEB_URL ?>index/genuric_markup_b2b/"+s_markup+"/"+s_api+"/"+s_type+"/"+s_country);

return false;
// For first time page load default results
}
else
{
alert("Please Select Counrty...");
return false;
}

}
*/

function gen_markup_sp()
{
	var sg_markup =document.gen_sp.sg_markup.value;
	//var sg_api =document.gen_sp.sg_api.value;
	var sg_type ='specific';
	var sg_country=document.gen_sp.sg_country.value;
	var sg_agent=document.gen_sp.sg_agent.value;
	$("#g_result").empty().html('<table width="100%"><tr><td colspan="6" align="center"><img src=\'<?php print WEB_DIR ?>images/ajax-loader(5).gif\'></td></tr></table>');
	$("#g_result").load("<?php print WEB_URL ?>index/genuric_markup_b2b/"+sg_markup+"/"+sg_type+"/"+sg_country+"/"+sg_agent);
	
	return false;
	// For first time page load default results
}

function gen_markup_sph()
{
	var sg_markup =document.gen_sph.sg_markuph.value;
	//var sg_api =document.gen_sp.sg_api.value;
	var sg_type ='specific_hotel';
	var sg_hotel=document.gen_sph.sg_hotelh.value;
	var sg_agent=document.gen_sph.sg_agenth.value;
	//alert(sg_markup);exit;
	$("#g_result").empty().html('<table width="100%"><tr><td colspan="6" align="center"><img src=\'<?php print WEB_DIR ?>images/ajax-loader(5).gif\'></td></tr></table>');
	$("#g_result").load("<?php print WEB_URL ?>index/genuric_markup_b2b/"+sg_markup+"/"+sg_type+"/"+sg_hotel+"/"+sg_agent);
	
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
<ul class="tabs" style="position:relative; top:-4px; left:-3px; border-bottom:none">
	<li><a href="javascript:void(0)" style="border-radius:8px 0 0 0">B2B Rate Master</a></li>
	

   <!-- <li><a href="#">MY TRAVELERS</a></li>
     <li><a href="#">BILLING INFO</a></li>
          <li><a href="#">CREDIT POINTS</a></li>
               <li><a href="#">TOOLS </a></li>-->
</ul>
</div>
<span style="float:right; cursor:pointer; font-size:12px; padding:5px;color:#069;"><A HREF="<?php echo WEB_URL; ?>index/dashboard"> Go Back</A></span> 
<!-- tab "panes" -->
<div class="panes" style="padding-bottom:10px">
	<div id="containerdount1" class="admin-innerbox">
    	



<table width="100%" border="0" cellpadding="3" cellspacing="0" style="margin-top:25px; line-height:50px">
<form  onsubmit="javascript:return gen_markup()"  method="post"  name="gen" >

  <tr>
    <td class="my_profile_name" colspan="5" >Generic (Country & Agent Based)</td></tr><tr>
     <td class="my_profile_name">Agent</td>
    <td><select name='g_agent'  class="ma_book_txt_fl_jumb1"  id='api' style="height:28px">
						<option value='all'>ALL</option>
						<?php
							
							for ($i = 0; $i < count($agent); $i++) {
								echo "<option value='" . $agent[$i]->agent_id . "'>" . $agent[$i]->name.'-'.$agent[$i]->company_name."</option>";
							}
						?>
						</select></td>
   <!-- <td class="my_profile_name">API</td>
    <td><select name='g_api'  class="ma_book_txt_fl_jumb1"  id='api' style="height:28px">
						<option value='all'>ALL</option>
						<?php
							
						/*	for ($i = 0; $i < count($api); $i++) {
								echo "<option value='" . $api[$i]->api_name . "'>" . $api[$i]->api_name."</option>";
							}*/
						?>
						</select></td>-->
    <td class="my_profile_name">Country</td>
    <td><select name='g_country'  class="ma_book_txt_fl_jumb1"  id='country' style="height:28px">
    <option value="YWxs">ALL</option>
					</select></td>
    <td class="my_profile_name">Markup</td>
    <td><input type="text" name="g_markup"  class="ma_book_txt_fl_jumb1" value="" style=" width:130px;position:relative; top:-2px" /> %</td>
    <td><input type="image" src="<?php echo WEB_DIR ?>images/sub_mint_btn_admin1.png" name='submit' onclick="javascript:void(0);"  style="position:relative; top:-3px"></td>
  </tr>
</form> 

</table>

<table width="100%" border="0" cellpadding="3" cellspacing="0" style="margin-top:25px; line-height:50px">
<form  onsubmit="javascript:return gen_markup_sp()"  method="post"  name="gen_sp" >

  <tr>
    <td class="my_profile_name" colspan="5" >Specific (Country Based)</td></tr><tr>
     <td class="my_profile_name">Agent</td>
    <td><select name='sg_agent'  class="ma_book_txt_fl_jumb1"  id='api' style="height:28px">
						<option value='all'>ALL</option>
						<?php
							
							for ($i = 0; $i < count($agent); $i++) {
								echo "<option value='" . $agent[$i]->agent_id . "'>" . $agent[$i]->name.'-'.$agent[$i]->company_name."</option>";
							}
						?>
						</select></td>
    <!--<td class="my_profile_name">API</td>
    <td><select name='sg_api'  class="ma_book_txt_fl_jumb1"  id='api' style="height:28px">
						<option value='all'>ALL</option>
						<?php
							
						/*	for ($i = 0; $i < count($api); $i++) {
								echo "<option value='" . $api[$i]->api_name . "'>" . $api[$i]->api_name."</option>";
							}*/
						?>
						</select></td>-->
    <td class="my_profile_name">Country</td>
    <td><select name='sg_country'  class="ma_book_txt_fl_jumb1"  id='country' style="height:28px">
    <option value="YWxs">ALL</option>
			<?php
			for ($i = 0; $i < count($countries); $i++) {

							echo "<option value='" . strtr(base64_encode($countries[$i]->country_name),array('+' => '.','=' => '-','/' => '~')). "'>" . $countries[$i]->country_name."</option>";
					}
							?>		</select></td>
    <td class="my_profile_name">Markup</td>
    <td><input type="text" name="sg_markup"  class="ma_book_txt_fl_jumb1" value="" style=" width:130px;position:relative; top:-2px" /> %</td>
    <td><input type="image" src="<?php echo WEB_DIR ?>images/sub_mint_btn_admin1.png" name='submit' onclick="javascript:void(0);"  style="position:relative; top:-3px"></td>
  </tr>
</form> 

</table>

<table width="100%" border="0" cellpadding="3" cellspacing="0" style="margin-top:25px; line-height:50px">
<form  onsubmit="javascript:return gen_markup_sph()"  method="post"  name="gen_sph" >

  <tr>
    <td class="my_profile_name" colspan="5" >Specific (Hotel Based)</td></tr><tr>
     <td class="my_profile_name">Agent</td>
    <td><select name='sg_agenth'  class="ma_book_txt_fl_jumb1"  id='api' style="height:28px">
						<option value='all'>ALL</option>
						<?php
						/*	
							for ($i = 0; $i < count($agent); $i++) {
								echo "<option value='" . $agent[$i]->agent_id . "'>" . $agent[$i]->name.'-'.$agent[$i]->company_name."</option>";
							}*/
						?>
						</select></td>
    <!--<td class="my_profile_name">API</td>
    <td><select name='sg_api'  class="ma_book_txt_fl_jumb1"  id='api' style="height:28px">
						<option value='all'>ALL</option>
						<?php
							
							for ($i = 0; $i < count($api); $i++) {
								echo "<option value='" . $api[$i]->api_name . "'>" . $api[$i]->api_name."</option>";
							}
						?>
						</select></td>-->
    <td class="my_profile_name">Hotel</td>
    <td><select name='sg_hotelh'  class="ma_book_txt_fl_jumb1"  id='country' style="height:28px">
    <option value="YWxs">ALL</option>
			<?php
/*			for ($i = 0; $i < count($countries); $i++) {

							echo "<option value='" . strtr(base64_encode($countries[$i]->country_name),array('+' => '.','=' => '-','/' => '~')). "'>" . $countries[$i]->country_name."</option>";
					}*/
					for ($i = 0; $i < count($hotel); $i++) {
						
								echo "<option value='" . strtr(base64_encode($hotel[$i]->sup_hotel_id),array('+' => '.','=' => '-','/' => '~')). "'>" . $hotel[$i]->hotel_name."</option>";
							}
							?>		</select></td>
    <td class="my_profile_name">Markup</td>
    <td><input type="text" name="sg_markuph"  class="ma_book_txt_fl_jumb1" value="" style=" width:130px;position:relative; top:-2px" /> %</td>
    <td><input type="image" src="<?php echo WEB_DIR ?>images/sub_mint_btn_admin1.png" name='submit' onclick="javascript:void(0);"  style="position:relative; top:-3px"></td>
  </tr>
</form> 

</table>

<div id="g_result" style=" width:100%">
<table align="left" width="100%" border="0" cellspacing="0" cellpadding="0" style="height:50px">

    <tr>
  	<td style="font-size:16px; text-align:left; padding-left:5px;">Generic (XML & Agent Based) Markup Table</td>
  </tr>
 </table> 

<table width="100%" border="0" cellspacing="1" cellpadding="0" style="background-color:#E8E5E5">

  <tr>
  	<td align="center" class="admin-table-colo">No</td>
    <td align="center" class="admin-table-colo">Agent</td>
<!--    <td align="center" class="admin-table-colo">API</td>-->
    <td align="center" class="admin-table-colo">Country</td>
    <td align="center" class="admin-table-colo">Markup(%)</td>
     <td align="center" class="admin-table-colo">Creation Date</td>
    <td align="center" class="admin-table-colo">Status</td>
    <td align="center" class="admin-table-colo">Action</td>
  </tr>
  
  <?php 
  if($b2b_markup_g[0]!='')
  {
for($i=0;$i<count($b2b_markup_g);$i++)
{
	
	?>
   <tr >
  	<td align="center" class="admin-table-colo1"><?php echo $i+1; ?></td>
    <td align="center" class="admin-table-colo1"><?php echo $this->admin_model->get_agetn_info_new($b2b_markup_g[$i]->agent_id); ?></td>
    
<!--    <td align="center" class="admin-table-colo1"><?php echo $b2b_markup_g[$i]->api; ?></td>-->
    <td align="center" class="admin-table-colo1"><?php echo $b2b_markup_g[$i]->country; ?></td>
    <td align="center" class="admin-table-colo1"><?php echo $b2b_markup_g[$i]->markup.' %'; ?></td>
      <td align="center" class="admin-table-colo1"><?php echo $b2b_markup_g[$i]->register_date; ?></td>
    <td align="center" class="admin-table-colo1"><?php if($b2b_markup_g[$i]->status==1) { echo 'Active'; } else { echo 'InActive'; } ?></td>
    <td align="center" class="admin-table-colo1"><a href="<?php echo WEB_URL; ?>index/update_b2b_markup/<?php echo $b2b_markup_g[$i]->id; ?>/1">Active</a> / <a href="<?php echo WEB_URL; ?>index/update_b2b_markup/<?php echo $b2b_markup_g[$i]->id; ?>/0">InActive</a>/ <a href="<?php echo WEB_URL; ?>index/update_b2b_markup/<?php echo $b2b_markup_g[$i]->id; ?>/2">Delete</a></td>
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
 
 <table align="left" width="100%" border="0" cellspacing="0" cellpadding="0" style="height:50px">

    <tr>
  	<td style="font-size:16px; text-align:left; padding-left:5px;">Specific (Country Based) Markup Table</td>
  </tr>
 </table> 

<table width="100%" border="0" cellspacing="1" cellpadding="0" style="background-color:#E8E5E5">

  <tr>
  	<td align="center" class="admin-table-colo">No</td>
    <td align="center" class="admin-table-colo">Agent</td>
<!--    <td align="center" class="admin-table-colo">API</td>-->
    <td align="center" class="admin-table-colo">Country</td>
    <td align="center" class="admin-table-colo">Markup(%)</td>
     <td align="center" class="admin-table-colo">Creation Date</td>
    <td align="center" class="admin-table-colo">Status</td>
    <td align="center" class="admin-table-colo">Action</td>
  </tr>
  
  <?php 
  if($b2b_markup_s[0]!='')
  {
for($i=0;$i<count($b2b_markup_s);$i++)
{
	
	?>
   <tr >
  	<td align="center" class="admin-table-colo1"><?php echo $i+1; ?></td>
    <td align="center" class="admin-table-colo1"><?php echo $this->admin_model->get_agetn_info_new($b2b_markup_s[$i]->agent_id); ?></td>
    
<!--    <td align="center" class="admin-table-colo1"><?php echo $b2b_markup_s[$i]->api; ?></td>-->
    <td align="center" class="admin-table-colo1"><?php echo $b2b_markup_s[$i]->country; ?></td>
    <td align="center" class="admin-table-colo1"><?php echo $b2b_markup_s[$i]->markup.' %'; ?></td>
      <td align="center" class="admin-table-colo1"><?php echo $b2b_markup_s[$i]->register_date; ?></td>
    <td align="center" class="admin-table-colo1"><?php if($b2b_markup_s[$i]->status==1) { echo 'Active'; } else { echo 'InActive'; } ?></td>
    <td align="center" class="admin-table-colo1"><a href="<?php echo WEB_URL; ?>index/update_b2b_markup/<?php echo $b2b_markup_s[$i]->id; ?>/1">Active</a> / <a href="<?php echo WEB_URL; ?>index/update_b2b_markup/<?php echo $b2b_markup_s[$i]->id; ?>/0">InActive</a>/ <a href="<?php echo WEB_URL; ?>index/update_b2b_markup/<?php echo $b2b_markup_s[$i]->id; ?>/2">Delete</a></td>
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
 
 

<table align="left" width="100%" border="0" cellspacing="0" cellpadding="0" style="height:50px">

    <tr>
  	<td style="font-size:16px; text-align:left; padding-left:5px;">Specific (Hotel Based) Markup Table</td>
  </tr>
 </table> 

<table width="100%" border="0" cellspacing="1" cellpadding="0" style="background-color:#E8E5E5">

  <tr>
  	<td align="center" class="admin-table-colo">No</td>
    <td align="center" class="admin-table-colo">Agent</td>
<!--    <td align="center" class="admin-table-colo">API</td>-->
    <td align="center" class="admin-table-colo">Hotel</td>
    <td align="center" class="admin-table-colo">Markup(%)</td>
     <td align="center" class="admin-table-colo">Creation Date</td>
    <td align="center" class="admin-table-colo">Status</td>
    <td align="center" class="admin-table-colo">Action</td>
  </tr>
  
  <?php 
  if($b2b_markup_hotel[0]!='')
  {
for($i=0;$i<count($b2b_markup_hotel);$i++)
{

	?>
   <tr >
   
  	<td align="center" class="admin-table-colo1"><?php echo $i+1; ?></td>
    <td align="center" class="admin-table-colo1"><?php echo $b2b_markup_hotel[$i]->agent_id; ?></td>
    
<!--    <td align="center" class="admin-table-colo1"><?php echo $b2b_markup_hotel[$i]->api;  ?></td>-->
    <td align="center" class="admin-table-colo1"><?php if ($b2b_markup_hotel[$i]->hotel=='all') { if(isset($b2b_markup_hotel[$i]->hotel)) echo $b2b_markup_hotel[$i]->hotel;}else{ $hotelname = $this->admin_model->get_agetn_info_new_hotel($b2b_markup_hotel[$i]->hotel);  if(isset($hotelname->hotel_name)) echo $hotelname->hotel_name; } ?></td>
    <td align="center" class="admin-table-colo1"><?php echo $b2b_markup_hotel[$i]->markup.' %'; ?></td>
      <td align="center" class="admin-table-colo1"><?php echo $b2b_markup_hotel[$i]->register_date; ?></td>
    <td align="center" class="admin-table-colo1"><?php if($b2b_markup_hotel[$i]->status==1) { echo 'Active'; } else { echo 'InActive'; } ?></td>
    <td align="center" class="admin-table-colo1"><a href="<?php echo WEB_URL; ?>index/update_b2b_markup/<?php echo $b2b_markup_hotel[$i]->id; ?>/1">Active</a> / <a href="<?php echo WEB_URL; ?>index/update_b2b_markup/<?php echo $b2b_markup_hotel[$i]->id; ?>/0">InActive</a>/ <a href="<?php echo WEB_URL; ?>index/update_b2b_markup/<?php echo $b2b_markup_hotel[$i]->id; ?>/2">Delete</a></td>
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

<!--<div class="tb_sample_cover_thre" style="padding-top:15px;">
                		<div class="tb_sample_cover_thre_L"> Agent : </div>
                        <div class="tb_sample_cover_thre_R">
						<select name='agent' class="ma_book_txt_fl_jumb" id='agent'>
						<option value=''>Select Agent</option>
						<option value='all'>All</option>
						<?php
							
							for ($i = 0; $i < count($agent); $i++) {
								echo "<option value='" . $agent[$i]->agent_id . "'>" . $agent[$i]->name."</option>";
							}
						?>
						</select>
						<div style="color:#FF0000;"> <?php echo form_error('agent');?></div>
						</div>
                </div>
				
<div class="tb_sample_cover_thre">
                		<div class="tb_sample_cover_thre_L"> API :</div>
                        <div class="tb_sample_cover_thre_R">
						<select name='api'  class="ma_book_txt_fl_jumb"  id='api'>
						<option value=''>Select API</option>
						<option value='all'>All</option>
						<?php
							
							for ($i = 0; $i < count($api); $i++) {
								echo "<option value='" . $api[$i]->api_id . "'>" . $api[$i]->api_name."</option>";
							}
						?>
						</select>
						<div style="color:#FF0000;"> <?php echo form_error('api');?></div>
						</div>
                </div>
				
				<div class="tb_sample_cover_thre">
                		<div class="tb_sample_cover_thre_L"> Country :</div>
                        <div class="tb_sample_cover_thre_R">
						<select name='country'  class="ma_book_txt_fl_jumb"  id='country'>
						<option value=''>Select Country</option>
						<?php
							
							for ($i = 0; $i < count($countries); $i++) {
								echo "<option value='" . $countries[$i]->country_name . "'>" . $countries[$i]->country_name."</option>";
							}
						?>
						</select>
						<div style="color:#FF0000;"> <?php echo form_error('country');?></div>
						</div>
                </div>
				
					<div class="tb_sample_cover_thre">
                		<div class="tb_sample_cover_thre_L"> City :</div>
                        <div class="tb_sample_cover_thre_R">
						<select name='city'  class="ma_book_txt_fl_jumb"  id='city'>
						<option value=''>Select City</option>
						
						</select>
						<div style="color:#FF0000;"> <?php echo form_error('city');?></div>
						</div>
                </div>
				
				<div class="tb_sample_cover_thre">
                		<div class="tb_sample_cover_thre_L"> Commission :</div>
                        <div class="tb_sample_cover_thre_R">
						<select name="commission"  class="ma_book_txt_fl_jumb"  id="commission">
						<?php
						for ($i = 0; $i <=30; $i++) {
							//if((int)$agent->markup == $i) $sel = 'selected';
							//else $sel = '';
							$sel = '';
							echo "<option value='$i'" . $sel ." >$i</option>";
						}
						?>
						</select>
						<div style="color:#FF0000;"> <?php echo form_error('commission');?></div>
						</div>
                </div>
				
				<div class="tb_sample_cover_thre">
                		<div class="tb_sample_cover_thre_L"> Markup :</div>
                        <div class="tb_sample_cover_thre_R">
						<select name="markup"   class="ma_book_txt_fl_jumb"  id="markup">
						<?php
						for ($i = 0; $i <=30; $i++) {
							//if((int)$agent->markup == $i) $sel = 'selected';
							//else $sel = '';
							$sel = '';
							echo "<option value='$i'" . $sel ." >$i</option>";
						}
						?>
						</select>
						<div style="color:#FF0000;"> <?php echo form_error('markup');?></div>
						</div>
                </div>
				-->
<br />
<!--<img type="submit" src="<?php echo WEB_DIR ?>images/sub_mint_btn_admin.png" name='submit' value="Submit">-->

    
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
