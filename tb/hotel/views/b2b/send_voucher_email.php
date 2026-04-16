<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Travel Bay</title>

<!--<link href="<?php echo WEB_DIR; ?>designAccess/css/travel_bay_stylesheet.css" rel="stylesheet" type="text/css" />-->
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
				function hotel_fac_sortingaa()
		{
		
		var fdate =document.search33.fdates.value;
		
		var tdate =document.search33.tdate.value;
		var booking_status =document.search33.booking_status.value;
			var passenger_name =document.search33.passenger_name.value;
				var booking_number =document.search33.booking_number.value;
				
		
		$("#result").empty().html('<div style="padding-left:400px" align="middle"><img src=\'<?php print WEB_DIR ?>images/ajax-loader(2).gif\'></div>');
  $("#result").load("<?php print WEB_URL ?>b2b/my_booking_search_news/"+passenger_name);
		
		       return false;
                      // For first time page load default results
                         
		 
		}
		</script>
</head>
<body>

<div class="midlebody">

    <div class="mainbody_signin">
   
    <div>
    <div class="hotelnames_signin" style="min-height:329px;">
    
   		<!--<div class="right-hotel-name">Youngor Central Suzhou</div>--><div id="mybook-tit">Send Voucher To Mail</div>
   
        <div class="">            		
<!-- the tabs -->

<!-- tab "panes" -->
<?php
if($msg!='')
{

    echo '<div id="mybook-tit">Email sent to the recipients.</div>';

}
else
{
?>

 
<form  action="<?php echo WEB_URL.'b2b/send_voucher_email/'.$id; ?>" method="post"  name="reg" >
				
		
      		<div class="tb_sample_cover_thre">
                		<div class="tb_sample_cover_thre_L"> From Name :</div>
                        <div class="tb_sample_cover_thre_R"><input class="agent_text_cover_txt_feil" id="from_name" name="from_name" type="text" value="<?php if( isset($from_name)) echo $from_name; ?>" /> <br />
						<div style="color:#FF0000;"> <?php echo form_error('from_name');?></div>
						
						</div>
                </div>
				
				<div class="tb_sample_cover_thre">
                		<div class="tb_sample_cover_thre_L"> From Email ID : </div>
                        <div class="tb_sample_cover_thre_R"><input class="agent_text_cover_txt_feil" id="from_mail_id" name="from_mail_id" type="text" value="<?php if( isset($from_mail_id)) echo $from_mail_id; ?>" /> <br />
						<div style="color:#FF0000;"> <?php echo form_error('from_mail_id');?></div>
						
						</div>
                </div>
				
				<div class="tb_sample_cover_thre">
                		<div class="tb_sample_cover_thre_L"> To Name :</div>
                        <div class="tb_sample_cover_thre_R"><input class="agent_text_cover_txt_feil" id="to_name" name="to_name" type="text" value="<?php if( isset($to_name)) echo $to_name; ?>" /> <br />
						<div style="color:#FF0000;"> <?php echo form_error('to_name');?></div>
						
						</div>
                </div>
				
				<div class="tb_sample_cover_thre">
                		<div class="tb_sample_cover_thre_L"> To Email ID : </div>
                        <div class="tb_sample_cover_thre_R"><input class="agent_text_cover_txt_feil" id="to_mail_id" name="to_mail_id" type="text" value="<?php if( isset($to_mail_id)) echo $to_mail_id; ?>" /> <br />
						<div style="color:#FF0000;"> <?php echo form_error('to_mail_id');?></div>
						
						</div>
                </div>
				
				
                
				<input type="hidden" name='id' value='<?php echo $id; ?>'>
				

				

        
        <div class="tb_sample_cover_thre">
                		<div class="tb_sample_cover_thre_L" style="line-height:25PX;"> &nbsp;</div>
                        <div class="tb_sample_cover_thre_R">
						<input type="submit" value="Send Mail" width="109" height="35" />
						</div>
          </div>
 
</form>

<?php
}
?>
<!-- This JavaScript snippet activates those tabs -->
<script>

// perform JavaScript after the document is scriptable.
$(function() {
	// setup ul.tabs to work as tabs for each div directly under div.panes
	$("ul.tabs").tabs("div.panes > div");
});
</script>
</div>
                            
                    </div>
 

  </div>
  </div>
  
  
</div>
</div></div>
<div style="clear:both"></div>

</body>
</html>
 