<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html;" />
    <meta http-equiv="Cache-control" content="no-cache" />
    <title>AirFast Tickets</title>
    <link href="<?php echo WEB_DIR; ?>styles/reset.css" rel="stylesheet" type="text/css" />
<link href="<?php echo WEB_DIR; ?>styles/general.css" rel="stylesheet" type="text/css" />
<link href="<?php echo WEB_DIR; ?>styles/style-g.css" rel="stylesheet" type="text/css" />
<link href="<?php echo WEB_DIR; ?>styles/style-geo.css" rel="stylesheet" type="text/css" />
<link href="<?php echo WEB_DIR; ?>styles/style-alex.css" rel="stylesheet" type="text/css" />
<link href="<?php echo WEB_DIR; ?>styles/style-p.css" rel="stylesheet" type="text/css" />
<link href="<?php echo WEB_DIR; ?>styles/style-s.css" rel="stylesheet" type="text/css" />
<link href="<?php echo WEB_DIR; ?>styles/style-jim.css" rel="stylesheet" type="text/css" />
<link href="<?php echo WEB_DIR; ?>styles/ui-lightness/datepicker-theme.css" rel="stylesheet" type="text/css" />



<script type="text/javascript" src="<?php echo WEB_DIR; ?>scripts/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="<?php echo WEB_DIR; ?>scripts/jquery-ui-1.7.3.custom.min.js"></script>
<script type="text/javascript" src="<?php echo WEB_DIR; ?>scripts/jquery.selectbox-1.2.js"></script>
<script type="text/javascript" src="<?php echo WEB_DIR; ?>scripts/jquery.jcarousel.min.js"></script>
<script type="text/javascript" src="<?php echo WEB_DIR; ?>scripts/jquery.cycle.js"></script>
<script type="text/javascript" src="<?php echo WEB_DIR; ?>scripts/jquery.cluetip.all.js"></script>
<script type="text/javascript" src="<?php echo WEB_DIR; ?>scripts/jquery.autocomplete.js"></script>
<script type="text/javascript" src="<?php echo WEB_DIR; ?>scripts/jquery.jscrollpane.js"></script>
<script type="text/javascript" src="<?php echo WEB_DIR; ?>scripts/jquery.mousewheel.js"></script>
<script type="text/javascript" src="<?php echo WEB_DIR; ?>scripts/script-g.js"></script>
<script type="text/javascript" src="<?php echo WEB_DIR; ?>scripts/script-geo.js"></script>
<script type="text/javascript" src="<?php echo WEB_DIR; ?>scripts/script-alex.js"></script>
<script type="text/javascript" src="<?php echo WEB_DIR; ?>scripts/script-p.js"></script>
<script type="text/javascript" src="<?php echo WEB_DIR; ?>scripts/script-s.js"></script>
<script type="text/javascript" src="<?php echo WEB_DIR; ?>scripts/script-jim.js"></script>


<script type="text/javascript" src="<?php print WEB_DIR; ?>autofill/js/bsn.AutoSuggest_c_2.0.js"></script>
<script type="text/javascript" language="javascript">
function display_adult_count(val)
{
	if(val==1)
	{
		document.getElementById('div_room1').style.display="block";
		document.getElementById('div_room2').style.display="none";
		document.getElementById('div_room3').style.display="none";
		document.getElementById('div_room4').style.display="none";
	}
	if(val==2)
	{
		document.getElementById('div_room1').style.display="block";
		document.getElementById('div_room2').style.display="block";
		document.getElementById('div_room3').style.display="none";
		document.getElementById('div_room4').style.display="none";
	}
	if(val==3)
	{
		document.getElementById('div_room1').style.display="block";
		document.getElementById('div_room2').style.display="block";
		document.getElementById('div_room3').style.display="block";
		document.getElementById('div_room4').style.display="none";
	}
	if(val==4)
	{
		document.getElementById('div_room1').style.display="block";
		document.getElementById('div_room2').style.display="block";
		document.getElementById('div_room3').style.display="block";
		document.getElementById('div_room4').style.display="block";
	}
}

