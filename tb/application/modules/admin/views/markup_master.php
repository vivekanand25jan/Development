<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="<?php echo WEB_DIR; ?>adminstyle.css" rel="stylesheet" type="text/css" />
   			
  <script src="<?php echo WEB_DIR ?>jquery.js"></script>
        <script type="text/javascript" src="<?php echo WEB_DIR ?>ajaxsbmt.js"></script>
                <script language="javascript1.5" type="text/javascript">
				function gen_markup()
		{
		
		var g_markup =document.gen.g_markup.value;
		var g_api =document.gen.g_api.value;
		var g_type ='generic';
		var g_country='YWxs';
		$("#g_result").empty().html('<table width="100%"><tr><td colspan="6" align="center"><img src=\'<?php print WEB_DIR ?>images/ajax-loader(5).gif\'></td></tr></table>');
		  $("#g_result").load("<?php print WEB_URL ?>index/genuric_markup/"+g_markup+"/"+g_api+"/"+g_type+"/"+g_country);
		
		       return false;
                      // For first time page load default results
                         
		 
		}
			function sp_markup()
		{
		
		var s_markup =document.sp.s_markup.value;
		var s_api =document.sp.s_api.value;
		var s_country =document.sp.s_country.value;
		if(s_country != '')
		{
		var s_type ='specific';
		$("#g_result").empty().html('<table width="100%"><tr><td colspan="6" align="center"><img src=\'<?php print WEB_DIR ?>images/ajax-loader(5).gif\'></td></tr></table>');
		  $("#g_result").load("<?php print WEB_URL ?>index/genuric_markup/"+s_markup+"/"+s_api+"/"+s_type+"/"+s_country);
		
		       return false;
                      // For first time page load default results
		}
		else
		{
			alert("Please Select Counrty...");
			 return false;
		}
		 
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
	<li><a href="javascript:void(0)" style="border-radius:8px 0 0 0">B2C Rate Master</a></li>
	

   <!-- <li><a href="#">MY TRAVELERS</a></li>
     <li><a href="#">BILLING INFO</a></li>
          <li><a href="#">CREDIT POINTS</a></li>
               <li><a href="#">TOOLS </a></li>-->
</ul>
</div>

<!-- tab "panes" -->
<div class="panes" style="padding-bottom:10px">
	<div id="containerdount1" class="admin-innerbox">
    	



<table width="100%" border="0" cellpadding="3" cellspacing="0" style="margin-top:25px; line-height:50px">
<form  onsubmit="javascript:return gen_markup()"  method="post"  name="gen" >

  <tr>
    <td class="my_profile_name" >Generic (XML Based)</td>
    <td class="my_profile_name">API</td>
    <td><select name='g_api'  class="ma_book_txt_fl_jumb1"  id='api' style="height:28px">
						<option value='all'>ALL</option>
						<?php
							
							for ($i = 0; $i < count($api); $i++) {
								echo "<option value='" . $api[$i]->api_name . "'>" . $api[$i]->api_name."</option>";
							}
						?>
						</select></td>
    <td class="my_profile_name">Country</td>
    <td><select name='country'  class="ma_book_txt_fl_jumb1"  id='country' style="height:28px">
						<option value='all'>ALL</option>
						
						</select></td>
    <td class="my_profile_name">Markup</td>
    <td><input type="text" name="g_markup" class="ma_book_txt_fl_jumb1" value="" style="position:relative; top:-2px" /> %</td>
    <td><input type="image" src="<?php echo WEB_DIR ?>images/sub_mint_btn_admin1.png" name='submit' onclick="javascript:void(0);"  style="position:relative; top:-3px"></td>
  </tr>
</form> 
<form  onsubmit="javascript:return sp_markup()"  method="post"  name="sp" >
 
  <tr>
    <td class="my_profile_name" >Specific (Country Based)</td>
    <td class="my_profile_name">API</td>
    <td><select name='s_api'  class="ma_book_txt_fl_jumb1"  id='api' style="height:28px">
						<option value='all'>ALL</option>
						<?php
							
							for ($i = 0; $i < count($api); $i++) {
								echo "<option value='" .$api[$i]->api_name . "'>" . $api[$i]->api_name."</option>";
							}
						?>
						</select></td>
    <td class="my_profile_name">Country</td>
    <td><select name='s_country'  class="ma_book_txt_fl_jumb1"  id='country' style="height:28px">
						<option value=''>Select Country</option>
						<?php
							
							for ($i = 0; $i < count($countries); $i++) {
								$con = strtr(base64_encode($countries[$i]->country_name),array('+' => '.','=' => '-','/' => '~'));
								echo "<option value='" . $con . "'>" . $countries[$i]->country_name."</option>";
							}
						?>
						</select></td>
    <td class="my_profile_name">Markup</td>
    <td><input type="text" name="s_markup" class="ma_book_txt_fl_jumb1" value="" style="position:relative; top:-2px" /> %</td>
    <td><input  type="image" src="<?php echo WEB_DIR ?>images/sub_mint_btn_admin1.png" name='submit' value="Submit" style="position:relative; top:-3px"></td>
  </tr>
  </form>
</table>
<div id="g_result" style=" width:100%">
<table align="left" width="100%" border="0" cellspacing="0" cellpadding="0" style="height:50px">

    <tr>
  	<td style="font-size:16px; text-align:left; padding-left:5px;">Generic (XML Based) Markup Table</td>
  </tr>
 </table> 

<table width="100%" border="0" cellspacing="1" cellpadding="0" style="background-color:#E8E5E5">

  <tr>
  	<td align="center" class="admin-table-colo">No</td>
    <td align="center" class="admin-table-colo">API</td>
    <td align="center" class="admin-table-colo">Country</td>
    <td align="center" class="admin-table-colo">Markup(%)</td>
     <td align="center" class="admin-table-colo">Creation Date</td>
    <td align="center" class="admin-table-colo">Status</td>
    <td align="center" class="admin-table-colo">Action</td>
  </tr>
  
  <?php 
  if($b2c_markup_g[0]!='')
  {
for($i=0;$i<count($b2c_markup_g);$i++)
{
	
	?>
   <tr >
  	<td align="center" class="admin-table-colo1"><?php echo $i+1; ?></td>
    <td align="center" class="admin-table-colo1"><?php echo $b2c_markup_g[$i]->api; ?></td>
    <td align="center" class="admin-table-colo1"><?php echo $b2c_markup_g[$i]->country; ?></td>
    <td align="center" class="admin-table-colo1"><?php echo $b2c_markup_g[$i]->markup.' %'; ?></td>
      <td align="center" class="admin-table-colo1"><?php echo $b2c_markup_g[$i]->register_date; ?></td>
    <td align="center" class="admin-table-colo1"><?php if($b2c_markup_g[$i]->status==1) { echo 'Active'; } else { echo 'InActive'; } ?></td>
    <td align="center" class="admin-table-colo1"><a href="<?php echo WEB_URL; ?>index/update_b2c_markup/<?php echo $b2c_markup_g[$i]->id; ?>/1">Active</a> / <a href="<?php echo WEB_URL; ?>index/update_b2c_markup/<?php echo $b2c_markup_g[$i]->id; ?>/0">InActive</a>/ <a href="<?php echo WEB_URL; ?>index/update_b2c_markup/<?php echo $b2c_markup_g[$i]->id; ?>/2">Delete</a></td>
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
 
<table align="left" width="100%" border="0" cellspacing="0" cellpadding="0" style="height:50px; margin-top:15px">

    <tr>
  	<td style="font-size:16px; text-align:left; padding-left:5px;">Specific (Country Based) Markup Table</td>
  </tr>
 </table> 


<table width="100%" border="0" cellspacing="1" cellpadding="0" style="background-color:#E8E5E5">

  <tr>
  	<td align="center" class="admin-table-colo">No</td>
    <td align="center" class="admin-table-colo">API</td>
    <td align="center" class="admin-table-colo">Country</td>
    <td align="center" class="admin-table-colo">Markup(%)</td>
    <td align="center" class="admin-table-colo">Creation Date</td>
    <td align="center" class="admin-table-colo">Status</td>
    <td align="center" class="admin-table-colo">Action</td>
  </tr>
  <?php
  if($b2c_markup_s[0]!='')
  {
for($j=0;$j<count($b2c_markup_s);$j++)
{

  echo'<tr >
  	<td align="center" class="admin-table-colo1">'.($j+1).'</td>
    <td align="center" class="admin-table-colo1">'.$b2c_markup_s[$j]->api.'</td>
    <td align="center" class="admin-table-colo1">'.$b2c_markup_s[$j]->country.'</td>
    <td align="center" class="admin-table-colo1">'.$b2c_markup_s[$j]->markup.' %</td>
	<td align="center" class="admin-table-colo1">'.$b2c_markup_s[$j]->register_date.'</td>
    <td align="center" class="admin-table-colo1">';
	if($b2c_markup_s[$j]->status==1) { echo 'Active'; } else { echo 'InActive'; } 
	echo '</td>
    <td align="center" class="admin-table-colo1"><a href="'.WEB_URL.'index/update_b2c_markup/'.$b2c_markup_s[$j]->id.'/1">Active</a> / <a href="'.WEB_URL.'index/update_b2c_markup/'.$b2c_markup_s[$j]->id.'/0">InActive</a>/ <a href="'.WEB_URL.'index/update_b2c_markup/'.$b2c_markup_s[$j]->id.'/2">Delete</a></td>
  </tr>';
}
 }
  else
  {

echo '<tr><td align="center"  class="admin-table-colo1" colspan="7">No Result Found...';

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
