<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Travel Bay Admin Console</title>
<link href="<?php echo WEB_DIR; ?>adminstyle.css" rel="stylesheet" type="text/css" />

<script src="<?php echo WEB_DIR_FRONT ?>script/jquery.js"></script>

<link rel="stylesheet" href="<?php echo WEB_DIR_FRONT; ?>datepickernew/themes/base/jquery.ui.all.css">
<script src="<?php echo WEB_DIR_FRONT; ?>datepickernew/ui/jquery.ui.core.js"></script> 
<script src="<?php echo WEB_DIR_FRONT; ?>datepickernew/ui/jquery.ui.widget.js"></script> 
<script src="<?php echo WEB_DIR_FRONT; ?>datepickernew/ui/jquery.ui.datepicker.js"></script>
<link rel="stylesheet" href="<?php echo WEB_DIR_FRONT; ?>datepickernew/demos.css">

<script type="text/javascript" src="<?php echo WEB_DIR_FRONT ?>gui/ajax/ajaxsbmt.js"></script>
<script type="text/javascript">
function MM_jumpMenu(targ,selObj,restore){ //v3.0
eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
if (restore) selObj.selectedIndex=0;
}

$(document).ready(function(){

$("input:radio[name=top_city]").click(function() {
var top_city = $(this).val();
$('#testinput').val(top_city);
});
return false;
});

</script>
<script type="text/javascript">
function MM_jumpMenu(targ,selObj,restore){ //v3.0
eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
if (restore) selObj.selectedIndex=0;
}

$(document).ready(function(){
$("input:radio[name=top_city]").click(function() {
var top_city = $(this).val();
$('#testinput').val(top_city);
});
return false;
});
function get_maintain_month_dates(){
	var maintain_month = $("#maintain_month").val();
	$.post( "<?php print WEB_URL ?>index/get_maintain_month_dates", {maintain_month:maintain_month},
      function(data) {
		if(data != ''){
			$("#getCateTypes").html('');
			for(var j=0; j<data.cate_types.length; j++){
				$("#getCateTypes").append('<tr><td width="100%" style="padding-left:5px;"><span style="font-size:13px;font-weight:bold;color:green;">'+data.cate_types[j].room_type+'</span></td><tr><td id="viewRateTactics">'+data.cate_types[j].rate_plan_name+'</td></tr></tr>');
				//getRateTactics(data.cate_types[j].sup_inv_cate_type_id);
			}
			
			$("#getMonthDates").html('');
			$("#getMonthDates").append('<td align="left" width="130" valign="top" style="padding-left:5px;">Days of '+maintain_month+'</td><td align="left" valign="top">&nbsp;</td>');
			
			$("#getMonthDatesMarks").html('');
			$("#getMonthDatesMarks").append('<td align="left" width="130" valign="top" style="padding-left:5px;padding-top:10px;">Close out all rate plans</td><td align="left" valign="top">&nbsp;</td>');
			
			for(var i=0; i<data.dates.length; i++){
				$("#getMonthDates").append('<td width="20" style="border:1px solid #CCC;padding-left:0px;">'+data.dates[i]+'</td>');
				$("#getMonthDatesMarks").append('<td align="center" width="20" style="border:1px solid #CCC;padding-left:0px;"><img src="<?php echo WEB_DIR ?>images/b2b-booking-icon1.png" width="15" /><img src="<?php echo WEB_DIR ?>images/b2b-booking-icon.png" width="14" /></td>');		
				$("#viewRateTactics").append('<span align="center" width="20" style="border:1px solid #CCC;padding-left:0px;"><img src="<?php echo WEB_DIR ?>images/b2b-booking-icon1.png" width="15" /></span>');
			}
		} 
	  }
	);
}
function getRateTactics(invCateTypeId)
{
	$.post( "<?php print WEB_URL ?>index/getRateTactics", {invCateTypeId:invCateTypeId},
      function(data) {
		if(data != ''){
			for(var j=0; j<data.rate_tactics.length; j++){
				$("#viewRateTactics_"+data.rate_tactics[j].rate_of_room_plan).append('<tr><td style="padding-left:5px;">'+data.rate_tactics[j].rate_plan_name+'</td></tr>');
			}
		} 
	  }
	);
}

