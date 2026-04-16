<?php 
class Hotel_Model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    function insert_gta_temp_result($sec_res,$api,$itemCode,$room_code,$room_type,$cost_val,$status_val,$meals_val,$adult,$child)
	{
			$data=array('session_id'=>$sec_res,'api'=>$api,'hotel_code'=>$itemCode,'room_code'=>$room_code,'room_type'=>$room_type,'inclusion'=>$meals_val,'total_cost'=>$cost_val,'status'=>$status_val,'adult'=>$adult,'child'=>$child);
			$this->db->insert('api_hotel_detail_t',$data);
		   return $this->db->insert_id();
		
	}
	 function insert_gta_temp_result_travco($sec_res,$api,$itemCode,$room_code,$room_type,$cost_val,$status_val,$meals_val,$adult,$child,$cancel_code)
	{
			$data=array('session_id'=>$sec_res,'api'=>$api,'hotel_code'=>$itemCode,'room_code'=>$room_code,'room_type'=>$room_type,'inclusion'=>$meals_val,'total_cost'=>$cost_val,'status'=>$status_val,'adult'=>$adult,'child'=>$child,'charval 	'=>$cancel_code);
			$this->db->insert('api_hotel_detail_t',$data);
		   return $this->db->insert_id();
		
	}
	  function inser_customer_book_hotelpro_oldd($supplier_track_id,$ProcessIdvalue,$BookingStatusvalue,$HotelCodevalue,$CheckInvalue,$CheckOutvalue,$cancel_date,$TotalPricevalue,$BoardTypevalue,$ConfirmationNumbervalue,
  $tot_net_comm,$tot_net_mark,$api,$perday_cancel_amt,$api_uni_id,$userid,$email,$cust_name,$noofroom,$adult,$child,$RoomCategory,$cancel_policy,$nights,$markup,$customer_contact_details_id)
 	{
	 $date=date('Y-m-d');
	 /*$insert="insert into hotel_booking_info (customer_contact_details_id,check_in,check_out,voucher_date,hotel_code,	inclusion,room_type,star,address,no_of_room,cancel_fromdate,cancel_tilldate,cancel_policy,provider_id,adult,child)
	 values('".$customer_contact_details_id."','".$CheckInvalue."','".$CheckOutvalue."','".$date."','".$HotelCodevalue."','".$BoardTypevalue."','".$RoomCategory."','0','','".$noofroom."','".$cancel_date."','".$cancel_date."','".$cancel_policy."','1','".$adult."','".$child."')";
echo $insert;exit;
$Result = mysql_query($insert);
	  return mysql_insert_id();*/

$data=array('customer_contact_details_id'=>$customer_contact_details_id,'check_in'=>$CheckInvalue,'check_out'=>$CheckOutvalue,'check_out'=>$CheckOutvalue,
			'voucher_date'=>$date,'hotel_code'=>$HotelCodevalue,'inclusion'=>$BoardTypevalue,'room_type'=>$RoomCategory,'star'=>'3','address'=>'','no_of_room'=>$noofroom,'cancel_fromdate'=>$cancel_date,'cancel_tilldate'=>$cancel_date,'cancel_policy'=>$cancel_policy,'provider_id'=>'1','adult'=>$adult,'child'=>$child);
			$this->db->insert('hotel_booking_info',$data);
			return $this->db->insert_id();
			
			
	/*$userid=$this->session->userdata('custid');
	//echo "hi";
//	print_r($userid);exit;
	$insert="insert into customer_booking(supplier_track_id,itemcode,booking_ref_no,status,check_in,check_out,cancel_tilldate,hotel_code,amount,voucher_date,api,markup,commission_amount,cancel_amount,api_unique_id,agent_id,customer_email,customer_name,no_of_room,adult_count,child_count,cancel_fromdate,room_type,cancel_policy,inclusion,remark)
	 values('".$supplier_track_id."','".$ProcessIdvalue."','".$ConfirmationNumbervalue."','CONFIRMED','".$CheckInvalue."','".$CheckOutvalue."','".$cancel_date."','".
	 $HotelCodevalue."','".$TotalPricevalue."','".$date."','".$api."','".$markup."','".$tot_net_comm."','".$perday_cancel_amt."','".$api_uni_id."','".
	 $userid."','".$email."','".$cust_name."','".$noofroom."','".$adult."','".$child."','".$cancel_date."','".$RoomCategory."','".$cancel_policy."','".$BoardTypevalue."','".$nights."')";
*/
	  
 }
  function inser_customer_book_hotelpro($h_hotel_id,$h_hotel_name,$h_star,$h_description,$h_address,$h_phone,$h_fax,$h_room_type,$h_cancel_policy,$cin,$cout,$date,$roomcountss,$user_id,$nights,$trans_id,$h_adult,$h_child,$con_id,$dateFromValc,$h_city)
 	{
	

$data=array('customer_contact_details_id'=>$con_id,'hotel_code'=>$h_hotel_id,'hotel_name'=>$h_hotel_name,'star'=>$h_star,
			'description'=>$h_description,'address'=>$h_address,'phone'=>$h_phone,'fax'=>$h_fax,'room_type'=>$h_room_type,'cancel_policy'=>$h_cancel_policy,'check_in'=>$cin,'check_out'=>$cout,'voucher_date'=>$date,'no_of_room'=>$roomcountss,'provider_id'=>'1','nights'=>$nights,'adult'=>$h_adult,'child'=>$h_child,'cancel_tilldate'=>$dateFromValc,'city'=>$h_city);
			$this->db->insert('hotel_booking_info',$data);
			return $this->db->insert_id();
	
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
function get_all_gta_data()
{
$que="select * from  gta ";
		
	
		$query= $this->db->query($que);
			if($query->num_rows() ==''){
				return '';
			}else{
				return $query->result();
			}

}
function get_currecy_detail($val)
{
	$que="select * from  currency_converter where country='$val' ";
		
		$query= $this->db->query($que);
			if($query->num_rows() ==''){
				return '';
			}else{
				return $query->row();
			}
}
	
	
		function inser_customer_book_hotelpro_trans_hotel($trans_id,$ConfirmationNumbervalue,$userid,$val_last)
	{

	 	$this->db->query("UPDATE transaction_details SET prn_no='$ConfirmationNumbervalue', 	booking_number='$ConfirmationNumbervalue',  user_id='$userid' , hotel_booking_id='$val_last'  WHERE customer_contact_details_id ='$trans_id'");
		
		
	}
	function insert_booking_attrib($sec_res,$api,$purTokenVal,$serviceval,$canceldisplayValc,$dateFromValc,$dateToValc)
		{
		//	$from_candate=$dateFromVal.' '.$dateFromTimeVal;
		//	$to_candate=$dateToVal.' '.$dateToTimeVal;

			$data=array('criteria_id'=>$sec_res,'api_name'=>$api,'token_val'=>$purTokenVal,'service_val'=>$serviceval,'cancel_amt'=>$canceldisplayValc,'from_date'=>$dateFromValc,'to_date'=>$dateToValc);

			$this->db->insert('booking_attrib_hb',$data);

		}
	 function insert_hotelsbed_temp_result($sec_res,$api,$itemCode,$room_code,$room_type,$cost_val,$status_val,$meals_val,$shruiVal,$charVal,$adult,$child,$boardTypeVal,$token,$incode,$inoffcode,$contractnameVal,$destCodeVal,$shotname)
	{
			$data=array('session_id'=>$sec_res,'api'=>$api,'hotel_code'=>$itemCode,'room_code'=>$room_code,'room_type'=>$room_type,'inclusion'=>$meals_val,'total_cost'=>$cost_val,'status'=>$status_val,'shurival'=>$shruiVal,'charval'=>$charVal,'adult'=>$adult,'child'=>$child,'board_type'=>$boardTypeVal,'token'=>$token,'inoffcode'=>$inoffcode,'contractnameVal'=>$contractnameVal,'destCodeVal'=>$destCodeVal,'shortname'=>$shotname);
			$this->db->insert('api_hotel_detail_t',$data);
		   return $this->db->insert_id();
		
	}
	function insert_room_fac_hotel($hotel_code,$hotel_name)
	{
	    	$data=array('api'=>'gta','fac_type'=>'room','fac'=>$hotel_name,'hotel_code'=>$hotel_code);
			$this->db->insert('gta_room_fac',$data);
		    $this->db->insert_id();
	}
	function insert_room_fac_hotel_pro($hotel_code,$hotel_name)
	{
	    	$data=array('api'=>'hotelsbed','fac_type'=>'hotel','fac'=>$hotel_name,'hotel_code'=>$hotel_code);
			$this->db->insert('api_permanent_facility',$data);
		    $this->db->insert_id();
	}
	function dummy_insert_room_fac_hotel_pro($hotel_code,$hotel_name)
	{
	    	$data=array('api'=>'hotelspro','fac_type'=>'hotel','fac'=>$hotel_name,'hotel_code'=>$hotel_code);
			$this->db->insert('api_hotel_facility_permanent',$data);
		    $this->db->insert_id();
	}
	function dummy_insert_room_fac_hotel_pro1($hotel_code,$hotel_name)
	{
	    	$data=array('api'=>'hotelspro','fac_type'=>'room','fac'=>$hotel_name,'hotel_code'=>$hotel_code);
			$this->db->insert('api_hotel_facility_permanent',$data);
		    $this->db->insert_id();
	}
	function insert_room_fac_hotel_pro1($hotel_code,$hotel_name)
	{
	    	$data=array('api'=>'hotelsbed','fac_type'=>'room','fac'=>$hotel_name,'hotel_code'=>$hotel_code);
			$this->db->insert('api_permanent_facility',$data);
		    $this->db->insert_id();
	}

function gta_bed_fac($api,$type,$hotel_code,$hotel_name)
	{
	    	$data=array('api'=>$api,'fac_type'=>$type,'fac'=>$hotel_name,'hotel_code'=>$hotel_code);
			$this->db->insert('api_permanent_facility',$data);
		    $this->db->insert_id();
	}
function gta_bed_fac1()
	{
	    	$this->db->select('*');
		$this->db->from('gta_room_fac');
		$query = $this->db->get();	
		if($query->num_rows() == 0 )
		{
		   return '';   
		  }else{
		  return $query->result(); 
		  }

	}
		function get_merge_inclsuion_hotelsbed($hcode,$api,$cid,$bar)
		{
			$que = "SELECT * FROM (`api_hotel_detail_t`) WHERE `hotel_code` = '$hcode' AND `api` = '$api' AND `status` IN ('AVAILABLE', 'OK', 
			'Available', 'InstantConfirmation', 'true') AND `session_id` = '$cid' AND `contractnameVal` = '$bar' GROUP BY `inclusion`,`contractnameVal` 
			ORDER BY `total_cost` ASC";
			//charval
			$query= $this->db->query($que);
			//echo $this->db->last_query();
			if($query->num_rows() ==''){
				return '';
			}else{
				return $query->result();
			}
		}
		function get_cancel_attrib_new($result_id)
		{
			//echo $result_id;exit;
			$this->db->select('*');
			$this->db->from('api_hotel_detail_t');
			$this->db->where('api_temp_hotel_id',$result_id);
			
			$query=$this->db->get();
			//echo $this->db->last_query();exit;
			if($query->num_rows() ==''){
				return '';
			}else{
				return $query->row();

			}
		}
		function get_merge_inclsuion_hotelsbed_room($hcode,$api,$cid,$inc)
		{
			$que = "SELECT * FROM (`api_hotel_detail_t`) WHERE `hotel_code` = '$hcode' AND `api` = '$api' AND `status` IN ('AVAILABLE', 'OK', 
			'Available', 'InstantConfirmation', 'true') AND `session_id` = '$cid'  AND inclusion='$inc'  GROUP BY `child`,`adult` 
			ORDER BY `total_cost` ASC";
			//charval
			$query= $this->db->query($que);
			//echo $this->db->last_query();
			if($query->num_rows() ==''){
				return '';
			}else{
				return $query->result();
			}
		}
		
	function get_city_code($city)
	{
	    $this->db->select('*');
		$this->db->from('api_hotels_city');
		$this->db->where('city',$city);
		$query = $this->db->get();
		
		if($query->num_rows() == '' )
		{
		   return '';   
		  }else{
		  return $query->row(); 
		  }

	}
	function get_city_code_pre($city)
	{
	    $que="SELECT *  FROM `api_hotels_city` WHERE `city` LIKE '$city%'";
		
		$query= $this->db->query($que);
        //echo $this->db->last_query();exit;
		
		if($query->num_rows() == 0 )
		{
		   return '';   
		  }else{
		  return $query->result(); 
		  }

	}
	function get_country_code_pre($city)
	{
	    $que="SELECT *  FROM `api_hotels_city` WHERE `city` LIKE '%$city%'  order by pref,city ASC";
		
		$query= $this->db->query($que);
       //echo $this->db->last_query();exit;
		
		if($query->num_rows() == 0 )
		{
		   return '';   
		  }else{
		  return $query->result(); 
		  }

	}
	function get_city()
	{
	    $this->db->select('*');
		$this->db->from('gta_city_code');
		$this->db->where('destinationType','city'); 
		$query = $this->db->get();	
		if($query->num_rows() == 0 )
		{
		   return '';   
		  }else{
		  return $query->result(); 
		  }

	}

		function insert_room_fac_hotel1($hotel_code,$hotel_name)
	{

	    	$data=array('api'=>'gta','fac_type'=>'hotel','fac'=>$hotel_name,'hotel_code'=>$hotel_code);
			$this->db->insert('gta_room_fac',$data);
		    $this->db->insert_id();
	}
	function insert_permenant_result($hotel_code,$hotel_name,$city,$star,$description,$location,$latitude,$longitude,$api,$address,$tel_val,$fax_val)
	{
			
			$data=array('api'=>$api,'hotel_code'=>$hotel_code,'hotel_name'=>$hotel_name,'city'=>$city,'star'=>$star,'description'=>$description,'location'=>$location,'latitude'=>$latitude,'longitude'=>$longitude,'address'=>$address,'phone'=>$tel_val,'fax'=>$fax_val);
			$this->db->insert('gta',$data);
		   return $this->db->insert_id();
		
	}
	function insert_permenant_result_pro($hotel_code,$hotel_name,$city,$star,$description,$location,$latitude,$longitude,$api,$address,$tel_val,$fax_val,$Chainval,$image)
	{
			
		   $data=array('api'=>$api,'hotel_code'=>$hotel_code,'hotel_name'=>$hotel_name,'city'=>$city,'star'=>$star,'description'=>$description,'location'=>$location,'latitude'=>$latitude,'longitude'=>$longitude,'address'=>$address,'phone'=>$tel_val,'fax'=>$fax_val,'chain'=>$Chainval,'image'=>$image);
		   $this->db->insert('api_permanent_gta',$data);
		  // echo $this->db->last_query();exit;
		   return $this->db->insert_id();
		
	}
	function dummy_insert_permenant_result_pro($hotel_code,$hotel_name,$city,$star,$description,$location,$latitude,$longitude,$api,$address,$tel_val,$fax_val,$Chainval)
	{
			
			$data=array('api'=>$api,'hotel_code'=>$hotel_code,'hotel_name'=>$hotel_name,'city'=>$city,'star'=>$star,'description'=>$description,'location'=>$location,'latitude'=>$latitude,'longitude'=>$longitude,'address'=>$address,'phone'=>$tel_val,'fax'=>$fax_val,'chain'=>$Chainval);
			$this->db->insert('api_permanent_gta',$data);
		   return $this->db->insert_id();
		
	}
	function delete_gta_temp_result($ses_id)
	{
		$this->db->where('session_id',$ses_id);	
		$this->db->delete('api_hotel_detail_t');	
	}
	function fetch_gta_temp_result($ses_id, $page=1)
	{
		$this->db->select('*');
		$this->db->from('api_hotel_detail_t');
		$this->db->where('session_id',$ses_id);
		$this->db->group_by("api_hotel_detail_t.hotel_code"); 
		$this->db->join('api_permanent', 'api_hotel_detail_t.hotel_code = api_permanent.hotel_code');
	    $this->db->order_by("api_hotel_detail_t.total_cost", "asc");
		$display_per_page = 10;
		$start_pos  = $display_per_page * ($page-1);
		
		$this->db->limit( $display_per_page , $start_pos);
		$query = $this->db->get();	
		//echo $this->db->last_query();exit;
		if($query->num_rows() == 0 )
		{
		   return '';   
		  }else{
		  return $query->result(); 
		  }
		
	}
	function fetch_gta_temp_result_count($ses_id)
	{
		$que="SELECT count(distinct api_hotel_detail_t.hotel_code) as rows FROM api_hotel_detail_t JOIN `api_permanent` ON `api_hotel_detail_t`.`hotel_code` = `api_permanent`.`hotel_code` AND  `session_id` =  '".$ses_id."' ";
		
		$query= $this->db->query($que);
		//echo $this->db->last_query();exit;
			if($query->num_rows() ==''){
				return '';
			}else{
				$a = $query->row();
				return $a->rows;
			}
		


		
	}
	function get_searchresult($id)
	{
		$this->db->select('*');
		$this->db->from('api_hotel_detail_t');
		$this->db->where('api_temp_hotel_id',$id);
		$this->db->join('api_permanent', 'api_hotel_detail_t.hotel_code = api_permanent.hotel_code');
		$query = $this->db->get();	
		if($query->num_rows() == 0 )
		{
		   return '';   
		  }else{
		  return $query->row(); 
		  }
		
	}
	
	function get_permanent_details($id)
	{
		$this->db->select('*');
		$this->db->from('api_permanent');
		$this->db->where('hotel_code',$id);
		$query = $this->db->get();	
		if($query->num_rows() == 0 )
		{
		   return '';   
		  }else{
		  return $query->row(); 
		  }
		
	}
	
	function __fetch_search_result($ses_id, $page=1, $minVal = '', $maxVal = '', $minStar = '', $maxStar = '')
	{
		
		$display_perpage = 10;
		$start_pos = $display_perpage * ($page-1);
		$where = '';
		if (!empty($minVal)) {
			$where.= "AND (t.total_cost BETWEEN $minVal AND $maxVal)";
		}
		
		if ($maxStar!='') {
			//echo $minStar.'='.$maxStar;exit;
			if($minStar == $maxStar)
			{
				$where.= " AND p.star = $maxStar";
			}
			else
			{
   			$where.= " AND (p.star BETWEEN $minStar AND $maxStar)";
			}
  		}
		
		//$select = "SELECT SQL_CALC_FOUND_ROWS * FROM api_hotel_detail_t t, api_permanent p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' $where GROUP BY t.hotel_code ORDER BY t.total_cost ASC ";
		
		//$select = "SELECT SQL_CALC_FOUND_ROWS *, MIN(t.total_cost) as low_cost FROM api_hotel_detail_t t, api_permanent p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' $where GROUP BY t.hotel_code ORDER BY low_cost ASC ";
		
		$select = "SELECT SQL_CALC_FOUND_ROWS *, MIN(t.total_cost) as low_cost FROM api_hotel_detail_t t, api_permanent p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' $where GROUP BY t.hotel_code ORDER BY low_cost ASC ";
//echo $select;exit;
		//$select = "SELECT *, MIN(total_cost) AS low_cost FROM api_hotel_detail_t t, api_hotel_detail_p p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' $where GROUP BY t.hotel_code ORDER BY low_cost ASC LIMIT $start_pos, $display_perpage";
		
		//LIMIT $start_pos, $display_perpage
//		echo $select; exit;
		
		$query = $this->db->query($select);
		
		//echo $this->db->last_query();exit;
		if ( $query->num_rows > 0 ) {
		
			$data['result'] = $query->result();
//			print_r($data['result']);
			/*$select = "SELECT min(total_cost) as minVal, max(total_cost) as maxVal FROM api_hotel_detail_t t, api_hotel_detail_p p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' GROUP BY t.hotel_code";
			
			$values = $this->db->query($select);
			$values = $value->result();
			$data['minVal'] = $values[0][]*/
			
		
			/**/
			
			$count = $this->db->query('SELECT FOUND_ROWS() as rowcount');
			$count = $count->result();

			$data['totRow'] = $count[0]->rowcount;
			//$select2 = "SELECT MIN(t.total_cost) as minVal, MAX(t.total_cost) as maxVal, COUNT(*) as totRow FROM api_hotel_detail_t t, api_hotel_detail_p p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' $where";
			
		//	$select2 = "SELECT MIN(t.total_cost) as minVal, MAX(t.total_cost) as maxVal FROM api_hotel_detail_t t, api_permanent p WHERE p.hotel_code = t.hotel_code AND t.session_id = '$ses_id' $where";
		
		//$select = "SELECT MIN(t.total_cost) as low_cost, MAX(t.total_cost) as high_cost FROM api_hotel_detail_t t, api_permanent p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' $where";
		$select2 = "select MIN(low_cost) as minVal, MAX(low_cost) as maxVal from (
SELECT MIN(t.total_cost) as low_cost FROM api_hotel_detail_t t, api_permanent p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' $where group by  t.hotel_code ) as tab";
		
			//echo $select2; exit();
			$query2 = $this->db->query($select2);
			$result2 = $query2->result();
			$data['minVal'] = $result2[0]->minVal;
			$data['maxVal'] = $result2[0]->maxVal;
			//$data['totRow'] = $result2[0]->totRow;
			return $data;
		}
      return false;
	
	}
	
	function fetch_search_result($ses_id, $page=1, $minVal = '', $maxVal = '', $minStar = 0, $maxStar = 5, $fac = '', $sorting='')
	{
		
		$display_perpage = 10;
		$start_pos = $display_perpage * ($page-1);
		$where = '';
		
		if (!empty($minVal)) {
			$where.= "AND (t.total_cost BETWEEN $minVal AND $maxVal)";
		}
		
		$where.= " AND (p.star BETWEEN $minStar AND $maxStar)";
		$order = 'ORDER BY low_cost ASC';
		if (!empty($sorting)) {
			switch ($sorting) {
			case 'name_asc':
				$order = 'ORDER BY p.hotel_name, low_cost ASC';
				break;
			case 'name_desc':
				$order = 'ORDER BY p.hotel_name DESC, low_cost ASC';
				break;
			case 'star_asc':
				$order = 'ORDER BY p.star, low_cost ASC';
				break;
			case 'star_desc':
				$order = 'ORDER BY p.star DESC, low_cost ASC';
				break;
			case 'price_asc':
				$order = 'ORDER BY low_cost ASC';
				break;
			case 'price_desc':
				$order = 'ORDER BY low_cost DESC';
				break;
			}
		}
		
		if (empty($fac)) {
			$select = "SELECT SQL_CALC_FOUND_ROWS *, MIN(t.total_cost) as low_cost FROM api_hotel_detail_t t, api_permanent p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' $where GROUP BY t.hotel_code $order ";
		} else {
			$where.= " and MATCH(f.fac) AGAINST ('$fac' IN BOOLEAN MODE)";
			$select = "SELECT SQL_CALC_FOUND_ROWS *, MIN(t.total_cost) as low_cost FROM api_hotel_detail_t t, api_permanent p, facilities f WHERE t.hotel_code = p.hotel_code and t.hotel_code = f.hotel_code AND t.session_id = '$ses_id' $where GROUP BY t.hotel_code $order";
			
		} 
		
		//echo $select; exit;

		
		$query = $this->db->query($select);
		
		if ( $query->num_rows > 0 ) {
		
			$data['result'] = $query->result();
			
			$count = $this->db->query('SELECT FOUND_ROWS() as rowcount');
			$count = $count->result();

			$data['totRow'] = $count[0]->rowcount;
		
		
		if (empty($fac)) {
			$select2 = "select MIN(low_cost) as minVal, MAX(low_cost) as maxVal from (
				SELECT MIN(t.total_cost) as low_cost FROM api_hotel_detail_t t, api_permanent p WHERE t.hotel_code = p.hotel_code AND t.session_id = '$ses_id' $where group by  t.hotel_code ) as tab";
		} else {
			
			$select2 = "select MIN(low_cost) as minVal, MAX(low_cost) as maxVal from (
				SELECT MIN(t.total_cost) as low_cost FROM api_hotel_detail_t t, api_permanent p, facilities f WHERE t.hotel_code = p.hotel_code and t.hotel_code = f.hotel_code AND t.session_id = '$ses_id' $where group by  t.hotel_code ) as tab";
				
			//echo $select2; exit;
		}
		
			//echo $select2; exit();
			$query2 = $this->db->query($select2);
			$result2 = $query2->result();
			$data['minVal'] = $result2[0]->minVal;
			$data['maxVal'] = $result2[0]->maxVal;
			//$data['totRow'] = $result2[0]->totRow;
			return $data;
		}
      return false;
	
	}
	
	function fetch_search_result_map($ses_id)
	{
		
	
			$select = "SELECT p.api_hotel_id, p.hotel_name, p.star, p.latitude, p.longitude, MIN(t.total_cost) as low_cost FROM api_hotel_detail_t t, api_permanent p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' GROUP BY t.hotel_code ";
		

		//echo $select; exit;
		$query = $this->db->query($select);
		
		if ( $query->num_rows > 0 ) {
		
			$data['result'] = $query->result();
			
			return $data;
		}
      return false;
	
	}
	
	function asc_order_price_new($ses_id, $page=1, $minVal = '', $maxVal = '', $minStar = '', $maxStar = '')
	{
		$display_perpage = 10;
		$start_pos = $display_perpage * ($page-1);
		$where = '';
		if (!empty($minVal)) {
			$where.= "AND (t.total_cost BETWEEN $minVal AND $maxVal)";
		}
		
		if (!empty($maxStar)) {
   			$where.= " AND (p.star BETWEEN $minStar AND $maxStar)";
  		}
		
		//$select = "SELECT SQL_CALC_FOUND_ROWS * FROM api_hotel_detail_t t, api_permanent p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' $where GROUP BY t.hotel_code ORDER BY t.total_cost ASC ";
		
		//$select = "SELECT SQL_CALC_FOUND_ROWS *, MIN(t.total_cost) as low_cost FROM api_hotel_detail_t t, api_permanent p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' $where GROUP BY t.hotel_code ORDER BY low_cost ASC ";
		
		$select = "SELECT SQL_CALC_FOUND_ROWS *, MIN(t.total_cost) as low_cost FROM api_hotel_detail_t t, api_permanent p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' $where GROUP BY t.hotel_code ORDER BY low_cost ASC ";

		//$select = "SELECT *, MIN(total_cost) AS low_cost FROM api_hotel_detail_t t, api_hotel_detail_p p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' $where GROUP BY t.hotel_code ORDER BY low_cost ASC LIMIT $start_pos, $display_perpage";
		
		//LIMIT $start_pos, $display_perpage
//		echo $select; exit;
		
		$query = $this->db->query($select);
		
		//echo $this->db->last_query();exit;
		if ( $query->num_rows > 0 ) {
		
			$data['result'] = $query->result();
//			print_r($data['result']);
			/*$select = "SELECT min(total_cost) as minVal, max(total_cost) as maxVal FROM api_hotel_detail_t t, api_hotel_detail_p p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' GROUP BY t.hotel_code";
			
			$values = $this->db->query($select);
			$values = $value->result();
			$data['minVal'] = $values[0][]*/
			
		
			/**/
			
			$count = $this->db->query('SELECT FOUND_ROWS() as rowcount');
			$count = $count->result();

			$data['totRow'] = $count[0]->rowcount;
			//$select2 = "SELECT MIN(t.total_cost) as minVal, MAX(t.total_cost) as maxVal, COUNT(*) as totRow FROM api_hotel_detail_t t, api_hotel_detail_p p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' $where";
			
		//	$select2 = "SELECT MIN(t.total_cost) as minVal, MAX(t.total_cost) as maxVal FROM api_hotel_detail_t t, api_permanent p WHERE p.hotel_code = t.hotel_code AND t.session_id = '$ses_id' $where";
		
		//$select = "SELECT MIN(t.total_cost) as low_cost, MAX(t.total_cost) as high_cost FROM api_hotel_detail_t t, api_permanent p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' $where";
		$select2 = "select MIN(low_cost) as minVal, MAX(low_cost) as maxVal from (
SELECT MIN(t.total_cost) as low_cost FROM api_hotel_detail_t t, api_permanent p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' $where group by  t.hotel_code ) as tab";
		
			//echo $select2; exit();
			$query2 = $this->db->query($select2);
			$result2 = $query2->result();
			$data['minVal'] = $result2[0]->minVal;
			$data['maxVal'] = $result2[0]->maxVal;
			//$data['totRow'] = $result2[0]->totRow;
			return $data;
		}
      return false;
	
	}
	function asc_order_star_new($ses_id, $page=1, $minVal = '', $maxVal = '', $minStar = '', $maxStar = '')
	{
		$display_perpage = 10;
		$start_pos = $display_perpage * ($page-1);
		$where = '';
		if (!empty($minVal)) {
			$where.= "AND (t.total_cost BETWEEN $minVal AND $maxVal)";
		}
		
		if (!empty($maxStar)) {
   			$where.= " AND (p.star BETWEEN $minStar AND $maxStar)";
  		}
		
		//$select = "SELECT SQL_CALC_FOUND_ROWS * FROM api_hotel_detail_t t, api_permanent p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' $where GROUP BY t.hotel_code ORDER BY t.total_cost ASC ";
		
		//$select = "SELECT SQL_CALC_FOUND_ROWS *, MIN(t.total_cost) as low_cost FROM api_hotel_detail_t t, api_permanent p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' $where GROUP BY t.hotel_code ORDER BY low_cost ASC ";
		
		$select = "SELECT SQL_CALC_FOUND_ROWS *, MIN(t.total_cost) as low_cost FROM api_hotel_detail_t t, api_permanent p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' $where GROUP BY t.hotel_code ORDER BY p.star ASC ";

		//$select = "SELECT *, MIN(total_cost) AS low_cost FROM api_hotel_detail_t t, api_hotel_detail_p p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' $where GROUP BY t.hotel_code ORDER BY low_cost ASC LIMIT $start_pos, $display_perpage";
		
		//LIMIT $start_pos, $display_perpage
//		echo $select; exit;
		
		$query = $this->db->query($select);
		
		//echo $this->db->last_query();exit;
		if ( $query->num_rows > 0 ) {
		
			$data['result'] = $query->result();
//			print_r($data['result']);
			/*$select = "SELECT min(total_cost) as minVal, max(total_cost) as maxVal FROM api_hotel_detail_t t, api_hotel_detail_p p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' GROUP BY t.hotel_code";
			
			$values = $this->db->query($select);
			$values = $value->result();
			$data['minVal'] = $values[0][]*/
			
		
			/**/
			
			$count = $this->db->query('SELECT FOUND_ROWS() as rowcount');
			$count = $count->result();

			$data['totRow'] = $count[0]->rowcount;
			//$select2 = "SELECT MIN(t.total_cost) as minVal, MAX(t.total_cost) as maxVal, COUNT(*) as totRow FROM api_hotel_detail_t t, api_hotel_detail_p p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' $where";
			
		//	$select2 = "SELECT MIN(t.total_cost) as minVal, MAX(t.total_cost) as maxVal FROM api_hotel_detail_t t, api_permanent p WHERE p.hotel_code = t.hotel_code AND t.session_id = '$ses_id' $where";
		
		//$select = "SELECT MIN(t.total_cost) as low_cost, MAX(t.total_cost) as high_cost FROM api_hotel_detail_t t, api_permanent p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' $where";
		$select2 = "select MIN(low_cost) as minVal, MAX(low_cost) as maxVal from (
SELECT MIN(t.total_cost) as low_cost FROM api_hotel_detail_t t, api_permanent p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' $where group by  t.hotel_code ) as tab";
		
			//echo $select2; exit();
			$query2 = $this->db->query($select2);
			$result2 = $query2->result();
			$data['minVal'] = $result2[0]->minVal;
			$data['maxVal'] = $result2[0]->maxVal;
			//$data['totRow'] = $result2[0]->totRow;
			return $data;
		}
      return false;
	
	}
	
		function desc_order_star_new($ses_id, $page=1, $minVal = '', $maxVal = '', $minStar = '', $maxStar = '')
	{
		$display_perpage = 10;
		$start_pos = $display_perpage * ($page-1);
		$where = '';
		if (!empty($minVal)) {
			$where.= "AND (t.total_cost BETWEEN $minVal AND $maxVal)";
		}
		
		if (!empty($maxStar)) {
   			$where.= " AND (p.star BETWEEN $minStar AND $maxStar)";
  		}
		
		//$select = "SELECT SQL_CALC_FOUND_ROWS * FROM api_hotel_detail_t t, api_permanent p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' $where GROUP BY t.hotel_code ORDER BY t.total_cost ASC ";
		
		//$select = "SELECT SQL_CALC_FOUND_ROWS *, MIN(t.total_cost) as low_cost FROM api_hotel_detail_t t, api_permanent p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' $where GROUP BY t.hotel_code ORDER BY low_cost ASC ";
		
		$select = "SELECT SQL_CALC_FOUND_ROWS *, MIN(t.total_cost) as low_cost FROM api_hotel_detail_t t, api_permanent p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' $where GROUP BY t.hotel_code ORDER BY p.star DESC ";

		//$select = "SELECT *, MIN(total_cost) AS low_cost FROM api_hotel_detail_t t, api_hotel_detail_p p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' $where GROUP BY t.hotel_code ORDER BY low_cost ASC LIMIT $start_pos, $display_perpage";
		
		//LIMIT $start_pos, $display_perpage
//		echo $select; exit;
		
		$query = $this->db->query($select);
		
		//echo $this->db->last_query();exit;
		if ( $query->num_rows > 0 ) {
		
			$data['result'] = $query->result();
//			print_r($data['result']);
			/*$select = "SELECT min(total_cost) as minVal, max(total_cost) as maxVal FROM api_hotel_detail_t t, api_hotel_detail_p p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' GROUP BY t.hotel_code";
			
			$values = $this->db->query($select);
			$values = $value->result();
			$data['minVal'] = $values[0][]*/
			
		
			/**/
			
			$count = $this->db->query('SELECT FOUND_ROWS() as rowcount');
			$count = $count->result();

			$data['totRow'] = $count[0]->rowcount;
			//$select2 = "SELECT MIN(t.total_cost) as minVal, MAX(t.total_cost) as maxVal, COUNT(*) as totRow FROM api_hotel_detail_t t, api_hotel_detail_p p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' $where";
			
		//	$select2 = "SELECT MIN(t.total_cost) as minVal, MAX(t.total_cost) as maxVal FROM api_hotel_detail_t t, api_permanent p WHERE p.hotel_code = t.hotel_code AND t.session_id = '$ses_id' $where";
		
		//$select = "SELECT MIN(t.total_cost) as low_cost, MAX(t.total_cost) as high_cost FROM api_hotel_detail_t t, api_permanent p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' $where";
		$select2 = "select MIN(low_cost) as minVal, MAX(low_cost) as maxVal from (
SELECT MIN(t.total_cost) as low_cost FROM api_hotel_detail_t t, api_permanent p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' $where group by  t.hotel_code ) as tab";
		
			//echo $select2; exit();
			$query2 = $this->db->query($select2);
			$result2 = $query2->result();
			$data['minVal'] = $result2[0]->minVal;
			$data['maxVal'] = $result2[0]->maxVal;
			//$data['totRow'] = $result2[0]->totRow;
			return $data;
		}
      return false;
	
	}
	
	function asc_order_name_new($ses_id, $page=1, $minVal = '', $maxVal = '', $minStar = '', $maxStar = '')
	{
		$display_perpage = 10;
		$start_pos = $display_perpage * ($page-1);
		$where = '';
		if (!empty($minVal)) {
			$where.= "AND (t.total_cost BETWEEN $minVal AND $maxVal)";
		}
		
		if (!empty($maxStar)) {
   			$where.= " AND (p.star BETWEEN $minStar AND $maxStar)";
  		}
		
		//$select = "SELECT SQL_CALC_FOUND_ROWS * FROM api_hotel_detail_t t, api_permanent p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' $where GROUP BY t.hotel_code ORDER BY t.total_cost ASC ";
		
		//$select = "SELECT SQL_CALC_FOUND_ROWS *, MIN(t.total_cost) as low_cost FROM api_hotel_detail_t t, api_permanent p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' $where GROUP BY t.hotel_code ORDER BY low_cost ASC ";
		
		$select = "SELECT SQL_CALC_FOUND_ROWS *, MIN(t.total_cost) as low_cost FROM api_hotel_detail_t t, api_permanent p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' $where GROUP BY t.hotel_code ORDER BY p.hotel_name ASC ";

		//$select = "SELECT *, MIN(total_cost) AS low_cost FROM api_hotel_detail_t t, api_hotel_detail_p p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' $where GROUP BY t.hotel_code ORDER BY low_cost ASC LIMIT $start_pos, $display_perpage";
		
		//LIMIT $start_pos, $display_perpage
//		echo $select; exit;
		
		$query = $this->db->query($select);
		
		//echo $this->db->last_query();exit;
		if ( $query->num_rows > 0 ) {
		
			$data['result'] = $query->result();
//			print_r($data['result']);
			/*$select = "SELECT min(total_cost) as minVal, max(total_cost) as maxVal FROM api_hotel_detail_t t, api_hotel_detail_p p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' GROUP BY t.hotel_code";
			
			$values = $this->db->query($select);
			$values = $value->result();
			$data['minVal'] = $values[0][]*/
			
		
			/**/
			
			$count = $this->db->query('SELECT FOUND_ROWS() as rowcount');
			$count = $count->result();

			$data['totRow'] = $count[0]->rowcount;
			//$select2 = "SELECT MIN(t.total_cost) as minVal, MAX(t.total_cost) as maxVal, COUNT(*) as totRow FROM api_hotel_detail_t t, api_hotel_detail_p p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' $where";
			
		//	$select2 = "SELECT MIN(t.total_cost) as minVal, MAX(t.total_cost) as maxVal FROM api_hotel_detail_t t, api_permanent p WHERE p.hotel_code = t.hotel_code AND t.session_id = '$ses_id' $where";
		
		//$select = "SELECT MIN(t.total_cost) as low_cost, MAX(t.total_cost) as high_cost FROM api_hotel_detail_t t, api_permanent p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' $where";
		$select2 = "select MIN(low_cost) as minVal, MAX(low_cost) as maxVal from (
SELECT MIN(t.total_cost) as low_cost FROM api_hotel_detail_t t, api_permanent p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' $where group by  t.hotel_code ) as tab";
		
			//echo $select2; exit();
			$query2 = $this->db->query($select2);
			$result2 = $query2->result();
			$data['minVal'] = $result2[0]->minVal;
			$data['maxVal'] = $result2[0]->maxVal;
			//$data['totRow'] = $result2[0]->totRow;
			return $data;
		}
      return false;
	
	}
	function desc_order_name_new($ses_id, $page=1, $minVal = '', $maxVal = '', $minStar = '', $maxStar = '')
	{
		$display_perpage = 10;
		$start_pos = $display_perpage * ($page-1);
		$where = '';
		if (!empty($minVal)) {
			$where.= "AND (t.total_cost BETWEEN $minVal AND $maxVal)";
		}
		
		if (!empty($maxStar)) {
   			$where.= " AND (p.star BETWEEN $minStar AND $maxStar)";
  		}
		
		//$select = "SELECT SQL_CALC_FOUND_ROWS * FROM api_hotel_detail_t t, api_permanent p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' $where GROUP BY t.hotel_code ORDER BY t.total_cost ASC ";
		
		//$select = "SELECT SQL_CALC_FOUND_ROWS *, MIN(t.total_cost) as low_cost FROM api_hotel_detail_t t, api_permanent p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' $where GROUP BY t.hotel_code ORDER BY low_cost ASC ";
		
		$select = "SELECT SQL_CALC_FOUND_ROWS *, MIN(t.total_cost) as low_cost FROM api_hotel_detail_t t, api_permanent p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' $where GROUP BY t.hotel_code ORDER BY p.hotel_name DESC ";

		//$select = "SELECT *, MIN(total_cost) AS low_cost FROM api_hotel_detail_t t, api_hotel_detail_p p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' $where GROUP BY t.hotel_code ORDER BY low_cost ASC LIMIT $start_pos, $display_perpage";
		
		//LIMIT $start_pos, $display_perpage
//		echo $select; exit;
		
		$query = $this->db->query($select);
		
		//echo $this->db->last_query();exit;
		if ( $query->num_rows > 0 ) {
		
			$data['result'] = $query->result();
//			print_r($data['result']);
			/*$select = "SELECT min(total_cost) as minVal, max(total_cost) as maxVal FROM api_hotel_detail_t t, api_hotel_detail_p p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' GROUP BY t.hotel_code";
			
			$values = $this->db->query($select);
			$values = $value->result();
			$data['minVal'] = $values[0][]*/
			
		
			/**/
			
			$count = $this->db->query('SELECT FOUND_ROWS() as rowcount');
			$count = $count->result();

			$data['totRow'] = $count[0]->rowcount;
			//$select2 = "SELECT MIN(t.total_cost) as minVal, MAX(t.total_cost) as maxVal, COUNT(*) as totRow FROM api_hotel_detail_t t, api_hotel_detail_p p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' $where";
			
		//	$select2 = "SELECT MIN(t.total_cost) as minVal, MAX(t.total_cost) as maxVal FROM api_hotel_detail_t t, api_permanent p WHERE p.hotel_code = t.hotel_code AND t.session_id = '$ses_id' $where";
		
		//$select = "SELECT MIN(t.total_cost) as low_cost, MAX(t.total_cost) as high_cost FROM api_hotel_detail_t t, api_permanent p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' $where";
		$select2 = "select MIN(low_cost) as minVal, MAX(low_cost) as maxVal from (
SELECT MIN(t.total_cost) as low_cost FROM api_hotel_detail_t t, api_permanent p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' $where group by  t.hotel_code ) as tab";
		
			//echo $select2; exit();
			$query2 = $this->db->query($select2);
			$result2 = $query2->result();
			$data['minVal'] = $result2[0]->minVal;
			$data['maxVal'] = $result2[0]->maxVal;
			//$data['totRow'] = $result2[0]->totRow;
			return $data;
		}
      return false;
	
	}
	
	function desc_order_price_new($ses_id, $page=1, $minVal = '', $maxVal = '', $minStar = '', $maxStar = '')
	{
		$display_perpage = 10;
		$start_pos = $display_perpage * ($page-1);
		$where = '';
		if (!empty($minVal)) {
			$where.= "AND (t.total_cost BETWEEN $minVal AND $maxVal)";
		}
		
		if (!empty($maxStar)) {
   			$where.= " AND (p.star BETWEEN $minStar AND $maxStar)";
  		}
		
		//$select = "SELECT SQL_CALC_FOUND_ROWS * FROM api_hotel_detail_t t, api_permanent p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' $where GROUP BY t.hotel_code ORDER BY t.total_cost ASC ";
		
		//$select = "SELECT SQL_CALC_FOUND_ROWS *, MIN(t.total_cost) as low_cost FROM api_hotel_detail_t t, api_permanent p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' $where GROUP BY t.hotel_code ORDER BY low_cost ASC ";
		
		$select = "SELECT SQL_CALC_FOUND_ROWS *, MIN(t.total_cost) as low_cost FROM api_hotel_detail_t t, api_permanent p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' $where GROUP BY t.hotel_code ORDER BY low_cost DESC ";

		//$select = "SELECT *, MIN(total_cost) AS low_cost FROM api_hotel_detail_t t, api_hotel_detail_p p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' $where GROUP BY t.hotel_code ORDER BY low_cost ASC LIMIT $start_pos, $display_perpage";
		
		//LIMIT $start_pos, $display_perpage
//		echo $select; exit;
		
		$query = $this->db->query($select);
		
		//echo $this->db->last_query();exit;
		if ( $query->num_rows > 0 ) {
		
			$data['result'] = $query->result();
//			print_r($data['result']);
			/*$select = "SELECT min(total_cost) as minVal, max(total_cost) as maxVal FROM api_hotel_detail_t t, api_hotel_detail_p p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' GROUP BY t.hotel_code";
			
			$values = $this->db->query($select);
			$values = $value->result();
			$data['minVal'] = $values[0][]*/
			
		
			/**/
			
			$count = $this->db->query('SELECT FOUND_ROWS() as rowcount');
			$count = $count->result();

			$data['totRow'] = $count[0]->rowcount;
			//$select2 = "SELECT MIN(t.total_cost) as minVal, MAX(t.total_cost) as maxVal, COUNT(*) as totRow FROM api_hotel_detail_t t, api_hotel_detail_p p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' $where";
			
		//	$select2 = "SELECT MIN(t.total_cost) as minVal, MAX(t.total_cost) as maxVal FROM api_hotel_detail_t t, api_permanent p WHERE p.hotel_code = t.hotel_code AND t.session_id = '$ses_id' $where";
		
		//$select = "SELECT MIN(t.total_cost) as low_cost, MAX(t.total_cost) as high_cost FROM api_hotel_detail_t t, api_permanent p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' $where";
		$select2 = "select MIN(low_cost) as minVal, MAX(low_cost) as maxVal from (
SELECT MIN(t.total_cost) as low_cost FROM api_hotel_detail_t t, api_permanent p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' $where group by  t.hotel_code ) as tab";
		
			//echo $select2; exit();
			$query2 = $this->db->query($select2);
			$result2 = $query2->result();
			$data['minVal'] = $result2[0]->minVal;
			$data['maxVal'] = $result2[0]->maxVal;
			//$data['totRow'] = $result2[0]->totRow;
			return $data;
		}
      return false;
	
	}
	
	function __fetch_search_result_for_page($ses_id, $page=1, $minVal=0, $maxVal=0, $minStar=0, $maxStar=0, $finval=0)
	{
		$display_perpage = 10;
		$start_pos = $display_perpage * ($page-1);
		$where = '';
		
		if (!empty($minVal)) {
			$where.= "AND (t.total_cost BETWEEN $minVal AND $maxVal)";
		}
		
		if (!empty($maxStar)) {
   			$where.= " AND (p.star BETWEEN $minStar AND $maxStar)";
  		}
		
		if (!empty($finval)) {
   			$where.= " AND (f.fac_id in ($finval))"; //AND f.hotel_code = p.hotel_code
			$select = "SELECT SQL_CALC_FOUND_ROWS *, MIN(t.total_cost) as low_cost FROM api_hotel_detail_t t, api_permanent p, api_permanent_facility f WHERE t.hotel_code = p.hotel_code and session_id = '$ses_id' $where GROUP BY t.hotel_code ORDER BY low_cost ASC ";

  		} else {
			$select = "SELECT SQL_CALC_FOUND_ROWS *, MIN(t.total_cost) as low_cost FROM api_hotel_detail_t t, api_permanent p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' $where GROUP BY t.hotel_code ORDER BY low_cost ASC ";
		}

		
		
//		$select = "SELECT SQL_CALC_FOUND_ROWS *, MIN(t.total_cost) as low_cost FROM api_hotel_detail_t t, api_permanent p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' $where GROUP BY t.hotel_code ORDER BY low_cost ASC ";

//		echo $select; exit;
		
		$query = $this->db->query($select);
		
		//echo $this->db->last_query();exit;
		if ( $query->num_rows > 0 ) {
		
			$data['result'] = $query->result();
//			print_r($data['result']);
			/*$select = "SELECT min(total_cost) as minVal, max(total_cost) as maxVal FROM api_hotel_detail_t t, api_hotel_detail_p p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' GROUP BY t.hotel_code";
			
			$values = $this->db->query($select);
			$values = $value->result();
			$data['minVal'] = $values[0][]*/
			
		
			/**/
			
			$count = $this->db->query('SELECT FOUND_ROWS() as rowcount');
			$count = $count->result();

			$data['totRow'] = $count[0]->rowcount;
			//$select2 = "SELECT MIN(t.total_cost) as minVal, MAX(t.total_cost) as maxVal, COUNT(*) as totRow FROM api_hotel_detail_t t, api_hotel_detail_p p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' $where";
			
		//	$select2 = "SELECT MIN(t.total_cost) as minVal, MAX(t.total_cost) as maxVal FROM api_hotel_detail_t t, api_permanent p WHERE p.hotel_code = t.hotel_code AND t.session_id = '$ses_id' $where";
		
		//$select = "SELECT MIN(t.total_cost) as low_cost, MAX(t.total_cost) as high_cost FROM api_hotel_detail_t t, api_permanent p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' $where";
		$select2 = "select MIN(low_cost) as minVal, MAX(low_cost) as maxVal from (
SELECT MIN(t.total_cost) as low_cost FROM api_hotel_detail_t t, api_permanent p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' $where group by  t.hotel_code ) as tab";
		
			//echo $select2; exit();
			$query2 = $this->db->query($select2);
			$result2 = $query2->result();
			$data['minVal'] = $result2[0]->minVal;
			$data['maxVal'] = $result2[0]->maxVal;
			//$data['totRow'] = $result2[0]->totRow;
			return $data;
		}
      return false;
	
	}
	
	function fetch_search_result_for_page($ses_id, $page=1, $minVal=0, $maxVal=0, $minStar=0, $maxStar=0, $fac='')
	{
		$display_perpage = 10;
		$start_pos = $display_perpage * ($page-1);
		$where = '';
		
		if (!empty($minVal)) {
			$where.= "AND (t.total_cost BETWEEN $minVal AND $maxVal)";
		}
		
		if (!empty($maxStar)) {
   			$where.= " AND (p.star BETWEEN $minStar AND $maxStar)";
  		}
		
		if (!empty($finval)) {
   			$where.= " AND (f.fac_id in ($finval))"; //AND f.hotel_code = p.hotel_code
			$select = "SELECT SQL_CALC_FOUND_ROWS *, MIN(t.total_cost) as low_cost FROM api_hotel_detail_t t, api_permanent p, api_permanent_facility f WHERE t.hotel_code = p.hotel_code and session_id = '$ses_id' $where GROUP BY t.hotel_code ORDER BY low_cost ASC ";

  		} else {
			$select = "SELECT SQL_CALC_FOUND_ROWS *, MIN(t.total_cost) as low_cost FROM api_hotel_detail_t t, api_permanent p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' $where GROUP BY t.hotel_code ORDER BY low_cost ASC ";
		}

		
		
//		$select = "SELECT SQL_CALC_FOUND_ROWS *, MIN(t.total_cost) as low_cost FROM api_hotel_detail_t t, api_permanent p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' $where GROUP BY t.hotel_code ORDER BY low_cost ASC ";

//		echo $select; exit;
		
		$query = $this->db->query($select);
		
		//echo $this->db->last_query();exit;
		if ( $query->num_rows > 0 ) {
		
			$data['result'] = $query->result();
			
			$count = $this->db->query('SELECT FOUND_ROWS() as rowcount');
			$count = $count->result();

			$data['totRow'] = $count[0]->rowcount;
			
		$select2 = "select MIN(low_cost) as minVal, MAX(low_cost) as maxVal from (
SELECT MIN(t.total_cost) as low_cost FROM api_hotel_detail_t t, api_permanent p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' $where group by  t.hotel_code ) as tab";
		
			//echo $select2; exit();
			$query2 = $this->db->query($select2);
			$result2 = $query2->result();
			$data['minVal'] = $result2[0]->minVal;
			$data['maxVal'] = $result2[0]->maxVal;
			//$data['totRow'] = $result2[0]->totRow;
			return $data;
		}
      return false;
	
	}
	
	function fetch_search_result_for_page_desc($ses_id, $page=1, $minVal=0, $maxVal=0, $minStar=0, $maxStar=0, $finval=0)
	{
		$display_perpage = 10;
		$start_pos = $display_perpage * ($page-1);
		$where = '';
		
		if (!empty($minVal)) {
			$where.= "AND (t.total_cost BETWEEN $minVal AND $maxVal)";
		}
		
		if (!empty($maxStar)) {
   			$where.= " AND (p.star BETWEEN $minStar AND $maxStar)";
  		}
		
		if (!empty($finval)) {
   			$where.= " AND (f.fac_id in ($finval))"; //AND f.hotel_code = p.hotel_code
			$select = "SELECT SQL_CALC_FOUND_ROWS *, MIN(t.total_cost) as low_cost FROM api_hotel_detail_t t, api_permanent p, api_permanent_facility f WHERE t.hotel_code = p.hotel_code and session_id = '$ses_id' $where GROUP BY t.hotel_code ORDER BY low_cost DESC ";

  		} else {
			$select = "SELECT SQL_CALC_FOUND_ROWS *, MIN(t.total_cost) as low_cost FROM api_hotel_detail_t t, api_permanent p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' $where GROUP BY t.hotel_code ORDER BY low_cost DESC ";
		}

		
		
//		$select = "SELECT SQL_CALC_FOUND_ROWS *, MIN(t.total_cost) as low_cost FROM api_hotel_detail_t t, api_permanent p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' $where GROUP BY t.hotel_code ORDER BY low_cost ASC ";

//		echo $select; exit;
		
		$query = $this->db->query($select);
		
		//echo $this->db->last_query();exit;
		if ( $query->num_rows > 0 ) {
		
			$data['result'] = $query->result();
//			print_r($data['result']);
			/*$select = "SELECT min(total_cost) as minVal, max(total_cost) as maxVal FROM api_hotel_detail_t t, api_hotel_detail_p p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' GROUP BY t.hotel_code";
			
			$values = $this->db->query($select);
			$values = $value->result();
			$data['minVal'] = $values[0][]*/
			
		
			/**/
			
			$count = $this->db->query('SELECT FOUND_ROWS() as rowcount');
			$count = $count->result();

			$data['totRow'] = $count[0]->rowcount;
			//$select2 = "SELECT MIN(t.total_cost) as minVal, MAX(t.total_cost) as maxVal, COUNT(*) as totRow FROM api_hotel_detail_t t, api_hotel_detail_p p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' $where";
			
		//	$select2 = "SELECT MIN(t.total_cost) as minVal, MAX(t.total_cost) as maxVal FROM api_hotel_detail_t t, api_permanent p WHERE p.hotel_code = t.hotel_code AND t.session_id = '$ses_id' $where";
		
		//$select = "SELECT MIN(t.total_cost) as low_cost, MAX(t.total_cost) as high_cost FROM api_hotel_detail_t t, api_permanent p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' $where";
		$select2 = "select MIN(low_cost) as minVal, MAX(low_cost) as maxVal from (
SELECT MIN(t.total_cost) as low_cost FROM api_hotel_detail_t t, api_permanent p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' $where group by  t.hotel_code ) as tab";
		
			//echo $select2; exit();
			$query2 = $this->db->query($select2);
			$result2 = $query2->result();
			$data['minVal'] = $result2[0]->minVal;
			$data['maxVal'] = $result2[0]->maxVal;
			//$data['totRow'] = $result2[0]->totRow;
			return $data;
		}
      return false;
	
	}
	
	function __fetch_search_result_for_page2($ses_id, $page, $minVal='', $maxVal='', $minStar='', $maxStar='')
	{
		
		$display_perpage = 10;
		$start_pos = $display_perpage * ($page-1);
		$where = '';
		if (!empty($minVal)) {
			$where.= "AND (t.total_cost BETWEEN $minVal AND $maxVal)";
		}
		
		if (!empty($maxStar)) {
   			$where.= " AND (p.star BETWEEN $minStar AND $maxStar)";
  		}
		
	
		$select = "SELECT *, MIN(t.total_cost) as low_cost FROM api_hotel_detail_t t, api_permanent p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' $where GROUP BY t.hotel_code ORDER BY low_cost ASC LIMIT $start_pos, $display_perpage";

		//echo $select; exit;
		
		$query = $this->db->query($select);
		
		//echo $this->db->last_query();exit;
		if ( $query->num_rows > 0 ) {
		
			$data['result'] = $query->result();
//			
			return $data;
		}
      return false;
	}
	
	function fetch_search_result_for_page2($ses_id, $page, $minVal=0, $maxVal=0, $minStar=0, $maxStar=5, $fac='', $sorting='')
	{
		
		$display_perpage = 10;
		$start_pos = $display_perpage * ($page-1);
		$where = '';
		
		if (!empty($minVal)) {
			$where.= "AND (t.total_cost BETWEEN $minVal AND $maxVal)";
		}
		
		$where.= " AND (p.star BETWEEN $minStar AND $maxStar)";
		
		$order = 'ORDER BY low_cost ASC';
		if (!empty($sorting)) {
			switch ($sorting) {
			case 'name_asc':
				$order = 'ORDER BY p.hotel_name, low_cost ASC';
				break;
			case 'name_desc':
				$order = 'ORDER BY p.hotel_name DESC, low_cost ASC';
				break;
			case 'star_asc':
				$order = 'ORDER BY p.star, low_cost ASC';
				break;
			case 'star_desc':
				$order = 'ORDER BY p.star DESC, low_cost ASC';
				break;
			case 'price_asc':
				$order = 'ORDER BY low_cost ASC';
				break;
			case 'price_desc':
				$order = 'ORDER BY low_cost DESC';
				break;
			}
		}
		
		if (empty($fac)) {
			$select = "SELECT *, MIN(t.total_cost) as low_cost FROM api_hotel_detail_t t, api_permanent p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' $where GROUP BY t.hotel_code $order LIMIT $start_pos, $display_perpage";
		} else {
			$where.= " and MATCH(f.fac) AGAINST ('$fac' IN BOOLEAN MODE)";
			$select = "SELECT SQL_CALC_FOUND_ROWS *, MIN(t.total_cost) as low_cost FROM api_hotel_detail_t t, api_permanent p, facilities f WHERE t.hotel_code = p.hotel_code and t.hotel_code = f.hotel_code AND t.session_id = '$ses_id' $where GROUP BY t.hotel_code $order LIMIT $start_pos, $display_perpage";
			
		} 
		
		//echo $select; exit;

		$query = $this->db->query($select);
		
		//echo $this->db->last_query();exit;
		if ( $query->num_rows > 0 ) {
		
			$data['result'] = $query->result();
//			
			return $data;
		}
      return false;
	}
	
	function fetch_search_result_for_page2_desc($ses_id, $page, $minVal='', $maxVal='', $minStar='', $maxStar='')
	{
		
		$display_perpage = 10;
		$start_pos = $display_perpage * ($page-1);
		$where = '';
		if (!empty($minVal)) {
			$where.= "AND (t.total_cost BETWEEN $minVal AND $maxVal)";
		}
		
		if (!empty($maxStar)) {
   			$where.= " AND (p.star BETWEEN $minStar AND $maxStar)";
  		}
		
	
		$select = "SELECT *, MIN(t.total_cost) as low_cost FROM api_hotel_detail_t t, api_permanent p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' $where GROUP BY t.hotel_code ORDER BY low_cost DESC LIMIT $start_pos, $display_perpage";

		//echo $select; exit;
		
		$query = $this->db->query($select);
		
		//echo $this->db->last_query();exit;
		if ( $query->num_rows > 0 ) {
		
			$data['result'] = $query->result();
//			
			return $data;
		}
      return false;
	}
	
	function fetch_search_result_for_page2_name_asc($ses_id, $page, $minVal='', $maxVal='', $minStar='', $maxStar='')
	{
		
		$display_perpage = 10;
		$start_pos = $display_perpage * ($page-1);
		$where = '';
		if (!empty($minVal)) {
			$where.= "AND (t.total_cost BETWEEN $minVal AND $maxVal)";
		}
		
		if (!empty($maxStar)) {
   			$where.= " AND (p.star BETWEEN $minStar AND $maxStar)";
  		}
		
	
		$select = "SELECT *, MIN(t.total_cost) as low_cost FROM api_hotel_detail_t t, api_permanent p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' $where GROUP BY t.hotel_code ORDER BY p.hotel_name ASC LIMIT $start_pos, $display_perpage";

		//echo $select; exit;
		
		$query = $this->db->query($select);
		
		//echo $this->db->last_query();exit;
		if ( $query->num_rows > 0 ) {
		
			$data['result'] = $query->result();
//			
			return $data;
		}
      return false;
	}
	function fetch_search_result_for_page2_star_asc($ses_id, $page, $minVal='', $maxVal='', $minStar='', $maxStar='')
	{
		
		$display_perpage = 10;
		$start_pos = $display_perpage * ($page-1);
		$where = '';
		if (!empty($minVal)) {
			$where.= "AND (t.total_cost BETWEEN $minVal AND $maxVal)";
		}
		
		if (!empty($maxStar)) {
   			$where.= " AND (p.star BETWEEN $minStar AND $maxStar)";
  		}
		
	
		$select = "SELECT *, MIN(t.total_cost) as low_cost FROM api_hotel_detail_t t, api_permanent p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' $where GROUP BY t.hotel_code ORDER BY p.star ASC LIMIT $start_pos, $display_perpage";

		//echo $select; exit;
		
		$query = $this->db->query($select);
		
		//echo $this->db->last_query();exit;
		if ( $query->num_rows > 0 ) {
		
			$data['result'] = $query->result();
//			
			return $data;
		}
      return false;
	}
	function fetch_search_result_for_page2_name_desc($ses_id, $page, $minVal='', $maxVal='', $minStar='', $maxStar='')
	{
		
		$display_perpage = 10;
		$start_pos = $display_perpage * ($page-1);
		$where = '';
		if (!empty($minVal)) {
			$where.= "AND (t.total_cost BETWEEN $minVal AND $maxVal)";
		}
		
		if (!empty($maxStar)) {
   			$where.= " AND (p.star BETWEEN $minStar AND $maxStar)";
  		}
		
	
		$select = "SELECT *, MIN(t.total_cost) as low_cost FROM api_hotel_detail_t t, api_permanent p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' $where GROUP BY t.hotel_code ORDER BY p.hotel_name DESC LIMIT $start_pos, $display_perpage";

		//echo $select; exit;
		
		$query = $this->db->query($select);
		
		//echo $this->db->last_query();exit;
		if ( $query->num_rows > 0 ) {
		
			$data['result'] = $query->result();
//			
			return $data;
		}
      return false;
	}
	function fetch_search_result_for_page2_star_desc($ses_id, $page, $minVal='', $maxVal='', $minStar='', $maxStar='')
	{
		
		$display_perpage = 10;
		$start_pos = $display_perpage * ($page-1);
		$where = '';
		if (!empty($minVal)) {
			$where.= "AND (t.total_cost BETWEEN $minVal AND $maxVal)";
		}
		
		if (!empty($maxStar)) {
   			$where.= " AND (p.star BETWEEN $minStar AND $maxStar)";
  		}
		
	
		$select = "SELECT *, MIN(t.total_cost) as low_cost FROM api_hotel_detail_t t, api_permanent p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' $where GROUP BY t.hotel_code ORDER BY p.star DESC LIMIT $start_pos, $display_perpage";

		//echo $select; exit;
		
		$query = $this->db->query($select);
		
		//echo $this->db->last_query();exit;
		if ( $query->num_rows > 0 ) {
		
			$data['result'] = $query->result();
//			
			return $data;
		}
      return false;
	}
	
	function get_searchresult_code($id)
	{
		$this->db->select('*');
		$this->db->from('api_hotel_detail_t');
		$this->db->where('hotel_code',$id);
		$query = $this->db->get();	
		if($query->num_rows() == 0 )
		{
		   return '';   
		  }else{
		  return $query->row(); 
		  }
		
	}
	function get_nearby_hotels($lat,$long,$hotel_name,$city)
		{

			/*$this->db->select('*');
			$this->db->from('search_result');
			//$this->db->group_by('hotel_name');
			$this->db->where('result_id',$resid);
*/
			//$query=$this->db->query("SELECT * FROM search_result GROUP BY hotel_name LIMIT 0,10");
				$sec_res=$_SESSION['ses_id'];
			$query=$this->db->query("SELECT *,(((acos(sin(($lat*pi()/180)) * sin((`latitude`*pi()/180))+cos(($lat*pi()/180)) * cos((`latitude`*pi()/180)) * cos((($long- `longitude`)*pi()/180))))*180/pi())*60*1.1515*1.609344) as distance FROM api_hotel_detail_t t, api_permanent p WHERE t.hotel_code = p.hotel_code AND p.city='$city' AND t.session_id = '$sec_res' GROUP BY p.hotel_name HAVING `distance` < 9 LIMIT 0,5");
		
		
			if($query->num_rows() ==''){
				return '';
			}else{
				$res = $query->result();
				return $res;
			}
		}
			function get_searchresult_all()
	{
		$sec_res=$_SESSION['ses_id'];
		$this->db->select('*');
		$this->db->from('api_hotel_detail_t');
		$this->db->group_by("api_hotel_detail_t.hotel_code"); 
		$this->db->where('api_hotel_detail_t.session_id',$sec_res);
		$this->db->join('api_permanent', 'api_hotel_detail_t.hotel_code = api_permanent.hotel_code');
		$query = $this->db->get();	
		if($query->num_rows() == 0 )
		{
		   return '';   
		  }else{
		  return $query->result(); 
		  }
		
	}
	function dummy_get_searchresult($id)
	{
		$this->db->select('*');
		$this->db->from('api_hotel_detail_t');
		$this->db->where('api_temp_hotel_id',$id);
		$this->db->join('hb_hotel', 'api_hotel_detail_t.hotel_code = hb_hotel.HOTELCODE');
		$query = $this->db->get();	
		if($query->num_rows() == 0 )
		{
		   return '';   
		  }else{
		  return $query->row(); 
		  }
		
	}
	function gethb_hoteldetails($id)
	{
		$this->db->select('*');
		$this->db->from('hb_contact');
		$this->db->where('HOTELCODE',$id);
		$query = $this->db->get();	
		if($query->num_rows() == 0 )
		{
		   return '';   
		  }else{
		  return $query->row(); 
		  }
		
	}
	function get_room_facilities($ses_id,$value)
	{
		
		
	
			$que="SELECT * FROM (api_hotel_detail_t) JOIN api_permanent ON api_hotel_detail_t.hotel_code = api_permanent.hotel_code JOIN api_permanent_facility ON api_hotel_detail_t.hotel_code = api_permanent_facility.hotel_code WHERE api_hotel_detail_t.session_id = '".$ses_id."' AND api_permanent_facility.fac IN ('".$value."') GROUP BY api_hotel_detail_t.hotel_code ORDER BY api_hotel_detail_t.total_cost asc";
		
//$select="SELECT SQL_CALC_FOUND_ROWS *, MIN(t.total_cost) as low_cost FROM api_hotel_detail_t t JOIN api_permanent p ON t.hotel_code = p.hotel_code JOIN api_permanent_facility ON t.hotel_code = api_permanent_facility.hotel_code WHERE api_permanent_facility.fac IN ('".$value."') GROUP BY t.hotel_code ORDER BY low_cost asc";

		$query = $this->db->query($que);
		echo $this->db->last_query();exit;

		if ( $query->num_rows > 0 ) {
		
			$result = $query->result();
	
			/*
			$count = $this->db->query('SELECT FOUND_ROWS() as rowcount');
			$count = $count->result();

			$data['totRow'] = $count[0]->rowcount;*/

			return $result;
		}
    
	
	}
	function get_room_facilities_old($ses_id,$value)
	{
		
		$this->db->select('*');
		$this->db->from('api_hotel_detail_t');
		$this->db->where('api_hotel_detail_t.session_id',$ses_id);
		$this->db->where_in('api_permanent_facility.fac',$value);
		$this->db->group_by("api_hotel_detail_t.hotel_code"); 
		$this->db->join('api_permanent', 'api_hotel_detail_t.hotel_code = api_permanent.hotel_code');
		$this->db->join('api_permanent_facility', 'api_hotel_detail_t.hotel_code = api_permanent_facility.hotel_code');
	    $this->db->order_by("api_hotel_detail_t.total_cost", "asc");
		//$display_per_page = 10;
		//$start_pos  = $display_per_page * ($page-1);
		
		//$this->db->limit( $display_per_page , $start_pos);
		//$query = $this->db->get();	
		
	//echo $this->db->last_query();
		//echo "mm".$query->num_rows();
		if($query->num_rows() == 0 )
		{
		   return '';   
		  }else{
		  return $query->result(); 
		  }
 
	/*	
		$query = $this->db->query("SELECT hotel_code FROM  api_permanent_facility WHERE fac IN ($value)");
			if($query->num_rows =='')
			{
				return '';
			}else{
				return $query->result();
			}*/
			
			
			
		//	$que="SELECT * FROM api_hotel_detail_t JOIN api_permanent ON api_hotel_detail_t.hotel_code = api_permanent.hotel_code JOIN api_permanent_facility ON api_hotel_detail_t.hotel_code = api_permanent_facility.hotel_code WHERE api_permanent_facility.fac IN ('".$value."') GROUP BY api_hotel_detail_t.hotel_code ORDER BY api_hotel_detail_t.total_cost asc";
		
		//$query= $this->db->query($que);
		//echo $this->db->last_query();
			/*if($query->num_rows() ==''){
				return '';
			}else{
				return $query->result();
			
			}*/
			
	}
	
	function get_hotel_facilities($ses_id,$value='',$minVal=0, $maxVal=0, $minStar=0, $maxStar=5)
	{

		$where = '';
		if (!empty($minVal)) {
			$where.= " AND (t.total_cost BETWEEN $minVal AND $maxVal)";
		}
		
		if (!empty($maxStar)) {
   			$where.= " AND (p.star BETWEEN $minStar AND $maxStar)";
  		}
		
		if (!empty($value)) {
   			//$where.= " AND (f.fac_id in ($value) AND f.hotel_code = p.hotel_code)"; //
			$where.= " AND (f.fac IN ('".$value."') AND f.hotel_code = p.hotel_code)"; 
			$select = "SELECT SQL_CALC_FOUND_ROWS *, MIN(t.total_cost) as low_cost FROM api_hotel_detail_t t, api_permanent p, api_permanent_facility f WHERE t.hotel_code = p.hotel_code and session_id = '$ses_id' $where GROUP BY t.hotel_code ORDER BY low_cost ASC ";

  		} else {
			$select = "SELECT SQL_CALC_FOUND_ROWS *, MIN(t.total_cost) as low_cost FROM api_hotel_detail_t t, api_permanent p WHERE t.hotel_code = p.hotel_code and session_id = '$ses_id' $where GROUP BY t.hotel_code ORDER BY low_cost ASC ";	
		}
		
		//echo $select; exit;
		$query = $this->db->query($select);
		
		//echo $this->db->last_query();exit;
		if ( $query->num_rows > 0 ) {
		
			$data['result'] = $query->result();
			
			$count = $this->db->query('SELECT FOUND_ROWS() as rowcount');
			$count = $count->result();

			$data['totRow'] = $count[0]->rowcount;

			return $data;
		}
      return false;
		
			
			
	}
	
	function get_zone_id($zone,$cityid)
	{
		$this->db->select('*');
		$this->db->from('hb_zones');
		$this->db->where('ZONE_CODE',$zone);
		$this->db->where('CIY_ID',$cityid);
		$query = $this->db->get();	
		if($query->num_rows() == 0 )
		{
		   return '';   
		  }else{
		  return $query->row(); 
		  }
		
	}
	function fetch_gta_city()
	{
		$this->db->select('cityCode');
	  	$this->db->from('gta_city_code');
     $this->db->where('destinationType','city');
		$query = $this->db->get();	
		if($query->num_rows() == 0 )
		{
		   return '';   
		  }else{
		  return $query->result(); 
		  }
		
	}
