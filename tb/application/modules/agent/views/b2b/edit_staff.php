<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="<?php echo WEB_DIR; ?>css/postion.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-1.2.6.min.js"></script>
<script type="text/javascript" src="js/tabs.js"></script>
<script type="text/javascript">
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
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
       
        <div class="agent_management">Add Staff</div>
        <div class="wi680_search_branc">
		<form action="<?php echo WEB_URL.'b2b/edit_staff/'.$result->staff_id; ?>" method="post"  name="reg" >
				<div class="tb_sample_cover_thre">
                		<div class="tb_sample_cover_thre_L"> Branch :</div>
                        <div class="tb_sample_cover_thre_R">
						<select name='branch'>
						<option value=''>Select Branch</option>
						<?php
							
							for ($i = 0; $i < count($branchs); $i++) {
								if ($branchs[$i]->branch_id == $result->branch_id) { 
									$select = 'selected';
								}
								else {
									$select = '';
								}
								echo "<option value='" . $branchs[$i]->branch_id . "'". $select . ">" . $branchs[$i]->branch_name."</option>";
							}
						?>
						</select>
						<div style="color:#FF0000;"> <?php echo form_error('branch');?></div>
						</div>
                </div>
				
        		<div class="tb_sample_cover_thre">
                		<div class="tb_sample_cover_thre_L"> Name :</div>
                        <div class="tb_sample_cover_thre_R"><input class="agent_text_cover_txt_feil" name="staff_name" type="text" value="<?php if( isset($result->name)) echo $result->name; ?>" />
						<div style="color:#FF0000;"> <?php echo form_error('staff_name');?></div>
						</div>
                </div>
                <div class="tb_sample_cover_thre">
                		<div class="tb_sample_cover_thre_L"> Email : </div>
                        <div class="tb_sample_cover_thre_R"><input class="agent_text_cover_txt_feil" name="email_id" type="text" value="<?php if( isset($result->email_id)) echo $result->email_id; ?>" />
						<div style="color:#FF0000;"> <?php echo form_error('email_id');?>
						</div>
                </div>
				</div>
				
				
				 <div class="tb_sample_cover_thre">
                		<div class="tb_sample_cover_thre_L"> Status : </div>
                        <div class="tb_sample_cover_thre_R">
						<input type="radio" name="active" value="1" <?php if (isset($result->active) && $result->active == 1) echo 'checked'; ?> /> Active &nbsp;
						<input type="radio" name="active" value="0" <?php if (isset($result->active) && $result->active == 0) echo 'checked'; ?> /> Inactive <br />
						<div style="color:#FF0000;"> <?php echo form_error('active');?>
						</div>
                </div>
				<input type="hidden" name='staff_id' value="<?php echo $result->staff_id; ?>">
                

        </div>
        <div class="tb_sample_cover_thre">
                		<div class="tb_sample_cover_thre_L" style="line-height:25PX;"> &nbsp;</div>
                        <div class="tb_sample_cover_thre_R"><input type="image" src="<?php echo WEB_DIR ?>images/save_btn.jpg" width="109" height="35" /></div>
          </div>
		  </form>
        
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
