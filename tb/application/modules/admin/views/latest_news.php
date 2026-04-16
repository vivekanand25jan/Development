<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Console</title>
<link href="<?php echo WEB_DIR; ?>adminstyle.css" rel="stylesheet" type="text/css" />
<script>
/*function delete_agent(booking_number)
{
if(confirm("Are you sure, you want to Delete this Agent?")) {
			var data = "booking_number="+booking_number;
			
			$.ajax({
			  url:'<?php //echo WEB_URL; ?>index/delete_agent/'+booking_number, 
			  data: "",
			  dataType: "json",
			  type: 'POST',
			  success: function(result){
				
					window.location = "<?php //echo WEB_URL; ?>index/agent_list/";
				
				
				
			
			}
			});
	
		} else {
			return false;
		}
}*/
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
                      <script src="<?php echo WEB_DIR ?>jquery.js"></script>
                      
                      <script language="javascript1.5" type="text/javascript">
				/*function hotel_fac_sorting()
		{
		
		var sd =document.search.datepicker.value;
		var ed =document.search.datepicker1.value;
		var bookno =document.search.bookno.value;
			var status =document.search.status.value;
		
		$("#result").empty().html('<div style="padding-left:400px" align="middle"><img src=\'<?php print WEB_DIR ?>images/ajax-loader(2).gif\'></div>');
		  $("#result").load("<?php print WEB_URL ?>account/booking_search/"+sd+"/"+ed+"/"+bookno+"/"+status);
		
		       return false;
                      // For first time page load default results
                         
		 
		}*/
		</script>
        
                     <div id="navjam">
<ul class="tabs" style="position:relative; top:-4px; left:-3px; border-bottom:none">
		<li><a href="javascript:void(0)">LATEST NEWS</a></li>
	
   <!-- <li><a href="javascript:void(0)">CLOSED</a></li>-->
</ul>
</div>
<span style="float:right; cursor:pointer; font-size:12px; padding:5px;color:#069;"><A HREF="<?php echo WEB_URL; ?>index/dashboard"> Go Back</A></span>
<!-- tab "panes" -->
<div class="panes" style="padding-bottom:10px">
	<div id="containerdount" style="padding-top:30px; margin:0 auto; float:none; border-bottom:1px #FFF solid; padding-bottom:15px">
    	
<table width="100%" border="0" cellspacing="1" cellpadding="0" style="background-color:#E8E5E5">
  <tr>
  	<td class="admin-table-colo">No</td>
    <td class="admin-table-colo">News details</td>
    <td class="admin-table-colo">Last Update</td>
    <td class="admin-table-colo">Action</td>
  </tr>
  <?php 
 if($news_list[0]!='')
  {

  for($i=0;$i<count($news_list);$i++)
  {
	  ?>
  <tr>
  <td align="center" class="admin-table-colo1"><?php echo $i+1; ?></td>
    <td align="center" class="admin-table-colo1"><?php echo html_entity_decode($news_list[$i]->news); ?></td>
    <td class="admin-table-colo1"><?php echo $news_list[$i]->timestamp; ?></td>

       <td class="admin-table-colo1"><a href="<?php echo WEB_URL.'index/edit_news/'.$news_list[$i]->id; ?>">EDIT</a><!-- / <a href="<?php echo WEB_URL.'index/view_ticket/'.$news_list[$i]->id; ?>">VIEW</a>--></td>
      
    
  </tr>
  <?php
  }
}
else
{
	echo '<tr><td colspan="9" align="center">No Result Found...</td></tr>';
}
  ?>
