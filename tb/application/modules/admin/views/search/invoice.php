<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>welcome</title>
<script type="text/javascript" src="<?php print WEB_DIR; ?>javascripts/tinybox.js"></script>
<style type="text/css">
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	font-family:Arial, Helvetica, sans-serif;
	font-size:12px;
	text-decoration:none;
	color:#000;
}
.outer_invoice{
	width:auto;
	height:500px;
/*	overflow-x:hidden;
	overflow-y:scroll;*/
	padding:10px 20px 10px 0px;
}

@media print
{
body{font-family:georgia,times,sans-serif;}
#outer_invoice{display:block;}
#button_pay{display:none;}
}
</style>
</head>

<script type="text/javascript" src="<?php print WEB_DIR; ?>css/jquery.js"></script>
<script type="text/javascript" src="<?php print WEB_DIR; ?>css/thickbox.js"></script>
<body>
<div class="outer_invoice">
<table width="750" border="0" align="center" cellpadding="0" cellspacing="4">
  <tr>
    <td><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
      
  
      <tr>
        <td height="30" bgcolor="#0094DB" class="infor_contanerader_header"><h2><strong>&nbsp;&nbsp;&nbsp;&nbsp;Hotel Information</strong></h2></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td valign="top"><table width="700" border="0" cellspacing="0" cellpadding="0">
         
          <tr>
            <td width="123" class="infor_contanerader_text1">Hotel Name</td>
            <td width="577" class="infor_contanerader_text1"><?php echo $result_view->hotelname; ?></td>

          </tr>
          <tr>

            <td class="infor_contanerader_text1">City</td>
            <td class="infor_contanerader_text1"><?php echo $result_view->hotelIdent; ?></td>
          </tr>          
                <tr>

            <td class="infor_contanerader_text1">&nbsp;</td>
            <td class="infor_contanerader_text1">&nbsp;</td>
          </tr>  
          </table></td>
      </tr>
         
      <tr>
        <td height="30" bgcolor="#0094DB" class="infor_contanerader_header"><h2><strong>&nbsp;&nbsp;&nbsp;&nbsp;Travel Agency information</strong></h2></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><table width="700" border="0" cellspacing="0" cellpadding="0">
         
          <tr>
            <td width="120" class="infor_contanerader_text1">Name</td>
            <td width="200" class="infor_contanerader_text1">Strawberry World,</td>
            <td class="infor_contanerader_text1">&nbsp;</td>
            <td class="infor_contanerader_text1">&nbsp;</td>
          </tr>
          <tr>
            <td  class="infor_contanerader_text1">Address :</td>
            <td>Need Address</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td class="infor_contanerader_text1">Tel :</td>
            <td>   
            Mobile - Nil
            Fax : Nil </td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>City</td>
            <td>Need</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        
        </table></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="1" bgcolor="#999999"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="30" bgcolor="#0094DB" class="infor_contanerader_header"><h2><strong>&nbsp;&nbsp;&nbsp;&nbsp;Details</strong></h2></td>
      </tr>
      <tr>
        <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="infor_contanerader_text1">
          <tr>
            <td>&nbsp;</td>
          </tr>
          
          <tr>
            <td><table width="100%" border="0" cellspacing="1" cellpadding="1">
           
              <tr>
                <td width="150" height="25" align="center" bgcolor="#F4F4F4">Checkin date</td>
                <td width="150" height="25" align="center" bgcolor="#F4F4F4">Checkout Date</td>
                <td height="25" align="center" bgcolor="#F4F4F4">Room Type</td>
                 <td height="25" align="center" bgcolor="#F4F4F4">No of days</td>
                <td height="25" align="center" bgcolor="#F4F4F4">Board basis</td>
              </tr>
              <tr>
                <td align="center" bgcolor="#F4F4F4"><?php $check_in=$result_view->check_in;   echo $this->Admin_Model->date_formate($check_in);?></td>
                <td align="center" bgcolor="#F4F4F4"><?php $check_out=$result_view->check_out;  echo $this->Admin_Model->date_formate($check_out); ?></td>
                <td align="center" bgcolor="#F4F4F4">
				<?php
					 $rtype=$result_view->room_type;
					 
					 $room_type=explode('-',$rtype);
					 for($i=0;$i<count($room_type);$i++){
						 
						 echo $room_type[$i]. "<br/>";
					 }
				 ?>
                 </td>
