<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Console</title>
<link href="<?php echo WEB_DIR; ?>adminstyle.css" rel="stylesheet" type="text/css" />
<script>
function delete_agent(booking_number)
{
if(confirm("Are you sure, you want to Delete this Agent?")) {
			var data = "booking_number="+booking_number;
			
			$.ajax({
			  url:'<?php echo WEB_URL; ?>index/delete_agent/'+booking_number, 
			  data: "",
			  dataType: "json",
			  type: 'POST',
			  success: function(result){
				
					window.location = "<?php echo WEB_URL; ?>index/agent_list/";
				
				
				
			
			}
			});
	
		} else {
			return false;
		}
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
                      <script src="<?php echo WEB_DIR ?>jquery.js"></script>
                      
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
		</script>
        
                     <div id="navjam">
<ul class="tabs" style="position:relative; top:-4px; left:-3px; border-bottom:none">
		<li><a href="javascript:void(0)">View Ticket</a></li>
	
</ul>
</div>

<!-- tab "panes" -->
<div class="panes" style="padding-bottom:10px">
	<div id="containerdount" style="padding-top:30px; margin:0 auto; float:none; border-bottom:1px #FFF solid; padding-bottom:15px">
    	
<form action="<?php echo WEB_URL.'index/update_ticket'; ?>" method="post"  name="reg" >
            <input type="hidden" name="agent_id" value="<?php echo $agent_list->agent_id; ?>" />
            <input type="hidden" name="ticket_id" value="<?php echo $agent_list->ticket_id; ?>" />
    <table width="100%" border="0" cellspacing="7" cellpadding="7">
  <tr>
    <td width="28%">Agent Name </td>
    <td width="4%">:</td>
    <td width="68%"><?php echo $agent_list->name; ?></td>
  </tr>
  <tr>
    <td>Company / Agency Name</td>
    <td>:</td>
    <td><?php echo $agent_list->company_name; ?></td>
  </tr>
 
  <tr>
    <td>Reservation No </td>
    <td>:</td>
    <td><?php 
	if($agent_list->res_no != '')
	{
	$view =  $this->admin_model->transation_detail_new($agent_list->res_no); 
	echo $view->booking_number.' ( '.$view->prn_no.' ) '; 
	}
	else
	{
	echo '-';
	}
	?>
						</td>
  </tr>
  <?php
  if($agent_list->res_no != '')
	{
		?>
  <tr>
    <td>Reservation Status </td>
    <td>:</td>
    <td><?php echo $view->status;
	?> 
						</td>
  </tr>
  <?php
	}
?>
   <tr>
    <td>Category </td>
    <td>:</td>
    <td><?php echo $agent_list->catacery; ?>
						</td>
  </tr>
   <tr>
    <td>Subject </td>
    <td>:</td>
    <td><?php echo $agent_list->subject; ?>
						</td>
  </tr>
  <tr>
    <td>Status </td>
    <td>:</td>
    <td><?php echo $agent_list->status; ?>
						</td>
  </tr>
  
  <tr>
   <td></td>
    <td></td>
    <td>
        <table width="100%"  cellpadding="4"     cellspacing="4">
    <?php
	if($message != '' )
	{
		for($k=0; $k<count($message); $k++)
	{
	?>

    <?php 
	if($message[$k]->process == 'Agent')
	{
	echo '<tr style=" background-color:#A8FFFF" >';
	}
	elseif($message[$k]->process == 'Admin')
	{
		echo ' <tr  style=" background-color:#FEEBCF" >';
	}
	elseif($message[$k]->process == 'Call Center')
	{
		echo ' <tr  style=" background-color:#CCCCFF" >';
	}
	?>
   <td width="16%"><?php echo $message[$k]->process.' Says'; ?></td> <td width="2%" >:</td><td width="82%" ><?php echo $message[$k]->message; ?></td></tr>
    <?php
	}
	if($agent_list->order == 0)
	{
	?>
     <tr><td style=" background-color:#FEF0D6">
    Answer	
    </td><td  style=" background-color:#FEF0D6">:</td><td style=" background-color:#FEF0D6"><textarea name="message" cols="50" rows="8"></textarea></td></tr>
    
    <?php
	}
	}
	?></table>
						</td>
  </tr>
  
  <?php
  
   
   if($agent_list->order == 0)
	{
   
  ?> 
  <tr>
  <td>&nbsp;</td><td>&nbsp;</td><td><input type="image" src="<?php echo WEB_DIR ?>images/save-but.png"  /></td>
  <?php
	}
	?>
</table>

    	
</form>

    
  </div>
  
  
  
    
  
  
  
  
    
    
 
  
  
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