function fetch_gta_city_hotelsbed()
	{
		$this->db->select('*');
	  	$this->db->from('hotelbed_citycode');
    
		$query = $this->db->get();	
		if($query->num_rows() == 0 )
		{
		   return '';   
		  }else{
		  return $query->result(); 
		  }
		
	}
		function gethb_hotelfacility($id)
	{
		$this->db->select('*');
		$this->db->from('hb_description');
		$this->db->where('HOTELCODE',$id);
		$this->db->where('LanguageCode','ENG');
		$query = $this->db->get();	
		if($query->num_rows() == 0 )
		{
		   return '';   
		  }else{
		  return $query->row(); 
		  }
		
	}
	
	function dummy_hotelspri_city()
	{
		$this->db->select('*');
		$this->db->from('hotel_list');
	
		$this->db->where('DestinationId','LD6J');
		$query = $this->db->get();	
		if($query->num_rows() == 0 )
		{
		   return '';   
		  }else{
		  return $query->result(); 
		  }
		
	}
	
	function get_room_facilities_by_hotel($ses_id,$hotelcode)
	{
		$this->db->select('*');
		$this->db->from('api_hotel_detail_t');
		$this->db->where('session_id',$ses_id);
		$this->db->where('api_hotel_detail_t.hotel_code',$hotelcode);
		$this->db->group_by("api_hotel_detail_t.hotel_code"); 
		$this->db->join('api_permanent', 'api_hotel_detail_t.hotel_code = api_permanent.hotel_code');
	    $this->db->order_by("api_hotel_detail_t.total_cost", 'ASC'); 
		$query = $this->db->get();	
		if($query->num_rows() == 0 )
		{
		   return '';   
		  }else{
		  return $query->result(); 
		  }
		
	}
	function get_room_facilities_by_hotel_new($ses_id,$hotelcode)
	{
		
		/*$this->db->select('*');
		$this->db->from('api_hotel_detail_t');
		$this->db->where('session_id',$ses_id);
		$this->db->where_in('api_hotel_detail_t.hotel_code',$hotelcode);
		
		$this->db->join('api_permanent', 'api_hotel_detail_t.hotel_code = api_permanent.hotel_code');
		//$this->db->group_by("api_hotel_detail_t.hotel_code"); 
	//    $this->db->order_by("api_hotel_detail_t.total_cost", 'ASC'); 
		$query = $this->db->get();	
		//echo $this->db->last_query();exit;*/
		$select = "SELECT * FROM api_hotel_detail_t t, api_permanent p, api_permanent_facility f where t.hotel_code = p.hotel_code and t.hotel_code = f.hotel_code and t.session_id = '".$ses_id."'  GROUP BY t.hotel_code";
		
		echo $select; exit;
		$query= $this->db->query($select);

		if($query->num_rows() == '' )
		{
		   return '';   
		  }else{
		  return $query->result(); 
		  }
		
	}
	function order_star($ses_id,$order)
	{
		$this->db->select('*');
		$this->db->from('api_hotel_detail_t');
		$this->db->where('session_id',$ses_id);
		$this->db->group_by("api_hotel_detail_t.hotel_code"); 
		$this->db->join('api_permanent', 'api_hotel_detail_t.hotel_code = api_permanent.hotel_code');
	    $this->db->order_by("api_permanent.star", $order); 
		$query = $this->db->get();	
		if($query->num_rows() == 0 )
		{
		   return '';   
		  }else{
		  return $query->result(); 
		  }
		
	}
	function fetch_gta_temp_result_room_facility($ses_id)
	{
		
	$que="SELECT `api_permanent_facility`.`fac`, count( distinct `api_permanent_facility`.`hotel_code`)  as countval,`api_permanent_facility`.`fac_id`
FROM (
`api_hotel_detail_t`
)
JOIN `api_permanent_facility` ON `api_hotel_detail_t`.`hotel_code` = `api_permanent_facility`.`hotel_code`
WHERE `session_id` = '".$ses_id."'
AND `fac_type` = 'room'
GROUP BY `api_permanent_facility`.`fac`";
		
		$query= $this->db->query($que);
	//echo $this->db->last_query();exit;
			if($query->num_rows() ==''){
				return '';
			}else{
				return $query->result();
			
			}
		
		
	}
	function fetch_facility_result_room_facility($ses_id,$hotel_code,$value)
	{
		
	$que="SELECT *  FROM `api_permanent_facility` WHERE `fac` LIKE '%$value%' AND `fac_type` LIKE 'hotel'";
		
		$query= $this->db->query($que);
        //echo $this->db->last_query();exit;
		if($query->num_rows() =='')
		{
		  return 0;
		}
		else
		{
		  return 1;
		}
		
		
	}
	function fetch_gta_temp_result_room_facility_new($ses_id,$val='')
	{
		
		

if (!empty($val)) {

$que = "SELECT t.*,p.*, f.*, f.fac, f.hotel_code, MIN(t.total_cost) as low_cost FROM facilities f, api_hotel_detail_t t, api_permanent p WHERE p.hotel_code = t.hotel_code and t.hotel_code = f.hotel_code and t.session_id = '$ses_id' and MATCH(f.fac) AGAINST ('$val IN BOOLEAN MODE') GROUP BY t.hotel_code ORDER BY low_cost ASC";

}
else {
	$que = "SELECT *, MIN(t.total_cost) as low_cost FROM api_hotel_detail_t t, api_permanent p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id'  GROUP BY t.hotel_code ORDER BY low_cost ASC";
	} 


		$query= $this->db->query($que);

			if($query->num_rows() ==''){
				return '';
			}else{
				return $query->result();
			
			}
		
		
	}
	
	function fetch_gta_temp_result_room_facility_new_page($ses_id,$val,$page)
	{

		$display_per_page = 10;
		$start_pos  = $display_per_page * ($page);
		


$que = "SELECT p.*, f.*, f.fac, f.hotel_code, MIN(t.total_cost) as low_cost FROM api_permanent_facility f, api_hotel_detail_t t, api_permanent p WHERE p.hotel_code = t.hotel_code and f.fac != '' and f.fac_type = 'hotel' and t.hotel_code = f.hotel_code and t.session_id = '$ses_id' and MATCH(f.fac) AGAINST ('$val') GROUP BY t.hotel_code ORDER BY low_cost ASC limit $start_pos, $display_per_page"; 

//echo $que; exit;
		$query= $this->db->query($que);
//echo $this->db->last_query();exit;
			if($query->num_rows() ==''){
				return '';
			}else{
				return $query->result();
			
			}
		
		
	}
	
	function fetch_gta_temp_result_hotel_facility($ses_id, $minVal = 0 , $maxVal = 0, $minStar = 0, $maxStar = 5)
	{
		/*$que="SELECT `api_permanent_facility`.`fac`, count( distinct `api_permanent_facility`.`hotel_code`) as countval ,`api_permanent_facility`.`fac_id` 
FROM (
`api_hotel_detail_t`
)
JOIN `api_permanent_facility` ON `api_hotel_detail_t`.`hotel_code` = `api_permanent_facility`.`hotel_code`
WHERE `session_id` = '".$ses_id."'
AND `fac_type` = 'hotel'
GROUP BY `api_permanent_facility`.`fac`";*/
		//SELECT f.fac_id, f.fac, f.hotel_code, count(f.fac) as countval FROM api_permanent_facility f GROUP BY f.fac

		$select = "DROP TABLE IF EXISTS facility";
		$this->db->query($select);

	
		$select = "CREATE TEMPORARY TABLE facility (fac_id INT, fac varchar(100), hotel_code varchar(20), countval INT, PRIMARY KEY(fac_id))";
	$this->db->query($select);
			 
	$qry = "INSERT INTO facility (SELECT f.fac_id, f.fac, f.hotel_code, count(f.fac) as countval FROM api_permanent_facility f WHERE f.fac != '' and f.fac_type = 'hotel' GROUP BY f.fac)";
	
	$query= $this->db->query($qry);
	
	$where = '';
		if (!empty($minVal)) {
			$where.= " AND (t.total_cost BETWEEN $minVal AND $maxVal)";
		}
		
		if (!empty($maxStar)) {
   			$where.= " AND (p.star BETWEEN $minStar AND $maxStar)";
  		}
		
	
	$sel = "SELECT f.fac_id, f.fac, f.hotel_code, f.countval FROM facility f, api_permanent p, api_hotel_detail_t t where t.hotel_code = f.hotel_code AND t.hotel_code = p.hotel_code and t.session_id = '$ses_id' $where group by p.hotel_code";  
	$query= $this->db->query($sel);
	
	if($query->num_rows() ==''){
				return '';
			}else{
				return $query->result();
			
			}
	
	/*if($query->affected_rows() != 0){
				return '';
			}else{
				return $query->result();
			
			}*/

		/*
		
$que = "SELECT f.fac, count(distinct(f.hotel_code)) as countval ,f.fac_id FROM api_hotel_detail_t t,  api_permanent_facility f, api_permanent p where t.hotel_code = f.hotel_code AND t.session_id = '$ses_id' AND f.fac_type = 'hotel' $where GROUP BY f.fac";*/

//		echo $que; exit;
		//$query= $this->db->query($que);
		//echo $this->db->last_query();exit;
		/*	if($query->num_rows() ==''){
				return '';
			}else{
				return $query->result();
			
			}*/
		
	
		
	}
	function fetch_gta_temp_result_chain_facility($ses_id)
	{
		$que="SELECT `api_permanent`.`chain`, count( distinct `api_permanent`.`hotel_code`) as countval ,`api_permanent`.`api_hotel_id` 
FROM (
`api_hotel_detail_t`
)
JOIN `api_permanent` ON `api_hotel_detail_t`.`hotel_code` = `api_permanent`.`hotel_code`
WHERE `session_id` = '".$ses_id."'

GROUP BY `api_permanent`.`chain`";
		
		$query= $this->db->query($que);
		//echo $this->db->last_query();exit;
			if($query->num_rows() ==''){
				return '';
			}else{
				return $query->result();
			
			}
		
	
		
	}
	function order_name($ses_id,$order)
	{
		$this->db->select('*');
		$this->db->from('api_hotel_detail_t');
		$this->db->where('session_id',$ses_id);
		$this->db->group_by("api_hotel_detail_t.hotel_code"); 
		$this->db->join('api_permanent', 'api_hotel_detail_t.hotel_code = api_permanent.hotel_code');
	    $this->db->order_by("api_permanent.hotel_name", $order); 
		$query = $this->db->get();	
		if($query->num_rows() == 0 )
		{
		   return '';   
		  }else{
		  return $query->result(); 
		  }
		
	}
	function get_facility_by_id($id)
	{
		$this->db->select('fac');
		$this->db->from('api_permanent_facility');
		$this->db->where('fac_id',$id);
	
		$query = $this->db->get();	
//		echo $this->db->last_query();exit;
		if($query->num_rows() == 0 )
		{
		   return '';   
		  }else{
		  $a =  $query->row(); 
		  return $a->fac;
		  }
		
	}
	function get_facility_details($id)
	{
		$this->db->select('*');
		$this->db->from('api_permanent_facility');
		$this->db->where('hotel_code',$id);
	
		$query = $this->db->get();	
//		echo $this->db->last_query();exit;
		if($query->num_rows() == 0 )
		{
		   return '';   
		  }else{
		  
		  return  $query->result(); 
		  }
		
	}
	function get_facility_details_room($id)
	{
		$this->db->select('*');
		$this->db->from('api_permanent_facility');
		$this->db->where('hotel_code',$id);
		$this->db->where('fac_type','room');
	$this->db->group_by("fac"); 
		$query = $this->db->get();	
//		echo $this->db->last_query();exit;
		if($query->num_rows() == 0 )
		{
		   return '';   
		  }else{
		  
		  return  $query->result(); 
		  }
		
	}
	function get_facility_details_hotel($id)
	{
		$this->db->select('*');
		$this->db->from('api_permanent_facility');
		$this->db->where('hotel_code',$id);
		$this->db->where('fac_type','hotel');
		$this->db->group_by("fac"); 
		$query = $this->db->get();	
//		echo $this->db->last_query();exit;
		if($query->num_rows() == 0 )
		{
		   return '';   
		  }else{
		  
		  return  $query->result(); 
		  }
		
	}
	function order_price($ses_id,$order)
	{
		$this->db->select('*');
		$this->db->from('api_hotel_detail_t');
		$this->db->where('session_id',$ses_id);
		$this->db->group_by("api_hotel_detail_t.hotel_code"); 
		$this->db->join('api_permanent', 'api_hotel_detail_t.hotel_code = api_permanent.hotel_code');
	    $this->db->order_by("api_hotel_detail_t.total_cost", $order); 
		$query = $this->db->get();	
		if($query->num_rows() == 0 )
		{
		   return '';   
		  }else{
		  return $query->result(); 
		  }
		
	}
	function order_price_count_value($ses_id,$order)
	{
		$this->db->select('*');
		$this->db->from('api_hotel_detail_t');
		$this->db->where('session_id',$ses_id);
		$this->db->group_by('hotel_code'); 
	    $this->db->order_by("total_cost", $order); 
		$query = $this->db->get();	
		if($query->num_rows() == 0 )
		{
		   return '';   
		  }else{
		  return $query->result(); 
		  }
		
	}
	function fetch_gta_temp_result_room($ses_id,$hotel_code)
	{
		$this->db->select('*');
		$this->db->from('api_hotel_detail_t');
		$this->db->where('session_id',$ses_id);
		$this->db->where('hotel_code',$hotel_code);
		$this->db->group_by('room_code'); 
	    $this->db->order_by("total_cost",'ASC'); 
		$query = $this->db->get();	
		return $query->result();
	}
	function fetch_gta_temp_result_room_result_id($ses_id,$hotel_code)
	{
		$this->db->select('*');
		$this->db->from('api_hotel_detail_t');
		$this->db->where('session_id',$ses_id);
		$this->db->where('api_temp_hotel_id',$hotel_code);
		$query = $this->db->get();	
		return $query->row();
	}

	function transation_detail($tran_id)
	{
		$this->db->select('*');
		$this->db->from('transaction_details');
		$this->db->where('transaction_details_id',$tran_id);
		$query = $this->db->get();	
		return $query->row();
	}
	function contact_info_detail($tran_id)
	{
		$this->db->select('*');
		$this->db->from('customer_contact_details');
		$this->db->where('customer_contact_details_id',$tran_id);
		$query = $this->db->get();	
		return $query->row();
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
	function hotel_count_in_temp($ses_id)
	{
		$this->db->select('*');
		$this->db->where('session_id', $ses_id);
		$this->db->from('api_hotel_detail_t');
		$this->db->group_by("hotel_code"); 
		$cnt = $this->db->count_all();	
		return $cnt;
	}
	function get_price_shorting($ses_id,$val1,$val2)
	{
		$this->db->select('*');
		$this->db->from('api_hotel_detail_t');
		$this->db->where('api_hotel_detail_t.session_id',$ses_id);
		$this->db->group_by("api_hotel_detail_t.hotel_code"); 
		$this->db->join('api_permanent', 'api_hotel_detail_t.hotel_code = api_permanent.hotel_code');
		$this->db->where('api_hotel_detail_t.total_cost BETWEEN '.$val1.' AND '.$val2);
	    $this->db->order_by("api_hotel_detail_t.total_cost", "asc"); 
		$query = $this->db->get();	
	//	echo $this->db->last_query();exit;
		if($query->num_rows() == 0 )
		{
		   return '';   
		  }else{
		  return $query->result(); 
		  }
	}
	function get_star_shorting($ses_id,$val1,$val2)
	{
		$this->db->select('*');
		$this->db->from('api_hotel_detail_t');
		$this->db->where('api_hotel_detail_t.session_id',$ses_id);
		$this->db->group_by("api_hotel_detail_t.hotel_code"); 
		$this->db->join('api_permanent', 'api_hotel_detail_t.hotel_code = api_permanent.hotel_code');
		$this->db->where('api_permanent.star BETWEEN '.$val1.' AND '.$val2);
	    $this->db->order_by("api_hotel_detail_t.total_cost", "asc"); 
		$query = $this->db->get();	
		//echo $this->db->last_query();exit;
		if($query->num_rows() == 0 )
		{
		   return '';   
		  }else{
		  return $query->result(); 
		  }
	
	}
	function get_pagination_room($secid,$page)
	{
		$this->db->where('session_id',$secid);
		$this->db->group_by("api_hotel_detail_t.hotel_code"); 
		$this->db->join('api_permanent', 'api_hotel_detail_t.hotel_code = api_permanent.hotel_code');
	    $this->db->order_by("api_hotel_detail_t.total_cost", "ASC"); 
			
			$result_display = 10;
			$start_pos = $result_display * ($page-1);
			//echo $start_pos.",".$result_display;
			$query=$this->db->get('api_hotel_detail_t',$result_display,$start_pos);
			//echo $this->db->last_query();exit;
			if($query->num_rows() ==''){
				return '';			
			}else{
				return $query->result();				
			}
	}
		function ruby_hotelsbed_merge($secid,$page)
	{
		$this->db->select('*');
		$this->db->from('api_hotel_detail_t');
		$this->db->where('api_hotel_detail_t.session_id',$ses_id);
		$this->db->group_by("api_hotel_detail_t.hotel_code"); 
		$this->db->join('api_permanent', 'api_hotel_detail_t.hotel_code = api_permanent.hotel_code');
		$this->db->where('api_permanent.star BETWEEN '.$val1.' AND '.$val2);
	    $this->db->order_by("api_hotel_detail_t.total_cost", "asc"); 
		$query = $this->db->get();	
		//echo $this->db->last_query();exit;
		if($query->num_rows() == 0 )
		{
		   return '';   
		  }else{
		  return $query->result(); 
		  }
	
	}
	function gethb_hotelimage_new($hotelCode)
		{
		//$val="GEN";
			$query = $this->db->query("SELECT * FROM  hb_image WHERE HOTELCODE='$hotelCode'");
			if($query->num_rows =='')
			{
				return '';
			}else{
				return $query->result();
			}
		}
		function gethb_hotelimage_new_travco($hotelCode)
		{
		//$val="GEN";
			$query = $this->db->query("SELECT * FROM  travco_image WHERE hotel_code='$hotelCode'");
			if($query->num_rows =='')
			{
				return '';
			}else{
				return $query->result();
			}
		}
		
			function gethb_hoteldet($hotelCode)
		{
			$query = $this->db->query("SELECT * FROM hb_hotel WHERE HOTELCODE='$hotelCode'");
			if($query->num_rows =='')
			{
				return '';
			}else{
				return $query->row();
			}
		}
		function get_hotelbed_hotel()
		{
			$query = $this->db->query("SELECT * FROM hb_hotel ");
			if($query->num_rows =='')
			{
				return '';
			}else{
				return $query->result();
			}
		}
		function dummy_get_hotelbed_hotel($id)
		{
			$query = $this->db->query("SELECT * FROM hb_hotel where HOTELCODE = '$id' ");
			if($query->num_rows =='')
			{
				return '';
			}else{
				return $query->result();
			}
		}
		function dummy_get_hotelbed_hotel_by_id($id)
		{
			$query = $this->db->query("SELECT * FROM hb_hotel where DESTINATIONCODE IN ($id)");
			if($query->num_rows =='')
			{
				return '';
			}else{
				return $query->result();
			}
		}
		function gethb_hotelfec($hotelCode)
		{
			$query=$this->db->query("SELECT * FROM hb_facilities WHERE GROUP_='70' AND HOTELCODE='$hotelCode'");
			if($query->num_rows ==0)
			{
				return '';
			}
			else
			{
				$phone =  $query->result();
				$fac=array();
			
				foreach($phone as $val)
				{
					//echo'<pre/>';print_r($val);exit;
					$code=$val->CODE;
					$group = $val->GROUP_;
					//echo "SELECT NAME FROM hb_faci_desc WHERE GROUP_ =$group AND CODE=$code";exit;
					$query = $this->db->query("SELECT NAME FROM hb_faci_desc WHERE GROUP_ =$group AND CODE=$code");
					if($query->num_rows ==0)
					{
						return '';
					}
					else
					{
					$faci =  $query->row();
					$fac[]= $faci->NAME;
					}
				}
				return $fac;
			}
		}
		function gethb_hotelroom($hotelCode)
		{
			$query=$this->db->query("SELECT * FROM hb_facilities WHERE GROUP_='60' AND HOTELCODE='$hotelCode'");
			if($query->num_rows =='')
			{
				return '';
			}else{
				$phone =  $query->result();
				$room=array();
			
				foreach($phone as $val)
				{
					//echo'<pre/>';print_r($val);exit;
					$code=$val->CODE;
					$group = $val->GROUP_;
					//echo "SELECT NAME FROM hb_faci_desc WHERE GROUP_ =$group AND CODE=$code";exit;
					$query = $this->db->query("SELECT NAME FROM hb_faci_desc WHERE GROUP_ =$group AND CODE=$code");
					if($query->num_rows =='')
					{
					return '';
					}
					else
					{
					$roomi =  $query->row();
					$room[]= $roomi->NAME;
					}
				}
				return $room;
			}
		}
		function get_hotelbed_hotel_pro()
		{
			$query = $this->db->query("SELECT * FROM hotel_list ");
			if($query->num_rows =='')
			{
				return '';
			}else{
				return $query->result();
			}
		}
		function get_hotelbed_image($hotelCode)
		{
		//$val="GEN";
			$query = $this->db->query("SELECT * FROM  hb_image WHERE HOTELCODE='$hotelCode' ");
			if($query->num_rows =='')
			{
				return '';
			}else{
				return $query->row();
			}
		}
		function get_gtt($city)
		{
			$query = $this->db->query("SELECT * FROM  gtt WHERE city='$city'");
			if($query->num_rows =='')
			{
				return '';
			}else{
				return $query->row();
			}
		}
		function update_gtt($name,$id)
		{
				$this->db->query("UPDATE gtt SET hotelsbed='$id' WHERE city='$name'");
		}
		function insert_gtt($name,$con,$city,$id)
		{
				$data=array('city'=>$name,'country_name'=>$con,'city_name'=>$city,'hotelsbed'=>$id);
			$this->db->insert('gtt',$data);
		   return $this->db->insert_id();
		}
		function get_test()
		{
			$query = $this->db->query("SELECT * FROM  test1");
			if($query->num_rows =='')
			{
				return '';
			}else{
				return $query->result();
			}
		}
		function get_hotelspro_desc($hotelCode)
		{
		//$val="GEN";
			$query = $this->db->query("SELECT * FROM  hotel_desc WHERE 	HotelCode='$hotelCode'");
			if($query->num_rows =='')
			{
				return '';
			}else{
				return $query->row();
			}
		}
		function get_hotelspro_fac($hotelCode)
		{
		//$val="GEN";
			$query = $this->db->query("SELECT * FROM  hotel_amenties WHERE 	HotelCode='$hotelCode'");
			if($query->num_rows =='')
			{
				return '';
			}else{
				return $query->row();
			}
		}
		function get_hotelbed_phone($hotelCode)
		{
		//$val="GEN";
			$query = $this->db->query("SELECT * FROM  hb_phone WHERE HOTELCODE='$hotelCode' AND PHONETYPE='phoneHotel'");
			if($query->num_rows =='')
			{
				return '';
			}else{
				return $query->row();
			}
		}
		function get_hotelbed_fax($hotelCode)
		{
		//$val="GEN";
			$query = $this->db->query("SELECT * FROM  hb_phone WHERE HOTELCODE='$hotelCode' AND PHONETYPE='faxNumber'");
			if($query->num_rows =='')
			{
				return '';
			}else{
				return $query->row();
			}
		}
		

   
}



/*
















class Hotel_Model extends CI_Model
{
	 
 		function Hotel_Model()
	{
         parent::Hotel_Model();
     }

	public function insert_gta_temp_result($sec_res,$api,$itemCode,$room_code,$room_type,$cost_val,$status_val,$meals_val)
		{
			$data=array('session_id'=>$sec_res,'api'=>$api,'hotel_code'=>$itemCode,'room_code'=>$room_code,'room_type'=>$room_type,'inclusion'=>$meals_val,'total_cost'=>$cost_val,'status'=>$status_val);
			
		    $this->db->insert('api_hotel_detail_t',$data);
		    return $this->db->insert_id();
		
}
}*/