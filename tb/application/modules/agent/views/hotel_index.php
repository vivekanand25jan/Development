<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style >
.jcarousel-skin-tango .jcarousel-container {
  
}

.jcarousel-skin-tango .jcarousel-direction-rtl {
	direction: rtl;
}

.jcarousel-skin-tango .jcarousel-container-horizontal {
    width: 645px; border:1px solid red;
    padding: 20px 40px;
}

.jcarousel-skin-tango .jcarousel-container-vertical {
    width: 75px;
    height: 245px;
    padding: 40px 20px;
}

.jcarousel-skin-tango .jcarousel-clip {
    overflow: hidden;
}

.jcarousel-skin-tango .jcarousel-clip-horizontal {
    width:  245px;
    height: 75px;
}

.jcarousel-skin-tango .jcarousel-clip-vertical {
    width:  75px;
    height: 245px;
}

.jcarousel-skin-tango .jcarousel-item {
    width: 75px;
    height: 75px;
}

.jcarousel-skin-tango .jcarousel-item-horizontal {
	margin-left: 0;
    margin-right: 10px;
}

.jcarousel-skin-tango .jcarousel-direction-rtl .jcarousel-item-horizontal {
	margin-left: 10px;
    margin-right: 0;
}

.jcarousel-skin-tango .jcarousel-item-vertical {
    margin-bottom: 10px;
}

.jcarousel-skin-tango .jcarousel-item-placeholder {
    background: #fff;
    color: #000;
}

/**
 *  Horizontal Buttons
 */
.jcarousel-skin-tango .jcarousel-next-horizontal {
    position: absolute;
    top: 43px;
    right: 5px;
    width: 32px;
    height: 32px;
    cursor: pointer;
    background: transparent url(next-horizontal.png) no-repeat 0 0;
}

.jcarousel-skin-tango .jcarousel-direction-rtl .jcarousel-next-horizontal {
    left: 5px;
    right: auto;
    background-image: url(prev-horizontal.png);
}

.jcarousel-skin-tango .jcarousel-next-horizontal:hover,
.jcarousel-skin-tango .jcarousel-next-horizontal:focus {
    background-position: -32px 0;
}

.jcarousel-skin-tango .jcarousel-next-horizontal:active {
    background-position: -64px 0;
}

.jcarousel-skin-tango .jcarousel-next-disabled-horizontal,
.jcarousel-skin-tango .jcarousel-next-disabled-horizontal:hover,
.jcarousel-skin-tango .jcarousel-next-disabled-horizontal:focus,
.jcarousel-skin-tango .jcarousel-next-disabled-horizontal:active {
    cursor: default;
    background-position: -96px 0;
}

.jcarousel-skin-tango .jcarousel-prev-horizontal {
    position: absolute;
    top: 43px;
    left: 5px;
    width: 32px;
    height: 32px;
    cursor: pointer;
    background: transparent url(prev-horizontal.png) no-repeat 0 0;
}

.jcarousel-skin-tango .jcarousel-direction-rtl .jcarousel-prev-horizontal {
    left: auto;
    right: 5px;
    background-image: url(next-horizontal.png);
}

.jcarousel-skin-tango .jcarousel-prev-horizontal:hover, 
.jcarousel-skin-tango .jcarousel-prev-horizontal:focus {
    background-position: -32px 0;
}

.jcarousel-skin-tango .jcarousel-prev-horizontal:active {
    background-position: -64px 0;
}

.jcarousel-skin-tango .jcarousel-prev-disabled-horizontal,
.jcarousel-skin-tango .jcarousel-prev-disabled-horizontal:hover,
.jcarousel-skin-tango .jcarousel-prev-disabled-horizontal:focus,
.jcarousel-skin-tango .jcarousel-prev-disabled-horizontal:active {
    cursor: default;
    background-position: -96px 0;
}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Docume	nt</title>
<link href="<?php echo WEB_DIR; ?>css/postion.css" rel="stylesheet" type="text/css" />
 <script type="text/javascript" src="<?php print WEB_DIR; ?>script/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="<?php print WEB_DIR; ?>script/jquery.jcarousel.min.js"></script>
  
  

  
  
</head>

