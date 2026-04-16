<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Travel Bay</title>

<link href="<?php echo WEB_DIR; ?>designAccess/css/travel_bay_stylesheet.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo WEB_DIR; ?>designAccess/engine1/style.css" />

<link href="<?php echo WEB_DIR; ?>css/style_sheet.css" rel="stylesheet" type="text/css" />
<link href="<?php echo WEB_DIR; ?>css/postion.css" rel="stylesheet" type="text/css" />

<script src="<?php echo WEB_DIR ?>script/jquery.js"></script>

   <link rel="stylesheet" href="<?php echo WEB_DIR; ?>datepickernew/themes/base/jquery.ui.all.css">
              
                <script src="<?php echo WEB_DIR; ?>datepickernew/ui/jquery.ui.core.js"></script> 
                <script src="<?php echo WEB_DIR; ?>datepickernew/ui/jquery.ui.widget.js"></script> 
                <script src="<?php echo WEB_DIR; ?>datepickernew/ui/jquery.ui.datepicker.js"></script>
                <link rel="stylesheet" href="<?php echo WEB_DIR; ?>datepickernew/demos.css">
                
  <script type="text/javascript" src="<?php echo WEB_DIR ?>gui/ajax/ajaxsbmt.js"></script>
                <script language="javascript1.5" type="text/javascript">
				function change_password()
		{
		
		var email_id =document.change_pass.email_id.value;
		var old_password =document.change_pass.old_password.value;
		var password =document.change_pass.password.value;
		var comform_password =document.change_pass.comform_password.value;
		
		$(".tab1").empty().html('<div style="padding-left:400px" align="middle"><img src=\'<?php print WEB_DIR ?>images/ajax-loader(2).gif\'></div>');
  $(".tab1").load("<?php print WEB_URL ?>b2b/password_change"+email_id+"/"+old_password+"/"+password+"/"+comform_password);
		
		       return false;
                      // For first time page load default results
		}
		</script>
        <script type="text/javascript">
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}

function deleteConform(branch_id) {

	if (confirm("Are you sure you want to delete this branch?"))
	{
		var data = 'branch_id='+branch_id;
		$.ajax({
		  url:'<?php echo WEB_URL; ?>b2b/delete_branch/'+branch_id,
		  data: '',
		  dataType: "json",
		  success: function(result){
			if (result == 'success') {
				window.location = '<?php echo WEB_URL; ?>b2b/agent_profile/';
			}
		  }
		 });
			 
	}
}
</script>
<script type="text/javascript">
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}

function deleteConform_staff(staff_id) {

	if (confirm("Are you sure you want to delete this staff?"))
	{
		var data = 'staff_id='+staff_id;
		$.ajax({
		  url:'<?php echo WEB_URL; ?>b2b/delete_staff/'+staff_id,
		  data: '',
		  dataType: "json",
		  success: function(result){
			if (result == 'success') {
				window.location = '<?php echo WEB_URL; ?>b2b/agent_profile/';
			}
		  }
		 });
			 
	}
}
</script>
<style>
.close_btn {
    background: url("<?php echo WEB_DIR; ?>images/close.png") no-repeat scroll 0 0 transparent;
    display: block;
    height: 42px;
    left: 507px;
    position: relative;
    text-indent: -9999px;
    width: 42px;
}
</style>
</head>
<body>
<?php include('contact_us.php'); ?>
<?php $this->load->view('b2b/header_index'); ?>
<div class="navfull">
<div class="nav_left"></div>
<div class="nav_middle">
<div class="nav">
<ul>
<li><a href="<?php echo WEB_URL; ?>b2b/agent_page/" >HOME</a></li>
<li><div><img src="<?php echo WEB_DIR; ?>designAccess/images/nav_line.png" width="1" height="45" border="0" /></div></li>
<li><a href="<?php echo WEB_URL; ?>b2b/my_booking/" >MY BOOKING</a></li>
<li><div><img src="<?php echo WEB_DIR; ?>designAccess/images/nav_line.png" width="1" height="45" border="0" /></div></li>
<li><?php if ($this->session->userdata('agent_logged_in')) :?><a href="<?php echo WEB_URL; ?>b2b/agent_profile" id="nav_active">MY CPANEL</a><?php endif;?></li>
<li><div><img src="<?php echo WEB_DIR; ?>designAccess/images/nav_line.png" width="1" height="45" border="0" /></div></li>
<li><a href="<?php echo WEB_URL; ?>b2b/my_favourite/" >MY FAVOURITE</a></li>
<li><div><img src="<?php echo WEB_DIR; ?>designAccess/images/nav_line.png" width="1" height="45" border="0" /></div></li>
<li><a href="<?php echo WEB_URL; ?>b2b/support_ticket/">SUPPORT TICKET</a></li>
<li><div><img src="<?php echo WEB_DIR; ?>designAccess/images/nav_line.png" width="1" height="45" border="0" /></div></li>
<li><a href="<?php echo WEB_URL; ?>b2b/contact/" onclick="$('#lightbox').show();" target="light_box" class="text3">CONTACT US</a></li>
</ul>
</div>
</div>
<div class="nav_right"></div>
</div>
<div class="midlebody">

    <div class="mainbody_signin">
   
    <div>
    <div class="hotelnames_signin" style="min-height:329px;">
    
   		<!--<div class="right-hotel-name">Youngor Central Suzhou</div>--><div id="mybook-tit">My ControlPanel</div>
   
        <div class="">            		
