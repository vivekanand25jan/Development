<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>StayAway.com</title>
<link href="<?php echo WEB_DIR; ?>css/style_sheet.css" rel="stylesheet" type="text/css" />
<link href="<?php echo WEB_DIR; ?>css/postion.css" rel="stylesheet" type="text/css" />

</head>
<body>
<?php $this->load->view('header'); ?>
<div class="midlebody">
  
    
    <div>
    <div class="hotelnames" style="min-height:329px; width: auto; border-radius:10px 10px 0 0;">
    
   		<!--<div class="right-hotel-name">Youngor Central Suzhou</div>-->
        <table width="975" border="0" cellspacing="0" cellpadding="0" class="r-hoteldeta">
        <form action="<?php echo WEB_URL.'index/user_login'; ?>" method="post"  name="login" >
        <?php
											if(isset($status)) {
											  echo $status;	
											  echo ' <div style="clear:both;"></div>';
												
											}
												?>
                                            
          <tr>
          	<td colspan="2"><table width="100%" border="0" cellpadding="0" cellspacing="0" style="margin-top:0px;">
              <tr>
                <td width="10"><img src="<?php echo WEB_DIR; ?>images/b2b-reg-top-left.png" border="0"  /></td>
                <td class="b2b-reg-cent-strip">
                	<table width="100%" border="0" cellpadding="0" cellspacing="0" style="font-size:15px; font-weight:bold; color:#FFF;">
                          <tr>
                            <td><font style=" font-size:25px; font-weight:normal; padding-left:8px;">Login Here - </font></td>
                            <td>Suppllier Login :</td>
                            <td><input  value="<?php if( isset($login_email)) echo $login_email; ?>"  name="login_email"  type="text" class="b2b-txtbox-reg" style="background-color:#fff; width:170px; padding-left:4px; border-color:#3e7ca4" />
                            											<div style="color:#FF0000;"> <?php echo form_error('login_email');?></div>
                                                                        </td>
                            <td>Password :</td>
                            <td><input  name="login_password" type="password" class="b2b-txtbox-reg" style="background-color:#fff; padding-left:4px; width:170px; border-color:#3e7ca4" /></td>
                            <td align="center"><input type="image" src="<?php echo WEB_DIR; ?>images/b2b-login-but.png" border="0"  /></td>
                          </tr>
                        </table>

                </td>
                <td width="10"><img src="<?php echo WEB_DIR; ?>images/b2b-reg-top-right.png" border="0"  /></td>
              </tr>
            </table>
            </td>
          </tr>	
          </form>
          <tr><td colspan="2">&nbsp;</td></tr>
        

        
          <tr>	
          	<td width="480" valign="top" style="border-right:2px dashed #989898;">
            					<form action="<?php echo WEB_URL.'index/registration_process'; ?>" method="post"  name="reg" >
            	<table width="480" align="center" border="0" cellpadding="4" cellspacing="2">
                    <tr>
                      <td colspan="2" class="right-hotel-name" style=" font-size:25px; font-weight:normal; color:#336699; padding-top:0px; padding-bottom:15px">New Supplier, Register Here</td>
                    </tr>
                   
                    <tr>
                      <td class="b2b-mid-txt">Agent Name *</td>	
                      <td class="mid-txt"><input name="name" type="text" value="<?php if( isset($name)) echo $name; ?>"  class="b2b-txtbox-reg" />	
