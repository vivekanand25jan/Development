<?php echo $this->load->view('header'); ?>
<script type="text/javascript" src="<?php echo WEB_DIR_FRONT; ?>gui/scripts/jquery-1.4.2.min.js"></script>


        <div class="contete_area">        	
					
            
                  
                          
                            	
		<div class="content flights">
     
       
        <div class="wi680_search_branc">
		
		<div class="tb">
            		<div class="tb_sample_cover">
					<div class="tb_col_01">Name</div>
					<div class="tb_col_01">Email</div>
					<div class="tb_col_01">Amount</div>
					<div class="tb_col_01">Date</div>
					<div class="tb_col_01">Mode</div>
					<div class="tb_col_01">Status</div>
                    <div class="tb_col_01">Action</div>
					
				
                    
                   
                    </div>
					<?php

					if (!empty($result)) {
					for($i=0;$i< count($result);$i++) { ?>
						<div class="tb_sample_cover211">
						<div class="tr_col_01 bl_2"><?php echo $result[$i]->name; ?></div>
							 <div class="tr_col_01 bl_1"><?php echo $result[$i]->email_id; ?></div>
						 <div class="tr_col_01 bl_1"><?php echo $result[$i]->amount_credit; ?></div>
						   <div class="tr_col_01 bl_1"><?php echo $result[$i]->deposited_date; ?></div>
						    <div class="tr_col_01 bl_1"><?php echo $result[$i]->deposit_type; ?></div>
							<div class="tr_col_01 bl_1"><?php echo $result[$i]->status; ?></div>
                             
                          <div class="tr_col_01 bl_1">  
						<?php 
						if ($result[$i]->status == 'Pending') {
							echo "<a href='". WEB_URL . "index/edit_deposit_request/" . $result[$i]->deposit_id . "'>Edit</a>";	 
							//echo "<a href='#'>Edit</a>";	 
						}
						?>
						
						</div>
                    
                            
                    </div>
				<?php }
				} else { 
					echo 'Result not found';
				}
				?>
                  
          </div>
		  
			

        </div>

        
        </div>
        	<span class="clear"></span>
	  
 
                         
                   
          </div>
          
<div class="footer">
		<div class="copy">©2012  stayaway com. All rights reserved</div>
</div>

        
</body>
</html>
