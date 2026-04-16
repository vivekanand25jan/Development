<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="<?php echo WEB_DIR; ?>css/postion.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo WEB_DIR; ?>gui/scripts/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/tabs.js"></script>
<script type="text/javascript">
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}

function deleteConform(branch_id) {

	if (confirm("Are you sure you want to delete this branch?"))
	{
		var data = 'branch_id='+branch_id;
		$.ajax({
		  url:'<?php echo WEB_URL; ?>b2b/delete_branch/'+branch_id,
		  data: '',
		  dataType: "json",
		  success: function(result){
			if (result == 'success') {
				window.location = '<?php echo WEB_URL; ?>b2b/branch_manage/';
			}
		  }
		 });
			 
	}
}
</script>
</head>

<body>
		<div id="main_continer">
   		  <div class="header">
                	<?php echo $this->load->view('b2b/header'); ?>
            
                    <div class="b2b_banner"><img src="<?php echo WEB_DIR ?>images/b2b_banner.jpg" width="977" height="143" /></div>
                    <div class="content_cover">
                    		<?php echo $this->load->view('b2b/agent_left_panel'); ?>
                            <div class="hotel_right_panel">
                            	
		<div class="content flights">
        
        <div class="agent_management">BRANCH MANAGEMENT</div>
        <div class="wi680_search_branc">
		<form action="<?php echo WEB_URL.'b2b/branch_manage'; ?>" method="post"  name="reg" >
		<input type="text" name="txt_search" id="txt_search" value="<?php if (isset($txt_search)) echo $txt_search; ?>">
		<input type="submit" name='btn_search' id='btn_search' value="Search">
		</form>
		<div class="tb">
            		<div class="tb_sample_cover">
                    <div class="tb_col_01">Branch</div>
                    <div class="tb_col_01">Address</div>
                    <div class="tb_col_01">city</div>
                    <div class="tb_col_01">Email Address</div>
                    <div class="tb_col_01">Phone Number</div>
					<div class="tb_col_01">Status</div>
                    <div class="tb_col_01">Action</div>
                    </div>
					<?php
					if (!empty($result)) {
					for($i=0;$i< count($result);$i++) { ?>
						<div class="tb_sample_cover211">
                    		<div class="tr_col_01"><?php echo $result[$i]->branch_name; ?></div>
                            <div class="tr_col_01"><?php echo $result[$i]->address; ?> </div>
                            <div class="tr_col_01"><?php echo $result[$i]->city; ?></div>
                            <div class="tr_col_01"><?php echo $result[$i]->branch_email; ?></div>
                            <div class="tr_col_01"><?php echo $result[$i]->telephone; ?></div>
							<div class="tr_col_01"><?php echo $result[$i]->status_str; ?></div>
                            <div class="tr_col_01"><a href="<?php echo WEB_URL . 'b2b/edit_branch/'.$result[$i]->branch_id; ?>">Edit</a> | <a href="#" onclick='deleteConform(<?php echo $result[$i]->branch_id; ?>);'>Delete</a></div>
                        
                    </div>
				<?php } 
				} else { 
					echo 'result not found';
				}
				?>
                  
          </div>
		  
			
			<div class="add_new_btn"><a href="<?php echo WEB_URL; ?>b2b/add_branch"><img src="<?php echo WEB_DIR ?>images/add_new_btn.jpg" width="109" height="35" /></a></div>

        </div>

        
        </div>
        	<span class="clear"></span>
	  
 
                          <div style="clear:both;"></div>  </div>
                    </div>
          
          
          <div class="border_dd"></div>
         <?php echo $this->load->view('b2b/footer'); ?>
        </div>
        </div>
</body>
</html>
