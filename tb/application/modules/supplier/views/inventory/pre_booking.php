<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Travel Bay</title>
<link href="<?php echo WEB_DIR; ?>css/style_sheet.css" rel="stylesheet" type="text/css" />
<link href="<?php echo WEB_DIR; ?>css/postion.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php $this->load->view('b2b/header'); 

$agent_det = $this->B2b_Model->agentInfo($this->session->userdata('agent_id'));
	
?>
<div class="midlebody">
  <div class="lhsside">
  <div class="serachbar1">
  
  	<div class="mid-txt" style="color:#fff; padding-top:10px; margin-top:10px; text-align:center">
    <span style="font-size:30px;">You</span> are searching</div>
 		<div class="left-topbox">
        	<div><img src="<?php echo WEB_DIR; ?>images/bang-icon.jpg" border="0" style="position:relative; top:4px; padding-right:6px;" /><?php echo $_SESSION['city']; ?></div>
            <div><img src="<?php echo WEB_DIR; ?>images/bang-icon1.jpg" border="0" style="position:relative; top:4px; padding-right:6px;" /><?php echo $_SESSION['sd']; ?> to <?php echo $_SESSION['ed']; ?></div>
            <div><img src="<?php echo WEB_DIR; ?>images/bang-icon2.jpg" border="0" style="position:relative; top:4px; padding-right:6px;" /><?php echo $_SESSION['adult_count']; ?> Adults <?php echo $_SESSION['child_count']; ?> Childs</div>
            <div><img src="<?php echo WEB_DIR; ?>images/bang-icon3.jpg" border="0" style="position:relative; top:4px; padding-right:6px;" /><?php echo $_SESSION['room_count']; ?> Room</div>
            
            
            <div style="float:right"><img src="<?php echo WEB_DIR; ?>images/modify-sbut.png" border="0" style="position:relative; top:30px;" /></div>
        
        </div>
  </div>
   
  	 </div>
    <div class="mainbody">
   <div>
   
    <div class="hotelnames" style="min-height:329px;border: 1px solid #BEE7FF;">
    
   		<!--<div class="right-hotel-name">Youngor Central Suzhou</div>-->
        <table width="100%" border="0" cellspacing="7" cellpadding="3" class="r-hoteldeta">
          <tr>
          	<td colspan="2" class="right-hotel-name"><?php echo $service->hotel_name;?>
            <br />
