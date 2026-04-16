<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="<?php echo WEB_DIR; ?>css/style_sheet.css" rel="stylesheet" type="text/css" />
<link href="<?php echo WEB_DIR; ?>css/postion.css" rel="stylesheet" type="text/css" />

</head>
<body>
<?php $this->load->view('header'); ?>
<div class="midlebody">
  <div class="lhsside">
  <div class="serachbar1">
  
  	<div class="mid-txt" style="color:#fff; padding-top:10px; margin-top:10px; text-align:center">
    <span style="font-size:30px;">You</span> are searching</div>
 		<div class="left-topbox" style="width:210px">
        	<div><img src="<?php echo WEB_DIR; ?>images/bang-icon.jpg" border="0" style="position:relative; top:4px; padding-right:6px;" /><?php echo $_SESSION['city']; ?></div>
            <div><img src="<?php echo WEB_DIR; ?>images/bang-icon1.jpg" border="0" style="position:relative; top:4px; padding-right:6px;" /><?php echo $_SESSION['sd']; ?> to <?php echo $_SESSION['ed']; ?></div>
            <div><img src="<?php echo WEB_DIR; ?>images/bang-icon2.jpg" border="0" style="position:relative; top:4px; padding-right:6px;" /><?php echo $_SESSION['adult_count']; ?> Adults <?php echo $_SESSION['child_count']; ?> Childs</div>
            <div><img src="<?php echo WEB_DIR; ?>images/bang-icon3.jpg" border="0" style="position:relative; top:4px; padding-right:6px;" /><?php echo $_SESSION['room_count']; ?> Room</div>
            
            
            <div style="float:right">
            <a href="<?php echo WEB_URL; ?>">
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
    

 
   <div style="float:left; margin-top:10px;">
   <img src="<?php echo WEB_DIR; ?>images/last-view-img.jpg" width="229" height="63" />
   </div>
  	<div class="left-secbox">
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
			$detailss=$this->Hotel_Model->get_searchresult($res_idd[0]);
		
		$hotel_id = $detailss->hotel_code;
		$image_hotelspro=$detailss->image;
		?>
    <div id="<?php echo $i; ?>" class="hc_i_wrapper">
     
             <a class="hotel_link_new" href="<?php echo WEB_URL.'hotel/hotel_detail/'.$res_idd[0]; ?>"><?php echo $detailss->hotel_name; ?></a>
              
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
                
                
  	</div>
    
    
     </div>
    <div class="mainbody">
   <div>
    <div class="hotelnames" style="min-height:auto;">
    
   		<!--<div class="right-hotel-name">Youngor Central Suzhou</div>-->
        <table width="100%" border="0" cellspacing="7" cellpadding="3" class="r-hoteldeta">
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
                 
          <tr>
          	<td><table width="" border="0" cellspacing="3" cellpadding="3">
                    <tr><?php
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
                    
                    </tr>
                  </table>
                  </td>
          </tr>
          
        </table>
      
    </div>
    
    
    <table align="left" width="724" border="0" cellspacing="5" cellpadding="5" class="sum-txt" style="margin-top:15px; font-size:15px; font-weight:bold; background-color:#bee7ff; border-radius:10px;">
      
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
			
            $room_info  = $this->Hotel_Model->fetch_gta_temp_result_room($_SESSION['ses_id'],$service->hotel_code);

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
   
         <td width="80" align="center">
         
                 <?php
	if( $room_info[$t]->api=='hotelspro')
	{
		?> 
        <a  href="<?php echo WEB_URL.'hotel/pro_pre_booking/'.$room_info[$t]->api_temp_hotel_id; ?> "><img src="<?php echo WEB_DIR; ?>images/bookin-img.jpg" border="0" /></a>
         
        <?php
	}
	else
	{
		?> <a  href="<?php echo WEB_URL.'hotel/pre_booking/'.$room_info[$t]->api_temp_hotel_id; ?> "><img src="<?php echo WEB_DIR; ?>images/bookin-img.jpg" border="0" /></a>
          <?php
	}
	?>
         
         
         </td>
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
        $merge_inclsuion = $this->Hotel_Model->get_merge_inclsuion_hotelsbed($service->hotel_code,$service->api,$service->session_id,$service->contractnameVal);
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
 							$merge_room_result = $this->Hotel_Model->get_mergeroom_result_hbm_only_meal($row1->hotel_code,$row1->api,$row1->session_id,$row1->inclusion);
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
         <td width="80" align="center"><a  href="<?php echo WEB_URL.'hotel/pre_booking/'.$merge_result_id; ?> "><img src="<?php echo WEB_DIR; ?>images/bookin-img.jpg" border="0" /></a></td>
      </tr>
 		<?php
		}
		//$merge_room_type .= "<br>";
		//$merge_result_id = substr($merge_result_id, 0, -1);
		//echo $ruby;
		}
		elseif($service->api =='gta')
		{
        $room_info  = $this->Hotel_Model->fetch_gta_temp_result_room($_SESSION['ses_id'],$service->hotel_code);
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
         <td width="80" align="center"><a  href="<?php echo WEB_URL.'hotel/pre_booking/'.$room_info[$t]->api_temp_hotel_id; ?> "><img src="<?php echo WEB_DIR; ?>images/bookin-img.jpg" border="0" /></a></td>
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
		elseif($service->api =='travco')
		{
				
		
		//echo "<pre/>";
		//print_r($service);exit;
      $merge_inclsuion = $this->Hotel_Model->get_merge_inclsuion_travco($service->hotel_code,$service->api,$service->session_id);
		
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
							$merge_room_result = $this->Hotel_Model->get_mergeroom_result_hbm_only_meal_travco($service->hotel_code,$service->api,$service->session_id,$service->api_temp_hotel_id);
							
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
		
		elseif($service->api =='dotw')
		{
				
		
		//echo "<pre/>";
		//print_r($service);exit;
      $merge_inclsuion = $this->Hotel_Model->get_merge_inclsuion_travco($service->hotel_code,$service->api,$service->session_id);
		
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
							$merge_room_result = $this->Hotel_Model->get_mergeroom_result_hbm_only_meal_travco($service->hotel_code,$service->api,$service->session_id,$service->api_temp_hotel_id);
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
         <td width="80" align="center"><a  href="<?php echo WEB_URL.'hotel/pre_booking/'.$merge_result_id; ?> "><img src="<?php echo WEB_DIR; ?>images/bookin-img.jpg" border="0" /></a></td>
      </tr>
 		<?php
		
				   }
				   
				   
		}
		
//}

  
	?>

    </table>
    
    <table align="left" width="724" border="0" cellspacing="5" cellpadding="5" class="sum-txt" style="margin-top:15px; font-size:15px; font-weight:bold; background-color:#bee7ff; border-radius:10px;">
      
      <tr>
         <td width="200" align="left">Hotel Facilities</td>
         <td  align="left">&nbsp;</td>
         
      </tr>
    </table>
    <?php 
$hotel='';
$room='';
if($hotel_facility!='')
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
}