function changeLang(type)
{

	
$.post("<?php echo WEB_URL.'customer/changeLang'; ?>", { type: type},
 		function(data) {
   		 window.location= "<?php echo $_SERVER['REQUEST_URI']; ?>";
	 	}

	 ); 
	 
}
</script>
<link rel="stylesheet" href="<?php print WEB_DIR; ?>autofill/css/autosuggest_inquisitor.css" type="text/css" media="screen" charset="utf-8" />
</head>
<body class='col-1 page-home   '>
    <!-- #outer-header -->
    <?php $this->load->view('header');?>
    
        <div id="outer-content">
            <div id="content">
                <div id="topFrontWrapper">	
	<div id="frontForm">
	
		<div class="topFormRadius"></div>
		<div class="step step1 active">
			<div class="step1-info step-info">
				<span class="stepNum">1</span><h3><?php echo  $this->lang->line('BOOKING_CHOISES'); ?></h3>
				<div class="desc"><?php echo  $this->lang->line('sel_option_to_start'); ?></div>
				<div class="arr_a"></div>
			</div> <!-- /step1 info -->
		
			<div class="step1-elems step-elems ">
				<div class="step-elems-inner">
			    <div class="line1">
			    <div class="radiob">
                
                    <label class="label_radio" for="flightHotelR">
                    <input name="bookingOp" id="flightHotelR" value="1" type="radio" checked="checked" rel="search-home-form" />
                    <?php echo  $this->lang->line('SEARCH_OPTION_ONE'); ?>
                    </label>               

                    <label class="label_radio" for="hotelR">
                    <input name="bookingOp" id="hotelR" value="1" type="radio" rel="search-home-form-1" />
                    <?php echo  $this->lang->line('SEARCH_OPTION_TWO'); ?>
                    </label> 

                    <label class="label_radio" for="flightR">
                    <input name="bookingOp" id="flightR" value="1" type="radio" rel="search-home-form-2"/>
                   <?php echo  $this->lang->line('SEARCH_OPTION_THREE'); ?>
                    </label>  
                    
                     <label class="label_radio" for="carR">
                    <input name="bookingOp" id="carR" value="1" type="radio" rel="search-home-form-3"/>
                     <?php echo  $this->lang->line('caronly'); ?>
                    </label>   

                    <label class="label_radio" for="cruiseR">
                    <input name="bookingOp" id="cruiseR" value="1" type="radio" rel="search-home-form-4"/>
                    <?php echo  $this->lang->line('Cruise'); ?>
                    </label>                  

				</div>
			   
				</div>

				</div>
			</div><!-- /step1 elems -->
		</div> <!-- step1 -->
		
       
         <script type="text/javascript">
		function validate_flight_1()
		{
		var today=document.getElementById("tdate").value	;
			
		if(document.getElementById("airport-from-2").value=="")
		{
			alert("please enter the from place");
			document.getElementById("airport-from-2").focus();
			return false;
		}
		
		if(document.getElementById("airport-to-2").value=="")
		{
			alert("please enter the to  place");
			document.getElementById("airport-to-2").focus();
			return false;
		}
		
		if(document.getElementById("stayIn2").value=="")
		{
			alert("please enter the Stay");
			document.getElementById("stayIn2").focus();
			return false;
		}
		
			if(document.getElementById("depart-2").value=="")
		{
			alert("please enter the date");
			document.getElementById("depart-2").focus();
			return false;
		}
		
	var str1 = today;
	var str2 = document.getElementById("depart-2").value;
    var dt1  = parseInt(str1.substring(0,2),10);
    var mon1 = parseInt(str1.substring(3,5),10);
    var yr1  = parseInt(str1.substring(6,10),10);
    var dt2  = parseInt(str2.substring(0,2),10);
    var mon2 = parseInt(str2.substring(3,5),10);
    var yr2  = parseInt(str2.substring(6,10),10);
    var date1 = new Date(yr1, mon1, dt1);
    var date2 = new Date(yr2, mon2, dt2);

    if(date2 < date1)
    {
         alert("Date should be  greater than Todays date");
		 document.getElementById("depart-2").value="";
		 document.getElementById("depart-2").focus();
         return false;
    } 
		
		
		
		
	   if(document.getElementById("return-2").value=="")
		{
			alert("please enter the date");
			document.getElementById("return-2").focus();
			return false;
		}
		
	var str1 = today;
	var str2 = document.getElementById("return-2").value;
    var dt1  = parseInt(str1.substring(0,2),10);
    var mon1 = parseInt(str1.substring(3,5),10);
    var yr1  = parseInt(str1.substring(6,10),10);
    var dt2  = parseInt(str2.substring(0,2),10);
    var mon2 = parseInt(str2.substring(3,5),10);
    var yr2  = parseInt(str2.substring(6,10),10);
    var date1 = new Date(yr1, mon1, dt1);
    var date2 = new Date(yr2, mon2, dt2);

    if(date2 < date1)
    {
         alert("Date should be  greater than Todays date");
		 document.getElementById("return-2").value="";
		 document.getElementById("return-2").focus();
         return false;
    } 
	
	
	var str1 = document.getElementById("depart-2").value;
	var str2 = document.getElementById("return-2").value;
    var dt1  = parseInt(str1.substring(0,2),10);
    var mon1 = parseInt(str1.substring(3,5),10);
    var yr1  = parseInt(str1.substring(6,10),10);
    var dt2  = parseInt(str2.substring(0,2),10);
    var mon2 = parseInt(str2.substring(3,5),10);
    var yr2  = parseInt(str2.substring(6,10),10);
    var date1 = new Date(yr1, mon1, dt1);
    var date2 = new Date(yr2, mon2, dt2);

    if(date2 <= date1)
    {
         alert("Date should be greater than from date");
		 document.getElementById("return-2").value="";
		 document.getElementById("return-2").focus();
         return false;
    }	
		
		
		
		
		
		document.getElementById('search-home-form').submit;
		
		}
		</script>
       
       
       
       
        <form action="form_action.php" method="get" id="search-home-form" class="bookingForm">
        	<div class="step step2">
			<div class="step2-info step-info">
				<span class="stepNum">2</span><h3><?php echo  $this->lang->line('WHERE_TO_GO'); ?></h3>
				<div class="desc"><?php echo  $this->lang->line('Enter_your_origin_and_destination'); ?></div>
				<div class="arr_a"></div>
			</div> <!-- /step2 info -->
		
			<div class="step2-elems step-elems">
				<div class="step-elems-inner">
               <div class="inputf first">
				    <label for="airport-from-2"><?php echo  $this->lang->line('From'); ?> : </label>
				    <a class="airport-search-from" href="#">
					<?php
						 echo  $this->lang->line('Airports'); ?>
                    
                    </a>
				    <input type="text" id="airport-from-2" name="airport-from-2" autocomplete="off"/>
				</div>
				<div class="inputf second">
					<label for="airport-to-2"><?php echo  $this->lang->line('To'); ?> : </label>
			    	<a class="airport-search-to" href="#"><?php echo  $this->lang->line('Airports'); ?></a>
			    	<input type="text" id="airport-to-2" name="airport-to-2" autocomplete="off"/>
				</div>
			    <div class="inputf last">
					<label for="stayIn2"><?php echo  $this->lang->line('Stay_In'); ?> :</label>
			    	<input type="text" id="stayIn2" name="stayIn2" autocomplete="off"/>
				</div>
				</div>
			</div> <!-- /step2 elems -->
		</div> <!-- step2 -->
				
		
		<div class="step step4">
			<div class="step4-info step-info">
				<span class="stepNum">3</span><h3><?php echo  $this->lang->line('WHAT_DATES'); ?></h3>
				<div class="desc"><?php echo  $this->lang->line('Choose_your_travel_dates'); ?></div>
				<div class="arr_a"></div>
			</div> <!-- /step4 info -->	
			<div class="step4-elems step-elems">
			<div class="step-elems-inner">  
			   <div class="dptrtn-wrapper first">
				   	<label for="depart-2"><?php echo  $this->lang->line('Depart'); ?>: </label>
				   	<input type="text" name="depart-2" id="depart-2" class="globaldatepicker datepicker" />
				   	<select id="s4depart-2" name="departselect-2">
						<option value="anytime"><?php echo  $this->lang->line('Anytime'); ?></option>
						<option value="anytime2"><?php echo  $this->lang->line('Anytime'); ?>2</option>
						<option value="anytime3"><?php echo  $this->lang->line('Anytime'); ?>3</option>
						<option value="anytime4"><?php echo  $this->lang->line('Anytime'); ?>4</option>
					</select> 
				</div>
				<div class="dptrtn-wrapper last">
					<label for="return-2"><?php echo  $this->lang->line('Return'); ?>: </label>
					<input type="text" name="return-2" id="return-2" class="globaldatepicker datepicker" />
				    <select id="s4return-2" name="returnselect-2">
						<option value="anytime"><?php echo  $this->lang->line('Anytime'); ?></option>
						<option value="anytime2"><?php echo  $this->lang->line('Anytime'); ?>2</option>
						<option value="anytime3"><?php echo  $this->lang->line('Anytime'); ?>3</option>
						<option value="anytime4"><?php echo  $this->lang->line('Anytime'); ?>4</option>
					</select> 
				</div>
				</div>
			</div> <!-- /step4 elems -->
		</div> <!-- step4 -->
		
		
		
		
		<div class="step step5" rel="1">
			<div class="step5-info step-info">
				<span class="stepNum">4</span><h3>HOW MANY</h3>
				<div class="desc">Choose the number of travelers and their ages</div>
				<div class="arr_a"></div>
			</div> <!-- /step5 info -->
		
			<div class="step5-elems step-elems">
				<div class="step-elems-inner">
				<div class="line1 line">
					<div class="roomswrapper options-5">
					<label for="rooms">Rooms :</label>
                        <div class="opWithInfo">
                            <select name="rooms" id="rooms">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            </select>
                        <div class="rooms-info infoToolTip"><a rel="p.infoPop" href="#">&nbsp;</a><p class="infoPop">Info για το ταξίδι σας!</p></div> 
                        </div>
                    </div>
                </div>
                <div class="line2 line">
					<div class="adultswrapper options-5">
					<label for="frontAdult-2">Adults :</label>
                     <div class="opWithInfo">
						<select name="adults-2" id="frontAdult-2">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						</select>
					<div class="adults-info infoToolTip"><a rel="p.infoPop" href="#">&nbsp;</a><p class="infoPop">Info για το ταξίδι σας!</p></div> 
					</div>
                    </div>
				
				
					<div class="infantswithoutseat-wrapper options-5">
					<label for="frontInfant-2">Infants :</label>
                   	<div class="opWithInfo">
						<select name="frontInfant-2" id="frontInfant-2">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
					</select>
					<div class="infants-without-seat-info  infoToolTip"><a rel="p.infoPop" href="#">&nbsp;</a><p class="infoPop">Info για το ταξίδι σας!</p></div> 
				   </div>
                   </div>
					
                    <div class="childrenwrapper options-5">
					<label for="frontChildren-2">Children :</label>
                    <div class="opWithInfo">
					<select name="children-2" id="frontChildren-2">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
					</select>
					<div class="children-info infoToolTip"><a rel="p.infoPop" href="#">&nbsp;</a><p class="infoPop">Info για το ταξίδι σας!</p></div> 
					</div>
                    </div>
                    
					</div>	
                    <div class="line3 line">
					<div class="adultswrapper options-5">
					<label for="frontAdult-3">Adults :</label>
                    <div class="opWithInfo">
						<select name="adults-3" id="frontAdult-3">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						</select>
					<div class="adults-info infoToolTip"><a rel="p.infoPop" href="#">&nbsp;</a><p class="infoPop">Info για το ταξίδι σας!</p></div> 
					</div>
                    </div>
				
				
					<div class="infantswithoutseat-wrapper options-5">
					<label for="frontInfant-3">Infants :</label>
                    <div class="opWithInfo">
						<select name="frontInfant-3" id="frontInfant-3">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
					</select>
					<div class="infants-without-seat-info  infoToolTip"><a rel="p.infoPop" href="#">&nbsp;</a><p class="infoPop">Info για το ταξίδι σας!</p></div> 
				   </div>
                   </div>
					
                    <div class="childrenwrapper options-5">
					<label for="frontChildren-3">Children :</label>
                    <div class="opWithInfo">
					<select name="children-3" id="frontChildren-3">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
					</select>
					<div class="children-info infoToolTip"><a rel="p.infoPop" href="#">&nbsp;</a><p class="infoPop">Info για το ταξίδι σας!</p></div> 
					</div>
                    </div>
                    
					</div>	
                    <div class="line4 line">
					<div class="adultswrapper options-5">
					<label for="frontAdult-4">Adults :</label>
                    <div class="opWithInfo">
						<select name="adults-4" id="frontAdult-4">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						</select>
					<div class="adults-info infoToolTip"><a rel="p.infoPop" href="#">&nbsp;</a><p class="infoPop">Info για το ταξίδι σας!</p></div> 
					</div>
					</div>
				
					<div class="infantswithoutseat-wrapper options-5">
					<label for="frontInfant-4">Infants :</label>
                    <div class="opWithInfo">
						<select name="frontInfant-4" id="frontInfant-4">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
					</select>
					<div class="infants-without-seat-info  infoToolTip"><a rel="p.infoPop" href="#">&nbsp;</a><p class="infoPop">Info για το ταξίδι σας!</p></div> 
                    </div>
				   </div>
					
                    <div class="childrenwrapper options-5">
					<label for="frontChildren-4">Children :</label>
                    <div class="opWithInfo">
					<select name="children-4" id="frontChildren-4">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
					</select>
					<div class="children-info infoToolTip"><a rel="p.infoPop" href="#">&nbsp;</a><p class="infoPop">Info για το ταξίδι σας!</p></div> 
					</div>
                    </div>
                    
					</div>	
                    <div class="line5 line">
					<div class="adultswrapper options-5">
					<label for="frontAdult-5">Adults :</label>
                    <div class="opWithInfo">
						<select name="adults-5" id="frontAdult-5">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						</select>
					<div class="adults-info infoToolTip"><a rel="p.infoPop" href="#">&nbsp;</a><p class="infoPop">Info για το ταξίδι σας!</p></div> 
					</div>
                    </div>
				
				
					<div class="infantswithoutseat-wrapper options-5">
					<label for="frontInfant-5">Infants :</label>
                    <div class="opWithInfo">
						<select name="frontInfant-5" id="frontInfant-5">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
					</select>
					<div class="infants-without-seat-info  infoToolTip"><a rel="p.infoPop" href="#">&nbsp;</a><p class="infoPop">Info για το ταξίδι σας!</p></div> 
				   </div>
					</div>
                    <div class="childrenwrapper options-5">
					<label for="frontChildren-5">Children:</label>
                    <div class="opWithInfo">
					<select name="children-5" id="frontChildren-5">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
					</select>
					<div class="children-info infoToolTip"><a rel="p.infoPop" href="#">&nbsp;</a><p class="infoPop">Info για το ταξίδι σας!</p></div> 
					</div>
                    </div>
					</div>	
				</div>		
			</div> <!-- /step5 elems -->
		</div> <!-- step5 -->
        <div class="step step6">
			<div class="step6-info step-info">
				<span class="stepNum">5</span><h3>ADVANCED OPTIONS</h3>
				<div class="arr_a"></div>
			</div> <!-- /step6 info -->
		
			<div class="step6-elems step-elems">
				<div class="step-elems-inner">
				<div class="optionsWrapper">
                <div class="line1 line">
					<div class="chInWrapper options-6-2">
					<label for="chIn">Check-in :</label>
				   	<input type="text" name="chIn" id="chIn" class="globaldatepicker datepicker" />
					</div>
                    <div class="chOutWrapper options-6-2">
					<label for="chOut">Check-out :</label>
				   	<input type="text" name="chOut" id="chOut" class="globaldatepicker datepicker" />
					</div>
				</div>
                <div class="line2 line">
					<div class="airlineCompWrapper options-6-2">
					<label for="airlineComp">Airline Company :</label>
						<select name="airlineComp" id="airlineComp">
						<option value="1">Airline 1</option>
						<option value="2">Airline 2</option>
						<option value="3">Airline 3</option>
						<option value="4">Airline 4</option>
						</select>
					</div>
				</div>
				<div class="line3 line">
					<div class="seatCatWrapper options-6-2">
					<label for="seatCat">Seat Category :</label>
						<select name="seatCat" id="seatCat">
						<option value="1">A Class</option>
						<option value="2">B Class</option>
						<option value="3">C Class</option>
						<option value="4">D Class</option>
					</select>
				   </div>
           		</div>
                </div> <!-- /.optionsWrapper -->
                    <div class="checkWrapper">
                    	<input type="checkbox" name="advDrFlight-2" value="advDrFlight" id="advDrFlight-2"/>
                        <label for="advDrFlight-2" class="blueLab">Direct Flights</label>
                    </div><!-- /.checkWrapper -->
				
				</div>		
			</div> <!-- /step6 elems -->
		</div> <!-- step6 -->
        <div class="directFlightWrapper">
			<div class="directFlight">
             	<div class="flightOption">
             	<input type="checkbox" id="directflights-2" value="directflights" name="directflights-2" /> <label for="directflights-2" class="blueLab">Direct Flights</label>
               	</div>
                <a class="adOpLink" href="#">Advanced Options</a>
             </div>
		    <div class="button-wrapper">
		        <div><button value="Search" type="submit" class="fsubmit first">SEARCH FLIGHTS &amp; HOTELS</button></div>
		        <div class="button-separator">OR</div>
				<div><button value="Search" type="submit" class="fsubmit last">SEARCH FLIGHTS</button></div>
		    </div>
		</div>
        </form>
		
        
        
        <form action="form_action.php" method="get" id="search-home-form-2" class="bookingForm">
        	<div class="step step2">
			<div class="step2-info step-info">
				<span class="stepNum">2</span><h3>WHERE TO GO</h3>
				<div class="desc">Enter your origin and destination cities</div>
				<div class="arr_a"></div>
			</div> <!-- /step2 info -->
		
			<div class="step2-elems step-elems">
				<div class="step-elems-inner">
				 <div class="radiob">
                 
                     <label class="label_radio" for="rountR">
                    <input name="oneWayR" id="rountR" value="1" type="radio" />
                    Round Trip
                    </label>  
                    
                   <label class="label_radio" for="oneWayR">
                    <input name="oneWayR" id="oneWayR" value="1" type="radio" />
                    One Way
                    </label>                                   
                 
                   <label class="label_radio" for="multiDestR">
                    <input name="oneWayR" id="multiDestR" value="1" type="radio" />
                    Multi Destination
                    </label> 	
				</div>
                <div class="inputf first">
				    <label for="airport-from">From : </label>
				    <a class="airport-search-from mapsFrame" href="maps/map.php">Airports</a>
				    <input type="text" id="airport-from" name="airport-from" autocomplete="off"/>
				</div>
				<div class="inputf second">
					<label for="airport-to">To : </label>
			    	<a class="airport-search-to mapsFrame" href="maps/map.php">Airports</a>
			    	<input type="text" id="airport-to" name="airport-to" autocomplete="off"/>
				</div>
				</div>
			</div> <!-- /step2 elems -->
		</div> <!-- step2 -->
				
		
		<div class="step step4">
			<div class="step4-info step-info">
				<span class="stepNum">3</span><h3>WHAT DATES</h3>
				<div class="desc">Choose your travel dates</div>
				<div class="arr_a"></div>
			</div> <!-- /step4 info -->	
			<div class="step4-elems step-elems">
			<div class="step-elems-inner">
				<div class="radiob-wrapper">
				 	<div class="radiob radiob1">
				 		<label class="label_radio" for="exactdates">
                        <input name="whatdates" id="exactdates" value="1" type="radio" checked="checked" />
                        Exact Dates
                        </label>
                        
                        <label class="label_radio" for="onetothreedays">
                        <input name="whatdates" id="onetothreedays" value="1" type="radio" />
                        + / - 1 to 3 Days
                        </label>  
                       
                        <label class="label_radio" for="onemonth">
                        <input name="whatdates" id="onemonth" value="1" type="radio" />
                        1 Month
                        </label>
                        
                        <label class="label_radio" for="oneyear">
                        <input name="whatdates" id="oneyear" value="1" type="radio" />
                        1 Year
                        </label> 
				    </div>
				</div>   
			    <div class="dptrtn-wrapper first">
				   	<label for="depart">Depart: </label>
				   	<input type="text" name="depart" id="depart" class="globaldatepicker datepicker" />
				   	<select id="s4depart" name="departselect">
						<option value="anytime">Anytime</option>
						<option value="anytime2">Anytime2</option>
						<option value="anytime3">Anytime3</option>
						<option value="anytime4">Anytime4</option>
					</select> 
				</div>
				<div class="dptrtn-wrapper last">
					<label for="return">Return: </label>
					<input type="text" name="return" id="return" class="globaldatepicker datepicker" />
				    <select id="s4return" name="returnselect">
						<option value="anytime">Anytime</option>
						<option value="anytime2">Anytime2</option>
						<option value="anytime3">Anytime3</option>
						<option value="anytime4">Anytime4</option>
					</select> 
				</div>
				</div>
			</div> <!-- /step4 elems -->
		</div> <!-- step4 -->
		
		
		
		
		<div class="step step5">
			<div class="step5-info step-info">
				<span class="stepNum">4</span><h3>HOW MANY</h3>
				<div class="desc">Choose the number of travelers and their ages</div>
				<div class="arr_a"></div>
			</div> <!-- /step5 info -->
		
			<div class="step5-elems step-elems">
				<div class="step-elems-inner">
				<div class="line1">
					<div class="adultswrapper options-5">
					<label for="frontAdult">Adults:</label>
                    <div class="opWithInfo">
						<select name="adults" id="frontAdult">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						</select>
					<div class="adults-info infoToolTip"><a rel="p.infoPop" href="#">&nbsp;</a><p class="infoPop">Info για το ταξίδι σας!</p></div> 
					</div>
					</div>
				
					<div class="infantswithoutseat-wrapper options-5">
					<label for="frontInfant">Infants</label>
                    	<div class="opWithInfo">
						<select name="infant1" id="frontInfant">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
					</select>
					<div class="infants-without-seat-info  infoToolTip"><a rel="p.infoPop" href="#">&nbsp;</a><p class="infoPop">Info για το ταξίδι σας!</p></div> 
				   </div>
                   </div>
					
                    <div class="childrenwrapper options-5">
					<label for="frontChildren">Children:</label>
                    <div class="opWithInfo">
					<select name="children" id="frontChildren">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
					</select>
					<div class="children-info infoToolTip"><a rel="p.infoPop" href="#">&nbsp;</a><p class="infoPop">Info για το ταξίδι σας!</p></div> 
					</div>
                    </div>
                    
					</div>	
                    <!-- adv option -->
                    <div id="advOptionsWrapper" style="display:none;">
                    <div class="line1">
					<div class="adultswrapper options-5">
					<label for="advAdult">Adults:</label>
                    <div class="opWithInfo">
						<select name="advAdult" id="advAdult">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						</select>
					<div class="advAdults-info infoToolTip"><a rel="p.infoPop" href="#">&nbsp;</a><p class="infoPop">Info για το ταξίδι σας!</p></div> 
					</div>
                    </div>
				
				
					<div class="infantswithoutseat-wrapper options-5">
					<label for="advInfantNoSeat">Infants without seat :</label>
                    <div class="opWithInfo">
						<select name="advInfantNoSeat" id="advInfantNoSeat">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
					</select>
					<div class="infants-without-seat-info  infoToolTip"><a rel="p.infoPop" href="#">&nbsp;</a><p class="infoPop">Info για το ταξίδι σας!</p></div> 
				   </div>
                   </div>
                   
                   <div class="infantswithseat-wrapper options-5 last">
					<label for="advInfantSeat">Infants with seat :</label>
						<div class="opWithInfo">
                        <select name="advInfantSeat" id="advInfantSeat">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
					</select>
					<div class="infants-with-seat-info  infoToolTip"><a rel="p.infoPop" href="#">&nbsp;</a><p class="infoPop">Info για το ταξίδι σας!</p></div> 
				   </div>
                   </div>
                   </div>
					<div class="line2">
                    <div class="childrenwrapper options-5">
					<label for="advChildren">Children:</label>
                    <div class="opWithInfo">
					<select name="advChildren" id="advChildren">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
					</select>
					<div class="advChildren-info infoToolTip"><a rel="p.infoPop" href="#">&nbsp;</a><p class="infoPop">Info για το ταξίδι σας!</p></div> 
					</div>
                    </div>
                    
					
                    
					<div class="youngwrapper options-5">
					<label for="advYoung">Young :</label>
                    <div class="opWithInfo">
						<select name="advYoung" id="advYoung">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						</select>
					<div class="advYoung-info infoToolTip"><a rel="p.infoPop" href="#">&nbsp;</a><p class="infoPop">Info για το ταξίδι σας!</p></div> 
					</div>
					</div>
				
					<div class="seniors-wrapper options-5 last">
					<label for="advSeniors">Seniors :</label>
                    <div class="opWithInfo">
						<select name="advSeniors" id="advSeniors">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
					</select>
					<div class="advSeniors-info  infoToolTip"><a rel="p.infoPop" href="#">&nbsp;</a><p class="infoPop">Info για το ταξίδι σας!</p></div> 
				   </div>
                   </div>
					
					
                    </div><!-- /advOptionsWrapper -->
                    
                    </div>
				</div>		
			</div> <!-- /step5 elems -->
		</div> <!-- step5 -->
         <div class="step step6">
			<div class="step6-info step-info">
				<span class="stepNum">5</span><h3>ADVANCED OPTIONS</h3>
				<div class="arr_a"></div>
			</div> <!-- /step6 info -->
		
			<div class="step6-elems step-elems">
				<div class="step-elems-inner">
				<div class="optionsWrapper">
                <div class="line1">
					<div class="airline6Wrapper options-6">
					<label for="aieline6">Airline:</label>
						<select name="airline" id="aieline6">
						<option value="1">Airline 1</option>
						<option value="2">Airline 2</option>
						<option value="3">Airline 3</option>
						<option value="4">Airline 4</option>
						</select>
					</div>
				</div>
				<div class="line2">
					<div class="classOfServiceWrapper options-6">
					<label for="classOfService">Class of service:</label>
						<select name="classOfService" id="classOfService">
						<option value="1">A Class</option>
						<option value="2">B Class</option>
						<option value="3">C Class</option>
						<option value="4">D Class</option>
					</select>
				   </div>
           		</div>
                </div> <!-- /.optionsWrapper -->
                    <div class="checkWrapper">
                    	<div class="line1">
                    	<input type="checkbox" name="excLowCost" value="excLowCost" id="excLowCost"/>
                        <label for="excLowCost" class="blueLab">Exclude Low Cost Flights</label>
                        </div>
                        <div class="line2">
                    	<input type="checkbox" name="advDrFlight" value="advDrFlight" id="advDrFlight"/>
                        <label for="advDrFlight" class="blueLab">Direct Flights</label>
                        </div>
                    </div><!-- /.checkWrapper -->
				
				</div>		
			</div> <!-- /step6 elems -->
		</div> <!-- step6 -->
         <div class="directFlightWrapper">
			
		
		
			 <div class="directFlight">
             	<div class="flightOption">
             	<input type="checkbox" id="directflights" value="directflights" name="directflights" /> <label for="directflights" class="blueLab">Direct Flights</label>
               	</div>
                <a class="adOpLink" href="#">Advanced Options</a>
             </div>
		    <div class="button-wrapper">
		        <div><button value="Search" type="submit" class="fsubmit first">SEARCH FLIGHTS &amp; HOTELS</button></div>
		        <div class="button-separator">OR</div>
				<div><button value="Search" type="submit" class="fsubmit last">SEARCH FLIGHTS</button></div>
		    </div>
		</div>
        </form>
		<form action="form_action.php" method="get" id="search-home-form-1" class="bookingForm">
		
		<div class="step step2">
			<div class="step2-info step-info">
				<span class="stepNum">2</span><h3>DESTINATION / HOTEL NAME</h3>
				<div class="desc">Enter your origin and destination cities</div>
				<div class="arr_a"></div>
			</div> <!-- /step2 info -->
		
			<div class="step2-elems step-elems">
				<div class="step-elems-inner">
				 
                <div class="inputf first">
				    <label for="hotelName">Destination / Hotel Name:</label>
				    <input type="text" id="hotelName" name="hotelName" autocomplete="off" value="e.g. hotel name or city" />
				</div>
				
			    
				</div>
			</div> <!-- /step2 elems -->
		</div> <!-- step2 -->
				
		
		<div class="step step4">
			<div class="step4-info step-info">
				<span class="stepNum">3</span><h3>WHAT DATES</h3>
				<div class="desc">Choose your travel dates</div>
				<div class="arr_a"></div>
			</div> <!-- /step4 info -->	
			<div class="step4-elems step-elems">
			<div class="step-elems-inner">  
            	<div class="checkWrapper">
                	<input type="checkbox" name="noSpecDates-2" value="no" id="noSpecDates-2"/><label class="blueLab" for="noSpecDates-2">I don't have specific dates</label>
                </div> 
			    <div class="dptrtn-wrapper first">
				   	<label for="chInDate">Check-in Date: </label>
				   	<input type="text" name="chInDate" id="chInDate" class="globaldatepicker datepicker" />
				   	<select id="chInDateOp" name="chInDateOp">
						<option value="anytime">Anytime</option>
						<option value="anytime2">Anytime2</option>
						<option value="anytime3">Anytime3</option>
						<option value="anytime4">Anytime4</option>
					</select> 
				</div>
				<div class="dptrtn-wrapper last">
					<label for="return">Check-out Date: </label>
					<input type="text" name="chOutDate" id="chOutDate" class="globaldatepicker datepicker" />
				    <select id="chOutDateOp" name="chOutDateOp">
						<option value="anytime">Anytime</option>
						<option value="anytime2">Anytime2</option>
						<option value="anytime3">Anytime3</option>
						<option value="anytime4">Anytime4</option>
					</select> 
				</div>
				</div>
			</div> <!-- /step4 elems -->
		</div> <!-- step4 -->
		
		
		
		
		<div class="step step5" rel="1">
			<div class="step5-info step-info">
				<span class="stepNum">4</span><h3>HOW MANY</h3>
				<div class="desc">Choose the number of travelers and their ages</div>
				<div class="arr_a"></div>
			</div> <!-- /step5 info -->
		
			<div class="step5-elems step-elems">
				<div class="step-elems-inner">
				<div class="line1 line">
					<div class="roomswrapper options-5">
					<label for="rooms-c">Rooms :</label>
                        <div class="opWithInfo">
                            <select name="rooms-c" id="rooms-c">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            </select>
                        <div class="rooms-info infoToolTip"><a rel="p.infoPop" href="#">&nbsp;</a><p class="infoPop">Info για το ταξίδι σας!</p></div> 
                        </div>
                    </div>
                </div>
                <div class="line2 line">
					<div class="adultswrapper options-5">
					<label for="frontAdult-2-c">Adults :</label>
                     <div class="opWithInfo">
						<select name="adults-2-c" id="frontAdult-2-c">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						</select>
					<div class="adults-info infoToolTip"><a rel="p.infoPop" href="#">&nbsp;</a><p class="infoPop">Info για το ταξίδι σας!</p></div> 
					</div>
                    </div>
				
				
					<div class="infantswithoutseat-wrapper options-5">
					<label for="frontInfant-2-c">Infants :</label>
                   	<div class="opWithInfo">
						<select name="frontInfant-2-c" id="frontInfant-2-c">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
					</select>
					<div class="infants-without-seat-info  infoToolTip"><a rel="p.infoPop" href="#">&nbsp;</a><p class="infoPop">Info για το ταξίδι σας!</p></div> 
				   </div>
                   </div>
					
                    <div class="childrenwrapper options-5">
					<label for="frontChildren-2-c">Children :</label>
                    <div class="opWithInfo">
					<select name="children-2-c" id="frontChildren-2-c">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
					</select>
					<div class="children-info infoToolTip"><a rel="p.infoPop" href="#">&nbsp;</a><p class="infoPop">Info για το ταξίδι σας!</p></div> 
					</div>
                    </div>
                    
					</div>	
                    <div class="line3 line">
					<div class="adultswrapper options-5">
					<label for="frontAdult-3-c">Adults :</label>
                    <div class="opWithInfo">
						<select name="adults-3-c" id="frontAdult-3-c">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						</select>
					<div class="adults-info infoToolTip"><a rel="p.infoPop" href="#">&nbsp;</a><p class="infoPop">Info για το ταξίδι σας!</p></div> 
					</div>
                    </div>
				
				
					<div class="infantswithoutseat-wrapper options-5">
					<label for="frontInfant-3-c">Infants :</label>
                    <div class="opWithInfo">
						<select name="frontInfant-3-c" id="frontInfant-3-c">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
					</select>
					<div class="infants-without-seat-info  infoToolTip"><a rel="p.infoPop" href="#">&nbsp;</a><p class="infoPop">Info για το ταξίδι σας!</p></div> 
				   </div>
                   </div>
					
                    <div class="childrenwrapper options-5">
					<label for="frontChildren-3-c">Children :</label>
                    <div class="opWithInfo">
					<select name="children-3-c" id="frontChildren-3-c">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
					</select>
					<div class="children-info infoToolTip"><a rel="p.infoPop" href="#">&nbsp;</a><p class="infoPop">Info για το ταξίδι σας!</p></div> 
					</div>
                    </div>
                    
					</div>	
                    <div class="line4 line">
					<div class="adultswrapper options-5">
					<label for="frontAdult-4-c">Adults :</label>
                    <div class="opWithInfo">
						<select name="adults-4-c" id="frontAdult-4-c">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						</select>
					<div class="adults-info infoToolTip"><a rel="p.infoPop" href="#">&nbsp;</a><p class="infoPop">Info για το ταξίδι σας!</p></div> 
					</div>
					</div>
				
					<div class="infantswithoutseat-wrapper options-5">
					<label for="frontInfant-4-c">Infants :</label>
                    <div class="opWithInfo">
						<select name="frontInfant-4-c" id="frontInfant-4-c">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
					</select>
					<div class="infants-without-seat-info  infoToolTip"><a rel="p.infoPop" href="#">&nbsp;</a><p class="infoPop">Info για το ταξίδι σας!</p></div> 
                    </div>
				   </div>
					
                    <div class="childrenwrapper options-5">
					<label for="frontChildren-4-c">Children :</label>
                    <div class="opWithInfo">
					<select name="children-4-c" id="frontChildren-4-c">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
					</select>
					<div class="children-info infoToolTip"><a rel="p.infoPop" href="#">&nbsp;</a><p class="infoPop">Info για το ταξίδι σας!</p></div> 
					</div>
                    </div>
                    
					</div>	
                    <div class="line5 line">
					<div class="adultswrapper options-5">
					<label for="frontAdult-5-c">Adults :</label>
                    <div class="opWithInfo">
						<select name="adults-5-c" id="frontAdult-5-c">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						</select>
					<div class="adults-info infoToolTip"><a rel="p.infoPop" href="#">&nbsp;</a><p class="infoPop">Info για το ταξίδι σας!</p></div> 
					</div>
                    </div>
				
				
					<div class="infantswithoutseat-wrapper options-5">
					<label for="frontInfant-5-c">Infants :</label>
                    <div class="opWithInfo">
						<select name="frontInfant-5-c" id="frontInfant-5-c">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
					</select>
					<div class="infants-without-seat-info  infoToolTip"><a rel="p.infoPop" href="#">&nbsp;</a><p class="infoPop">Info για το ταξίδι σας!</p></div> 
				   </div>
					</div>
                    <div class="childrenwrapper options-5">
					<label for="frontChildren-5-c">Children:</label>
                    <div class="opWithInfo">
					<select name="children-5-c" id="frontChildren-5-c">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
					</select>
					<div class="children-info infoToolTip"><a rel="p.infoPop" href="#">&nbsp;</a><p class="infoPop">Info για το ταξίδι σας!</p></div> 
					</div>
                    </div>
					</div>	
				</div>		
			</div> <!-- /step5 elems -->
		</div> <!-- step5 -->
        
        <div class="button-wrapper">
            <div><button value="Search" type="submit" class="fsubmit last">SEARCH HOTELS</button></div>
        </div>
		
        <input type="hidden" value="" name = "formOp" />
        </form>
         <form action="form_action.php" method="get" id="search-home-form-3" class="bookingForm"> <!-- car only -->
        	<div class="step step2">
			<div class="step2-info step-info">
				<span class="stepNum">2</span><h3>FIND A CAR RENTAL</h3>
				<div class="desc">Choose an airport <br />or city name</div>
				<div class="arr_a"></div>
			</div> <!-- /step2 info -->
		
			<div class="step2-elems step-elems">
				<div class="step-elems-inner">
                <div class="inputf first">
				    <label for="carPickDrop">Pick-up / Drop-off the car :</label>
				    <select id="carPickDrop" name="car-pick-drop">
                    <option value="All" selected="selected">at any airport</option>
                    <option value="1">airport 1</option>
                    <option value="2">airport 2</option>
                    <option value="3">airport 3</option>
                    <option value="4">airport 4</option>
                    <option value="5">airport 5</option>  
                    </select>
				</div>
				<div class="inputf second">
					<label for="airport-car">Airport city or Airport Code :</label>
			    	<input type="text" id="airport-car" name="airport-car" autocomplete="off" value="Thessaloniki" />
				</div>
			    
				</div>
			</div> <!-- /step2 elems -->
		</div> <!-- step2 -->
				
		
		<div class="step step4">
			<div class="step4-info step-info">
				<span class="stepNum">3</span><h3>CHOOSE A CAR AND SELECT DATES</h3>
				<div class="desc">Select a car and dates to pick-up and drop-off</div>
				<div class="arr_a"></div>
			</div> <!-- /step4 info -->	
			<div class="step4-elems step-elems">
			<div class="step-elems-inner">
				<div class="select-wrapper">
				 	<label for="carType">Car Type :</label>
                    <select name="carType" id="carType">
                    <option value="All" selected="selected">All Cars</option>
                    <option value="1">Car Type 1</option>
                    <option value="2">Car Type 2</option>
                    <option value="3">Car Type 3</option>
                    <option value="4">Car Type 4</option>
                    <option value="5">Car Type 5</option>
                    </select>
				</div>   
			    <div class="car-date-wrapper first">
				   	<label for="carPick">Car Pick-up :</label>
                    <div class="pickOpWrapper">
				   	<input type="text" name="carPick" id="carPick" class="globaldatepicker datepicker" />
				   	<select id="sPick" name="pickSelect">
						<option value="anytime" selected="selected">Anytime</option>
						<option value="anytime2">Anytime2</option>
						<option value="anytime3">Anytime3</option>
						<option value="anytime4">Anytime4</option>
					</select> 
                    </div>
				</div>
				<div class="car-date-wrapper last">
					<label for="carDrop">Car Drop-off :</label>
                    <div class="pickOpWrapper">
					<input type="text" name="carDrop" id="carDrop" class="globaldatepicker datepicker" />
				    <select id="sDrop" name="dropSelect">
						<option value="anytime" selected="selected">Anytime</option>
						<option value="anytime2">Anytime2</option>
						<option value="anytime3">Anytime3</option>
						<option value="anytime4">Anytime4</option>
					</select> 
                    </div>
				</div>
				</div>
			</div> <!-- /step4 elems -->
		</div> <!-- step4 -->
		<div class="step step5">
			<div class="step5-info step-info">
				<span class="stepNum">4</span><h3>ANY DISCOUNT ?</h3>
				<div class="desc">Any Corporate or Association Discount ?</div>
				<div class="arr_a"></div>
			</div> <!-- /step5 info -->
		
			<div class="step5-elems step-elems">
				<div class="step-elems-inner">
			
					<div class="destProviderWrapper">
					<label for="destProvider">Select your Destination Provider :</label>
						<select name="destProvider" id="destProvider">
						<option value="0" selected="selected">--------------------------------------</option>
						<option value="1">Destination Provider 1</option>
						<option value="2">Destination Provider 2</option>
						<option value="3">Destination Provider 3</option>
						</select>
					</div>	
				</div>		
			</div> <!-- /step5 elems -->
		</div> <!-- step5 -->
         <div class="advOpWrapper">
			
		    <div class="button-wrapper">
		        <div><button value="Search" type="submit" class="fsubmit last">SEARCH</button></div>
		    </div>
		</div>
        </form>
        <form action="form_action.php" method="get" id="search-home-form-4" class="bookingForm">
       		<div class="step step2">
			<div class="step2-info step-info">
				<span class="stepNum">2</span><h3>FIND CRUISES, SHIPS AND DEALS</h3>
				<div class="desc">Choose a destination, dates port and cruise line</div>
				<div class="arr_a"></div>
			</div> <!-- /step2 info -->
		
			<div class="step2-elems step-elems">
				<div class="step-elems-inner">
                <div class="input-big first">
				    <label for="shipDest">Destination :</label>
				    <select id="shipDest" name="shipDest">
                    <option value="All" selected="selected">Any Destination</option>
                    <option value="1">Country 1</option>
                    <option value="2">Country 2</option>
                    <option value="3">Country 3</option>
                    <option value="4">Country 4</option>
                    <option value="5">Country 5</option>  
                    </select>
				</div>
				<div class="input-2-small">
					<div class="left">
				    <label for="cruiseLength">Length of Cruise :</label>
				    <select id="cruiseLength" name="cruiseLength">
                    <option value="All" selected="selected">Length</option>
                    <option value="5">5 days</option>
                    <option value="6">6 days</option>
                    <option value="1">1 week</option>
                    <option value="2">2 weeks</option> 
                    </select>
                    </div>
                    <div class="right">
                    <label for="cruiseMonth">Month :</label>
				    <select id="cruiseMonth" name="cruiseMonth">
                    <option value="All" selected="selected">Any</option>
                    <option value="1">April</option>
                    <option value="2">May</option>
                    <option value="3">June</option>
                    <option value="4">Jully</option>
                    <option value="5">August</option>  
                    </select>
                    </div>
				</div>
                 <div class="input-big sec">
				    <label for="cruiseDepart">Cruise Departure Port :</label>
				    <select id="cruiseDepart" name="cruiseDepart">
                    <option value="All" selected="selected">Any departure port</option>
                    <option value="1">port 1</option>
                    <option value="2">port 2</option>
                    <option value="3">port 3</option>
                    <option value="4">port 4</option>
                    <option value="5">port 5</option>  
                    </select>
				</div>
                 <div class="input-big last">
				    <label  for="cruiseLine">Cruise Line :</label>
				    <select id="cruiseLine" name="cruiseLine">
                    <option value="All" selected="selected">Any cruise lines</option>
                    <option value="1">Cruise Line 1</option>
                    <option value="2">Cruise Line 2</option>
                    <option value="3">Cruise Line 3</option>
                    <option value="4">Cruise Line 4</option>
                    <option value="5">Cruise Line 5</option>  
                    </select>
				</div>
			    
				</div>
			</div> <!-- /step2 elems -->
		</div> <!-- step2 -->
				
		
		<div class="step step4">
			<div class="step4-info step-info">
				<span class="stepNum">3</span><h3>CHECK ELIGIBILITY FOR SPECIAL DISCOUNTS</h3>
				<div class="desc">Select where do you live and check if you have any special discount</div>
				<div class="arr_a"></div>
			</div> <!-- /step4 info -->	
			<div class="step4-elems step-elems">
			<div class="step-elems-inner">
				<div class="input-big">
				    <label for="discByLive">Where do you live? :</label>
				    <select id="discByLive" name="discByLive">
                    <option value="0" selected="selected">State / Province</option>
                    <option value="1">Country 1</option>
                    <option value="2">Country 2</option>
                    <option value="3">Country 3</option>
                    <option value="4">Country 4</option>
                    <option value="5">Country 5</option>  
                    </select>
				</div>
                <div class="checkBoxWrapper">
                	<div class="check check-1"><input name="elderCruise" id="elderCruise" type="checkbox" value="1" /><label class="blueLab" for="elderCruise">55 years of age or Older ?</label></div>
                    <div class="check check-2"><input name="militaryCruise" id="militaryCruise" type="checkbox" value="1" /><label class="blueLab" for="militaryCruise">Have you served in the Military ?</label></div>
                    <div class="check check-3"><input name="reCruise" id="reCruise" type="checkbox" value="1" /><label class="blueLab" for="reCruise">Have you taken a Cruise before ?</label></div>
                    
                </div>
				</div> 
			</div> <!-- /step4 elems -->
         
		</div> <!-- step4 -->
        <div class="button-wrapper">
            <div><button value="Search" type="submit" class="fsubmit last">SEARCH</button></div>
        </div>
      
	</form>
		
		<div class="bottomFormRadius"></div>
	</div> <!-- /frontForm -->
	<div id="leftTopFront">
		
	</div><!-- /leftTopFront -->
