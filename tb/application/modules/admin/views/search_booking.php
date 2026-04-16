<?php echo $this->load->view('header'); ?>
            
<script type="text/javascript" src="<?php echo WEB_DIR_FRONT; ?>script/jquery-1.4.2.min.js"></script>

<link type="text/css" href="<?php echo WEB_DIR_FRONT; ?>datepickernew/css/overcast/jquery-ui-1.8.6.custom.css" rel="stylesheet" />
<script type="text/javascript" ssrc="<?php echo WEB_DIR_FRONT; ?>datepickernew/jquery.js"></script>
<script type="text/javascript" src="<?php print WEB_DIR_FRONT; ?>datepickernew/ui.core.js"></script>
<script type="text/javascript" src="<?php print WEB_DIR_FRONT; ?>datepickernew/ui.datepicker.js"></script>

<script>

$(document).ready(function () {
	
	$('#download_report').click(function () {
		
		var booking_number = $("#booking_number").val();
		var passenger_name = $("#passenger_name").val();
		var booking_status = $("#booking_status").val();
		var sel_date_type = $("#sel_date_type").val();
		var datepicker5 = $("#datepicker5").val();
		var datepicker6 = $("#datepicker6").val();
		var agent = $("#agent").val();
		var api = $("#api").val();
		//alert(booking_status);
		
		
		window.location = "<?php echo WEB_URL; ?>index/download_report?booking_number="+booking_number+"&passenger_name="+passenger_name+"&booking_status="+booking_status+"&sel_date_type="+sel_date_type+"&fdate="+datepicker5+"&todate="+datepicker6+"&agent="+agent+"&api="+api;
	});

});

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

	

