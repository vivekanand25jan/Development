<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Console</title>
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
                      <script src="<?php echo WEB_DIR ?>jquery.js"></script>
                      
                      <script language="javascript1.5" type="text/javascript">
				function hotel_fac_sorting()
		{
		
		var sd =document.search.datepicker.value;
		var ed =document.search.datepicker1.value;
		var bookno =document.search.bookno.value;
			var status =document.search.status.value;
		
		$("#result").empty().html('<div style="padding-left:400px" align="middle"><img src=\'<?php print WEB_DIR ?>images/ajax-loader(2).gif\'></div>');
		  $("#result").load("<?php print WEB_URL ?>account/booking_search/"+sd+"/"+ed+"/"+bookno+"/"+status);
		
		       return false;
                      // For first time page load default results
                         
		 
		}
		
		</script>
        <script type="text/javascript" src="<?php echo WEB_DIR; ?>js/jquery1.3.2.js"> </script>

        <script type="text/javascript">

function isExp(data)
	{
	var numStr="1234567890.+-";
	var thisChar;
	var counter=0;
	for(var i=0; i < data.length; i++)
		{
			thisChar=data.substring(i,i+1);
			if(numStr.indexOf(thisChar)!=-1)
			{counter++;}
		}
		if(counter==data.length)
		{return true;}
		else
		return false;
	}
	
function validate_form()
{

 if(document.getElementById('fname').value=='')
	{
		alert("Please Enter You First Name");
		document.getElementById('fname').focus();
		return false;
	
	} 
	

 if(document.getElementById('lname').value=='')
	{
		alert("Please Enter You Last Name");
		document.getElementById('lname').focus();
		return false;
	
	} 
	


	if(document.frmname.email.value=="" || document.frmname.email.value.length==0)
	{
		alert ("Enter the Email");
		document.frmname.email.focus();
		return false;
	}
	else				
		{
		var str=document.frmname.email.value
		var filter=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i
		if (filter.test(str))
		{
		//	return true;
		}	
		else
		{
			alert(str +" is an invalid e-mail address!")
			document.frmname.email.focus();
			document.frmname.email.select();
			return false;
		}	
	}	
	
	 if(document.getElementById('password').value=='')
	{
		alert("Please Enter Password");
		document.getElementById('fname').focus();
		return false;
	
	} 
	
	 if(document.frmname.mobile.value=="" || document.frmname.mobile.value.length==0)
	{
		alert ("Enter the Contact No");
		document.frmname.mobile.focus();
		return false;
	}	
	
 if (isExp(document.frmname.mobile.value)==false)
	{
	alert("Enter the value in numeric"); 
	document.frmname.mobile.focus();
	return false;
	}
	
	

	return true
	
	
}
function chel_user(val){

	if(val=='marketing'){
		
		<?php
		
		$id=$this->admin_model->get_max_market_id();
		$id=$id+1;
		
			if($id > 999)
			{
			$uniquily_id="MAR".$id;
			}
			else{
			
			$uniquily_id="MAR"."000".$id;
			}
		
		
		
		?>
		var demo ="<?php echo $uniquily_id;?>";
		//alert(demo);
		document.getElementById('user_id').value=demo
		document.getElementById('uid').style.display='block';
			document.getElementById('pid').style.display='block';
		document.getElementById('aid').style.display='none'
		document.getElementById('did').style.display='none'
		
		
				
	}
	
	if(val=='accounts'){
		
		<?php
		
		$id=$this->admin_model->get_max_market_id();
		
		$idd=$id+1;
		
			if($idd > 999)
			{
			$uniquily_id="AA".$idd;
			}
			else{
			
			$uniquily_id="AA"."000".$idd;
			}
		
		
		
		?>
		var demo ="<?php echo $uniquily_id;?>";
		//alert(demo);
		document.getElementById('user_id').value=demo
		document.getElementById('uid').style.display='block';
		document.getElementById('pid').style.display='block';
		document.getElementById('aid').style.display='none'
		document.getElementById('did').style.display='none'
		
		
				
	}
	if(val=='callcentre'){
		
		
		
			<?php
		
		$id=$this->admin_model->get_max_market_id();
			$idd=$id+1;
		
			if($idd > 999)
			{
			$uniquily_id="CC".$idd;
			}
			else{
			
			$uniquily_id="CC"."000".$idd;
			}
		
		
		
		?>
		var demo ="<?php echo $uniquily_id;?>";
		//alert(demo);
		document.getElementById('user_id').value=demo
		document.getElementById('aid').style.display='block';
		document.getElementById('pid').style.display='block';
		document.getElementById('uid').style.display='block'
		document.getElementById('did').style.display='block'
				
	}
	
	
}
function Sort_val(val){

//window.location.href="<?php print WEB_URL ?>admin/view_sub_admin_details/"+val

}
</script>
                     <div id="navjam">
