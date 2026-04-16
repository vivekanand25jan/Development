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
#button_div{display:none;}
.buttonsmain{display:none;}
.rightcallmain{display:none;}
}
</style>
	      
        <div class="mdle_container"><!--mdle container start-->

        <table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
               <tr>
                <td height="30" bgcolor="#0094DB" class="infor_contanerader_header"><strong>&nbsp;&nbsp;&nbsp;&nbsp;Accomodation Voucher</strong></td>
              </tr>
              <tr>
                <td><table width="600" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="159">&nbsp;</td>
                    <td width="441">&nbsp;</td>
                  </tr>
                    <tr>
                    <td width="159" class="infor_contanerader_text1"><strong>Booking Reference :</strong></td>
                    <td class="infor_contanerader_text1"> 
                    <strong>
                  <?php
				 
				 
				     echo $result_view->tour_no;  
				   ?>
					</strong>
</td>
                  </tr>
                  <?php
				  if($att_cust!='success')
				  {
					  ?>
                   <tr>
                    <td>Attach to the Customer : </td>
                    <td  valign="middle">
					<form action="<?php print WEB_URL_ADMIN.'admin/attach_mail_sight'; ?>" method="post">
					<input type="text" name="attach_mail"  /><input type="hidden" value="<?php echo  $result_view->book_no; ?>" name="book_id" />
					<input type="image" src="<?php print WEB_DIR_ADMIN; ?>images/go.jpg"/></form></td>
					
                  </tr>
                  <?php
				  }
				  ?>
				  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
					
                  </tr>
				  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
					
                  </tr>
                  
                </table></td>
              </tr>
              
              
                            <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="30" bgcolor="#0094DB" class="infor_contanerader_header"><strong>&nbsp;&nbsp;&nbsp;&nbsp;Tour &amp; Depature Point </strong></td>
              </tr>
              <tr>
                <td><table width="600" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="120">&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                    <tr>
                    <td width="120" class="infor_contanerader_text1">Sightseen Name :</td>
                    <td class="infor_contanerader_text1">
                      <?php
				 
				 
				     echo $result_view->transfer_item;  
				   ?>
                   </td>
