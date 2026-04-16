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
 		<div class="left-topbox">
        	<div><img src="<?php echo WEB_DIR; ?>images/bang-icon.jpg" border="0" style="position:relative; top:4px; padding-right:6px;" /><?php echo $_SESSION['city']; ?></div>
            <div><img src="<?php echo WEB_DIR; ?>images/bang-icon1.jpg" border="0" style="position:relative; top:4px; padding-right:6px;" /><?php echo $_SESSION['sd']; ?> to <?php echo $_SESSION['ed']; ?></div>
            <div><img src="<?php echo WEB_DIR; ?>images/bang-icon2.jpg" border="0" style="position:relative; top:4px; padding-right:6px;" /><?php echo $_SESSION['adult_count']; ?> Adults <?php echo $_SESSION['child_count']; ?> Childs</div>
            <div><img src="<?php echo WEB_DIR; ?>images/bang-icon3.jpg" border="0" style="position:relative; top:4px; padding-right:6px;" /><?php echo $_SESSION['room_count']; ?> Room</div>
            
            
            <div style="float:right"><img src="<?php echo WEB_DIR; ?>images/modify-sbut.png" border="0" style="position:relative; top:30px;" /></div>
        
        </div>
  </div>
  
  

 
   <div style="float:left; margin-top:10px;"><img src="<?php echo WEB_DIR; ?>images/last-view-img.jpg" width="229" height="63" /></div>
  	<div class="left-secbox">
  		<div style="width:220px; margin:0 auto;">
        	<ul class="left-list">
            	<li>Patong Bay House</li>
                <li>Patong Bay House</li>
                <li>Baramee Hip Hotel</li>
                <li>Patong Bay House</li>
                <li>Bel Aire Resort</li>
            </ul>
        </div>
  	</div> </div>
    <div class="mainbody">
   <div>
    <div class="hotelnames" style="min-height:329px;">
    
   		<!--<div class="right-hotel-name">Youngor Central Suzhou</div>-->
        <table width="100%" border="0" cellspacing="7" cellpadding="3" class="r-hoteldeta">
          <tr>
          	<td colspan="2" class="right-hotel-name"><?php echo $service->hotel_name; ?></td>
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
          	<td>Room Type </td>
            <td style="color:#227fb0"><?php
				 $cost=0;
				  $markup=0;
				   $payment_charge=0;
				    $org_amt=0;
					
				  $a=explode("-",$result_id);
				  $sec_res=$_SESSION['ses_id'];
				  $room_type='';
				  for($k=0;$k<count($a);$k++)
				  {
					 $b=  $this->Hotel_Model->fetch_gta_temp_result_room_result_id($sec_res,$a[$k]);
					$cost = $cost + $b->total_cost;  
					
					$markup = $markup + $b->markup;  
					$payment_charge = $payment_charge + $b->payment_charge;  
					$org_amt = $org_amt + $b->org_amt;  
					$currency_val = $b->currency_val; 
					$xml_currency = $b->xml_currency; 

					
					 
					$room_type .= $b->room_type."-".$b->inclusion."<br>";  
				  }
				
				 echo $room_type; ?></td>
          </tr>
          <tr>
          	<td>For</td>
            <td style="color:#227fb0"><?php echo $_SESSION['days']; ?> night, <?php echo $_SESSION['room_count']; ?> rooms, max. <?php echo $_SESSION['adult_count']; ?> people.</td>
          </tr>
          <tr>
          	<td><?php echo $_SESSION['room_count']; ?> Rooms </td>
            <td style="color:#227fb0"><?php
				 
				  ?> $ <?php echo $cost; ?></td>
          </tr>
          <tr>
          	<td>VAT (0%) included </td>
            <td style="color:#227fb0">$ 0.00</td>
          </tr>
        
        <?php /*?>  <tr>
          	<td colspan="2" style="font-size:16px; font-weight:bold">Booking conditions</td>
          </tr>
          <tr>
          	<td colspan="2"><?php echo $cancel_policy; ?></td>
          </tr><?php */?>
          
        </table>
      
    </div>
     



    <div id="r-box">
    	<div class="mid-txt" style="margin:5px 5px 5px 15px;">Room Details</div>
        
    </div>
    
    <div style="clear:both"></div>
    
    <form name="book" action="<?php print WEB_URL.'hotel/pre_booking/'.$result_id; ?>" method="post" onsubmit="javascript:return book_vali()"/>
                                 <table width="97%" border="0" style="margin: 1em; border-collapse: collapse;" cellspacing="0" cellpadding="0">
                          <tr>
                          <td style="padding: .3em; border: 1px #ccc solid;" ></td>
                          <td style="padding: .3em; border: 1px #ccc solid;font-weight: bold;" >Room Type</td>
                          <td style="padding: .3em; border: 1px #ccc solid;font-weight: bold;" >Inclusion</td>
                          <td style="padding: .3em; border: 1px #ccc solid;font-weight: bold;" >Night</td>
						  <td style="padding: .3em; border: 1px #ccc solid;font-weight: bold;" >Cost</td>
                                  <td style="padding: .3em; border: 1px #ccc solid;font-weight: bold;" >Status</td>
                                </tr>
                                <?php
								
								for($u=0;$u< count($room_cat_details);$u++)
								{
						?>
                         
                        <tr>
						<?php if($u==0){?>
                        <td style="padding: .3em; border: 1px #ccc solid;" ><input checked="checked" type="radio" name="process_id_fin" value="<?php print $room_cat_details[$u]['process_id']."|||".$room_cat_details[$u]['amountv4']."|||".$room_cat_details[$u]['room']."|||".$room_cat_details[$u]['amountv3']."|||".$room_cat_details[$u]['boardType']."|||".$room_cat_details[$u]['org_amt']."|||".$room_cat_details[$u]['currencyv1']."|||".$room_cat_details[$u]['c_val']."|||".$room_cat_details[$u]['amountv3pay']; ?>" /></td>
						<?php }else{?>
									<td style="padding: .3em; border: 1px #ccc solid;" ><input type="radio" name="process_id_fin" value="<?php print $room_cat_details[$u]['process_id']."|||".$room_cat_details[$u]['amountv4']."|||".$room_cat_details[$u]['room']."|||".$room_cat_details[$u]['amountv3']."|||".$room_cat_details[$u]['boardType']."|||".$room_cat_details[$u]['org_amt']."|||".$room_cat_details[$u]['currencyv1']."|||".$room_cat_details[$u]['c_val']."|||".$room_cat_details[$u]['amountv3pay']; ?>" /></td>
						
						<?php }?>
    <td style="padding: .3em; border: 1px #ccc solid;" ><?php print $room_cat_details[$u]['room']; ?>
   
    </td>
    <td style="padding: .3em; border: 1px #ccc solid;"><?php print $room_cat_details[$u]['boardType']; ?></td>
      <td style="padding: .3em; border: 1px #ccc solid;"><?php echo $_SESSION['days']; ?></td>

      <td style="padding: .3em; border: 1px #ccc solid;">
	  				<?php
					echo $room_cat_details[$u]['amountv4'].' USD';
					//$curr_cost = $total_fin.''.$curtype;
						//echo $total_fin.''.$curtype;
				
                    ?></td>
                    <td style="padding: .3em; border: 1px #ccc solid;"><?php
					if($room_cat_details[$u]['status']=='InstantConfirmation')
					{
						echo 'Available';
					}
					else
					{
						echo 'Pending';
					}
                    ?></td>
    
  </tr>
						
                    
                     <?php   	
								}
								?>
                                <tr>
                                <td align="right" colspan="7"><input type="submit" class="book_now_btn_inner" value="Continue" /> </td></tr>
                                </table>
                                </form>
    
    
    <div style="float:left; margin-top:50px;"><input type="image" src="<?php echo WEB_DIR; ?>images/contiu-but.png" width="100" height="35" /></div>

  </div>
  </div>
</div><div style="clear:both"></div>
<?php $this->load->view('footer'); ?>
</body>
</html>
 