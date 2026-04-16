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
		if($result[$i]->hotel_name !='')
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
												?><img src="<?php echo WEB_DIR.'images/0 star copy.jpg'; ?>" />
                                                <?php
											   }
											   ?>
                                                </span><br/><br/><span><span class="fw"><?php echo $result[$i]->city; ?></span> /<span class="fw01">
             <!--<a href="javascript:searchLocationsNear(<?php echo $result[$i]->api_temp_hotel_id; ?>);" > -->
             <a href="<?php print WEB_URL.'hotel/mapping_fun/'.$result[$i]->api_temp_hotel_id; ?> "  onclick="$('#rlightbox').show();" target="rlight_box" class="text3">Show Map</a></span></span>
                                             
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
												$total = number_format($this->session->userdata('currency_value') * $result[$i]->low_cost, 2, '.', ',');
												?>
                                               	  <div class="erate"> <?php echo $total.' '.$this->session->userdata('currency'); ?>
                                                    <p>include Hotels</p>
                                                    <div class="book_now_btn"><a href="<?php echo WEB_URL.'hotel/hotel_detail/'.$result[$i]->api_temp_hotel_id; ?> "><img src="<?php echo WEB_DIR ?>images/book_now_btn.jpg" width="118" height="38" /></a></div>
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
}
else
{
	?>
    <div class="for_loop">
                                   	 
                                      <div class="wi565">
                                      		<div class="wi565a">
                                            	<div class="wi407">
                                               
                                    <div style="background-attachment: scroll;
background-clip: border-box;
background-color: transparent;
background-image: none;
background-origin: padding-box;
clear: right;
color: #555;
display: block;
font-family: arial, helvetica, clean, sans-serif;
font-size: 12px;
font-style: normal;
font-variant: normal;
font-weight: normal;
height: 172px;
line-height: 16px;
margin-bottom: 0px;
margin-left: 0px;
margin-right: 0px;
margin-top: 0px;
overflow-x: hidden;
overflow-y: hidden;
padding-bottom: 10px;
padding-left: 10px;
padding-right: 0px;
padding-top: 10px;
position: relative;
width: 641px;">
  <div  style="background-attachment: scroll;
background-clip: border-box;
background-color: transparent;
background-image: none;
background-origin: padding-box;
color: #555;
display: block;
font-family: arial, helvetica, clean, sans-serif;
font-size: 12px;
font-style: normal;
font-variant: normal;
font-weight: normal;
height: 116px;
line-height: 16px;
margin-bottom: 0px;
margin-left: 0px;
margin-right: 0px;
margin-top: 0px;
padding-bottom: 0px;
padding-left: 0px;
padding-right: 0px;
padding-top: 0px;
width: 641px;">
    <div  style="background-attachment: scroll;
background-clip: border-box;
background-color: transparent;
background-image: none;
background-origin: padding-box;
border-bottom-color: #BFBFBF;
border-bottom-style: solid;
border-bottom-width: 1px;
border-left-color: #BFBFBF;
border-left-style: solid;
border-left-width: 1px;
border-right-color: #BFBFBF;
border-right-style: solid;
border-right-width: 1px;
border-top-color: #BFBFBF;
border-top-style: solid;
border-top-width: 1px;
color: #555;
display: block;
font-family: arial, helvetica, clean, sans-serif;
font-size: 12px;
font-style: normal;
font-variant: normal;
font-weight: normal;
height: 60px;
line-height: 16px;
margin-bottom: 10px;
margin-left: 0px;
margin-right: 0px;
margin-top: 0px;
padding-bottom: 1px;
padding-left: 1px;
padding-right: 1px;
padding-top: 1px;
width: 631px;">
  <table>
    <tbody>
      <tr>
        <td class="msgIcon"><img src="<?php echo WEB_DIR; ?>images/Warning.png"  /></td>
        <td class="noticeTextType1 strongText" tabindex="-1">
          <strong>Sorry, there are no hotels that match your search</strong></td>
      </tr>
    </tbody>
  </table>
</div><div >
      <strong>What now? Call us and we'll help you find a hotel:</strong>
      <ul>
        <li>
          Speak to a Provab.com travel specialist: <strong>1800 102 1122 (India Toll Free) +91 124 487 3878 (From abroad)</strong>,&nbsp;24 Hours,&nbsp;toll free</li>
        </ul>
    </div>
  </div>
  <div class="paginationContainerBottom notVisible">
    <div class="paginationContainerBottom notVisible">
      </div>
  </div>
  <div class="notificationMsg">
    <p id="disclaimer">
      </p>
    </div>
</div>
                                                </div>
                                                <div class="wi143">
                                               	  
                                                </div>
                                           </div>
                                      </div>
                                   	   </div><?php
}

?></div>