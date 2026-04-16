<?php

class Admin_model extends CI_Model {
	
	public function __construct()
    {
      parent::__construct();
    }
		function getsupportinfo()
	{
		
			$select = "SELECT * FROM support_ticket t inner join agent a on t.agent_id = a.agent_id and t.status!='Closed'  and sub_id=0";
		
		
		//echo $select;exit;
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}
	}
	function getsupportinfo_c()
	{
		
			$select = "SELECT * FROM support_ticket t inner join agent a on t.agent_id = a.agent_id and t.status='Closed'  and sub_id=0";
		
		
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
	function getsupportinfo_details_msg($id)
	{
		$que="select * from  support_ticket WHERE 	ticket_id = ".$id." or sub_id = ".$id."   order by ticket_id ";
		
	
		$query= $this->db->query($que);
			if($query->num_rows() ==''){
				return '';
			}else{
				return $query->result();
			}
	}
	function update_ticket_agent($agent_id,$ticket_id,$messagee)
	{
		$data = array(
			'status' => 'On Hold',
			'process2' => 'Admin'
			
			);
			$this->db->set('update_date', 'NOW()', FALSE); 
		$where = "ticket_id  = $ticket_id";
		$this->db->update('support_ticket', $data, $where);
		
		

		$data1 = array(
			'agent_id' => $agent_id,
			'sub_id' => $ticket_id,
			'message' => $messagee,
			'process' => 'Admin'
			
			);
			
		$this->db->insert('support_ticket', $data1);
		$id = $this->db->insert_id();
		if (!empty($id)) {
			
			return true;
		} else {
			return false;
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
function get_max_market_id()
    {
        $sel = "select max(user_id) as ss from  sub_admin";
        $query = $this->db->query($sel);
        if ($query->num_rows == '')
        {
            return '';
        }
        else
        {
            $row = $query->row();
            return $row->ss;
        }
    }

   public function verify_user($email, $password)
   {
   
		$this->db->select('user_id, usertype, firstname, lastname, email')
			->from('admin')
			->where('email', $email)
            ->where('password', $password)
			->where('usertype', 1)
			->where('status', 1)
			->limit(1);
		$query = $this->db->get();
		
	//echo $this->db->last_query();exit;

      if ( $query->num_rows > 0 ) {
         // person has account with us
         return $query->row();
      }
      return false;
   }
   
   function search_booking_view($sd, $ed)
	{

		
		$select = "SELECT h.check_in, h.check_out, h.cancel_fromdate, h.cancel_tilldate, t.booking_number, t.amount, h.voucher_date FROM hotel_booking_info h, transaction_details t WHERE h.customer_contact_details_id = t.customer_contact_details_id AND h.check_in >='$sd' and h.check_out <='$ed'";
		
		$query = $this->db->query($select);
		
		if ( $query->num_rows > 0 )
		{ 
			return $query->result();
		}
		return false;
	}
	
	function Advancedsearch_booking_view($book_id = '', $pass_name = '', $book_type = '', $sel_date_type = '', $fadte = '', $toadte = '')
	{
		
		if($book_id != '') {
			$where.= "and t.booking_number ='".$book_id."' ";
		}	
		$where='';$where1='';
	
		if($book_type == 1){
			$where1.= "where t.status = 1";
		}
		elseif($book_type == 2){
			$where1.= "where t.status = 0";
		}

	   
	  
	  if($pass_name!=''){
			$where.= "and c.first_name ='".$pass_name."' ";
		}
	
		if($sel_date_type!= '' &&  $fadte!= '' &&  $toadte!= ''){
			 if($sel_date_type==1){
				 echo $where.= " and h.check_in between '".$fadte."'  and '".$toadte."' ";
			 }
			 else{
			 $where.= " and h.voucher_date between '".$fadte."'  and '".$toadte."' ";
			 }
		}
		
		
		 $select = "SELECT h.check_in, h.check_out, h.cancel_fromdate, h.cancel_tilldate, t.booking_number, t.amount, t.created_date, c.first_name FROM hotel_booking_info h left join transaction_details t on h.customer_contact_details_id = t.customer_contact_details_id left join customer_contact_details c on c.customer_contact_details_id = h.customer_contact_details_id $where1 $where";
		 
		
					
		$query = $this->db->query($select);
		
		//echo $this->db->last_query();exit;
		
		if ( $query->num_rows > 0 )
		{ 
			return $query->result();
		}
		return false;
	
	}

function Advancedsearch_booking_view_update($id='',$status='',$b_sd='',$b_ed='',$c_sd='',$c_ed='',$name='',$country='',$email='',$ph='',$api='',$api_no='')
	{
		
		$where='';$where1='';
		
		if($id != '') {
			$where.= "and t.booking_number ='".$id."' ";
		}	
		
	   if($status!=''){
			$where.= "and t.status ='".$status."' ";
		}
		 if($name!=''){
			$where.= "and c.first_name ='".$name."' or  c.last_name ='".$name."'";
		}
		
	if($email!=''){
			$where.= "and c.email ='".$email."' ";
		}
		
		if($ph!=''){
			$where.= "and c.phone ='".$ph."' ";
		}
		
		if($api!=''){
			$where.= "and h.api ='".$api."' ";
		}

if($api_no!=''){
			$where.= "and t.booking_number ='".$api_no."' ";
		}

		
		if( $b_sd!= '' &&  $b_ed!= ''){
			
			 $where.= " and h.voucher_date between '".$b_sd."'  and '".$b_ed."' ";
			
		}
		
		if( $c_sd!= '' &&  $c_ed!= ''){
			
			 $where.= " and h.check_in between '".$c_sd."'  and '".$c_ed."' ";
			
		}
		
		
		 $select = "SELECT h.*, t.*, c.first_name FROM hotel_booking_info h left join transaction_details t on h.customer_contact_details_id = t.customer_contact_details_id left join customer_contact_details c on c.customer_contact_details_id = h.customer_contact_details_id where t.product_id=2  $where group by t.booking_number";
		 
		
					
		$query = $this->db->query($select);
		
		//echo $this->db->last_query();exit;
		
		if ( $query->num_rows > 0 )
		{ 
			return $query->result();
		}
		return false;
	
	
		}
		
		function Advancedsearch_booking_view_update_search($imp)
	{
		
		
		
		/*if($id != '') {
			$where.= "and t.booking_number ='".$id."' ";
		}	
		
	   if($status!=''){
			$where.= "and t.status ='".$status."' ";
		}
		 if($name!=''){
			$where.= "and c.first_name ='".$name."' or  c.last_name ='".$name."'";
		}
		
	if($email!=''){
			$where.= "and c.email ='".$email."' ";
		}
		
		if($ph!=''){
			$where.= "and c.phone ='".$ph."' ";
		}
		
		if($api!=''){
			$where.= "and h.api ='".$api."' ";
		}

if($api_no!=''){
			$where.= "and t.booking_number ='".$api_no."' ";
		}

		
		if( $b_sd!= '' &&  $b_ed!= ''){
			
			 $where.= " and h.voucher_date between '".$b_sd."'  and '".$b_ed."' ";
			
		}
		
		if( $c_sd!= '' &&  $c_ed!= ''){
			
			 $where.= " and h.check_in between '".$c_sd."'  and '".$c_ed."' ";
			
		}*/
		
		
		$select = "SELECT h.*, t.*, c.first_name FROM hotel_booking_info h left join transaction_details t on h.customer_contact_details_id = t.customer_contact_details_id left join customer_contact_details c on c.customer_contact_details_id = h.customer_contact_details_id where t.product_id=2  $imp group by t.booking_number";
		 
		
					
		$query = $this->db->query($select);
		
		//echo $this->db->last_query();exit;
		
		if ( $query->num_rows > 0 )
		{ 
			return $query->result();
		}
		return false;
	
	
		}
	

	function getUserInfo($user_id)
	{		
		
		$select = "SELECT * FROM admin WHERE user_id = $user_id limit 1";
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->row();
		}
	}
	function get_b2c_markup()
	{		
		
		$select = "SELECT * FROM b2c_markup WHERE type = 'generic'";
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
	}
	function get_b2b_markup()
	{		
		
		$select = "SELECT * FROM b2b_markup WHERE type = 'generic'";
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
	}
	function get_b2c_markups()
	{		
		
		$select = "SELECT * FROM b2c_markup WHERE type = 'specific'";
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
	}
	
	function get_b2b_markups_hotel()
	{		
		
		$select = "SELECT * FROM b2b_markup WHERE type = 'specific_hotel'";
		$query=$this->db->query($select);
		
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
	}
	
	function get_b2b_markups()
	{		
		
		$select = "SELECT * FROM b2b_markup WHERE type = 'specific'";
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
	}
	function get_b2b_markups_hotel2()
	{		
		
		$select = "SELECT * FROM b2b_markup WHERE type = 'specific_hotel'";
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
	}	
	
	function edit_myacc_details($user_id, $firstname, $lastname, $email, $contact_no, $address, $password='')
	{
	
		$data = array(
			'firstname' => $firstname,
			'lastname' => $lastname,
			'email' => $email,
			'contact_no' => $contact_no,
			'address' => $address
			);
		
		if (!empty($password)) {
			$data['password'] = $password;			
		}
			
			$where = "user_id = $user_id";
		if ($this->db->update('admin', $data, $where)) {
			return true;
		} else {
			return false;
		}

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
	$que="select * from  currency_converter  ";
		
		$query= $this->db->query($que);
			if($query->num_rows() ==''){
				return '';
			}else{
				return $query->result();
			}
}
	function edit_myacc_details_ps($user_id, $firstname, $password='')
	{
	
	
		if (!empty($password)) {
			$data['password'] = $password;	
			$where = "user_id = $user_id";
		if ($this->db->update('admin', $data, $where)) {
			return true;
		} else {
			return false;
		}		
		}
			
		else {
			return false;
		}

	}
	
	function add_agent($name, $company_name, $address, $country, $city, $postal_code, $office_phone, $mobile_no,$currency, $email_id, $password,$a_type,$cc_id,$agent_logo)
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
			'agent_mode' => $a_type,
			'call_center_id' => $cc_id,
			'active' => 0,
			'agent_type' => 2,
			'last_visit' => '',
                        'markets' => $markets,
			'agent_logo' => $agent_logo
			);
			
			$this->db->set('register_date', 'NOW()', FALSE); 
		
		$this->db->insert('agent', $data);
		$id = $this->db->insert_id();
		if (!empty($id)) {
			
		$data = array(
			'agent_id' => $id,
			'cc_id' => $cc_id,
			);
			
			$this->db->set('creation_date', 'NOW()', FALSE); 
		
		$this->db->insert('sub_admin_list', $data);
		 $this->db->insert_id();
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
	
	function add_b2c_markup($country, $api, $markup,$type)
	{
	
		$data = array(
			'country' => $country,
			'api' => $api,
			'markup' => $markup,
			'type' => $type,
			'status' => 0
			);
			
			$this->db->set('register_date', 'NOW()', FALSE); 
		
		$this->db->insert('b2c_markup', $data);
		$id = $this->db->insert_id();
		if (!empty($id)) {
			return true;
		} else {
			return false;
		}

	}
	function add_b2b_markup($country, $agent,$markup,$type)
	{
	
		$data = array(
			'country' => $country,
			
			'markup' => $markup,
			'type' => $type,
			'agent_id' => $agent,
			'status' => 1
			);
			
			$this->db->set('register_date', 'NOW()', FALSE); 
		
		$this->db->insert('b2b_markup', $data);
		$id = $this->db->insert_id();
		if (!empty($id)) {
			return true;
		} else {
			return false;
		}

	}
	
	
	function add_b2b_markup_hotel($agent,$hotel,$markup,$type)
	{
	
	
	
		$data = array(
			'hotel' => $hotel,
			
			'markup' => $markup,
			'type' => $type,
			'agent_id' => $agent,
			'status' => 1
			);
			
			$this->db->set('register_date', 'NOW()', FALSE); 
		
		$this->db->insert('b2b_markup', $data);
		$id = $this->db->insert_id();
		if (!empty($id)) {
			return true;
		} else {
			return false;
		}

	}
	
	function get_left_banner(){
		

		$this->db->select('*');
		$this->db->from('banner_image');
		$this->db->where('destination','left');

		$query=$this->db->get();
		if($query->num_rows() ==''){
			return '';			
		}else{
			return $query->result();				
		}
		
	}
	function add_b2c_markup_checking($country, $api, $type){
		

		$this->db->select('*');
		$this->db->from('b2c_markup');
		$this->db->where('country',$country);
		$this->db->where('api',$api);
		$this->db->where('type',$type);

		$query=$this->db->get();
		if($query->num_rows() ==''){
			return '';			
		}else{
			return $query->row();				
		}
		
	}
	function add_b2b_markup_checking($country, $api, $type){
		

		$this->db->select('*');
		$this->db->from('b2b_markup');
		$this->db->where('country',$country);
		$this->db->where('api',$api);
		$this->db->where('type',$type);

		$query=$this->db->get();
		if($query->num_rows() ==''){
			return '';			
		}else{
			return $query->row();				
		}
		
	}
	function get_left_banner_bot()
	{
		$this->db->select('*');
		$this->db->from('banner_image');
		$this->db->where('destination','left1');

		$query=$this->db->get();
		if($query->num_rows() ==''){
			return '';			
		}else{
			return $query->result();				
		}
	}
	
	
	//----- Get Top Destinations -----
	function get_top_destinations()
	{
		$this->db->select('*');
		$this->db->from('cms_top_destinations');
		$this->db->where('destination','center');
		$query=$this->db->get();
		if($query->num_rows() ==''){
			return '';			
		}else{
			return $query->result();				
		}
	}
	
	//----- Get Top Destinations -----
	function get_hot_deals()
	{
		$this->db->select('*');
		$this->db->from('cms_top_destinations');
		$this->db->where('destination','right');
		$query=$this->db->get();
		if($query->num_rows() ==''){
			return '';			
		}else{
			return $query->result();				
		}
	}
	function get_why_choose_us()
	{
		$this->db->select('*');
		$this->db->from('cms_top_destinations');
		$this->db->where('destination','right2');
		$query=$this->db->get();
		//echo $this->db->last_query();exit;
		if($query->num_rows() ==''){
			return '';			
		}else{
			return $query->result();				
		}
	}
	
	//----- Update Top Destinations -----
	function update_top_destination($city1_name,$city1_value,$city2_name,$city2_value,$city3_name,$city3_value,$city4_name,$city4_value,$city5_name,$city5_value)
	{
		$update_query =$this->db->query("UPDATE cms_top_destinations SET        
											city1_name='$city1_name', 
											city1_value='$city1_value', 
											city2_name='$city2_name',
											city2_value='$city2_value',
											city3_name='$city3_name',
											city3_value='$city3_value',
											city4_name='$city4_name',
											city4_value='$city4_value',
											city5_name='$city5_name',
											city5_value='$city5_value'
										WHERE destination='center'");
	}
	
	//----- Update Hot Deals -----
	function update_hot_deals($hotel1_name,$hotel1_value,$hotel2_name,$hotel2_value,$hotel3_name,$hotel3_value,$hotel4_name,$hotel4_value,$hotel5_name,$hotel5_value)
	{
		$update_query =$this->db->query("UPDATE cms_top_destinations SET        
											city1_name='$hotel1_name', 
											city1_value='$hotel1_value', 
											city2_name='$hotel2_name',
											city2_value='$hotel2_value',
											city3_name='$hotel3_name',
											city3_value='$hotel3_value',
											city4_name='$hotel4_name',
											city4_value='$hotel4_value',
											city5_name='$hotel5_name',
											city5_value='$hotel5_value'
										WHERE destination='right'");
	}
	
	function update_why_choose_us($why_choose_us_1,$why_choose_us_2,$why_choose_us_3,$why_choose_us_4,$why_choose_us_5)
	{
		$update_query =$this->db->query("UPDATE cms_top_destinations SET        
											city1_name='$why_choose_us_1', 
											city2_name='$why_choose_us_2',
											city3_name='$why_choose_us_3',
											city4_name='$why_choose_us_4',
											city5_name='$why_choose_us_5'
										WHERE destination='right2'");
	}
	
	
	function upload_left_image($left_div1,$left_div2,$left_div3,$left_div4,$left_div5,$left_div6)
	{
		$update_query =$this->db->query("UPDATE banner_image SET img_path_div1='$left_div1',img_path_div2='$left_div2',img_path_div3='$left_div3',img_path_div4='$left_div4',
		img_path_div5='$left_div5',img_path_div6='$left_div6' WHERE destination='left'");

	}
	function upload_content_image($p1,$c1)
	{
		$update_query =$this->db->query("UPDATE banner_image SET p1='$p1',c1='$c1' WHERE destination='left1'");

	}
	function upload_left_bot_image($left_ban1)
	{
		$update_query =$this->db->query("UPDATE banner_image SET img_path_div1='$left_ban1' WHERE destination='left1'");

	}
	function getAgents($status='')
	{		
		$where = '';
		if ($status == 'active') {
			$where = 'and a.active = 1';	
		} elseif ($status == 'inactive') { 
			$where = 'and active = 0';	
		}
		
		if ($status == 'active') {
			//$select = "SELECT *, i.balance_credit FROM agent a, agent_acc_info i where agent_type = 2 $where and i.agent_id = a.agent_id";
			$select = "SELECT a.*, i.balance_credit FROM agent a left join agent_acc_info i on i.agent_id = a.agent_id where agent_type = 2 $where";
		} else {
			$select = "SELECT * FROM agent where agent_type = 2 $where";
		}
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;	
		}
	}
	
	function getAgents_active()
	{		
	
			$where = 'and a.active = 1';	
		
		
		
			//$select = "SELECT *, i.balance_credit FROM agent a, agent_acc_info i where agent_type = 2 $where and i.agent_id = a.agent_id";
			$select = "SELECT a.*, i.balance_credit FROM agent a left join agent_acc_info i on i.agent_id = a.agent_id where agent_type = 2 $where";
		
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;	
		}
	}
	
	
	function getusers($status='')
	{		
		
		
		
			$select = "SELECT * FROM user where user_type_id = 3 ";
		
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;	
		}
	}
	function get_agetn_info_new($agent_id)
	{		
		
		$select = "SELECT * FROM agent where agent_id = $agent_id ";
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			$ddd = $query->row();
			return $ddd->name.'-'.$ddd->company_name;
		}
		else
		{
			return false;	
		}
	}
	
	function get_agetn_info_new_hotel($sup_hotel_id)
	{		
		
		$select = "SELECT hotel_name FROM sup_hotels where sup_hotel_id = $sup_hotel_id ";
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return false;	
		}
	}
	function getsub_admin($status='')
	{		
		
		
		
			$select = "SELECT * FROM sub_admin where user_type_id = 6 ";
		
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;	
		}
	}
	function getusers_a($status='')
	{		
		
		
			$select = "SELECT * FROM user where user_type_id = 3 and status=1";
		
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;	
		}
	}
	function getsub_admin_a($status='')
	{		
		
		
			$select = "SELECT * FROM sub_admin where user_type_id = 6 and status=1";
		
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;	
		}
	}
	function getagent_edit1($id)
	{
		$where = " and a.agent_id = '$id'";	
		
		
		
			//$select = "SELECT *, i.balance_credit FROM agent a, agent_acc_info i where agent_type = 2 $where and i.agent_id = a.agent_id";
			$select = "SELECT a.*, i.balance_credit FROM agent a left join agent_acc_info i on i.agent_id = a.agent_id where agent_type = 2 $where";
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->row();
		} else {
			return false;	
		}
	}
	function getusers_edit1($id)
	{		
		
		
			$select = "SELECT * FROM user where user_id = '$id'";
		
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->row();
		} else {
			return false;	
		}
	}function getusers_edit1_subadmins($id)
	{		
		
		
			$select = "SELECT * FROM sub_admin where user_id = '$id'";
		
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->row();
		} else {
			return false;	
		}
	}
	function getusers_edit1_subadmin($id)
	{		
		
		
			$select = "SELECT * FROM sub_admin where user_id = '$id'";
		
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->row();
		} else {
			return false;	
		}
	}
	function getagent_editsss1($id)
	{		
		
		
		$select = "SELECT * FROM agent where agent_id = '$id'";
		
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->row();
		} else {
			return false;	
		}
	}
	function add_customer($username,$fname,$mname,$sname,$email,$pass,$country,$user_type = 3,$news_status = 0,$portal_id = '')
{
	
	$query = $this->db->query("SELECT * FROM user WHERE email = '$email'");
	if($query->num_rows() =='')
	{ 
		$cdate = date("Y-m-d");	
		//$rand=rand(1000,9999);
		
		$unq = "CUS".strtotime(date("d M Y h:i A"));
		
		//$unq="CUS".$rand;  
		
		if($mname == "Middle Name")
		  $mname = "";
		  
		if($country == "Country")
		  $country = "";
		  
		 
		  $encrypt = $pass;
		  
		  
		$data = array('user_name'=>$username,'first_name'=>$fname,'middle_name'=>$mname,'last_name'=>$sname,'email'=>$email,'password'=>$encrypt,'user_type_id'=>$user_type ,'offer_newsletter_status' =>$news_status,'airfast_newsletter_status'=>$news_status,'portal_id' => $portal_id);
		
		$this->db->insert('user',$data);
		$id = $this->db->insert_id();

		$code = $this->generateValidationCode();
		
		$data = array('user_id'=>$id,'code'=>$code);
		$this->db->insert('registration_tracker',$data);
        
        	$data = array('user_id'=>$id,'country'=>$country);
		$this->db->insert('user_profile',$data);
        
       		$arrValue = array('id'=>$id,'code'=>$code);
		return  $arrValue;
	}
	else
	{		
	
		return  FALSE;
	}	
	

}
	function add_customer_sub_admin($fname,$username,$lname,$mo_no,$ph_no,$address,$city,$country,$post_code,$userid,$email,$pass,$type,$limit)
{
	
	$query = $this->db->query("SELECT * FROM sub_admin WHERE email = '$email'");
	if($query->num_rows() =='')
	{ 
	//	$cdate = date("Y-m-d");	
		//$rand=rand(1000,9999);
		
	//	$unq = "CUS".strtotime(date("d M Y h:i A"));
		
		//$unq="CUS".$rand;  
		
	//	if($mname == "Middle Name")
		//  $mname = "";
		  
		//if($country == "Country")
		//  $country = "";
		  
		 
		//  $encrypt = $pass;
		  
		  
		//$data = array($fname,$username,$lname,$mo_no,$ph_no,$address,$city,$country,$post_code,$userid,$email,$pass,$type,$limit);
		
	//	$this->db->insert('sub_admin',$data);
		//$id = $this->db->insert_id();
$data = array(
			'first_name' => $fname,
			'user_name' => $username,
			'middle_name' => $lname,
			'mobile' => $mo_no,
			'phone' => $ph_no,
			'address' => $address,
			'city' => $city,
			'country' => $country,
			'post_code' => $post_code,
			'login_id' => $userid,
			'email' => $email,
			'password' => $pass,
			'sub_admin_type' => $type,
			'limit' => $limit,
			'user_type_id'=>6,
			'status' => 0
			);
			
			$this->db->set('created_date', 'NOW()', FALSE); 
		
		$this->db->insert('sub_admin', $data);
	//	$code = $this->generateValidationCode();
	//	
		//$data = array('user_id'=>$id,'code'=>$code);
	//	$this->db->insert('registration_tracker',$data);
        
        //	$data = array('user_id'=>$id,'country'=>$country);
		//$this->db->insert('user_profile',$data);
        
       	//	$arrValue = array('id'=>$id,'code'=>$code);
		return  TRUE;
	}
	else
	{		
	
		return  FALSE;
	}	
	

}
function addEmail($to,$from,$sub,$content,$send_by = 0,$status = 0)
{
	$data=array('to'=>$to,'from'=>$from,'subject'=>$sub,'content'=>$content,'sended_by'=>$send_by,'status'=>$status);
	$this->db->insert('emails',$data);
	return $this->db->insert_id(); 

}
function view_trans_detail()
{
	
		       $this->db->select('*');
				$this->db->from('transaction_details');

				
				$this->db->where('user_type', 4);
	$this->db->join('hotel_booking_info', 'transaction_details.hotel_booking_id = hotel_booking_info.hotel_booking_info_id');
	//$this->db->join('customer_contact_details', 'transaction_details.customer_contact_details_id = customer_contact_details.customer_contact_details_id');
	
				$query=$this->db->get();
				//echo $this->db->last_query();exit;
				if($query->num_rows() ==''){
					return '';
				}else{
					return $query->result();
				}
}



