<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Admin Console</title>
        <link href="<?php echo WEB_DIR; ?>adminstyle.css" rel="stylesheet" type="text/css" />
        <script>
            function delete_agent(booking_number)
            {
                if(confirm("Are you sure, you want to Delete this Agent?")) {
                    var data = "booking_number="+booking_number;
			
                    $.ajax({
                        url:'<?php echo WEB_URL; ?>index/delete_agent/'+booking_number, 
                        data: "",
                        dataType: "json",
                        type: 'POST',
                        success: function(result){
				
                            window.location = "<?php echo WEB_URL; ?>index/agent_list/";
				
				
				
			
                        }
                    });
	
                } else {
                    return false;
                }
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
                                        <script src="<?php echo WEB_DIR ?>jquery.js"></script>

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
                                        </script>

                                        <div id="navjam">
                                            <ul class="tabs" style="position:relative; top:-4px; left:-3px; border-bottom:none">
                                                <li><a href="javascript:void(0)" style="border-radius:8px 0 0 0">Agent List (<?php echo $status_cnt->tot_agent; ?>)</a></li>
                                                <li><a href="javascript:void(0)">Active Agents  (<?php echo $status_cnt->active; ?>)</a></li>
                                                <?php /*  <li><a href="javascript:void(0)">InActive Users  (<?php echo $status_cnt->inactive; ?>)</a></li> */ ?>

                                                <!-- <li><a href="#">MY TRAVELERS</a></li>
                                                  <li><a href="#">BILLING INFO</a></li>
                                                       <li><a href="#">CREDIT POINTS</a></li>
                                                            <li><a href="#">TOOLS </a></li>-->
                                            </ul>
                                        </div>
									 <span style="float:right; cursor:pointer; font-size:12px; padding:5px;color:#069;"><A HREF="<?php echo WEB_URL; ?>index/dashboard"> Go Back</A></span> 
                                        <!-- tab "panes" -->
                                        <div class="panes" style="padding-bottom:10px">
                                            <div id="containerdount" style="padding-top:30px; margin:0 auto; float:none; border-bottom:1px #FFF solid; padding-bottom:15px">

                                                <table width="100%" border="0" cellspacing="1" cellpadding="0" style="background-color:#E8E5E5">
                                                    <tr>
                                                        <td class="admin-table-colo">No</td>
                                                        <td class="admin-table-colo">AgentID</td>
                                                        <td class="admin-table-colo">Name</td>
                                                        <td class="admin-table-colo">Company Name</td>
                                                        <td class="admin-table-colo">Contact No</td>
                                                        <td class="admin-table-colo">Email</td>
                                                        <td class="admin-table-colo">Registration Date</td>

                                                        <td class="admin-table-colo">Status</td>
                                                        <td class="admin-table-colo">Action</td>
                                                    </tr>
                                                    <?php
                                                    if (isset($result[0])) {

                                                        for ($i = 0; $i < count($result); $i++) {
                                                            ?>
                                                            <tr>
                                                                <td align="center" class="admin-table-colo1"><?php echo $i + 1; ?></td>
                                                                <td align="center" class="admin-table-colo1"><?php echo $result[$i]->agent_id; ?></td>
                                                                <td class="admin-table-colo1"><?php echo $result[$i]->name; ?></td>
                                                                <td class="admin-table-colo1"><?php echo $result[$i]->company_name; ?></td>
                                                                <td class="admin-table-colo1"><?php echo $result[$i]->office_phone; ?></td>

                                                                <td class="admin-table-colo1"><?php echo $result[$i]->email_id; ?></td>
                                                                <td class="admin-table-colo1"><?php echo $result[$i]->register_date; ?></td>
                                                                <td class="admin-table-colo1"><?php if ($result[$i]->active == 1) {
                                                        echo 'Active';
                                                    } else {
                                                        echo 'InActive';
                                                    } ?></td>

                                                                <td class="admin-table-colo1"><a href="<?php echo WEB_URL; ?>index/update_agent/<?php echo $result[$i]->agent_id; ?>/1">Active</a> / <a href="<?php echo WEB_URL; ?>index/update_agent/<?php echo $result[$i]->agent_id; ?>/0">InActive</a></td>
                                                            </tr>
                                                            <?php
                                                        }
                                                    } else {
                                                        echo '<tr><td colspan="5" align="center">No Result Found...</td></tr>';
                                                    }
                                                    ?>
                                                </table>


                                            </div>

                                            <div id="containerdount" style="padding-top:30px; margin:0 auto; float:none; border-bottom:1px #FFF solid; padding-bottom:15px">

                                                <table width="100%" border="0" cellspacing="1" cellpadding="0" style="background-color:#E8E5E5">
                                                    <tr>
                                                        <td class="admin-table-colo">No </td>
                                                        <td class="admin-table-colo">AgentID</td>
                                                        <td class="admin-table-colo">Name</td>
                                                        <td class="admin-table-colo">Company Name</td>
                                                        <td class="admin-table-colo">Email</td>
                                                        <td class="admin-table-colo">Contact No(mobile No)</td>
                                                        <td class="admin-table-colo">Balance Amount</td>
                                                        <td class="admin-table-colo">Deposit / Credit</td>

                                                        <td class="admin-table-colo">Contact</td>
                                                        <td class="admin-table-colo">Delete</td>
                                                        <td class="admin-table-colo">View Bookings</td>
                                                        <td class="admin-table-colo">Top destinations</td>

                                                    </tr>
                                                    <?php
// echo '<pre/>';print_r($result_a).'ssssssssss';
                                                    if (isset($result_a[0])) {

                                                        for ($j = 0; $j < count($result_a); $j++) {
                                                            ?>
                                                            <tr>
                                                                <td align="center" class="admin-table-colo1"><?php echo $j + 1; ?></td>
                                                                <td align="center" class="admin-table-colo1"><?php echo $result_a[$j]->agent_id; ?></td>
                                                                <td class="admin-table-colo1"><?php echo $result_a[$j]->name; ?></td>
                                                                <td class="admin-table-colo1"><?php echo $result_a[$j]->company_name; ?></td>
                                                                <td class="admin-table-colo1"><?php echo $result_a[$j]->email_id; ?></td>
                                                                <td class="admin-table-colo1"><?php echo $result_a[$j]->office_phone; ?></td>
                                                                <td class="admin-table-colo1"><?php echo $result_a[$j]->balance_credit . ' '.$result_a[$j]->currency_type; ?></td>
                                                                <td class="admin-table-colo1"><a href="<?php echo WEB_URL; ?>index/deposit_details/<?php echo $result_a[$j]->agent_id; ?> ">Deposit</a> &nbsp;&nbsp;</td>

                                                                <td class="admin-table-colo1" valign="top"><a href="<?php echo WEB_URL; ?>index/edit_agent/<?php echo $result_a[$j]->agent_id; ?> ">View</a> &nbsp;&nbsp;</td>
                                                                <td class="admin-table-colo1"> <a href="javascript:void(0);" onclick="delete_agent('<?php echo $result_a[$j]->agent_id; ?>');">Delete</a> &nbsp;&nbsp;</td>
                                                                <td align="center" class="admin-table-colo1" valign="top"><a href="<?php echo WEB_URL; ?>index/view_booking_agent/<?php echo $result_a[$j]->agent_id; ?>">View</a> </td>
                                                                <td align="center" class="admin-table-colo1" valign="top"><a href="<?php echo site_url('index/agent_top_cities/' . $result_a[$j]->agent_id) ?>">View</a> </td>
                                                            </tr>
        <?php
    }
} else {
    echo '<tr><td colspan="9" align="center">No Result Found...</td></tr>';
}
?>
                                                </table>


                                            </div>








                                            <div id="containerdount">3</div>
                                            <div id="containerdount">4</div>
                                            <div id="containerdount">5</div>
                                            <div id="containerdount">6</div>
                                        </div>

                                        <script>

                                            // perform JavaScript after the document is scriptable.
                                            $(function() {
                                                // setup ul.tabs to work as tabs for each div directly under div.panes
                                                $("ul.tabs").tabs("div.panes > div");
                                            });
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

                <div style="clear:both; height:30px;">&nbsp;</div>



            </div>
        </div>
    </body>
</html>
