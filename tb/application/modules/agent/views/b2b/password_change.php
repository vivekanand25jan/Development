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
        
        <div class="agent_management">CHANGE PASSWORD</div>
        <div class="wi680_search_branc">
		<form action="<?php echo WEB_URL.'b2b/password_change'; ?>" method="post"  name="reg" >
        		<div class="tb_sample_cover_thre">
                		<div class="tb_sample_cover_thre_L"> Email :</div>
                        <div class="tb_sample_cover_thre_R"><input class="agent_text_cover_txt_feil" name="email_id" type="text" value="<?php if (set_value('email_id') != null) { echo set_value('email_id');} else { echo $email_id; } ?>" />
												<div style="color:#FF0000;"> <?php echo form_error('email_id');?></div>
                </div>
				</div>
                <div class="tb_sample_cover_thre">
                		<div class="tb_sample_cover_thre_L"> Old Password : </div>
                        <div class="tb_sample_cover_thre_R"><input class="agent_text_cover_txt_feil" name="old_password" type="password" />
												<div style="color:#FF0000;"> <?php echo form_error('old_password');?></div>
                </div>
				</div>
                <div class="tb_sample_cover_thre">
                		<div class="tb_sample_cover_thre_L">New Password : </div>
                        <div class="tb_sample_cover_thre_R"><input class="agent_text_cover_txt_feil" name="password" type="password" />
												<div style="color:#FF0000;"> <?php echo form_error('password');?></div>
                </div>
				</div>
				 <div class="tb_sample_cover_thre">
                		<div class="tb_sample_cover_thre_L">Conform Password : </div>
                        <div class="tb_sample_cover_thre_R"><input class="agent_text_cover_txt_feil" name="comform_password" type="password" /></div>
                </div>
                

        </div>
        <div class="tb_sample_cover_thre">
                		<div class="tb_sample_cover_thre_L" style="line-height:25PX;"> &nbsp;</div>
                        <div class="tb_sample_cover_thre_R"><a href="<?php echo WEB_URL; ?>b2b/agent_edit_profile"><input type="image" src="<?php echo WEB_DIR ?>images/save_btn.jpg" width="109" height="35" /></a></div>
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