<body>
<div id="main_continer">
  <div class="header"> <?php echo $this->load->view('header'); ?>
    <div class="banner"><img src="<?php echo WEB_DIR ?>images/banner.jpg" width="979" height="402" /></div>
    <div class="search_box">
      <div class="search_box_top"></div>
      <form action="<?php echo WEB_URL; ?>hotel/search" method="post">
        <div class="search_box_middile">
          <h1>SEARCH HOTELS</h1>
          <script type="text/javascript" src="<?php print WEB_DIR; ?>autofill/js/bsn.AutoSuggest_c_2.0.js"></script>
          <link rel="stylesheet" href="<?php print WEB_DIR; ?>autofill/css/autosuggest_inquisitor.css" type="text/css" media="screen" charset="utf-8" />
          <div class="destin">
            <p> DESTINATION</p>
            <P>
              <input type="hidden" id="testid" value="" style="font-size: 10px; width: 20px;" disabled="disabled" />
              <input type="text" name="cityval" id="testinput" class="TEX_style" />
              <span><font color="#990000"><strong><?php echo form_error('cityval'); ?></strong></font></span>
              <script type="text/javascript">
	var options = {
		script:"<?php print WEB_DIR; ?>test_hotel.php?json=true&",varname:"input",json:true,callback: function (obj) { document.getElementById('testid').value = obj.id; } };
	var as_json = new AutoSuggest('testinput', options);

