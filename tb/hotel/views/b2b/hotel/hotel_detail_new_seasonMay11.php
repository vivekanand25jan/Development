<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Travel Bay</title>
<link href="<?php echo WEB_DIR; ?>css/style_sheet.css" rel="stylesheet" type="text/css" />
<link href="<?php echo WEB_DIR; ?>css/postion.css" rel="stylesheet" type="text/css" />

</head>
<body>
<?php $this->load->view('b2b/header'); ?>
<div class="midlebody">
  <div class="lhsside">
  <div class="serachbar1">
  
  	<div class="mid-txt" style="color:#fff; padding-top:10px; margin-top:10px; text-align:center">
    <span style="font-size:30px;">You</span> are searching</div>
 		<div class="left-topbox" style="width:210px">
<?php $s_adult=0; $s_child=0;
for($i=0; $i<$_SESSION['room_count']; $i++) 
{ 
	$s_adult= $s_adult + $_SESSION['org_adult'][$i];
	$s_child= $s_child + $_SESSION['org_child'][$i];
}
?>
        	<div><img src="<?php echo WEB_DIR; ?>images/bang-icon.jpg" border="0" style="position:relative; top:4px; padding-right:6px;" /><?php echo $_SESSION['city']; ?></div>
            <div><img src="<?php echo WEB_DIR; ?>images/bang-icon1.jpg" border="0" style="position:relative; top:4px; padding-right:6px;" /><?php echo $_SESSION['sd']; ?> to <?php echo $_SESSION['ed']; ?></div>
            <div><img src="<?php echo WEB_DIR; ?>images/bang-icon2.jpg" border="0" style="position:relative; top:4px; padding-right:6px;" /><?php echo $_SESSION['adult_count']=$s_adult; //$_SESSION['adult_count']; ?> Adults <?php echo $_SESSION['child_count']=$s_child; //$_SESSION['child_count']; ?> Childs</div>
            <div><img src="<?php echo WEB_DIR; ?>images/bang-icon3.jpg" border="0" style="position:relative; top:4px; padding-right:6px;" /><?php echo $_SESSION['room_count']; ?> Room</div>
            
            
            <div style="float:right">
            <a href="<?php echo WEB_URL.'b2b/agent_page'; ?>">
            <img src="<?php echo WEB_DIR; ?>images/modify-sbut.png" border="0" style="position:relative; top:30px;" /></a></div>
        
        </div>
  </div>
  
   <link href="<?php echo WEB_DIR; ?>css/master.css" rel="stylesheet" type="text/css">
    <link href="<?php echo WEB_DIR; ?>css/master1.css" rel="stylesheet" type="text/css">
     <script type="text/javascript">
//<![CDATA[
if (typeof (HC) == 'undefined') {var HC = {}}; HC.query = ''; HC.path = '';
//]]>
</script>
    <script type="text/javascript" src="<?php echo WEB_DIR; ?>script/master.js"></script>
    

 
   <!--<div style="float:left; margin-top:10px;">
   <img src="<?php echo WEB_DIR; ?>images/last-view-img.jpg" width="229" height="63" />
   </div>-->
  	<!--<div class="left-secbox">
  		<div class="hc_m_v14" id="hc_usrHtlHistory">
                   <div class="hc_m_outer">		<div class="hc_m_content">
                        
                            <div id="hc_viewedHotels" class="hc_m_v11">
                                <b class="b1h"></b><b class="b2h"></b><b class="b3h"></b><b class="b4h"></b><div class="hc_m_outer">		<div class="hc_m_content">
                                    
<script type="text/javascript">HC.Translations.set("ShowAll", "Show all"); HC.Translations.set("DeleteAll", "Delete all"); HC.Translations.set("ShowTopNumber", "Show top 5");</script>
     <?php
	
	   if(isset($_SESSION['fav_hotel_detail']))
		{
			 $arra_u = array_unique($_SESSION['fav_hotel_detail']);
			// print_r($arra_u);
			 //echo count($arra_u);exit;
	for($i=0;$i< count($arra_u); $i++)
	{
	if($arra_u[$i] != 'images')
	{
		
		$res_idd = explode(",",$arra_u[$i]);
			$detailss=$this->B2b_Hotel_Model->get_searchresult($res_idd[0]);
		
		$hotel_id = $detailss->hotel_code;
		$image_hotelspro=$detailss->image;
		?>
    <div id="<?php echo $i; ?>" class="hc_i_wrapper">
     
             <a class="hotel_link_new" href="<?php echo WEB_URL.'b2b_hotel/hotel_detail/'.$res_idd[0]; ?>"><?php echo $detailss->hotel_name; ?></a>
              
           <br />
        <div class="hc_i">
           
            <a href="" class="hc_i_photo ">
               <?php
              if($api=='hotelsbed')
									  {
										  ?>
               <img src="<?php echo 'http://www.hotelbeds.com/giata/'.$image_hotelspro; ?>" alt="">
               
                                      <?php
									  }
									  else
		 {
			 ?>
               <img width="80" height="80" src="<?php echo 'http://www.hotelbeds.com/giata/'.$image_hotelspro; ?>" alt=""> 
                <?php
		 }
		 ?>
            </a>
            <a href="javascript:void(0);" onclick='HC.ViewedHotels.remove("1186706");' class="hc_i_remove" title="Delete hotel"></a>
            <dl>
                
                <dd class="hc_i_booking"><span>  
                <?php
				$star = $detailss->star;
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
										else
											   {
												?><img src="<?php echo WEB_DIR.'images/0 star copy.jpg'; ?>" />
                                                <?php
											   }
											   ?>   </span></dd>
                
            </dl>
            <div class="cDiv"></div>
        </div>    
    </div>
    
    
    
    
    
    <?php } }
		}?>
    
    
    
   
    
      
    
    
    
                                      
