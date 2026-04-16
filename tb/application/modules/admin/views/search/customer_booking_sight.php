<script language="javascript" type="text/javascript">
<!--janani-->
function book_vali()
{
	/*var chks=new Array();
	var chks[] = document.getElementsByName('edit_status_ch');
	var chks1 = document.getElementsByName('edit_status');
	
	if(chks1=='-Select-')
	{
		 alert("Please select Edit Status.");
  return false;
	}
 var checkCount = 0;
 for (var i = 0; i < chks.length; i++)
 {
  if (chks[i].checked)
  {
   checkCount++;
  }
 }
 if (checkCount < 1)
 {
  alert("Please select atleast one.");
  return false;
 }
 else
 {
 */
 // return confirm('Are You Sure, You want to confirm Edit Status of the booking?');
  document.form1.submit();
  
// }

	
}</script>


<script>
	
function showUser(str)
{

/*
if (str=="")
  {
  document.getElementById("city").innerHTML="";
  return;
  } */
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("inputfiled").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","<?php print WEB_URL_ADMIN ?>admin/edit_status/"+str,true);
xmlhttp.send();



}
</script>
<div class="agent_dash_out">
<div class="my_acc_out">
            	<div id="TabbedPanels1" class="TabbedPanels">
				<ul class="TabbedPanelsTabGroup">
                <li class="TabbedPanelsTab" tabindex="0">Tours - Confirmation Booking</li>
				<li class="TabbedPanelsTab" tabindex="0">Tours - On Request Booking</li>                         	<li class="TabbedPanelsTab" tabindex="0">Tours - Cancelled Booking</li>
				</ul>
				<div class="TabbedPanelsContentGroup">
				<div class="TabbedPanelsContent">
                  <div id="descTab">  
				<table width="100%" border="1" bordercolor="#C5C5C5" align="center" cellpadding="1" cellspacing="1" class="table_boredr_htt">
              <tr >
      <td align="left" valign="middle"  bgcolor="#00CCFF" scope="row"><strong>Booking Id</strong></td>
     
      <!--<td align="left" valign="middle" bgcolor="#00CCFF"><strong>Agent Reference </strong></td>-->
      <td align="left" valign="middle" bgcolor="#00CCFF"><strong>Start</strong></td>
      <td align="left" valign="middle" bgcolor="#00CCFF"><strong>Booking Name </strong></td>
      <td align="left" valign="middle" bgcolor="#00CCFF"><strong>Email</strong></td>
      <td align="left" valign="middle" bgcolor="#00CCFF"><strong>Passenger</strong></td>
      <td align="left" valign="middle" bgcolor="#00CCFF"><strong>Total Price</strong></td>
      <td align="left" valign="middle" bgcolor="#00CCFF"><strong>Actual Price</strong></td>
      <td align="left" valign="middle" bgcolor="#00CCFF"><strong>Payment Status </strong></td>
	  <td align="left" valign="middle" bgcolor="#00CCFF"><strong>Booking Status </strong></td>
      <td align="left" valign="middle" bgcolor="#00CCFF"><strong>Charges Deadline</strong></td>
      <td align="left" valign="middle" bgcolor="#00CCFF"><strong>Requested Date</strong></td>
    </tr>
  <?php $i=0; if($report1!=''){ foreach($report1 as $row) { ?>
    
    <tr>
      <td height="25" bgcolor="#F2F2F2" scope="row" align="left"><b><a href="<?php print WEB_URL_ADMIN.'admin/voucher_print_trans'.'/'.$row->book_no; ?>"><?php echo $row->tour_no; ?></a></b></th>
      
      <!--<td bgcolor="#F2F2F2"> print $row->agent_ref; ?></td>-->
      <td bgcolor="#F2F2F2"><?php $date_ck= $row->transfer_date;
	   echo date('d M  Y', strtotime($date_ck)); 
	   ?></td>
      <td bgcolor="#F2F2F2" align="left" valign="middle"><?php echo $row->leadpax; ?></td>
      <td bgcolor="#F2F2F2" align="left" valign="middle"><?php print $this->Admin_Model->get_agentemailaddress($row->agent_id);  ?></td>
      <td bgcolor="#F2F2F2" align="left" valign="middle"><?php print $row->pax_count; ?></td>
	  <?php
	  
	                                      $api4="gta";
	                                 $service1=$this->Admin_Model->get_markup_user($api4);
									  if($service1!='')
									  {
										 $markuph=$service1->Markup;
										 $commissionh=$service1->Commission;
									  }
									  else
									  {
										  $markuph=0;
										 $commissionh=0;
									  }
	 $without_markup = ($row->book_amt*100) /(100 + $markuph);
	 $without_markup1 = ceil($without_markup);
	 // $without_markup = ($row->amount*100) /(100 + $row->markup);
	  ?>
      <td bgcolor="#F2F2F2" align="left" valign="middle"><?php print $row->book_amt."грн"; ?></td>
      <td bgcolor="#F2F2F2" align="left" valign="middle"><?php print $without_markup1."грн"; ?></td>
      <td bgcolor="#F2F2F2" align="left" valign="middle">
		<?php echo $row->payment_status; ?>
		</td>
	  <td bgcolor="#F2F2F2" align="left" valign="middle"><?php
	  echo $row->status;
		/*if($status=='OK' || $status=='CONFIRMED' || $status=='B' ||  $status=='b' || $status=='Confirmed'){
			
			echo "Confirmed";
		}
		elseif($status=='CA' || $status=='C' || $status=='Cancelled' || $status=='CANCELLED'){
		echo "Cancelled";
		}*/
	    ?></td>
		
      <td bgcolor="#F2F2F2" align="left" valign="middle"><?php 
	  
	  
	  $a=$row->policy;
	  $deadline=explode(" ",$a);
	  echo $deadline[0];
	  
	  
	  
	  ?></td>
      <td bgcolor="#F2F2F2" align="left" valign="middle"><?php $cancel_fromdate= $row->voucher_date;
	   //echo date('d M  Y', strtotime($cancel_fromdate)); 
	   echo $cancel_fromdate;
	   ?></td>
    </tr>
    <?php $i++; } ?>
	<tr><td colspan="11" align="center" bgcolor="#FFFFFF"><?php echo $this->pagination->create_links(); ?></td></tr>
<?php	}
		else { ?>
    <tr>
      <td colspan="11" align="center" bgcolor="#FFFFFF"><strong>No Record Found </strong></td>
    </tr>
    <tr>
      <td colspan="11" align="center" bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="11" align="center" bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
    <?php } ?>
  </table>
  </div>
              </div>
              
              
                                 
                                  
                                  
                                  
                                  
                <!--Tab panel 2 start here -->
               <div class="TabbedPanelsContent">
                 <div id="descTab">  
               <form action="<?php print WEB_URL_ADMIN.'admin/edit_status1_sightseen'; ?>" method="post" name="form1">
              <table><tr><td>
              <table width="100%" border="1" bordercolor="#C5C5C5" align="center" cellpadding="1" cellspacing="1" class="table_boredr_htt">
              <tr class="title_text">
      <td colspan="11" align="right" valign="middle" bgcolor="#00CCFF" scope="row"><select  name="edit_status" onchange="javascript:return book_vali()"  id="edit_status">
        <option selected  >-Select-</option>
        <option value="Confirmed">Confirmed</option>
        <option value="Cancelled">Cancelled</option>
      </select>

     </td>
   
      <!--<td align="left" valign="middle" bgcolor="#00CCFF"><strong>Agent Reference </strong></td>-->
      </tr></table></td></tr><tr><td>
        <table width="100%" border="1" bordercolor="#C5C5C5" align="center" cellpadding="1" cellspacing="1" class="table_boredr_htt">
              <tr class="title_text">
  
      <td align="left" valign="middle" bgcolor="#00CCFF" scope="row"><strong>Booking Id</strong></td>
     
      <!--<td align="left" valign="middle" bgcolor="#00CCFF"><strong>Agent Reference </strong></td>-->
      <td align="left" valign="middle" bgcolor="#00CCFF"><strong>Start</strong></td>
      <td align="left" valign="middle" bgcolor="#00CCFF"><strong>Booking Name </strong></td>
      <td align="left" valign="middle" bgcolor="#00CCFF"><strong>Email</strong></td>
      <td align="left" valign="middle" bgcolor="#00CCFF"><strong>Passenger</strong></td>
      <td align="left" valign="middle" bgcolor="#00CCFF"><strong>Total Price</strong></td>
      <td width="left" align="left" valign="middle" bgcolor="#00CCFF"><strong>Actual Price</strong></td>
     
      <td align="left" valign="middle" bgcolor="#00CCFF"><strong>Payment Status </strong></td>
        <td align="left" valign="middle" bgcolor="#00CCFF"><strong>Edit Status </strong></td>
	  <td align="left" valign="middle" bgcolor="#00CCFF"><strong>Booking Status </strong></td>
      <td align="left" valign="middle" bgcolor="#00CCFF"><strong>Charges Deadline</strong></td>
      <td align="left" valign="middle" bgcolor="#00CCFF"><strong>Requested Date</strong></td>
    </tr>
   <?php $i=0; if($report11!=''){ foreach($report11 as $row) { ?>
    <tr>
      <td height="25" bgcolor="#F2F2F2" scope="row" align="left"><b><a href="<?php print WEB_URL_ADMIN.'admin/voucher_print'.'/'.$row->booking_no; ?>"><?php echo $row->book_no; ?></a></b></th>
      
      <!--<td bgcolor="#F2F2F2"> print $row->agent_ref; ?></td>-->
      <td bgcolor="#F2F2F2"><?php $date_ck= $row->transfer_date;
	   echo date('d M  Y', strtotime($date_ck)); 
	   ?></td>
      <td bgcolor="#F2F2F2" align="left" valign="middle"><?php echo $row->leadpax; ?></td>
      <td bgcolor="#F2F2F2" align="left" valign="middle"><?php print $this->Admin_Model->get_agentemailaddress($row->agent_id);  ?></td>
      <td bgcolor="#F2F2F2" align="left" valign="middle"><?php print $row->pax_count; ?></td>
	   <?php
	  
	                                      $api4="gta";
	                                 $service1=$this->Admin_Model->get_markup_user($api4);
									  if($service1!='')
									  {
										 $markuph=$service1->Markup;
										 $commissionh=$service1->Commission;
									  }
									  else
									  {
										  $markuph=0;
										 $commissionh=0;
									  }
	 $without_markup = ($row->book_amt*100) /(100 + $markuph);
	 $without_markup1 = ceil($without_markup);
	 // $without_markup = ($row->amount*100) /(100 + $row->markup);
	  ?>
      <td bgcolor="#F2F2F2" align="left" valign="middle"><?php print $row->book_amt."грн"; ?></td>
      <td bgcolor="#F2F2F2" align="left" valign="middle"><?php print number_format($without_markup,2,'.','').' '.$cur; ?></td>
      <td bgcolor="#F2F2F2" align="left" valign="middle">
		<?php echo "".$row->payment_status; ?>
		</td>
          <td bgcolor="#F2F2F2" align="left" valign="middle">
        <input type="checkbox" name="edit_status_ch[]" value="<?php echo $row->booking_no; ?>">
        </td>
	  <td bgcolor="#F2F2F2" align="left" valign="middle">
	    <?php
	    $status=$row->status;
		echo $status;
	/*	if($status=='OK' || $status=='CONFIRMED' || $status=='B' ||  $status=='b' || $status=='Confirmed'){
			
			echo "Confirmed";
		}
		elseif($status=='CA' || $status=='C' || $status=='Cancelled' || $status=='CANCELLED'){
		echo "Cancelled";
		}*/
	    ?>
	
        </td>
		
      <td bgcolor="#F2F2F2" align="left" valign="middle"><?php $cancel_fromdate= $row->cancel_fromdate;
	   //echo date('d M  Y', strtotime($cancel_fromdate)); 
	   echo $cancel_fromdate;
	   ?></td>
      <td bgcolor="#F2F2F2" align="left" valign="middle"><?php $voucher_date= $row->voucher_date;
	   echo date('d M  Y', strtotime($voucher_date)); 
	   ?></td>
    </tr>
    <?php $i++; } ?>
	<tr><td colspan="12" align="center" bgcolor="#FFFFFF"><?php echo $this->pagination->create_links(); ?></td></tr>
<?php	}
		else { ?>
    <tr>
      <td colspan="12" align="center" bgcolor="#FFFFFF"><strong>No Record Found </strong></td>
    </tr>
    <tr>
      <td colspan="12" align="center" bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="12" align="center" bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
    <?php } ?>
  </table>
               </td></tr></table> 
               </form></div>
                </div>
                
                <!--Tab panel 2 End here -->
                <div class="TabbedPanelsContent">
              <div id="descTab">                          	  	
                               
