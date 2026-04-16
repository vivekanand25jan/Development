<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Travel Bay</title>
<link href="<?php echo WEB_DIR; ?>css/style_sheet.css" rel="stylesheet" type="text/css" />
<link href="<?php echo WEB_DIR; ?>css/postion.css" rel="stylesheet" type="text/css" />

</head>
<body>
<?php $this->load->view('b2b/header'); ?>
<div class="midlebody">
  <div class="lhsside">
  <div class="serachbar1" style="background-image:none">
  	<div style="float:left"><img src="<?php echo WEB_DIR; ?>images/voucher-left-img.jpg" border="0" style="position:relative; top:15px;" /></div>
  </div>
  
  
  	 </div>
    <div class="mainbody">
   <div>
    <div class="hotelnames" style="min-height:329px;">
    
   		<!--<div class="right-hotel-name">Youngor Central Suzhou</div>-->
        <table width="100%" border="0" cellspacing="7" cellpadding="3" class="r-hoteldeta">
          <tr>
          	<td colspan="2" class="right-hotel-name">
            <span style="float:left;"><?php  
			echo preg_replace("/[^a-z0-9_-]/i", " ",  $result_view->hotel_name);?></span>
            <span style="float:right;">
            <a href="#" onClick="javascript:window.print(); return false;" style="text-decoration:none" ><font face="MAIAN" color="#006699" size="+3"><img src="<?php echo WEB_DIR; ?>images/print_icon.gif"></font></a></span>
            <div style="float:left; clear:both">
            	<span class="sum-txt" style="font-size:14px">Booking Number:</span>
                <span><?php echo $trans->booking_number; ?></span>
             </div>
             <div style="float:left; clear:both">
            	<span class="sum-txt" style="font-size:14px">Booking Status :</span>
                <span><?php echo $trans->status; ?></span>
             </div>
			</td>
          </tr>
          <tr>
          	<td colspan="2" ><span style="font-size:15px"><strong>Dear Mr <?php echo $contact_info->first_name; ?></strong></span><br />
<span>Thank  you for booking your hotel with Travel Bay. We are pleased to confirm your booking details as below:</span></td>
          </tr>
           <?php
			$adult_co = explode("-",$result_view->adult);
			$adult_count = array_sum($adult_co);
			
			$child_co = explode("-",$result_view->child);
			$child_count = array_sum($child_co);
			
			?>
           <tr>
          	<td width="350"><table width="100%" border="0" cellspacing="5" cellpadding="5" class="sum-txt">
                  <tr>
                    <td colspan="2" class="mid-txt" style="color:#227fb0; text-align:center">Traveller Details</td>
                  </tr>
                  <tr>
                    <td width="230">Guest Name</td>
                    <td width="120"><strong>: Mr <?php echo $contact_info->first_name; ?></strong></td>
                  </tr>
                  <tr>
                    <td>No. of Adults</td>
                    <td><strong>: <?php echo $adult_count; ?> Adults</strong></td>
                  </tr>
                  <tr>
                    <td>No. of Children</td>
                    <td><strong>: <?php echo $child_count; ?> Children</strong></td>
                  </tr>
                  <tr>
                    <td>Voucher Date</td>
                    <td><strong>: <?php echo $trans->created_date; ?></strong></td>
                  </tr>
                   <tr>
                    <td>Special Request</td>
                    <td><strong>: <?php if($trans->special_request!=''){echo $trans->special_request;} else { echo "No Special Request.";} ?></strong></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                </table>
                </td>
            <td width="350"><table width="100%" border="0" cellspacing="5" cellpadding="5" class="sum-txt">
                  <tr>
                    <td colspan="2" class="mid-txt" style="color:#227fb0; text-align:center">Your Reservation