/*function check()
{
	<?php 
	for($j=1; $j<=$results; $j++)
	{ ?>
		if($('#avail<?php echo $j; ?>').attr('checked')){
		$("#avail_all<?php echo $j; ?>").each( function() { 
			$(this).attr("checked",true);
		});
	}
	else{
		$("#avail_all<?php echo $j; ?>").each( function() {
			$(this).attr("checked",false);
		});
	}
	<?php } ?>
}*/
function setStatusActivate(prop_id,id,val)
{
	$.get( "<?php print WEB_URL ?>index/set_open_close_dates", {prop_id:prop_id,id:id,val:val},
	function(data) {
	  if(data != ''){
		parent.location.reload()
		/*var date = data.month+'-'+data.year;
		$("#maintain_month").val(data.month+'-'+data.year);
		return false;*/
		} 
	});return false;
}
</script>
</head>

<body>
 <div id="div_wrapper">
 	<div id="div_container">
    	
        <table width="986" align="center" border="0" cellpadding="0" cellspacing="0" style="border:1px #aaaaaa solid; margin-top:30px; border-top:none; border-radius:10px; ">
         <?php $this->load->view('header'); ?>
          <tr>
          	<td>
            	<table width="966" border="0" align="center" style="border:1px #9d9d9d solid; margin-top:10px; background-color:#edefed; border-radius:8px;">
                    <tr>
                      <td width="580" valign="top">
                    
                      
                      <script language="javascript1.5" type="text/javascript">
				function hotel_fac_sorting()
		{
		
		var sd =document.search.datepicker.value;
		var ed =document.search.datepicker1.value;
		var bookno =document.search.bookno.value;
			var status =document.search.status.value;
		
		$("#result").empty().html('<div style="padding-left:400px" align="middle"><img src=\'<?php print WEB_DIR ?>images/ajax-loader(2).gif\'></div>');
		  $("#result").load("<?php print WEB_URL ?>account/booking_search/"+sd+"/"+ed+"/"+bookno+"/"+status);
		
		       return false;
                      // For first time page load default results
                         
		 
		}
		function goBack()
{
	window.history.go(-1);
}
		</script>
        
<div id="navjam">
<div class="tabs_width">
<ul class="tabs1">
<li><a href="<?php echo WEB_URL;?>index/transfer" id="tabs_active" style="width:240px;">Meet and Greet Airport Service</a></li>
</ul>
</div>
</div>



<!-- tab "panes" -->
<div class="panes" style="padding-bottom:10px">
<!--This is the contact information division-->
	
