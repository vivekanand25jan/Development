<link href="<?php print WEB_DIR_ADMIN?>css/vochuer.css" rel="stylesheet" type="text/css" />
<style>
@media print
{
body{font-family:georgia,times,sans-serif;}
#top_container{display:none;}
#vochur_h1{display:block;}
#print_btn_out{display:none;}
#footer{display:none;}
input#btnPrint {
display: none;
}
}
</style>
	        <div class="clr"></div>
        <div class="mdle_container"><!--mdle container start-->

        <table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="650"><img src="<?php print WEB_DIR_ADMIN.'agent_logo/'.$acc_info->agent_logo;?>" width="100" height="60" alt="image" /></td>
                    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="130"><font class="logo_banner_address_text_or"><b>Agent Name</b></font></td>
                        <td class="infor_contanerader_text1"><?php echo $acc_info->agent_name; 	 ?></td>
                      </tr>
                      <tr>
                        <td><font class="logo_banner_address_text_or"><b> Address </b></font></td>
                        <td class="infor_contanerader_text1"><?php echo $acc_info->address;?></td>
                      </tr>
                      <tr>
                        <td><font class="logo_banner_address_text_or"><b>Agent Phone</b></font></td>
                        <td class="infor_contanerader_text1"><?php echo $acc_info->mobile; ?></td>
                      </tr>
                      
                    </table></td>
                  </tr>
                </table></td>
              </tr>
                            <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="30" bgcolor="#0094DB" class="infor_contanerader_header"><strong>&nbsp;&nbsp;&nbsp;&nbsp;Hotel Information</strong></td>
              </tr>
              <tr>
                <td><table width="600" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="120">&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                    <tr>
                    <td width="120" class="infor_contanerader_text1">Hotel Name :</td>
                    <td class="infor_contanerader_text1"> 
					<?php   echo $result_view->hotelname; ?>
