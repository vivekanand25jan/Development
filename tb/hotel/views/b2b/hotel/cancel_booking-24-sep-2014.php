<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Travel Bay</title>

<link href="<?php echo WEB_DIR; ?>designAccess/css/travel_bay_stylesheet.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo WEB_DIR; ?>designAccess/engine1/style.css" />

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
    <div class="hotelnames" style="min-height:219px;">
    
   		<!--<div class="right-hotel-name">Youngor Central Suzhou</div>-->

<form method="post" action="<?php echo WEB_URL; ?>b2b_hotel/cancel_booking_final/<?php echo $result_view->transaction_details_id; ?>">       
      <table width="100%"   border="0" cellspacing="1" cellpadding="6">
      <tr><td><font size="+1" color="#333333">Are you sure, you want to Cancel the booking <?php //echo $result_view->prn_no;
      echo $result_view->booking_number;?>? </font></td></tr>
<!--
  <tr>
    <td style="">
<a href="<?php //echo WEB_URL; ?>b2b_hotel/cancel_booking_final/<?php //echo $result_view->transaction_details_id; ?>">  <img src="<?php echo WEB_DIR; ?>images/yes.JPG" border="0" style="position:relative;" /> </a>&nbsp;<img src="<?php echo WEB_DIR; ?>images/no.JPG" border="0" style="position:relative; " /> </td>
 
  </tr>
 <tr><td>&nbsp;</td></tr>
-->

  <tr><td><font size="+1"  color="#333333">Cancellation Policy</font></td></tr>
   <tr><td><font size="+0.8" color="#333333">Cancellation Charge applicable:  
	<?php
	$cancels = explode("//", $result_view->cancellation_till_charge);
        
	for($i=0; $i<count($cancels) ; $i++)
	{   
		$cancelPolicies = explode("___", $cancels[$i]);
		$exploded_dates[] = $cancelPolicies[0];
		$totCancelAmt=0;
		$cancel_date = $cancelPolicies[0];
		$date_curr=strtotime(date('Y-m-d'));
		$date_cancel=strtotime($cancel_date);
		$date_cancel_a[]=strtotime($cancel_date);
		$c_am[] = $cancelPolicies[1];
		if($date_curr>=$date_cancel){
			$n[$i] = strtotime($cancelPolicies[0]);
			$m[$i] = $cancelPolicies[1];
			
			$mm[$i] = $cancelPolicies[2];
		}

	} 
        
        $maximum = max($c_am);
$kkk = $n;
	if(count($n)>0){
			for($s=0;$s<count($n);$s++){
				for($k=0;$k<count($n);$k++){
					if($n[$s]<$n[$k]){
						$tmp = $n[$s];
						$n[$s] = $n[$k];
						$n[$k]=$tmp;
					}
				}
			}
$maxdate = max($n);

foreach($kkk as $pk=>$vk){
	if($maxdate==$vk){
		$index = $pk;
	}
}

$cancel_Amt = $m[$index]*$result_view->currency_val;

$cancel_Amtss = $mm[$index]*$result_view->currency_val;

$cancel_dates = array_search(date("Y-m-d",$n[$index]),$exploded_dates);
$cancel_date = $cancel_dates+1;

if($cancel_Amt == $maximum){
       $cancel_Amt = $result_view->amount;
       $check_per = 420; 
    }
//foreach($n as $ii=>$vv){
		//$pp = date("Y-m-d",$n[$ii]);
		//$cancel_Amt = $m[$ii];	
//}

	
}else{
	$cancel_Amt = 0;
	$cancel_date = 0;
	
	$cancel_Amtss = 0;
	
}
echo $cancel_Amt;
	?>
   
   </font>
   </td></tr>

   <tr><td><input type="hidden" name="totCancelAmt" value="<?php echo $cancel_Amt; ?>">
	<input type="hidden" name="cancel_for_dates" value="<?php echo $cancel_date;?>"/>
	<input type="hidden" name="totCancelAmtAdmin" value="<?php echo $cancel_Amtss;?>"/>
	<input type="hidden" name="checkforper" value="<?php echo $check_per;?>"/>
  </td></tr>

	<tr>
	<td style="">
	<input type="image" src="<?php echo WEB_DIR; ?>images/yes.JPG" border="0" style="position:relative;" />&nbsp;
	<a href="<?php echo WEB_URL; ?>b2b/my_booking"><img src="<?php echo WEB_DIR; ?>images/no.JPG" border="0" style="position:relative;"/</a> </td>
	</tr>
</table>
</form> 
    </div>
    
    
   
     
    
    
     
    
    
    
     
    
    
     
     
    
    
    
     
    
  
    
    
     
     

    
  </div>
  </div>
</div>
</div></div>
<div style="clear:both"></div>
<?php $this->load->view('footer'); ?>
</body>
</html>
 