<?php /*?><a style="display: none;" href="javascript:void(0);" onclick="HC.ViewedHotels.toggleAll()" class="hc_f_btn_showAll">Show all<span></span></a><?php */?>
<a href="javascript:void(0);" onclick="HC.ViewedHotels.removeAll()" class="hc_f_btn_deleteAll">Delete all<span></span></a>
<div class="cDivRight"></div>
<script type="text/javascript">
//<![CDATA[
HC.ViewedHotels.init(5, $('#hc_viewedHotels'), {liClass: 'hc_i_photos_', ulClass: 'hc_i_photos'});
//]]>
</script>

                                	</div>	<div class="hc_m_ft"></div></div><b class="b4bh"></b><b class="b3bh"></b><b class="b2bh"></b><b class="b1h"></b>
                            </div>
                            
                            
                            	</div>	<div class="hc_m_ft"></div></div><b class="b4bh"></b><b class="b3bh"></b><b class="b2bh"></b><b class="b1h"></b>
                </div>
                
                
  	</div>-->
    
    
     </div>
    <div class="mainbody">
   <div>
    <div class="hotelnames" style="min-height:auto;border: 1px solid #BEE7FF;">
    
   		<!--<div class="right-hotel-name">Youngor Central Suzhou</div>-->
        <table width="100%" border="0" cellspacing="7" cellpadding="3" class="r-hoteldeta" style="">
          <tr>
          	<td colspan="2" class="right-hotel-name"><?php echo $service->hotel_name; ?><br />
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
										else
											   {
												?><img src="<?php echo WEB_DIR.'images/0 star copy.jpg'; ?>" />
                                                <?php
											   }
											   ?>  
			</td>
          </tr>
          <tr>
          	<td><?php echo $service->address."., ".$service->city; ?><br />
Tel: <?php echo $service->phone; ?> Fax: <?php echo $service->fax; ?></td>
          </tr>
       
          <tr>
          	<td><p style="font-size:13px;"><?php echo $service->description; ?></p></td>
          </tr>	
          <?php /*?><tr>
          	<td style="color:#fb5a05">View on the map</td>
          </tr><?php */?>
                 
          <!--<tr>
            <td><table width="" border="0" cellspacing="3" cellpadding="3">
            <tr>
            <td><img width="60" src="<?php echo $img_array; ?>" border="0" /></td>
            <?php  echo $img_array;
            if($img_array!='')
            {
             for($q=0;$q<count($img_array);$q++)
            { 
            ?>
             <td><img width="60" src="<?php echo $img_array[$q]; ?>" border="0" /></td>
            <?php
            }
            }
            ?>
            </tr>-->
            </table>
            </td>
          </tr>
        </table>
      </div>  
      
      
<form name="hotelDetails" method="post" action="<?php echo WEB_URL.'b2b_hotel/pre_booking/'?>" >   
        
<?php //echo $_SESSION['room_count']; 
 $hotel_code = $service->hotel_code;?>
