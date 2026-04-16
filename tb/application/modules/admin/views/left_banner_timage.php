

<script type="text/javascript" src="<?php echo WEB_DIR_FRONT; ?>gui/scripts/jquery-1.4.2.min.js"></script>

<script type="text/javascript">
function agent_change_status(agent_id,status) {

		$.ajax({
		  url:'<?php echo WEB_URL; ?>index/agent_change_status/'+agent_id+'/'+status,
		  data: '',
		  dataType: "json",
		  success: function(result){
			if (result == 'success') {
				window.location = '<?php echo WEB_URL; ?>index/agent_list/';
			}
		  }
		 });
			 
}

function agent_delete(agent_id) {
	
	if (confirm("Are you sure you want to delete this Agent?"))
	{
		$.ajax({
		  url:'<?php echo WEB_URL; ?>index/agent_delete/'+agent_id,
		  data: '',
		  dataType: "json",
		  success: function(result){
			if (result == 'success') {
				window.location = '<?php echo WEB_URL; ?>index/agent_list/';
			}
		  }
		 });
	}
			 
}
</script>
<?php echo $this->load->view('header'); ?>
		<div class="contete_area">
            
                   
                            
                            	
		<div class="content flights">
        <div class="left_al">
        <a href="<?php echo site_url('index/left_banner_image')?>" class="my_prifile_bg">POPULAR HOTEL PACKAGES</a> <!-- <a href="<?php echo site_url('index/agent_list/active')?>" class="my_prifile_bg">FEATURED TOURS
(<?php  ?>)</a>  <a href="<?php echo site_url('index/agent_list/inactive')?>" class="my_prifile_bg">Inactive Agent (<?php ?>)</a>-->
        </div>
        
       <!-- <div class="agent_management">AGENT LIST</div>-->
        <div class="wi680_search_branc">
		
		<div class="tb">
            		<!--<div class="tb_sample_cover">
                    <div class="tb_col_01">Agent ID</div>
                    <div class="tb_col_01">User Name</div>
					<div class="tb_col_01">Company Name</div>
                    <div class="tb_col_01">Contact No</div>
                    <div class="tb_col_01">Email</div>-->
					
                    
                   
                   <!-- <div class="tb_col_01">Acc-Balance</div>
                  
                    <div class="tb_col_01">City</div>-->
                  
                    
                   
                  <!--  <div class="tb_col_01">Action</div>-->
                   
                    
      <form name="form1" action="<?php print WEB_URL?>index/add_left_banner_image" method="post" enctype="multipart/form-data" >             
					
<?php foreach ($left_banner as $row)
{ ?>
				
					
					
                    		<div class="tr_col_01 bl_2" style="width:588px;  min-height: 218px;">
                             <input name="left_div1" type="file"  style="height:20px; background-color:none;"/>
    &nbsp; <img src="<?php print WEB_DIR.$row->img_path_div1;?>"  width="220px"/>
   
    
                            </div>
                            <div class="tr_col_01 bl_1" style="width:588px;  min-height: 218px;">
                             <input name="left_div2" type="file"  style="height:20px; background-color:none;"/>
    &nbsp; <img src="<?php print WEB_DIR.$row->img_path_div2;?>"  width="220px"/>
    </div>
							 <div class="tr_col_01 bl_1" style="width:588px;  min-height: 218px;">
                              <input name="left_div3" type="file"  style="height:20px; background-color:none;"/>
    &nbsp; <img src="<?php print WEB_DIR.$row->img_path_div3;?>"  width="220px"/>
    </div>
                             <div class="tr_col_01 bl_1" style="width:588px;  min-height: 218px;">
                              <input name="left_div4" type="file"  style="height:20px; background-color:none;"/>
    &nbsp; <img src="<?php print WEB_DIR.$row->img_path_div4;?>"  width="220px"/>
     </div>
                            <div class="tr_col_01 bl_1" style="width:588px;  min-height: 218px;">
                             <input name="left_div5" type="file"  style="height:20px; background-color:none;"/>
    &nbsp; <img src="<?php print WEB_DIR.$row->img_path_div5;?>"  width="220px"/>
     </div>
							 <div class="tr_col_01 bl_1" style="width:588px;  min-height: 280px;">
                              <input name="left_div6" type="file"  style="height:20px; background-color:none;"/>
    &nbsp; <img src="<?php print WEB_DIR.$row->img_path_div6;?>"  width="220px"/>
    <?php } ?>
    <input type="hidden" value="<?php echo  $row->img_path_div1;?>" name="s1">
   <input type="hidden" value="<?php echo  $row->img_path_div2;?>" name="s2">
   <input type="hidden" value="<?php echo  $row->img_path_div3;?>" name="s3">
   <input type="hidden" value="<?php echo  $row->img_path_div4;?>" name="s4">
   <input type="hidden" value="<?php echo  $row->img_path_div5;?>" name="s5">
   <input type="hidden" value="<?php echo  $row->img_path_div6;?>" name="s6">
     <br/><br/><br/>
     <input type="image" name="submit" src="<?php echo WEB_DIR ?>images/sub_mint_btn_admin.jpg" width="109" height="35"  value="Submit" /></div>
         </form>          
                    
                   
                   <!-- <div class="tr_col_01 bl_1"></div>-->
                  
                    
                          
                            <!-- <div class="tr_col_01 bl_1">--><!--<a href="#" onclick='agent_change_status( ?>,1);' class="delete_link">Active</a> | <a href="#" onclick='agent_delete(<?php?>);' class="delete_link">Delete</a>-->
                            
								<!--<div class="tr_col_01 bl_1"><a href="#" onclick='agent_change_status(;' class="delete_link">Inactive</a>       -->                      
                           
                    </div>
				
			
                  
          </div>
		  
			

        </div>

        
        </div>
        	<span class="clear"></span>
	  
 
                          <div style="clear:both;"></div>  </div>
                    </div>
          
          


      
      

</div>
<div class="footer">
		<div class="copy">©2012  stayaway com. All rights reserved</div>
</div>
</body>
</html>
