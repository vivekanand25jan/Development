<style>
		.about{
			display: none;
			position: absolute;
			top: 0%;
			left: 0%;
			width: 100%;
			height: 1500px;
			background-color: black;
			z-index:1001;
			-moz-opacity: 0.8;
			opacity:.80;
			filter: alpha(opacity=80);
		}
		.aboutcont {
			display: none;
			position: fixed;
			top: 100px;
			left: 25%;
			width: 650px;
			height: 420px;
			padding: 16px;
			border: 5px solid #63701E;
			border-radius:5px;
			background-color: white;
			z-index:1002;
			overflow: auto;
		}
</style>
<div id="light1" class="aboutcont"  style="width:610px;">
<div style="width:40px; position:relative; left:75px; height:40px; margin-top:-18px;">
        <a  href="javascript:void(0)" onclick ="document.getElementById('light1').style.display='none';document.getElementById('fade1').style.display='none'"> <div align="right" style="color:#069; font-size:14px; height:14; width:14; padding:5px 5px 0px 10px; margin-right:-500px; "  ><img border="0" src="<?php echo WEB_DIR ?>images/Close-button1.png" height="15px" width="55" style="padding:5px 5px 0px 10px; float:right;"/>&nbsp;&nbsp;&nbsp;</div> </a>
    </div>

<div >

    
   		<!--<div class="right-hotel-name">Youngor Central Suzhou</div>-->
         <form action="<?php echo WEB_URL.'home/registration_process'; ?>" method="post"  name="reg" >
         <table width="600" border="0" cellspacing="3" cellpadding="5" class="r-hoteldeta">
          <tr>	
          <td>	<img width="250" src="<?php echo WEB_DIR; ?>images/about.png" /></td>
            <td width="680" valign="top"  class="">
            <span class="right-hotel-name" style="font-size:26px; color:#243419;font-weight:bold;">
            About Us </span><br /><br />
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<p><font color="#333333" >Over 30 years' experience of acting as an agency for the renting and letting of holiday homes, starting with 300 owners of around 550 holiday homes have entrusted us to deal with the letting of their accommodations. Over the years we have gained a thorough knowledge and premier customer service experience in the industry, we are now expanding to hotel reservation portal to provide quality, customer service and competitive price to give you a memorable experience for your next holiday or business trip. 
<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
For us at travelbay.com, the host and guest are the focus of our attention, our goal is to give you the best and effortless experience possible as we collaborate with a wide number of accommodation booking agencies and travel agencies in all the countries to find you the best deals according to your budget and needs. Check with us as we expand our services and features to provide you a complete service experience for your travel needs.
           </font>                   </p></td>
          </tr>
        </table>

</form>    </div>
</div>

<div id="fade1" class="about"></div>