<ul class="tabs" style="position:relative; top:-4px; left:-3px; border-bottom:none">
	<li><a href="javascript:void(0)" style="border-radius:8px 0 0 0">New SubAdmin Registration</a></li>
	

   <!-- <li><a href="#">MY TRAVELERS</a></li>
     <li><a href="#">BILLING INFO</a></li>
          <li><a href="#">CREDIT POINTS</a></li>
               <li><a href="#">TOOLS </a></li>-->
</ul>
</div>
<span style="float:right; cursor:pointer; font-size:12px; padding:5px;color:#069;"><A HREF="<?php echo WEB_URL; ?>index/dashboard"> Go Back</A></span> 
<!-- tab "panes" -->
<div class="panes" style="padding-bottom:10px">
	<div id="containerdount" class="admin-innerbox">
    	
<form action="<?php echo WEB_URL; ?>index/sub_admin_registration_page" method="post" name="profile">     
<div class="tab_right_section">
<?php
if(isset($exist))
{
echo $exist;
}
?>
		<table width="300" border="0" align="left" cellpadding="0" cellspacing="0" style="margin:20px 0 0 0;">
  <tr>
    <td align="left" valign="top" class="my_profile_name">Personal Information:</td>
  </tr>
  <tr>
    <td align="left" valign="top">Email ID <br /><input name="email" value="" class="ma_pro_txt"  type="text" /></td>
  </tr>
  <tr>
    <td align="right" valign="top" style="padding:15px 34px 15PX 0;"></td>
  </tr>
  
  <tr>
    <td align="right" valign="top" style="padding:15px 34px 15PX 0;"></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name"></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="account_font_pos_r">
      First Name
    </td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name"><input name="fname" type="text" class="ma_pro_txt"  /></td>
  </tr>
   <tr>
    <td align="left" valign="top" class="account_font_pos_r">
      Last Name
    </td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name"><input name="lname" type="text" class="ma_pro_txt"  /></td>
  </tr>
   <tr>
    <td align="left" valign="top" class="account_font_pos_r">
    Mobile Phone Number
    </td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name"><input name="mo_no" type="text"  class="ma_pro_txt"  /></td>
  </tr>
  
  <tr>
    <td align="left" valign="top" class="my_profile_name"></td>
  </tr>
</table>

</div>
<div class="tab_right_section"><table width="300" border="0" align="left" cellpadding="0" cellspacing="0" style="margin:20px 0 0 0;">
  <tr>
    <td align="left" valign="top" class="my_profile_name">Contact Information: </td>
  </tr>
   <tr>
    <td align="left" valign="top" class="account_font_pos_r">
   Phone Number
    </td>
  </tr>
  <tr>
   <td align="left" valign="top" class="my_profile_name"><input name="ph_no" type="text"  class="ma_pro_txt" /></td>
  </tr>
   <tr>
    <td align="left" valign="top" class="account_font_pos_r">
    Adddress
    </td>
  </tr>
  <tr>
   <td align="left" valign="top" class="my_profile_name"><input name="address" type="text"  class="ma_pro_txt"  /></td>
  </tr>
   <tr>
    <td align="left" valign="top" class="account_font_pos_r">
    City
    </td>
  </tr>
  <tr>
   <td align="left" valign="top" class="my_profile_name"><input name="city" type="text"   class="ma_pro_txt"  /></td>
  </tr>
   <tr>
    <td align="left" valign="top" class="account_font_pos_r">
     Country
    </td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name"><input name="country" type="text"   class="ma_pro_txt" /></td>
  </tr>
   <tr>
    <td align="left" valign="top" class="account_font_pos_r">
   Postal Code
    </td>
  </tr>
  <tr>
   <td align="left" valign="top" class="my_profile_name"><input name="post_code" type="text"   class="ma_pro_txt"  /></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name"><!--<input name="" class="ma_pro_txt" type="text" />--></td>
  </tr>