<?php for($i=0; $i<$_SESSION['room_count']; $i++) 
{ 
	$room_no = $i+1;
	$s_adult = $_SESSION['org_adult'][$i];
	$s_child = $_SESSION['org_child'][$i];
	$s_date = $_SESSION['sd'];
	$e_date = $_SESSION['ed'];
	$sec_res =$_SESSION['ses_id'];
	$hotel_category_types = $this->B2b_Hotel_Model->get_hotel_category_types($s_adult, $s_child,$hotel_code,$sec_res,$s_date,$e_date);
?>  

<table width="100%" border="0" cellspacing="10" cellpadding="0" class="hotelnames" style="margin-bottom:3px;border: 1px solid #BEE7FF;">
    <tr>
        <td width="100%" align="left" style="font-size:15px;;" colspan="2" class="right-hotel-name"><?php echo 'ROOM NUMBER '.$room_no; ?>: <?php echo $s_adult; ?>ADULT/S AND <?php echo $s_child; ?> CHILD/S </td>
    </tr>
    <?php for($c=0;$c < count($hotel_category_types);$c++) { 
	$hotel_season_prices = $this->B2b_Hotel_Model->get_hotel_season_prices($s_adult, $s_child,$hotel_code,$sec_res,$s_date,$e_date,$hotel_category_types[$c]->category_type);?>
    <tr>
        <td width="100%" align="left" style="font-size:14px; color:#227FB0; font-weight:bold;" colspan="2"><?php echo strtoupper($hotel_category_types[$c]->room_type);?> ROOM</td>
    </tr>
    <tr>
    <!--<td align="left" valign="middle" width="30">&nbsp;</td>-->
    <td align="left" valign="top" width="700">
    	<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#dee5eb" style="font-size:12px;" >
        <tr class="classic_room">
            <td align="center" valign="middle" class="classic_room_div" width="170" height="25" style="font-family:Arial, Helvetica, sans-serif; font-size:14px;color:#227FB0;">Season</td>
            <td align="center" valign="middle" class="classic_room_div" width="170" style="font-family:Arial, Helvetica, sans-serif; font-size:14px;color:#227FB0;">Market</td>
            <td align="center" valign="middle" class="classic_room_div" width="170" style="font-family:Arial, Helvetica, sans-serif; font-size:14px;color:#227FB0;">Room Cost</td>
            <td align="center" valign="middle" class="classic_room_div" width="170" style="font-family:Arial, Helvetica, sans-serif; font-size:14px;color:#227FB0;">Select</td>
        </tr>
        <?php for($sp=0;$sp < count($hotel_season_prices);$sp++) { ;?>
        <tr class='classic_room'>
            <td align='center' valign='middle' width="170" colspan="4">
            <div style="border:1px solid #CCC; margin-top:5px;">
            <table border="0" cellpadding="8" cellspacing="0" width="100%">
            
            <tr class='classic_room' width="700" id="DailyRates_<?php echo $c.$sp.$i;?>" style="display:none;">
            <td align='left' valign='middle' colspan="4" style="line-height:35px;font-size:13px;">
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
					$stack = array();
					$valid = '';
					$grand_total_cost;
					for($d=0;$d < $days;$d++)
					{ 
					if($counter < 7 ) { 
                ?>
            	<div style='color:#178AA0; border-bottom:1px solid #A3B6C8;'>
                <?php  
					$first_date = $room_alloc_date;
					$fdate = $first_date; 
					$fd = explode("-", $fdate); 		
					$priceDate = date("Y-m-d", mktime(0,0,0,$fd[1], $fd[2] + $d, $fd[0]));
					$daily_Date = date("l M, d Y", mktime(0,0,0,$fd[1], $fd[2] + $d, $fd[0])); ?>
                    <span style="width:250px;"><?php echo $daily_Date; ?></span>
					<?php $hotel_id = explode('CRS',$hotel_code);
					$sup_rate_tactics_id = $hotel_category_types[$c]->sup_rate_tactics_id;
					$category_type = $hotel_season_prices[$sp]->category_type;
					$room_type = $hotel_season_prices[$sp]->room_type; 
					$season_id = $hotel_season_prices[$sp]->season;
					$market_id = $hotel_season_prices[$sp]->market_id;
					
					$get_hotel_daily_rates = $this->B2b_Hotel_Model->get_hotel_daily_rates($s_adult, $s_child, $hotel_id[1], $priceDate,  $sup_rate_tactics_id, $category_type, $season_id, $market_id);
					$get_hotel_daily_allotment = $this->B2b_Hotel_Model->get_hotel_daily_allotment($hotel_id[1], $priceDate, $room_type, $season_id);
				?> / Room Only
                <div style="float:right;margin-right:215px;height:30px;line-height:15px;">
				<?php 
					echo $hotel_season_prices[$sp]->xml_currency;
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
					
					
					/*$get_hotel_early_bird_rates = $this->B2b_Hotel_Model->get_hotel_early_bird_rates($room_alloc_date, $room_vecate_date, $hotel_id[1], $room_type, $season_id);
					
					$discount;
					if(isset($get_hotel_early_bird_rates[0]->discount) && $get_hotel_early_bird_rates[0]->discount!= '')
					{
						$discount = $get_hotel_early_bird_rates[0]->discount;
						$discount_amt = ($discount /100) * $total_cost ;
						$total_cost = $total_cost - $discount_amt;
					}
					else
					{
						$discount = $get_hotel_early_bird_rates[0]->amount;
						$total_cost = $total_cost - $discount;
					}*/
					
					echo ' '.number_format((float)$total_cost, 2, '.', '');
					
					
					$grand_total_cost=$grand_total_cost+$total_cost;
					
					$allocation_release_days = $get_hotel_daily_allotment[0]->allocation_release_days;
					$days_ago = date('Y-m-d', strtotime('-5 days', strtotime($priceDate)));
					
					$exp_date = $days_ago;
					$todays_date = date("Y-m-d");
					
					$today = strtotime($todays_date);
					$expiration_date = strtotime($exp_date);
					
					if ($expiration_date > $today) {
						 $valid = "Available";
						echo "<div style='color:green;font-weight: bold;'>Available</div>";
					} else {
						 $valid = "On Request";
						echo "<div style='color:#ff9900;font-weight: bold;'>On Request</div>";
					}
                ?></div>
                </div>
				<?php } $fd[2] = $fd[2] + $d; $counter++; array_push($stack, $valid);} 
				//print_r($stack);
				?>
            </td>
        </tr>
        
			<tr class='classic_room'>
            <td align='center' valign='middle' width="170" bgcolor="#eee" style="color:#227FB0; font-size:14px;"><?php $season_name = $this->B2b_Hotel_Model->get_season($hotel_season_prices[$sp]->season); echo $season_name->season;?></td>
            <td align="center" valign="middle" width="170" bgcolor="#eee" style="color:#227FB0; font-size:14px;"><?php $market_name = $this->B2b_Hotel_Model->get_market($hotel_season_prices[$sp]->market_id); echo $market_name->market_name; ?></td>
            <td align="center" valign="middle" width="170" bgcolor="#eee" style="color:#966693; font-size:14px;"><?php echo $hotel_season_prices[$sp]->xml_currency;?> <?php echo $grand_total_cost; //$hotel_season_prices[$sp]->total_cost;?> <br />
            <?php 
				if (in_array("On Request", $stack)) {
					echo "<span style='color:#ff9900;font-weight: bold;'>On Request</span>";
				}
				else{
				    echo "<span style='color:green;'>Available</span>";	
				}
            ?>
            </td>
            <td align="center" valign="middle" width="170" bgcolor="#eee">
            
           
            <input type="radio" name="room_<?php echo $i;?>" id="room" value="<?php echo $hotel_season_prices[$sp]->total_cost; ?>,<?php echo $hotel_season_prices[$sp]->api_temp_hotel_id; ?>,<?php echo $hotel_season_prices[$sp]->org_amt; ?>,<?php echo $hotel_season_prices[$sp]->markup; ?>,<?php echo $hotel_season_prices[$sp]->sup_apart_maintain_month_id; ?>,<?php echo $hotel_season_prices[$sp]->room_code; ?>,<?php echo $hotel_season_prices[$sp]->market_id; ?>,<?php echo $hotel_season_prices[$sp]->room_type; ?>,<?php echo $hotel_season_prices[$sp]->category_type; ?>,<?php echo $hotel_season_prices[$sp]->season; ?>" class="radiobutton"/><br />
            <span id="showDailyRates_<?php echo $c.$sp.$i;?>" style="color:#178AA0; cursor:pointer; text-decoration:underline;" onclick="showDailyRates('<?php echo $c.$sp.$i;?>')">Daily Rates</span>
            
            <input type="hidden" name="temp_id" id="temp_id" value="<?php echo $hotel_season_prices[$sp]->api_temp_hotel_id; ?>" />
            <input type="hidden" name="org_amt" id="org_amt" value="<?php echo $hotel_season_prices[$sp]->org_amt; ?>" />
            <input type="hidden" name="markup" id="markup" value="<?php echo $hotel_season_prices[$sp]->markup; ?>" />
            <input type="hidden" name="grand_total_cost[]" id="grand_total_cost" value="<?php echo $grand_total_cost; ?>" />
            </td>
        </tr>
        
        <tr class='classic_room' width="700">
            <td align='left' valign='middle' colspan="4" style="line-height:22px;color:#966693;font-size:13px;">
            
			<?php $hotel_room_cancel_policy = $this->B2b_Hotel_Model->get_hotel_room_cancel_policy($hotel_season_prices[$sp]->sup_rate_tactics_id); ?>
            
            <!--Start of Cancel Deadline--> 
            <?php if(isset($hotel_room_cancel_policy->cancel_policy_from) && $hotel_room_cancel_policy->cancel_policy_from!=''){
				$cancel_policy_from = strtotime($hotel_room_cancel_policy->cancel_policy_from);
				$ss_date = strtotime($s_date);
				if($cancel_policy_from <= $ss_date){ ?>
            <div style='color:red;font-weight:normal;'>WITH IN CANCELLATION DEADLINE</div> <?php }} ?>
            <!--Start of Cancel Deadline--> 
            
            <!--Start of Remarks-->
            <?php if(isset($hotel_season_prices[$sp]->remarks) && $hotel_season_prices[$sp]->remarks!= ''){ ?>
            <?php echo $hotel_season_prices[$sp]->remarks; ?><br /> <?php } ?>            
            <!--End of Remarks-->
            
            <!--Start of Minimum Stay Nights-->   
            <?php if(isset($hotel_room_cancel_policy->minimum_stay_nights) && $hotel_room_cancel_policy->minimum_stay_nights!=''){ ?> Minimum Stay Nights: <?php echo $hotel_room_cancel_policy->minimum_stay_nights; ?> from <?php echo $hotel_room_cancel_policy->minimum_stay_from; ?> to <?php echo $hotel_room_cancel_policy->minimum_stay_to; ?><br /><?php } ?>
            <!--End of Minimum Stay Nights--> 
            
            <!--Start of Cancellation Policy with rates-->
            <?php if(isset($hotel_season_prices[$sp]->cancel_policy_desc) && $hotel_season_prices[$sp]->cancel_policy_desc!= ''){ ?>
            <?php echo $hotel_season_prices[$sp]->cancel_policy_desc; ?><br /> <?php } ?>
            
            <?php if(isset($hotel_room_cancel_policy->cancel_policy_from) && $hotel_room_cancel_policy->cancel_policy_from!=''){ ?>
            A charge of AED <?php echo $hotel_room_cancel_policy->cancel_policy_percent; ?> <?php echo $hotel_room_cancel_policy->cancel_policy_charge; ?> will apply if Cancelled or Amended between <?php echo $hotel_room_cancel_policy->cancel_policy_from; ?> and <?php echo $hotel_room_cancel_policy->cancel_policy_to; ?><br /><?php } ?>
            <!--End of Cancellation Policy with rates-->
            
            </td>
        </tr>
</table>
            </div>
            </td>
        </tr>
         <tr class='classic_room' width="700" style="height:0px; line-height:0px;">
            <td align='left' valign='middle' colspan="4">&nbsp;</td>
        </tr>
		<?php $grand_total_cost=0; } ?>
        </table>
    </td>
    </tr>
     <tr>
     <td height="1" colspan="2" bgcolor="#999"></td>
 	</tr>
	<?php } ?>
</table>
<?php } ?>  
 