</script> 
            </P>
          </div>
          <div class="check_covers">
            <div class="check_139">
              <p>CHECK IN</p>
              <p>
                <link rel="stylesheet" href="<?php echo WEB_DIR; ?>datepickernew/themes/base/jquery.ui.all.css">
                <script src="<?php echo WEB_DIR; ?>datepickernew/jquery-1.7.2.js"></script> 
                <script src="<?php echo WEB_DIR; ?>datepickernew/ui/jquery.ui.core.js"></script> 
                <script src="<?php echo WEB_DIR; ?>datepickernew/ui/jquery.ui.widget.js"></script> 
                <script src="<?php echo WEB_DIR; ?>datepickernew/ui/jquery.ui.datepicker.js"></script>
                <link rel="stylesheet" href="<?php echo WEB_DIR; ?>datepickernew/demos.css">
                <script>
	 function zeroPad(num,count)
{
	var numZeropad = num + '';
	while(numZeropad.length < count) {
	numZeropad = "0" + numZeropad;
	}
	return numZeropad;
}
 function dateADD(currentDate)
{
 var valueofcurrentDate=currentDate.valueOf()+(24*60*60*1000);
 var newDate =new Date(valueofcurrentDate);
 return newDate;
}

	$(function() {
		$( "#datepicker" ).datepicker({
			numberOfMonths: 3,
			dateFormat: 'dd-mm-yy',
			
			minDate: 0
		  
		});
		 $('#datepicker').change(function(){
		   //$t=$(this).val();
		  // alert($t);
		   var selectedDate = $(this).datepicker('getDate');
		   var nextdayDate  = dateADD(selectedDate);
		   var nextDateStr = zeroPad(nextdayDate.getDate(),2)+"-"+zeroPad((nextdayDate.getMonth()+1),2)+"-"+(nextdayDate.getFullYear());

		   $t = nextDateStr;
					$( "#datepicker1" ).datepicker({


						numberOfMonths: 3,
						minDate: $t,
						
						dateFormat : 'dd-mm-yy'
					});
		   $( "#datepicker1" ).val($t);
		  });
		  
		$( "#anim" ).change(function() {
			$( "#datepicker" ).datepicker( "option", "showAnim", $( this ).val() );
		});
	});
	function hide_child1(adult)
{


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
   		 document.getElementById("inputfiled1_1").innerHTML=xmlhttp.responseText;
    }
  }
  	if(adult==1)
	{
		 document.getElementById('inputfiled1_1').style.display='block'; 
		  document.getElementById('child_header').style.display='block'; 
		    document.getElementById('age1').style.display='none'; 
			  document.getElementById('age12').style.display='none'; 
			    document.getElementById('age13').style.display='none'; 
		xmlhttp.open("GET","<?php print WEB_URL ?>hotel/child_dd_single/",true);
		xmlhttp.send();
	}
	else if(adult==2)
	{
		 document.getElementById('inputfiled1_1').style.display='block'; 
		  document.getElementById('child_header').style.display='block'; 
		  document.getElementById('age1').style.display='none'; 
			  document.getElementById('age12').style.display='none'; 
			    document.getElementById('age13').style.display='none'; 
		xmlhttp.open("GET","<?php print WEB_URL ?>hotel/child_dd_double/",true);
		xmlhttp.send();
	}
	else if(adult==3)
	{
		 document.getElementById('inputfiled1_1').style.display='block'; 
		  document.getElementById('child_header').style.display='block';
		  document.getElementById('age1').style.display='none'; 
			  document.getElementById('age12').style.display='none'; 
			    document.getElementById('age13').style.display='none';  
		xmlhttp.open("GET","<?php print WEB_URL ?>hotel/child_dd_triple/",true);
		xmlhttp.send();
	}
	else
	{
		 document.getElementById('inputfiled1_1').style.display='none'; 
		  document.getElementById('child_header').style.display='none'; 
		  document.getElementById('age1').style.display='none'; 
			  document.getElementById('age12').style.display='none'; 
			    document.getElementById('age13').style.display='none'; 
		
	}



}
function hide_child2(adult)
{


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
   		 document.getElementById("inputfiled1_2").innerHTML=xmlhttp.responseText;
    }
  }
  	if(adult==1)
	{
		 document.getElementById('inputfiled1_2').style.display='block'; 
		  document.getElementById('child_header2').style.display='block'; 
		  document.getElementById('age2').style.display='none'; 
			  document.getElementById('age22').style.display='none'; 
			    document.getElementById('age23').style.display='none'; 
		xmlhttp.open("GET","<?php print WEB_URL ?>hotel/child_dd_single/",true);
		xmlhttp.send();
	}
	else if(adult==2)
	{
		 document.getElementById('inputfiled1_2').style.display='block'; 
		  document.getElementById('child_header2').style.display='block'; 
		   document.getElementById('age2').style.display='none'; 
			  document.getElementById('age22').style.display='none'; 
			    document.getElementById('age23').style.display='none'; 
		xmlhttp.open("GET","<?php print WEB_URL ?>hotel/child_dd_double/",true);
		xmlhttp.send();
	}
	else if(adult==3)
	{
		 document.getElementById('inputfiled1_2').style.display='block'; 
		  document.getElementById('child_header2').style.display='block'; 
		   document.getElementById('age2').style.display='none'; 
			  document.getElementById('age22').style.display='none'; 
			    document.getElementById('age23').style.display='none'; 
		xmlhttp.open("GET","<?php print WEB_URL ?>hotel/child_dd_triple/",true);
		xmlhttp.send();
	}
	else
	{
		 document.getElementById('inputfiled1_2').style.display='none'; 
		  document.getElementById('child_header2').style.display='none'; 
		   document.getElementById('age2').style.display='none'; 
			  document.getElementById('age22').style.display='none'; 
			    document.getElementById('age23').style.display='none'; 
		
	}



}
function hide_child3(adult)
{


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
   		 document.getElementById("inputfiled1_3").innerHTML=xmlhttp.responseText;
    }
  }
  	if(adult==1)
	{
		 document.getElementById('inputfiled1_3').style.display='block'; 
		  document.getElementById('child_header3').style.display='block'; 
		   document.getElementById('age3').style.display='none'; 
			  document.getElementById('age32').style.display='none'; 
			    document.getElementById('age33').style.display='none'; 
		xmlhttp.open("GET","<?php print WEB_URL ?>hotel/child_dd_single/",true);
		xmlhttp.send();
	}
	else if(adult==2)
	{
		 document.getElementById('inputfiled1_3').style.display='block'; 
		  document.getElementById('child_header3').style.display='block';
		  	   document.getElementById('age3').style.display='none'; 
			  document.getElementById('age32').style.display='none'; 
			    document.getElementById('age33').style.display='none';  
		xmlhttp.open("GET","<?php print WEB_URL ?>hotel/child_dd_double/",true);
		xmlhttp.send();
	}
	else if(adult==3)
	{
		 document.getElementById('inputfiled1_3').style.display='block'; 
		  document.getElementById('child_header3').style.display='block'; 
		  	   document.getElementById('age3').style.display='none'; 
			  document.getElementById('age32').style.display='none'; 
			    document.getElementById('age33').style.display='none'; 
		xmlhttp.open("GET","<?php print WEB_URL ?>hotel/child_dd_triple/",true);
		xmlhttp.send();
	}
	else
	{
		 document.getElementById('inputfiled1_3').style.display='none'; 
		  document.getElementById('child_header3').style.display='none'; 
		  	   document.getElementById('age3').style.display='none'; 
			  document.getElementById('age32').style.display='none'; 
			    document.getElementById('age33').style.display='none'; 
		
	}



}
	</script>
                <?php

			$current_dte = date("d-m-Y",strtotime("+7 days"));
			$next_dte = date("d-m-Y",strtotime("+8 days"));
			?>
                <input  value="<?php echo $current_dte; ?>" name="sd" id="datepicker" class="CHECK_TX_BG" type="text" />
              </p>
            </div>
            <div class="check_139 ml17">
              <p>CHECK OUT</p>
              <p>
                <input  value="<?php echo $next_dte; ?>" name="ed" id="datepicker1" class="CHECK_TX_BG" type="text" />
              </p>
            </div>
          </div>
          <div class="check_cover">
            <div class="check_139">
              <p>ROOM</p>
              <p> <script type="text/javascript">
