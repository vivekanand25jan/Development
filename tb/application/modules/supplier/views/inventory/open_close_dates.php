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
<link rel="stylesheet" href="<?php echo WEB_DIR; ?>datepickernew/themes/base/jquery.ui.all.css">

<script src="<?php echo WEB_DIR; ?>datepickernew/ui/jquery.ui.core.js"></script> 
<script src="<?php echo WEB_DIR; ?>datepickernew/ui/jquery.ui.widget.js"></script> 
<script src="<?php echo WEB_DIR; ?>datepickernew/ui/jquery.ui.datepicker.js"></script>
<link rel="stylesheet" href="<?php echo WEB_DIR; ?>datepickernew/demos.css">

<script type="text/javascript" src="<?php echo WEB_DIR ?>gui/ajax/ajaxsbmt.js"></script>

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
<?php $this->load->view('header'); ?>
 
<div class="midlebody">
<div class="mainbody_signin">
<div>
<div id="navjam">
<div class="tabs_width">
<ul class="tabs">
<li><a href="<?php echo WEB_URL;?>index/edit_contact_inform/<?php echo $this->uri->segment(3)?>">Hotel Details </a></li>
<li><a href="" id="tabs_active">Inventory Management </a></li>
<li><a href="">Booking Details </a></li>
<li><a href="<?php echo WEB_URL;?>index/accounting/<?php echo $this->uri->segment(3)?>">Accounting </a></li>
</ul>
</div>
</div>
<div class="hotelnames_signin" style="min-height:329px;">
<!--<div id="mybook-tit">Inventory Management</div>-->

<div class="" style="margin-top:20px;">            		
<!-- the tabs -->
<div id="navjam" >
<div class="tabs_width">
<ul class="tabs">
<li><a href="<?php echo site_url('index/inventory_category_list/')?>/<?php echo $this->uri->segment(3); ?>" id="newtabe_size">Category Type</a></li>
<li><a href="<?php echo site_url('index/rate_tactics_list/')?>/<?php echo $this->uri->segment(3); ?>" id="newtabe_size">Room Rates</a></li>
<li><a href="<?php echo site_url('index/open_close_dates/')?>/<?php echo $this->uri->segment(3); ?>" id="tabs_active" style="width:138.5px;">Open/Close Dates</a></li>
<li><a href="<?php echo site_url('index/house_rules/')?>/<?php echo $this->uri->segment(3); ?>" id="newtabe_size">Supplier Policy</a></li>
<li><a href="<?php echo site_url('index/extra_service/')?>/<?php echo $this->uri->segment(3); ?>" id="newtabe_size">Extra Services</a></li>
<li><a href="<?php echo site_url('index/early_bird/')?>/<?php echo $this->uri->segment(3); ?>" id="newtabe_size">Early Bird Promotion</a></li>
<li><a href="<?php echo site_url('index/view_allotment_list/')?>/<?php echo $this->uri->segment(3); ?>" id="newtabe_size">Allotment</a></li>
</ul>
</div>
</div>

<!-- tab "panes" -->
<div class="panes">
	<div id="containerdount" style="padding-top:30px;">

<div id="result">
<form name="rate_details" id="rate_details" action="<?php echo WEB_URL; ?>index/get_maintain_month_dates/<?php echo $this->uri->segment(3); ?>" method="post">
<table width="942" border="0" align="left" cellpadding="0" cellspacing="0" style="margin:15px 0 0 17px;">
  <tr>
    <td valign="top" colspan="4" style="padding-left:400px;"> 
    				<select name="maintain_month" id="maintain_month" style="width:120px;" onchange="this.form.submit();">
                    <option value="">Select Month</option>
					<?php
                    $month_year = $this->Supplier_Model->get_maintain_month($this->session->userdata('supplier_id'), $this->uri->segment(3));
					if(isset($month_year[0]->months))
					{
                    for($i=0;$i<count($month_year);$i++){
                    ?>
                      <option value="<?php echo $month_year[$i]->months.'-'.$month_year[$i]->year; ?>" <?php if(isset($_REQUEST['maintain_month']) && $_REQUEST['maintain_month'] == $month_year[$i]->months.'-'.$month_year[$i]->year) { echo "selected='selected'"; } ?> ><?php echo $month_year[$i]->month.' - '.$month_year[$i]->year; ?></option>
					<?php	
                    }
					}
                    ?>
                    </select></td>
    <td align="right" valign="top" height="30"></td>
  </tr>
   <tr>
  </tr>