<table width="100%" border="0" cellspacing="10" cellpadding="0" class="hotelnames" style="margin-bottom:3px;border: 1px solid #BEE7FF;">
    <tr>
        <td width="25%" align="left" style="font-size:15px;">
        <input type="hidden" name="api_temp_hotel_id" id="api_temp_hotel_id" value="" />
        <input type="hidden" name="totalOrgAmt" id="totalOrgAmt" value="" />
        <input type="hidden" name="totalMarkAmt" id="totalMarkAmt" value="" />
        
        <input type="hidden" name="maintain_month_id" id="maintain_month_id" value="" />
        <input type="hidden" name="room_code" id="room_code" value="" />
        <input type="hidden" name="market_id" id="market_id" value="" />
        <input type="hidden" name="room_type" id="room_type" value="" />
        <input type="hidden" name="cate_type" id="cate_type" value="" />
        <input type="hidden" name="season" id="season" value="" />
        
        </td>
        <td width="25%" align="left" style="font-size:15px;"><input type="hidden" name="totalValue" id="totalValue" value="" /></td>
        <td width="25%" align="center" style="font-size:15px;color:#966693; font-size:14px; display:none;" id="resultTotal">&nbsp;</td>
        <td width="25%" align="right" style="font-size:15px;"><!--<a href="#"><img src="<?php echo WEB_DIR; ?>images/bookin-img.jpg" border="0" /></a>--><input type="image" src="<?php echo WEB_DIR; ?>images/bookin-img.jpg" name="Submit" /></td>
    </tr>
 </table>
</form>   
    
