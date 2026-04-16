<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Console</title>
<link href="<?php echo WEB_DIR; ?>adminstyle.css" rel="stylesheet" type="text/css" />
<script src="<?php echo WEB_DIR ?>jquery.js"></script>
<script type="text/javascript" src="<?php echo WEB_DIR ?>ajaxsbmt.js"></script>
<!--<script language="javascript1.5" type="text/javascript">
function hotel_fac_sorting()
{
$("#result").empty().html('<div style=" width:388px; height:173px; margin-top:80px" align="middle"><img src=\'<?php print WEB_DIR ?>images/ajax-loader(5).gif\'></div>');
$("#result").load("<?php print WEB_URL ?>index/graph_report");
return false;
}
function hotel_fac_sorting1()
{
$("#result1").empty().html('<div style=" width:388px; height:173px; margin-top:80px" align="middle"><img src=\'<?php print WEB_DIR ?>images/ajax-loader(5).gif\'></div>');
$("#result1").load("<?php print WEB_URL ?>index/graph_report1");
return false;
}
</script>-->
<script language="javascript1.5" type="text/javascript">

$(document).ready(function(){ 
	var statisticalChart = 'b2cUsers';
	$("#fusionChartReport").empty().html('<div style=" width:388px; height:173px; margin-top:80px" align="middle"><img src=\'<?php print WEB_DIR ?>images/ajax-loader(5).gif\'></div>');
	$("#fusionChartReport").load("<?php print WEB_URL ?>index/graph_report/"+statisticalChart);
	
	var statisticalOverview = '1W';
	$.post( "<?php print WEB_URL ?>index/getStaticOverview", {statisticalOverview: statisticalOverview},
      function(data) {
		$("#b2cActive").html(data.users[0].active_user);
		$("#b2cInActive").html(data.users[0].inactive_user);
		$("#b2bActive").html(data.agents[0].active_agent);
		$("#b2bInActive").html(data.agents[0].inactive_agent);
		$("#suppliersActive").html(data.suppliers[0].active_suppliers);
		$("#suppliersInActive").html(data.suppliers[0].inactive_suppliers);
		$("#b2cConfBooking").html(data.B2Cbookings[0].conf_booking);
		$("#b2cCancelBooking").html(data.B2Cbookings[0].cancel_booking);
		$("#b2bConfBooking").html(data.B2Bbookings[0].conf_booking);
		$("#b2bCancelBooking").html(data.B2Bbookings[0].cancel_booking);
		$("#siteViewers").html(data.viewers[0].tot_vister);
      });
	  
	var pieChart = 'pieChart';
	$.post( "<?php print WEB_URL ?>index/graph_pieChart_report", {pieChart: pieChart},
      function(data) {
		$("#pieChartReport").html('<img src="<?php echo WEB_DIR ?>chart.php?data='+data.users[0].B2CUsers+'*'+data.agents[0].B2BUsers+'*'+data.suppliers[0].suppliers+'*'+data.callCenter[0].CallCenters+'&label=B2C Users*B2B Users*Suppliers*Call Centers" />');
      });
	  
	var lineChart = '1W';
	$.post( "<?php print WEB_URL ?>index/graph_lineChart_report", {lineChart: lineChart},
      function(data) {
		  var resultHour = data.users[0].dat;
		  var resultUser = data.users[0].visiters;
		  for(var i=1;i<data.users.length;i++) {
			  resultHour = resultHour + ',' +data.users[i].dat;
			  resultUser = resultUser + ',' +data.users[i].visiters;
		  }
		$("#lineChartReport").html('<img src="<?php echo WEB_DIR ?>graph.php?w=530&h=200&p[]='+resultUser+'&l=%20%20'+resultHour+'%20&r=4&c[]=0,119,204&s=1&v=0&t=2&i=%20Visiters" />');
      });
});
	