<!-- the tabs -->
<div id="navjam">
<ul class="tabs">
    <li><a href="javascript:void(0)">AGENCY MANAGEMENT</a>
    
    </li>
    <li><a href="javascript:void(0)">MARK UP</a></li>
    
    <?php
    $agent_det_all = $this->B2b_Model->agentInfo($this->session->userdata('agent_id'));
    if($agent_det_all->agent_mode!='cash')
    {
    ?>
    <li><a href="javascript:void(0)">BRANCH MANAGEMENT</a></li>
    <li><a href="javascript:void(0)">STAFF MANAGEMENT</a></li>
    
    <li><a href="javascript:void(0)">BRANCH DEPOSIT</a></li>
    <li><a href="javascript:void(0)">DEPOSIT REQUEST</a></li>
    <?php
    }
    ?>
    
    <!-- <li><a href="#">MY TRAVELERS</a></li>
    <li><a href="#">BILLING INFO</a></li>
    <li><a href="#">CREDIT POINTS</a></li>
    <li><a href="#">TOOLS </a></li>-->
</ul>
</div>

<!-- tab "panes" -->
<div class="panes">
	<div id="containerdount"  class="tab1" style="padding-top:30px;">
   <form action="<?php echo WEB_URL.'b2b/agent_edit_profile'; ?>" method="post"  name="reg" enctype="multipart/form-data">
    <table width="100%" border="0" cellspacing="7" cellpadding="7">
  <tr>
    <td width="28%">Agent Name </td>
    <td width="4%">:</td>
    <td width="68%"><input class="agent_text_cover_txt_feil" name="name" type="text" value="<?php if (set_value('name') != null) { echo set_value('name');} else { echo $result->name; } ?>" /><div style="color:#FF0000;"> <?php echo form_error('name');?></div><span style=" float:right"><a  href="<?php echo WEB_URL; ?>b2b/password_change" ><img src="<?php echo WEB_DIR ?>images/c-password-but.png"  /></a></span></td>
  </tr>
  <tr>
    <td>Company / Agency Name</td>
    <td>:</td>
    <td><input class="agent_text_cover_txt_feil" name="company_name" type="text" value="<?php if (set_value('company_name') != null) { echo set_value('company_name');} else { echo $result->company_name; } ?>" /><div style="color:#FF0000;"> <?php echo form_error('company_name');?></div> <span style=" float:right"><?php if(isset($result->agent_logo)) { ?><img src="<?php echo WEB_DIR ?>agent_logos/<?php echo $result->agent_logo; ?>" width="100" height="80" border="0" /><?php } ?></span></td>
  </tr>
  <tr>
    <td>Address</td>
    <td>:</td>
    <td><input class="agent_text_cover_txt_feil" name="address" type="text" value="<?php if (set_value('address') != null) { echo set_value('address');} else { echo $result->address; } ?>" />
						<div style="color:#FF0000;"> <?php echo form_error('address');?></div></td>
  </tr>
  <tr>
    <td>Country </td>
    <td>:</td>
    <td><input class="agent_text_cover_txt_feil" name="country" type="text" value="<?php if (set_value('country') != null) { echo set_value('country');} else { echo $result->country; } ?>" />
						<div style="color:#FF0000;"> <?php echo form_error('country');?></div></td>
  </tr>
  <tr>
    <td>City </td>
    <td>:</td>
    <td><input class="agent_text_cover_txt_feil" name="city" type="text" value="<?php if (set_value('city') != null) { echo set_value('city');} else { echo $result->city; } ?>" />
						<div style="color:#FF0000;"> <?php echo form_error('city');?></div></td>
  </tr>
   <tr>
    <td>Zipcode</td>
    <td>:</td>
    <td><input class="agent_text_cover_txt_feil" name="postal_code" type="text" value="<?php if (set_value('postal_code') != null) { echo set_value('postal_code');} else { echo $result->postal_code; } ?>" /> 
						<div style="color:#FF0000;"> <?php echo form_error('postal_code');?></div></td>
  </tr>
   <tr>
    <td>Email </td>
    <td>:</td>
    <td><input class="agent_text_cover_txt_feil" name="email_id" type="text" value="<?php if (set_value('email_id') != null) { echo set_value('email_id');} else { echo $result->email_id; } ?>" />
						<div style="color:#FF0000;"> <?php echo form_error('email_id');?></div></td>
  </tr>
   <tr>
    <td>Office Phone</td>
    <td>:</td>
    <td><input class="agent_text_cover_txt_feil" name="office_phone" type="text" value="<?php if (set_value('office_phone') != null) { echo set_value('office_phone');} else { echo $result->office_phone; } ?>" />
						<div style="color:#FF0000;"> <?php echo form_error('office_phone');?></div></td>
  </tr>
   <tr>
    <td>Mobile Phone</td>
    <td>:</td>
    <td><input class="agent_text_cover_txt_feil" name="mobile" type="text" value="<?php if (set_value('mobile') != null) { echo set_value('mobile');} else { echo $result->mobile; } ?>"  />
						<div style="color:#FF0000;"> <?php echo form_error('mobile');?></div></td>
  </tr>
  
  <tr>
    <td>Agent Logo</td>
    <td>:</td>
    <td><input name="agent_logo" type="file" class="b2b-txtboxagent_text_cover_txt_feilreg" /></td>
  </tr>
  
  <tr>
  <td>&nbsp;</td><td>&nbsp;</td><td><input type="image" src="<?php echo WEB_DIR ?>images/save-but.png"  /></td>
  
