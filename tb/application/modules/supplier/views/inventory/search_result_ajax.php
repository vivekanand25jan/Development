<?php
	//$result = $this->Hotel_Model->fetch_gta_temp_result($_SESSION['ses_id']);

//echo "<pre/>";print_r($result);

	$room_count = $_SESSION['room_count'];
if($result != '')
{
	$count = count($result);
	if($count > 10)
	{
		$count_val = 10;
	}
	else
	{
		$count_val = count($result);
	}
	
	for($i=0;$i< $count_val;$i++)
	{	
		 $val= $result[$i]->room_type;
		$val1=explode("-",$val);

		 $sql="SELECT DISTINCT(allocation_rooms) FROM sup_inv_cate_allotment WHERE hotel_id='".$result[$i]->hotel_id."' AND cat_type='".$val1[0]."'";
		//echo $sql="SELECT DISTINCT(allocation_rooms) FROM sup_inv_cate_allotment WHERE hotel_id=6 AND cat_type='Superior Room'";
		$query=$this->db->query($sql);
		$res=$query->result();
		
		//echo $res->allocation_rooms;exit;
		//for ($m=0;$m<count())
	 $allot_value= $res[0]->allocation_rooms;
		//if($allot_value>0)
		//{ //echo "helllooo";
		if($result[$i]->hotel_name !='')
		{
	//if($result[$i]->api == 'hotelspro' || $result[$i]->api == 'gta')	
	//{
?>
<div class="hotelnames">
    <div class="hotelnamesimage">
      <?php 
                                      if($result[$i]->image !='')
									  {
									  if($result[$i]->api=='hotelsbed')
									  {
										  ?>
    <img src="<?php echo 'http://www.hotelbeds.com/giata/'.$result[$i]->image; ?>" width="102" height="75" border="0" />
    
    <?php
									  }
									  else
									  {
										  ?>
                                          <img src="<?php echo $result[$i]->image; ?>" width="102" height="75" border="0" id="hotel_all_img_<?php echo $i; ?>" onmouseover="big_img(<?php echo $i; ?>,this,event);" onmouseout="small_img(<?php echo $i; ?>,this);"/>
                                          <div class="big_img" id="big_img_<?php echo $i; ?>"></div>
                                            <?php
									  }
									  }
									  else
									  {
										?>
                                        <img src="<?php echo WEB_DIR.'images/noimage.jpg'; ?>" width="102" height="75" border="0" />
                                        
    <?php  
									  }
                                      ?>
    </div>
    <script type="text/javascript" src="<?php echo WEB_DIR; ?>gui/big_img.js"></script>
    <div class="hotelnamestext">
    <h2><a href="<?php echo WEB_URL.'b2b_hotel/hotel_detail/'.$result[$i]->api_temp_hotel_id; ?>"  target="_blank"><?php echo $result[$i]->hotel_name; ?></a></h2>
    <div style="margin-top:-5px;"><?php $star = $result[$i]->star; 
											   if($star==1)
											   {
											   ?>
                                               <img src="<?php echo WEB_DIR.'images/1 star.jpg'; ?>" />
                                               <?php
											   }
											   elseif($star==2)
											   {
												?>   <img src="<?php echo WEB_DIR.'images/2 star.jpg'; ?>" />
                                                <?php
												  }
											   elseif($star==3)
											   {
												?> <img src="<?php echo WEB_DIR.'images/3 star.jpg'; ?>" />
                                                 <?php
												  }
											   elseif($star==4)
											   {
												?> <img src="<?php echo WEB_DIR.'images/4 star.jpg'; ?>" />
                                                 <?php
												  }
											   elseif($star==5)
											   {
												?> <img src="<?php echo WEB_DIR.'images/5 star.jpg'; ?>" />
                                                 <?php
											   }
											   elseif($star=='7')
											   {
												?> <span style="color:#243419">Deluxe</span>
                                                 <?php
											   }
											   elseif($star=='6')
											   {
												?> <span style="color:#243419">Standard</span>
                                                 <?php
											   }
												else
											   {
												?><img src="<?php echo WEB_DIR.'images/0 star copy.jpg'; ?>" />
                                                <?php
											   }
											   ?>   </div>
        <h2><?php echo $result[$i]->city; ?> | <a href="<?php $hotel_id = explode('CRS',$result[$i]->hotel_code); print WEB_URL.'b2b_hotel/hotel_info/'.$hotel_id[1]; ?> " target="_blank" class="text3">Hotel Info</a> | <a href="<?php print WEB_URL.'b2b_hotel/mapping_fun/'.$result[$i]->api_temp_hotel_id; ?> "  onclick="$('#rlightbox').show();" target="rlight_box" class="text3">Show Map</a> |<?php if($allot_value>0) { ?><a href="<?php echo WEB_URL.'b2b_hotel/hotel_detail/'.$result[$i]->api_temp_hotel_id; ?>"  target="_blank"  class="text3">View Rates & Book </a> |<?php }?> <?php }?><?php if($allot_value > 0) {?><font color="green"> <?php echo "Available"; ?></font><?php }else { ?><font color="red"><?php echo "On Request"; ?></font><?php }?></h2>
        <!--<div style="line-height:normal; width:319px">
        <p><?php  echo preg_replace("/[^a-z0-9_-]/i", " ",  substr($result[$i]->description,0,250)); ?> </p>
        <p>&nbsp;</p>
        <p><img  src="<?php echo WEB_DIR; ?>images/ppl_icon.jpg" width="17" height="11" /> There are <?php echo $result[$i]->coun; ?> people viewing this hotel.
        <br />
         <img width="17" style=" position:relative; top:4px;" src="<?php echo WEB_DIR; ?>images/058-Plus-circle-Icon.png" /> <a href="javascript:add_list(<?php echo $result[$i]->api_temp_hotel_id; ?>);">Add to Wishlist</a>    &nbsp; <img width="17" style=" position:relative; top:4px;" src="<?php echo WEB_DIR; ?>images/045-View-Eye-Icon.png" /> <a href="javascript:wish_list();">View Wishlist </a><span class="wish"><?php if(isset($_SESSION['fav_hotel']) && isset($_SESSION['fav_hotel'][0])) { echo count($_SESSION['fav_hotel']); } else { echo '0'; } ?></span>
         <br />
         <span id="added<?php echo $result[$i]->api_temp_hotel_id; ?>"><img width="17" style=" position:relative; top:4px;" src="<?php echo WEB_DIR; ?>images/022-Heart-Icon.png" /> <a href="javascript:add_fav(<?php echo $result[$i]->api_temp_hotel_id; ?>);">Add To My Favourite List</a></span>&nbsp;&nbsp;<span id="added_l<?php echo $result[$i]->api_temp_hotel_id; ?>"></span>
        </p>
        </div>-->
    </div>
    <!--<div class="pricelist">
    <?php
												$total = number_format($this->session->userdata('currency_value') * $result[$i]->low_cost, 2, '.', ',');
												?>
      <p style="font-size:30px;"><?php 
      //$this->session->userdata('currency');
      //echo '$'.$total; ?></p>
        <p>Avg / Night</p>
       
      <p style="padding-top:15px;"><a target="_blank" href="<?php echo WEB_URL.'b2b_hotel/hotel_detail/'.$result[$i]->api_temp_hotel_id; ?>"><img src="<?php echo WEB_DIR; ?>images/book_bt.png" width="102" height="37" border="0" /></a></p>
      
      
    </div>-->
    </div>
    <?php
	}
		}
