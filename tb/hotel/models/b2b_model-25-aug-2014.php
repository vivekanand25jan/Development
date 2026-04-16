<?php 
class B2b_Model extends CI_Model {

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
			'agent_mode' => 'credit',
			'agent_type' => 2
			);
			
			$this->db->set('register_date', 'NOW()', FALSE); 
		
		$this->db->insert('agent', $data);
		$id = $this->db->insert_id();
		if (!empty($id)) {
			
					$city_array=array(198,844,4977,4073,337,2087,481,5770,3621,4239,3131,3850,435,1753,3257,4443,481,5770,3621,4239);
		$data1=array();
		for($k=0;$k<16;$k++)
		{
			$data1 = array(
			'agent_id' => $id,
			'citi_id' => $city_array[$k],
			);
			
		$this->db->insert('top_cities', $data1);
		$this->db->insert_id();
		}
			return true;
		} else {
			return false;
		}

	}
	
	function check_agent_login($email,$password)
	{		
		
		//$select = "select agent_id, email_id, name, agent_type, branch_id from agent where email_id ='".$email."' AND password  ='".sha1($password)."' AND active = 1";
		
		$select = "select * from agent where email_id = ? AND password  = ? AND active = 1";
	 
		 $query=$this->db->query($select, array($email, $password));
		 
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
				  'markup' => $row->markup,
				  'parent_id' => $row->parent_id,
				  'address' => $row->address,
				  'city' => $row->city,
				  'postal_code' => $row->postal_code,
				  'mobile' => $row->mobile
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
				
				
			  
		   }
		   return true;
		   
		} 
		else
		{
			return false;
		}
	}