</table>

    	
</form>
    
  </div>
  
  <div id="containerdount"><form action="<?php echo WEB_URL.'b2b/markup_manage'; ?>" method="post"  name="reg" >
		<table width="920" border="0" align="left" cellpadding="0" cellspacing="0" style="margin:85px 0 0 15px; border:1px solid #ccc;">

  <tr>
    <td width="164" colspan="2" align="left" valign="top" class="my_profile_name_ex_tab">Markup (%) :</td><tr>
    <tr><td width="75" align="left" valign="top" class="my_profile_name_ex_tab_whit"><input type="text"  class="agent_text_cover_txt_feil"  name="mark_up" value="<?php echo $agent_markup->markup; ?>" />
</td>
    <td width="679" align="left" valign="top" class="my_profile_name_ex_tab_whit"><input type="image" src="<?php echo WEB_DIR ?>images/save_btn.jpg" width="70" height="35" /></td>
  
  </tr>

  
</table>
       
			 </form></div>
<div id="containerdount">

		<?php /*?><form action="<?php echo WEB_URL.'b2b/branch_manage'; ?>" method="post"  name="reg" >
		<input type="text" name="txt_search" id="txt_search" value="<?php if (isset($txt_search)) echo $txt_search; ?>">
		<input type="submit" name='btn_search' id='btn_search' value="Search">
		</form><?php */?>
         <table width="920" border="0" align="left" cellpadding="0" cellspacing="0" style="margin:40px 0 0 15px; ">
  <tr><td colspan="7" align="right"><a href="<?php echo WEB_URL; ?>b2b/add_branch"><img src="<?php echo WEB_DIR ?>images/addnew-but.png" width="109" height="35" /></a></td></tr></table>
        <table width="920" border="0" align="left" cellpadding="0" cellspacing="0" style="margin:10px 0 0 15px; border:1px solid #ccc;">
 
  <tr>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Branch</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Address</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">city</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Email-ID</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Phone Number</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Status</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Action</td>
  
  </tr>
  <?php
  if($result_branch!='')
  {

  for($i=0;$i<count($result_branch);$i++)
  {
  ?>
  <tr>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $result_branch[$i]->branch_name; ?></td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $result_branch[$i]->address; ?></td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $result_branch[$i]->city; ?> 	</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $result_branch[$i]->branch_email; ?> </td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $result_branch[$i]->telephone; ?> </td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $result_branch[$i]->status_str; ?> </td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><a href="<?php echo WEB_URL . 'b2b/edit_branch/'.$result_branch[$i]->branch_id; ?>">Edit</a> | <a href="#" onclick='deleteConform(<?php echo $result_branch[$i]->branch_id; ?>);'>Delete</a> </td>
    
    
  </tr>
  <?php
  }
  }
  else
  {
	  ?> <td align="center" valign="top" colspan="7" class="my_profile_name_ex_tab_whit_ex">No Result Found... </td>
      <?php
  }
  ?>
  