<td>&nbsp;</td>
                  </tr>
                  <tr>
                    
                  </tr>
                       <tr>
                    <td>Passengers :</td>
                    <td><?php
				 
				 
				     echo $result_view->pax_count;  
				   ?></td>
                  </tr>
                       <tr>
                    <td>Language :</td>
                    <td><?php
				 
				 
				     echo $result_view->lang;  
				   ?></td>
                  </tr>
                  
                </table></td>
              </tr>
              <tr>
                <td></td>
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
                        <td width="125" height="22" bgcolor="#DFDFDF">Service Duration </td>
                        <td bgcolor="#DFDFDF"><?php
				 
				 if($result_view->duration=='')
						{
						echo "Not Provided";
						}
						else
						{
						 echo $result_view->duration; 
						 }
				    
				   ?></td>
                      </tr>
                      <tr>
                        <td height="22" bgcolor="#DFDFDF">Start Time</td>
                        <td bgcolor="#DFDFDF"><?php echo $result_view->tour_departure_time; ?></td>
                      </tr><tr>
                        <td height="22" bgcolor="#DFDFDF"><span class="infor_contanerader_text1">Date Reservation Made:</span></td>
                        <td bgcolor="#DFDFDF"><?php
				    echo $result_view->voucher_date;  
				   ?></td>
                      </tr>
                    </table></td>
                    <td width="380" valign="top"><table width="378" border="0" cellspacing="1" cellpadding="0">
                      <tr>
                        <td width="162" height="22" bgcolor="#DFDFDF"><span style="padding-left:0px; ">Pick Up From</span></td>
                        <td width="218" bgcolor="#DFDFDF"><?php
						if($result_view->tour_departure_point1=='')
						{
						echo $result_view->tour_departure_point; 
						}
						else
						{
						echo $result_view->tour_departure_point1;
						}
						echo "<br>".$result_view->drop_off;
						?></td>
                      </tr>
                      <tr>
                        <td width="162" height="22" bgcolor="#DFDFDF">Tour Supplied By </td>
                        <td width="218" bgcolor="#DFDFDF"><?php
				 
				 
				     echo $result_view->tour_supplier;  
				   ?></td>
                      </tr>                      
                      <tr>
                        <td height="22" bgcolor="#DFDFDF">Telephone</td>
                        <td bgcolor="#DFDFDF"><?php
				 
				 
				     echo $result_view->phone;  
				   ?></td>
                      </tr>
                      
                                            <tr>
                        <td height="22" bgcolor="#DFDFDF"><span class="infor_contanerader_text1">Status:</span></td>
                        <td bgcolor="#DFDFDF"><?php
				 
				 
				     echo $result_view->status;  
				   ?></td>
                      </tr>
                      
                    </table></td>
                    <td valign="top"><table width="100%" border="0" cellspacing="1" cellpadding="0">
                      <tr>
                        <td height="22" bgcolor="#DFDFDF">Lead Pax</td>
                        </tr>
						
						 
						
                      <?php 
  ?>
						 
						
						
						
                      <tr>
                        <td height="22" bgcolor="#DFDFDF"><span class="infor_contanerader_text1"><?php
				 
				 
				     echo $result_view->leadpax;  
				   ?></span></td>
                        </tr>
                    </table></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
			 
                <td><table width="600" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td width="130" class="infor_contanerader_text1">&nbsp;</td>
                    <td class="infor_contanerader_text1">&nbsp;</td>
                  </tr>
                </table></td>
              </tr>
              
                  
                  
                  
                  
                </table></td>
              </tr>
              <tr>
                <td height="5">&nbsp;</td>
              </tr> 
             <tr>
                <td height="30" bgcolor="#0094DB"class="infor_contanerader_header"><strong>&nbsp;&nbsp;&nbsp;&nbsp;Please Note
                </strong></td>
              </tr> 

              <tr>
                <td height="5">&nbsp;</td>
              </tr> 
             
                            <tr>
                <td class="infor_contanerader_text1"><strong>
                 <?php 
						
						echo $result_view->note;
						
						?>
                </strong></td>
              </tr>
              <tr>
                <td height="5">&nbsp;</td>
              </tr> 
              <tr>
                <td height="30" bgcolor="#0094DB"class="infor_contanerader_header"><strong>&nbsp;&nbsp;&nbsp;&nbsp;Cancellation Policy
                </strong></td>
              </tr> 
               <tr>
                <td height="5">&nbsp;</td>
              </tr> 
        <tr>
                <td class="infor_contanerader_text1"><strong>
                  <?php
				 
				 
				     echo $result_view->policy;  
				   ?>
            </strong></td>
              </tr>
               <tr>
                <td height="5">&nbsp;</td>
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
                <td width="190" valign="top">&nbsp;&nbsp;&nbsp;&nbsp;<?php if($result_view->status!='Cancelled'){ ?><input type="image" src="<?php print WEB_DIR_ADMIN; ?>images/print_voucher.png" onClick="javascript:window.print();" /><?php } ?></td>
                 <td width="190" valign="top">&nbsp;&nbsp;&nbsp;&nbsp;<a onclick="JavaScript:newPopup('<?php print WEB_URL_ADMIN.'admin/show_invoice/'.$result_view->book_no; ?>');"><input type="image" src="<?php print WEB_DIR_ADMIN; ?>images/print_invoice.png"/></a></span>
<script type="text/javascript">
// Popup window code
function newPopup(url) {
	popupWindow = window.open(
		url,'popUpWindow','height=700,width=800,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
}
</script></td>
                 <td width="190" valign="top">&nbsp;&nbsp;&nbsp;&nbsp;<?php if($result_view->status!='Cancelled'){ ?><a href="<?php print WEB_URL_ADMIN.'admin/cancel_booking/'.$result_view->book_no; ?>" onclick="return confirm('Are You Sure You want Cancel this booking?')"><input type="image" src="<?php print WEB_DIR_ADMIN; ?>images/cancel_booking.png"/></a><?php } ?></td>
                  <td width="253" valign="top">&nbsp;</td>
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
