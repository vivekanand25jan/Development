<link href="<?php print WEB_DIR_ADMIN?>css/vochuer.css" rel="stylesheet" type="text/css" />
<style>
@media print
{
body{font-family:georgia,times,sans-serif;}
#top_container{display:none;}
#vochur_h1{display:block;}
#print_btn_out{display:none;}
.footer{display:none;}
input#btnPrint {
display: none;
}
#button_div{display:none;}
.buttonsmain{display:none;}
.rightcallmain{display:none;}
.top_container{display:none;}
}
</style>
	      
        <div class="mdle_container"><!--mdle container start-->

        <table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
              
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
                  <?php
				   //$hname= $this->Booking_Model->get_hotel_name($gta_re->hotel_code);  
				  echo $hotelname=$result_view->hotelname; ?>
					
</td>
                  </tr>
                  <tr>
                    <td  class="infor_contanerader_text1">Address :</td>
                    <td class="infor_contanerader_text1"><?php echo $result_view->address;?> ,<?php //echo $this->session->userdata('sadd2');?> </td>
                  </tr>
                  <tr>
                    <td class="infor_contanerader_text1"></td>
                    <td class="infor_contanerader_text1"></td>
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
                        <td bgcolor="#DFDFDF"><span class="infor_contanerader_text1"><?php  
            echo $city_name=$result_view->city; ?></span></td>
                      </tr>
                      <tr>
                        <td height="22" bgcolor="#DFDFDF"><span class="infor_contanerader_text1">Check-In Date</span></td>
                        <td bgcolor="#DFDFDF"><span class="infor_contanerader_text1"> <?php echo  $cin=$this->Admin_Model->date_formate($result_view->check_in);?></span></td>
                      </tr>
                      <tr>
                        <td height="22" bgcolor="#DFDFDF"><span class="infor_contanerader_text1">Check-Out Date</span></td>
                        <td bgcolor="#DFDFDF"><span class="infor_contanerader_text1"> <?php echo  $cout=$this->Admin_Model->date_formate($result_view->check_out);?></span></td>
                      </tr>
                    </table></td>
                    <td width="380" valign="top"><table width="378" border="0" cellspacing="1" cellpadding="0">
                      <tr>
                        <td width="162" height="22" bgcolor="#DFDFDF"><span class="infor_contanerader_text1">Confirmation No</span></td>
                        <td width="218" bgcolor="#DFDFDF"><span class="infor_contanerader_text1"><?php   echo $refno=$result_view->inoffcode.'-'.$result_view->booking_ref_no;  ?>
        
        </span></td>
                      </tr>
                      <tr>
                        <td width="162" height="22" bgcolor="#DFDFDF"><span class="infor_contanerader_text1">Inclusion</span></td>
                        <td width="218" bgcolor="#DFDFDF"><span class="infor_contanerader_text1"><?php echo $result_view->inclusion;?></span></td>
                      </tr>                      
                      <tr>
                        <td height="22" bgcolor="#DFDFDF"><span class="infor_contanerader_text1">Agency Ref: No</span></td>
                        <td bgcolor="#DFDFDF"><span class="infor_contanerader_text1"><?php  echo $result_view->itemcode; ?></span></td>
                      </tr>
                      <tr>
                        <td height="22" bgcolor="#DFDFDF"><span class="infor_contanerader_text1">Date Reservation Made:</span></td>
                        <td bgcolor="#DFDFDF"><span class="infor_contanerader_text1">
						
                        
                        <?php echo $result_view->voucher_date;?>
                        </span></td>
                      </tr>
                                            <tr>
                        <td height="22" bgcolor="#DFDFDF"><span class="infor_contanerader_text1">Status:</span></td>
                        <td bgcolor="#DFDFDF"><span class="infor_contanerader_text1">
						
                        
                        <?php echo $status=$result_view->status;?>
                        </span></td>
                      </tr>
                      
                    </table></td>
                    <td valign="top"><table width="100%" border="0" cellspacing="1" cellpadding="0">
                      <tr>
                        <td height="22" bgcolor="#DFDFDF"><span class="infor_contanerader_text1">Names Of Guest</span></td>
                        </tr>
						
						 
						
                      <?php $paxname=$this->Admin_Model->get_paxname($result_view->booking_no);
  $cntadult=count($paxname) ;
  ?>
						 
						 <?php foreach($paxname as $get_guest_ac)
						   {
							   
							   $salutation=$get_guest_ac->salutation; if($salutation==1){ $salutation='Mr.'; }elseif($salutation==2){  $salutation='Mrs.'; }elseif($salutation==3){ $salutation='Ms.'; }elseif($salutation==5){ $salutation='Dr.'; }
						 ?>
                      <tr>
                        <td height="22" bgcolor="#DFDFDF"><span class="infor_contanerader_text1"> <?php echo $pname=$salutation.' '.$get_guest_ac->fname. ' '.$get_guest_ac->lname ?>   
                        
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
                    <td class="infor_contanerader_text1"> <?php print $result_view->adult_count; ?></td>
                  </tr>
				 
				  <tr>
                    <td width="130" class="infor_contanerader_text1">NO OF CHILD</td>
                    <td class="infor_contanerader_text1"> <?php print $result_view->child_count; ?></td>
                  </tr>
                 
                  <tr>
                  <br />
                    <td class="infor_contanerader_text1">No of room</td>
                    <td class="infor_contanerader_text1">
					<?php
					print $result_view->no_of_room;
					 ?></td>
                  </tr>
				 
                   <tr>
                  <br />
                    <td class="infor_contanerader_text1">Room Type</td>
                    <td class="infor_contanerader_text1">
					<?php
					print $rtype=$result_view->room_type;
					 ?></td>
                  </tr>
                
				 
                  <tr>
                    <td class="infor_contanerader_text1">No of Nights</td>
                    <td class="infor_contanerader_text1"><?php
					
				/*	$agentname=$acc_info->agent_name;
					$mail=$acc_info->email;
				$this->Booking_Model->booking_mail($hotelname,$refno,$pname,$rtype,$cin,$cout,$status,$agentname,$mail);	*/				
					
					$diff = strtotime($result_view->check_out) - strtotime($result_view->check_in);
	
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
              
                  
                  
                  
                  
                </table></td>
              </tr>
              <tr>
                <td height="5">&nbsp;</td>
              </tr> 
             <tr>
                <td height="30" bgcolor="#0094DB"class="infor_contanerader_header"><strong>&nbsp;&nbsp;&nbsp;&nbsp;Remarks
                </strong></td>
              </tr> 

              <tr>
                <td height="5">&nbsp;</td>
              </tr> 
              <tr>
                <td>&nbsp;<!--Keys must be collected before 20:00hrs at the reception.--></td>
              </tr>
                            <tr>
                <td class="infor_contanerader_text1"><strong><?php print $result_view->comp_pol; ?>
                </strong></td>
              </tr>
              <tr>
                <td height="5">&nbsp;</td>
              </tr> 
       
            </table></td>
          </tr>
          <tr>
            <td>
            <div id="button_div">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
             <tr>
                <td width="253" align="right" >&nbsp;</td>
                <td width="190" valign="top">&nbsp;&nbsp;&nbsp;&nbsp;<?php if($status!='Cancelled'){ ?><input type="image" src="<?php print WEB_DIR_ADMIN; ?>images/print_voucher.png" onClick="javascript:window.print();" /><?php } ?></td>
                 <td width="190" valign="top">&nbsp;&nbsp;&nbsp;&nbsp;<a onclick="JavaScript:newPopup('<?php print WEB_URL_ADMIN.'admin/show_invoice/'.$result_view->booking_no; ?>');"><input type="image" src="<?php print WEB_DIR_ADMIN; ?>images/print_invoice.png"/></a></span>
<script type="text/javascript">
// Popup window code
function newPopup(url) {
	popupWindow = window.open(
		url,'popUpWindow','height=700,width=800,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
}
</script></td>
                 <!--<td width="190" valign="top">&nbsp;&nbsp;&nbsp;&nbsp;<?php if($status!='Cancelled'){ ?><a href="<?php print WEB_URL_ADMIN.'booking_hotel/cancel_booking/'.$result_view->booking_no; ?>" onclick="return confirm('Are You Sure You want Cancel this booking?')"><input type="image" src="<?php print WEB_DIR_ADMIN; ?>images/cancel_booking.png"/></a><?php } ?></td>
                  <td width="253" valign="top">&nbsp;</td>-->
              </tr>
            </table>
            </div>
            </td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
        </table>

 
             <div class="clr"></div>
        </div><!--mdle container end-->
