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
            <span style="float:left;"><?php echo $result_view->hotel_name; ?></span>
            <span style="float:right;"><img src="images/detail-bul.png" border="0" /></span>
            <div style="float:left; clear:both">
            	<span class="sum-txt">Booking Number :</span>
                <span><?php echo $trans->booking_number; ?></span>
             </div>
			</td>
          </tr>
          <tr>
          	<td colspan="2" ><span style="font-size:15px"><strong>Dear Mr <?php echo $contact_info->first_name; ?></strong></span><br />
<span>Thank  you for booking your hotel with Stayaway. We are pleased to confirm your booking details as below:</span></td>
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
                    <td>No. of Childern</td>
                    <td><strong>: <?php echo $child_count; ?> Childern</strong></td>
                  </tr>
                  <tr>
                    <td>Voucher Date</td>
                    <td><strong>: <?php echo $trans->created_date; ?></strong></td>
                  </tr>
                </table>
                </td>
            <td width="350"><table width="100%" border="0" cellspacing="5" cellpadding="5" class="sum-txt">
                  <tr>
                    <td colspan="2" class="mid-txt" style="color:#227fb0; text-align:center">Your Reservation
</td>
                  </tr>
                  <tr>
                    <td width="230">Hotel Booking Number</td>
                    <td width="120"><strong>: <?php echo $trans->booking_number; ?></strong></td>
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
     <table align="left" width="724" border="0" cellspacing="0" cellpadding="5" class="sum-txt" style="margin-top:2px; font-size:15px; border:1px #bee7ff solid; border-radius:10px;">
      <tr>
         <td align="left">
         	<div style="width:700px; margin:0 auto;">
            
            	<div class="hotelfa-div" style="border:none">
            	<div style="width:150px; float:left;  font-weight:bold"><img src="<?php echo WEB_DIR ?>image_hotelspro1/<?php echo $result_view->hotel_code; ?>.jpg" border="0" /></div>
                <div style="width:550px; float:left">
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
										else
											   {
												?>
                                                <?php
											   }
											   ?>  <br /><?php echo $result_view->hotel_name; ?></p><br />

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
    
    
    <table align="left" width="724" border="0" cellspacing="5" cellpadding="5" class="sum-txt" style="margin-top:15px; font-size:15px; font-weight:bold; background-color:#bee7ff; border-radius:10px;">
      
      <tr>
         <td width="200" align="left">Room Details</td>
         <td  align="left">&nbsp;</td>
         
      </tr>
    </table>
     <table align="left" width="724" border="0" cellspacing="0" cellpadding="5" class="sum-txt" style="margin-top:2px; font-size:15px; border:1px #bee7ff solid; border-radius:10px;">
      <tr>
         <td align="left">
         	<div style="width:700px; margin:0 auto;">
            
            	<div class="hotelfa-div" style="border:none">
            	<div style="width:150px; float:left;">Room Type : </div>
                <div style="width:550px; float:left" class="mid-txt"><?php echo $result_view->room_type; ?></div>
                </div>
                
            </div>
         </td>
      </tr>
    </table>
    
    
     <table align="left" width="724" border="0" cellspacing="5" cellpadding="5" class="sum-txt" style="margin-top:15px; font-size:15px; font-weight:bold; background-color:#bee7ff; border-radius:10px;">
      
      <tr>
         <td width="200" align="left">Fare Summary</td>
         <td  align="left">&nbsp;</td>
         
      </tr>
    </table>
     <table align="left" width="724" border="0" cellspacing="0" cellpadding="5" class="sum-txt" style="margin-top:2px; font-size:15px; border:1px #bee7ff solid; border-radius:10px;">
      <tr>
         <td align="left">
         	<div style="width:700px; margin:0 auto;">
            
            	<div class="hotelfa-div" style="border:none">
            	<div style="width:150px; float:left;">Total Room Price:  </div>
                <div style="width:550px; float:left" class="mid-txt"><?php echo $trans->amount; ?> USD</div>
                </div>
                
            </div>
         </td>
      </tr>
    </table>
    
    
    <table align="left" width="724" border="0" cellspacing="5" cellpadding="5" class="sum-txt" style="margin-top:15px; font-size:15px; font-weight:bold; background-color:#bee7ff; border-radius:10px;">
      <tr>
         <td width="200" align="left">Cancellation Polycy</td>
         <td  align="left">&nbsp;</td>
         
      </tr>
    </table>
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
    </table>
    
    
     <table align="left" width="724" border="0" cellspacing="5" cellpadding="5" class="sum-txt" style="margin-top:15px; font-size:15px; font-weight:bold; background-color:#bee7ff; border-radius:10px;">
      <tr>
         <td width="200" align="left">Passenger Details</td>
         <td  align="left">&nbsp;</td>
         
      </tr>
    </table>
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
    
    <div style="float:left; margin-top:25px;">
    	<span><img src="<?php echo WEB_DIR; ?>images/print-v-but.png" border="0"/></span>
        <span><img src="<?php echo WEB_DIR; ?>images/sentema-but.png" border="0"  /></span>
    </div>
    
    
    
     
     

    
  </div>
  </div>
</div><div style="clear:both"></div>
<?php $this->load->view('footer'); ?>
</body>
</html>
 