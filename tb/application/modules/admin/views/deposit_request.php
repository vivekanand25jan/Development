<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Admin Console</title>
        <link href="<?php echo WEB_DIR; ?>adminstyle.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="<?php echo WEB_DIR_FRONT; ?>gui/scripts/jquery-1.4.2.min.js"></script>
    </head>

    <body>
        <div id="div_wrapper">
            <div id="div_container">
            <table width="986" align="center" border="0" cellpadding="0" cellspacing="0" style="border:1px #aaaaaa solid;margin-top:30px; border-top:none; border-radius:10px;">
                    <?php $this->load->view('header'); ?>
                    <tr>
                        <td>
                            <table width="966" border="0" align="center" style="border:1px #9d9d9d solid; margin-top:10px; background-color:#edefed; border-radius:8px;">
                                <tr>
                                    <td width="580" valign="top">
                                        <div id="navjam">
                                            <ul class="tabs" style="position:relative; top:-4px; left:-3px; border-bottom:none">
                                                <li><a href="javascript:void(0)" style="border-radius:8px 0 0 0">Deposit Request</a></li>
                                                
                                            </ul>
                                        </div>
										<span style="float:right; cursor:pointer; font-size:12px; padding:5px;color:#069;"><A HREF="<?php echo WEB_URL; ?>index/dashboard"> Go Back</A></span> 
                                        <!-- tab "panes" -->
                                        <div class="panes" style="padding-bottom:10px">
                                        <div id="containerdount" style="padding-top:30px; margin:0 auto; float:none; border-bottom:1px #FFF solid; padding-bottom:15px">
                                                <table width="100%" border="0" cellspacing="1" cellpadding="0" style="background-color:#E8E5E5">
                                                    <tr>
                                                        <td class="admin-table-colo">Name</td>
                                                        <td class="admin-table-colo">Email</td>
                                                        <td class="admin-table-colo">Amount</td>
                                                        <td class="admin-table-colo">Date</td>
                                                        <td class="admin-table-colo">Mode</td>
                                                        <td class="admin-table-colo">Status</td>
                                                        <td class="admin-table-colo">Action</td>
                                                    </tr>
													<?php
                                                    if (!empty($result)) {
                                                    for($i=0; $i < count($result);$i++) { ?>
                                                    <tr>
                                                        <td align="center" class="admin-table-colo1"><?php echo $result[$i]->name; ?></td>
                                                        <td align="center" class="admin-table-colo1"><?php echo $result[$i]->email_id; ?></td>
                                                        <td class="admin-table-colo1"><?php echo $result[$i]->amount_credit; ?></td>
                                                        <td class="admin-table-colo1"><?php echo $result[$i]->deposited_date; ?></td>
                                                        <td class="admin-table-colo1"><?php echo $result[$i]->deposit_type; ?></td>
                                                        <td class="admin-table-colo1"><?php echo $result[$i]->status; ?></td>
                                                        <td class="admin-table-colo1"><?php 
                                                        if ($result[$i]->status == 'Pending') {
                                                        echo "<a href='". WEB_URL . "index/edit_deposit_request/" . $result[$i]->deposit_id . "'>Edit</a>";	 
                                                        }
                                                        ?></td>
                                                    </tr>
                                                    <?php
                                                    }
                                                    } 
													else {
                                                   		echo '<tr><td colspan="5" align="center">Result not found</td></tr>';
                                                    }
                                                    ?>
                                                </table>
                                            </div>
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