<td align="center" bgcolor="#F4F4F4">                <?php
					
				$diff = strtotime($check_out) - strtotime($check_in);
	
				$sec   = $diff % 60;
				$diff  = intval($diff / 60);
				$min   = $diff % 60;
				$diff  = intval($diff / 60);
				$hours = $diff % 24;
				$days  = intval($diff / 24);
				
					print $days;
				 ?></td>
                <td align="center" bgcolor="#F4F4F4"><?php echo $brkfast=$result_view->inclusion; ?></td>
              </tr>
            </table></td>
          </tr>
          <?php foreach($paxname as $get_guest_ac)
						   { 
						   $salutation=$get_guest_ac->salutation; if($salutation==1){ $gender='Mr.'; }elseif($salutation==2){  $gender='Mrs.'; }elseif($salutation==3){ $gender='Ms.'; }elseif($salutation==5){ $gender='Dr.'; }
						   ?>
          <tr>
            <td><table width="700" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="150">Customer's name</td>
                <td><?php  echo $get_guest_ac->fname.' '.$get_guest_ac->lname; 
						 $age=$get_guest_ac->age; if($age!=0) { echo " &nbsp;&nbsp;&nbsp;  Age:".$age. " Years old" ;} 
						 ?></td>
              </tr>
            </table></td>
          </tr>
          <?php } ?>
          
          <tr>
            <td>&nbsp;</td>
          </tr>
        </table></td>
      </tr>
     
      
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="infor_contanerader_text1">
          <tr>
            <td width="130"><table width="100%" border="0" cellspacing="1" cellpadding="1">
              
              <tr>
                <td width="150" height="25" align="center" bgcolor="#F4F4F4">Booking date</td>
                <td width="150" height="25" align="center" bgcolor="#F4F4F4">Booking reference</td>
                <td width="150" height="25" align="center" bgcolor="#F4F4F4">Booked Amount</td>
                <!--<td height="25" align="center" bgcolor="#F4F4F4">Cancel Charge</td>-->
				<?php
				$cur = $result_view->currency_type;
				 if($cur=="USD" || $cur=="GBP" || $cur=='AUD')
				 {
					  $cur_val=$this->Admin_Model->get_currency_val($cur);
					  $perday=$result_view->amount*$cur_val;
					  $pernightval_hb=number_format(ceil($perday),2,'.','').' '.$cur.'<br/>'; 
				 }
				 else
				 {
					  $perday=$result_view->amount;
					  $pernightval_hb=number_format(ceil($perday),2,'.','').' '.$cur.'<br/>';  
				 }
		   
				?>
              </tr>
              <tr>
                <td align="center" bgcolor="#F4F4F4"><?php echo $this->Admin_Model->date_formate($result_view->voucher_date); ?></td>
                <td align="center" bgcolor="#F4F4F4"><?php echo $result_view->booking_ref_no; ?></td>
                <td align="center" bgcolor="#F4F4F4"><?php echo $pernightval_hb; ?></td>
                

              </tr>
            </table></td>
          </tr>
         
        </table></td>
      </tr>
        <tr>
        <td>&nbsp;</td>
      </tr>
      </table></td>
  </tr>
  <tr>
  <td>
  <div id="button_pay">
  <a onclick="javascript:window.print();" style="cursor:pointer"><input type="image" src="<?php print WEB_DIR_ADMIN; ?>images/print_invoice.png" /></a> </div>
  </td>
  </tr>

</table>
</div>
</body>
</html>
