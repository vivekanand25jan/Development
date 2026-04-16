<?php 
class B2b_Model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	function add_agent($name, $company_name, $address, $country, $city, $postal_code, $office_phone, $mobile_no,$currency, $email_id, $password)
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
			'last_visit' => '',
			'agent_type' => 2
			);
			
			$this->db->set('register_date', 'NOW()', FALSE); 
		
		$this->db->insert('agent', $data);
		$id = $this->db->insert_id();
		if (!empty($id)) {
			return true;
		} else {
			return false;
		}

	}
	
	function check_agent_login($email,$password)
	{		
		
		//$select = "select agent_id, email_id, name, agent_type, branch_id from agent where email_id ='".$email."' AND password  ='".sha1($password)."' AND active = 1";
		
		$select = "select agent_id, email_id, name, agent_type, branch_id, markup from agent where email_id = ? AND password  = ? AND active = 1";
	 
		 $query=$this->db->query($select, array($email, sha1($password)));
		 
		// echo $this->db->last_query(); exit;
		if ($query->num_rows() > 0)
		{
		   foreach ($query->result() as $row)
		   {
				
			  $sessionUserInfo = array(
                   'agent_id'  => $row->agent_id,
				   'email_id'  => $row->email_id,
				   'name'  => $row->name,
				   'agent_type' => $row->agent_type,
				   'branch_id' => $row->branch_id,
				  'markup' => $row->markup
                   //'agent_logged_in' => TRUE
               );
			   
			   if ($row->agent_type == 2) {
					$sessionUserInfo['agent_logged_in'] = TRUE;
					$sessionUserInfo['staff_logged_in'] = FALSE;
			   } else {
					$sessionUserInfo['agent_logged_in'] = FALSE;
					$sessionUserInfo['staff_logged_in'] = TRUE;
			   }
			   
			   //print_r($sessionUserInfo); exit;

				$this->session->set_userdata($sessionUserInfo);
				
				if ($row->agent_type == 2) {
					$select = "SELECT a.api_name, m.commission FROM api a, agent_markup m WHERE a.api_id = m.api_id and agent_id = " . $row->agent_id;
					
					$query = $this->db->query($select);
					if ($query->num_rows() > 0)
					{
						$result = $query->result_array();
						$agent_commission = array();
						for ($i = 0; $i < count($result); $i++) {
							$agent_commission[$result[$i]['api_name']] = $result[$i]['commission'];
						}
						
						$this->session->set_userdata($agent_commission);
						
						
						
					}
				} else {
					$select = "SELECT markup FROM markup_branch WHERE branch_id = " . $row->branch_id;
					
					$query = $this->db->query($select);
					if ($query->num_rows() > 0)
					{
						$result = $query->row_array();
						$staff_commission = array();
						$staff_commission['staff_commission'] = $result['markup'];
						
						$this->session->set_userdata($staff_commission);
						
						//echo $this->session->userdata('staff_commission');
					}
				}
			  
		   }
		   return true;
		   
		} 
		else
		{
			return false;
		}
	}
	
	function getAgentAccInfo($agent_id)
	{		
		
		$select = "SELECT balance_credit, last_credit FROM agent_acc_info WHERE agent_id = $agent_id limit 1";
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->row();
		}
	}
	
	function getBranchAccInfo($agent_id = 0, $branch_id = 0)
	{		
		if (!empty($branch_id)) {
			//$select = "SELECT b.balance_credit, b.last_credit, a.branch_name FROM branch_acc_info b, agent_branch_details a WHERE a.branch_id = b.branch_id and b.branch_id = $branch_id limit 1";
			$select = "SELECT b.balance_credit, b.last_credit, a.branch_name FROM agent_branch_details a left join branch_acc_info b on a.branch_id = b.branch_id and a.branch_id = $branch_id limit 1";
		} else {
			//$select = "SELECT b.balance_credit, b.last_credit, a.branch_name FROM branch_acc_info b, agent_branch_details a WHERE a.agent_id = $agent_id  and a.branch_id = b.branch_id";
			$select = "SELECT b.balance_credit, b.last_credit, a.branch_name FROM agent_branch_details a left join branch_acc_info b on a.branch_id = b.branch_id and a.agent_id = $agent_id";
		}
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
	}
	
	function delete_gta_temp_result($ses_id)
	{
		$this->db->where('session_id',$ses_id);	
		$this->db->delete('api_hotel_detail_t');	
	}
	
	 function insert_temp_result($sec_res,$api,$itemCode,$room_code,$room_type,$cost_val,$status_val,$meals_val)
	{
			$data=array('session_id'=>$sec_res,'api'=>$api,'hotel_code'=>$itemCode,'room_code'=>$room_code,'room_type'=>$room_type,'inclusion'=>$meals_val,'total_cost'=>$cost_val,'status'=>$status_val);
			$this->db->insert('api_hotel_detail_t',$data);
		   return $this->db->insert_id();
		
	}
	
	function get_city_code($city)
	{
	    $this->db->select('*');
		$this->db->from('api_hotels_city');
		$this->db->where('city',$city);
		$query = $this->db->get();
//echo $this->db->last_query();exit;
		
		if($query->num_rows() == 0 )
		{
		   return '';   
		  }else{
		  return $query->row(); 
		  }

	}
	
	function fetch_search_result($ses_id, $page=1, $minVal = '', $maxVal = '', $minStar = '', $maxStar = '')
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
		

		$select = "SELECT SQL_CALC_FOUND_ROWS *, MIN(t.total_cost) as low_cost FROM api_hotel_detail_t t, api_permanent p WHERE t.hotel_code = p.hotel_code AND session_id = '$ses_id' $where GROUP BY t.hotel_code ORDER BY low_cost ASC ";

		
		
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
	
	function getAgentInfo($agent_id)
	{
	    $select = "SELECT * FROM agent WHERE agent_id = $agent_id limit 1";
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->row();
		} else {
			return false;
		}

	}
	
	function edit_agent($agent_id, $name, $company_name, $address, $country, $city, $postal_code, $office_phone, $mobile_no, $email_id)
	{
	
		$data = array(
			'email_id' => $email_id,
			'name' => $name,
			'company_name' => $company_name,
			'address' => $address,
			'country' => $country,
			'city' => $city,
			'postal_code' => $postal_code,
			'office_phone' => $office_phone,
			'mobile' => $mobile_no
			);
			
			
		
		$where = "agent_id = $agent_id";
		
		if ($this->db->update('agent', $data, $where)) {
			return true;
		} else {
			return false;
		}

	}
	
	function change_password($email_id, $old_password, $password)
	{
	
		$data = array(
			'password' => sha1($password)
		);
		
		$where = "password = sha1('$old_password') AND email_id = '$email_id'";
			
		if ($this->db->update('agent', $data, $where)) {
			return true;
		} else {
			return false;
		}

	}
	
	function getBranchDtls($agent_id, $txt_search ='')
	{		
		if (!empty($txt_search)) {
			$select = "SELECT *, if(status='1','Active','Inactive') as status_str FROM agent_branch_details WHERE agent_id = $agent_id and (branch_name like '%$txt_search%' or branch_email like '%$txt_search%' or address like '%$txt_search%' or city like '%$txt_search%' or telephone like '%$txt_search%')";
		} else {
			$select = "SELECT *, if(status='1','Active','Inactive') as status_str FROM agent_branch_details WHERE agent_id = $agent_id";
		}
		
		//echo $select;exit;
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}
	}
	
	function add_branch($agent_id, $branch_name, $branch_email, $address, $country, $city, $postal_code, $telephone, $mobile, $status)
	{
	
		$data = array(
			'agent_id' => $agent_id,
			'branch_name' => $branch_name,
			'branch_email' => $branch_email,
			'address' => $address,
			'country' => $country,
			'city' => $city,
			'postal_code' => $postal_code,
			'telephone' => $telephone,
			'mobile' => $telephone,
			'status' => $status,
			'last_login' => ''
			);
			
			$this->db->set('created_date', 'NOW()', FALSE); 
		
		$this->db->insert('agent_branch_details', $data);
		$id = $this->db->insert_id();
		if (!empty($id)) {
			return true;
		} else {
			return false;
		}

	}
	
	function getBranchInfo($branch_id, $agent_id)
	{		
		
			$select = "SELECT * FROM agent_branch_details WHERE branch_id = $branch_id and agent_id = $agent_id limit 1";
		
		
		//echo $select;exit;
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->row();
		} else {
			return false;
		}
	}
	
	function edit_branch($branch_id, $branch_name, $branch_email, $address, $country, $city, $postal_code, $telephone, $mobile, $status)
	{
	
		$data = array(
			'branch_name' => $branch_name,
			'branch_email' => $branch_email,
			'address' => $address,
			'country' => $country,
			'city' => $city,
			'postal_code' => $postal_code,
			'telephone' => $telephone,
			'mobile' => $mobile,
			'status' => $status
			);
			
		$where = "branch_id = $branch_id";
		if ($this->db->update('agent_branch_details', $data, $where)) {
			return true;
		} else {
			return false;
		}

	}
	
	function delete_branch($branch_id, $agent_id)
	{
		
		$where = "branch_id = $branch_id AND agent_id = $agent_id";
		if ($this->db->delete('agent_branch_details', $where)) {
			$where = "branch_id = $branch_id";
			if ($this->db->delete('agent', $where)) {
			return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
		
		
	}
	
	function getStaffDtls($agent_id, $txt_search = '')
	{		
		/*if (!empty($txt_search)) {
			
			$select = "SELECT s.*, if(s.status='1','Active','Inactive') as status_str, a.branch_name FROM branch_staff s, agent_branch_details a WHERE a.agent_id = $agent_id and a.branch_id = s.branch_id and (a.branch_name = '$txt_search' or s.email = '$txt_search' or s.name = '$txt_search')";
			
		} else {
			$select = "SELECT s.*, if(s.status='1','Active','Inactive') as status_str, a.branch_name FROM branch_staff s, agent_branch_details a WHERE a.agent_id = $agent_id and a.branch_id = s.branch_id";
		}*/
		
		if (!empty($txt_search)) {
			
			$select = "SELECT s.*, s.agent_id as staff_id, if(s.active='1','Active','Inactive') as status_str, a.branch_name FROM agent s, agent_branch_details a WHERE a.agent_id = $agent_id and a.branch_id = s.branch_id and (a.branch_name like '%$txt_search%' or s.email_id like '%$txt_search%' or s.name like '%$txt_search%' and s.agent_type!=2)";
			
		} else {
			$select = "SELECT s.*, s.agent_id as staff_id, if(s.active='1','Active','Inactive') as status_str, a.branch_name FROM agent s, agent_branch_details a WHERE a.agent_id = $agent_id and a.branch_id = s.branch_id and s.agent_type!=2";
		}
		
		//echo $select;exit;
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}
	}
	
	function getBranchs($agent_id)
	{		
		
		$select = "SELECT branch_id, branch_name FROM agent_branch_details WHERE agent_id = $agent_id and status = 1";
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}
	}
	
	function add_staff($agent_id, $branch_id, $staff_name, $email, $password, $status)
	{
	
		$data = array(
			'branch_id' => $branch_id,
			'name' => $staff_name,
			'password' => sha1($password),
			'email_id' => $email,
			'active' => $status,
			'agent_type' => 3,
			'parent_id' => $agent_id
			);
			
			$this->db->set('register_date', 'NOW()', FALSE); 
		
		$this->db->insert('agent', $data);
		$id = $this->db->insert_id();
		if (!empty($id)) {
			return true;
		} else {
			return false;
		}

	}
	
	function getStaffInfo($staff_id, $agent_id)
	{		
		
		
		//$select = "SELECT s.* FROM branch_staff s, agent_branch_details b WHERE s.staff_id = $staff_id and s.branch_id = b.branch_id and b.agent_id = $agent_id limit 1";
		
		$select = "SELECT s.*, s.agent_id as staff_id FROM agent s WHERE s.agent_id = $staff_id limit 1";
		
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->row();
		} else {
			return false;
		}
	}
	
	function edit_staff($staff_id, $branch, $staff_name, $email_id, $active)
	{
	
		$data = array(
			'branch_id' => $branch,
			'name' => $staff_name,
			'email_id' => $email_id,
			'active' => $active
			);
			
		$where = "agent_id = $staff_id";
		if ($this->db->update('agent', $data, $where)) {
			return true;
		} else {
			return false;
		}

	}
	
	function delete_staff($agent_id, $staff_id)
	{
		
		$where = "agent_id = $staff_id and parent_id = $agent_id";
		if ($this->db->delete('agent', $where)) {
			return true;
		} else {
			return false;
		}
	}
	
	function getBranchDepositDtls($agent_id)
	{		
		
		$select = "SELECT b.deposit_id, b.amount, DATE_FORMAT(b.deposit_date,'%d/%m/%Y') as deposit_date, a.branch_name FROM branch_deposit b, agent_branch_details a WHERE a.agent_id = $agent_id and a.branch_id = b.branch_id";
		
		
		//echo $select;exit;
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}
	}
	
	function add_branch_deposit($branch_id, $amount, $agent_id)
	{
		$select = "SELECT balance_credit FROM agent_acc_info where agent_id = $agent_id limit 1";
		$query = $this->db->query($select);
		if ($query->num_rows() > 0)
		{
			$result = $query->row();
			$balance_credit = $result->balance_credit;
			//echo $balance_credit; exit;
		} else {
			return false;
		}
		if ($balance_credit >= $amount) {
			$data = array(
				'branch_id' => $branch_id,
				'amount' => $amount
				);
				
				$this->db->set('deposit_date', 'NOW()', FALSE); 
			
			$this->db->insert('branch_deposit', $data);
			$id = $this->db->insert_id();
			if (!empty($id)) {
				$select = "SELECT branch_acc_info_id FROM branch_acc_info where branch_id = $branch_id limit 1";
				$query=$this->db->query($select);
				if ($query->num_rows() > 0)
				{
					$qry = "update branch_acc_info set balance_credit = (balance_credit + $amount), last_credit = $amount where branch_id = $branch_id";
				} else {
					$qry = "insert into branch_acc_info set branch_id = $branch_id, balance_credit = $amount, last_credit = $amount";
				}
				
				if ($this->db->query($qry)) {
					$qry = "update agent_acc_info set balance_credit = (balance_credit - $amount) where agent_id = $agent_id";
					$this->db->query($qry);
				}
			
				return true;
			} else {
				return false;
			}
		} // if ($balance_credit >= $amount)

	}
	
	function getBranchDepositInfo($deposit_id, $agent_id)
	{		
		
		//$select = "SELECT * FROM branch_deposit WHERE deposit_id = $deposit_id limit 1";
		$select = "SELECT d.* FROM branch_deposit d, agent_branch_details b WHERE deposit_id = $deposit_id and d.branch_id = b.branch_id and b.agent_id = $agent_id limit 1";
		
		//echo $select;exit;
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->row();
		} else {
			return false;
		}
	}
	
	function edit_branch_deposit($deposit_id, $branch, $amount)
	{
	
		$data = array(
			'branch_id' => $branch,
			'amount' => $amount
			);
			
		$where = "deposit_id = $deposit_id";
		if ($this->db->update('branch_deposit', $data, $where)) {
			return true;
		} else {
			return false;
		}

	}
	
	function delete_branch_deposit($deposit_id)
	{
		$where = "deposit_id = $deposit_id";
		if ($this->db->delete('branch_deposit', $where)) {
			return true;
		} else {
			return false;
		}
	}
	
	function getBranchMarkupDtls($agent_id)
	{		
		
		$select = "SELECT m.markup_id, m.markup, b.branch_name FROM markup_branch m, agent_branch_details b WHERE b.agent_id = $agent_id and b.branch_id = m.branch_id";
		
		
		//echo $select;exit;
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}
	}
	
	function add_branch_markup($branch_id, $markup)
	{
	
		$data = array(
			'branch_id' => $branch_id,
			'markup' => $markup
			);
			
		
		$this->db->insert('markup_branch', $data);
		$id = $this->db->insert_id();
		if (!empty($id)) {
			return true;
		} else {
			return false;
		}

	}
	
	function getBranchMarkUpInfo($markup_id, $agent_id)
	{		
		
		$select = "SELECT m.* FROM markup_branch m, agent_branch_details b WHERE markup_id = $markup_id and m.branch_id = b.branch_id and b.agent_id = $agent_id limit 1";
		
		//echo $select;exit;
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->row();
		} else {
			return false;
		}
	}
	
	function edit_branch_markup($markup_id, $branch, $markup)
	{
	
		$data = array(
			'branch_id' => $branch,
			'markup' => $markup
			);
			
		$where = "markup_id = $markup_id";
		if ($this->db->update('markup_branch', $data, $where)) {
			return true;
		} else {
			return false;
		}

	}
	
	
	function delete_branch_markup($markup_id)
	{
		$where = "markup_id = $markup_id";
		if ($this->db->delete('markup_branch', $where)) {
			return true;
		} else {
			return false;
		}
	}
	
	function search_booking_details($booking_number = '', $passenger_name = '', $booking_status, $sel_date_type = '', $fdate = '',$todate = '', $agent_id, $booking_type,$branch_id)
	{
		echo $booking_type; 
		$where='';
		
		if(empty($booking_type)){
			$booking_type = 'my_booking';
		}
		
		//echo $booking_type;
	
		if(!empty($booking_status)){
			$where.= " where t.status = '$booking_status'";
		} else {
			$where.= " where t.status = 'confirmed'";
		}
		
		
		if($booking_number != '') {
			$where.= " and t.booking_number ='".$booking_number."' ";
		}
	   
	  
		if($passenger_name!=''){
			$where.= " and (c.first_name ='".$passenger_name."' or (c.middle_name ='".$passenger_name."') or (c.last_name ='".$passenger_name."')) ";
		}
	
		if($sel_date_type!= '' &&  $fadte!= '' &&  $toadte!= ''){
			 if($sel_date_type==1){
				 echo $where.= " and h.check_in between '".$fadte."'  and '".$toadte."' ";
			 }
			 else{
			 $where.= " and h.voucher_date between '".$fadte."'  and '".$toadte."' ";
			 }
		}
		//echo $booking_type; exit;
		if ($branch_id != 0) {
			$where.=" and t.user_type = 3 and t.branch_id = $branch_id";
				$select = "SELECT h.check_in, h.check_out, h.cancel_tilldate, t.booking_number, t.amount, t.created_date, CONCAT(c.first_name, ' ', c.middle_name, ' ', c.last_name) as name FROM hotel_booking_info h left join transaction_details t on h.customer_contact_details_id = t.customer_contact_details_id left join customer_contact_details c on c.customer_contact_details_id = h.customer_contact_details_id $where";
				//echo $select;
		} elseif ($booking_type == 'my_booking') {
			
				$where.=" and t.user_id = $agent_id AND t.user_type = 2";
				$select = "SELECT h.check_in, h.check_out, h.cancel_tilldate, t.booking_number, t.amount, t.created_date, CONCAT(c.first_name, ' ', c.middle_name, ' ', c.last_name) as name FROM hotel_booking_info h left join transaction_details t on h.customer_contact_details_id = t.customer_contact_details_id left join customer_contact_details c on c.customer_contact_details_id = h.customer_contact_details_id $where";
			
				
		} else {
			$where.=" AND t.user_type = 3 and bd.agent_id = $agent_id";
	
		 $select = "SELECT h.check_in, h.check_out, h.cancel_tilldate, t.booking_number, t.amount, t.created_date, CONCAT(c.first_name, ' ', c.middle_name, ' ', c.last_name) as name FROM hotel_booking_info h left join transaction_details t on h.customer_contact_details_id = t.customer_contact_details_id left join customer_contact_details c on c.customer_contact_details_id = h.customer_contact_details_id LEFT JOIN agent_branch_details bd ON bd.branch_id = t.branch_id $where";
		 
		 //echo $select; exit;
		}
		 
		//echo $select; exit;
					
		$query = $this->db->query($select);
		
		//echo $this->db->last_query();exit;
		
		if ( $query->num_rows > 0 )
		{ 
			return $query->result();
		}
		return false;
	
	}	
	
	function search_my_booking_details($booking_number = '', $passenger_name = '', $booking_status, $sel_date_type = '', $fdate = '',$todate = '', $agent_id,$branch_id=0)
	{

		$where='';
		
		/*if(empty($booking_type)){
			$booking_type = 'my_booking';
		}*/
		
		//echo $booking_type;
	
		if(!empty($booking_status)){
			$where.= " where t.status = '$booking_status'";
		} else {
			$where.= " where t.status = 'confirmed'";
		}
		
		
		if($booking_number != '') {
			$where.= " and t.booking_number ='".$booking_number."' ";
		}
	   
	  
		if($passenger_name!=''){
			$where.= " and (c.first_name ='".$passenger_name."' or (c.middle_name ='".$passenger_name."') or (c.last_name ='".$passenger_name."')) ";
		}
	
		if($sel_date_type!= '' &&  $fadte!= '' &&  $toadte!= ''){
			 if($sel_date_type==1){
				 echo $where.= " and h.check_in between '".$fadte."'  and '".$toadte."' ";
			 }
			 else{
			 $where.= " and h.voucher_date between '".$fadte."'  and '".$toadte."' ";
			 }
		}
		//echo $booking_type; exit;
		
		
		if ($branch_id == 0) {
			$where.=" and t.user_id = $agent_id AND t.user_type = 2";
			$select = "SELECT h.check_in, h.check_out, h.cancel_tilldate, t.booking_number, t.amount, t.created_date, CONCAT(c.first_name, ' ', c.middle_name, ' ', c.last_name) as name FROM hotel_booking_info h left join transaction_details t on h.customer_contact_details_id = t.customer_contact_details_id left join customer_contact_details c on c.customer_contact_details_id = h.customer_contact_details_id $where";
		} else {
			$where.=" and t.user_type = 3 and t.branch_id = $branch_id";
				$select = "SELECT h.check_in, h.check_out, h.cancel_tilldate, t.booking_number, t.amount, t.created_date, CONCAT(c.first_name, ' ', c.middle_name, ' ', c.last_name) as name FROM hotel_booking_info h left join transaction_details t on h.customer_contact_details_id = t.customer_contact_details_id left join customer_contact_details c on c.customer_contact_details_id = h.customer_contact_details_id $where";
		}
			
		
				 
		//echo $select; exit;
					
		$query = $this->db->query($select);
		
		//echo $this->db->last_query();exit;
		
		if ( $query->num_rows > 0 )
		{ 
			return $query->result();
		}
		return false;
	
	}	
	
	function search_branch_booking_details($booking_number = '', $passenger_name = '', $booking_status, $sel_date_type = '', $fdate = '',$todate = '',$agent_id)
	{

		$where='';
		
		/*if(empty($booking_type)){
			$booking_type = 'my_booking';
		}*/
		
		//echo $booking_type;
	
		if(!empty($booking_status)){
			$where.= " where t.status = '$booking_status'";
		} else {
			$where.= " where t.status = 'confirmed'";
		}
		
		
		if($booking_number != '') {
			$where.= " and t.booking_number ='".$booking_number."' ";
		}
	   
	  
		if($passenger_name!=''){
			$where.= " and (c.first_name ='".$passenger_name."' or (c.middle_name ='".$passenger_name."') or (c.last_name ='".$passenger_name."')) ";
		}
	
		if($sel_date_type!= '' &&  $fadte!= '' &&  $toadte!= ''){
			 if($sel_date_type==1){
				 echo $where.= " and h.check_in between '".$fadte."'  and '".$toadte."' ";
			 }
			 else{
			 $where.= " and h.voucher_date between '".$fadte."'  and '".$toadte."' ";
			 }
		}
		//echo $booking_type; exit;
		
		
			
		$where.=" AND t.user_type = 3 and bd.agent_id = $agent_id";
	
		 $select = "SELECT h.check_in, h.check_out, h.cancel_tilldate, t.booking_number, t.amount, t.created_date, CONCAT(c.first_name, ' ', c.middle_name, ' ', c.last_name) as name FROM hotel_booking_info h left join transaction_details t on h.customer_contact_details_id = t.customer_contact_details_id left join customer_contact_details c on c.customer_contact_details_id = h.customer_contact_details_id LEFT JOIN agent_branch_details bd ON bd.branch_id = t.branch_id $where";
		
				 
		//echo $select; exit;
					
		$query = $this->db->query($select);
		
		//echo $this->db->last_query();exit;
		
		if ( $query->num_rows > 0 )
		{ 
			return $query->result();
		}
		return false;
	
	}	
	
	function getAgentDepositRequest($agent_id)
	{
		$select = "SELECT * FROM agent_deposit WHERE agent_id = $agent_id";
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;	
		}
	}
	
	function add_agent_deposit_request($agent_id, $amount_credit, $deposited_date, $deposit_type, $deposited_bank, $deposited_branch, $deposited_city, $remarks, $transaction_id='', $cheque_date = '', $cheque_number='')
	{
	
		$data = array(
			'agent_id' => $agent_id,
			'amount_credit' => $amount_credit,
			'deposited_date' => $deposited_date,
			'deposit_type' => $deposit_type,
			'bank' => $deposited_bank,
			'branch' => $deposited_branch,
			'city' => $deposited_city,
			'transaction_id' => $transaction_id,
			'cheque_date' => $cheque_date,
			'cheque_number' => $cheque_number,
			'remarks' => $remarks,
			'status' => 'Pending'
			);
			
		//$this->db->insert('agent_deposit', $data);
		//$id = $this->db->insert_id();
		if ($this->db->insert('agent_deposit', $data)) {
			return true;
		} else {
			return false;
		}

	}
	
	function update_markup($agent_id, $markup)
	{
	
		$data = array(
			'markup' => $markup
			);
			
		$where = "agent_id = $agent_id";
		if ($this->db->update('agent', $data, $where)) {
			return true;
		} else {
			return false;
		}

	}
	
	function get_markup($agent_id)
	{
		$select = "SELECT markup FROM agent WHERE agent_id = $agent_id";
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->row();
		} else {
			return false;	
		}
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