</td>
                  </tr>
                  <tr>
                    <td  class="infor_contanerader_text1">Address :</td>
                    <td class="infor_contanerader_text1"><?php $address=$result_view->address;
					list($add,$phone,$fax,$city,$zipcode,)=explode(',',$address);
					echo $add;?> </td>
                  </tr>
                  
                  <tr>
                    <td class="infor_contanerader_text1">Zipcode :</td>
                    <td class="infor_contanerader_text1"><?php echo $zipcode;?></td>
                  </tr>
                  <tr>
                    <td class="infor_contanerader_text1">Phone No :</td>
                    <td class="infor_contanerader_text1"><?php echo $phone;?></td>
                  </tr>
                                    <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  
                </table></td>
              </tr>
              <tr>
                <td height="1" bgcolor="#999999"></td>
              </tr>
                            <tr>
                <td>&nbsp;</td>
              </tr>
                                          <tr>
                <td height="30" bgcolor="#0094DB"class="infor_contanerader_header"><strong>&nbsp;&nbsp;&nbsp;&nbsp;Reservation Details
                </strong></td>
              </tr>
                                                        <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="340" valign="top"><table width="337" border="0" cellspacing="1" cellpadding="0">
                      <tr>
                        <td width="125" height="22" bgcolor="#DFDFDF"><span class="infor_contanerader_text1">City Name</span></td>   
                        <td bgcolor="#DFDFDF"><span class="infor_contanerader_text1"><?php echo $result_view->hotelIdent;?></span></td>
                      </tr>
                      <tr>
                        <td height="22" bgcolor="#DFDFDF"><span class="infor_contanerader_text1">Check-In Date</span></td>
                        <td bgcolor="#DFDFDF"><span class="infor_contanerader_text1"><?php echo  $this->Booking_Model->date_formate($check_in);?></span></td>
                      </tr>
                      <tr>
                        <td height="22" bgcolor="#DFDFDF"><span class="infor_contanerader_text1">Check-Out Date</span></td>
                        <td bgcolor="#DFDFDF"><span class="infor_contanerader_text1"><?php echo  $this->Booking_Model->date_formate($check_out);?></span></td>
                      </tr>
                    </table></td>
                    <td width="380" valign="top"><table width="378" border="0" cellspacing="1" cellpadding="0">
                      <tr>
                        <td width="162" height="22" bgcolor="#DFDFDF"><span class="infor_contanerader_text1">Inclusion</span></td>
                        <td width="218" bgcolor="#DFDFDF"><span class="infor_contanerader_text1"><?php echo $result_view->inclusion;?></span></td>
                      </tr>
                      <tr>
                        <td height="22" bgcolor="#DFDFDF"><span class="infor_contanerader_text1">Ref / Confirmation #</span></td>
                        <td bgcolor="#DFDFDF"><span class="infor_contanerader_text1"><?php echo $booking_ref_no; ?></span></td>
                      </tr>
                      <tr>
                        <td height="22" bgcolor="#DFDFDF"><span class="infor_contanerader_text1">Date Reservation Made:</span></td>
                        <td bgcolor="#DFDFDF"><span class="infor_contanerader_text1">
						<?php echo $this->Booking_Model->date_formate($result_view->voucher_date); ?></span></td>
                      </tr>
                      <tr>
                        <td height="22" bgcolor="#DFDFDF"><span class="infor_contanerader_text1">Item Number</span></td>
                        <td bgcolor="#DFDFDF"><span class="infor_contanerader_text1"><?php echo $itemcode; ?></span></td>
                      </tr>
                     <tr>
                        <td height="22" bgcolor="#DFDFDF"><span class="infor_contanerader_text1">Status</span></td>
                        <td bgcolor="#DFDFDF"><span class="infor_contanerader_text1">
						<?php echo $status=$result_view->status; ?></span></td>
                      </tr>  
                    </table></td>
                    <td valign="top"><table width="100%" border="0" cellspacing="1" cellpadding="0">
                      <tr>
                        <td height="22" bgcolor="#DFDFDF"><span class="infor_contanerader_text1">Names Of Guest</span></td>
                        </tr>
						<?php $paxname=$this->Booking_Model->get_paxname($book_id);
  $cntadult=count($paxname) ;
  ?>
						 
						 <?php foreach($paxname as $get_guest_ac)
						   { 
						   
						   
						   ?>
                      <tr>
                        <td height="22" bgcolor="#DFDFDF"><span class="infor_contanerader_text1"> <?php echo $salutation=$get_guest_ac->salutation.' '.$get_guest_ac->fname.' '.$get_guest_ac->lname; ?>   
                        
                        <?php $age=$get_guest_ac->age; if($age!=0) { echo " &nbsp;&nbsp;&nbsp;  Age:".$age. " Years old" ;} ?></span></td>
                        </tr>
						
						 <?php } ?>
                      <tr>
                        <td height="22" bgcolor="#DFDFDF"><span class="infor_contanerader_text1">&nbsp;</span></td>
                        </tr>
                    </table></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
			 
                <td><table width="600" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="130" class="infor_contanerader_text1">NO OF ADULTS</td>
                    <td class="infor_contanerader_text1"> <?php print $this->Booking_Model->get_count_Adult($book_id); ?></td>
                  </tr>
				 
                 
                 <?php $childcount= $this->Booking_Model->get_count_child($book_id); if($childcount!=0) { ?>
				  <tr>
                    <td width="130" class="infor_contanerader_text1">NO OF ADULTS</td>
                    <td class="infor_contanerader_text1"> <?php print $childcount; ?></td>
                  </tr>
                 <?php }?>
                  <tr>
                    <td class="infor_contanerader_text1">No of room / Type</td>
                    <td class="infor_contanerader_text1"><?php
					 $rtype=$result_view->room_type;
					 
					 $room_type=explode('-',$rtype);
					 for($i=0;$i<count($room_type);$i++){
						 
						 echo $room_type[$i]. "<br/>";
					 }
					
					
					 ?></td>
                  </tr>
				 
				 
                  <tr>
                    <td class="infor_contanerader_text1">No of Nights</td>
                    <td class="infor_contanerader_text1"><?php
					
					$diff = strtotime($check_out) - strtotime($check_in);
	
				$sec   = $diff % 60;
				$diff  = intval($diff / 60);
				$min   = $diff % 60;
				$diff  = intval($diff / 60);
				$hours = $diff % 24;
				$days  = intval($diff / 24);
			
				 
					
					
					print $days; ?></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td height="1" bgcolor="#999999">
                </td>
              </tr>
                            <tr>
                <td>&nbsp;</td>
              </tr>
                                          
                            
              
              
              
              
              
              
                  
                  
                 
                  
                </table></td>
              </tr>
              
                            
                            
                                          
              
              
                            
                            
                            
              
              
                            
                            <tr>
                <td height="30" bgcolor="#0094DB" class="infor_contanerader_header"><strong>&nbsp;&nbsp;&nbsp;&nbsp;BOOKING OFFICE</strong></td>
              </tr>
                            <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
                    <td width="300" class="infor_contanerader_text1">This accomodation is booked and payable by Travco Ltd. All Extras ,Such as but not limited to telephone, porterage,meals not already included, mini-bar etc.must be paid direct to the supplier on or before departure.</td>
                   
                  </tr>
              
              
              <tr>
                <td>&nbsp;</td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
           <tr>
                <td width="253" align="right" >&nbsp;</td>
                <td width="190" valign="top">&nbsp;&nbsp;&nbsp;&nbsp;<?php if($status!='Cancelled'){ ?><input type="image" src="<?php print WEB_DIR_ADMIN; ?>images/print_voucher.png" onClick="javascript:window.print();" /><?php } ?></td>
                 <td width="190" valign="top">&nbsp;&nbsp;&nbsp;&nbsp;<a onclick="JavaScript:newPopup('<?php print WEB_URL_ADMIN.'agent/show_invoice/'.$result_view->booking_no; ?>');"><input type="image" src="<?php print WEB_DIR_ADMIN; ?>images/print_invoice.png"/></a></span>
<script type="text/javascript">
// Popup window code
function newPopup(url) {
	popupWindow = window.open(
		url,'popUpWindow','height=700,width=800,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
}
</script></td>
                 <td width="190" valign="top">&nbsp;&nbsp;&nbsp;&nbsp;<?php if($status!='Cancelled'){ ?><a href="<?php print WEB_URL_ADMIN.'booking_hotel/cancel_booking/'.$result_view->booking_no; ?>" onclick="return confirm('Are You Sure You want Cancel this booking?')"><input type="image" src="<?php print WEB_DIR_ADMIN; ?>images/cancel_booking.png"/></a><?php } ?></td>
                  <td width="253" valign="top">&nbsp;</td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
        </table>

             <div class="clr"></div>
        </div><!--mdle container end-->