<!--    <table align="left" width="724" border="0" cellspacing="5" cellpadding="5" class="sum-txt" style="margin-top:15px; font-size:15px; font-weight:bold; background-color:#bee7ff; border-radius:10px;">
    
    <tr>
     <td width="260" align="left">Room Type</td>
     <td width="110" align="center">Inclusion</td>
     <td width="30" align="center">Night</td>
     <td width="50" align="center">Cost</td>
     <td width="80" align="center">Status</td>
     <td width="80">&nbsp;</td>
     
    </tr>
    </table>
    <table align="left" width="724" border="0" cellspacing="5" cellpadding="5" class="sum-txt" style="margin-top:2px; font-size:13px; border:1px #bee7ff solid; border-radius:10px;">
    <?php
    $room_count = $_SESSION['room_count'];
    
    if($room_count == 1)
    {
        
        $room_info  = $this->B2b_Hotel_Model->fetch_gta_temp_result_room($_SESSION['ses_id'],$service->hotel_code);
    
    for($t=0;$t< count($room_info);$t++)
    {
    if(count($room_info)-1 == $t )
    {
    echo '<tr class="hotelfa-div_bootom">';
    }
    else
    {
    echo '<tr class="hotelfa-div">';
    }
    ?>
    
    
     <td width="260" align="left"><?php echo $room_info[$t]->room_type; ?> </td>
     <td width="110" align="center"><?php echo $room_info[$t]->inclusion; ?></td>
     <td width="30" align="center"><?php echo $_SESSION['days']; ?></td>
     <td width="50" align="center"><?php echo $room_info[$t]->total_cost.' USD'; ?></td>
     <td width="80" align="center"><?php echo $room_info[$t]->status; ?></td>
     <td width="80" align="center"><a  href="<?php echo WEB_URL.'b2b_hotel/pre_booking/'.$room_info[$t]->api_temp_hotel_id; ?> "><img src="<?php echo WEB_DIR; ?>images/bookin-img.jpg" border="0" /></a></td>
    </tr>
    
    <?php
    }
    
     
    }
    else
    {
    if($service->api =='hotelsbed')
    {	
    //echo "<pre/>";
    //print_r($service);exit;
    $merge_inclsuion = $this->B2b_Hotel_Model->get_merge_inclsuion_hotelsbed($service->hotel_code,$service->api,$service->session_id,$service->contractnameVal);
    //$merge_inclsuion = $this->Search_Model->get_merge_inclsuion_hbm($row->hotel_id,$row->api_name,$row->criteria_id,$row->cancellation_enddate);
                    
     /*?>$strings=array();
    for($tt=0;$tt< count($merge_inclsuion);$tt++)
    {
    
         $strings_inc = $merge_inclsuion[$tt]->inclusion;  
         $merge_inclsuion_inc = $this->Hotel_Model->get_merge_inclsuion_hotelsbed_inc($service->hotel_code,$service->api,$service->session_id,$strings_inc);
         for($rr=0;$rr<count($merge_inclsuion_inc);$rr++)
         {
                $strings[]=$merge_inclsuion_inc[$rr]->api_temp_hotel_id 	;
         }
        //echo "<pre/>";
        //print_r($strings);exit;
    } 
        //$strings = explode(' ', $string);
        
        $b=array();
        
        $a = $this->Hotel_Model->concatss($strings, "");
        
        for($i=0;$i<count($a);$i++)
        {
            
            $haystack="||";
            
            $cnt_val = strlen($a[$i]) - strlen(str_replace(str_split($haystack), '', $a[$i]));
        $count = $_SESSION['room_count']*2;
    
        if($cnt_val == $count)
        {
            
            $cut_val = substr($a[$i],2);
            $cut_expl = explode("||",$cut_val);
            
        $b[]=$cut_expl;
     $c_c=array();
     $a_a=array();
     $a_b=array();
    $codt=''; 
    for($ss=0;$ss<count($b);$ss++)
    {
    $a_a=$cut_expl;
    
    $a_b=$b[$ss];
    $c_c =  array_diff($a_a, $a_b);
    
    if($c_c !='')
    {
        $merger_total_cost=0;
        $merge_room_type='';
        $merge_inclusion='';
        $merge_status='';
        $merge_result_id='';
            for($ii=0;$ii<count($cut_expl);$ii++)
            {
            
            $merge_inclsuionroom = $this->Hotel_Model->get_merge_inclsuion_hotelsbed_mapping($service->hotel_code,$service->api,$service->session_id,$cut_expl[$ii]);
        
                            $merger_total_cost = $merger_total_cost + $merge_inclsuionroom->total_cost;
                            $merge_room_type .=$merge_inclsuionroom->room_type.'<br>';
                            $merge_inclusion .=$merge_inclsuionroom->inclusion.'<br>';
                            $merge_status .= $merge_inclsuionroom->status.'<br>';
                            $merge_result_id .= $merge_inclsuionroom->api_temp_hotel_id.'-';
    
            }
    }
    }
    
        $merge_result_id1 = substr($merge_result_id,0,-1);
    
        $this->Hotel_Model->insert_hotel_detail_mapping($service->session_id,$merge_room_type,$merge_inclusion,$_SESSION['days'],$merger_total_cost.' USD',$merge_status,$merge_result_id1);
            
            }
        }
    
        $row = $this->Hotel_Model->get_hotel_detail_mapping($service->session_id);
               <?php */?>
               <?php
               // echo "<pre/>";
               // print_r($merge_inclsuion);exit;
               //  echo count($merge_inclsuion);exit;
               foreach($merge_inclsuion as $row1)
                  {
                        $merge_total =0;
                        $usd_hb_total=0;
                        $merge_roomtype = '';
                        $merge_nightprice='';
                        $merge_result_id='';
                        $show_room='';
                        $resultid_hbval=array();
                        //$a_adult=array();
                    //$a_child=array();
                    //	for($ee=0;$ee<$_SESSION['room_count'];$ee)
                    //	{
                    //		$a_adult = $_SESSION['org_adult'][$ee];
                    //		$a_child = $_SESSION['org_child'][$ee];
                    //		$merge_room_result = $this->Hotel_Model->get_mergeroom_result_hbm_only_meal($row1->hotel_code,$row1->api,$row1->session_id,$row1->inclusion,$a_adult,$a_child);
                    //	}
                    //	echo "<pre/>";
                    //	print_r($a_adult);exit;
                        $merge_room_result = $this->B2b_Hotel_Model->get_mergeroom_result_hbm_only_meal($row1->hotel_code,$row1->api,$row1->session_id,$row1->inclusion);
                    //	echo "<pre/>";
                    //	print_r($merge_room_result);exit;
                     /*  for ($e = 0; $e < count($merge_room_result); $e++)
    {
    $duplicate = null;
    for ($ee = $e+1; $ee < count($merge_room_result); $ee++)
    {
    
    if (strcmp($merge_room_result[$ee]->adult,$merge_room_result[$e]->adult) === 0)
    {
    $duplicate = $ee;
    break;
    }
    }
    if (!is_null($duplicate))
    array_splice($merge_room_result,$duplicate,1);
    }
                */	
                        foreach($merge_room_result as $row)
                        {
                            
                            $tot_cost = $row->total_cost;
                            $status=$row->status;
                            $usd_hb_total = $usd_hb_total + $tot_cost;
                            $USD_hotelsbed = $usd_hb_total;
                            
                            $merge_roomtype .=$row->room_type.'<br/>';
                            $resultid_hbval[] = $row->api_temp_hotel_id;
                            $merge_total = $merge_total + number_format($tot_cost,'2','.','');
    
    
                        }
                        $merge_result_id=implode("-",$resultid_hbval);
                    
    
    
    ?>	
    
    <tr  class="hotelfa-div">
     <td width="260" align="left"><?php echo $merge_roomtype; ?> </td>
     <td width="110" align="center"><?php echo $row1->inclusion; ?></td>
     <td width="50" align="center"><?php echo $_SESSION['days']; ?></td>
     <td width="30" align="center"><?php echo $merge_total; ?></td>
     <td width="80" align="center"><?php echo $row1->status; ?></td>
     <td width="80" align="center"><a  href="<?php echo WEB_URL.'b2b_hotel/pre_booking/'.$merge_result_id; ?> "><img src="<?php echo WEB_DIR; ?>images/bookin-img.jpg" border="0" /></a></td>
    </tr>
    <?php
    }
    //$merge_room_type .= "<br>";
    //$merge_result_id = substr($merge_result_id, 0, -1);
    //echo $ruby;
    }
    elseif($service->api =='gta')
    {
    $room_info  = $this->B2b_Hotel_Model->fetch_gta_temp_result_room($_SESSION['ses_id'],$service->hotel_code);
    for($t=0;$t< count($room_info);$t++)
    {
        if(count($room_info)-1 == $t )
    {
        echo '<tr class="hotelfa-div_bootom">';
    }
    else
    {
        echo '<tr class="hotelfa-div">';
    }
    ?>
    
     <td width="260" align="left"><?php echo $room_info[$t]->room_type; ?></td>
     <td width="110" align="center"><?php echo $room_info[$t]->inclusion; ?></td>
     <td width="50" align="center"><?php echo $_SESSION['days']; ?></td>
     <td width="30" align="center"><?php echo $room_info[$t]->total_cost.' USD'; ?></td>
     <td width="80" align="center"><?php echo $room_info[$t]->status; ?></td>
     <td width="80" align="center"><a  href="<?php echo WEB_URL.'b2b_hotel/pre_booking/'.$room_info[$t]->api_temp_hotel_id; ?> "><img src="<?php echo WEB_DIR; ?>images/bookin-img.jpg" border="0" /></a></td>
    </tr>
    <?php
    }
    
     
    
    }
    elseif($service->api == 'hotelspro')
    {
        
             $room_info  = $this->B2b_Hotel_Model->fetch_gta_temp_result_room($_SESSION['ses_id'],$service->hotel_code);
    
    for($t=0;$t< count($room_info);$t++)
    {
    ?>
    
    <tr>
    <td style="padding-top:4px;" class="table_colom-row" ><?php echo $room_info[$t]->room_type; ?></td>
    <td class="table_colom-row"><?php echo $room_info[$t]->inclusion; ?></td>
    <td class="table_colom-row"><?php echo $_SESSION['days']; ?></td>
    <td class="table_colom-row"><?php echo $room_info[$t]->total_cost.' USD'; ?></td>
    <td class="table_colom-row"><?php echo $room_info[$t]->status; ?></td>
    <td align="right" class="table_colom-row">
    <?php
    if( $room_info[$t]->api=='hotelspro')
    {
    ?> <a href="<?php echo WEB_URL.'b2b_hotel/pro_pre_booking/'.$room_info[$t]->api_temp_hotel_id; ?> "><img src="<?php echo WEB_DIR; ?>images/bookin-img.jpg" border="0" /></a>
    <?php
    }
    else
    {
    ?> <a href="<?php echo WEB_URL.'b2b_hotel/pre_booking/'.$room_info[$t]->api_temp_hotel_id; ?> "><img src="<?php echo WEB_DIR; ?>images/bookin-img.jpg" border="0" /></a>
    <?php
    }
    ?>
    </td>
    </tr>
    
    <?php
    }
    }
    elseif($service->api == 'travco')
    {
            
    
    //echo "<pre/>";
    //print_r($service);exit;
    $merge_inclsuion = $this->B2b_Hotel_Model->get_merge_inclsuion_travco($service->hotel_code,$service->api,$service->session_id);
    
        //	foreach($merge_inclsuion as $row1)
               //  {
                        $merge_total =0;
                        $usd_hb_total=0;
                        $merge_roomtype = '';
                        $merge_nightprice='';
                        $merge_result_id='';
                        $merge_inclusion='';
                        $merge_statis='';
                        $show_room='';
                        $resultid_hbval=array();
                        $merge_room_result = $this->B2b_Hotel_Model->get_mergeroom_result_hbm_only_meal_travco($service->hotel_code,$service->api,$service->session_id,$service->api_temp_hotel_id);
                        
                        foreach($merge_room_result as $row)
                        {
                            
                            $tot_cost = $row->total_cost;
                            $status=$row->status;
                            $usd_hb_total = $usd_hb_total + $tot_cost;
                            $USD_hotelsbed = $usd_hb_total;
                            
                            $merge_roomtype .=$row->room_type.'<br/>';
                            $merge_inclusion .=$row->inclusion.'<br/>';
                            $merge_statis .=$row->status.'<br/>';
                            $resultid_hbval[] = $row->api_temp_hotel_id;
                            $merge_total = $merge_total + number_format($tot_cost,'2','.','');
    
    
                        }
                        $merge_result_id=implode("-",$resultid_hbval);
                    
    
    
    ?>	
    
    <tr  class="hotelfa-div">
     <td width="260" align="left"><?php echo $merge_roomtype; ?> </td>
     <td width="110" align="center"><?php echo $merge_inclusion; ?></td>
     <td width="50" align="center"><?php echo $_SESSION['days']; ?></td>
     <td width="30" align="center"><?php echo $merge_total; ?></td>
     <td width="80" align="center"><?php echo $merge_statis; ?></td>
     <td width="80" align="center"><a  href="<?php echo WEB_URL.'b2b_hotel/pre_booking/'.$merge_result_id; ?> "><img src="<?php echo WEB_DIR; ?>images/bookin-img.jpg" border="0" /></a></td>
    </tr>
    <?php
    
               }
    
    }
    
    
    ?>
    
    </table>