</table></div>
<div class="tab_right_second">
		<table width="300" border="0" align="left" cellpadding="0" cellspacing="0" style="margin:20px 0 0 0;">
  <tr>
    <td align="left" valign="top" class="my_profile_name">Call Center </td>
  </tr>
   <tr>
    <td align="left" valign="top" class="account_font_pos_r">
     Type:<br />
 <select name="type" id="type" class="ma_pro_txt" onchange="return chel_user(this.value)">
        <option value="">--- Select Type ---</option>
        <option value="callcentre"  class="flip">CallCentre</option>
  
        <option value="accounts" class="flip3">Accounts</option>
    </select>
    </td>
  </tr>
  

  
   <tr>
    <td align="left" valign="top" class="account_font_pos_r">
     
    
    <div class="user_fld-out" id="uid" style="display:none" >
    <div class="user_fld_txt">User Id:</div>
    <div class="userr_fld_box"><input name="userid" id="user_id" value="" class="ma_pro_txt" type="text" readonly="readonly" />
    <span style="color:#F00"></span>
    </div>
    </div>
  <div class="user_fld-out" id="pid" style="display:none" >
    <div class="user_fld_txt">Password :</div>
    <div class="userr_fld_box"><input name="password" id="password"  value="<?php if (isset($this->validation->password)) { print $this->validation->password; }?>" class="ma_pro_txt" type="password"/>
    <span style="color:#F00"><?php
	if (isset($this->validation->password_error)) echo $this->validation->password_error; 
	?></span>
    </div>
    </div>
  <div class="user_fld-out" id="aid" style="display:none">
    <div class="user_fld_txt"></div>
    <div class="userr_fld_box">
   
    <span style="color:#F00"></span>
    </div>
    </div>
    
    <div class="user_fld-out" id="did" style="display:none">
    <div class="user_fld_txt">Daily Credit Limit:</div>
    <div class="userr_fld_box"><input name="limit"  class="ma_pro_txt"value=""  type="text" />USD
    <span style="color:#F00"></span>
    </div>
    </div>
    </td>
  </tr>
  
   
  <tr>
   <td align="left" valign="top" class="my_profile_name">&nbsp;</td>
  </tr>
   <tr>
    <td align="left" valign="top" class="account_font_pos_r">&nbsp;</td>
  </tr>
  <tr>
   <td align="left" valign="top" class="my_profile_name">&nbsp;</td>
  </tr>
 
  <tr>
   <td align="left" valign="top" class="my_profile_name"></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name"><!--<input name="" class="ma_pro_txt" type="text" />--></td>
  </tr>
</table>

</div>
<div class="wi_for_cancel">
			<table width="900" border="0" align="left" cellpadding="0" cellspacing="0" style="margin:0 0 25px 0;">
  <tr>
    <td align="left" valign="top">
    
    		<table width="350" border="0" align="left" cellpadding="0" cellspacing="0">
  <tr>
    <td style="padding:5px 0 0 0; color:#14a3e7;">
  

  </td>
  </tr>
  
</table>

    </td>
    <td align="left" valign="top"><table width="250" border="0" align="right" cellpadding="0" cellspacing="0">
  <tr>
    <td><input type="image" src="<?php echo WEB_DIR ?>images/sub_mint_btn_admin.png"  /></td>
    <td><a href="#"></a></td>
  </tr>
</table>
</td>
  </tr>
</table>

</div>
</form>
    
  </div>
  
    
    
 
  
  
<div id="containerdount">3</div>
<div id="containerdount">4</div>
<div id="containerdount">5</div>
<div id="containerdount">6</div>
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