</div><!-- /topFrontWrapper --><div id="right-col" class="home-right-col">


 

    <div class="home-left-static-banner banner-ad">
        <a href="#"><img title="london" alt="london" src="images/homepage-right-ad-banner.jpg" /></a>
        <a href="#"><img title="london" alt="london" src="images/homepage-right-ad-banner.jpg" /></a>
        <a href="#"><img title="london" alt="london" src="images/homepage-right-ad-banner.jpg" /></a>
        <a href="#"><img title="london" alt="london" src="images/homepage-right-ad-banner.jpg" /></a>
    </div>




<div class="travel-deals">
        <h3>TRAVEL DEALS</h3>
        <a href="#">View All Deals</a>
        
        
        <div class="smaller-banner travel-deals-banner">
			<div class="left-image"></div>
			<a href="#">
				<span class="top-header">YOUR TIME IS RUNNING OUT</span>
				<span class="med-header">GRAB THE DEAL</span>
			</a>
			<span class="hours-only">12 hours only</span>
		</div>
		
        
        
        <div class="deals-wrapper" style="position: relative; width: 372px; height: 199px;">
            <div class="deal" style="position: absolute; top: 0px; left: 0px; display: block; z-index: 4; opacity: 1;">
                <div class="deal-header">
                    <div class="deal-price">€ 1.675</div>
                    <div class="deal-main-title">Οmni Bedford Springs I</div>
                    <div class="deal-secondary-title">Allegheny Mountains</div>
                </div>
                <div class="deal-image">
                    <img width="371" height="173" title="deals" alt="deals" src="images/deals.png" />
                </div>
                <div class="deal-countdown">
                    <span class="time">
                        <span class="hours">09</span>
                        <span class="hours-label">ώρες</span>
                    </span>
                    <span class="time">
                        <span class="minutes">33</span>
                        <span class="minutes-label">λεπτ.</span>
                    </span>
                    <span class="time">
                        <span class="seconds">00</span>
                        <span class="seconds-label">δεύτ.</span>
                    </span>
                </div>
                <div class="buynow">
                    <a href="#">Aγόρασέ Το !</a>
                </div>
            </div><!-- .deal -->
            <div class="deal" style="position: absolute; top: 0px; left: 0px; display: none; z-index: 2; opacity: 0;">
                <div class="deal-header">
                    <div class="deal-price">€ 1.675</div>
                    <div class="deal-main-title">Οmni Bedford Springs II</div>
                    <div class="deal-secondary-title">Allegheny Mountains</div>
                </div>
                <div class="deal-image">
                    <img width="371" height="173" title="deals" alt="deals" src="images/deals.png" />
                </div>
                <div class="deal-countdown">
                    <span class="time">
                        <span class="hours">09</span>
                        <span class="hours-label">ώρες</span>
                    </span>
                    <span class="time">
                        <span class="minutes">33</span>
                        <span class="minutes-label">λεπτ.</span>
                    </span>
                    <span class="time">
                        <span class="seconds">00</span>
                        <span class="seconds-label">δεύτ.</span>
                    </span>
                </div>
                <div class="buynow">
                    <a href="#">Aγόρασέ Το !</a>
                </div>
            </div><!-- .deal -->
            <div class="deal" style="position: absolute; top: 0px; left: 0px; display: none; z-index: 1; opacity: 0;">
                <div class="deal-header">
                    <div class="deal-price">€ 1.675</div>
                    <div class="deal-main-title">Οmni Bedford Springs III</div>
                    <div class="deal-secondary-title">Allegheny Mountains</div>
                </div>
                <div class="deal-image">
                    <img width="371" height="173" title="deals" alt="deals" src="images/deals.png" />
                </div>
                <div class="deal-countdown">
                    <span class="time">
                        <span class="hours">09</span>
                        <span class="hours-label">ώρες</span>
                    </span>
                    <span class="time">
                        <span class="minutes">33</span>
                        <span class="minutes-label">λεπτ.</span>
                    </span>
                    <span class="time">
                        <span class="seconds">00</span>
                        <span class="seconds-label">δεύτ.</span>
                    </span>
                </div>
                <div class="buynow">
                    <a href="#">Aγόρασέ Το !</a>
                </div>
            </div><!-- .deal -->
           
        </div><!-- .deals-wrapper -->
    </div>



