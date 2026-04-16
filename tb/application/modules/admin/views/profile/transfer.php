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

<li><a href="<?php echo WEB_URL;?>index/transfer" id="tabs_active">Transfer</a></li>
<li><a href="<?php echo WEB_URL;?>index/prices_list" >Prices</a></li>
</ul>

</div>
</div>



<!-- tab "panes" -->
<div class="panes" style="padding-bottom:10px">
<!--This is the contact information division-->
	
<div id="containerdount">
<div style="float:right; height:15px;"><a href="<?php echo site_url('index/dashboard')?>" style="color:#099;">Go Back</a></div> 
<div style="margin-top:2px;">
   
    <div style="float:left; margin-left:8px;">
    
    
    
    <table width="942" border="0" align="left" cellpadding="0" cellspacing="0"  >
  <tr>
    <td align="right" valign="top" class="" colspan="5" height="30"><a href="<?php echo site_url('index/transfer_period')?>" style="color:#099; font-weight:bold;">Add Period</a></td>
  </tr>
   <tr>
    <td align="left" valign="top" class="my_profile_name_ex_tab">No</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Transfer Period</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Transfer</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Status</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Action</td>
  </tr>
	<?php 
    if(isset($result[0]))
    {
    for($i=0;$i<count($result);$i++)
    {
    ?>
  <tr>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $i+1; ?></td>
     
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><a href="<?php echo WEB_URL; ?>index/edit_transfer_period/<?php echo $result[$i]->transfer_period_id ; ?>" style="text-decoration:none;color:#099; "><?php 
	$fd = $result[$i]->from_date ; $fds = explode("-",$fd); $from_date = $fds[2].'-'.$fds[1].'-'.$fds[0]; $td = $result[$i]->to_date ; $tds = explode("-",$td); $to_date = $tds[2].'-'.$tds[1].'-'.$tds[0]; 
	
	echo '<b>'.$from_date.'</b> To <b>'.$to_date.'</b>' ?></a></td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><a href="<?php echo WEB_URL; ?>index/view_transfer_details/<?php echo $result[$i]->transfer_period_id ; ?>" style="text-decoration:none;color:#099; ">Add Transfer</a></td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php if($result[$i]->status==1) { echo 'Active'; } else { echo 'InActive'; } ?></td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><a href="<?php echo WEB_URL; ?>index/update_transfer_period/<?php echo $result[$i]->transfer_period_id  ; ?>/1" style="color:#000;">Active</a> / <a href="<?php echo WEB_URL; ?>index/update_transfer_period/<?php echo $result[$i]->transfer_period_id  ; ?>/0" style="color:#000;">InActive</a> / <a href="<?php echo WEB_URL; ?>index/update_transfer_period/<?php echo $result[$i]->transfer_period_id  ; ?>/2" style="color:#000;">Delete</a></td>
  </tr>
  <?php
	}
}
else
{
	  ?> <td align="center" valign="top" colspan="5" class="my_profile_name_ex_tab_whit_ex">No Result Found... </td>
      <?php
  }
  ?>
</table>
    
    
 
    
 
    
    
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