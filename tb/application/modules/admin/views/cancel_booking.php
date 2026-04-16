<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="<?php echo WEB_DIR; ?>adminstyle.css" rel="stylesheet" type="text/css" />
<script src="<?php echo WEB_DIR ?>jquery.js"></script>

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
	<li><a href="javascript:void(0)" style="border-radius:8px 0 0 0">Cancellation Process</a></li>
	

   <!--<li><a href="#">MY TRAVELERS</a></li>
     	<li><a href="#">BILLING INFO</a></li>
          <li><a href="#">CREDIT POINTS</a></li>
               <li><a href="#">TOOLS </a></li>-->
</ul>
</div>
<span style=" float: right;    font-size: 14px;    margin-top: -36px;    padding: 3px;">

 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   
    <a style="
background-color:#EDEFED;
color:#06C;
    font-size: 14px;
    font-weight: bold;
    height: 30px;
    line-height: 30px;
    margin: 0;
    padding: 0;
    position: relative;
    text-align: center;
    text-decoration: none;
    top: 1px;
    width: 52px;" href="<?php echo WEB_URL; ?>index/b2b_reports">Back</a></span>
<!-- tab "panes" -->
<div class="panes" style="padding-bottom:10px">
	<div id="containerdount" class="admin-innerbox">
    	
<table width="50%"   border="0" cellspacing="1" cellpadding="6">
  <tr>
    <td style="">Cancel this booking : <a href="<?php echo WEB_URL; ?>index/cancel_booking_final/<?php echo $result_view->transaction_details_id; ?>"><?php echo $result_view->prn_no; ?></a></td>
 
  </tr>
 
  
</table>





    
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
