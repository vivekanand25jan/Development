

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
        
        <div class="agent_management">AGENCY MANAGEMENT <a href="<?php echo WEB_URL; ?>b2b/password_change">CHANGE PASSWORD</a></div>
        <div class="wi680_search_branc">
        		<div class="tb_sample_cover_thre">
                		<div class="tb_sample_cover_thre_L"> Agent Name :</div>
                        <div class="tb_sample_cover_thre_R"><?php echo $name; ?></div>
                </div>
                <div class="tb_sample_cover_thre">
                		<div class="tb_sample_cover_thre_L"> Company / Agency Name : </div>
                        <div class="tb_sample_cover_thre_R"><?php echo $company_name; ?></div>
                </div>
                <div class="tb_sample_cover_thre">
                		<div class="tb_sample_cover_thre_L">Address : </div>
                        <div class="tb_sample_cover_thre_R"><?php echo $address; ?></div>
                </div>
                <div class="tb_sample_cover_thre">
                		<div class="tb_sample_cover_thre_L"> Country :</div>
                        <div class="tb_sample_cover_thre_R"><?php echo $country; ?></div>
                </div>
                <div class="tb_sample_cover_thre">
                		<div class="tb_sample_cover_thre_L"> City :</div>
                        <div class="tb_sample_cover_thre_R"><?php echo $city; ?></div>
                </div>
                <div class="tb_sample_cover_thre">
                		<div class="tb_sample_cover_thre_L"> Zipcode : </div>
                        <div class="tb_sample_cover_thre_R"><?php echo $postal_code; ?> </div>
                </div>
                <div class="tb_sample_cover_thre">
                		<div class="tb_sample_cover_thre_L"> Email :</div>
                        <div class="tb_sample_cover_thre_R"><?php echo $email_id; ?></div>
                </div>
                <div class="tb_sample_cover_thre">
                		<div class="tb_sample_cover_thre_L">  Office Phone : </div>
                        <div class="tb_sample_cover_thre_R"><?php echo $office_phone; ?></div>
                </div>
                <div class="tb_sample_cover_thre">
                		<div class="tb_sample_cover_thre_L"> Mobile Phone : </div>
                        <div class="tb_sample_cover_thre_R"><?php echo $mobile; ?></div>
                </div>
                <!-- <div class="tb_sample_cover_thre">
                		<div class="tb_sample_cover_thre_L">  Profile Logo : </div>
                        <div class="tb_sample_cover_thre_R"><img src="images/pro_icon.png" width="125" height="125" /></div>
                </div>-->

        </div>
        <div class="tb_sample_cover_thre">
                		<div class="tb_sample_cover_thre_L" style="line-height:25PX;"> &nbsp;</div>
                        <div class="tb_sample_cover_thre_R"><a href="<?php echo WEB_URL; ?>b2b/agent_edit_profile"><img src="<?php echo WEB_DIR ?>images/edit_btn.jpg" width="109" height="35" /></a></div>
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
