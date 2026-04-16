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
	<li><a href="javascript:void(0)" style="border-radius:8px 0 0 0">CMS</a></li>
	

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
    	



<form name="form1" action="<?php print WEB_URL?>index/add_banner_images" method="post" enctype="multipart/form-data" >             
<?php 
/*if($leftb_banner != ''){
foreach ($leftb_banner as $row)
{*/
?>

<span style="float:left;"><b>Banner Images</b></span><br />





Image Name:  <input type="text" size="3" style="height:25px; width:240px;  background-color:none;" value="<?php if(isset($row->c1)) echo $row->c1;?>" name="c1" id="c1" >       <input type="hidden" id="testid" value="" style="font-size: 10px; width: 20px; z-index:99999; position:absolute;" disabled="disabled" />

   &nbsp;&nbsp;&nbsp;

<input type="hidden" name="s1" value="<?php if(isset($row->img_path_div1)) print $row->img_path_div1;?>" />   
<input name="left_ban1" type="file"  style="height:20px; "/>
&nbsp; 
<!--The below image is to display the image-->
<!--<img src="<?php if(isset($row->img_path_div1)) print WEB_DIR.$row->img_path_div1;?>"  width="220px" style="margin:5px;"/>-->


<input type="submit" value='Submit' src="<?php echo WEB_DIR ?>images/sub_mint_btn_admin1.png" name='submit'   style="position:relative; top:-3px">


<?php
/*}*/
//}
?>

</form>

