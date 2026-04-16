<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Travel Bay</title>

<link href="<?php echo WEB_DIR; ?>designAccess/css/travel_bay_stylesheet.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo WEB_DIR; ?>designAccess/engine1/style.css" />


<link href="<?php echo WEB_DIR; ?>css/style_sheet.css" rel="stylesheet" type="text/css" />
<link href="<?php echo WEB_DIR; ?>css/postion.css" rel="stylesheet" type="text/css" />
<script src="<?php echo WEB_DIR ?>script/jquery.js"></script>
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
  		<div style="width:200px; margin:0 auto;">
        	<ul class="b2b-left-list-notice"  style="margin-left:10px;">
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
  		<div style="width:200px; margin:0 auto;">
        	<ul class="b2b-left-list-notice"  style="margin-left:10px;">
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
  		<div style="width:220px; margin:0 auto;">
        	<ul class="b2b-left-list" style="text-align:left; padding-top:15px;">
            	<li style="text-align:left"><span style="position:relative; top:5px; padding-right:5px;"><img src="<?php echo WEB_DIR; ?>images/b2b-booking-icon1.png" border="0" /></span><a href="<?php echo WEB_URL.'b2b/my_booking_confirm'; ?>" >Confirmed Bookings</a></li>
                <li  style="text-align:left"><span style="position:relative; top:5px; padding-right:5px;"><img src="<?php echo WEB_DIR; ?>images/b2b-booking-icon.png" border="0"  /></span> &nbsp;<a href="<?php echo WEB_URL.'b2b/my_booking_cancel'; ?>" >Cancelled Bookings</a></li>
                <li  style="text-align:left"><span style="position:relative; top:5px; padding-right:5px;"><img src="<?php echo WEB_DIR; ?>images/b2b-booking-icon3.png" border="0" /> </span> <a href="<?php echo WEB_URL.'b2b/my_booking'; ?>" >Search Bookings</a></li>
            </ul>
        </div>
  	</div>