<!-- deal-alerts -->
<!--
	<div class="deal-alerts">
            <div class="alert-label">
                <span class="blue">SIGN UP FOR</span>
                <span class="orange">DEAL ALERTS</span>
            </div>
            <div class="advanced-container"><a href="#">advanced</a></div>
            <div class="alert-content">
                <form action="form_action.php" method="get">
                    <div>
                        <div class="form-components">
                            <div><input type="text" name="alertsignin" id="alert" value="type your email in here"/></div>
                        </div>
                        <div class="button-wrapper">
                            <div><input type="submit" value="" /></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        -->
<!-- .deal-alerts -->


</div><div id="homecontent-bottom">

<div class="home-boxes" id="top-boxes"><!--begin home-top-boxes-->
	<div class="smaller-banner has-left-image have-question">
		<div class="left-image"></div>
		<a href="#">
			<span class="top-header">HAVE A QUESTION ?</span>
			<span class="med-header">CALL US</span>
			<span class="bottom-header">210 27 18127</span>
		</a>
	</div> 
	<div class="smaller-banner has-left-image arrow guarantee">
		<div class="left-image"></div>
		<a href="#">
			<span class="top-header">GUARANTEE</span>
			<!-- <span class="med-header">CALL US</span> --> 
			<span class="bottom-content">We'll match the price and give you $50 toward future</span>
		</a>
	</div>
	<!-- <div class="left-banner small-banner has-left-image package plus">
		<div class="left-image"></div>
		<a href="#">
			<span class="top-header blue">CREATE YOUR</span>
			<span class="med-header">OWN PACKAGE</span>
			<span class="bottom-content">Read more to learn how</span>
		</a>
	</div> -->	
    	
    <!-- deal-alerts -->
	<div class="deal-alerts">
        <div class="alert-label">
            <span class="blue">SIGN UP FOR</span>
            <span class="orange">DEAL ALERTS</span>
        </div>
        <div class="advanced-container"><a href="#">advanced</a></div>
        <div class="alert-content">
            <form action="form_action.php" method="get">
                <div>
                    <div class="form-components">
                        <div><input type="text" name="alertsignin" id="alert" value="type your email in here"/></div>
                    </div>
                    <div class="button-wrapper">
                        <div><input type="submit" value="" /></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- .deal-alerts -->

