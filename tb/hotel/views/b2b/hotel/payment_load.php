<?php
/*if($_SERVER["HTTPS"] != "on") {
   header("Location: https://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"]);
   exit();
}*/
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Travel Bay</title>
<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.tableborder{
 	border:#333333 solid 1px;
	margin-top:150px;
}
.underline{
	height:20px;
}
.text{
	font-family:MAIAN;
	font-size:15px;
	color:#cb1a0e;
}
.textss{
	font-family:MAIAN;
	font-size:18px;
	color:#cb1a0e;
}
.textBlack{
	font-family:MAIAN;
	font-size:14px;
	color:#cb1a0e;
}	
#load{
position:absolute;
z-index:1;
border:3px double #999;
background:#f7f7f7;
width:300px;
height:300px;
margin-top:-150px;
margin-left:-150px;
top:55%;
left:50%;
text-align:center;
line-height:300px;
font-size:18pt;
}
</style>
<script type="text/javascript">
function calc()
{
	//vent=window.open('','tpv','width=725,height=600,scrollbars=no,resizable=yes,status=yes,menubar=no,location=no');
	document.forms[0].submit();
}
</script>
</head>

<body onLoad="calc();">

<form name="compra" action="<?php echo WEB_URL ?>adaptive_payments/Pay_chained_demo" method="post" target="_parent">
<table>
<tr><td><input type="hidden" name="total_amount" value='<?php echo $_SESSION['book_final_book_val']['amount'];?>'></td></tr>
<tr><td><input type="hidden" name="currency" value='<?php echo $this->session->userdata('currency_type');?>'></td></tr>
<tr><td><input type="hidden" name="room_type" value='<?php echo $_SESSION['book_final_book_val']['room_type'];?>'></td></tr>
<tr><td><input type="hidden" name="agent_id"  value='<?php echo $this->session->userdata('agent_id');?>'></td></tr>
<tr><td><input type="hidden" name="pay_res_id"  value='<?php echo $_SESSION['pay_res_id'];?>'></td></tr>
<tr><td><input type="hidden" name="parent_transaction_id"  value='<?php echo $_SESSION['parent_transaction_id'];?>'></td></tr>
</td></tr>
</table>
</form>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>&nbsp;</td>
    <td align="center" valign="middle"><table width="618" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="616" height="84" align="center" valign="top"><img src="<?php echo WEB_DIR; ?>designAccess/images/travel_bay_logo.png" border="0"/></td>
      </tr>
      <?php if(isset($error) && $error!= ''){ ?>
      <tr>
        <td height="30" align="center" valign="baseline" class="underline">&nbsp;</td>
      </tr>
      <tr>
        <td height="30" align="center" valign="baseline" class="textss"><p><?php if(isset($error) && $error!= ''){ echo 'ERROR MESSAGE :'. $error; } ?></p></td>
      </tr>
      <?php } ?>
      <tr>
        <td height="30" align="center" valign="baseline" class="underline">&nbsp;</td>
      </tr>
      <tr>
        <td height="30" align="center" valign="baseline" class="text"><p>Please do not refresh the screen or press backspace key, as we are currently redirecting to your payment page.</p></td>
      </tr>
      <tr>
        <td height="100" align="center" valign="middle"><img src="<?php echo WEB_DIR; ?>images/ajax-loader(2).gif"/></td>
      </tr>
      <tr>
        <td height="30" align="center" valign="baseline"><table width="90%" border="0" align="center" cellpadding="0" cellspacing="4">
          <tr>
            <td align="center" class="textBlack">You Pay Amount is <?php echo $this->session->userdata('currency_type');?> <?php echo $_SESSION['book_final_book_val']['amount'];?> </td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="30" align="center" valign="baseline">&nbsp;</td>
      </tr>
    </table></td>
    <td>&nbsp;</td>
  </tr>
</table>
						  
</body>
</html>