<div id="containerdount">

   
<div style="margin-top:20px;">
     <div style="float:right; height:25px;  margin-right:-130px;"><a href="<?php echo site_url('index/marhaba')?>" style="color:#099;">Back</a></div>
     
     
     <div style="margin-left:532px; margin-top:22px; position:absolute; margin-bottom:10px;">
    <form action='<?php echo WEB_URL; ?>index/add_desc_cate' method='post'>    
    <table>
    <tr><td>
    Add Category
    </td>
    <td>
    <input type='text' name='cate'  required  value='' size="40" />
    <input type='submit' name='submit' value='Add' />
    </td>
    </tr>
    </table> 
    </form>
    <form action='<?php echo WEB_URL; ?>index/add_air_code' method='post'>    
    <table>
    <tr><td>
    Add Airport&nbsp;&nbsp;&nbsp;
    </td>
    <td>
    <input type='text' name='airport'  required  value='' />
    <input type='submit' name='submit' value='Add' />
    </td>
    </tr>
    </table> 
    </form>
    </div>
     
     
   
    <div style="float:left; margin-left:20px;">
    <form name="form1" action="<?php echo WEB_URL; ?>index/add_marhaba_services" method="post">
    
    <table width="780" border="0" cellspacing="1" cellpadding="0"><caption><h4 align="left">Meet and Greet Airport Services Corp Rates</h4></caption>
        
        <tr height="35">
        <td width="30%">Description Category</td>
        <td width="77%">
        <?php  $cate = $this->Supplier_Model->get_desc_cate(); ?>
        	<select name='desc_cate' id='desc_cate' style="width:250px;" >
            <option value="">Select</option>
            <?php
            if(isset($cate[0]->marhaba_desc_cate_id))
                {
                for($i=0;$i<count($cate);$i++){
                ?>
                  <option value="<?php echo $cate[$i]->marhaba_desc_cate_id; ?>"><?php echo $cate[$i]->marhaba_desc_cate_name; ?></option>
                <?php	
                }
                }
                ?>      
            </select>
        </td>
        </tr>
            
        <tr height="35">
        <td width="30%">Airport</td>
        <td width="77%">
        <?php  $car = $this->Supplier_Model->get_airports(); ?>
        <select name='airport_code' id='airport_code' style="width:150px;">
        <option value="">Select</option>
        <?php
        if(isset($car[0]->marhaba_air_code_id))
            {
            for($i=0;$i<count($car);$i++){
            ?>
              <option value="<?php echo $car[$i]->marhaba_air_code_id;?>"><?php echo $car[$i]->marhaba_air_code ; ?></option>
            <?php	
            }
            }
            ?>      
        </select>
        </td>
        </tr>
            
        <tr height="80">
        <td width="300">Description:</td>
        <td><!--<input value="" name="description" id="datepicker"  required type="text" class="b2b-txtbox"/>--> 
        <textarea rows="3" cols="25" name="description"></textarea>
        <span style="color:#FF0000;"> <?php echo form_error('description');?></span>	
            </td>
        </tr>
    
        <tr height="35">
        <td width="300">Nbr Of Pax:</td>
        <td><!--<input  value="" name="nbr_of_pax" id="datepicker1"  required type="text" class="b2b-txtbox" />&nbsp;&nbsp;-->
        <textarea rows="3" cols="25" name="nbr_of_pax"></textarea>&nbsp;&nbsp;
        <span style="color:#FF0000;"> <?php echo form_error('nbr_of_pax');?></span>
        </td>
        </tr>
        <tr height="35">
        <td width="300">Corp Rates (AED):</td>
        <td><input  value="" name="corp_rates" id="datepicker1"  required type="text" class="b2b-txtbox" />&nbsp;&nbsp;
        <span style="color:#FF0000;"> <?php echo form_error('corp_rates');?></span>
        </td>
        </tr>
    </table>
    
 
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin:20px;">
    <tr>
    <td colspan="5" align="center"><input type="image" src="<?php echo WEB_DIR ?>images/sub_mint_btn_admin.png"  />
    </td>
    </tr>
    </table>
    </form>
  
    
    
    </div>
   
    
  </div>
    
  
</div>

<script>
/*This is to perform the tabs changing function*/
// perform JavaScript after the document is scriptable.
/*$(function() {
	// setup ul.tabs to work as tabs for each div directly under div.panes
	$("ul.tabs").tabs("div.panes > div");
});*/
</script>
                                      </td>
                      
                    </tr>
                  </table>

            </td>
          </tr>
          <tr>
          	<td>&nbsp;</td>
          </tr>
        </table>
        
       
        

        
 	</div>
 </div>
</body>
</html>
 <style>
.b2b-AGE_OF2{ width:97px; float: left; color:#fff; font-family:MAIAN; padding:0 0 8px; margin:12px -7px 0 0; color:#000; font-size:12px;}

.check_149{ width:144px; float:right; margin:0 13px 3PX 0; position:relative; left:34px}
</style>