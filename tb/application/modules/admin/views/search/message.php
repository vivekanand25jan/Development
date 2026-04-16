
<link type="text/css" href="<?php print WEB_DIR_ADMIN; ?>datepickernew/css/overcast/jquery-ui-1.8.6.custom.css" rel="stylesheet" />
<script type="text/javascript" src="<?php print WEB_DIR_ADMIN; ?>datepickernew/jquery.js"></script>
<script type="text/javascript" src="<?php print WEB_DIR_ADMIN; ?>datepickernew/ui.core.js"></script>
<script type="text/javascript" src="<?php print WEB_DIR_ADMIN; ?>datepickernew/ui.datepicker.js"></script>
<script>
function zeroPad(num,count)
{
	var numZeropad = num + '';
	while(numZeropad.length < count) {
	numZeropad = "0" + numZeropad;
	}
	return numZeropad;
}
function dateADD(currentDate)
{
 var valueofcurrentDate=currentDate.valueOf()+(24*60*60*1000);
 var newDate =new Date(valueofcurrentDate);
 return newDate;
} 

$(document).ready(function(){
			  
			$(function() {
							$( "#datepicker3" ).datepicker({
								changeMonth: true,
								changeYear: true,
								minDate: -30
							});

						});
						
				 $('#datepicker3').change(function(){
				   var selectedDate = $(this).datepicker('getDate');
			       var nextdayDate  = dateADD(selectedDate);
				   var nextDateStr = zeroPad(nextdayDate.getDate(),2)+"/"+zeroPad((nextdayDate.getMonth()+1),2)+"/"+(nextdayDate.getFullYear());
				   
				   $t = nextDateStr;
				   
							$( "#datepicker4" ).datepicker({
								changeMonth: true,
								changeYear: true,
								minDate: $t
							});
				   $( "#datepicker4" ).val($t);
				  });					  
									

} )


$(document).ready(function(){


			$(function() {
							$( "#datepicker" ).datepicker({
								changeMonth: true,
								changeYear: true,
								minDate: 0
							});

						});
						
				 $('#datepicker').change(function(){
				   //$t=$(this).val();
				  // alert($t);
				   var selectedDate = $(this).datepicker('getDate');
			       var nextdayDate  = dateADD(selectedDate);
				   var nextDateStr = zeroPad(nextdayDate.getDate(),2)+"/"+zeroPad((nextdayDate.getMonth()+1),2)+"/"+(nextdayDate.getFullYear());
				   
				   $t = nextDateStr;
							$( "#datepicker1" ).datepicker({
								changeMonth: true,
								changeYear: true,
								minDate: $t
							});
				   $( "#datepicker1" ).val($t);
				  });						

} )


$(document).ready(function(){
			  
			$(function() {
							$( "#datepicker5" ).datepicker({
								changeMonth: true,
								changeYear: true,
								minDate: -30
							});

						});
						
				 $('#datepicker5').change(function(){
				   var selectedDate = $(this).datepicker('getDate');
			       var nextdayDate  = dateADD(selectedDate);
				   var nextDateStr = zeroPad(nextdayDate.getDate(),2)+"/"+zeroPad((nextdayDate.getMonth()+1),2)+"/"+(nextdayDate.getFullYear());
				   
				   $t = nextDateStr;
				   
							$( "#datepicker6" ).datepicker({
								changeMonth: true,
								changeYear: true,
								minDate: $t
							});
				   $( "#datepicker6" ).val($t);
				  });					  
									

} )
	</script>
    
