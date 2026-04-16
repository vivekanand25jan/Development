<?php
	//$result = $this->Hotel_Model->fetch_gta_temp_result($_SESSION['ses_id']);


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
    <img src="<?php echo 'http://www.hotelbeds.com/giata/'.$result[$i]->image; ?>" width="202" height="186" border="0" />
    
    <?php
									  }
									  else
									  {
										  ?>
                                          <img src="<?php echo $result[$i]->image; ?>" width="202" height="186" border="0" />
                                            <?php
									  }
									  }
									  else
									  {
										?>
                                        <img src="<?php echo WEB_DIR.'images/noimage.jpg'; ?>" width="202" height="186" border="0" />
                                        
    <?php  
									  }
                                      ?>
    </div>
    <div class="hotelnamestext">
    <h2><?php echo $result[$i]->hotel_name; ?></h2>
    <div><?php $star = $result[$i]->star; 
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
										else
											   {
												?><img src="<?php echo WEB_DIR.'images/0 star copy.jpg'; ?>" />
                                                <?php
											   }
											   ?>   </div>
        <h2><?php echo $result[$i]->city; ?> / <a href="<?php print WEB_URL.'hotel/mapping_fun/'.$result[$i]->api_temp_hotel_id; ?> "  onclick="$('#rlightbox').show();" target="rlight_box" class="text3">Show Map</a></h2>
        <div style="line-height:normal; width:319px">
        <p><?php  
											 //if(strstr(substr($result[$i]->description,0,250), 'ƒ', true) == true) { 
											// echo strstr(substr($result[$i]->description,0,250), 'ƒ', true); } else {
											 //echo substr($result[$i]->description,0,250); 
												// } 
												echo preg_replace("/[^a-z0-9_-]/i", " ",  substr($result[$i]->description,0,250));
												?> </p>
        <p>&nbsp;</p>
        <p><img  src="<?php echo WEB_DIR; ?>images/ppl_icon.jpg" width="17" height="11" /> There are <?php echo $result[$i]->coun; ?> people viewing this hotel.
        <br />
         <img  style=" position:relative; top:4px;" src="<?php echo WEB_DIR; ?>images/plus.jpg" /> <a href="javascript:add_list(<?php echo $result[$i]->api_temp_hotel_id; ?>);">Add to Wishlist</a>    &nbsp; <img style=" position:relative; top:4px;" src="<?php echo WEB_DIR; ?>images/euey.jpg" /> <a href="javascript:wish_list();">View Wishlist </a><span class="wish"><?php if(isset($_SESSION['fav_hotel']) && isset($_SESSION['fav_hotel'][0])) { echo count($_SESSION['fav_hotel']); } else { echo '0'; } ?></span>
        </p>
        </div>
    </div>
    <div class="pricelist">
    <?php
												$total = number_format($this->session->userdata('currency_value') * $result[$i]->low_cost, 2, '.', ',');
												?>
    <p style="font-size:30px;"><span style="font-size:10px;"> <?php echo  $this->session->userdata('currency').' '; ?></span><?php 
      //$this->session->userdata('currency');
      echo $total; ?></p>
        <p>Avg / Night</p>
       
      <p style="padding-top:15px;"><a target="_blank" href="<?php echo WEB_URL.'hotel/hotel_detail/'.$result[$i]->api_temp_hotel_id; ?>"><img src="<?php echo WEB_DIR; ?>images/book_bt.png" width="102" height="37" border="0" /></a></p>
    </div>
    </div>
    <?php
	}
		}
	}
	?>
   <script>
   function add_list(id)
   {
	        //filterPriceStar
			var params = 'id='+id;
			$.ajax({
				  url:'<?php echo WEB_URL; ?>hotel/add_items/',
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
	
		xmlhttp.open("POST","<?php print WEB_URL ?>hotel/wish_list_view",true);
        //xmlhttp.open("POST","<?php print WEB_URL ?>hotel/all_filter_new1/"+id,true);
        xmlhttp.send(); //ddd
        
        
       
             
                }
				
				 
                
               
                </script>