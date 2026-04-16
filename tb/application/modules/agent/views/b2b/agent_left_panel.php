<?php
$method_name = $this->uri->segment(2);
$agent_active = '';
$branch_active = '';
$staff_active = '';
$branch_deposit_active = '';
$branch_markup_active = '';
$agent_deposit_request_active = '';
$markup_active = '';

if ($method_name == 'agent_profile' || $method_name == 'agent_edit_profile' || $method_name == 'password_change') {
	$agent_active='active';
} else if ($method_name == 'branch_manage' || $method_name == 'add_branch' || $method_name == 'edit_branch') {
	$branch_active = 'active';
} else if ($method_name == 'staff_manage' || $method_name == 'add_staff' || $method_name == 'edit_staff') {
	$staff_active = 'active';
} else if ($method_name == 'branch_deposit_manage' || $method_name == 'add_branch_deposit' || $method_name == 'edit_branch_deposit') {
	$branch_deposit_active = 'active';
}
else if ($method_name == 'branch_markup_manage' || $method_name == 'add_branch_markup' || $method_name == 'edit_branch_markup') {
	$branch_markup_active = 'active';
}
else if ($method_name == 'agent_deposit_request' || $method_name == 'add_agent_deposit_request') {
	$agent_deposit_request_active = 'active';
}
else if ($method_name == 'markup') {
	$markup_active = 'active';
}


?>
<div class="left_pannel">
                            		<div class="change_pannel_header">MY CONTROL PANEL</div>
                                    <div class="left_pannel_body"><div id="containersse">

									<ul class="menu">
			<li id="flights" class="<?php echo $agent_active; ?>" onclick="Javascript:location.href='<?php echo WEB_URL; ?>b2b/agent_profile'">  AGENCY MANAGEMENT</li>
			<li id="hotels" class="<?php echo $branch_active; ?>" onclick="Javascript:location.href='<?php echo WEB_URL; ?>b2b/branch_manage'">BRANCH MANAGEMENT</li>
			<li id="cars" class="<?php echo $staff_active; ?>" onclick="Javascript:location.href='<?php echo WEB_URL; ?>b2b/staff_manage'">  STAFF MANAGEMENT</li>            
            <!-- <li id="sightseeing" class="<?php //echo $branch_markup_active; ?>" onclick="Javascript:location.href='<?php //echo WEB_URL; ?>b2b/branch_markup_manage'">MARK UP</li> -->
			<li id="sightseeing" class="<?php echo $markup_active; ?>" onclick="Javascript:location.href='<?php echo WEB_URL; ?>b2b/markup_manage'">MARK UP</li>
            <li id="packages" class="<?php echo $branch_deposit_active; ?>" onclick="Javascript:location.href='<?php echo WEB_URL; ?>b2b/branch_deposit_manage'"> BRANCH DEPOSIT</li>
			<li id="packages" class="<?php echo $agent_deposit_request_active; ?>" onclick="Javascript:location.href='<?php echo WEB_URL; ?>b2b/agent_deposit_request'"> DEPOSIT REQUEST</li>
               <!-- <li id="CUSTOMER"> CUSTOMER DATABASE</li>
                   <li id="LEDGER"> LEDGER DETAILS</li> -->
		</ul>
        </div></div>
                            </div>