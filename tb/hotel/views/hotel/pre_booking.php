<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="<?php echo WEB_DIR; ?>css/style_sheet.css" rel="stylesheet" type="text/css" />
<link href="<?php echo WEB_DIR; ?>css/postion.css" rel="stylesheet" type="text/css" />

</head>
<body>
<?php $this->load->view('header'); ?>
<div class="midlebody">
  <div class="lhsside">
  <div class="serachbar1">
  
  	<div class="mid-txt" style="color:#fff; padding-top:10px; margin-top:10px; text-align:center">
    <span style="font-size:30px;">You</span> are searching</div>
 		<div class="left-topbox">
        	<div><img src="<?php echo WEB_DIR; ?>images/bang-icon.jpg" border="0" style="position:relative; top:4px; padding-right:6px;" /><?php echo $_SESSION['city']; ?></div>
            <div><img src="<?php echo WEB_DIR; ?>images/bang-icon1.jpg" border="0" style="position:relative; top:4px; padding-right:6px;" /><?php echo $_SESSION['sd']; ?> to <?php echo $_SESSION['ed']; ?></div>
            <div><img src="<?php echo WEB_DIR; ?>images/bang-icon2.jpg" border="0" style="position:relative; top:4px; padding-right:6px;" /><?php echo $_SESSION['adult_count']; ?> Adults <?php echo $_SESSION['child_count']; ?> Childs</div>
            <div><img src="<?php echo WEB_DIR; ?>images/bang-icon3.jpg" border="0" style="position:relative; top:4px; padding-right:6px;" /><?php echo $_SESSION['room_count']; ?> Room</div>
            
            
            <div style="float:right"><img src="<?php echo WEB_DIR; ?>images/modify-sbut.png" border="0" style="position:relative; top:30px;" /></div>
        
        </div>
  </div>
  
  

 
   <div style="float:left; margin-top:10px;"><img src="<?php echo WEB_DIR; ?>images/last-view-img.jpg" width="229" height="63" /></div>
  	<div class="left-secbox">
  		<div style="width:220px; margin:0 auto;">
        	<ul class="left-list">
            	<li>Patong Bay House</li>
                <li>Patong Bay House</li>
                <li>Baramee Hip Hotel</li>
                <li>Patong Bay House</li>
                <li>Bel Aire Resort</li>
            </ul>
        </div>
  	</div> </div>
    <div class="mainbody">
   <div>
    <div class="hotelnames" style="min-height:329px;">
    
   		<!--<div class="right-hotel-name">Youngor Central Suzhou</div>-->
        <table width="100%" border="0" cellspacing="7" cellpadding="3" class="r-hoteldeta">
          <tr>
          	<td colspan="2" class="right-hotel-name"><?php echo $service->hotel_name; ?></td>
          </tr>
          <tr>
            <td>Location :</td>
            <td style="color:#227fb0"><?php echo $service->address; ?> ., <?php echo $service->city; ?></td>
          </tr>
          <tr>
          	<td>Check-in:</td>
            <td style="color:#227fb0"><?php echo $_SESSION['sd']; ?></td>
          </tr>
          <tr>
          	<td>Check-Out:</td>
            <td style="color:#227fb0"><?php echo $_SESSION['ed']; ?></td>
          </tr>
          <tr>
          	<td>Room Type </td>
            <td style="color:#227fb0"><?php
				 $cost=0;
				  $markup=0;
				   $payment_charge=0;
				    $org_amt=0;
					
				  $a=explode("-",$result_id);
				  $sec_res=$_SESSION['ses_id'];
				  $room_type='';
				  for($k=0;$k<count($a);$k++)
				  {
					 $b=  $this->Hotel_Model->fetch_gta_temp_result_room_result_id($sec_res,$a[$k]);
					$cost = $cost + $b->total_cost;  
					
					$markup = $markup + $b->markup;  
					$payment_charge = $payment_charge + $b->payment_charge;  
					$org_amt = $org_amt + $b->org_amt;  
					$currency_val = $b->currency_val; 
					$xml_currency = $b->xml_currency; 

					
					 
					$room_type .= $b->room_type."-".$b->inclusion."<br>";  
				  }
				
				 echo $room_type; ?></td>
          </tr>
          <tr>
          	<td>For</td>
            <td style="color:#227fb0"><?php echo $_SESSION['days']; ?> night, <?php echo $_SESSION['room_count']; ?> rooms, max. <?php echo $_SESSION['adult_count']; ?> people.</td>
          </tr>
          <tr>
          	<td><?php echo $_SESSION['room_count']; ?> Rooms </td>
            <td style="color:#227fb0"><?php
				 
				  ?> $ <?php echo $cost; ?></td>
          </tr>
          <tr>
          	<td>VAT (0%) included </td>
            <td style="color:#227fb0">$ 0.00</td>
          </tr>
          <tr>
          	<td colspan="2">&nbsp;</td>
          </tr>
          <tr>
          	<td colspan="2" style="font-size:16px; font-weight:bold">Booking conditions</td>
          </tr>
          <tr>
          	<td colspan="2"><?php echo $cancel_policy; ?></td>
          </tr>
          
        </table>
      
    </div>
     <form name="book" action="<?php echo WEB_URL ?>hotel/pre_booking/<?php echo $result_id; ?>" method="post">
