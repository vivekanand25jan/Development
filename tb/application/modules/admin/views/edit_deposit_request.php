<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="<?php echo WEB_DIR; ?>adminstyle.css" rel="stylesheet" type="text/css" />
<script src="<?php echo WEB_DIR ?>jquery.js"></script>
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
	<li><a href="javascript:void(0)" style="border-radius:8px 0 0 0">Deposit Request</a></li>
    <li style="float:right; cursor:pointer; font-size:12px; padding:5px;color:#069;"><A HREF="javascript:history.go(-1)"> Go Back</A></li>
	

   <!-- <li><a href="#">MY TRAVELERS</a></li>
     <li><a href="#">BILLING INFO</a></li>
          <li><a href="#">CREDIT POINTS</a></li>
               <li><a href="#">TOOLS </a></li>-->
</ul>
</div>

<!-- tab "panes" -->
<div class="panes" style="padding-bottom:10px">
	<div id="containerdount" class="admin-innerbox">
    	



<form action="<?php echo WEB_URL.'index/edit_deposit_request/'.$result->deposit_id;?>" method="post"  name="reg" >
<table border="0" cellspacing="0" cellpadding="5">
<tr><td class="pler"><b>Name</b></td>
<td class="pler">:</td>

<td class="pler"><?php echo $result->name;?></td></tr>
<tr><td class="pler"><b>Email</b></td>
<td class="pler">:</td>
<td class="pler"><?php echo $result->email_id;?></td></tr>
<tr><td class="pler"><b>Amount</b> </td>
<td class="pler">:</td>
<td class="pler"><?php echo $result->amount_credit; ?></td></tr>
<tr><td class="pler"><b>Date</b></td>
<td class="pler">:</td><td class="pler"><?php echo $result->deposited_date; ?></td></tr>
<tr><td class="pler"><b>Mode</b></td>
<td class="pler">:</td><td class="pler"><?php echo $result->deposit_type; ?></td></tr>

<tr><td class="pler"><b>Status</b></td>
<td class="pler">:</td>
<td class="pler">

<select name="status">
<option value=''>Select Status</option>
<option value='Pending' <?php if ($result->status == 'Pending') echo 'selected'; ?>>Pending</option>
<option value='Accepted' <?php if ($result->status == 'Accepted') echo 'selected'; ?>>Accepted</option>
<option value='Declined' <?php if ($result->status == 'Declined') echo 'selected'; ?>>Declined</option>

</select>
<input type="hidden" name="amount_deposited" value="<?php echo $result->amount_credit; ?>">
<input type="hidden" name="agent_id" value="<?php echo $result->agent_id; ?>">
</td></tr>


<tr><td class="pler"></td>
<td class="pler">&nbsp;</td>
<td class="pler"><input type="image" src="<?php echo WEB_DIR ?>images/sub_mint_btn_admin.jpg" width="109" height="35" name='submit' value="Submit"></td></tr>

</table>

</form>

    
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