function getStaticChart()
{
	var statisticalChart = $("#statisticalChart").val();
	$("#fusionChartReport").empty().html('<div style=" width:388px; height:173px; margin-top:80px" align="middle"><img src=\'<?php print WEB_DIR ?>images/ajax-loader(5).gif\'></div>');
	$("#fusionChartReport").load("<?php print WEB_URL ?>index/graph_report/"+statisticalChart);
}
function getStaticOverview()
{
	var statisticalOverview = $("#statisticalOverview").val();
	$.post( "<?php print WEB_URL ?>index/getStaticOverview", {statisticalOverview: statisticalOverview},
      function(data) {
		$("#b2cActive").html(data.users[0].active_user);
		$("#b2cInActive").html(data.users[0].inactive_user);
		$("#b2bActive").html(data.agents[0].active_agent);
		$("#b2bInActive").html(data.agents[0].inactive_agent);
		$("#suppliersActive").html(data.suppliers[0].active_suppliers);
		$("#suppliersInActive").html(data.suppliers[0].inactive_suppliers);
		$("#b2cConfBooking").html(data.B2Cbookings[0].conf_booking);
		$("#b2cCancelBooking").html(data.B2Cbookings[0].cancel_booking);
		$("#b2bConfBooking").html(data.B2Bbookings[0].conf_booking);
		$("#b2bCancelBooking").html(data.B2Bbookings[0].cancel_booking);
		$("#siteViewers").html(data.viewers[0].tot_vister);
      });
}
function getLineChart()
{
	var lineChart = $("#lineChart").val(); 
	$.post( "<?php print WEB_URL ?>index/graph_lineChart_report", {lineChart: lineChart},
      function(data) {
		if(data != ''){
			  var resultHour = data.users[0].dat;
			  var resultUser = data.users[0].visiters;
			  for(var i=1;i<data.users.length;i++) {
				  resultHour = resultHour + ',' +data.users[i].dat;
				  resultUser = resultUser + ',' +data.users[i].visiters;
			  }
			$("#lineChartReport").html('<img src="<?php echo WEB_DIR ?>graph.php?w=450&h=200&p[]='+resultUser+'&l='+resultHour+'&r=4&c[]=0,119,204&s=1&v=0&t=2&i=%20Visiters" />');
		} else { $("#lineChartReport").html('<span style="text-align:center;margin-left:200px;color:red;">No records for this!..</span>') }
	  }
	);
}
</script>
</head>

<body>
 <div id="div_wrapper">
 	<div id="div_container">
    	
        <table width="986" align="center" border="0" cellpadding="0" cellspacing="0" style="border:1px #aaaaaa solid; margin-top:30px; border-top:none; border-radius:10px; ">
          <tr>
            <td id="div-consol-topimg">
            	<span class="admin-txt-mintit">Admin Console</span>
                <span style="float:right; color:#FFF; margin-right:31px;"><?php 
if ($this->session->userdata['firstname'] !== FALSE) :
	echo 'Welcome ' . $this->session->userdata('firstname') . ' ' . $this->session->userdata('lastname'); 