function view_trans_detail_b2b()
{
	$this->db->select('*');
	$this->db->from('transaction_details');
	
	
	$this->db->where('user_type', 2);
	$this->db->join('hotel_booking_info', 'transaction_details.hotel_booking_id = hotel_booking_info.hotel_booking_info_id');
	//$this->db->join('customer_contact_details', 'transaction_details.customer_contact_details_id = customer_contact_details.customer_contact_details_id');
	
	$query=$this->db->get();
	//echo $this->db->last_query();exit;
	if($query->num_rows() ==''){
		return '';
	}else{
		return $query->result();
	}
}



function view_trans_detail_id_new($id)
{
	
	
		       $this->db->select('*');
				$this->db->from('hotel_booking_info');

				
				$this->db->where('hotel_booking_info_id', $id);
	$this->db->join('hotel_booking_info', 'transaction_details.hotel_booking_id = hotel_booking_info.hotel_booking_info_id');
	//$this->db->join('customer_contact_details', 'transaction_details.customer_contact_details_id = customer_contact_details.customer_contact_details_id');
	
				$query=$this->db->get();
				//echo $this->db->last_query();exit;
				if($query->num_rows() ==''){
					return '';
				}else{
					return $query->result();
				}
}
function view_trans_detail_id_new2($id)
{
	
	
		       $this->db->select('*');
				$this->db->from('transaction_details');

				
				$this->db->where('transaction_details_id', $id);
	
				$query=$this->db->get();
				//echo $this->db->last_query();exit;
				if($query->num_rows() ==''){
					return '';
				}else{
					return $query->row();
				}
}
function view_trans_detail_update()
{
	
		       $this->db->select('*');
				$this->db->from('transaction_details');

			$query=$this->db->get();
				//echo $this->db->last_query();exit;
				if($query->num_rows() ==''){
					return '';
				}else{
					return $query->result();
				}
}
function view_trans_detail_id($id)
{
	
		       $this->db->select('*');
				$this->db->from('transaction_details');

				
				$this->db->where('user_id', $id);
	$this->db->join('hotel_booking_info', 'transaction_details.hotel_booking_id = hotel_booking_info.hotel_booking_info_id');
	$this->db->join('customer_contact_details', 'transaction_details.customer_contact_details_id = customer_contact_details.customer_contact_details_id');
	
				$query=$this->db->get();
				//echo $this->db->last_query();exit;
				if($query->num_rows() ==''){
					return '';
				}else{
					return $query->result();
				}
}