</div><!--END home-top-boxes-->



	<div id="tabs-home-top" class="globaltabs tabs-long ">  <!-- long tabs -->
    
   		<ul>
          <li class="flights-live small"><a href="#flights-live">FLIGHTS</a></li>
          <li class=" small"><a href="#hot-price">HOTELS</a></li>
          <li class=" med"><a href="#hot-price-weekend">PACKAGES</a></li>
          <li class="small"><a href="#home-cruises">CRUISES</a></li>
  		 </ul>
         
   		<div id="flights-live"><!--begin flights-live -->
        	<div class="ui-tabs-panel-top"></div>
            <div class="ui-tabs-panel-center">
                <div class="ui-tabs-panel-center-left">
                
                </div>
                <div class="ui-tabs-panel-center-right">
                    <ul>
                        <li><a href="#">Θεσσαλονίκη - Αθήνα <span class="price">από 43€</span></a></li>
                        <li><a href="#">Θεσσαλονίκη - Αθήνα <span class="price">από 43€</span></a></li>
                        <li><a href="#">Θεσσαλονίκη - Αθήνα <span class="price">από 43€</span></a></li>
                        <li><a href="#">Θεσσαλονίκη - Αθήνα <span class="price">από 43€</span></a></li>
                        <li><a href="#">Θεσσαλονίκη - Αθήνα <span class="price">από 43€</span></a></li>
                        <li><a href="#">Θεσσαλονίκη - Αθήνα <span class="price">από 43€</span></a></li>
                        <li><a href="#">Θεσσαλονίκη - Αθήνα <span class="price">από 43€</span></a></li>
                        <li><a href="#">Θεσσαλονίκη - Αθήνα <span class="price">από 43€</span></a></li>
                        <li><a href="#">Θεσσαλονίκη - Αθήνα <span class="price">από 43€</span></a></li>
                        <li><a href="#">Θεσσαλονίκη - Αθήνα <span class="price">από 43€</span></a></li>
                        <li><a href="#">Θεσσαλονίκη - Αθήνα <span class="price">από 43€</span></a></li>
                        <li><a href="#">Θεσσαλονίκη - Αθήνα <span class="price">από 43€</span></a></li>
                        <li><a href="#">Θεσσαλονίκη - Αθήνα <span class="price">από 43€</span></a></li>
                        <li><a href="#">Θεσσαλονίκη - Αθήνα <span class="price">από 43€</span></a></li>
                        <li><a href="#">Θεσσαλονίκη - Αθήνα <span class="price">από 43€</span></a></li>
                        <li><a href="#">Θεσσαλονίκη - Αθήνα <span class="price">από 43€</span></a></li>

                       
                    </ul>
                </div> 
            </div>      
            <div class="ui-tabs-panel-bottom"></div>     
        </div> <!--end flights-live -->
        
        <div id="hot-price">
        	<div class="ui-tabs-panel-top"></div>
            <div class="ui-tabs-panel-center">
                <div class="ui-tabs-panel-center-left">
                
                </div>
                <div class="ui-tabs-panel-center-right">
                    <ul>
                        <li><a href="#">Θεσσαλονίκη - Μιλάνο <span class="price">από 43€</span></a></li>
                        <li><a href="#">Θεσσαλονίκη - Μιλάνο <span class="price">από 43€</span></a></li>
                        <li><a href="#">Θεσσαλονίκη - Μιλάνο <span class="price">από 43€</span></a></li>
                        <li><a href="#">Θεσσαλονίκη - Μιλάνο <span class="price">από 43€</span></a></li>
                        <li><a href="#">Θεσσαλονίκη - Μιλάνο <span class="price">από 43€</span></a></li>
                        <li><a href="#">Θεσσαλονίκη - Μιλάνο <span class="price">από 43€</span></a></li>
                        <li><a href="#">Θεσσαλονίκη - Μιλάνο <span class="price">από 43€</span></a></li>
                        <li><a href="#">Θεσσαλονίκη - Μιλάνο <span class="price">από 43€</span></a></li>
                        <li><a href="#">Θεσσαλονίκη - Μιλάνο <span class="price">από 43€</span></a></li>
                        <li><a href="#">Θεσσαλονίκη - Μιλάνο <span class="price">από 43€</span></a></li>
                        <li><a href="#">Θεσσαλονίκη - Μιλάνο <span class="price">από 43€</span></a></li>
                        <li><a href="#">Θεσσαλονίκη - Μιλάνο <span class="price">από 43€</span></a></li>
                    </ul>
                </div> 
            </div>     
            <div class="ui-tabs-panel-bottom"></div>   
        </div>
        
       <div id="hot-price-weekend">
        	<div class="ui-tabs-panel-top"></div>
            <div class="ui-tabs-panel-center">
                <div class="ui-tabs-panel-center-left">
                
                </div>
                <div class="ui-tabs-panel-center-right">
                    <ul>
                        <li><a href="#">Αθήνα - Μιλάνο <span class="price">από 43€</span></a></li>
                        <li><a href="#">Αθήνα - Μιλάνο <span class="price">από 43€</span></a></li>
                        <li><a href="#">Αθήνα - Μιλάνο <span class="price">από 43€</span></a></li>
                        <li><a href="#">Αθήνα - Μιλάνο <span class="price">από 43€</span></a></li>
                        <li><a href="#">Αθήνα - Μιλάνο <span class="price">από 43€</span></a></li>
                        <li><a href="#">Αθήνα - Μιλάνο <span class="price">από 43€</span></a></li>
                        <li><a href="#">Αθήνα - Μιλάνο <span class="price">από 43€</span></a></li>
                        <li><a href="#">Αθήνα - Μιλάνο <span class="price">από 43€</span></a></li>
                        <li><a href="#">Αθήνα - Μιλάνο <span class="price">από 43€</span></a></li>
                        <li><a href="#">Αθήνα - Μιλάνο <span class="price">από 43€</span></a></li>
                        <li><a href="#">Αθήνα - Μιλάνο <span class="price">από 43€</span></a></li>
                        <li><a href="#">Αθήνα - Μιλάνο <span class="price">από 43€</span></a></li>
                    </ul>
                </div> 
            </div>      
            <div class="ui-tabs-panel-bottom"></div>   
        </div>
       <div id="home-cruises">
        	<div class="ui-tabs-panel-top"></div>
            <div class="ui-tabs-panel-center">
                <div class="ui-tabs-panel-center-left">
                
                </div>
                <div class="ui-tabs-panel-center-right">
                    <ul>
                        <li><a href="#">Αθήνα - Μιλάνο <span class="price">από 43€</span></a></li>
                        <li><a href="#">Αθήνα - Μιλάνο <span class="price">από 43€</span></a></li>
                        <li><a href="#">Αθήνα - Μιλάνο <span class="price">από 43€</span></a></li>
                        <li><a href="#">Αθήνα - Μιλάνο <span class="price">από 43€</span></a></li>
                        <li><a href="#">Αθήνα - Μιλάνο <span class="price">από 43€</span></a></li>
                        <li><a href="#">Αθήνα - Μιλάνο <span class="price">από 43€</span></a></li>
                        <li><a href="#">Αθήνα - Μιλάνο <span class="price">από 43€</span></a></li>
                        <li><a href="#">Αθήνα - Μιλάνο <span class="price">από 43€</span></a></li>
                        <li><a href="#">Αθήνα - Μιλάνο <span class="price">από 43€</span></a></li>
                        <li><a href="#">Αθήνα - Μιλάνο <span class="price">από 43€</span></a></li>
                        <li><a href="#">Αθήνα - Μιλάνο <span class="price">από 43€</span></a></li>
                        <li><a href="#">Αθήνα - Μιλάνο <span class="price">από 43€</span></a></li>
                    </ul>
                </div> 
            </div>      
            <div class="ui-tabs-panel-bottom"></div>   
        </div>     
        <div class="tabs-banner"><img src="images/banner1.jpg" alt="banner" /></div>
    </div><!-- END long tabs -->

	<div class="home-boxes"  id="bottom-boxes"><!--begin home-top-boxes-->
		<div class="smaller-banner has-left-image why-book have-question">
			<div class="left-image"></div>
			<a href="#">
				<span class="top-header">WHY BOOK</span>
				<span class="med-header">WITH US</span>
				<span class="bottom-content">Read more to learn how</span>
			</a>
		</div>
		<div class="smaller-banner has-left-image arrow have-question reward">
			<div class="left-image"></div>
			<a href="#">
				<span class="top-header">REWARD</span>
				<span class="med-header">POINTS</span>
				<span class="bottom-content">Read more to learn how</span>
			</a>
		</div>
		
		<div class="left-banner small-banner box-animate has-left-image package plus tools">
				<div class="top modal-box">
				<div class="modal-box-top-layer"></div>
				<div class="modal-box-content list-table">
					<div class="inline-table">
						<div class="top-layer"></div>
						<div class="center-layer">
							<ul>
								<li class="row"><a href="#" class="item left-col">Flights PNR Status</a><a href="#" class="item right-col">Online Check-in</a></li>
								<li class="row"><a href="#" class="item left-col">Flignt Status</a><a href="#" class="item right-col">Reservation Manager</a></li>
								<li class="row"><a href="#" class="item left-col">Hotels - Travel Guides</a><a href="#" class="item right-col">Reservation Manager</a></li>
								<li class="row"><a href="#" class="item left-col">Passport & Visa</a><a href="#" class="item right-col">Destination Guide</a></li>
								<li class="row"><a href="#" class="item left-col">Destination Videos</a><a href="#" class="item right-col">Baggage Handing</a></li>
							</ul>
						</div>
						<div class="bottom-layer"></div>
					</div>
				</div>
			</div>
	
			<div class="content">
				<div class="left-image"></div>
				<a href="#">
					<span class="top-header blue">ALL ABOUT OUR</span>
					<span class="med-header">TRAVEL TOOLS</span>
					<span class="bottom-content">Read more to learn how</span>
				</a>
				<div class="plus-icon"></div>
			</div>
	</div>

	</div><!--END home-top-boxes--> 

    <div id="home-bottom-packages" > <!--begin homepackages-->
    	<div class="home-bottom-packages-top"></div>
        <div class="home-bottom-packages-center jcarouzel-wrapper">
          <div class="flights-top-destinations-title">ΠΡΟΤΑΣΕΙΣ ΠΑΚΕΤΩΝ</div>
          <div class="flights-top-destinations-viewall"><a href="#">View All Packages</a></div>
          <ul id="top-destinations-carouzel1" class="globaljcarousel">
            <li>     
                <span class="top-image">
                <img src="images/carItem.jpg" alt="" />
                </span>
                <span class="top-book-now">BOOK NOW</span>
                <span class="top-title"><a href="#">KENYA</a></span>
                <span class="top-save">Save up to 35%</span>
                <span class="top-price">€ 1.675</span>
            </li>
            <li>     
                <span class="top-image">
                <img src="images/carItem.jpg" alt="" />
                </span>
                <span class="top-book-now">BOOK NOW</span>
                <span class="top-title"><a href="#">MEXICO</a></span>
                <span class="top-save">Save up to 45%</span>
                <span class="top-price">€ 1.005</span>
            </li>   
            <li>     
                <span class="top-image">
                <img src="images/carItem.jpg" alt="" />
                </span>
                <span class="top-book-now">BOOK NOW</span>
                <span class="top-title"><a href="#">PEROU</a></span>
                <span class="top-save">Save up to 55%</span>
                <span class="top-price">€ 2.675</span>
            </li>   
            <li>     
                <span class="top-image">
                <img src="images/carItem.jpg" alt="" />
                </span>
                <span class="top-book-now">BOOK NOW</span>
                <span class="top-title"><a href="#">KENYA</a></span>
                <span class="top-save">Save up to 35%</span>
                <span class="top-price">€ 1.675</span>
            </li>
            <li>     
                <span class="top-image">
                <img src="images/carItem.jpg" alt="" />
                </span>
                <span class="top-book-now">BOOK NOW</span>
                <span class="top-title"><a href="#">MEXICO</a></span>
                <span class="top-save">Save up to 45%</span>
                <span class="top-price">€ 1.005</span>
            </li>   
            <li>     
                <span class="top-image">
                <img src="images/carItem.jpg" alt="" />
                </span>
                <span class="top-book-now">BOOK NOW</span>
                <span class="top-title"><a href="#">PEROU</a></span>
                <span class="top-save">Save up to 55%</span>
                <span class="top-price">€ 2.675</span>
            </li>                    
         </ul>
     	</div>
    	<div class="flights-top-destinations-bottom"></div>
    </div> <!--end homepackages -->    
    
    