endif;
?>  |  <a href="<?php echo WEB_URL; ?>index/logout"   style="color: #FFF; text-decoration:none;" >Log out</a></span>
            </td>
          </tr>
          <tr>
            <td style="text-align:left; height:38px; background-color:#ebeceb; color:#1c1c1c; font-size:11px; padding-right:31px;  border-bottom:1px #aaaaaa solid; border-top:none">
            	<span style=" text-align:left;padding-left:10px">New Booking : <?php echo $this->admin_model->get_visit_count(); ?> </span>
                <span style=" float:right; margin-left:20px;">&nbsp;Visiter count : <?php echo $this->admin_model->get_visit_count_new(); ?></span>
                <span style=" float:right; margin-left:20px;"><img src="<?php echo WEB_DIR; ?>images/g-r.png" border="0" />&nbsp;Agent Online Now : <?php echo $this->admin_model->get_visit_count_agent(); ?></span>
                <span style=" float:right;"><img src="<?php echo WEB_DIR; ?>images/g-r.png" border="0" />&nbsp;Suppliers Online Now : <?php echo $this->admin_model->get_visit_count_supplier(); ?></span>
            </td>
          </tr>
          <tr>
          	<td>
            	<table width="966" border="0" align="center" style="border:1px #9d9d9d solid; margin-top:10px; background-color:#edefed; border-radius:8px;">
                    <tr>
                      <td width="580" valign="top"><table align="center" width="560" border="0" cellpadding="5" cellspacing="5">
                                        <tr>
                                          <td class="profile-box">
                                          	<div class="admin-txt-min" style="padding:5px">My Profile</div>
                                            <div class="profil-subtile"><img src="<?php echo WEB_DIR; ?>images/cons-list-con.gif" class="list-arr"  border="0" /><a href="<?php echo site_url('index/myacc_details/')?>" class="admin_link"> My Account</a></div>
                                            <div class="profi-icon-img"><img src="<?php echo WEB_DIR; ?>images/profileicon.png" border="0" /></div>
                                          </td>
                                          <!--<td class="profile-box">
                                          	<div class="admin-txt-min" style="padding:5px">User Accounts (B2C)</div>
                                            <div  class="profil-subtile"><img src="<?php echo WEB_DIR; ?>images/cons-list-con.gif" class="list-arr"  border="0" /><a href="<?php echo site_url('index/user_list/')?>" class="admin_link"> User List</a>
                                            <br>
                                            <img src="<?php echo WEB_DIR; ?>images/cons-list-con.gif" class="list-arr"  border="0" /> <a href="<?php echo site_url('index/userregistration_page/')?>" class="admin_link">New User Registration</a>
                                            </div>
                                            <div  class="profi-icon-img"  style="position:relative; top:60px"><img src="<?php echo WEB_DIR; ?>images/user-acc.png" border="0" /></div>
                                          </td>-->
                                          <td class="profile-box">
                                          	<div class="admin-txt-min" style="padding:5px">Suppliers</div>
                                            <div  class="profil-subtile"><img src="<?php echo WEB_DIR; ?>images/cons-list-con.gif" class="list-arr"  border="0" /><a href="<?php echo site_url('index/suppliers_list/')?>" class="admin_link"> Suppliers List</a>
                                            <br>
                                            <img src="<?php echo WEB_DIR; ?>images/cons-list-con.gif" class="list-arr"  border="0" /> <a href="<?php echo site_url('index/sup_registration_page/')?>" class="admin_link">New Supplier Registration</a>
                                             <br>
                                            <img src="<?php echo WEB_DIR; ?>images/cons-list-con.gif" class="list-arr"  border="0" /> <a href="<?php echo site_url('index/hotel_refresh/')?>" class="admin_link">Refresh The Hotels</a></br>
                                              <img src="<?php echo WEB_DIR; ?>images/cons-list-con.gif" class="list-arr"  border="0" /> <a href="<?php echo site_url('index/suplier_available_market/')?>" class="admin_link">Market Management</a>
                                           
                                            </div>
                                            <div  class="profi-icon-img"  style="position:relative; top:30px"><img src="<?php echo WEB_DIR; ?>images/user-acc.png" border="0" /></div>
                                          </td>
                                           <td class="profile-box">
                                          	<div class="admin-txt-min" style="padding:5px">Agent Accounts (B2B)</div>
                                            <div   class="profil-subtile"><img src="<?php echo WEB_DIR; ?>images/cons-list-con.gif" class="list-arr"  border="0" /><a href="<?php echo site_url('index/agent_list/')?>" class="admin_link"> Agent List</a><br />
                                           <img src="<?php echo WEB_DIR; ?>images/cons-list-con.gif" class="list-arr"  border="0" /><a href="<?php echo site_url('index/registration_page/')?>" class="admin_link"> New Agent Registration</a><br />
                                           <img src="<?php echo WEB_DIR; ?>images/cons-list-con.gif" class="list-arr"  border="0" /><a href="<?php echo site_url('index/notice_board_offers/')?>" class="admin_link"> Notice Board</a><br />
                                           <img src="<?php echo WEB_DIR; ?>images/cons-list-con.gif" class="list-arr"  border="0" /> <a href="<?php echo site_url('index/latest_news/')?>" class="admin_link">Latest News </a>
                                            </div>
                                            <div  class="profi-icon-img"  style="position:relative; top:28px"><img src="<?php echo WEB_DIR; ?>images/agentaccicon.png" border="0" /></div>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td class="profile-box">
                                          	<div class="admin-txt-min" style="padding:5px">My Control Panel</div>
                                            <div class="profil-subtile"><img src="<?php echo WEB_DIR; ?>images/cons-list-con.gif" class="list-arr"  border="0" /> <a href="<?php echo site_url('index/currency_converter/')?>" class="admin_link">Currency Converter</a> <br />