</table>
		
		
			
			

      </div>
      
      <div id="containerdount">

		<?php /*?><form action="<?php echo WEB_URL.'b2b/branch_manage'; ?>" method="post"  name="reg" >
		<input type="text" name="txt_search" id="txt_search" value="<?php if (isset($txt_search)) echo $txt_search; ?>">
		<input type="submit" name='btn_search' id='btn_search' value="Search">
		</form><?php */?>
         <table width="920" border="0" align="left" cellpadding="0" cellspacing="0" style="margin:40px 0 0 15px; ">
  <tr><td colspan="7" align="right"><a href="<?php echo WEB_URL; ?>b2b/add_staff"><img src="<?php echo WEB_DIR ?>images/addnew-but.png" width="109" height="35" /></a></td></tr></table>
        <table width="920" border="0" align="left" cellpadding="0" cellspacing="0" style="margin:10px 0 0 15px; border:1px solid #ccc;">
 
  <tr>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Name</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Email Address</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Branch</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Status</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Action</td>

  
  </tr>
  <?php
  if($result_staff!='')
  {

  for($i=0;$i<count($result_staff);$i++)
  {
  ?>
  <tr>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $result_staff[$i]->name; ?></td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $result_staff[$i]->email_id; ?></td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $result_staff[$i]->branch_name; ?> 	</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $result_staff[$i]->status_str; ?> </td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><a href="<?php echo WEB_URL . 'b2b/edit_staff/'.$result_staff[$i]->staff_id; ?>">Edit</a> | <a href="#" onclick='deleteConform_staff(<?php echo $result_staff[$i]->staff_id; ?>);'>Delete</a></td>

    
    
  </tr>
  <?php
  }
  }
  else
  {
	  ?> <td align="center" valign="top" colspan="5" class="my_profile_name_ex_tab_whit_ex">No Result Found... </td>
      <?php
  }
  ?>
  
</table>
		
		
			
			

      </div>