function check_agent_login_cc($email,$password)
	{		
		
		//$select = "select agent_id, email_id, name, agent_type, branch_id from agent where email_id ='".$email."' AND password  ='".sha1($password)."' AND active = 1";
		
		$select = "select * from sub_admin where login_id = ? AND password  = ? AND status = 1";
	 
		 $query=$this->db->query($select, array($email, $password));
		 
		// echo $this->db->last_query(); exit;
		if ($query->num_rows() > 0)
		{
		   foreach ($query->result() as $row)
		   {
				
			  $sessionUserInfo = array(
                   'cc_id'  => $row->user_id,
				    'cc_login_id'  => $row->login_id,
				   
				   'cc_email_id'  => $row->email,
				   'cc_name'  => $row->first_name,
				   'cc_phone' => $row->phone,
				   'cc_limit' => $row->limit,
				  'cc_sub_admin_type' => $row->sub_admin_type,
				 
				  'cc_address' => $row->address,
				  'cc_city' => $row->city,
				  'cc_country' => $row->country,
				  'cc_postal_code' => $row->post_code,
				  'cc_mobile' => $row->mobile
               );
			   $sessionUserInfo['cc_logged_in'] = TRUE;
			  /* if ($row->agent_type == 2) {
					$sessionUserInfo['cc_logged_in'] = TRUE;
					$sessionUserInfo['staff_logged_in'] = FALSE;
			   } else {
					$sessionUserInfo['cc_logged_in'] = FALSE;
					$sessionUserInfo['staff_logged_in'] = TRUE;
			   }*/
			   
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
	
		function check_agent_password()
	{		
		
		//$select = "select agent_id, email_id, name, agent_type, branch_id from agent where email_id ='".$email."' AND password  ='".sha1($password)."' AND active = 1";
		$id=$this->session->userdata('email_id');
		$select = "select * from agent where email_id = '$id' ";
	 
		 $query=$this->db->query($select);
		 
		// echo $this->db->last_query(); exit;
		if ($query->num_rows() > 0)
		{
		   
		   return $query->row();
		   
		} 
		else
		{
			return '';
		}
	}
	function getAgentlist_cc($id)
	{		
		
		//$select = "select agent_id, email_id, name, agent_type, branch_id from agent where email_id ='".$email."' AND password  ='".sha1($password)."' AND active = 1";
	$select = "SELECT m.company_name, m.email_id, m.name, m.agent_id FROM agent m, sub_admin_list b WHERE b.cc_id = '$id' and  m.agent_id = b.agent_id ";
		
		//$select = "select * from sub_admin_list h join sub_admin t on  where cc_id = '$id' and h.cc_id = t.cc_id ";
	 
		 $query=$this->db->query($select);
		 
		// echo $this->db->last_query(); exit;
		if ($query->num_rows() > 0)
		{
		   
		   return $query->result();
		   
		} 
		else
		{
			return '';
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
		else
		{
			return 0;
		}
	}
	function getAgentAccInfo_cc_balance($agent_id)
	{		
		$now_date =  date("Y-m-d H:i:s");
		
		$select = "SELECT balance FROM sub_admin_history WHERE from_date < '$now_date' and to_date > '$now_date' and cc_id='$agent_id' ";
		$query=$this->db->query($select);
		//echo $this->db->last_query(); exit;
		if ($query->num_rows() > 0)
		{
			$a =  $query->row();
			if( $a->balance =='')
			{
				$select = "SELECT * FROM sub_admin WHERE user_id = $agent_id limit 1";
				$query=$this->db->query($select);
				if ($query->num_rows() > 0)
				{
					$d= $query->row();
					return $d->limit;
				}
			}
			else
			{
			return $a->balance;
			}
		}
		else
		{
			$select = "SELECT * FROM sub_admin WHERE user_id = $agent_id limit 1";
				$query=$this->db->query($select);
				if ($query->num_rows() > 0)
				{
					$d= $query->row();
					return $d->limit;
				}
		}
	}
	function getAgentAccInfo_cc($agent_id)
	{		
		
		$select = "SELECT * FROM sub_admin WHERE user_id = $agent_id limit 1";
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
			//$select = "SELECT b.balance_credit, b.last_credit, a.branch_name FROM agent_branch_details a left join branch_acc_info b on a.branch_id = b.branch_id and a.agent_id = $agent_id";
			$select = "SELECT b.balance_credit, b.last_credit, a.branch_name FROM agent_branch_details a inner join branch_acc_info b on a.branch_id=b.branch_id and a.agent_id = $agent_id";
		}
		$query=$this->db->query($select);
	//	echo $this->db->last_query(); exit;
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
	function get_api_name($city)
	{
	    $this->db->select('*');
		$this->db->from('api');
		$this->db->where('api_id',$city);
		$query = $this->db->get();
//echo $this->db->last_query();exit;
		
		if($query->num_rows() == 0 )
		{
		   return '';   
		  }else{
		  $a = $query->row(); 
		   return $a->api_name;
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
	
	function get_agent_type($agent_type_id)
	{
	    $select = "SELECT * FROM agent_type WHERE agent_id = $agent_type_id limit 1";
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
		if(isset($_FILES['agent_logo']['name']) && $_FILES['agent_logo']['name'] != '')
		{
			$agent_logo = $_FILES['agent_logo']['name'];
			$target_path = 	$_SERVER['DOCUMENT_ROOT'] . '/wdm/travel_bay/agent_logos';
			$target_path = 	rtrim($target_path,'/').'/'.basename($_FILES['agent_logo']['name']); 
			
			if(move_uploaded_file($_FILES['agent_logo']['tmp_name'], $target_path)) {
			//echo "The file ".  basename( $_FILES['hotel_logo']['name']). " has been uploaded";
			} else{
			//echo "There was an error uploading the file, please try again!";
			}
		
		$data = array(
			'email_id' => $email_id,
			'name' => $name,
			'company_name' => $company_name,
			'address' => $address,
			'country' => $country,
			'city' => $city,
			'postal_code' => $postal_code,
			'office_phone' => $office_phone,
			'mobile' => $mobile_no,
			'agent_logo' => $agent_logo
			);
		}
		else
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
		}
			
		
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
			'password' => $password
		);
		
		$where = "password = '$old_password' AND email_id = '$email_id'";
			
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
			$qry = "insert into branch_acc_info set branch_id = $id, balance_credit = 0, last_credit = 0";
		$this->db->query($qry);
			return true;
		} else {
			return false;
		}

	}
function getsupportinfo($cc_id,$status='')
	{
		if($status == '')
		{
		$select = "SELECT * FROM support_ticket t inner join agent a on t.agent_id = a.agent_id and t.cc_id=$cc_id and sub_id=0";
		}
		else
		{
			$select = "SELECT * FROM support_ticket t inner join agent a on t.agent_id = a.agent_id and t.status='$status' and t.cc_id=$cc_id and sub_id=0";
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
		function getsupportinfo_p($cc_id)
	{
		
			$select = "SELECT * FROM support_ticket t inner join agent a on t.agent_id = a.agent_id and t.status!='Closed' and t.cc_id=$cc_id and sub_id=0";
		
		
		//echo $select;exit;
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}
	}
		function getsupportinfo_c($cc_id)
	{
		
			$select = "SELECT * FROM support_ticket t inner join agent a on t.agent_id = a.agent_id and t.status='Closed' and t.cc_id=$cc_id and sub_id=0";
		
		
		//echo $select;exit;
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}
	}
	function getsupportinfo_details($id)
	{
		
		$select = "SELECT * FROM support_ticket t inner join agent a on t.agent_id = a.agent_id and t.ticket_id=$id";
		
		
		
		//echo $select;exit;
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->row();
		} else {
			return false;
		}
	}
	function add_ticket($agent_id, $catacery, $subject, $res_no, $message)
	{
	$select = "SELECT * FROM agent WHERE agent_id = $agent_id limit 1";
		$query=$this->db->query($select);
		
			$a =  $query->row();
		$cc_id = $a->call_center_id;
		
		$data = array(
			'agent_id' => $agent_id,
			'catacery' => $catacery,
			'subject' => $subject,
			'res_no' => $res_no,
			'message' => $message,
			'status' => 'Pending',
			'cc_id' => $cc_id,
			'process' => 'Agent',
			'process2' => 'Agent'
			
			);
			
			$this->db->set('created_date', 'NOW()', FALSE); 
			$this->db->set('update_date', 'NOW()', FALSE); 
		
		$this->db->insert('support_ticket', $data);
		$id = $this->db->insert_id();
		if (!empty($id)) {
			
			return true;
		} else {
			return false;
		}

	}
	function update_ticket($agent_id,$ticket_id,$messagee)
	{
		$data = array(
			'status' => 'On Hold',
				'process2' => 'Call Center'
			
			);
			$this->db->set('update_date', 'NOW()', FALSE); 
		$where = "ticket_id  = $ticket_id";
		$this->db->update('support_ticket', $data, $where);
		
		

		$data1 = array(
			'agent_id' => $agent_id,
			'sub_id' => $ticket_id,
			'message' => $messagee,
			'process' => 'Call Center'
			
			);
			
		$this->db->insert('support_ticket', $data1);
		$id = $this->db->insert_id();
		if (!empty($id)) {
			
			return true;
		} else {
			return false;
		}

	}
	
	function update_ticket_agent($agent_id,$ticket_id,$messagee)
	{
		$data = array(
			'status' => 'Pending',
			'process2' => 'Agent'
			
			);
			$this->db->set('update_date', 'NOW()', FALSE); 
		$where = "ticket_id  = $ticket_id";
		$this->db->update('support_ticket', $data, $where);
		
		

		$data1 = array(
			'agent_id' => $agent_id,
			'sub_id' => $ticket_id,
			'message' => $messagee,
			'process' => 'Agent'
			
			);
			
		$this->db->insert('support_ticket', $data1);
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
	function search_tickets($agent_id, $status='')
	{		
		
		if($status == '')
		{
			$select = "SELECT * FROM support_ticket WHERE agent_id  = $agent_id  and sub_id=0";
		}
		else
		{
			$select = "SELECT * FROM support_ticket WHERE agent_id  = $agent_id and status='$status'  and sub_id=0";
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
	function search_tickets_p($agent_id, $status='')
	{		
		
	
			$select = "SELECT * FROM support_ticket WHERE agent_id  = $agent_id and status!='Closed'  and sub_id=0";
		
		
		//echo $select;exit;
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}
	}
	function search_tickets_c($agent_id, $status='')
	{		
		
			$select = "SELECT * FROM support_ticket WHERE agent_id  = $agent_id and status='Closed'  and sub_id=0";
		
		
		//echo $select;exit;
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->result();
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
			'password' => $password,
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
	
	function __search_booking_details($booking_number = '', $passenger_name = '', $booking_status, $sel_date_type = '', $fdate = '',$todate = '', $agent_id, $booking_type,$branch_id)
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
	
	function __search_my_booking_details($booking_number = '', $passenger_name = '', $booking_status = '', $sel_date_type = '', $fdate = '',$todate = '', $agent_id,$branch_id=0)
	{

		$where='';
	
		
		if(!empty($booking_status)){
			$where.= " t.status = '$booking_status'";
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
		
		
		if ($branch_id == 0) {
			//$where.=" and t.user_id = $agent_id AND t.user_type = 2";
			if (!empty($where)) {
				$where='where ' . $where . " and t.user_id = $agent_id AND t.user_type = 2";
			} else {
				$where="where t.user_id = $agent_id AND t.user_type = 2";
			}
			$select = "SELECT DATEDIFF(h.check_in, CURDATE()) as booking_day_diff, h.check_in, h.check_out, h.cancel_tilldate, t.booking_number, t.status, t.api_id,t.prn_no, t.amount, t.net_amount, t.created_date, t.hotel_booking_id, CONCAT(c.first_name, ' ', c.middle_name, ' ', c.last_name) as name FROM hotel_booking_info h left join transaction_details t on h.customer_contact_details_id = t.customer_contact_details_id left join customer_contact_details c on c.customer_contact_details_id = h.customer_contact_details_id $where";
		} else {
			//$where.=" and t.user_type = 3 and t.branch_id = $branch_id";
			if (!empty($where)) {
				$where='where ' . $where . " and t.user_type = 3 and t.branch_id = $branch_id";
			} else {
				$where="where t.user_type = 3 and t.branch_id = $branch_id";
			}
				$select = "SELECT DATEDIFF(h.check_in, CURDATE()) as booking_day_diff, h.check_in, h.check_out, h.cancel_tilldate, t.booking_number, t.status, t.api_id,t.prn_no, t.amount, t.net_amount, t.created_date, t.hotel_booking_id, CONCAT(c.first_name, ' ', c.middle_name, ' ', c.last_name) as name FROM hotel_booking_info h left join transaction_details t on h.customer_contact_details_id = t.customer_contact_details_id left join customer_contact_details c on c.customer_contact_details_id = h.customer_contact_details_id $where";
		}
			
		
				 
		//echo $select; //exit;
					
		$query = $this->db->query($select);
		
		//echo $this->db->last_query();exit;
		
		if ( $query->num_rows > 0 )
		{ 
			return $query->result();
		}
		return false;
	
	}	
	
	function __search_branch_booking_details($booking_number = '', $passenger_name = '', $booking_status = '', $sel_date_type = '', $fdate = '', $todate = '',$agent_id)
	{

		$where='';
		

		
		if(!empty($booking_status)){
			$where.= " t.status = '$booking_status'";
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
		//echo $booking_type; exit;
		
		
		if (!empty($where)) {
				$where='where ' . $where . " AND t.user_type = 3 and bd.agent_id = $agent_id";
			} else {
				$where="where t.user_type = 3 and bd.agent_id = $agent_id";
			}
			
	
		 $select = "SELECT DATEDIFF(h.check_in, CURDATE()) as booking_day_diff, t.status, h.check_in, h.check_out, h.cancel_tilldate, t.booking_number, t.amount, t.api_id,t.prn_no, t.net_amount, t.created_date, t.hotel_booking_id, CONCAT(c.first_name, ' ', c.middle_name, ' ', c.last_name) as name FROM hotel_booking_info h left join transaction_details t on h.customer_contact_details_id = t.customer_contact_details_id left join customer_contact_details c on c.customer_contact_details_id = h.customer_contact_details_id LEFT JOIN agent_branch_details bd ON bd.branch_id = t.branch_id $where";
		
				 
		//echo $select; //exit;
					
		$query = $this->db->query($select);
		
		//echo $this->db->last_query();exit;
		
		if ( $query->num_rows > 0 )
		{ 
			return $query->result();
		}
		return false;
	
	}	
	
	function search_my_booking_details($booking_number = '', $passenger_name = '', $booking_status = '', $sel_date_type = '', $fdate = '',$todate = '', $agent_id,$branch_id=0)
	{

		$where='';
//	echo $booking_number;exit;
		
		if(!empty($booking_status)){
			$where.= " t.status = '$booking_status'";
		}
		
		
		if($booking_number != '') {
			if (empty($where)) {
				$where.= " t.prn_no ='".$booking_number."' ";
			} else {
				$where.= " and t.prn_no ='".$booking_number."' ";
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
		
		
		if ($branch_id == 0) {
			//$where.=" and t.user_id = $agent_id AND t.user_type = 2";
			if (!empty($where)) {
				//$where='where ' . $where . " and t.user_id = $agent_id AND t.user_type = 2";
				$where= $where . " and t.user_id = $agent_id AND t.user_type = 2";
			} else {
				//$where="where t.user_id = $agent_id AND t.user_type = 2";
				$where=" t.user_id = $agent_id AND t.user_type = 2";
			}
			if (!empty($where)) {
				$where=' and '.$where;
			}
			
			$where.=' and t.booking_number !=""';
			
						
			//$select = "SELECT DATEDIFF(h.check_in, CURDATE()) as booking_day_diff, h.check_in, h.check_out, h.cancel_tilldate, t.booking_number, t.status, t.amount, t.net_amount, t.created_date, t.hotel_booking_id, CONCAT(c.first_name, ' ', c.middle_name, ' ', c.last_name) as name FROM hotel_booking_info h left join transaction_details t on h.customer_contact_details_id = t.customer_contact_details_id left join customer_contact_details c on c.customer_contact_details_id = h.customer_contact_details_id $where";
			
			$select = "SELECT t.*, DATEDIFF(h.check_in, CURDATE()) as booking_day_diff,h.api, h.check_in, h.check_out,h.api, h.cancel_tilldate,  CONCAT(c.first_name, ' ', c.middle_name, ' ', c.last_name) as name , h.nights as booking_nights FROM hotel_booking_info h, transaction_details t, customer_contact_details c where h.customer_contact_details_id = t.customer_contact_details_id and c.customer_contact_details_id = h.customer_contact_details_id $where";
			
		} else {
			//$where.=" and t.user_type = 3 and t.branch_id = $branch_id";
			if (!empty($where)) {
				//$where='where ' . $where . " and t.user_type = 3 and t.branch_id = $branch_id";
				$where=$where . " and t.user_type = 3 and t.branch_id = $branch_id";
			} else {
				//$where="where t.user_type = 3 and t.branch_id = $branch_id";
				$where=" t.user_type = 3 and t.branch_id = $branch_id";
			}
			if (!empty($where)) {
				$where=' and '.$where;
			}
			
			$where.=' and t.booking_number !=""';
			
			//$select = "SELECT DATEDIFF(h.check_in, CURDATE()) as booking_day_diff, h.check_in, h.check_out, h.cancel_tilldate, t.booking_number, t.status, t.amount, t.net_amount, t.created_date, t.hotel_booking_id, CONCAT(c.first_name, ' ', c.middle_name, ' ', c.last_name) as name FROM hotel_booking_info h left join transaction_details t on h.customer_contact_details_id = t.customer_contact_details_id left join customer_contact_details c on c.customer_contact_details_id = h.customer_contact_details_id $where";
			
			$select = "SELECT t.*, DATEDIFF(h.check_in, CURDATE()) as booking_day_diff,h.api, h.check_in, h.check_out, h.cancel_tilldate,  CONCAT(c.first_name, ' ', c.middle_name, ' ', c.last_name) as name FROM hotel_booking_info h, transaction_details t, customer_contact_details c where h.customer_contact_details_id = t.customer_contact_details_id and c.customer_contact_details_id = h.customer_contact_details_id $where";
		}
			
		
				 
		//echo $select; //exit;
					
		$query = $this->db->query($select);
	//echo $this->db->last_query();exit;
		
	//	echo $this->db->last_query();exit;
		
		if ( $query->num_rows > 0 )
		{ 
			return $query->result();
		}
		return false;
	
	}	
		function search_my_booking_details_b($booking_number = '', $passenger_name = '', $booking_status = '', $sel_date_type = '', $fdate = '',$todate = '', $agent_id,$branch_id=0)
	{

		$where='';
//	echo $booking_number;exit;
		
		if(!empty($booking_status)){
			$where.= " t.status = '$booking_status'";
		}
		
		
		if($booking_number != '') {
			if (empty($where)) {
				$where.= " t.prn_no ='".$booking_number."' ";
			} else {
				$where.= " and t.prn_no ='".$booking_number."' ";
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
		
		
		if ($branch_id == 0) {
			//$where.=" and t.user_id = $agent_id AND t.user_type = 2";
			if (!empty($where)) {
				//$where='where ' . $where . " and t.user_id = $agent_id AND t.user_type = 2";
				$where= $where . " and t.user_id = $agent_id AND t.branch_id != 0" ;
			} else {
				//$where="where t.user_id = $agent_id AND t.user_type = 2";
				$where=" t.user_id = $agent_id AND t.branch_id != 0";
			}
			if (!empty($where)) {
				$where=' and '.$where;
			}
			
			$where.=' and t.booking_number !=""';
			
						
			//$select = "SELECT DATEDIFF(h.check_in, CURDATE()) as booking_day_diff, h.check_in, h.check_out, h.cancel_tilldate, t.booking_number, t.status, t.amount, t.net_amount, t.created_date, t.hotel_booking_id, CONCAT(c.first_name, ' ', c.middle_name, ' ', c.last_name) as name FROM hotel_booking_info h left join transaction_details t on h.customer_contact_details_id = t.customer_contact_details_id left join customer_contact_details c on c.customer_contact_details_id = h.customer_contact_details_id $where";
			
			$select = "SELECT t.*, DATEDIFF(h.check_in, CURDATE()) as booking_day_diff,h.api, h.check_in, h.check_out,h.api, h.cancel_tilldate,  CONCAT(c.first_name, ' ', c.middle_name, ' ', c.last_name) as name FROM hotel_booking_info h, transaction_details t, customer_contact_details c where h.customer_contact_details_id = t.customer_contact_details_id and c.customer_contact_details_id = h.customer_contact_details_id $where";
			
		} else {
			//$where.=" and t.user_type = 3 and t.branch_id = $branch_id";
			if (!empty($where)) {
				//$where='where ' . $where . " and t.user_type = 3 and t.branch_id = $branch_id";
				$where=$where . " and t.user_type = 3 and t.branch_id = $branch_id";
			} else {
				//$where="where t.user_type = 3 and t.branch_id = $branch_id";
				$where=" t.user_type = 3 and t.branch_id = $branch_id";
			}
			if (!empty($where)) {
				$where=' and '.$where;
			}
			
			$where.=' and t.booking_number !=""';
			
			//$select = "SELECT DATEDIFF(h.check_in, CURDATE()) as booking_day_diff, h.check_in, h.check_out, h.cancel_tilldate, t.booking_number, t.status, t.amount, t.net_amount, t.created_date, t.hotel_booking_id, CONCAT(c.first_name, ' ', c.middle_name, ' ', c.last_name) as name FROM hotel_booking_info h left join transaction_details t on h.customer_contact_details_id = t.customer_contact_details_id left join customer_contact_details c on c.customer_contact_details_id = h.customer_contact_details_id $where";
			
			$select = "SELECT t.*, DATEDIFF(h.check_in, CURDATE()) as booking_day_diff,h.api, h.check_in, h.check_out,h.api, h.cancel_tilldate,  CONCAT(c.first_name, ' ', c.middle_name, ' ', c.last_name) as name FROM hotel_booking_info h, transaction_details t, customer_contact_details c where h.customer_contact_details_id = t.customer_contact_details_id and c.customer_contact_details_id = h.customer_contact_details_id $where";
		}
			
		
				 
		//echo $select; //exit;
					
		$query = $this->db->query($select);
		
	//	echo $this->db->last_query();exit;
		
		if ( $query->num_rows > 0 )
		{ 
			return $query->result();
		}
		return false;
	
	}	
	function search_my_booking_details_update($booking_number = '', $passenger_name = '', $booking_status = '', $sel_date_type = '', $fdate = '',$todate = '', $agent_id,$branch_id=0)
	{

		$where='';
	
		
		if(!empty($booking_status)){
			$where.= " t.status = '$booking_status'";
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
	
		if( $fdate!= '' &&  $todate!= ''){
			$and = '';
			if (!empty($where)) {
				$and = ' and';
			}
			
				 $where.= $and . " h.check_in between '".$fdate."'  and '".$todate."' ";
			
		}
		
			$agent_id = $this->session->userdata('agent_id');
		if ($branch_id == 0) {
			//$where.=" and t.user_id = $agent_id AND t.user_type = 2";
			if (!empty($where)) {
				//$where='where ' . $where . " and t.user_id = $agent_id AND t.user_type = 2";
			
				$where= $where . " and t.user_id = $agent_id AND t.user_type = 2";
			} else {
				//$where="where t.user_id = $agent_id AND t.user_type = 2";
				$where=" t.user_id = $agent_id AND t.user_type = 2";
			}
			if (!empty($where)) {
				$where=' and '.$where;
			}
			
			$where.=' and t.booking_number !=""';
			
						
			//$select = "SELECT DATEDIFF(h.check_in, CURDATE()) as booking_day_diff, h.check_in, h.check_out, h.cancel_tilldate, t.booking_number, t.status, t.amount, t.net_amount, t.created_date, t.hotel_booking_id, CONCAT(c.first_name, ' ', c.middle_name, ' ', c.last_name) as name FROM hotel_booking_info h left join transaction_details t on h.customer_contact_details_id = t.customer_contact_details_id left join customer_contact_details c on c.customer_contact_details_id = h.customer_contact_details_id $where";
			
			$select = "SELECT t.*, DATEDIFF(h.check_in, CURDATE()) as booking_day_diff, h.check_in, h.check_out, h.cancel_tilldate,  CONCAT(c.first_name, ' ', c.middle_name, ' ', c.last_name) as name FROM hotel_booking_info h, transaction_details t, customer_contact_details c where h.customer_contact_details_id = t.customer_contact_details_id and c.customer_contact_details_id = h.customer_contact_details_id $where";
			
		} else {
			//$where.=" and t.user_type = 3 and t.branch_id = $branch_id";
			if (!empty($where)) {
				//$where='where ' . $where . " and t.user_type = 3 and t.branch_id = $branch_id";
				$where=$where . " and t.user_type = 3 and t.branch_id = $branch_id";
			} else {
				//$where="where t.user_type = 3 and t.branch_id = $branch_id";
				$where=" t.user_type = 3 and t.branch_id = $branch_id";
			}
			if (!empty($where)) {
				$where=' and '.$where;
			}
			
			$where.=' and t.booking_number !=""';
			
			//$select = "SELECT DATEDIFF(h.check_in, CURDATE()) as booking_day_diff, h.check_in, h.check_out, h.cancel_tilldate, t.booking_number, t.status, t.amount, t.net_amount, t.created_date, t.hotel_booking_id, CONCAT(c.first_name, ' ', c.middle_name, ' ', c.last_name) as name FROM hotel_booking_info h left join transaction_details t on h.customer_contact_details_id = t.customer_contact_details_id left join customer_contact_details c on c.customer_contact_details_id = h.customer_contact_details_id $where";
			
			$select = "SELECT t.*, DATEDIFF(h.check_in, CURDATE()) as booking_day_diff, h.check_in, h.check_out, h.cancel_tilldate,  CONCAT(c.first_name, ' ', c.middle_name, ' ', c.last_name) as name FROM hotel_booking_info h, transaction_details t, customer_contact_details c where h.customer_contact_details_id = t.customer_contact_details_id and c.customer_contact_details_id = h.customer_contact_details_id $where";
		}
			
		
				 
		//echo $select; //exit;
					
		$query = $this->db->query($select);
		
		//echo $this->db->last_query();exit;
		
		if ( $query->num_rows > 0 )
		{ 
			return $query->result();
		}
		return false;
	
	}	
	
	function search_branch_booking_details($booking_number = '', $passenger_name = '', $booking_status = '', $sel_date_type = '', $fdate = '', $todate = '',$agent_id)
	{

		$where='';
		

		
		if(!empty($booking_status)){
			$where.= " t.status = '$booking_status'";
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
		//echo $booking_type; exit;
		
		
		if (!empty($where)) {
				//$where='where ' . $where . " AND t.user_type = 3 and bd.agent_id = $agent_id";
				$where=$where . " AND t.user_type = 3 and bd.agent_id = $agent_id";
			} else {
				//$where="where t.user_type = 3 and bd.agent_id = $agent_id";
				$where=" t.user_type = 3 and bd.agent_id = $agent_id";
			}
			
			if (!empty($where)) {
				$where=' and '.$where;
			}
			
			$where.=' and t.booking_number !=""';
			
	
		 
		 //$select = "SELECT DATEDIFF(h.check_in, CURDATE()) as booking_day_diff, t.status, h.check_in, h.check_out, h.cancel_tilldate, t.booking_number, t.amount, t.net_amount, t.created_date, t.hotel_booking_id, CONCAT(c.first_name, ' ', c.middle_name, ' ', c.last_name) as name FROM hotel_booking_info h left join transaction_details t on h.customer_contact_details_id = t.customer_contact_details_id left join customer_contact_details c on c.customer_contact_details_id = h.customer_contact_details_id LEFT JOIN agent_branch_details bd ON bd.branch_id = t.branch_id $where";
		 
		 $select = "SELECT t.*, DATEDIFF(h.check_in, CURDATE()) as booking_day_diff, h.check_in,h.api, h.check_out, h.cancel_tilldate,  CONCAT(c.first_name, ' ', c.middle_name, ' ', c.last_name) as name FROM hotel_booking_info h, transaction_details t, customer_contact_details c, agent_branch_details bd where h.customer_contact_details_id = t.customer_contact_details_id and c.customer_contact_details_id = h.customer_contact_details_id and bd.branch_id = t.branch_id $where";
		
				 
		//echo $select; //exit;
					
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
		function xml2array($xmlStr, $get_attributes = 1, $priority = 'tag')
{
	
		// I renamed $url to $xmlStr, $url was the first parameter in the method if you
		// want to load from a URL then rename $xmlStr to $url everywhere in this method
	    $contents = "";
	    if (!function_exists('xml_parser_create'))
	    {
	        return array ();
	    }
	    $parser = xml_parser_create('');
		// commented out since I already have the xml text stored in memory 
		// this reads XML in from a URL
		/*	    
		if (!($fp = @ fopen($url, 'rb')))
	    {
	        return array ();
	    }
	    while (!feof($fp))
	    {
	        $contents .= fread($fp, 8192);
	    }
	    fclose($fp);
		*/
	    xml_parser_set_option($parser, XML_OPTION_TARGET_ENCODING, "UTF-8");
	    xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, 0);
	    xml_parser_set_option($parser, XML_OPTION_SKIP_WHITE, 1);
	    xml_parse_into_struct($parser, trim($xmlStr), $xml_values);
	    xml_parser_free($parser);
	    if (!$xml_values)
	        return; //Hmm...
	    $xml_array = array ();
	    $parents = array ();
	    $opened_tags = array ();
	    $arr = array ();
	    $current = & $xml_array;
	    $repeated_tag_index = array ();
	    foreach ($xml_values as $data)
	    {
	        unset ($attributes, $value);
	        extract($data);
	        $result = array ();
	        $attributes_data = array ();
	        if (isset ($value))
	        {
	            if ($priority == 'tag')
	                $result = $value;
	            else
	                $result['value'] = $value;
	        }
	        if (isset ($attributes) and $get_attributes)
	        {
	            foreach ($attributes as $attr => $val)
	            {
	                if ($priority == 'tag')
	                    $attributes_data[$attr] = $val;
	                else
	                    $result['attr'][$attr] = $val; //Set all the attributes in a array called 'attr'
	            }
	        }
	        if ($type == "open")
	        {
	            $parent[$level -1] = & $current;
	            if (!is_array($current) or (!in_array($tag, array_keys($current))))
	            {
	                $current[$tag] = $result;
	                if ($attributes_data)
	                    $current[$tag . '_attr'] = $attributes_data;
	                $repeated_tag_index[$tag . '_' . $level] = 1;
	                $current = & $current[$tag];
	            }
	            else
	            {
	                if (isset ($current[$tag][0]))
	                {
	                    $current[$tag][$repeated_tag_index[$tag . '_' . $level]] = $result;
	                    $repeated_tag_index[$tag . '_' . $level]++;
	                }
	                else
	                {
	                    $current[$tag] = array (
	                        $current[$tag],
	                        $result
	                    );
	                    $repeated_tag_index[$tag . '_' . $level] = 2;
	                    if (isset ($current[$tag . '_attr']))
	                    {
	                        $current[$tag]['0_attr'] = $current[$tag . '_attr'];
	                        unset ($current[$tag . '_attr']);
	                    }
	                }
	                $last_item_index = $repeated_tag_index[$tag . '_' . $level] - 1;
	                $current = & $current[$tag][$last_item_index];
	            }
	        }
	        elseif ($type == "complete")
	        {
	            if (!isset ($current[$tag]))
	            {
	                $current[$tag] = $result;
	                $repeated_tag_index[$tag . '_' . $level] = 1;
	                if ($priority == 'tag' and $attributes_data)
	                    $current[$tag . '_attr'] = $attributes_data;
	            }
	            else
	            {
	                if (isset ($current[$tag][0]) and is_array($current[$tag]))
	                {
	                    $current[$tag][$repeated_tag_index[$tag . '_' . $level]] = $result;
	                    if ($priority == 'tag' and $get_attributes and $attributes_data)
	                    {
	                        $current[$tag][$repeated_tag_index[$tag . '_' . $level] . '_attr'] = $attributes_data;
	                    }
						
	                    $repeated_tag_index[$tag . '_' . $level]++;
	                }
	                else
	                {
	                    $current[$tag] = array (
	                        $current[$tag],
	                        $result
	                    );
	                    $repeated_tag_index[$tag . '_' . $level] = 1;
	                    if ($priority == 'tag' and $get_attributes)
	                    {
	                        if (isset ($current[$tag . '_attr']))
	                        {
	                            $current[$tag]['0_attr'] = $current[$tag . '_attr'];
	                            unset ($current[$tag . '_attr']);
	                        }
	                        if ($attributes_data)
	                        {
	                            $current[$tag][$repeated_tag_index[$tag . '_' . $level] . '_attr'] = $attributes_data;
	                        }
	                    }
	                    $repeated_tag_index[$tag . '_' . $level]++; //0 and 1 index is already taken
	                }
	            }
	        }
	        elseif ($type == 'close')
	        {
	            $current = & $parent[$level -1];
	        }
	    }
	    return ($xml_array);
	
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
			
			$wherea = "parent_id = $agent_id";
			$this->db->update('agent', $data, $wherea);
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
	
	function getAgentTopCities($agent_id)
	{
		$select = "SELECT c.city, c.city_name FROM api_hotels_city c, top_cities t WHERE t.citi_id = c.city_id AND t.agent_id = $agent_id";
		//echo $select; exit;
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;	
		}
	}
	
	function cancel_booking($booking_number)
	{
		//$select = "SELECT net_amount, user_id, user_type, branch_id, api_id, DATEDIFF(h.cancel_tilldate, CURDATE()) as cancel_day_diff FROM transaction_details where booking_number = '$booking_number' and status = 'confirmed'";
		
		$select = "SELECT t.net_amount, t.user_id, t.user_type, t.branch_id, t.api_id, DATEDIFF(h.cancel_tilldate, CURDATE()) AS cancel_day_diff FROM transaction_details t, hotel_booking_info h WHERE booking_number = '$booking_number' AND status = 'confirmed' AND h.hotel_booking_info_id = t.hotel_booking_id";

		//echo $select; exit;
		
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			$booking_info = $query->row();
			//print_r($booking_info); exit;
			$agent_id = $booking_info->user_id;
			if (!empty($agent_id)) {
				$branch_id = $booking_info->branch_id;
				$net_amount = $booking_info->net_amount;
				$cancel_day_diff = $booking_info->cancel_day_diff;
				
				if ($cancel_day_diff >= 0) {
					if ($branch_id == 0) {
						$qry = "update agent_acc_info set balance_credit = (balance_credit + $net_amount) where agent_id = $agent_id";
					} else {
						$qry = "update branch_acc_info set balance_credit = (balance_credit + $net_amount) where branch_id = $branch_id";
					}
					$this->db->query($qry);
				}
				//if ($this->db->query($qry)) {
					
					$data = array(
					'status' => 'cancelled'
					);
		
					$where = "booking_number = '$booking_number'";
			
					$this->db->update('transaction_details', $data, $where);
					
					return true;
				/*} else {
					return false;
				}*/
			}
			
			
			
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
	function transation_detail_new($id)
	{

		$que="select * from  transaction_details WHERE 	transaction_details_id = ".$id." ";
		
	
		$query= $this->db->query($que);
			if($query->num_rows() ==''){
				return '';
			}else{
				return $query->row();
			}

	}
	function getsupportinfo_details_msg($id)
	{
		$que="select * from  support_ticket WHERE 	ticket_id = ".$id." or sub_id = ".$id."  order by ticket_id ";
		
	
		$query= $this->db->query($que);
			if($query->num_rows() ==''){
				return '';
			}else{
				return $query->result();
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
	
	
	function get_agent_offer($id)
    {
		$select = "SELECT * FROM latest_offers t inner join latest_agent_offers a on t.offer_id = a.offer_id and a.agent_id=$id and t.status='1'";
		$query=$this->db->query($select);
		if($query->num_rows()>0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
	
	function get_agent_newsinfo()
	{
		$this->db->select('*');
		$this->db->from('latest_news');
		$query = $this->db->get();	
		return $query->row();
	}
	
	
	function get_records_of_agent($id)
	{
		$this->db->select('*');
		$this->db->from('agent');
		$this->db->where('agent_id',$id);
		$query = $this->db->get();
		//echo $this->db->last_query();exit;
		if ($query->num_rows() > 0)
		{
			return $query->row();
		} else {
			return false;
		}
	}
	
	
	
	
	
	
	
	
	
	
	
	
}
