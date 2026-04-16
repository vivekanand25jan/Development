<div class="hotel-list-contents"><?php
	//$result = $this->Hotel_Model->fetch_gta_temp_result($_SESSION['ses_id']);


	$room_count = $_SESSION['room_count'];
if($result != '')
{
	$count = count($result);
	if($count > 10)
	{
		$count_val = 10;
	}
	else
	{
		$count_val = count($result);
	}
	for($i=0;$i< $count_val;$i++)
	{
		
	//if($result[$i]->api == 'hotelspro' || $result[$i]->api == 'gta')	
	//{
?>


<div class="for_loop">
                                   	  <div class="pic108"><img src="<?php echo WEB_DIR.'image_hotelspro1/'.$result[$i]->hotel_code.'.jpg'; ?>" alt="" width="108" height="105" /></div>
                                      <div class="wi565">
                                      		<div class="wi565a">
                                            	<div class="wi407"><span class="sp_pad"><?php echo $result[$i]->hotel_name; ?></span>
                                                <span style="margin:5px 0 0 10px; float:left;">
                                               <?php $star = $result[$i]->star; 
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
												?>
                                                <?php
											   }
											   ?>
                                                </span><br/><br/><span><span class="fw"><?php echo $result[$i]->city; ?></span> /<span class="fw01">
             <!--<a href="javascript:searchLocationsNear(<?php echo $result[$i]->api_temp_hotel_id; ?>);" > -->
             <a href="<?php print WEB_URL.'b2b_hotel/mapping_fun/'.$result[$i]->api_temp_hotel_id; ?> "  onclick="$('#rlightbox').show();" target="rlight_box" class="text3">Show Map</a></span></span>
                                             
                                             <div class="search_news"><?php echo substr($result[$i]->description,0,250); ?> </div><br />
                   
				<?php /*?>	$count = $this->Hotel_Model->fetch_facility_result_room_facility($_SESSION['ses_id'],$result[$i]->hotel_code,'wi-fi');
					if($count==1)	{			?>                         
            <img  width="25"  src="<?php echo WEB_DIR.'images/images.jpg'; ?>" />
            <?php }	 ?>
              <?php
					$count = $this->Hotel_Model->fetch_facility_result_room_facility($_SESSION['ses_id'],$result[$i]->hotel_code,'internet');
					if($count==1)	{			?>                         
            <img  width="25"  src="<?php echo WEB_DIR.'images/mouse.jpg'; ?>" />
            <?php }	 ?>
            <?php
					$count = $this->Hotel_Model->fetch_facility_result_room_facility($_SESSION['ses_id'],$result[$i]->hotel_code,'bar');
					if($count==1)	{			?>                         
            <img  width="25"  src="<?php echo WEB_DIR.'images/pp-icons-bar.png'; ?>" />
            <?php }	 ?>

            <img  width="25"  src="<?php echo WEB_DIR.'images/pp-icons-fitness.png'; ?>" />
            <img  width="25"  src="<?php echo WEB_DIR.'images/pp-icons-parking.png'; ?>" />
            <img  width="25"  src="<?php echo WEB_DIR.'images/pp-icons-pool.png'; ?>" />
            <img  width="25"  src="<?php echo WEB_DIR.'images/pp-icons-restaurant.png'; ?>" /><?php */?>
                               
                                             
                                                </div>
                                                <div class="wi143">
                                                <?php
												//echo "ss:".$this->session->userdata('agent_logged_in'); exit;
												//echo $result[$i]->low_cost . ",". $result[$i]->api;
												
												$total_price = $result[$i]->low_cost;
												/*if ($this->session->userdata('agent_logged_in')) {
													if ($this->session->userdata($result[$i]->api)) {
														$total_price = $total_price + (($this->session->userdata($result[$i]->api)/100)*$total_price);
														//echo "agent:".$total_price;
													}
												} else {
													if ($this->session->userdata('staff_logged_in')) {
													$total_price = $total_price + (($this->session->userdata('staff_commission')/100)*$total_price);
														//echo "staff:".$total_price;
													}
												}*/
												echo $result[$i]->api . "," . $result[$i]->low_cost_price;
												
												//$total = number_format($this->session->userdata('currency_value') * $total_price, 2, '.', ',');
												$total = $total_price;
												?>
                                               	  <div class="erate"> <?php echo $total.' '.$this->session->userdata('currency'); ?>
                                                    <p>include Hotels</p>
                                                    <div class="book_now_btn"><a href="<?php echo WEB_URL.'b2b_hotel/hotel_detail/'.$result[$i]->api_temp_hotel_id; ?> "><img src="<?php echo WEB_DIR ?>images/book_now_btn.jpg" width="118" height="38" /></a></div>
                                                  </div>
                                                </div>
                                           </div>
                                      </div>
                                   	   </div>
            
<?php
	//}
	/*elseif($result[$i]->api == 'hotelsbed')
	{
		if($room_count == 1)
		{
?>


<div class="for_loop">
                                   	  <div class="pic108"><img src="<?php echo WEB_DIR.'image_hotelspro1/'.$result[$i]->hotel_code.'.jpg'; ?>" alt="" width="108" height="115" /></div>
                                      <div class="wi565">
                                      		<div class="wi565a">
                                            	<div class="wi407"><span class="sp_pad"><?php echo 'hotelsbed -'.$result[$i]->hotel_name; ?></span>
                                                <span style="margin:5px 0 0 10px; float:left;"> <?php echo $result[$i]->star; ?> </span><br/><br/><span><span class="fw"><?php echo $result[$i]->city; ?></span> /<span class="fw01"> Show Map</span></span>
                                             
                                             <div class="search_news"><?php echo substr($result[$i]->description,0,250); ?> </div>
                                                </div>
                                                <div class="wi143">
                                               	  <div class="erate"><?php echo $result[$i]->low_cost.' USD'; ?>
                                                    <p>include Hotels</p>
                                                    <div class="book_now_btn"><a href="<?php echo WEB_URL.'hotel/hotel_detail/'.$result[$i]->api_temp_hotel_id; ?> "><img src="<?php echo WEB_DIR ?>images/book_now_btn.jpg" width="118" height="38" /></a></div>
                                                  </div>
                                                </div>
                                                <div class="wi407_bo"><span style="color:#06F; font-size:11px;">Latest booking: yesterday</span></div>
                                             
					
                                            </div>
                                      </div>
                                   	   </div>
            
<?php
	}
		else
		{
			
			?>
		<div class="for_loop">
                                   	  <div class="pic108"><img src="<?php echo WEB_DIR.'image_hotelspro1/'.$result[$i]->hotel_code.'.jpg'; ?>" alt="" width="108" height="115" /></div>
                                      <div class="wi565">
                                      		<div class="wi565a">
                                            	<div class="wi407"><span class="sp_pad"><?php echo 'hotelsbed -'.$result[$i]->hotel_name; ?></span>
                                                <span style="margin:5px 0 0 10px; float:left;"><img src="<?php echo WEB_DIR ?>images/star_rating.jpg" width="65" height="12" /></span><br/><br/><span><span class="fw"><?php echo $result[$i]->city; ?></span> /<span class="fw01"> Show Map</span></span>
                                             
                                             <div class="search_news"><?php echo substr($result[$i]->description,0,250); ?></div>
                                                </div>
                                                <div class="wi143">
                                               	  <div class="erate"> <?php echo $result[$i]->total_cost.' USD'; ?>
                                                    <p>include Hotels</p>
                                                    <div class="book_now_btn"><a href="<?php echo WEB_URL.'hotel/hotel_detail/'.$result[$i]->api_temp_hotel_id; ?> "><img src="<?php echo WEB_DIR ?>images/book_now_btn.jpg" width="118" height="38" /></a></div>
                                                  </div>
                                                </div>
                                                <div class="wi407_bo"><span style="color:#06F; font-size:11px;">Latest booking: yesterday</span></div>
                                            </div>
                                      </div>
                                   	   </div>
            <?php
		}
	
	}*/
	
	}
}
else
{
	?>
    <div class="for_loop">
                                   	  <div class="pic108"></div>
                                      <div class="wi565">
                                      		<div class="wi565a">
                                            	<div class="wi407">
                                               
                                      Sorry, there are no hotels that match your search.
                                                </div>
                                                <div class="wi143">
                                               	  
                                                </div>
                                           </div>
                                      </div>
                                   	   </div><?php
}

?></div>