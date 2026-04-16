<table width="100%" border="0" style="margin-top:20px" cellspacing="7" cellpadding="3" class="r-hoteldeta">
          <tr>
          	<td >
            <span  style="font-size:15px; color:#069" ><strong>
            	Booking Details of Booking ID : <?php //echo $trans->prn_no; ?> <?php echo $trans->booking_number; ?>
           </strong></span>
			</td><td rowspan="3" align="right" valign="top"><img src="<?php echo WEB_DIR; ?>designAccess/images/travel_bay_logo.png"></td>
          </tr>
          <tr>
          	<td ><span style="font-size:15px; color:#069">Booker Name : Mr.<?php echo $contact_info->first_name; ?></span><br /></td>
          </tr>
           <tr>
          	<td  ><span style="font-size:15px; color:#069;">Booking Status : <?php echo $trans->status; ?></span><br /></td>
          </tr>
           <?php
			$adult_co = explode("-",$result_view->adult);
			$adult_count = array_sum($adult_co);
			
			$child_co = explode("-",$result_view->child);
			$child_count = array_sum($child_co);
			
			?>
           <tr>
          	<td width="350" align="left" valign="top"><table style="font-size:15px;"width="100%" border="0" cellspacing="5" cellpadding="5" class="sum-txt">
                  <tr>
                    <td colspan="2" class="" style="color:#fff; background-color:#517BA5; font-size:15px; text-align:center">Traveller Details</td>
                  </tr>
                  <tr>
                    <td width="128">Guest Name</td>
                    <td width="270">: Mr <?php echo $contact_info->first_name; ?></td>
                  </tr>
                  <tr>
                    <td>No. of Adults</td>
                    <td>: <?php echo $adult_count; ?> Adults</td>
                  </tr>
                  <tr>
                    <td>No. of Childern</td>
                    <td>: <?php echo $child_count; ?> Childern</td>
                  </tr>
                  <tr>
                    <td>Voucher Date</td>
                    <td>: <?php echo $trans->created_date; ?></td>
                  </tr>
                   <tr>
                    <td>Special Request</td>
                    <td>:  <?php if($trans->special_request!=''){echo $trans->special_request;} else { echo "No Special Request.";} ?></td>
                  </tr>
                
                  <tr>
                    <td>Supplier</td>
                    <td>: <?php echo $result_view->api; ?></td>
                  </tr>
                </table>
                </td>
            <td width="350" align="left" valign="top"><table  style="font-size:15px;" width="100%" border="0" cellspacing="5" cellpadding="5" class="sum-txt">
                  <tr>
                    <td colspan="2" class="" style="color:#fff; font-size:15px; background-color:#517BA5;   text-align:center">Your Reservation
