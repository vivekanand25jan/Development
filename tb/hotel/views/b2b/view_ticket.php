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
<style>

</style>

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
</head>
<body>
<?php $this->load->view('b2b/header'); ?>
<div class="midlebody">

    <div class="mainbody_signin">
   
    <div>
    <div class="hotelnames_signin" style="min-height:329px;">
    
   		<!--<div class="right-hotel-name">Youngor Central Suzhou</div>--><div id="mybook-tit">View Ticket</div>
   
        <div class="">            		
<!-- the tabs -->


<!-- tab "panes" -->
<div class="panes">
	
  <div id="containerdount"  class="tab1" style="padding-top:30px;">
   
    		<form action="<?php echo WEB_URL.'b2b/update_ticket'; ?>" method="post"  name="reg" >
            <input type="hidden" name="agent_id" value="<?php echo $agent_list->agent_id; ?>" />
            <input type="hidden" name="ticket_id" value="<?php echo $agent_list->ticket_id; ?>" />
    <table width="100%" border="0" cellspacing="7" cellpadding="7">
  <tr>
    <td width="28%">Agent Name </td>
    <td width="4%">:</td>
    <td width="68%"><?php echo $agent_list->name; ?></td>
  </tr>
  <tr>
    <td>Company / Agency Name</td>
    <td>:</td>
    <td><?php echo $agent_list->company_name; ?></td>
  </tr>
 
  <tr>
    <td>Reservation No </td>
    <td>:</td>
    <td><?php 
	if($agent_list->res_no != '')
	{
	$view =  $this->B2b_Model->transation_detail_new($agent_list->res_no); 
	echo $view->booking_number.' ( '.$view->prn_no.' ) '; 
	}
	else
	{
		echo '-';
	}
	?>
						</td>
  </tr>
  <?php
  if($agent_list->res_no != '')
	{
		?>
  <tr>
    <td>Reservation Status </td>
    <td>:</td>
    <td><?php echo $view->status;
	?> 
						</td>
  </tr>
  <?php
	}
	?>
   <tr>
    <td>Category </td>
    <td>:</td>
    <td><?php echo $agent_list->catacery; ?>
						</td>
  </tr>
   <tr>
    <td>Subject </td>
    <td>:</td>
    <td><?php echo $agent_list->subject; ?>
						</td>
  </tr>
  <tr>
    <td>Status </td>
    <td>:</td>
    <td><?php echo $agent_list->status; ?>
						</td>
  </tr>
  
  <tr>
   <td></td>
    <td></td>
    <td>
        <table width="100%"  cellpadding="4"     cellspacing="4">
    <?php
	if($message != '' )
	{
		for($k=0; $k<count($message); $k++)
	{
	?>

    <?php 
	if($message[$k]->process == 'Agent')
	{
	echo '<tr style=" background-color:#A8FFFF" >';
	}
	elseif($message[$k]->process == 'Admin')
	{
		echo ' <tr  style=" background-color:#FEEBCF" >';
	}
	elseif($message[$k]->process == 'Call Center')
	{
		echo ' <tr  style=" background-color:#CCCCFF" >';
	}
	?>
   <td width="16%"><?php echo $message[$k]->process.' Says'; ?></td> <td width="2%" >:</td><td width="82%" ><?php echo $message[$k]->message; ?></td></tr>
    <?php
	}
	if($agent_list->order == 0)
	{
	?>
     <tr><td style=" background-color:#FEF0D6">
    Answer	
    </td><td  style=" background-color:#FEF0D6">:</td><td style=" background-color:#FEF0D6"><textarea name="message" cols="50" rows="8"></textarea></td></tr>
    
    <?php
	}
	}
	?></table>
						</td>
  </tr>
  
  <?php
  
   
   if($agent_list->order == 0)
	{
   
  ?> 
  <tr>
  <td>&nbsp;</td><td>&nbsp;</td><td><input type="image" src="<?php echo WEB_DIR ?>images/save-but.png"  /></td>
  <?php
	}
	?>
</table>

    	
</form>

    
  </div>
 
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
 