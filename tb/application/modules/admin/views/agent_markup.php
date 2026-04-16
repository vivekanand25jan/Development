<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="<?php echo WEB_DIR_FRONT; ?>css/postion.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo WEB_DIR_FRONT; ?>gui/scripts/jquery-1.4.2.min.js"></script>


</head>

<body>
		<div id="main_continer">
   		  <div cclass="header">
                	<?php echo $this->load->view('header'); ?>
					<a href="<?php echo site_url('index/agent_details/'.$agent_id)?>">Contact Details</a>
<a href="<?php echo site_url('index/agent_deposit_details/'.$agent_id)?>">Credit / Deposit</a>
<a href="<?php echo site_url('index/agent_markup/'.$agent_id)?>">Commission/ Mark up</a>
<a href="<?php echo site_url('index/agent_top_cities/'.$agent_id)?>">Maintain Top City List</a>
            
                    <div class="content_cover">
                            <div class="hotel_right_panel">
                            	
		<div class="content flights">
     
       
        <div class="wi680_search_branc">
		
		<div class="tb">
            		<div class="tb_sample_cover">
					<div class="tb_col_01">API</div>
                    <div class="tb_col_01">Commission (%)</div>
                    <div class="tb_col_01">Markup (%)</div>
					<div class="tb_col_01">Action</div>
					
				
                    
                   
                    </div>
					<?php

					if (!empty($result)) {
					for($i=0;$i< count($result);$i++) { ?>
						<div class="tb_sample_cover211">
						<div class="tr_col_01"><?php echo $result[$i]->api_name; ?></div>
							 <div class="tr_col_01"><?php echo $result[$i]->commission; ?></div>
                             <div class="tr_col_01"><?php echo $result[$i]->markup; ?></div>
                          <div class="tr_col_01">  
						<?php 

						$agent_markup_id = '';
						if (isset($result[$i]->agent_markup_id)) {
							$agent_markup_id = $result[$i]->agent_markup_id;
						}

						echo "<a href='". WEB_URL . "index/edit_agent_markup/" . $agent_id . "/" . $result[$i]->api_id. "'>Edit</a>";	 ?>
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
	  
 
                          <div style="clear:both;"></div>  </div>
                    </div>
          
          


        </div>
        </div>
</body>
</html>