<?php $star = $service->star; 
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
												?><img src="<?php echo WEB_DIR.'images/0 star copy.jpg'; ?>" />
                                                <?php
											   }
											   ?>  </td>
          </tr>
          <tr>
            <td>Location :</td>
            <td style="color:#227fb0"><?php echo $service->address; ?> ., <?php echo $service->city; ?></td>
          </tr>
          <tr>
          	<td>Check-in:</td>
            <td style="color:#227fb0"><?php echo $_SESSION['sd']; ?></td>
          </tr>
          <tr>
          	<td>Check-Out:</td>
            <td style="color:#227fb0"><?php echo $_SESSION['ed']; ?></td>
          </tr>
          <tr>
          	<td>Number of Rooms  </td>
            <td style="color:#227fb0"><?php echo $_SESSION['room_count']; ?></td>
          </tr>
          <!--<tr>
          	<td colspan="2">&nbsp;</td>
          </tr>-->
        </table>
        
        <form name="prices" method="post">
        <table class="btnadd" width="98%" border="0" cellspacing="0" cellpadding="5" bgcolor="#dee5eb" style="font-size:12px; margin-left:7px; margin-bottom:5px;border: 1px solid #BEE7FF;"  >
        <tr class="classic_room">
            <td align="center" valign="middle" class="classic_room_div" width="100" style=" font-size:14px;color:#227FB0;">Rooms</td>
            <td align="center" valign="middle" class="classic_room_div" width="100" style=" font-size:14px;color:#227FB0;" colspan="3">Room Type-Category</td>
            <!--<td align="center" valign="middle" class="classic_room_div" width="100" style=" font-size:14px;color:#227FB0;">Season</td>
            <td align="center" valign="middle" class="classic_room_div" width="100" style=" font-size:14px;color:#227FB0;">Market</td>-->
            <td align="center" valign="middle" class="classic_room_div" width="100" style=" font-size:14px;color:#227FB0;">Room Cost</td>
        </tr>
        
        <?php $api_temp_hotel_ids = explode(',',$api_temp_hotel_id);
		      //$api_temp_hotel_ids = count($api_temp_hotel_ids)
			  $s_date = $_SESSION['sd'];
			  
			  $grandSpecial;
			  $grandCancelPolicyPlan;
			  $grandBookCode;
		?>
        <!--<input type="text" name="countBook" id="countBook" value="<?php echo count($api_temp_hotel_ids); ?>" />-->
        <?php       
		for($i=0; $i< count($api_temp_hotel_ids); $i++)
		{
		$room_no = $i+1;
		$book_room_details = $this->B2b_Hotel_Model->get_book_room_details($api_temp_hotel_ids[$i]);?>
        <?php for($j=0;$j < count($book_room_details);$j++) { ?>
        <tr class='classic_room'>
        	<td align='center' valign='middle' width="170" colspan="5">
            <div style="border:1px solid #CCC; margin-top:0px;">
            <table border="0" cellpadding="8" cellspacing="0" width="100%">
            
            
            <tr class='classic_room' width="700" id="DailyRates_<?php echo $i.$j;?>" style="display:none;">
            <td align='left' valign='middle' colspan="5" style="line-height:35px;font-size:13px;">
				<?php 
					$start_date = explode('-',$_SESSION['sd']);
					$end_date = explode('-',$_SESSION['ed']);
					
					$room_alloc_date = $start_date[2].'-'.$start_date[1].'-'.$start_date[0];
					$room_vecate_date = $end_date[2].'-'.$end_date[1].'-'.$end_date[0];
					
					$hotel_id = explode('CRS',$book_room_details[$j]->hotel_code);
					$sup_rate_tactics_id = $book_room_details[$j]->sup_rate_tactics_id;
										
					$get_hotel_promotion_stay_pay = $this->B2b_Hotel_Model->get_hotel_promotion_stay_pay($room_alloc_date, $room_vecate_date, $hotel_id[1], $sup_rate_tactics_id); 
					if(!empty($get_hotel_promotion_stay_pay)){
						$pay_nights = $get_hotel_promotion_stay_pay[0]->pay_nights;
						$stay_nights = $get_hotel_promotion_stay_pay[0]->stay_nights;
					}
					
					$start = strtotime($room_alloc_date);
					$end = strtotime($room_vecate_date);
					$days = $end - $start;
					$days = ceil($days/86400);
					$counter=0; 
					$stack = array();
					$cancelsAmt = array();
					$valid = '';
					$grand_total_cost;
					$markups;
					$org_costs; 
					for($d=0;$d < $days;$d++)
					{ 
					//if($counter < 7 ) { 
					if($counter < $days ) {  
                ?>
            	<div style='color:#178AA0; border-bottom:1px solid #A3B6C8;height: 30px;line-height: 15px;'>
                <?php  
					$first_date = $room_alloc_date;
					$fdate = $first_date; 
					$fd = explode("-", $fdate); 		
					$priceDate = date("Y-m-d", mktime(0,0,0,$fd[1], $fd[2] + $d, $fd[0]));
					$daily_Date = date("l M, d Y", mktime(0,0,0,$fd[1], $fd[2] + $d, $fd[0])); ?>
                    <span style="width:250px;"><?php echo $daily_Date; ?></span>
					<?php //$hotel_id = explode('CRS',$hotel_code);
					$hotel_id = explode('CRS',$book_room_details[$j]->hotel_code); 
					$sup_rate_tactics_id = $book_room_details[$j]->sup_rate_tactics_id;
					$category_type =$book_room_details[$j]->category_type;
					$room_type = $book_room_details[$j]->room_type; 
					$season_id = $book_room_details[$j]->season;
					$market_id = $book_room_details[$j]->market_id;
					$s_adult = $book_room_details[$j]->adult;
					$s_child = $book_room_details[$j]->child;
					
					$get_hotel_daily_rates = $this->B2b_Hotel_Model->get_hotel_daily_rates($s_adult, $s_child, $hotel_id[1], $priceDate,  $sup_rate_tactics_id, $category_type, $season_id, $market_id);
					$get_hotel_daily_allotment = $this->B2b_Hotel_Model->get_hotel_daily_allotment($hotel_id[1], $priceDate, $room_type, $season_id);
				//echo 'rate'.$get_hotel_daily_rates[0]->rate;
				
				if($get_hotel_daily_rates[0]->meal_plan=='0')
				{
					echo '<br> Including meals: Half Board'; if($get_hotel_daily_rates[0]->breakfast_type!='') echo ' - '.$get_hotel_daily_rates[0]->breakfast_type;
				}
				else if($get_hotel_daily_rates[0]->meal_plan=='1')
				{
					echo '<br> Including meals: Full Board'; if($get_hotel_daily_rates[0]->breakfast_type!='') echo ' - '.$get_hotel_daily_rates[0]->breakfast_type;
				}
				else if($get_hotel_daily_rates[0]->meal_plan=='2')
				{
					echo '<br> Room Only'; if($get_hotel_daily_rates[0]->breakfast_type!='') echo ' - '.$get_hotel_daily_rates[0]->breakfast_type;
				}
				else if($get_hotel_daily_rates[0]->meal_plan=='3')
				{
					echo '<br> Including meals: All Inclusive'; if($get_hotel_daily_rates[0]->breakfast_type!='') echo ' - '.$get_hotel_daily_rates[0]->breakfast_type;
				}
				else if($get_hotel_daily_rates[0]->meal_plan=='4')
				{
					echo '<br> Including meals: Breakfast'; if($get_hotel_daily_rates[0]->breakfast_type!='') echo ' - '.$get_hotel_daily_rates[0]->breakfast_type;
				}
				else{
					echo '<br> Room Only';
				}
				?> 
                <div style="float:right;margin-right:215px;height:30px;line-height:15px;margin-top: -10px;">
				<?php 
					//echo $get_hotel_daily_rates[0]->rate;
					$amountv1 = $roomPlusSupplementCharge=$get_hotel_daily_rates[0]->rate + $get_hotel_daily_rates[0]->supplementary_charge_rate;
					$b2b_user_id =$this->session->userdata('agent_logged_in'); 
					$contry = $this->B2b_Hotel_Model->get_country($_SESSION['city']);
					$markup =  $this->B2b_Hotel_Model->get_markup_detail($contry,$hotel_id[1],$b2b_user_id);
					$pay_charge = $this->B2b_Hotel_Model->get_payment_charge(); 
					if(!empty($markup))
					{
						$amountv2 = ($markup /100);
						$amountv3 = $amountv2*$amountv1;
						$total_cost = $amountv3+$amountv1;
					
					}else {
						$amountv3 = '';
						$total_cost = $amountv1;
					}
					$agent_det = $this->B2b_Model->agentInfo($this->session->userdata('agent_id'));
					$agent_mode = $agent_det->agent_mode; 
					
					$amountv3pay = 0;
					if(!empty($agent_mode) && $agent_mode == '4'){
					$amountv2pay = ($pay_charge /100);
					$amountv3pay = $amountv2pay*$total_cost;
					}
					$total_cost = $total_cost + $amountv3pay;
								
					
					$get_hotel_early_bird_rates = $this->B2b_Hotel_Model->get_hotel_early_bird_rates($room_alloc_date, $room_vecate_date, $hotel_id[1], $room_type, $season_id);
					
					$discount;
					if(isset($get_hotel_early_bird_rates[0]->discount) && $get_hotel_early_bird_rates[0]->discount!= '')
					{
						$discount = $get_hotel_early_bird_rates[0]->discount;
						$discount_amt = ($discount /100) * $total_cost ;
						$total_cost = $total_cost - $discount_amt;
					}
					else if(isset($get_hotel_early_bird_rates[0]->amount) && $get_hotel_early_bird_rates[0]->amount!= '')
					{
						$discount_amt = $get_hotel_early_bird_rates[0]->amount;
						$total_cost = $total_cost - $discount_amt;
					}
					else
					{
						//$discount = $get_hotel_early_bird_rates[0]->amount;
						//$total_cost = $total_cost - $discount;
					}
					
					$freedays = $stay_nights - $pay_nights;
					
					$multipleAccess=$get_hotel_promotion_stay_pay[0]->multiple;
					if($multipleAccess=='1')
					{
						$freedays = floor($days / $stay_nights);
					}
					
					$remainingDays = $days - $freedays;
					
					if(!empty($get_hotel_promotion_stay_pay) && $stay_nights!='0' && !empty($pay_nights) && $counter>=$remainingDays){ 
						echo '<span style="color:rgb(20, 185, 6);font-size:16px;">FREE STAY</span>';
						$total_cost=0;
					}
					else{
						echo $book_room_details[$j]->xml_currency;
						echo ' '.number_format((float)$total_cost, 2, '.', '');
					}
					
					$org_costs = $org_costs + $amountv1;
					$markups = $markups + $amountv3;
					$grand_total_cost=$grand_total_cost+$total_cost;
					$grand_total_cost=number_format((float)$grand_total_cost, 2, '.', '');
					
					$allocation_release_days = $get_hotel_daily_allotment[0]->allocation_release_days;
					//$days_ago = date('Y-m-d', strtotime('-5 days', strtotime($priceDate)));
					$days_ago = date('Y-m-d', strtotime('-'.$allocation_release_days.' days', strtotime($priceDate)));
					
					$exp_date = $days_ago;
					$todays_date = date("Y-m-d");
					
					$today = strtotime($todays_date);
					$expiration_date = strtotime($exp_date);
					
					if (!empty($allocation_release_days) && $expiration_date > $today) {
						if(isset($pay_nights) && $counter>=$remainingDays){
						}else{
						 $valid = "Available";
						echo "<div style='color:green;font-weight: bold;'>Available</div>";
						}
					} else { 
						//if(isset($pay_nights) && $pay_nights <= $counter){
						//}else{
						 $valid = "On Request";
						 echo "<div style='color:#ff9900;font-weight: bold;'>On Request</div>";
						//}
					}
                ?></div>
                </div>
				<?php } $fd[2] = $fd[2] + $d; $counter++; array_push($stack, $valid); array_push($cancelsAmt, $total_cost);} 
				//print_r($stack);
				//print_r($cancelsAmt);
				?>
            </td>
        </tr>
            
            
			<tr class='classic_room'>
            <td align='center' valign='middle' width="100" bgcolor="#eee" style="color:#227FB0; font-size:14px;">Room Number <?php echo $room_no;?></td>
            <td align='center' valign='middle' width="100" bgcolor="#eee" style="color:#227FB0; font-size:14px;" colspan="3"><?php echo $book_room_details[$j]->room_type;?>
            ROOM <div style="color:#517194; font-size:12px;line-height: 15px;">Total
            <?php if($get_hotel_daily_rates[0]->meal_plan=='0')
				{
					echo ' including Half Board:'; 
				}
				else if($get_hotel_daily_rates[0]->meal_plan=='1')
				{
					echo ' including Full Board:'; 
				}
				else if($get_hotel_daily_rates[0]->meal_plan=='2')
				{
					echo ''; 
				}
				else if($get_hotel_daily_rates[0]->meal_plan=='3')
				{
					echo ' including All Inclusive:'; 
				}
				else if($get_hotel_daily_rates[0]->meal_plan=='4')
				{
					echo ' including Breakfast:'; 
				}
			?>
            </div>
            <?php if(!empty($get_hotel_promotion_stay_pay)){ 
				if(($get_hotel_promotion_stay_pay[0]->stay_nights!='' && $days >= $get_hotel_promotion_stay_pay[0]->stay_nights && $get_hotel_promotion_stay_pay[0]->stay_nights!='0') || $get_hotel_promotion_stay_pay[0]->bb_date!='0000-00-00'){
		$special_offer.='<div><img src="'.WEB_DIR.'images/promotion.gif" /> 
                <span style="color:#178AA0;">Special Offer: The following special/s apply for this booking:</span>';  } 
                if($get_hotel_promotion_stay_pay[0]->stay_nights!='' && $days >= $get_hotel_promotion_stay_pay[0]->stay_nights && $get_hotel_promotion_stay_pay[0]->stay_nights!='0' ) { 
		$special_offer.='<div style="color:#517194; font-size:12px;line-height: 15px;">STAY'. $get_hotel_promotion_stay_pay[0]->stay_nights.' PAY '. $get_hotel_promotion_stay_pay[0]->pay_nights .' PROMO - Stay '. $get_hotel_promotion_stay_pay[0]->stay_nights .' Pay for '. $get_hotel_promotion_stay_pay[0]->pay_nights.'</div>';
                
                } if($get_hotel_promotion_stay_pay[0]->bb_date!='0000-00-00' ){ 
         $special_offer.='<div style="color:#517194; font-size:12px;line-height: 15px;">BOOK BB';
				 $bb_date = explode("-", $get_hotel_promotion_stay_pay[0]->bb_date);
		$special_offer.=$bb_date[2].'-'.$bb_date[1].'-'.$bb_date[0];
		$special_offer.=' UPGRADE TO HB ';
				 $hh_date = explode("-", $get_hotel_promotion_stay_pay[0]->hh_date);
		$special_offer.=$hh_date[2].'-'.$hh_date[1].'-'.$hh_date[0];
		$special_offer.='</div>';}
		$special_offer.='</div>';
		$booking_code=$get_hotel_promotion_stay_pay[0]->booking_code;}
		echo $special_offer;
		$grandSpecial.= '<div style="color:#227FB0; font-size:14px;margin-top:5px;">'.$book_room_details[$j]->room_type.'</div>'.$special_offer;
		$grandBookCode.= $booking_code;
			?>
            </td>
            <!--<td align='center' valign='middle' width="100" bgcolor="#eee" style="color:#227FB0; font-size:14px;"><?php $season_name = $this->B2b_Hotel_Model->get_season($book_room_details[$j]->season); echo $season_name->season;?></td>
            <td align="center" valign="middle" width="100" bgcolor="#eee" style="color:#227FB0; font-size:14px;"><?php $market_name = $this->B2b_Hotel_Model->get_market($book_room_details[$j]->market_id); echo $market_name->market_name; ?></td>-->
            <td align="center" valign="top" width="100" bgcolor="#eee" style="color:#966693; font-size:14px;">
			<div id="showDailyRates_<?php echo $i.$j;?>" style="color:#178AA0; cursor:pointer; text-decoration:underline; font-size:12px;" onclick="showDailyRates('<?php echo $i.$j;?>')">Daily Rates</div>
			<?php echo $book_room_details[$j]->xml_currency;?> <?php echo $grand_total_cost; //echo $book_room_details[$j]->total_cost;?><br /><!--<span style="color:green;">Available</span>-->
            <?php 
				if (in_array("Available", $stack)) {
					echo "<span style='color:green;'>Available</span>";
				}
				else{
				    echo "<span style='color:#ff9900;font-weight: bold;'>On Request</span>";	
				}
            ?>
            </td>
			</tr>
            
            <tr class='classic_room'>
            <!--<td align="center" valign="middle" width="10" bgcolor="#eee"></td>-->
            <td align='center' colspan="5" valign='middle' width="100" bgcolor="#eee" style="color:#227FB0; font-size:14px;">
            
            
            <table border="0" cellpadding="1" cellspacing="1" bgcolor="#91a3b7" width="100%" style="font-size:11px;">
                    
                    <tr bgcolor="#f0f2ec" height="25" style="font-size:13px;">
                    	
                        <td width="20%" align="center" nowrap><font class="home-text"><b>Rate Type</b></font></td>
                        <?php 
                        $start_date = explode('-',$_SESSION['sd']);
                        $end_date = explode('-',$_SESSION['ed']);
                        
                        $room_alloc_date = $start_date[2].'-'.$start_date[1].'-'.$start_date[0];
                        $room_vecate_date = $end_date[2].'-'.$end_date[1].'-'.$end_date[0];
                        
                        $start = strtotime($room_alloc_date);
                        $end = strtotime($room_vecate_date);
                        $days = $end - $start;
                        $days = ceil($days/86400);
                        $counter=0; 
                        for($d=0;$d < $days;$d++)
                         { 
                           if($counter < $days ) { 
                        ?>
                        <td width="10%" align="center"> <font class="home-text"><b> 
                        <?php  
                               $first_date = $room_alloc_date;
                               $fdate = $first_date; 
                               $fd = explode("-", $fdate); 		
                               echo date("D", mktime(0,0,0,$fd[1], $fd[2] + $d, $fd[0]));
                        ?> </b></font></td>
                        <?php } $fd[2] = $fd[2] + $d; $counter++; } ?>
                        
                        <?php for($r=0;$r<($days - $d);$r++) {  $fd[2] = $fd[2]+1;?>
                        <td width="10%" align="center"><font class="home-text"><b>
                        <?php 
                        echo date("D", mktime(0,0,0,$fd[1], $fd[2], $fd[0])); ?></b></font></td>
                        <?php } ?>
                        
                        <td width="9%" align="center"> <font class="home-text"><b>Total</b></font> </td>
                        <td width="5%" align="center"><!--<input type="checkbox" name="all[]" id="[]" />--></td>
                    </tr>
                    
                    <tr bgcolor="#DDDDDD">
                    	
                        <td valign="middle" align="center" rowspan="1" nowrap bgcolor="#ffffff"> <font class="home-text">Adult Extra Bed</font> </td>
                        <?php 
						 $counter1=0; $totalAED = 0;
						for($d=0;$d < $days;$d++)
                        { 
                           if($counter1 < $days ) { 
                        ?>
                        <td align="center" valign="middle" height="5" bgcolor="#ffffff"> <font color="#966693">
                        <?php  
							$first_date = $room_alloc_date;
							$fdate = $first_date; 
							$fd = explode("-", $fdate); 		
							$priceDate = date("Y-m-d", mktime(0,0,0,$fd[1], $fd[2] + $d, $fd[0]));
							 
							$s_adult = $book_room_details[$j]->adult;
							$s_child = $book_room_details[$j]->child;
							$hotel_id = explode('CRS',$book_room_details[$j]->hotel_code);
							$sup_rate_tactics_id = $book_room_details[$j]->sup_rate_tactics_id;
							$category_type = $book_room_details[$j]->category_type;
							$season_id = $book_room_details[$j]->season;
							$market_id = $book_room_details[$j]->market_id;
							
							$get_hotel_daily_rates = $this->B2b_Hotel_Model->get_hotel_daily_rates($s_adult, $s_child, $hotel_id[1], $priceDate,  $sup_rate_tactics_id, $category_type, $season_id, $market_id);
							
							echo number_format((float)$get_hotel_daily_rates[0]->extra_bed_price, 2, '.', '');
							$totalAED = $totalAED+number_format((float)$get_hotel_daily_rates[0]->extra_bed_price, 2, '.', '');
							$totel1 = $totalAED;
							  
                        ?></font></td>
                        <?php } $fd[2] = $fd[2] + $d; $counter1++; } ?>
                        <?php for($r=0;$r<($days - $d);$r++) {  $fd[2] = $fd[2]+1;?>
                        
                        <td width="10%" align="center"><font class="home-text"><b>
                        <?php 
                        echo date("D", mktime(0,0,0,$fd[1], $fd[2], $fd[0])); ?></b></font></td>
                        <?php } ?>
                        
                        <td width="8%" bgcolor="#ffffff" align="center"><font class=small1><font color="#966693"><b><?php echo number_format((float)$totel1, 2, '.', ''); ?></b></font></font></td>
                        <td width="5%" align="center"><input type="checkbox" name="aeb" id="aeb_<?php echo $i.$j; ?>" value="aeb--<?php echo $totel1; ?>" /></td>
                    </tr>
                    <tr bgcolor="#DDDDDD">
                        <td valign="middle" align="center" rowspan="1" nowrap bgcolor="#ffffff"> <font class="home-text">2nd Child Charge</font> </td>
                        <?php 
						 $counter1=0; $totalCC = 0;
						for($d=0;$d < $days;$d++)
                        { 
                           if($counter1 < $days ) { 
                        ?>
                        <td align="center" valign="middle" height="5" bgcolor="#ffffff"> <font color="#966693">
                        <?php  
                               $first_date = $room_alloc_date;
                               $fdate = $first_date; 
                               $fd = explode("-", $fdate); 		
                               $priceDate = date("Y-m-d", mktime(0,0,0,$fd[1], $fd[2] + $d, $fd[0]));
							 
							$s_adult = $book_room_details[$j]->adult;
							$s_child = $book_room_details[$j]->child;
							$hotel_id = explode('CRS',$book_room_details[$j]->hotel_code);
							$sup_rate_tactics_id = $book_room_details[$j]->sup_rate_tactics_id;
							$category_type = $book_room_details[$j]->category_type;
							$season_id = $book_room_details[$j]->season;
							$market_id = $book_room_details[$j]->market_id;
							
							$get_hotel_daily_rates = $this->B2b_Hotel_Model->get_hotel_daily_rates($s_adult, $s_child, $hotel_id[1], $priceDate,  $sup_rate_tactics_id, $category_type, $season_id, $market_id);
							
							echo number_format((float)$get_hotel_daily_rates[0]->child_charge, 2, '.', '');
							$totalCC = $totalCC+number_format((float)$get_hotel_daily_rates[0]->child_charge, 2, '.', '');
							$totel2 = $totalCC;
                        ?></font></td>
                        <?php } $fd[2] = $fd[2] + $d; $counter1++; } ?>
                        <?php for($r=0;$r<($days - $d);$r++) {  $fd[2] = $fd[2]+1;?>
                        <td width="10%" align="center"><font class="home-text"><b>
                        <?php 
                        echo date("D", mktime(0,0,0,$fd[1], $fd[2], $fd[0])); ?></b></font></td>
                        <?php } ?>
                        <td width="8%" bgcolor="#ffffff" align="center"><font class=small1><font color="#966693"><b><?php echo number_format((float)$totel2, 2, '.', ''); ?></b></font></font></td>
                        <td width="5%" align="center"><input type="checkbox" name="cc" id="cc_<?php echo $i.$j; ?>" value="cc--<?php echo $totel2; ?>" /></td>
                    </tr>
                    <tr bgcolor="#DDDDDD">
                    	
                        <td valign="middle" align="center" rowspan="1" nowrap bgcolor="#ffffff"> <font class="home-text">Child Charge (Between the ages <?php echo $book_room_details[$j]->child_above_age; ?> to <?php echo $book_room_details[$j]->child_below_age; ?>)</font> </td>
                        <?php 
						 $counter1=0; $totalCAA=0;
						for($d=0;$d < $days;$d++)
                        { 
                           if($counter1 < $days ) { 
                        ?>
                        <td align="center" valign="middle" height="5" bgcolor="#ffffff"> <font color="#966693">
                        <?php  
                               $first_date = $room_alloc_date;
                               $fdate = $first_date; 
                               $fd = explode("-", $fdate); 		
                              $priceDate = date("Y-m-d", mktime(0,0,0,$fd[1], $fd[2] + $d, $fd[0]));
							 
							$s_adult = $book_room_details[$j]->adult;
							$s_child = $book_room_details[$j]->child;
							$hotel_id = explode('CRS',$book_room_details[$j]->hotel_code);
							$sup_rate_tactics_id = $book_room_details[$j]->sup_rate_tactics_id;
							$category_type = $book_room_details[$j]->category_type;
							$season_id = $book_room_details[$j]->season;
							$market_id = $book_room_details[$j]->market_id;
							
							$get_hotel_daily_rates = $this->B2b_Hotel_Model->get_hotel_daily_rates($s_adult, $s_child, $hotel_id[1], $priceDate,  $sup_rate_tactics_id, $category_type, $season_id, $market_id);
							
							echo number_format((float)$get_hotel_daily_rates[0]->child_above_age_charge, 2, '.', '');
							$totalCAA = $totalCAA+number_format((float)$get_hotel_daily_rates[0]->child_above_age_charge, 2, '.', '');
							$totel3 = $totalCAA;
							
                        ?></font></td>
                        <?php } $fd[2] = $fd[2] + $d; $counter1++; } ?>
                        <?php for($r=0;$r<($days - $d);$r++) {  $fd[2] = $fd[2]+1;?>
                        <td width="10%" align="center"><font class="home-text"><b>
                        <?php 
                        echo date("D", mktime(0,0,0,$fd[1], $fd[2], $fd[0])); ?></b></font></td>
                        <?php } ?>
                        <td width="8%" bgcolor="#ffffff" align="center"><font class=small1><font color="#966693"><b><?php echo number_format((float)$totel3, 2, '.', ''); ?></b></font></font></td>
                        <td width="5%" align="center"><input type="checkbox" name="caa" id="caa_<?php echo $i.$j; ?>" value="caa--<?php echo $totel3; ?>" /></td>
                    </tr>
                    <tr bgcolor="#DDDDDD">
                    	
                        <td valign="middle" align="center" rowspan="1" nowrap bgcolor="#ffffff"> <font class="home-text">Child Extra Bed</font> </td>
                        <?php 
						 $counter1=0; $totalCEB=0;
						for($d=0;$d < $days;$d++)
                        { 
                           if($counter1 < $days ) { 
                        ?>
                        <td align="center" valign="middle" height="5" bgcolor="#ffffff"> <font color="#966693">
                        <?php  
                               $first_date = $room_alloc_date;
                               $fdate = $first_date; 
                               $fd = explode("-", $fdate); 		
                               $priceDate = date("Y-m-d", mktime(0,0,0,$fd[1], $fd[2] + $d, $fd[0]));
							 
							$s_adult = $book_room_details[$j]->adult;
							$s_child = $book_room_details[$j]->child;
							$hotel_id = explode('CRS',$book_room_details[$j]->hotel_code);
							$sup_rate_tactics_id = $book_room_details[$j]->sup_rate_tactics_id;
							$category_type = $book_room_details[$j]->category_type;
							$season_id = $book_room_details[$j]->season;
							$market_id = $book_room_details[$j]->market_id;
							
							$get_hotel_daily_rates = $this->B2b_Hotel_Model->get_hotel_daily_rates($s_adult, $s_child, $hotel_id[1], $priceDate,  $sup_rate_tactics_id, $category_type, $season_id, $market_id);
							echo number_format((float)$get_hotel_daily_rates[0]->child_extra_bed_charge, 2, '.', '');
							
							$totalCEB = $totalCEB + number_format((float)$get_hotel_daily_rates[0]->child_extra_bed_charge, 2, '.', '');
							$totel4 = $totalCEB;
                        ?></font></td>
                        <?php } $fd[2] = $fd[2] + $d; $counter1++; } ?>
                        <?php for($r=0;$r<($days - $d);$r++) {  $fd[2] = $fd[2]+1;?>
                        <td width="10%" align="center"><font class="home-text"><b>
                        <?php 
                        echo date("D", mktime(0,0,0,$fd[1], $fd[2], $fd[0])); ?></b></font></td>
                        <?php } ?>
                        <td width="8%" bgcolor="#ffffff" align="center"><font class=small1><font color="#966693"><b><?php echo number_format((float)$totel4, 2, '.', ''); ?></b></font></font></td>
                        <td width="5%" align="center"><input type="checkbox" name="ceb" id="ceb_<?php echo $i.$j; ?>" value="ceb--<?php echo $totel4; ?>" /></td>
                    </tr>
                     <tr bgcolor="#DDDDDD">
                    	
                        <td valign="middle" align="center" rowspan="1" nowrap bgcolor="#ffffff"> <font class="home-text">Adult Meal Plan Breakfast</font> </td>
                        <?php 
						 $counter1=0; $totalAMPB=0;
						for($d=0;$d < $days;$d++)
                        { 
                           if($counter1 < $days ) { 
                        ?>
                        <td align="center" valign="middle" height="5" bgcolor="#ffffff"> <font color="#966693">
                        <?php  
                               $first_date = $room_alloc_date;
                               $fdate = $first_date; 
                               $fd = explode("-", $fdate); 		
                              $priceDate = date("Y-m-d", mktime(0,0,0,$fd[1], $fd[2] + $d, $fd[0]));
							 
						echo	$s_adult = $book_room_details[$j]->adult;
						echo	$s_child = $book_room_details[$j]->child;
							$hotel_id = explode('CRS',$book_room_details[$j]->hotel_code);
							$sup_rate_tactics_id = $book_room_details[$j]->sup_rate_tactics_id;
							$category_type = $book_room_details[$j]->category_type;
							$season_id = $book_room_details[$j]->season;
							$market_id = $book_room_details[$j]->market_id;
							
							$get_hotel_daily_rates = $this->B2b_Hotel_Model->get_hotel_daily_rates($s_adult, $s_child, $hotel_id[1], $priceDate,  $sup_rate_tactics_id, $category_type, $season_id, $market_id);
							
							echo number_format((float)$get_hotel_daily_rates[0]->adult_meal_plan_breakfast_rate, 2, '.', '');
							$totalAMPB = $totalAMPB + number_format((float)$get_hotel_daily_rates[0]->adult_meal_plan_breakfast_rate, 2, '.', '');
							$totel5 = $totalAMPB;
                        ?></font></td>
                        <?php } $fd[2] = $fd[2] + $d; $counter1++; } ?>
                        <?php for($r=0;$r<($days - $d);$r++) {  $fd[2] = $fd[2]+1;?>
                        <td width="10%" align="center"><font class="home-text"><b>
                        <?php 
                        echo date("D", mktime(0,0,0,$fd[1], $fd[2], $fd[0])); ?></b></font></td>
                        <?php } ?>
                        <td width="8%" bgcolor="#ffffff" align="center"><font class=small1><font color="#966693"><b><?php echo number_format((float)$totel5, 2, '.', ''); ?></b></font></font></td>
                        <td width="5%" align="center"><input type="checkbox" name="ampb" id="ampb_<?php echo $i.$j; ?>" value="ampb--<?php echo $totel5; ?>" /></td>
                    </tr>
                     <tr bgcolor="#DDDDDD">
                    	
                        <td valign="middle" align="center" rowspan="1" nowrap bgcolor="#ffffff"> <font class="home-text">Adult Meal Plan Lunch</font> </td>
                        <?php 
						 $counter1=0; $totalAMPL=0;
						for($d=0;$d < $days;$d++)
                        { 
                           if($counter1 < $days ) { 
                        ?>
                        <td align="center" valign="middle" height="5" bgcolor="#ffffff"> <font color="#966693">
                        <?php  
                               $first_date = $room_alloc_date;
                               $fdate = $first_date; 
                               $fd = explode("-", $fdate); 		
                              $priceDate = date("Y-m-d", mktime(0,0,0,$fd[1], $fd[2] + $d, $fd[0]));
							 
							$s_adult = $book_room_details[$j]->adult;
							$s_child = $book_room_details[$j]->child;
							$hotel_id = explode('CRS',$book_room_details[$j]->hotel_code);
							$sup_rate_tactics_id = $book_room_details[$j]->sup_rate_tactics_id;
							$category_type = $book_room_details[$j]->category_type;
							$season_id = $book_room_details[$j]->season;
							$market_id = $book_room_details[$j]->market_id;
							
							$get_hotel_daily_rates = $this->B2b_Hotel_Model->get_hotel_daily_rates($s_adult, $s_child, $hotel_id[1], $priceDate,  $sup_rate_tactics_id, $category_type, $season_id, $market_id);
							echo number_format((float)$get_hotel_daily_rates[0]->adult_meal_plan_lunch_rate, 2, '.', '');
							$totalAMPL = $totalAMPL + number_format((float)$get_hotel_daily_rates[0]->adult_meal_plan_lunch_rate, 2, '.', '');
							$totel6 = $totalAMPL;
                        ?></font></td>
                        <?php } $fd[2] = $fd[2] + $d; $counter1++; } ?>
                        <?php for($r=0;$r<($days - $d);$r++) {  $fd[2] = $fd[2]+1;?>
                        <td width="10%" align="center"><font class="home-text"><b>
                        <?php 
                        echo date("D", mktime(0,0,0,$fd[1], $fd[2], $fd[0])); ?></b></font></td>
                        <?php } ?>
                        <td width="8%" bgcolor="#ffffff" align="center"><font class=small1><font color="#966693"><b><?php echo number_format((float)$totel6, 2, '.', ''); ?></b></font></font></td>
                        <td width="5%" align="center"><input type="checkbox" name="ampl" id="ampl_<?php echo $i.$j; ?>" value="ampl--<?php echo $totel6; ?>" /></td>
                    </tr>
                     <tr bgcolor="#DDDDDD">
                    	
                        <td valign="middle" align="center" rowspan="1" nowrap bgcolor="#ffffff"> <font class="home-text">Adult Meal Plan Dinner</font> </td>
                        <?php 
						 $counter1=0; $totalAMPD=0;
						for($d=0;$d < $days;$d++)
                        { 
                           if($counter1 < $days ) { 
                        ?>
                        <td align="center" valign="middle" height="5" bgcolor="#ffffff"> <font color="#966693">
                        <?php  
                               $first_date = $room_alloc_date;
                               $fdate = $first_date; 
                               $fd = explode("-", $fdate); 		
                               $priceDate = date("Y-m-d", mktime(0,0,0,$fd[1], $fd[2] + $d, $fd[0]));
							 
							$s_adult = $book_room_details[$j]->adult;
							$s_child = $book_room_details[$j]->child;
							$hotel_id = explode('CRS',$book_room_details[$j]->hotel_code);
							$sup_rate_tactics_id = $book_room_details[$j]->sup_rate_tactics_id;
							$category_type = $book_room_details[$j]->category_type;
							$season_id = $book_room_details[$j]->season;
							$market_id = $book_room_details[$j]->market_id;
							
							$get_hotel_daily_rates = $this->B2b_Hotel_Model->get_hotel_daily_rates($s_adult, $s_child, $hotel_id[1], $priceDate,  $sup_rate_tactics_id, $category_type, $season_id, $market_id);
							echo number_format((float)$get_hotel_daily_rates[0]->adult_meal_plan_dinner_rate, 2, '.', '');
							$totalAMPD = $totalAMPD + number_format((float)$get_hotel_daily_rates[0]->adult_meal_plan_dinner_rate, 2, '.', '');
							$totel7 = $totalAMPD;
                        ?></font></td>
                        <?php } $fd[2] = $fd[2] + $d; $counter1++; } ?>
                        <?php for($r=0;$r<($days - $d);$r++) {  $fd[2] = $fd[2]+1;?>
                        <td width="10%" align="center"><font class="home-text"><b>
                        <?php 
                        echo date("D", mktime(0,0,0,$fd[1], $fd[2], $fd[0])); ?></b></font></td>
                        <?php } ?>
                        <td width="8%" bgcolor="#ffffff" align="center"><font class=small1><font color="#966693"><b><?php echo number_format((float)$totel7, 2, '.', ''); ?></b></font></font></td>
                        <td width="5%" align="center"><input type="checkbox" name="ampd" id="ampd_<?php echo $i.$j; ?>" value="ampd--<?php echo $totel7; ?>" /></td>
                    </tr>
                     <tr bgcolor="#DDDDDD">
                    	
                        <td valign="middle" align="center" rowspan="1" nowrap bgcolor="#ffffff"> <font class="home-text">Child Meal Plan Breakfast</font> </td>
                        <?php 
						 $counter1=0; $totalCMPB=0;
						for($d=0;$d < $days;$d++)
                        { 
                           if($counter1 < $days ) { 
                        ?>
                        <td align="center" valign="middle" height="5" bgcolor="#ffffff"> <font color="#966693">
                        <?php  
                               $first_date = $room_alloc_date;
                               $fdate = $first_date; 
                               $fd = explode("-", $fdate); 		
                               $priceDate = date("Y-m-d", mktime(0,0,0,$fd[1], $fd[2] + $d, $fd[0]));
							 
							$s_adult = $book_room_details[$j]->adult;
							$s_child = $book_room_details[$j]->child;
							$hotel_id = explode('CRS',$book_room_details[$j]->hotel_code);
							$sup_rate_tactics_id = $book_room_details[$j]->sup_rate_tactics_id;
							$category_type = $book_room_details[$j]->category_type;
							$season_id = $book_room_details[$j]->season;
							$market_id = $book_room_details[$j]->market_id;
							
							$get_hotel_daily_rates = $this->B2b_Hotel_Model->get_hotel_daily_rates($s_adult, $s_child, $hotel_id[1], $priceDate,  $sup_rate_tactics_id, $category_type, $season_id, $market_id);
							echo number_format((float)$get_hotel_daily_rates[0]->child_meal_plan_breakfast_rate, 2, '.', '');
							$totalCMPB = $totalCMPB + number_format((float)$get_hotel_daily_rates[0]->child_meal_plan_breakfast_rate, 2, '.', '');
							$totel8 = $totalCMPB;
                        ?></font></td>
                        <?php } $fd[2] = $fd[2] + $d; $counter1++; } ?>
                        <?php for($r=0;$r<($days - $d);$r++) {  $fd[2] = $fd[2]+1;?>
                        <td width="10%" align="center"><font class="home-text"><b>
                        <?php 
                        echo date("D", mktime(0,0,0,$fd[1], $fd[2], $fd[0])); ?></b></font></td>
                        <?php } ?>
                        <td width="8%" bgcolor="#ffffff" align="center"><font class=small1><font color="#966693"><b><?php echo number_format((float)$totel8, 2, '.', ''); ?></b></font></font></td>
                        <td width="5%" align="center"><input type="checkbox" name="cmpb" id="cmpb_<?php echo $i.$j; ?>" value="cmpb--<?php echo $totel8; ?>" /></td>
                    </tr>
                     <tr bgcolor="#DDDDDD">
                        <td valign="middle" align="center" rowspan="1" nowrap bgcolor="#ffffff"> <font class="home-text">Child Meal Plan Lunch</font> </td>
                        <?php 
						 $counter1=0; $tatalCMPL=0;
						for($d=0;$d < $days;$d++)
                        { 
                           if($counter1 < $days ) { 
                        ?>
                        <td align="center" valign="middle" height="5" bgcolor="#ffffff"> <font color="#966693">
                        <?php  
                               $first_date = $room_alloc_date;
                               $fdate = $first_date; 
                               $fd = explode("-", $fdate); 		
                               $priceDate = date("Y-m-d", mktime(0,0,0,$fd[1], $fd[2] + $d, $fd[0]));
							 
							$s_adult = $book_room_details[$j]->adult;
							$s_child = $book_room_details[$j]->child;
							$hotel_id = explode('CRS',$book_room_details[$j]->hotel_code);
							$sup_rate_tactics_id = $book_room_details[$j]->sup_rate_tactics_id;
							$category_type = $book_room_details[$j]->category_type;
							$season_id = $book_room_details[$j]->season;
							$market_id = $book_room_details[$j]->market_id;
							
							$get_hotel_daily_rates = $this->B2b_Hotel_Model->get_hotel_daily_rates($s_adult, $s_child, $hotel_id[1], $priceDate,  $sup_rate_tactics_id, $category_type, $season_id, $market_id);
							echo number_format((float)$get_hotel_daily_rates[0]->child_meal_plan_lunch_rate, 2, '.', '');
							$tatalCMPL = $tatalCMPL + number_format((float)$get_hotel_daily_rates[0]->child_meal_plan_lunch_rate, 2, '.', '');
							$totel9 = $tatalCMPL;
                        ?></font></td>
                        <?php } $fd[2] = $fd[2] + $d; $counter1++; } ?>
                        <?php for($r=0;$r<($days - $d);$r++) {  $fd[2] = $fd[2]+1;?>
                        <td width="10%" align="center"><font class="home-text"><b>
                        <?php 
                        echo date("D", mktime(0,0,0,$fd[1], $fd[2], $fd[0])); ?></b></font></td>
                        <?php } ?>
                        <td width="8%" bgcolor="#ffffff" align="center"><font class=small1><font color="#966693"><b><?php echo number_format((float)$totel9, 2, '.', ''); ?></b></font></font></td>
                        <td width="5%" align="center"><input type="checkbox" name="cmpl" id="cmpl_<?php echo $i.$j; ?>" value="cmpl--<?php echo $totel9; ?>" /></td>
                    </tr>
                    <tr bgcolor="#DDDDDD">
                    	
                        <td valign="middle" align="center" rowspan="1" nowrap bgcolor="#ffffff"> <font class="home-text">Child Meal Plan Dinner</font> </td>
                        <?php 
						 $counter1=0; $totalCMPD=0;
						for($d=0;$d < $days;$d++)
                        { 
                           if($counter1 < $days ) { 
                        ?>
                        <td align="center" valign="middle" height="5" bgcolor="#ffffff"> <font color="#966693">
                        <?php  
                               $first_date = $room_alloc_date;
                               $fdate = $first_date; 
                               $fd = explode("-", $fdate); 		
                               $priceDate = date("Y-m-d", mktime(0,0,0,$fd[1], $fd[2] + $d, $fd[0]));
							 
							$s_adult = $book_room_details[$j]->adult;
							$s_child = $book_room_details[$j]->child;
							$hotel_id = explode('CRS',$book_room_details[$j]->hotel_code);
							$sup_rate_tactics_id = $book_room_details[$j]->sup_rate_tactics_id;
							$category_type = $book_room_details[$j]->category_type;
							$season_id = $book_room_details[$j]->season;
							$market_id = $book_room_details[$j]->market_id;
							
							$get_hotel_daily_rates = $this->B2b_Hotel_Model->get_hotel_daily_rates($s_adult, $s_child, $hotel_id[1], $priceDate,  $sup_rate_tactics_id, $category_type, $season_id, $market_id);
							echo number_format((float)$get_hotel_daily_rates[0]->child_meal_plan_dinner_rate, 2, '.', '');
							$totalCMPD = $totalCMPD + number_format((float)$get_hotel_daily_rates[0]->child_meal_plan_dinner_rate, 2, '.', '');
							$totel10 = $totalCMPD;
                        ?></font></td>
                        <?php } $fd[2] = $fd[2] + $d; $counter1++; } ?>
                        <?php for($r=0;$r<($days - $d);$r++) {  $fd[2] = $fd[2]+1;?>
                        <td width="10%" align="center"><font class="home-text"><b>
                        <?php 
                        echo date("D", mktime(0,0,0,$fd[1], $fd[2], $fd[0])); ?></b></font></td>
                        <?php } ?>
                        <td width="8%" bgcolor="#ffffff" align="center"><font class=small1><font color="#966693"><b><?php echo number_format((float)$totel10, 2, '.', ''); ?></b></font></font></td>
                        <td width="5%" align="center"><input type="checkbox" name="cmpd" id="cmpd_<?php echo $i.$j; ?>" value="cmpd--<?php echo $totel10; ?>" /></td>
                    </tr>
                    
          			<!--<tr bgcolor="#FFFFFF"  align="center" bordor=no height="25" style="font-size:13px;">
                       <td class="home-text"> <font class="home-text"><b> Status</b></font></td>
                       <td class="DHSOnRequest" colspan="9" style="color:#ff9900;"> <b>On Request</b></td>
                    </tr>-->
            </table>
            
            
            
            </td>
			</tr>

			<tr class='classic_room' width="700">
            <td align='left' valign='middle' colspan="5" style="line-height:22px;color:#966693;font-size:13px;">
            
			<?php $hotel_room_cancel_policy = $this->B2b_Hotel_Model->get_hotel_room_cancel_policy($book_room_details[$j]->sup_rate_tactics_id); ?>
            
            
             <!--Start of Cancel Deadline--> 
            <?php if(isset($hotel_room_cancel_policy[0]->cancel_policy_from) && $hotel_room_cancel_policy[0]->cancel_policy_from!=''){					
					$deadline_date = date('Y-m-d', strtotime('-'.$hotel_room_cancel_policy[0]->cancel_policy_nights.' days', strtotime($s_date)));
					$cancel_policy_from = strtotime($deadline_date);
					$ss_date = strtotime($todays_date);
					if($cancel_policy_from <= $ss_date){ 
        $cancelPolicyPlan.='<div style="color:red;font-weight:normal;">WITH IN CANCELLATION DEADLINE</div>';  }}
            
             if(isset($book_room_details[$j]->remarks) && $book_room_details[$j]->remarks!= ''){ 
        $cancelPolicyPlan.=$book_room_details[$j]->remarks;
		$cancelPolicyPlan.='<br />';  }             
             if(isset($hotel_room_cancel_policy[0]->minimum_stay_nights) && $hotel_room_cancel_policy[0]->minimum_stay_nights!=''){ 
			 $minimum_stay_fromS = strtotime($hotel_room_cancel_policy[0]->minimum_stay_from);
			 $minimum_stay_toS = strtotime($hotel_room_cancel_policy[0]->minimum_stay_to);
			 $ss_date = strtotime($todays_date);
			 if($minimum_stay_fromS <= $ss_date && $ss_date <=$minimum_stay_toS){
		$cancelPolicyPlan.=' Minimum Stay Nights:'; $hotel_room_cancel_policy[0]->minimum_stay_nights;
		$cancelPolicyPlan.=' from'; $hotel_room_cancel_policy[0]->minimum_stay_from;
		$cancelPolicyPlan.='to'; $hotel_room_cancel_policy[0]->minimum_stay_to;
		$cancelPolicyPlan.='<br />'; } } 
             if(isset($book_room_details[$j]->cancel_policy_desc) && $book_room_details[$j]->cancel_policy_desc!= ''){ 		 				  		$cancelPolicyPlan.=$book_room_details[$j]->cancel_policy_desc; 
	    $cancelPolicyPlan.='<br />'; } 
            	for($hcp=0; $hcp< count($hotel_room_cancel_policy); $hcp++)
            	{
            		$cancel_date_start = date('Y-m-d', strtotime('-'.$hotel_room_cancel_policy[$hcp]->cancel_policy_nights.' days', strtotime($hotel_room_cancel_policy[$hcp]->cancel_policy_from)));
					
					if($hotel_room_cancel_policy[$hcp]->cancel_policy_charge!='')
					{
						$noOfNights = $hotel_room_cancel_policy[$hcp]->cancel_policy_charge;
						 
						$dailyRatesArray=$cancelsAmt; 
						//print_r($dailyRatesArray);
						count($dailyRatesArray);
						$per_all_nights_cancel_rate=0;
						for($sA=0; $sA< $noOfNights; $sA++)
						{
							$per_all_nights_cancel_rate =+ $dailyRatesArray[$sA];
						}
			  		}
            		else if($hotel_room_cancel_policy[$hcp]->cancel_policy_percent!='')
					{
						//echo $hotel_room_cancel_policy[$hcp]->cancel_policy_percent;
						$cancel_rate = ($hotel_room_cancel_policy[$hcp]->cancel_policy_percent/100) * $grand_total_cost;		
						$dailyRatesArray=$cancelsAmt;
						if($cancel_rate=='0')
						{
							$per_all_nights_cancel_rate = $cancel_rate;
						}
						else if($cancel_rate<$dailyRatesArray[0])
						{
							$per_all_nights_cancel_rate = $dailyRatesArray[0];
						} 
						else if($cancel_rate>=$dailyRatesArray[0]) 
						{
							$per_all_nights_cancel_rate = $cancel_rate;
						} 
					} 
					$per_all_nights_cancel_rate=number_format((float)$per_all_nights_cancel_rate, 2, '.', '');
				
         $cancelPolicyPlan.='A charge of AED'; 
		 $cancelPolicyPlan.=$per_all_nights_cancel_rate; 
		 $cancelPolicyPlan.='will apply if Cancelled or Amended for ';
		 $cancelPolicyPlan.= $hotel_room_cancel_policy[$hcp]->cancel_policy_nights;
		 $cancelPolicyPlan.='days prior to arrival.<br />';

			  } ?>
            <!--End of Cancellation Policy with rates-->
            <?php echo $cancelPolicyPlan;
			$grandCancelPolicyPlan.= '<div style="color:#227FB0; font-size:14px;margin-top:5px;">'.$book_room_details[$j]->room_type.'</div>'.$cancelPolicyPlan; 
			$cancelaion_till_date = $hotel_room_cancel_policy[0]->cancel_policy_to;
			$cancelaion_till_d = explode("-", $cancelaion_till_date); 
			$new_cancelaion_till_date = $cancelaion_till_d[2].'-'.$cancelaion_till_d[1].'-'.$cancelaion_till_d[0]?>
            </td>
        </tr>

</table>
            </div>
            </td>
        </tr>
		<?php  $grand_total_cost=0; $org_costs=0; $markups=0; unset($cancelsAmt); unset($special_offer); unset($cancelPolicyPlan); } } ?>
        </table>
         
        <table width="95%" border="0" cellspacing="1" cellpadding="5" style="font-size:12px; margin-left:20px; margin-bottom:5px;" >
        <tr class='' width="100">
            <td align='right' valign='middle' colspan="4" style="color:#227FB0; font-size:14px;">Reservation Total Cost</td>
            <input id="totalValues" name="totalValues" type="hidden" value="<?php echo $totalValue; ?>" />
            <td align="center" valign="middle" width="150" style="color:#966693; font-size:14px; font-weight:bold;height:32px;line-height:32px;" id="ttttotal"><span style="height:32px;line-height:32px;">AED 
			<?php echo $totalValue = number_format((float)$totalValue, 2, '.', ''); ?> </span>
              </td>
        </tr>
        </table>
        </form>
    </div>
    <?php $api_temp_hotel_ids = explode(',',$api_temp_hotel_id);
		  $result_id = implode("-", $api_temp_hotel_ids);
	?>
 
    <form name="book" action="<?php echo WEB_URL ?>b2b_hotel/pre_booking" method="post" onsubmit="javascript:return check_booking()">
    <input id="t" name="t" type="hidden" /> 
    <input id="tServices" name="tServices" type="hidden" />
    <input type="hidden" name="result_id" value="<?php echo $result_id; ?>" />
    <input type="hidden" name="amount" id="amount" value="<?php echo $totalValue; ?>" />
    <input type="hidden" name="api" value="<?php echo $api; ?>" />
    <input type="hidden" name="xml_currency" value="<?php echo $xml_currency; ?>" />
    <input type="hidden" name="payment_charge" value="<?php echo $payment_charge; ?>" />
    <input type="hidden" name="org_amt" value="<?php echo $org_amt; ?>" />
    <input type="hidden" name="markup" value="<?php echo $markup; ?>" />
    <input type="hidden" name="currency_val" value="<?php echo $currency_val; ?>" />
    <!--<input type="hidden" name="cancel_policy" value="<?php echo $grandCancelPolicyPlan; ?>" />-->
    <textarea name="cancel_policy" style="display:none;"><?php echo $grandCancelPolicyPlan; ?></textarea>
    <textarea name="special_offer" style="display:none;"><?php echo $grandSpecial; ?></textarea>
    <textarea name="booking_code" style="display:none;"><?php echo $grandBookCode; ?></textarea>
    
    <input type="hidden" name="maintain_month_id" value="<?php echo $maintain_month_id; ?>" />
    <input type="hidden" name="room_code" value="<?php echo $room_code; ?>" />
    <input type="hidden" name="market_id" value="<?php echo $market_id; ?>" />
    <input type="hidden" name="room_type" value="<?php echo $room_type; ?>" />
    <input type="hidden" name="cate_type" value="<?php echo $cate_type; ?>" />
    <input type="hidden" name="season" value="<?php echo $season; ?>" />
    <input type="hidden" name="hotId" value="<?php echo $service->hotel_id; ?>" />
      
    <table align="left" width="724" border="0" cellspacing="5" cellpadding="5" class="sum-txt">
    <input type="hidden" name="email" value="<?php echo $this->session->userdata('email_id'); ?>"> 
    <input type="hidden" name="cemail" value="<?php echo $this->session->userdata('email_id'); ?>">
    <input type="hidden" name="address" value="<?php echo $this->session->userdata('address'); ?>">
    <input type="hidden" name="city" value="<?php echo $this->session->userdata('city'); ?>">
    <input type="hidden" name="pin" value="<?php echo $this->session->userdata('postal_code'); ?>">
    <input type="hidden" name="country" value="<?php //echo $_SESSION['nationality']; ?>">
    <input type="hidden" name="mobile" value="<?php echo $this->session->userdata('mobile'); ?>">
    <input type="hidden" name="cancel_charge_n" value="<?php //echo $new_cancelaion_charge; ?>">
    <input type="hidden" name="cancel_till_n" value="<?php echo $new_cancelaion_till_date; ?>">
    <input type="hidden" name="agent_mode" value="<?php echo $agent_det->agent_mode; ?>">
    </table>
      <?php
		
		  for($i=0;$i< count($room_info); $i++)
		  {
			  ?>
    <div id="r-box" style="height:40px">
    	<div class="mid-txt" style="margin:10px 5px 5px 15px; text-transform:uppercase;">ROOM NUMBER <?php echo $i+1; ?>: <?php echo $room_info[$i]->room_type; ?> ROOM FOR <?php echo $room_info[$i]->adult; ?> ADULT/S AND <?php echo $room_info[$i]->child;?> CHILD/S</div>
    </div>
     <?php
		  for($j=0;$j<  $room_info[$i]->adult; $j++)
		  {
			  ?>
      <table align="left" width="724" border="0" cellspacing="5" cellpadding="5" class="sum-txt" style="margin-top:15px; border:1px #227fb0 solid; border-radius:10px;">
      
      <tr>
        <td width="70">Title *</td>
        <td width="220">First Name</td>
         <td width="220">Last Name</td>
         <td >Max Persons</td>
      </tr>
      <tr>
        <td> <select name="sal[]" style="width:60px" class="r-txtbox">
                 <option value="Mr">Mr</option>
                 <option value="Mrs">Mrs</option>
              </select>
        </td>
        <td> <input type="text" name="fname[]" style="width:200px" class="r-txtbox"  /></td>
         <td><input style="width:200px" type="text" name="lname[]" class="r-txtbox"  /></td>
         <td ><?php echo $room_info[$i]->adult; ?> guests</td>
      </tr>
    </table>
     <?php
		  }
			  ?>
    <?php
		  }
		  ?>
   <div style="float:left; width:700px;margin-bottom: 10px;"> <input type="checkbox" name="terms" /> A agree <a href="<?php echo WEB_URL ?>home/terms" target="_blank" style="color:#06C;">Terms and Conditions</a> of agency. </div>
    <?php
		//$net_price = $cost-$markup;totalValue
		$net_price = $totalValue;
		
		$agent_det = $this->B2b_Model->agentInfo($this->session->userdata('agent_id'));
		
		//echo $agent_det->agent_mode;
	
		if($agent_det->agent_mode == '1' || $agent_det->agent_mode == '3' || $agent_det->agent_mode == '4')
		{ ?>
			<div class="lessCurrentBalance"></div>
			<?php if ($balance_credit < $net_price) { ?>
                <br />
                <br />
                <font color="#FF0000" style="font-size:14px; padding:10px"><strong>You do not have sufficient balance in your account to do this booking!</strong></font><br />
                <a href="<?php echo WEB_URL; ?>b2b/agent_page/"><img src="<?php echo WEB_DIR; ?>images/contiu-but.png" width="100" height="35" /></a>
			<?php 
			} 
  		    else
		    { ?>
                 <div style="float:left; margin-top:10px;" class="moreCurrentBalance"><input type="image" src="<?php echo WEB_DIR; ?>images/contiu-but.png" width="100" height="35" /></div>
           <?php }
		}
		elseif($agent_det->agent_mode == '2')
		{
			$cin = $_SESSION['sd'];
			$datacin = explode("-",$cin);
			$cindata = $datacin[2].'-'.$datacin[1].'-'.$datacin[0];
			//	   echo $cindata;exit;
			$diff = strtotime($cindata) - strtotime(date('Y-m-d'));

			$sec   = $diff % 60;
			$diff  = intval($diff / 60);
			$min   = $diff % 60;
			$diff  = intval($diff / 60);
			$hours = $diff % 24;
			$days  = intval($diff / 24);
			
			if($days > 7)
			{
           ?>
            	<div style="float:left; margin-top:10px;"><input type="image" src="<?php echo WEB_DIR; ?>images/contiu-but.png" width="100" height="35"/></div>
           <?php
			}
			else
			{
			?>
            <div color="#FF0000" style="font-size:14px;margin:10px;">
            <strong style="color:#FF0000;">You are not able to do the booking. Please Change CheckIn date.</strong>
            </div >
            <a href="<?php echo WEB_URL; ?>b2b/agent_page/" ><img src="<?php echo WEB_DIR; ?>images/contiu-but.png" width="100" height="35" /></a>
           <?php 
			}
		}
		else
		{
			?>
			<br />
			<br />
			<font color="#FF0000" style="font-size:14px; padding:10px"><strong>You are not able to do the booking. Please contact to admin</strong></font><br />
			<img src="<?php echo WEB_DIR; ?>images/contiu-but.png" width="100" height="35" />
			<?php 
		}
		?>
    
</form>
  </div>
  </div>
</div></div></div>
<div style="clear:both"></div>
<?php $this->load->view('b2b/footer'); ?>
</body>
</html>
<script type="text/javascript" src="<?php echo WEB_DIR; ?>script/master.js"></script>
<script>
function check_booking()
{
	var fname = document.getElementsByName('fname[]');
	for (var i = 0; i < fname.length; i++)
	{
		if (fname[i].value=='')
		{
			alert("Please enter First Name.");
			return false;
		}
	} 
	 var lname = document.getElementsByName('lname[]');
	 for (var i = 0; i < lname.length; i++)
	{
		if (lname[i].value=='')
		{
			alert("Please enter Last Name.");
			return false;
		}
	}
	 if(!document.book.terms.checked)
	 {
		 alert("please accept terms & condition");
		 return false;
	 }
	return confirm('Are You Sure, You want to confirm this booking?');
}

function updateTextArea() {
	var allVals = [];
	var allValsS = [];
	$('.btnadd :checked').each(function() {
		var arr = $(this).val().toString().split("--"); 
		allVals.push(arr[1]);
		allValsS.push($(this).val());
	});
	
	$('.btnadd :not:checked').each(function() {
	});
	$('#t').val(allVals)
	$('#tServices').val(allValsS)
	
	var rates = allVals.toString().split(","); 
	var count = rates.length;
	var totalAmt = 0.00; 
	for(var i=0; i<count; i++)
	{
		totalAmt = parseFloat(totalAmt) + parseFloat(rates[i]);
		totalAmt = parseFloat(totalAmt).toFixed(2);
	}
	callTotal(totalAmt);
}
$(function() {
	$('.btnadd input').live("click", function(){  updateTextArea();  });   
});

function callTotal(totalAmt)
{
	$('#ttttotal').html('<img src="<?php echo WEB_DIR; ?>images/ajax-loader.gif">');
	setTimeout(function() {
		var totalAmount = 0.00;
		var amount = $('#totalValues').val();	 
		totalAmount = parseFloat(totalAmt) + parseFloat(amount)
		totalAmount = parseFloat(totalAmount).toFixed(2); //alert(totalAmount);
		if(totalAmount != 'NaN'){
			$('#amount').val(totalAmount);	
			$('#ttttotal').html('<span style="height:32px;line-height:32px;">AED '+totalAmount+'</span>');
			var balance_credit = '<?php echo $balance_credit; ?>';
			balance_credit = Math.abs(balance_credit);
			totalAmount = Math.abs(totalAmount);
			if(balance_credit < totalAmount)
			{ 
				$('.moreCurrentBalance').hide();
				$('.lessCurrentBalance').html(' <br />  <br />  <font color="#FF0000" style="font-size:14px; padding:10px"><strong>You do not have sufficient balance in your account to do this booking!</strong></font><br /> <a href="<?php echo WEB_URL; ?>b2b/agent_page/"><img src="<?php echo WEB_DIR; ?>images/contiu-but.png" width="100" height="35" /></a>'); 
				alert('You do not have sufficient balance in your account to do this booking!');
			}
			if(balance_credit >= totalAmount)
			{
				$('.moreCurrentBalance').hide();
				$('.lessCurrentBalance').html('<div style="float:left; margin-top:10px;" class="moreCurrentBalance"><input type="image" src="<?php echo WEB_DIR; ?>images/contiu-but.png" width="100" height="35" /></div>'); 
			}
		}
		else{
		$('#amount').val(amount);	 
		$('#ttttotal').html('<span style="height:32px;line-height:32px;">AED '+amount+'</span>');
		}
	}, 1000);
}

function showDailyRates(id){
	$('#DailyRates_'+id).toggle('slow');
	$('#showDailyRates_'+id).html('Daily Rates');
}
</script> 
