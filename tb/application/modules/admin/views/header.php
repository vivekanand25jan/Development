 <tr>
            <td id="div-consol-topimg">
            	<span class="admin-txt-mintit">Admin Console</span>
                <span style="float:right; color:#FFF; margin-right:31px;"><a  style="color: #FFF; text-decoration:none;" href='<?php echo site_url('index/dashboard/')?>'  >Home</a> | <a href="<?php echo WEB_URL; ?>index/logout"   style="color: #FFF; text-decoration:none;" >logout</a>
</span>
            </td>
          </tr>
          <tr>
            <td style="text-align:left; height:38px; background-color:#ebeceb; color:#1c1c1c; font-size:11px; padding-right:31px;  border-bottom:1px #aaaaaa solid; border-top:none">
            	<span style=" text-align:left;padding-left:10px">New Booking :  <?php echo $this->admin_model->get_visit_count(); ?>  </span>
                
                <span style=" float:right; margin-left:20px;">&nbsp;Visiter count : <?php echo $this->admin_model->get_visit_count_new(); ?></span>
                <span style=" float:right; margin-left:20px;"><img src="<?php echo WEB_DIR; ?>images/g-r.png" border="0" />&nbsp;Agent Online Now : <?php echo $this->admin_model->get_visit_count_agent(); ?></span>
                <span style=" float:right;"><img src="<?php echo WEB_DIR; ?>images/g-r.png" border="0" />&nbsp;Suppliers Online Now :  <?php echo $this->admin_model->get_visit_count_supplier(); ?></span>
                 
            </td>
          </tr>