?>
     <table align="left" width="724" border="0" cellspacing="0" cellpadding="5" class="sum-txt" style="margin-top:2px; font-size:13px; border:1px #bee7ff solid; border-radius:10px;">
      <tr>
         <td align="left">
         	<div style="width:700px; margin:0 auto;">
            
            	<div class="hotelfa-div">
            	<div style="width:150px; float:left;  font-weight:bold">Generals </div>
                <div style="width:550px; float:left"><?php echo $hotel; ?>
				</div>
            	</div>
                
                <div class="hotelfa-div">
            	<div style="width:150px; float:left;  font-weight:bold">Services </div>
                <div style="width:550px; float:left"><?php
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
            	</div>
                
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
            	<div style="width:150px; float:left; font-weight:bold">Generals </div>
                <div style="width:550px; float:left"><?php echo $room; ?>
				</div>
                </div>
                
            </div>
         </td>
      </tr>
    </table>
    
    
     <table align="left" width="724" border="0" cellspacing="5" cellpadding="5" class="sum-txt" style="margin-top:15px; font-size:15px; font-weight:bold; background-color:#bee7ff; border-radius:10px;">
      
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

                        var point = new GLatLng(<?php print $service->latitude; ?>,<?php print $service->longitude;; ?>);
                        map.setCenter(new GLatLng(<?php print $service->latitude; ?>,<?php print $service->longitude;; ?>),16);
                        var marker = new GMarker(point);

                        map.addOverlay(marker);
                        map.addControl(new GSmallMapControl());
                        map.addControl(new GMapTypeControl());
                    }

  panoClient = new GStreetviewClient();
    panoClient.getNearestPanorama(new GLatLng(<?php print $service->latitude; ?>,<?php print $service->longitude;; ?>),function(a){



    if (a.code == 200){

       

        var fenwayPark = new GLatLng(<?php print $service->latitude; ?>,<?php print $service->longitude;; ?>);
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
</div><div style="clear:both"></div>
<?php $this->load->view('footer'); ?>
</body>
</html>
 