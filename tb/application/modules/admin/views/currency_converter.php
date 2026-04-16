<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Console</title>
<link href="<?php echo WEB_DIR; ?>adminstyle.css" rel="stylesheet" type="text/css" />

<script src="<?php echo WEB_DIR ?>jquery.js"></script>
<style>

</style>

   <link rel="stylesheet" href="<?php echo WEB_DIR; ?>datepickernew/themes/base/jquery.ui.all.css">
              
                <script src="<?php echo WEB_DIR; ?>datepickernew/ui/jquery.ui.core.js"></script> 
                <script src="<?php echo WEB_DIR; ?>datepickernew/ui/jquery.ui.widget.js"></script> 
                <script src="<?php echo WEB_DIR; ?>datepickernew/ui/jquery.ui.datepicker.js"></script>
                <link rel="stylesheet" href="<?php echo WEB_DIR; ?>datepickernew/demos.css">
                
  <script type="text/javascript" src="<?php echo WEB_DIR ?>ajaxsbmt.js"></script>
                <script language="javascript1.5" type="text/javascript">
				function hotel_fac_sorting()
		{
		
		var sd =document.search.datepicker.value;
		var ed =document.search.datepicker1.value;
		var bookno =document.search.bookno.value;
			var status =document.search.status.value;
		
		$("#result").empty().html('<div style="padding-left:400px" align="middle"><img src=\'<?php print WEB_DIR ?>images/ajax-loader(5).gif\'></div>');
		  $("#result").load("<?php print WEB_URL ?>index/booking_search/"+sd+"/"+ed+"/"+bookno+"/"+status);
		
		       return false;
                      // For first time page load default results
                         
		 
		}
		</script>
      
</head>

<body>
 <div id="div_wrapper">
 	<div id="div_container">
    	
        <table width="986" align="center" border="0" cellpadding="0" cellspacing="0" style="border:1px #aaaaaa solid; margin-top:30px; border-top:none; border-radius:10px; ">
         <?php $this->load->view('header'); ?>
          <tr>
          	<td>
            	<table width="966" border="0" align="center" style="border:1px #9d9d9d solid; margin-top:10px; background-color:#edefed; border-radius:8px;">
                    <tr>
                      <td width="580" valign="top">
                   
        
                     <div id="navjam">
<ul class="tabs" style="position:relative; top:-4px; left:-3px; border-bottom:none">
	<li><a href="javascript:void(0)" style="border-radius:8px 0 0 0">Currency Converter</a></li>
   
	

   <!-- <li><a href="#">MY TRAVELERS</a></li>
     <li><a href="#">BILLING INFO</a></li>
          <li><a href="#">CREDIT POINTS</a></li>
               <li><a href="#">TOOLS </a></li>-->
</ul>
</div>
  <span style="float:right; cursor:pointer; font-size:12px; padding:5px;color:#069;"><A HREF="<?php echo WEB_URL; ?>index/dashboard"> Go Back</A></span>   
<!-- tab "panes" -->
<div class="panes" style="padding-bottom:10px">
	<div id="containerdount" class="admin-innerbox">
    	
<script type="text/javascript" src="<?php echo WEB_DIR_FRONT; ?>gui/scripts/jquery-1.4.2.min.js"></script>

<script type="text/javascript">
function currrency_delete(cur_id) {

	if (confirm("Are you sure you want to delete this Currency?"))
	{
		$.ajax({
		  url:'<?php echo WEB_URL; ?>index/currency_delete/'+cur_id,
		  data: '',
		  dataType: "json",
		  success: function(result){
			if (result == 'success') {
				window.location = '<?php echo WEB_URL; ?>index/currency_converter/';
			}
		  }
		 });
	}
			 
}
</script>



<div class="contete_area">
			
            
                   
                           
                            	
		<div class="content flights">
 
       
        <div class="wi680_search_branc" style="width:600px; margin-top:30px">
		
		<div class="tb" style="width:600px">
            <div class="tb_sample_cover" style="width:600px">
            <div class="tb_col_01" style="background-color:#ccc; font-weight:bold; color:#000;width:140px;">Currency</div>
            <div class="tb_col_01" style="background-color:#ccc; font-weight:bold; color:#000;width:140px;">Value</div>
            <div class="tb_col_01" style="background-color:#ccc; font-weight:bold; color:#000;width:140px;">status</div>
             <div class="tb_col_01" style="background-color:#ccc; font-weight:bold; color:#000;width:175px;">Action</div>
            <!--<div class="tb_col_01" style="background-color:#ccc; font-weight:bold; color:#000">Online Value</div>-->
         </div>
		<?php
        if (!empty($result)) {
        for($i=0;$i< count($result);$i++) { ?>
        <div class="tb_sample_cover211" style="width:600px">
            <div class="tr_col_01  bl_2" style="width:140px;"><?php echo $result[$i]->country; ?></div>
            <div class="tr_col_01 bl_1" style="width:140px;"><?php echo $result[$i]->value; // echo currency("USD",$result[$i]->country,1); ?>  </div>
            <div class="tr_col_01 bl_1" style="width:140px;"><?php if($result[$i]->status==1) { echo "Active";}else {echo "Inactive";} ?></div>
            <div class="tr_col_01 bl_1" style="width:175px;">  
            <?php echo "<a  href='". WEB_URL . "index/edit_currency_converter/" . $result[$i]->cur_id . "' >Edit</a>";	 ?>/
             <a href="<?php echo WEB_URL;?>index/update_currency_converter/<?php echo $result[$i]->cur_id; ?>/1">Active</a> /
              <a href="<?php echo WEB_URL;?>index/update_currency_converter/<?php echo $result[$i]->cur_id; ?>/0">InActive</a>
            
           <!-- /<a href="#" onclick='currrency_delete(<?php echo $result[$i]->cur_id; ?>);' class="delete_link">Delete</a>-->
            </div>
            <!--<div class="tr_col_01 bl_1"><?php //$val = $this->admin_model->currency_converter("USD",$result[$i]->country,1); echo $val; ?>  </div>-->
        </div>
        <?php }
        } else { 
        echo 'Result not found';
        }
        ?>
        </div>
        </div>
        </div>
        <span class="clear"></span>
        </div>

    
  </div>
  
    
    
 
</div>

<script>

// perform JavaScript after the document is scriptable.
$(function() {
	// setup ul.tabs to work as tabs for each div directly under div.panes
	$("ul.tabs").tabs("div.panes > div");
});
</script>
                                      </td>
                      
                    </tr>
                  </table>

            </td>
          </tr>
          <tr>
          	<td>&nbsp;</td>
          </tr>
        </table>
        
        <div style="clear:both; height:30px;">&nbsp;</div>
        

        
 	</div>
 </div>
</body>
</html>