<script type="text/javascript" src="<?php print WEB_DIR_ADMIN; ?>tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "exact",
		 elements : "desc",

		theme : "advanced",
	plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",


      theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,spellchecker,|,cite,abbr,acronym,del,ins,attribs,|,insertfile,insertimage",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,
		file_browser_callback : "ajaxfilemanager",
		content_css : "css/example.css",
		template_external_list_url : "js/template_list.js",
		external_link_list_url : "js/link_list.js",
		external_image_list_url : "js/image_list.js",
		media_external_list_url : "js/media_list.js",
		relative_urls : false,
		remove_script_host : false,
		// Replace values for the template plugin
		template_replace_values : {
		username : "Some User",
		staffid : "991234"
		}

	});
	
	function ajaxfilemanager(field_name, url, type, win) {
			var ajaxfilemanagerurl = "<?php print WEB_DIR_ADMIN; ?>tiny_mce/plugins/ajaxfilemanager/ajaxfilemanager.php?editor=tinymce";
			switch (type) {
				case "image":
					break;
				case "media":
					break;
				case "flash": 
					break;
				case "file":
					break;
				default:
					return false;
			}
            tinyMCE.activeEditor.windowManager.open({
                url: "<?php print WEB_DIR_ADMIN; ?>tiny_mce/plugins/ajaxfilemanager/ajaxfilemanager.php?editor=tinymce",
                width: 782,
                height: 440,
                inline : "yes",
                close_previous : "no"
            },{
                window : win,
                input : field_name
            });
		}
</script>    
<script type="text/javascript">
function valid()
{
	 fname=document.advance_search;
	var val=fname.sel_date_type.value;
	if(val!=''){
		
	if(fname.fdate.value=='')
	{
	alert('Please Select From date');
	fname.fdate.focus();
	return false;
	}
	if(fname.tdate.value=='')
	{
	alert('Please Select To Date');
	fname.tdate.focus();
	return false;
	}
	if (CompareDates(fname.tdate.value,fname.fdate.value))
	{
	alert("From  Date cannot be greater than To Date"); 
	fname.tdate.focus();        
	return false; 
	}
	}


}
function CompareDates(str1,str2) 
        { 
            var dt1  = parseInt(str1.substring(0,2),10); 
            var mon1 = parseInt(str1.substring(3,5),10); 
            var yr1  = parseInt(str1.substring(6,10),10); 
            var dt2  = parseInt(str2.substring(0,2),10); 
            var mon2 = parseInt(str2.substring(3,5),10); 
            var yr2  = parseInt(str2.substring(6,10),10); 
            var date1 = new Date(yr1, mon1, dt1); 
            var date2 = new Date(yr2, mon2, dt2); 
        
            if(date2 < date1) 
            { 
                return false; 
            } 
            else 
            { 
                return true; 
            } 
        } 