</td>
                  </tr>
                  <tr>
                    <td width="171">Check - in</td>
                    <td width="228">: <?php echo $result_view->check_in; ?></td>
                  </tr>
                  <tr>
                    <td>Check - out</td>
                    <td>: <?php echo $result_view->check_out; ?></td>
                  </tr>
                  <tr>
                    <td>Rooms</td>
                    <td>: <?php echo $result_view->no_of_room; ?> Rooms</td>
                  </tr>
                   <tr>
                    <td>Nights</td>
                    <td>: <?php echo $result_view->nights; ?> Nights</td>
                  </tr>
                   <tr>
                    <td>Supplier Confimation No</td>
                    <td>: <?php echo $trans->booking_number ; ?></td>
                  </tr>
                </table>
                </td>
          </tr>
          <tr>
          	<td  width="350" align="left" colspan="2" valign="top">
            <table width="100%">
            <tr><td  style="color:#fff; height:28px;  background-color:#517BA5; font-size:15px; ">
              Hotel Details
                </td></tr></table>
                </td>
          </tr>
          
          <tr>
          	<td  width="350" align="left" colspan="2" valign="top">
            <table align="left" width="724" border="0" cellspacing="0" cellpadding="5" class="sum-txt" style=" font-size:15px; ">
      <tr>
         <td align="left">
         	<div style="width:950px; margin:0 auto;">
            	<div class="hotelfa-div" style="border:none">
                <div style="width:950px; float:left">
                <p><?php echo $result_view->hotel_name; ?> 
                        
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
                                           ?> <?php //echo $result_view->hotel_name; ?></p>
    
                <p><?php //echo $result_view->description; 
                echo preg_replace("/[^a-z0-9_-]/i", " ",$result_view->description);?></p>
            </div>
            	</div>
                
            <div class="hotelfa-div" style="border:none; clear:both;">
            <div style="width:150px; float:left;">Address : </div>
            <div style="width:550px; float:left" class="mid-txt"><?php echo $result_view->address; ?></div>
            </div>
            
            <div class="hotelfa-div" style="border:none; clear:both;">
            <div style="width:150px; float:left;">City : </div>
            <div style="width:550px; float:left" class="mid-txt"><?php echo $result_view->city; ?>	</div>
            </div>
            
            <div class="hotelfa-div" style="border:none; clear:both;">
            <div style="width:150px; float:left;">Phone : </div>
            <div style="width:550px; float:left" class="mid-txt"><?php echo $result_view->phone; ?>	</div>
            </div>
            
            <div class="hotelfa-div" style="border:none; clear:both;">
            <div style="width:150px; float:left;">Fax : </div>
            <div style="width:550px; float:left" class="mid-txt"><?php echo $result_view->fax; ?>	</div>
            </div>
                
            </div>
         </td>
      </tr>
    </table></td>
          </tr>
          
          <tr>
          	<td  width="350" align="left" colspan="2" valign="top">
            <table width="100%">
            <tr><td  style="color:#fff; height:28px;  background-color:#517BA5; font-size:15px; ">
              Room Details
                </td></tr></table></td>
          </tr>
          
          <tr>
          	<td  width="724" align="left" colspan="2" valign="top">
            <table align="left" width="100%" border="0" cellspacing="0" cellpadding="5" class="sum-txt" style=" font-size:15px; ">
      <tr>
         <td align="left">
         	<div style="width:100%; margin:0 auto;">
            
            	<div class="hotelfa-div" style="border:none">
            	<div style="width:150px; float:left;">Room Type : </div>
                <div style="width:550px; float:left" class=""><?php echo $result_view->room_type; ?></div>
                </div>
                
            </div>
         </td>
      </tr>
    </table></td>
          </tr>
          
          
          <tr>
          	<td  width="350" align="left" colspan="2" valign="top">
            <table width="100%">
            <tr><td  style="color:#fff; height:28px;  background-color:#517BA5; font-size:15px; ">
              Room Extra Services
                </td></tr></table></td>
          </tr>
          
          <tr>
          	<td  width="724" align="left" colspan="2" valign="top">
            <table align="left" width="100%" border="0" cellspacing="0" cellpadding="5" class="sum-txt" style=" font-size:15px; ">
      <tr>
         <td align="left">
         	<div style="width:100%; margin:0 auto;">
            
            	<div class="hotelfa-div" style="border:none">
                <div style="width:700px; float:left" class=""><?php //echo $result_view->room_type; ?>
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
    </table></td>
          </tr>
          
          
          
             <tr>
          	<td  width="350" align="left" colspan="2" valign="top">
            <table width="100%">
            <tr><td  style="color:#fff; height:28px;  background-color:#517BA5; font-size:15px; ">
             Fare Summary
                </td></tr></table></td>
          </tr>
          
          <tr>
          	<td  width="350" align="left" colspan="2" valign="top">
            <table  align="left" width="100%" border="0" cellspacing="0" cellpadding="5" class="sum-txt" style="font-size:15px;">
      <tr>
         <td align="left">
         	<table style=" background-color: #EDEFED;
    border: 1px solid #9D9D9D;border: 1px solid #9D9D9D;" width="100%" border="0" cellspacing="0" cellpadding="7">
 
  <tr>
	  <?php
		if($trans->status!="Cancelled" && $trans->cancelled_charge==''){
    ?>
    <td>Total Fare :<?php echo $trans->xml_currency; ?> <?php echo $trans->amount; ?></td>
    <?php } else{ ?>
    <td>Total Fare :<?php echo $trans->xml_currency; ?> <?php echo $trans->cancelled_charge; ?></td>
    <?php } ?>
     </tr>
