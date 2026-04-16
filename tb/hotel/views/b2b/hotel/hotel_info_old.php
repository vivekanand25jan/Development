<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $result->hotel_name; ?></title>
</head>
<body>
<div style="font-size:20px; font-weight:bold;"> Hotel Information </div>
<div><?php echo $result->hotel_name; ?> </div>
<?php if($result->star == '1'){ echo 'ONE STAR'; }
		if($result->star == '2'){ echo 'TWO STAR'; }
		if($result->star == '3'){ echo 'THREE STAR'; }
		if($result->star == '4'){ echo 'FOUR STAR'; }
		if($result->star == '5'){ echo 'FIVE STAR'; }
		if($result->star == 'Standard'){ echo 'Standard'; }
		if($result->star == 'Deluxe'){ echo 'Deluxe'; } ?></div>
<div>Tel: <?php echo $result->res_phone; ?> </div>
<div>Fax: <?php echo $result->res_fax; ?> </div>
<div>Website: <a href="http://<?php echo $result->website; ?>" target="_blank"><?php echo $result->website; ?></a> </div>


<br />
<div><?php $sup_hotel_images = $this->B2b_Hotel_Model->getImages($result->sup_hotel_id);
			if(isset($sup_hotel_images[0]->image_name)){
				echo count($sup_hotel_images);
			/*for($j=0; $j<count($sup_hotel_images); $j++)
			{ 
				echo'<div class="image-box" id="pic1"><div><img src="'.echo WEB_DIR.'supplier_hotels_images/'.echo $sup_hotel_images[$j]->image_name.'" width="165" height="120" border="0" style="margin:4px;" /></div></div>';
		<?	}*/
			}
			?></div>
            
<br />
<div style="font-size:14px; font-weight:bold;">Description</div>
<div><?php echo $result->descrip; ?> </div>
<br />
<div style="font-size:14px; font-weight:bold;">Hotel Facilities</div>
<div><?php $sup_hotel_faci = $this->B2b_Hotel_Model->hotel_facilities($result->sup_hotel_id);
			if(isset($sup_hotel_faci[0]->facility_name)){
			for($i=0; $i<count($sup_hotel_faci); $i++)
			{ 
				echo $sup_hotel_faci[$i]->facility_name.'<br>';
			}
			}
			?> </div>

</body>
</html>
