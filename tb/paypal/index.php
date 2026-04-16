<?php
$paypal_url='https://www.paypal.com/cgi-bin/webscr'; // Test Paypal API URL
$paypal_id='elizabeth@travel-bay.com'; // Business email ID
?>
<h4>Welcome, Guest</h4>

<div class="product">            
    <div class="image">
        <img src="http://travel-bay.com/designAccess/images/travel_bay_logo.png" />
    </div>
    <div class="name">
        travel-bay
    </div>
    <div class="price">
        Price:$0.10
    </div>
    <div class="btn">
    <form action="<?php echo $paypal_url; ?>" method="post" name="frmPayPal1">
    <input type="hidden" name="business" value="<?php echo $paypal_id; ?>">
    <input type="hidden" name="cmd" value="_xclick">
    <input type="hidden" name="item_name" value="hotel booking">
    <input type="hidden" name="item_number" value="1">
    <input type="hidden" name="credits" value="510">
    <input type="hidden" name="userid" value="1">
    <input type="hidden" name="amount" value="0.10">
    <input type="hidden" name="cpp_header_image" value="http://travel-bay.com/designAccess/images/travel_bay_logo.png">
    <input type="hidden" name="no_shipping" value="1">
    <input type="hidden" name="currency_code" value="USD">
    <input type="hidden" name="handling" value="0">
    <input type="hidden" name="cancel_return" value="http://travel-bay.com/paypal/cancel.php">
    <input type="hidden" name="return" value="http://travel-bay.com/paypal/success.php">
    <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
    <?php /* ?><img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1"> <?php */ ?>
    </form> 
    </div>
</div>
