<?php

$to=mysql_connect("localhost","ba",'');
mysql_select_db("l_bay",$to);

//===================================

$current_month  = date('Y-m-25');
//echo "present".strtotime($tomorrow);exit;

 $date2=strtotime(date('Y-m-25'))-(24*60*60*30);
$previous_month=date("Y-m-d",$date2);


//========================================
 $sql="SELECT * FROM agent";
$query=mysql_query($sql);

while($result=mysql_fetch_object($query))
{
   //echo "<pre/>";print_r($result);

$from = "noreply@Travel-bay.com";
               $subject ="Email Account Statement !!";
               $CustomerEmailAddress='sonal.provab@gmail.com';
              $body="<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
                        <html xmlns='http://www.w3.org/1999/xhtml'>
                        <head>
                        <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
                        <title> Travel Bay </title>
                        </head>
                        
                        <body>
                           <div style='align:left;border:1;'>
                           <table cellpadding=5 cellspacing=5 border=1 style='align:left;'>
                            <tr>
                             <td>Agent Id : </td>
                           <td>".$result->agent_id."</td>
                           </tr>
                           <tr>
                           <td>Name</td>
                           <td>".$result->name."</td>
                           </tr>
                            <tr>
                            <td>Company : </td>
                           <td>".$result->company_name."</td>
                           </tr>
                            <tr>
                            <td>Address : </td>
                           <td>".$result->address."</td>
                           </tr>
                            <tr>
                            <td>City : </td>
                           <td>".$result->city."</td>
                           </tr>
                            <tr>
                            <td>Country :</td>
                           <td>".$result->country."</td>
                           </tr>
                            <tr>
                            <td>Postal Code : </td>
                           <td>".$result->postal_code."</td>
                           </tr>
                           </table>";
                         $sql1='SELECT * FROM agent_branch_details WHERE agent_id="'.$result->agent_id.'"';
$query1=mysql_query($sql1);
while($result1=mysql_fetch_object($query1))
{
   //echo "<pre/>";print_r($result1);
   if($result1!='')
   {
     $body.="<table cellpadding=5 cellspacing=5 border=1 style='align:right;margin-left:953px;'>
                            <tr>
                             <td>Branch Name : </td>
                           <td>".$result1->branch_name."</td>
                           </tr>
                           <tr>
                           <td>Address : </td>
                           <td>".$result1->address."</td>
                           </tr>
                            
                            <tr>
                            <td>City : </td>
                           <td>".$result1->city."</td>
                           </tr>
                            <tr>
                            <td>Country :</td>
                           <td>".$result1->country."</td>
                           </tr>
                            <tr>
                            <td>Postal Code : </td>
                           <td>".$result1->postal_code."</td>
                           </tr>

                            <tr>
                            <td>Tel : </td>
                           <td>".$result1->telephone."</td>
                           </tr>

                            <tr>
                            <td>Mob : </td>
                           <td>".$result1->mobile."</td>
                           </tr>
                           <tr>
                            <td>A/C open date : </td>
                           <td>".$result1->created_date."</td>
                           </tr>
                           </table>
                           </div>";
   }
}
                        $body.="<table>
                                    <tr>
                                    
                                    <th>Narration</th>
                                    <th>Deposited Date</th>
                                     <th>Booking Date</th>
                                     <th>Deposit Type</th>
                                     <th>Deposit Amount</th>
                                    <th>Booking Number</th>
                                    <th> Amount</th>
                                    <th>Deposit Status</th>
                                    <th>Booking Status</th>
                                   </tr>";

//echo "last".$lastmonth =($date1-$date2);exit;
       $sql2='SELECT *,t.status as tstatus,d.status as dstatus FROM transaction_details t
              INNER JOIN agent_deposit d ON d.agent_id="'.$result->agent_id.'"
             
               WHERE t.user_id="'.$result->agent_id.'"
               AND t.created_date >= "'.$previous_month.'" AND t.created_date <= "'.$current_month.'"
               AND d.deposited_date >= "'.$previous_month.'" AND d.deposited_date <= "'.$current_month.'" ORDER BY t.created_date,d.deposited_date ASC';
      
      $query2=mysql_query($sql2); 
while($result2=mysql_fetch_object($query2))
{
   //echo "<pre/>";print_r($result2);exit;
   if($result2!='')
   {
       $body.="<tr>
                                  <td>".$result2->bank.",".$result2->branch.",".$result2->city."</td>
                                  <td>".$result2->deposited_date."</td> 
                                  <td>".$result2->created_date."</td> 
                                  <td>".$result2->deposit_type."</td>
                                  <td>".$result2->amount_credit."</td> 
                                  <td>".$result2->booking_number."</td> 
                                  <td>".$result2->amount."</td>
                                  <td>".$result2->dstatus."</td> 
                                  <td>".$result2->tstatus."</td>   
                                   </tr>";
                                   
   }

  }
        $body.=" </table>";
 
$sql3='SELECT * FROM agent_acc_info WHERE agent_id="'.$result->agent_id.'"';
$query3=mysql_query($sql3);
while($result3=mysql_fetch_object($query3))
{

   $body.="<div>
          <label>Available Balance : </label>
          ".$result3->balance_credit."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <label>Last Credit: </label>
          ".$result3->last_credit."
   </div>";                                
                                  
                             
}
                            echo  $body.=" </body>
                                    </html>";
                                    // $data['result_view']=$body;
                $headers  = "From: $from\r\n";
                  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                  $hasSent = mail($CustomerEmailAddress,$subject,$body,$headers);
                
}

?>
