<link href="<?php echo WEB_DIR; ?>designAccess/css/travel_bay_stylesheet.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo WEB_DIR; ?>designAccess/engine1/style.css" />

<div class="wrapper">
<div class="travel_signin">

<?php
$agent_det_all = $this->B2b_Model->agentInfo($this->session->userdata('agent_id'));

$agent_id = $this->session->userdata('agent_id');	
$agent_type = $this->session->userdata('agent_type');	
$branch_id = $this->session->userdata('branch_id');	
if ($agent_type == 2) {
	$agent_acc_info = $this->B2b_Model->getAgentAccInfo($agent_id);
	
	if (!empty($agent_acc_info)) {
		$balance_credit = $agent_acc_info->balance_credit;
		$last_credit = $agent_acc_info->last_credit;
	}
}

$branch_acc_info = $this->B2b_Model->getBranchAccInfo($agent_id, $branch_id);
//echo '<pre/>';
//print_r($branch_acc_info);exit;
if (!empty($branch_acc_info)) {
	if (count($branch_acc_info) == 1) {
			$branch_acc_info = (array) $branch_acc_info;
		}
		$branch_acc_info = $branch_acc_info;
}
?>


<p>Welcome <?php echo $this->session->userdata('name'); ?> <span class="travel_signin_space">|</span>   <a href="<?php echo WEB_URL; ?>b2b/logout/" class="sign_up_link">Log Out</a><span class="travel_signin_space">|</span> <?php  if($agent_det_all->agent_mode!='cash') { if (isset($balance_credit)) { ?> <?php echo '$'.$balance_credit; } else { echo "$0"; } } ?> <span class="travel_signin_space">|</span>   <a href="#">Feedback</a></p>
</div>
<div style="clear:both;"></div>
<div class="bodymain">
<div class="bodymain_top_bg"></div>
<div class="bodymain_middle_bg">
<div class="body1000">
<!--top banner here-->
<div class="travel_logo_top">
<div class="travelbay_logo"><a href="<?php echo WEB_URL; ?>b2b/agent_page/"><img src="<?php echo WEB_DIR; ?>designAccess/images/travel_bay_logo.png" width="310" height="68" border="0" /></a></div>
<div class="travel_sndiv">
<div class="travel_sn"><span style="position:relative; top:-12px;">Follow us:</span> <a target="_blank" href="http://www.facebook.com/travebayuae"><img src="<?php echo WEB_DIR; ?>designAccess/images/sn_icons-fb.jpg" border="0" /></a><a target="_blank" href="http://www.twitter.com/travelbayy"><img src="<?php echo WEB_DIR; ?>designAccess/images/sn_icons1.jpg" border="0" /></a><img src="<?php echo WEB_DIR; ?>designAccess/images/sn_icons21.jpg" border="0" /></div>
<div class="travel_sn1"><img src="<?php echo WEB_DIR; ?>designAccess/images/phone_icon.png" width="11" height="31" border="0" style="position:relative; top:5px;" /> <span style="font-size:25px; font-weight:bold;">+971 6 5573813</span></div>
</div>
</div>
<!--top banner end here-->

<!--navigation start here-->

<!--navigation end here-->