<table width="920" border="0" align="left" cellpadding="0" cellspacing="1" style="margin:15px 0 0 15px; background-color:#E8E5E5; border:0px solid #ccc;">
  <tr>
    <td align="left" valign="top" class="admin-table-colo">Image Name</td>
 <td align="left" valign="top" class="admin-table-colo">Image</td>
    <td align="left" valign="top" class="admin-table-colo">Add Date</td>
    <td align="left" valign="top" class="admin-table-colo">Status</td>
    <td align="center" valign="top" class="admin-table-colo">Action</td>
  </tr>
  

  <?php
 if($banner!='')
  {
  for($i=0;$i<count($banner);$i++)
  {
  ?>
  <tr>
    <td height='30%' align="left" valign="top" class="admin-table-colo1"><?php echo $banner[$i]->image_name; ?></td>
    <td width='40%'   align="left" valign="top" class="admin-table-colo1"><img src="<?php print WEB_DIR ?><?php echo $banner[$i]->file_path; ?>" height="80" width="150"/></td>
    <td align="left" valign="top" class="admin-table-colo1"><?php echo $banner[$i]->date; ?> </td>
    <td align="left" valign="top" class="admin-table-colo1"><?php if($banner[$i]->status==1) { echo 'Active'; } else { echo 'InActive'; } ?> </td>
    <td align="center" valign="top" class="admin-table-colo1">
    <a href="<?php echo WEB_URL; ?>index/update_banner_status/<?php echo $banner[$i]->banner_id; ?>/1" style="color:#000;">Active</a> / <a href="<?php echo WEB_URL; ?>index/update_banner_status/<?php echo $banner[$i]->banner_id; ?>/0" style="color:#000;">InActive</a> / <a href="<?php echo WEB_URL; ?>index/update_banner_status/<?php echo $banner[$i]->banner_id; ?>/2" style="color:#000;">Delete</a> </td>
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
  <!--<tr align="right">
    <td align="right" valign="top" colspan="0" class=""><a href="<?php echo WEB_URL;?>index/add_hotel_ad/" style="color:green;"><font size="4">Add New</font></a> </td>
    
  </tr>-->
</table>

<!--<form action="<?php echo WEB_URL; ?>index/update_top_destination" method="post">
<?php 
if($top_destinations != ''){
foreach ($top_destinations as $top_destinations)
{
?>
    <table  border="0" cellspacing="1" cellpadding="0">
    
    <tr height="35">
    <td width="300" colspan="3"><b>TOP DESTINATIONS</b></td>
    </tr>

    <tr height="35">
    <td width="200"></td>
    <td align="center">City Name</td>
    <td align="center">City Value</td>
    </tr>
    
    <tr height="35">
    <td width="200">City 1:</td>
    <td><input type="text" id="city1_name" name="city1_name" value="<?php if(isset($top_destinations->city1_name)) echo $top_destinations->city1_name;?>" size="30" /></td>
    <td><input type="text" id="city1_value" name="city1_value" value="<?php if(isset($top_destinations->city1_value)) echo $top_destinations->city1_value;?>" size="6"/></td>
    </tr>
    
    <tr height="35">
    <td width="200">City 2:</td>
    <td><input type="text" id="city2_name" name="city2_name" value="<?php if(isset($top_destinations->city2_name)) echo $top_destinations->city2_name;?>" size="30" /></td>
    <td><input type="text" id="city2_value" name="city2_value" value="<?php if(isset($top_destinations->city2_value)) echo $top_destinations->city2_value;?>" size="6"/></td>
    </tr>
    
    <tr height="35">
    <td width="200">City 3:</td>
    <td><input type="text" id="city3_name" name="city3_name" value="<?php if(isset($top_destinations->city3_name)) echo $top_destinations->city3_name;?>" size="30" /></td>
    <td><input type="text" id="city3_value" name="city3_value" value="<?php if(isset($top_destinations->city3_value)) echo $top_destinations->city3_value;?>" size="6"/></td>
    </tr>
    
    <tr height="35">
    <td width="200">City 4:</td>
    <td><input type="text" id="city4_name" name="city4_name" value="<?php if(isset($top_destinations->city4_name)) echo $top_destinations->city4_name;?>" size="30" /></td>
    <td><input type="text" id="city4_value" name="city4_value" value="<?php if(isset($top_destinations->city4_value)) echo $top_destinations->city4_value;?>" size="6"/></td>
    </tr>
    
    <tr height="35">
    <td width="200">City 5:</td>
    <td><input type="text" id="city5_name" name="city5_name" value="<?php if(isset($top_destinations->city5_name)) echo $top_destinations->city5_name;?>" size="30" /></td>
    <td><input type="text" id="city5_value" name="city5_value" value="<?php if(isset($top_destinations->city5_value)) echo $top_destinations->city5_value;?>" size="6"/></td>
    </tr>
    
    <tr height="50">
    <td colspan="3" align="center"><input type="image" src="<?php echo WEB_DIR ?>images/sub_mint_btn_admin1.png" name='submit'   style="position:relative; top:-3px"></td>
    </tr>
    </table>
<?php
}
}
?>
</form>-->


<!--<form action="<?php echo WEB_URL; ?>index/update_hot_deals" method="post">
<?php 
if($hot_deals != ''){
foreach ($hot_deals as $hot_deals)
{
?>
    <table  border="0" cellspacing="1" cellpadding="0">
    
    <tr height="35">
    <td width="300" colspan="3"><b>HOT DEALS</b></td>
    </tr>

    <tr height="35">
    <td width="200"></td>
    <td align="center">Hotel Name</td>
    <td align="center">Hotel Value</td>
    </tr>
    
    <tr height="35">
    <td width="200">Hotel 1:</td>
    <td><input type="text" id="hotel1_name" name="hotel1_name" value="<?php if(isset($hot_deals->city1_name)) echo $hot_deals->city1_name;?>" size="30"/></td>
    <td><input type="text" id="hotel1_value" name="hotel1_value" value="<?php if(isset($hot_deals->city1_value)) echo $hot_deals->city1_value;?>"  size="6"/></td>
    </tr>
    
    <tr height="35">
    <td width="200">Hotel 2:</td>
    <td><input type="text" id="hotel2_name" name="hotel2_name" value="<?php if(isset($hot_deals->city2_name)) echo $hot_deals->city2_name;?>" size="30" /></td>
    <td><input type="text" id="hotel2_value" name="hotel2_value" value="<?php if(isset($hot_deals->city2_value)) echo $hot_deals->city2_value;?>" size="6" /></td>
    </tr>
    
    <tr height="35">
    <td width="200">Hotel 3:</td>
    <td><input type="text" id="hotel3_name" name="hotel3_name" value="<?php if(isset($hot_deals->city3_name)) echo $hot_deals->city3_name;?>" size="30" /></td>
    <td><input type="text" id="hotel3_value" name="hotel3_value" value="<?php if(isset($hot_deals->city3_value)) echo $hot_deals->city3_value;?>"  size="6"/></td>
    </tr>
    
    <tr height="35">
    <td width="200">Hotel 4:</td>
    <td><input type="text" id="hotel4_name" name="hotel4_name" value="<?php if(isset($hot_deals->city4_name)) echo $hot_deals->city4_name;?>" size="30" /></td>
    <td><input type="text" id="hotel4_value" name="hotel4_value" value="<?php if(isset($hot_deals->city4_value)) echo $hot_deals->city4_value;?>"  size="6"/></td>
    </tr>
    
    <tr height="35">
    <td width="200">Hotel 5:</td>
    <td><input type="text" id="hotel5_name" name="hotel5_name" value="<?php if(isset($hot_deals->city5_name)) echo $hot_deals->city5_name;?>" size="30" /></td>
    <td><input type="text" id="hotel5_value" name="hotel5_value" value="<?php if(isset($hot_deals->city5_value)) echo $hot_deals->city5_value;?>"  size="6"/></td>
    </tr>
    
    <tr height="50">
    <td colspan="3" align="center"><input type="image" src="<?php echo WEB_DIR ?>images/sub_mint_btn_admin1.png" name='submit'   style="position:relative; top:-3px"></td>
    </tr>
    </table>
<?php
}
}
?>
</form>-->



















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