<!--<img src="<?php echo WEB_DIR; ?>images/cons-list-con.gif" class="list-arr"  border="0" /> <a href="<?php echo site_url('index/api_manage/')?>" class="admin_link">API Management</a> <br />-->
<img src="<?php echo WEB_DIR; ?>images/cons-list-con.gif" class="list-arr"  border="0" /> <a href="<?php echo site_url('index/deposit_request/')?>" class="admin_link"> Deposit Request</a> <br />
<img src="<?php echo WEB_DIR; ?>images/cons-list-con.gif" class="list-arr"  border="0" /> <a href="<?php echo site_url('index/payment_gateway/')?>" class="admin_link">Payment Gateway</a></div>

                                            <div  class="profi-icon-img" style="position:relative; top:42px"><img src="<?php echo WEB_DIR; ?>images/control-icon1.png" border="0" /></div>
                                          </td>
                                           <td class="profile-box">
                                          	<div class="admin-txt-min" style="padding:5px">Markup Management</div>
                                            <div  class="profil-subtile"><!--<img src="<?php echo WEB_DIR; ?>images/cons-list-con.gif" class="list-arr"  border="0" /><a href="<?php echo site_url('index/markup_master/')?>" class="admin_link"> B2C Rate Master</a>
                                            <br />-->
                                            <img src="<?php echo WEB_DIR; ?>images/cons-list-con.gif" class="list-arr"  border="0" /><a href="<?php echo site_url('index/markup_master_b2b/')?>" class="admin_link"> B2B Rate Master</a></div>
                                            <div  class="profil-subtile">
                                            <img src="<?php echo WEB_DIR; ?>images/cons-list-con.gif" class="list-arr"  border="0" /><a href="<?php echo site_url('index/markup_car_rental_period/')?>" class="admin_link"> Car rental Rate Master</a></div>
                                            <div  class="profil-subtile">
                                            <img src="<?php echo WEB_DIR; ?>images/cons-list-con.gif" class="list-arr"  border="0" /><a href="<?php echo site_url('index/markup_excursion_period/')?>" class="admin_link"> Excursion Rate Master</a></div>
                                            <div  class="profil-subtile">
                                            <img src="<?php echo WEB_DIR; ?>images/cons-list-con.gif" class="list-arr"  border="0" /><a href="<?php echo site_url('index/markup_transfer_period/')?>" class="admin_link"> Transfer Rate Master</a></div>
                                            <div  class="profil-subtile">
                                            <img src="<?php echo WEB_DIR; ?>images/cons-list-con.gif" class="list-arr"  border="0" /><a href="<?php echo site_url('index/markup_meetandgreet/')?>" class="admin_link"> Meet and Greet Airport</a></div>
                                            <div style="top:15px;"  class="profi-icon-img" ><img src="<?php echo WEB_DIR; ?>images/markupicon.png" border="0" /></div>
                                          </td>
                                           <td class="profile-box">
                                          	<div class="admin-txt-min" style="padding:5px">Reports</div>
                                            <div  class="profil-subtile"><!--<img src="<?php echo WEB_DIR; ?>images/cons-list-con.gif" class="list-arr"  border="0" /> <a href="<?php echo site_url('index/b2c_reports/')?>" class="admin_link">User Reports (B2C)</a><br />-->
                                            <img src="<?php echo WEB_DIR; ?>images/cons-list-con.gif" class="list-arr"  border="0" /> <a href="<?php echo site_url('index/b2b_reports/')?>" class="admin_link">Agent Reports (B2B)</a></div>
 <div  class="profil-subtile"><!--<img src="<?php echo WEB_DIR; ?>images/cons-list-con.gif" class="list-arr"  border="0" /> <a href="<?php echo site_url('index/b2c_reports/')?>" class="admin_link">User Reports (B2C)</a><br />-->
                                            <img src="<?php echo WEB_DIR; ?>images/cons-list-con.gif" class="list-arr"  border="0" /> <a href="<?php echo site_url('index/backup_tables/')?>" class="admin_link">Download Backup</a></div>
                                            <div  class="profi-icon-img" style="position:relative; top:74px;"><img src="<?php echo WEB_DIR; ?>images/report-icon.png" border="0" /></div>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td class="profile-box">
                                          	<div class="admin-txt-min" style="padding:5px">CMS </div>
                                            <div class="profil-subtile">
                                            <img src="<?php echo WEB_DIR; ?>images/cons-list-con.gif" class="list-arr"  border="0" /> <a href="<?php echo WEB_URL.'index/left_banner_bot_image'; ?>" class="admin_link">Why Use Us</a>
                                            <br />
                                            <!--<img src="<?php echo WEB_DIR; ?>images/cons-list-con.gif" class="list-arr"  border="0" /> Special Deals<br />-->
                                            <img src="<?php echo WEB_DIR; ?>images/cons-list-con.gif" class="list-arr"  border="0" /> <a href="<?php echo WEB_URL.'index/left_banner_bot_image'; ?>" class="admin_link">Hot Deals</a><br />
                                            <img src="<?php echo WEB_DIR; ?>images/cons-list-con.gif" class="list-arr"  border="0" /> <a href="<?php echo WEB_URL.'index/left_banner_bot_image'; ?>" class="admin_link">Specials of the Week</a><br />
                                            <img src="<?php echo WEB_DIR; ?>images/cons-list-con.gif" class="list-arr"  border="0" /> <a href="<?php echo WEB_URL.'index/banner'; ?>" class="admin_link">Banner Images</a>
                                            </div>
                                            <div  class="profi-icon-img" style="position:relative; top:45px"><img src="<?php echo WEB_DIR; ?>images/banner-icon.png" border="0" /></div>
                                            
                                          </td>
                                         <td class="profile-box">
                                          	<div class="admin-txt-min" style="padding:5px">Call Center</div>
                                            <div class="profil-subtile"><img src="<?php echo WEB_DIR; ?>images/cons-list-con.gif" class="list-arr"  border="0" /> <a href="<?php echo site_url('index/sub_admin_list')?>" class="admin_link">SubAdmin List</a> <br />
