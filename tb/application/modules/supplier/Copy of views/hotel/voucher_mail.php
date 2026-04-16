<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="<?php echo WEB_DIR ?>css/postion.css" rel="stylesheet" type="text/css" />

</head>

<body>
		<div id="main_continer">
   		  <div class="header">
                	
                    
            
                    
                    <div class="content_cover">
                    		
                            <div class="hotel_right_panel">
                       		  <div class="hotel_right_panel_header01"><span style="color:#ff7a01;">Your booking has been successfuly completed</span><br/>
<span style="font-size:12px; color:#333; font-weight:normal;">Booking Number : <?php echo $trans->booking_number; ?></span></div>
<div class="hotel_right_panel_header01">Dear Mr <?php echo $contact_info->first_name; ?> <br/>
<span style="font-weight:normal; font-size:14px;">Thank you for booking your travel with Provab. We are please to confirm your booking as per details below:</span> 
</div>


<div id="aa" class="hide_cover">
	<div class="travel_bg_cover">
    		<div class="travel_bg">
            		<div class="travel_icon_30_25"><img src="<?php echo WEB_DIR ?>images/travels_icon.jpg" width="30" height="25" /></div>Traveller Details
            </div>
            <?php
			$adult_co = explode("-",$result_view->adult);
			$adult_count = array_sum($adult_co);
			
			$child_co = explode("-",$result_view->child);
			$child_count = array_sum($child_co);
			
			?>
            <div class="travel_bg_body">
            	    <span class="widthsp100"> Guest Name </span>:
    <b>Mr. <?php echo $contact_info->first_name; ?></b><br/>
     <span class="widthsp100">No. of Adults </span>:
   <b> <?php echo $adult_count; ?> Adult </b><br/>
     <span class="widthsp100">No. of Children </span>:
    <b><?php echo $child_count; ?> Children </b><br/>
    <span class="widthsp100">voucher Date </span>:
    <b><?php echo $trans->created_date; ?>  </b><br/>


            </div>
    </div>
    <div class="travel_bg_right_cover">
    		<div class="travel_bg_right">
            	<div class="travel_icon_30_25"><img src="<?php echo WEB_DIR ?>images/reserva_icon.jpg" width="30" height="25" /></div>
            Your Reservation</div>
            <div class="travel_bg_right_body">
           
  
    <span class="widthsp200">Hotel Booking Number</span>:
    <b><?php echo $trans->booking_number; ?></b><br/>
    <span class="widthsp200">Check-in </span>:
    <b><?php echo $result_view->check_in; ?></b><br/>
    <span class="widthsp200">Check-out </span>:
    <b><?php echo $result_view->check_out; ?></b><br/>
    <span class="widthsp200">Rooms </span>:
   <b> <?php echo $result_view->no_of_room; ?> Room</b><br/>
    <span class="widthsp200">Nights </span>:
   <b> <?php echo $result_view->nights; ?> Nights</b><br/>
    


            </div>
    </div>
    <div class="hotel_detile_extra">
    		<div class="hotel_detile_ex_bg"><div class="travel_icon_30_25"><img src="<?php echo WEB_DIR ?>images/hotel_icon.jpg" width="30" height="25" /></div>Hotel Details</div>
            <div class="hotel_detile_ex_bg_body">
            		<div class="hotel_126_124"><img src="<?php echo WEB_DIR ?>image_hotelspro1/<?php echo $result_view->hotel_code; ?>.jpg" width="126" height="124" /></div>
        <div class="wi407_two_in">
                    		<div class="wi407_two_in_head"><?php echo $result_view->hotel_name; ?> 
                            
                          <?php $star = $result_view->star; 
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
                            
                            </div><div class="wi407_two_in_price"><br/>
                            <span style="font-size:10px; color:#3c5e90;"></span>
                            </div>
                            <div class="wi407_two_in_head_two"></div>
                            <div class="wi407_two_in_head_two_news_body"><?php echo $result_view->description; ?></div>
              </div>
              <div class="hoptel_name_raw">
              		<div class="hoptel_name_raw_L">Address :</div>
                    <div class="hoptel_name_raw_R"><?php echo $result_view->address; ?></div>
              </div>
               <div class="hoptel_name_raw">
              		<div class="hoptel_name_raw_L">City :</div>
                    <div class="hoptel_name_raw_R"><?php echo $result_view->city; ?></div>
              </div>
              <div class="hoptel_name_raw_col">
              		<div class="hoptel_name_raw_L">Phone :</div>
                    <div class="hoptel_name_raw_R"><?php echo $result_view->phone; ?></div>
              </div>
              <div class="hoptel_name_raw">
              		<div class="hoptel_name_raw_L">Fax :</div>
                    <div class="hoptel_name_raw_R"><?php echo $result_view->fax; ?></div>
              </div>
             
            </div>
    </div>
    
    <div class="hotel_detile_extra">
    		<div class="hotel_detile_ex_bg"><div class="travel_icon_30_25"><img src="<?php echo WEB_DIR ?>images/hotel_icon.jpg" width="30" height="25" /></div>Room Details</div>
            <div class="hotel_detile_ex_bg_body">
            		
        
              <div class="hoptel_name_raw">
              		<div class="hoptel_name_raw_L">Room Type :</div>
                    <div class="hoptel_name_raw_R"><?php echo $result_view->room_type; ?></div>
              </div>
             
               
              
              
             
            </div>
    </div>
    
    <div class="hotel_detile_extra">
    		<div class="hotel_detile_ex_bg"><div class="travel_icon_30_25"><img src="<?php echo WEB_DIR ?>images/hotel_icon.jpg" width="30" height="25" /></div>Fare Summary</div>
           <div class="hotel_detile_ex_bg_body">
            		
        
              <div class="hoptel_name_raw">
              		<div class="hoptel_name_raw_L">Total Room Price :</div>
                    <div class="hoptel_name_raw_R"><?php echo $trans->amount; ?> USD</div>
              </div>
             
               
              
              
             
            </div>
    </div>
    <div class="hotel_detile_extra">
    		<div class="hotel_detile_ex_bg"><div class="travel_icon_30_25"><img src="<?php echo WEB_DIR ?>images/hotel_icon.jpg" width="30" height="25" /></div>Cancellation Policy</div>
            <div class="hotel_detile_ex_bg_body">
            		
        
              <div class="hoptel_name_raw">
              		
                    <div class="hoptel_name_raw"><?php echo $result_view->cancel_policy; ?></div>
              </div>
             
               
              
              
             
            </div>
    </div>
    
    
    <div class="hotel_detile_extra">
    		<div class="hotel_detile_ex_bg"><div class="travel_icon_30_25"><img src="<?php echo WEB_DIR ?>images/hotel_icon.jpg" width="30" height="25" /></div>Passenger Details</div>
            <div class="hotel_detile_ex_bg_body">
            		
                    <?php
					for($i=0;$i< count($pass_info);$i++)
					{
						?>
        <div class="wi700has">
        		<div class="wi700has_L">Room <?php echo $i+1; ?>:  Mr. <?php echo $pass_info[$i]->first_name; ?></div>
              
        </div>
         <?php
					}
					?>
              
              
              
            </div>
    </div>
    
    
</div>

                      </div>
                    </div>
          
       
          
        </div>
        </div>
</body>
</html>