</table>

    
  </div>
  
  <?php /*?><div id="containerdount" style="padding-top:30px; margin:0 auto; float:none; border-bottom:1px #FFF solid; padding-bottom:15px">
    	
<table width="100%" border="0" cellspacing="1" cellpadding="0" style="background-color:#E8E5E5">
  <tr>
  	<td class="admin-table-colo">No</td>
    <td class="admin-table-colo">Ticket No</td>
    <td class="admin-table-colo">Agent</td>
    <td class="admin-table-colo">Creation Date</td>
    <td class="admin-table-colo">Last Update</td>
    <td class="admin-table-colo">Category</td>
    <td class="admin-table-colo">Subject</td>
 
    <td class="admin-table-colo">Status</td>
    <td class="admin-table-colo">Action</td>
  </tr>
  <?php 
 if($news_list_h[0]!='')
  {

  for($i=0;$i<count($news_list_h);$i++)
  {
	  ?>
  <tr>
  <td align="center" class="admin-table-colo1"><?php echo $i+1; ?></td>
    <td align="center" class="admin-table-colo1"><?php echo $news_list_h[$i]->ticket_id; ?></td>
    <td class="admin-table-colo1"><?php echo $news_list_h[$i]->name.'- '.$news_list_h[$i]->company_name; ?></td>
    <td class="admin-table-colo1"><?php echo $news_list_h[$i]->created_date; ?></td>
    <td class="admin-table-colo1"><?php echo $news_list_h[$i]->update_date; ?></td>

       <td class="admin-table-colo1"><?php echo $news_list_h[$i]->catacery; ?></td>
          <td class="admin-table-colo1"><?php echo $news_list_h[$i]->subject; ?> </td>
     <td class="admin-table-colo1"><?php echo $news_list_h[$i]->status; ?></td>
     
      <td class="admin-table-colo1"><a href="<?php echo WEB_URL.'index/close_ticket/'.$news_list_h[$i]->ticket_id; ?>">CLOSE</a> / <a href="<?php echo WEB_URL.'index/view_ticket/'.$news_list_h[$i]->ticket_id; ?>">VIEW</a></td>
      
    
  </tr>
  <?php
  }
}
else
{
	echo '<tr><td colspan="9" align="center">No Result Found...</td></tr>';
}
  ?>
</table>

    
  </div><?php */?>
  
    
  <!--<div id="containerdount" style="padding-top:30px; margin:0 auto; float:none; border-bottom:1px #FFF solid; padding-bottom:15px">
    	
<table width="100%" border="0" cellspacing="1" cellpadding="0" style="background-color:#E8E5E5">
  <tr>
  	<td class="admin-table-colo">No</td>
    <td class="admin-table-colo">Ticket No</td>
    <td class="admin-table-colo">Agent</td>
    <td class="admin-table-colo">Creation Date</td>
    <td class="admin-table-colo">Last Update</td>
    <td class="admin-table-colo">Category</td>
    <td class="admin-table-colo">Subject</td>
 
    <td class="admin-table-colo">Status</td>
        <td class="admin-table-colo">Closed By</td>
    <td class="admin-table-colo">Action</td>
  </tr>
  <?php 
 if($news_list_c[0]!='')
  {

  for($i=0;$i<count($news_list_c);$i++)
  {
	  ?>
  <tr>
  <td align="center" class="admin-table-colo1"><?php echo $i+1; ?></td>
    <td align="center" class="admin-table-colo1"><?php echo $news_list_c[$i]->ticket_id; ?></td>
    <td class="admin-table-colo1"><?php echo $news_list_c[$i]->name.'- '.$news_list_c[$i]->company_name; ?></td>
    <td class="admin-table-colo1"><?php echo $news_list_c[$i]->created_date; ?></td>
    <td class="admin-table-colo1"><?php echo $news_list_c[$i]->update_date; ?></td>

       <td class="admin-table-colo1"><?php echo $news_list_c[$i]->catacery; ?></td>
          <td class="admin-table-colo1"><?php echo $news_list_c[$i]->subject; ?> </td>
     <td class="admin-table-colo1"><?php echo $news_list_c[$i]->status; ?></td>
       <td class="admin-table-colo1"><?php echo $news_list_c[$i]->process; ?></td>
     
      <td class="admin-table-colo1"> <a href="<?php echo WEB_URL.'index/view_ticket/'.$news_list_c[$i]->ticket_id; ?>">VIEW</a></td>
      
    
  </tr>
  <?php
  }
}
else
{
	echo '<tr><td colspan="9" align="center">No Result Found...</td></tr>';
}
  ?>
</table>

    
  </div>-->
  
  
  
    
    
 
  
  
<div id="containerdount">3</div>
<div id="containerdount">4</div>
<div id="containerdount">5</div>
<div id="containerdount">6</div>
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
