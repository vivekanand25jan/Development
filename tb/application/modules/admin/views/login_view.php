<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Console</title>
<link href="<?php echo WEB_DIR; ?>adminstyle.css" rel="stylesheet" type="text/css" />
</head>

<body>
 <div id="div_wrapper">
 	<div id="div_container">
    	<?php echo validation_errors(); ?>
<form action="<?php echo WEB_URL;?>index/login" name="" method="post">
        <table width="392" align="center" border="0" cellpadding="0" cellspacing="0" style="margin-top:150px;">
          <tr>
            <td><img src="<?php echo WEB_DIR; ?>images/login-top-img1.jpg" style="margin-left:-1px"  border="0" /></td>
          </tr>
          <tr>
            <td valign="top" id="div-logcent-strip">
            `	<table width="380" align="center" border="0" cellpadding="3" cellspacing="3">
                  <tr>
                    <td style="padding-left:11px"><input n id="email" name="email" type="text" value="" class="login-txtbox" /></td>
                  </tr>
                  <tr>
                    <td style="padding-left:11px"><input id="password" name="password" type="password" value="" class="login-txtbox" /></td>
                  </tr>
                  <tr>
                    <td align="center"><input type="image" src="<?php echo WEB_DIR; ?>images/login-but1.png"  border="0" /></td>
                  </tr>
                   <tr>
                    <td align="center">&nbsp;</td>
                  </tr>
                  <tr>
                  	<td style="font-size:12px; text-align:center; color:#565656;">Powered by : <a target="_blank" style="text-decoration:none; color:#565656" href="http://provab.com">PROVAB TECHNOSOFT</a></td>
                  </tr>
                </table>
            </td>
          </tr>
          <tr>
            <td><img src="<?php echo WEB_DIR; ?>images/login-bottom-img1.jpg"  border="0" /></td>
          </tr>
        </table>

        </form>
 	</div>
 </div>
</body>
</html>
