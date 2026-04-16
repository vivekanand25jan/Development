<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Travel Bay</title>

<link href="<?php echo WEB_DIR; ?>designAccess/css/travel_bay_stylesheet.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo WEB_DIR; ?>designAccess/engine1/style.css" />


<link href="<?php echo WEB_DIR; ?>css/style_sheet.css" rel="stylesheet" type="text/css" />
<link href="<?php echo WEB_DIR; ?>css/postion.css" rel="stylesheet" type="text/css" />

<script src="<?php echo WEB_DIR ?>script/jquery.js"></script>
<style>

</style>

   <link rel="stylesheet" href="<?php echo WEB_DIR; ?>datepickernew/themes/base/jquery.ui.all.css">
              
                <script src="<?php echo WEB_DIR; ?>datepickernew/ui/jquery.ui.core.js"></script> 
                <script src="<?php echo WEB_DIR; ?>datepickernew/ui/jquery.ui.widget.js"></script> 
                <script src="<?php echo WEB_DIR; ?>datepickernew/ui/jquery.ui.datepicker.js"></script>
                <link rel="stylesheet" href="<?php echo WEB_DIR; ?>datepickernew/demos.css">
                
  <script type="text/javascript" src="<?php echo WEB_DIR ?>gui/ajax/ajaxsbmt.js"></script>
                <script language="javascript1.5" type="text/javascript">
				function change_password()
		{
		
			var email_id =document.change_pass.email_id.value;
		var old_password =document.change_pass.old_password.value;
		var password =document.change_pass.password.value;
		var comform_password =document.change_pass.comform_password.value;
		
		$(".tab1").empty().html('<div style="padding-left:400px" align="middle"><img src=\'<?php print WEB_DIR ?>images/ajax-loader(2).gif\'></div>');
  $(".tab1").load("<?php print WEB_URL ?>b2b/password_change"+email_id+"/"+old_password+"/"+password+"/"+comform_password);
		
		       return false;
                      // For first time page load default results
                         
		 
		}
		</script>
</head>
<body>
<?php $this->load->view('b2b/header'); ?>
<div class="midlebody">

    <div class="mainbody_signin">
   
    <div>
    <div class="hotelnames_signin" style="min-height:329px;">
    
   		<!--<div class="right-hotel-name">Youngor Central Suzhou</div>--><div id="mybook-tit"> Edit Branch Details <span style="float:right"><a href="<?php echo WEB_URL; ?>b2b/agent_profile"><img src="<?php echo WEB_DIR;?>images/b2b-back-but.png" /></a></span></div>
   
        <div class="">     
           		
<!-- the tabs -->
<form action="<?php echo WEB_URL.'b2b/edit_branch/'.$result->branch_id; ?>" method="post"  name="reg" >
		
        		<div class="tb_sample_cover_thre">
                		<div class="tb_sample_cover_thre_L"> Branch Name *</div>
                        <div class="tb_sample_cover_thre_R"><input class="agent_text_cover_txt_feil" name="branch_name" type="text" value="<?php if( isset($result->branch_name)) echo $result->branch_name; ?>" />
						<div style="color:#FF0000;"> <?php echo form_error('branch_name');?></div>
						</div>
                </div>
                <div class="tb_sample_cover_thre">
                		<div class="tb_sample_cover_thre_L"> Email * </div><input type="hidden" name="branch_email" value="<?php echo $result->branch_email; ?>" />
                        <div class="tb_sample_cover_thre_R"><?php if( isset($result->branch_email)) echo $result->branch_email; ?>
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

<!-- tab "panes" -->



<!-- This JavaScript snippet activates those tabs -->

</div>
                            
                    </div>
 

  </div>
  </div>
  
  
</div>
</div></div>
<div style="clear:both"></div>
<?php $this->load->view('b2b/footer'); ?>
</body>
</html>
 