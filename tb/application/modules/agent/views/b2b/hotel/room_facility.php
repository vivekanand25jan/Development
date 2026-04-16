     <?php  
	  
	   $room_facility = $this->B2b_Hotel_Model->fetch_gta_temp_result_room_facility($_SESSION['ses_id']);
	  // echo "<pre/>";print_r($room_facility);
	   $fac=array();$cnt_hotel=array();$fac_id_hotel=array();
	    for($d=0;$d< count($room_facility);$d++)
		  {
			  $fac[] = $room_facility[$d]->fac;
			 
			   $cnt_hotel[] = $room_facility[$d]->countval;
			    $fac_id_hotel[] = $room_facility[$d]->fac_id;
		  }
		  $fac1 = array_merge($fac);
		
		   for($a=0;$a< count($fac1);$a++)
		  {
			  if($cnt_hotel[$a]!=1 && $cnt_hotel[$a]!=2 && $cnt_hotel[$a]!=3 && $cnt_hotel[$a]!=4 && $cnt_hotel[$a]!=5 && $cnt_hotel[$a]!=6 && $cnt_hotel[$a]!=7 && $cnt_hotel[$a]!=8 && $cnt_hotel[$a]!=9 && $cnt_hotel[$a]!=10)
			  {
				//    print_r($fac1);
		   ?>
           <div class="hotel_cover">
                                         	<div class="check_box_cover"><input type="checkbox" name="room_fac_val" onclick="javascript:room_fac_sorting(<?php echo $fac_id_hotel[$a]; ?>)" value="<?php echo $fac_id_hotel[$a]; ?>" /></div>
                                            <div class="hotel_cover47"><?php echo $fac1[$a]; ?> </div><div class="wi56"><?php echo $cnt_hotel[$a]; ?> Hotels</div>
                                         </div><?php
			  }
	   }
	   ?>