<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!--sdsdjsajdhsahdjklsahdjkl -->
<style >
.jcarousel-skin-tango .jcarousel-container {
  
}

.jcarousel-skin-tango .jcarousel-direction-rtl {
	direction: rtl;
}

.jcarousel-skin-tango .jcarousel-container-horizontal {
    width: 645px; border:1px solid red;
    padding: 20px 40px;
}

.jcarousel-skin-tango .jcarousel-container-vertical {
    width: 75px;
    height: 245px;
    padding: 40px 20px;
}

.jcarousel-skin-tango .jcarousel-clip {
    overflow: hidden;
}

.jcarousel-skin-tango .jcarousel-clip-horizontal {
    width:  245px;
    height: 75px;
}

.jcarousel-skin-tango .jcarousel-clip-vertical {
    width:  75px;
    height: 245px;
}

.jcarousel-skin-tango .jcarousel-item {
    width: 75px;
    height: 75px;
}

.jcarousel-skin-tango .jcarousel-item-horizontal {
	margin-left: 0;
    margin-right: 10px;
}

.jcarousel-skin-tango .jcarousel-direction-rtl .jcarousel-item-horizontal {
	margin-left: 10px;
    margin-right: 0;
}

.jcarousel-skin-tango .jcarousel-item-vertical {
    margin-bottom: 10px;
}

.jcarousel-skin-tango .jcarousel-item-placeholder {
    background: #fff;
    color: #000;
}

/**
 *  Horizontal Buttons
 */
.jcarousel-skin-tango .jcarousel-next-horizontal {
    position: absolute;
    top: 43px;
    right: 5px;
    width: 32px;
    height: 32px;
    cursor: pointer;
    background: transparent url(next-horizontal.png) no-repeat 0 0;
}

.jcarousel-skin-tango .jcarousel-direction-rtl .jcarousel-next-horizontal {
    left: 5px;
    right: auto;
    background-image: url(prev-horizontal.png);
}

.jcarousel-skin-tango .jcarousel-next-horizontal:hover,
.jcarousel-skin-tango .jcarousel-next-horizontal:focus {
    background-position: -32px 0;
}

.jcarousel-skin-tango .jcarousel-next-horizontal:active {
    background-position: -64px 0;
}

.jcarousel-skin-tango .jcarousel-next-disabled-horizontal,
.jcarousel-skin-tango .jcarousel-next-disabled-horizontal:hover,
.jcarousel-skin-tango .jcarousel-next-disabled-horizontal:focus,
.jcarousel-skin-tango .jcarousel-next-disabled-horizontal:active {
    cursor: default;
    background-position: -96px 0;
}

.jcarousel-skin-tango .jcarousel-prev-horizontal {
    position: absolute;
    top: 43px;
    left: 5px;
    width: 32px;
    height: 32px;
    cursor: pointer;
    background: transparent url(prev-horizontal.png) no-repeat 0 0;
}

.jcarousel-skin-tango .jcarousel-direction-rtl .jcarousel-prev-horizontal {
    left: auto;
    right: 5px;
    background-image: url(next-horizontal.png);
}

.jcarousel-skin-tango .jcarousel-prev-horizontal:hover, 
.jcarousel-skin-tango .jcarousel-prev-horizontal:focus {
    background-position: -32px 0;
}

.jcarousel-skin-tango .jcarousel-prev-horizontal:active {
    background-position: -64px 0;
}

.jcarousel-skin-tango .jcarousel-prev-disabled-horizontal,
.jcarousel-skin-tango .jcarousel-prev-disabled-horizontal:hover,
.jcarousel-skin-tango .jcarousel-prev-disabled-horizontal:focus,
.jcarousel-skin-tango .jcarousel-prev-disabled-horizontal:active {
    cursor: default;
    background-position: -96px 0;
}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Docume	nt</title>
<link href="<?php echo WEB_DIR; ?>css/postion.css" rel="stylesheet" type="text/css" />
 <script type="text/javascript" src="<?php print WEB_DIR; ?>script/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="<?php print WEB_DIR; ?>script/jquery.jcarousel.min.js"></script>
  <script type="text/javascript">
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
  </script>
</head>

<body>
<div id="main_continer">
  <div class="header"> <?php echo $this->load->view('b2b/header'); ?>
    <div class="b2b_banner"><img src="<?php echo WEB_DIR ?>images/b2b_banner.jpg" width="977" height="143" /></div>
    
    <div class="content_continer">
    		<div class="my_bookin_head">Booking Search </div>
          <div class="wi595_cover">
          
            <div class="agent_text_cover">
                                        		<div class="agent_text_cover_L">Booking Id  *</div>
                                                <div class="agent_text_cover_R"><input class="agent_text_cover_txt_feil" name="" type="text" /></div>
                                        </div> 
                                            <div class="agent_text_cover">
                                        		<div class="agent_text_cover_L">Booking Reference *</div>
                                                <div class="agent_text_cover_R"><input class="agent_text_cover_txt_feil" name="" type="text" /></div>
                                        </div> 
                                            <div class="agent_text_cover">
                                        		<div class="agent_text_cover_L">Destination  *</div>
                                                <div class="agent_text_cover_R"><input class="agent_text_cover_txt_feil" name="" type="text" /></div>
                                        </div> 
                                            <div class="agent_text_cover">
                                        		<div class="agent_text_cover_L">User *</div>
                                                <div class="agent_text_cover_R">
                                                 
                                                    <select name="jumpMenu" class="wi_selec_user" id="jumpMenu" onchange="MM_jumpMenu('parent',this,0)">
                                                      <option>Select user</option>
                                                    </select>
                                               
                                                </div>
                                        </div> 
                                            <div class="agent_text_cover">
                                        		<div class="agent_text_cover_L">Passenger Name *</div>
                                                <div class="agent_text_cover_R"><input class="agent_text_cover_txt_feil" name="" type="text" /></div>
                                        </div> 
                                            <div class="agent_text_cover">
                                        		<div class="agent_text_cover_L">Booking Status *</div>
                                                <div class="agent_text_cover_R"> <select name="jumpMenu" class="confi_txt_feil" id="jumpMenu" onchange="MM_jumpMenu('parent',this,0)">
                                                      <option>Select user</option>
                                                    </select></div>
                                        </div> 
                                            <div class="agent_text_cover">
                                        		<div class="agent_text_cover_L">Date Type *</div>
                                                <div class="agent_text_cover_R"><select name="jumpMenu" class="confi_txt_feil" id="jumpMenu" onchange="MM_jumpMenu('parent',this,0)">
                                                      <option>Select user</option>
                                                    </select></div>
                                        </div> 
                                            <div class="agent_text_cover">
                                        		<div class="agent_text_cover_L">Start Date *</div>
                                                <div class="agent_text_cover_R"><input class="agent_text_cover_txt_feil" name="" type="text" /></div>
                                        </div> 
                                        <div class="agent_text_cover">
                                        		<div class="agent_text_cover_L">End Date  *</div>
                                                <div class="agent_text_cover_R"><input class="agent_text_cover_txt_feil" name="" type="text" /></div>
                                        </div>
                                        
                                        
                                        <div class="wiregis_btn"><a href="#"><img src="<?php echo WEB_DIR; ?>images/search_btn_new.jpg" width="109" height="35" /></a></div>
                                        </div>
      
    </div>
    <div class="border_dd"></div>
    <?php echo $this->load->view('b2b/footer'); ?> </div>
</div>
</body>
</html>
