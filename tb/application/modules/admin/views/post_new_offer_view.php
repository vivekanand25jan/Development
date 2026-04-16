<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Travel Bay Admin Console</title>
<link href="<?php echo WEB_DIR; ?>adminstyle.css" rel="stylesheet" type="text/css" />

<script src="<?php echo WEB_DIR_FRONT ?>script/jquery.js"></script>

<link rel="stylesheet" href="<?php echo WEB_DIR_FRONT; ?>datepickernew/themes/base/jquery.ui.all.css">
<script src="<?php echo WEB_DIR_FRONT; ?>datepickernew/ui/jquery.ui.core.js"></script> 
<script src="<?php echo WEB_DIR_FRONT; ?>datepickernew/ui/jquery.ui.widget.js"></script> 
<script src="<?php echo WEB_DIR_FRONT; ?>datepickernew/ui/jquery.ui.datepicker.js"></script>
<link rel="stylesheet" href="<?php echo WEB_DIR_FRONT; ?>datepickernew/demos.css">
<script src="<?php print WEB_DIR_FRONT; ?>ckeditor/ckeditor.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo WEB_DIR_FRONT ?>gui/ajax/ajaxsbmt.js"></script>
<script type="text/javascript">
	function validatePost()
	{
		var form =	document.offer_form;
				
		var message = CKEDITOR.instances.area2.getData();
		
	
		if(message=="")
		{
			alert("Please Enter Offer Description");
			return false;
		}
		
		var ret=0;
		var all=document.getElementById('offer_form');  
		for(var i=0;i<all.elements.length;i++)
		{   
			if(all.elements[i].checked)
			   ret=1;   
		} 
		
		if(ret==0)
		{ 
			alert("Please Select atleast one Agency Name");    
			return false;  
		}
		
	}
</script>

<script type="text/javascript">  
checked=false;  
function All(chk) {  
//alert('hi');
    var all= document.getElementById('offer_form');  
     if (checked == false)  
          {  
           checked = true  
          }  
        else  
          {  
          checked = false  
          }  
    for (var i =0; i < all.elements.length; i++)   
    {  
     all.elements[i].checked = checked;  
    }  
      }  
</script>  

<script type="text/javascript">
	$(window).load( function() {
		
		CKEDITOR.replace("area2");
		
	});
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
                    
                      
                      <script language="javascript1.5" type="text/javascript">
				function hotel_fac_sorting()
		{
		
		var sd =document.search.datepicker.value;
		var ed =document.search.datepicker1.value;
		var bookno =document.search.bookno.value;
			var status =document.search.status.value;
		
		$("#result").empty().html('<div style="padding-left:400px" align="middle"><img src=\'<?php print WEB_DIR ?>images/ajax-loader(2).gif\'></div>');
		  $("#result").load("<?php print WEB_URL ?>account/booking_search/"+sd+"/"+ed+"/"+bookno+"/"+status);
		
		       return false;
                      // For first time page load default results
                         
		 
		}
		function goBack()
{
	window.history.go(-1);
}
		</script>
        
<div id="navjam">
<div class="tabs_width">

<ul class="tabs1">

 <li><a href="javascript:void(0)" id="tabs_active">Notice Board</a></li>
 

</ul>


</div>
</div>



<!-- tab "panes" -->
<div class="panes" style="padding-bottom:10px">
<!--This is the contact information division-->
	
<div id="containerdount">
 <div style="float:right; height:25px; margin-top:10px ;"><a href="<?php echo site_url('index/notice_board_offers')?>" style="color:#099;">Back</a></div>
  
<div style="margin-top:20px;">
    
    <div style="float:left; margin-left:20px;">
    <form  action="<?php echo WEB_URL; ?>index/insert_new_offer"  method="post" name="offer_form" id="offer_form">
   
    <table width="200" border="0" cellpadding="0" cellspacing="1">
  <tr>
    <td>&nbsp;
     </td>
  </tr>
   <tr>
  <td><strong>Offer Content :</strong> 
  <textarea cols="80" id="area2" name="offer_content" rows="10"></textarea>
  </td>
  </tr>
 
  <tr>
  <td><br /><strong>Post Offer To :&nbsp;
  <input type="checkbox" onclick="return All(this);"/>Check All</strong> <br />
 
 <strong>Agency Names: 
 </strong>
  <?php 
  
  for($i=0;$i<count($agent_det);$i++)
  {
  ?>
  <input type="checkbox"  name="agent_id[]" id="agnet_id" value="<?php echo $agent_det[$i]->agent_id;  ?>" />
  <?php echo strtoupper($agent_det[$i]->name);  ?>
  <?php } ?>
  </td>
  </tr>
 
  <tr>
    <td><br />
    </td>
  </tr>
</table>

        <?php
            $current_dte = date("d-m-Y",strtotime("+7 days"));
            $next_dte = date("d-m-Y",strtotime("+8 days"));
        ?>
            
   
    
 
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin:20px;">
    <tr>
    <td colspan="5" align="center"><input type="image" src="<?php echo WEB_DIR ?>images/sub_mint_btn_admin.png" onClick="return validatePost();" />
    <!--<input type="submit" id="submit" name="submit" value="Save and Continue" />--></td>
    </tr>
    </table>
    </form>
  
    
    
    </div>
   
    
  </div>
    
  
</div>

<script>
/*This is to perform the tabs changing function*/
// perform JavaScript after the document is scriptable.
/*$(function() {
	// setup ul.tabs to work as tabs for each div directly under div.panes
	$("ul.tabs").tabs("div.panes > div");
});*/
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
        
       
        

        
 	</div>
 </div>
</body>
</html>
 <style>
.b2b-AGE_OF2{ width:97px; float: left; color:#fff; font-family:MAIAN; padding:0 0 8px; margin:12px -7px 0 0; color:#000; font-size:12px;}

.check_149{ width:144px; float:right; margin:0 13px 3PX 0; position:relative; left:34px}
</style>