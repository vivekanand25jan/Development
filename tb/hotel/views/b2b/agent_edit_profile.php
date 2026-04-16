<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Travel Bay</title>

<link href="<?php echo WEB_DIR; ?>designAccess/css/travel_bay_stylesheet.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo WEB_DIR; ?>designAccess/engine1/style.css" />


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
        
        <div class="agent_management">AGENCY MANAGEMENT</div>
        <div class="wi680_search_branc">
		<form action="<?php echo WEB_URL.'b2b/agent_edit_profile'; ?>" method="post"  name="reg" >
        		<div class="tb_sample_cover_thre">
                		<div class="tb_sample_cover_thre_L"> Agent Name *</div>
                        <div class="tb_sample_cover_thre_R"><input class="agent_text_cover_txt_feil" name="name" type="text" value="<?php if (set_value('name') != null) { echo set_value('name');} else { echo $name; } ?>" />
						<div style="color:#FF0000;"> <?php echo form_error('name');?></div>
						</div>
                </div>
                <div class="tb_sample_cover_thre">
                		<div class="tb_sample_cover_thre_L"> Company / Agency Name * </div>
                        <div class="tb_sample_cover_thre_R"><input class="agent_text_cover_txt_feil" name="company_name" type="text" value="<?php if (set_value('company_name') != null) { echo set_value('company_name');} else { echo $company_name; } ?>" />
						<div style="color:#FF0000;"> <?php echo form_error('company_name');?></div>
						</div>
                </div>
                <div class="tb_sample_cover_thre">
                		<div class="tb_sample_cover_thre_L">Address * </div>
                        <div class="tb_sample_cover_thre_R"><input class="agent_text_cover_txt_feil" name="address" type="text" value="<?php if (set_value('address') != null) { echo set_value('address');} else { echo $address; } ?>" />
						<div style="color:#FF0000;"> <?php echo form_error('address');?></div>
						</div>
                </div>
                <div class="tb_sample_cover_thre">
                		<div class="tb_sample_cover_thre_L"> Country *</div>
                        <div class="tb_sample_cover_thre_R"><input class="agent_text_cover_txt_feil" name="country" type="text" value="<?php if (set_value('country') != null) { echo set_value('country');} else { echo $country; } ?>" />
						<div style="color:#FF0000;"> <?php echo form_error('country');?></div>
						</div>
                </div>
                <div class="tb_sample_cover_thre">
                		<div class="tb_sample_cover_thre_L"> City *</div>
                        <div class="tb_sample_cover_thre_R"><input class="agent_text_cover_txt_feil" name="city" type="text" value="<?php if (set_value('city') != null) { echo set_value('city');} else { echo $city; } ?>" />
						<div style="color:#FF0000;"> <?php echo form_error('city');?></div>
						</div>
                </div>
                <div class="tb_sample_cover_thre">
                		<div class="tb_sample_cover_thre_L"> Zipcode * </div>
                        <div class="tb_sample_cover_thre_R"><input class="agent_text_cover_txt_feil" name="postal_code" type="text" value="<?php if (set_value('postal_code') != null) { echo set_value('postal_code');} else { echo $postal_code; } ?>" /> 
						<div style="color:#FF0000;"> <?php echo form_error('postal_code');?></div>
						</div>
                </div>
                <div class="tb_sample_cover_thre">
                		<div class="tb_sample_cover_thre_L"> Email *</div>
                        <div class="tb_sample_cover_thre_R"><input class="agent_text_cover_txt_feil" name="email_id" type="text" value="<?php if (set_value('email_id') != null) { echo set_value('email_id');} else { echo $email_id; } ?>" />
						<div style="color:#FF0000;"> <?php echo form_error('email_id');?></div>
						</div>
                </div>
                <div class="tb_sample_cover_thre">
                		<div class="tb_sample_cover_thre_L">  Office Phone * </div>
                        <div class="tb_sample_cover_thre_R"><input class="agent_text_cover_txt_feil" name="office_phone" type="text" value="<?php if (set_value('office_phone') != null) { echo set_value('office_phone');} else { echo $office_phone; } ?>" />
						<div style="color:#FF0000;"> <?php echo form_error('office_phone');?></div>
						</div>
                </div>
                <div class="tb_sample_cover_thre">
                		<div class="tb_sample_cover_thre_L"> Mobile Phone * </div>
                        <div class="tb_sample_cover_thre_R"><input class="agent_text_cover_txt_feil" name="mobile" type="text" value="<?php if (set_value('mobile') != null) { echo set_value('mobile');} else { echo $mobile; } ?>"  />
						<div style="color:#FF0000;"> <?php echo form_error('mobile');?></div>
						</div>
                </div>
                <!-- vvalue="<?php //if( isset($mobile)) //echo $mobile; ?>" <div class="tb_sample_cover_thre">
                		<div class="tb_sample_cover_thre_L">  Profile Logo : </div>
                        <div class="tb_sample_cover_thre_R"><img src="images/pro_icon.png" width="125" height="125" /></div>
                </div>-->

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