function display_adult_count(value)
{
	
if(value==1)
    {
       document.getElementById('room1').style.display='block'; 
       document.getElementById('room2').style.display='none'; 
       document.getElementById('room3').style.display='none'; 
    }
    if(value==2)
        {
		
        document.getElementById('room1').style.display='block'; 
       document.getElementById('room2').style.display='block'; 
       document.getElementById('room3').style.display='none';     
        }
        if(value==3)
            {
       document.getElementById('room1').style.display='block'; 
       document.getElementById('room2').style.display='block'; 
       document.getElementById('room3').style.display='block';     
                
            }
}

function display_child_count(value)
{

		if(value==1)
		{
		   document.getElementById('age1').style.display='block'; 
		   document.getElementById('age12').style.display='none'; 
		   document.getElementById('age13').style.display='none'; 
		   
		}
  		 if(value==2)
        {
		
       document.getElementById('age1').style.display='block'; 
       document.getElementById('age12').style.display='block'; 
	   document.getElementById('age13').style.display='none';   
        }
		 if(value==3)
        {
		
       document.getElementById('age1').style.display='block'; 
       document.getElementById('age12').style.display='block';  
	   document.getElementById('age13').style.display='block';  
        }
		 if(value==0)
        {
		
       document.getElementById('age1').style.display='none'; 
       document.getElementById('age12').style.display='none'; 
	   document.getElementById('age13').style.display='none';    
        }
      
}
function display_child_count1(value)
{

		if(value==1)
		{
		   document.getElementById('age2').style.display='block'; 
		   document.getElementById('age22').style.display='none'; 
		   document.getElementById('age23').style.display='none'; 
		   
		}
  		 if(value==2)
        {
		
       document.getElementById('age2').style.display='block'; 
       document.getElementById('age22').style.display='block'; 
	   document.getElementById('age23').style.display='none';   
        }
		 if(value==3)
        {
		
       document.getElementById('age2').style.display='block'; 
       document.getElementById('age22').style.display='block';  
	   document.getElementById('age23').style.display='block';  
        }
		 if(value==0)
        {
		
       document.getElementById('age2').style.display='none'; 
       document.getElementById('age22').style.display='none'; 
	   document.getElementById('age23').style.display='none';    
        }
      
}
function display_child_count2(value)
{

		if(value==1)
		{
		   document.getElementById('age3').style.display='block'; 
		   document.getElementById('age32').style.display='none'; 
		   document.getElementById('age33').style.display='none'; 
		   
		}
  		 if(value==2)
        {
		
       document.getElementById('age3').style.display='block'; 
       document.getElementById('age32').style.display='block'; 
	   document.getElementById('age33').style.display='none';   
        }
		 if(value==3)
        {
		
       document.getElementById('age3').style.display='block'; 
       document.getElementById('age32').style.display='block';  
	   document.getElementById('age33').style.display='block';  
        }
		 if(value==0)
        {
		
       document.getElementById('age3').style.display='none'; 
       document.getElementById('age32').style.display='none'; 
	   document.getElementById('age33').style.display='none';    
        }
      
}
 </script>
                <select name="room_count"   onChange="display_adult_count(this.value)" class="jump" >
                  <option value="1">Room 1</option>
                  <option value="2">Room 2</option>
                  <option value="3">Room 3</option>
                </select>
              </p>
            </div>
            <div class="check_139 ml17" id="room1">
              <DIV class="check_139" >
                <!--<div class="rooms_left"></div>-->
                <div class="wi40"  style="height: auto;">
                  <p>ADULT</p>
                  <p>
                    <select name="adult[]" id="jumpMenu2" onchange="hide_child1(this.value)"  class="jumb_25_for_new_1 pl5">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                    </select>
                  </p>
                </div>
                <div class="wi40 padding_le ml10">
                  <p id="child_header">CHILDREN</p>
                  <p>
                    <select name="child[]" id="inputfiled1_1"  class="jumb_25_for_new_1"  onChange="display_child_count(this.value)">
                      <option value="0">0</option>
                      <option value="1">1</option>
                      <option value="2">2</option> <option value="3">3</option>
                    </select>
                  </p>
                </div>
              </DIV>
              
              <DIV class="check_139" id="age1" style="display:none;">
                <div class="AGE_OF">AGE OF CHILD 1</div>
                <div class="wi40 padding_le">
                  <p></p>
                  <p>
                    <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1"  >
                    <?php for($i=1;$i< 13 ;$i++)
					{
                     echo '<option value="'.$i.'">'.$i.'</option>';
					}
					?>
                    </select>
                  </p>
                </div>
              </DIV>
              <DIV class="check_139"  id="age12"  style="display:none;">
                <div class="AGE_OF">AGE OF CHILD 2</div>
                <div class="wi40 padding_le">
                  <p></p>
                  <p>
                    <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
                     <?php for($i=1;$i< 13 ;$i++)
					{
                     echo '<option value="'.$i.'">'.$i.'</option>';
					}
					?>
                    </select>
                  </p>
                </div>
              </DIV>
              <DIV class="check_139"  id="age13"  style="display:none;">
                <div class="AGE_OF">AGE OF CHILD 3</div>
                <div class="wi40 padding_le">
                  <p></p>
                  <p>
                    <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
                     <?php for($i=1;$i< 13 ;$i++)
					{
                     echo '<option value="'.$i.'">'.$i.'</option>';
					}
					?>
                    </select>
                  </p>
                </div>
              </DIV>
            
              <!--<DIV class="check_139" style="display:none;">
                <div class="rooms_left"></div>
                <div class="wi40">
                  <p></p>
                  <p>
                    <select name="adult[]" id="jumpMenu2"  class="jumb_25_for_new pl5">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                    </select>
                  </p>
                </div>
                <div class="wi40 padding_le">
                  <p></p>
                  <p>
                    <select name="child[]" id="jumpMenu2"  class="jumb_25_for_new"  onChange="display_child_count(this.value)">
                      <option value="0">0</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                    </select>
                  </p>
                </div>
              </DIV>
              <DIV class="check_139" style="display:none;">
                <div class="rooms_left"></div>
                <div class="wi40">
                  <p></p>
                  <p>
                    <select name="adult[]" id="jumpMenu2" class="jumb_25_for_new pl5">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                    </select>
                  </p>
                </div>
                <div class="wi40 padding_le">
                  <p></p>
                  <p>
                    <select name="child[]" id="jumpMenu2"  class="jumb_25_for_new"  onChange="display_child_count(this.value)">
                      <option value="0">0</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                    </select>
                  </p>
                </div>
              </DIV>
              <DIV class="check_139" style="display:none;">
                <div class="rooms_left"></div>
                <div class="wi40">
                  <p></p>
                  <p>
                    <select name="adult[]" id="jumpMenu2"  class="jumb_25_for_new pl5">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                    </select>
                  </p>
                </div>
                <div class="wi40 padding_le">
                  <p></p>
                  <p>
                    <select name="child[]" id="jumpMenu2"  class="jumb_25_for_new"  onChange="display_child_count(this.value)">
                      <option value="0">0</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                    </select>
                  </p>
                </div>
              </DIV>-->
            </div>
          </div>
          <div class="check_139	 ml17" style="float:right; display:none; margin-right:25px" id="room2">
              <DIV class="check_139" >
                <!--<div class="rooms_left"></div>-->
                <div class="wi40"  style="height: auto;">
                  <p>ADULT</p>
                  <p>
                    <select name="adult[]" id="jumpMenu2" onchange="hide_child2(this.value)"  class="jumb_25_for_new_1 pl5">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                    </select>
                  </p>
                </div>
                <div class="wi40 padding_le ml10">
                  <p id="child_header2">CHILDREN</p>
                  <p>
                    <select name="child[]" id="inputfiled1_2"  class="jumb_25_for_new_1"  onChange="display_child_count1(this.value)">
                      <option value="0">0</option>
                      <option value="1">1</option>
                      <option value="2">2</option> <option value="3">3</option>
                    </select>
                  </p>
                </div>
              </DIV>
               <DIV class="check_139" id="age2" style="display:none;">
                <div class="AGE_OF">AGE OF CHILD 1</div>
                <div class="wi40 padding_le">
                  <p></p>
                  <p>
                    <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1"  >
                     <?php for($i=1;$i< 13 ;$i++)
					{
                     echo '<option value="'.$i.'">'.$i.'</option>';
					}
					?>
                    </select>
                  </p>
                </div>
              </DIV>
              <DIV class="check_139"  id="age22"  style="display:none;">
                <div class="AGE_OF">AGE OF CHILD 2</div>
                <div class="wi40 padding_le">
                  <p></p>
                  <p>
                    <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
                     <?php for($i=1;$i< 13 ;$i++)
					{
                     echo '<option value="'.$i.'">'.$i.'</option>';
					}
					?>
                    </select>
                  </p>
                </div>
              </DIV>
              <DIV class="check_139"  id="age23"  style="display:none;">
                <div class="AGE_OF">AGE OF CHILD 3</div>
                <div class="wi40 padding_le">
                  <p></p>
                  <p>
                    <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
                       <?php for($i=1;$i< 13 ;$i++)
					{
                     echo '<option value="'.$i.'">'.$i.'</option>';
					}
					?>
                    </select>
                  </p>
                </div>
              </DIV>
              
          </div>
          <div class="check_139	 ml17" style="float:right; display:none; margin-right:25px" id="room3">
              <DIV class="check_139" >
                <!--<div class="rooms_left"></div>-->
                <div class="wi40" style="height: auto;">
                  <p>ADULT</p>
                  <p>
                    <select name="adult[]" id="jumpMenu2" onchange="hide_child3(this.value)"  class="jumb_25_for_new_1 pl5">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                    </select>
                  </p>
                </div>
                <div class="wi40 padding_le ml10">
                  <p id="child_header3">CHILDREN</p>
                  <p>
                    <select name="child[]" id="inputfiled1_3"  class="jumb_25_for_new_1"  onChange="display_child_count2(this.value)">
                      <option value="0">0</option>
                      <option value="1">1</option>
                      <option value="2">2</option> <option value="3">3</option>
                    </select>
                  </p>
                </div>
              </DIV>
               <DIV class="check_139" id="age3" style="display:none;">
                <div class="AGE_OF">AGE OF CHILD 1</div>
                <div class="wi40 padding_le">
                  <p></p>
                  <p>
                    <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1"  >
                     <?php for($i=1;$i< 13 ;$i++)
					{
                     echo '<option value="'.$i.'">'.$i.'</option>';
					}
					?>
                    </select>
                  </p>
                </div>
              </DIV>
              <DIV class="check_139"  id="age32"  style="display:none;">
                <div class="AGE_OF">AGE OF CHILD 2</div>
                <div class="wi40 padding_le">
                  <p></p>
                  <p>
                    <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
                     <?php for($i=1;$i< 13 ;$i++)
					{
                     echo '<option value="'.$i.'">'.$i.'</option>';
					}
					?>
                    </select>
                  </p>
                </div>
              </DIV>
              <DIV class="check_139"  id="age33"  style="display:none;">
                <div class="AGE_OF">AGE OF CHILD 3</div>
                <div class="wi40 padding_le">
                  <p></p>
                  <p>
                    <select name="child_age[]" id="jumpMenu2"  class="jumb_25_for_new_1" >
                       <?php for($i=1;$i< 13 ;$i++)
					{
                     echo '<option value="'.$i.'">'.$i.'</option>';
					}
					?>
                    </select>
                  </p>
                </div>
              </DIV>
              
          </div>
        
          <div class="search_btn">
            <input type="image" src="<?php echo WEB_DIR ?>images/search_btn.jpg" width="200" height="34" />
          </div>
        </div>
      </form>
      <div class="SEARCH_BOTOOM"></div>
    </div>
    <div class="content_continer">
      <div class="sam_wi944">
        <div class="sub_heding_left_cover">
          <div class="sub_heding_cover">
            <div class="wi5_15"></div>
            <div class="wi600">POPULAR HOTEL PACKAGES</div>
          </div>
          <div class="place_pic_cover">
            <div class="place_pic"><img src="<?php echo WEB_DIR ?>images/palce01.jpg" width="110" height="138" /></div>
            <div class="place_pic"><img src="<?php echo WEB_DIR ?>images/palce02.jpg" width="110" height="138" /></div>
            <div class="place_pic"><img src="<?php echo WEB_DIR ?>images/palce03.jpg" width="110" height="138" /></div>
            <div class="place_pic"><img src="<?php echo WEB_DIR ?>images/palce04.jpg" width="110" height="138" /></div>
            <div class="place_pic"><img src="<?php echo WEB_DIR ?>images/palce05.jpg" width="110" height="138" /></div>
            <div class="place_pic"><img src="<?php echo WEB_DIR ?>images/palce06.jpg" width="110" height="138" /></div>
          </div>
          <div class="sub_heding_cover">
            <div class="wi5_15"></div>
            <div class="wi600">FEATURED TOURS</div>
          </div>
          <div class="wid645">
        
  

  		<div class="wi146_139 mtl_20"><img src="<?php echo WEB_DIR ?>images/london01.jpg" width="146 mtl_20" height="139" /></div>
          		<div class="wi146_139 mtl_20"><img src="<?php echo WEB_DIR ?>images/london01.jpg" width="146" height="139" /></div>
                  		<div class="wi146_139 mtl_20"><img src="<?php echo WEB_DIR ?>images/london01.jpg" width="146" height="139" /></div>
                          		<div class="wi146_139 mtl_10"><img src="<?php echo WEB_DIR ?>images/london01.jpg" width="146" height="139" /></div>


          </div>
        </div>
        
        <div class="wi278_r">
        		<div class="sub_heding_cover_2">
                		<div class="wi5_15"></div>
                        <div class="wisib_gead">SPECIALS OF THE WEEK</div>
                        <div class="view_all"><a href="#" class="view_all_link">View All</a></div>
                </div>
                <div class="wi253_287">
                		<img src="<?php echo WEB_DIR ?>images/view_all_image.jpg" width="253" height="287" />
                </div>
                <div class="view_all_caption"><span class="blue_01">CASA DE LA FLORA / THAILAND</span> Enjoy the crystal clear water and tropical surroundings with 15% off and free breakfast. <div class="view_all"><a href="#" class="view_all_link">more »</a></div>	 </div>
        </div>
      </div>
      <div class="news_hotel_cover">
      
      		<div class="newhotel_268">
            	<div class="news_hotel_sub_head">
                		<div class="wi5_15"></div>
                        <div class="wisib_gead_second">NEW HOTELS</div>
                        <div class="view_all"><a href="#" class=" view_all_link">View All</a></div>
                </div>
                <div class="wi235_108">
                <img src="<?php echo WEB_DIR ?>images/new_hotel_pic.jpg" width="235" height="108" />
                </div>
                <div class="news_hotel__caption"><span style="font-variant:small-caps;"><u>THE GREAT GETAWAY MEDINA / MARRAKECH</u></span> /  <a href="#" class="view_all_link"> more » </a></div>
            </div>
            <div class="newhotel_268_second">
            	<div class="news_hotel_sub_head">
                		<div class="wi5_15"></div>
                        <div class="wisib_gead_second">TOP DESTINATIONS</div>
                        <div class="view_all"><a href="#" class=" view_all_link">View All</a></div>
                </div>
                <div class="lond_234">
                <div class="plzce_cover">
                		<div class="wid173">LONDON</div>
                        <div class="rate_wi70">130 GBP</div>
                </div>
                <div class="plzce_cover">
                		<div class="wid173">PARIS   </div>
                        <div class="rate_wi70">160 GBP</div>
                </div>
                <div class="plzce_cover">
                		<div class="wid173">BERLIN  </div>
                        <div class="rate_wi70">230 GBP</div>
                </div><div class="plzce_cover">
                		<div class="wid173">NEW YORK CITY </div>
                        <div class="rate_wi70">130 GBP</div>
                </div>
                <div class="plzce_cover">
                		<div class="wid173">ZURICH   </div>
                        <div class="rate_wi70">540 GBP</div>
                </div>
                <div class="plzce_cover">
                		<div class="per_96">(FROM (PER NIGHT)</div>
                </div>
                
                </div>
            </div>
            <div class="newhotel_268_third">
            	<div class="news_hotel_sub_head_3">
                		<div class="wi5_15"></div>
                        <div class="wisib_gead_second">HOT DEALS</div>
                        <div class="view_all"><a href="#" class=" view_all_link">View All</a></div>
                </div>
                <div class="lond_234_third">
                <div class="plzce_cover_second">
                		<div class="wid173_third">VIENNA OPENING SPECIAL    </div>
                        <div class="rate_wi70">130 GBP</div>
                </div>
                <div class="plzce_cover_second">
                		<div class="wid173_third">30% OFF IN SWITZERLAND    </div>
                        <div class="rate_wi70">130 GBP</div>
                </div>
                <div class="plzce_cover_second">
                		<div class="wid173_third">LONGSTAY SPECIAL BRAZIL   </div>
                        <div class="rate_wi70">130 GBP</div>
                </div>
                <div class="plzce_cover_second">
                		<div class="wid173_third">FREE UPGRADE IN PORTO     </div>
                        <div class="rate_wi70">130 GBP</div>
                </div>
                <div class="plzce_cover_second">
                		<div class="wid173_third">LONGSTAY SPECIAL BRAZIL    </div>
                        <div class="rate_wi70">130 GBP</div>
                </div>
                
                
                
                <div class="plzce_cover_second">
                		<div class="per_96" style="margin:0 20px 0 0;">(FROM (PER NIGHT)</div>
                </div>
                
                </div>
            </div>
      </div>
      <div class="news_hotel_cover">
      		<div class="wi656">
            		<div class="sub_heding_cover">
            <div class="wi5_15"></div>
            <div class="wi600">BOOK WITH US TODAY  <span style="color:#747373; font-weight:normal;">( See all the benefits )</span></div>
          </div>
          <div class="one_icon_cover">
          		<div class="one_icon">
                <img src="<?php echo WEB_DIR ?>images/i_icon_bg.jpg" width="24" height="66" />
                </div>
                <div class="best_rate"><span style="color:#000; font-variant:small-caps; font-size:14px; font-weight:bold;"> BEST RATE <br/>
GUARANTEE</span><br/>
<span style="color:#808080; font-size:12px;">
Found a lower rate?<br/>
We'll beat it »</span>
</div>
          </div>
          <div class="one_icon_cover">
          		<div class="one_icon">
                <img src="<?php echo WEB_DIR ?>images/2_icon_bg.jpg" width="24" height="66" />
                </div>
                <div class="best_rate"><span style="color:#000; font-variant:small-caps; font-size:14px; font-weight:bold;"> MEMBERS ONLY <br/>
-50% PROMOTIONS</span><br/>
<span style="color:#808080; font-size:12px;">
Join the club for free <br/>
today »</span>
</div>
          </div>
          <div class="one_icon_cover">
          		<div class="one_icon">
                <img src="<?php echo WEB_DIR ?>images/3_icon_bg.jpg" width="24" height="66" />
                </div>
                <div class="best_rate"><span style="color:#000; font-variant:small-caps; font-size:14px; font-weight:bold;">HANDPICKED,
 <br/>
UNIQUE HOTELS</span><br/>
<span style="color:#808080; font-size:12px;">
Only 200 hotels matched <br/>
our criteria »</span>
</div>
          </div>
            </div>
            <div class="search_wi291">
            		<div class="sub_heding_cover_2">
                		<div class="wi5_15"></div>
                        <div class="wisib_gead_4th">HOT DEALS AND NEW HOTELS</div>
                        
                </div>
                <div class="search_bg_240">
                	<p><img src="<?php echo WEB_DIR ?>images/messege_icon.jpg" width="14" height="10" /> sign up for newsletter</p>
                    <div class="text_cov"><input name="" type="text" class="wi156_126" /></div>
                    <div class="ok_btn"><a href="#"><img src="<?php echo WEB_DIR ?>images/ok_btn.jpg" width="43" height="35" /></a></div>
                </div>
            </div>
      </div>
    </div>
    <div class="border_dd"></div>
    <?php echo $this->load->view('footer'); ?> </div>
</div>
</body>
</html>
