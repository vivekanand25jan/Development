<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Travel Bay</title>

<link href="<?php echo WEB_DIR; ?>designAccess/css/travel_bay_stylesheet.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo WEB_DIR; ?>designAccess/engine1/style.css" />
<!--<script type="text/javascript" src="<?php echo WEB_DIR; ?>designAccess/engine1/jquery.js"></script>-->

<link href="<?php echo WEB_DIR; ?>css/style_sheet.css" rel="stylesheet" type="text/css" />
<link href="<?php echo WEB_DIR; ?>css/postion.css" rel="stylesheet" type="text/css" />
<!--<script src="<?php echo WEB_DIR ?>script/jquery.js"></script>-->
<script type="text/javascript" src="<?php print WEB_DIR; ?>script/jquery.jcarousel.min.js" /></script>
<script type="text/javascript">
function set_api_permanent(hotel_id,sup_id,hotel_name)
{
	$.post( "<?php print WEB_URL ?>index/set_api_permanent", {hotel_id:hotel_id,sup_id:sup_id,hotel_name:hotel_name},
	function(data) {
	 // parent.location.reload(); 
	  alert(data);
	});
	return false;
}
</script>
</head>
<body>
<?php $this->load->view('header');
 ?>
<div class="midlebody">
  
    
      <div class="b2b-lhsside">
  
  <div>
    <div class="b2b-leftdiv-toptit"><span>Booking Board</span></div>
  	<div class="b2b_left-secbox" style="box-shadow: 0 3px 3px #888888;">
  		<div style="width:200px; margin:0 auto;" class="sup_left_box">
        	<ul class="b2b-left-list-notice"  style="margin-left:-10px;">
            	<li>Total Bookings (5)</li>
                <li>Latest Bookings (44)</li>
                <li>Total Hotels (5) </li>
                <li>Total Rooms (22)</li>
            </ul>
        </div>
  	</div>
</div>

<div>
    <div class="b2b-leftdiv-toptit"><span>Notice Board</span></div>
  	<div class="b2b_left-secbox" style="box-shadow: 0 3px 3px #888888;">
  		<div style="width:200px; margin:0 auto;" class="sup_left_box">
        	<ul class="b2b-left-list-notice"  style="margin-left:-10px;">
            	<li>Lowest price: Many of our room rates are the best prices you will find anywhere</li>
                <li>Secure booking (via SSL system)</li>
                <li>Great choice of hotels </li>
                <li>Simply structured content</li>
            </ul>
        </div>
  	</div>
</div>

<div>
    <div class="b2b-leftdiv-toptit"><span>Booking Information</span></div>
  	<div class="b2b_left-secbox" style="box-shadow: 0 3px 3px #888888;">
  		<div style="width:220px; margin:0 auto;" class="b2b_book_inf">
        	<ul class="b2b-left-list" style="text-align:left; padding-top:15px;">
            	<li style="text-align:left"><span style="position:relative; top:5px; padding-right:5px;"><img src="<?php echo WEB_DIR; ?>images/b2b-booking-icon1.png" border="0" /></span><a href="<?php echo WEB_URL.'index/my_booking_confirm'; ?>" >Confirmed Bookings</a></li>
                <!--<li  style="text-align:left"><span style="position:relative; top:5px; padding-right:5px;"><img src="<?php echo WEB_DIR; ?>images/b2b-booking-icon.png" border="0"  /></span> &nbsp;<a href="<?php echo WEB_URL.'index/my_booking_cancel'; ?>" >Cancelled Bookings</a></li>
                <li  style="text-align:left"><span style="position:relative; top:5px; padding-right:5px;"><img src="<?php echo WEB_DIR; ?>images/b2b-booking-icon3.png" border="0" /> </span> <a href="<?php echo WEB_URL.'index/my_booking'; ?>" >Search Bookings</a></li>-->
            </ul>
        </div>
  	</div>
</div>

  </div>
  
    <div class="b2b-mainbody">
   
    <div>
    <!-- <div class="hotelnames" style="min-height:329px; width:716px;">
        
       <table width="100%" border="0" cellspacing="7" cellpadding="3" class="r-hoteldeta">
          <tr>
          	<td colspan="2" class="right-hotel-name" style="font-size:26px; color:#243419; padding-top:0px; padding-bottom:15px">Booking Calendar</td>
          </tr>
          <tr>
          	<td colspan="2" class="b2b-subtitle">
            
        	
<script type="text/javascript" src="<?php echo WEB_DIR; ?>calendar/mootools-1.2.3-core-yc.js"></script>
<script type="text/javascript" src="<?php echo WEB_DIR; ?>calendar/mootools-1.2.3.1-more.js"></script>

<script type="text/javascript" src="<?php echo WEB_DIR; ?>calendar/mooECal.js">
</script>
<script type="text/javascript" src="<?php echo WEB_DIR; ?>calendar/mecPHPPlugin.js">
</script>

<script type="text/javascript">
window.addEvent('domready',function(){
//dp.SyntaxHighlighter.ClipboardSwf = '<?php echo WEB_DIR; ?>calendar/clipboard.swf';
//dp.SyntaxHighlighter.HighlightAll('code');
new Calendar({
	calContainer:'calBody',
	newDate:'8/17/2012',
	//feedPlugin:'new mecPHPPlugin()'
	
});
})
</script>
	