<table width="100%" border="1" bordercolor="#C5C5C5" align="center" cellpadding="1" cellspacing="1" class="table_boredr_htt">
              <tr >
      <td align="left" valign="middle"  bgcolor="#00CCFF" scope="row"><strong>Booking Id</strong></td>
     
      <!--<td align="left" valign="middle" bgcolor="#00CCFF"><strong>Agent Reference </strong></td>-->
      <td align="left" valign="middle" bgcolor="#00CCFF"><strong>Start</strong></td>
      <td align="left" valign="middle" bgcolor="#00CCFF"><strong>Booking Name </strong></td>
      <td align="left" valign="middle" bgcolor="#00CCFF"><strong>Email</strong></td>
      <td align="left" valign="middle" bgcolor="#00CCFF"><strong>Passenger</strong></td>
      <td align="left" valign="middle" bgcolor="#00CCFF"><strong>Total Price</strong></td>
      <td align="left" valign="middle" bgcolor="#00CCFF"><strong>Actual Price</strong></td>
      <td align="left" valign="middle" bgcolor="#00CCFF"><strong>Payment Status </strong></td>
	  <td align="left" valign="middle" bgcolor="#00CCFF"><strong>Booking Status </strong></td>
      <td align="left" valign="middle" bgcolor="#00CCFF"><strong>Charges Deadline</strong></td>
      <td align="left" valign="middle" bgcolor="#00CCFF"><strong>Requested Date</strong></td>
    </tr>
  <?php $i=0; if($report2!=''){ foreach($report2 as $row) { ?>
    
    <tr>
      <td height="25" bgcolor="#F2F2F2" scope="row" align="left"><b><a href="<?php print WEB_URL_ADMIN.'admin/voucher_print_trans'.'/'.$row->book_no; ?>"><?php echo $row->tour_no; ?></a></b></th>
      
      <!--<td bgcolor="#F2F2F2"> print $row->agent_ref; ?></td>-->
      <td bgcolor="#F2F2F2"><?php $date_ck= $row->transfer_date;
	   echo date('d M  Y', strtotime($date_ck)); 
	   ?></td>
      <td bgcolor="#F2F2F2" align="left" valign="middle"><?php echo $row->leadpax; ?></td>
      <td bgcolor="#F2F2F2" align="left" valign="middle"><?php print $this->Admin_Model->get_agentemailaddress($row->agent_id);  ?></td>
      <td bgcolor="#F2F2F2" align="left" valign="middle"><?php print $row->pax_count; ?></td>
	  <?php
	  
	                                      $api4="gta";
	                                 $service1=$this->Admin_Model->get_markup_user($api4);
									  if($service1!='')
									  {
										 $markuph=$service1->Markup;
										 $commissionh=$service1->Commission;
									  }
									  else
									  {
										  $markuph=0;
										 $commissionh=0;
									  }
	 $without_markup = ($row->book_amt*100) /(100 + $markuph);
	 $without_markup1 = ceil($without_markup);
	 // $without_markup = ($row->amount*100) /(100 + $row->markup);
	  ?>
      <td bgcolor="#F2F2F2" align="left" valign="middle"><?php print $row->book_amt."грн"; ?></td>
      <td bgcolor="#F2F2F2" align="left" valign="middle"><?php print $without_markup1."грн"; ?></td>
      <td bgcolor="#F2F2F2" align="left" valign="middle">
		<?php echo $row->payment_status; ?>
		</td>
	  <td bgcolor="#F2F2F2" align="left" valign="middle"><?php
	  echo $row->status;
		/*if($status=='OK' || $status=='CONFIRMED' || $status=='B' ||  $status=='b' || $status=='Confirmed'){
			
			echo "Confirmed";
		}
		elseif($status=='CA' || $status=='C' || $status=='Cancelled' || $status=='CANCELLED'){
		echo "Cancelled";
		}*/
	    ?></td>
		
      <td bgcolor="#F2F2F2" align="left" valign="middle"><?php 
	  
	  
	  $a=$row->policy;
	  $deadline=explode(" ",$a);
	  echo $deadline[0];
	  
	  
	  
	  ?></td>
      <td bgcolor="#F2F2F2" align="left" valign="middle"><?php $cancel_fromdate= $row->voucher_date;
	   //echo date('d M  Y', strtotime($cancel_fromdate)); 
	   echo $cancel_fromdate;
	   ?></td>
    </tr>
    <?php $i++; } ?>
	<tr><td colspan="11" align="center" bgcolor="#FFFFFF"><?php echo $this->pagination->create_links(); ?></td></tr>
<?php	}
		else { ?>
    <tr>
      <td colspan="11" align="center" bgcolor="#FFFFFF"><strong>No Record Found </strong></td>
    </tr>
    <tr>
      <td colspan="11" align="center" bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="11" align="center" bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
    <?php } ?>
  </table>
 
   



                </div>
                </div>
                </div> 
</div>
  </div>
</div>    