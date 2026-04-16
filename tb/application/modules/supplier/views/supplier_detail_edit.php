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

<script type="text/javascript" src="<?php echo WEB_DIR; ?>gui/ajax/ajaxsbmt.js"></script>

<script type="text/javascript">
function MM_jumpMenu(targ,selObj,restore){ //v3.0
eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
if (restore) selObj.selectedIndex=0;
}

$(document).ready(function(){

$("input:radio[name=top_city]").click(function() {
var top_city = $(this).val();
$('#testinput').val(top_city);
});
return false;
});

</script>
</head>
<body>
<?php $this->load->view('header'); ?>
 
<div class="midlebody">
<div class="mainbody_signin">
<div>
<div id="navjam">
<div class="tabs_width">
</div>
</div>
<div class="hotelnames_signin" style="min-height:329px;">
<!--<div id="mybook-tit">Inventory Management</div>-->

<div class="" style="margin-top:20px;">            		
<!-- the tabs -->
<div id="navjam">
<div class="tabs_width">

</div>
</div>

<!-- tab "panes" -->
<div style="font-weight:normal; float:left; margin-left:20px; font-size:16px;">Profile</div>
<div class="panes">
  <div id="containerdount"  class="tab1" style="padding-top:10px;">
    
     <div style="float:right; height:25px;"><a href="<?php echo site_url('../../supplier')?>" style="color:#099;">Back</a></div>
    <div style="float:left; margin-left:20px;">
    <form action="<?php echo WEB_URL; ?>index/update_supplier_detail" method="post" enctype="multipart/form-data">
    <table width="100%" border="0" cellspacing="1" cellpadding="0">
        <tr>
            <td class="b2b-mid-txt">Contact Person *</td>	
            <td class="mid-txt"><input name="name" type="text" value="<?php if(isset($result[0]->name)) { echo $result[0]->name; } else { echo $name; }?>" class="b2b-txtbox-reg" />	
        <?php echo form_error('name');?></td>
        </tr>
        <tr>
            <td class="b2b-mid-txt">Company Name*</td>
            <td><input  name="company_name" type="text" value="<?php if(isset($result[0]->company_name)) { echo $result[0]->company_name; } else { echo $company_name; }?>" class="b2b-txtbox-reg" />
            <?php echo form_error('company_name');?></td>
        </tr>
        
        <tr>
            <td class="b2b-mid-txt">Email&nbsp;*</td>
            <td><input  name="email_id" type="text" value="<?php if(isset($result[0]->email_id)) { echo $result[0]->email_id; } else { echo $email_id; }?>" class="b2b-txtbox-reg" />
            <?php echo form_error('email_id');?></td>
        </tr>
        
        <tr>
            <td class="b2b-mid-txt">Password&nbsp;*</td>
            <td><input  name="password" type="password" value="<?php if(isset($result[0]->password)) { echo $result[0]->password; } else { echo $password; }?>" class="b2b-txtbox-reg" />
            <?php echo form_error('password');?></td>
        </tr>
                    
        <tr>
            <td class="b2b-mid-txt">Address *</td>
            <td><textarea  cols="" rows="" name="address" style="min-height:70px; width:257px; font-size:12px;"><?php if(isset($result[0]->address)) { echo $result[0]->address; }  else { echo $address; }?></textarea>
            <?php echo form_error('address');?></td>
        </tr>
        
        <tr>
            <td class="b2b-mid-txt">Country</td>
            <td><select name="country"  class="b2b-txtbox-lis-reg">
            <option value="">Select Country</option>
            <?php
            $country = $this->Supplier_Model->country_list();
            
            for($iii=0;$iii<count($country);$iii++)
            {
            ?>
            <option  value="<?php  echo $country[$iii]->name;  ?>"  <?php if(isset($result[0]->country) && $country[$iii]->name == $result[0]->country){ echo "selected='selected'"; } ?>><?php  echo $country[$iii]->name;  ?></option>
            <?php	
            }
            ?>
            </select>
            <?php echo form_error('country');?></td>
        </tr>
        <tr>
            <td class="b2b-mid-txt">City *</td>
            <td><input  name="city" type="text" value="<?php if( isset($result[0]-> city)) { echo $result[0]-> city; } else { echo $city; }?>"   class="b2b-txtbox-reg" />
            <?php echo form_error('city');?></td>
        </tr>
        <tr>
            <td class="b2b-mid-txt">Pin Code *</td>
            <td><input  name="postal_code" type="text" value="<?php if( isset($result[0]-> postal_code)) { echo $result[0]-> postal_code; }else { echo $postal_code; } ?>"   class="b2b-txtbox-reg" />
            <?php echo form_error('postal_code');?></td>
        </tr>
        <tr>
            <td class="b2b-mid-txt">Office Phone</td>
            <td><input  name="office_phone" type="text" value="<?php if( isset($result[0]->office_phone)) { echo $result[0]->office_phone; } else { echo $office_phone; }?>"  class="b2b-txtbox-reg" />
            <?php echo form_error('office_phone');?></td>
        </tr>
        <tr>
            <td class="b2b-mid-txt">Mobile Phone *</td>
            <td><input name="mobile_no" type="text" value="<?php if( isset($result[0]->mobile)) { echo $result[0]->mobile; }else { echo $mobile_no; } ?>"  class="b2b-txtbox-reg" />
            <?php echo form_error('mobile_no');?></td>
        </tr>
        <tr>
            <td class="b2b-mid-txt">Currency Code *</td>
            <td>
            <?php  $currency = $this->Supplier_Model->get_currecy_detail(); ?>
            <select name="currency" id="currency" class="b2b-txtbox-lis-reg">
            <?php
            for($i=0;$i<count($currency);$i++){
            ?>
              <option value="<?php echo $currency[$i]->country; ?>" <?php if(isset($result[0]-> currency_type) && $currency[$i]->country == $result[0]->currency_type){ echo "selected='selected'"; } ?> ><?php echo $currency[$i]->country; ?></option>
            <?php	
            }
            ?>
            </select><?php echo form_error('currency');?>
            </td>
        </tr>
        
        <tr>
            <td class="b2b-mid-txt">Hotel Logo </td>
            <td><input name="hotel_logo" type="file" class="b2b-txtbox-reg" /></td>
        </tr>
        
    </table>
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin:20px;">
        <tr>
        	<td colspan="5" align="center"><input type="image" src="<?php echo WEB_DIR; ?>images/save-but.png"  /></td>
        </tr>
    </table>
    </form>
   </div>
   <?php if(isset($result[0]->hotel_logo) && $result[0]->hotel_logo!= '') { ?>
   <div style="float:left; margin-left:50px;">
   <img src="<?php echo WEB_DIR ?>supplier_logos/<?php echo $result[0]->hotel_logo; ?>" width="240" height="140" border="0" />
   </div>
   <?php } ?>
  </div>
</div> 
    
    
    
    
    
    
    

<!-- This JavaScript snippet activates those tabs -->
<!--<script>
$(function() {
$("ul.tabs").tabs("div.panes > div");
});
</script>-->
</div>
    
</div>
</div>
</div>
</div>
</div></div>
<div style="clear:both"></div>
<?php $this->load->view('footer'); ?>
</body>
</html>

 <style>
.b2b-AGE_OF2{ width:97px; float: left; color:#fff; font-family:MAIAN; padding:0 0 8px; margin:12px -7px 0 0; color:#000; font-size:12px;}

.check_149{ width:144px; float:right; margin:0 13px 3PX 0; position:relative; left:34px}
</style>