-->    
    <table align="left" width="724" border="0" cellspacing="5" cellpadding="5" class="sum-txt" style="margin-top:15px; font-size:15px; font-weight:bold; background-color:#bee7ff; border-radius:10px;">
      
      <tr>
         <td width="200" align="left">Hotel Facilities</td>
         <td  align="left">&nbsp;</td>
         
      </tr>
    </table>
    <?php 
$hotel='';
$room='';
/*if($hotel_facility!='')
{
	for($k=0;$k<count($hotel_facility);$k++)
	{
		$hotel = $hotel_facility[$k]->fac.', '.$hotel;
	}
}
if($room_facility!='')
{
	for($sd=0;$sd<count($room_facility);$sd++)
	{
		$room = $room_facility[$sd]->fac.', '.$room;
	}
}*/

?>
<table align="left" width="724" border="0" cellspacing="0" cellpadding="5" class="sum-txt" style="margin-top:2px; font-size:13px; border:1px #bee7ff solid; border-radius:10px;">
<tr>
<td align="left">
<div style="width:700px; margin:0 auto;">

<div class="hotelfa-div" style="border:none">
<!--<div style="width:150px; float:left; font-weight:bold">Generals </div>-->
<div style="width:650px; float:left"><?php echo trim($hotel_facility, ","); ?>
</div>
</div>