<div class="contete_area">
		
                	
                    
        <form action="<?php echo WEB_URL.'index/search_booking/'; ?>" method="post"  name="reg" >
				
				
        		<div class="tb_sample_cover_thre">
                		<div class="tb_sample_cover_thre_L"> Booking Number :</div>
                        <div class="tb_sample_cover_thre_R"><input class="agent_text_cover_txt_feil" id="booking_number" name="booking_number" type="text" value="<?php if( isset($booking_number)) echo $booking_number; ?>" />
						
						</div>
                </div>
				
				<div class="tb_sample_cover_thre">
                		<div class="tb_sample_cover_thre_L"> Agent :</div>
                        <div class="tb_sample_cover_thre_R">
						
						<select id='agent' name='agent' style="width:150px; font-size:11px; height:20px; padding:1px;">
						<option value=''>Select Agent</option>
						<?php
							
							for ($i = 0; $i < count($agent); $i++) {
								$agent_select = '';
								if($agent[$i]->agent_id == $agent_id) {
									$agent_select = 'selected';
								}
								echo "<option value='" . $agent[$i]->agent_id . "'" . $agent_select . ">" . $agent[$i]->name."</option>";
							}
						?>
						</select>
						
						</div>
                </div>

				<div class="tb_sample_cover_thre">
                		<div class="tb_sample_cover_thre_L"> API :</div>
                        <div class="tb_sample_cover_thre_R">
						<select id='api' name='api' style="width:150px; font-size:11px; height:20px; padding:1px;">
						<option value=''>Select API</option>
						<?php
							
							for ($i = 0; $i < count($api); $i++) {
								$api_select = '';
								if($api[$i]->api_id == $api_id) {
									$api_select = 'selected';
								}
								echo "<option value='" . $api[$i]->api_id . "' ". $api_select . ">" . $api[$i]->api_name."</option>";
							}
						?>
						</select>
						
						</div>
                </div>
				
				<div class="tb_sample_cover_thre">
                		<div class="tb_sample_cover_thre_L"> Passenger Name : </div>
                        <div class="tb_sample_cover_thre_R"><input class="agent_text_cover_txt_feil" id="passenger_name" name="passenger_name" type="text" value="<?php if( isset($passenger_name)) echo $passenger_name; ?>" />
						
						</div>
                </div>
				
				
                <div class="tb_sample_cover_thre">
                		<div class="tb_sample_cover_thre_L"> Booking Status : </div>
                        <div class="tb_sample_cover_thre_R">
						<?php
							$select_confirmed = "";
							$select_cancelled = "";
							if( isset($booking_status)) {
								if ($booking_status == 'confirmed') {
									$select_confirmed = "selected";
								} elseif ($booking_status == 'cancelled') {
									$select_cancelled = "selected";
								}
							}
						?>
						<select class="agent_acc_depo-h1-right-fld-3" id="booking_status" name="booking_status">
                           <option value="">Select Booking Status</option>
                              <option value="confirmed" <?php echo $select_confirmed; ?>>Confirmed</option>
                                 <option value="cancelled" <?php echo $select_cancelled; ?>>Cancelled</option>
                              </select>
						
						</div>
                </div>
				
				
				<div class="tb_sample_cover_thre">
                		<div class="tb_sample_cover_thre_L"> Date Type : </div>
                        <div class="tb_sample_cover_thre_R">
						<?php
							$select_checkin = "";
							$select_checkout = "";
							if( isset($sel_date_type)) {
								if ($sel_date_type == 1) {
									$select_checkin = "selected";
								} elseif ($sel_date_type == 2) {
									$select_checkout = "selected";
								}
							}
						?>
						 <select class="agent_acc_depo-h1-right-fld-3" id="sel_date_type" name="sel_date_type" >
                         <option value="">Select Date Type</option>
                              <option value="1" <?php echo $select_checkin; ?>>Check in date</option>
                                <option value="2" <?php echo $select_checkout; ?>>Booking Date</option>
                              </select>  
							  
						
						</div>
                </div>
				
				
				<div class="tb_sample_cover_thre">
                		<div class="tb_sample_cover_thre_L"> Start Date : </div>
                        <div class="tb_sample_cover_thre_R">
						 
							  <input name="fdate" type="text" value="<?php if( isset($fdate)) echo $fdate; ?>" id="datepicker5" maxlength="10" size="7"/>	
						<div style="color:#FF0000;"> <?php echo form_error('fdate');?>
						</div>
                </div>
				</div>
				
				<div class="tb_sample_cover_thre">
                		<div class="tb_sample_cover_thre_L"> End Date : </div>
                        <div class="tb_sample_cover_thre_R">
						 
							  <input name="tdate" type="text" value="<?php if( isset($tdate)) echo $tdate; ?>" id="datepicker6" maxlength="10" size="7" />	
						<div style="color:#FF0000;"> <?php echo form_error('tdate');?>
						</div>
                </div>
				</div>
				<?php
					$method_name = $this->uri->segment(2);
				?>
				<input type="hidden" name='booking_type' value='<?php echo $method_name; ?>'>
				

				

        
        <div class="tb_sample_cover_thre">
                		<div class="tb_sample_cover_thre_L" style="line-height:25PX;"> &nbsp;</div>
                        <div class="tb_sample_cover_thre_R"><input type="image" src="<?php echo WEB_DIR_FRONT ?>images/search_btn_new.jpg" width="109" height="35" /></div>
          </div>
		  </form>
        
       
	  
 
                            
					<!-- Search result start -->
						  <div class="tb" style='width:1000px;'>
						  <div style='text-align:right;'><a id="download_report" href="javascript:void(0);">Download Report</a></div>
            		<div class="tb_sample_cover" style='width:1000px;'>
                    <div class="tb_col_01">Booking Number</div>
                    <div class="tb_col_01">Amount</div>
					 <div class="tb_col_01">Net Amount</div>
					<div class="tb_col_01">Booking Date</div>
                    <div class="tb_col_01">Check-in</div>
					<div class="tb_col_01">Check-out</div>
					<div class="tb_col_01">Status</div>
					<div class="tb_col_01">Cancel Till</div>
					<div class="tb_col_01">Action</div>
                    
					<?php
					//print_r($result);
					if (!empty($result)) {
					for($i=0;$i< count($result);$i++) { ?>
						<div class="tb_sample_cover211" style='width:1000px;'>
                    		<div class="tr_col_01 bl_2"><?php echo $result[$i]->booking_number; ?></div>
                            <div class="tr_col_01 bl_1"><?php echo $result[$i]->amount; ?></div>
							 <div class="tr_col_01 bl_1"><?php echo $result[$i]->net_amount; ?></div>
							 <div class="tr_col_01 bl_1"><?php echo $result[$i]->created_date; ?></div>
							 
							 <div class="tr_col_01 bl_1"><?php echo $result[$i]->check_in; ?></div>
                            <div class="tr_col_01 bl_1"><?php echo $result[$i]->check_out; ?></div>
							 <div class="tr_col_01 bl_1"><?php echo $result[$i]->status; ?></div>
							 <div class="tr_col_01 bl_1"><?php echo $result[$i]->cancel_tilldate; ?></div>
							 <div class="tr_col_01 bl_1"><a href="<?php echo WEB_URL . 'index/voucher_print/' . $result[$i]->hotel_booking_id; ?>" target="_new">Voucher</a></div>
							 
                            
                        
                    </div>
				<?php } 
				} else { 
					echo 'Result not found';
				}
				?>
                  
        </div></div>
					<!-- Search result end -->
						
          
          
         
        </div>
        <div class="footer">
		<div class="copy">©2012  stayaway com. All rights reserved</div>
</div>
</body>
</html>