</table>
</form>
<form name="setDates" action="<?php echo WEB_URL; ?>index/set_open_close_dates/<?php echo $this->uri->segment(3); ?>" method="post" style="clear:both;">
<table>
    <tr>
    <?php 
    if(isset($results) && $results != ""){ ?>
        <td align="left" width="130" valign="top" style="padding-left:5px;" colspan="2">Days of <?php echo $_REQUEST['maintain_month']; ?></td>
    <?php 
    for($i=1; $i<=$results; $i++)
    { ?>
        <td align="left" style="border:1px solid #CCC;padding:2px;"><?php echo $i; ?></td>
    <?php 
    }}
    ?>
    </tr>   
    
    
     <?php
	if(isset($results) && $results != ""){ 
	$rate_plan_details = $this->Supplier_Model->get_rate_plan_details($this->session->userdata('supplier_id'), $this->uri->segment(3),$_REQUEST['maintain_month']);
	if(!empty($rate_plan_details)) {
	for($i=0;$i<count($rate_plan_details);$i++){ ?>
    <tr height="20"><td></td><td></td></tr>
    <tr>
        <td align="left" colspan="2" style="padding-left:5px;"><?php echo $rate_plan_details[$i]->cate_type.' '.$rate_plan_details[$i]->room_type; ?></td>
        <?php 
        for($j=1; $j<=$results; $j++)
        { 
			$date_check = $this->Supplier_Model->get_date_check($j, $rate_plan_details[$i]->month, $rate_plan_details[$i]->year, $rate_plan_details[$i]->sup_rate_tactics_id);
		?>
        <td align="left" style="border:1px solid #CCC;padding-left:0px;">
        <?php 
		if($date_check) { 
		if($date_check[0]->status == '1'){
		?>
            <img src="<?php echo WEB_DIR ?>images/b2b-booking-icon1.png" width="15" onclick="setStatusActivate('<?php echo $this->uri->segment(3); ?>','avail_<?php echo $rate_plan_details[$i]->sup_rate_tactics_id.'_'.$j.'_'.$rate_plan_details[$i]->month.'_'.$rate_plan_details[$i]->year; ?>',0)" style="cursor:pointer;"/>
            <?php } else { ?>
            <img src="<?php echo WEB_DIR ?>images/b2b-booking-icon.png" width="14" onclick="setStatusActivate('<?php echo $this->uri->segment(3); ?>','avail_<?php echo $rate_plan_details[$i]->sup_rate_tactics_id.'_'.$j.'_'.$rate_plan_details[$i]->month.'_'.$rate_plan_details[$i]->year; ?>',1)" style="cursor:pointer;"/>
            <?php } ?>
           <!-- <input type="checkbox" name="avail[]" id="avail" value="avail_<?php echo $rate_plan_details[$i]->sup_rate_tactics_id.'_'.$j.'_'.$rate_plan_details[$i]->month.'_'.$rate_plan_details[$i]->year; ?>" style="padding:1px;" <?php if($date_check[0]->status == '1'){ echo "checked='checked'"; } ?>/>-->
            </td>
        <?php
		} 
		else { ?> 
        	<!--<img src="<?php echo WEB_DIR ?>images/no-room.png" border="0" width="16" style="padding:2px;" /> -->
            <span style="color:#333; padding:6px;">--</span>
		<?php } 
        }
        ?>
    </tr>
	<?php } }
    }
	?>
    
</table>

<table id="getCateTypes"></table>
<?php if(isset($results) && $results != ""){ ?>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
    <td align="center"><input type="image" src="<?php echo WEB_DIR ?>images/save-but.png" style="display:none;"/></td>
</tr>
<tr>
	<td height="20" colspan="2">&nbsp;</td>
</tr>
</table>
<?php } ?>
</form>
</div>
</div>
</div>
<!-- This JavaScript snippet activates those tabs -->
<!--<script>
$(function() {
$("ul.tabs").tabs("div.panes > div");
});
</script>-->
</div>
    
</div>
</div>
</div>
</div>
</div></div>
<div style="clear:both"></div>
<?php $this->load->view('footer'); ?>
</body>
</html>
 <style>
.b2b-AGE_OF2{ width:97px; float: left; color:#fff; font-family:MAIAN; padding:0 0 8px; margin:12px -7px 0 0; color:#000; font-size:12px;}

.check_149{ width:144px; float:right; margin:0 13px 3PX 0; position:relative; left:34px}
</style>