<!-- <div class="hotelfa-div">
<div style="width:150px; float:left;  font-weight:bold">Services </div>
<div style="width:550px; float:left">
<?php
$string = $hotel;
$hot = explode(", ",$hotel);
$hotel_ser='';
for($a=0;$a< count($hot);$a++)
{
if(stristr($hot[$a], 'service') == TRUE) {
$hotel_ser = $hot[$a].', '.$hotel_ser;
}
else
{
$hotel_ser = $hotel_ser; 
}
}
echo $hotel_ser;
?>
</div>
</div>

<div class="hotelfa-div">
<div style="width:150px; float:left;  font-weight:bold">Internet </div>
<div style="width:550px; float:left"> <?php
$string = $hotel;
if(stristr($string, 'WLAN') == TRUE)
{
$string = $string.',wi-fi';
}
if(stristr($string, 'wi-fi') === FALSE) 
{
echo ' Wi-fi is Not available in the entire hotel.';
}
else
{
echo ' Wi-fi is available in the entire hotel.'; 
}
?>
</div>
</div>

<div class="hotelfa-div_bootom">
<div style="width:150px; float:left;  font-weight:bold">Parking </div>
<div style="width:550px; float:left"> <?php
$string = $hotel;
if(stristr($string, 'park') === FALSE) {
echo 'No parking available.';
}
else
{
echo 'Parking available.'; 
}
?>
</div>
</div>-->

</div>
</td>
</tr>
</table>


<table align="left" width="724" border="0" cellspacing="5" cellpadding="5" class="sum-txt" style="margin-top:15px; font-size:15px; font-weight:bold; background-color:#bee7ff; border-radius:10px;">

<tr>
<td width="200" align="left">Room Facilities</td>
<td  align="left">&nbsp;</td>

</tr>
</table>
<table align="left" width="724" border="0" cellspacing="0" cellpadding="5" class="sum-txt" style="margin-top:2px; font-size:13px; border:1px #bee7ff solid; border-radius:10px;">
<tr>
<td align="left">
<div style="width:700px; margin:0 auto;">

<div class="hotelfa-div" style="border:none">
<!--<div style="width:150px; float:left; font-weight:bold">Generals </div>-->
<div style="width:650px; float:left"><?php echo trim($room_facility, ","); ?>
</div>
</div>

</div>
</td>
</tr>
</table>


<!-- <table align="left" width="724" border="0" cellspacing="5" cellpadding="5" class="sum-txt" style="margin-top:15px; font-size:15px; font-weight:bold; background-color:#bee7ff; border-radius:10px;">

<tr>
<td width="200" align="left">Hotel Address</td>
<td  align="left">&nbsp;</td>

</tr>
</table>
<table align="left" width="724" border="0" cellspacing="0" cellpadding="5" class="sum-txt" style="margin-top:2px; font-size:13px; border:1px #bee7ff solid; border-radius:10px;">
<tr>
<td align="left">
<div style="width:700px; margin:0 auto;">

<div class="hotelfa-div">
<div style="width:150px; float:left; font-weight:bold">Address </div>
<div style="width:550px; float:left"><?php echo $service->address."<br>".$service->city; ?>t</div>
</div>

<div class="hotelfa-div">
<div style="width:150px; float:left; font-weight:bold">Phone </div>
<div style="width:550px; float:left"><?php echo $service->phone; ?></div>
</div>


<div class="hotelfa-div_bootom">
<div style="width:150px; float:left; font-weight:bold">Fax </div>
<div style="width:550px; float:left"><?php echo $service->fax; ?></div>
</div>
</div>
</td>
</tr>
</table>-->

<table align="left" width="724" border="0" cellspacing="5" cellpadding="5" class="sum-txt" style="margin-top:15px; font-size:15px; font-weight:bold; background-color:#bee7ff; border-radius:10px;">
<tr>
<td width="200" align="left">Check in and Check out</td>
<td  align="left">&nbsp;</td>
</tr>
</table>
<table align="left" width="724" border="0" cellspacing="0" cellpadding="5" class="sum-txt" style="margin-top:2px; font-size:13px; border:1px #bee7ff solid; border-radius:10px;">
<tr>
<td align="left">
<div style="width:700px; margin:0 auto;">
<div class="hotelfa-div">
<div style="width:650px; float:left">All hotels check in time is between <?php echo $service->checkinfrom; ?> to <?php echo $service->checkinto; ?> and check out time is between <?php echo $service->checkoutfrom; ?> to <?php echo $service->checkoutto; ?></div>
</div>
<div class="hotelfa-div">
<div style="width:650px; float:left">Automatically check-in guest after <?php echo $service->checkin_guest_after; ?> hrs and Automatically check-out guest after <?php echo $service->checkout_guest_after; ?> hrs</div>
</div>
<div class="hotelfa-div">
<div style="width:650px; float:left">Key Collection is <?php if($service->key_collection == '1') { echo 'On-Site'; } if($service->key_collection == '2') { echo 'Off-Site '.$service->key_collection_desc; } ?></div>
</div>
<div class="hotelfa-div">
<div style="width:650px; float:left">Tax is <?php echo $service->tax; ?> </div>
</div>
<div class="hotelfa-div_bootom">
<div style="width:650px; float:left">Service Charge is <?php echo $service->service_charge; ?> </div>
</div>
</div>
</td>
</tr>
</table>

<table align="left" width="724" border="0" cellspacing="5" cellpadding="5" class="sum-txt" style="margin-top:15px; font-size:15px; font-weight:bold; background-color:#bee7ff; border-radius:10px;">
<tr>
<td width="200" align="left">Detail Locations</td>
<td  align="left">&nbsp;</td>
</tr>
</table>
<table align="left" width="724" border="0" cellspacing="0" cellpadding="5" class="sum-txt" style="margin-top:2px; font-size:13px; border:1px #bee7ff solid; border-radius:10px;">
<tr>
<td align="left">
<div style="width:700px; margin:0 auto;">
<div class="hotelfa-div">
<div style="width:200px; float:left; font-weight:bold">Location (detailed location) </div>
<div style="width:450px; float:left"><?php echo $service->detail_location; ?></div>
</div>
<div class="hotelfa-div">
<div style="width:200px; float:left; font-weight:bold">Nearest Airport </div>
<div style="width:450px; float:left"><?php echo $service->nearby_airport; ?></div>
</div>
<div class="hotelfa-div">
<div style="width:200px; float:left; font-weight:bold">Nearest Public Transport </div>
<div style="width:450px; float:left"><?php echo $service->nearby_transport; ?></div>
</div>
<div class="hotelfa-div_bootom">
<div style="width:200px; float:left; font-weight:bold">Places of Interest Nearby </div>
<div style="width:450px; float:left"><?php echo $service->nearby_placeinterest; ?></div>
</div>
</div>
</td>
</tr>
</table>