</div>            </div><!-- #content -->
        </div><!-- #outer-content -->
<div id="outer-footer">
    <div id="footer">
        <div class="footer-banner-region">
        	<div class="footer-left-top-banner">
            	<img src="images/footer-left-banner.jpg" width="728" height="90" alt="Book Now" title="Book Now" />
            </div>
            <div class="footer-right-top-banner">
            	<img src="images/lufthansa.jpg" width="280" height="90" alt="lufthansa" title="lufthansa" />
            </div>
        </div><!-- .footer-banner-region -->
        
        <div class="footer-main-menu">
        	<ul>
            	<li class="first "><a href="#">Flights</a></li>
                <li class=""><a href="#">Hotels</a></li>
                <li class=""><a href="#">Car Rental</a></li>
                <li><a href="#">Flights &amp; Hotels</a></li>
                <li><a href="#">Packages</a></li>
                <li><a href="#">Hostels</a></li>
                <li><a href="#">Cruises</a></li>
                <li class="last"><a href="#">Activities</a></li>
            </ul>
        </div><!-- .footer-main-menu -->
        
        <div class="footer-newsletter">
        	<form action="form_action.php" method="get">
                <div>
                	<div class="form-components">
                    	<div><label for="newsletter">Newsletter Sign Up</label></div>
                        <div><input type="text" name="newsltr" id="newsletter" value="type your email in here"/></div>
                    </div>
                    <div class="button-wrapper">
                        <div><input type="submit" value="" /></div>
                    </div>
                </div>
            </form>
        </div><!-- .footer-newsletter -->
        
        <div class="footer-languages">
        	<div class="lang-label">International Sites :</div>
            <div class="lang-flags">
            	<ul>
                	<li class="am"><a href="http://www.airfasttickets.com">www.airfasttickets.com</a></li>
                    <li class="en"><a href="http://www.airfasttickets.co.uk">www.airfasttickets.co.uk</a></li>
                    <li class="de"><a href="http://www.airfasttickets.de">www.airfasttickets.de</a></li>
                    <li class="gr"><a href="http://www.airfasttickets.gr">www.airfasttickets.gr</a></li>
                    <li class="fr"><a href="http://www.airfasttickets.fr">www.airfasttickets.fr</a></li>
                    <li class="tu"><a href="http://www.airfasttickets.net">www.airfasttickets.net</a></li>
                    <li class="it"><a href="http://www.airfasttickets.it">www.airfasttickets.it</a></li>
                    <li class="oth"><a href="#">other</a></li>
                </ul>
            </div>
        </div><!-- .footer-languages -->
        
        <div class="footer-log-menu">
            <ul>
                <li class="first"><a href="#">Partner Login</a></li>
                <li><a href="#">Become a Partner</a></li>
                <li class="last"><a href="#">Affiliate Programm</a></li>
            </ul>
        </div><!-- .footer-log-menu -->

        <div class="footer-site-menu">
            <ul>
                <li class="first"><a href="#">Feedback</a></li>
                <li><a href="#">Transaction Safety</a></li>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Terms &amp; Condition</a></li>
                <li class="last"><a href="#">Sitemap</a></li>
            </ul>
        </div><!-- .footer-site-menu -->
        
        <div class="footer-gs">
        	<div class="footer-gs-left">&copy; 2012 Airfast Tickets | All rights preserved</div>
 
       </div><!-- .footer-gs -->
        
        
        
    </div><!-- #footer -->
</div><!-- #outer-footer -->


</body>
</html>