<img src="<?php echo WEB_DIR; ?>images/cons-list-con.gif" class="list-arr"  border="0" /> <a href="<?php echo site_url('index/sub_admin_registration_page/')?>" class="admin_link">New Registration</a> <br />
<img src="<?php echo WEB_DIR; ?>images/cons-list-con.gif" class="list-arr"  border="0" /> <a href="<?php echo site_url('index/support_ticket/')?>" class="admin_link">Support Ticket </a><br /><br />
</div>

                                            <div  class="profi-icon-img" style="position:relative; top:28px"><img src="<?php echo WEB_DIR; ?>images/control-icon1.png" border="0" /></div>
                                          </td>
                                           <td class="profile-box">
                                          	<div class="admin-txt-min" style="padding:5px">Other Services</div>
                                            <div  class="profil-subtile"><img src="<?php echo WEB_DIR; ?>images/cons-list-con.gif" class="list-arr"  border="0" /><a href="<?php echo site_url('index/car_rental/')?>" class="admin_link"> Car rental</a>
                                            <br>
                                            <img src="<?php echo WEB_DIR; ?>images/cons-list-con.gif" class="list-arr"  border="0" /> <a href="<?php echo site_url('index/excursion/')?>" class="admin_link">Excursion</a>
                                             <br>
                                            <img src="<?php echo WEB_DIR; ?>images/cons-list-con.gif" class="list-arr"  border="0" /> <a href="<?php echo site_url('index/transfer/')?>" class="admin_link">Transfer</a>
                                            <br>
                                            <img src="<?php echo WEB_DIR; ?>images/cons-list-con.gif" class="list-arr"  border="0" /> <a href="<?php echo site_url('index/marhaba/')?>" class="admin_link">Meet and Greet Airport</a>
                                           
                                            </div>
                                            <div  class="profi-icon-img"  style="position:relative; top:30px"><img src="<?php echo WEB_DIR; ?>images/user-acc.png" border="0" /></div>
                                          </td>
                                        </tr>
                                      </table>
                                      
                                      <table width="560"  align="left" border="0" style="background-color:#FFF; border:1px #e2e4e0 solid; margin-top:6px; border-radius:8px;">
                            <tr>
                              <td valign="top">
                              	<table width="560" align="left" border="0" cellpadding="5" cellspacing="0">
                                    <tr>
                                      <td class="admin-txt-min" style="padding:5px"><strong>Line Chart</strong></td>
                                      <td align="right"><select onchange="javascript:return getLineChart()" name="lineChart" id="lineChart" style="width:153px; height:26px; border-radius:6px; background-color:#f4f6f3">
                                        <option value="1W">Past One Week</option>
                                        <option value="1M">Past One Month</option>
                                        <option value="3M">Past Three Months</option>
                                        <option value="6M">Past Six Months</option>
                                        <option value="1Y">Past One Year</option>
                                      </select></td>
                                    </tr>
                                    <tr><td colspan="2"><hr /></td></tr>
                                    <tr>
                                    	<td colspan="2" align="left" style="padding-left:20px;"><span id="lineChartReport"></span></td>
                                   </tr>
                                   <tr><td colspan="2" height="15"></td></tr>
                                    <tr>
                                  </table>
                              </td>
                            </tr>
                          </table>
                                      
                                      
                                      </td>
                      <td width="403" valign="top">
                      	<table width="370"  align="center" border="0" style="background-color:#FFF; border:1px #e2e4e0 solid; margin-top:6px; border-radius:8px;">
                            <tr>
                              <td valign="top">
                              	<table width="355" align="center" border="0" cellpadding="5" cellspacing="0">
                                    <tr>
                                      <td class="admin-txt-min" style="padding:5px"><strong>Statistical Chart</strong></td>
                                      <td align="right"><select onchange="javascript:return getStaticChart()" name="statisticalChart" id="statisticalChart" style="width:153px; height:26px; border-radius:6px; background-color:#f4f6f3">
                                        <option value="b2cUsers">B2C Users</option>
                                        <option value="b2cUsersAct">B2C Users (Active)</option>
                                        <option value="b2cUsersInAct">B2C Users (InActive)</option>
                                        <option value="b2bUsers">B2B Users</option>
                                        <option value="b2bUsersAct">B2B Users (Active)</option>
                                        <option value="b2bUsersInAct">B2B Users (InActive)</option>
                                        <option value="suppliers">Suppliers</option>
                                        <option value="suppliersAct">Suppliers (Active)</option>
                                        <option value="suppliersInAct">Suppliers (InActive)</option>
                                        <option value="b2cBookings">B2C Bookings</option>
                                        <option value="b2cBookingsCon">B2C Bookings (Confirmed)</option>
                                        <option value="b2cBookingsCan">B2C Bookings (Cancelled)</option>
                                        <option value="b2bBookings">B2B Bookings</option>
                                        <option value="b2bBookingsCon">B2B Bookings (Confirmed)</option>
                                        <option value="b2bBookingsCan">B2B Bookings (Cancelled)</option>
                                        <option value="siteViewers">Site Viewers</option>
                                      </select></td>
                                    </tr>
                                    <tr><td colspan="2"><hr /></td></tr>
                                    <tr>
                                    	<td colspan="2" align="center" id="fusionChartReport"><!--<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" id="myNext" height="250" width="388">
		<param name="allowScriptAccess" value="always">
		<param name="movie" value="Charts/FCF_Column3D.swf">		
		<param name="FlashVars" value="&amp;chartWidth=388&amp;chartHeight=250&amp;debugMode=0&amp;dataXML=&lt;graph caption='Monthly Unit Sales' xAxisName='Month' yAxisName='Units' decimalPrecision='0' formatNumberScale='0'&gt;&lt;set name='Jan' value='462' color='AFD8F8' /&gt;&lt;set name='Feb' value='857' color='F6BD0F' /&gt;&lt;set name='Mar' value='671' color='8BBA00' /&gt;&lt;set name='Apr' value='494' color='FF8E46' /&gt;&lt;set name='May' value='761' color='008E8E' /&gt;&lt;set name='Jun' value='960' color='D64646' /&gt;&lt;set name='Jul' value='629' color='8E468E' /&gt;&lt;set name='Aug' value='622' color='588526' /&gt;&lt;set name='Sep' value='376' color='B3AA00' /&gt;&lt;set name='Oct' value='494' color='008ED6' /&gt;&lt;set name='Nov' value='761' color='9D080D' /&gt;&lt;set name='Dec' value='60' color='A186BE' /&gt;&lt;/graph&gt;&amp;registerWithJS=0">
		<param name="quality" value="high">
		<param name="wmode" value="window">
		<embed src="<?php echo WEB_DIR; ?>FCF_Column3D.swf" flashvars="&amp;chartWidth=388&amp;chartHeight=250&amp;debugMode=0&amp;dataXML=&lt;graph caption='Monthly B2C User Registration' xAxisName='Month' yAxisName='No Of Users' decimalPrecision='0' formatNumberScale='0'&gt;&lt;set name='Jan' value='462' color='AFD8F8' /&gt;&lt;set name='Feb' value='857' color='F6BD0F' /&gt;&lt;set name='Mar' value='671' color='8BBA00' /&gt;&lt;set name='Apr' value='494' color='FF8E46' /&gt;&lt;set name='May' value='761' color='008E8E' /&gt;&lt;set name='Jun' value='960' color='D64646' /&gt;&lt;set name='Jul' value='629' color='8E468E' /&gt;&lt;set name='Aug' value='622' color='588526' /&gt;&lt;set name='Sep' value='0' color='B3AA00' /&gt;&lt;set name='Oct' value='0' color='008ED6' /&gt;&lt;set name='Nov' value='0' color='9D080D' /&gt;&lt;set name='Dec' value='0' color='A186BE' /&gt;&lt;/graph&gt;&amp;registerWithJS=0" quality="high" name="myNext" allowscriptaccess="always" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" wmode="window" height="250" width="388">
	</object>--></td>
                                   </tr>
                                  </table>
                              </td>
                            </tr>
                          </table>
                          
                           <table width="370"  align="center" border="0" style="background-color:#FFF; border:1px #e2e4e0 solid; margin-top:6px; border-radius:8px;">
                            <tr>
                              <td valign="top">
                              	<table width="388" align="center" border="0" cellpadding="5" cellspacing="0">
                                    <tr>
                                      <td class="admin-txt-min" style="padding:5px"><strong>Pie Chart</strong></td>
                                      <td align="right"></td>
                                    </tr>
                                    <tr><td colspan="2"><hr /></td></tr>
                                    <tr>
                                    	<td colspan="2" align="center" style="padding-left:20px;"><span id="pieChartReport"></span></td>
                                   </tr>
                                   <tr><td colspan="2" height="15"></td></tr>
                                    <tr>
                                  </table>
                              </td>
                            </tr>
                          </table>
                          
                          <table width="370"  align="center" border="0" style="background-color:#FFF; border:1px #e2e4e0 solid; margin-top:10px; border-radius:8px;">
                            <tr>
                              <td valign="top">
                              	<table width="388" align="center" border="0" cellpadding="5" cellspacing="0"  style="font-weight:bold; color:#1c1c1c">
                                    <tr>
                                      <td width="185" class="admin-txt-min" style="padding:5px"><strong>Statistical Overview</strong></td>
                                      <td width="236" align="right"><select onchange="javascript:return getStaticOverview()" name="statisticalOverview" id="statisticalOverview" style="width:153px; border-radius:6px;  height:26px; background-color:#f4f6f3">
                                      <option value="1W">Past One Week</option>
                                      <option value="1M">Past One Month</option>
                                      <option value="3M">Past Three Months</option>
                                      <option value="6M">Past Six Months</option>
                                      <option value="1Y">Past One Year</option>
                                      </select></td>
                                    </tr>
                                    <tr><td colspan="2" ><hr /></td></tr>
                                    <tr>  <td colspan="4" id="result1">
                                    <table width="100%">
                                  
                                    <tr>
                                    	<td align="left">Total B2C Clients</td>
                                        <td align="left"><span id="b2cActive"></span> Active</td>
                                        <td align="left"><span id="b2cInActive"></span> InActive</td>
                                   </tr>
                                   <tr>
                                    	<td align="left">Total B2B Agents</td>
                                        <td align="left"><span id="b2bActive"></span> Active</td>
                                        <td align="left"><span id="b2bInActive"></span> InActive</td>
                                   </tr>
                                   <tr>
                                    	<td align="left">Total Suppliers</td>
                                        <td align="left"><span id="suppliersActive"></span> Active</td>
                                        <td align="left"><span id="suppliersInActive"></span> InActive</td>
                                   </tr>
                                   <tr>
                                    	<td align="left">Total B2C Bookings </td>
                                        <td align="left"><span id="b2cConfBooking"></span> Confirmed</td>
                                        <td align="left"><span id="b2cCancelBooking"></span> Cancelled</td>
                                   </tr>
                                   <tr>
                                    	<td align="left">Total B2B Bookings </td>
                                        <td align="left"><span id="b2bConfBooking"></span> Confirmed</td>
                                        <td align="left"><span id="b2bCancelBooking"></span> Cancelled</td>
                                   </tr>
                                   <tr>
                                    	<td  align="left">Site Viewers</td>
                                        <td align="left"><span id="siteViewers"> </span></td>
                                        <td align="left"></td>
                                   </tr>
                                   
                                  </table>
                              </td>
                            </tr>
                          </table>
                          
                          

                      </td>
                    </tr>
                  </table>

            </td>
          </tr>
          <tr>
          	<td>&nbsp;</td>
          </tr>
        </table>
        
        <div style="clear:both; height:30px;">&nbsp;</div>
        

        
 	</div>
 </div>
</body>
</html>
