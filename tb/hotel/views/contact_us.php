<?php /*?><style>
		.contact{
			display: none;
			position: absolute;
			top: -10%;
			left: 0%;
			width: 100%;
			height:1900px;
			background-color: black;
			z-index:1001;
			-moz-opacity: 0.8;
			opacity:.80;
			filter: alpha(opacity=80);
		}
		.contacttcont {
			display: none;
			position: absolute;
			top: 25px;
			left: 25%;
			width: 650px;
			height: 500px;
			padding: 16px;
			border: 5px solid #63701E;
			border-radius:5px;
			background-color: white;
			z-index:1002;
			overflow: auto;
		}
</style>
<div id="light4" class="contacttcont"  style="width:625px;">
<div style="width:40px; position:relative; left:90px; height:40px; margin-top:-18px;">
        <a class="close_btn" href="javascript:void(0)" onclick ="document.getElementById('light4').style.display='none';document.getElementById('fade4').style.display='none'"> &nbsp; </a>
    </div>

<div >

    
   		<!--<div class="right-hotel-name">Youngor Central Suzhou</div>-->
         <form  method="post"  name="reg"  onsubmit="javscript:return contact_form_submit();">
          <table width="600" border="0" cellspacing="3" cellpadding="5" class="r-hoteldeta" >
          <tr>	
          <td>	</td>
            <td width="680" valign="top"  class="" id="contact_res" >
           		
            </td>
            </tr>
         <tr>
       </table>
         <table width="600" border="0" cellspacing="3" cellpadding="5" class="r-hoteldeta">
          <tr>	
          <td>	<img width="250" src="<?php echo WEB_DIR; ?>images/about.png" /></td>
            <td width="680" valign="top"  class="">
            <span class="right-hotel-name" style="font-size:26px; color:#243419;font-weight:bold;">
            Contact Us </span><br />
            </td>
            </tr>
         <tr>
       </table>
    	<table width="600" border="0" cellspacing="5" cellpadding="5" style="color:#243419">
              <tr>
    <td valign="top">Name</td>
    <td valign="top">:</td>
   <?php if(isset($_SESSION['agent_logged_in'])){?>
    <td>
    <input type="text" name="person_name" style="width:200px" value="<?php if(isset($name)){ echo $name;  } else { echo $fname.$lname; }?>" id="contact_name"   readonly="readonly" required /><br />
<p>  <font color="#FF0000">  <?php echo form_error('name'); ?></font></p></td>
<?php } else {?>

<td>
    <input type="text" name="person_name" style="width:200px"  value="<?php if(isset($name)) echo $name; ?>"  id="contact_name" required/><br />
<p>  <font color="#FF0000">  <?php echo form_error('name'); ?></font></p></td>
<?php } ?>
  </tr>
  <tr>
    <td valign="top">Email Address</td>
    <td valign="top">:</td>
     <?php if(isset($_SESSION['agent_logged_in'])){?>
  <td><input type="email" name="email" style="width:200px" value="<?php if(isset($email)){ echo $email;} else { echo $email; } ?>" id="contact_email" readonly="readonly" required /><br />
   <p> <font  color="#FF0000">  <?php echo form_error('email'); ?></font></p></td>
   <?php } else {?>
   
   <td><input type="email" name="email" style="width:200px" value="<?php if(isset($email)) echo $email; ?>" id="contact_email" required /><br />
   <p> <font  color="#FF0000">  <?php echo form_error('email'); ?></font></p></td>
   <?php } ?>
  </tr>
   <tr>
     <td valign="top">Questions/Problems/Feedback</td>
     <td valign="top">:</td>
     <td><textarea cols="30" rows="8" name="comm" id="contact_comm" required><?php if(isset($comm)) echo $comm; ?></textarea><br />
    <p><font color="#FF0000">  <?php echo form_error('comm'); ?></font></p></td>
   </tr>
   
  <tr>
  <td>&nbsp;</td>  <td>&nbsp;</td>  <td>
  <br>
 <blink><font color="#990000"><?php  if(isset($exits)) { echo $exits; } ?></font></blink><br />
  <input type="image" src="<?php echo WEB_DIR; ?>account_gui/images/send_btn.jpg" /></td>
</table>
        

</form>    </div>
</div>

<div id="fade4" class="contact"></div>
<script>
function contact_form_submit()
  {
	
	 var str1 = document.getElementById('contact_name').value;
	 var str2 = document.getElementById('contact_email').value;
	 var str3 = document.getElementById('contact_comm').value;
	
	
      if (window.XMLHttpRequest)
          {// code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp=new XMLHttpRequest();
		   
          }
        else
          {// code for IE6, IE5
          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
          }
        xmlhttp.onreadystatechange=function()
          {
			 //alert(str1);
          if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
				var t=xmlhttp.responseText;
				alert(t);
				if(xmlhttp.responseText!=''){
					
			    	document.getElementById("contact_res").innerHTML=xmlhttp.responseText;
				}
            }
          }
			
		xmlhttp.open("POST","<?php print WEB_URL ?>hotel/contact_process/"+str1+"/"+str2+"/"+str3,true);
        //xmlhttp.open("POST","<?php print WEB_URL ?>hotel/all_filter_new1/"+id,true);
        xmlhttp.send(); //ddd
  }
</script><?php */?>
<style>

#lightbox{ background:url(<?php echo WEB_DIR ?>images/overlay.png); width:100%; 
height:1900px; display:none; z-index:99999; background-position:left; position:absolute; top:0%; left:0%;}
body{
margin-top:0px;

}
</style>
<style>
a{
 text-decoration:none;
 color:#0A85C8;
}
</style>

<div id="lightbox" align="center"><table align="center" cellpadding="0" cellspacing="0" height="100%" border="0">
<tr><td valign="middle"><div align="right" style="background-color:#FFF; border: 5px solid #63701E; width:600px; margin:0px auto; position: fixed; top:25px; left:32%; ">

<a href="javascript:void(o);" onClick="$('#light_box').attr('src','');$('#lightbox').hide();" class="ac_det"><div align="right" style="color:#069; font-size:14px; height:14; width:14; padding:5px 5px 0px 10px; "  ><img border="0" src="<?php echo WEB_DIR ?>images/Close-button1.png" height="15px" width="55" style="padding:5px 5px 0px 10px; float:right;"/>&nbsp;&nbsp;&nbsp;</div></a>
<iframe src="" id="light_box" name="light_box" frameborder="0" width="600px" height="600px" scrolling="no" style="background-color: #FFFFFF">
</iframe></div></td></tr></table></div>