function generateValidationCode()
{
	$chars = 'abcdefghijkmnopqrstuvwxyz023456789';
	srand((double)microtime() * 1000000);
	$passwd = '';
	$chars_length = strlen($chars) - 1;
	for ($i = 0; $i < 10; $i++)
	$passwd .= substr($chars, (rand() % $chars_length), 1);
	return $passwd;
}
	function getusers_edit2($id)
	{		
		
		
			$select = "SELECT * FROM user_profile where user_id = '$id'";
		
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->row();
		} else {
			return false;	
		}
	}
	function getusers_i($status='')
	{		
		
		
			$select = "SELECT * FROM user where user_type_id = 3 and status=0";
		
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;	
		}
	}
	function countAgentStatus()
	{		
		
		$select = "select count(*) as tot_agent, (select count(*) as active from agent a where active=1 and agent_type = 2) as active, (select count(*) as active from agent a where active=0 and agent_type = 2) as inactive from agent where agent_type = 2 limit 1";
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->row();
		} else {
			return false;	
		}
	}
	function countuserStatus()
	{		
		
		$select = "select count(*) as tot_agent, (select count(*) as active from user a where status =1 and user_type_id  = 3) as active, (select count(*) as active from user a where status =0 and user_type_id  = 3) as inactive from user where user_type_id  = 3 limit 1";
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->row();
		} else {
			return false;	
		}
	}
	
	
	
	//------------- Get Statistical Chart Results -------- //
	function graph_report($statisticalChart)
	{		
		if($statisticalChart == 'b2cUsers'){	//B2C Users
			$select	= "SELECT DATE_FORMAT(created_date, '%b') AS month,
								DATE_FORMAT(created_date, '%Y') AS year, 
								count(*) as value  
						FROM user	
						GROUP BY month ORDER BY created_date ASC";
			$query	= $this->db->query($select);
		}
		if($statisticalChart == 'b2cUsersAct'){	//B2C Users Active
			$select	= "SELECT DATE_FORMAT(created_date, '%b') AS month,
								DATE_FORMAT(created_date, '%Y') AS year, 
								count(*) as value  
						FROM user	
						WHERE status = 1
						GROUP BY month ORDER BY created_date ASC";
			$query	= $this->db->query($select);
		}
		if($statisticalChart == 'b2cUsersInAct'){	//B2C Users InActive
			$select	= "SELECT DATE_FORMAT(created_date, '%b') AS month,
								DATE_FORMAT(created_date, '%Y') AS year, 
								count(*) as value  
						FROM user	
						WHERE status = 0
						GROUP BY month ORDER BY created_date ASC";
			$query	= $this->db->query($select);
		}
		if($statisticalChart == 'b2bUsers'){	//B2B Users
			$select	= "SELECT DATE_FORMAT(register_date, '%b') AS month, 
								DATE_FORMAT(register_date, '%Y') AS year, 
								count(*) as value  
						FROM agent
						WHERE agent_type = 2
						GROUP BY month ORDER BY register_date ASC";
			$query	= $this->db->query($select);
		}
		if($statisticalChart == 'b2bUsersAct'){	//B2B Users Active
			$select	= "SELECT DATE_FORMAT(register_date, '%b') AS month, 
								DATE_FORMAT(register_date, '%Y') AS year, 
								count(*) as value  
						FROM agent
						WHERE agent_type = 2 AND active = 1	
						GROUP BY month ORDER BY register_date ASC";
			$query	= $this->db->query($select);
		}
		if($statisticalChart == 'b2bUsersInAct'){	//B2B Users InActive
			$select	= "SELECT DATE_FORMAT(register_date, '%b') AS month, 
								DATE_FORMAT(register_date, '%Y') AS year, 
								count(*) as value  
						FROM agent
						WHERE agent_type = 2 AND active = 0	
						GROUP BY month ORDER BY register_date ASC";
			$query	= $this->db->query($select);
		}
		if($statisticalChart == 'suppliers'){	//Suppliers
			$select	= "SELECT DATE_FORMAT(register_date, '%b') AS month, 
								DATE_FORMAT(register_date, '%Y') AS year, 
								count(*) as value  
						FROM supplier
						GROUP BY month ORDER BY register_date ASC";
			$query	= $this->db->query($select);
		}
		if($statisticalChart == 'suppliersAct'){	//Suppliers Active
			$select	= "SELECT DATE_FORMAT(register_date, '%b') AS month, 
								DATE_FORMAT(register_date, '%Y') AS year, 
								count(*) as value  
						FROM supplier
						WHERE active = 1	
						GROUP BY month ORDER BY register_date ASC";
			$query	= $this->db->query($select);
		}
		if($statisticalChart == 'suppliersInAct'){	//Suppliers InActive
			$select	= "SELECT DATE_FORMAT(register_date, '%b') AS month, 
								DATE_FORMAT(register_date, '%Y') AS year, 
								count(*) as value  
						FROM supplier
						WHERE active = 0	
						GROUP BY month ORDER BY register_date ASC";
			$query	= $this->db->query($select);
		}
		if($statisticalChart == 'b2cBookings'){	//B2C Bookings
			$select	= "SELECT DATE_FORMAT(created_date, '%b') AS month,
								DATE_FORMAT(created_date, '%Y') AS year, 
								count(*) as value  
						FROM transaction_details
						WHERE user_type = 4	AND status <> ''
						GROUP BY month ORDER BY created_date ASC";
			$query	= $this->db->query($select); 
		}
		if($statisticalChart == 'b2cBookingsCon'){	//B2C Bookings Confirmed
			$select	= "SELECT DATE_FORMAT(created_date, '%b') AS month,
								DATE_FORMAT(created_date, '%Y') AS year, 
								count(*) as value  
						FROM transaction_details
						WHERE user_type = 4	AND status = 'Confirmed'
						GROUP BY month ORDER BY created_date ASC";
			$query	= $this->db->query($select); 
		}
		if($statisticalChart == 'b2cBookingsCan'){	//B2C Bookings Cancelled
			$select	= "SELECT DATE_FORMAT(created_date, '%b') AS month,
								DATE_FORMAT(created_date, '%Y') AS year, 
								count(*) as value  
						FROM transaction_details
						WHERE user_type = 4	AND status = 'Cancelled'
						GROUP BY month ORDER BY created_date ASC";
			$query	= $this->db->query($select); 
		}
		if($statisticalChart == 'b2bBookings'){	//B2B Bookings
			$select	= "SELECT DATE_FORMAT(created_date, '%b') AS month,
								DATE_FORMAT(created_date, '%Y') AS year, 
								count(*) as value  
						FROM transaction_details
						WHERE user_type = 2 AND status <> ''
						GROUP BY month ORDER BY created_date ASC";
			$query	= $this->db->query($select);
		}
		if($statisticalChart == 'b2bBookingsCon'){	//B2B Bookings Confirmed
			$select	= "SELECT DATE_FORMAT(created_date, '%b') AS month,
								DATE_FORMAT(created_date, '%Y') AS year, 
								count(*) as value  
						FROM transaction_details
						WHERE user_type = 2	AND status = 'Confirmed'
						GROUP BY month ORDER BY created_date ASC";
			$query	= $this->db->query($select);
		}
		if($statisticalChart == 'b2bBookingsCan'){	//B2B Bookings Cancelled
			$select	= "SELECT DATE_FORMAT(created_date, '%b') AS month,
								DATE_FORMAT(created_date, '%Y') AS year, 
								count(*) as value  
						FROM transaction_details
						WHERE user_type = 2	AND status = 'Cancelled'
						GROUP BY month ORDER BY created_date ASC";
			$query	= $this->db->query($select);
		}
		if($statisticalChart == 'siteViewers'){	//Site Viewers
			$select	= "select DATE_FORMAT(date, '%b') AS month,
									DATE_FORMAT(date, '%Y') AS year, 
									count(*) as value 
							from vister 
							GROUP BY month ORDER BY date ASC";
			$query  = $this->db->query($select);
		}
		if ($query->num_rows()>0)
		{
			$data['result'] = $query->result();
			return $data;
		} else {
			return false;	
		}
	}
	
	//------------- Get Pie Chart Results -------- //
	function graph_pieChart_report()
	{		
		if($_REQUEST['pieChart'] != ''){
		//B2C Users
			$selectB2CUsers	= "SELECT count(*) as B2CUsers  
								FROM user";
			$queryB2CUsers	= $this->db->query($selectB2CUsers);
		
		//B2B Users
			$selectB2BUsers	= "SELECT count(*) as B2BUsers
								FROM agent
								WHERE agent_type = 2";
			$queryB2BUsers	= $this->db->query($selectB2BUsers);
			
		//Suppliers
			$selectSuppliers= "SELECT count(*) as suppliers
								FROM supplier";
			$querySuppliers	= $this->db->query($selectSuppliers);
			
		//Sub Admin (Call Centers)
			$selectCallCen	= "SELECT count(*) as CallCenters
								FROM sub_admin";
			$queryCallCent	= $this->db->query($selectCallCen);
		}
		if($queryB2CUsers->result()){
			$users 		= $queryB2CUsers->result();
			$agents 	= $queryB2BUsers->result();
			$suppliers 	= $querySuppliers->result();
			$callCenter	= $queryCallCent->result();
			$this->output->set_content_type('application/json');
			$this->output->set_output(json_encode(array('users'=>$users,'agents'=>$agents,'suppliers'=>$suppliers,'callCenter'=>$callCenter)));
		}
		else{
			return array();
		}
	}
	
	//------------- Get Line Chart Results -------- //
	function graph_lineChart_report()
	{		
		if($_REQUEST['lineChart'] == '1W'){	//Past One Week
			$period = "1 WEEK";
		}
		if($_REQUEST['lineChart'] == '1M'){	//Past One Month
			$period = "1 MONTH";
		}
		if($_REQUEST['lineChart'] == '3M'){	//Past Three Months
			$period = "3 MONTH";
		}
		if($_REQUEST['lineChart'] == '6M'){	//Past Six Months
			$period = "6 MONTH";
		}
		if($_REQUEST['lineChart'] == '1Y'){	//Past One Yea
			$period = "1 YEAR";
		}
		$select	= "SELECT DATE_FORMAT(date, '%e/%c/%y') AS dat,
					count(*) as visiters  
					FROM vister
					WHERE id <> 'id' AND type = 'visit' AND date >= DATE_SUB(CURDATE(), INTERVAL ".$period.")
					GROUP BY dat ORDER BY date ASC"; //exit;
		$query	= $this->db->query($select); 
		
		if($query->result()){
			$users 		= $query->result();
			$this->output->set_content_type('application/json');
			$this->output->set_output(json_encode(array('users'=>$users)));
		}
		else{
			return array();
		}
	}
	
	//------------- Get Statistical Overview Results -------- //
	function getStaticOverview()
	{		
		if($_REQUEST['statisticalOverview'] == '1W'){	//Past One Week
			$period = "1 WEEK";
		}
		if($_REQUEST['statisticalOverview'] == '1M'){	//Past One Month
			$period = "1 MONTH";
		}
		if($_REQUEST['statisticalOverview'] == '3M'){	//Past Three Months
			$period = "3 MONTH";
		}
		if($_REQUEST['statisticalOverview'] == '6M'){	//Past Six Months
			$period = "6 MONTH";
		}
		if($_REQUEST['statisticalOverview'] == '1Y'){	//Past One Yea
			$period = "1 YEAR";
		}
		
		//------------ Total B2C Clients 
		$selectUsers	= "select count(*) as tot_user, 
							(select count(*) as active_user 
								from user 
								where status =1 and user_type_id  = 3 and created_date >= DATE_SUB(CURDATE(), INTERVAL ".$period.")) as active_user, 
							(select count(*) as inactive_user 
								from user 
								where status =0 and user_type_id  = 3 and created_date >= DATE_SUB(CURDATE(), INTERVAL ".$period.")) as inactive_user 
							from user 
							where created_date >= DATE_SUB(CURDATE(), INTERVAL ".$period.") and user_type_id  = 3 limit 1"; 
		$queryUsers		= $this->db->query($selectUsers);
		
		//------------ Total B2B Agents
		$selectAgents	= "select count(*) as tot_agent, 
							(select count(*) as active_agent 
								from agent 
								where active=1 and agent_type = 2 and register_date >= DATE_SUB(CURDATE(), INTERVAL ".$period.")) as active_agent, 
							(select count(*) as inactive_agent 
								from agent 
								where active=0 and agent_type = 2 and register_date >= DATE_SUB(CURDATE(), INTERVAL ".$period.")) as inactive_agent 
							from agent 
							where register_date >= DATE_SUB(CURDATE(), INTERVAL ".$period.") and agent_type = 2 limit 1"; 
		$queryAgents  	= $this->db->query($selectAgents);
		
		//------------ Total Suppliers
		$selectSuppliers	= "select count(*) as tot_suppliers, 
							(select count(*) as active_suppliers 
								from supplier 
								where active=1 and register_date >= DATE_SUB(CURDATE(), INTERVAL ".$period.")) as active_suppliers, 
							(select count(*) as inactive_agent 
								from supplier 
								where active=0 and register_date >= DATE_SUB(CURDATE(), INTERVAL ".$period.")) as inactive_suppliers 
							from supplier 
							where register_date >= DATE_SUB(CURDATE(), INTERVAL ".$period.") limit 1"; 
		$querySuppliers  	= $this->db->query($selectSuppliers);
		
		//------------ Total B2C Bookings 
		$selectB2CBookings	= "select count(*) as tot_bookings, 
							(select count(*) as conf_booking 
								from transaction_details 
								where status = 'Confirmed' and user_type = 4 and created_date >= DATE_SUB(CURDATE(), INTERVAL ".$period.")) as conf_booking, 
							(select count(*) as cancel_booking 
								from transaction_details 
								where status = 'CANCELLED' and user_type = 4 and created_date >= DATE_SUB(CURDATE(), INTERVAL ".$period.")) as cancel_booking 
							from transaction_details 
							where created_date >= DATE_SUB(CURDATE(), INTERVAL ".$period.") and status <> '' and user_type = 4 limit 1";  
		$queryB2CBookings	= $this->db->query($selectB2CBookings);
		
		//------------ Total B2B Bookings 
		$selectB2BBookings	= "select count(*) as tot_bookings, 
							(select count(*) as conf_booking 
								from transaction_details 
								where status = 'Confirmed' and user_type = 2 and created_date >= DATE_SUB(CURDATE(), INTERVAL ".$period.")) as conf_booking, 
							(select count(*) as cancel_booking 
								from transaction_details 
								where status = 'CANCELLED' and user_type = 2 and created_date >= DATE_SUB(CURDATE(), INTERVAL ".$period.")) as cancel_booking 
							from transaction_details 
							where created_date >= DATE_SUB(CURDATE(), INTERVAL ".$period.") and status <> '' and user_type = 2 limit 1";  
		$queryB2BBookings	= $this->db->query($selectB2BBookings);
		
		//------------ Site B2B Viewers
		$selectViewers	= "select count(*) as tot_vister 
							from vister 
							where date >= DATE_SUB(CURDATE(), INTERVAL ".$period.") and type = 'visit' limit 1";
		$queryViewers  	= $this->db->query($selectViewers);
		
		if($queryUsers->result()){
			//$bookings	= $queryBookings->result();
			$users 		= $queryUsers->result();
			$agents 	= $queryAgents->result();
			$suppliers 	= $querySuppliers->result();
			$B2Cbookings= $queryB2CBookings->result();
			$B2Bbookings= $queryB2BBookings->result();
			$viewers 	= $queryViewers->result();
			$this->output->set_content_type('application/json');
			$this->output->set_output(json_encode(array('users'=>$users,'agents'=>$agents,'suppliers'=>$suppliers,'B2Cbookings'=>$B2Cbookings,'B2Bbookings'=>$B2Bbookings,'viewers'=>$viewers)));
		}
		else{
			return array();
		}
	}
	
		
	//------------- Get Statistical Chart Results Old -------- //
	function getStaticChart()
	{		
		if($_REQUEST['statisticalChart'] == 'b2cUsers'){	//B2C Users
			$selectAgents	= "SELECT DATE_FORMAT(created_date, '%b') AS month, count(*) as value  
								FROM user	
								GROUP BY month ORDER BY created_date DESC";  
			$queryAgents	= $this->db->query($selectAgents);
		}
		if($_REQUEST['statisticalChart'] == 'b2bUsers'){	//B2B Users
			$selectAgents	= "SELECT DATE_FORMAT(register_date, '%b') AS month, count(*) as value  
								FROM agent	
								GROUP BY month ORDER BY register_date DESC";  
			$queryAgents	= $this->db->query($selectAgents);
		}
		if($_REQUEST['statisticalChart'] == 'b2cBookings'){	//B2C Bookings
			$selectAgents	= "SELECT DATE_FORMAT(register_date, '%b') AS month, count(*) as value  
								FROM agent	
								GROUP BY month ORDER BY register_date DESC";  
			$queryAgents	= $this->db->query($selectAgents);
		}
		if($_REQUEST['statisticalChart'] == 'b2bBookings '){	//B2B Bookings
			$selectAgents	= "SELECT DATE_FORMAT(register_date, '%b') AS month, count(*) as value  

								FROM agent	
								GROUP BY month ORDER BY register_date DESC";  
			$queryAgents	= $this->db->query($selectAgents);
		}
		if($queryAgents->result()){
			$agents 	= $queryAgents->result();
			$my_file = 'Data.json';
			$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
			$this->output->set_content_type('application/json');
			fwrite($handle, json_encode(array('data'=>$agents)));
			$this->output->set_output(json_encode(array('data'=>$agents)));
		}
		else{
			return array();
		}
	}
	
	
	
	
	
	
	
	
	
	function countsub_adminStatus()
	{		
		
		$select = "select count(*) as tot_agent, (select count(*) as active from sub_admin a where status =1 and user_type_id  = 6) as active, (select count(*) as active from sub_admin a where status =0 and user_type_id  = 6) as inactive from sub_admin where user_type_id  = 6 limit 1";
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->row();
		} else {
			return false;	
		}
	}
	
	function agent_change_status($agent_id, $status)
	{

		$where = "agent_id = $agent_id";
		$data = array(
			'active' => $status
		);
		if ($this->db->update('agent', $data, $where)) {
			return true;
		} else {
			return false;
		}
	}
	function edit_payment_gateway( $status)
	{

		$where = "id = 1";
		$data = array(
			'charge' => $status
		);
		if ($this->db->update('payment_charge', $data, $where)) {
			return true;
		} else {
			return false;
		}
	}
	function get_payment_charge()
	{		
		
		$select = "SELECT charge FROM payment_charge where id = 1";
		
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			$a = $query->row();
			return $a->charge;
		} else {
			return 0;	
		}
	}
	function get_visit_count()
	{
		$select = "select count(*) as coun from transaction_details where visit = 0";
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			$a = $query->row();
			return  $a->coun;
		} else {
			return false;	
		}
	}
	function get_visit_count_new()
	{
		$select = "select count(*) as coun from vister where type = 'visit'";
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			$a = $query->row();
			return  $a->coun;
		} else {
			return false;	
		}
	}
	function get_visit_count_b2c()
	{
		$select = "select count(*) as coun from vister where type = 'b2c'";
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			$a = $query->row();
			return  $a->coun;
		} else {
			return false;	
		}
	}
	function get_visit_count_agent()
	{
		$select = "select count(*) as coun from vister where type = 'b2b'";
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			$a = $query->row();
			return  $a->coun;
		} else {
			return false;	
		}
	}
	function get_visit_count_supplier()
	{
		$select = "select count(*) as coun from vister where type = 'supplier'";
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			$a = $query->row();
			return  $a->coun;
		} else {
			return false;	
		}
	}
	function update_visit($agent_id)
	{

		$where = "transaction_details_id = $agent_id";
		$data = array(
			'visit' => 1
		);
		if ($this->db->update('transaction_details', $data, $where)) {
			return true;
		} else {
			return false;
		}
	}
	
	function agent_delete($agent_id)
	{
		$where = "agent_id = $agent_id";
		if ($this->db->delete('agent', $where)) {
			return true;
		} else {
			return false;
		}
	}
		function contact_info_detail_update_new($tran_id)
	{
		$this->db->select('*');
		$this->db->from('customer_contact_details');
		$this->db->where('customer_contact_details_id',$tran_id);
		$query = $this->db->get();	
		return $query->row();
	}
	function delete_id_b2c_markup($country, $api, $type)
	{
		$where = "country = '$country' AND api = '$api' AND type = '$type'";
		if ($this->db->delete('b2c_markup', $where)) {
			return true;
		} else {
			return false;
		}
	}
	function delete_id_b2b_markup($country, $api, $type)
	{
		$where = "country = '$country' AND api = '$api' AND type = '$type'";
		if ($this->db->delete('b2b_markup', $where)) {
			return true;
		} else {
			return false;
		}
	}
	
	function delete_b2c_markup($type)
	{
		$where = "type = '$type'";
		if ($this->db->delete('b2c_markup', $where)) {
			return true;
		} else {
			return false;
		}
	}
	function delete_b2b_markup($type)
	{
		$where = "type = '$type'";
		if ($this->db->delete('b2b_markup', $where)) {
			return true;
		} else {
			return false;
		}
	}
	
		function delete_b2b_markup_hotel($type)
	{
		$where = "type = '$type' AND hotel = 'all'";
		if ($this->db->delete('b2b_markup', $where)) {
			return true;
		} else {
			return false;
		}
	}
	
	function delete_b2b_markup_new_hotel1($type,$hotel)
	{
		$where = "type = '$type' AND hotel = '$hotel'";
		if ($this->db->delete('b2b_markup', $where)) {
			return true;
		} else {
			return false;
		}
	}
	function delete_b2b_markup_agent($type,$agent)
	{
		$where = "type = '$type' AND agent_id = '$agent'";
		if ($this->db->delete('b2b_markup', $where)) {
			return true;
		} else {
			return false;
		}
	}
	function delete_b2b_markup_new($type='',$agent='',$country='')
	{
		$where = "type = '$type' ";
		if($country != '')
		{
		$where .= "AND country = '$country'";
		}
		
		if($agent != '')
		{
		$where .= "AND agent_id = '$agent'";
		}
		if ($this->db->delete('b2b_markup', $where)) {
			return true;
		} else {
			return false;
		}
		
	}
	function deleteusers($id)
	{
		$where = "user_id = $id";
		if ($this->db->delete('user', $where)) {
			$this->db->delete('user_profile', $where);
			return true;
		} else {
			return false;
		}
	}
	function deleteusers_sa($id)
	{
		$where = "user_id = $id";
		if ($this->db->delete('sub_admin', $where)) {
			//$this->db->delete('user_profile', $where);
			return true;
		} else {
			return false;
		}
	}
	function deleteagent($id)
	{
		$where = "agent_id = $id";
		if ($this->db->delete('agent', $where)) {
			$this->db->delete('agent_acc_info', $where);
			$this->db->delete('agent_branch_details', $where);
			$this->db->delete('agent_markup', $where);
			$this->db->delete('agent_deposit', $where);
			return true;
		} else {
			return false;
		}
	}
	function agent_details($agent_id)
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
	
	function getCurrency()
	{
		$select = "SELECT * FROM currency_converter";
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;	
		}
	}
	
	function getCallCenter()
	{
		$select = "SELECT * FROM call_center";
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;	
		}
	}
	
	function edit_agent($agent_id, $currency, $call_center)
	{
	
		$data = array(
			'currency_type' => $currency,
			'call_center_id' => $call_center
			);
		
		if ($this->db->update('agent', $data)) {
			return true;
		} else {
			return false;
		}

	}
	
	function agent_deposit_details($agent_id)
	{
		$select = "SELECT *, date_format(deposited_date, '%d/%m/%Y') as deposited FROM agent_deposit WHERE agent_id = $agent_id";
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;	
		}
	}
	
	function agent_info($agent_id)
	{
		//$select = "SELECT a.name, i.balance_credit FROM agent a, agent_acc_info i WHERE a.agent_id = $agent_id and i.agent_id = a.agent_id limit 1";
		$select = "SELECT a.name, i.balance_credit,a.currency_type FROM agent a left join agent_acc_info i on i.agent_id = a.agent_id WHERE a.agent_id = $agent_id  limit 1";
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->row();
		} else {
			return false;	
		}
	}
	
	function add_agent_deposit($agent_id, $amount_credit, $deposited_date, $deposit_type='', $deposited_bank='', $deposited_branch='', $deposited_city='', $remarks='', $transaction_id='', $cheque_date = '', $cheque_number='')
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
			'status' => 'Accepted'
			);
			
		$this->db->insert('agent_deposit', $data);
		$id = $this->db->insert_id();
		if (!empty($id)) {
			// Update Agent Acc info
			$select = "SELECT agent_acc_info_id FROM agent_acc_info where agent_id = $agent_id limit 1";
			$query=$this->db->query($select);
			if ($query->num_rows() > 0)
			{
				$qry = "update agent_acc_info set balance_credit = (balance_credit + $amount_credit), last_credit = $amount_credit where agent_id = $agent_id";
			} else {
				$qry = "insert into agent_acc_info set agent_id = $agent_id, balance_credit = $amount_credit, last_credit = $amount_credit";
			}
			$query=$this->db->query($qry);
			
			return true;
		} else {
			return false;
		}

	}
	
	function getAgentMarkups($agent_id)
	{
		$select = "SELECT m.agent_markup_id, a.api_name, a.api_id, m.commission, m.markup FROM api a LEFT JOIN agent_markup m ON m.api_id = a.api_id WHERE a.active = 1 and m.agent_id = $agent_id";
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;	
		}
	}
	
	function getAgentMarkupInfo($agent_id,$api_id)
	{
		/*if (!empty($agent_markup_id)) {
			$select = "SELECT m.agent_markup_id, m.agent_id, a.api_id, a.api_name, m.commission, m.markup FROM api a, agent_markup m where m.api_id = a.api_id and m.agent_markup_id = $agent_markup_id";
		} else {
			$select = "SELECT api_id, api_name FROM api";
		}*/
		
		
		$select = "SELECT m.agent_markup_id, m.agent_id, a.api_id, a.api_name, m.commission, m.markup FROM api a, agent_markup m where m.api_id = a.api_id and m.agent_id = $agent_id and m.api_id = $api_id";
			
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->row();
		} else {
			$select = "SELECT api_id, api_name FROM api where api_id = $api_id";
			$query=$this->db->query($select);
			if ($query->num_rows() > 0)
			{
				return $query->row();
			} else {
				return false;
			}
		}
	}
	
	function edit_agent_markup($commission, $markup, $agent_id, $api_id)
	{
		$select = "SELECT agent_markup_id FROM agent_markup where api_id = $api_id and agent_id = $agent_id";
			$query=$this->db->query($select);
			if ($query->num_rows() > 0)
			{
				$where = "api_id = $api_id and agent_id = $agent_id";
				$data = array(
					'commission' => $commission,
					'markup' => $markup
				);
				if ($this->db->update('agent_markup', $data, $where)) {
					return true;
				} else {
					return false;
				}
			
			} else {
				$data = array(
				'commission' => $commission,
				'markup' => $markup,
				'agent_id' => $agent_id,
				'api_id' => $api_id
				);
				if ($this->db->insert('agent_markup', $data)) {
					return true;
				} else {
					return false;
				}
			}
		
		
	}
	
	function __agent_top_cities($agent_id)
	{
		$select = "SELECT c.city_name, c.city_id, (SELECT t2.citi_id FROM top_cities t2 WHERE t2.agent_id = $agent_id AND t2.citi_id = c.city_id) AS selected_citi FROM cities c LEFT JOIN top_cities t ON c.city_id = t.citi_id";
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;	
		}
	}
	//cccc
	function agent_top_cities($agent_id)
	{
		$select = "SELECT c.city_name, c.city_id, (SELECT t2.citi_id FROM top_cities t2 WHERE t2.agent_id = $agent_id AND t2.citi_id = c.city_id) AS selected_citi FROM cities c LEFT JOIN top_cities t ON c.city_id = t.citi_id";
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;	
		}
	}
	
	function update_agent_top_cities($agent_id, $top_cities)
	{
		//$where = "agent_id = $agent_id";
		//$this->db->delete('top_cities', $where);

		//for ($i = 0; $i < count($top_cities); $i++)
		//{
			/*$select = "SELECT top_citi_id FROM top_cities where agent_id = $agent_id and citi_id = $top_cities[$i] limit 1";
			$query=$this->db->query($select);
			if ($query->num_rows() == 0)
			{*/
				//$qry = "insert into top_cities set agent_id = $agent_id, citi_id = $top_cities[$i]";
				//$query=$this->db->query($qry);
			//}
			
		//}
		
		$select = "SELECT top_citi_id FROM top_cities where agent_id = $agent_id and citi_id = $top_cities limit 1";
		$query=$this->db->query($select);
		if ($query->num_rows() == 0)
		{
		
				$data = array(
					'citi_id' => $top_cities,
					'agent_id' => $agent_id
					);
					
					//print_r($data); exit;
					
				$this->db->insert('top_cities', $data);
				$id = $this->db->insert_id();
				if (!empty($id)) {
					return true;
				} else {
					return false;
				}
		}
		return true;
	}
	
	function getTopCities($agent_id)
	{
		$select = "SELECT t.top_citi_id, c.city_name FROM top_cities t, api_hotels_city c WHERE t.citi_id = c.city_id AND t.agent_id = $agent_id";
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;	
		}
	}
	
	function getCurrencyData()
	{
		$select = "SELECT * FROM currency_converter";
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;	
		}
	}
	
	function getCurrencyValue($cur_id)
	{
		$select = "SELECT * FROM currency_converter where cur_id = $cur_id";
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->row();
		} else {
			return false;	
		}
	}
	
	function edit_currency_converter($cur_id, $value)
	{

		$where = "cur_id = $cur_id";
		$data = array(
			'value' => $value
		);
		if ($this->db->update('currency_converter', $data, $where)) {
			return true;
		} else {
			return false;
		}
	}
	
	
	//----- Get Currency Converter -----/
	function currency_converter($from_Currency,$to_Currency,$amount) 
	{
		$amount = urlencode($amount);
		$from_Currency = urlencode($from_Currency);
		$to_Currency = urlencode($to_Currency);
		$url = "http://www.google.com/ig/calculator?hl=en&q=$amount$from_Currency=?$to_Currency";
		$ch = curl_init();
		$timeout = 0;
		curl_setopt ($ch, CURLOPT_URL, $url);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch,  CURLOPT_USERAGENT , "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)");
		curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		$rawdata = curl_exec($ch);
		curl_close($ch);
		$data = explode('"', $rawdata);
		$data = explode(' ', $data['3']);
		$var = $data['0'];
		return round($var,3);
	}

	
	
	
	
	function update_user($id,$status)
	{

		$where = "user_id = $id";
		$data = array(
			'status' => $status
		);
		if ($this->db->update('user', $data, $where)) {
			return true;
		} else {
			return false;
		}
	}function update_user_subadmin($id,$status)
	{

		$where = "user_id = $id";
		$data = array(
			'status' => $status
		);
		if ($this->db->update('sub_admin', $data, $where)) {
			return true;
		} else {
			return false;
		}
	}
	function update_agent($id,$status)
	{

		$where = "agent_id = $id";
		$data = array(
			'active' => $status
			
			
		);
		if ($this->db->update('agent', $data, $where)) {
			return true;
		} else {
			return false;
		}
	}
	function update_b2c_markup($id,$status)
	{

		
		if($status == 2)
		{
		$where2 = "id = $id";
		if ($this->db->delete('b2c_markup', $where2)) {
			return true;
		} else {
			return false;
		}
		}
		else
		{
			$where = "id = $id";
			$data = array(
				'status' => $status
			);
			if ($this->db->update('b2c_markup', $data, $where)) {
			return true;
			} else {
				return false;
			}
		}
	}
	
	function update_b2b_markup($id,$status)
	{

		
		if($status == 2)
		{
		$where2 = "id = $id";
		if ($this->db->delete('b2b_markup', $where2)) {
			return true;
		} else {
			return false;
		}
		}
		else
		{
			$where = "id = $id";
			$data = array(
				'status' => $status
			);
			if ($this->db->update('b2b_markup', $data, $where)) {
			return true;
			} else {
				return false;
			}
		}
	}
	
	function currency_delete($cur_id)
	{

		$where = "cur_id = $cur_id";
		if ($this->db->delete('currency_converter', $where)) {
			return true;
		} else {
			return false;
		}
	}
	
	function getAPIs()
	{
		$select = "SELECT *, if (active = 1, 'Active', 'Inactive') as active_str FROM api";
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;	
		}
	}
	
	function getAPI($api_id)
	{
		$select = "SELECT * FROM api where api_id = $api_id";
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->row();
		} else {
			return false;	
		}
	}
	
	function edit_api($api_id, $active)
	{

		$where = "api_id = $api_id";
		$data = array(
			
			'active' => $active
		);
		if ($this->db->update('api', $data, $where)) {
			return true;
		} else {
			return false;
		}
	}
	
	function getAgentBranch($agent_id)
	{
		$select = "SELECT branch_id FROM agent_branch_details where agent_id = $agent_id and status = 1";
		
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			$branch = $query->result();
			$branch_str = '';
			for ($b = 0; $b < count($branch); $b++)
				{
					$branch_str.=$branch[$b]->branch_id.',';
				}
			$branch_str = rtrim($branch_str,',');
			return $branch_str;
				
		} else {
			return false;	
		}
	}
	
	function search_booking_details($booking_number = '', $passenger_name = '', $booking_status, $sel_date_type = '', $fdate = '',$todate = '', $agent=0, $api=0)
	{

		$where='';
		
		
	
		/*if(!empty($booking_status)){
			$where.= " where t.status = '$booking_status'";
		} else {
			$where.= " where t.status = 'confirmed'";
		}*/
		if(!empty($booking_status)){
			$where.= " t.status = '$booking_status'";
		}
		
		
		/*if($booking_number != '') {
			$where.= " and t.booking_number ='".$booking_number."' ";
		}*/
		
		if($booking_number != '') {
			if (empty($where)) {
				$where.= " t.booking_number ='".$booking_number."' ";
			} else {
				$where.= " and t.booking_number ='".$booking_number."' ";
			}
		}
		
		/*if(!empty($agent)) {
		
			if ($branch = $this->getAgentBranch($agent)) {
				
				$where.= " and (t.user_id = $agent or t.branch_id in($branch))";
			} else {
				$where.= " and t.user_id =".$agent;
			}
		}*/
		
		if(!empty($agent)) {
		
			if ($branch = $this->getAgentBranch($agent)) {
				if (empty($where)) {
					$where.= " (t.user_id = $agent or t.branch_id in($branch))";
				} else {
					$where.= " and (t.user_id = $agent or t.branch_id in($branch))";
				}
				
			} else {
				if (empty($where)) {
					$where.= " t.user_id =".$agent;
				} else {
					$where.= " and t.user_id =".$agent;
				}
				
			}
		}
		
		/*if(!empty($api)) {
			$where.= " and t.api_id = $api";
		}*/
		
		if(!empty($api)) {
			if (empty($where)) {
				$where.= " t.api_id = $api";
			} else {
				$where.= " and t.api_id = $api";
			}
			
		}
	   
	  
		/*if($passenger_name!=''){
			$where.= " and (c.first_name ='".$passenger_name."' or (c.middle_name ='".$passenger_name."') or (c.last_name ='".$passenger_name."')) ";
		}*/
		if($passenger_name!=''){
			if (empty($where)) {
				$where.= " (c.first_name ='".$passenger_name."' or (c.middle_name ='".$passenger_name."') or (c.last_name ='".$passenger_name."')) ";
			} else {
				$where.= " and (c.first_name ='".$passenger_name."' or (c.middle_name ='".$passenger_name."') or (c.last_name ='".$passenger_name."')) ";
			}
			
		}
	
		/*if($sel_date_type!= '' &&  $fdate!= '' &&  $todate!= ''){
			 if($sel_date_type==1){
				 $where.= " and h.check_in between '".$fdate."'  and '".$todate."' ";
			 }
			 else{
			 $where.= " and h.voucher_date between '".$fdate."'  and '".$todate."' ";
			 }
		}*/
		
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
		
		if (!empty($where)) {
			$where="and ".$where;
		}
		
		$where.=' and t.booking_number !=""';
		
		
		//$select = "SELECT t.hotel_booking_id, h.check_in, h.check_out, h.cancel_tilldate, t.booking_number, t.amount, t.net_amount, t.created_date, CONCAT(c.first_name, ' ', c.middle_name, ' ', c.last_name) as name FROM hotel_booking_info h left join transaction_details t on h.customer_contact_details_id = t.customer_contact_details_id left join customer_contact_details c on c.customer_contact_details_id = h.customer_contact_details_id $where";
		
		$select = "SELECT t.*, h.check_in, h.check_out, h.cancel_tilldate, CONCAT(c.first_name, ' ', c.middle_name, ' ', c.last_name) as name FROM hotel_booking_info h, customer_contact_details c, transaction_details t where h.customer_contact_details_id = t.customer_contact_details_id and c.customer_contact_details_id = h.customer_contact_details_id $where";
	
				 
		//echo $select; exit;
					
		$query = $this->db->query($select);
		
		//echo $this->db->last_query();exit;
		
		if ( $query->num_rows > 0 )
		{ 
			return $query->result();
		}
		return false;
	
	}	
	
	function getAllAgent()
	{
		$select = "SELECT agent_id, name FROM agent WHERE agent_type = 2 AND active = 1";
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;	
		}
	}
	function getAllAgent_new()
	{
		$select = "SELECT agent_id, name,company_name  FROM agent WHERE active = 1";
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;	
		}
	}
	
	function getDepositRequest()
	{
		$select = "SELECT r.*, a.name, a.email_id, a.office_phone FROM agent_deposit r, agent a WHERE a.agent_id = r.agent_id";
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;	
		}
	}
	
	function getDepositRequestInfo($deposit_id)
	{
		$select = "SELECT r.*, a.name, a.email_id, a.office_phone FROM agent_deposit r, agent a WHERE a.agent_id = r.agent_id and deposit_id = $deposit_id";
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->row();
		} else {
			return false;	
		}
	}
	
	function editDepositRequest($deposit_id, $status, $amount_credit, $agent_id)
	{

		$where = "deposit_id = $deposit_id";
		$data = array(
			'status' => $status
		);
		
		if ($this->db->update('agent_deposit', $data, $where)) {
			if ($status == 'Accepted') {
			// Update Agent Acc info
			$select = "SELECT agent_acc_info_id FROM agent_acc_info where agent_id = $agent_id limit 1";
			$query=$this->db->query($select);
			if ($query->num_rows() > 0)
			{
				$qry = "update agent_acc_info set balance_credit = (balance_credit + $amount_credit), last_credit = $amount_credit where agent_id = $agent_id";
			} else {
				$qry = "insert into agent_acc_info set agent_id = $agent_id, balance_credit = $amount_credit, last_credit = $amount_credit";
			}
			$query=$this->db->query($qry);
			}
		}
		return true;
		
	}
	
	function getCountries()
	{
		$select = "SELECT DISTINCT(country_name),city_id FROM api_hotels_city group by country_name ORDER BY country_name";
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;	
		}
	}
	function getCountries_new()
	{
		$select = "SELECT country_name,city_id FROM api_hotels_city group by country_name ORDER BY country_name";
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;	
		}
	}
	
	function getCities($country)
	{
		
		$select = "SELECT city_id, city_name FROM api_hotels_city where country_name = '$country' ORDER BY city_name";
		//echo $select; exit;
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;	
		}
	}
	
	function editMarkupMaster($agent, $api, $country, $city, $commission, $markup)
	{
		if ($agent == 'all') {
			$agent_select = "SELECT agent_id FROM agent where agent_type = 2 and active = 1";
			$agent_query = $this->db->query($agent_select);
			if ($agent_query->num_rows() > 0)
			{
				$agent_result = $agent_query->result();
				for ($g =0; $g < count($agent_result); $g++) {
					$agent = $agent_result[$g]->agent_id;
					if ($api == 'all') {
						$this->all_api($agent, $api, $country, $city, $commission, $markup);
					} else {
						$this->editMarkupMasterC($agent, $api, $country, $city, $commission, $markup);
					}
				}
			}
			return true;
			
			
		} // if ($agent == 'all')  
		elseif ($api == 'all') {
			$this->all_api($agent, $api, $country, $city, $commission, $markup);
			return true;
			
			
		} // if ($api == 'all') 
		elseif ($city == 'all') {
			
			$this->editMarkupMasterC($agent, $api, $country, $city, $commission, $markup);
			return true;
			
			
		} // if ($city == 'all') 
		else {
			//return $this->editMarkupMasterF($agent, $api, $country, $city, $commission, $markup);
			return $this->editMarkupMasterC($agent, $api, $country, $city, $commission, $markup);
		}
	}
	
	function all_api($agent, $api, $country, $city, $commission, $markup) {
		$api_select = "SELECT api_id FROM api";
			$api_query = $this->db->query($api_select);
			if ($api_query->num_rows() > 0)
			{
				$api_result = $api_query->result();
				for ($a =0; $a < count($api_result); $a++) {
					$api = $api_result[$a]->api_id;
					$this->editMarkupMasterC($agent, $api, $country, $city, $commission, $markup);
				}
			}
	}
	
	function editMarkupMasterC($agent, $api, $country, $city, $commission, $markup) {
		if ($city == 'all') {
			$city_select = "SELECT city_id FROM api_hotels_city where country_name = '$country'";
			$city_query=$this->db->query($city_select);
			if ($city_query->num_rows() > 0)
			{
				$city_result = $city_query->result();
				for ($c =0; $c < count($city_result); $c++) {
					$city = $city_result[$c]->city_id;
					//echo $city.'<br />';
					$this->editMarkupMasterF($agent, $api, $country, $city, $commission, $markup);
				}
			}
		} else {
			$this->editMarkupMasterF($agent, $api, $country, $city, $commission, $markup);
		}
		return true;
	}
	
	function editMarkupMasterF($agent, $api, $country, $city, $commission, $markup) {
		$select = "SELECT rate_master_id FROM rate_master where agent_id = $agent and api_id = $api and city_id = $city";
			
			$query=$this->db->query($select);
			if ($query->num_rows() > 0)
			{
				$result = $query->row();
				$rate_master_id = $result->rate_master_id;
				
				$data = array(
				'commission' => $commission,
				'markup' => $markup
				);
			
				$where = "rate_master_id = $rate_master_id";
				if ($this->db->update('rate_master', $data, $where)) {
					return true;
				} else {
					return false;
				}
			
			} else {
				$data = array(
				'agent_id' => $agent,
				'api_id' => $api,
				'city_id' => $city,
				'markup' => $markup,
				'commission' => $commission
				);
			
				if ($this->db->insert('rate_master', $data)) {
					return true;
				} else {
					return false;
				}
			}
	}
	
	function fetch_master_markup($city_id, $agent_id, $api_id)
	{
		$select = "SELECT commission, markup FROM rate_master where agent_id = $agent_id and api_id = $api_id and city_id = $city_id limit 1";
		//echo $select; exit;
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->row();
		} else {
			return false;
		}
	}
	
	function delete_top_city($top_citi_id)
	{
		$where = "top_citi_id = $top_citi_id";
		if ($this->db->delete('top_cities', $where)) {
			return true;
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
function cancel_booking($booking_number)
	{
					$data = array(
					'status' => 'cancelled'
					);
		
					$where = "booking_number = '$booking_number'";
			
					$this->db->update('transaction_details', $data, $where);
	}
	
	function book_detail_view_voucher1($book_id)
	{


		   $this->db->select('*');
				$this->db->from('hotel_booking_info');

					$this->db->where('hotel_booking_info_id',$book_id);
				//$this->db->where('agent_id', $this->session->userdata('agentid'));

				$query=$this->db->get();
				//FROM tarecho $this->db->last_query();exit;
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
		//echo $this->db->last_query();exit;
			if($query->num_rows() ==''){
				return '';
			}else{
				return $query->row();
			}

	}


	function transation_details_forStatus($id)
	{
		$que="select * from  transaction_details WHERE 	transaction_details_id = ".$id." ";
		$query= $this->db->query($que);
		if($query->num_rows() ==''){
			return '';
		}else{
			return $query->row();
		}
	}

	function change_booking_status_action($bookingStatus, $id)
	{
		if($bookingStatus == "confirmed"){
			$bookingStatus = "Confirmed";
		}
		if($bookingStatus == "confirmationPendingDueToNonPayment"){
			$bookingStatus = "Confirmation pending due to non payment!";
		}
		if($bookingStatus == "pendingForConfirmation"){
			$bookingStatus = "Pending for Confirmation";
		}
		if($bookingStatus == "roomNotAvailable"){
			$bookingStatus = "Room Not Available";
		}
		$where = "transaction_details_id = $id";
		$data = array(
			'status' => $bookingStatus
		);
		if ($this->db->update('transaction_details', $data, $where)) {
			return true;
		} else {
			return false;
		}
	}
	
	function pass_info_detail($tran_id)
	{
			$que="select * from  customer_info_details WHERE customer_info_details_id = ".$tran_id." or parent_id = ".$tran_id."";
		
	
		$query= $this->db->query($que);
		//echo $this->db->last_query();exit;
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
	
	
	//----- Suppliers List -----/
	function getSuppliers($status='')
	{		
		$where = '';
		if ($status == 'active') {
			//$where = 'and a.active = 1';
			$where = 'and active = 1';	
		} elseif ($status == 'inactive') { 
			$where = 'and active = 0';	
		}
		
		/*if ($status == 'active') {
			$select = "SELECT a.*, i.balance_credit FROM agent a left join agent_acc_info i on i.agent_id = a.agent_id where agent_type = 2 $where";
		} else {*/
			$select = "SELECT * FROM supplier $where";
		//}
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;	
		}
	}
	
	//----- Suppliers List -----/
	function getSuppliers_active()
	{		
		$where = '';
		//$where = 'and a.active = 1';
			
		$select = "SELECT * FROM supplier where active = 1 $where";
		
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;	
		}
	}
	
	//----- Suppliers List -----/
	function countSupplierStatus()
	{		
		$select = "select count(*) as tot_suppliers, (select count(*) as active from supplier a where active=1) as active, (select count(*) as active from supplier a where active=0) as inactive from supplier limit 1";
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->row();
		} else {
			return false;	
		}
	}
	

	//-----Get Suppliers Edit -----/
	function getsupplier_edit1($id)
	{
		//$where = " and a.agent_id = '$id'";	
		$select = "SELECT * FROM supplier where agent_id = '$id'";
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->row();
		} else {
			return false;	
		}
	}
	
	//----- Update Suppliers Status -----/
	function update_supplier($id,$status)
	{
		$where = "agent_id = $id";
		$data = array(
			'active' => $status
		);
		if ($this->db->update('supplier', $data, $where)) {
			return true;
		} else {
			return false;
		}
	}
	
	//----- Get Suppliers Details -----/
	function getsupplier_editsss1($id)
	{		
		$select = "SELECT * FROM supplier where agent_id = '$id'";
		$query=$this->db->query($select);
		if ($query->num_rows() > 0)
		{
			return $query->row();
		} else {
			return false;	
		}
	}
	
	//----- Delete Suppliers Profile Detials -----/
	function deleteSupplier($id)
	{
		$where = "agent_id = $id";
		if ($this->db->delete('supplier', $where)) {
			return true;
		} else {
			return false;
		}
	}
	
	//----- Create New Supplier -----/
	function add_supplier($name, $company_name, $address, $country, $city, $postal_code, $office_phone, $mobile_no,$currency, $email_id, $password, $hotel_logo,$markets='')
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
			'hotel_logo' => $hotel_logo,
			'active' => 0,
			'last_visit' => ''
			);
			
			$this->db->set('register_date', 'NOW()', FALSE); 
		
		$this->db->insert('supplier', $data);
		$id = $this->db->insert_id();
		if (!empty($id)) {
			return true;
		} else {
			return false;
		}
	}
	
	
	//----- View Supplier's Hotels -----/
	function view_hotels($id)
	{
		$select = "SELECT * FROM sup_hotels where sup_id = '$id'";
		$query=$this->db->query($select);
		if($query->num_rows() ==''){
			return '';
		}
		else{
			return $query->result();
		}
	}
	
	function get_hotel()
	{
		$select = "SELECT * FROM sup_hotels";
		$query=$this->db->query($select);
		if($query->num_rows() ==''){
			return '';
		}
		else{
			return $query->result();
		}
	}
	
	function get_hotel_id($hotel)
	{
		$select = "SELECT * FROM sup_hotels where hotel_name='$hotel'";
		$query=$this->db->query($select);
		if($query->num_rows() ==''){
			return '';
		}
		else{
			return $query->result();
		}
	}
	
	//----- Update Supplier's Hotel Status -----/
	function update_hotel_status($id,$status)
	{
		if($status == 2)
		{
			$where2 = "sup_hotel_id = $id";
			if ($this->db->delete('sup_hotels', $where2)) {
				return true;
			} else {
				return false;
			}
		}
		else
		{
			$where = "sup_hotel_id = $id";
			$data = array(
				'status' => $status
			);
			if ($this->db->update('sup_hotels', $data, $where)) {
				return true;
			} else {
				return false;
			}
		}
	}
	
	//----- Supplier's Hotels Refresh -----/
	function hotel_refresh()
	{
		$where = "api = 'crs'";
		if ($this->db->delete('api_permanent', $where)) {
			//return true;
		} else {
			return false;
		}
		
		$this->db->select('*')
			->from('sup_hotels')
			->where('status', 1);
		$query = $this->db->get();
		$count = $query->num_rows; 
		foreach($query->result_array() as $row)
		{
			$api = 'crs';
			$hotel_code = 'CRS'.$row['sup_hotel_id'];
			$hotel_id = $row['sup_hotel_id'];
			$hotel_name = $row['hotel_name'];
			$city = $row['city'];
			
			if($row['star'] == 'Standard')
			{
				$star ='6';
			}
			else if($row['star'] == 'Deluxe')
			{
				$star = '7';
			}
			else
			{
				$star = $row['star'];
			}
			$description = $row['descrip'];
			$description = addslashes($description);
			$location = $row['detail_location'];
			$location = addslashes($location);
			$latitude = $row['latitude'];
			$longitude = $row['longitude'];
			$address = $row['address'];
			$address = addslashes($address);
			$phone = $row['res_phone'];
			$fax = $row['res_fax'];
			$email = $row['res_email'];
			$web = $row['website'];
			$checkinfrom = $row['checkinfrom'];
			$checkoutfrom = $row['checkoutfrom'];
			$checkinto = $row['checkinto'];
			$checkoutto = $row['checkoutto'];
			$checkin_guest_after = $row['checkin_guest_after'];
			$checkout_guest_after = $row['checkout_guest_after'];
			$key_collection = $row['key_collection'];
			$key_collection_desc = $row['key_collection_desc'];
			$key_collection_desc = addslashes($key_collection_desc);
			$tax = $row['tax'];
			$service_charge = $row['service_charge'];
			$detail_location = $row['detail_location'];
			$detail_location = addslashes($detail_location);
			$nearby_airport = $row['nearby_airport'];
			$nearby_transport = $row['nearby_transport'];
			$nearby_placeinterest = $row['nearby_placeinterest'];
			
			$targetFile = '';
				$this->db->select('image_name')
				->from('sup_accomodation_pictures')
				->where('sup_list_id', $row['sup_hotel_id'])
				->where('status', 1);
				$query1 = $this->db->get();
				foreach($query1->result_array() as $row1)	{
					if(isset($row1['image_name']) && $row1['image_name'] != ''){
					$image = $row1['image_name']; 
					$targetFile = WEB_DIR_FRONT.'supplier_hotels_images/'.$row1['image_name']; 
					}
				}
				
				$room_facilities='';
				$this->db->select('facility_name')
				->from('sup_accomodation_facility')
				->where('hotel_id', $row['sup_hotel_id'])
				->where('hotel_or_room', 0);
				$this->db->join('sup_hotel_room_facility', 'sup_hotel_room_facility.sup_fac_id = sup_accomodation_facility.sup_fac_id');
				
				$query2 = $this->db->get();
				if($query2->num_rows() > 0){
				foreach($query2->result_array() as $row2)	{
					$room_facilities.= $row2['facility_name'].', '; 
				}
				} else { $room_facilities=''; };
				
				$hotel_facilities='';
				$this->db->select('facility_name')
				->from('sup_accomodation_facility')
				->where('hotel_id', $row['sup_hotel_id'])
				->where('hotel_or_room', 1);
				$this->db->join('sup_hotel_room_facility', 'sup_hotel_room_facility.sup_fac_id = sup_accomodation_facility.sup_fac_id');
				
				$query3 = $this->db->get();
				if($query3->num_rows() > 0){
				foreach($query3->result_array() as $row3)	{
					$hotel_facilities.= $row3['facility_name'].', '; 
				}
				} else { $hotel_facilities=''; };
				
			
			$sql="INSERT INTO api_permanent(api, hotel_code, hotel_id, hotel_name, city, star, image, description, location, latitude, longitude, address, phone, fax, chain, postal, email, web, coun, room_facilities, hotel_facilities, checkinfrom, checkoutfrom, checkinto, checkoutto, checkin_guest_after, checkout_guest_after, key_collection, key_collection_desc, tax, service_charge, detail_location, nearby_airport, nearby_transport, nearby_placeinterest) VALUES('$api', '$hotel_code', '$hotel_id', '$hotel_name', '$city', '$star', '$targetFile', '$description', '$location', '$latitude', '$longitude', '$address', '$phone', '$fax', '', '', '$email', '$web', '', '$room_facilities', '$hotel_facilities', '$checkinfrom', '$checkoutfrom', '$checkinto', '$checkoutto', '$checkin_guest_after', '$checkout_guest_after', '$key_collection', '$key_collection_desc', '$tax', '$service_charge', '$detail_location', '$nearby_airport', '$nearby_transport', '$nearby_placeinterest')"; 
			$rs=$this->db->query($sql);
			$id = $this->db->insert_id();
		}
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
	
	function upload_banner_image($c1,$left_ban1)
	{
		 
		 $data1 = array(
			'image_name' => $c1,
			'file_path' => $left_ban1,
			);
			$this->db->set('date', 'NOW()', FALSE); 
		$this->db->insert('banner_images', $data1);
		//echo $this->db->last_query();exit;
		$id = $this->db->insert_id();
	}
	
	function get_banner()
	{
		
		$select = "SELECT * FROM banner_images";
		
		
		
		//echo $select;exit;
		$query=$this->db->query($select);
	
		if ($query->num_rows() > 0)
		{
			return $query->result();
		} else {
			return false;
		}
	}
	
	//----- Update Supplier's Hotel Status -----/
	function update_banner_status($banner_id,$status)
	{
		if($status == 2)
		{
			$where2 = "banner_id = $banner_id";
			if ($this->db->delete('banner_images', $where2)) {
				return true;
			} else {
				return false;
			}
		}
		else
		{
			$where = "banner_id = $banner_id";
			$data = array(
				'status' => $status
			);
			if ($this->db->update('banner_images', $data, $where)) {
				return true;
			} else {
				return false;
			}
		}
	}
        
       
	function getnewsinfo()
	{
		$news_select="SELECT *FROM `latest_news`";
		$query=$this->db->query($news_select);
		if($query->num_rows()>0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
	
	function updatenewsinfo($updated)
	{
		$data=array(
		'news'=>$updated,
		);
		$this->db->update('latest_news',$data);
		return true;
	}
	function manage_user1()
	{
		$this->db->select('*');
		$this->db->from('agent');
        //$this->db->join('agent_profile_details','agent_profile_details.agentid=deposit_details.agentid','right');
        $this->db->where('active',1);
		$query=$this->db->get();
		if($query->num_rows()=='')
		{
			return '';
		}else{
			
		return $query->result();
		}
	}
	function insert_new_offer($agent_ids,$updated)
	{
			
		$data=array('offer_content'=>$updated,
		             'status' => '1'
		             );
										
		$this->db->set('last_updated', 'NOW()', FALSE);		
		$this->db->insert('latest_offers', $data);
		$insert_id = $this->db->insert_id();
					
		for($i=0;$i<count($agent_ids);$i++)
		{
			$data1=array('offer_id'=>$insert_id,
		             'agent_id' => $agent_ids[$i]
		             );
	    	 
			$this->db->insert('latest_agent_offers',$data1);
		}
		return true;
	}
	function get_offers_list()
    {
		
		$offers_select = "SELECT * FROM latest_offers";
		$query=$this->db->query($offers_select);
		if($query->num_rows()>0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
	function get_agency_names($offer_id)
    {
		$this->db->select('*');
		$this->db->from('latest_agent_offers');
		$this->db->where('offer_id',$offer_id);
		$query=$this->db->get();
		if($query->num_rows()=='')
		{
			return '';
		}else{
			
		return $query->result();
		}
	}
	function get_agency_name($agent_id)
    {
		$this->db->select('*');
		$this->db->from('agent');
		$this->db->where('agent_id',$agent_id);
		$query=$this->db->get();
		if ($query->num_rows() > 0)
		{
			$row = $query->row();
			return $row->name.',&nbsp;';
		}
		else
		{
			return false;	
		}
		
	}
	function edit_offer_status($offer_id,$status)		
	{
		if($status == 2)
		{
		$where2 = "offer_id = $offer_id";
		if ($this->db->delete('latest_offers', $where2)) {
			return true;
		} else {
			return false;
		}
		}
		else
		{
			$where = "offer_id = $offer_id";
			$data = array(
				'status' => $status
			);
			if ($this->db->update('latest_offers', $data, $where)) {
			return true;
			} else {
				return false;
			}
		}
	}
	function get_agent_edited_offer($offer_id)
    {
		
		$offers_select = "SELECT * FROM latest_offers WHERE offer_id ='$offer_id'";
		$query=$this->db->query($offers_select);
		if($query->num_rows()>0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
	function check_agent_offer($agentid,$offer_id)
    {
		
		$offers_select = "SELECT * FROM latest_agent_offers WHERE offer_id ='$offer_id' and agent_id='$agentid'";
		$query=$this->db->query($offers_select);
		if($query->num_rows()>0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
	function update_agent_offer($agent_ids,$updated,$id)
	{
		$this->db->where(array('offer_id'=>$id));
		$this->db->delete('latest_offers');
		
		
		$data=array('offer_content'=>$updated,
		             'status' => '1'
		             );
										
		$this->db->set('last_updated', 'NOW()', FALSE);		
		$this->db->insert('latest_offers', $data);
		$insert_id = $this->db->insert_id();
		
		$this->db->where(array('offer_id'=>$id));
		$this->db->delete('latest_agent_offers');
		
		for($i=0;$i<count($agent_ids);$i++)
		{
			$data1=array('offer_id'=>$insert_id,
		             'agent_id' => $agent_ids[$i]
		             );
	    	 
			$this->db->insert('latest_agent_offers',$data1);
		}
		return true;
	}
	function get_avialble_markets()
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
	public function add_market($value)
	{
		$data = array(
					'market_name' => $value,
					'status' => '1');
		$this->db->insert('sup_hotel_markets',$data);
		return true;
		
	}
	function update_market_management($id,$status)
	{
		if($status == 2)
		{
		$where2 = "market_id = $id";
		if ($this->db->delete('sup_hotel_markets', $where2)) {
			return true;
		} else {
			return false;
		}
		}
		else
		{
			$where = "market_id = $id";
			$data = array(
				'status' => $status
			);
			if ($this->db->update('sup_hotel_markets', $data, $where)) {
			return true;
			} else {
				return false;
			}
		}
	}
	function get_all_countries()
	{
		$this->db->select('*');
		$this->db->from('country');
		$this->db->order_by('name');
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
	public function add_sup_market_country($id,$country_id)
	{
		
		$market_country = $this->admin_model->get_sup_market_country_available($id,$country_id);
		if(isset($market_country) && $market_country!='' )
		{
			
		}else {
				$data = array(
						'market_id' => $id,
						'country_id' => $country_id);
			$this->db->insert('sup_market_country',$data);
		}
		return true;
		
	}
	function get_sup_market_country_available($id,$country_id)
	{
		$this->db->select('*');
		$this->db->from('sup_market_country');
		$this->db->where('market_id',$id);
		$this->db->where('country_id',$country_id);
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

	function get_all_country_avialable($id)
	{
		$this->db->select('*');
		$this->db->from('sup_market_country');
		$this->db->where('market_id',$id);
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
	function get_country_name($id)
	{
		$this->db->select('*');
		$this->db->from('country');
		$this->db->where('country_id',$id);
		$query = $this->db->get();
		if($query->num_rows()>0)
		{
			$row = $query->row();
			return $row->name;
		}
		else
		{
			return false;
		}
	}
	function update_market_country($id)
	{
		
		$where2 = "sup_market_country_id = $id";
		if ($this->db->delete('sup_market_country', $where2)) {
			return true;
		} else {
			return false;
		}
		
	}
	function update_currency_converter($id,$status)
	{

		
		if($status == 2)
		{
		$where2 = "cur_id= $id";
		if ($this->db->delete('currency_converter', $where2)) {
			return true;
		} else {
			return false;
		}
		}
		else
		{
			$where = "cur_id = $id";
			$data = array(
				'status' => $status
			);
			if ($this->db->update('currency_converter', $data, $where)) {
			return true;
			} else {
				return false;
			}
		}
	}


	function view_trans_detail_b2b_byID($agent_id)
{
	$this->db->select('*');
	$this->db->from('transaction_details');
	
	
	$this->db->where('user_type', 2);
	$this->db->where('user_id', $agent_id);
	$this->db->join('hotel_booking_info', 'transaction_details.hotel_booking_id = hotel_booking_info.hotel_booking_info_id');
	//$this->db->join('customer_contact_details', 'transaction_details.customer_contact_details_id = customer_contact_details.customer_contact_details_id');
	
	$query=$this->db->get();
	//echo $this->db->last_query();exit;
	if($query->num_rows() ==''){
		return '';
	}else{
		return $query->result();
	}
}


function debitBookingAmount($agent_id, $branch_id = 0, $amount)
		{
			$sql="SELECT balance_credit FROM agent_acc_info WHERE agent_id = $agent_id";
			$query=$this->db->query($sql);
			//===========================================
			$val=$query->result();
			$bal= $val[0]->balance_credit;
			if($bal>=$amount){
			if ($branch_id == 0) {
				$qry = "update agent_acc_info set balance_credit = (balance_credit - $amount) where agent_id = $agent_id";
				$query=$this->db->query($qry);
			} else {
				$qry = "update branch_acc_info set balance_credit = (balance_credit - $amount) where branch_id = $branch_id";
				$query=$this->db->query($qry);
			}
				return 'success';
			 }else{
				return 420;
			}
		
			
			
		}




		
}

