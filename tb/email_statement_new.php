<?php

$to=mysql_connect("localhost","",'s+!&.aR');
mysql_select_db("",$to);

//===================================

$current_month  = date('Y-m-28');
//echo "present".strtotime($tomorrow);exit;

 $date2=strtotime(date('Y-m-28'))-(24*60*60*30);
$previous_month=date("Y-m-d",$date2);




$from = "noreply@Travel.com";
               $subject ="Email Account Statement !!";
            //  $body=''; 
              $body="<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
                        <html xmlns='http://www.w3.org/1999/xhtml'>
                        <head>
                        <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
                        <title> Travel Bay </title>
                        </head>
                        <body>
                        <table cellspacing=0 cellpadding=5 border=1>
                        <tr>
                        <th>Booking Number</th>
                        <th>Client Name</th>
                        <th>Product</th>
                        <th>In</th>
                        <th>Out</th>
                        <th>Uts</th>
                        <th>Nights</th>
                        <th>TTl</th>
                        <th>Balance</th>
			<th>Paid</th>
                        </tr>";
//========================================
 $sql="SELECT * FROM agent";
$query=mysql_query($sql);

while($result=mysql_fetch_object($query))
{
  $details='';  
  //echo "<pre/>";print_r($result->agent_id);

   $agent_name=$result->name;
$CustomerEmailAddress=$result->email_id;

//======================= agent account balance ===============


//=============================================================



$sql1='SELECT * FROM agent_deposit WHERE agent_id="'.$result->agent_id.'"';
$query1=mysql_query($sql1);
while($result1=mysql_fetch_object($query1))
{
  // echo "<pre/>";print_r($result1);
   if($result1!='')
   {
		$bank_name=$result->bank;
		$branch=$result->branch;
		$address=$result->city;
}

}
   //==========================   Transaction details ===========
$sql2='SELECT a.amount_credit, h.check_in,h.check_out,h.hotel_name,h.no_of_room,h.nights,t.booking_number,t.amount,t.created_date,t.acc_balance,t.user_id,c.first_name,c.last_name FROM agent_deposit a
		INNER JOIN transaction_details t ON a.agent_id=t.user_id
              INNER JOIN hotel_booking_info h  ON t.customer_contact_details_id=h.customer_contact_details_id
              INNER JOIN customer_contact_details c ON h.customer_contact_details_id=c.customer_contact_details_id
              WHERE t.user_id="'.$result->agent_id.'"
			AND t.status="Confirmed"
		AND a.agent_id="'.$result->agent_id.'"
               AND t.created_date >= "'.$previous_month.'" AND t.created_date <= "'.$current_month.'"
		AND a.deposited_date >= "'.$previous_month.'" AND a.deposited_date <= "'.$current_month.'"
               GROUP BY t.booking_number ORDER BY t.created_date,a.deposited_date ASC';
    //  echo $sql2;exit;
      $query2=mysql_query($sql2);
       

//$v=$last_credit;


while($result2=mysql_fetch_object($query2))
{
  //echo "<pre/>";print_r($result2);
   if($result2!='')
   {
//echo "TRUE";
   //===============================================================

                       $body.="<tr>
                    
                         <td>".$result2->booking_number."</td>
                        <td>".$result2->first_name." ".$result2->last_name."</td>
                        <td>".$result2->hotel_name."</td>
                         <td>".$result2->check_in."</td>
                          <td>".$result2->check_out."</td>
                           <td>".$result2->no_of_room."</td>
                            <td>".$result2->nights."</td>
                             <td>".$result2->amount."</td>
                              <td>".$result2->acc_balance."</td>
				<td>".$result2->amount_credit."</td>
				</tr>";
$sql3='SELECT * FROM agent_acc_info WHERE agent_id="'.$result->agent_id.'"';
$query3=mysql_query($sql3);
//echo "<pre/>";print_r($result3);
while($result3=mysql_fetch_object($query3))
{
if($result3!='')
{
$avail_bal=$result3->balance_credit;
$details="<tr><td>Available Balance</td>
                        <td>".$avail_bal."</td>
                        </tr><br/>
			</table><table cellspacing=0 cellpadding=5 border=1><tr><td ><font color='red'>Please note that the full bank charges should be paid during the transfer.Any difference in amount will be considered as dispute</font></td></tr>

<tr><td>Bank Details : Sharjah Islamic Bank  Sharjah, UAE</td></tr>
<tr><td>Account Name : Travel Bay FZE  Account No : 0032-309063-001</td></tr>
<tr><td>Branch : Free Zone sharjah (SAIF Zone)</td></tr>
<tr><td>Swift Code : NBSHAEAS IBAN AE58 0410 0000 3230 9063 001</td></tr>";
}
}
$details.="</table>
			</body>
                    </html>";
       }
       
  }//exit;

                      /*$body.="<tr>
				<td>Bank Name</td>
				<td>".$bank_name."</td>
				</tr>
				<tr>
				<td>Branch</td>
				<td>".$branch."</td>
				</tr>
				<tr>
				<td>Address</td>
				<td>".$address."</td></tr><tr>";*/

			
                                    // $data['result_view']=$body;


 $headers  = "From: $from\r\n";
                  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                  $hasSent = mail($CustomerEmailAddress,$subject,$body.$details,$headers);
                
//echo "mail-id".$CustomerEmailAddress."<br/>";
echo $body.$details;
//echo "=========================================================================================================";
  $body='';      
}

 
?>