</table>

         </td>
      </tr>
    </table></td>
          </tr>
          
          
          
            <tr>
            <td  width="350" align="left" colspan="2" valign="top">
            <table width="100%">
            <tr><td  style="color:#fff; height:28px;  background-color:#517BA5; font-size:15px; ">
            Special Offers
            </td></tr></table></td>
            </tr>
            
            <tr>
            <td  width="350" align="left" colspan="2" valign="top">
            <table  align="left" width="100%" border="0" cellspacing="0" cellpadding="5" class="sum-txt" style="font-size:15px;">
            <tr>
            <td align="left">
            <table style=" background-color: #EDEFED;
            border: 1px solid #9D9D9D;border: 1px solid #9D9D9D;" width="100%" border="0" cellspacing="0" cellpadding="7">
            <?php if(isset($result_view->booking_code) && $result_view->booking_code!=''){ ?>
            <tr>
            <td><?php echo $result_view->booking_code; ?> </td>
            </tr>
            <?php } ?>
            
            <tr>
            <td><?php if(isset($result_view->special_offer) && $result_view->special_offer!=''){ echo $result_view->special_offer; } ?> </td>
            </tr>
            </table>
            
            </td>
            </tr>
            </table></td>
            </tr>

            <tr>
          	<td  width="350" align="left" colspan="2" valign="top">
            <table width="100%">
            <tr><td  style="color:#fff; height:28px;  background-color:#517BA5; font-size:15px; ">
            Cancellation Policy
                </td></tr></table></td>
          </tr>
          
          <tr>
          	<td  width="350" align="left" colspan="2" valign="top">
            <table align="left" width="100%" border="0" cellspacing="0" cellpadding="1" class="sum-txt" style="font-size:15px;">
      <tr>
         <td align="left">
         <table style=" background-color: #EDEFED;
    border: 1px solid #9D9D9D;border: 1px solid #9D9D9D;" width="100%" border="0" cellspacing="0" cellpadding="1">
  <tr>
    <td style="border-bottom: 1px solid #9D9D9D;border-right: 1px solid #9D9D9D;">CheckIn Date</td>
<!--
    <td style="border-bottom: 1px solid #9D9D9D;border-right: 1px solid #9D9D9D;">Cancellation Till Date</td>
-->
   	<td style="border-bottom: 1px solid #9D9D9D;border-right: 1px solid #9D9D9D;">Cancellation End Date</td>
    <td style="border-bottom: 1px solid #9D9D9D;border-right: 1px solid #9D9D9D;">Cancellation Charges</td>
    <td style="border-bottom: 1px solid #9D9D9D;border-right: 1px solid #9D9D9D;">Refund Charges</td>
   
    
  </tr>
  <tr>
    <td style="border-bottom: 1px solid #9D9D9D;border-right: 1px solid #9D9D9D;"><?php echo $result_view->check_in; ?></td>
<!--
    <td style="border-bottom: 1px solid #9D9D9D;border-right: 1px solid #9D9D9D;"><?php echo $trans->cancellation_till_date; ?></td>
-->
    <td style="border-bottom: 1px solid #9D9D9D;border-right: 1px solid #9D9D9D;"><?php echo $trans->cancellation_till_date; ?></td>
<!--
    <td style="border-bottom: 1px solid #9D9D9D;border-right: 1px solid #9D9D9D;"><?php echo $trans->cancellation_till_charge; ?> USD</td>