<?php echo form_error('name');?></td>
                    </tr>

                     <tr>
                      <td class="b2b-mid-txt">Company&nbsp;/&nbsp;Agency Name&nbsp;*</td>
                      <td><input  name="company_name" type="text" value="<?php if( isset($company_name)) echo $company_name; ?>" class="b2b-txtbox-reg" />
                      <?php echo form_error('company_name');?></td>
                    </tr>

                    <tr>
                      <td class="b2b-mid-txt">Address *</td>
                      <td><textarea  cols="" rows="" name="address" value="<?php if( isset($address)) echo $address; ?>" class="b2b-txtbox-reg" style="min-height:70px; width:257px; font-size:12px;"></textarea>
                      <?php echo form_error('address');?></td>
                    </tr>

                     <tr>
                      <td class="b2b-mid-txt">Country</td>
                      <td><select  name="country"  value="<?php if( isset($country)) echo $country; ?>"  class="b2b-txtbox-lis-reg">
                      <option value="">Select Country</option>
                      <?php
                        $country = $this->Supplier_Model->country_list();
						
						 for($iii=0;$iii<count($country);$iii++)
		  					{
							?>
                            <option  value="<?php  echo $country[$iii]->name;  ?>"  ><?php  echo $country[$iii]->name;  ?></option>
                            <?php	
							}
                      ?>
                      </select>
                      <?php echo form_error('country');?></td>
                    </tr>

                     <tr>
                      <td class="b2b-mid-txt">City *</td>
                      <td><input  name="city" type="text" value="<?php if( isset($city)) echo $city; ?>"   class="b2b-txtbox-reg" />
                      <?php echo form_error('city');?></td>
                    </tr>

                    <tr>
                      <td class="b2b-mid-txt">Pin Code *</td>
                      <td><input  name="postal_code" type="text" value="<?php if( isset($postal_code)) echo $postal_code; ?>"   class="b2b-txtbox-reg" />
                      <?php echo form_error('postal_code');?></td>
                    </tr>

                     <tr>
                      <td class="b2b-mid-txt">Office Phone</td>
                      <td><input  name="office_phone" type="text" value="<?php if( isset($office_phone)) echo $office_phone; ?>"  class="b2b-txtbox-reg" />
                      <?php echo form_error('office_phone');?></td>
                    </tr>

                    <tr>
                      <td class="b2b-mid-txt">Mobile Phone *</td>
                      <td><input  name="mobile_no" type="text" value="<?php if( isset($mobile_no)) echo $mobile_no; ?>"  class="b2b-txtbox-reg" />
                      <?php echo form_error('mobile_no');?></td>
                    </tr>

                     <tr>
                      <td class="b2b-mid-txt">Currency Code *</td>
                      <td><select name="currency" class="b2b-txtbox-lis-reg">
                      <option value="USD">USD</option>
                      <?php
					  $currency = $this->Supplier_Model->get_currecy_detail();
					  for($i=0;$i< count($currency);$i++)
					  {
						  echo '<option value="'.$currency[$i]->country.'">'.$currency[$i]->country.'</option>>';
					  }
					  ?>
                      </select>
                      <?php echo form_error('currency');?></td>
                    </tr>

                    <tr>
                      <td colspan="2">&nbsp;</td>
                    </tr>
                    <tr>
                      <td class="right-hotel-name" colspan="2" style=" font-size:25px; font-weight:normal; color:#336699; padding-top:0px; padding-bottom:15px">Login Information</td>
                    </tr>
                    <tr>
                      <td class="b2b-mid-txt">Email *</td>
                      <td><input  name="email" type="text" value="<?php if( isset($email)) echo $email; ?>" class="b2b-txtbox-reg" />
                       <?php echo form_error('email');?></td>
                    </tr>

                    <tr>
                      <td class="b2b-mid-txt">Password * </td>
                      <td><input name="password" type="password"  class="b2b-txtbox-reg" />
                      <div style="color:#FF0000;"> <?php echo form_error('password');?></div></td>
                    </tr>

                     <tr>
                      <td class="b2b-mid-txt">Confirm Password *</td>
                      <td><input name="comform_password" type="password"   class="b2b-txtbox-reg" /><div style="color:#FF0000;"> <?php echo form_error('comform_password');?></div></td>
                    </tr>
					<tr>
                      <td>&nbsp;</td>
                      <td><input  name="terms" type="checkbox" id="checkbox" />&nbsp;Agent Terms & Condition
                      							<div style="color:#FF0000;"> <?php echo form_error('terms');?></div></td>
                    </tr>
                    <tr>
                      <td colspan="2">&nbsp;</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td><input type="image" src="<?php echo WEB_DIR; ?>images/b2b-register.png" border="0" /></td>
                    </tr>

                  </table>
                  </form>
            </td>
            <td width="434" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
            
            
            
            					<tr>
                                  <td align="center"><table align="center" width="421" border="0" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td width="421">
                                       <div style="border:1px #ffbd73 solid; line-height:32px; border-radius:10px; margin-top:0px;">
                                      	<div><img src="<?php echo WEB_DIR; ?>images/b2b-whyreg-img.png" border="0" style="position:relative; top:-2px;" /></div>
                                        <div style="width:400px; margin:0 auto; padding:10px 0 10px 0">
                                        	<div class="right-hotel-name" style="font-size:17px; color:#336699; padding-top:0px; padding-bottom:15px">Benenfits include:</div>
                                            <div><span><img src="<?php echo WEB_DIR; ?>images/b2b-whyreg-icon.jpg" border="0" style="position:relative; top:0px; padding-right:8px" /></span>Single and user friendly platform for selling hotels,transfers <br />
<span style="padding-left:20px">and sightseeing</span></div>
                                             <div><span><img src="<?php echo WEB_DIR; ?>images/b2b-whyreg-icon.jpg" border="0" style="position:relative; top:0px; padding-right:8px" /></span>Avail the loginwith Credit/Deposit Accounts</div>
                                             <div><span><img src="<?php echo WEB_DIR; ?>images/b2b-whyreg-icon.jpg" border="0" style="position:relative; top:0px; padding-right:8px" /></span>Best Commission on all travel products</div>
                                             <div><span><img src="<?php echo WEB_DIR; ?>images/b2b-whyreg-icon.jpg" border="0" style="position:relative; top:0px; padding-right:8px" /></span>Access to over 1,00,000+hotels across the globe</div>
                                             <div><span><img src="<?php echo WEB_DIR; ?>images/b2b-whyreg-icon.jpg" border="0" style="position:relative; top:0px; padding-right:8px" /></span>View Commissionable and Net Rate with search result</div>
                                             <div><span><img src="<?php echo WEB_DIR; ?>images/b2b-whyreg-icon.jpg" border="0" style="position:relative; top:0px; padding-right:8px" /></span>Instant invoicing</div>
                                             <div><span><img src="<?php echo WEB_DIR; ?>images/b2b-whyreg-icon.jpg" border="0" style="position:relative; top:0px; padding-right:8px" /></span>Online Cancellation</div>
                                             <div><span><img src="<?php echo WEB_DIR; ?>images/b2b-whyreg-icon.jpg" border="0" style="position:relative; top:0px; padding-right:8px" /></span>Online branch and user management facility</div>
                                             <div><span><img src="<?php echo WEB_DIR; ?>images/b2b-whyreg-icon.jpg" border="0" style="position:relative; top:0px; padding-right:8px" /></span>Dedicated Customer Support</div>
                                            
                                           
                                        </div>
                                       </div> 
                                        </td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                    </tr>
                                  </table>
                                  </td>
                                </tr>
            					
                                <tr>
                                  <td align="center"><img src="<?php echo WEB_DIR; ?>images/b2b-map-img.jpg" border="0"  /></td>
                                </tr>
                              </table>
                              </td>
          </tr>
          
          <tr><td colspan="2">&nbsp;</td></tr>
        </table>
        <div style="clear:both"></div>
      
    </div>
 

  </div>
    
    
</div><div style="clear:both"></div>
<?php $this->load->view('footer'); ?>
</body>
</html>
 