<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo WEB_DIR; ?>css/style_sheet.css" rel="stylesheet" type="text/css" />
<link href="<?php echo WEB_DIR; ?>css/postion.css" rel="stylesheet" type="text/css" />
<title><?php echo $service->hotel_name; ?></title>
</head>
<body>
<div style="margin:25px;">
<div style="font-size:20px; font-weight:bold;"> Hotel Information </div>

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
Tel: <?php echo $service->res_phone; if(isset($service->res_phone) && $service->res_phone!= ''){?> Fax: <?php echo $service->res_phone; }?>
<br />
Website: <a href="http://<?php echo $service->website; ?>" target="_blank"><?php echo $service->website; ?></a> </td>
</tr>
<?php if(isset($service->description) && $service->description!= '') {?>
<tr>
<td><p style="font-size:13px;"><?php echo $service->description; ?></p></td>
</tr>	
<?php } ?>
</table>

<table width="" border="0" cellspacing="3" cellpadding="3">
<tr>
<td>
<?php $sup_hotel_images = $this->B2b_Hotel_Model->getImages($service->sup_hotel_id);
if(isset($sup_hotel_images[0]->image_name)){
for($j=0; $j < count($sup_hotel_images); $j++)
{  ?>
<img src="<?php echo WEB_DIR.'supplier_hotels_images/'.$sup_hotel_images[$j]->image_name; ?>" width="100" height="60" border="0" style="margin:4px;" />
<?php	}
}
?></td></tr>
</table>

<table align="left" width="724" border="0" cellspacing="5" cellpadding="5" class="sum-txt" style="margin-top:15px; font-size:15px; font-weight:bold; background-color:#bee7ff; border-radius:10px;">
<tr>
<td width="200" align="left">Hotel Facilities</td>
<td  align="left">&nbsp;</td>
</tr>
</table>
<table align="left" width="724" border="0" cellspacing="0" cellpadding="5" class="sum-txt" style="margin-top:2px; font-size:13px; border:1px #bee7ff solid; border-radius:10px;">
<tr>
<td align="left">
<div style="width:700px; margin:0 auto;">
<div class="hotelfa-div" style="border:none">
<div style="width:650px; float:left"><?php $sup_hotel_faci = $this->B2b_Hotel_Model->hotel_facilities($service->sup_hotel_id);
if(isset($sup_hotel_faci[0]->facility_name)){
for($i=0; $i<count($sup_hotel_faci); $i++)
{ 
echo $sup_hotel_faci[$i]->facility_name.', ';
}
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
    map.setCenter(new GLatLng(<?php print $service->latitude; ?>,<?php print $service->longitude; ?>),14);
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

<table align="left" width="724" border="0" cellspacing="0" cellpadding="5" class="sum-txt" style="margin-top:2px; font-size:15px; border:1px #bee7ff solid; border-radius:10px; margin-bottom:20px;">
<tr>
<td align="left">
               
<div id="pano" style="width: 711px; height:250px;margin-bottom:5px"></div>

</td>
</tr>
</table>


</div>
</body>
</html>

<table align="left" width="724" border="0" cellspacing="0" cellpadding="5" class="sum-txt" style="margin-top:2px; font-size:15px; border:1px #bee7ff solid; border-radius:10px;">