-->
	<td style="border-bottom: 1px solid #9D9D9D;border-right: 1px solid #9D9D9D;">
	<?php
		$canPolicies = explode("//",$trans->cancellation_till_charge);
		for($c=0;$c< count($canPolicies);$c++)
		{
			$canTill = explode("___",$canPolicies[$c]);
			echo "<div>If you cancel this <font color='red'><b>on or after</b></font> the date ".$canTill[0].", AED ".$canTill[1]." will be the charge</div>";
		}
	?>
	</td>
     <td style="border-bottom: 1px solid #9D9D9D;border-right: 1px solid #9D9D9D;">
	 <?php
      //echo ($trans->amount-$trans->cancellation_till_charge);
		$canPolicies = explode("//",$trans->cancellation_till_charge);
		for($c=0;$c< count($canPolicies);$c++)
		{
			$canTill = explode("___",$canPolicies[$c]);
			$refundCharge = $trans->amount-$canTill[1];
			echo "<div>AED ".$refundCharge."</div>";
		}
     ?></td>
   
  </tr>
  <tr><td colspan="6">Description :</td>
  <tr>
    <td colspan="6"><?php echo $result_view->cancel_policy; ?></td>
     </tr>
</table>
         
         </td>
      </tr>
    </table></td>
          </tr>
         
          <tr>
          	<td  width="350" align="left" colspan="2" valign="top">
            <table width="100%">
            <tr><td  style="color:#fff; height:28px;  background-color:#517BA5; font-size:15px; ">
          Customer Details
                </td></tr></table></td>
          </tr>
          
          <tr>
          	<td  width="350" align="left" colspan="2" valign="top">
            <table align="left" width="100%" border="0" cellspacing="0" cellpadding="5" class="sum-txt" style="font-size:15px;">
      <tr>
         <td align="left">
         <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="13%">Email ID </td>
    <td width="1%">:</td>
    <td width="86%"><?php echo $contact_info->email; ?></td>
  </tr>
    <tr>
    <td>Address</td>
    <td>:</td>
    <td><?php echo $contact_info->address; ?></td>
  </tr>
  <tr>
    <td>City</td>
    <td>:</td>
    <td><?php echo $contact_info->city; ?></td>
  </tr>
  <tr>
    <td>Country</td>
    <td>:</td>
    <td><?php echo $contact_info->country; ?></td>
  </tr>
  <tr>
    <td>Postal Code</td>
    <td>:</td>
    <td><?php echo $contact_info->mobile; ?></td>
  </tr>
  <tr>
    <td>Phone Number</td>
    <td>:</td>
    <td><?php echo $contact_info->phone; ?></td>
  </tr>
</table>

         </td>
      </tr>
    </table></td>
          </tr>
         
         
          <tr>
          	<td  width="350" align="left" colspan="2" valign="top">
            <table width="100%">
            <tr><td  style="color:#fff; height:28px;  background-color:#517BA5; font-size:15px; ">
          Passenger Details
                </td></tr></table></td>
          </tr>
          
          <tr>
          	<td  width="350" align="left" colspan="2" valign="top">
            <table align="left" width="100%" border="0" cellspacing="0" cellpadding="5" class="sum-txt" style="font-size:15px;">
      <tr>
         <td align="left">
         <div style="width:100%; margin:0 auto;">
             <?php
					for($i=0;$i< count($pass_info);$i++)
					{
						?>
            	<div class="hotelfa-div" style="border:none">
            	<div style="width:690px; float:left; line-height:25px;">Mr. <?php echo $pass_info[$i]->first_name.' '.$pass_info[$i]->last_name; ?></div>
                </div>

                 <?php
					}
					?>
            </div>
         </td>
      </tr>
    </table></td>
          </tr>
          <tr><td align="center" colspan="3">
<?php if($trans->status!='Cancelled') { ?>
<a href="#" onClick="javascript:window.print(); return false;" style="text-decoration:none" ><font face="MAIAN" color="#006699" size="+3"><img src="<?php echo WEB_DIR; ?>images/System-config-printer-icon.png"> Print </font></a>
<?php } ?></td></tr>
         
         
         
        </table>

        <div style="clear:both;"></div>
  <div style="margin-top:25px;"><div align="center">
  <p align="center">Tel: 18002345678 / Fax: + 971 6 5573817 / Email: admin@travel-bay.com<br/>
  P.O Box: 9657
  Sharjah<br/>
  UAE<br/>
  www.travel-bay.com</p></div>
