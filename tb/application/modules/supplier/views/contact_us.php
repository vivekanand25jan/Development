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