<table align="left" width="724" border="0" cellspacing="5" cellpadding="5" class="sum-txt" style="margin-top:15px; font-size:15px; font-weight:bold; background-color:#bee7ff; border-radius:10px;">
<tr>
<td width="200" align="left">Map</td>
<td  align="left">&nbsp;</td>
</tr>
</table>
<script src="http://maps.google.com/maps?file=api&v=2&key=ABQIAAAApz8aTXS5eUyxvs5uMszdKRfgfgRgqqCDjpPIuqwLUuHujN8I3D2s4RShDFoZ233PbhiKTfM2Mr6LzhnYEA" type="text/javascript"></script>

<script type="text/javascript">
//<![CDATA[
function mapLoad() {
if (GBrowserIsCompatible()) {
var map = new GMap2(document.getElementById("map"));

var point = new GLatLng(<?php print $service->latitude; ?>,<?php print $service->longitude;?>);
map.setCenter(new GLatLng(<?php print $service->latitude; ?>,<?php print $service->longitude; ?>),16);
var marker = new GMarker(point);

map.addOverlay(marker);
map.addControl(new GSmallMapControl());
map.addControl(new GMapTypeControl());
}

panoClient = new GStreetviewClient();
panoClient.getNearestPanorama(new GLatLng(<?php print $service->latitude; ?>,<?php print $service->longitude; ?>),function(a){



if (a.code == 200){



var fenwayPark = new GLatLng(<?php print $service->latitude; ?>,<?php print $service->longitude; ?>);
panoramaOptions = { latlng:fenwayPark };
myPano = new GStreetviewPanorama(document.getElementById("pano"), panoramaOptions);
GEvent.addListener(myPano, "error", handleNoFlash);
}


});

handleNoFlash = function (errorCode) {
if (errorCode == '603') {

//alert("Error: Flash doesn't appear to be supported by your browser");
return;
}
}

window.focus();
}
//]]>
</script>

<script language="JavaScript" type="text/javascript">
onload = mapLoad;
onunload = GUnload;
</script>             
<table align="left" width="724" border="0" cellspacing="0" cellpadding="5" class="sum-txt" style="margin-top:2px; font-size:15px; border:1px #bee7ff solid; border-radius:10px;">
<tr>
<td align="left">
<div id="map" style="width: 711px; height:250px;margin-bottom:5px">Not Available</div>
</td>
</tr>
</table>

<table align="left" width="724" border="0" cellspacing="5" cellpadding="5" class="sum-txt" style="margin-top:15px; font-size:15px; font-weight:bold; background-color:#bee7ff; border-radius:10px;">

<tr>
<td width="200" align="left">Street Map</td>
<td  align="left">&nbsp;</td>

</tr>
</table>
<table align="left" width="724" border="0" cellspacing="0" cellpadding="5" class="sum-txt" style="margin-top:2px; font-size:15px; border:1px #bee7ff solid; border-radius:10px;">
<tr>
<td align="left">
   
<div id="pano" style="width: 711px; height:250px;margin-bottom:5px"></div>

</td>
</tr>
</table>

    
  </div>
  </div>
</div>
</div></div>
<div style="clear:both"></div>
<?php $this->load->view('b2b/footer'); ?>
</body>
</html>

<script>
$('.classic_room').click(function(){
	var val = [];
	var temp = [];
	var orgAmt = [];
	var markAmt = [];
	var maintain_month_id = [];
	var room_code = [];
	var market_id = [];
	var room_type = [];
	var cate_type = [];
	var season = [];
	$(':radio:checked').each(function(i){
		var arr = $(this).val().toString().split(","); 
		//alert(arr[0]); 
		val[i] = arr[0];
		temp[i] = arr[1];
		orgAmt[i] = arr[2];
		markAmt[i] = arr[3];
		maintain_month_id[i] = arr[4];
		room_code[i] = arr[5];
		market_id[i] = arr[6];
		room_type[i] = arr[7];
		cate_type[i] = arr[8];
		season[i] = arr[9];
	});
	//alert(val);
	var totAmt = val.toString().split(","); //alert(totAmt[0]);
	var totorgAmt = orgAmt.toString().split(","); 
	var totmarkAmt = markAmt.toString().split(","); 
	var count = totAmt.length;
	var countorgAmt = totorgAmt.length;
	var countmarkAmt = totmarkAmt.length;
	var totalAmt=0.00; var totalOrgAmt=0.00; var totalMarkAmt=0.00;
	for(var i=0; i<count; i++){
		
	totalAmt = parseFloat(totalAmt) + parseFloat(totAmt[i]);
	totalAmt = parseFloat(totalAmt).toFixed(2);
	
	totalOrgAmt = parseFloat(totalOrgAmt) + parseFloat(totorgAmt[i]);
	totalOrgAmt = parseFloat(totalOrgAmt).toFixed(2);
	
	totalMarkAmt = parseFloat(totalMarkAmt) + parseFloat(totmarkAmt[i]);
	totalMarkAmt = parseFloat(totalMarkAmt).toFixed(2);
	}
	$('#resultTotal').html('AED '+totalAmt);
	$('#totalValue').val(totalAmt);
	$('#totalOrgAmt').val(totalOrgAmt);
	$('#totalMarkAmt').val(totalMarkAmt);
	$('#api_temp_hotel_id').val(temp);
	
	$('#maintain_month_id').val(maintain_month_id);
	$('#room_code').val(room_code);
	$('#market_id').val(market_id);
	$('#room_type').val(room_type);
	$('#cate_type').val(cate_type);
	$('#season').val(season);
	
	
});
function showDailyRates(id){
	$('#DailyRates_'+id).toggle('slow');
	$('#showDailyRates_'+id).html('Daily Rates');
}
</script>
 