</div>

  </div>
  
    <div class="b2b-mainbody">
   
    <div>
    <div class="hotelnames" style="min-height:329px; width:716px;">
    
   		<!--<div class="right-hotel-name">Youngor Central Suzhou</div>-->
        <table width="100%" border="0" cellspacing="7" cellpadding="3" class="r-hoteldeta">
          <tr>
          	<td colspan="2" class="right-hotel-name" style="font-size:26px; color:#243419; padding-top:0px; padding-bottom:15px">Booking Calendar</td>
          </tr>
          <tr>
          	<td colspan="2" class="b2b-subtitle">
            	<script type="text/javascript" src="<?php echo WEB_DIR; ?>calendar/mootools-1_002.js"></script>
	<script type="text/javascript" src="<?php echo WEB_DIR; ?>calendar/mootools-1.js"></script>
	<script type="text/javascript" src="<?php echo WEB_DIR; ?>calendar/shCore.js"></script>
	
	<script type="text/javascript" src="<?php echo WEB_DIR; ?>calendar/mooECal.js"></script>
	<script type="text/javascript">
	window.addEvent('domready',function(){
		dp.SyntaxHighlighter.ClipboardSwf = '<?php echo WEB_DIR; ?>calendar/clipboard.swf';
		dp.SyntaxHighlighter.HighlightAll('code');
		new Calendar({
			calContainer:'calBody',
			newDate:'8/17/2012',
			cEvents: [ 
				{ 
					title:'MooTools Eventdsadsadass Calendar v0.3.0',
					start:'2009-08-05',
					end:'2009-08-10',
					location:'sadasdasdsadas.com' 
				}, 
				{ 
					title:'Fly South',
					start:'2009-08-01T17:00:00-06:00',
					end:'2009-08-01T21:00:00-06:00',
					location:'Tampa' 
				},
				{
					title:'<a href="http://google.com">Google\'s Cool</a>',
					start:'2009-08-09',
					end:'2009-08-10',
					location:'World Wide'
				},
				{ 
					title:'Party Time', 
					start:'2009-08-16T23:30:00-06:00', 
					end:'2009-08-16T24:30:00-06:00', 
					location:'Da Club' 
				},
				{
					title:'Hair Cut',
					start:'2009-08-17T09:00:00-06:00',
					end:'2009-08-17T09:30:00-06:00',
					location:''
				},
				{
					title:'Oil Change',
					start:'2009-08-17T11:00:00-06:00',
					end:'2009-08-17T11:30:00-06:00',
					location:'Jiffy Lube'
				},
				{
					title:'Gym',
					start:'2009-08-17T13:00:00-06:00',
					end:'2009-08-17T13:30:00-06:00',
					location:''
				},
				{
					title:'Dinner',
					start:'2009-08-17T17:00:00-06:00',
					end:'2009-08-17T18:30:00-06:00',
					location:'Bob Chinns'
				},
				{
					title:'Movie',
					start:'2009-08-17T19:00:00-06:00',
					end:'2009-08-17T21:30:00-06:00',
					location:'Marcus'
				},
				{
					title:'Bedtime',
					start:'2009-08-17T23:00:00-05:00',
					end:'2009-08-17T23:00:00-05:00',
					location:'Home'
				}
			]	
		});
	})
	</script>
	
	<link rel="stylesheet" type="text/css" id="calStyle" href="<?php echo WEB_DIR; ?>calendar/mooECal.css">

            
            <div id="calBody"><table id="monthCal" class="mooECal" cellspacing="0"><thead><tr class="trControls"><th class="thControls" colspan="7"><ull class="ullControls"><lli class="lliNextCal"><a class="aNextCal" href="javascript:void(0)">&#8594;</a></lli><lli class="lliViewPicker"><ull class="ullViewPicker"><lli class="lliMonthPicker"><a class="aViewCal" href="javascript:void(0)">month</a></lli><lli class="lliWeekPicker"><a class="aViewCal" href="javascript:void(0)">week</a></lli><lli class="lliDayPicker"><a class="aViewCal" href="javascript:void(0)">day</a></lli></ull></lli><lli class="lliHeaderCal">August 2009</lli><lli class="lliPrevCal"><a class="aPrevCal" href="javascript:void(0)">&#8592;</a></lli><lli class="lliLoading"><span id="loading" style="visibility: hidden;">loading...</span></lli></ull></th></tr><tr class="dowRow"><th colspan="7"><ull><lli>Sunday</lli><lli>Monday</lli><lli>Tuesday</lli><lli>Wednesday</lli><lli>Thursday</lli><lli>Friday</lli><lli>Saturday</lli></ull></th></tr></thead><tbody><tr class="monthWeek"><td id="day-5" class="monthDay">&nbsp;</td><td id="day-4" class="monthDay">&nbsp;</td><td id="day-3" class="monthDay">&nbsp;</td><td id="day-2" class="monthDay">&nbsp;</td><td id="day-1" class="monthDay">&nbsp;</td><td id="day0" class="monthDay">&nbsp;</td><td id="day1" class="monthDay"><span>1</span><div></div></td></tr><tr class="monthWeek"><td id="day2" class="monthDay"><span>2</span><div><div>4:30am Fly South</div></div></td><td id="day3" class="monthDay hover"><span>3</span><div></div></td><td id="day4" class="monthDay"><span>4</span><div></div></td><td id="day5" class="monthDay"><span>5</span><div><div> MooTools Events Calendar v0.3.0</div></div></td><td id="day6" class="monthDay"><span>6</span><div></div></td><td id="day7" class="monthDay"><span>7</span><div></div></td><td id="day8" class="monthDay"><span>8</span><div></div></td></tr><tr class="monthWeek"><td id="day9" class="monthDay"><span>9</span><div><div> <a href="http://google.com/">Google's Cool</a></div></div></td><td id="day10" class="monthDay"><span>10</span><div><div> <a href="http://google.com/">Google's Cool</a></div></div></td><td id="day11" class="monthDay"><span>11</span><div></div></td><td id="day12" class="monthDay"><span>12</span><div></div></td><td id="day13" class="monthDay"><span>13</span><div></div></td><td id="day14" class="monthDay"><span>14</span><div></div></td><td id="day15" class="monthDay"><span>15</span><div></div></td></tr><tr class="monthWeek"><td id="day16" class="monthDay"><span>16</span><div></div></td><td id="day17" class="monthDay selected"><span>17</span><div><div>8:30pm Hair Cut</div><div>10:30pm Oil Change</div></div></td><td id="day18" class="monthDay"><span>18</span><div><div>12:30am Gym</div><div>4:30am Dinner</div><div>6:30am Movie</div><div>9:30am Bedtime</div></div></td><td id="day19" class="monthDay"><span>19</span><div></div></td><td id="day20" class="monthDay"><span>20</span><div></div></td><td id="day21" class="monthDay"><span>21</span><div></div></td><td id="day22" class="monthDay"><span>22</span><div></div></td></tr><tr class="monthWeek"><td id="day23" class="monthDay"><span>23</span><div></div></td><td id="day24" class="monthDay"><span>24</span><div></div></td><td id="day25" class="monthDay"><span>25</span><div></div></td><td id="day26" class="monthDay"><span>26</span><div></div></td><td id="day27" class="monthDay"><span>27</span><div></div></td><td id="day28" class="monthDay"><span>28</span><div></div></td><td id="day29" class="monthDay"><span>29</span><div></div></td></tr><tr class="monthWeek"><td id="day30" class="monthDay"><span>30</span><div></div></td><td id="day31" class="monthDay"><span>31</span><div></div></td><td id="day32" class="monthDay">&nbsp;</td><td id="day33" class="monthDay">&nbsp;</td><td id="day34" class="monthDay">&nbsp;</td><td id="day35" class="monthDay">&nbsp;</td><td id="day36" class="monthDay">&nbsp;</td></tr></tbody></table></div></td>
          </tr>
         
         
          
          
        </table>
      
    </div>
    
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