</td>
                  </tr>
                  <tr>
                    <td width="290">Hotel Booking Number</td>
                    <td width="169"><strong>: <?php echo $trans->booking_number; ?></strong></td>
                  </tr>
                  <tr>
                    <td>Check - in</td>
                    <td><strong>: <?php echo $result_view->check_in; ?></strong></td>
                  </tr>
                  <tr>
                    <td>Check - out</td>
                    <td><strong>: <?php echo $result_view->check_out; ?></strong></td>
                  </tr>
                  <tr>
                    <td>Rooms</td>
                    <td><strong>: <?php echo $result_view->no_of_room; ?> Room</strong></td>
                  </tr>
                   <tr>
                    <td>Nights</td>
                    <td><strong>: <?php echo $result_view->nights; ?> nights</strong></td>
                  </tr>
                </table>
                </td>
          </tr>
         
        </table>
      
    </div>
    
    
   
     
    
    <table align="left" width="724" border="0" cellspacing="5" cellpadding="5" class="sum-txt" style="margin-top:15px; font-size:15px; font-weight:bold; background-color:#bee7ff; border-radius:10px;">
      
      <tr>
         <td width="200" align="left">Hotel Details</td>
         <td  align="left">&nbsp;</td>
         
      </tr>
    </table>
    <br>
     <table align="left" width="724" border="0" cellspacing="0" cellpadding="5" class="sum-txt" style="margin-top:2px; font-size:15px; border:1px #bee7ff solid; border-radius:10px;">
      <tr>
         <td align="left">
         	<div style="width:700px; margin:0 auto;">
            
            	<div class="hotelfa-div" style="border:none">
            	<div style="width:150px; float:left;  font-weight:bold"><!--<img src="<?php echo WEB_DIR ?>image_hotelspro1/<?php echo $result_view->hotel_code; ?>.jpg" border="0" />--></div>
                <div style="width:700px; float:left">
                	<p class="mid-txt"><?php echo $result_view->hotel_name; ?> 
                            
                          <?php $star = $result_view->star; 
											   if($star==1)
											   {
											   ?>
                                               <img src="<?php echo WEB_DIR.'images/1 star.jpg'; ?>" />
                                               <?php
											   }
											   elseif($star==2)
											   {
												?>   <img src="<?php echo WEB_DIR.'images/2 star.jpg'; ?>" />
                                                <?php
												  }
											   elseif($star==3)
											   {
												?> <img src="<?php echo WEB_DIR.'images/3 star.jpg'; ?>" />
                                                 <?php
												  }
											   elseif($star==4)
											   {
												?> <img src="<?php echo WEB_DIR.'images/4 star.jpg'; ?>" />
                                                 <?php
												  }
											   elseif($star==5)
											   {
												?> <img src="<?php echo WEB_DIR.'images/5 star.jpg'; ?>" />
                                                 <?php
												  }
												  elseif($star=='7')
											   {
												?> <span style="color:#243419">Deluxe</span>
                                                 <?php
											   }
											   elseif($star=='6')
											   {
												?> <span style="color:#243419">Standard</span>
                                                 <?php
											   }
										else
											   {
												?>
                                                <?php
											   }
											   ?>  <br /><?php //echo $result_view->hotel_name; ?></p><br />

                    <p><?php echo $result_view->description; ?></p>
                </div>
            	</div>
                
                <div class="hotelfa-div" style="border:none">
            	<div style="width:150px; float:left;">Address : </div>
                <div style="width:550px; float:left" class="mid-txt"><?php echo $result_view->address; ?></div>
            	</div>
                
                <div class="hotelfa-div" style="border:none">
            	<div style="width:150px; float:left;">City : </div>
                <div style="width:550px; float:left" class="mid-txt"><?php echo $result_view->city; ?>	</div>
            	</div>
                
                <div class="hotelfa-div" style="border:none">
            	<div style="width:150px; float:left;">Phone : </div>
                <div style="width:550px; float:left" class="mid-txt"><?php echo $result_view->phone; ?>	</div>
            	</div>
                
                <div class="hotelfa-div" style="border:none">
            	<div style="width:150px; float:left;">Fax : </div>
                <div style="width:550px; float:left" class="mid-txt"><?php echo $result_view->fax; ?>	</div>
            	</div>
                
            </div>
         </td>
      </tr>
    </table>
    
    <br>
    <table align="left" width="724" border="0" cellspacing="5" cellpadding="5" class="sum-txt" style="margin-top:15px; font-size:15px; font-weight:bold; background-color:#bee7ff; border-radius:10px;">
      
      <tr>
         <td width="200" align="left">Room Details</td>
         <td  align="left">&nbsp;</td>
         
      </tr>
    </table>
    <br>
     <table align="left" width="724" border="0" cellspacing="0" cellpadding="5" class="sum-txt" style="margin-top:2px; font-size:15px; border:1px #bee7ff solid; border-radius:10px;">
      <tr>
         <td align="left">
         	<div style="width:700px; margin:0 auto;">
            
            	<div class="hotelfa-div" style="border:none">
            	<div style="width:150px; float:left;">Room Type : </div>
                <div style="width:550px; float:left" class="mid-txt"><?php echo $result_view->room_type ?></div>
                </div>
                
            </div>
         </td>
      </tr>
    </table>
    
    <!--<table align="left" width="724" border="0" cellspacing="5" cellpadding="5" class="sum-txt" style="margin-top:15px; font-size:15px; font-weight:bold; background-color:#bee7ff; border-radius:10px;">
    <tr>
        <td width="200" align="left">Room Extra Services</td>
        <td  align="left">&nbsp;</td>
    </tr>
    </table>-->
   <!-- <table align="left" width="724" border="0" cellspacing="0" cellpadding="5" class="sum-txt" style="margin-top:2px; font-size:15px; border:1px #bee7ff solid; border-radius:10px;">
    <tr>
        <td align="left">
            <div style="width:700px; margin:0 auto;">
                <div class="hotelfa-div" style="border:none">
                <div style="width:700px; float:left; font-weight:normal;" class="mid-txt">
					<?php
						$string1 = "/aeb/";
						$string2 = "/cc/";
						$string3 = "/caa/";
						$string4 = "/ceb/";
						$string5 = "/ampb/";
						$string6 = "/ampl/";
						$string7 = "/ampd/";
						$string8 = "/cmpb/";
						$string9 = "/cmpl/";
						$string10 = "/cmpd/";
						$paragraph = $result_view->extra_services;
						if (preg_match_all($string1, $paragraph, $matches)) {
						count($matches[0]);
						echo 'Adult Extra Bed';
						}
						if (preg_match_all($string2, $paragraph, $matches)) {
						count($matches[0]);
						echo '<br> Child Charge';
						}
						if (preg_match_all($string3, $paragraph, $matches)) {
						count($matches[0]);
						echo '<br> Child Above 6 Age'; 
						} 
						if (preg_match_all($string4, $paragraph, $matches)) {
						count($matches[0]);
						echo '<br> Child Extra Bed'; 
						}
						if (preg_match_all($string5, $paragraph, $matches)) {
						count($matches[0]);
						echo '<br> Adult Meal Plan Breakfast'; 
						}
						if (preg_match_all($string6, $paragraph, $matches)) {
						count($matches[0]);
						echo '<br> Adult Meal Plan Lunch'; 
						}
						if (preg_match_all($string7, $paragraph, $matches)) {
						count($matches[0]);
						echo '<br> Adult Meal Plan Dinner'; 
						}
						if (preg_match_all($string8, $paragraph, $matches)) {
						count($matches[0]);
						echo '<br> Child Meal Plan Breakfast'; 
						}
						if (preg_match_all($string9, $paragraph, $matches)) {
						count($matches[0]);
						echo '<br> Child Meal Plan Lunch'; 
						}
						if (preg_match_all($string10, $paragraph, $matches)) {
						count($matches[0]);
						echo '<br> Child Meal Plan Dinner'; 
						}
                    ?>
                    </div>
                </div>
            </div>
        </td>
    </tr>
    </table>
    -->
    <br>
     <table align="left" width="724" border="0" cellspacing="5" cellpadding="5" class="sum-txt" style="margin-top:15px; font-size:15px; font-weight:bold; background-color:#bee7ff; border-radius:10px;">
      
      <tr>
         <td width="200" align="left">Special Offers</td>
         <td  align="left">&nbsp;</td>
         
         
      </tr>
    </table> <br>
     <table align="left" width="724" border="0" cellspacing="0" cellpadding="5" class="sum-txt" style="margin-top:2px; font-size:15px; border:1px #bee7ff solid; border-radius:10px;">
      <tr>
         <td align="left">
  <div style="width:700px; margin:0 auto;">
              <?php if(isset($result_view->booking_code) && $result_view->booking_code!=''){ ?>
              <div class="hotelfa-div" style="border:none">
              <div style="float:left;">Booking Code: <?php echo $result_view->booking_code; ?></div>
                </div>
                <?php } ?>
                <div class="hotelfa-div" style="border:none">
              <div style="float:left;"><?php if(isset($result_view->special_offer) && $result_view->special_offer!=''){ echo $result_view->special_offer;
               } ?></div>
                </div>
                
            </div>


        
         </td>
      </tr>
    </table>
    <br>
    
     <table align="left" width="724" border="0" cellspacing="5" cellpadding="5" class="sum-txt" style="margin-top:15px; font-size:15px; font-weight:bold; background-color:#bee7ff; border-radius:10px;">
      <tr>
      <td width="200" align="left">Fare Summary</td>
         <td  align="left">&nbsp;</td>  
         
      </tr>
    </table><br>
     <table align="left" width="724" border="0" cellspacing="0" cellpadding="5" class="sum-txt" style="margin-top:2px; font-size:15px; border:1px #bee7ff solid; border-radius:10px;">
      <tr>
         <td align="left">
            <div style="width:700px; margin:0 auto;">
            
              <div class="hotelfa-div" style="border:none">
              <div style="width:150px; float:left;">Total Room Price:  </div>
                <div style="width:550px; float:left" class="mid-txt"><?php echo $trans->xml_currency; ?> <?php echo $trans->amount; ?> </div>
                </div>
                
            </div>
         </td>
      </tr>
    </table>
    <br>
    
    <table align="left" width="724" border="0" cellspacing="5" cellpadding="5" class="sum-txt" style="margin-top:15px; font-size:15px; font-weight:bold; background-color:#bee7ff; border-radius:10px;">
      <tr>
         <td width="200" align="left">Cancellation Policy</td>
         <td  align="left">&nbsp;</td>
         
      </tr>
    </table><br>
     <table align="left" width="724" border="0" cellspacing="0" cellpadding="5" class="sum-txt" style="margin-top:2px; font-size:15px; border:1px #bee7ff solid; border-radius:10px;">
      <tr>
         <td align="left">
         	<div style="width:700px; margin:0 auto;">
            
            	<div class="hotelfa-div" style="border:none">
            	<div style="float:left;"><?php echo $result_view->cancel_policy; ?></div>
                </div>
                
            </div>
         </td>
      </tr>
    </table><br>
    <table align="left" width="724" border="0" cellspacing="0" cellpadding="5" class="sum-txt" style="margin-top:2px; font-size:15px; border:1px #bee7ff solid; border-radius:10px;">
      <tr>
         <td align="left">
          <div style="width:700px; margin:0 auto;">
            <div style="width:150px; height:75px; padding:10px; border:1px solid #333;float:left; font-size:24px; font-family:'Times New Roman', Times, serif'; "> Payment </div>
            <div style="width:450px; height:75px; padding:10px; border:1px solid #333;float:left; font-size:24px; font-family:'Times New Roman', Times, serif'; ">Booked and Paid By <font color="red" style="font-size:24px;">Travel Bay, UAE</font> and all extras including Tourism Dirham(Tax) to be charged directly to the clients</div>
            </div>
         </td>
      </tr>
    </table>
    <br>
     <table align="left" width="724" border="0" cellspacing="5" cellpadding="5" class="sum-txt" style="margin-top:15px; font-size:15px; font-weight:bold; background-color:#bee7ff; border-radius:10px;">
      <tr>
         <td width="200" align="left">Passenger Details</td>
         <td  align="left">&nbsp;</td>
         
      </tr>
    </table><br>
     <table align="left" width="724" border="0" cellspacing="0" cellpadding="5" class="sum-txt" style="margin-top:2px; font-size:15px; border:1px #bee7ff solid; border-radius:10px;">
      <tr>
         <td align="left">
         	<div style="width:700px; margin:0 auto;">
             <?php
					for($i=0;$i< count($pass_info);$i++)
					{
						?>
            	<div class="hotelfa-div" style="border:none">
            	<div style="width:690px; float:left;">Mr. <?php echo $pass_info[$i]->first_name.' '.$pass_info[$i]->last_name; ?></div>
                </div>
                 <?php
					}
					?>
            </div>
         </td>
      </tr>
    </table>
    <div style="clear:both;"></div>
  <div style="margin-top:25px;"><div align="center">
  <p align="center">Email: admin@travel-bay.com<br/>
  P.O Box: 9657
  Sharjah<br/>
  UAE<br/>
  </p></div>
    <div style="float:left;  margin-top:15px; margin-bottom:10px;">
    	<!--<span><img src="<?php echo WEB_DIR; ?>images/print-v-but.png" border="0"/></span>
        <span><img src="<?php echo WEB_DIR; ?>images/sentema-but.png" border="0"  /></span>-->
        
        <span><a href="#" onClick="javascript:window.print(); return false;" style="text-decoration:none" ><font face="MAIAN" color="#006699" size="+3"><img src="<?php echo WEB_DIR; ?>images/print.jpg" border="0"/></font></a></span>
    </div>
    
    
    
     
     

    
  </div>
  </div>
  </div>
  </div>
</div><div style="clear:both"></div>
<?php $this->load->view('footer'); ?>
</body>
</html>
 