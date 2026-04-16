<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
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
        	<div><img src="<?php echo WEB_DIR; ?>images/bang-icon.jpg" border="0" style="position:relative; top:4px; padding-right:6px;" /><?php echo $_SESSION['city']; ?></div>
            <div><img src="<?php echo WEB_DIR; ?>images/bang-icon1.jpg" border="0" style="position:relative; top:4px; padding-right:6px;" /><?php echo $_SESSION['sd']; ?> to <?php echo $_SESSION['ed']; ?></div>
            <div><img src="<?php echo WEB_DIR; ?>images/bang-icon2.jpg" border="0" style="position:relative; top:4px; padding-right:6px;" /><?php echo $_SESSION['adult_count']; ?> Adults <?php echo $_SESSION['child_count']; ?> Childs</div>
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
          	<td><?php if(isset($service->address)) { echo $service->address.', <br/>'; } echo $service->city; ?><br />
Tel: <?php echo $service->phone; if(isset($service->fax) && $service->fax!= ''){?> Fax: <?php echo $service->fax; }?></td>
          </tr>
       <?php if(isset($service->description) && $service->description!= '') {?>
          <tr>
          	<td><p style="font-size:13px;"><?php echo $service->description; ?></p></td>
          </tr>	
          <?php } ?>
          <?php /*?><tr>
          	<td style="color:#fb5a05">View on the map</td>
          </tr><?php */?>
                 
          <!--<table width="" border="0" cellspacing="3" cellpadding="3">
                    <tr>
					<td><img width="60" src="<?php echo $img_array; ?>" border="0" /></td>
					
					<!--<?php  echo $img_array;
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
                  </table>-->
  <tr style="color:#FFF;">
    <td width="74%">&nbsp;</td>
    <td width="12%" align="center" valign="middle" bgcolor="#606d1e">Available</td>
    <td width="14%" align="center" valign="middle" bgcolor="#1b2612">On Request</td>
  </tr>
        </table>
        <?php 
        $agent_det = $this->B2b_Model->agentInfo($this->session->userdata('agent_id'));
		//print'<pre>';print_r($agent_det);exit;
		$agent_type_id = $agent_det->agent_type;
		$agent_type = $this->B2b_Model->get_agent_type($agent_type_id);
		//print'<pre>';print_r($agent_type);exit;
		$agent_type_name = $agent_type->agent_type;
		?>
        <?php for($c=0;$c < count($category_types);$c++) {
		$start_date = explode('-',$_SESSION['sd']);
		$end_date = explode('-',$_SESSION['ed']);
		
		$room_alloc_date = $start_date[2].'-'.$start_date[1].'-'.$start_date[0];
		$room_vecate_date = $end_date[2].'-'.$end_date[1].'-'.$end_date[0];
		?>
        
      <table width="100%" border="0" cellspacing="10" cellpadding="0" class="classic_table">
  <tr>
    <td width="93%" align="left" style="font-size:14px;;" colspan="2"><?php echo strtoupper($category_types[$c]->cate_type);?> ROOM
    <?php if($agent_type_name != 'Cash Agent') { ?>
    <a href="<?php echo WEB_URL.'b2b_hotel/pre_booking/'.$merge_result_id;?>" style="text-decoration:underline; float:right">BOOK</a>
    <?php }else { ?>
    <a href="#" Onclick="return noAction()" title="No Action Should be Performed.Because, you are Cash Agent" style="text-decoration:underline; float:right">BOOK</a></td>
    <?php } ?>
  </tr>
  <?php for($g=0;$g<count($category_types[$c]->room_types);$g++) { 
	  
	       $sup_hotel_id = $category_types[$c]->room_types[$g]->hotel_id;
		   
		   $category_type = $category_types[$c]->room_types[$g]->sup_inv_cate_type_id;
		   
		  // echo $category_types[$c]->room_types[$g]->sup_inv_cate_type_id;exit;
			     
	       $rates = $this->B2b_Hotel_Model->get_rate_tactics($sup_hotel_id,$category_type,$room_alloc_date,$room_vecate_date);
		   
		// print'<pre />r';print_r($rates);exit;
			if($rates != NULL || $rates != '') {			   	 
		       $sup_rate_tactics_id = $rates->sup_rate_tactics_id;
				 
		       $price_list = $this->B2b_Hotel_Model->get_room_daily_prices($sup_hotel_id,$sup_rate_tactics_id,$room_alloc_date,$room_vecate_date);
					
			}
           //print'<pre />prices';print_r($price_list);exit;	
            
			
			
		
	}?>
  
  <tr>
    <td align="left" valign="middle" width="130">
    <p>Meal Plan: <?php 
	if($rates != NULL) 
	{ 
		if($rates->meal_plan == 0) { echo "HB";} else if($rates->meal_plan == 1){ echo "FB";} else if($rates->meal_plan == 2){ echo "Room";} else if($rates->meal_plan == 3){ echo "All Inclusive";} else { echo "No" ;}
	}else
		  echo "No";
    ?></p>
    <p>Markets: <?php foreach($hotel_market_details as $markets) {
		echo $markets->market_name.',';?>
        <?php } ?></p>
    </td>
    <td align="left" valign="top" width="500">
    <table width="100%" border="0" cellspacing="1" cellpadding="5" bgcolor="#dee5eb" style="font-size:12px;">
      <tr class="classic_room">
        <td align="center" valign="middle" class="classic_room_div" width="100">Room Type</td>
        <td align="center" valign="middle" class="classic_room_div" width="42">&nbsp;</td>
        
        <?php 
		$start_date = explode('-',$_SESSION['sd']);
		$end_date = explode('-',$_SESSION['ed']);
		
		$room_alloc_date = $start_date[2].'-'.$start_date[1].'-'.$start_date[0];
		$room_vecate_date = $end_date[2].'-'.$end_date[1].'-'.$end_date[0];
		
		$start = strtotime($room_alloc_date);
        $end = strtotime($room_vecate_date);
        $days = $end - $start;
        $days = ceil($days/86400);
		//echo $room_alloc_date;exit;
		$counter=0; 
		for($d=0;$d < $days;$d++)
		 { 
		   if($counter < 7 ) { ?>
        <td align="center" valign="middle" class="classic_room_div" width="42">
		<?php  
		       $first_date = $room_alloc_date;
		       $fdate = $first_date; 
			   $fd = explode("-", $fdate); 		
			  // echo date("d-m-"."'"."y", mktime(0,0,0,$fd[1], $fd[2] + $d, $fd[0]));
			   echo date("D", mktime(0,0,0,$fd[1], $fd[2] + $d, $fd[0]));
		?>
        </td>
        <?php } $fd[2] = $fd[2] + $d; $counter++; } ?>
        <?php for($r=0;$r<(7 - $d);$r++) {  $fd[2] = $fd[2]+1;?>
        <td align="center" valign="middle" class="classic_room_div" width="42">
		<?php //echo date("d-m-"."'"."y", mktime(0,0,0,$fd[1], $fd[2] + $d, $fd[0]));
			  echo date("D", mktime(0,0,0,$fd[1], $fd[2], $fd[0])); ?></td>
       <?php } ?>
        
            
        <td align="center" valign="middle" class="classic_room_div" width="60"><strong>Total</strong></td>
      </tr>
      
      <?php for($g=0;$g<count($category_types[$c]->room_types);$g++) { 
	  
	       $sup_hotel_id = $category_types[$c]->room_types[$g]->hotel_id;
		   
		   $category_type = $category_types[$c]->room_types[$g]->sup_inv_cate_type_id;
		   
		  // echo $category_types[$c]->room_types[$g]->sup_inv_cate_type_id;exit;
			     
	       $rates = $this->B2b_Hotel_Model->get_rate_tactics($sup_hotel_id,$category_type,$room_alloc_date,$room_vecate_date);
		   
			//print'<pre />rate';print_r($rates);exit;
			if($rates != NULL || $rates != '') {			   	 
			$sup_rate_tactics_id = $rates->sup_rate_tactics_id;
			$price_list = $this->B2b_Hotel_Model->get_room_daily_prices($sup_hotel_id,$sup_rate_tactics_id,$room_alloc_date,$room_vecate_date);
			}
			//print'<pre />prices';print_r($price_list);exit;	
	?>
        
	       <tr class='classic_room' width="100">
			   <?php if($rates != NULL || $rates != '') {
				   
				      $perrow=7; $n=0;$cntr=0; 
					  if($days > 7) {
					  $row_spans = floor($days / 7) + 1;
					  }
					  
					  $week_days = 7;
					  $number = 1;
					  //echo $row_spans;exit;
				      for($i=0;$i< count($price_list);$i++)
					  {   
						  if($n == 0): print "</tr><tr class='classic_room'>"; endif; 
						  
						  if($i==0){ ?>
						   <td align='center' valign='middle' rowspan = '<?php echo $row_spans;?>'  width="42" ><?php echo $category_types[$c]->room_types[$g]->room_type; ?></td>
						          <td align='center' valign='middle'>wk1</td>
						<?php  }
							 if($i==($number*$week_days) && $days > ($number*$week_days)) {
							  echo "<td align='center' valign='middle' width='42'>wk".($number = $number+1)."</td>";
							 }
							 							 
							  if($price_list != NULL){
						      echo  "<td align='center' valign='middle' class='sat_bg' width='42'>";		   
				         
						      echo $total = $price_list[$i]->rate; 
							  echo "</td>";
							}
							$rows = $extra_row = $days % 7;
							$total_rows = floor($days/7);
							$ival = (7 * $total_rows ) + $extra_row;
							//echo $ival;exit;
							if($days > 7) 
							{
								if($n==6)
								{
									 echo "<td align='center' valign='middle' width='42'></td>";
								}
								
								if($i == $ival-1){
									
							  for($b=0;$b < (7 - $extra_row);$b++){
							    echo "<td align='center' valign='middle' width='60'></td>";
							  }
							  //echo "<td align='center' valign='middle'><strong>".($total * $days)." + (".($price_list[$i]->extra_bed_price + $price_list[$i]->supplementary_charge_rate + $price_list[$i]->child_charge) * $days .")</strong></td>";
							  echo "<td align='center' valign='middle' width='60'><strong>".($total * $days)." </strong></td>";
							  }
																
								
							}
							else
							{  
							  if($i == $rows-1){
							  for($h=0;$h < $i;$h++){
							    echo "<td align='center' valign='middle' width='60'></td>";
							  }
							  //echo "<td align='center' valign='middle'><strong>".($total * $days)." + (".($price_list[$i]->extra_bed_price + $price_list[$i]->supplementary_charge_rate + $price_list[$i]->child_charge) * $days .")</strong></td>";
							  echo "<td align='center' valign='middle' width='60'><strong>".($total * $days)."</strong></td>";
							  }
							}
													 
							
						   				  
						  		
						  
						  if(++$n >= $perrow): print '</tr>'; $n = 0; endif;$cntr++;
				       }
					}else { 
					$number = 1;$s=0;$week_days=7;$price_list = '';$perrow=7;$cntr=0; 
					 if($days > 7) {
					  $row_spans = floor($days / 7) + 1;
					  }
					for($l=0;$l< $days;$l++)
					  {  
					    if($s == 0): print "</tr><tr class='classic_room'>"; endif; 
						  
						  if($l==0){ ?>
						   <td align='center' valign='middle' rowspan = '<?php echo $row_spans;?>'  width="42"><?php echo $category_types[$c]->room_types[$g]->room_type; ?></td>
						          <td align='center' valign='middle' width='42'>wk1</td>
						<?php  }

					if($l==($number*$week_days) && $days > ($number*$week_days)) {
							  echo "<td align='center' valign='middle' width='42'>wk".($number = $number+1)."</td>";
							 }
							 							 
							  if($price_list == NULL){
						      echo  "<td align='center' valign='middle' class='nodata_bg' width='42'>";		   
				         
						      echo $total = 'X'; 
							  echo "</td>";
							}
							$rows = $extra_row = $days % 7;
							$total_rows = floor($days/7);
							$ival = (7 * $total_rows ) + $extra_row;
							//echo $ival;exit;
							if($days > 7) 
							{
								if($s==6)
								{
									 echo "<td align='center' valign='middle' width='42'></td>";
								}
								
								if($l == $ival-1){
									
							  for($b=0;$b < (7 - $extra_row);$b++){
							    echo "<td align='center' valign='middle' width='42'></td>";
							  }
							  echo "<td align='center' valign='middle' width='42'><strong>X</strong></td>";
							  }
																
								
							}
							else
							{  
							  if($l == $rows-1){
							  for($h=0;$h < $i;$h++){
							    echo "<td align='center' valign='middle' width='42'></td>";
							  }
							  echo "<td align='center' valign='middle' width='42'><strong>X</strong></td>";
							  }
							}
													 
							
						   				  
						  		
						  
						  if(++$s >= $perrow): print '</tr>'; $s = 0; endif;$cntr++;
				       } 
					} ?>
		 
                
         
      <?php } ?>
      	
      <tr class="classic_room">
        <td align="center" valign="middle" width="100">Status</td>
        <td colspan="9" align="center" valign="middle" style="color:#606d1e;">On Request</td>
      </tr>
    </table>
    </td>
  </tr>
  <!--<tr>
    <td colspan="2" align="left" valign="middle">6-12 YEARS BREAKFAST IS FREE OF CHARGE</td>
    <td>&nbsp;</td>
  </tr>-->
  <tr>
     <td height="1" colspan="5" bgcolor="#000000">
     </td>
 </tr>
  
</table>
<?php } ?>

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
         <?php if ($agent_type_name != 'Cash Agent') {?>
         <td width="80" align="center"><a  href="<?php echo WEB_URL.'b2b_hotel/pre_booking/'.$room_info[$t]->api_temp_hotel_id; ?> "><img src="<?php echo WEB_DIR; ?>images/bookin-img.jpg" border="0" /></a></td>
         <?php }else { ?>
          <td width="80" align="center"><a  href="#"  title="No Action Should be Performed.Because, you are Cash Agent"><img src="<?php echo WEB_DIR; ?>images/bookin-img.jpg" border="0" /></a></td>
         <?php } ?>
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
         
      </tr>
 		<?php
		
				   }
		
}

  
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
 