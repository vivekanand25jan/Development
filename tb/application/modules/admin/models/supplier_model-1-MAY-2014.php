<?php 
class Supplier_Model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
		
   function country_list()
	{
		$que="select * from  country";
		$query= $this->db->query($que);
		if($query->num_rows() ==''){
			return '';
		}else{
			return $query->result();
		}
	}
	
	function get_currecy_detail()
	{
		$que="select country from  currency_converter";
		$query= $this->db->query($que);
		if($query->num_rows() ==''){
		return '';
		}else{
		return $query->result();
	}
	}
	/*public function contact_inform_view($supplier_id)
	{
		$sql="SELECT a.city_name, a.property_name, a.sup_id, a.sup_contact_inform_id, b.name  
			FROM sup_contact_inform as a JOIN country as b on a.country_id = b.country_id 
			WHERE sup_id='$supplier_id'";
		$rs=$this->db->query($sql);
		if($rs->num_rows() ==''){
			return '';
		}
		else
		{
			return $rs->result();
		}
		
	}*/
	function check_agent_login($email,$password)
	{		
		
		//$select = "select agent_id, email_id, name, agent_type, branch_id from agent where email_id ='".$email."' AND password  ='".sha1($password)."' AND active = 1";
		
		$select = "select * from supplier where email_id = ? AND password  = ? AND active = 1";
	 
		 $query=$this->db->query($select, array($email, $password));
		 
		// echo $this->db->last_query(); exit;
		if ($query->num_rows() > 0)
		{
		   foreach ($query->result() as $row)
		   {
				
			  $sessionUserInfo = array(
                   'supplier_id'  => $row->agent_id,
				   'email_id'  => $row->email_id,
				   'name'  => $row->name,
				  'markup' => $row->markup,
				  'address' => $row->address,
				  'city' => $row->city,
				  'postal_code' => $row->postal_code,
				  'mobile' => $row->mobile
               );
			   
			 
					$sessionUserInfo['supplier_logged_in'] = TRUE;
			   
			   
			   //print_r($sessionUserInfo); exit;

				$this->session->set_userdata($sessionUserInfo);
				
				
			  
		   }
		   return true;
		   
		} 
		else
		{
			return false;
		}
	}

    function add_supplier($name, $company_name, $address, $country, $city, $postal_code, $office_phone, $mobile_no,$currency, $email_id, $password)
	{
	
		$data = array(
			'email_id' => $email_id,
			'password' => $password,
			'name' => $name,
			'company_name' => $company_name,
			'address' => $address,
			'country' => $country,
			'city' => $city,
			'postal_code' => $postal_code,
			'office_phone' => $office_phone,
			'mobile' => $mobile_no,
			'currency_type' => $currency,
			'active' => 0,
			'last_visit' => ''
			
			);
			
			$this->db->set('register_date', 'NOW()', FALSE); 
		
		$this->db->insert('supplier', $data);
		$id = $this->db->insert_id();
	
			return true;
		

	}
	
	
	//----- Get Supplier's Category List -----/
	function inventory_category_list($supplier_id,$id)
	{		
		$select = "SELECT * FROM sup_inv_cate_type WHERE sup_id = '$supplier_id' AND hotel_id = '$id'";
		//echo $select; exit;
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;	
		}
	}
	
	//----- Update Supplier's Category Type -----/
	function update_category_type($id,$status)
	{
		if($status == 2)
		{
			$where2 = "sup_inv_cate_type_id = $id";
			if ($this->db->delete('sup_inv_cate_type', $where2)) {
				return true;
			} else {
				return false;
			}
		}
		else
		{
			$where = "sup_inv_cate_type_id = $id";
			$data = array(
				'status' => $status
			);
			if ($this->db->update('sup_inv_cate_type', $data, $where)) {
				return true;
			} else {
				return false;
			}
		}
	}
	
	
	//----- Get Inventory Category Space Facilities -----/
	function inventory_category_space_facilities()
	{		
		$select = "SELECT * FROM inv_cate_space_fac where space_fac_status = 1 and space_fac_added_by = 1";
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;	
		}
	}
	
	//----- Add New Supplier's Category Type -----/
	function add_cate_type($supplier_id, $prop_id, $cate_type, $room_type, $max_person, $adults, $childs, $infants, $extra_bed)
	{
		$data = array(
			'sup_id' => $supplier_id,
			'hotel_id' => $prop_id,
			'cate_type' => $cate_type,
			'room_type' => $room_type,
			'max_person' => $max_person,
			'adults' => $adults,
			'childs' => $childs,
			'infants' => $infants,
			'extra_bed' => $extra_bed,
			'status' => 1
			);
			
		$this->db->set('date', 'NOW()', FALSE); 
		
		$this->db->insert('sup_inv_cate_type', $data);
		$id = $this->db->insert_id();
		if(!empty($id)){
		/*if(!empty($id) && isset($_REQUEST['type_name'])) {
			$type_name1 = $_REQUEST['type_name'];
			$type_value1 = $_REQUEST['type_value'];
			for($i=0; $i<sizeof($type_name1); $i++)
			{
				$qry = "INSERT INTO `sup_inv_cate_list` ( 
						`sup_inv_cate_id` ,
						`type_name` ,
						`type_value`
						)
						VALUES ( '$id',  '".$type_name1[$i]."',  '".$type_value1[$i]."')";
				$query=$this->db->query($qry);
			}*/
		return true;
		} else {
			return false;
		}
	}
	
	//----- Get Supplier's Category Details -----/
	function sup_inv_cate_list($cate_id)
	{		
		$select = "SELECT * FROM sup_inv_cate_list where sup_inv_cate_id = '$cate_id'"; 
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;	
		}
	}
	
	//----- Get Supplier's Category Details -----/
	function view_cate_details($id)
	{		
		$select = "SELECT * FROM sup_inv_cate_type where sup_inv_cate_type_id = '$id'";
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->row();
		} else {
			return false;	
		}
	}
	
	//----- Get Supplier's Category Details -----/
	function supplier_space_facilities($id, $space_faci)
	{		
	 	$select = "SELECT * FROM sup_inv_cate_space_fac where sup_inv_cate_id = ".$id." and sup_space_fac_id = ".$space_faci."";
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;	
		}
	}
	
	//----- Get Supplier's Markets -----/
	function supplier_markets($id, $market_id)
	{		
	  	$select = "SELECT * FROM sup_hotel_market where hotel_id = ".$id." and market_id = ".$market_id."";
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;	
		}
	}
	
	//----- Edit Supplier's Category Type -----/
	function edit_cate_type($cat_id, $prop_id, $cate_type, $room_type, $max_person, $adults, $childs, $infants, $extra_bed)
	
	{
		
		 $this->db->query("UPDATE sup_inv_cate_type SET cate_type='$cate_type', room_type='$room_type', max_person='$max_person', adults='$adults', childs='$childs', infants='$infants', extra_bed='$extra_bed', status='1' WHERE sup_inv_cate_type_id='$cat_id'");
		//$delqry = "DELETE FROM sup_inv_cate_list WHERE sup_inv_cate_id = ".$cat_id.""; 
		//$query=$this->db->query($delqry);
		if(!empty($prop_id)){
		/*if(!empty($prop_id) && isset($_REQUEST['type_name'])) {
			$type_name1 = $_REQUEST['type_name'];
			$type_value1 = $_REQUEST['type_value'];
			for($i=0; $i<sizeof($type_name1); $i++)
			{
				if($type_name1[$i] != "" && $type_value1[$i])
				{
					$qry = "INSERT INTO `sup_inv_cate_list` ( 
						`sup_inv_cate_id` ,
						`type_name` ,
						`type_value`
						)
						VALUES ( '$id',  '".$type_name1[$i]."',  '".$type_value1[$i]."')";
					$query=$this->db->query($qry);
				}
			}*/
			return true;
		} else {
			return false;
		}
	}
	
	
	//----- Get Supplier's Rate Tactics List -----/
	function rate_tactics_list($supplier_id,$prop_id,$cate_type)
	{	
	
		$select = "SELECT * FROM sup_rate_tactics WHERE sup_id = '$supplier_id' AND hotel_id = '$prop_id' AND category_type='$cate_type'";
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;	
		}
	}
	function rate_tactics_cat_list($supplier_id,$prop_id)
	{	
	
		$select = "SELECT * FROM sup_rate_tactics WHERE sup_id = '$supplier_id' AND hotel_id = '$prop_id'";
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;	
		}
	}
	
	function cate_types_rate_tactics($supplier_id,$prop_id)
	{		
		$select = "SELECT * FROM sup_rate_tactics WHERE sup_id = '$supplier_id' AND hotel_id = '$prop_id' GROUP BY category_type";
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;	
		}
	}
	
	//----- Update Supplier's Rate Tactics Status -----/
	function update_rate_tactics($id,$status)
	{
		if($status == 2)
		{
			$where2 = "sup_rate_tactics_id = $id";
			if ($this->db->delete('sup_rate_tactics', $where2)) {
				return true;
			} else {
				return false;
			}
		}
		else
		{
			$where = "sup_rate_tactics_id = $id";
			$data = array(
				'status' => $status
			);
			if ($this->db->update('sup_rate_tactics', $data, $where)) {
				return true;
			} else {
				return false;
			}
		}
	}
	
	//----- Update Supplier's Inventory Category Type -----/
	function inventory_cate_type($supplier_id,$prop_id)
	{
		//$supplier_id = $this->session->userdata('supplier_id');
		$que="select * from sup_inv_cate_type WHERE hotel_id = '$prop_id' AND sup_id = '$supplier_id' ";
		$query= $this->db->query($que);
		if($query->num_rows() ==''){
			return '';
		}else{
			return $query->result();
		}
	}
	
	function add_rate_plan_view($prop_id)
	{
		$select="select * from sup_rate_tactics where hotel_id='$prop_id'";
		$query=$this->db->query($select);
		if($query->num_rows()>0)
		{	
			return $query->row();
		}else{
			return false;	
		}
	}
	
	//----- Add New Supplier's Rate Tacticse -----/
	function add_rate_plan($supplier_id, $prop_id,$market_id , $season, $category_name, $allocation_rooms, $allocation_release_days, $allocation_release_period, $allocation_validity_from, $allocation_validity_to, $occupancy, $adult, $child, $child_below_age, $child_above_age, $child_above_age_charge,$child_extra_bed_charge, $no_of_infants, $breakfast, $breakfast_type,$meal_plan, $lunch, $dinner, $adult_breakfast_rate,$adult_lunch_rate,$adult_dinner_rate,$child_breakfast_rate,$child_lunch_rate,$child_dinner_rate,$child_policy, $remarks, $cancel_policy_nights, $cancel_policy_percent, $cancel_policy_charge, $cancel_policy_from, $cancel_policy_to, $cancel_policy_desc, $minimum_stay_from, $minimum_stay_to, $minimum_stay_nights, $room_avail_date_from, $room_avail_date_to, $dates, $weekday, $price, $extra_bed_price, $avail, $aadult, $achild, $child_price, $infant, $sup_charge,$booking_code,$supplement_rate)
	{
		
		/*print_r($cancel_policy_nights) ;echo "<br/>" ;
		print_r($cancel_policy_percent) ;echo "<br/>" ;
		print_r($cancel_policy_charge);echo "<br/>" ;
		print_r($cancel_policy_from); echo "<br/>" ;
		print_r($cancel_policy_to);echo "<br/>" ;
		//echo $cancel_policy_desc;echo "<br/>" ;*/
		$counter1=count($market_id);
		for($j=0;$j<$counter1;$j++)
		{		
				//$j=0;
				$counter = count($room_avail_date_from);
				for($k=0;$k < $counter;$k++)
				{
					//$k=1;
					if(is_array($room_avail_date_from))
					{
						$sdate = $room_avail_date_from[$k];
						$fromda = explode("-",$sdate);
						$avail_date_from = $fromda[2].'-'.$fromda[1].'-'.$fromda[0];
					}
					else
					{
						$sdate = $room_avail_date_from;
						$fromda = explode("-",$sdate);
						$avail_date_from = $fromda[2].'-'.$fromda[1].'-'.$fromda[0];
					}
					
					if(is_array($room_avail_date_to))
					{
						$edate = $room_avail_date_to[$k];
						$toda = explode("-",$edate);
						$avail_date_to = $toda[2].'-'.$toda[1].'-'.$toda[0];
					}
					else
					{
						$edate = $room_avail_date_to;
						$toda = explode("-",$edate);
						$avail_date_to = $toda[2].'-'.$toda[1].'-'.$toda[0];
					}
					
					//print'<pre>';print_r($edate);exit;
					
					$child_policy = addslashes($child_policy);
					$remarks = addslashes($remarks);
					$cancel_policy_desc = addslashes($cancel_policy_desc);
				
					$data = array(
						'sup_id' => $supplier_id,
						'hotel_id' => $prop_id,
						'market_id' => $market_id[$j],
						'season_id' => $season,
						'category_type' => $category_name,
						'occupancy' => $occupancy,
						'adult' => $adult,
						'child' => $child,
						'child_below_age' => $child_below_age,
						'child_above_age' => $child_above_age,
						'child_above_age_charge' => $child_above_age_charge,
						'child_extra_bed_charge' => $child_extra_bed_charge,
						'infant' => $no_of_infants,
						'breakfast' => $breakfast,
						'breakfast_type' => $breakfast_type,
						'meal_plan' => $meal_plan,
						'meal_plan_lunch' => $lunch,
						'meal_plan_dinner' => $dinner,
						'adult_meal_plan_breakfast_rate' => $adult_breakfast_rate,
						'adult_meal_plan_lunch_rate' => $adult_lunch_rate,
						'adult_meal_plan_dinner_rate' => $adult_dinner_rate,
						'child_meal_plan_breakfast_rate' => $child_breakfast_rate,
						'child_meal_plan_lunch_rate' => $child_lunch_rate,
						'child_meal_plan_dinner_rate' => $child_dinner_rate,
						'child_policy' => $child_policy,
						'remarks' => $remarks,
						'cancel_policy_desc' => $cancel_policy_desc,
						'room_avail_date_from' => $avail_date_from,
						'room_avail_date_to' => $avail_date_to,
						'booking_code' => $booking_code,
						'supplement_rate' => $supplement_rate,
						'status' => 1
						);
						
						//print '<pre>'; print_r($data);exit;
					
					$this->db->set('created_date', 'NOW()', FALSE); 
				
					$this->db->insert('sup_rate_tactics', $data);

					$id = $this->db->insert_id();
					
					$last_id[]=$id;
					//echo $this->db->last_query();echo "<br/>";
				
					if(isset($cancel_policy_percent) && $cancel_policy_percent != "")
					{ 
						//echo count($cancel_policy_percent);exit;
						for($i=0; $i<sizeof($cancel_policy_percent); $i++)
						{

							//if(strtotime($cancel_policy_from[$i]) >= strtotime($sdate) && strtotime($cancel_policy_to[$i]) <= strtotime($edate))
							//{
								//echo "cancel2";
								 $ins = "INSERT INTO `sup_rate_cancel_policy` (`rate_tactics_id` ,`cancel_policy_nights` ,`cancel_policy_percent` ,`cancel_policy_charge` ,`cancel_policy_from` ,`cancel_policy_to`)
							VALUES ('".$id."', '".$cancel_policy_nights[$i]."', '".$cancel_policy_percent[$i]."', '".$cancel_policy_charge[$i]."', '".$cancel_policy_from[$i]."', '".$cancel_policy_to[$i]."')";
								

								$exe = $this->db->query($ins);

								//echo $ins;echo "<br/>";
							//}
						}//exit;
					}
					
					if(isset($minimum_stay_nights) && $minimum_stay_nights != "")
					{
						for($i=0; $i<sizeof($minimum_stay_nights); $i++)
						{
							if(strtotime($minimum_stay_from[$i]) >= strtotime($sdate) && strtotime($minimum_stay_to[$i]) <= strtotime($edate))
							{
								$ins = "INSERT INTO `sup_rate_minimum_stay` (`rate_tactics_id` ,`minimum_stay_nights` ,`minimum_stay_from` ,`minimum_stay_to`)
							VALUES ('".$id."', '".$minimum_stay_nights[$i]."','".$minimum_stay_from[$i]."', '".$minimum_stay_to[$i]."')";
								$exe = $this->db->query($ins);
							}
						}
					}
					
					//echo count($dates);exit;
				
					if(isset($price) && $price != "")
					{
						
						for($i=0; $i<sizeof($dates); $i++)
						{
							if(strtotime($dates[$i]) >= strtotime($sdate) && strtotime($dates[$i]) <= strtotime($edate))
							{
								$day  = explode("-",$dates[$i]);
								$date = $day[2].'-'.$day[1].'-'.$day[0]; 
					
								$qry = "INSERT INTO `sup_apart_maintain_month` ( 
							`sup_id` ,`sup_rate_tactics_id` ,`hotel_id` ,`date` ,`week_day` ,`day` ,`month` ,`year` ,`rate` ,`extra_bed_price` ,`supplementary_charge_rate` ,`available_rooms` ,`capacity` ,`adult` ,`child` ,`child_charge` ,`infant` ,`status`)
							VALUES ( '$supplier_id', '".$id."', '".$prop_id."', '".$date."', '".$weekday[$i]."', '".$day[0]."', '".$day[1]."', '".$day[2]."', '".$price[$i]."', '".$extra_bed_price[$i]."', '".$sup_charge[$i]."', '".$avail[$i]."', '', '".$aadult[$i]."', '".$achild[$i]."', '".$child_price[$i]."', '".$infant[$i]."', '1')";
								$query=$this->db->query($qry);

								//echo $qry;echo "<br/>";
							}
						}
					}
				
				}
		}//exit;
		
		
		//$last_id=$id;
		//print_r($last_id);exit;
		if(!empty($last_id)) 
		{
			return $last_id;
		} 
		else
		{
			return false;
		}
			
 	}

 	function add_more_rate_plan($last_id)
 	{
 		//echo count($last_id);
 		for($i=0;$i<count($last_id);$i++)
 		{
 			$sql1="SELECT st.*,smt.*,scp.* FROM sup_rate_tactics st 
 		INNER JOIN sup_apart_maintain_month smt ON st.sup_rate_tactics_id=smt.sup_rate_tactics_id
 		INNER JOIN sup_rate_cancel_policy scp ON smt.sup_rate_tactics_id=scp.rate_tactics_id
 		WHERE st.sup_rate_tactics_id='".$last_id[$i]."'";
 		
 		//echo $sql1;
 		$query=$this->db->query($sql1);
 		$x[]=$query->result();
 		}//exit;
 		//echo "<pre/>";print_r($query->result());exit;
 		
 		if(count($x)>0)
 		{
 			return $x;
 		}
 		else
 		{
 			return false;
 		}

 	}
	
	function get_category_name($id)
	{
           
           
		$select = "SELECT * FROM sup_inv_cate_type where sup_inv_cate_type_id = '$id'";
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->row();
		} else {
			return false;	
		}
	}
        
    function get_category_name_tactics($hotel_id,$room_tactics_id)
	{
            $select = "SELECT A.category_type, A.season_id, A.room_avail_date_from, A.room_avail_date_to, B.season, C.cate_type, C.room_type
                        FROM sup_rate_tactics A 
                        INNER JOIN seasons B ON B.season_id = A.season_id 
                        INNER JOIN sup_inv_cate_type C ON C.sup_inv_cate_type_id = A.category_type
                        WHERE A.sup_rate_tactics_id = '$room_tactics_id'"; 
            $query=$this->db->query($select);
            if ($query->num_rows() > 0)
            {
                    return $query->row();
            } else {
                    return false;	
            }
	}
	
	//----- Get Supplier's Rate Tacticse Details -----/
	function view_rate_tactics_details($id)
	{		
		$select = "SELECT * FROM sup_rate_tactics where sup_rate_tactics_id = '$id'";
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->row();
		} else {
			return false;	
		}
	}
	
	//----- Edit Supplier's Rate Tacticse Details -----/
	function edit_rate_plan($supplier_id, $prop_id, $id,$market_id, $season, $category_name, $allocation_rooms, $allocation_release_days, $allocation_release_period, $allocation_validity_from, $allocation_validity_to, $occupancy, $adult, $child, $child_below_age, $child_above_age, $child_above_age_charge,$child_extra_bed_charge, $no_of_infants, $breakfast, $breakfast_type,$adult_breakfast_rate,$adult_lunch_rate,$adult_dinner_rate,$child_breakfast_rate,$child_lunch_rate,$child_dinner_rate, $meal_plan, $lunch, $dinner, $child_policy, $remarks, $cancel_policy_nights, $cancel_policy_percent, $cancel_policy_charge, $cancel_policy_from, $cancel_policy_to, $cancel_policy_desc, $minimum_stay_from, $minimum_stay_to, $minimum_stay_nights, $room_avail_date_from, $room_avail_date_to, $avail_dates, $avail_weekday, $avail_price, $extra_bed_price, $avail_rooms, $avail_adult, $avail_child, $avail_child_price, $avail_infant, $avail_sup_charge, $avail_datess,$booking_code,$supplement_rate)
	{
		
		//print'<pre>';print_r($child);exit;
		$counter = count($room_avail_date_from);
		for($k=0;$k < $counter;$k++)
		{
			
			if(is_array($room_avail_date_from))
			{
				$sdate = $room_avail_date_from[$k];
				$fromda = explode("-",$sdate);
			    $avail_date_from = $fromda[2].'-'.$fromda[1].'-'.$fromda[0];
			}
			else
			{
				$sdate = $room_avail_date_from;
				$fromda = explode("-",$sdate);
			    $avail_date_from = $fromda[2].'-'.$fromda[1].'-'.$fromda[0];
			}
			
			if(is_array($room_avail_date_to))
			{
				$edate = $room_avail_date_to[$k];
				$toda = explode("-",$edate);
				$avail_date_to = $toda[2].'-'.$toda[1].'-'.$toda[0];
			}
			else
			{
				$edate = $room_avail_date_to;
				$toda = explode("-",$edate);
				$avail_date_to = $toda[2].'-'.$toda[1].'-'.$toda[0];
			}
			
			//print'<pre>';print_r($avail_adult);exit;
			
			$child_policy = addslashes($child_policy);
			$remarks = addslashes($remarks);
			$cancel_policy_desc = addslashes($cancel_policy_desc);
			
		
		  if($k==0) 
		  {
			  $select="UPDATE sup_rate_tactics 
							SET season_id='$season',
								market_id ='$market_id',
								category_type='$category_name', 
								occupancy='$occupancy', 
								adult='$adult',
								child='$child', 
								child_below_age='$child_below_age',
								child_above_age='$child_above_age',
								child_above_age_charge='$child_above_age_charge',
								child_extra_bed_charge='$child_extra_bed_charge',
								infant='$no_of_infants', 
								breakfast='$breakfast', 
								breakfast_type='$breakfast_type', 
								meal_plan='$meal_plan', 
								meal_plan_lunch='$lunch', 
								meal_plan_dinner='$dinner',
							    adult_meal_plan_breakfast_rate='$adult_breakfast_rate',
								adult_meal_plan_lunch_rate='$adult_lunch_rate',
				                adult_meal_plan_dinner_rate='$adult_dinner_rate',
                                child_meal_plan_breakfast_rate='$child_breakfast_rate',
				                child_meal_plan_lunch_rate='$child_lunch_rate',
				                child_meal_plan_dinner_rate='$child_dinner_rate',
								child_policy='$child_policy', 
								remarks='$remarks', 
								cancel_policy_desc='$cancel_policy_desc', 
								room_avail_date_from='$avail_date_from', 
								room_avail_date_to='$avail_date_to',
								booking_code='$booking_code' ,
								supplement_rate =$supplement_rate 
							WHERE sup_rate_tactics_id='$id'";
							//echo  $select ;exit;
			 $this->db->query($select);
							
			 $delqrys = "DELETE FROM sup_rate_cancel_policy WHERE rate_tactics_id = ".$id.""; 
			 $exequery= $this->db->query($delqrys);	
		
			 if(isset($cancel_policy_percent) && $cancel_policy_percent != "")
			 {
				for($i=0; $i<sizeof($cancel_policy_percent); $i++)
				{
					if(strtotime($cancel_policy_from[$i]) >= strtotime($sdate) && strtotime($cancel_policy_to[$i]) <= strtotime($edate))
					{
						$ins = "INSERT INTO `sup_rate_cancel_policy` (`rate_tactics_id` ,`cancel_policy_nights` ,`cancel_policy_percent` ,`cancel_policy_charge` ,`cancel_policy_from` ,`cancel_policy_to`)
					VALUES ('".$id."', '".$cancel_policy_nights[$i]."', '".$cancel_policy_percent[$i]."', '".$cancel_policy_charge[$i]."', '".$cancel_policy_from[$i]."', '".$cancel_policy_to[$i]."')";
						$exe = $this->db->query($ins);
					}
				}
			 }	
			 
			 $delstayqry = "DELETE FROM sup_rate_minimum_stay WHERE rate_tactics_id = ".$id.""; 
			 $exestayquery= $this->db->query($delstayqry);	
		
			 if(isset($minimum_stay_nights) && $minimum_stay_nights != "")
			 {
				for($i=0; $i<sizeof($minimum_stay_nights); $i++)
				{
					if(strtotime($minimum_stay_from[$i]) >= strtotime($sdate) && strtotime($minimum_stay_to[$i]) <= strtotime($edate))
					{
						$inser = "INSERT INTO `sup_rate_minimum_stay` (`rate_tactics_id` ,`minimum_stay_nights` ,`minimum_stay_from` ,`minimum_stay_to`)
					VALUES ('".$id."', '".$minimum_stay_nights[$i]."','".$minimum_stay_from[$i]."', '".$minimum_stay_to[$i]."')";
						$exestay = $this->db->query($inser);
					}
				}
			 }				
							
			 $delqry = "DELETE FROM sup_apart_maintain_month WHERE sup_rate_tactics_id = ".$id.""; 
			 $query=$this->db->query($delqry);
							
			 if(isset($avail_dates) && $avail_dates != "")
			 {
				$dates = $avail_dates;
				$weekday = $avail_weekday;
				$price = $avail_price;
				$extra_bed_price = $extra_bed_price;
				$avail = $avail_rooms;
				$adults = $avail_adult;
				$childs = $avail_child;
				$avail_child_price = $avail_child_price;
				$avail_infant = $avail_infant;
				$avail_sup_charge = $avail_sup_charge;
				
				for($i=0; $i<sizeof($dates); $i++)
				{
					if(strtotime($dates[$i]) >= strtotime($sdate) && strtotime($dates[$i]) <= strtotime($edate))
					{
						$day  = explode("-",$dates[$i]);
						$date = $day[2].'-'.$day[1].'-'.$day[0];
			
						$qry = "INSERT INTO `sup_apart_maintain_month` ( 
					`sup_id` ,`sup_rate_tactics_id` ,`hotel_id` ,`date` ,`week_day` ,`day` ,`month` ,`year` ,`rate` ,`extra_bed_price` ,`supplementary_charge_rate` ,`available_rooms` ,`capacity` ,`adult` ,`child` ,`child_charge` ,`infant` ,`status`)
					VALUES ( '$supplier_id', '".$id."', '".$prop_id."', '".$dates[$i]."', '".$weekday[$i]."', '".$day[2]."', '".$day[1]."', '".$day[0]."', '".$price[$i]."', '".$extra_bed_price[$i]."', '".$avail_sup_charge[$i]."', '".$avail[$i]."', '', '".$adults[$i]."', '".$childs[$i]."', '".$avail_child_price[$i]."', '".$avail_infant[$i]."', '1')";
						$query=$this->db->query($qry);
					}
				 }
			 }
		
			 if(isset($avail_datess) && $avail_datess != "")
			 {
				$dates = $avail_datess;
				$weekday = $avail_weekday;
				$price = $avail_price;
				$extra_bed_price = $extra_bed_price;
				$avail = $avail_rooms;
				$adults = $avail_adult;
				$childs = $avail_child;
				$avail_child_price = $avail_child_price;
				$avail_infant = $avail_infant;
				$avail_sup_charge = $avail_sup_charge;
				
				for($i=0; $i<sizeof($dates); $i++)
				{
					if(strtotime($dates[$i]) >= strtotime($sdate) && strtotime($dates[$i]) <= strtotime($edate))
					{
						$day  = explode("-",$dates[$i]);
						$date = $day[2].'-'.$day[1].'-'.$day[0];
			
						$qry = "INSERT INTO `sup_apart_maintain_month` ( 
					`sup_id` ,`sup_rate_tactics_id` ,`hotel_id` ,`date` ,`week_day` ,`day` ,`month` ,`year` ,`rate` ,`extra_bed_price` ,`supplementary_charge_rate` ,`available_rooms` ,`capacity` ,`adult` ,`child` ,`child_charge` ,`infant` ,`status`)
					VALUES ( '$supplier_id', '".$id."', '".$prop_id."', '".$date."', '".$weekday[$i]."', '".$day[0]."', '".$day[1]."', '".$day[2]."', '".$price[$i]."', '".$extra_bed_price[$i]."', '".$avail_sup_charge[$i]."', '".$avail[$i]."', '', '".$adults[$i]."', '".$childs[$i]."', '".$avail_child_price[$i]."', '".$avail_infant[$i]."', '1')";
						$query=$this->db->query($qry);
				    }
				 }
			 }
			
			
		   }
		   else
		   {		   
			  $data = array(
				'sup_id' => $supplier_id,
				'hotel_id' => $prop_id,
				'season_id' => $season,
				'market_id' => $market_id,
				'category_type' => $category_name,
				'occupancy' => $occupancy,
				'adult' => $adult,
				'child' => $child,
				'child_below_age' => $child_below_age,
				'child_above_age' => $child_above_age,
				'child_above_age_charge' => $child_above_age_charge,
				'child_extra_bed_charge' => $child_extra_bed_charge,
				'infant' => $no_of_infants,
				'breakfast' => $breakfast,
				'breakfast_type' => $breakfast_type,
				'meal_plan' => $meal_plan,
				'meal_plan_lunch' => $lunch,
				'meal_plan_dinner' => $dinner,
				'adult_meal_plan_breakfast_rate' => $adult_breakfast_rate,
				'adult_meal_plan_lunch_rate' => $adult_lunch_rate,
				'adult_meal_plan_dinner_rate' => $adult_dinner_rate,
				'child_meal_plan_breakfast_rate' => $child_breakfast_rate,
				'child_meal_plan_lunch_rate' => $child_lunch_rate,
				'child_meal_plan_dinner_rate' => $child_dinner_rate,
				'child_policy' => $child_policy,
				'remarks' => $remarks,
				'cancel_policy_desc' => $cancel_policy_desc,
				'room_avail_date_from' => $avail_date_from,
				'room_avail_date_to' => $avail_date_to,
				'supplement_rate' => $supplement_rate,
				'status' => 1
				);
			
			$this->db->set('created_date', 'NOW()', FALSE); 
		
			$this->db->insert('sup_rate_tactics', $data);
			$id = $this->db->insert_id();
		
			if(isset($cancel_policy_percent) && $cancel_policy_percent != "")
			{
				for($i=0; $i<sizeof($cancel_policy_percent); $i++)
				{
					if(strtotime($cancel_policy_from[$i]) >= strtotime($sdate) && strtotime($cancel_policy_to[$i]) <= strtotime($edate))
					{
						$ins = "INSERT INTO `sup_rate_cancel_policy` (`rate_tactics_id` ,`cancel_policy_nights` ,`cancel_policy_percent` ,`cancel_policy_charge` ,`cancel_policy_from` ,`cancel_policy_to`)
					VALUES ('".$id."', '".$cancel_policy_nights[$i]."', '".$cancel_policy_percent[$i]."', '".$cancel_policy_charge[$i]."', '".$cancel_policy_from[$i]."', '".$cancel_policy_to[$i]."')";
						$exe = $this->db->query($ins);
					}
				}
			}
			
			if(isset($minimum_stay_nights) && $minimum_stay_nights != "")
			 {
				for($i=0; $i<sizeof($minimum_stay_nights); $i++)
				{
					if(strtotime($minimum_stay_from[$i]) >= strtotime($sdate) && strtotime($minimum_stay_to[$i]) <= strtotime($edate))
					{
						$inser = "INSERT INTO `sup_rate_minimum_stay` (`rate_tactics_id` ,`minimum_stay_nights` ,`minimum_stay_from` ,`minimum_stay_to`)
					VALUES ('".$id."', '".$minimum_stay_nights[$i]."','".$minimum_stay_from[$i]."', '".$minimum_stay_to[$i]."')";
						$exestay = $this->db->query($inser);
					}
				}
			 }	
		
			if(isset($price) && $price != "")
			{
				
				for($i=0; $i<sizeof($dates); $i++)
				{
					if(strtotime($dates[$i]) >= strtotime($sdate) && strtotime($dates[$i]) <= strtotime($edate))
					{
						$day  = explode("-",$dates[$i]);
						$date = $day[2].'-'.$day[1].'-'.$day[0]; 
			
						$qry = "INSERT INTO `sup_apart_maintain_month` ( 
					`sup_id` ,`sup_rate_tactics_id` ,`hotel_id` ,`date` ,`week_day` ,`day` ,`month` ,`year` ,`rate` ,`extra_bed_price` ,`supplementary_charge_rate` ,`available_rooms` ,`capacity` ,`adult` ,`child` ,`child_charge` ,`infant` ,`status`)
					VALUES ( '$supplier_id', '".$id."', '".$prop_id."', '".$date."', '".$weekday[$i]."', '".$day[0]."', '".$day[1]."', '".$day[2]."', '".$price[$i]."', '".$extra_bed_price[$i]."', '".$avail_sup_charge[$i]."', '".$avail[$i]."', '', '".$avail_adult[$i]."', '".$avail_child[$i]."', '".$avail_child_price[$i]."', '".$avail_infant[$i]."', '1')";
						$query=$this->db->query($qry);
					}
				}
			}
			  
		   }
		  
		  
		  
		}
		
		if(!empty($id)) 
		{
			return true;
		} 
		else 
		{
			return false;
		}
		
	}
	
	
	
	
	
	
	
	
	//----- Set Supplier's House Rules -----/
	function set_house_rules($supplier_id, $prop_id, $arrival_time, $departure_time, $check_in_time_from, $check_in_extra_cost_from, $check_in_time_to, $check_in_extra_cost_to, $check_out_time_from, $check_out_extra_cost_from, $check_out_time_to, $check_out_extra_cost_to, $manimum_stay, $maximum_stay, $rent_amt_percent, $rent_amt_days, $payment_mode, $cleaning, $supplies, $policy)
	{
		$policy = addslashes($policy);
		$data = array(
			'sup_id' => $supplier_id,
			'property_id' => $prop_id,
			'arrivaltime_from' => $arrival_time,
			'departtime_before' => $departure_time,
			'checkin_time1' => $check_in_time_from,
			'checkin_time2' => $check_in_time_to,
			'checkout_time1' => $check_out_time_from,
			'checkout_time2' => $check_out_time_to,
			'checkin_extracost1' => $check_in_extra_cost_from,
			'checkin_extracost2' => $check_in_extra_cost_to,
			'checkout_extracost2' => $check_out_extra_cost_from,
			'checkout_extracost1' => $check_out_extra_cost_to,
			'mini_stay' => $manimum_stay,
			'max_stay' => $maximum_stay,
			'rent_amount' => $rent_amt_percent,
			'rent_amount_days' => $rent_amt_days,
			'payment_mode' => $payment_mode,
			'pets_allowed' => '',
			'cleaning' => $cleaning,
			'supplies' => $supplies,
			'policy' => $policy
			);

		$this->db->insert('sup_apart_houserules', $data);
		$id = $this->db->insert_id();
		if(!empty($id)) {
			return true;
		} else {
			return false;
		}
	}
	
	
	//----- Edit Supplier's House Rules -----/
	function edit_house_rules($id, $arrival_time, $departure_time, $check_in_time_from, $check_in_extra_cost_from, $check_in_time_to, $check_in_extra_cost_to, $check_out_time_from, $check_out_extra_cost_from, $check_out_time_to, $check_out_extra_cost_to, $manimum_stay, $maximum_stay, $rent_amt_percent, $rent_amt_days, $payment_mode, $cleaning, $supplies, $policy)
	{
		$policy = addslashes($policy);
		$query = $this->db->query("UPDATE sup_apart_houserules SET arrivaltime_from='$arrival_time', departtime_before='$departure_time', checkin_time1='$check_in_time_from', checkin_time2='$check_in_time_to', checkout_time1='$check_out_time_from', checkout_time2='$check_out_time_to', checkin_extracost1='$check_in_extra_cost_from', checkin_extracost2='$check_in_extra_cost_to', checkout_extracost2='$check_out_extra_cost_from', checkout_extracost1='$check_out_extra_cost_to', mini_stay='$manimum_stay', max_stay='$maximum_stay', rent_amount='$rent_amt_percent', rent_amount_days='$rent_amt_days', payment_mode='$payment_mode', cleaning='$cleaning', supplies='$supplies', policy='$policy' WHERE sup_apart_houserules_id='$id'"); //exit;
		if(!empty($id)) {
			return true;
		} else {
			return false;
		}
	}
	
	//----- Get Supplier's House Rules -----/
	function get_house_rules($supplier_id,$prop_id)
	{		
		$select = "SELECT * FROM sup_apart_houserules where sup_id = '$supplier_id' AND property_id = '$prop_id'";
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->row();
		} else {
			return false;	
		}
	}
	
	//----- Set Supplier's Extra Services -----/
	function set_extra_service($supplier_id,$prop_id)
	{
		$service = $_REQUEST['service'];
		$mode = $_REQUEST['mode'];
		$cost = $_REQUEST['cost'];
		for($i=0; $i<sizeof($service); $i++)
		{
			$qry = "INSERT INTO `sup_apart_extraservice` ( 
					`sup_id` ,
					`sup_apart_list_id` ,
					`extraservice` ,
					`mode` ,
					`cost`
					)
					VALUES ( '$supplier_id',  '$prop_id',  '".$service[$i]."',  '".$mode[$i]."',  '".$cost[$i]."')";
			$query=$this->db->query($qry);
		}
	}
	
	//----- Edit Supplier's Extra Services -----/
	function edit_extra_service($supplier_id,$prop_id,$id)
	{
		$delqry = "DELETE FROM sup_apart_extraservice WHERE sup_id = '$supplier_id' and sup_apart_list_id = ".$id.""; //exit;
		$query=$this->db->query($delqry);

		$service = $_REQUEST['service'];
		$mode = $_REQUEST['mode'];
		$cost = $_REQUEST['cost'];
		for($i=0; $i<sizeof($service); $i++)
		{
			$qry = "INSERT INTO `sup_apart_extraservice` ( 
					`sup_id` ,
					`sup_apart_list_id` ,
					`extraservice` ,
					`mode` ,
					`cost`
					)
					VALUES ( '$supplier_id',  '$prop_id',  '".$service[$i]."',  '".$mode[$i]."',  '".$cost[$i]."')";
			$query=$this->db->query($qry);
		}
	}
	
	//----- Get Supplier's Extra Services -----/
	function get_extra_service($supplier_id,$prop_id)
	{		
		$select = "SELECT * FROM sup_apart_extraservice where sup_id = '$supplier_id' AND sup_apart_list_id = '$prop_id'"; 
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;	
		}
	}
	
	//----- Get Supplier's Room Rate Plan from Cate Table -----/
	function get_rate_of_room_plan($id)
	{
           
		$select = "SELECT * FROM sup_inv_cate_type where sup_inv_cate_type_id = '$id'"; 
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->row();
		} else {
			return false;	
		}
		
	}
	
	
	//------------- Get Supplier's Maintain By Month Dates -------- //
	/*function getDates()
	{
		$sds = explode("-",$_REQUEST['mmmsd']);
		$fromDate = $sds[2].'/'.$sds[1].'/'.$sds[0];
		
		$eds = explode("-",$_REQUEST['mmmed']);
		$toDate = $eds[1].'/'.$eds[0].'/'.$eds[2];
		
		$dateMonthYearArr = array();
		$fromDateTS = strtotime($fromDate);
		$toDateTS = strtotime($toDate);
		
		for ($currentDateTS = $fromDateTS; $currentDateTS <= $toDateTS; $currentDateTS += (60 * 60 * 24)) {
			if($_REQUEST['selectedDayss'] != 'All'){
				$checkDays = date("D",$currentDateTS);
				if(in_array($checkDays, $_REQUEST['selectedDayss'])) {
					$currentDateStr = date("d-m-Y D",$currentDateTS);
					$dateMonthYearArr[] = $currentDateStr;
				}
				}
			else{
				$currentDateStr = date("d-m-Y D",$currentDateTS);
				$dateMonthYearArr[] = $currentDateStr;
			}
		}
		//print_r($dateMonthYearArr);
		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode(array('dates'=>$dateMonthYearArr)));
		
	
	}*/
	
	
	
	function getDates()
	{
		
		//$sds = explode(",",$_REQUEST['mmsd']);
		
		//$eds = explode(",",$_REQUEST['mmed']);
		//print_r($_REQUEST['mmed']);
		//echo count($_REQUEST['mmed']);
		//exit;
		$sds = $_REQUEST['mmsd'];
		
		$eds = $_REQUEST['mmed'];
		
		if(is_array($sds)) 
		{
		$k=0;
		for($i=0;$i<count($sds);$i++)
		{
			$sdate = explode("-",$sds[$i]);
		
		    $fromDate[$i] = $sdate[2].'/'.$sdate[1].'/'.$sdate[0];
		
		$edate = explode("-",$eds[$i]);
		
		$toDate[$i] = $edate[1].'/'.$edate[0].'/'.$edate[2];
		
		$dateMonthYearArr = array();
		$fromDateTS = strtotime($fromDate[$i]);
		$toDateTS = strtotime($toDate[$i]);
		
		
		for ($currentDateTS = $fromDateTS; $currentDateTS <= $toDateTS; $currentDateTS += (60 * 60 * 24)) 
		{
			if($_REQUEST['selectedDays'] != 'All'){
				$checkDays = date("D",$currentDateTS);
				if(in_array($checkDays, $_REQUEST['selectedDays'])) {
					$currentDateStr = date("d-m-Y D",$currentDateTS);
					$dateMonthYearArr[] = $currentDateStr;
				}
				}
			else{
				$currentDateStr = date("d-m-Y D",$currentDateTS);
				$dateMonthYearArr[] = $currentDateStr;
			}
			
		}
		//echo count($dateMonthYearArr);
		//$combined = array_merge($dateMonthYearArr, $dateMonthYearArr);
		$result[] = $dateMonthYearArr;
		
		
		
	}
	
	$counter = count($result);
	if($counter==1)  
	{
		$dates = array_merge($result[0]);
	}
	if($counter==2)  
	{
		$dates = array_merge($result[0], $result[1]);
	}
	if($counter==3)  
	{
		$dates = array_merge($result[0], $result[1], $result[2]);
	}
	if($counter==4)  
	{
		$dates = array_merge($result[0], $result[1], $result[2], $result[3]);
	}
	if($counter==5)  
	{
		$dates = array_merge($result[0], $result[1], $result[2], $result[3], $result[4]);
	}
	if($counter==6)  
	{
		$dates = array_merge($result[0], $result[1], $result[2], $result[3], $result[4], $result[5]);
	}

	if($counter==7)  
	{
		$dates = array_merge($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6]);
	}

	if($counter==8)  
	{
		$dates = array_merge($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7]);
	}

	if($counter==9)  
	{
		$dates = array_merge($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $result[8]);
	}

	if($counter==10)  
	{
		$dates = array_merge($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $result[8], $result[9]);
	}

	//echo "<pre/>";print_r($dates);
		 $count=count($dates);
	    $this->output->set_content_type('application/json');
		$this->output->set_output(json_encode(array('dates'=>$dates,'count_days'=>$count)));
	
	
	
	
	
	
  }
  else
  {
	// echo $_REQUEST['mmed'];exit;
	         $sds = explode("-",$_REQUEST['mmsd']);
			$fromDate = $sds[2].'/'.$sds[1].'/'.$sds[0];
			
			$eds = explode("-",$_REQUEST['mmed']);
			$toDate = $eds[1].'/'.$eds[0].'/'.$eds[2];
			
			$dateMonthYearArr = array();
			$fromDateTS = strtotime($fromDate);
			$toDateTS = strtotime($toDate);
			
			for ($currentDateTS = $fromDateTS; $currentDateTS <= $toDateTS; $currentDateTS += (60 * 60 * 24))           {
			if($_REQUEST['selectedDays'] != 'All'){
				$checkDays = date("D",$currentDateTS);
				if(in_array($checkDays, $_REQUEST['selectedDays'])) {
					$currentDateStr = date("d-m-Y D",$currentDateTS);
					$dateMonthYearArr[] = $currentDateStr;
				}
				}
			else{
				$currentDateStr = date("d-m-Y D",$currentDateTS);
				$dateMonthYearArr[] = $currentDateStr;
			}
			}
			//print_r($dateMonthYearArr);
			$this->output->set_content_type('application/json');
			$this->output->set_output(json_encode(array('dates'=>$dateMonthYearArr)));
	}
	//print_r($result);
	
		
	}
	
	
	
	
	
	
	//------------- Get Supplier's Maintain By Month Dates -------- //
	function getAvailDates()
	{
		//print'<pre>';print_r($_REQUEST['mmed']);exit;
		if(isset($_REQUEST['da']) && $_REQUEST['da'] != '')
		{
			
		$sds = $_REQUEST['mmsd'];
		
		$eds = $_REQUEST['mmed'];
		if(is_array($sds)) 
		{
		$k=0;
		for($i=0;$i<count($sds);$i++)
		{
			$sdate = explode("-",$sds[$i]);
		
		    $fromDate[$i] = $sdate[2].'/'.$sdate[1].'/'.$sdate[0];
		
		$edate = explode("-",$eds[$i]);
		
		$toDate[$i] = $edate[1].'/'.$edate[0].'/'.$edate[2];
		
		$dateMonthYearArr = array();
		$fromDateTS = strtotime($fromDate[$i]);
		$toDateTS = strtotime($toDate[$i]);
		
		
		for ($currentDateTS = $fromDateTS; $currentDateTS <= $toDateTS; $currentDateTS += (60 * 60 * 24)) 
		{
			if($_REQUEST['selectedDays'] != 'All'){
				$checkDays = date("D",$currentDateTS);
				if(in_array($checkDays, $_REQUEST['selectedDays'])) {
					$currentDateStr = date("d-m-Y D",$currentDateTS);
					$dateMonthYearArr[] = $currentDateStr;
				}
				}
			else{
				$currentDateStr = date("d-m-Y D",$currentDateTS);
				$dateMonthYearArr[] = $currentDateStr;
			}
			
		}
		//echo count($dateMonthYearArr);
		//$combined = array_merge($dateMonthYearArr, $dateMonthYearArr);
		$result[] = $dateMonthYearArr;
		
		
		
	}
	
	$counter = count($result);
	if($counter==1)  
	{
		$dates = array_merge($result[0]);
	}
	if($counter==2)  
	{
		$dates = array_merge($result[0], $result[1]);
	}
	if($counter==3)  
	{
		$dates = array_merge($result[0], $result[1], $result[2]);
	}
	if($counter==4)  
	{
		$dates = array_merge($result[0], $result[1], $result[2], $result[3]);
	}
	if($counter==5)  
	{
		$dates = array_merge($result[0], $result[1], $result[2], $result[3], $result[4]);
	}
	//print_r($dates);exit;
	    $this->output->set_content_type('application/json');
		$this->output->set_output(json_encode(array('dates'=>$dates)));
			
			
	
	
	
  }
  else
  {
	//echo $_REQUEST['mmed'];exit;
	         $sds = explode("-",$_REQUEST['mmsd']);
			$fromDate = $sds[2].'/'.$sds[1].'/'.$sds[0];
			
			$eds = explode("-",$_REQUEST['mmed']);
			$toDate = $eds[1].'/'.$eds[0].'/'.$eds[2];
			
			$dateMonthYearArr = array();
			$fromDateTS = strtotime($fromDate);
			$toDateTS = strtotime($toDate);
			
			for ($currentDateTS = $fromDateTS; $currentDateTS <= $toDateTS; $currentDateTS += (60 * 60 * 24))           {
			if($_REQUEST['selectedDays'] != 'All'){
				$checkDays = date("D",$currentDateTS);
				if(in_array($checkDays, $_REQUEST['selectedDays'])) {
					$currentDateStr = date("d-m-Y D",$currentDateTS);
					$dateMonthYearArr[] = $currentDateStr;
				}
				}
			else{
				$currentDateStr = date("d-m-Y D",$currentDateTS);
				$dateMonthYearArr[] = $currentDateStr;
			}
			}
			//print_r($dateMonthYearArr);
			$this->output->set_content_type('application/json');
			$this->output->set_output(json_encode(array('dates'=>$dateMonthYearArr)));
	}
	//print_r($result);
	
			
			
			/*
			$sds = explode("-",$_REQUEST['mmsd']);
			$fromDate = $sds[2].'/'.$sds[1].'/'.$sds[0];
			
			$eds = explode("-",$_REQUEST['mmed']);
			$toDate = $eds[1].'/'.$eds[0].'/'.$eds[2];
			
			$dateMonthYearArr = array();
			$fromDateTS = strtotime($fromDate);
			$toDateTS = strtotime($toDate);
			
			for ($currentDateTS = $fromDateTS; $currentDateTS <= $toDateTS; $currentDateTS += (60 * 60 * 24))           {
			if($_REQUEST['selectedDays'] != 'All'){
				$checkDays = date("D",$currentDateTS);
				if(in_array($checkDays, $_REQUEST['selectedDays'])) {
					$currentDateStr = date("d-m-Y D",$currentDateTS);
					$dateMonthYearArr[] = $currentDateStr;
				}
				}
			else{
				$currentDateStr = date("d-m-Y D",$currentDateTS);
				$dateMonthYearArr[] = $currentDateStr;
			}
			}
			$this->output->set_content_type('application/json');
			$this->output->set_output(json_encode(array('dates'=>$dateMonthYearArr)));
		*/}
		else
		{
			//echo $_REQUEST['rate_id'];exit;
			$select = "SELECT * FROM sup_apart_maintain_month where sup_rate_tactics_id = ".$_REQUEST['rate_id']." ORDER BY date ASC"; 
			$query	= $this->db->query($select); 
			if ($query->num_rows() > 0){
				$avail_dates = $query->result();
				//print'<pre />';print_r($avail_dates);exit;
				$this->output->set_content_type('application/json');
				$this->output->set_output(json_encode(array('avail_dates'=>$avail_dates)));
			}
		}
	}
	
	//----- Get Supplier's Room Rate Plan from Cate Table -----/
	function getRateTactics()
	{
		$select = "SELECT sup_rate_tactics_id, rate_plan_name, rate_of_room_plan
					FROM sup_rate_tactics 
					WHERE rate_of_room_plan = '".$_REQUEST['invCateTypeId']."'"; 
		$query=$this->db->query($select);
		if($query->result()){
			$rate_tactics= $query->result();
			$this->output->set_content_type('application/json');
			$this->output->set_output(json_encode(array('rate_tactics'=>$rate_tactics)));
		}
		else{
			return array();
		}
		
	}
	
	
	//----- Get Supplier's Add Maintain Month -----/
	function add_maintain_month($supplier_id,$prop_id)
	{
		//print_r($_REQUEST); exit;
		$dates = $_REQUEST['dates'];
		$price = $_REQUEST['price'];
		$avail = $_REQUEST['avail'];
		$adult = $_REQUEST['adult'];
		$child = $_REQUEST['child'];
		/*$min_stay = $_REQUEST['min_stay'];
		$max_stay = $_REQUEST['max_stay'];
		if(isset($_REQUEST['on_req_checked_val'])){
		$on_req_checked_val = $_REQUEST['on_req_checked_val'];
		}
		if(isset($_REQUEST['on_arr_checked_val'])){
		$on_arr_checked_val = $_REQUEST['on_arr_checked_val'];
		}
		if(isset($_REQUEST['on_blk_checked_val'])){
		$on_blk_checked_val = $_REQUEST['on_blk_checked_val'];
		}*/
		for($i=0; $i<sizeof($dates); $i++)
		{
			$day  = explode("-",$dates[$i]);
			$date = $day[2].'-'.$day[1].'-'.$day[0];
			
			/*$dates = date_create($date);
			$day = date_format($dates, 'D'); 
			$month = date_format($dates, 'M');*/
			
			/*if(isset($on_req_checked_val[$i])){
				$on_req_checked_val[$i] = $on_req_checked_val[$i];
			}else $on_req_checked_val[$i] = '';
			
			if(isset($on_arr_checked_val[$i])){
				$on_arr_checked_val[$i] = $on_arr_checked_val[$i];
			}else $on_arr_checked_val[$i] = '';
			
			if(isset($on_blk_checked_val[$i])){
				$on_blk_checked_val[$i] = $on_blk_checked_val[$i];
			}else $on_blk_checked_val[$i] = '';*/
			
			$qry = "INSERT INTO `sup_apart_maintain_month` ( 
					`sup_id` ,`sup_rate_tactics_id` ,`hotel_id` ,`date` ,`day` ,`month` ,`year` ,`rate` ,`available_rooms` ,`capacity` ,`adult` ,`child` ,`status`
					)
					VALUES ( '$supplier_id', '".$_REQUEST['room_id']."', '".$prop_id."', '".$date."', '".$day[0]."', '".$day[1]."', '".$day[2]."', '".$price[$i]."', '".$avail[$i]."', '".$_REQUEST['capacity']."', '".$adult[$i]."', '".$child[$i]."', '1')";
			$query=$this->db->query($qry);
		}
	}
	
	
	//----- Get Supplier's Maintain Months -----/
	function get_maintain_month($supplier_id,$prop_id)
	{		
		$select = "select DATE_FORMAT(date, '%b') AS month,
							DATE_FORMAT(date, '%m') AS months,
							DATE_FORMAT(date, '%Y') AS year, 
							count(*) as value 
					from sup_apart_maintain_month 
					where sup_id = '$supplier_id' and hotel_id = '$prop_id'
					GROUP BY month ORDER BY date ASC"; 
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;	
		}
	}
	
	//----- Get Supplier's Maintain Month Dates for Open / Close Dates -----/
	function get_maintain_month_dates()
	{		
		if(isset($_REQUEST['maintain_month']) && $_REQUEST['maintain_month'] != ""){
			$dates = explode("-",$_REQUEST['maintain_month']);
			$num = cal_days_in_month(CAL_GREGORIAN, $dates[0], $dates[1]); 
			
			$fromDate = $dates[1].'/'.$dates[0].'/'.'1';
			$toDate = $dates[1].'/'.$dates[0].'/'.$num;;
			
			$dateMonthYearArr = array();
			$fromDateTS = strtotime($fromDate);
			$toDateTS = strtotime($toDate);
			
			for ($currentDateTS = $fromDateTS; $currentDateTS <= $toDateTS; $currentDateTS += (60 * 60 * 24)) {
			$currentDateStr = date("d",$currentDateTS);
			$dateMonthYearArr[] = $currentDateStr;
			}
			return count($dateMonthYearArr);
		}
	}
	
	
	//----- Get Supplier's Maintain Month Dates for Open / Close Dates -----/
	function get_rate_plan_details($supplier_id, $prop_id, $dates)
	{		
		$dates = explode("-",$dates);
		$select = "SELECT a.sup_inv_cate_type_id, a.cate_type, a.room_type, b.sup_rate_tactics_id, b.category_type, b.sup_id, b.hotel_id, c.month, c.year, c.sup_rate_tactics_id, count(*) AS count
					FROM sup_inv_cate_type a LEFT JOIN sup_rate_tactics b 
					ON a.sup_inv_cate_type_id = b.category_type
					LEFT JOIN sup_apart_maintain_month c
					ON b.sup_rate_tactics_id = c.sup_rate_tactics_id
					WHERE c.month = '$dates[0]' AND c.year = '$dates[1]' AND b.sup_id = '$supplier_id' AND b.hotel_id = '$prop_id'
					GROUP BY b.sup_rate_tactics_id ORDER BY room_type ASC ";//exit;
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;	
		}
	}
	
	//----- Check the Date is avail or not -----/
	function get_date_check($day, $month, $year, $rate_tactics_id)
	{
		$date = $year.'-'.$month.'-'.$day;
		$sql="SELECT * FROM sup_apart_maintain_month WHERE date='$date' AND sup_rate_tactics_id = '$rate_tactics_id'";
		$rs=$this->db->query($sql);
		if($rs->num_rows() > 0){
			return $rs->result();
		}
		else
		{
			return false;
		}
		
	}
	
	
	public function fetch_country()
	{
		$sql="SELECT * FROM api_hotels_city";
		$rs=$this->db->query($sql);
		if($rs->num_rows() ==''){
			return '';
		}
		else
		{
			return $rs->result();
		}
		
	}
	public function fetch_language()
	{
		$sql="SELECT * FROM language";
		$rs=$this->db->query($sql);
		if($rs->num_rows() ==''){
			return '';
		}
		else
		{
			return $rs->result();
		}
	}
	
	public function fetch_markets()
	{
		$sql="SELECT * FROM sup_hotel_markets WHERE status=1";
		$rs=$this->db->query($sql);
		if($rs->num_rows() ==''){
			return '';
		}
		else
		{
			return $rs->result();
		}
	}
	// Adding General and contact information to the sup_contact_inform  table
	public function add_contact_inf($supplier_id, $city, $market_name, $pro_name, $main_first_name, $main_last_name, $main_email, $res_first_name, $res_last_name, $res_phone, $res_fax, $res_email, $mark_first_name, $mark_last_name, $mark_phone, $mark_fax, $mark_email, $acc_first_name, $acc_last_name, $acc_phone,$acc_fax, $acc_email)
	{
		/*$count_market = count($market_name);
		$market_names = $market_name[0];
		if($count_market>1)
		{
			for($i=1;$i<$count_market;$i++)
			{
				$market_names = $market_names.','.$market_name[$i];
			}
		}*/
		
		$sql="INSERT INTO sup_hotels (sup_id, market_name, hotel_name, city, language, main_first_name, main_last_name, main_email, res_first_name, res_last_name, res_phone, res_fax, res_email, mar_first_name, mar_last_name, mar_phone, mar_fax, mar_email, acc_first_name, acc_last_name, acc_phone, acc_fax, acc_email, status)
				VALUES('$supplier_id', '', '$pro_name', '$city', '', '$main_first_name', '$main_last_name', '$main_email', '$res_first_name', '$res_last_name', '$res_phone', '$res_fax', '$res_email', '$mark_first_name', '$mark_last_name', '$mark_phone', '$mark_fax', '$mark_email', '$acc_first_name', '$acc_last_name', '$acc_phone', '$acc_fax', '$acc_email', '1')"; 
		
		$this->db->set('created_date', 'NOW()', FALSE); 
		$rs=$this->db->query($sql);
		$last_ins_id = $this->db->insert_id();
		  $wheres = "sup_hotel_id  = $last_ins_id";
			$datas = array(
				'crs_id' => 'CRS'.$last_ins_id
			);
			if ($this->db->update('sup_hotels', $datas, $wheres)) {
				
			if(!empty($last_ins_id) && isset($market_name)) {
			for($i=0; $i<sizeof($market_name); $i++)
			{
					$qry = "INSERT INTO `sup_hotel_market` ( 
						`hotel_id` ,
						`market_id` ,
						`status`
						)
						VALUES ( '$last_ins_id',  '".$market_name[$i]."',  '1')";
					$query=$this->db->query($qry);
			}
			}
				return $last_ins_id;
			} else {
				return false;
			}
			
		return $last_ins_id;
	
	}
	
	//Listing the suppliers general information
	public function contact_inform_view($supplier_id)
	{
		$sql="SELECT sup_hotel_id, sup_id, hotel_name, city, status FROM sup_hotels WHERE sup_id = '$supplier_id'";
		$rs=$this->db->query($sql);
		if($rs->num_rows() ==''){
			return '';
		}
		else
		{
			return $rs->result();
		}
	}
	
	
	public function contact_inform_edit($supplier_id,$property_id)
	{
		$sql="SELECT sup_hotel_id, sup_id, market_name, hotel_name, city, language, main_first_name, main_last_name, main_email, res_first_name, res_last_name, res_phone, res_fax, res_email, mar_first_name, mar_last_name, mar_phone, mar_fax, mar_email, acc_first_name, acc_last_name, acc_phone, acc_fax, acc_email 
		 		FROM sup_hotels  
			  	WHERE sup_id='$supplier_id' AND sup_hotel_id='$property_id'";
		$rs=$this->db->query($sql);
		return $rs->row();
		
	}
	public function update_contact_info($city, $market_name, $pro_name, $main_first_name, $main_last_name, $main_email, $res_first_name, $res_last_name, $res_phone, $res_fax, $res_email, $mark_first_name, $mark_last_name, $mark_phone, $mark_fax, $mark_email, $acc_first_name, $acc_last_name, $acc_phone,$acc_fax,$acc_email,$supplier_id,$id)
		{
			
			$sql="UPDATE sup_hotels SET city = '$city', market_name = '$market_name', hotel_name = '$pro_name', language ='', main_first_name='$main_first_name', main_last_name='$main_last_name',main_email='$main_email', res_first_name='$res_first_name', res_last_name='$res_last_name', res_phone='$res_phone', res_fax = '$res_fax', res_email='$res_email', mar_first_name='$mark_first_name',mar_last_name='$mark_last_name', mar_phone='$mark_phone', mar_fax='$mark_fax',mar_email='$mark_email', acc_first_name='$acc_first_name', acc_last_name='$acc_last_name', acc_phone='$acc_phone', acc_fax='$acc_fax', acc_email='$acc_email' WHERE sup_id='$supplier_id' AND sup_hotel_id='$id'";
				//echo $sql;exit;
			$rs=$this->db->query($sql);
			
			$delqry = "DELETE FROM sup_hotel_market WHERE hotel_id = ".$id.""; //exit;
			$query=$this->db->query($delqry);
			
			if(!empty($id) && isset($market_name)) {
			for($i=0; $i<sizeof($market_name); $i++)
			{
					$qry = "INSERT INTO `sup_hotel_market` ( 
						`hotel_id` ,
						`market_id` ,
						`status`
						)
						VALUES ( '$id',  '".$market_name[$i]."',  '1')";
					$query=$this->db->query($qry);
			}
			}
			
			if($rs)
			{
				$flg=true;
			}
			else
			{
				$flg=false;
			}
			return $flg;
		}
	
	public function fetch_class_type()
	{
		$sql="SELECT * FROM sup_class_type";
		$rs=$this->db->query($sql);
		if($rs->num_rows() ==''){
			return '';
		}
		else
		{
			return $rs->result();
		}
	}
	public function fetch_time_zone()
	{
		$sql="SELECT * FROM sup_apart_timezone_list";
		$rs=$this->db->query($sql);
		
		if($rs->num_rows() ==''){
			return '';
		}
		else
		{
			return $rs->result();
		}
	}
	public function fetch_currency_val()
	{
		$sql="SELECT country,cur_id FROM currency_converter";
		$rs=$this->db->query($sql);
		
		if($rs->num_rows() ==''){
			return '';
		}
		else
		{
			return $rs->result();
		}
	}
	
	public function add_property_info($property_id, $supplier_id, $sup_type_apart, $sup_type_hotel, $group_ass, $latitude, $longitude, $addre, $desc, $time_zone, $star_val, $currency, $web, $fax_confirm, $email_confirm, $book_fax, $book_email)
	{
		$addre = addslashes($addre);
		$desc = addslashes($desc);
		$sql="UPDATE sup_hotels SET sup_type_apart='$sup_type_apart', sup_type_hotel='$sup_type_hotel', group_val='$group_ass', latitude='$latitude', longitude='$longitude', address='$addre', descrip='$desc', timezone_id='$time_zone', star='$star_val', currency_id='$currency', website='$web', fax_confirm='$fax_confirm', email_confirm='$email_confirm', confirm_faxno='$confirm_faxno', confirm_email ='$book_email' WHERE sup_hotel_id  ='$property_id'";
		$rs=$this->db->query($sql);
	}
	
	public function contact_prop_edit($supplier_id, $property_id)
	{
		/*$sql="SELECT * FROM sup_property AS a JOIN sup_class_type AS b ON a.class_type_id = b.sup_class_id 
		JOIN sup_apart_timezone_list AS c ON a.timezone_id = c.sup_apart_timezone_list_id
		JOIN currency_converter AS d ON a.currency_id = d.cur_id WHERE a.sup_prop_id = '$property_id'";*/
		$sql="SELECT sup_hotel_id, sup_id, class_type_id, sup_type_apart, sup_type_hotel, group_val, latitude, longitude, address, descrip, timezone_id, star, currency_id , website, book_type, fax_confirm, email_confirm, confirm_faxno, confirm_email FROM sup_hotels WHERE sup_id= '$supplier_id' AND sup_hotel_id = '$property_id'";
		//echo $sql;exit;
		
		$rs=$this->db->query($sql);
		/*if($rs->num_rows()==0){
			$sql_ins="INSERT INTO sup_property(sup_prop_id) values('$property_id')";
			$rs_ins=$this->db->query($sql_ins);
			$sql="SELECT * FROM sup_property WHERE sup_prop_id = '$property_id'";
		//echo $sql;exit;
		
		$rs=$this->db->query($sql);
		return $rs->row();
		
		}
		else
		{
			return $rs->row();
		}*/
		
		return $rs->row();
	}
	
	
	
	public function update_property_info($supplier_id, $sup_type_apart, $sup_type_hotel, $group_ass, $latitude, $longitude, $addre, $desc, $time_zone, $star_val, $currency, $web, $fax_confirm, $email_confirm, $book_fax, $book_email, $property_id)
	{
		$addre = addslashes($addre);
		$desc = addslashes($desc);
		$sql="UPDATE sup_hotels SET sup_type_apart='$sup_type_apart', sup_type_hotel='$sup_type_hotel', group_val='$group_ass', latitude='$latitude', longitude='$longitude', address='$addre', descrip='$desc', timezone_id='$time_zone', star='$star_val', currency_id='$currency', website='$web', fax_confirm='$fax_confirm', email_confirm='$email_confirm', confirm_faxno='$book_fax', confirm_email ='$book_email' WHERE sup_hotel_id  ='$property_id'";
		$rs=$this->db->query($sql);
	}
	
	/*public function fetch_facility()
	{
		$sql="SELECT * FROM  sup_facility";
		$rs=$this->db->query($sql);
		
		if($rs->num_rows() ==''){
			return '';
		}
		else
		{
			return $rs->result();
		}
		
	}*/
	
	public function selected_facility($property_id)
	{
		$sql="SELECT * FROM sup_acc_facility WHERE sup_prop_id='$property_id' AND status='1'";
		$query=$this->db->query($sql);
		$arr=array();
		while($row=$query->_fetch_assoc())
		{	extract($row);
			$arr[]=$facility;		
		}
		//return $query->result();
	}
	public function checkContact($contact_id)
	{
		$sql="SELECT * FROM sup_property WHERE sup_contact_inform_id = '$contact_id'";
		//echo $sql;exit;
		$rs=$this->db->query($sql);
		$num_of_rec=$rs->num_rows();
		return  $num_of_rec;
	}
	
	public function add_hotel_facility($value, $sup_prop_id)
	{
		$sql="INSERT INTO  sup_acc_facility(facility, hotel_or_room, status, sup_prop_id) VALUES('$value', '1' ,'0' ,'$sup_prop_id')";
		$rs=$this->db->query($sql);
		
	}
	
	public function fetch_home_facility($sup_prop_id)
	{
		$sql="SELECT * FROM  sup_hotel_room_facility WHERE hotel_room = '1'"; 
		$rs=$this->db->query($sql);
		if($rs->num_rows() > 0){
			return $rs->result();
		}
		else{
			return false;
		}
	}
	
	function supplier_hotel_facilities($id, $hotel_faci)
	{		
	 	$select = "SELECT * FROM sup_accomodation_facility where hotel_id = ".$id." and sup_fac_id = ".$hotel_faci." and hotel_or_room = 1";
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;	
		}
	}
	
	public function fetch_room_facility($sup_prop_id)
	{
		$sql="SELECT * FROM  sup_hotel_room_facility WHERE hotel_room = '0'";
		$rs=$this->db->query($sql);
		
		if($rs->num_rows() ==''){
			return '';
		}
		else
		{
			return $rs->result();
		}
	}
	
	function supplier_room_facilities($id, $hotel_faci)
	{		
	 	$select = "SELECT * FROM sup_accomodation_facility where hotel_id = ".$id." and sup_fac_id = ".$hotel_faci." and hotel_or_room = 0";
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;	
		}
	}
	
	public function add_room_facility($value, $sup_prop_id)
	{
		$sql="INSERT INTO  sup_acc_facility(facility, hotel_or_room, status, sup_prop_id) VALUES('$value', '0' ,'0' ,'$sup_prop_id')";
		$rs=$this->db->query($sql);
		
	}
	
	public function add_market($value)
	{
		$sql="INSERT INTO sup_hotel_markets(market_id, market_name, status) VALUES('', '$value' ,'1')";
		$rs=$this->db->query($sql);
		
	}
	
	
	
	
	public function add_acc_facility($fac_val, $array_room_fac, $sup_prop_id)
	{
		$count_hotel=sizeof($fac_val);
		if($count_hotel>0)
		{
			for($i=0;$i<$count_hotel;$i++)
			{
				$sql="UPDATE sup_acc_facility SET hotel_or_room = '1', facility ='$fac_val[$i]' , sup_prop_id = '$sup_prop_id' , status ='1'";
				$rs=$this->db->query($sql);
			}
		}
		 $count_room=sizeof($array_room_fac);
		if($count_room>0)
		{
			for($i=0;$i<$count_room;$i++)
			{
				$sql="UPDATE sup_acc_facility SET hotel_or_room = '0', facility ='$fac_val[$i]' , sup_prop_id = '$sup_prop_id' , status ='1'";
				$rs=$this->db->query($sql);
			}
		}
		
	}
	
	public function fetch_fac($sup_prop_id)
	{
		$sql="SELECT * FROM sup_acc_facility WHERE sup_prop_id='$sup_prop_id'";
		$rs=$this->db->query($sql);
		if($rs->num_rows() ==''){
			return '';
		}
		else
		{
			return $rs->result();
		}
	}
	
	public function checkContactfac($sup_prop_id)
	{
		$sql="SELECT * FROM sup_acc_facility WHERE sup_prop_id='$sup_prop_id'";
		$rs=$this->db->query($sql);
		$num_of_rec=$rs->num_rows();
		return  $num_of_rec;
	}
	
	public function checkGeneralset()
	{
		$sql="SELECT * FROM sup_apart_generalsettings";
		$rs=$this->db->query($sql);
		$num_of_rec=$rs->num_rows();
		return  $num_of_rec;
	}
	
	public function get_settings_val($property_id)
	{
		$select="SELECT sup_hotel_id ,checkinfrom, checkoutfrom , checkinto, checkoutto, checkin_guest_after, checkout_guest_after, key_collection, key_collection_desc, grp_reservation, state_tax, state_totalstay_flag, state_totalstay_percent, state_fixedprice_flag, state_per_person, state_fixedprice, city_tax, city_totalstay_flag, city_totalstay_percent, city_fixedprice_flag, city_per_person, city_fixedprice, room_tax, room_totalstay_flag, room_totalstay_percent, room_fixedprice_flag, room_per_person, room_fixedprice, vat_tax, vat_totalstay_flag, vat_totalstay_percent,vat_fixedprice_flag, vat_per_person, vat_fixedprice, service_tax, service_totalstay_flag, service_totalstay_percent, service_fixedprice_flag, service_per_person, service_fixedprice, tax, service_charge FROM sup_hotels WHERE sup_hotel_id = '$property_id'";
			$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->row();
		} else {
			return false;	
		}
	}
	
	public function add_setting_val($sup_prop_id, $check_in_time_from, $check_in_time_to,$check_out_time_from, $check_out_time_to, $guest_in_time, $guest_out_time, $key_col, $key_descrip, $tax, $service_charge)
	{			
			
		$sql="UPDATE sup_hotels SET
			checkinfrom = '$check_in_time_from',
			checkoutfrom = '$check_out_time_from',
			checkinto = '$check_in_time_to',
			checkoutto = '$check_out_time_to',
			checkin_guest_after = '$guest_in_time', 
			checkout_guest_after = '$guest_out_time',
			key_collection = '$key_col',
			key_collection_desc = '$key_descrip', 
			tax = '$tax', 
			service_charge = '$service_charge'
			WHERE sup_hotel_id  = '$sup_prop_id'";
		//echo $sql;exit;
			$rs=$this->db->query($sql);
				
	}
	
	public function edit_setting_val($sup_prop_id, $check_in_time_from, $check_in_time_to,$check_out_time_from, $check_out_time_to, $guest_in_time, $guest_out_time, $key_col, $key_descrip, $state_tax, $state_percentage, $state_percentage_val, $state_persons, $state_price, $state_percentage, $city_tax, $city_percentage, $city_percentage_val, $city_persons, $city_price, $room_tax, $room_percentage, $room_percentage_val, $room_persons, $room_price, $vat_tax, $vat_percentage, $vat_percentage_val,$vat_persons,$vat_price, $service_tax, $service_percentage, $service_percentage_val, $service_persons, $service_price, $group)
	{
		$sql="UPDATE sup_apart_generalsettings SET
			checkinfrom = '$check_in_time_from',
			checkoutfrom = '$check_out_time_from',
			checkinto = '$check_in_time_to',
			checkoutto = '$check_out_time_to',
			checkin_after = '$guest_in_time', 
			checkout_after = '$guest_out_time',
			key_collection = '$key_col',
			key_collection_desc = '$key_descrip', 
			grp_reservation = '$group' WHERE sup_apart_generalsettings_id = '$id'";
		$rs=$this->db->query($sql);
		$last_ins_id = $this->db->insert_id();
		if($last_ins_id == '$id')
		{
			if($state_percentage == "1")
			{
				$state_persons = "0";
				$state_price = "0";
				$state_totalstay_flag = "1";
				$state_fixedprice_flag = "0";
				


			}
			elseif($state_percentage == "2")
			{
				$state_percentage_val = "0";
				$state_totalstay_flag = "0";
				$state_fixedprice_flag = "1";
			}
			else
			{
				$state_persons = "0";
				$state_price = "0";
				$state_totalstay_flag = "0";
				$state_percentage_val = "0";
				$state_fixedprice_flag = "0";
			}
			if($city_percentage == "1")
			{
				$city_persons = "0";
				$city_price = "0";
				$city_totalstay_flag = "1";
				$city_fixedprice_flag = "0";
			}
			elseif($city_percentage == "2")
			{
				$city_percentage_val = "0";
				$city_totalstay_flag = "0";
				$city_fixedprice_flag = "1";
			}
			else
			{
				$city_persons = "0";
				$city_price = "0";
				$city_totalstay_flag = "0";
				$city_percentage_val = "0";
				$city_fixedprice_flag = "0";
			}
			if($room_percentage == "1")
			{
				$room_persons = "0";
				$room_price = "0";
				$room_totalstay_flag = "1";
				$room_fixedprice_flag = "0";

			}
			elseif($room_percentage == "2")
			{
				$room_percentage_val = "0";
				$room_totalstay_flag = "0";
				$room_fixedprice_flag = "1";
			}
			else
			{
				$room_persons = "0";
				$room_price = "0";
				$room_totalstay_flag = "0";
				$room_percentage_val = "0";
				$room_fixedprice_flag = "0";
			}
			if($vat_percentage == "1")
			{
				$vat_persons = "0";
				$vat_price = "0";
				$vat_totalstay_flag = "1";
				$vat_fixedprice_flag = "0";
			}
			elseif($vat_percentage == "2")
			{
				$vat_percentage_val = "0";
				$vat_totalstay_flag = "0";
				$vat_fixedprice_flag = "1";
			}
			else
			{
				$vat_persons = "0";
				$vat_price = "0";
				$vat_totalstay_flag = "0";
				$vat_percentage_val = "0";
				$vat_fixedprice_flag = "0";

			}
			if($service_percentage == "1")
			{
				$service_persons = "0";
				$service_price = "0";
				$service_totalstay_flag = "1";
				$service_fixedprice_flag = "0";
			}
			elseif($room_percentage == "2")
			{
				$service_percentage_val = "0";
				$service_totalstay_flag = "0";
				$service_fixedprice_flag = "1";
			}
			else
			{
				$service_persons = "0";
				$service_price = "0";
				$service_totalstay_flag = "0";
				$service_percentage_val = "0";
				$service_fixedprice_flag = "0";
			}
		
			if($rs)
			{
				$sql="UPDATE sup_apart_taxes SET
					sup_apart_list_id = '$id',
					state_tax='$state_tax', 
					state_totalstay_flag = '$state_totalstay_flag',
					state_totalstay_percent = '$state_percentage_val',
					state_fixedprice_flag = '$state_fixedprice_flag',
					state_per_person = '$state_persons',
					state_fixedprice = '$state_price',
					city_tax = '$city_tax', 
					city_totalstay_flag = '$city_totalstay_flag',
					city_totalstay_percent = '$city_percentage_val', 
					city_fixedprice_flag = '$city_fixedprice_flag', 
					city_per_person = '$city_persons',
					city_fixedprice = '$city_price',
					room_tax = '$room_tax', 
					room_totalstay_flag = '$room_totalstay_flag',
					room_totalstay_percent = '$room_percentage_val',
					room_fixedprice_flag = '$room_fixedprice_flag',
					room_per_person = '$room_persons', 
					room_fixedprice = '$room_price',
					vat_tax = '$vat_tax', 
					vat_totalstay_flag = '$vat_totalstay_flag',
					vat_totalstay_percent = '$vat_percentage_val', 
					vat_fixedprice_flag = '$vat_fixedprice_flag',
					vat_per_person = '$vat_persons',
					vat_fixedprice = '$vat_price',
					service_tax = '$service_tax', 
					service_totalstay_flag = 'service_totalstay_flag',
					service_totalstay_percent = '$service_percentage_val',
					service_fixedprice_flag = '$service_fixedprice_flag',
					service_per_person = '$service_persons', 
					service_fixedprice = '$service_price' WHERE sup_apart_list_id = '$id'";
				$rs=$this->db->query($sql);
			}
		}
		
	
	
	}
	//----- Get Supplier's Detail Location -----/
	function detail_location($prop_id)
	{		
		$select = "SELECT * FROM sup_hotels where sup_hotel_id = '$prop_id'";
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;	
		}
	}
	
	//----- Set Supplier's Detail Location -----/
	function set_detail_location($prop_id, $location, $nearby_airport, $nearby_transport, $nearby_placeinterest)
	{
		/*$data = array(
			'sup_hotel_id' => $prop_id,
			'detail_location ' => $location,
			'nearby_airport' => $nearby_airport,
			'nearby_transport' => $nearby_transport,
			'nearby_placeinterest' => $nearby_placeinterest
			);*/
			$location = addslashes($location);
			$nearby_airport = addslashes($nearby_airport);
			$nearby_transport = addslashes($nearby_transport);
			$nearby_placeinterest = addslashes($nearby_placeinterest); 
			$data = $this->db->query("UPDATE sup_hotels SET detail_location ='$location', nearby_airport='$nearby_airport', nearby_transport='$nearby_transport', nearby_placeinterest ='$nearby_placeinterest' WHERE  sup_hotel_id='$prop_id'");
		
		$id = $this->db->insert_id();
		return true;
	}
	
	//----- Edit Supplier's Detail Location -----/
	function edit_detail_location($prop_id, $id, $location, $nearby_airport, $nearby_transport, $nearby_placeinterest)
	{
		$location = addslashes($location);
		$nearby_airport = addslashes($nearby_airport);
		$nearby_transport = addslashes($nearby_transport);
		$nearby_placeinterest = addslashes($nearby_placeinterest);
		$this->db->query("UPDATE sup_hotels SET detail_location ='$location', nearby_airport='$nearby_airport', nearby_transport='$nearby_transport', nearby_placeinterest ='$nearby_placeinterest' WHERE  sup_hotel_id='$prop_id'");
		if(!empty($id)) {
			return true;
		} else {
			return false;
		}
	}
	
	//========================= Get Image Extension ==================
	function getExtension($str) 
	{
		$i = strrpos($str,".");
		if (!$i) { return ""; }
		$l = strlen($str) - $i;
		$ext = substr($str,$i+1,$l);
		return $ext;
	}
	
	//==================== Upload Photos ===============================
	function uploadPhotos($fileName,$tempFile,$targetPath,$supplier_id, $prop_id)
	{
		//echo $fileName.' '. $tempFile.' '.$targetPath.' '.$supplier_id.' '.$prop_id;exit;
		$image =$fileName;
		$uploadedfile = $tempFile;
 
		if($fileName) 
		{	//echo "djhsfjeketgkr";exit;
			$fileName = stripslashes($fileName);
		
			$extension = $this->getExtension($fileName);
			$extension = strtolower($extension);
			$size=filesize($tempFile);
			if($extension=="jpg" || $extension=="jpeg")	{
				//echo "hi";
				//$src = imagecreatefromjpeg($tempFile);
				$ss=move_uploaded_file($tempFile,$targetPath.'/'.$image);
				//echo $nn=($ss)?"hhh":"kkk"; exit;
			}
			else if($extension=="png")	{
				//$src = imagecreatefrompng($tempFile);
				move_uploaded_file($tempFile,$targetPath.'/'.$image);
			}
			else	{
				//$src = imagecreatefromgif($tempFile);
				move_uploaded_file($tempFile,$targetPath.'/'.$image);
			}
				//echo "hello";exit;
			/*list($width,$height)=getimagesize($tempFile);
				
			$newWidth=	320;	$newHeight=	220;
			$tmp=imagecreatetruecolor($newWidth,$newHeight);
			imagecopyresampled($tmp,$src,0,0,0,0,$newWidth,$newHeight,$width,$height);
		 	$fileName  = rtrim($targetPath,'/') . '/' . $image; 
			imagejpeg($tmp,$fileName,100);
			imagedestroy($src);
			imagedestroy($tmp);*/
			
			$data = array(
			'sup_id' => $supplier_id,
			'sup_list_id' => $prop_id,
			'image_name' => $image,
			'status' => 1
			);
			//print_r($data);
			$this->db->insert('sup_accomodation_pictures', $data);
			//echo $this->db->last_query();exit;
			$id = $this->db->insert_id();
			return true;
		}	
	}
	
	
	//----- Get Supplier's Accomodation Pictures -----/
	function getImages($supplier_id)
	{		
		$select = "SELECT * FROM sup_accomodation_pictures WHERE sup_list_id = '".$_REQUEST['prop_id']."'";
		$query=$this->db->query($select);
		if($query->result()){
			$acc_images= $query->result();
			$this->output->set_content_type('application/json');
			$this->output->set_output(json_encode(array('acc_images'=>$acc_images)));
		}
		else{
			return array();
		}
	}
	
	
	
	
	//----- Delete Supplier's Accomodation Pictures -----/
	function delete_picture()
	{
		
		$select = "SELECT image_name FROM sup_accomodation_pictures WHERE sup_accomodation_pictures_id = '".$_REQUEST['picId']."'";
		$query=$this->db->query($select);
		foreach ($query->result() as $row)	{
			$image_name = $row->image_name;
		}
		$targetPath = 	$_SERVER['DOCUMENT_ROOT'] . '/WDM/stayaway_v1/supplier_hotels_images';
		$targetFile = 	rtrim($targetPath,'/') . '/' . $image_name;
		unlink($targetFile);
		
		$picId = $_REQUEST['picId'];
		$where = "sup_accomodation_pictures_id = $picId";
		if ($this->db->delete('sup_accomodation_pictures', $where)) {
			echo 'success';
		} else {
			return false;
		}
	}
	
	
	
	//----- Delete Supplier's Accomodation Pictures -----/
	function set_acco_pictures()
	{
	 	$imgact = $_REQUEST['imgact']; 
		for($i=0; $i<sizeof($imgact); $i++)
		{
		$this->db->query("UPDATE sup_accomodation_pictures SET status = 0 WHERE sup_accomodation_pictures_id='".$imgact[$i]."'");
		return true;
		}
	}
	
	//----- set Supplier's Accomodation Pictures -----/
	function status_pic()
	{
	 	$picId = $_REQUEST['picId'];
		$status = $_REQUEST['status'];
		$this->db->query("UPDATE sup_accomodation_pictures SET status = '".$status."' WHERE sup_accomodation_pictures_id='".$picId."'");
		return true;
	}
	
	function set_open_close_dates()
	{
		$id = explode("_",$_REQUEST['id']);
		$rate_tactics_id = $id[1];
		$day = $id[2];
		$dayl = strlen($day); 
		if($dayl == 1){
			$day = '0'.$day;
		}
		else {
			$day = $day;
		}
		$month = $id[3];
		$year = $id[4];
		$var = $_REQUEST['val'];
		$prop_id = $_REQUEST['prop_id'];
		$qry = "UPDATE sup_apart_maintain_month SET status = '$var' WHERE sup_rate_tactics_id='".$rate_tactics_id."' AND day='".$day."' AND month='".$month."' AND year='".$year."'"; //exit;
		$query=$this->db->query($qry);
		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode(array('month'=>$month,'year'=>$year)));
	}
	
	public function add_hotel_facilitys($supplier_id)
	{
		//$sql="INSERT INTO sup_acc_facility(sup_prop_id, hotel_or_room, facility, status) VALUES('$prop_id','1', '".$_REQUEST['add_facility']."',0)";
		$sql="INSERT INTO sup_hotel_room_facility(sup_id, hotel_room, facility_name, status) VALUES('$supplier_id','1', '".$_REQUEST['add_facility']."',1)";
		$rs=$this->db->query($sql);
	}
	
	
	public function acc_room_facilitys($supplier_id)
	{
		//$sql="INSERT INTO sup_acc_facility(sup_prop_id, hotel_or_room, facility, status) VALUES('$prop_id','0', '".$_REQUEST['add_room_facility']."',0)";
		$sql="INSERT INTO sup_hotel_room_facility(sup_id, hotel_room, facility_name, status) VALUES('$supplier_id','0', '".$_REQUEST['add_room_facility']."',1)";
		$rs=$this->db->query($sql);
	}
	
	
	/*function set_acco_fecilities($prop_id)
	{
		if(isset($_REQUEST['hotel_facility']) && $_REQUEST['hotel_facility'] != "")
		{
			$delqry = "UPDATE sup_acc_facility SET status = 0 WHERE sup_prop_id='".$prop_id."' and hotel_or_room = 1"; //exit;
			$query=$this->db->query($delqry);
		
			$hotel_facility = $_REQUEST['hotel_facility'];
			for($i=0; $i<sizeof($hotel_facility); $i++)
			{
				$qry = "UPDATE sup_acc_facility SET status = 1 WHERE sup_acc_fac_id='".$hotel_facility[$i]."'";
				$query=$this->db->query($qry);
			}
		}
		
		if(isset($_REQUEST['room_facility']) && $_REQUEST['room_facility'] != "")
		{
			$delqry = "UPDATE sup_acc_facility SET status = 0 WHERE sup_prop_id='".$prop_id."' and hotel_or_room = 0"; //exit;
			$query=$this->db->query($delqry);
		
			$room_facility = $_REQUEST['room_facility'];
			for($i=0; $i<sizeof($room_facility); $i++)
			{
				$qry = "UPDATE sup_acc_facility SET status = 1 WHERE sup_acc_fac_id='".$room_facility[$i]."'";
				$query=$this->db->query($qry);
			}
		
		}
	}*/
	
	function set_acco_fecilities($prop_id)
	{
		if(isset($_REQUEST['hotel_facility']) && $_REQUEST['hotel_facility'] != "")
		{
			$delqry = "DELETE FROM sup_accomodation_facility WHERE hotel_id = ".$prop_id." and hotel_or_room = 1"; 
			$query=$this->db->query($delqry);
		
			$hotel_facility = $_REQUEST['hotel_facility'];
			for($i=0; $i<sizeof($hotel_facility); $i++)
			{
				$qry = "INSERT INTO `sup_accomodation_facility` ( `hotel_id` , `sup_fac_id` , `hotel_or_room`) VALUES ( '$prop_id',  '".$hotel_facility[$i]."', '1')";
				$query=$this->db->query($qry);
			}
		}
		if(isset($_REQUEST['room_facility']) && $_REQUEST['room_facility'] != "")
		{
			$delqry = "DELETE FROM sup_accomodation_facility WHERE hotel_id = ".$prop_id." and hotel_or_room = 0"; 
			$query=$this->db->query($delqry);
		
			$room_facility = $_REQUEST['room_facility'];
			for($i=0; $i<sizeof($room_facility); $i++)
			{
			$qry = "INSERT INTO `sup_accomodation_facility` ( `hotel_id` , `sup_fac_id` , `hotel_or_room`) VALUES ( '$prop_id',  '".$room_facility[$i]."', '0')"; 
				$query=$this->db->query($qry);
			}
		}
	}
	
	
	
	
	function set_api_permanent()
	{
		$hotel_name = substr($_REQUEST['hotel_name'], 0, 3);
		$hotel_code = $_REQUEST['hotel_id'].$_REQUEST['sup_id'].$hotel_name; 
		
		$select = "SELECT * FROM sup_hotels WHERE sup_hotel_id = '".$_REQUEST['hotel_id']."'";
		$query=$this->db->query($select);
		
		if ($query->num_rows() > 0)
		{
			$hotel_name = $query->row()->hotel_name;
			$city = $query->row()->city;
			$star = $query->row()->star;
			//$image = $query->row()->star;
			$description = $query->row()->descrip;
			$location = $query->row()->detail_location;
			$latitude = $query->row()->latitude;
			$longitude = $query->row()->longitude;
			$address = $query->row()->address;
			$phone = $query->row()->res_phone;
			$fax = $query->row()->res_fax;
			//$chain = $query->row()->city;
			$postal = $query->row()->latitude;
			$email = $query->row()->res_email;
			$web = $query->row()->website;
			//$coun = $query->row()->city;
			//$room_facilities = $query->row()->city;
			//$hotel_facilities = $query->row()->city;
			
			$sql="INSERT INTO api_permanent(sup_prop_id, hotel_or_room, facility, status) VALUES('$prop_id','0', '".$_REQUEST['add_room_facility']."',0)";
			$rs=$this->db->query($sql);
			$id = $this->db->insert_id();
			if(!empty($id)) {
				return true;
			} else {
				return false;
			}
		}
	}
	
	
	function get_supplier_detail($supplier_id)
	{
		$select = "SELECT * FROM  supplier WHERE agent_id = '$supplier_id'";
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;	
		}
	}
	
	function update_supplier_detail($name, $company_name, $email_id, $password, $address, $country, $city, $postal_code, $office_phone, $mobile_no, $currency, $supplier_id)
	{
		$hotel_logo = $_FILES['hotel_logo']['name'];
		$target_path = 	$_SERVER['DOCUMENT_ROOT'] . '/wdm/stayaway_v1/supplier_logos';
		$target_path = 	rtrim($target_path,'/').'/'.basename($_FILES['hotel_logo']['name']); 
		
		if(move_uploaded_file($_FILES['hotel_logo']['tmp_name'], $target_path)) {
		//echo "The file ".  basename( $_FILES['hotel_logo']['name']). " has been uploaded";
		} else{
		//echo "There was an error uploading the file, please try again!";
		}
		$sql = "UPDATE supplier SET
				email_id = '$email_id',
				password = '$password',
				company_name = '$company_name',
				address = '$address',
				name = '$name',
				country = '$country',
				city = '$city',
				postal_code = '$postal_code',
				office_phone = '$office_phone',
				mobile = '$mobile_no',
				currency_type = '$currency',
				hotel_logo = '$hotel_logo' WHERE agent_id = '$supplier_id'";
		$rs = $this->db->query($sql);
	}
	
	function get_child_policy($hotel_id)
	{	
            
		$select = "SELECT child_policy,cancel_policy_desc FROM sup_rate_tactics where hotel_id = '$hotel_id'";
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->row();
		} else {
			return false;	
		}
	}
	
		//gett the season list
	public function get_season()
	{
		$select="select * from seasons";
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;	
		}
	}
	
	public function add_season($season)
	{
		$sql="INSERT INTO seasons(season_id,season,status) VALUES('','$season','1')";
		$ins=$this->db->query($sql);
	}
	
	public function get_agent()
	{
		$sql="select * from agent_type";
		$query=$this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		} else{
			return false;		
		}
	}
        
        public function get_season_id($season_id)
        {
            $select="select * from seasons where season_id='$season_id' AND status='1'";
            $query=$this->db->query($select);
            if($query->num_rows()>0)
            {
                return $query->result();
                               
            }else{
                return false;
            }
            
        }
        
       public function get_market_id($hotel_id)
        {
           $select="select * from sup_hotel_markets left join sup_hotel_market on sup_hotel_markets.market_id=sup_hotel_market.market_id where sup_hotel_market.hotel_id='$hotel_id'";
           
         $query=$this->db->query($select);
            if($query->num_rows()>0)
            {
                return $query->result();
                               
            }else{
                return false;
            }
       }
       
       public function add_accounting($supplier_id, $hot_id,$transferto,$accnumber,$swift,$paycurrency,$maxpayment,$bankname,$bankadd1,$bankadd2,$country,$bankstate,$bankcity,$postal,$taxidsse)
	{
		$delqry = "DELETE FROM sup_hotel_accounting WHERE supplier_id = '$supplier_id' AND hotel_id='$hot_id'"; 
		$query=$this->db->query($delqry);
		//echo $transferto;exit;
		$sql="INSERT INTO sup_hotel_accounting(sup_hotel_acounting_id,supplier_id,hotel_id,transfer_to,acc_number,swift,pay_curr,max_pay,bank_name,bank_add1,bank_add2,bank_country,bank_state,bank_city,postal_code,tax_id_sse) VALUES('', '$supplier_id' ,'$hot_id','$transferto','$accnumber','$swift','$paycurrency', '$maxpayment','$bankname', '$bankadd1','$bankadd2','$country', '$bankstate', '$bankcity', '$postal','$taxidsse')";
		$rs=$this->db->query($sql);
		
	}
	
	function get_accounting($supplier_id,$id)
	{
		 $select = "SELECT * FROM  sup_hotel_accounting WHERE supplier_id = '$supplier_id' AND hotel_id='$id'";
		$query=$this->db->query($select); 
	
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;	
		}
	}
        
         public function promotions_details($hotel_id,$room_tactics_id)
        {
            $select="select * from promotions where hotel_id='$hotel_id' AND room_tactics_id='$room_tactics_id'";
            $query=$this->db->query($select);
            if($query->num_rows()>0)
            {
                return $query->result();
            }else{
                return false;
            }
        }
        
   public function add_promotion($supplier_id, $hot_id, $room_tac_id, $room_avail_date_from, $room_avail_date_to, $staynights, $paynights, $bbdate, $hhdate, $promotion_avail_from, $promotion_avail_to, $dates, $weekday, $price, $extra_bed_price, $avail, $aadult, $achild, $child_price, $infant, $sup_charge,$booking_code,$sup_room_avail_date_from,$sup_room_avail_date_to, $season_id,$category_type,$multiple)
	{
		//$delqry = "DELETE FROM promotions WHERE hotel_id = '$hot_id' AND room_tactics_id='$room_tac_id'"; 
		//$query=$this->db->query($delqry);
		//echo $transferto;exit;
		$this->db->select('*')
				->from('sup_rate_tactics')
				->where('room_avail_date_from', $sup_room_avail_date_from)
				->where('room_avail_date_to', $sup_room_avail_date_to)
				->where('season_id', $season_id)
				->where('category_type', $category_type);
				
		$query = $this->db->get();
		//echo $this->db->last_query();exit;
		$period = $query->result();
		//echo count($period);exit;
		for($j=0; $j<count($period);$j++)
		{
			//$j=0;
			$room_tactics_id =$period[$j]->sup_rate_tactics_id;
		
		$sql="INSERT INTO promotions(promo_id,room_tactics_id,hotel_id,from_date,to_date,stay_nights,pay_nights,bb_date,hh_date,promotion_avail_date_from,promotion_avail_date_to,booking_code,multiple,status) VALUES('', '$room_tactics_id' ,'$hot_id','$room_avail_date_from','$room_avail_date_to','$staynights','$paynights','$bbdate', '$hhdate','$promotion_avail_from','$promotion_avail_to','$booking_code','$multiple','1')";
		//echo $sql;die;
		$rs=$this->db->query($sql);
                $id = $this->db->insert_id();
				
				
				if(isset($price) && $price != ""){
		/*$dates = $_REQUEST['dates'];
		$weekday = $_REQUEST['weekday'];
		$price = $_REQUEST['price'];
		$extra_bed_price = $_REQUEST['extra_bed_price'];
		$avail = $_REQUEST['avail'];
		$adult = $_REQUEST['adult'];
		$child = $_REQUEST['child'];
		$child_price = $_REQUEST['child_price'];
		$infant = $_REQUEST['infant'];
		$sup_charge = $_REQUEST['sup_charge'];*/
		for($i=0; $i<sizeof($dates); $i++)
		{
			$day  = explode("-",$dates[$i]);
			$date = $day[2].'-'.$day[1].'-'.$day[0]; 
			
			$qry = "INSERT INTO `promotion_rates` ( 
					`promo_rate_id` ,`promo_id` ,`date` ,`week_day` ,`day` ,`month` ,`year` ,`rate` ,`extra_bed_price` ,`supplementary_charge_rate` ,`available_rooms` ,`capacity` ,`adult` ,`child` ,`child_charge` ,`infant` ,`status`)
					VALUES ( '', '".$id."','".$dates[$i]."', '".$weekday[$i]."', '".$day[2]."', '".$day[1]."', '".$day[0]."', '".$price[$i]."', '".$extra_bed_price[$i]."', '".$sup_charge[$i]."', '".$avail[$i]."', '', '".$aadult[$i]."', '".$achild[$i]."', '".$child_price[$i]."', '".$infant[$i]."', '1')";
			$query=$this->db->query($qry);
		}
		}
		
		}
		
		if(!empty($id)) {
			return true;
		} else {
			return false;
		}
                
                /*if(isset($roomtype) && $amount != ""){
			for($i=0; $i<sizeof($roomtype); $i++)
			{
				$ins = "INSERT INTO `promotion_rates` (`promo_rate_id` ,`promo_id` ,`room_type` ,`amount`)
					VALUES ('', '".$id."', '".$roomtype[$i]."', '".$amount[$i]."')";
				$exe = $this->db->query($ins);
			}
		}*/
                
		
	}
	
        
        //----- Update Supplier's Rate Tactics Status -----/
	function update_promotion($id,$status)
	{
		if($status == 2)
		{
			$where2 = "promo_id = $id";
                        $this->db->delete('promotion_rates', $where2);
			if ($this->db->delete('promotions', $where2)) {
				return true;
			} else {
				return false;
			}
		}
		else
		{
			$where = "promo_id = $id";
			$data = array(
				'status' => $status
			);
			if ($this->db->update('promotions', $data, $where)) {
				return true;
			} else {
				return false;
			}
		}
	}
        
        public function promotion_view_details($promo_id)
        {
            $select="select * from promotions where promo_id='$promo_id'";
            $query=$this->db->query($select);
            if($query->num_rows()>0)
            {
                return $query->row();
            }else{
                return false;
            }
        }
        
        function get_promotion_rates()
        {
            
            $select="select * from promotion_rates where promo_id=".$_REQUEST['promo_id']."";
            $query=$this->db->query($select);
            if($query->num_rows()>0)
            {
                $avail_rates=$query->result();
                $this->output->set_content_type('application/json');
                $this->output->set_output(json_encode(array('promo_rates'=>$avail_rates)));
            }
        }
		
		public function get_cate_type()
		{
			$select="select * from sup_cate_type";
			$query=$this->db->query($select);
			if ($query->num_rows() > 0)
			{
				return $query->result();
			} else {
				return false;	
			}
		}
		public function add_cate($cate_type)
		{
			$sql="INSERT INTO sup_cate_type (cate_type_id,cate_type,cate_status) VALUES('','$cate_type','1')";
			$ins=$this->db->query($sql);
		}
		
		function season_rate_tactics($supplier_id,$prop_id,$cate_type)
		{		
			$select = "SELECT * FROM sup_rate_tactics WHERE sup_id = '$supplier_id' AND hotel_id = '$prop_id' AND category_type='$cate_type' GROUP BY season_id";
			$query=$this->db->query($select);
			if ($query->num_rows() > 0)
			{
				return $query->result();
			} else {
				return false;	
			}
		}
		function rate_tactics_list_by_season($supplier_id,$prop_id,$season_id,$cate_type)
		{		
			$select = "SELECT * FROM sup_rate_tactics WHERE sup_id = '$supplier_id' AND hotel_id = '$prop_id' AND season_id='$season_id' AND category_type='$cate_type'";
			$query=$this->db->query($select);
			if ($query->num_rows() > 0)
			{
				return $query->result();
			} else {
				return false;	
			}
		}
		function getCancelPolicies($rate_tac_id)
		{
			$select = "SELECT * FROM sup_rate_cancel_policy where rate_tactics_id = ".$rate_tac_id." ORDER BY cancel_policy_id DESC"; 
			$query	= $this->db->query($select); 
			if ($query->num_rows() > 0){
				$avail_dates = $query->result();
				$this->output->set_content_type('application/json');
				$this->output->set_output(json_encode(array('can_policies'=>$avail_dates)));
			}
		}
		function getMinimumStay()
		{
			$select = "SELECT * FROM sup_rate_minimum_stay where rate_tactics_id = ".$_REQUEST['room_rate_id']." ORDER BY minimum_stay_id DESC"; 
			$query	= $this->db->query($select); 
			if ($query->num_rows() > 0){
				$result_stay = $query->result();
				$this->output->set_content_type('application/json');
				$this->output->set_output(json_encode(array('minimum_stay'=>$result_stay)));
			}
		}
		function inventory_allotment_list($supplier_id,$id)
		{		
			//$select = "SELECT * FROM sup_inv_cate_allotment WHERE sup_id = '$supplier_id' AND hotel_id = '$id'";
			$select = "SELECT * FROM sup_inv_cate_allotment WHERE sup_id = '$supplier_id' AND hotel_id = '$id' GROUP BY sup_id, hotel_id, cat_type, season_id, allocation_validity_from, allocation_validity_to";
			$query=$this->db->query($select);
			if ($query->num_rows() > 0)
			{
				return $query->result();
			} else {
				return false;	
			}
		}
		function supplier_cate_types($supplier_id,$prop_id)
		{
			
			$que="select * from sup_inv_cate_type WHERE hotel_id = '$prop_id' AND sup_id = '$supplier_id' GROUP By cate_type";
			//echo $que;exit;
			$query= $this->db->query($que);
			if($query->num_rows() ==''){
				return '';
			}else{
				return $query->result();
			}
		}
     
		function add_allotment_plan($supplier_id, $prop_id, $season_id, $cate_type,$allocation_rooms, $allocation_release_days, $allocation_release_period,
		 $allocation_validity_from, $allocation_validity_to)
		{
			
			/*$data = array(  'sup_id' => $supplier_id,
							'hotel_id' => $prop_id,
							'cat_type' => $cate_type,
							'season_id' => $season_id,
							'allocation_rooms' => $allocation_rooms,
							'allocation_release_days' => $allocation_release_days,
							'allocation_release_period' => $allocation_release_period,
							'allocation_validity_from' => $allocation_validity_from,
							'allocation_validity_to' => $allocation_validity_to,
							'status' => '1',
						  );
						  
			$this->db->insert('sup_inv_cate_allotment', $data);
			$id = $this->db->insert_id();*/
			
			$sds = explode("-",$allocation_validity_from);
			$fromDate = $sds[2].'-'.$sds[1].'-'.$sds[0];
			
			$eds = explode("-",$allocation_validity_to);
			$toDate = $eds[2].'-'.$eds[1].'-'.$eds[0];
			
			$dateMonthYearArr = array();
			$fromDateTS = strtotime($fromDate);
			$toDateTS = strtotime($toDate);
			
			for ($currentDateTS = $fromDateTS; $currentDateTS <= $toDateTS; $currentDateTS += (60 * 60 * 24)) {
			$currentDateStr = date("Y-m-d",$currentDateTS);
			$dateMonthYearArr[] = $currentDateStr;
			//print $currentDateStr."<br />";
			}
			
			$que="select sup_inv_cat_allotment_id from sup_inv_cate_allotment order by sup_inv_cat_allotment_id desc limit 0,1";
			$query= $this->db->query($que);
			$row = $query->row();
			if(!empty($row->sup_inv_cat_allotment_id)){
				$sup_inv_cate_allotment_ref_id = $row->sup_inv_cat_allotment_id+1; 
			}
			else{
				$sup_inv_cate_allotment_ref_id = '0';
			}
			
			for($i=0; $i< count($dateMonthYearArr); $i++)
			{
				$data = array(  'sup_id' => $supplier_id,
								'sup_inv_cate_allotment_ref_id' => $sup_inv_cate_allotment_ref_id,
								'hotel_id' => $prop_id,
								'cat_type' => $cate_type,
								'season_id' => $season_id,
								'allocation_rooms' => $allocation_rooms,
								'allocation_release_days' => $allocation_release_days,
								'allocation_release_period' => $allocation_release_period,
								'allocation_validity_date' => $dateMonthYearArr[$i],
								'allocation_validity_from' => $allocation_validity_from,
								'allocation_validity_to' => $allocation_validity_to,
								'status' => '1',
						  );
				$query=$this->db->insert('sup_inv_cate_allotment', $data);
			//	echo $this->db->last_query();exit;
				$id = $this->db->insert_id();
			}
			
			if(!$id)
			{	
				return true;
			}else{
				return false;	
			}
		}
		
		function view_allotment($supplier_id,$hotel_id,$id)
		{		
			$select = "SELECT * FROM sup_inv_cate_allotment where sup_inv_cat_allotment_id = '$id'";
			$query=$this->db->query($select);
			if ($query->num_rows() > 0)
			{
				return $query->row();
			} else {
				return false;	
			}
		}
		function edit_allotment_plan($id, $supplier_id, $prop_id, $season_id, $cate_type,$allocation_rooms, $allocation_release_days, 
			$allocation_release_period, $allocation_validity_from, $allocation_validity_to)
		{
			
			//print_r($id);exit;
			
			$delete = "delete from sup_inv_cate_allotment where sup_inv_cate_allotment_ref_id='$id'";
			$this->db->query($delete);
			$allt_id = $id;
			$sds = explode("-",$allocation_validity_from);
			$fromDate = $sds[2].'-'.$sds[1].'-'.$sds[0];
			
			$eds = explode("-",$allocation_validity_to);
			$toDate = $eds[2].'-'.$eds[1].'-'.$eds[0];
			
			$dateMonthYearArr = array();
			$fromDateTS = strtotime($fromDate);
			$toDateTS = strtotime($toDate);
			
			for ($currentDateTS = $fromDateTS; $currentDateTS <= $toDateTS; $currentDateTS += (60 * 60 * 24)) {
			$currentDateStr = date("Y-m-d",$currentDateTS);
			$dateMonthYearArr[] = $currentDateStr;
			//print $currentDateStr."<br />";
			
			}
			
			
			for($i=0; $i< count($dateMonthYearArr)-1; $i++)
			{
				$data = array(  'sup_id' => $supplier_id,
								'sup_inv_cate_allotment_ref_id' => $allt_id,
								'hotel_id' => $prop_id,
								'cat_type' => $cate_type,
								'season_id' => $season_id,
								'allocation_rooms' => $allocation_rooms,
								'allocation_release_days' => $allocation_release_days,
								'allocation_release_period' => $allocation_release_period,
								'allocation_validity_date' => $dateMonthYearArr[$i],
								'allocation_validity_from' => $allocation_validity_from,
								'allocation_validity_to' => $allocation_validity_to,
								'status' => '1',
						  );
				$query=$this->db->insert('sup_inv_cate_allotment', $data);
				$id = $this->db->insert_id();
			}
			
			
			if(!empty($id)){
				return true;
			} else {
				return false;
			}
		}
		
		function update_allotment_list($id,$status)
		{
			if($status == 2)
			{
				$where2 = "sup_inv_cate_allotment_ref_id = $id";
				if ($this->db->delete('sup_inv_cate_allotment', $where2)) {
					return true;
				} else {
					return false;
				}
			}
			else
			{
				$where = "sup_inv_cate_allotment_ref_id = $id";
				$data = array(
					'status' => $status
				);
				if ($this->db->update('sup_inv_cate_allotment', $data, $where)) {
					return true;
				} else {
					return false;
				}
			}
		}
		
	function add_early_bird_plan($supplier_id, $prop_id, $season_id, $cate_type,$from_date, $to_date, $book_before_date, $discount,$amount,$booking_code)
	{
			
			$data = array(  'sup_id' => $supplier_id,
							'hotel_id' => $prop_id,
							'cat_type' => $cate_type,
							'season_id' => $season_id,
							'from_date' => $from_date,
							'to_date' => $to_date,
							'book_before_date' => $book_before_date,
							'discount' => $discount,
							'amount'=>$amount,
							'booking_code' =>$booking_code,
							'status' => '1',
						  );
						  
			//print '<pre>';print_r($data);exit;
			$this->db->insert('sup_inv_cate_early_bird', $data);
			$id = $this->db->insert_id();
			
			if(!$id)
			{	
				return true;
			}else{
				return false;	
			}
	
	}
	function inventory_early_bird_list($supplier_id,$id)
	{		
			$select = "SELECT * FROM sup_inv_cate_early_bird WHERE sup_id = '$supplier_id' AND hotel_id = '$id'";
			//echo $select;exit;
			$query=$this->db->query($select);
			if ($query->num_rows() > 0)
			{
				return $query->result();
			} else {
				return false;	
			}
	}
	function view_early_bird($hotel_id,$id)
	{		
		$select = "SELECT * FROM sup_inv_cate_early_bird where sup_inv_cat_early_bird_id = '$id'";
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->row();
		} else {
			return false;	
		}
	}
	function edit_early_bird_plan($id, $supplier_id, $prop_id, $season_id, $cate_type,$from_date, $to_date, $book_before_date, $discount,$amount,$booking_code)
	{
		$update="UPDATE sup_inv_cate_early_bird SET cat_type='$cate_type', season_id='$season_id', hotel_id='$prop_id', from_date='$from_date', to_date='$to_date', discount='$discount', book_before_date='$book_before_date',amount='$amount',discount='$discount',booking_code='$booking_code', status='1' WHERE sup_inv_cat_early_bird_id='$id'";
		//echo $update;exit;
		$this->db->query($update);
		if(!empty($prop_id)){
			return true;
		} else {
			return false;
		}
	}
	function update_early_bird($id,$status)
	{
		if($status == 2)
		{
			$where2 = "sup_inv_cat_early_bird_id = $id";
			if ($this->db->delete('sup_inv_cate_early_bird', $where2)) {
				return true;
			} else {
				return false;
			}
		}
		else
		{
			$where = "sup_inv_cat_early_bird_id = $id";
			$data = array(
				'status' => $status
			);
			if ($this->db->update('sup_inv_cate_early_bird', $data, $where)) {
				return true;
			} else {
				return false;
			}
		}
	}
	function getAvailDatesForPromotion()
	{
		if(isset($_REQUEST['da']) && $_REQUEST['da'] != '')
		{
			$sds = explode("-",$_REQUEST['mmsd']);
			$fromDate = $sds[2].'/'.$sds[1].'/'.$sds[0];
			
			
			$eds = explode("-",$_REQUEST['mmed']);
			$toDate = $eds[1].'/'.$eds[0].'/'.$eds[2];
			
			$dateMonthYearArr = array();
			$fromDateTS = strtotime($fromDate);
			$toDateTS = strtotime($toDate);
			
			for ($currentDateTS = $fromDateTS; $currentDateTS <= $toDateTS; $currentDateTS += (60 * 60 * 24))           {
			if($_REQUEST['selectedDays'] != 'All'){
				$checkDays = date("D",$currentDateTS);
				if(in_array($checkDays, $_REQUEST['selectedDays'])) {
					$currentDateStr = date("d-m-Y D",$currentDateTS);
					$dateMonthYearArr[] = $currentDateStr;
				}
				}
			else{
				$currentDateStr = date("d-m-Y D",$currentDateTS);
				$dateMonthYearArr[] = $currentDateStr;
			}
			}
			$this->output->set_content_type('application/json');
			$this->output->set_output(json_encode(array('dates'=>$dateMonthYearArr)));
		}
		else
		{
			//echo "asdfdsaf";exit;
			$select = "SELECT * FROM promotion_rates where promo_id = ".$_REQUEST['promo_id']." ORDER BY date ASC";
			//echo $select;exit; 
			$query	= $this->db->query($select); 
			if ($query->num_rows() > 0){
				$avail_dates = $query->result();
				//print'<pre>';print_r($avail_dates);exit;
				$this->output->set_content_type('application/json');
				$this->output->set_output(json_encode(array('avail_dates'=>$avail_dates)));
			}
		}
	}
	function update_promotion_rates($supplier_id, $hot_id, $room_tac_id,$promo_id, $fromdate, $todate, $staynights, $paynights, $bbdate, $hhdate, $promotion_avail_from, $promotion_avail_to, $dates,$datess, $weekday, $price, $extra_bed_price, $avail, $aadult, $achild, $child_price, $infant, $sup_charge,$booking_code,$multiple)
	{
		$delqry = "DELETE FROM promotions WHERE hotel_id = '$hot_id' AND room_tactics_id='$room_tac_id' AND promo_id='$promo_id'";
		 
		$query=$this->db->query($delqry);
		
		$delqry1 = "DELETE FROM promotion_rates WHERE promo_id='$promo_id'"; 
		$query=$this->db->query($delqry1);
		//echo $transferto;exit;
		$sql="INSERT INTO promotions(promo_id,room_tactics_id,hotel_id,from_date,to_date,stay_nights,pay_nights,bb_date,hh_date,promotion_avail_date_from,promotion_avail_date_to,multiple,booking_code,status) VALUES('', '$room_tac_id' ,'$hot_id','$fromdate','$todate','$staynights','$paynights','$bbdate', '$hhdate','$promotion_avail_from','$promotion_avail_to','$multiple','$booking_code','1')";
		$rs=$this->db->query($sql);
                $id = $this->db->insert_id();
				
				
	if(isset($price) && $price != "")
	{
	   if(isset($datess) && $datess != "")
	  {	
	  //echo "hii";exit;
		for($i=0; $i<sizeof($datess); $i++)
		{
			$day  = explode("-",$datess[$i]);
			$date = $day[2].'-'.$day[1].'-'.$day[0]; 
			
			$qry = "INSERT INTO `promotion_rates` ( 
					`promo_rate_id` ,`promo_id` ,`date` ,`week_day` ,`day` ,`month` ,`year` ,`rate` ,`extra_bed_price` ,`supplementary_charge_rate` ,`available_rooms` ,`capacity` ,`adult` ,`child` ,`child_charge` ,`infant` ,`status`)
					VALUES ( '', '".$id."','".$date."', '".$weekday[$i]."', '".$day[0]."', '".$day[1]."', '".$day[2]."', '".$price[$i]."', '".$extra_bed_price[$i]."', '".$sup_charge[$i]."', '".$avail[$i]."', '', '".$aadult[$i]."', '".$achild[$i]."', '".$child_price[$i]."', '".$infant[$i]."', '1')";
			$query=$this->db->query($qry);
		}
		
	   }
	   
	   if(isset($dates) && $dates != "")
	   {	
		  for($i=0; $i<sizeof($dates); $i++)
		 {
			$day  = explode("-",$dates[$i]);
			$date = $day[2].'-'.$day[1].'-'.$day[0]; 
			
			$qry = "INSERT INTO `promotion_rates` ( 
					`promo_rate_id` ,`promo_id` ,`date` ,`week_day` ,`day` ,`month` ,`year` ,`rate` ,`extra_bed_price` ,`supplementary_charge_rate` ,`available_rooms` ,`capacity` ,`adult` ,`child` ,`child_charge` ,`infant` ,`status`)
					VALUES ( '', '".$id."','".$dates[$i]."', '".$weekday[$i]."', '".$day[2]."', '".$day[1]."', '".$day[0]."', '".$price[$i]."', '".$extra_bed_price[$i]."', '".$sup_charge[$i]."', '".$avail[$i]."', '', '".$aadult[$i]."', '".$achild[$i]."', '".$child_price[$i]."', '".$infant[$i]."', '1')";
			$query=$this->db->query($qry);
		 } 
	   }
	}
		
		if(!empty($id)) {
			return true;
		} else {
			return false;
		}
	
	}
	function get_car_rental_period()
	{
		$select = "SELECT * FROM sup_car_rental_period";
		//echo $select;exit;
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;	
		}
	}
	function add_car_period($from_date, $to_date)
	{
		$data = array(
			'from_date' => $from_date,
			'to_date' => $to_date,
			'status' => 1
			);
		//print '<pre />';print_r($data);exit;
		//$this->db->set('date', 'NOW()', FALSE);
		$this->db->insert('sup_car_rental_period', $data);
		$id = $this->db->insert_id();
		
		$data1 = array(
			'sup_car_rental_period_id' => $id
			);
		$this->db->where('car_rental_period_id', $id);
		$this->db->update('sup_car_rental_period', $data1);
		
		if(!empty($id)){
			return true;
		} else {
			return false;
		}
	}
	function view_car_rental_period($id)
	{		
		$select = "SELECT * FROM sup_car_rental_period where car_rental_period_id = '$id'";
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->row();
		} else {
			return false;	
		}
	}
	function edit_car_period($from_date, $to_date,$id)
	{
		
		$update="UPDATE sup_car_rental_period SET from_date='$from_date', to_date='$to_date',status='1' WHERE car_rental_period_id='$id'";
		//echo $update;exit;
		$this->db->query($update);
		
			return true;
		
	}
	function update_car_rental_period($id,$status)
	{
		if($status == 2)
		{
			$where2 = "car_rental_period_id = $id";
			if ($this->db->delete('sup_car_rental_period', $where2)) {
				
				return true;
			} else {
				return false;
			}
		}
		else
		{
			$where = "car_rental_period_id = $id";
			$data = array(
				'status' => $status
			);
			if ($this->db->update('sup_car_rental_period', $data, $where)) {
				return true;
			} else {
				return false;
			}
		}
	}
	function get_car_rental_period_details($id)
	{
            $select = "SELECT * From sup_car_rental_period where car_rental_period_id=".$id; 
            $query=$this->db->query($select);
            if ($query->num_rows() > 0)
            {
                    return $query->row();
            } else {
                    return false;	
            }
	}
	function get_matrix()
	{
		$select="select * from sup_car_matrix";
		//echo $select;exit;
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;	
		}
	}
	function get_car_type()
	{
		$select="select * from sup_car_type";
		//echo $select;exit;
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;	
		}
	}
	function add_car_rental_details($car_rental_period_id,$matrix,$car_type,$no_of_doors,$no_of_passengers,$from_days,
		$to_days,$rates_per_day,$currency,$pai,$min_rental_period,$rates_inclusion,$insurance_access,$rates_exclusions,$security,$fuel_policy,$public_holidays,$airport_off_charges,$driving_quali,$driving_age,$additional_driver,$driving_restrictions,$non_coverage,$break_down_procedure,$toll_fee,$parking_fee,$special_equipment,$driving_across_border,$collection_charges,$oman_off_hire_charge,$chaufer_service,$late_return,$allocations,$black_out_dates,$cancellation_charges,$stop_sale,$upgrade_policy,$sup_id,$image2_url,$image1_url,$cancel_no_of_days,$cancel_charge)
	{
		
		if(isset($sup_id) && $sup_id != "")
		{
				$data = array(
				'sup_car_rental_period_id' => $car_rental_period_id,
				'matrix' => $matrix,
				'car_type' => $car_type,
				'no_of_doors' => $no_of_doors,
				'no_of_passengers' => $no_of_passengers,
				'currency' => $currency,
				'pai' => $pai,
				'min_rental_period' => $min_rental_period,
				'rates_inclusion' => $rates_inclusion,
				'insurance_access' => $insurance_access,
				'rates_exclusions' => $rates_exclusions,
				'security' => $security,
				'fuel_policy' => $fuel_policy,
				'public_holidays' => $public_holidays,
				'airport_off_charges' => $airport_off_charges,
				'driving_quali' => $driving_quali,
				'driving_age' => $driving_age,
				'additional_driver' => $additional_driver,
				'driving_restrictions' => $driving_restrictions,
				'non_coverage' => $non_coverage,
				'break_down_procedure' => $break_down_procedure,
				'toll_fee' => $toll_fee,
				'parking_fee' => $parking_fee,
				'special_equipment' => $special_equipment,
				'driving_across_border' => $driving_across_border,
				'collection_charges' => $collection_charges,
				'oman_off_hire_charge' => $oman_off_hire_charge,
				'chaufer_service' => $chaufer_service,
				'late_return' => $late_return,
				'allocations' => $allocations,
				'black_out_dates' => $black_out_dates,
				'cancellation_charges' => $cancellation_charges,
				'stop_sale' => $stop_sale,
				'upgrade_policy' => $upgrade_policy,
				'image1_url' => $image1_url,
				'image2_url' => $image2_url,
				'status' => 1
				);
			//print '<pre />';print_r($data);exit;
			$this->db->insert('sup_car_rental_details', $data);
			$rental_id = $this->db->insert_id();
			if(isset($from_days) && $from_days != "")
				{
					for($i=0; $i<sizeof($from_days); $i++)
					{	
						
						$ins = "INSERT INTO `sup_car_rental_rates` (`sup_car_rental_id` ,`from_days` ,`to_days` ,`rates_per_day`  ,`cancel_no_of_days`,`cancel_charge`)
						VALUES ('".$rental_id."', '".$from_days[$i]."','".$to_days[$i]."', '".$rates_per_day[$i]."','".$cancel_no_of_days[$i]."','".$cancel_charge[$i]."')";
						//echo $ins;exit;
							$exe = $this->db->query($ins);
					}
				}
			
		for($j=0; $j<sizeof($sup_id); $j++) {
			
				$data1="INSERT INTO `car_rental_supplier_details` (`sup_car_rental_id` ,`sup_id` )
						VALUES ('".$rental_id."', '".$sup_id[$j]."')";
				$exe = $this->db->query($data1);
			
			
			
			
			
			/*else{
				
				$data1 = array(
				        'sup_car_rental_period_id' => $sup_car_rental_period_id,
						'sup_id' => $sup_id[$j],
						'from_date' => $from,
						'to_date' => $to,
						'status' => 1
						);
				$this->db->insert('sup_car_rental_period', $data1);
				
				$car_period_id = $this->db->insert_id();
				
				
				//print '<pre />'; print_r($period_details);exit;
				$data = array(
				'sup_id' => $sup_id[$j],
				'sup_car_rental_period_id' => $sup_car_rental_period_id,
				'matrix' => $matrix,
				'car_type' => $car_type,
				'no_of_doors' => $no_of_doors,
				'no_of_passengers' => $no_of_passengers,
				'currency' => $currency,
				'pai' => $pai,
				'min_rental_period' => $min_rental_period,
				'rates_inclusion' => $rates_inclusion,
				'insurance_access' => $insurance_access,
				'rates_exclusions' => $rates_exclusions,
				'security' => $security,
				'fuel_policy' => $fuel_policy,
				'public_holidays' => $public_holidays,
				'airport_off_charges' => $airport_off_charges,
				'driving_quali' => $driving_quali,
				'driving_age' => $driving_age,
				'additional_driver' => $additional_driver,
				'driving_restrictions' => $driving_restrictions,
				'non_coverage' => $non_coverage,
				'break_down_procedure' => $break_down_procedure,
				'toll_fee' => $toll_fee,
				'parking_fee' => $parking_fee,
				'special_equipment' => $special_equipment,
				'driving_across_border' => $driving_across_border,
				'collection_charges' => $collection_charges,
				'oman_off_hire_charge' => $oman_off_hire_charge,
				'chaufer_service' => $chaufer_service,
				'late_return' => $late_return,
				'allocations' => $allocations,
				'black_out_dates' => $black_out_dates,
				'cancellation_charges' => $cancellation_charges,
				'stop_sale' => $stop_sale,
				'upgrade_policy' => $upgrade_policy,
				'image1_url' => $image1_url,
				'image2_url' => $image2_url,
				'status' => 1
				);
			//print '<pre />';print_r($data);exit;
			$this->db->insert('sup_car_rental_details', $data);
			$rental_id = $this->db->insert_id();
			$supp_id=$sup_id[$j];
			if(isset($from_days) && $from_days != "")
				{
					for($i=0; $i<sizeof($from_days); $i++)
					{	
						//$i=0;
						$ins = "INSERT INTO `sup_car_rental_rates` (`sup_car_rental_id` ,`from_days` ,`to_days` ,`rates_per_day` ,`sup_id` ,`cancel_no_of_days`,`cancel_charge`)
						VALUES ('".$rental_id."', '".$from_days[$i]."','".$to_days[$i]."', '".$rates_per_day[$i]."','".$supp_id."','".$cancel_no_of_days[$i]."','".$cancel_charge[$i]."')";
						//echo $ins;exit;
							$exe = $this->db->query($ins);
					}
				}
			} */
		}
	}
		
		
			return true;
		
			
	
	}
	function get_car_rental_details($sup_car_rental_id)
	{
		  $select = "SELECT * From sup_car_rental_details where sup_car_rental_period_id=".$sup_car_rental_id; 
		  //echo $select;exit;
            $query=$this->db->query($select);
            if ($query->num_rows() > 0)
            {
                    return $query->result();
            } else {
                    return false;	
            }
		
	}
	function update_car_rental_details($id,$status)
	{
		if($status == 2)
		{
			$where2 = "sup_car_rental_id = $id";
			if ($this->db->delete('sup_car_rental_details', $where2)) {
				
				$del= "sup_car_rental_id = $id";
				$this->db->delete('sup_car_rental_rates', $del);
				$del1="sup_car_rental_id = $id";
				$this->db->delete('car_rental_supplier_details', $del1);
				
				return true;
			} else {
				return false;
			}
		}
		else
		{
			$where = "sup_car_rental_id = $id";
			$data = array(
				'status' => $status
			);
			if ($this->db->update('sup_car_rental_details', $data, $where)) {
				return true;
			} else {
				return false;
			}
		}
	}
	function edit_car_rental_details($supplier_id,$hotel_id,$sup_car_rental_period_id,$matrix,$car_type,$no_of_doors,$no_of_passengers,$from_days,
		$to_days,$rates_per_day)
	{
		
		$data = array(
				'sup_id' => $supplier_id,
				'hotel_id' => $hotel_id,
				'sup_car_rental_period_id' => $sup_car_rental_period_id,
				'matrix' => $matrix,
				'car_type' => $car_type,
				'no_of_doors' => $no_of_doors,
				'no_of_passengers' => $no_of_passengers,
				'status' => 1
				);
		//print '<pre />';print_r($data);exit;
		$this->db->insert('sup_car_rental_details', $data);
		$id = $this->db->insert_id();
		if(isset($from_days) && $from_days != "")
			{
				for($i=0; $i<sizeof($from_days); $i++)
				{
					
					$ins = "INSERT INTO `sup_car_rental_rates` (`sup_car_rental_id` ,`from_days` ,`to_days` ,`rates_per_day`)
					VALUES ('".$id."', '".$from_days[$i]."','".$to_days[$i]."', '".$rates_per_day[$i]."')";
						$exe = $this->db->query($ins);
					
				}
			}
		if(!empty($id)) 
		{
			return true;
		} 
		else
		{
			return false;
		}
	
	}
	
	function get_car_rental_tot_details($id)
	{
		$select = "SELECT * FROM sup_car_rental_details where sup_car_rental_id = '$id'";
		//echo $select;exit;
				$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->row();
		} else {
			return false;	
		}
	}
	
	function add_matrix($matrix,$supplier_id)
	{
		$sql="INSERT INTO sup_car_matrix(sup_id,matrix,status) VALUES('$supplier_id','$matrix','1')";
		$ins=$this->db->query($sql);
		return true;
	}
	
	function add_car_type($car_type,$supplier_id)
	{
		$sql="INSERT INTO sup_car_type(sup_id,car_type,status) VALUES('$supplier_id','$car_type','1')";
		$ins=$this->db->query($sql);
		return true;
	}
	function get_cat_select_type($id)
	{
		$select="SELECT * FROM sup_car_type where sup_car_type_id = '$id'";
		$query=$this->db->query($select);
		return $query->row();
	}
	function get_car_rental_rates($id)
	{
		 $select="SELECT * FROM sup_car_rental_rates where sup_car_rental_id = '$id' order by sup_car_rental_rates_id asc";
		$query=$this->db->query($select);
		return $query->result();
	}
	function update_car_rental($car_rental_period_id,$matrix,$car_type,$no_of_doors,$no_of_passengers,$from_days,
		$to_days,$rates_per_day,$id,$currency,$pai,$min_rental_period,$rates_inclusion,$insurance_access,$rates_exclusions,$security,$fuel_policy,$public_holidays,$airport_off_charges,$driving_quali,$driving_age,$additional_driver,$driving_restrictions,$non_coverage,$break_down_procedure,$toll_fee,$parking_fee,$special_equipment,$driving_across_border,$collection_charges,$oman_off_hire_charge,$chaufer_service,$late_return,$allocations,$black_out_dates,$cancellation_charges,$stop_sale,$upgrade_policy,$image1_url,$image2_url,$cancel_no_of_days,$cancel_charge,$sup_id)
	{
		//print '<pre />';print_r($from_days);exit;
		$this->db->where(array('sup_car_rental_id'=>$id));
		$this->db->delete('sup_car_rental_details');
		
		
		if(isset($sup_id) && $sup_id != "")
		{
				$data = array(
				'sup_car_rental_period_id' => $car_rental_period_id,
				'matrix' => $matrix,
				'car_type' => $car_type,
				'no_of_doors' => $no_of_doors,
				'no_of_passengers' => $no_of_passengers,
				'currency' => $currency,
				'pai' => $pai,
				'min_rental_period' => $min_rental_period,
				'rates_inclusion' => $rates_inclusion,
				'insurance_access' => $insurance_access,
				'rates_exclusions' => $rates_exclusions,
				'security' => $security,
				'fuel_policy' => $fuel_policy,
				'public_holidays' => $public_holidays,
				'airport_off_charges' => $airport_off_charges,
				'driving_quali' => $driving_quali,
				'driving_age' => $driving_age,
				'additional_driver' => $additional_driver,
				'driving_restrictions' => $driving_restrictions,
				'non_coverage' => $non_coverage,
				'break_down_procedure' => $break_down_procedure,
				'toll_fee' => $toll_fee,
				'parking_fee' => $parking_fee,
				'special_equipment' => $special_equipment,
				'driving_across_border' => $driving_across_border,
				'collection_charges' => $collection_charges,
				'oman_off_hire_charge' => $oman_off_hire_charge,
				'chaufer_service' => $chaufer_service,
				'late_return' => $late_return,
				'allocations' => $allocations,
				'black_out_dates' => $black_out_dates,
				'cancellation_charges' => $cancellation_charges,
				'stop_sale' => $stop_sale,
				'upgrade_policy' => $upgrade_policy,
				'image1_url' => $image1_url,
				'image2_url' => $image2_url,
				'status' => 1
				);
			//print '<pre />';print_r($data);exit;
			$this->db->insert('sup_car_rental_details', $data);
			$rental_id = $this->db->insert_id();
		
		/*$select="UPDATE  sup_car_rental_details 
							SET matrix='$matrix', 
								car_type='$car_type',
								no_of_doors='$no_of_doors', 
								no_of_passengers='$no_of_passengers',
								currency='$currency', 
								pai='$pai',
								min_rental_period='$min_rental_period', 
								rates_inclusion='$rates_inclusion',
								insurance_access='$insurance_access', 
								rates_exclusions='$rates_exclusions',
								security='$security', 
								fuel_policy='$fuel_policy', 
								public_holidays='$public_holidays',
								airport_off_charges='$airport_off_charges', 
								driving_quali='$driving_quali',
								driving_age='$driving_age', 
								additional_driver='$additional_driver',
								driving_restrictions='$driving_restrictions', 
								non_coverage='$non_coverage',
								break_down_procedure='$break_down_procedure', 
								toll_fee='$toll_fee',
								parking_fee='$parking_fee', 
								special_equipment='$special_equipment',
								driving_across_border='$driving_across_border', 
								collection_charges='$collection_charges',
								oman_off_hire_charge='$oman_off_hire_charge', 
								chaufer_service='$chaufer_service',
								late_return='$late_return', 
								allocations='$allocations',
								black_out_dates='$black_out_dates', 
								cancellation_charges='$cancellation_charges',
								stop_sale='$stop_sale', 
								upgrade_policy='$upgrade_policy',
								image1_url='$image1_url', 
								image2_url='$image2_url'
							WHERE sup_car_rental_id ='$id'";*/
							
							
							
							//print '<pre />';print_r($select);exit;
		
		
		$delete = "DELETE FROM sup_car_rental_rates WHERE sup_car_rental_id = ".$id."";
		$query= $this->db->query($delete);
		  if(isset($from_days) && $from_days != "")
			{
				for($i=0; $i<sizeof($from_days); $i++)
				{
					//$i=1;
					 $ins = "INSERT INTO `sup_car_rental_rates` (`sup_car_rental_id` ,`from_days` ,`to_days` ,`rates_per_day` ,`cancel_no_of_days` ,`cancel_charge`)
					VALUES ('".$rental_id."', '".$from_days[$i]."','".$to_days[$i]."', '".$rates_per_day[$i]."','".$cancel_no_of_days[$i]."','".$cancel_charge[$i]."')";
					//echo $ins;exit;
						$exe = $this->db->query($ins);
					
				}
			}
		$delete = "DELETE FROM car_rental_supplier_details WHERE sup_car_rental_id = ".$id."";
		$query= $this->db->query($delete);
		
		for($j=0; $j<sizeof($sup_id); $j++) {
			
				$data1="INSERT INTO `car_rental_supplier_details` (`sup_car_rental_id` ,`sup_id` )
						VALUES ('".$rental_id."', '".$sup_id[$j]."')";
				$exe = $this->db->query($data1);
		}
		
		}
		
		return true;
		
	}
	
	function add_excursion_period($from_date, $to_date)
	{
		$data = array(
			'from_date' => $from_date,
			'to_date' => $to_date,
			'status' => 1
			);
		//print '<pre />';print_r($data);exit;
		//$this->db->set('date', 'NOW()', FALSE);
		$this->db->insert('sup_excursion_period', $data);
		$id = $this->db->insert_id();
		$data1 = array(
			'sup_excursion_period_id' => $id
			);
		$this->db->where('excursion_period_id', $id);
		$this->db->update('sup_excursion_period', $data1);
		
		if(!empty($id)){
			return true;
		} else {
			return false;
		}
	}
	function get_excursion_period()
	{
		$select = "SELECT * FROM sup_excursion_period ";
		//echo $select;exit;
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;	
		}
	}
	function update_excursion_period($id,$status)
	{
		if($status == 2)
		{
			
			$where2 = "excursion_period_id = $id";
			if ($this->db->delete('sup_excursion_period', $where2)) {
				
				return true;
			} else {
				return false;
			}
		}
		else
		{
			$where = "excursion_period_id = $id";
			$data = array(
				'status' => $status
			);
			if ($this->db->update('sup_excursion_period', $data, $where)) {
				return true;
			} else {
				return false;
			}
		}
	}
	function view_excursion_period($id)
	{		
		$select = "SELECT * FROM sup_excursion_period where excursion_period_id = '$id'";
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->row();
		} else {
			return false;	
		}
	}
	function edit_excursion_period($from_date, $to_date,$id)
	{
		
		$update="UPDATE sup_excursion_period SET from_date='$from_date', to_date='$to_date',status='1' WHERE excursion_period_id ='$id'";
		//echo $update;exit;
		$result= $this->db->query($update);
		if(!empty($result)){
			return true;
		} else {
			return false;
		}
	}
	function get_excursion_period_details($id)
	{
            $select = "SELECT * From sup_excursion_period where excursion_period_id=".$id; 
            $query=$this->db->query($select);
            if ($query->num_rows() > 0)
            {
                    return $query->row();
            } else {
                    return false;	
            }
	}	
	function add_excursion_details($excursion_period_id,$excursion_name,$description,$no_of_passengers,$pickup_time,$duration,
		$adult_price,$child_price,$notes,$sup_id,$image1_url,$image2_url)
	{
		if(isset($sup_id) && $sup_id != "")
		{
			
					$data = array(
							'sup_excursion_period_id' => $excursion_period_id,
							'excursion_name' => $excursion_name,
							'description' => $description,
							'no_of_passengers' => $no_of_passengers,
							'pickup_time' => $pickup_time,
							'duration' => $duration,
							'adult_price' => $adult_price,
							'child_price' => $child_price,
							'notes' => $notes,
							'image1_url' => $image1_url,
							'image2_url' => $image2_url,
							'status' => 1
							);
					//print '<pre />';print_r($data);exit;
					$this->db->insert('sup_excursion_details', $data);
					$ex_id = $this->db->insert_id();
					
					for($j=0; $j<sizeof($sup_id); $j++) {
							
							$data1="INSERT INTO `excursion_sup_details` (`sup_excursion_id` ,`sup_id` )
								VALUES ('".$ex_id."', '".$sup_id[$j]."')";
							$exe = $this->db->query($data1);
					}
			
		}
		return true;
		
	
	}
	function get_excursion_details($id)
	{
		  $select = "SELECT * From sup_excursion_details where sup_excursion_period_id=".$id." order by sup_excursion_id desc"; 
		  //echo $select;exit;
            $query=$this->db->query($select);
            if ($query->num_rows() > 0)
            {
                    return $query->result();
            } else {
                    return false;	
            }
		
	}
	function update_excursion_details($id,$status)
	{
		if($status == 2)
		{
			$where2 = "sup_excursion_id = $id";
			if ($this->db->delete('sup_excursion_details', $where2)) {
				
				$del= "sup_excursion_id = $id";
				$this->db->delete('excursion_sup_details', $del);
				return true;
			} else {
				return false;
			}
		}
		else
		{
			$where = "sup_excursion_id = $id";
			$data = array(
				'status' => $status
			);
			if ($this->db->update('sup_excursion_details', $data, $where)) {
				return true;
			} else {
				return false;
			}
		}
	}
	function get_excursion_tot_details($id)
	{
		$select = "SELECT * FROM sup_excursion_details where sup_excursion_id = '$id'";
		//echo $select;exit;
				$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->row();
		} else {
			return false;	
		}
	}
	function edit_excursion($excursion_period_id,$id,$excursion_name,$description,$no_of_passengers,$pickup_time,$duration,
		$adult_price,$child_price,$notes,$image1_url,$image2_url,$sup_id)
	{
		
		if(isset($sup_id) && $sup_id != "")
		{
				$this->db->where(array('sup_excursion_id '=>$id));
				$this->db->delete('sup_excursion_details');
					$data = array(
							'sup_excursion_period_id' => $excursion_period_id,
							'excursion_name' => $excursion_name,
							'description' => $description,
							'no_of_passengers' => $no_of_passengers,
							'pickup_time' => $pickup_time,
							'duration' => $duration,
							'adult_price' => $adult_price,
							'child_price' => $child_price,
							'notes' => $notes,
							'image1_url' => $image1_url,
							'image2_url' => $image2_url,
							'status' => 1
							);
					//print '<pre />';print_r($data);exit;
					$this->db->insert('sup_excursion_details', $data);
					$ex_id = $this->db->insert_id();
					$delete = "DELETE FROM excursion_sup_details WHERE sup_excursion_id = ".$id."";
					$query= $this->db->query($delete);
					
					for($j=0; $j<sizeof($sup_id); $j++) {
							
							$data1="INSERT INTO `excursion_sup_details` (`sup_excursion_id` ,`sup_id` )
								VALUES ('".$ex_id."', '".$sup_id[$j]."')";
							$exe = $this->db->query($data1);
					}
			
		}
		
		return true;
		
	}
	
	function add_transfer_period($from_date, $to_date)
	{
		$data = array(
			'from_date' => $from_date,
			'to_date' => $to_date,
			'status' => 1
			);
		//print '<pre />';print_r($data);exit;
		//$this->db->set('date', 'NOW()', FALSE);
		$this->db->insert('sup_transfer_period', $data);
		$id = $this->db->insert_id();
		
		
		$data1 = array(
			'sup_transfer_period_id' => $id
			);
		$this->db->where('transfer_period_id', $id);
		$this->db->update('sup_transfer_period', $data1);
		if(!empty($id)){
			return true;
		} else {
			return false;
		}
	}
	function get_transfer_period()
	{
		$select = "SELECT * FROM sup_transfer_period";
		//echo $select;exit;
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;	
		}
	}
	function update_transfer_period($id,$status)
	{
		if($status == 2)
		{
			$where2 = "transfer_period_id = $id";
			if ($this->db->delete('sup_transfer_period', $where2)) {
				
				return true;
			} else {
				return false;
			}
		}
		else
		{
			$where = "transfer_period_id = $id";
			$data = array(
				'status' => $status
			);
			if ($this->db->update('sup_transfer_period', $data, $where)) {
				return true;
			} else {
				return false;
			}
		}
	}
	function view_transfer_period($id)
	{		
		$select = "SELECT * FROM sup_transfer_period where transfer_period_id = '$id'";
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->row();
		} else {
			return false;	
		}
	}
	function edit_transfer_period($from_date, $to_date,$id)
	{
		
		$update="UPDATE sup_transfer_period SET from_date='$from_date', to_date='$to_date',status='1' WHERE transfer_period_id ='$id'";
		//echo $update;exit;
		$this->db->query($update);
		
			return true;
		
	}
	function get_transfer_period_details($id)
	{
            $select = "SELECT * From sup_transfer_period where transfer_period_id=".$id; 
            $query=$this->db->query($select);
            if ($query->num_rows() > 0)
            {
                    return $query->row();
            } else {
                    return false;	
            }
	}
	function add_transfer_details($transfer_period_id,$pick_up,$drop_off,$car_price,$minivan_price,$microbus1_price,
		$microbus2_price,$bus_price,$notes,$sup_id)
	{
		if(isset($sup_id) && $sup_id != "")
		{
			
			$data = array(
					'sup_transfer_period_id' => $transfer_period_id,
					'pick_up' => $pick_up,
					'drop_off' => $drop_off,
					'car_price' => $car_price,
					'minivan_price' => $minivan_price,
					'microbus1_price' => $microbus1_price,
					'microbus2_price' => $microbus2_price,
					'bus_price' => $bus_price,
					'notes' => $notes,
					'status' => 1
					);
				//print '<pre />';print_r($data);exit;
				$this->db->insert('sup_transfer_details', $data);
				$transfer_id = $this->db->insert_id();
				for($j=0; $j<sizeof($sup_id); $j++) {
					
					$data1="INSERT INTO `transfer_sup_details` (`sup_transfer_id` ,`sup_id` )
								VALUES ('".$transfer_id."', '".$sup_id[$j]."')";
							$exe = $this->db->query($data1);
				}
			
		}
	
			return true;
	}	
	function get_transfer_details($id)
	{
		  $select = "SELECT * From sup_transfer_details where sup_transfer_period_id  =".$id; 
		  //echo $select;exit;
            $query=$this->db->query($select);
            if ($query->num_rows() > 0)
            {
                    return $query->result();
            } else {
                    return false;	
            }
		
	}
	function update_transfer_details($id,$status)
	{
		if($status == 2)
		{
			$where2 = "sup_transfer_id  = $id";
			if ($this->db->delete('sup_transfer_details', $where2)) {
				
				$del= "sup_transfer_id = $id";
				$this->db->delete('transfer_sup_details', $del);
				return true;
			} else {
				return false;
			}
		}
		else
		{
			$where = "sup_transfer_id = $id";
			$data = array(
				'status' => $status
			);
			if ($this->db->update('sup_transfer_details', $data, $where)) {
				return true;
			} else {
				return false;
			}
		}
	}
	function get_transfer_tot_details($id)
	{
		$select = "SELECT * FROM sup_transfer_details where sup_transfer_id = '$id'";
		//echo $select;exit;
				$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->row();
		} else {
			return false;	
		}
	}
	function edit_transfer($transfer_period_id,$id,$pick_up,$drop_off,$car_price,$minivan_price,$microbus1_price,
		$microbus2_price,$bus_price,$notes,$sup_id)
	{
		
		if(isset($sup_id) && $sup_id != "")
		{
				$this->db->where(array('sup_transfer_id '=>$id));
				$this->db->delete('sup_transfer_details');
				
				$data = array(
					'sup_transfer_period_id' => $transfer_period_id,
					'pick_up' => $pick_up,
					'drop_off' => $drop_off,
					'car_price' => $car_price,
					'minivan_price' => $minivan_price,
					'microbus1_price' => $microbus1_price,
					'microbus2_price' => $microbus2_price,
					'bus_price' => $bus_price,
					'notes' => $notes,
					'status' => 1
					);
				//print '<pre />';print_r($data);exit;
				$this->db->insert('sup_transfer_details', $data);
				$transfer_id = $this->db->insert_id();
				
				$delete = "DELETE FROM transfer_sup_details WHERE sup_transfer_id = ".$id."";
				$query= $this->db->query($delete);
				for($j=0; $j<sizeof($sup_id); $j++) {
					
					$data1="INSERT INTO `transfer_sup_details` (`sup_transfer_id` ,`sup_id` )
								VALUES ('".$transfer_id."', '".$sup_id[$j]."')";
							$exe = $this->db->query($data1);
				}
		}
		
		
			return true;
		
	}
	function get_supplier_name()
	{
		$select="select * from supplier where active=1";
		//echo $select;exit;
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;	
		}
	}
	function get_period_details($sup_car_rental_period_id)
	{
		$select="select * from sup_car_rental_period where sup_car_rental_period_id=".$sup_car_rental_period_id;
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;	
		}
	}
	
	function get_period_sup_details($sup_car_rental_period_id,$sup_id)
	{
		$select="select * from sup_car_rental_period where sup_car_rental_period_id=".$sup_car_rental_period_id." and sup_id=".$sup_id ;
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return '';	
		}
	}
	function get_ex_period_details($sup_excursion_period_id)
	{
		
		$select="select * from sup_excursion_period where sup_excursion_period_id=".$sup_excursion_period_id;
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;	
		}
	}
	function get_period_sup_ex_details($sup_excursion_period_id,$sup_id)
	{
		$select="select * from sup_excursion_period where sup_excursion_period_id=".$sup_excursion_period_id." and sup_id=".$sup_id ;
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return '';	
		}
	}
	function get_tr_period_details($sup_transfer_period_id)
	{
		
		$select="select * from sup_transfer_period where sup_transfer_period_id=".$sup_transfer_period_id;
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;	
		}
	}
	function get_period_sup_tr_details($sup_transfer_period_id,$sup_id)
	{
		$select="select * from sup_transfer_period where sup_transfer_period_id=".$sup_transfer_period_id." and sup_id=".$sup_id ;
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return '';	
		}
	}
	function add_prices_details($from_city,$to_city,$seat50_5hrs_prc,$seat50_10hrs_prc,$seat50_extra_hrs_prc,$mini_van_5hrs_prc,$mini_van_10hrs_prc,$mini_van_extra_hrs_prc,$car_5hrs_prc,$car_10hrs_prc,$car_extra_hrs_prc,$seat15_5hrs_prc,$seat15_10hrs_prc,$seat15_extra_hrs_prc,$seat30_5hrs_prc,$seat30_10hrs_prc,$seat30_extra_hrs_prc,$notes,$sup_id)
	{
		if(isset($sup_id) && $sup_id != "")
		{
				//$j=1;
				$data = array(
				'from_city' => $from_city,
				'to_city' => $to_city,
				'seat50_5hrs_prc' => $seat50_5hrs_prc,
				'seat50_10hrs_prc' => $seat50_10hrs_prc,
				'seat50_extra_hrs_prc' => $seat50_extra_hrs_prc,
				'mini_van_5hrs_prc' => $mini_van_5hrs_prc,
				'mini_van_10hrs_prc' => $mini_van_10hrs_prc,
				'mini_van_extra_hrs_prc' => $mini_van_extra_hrs_prc,
				'car_5hrs_prc' => $car_5hrs_prc,
				'car_10hrs_prc' => $car_10hrs_prc,
				'car_extra_hrs_prc' => $car_extra_hrs_prc,
				'seat15_5hrs_prc' => $seat15_5hrs_prc,
				'seat15_10hrs_prc' => $seat15_10hrs_prc,
				'seat15_extra_hrs_prc' => $seat15_extra_hrs_prc,
				'seat30_5hrs_prc' => $seat30_5hrs_prc,
				'seat30_10hrs_prc' => $seat30_10hrs_prc,
				'seat30_extra_hrs_prc' => $seat30_extra_hrs_prc,
				'notes' => $notes,
				'status' => 1
				);
				
			//print '<pre />';print_r($data);exit;
			$this->db->insert('sup_prices_details', $data);
			$id = $this->db->insert_id();
			for($j=0; $j<sizeof($sup_id); $j++) {
				
				$data1="INSERT INTO `prices_sup_details` (`sup_prices_id` ,`sup_id` )
								VALUES ('".$id."', '".$sup_id[$j]."')";
				$exe = $this->db->query($data1);
				
			}
		}
		return true;
	}
	function get_price_details()
	{
		$this->db->select('*');
		$this->db->from('sup_prices_details');
		$query=$this->db->get();  
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return '';	
		}
	}
	function update_price_list($id,$status)
	{
		if($status == 2)
		{
			$where2 = "sup_prices_id  = $id";
			if ($this->db->delete('sup_prices_details', $where2)) {
				
				$del= "sup_prices_id = $id";
				$this->db->delete('prices_sup_details', $del);
				return true;
			} else {
				return false;
			}
		}
		else
		{
			$where = "sup_prices_id = $id";
			$data = array(
				'status' => $status
			);
			if ($this->db->update('sup_prices_details', $data, $where)) {
				return true;
			} else {
				return false;
			}
		}
		
	}
	
	function get_price_list($id)
	{
		$this->db->select('*');
		$this->db->where('sup_prices_id',$id);
		$this->db->from('sup_prices_details');
		$query=$this->db->get(); 
		if ($query->num_rows() > 0)
		{
			return $query->row();
		} else {
			return '';	
		} 
	}
	function edit_price_details($from_city,$to_city,$seat50_5hrs_prc,$seat50_10hrs_prc,$seat50_extra_hrs_prc,$mini_van_5hrs_prc,$mini_van_10hrs_prc,$mini_van_extra_hrs_prc,$car_5hrs_prc,$car_10hrs_prc,$car_extra_hrs_prc,$seat15_5hrs_prc,$seat15_10hrs_prc,$seat15_extra_hrs_prc,$seat30_5hrs_prc,$seat30_10hrs_prc,$seat30_extra_hrs_prc,$notes,$sup_id,$id)
	{
		if(isset($sup_id) && $sup_id != "")
		{
				$this->db->where(array('sup_prices_id'=>$id));
				$this->db->delete('sup_prices_details');
				
				$data = array(
					'from_city' => $from_city,
					'to_city' => $to_city,
					'seat50_5hrs_prc' => $seat50_5hrs_prc,
					'seat50_10hrs_prc' => $seat50_10hrs_prc,
					'seat50_extra_hrs_prc' => $seat50_extra_hrs_prc,
					'mini_van_5hrs_prc' => $mini_van_5hrs_prc,
					'mini_van_10hrs_prc' => $mini_van_10hrs_prc,
					'mini_van_extra_hrs_prc' => $mini_van_extra_hrs_prc,
					'car_5hrs_prc' => $car_5hrs_prc,
					'car_10hrs_prc' => $car_10hrs_prc,
					'car_extra_hrs_prc' => $car_extra_hrs_prc,
					'seat15_5hrs_prc' => $seat15_5hrs_prc,
					'seat15_10hrs_prc' => $seat15_10hrs_prc,
					'seat15_extra_hrs_prc' => $seat15_extra_hrs_prc,
					'seat30_5hrs_prc' => $seat30_5hrs_prc,
					'seat30_10hrs_prc' => $seat30_10hrs_prc,
					'seat30_extra_hrs_prc' => $seat30_extra_hrs_prc,
					'notes' => $notes,
					'status' => 1
					);
				$this->db->insert('sup_prices_details', $data);
				$price_id = $this->db->insert_id();
				
				$delete = "DELETE FROM prices_sup_details WHERE sup_prices_id = ".$id."";
				$query= $this->db->query($delete);
				for($j=0; $j<sizeof($sup_id); $j++) {
					
					$data1="INSERT INTO `prices_sup_details` (`sup_prices_id` ,`sup_id` )
									VALUES ('".$price_id."', '".$sup_id[$j]."')";
					$exe = $this->db->query($data1);
					
				}
		}
			
		return true;
			
	}
	
	function get_all_supplier_details()
	{
		$select = "SELECT * FROM supplier WHERE active = 1";
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;	
		}
	}
	function get_car_all_details()
	{
		$this->db->select('*');
		$this->db->from('sup_car_type');
		$query=$this->db->get(); 
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;	
		}
	}
	function get_excursion_all_details()
	{
		$this->db->select('*');
		$this->db->from('sup_excursion_details');
		$query=$this->db->get(); 
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;	
		}
	}
	function get_transfer_all_details()
	{
		$this->db->select('*');
		$this->db->from('sup_transfer_details');
		$query=$this->db->get(); 
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;	
		}
	}
	function get_car_period_all_details()
	{
		$this->db->select('*');
		$this->db->from('sup_car_rental_period');
		$query=$this->db->get(); 
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;	
		}
	}
	function add_car_markup_details($car_markup_period_id,$sup_car_markup_period_id,$sup_id,$sup_car_type_id,$markup)
	{
		if(isset($sup_id) && $sup_id != "")
		{
			for($j=0; $j<sizeof($sup_id); $j++) {
				
					$period_details=$this->Supplier_Model->get_car_mark_period_details($car_markup_period_id);
					$from=$period_details[0]->from_date;
					$to=$period_details[0]->to_date;
				
					$car_details=$this->Supplier_Model->get_car_markup_available($car_markup_period_id,$sup_id[$j],$sup_car_type_id);
					if(!empty($car_details[0]))
					{
						$data1= array(
						'markup' => $markup);
						$where =  array(
									'sup_car_markup_period_id' => $sup_car_markup_period_id,
									'sup_id' =>$sup_id[$j],
									'sup_car_type_id' => $sup_car_type_id
									);
						$this->db->update('sup_car_markup_details', $data1 ,$where);
						
						//echo $this->db->last_query();exit;
						$id = $this->db->insert_id();
					
					} else {
						
						$data = array(
						'sup_car_markup_period_id' => $sup_car_markup_period_id,
						'sup_id' => $sup_id[$j],
						'sup_car_type_id' => $sup_car_type_id,
						'markup' => $markup,
						'status' => 1
						);
						//print '<pre />';print_r($data);exit;
						$this->db->insert('sup_car_markup_details', $data);
						$id = $this->db->insert_id();
						
					}
				
			}
			
				
		}
		return true;
	}
	function get_car_markup_all_details()
	{
		$this->db->select('*');
		$this->db->from('sup_car_markup_details');
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;	
		}
	}
	function get_supplier_info_new($agent_id)
	{		
		$this->db->select('*');
		$this->db->where('agent_id',$agent_id);
		$this->db->from('supplier');
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			$row = $query->row();
			return $row->company_name.'-'.$row->city;
		}
		else
		{
			return false;	
		}
	}
	function get_car_type_info_new($sup_car_type_id)
	{		
		$this->db->select('*');
		$this->db->where('sup_car_type_id',$sup_car_type_id);
		$this->db->from('sup_car_type');
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			$row = $query->row();
			return $row->car_type;
		}
		else
		{
			return false;	
		}
	}
	function get_ex_type_info_new($sup_excursion_id)
	{		
		$this->db->select('*');
		$this->db->where('sup_excursion_id',$sup_excursion_id);
		$this->db->from('sup_excursion_details');
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			$row = $query->row();
			return $row->excursion_name;
		}
		else
		{
			return false;	
		}
	}
	function get_tr_type_info_new($sup_transfer_id)
	{		
		$this->db->select('*');
		$this->db->where('sup_transfer_id',$sup_transfer_id);
		$this->db->from('sup_transfer_details');
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			$row = $query->row();
			return $row->pick_up.'-'.$row->drop_off;
		}
		else
		{
			return false;	
		}
	}
	function update_car_markup($id,$status)
	{
		if($status == 2)
		{
		$where2 = "sup_car_markup_id = $id";
		if ($this->db->delete('sup_car_markup_details', $where2)) {
			return true;
		} else {
			return false;
		}
		}
		else
		{
			$where = "sup_car_markup_id = $id";
			$data = array(
				'status' => $status
			);
			if ($this->db->update('sup_car_markup_details', $data, $where)) {
			return true;
			} else {
				return false;
			}
		}
	}
	function add_car_period_markup_details($from_date,$to_date)
	{
		$data = array(
				'from_date' => $from_date,
				'to_date' => $to_date,
				'status' => 1
				);
		//print '<pre />';print_r($data);exit;
		$this->db->insert('sup_car_period_markup', $data);
		$id = $this->db->insert_id();
		
		$data1 = array(
			'sup_car_markup_period_id' => $id
			);
		$this->db->where('car_markup_period_id', $id);
		$this->db->update('sup_car_period_markup', $data1);
		if(!empty($id)){
			return true;
		} else {
			return false;
		}
	}
	function get_car_markuo_period()
	{		
		$this->db->select('*');
		$this->db->from('sup_car_period_markup');
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;	
		}
	}
	function update_car_markup_period($id,$status)
	{
		if($status == 2)
		{
		$where2 = "car_markup_period_id = $id";
		if ($this->db->delete('sup_car_period_markup', $where2)) {
			return true;
		} else {
			return false;
		}
		}
		else
		{
			$where = "car_markup_period_id = $id";
			$data = array(
				'status' => $status
			);
			if ($this->db->update('sup_car_period_markup', $data, $where)) {
			return true;
			} else {
				return false;
			}
		}
	}
	function get_car_markup_period_details($id)
	{		
		$this->db->select('*');
		$this->db->where('car_markup_period_id',$id);
		$this->db->from('sup_car_period_markup');
		$query = $this->db->get();
		
		if ($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return false;	
		}
	}
	function get_ex_markup_period_details($id)
	{		
		$this->db->select('*');
		$this->db->where('excursion_markup_period_id',$id);
		$this->db->from('sup_excursion_period_markup');
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return false;	
		}
	}
	function edit_car_period_markup_details($from_date,$to_date,$id)
	{
		$data = array(
				'from_date' => $from_date,
				'to_date' => $to_date
					);
		//print '<pre />';print_r($data);exit;
		$this->db->where('car_markup_period_id', $id);
		$id=$this->db->update('sup_car_period_markup', $data);
		if(!empty($id)){
			return true;
		} else {
			return false;
		}
	}
	function get_car_mark_period_details($car_markup_period_id)
	{
		$this->db->select('*');
		$this->db->where('car_markup_period_id',$car_markup_period_id);
		$this->db->from('sup_car_period_markup');
		$query =$this->db->get();
		return $query->result();
	}
	function get_period_sup_car_mark_details($sup_car_markup_period_id,$sup_id)
	{
		$this->db->select('*');
		$this->db->from('sup_car_markup_details');
		$this->db->where('sup_car_markup_period_id',$sup_car_markup_period_id);
		$this->db->where('sup_id',$sup_id);
		$query =$this->db->get();
		return $query->result();
	}
	function get_car_mark_up_all_details($sup_car_markup_period_id)
	{
		$this->db->select('*');
		$this->db->from('sup_car_markup_details');
		$this->db->where('sup_car_markup_period_id',$sup_car_markup_period_id);
		$query =$this->db->get();
		return $query->result();
	}
	function get_marhaba_mark_up_all_details($marhaba_services_id)
	{
		$this->db->select('*');
		$this->db->from('sup_marhaba_markup_details');
		$this->db->where('marhaba_services_id',$marhaba_services_id);
		$query =$this->db->get();
		return $query->result();
	}
	function get_car_markup_available($sup_car_markup_period_id,$sup_id,$sup_car_type_id)
	{
		$this->db->select('*');
		$this->db->from('sup_car_markup_details');
		$this->db->where('sup_car_markup_period_id',$sup_car_markup_period_id);
		$this->db->where('sup_id',$sup_id);
		$this->db->where('sup_car_type_id',$sup_car_type_id);
		//$select = "SELECT * FROM sup_car_markup_details WHERE sup_car_markup_period_id =".$sup_car_markup_period_id."  and sup_id=";
		$query =$this->db->get();
		//echo $this->db->last_query();exit;
		return $query->result();
	}
	function add_markup_excursion_period($from_date,$to_date)
	{
		$data = array(
				'from_date' => $from_date,
				'to_date' => $to_date,
				'status' => 1
				);
		//print '<pre />';print_r($data);exit;
		$this->db->insert('sup_excursion_period_markup', $data);
		
		$id = $this->db->insert_id();
		
		$data1 = array(
			'sup_excursion_markup_period_id' => $id
			);
		$this->db->where('excursion_markup_period_id', $id);
		$this->db->update('sup_excursion_period_markup', $data1);
		if(!empty($id)){
			return true;
		} else {
			return false;
		}
	}
	function get_ex_markup_period()
	{		
		$this->db->select('*');
		$this->db->from('sup_excursion_period_markup');
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;	
		}
	}
	function update_ex_markup_period($id,$status)
	{
		if($status == 2)
		{
		$where2 = "excursion_markup_period_id = $id";
		if ($this->db->delete('sup_excursion_period_markup', $where2)) {
			return true;
		} else {
			return false;
		}
		}
		else
		{
			$where = "excursion_markup_period_id = $id";
			$data = array(
				'status' => $status
			);
			if ($this->db->update('sup_excursion_period_markup', $data, $where)) {
			return true;
			} else {
				return false;
			}
		}
	}
	
	function get_ex_mark_up_all_details($excursion_markup_period_id)
	{
		$this->db->select('*');
		$this->db->from('sup_excursion_markup_details');
		$this->db->where('excursion_markup_period_id',$excursion_markup_period_id);
		$query =$this->db->get();
		return $query->result();
	}
	function edit_ex_period_markup_details($from_date,$to_date,$id)
	{
		$data = array(
				'from_date' => $from_date,
				'to_date' => $to_date
					);
		//print '<pre />';print_r($data);exit;
		$this->db->where('excursion_markup_period_id', $id);
		$id=$this->db->update('sup_excursion_period_markup', $data);
		if(!empty($id)){
			return true;
		} else {
			return false;
		}
	}
	function add_ex_markup_details($excursion_markup_period_id,$sup_id,$sup_excursion_id,$markup)
	{
		if(isset($sup_id) && $sup_id != "")
		{
			for($j=0; $j<sizeof($sup_id); $j++) {
				
					$car_details=$this->Supplier_Model->get_ex_markup_available($excursion_markup_period_id,$sup_id[$j],$sup_excursion_id);
					if(!empty($car_details[0]))
					{
						$data1= array(
						'markup' => $markup);
						$where =  array(
									'excursion_markup_period_id' => $excursion_markup_period_id,
									'sup_id' =>$sup_id[$j],
									'sup_excursion_id' => $sup_excursion_id
									);
						$this->db->update('sup_excursion_markup_details', $data1 ,$where);
						
						//echo $this->db->last_query();exit;
						$id = $this->db->insert_id();
					
					} else {
						
						$data = array(
						'excursion_markup_period_id' => $excursion_markup_period_id,
						'sup_id' => $sup_id[$j],
						'sup_excursion_id' => $sup_excursion_id,
						'markup' => $markup,
						'status' => 1
						);
						//print '<pre />';print_r($data);exit;
						$this->db->insert('sup_excursion_markup_details', $data);
						$id = $this->db->insert_id();
						
					}
				
			}
			
				
		}
		return true;
	}
	function get_ex_markup_available($excursion_markup_period_id,$sup_id,$sup_excursion_id)
	{
		$this->db->select('*');
		$this->db->from('sup_excursion_markup_details');
		$this->db->where('excursion_markup_period_id',$excursion_markup_period_id);
		$this->db->where('sup_id',$sup_id);
		$this->db->where('sup_excursion_id',$sup_excursion_id);
		//$select = "SELECT * FROM sup_car_markup_details WHERE sup_car_markup_period_id =".$sup_car_markup_period_id."  and sup_id=";
		$query =$this->db->get();
		//echo $this->db->last_query();exit;
		return $query->result();
	}
	function update_excursion_markup($id,$status)
	{
		if($status == 2)
		{
		$where2 = "sup_excursion_markup_id = $id";
		if ($this->db->delete('sup_excursion_markup_details', $where2)) {
			return true;
		} else {
			return false;
		}
		}
		else
		{
			$where = "sup_excursion_markup_id = $id";
			$data = array(
				'status' => $status
			);
			if ($this->db->update('sup_excursion_markup_details', $data, $where)) {
			return true;
			} else {
				return false;
			}
		}
	}
	function get_tr_markup_period()
	{		
		$this->db->select('*');
		$this->db->from('sup_transfer_period_markup');
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return false;	
		}
	}
	function add_markup_transfer_period($from_date,$to_date)
	{
		$data = array(
				'from_date' => $from_date,
				'to_date' => $to_date,
				'status' => 1
				);
		//print '<pre />';print_r($data);exit;
		$this->db->insert('sup_transfer_period_markup', $data);
		
		$id = $this->db->insert_id();
		
		$data1 = array(
			'sup_transfer_markup_period_id' => $id
			);
		$this->db->where('transfer_markup_period_id', $id);
		$this->db->update('sup_transfer_period_markup', $data1);
		if(!empty($id)){
			return true;
		} else {
			return false;
		}
	}
	function update_tr_markup_period($id,$status)
	{
		if($status == 2)
		{
		$where2 = "transfer_markup_period_id  = $id";
		if ($this->db->delete('sup_transfer_period_markup', $where2)) {
			return true;
		} else {
			return false;
		}
		}
		else
		{
			$where = "transfer_markup_period_id  = $id";
			$data = array(
				'status' => $status
			);
			if ($this->db->update('sup_transfer_period_markup', $data, $where)) {
			return true;
			} else {
				return false;
			}
		}
	}
	function get_tr_mark_up_all_details($transfer_markup_period_id)
	{
		$this->db->select('*');
		$this->db->from('sup_transfer_markup_details');
		$this->db->where('transfer_markup_period_id',$transfer_markup_period_id);
		$query =$this->db->get();
		return $query->result();
	}
	function add_tr_markup_details($transfer_markup_period_id,$sup_id,$sup_transfer_id,$markup)
	{
		if(isset($sup_id) && $sup_id != "")
		{
			for($j=0; $j<sizeof($sup_id); $j++) {
				
					$car_details=$this->Supplier_Model->get_tr_markup_available($transfer_markup_period_id,$sup_id[$j],$sup_transfer_id);
					if(!empty($car_details[0]))
					{
						$data1= array(
						'markup' => $markup);
						$where =  array(
									'transfer_markup_period_id' => $transfer_markup_period_id,
									'sup_id' =>$sup_id[$j],
									'sup_transfer_id' => $sup_transfer_id
									);
						$this->db->update('sup_transfer_markup_details', $data1 ,$where);
						
						//echo $this->db->last_query();exit;
						$id = $this->db->insert_id();
					
					} else {
						
						$data = array(
						'transfer_markup_period_id' => $transfer_markup_period_id,
						'sup_id' => $sup_id[$j],
						'sup_transfer_id' => $sup_transfer_id,
						'markup' => $markup,
						'status' => 1
						);
						//print '<pre />';print_r($data);exit;
						$this->db->insert('sup_transfer_markup_details', $data);
						$id = $this->db->insert_id();
						
					}
				
			}
			
				
		}
		return true;
	}
	function get_tr_markup_available($transfer_markup_period_id,$sup_id,$sup_transfer_id)
	{
		$this->db->select('*');
		$this->db->from('sup_transfer_markup_details');
		$this->db->where('transfer_markup_period_id',$transfer_markup_period_id);
		$this->db->where('sup_id',$sup_id);
		$this->db->where('sup_transfer_id',$sup_transfer_id);
		//$select = "SELECT * FROM sup_car_markup_details WHERE sup_car_markup_period_id =".$sup_car_markup_period_id."  and sup_id=";
		$query =$this->db->get();
		//echo $this->db->last_query();exit;
		return $query->result();
	}
	function update_transfer_markup($id,$status)
	{
		if($status == 2)
		{
		$where2 = "sup_transfer_markup_id = $id";
		if ($this->db->delete('sup_transfer_markup_details', $where2)) {
			return true;
		} else {
			return false;
		}
		}
		else
		{
			$where = "sup_transfer_markup_id = $id";
			$data = array(
				'status' => $status
			);
			if ($this->db->update('sup_transfer_markup_details', $data, $where)) {
			return true;
			} else {
				return false;
			}
		}
	}
	function get_tr_markup_period_details($id)
	{		
		$this->db->select('*');
		$this->db->where('transfer_markup_period_id',$id);
		$this->db->from('sup_transfer_period_markup');
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return false;	
		}
	}
	function edit_tr_markup_period_details($from_date,$to_date,$id)
	{
		$data = array(
				'from_date' => $from_date,
				'to_date' => $to_date
					);
		//print '<pre />';print_r($data);exit;
		$this->db->where('transfer_markup_period_id ', $id);
		$id=$this->db->update('sup_transfer_period_markup', $data);
		if(!empty($id)){
			return true;
		} else {
			return false;
		}
	}
	function get_records_of_car()
	{
		$this->db->select('*');
		$this->db->from('sup_car_rental_details');
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return false;	
		}
	}
	function get_sup_select_type($sup_car_rental_id)
	{
		$this->db->select('*');
		$this->db->from('car_rental_supplier_details');
		$this->db->where('sup_car_rental_id',$sup_car_rental_id);
		$query = $this->db->get();
		//echo $this->db->last_query();exit;
		if($query->num_rows()>0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
	function get_sup_name_select_type($sup_id)
	{
		$this->db->select('*');
		$this->db->from('supplier');
		$this->db->where('agent_id',$sup_id);
		$query = $this->db->get();
		//echo $this->db->last_query();exit;
		if($query->num_rows()>0)
		{
			$row = $query->row();
			return $row->name.',&nbsp;';
		}
		else
		{
			return false;
		}
	}
	function get_ex_sup_select_type($sup_excursion_id )
	{
		$this->db->select('*');
		$this->db->from('excursion_sup_details');
		$this->db->where('sup_excursion_id',$sup_excursion_id);
		$query = $this->db->get();
		//echo $this->db->last_query();exit;
		if($query->num_rows()>0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
	function get_tr_sup_select_type($sup_transfer_id )
	{
		$this->db->select('*');
		$this->db->from('transfer_sup_details');
		$this->db->where('sup_transfer_id',$sup_transfer_id);
		$query = $this->db->get();
		//echo $this->db->last_query();exit;
		if($query->num_rows()>0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
	function get_pr_sup_select_type($sup_prices_id )
	{
		$this->db->select('*');
		$this->db->from('prices_sup_details');
		$this->db->where('sup_prices_id',$sup_prices_id);
		$query = $this->db->get();
		//echo $this->db->last_query();exit;
		if($query->num_rows()>0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
	function get_market_available()
	{
		$this->db->select('*');
		$this->db->from('sup_hotel_markets');
		$query = $this->db->get();
		if($query->num_rows()>0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
	function get_market_name($market_id)
	{
		$this->db->select('*');
		$this->db->from('sup_hotel_markets');
		$this->db->where('market_id',$market_id);
		$query = $this->db->get();
		if($query->num_rows()>0)
		{
			$row = $query->row();
			return $row->market_name;
		}
		else
		{
			return false;
		}
	}
	function get_rate_tactics_pre_records($supplier_id,$prop_id)
	{
		$this->db->select('*');
		$this->db->from('sup_rate_tactics');
		$this->db->where('hotel_id',$prop_id);
		$query = $this->db->get();
		if($query->num_rows()>0)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}
	
	
	// ----------------------- Marhaba Services ---------------------- //
	function add_desc_cate($cate)
	{
		$sql="INSERT INTO marhaba_desc_cate(marhaba_desc_cate_name,marhaba_desc_cate_status) VALUES('$cate','1')";
		$ins=$this->db->query($sql);
		return true;
	}
	
	function add_air_code($airport)
	{
		$sql="INSERT INTO marhaba_air_code(marhaba_air_code,marhaba_air_code_status) VALUES('$airport','1')";
		$ins=$this->db->query($sql);
		return true;
	}
	
	function get_desc_cate()
	{
		$select="select * from marhaba_desc_cate where marhaba_desc_cate_status = 1";
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;	
		}
	}
	
	function get_airports()
	{
		$select="select * from marhaba_air_code where marhaba_air_code_status = 1";
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;	
		}
	}
	
	
	function add_marhaba_services($desc_cate, $airport_code, $description, $nbr_of_pax, $corp_rates)
	{
		$description = addslashes($description);
		$nbr_of_pax = addslashes($nbr_of_pax);
		$data = array(
			'desc_cate' => $desc_cate,
			'airport_code' => $airport_code,
			'description' => $description,
			'nbr_of_pax' => $nbr_of_pax,
			'corp_rates' => $corp_rates,
			'status' => 1
			);
		$this->db->insert('marhaba_services', $data);
		$id = $this->db->insert_id();
		if(!empty($id)){
			return true;
		} else {
			return false;
		}
	}
	
	function get_marhaba_details()
	{
		//$select = "SELECT * FROM marhaba_services where status = 1 order by add_date DESC";
		
	 	$select = "SELECT A.*, B.*
                        FROM marhaba_services A 
                        INNER JOIN marhaba_desc_cate B ON B.marhaba_desc_cate_id = A.desc_cate 
                         order by A.add_date DESC"; 
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;	
		}
	}
	
	function view_marhaba_service($id)
	{		
		$select = "SELECT * FROM marhaba_services where marhaba_services_id = '$id'";
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->row();
		} else {
			return false;	
		}
	}
	
	function update_marhaba_services($marhaba_services_id, $desc_cate, $airport_code, $description, $nbr_of_pax, $corp_rates)
	{
		$update="UPDATE marhaba_services SET desc_cate='$desc_cate', airport_code='$airport_code', description='$description', nbr_of_pax='$nbr_of_pax', corp_rates='$corp_rates', status='1' WHERE marhaba_services_id ='$marhaba_services_id'";
		$result= $this->db->query($update);
		if(!empty($result)){
			return true;
		} else {
			return false;
		}
	}
	
	function update_marhaba_service_status($id,$status)
	{
		if($status == 2)
		{
			$where2 = "marhaba_services_id = $id";
			if ($this->db->delete('marhaba_services', $where2)) {
				
				return true;
			} else {
				return false;
			}
		}
		else
		{
			$where = "marhaba_services_id = $id";
			$data = array(
				'status' => $status
			);
			if ($this->db->update('marhaba_services', $data, $where)) {
				return true;
			} else {
				return false;
			}
		}
	}
	function get_period_information($id)
	{
		$this->db->select('*');
		$this->db->from('sup_rate_tactics');
		$this->db->where('sup_rate_tactics_id',$id);
		$query = $this->db->get();
		return $query->row();
	}
	function get_marhaba_part_details($id)
	{
		$this->db->select('*');
		$this->db->from('marhaba_services');
		$this->db->where('marhaba_services_id',$id);
		$query = $this->db->get();
		return $query->row();
	}
	function add_marhaba_markup_details($marhaba_services_id,$sup_id,$markup)
	{
		if(isset($sup_id) && $sup_id != "")
		{
			for($j=0; $j<sizeof($sup_id); $j++) {
				
					
				
					$marhaba_details=$this->Supplier_Model->get_marhaba_markup_available($marhaba_services_id,$sup_id[$j],$markup);
					if(!empty($marhaba_details[0]))
					{
						$data1= array(
						'markup' => $markup);
						$where =  array(
									'marhaba_services_id' => $marhaba_services_id,
									'sup_id' =>$sup_id[$j]
									);
						$this->db->update('sup_marhaba_markup_details', $data1 ,$where);
						
						//echo $this->db->last_query();exit;
						$id = $this->db->insert_id();
					
					} else {
						
						$data = array(
						'marhaba_services_id' => $marhaba_services_id,
						'sup_id' => $sup_id[$j],
						'markup' => $markup,
						'status' => 1
						);
						//print '<pre />';print_r($data);exit;
						$this->db->insert('sup_marhaba_markup_details', $data);
						$id = $this->db->insert_id();
						
					}
				
			}
			
				
		}
		return true;
	}
	function get_marhaba_markup_available($marhaba_services_id,$sup_id)
	{
		$this->db->select('*');
		$this->db->from('sup_marhaba_markup_details');
		$this->db->where('marhaba_services_id',$marhaba_services_id);
		$this->db->where('sup_id',$sup_id);
		//$select = "SELECT * FROM sup_car_markup_details WHERE sup_car_markup_period_id =".$sup_car_markup_period_id."  and sup_id=";
		$query =$this->db->get();
		//echo $this->db->last_query();exit;
		return $query->result();
	}
	function update_marhabha_markup($id,$status)
	{
		if($status == 2)
		{
		$where2 = "sup_marhaba_markup_id = $id";
		if ($this->db->delete('sup_marhaba_markup_details', $where2)) {
			return true;
		} else {
			return false;
		}
		}
		else
		{
			$where = "sup_marhaba_markup_id = $id";
			$data = array(
				'status' => $status
			);
			if ($this->db->update('sup_marhaba_markup_details', $data, $where)) {
			return true;
			} else {
				return false;
			}
		}
	}
	function get_cate_marbha($id)
	{
		$this->db->select('*');
		$this->db->from('marhaba_desc_cate');
		$this->db->where('marhaba_desc_cate_id ',$id);
		//$select = "SELECT * FROM sup_car_markup_details WHERE sup_car_markup_period_id =".$sup_car_markup_period_id."  and sup_id=";
		$query =$this->db->get();
		//echo $this->db->last_query();exit;
		$row= $query->row();
		return $row->marhaba_desc_cate_name;
	}
	
	function search_my_booking_details_b($booking_number='', $passenger_name='', $booking_status='',$sel_date_type='', $fdate='', $todate='', $hotel_id)
	{
		//echo $fdate;

		$where='';
		//	echo $booking_number;exit;

		if(!empty($hotel_id)){
			$where.= " and h.hotel_code = '$hotel_id'";
		}
		
		if(!empty($booking_status)){
			if($booking_status=='Pending_for_Pay'){
				$where.= " and t.status = 'Pending for Pay'";
			}
			else{
				$where.= " and t.status = '$booking_status'";
			}
		}
		
		if($booking_number != '') {
			if (empty($where)) {
				$where.= " t.booking_number ='".$booking_number."' ";
			} else {
				$where.= " and t.booking_number ='".$booking_number."' ";
			}
		}
	  
		if($passenger_name!=''){
			if (empty($where)) {
				$where.= " (c.first_name ='".$passenger_name."' or (c.middle_name ='".$passenger_name."') or (c.last_name ='".$passenger_name."')) ";
			} else {
				$where.= " and (c.first_name ='".$passenger_name."' or (c.middle_name ='".$passenger_name."') or (c.last_name ='".$passenger_name."')) ";
			}
		}
	$sel_date_type=1;
		if($sel_date_type!= '' &&  $fdate!= '' &&  $todate!= ''){
			$and = '';
			if (!empty($where)) {
				$and = ' and';
			}
			 if($sel_date_type==1){
				 $where.= $and . " h.check_in between '".$fdate."'  and '".$todate."' ";
			 }
			 else{
			 $where.= $and . " h.voucher_date between '".$fdate."'  and '".$todate."' ";
			 }
		}

		
		//$where.=' and t.booking_number !=""';

		$select = "SELECT t.*, DATEDIFF(h.check_in, CURDATE()) as booking_day_diff,h.api, h.check_in, h.check_out,h.api, h.cancel_tilldate,  CONCAT(c.first_name, ' ', c.middle_name, ' ', c.last_name) as name FROM hotel_booking_info h, transaction_details t, customer_contact_details c where h.customer_contact_details_id = t.customer_contact_details_id and c.customer_contact_details_id = h.customer_contact_details_id $where";
				 
		//echo $select; //exit;
					
		$query = $this->db->query($select);
		
		$this->db->last_query();//exit;
		
		if ( $query->num_rows > 0 )
		{ 
			return $query->result();
		}
		return false;
	
	}


	function book_detail_view_voucher1($book_id)
	{
		$this->db->select('*');
		$this->db->from('hotel_booking_info');

			$this->db->where('hotel_booking_info_id',$book_id);
		//$this->db->where('agent_id', $this->session->userdata('agentid'));

		$query=$this->db->get();
		//echo $this->db->last_query();exit;
		if($query->num_rows() ==''){
			return '';
		}else{
			return $query->row();
		}
	}

	function contact_info_detail_update($tran_id)
	{
		$this->db->select('*');
		$this->db->from('customer_contact_details');
		$this->db->where('customer_contact_details_id',$tran_id);
		$query = $this->db->get();	
		return $query->row();
	}

	function agentInfo($agent_id)
	{
		//echo "SELECT * FROM agent WHERE agent_id = $agent_id";
		$query = $this->db->query("SELECT * FROM agent WHERE agent_id = $agent_id");
		if($query->num_rows > 0)
		{
			$result = $query->row();
			if ($result->parent_id == 0) {
				return $result;
			} else {
				$agent_id = $result->parent_id;
				$query = $this->db->query("SELECT * FROM agent WHERE agent_id = $agent_id");
				if($query->num_rows > 0)
				{
					return $query->row();
				}
			}
		}else{
			return false;
		}
	}

	function pass_info_detail($tran_id)
	{
		$que="select * from  customer_info_details WHERE customer_info_details_id = ".$tran_id." or parent_id = ".$tran_id."";
		$query= $this->db->query($que);
		if($query->num_rows() ==''){
			return '';
		}else{
			return $query->result();
		}
	}

	function transation_detail_contact($id)
	{
		$que="select * from  transaction_details WHERE 	customer_contact_details_id = ".$id." ";
		$query= $this->db->query($que);
		if($query->num_rows() ==''){
			return '';
		}else{
			return $query->row();
		}
	}
	
 }


