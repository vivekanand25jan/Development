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
        
        <div class="agent_management">Add Branch</div>
        <div class="wi680_search_branc">
		<form action="<?php echo WEB_URL.'b2b/edit_branch/'.$result->branch_id; ?>" method="post"  name="reg" >
		
        		<div class="tb_sample_cover_thre">
                		<div class="tb_sample_cover_thre_L"> Branch Name *</div>
                        <div class="tb_sample_cover_thre_R"><input class="agent_text_cover_txt_feil" name="branch_name" type="text" value="<?php if( isset($result->branch_name)) echo $result->branch_name; ?>" />
						<div style="color:#FF0000;"> <?php echo form_error('branch_name');?></div>
						</div>
                </div>
                <div class="tb_sample_cover_thre">
                		<div class="tb_sample_cover_thre_L"> Email * </div>
                        <div class="tb_sample_cover_thre_R"><input class="agent_text_cover_txt_feil" name="branch_email" type="text" value="<?php if( isset($result->branch_email)) echo $result->branch_email; ?>" />
						<div style="color:#FF0000;"> <?php echo form_error('branch_email');?>
						</div>
                </div>
				</div>
                <div class="tb_sample_cover_thre">
                		<div class="tb_sample_cover_thre_L">Address * </div>
                        <div class="tb_sample_cover_thre_R"><input class="agent_text_cover_txt_feil" name="address" type="text" value="<?php if( isset($result->address)) echo $result->address; ?>" />
						<div style="color:#FF0000;"> <?php echo form_error('address');?>
						</div>
                </div>
				</div>
                <div class="tb_sample_cover_thre">
                		<div class="tb_sample_cover_thre_L"> Country *</div>
                        <div class="tb_sample_cover_thre_R"><input class="agent_text_cover_txt_feil" name="country" type="text" value="<?php if( isset($result->country)) echo $result->country; ?>" />
						<div style="color:#FF0000;"> <?php echo form_error('country');?>
						</div>
                </div>
				</div>
                <div class="tb_sample_cover_thre">
                		<div class="tb_sample_cover_thre_L"> City *</div>
                        <div class="tb_sample_cover_thre_R"><input class="agent_text_cover_txt_feil" name="city" type="text" value="<?php if( isset($result->city)) echo $result->city; ?>" />
						<div style="color:#FF0000;"> <?php echo form_error('city');?>
						</div>
                </div>
				</div>
                <div class="tb_sample_cover_thre">
                		<div class="tb_sample_cover_thre_L"> Zipcode * </div>
                        <div class="tb_sample_cover_thre_R"><input class="agent_text_cover_txt_feil" name="postal_code" type="text" value="<?php if( isset($result->postal_code)) echo $result->postal_code; ?>" /> 
						<div style="color:#FF0000;"> <?php echo form_error('postal_code');?>
						</div>
                </div>
				</div>
                
                <div class="tb_sample_cover_thre">
                		<div class="tb_sample_cover_thre_L">  Office Phone * </div>
                        <div class="tb_sample_cover_thre_R"><input class="agent_text_cover_txt_feil" name="telephone" type="text" value="<?php if( isset($result->telephone)) echo $result->telephone; ?>" />
						<div style="color:#FF0000;"> <?php echo form_error('telephone');?>
						</div>
                </div>
				</div>
                <div class="tb_sample_cover_thre">
                		<div class="tb_sample_cover_thre_L"> Mobile Phone * </div>
                        <div class="tb_sample_cover_thre_R"><input class="agent_text_cover_txt_feil" name="mobile" type="text" value="<?php if( isset($result->mobile)) echo $result->mobile; ?>" />
						<div style="color:#FF0000;"> <?php echo form_error('mobile');?>
						</div>
                </div>
				</div>

				 <div class="tb_sample_cover_thre">
                		<div class="tb_sample_cover_thre_L"> Status * </div>
                        <div class="tb_sample_cover_thre_R">
						<input type="radio" name="status" value="1" <?php if ($result->status == 1) echo 'checked'; ?> /> Active &nbsp;
						<input type="radio" name="status" value="0" <?php if ($result->status == 0) echo 'checked'; ?> /> Inactive <br />
						<div style="color:#FF0000;"> <?php echo form_error('status');?>
						</div>
                </div>
				<input type="hidden" name='branch_id' value="<?php echo $result->branch_id; ?>">
               

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
