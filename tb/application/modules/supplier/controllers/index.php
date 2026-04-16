<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);
session_start();

class Index extends CI_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->helper(array('url', 'form', 'date'));
		if(!isset($_SESSION['ses_id']))
		{
			$sec_res = session_id();
	    	$_SESSION['ses_id'] = $sec_res;
			redirect('supplier/index','refresh');
			
		}
		$this->load->model('Supplier_Model');
	}
	/*public function edit_contact_inform()
	{
		$supplier_id = $this->uri->segment(3);
		$sup_inf_id = $this->uri->segment(4);
		$data['contact_inf']=$this->Supplier_Model->contact_inform_edit($supplier_id,$sup_inf_id);
		//print_r($data);
		//exit;
		$this->load->view('profile/edit_contact_details',$data);
	
	}*/
	public function hotel_view($id)
	{
		
	}
	public function index()
	{

		$_SESSION['fav_hotel_detail_new']='';
		$_SESSION['fav_hotel']='';
			$sec_res = session_id();
	    	$_SESSION['ses_id'] = $sec_res;
			$newdata = array(
                   'currency_value'  => 1,
				   'currency'  => 'USD'
               );
 $data=array('id'=>'visit','type'=>'supplier','ip'=>'ss');
			
		    $this->db->insert('vister',$data);
		     $this->db->insert_id();
			 
		$this->session->set_userdata($newdata);
		
		if ($this->session->userdata('supplier_logged_in')) {
			redirect('index/supplier_page', 'refresh'); 
		} else {
			redirect('index/login', 'refresh'); 
		}
	}
	function login()
	{
		$newdata = array(
            'currency_value'  => 1,
			'currency'  => 'USD'
        );

        //print_r($newdata); die;
		$this->session->set_userdata($newdata);
		
		if ($this->session->userdata('supplier_logged_in')) {
			redirect('index/supplier_page', 'refresh'); 
		} else {
			$this->load->view('login_page');
		}
		
		
	}
	function supplier_page()
	{
		if (!$this->session->userdata('supplier_logged_in')) {
			redirect('supplier/login', 'refresh'); 
		}
		
		$supplier_id = $this->session->userdata('supplier_id');
		
		$data['result']=$this->Supplier_Model->contact_inform_view($supplier_id);
	
		$this->load->view('supplier_index',$data);
	}
	function registration_process()
	{
		$this->form_validation->set_rules('name', 'Contact Person', 'required');
		$this->form_validation->set_rules('company_name', 'Company Name', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		
		$this->form_validation->set_rules('country', 'Country', 'required');
		$this->form_validation->set_rules('city', 'City', 'required');
		$this->form_validation->set_rules('postal_code', 'Pin Code', 'required');
		//$this->form_validation->set_rules('office_phone', 'Office Phone', 'required');
		
		$this->form_validation->set_rules('mobile_no', 'Mobile', 'required');
		$this->form_validation->set_rules('currency', 'Currency', 'required');
		
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[supplier.email_id]');
		$this->form_validation->set_rules('password', 'Password', 'required|matches[comform_password]');
		$this->form_validation->set_rules('comform_password', 'Confirm Password', 'required');
		$this->form_validation->set_rules('terms', 'Terms & Condition', 'required');
	
		if($this->form_validation->run()==FALSE)
		{
		  
		   $data['exist'] = "";
		   $data['name'] = $this->input->post('name');
		   $data['company_name'] = $this->input->post('company_name');
		   $data['address'] = $this->input->post('address');
		   $data['country'] = $this->input->post('country');
		   $data['city'] = $this->input->post('city');
		   $data['postal_code'] = $this->input->post('postal_code');
		   $data['office_phone'] = $this->input->post('office_phone');
		   $data['mobile_no'] = $this->input->post('mobile_no');
		   
		   $data['currency'] = $this->input->post('currency');
		   $data['email'] = $this->input->post('email');
		   
		   
			 $this->load->view('login_page',$data);
		}
		else
		{
			$email = $_POST['email'];
			
	/*	$Query="select * from agent where email_id ='".$email."'";
	 
		 $query=$this->db->query($Query);
		
		if ($query->num_rows() > 0)
		{
			$data['exist'] = "Your EmailID Already Registered.";
				$this->load->view('b2b/login_page',$data);
		}
		else
		{*/
		   $name = $this->input->post('name');
		   $company_name = $this->input->post('company_name');
		   $address = $this->input->post('address');
		   $country = $this->input->post('country');
		   $city = $this->input->post('city');
		   $postal_code = $this->input->post('postal_code');
		   $office_phone = $this->input->post('office_phone');
		   $mobile_no = $this->input->post('mobile_no');
		   
		   $currency = $this->input->post('currency');
		   $email = $this->input->post('email');
		   $password = $this->input->post('password');
		   
		   
			
			if ($this->Supplier_Model->add_supplier($name, $company_name, $address, $country, $city, $postal_code, $office_phone, $mobile_no,$currency, $email, $password)) {
			
				
		  
			  //$newdata = array('userid'=> $custid,'username'=>$fname,'lastname'=>$sname,'email'=>$email,'logged_in' => TRUE);
			  //$this->session->set_userdata($newdata);
				  
			
				  
				$config['protocol'] = 'smtp';
				$config['smtp_host'] = 'mail.stayaway.com';
				$config['smtp_port'] = 25;
				$config['smtp_user'] = 'admin@stayaway.com';
				$config['smtp_pass'] = 'admin123';
				$config['wordwrap'] = FALSE;
				$config['mailtype'] = 'html';
				$config['charset'] = 'utf-8';
				$config['crlf'] = "\r\n";
				$config['newline'] = "\r\n";
				$this->load->library('email', $config);
				$this->email->set_newline("\r\n");
				$msg='';
				$msg.='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>

<body><table width="100%" border="0" cellspacing="6" cellpadding="6">
  <tr>
    <td>Dear '.ucfirst($name).',<br />
'.ucfirst($city).', '.ucfirst($country).'</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Greetings From Travel Bay,</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><p>Many thanks for your Interest and Submitting Online Supplier Registration using travelbay.com.
   </p>
    <p> Your application is under process and will be reviewed for Registration by our team</p></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td> Within Next 24 Business Hours; they will get in touch with you on your mentioned email for Login Details along with the Welcome Kit will be emailed to you. </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tbody>
        <tr>
          <td>Please do not hesitate to contact us on <font color="#00CC33">info@travelbay.com</font> for all your Urgent Queries / Reservation or Requirements.</td>
        </tr>
       <tr> <td>&nbsp;</td></tr><tr> <td>&nbsp;</td></tr>
        <tr>
          <td> 
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tbody>
                <tr>
                  <td>Thanking you,</td>
                </tr>
                
                <tr>
                  <td>Registration &amp; TravelBay Team,</td>
                </tr>
                <tr>
                  <td><strong>travelbay.com</strong></td>
                </tr>
              </tbody>
            </table></td>
        </tr>
      </tbody>
    </table></td>
    <td>&nbsp;</td>
  </tr>
</table>

</body>
</html>';
				
				$from = 'bookings@travelbay.com';
				$sub = 'Supplier Registration Acknowledgment - TravelBay.com ';
				$this->email->from($from,'Admin - TravelBay.com');
				$to = strip_tags($email);
				$this->email->to($to);
				$this->email->subject($sub);
				$this->email->message($msg);



				if($this->email->send())
				{
				
					//$data['emailId'] = $email;
					$this->load->view('registration_conformation');
					$data['exist'] ='';
				}
				else
				{
					show_error($this->email->print_debugger());
				}
			}
			else
			{
				$data['exist'] = "Error data inserting.";
				$this->load->view('login_page',$data);
			}
		//}
		}
	}
	function user_login()
	{
   		$this->form_validation->set_rules('login_password', 'Password', 'required');
		$this->form_validation->set_rules('login_email', 'Email', 'required|valid_email');
		if($this->form_validation->run()==FALSE)
		{
			$data['status'] = "";
			 $data['login_email'] = $this->input->post('login_email');

			 $this->load->view('login_page',$data);
		}
		else
		{
		
			 $email = $this->input->post('login_email');
			 $pass = $this->input->post('login_password');
			
			 $userValied = $this->Supplier_Model->check_agent_login($email, $pass);
		
			 if($userValied)
			 {
				/*if ($this->session->userdata('agent_type') == 1) {
					redirect('/b2b/supplier_page', 'refresh');
				} else {
					redirect('/b2b/my_booking', 'refresh');
				}*/
				redirect('index/supplier_page', 'refresh');
				
			 }
			 else
			 {
				 
				 $data['status'] = "Invalid Email ID/Password";
				 
				 $this->load->view('login_page',$data);
			 }
		}
	
	}
	
	
	public function profile()
	{
		$supplier_id = $this->session->userdata('supplier_id');
		$data['result']=$this->Supplier_Model->contact_inform_view($supplier_id);
		$this->load->view('profile/profile',$data);
	}
	
	
	
	
	//----- Get Supplier's Category List -----/
	function inventory_category_list($id)
	{
		$supplier_id = $this->session->userdata('supplier_id'); 
		$data['result'] = $this->Supplier_Model->inventory_category_list($supplier_id,$id);
		$this->load->view('inventory/inventory_view',$data);
	}
	
	function view_allotment_list($id)
	{
		$supplier_id = $this->session->userdata('supplier_id'); 
		$data['result'] = $this->Supplier_Model->inventory_allotment_list($supplier_id,$id);
		$this->load->view('inventory/allotment_list_view',$data);
	}
	
	
	function view_allotment($prop_id, $id)
	{
		$data['allot_details'] = $this->Supplier_Model->view_allotment($prop_id,$id);
		$data['prop_id'] = $prop_id;
		$data['id'] = $id;
		$this->load->view('inventory/edit_allotment_view',$data);
	}
	
	
	function edit_allotment_plan($prop_id, $id)
	{   
			$supplier_id = $this->session->userdata('supplier_id');
			$allocation_rooms = $this->input->post('allocation_rooms');
			$allocation_release_days = $this->input->post('allocation_release_days');
			$allocation_release_period = $this->input->post('allocation_release_period');
			
			$sd = $this->input->post('sds');
			if($sd != ''){
			$sds = explode("-",$sd);
			$allocation_validity_from = $sds[2].'-'.$sds[1].'-'.$sds[0];
			}
			else{
				$allocation_validity_from = "0000-00-00";
			}
			$ed = $this->input->post('eds');
			if($ed != '') {
			$eds = explode("-",$ed);
			$allocation_validity_to = $eds[2].'-'.$eds[1].'-'.$eds[0];
			}
			else{
				$allocation_validity_to = "0000-00-00";
			}
			
			$season_id = $this->input->post('season');
			$cate_type = $this->input->post('category_name');
								
			
			//print_r($_REQUEST); exit;
			$this->Supplier_Model->edit_allotment_plan($id, $supplier_id, $prop_id, $season_id, $cate_type,$allocation_rooms, $allocation_release_days, $allocation_release_period, $allocation_validity_from, $allocation_validity_to);
			
			redirect('index/view_allotment_list/'.$prop_id,'refresh');
	}
	
	//----- Update Supplier's Category Type -----/
	function update_category_type($prop_id,$id,$status)
	{
		$this->Supplier_Model->update_category_type($id,$status);
		redirect('index/inventory_category_list/'.$prop_id,'refresh');
	}
	
	//----- Get Inventory Category Space Facilities -----/
	function inventory_category_space_facilities()
	{
		$data['result'] = $this->Supplier_Model->inventory_category_space_facilities();
	}
	
	
	function add_cate($hotel_id)
	{
		$cate_type = $this->input->post('cate_type');
		$this->Supplier_Model->add_cate($cate_type);
		redirect("index/add_cate_type/".$hotel_id,'refresh');
	}
	
	//----- Add New Supplier's Category Type -----/
	function add_cate_type($id)
	{
		$this->form_validation->set_rules('cate_type', 'Cate Type', 'required');
		if($this->form_validation->run()==FALSE)
		{
			$data['exist'] = "";
			$data['cate_type'] = $this->input->post('cate_type');
			$this->load->view('inventory/add_cate_type',$data);
		}
		else
		{
			$supplier_id = $this->session->userdata('supplier_id'); 
			$cate_type = $this->input->post('cate_type');
			$room_type = $this->input->post('room_type');
			$max_person = $this->input->post('max_person');
			$adults = $this->input->post('adults');
			$childs = $this->input->post('childs');
			$infants = $this->input->post('infants');
			$extra_bed = $this->input->post('extra_bed');
			$prop_id = $id;
			
			$this->Supplier_Model->add_cate_type($supplier_id, $prop_id, $cate_type, $room_type, $max_person, $adults, $childs, $infants, $extra_bed);
			redirect('index/inventory_category_list/'.$id,'refresh');
		}
	}
	
	//----- Get Supplier's Category Details -----/
	function view_cate_details($prop_id, $id)
	{
		$data['cat_details'] = $this->Supplier_Model->view_cate_details($id);
		$data['prop_id'] = $prop_id;
		$data['id'] = $id;
		$this->load->view('inventory/edit_cate_type',$data);
	}
	
	//----- Edit Supplier's Category Type -----/
	function edit_cate_type($prop_id, $id)
	{
		$this->form_validation->set_rules('cate_type', 'Cate Type', 'required');
		if($this->form_validation->run()==FALSE)
		{
			$data['exist'] = "";
			$data['cate_type'] = $this->input->post('cate_type');
			$this->load->view('inventory/edit_cate_type',$data);
		}
		else
		{
			$cate_type = $this->input->post('cate_type');
			$room_type = $this->input->post('room_type');
			$max_person = $this->input->post('max_person');
			$adults = $this->input->post('adults');
			$childs = $this->input->post('childs');
			$infants = $this->input->post('infants');
			$extra_bed = $this->input->post('extra_bed');
			
			$this->Supplier_Model->edit_cate_type($id, $prop_id, $cate_type, $room_type, $max_person, $adults, $childs, $infants, $extra_bed);
			redirect('index/view_cate_details/'.$prop_id.'/'.$id,'refresh');
		}
	}
	
	
	//----- Get Supplier's Rate Tactics List -----/
	function rate_tactics_list($prop_id)
	{
		$supplier_id = $this->session->userdata('supplier_id'); 
		$cate_list = $this->Supplier_Model->cate_types_rate_tactics($supplier_id,$prop_id);
		//print'<pre />';print_r($cate_list);exit;
		
		$data['cate_list'] = $cate_list;
		//$data['result'] = $this->Supplier_Model->rate_tactics_list($supplier_id,$prop_id);
		//$season_list = $this->Supplier_Model->season_rate_tactics($supplier_id,$prop_id);
		//print'<pre />';print_r($data);exit;
		//$counter = count($data['result']);
		//$data['counter'] = $counter;
		//$data['season_list'] = $season_list;
		$this->load->view('inventory/rate_tactics_view',$data);
	}
	
	//----- Update Supplier's Rate Tactics Status -----/
	function update_rate_tactics($prop_id,$id,$status)
	{
           
		$this->Supplier_Model->update_rate_tactics($id,$status);
		redirect('index/rate_tactics_list/'.$prop_id,'refresh');
	}
        
        function update_promotion($hot_id,$prop_id,$id,$status)
	{
            
		$this->Supplier_Model->update_promotion($id,$status);
		redirect('index/promotion_details/'.$hot_id.'/'.$prop_id,'refresh');
	}
	

	//----- Add New Supplier's Rate Tacticse -----/
	function add_rate_plan($prop_id)
	{
		//print'<pre />';print_r($_POST);exit;
		$this->form_validation->set_rules('category_name', 'Category Type, Room Category', 'required');
		if($this->form_validation->run()==FALSE)
		{
			$data['exist'] = "";
			$data['category_name'] = $this->input->post('category_name');
			$this->load->view('inventory/add_rate_plan',$data);
		}
		else
		{
			$supplier_id = $this->session->userdata('supplier_id');
			$market_id = $this->input->post('market_id');
			$season = $this->input->post('season');
			$category_name = $this->input->post('category_name');
			$allocation_rooms = $this->input->post('allocation_rooms');
			$allocation_release_days = $this->input->post('allocation_release_days');
			$allocation_release_period = $this->input->post('allocation_release_period');
			
			$sd = $this->input->post('sds');
			if($sd != ''){
			$sds = explode("-",$sd);
			$allocation_validity_from = $sds[2].'-'.$sds[1].'-'.$sds[0];
			}
			else{
				$allocation_validity_from = "0000-00-00";
			}
			$ed = $this->input->post('eds');
			if($ed != '') {
			$eds = explode("-",$ed);
			$allocation_validity_to = $eds[2].'-'.$eds[1].'-'.$eds[0];
			}
			else{
				$allocation_validity_to = "0000-00-00";
			}
			
			$occupancy = $this->input->post('occupancy');
			$adult = $this->input->post('no_of_adults');
			$child = $this->input->post('no_of_childs');
			$child_below_age = $this->input->post('child_below_age');
			$child_above_age = $this->input->post('child_above_age');
			$child_above_age_charge = $this->input->post('child_above_age_charge');
			$child_extra_bed_charge = $this->input->post('child_extra_bed_charge');
			$no_of_infants = $this->input->post('no_of_infants');
			$meal_plan = $this->input->post('meal_plan');
			
			$meal_plan_lunch = $this->input->post('meal_plan_lunch');
			$meal_plan_breakfast = $this->input->post('meal_plan_breakfast');
			
				
			$lunch=''; 
			if($meal_plan_lunch == 'Lunch')
			{
				$lunch = $meal_plan_lunch;
			}
			else if($this->input->post('lunch') == 'Lunch')
			{
				$lunch = $this->input->post('lunch');
			}
			
			
			$dinner='';
			if($meal_plan_lunch == 'Dinner')
			{
				$dinner = $meal_plan_lunch;
			}
			else if($this->input->post('dinner') == 'Dinner')
			{
				$dinner = $this->input->post('dinner');
			}
			
			$breakfast='';
			if($meal_plan_breakfast == 'Breakfast')
			{
				$breakfast = $meal_plan_breakfast;
			}
			
			$breakfast_type = $this->input->post('breakfast_type');
			
			$adult_breakfast_rate = $this->input->post('adult_meal_plan_breakfast_rate');
			$adult_lunch_rate = $this->input->post('adult_meal_plan_lunch_rate');
			$adult_dinner_rate = $this->input->post('adult_meal_plan_dinner_rate');	
			
			$child_breakfast_rate = $this->input->post('child_meal_plan_breakfast_rate');
			$child_lunch_rate = $this->input->post('child_meal_plan_lunch_rate');
			$child_dinner_rate = $this->input->post('child_meal_plan_dinner_rate');	
			
			
			$child_policy = $this->input->post('child_policy');
			$remarks = $this->input->post('remarks');
			$cancel_policy_nights = $this->input->post('cancel_policy_nights');
			$cancel_policy_percent = $this->input->post('cancel_policy_percent');
			$cancel_policy_charge = $this->input->post('cancel_policy_charge');
			$cancel_policy_from = $this->input->post('cancel_policy_from');
			$cancel_policy_to = $this->input->post('cancel_policy_to');
			$cancel_policy_desc = $this->input->post('cancel_policy_desc');
			
			
			$minimum_stay_from = $this->input->post('minimum_stay_from');
			$minimum_stay_to = $this->input->post('minimum_stay_to');
			$minimum_stay_nights = $this->input->post('minimum_stay_nights');
			$booking_code = $this->input->post('booking_code');
			$supplement_rate = $this->input->post('supplement_rate');
			
			if(is_array($this->input->post('sd'))) 
			{
			  $room_avail_date_from = $this->input->post('sd');
			  
			}
			else
			{
				$room_avail_date_from = $this->input->post('sd'); 
			}
			
			if(is_array($this->input->post('ed'))) 
			{
				$room_avail_date_to = $this->input->post('ed');
			}
			else
			{
				$room_avail_date_to = $this->input->post('ed');
				
			}
			//print'<pre>';print_r($room_avail_date_from);exit;
			$dates = $this->input->post('dates'); 
			$weekday = $this->input->post('weekday'); 
			$price = $this->input->post('price'); 
			$extra_bed_price = $this->input->post('extra_bed_price'); 
			$avail = $this->input->post('avail'); 
			$aadult = $this->input->post('adult'); 
			$achild = $this->input->post('child');
			$child_price = $this->input->post('child_price');
			$infant = $this->input->post('infant');
			$sup_charge = $this->input->post('sup_charge');
			$more_dates=$this->input->post('more_dates');
			
			//print_r($_REQUEST); exit;
			$last_id =$this->Supplier_Model->add_rate_plan($supplier_id,$market_id, $prop_id, $season, $category_name, $allocation_rooms, $allocation_release_days, $allocation_release_period, $allocation_validity_from, $allocation_validity_to, $occupancy, $adult, $child, $child_below_age, $child_above_age, $child_above_age_charge,$child_extra_bed_charge, $no_of_infants, $breakfast, $breakfast_type,$meal_plan, $lunch, $dinner, $adult_breakfast_rate,$adult_lunch_rate,$adult_dinner_rate,$child_breakfast_rate,$child_lunch_rate,$child_dinner_rate,$child_policy, $remarks, $cancel_policy_nights, $cancel_policy_percent, $cancel_policy_charge, $cancel_policy_from, $cancel_policy_to, $cancel_policy_desc, $minimum_stay_from, $minimum_stay_to, $minimum_stay_nights, $room_avail_date_from, $room_avail_date_to, $dates, $weekday, $price, $extra_bed_price, $avail, $aadult, $achild, $child_price, $infant, $sup_charge,$booking_code,$supplement_rate);
			
			if($more_dates=="true")
			{
				//print_r($last_id) ;
				$data['results']=$this->Supplier_Model->add_more_rate_plan($last_id);
				//echo "<pre/>";print_r($data);exit;

				$this->load->view('inventory/add_more_rate_plan',$data);
			}
			else
			{
				redirect('index/rate_tactics_list/'.$prop_id,'refresh');
			}
			
		}
	}
	
	function add_allocations_plan($prop_id)
	{
		//print'<pre />';print_r($_POST);exit;
			$supplier_id = $this->session->userdata('supplier_id');
			$allocation_rooms = $this->input->post('allocation_rooms');
			$allocation_release_days = $this->input->post('allocation_release_days');
			$allocation_release_period = $this->input->post('allocation_release_period');
			
			$sd = $this->input->post('sds');
			if($sd != ''){
			$sds = explode("-",$sd);
			$allocation_validity_from = $sds[2].'-'.$sds[1].'-'.$sds[0];
			}
			else{
				$allocation_validity_from = "0000-00-00";
			}
			$ed = $this->input->post('eds');
			if($ed != '') {
			$eds = explode("-",$ed);
			$allocation_validity_to = $eds[2].'-'.$eds[1].'-'.$eds[0];
			}
			else{
				$allocation_validity_to = "0000-00-00";
			}
			
			$season_id = $this->input->post('season_id');
			$cate_type = $this->input->post('category_type');
			$rate_tactics_id = $this->input->post('sup_rate_tactics_id');
						
			
			//print_r($_REQUEST); exit;
			$this->Supplier_Model->update_rate_plan($supplier_id, $prop_id, $season_id, $cate_type, $rate_tactics_id,$allocation_rooms, $allocation_release_days, $allocation_release_period, $allocation_validity_from, $allocation_validity_to);
			
			redirect('index/rate_tactics_list/'.$prop_id,'refresh');
		
	}
	
	function add_allotment_plan($prop_id)
	{
			//print'<pre />';print_r($_POST);exit;
			$supplier_id = $this->session->userdata('supplier_id');
			$allocation_rooms = $this->input->post('allocation_rooms');
			$allocation_release_days = $this->input->post('allocation_release_days');
			$allocation_release_period = $this->input->post('allocation_release_period');
			
			$sd = $this->input->post('sds');
			if($sd != ''){
			$sds = explode("-",$sd);
			$allocation_validity_from = $sds[2].'-'.$sds[1].'-'.$sds[0];
			}
			else{
				$allocation_validity_from = "0000-00-00";
			}
			$ed = $this->input->post('eds');
			if($ed != '') {
			$eds = explode("-",$ed);
			$allocation_validity_to = $eds[2].'-'.$eds[1].'-'.$eds[0];
			}
			else{
				$allocation_validity_to = "0000-00-00";
			}
			
			$season_id = $this->input->post('season');
			$cate_type = $this->input->post('category_name');
			
			//print_r($_REQUEST); exit;
			$this->Supplier_Model->add_allotment_plan($supplier_id, $prop_id, $season_id, $cate_type,$allocation_rooms, $allocation_release_days, $allocation_release_period, $allocation_validity_from, $allocation_validity_to);
			
			redirect('index/view_allotment_list/'.$prop_id,'refresh');
	}
	
	
	//----- Get Supplier's Rate Tacticse Details -----/
	function view_rate_tactics_details($prop_id,$id)
	{
		$data['rat_tac_details'] = $this->Supplier_Model->view_rate_tactics_details($id);
		
		$data['prop_id'] = $prop_id;
		$data['id'] = $id;
		$this->load->view('inventory/edit_rate_plan',$data);
	}
	
	function add_rate_plan_view($prop_id,$season_id,$cate_type)
	{
		$data['rat_tac_details'] = $this->Supplier_Model->add_rate_plan_view_season($prop_id,$season_id,$cate_type);
		$data['room_pre_details'] = $this->Supplier_Model->get_rate_tactics_pre_records($prop_id);
		//print'<pre />';print_r($data);exit;
		$this->load->view('inventory/add_rate_plan',$data);	
	}
	function add_rate_plan_view_again($prop_id,$season_id,$cate_type)
	{
		$data['rat_tac_details'] = $this->Supplier_Model->add_rate_plan_view($prop_id,$season_id,$cate_type);
		//print'<pre />';print_r($data);exit;
		$this->load->view('inventory/add_rate_plan_again',$data);	
	}
	
	function add_allocations($prop_id,$season_id,$cate_type,$rate_tac_id)
	{
		$data['rat_tac_details'] = $this->Supplier_Model->add_rate_plan_view($prop_id,$season_id,$cate_type,$rate_tac_id);
		//print'<pre />';print_r($data);exit;
		$this->load->view('inventory/add_allocations',$data);	
	}
	
	function add_allotment($prop_id)
	{
		$data['hotel_id'] = $prop_id;
		//print'<pre />';print_r($data);exit;
		$this->load->view('inventory/add_allotment_view',$data);	
	}
	function add_early_bird_promotion($prop_id)
	{
		$data['hotel_id'] = $prop_id;
		//print'<pre />';print_r($data);exit;
		$this->load->view('inventory/add_early_bird_promotion_view',$data);
	}
	
	//----- Edit Supplier's Rate Tacticse Details -----/
	function edit_rate_plan($prop_id, $id)
	{   
	    //print'<pre />';print_r($_POST);exit;
		$this->form_validation->set_rules('category_name', 'Category Type, Room Category', 'required');
		if($this->form_validation->run()==FALSE)
		{
			$data['exist'] = "";
			$data['category_name'] = $this->input->post('category_name');
			$this->load->view('inventory/edit_rate_plan',$data);
		}
		else
		{
			$supplier_id = $this->session->userdata('supplier_id');
			$market_id = $this->input->post('market_id');
			$season= $this->input->post('season');
		
			$category_name = $this->input->post('category_name');
			$allocation_rooms = $this->input->post('allocation_rooms');
			$allocation_release_days = $this->input->post('allocation_release_days');
			$allocation_release_period = $this->input->post('allocation_release_period');
			
			$sd = $this->input->post('sds');
			if($sd != '')
			{
				$sds = explode("-",$sd);
				$allocation_validity_from = $sds[2].'-'.$sds[1].'-'.$sds[0];
			}
			else
			{
				$allocation_validity_from = "0000-00-00";
			}
			$ed = $this->input->post('eds');
			if($ed!='') 
			{
				$eds = explode("-",$ed);
				$allocation_validity_to = $eds[2].'-'.$eds[1].'-'.$eds[0];
			}
			else
			{
				$allocation_validity_to = "0000-00-00";
			}
			
			$occupancy = $this->input->post('occupancy');
			$adult = $this->input->post('no_of_adults');
			$child = $this->input->post('no_of_childs');
			$child_below_age = $this->input->post('child_below_age');
			$child_above_age = $this->input->post('child_above_age');
			$child_above_age_charge = $this->input->post('child_above_age_charge');
			$child_extra_bed_charge = $this->input->post('child_extra_bed_charge');
			$no_of_infants = $this->input->post('no_of_infants');
			$meal_plan = $this->input->post('meal_plan');
			
			$meal_plan_lunch = $this->input->post('meal_plan_lunch');
			$meal_plan_breakfast = $this->input->post('meal_plan_breakfast');
			
				
			$lunch=''; 
			if($meal_plan_lunch == 'Lunch')
			{
				$lunch = $meal_plan_lunch;
			}
			else if($this->input->post('lunch') == 'Lunch')
			{
				$lunch = $this->input->post('lunch');
			}
			
			
			$dinner='';
			if($meal_plan_lunch == 'Dinner')
			{
				$dinner = $meal_plan_lunch;
			}
			else if($this->input->post('dinner') == 'Dinner')
			{
				$dinner = $this->input->post('dinner');
			}
			
			$breakfast='';
			if($meal_plan_breakfast == 'Breakfast')
			{
				$breakfast = $meal_plan_breakfast;
			}
			
			$breakfast_type = $this->input->post('breakfast_type');
			
			$adult_breakfast_rate = $this->input->post('adult_meal_plan_breakfast_rate');
			$adult_lunch_rate = $this->input->post('adult_meal_plan_lunch_rate');
			$adult_dinner_rate = $this->input->post('adult_meal_plan_dinner_rate');	
			
			$child_breakfast_rate = $this->input->post('child_meal_plan_breakfast_rate');
			$child_lunch_rate = $this->input->post('child_meal_plan_lunch_rate');
			$child_dinner_rate = $this->input->post('child_meal_plan_dinner_rate');	
			
			$child_policy = $this->input->post('child_policy');
			$remarks = $this->input->post('remarks');
			$cancel_policy_nights = $this->input->post('cancel_policy_nights');
			$cancel_policy_percent = $this->input->post('cancel_policy_percent');
			$cancel_policy_charge = $this->input->post('cancel_policy_charge');
			$cancel_policy_from = $this->input->post('cancel_policy_from');
			$cancel_policy_to = $this->input->post('cancel_policy_to');
			$cancel_policy_desc = $this->input->post('cancel_policy_desc');
			
			
			$minimum_stay_from = $this->input->post('minimum_stay_from');
			$minimum_stay_to = $this->input->post('minimum_stay_to');
			$minimum_stay_nights = $this->input->post('minimum_stay_nights');
			$booking_code = $this->input->post('booking_code');
			$supplement_rate ='';
			if($meal_plan =='3')
			{
				 $supplement_rate = $this->input->post('supplement_rate');
			}else {
				
				$supplement_rate ='0';
			}
			
			if(is_array($this->input->post('sd'))) 
			{
			  $room_avail_date_from = $this->input->post('sd');
			  
			}
			else
			{
				$room_avail_date_from = $this->input->post('sd');
			    
			}
			
			if(is_array($this->input->post('ed'))) 
			{
				$room_avail_date_to = $this->input->post('ed');
				
			}
			else
			{
				$room_avail_date_to = $this->input->post('ed');
				
			}
			
			$avail_dates = $this->input->post('dates'); 
			$avail_weekday = $this->input->post('weekday'); 
			$avail_price = $this->input->post('price'); 
			$extra_bed_price = $this->input->post('extra_bed_price'); 
			$avail_rooms = $this->input->post('avail'); 
			$avail_adult = $this->input->post('adult'); 
			$avail_child = $this->input->post('child');
			$avail_child_price = $this->input->post('child_price');
			$avail_infant = $this->input->post('infant');
			$avail_sup_charge = $this->input->post('sup_charge');
			$avail_datess = $this->input->post('datess'); 
			
			$this->Supplier_Model->edit_rate_plan($supplier_id, $market_id,$prop_id, $id, $season, $category_name, $allocation_rooms, $allocation_release_days, $allocation_release_period, $allocation_validity_from, $allocation_validity_to, $occupancy, $adult, $child, $child_below_age, $child_above_age, $child_above_age_charge,$child_extra_bed_charge, $no_of_infants, $breakfast, $breakfast_type,$adult_breakfast_rate,$adult_lunch_rate,$adult_dinner_rate,$child_breakfast_rate,$child_lunch_rate,$child_dinner_rate, $meal_plan, $lunch, $dinner, $child_policy, $remarks, $cancel_policy_nights, $cancel_policy_percent, $cancel_policy_charge, $cancel_policy_from, $cancel_policy_to, $cancel_policy_desc, $minimum_stay_from, $minimum_stay_to, $minimum_stay_nights, $room_avail_date_from, $room_avail_date_to, $avail_dates, $avail_weekday, $avail_price, $extra_bed_price, $avail_rooms, $avail_adult, $avail_child, $avail_child_price, $avail_infant, $avail_sup_charge, $avail_datess,$booking_code,$supplement_rate);
			
			redirect('index/view_rate_tactics_details/'.$prop_id.'/'.$id,'refresh');
		}
	}
	
	
	//----- Get Supplier's Category List -----/
	function maintain_month_list($prop_id)
	{
		$this->load->view('inventory/maintain_month_list');
	}
	
	
	//------------- Get Supplier's Maintain By Month Dates -------- //
	function getDates()
	{	//echo "hi";
		//print'<pre />';print_r($_POST);exit;
		 $results = $this->Supplier_Model->getDates();
	}
	
	//------------- Get Supplier's Maintain By Month Available Dates -------- //
	function getAvailDates()
	{
		 $results = $this->Supplier_Model->getAvailDates();
	}
	
	function getAvailDatesForPromotion()
	{
		 $results = $this->Supplier_Model->getAvailDatesForPromotion();
	}
	
	//----- Get Supplier's Add Maintain Month -----/
	function add_maintain_month($prop_id)
	{
		$supplier_id = $this->session->userdata('supplier_id');
		$this->Supplier_Model->add_maintain_month($supplier_id,$prop_id);
		redirect('index/maintain_month_list/'.$prop_id,'refresh');
	}
	
	//----- Get Supplier's Open / Close Dates -----/
	function open_close_dates()
	{
		$this->load->view('inventory/open_close_dates');
	}
	
	//----- Get Supplier's Maintain Month Dates for Open / Close Dates -----/
	function get_maintain_month_dates($prop_id)
	{
		$supplier_id = $this->session->userdata('supplier_id');
		$data['results'] = $this->Supplier_Model->get_maintain_month_dates($supplier_id,$prop_id);
		$this->load->view('inventory/open_close_dates',$data);
	}
	
	
	//----- Get Supplier's Rate Tactics for Open / Close Dates -----/
	function getRateTactics()
	{
		$results = $this->Supplier_Model->getRateTactics();
	}
	
	//----- Get Supplier's House Rules -----/
	function house_rules($prop_id)
	{
		$supplier_id = $this->session->userdata('supplier_id');
		$data['result'] = $this->Supplier_Model->get_house_rules($supplier_id,$prop_id);
		$this->load->view('inventory/house_rules',$data);
	}
	
	//----- Set Supplier's House Rules -----/
	function set_house_rules($prop_id)
	{
		$this->form_validation->set_rules('arrival_time', 'Arrival Time (from)', 'required');
		$this->form_validation->set_rules('departure_time', 'Departure Time (Before)', 'required');
		if($this->form_validation->run()==FALSE)
		{
			$data['exist'] = "";
			$data['arrival_time'] = $this->input->post('arrival_time');
			$data['departure_time'] = $this->input->post('departure_time');
		   
			$this->load->view('inventory/house_rules',$data);
		}
		else
		{
			$supplier_id = $this->session->userdata('supplier_id'); 
			$arrival_time = $this->input->post('arrival_time');
			$departure_time = $this->input->post('departure_time');
			$check_in_time_from = $this->input->post('check_in_time_from');
			$check_in_extra_cost_from = $this->input->post('check_in_extra_cost_from');
			/*$check_in_time_to = $this->input->post('check_in_time_to');
			$check_in_extra_cost_to = $this->input->post('check_in_extra_cost_to');*/
			$check_in_time_to = '';
			$check_in_extra_cost_to = '';
			$check_out_time_from = $this->input->post('check_out_time_from');
			$check_out_extra_cost_from = $this->input->post('check_out_extra_cost_from');
			/*$check_out_time_to = $this->input->post('check_out_time_to');
			$check_out_extra_cost_to = $this->input->post('check_out_extra_cost_to');*/
			$check_out_time_to = '';
			$check_out_extra_cost_to = '';
			/*$manimum_stay = $this->input->post('manimum_stay');
			$maximum_stay = $this->input->post('maximum_stay');*/
			$manimum_stay = '';
			$maximum_stay = '';
			$rent_amt_percent = $this->input->post('rent_amt_percent');
			$rent_amt_days = $this->input->post('rent_amt_days');
			$payment_mode = $this->input->post('payment_mode');
			$cleaning = $this->input->post('cleaning');
			$supplies = $this->input->post('supplies');
			$policy = $this->input->post('policy');
			
			$this->Supplier_Model->set_house_rules($supplier_id, $prop_id, $arrival_time, $departure_time, $check_in_time_from, $check_in_extra_cost_from, $check_in_time_to, $check_in_extra_cost_to, $check_out_time_from, $check_out_extra_cost_from, $check_out_time_to, $check_out_extra_cost_to, $manimum_stay, $maximum_stay, $rent_amt_percent, $rent_amt_days, $payment_mode, $cleaning, $supplies, $policy);
			
			redirect('index/house_rules/'.$prop_id,'refresh');
		}
	}
	
	
	//----- Edit Supplier's House Rules -----/
	function edit_house_rules($prop_id, $id)
	{
		$this->form_validation->set_rules('arrival_time', 'Arrival Time (from)', 'required');
		$this->form_validation->set_rules('departure_time', 'Departure Time (Before)', 'required');
		if($this->form_validation->run()==FALSE)
		{
			$data['exist'] = "";
			$data['arrival_time'] = $this->input->post('arrival_time');
			$data['departure_time'] = $this->input->post('departure_time');
		   
			$this->load->view('inventory/house_rules',$data);
		}
		else
		{
			$supplier_id = $this->session->userdata('supplier_id'); 
			$arrival_time = $this->input->post('arrival_time');
			$departure_time = $this->input->post('departure_time');
			$check_in_time_from = $this->input->post('check_in_time_from');
			$check_in_extra_cost_from = $this->input->post('check_in_extra_cost_from');
			/*$check_in_time_to = $this->input->post('check_in_time_to');
			$check_in_extra_cost_to = $this->input->post('check_in_extra_cost_to');*/
			$check_in_time_to = '';
			$check_in_extra_cost_to = '';
			$check_out_time_from = $this->input->post('check_out_time_from');
			$check_out_extra_cost_from = $this->input->post('check_out_extra_cost_from');
			/*$check_out_time_to = $this->input->post('check_out_time_to');
			$check_out_extra_cost_to = $this->input->post('check_out_extra_cost_to');*/
			$check_out_time_to = '';
			$check_out_extra_cost_to = '';
			/*$manimum_stay = $this->input->post('manimum_stay');
			$maximum_stay = $this->input->post('maximum_stay');*/
			$manimum_stay = '';
			$maximum_stay = '';
			$rent_amt_percent = $this->input->post('rent_amt_percent');
			$rent_amt_days = $this->input->post('rent_amt_days');
			$payment_mode = $this->input->post('payment_mode');
			$cleaning = $this->input->post('cleaning');
			$supplies = $this->input->post('supplies');
			$policy = $this->input->post('policy');
			
			
			$this->Supplier_Model->edit_house_rules($id, $arrival_time, $departure_time, $check_in_time_from, $check_in_extra_cost_from, $check_in_time_to, $check_in_extra_cost_to, $check_out_time_from, $check_out_extra_cost_from, $check_out_time_to, $check_out_extra_cost_to, $manimum_stay, $maximum_stay, $rent_amt_percent, $rent_amt_days, $payment_mode, $cleaning, $supplies, $policy);
			
			redirect('index/house_rules/'.$prop_id,'refresh');
		}
	}
	
	//----- Get Supplier's Extra Services -----/
	function extra_service($prop_id)
	{
		$supplier_id = $this->session->userdata('supplier_id'); 
		$data['result'] = $this->Supplier_Model->get_extra_service($supplier_id,$prop_id);
		$this->load->view('inventory/extra_service',$data);
		/*$this->load->view('inventory/extra_service');*/
	}
	
	//----- Set Supplier's Extra Services -----/
	function set_extra_service($prop_id)
	{
		$supplier_id = $this->session->userdata('supplier_id'); 
		$this->Supplier_Model->set_extra_service($supplier_id,$prop_id);
		redirect('index/extra_service/'.$prop_id,'refresh');
	}
	
	//----- Edit Supplier's Extra Services -----/
	function edit_extra_service($prop_id,$id)
	{
		$supplier_id = $this->session->userdata('supplier_id'); 
		$this->Supplier_Model->edit_extra_service($supplier_id,$prop_id,$id);
		redirect('index/extra_service/'.$prop_id,'refresh');
	}
	
	//----- Get Supplier's Early Bird Promotion -----/
	function early_bird($prop_id)
	{
		$supplier_id = $this->session->userdata('supplier_id'); 
		$data['result'] = $this->Supplier_Model->inventory_early_bird_list($supplier_id,$prop_id);
		$this->load->view('inventory/early_bird_promotion',$data);
	}
	
	public function contact_inform()
	{
		$data['country_list']=$this->Supplier_Model->fetch_country();
		$data['language_list']=$this->Supplier_Model->fetch_language();
		
		$this->load->view('profile/contact_info',$data);
	}
	
	public function add_data()
	{
		$this->form_validation->set_rules('pro_name', 'Hotel Namedsfdsfdsfdsfdfds', 'required');
		
		if($this->form_validation->run()==FALSE)
		{
			$data['exist'] = "";
			$data['market_name'] = $this->input->post('market_name');
			$data['pro_name'] = $this->input->post('pro_name');
			$this->load->view('profile/edit_contact_details',$data);
		}
		else
		{
			$supplier_id = $this->session->userdata('supplier_id');
			$city = $this->input->post('country_val');
			$market_name = $this->input->post('market_name');
			$pro_name = $this->input->post('pro_name');
			//$lan_val = $this->input->post('lan_val');
			$main_first_name = $this->input->post('main_first_name');
			$main_last_name = $this->input->post('main_last_name');
			$main_email = $this->input->post('main_email');
			$res_first_name = $this->input->post('res_first_name');
			$res_last_name = $this->input->post('res_last_name');
			$res_phone = $this->input->post('res_phone');
			$res_fax = $this->input->post('res_fax');
			$res_email = $this->input->post('res_email');
			$mark_first_name = $this->input->post('mark_first_name');
			$mark_last_name = $this->input->post('mark_last_name');
			$mark_phone = $this->input->post('mark_phone');
			$mark_fax = $this->input->post('mark_fax');
			$mark_email = $this->input->post('mark_email');
			$acc_first_name = $this->input->post('acc_first_name');
			$acc_last_name = $this->input->post('acc_last_name');
			$acc_phone = $this->input->post('acc_phone');
			$acc_fax = $this->input->post('acc_fax');
			$acc_email = $this->input->post('acc_email');

			$rs_status=$this->Supplier_Model->add_contact_inf($supplier_id, $city, $market_name, $pro_name, $main_first_name, $main_last_name, $main_email, $res_first_name, $res_last_name, $res_phone, $res_fax, $res_email, $mark_first_name, $mark_last_name, $mark_phone, $mark_fax, $mark_email, $acc_first_name, $acc_last_name, $acc_phone,$acc_fax,$acc_email); 
			
			redirect('index/edit_contact_inform/'.$rs_status,'refresh');
		}
	}
	
	public function list_contact_inform($id)
	{
		//$id = $this->session->userdata('supplier_id');
		$data['result']=$this->Supplier_Model->contact_inform_view();
		//$this->load->view('profile/profile', $data);
		$this->load->view('profile/profile');
	}
	
	public function edit_contact_inform()
	{
		$supplier_id = $this->session->userdata('supplier_id');
		$supplier_id =$supplier_id!='' ? $supplier_id :'1';
		$property_id=$this->uri->segment(3);
		
		$data['contact_inf']=$this->Supplier_Model->contact_inform_edit($supplier_id,$property_id);
		$data['country_list']=$this->Supplier_Model->fetch_country();
		$data['language_list']=$this->Supplier_Model->fetch_language();
		$this->load->view('profile/edit_contact_details',$data);
	}
	
	
	public function add_market($id)
	{
		$val=$this->input->post('add_market_name');
		$supplier_id = $this->session->userdata('supplier_id');
		$data['new_val'] = $this->Supplier_Model->add_market($val);
		redirect("index/edit_contact_inform/$id",'refresh');
	}
	
	public function add_markets()
	{
		$val=$this->input->post('add_market_name');
		$supplier_id = $this->session->userdata('supplier_id');
		$data['new_val'] = $this->Supplier_Model->add_market($val);
		redirect("index/edit_contact_inform",'refresh');
	}
	
		
	public function update_contact_inform($id)
	{
		$supplier_id=$this->session->userdata('supplier_id');
		$sup_prop_id=$id;
		$sup_prop_id1=$this->session->set_userdata($id);
		$country_val = $this->input->post('country_val');
		$market_name = $this->input->post('market_name');
		$pro_name = $this->input->post('pro_name');
		//$lan_val = $this->input->post('lan_val');
		$main_first_name = $this->input->post('main_first_name');
		$main_last_name = $this->input->post('main_last_name');
		$main_email = $this->input->post('main_email');
		$res_first_name = $this->input->post('res_first_name');
		$res_last_name = $this->input->post('res_last_name');
		$res_phone = $this->input->post('res_phone');
		$res_fax = $this->input->post('res_fax');
		$res_email = $this->input->post('res_email');
		$mark_first_name = $this->input->post('mark_first_name');
		$mark_last_name = $this->input->post('mark_last_name');
		$mark_phone = $this->input->post('mark_phone');
		$mark_fax = $this->input->post('mark_fax');
		$mark_email = $this->input->post('mark_email');
		$acc_first_name = $this->input->post('acc_first_name');
		$acc_last_name = $this->input->post('acc_last_name');
		$acc_phone = $this->input->post('acc_phone');
		$acc_fax = $this->input->post('acc_fax');
		$acc_email = $this->input->post('acc_email');
		$this->Supplier_Model->update_contact_info($country_val, $market_name, $pro_name, $main_first_name, $main_last_name, $main_email, $res_first_name, $res_last_name, $res_phone, $res_fax, $res_email, $mark_first_name, $mark_last_name, $mark_phone, $mark_fax, $mark_email, $acc_first_name, $acc_last_name, $acc_phone,$acc_fax,$acc_email,$supplier_id,$id); 
		redirect("index/edit_contact_inform/$id",'refresh');
	}
	
	public function property_inform()
	{
		$data['class_type_profile']=$this->Supplier_Model->fetch_class_type();
		$data['time_zone']=$this->Supplier_Model->fetch_time_zone();
		$data['currency']=$this->Supplier_Model->fetch_currency_val();
		$this->load->view('profile/property_info',$data);
	}
	
	public function add_property_inform()
	{
		$property_id = $this->uri->segment(3);
		//$this->form_validation->set_rules('pro_class_type', 'Supplier Type', 'required');
		$this->form_validation->set_rules('currency', 'Currency', 'required');
		$this->form_validation->set_rules('book_email', 'Booking Email', 'required');
		if($this->form_validation->run()==FALSE)
		{
			$data['exist'] = "";
			//$data['pro_class_type'] = $this->input->post('pro_class_type');
			$data['currency'] = $this->input->post('currency');
			$data['book_email'] = $this->input->post('book_email');
			$this->load->view('profile/edit_property_info',$data);
		}
		else
		{
			$supplier_id = $this->session->userdata('supplier_id');
			//$pro_class_type = $this->input->post('pro_class_type');
			$sup_type_apart = $this->input->post('sup_type_apart');
			$sup_type_hotel = $this->input->post('sup_type_hotel');
			$group_ass = $this->input->post('group_ass');
			$latitude = $this->input->post('latitude');
			$longitude = $this->input->post('longitude');
			$addre = $this->input->post('addre');
			$desc = $this->input->post('desc');
			$time_zone = $this->input->post('time_zone');
			$star_val = $this->input->post('star_val');
			$currency = $this->input->post('currency');
			$web = $this->input->post('web');
			//$booking_type = $this->input->post('booking_type');
			$fax_confirm = '';
			$fax_confirm = $this->input->post('fax_confirm');
			$email_confirm = '';
			$email_confirm = $this->input->post('email_confirm');
			$book_fax = $this->input->post('book_fax');
			$book_email = $this->input->post('book_email');
		
			$this->Supplier_Model->add_property_info($property_id, $supplier_id, $sup_type_apart, $sup_type_hotel, $group_ass, $latitude, $longitude, $addre, $desc, $time_zone, $star_val, $currency, $web, $fax_confirm, $email_confirm, $book_fax, $book_email);
			
			redirect('index/edit_property_info','refresh');
		}
			
	}
	
	public function edit_property_info()
	{
		$supplier_id = $this->session->userdata('supplier_id');
	    $data['class_type_profile']=$this->Supplier_Model->fetch_class_type();
		$data['time_zone']=$this->Supplier_Model->fetch_time_zone();
		$data['currency']=$this->Supplier_Model->fetch_currency_val();
		//$data['prop_inf']=$this->Supplier_Model->contact_prop_edit();
		$property_id = $this->uri->segment(3);
		
		$data['prop_inf']=$this->Supplier_Model->contact_prop_edit($supplier_id, $property_id);
		
		//PRINT_R($data['prop_inf']);exit;
		$this->load->view('profile/edit_property_info',$data);
		
	}
	public function update_property_inform($id)
	{
			
			//$pro_class_type = $this->input->post('pro_class_type');
			$sup_type_apart = $this->input->post('sup_type_apart');
			$sup_type_hotel = $this->input->post('sup_type_hotel');
			$supplier_id = $this->session->userdata('supplier_id');
			$property_id=$id;
			$group_ass = $this->input->post('group_ass');
			$latitude = $this->input->post('latitude');
			$longitude = $this->input->post('longitude');
			$addre = $this->input->post('addre');
			$desc = $this->input->post('desc');
			$time_zone = $this->input->post('time_zone');
			$star_val = $this->input->post('star_val');
			$currency = $this->input->post('currency');
			$web = $this->input->post('web');
			//$booking_type = $this->input->post('booking_type');
			$fax_confirm = '';
			$fax_confirm = $this->input->post('fax_confirm');
			$email_confirm = '';
			$email_confirm = $this->input->post('email_confirm');
			$book_fax = $this->input->post('book_fax');
			$book_email = $this->input->post('book_email');
			$this->Supplier_Model->update_property_info($supplier_id, $sup_type_apart, $sup_type_hotel, $group_ass, $latitude, $longitude, $addre, $desc, $time_zone, $star_val, $currency, $web, $fax_confirm, $email_confirm, $book_fax, $book_email, $property_id);
			redirect("index/edit_property_info/$id",'refresh');
	}
	public function acc_facility()
	{
		
		$val=$this->input->post('add_facility');
		$sup_prop_id=1;
		if($val!="")
		{
			//$hotel_fac_new_val = $this->input->post('add_facility');
			$data['new_val'] = $this->Supplier_Model->add_hotel_facility($val);
		}
		$room_val=$this->input->post('add_room_facility');
		if($room_val!="")
		{
			//$room_fac_new_val = $this->input->post('add_room_facility');
			$data['new_val'] = $this->Supplier_Model->add_room_facility($room_val);
		}
		$data['facility_iist']= $this->Supplier_Model->fetch_facility();
		$data['room_fac_list'] = $this->Supplier_Model->fetch_room_facility();
		$data['selected_facility']=$this->Supplier_Model->selected_facility($sup_prop_id);
		$this->load->view('profile/acc_facility',$data);
	}
	
	public function insert_facility()
	
	{	
		$prop_id = $this->uri->segment(3);
		if(isset($prop_id) && $prop_id!= "")	
		{	
			$data['facility_iist']= $this->Supplier_Model->fetch_home_facility($prop_id);
			$data['room_fac_list'] = $this->Supplier_Model->fetch_room_facility($prop_id);
			$this->load->view('profile/edit_facility', $data);
		}
		else
		{
			$this->load->view('profile/edit_facility');
		}
	}
	
	function add_hotel_facility($prop_id)
	{
		$supplier_id = $this->session->userdata('supplier_id');
		$data['facility_iist']= $this->Supplier_Model->add_hotel_facilitys($supplier_id);
		redirect("index/insert_facility/".$prop_id,'refresh');
	}
	
	function acc_room_facility($prop_id)
	{
		$supplier_id = $this->session->userdata('supplier_id');
		$data['facility_iist']= $this->Supplier_Model->acc_room_facilitys($supplier_id);
		redirect("index/insert_facility/".$prop_id,'refresh');
	}
	
	function set_acco_fecilities($prop_id)
	{
		$data['facility_iist']= $this->Supplier_Model->set_acco_fecilities($prop_id);
		redirect("index/insert_facility/".$prop_id,'refresh');
	}
	
	/*public function acc_facility()
	{
		$sup_prop_id=$this->uri->segment(3);
		$val=$this->input->post('add_facility');
		if($val!="")
		{
			$data['new_val'] = $this->Supplier_Model->add_hotel_facility($val, $sup_prop_id);	
		}
		$room_val=$this->input->post('add_room_facility');
		if($room_val!="")
		{
			$data['new_val'] = $this->Supplier_Model->add_room_facility($room_val, $sup_prop_id);
		}
		$data['facility_iist']= $this->Supplier_Model->fetch_facility($sup_prop_id);
		$data['room_fac_list'] = $this->Supplier_Model->fetch_room_facility($sup_prop_id);
		$data['selected_facility']=$this->Supplier_Model->selected_facility($sup_prop_id);
		$this->load->view('profile/edit_facility',$data);
		
	}*/
	
	/*public function insert_facility()
	{
		/*$sup_prop_id = $this->uri->segment(3);
		$array_hotel_fac= $this->input->post('hotel_facility');
		$array_room_fac= $this->input->post('room_facility');
		//print_r($array_hotel_fac);exit;
		if($array_hotel_fac || $array_room_fac )
		{
				$this-> Supplier_Model->add_acc_facility($array_hotel_fac, $array_room_fac, $sup_prop_id);
		}
		//redirect("index/edit_facility/$sup_prop_id",'refresh');
		
		$data['id']=$sup_prop_id;
		$data['facility_iist']= $this->Supplier_Model->fetch_facility($sup_prop_id);
		$data['room_fac_list'] = $this->Supplier_Model->fetch_room_facility($sup_prop_id);
		if($sup_prop_id)
		{
			$num_rec=$this->Supplier_Model->checkContactfac($sup_prop_id);
			if($num_rec=='0')
			{
					redirect("index/acc_facility/$sup_prop_id",'refresh');
					exit;
			}
		}
		$data['spe_fetch']=$this->Supplier_Model->fetch_fac($sup_prop_id);
		$data['selected_facility']=$this->Supplier_Model->selected_facility($sup_prop_id);
		//print_r($data['spe_fetch']);exit;
		$this->load->view('profile/edit_facility',$data);
		//$this->load->view("profile/edit_facility",$data);
		
		
		$sup_prop_id = $this->uri->segment(3);
		$array_hotel_fac= $this->input->post('hotel_facility');
		$array_room_fac= $this->input->post('room_facility');
		$this-> Supplier_Model->add_acc_facility($array_hotel_fac, $array_room_fac, $sup_prop_id);
		redirect("index/acc_facility/$sup_prop_id",'refresh');
	
	}
	*/
	
	public function general_settings()
	{
		$property_id = $this->uri->segment(3);
		
		$data['result']=$this->Supplier_Model->get_settings_val($property_id);
		$this->load->view('profile/general_settings',$data);
	}
	
	public function add_general_set()
	{
		/*$this->form_validation->set_rules('check_in_time_from', 'check_in_time_from', 'required');
		$this->form_validation->set_rules('check_in_time_to', 'check_in_time_to', 'required');
		$this->form_validation->set_rules('check_out_time_from', 'check_out_time_from', 'required');
		$this->form_validation->set_rules('check_out_time_to', 'check_out_time_to', 'required');
		$this->form_validation->set_rules('state_percentage', 'state_percentage', 'required');
		$this->form_validation->set_rules('city_percentage', 'city_percentage', 'required');
		$this->form_validation->set_rules('room_percentage', 'room_percentage', 'required');
		$this->form_validation->set_rules('vat_percentage', 'vat_percentage', 'required');
		$this->form_validation->set_rules('service_percentage', 'service_percentage', 'required');
		if($this->form_validation->run()==FALSE)
		{
			$data['exist'] = "";
			$data['check_in_time_from'] = $this->input->post('check_in_time_from');
			$data['check_in_time_to'] = $this->input->post('check_in_time_to');
			$data['check_out_time_from'] = $this->input->post('check_out_time_from');
			$data['check_out_time_to'] = $this->input->post('check_out_time_to');
			$data['state_percentage'] = $this->input->post('state_percentage');
			$data['city_percentage'] = $this->input->post('city_percentage');
			$data['room_percentage'] = $this->input->post('room_percentage');
			$data['vat_percentage'] = $this->input->post('vat_percentage');
			$data['service_percentage'] = $this->input->post('service_percentage');
			$this->load->view('profile/general_settings',$data);
		}
		else
		{*/
		$sup_prop_id = $this->uri->segment(3);
		$check_in_time_from = $this->input->post('check_in_time_from');
		$check_in_time_to = $this->input->post('check_in_time_to');
		$check_out_time_from = $this->input->post('check_out_time_from');
		$check_out_time_to = $this->input->post('check_out_time_to');
		$guest_in_time = $this->input->post('guest_in_time');
		$guest_out_time = $this->input->post('guest_out_time');
		$key_col = $this->input->post('key_col');
		$key_descrip = $this->input->post('key_descrip');
		$state_tax = $this->input->post('state_tax');
		$state_percentage = $this->input->post('state_percentage');
		$state_percentage_val = $this->input->post('state_percentage_val');
		$state_persons = $this->input->post('state_persons');
		$state_price = $this->input->post('state_price');
		$state_percentage = $this->input->post('state_percentage');
		$city_tax = $this->input->post('city_tax');
		$city_percentage = $this->input->post('city_percentage');
		$city_percentage_val = $this->input->post('city_percentage_val');
		$city_persons = $this->input->post('city_persons');
		$city_price = $this->input->post('city_price');
		$room_tax = $this->input->post('room_tax');
		$room_percentage = $this->input->post('room_percentage');
		$room_percentage_val = $this->input->post('room_percentage_val');
		$room_persons = $this->input->post('room_persons');
		$room_price = $this->input->post('room_price');
		$vat_tax = $this->input->post('vat_tax');
		$vat_percentage = $this->input->post('vat_percentage');
		$vat_percentage_val = $this->input->post('vat_percentage_val');
		$vat_persons = $this->input->post('vat_persons');
		$vat_price = $this->input->post('vat_price');
		$service_tax = $this->input->post('service_tax');
		$service_percentage = $this->input->post('service_percentage');
		$service_percentage_val = $this->input->post('service_percentage_val');
		$service_persons = $this->input->post('service_persons');
		$service_price = $this->input->post('service_price');
		$tax = $this->input->post('tax');
		$service_charge = $this->input->post('service_charge');
		$group = $this->input->post('group');
		$this->Supplier_Model->add_setting_val($sup_prop_id, $check_in_time_from, $check_in_time_to,$check_out_time_from, $check_out_time_to, $guest_in_time, $guest_out_time, $key_col, $key_descrip, $state_tax, $state_percentage, $state_percentage_val, $state_persons, $state_price, $state_percentage, $city_tax, $city_percentage, $city_percentage_val, $city_persons, $city_price, $room_tax, $room_percentage, $room_percentage_val, $room_persons, $room_price, $vat_tax, $vat_percentage, $vat_percentage_val,$vat_persons,$vat_price, $service_tax, $service_percentage, $service_percentage_val, $service_persons, $service_price, $group, $tax, $service_charge);
		
		$data['result']=$this->Supplier_Model->get_settings_val($sup_prop_id);
		redirect("index/general_settings/$sup_prop_id",'refresh');
		//}
	}
	public function edit_general_set()
	{
		/*$this->form_validation->set_rules('check_in_time_from', 'check_in_time_from', 'required');
		$this->form_validation->set_rules('check_in_time_to', 'check_in_time_to', 'required');
		$this->form_validation->set_rules('check_out_time_from', 'check_out_time_from', 'required');
		$this->form_validation->set_rules('check_out_time_to', 'check_out_time_to', 'required');
		$this->form_validation->set_rules('state_percentage', 'state_percentage', 'required');
		$this->form_validation->set_rules('city_percentage', 'city_percentage', 'required');
		$this->form_validation->set_rules('room_percentage', 'room_percentage', 'required');
		$this->form_validation->set_rules('vat_percentage', 'vat_percentage', 'required');
		$this->form_validation->set_rules('service_percentage', 'service_percentage', 'required');
		if($this->form_validation->run()==FALSE)
		{
			$data['exist'] = "";
			$data['check_in_time_from'] = $this->input->post('check_in_time_from');
			$data['check_in_time_to'] = $this->input->post('check_in_time_to');
			$data['check_out_time_from'] = $this->input->post('check_out_time_from');
			$data['check_out_time_to'] = $this->input->post('check_out_time_to');
			$data['state_percentage'] = $this->input->post('state_percentage');
			$data['city_percentage'] = $this->input->post('city_percentage');
			$data['room_percentage'] = $this->input->post('room_percentage');
			$data['vat_percentage'] = $this->input->post('vat_percentage');
			$data['service_percentage'] = $this->input->post('service_percentage');
			$this->load->view('profile/general_settings',$data);
		}
		else
		{*/
		$sup_prop_id = $this->uri->segment(3);
		$check_in_time_from = $this->input->post('check_in_time_from');
		$check_in_time_to = $this->input->post('check_in_time_to');
		$check_out_time_from = $this->input->post('check_out_time_from');
		$check_out_time_to = $this->input->post('check_out_time_to');
		$guest_in_time = $this->input->post('guest_in_time');
		$guest_out_time = $this->input->post('guest_out_time');
		$key_col = $this->input->post('key_col');
		$key_descrip = $this->input->post('key_descrip');
		$state_tax = $this->input->post('state_tax');
		$state_percentage = $this->input->post('state_percentage');
		$state_percentage_val = $this->input->post('state_percentage_val');
		$state_persons = $this->input->post('state_persons');
		$state_price = $this->input->post('state_price');
		$state_percentage = $this->input->post('state_percentage');
		$city_tax = $this->input->post('city_tax');
		$city_percentage = $this->input->post('city_percentage');
		$city_percentage_val = $this->input->post('city_percentage_val');
		$city_persons = $this->input->post('city_persons');
		$city_price = $this->input->post('city_price');
		$room_tax = $this->input->post('room_tax');
		$room_percentage = $this->input->post('room_percentage');
		$room_percentage_val = $this->input->post('room_percentage_val');
		$room_persons = $this->input->post('room_persons');
		$room_price = $this->input->post('room_price');
		$vat_tax = $this->input->post('vat_tax');
		$vat_percentage = $this->input->post('vat_percentage');
		$vat_percentage_val = $this->input->post('vat_percentage_val');
		$vat_persons = $this->input->post('vat_persons');
		$vat_price = $this->input->post('vat_price');
		$service_tax = $this->input->post('service_tax');
		$service_percentage = $this->input->post('service_percentage');
		$service_percentage_val = $this->input->post('service_percentage_val');
		$service_persons = $this->input->post('service_persons');
		$service_price = $this->input->post('service_price');
		$group = $this->input->post('group');
		$tax = $this->input->post('tax');
		$service_charge = $this->input->post('service_charge');
		$this->Supplier_Model->add_setting_val($sup_prop_id, $check_in_time_from, $check_in_time_to,$check_out_time_from, $check_out_time_to, $guest_in_time, $guest_out_time, $key_col, $key_descrip, $state_tax, $state_percentage, $state_percentage_val, $state_persons, $state_price, $state_percentage, $city_tax, $city_percentage, $city_percentage_val, $city_persons, $city_price, $room_tax, $room_percentage, $room_percentage_val, $room_persons, $room_price, $vat_tax, $vat_percentage, $vat_percentage_val,$vat_persons,$vat_price,  $service_tax, $service_percentage, $service_percentage_val, $service_persons, $service_price, $group, $tax, $service_charge);
		redirect("index/general_settings/$sup_prop_id",'refresh');
		//}
	}
	
	//----- Get Supplier's Detail Location -----/
	function detail_location()
	{
		$prop_id = $this->uri->segment(3);
		if(isset($prop_id) && $prop_id!= "")	
		{	
			$data['result'] = $this->Supplier_Model->detail_location($prop_id);
			$this->load->view('profile/detail_location',$data);
		}
		else
		{
			$this->load->view('profile/detail_location');
		}
	}
	
	//----- Set Supplier's Detail Location -----/
	function set_detail_location($prop_id)
	{
		$this->form_validation->set_rules('detail_location', 'Location', 'required');
		$this->form_validation->set_rules('nearby_airport', 'Near By Airport', 'required');
		/*$this->form_validation->set_rules('nearby_transport', 'Near By Transport', 'required');
		$this->form_validation->set_rules('nearby_placeinterest', 'Near By Placeinterest', 'required');*/
		if($this->form_validation->run()==FALSE)
		{
			$data['exist'] = "";
			$data['detail_location'] = $this->input->post('detail_location');
			$data['nearby_airport'] = $this->input->post('nearby_airport');
			/*$data['nearby_transport'] = $this->input->post('nearby_transport');
			$data['nearby_placeinterest'] = $this->input->post('nearby_placeinterest');*/
		   
			$this->load->view('profile/detail_location',$data);
		}
		else
		{
			$location = $this->input->post('detail_location');
			$nearby_airport = $this->input->post('nearby_airport');
			$nearby_transport = $this->input->post('nearby_transport');
			$nearby_placeinterest = $this->input->post('nearby_placeinterest');
			
			$this->Supplier_Model->set_detail_location($prop_id, $location, $nearby_airport, $nearby_transport, $nearby_placeinterest);
			redirect('index/detail_location/'.$prop_id,'refresh');
		}
	}
	
	//----- Edit Supplier's Detail Location -----/
	function edit_detail_location($prop_id,$id)
	{
		$this->form_validation->set_rules('detail_location', 'Location', 'required');
		$this->form_validation->set_rules('nearby_airport', 'Near By Airport', 'required');
		/*$this->form_validation->set_rules('nearby_transport', 'Near By Transport', 'required');
		$this->form_validation->set_rules('nearby_placeinterest', 'Near By Placeinterest', 'required');*/
		if($this->form_validation->run()==FALSE)
		{
			$data['exist'] = "";
			$data['detail_location'] = $this->input->post('detail_location');
			$data['nearby_airport'] = $this->input->post('nearby_airport');
			/*$data['nearby_transport'] = $this->input->post('nearby_transport');
			$data['nearby_placeinterest'] = $this->input->post('nearby_placeinterest');*/
		   
			$this->load->view('profile/detail_location',$data);
		}
		else
		{
			$location = $this->input->post('detail_location');
			$nearby_airport = $this->input->post('nearby_airport');
			$nearby_transport = $this->input->post('nearby_transport');
			$nearby_placeinterest = $this->input->post('nearby_placeinterest');
			
			$this->Supplier_Model->edit_detail_location($prop_id, $id, $location, $nearby_airport, $nearby_transport, $nearby_placeinterest);
			redirect('index/detail_location/'.$prop_id,'refresh');
		}
	}
	
	//----- Get Supplier's Accomodation Pictures -----/
	function accomodation_pictures()
	{
		$this->load->view('profile/accomodation_pictures');
	}
	
	//----- Upload Supplier's Accomodation Pictures -----/
	function uploadify()
	{
		$supplier_id = $_REQUEST['sup_id'];
		$prop_id = $_REQUEST['prop_id']; //exit;
		$targetFolder = WEB_DIR.'supplier_hotels_images'; //exit;
		if (!empty($_FILES)) {
			$fileName	=	$_FILES['Filedata']['name'];
			$tempFile 	= 	$_FILES['Filedata']['tmp_name'];
			$targetPath = 	$_SERVER['DOCUMENT_ROOT'] . '/WDM/travel_bay/supplier_hotels_images';
			$targetFile = 	rtrim($targetPath,'/') . '/' . $_FILES['Filedata']['name']; //exit;
			
			$fileTypes = array('jpg','jpeg','gif','png'); // File extensions
			$fileParts = pathinfo($_FILES['Filedata']['name']);
			
			if (in_array($fileParts['extension'],$fileTypes)) {
				$this->Supplier_Model->uploadPhotos($fileName, $tempFile, $targetPath, $supplier_id, $prop_id);
			} 
		}
	}
	
	
	//----- Get Supplier's Accomodation Pictures -----/
	function getImages()
	{
		$supplier_id = $this->session->userdata('supplier_id');
		$data['result'] = $this->Supplier_Model->getImages($supplier_id);
	}
	
	
	//----- Delete Supplier's Accomodation Pictures -----/
	function delete_picture()
	{
		$data['result'] = $this->Supplier_Model->delete_picture();
	}
	
	//----- Set Supplier's Accomodation Pictures -----/
	function set_acco_pictures($prop_id)
	{
		$data['result'] = $this->Supplier_Model->set_acco_pictures();
		redirect('index/accomodation_pictures/'.$prop_id,'refresh');
	}
	
	//----- Set Supplier's Accomodation Pictures -----/
	function status_pic()
	{
		$data['result'] = $this->Supplier_Model->status_pic();
		redirect('index/accomodation_pictures/'.$prop_id,'refresh');
	}
	
	//----- Set Supplier's Open Close Date Status -----/
	function set_open_close_dates()
	{
		$results = $this->Supplier_Model->set_open_close_dates();
	}
	
	//----- Set Supplier's Hotel details into api_permanent table -----/
	function set_api_permanent()
	{
		$results = $this->Supplier_Model->set_api_permanent();
	}
	
	//----- Get Supplier's Category List -----/
	function supplier_detail_edit()
	{
		$supplier_id = $this->session->userdata('supplier_id'); 
		$data['result'] = $this->Supplier_Model->get_supplier_detail($supplier_id);
		$this->load->view('supplier_detail_edit',$data);
	}
	
	
	function update_supplier_detail()
	{
		//print'<pre />';print_r($_POST);exit;
		$supplier_id = $this->session->userdata('supplier_id');
		$this->form_validation->set_rules('name', 'Contact Person', 'required');
		$this->form_validation->set_rules('company_name', 'Hotel Name', 'required');
		$this->form_validation->set_rules('email_id', 'Email Id', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('country', 'Country', 'required');
		$this->form_validation->set_rules('city', 'City', 'required');
		$this->form_validation->set_rules('postal_code', 'Pin Code', 'required');
		//$this->form_validation->set_rules('office_phone', 'Office Phone', 'required');
		$this->form_validation->set_rules('mobile_no', 'Mobile', 'required');
		$this->form_validation->set_rules('currency', 'Currency', 'required');	
		if($this->form_validation->run()==FALSE)
		{
			$data['exist'] = "";
			$data['name'] = $this->input->post('name');
			$data['company_name'] = $this->input->post('company_name');
			$data['email_id'] = $this->input->post('email_id');
			$data['password'] = $this->input->post('password');
			$data['address'] = $this->input->post('address');
			$data['country'] = $this->input->post('country');
			$data['city'] = $this->input->post('city');
			$data['postal_code'] = $this->input->post('postal_code');
			$data['office_phone'] = $this->input->post('office_phone');
			$data['mobile_no'] = $this->input->post('mobile_no');
			$data['currency'] = $this->input->post('currency');
			
			$this->load->view('supplier_detail_edit',$data);
		}
		else
		{
			$name = $this->input->post('name');
			$company_name = $this->input->post('company_name');
			$email_id = $this->input->post('email_id');
			$password = $this->input->post('password');
			$address = $this->input->post('address');
			$country = $this->input->post('country');
			$city = $this->input->post('city');
			$postal_code = $this->input->post('postal_code');
			$office_phone = $this->input->post('office_phone');
			$mobile_no = $this->input->post('mobile_no');
			$currency = $this->input->post('currency');
			//echo $company_name; exit;
	
		  $this->Supplier_Model->update_supplier_detail($name, $company_name, $email_id, $password, $address, $country, $city, $postal_code, $office_phone, $mobile_no, $currency, $supplier_id);
		  redirect('index/supplier_detail_edit','refresh');
		}
	}
	
	//----- Logout -----/
	public function logout()
    {
        $this->session->unset_userdata('sessionUserInfo');
		$this->session->sess_destroy();
        redirect('index/login', 'refresh'); 
    }
	
	//----- Get Cancel Policies -----/
	function getCancelPolicies($rate_tac_id)
	{
		//$rate_tac_id =  $_POST['room_rate_id']; 
		//echo $rate_tac_id;exit;
		
		$results = $this->Supplier_Model->getCancelPolicies($rate_tac_id);
	}
	
	//----- Get Minimum Stays -----/
	function getMinimumStay()
	{
		$results = $this->Supplier_Model->getMinimumStay();
	}
        
        //get the promotion rates
        function get_promotion_rates()
        {
           
            $results=$this->Supplier_Model->get_promotion_rates();
        }
	
	//----- Get Supplier's Category List -----/
	function accounting($id)
	{
		$supplier_id = $this->session->userdata('supplier_id'); 
		$data['result'] = $this->Supplier_Model->get_accounting($supplier_id,$id);
		$data['currency']=$this->Supplier_Model->fetch_currency_val();
		//$data['country_list']=$this->Supplier_Model->fetch_country();
		$this->load->view('profile/accounting',$data);
	}
	function car_rental($id)
	{
		$supplier_id = $this->session->userdata('supplier_id'); 
		$data['result'] = $this->Supplier_Model->get_car_rental_period($supplier_id,$id);
		//$data['currency']=$this->Supplier_Model->fetch_currency_val();
		//$data['country_list']=$this->Supplier_Model->fetch_country();
		$this->load->view('profile/car_rental',$data);
	}
	function add_car_rental_period($id){
		$this->load->view('profile/add_car_rental_period');
	}
	function add_car_period($hotel_id)
	{
		$this->form_validation->set_rules('from_date', 'From date', 'required');
		$this->form_validation->set_rules('to_date', 'To date', 'required');
		
		if($this->form_validation->run()==FALSE)
		{
			$this->load->view('profile/add_car_rental_period');
		}
			//print'<pre />';print_r($_POST);exit;
			$supplier_id = $this->session->userdata('supplier_id'); 
			$sd = $this->input->post('from_date');
			$ed = $this->input->post('to_date');
			
			if($sd != ''){
			$sds = explode("-",$sd);
			$from_date = $sds[2].'-'.$sds[1].'-'.$sds[0];
			}
			else{
				$from_date = "0000-00-00";
			}
			
			if($ed != '') {
			$eds = explode("-",$ed);
			$to_date = $eds[2].'-'.$eds[1].'-'.$eds[0];
			}
			else{
				$to_date = "0000-00-00";
			}
						
			
			//print '<pre />';print_r($_REQUEST); exit;
			$this->Supplier_Model->add_car_period($supplier_id, $hotel_id, $from_date, $to_date);
			
			redirect('index/car_rental/'.$hotel_id,'refresh');
		
	}
	
	public function accounting_add($hot_id)
	{
		//echo "success";exit;
		/*$this->form_validation->set_rules('check_in_time_from', 'check_in_time_from', 'required');
		$this->form_validation->set_rules('check_in_time_to', 'check_in_time_to', 'required');

		if($this->form_validation->run()==FALSE)
		{
			$data['exist'] = "";
			$data['check_in_time_from'] = $this->input->post('check_in_time_from');
			$data['check_in_time_to'] = $this->input->post('check_in_time_to');

			$this->load->view('profile/general_settings',$data);
		}
		else
		{*/
		$supplier_id = $this->session->userdata('supplier_id'); 
		$hotel_id = $this->uri->segment(3);
		$transferto = $this->input->post('transferto');
		$accnumber = $this->input->post('accnumber');
		$swift = $this->input->post('swift');
		$paycurrency = $this->input->post('paycurrency');
		$maxpayment = $this->input->post('maxpayment');
		$bankname = $this->input->post('bankname');
		$bankadd1 = $this->input->post('bankadd1');
		$bankadd2 = $this->input->post('bankadd2');
		$country = $this->input->post('country');
		$bankstate = $this->input->post('bankstate');
		$bankcity = $this->input->post('bankcity');
		$postal = $this->input->post('postal');
		$taxidsse = $this->input->post('taxidsse');



		$this->Supplier_Model->add_accounting($supplier_id, $hot_id,$transferto,$accnumber,$swift,$paycurrency,$maxpayment,$bankname,$bankadd1,$bankadd2,$country,$bankstate,$bankcity,$postal,$taxidsse);
		redirect("index/accounting/".$hot_id,'refresh');
		//}
	}
	

	/*	TO add the season*/
	function add_season($hotel_id)
	{
		$season = $this->input->post('season');
		
		$this->Supplier_Model->add_season($season);
		redirect("index/add_rate_plan_view/".$hotel_id.'/1/1','refresh');
		//$this->load->view('inventory/add_rate_plan','refresh');
	}
        
        //----- Get promotion Details -----/
	function promotion_details($hotel_id,$room_tactics_id)
	{
       $data['cate_details'] = $this->Supplier_Model->get_category_name_tactics($hotel_id,$room_tactics_id);
	   $data['promo_details'] = $this->Supplier_Model->promotions_details($hotel_id,$room_tactics_id);
	   $data['prop_id'] = $hotel_id;
	   $data['id'] = $room_tactics_id;
	   //print'<pre />';print_r($data);exit;
	   $this->load->view('inventory/promotion_list',$data);
	}
        
        
        //----- Get promotion Details -----/
	function promotion_view_details($hotel_id,$room_tactics_id,$promo_id)
	{
       $data['cate_details'] = $this->Supplier_Model->get_category_name_tactics($hotel_id,$room_tactics_id);
	   $data['promo_view_details'] = $this->Supplier_Model->promotion_view_details($promo_id);
	   $data['prop_id'] = $hotel_id;
	   $data['id'] = $room_tactics_id;
       $data['promo_id']=$promo_id;
	   //print'<pre />';print_r($data);exit;
	   $this->load->view('inventory/promotion_view',$data);
	}
        
        //add promotion view
        function add_promotion_view($hot_id,$room_tac_id)
        {
            $data['hot_id'] = $hot_id;
            $data['room_tac_id'] = $room_tac_id;
			$data['cate_details'] = $this->Supplier_Model->get_category_name_tactics($hot_id,$room_tac_id);
			//print'<pre />';print_r($data);exit;
            $this->load->view('inventory/add_promotion',$data);
        }
        
        //----- Add New Supplier's Rate Tacticse -----/
	function add_promotion($hot_id,$room_tac_id)
	{
		//print_r($_POST); die;
            
//		$this->form_validation->set_rules('category_name', 'Category Type, Room Category', 'required');
//		if($this->form_validation->run()==FALSE)
//		{
//			$data['exist'] = "";
//			$data['category_name'] = $this->input->post('category_name');
//			$this->load->view('inventory/add_promotion',$data);
//		}
//		else
//		{
           //print'<pre />';print_r($_POST);exit; 
			        
			$supplier_id = $this->session->userdata('supplier_id');
			$fromdate = $this->input->post('fromdate');
			$todate = $this->input->post('todate');
			$staynights = $this->input->post('staynights');
			$paynights = $this->input->post('paynights');
			$multiple = $this->input->post('multiple');
			
			$bbdate2 = $this->input->post('bbdate');
		
			$hhdate2 = $this->input->post('hhdate');
			
            //$roomtype= $this->input->post('roomtype');
            //$amount = $this->input->post('amount');
            $fromda = explode("-",$fromdate);
			$room_avail_date_from = $fromda[2].'-'.$fromda[1].'-'.$fromda[0];
			
			
			$toda = explode("-",$todate);
			$room_avail_date_to = $toda[2].'-'.$toda[1].'-'.$toda[0];
                        
            if($bbdate2 != '') 
			{
				$bbdate1 = explode("-",$bbdate2);
				$bbdate = $bbdate1[2].'-'.$bbdate1[1].'-'.$bbdate1[0];
			}
			else
			{
				$bbdate = '0000-00-00';
			}
			
			if($hhdate2 != '') 
			{
            	$hhdate1 = explode("-",$hhdate2);
				$hhdate = $hhdate1[2].'-'.$hhdate1[1].'-'.$hhdate1[0];
     		}
			else
			{
				$hhdate = '0000-00-00';
			}
			
			
			$sdate = $this->input->post('sd');
			$sdate1 = explode("-",$sdate);
			$promotion_avail_from = $sdate1[2].'-'.$sdate1[1].'-'.$sdate1[0];
			
			$edate = $this->input->post('ed');
			$edate1 = explode("-",$edate);
			$promotion_avail_to = $edate1[2].'-'.$edate1[1].'-'.$edate1[0];
			
			$dates = $this->input->post('dates'); 
			$weekday = $this->input->post('weekday'); 
			$price = $this->input->post('price'); 
			$extra_bed_price = $this->input->post('extra_bed_price'); 
			$avail = $this->input->post('avail'); 
			$aadult = $this->input->post('adult'); 
			$achild = $this->input->post('child');
			$child_price = $this->input->post('child_price');
			$infant = $this->input->post('infant');
			$sup_charge = $this->input->post('sup_charge');
			$booking_code=$this->input->post('booking_code');
			
			 $date_from = $this->input->post('sup_room_avail_date_from');
			 $daf = explode("-",$date_from);
		    $sup_room_avail_date_from = $daf[0].'-'.$daf[1].'-'.$daf[2];
			
			$date_to = $this->input->post('sup_room_avail_date_to');
			$dat = explode("-",$date_to);
			$sup_room_avail_date_to = $dat[0].'-'.$dat[1].'-'.$dat[2];
			 
			$season_id = $this->input->post('season_id');
			$category_type = $this->input->post('category_type');
			
			
			//print'<pre />';print_r($dates); exit;
			$this->Supplier_Model->add_promotion($supplier_id, $hot_id, $room_tac_id, $room_avail_date_from, $room_avail_date_to, $staynights, $paynights, $bbdate, $hhdate, $promotion_avail_from, $promotion_avail_to, $dates, $weekday, $price, $extra_bed_price, $avail, $aadult, $achild, $child_price, $infant, $sup_charge ,$booking_code,$sup_room_avail_date_from,$sup_room_avail_date_to,$season_id,$category_type,$multiple);
			
			redirect('index/promotion_details/'.$hot_id.'/'.$room_tac_id,'refresh');
//		}
	}
	
	function edit_promotion_plan($hot_id,$room_tac_id,$promo_id)
	{	        
	
	       // print'<pre>';print_r($_POST);exit;
			$supplier_id = $this->session->userdata('supplier_id');
			$fromdate = $this->input->post('fromdate');
			$todate = $this->input->post('todate');
			$staynights = $this->input->post('staynights');
			$check = $this->input->post('stayn');
			$paynights = $this->input->post('paynights');
			$multiple = $this->input->post('multiple');
			if($multiple ==''){
				$multiple = 0;
			}
			
			$bbdate2 = $this->input->post('bbdate');
		
			$hhdate2 = $this->input->post('hhdate');
			
            //$roomtype= $this->input->post('roomtype');
            //$amount = $this->input->post('amount');
            $fromda = explode("-",$fromdate);
			$room_avail_date_from = $fromda[2].'-'.$fromda[1].'-'.$fromda[0];
			
			
			$toda = explode("-",$todate);
			$room_avail_date_to = $toda[2].'-'.$toda[1].'-'.$toda[0];
                        
            if($bbdate2 != '') 
			{
				$bbdate1 = explode("-",$bbdate2);
				$bbdate = $bbdate1[2].'-'.$bbdate1[1].'-'.$bbdate1[0];
			}
			else
			{
				$bbdate = '0000-00-00';
			}
			
			if($hhdate2 != '') 
			{
            	$hhdate1 = explode("-",$hhdate2);
				$hhdate = $hhdate1[2].'-'.$hhdate1[1].'-'.$hhdate1[0];
     		}
			else
			{
				$hhdate = '0000-00-00';
			}
			
			
			$sdate = $this->input->post('sd');
			$sdate1 = explode("-",$sdate);
			$promotion_avail_from = $sdate1[2].'-'.$sdate1[1].'-'.$sdate1[0];
			
			$edate = $this->input->post('ed');
			$edate1 = explode("-",$edate);
			$promotion_avail_to = $edate1[2].'-'.$edate1[1].'-'.$edate1[0];
			
			$dates = $this->input->post('dates');
			$datess = $this->input->post('datess'); 
			$weekday = $this->input->post('weekday'); 
			$price = $this->input->post('price'); 
			$extra_bed_price = $this->input->post('extra_bed_price'); 
			$avail = $this->input->post('avail'); 
			$aadult = $this->input->post('adult'); 
			$achild = $this->input->post('child');
			$child_price = $this->input->post('child_price');
			$infant = $this->input->post('infant');
			$sup_charge = $this->input->post('sup_charge');
			$booking_code=$this->input->post('booking_code');
			
			
			
			//print_r($_REQUEST); exit;
			$this->Supplier_Model->update_promotion_rates($supplier_id, $hot_id, $room_tac_id, $promo_id,$room_avail_date_from, $room_avail_date_to, $staynights, $paynights, $bbdate, $hhdate, $promotion_avail_from, $promotion_avail_to, $dates,$datess, $weekday, $price, $extra_bed_price, $avail, $aadult, $achild, $child_price, $infant, $sup_charge,$booking_code,$multiple,$check);
			
			redirect('index/promotion_details/'.$hot_id.'/'.$room_tac_id,'refresh');
//		}
	}
	
	
	function add_early_bird_plan($prop_id)
	{
		
		//print'<pre />';print_r($_POST);exit;
			$supplier_id = $this->session->userdata('supplier_id');
			$season_id = $this->input->post('season');
			$cate_type = $this->input->post('category_name');
			$booking_code=$this->input->post('booking_code');
			
			
			$sd = $this->input->post('sd');
			$ed = $this->input->post('ed');
			$discount = $this->input->post('discount');
			$amount = $this->input->post('amount');
			$bb = $this->input->post('bb');
			
			if($sd != ''){
			$sds = explode("-",$sd);
			$from_date = $sds[2].'-'.$sds[1].'-'.$sds[0];
			}
			else{
				$from_date = "0000-00-00";
			}
			
			if($ed != '') {
			$eds = explode("-",$ed);
			$to_date = $eds[2].'-'.$eds[1].'-'.$eds[0];
			}
			else{
				$to_date = "0000-00-00";
			}
			if($bb !=''){
				$bbs=explode("-",$bb);
				$book_before_date = $bbs[2].'-'.$bbs[1].'-'.$bbs[0];
			}else{
				
				$book_before_date="0000-00-00";
			}
			
			//print_r($_REQUEST); exit;
			$result=$this->Supplier_Model->add_early_bird_plan($supplier_id, $prop_id, $season_id, $cate_type,$from_date, $to_date, $book_before_date, $discount ,$amount,$booking_code);
			
			redirect('index/early_bird/'.$prop_id,'refresh');
		
	}
	function view_early_bird($prop_id, $id)
	{
		$data['allot_details'] = $this->Supplier_Model->view_early_bird($prop_id,$id);
		$data['prop_id'] = $prop_id;
		$data['id'] = $id;
		$this->load->view('inventory/edit_early_bird_promotion_view',$data);
	}
	
	function edit_early_bird_plan($prop_id, $id)
	{   
			$supplier_id = $this->session->userdata('supplier_id');
			$season_id = $this->input->post('season');
			$cate_type = $this->input->post('category_name');
			$booking_code=$this->input->post('booking_code');
			
			
			$sd = $this->input->post('sd');
			$ed = $this->input->post('ed');
			$discount = $this->input->post('discount');
			$amount = $this->input->post('amount');
			$bb = $this->input->post('bb');
			
			if($sd != ''){
			$sds = explode("-",$sd);
			$from_date = $sds[2].'-'.$sds[1].'-'.$sds[0];
			}
			else{
				$from_date = "0000-00-00";
			}
			
			if($ed != '') {
			$eds = explode("-",$ed);
			$to_date = $eds[2].'-'.$eds[1].'-'.$eds[0];
			}
			else{
				$to_date = "0000-00-00";
			}
			if($bb !=''){
				$bbs=explode("-",$bb);
				$book_before_date = $bbs[2].'-'.$bbs[1].'-'.$bbs[0];
			}else{
				
				$book_before_date="0000-00-00";
			}
			
			//print_r($_REQUEST); exit;
			$this->Supplier_Model->edit_early_bird_plan($id, $supplier_id, $prop_id, $season_id, $cate_type,$from_date, $to_date, $book_before_date, $discount,$amount,$booking_code);
			
			redirect('index/early_bird/'.$prop_id,'refresh');
	}
	public function update_early_bird($prop_id, $id,$status)
	{
		$this->Supplier_Model->update_early_bird($id,$status);
		redirect('index/early_bird/'.$prop_id,'refresh');
	}
	public function update_allotment_list($prop_id, $id,$status)
	{
		$this->Supplier_Model->update_allotment_list($id,$status);
		redirect('index/view_allotment_list/'.$prop_id,'refresh');
	}
	public function update_car_rental_period($prop_id, $id,$status)
	{
		$this->Supplier_Model->update_car_rental_period($id,$status);
		redirect('index/car_rental/'.$prop_id,'refresh');
	}
	public function view_car_rental_period($hotel_id,$id)
	{
		$data['car_period'] = $this->Supplier_Model->view_car_rental_period($hotel_id,$id);
		$data['hotel_id'] = $hotel_id;
		$data['id'] = $id;
		$this->load->view('profile/edit_car_rental_period',$data);
	}
	function edit_car_period($hotel_id,$id)
	{
		$this->form_validation->set_rules('from_date', 'From date', 'required');
		$this->form_validation->set_rules('to_date', 'To date', 'required');
		
		if($this->form_validation->run()==FALSE)
		{
			$this->load->view('profile/edit_car_rental_period');
		}
			//print'<pre />';print_r($_POST);exit;
			$supplier_id = $this->session->userdata('supplier_id'); 
			$sd = $this->input->post('from_date');
			$ed = $this->input->post('to_date');
			
			if($sd != ''){
			$sds = explode("-",$sd);
			$from_date = $sds[2].'-'.$sds[1].'-'.$sds[0];
			}
			else{
				$from_date = "0000-00-00";
			}
			
			if($ed != '') {
			$eds = explode("-",$ed);
			$to_date = $eds[2].'-'.$eds[1].'-'.$eds[0];
			}
			else{
				$to_date = "0000-00-00";
			}
						
			
			//print '<pre />';print_r($_REQUEST); exit;
			$this->Supplier_Model->edit_car_period($supplier_id, $hotel_id, $from_date, $to_date,$id);
			
			redirect('index/car_rental/'.$hotel_id,'refresh');
		
	}
	public function add_car_rental_details($hotel_id,$id)
	{
		$supplier_id = $this->session->userdata('supplier_id');
		$data['car_period'] = $this->Supplier_Model->get_car_rental_period_details($hotel_id,$id); 
		$this->load->view('profile/add_car_rental_details',$data);
	}
	public function add_car_rental($hotel_id,$id)
	{
		$supplier_id = $this->session->userdata('supplier_id');
		$data['hotel_id'] = $hotel_id;
		$data['id'] = $id;
		$this->load->view('profile/add_car_rental',$data);
	}
	function add_matrix($hotel_id,$id)
	{
		$supplier_id = $this->session->userdata('supplier_id');
		$matrix = $this->input->post('matrix');
		
		$this->Supplier_Model->add_matrix($matrix,$hotel_id,$supplier_id);
		redirect("index/add_car_rental/".$hotel_id.'/'.$id,'refresh');
		
	}
	function add_car_type($hotel_id,$id)
	{
		$supplier_id = $this->session->userdata('supplier_id');
		$car_type = $this->input->post('car_type');
		
		$this->Supplier_Model->add_car_type($car_type,$hotel_id,$supplier_id);
		redirect("index/add_car_rental/".$hotel_id.'/'.$id,'refresh');
		
	}
	
	function contact()
	{
		$this->load->view('contact');
	}


	function booking_list($hotel_id)
	{
		$supplier_id = $this->session->userdata('supplier_id');
		$hotel_id = 'CRS'.$hotel_id;
		$booking_number = $this->input->post('booking_number');
		$passenger_name = $this->input->post('passenger_name');
		$booking_status = $this->input->post('booking_status');
		$sel_date_type = $this->input->post('sel_date_type');
		$fdate = $this->input->post('fdates');
		$todate = $this->input->post('tdate');
		
		$data['result'] = $this->Supplier_Model->search_my_booking_details_b($booking_number, $passenger_name, $booking_status,$sel_date_type, $fdate, $todate, $hotel_id);

		//echo '<pre/>';
		//print_r($data);exit;
		$this->load->view('my_booking',$data);
	}


	function voucher_print($book_id)
	{
		//if (!$this->session->userdata('agent_logged_in') && !$this->session->userdata('staff_logged_in')) {
			//redirect('b2b/login', 'refresh'); 
		//}
	   
		$data['result_view']=$this->Supplier_Model->book_detail_view_voucher1($book_id);
		$con_id = $data['result_view']->customer_contact_details_id;
		
		$data['contact_info']=$this->Supplier_Model->contact_info_detail_update($con_id);
		$data['trans']=$this->Supplier_Model->transation_detail_contact($con_id);
		
		$agent_id = $data['trans']->user_id;
		$data['agent_info'] = $this->Supplier_Model->agentInfo($agent_id);
		
		$con_id_pass = $data['contact_info']->customer_info_details_id;
		$data['pass_info']=$this->Supplier_Model->pass_info_detail($con_id_pass);
		
		
		$hotel_id = $data['result_view']->hotel_code;
		//$data['hotel_details']=$this->B2b_Model->gethb_hoteldet($hotel_id);
		
		$data['hotel_decs']='';
		//echo "<pre/>";
		//print_r($data);exit;
		$this->load->view('voucher3',$data);
	 }


	 function invoice_print($book_id)
	{
		//if (!$this->session->userdata('agent_logged_in') && !$this->session->userdata('staff_logged_in')) {
			//redirect('b2b/login', 'refresh'); 
		//}
		
		$data['result_view']=$this->Supplier_Model->book_detail_view_voucher1($book_id);
		$con_id = $data['result_view']->customer_contact_details_id;
		
		$data['contact_info']=$this->Supplier_Model->contact_info_detail_update($con_id);
		$data['trans']=$this->Supplier_Model->transation_detail_contact($con_id);
		
		$agent_id = $data['trans']->user_id;
		$data['agent_info'] = $this->Supplier_Model->agentInfo($agent_id);
		
		//customer_info_details_id
		$con_id_pass = $data['contact_info']->customer_info_details_id;
		$data['pass_info']=$this->Supplier_Model->pass_info_detail($con_id_pass);
		
		
		 $hotel_id = $data['result_view']->hotel_code;
		// $data['hotel_details']=$this->B2b_Model->gethb_hoteldet($hotel_id);
		
		 $data['hotel_decs']='';
		//echo "<pre/>";
		//print_r($data);exit;
		 $this->load->view('invoice',$data);
	 }

	 function my_booking_confirm()
	{
		$agent_id = $supplier_id = $this->session->userdata('supplier_id');
		$agent_type = $this->session->userdata('agent_type');		
		$branch_id = $this->session->userdata('branch_id');
					
			 $data['result_p'] = $this->Supplier_Model->search_my_booking_details_b($booking_number='', $passenger_name='', $booking_status='', $sel_date_type='', $fdate='', $todate='', $agent_id);
			
		
			 $data['result'] = $this->Supplier_Model->search_my_booking_details($booking_number='', $passenger_name='', $booking_status='', $sel_date_type='', $fdate='',$todate='',$agent_id,$branch_id);
			 
			$data['booking_number'] = $booking_number;
			$data['passenger_name'] = $passenger_name;
			$data['booking_status'] = $booking_status;
			$data['sel_date_type'] = $sel_date_type;
			
			
			//echo '<pre/>';
			//print_r($data);exit;
				 $this->load->view('my_booking',$data);
	}



	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