<link rel="stylesheet" type="text/css" id="calStyle" href="<?php echo WEB_DIR; ?>calendar/mooECal.css">

            
            <div id="calBody"></div></td>
          </tr>
         
         
          
          
        </table>
      
    </div>-->
    
    <div class="hotelnames" style="min-height:329px; width:716px;">
    <table>
    <tr>
          	<td style="font-size:26px; color:#243419; padding-top:0px; padding-bottom:0px" class="right-hotel-name" colspan="2">Hotel List</td>
          </tr></table>
   		<table width="702" border="0" align="left" cellpadding="0" cellspacing="0" style="margin:15px 0 0 7px; border:1px solid #ccc;">
  <tr>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Sl No</td>
   <!-- <td align="left" valign="top" class="my_profile_name_ex_tab">Country</td>-->
    <td align="left" valign="top" class="my_profile_name_ex_tab">City</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Hotel Name</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Status</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Action</td>
  
  </tr>
  <?php
  if($result!='')
  {

  for($i=0;$i<count($result);$i++)
  {
  ?>
  <tr>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $i+1; ?></td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $result[$i]->city; ?></td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $result[$i]->hotel_name; ?> 	</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php if($result[$i]->status==1) { echo 'Active'; } else { echo 'InActive'; } ?> </td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><a href="<?php echo WEB_URL;?>index/edit_contact_inform/<?php echo $result[$i]->sup_hotel_id ?>">View</a> <!--| <img src="<?php echo WEB_DIR ?>images/refresh.png" width="14" onclick="set_api_permanent('<?php echo $result[$i]->sup_hotel_id ?>','<?php echo $result[$i]->sup_id ?>','<?php echo $result[$i]->hotel_name ?>')" style="cursor:pointer;"/>--> </td>
    
  </tr>
  <tr>
  <?php
  }
  }
  else
  {
	  ?> <td align="center" valign="top" colspan="5" class="my_profile_name_ex_tab_whit_ex">No Result Found... </td>
      <?php
  }
  ?>
  </tr>
   <tr>
   
   
   
   
    <td align="right" valign="top" colspan="5" class=""><a href="<?php echo WEB_URL;?>index/edit_contact_inform/" style="color:green;">Add New</a> </td>
    
  </tr>
</table>
    </div>
    
    
    <table align="right" width="722" border="0" cellspacing="0" cellpadding="0" style="padding-top:25px">
      
      <tr>
        <td width="15" align="left" class="b2b-ratingslid-left"> </td>
        <td class="b2b-ratingslid" style="width:692px">
        	<span><img src="<?php echo WEB_DIR; ?>images/b2b-last-new.png" border="0" style="position:relative; top:-8px; left:-15px; z-index:1" /></span>
           <span><marquee style="position:relative; top:-41px; z-index:0">Many of our room rates are the best prices you will find anywhere Secure booking (via SSL system).</marquee></span></td>
        <td width="15" align="right" valign="top"><img src="<?php echo WEB_DIR; ?>images/b2b-rat-s-rignt-img.jpg" border="0" /></td>
      </tr>
    
    </table>
    
        
     
    
 
    <table align="left" width="722" border="0" cellspacing="0" cellpadding="0" style="padding-top:10px">
      
      <tr>
        <td valign="top"><img src="<?php echo WEB_DIR; ?>images/b2b-add-img.jpg" border="0" /></td>
        <td valign="top"><img src="<?php echo WEB_DIR; ?>images/b2b-add-img1.jpg" border="0" /></td>
      </tr>
    
    </table>
    

  </div>
  </div>
    
    
</div>
</div></div>
<div style="clear:both"></div>
<?php $this->load->view('footer'); ?>
</body>
</html>
<script>

function check_date_valued(val)
{
	
    var laterdate = document.getElementById('datepicker1').value;     // 1st January 2000
 var earlierdate = document.getElementById('datepicker').value;  // 13th March 1998

if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
   		 document.getElementById("datepicker1_ajax").innerHTML=xmlhttp.responseText;
    }
  }
  			xmlhttp.open("GET","<?php print WEB_URL ?>b2b/check_date_valued/"+laterdate+"/"+earlierdate+"/"+val,true);
		xmlhttp.send();
	
		
} 

function check_night_valued(val)
{
	
    var laterdate = document.getElementById('datepicker1').value;     // 1st January 2000
 var earlierdate = document.getElementById('datepicker').value;  // 13th March 1998

if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
   		 document.getElementById("night_ajax").innerHTML=xmlhttp.responseText;
    }
  }
  			xmlhttp.open("GET","<?php print WEB_URL ?>b2b/check_date/"+laterdate+"/"+earlierdate,true);
		xmlhttp.send();
	
	
		
} 
</script>
 <style>
.b2b-AGE_OF2{ width:97px; float: left; color:#fff; font-family:MAIAN; padding:0 0 8px; margin:12px -7px 0 0; color:#000; font-size:12px;}

.check_149{ width:144px; float:right; margin:0 13px 3PX 0; position:relative; left:34px}
</style>