<div id="containerdount">
<table width="920" border="0" align="left" cellpadding="0" cellspacing="0" style="margin:40px 0 0 15px; ">
  <tr><td colspan="7" align="right"><a href="<?php echo WEB_URL; ?>b2b/add_branch_deposit"><img src="<?php echo WEB_DIR ?>images/addnew-but.png" width="109" height="35" /></a></td></tr></table>
  <table width="920" border="0" align="left" cellpadding="0" cellspacing="0" style="margin:10px 0 0 15px; border:1px solid #ccc;">

  <tr>
  <td width="164" align="left" valign="top" class="my_profile_name_ex_tab">No</td>
    <td width="164" align="left" valign="top" class="my_profile_name_ex_tab">Branch Name</td>
    <td width="164" align="left" valign="top" class="my_profile_name_ex_tab">Amount (USD)</td>
    <td width="164" align="left" valign="top" class="my_profile_name_ex_tab">Deposit_date</td><tr>
     <?php
  if($result_deposit!='')
  {

  for($i=0;$i<count($result_deposit);$i++)
  {
  ?>
  <tr>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $i+1; ?></td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $result_deposit[$i]->branch_name; ?></td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $result_deposit[$i]->amount; ?> 	</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $result_deposit[$i]->deposit_date; ?> </td>
   
    
    
  </tr>
  <?php
  }
  }
  else
  {
	  ?> <td align="center" valign="top" colspan="4" class="my_profile_name_ex_tab_whit_ex">No Result Found... </td>
      <?php
  }
  ?>

  
</table></div>
<div id="containerdount">
<table width="920" border="0" align="left" cellpadding="0" cellspacing="0" style="margin:40px 0 0 15px; ">
  <tr><td colspan="7" align="right"><a href="<?php echo WEB_URL; ?>b2b/add_agent_deposit_request"><img src="<?php echo WEB_DIR ?>images/addnew-but.png" width="109" height="35" /></a></td></tr></table>
  <table width="920" border="0" align="left" cellpadding="0" cellspacing="0" style="margin:10px 0 0 15px; border:1px solid #ccc;">

  <tr>
  <td width="164" align="left" valign="top" class="my_profile_name_ex_tab">No</td>
    <td width="164" align="left" valign="top" class="my_profile_name_ex_tab">Bank Name</td>
    <td width="164" align="left" valign="top" class="my_profile_name_ex_tab">Deposit Date</td>
    <td width="164" align="left" valign="top" class="my_profile_name_ex_tab">Deposit Type</td>
    <td width="164" align="left" valign="top" class="my_profile_name_ex_tab">City</td>
    <td width="164" align="left" valign="top" class="my_profile_name_ex_tab">Remarks</td>
    <td width="164" align="left" valign="top" class="my_profile_name_ex_tab">Amount (USD)</td>
    <td width="164" align="left" valign="top" class="my_profile_name_ex_tab">Status</td>
    <tr>
     <?php
  if($result_deposit_req!='')
  {

  for($i=0;$i<count($result_deposit_req);$i++)
  {
  ?>
  <tr>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $i+1; ?></td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $result_deposit_req[$i]->bank; ?></td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $result_deposit_req[$i]->deposited_date; ?> 	</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $result_deposit_req[$i]->deposit_type; ?> </td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $result_deposit_req[$i]->city; ?> </td>
   
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $result_deposit_req[$i]->remarks; ?> </td>
   
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $result_deposit_req[$i]->amount_credit; ?> </td>
   
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $result_deposit_req[$i]->status; ?> </td>
   
    
    
  </tr>
  <?php
  }
  }
  else
  {
	  ?> <td align="center" valign="top" colspan="8" class="my_profile_name_ex_tab_whit_ex">No Result Found... </td>
      <?php
  }
  ?>

  
</table></div>
</div>


<!-- This JavaScript snippet activates those tabs -->
<script>

// perform JavaScript after the document is scriptable.
$(function() {
	// setup ul.tabs to work as tabs for each div directly under div.panes
	$("ul.tabs").tabs("div.panes > div");
});
</script>
</div>
                            
                    </div>
 

  </div>
  </div>
  
  
</div>
</div></div>
<div style="clear:both"></div>
<?php $this->load->view('b2b/footer'); ?>
</body>
</html>
 