<input type="hidden" name="result_id" value="<?php echo $result_id; ?>" />
<input type="hidden" name="amount" value="<?php echo $cost; ?>" />

<input type="hidden" name="xml_currency" value="<?php echo $xml_currency; ?>" />
<input type="hidden" name="payment_charge" value="<?php echo $payment_charge; ?>" />
<input type="hidden" name="org_amt" value="<?php echo $org_amt; ?>" />
<input type="hidden" name="markup" value="<?php echo $markup; ?>" />
<input type="hidden" name="currency_val" value="<?php echo $currency_val; ?>" />

<input type="hidden" name="cancel_policy" value="<?php echo $cancel_policy; ?>" />
<input type="hidden" name="room_type" value="<?php echo $room_type; ?>" />
	<input type="hidden" name="cancel_charge_n"  value="<?php echo $new_cancelaion_charge; ?>">
			<input type="hidden" name="cancel_till_n"  value="<?php echo $new_cancelaion_till_date; ?>">
     
    <div id="r-box">
    	<div class="mid-txt" style="margin:5px 5px 5px 15px;">Customer Details</div>
        <div class="sum-txt" style="margin:5px 5px 5px 15px;">Please fill the names of the passengers as they officially appear on identities or passports. </div>
    </div>
    
    <table align="left" width="724" border="0" cellspacing="5" cellpadding="5" class="sum-txt" id="div-rightbox">
      <?php
		 
							 if(isset($_SESSION['logged_in']))
							 {
								 $email = $_SESSION['b2c_email'];
							 }
							 else
							 {
								 $email ='';
							 }
						//r-txtbox	 
		  
		   ?>
      <tr>
        <td width="230">Email Address *</td>
        <td width="475">   <input type="text" name="email"  value="<?php if(set_value('email')!=''){ echo set_value('email'); } else { echo $email; } ?>" class="r-txtbox" >
            <span style="  margin-left: 3px;
    margin-top: -9px;
    position: absolute;
    width: 240px; color:#900"><?php
    echo form_error('email');

 ?></span></td>
      </tr>
      <tr>
        <td>Confirm Email Address *</td>
        <td><input type="text" name="cemail"   value="<?php if(set_value('cemail')!=''){ echo set_value('cemail'); } else { echo $email; } ?>"  class="r-txtbox" autocomplete="off">
            <span style=" margin-left: 3px;
    margin-top: -9px;
    position: absolute;
    width: 240px; color:#900"><?php
    echo form_error('cemail');

 ?></span></td>
      </tr>
      <tr>
        <td>Address *</td>
        <td>  <input type="text" name="address" value="<?php echo set_value('address'); ?>" class="r-txtbox" autocomplete="off">
            <span style=" margin-left: 3px;
    margin-top: -9px;
    position: absolute;
    width: 240px; color:#900"><?php
    echo form_error('address');

 ?></span></td>
      </tr>
      <tr>
        <td>City *</td>
        <td>   <input type="text" name="city"  value="<?php echo set_value('city'); ?>"  class="r-txtbox" autocomplete="off">
            <span style=" margin-left: 3px;
    margin-top: -9px;
    position: absolute;
    width: 240px; color:#900"><?php
    echo form_error('city');

 ?></span></td>
      </tr>
      <tr>
        <td>Zip/Post Code *</td>
        <td>  <input type="text" name="pin"  value="<?php echo set_value('pin'); ?>"  class="r-txtbox" autocomplete="off">
            <span style=" margin-left: 3px;
    margin-top: -9px;
    position: absolute;
    width: 240px; color:#900"><?php
    echo form_error('pin');

 ?></span></td>
      </tr>
      <tr>
        <td>Country *</td>
        <td>  <?php
		  $country = $this->Hotel_Model->country_list();
		  echo '<select  name="country"  class="r-txtbox" autocomplete="off">';
		   echo '<option value="'.set_value('country').'" >'.set_value('country').'</option>';
		
		  for($iii=0;$iii<count($country);$iii++)
		  {
		  ?>
            <option  value="<?php  echo $country[$iii]->name;  ?>"  ><?php  echo $country[$iii]->name;  ?></option>
            <?php
			
		  }
		  echo '</select>';
		  ?>
            <span style=" margin-left: 3px;
    margin-top: -9px;
    position: absolute;
    width: 240px; color:#900"><?php
    echo form_error('country');

 ?></span></td>
      </tr>
      <tr>
        <td>Telephone *</td>
        <td>  <input type="text" name="mobile"  value="<?php echo set_value('mobile'); ?>"  class="r-txtbox" autocomplete="off">
            <span style=" margin-left: 3px;
    margin-top: -9px;
    position: absolute;
    width: 240px; color:#900"><?php
    echo form_error('mobile');

 ?></span></td>
      </tr>
    </table>
      <?php
		
		  for($i=0;$i< count($room_info); $i++)
		  {
			  ?>
    <div id="r-box" style="height:40px">
    	<div class="mid-txt" style="margin:10px 5px 5px 15px;">Room <?php echo $i+1; ?>: Special Offer - <?php echo $room_info[$i]->room_type; ?> - Non refundable / <?php echo $room_info[$i]->inclusion; ?></div>
    </div>
     <?php
			 for($j=0;$j<  $room_info[$i]->adult; $j++)
		  {
			  ?>
     <table align="left" width="724" border="0" cellspacing="5" cellpadding="5" class="sum-txt" style="min-height:320px; margin-top:15px; border:1px #227fb0 solid; border-radius:10px;">
      
      <tr>
        <td width="70">Saluation *</td>
        <td width="220">First Name</td>
         <td width="220">Last Name</td>
         <td >Max Persons</td>
      </tr>
      <tr>
        <td> <select name="sal[]" style="width:60px" class="r-txtbox">
                 <option value="Mr">Mr</option>
                 <option value="Mrs">Mrs</option>
                 </select>
               </td>
        <td> <input type="text" name="fname[]" style="width:200px" class="r-txtbox"  /></td>
         <td><input style="width:200px" type="text" name="lname[]" class="r-txtbox"  /></td>
         <td ><?php echo $room_info[$i]->adult; ?> guests</td>
      </tr>
    </table>
     <?php
		  }
			  ?>
    <?php
		  }
		  ?>
    
    
    
    <div style="float:left; margin-top:50px;"><input type="image" src="<?php echo WEB_DIR; ?>images/contiu-but.png" width="100" height="35" /></div>
</form>
  </div>
  </div>
</div><div style="clear:both"></div>
<?php $this->load->view('footer'); ?>
</body>
</html>
 