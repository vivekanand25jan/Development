<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="<?php echo WEB_DIR; ?>css/style_sheet.css" rel="stylesheet" type="text/css" />
<link href="<?php echo WEB_DIR; ?>css/postion.css" rel="stylesheet" type="text/css" />

</head>
<body>
<?php $this->load->view('b2b/header'); ?>
<div class="midlebody">
  <div class="" style=" float:left; padding-left:5px"> 
  <div style="background-attachment: scroll;
background-clip: border-box;
background-color: transparent;
background-image: none;
background-origin: padding-box;
clear: right;
color: #555;
display: block;
font-family: arial, helvetica, clean, sans-serif;
font-size: 12px;
font-style: normal;
font-variant: normal;
font-weight: normal;
height: 110px;
line-height: 16px;
margin-bottom: 0px;
margin-left: 0px;
margin-right: 0px;
margin-top: 0px;
overflow-x: hidden;
overflow-y: hidden;
padding-bottom: 10px;
padding-left: 10px;
padding-right: 0px;
padding-top: 10px;
position: relative;
width: 932px;">
  <div style="background-attachment: scroll;
background-clip: border-box;
background-color: transparent;
background-image: none;
background-origin: padding-box;
color: #555;
display: block;
font-family: arial, helvetica, clean, sans-serif;
font-size: 12px;
font-style: normal;
font-variant: normal;
font-weight: normal;
height: 116px;
line-height: 16px;
margin-bottom: 0px;
margin-left: 0px;
margin-right: 0px;
margin-top: 0px;
padding-bottom: 0px;
padding-left: 0px;
padding-right: 0px;
padding-top: 0px;
width: 932px;">
    <div style="background-attachment: scroll;
background-clip: border-box;
background-color: transparent;
background-image: none;
background-origin: padding-box;
border-bottom-color: #BFBFBF;
border-bottom-style: solid;
border-bottom-width: 1px;
border-left-color: #BFBFBF;
border-left-style: solid;
border-left-width: 1px;
border-right-color: #BFBFBF;
border-right-style: solid;
border-right-width: 1px;
border-top-color: #BFBFBF;
border-top-style: solid;
border-top-width: 1px;
color: #555;
display: block;
font-family: arial, helvetica, clean, sans-serif;
font-size: 12px;
font-style: normal;
font-variant: normal;
font-weight: normal;
height: 60px;
line-height: 16px;
margin-bottom: 10px;
margin-left: 0px;
margin-right: 0px;
margin-top: 0px;
padding-bottom: 1px;
padding-left: 1px;
padding-right: 1px;
padding-top: 1px;
width: 921px;">
  <table>
    <tbody>
      <tr>
        <td class="msgIcon"><img src="<?php echo WEB_DIR; ?>images/Warning.png"></td>
        <td tabindex="-1" class="noticeTextType1 strongText">
          <strong>ERROR MESSAGE : 
  
  <?php //echo $error; ?>
  <?php if(isset($error) && $error!= ''){ echo $error; } else {?>
              Hotels may close availability or change rates without any notice. If you can´t proceed, either the rate or availability has changed or this could be due to some error. Please search again.<br />
   <?php } ?></strong></td>
      </tr>
    </tbody>
  </table>
</div><div>
      <strong>What now? Call us and we'll help you find a hotel:</strong>
      <ul>
        <li>
          Speak to a Travel Bay.com travel specialist: <strong>1800 102 1122 (India Toll Free) +91 124 487 3878 (From abroad)</strong>,&nbsp;24 Hours,&nbsp;toll free</li>
        </ul>
    </div>
  </div>
  <div class="paginationContainerBottom notVisible">
    <div class="paginationContainerBottom notVisible">
      </div>
  </div>
  <div class="notificationMsg">
    <p id="disclaimer">
      </p>
    </div>
</div><br /></div>
    
</div>
</div></div>
<div style="clear:both"></div>
<?php $this->load->view('b2b/footer'); ?>
</body>
</html>
 