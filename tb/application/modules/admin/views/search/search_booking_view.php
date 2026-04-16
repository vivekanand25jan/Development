<style type="text/css">
.title_text {
	color: #FFF;
	line-height:30px;
	text-indent:10px;
}
.table_boredr_htt{
	border:1px #C5C5C5 solid;
	margin:10px 0px 10px 0px;	
}
</style>
  <div class="mdle_container"><!--mdle container start-->
<div align="center">
  <table width="97%" border="1" bordercolor="#C5C5C5" align="center" cellpadding="1" cellspacing="1" class="table_boredr_htt">
    <tr class="title_text">
      
      <!--<td align="left" valign="middle" bgcolor="#CC0000"><strong>Agent Reference </strong></td>-->
      <td align="left" valign="middle" bgcolor="#CC0000"><strong>Booking Number </strong></td>
      <td align="left" valign="middle" bgcolor="#CC0000"><strong>Amount</strong></td>
      <td align="left" valign="middle" bgcolor="#CC0000"><strong>Booking Date</strong></td>
	  <td align="left" valign="middle" bgcolor="#CC0000"><strong>check-in </strong></td>
	  <td align="left" valign="middle" bgcolor="#CC0000"><strong>check-out </strong></td>
	  
      <td align="left" valign="middle" bgcolor="#CC0000"><strong>Cancel From </strong></td>
	  <td align="left" valign="middle" bgcolor="#CC0000"><strong>Cancel Till </strong></td>
    </tr>
    <?php $i=0; if($report!=''){ foreach($report as $row) { ?>
    <tr>
      <td height="25" bgcolor="#F2F2F2" scope="row" align="left"><b><a href="#"><?php echo $row->booking_number; ?></a></b></td>
      
	   <td bgcolor="#F2F2F2"><?php echo $row->amount; ?></td>
	   <td bgcolor="#F2F2F2"><?php echo $row->voucher_date; ?></td>
	   
      <!--<td bgcolor="#F2F2F2"> print $row->agent_ref; ?></td>-->
      <td bgcolor="#F2F2F2"><?php $date_ck= $row->check_in;
	   echo date('d M  Y', strtotime($date_ck)); 
	   ?></td>
	   
	   <td bgcolor="#F2F2F2"><?php echo date('d M  Y', strtotime($row->check_out)); ?></td>
	  
      
      <td bgcolor="#F2F2F2"><?php $cancel_fromdate= $row->cancel_fromdate;
	   //echo date('d M  Y', strtotime($cancel_fromdate)); 
	   echo $cancel_fromdate;
	   ?></td>
        <td bgcolor="#F2F2F2"><?php $cancel_tilldate= $row->cancel_tilldate;
	   //echo date('d M  Y', strtotime($cancel_fromdate)); 
	   echo $cancel_tilldate;
	   ?></td>
    </tr>
    <?php $i++; }}
		else { ?>
    <tr>
      <td colspan="10" align="center" bgcolor="#FFFFFF"><strong>No Record Found </strong></td>
    </tr>
    <tr>
      <td colspan="10" align="center" bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="10" align="center" bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
    <?php } ?>
  </table>
</div>
</div>