//}
	
	}
//print_r($res);exit;

	?>
   <script>
   function add_list(id)
   {
	        //filterPriceStar
			var params = 'id='+id;
			$.ajax({
				  url:'<?php echo WEB_URL; ?>b2b_hotel/add_items/',
				  data: params,
				  dataType: "json",
				  beforeSend:function(){
					$('.wish').html('<img src="<?php echo WEB_DIR; ?>images/ajax-loader (5).gif" alt="" />');
				  },
				  success: function(data){
					$('.wish').html(data.count_fav);
					
				  },
				  error:function(request, status, error){
					// failed request; give feedback to user
					$('.wish').html('0');
				  }
				  
				});
	
   }
   
   
    function add_fav(id)
   {
	        //filterPriceStar
			var params = 'id='+id;
			$.ajax({
				  url:'<?php echo WEB_URL; ?>b2b_hotel/add_fav_items/',
				  data: params,
				  dataType: "json",
				  beforeSend:function(){
					$('#added_l'+id).html('<img src="<?php echo WEB_DIR; ?>images/ajax-loader (5).gif" alt="" />');
				  },
				  success: function(data){
					$('#added'+id).html(data.add_fav);
					$('#added_l'+id).html('');
				  },
				  error:function(request, status, error){
					// failed request; give feedback to user
					$('#added_l'+id).html('');
				  }
				  
				});
	
   }
   function delete_fav(id)
   {
	   
	        //filterPriceStar
			var params = 'id='+id;
			$.ajax({
				  url:'<?php echo WEB_URL; ?>b2b_hotel/remove_fav_items/',
				  data: params,
				  dataType: "json",
				  beforeSend:function(){
					$('#added_l'+id).html('<img src="<?php echo WEB_DIR; ?>images/ajax-loader (5).gif" alt="" />');
				  },
				  success: function(data){
					$('#added'+id).html(data.add_fav);
					$('#added_l'+id).html('');
				  },
				  error:function(request, status, error){
					// failed request; give feedback to user
					$('#added_l'+id).html('');
				  }
				  
				});
	
   
   }
   
   </script>
   <script type="text/javascript">
		  

			
                function wish_list()
                {
					
         $('#result').html("<div style='background-color:#FFF' align='middle'><img src='<?php echo WEB_DIR ?>gui/images/loading.gif'/></diV>").fadeIn('fast');
      if (window.XMLHttpRequest)
          {// code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp=new XMLHttpRequest();
          }
        else
          {// code for IE6, IE5
          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
          }
        xmlhttp.onreadystatechange=function()
          {
          if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
				
			    document.getElementById("result").innerHTML=xmlhttp.responseText;
            }
          }
	
		xmlhttp.open("POST","<?php print WEB_URL ?>b2b_hotel/wish_list_view",true);
        //xmlhttp.open("POST","<?php print WEB_URL ?>b2b_hotel/all_filter_new1/"+id,true);
        xmlhttp.send(); //ddd
        
        
       
             
                }
				
				 
          
               
                </script>