</script>
 <div class="clr"></div>
        <div class="mdle_container"><!--mdle container start-->
        	<div class="agent_dash_out">
            	
                <div class="agent_account_depo-right">
                	<div class="agent_dash-box-out-3">
                   	  <div class="notice_dash-box-title-red-3">
                        	<div class="agent_dash-box-titile-txt-3">Add Message</div>
                      </div>
					  
                   	  <div class="agent_dash-box-txt-3">
                      <?php
					  if($edit_notice!='')
					  {
					  foreach($edit_notice as $val)
					  {
					  ?>
					  <form action="<?php print WEB_URL_ADMIN ?>admin/update_message/<?php echo $val->mesg_id; ?>" method="post" name="form1">
                      
   	      <div class="agent_acc_depo-h1-out-2">
                        	<div class="agent_acc_depo-h1-left">Date  :</div>
                    <div class="agent_acc_depo-h1-right">
                            <div class="agent_acc_depo-h1-right-in">
    	                        <label>  <input type="text" name="sd" id="datepicker3" readonly="readonly" size="8" onchange="reserveddate()" value="<?php echo $val->date_on; ?>"/>    <img src="<?php print WEB_DIR_ADMIN; ?>images/cal.gif" alt="" border="0" /> </label>
                            </div>
                            <div class="agent_acc_depo-h1-right-fld-icon">
                            </div>
              </div>
                        </div>
                        
<div class="agent_acc_depo-h1-out-2">
                        	<div class="agent_acc_depo-h1-left">Title</div>
                    <div class="agent_acc_depo-h1-right">
                            <div class="agent_acc_depo-h1-right-in">
    	                       <input type="text" name="title" value="<?php echo $val->title; ?>">
                            </div>
                            <div class="agent_acc_depo-h1-right-fld-icon">
                            </div>
              </div>
                        </div>                        
                        <div class="agent_acc_depo-h1-out-2">
                        	<div class="agent_acc_depo-h1-left">Message :</div>
                            <div class="agent_acc_depo-h1-right">
                            <div class="agent_acc_depo-h1-right-in">
    	                         <textarea name="desc" id="desc" ><?php echo $val->desc; ?></textarea> 
                            </div>
                            <div class="agent_acc_depo-h1-right-fld-icon"><!--<input type="image" src="images/calendar_day.png"  />-->
                            </div>
                          </div>
                        </div>
                        <div class="agent_acc_depo-sumit"><input type="image" onclick="javascript:document.form1.submit()" src="<?php print WEB_DIR_ADMIN?>images/submit.jpg"  />
                        </div>
						</form>
                        <?php } }
						else
						{ ?>
                        <form action="<?php print WEB_URL_ADMIN ?>admin/add_message" method="post" name="form1">
                      
   	      <div class="agent_acc_depo-h1-out-2">
                        	<div class="agent_acc_depo-h1-left">Date  :</div>
                    <div class="agent_acc_depo-h1-right">
                            <div class="agent_acc_depo-h1-right-in">
    	                        <label>  <input type="text" name="sd" id="datepicker3" readonly="readonly" size="8" onchange="reserveddate()" />    <img src="<?php print WEB_DIR_ADMIN; ?>images/cal.gif" alt="" border="0" /> </label>
                            </div>
                            <div class="agent_acc_depo-h1-right-fld-icon">
                            </div>
              </div>
                        </div>
                        
<div class="agent_acc_depo-h1-out-2">
                        	<div class="agent_acc_depo-h1-left">Title</div>
                    <div class="agent_acc_depo-h1-right">
                            <div class="agent_acc_depo-h1-right-in">
    	                       <input type="text" name="title">
                            </div>
                            <div class="agent_acc_depo-h1-right-fld-icon">
                            </div>
              </div>
                        </div>                        
                        <div class="agent_acc_depo-h1-out-2">
                        	<div class="agent_acc_depo-h1-left">Message :</div>
                            <div class="agent_acc_depo-h1-right">
                            <div class="agent_acc_depo-h1-right-in">
    	                         <textarea name="desc" id="desc" ></textarea> 
                            </div>
                            <div class="agent_acc_depo-h1-right-fld-icon"><!--<input type="image" src="images/calendar_day.png"  />-->
                            </div>
                          </div>
                        </div>
                        <div class="agent_acc_depo-sumit"><input type="image" onclick="javascript:document.form1.submit()" src="<?php print WEB_DIR_ADMIN?>images/submit.jpg"  />
                        </div>
						</form>
					<?php	}
						?>
                        <form name="advance_search" action="<?php print WEB_URL_ADMIN ?>admin/advanced_search_booking" method="post" >
                        <div class="notice_acc_depo-h1-out-3">Messages</div>
                        
                        <div class="agent_acc_depo-h1-out-2">
<table width="897px" border="1" cellspacing="1" cellpadding="1">
  <tr>
    <th height="20" bgcolor="#CCCCCC">Date</th>
    <th height="20" bgcolor="#CCCCCC">Title</th>
    <th height="20" bgcolor="#CCCCCC">Message</th>
    <th height="20" bgcolor="#CCCCCC">Action</th>
  </tr>
  <?php 
  
  if(isset($result) && $result!='')
  { 
  foreach($result as $row)
  { 
  ?>
  <tr>
    <td height="20" bgcolor="#F0F0F0"><?php print $row->date_on; ?></td>
    <td height="20" bgcolor="#F0F0F0"><?php print $row->title; ?></td>
    <td height="20" bgcolor="#F0F0F0"><?php print $row->desc; ?></td>
    <td height="20" align="center" bgcolor="#F0F0F0"><a href="<?php print WEB_URL_ADMIN.'admin/delete_message/'.$row->mesg_id; ?>">delete</a> &nbsp; <a href="<?php print WEB_URL_ADMIN.'admin/view_edit_message/'.$row->mesg_id; ?>">Edit</a></td>
  </tr>
  <?php } }
  else
  {?>
   <tr>
    <td height="20" bgcolor="#F0F0F0" colspan="4">No Records Found</td>
   
  </tr>
  <?php }
   ?>
</table>
                        </div>
          
                        
                        
                        <div class="clr"></div>
						</form>
                        
						</div>
                	</div>
                </div>
            </div>
			
            <div class="clr"></div>
            	
			</div>
		       <div class="clr"></div>	