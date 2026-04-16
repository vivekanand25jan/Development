<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);
ini_set('max_input_vars', 3000);
class Index extends CI_Controller {

	public function __construct()
    {
      parent::__construct();
	  $this->load->helper(array('url', 'form', 'date'));
	  $this->load->library('session');
	  $this->load->library('form_validation');
	  $this->load->database(); 
	  $this->load->model('admin_model');
	  $this->load->model('Supplier_Model');
    }
	
	public function index()
	{
		if ($this->session->userdata('admin_logged_in')) {
			redirect('index/dashboard', 'refresh'); 
		} else {
			redirect('index/login', 'refresh'); 
		}
	}
	
	public function login()
	{
		//print_r($this->session->userdata);
		if ($this->session->userdata('admin_logged_in')) {
			redirect('index/dashboard', 'refresh'); 
		}

		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email-Id', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ( $this->form_validation->run() !== false ) {
			 // then validation passed. Get from db
			 $this->load->model('admin_model');
			 $res = $this
					  ->admin_model
					  ->verify_user(
						 $this->input->post('email'), 
						 $this->input->post('password')
					  );

			 if ( $res !== false ) {
				$sessionUserInfo = array( 
				'user_id' 		=> $res->user_id,
				'firstname' 	=> $res->firstname,
				'lastname'	 	=> $res->lastname,
				'email'	 		=> $res->email,
				'admin_logged_in' 	=> TRUE
				);
				$this->session->set_userdata($sessionUserInfo);
				
				redirect('index/dashboard', 'refresh'); 
			 }
		}
		
		$this->load->view('login_view');
	}
	
	public function logout()
    {
        $this->session->unset_userdata('sessionUserInfo');
		$this->session->sess_destroy();
        redirect('index/login', 'refresh'); 
    }
	
	function dashboard()
	{
		//echo 'sss';exit;
		//echo $this->session->userdata('admin_logged_in').'sss';exit;
		if (!$this->session->userdata('admin_logged_in') || $this->session->userdata('admin_logged_in')=='') {
			redirect('index/login', 'refresh'); 
		} 
		
	//	$this->load->view('header');
		
		$this->load->view('dashboard');
		
	}
	
	public function myacc_details()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		 
		//$this->load->view('header');
		
		$user_id = $this->session->userdata('user_id');
		
		$data['user_info'] = $this->admin_model->getUserInfo($user_id);
		//print_r($user_info);
		
		
		$this->load->view('myacc_details', $data);
		
	}
	public function support_ticket()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		 
		//$this->load->view('header');
		
	
	$data['agent_list'] = $this->admin_model->getsupportinfo();
	//$data['agent_list_h'] = $this->admin_model->getsupportinfo('On Hold');
	$data['agent_list_c'] = $this->admin_model->getsupportinfo_c();
	$this->load->view('support_ticket',$data);
		
	}
	function close_ticket($id)
	{
			if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		$data = array(
			'status' => 'Closed',
			'process' => 'Admin',
			'order' => 1
			
			);
			
		$where = "ticket_id = $id";
		$this->db->update('support_ticket', $data, $where);
		redirect('index/support_ticket','refresh');
	}
	function view_ticket($id)
{
			if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$data['agent_list'] = $this->admin_model->getsupportinfo_details($id);
		$data['message'] = $this->admin_model->getsupportinfo_details_msg($id);

		$this->load->view('view_ticket',$data);
	
}
function update_ticket()
	{
			if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		$message = $_POST['message'];
		$agent_id = $_POST['agent_id'];
		$ticket_id = $_POST['ticket_id'];
		
		$this->admin_model->update_ticket_agent($agent_id,$ticket_id,$message);
		redirect('index/view_ticket/'.$ticket_id ,'refresh');
	}
	public function edit_myacc_details()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		$user_id = $this->session->userdata('user_id');
		 
		$this->form_validation->set_rules('firstname', 'First Name', 'required');
		$this->form_validation->set_rules('lastname', 'Last Name', 'required');
		//$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('contact_no', 'Contact No', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		
		$password = $this->input->post('password');
		if (!empty($password)) {
			$this->form_validation->set_rules('password', 'Password', 'required|matches[comform_password]');
			$this->form_validation->set_rules('comform_password', 'Confirm Password', 'required');
		}

		
		if($this->form_validation->run()==FALSE)
		{
			//echo 'xxx'; exit;
			
		$user_id = $this->session->userdata('user_id');
		
		$data['user_info'] = $this->admin_model->getUserInfo($user_id);
		//print_r($user_info);
		
		
		$this->load->view('myacc_details', $data);
		}
		else
		{
			$firstname = $this->input->post('firstname');
		   $lastname = $this->input->post('lastname');
		   $email = $this->input->post('email');
		   $contact_no = $this->input->post('contact_no');
		   $address = $this->input->post('address');
		   $password = $this->input->post('password');
		   
		   if ($this->admin_model->edit_myacc_details($user_id, $firstname, $lastname, $email, $contact_no, $address, $password)) {
					redirect('index/myacc_details', 'refresh');
		   }
			
		}
		
		
		
		
	}
	
	 function edit_myacc_details_p()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		$user_id = $this->session->userdata('user_id');
		 
		$this->form_validation->set_rules('firstname', 'Current Password', 'required');
		
		$password = $this->input->post('password');
		if (!empty($password)) {
			$this->form_validation->set_rules('password', 'Password', 'required|matches[comform_password]');
			$this->form_validation->set_rules('comform_password', 'Confirm Password', 'required');
		}

		
		if($this->form_validation->run()==FALSE)
		{
		
			
		$user_id = $this->session->userdata('user_id');
		
		$data['user_info'] = $this->admin_model->getUserInfo($user_id);
		//print_r($user_info);
		
		
		$this->load->view('myacc_details', $data);
		}
		else
		{
			
			$firstname = $this->input->post('firstname');
		   $password = $this->input->post('password');
		   
		   if ($this->admin_model->edit_myacc_details_ps($user_id, $firstname,$password)) {
					redirect('index/myacc_details', 'refresh');
		   }
		   else
		   {
			 	$user_id = $this->session->userdata('user_id');
		
		$data['user_info'] = $this->admin_model->getUserInfo($user_id);
		//print_r($user_info);
		
		
		$this->load->view('myacc_details', $data);  
		   }
			
		}
		
		
		
		
	}
	
	
	
	//------------- Get Statistical Chart Results -------- //
	function graph_report($statisticalChart)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$tmp_data = $this->admin_model->graph_report($statisticalChart);
		if($tmp_data['result'] != ""){
			$data['result'] = $tmp_data['result']; 
			echo $this->load->view('graph', $data, true);
		} else {
			echo '<span style="color:red;">No records for this!..</span>';
		} 
	}
	
	
	//------------- Get Statistical Pie Chart Results -------- //
	function graph_pieChart_report(){
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		 $results = $this->admin_model->graph_pieChart_report();
	}
	
	
	//------------- Get Statistical Line Chart Results -------- //
	function graph_lineChart_report(){
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		 $results = $this->admin_model->graph_lineChart_report();
	}
	
	
	//------------- Get Statistical Overview Results -------- //
	function getStaticOverview(){
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		 $results = $this->admin_model->getStaticOverview();
	}


	//------------- Get Statistical Chart Results (Old) -------- //
	function getStaticChart(){
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		 $results = $this->admin_model->getStaticChart();
	}
	
	/*function graph_report()
	{
		$this->load->view('graph') ;
	}
	function graph_report1()
	{
		$this->load->view('graph1') ;
	}*/
	function registration_page()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		//print '<pre>';print_r($_POST);exit;
		
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('company_name', 'Company Name', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		
		$this->form_validation->set_rules('country', 'Country', 'required');
		$this->form_validation->set_rules('city', 'City', 'required');
		$this->form_validation->set_rules('postal_code', 'Zip Code', 'required');
		$this->form_validation->set_rules('office_phone', 'Office Phone', 'required');
		
		$this->form_validation->set_rules('mobile_no', 'Mobile', 'required');
		$this->form_validation->set_rules('currency', 'Currency', 'required');
		$this->form_validation->set_rules('cc_id', 'Callcenter ID', 'required');
		$this->form_validation->set_rules('a_type', 'Agent Type', 'required');
		
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[agent.email_id]');
		$this->form_validation->set_rules('password', 'Password', 'required|matches[comform_password]');
		$this->form_validation->set_rules('comform_password', 'Confirm Password', 'required');
	
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
		   
		   
		   $this->load->view('registration_page',$data);
		}
		else
		{
	
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
		   $a_type = $this->input->post('a_type');
		   $cc_id = $this->input->post('cc_id');
		   $agent_logo  = $_FILES['agent_logo_admin']['name'];
		   
		   $target_path = 	$_SERVER['DOCUMENT_ROOT'] . '/agent_logos';
		   $target_path = 	rtrim($target_path,'/').'/'.basename($_FILES['agent_logo_admin']['name']); 
			
		    $move 		 =  move_uploaded_file($_FILES['agent_logo_admin']['tmp_name'], $target_path); 
			
			
		   if ($this->admin_model->add_agent($name, $company_name, $address, $country, $city, $postal_code, $office_phone, $mobile_no,$currency, $email, $password,$a_type,$cc_id, $agent_logo)) {
			
						  
			$config['protocol'] = 'smtp';
			$config['smtp_host'] = 'mail.provab.com';
			$config['smtp_port'] = 25;
			$config['smtp_user'] = 'christin@provab.com';
			$config['smtp_pass'] = 'provab123';
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
    <td>Greetings From TravelBay,</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><p>Many thanks for your Interest and Submitting Online Agent Registration using TravelBay.com.
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
          <td>Please do not hesitate to contact us on <font color="#00CC33">info@TravelBay.com</font> for all your Urgent Queries / Reservation or Requirements.</td>
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
                  <td><strong>TravelBay.com</strong></td>
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
				
				
				$from = 'bookings@TravelBay.com';
				$sub = 'Agent Registration Acknowledgment - TravelBay.com ';
				$this->email->from($from,'Admin - TravelBay.com');
				$to = strip_tags($email);
				$this->email->to($to);
				$this->email->subject($sub);
				$this->email->message($msg);



				if($this->email->send())
				{
				
					//$data['emailId'] = $email;
					redirect('/index/agent_list', 'refresh');
				}
				else
				{
					show_error($this->email->print_debugger());
				}
		  
			  //$newdata = array('userid'=> $custid,'username'=>$fname,'lastname'=>$sname,'email'=>$email,'logged_in' => TRUE);
			  //$this->session->set_userdata($newdata);
				  
				/*$config['protocol'] = 'smtp';
				$config['smtp_host'] = 'mail.provab.com';
				$config['smtp_port'] = 25;
				$config['smtp_user'] = 'christin@provab.com';
				$config['smtp_pass'] = 'provab123';
				$config['wordwrap'] = FALSE;
				$config['mailtype'] = 'html';
				$config['charset'] = 'utf-8';
				$config['crlf'] = "\r\n";
				$config['newline'] = "\r\n";
				$this->load->library('email', $config);
				$this->email->set_newline("\r\n");
				$msg='<html>';

				$msg.='<body>';
				$msg.='<table width="100%" border="0" cellspacing="0" cellpadding="0">';
				$msg.='<tr><td>Dear  <b>'.ucfirst($name).'</b>,</td></tr>';

				$msg.= '<tr><td>&nbsp;</td></tr>';
				$msg.='<tr><td>Greetings From Provab,</td></tr>';
				$msg.= '<tr><td>&nbsp;</td></tr>';
				$msg.='<tr><td> Username : '.$email.' </td></tr>
				<tr><td>&nbsp;</td></tr>
				<tr><td> Password : '.$pass.' </td></tr>
				<tr><td>&nbsp;</td></tr>';
				$msg.='<tr><td>Thanking  you,</td></tr>
				<tr><td>&nbsp;</td></tr>
				<tr><td> Registration  &amp; Sales Team,</td></tr>
				<tr><td><b> Provab </b></td></tr>';
				$msg.='<tr><td>&nbsp;</td></tr>';
				$msg.='</table></body></html>';
				
				$from = 'ruby.provab@gmail.com';
				$sub = 'Registration Acknowledgment Provab ';
				$this->email->from($from,'Provab');
				$to = strip_tags($email);
				$this->email->to($to);
				$this->email->subject($sub);
				$this->email->message($msg);


				if($this->email->send())
				{*/
				
					//$data['emailId'] = $email;
					//$this->load->view('agent_list');
					

				/*}
				else
				{
					show_error($this->email->print_debugger());
				}*/
			}
			else
			{
				$data['exist'] = "Error data inserting.";
				$this->load->view('registration_page',$data);
			}
		//}
		}
	}
	function cancel_booking($id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		 $data['result_view']=$this->admin_model->view_trans_detail_id_new2($id);
		 
		$this->load->view('cancel_booking',$data);
	}
	function cancel_booking_final($id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$result_view=$this->admin_model->view_trans_detail_id_new2($id);
		$h_id = $result_view->hotel_booking_id;
		$view=$this->admin_model->book_detail_view_voucher1($h_id);
		
		$api = $view->api;
		$pnr  = $result_view->prn_no;
		$booking_number = $result_view->booking_number;
	
		if($api == 'gta')
		{
		
	$client="1184";
	$email="XML.PROVAB@ITRAVELUKRAINE.COM";
	$pass="PASS"; // local
	$URL = "https://interface.demo.gta-travel.com/wbsapi/RequestListenerServlet";//local

	$currency_type='USD';
	$xml_data ='<?xml version="1.0" encoding="UTF-8"?>
<Request>
 <Source>
  <RequestorID Client="'.$client.'" EMailAddress="'.$email.'" Password="'.$pass.'" />
  <RequestorPreferences Language="en" Currency="USD">
   <RequestMode>SYNCHRONOUS</RequestMode>
  </RequestorPreferences>
 </Source>
 <RequestDetails>
  <CancelBookingItemRequest>
   <BookingReference ReferenceSource="client">'.$booking_number.'</BookingReference>
   <ItemReferences>
    <ItemReference>1</ItemReference>
   </ItemReferences>
  </CancelBookingItemRequest>
 </RequestDetails>
</Request>';

//echo $xml_data;
       $ch=curl_init();
        curl_setopt($ch, CURLOPT_URL, $URL);
        curl_setopt($ch, CURLOPT_TIMEOUT, 180);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml_data);
  		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 1);
  		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSLVERSION, 3);
	  	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, FALSE);

        $httpHeader = array(
            "Content-Type: text/xml; charset=UTF-8",
            "Content-Encoding: UTF-8"
        );
        curl_setopt($ch, CURLOPT_HTTPHEADER, $httpHeader);

        // Execute request, store response and HTTP response code
        $output=curl_exec($ch);
        $errno = curl_getinfo( $ch, CURLINFO_HTTP_CODE );
        curl_close($ch);
//echo $output;exit;
		    $dom=new DOMDocument();
			$dom->loadXML($output);
			$statusval='';
			$BookingResponse=$dom->getElementsByTagName("BookingResponse");
			foreach($BookingResponse as $BookingResponseval)
			{
				$BookingItems=$BookingResponseval->getElementsByTagName("BookingItems");
				foreach($BookingItems as $cnno)
				{
					$BookingItem=$cnno->getElementsByTagName("BookingItem");
					foreach($BookingItem as $BookingItemval)
					{
						$ItemStatus=$BookingItemval->getElementsByTagName("ItemStatus");
						$statusval = $ItemStatus->item(0)->nodeValue;
					}

				}
			}
				if ($statusval != '') 
			{
				$data = array(
					'status' => $statusval
					);
		
					$where = "booking_number = '$booking_number'";
			
					$this->db->update('transaction_details', $data, $where);
					$data['exits'] ='Cancellation process successfully completed.';
			}
			else 
			{
				$data['exits'] = 'Cancellation process not completed.';
			}	
			$this->load->view("cancellaion_end",$data);
			
		}
		if($api == 'hotelsbed')
		{
			
			$pnr_no = explode("-",$booking_number);
			$user="HTLEXPLORAE64882";
		$pass="HTLEXPLORAE64882";
		$URL = "http://212.170.239.71/appservices/http/FrontendService";//local
       
				$xml_data ='<PurchaseCancelRQ xmlns="http://www.hotelbeds.com/schemas/2005/06/messages" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.hotelbeds.com/schemas/2005/06/messages PurchaseCancelRQ.xsd" type="C">
				<Language>ENG</Language>
				<Credentials>
					<User>'.$user.'</User>
					<Password>'.$pass.'</Password>
				</Credentials>
				<PurchaseReference>
					<FileNumber>'.$pnr_no[1].'</FileNumber>
					<IncomingOffice code="'.$pnr_no[0].'"/>
				</PurchaseReference>
			</PurchaseCancelRQ>';
			$ch=curl_init();
			curl_setopt($ch, CURLOPT_URL, $URL);
			curl_setopt($ch, CURLOPT_TIMEOUT, 180);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $xml_data);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 1);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
			curl_setopt($ch, CURLOPT_SSLVERSION, 3);	
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	 
			$httpHeader = array(
				"Content-Type: text/xml; charset=UTF-8",
				"Content-Encoding: UTF-8"
			);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $httpHeader);
	
			// Execute request, store response and HTTP response code
			$output=curl_exec($ch);
			$errno = curl_getinfo( $ch, CURLINFO_HTTP_CODE );
			curl_close($ch);		
			
		//  echo '<pre/>';print_r($output);exit;
			$array = $this->admin_model->xml2array($output);				
			$statusval='';
	 		if(!isset($array['PurchaseCancelRS']['ErrorList']['Error']))
			{
				$dom=new DOMDocument();
				$dom->loadXML($output);
			
				$status=$dom->getElementsByTagName("Status");
				$statusval=$status->item(0)->nodeValue;
			}
			if ($statusval != '') 
			{
				$data = array(
					'status' => $statusval
					);
		
					$where = "booking_number = '$booking_number'";
			
					$this->db->update('transaction_details', $data, $where);
					$data['exits'] ='Cancellation process successfully completed.';
			}
			else 
			{
				$data['exits'] = 'Cancellation process not completed.';
			}	
			$this->load->view("cancellaion_end",$data);
		}
		if($api == 'travco')
		{
			$pnr_no = explode("-",$booking_number);
			 $agentcode='133YZA'; //live
			$agentpwd='130611YZ31'; //live
			   $URL ="http://xmlv5test.travco.co.uk/trlink/link1/trlink";
				$name_space = 'http://xmlv5test.travco.co.uk/trlink/schema/HotelAvailabilityV6Snd.xsd';//live
		
			$xml_datareq =  "<?xml version='1.0' encoding='UTF-8'?>
			<BOOKING type='BE' returnURLNeed='no' returnURL='http://' AGENTCODE='".$agentcode."' AGENTPASSWORD='".$agentpwd."' xmlns:xsi='http://www.w3.org/2001/XMLSchema-instance' xsi:noNamespaceSchemaLocation='".$name_space."'>
			<HEADER>
				<INTERNAL_CODE1>DWEBCN</INTERNAL_CODE1>
				<INTERNAL_CODE2>HTMLENQ</INTERNAL_CODE2>
				<INTERNAL_CODE4>DWEBRS</INTERNAL_CODE4>
				<INTERNAL_CODE7>VB</INTERNAL_CODE7>
				<INTERNAL_CODE8>travel system</INTERNAL_CODE8>
			</HEADER>
			
			<DATA REF_NO='".$pnr_no[1]."' >

			</DATA>
			</BOOKING>";




			$ch = curl_init($URL);
			//curl_setopt($ch, CURLOPT_MUTE, 1);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml'));
			curl_setopt($ch, CURLOPT_POSTFIELDS, "$xml_datareq");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$output = curl_exec($ch);
			curl_close($ch);

			$dom=new DOMDocument();
			$dom->loadXML($output);
			//var_dump($output);
		$name=$dom->getElementsByTagName("LEAD_PAX_NAME");
			$nameval = $name->item(0)->nodeValue;

			$hotelName=$dom->getElementsByTagName("DATA_HOTEL");
			$hotelcode = $hotelName->item(0)->getAttribute("HOTEL_CODE");

			$arrdate = $hotelName->item(0)->getAttribute("ARR_DATE");

			$roomcode = $hotelName->item(0)->getAttribute("ROOM_CODE");

			 $bookingItemCode=$dom->getElementsByTagName("DATA_HOTEL");
			$bookcode = $bookingItemCode->item(0)->getAttribute("TRAVCO_REF_NO");

			$refcode=date("YmdHis");
			$curdate=date("d-M-Y");
			//$hotelcode=$this->input->post('hotelcode');
			//$name=$this->input->post('name');
			if($bookcode != '')
			{
				 $agentcode='133YZA'; //live
			$agentpwd='130611YZ31'; //live
			   $URL ="http://xmlv5test.travco.co.uk/trlink/link1/trlink";
			$name_space = 'http://xmlv5test.travco.co.uk/trlink/schema/HotelAvailabilityV6Snd.xsd';//live
			
			$xml_data =  "<?xml version='1.0' encoding='UTF-8'?>
			<BOOKING type='HB'  returnURLNeed='no' returnURL='http://' AGENTCODE='".$agentcode."' AGENTPASSWORD='".$agentpwd."' xmlns:xsi='http://www.w3.org/2001/XMLSchema-instance' xsi:noNamespaceSchemaLocation='".$name_space."'>
			<HEADER>
				<INTERNAL_CODE1>DWEBCN</INTERNAL_CODE1>
				<INTERNAL_CODE2>".$refcode."</INTERNAL_CODE2>
				<INTERNAL_CODE3></INTERNAL_CODE3>
				<INTERNAL_CODE4>".$curdate."</INTERNAL_CODE4>
				<INTERNAL_CODE5>DWEBRS</INTERNAL_CODE5>
				<INTERNAL_CODE6>AY00303/01</INTERNAL_CODE6>
				<INTERNAL_CODE7>1</INTERNAL_CODE7>
				<INTERNAL_CODE8>VB</INTERNAL_CODE8>
				<INTERNAL_CODE9>travel system</INTERNAL_CODE9>
			</HEADER>
			
			<DATA_HOTEL ADULTS='2' DURATION='1' ARR_DATE='".$arrdate."' HOTEL_CODE='".$hotelcode."' ROOM_CODE='".$roomcode."'  STATUS='C' PRICE_CODE='LONDON' INTERNAL_CODE10='1'  INTERNAL_CODE11='1'>
				<PAX_NAME>".$nameval."</PAX_NAME>
				<REF_NO>".$bookcode."</REF_NO>
				<OUR_REF_NO>SA01</OUR_REF_NO>
			</DATA_HOTEL>
			</BOOKING>";

			$ch = curl_init($URL);
			//curl_setopt($ch, CURLOPT_MUTE, 1);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml'));
			curl_setopt($ch, CURLOPT_POSTFIELDS, "$xml_data");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$output1 = curl_exec($ch);
			curl_close($ch);
			//var_dump($output1);
		
	
				 /* echo "<Pre>";
			  print_r($array);
			  echo "</Pre>";*/
		
			  //echo $statusvalue;exit;
		//echo '<pre/>';print_r($output1);exit;
			$array = $this->admin_model->xml2array($output1);				
			$statusval='';
	 		if(isset($array['RETURNDATA']['DATA_HOTEL_attr']))
			{
				
			  $arrval=$array['RETURNDATA']['DATA_HOTEL_attr'];
			   $statusvalue =$arrval['STATUS'];
			}
			//echo $statusvalue;exit;
			if ($statusvalue == 'C') 
			{
				$data = array(
					'status' => $statusval
					);
		
					$where = "booking_number = '$booking_number'";
			
					$this->db->update('transaction_details', $data, $where);
					$data['exits'] ='Cancellation process successfully completed.';
			}
			else 
			{
				$data['exits'] = 'Cancellation process not completed.';
			}	
			$this->load->view("cancellaion_end",$data);
		}
		else
		{
				$data['exits'] = 'Cancellation process not completed.';
				$this->load->view("cancellaion_end",$data);
		}
		}
		if($api == 'hotelspro')
		{
		
			 $client = new SoapClient("http://api.hotelspro.com/4.1_test/hotel/b2bHotelSOAP.wsdl", array('trace' => 1));
		 // $trackingId=ruby.4311@gmail.com;
		// echo $booking_number;exit;
		 $trackingId = explode("||",$booking_number);
		  try {
			  $cancelHotelBooking = $client->cancelHotelBooking("TldsVFh3MEpXSnEwVWRSOHJWTGgzVlBzVDE5SHQzSDBwUm5SSmtQNUNXdmR0UXlPdGR5YUlRSkFtWDhocmk2Qg==", $trackingId[1]);
		  }
		  catch (SoapFault $exception) {
			  echo $exception->getMessage();
			  exit;
		  }
		  
				if ($cancelHotelBooking->bookingStatus != '') 
			{
				$data = array(
					'status' => $cancelHotelBooking->bookingStatus
					);
		
					$where = "booking_number = '$booking_number'";
			
					$this->db->update('transaction_details', $data, $where);
					$data['exits'] ='Cancellation process successfully completed.';
			}
			else 
			{
				$data['exits'] = 'Cancellation process not completed.';
			}	
			$this->load->view("cancellaion_end",$data);
			
		}

		if($api == 'crs')
		{

			$pnr_no = $booking_number;
			//$totCancelAmt = $this->input->post('totCancelAmt');
			$statusval='Cancelled';
	 		
			if($statusval != '') 
			{
				$agent_id = $this->session->userdata('agent_id');
				$agent_type = $this->session->userdata('agent_type');
				$branch_id = $this->session->userdata('branch_id');
				$agent_det = $this->admin_model->agentInfo($this->session->userdata('agent_id'));

				$agent_det->agent_mode; //exit;
				
				

				//$this->admin_model->debitBookingAmount_credit($agent_id,$branch_id,$totCancelAmt);
				
				$data = array(
					'status' => $statusval,
					
				);
		
					$where = "booking_number = '$booking_number'";
			
					$this->db->update('transaction_details', $data, $where);
					$data['exits'] ='Cancellation process successfully completed.';

					
			}
			else 
			{
				$data['exits'] = 'Cancellation process not completed.';
			}	
			$this->load->view("cancellaion_end",$data);
	/*	
	$client="1184";
	$email="XML.PROVAB@ITRAVELUKRAINE.COM";
	$pass="PASS"; // local
	$URL = "https://interface.demo.gta-travel.com/wbsapi/RequestListenerServlet";//local

	$currency_type='USD';
	$xml_data ='<?xml version="1.0" encoding="UTF-8"?>
<Request>
 <Source>
  <RequestorID Client="'.$client.'" EMailAddress="'.$email.'" Password="'.$pass.'" />
  <RequestorPreferences Language="en" Currency="USD">
   <RequestMode>SYNCHRONOUS</RequestMode>
  </RequestorPreferences>
 </Source>
 <RequestDetails>
  <CancelBookingItemRequest>
   <BookingReference ReferenceSource="client">'.$booking_number.'</BookingReference>
   <ItemReferences>
    <ItemReference>1</ItemReference>
   </ItemReferences>
  </CancelBookingItemRequest>
 </RequestDetails>
</Request>';

//echo $xml_data;
       $ch=curl_init();
        curl_setopt($ch, CURLOPT_URL, $URL);
        curl_setopt($ch, CURLOPT_TIMEOUT, 180);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml_data);
  		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 1);
  		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSLVERSION, 3);
	  	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, FALSE);

        $httpHeader = array(
            "Content-Type: text/xml; charset=UTF-8",
            "Content-Encoding: UTF-8"
        );
        curl_setopt($ch, CURLOPT_HTTPHEADER, $httpHeader);

        // Execute request, store response and HTTP response code
        $output=curl_exec($ch);
        $errno = curl_getinfo( $ch, CURLINFO_HTTP_CODE );
        curl_close($ch);
//echo $output;exit;
		    $dom=new DOMDocument();
			$dom->loadXML($output);
			$statusval='';
			$BookingResponse=$dom->getElementsByTagName("BookingResponse");
			foreach($BookingResponse as $BookingResponseval)
			{
				$BookingItems=$BookingResponseval->getElementsByTagName("BookingItems");
				foreach($BookingItems as $cnno)
				{
					$BookingItem=$cnno->getElementsByTagName("BookingItem");
					foreach($BookingItem as $BookingItemval)
					{
						$ItemStatus=$BookingItemval->getElementsByTagName("ItemStatus");
						$statusval = $ItemStatus->item(0)->nodeValue;
					}

				}
			}
				if ($statusval != '') 
			{
				$data = array(
					'status' => $statusval
					);
		
					$where = "booking_number = '$booking_number'";
			
					$this->db->update('transaction_details', $data, $where);
					$data['exits'] ='Cancellation process successfully completed.';
			}
			else 
			{
				$data['exits'] = 'Cancellation process not completed.';
			}	
			$this->load->view("cancellaion_end",$data);
			*/
		}
	}

	
	function b2c_reports()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		 $data['api'] = $this->admin_model->getAPIs();
		 $data['countries'] = $this->admin_model->getCountries();
		
		 $data['result_view']=$this->admin_model->view_trans_detail();
		//  $data['result_view']=$this->admin_model->view_trans_detail();
		$this->load->view('b2c_reports',$data);
	}
	
	
	function b2b_reports()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		 $data['api'] = $this->admin_model->getAPIs();
		 $data['countries'] = $this->admin_model->getCountries();
		
		 $data['result_view']=$this->admin_model->view_trans_detail_b2b(); 
		//  $data['result_view']=$this->admin_model->view_trans_detail();
		$this->load->view('b2b_reports',$data);
	}

function generate_excel()        
        {
			
				
		
			//$s_p = array('id'=>'and t.booking_number','status'=>'and t.status','b_sd'=>'and t.created_date','b_ed'=>'and t.created_date','c_sd'=>,'c_ed','name','country','email','ph','api','api_no');
			$uri = $this->uri->uri_string();
			$nn = explode('/',$uri);
			for($i=2;$i<count($nn)-2;$i++){
				$cc = explode('~',$nn[$i]);
				//$where[]='and '.'$'.$cc[0]."="."'".$cc[1]."'";
		if($cc[0]=='id') {
			$where.= "and t.booking_number ='".$cc[1]."' ";
		}	
		
	   if($cc[0]=='status'){
			$where.= "and t.status ='".rawurldecode($cc[1])."' ";
		}
		 if($cc[0]=='name'){
			$where.= "and c.first_name ='".$cc[1]."'";
		}
		
	if($cc[0]=='email'){
			$where.= "and c.email ='".$cc[1]."' ";
		}
		
		if($cc[0]=='ph'){
			$where.= "and c.phone ='".$cc[1]."' ";
		}
		
		if($cc[0]=='api'){
			$where.= "and h.api ='".$cc[1]."' ";
		}

if($cc[0]=='api_no'){
			$where.= "and t.booking_number ='".$cc[1]."' ";
		}

		
		if($cc[0]=='b_sd'){
			
			 $where.= " and h.voucher_date>= '".$cc[1]."'";
			
		}
		if($cc[0]=='b_ed'){
			
			 $where.= " and h.voucher_date<= '".$cc[1]."' ";
			
		}
		
		if($cc[0]=='c_sd'){
			
			 $where.= " and h.check_in>='".$cc[1]."'";
			
		}
		if($cc[0]=='c_ed'){
			
			 $where.= " and h.check_in<='".$cc[1]."' ";
			
		}
				
			}
		

		//$imp = implode(',',$where);
		
			//$this->admin_model->Advancedsearch_booking_view_update_search( $imp );
			
            $contents="Booking ID,Booking Date,Check-In date,Supplier Status,First Name,Last Name, Email-Id,Telephone,City,Hotel Name,Hotel Phone,Hotel City,No. Of Rooms, Room Type,Basis, Status,Supplier Name,Supplier Confirmation No,Net price, Currency,Selling Price,Profit,Paymentgateway Charge,Profit after payment Gateway Charge\n"; 
 
		 //$result=$this->admin_model->view_trans_detail_b2b();
		$result =  $this->admin_model->Advancedsearch_booking_view_update_search( $where );

     //echo '<pre/>'; print_r($result);exit;
            for($i=0;$i<count($result);$i++)
	  {
		 $a = explode("-",$result[$i]->room_type);
		$con_id = $result[$i]->customer_contact_details_id;
	   $con_i=$this->admin_model->contact_info_detail_update_new($con_id);
	$aa=$result[$i]->city;
	$ac=explode(",",$aa);

	$ab=implode("-",$ac);
//echo '<pre/>'; print_r($ab);exit;
		  //{
                        $contents.=$result[$i]->booking_number.",";
			$contents.=$result[$i]->voucher_date.",";
			$contents.=$result[$i]->check_in.",";
                        $contents.=$result[$i]->status.",";
                        $contents.=$con_i->first_name.",";
                        $contents.=$con_i->last_name.",";
                       	$contents.=$con_i->email.",";
                        $contents.=$con_i->phone.",";
                        $contents.=$con_i->city.",";
			$contents.=$result[$i]->hotel_name.",";
                        $contents.=$result[$i]->phone.",";
                        
                        $contents.=$ab.",";
                        $contents.=$result[$i]->no_of_room.",";
                        $contents.=$a[0].",";
			$contents.=$a[1].",";
			$contents.=$result[$i]->status.",";
			$contents.=$result[$i]->api.",";
			$contents.=$result[$i]->booking_number.",";
                      	$contents.=$result[$i]->amount-$result[$i]->markup.",";
			$contents.=AED.",";
			$contents.=$result[$i]->amount.",";
			$contents.=$result[$i]->markup.",";
			$contents.=$result[$i]->gateway.",";
			$contents.=$result[$i]->markup-$result[$i]->gateway."\n";
                  //}
                  
          } 
            
             header("Content-type: application/octet-stream");
	    header("Content-Disposition: attachment; filename=B2B_Reports.csv");
	    header("Pragma: no-cache");
	    header("Expires: 0");
            //header("Content-Disposition: attachment; filename=Flight Booking Reports ".date('d-m-Y').".csv");

            echo $contents;
        }	
	
	

	function backup_tables($tables = '*')
{
	
	$conn=mysql_connect("localhost","root",'');
mysql_select_db("travel_bay",$conn);
	
	//get all of the tables
	if($tables == '*')
	{
		$tables = array();
		$result = mysql_query('SHOW TABLES');
		while($row = mysql_fetch_row($result))
		{
			$tables[] = $row[0];
		}
	}
	else
	{
		$tables = is_array($tables) ? $tables : explode(',',$tables);
	}
	
	//cycle through
	//$tabless = array("admin");
	foreach($tables as $table)
	{
		$res = "select * from $table";
		$result = mysql_query($res);
		$num_fields = mysql_num_fields($result);
		
		//$return.= 'DROP TABLE '.$table.';';
		$row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
		$return.= "\n\n".$row2[1].";\n\n";
		
		for ($i = 0; $i < $num_fields; $i++) 
		{
			while($row = mysql_fetch_row($result))
			{
				$return.= 'INSERT INTO '.$table.' VALUES(';
				for($j=0; $j<$num_fields; $j++) 
				{
					$row[$j] = addslashes($row[$j]);
					$row[$j] = ereg_replace("\n","\\n",$row[$j]);
					if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
					if ($j<($num_fields-1)) { $return.= ','; }
				}
				$return.= ");\n";
			}//echo $return;exit;
		}
		$return.="\n\n\n";
	}
	
	//save file
	$handle = fopen('db-backup('.date('d-m-Y').').sql','w+');
	fwrite($handle,$return);
	fclose($handle);
	redirect('index/dashboard','refresh');
}

	function view_book_detail($id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		//echo "hello";

		$this->admin_model->update_visit($id);
		$data['api'] = $this->admin_model->getAPIs();
		$data['countries'] = $this->admin_model->getCountries();
		//$data['result_view']=$this->admin_model->view_trans_detail_id_new($id);
		
		$data['result_view']=$this->admin_model->book_detail_view_voucher1($id);
		//echo "<pre/>";print_r($data['result_view']);exit;
		$con_id = $data['result_view']->customer_contact_details_id;
		
		$data['contact_info']=$this->admin_model->contact_info_detail_update($con_id);
		$data['trans']=$this->admin_model->transation_detail_contact($id);
		$con_id_pass = $data['contact_info']->customer_info_details_id;
		$data['pass_info']=$this->admin_model->pass_info_detail($con_id_pass);
		
		$hotel_id = $data['result_view']->hotel_code;
		//$data['hotel_details']=$this->admin_model->gethb_hoteldet($hotel_id);
		//$data['hotel_image']= $this->admin_model->gethb_hotelimage_new($hotel_id);
		$data['hotel_decs']='';
		//echo "<pre/>";print_r($data);exit;
		$this->load->view('voucher',$data);
	}
	
	
	function invoice_print($book_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		$data['result_view']=$this->admin_model->book_detail_view_voucher1($book_id);
		$con_id = $data['result_view']->customer_contact_details_id;
		
		$data['contact_info']=$this->admin_model->contact_info_detail_update($con_id);
		$data['trans']=$this->admin_model->transation_detail_contact($book_id);
		
		$agent_id = $data['trans']->user_id;
		$data['agent_info'] = $this->admin_model->agentInfo($agent_id);
		
		//customer_info_details_id
		$con_id_pass = $data['contact_info']->customer_info_details_id;
		$data['pass_info']=$this->admin_model->pass_info_detail($con_id_pass);
		
		
		 $hotel_id = $data['result_view']->hotel_code;
		// $data['hotel_details']=$this->B2b_Model->gethb_hoteldet($hotel_id);
		
		 $data['hotel_decs']='';
		//echo "<pre/>";
		//print_r($data);exit;
		 $this->load->view('invoice',$data);
		 
	 }
	
	function send_reg_request($id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
			$result_view=$this->admin_model->book_detail_view_voucher1($id);
	 $con_id = $result_view->customer_contact_details_id;
	
	  $contact_info=$this->admin_model->contact_info_detail_update($con_id);
	  
	 
			$email = $contact_info->email;
			
		$Query="select * from  user  where email ='".$email."'";
	 
		 $query=$this->db->query($Query);
		
		if ($query->num_rows() > 0)
		{
			$a = $query->row();

			$usr_id_up =$a->user_id;
			$where = "transaction_details_id = '$id'";
			$dataaa = array('user_id' => $usr_id_up);
			$this->db->update('transaction_details', $dataaa, $where);
			
			$data['exist'] = "This EmailID Already Registered.";
				$this->load->view('registration_success',$data);
		}
		else
		{
	   $fname = $contact_info->first_name;
	   $username = $contact_info->first_name;
	   $mname =$contact_info->last_name;
	   $sname = '';
	   $email = $contact_info->email;
	   $pass = rand(1, 1000000); 
	   $country = $contact_info->country;
       $newsletter = '';
            
            $portal_id = '';
			
			$custid = $this->admin_model->add_customer($username,$fname,$mname,$sname,$email,$pass,$country,3,$newsletter,$portal_id);
			
				
				if(is_array($custid) == true)
				{
				  
				  //$newdata = array('userid'=> $custid,'username'=>$fname,'lastname'=>$sname,'email'=>$email,'logged_in' => TRUE);
				  //$this->session->set_userdata($newdata);
				  
				  $urlLocal = "";
				  
				 if($_SERVER['HTTP_HOST']=='localhost' || $_SERVER['HTTP_HOST']=='192.168.0.245')
				 {
				  $urlLocal = '<a href="'.WEB_URL.'home/login_page/'.$custid['code'].'/'.$custid['id'].'">'.WEB_URL.'home/login_page/'.$custid['code'].'/'.$custid['id'].'</a>';
				 } else {
				  $urlLocal = '<a href="'.WEB_URL.'home/login_page/'.$custid['code'].'/'.$custid['id'].'">'.WEB_URL.'home/login_page/'.$custid['code'].'/'.$custid['id'].'</a>';
				  }

		$config['protocol'] = 'smtp';
        $config['smtp_host'] = 'mail.provab.com';
        $config['smtp_port'] = 25;
        $config['smtp_user'] = 'christin@provab.com';
        $config['smtp_pass'] = 'provab123';
		$config['wordwrap'] = FALSE;
		$config['mailtype'] = 'html';
		$config['charset'] = 'utf-8';
		$config['crlf'] = "\r\n";
		$config['newline'] = "\r\n";
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
			$msg='<html>';
			$msg.='<body>';
			$msg.='<table width="100%" border="0" cellspacing="0" cellpadding="0">';
			$msg.='<tr><td>Dear  <b>'.ucfirst($fname).'</b>,</td></tr>';
			$msg.= '<tr><td>&nbsp;</td></tr>';
			$msg.='<tr><td>Greetings From TravelBay.com,</td></tr>';
			$msg.= '<tr><td>&nbsp;</td></tr>';
			$msg.='<tr><td>Many thanks for registering with us. Please click the below link to activate your account. <br> '.$urlLocal.' </td></tr>
			<tr><td> <b>Your  login details are given below</b> </td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td> Username : '.$email.' </td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td> Password : '.$pass.' </td></tr>
			<tr><td>&nbsp;</td></tr>';
			$msg.='
			<tr><td>&nbsp;</td></tr>
			<tr><td> Thanks & Regards,</td></tr>
			<tr><td><b> Team - TravelBay.com </b></td></tr>';
			$msg.='<tr><td>&nbsp;</td></tr>';
			$msg.='</table></body></html>';
			
			$from = 'bookings@TravelBay.com';
			$sub = 'User Registration - TravelBay.com ';
			$this->email->from($from,'TravelBay');
			$to = strip_tags($email);
			$this->email->to($to);
			$this->email->subject($sub);
			$this->email->message($msg);


				if($this->email->send())
				{
				
						//redirect('customer/login_page','refresh');
						$email = $this->admin_model->addEmail($to,$from,$sub,$msg,0,1);
						$data['resend'] = 'No';
						$data['emailId'] = $email;
						$data['exist'] ='Registration Successfully completed.';
						$this->load->view('registration_success',$data);
						//$this->template->load('template', 'login');
				
				}
				else
				{
					show_error($this->email->print_debugger());
				}
			}
			else
			{
				$data['exist'] = "This EmailID Already Registered.";
				
				$this->load->view('registration_success',$data);
			}
		}
		
		 
		//$this->load->view('voucher',$data);

	}
	
	
	function send_voucher($id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$data['id']=$id;
		$this->load->view('send_mail',$data);
	}


	function change_booking_status($id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$data['trans']=$this->admin_model->transation_details_forStatus($id);
		$data['id']=$id;
		$this->load->view('change_booking_status',$data);
	}

	function change_booking_status_action()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$bookingStatus = $this->input->post('bookingStatus');
		$id = $this->input->post('id');
		$with_admin_markup = $this->input->post('amount');$branch_id=0;
		$agentid = $this->input->post('agentid');
		if($bookingStatus == 'confirmed'){
		$amt=$this->admin_model->debitBookingAmount($agentid,$branch_id,$with_admin_markup);
		if($amt!=420){
			$this->admin_model->change_booking_status_action($bookingStatus, $id);
		}}
		redirect('index/change_booking_status/'.$id.'/'.$amt, 'refresh');  
	}
	
	function print_voucher($id)
	{
		
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$this->admin_model->update_visit($id);
		$data['api'] = $this->admin_model->getAPIs();
		$data['countries'] = $this->admin_model->getCountries();
		//$data['result_view']=$this->admin_model->view_trans_detail_id_new($id);
		
			$data['result_view']=$this->admin_model->book_detail_view_voucher1($id);
	 $con_id = $data['result_view']->customer_contact_details_id;
	
	  $data['contact_info']=$this->admin_model->contact_info_detail_update($con_id);
	  $data['trans']=$this->admin_model->transation_detail_contact($con_id);
	  $con_id_pass = $data['contact_info']->customer_info_details_id;
	 $data['pass_info']=$this->admin_model->pass_info_detail($con_id_pass);
	 
		
		 $hotel_id = $data['result_view']->hotel_code;
		// $data['hotel_details']=$this->admin_model->gethb_hoteldet($hotel_id);
//$data['hotel_image']= $this->admin_model->gethb_hotelimage_new($hotel_id);
		 $data['hotel_decs']='';
		 
		$this->load->view('voucher_only',$data);

	
	}
	function send_mail()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
	$id=$_POST['id'];
	$api = $this->admin_model->getAPIs();
	$countries = $this->admin_model->getCountries();
	$result_view=$this->admin_model->book_detail_view_voucher1($id);
	$con_id = $result_view->customer_contact_details_id;
	$contact_info=$this->admin_model->contact_info_detail_update($con_id);
	$trans=$this->admin_model->transation_detail_contact($con_id);
	$con_id_pass = $contact_info->customer_info_details_id;
	 $pass_info=$this->admin_model->pass_info_detail($con_id_pass);
	 
		$adult_co = explode("-",$result_view->adult);
			$adult_count = array_sum($adult_co);
			
			$child_co = explode("-",$result_view->child);
			$child_count = array_sum($child_co);
			
			
		 $hotel_id = $result_view->hotel_code;
		 //$hotel_details=$this->admin_model->gethb_hoteldet($hotel_id);
//$data['hotel_image']= $this->admin_model->gethb_hotelimage_new($hotel_id);
		 $data['hotel_decs']='';
	include('PHPMailer/class.phpmailer.php');
		
		$mail = new PHPMailer();
		//$mail->SMTPSecure = "ssl";
		$mail->Host='mail.provab.com';
		$mail->Port='25';
		$mail->Username   = 'christin@provab.com';
		$mail->Password   = 'provab123';
		$mail->SMTPKeepAlive = true;
		$mail->Mailer = "smtp";
		$mail->IsSMTP();
		$mail->IsHTML(true);
	//$pas_det = $_SESSION['passenger_det_info'];
	
	$msg='';
	$msg .= '<html><body>
<table width="100%" border="0" cellspacing="7" cellpadding="3" class="r-hoteldeta">
          <tr>
          	<td colspan="2">
            <span  style="font-size:15px; color:#069" ><strong>
            	Booking Details of Booking ID : '.$trans->prn_no.'
           </strong></span>
			</td>
          </tr>
          <tr>
          	<td colspan="2" ><span style="font-size:15px; color:#069">Booker Name : Mr.'.$contact_info->first_name.'</span><br /></td>
          </tr>
           <tr>
          	<td colspan="2" ><span style="font-size:15px; color:#069;">Booking Status : '.$trans->status.'</span><br /></td>
          </tr><tr>
          	<td width="350" align="left" valign="top"><table style="font-size:15px;"width="100%" border="0" cellspacing="5" cellpadding="5" class="sum-txt">
                  <tr>
                    <td colspan="2" class="mid-txt" style="color:#fff; background-color:#517BA5; font-size:15px; text-align:center">Traveller Details</td>
                  </tr>
                  <tr>
                    <td width="128">Guest Name</td>
                    <td width="270">: Mr '.$contact_info->first_name.'</td>
                  </tr>
                  <tr>
                    <td>No. of Adults</td>
                    <td>: '.$adult_count.' Adults</td>
                  </tr>
                  <tr>
                    <td>No. of Childern</td>
                    <td>: '.$child_count.' Childern</td>
                  </tr>
                  <tr>
                    <td>Voucher Date</td>
                    <td>: '.$trans->created_date.'</td>
                  </tr>
                  <tr>
                    <td>Supplier</td>
                    <td>: '.$result_view->api.'</td>
                  </tr>
                </table>
                </td>
            <td width="350" align="left" valign="top"><table  style="font-size:15px;" width="100%" border="0" cellspacing="5" cellpadding="5" class="sum-txt">
                  <tr>
                    <td colspan="2" class="mid-txt" style="color:#fff; font-size:15px; background-color:#517BA5;   text-align:center">Your Reservation
</td>
                  </tr>
                  <tr>
                    <td width="171">Check - in</td>
                    <td width="228">: '.$result_view->check_in.'</td>
                  </tr>
                  <tr>
                    <td>Check - out</td>
                    <td>: '.$result_view->check_out.'</td>
                  </tr>
                  <tr>
                    <td>Rooms</td>
                    <td>: '.$result_view->no_of_room.' Rooms</td>
                  </tr>
                   <tr>
                    <td>Nights</td>
                    <td>: '.$result_view->nights.' Nights</td>
                  </tr>
                   <tr>
                    <td>Supplier Confimation No</td>
                    <td>: '.$trans->booking_number.'</td>
                  </tr>
                </table>
                </td>
          </tr>
          <tr>
          	<td  width="350" align="left" colspan="2" valign="top">
            <table width="100%">
            <tr><td  style="color:#fff; height:28px;  background-color:#517BA5; font-size:15px; ">
              Hotel Details
                </td></tr></table></td>
          </tr>
          
          <tr>
          	<td  width="350" align="left" colspan="2" valign="top">
            <table align="left" width="100%" border="0" cellspacing="0" cellpadding="5" class="sum-txt" style=" font-size:15px; ">
      <tr>
         <td align="left">
         	<div style="width:878px; margin:0 auto;">
            
            	<div class="hotelfa-div" style="border:none">
            	
                <div style="width:907px; float:left">
                	<p class="mid-txt">Hotel Name : '. $result_view->hotel_name.' 
                            
                      <br />

                    <p>'.$result_view->description.'</p>
                </div>
            	</div>
                
                <div class="hotelfa-div" style="border:none">
            	<div style="width:150px; float:left;">Address  </div>
                <div style="width:505px; float:left" class="mid-txt">: '.$result_view->address.'</div>
            	</div>
                
                <div class="hotelfa-div" style="border:none">
            	<div style="width:150px; float:left;">City  </div>
                <div style="width:505px; float:left" class="mid-txt">:  '.$result_view->city.'	</div>
            	</div>
                
                <div class="hotelfa-div" style="border:none">
            	<div style="width:150px; float:left;">Phone  </div>
                <div style="width:550px; float:left" class="mid-txt">: '.$result_view->phone.'	</div>
            	</div>
                
                <div class="hotelfa-div" style="border:none">
            	<div style="width:150px; float:left;">Fax  </div>
                <div style="width:550px; float:left" class="mid-txt">: '.$result_view->fax.'	</div>
            	</div>
                
            </div>
         </td>
      </tr>
    </table></td>
          </tr>
          
          <tr>
          	<td  width="350" align="left" colspan="2" valign="top">
            <table width="100%">
            <tr><td  style="color:#fff; height:28px;  background-color:#517BA5; font-size:15px; ">
              Room Details
                </td></tr></table></td>
          </tr>
          
          <tr>
          	<td  width="350" align="left" colspan="2" valign="top">
            <table align="left" width="100%" border="0" cellspacing="0" cellpadding="5" class="sum-txt" style=" font-size:15px; ">
      <tr>
         <td align="left">
         	<div style="width:700px; margin:0 auto;">
            
            	<div class="hotelfa-div" style="border:none">
            	<div style="width:150px; float:left;">Room Type : </div>
                <div style="width:550px; float:left" class="mid-txt">'.$result_view->room_type.'</div>
                </div>
                
            </div>
         </td>
      </tr>
    </table></td>
          </tr>
          
         
          
        
          
          
             <tr>
          	<td  width="350" align="left" colspan="2" valign="top">
            <table width="100%">
            <tr><td  style="color:#fff; height:28px;  background-color:#517BA5; font-size:15px; ">
             Fare Summary
                </td></tr></table></td>
          </tr>
          
          <tr>
          	<td  width="350" align="left" colspan="2" valign="top">
            <table  align="left" width="100%" border="0" cellspacing="0" cellpadding="5" class="sum-txt" style="font-size:15px;">
      <tr>
         <td align="left">
         	<table style=" background-color: #EDEFED;
    border: 1px solid #9D9D9D;border: 1px solid #9D9D9D;" width="100%" border="0" cellspacing="0" cellpadding="7">
 
  
  
  <tr>
   
        <td align="left">Total Fare: '.$trans->amount.' USD</td>
  </tr>
</table>

         </td>
      </tr>
    </table></td>
          </tr>
          
            <tr>
          	<td  width="350" align="left" colspan="2" valign="top">
            <table width="100%">
            <tr><td  style="color:#fff; height:28px;  background-color:#517BA5; font-size:15px; ">
            Cancellation Policy
                </td></tr></table></td>
          </tr>
          
          <tr>
          	<td  width="350" align="left" colspan="2" valign="top">
            <table align="left" width="100%" border="0" cellspacing="0" cellpadding="5" class="sum-txt" style="font-size:15px;">
      <tr>
         <td align="left">
         <table style=" background-color: #EDEFED;
    border: 1px solid #9D9D9D;border: 1px solid #9D9D9D;" width="100%" border="0" cellspacing="0" cellpadding="7">
  <tr>
    <td style="border-bottom: 1px solid #9D9D9D;border-right: 1px solid #9D9D9D;">CheckIn Date</td>
    <td style="border-bottom: 1px solid #9D9D9D;border-right: 1px solid #9D9D9D;">Cancellation Till Date</td>
   	<td style="border-bottom: 1px solid #9D9D9D;border-right: 1px solid #9D9D9D;">Cancellation End Date</td>
    <td style="border-bottom: 1px solid #9D9D9D;border-right: 1px solid #9D9D9D;">Cancellation Charges</td>
    <td style="border-bottom: 1px solid #9D9D9D;border-right: 1px solid #9D9D9D;">Refund Charges</td>
   
    
  </tr>
  <tr>
    <td style="border-bottom: 1px solid #9D9D9D;border-right: 1px solid #9D9D9D;">'.$result_view->check_in.'</td>
    <td style="border-bottom: 1px solid #9D9D9D;border-right: 1px solid #9D9D9D;">'.$trans->cancellation_till_date.'</td>
    <td style="border-bottom: 1px solid #9D9D9D;border-right: 1px solid #9D9D9D;">'.$result_view->check_in.'</td>
     <td style="border-bottom: 1px solid #9D9D9D;border-right: 1px solid #9D9D9D;">'.$trans->cancellation_till_charge.' USD</td>
     <td style="border-bottom: 1px solid #9D9D9D;border-right: 1px solid #9D9D9D;">'.$trans->amount-$trans->cancellation_till_charge.' USD</td>
   
  </tr>
  <tr><td colspan="6">Description :</td>
  <tr>
    <td colspan="6">'.$result_view->cancel_policy.'</td>
     </tr>
</table>
         
         </td>
      </tr>
    </table></td>
          </tr>
         
          <tr>
          	<td  width="350" align="left" colspan="2" valign="top">
            <table width="100%">
            <tr><td  style="color:#fff; height:28px;  background-color:#517BA5; font-size:15px; ">
          Customer Details
                </td></tr></table></td>
          </tr>
          
          <tr>
          	<td  width="350" align="left" colspan="2" valign="top">
            <table align="left" width="100%" border="0" cellspacing="0" cellpadding="5" class="sum-txt" style="font-size:15px;">
      <tr>
         <td align="left">
         <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="13%">Email ID </td>
    <td width="1%">:</td>
    <td width="86%">'.$contact_info->email.'</td>
  </tr>
    <tr>
    <td>Address</td>
    <td>:</td>
    <td>'.$contact_info->address.'</td>
  </tr>
  <tr>
    <td>City</td>
    <td>:</td>
    <td>'.$contact_info->city.'</td>
  </tr>
  <tr>
    <td>Country</td>
    <td>:</td>
    <td>'.$contact_info->country.'</td>
  </tr>
  <tr>
    <td>Postal Code</td>
    <td>:</td>
    <td>'.$contact_info->mobile.'</td>
  </tr>
  <tr>
    <td>Phone Number</td>
    <td>:</td>
    <td>'.$contact_info->phone.'</td>
  </tr>
</table>

         </td>
      </tr>
    </table></td>
          </tr>
         
         
          <tr>
          	<td  width="350" align="left" colspan="2" valign="top">
            <table width="100%">
            <tr><td  style="color:#fff; height:28px;  background-color:#517BA5; font-size:15px; ">
          Passenger Details
                </td></tr></table></td>
          </tr>
          
          <tr>
          	<td  width="350" align="left" colspan="2" valign="top">
            <table align="left" width="100%" border="0" cellspacing="0" cellpadding="5" class="sum-txt" style="font-size:15px;">
      <tr>
         <td align="left">
         <div style="width:700px; margin:0 auto;">
           ';
					for($i=0;$i< count($pass_info);$i++)
					{
			
            $msg .='	<div class="hotelfa-div" style="border:none">
            	<div style="width:690px; float:left;">Mr. '.$pass_info[$i]->first_name.' '.$pass_info[$i]->last_name.'</div>
                </div>';
                 
					}
				
           $msg .=' </div>
         </td>
      </tr>
    </table></td>
          </tr>
         
         
         
        </table>
     
     
     
  </body></html>';
	$email_id =$_POST['mail'];
	//$email ='ruby.provab@gmail.com';
			$name='Hotel Booking Voucher - TravelBay.com';
		$mail->AddReplyTo('elizabeth@travel-bay.com',  'TravelBay');
		$mail->AddAddress($email_id, $name);
		//$mail->AddAttachment('test.pdf', 'Hotel Booking Voucher.pdf');
		$mail->SetFrom('elizabeth@travel-bay.com', 'TravelBay');
		$mail->Subject ='Hotel Booking Voucher - TravelBay.com';
		

		$mail->Body = $msg;										
		$mail->SMTPAuth   = true;                 // enable SMTP authentication
		$mail->CharSet = 'utf-8';
		$mail->SMTPDebug  = 0;
		$mail->Send();
		redirect('index/view_book_detail/'.$id,'refresh');
	}
	function booking_search($from='',$to='',$book_id='',$status='')
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		$condition = '';
		 if($from!='')
		 {
			  $this->db->where('hotel_booking_info.check_in  >=',$from);
			
		 }
		 if($to!='')
		 {
			 $this->db->where('hotel_booking_info.check_in  <=',$to);
			
		 }
		 if($book_id!='')
		 {
			  $this->db->where('transaction_details.booking_number',$book_id);
		 }
		  if($status!='')
		 {
			  $this->db->where('transaction_details.status',$status);
		 }
		   $this->db->select('*');
    	   $this->db->from('transaction_details');
		//   $this->db->where('transaction_details.user_id',$_SESSION['b2c_userid']);
		   $this->db->join('hotel_booking_info', 'transaction_details.hotel_booking_id = hotel_booking_info.hotel_booking_info_id');
	$this->db->join('customer_contact_details', 'transaction_details.customer_contact_details_id = customer_contact_details.customer_contact_details_id');
	
				$query=$this->db->get();
				//echo $this->db->last_query();exit;
				if($query->num_rows() ==''){
					$value ='';
					$value .= '<table width="920" border="0" align="left" cellpadding="0" cellspacing="0" style="margin:15px 0 0 15px; border:1px solid #ccc;">
  <tr>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Booking Number</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">From</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">To</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Rooms</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Adult</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Child</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Voucher Date</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Price</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_ex">Status</td>
  </tr>';
  $value .= '<td align="center" valign="top" colspan="9" class="my_profile_name_ex_tab_whit_ex">No Result Found... </td>';
   
 
$value .= '</table>';
			echo $value;
				}
				else
				{
					$result_view =  $query->result();
					$value ='';
					$value .= '<table width="920" border="0" align="left" cellpadding="0" cellspacing="0" style="margin:15px 0 0 15px; border:1px solid #ccc;">
  <tr>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Booking Number</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">From</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">To</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Rooms</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Adult</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Child</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Voucher Date</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Price</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_ex">Status</td>
  </tr>';
 
  if($result_view!='')
  {
  for($i=0;$i<count($result_view);$i++)
  {
 
  $value .= '<tr>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit">'.$result_view[$i]->booking_number.'</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit">'.$result_view[$i]->check_in.'</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit">'.$result_view[$i]->check_out.' 	</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit">'.$result_view[$i]->no_of_room.' </td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit">'.$result_view[$i]->adult.' </td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit">'.$result_view[$i]->child.' </td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit">'.$result_view[$i]->voucher_date.' </td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit">'.$result_view[$i]->amount.' </td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit_ex">Available </td>
  </tr>';

  }
  }
  else
  {
	$value .= '<td align="center" valign="top" colspan="9" class="my_profile_name_ex_tab_whit_ex">No Result Found... </td>';
   
  }
$value .= '</table>';
			echo $value;
				}
				
		
			
		
		
	}
	function view_booking($id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		 $data['result_view']=$this->admin_model->view_trans_detail_id($id);
		 $this->load->view('b2c_reports_id',$data);
	}
	function view_booking_sa($id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		 $data['result_view']=$this->admin_model->view_trans_detail_id($id);
		 $this->load->view('b2c_reports_id',$data);
	}
	function serch_filter()
	{ 
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
	 	
	$id=$_POST['id'];
	$status=$_POST['status'];
	$b_sd=$_POST['b_sd'];
	$b_ed=$_POST['b_ed'];
	$c_sd=$_POST['c_sd'];
	$c_ed=$_POST['c_ed'];
	$name=$_POST['name'];
	$country=$_POST['country'];
	$email=$_POST['email'];
	$ph=$_POST['ph'];
	$api_no=$_POST['api_no'];
	$api=$_POST['api'];
	
	$data['result_view'] = $this->admin_model->Advancedsearch_booking_view_update($id,$status,$b_sd,$b_ed,$c_sd,$c_ed,$name,$country,$email,$ph,$api,$api_no);	
		 $data['api'] = $this->admin_model->getAPIs();
		 $data['countries'] = $this->admin_model->getCountries();
		$query = '';
		$cc = count($_POST);
	 foreach($_POST as $key=>$val){
		 if($key!='x' || $key!='y'){
			if($val!=''){
				$query.=$key.'~'.$val.'/';
			}
		}
	 }
	 $data['URL']=$query;
	
		$this->load->view('b2b_reports',$data);
	}
	
	
	function userregistration_page()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$this->form_validation->set_rules('email', 'email', 'required');
		$this->form_validation->set_rules('passowrd', 'passowrd', 'required');
		/*$this->form_validation->set_rules('address', 'Address', 'required');
		
		$this->form_validation->set_rules('country', 'Country', 'required');
		$this->form_validation->set_rules('city', 'City', 'required');
		$this->form_validation->set_rules('postal_code', 'Zip Code', 'required');
		$this->form_validation->set_rules('office_phone', 'Office Phone', 'required');
		
		$this->form_validation->set_rules('mobile_no', 'Mobile', 'required');
		$this->form_validation->set_rules('currency', 'Currency', 'required');
		
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[agent.email_id]');
		$this->form_validation->set_rules('password', 'Password', 'required|matches[comform_password]');
		$this->form_validation->set_rules('comform_password', 'Confirm Password', 'required');
	*/
		//if($this->form_validation->run()==FALSE)
		//{
		/*	$data['exist'] = "";
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
		   
		   
			 $this->load->view('new_user',$data);*/
	//	}
		//else
	//	{
		//$this->form_validation->set_rules('fname', 'First Name', 'required');
		//$this->form_validation->set_rules('lname', 'Last Name', 'required');
		
		//$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		//$this->form_validation->set_rules('passowrd', 'Password', 'required|matches[cpass]');
		
			if($this->form_validation->run()==FALSE)
		{
 
				$data['exist']='';
			 	$this->load->view('new_user',$data);
			 
		}
		else
		{
			
			$email = $_POST['email'];
			$Query="select * from  user  where email ='".$email."'";
	 		$query=$this->db->query($Query);
			if ($query->num_rows() > 0)
			{
				$data['exist'] = "Your EmailID Already Registered.";
				$this->load->view('new_user',$data);
			}
		else
		{
	   $fname = $this->input->post('fname');
	   $username = $this->input->post('fname');
	   $mname = $this->input->post('lname');
	   $sname = '';
	   $email = $this->input->post('email');
	   $pass = $this->input->post('pass');
	   $country = '';
       $newsletter = '';
            
            $portal_id = '';
			
			$custid = $this->admin_model->add_customer($username,$fname,$mname,$sname,$email,$pass,$country,3,$newsletter,$portal_id);
			
				
				if(is_array($custid) == true)
				{
				  
				  //$newdata = array('userid'=> $custid,'username'=>$fname,'lastname'=>$sname,'email'=>$email,'logged_in' => TRUE);
				  //$this->session->set_userdata($newdata);
				  
				  $urlLocal = "";
				  
				 if($_SERVER['HTTP_HOST']=='localhost' || $_SERVER['HTTP_HOST']=='192.168.0.245')
				 {
				  $urlLocal = '<a href="'.WEB_URL.'home/login_page/'.$custid['code'].'/'.$custid['id'].'">'.WEB_URL.'home/login_page/'.$custid['code'].'/'.$custid['id'].'</a>';
				 } else {
				  $urlLocal = '<a href="'.WEB_URL.'home/login_page/'.$custid['code'].'/'.$custid['id'].'">'.WEB_URL.'home/login_page/'.$custid['code'].'/'.$custid['id'].'</a>';
				  }

		/*$config['protocol'] = 'smtp';
        $config['smtp_host'] = 'mail.provab.com';
        $config['smtp_port'] = 25;
        $config['smtp_user'] = 'christin@provab.com';
        $config['smtp_pass'] = 'provab123';
		$config['wordwrap'] = FALSE;
		$config['mailtype'] = 'html';
		$config['charset'] = 'utf-8';
		$config['crlf'] = "\r\n";
		$config['newline'] = "\r\n";
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
			$msg='<html>';
			$msg.='<body>';
			$msg.='<table width="100%" border="0" cellspacing="0" cellpadding="0">';
			$msg.='<tr><td>Dear  <b>'.ucfirst($fname).'</b>,</td></tr>';
			$msg.= '<tr><td>&nbsp;</td></tr>';
			$msg.='<tr><td>Greetings From TravelBay.com,</td></tr>';
			$msg.= '<tr><td>&nbsp;</td></tr>';
			$msg.='<tr><td>Many thanks for registering with us. Please click the below link to activate your account. <br> '.$urlLocal.' </td></tr>
			<tr><td> <b>Your  login details are given below</b> </td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td> Username : '.$email.' </td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td> Password : '.$pass.' </td></tr>
			<tr><td>&nbsp;</td></tr>';
			$msg.='
			<tr><td>&nbsp;</td></tr>
			<tr><td> Thanks & Regards,</td></tr>
			<tr><td><b> Team - TravelBay.com </b></td></tr>';
			$msg.='<tr><td>&nbsp;</td></tr>';
			$msg.='</table></body></html>';
			
			$from = 'ruby.provab@gmail.com';
			$sub = 'User Registration - TravelBay.com ';
			$this->email->from($from,'TravelBay');
			$to = strip_tags($email);
			$this->email->to($to);
			$this->email->subject($sub);
			$this->email->message($msg);*/
			//if($this->email->send())
			//	{
					//redirect('customer/login_page','refresh');
					//$email = $this->admin_model->addEmail($to,$from,$sub,$msg,0,1);
					//$data['resend'] = 'No';
					//$data['emailId'] = $email;
					redirect('index/user_list','refresh');
					//$this->template->load('template', 'login');
				//	$data['exist'] ='';
			//	}
				//else
			//	{
				//	show_error($this->email->print_debugger());
				//}
			}
			else
			{
				$data['exist'] = "Your EmailID Already Registered.";
				$this->load->view('new_user',$data);
			}
		}
		
		}
		
	}
	function sub_admin_registration_page()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$this->form_validation->set_rules('email', 'email', 'required');
		$this->form_validation->set_rules('password', 'passowrd', 'required');
		/*$this->form_validation->set_rules('address', 'Address', 'required');
		
		$this->form_validation->set_rules('country', 'Country', 'required');
		$this->form_validation->set_rules('city', 'City', 'required');
		$this->form_validation->set_rules('postal_code', 'Zip Code', 'required');
		$this->form_validation->set_rules('office_phone', 'Office Phone', 'required');
		
		$this->form_validation->set_rules('mobile_no', 'Mobile', 'required');
		$this->form_validation->set_rules('currency', 'Currency', 'required');
		
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[agent.email_id]');
		$this->form_validation->set_rules('password', 'Password', 'required|matches[comform_password]');
		$this->form_validation->set_rules('comform_password', 'Confirm Password', 'required');
	*/
		//if($this->form_validation->run()==FALSE)
		//{
		/*	$data['exist'] = "";
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
		   
		   
			 $this->load->view('new_user',$data);*/
	//	}
		//else
	//	{
		//$this->form_validation->set_rules('fname', 'First Name', 'required');
		//$this->form_validation->set_rules('lname', 'Last Name', 'required');
		
		//$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		//$this->form_validation->set_rules('passowrd', 'Password', 'required|matches[cpass]');
		
			if($this->form_validation->run()==FALSE)
		{
 
				$data['exist']='';
			 	$this->load->view('new_sub_admin',$data);
			 
		}
		else
		{
			
			$email = $_POST['email'];
			$Query="select * from  sub_admin  where email ='".$email."'";
	 		$query=$this->db->query($Query);
			if ($query->num_rows() > 0)
			{
				$data['exist'] = "Your EmailID Already Registered.";
				$this->load->view('new_sub_admin',$data);
			}
		else
		{
	   $fname = $this->input->post('fname');
	   $username = $this->input->post('fname');
	   $lname = $this->input->post('lname');
	   $mo_no = $this->input->post('mo_no');
	   $ph_no = $this->input->post('ph_no');
	   $address = $this->input->post('address');
	   $city = $this->input->post('city');
	   $country = $this->input->post('country');
	    $post_code = $this->input->post('post_code');
	   $userid = $this->input->post('userid');
	   $email = $this->input->post('email');
	   $pass = $this->input->post('password');
	   $type = $this->input->post('type');
	   if($this->input->post('limit'))
	   {
       $limit = $this->input->post('limit');
	   }
	   else
	   {
		   $limit = '';
	   }
          
			$custid = $this->admin_model->add_customer_sub_admin($fname,$username,$lname,$mo_no,$ph_no,$address,$city,$country,$post_code,$userid,$email,$pass,$type,$limit);
			
				
				if($custid == true)
				{
				  
				  //$newdata = array('userid'=> $custid,'username'=>$fname,'lastname'=>$sname,'email'=>$email,'logged_in' => TRUE);
				  //$this->session->set_userdata($newdata);
				  
				  $urlLocal = "";
				  
				 if($_SERVER['HTTP_HOST']=='localhost' || $_SERVER['HTTP_HOST']=='192.168.0.245')
				 {
				  $urlLocal = '<a href="'.WEB_URL.'home/login_page/'.$custid['code'].'/'.$custid['id'].'">'.WEB_URL.'home/login_page/'.$custid['code'].'/'.$custid['id'].'</a>';
				 } else {
				  $urlLocal = '<a href="'.WEB_URL.'home/login_page/'.$custid['code'].'/'.$custid['id'].'">'.WEB_URL.'home/login_page/'.$custid['code'].'/'.$custid['id'].'</a>';
				  }
		
						  
			$config['protocol'] = 'smtp';
				$config['smtp_host'] = 'mail.provab.com';
				$config['smtp_port'] = 25;
				$config['smtp_user'] = 'christin@provab.com';
				$config['smtp_pass'] = 'provab123';
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
    <td>Dear '.ucfirst($fname).',<br />
'.ucfirst($city).', '.ucfirst($country).'</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Greetings From TravelBay,</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><p>SubAdmin Registration.
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
          <td>Please do not hesitate to contact us on <font color="#00CC33">info@TravelBay.com</font> for all your Urgent Queries / Reservation or Requirements.</td>
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
                  <td><strong>TravelBay.com</strong></td>
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
				
				
				$from = 'bookings@TravelBay.com';
				$sub = 'SubAdmin Registration Acknowledgment - TravelBay.com ';
				$this->email->from($from,'Admin - TravelBay.com');
				$to = strip_tags($email);
				$this->email->to($to);
				$this->email->subject($sub);
				$this->email->message($msg);



				if($this->email->send())
				{
				
					//$data['emailId'] = $email;
					redirect('index/sub_admin_list','refresh');
				}
				else
				{
					show_error($this->email->print_debugger());
				}
		  
		/*$config['protocol'] = 'smtp';
        $config['smtp_host'] = 'mail.provab.com';
        $config['smtp_port'] = 25;
        $config['smtp_user'] = 'christin@provab.com';
        $config['smtp_pass'] = 'provab123';
		$config['wordwrap'] = FALSE;
		$config['mailtype'] = 'html';
		$config['charset'] = 'utf-8';
		$config['crlf'] = "\r\n";
		$config['newline'] = "\r\n";
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
			$msg='<html>';
			$msg.='<body>';
			$msg.='<table width="100%" border="0" cellspacing="0" cellpadding="0">';
			$msg.='<tr><td>Dear  <b>'.ucfirst($fname).'</b>,</td></tr>';
			$msg.= '<tr><td>&nbsp;</td></tr>';
			$msg.='<tr><td>Greetings From TravelBay.com,</td></tr>';
			$msg.= '<tr><td>&nbsp;</td></tr>';
			$msg.='<tr><td>Many thanks for registering with us. Please click the below link to activate your account. <br> '.$urlLocal.' </td></tr>
			<tr><td> <b>Your  login details are given below</b> </td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td> Username : '.$email.' </td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td> Password : '.$pass.' </td></tr>
			<tr><td>&nbsp;</td></tr>';
			$msg.='
			<tr><td>&nbsp;</td></tr>
			<tr><td> Thanks & Regards,</td></tr>
			<tr><td><b> Team - TravelBay.com </b></td></tr>';
			$msg.='<tr><td>&nbsp;</td></tr>';
			$msg.='</table></body></html>';
			
			$from = 'ruby.provab@gmail.com';
			$sub = 'User Registration - TravelBay.com ';
			$this->email->from($from,'TravelBay');
			$to = strip_tags($email);
			$this->email->to($to);
			$this->email->subject($sub);
			$this->email->message($msg);*/
			//if($this->email->send())
			//	{
					//redirect('customer/login_page','refresh');
					//$email = $this->admin_model->addEmail($to,$from,$sub,$msg,0,1);
					//$data['resend'] = 'No';
					//$data['emailId'] = $email;
					
					//$this->template->load('template', 'login');
				//	$data['exist'] ='';
			//	}
				//else
			//	{
				//	show_error($this->email->print_debugger());
				//}
			}
			else
			{
				$data['exist'] = "Your EmailID Already Registered.";
				$this->load->view('new_sub_admin',$data);
			}
		}
		
		}
		
	}
	
	function agent_list($status='')
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		$data['result'] = $this->admin_model->getAgents($status);
		$data['result_a'] = $this->admin_model->getAgents_active();
		$data['status_cnt'] = $this->admin_model->countAgentStatus();
		$data['status'] = $status;
		$this->load->view('agent_list',$data);	
	}
	function user_list($status='')
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$data['result'] = $this->admin_model->getusers($status);
		$data['result_a'] = $this->admin_model->getusers_a($status);
		$data['result_i'] = $this->admin_model->getusers_i($status);
		$data['status_cnt'] = $this->admin_model->countuserStatus();
		$data['status'] = $status;
		
		$this->load->view('user_list',$data);	
	}
	function sub_admin_list($status='')
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$data['result'] = $this->admin_model->getsub_admin($status);
		$data['result_a'] = $this->admin_model->getsub_admin_a($status);
		//$data['result_i'] = $this->admin_model->getusers_i($status);
		$data['status_cnt'] = $this->admin_model->countsub_adminStatus();
		$data['status'] = $status;
		
		$this->load->view('sub_admin_list',$data);	
	}
	function edit_user($id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$data['profile'] = $this->admin_model->getusers_edit1($id);
		$data['p_info'] = $this->admin_model->getusers_edit2($id);
		$data['id'] = $id;
		$this->load->view('user_list_edit',$data);
	}
	function edit_user_subadmin($id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$data['profile'] = $this->admin_model->getusers_edit1_subadmin($id);
		//$data['p_info'] = $this->admin_model->getusers_edit2($id);
		$data['id'] = $id;
		$this->load->view('user_list_edit_sa',$data);
	}
	function edit_agent($id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$data['profile'] = $this->admin_model->getagent_editsss1($id);
		//$data['p_info'] = $this->admin_model->getagent_edit2($id);
		$data['id'] = $id;
		//print_r($data['profile']);
		$this->load->view('agent_list_edit',$data);
	}
	function view_user($id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$data['profile'] = $this->admin_model->getusers_edit1($id);
		$data['p_info'] = $this->admin_model->getusers_edit2($id);
		$data['id'] = $id;
		$this->load->view('user_list_edit',$data);
	}
	function view_user_id($tid,$id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		if($id!=0)
		{
		$data['profile'] = $this->admin_model->getagent_editsss1($id);
		//$data['p_info'] = $this->admin_model->getusers_edit2($id);
		$data['id'] = $id;
		$this->load->view('user_list_view',$data);
		}
		else
		{
			$data['id']=$tid;
			$this->load->view('registration_req',$data);	
		}
	}
	
	function my_account_update($id)
	{
		/*echo '<pre/>';
		print_r($_POST);exit;*/
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$fname= $_POST['fname'];
		$lname= $_POST['lname'];
		$mo_no= $_POST['mo_no'];
		$ph_no= $_POST['ph_no'];
		$address= $_POST['address'];
		$city= $_POST['city'];
		$country= $_POST['country'];
		$post_code= $_POST['post_code'];
		$d_type= $_POST['d_type'];
		$d_nation= $_POST['d_nation'];
		$d_pass= $_POST['d_pass'];
		$d_country= $_POST['d_country'];
		if(isset($_POST['offer']))
		{
		$offer = 1;
		}
		else
		{
			$offer=0;
		}
		
		$this->db->query("UPDATE user SET first_name='$fname',	middle_name='$lname' WHERE user_id='$id'");
		
		$this->db->query("UPDATE user_profile SET mobile_no='$mo_no',alternative_no='$ph_no',address='$address',city='$city',country='$country',postal_code='$post_code',doc_type='$d_type',nationality='$d_nation',issuing_con='$d_country',passport='$d_pass',mild_card='$offer' WHERE user_id='$id'");
		
		redirect('index/user_list','refresh');
	}
	function my_account_update_agent($id)
	{
		/*echo '<pre/>';
		print_r($_POST);exit;*/
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$fname= $_POST['fname'];
		$lname= $_POST['lname'];
		$mo_no= $_POST['mo_no'];
		$ph_no= $_POST['ph_no'];
		$address= $_POST['address'];
		$city= $_POST['city'];
		$country= $_POST['country'];
		$post_code= $_POST['post_code'];
		$c_type= $_POST['d_type'];
		$a_type= $_POST['a_type'];
		$cc_id= $_POST['cc_id'];
		
	//	print_r( $_FILES);die();
		if(isset($_FILES['agent_edit_logo']['name']) && $_FILES['agent_edit_logo']['name'] != '')
		{
			$agent_logo  	= $_FILES['agent_edit_logo']['name']; 
			$target_path 	= $_SERVER['DOCUMENT_ROOT'] . '/agent_logos';
			$target_path 	= rtrim($target_path,'/').'/'.basename($_FILES['agent_edit_logo']['name']); 
			$move 		 	= move_uploaded_file($_FILES['agent_edit_logo']['tmp_name'], $target_path);
	   
			$this->db->query("UPDATE agent SET name='$fname',company_name='$lname',mobile='$mo_no',office_phone='$ph_no',address='$address',city='$city',country='$country',postal_code='$post_code',currency_type='$c_type',agent_mode='$a_type',call_center_id='$cc_id' , agent_logo='$agent_logo' WHERE agent_id='$id'");
		}
		else
		{
			$this->db->query("UPDATE agent SET name='$fname',company_name='$lname',mobile='$mo_no',office_phone='$ph_no',address='$address',city='$city',country='$country',postal_code='$post_code',currency_type='$c_type',agent_mode='$a_type',call_center_id='$cc_id' WHERE agent_id='$id'");
		}
		$this->db->where('agent_id',$id);	
		$this->db->delete('sub_admin_list');	
		
		$this->db->query("insert into sub_admin_list(cc_id,agent_id) values ('$cc_id','$id')");
		
		//$this->db->query("UPDATE user_profile SET mobile_no='$mo_no',alternative_no='$ph_no',address='$address',city='$city',country='$country',postal_code='$post_code',doc_type='$d_type',nationality='$d_nation',issuing_con='$d_country',passport='$d_pass',mild_card='$offer' WHERE user_id='$id'");
		
		redirect('index/edit_agent/'.$id,'refresh');
	}
	function my_account_update_agent_subadmin($id)
	{
		/*echo '<pre/>';
		print_r($_POST);exit;*/
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$fname= $_POST['fname'];
		$lname= $_POST['lname'];
		$mo_no= $_POST['mo_no'];
		$ph_no= $_POST['ph_no'];
		$address= $_POST['address'];
		$city= $_POST['city'];
		$country= $_POST['country'];
		$post_code= $_POST['post_code'];
		
		
		
		$this->db->query("UPDATE sub_admin SET first_name='$fname',middle_name='$lname',mobile='$mo_no',phone='$ph_no',address='$address',city='$city',country='$country',post_code='$post_code' WHERE user_id='$id'");
		
		//$this->db->query("UPDATE user_profile SET mobile_no='$mo_no',alternative_no='$ph_no',address='$address',city='$city',country='$country',postal_code='$post_code',doc_type='$d_type',nationality='$d_nation',issuing_con='$d_country',passport='$d_pass',mild_card='$offer' WHERE user_id='$id'");
		
		redirect('index/edit_user_subadmin/'.$id,'refresh');
	}
	function deposit_details($id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		
		
		$this->form_validation->set_rules('amount_credit', 'Amount Deposited', 'required');
		$this->form_validation->set_rules('deposited_date', 'Deate of Deposit', 'required');
		$this->form_validation->set_rules('deposit_type', 'Mode of Deposit', 'required');
		
		/*$this->form_validation->set_rules('deposited_bank', 'Bank', 'required');
		$this->form_validation->set_rules('deposited_branch', 'Branch', 'required');
		$this->form_validation->set_rules('deposited_city', 'Citi', 'required');
		
		 $deposit_type = $this->input->post('deposit_type');
		if ($deposit_type == 'etransfer') {
			$this->form_validation->set_rules('transaction_id', 'Transaction ID', 'required');
		} elseif ($deposit_type == 'cheque') {
			$this->form_validation->set_rules('cheque_date', 'Cheque Date', 'required');
			$this->form_validation->set_rules('cheque_number', 'Cheque Number', 'required');
		}*/
		
		$data['agent_id'] = $id;
		
		
		
		if($this->form_validation->run()==FALSE)
		{
			
			$data['agent_deposit_details'] = $this->admin_model->agent_deposit_details($id);
			$data['agent_details'] = $this->admin_model->agent_info($id);
			
			$this->load->view('agent_deposit_details',$data);	
		} else {
			
			$amount_credit = $this->input->post('amount_credit');
		   $tmp_deposited_date = $this->input->post('deposited_date');
		   $deposited_date_split = explode("/",$tmp_deposited_date);
		   $deposited_date = $deposited_date_split[2].'-'.$deposited_date_split[1].'-'.$deposited_date_split[0];

		    $deposit_type = $this->input->post('deposit_type');
			
		   $deposited_bank = $this->input->post('deposited_bank');
		   $deposited_branch = $this->input->post('deposited_branch');
		   $deposited_city = $this->input->post('deposited_city');
		   $remarks = $this->input->post('remarks');
		   
		   $transaction_id = $this->input->post('transaction_id');
		   
		   $tmp_cheque_date = $this->input->post('cheque_date');
		   $cheque_date = "";
		   if (!empty($tmp_cheque_date)) {
			   $cheque_date_split = explode("/",$tmp_cheque_date);
			   $cheque_date = $cheque_date_split[2].'-'.$cheque_date_split[1].'-'.$cheque_date_split[0];
		   }
		   
		   $cheque_number = $this->input->post('cheque_number');
		   
		   
			if ($this->admin_model->add_agent_deposit($agent_id, $amount_credit, $deposited_date, $deposit_type, $deposited_bank, $deposited_branch, $deposited_city, $remarks, $transaction_id, $cheque_date, $cheque_number))
			{
				//redirect('index/agent_deposit_details/'.$agent_id, 'refresh');   
				redirect('index/agent_list/active', 'refresh');
			}
			
		}
		
		
	}
	function delete_user($id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$this->admin_model->deleteusers($id);
		redirect('index/user_list','refresh');	
	}
		function delete_user_subadmin($id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$this->admin_model->deleteusers_sa($id);
		redirect('index/sub_admin_list','refresh');	
	}
	function delete_agent($id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$this->admin_model->deleteagent($id);
		redirect('index/agent_list','refresh');	
	}
	function update_user($id,$status)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
			$result_view=$this->admin_model->getusers_edit1($id);
// echo '<pre/>'; print_r($result_view);exit;
	 
			$email = $result_view->email;

  $fname = $result_view->first_name;
    $pass = $result_view->password;
	  include('PHPMailer/class.phpmailer.php');
		
		$mail = new PHPMailer();
		//$mail->SMTPSecure = "ssl";
		$mail->Host='mail.provab.com';
		$mail->Port='25';
		$mail->Username   = 'christin@provab.com';
		$mail->Password   = 'provab123';
		$mail->SMTPKeepAlive = true;
		$mail->Mailer = "smtp";
		$mail->IsSMTP();
		$mail->IsHTML(true);
	//$pas_det = $_SESSION['passenger_det_info'];
	
	$msg='';
	$msg .= '';
	$msg='<html>';
			$msg.='<body>';
			$msg.='<table width="100%" border="0" cellspacing="0" cellpadding="0">';
			$msg.='<tr><td>Dear  <b>'.ucfirst($fname).'</b>,</td></tr>';
			$msg.= '<tr><td>&nbsp;</td></tr>';
			$msg.='<tr><td>Greetings From TravelBay.com,</td></tr>';
			$msg.= '<tr><td>&nbsp;</td></tr>';
			if($status==1)
			{
			$msg.='<tr><td>Your Account Has Been Activated. Please click the below link to SignIn your account. <br> </td></tr>';
				$msg.='<tr><td> <b>Your  login details are given below</b> </td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td> Username : '.$email.' </td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td> Password : '.$pass.' </td></tr>
			<tr><td>&nbsp;</td></tr>';
			}
			else
			{
				$msg.='<tr><td>Your Account Has Been DeActivated. Please Contact Support Team. <br> </td></tr>';
			}
		
			$msg.='
			<tr><td>&nbsp;</td></tr>
			<tr><td> Thanks & Regards,</td></tr>
			<tr><td><b> Team - TravelBay.com </b></td></tr>';
			$msg.='<tr><td>&nbsp;</td></tr>';
			$msg.='</table></body></html>';
	$email_id =$email;
	//$email ='ruby.provab@gmail.com';
			
		$mail->AddReplyTo('bookings@TravelBay.com',  'TravelBay');
		
		//$mail->AddAttachment('test.pdf', 'Hotel Booking Voucher.pdf');
		$mail->SetFrom('bookings@TravelBay.com', 'TravelBay');
		if($status==1)
			{
					$mail->Subject ='B2C Activation - TravelBay.com';
					$name='B2C Activation - TravelBay.com';
			}
			else
			{
		$mail->Subject ='B2C DeActivation - TravelBay.com';
		$name='B2C DeActivation - TravelBay.com';
			}

		$mail->AddAddress($email_id, $name);

		$mail->Body = $msg;										
		$mail->SMTPAuth   = true;                 // enable SMTP authentication
		$mail->CharSet = 'utf-8';
		$mail->SMTPDebug  = 0;
		$mail->Send();
		$this->admin_model->update_user($id,$status);
		redirect('index/user_list','refresh');
	}
	function update_subadmin($id,$status)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
			$result_view=$this->admin_model->getusers_edit1_subadmin($id);
// echo '<pre/>'; print_r($result_view);exit;
	 
			$email = $result_view->email;
			$login_id = $result_view->login_id;

  $fname = $result_view->first_name;
    $pass = $result_view->password;
	 $limit = $result_view->limit;
	  include('PHPMailer/class.phpmailer.php');
		
		$mail = new PHPMailer();
		//$mail->SMTPSecure = "ssl";
		$mail->Host='mail.provab.com';
		$mail->Port='25';
		$mail->Username   = 'christin@provab.com';
		$mail->Password   = 'provab123';
		$mail->SMTPKeepAlive = true;
		$mail->Mailer = "smtp";
		$mail->IsSMTP();
		$mail->IsHTML(true);
	//$pas_det = $_SESSION['passenger_det_info'];
	
	$msg='';
	$msg .= '';
	$msg='<html>';
			$msg.='<body>';
			$msg.='<table width="100%" border="0" cellspacing="0" cellpadding="0">';
			$msg.='<tr><td>Dear  <b>'.ucfirst($fname).'</b>,</td></tr>';
			$msg.= '<tr><td>&nbsp;</td></tr>';
			$msg.='<tr><td>Greetings From TravelBay.com,</td></tr>';
			$msg.= '<tr><td>&nbsp;</td></tr>';
			if($status==1)
			{
			$msg.='<tr><td>Your Account Has Been Activated. Please click the below link to SignIn your account. <br> </td></tr>';
				$msg.='<tr><td> <b>Your  login details are given below</b> </td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td> SubAdmin Login : '.WEB_DIR_FRONT.'index.php/cc </td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td> Username : '.$login_id.' </td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td> Password : '.$pass.' </td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td> Daily Credit Limit : '.$limit.' USD</td></tr>
			<tr><td>&nbsp;</td></tr>';
			}
			else
			{
				$msg.='<tr><td>Your Account Has Been DeActivated. Please Contact Support Team. <br> </td></tr>';
			}
		
			$msg.='
			<tr><td>&nbsp;</td></tr>
			<tr><td> Thanks & Regards,</td></tr>
			<tr><td><b> Team - TravelBay.com </b></td></tr>';
			$msg.='<tr><td>&nbsp;</td></tr>';
			$msg.='</table></body></html>';
	$email_id =$email;
	//$email ='ruby.provab@gmail.com';
			
		$mail->AddReplyTo('bookings@TravelBay.com',  'TravelBay');
		
		//$mail->AddAttachment('test.pdf', 'Hotel Booking Voucher.pdf');
		$mail->SetFrom('bookings@TravelBay.com', 'TravelBay');
		if($status==1)
			{
					$mail->Subject ='SubAdmin Activation - TravelBay.com';
					$name='SubAdmin Activation - TravelBay.com';
			}
			else
			{
		$mail->Subject ='SubAdmin DeActivation - TravelBay.com';
		$name='SubAdmin DeActivation - TravelBay.com';
			}

		$mail->AddAddress($email_id, $name);

		$mail->Body = $msg;										
		$mail->SMTPAuth   = true;                 // enable SMTP authentication
		$mail->CharSet = 'utf-8';
		$mail->SMTPDebug  = 0;
		$mail->Send();
		$this->admin_model->update_user_subadmin($id,$status);
		redirect('index/sub_admin_list','refresh');
	}
	
	function update_agent($id,$status)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
			$result_view=$this->admin_model->getagent_edit1($id);
 //echo '<pre/>'; print_r($result_view);exit;
	 
		$email = $result_view->email_id;
		
		$fname = $result_view->name;
		$pass = $result_view->password;
		include('PHPMailer/class.phpmailer.php');
		
		$mail = new PHPMailer();
		//$mail->SMTPSecure = "ssl";
		$mail->Host='mail.provab.com';
		$mail->Port='25';
		$mail->Username   = 'christin@provab.com';
		$mail->Password   = 'provab123';
		$mail->SMTPKeepAlive = true;
		$mail->Mailer = "smtp";
		$mail->IsSMTP();
		$mail->IsHTML(true);
	//$pas_det = $_SESSION['passenger_det_info'];

			
	$msg='';
	$msg .= '';
	$msg='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body><table width="100%" border="0" cellspacing="6" cellpadding="6">
  <tr>
    <td>Dear '.$result_view->name.',<br />
'.$result_view->company_name.', '.$result_view->country.'</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Greetings From TravelBay,</td>
    <td>&nbsp;</td>
  </tr>';
  if($status == 1)
  {
	
  $msg.='<tr>
    <td><p>Many thanks for your Interest and Submitting Online Agent Registration using TravelBay.com.
   </p>
   
    <p> Your Account has been activated and will be reviewed for deposit by our team</p></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td> <p>Login Details : </p>
    <p>UserName : '.$result_view->email_id.'</p>
    <p>Password : '.$result_view->password.'</p>
    <p>If you want login, Please click here '.WEB_URL.'b2b/login</p></td>
    <td>&nbsp;</td>
  </tr>';
  }
  else
  {
	$msg.='<tr>
    <td>
	<p> Your Account has been deactivated. Please Contact To Admin </p>
	 <p>Login Details : </p>
    <p>UserName : '.$result_view->email_id.'</p>
   </td>
    <td>&nbsp;</td>
  </tr>';  
  }
  $msg.='<tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tbody>
        <tr>
          <td>Please do not hesitate to contact us on <strong>info@TravelBay.com</strong> for all your Urgent Queries / Reservation or Requirements.</td>
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
                  <td><strong>TravelBay.com</strong></td>
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
</html>
';
			
	$email_id =$email;
	//$email ='ruby.provab@gmail.com';
			
		$mail->AddReplyTo('bookings@TravelBay.com',  'Admin - TravelBay');
		
		//$mail->AddAttachment('test.pdf', 'Hotel Booking Voucher.pdf');
		$mail->SetFrom('bookings@TravelBay.com', 'Admin - TravelBay');
		if($status==1)
			{
					$mail->Subject ='B2B Activation - TravelBay.com';
					$name='B2B Activation - TravelBay.com';
			}
			else
			{
		$mail->Subject ='B2B DeActivation - TravelBay.com';
		$name='B2B DeActivation - TravelBay.com';
			}

		$mail->AddAddress($email_id, $name);

		$mail->Body = $msg;										
		$mail->SMTPAuth   = true;                 // enable SMTP authentication
		$mail->CharSet = 'utf-8';
		$mail->SMTPDebug  = 0;
		$mail->Send();
		$this->admin_model->update_agent($id,$status);
		redirect('index/agent_list','refresh');
	}
	function update_b2c_markup($id,$status)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$this->admin_model->update_b2c_markup($id,$status);
		redirect('index/markup_master','refresh');
	}
	function update_b2b_markup($id,$status)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$this->admin_model->update_b2b_markup($id,$status);
		redirect('index/markup_master_b2b','refresh');
	}
	
	function agent_change_status($agent_id,$status)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
	//	echo $agent_id . "," . $status; exit;
		
		if ($this->admin_model->agent_change_status($agent_id,$status)) {
			$result = 'success';
		} else {
			$result = 'fail';
		}
		echo json_encode($result);
	}
	
	function agent_delete($agent_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		if ($this->admin_model->agent_delete($agent_id)) {
			$result = 'success';
		} else {
			$result = 'fail';
		}
		echo json_encode($result);
	}
	
	function agent_details($agent_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		$this->form_validation->set_rules('currency', 'currency', 'required');
		$this->form_validation->set_rules('call_center', 'call_center', 'required');
		
		
			
		if($this->form_validation->run()==FALSE)
		{
			$data['agent_details'] = $this->admin_model->agent_details($agent_id);
			$data['currency'] = $this->admin_model->getCurrency();
			$data['callcenter'] = $this->admin_model->getCallCenter();
			
			$this->load->view('agent_details',$data);	
		} else {
			//echo 'saved'; exit;
			$currency = $this->input->post('currency');
		   $call_center = $this->input->post('call_center');
		   if ($this->admin_model->edit_agent($agent_id, $currency, $call_center)) {
				//redirect('index/agent_details/'.$agent_id, 'refresh');    
				redirect('index/agent_list/active', 'refresh'); 
				

		}
		   
		}
		
	}
	
	function agent_deposit_details($agent_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		$this->form_validation->set_rules('amount_credit', 'Amount Deposited', 'required');
		$this->form_validation->set_rules('deposited_date', 'Deate of Deposit', 'required');
		$this->form_validation->set_rules('deposit_type', 'Mode of Deposit', 'required');
		
		/*$this->form_validation->set_rules('deposited_bank', 'Bank', 'required');
		$this->form_validation->set_rules('deposited_branch', 'Branch', 'required');
		$this->form_validation->set_rules('deposited_city', 'Citi', 'required');
		
		 $deposit_type = $this->input->post('deposit_type');
		if ($deposit_type == 'etransfer') {
			$this->form_validation->set_rules('transaction_id', 'Transaction ID', 'required');
		} elseif ($deposit_type == 'cheque') {
			$this->form_validation->set_rules('cheque_date', 'Cheque Date', 'required');
			$this->form_validation->set_rules('cheque_number', 'Cheque Number', 'required');
		}*/
		
		$data['agent_id'] = $agent_id;
		
		
		
		if($this->form_validation->run()==FALSE)
		{
			
			$data['agent_deposit_details'] = $this->admin_model->agent_deposit_details($agent_id);
		$data['agent_details'] = $this->admin_model->agent_info($agent_id);
			
			$this->load->view('agent_deposit_details',$data);	
		} else {
			
			$amount_credit = $this->input->post('amount_credit');
		   $tmp_deposited_date = $this->input->post('deposited_date');
		   $deposited_date_split = explode("/",$tmp_deposited_date);
		   $deposited_date = $deposited_date_split[2].'-'.$deposited_date_split[1].'-'.$deposited_date_split[0];

		    $deposit_type = $this->input->post('deposit_type');
			
		   $deposited_bank = $this->input->post('deposited_bank');
		   $deposited_branch = $this->input->post('deposited_branch');
		   $deposited_city = $this->input->post('deposited_city');
		   $remarks = $this->input->post('remarks');
		   
		   $transaction_id = $this->input->post('transaction_id');
		   
		   $tmp_cheque_date = $this->input->post('cheque_date');
		   $cheque_date = "";
		   if (!empty($tmp_cheque_date)) {
			   $cheque_date_split = explode("/",$tmp_cheque_date);
			   $cheque_date = $cheque_date_split[2].'-'.$cheque_date_split[1].'-'.$cheque_date_split[0];
		   }
		   
		   $cheque_number = $this->input->post('cheque_number');
		   
		   
			if ($this->admin_model->add_agent_deposit($agent_id, $amount_credit, $deposited_date, $deposit_type, $deposited_bank, $deposited_branch, $deposited_city, $remarks, $transaction_id, $cheque_date, $cheque_number))
			{
				//redirect('index/agent_deposit_details/'.$agent_id, 'refresh');   
				redirect('index/agent_list/active', 'refresh');
			}
			
		}
		
	}
	
	function agent_markup($agent_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		

		
		$data['agent_id'] = $agent_id;
		
		//if($this->form_validation->run()==FALSE)
		//{
			$data['result'] = $this->admin_model->getAgentMarkups($agent_id);
			
			
			$this->load->view('agent_markup',$data);	
		//}
		
	}
	
	function left_banner_image()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		

		$data['left_banner'] = $this->admin_model->get_left_banner();
			
			$this->load->view('left_banner_timage',$data);	
	}
	
	
	function left_banner_bot_image()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$data['leftb_banner'] = $this->admin_model->get_left_banner_bot();
		$data['top_destinations'] = $this->admin_model->get_top_destinations();
		$data['hot_deals'] = $this->admin_model->get_hot_deals();
		$data['why_choose_us'] = $this->admin_model->get_why_choose_us();
		$this->load->view('left_banner_bimage',$data);	
	}
	
	function banner()
	{
		if (!$this->session->userdata('admin_logged_in'))
		{
			redirect('index/login','refresh');
		}
		$data['banner'] = $this->admin_model->get_banner();
		
		$this->load->view('banner_images',$data);
	}
	
	//----- Update Top Destinations -----
	function update_top_destination()
	{
		if (!$this->session->userdata('admin_logged_in'))
		{
			redirect('index/login','refresh');
		}
		$city1_name = $this->input->post('city1_name');
		$city1_value = $this->input->post('city1_value');
		$city2_name = $this->input->post('city2_name');
		$city2_value = $this->input->post('city2_value');
		$city3_name = $this->input->post('city3_name');
		$city3_value = $this->input->post('city3_value');
		$city4_name = $this->input->post('city4_name');
		$city4_value = $this->input->post('city4_value');
		$city5_name = $this->input->post('city5_name');
		$city5_value = $this->input->post('city5_value');	
		
		$upload=$this->admin_model->update_top_destination($city1_name,$city1_value,$city2_name,$city2_value,$city3_name,$city3_value,$city4_name,$city4_value,$city5_name,$city5_value);
		redirect('index/left_banner_bot_image','refresh');
	}
	
	//----- Update Hot Deals -----
	function update_hot_deals()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$hotel1_name = $this->input->post('hotel1_name');
		$hotel1_value = $this->input->post('hotel1_value');
		$hotel2_name = $this->input->post('hotel2_name');
		$hotel2_value = $this->input->post('hotel2_value');
		$hotel3_name = $this->input->post('hotel3_name');
		$hotel3_value = $this->input->post('hotel3_value');
		$hotel4_name = $this->input->post('hotel4_name');
		$hotel4_value = $this->input->post('hotel4_value');
		$hotel5_name = $this->input->post('hotel5_name');
		$hotel5_value = $this->input->post('hotel5_value');	
		
		$upload=$this->admin_model->update_hot_deals($hotel1_name,$hotel1_value,$hotel2_name,$hotel2_value,$hotel3_name,$hotel3_value,$hotel4_name,$hotel4_value,$hotel5_name,$hotel5_value);
		redirect('index/left_banner_bot_image','refresh');
	}
	
	function update_why_choose_us()
	{
		$why_choose_us_1 = $this->input->post('why_choose_us_1');
		$why_choose_us_2 = $this->input->post('why_choose_us_2');
		$why_choose_us_3 = $this->input->post('why_choose_us_3');
		$why_choose_us_4 = $this->input->post('why_choose_us_4');
		$why_choose_us_5 = $this->input->post('why_choose_us_5');
		
		
		$upload=$this->admin_model->update_why_choose_us($why_choose_us_1,$why_choose_us_2,$why_choose_us_3,$why_choose_us_4,$why_choose_us_5);
		redirect('index/left_banner_bot_image','refresh');
	}
	
	function add_left_banner_image()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		//echo'<pre/>';print_r($_POST);exit;
		if($_FILES["left_div1"]["name"]!='')
		{
			$image =$_FILES["left_div1"]["name"];
 			$uploadedfile = $_FILES['left_div1']['tmp_name'];
			 $left_div1 = 'banner_images/' . $_FILES["left_div1"]["name"];
			
			$filename = stripslashes($_FILES['left_div1']['name']);
			
			 	if($_FILES["left_div1"]["error"] > 0)
				{
					
					redirect('admin/banner_image','refresh');
				}
				else
				{
					
					if($_FILES["left_div1"]["type"]=="image/jpg" || $_FILES["left_div1"]["type"]=="image/jpeg" )
					{
						
						  $uploadedfile = $_FILES['left_div1']['tmp_name'];
						 $src = imagecreatefromjpeg($uploadedfile);
					
					}
					else if($_FILES["left_div1"]["type"]=="image/png")
					{
						
						$uploadedfile = $_FILES['left_div1']['tmp_name'];
						
						$src = imagecreatefrompng($uploadedfile);
						
					}
					else 
					{
						
						$src = imagecreatefromgif($uploadedfile);
					}
					
					//move_uploaded_file($_FILES['home_div1']['tmp_name'], $home_div);
					list($width,$height)=getimagesize($uploadedfile);
					$newwidth=725;
					//$newheight=($height/$width)*$newwidth;
					$newheight=400;
					$tmp=imagecreatetruecolor($newwidth,$newheight);
					
					imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
				   $path ='banner_images/';
				
				    $filename = $path. $_FILES['left_div1']['name'];
				
					imagejpeg($tmp,$filename,100);
					
					imagedestroy($src);
					imagedestroy($tmp);				
					}	
				}
		else
		{
			$left_div1=$this->input->post('s1');
		}
		
		//div2
		if($_FILES["left_div2"]["name"]!='')
		{ 
			$image =$_FILES["left_div2"]["name"];
 			$uploadedfile = $_FILES['left_div2']['tmp_name'];
			 $left_div2 = 'banner_images/' . $_FILES["left_div2"]["name"];
			
			$filename = stripslashes($_FILES['left_div2']['name']);
			
			 	if($_FILES["left_div2"]["error"] > 0)
				{
					
					redirect('admin/banner_image','refresh');
				}
				else
				{
					
					if($_FILES["left_div2"]["type"]=="image/jpg" || $_FILES["left_div2"]["type"]=="image/jpeg" )
					{
						
						  $uploadedfile = $_FILES['left_div2']['tmp_name'];
						 $src = imagecreatefromjpeg($uploadedfile);
					
					}
					else if($_FILES["left_div2"]["type"]=="image/png")
					{
						
						$uploadedfile = $_FILES['left_div2']['tmp_name'];
						
						$src = imagecreatefrompng($uploadedfile);
						
					}
					else 
					{
						
						$src = imagecreatefromgif($uploadedfile);
					}
					
					//move_uploaded_file($_FILES['home_div1']['tmp_name'], $home_div);
					list($width,$height)=getimagesize($uploadedfile);
					$newwidth=725;
					//$newheight=($height/$width)*$newwidth;
					$newheight=400;
					$tmp=imagecreatetruecolor($newwidth,$newheight);
					
					imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
				   $path = 'banner_images/';
				
				    $filename = $path. $_FILES['left_div2']['name'];
				
					imagejpeg($tmp,$filename,100);
					
					imagedestroy($src);
					imagedestroy($tmp);				
				 	}	
				}
		else
		{
			$left_div2=$this->input->post('s2');
		}
		
		//div3
		if($_FILES["left_div3"]["name"]!='')
		{
			$image =$_FILES["left_div3"]["name"];
 			$uploadedfile = $_FILES['left_div3']['tmp_name'];
			 $left_div3 = 'banner_images/' . $_FILES["left_div3"]["name"];
			
			$filename = stripslashes($_FILES['left_div3']['name']);
			
			 	if($_FILES["left_div3"]["error"] > 0)
				{
					
					redirect('admin/banner_image','refresh');
				}
				else
				{
					
					if($_FILES["left_div3"]["type"]=="image/jpg" || $_FILES["left_div3"]["type"]=="image/jpeg" )
					{
						
						  $uploadedfile = $_FILES['left_div3']['tmp_name'];
						 $src = imagecreatefromjpeg($uploadedfile);
					
					}
					else if($_FILES["left_div3"]["type"]=="image/png")
					{
						
						$uploadedfile = $_FILES['left_div3']['tmp_name'];
						
						$src = imagecreatefrompng($uploadedfile);
						
					}
					else 
					{
						
						$src = imagecreatefromgif($uploadedfile);
					}
					
					//move_uploaded_file($_FILES['home_div1']['tmp_name'], $home_div);
					list($width,$height)=getimagesize($uploadedfile);
					$newwidth=725;
					//$newheight=($height/$width)*$newwidth;
					$newheight=400;
					$tmp=imagecreatetruecolor($newwidth,$newheight);
					
					imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
				   $path = 'banner_images/';
				
				    $filename = $path. $_FILES['left_div3']['name'];
				
					imagejpeg($tmp,$filename,100);
					
					imagedestroy($src);
					imagedestroy($tmp);				
					}	
				}
		else
		{
			$left_div3=$this->input->post('s3');
		}
		if($_FILES["left_div4"]["name"]!='')
		{
			$image =$_FILES["left_div4"]["name"];
 			$uploadedfile = $_FILES['left_div4']['tmp_name'];
			 $left_div4 = 'banner_images/' . $_FILES["left_div4"]["name"];
			
			$filename = stripslashes($_FILES['left_div4']['name']);
			
			 	if($_FILES["left_div4"]["error"] > 0)
				{
					
					redirect('admin/banner_image','refresh');
				}
				else
				{
					
					if($_FILES["left_div4"]["type"]=="image/jpg" || $_FILES["left_div4"]["type"]=="image/jpeg" )
					{
						
						  $uploadedfile = $_FILES['left_div4']['tmp_name'];
						 $src = imagecreatefromjpeg($uploadedfile);
					
					}
					else if($_FILES["left_div4"]["type"]=="image/png")
					{
						
						$uploadedfile = $_FILES['left_div4']['tmp_name'];
						
						$src = imagecreatefrompng($uploadedfile);
						
					}
					else 
					{
						
						$src = imagecreatefromgif($uploadedfile);
					}
					
					//move_uploaded_file($_FILES['home_div1']['tmp_name'], $home_div);
					list($width,$height)=getimagesize($uploadedfile);
					$newwidth=725;
					//$newheight=($height/$width)*$newwidth;
					$newheight=400;
					$tmp=imagecreatetruecolor($newwidth,$newheight);
					
					imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
				   $path = 'banner_images/';
				
				    $filename = $path. $_FILES['left_div4']['name'];
				
					imagejpeg($tmp,$filename,100);
					
					imagedestroy($src);
					imagedestroy($tmp);				
					}	
				}
		else
		{
			$left_div4=$this->input->post('s4');
		}
		//div5
		if($_FILES["left_div5"]["name"]!='')
		{ 
			$image =$_FILES["left_div5"]["name"];
 			$uploadedfile = $_FILES['left_div5']['tmp_name'];
			 $left_div5 = 'banner_images/' . $_FILES["left_div5"]["name"];
			
			$filename = stripslashes($_FILES['left_div5']['name']);
			
			 	if($_FILES["left_div5"]["error"] > 0)
				{
					
					redirect('admin/banner_image','refresh');
				}
				else
				{
					
					if($_FILES["left_div5"]["type"]=="image/jpg" || $_FILES["left_div5"]["type"]=="image/jpeg" )
					{
						
						  $uploadedfile = $_FILES['left_div5']['tmp_name'];
						 $src = imagecreatefromjpeg($uploadedfile);
					
					}
					else if($_FILES["left_div5"]["type"]=="image/png")
					{
						
						$uploadedfile = $_FILES['left_div5']['tmp_name'];
						
						$src = imagecreatefrompng($uploadedfile);
						
					}
					else 
					{
						
						$src = imagecreatefromgif($uploadedfile);
					}
					
					//move_uploaded_file($_FILES['home_div1']['tmp_name'], $home_div);
					list($width,$height)=getimagesize($uploadedfile);
					$newwidth=725;
					//$newheight=($height/$width)*$newwidth;
					$newheight=400;
					$tmp=imagecreatetruecolor($newwidth,$newheight);
					
					imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
				   $path = 'banner_images/';
				
				    $filename = $path. $_FILES['left_div5']['name'];
				
					imagejpeg($tmp,$filename,100);
					
					imagedestroy($src);
					imagedestroy($tmp);				
				 	}	
				}
		else
		{
			$left_div5=$this->input->post('s5');
		}
		//div6
		if($_FILES["left_div6"]["name"]!='')
		{ 
			$image =$_FILES["left_div6"]["name"];
 			$uploadedfile = $_FILES['left_div6']['tmp_name'];
			 $left_div6 = 'banner_images/' . $_FILES["left_div6"]["name"];
			
			$filename = stripslashes($_FILES['left_div6']['name']);
			
			 	if($_FILES["left_div6"]["error"] > 0)
				{
					
					redirect('admin/banner_image','refresh');
				}
				else
				{
					
					if($_FILES["left_div6"]["type"]=="image/jpg" || $_FILES["left_div6"]["type"]=="image/jpeg" )
					{
						
						  $uploadedfile = $_FILES['left_div6']['tmp_name'];
						 $src = imagecreatefromjpeg($uploadedfile);
					
					}
					else if($_FILES["left_div6"]["type"]=="image/png")
					{
						
						$uploadedfile = $_FILES['left_div6']['tmp_name'];
						
						$src = imagecreatefrompng($uploadedfile);
						
					}
					else 
					{
						
						$src = imagecreatefromgif($uploadedfile);
					}
					
					//move_uploaded_file($_FILES['home_div1']['tmp_name'], $home_div);
					list($width,$height)=getimagesize($uploadedfile);
					$newwidth=725;
					//$newheight=($height/$width)*$newwidth;
					$newheight=400;
					$tmp=imagecreatetruecolor($newwidth,$newheight);
					
					imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
				   $path = 'banner_images/';
				
				    $filename = $path. $_FILES['left_div6']['name'];
				
					imagejpeg($tmp,$filename,100);
					
					imagedestroy($src);
					imagedestroy($tmp);				
				 	}	
				}
		else
		{
			$left_div6=$this->input->post('s6');
		}	
		//$this->Admin_Model->upload_content_image($c1,$c2,$c3,$c4,$p1,$p2,$p3,$p4);
		$upload=$this->admin_model->upload_left_image($left_div1,$left_div2,$left_div3,$left_div4,$left_div5,$left_div6);
		redirect('index/left_banner_image','refresh');
		
	
		}
		function add_left_banner_bimage()
		{
			
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		//echo'<pre/>';print_r($_POST);exit;
		/*if($_FILES["left_ban1"]["name"]!='')
		{
			$image =$_FILES["left_ban1"]["name"];
 			$uploadedfile = $_FILES['left_ban1']['tmp_name'];
			 $left_ban1 = 'banner_images/' . $_FILES["left_ban1"]["name"];
			
			$filename = stripslashes($_FILES['left_ban1']['name']);
			
			 	if($_FILES["left_ban1"]["error"] > 0)
				{
					
					redirect('admin/banner_image','refresh');
				}
				else
				{
					
					if($_FILES["left_ban1"]["type"]=="image/jpg" || $_FILES["left_ban1"]["type"]=="image/jpeg" )
					{
						
						  $uploadedfile = $_FILES['left_ban1']['tmp_name'];
						 $src = imagecreatefromjpeg($uploadedfile);
					
					}
					else if($_FILES["left_ban1"]["type"]=="image/png")
					{
						
						$uploadedfile = $_FILES['left_ban1']['tmp_name'];
						
						$src = imagecreatefrompng($uploadedfile);
						
					}
					else 
					{
						
						$src = imagecreatefromgif($uploadedfile);
					}
					
					//move_uploaded_file($_FILES['home_div1']['tmp_name'], $home_div);
					list($width,$height)=getimagesize($uploadedfile);
					$newwidth=281;
					//$newheight=($height/$width)*$newwidth;
					$newheight=127;
					$tmp=imagecreatetruecolor($newwidth,$newheight);
					
					imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
				   $path ='banner_images/';
				
				    $filename = $path. $_FILES['left_ban1']['name'];
				
					imagejpeg($tmp,$filename,100);
					
					imagedestroy($src);
					imagedestroy($tmp);				
					}	
				}
		else
		{
			$left_ban1=$this->input->post('s1');
		}*/
		$left_ban1 = 'banner_images/' . $_FILES["left_ban1"]["name"];
			move_uploaded_file($_FILES['left_ban1']['tmp_name'],$left_ban1);
			 
			
				//print_r($_FILES);
			//exit;
			$filename = stripslashes($_FILES['left_ban1']['name']);

			$p1=$this->input->post('p1');
			$c1=$this->input->post('c1');
			$p1 = addslashes($p1);
		$this->admin_model->upload_content_image($p1,$c1);
		$upload=$this->admin_model->upload_left_bot_image($left_ban1);
		redirect('index/left_banner_bot_image','refresh');
		
	
		
		}
	function edit_agent_markup($agent_id,$api_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		$this->form_validation->set_rules('commission', 'Commission', 'required');
		$this->form_validation->set_rules('markup', 'Markup', 'required');
		
		if($this->form_validation->run()==FALSE)
		{
			
			//if (!empty($agent_markup_id)) {
				$data['agent_id'] = $agent_id;
				$data['result'] = $this->admin_model->getAgentMarkupInfo($agent_id,$api_id);
			//}
			
			$this->load->view('edit_agent_markup',$data);	
		} else {
			$commission = $this->input->post('commission');
		   $markup = $this->input->post('markup');
		   $agent_id = $this->input->post('agent_id');
		   $api_id = $this->input->post('api_id');
		   if ($this->admin_model->edit_agent_markup($commission, $markup, $agent_id, $api_id)) {
				redirect('index/agent_markup/'.$agent_id, 'refresh');    
			}
			
		   
		}
		
	}
	
	function __agent_top_cities($agent_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
	
		$data['agent_id'] = $agent_id;
		
		//$this->form_validation->set_rules('commission', 'Commission', 'required');
		$this->form_validation->set_rules('top_cities', 'top_cities', 'required');
		
		if($this->form_validation->run()==FALSE)
		{
			$data['result'] = $this->admin_model->agent_top_cities($agent_id);
			$this->load->view('agent_top_cities',$data);	
		} else {
			$top_cities = $this->input->post('top_cities');
			//print_r($top_cities); exit;
			if ($this->admin_model->update_agent_top_cities($agent_id, $top_cities)) {
				redirect('index/agent_top_cities/'.$agent_id, 'refresh');    
			}
			
		}
			
			
		
		
	}
	//ccc
	function agent_top_cities($agent_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		$data['agent_id'] = $agent_id;
		
		//$this->form_validation->set_rules('commission', 'Commission', 'required');
		$this->form_validation->set_rules('country', 'country', 'required');
		$this->form_validation->set_rules('city', 'city', 'required');
		
		if($this->form_validation->run()==FALSE)
		{
			//$data['result'] = $this->admin_model->agent_top_cities($agent_id);
			$data['countries'] = $this->admin_model->getCountries();
			$data['top_city'] = $this->admin_model->getTopCities($agent_id);
			$this->load->view('agent_top_cities',$data);	
		} else {
			$top_cities = $this->input->post('city');
			//print_r($top_cities); exit;
			if ($this->admin_model->update_agent_top_cities($agent_id, $top_cities)) {
				redirect('index/agent_top_cities/'.$agent_id, 'refresh');    
			}
			
		}
			

	}
	
	function currency_converter()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		//$this->form_validation->set_rules('value', 'Value', 'required');
		
		
		//if($this->form_validation->run()==FALSE)
		//{
			$data['result'] = $this->admin_model->getCurrencyData();
			
			
			$this->load->view('currency_converter',$data);	
		//} else {
		//	echo 'save';exit;
		//}
		
	}
	function update_currency_converter($id,$status)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$this->admin_model->update_currency_converter($id,$status);
		redirect('index/currency_converter', 'refresh');    
	}
	function edit_currency_converter($cur_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		$this->form_validation->set_rules('value', 'value', 'required');
		
		
		if($this->form_validation->run()==FALSE)
		{
			$data['result'] = $this->admin_model->getCurrencyValue($cur_id);
			$this->load->view('edit_currency_converter',$data);	
		} else {
			$value = $this->input->post('value');
		  
		   if ($this->admin_model->edit_currency_converter($cur_id, $value)) {
				redirect('index/currency_converter', 'refresh');    
			}
			
		   
		}
		
	}
	
	function currency_delete($cur_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		if ($this->admin_model->currency_delete($cur_id)) {
			$result = 'success';
		} else {
			$result = 'fail';
		}
		echo json_encode($result);
	}
	
	function api_manage()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		//$this->form_validation->set_rules('value', 'Value', 'required');
		
		
		//if($this->form_validation->run()==FALSE)
		//{
			$data['result'] = $this->admin_model->getAPIs();
			
			
			$this->load->view('api_manage',$data);	
		//} else {
		//	echo 'save';exit;
		//}
		
	}
	
	function edit_api($api_id,$status)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		  
		   if ($this->admin_model->edit_api($api_id, $status)) {
				redirect('index/api_manage', 'refresh');    
			}
			
	
		
	}
	function payment_gateway()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		  
		$this->load->view('payment_charge');
	
		
	}
	function edit_payment_gateway()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		  $this->admin_model->edit_payment_gateway($_POST['charge']);
		  redirect('index/payment_gateway','refresh');
	}
	function search_booking()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		$booking_number=''; $agent=0; $api=0; $passenger_name=''; $datetype=''; $fdate=''; $todate=''; $sel_date_type=''; $booking_status='';
		
		if($this->input->post('booking_number')!='')
		{
			 $booking_number=$this->input->post('booking_number');
		}
		
		if($this->input->post('agent')!='')
		{
			 $agent=$this->input->post('agent');
			 //echo 'aa:' . $agent;
		}
		
		if($this->input->post('api') != '')
		{
			 $api=$this->input->post('api');
			 
		}
		
		
		if($this->input->post('passenger_name')!='')
		{
			 $passenger_name=$this->input->post('passenger_name');
		}
		
		if($this->input->post('booking_status')!='')
		{
			 $booking_status=$this->input->post('booking_status');
		}
		
		
		if($this->input->post('sel_date_type')!='')
		{
			  $sel_date_type=$this->input->post('sel_date_type');
		}
		
		if($this->input->post('fdate')!='')
		{
			 $fdate1=$this->input->post('fdate');
			 list($fday,$fmon,$fyear)=explode("/",$fdate1);
			 
			 $fdate=$fyear."-".$fmon."-".$fday;
			 $data['fdate'] = $fdate1;
		}
		
		if($this->input->post('tdate')!='')
		{
			 $tdate1=$this->input->post('tdate');
			 list($tday,$tmon,$tyear)=explode("/",$tdate1);
			 
			 $todate=$tyear."-".$tmon."-".$tday;
			  $data['tdate'] = $tdate1;
		}
		
		$booking_type = $this->input->post('booking_type');
		
		$data['result'] = $this->admin_model->search_booking_details($booking_number, $passenger_name, $booking_status, $sel_date_type, $fdate,$todate, $agent, $api); 
		
		$data['agent'] = $this->admin_model->getAllAgent();
		$data['api'] = $this->admin_model->getAPIs();
		
		$data['booking_number'] = $booking_number;
		$data['passenger_name'] = $passenger_name;
		$data['booking_status'] = $booking_status;
		$data['sel_date_type'] = $sel_date_type;
		$data['agent_id'] = $agent;
		$data['api_id'] = $api;
		//echo '<pre>';
		//print_r($data);
		//echo '</pre>';
		
	
		$this->load->view('search_booking',$data);
	}
	
	function deposit_request()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		//$this->form_validation->set_rules('value', 'Value', 'required');
		
		
		//if($this->form_validation->run()==FALSE)
		//{
			$data['result'] = $this->admin_model->getDepositRequest();
			
			
			$this->load->view('deposit_request',$data);	
		//} else {
		//	echo 'save';exit;
		//}
		
	}
	
	
	
	function edit_deposit_request($deposit_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		$this->form_validation->set_rules('status', 'Status', 'required');
		
		
		if($this->form_validation->run()==FALSE)
		{
			$data['result'] = $this->admin_model->getDepositRequestInfo($deposit_id);
			$this->load->view('edit_deposit_request',$data);	
		} else {
			$status = $this->input->post('status');
			$amount_deposited = $this->input->post('amount_deposited');
			$agent_id = $this->input->post('agent_id');
			
			
		  
		   if ($this->admin_model->editDepositRequest($deposit_id, $status, $amount_deposited, $agent_id)) {
			redirect('index/deposit_request', 'refresh');    
			}
			
			
			
		   
		}
		
	}
	
	
	
	
	
	function show_search_booking()
	{
		//$adminid=$this->session->userdata('adminid');	
		//$data['admin_info']=$this->Admin_Model->admin_last_login($adminid);
		
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$this->load->view('header');
		
		$this->load->view('search/search_booking');

	}
	
	function search_booking_view()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
 		$in=explode("/",$this->input->post('sd'));
		$cin=$in[2]."-".$in[1]."-".$in[0];	 
 		$out=explode("/",$this->input->post('ed'));
		$cout=$out[2]."-".$out[1]."-".$out[0];
		$type=$this->input->post('type');
		
		$this->load->model('admin_model');
			 $data['report'] = $this
					  ->admin_model
					  ->search_booking_view($cin,$cout);
	
		
		$config['base_url'] = base_url().'/admin/show_latest_booking/';
	
		
		
		$config['total_rows'] =count($data['report']);
		$config['per_page'] = '10';
		$config['full_tag_open'] = '<p>';
		$config['full_tag_close'] = '</p>';	
		//$this->pagination->initialize($config);				
				$perpage=10;	
		//$data['report']=$this->Admin_Model->search_booking_view($type,$cin,$cout);	

		
		$this->load->view('header');
		$this->load->view('search/search_booking_view',$data);
	 	//$this->load->view('admin/footer');	
	}
	
	function advanced_search_booking()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		$book_id='';$ref='';$pass_name='';$datetype='';$fdate='';$todate='';$sel_date_type='';
		if($this->input->post('book_id')!='')
		{
			 $book_id=$this->input->post('book_id');
		}
		
		/*if($this->input->post('agent_ref')!='')
		{
			 $ref=$this->input->post('agent_ref');
		}*/
		
		if($this->input->post('pass_name')!='')
		{
			 $pass_name=$this->input->post('pass_name');
		}
		
		if($this->input->post('book_type')!='')
		{
			 $book_type=$this->input->post('book_type');
		}
		
		if($this->input->post('sel_date_type')!='')
		{
			  $sel_date_type=$this->input->post('sel_date_type');
		}
		
		if($this->input->post('fdate')!='')
		{
			 $fdate1=$this->input->post('fdate');
			 list($fday,$fmon,$fyear)=explode("/",$fdate1);
			 
			 $fdate=$fyear."-".$fmon."-".$fday;
		}
		
		if($this->input->post('tdate')!='')
		{
			 $tdate1=$this->input->post('tdate');
			 list($tday,$tmon,$tyear)=explode("/",$tdate1);
			 
			 $todate=$tyear."-".$tmon."-".$tday;
		}
	
				
		// $data['report']=$this->Admin_Model->Advancedsearch_booking_view($book_id,$ref,$pass_name,$book_type,$sel_date_type,$fdate,$todate);
		
		$this->load->model('admin_model');
			 $data['report'] = $this
					  ->admin_model
					  ->Advancedsearch_booking_view($book_id, $pass_name, $book_type, $sel_date_type, $fdate,$todate);
					  
				$this->load->view('header');
				 $this->load->view('search/search_booking_view',$data);
				//$this->load->view('admin/footer');		
	
	}
	
	function markup_master()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		 	$data['agent'] = $this->admin_model->getAllAgent();
			$data['api'] = $this->admin_model->getAPIs();
			$data['countries'] = $this->admin_model->getCountries();
			$data['b2c_markup_g'] = $this->admin_model->get_b2c_markup();
				$data['b2c_markup_s'] = $this->admin_model->get_b2c_markups();
			$this->load->view('markup_master', $data);
		
		

	}
	function markup_master_b2b()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		 	$data['agent'] = $this->admin_model->getAllAgent_new();
			//$data['api'] = $this->admin_model->getAPIs();
			$data['countries'] = $this->admin_model->getCountries_new();
			
			$data['b2b_markup_g'] = $this->admin_model->get_b2b_markup();
			$data['b2b_markup_s'] = $this->admin_model->get_b2b_markups();
			$data['b2b_markup_hotel'] = $this->admin_model->get_b2b_markups_hotel();
			$data['hotel'] = $this->admin_model->get_hotel();
			
			$this->load->view('markup_master_b2b', $data);
		
		

	}
	function genuric_markup($markup='',$api='',$type='',$country1='')
	{
		$country =strtr(base64_decode($country1),array('+' => '.','=' => '-','/' => '~'));
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
			if($markup!='')
			{
			
			if($api=='all')
			{
				if($type=='generic')
				{
				$this->admin_model->delete_b2c_markup($type);
				}
				$api_a = $this->admin_model->getAPIs();
				
				for ($i = 0; $i < count($api_a); $i++) 
				{
					$check = $this->admin_model->add_b2c_markup_checking($country,  $api_a[$i]->api_name, $type);	
					if($check = '')
					{
						$this->admin_model->add_b2c_markup($country, $api_a[$i]->api_name, $markup,$type);					
					}
					else
					{
						$this->admin_model->delete_id_b2c_markup($country, $api_a[$i]->api_name, $type);	
						
						$this->admin_model->add_b2c_markup($country, $api_a[$i]->api_name, $markup,$type);					
					}
				}
			
					
				
				
			}
			else
			{
				$check = $this->admin_model->add_b2c_markup_checking($country, $api, $type);	
				if($check = '')
				{
				$this->admin_model->add_b2c_markup($country, $api, $markup,$type);					
				}
				else
				{
					$this->admin_model->delete_id_b2c_markup($country, $api, $type);	
					$this->admin_model->add_b2c_markup($country, $api, $markup,$type);	
				}
			}
			$b2c_markup_g = $this->admin_model->get_b2c_markup();
				$b2c_markup_s = $this->admin_model->get_b2c_markups();
			echo '<table align="left" width="100%" border="0" cellspacing="0" cellpadding="0" style="height:50px">

    <tr>
  	<td style="font-size:16px; text-align:left; padding-left:5px;">GENERIC (XML Based) Markup Table</td>
  </tr>
 </table> <table width="100%" border="0" cellspacing="1" cellpadding="0" style="background-color:#E8E5E5">

  <tr>
  	<td align="center" class="admin-table-colo">No</td>
    <td align="center" class="admin-table-colo">API</td>
    <td align="center" class="admin-table-colo">Country</td>
    <td align="center" class="admin-table-colo">Markup(%)</td>
	 <td align="center" class="admin-table-colo">Creation Date</td>
    <td align="center" class="admin-table-colo">Status</td>
    <td align="center" class="admin-table-colo">Action</td>
  </tr>';
  
  if($b2c_markup_g[0]!='')
  {
for($i=0;$i< count($b2c_markup_g);$i++)
{

  echo'<tr >
  	<td align="center" class="admin-table-colo1">'.($i+1).'</td>
    <td align="center" class="admin-table-colo1">'.$b2c_markup_g[$i]->api.'</td>
    <td align="center" class="admin-table-colo1">'.$b2c_markup_g[$i]->country.'</td>
    <td align="center" class="admin-table-colo1">'.$b2c_markup_g[$i]->markup.' %</td>
	<td align="center" class="admin-table-colo1">'.$b2c_markup_g[$i]->register_date.'</td>

    <td align="center" class="admin-table-colo1">';
	if($b2c_markup_g[$i]->status==1) { echo 'Active'; } else { echo 'InActive'; } 
	echo '</td>
    <td align="center" class="admin-table-colo1"><a href="'.WEB_URL.'index/update_b2c_markup/'.$b2c_markup_g[$i]->id.'/1">Active</a> / <a href="'.WEB_URL.'index/update_b2c_markup/'.$b2c_markup_g[$i]->id.'/0">InActive</a>/ <a href="'.WEB_URL.'index/update_b2c_markup/'.$b2c_markup_g[$i]->id.'/2">Delete</a></td>
  </tr>';
 
}
 }
  else
  {
echo '
<tr><td align="center"  class="admin-table-colo1" colspan="7">No Result Found...';

  }


echo '</table><table align="left" width="100%" border="0" cellspacing="0" cellpadding="0" style="height:50px; margin-top:15px">

    <tr>
  	<td style="font-size:16px; text-align:left; padding-left:5px;">Specific (Country Based) Markup Table</td>
  </tr>
 </table> 


<table width="100%" border="0" cellspacing="1" cellpadding="0" style="background-color:#E8E5E5">

  <tr>
  	<td align="center" class="admin-table-colo">No</td>
    <td align="center" class="admin-table-colo">API</td>
    <td align="center" class="admin-table-colo">Country</td>
    <td align="center" class="admin-table-colo">Markup(%)</td>
	 <td align="center" class="admin-table-colo">Creation Date</td>
    <td align="center" class="admin-table-colo">Status</td>
    <td align="center" class="admin-table-colo">Action</td>
  </tr>';
  
   
  if($b2c_markup_s[0]!='')
  {
for($j=0;$j<count($b2c_markup_s);$j++)
{

  echo'<tr >
  	<td align="center" class="admin-table-colo1">'.($j+1).'</td>
    <td align="center" class="admin-table-colo1">'.$b2c_markup_s[$j]->api.'</td>
    <td align="center" class="admin-table-colo1">'.$b2c_markup_s[$j]->country.'</td>
    <td align="center" class="admin-table-colo1">'.$b2c_markup_s[$j]->markup.' %</td>
	<td align="center" class="admin-table-colo1">'.$b2c_markup_s[$j]->register_date.'</td>

    <td align="center" class="admin-table-colo1">';
	if($b2c_markup_s[$j]->status==1) { echo 'Active'; } else { echo 'InActive'; } 
	echo '</td>
    <td align="center" class="admin-table-colo1"><a href="'.WEB_URL.'index/update_b2c_markup/'.$b2c_markup_s[$j]->id.'/1">Active</a> / <a href="'.WEB_URL.'index/update_b2c_markup/'.$b2c_markup_s[$j]->id.'/0">InActive</a>/ <a href="'.WEB_URL.'index/update_b2c_markup/'.$b2c_markup_s[$j]->id.'/2">Delete</a></td>
  </tr>';
 
}
 }
  else
  {
echo '
<tr><td align="center"  class="admin-table-colo1" colspan="7">No Result Found...';

  }

echo '</table>  
';
			}
			else
			{
				redirect('index/markup_master','refresh');
			}
			
	}
	function genuric_markup_b2b($markup='',$type='',$country1='', $agent='')
	{
		
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$country =strtr(base64_decode($country1),array('+' => '.','=' => '-','/' => '~'));
	
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
			if($markup!='')
			{
			//echo $type;exit;	
			if($type=='generic')
			{
				
			if($agent=='all' )
			{
				
				$type='generic';
			
				$this->admin_model->delete_b2b_markup($type);
				
				//$api_a = $this->admin_model->getAPIs();
				
				$agent_det = $this->admin_model->getAllAgent_new();
				for ($i = 0; $i < count($agent_det); $i++) 
				{
					
					$this->admin_model->add_b2b_markup('all', $agent_det[$i]->agent_id, $markup,$type);					
				
				}
			
				
				
			}
			
/*			elseif($agent=='all' )
			{
				$type='generic';
			
				$this->admin_model->delete_b2b_markup_new($type,$agent='',$api,$country='');
				
				$api_a = $this->admin_model->getAPIs();
				
				$agent_det = $this->admin_model->getAllAgent_new();
				for ($i = 0; $i < count($agent_det); $i++) 
				{
					
					$this->admin_model->add_b2b_markup('all', $agent_det[$i]->agent_id, $api, $markup,$type);					
					
				}
			
				
				
			}
			
			elseif($agent!='all' )
			{
				$type='generic';
	
				$this->admin_model->delete_b2b_markup_new($type,$agent,$api='',$country='');
				
				$api_a = $this->admin_model->getAPIs();
				
				$agent_det = $this->admin_model->getAllAgent_new();
				for ($i = 0; $i < count($api_a); $i++) 
				{
					
					$this->admin_model->add_b2b_markup('all', $agent, $api_a[$i]->api_name, $markup,$type);					
					
				}
			
				
				
			}
			*/
			elseif($agent!='all' )
			{
				$type='generic';
			
				$this->admin_model->delete_b2b_markup_new($type,$agent,$country='');
				
				//$api_a = $this->admin_model->getAPIs();
				
				$agent_det = $this->admin_model->getAllAgent_new();
				
					
					$this->admin_model->add_b2b_markup('all', $agent, $markup,$type);					
					
				
			
				
				
			}
			}
			
			
			elseif($type=='specific')
			{
				
			if($agent=='all' && $country =='all' )
			{
				$type='specific';
			
				$this->admin_model->delete_b2b_markup($type,$agent='',$country);
				
				//$api_a = $this->admin_model->getAPIs();
				
				$agent_det = $this->admin_model->getAllAgent_new();
				for ($i = 0; $i < count($agent_det); $i++) 
				{
					
					$this->admin_model->add_b2b_markup($country, $agent_det[$i]->agent_id, $markup,$type);					
					
				}
			
				
				
			}
			
		/*	elseif($api!='all'  &&  $agent=='all'  && $country =='all')
			{
				$type='specific';
			
				$this->admin_model->delete_b2b_markup_new($type,$agent='',$api,$country);
				
				$api_a = $this->admin_model->getAPIs();
				
				$agent_det = $this->admin_model->getAllAgent_new();
				for ($i = 0; $i < count($agent_det); $i++) 
				{
					
					$this->admin_model->add_b2b_markup($country, $agent_det[$i]->agent_id, $api, $markup,$type);					
					
				}
			
				
				
			}*/
			
			elseif($agent!='all' && $country =='all' )
			{
				$type='specific';
	
				$this->admin_model->delete_b2b_markup_new($type,$agent,$country);
				
				//$api_a = $this->admin_model->getAPIs();
				
				$agent_det = $this->admin_model->getAllAgent_new();
				
					$this->admin_model->add_b2b_markup($country, $agent, $markup,$type);					
				
				
			}
			
		/*	elseif($api!='all'  &&  $agent!='all' && $country =='all' )
			{
				$type='specific';
			
				$this->admin_model->delete_b2b_markup_new($type,$agent,$api,$country);
				
				$api_a = $this->admin_model->getAPIs();
				
				$agent_det = $this->admin_model->getAllAgent_new();
				
					
					$this->admin_model->add_b2b_markup($country, $agent, $api, $markup,$type);					
					
				
			
				
				
			}*/
			
			
			
			
			
			if($agent=='all' && $country !='all' )
			{
				//echo $country;exit;
				$type='specific';
			
				$this->admin_model->delete_b2b_markup_new($type,$agent='',$country);
				
				//$api_a = $this->admin_model->getAPIs();
				
				$agent_det = $this->admin_model->getAllAgent_new();
				for ($i = 0; $i < count($agent_det); $i++) 
				{
				
					$this->admin_model->add_b2b_markup($country, $agent_det[$i]->agent_id, $markup,$type);					
				
				}
			
				
				
			}
			
		/*	elseif($api!='all'  &&  $agent=='all'  && $country !='all')
			{
				$type='specific';
			
				$this->admin_model->delete_b2b_markup_new($type,$agent='',$api,$country);
				
				$api_a = $this->admin_model->getAPIs();
				
				$agent_det = $this->admin_model->getAllAgent_new();
				for ($i = 0; $i < count($agent_det); $i++) 
				{
					
					$this->admin_model->add_b2b_markup($country, $agent_det[$i]->agent_id, $api, $markup,$type);					
					
				}
			
				
				
			}*/
			
		/*	elseif($api=='all'  &&  $agent!='all' && $country !='all' )
			{
				$type='specific';
	
				$this->admin_model->delete_b2b_markup_new($type,$agent,$api='',$country);
				
				$api_a = $this->admin_model->getAPIs();
				
				$agent_det = $this->admin_model->getAllAgent_new();
				for ($i = 0; $i < count($api_a); $i++) 
				{
					
					$this->admin_model->add_b2b_markup($country, $agent, $api_a[$i]->api_name, $markup,$type);					
					
				}
			
				
				
			}*/
			
			elseif($agent!='all' && $country !='all' )
			{
				
			
				
				$type='specific';
			
				$this->admin_model->delete_b2b_markup_new($type,$agent,$country);
				
				//$api_a = $this->admin_model->getAPIs();
				
				$agent_det = $this->admin_model->getAllAgent_new();
				
					
					$this->admin_model->add_b2b_markup($country, $agent,$markup,$type);					
				
			}
			
			}
			
			
			if($type=='specific_hotel')
			{
		
				
				
				$hotel=$country;
		
			if($hotel=='all' )
			{
				
				
				
				$type='specific_hotel';
			
				$this->admin_model->delete_b2b_markup_hotel($type);
				
				//$api_a = $this->admin_model->getAPIs();
				
				$hotel_det = $this->admin_model->get_hotel();
				for ($i = 0; $i < count($hotel_det); $i++) 
				{
					
					
					$this->admin_model->add_b2b_markup_hotel('all', 'all', $markup,$type);					
				
				}
			
				
				
			}
			

			elseif($hotel!='all' )
			{
				
			
				$type='specific_hotel';
			//$hotel_det = $this->admin_model->get_hotel_id($hotel);
				$this->admin_model->delete_b2b_markup_new_hotel1($type,$hotel);
				
				//$api_a = $this->admin_model->getAPIs();
				
				
					$this->admin_model->add_b2b_markup_hotel('all', $hotel,$markup,$type);					
			
			}
			}
			
			
			
			
			
			
			
			
			$b2c_markup_g = $this->admin_model->get_b2b_markup();
			$b2c_markup_s = $this->admin_model->get_b2b_markups();
			$b2c_markup_hotel2 = $this->admin_model->get_b2b_markups_hotel2();
			
		
			echo '<table align="left" width="100%" border="0" cellspacing="0" cellpadding="0" style="height:50px">

    <tr>
  	<td style="font-size:16px; text-align:left; padding-left:5px;">GENERIC (XML Based) Markup Table</td>
  </tr>
 </table> <table width="100%" border="0" cellspacing="1" cellpadding="0" style="background-color:#E8E5E5">

  <tr>
  	<td align="center" class="admin-table-colo">No</td>
	<td align="center" class="admin-table-colo">Agent</td>

    <td align="center" class="admin-table-colo">Country</td>
    <td align="center" class="admin-table-colo">Markup(%)</td>
	 <td align="center" class="admin-table-colo">Creation Date</td>
    <td align="center" class="admin-table-colo">Status</td>
    <td align="center" class="admin-table-colo">Action</td>
  </tr>';
  
  if($b2c_markup_g[0]!='')
  {
for($i=0;$i< count($b2c_markup_g);$i++)
{

  echo'<tr >
  	<td align="center" class="admin-table-colo1">'.($i+1).'</td>
	<td align="center" class="admin-table-colo1">'.$this->admin_model->get_agetn_info_new($b2c_markup_g[$i]->agent_id).'</td>
    
    <td align="center" class="admin-table-colo1">'.$b2c_markup_g[$i]->country.'</td>
    <td align="center" class="admin-table-colo1">'.$b2c_markup_g[$i]->markup.' %</td>
	<td align="center" class="admin-table-colo1">'.$b2c_markup_g[$i]->register_date.'</td>

    <td align="center" class="admin-table-colo1">';
	if($b2c_markup_g[$i]->status==1) { echo 'Active'; } else { echo 'InActive'; } 
	echo '</td>
    <td align="center" class="admin-table-colo1"><a href="'.WEB_URL.'index/update_b2b_markup/'.$b2c_markup_g[$i]->id.'/1">Active</a> / <a href="'.WEB_URL.'index/update_b2b_markup/'.$b2c_markup_g[$i]->id.'/0">InActive</a>/ <a href="'.WEB_URL.'index/update_b2b_markup/'.$b2c_markup_g[$i]->id.'/2">Delete</a></td>
  </tr>';
 
}
 }
  else
  {
echo '
<tr><td align="center"  class="admin-table-colo1" colspan="7">No Result Found...</td></tr>';

  }


echo '</table>';

echo '<table align="left" width="100%" border="0" cellspacing="0" cellpadding="0" style="height:50px; margin-top:15px">

    <tr>
  	<td style="font-size:16px; text-align:left; padding-left:5px;">Specific (Country Based) Markup Table</td>
  </tr>
 </table> 


<table width="100%" border="0" cellspacing="1" cellpadding="0" style="background-color:#E8E5E5">

  <tr>
  	<td align="center" class="admin-table-colo">No</td>
	<td align="center" class="admin-table-colo">Agent</td>

    <td align="center" class="admin-table-colo">Country</td>
    <td align="center" class="admin-table-colo">Markup(%)</td>
	 <td align="center" class="admin-table-colo">Creation Date</td>
    <td align="center" class="admin-table-colo">Status</td>
    <td align="center" class="admin-table-colo">Action</td>
  </tr>';
  
   
  if($b2c_markup_s[0]!='')
  {
for($j=0;$j< count($b2c_markup_s);$j++)
{

  echo'<tr >
  	<td align="center" class="admin-table-colo1">'.($j+1).'</td>
	<td align="center" class="admin-table-colo1">'.$this->admin_model->get_agetn_info_new($b2c_markup_s[$j]->agent_id).'</td>
   

    <td align="center" class="admin-table-colo1">'.$b2c_markup_s[$j]->country.'</td>
    <td align="center" class="admin-table-colo1">'.$b2c_markup_s[$j]->markup.' %</td>
	<td align="center" class="admin-table-colo1">'.$b2c_markup_s[$j]->register_date.'</td>

    <td align="center" class="admin-table-colo1">';
	if($b2c_markup_s[$j]->status==1) { echo 'Active'; } else { echo 'InActive'; } 
	echo '</td>
    <td align="center" class="admin-table-colo1"><a href="'.WEB_URL.'index/update_b2b_markup/'.$b2c_markup_s[$j]->id.'/1">Active</a> / <a href="'.WEB_URL.'index/update_b2b_markup/'.$b2c_markup_s[$j]->id.'/0">InActive</a>/ <a href="'.WEB_URL.'index/update_b2b_markup/'.$b2c_markup_s[$j]->id.'/2">Delete</a></td>
  </tr>';
 
}
 }
  else
  {
echo '
<tr><td align="center"  class="admin-table-colo1" colspan="7">No Result Found...';

  }

echo '</table>  ';



echo '<table align="left" width="100%" border="0" cellspacing="0" cellpadding="0" style="height:50px">

    <tr>
  	<td style="font-size:16px; text-align:left; padding-left:5px;">GENERIC (Hotel Based) Markup Table</td>
  </tr>
 </table> <table width="100%" border="0" cellspacing="1" cellpadding="0" style="background-color:#E8E5E5">

  <tr>
  	<td align="center" class="admin-table-colo">No</td>
    <td align="center" class="admin-table-colo">Agent</td>

    <td align="center" class="admin-table-colo">Hotel</td>
    <td align="center" class="admin-table-colo">Markup(%)</td>
     <td align="center" class="admin-table-colo">Creation Date</td>
    <td align="center" class="admin-table-colo">Status</td>
    <td align="center" class="admin-table-colo">Action</td>
  </tr>
';
  
  if($b2c_markup_hotel2[0]!='')
  {
for($i=0;$i< count($b2c_markup_hotel2);$i++)
{

echo '
<tr >
  	<td align="center" class="admin-table-colo1">'.($i+1).'</td>
    <td align="center" class="admin-table-colo1">'.$b2c_markup_hotel2[$i]->agent_id.'</td>
    

    <td align="center" class="admin-table-colo1">'; 
	if ($b2c_markup_hotel2[$i]->hotel=="all") {
		echo $b2c_markup_hotel2[$i]->hotel;
	}
	else{ 
		$hotelname = $this->admin_model->get_agetn_info_new_hotel($b2c_markup_hotel2[$i]->hotel) ;
		echo $hotelname->hotel_name;
	} 
	echo '</td>
    <td align="center" class="admin-table-colo1"> '.$b2c_markup_hotel2[$i]->markup."%".' </td>
      <td align="center" class="admin-table-colo1"> '.$b2c_markup_hotel2[$i]->register_date.' </td>
    <td align="center" class="admin-table-colo1">';
	if($b2c_markup_hotel2[$i]->status==1) { 
		echo 'Active'; 
	} 
	else { 
		echo 'InActive'; 
	};
	echo '</td>
    <td align="center" class="admin-table-colo1"><a href="'.WEB_URL.'index/update_b2b_markup/'.$b2c_markup_hotel2[$i]->id.'/1">Active</a> / <a href="'.WEB_URL.'index/update_b2b_markup/'.$b2c_markup_hotel2[$i]->id.'/0">InActive</a>/ <a href="'.WEB_URL.'index/update_b2b_markup/'.$b2c_markup_hotel2[$i]->id.'/2">Delete</a></td>
  </tr>

';
 
}
 }
  else
  {
echo '
<tr><td align="center"  class="admin-table-colo1" colspan="7">No Result Found...</td></tr>';

  }


echo '</table>';

			}
			else
			{
				redirect('index/markup_master','refresh');
			}
			
	}
	function specific_markup_b2b($markup='',$api='',$type='',$country1='', $agent='')
	{
		$country =strtr(base64_decode($country1),array('+' => '.','=' => '-','/' => '~'));
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
			if($markup!='')
			{
			
			if($api=='all')
			{
				if($type=='generic')
				{
				$this->admin_model->delete_b2b_markup($type);
				}
				$api_a = $this->admin_model->getAPIs();
				
				for ($i = 0; $i < count($api_a); $i++) 
				{
					$check = $this->admin_model->add_b2b_markup_checking($country,  $api_a[$i]->api_name, $type);	
					if($check = '')
					{
						$this->admin_model->add_b2b_markup($country, $api_a[$i]->api_name, $markup,$type);					
					}
					else
					{
						$this->admin_model->delete_id_b2b_markup($country, $api_a[$i]->api_name, $type);	
						
						$this->admin_model->add_b2b_markup($country, $api_a[$i]->api_name, $markup,$type);					
					}
				}
			
					
				
				
			}
			else
			{
				$check = $this->admin_model->add_b2b_markup_checking($country, $api, $type);	
				if($check = '')
				{
				$this->admin_model->add_b2b_markup($country, $api, $markup,$type);					
				}
				else
				{
					$this->admin_model->delete_id_b2b_markup($country, $api, $type);	
					$this->admin_model->add_b2b_markup($country, $api, $markup,$type);	
				}
			}
			$b2c_markup_g = $this->admin_model->get_b2b_markup();
				//$b2c_markup_s = $this->admin_model->get_b2c_markups();
			echo '<table align="left" width="100%" border="0" cellspacing="0" cellpadding="0" style="height:50px">

    <tr>
  	<td style="font-size:16px; text-align:left; padding-left:5px;">GENERIC (XML Based) Markup Table</td>
  </tr>
 </table> <table width="100%" border="0" cellspacing="1" cellpadding="0" style="background-color:#E8E5E5">

  <tr>
  	<td align="center" class="admin-table-colo">No</td>

    <td align="center" class="admin-table-colo">Country</td>
    <td align="center" class="admin-table-colo">Markup(%)</td>
	 <td align="center" class="admin-table-colo">Creation Date</td>
    <td align="center" class="admin-table-colo">Status</td>
    <td align="center" class="admin-table-colo">Action</td>
  </tr>';
  
  if($b2c_markup_g[0]!='')
  {
for($i=0;$i< count($b2c_markup_g);$i++)
{

  echo'<tr >
  	<td align="center" class="admin-table-colo1">'.($i+1).'</td>

    <td align="center" class="admin-table-colo1">'.$b2c_markup_g[$i]->country.'</td>
    <td align="center" class="admin-table-colo1">'.$b2c_markup_g[$i]->markup.' %</td>
	<td align="center" class="admin-table-colo1">'.$b2c_markup_g[$i]->register_date.'</td>

    <td align="center" class="admin-table-colo1">';
	if($b2c_markup_g[$i]->status==1) { echo 'Active'; } else { echo 'InActive'; } 
	echo '</td>
    <td align="center" class="admin-table-colo1"><a href="'.WEB_URL.'index/update_b2c_markup/'.$b2c_markup_g[$i]->id.'/1">Active</a> / <a href="'.WEB_URL.'index/update_b2c_markup/'.$b2c_markup_g[$i]->id.'/0">InActive</a>/ <a href="'.WEB_URL.'index/update_b2c_markup/'.$b2c_markup_g[$i]->id.'/2">Delete</a></td>
  </tr>';
 
}
 }
  else
  {
echo '
<tr><td align="center"  class="admin-table-colo1" colspan="7">No Result Found...</td></tr>';

  }


echo '</table>';

			}
			else
			{
				redirect('index/markup_master','refresh');
			}
			
	}
	function fetch_cities() //$country=''
	{
		$country = $_POST['country'];
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
	//	echo $agent_id . "," . $status; exit;
		
		$result = $this->admin_model->getCities($country);

		echo json_encode($result);

	}
	
	function fetch_master_markup() 
	{
		
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		$city_id = $_POST['city_id'];
		$agent_id = $_POST['agent_id'];
		$api_id = $_POST['api_id'];
		
		$result = $this->admin_model->fetch_master_markup($city_id, $agent_id, $api_id);

		echo json_encode($result);

	}
	
	function delete_top_city($agent_id,$top_citi_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		if ($this->admin_model->delete_top_city($top_citi_id)) {
			redirect('index/agent_top_cities/'.$agent_id, 'refresh');  
		} 
		
	}
	
	function voucher_print($book_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
   
	   	$data['result_view']=$this->admin_model->book_detail_view_voucher1($book_id);
	 $con_id = $data['result_view']->customer_contact_details_id;
	
	  $data['contact_info']=$this->admin_model->contact_info_detail_update($con_id);
	  $data['trans']=$this->admin_model->transation_detail_contact($con_id);
	//$trans_id = $trans->transaction_details_id;
	//customer_info_details_id
	if ($data['trans']->user_type == 2 || $data['trans']->user_type == 3) {
		$agent_id = $data['trans']->user_id;
		$data['agent_info'] = $this->admin_model->agentInfo($agent_id);
	}
	
	 $con_id_pass = $data['contact_info']->customer_info_details_id;
	 $data['pass_info']=$this->admin_model->pass_info_detail($con_id_pass);
	 
		
		 $hotel_id = $data['result_view']->hotel_code;
		 //$data['hotel_details']=$this->admin_model->gethb_hoteldet($hotel_id);

		 $data['hotel_decs']='';
	//echo "<pre/>";
	//print_r($data);exit;
		 $this->load->view('voucher3',$data);
		 
	 }
	 
	 function download_report()
	{
		
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		$booking_number = $_REQUEST['booking_number'];
		$passenger_name = $_REQUEST['passenger_name'];
		$booking_status = $_REQUEST['booking_status'];
		$sel_date_type = $_REQUEST['sel_date_type'];
		$fdate = $_REQUEST['fdate'];
		$todate = $_REQUEST['todate'];
		
		$agent = $_REQUEST['agent'];
		$api = $_REQUEST['api'];
		
		
		if (!empty($fdate)) {
			 $fdate1=$fdate;
			 list($fday,$fmon,$fyear)=explode("/",$fdate1);
			 
			 $fdate=$fyear."-".$fmon."-".$fday;
		}
		
		if (!empty($tdate)) {
			$tdate1=$tdate;
			 list($tday,$tmon,$tyear)=explode("/",$tdate1);
			 
			 $todate=$tyear."-".$tmon."-".$tday;
		}
		
		
		$branch_id = $this->session->userdata('branch_id');

		
		$result = $this->admin_model->search_booking_details($booking_number, $passenger_name, $booking_status, $sel_date_type, $fdate,$todate, $agent, $api);
		$filename = 'report.csv';
		$csv_terminated = "\n";
		$csv_separator = ",";
		$csv_enclosed = '"';
		$csv_escaped = "\\";
		
		$schema_insert = "";
		$l = $csv_enclosed . 'Booking Number' . $csv_enclosed;
		$schema_insert .= $l;
		$schema_insert .= $csv_separator;
		
		$l = $csv_enclosed . 'Booking Date' . $csv_enclosed;
		$schema_insert .= $l;
		$schema_insert .= $csv_separator;
		

		$l = $csv_enclosed . 'Check-in' . $csv_enclosed;
		$schema_insert .= $l;
		$schema_insert .= $csv_separator;
		
		$l = $csv_enclosed . 'Check-out' . $csv_enclosed;
		$schema_insert .= $l;
		$schema_insert .= $csv_separator;
		
		$l = $csv_enclosed . 'Status' . $csv_enclosed;
		$schema_insert .= $l;
		$schema_insert .= $csv_separator;
		
		$l = $csv_enclosed . 'Cancel Till' . $csv_enclosed;
		$schema_insert .= $l;
		$schema_insert .= $csv_separator;
		

		$l = $csv_enclosed . 'Amount' . $csv_enclosed;
		$schema_insert .= $l;
		$schema_insert .= $csv_separator;
		
		$l = $csv_enclosed . 'Net Amount' . $csv_enclosed;
		$schema_insert .= $l;
		$schema_insert .= $csv_separator;
		
	
		$out = trim(substr($schema_insert, 0, -1));
		$out .= $csv_terminated;
		
		if (!empty($result)) {
			for ($i = 0; $i < count($result); $i++)
			{
			
			$schema_insert = '';
			
			$schema_insert .= $csv_enclosed .str_replace($csv_enclosed, $csv_escaped . $csv_enclosed, $result[$i]->booking_number) . $csv_enclosed;
			$schema_insert .= $csv_separator;

			$schema_insert .= $csv_enclosed .str_replace($csv_enclosed, $csv_escaped . $csv_enclosed, $result[$i]->created_date) . $csv_enclosed;
			$schema_insert .= $csv_separator;	
			
				$schema_insert .= $csv_enclosed .str_replace($csv_enclosed, $csv_escaped . $csv_enclosed, $result[$i]->check_in) . $csv_enclosed;
			$schema_insert .= $csv_separator;
			
				$schema_insert .= $csv_enclosed .str_replace($csv_enclosed, $csv_escaped . $csv_enclosed, $result[$i]->check_out) . $csv_enclosed;
			$schema_insert .= $csv_separator;
			
				$schema_insert .= $csv_enclosed .str_replace($csv_enclosed, $csv_escaped . $csv_enclosed, $result[$i]->status) . $csv_enclosed;
			$schema_insert .= $csv_separator;
			
				$schema_insert .= $csv_enclosed .str_replace($csv_enclosed, $csv_escaped . $csv_enclosed, $result[$i]->cancel_tilldate) . $csv_enclosed;
			$schema_insert .= $csv_separator;
			
			$schema_insert .= $csv_enclosed .str_replace($csv_enclosed, $csv_escaped . $csv_enclosed, $result[$i]->amount) . $csv_enclosed;
			$schema_insert .= $csv_separator;
			
				$schema_insert .= $csv_enclosed .str_replace($csv_enclosed, $csv_escaped . $csv_enclosed, $result[$i]->net_amount) . $csv_enclosed;
			$schema_insert .= $csv_separator;

			
			$out .= $schema_insert;
			$out .= $csv_terminated;
			} // end for
		} else {
			$schema_insert = $csv_enclosed . 'Result Not Found' . $csv_enclosed;
			
			
			$out .= $schema_insert;
			$out .= $csv_terminated;
		}
		
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Content-Length: " . strlen($out));
		// Output to browser with appropriate mime type, you choose ;)
		header("Content-type: text/x-csv");
		//header("Content-type: text/csv");
		//header("Content-type: application/csv");
		header("Content-Disposition: attachment; filename=$filename");
		echo $out;
		exit;
	}
	
	//----- Suppliers List -----/
	function suppliers_list($status='')
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		$data['result'] = $this->admin_model->getSuppliers($status);
		$data['result_a'] = $this->admin_model->getSuppliers_active();
		$data['status_cnt'] = $this->admin_model->countSupplierStatus();
		$data['status'] = $status;
		$this->load->view('suppliers_list',$data);	
	}
	
	//----- Update Suppliers Status -----/
	function update_supplier($id,$status)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
			$result_view=$this->admin_model->getsupplier_edit1($id);
 //echo '<pre/>'; print_r($result_view);exit;
	 
		$email = $result_view->email_id;
		
		$fname = $result_view->name;
		$pass = $result_view->password;
		include('PHPMailer/class.phpmailer.php');
		
		$mail = new PHPMailer();
		//$mail->SMTPSecure = "ssl";
		$mail->Host='mail.provabextranet.com';
		$mail->Port='25';
		$mail->Username   = 'provabex';
		$mail->Password   = 'GM-R{G#)ClFc';
		$mail->SMTPKeepAlive = true;
		$mail->Mailer = "smtp";
		$mail->IsSMTP();
		$mail->IsHTML(true);
	//$pas_det = $_SESSION['passenger_det_info'];

			
	$msg='';
	$msg .= '';
	$msg='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Supplier Activation - TravelBay.com</title>
</head>

<body><table width="100%" border="0" cellspacing="6" cellpadding="6">
  <tr>
    <td>Dear '.$result_view->name.',<br />
'.$result_view->company_name.', '.$result_view->country.'</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Greetings From TravelBay,</td>
    <td>&nbsp;</td>
  </tr>';
  if($status == 1)
  {
	
  $msg.='<tr>
    <td><p>Many thanks for your Interest and Submitting Online Supplier Registration using travelbay.com.
   </p>
   
    <p> Your Account has been activated and will be reviewed for deposit by our team</p></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td> <p>Login Details : </p>
    <p>UserName : '.$result_view->email_id.'</p>
    <p>Password : '.$result_view->password.'</p>
    <p>If you want login, Please click here '.WEB_DIR_FRONT.'supplier/index.php</p></td>
    <td>&nbsp;</td>
  </tr>';
  }
  else
  {
	$msg.='<tr>
    <td>
	<p> Your Account has been deactivated. Please Contact To Admin </p>
	 <p>Login Details : </p>
    <p>UserName : '.$result_view->email_id.'</p>
   </td>
    <td>&nbsp;</td>
  </tr>';  
  }
  $msg.='<tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tbody>
        <tr>
          <td>Please do not hesitate to contact us on <strong>info@travelbay.com</strong> for all your Urgent Queries / Reservation or Requirements.</td>
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
                  <td><strong>TravelBay.com</strong></td>
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
</html>
';
			
	$email_id =$email;
	//$email ='ruby.provab@gmail.com';
			
		$mail->AddReplyTo('bookings@travelbay.com',  'Admin - TravelBay');
		
		//$mail->AddAttachment('test.pdf', 'Hotel Booking Voucher.pdf');
		$mail->SetFrom('bookings@travelbay.com', 'Admin - TravelBay');
		if($status==1)
			{
					$mail->Subject ='Supplier Activation - TravelBay.com';
					$name='Supplier Activation - TravelBay.com';
			}
			else
			{
		$mail->Subject ='Supplier DeActivation - TravelBay.com';
		$name='Supplier DeActivation - TravelBay.com';
			}

		$mail->AddAddress($email_id, $name);

		$mail->Body = $msg;										
		$mail->SMTPAuth   = true;                 // enable SMTP authentication
		$mail->CharSet = 'utf-8';
		$mail->SMTPDebug  = 0;
		$mail->Send();
		$this->admin_model->update_supplier($id,$status);
		redirect('index/suppliers_list','refresh');
	}
	
	
	//----- Edit Suppliers -----/
	function edit_supplier($id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$data['profile'] = $this->admin_model->getsupplier_editsss1($id);
		$data['id'] = $id;
		
		$this->load->view('supplier_list_edit',$data);
	}
	
	//----- Update Suppliers Profile Detials -----/
	function my_account_update_supplier($id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$name= $_POST['name'];
		$company_name= $_POST['company_name'];
		$mobile= $_POST['mobile'];
		$office_phone= $_POST['office_phone'];
		$address= $_POST['address'];
		$city= $_POST['city'];
		$country= $_POST['country'];
		$post_code= $_POST['post_code'];
		$currency_type= $_POST['currency_type'];
		
		if(isset($_FILES['admin_hotel_logo']['name']) && $_FILES['admin_hotel_logo']['name'] != '')
		{
			$hotel_logo = $_FILES['admin_hotel_logo']['name'];
			$target_path = 	$_SERVER['DOCUMENT_ROOT'] . '/supplier_logos';
			$target_path = 	rtrim($target_path,'/').'/'.basename($_FILES['admin_hotel_logo']['name']); 
			
			if(move_uploaded_file($_FILES['admin_hotel_logo']['tmp_name'], $target_path)) {
			//echo "The file ".  basename( $_FILES['hotel_logo']['name']). " has been uploaded";
			} else{
			//echo "There was an error uploading the file, please try again!";
			}
			//exit;
			$this->db->query("UPDATE supplier SET name='$name',company_name='$company_name',mobile='$mobile',office_phone='$office_phone',address='$address',city='$city',country='$country',postal_code='$post_code',currency_type='$currency_type',hotel_logo='$hotel_logo' WHERE agent_id='$id'");
		}
		else
		{
			$this->db->query("UPDATE supplier SET name='$name',company_name='$company_name',mobile='$mobile',office_phone='$office_phone',address='$address',city='$city',country='$country',postal_code='$post_code',currency_type='$currency_type' WHERE agent_id='$id'");
		}
		
		redirect('index/edit_supplier/'.$id,'refresh');
	}
	
	//----- Delete Suppliers Profile Detials -----/
	function delete_supplier($id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$this->admin_model->deleteSupplier($id);
		redirect('index/suppliers_list','refresh');	
	}
	
	//----- Create New Supplier -----/
	function sup_registration_page()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('company_name', 'Company Name', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('country', 'Country', 'required');
		$this->form_validation->set_rules('city', 'City', 'required');
		$this->form_validation->set_rules('postal_code', 'Zip Code', 'required');
		$this->form_validation->set_rules('office_phone', 'Office Phone', 'required');
		$this->form_validation->set_rules('mobile_no', 'Mobile', 'required');
		$this->form_validation->set_rules('currency', 'Currency', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[agent.email_id]');
		$this->form_validation->set_rules('password', 'Password', 'required|matches[comform_password]');
		$this->form_validation->set_rules('comform_password', 'Confirm Password', 'required');
	
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
			
			$this->load->view('sup_registration_page',$data);
		}
		else
		{
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
		   
			$hotel_logo = $_FILES['admin_hotel_logo_reg']['name'];
			//print_r($hotel_logo);die();
			$target_path = 	$_SERVER['DOCUMENT_ROOT'] . '/supplier_logos';
			$target_path = 	rtrim($target_path,'/').'/'.basename($_FILES['admin_hotel_logo_reg']['name']); 
			
			if(move_uploaded_file($_FILES['admin_hotel_logo_reg']['tmp_name'], $target_path)) {
			//echo "The file ".  basename( $_FILES['hotel_logo']['name']). " has been uploaded";
			} else{
			//echo "There was an error uploading the file, please try again!";
			}
			
			if($this->admin_model->add_supplier($name, $company_name, $address, $country, $city, $postal_code, $office_phone, $mobile_no,$currency, $email, $password, $hotel_logo)) 			{
				$config['protocol'] = 'smtp';
				$config['smtp_host'] = 'mail.provab.com';
				$config['smtp_port'] = 25;
				$config['smtp_user'] = 'admin@TravelBay.com';
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
					redirect('/index/suppliers_list', 'refresh');
				}
				else
				{
					show_error($this->email->print_debugger());
				}
			}
			else
			{
				$data['exist'] = "Error data inserting.";
				$this->load->view('sup_registration_page',$data);
			}
		}
	}
	
	
	//----- View Supplier's Hotels -----/
	function view_hotels($id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		 $data['result_view']=$this->admin_model->view_hotels($id);
		 $data['id']=$id;
		 $this->load->view('view_hotels',$data);
	}
	
	//----- Supplier's Hotels Refresh -----/
	function hotel_refresh()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		 $data['result_view']=$this->admin_model->hotel_refresh();
		 $this->load->view('dashboard',$data);
	}
	
	//----- Update Supplier's Hotel Status -----/
	function update_hotel_status($sup_id,$id,$status)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$this->admin_model->update_hotel_status($id,$status);
		redirect('index/view_hotels/'.$sup_id,'refresh');
	}
	
	function update_banner_status($banner_id,$status)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$this->admin_model->update_banner_status($banner_id,$status);
		redirect('index/banner/','refresh');
	}
	
	
	public function edit_contact_inform($supplier_id,$property_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		//$supplier_id = $this->session->userdata('supplier_id');
		//$supplier_id =$supplier_id!='' ? $supplier_id :'1';
		$supplier_id=$this->uri->segment(3);
		$property_id=$this->uri->segment(4);
		$data['time_zone']=$this->Supplier_Model->fetch_time_zone();
		$data['currency']=$this->Supplier_Model->fetch_currency_val();
		$data['contact_inf']=$this->Supplier_Model->contact_inform_edit($supplier_id,$property_id);
		$data['prop_inf']=$this->Supplier_Model->contact_prop_edit($supplier_id, $property_id);
		$data['country_list']=$this->Supplier_Model->fetch_country();
		$data['language_list']=$this->Supplier_Model->fetch_language();
		$data['facility_iist']= $this->Supplier_Model->fetch_home_facility($property_id);
		$data['room_fac_list'] = $this->Supplier_Model->fetch_room_facility($property_id);
		$data['result']=$this->Supplier_Model->get_settings_val($property_id);
		
		$prop_id=$property_id;
		if(isset($prop_id) && $prop_id!= "")	
		{	
			$data['result1'] = $this->Supplier_Model->detail_location($prop_id);
			//echo $result1[0]->sup_detailedlocation_id;
			$this->load->view('profile/edit_contact_details',$data);
		}
		else
		{
			$this->load->view('profile/edit_contact_details');
		}
		
	}
	public function edit_property_info($supplier_id,$property_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$data['time_zone']=$this->Supplier_Model->fetch_time_zone();
		$data['currency']=$this->Supplier_Model->fetch_currency_val();
		$data['prop_inf']=$this->Supplier_Model->contact_prop_edit($supplier_id, $property_id);
		$this->load->view('profile/edit_property_info',$data);
	}
	
	public function insert_facility($supplier_id,$property_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$data['language_list']=$this->Supplier_Model->fetch_language();
		$data['facility_iist']= $this->Supplier_Model->fetch_home_facility($property_id);
		$data['room_fac_list'] = $this->Supplier_Model->fetch_room_facility($property_id);
		$this->load->view('profile/edit_facility',$data);
	}
	public function general_settings($supplier_id,$property_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$data['result']=$this->Supplier_Model->get_settings_val($property_id);
		$this->load->view('profile/general_settings',$data);
	}
	public function detail_location($supplier_id,$property_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$data['result1']=$this->Supplier_Model->detail_location($property_id);
		$this->load->view('profile/detail_location',$data);
	}
	public function accomodation_pictures($supplier_id,$property_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$data['result1']=$this->Supplier_Model->detail_location($property_id);
		$this->load->view('profile/accomodation_pictures',$data);
	}
	public function update_property_inform($supplier_id,$property_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		
			//$pro_class_type = $this->input->post('pro_class_type');
			$sup_type_apart = $this->input->post('sup_type_apart');
			$sup_type_hotel = $this->input->post('sup_type_hotel');
			//$supplier_id = $this->session->userdata('supplier_id');
			//$property_id=$id;
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
			redirect("index/edit_property_info/$supplier_id/$property_id",'refresh');
	}
	
	public function add_property_inform($supplier_id,$property_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		//$property_id = $this->uri->segment(3);
		//$this->form_validation->set_rules('pro_class_type', 'Supplier Type', 'required');
		$this->form_validation->set_rules('currency', 'Currency', 'required');
		$this->form_validation->set_rules('book_email', 'Booking Email', 'required');
		if($this->form_validation->run()==FALSE)
		{
			$data['exist'] = "";
			//$data['pro_class_type'] = $this->input->post('pro_class_type');
			$data['currency'] = $this->input->post('currency');
			$data['book_email'] = $this->input->post('book_email');
			$this->load->view('index/edit_contact_inform',$data);
		}
		else
		{
			//$supplier_id = $this->session->userdata('supplier_id');
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
			
			redirect('index/edit_property_info/$supplier_id/$property_id','refresh');
		}
			
	}
	
	function add_hotel_facility($supplier_id,$prop_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		//$supplier_id = $this->session->userdata('supplier_id');
		$data['facility_iist']= $this->Supplier_Model->add_hotel_facilitys($supplier_id);
		redirect("index/insert_facility/$supplier_id/$prop_id",'refresh');
	}
	
	function acc_room_facility($supplier_id,$prop_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		//$supplier_id = $this->session->userdata('supplier_id');
		$data['facility_iist']= $this->Supplier_Model->acc_room_facilitys($supplier_id);
		redirect("index/insert_facility/$supplier_id/$prop_id",'refresh');
	}
	public function add_general_set($sup_id,$sup_prop_id)
	{
		
		$check_in_time_from = $this->input->post('check_in_time_from');
		$check_in_time_to = $this->input->post('check_in_time_to');
		$check_out_time_from = $this->input->post('check_out_time_from');
		$check_out_time_to = $this->input->post('check_out_time_to');
		$guest_in_time = $this->input->post('guest_in_time');
		$guest_out_time = $this->input->post('guest_out_time');
		$key_col = $this->input->post('key_col');
		$key_descrip = $this->input->post('key_descrip');
		$tax = $this->input->post('tax');
		$service_charge = $this->input->post('service_charge');
		$group = $this->input->post('group');
		$this->Supplier_Model->add_setting_val($sup_prop_id, $check_in_time_from, $check_in_time_to,$check_out_time_from, $check_out_time_to, $guest_in_time, $guest_out_time, $key_col, $key_descrip, $tax, $service_charge);
		
		$data['result']=$this->Supplier_Model->get_settings_val($sup_prop_id);
		redirect("index/general_settings/$sup_prop_id",'refresh');
		//}
	}
	public function edit_general_set($sup_id,$sup_prop_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		//print '<pre />';print_r($_POST);exit;
		$check_in_time_from = $this->input->post('check_in_time_from');
		$check_in_time_to = $this->input->post('check_in_time_to');
		$check_out_time_from = $this->input->post('check_out_time_from');
		$check_out_time_to = $this->input->post('check_out_time_to');
		$guest_in_time = $this->input->post('guest_in_time');
		$guest_out_time = $this->input->post('guest_out_time');
		$key_col = $this->input->post('key_col');
		$key_descrip = $this->input->post('key_descrip');
		$tax = $this->input->post('tax');
		$service_charge = $this->input->post('service_charge');
		$this->Supplier_Model->add_setting_val($sup_prop_id, $check_in_time_from, $check_in_time_to,$check_out_time_from, $check_out_time_to, $guest_in_time, $guest_out_time, $key_col, $key_descrip, $tax, $service_charge);
		redirect("index/general_settings/$sup_id/$sup_prop_id",'refresh');
		//}
	}
	
	public function update_contact_inform($supid, $id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		//$supplier_id=$this->session->userdata('supplier_id');
		$supplier_id=$supid;
		$id=$id;
		//$sup_prop_id=$id;
		
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
		redirect("index/edit_contact_inform/$supplier_id/$id",'refresh');
	}
	
	public function add_data()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$this->form_validation->set_rules('pro_name', 'Hotel Name', 'required');
		
		if($this->form_validation->run()==FALSE)
		{
			$data['exist'] = "";
			$data['market_name'] = $this->input->post('market_name');
			$data['pro_name'] = $this->input->post('pro_name');
			$this->load->view('profile/add_hotel_ad',$data);
		}
		else
		{
			$supplier_id = $this->session->userdata('supplier_id');
			$sup_id=$this->input->post('sup_id');
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

			$rs_status=$this->Supplier_Model->add_contact_inf($sup_id, $city, $market_name, $pro_name, $main_first_name, $main_last_name, $main_email, $res_first_name, $res_last_name, $res_phone, $res_fax, $res_email, $mark_first_name, $mark_last_name, $mark_phone, $mark_fax, $mark_email, $acc_first_name, $acc_last_name, $acc_phone,$acc_fax,$acc_email); 
			
			redirect('index/view_hotels/'.$sup_id,'refresh');
		}
	}
	
	function set_detail_location($sup_id,$prop_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		
		/*$this->form_validation->set_rules('detail_location', 'Location', 'required');
		$this->form_validation->set_rules('nearby_airport', 'Near By Airport', 'required');
		/*$this->form_validation->set_rules('nearby_transport', 'Near By Transport', 'required');
		$this->form_validation->set_rules('nearby_placeinterest', 'Near By Placeinterest', 'required');
		if($this->form_validation->run()==FALSE)
		{
			$data['exist'] = "";
			$data['detail_location'] = $this->input->post('detail_location');
			$data['nearby_airport'] = $this->input->post('nearby_airport');
			/*$data['nearby_transport'] = $this->input->post('nearby_transport');
			$data['nearby_placeinterest'] = $this->input->post('nearby_placeinterest');
		   
			$this->load->view('profile/set_detail_location',$data);
		}
		else
		{*/
			$location = $this->input->post('detail_location');
			$nearby_airport = $this->input->post('nearby_airport');
			$nearby_transport = $this->input->post('nearby_transport');
			$nearby_placeinterest = $this->input->post('nearby_placeinterest');
			
			$this->Supplier_Model->set_detail_location($prop_id, $location, $nearby_airport, $nearby_transport, $nearby_placeinterest);
			redirect('index/detail_location/'.$sup_id.'/'.$prop_id,'refresh');
		//}
	}
	
	function set_acco_fecilities($supplier_id,$prop_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		$data['facility_iist']= $this->Supplier_Model->set_acco_fecilities($prop_id);
		redirect("index/insert_facility/$supplier_id/$prop_id",'refresh');
	}
	
		//----- Get Supplier's Category List -----/
	function inventory_category_list()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$supplier_id=$this->uri->segment(3);
		$id=$this->uri->segment(4);
		//$supplier_id = $this->session->userdata('supplier_id'); 
		$data['result'] = $this->Supplier_Model->inventory_category_list($supplier_id,$id);
		$this->load->view('inventory/inventory_view',$data);
	
	}
	
	//----- Add New Supplier's Category Type -----/
	function add_cate_type()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$supplier_id=$this->uri->segment(3);
		$id=$this->uri->segment(4);
		$this->form_validation->set_rules('cate_type', 'Cate Type', 'required');
		if($this->form_validation->run()==FALSE)
		{
			$data['exist'] = "";
			$data['cate_type'] = $this->input->post('cate_type');
			$this->load->view('inventory/add_cate_type',$data);
		}
		else
		{
			//$supplier_id = $this->session->userdata('supplier_id'); 
			$cate_type = $this->input->post('cate_type');
			$room_type = $this->input->post('room_type');
			$max_person = $this->input->post('max_person');
			$adults = $this->input->post('adults');
			$childs = $this->input->post('childs');
			$infants = $this->input->post('infants');
			$extra_bed = $this->input->post('extra_bed');
			$prop_id = $id;
			
			$this->Supplier_Model->add_cate_type($supplier_id, $prop_id, $cate_type, $room_type, $max_person, $adults, $childs, $infants, $extra_bed);
			redirect('index/inventory_category_list/'.$supplier_id.'/'.$id,'refresh');
		}
	}
	
	//----- Get Supplier's Category Details -----/
	function view_cate_details($sup_id,$prop_id, $id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$data['cat_details'] = $this->Supplier_Model->view_cate_details($id);
		$data['prop_id'] = $prop_id;
		$data['id'] = $id;
		$this->load->view('inventory/edit_cate_type',$data);
	}
	
	//----- Edit Supplier's Category Type -----/
	function edit_cate_type($sup_id,$prop_id, $cat_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
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
			
			$this->Supplier_Model->edit_cate_type($cat_id, $prop_id, $cate_type, $room_type, $max_person, $adults, $childs, $infants, $extra_bed);
			redirect('index/view_cate_details/'.$sup_id.'/'.$prop_id.'/'.$cat_id,'refresh');
		}
	}
	
	//----- Get Supplier's Rate Tactics List -----/
	function rate_tactics_list()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		 $supplier_id=$this->uri->segment(3); 
		 $prop_id=$this->uri->segment(4);
		//$supplier_id = $this->session->userdata('supplier_id'); 
		//$data['result'] = $this->Supplier_Model->rate_tactics_list($supplier_id,$prop_id);
		$cate_list = $this->Supplier_Model->cate_types_rate_tactics($supplier_id,$prop_id);
		//print'<pre>';print_r($cate_list);exit;
		$data['cate_list'] = $cate_list;
		$this->load->view('inventory/rate_tactics_view',$data);
	}
	
	function add_rate_plan_view($supplier_id,$prop_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$data['rat_tac_details'] = $this->Supplier_Model->add_rate_plan_view($prop_id);
		$this->load->view('inventory/add_rate_plan',$data);	
	}
	
	
	//----- Add New Supplier's Rate Tacticse -----/
	function add_rate_plan($supplier_id,$prop_id)
	{

		
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
	
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
			//$supplier_id = $this->session->userdata('supplier_id');
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
			//echo count($_POST['dates']);
			//echo "<pre/>";print_r($_POST); exit;
		$last_id =	$this->Supplier_Model->add_rate_plan($supplier_id, $prop_id,$market_id , $season, $category_name, $allocation_rooms, $allocation_release_days, $allocation_release_period, $allocation_validity_from, $allocation_validity_to, $occupancy, $adult, $child, $child_below_age, $child_above_age, $child_above_age_charge,$child_extra_bed_charge, $no_of_infants, $breakfast, $breakfast_type,$meal_plan, $lunch, $dinner, $adult_breakfast_rate,$adult_lunch_rate,$adult_dinner_rate,$child_breakfast_rate,$child_lunch_rate,$child_dinner_rate,$child_policy, $remarks, $cancel_policy_nights, $cancel_policy_percent, $cancel_policy_charge, $cancel_policy_from, $cancel_policy_to, $cancel_policy_desc, $minimum_stay_from, $minimum_stay_to, $minimum_stay_nights, $room_avail_date_from, $room_avail_date_to, $dates, $weekday, $price, $extra_bed_price, $avail, $aadult, $achild, $child_price, $infant, $sup_charge,$booking_code,$supplement_rate);
			
			//echo $last_id;exit;

			if($more_dates=="true")
			{
				$data['results']=$this->Supplier_Model->add_more_rate_plan($last_id);
				//echo "<pre/>";print_r($data);exit;

				$this->load->view('inventory/add_more_rate_plan',$data);
			}
			else
			{
				redirect('index/rate_tactics_list/'.$supplier_id.'/'.$prop_id,'refresh');
			}
			
			
		}
	}
	
	//----- Get Supplier's Extra Services -----/
	function extra_service($supplier_id,$prop_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		//$supplier_id = $this->session->userdata('supplier_id'); 
		$data['result'] = $this->Supplier_Model->get_extra_service($supplier_id,$prop_id);
		$this->load->view('inventory/extra_service',$data);
		/*$this->load->view('inventory/extra_service');*/
	}
	
	//----- Edit Supplier's Extra Services -----/
	function edit_extra_service($supplier_id,$prop_id,$id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		//$supplier_id = $this->session->userdata('supplier_id'); 
		$this->Supplier_Model->edit_extra_service($supplier_id,$prop_id,$id);
		redirect('index/extra_service/'.$supplier_id.'/'.$prop_id,'refresh');
	}
	
	//----- Set Supplier's Extra Services -----/
	function set_extra_service($supplier_id,$prop_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		//$supplier_id = $this->session->userdata('supplier_id'); 
		$this->Supplier_Model->set_extra_service($supplier_id,$prop_id);
		redirect('index/extra_service/'.$supplier_id.'/'.$prop_id,'refresh');
	}
	
	//----- Get Supplier's House Rules -----/
	function house_rules($supplier_id,$prop_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$supplier_id=$this->uri->segment(3);
		$prop_id=$this->uri->segment(4);
		//$supplier_id = $this->session->userdata('supplier_id');
		$data['result'] = $this->Supplier_Model->get_house_rules($supplier_id,$prop_id);
		$this->load->view('inventory/house_rules',$data);
	}
	
	//----- Edit Supplier's House Rules -----/
	function edit_house_rules($supplier_id,$prop_id, $id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
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
			//$supplier_id = $this->session->userdata('supplier_id'); 
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
			
			redirect('index/house_rules/'.$supplier_id.'/'.$prop_id,'refresh');
		}
	}
	
	//------------- Get Supplier's Maintain By Month Dates -------- //
	function getDates()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		 $results = $this->Supplier_Model->getDates();
	}
	
	//------------- Get Supplier's Maintain By Month Available Dates -------- //
	function getAvailDates()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		 $results = $this->Supplier_Model->getAvailDates();
	}
	
	//----- Get Supplier's Add Maintain Month -----/
	function add_maintain_month($prop_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$supplier_id = $this->session->userdata('supplier_id');
		$this->Supplier_Model->add_maintain_month($supplier_id,$prop_id);
		redirect('index/maintain_month_list/'.$prop_id,'refresh');
	}
	
	//----- Get Supplier's Open / Close Dates -----/
	function open_close_dates()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$this->load->view('inventory/open_close_dates');
	}
	
	//----- Get Supplier's Maintain Month Dates for Open / Close Dates -----/
	function get_maintain_month_dates($supplier_id,$prop_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		//$supplier_id = $this->session->userdata('supplier_id');
		$data['results'] = $this->Supplier_Model->get_maintain_month_dates($supplier_id,$prop_id);
		$this->load->view('inventory/open_close_dates',$data);
	}
	
	//----- Get Supplier's Early Bird Promotion -----/
	function early_bird($supplier_id,$prop_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		 
		$data['result'] = $this->Supplier_Model->inventory_early_bird_list($supplier_id,$prop_id);
		$this->load->view('inventory/early_bird_promotion',$data);
	}
	//----- Update Supplier's Category Type -----/
	function update_category_type($sup_id,$prop_id,$id,$status)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		$this->Supplier_Model->update_category_type($id,$status);
		redirect('index/inventory_category_list/'.$sup_id.'/'.$prop_id,'refresh');
	}
	
	//----- Update Supplier's Rate Tactics Status -----/
	function update_rate_tactics($sup_id,$prop_id,$id,$status)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$this->Supplier_Model->update_rate_tactics($id,$status);
		redirect('index/rate_tactics_list/'.$sup_id.'/'.$prop_id,'refresh');
	}
	
	//----- Set Supplier's Open Close Date Status -----/
	function set_open_close_dates()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$results = $this->Supplier_Model->set_open_close_dates();
	}
	
	public function add_market($id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$val=$this->input->post('add_market_name');
		$supplier_id = $this->session->userdata('supplier_id');
		$data['new_val'] = $this->Supplier_Model->add_market($val);
		redirect("index/edit_contact_inform/$id",'refresh');
	}
	public function sup_add_market()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$val=$this->input->post('add_market_name');
		$data['new_val'] = $this->Supplier_Model->add_market($val);
		redirect("index/suplier_available_market",'refresh');
	}
	
	public function add_markets()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$val=$this->input->post('add_market_name');
		$supplier_id = $this->session->userdata('supplier_id');
		$data['new_val'] = $this->Supplier_Model->add_market($val);
		redirect("index/edit_contact_inform",'refresh');
	}
	
	//----- Upload Supplier's Accomodation Pictures -----/
	function uploadify($supplier_id,$prop_id)
	{ 

		/*if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}*/
		 // $supplier_id ;
		  //$prop_id ; 
	    $targetFolder = WEB_DIR_FRONT.'supplier_hotels_images'; 
			//print_r($_FILES);exit;
		if (!empty($_FILES)) {
			$fileName	=	$_FILES['Filedata']['name'];
			$tempFile 	= 	$_FILES['Filedata']['tmp_name'];
			$targetPath = 	$_SERVER['DOCUMENT_ROOT'] . '/supplier_hotels_images';
			$targetFile = 	rtrim($targetPath,'/') . '/' . $_FILES['Filedata']['name']; //exit;
			
			$fileTypes = array('jpg','jpeg','gif','png'); // File extensions
			$fileParts = pathinfo($_FILES['Filedata']['name']);
			
			if (in_array($fileParts['extension'],$fileTypes)) {
				$this->Supplier_Model->uploadPhotos($fileName, $tempFile, $targetPath, $supplier_id, $prop_id);
			} 
			redirect('index/accomodation_pictures/'.$supplier_id.'/'.$prop_id,'refresh');
		}
	}
	
	
	//----- Get Supplier's Accomodation Pictures -----/
	function getImages()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$supplier_id = $this->uri->segment(3);
		//echo $supplier_id;
		$data['result'] = $this->Supplier_Model->getImages($supplier_id);
	}
	
	
	//----- Delete Supplier's Accomodation Pictures -----/
	function delete_picture()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$data['result'] = $this->Supplier_Model->delete_picture();
	}
	
	//----- Set Supplier's Accomodation Pictures -----/
	function set_acco_pictures($sup_id,$prop_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$data['result'] = $this->Supplier_Model->set_acco_pictures();
		redirect('index/accomodation_pictures/'.$sup_id.'/'.$prop_id,'refresh');
	}
	
	//----- Set Supplier's Accomodation Pictures -----/
	function status_pic()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$data['result'] = $this->Supplier_Model->status_pic();
		redirect('index/accomodation_pictures/'.$prop_id,'refresh');
	}
	
	public function add_hotel_ad($sup_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$supplier_id = $this->session->userdata('supplier_id');
		$supplier_id =$supplier_id!='' ? $supplier_id :'1';
		$property_id=$this->uri->segment(3);
		$data['sup_id']=$sup_id;
		//$data['contact_inf']=$this->Supplier_Model->contact_inform_edit($supplier_id,$property_id);
		$data['country_list']=$this->Supplier_Model->fetch_country();
		$data['language_list']=$this->Supplier_Model->fetch_language();
		$this->load->view('profile/add_hotel_ad',$data);
	}
	
	function add_banner_images()
	{
			
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}

		//$target=ROOTPATH.'banner_images/test/';
		$left_ban1 = 'banner_images/test/' . $_FILES["left_ban1"]["name"];
			move_uploaded_file($_FILES['left_ban1']['tmp_name'],$left_ban1);
			 
			
				//print_r($_FILES);
			//exit;
			$filename = stripslashes($_FILES['left_ban1']['name']);

		
		 $c1=$_POST['c1'];
			
		$upload=$this->admin_model->upload_banner_image($c1,$left_ban1);
		redirect('index/banner','refresh');
	
}
//----- Get Supplier's Rate Tacticse Details -----/
	function view_rate_tactics_details($sup_id,$prop_id,$id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$data['rat_tac_details'] = $this->Supplier_Model->view_rate_tactics_details($id);
		$data['prop_id'] = $prop_id;
		$data['id'] = $id;
		$data['sup_id']=$sup_id;
		$this->load->view('inventory/edit_rate_plan',$data);
	}
	
	//----- Edit Supplier's Rate Tacticse Details -----/
	function edit_rate_plan($supplier_id,$prop_id, $id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
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
			//$supplier_id = $this->session->userdata('supplier_id');
			$market_id= $this->input->post('market_id');
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
			
			$this->Supplier_Model->edit_rate_plan($supplier_id, $prop_id, $id,$market_id, $season, $category_name, $allocation_rooms, $allocation_release_days, $allocation_release_period, $allocation_validity_from, $allocation_validity_to, $occupancy, $adult, $child, $child_below_age, $child_above_age, $child_above_age_charge,$child_extra_bed_charge, $no_of_infants, $breakfast, $breakfast_type,$adult_breakfast_rate,$adult_lunch_rate,$adult_dinner_rate,$child_breakfast_rate,$child_lunch_rate,$child_dinner_rate, $meal_plan, $lunch, $dinner, $child_policy, $remarks, $cancel_policy_nights, $cancel_policy_percent, $cancel_policy_charge, $cancel_policy_from, $cancel_policy_to, $cancel_policy_desc, $minimum_stay_from, $minimum_stay_to, $minimum_stay_nights, $room_avail_date_from, $room_avail_date_to, $avail_dates, $avail_weekday, $avail_price, $extra_bed_price, $avail_rooms, $avail_adult, $avail_child, $avail_child_price, $avail_infant, $avail_sup_charge, $avail_datess,$booking_code,$supplement_rate);
			
			
			
			redirect('index/view_rate_tactics_details/'.$supplier_id.'/'.$prop_id.'/'.$id,'refresh');
		}
	}
	
	//----- Set Supplier's House Rules -----/
	function set_house_rules($supplier_id,$prop_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
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
			//$supplier_id = $this->session->userdata('supplier_id'); 
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
			
			redirect('index/house_rules/'.$supplier_id.'/'.$prop_id,'refresh');
		}
	}
	
	/*	TO add the season*/
	function add_season($supplier_id,$hotel_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$season = $this->input->post('season');
		
		$this->Supplier_Model->add_season($season);
		redirect("index/add_rate_plan_view/".$supplier_id.'/'.$hotel_id,'refresh');
		//$this->load->view('inventory/add_rate_plan','refresh');
	
	}
        
        //----- Get Supplier's Category List -----/
	function accounting($supplier_id,$id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		//$supplier_id = $this->session->userdata('supplier_id'); 
		$data['result'] = $this->Supplier_Model->get_accounting($supplier_id,$id);
		$data['currency']=$this->Supplier_Model->fetch_currency_val();
		//$data['country_list']=$this->Supplier_Model->fetch_country();
		$this->load->view('profile/accounting',$data);
	}
	
	public function accounting_add($supplier_id,$hot_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
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
		//$supplier_id = $this->session->userdata('supplier_id'); 
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
		redirect("index/accounting/".$supplier_id.'/'.$hot_id,'refresh');
		//}
	}
        
     function promotion_details($supplier_id,$hotel_id,$room_tactics_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$data['cate_details'] = $this->Supplier_Model->get_category_name_tactics($hotel_id,$room_tactics_id);
                $data['promo_details'] = $this->Supplier_Model->promotions_details($hotel_id,$room_tactics_id);
		$data['prop_id'] = $hotel_id;
		$data['id'] = $room_tactics_id;
		$this->load->view('inventory/promotion_list',$data);
	}
        
        //----- Get promotion Details -----/
	function promotion_view_details($supplier_id,$hotel_id,$room_tactics_id,$promo_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
         $data['cate_details'] = $this->Supplier_Model->get_category_name_tactics($hotel_id,$room_tactics_id);
		$data['promo_view_details'] = $this->Supplier_Model->promotion_view_details($promo_id);
		$data['prop_id'] = $hotel_id;
		$data['id'] = $room_tactics_id;
        $data['promo_id']=$promo_id;
        
        //print_r($data); die;
		$this->load->view('inventory/promotion_view',$data);
	}
        
        //get the promotion rates
        function get_promotion_rates()
        {
           if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
			}
            $results=$this->Supplier_Model->get_promotion_rates();
        }
        
        //add promotion view
        function add_promotion_view($supplier_id,$hot_id,$room_tac_id)
        {
			if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
			}
            $data['hot_id'] = $hot_id;
            $data['room_tac_id'] = $room_tac_id;
			 $data['supplier_id'] = $supplier_id;
			 $data['cate_details'] = $this->Supplier_Model->get_category_name_tactics($hot_id,$room_tac_id);
            $this->load->view('inventory/add_promotion',$data);
        }
        
        //----- Add New Supplier's Rate Tacticse -----/
	function add_promotion($supplier_id,$hot_id,$room_tac_id)
	{
         if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}   
		//print'<pre />';print_r($_POST);exit; 
			        
			
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
			
			$date_from = $this->input->post('sup_room_avail_date_from');
			 $daf = explode("-",$date_from);
		    $sup_room_avail_date_from = $daf[0].'-'.$daf[1].'-'.$daf[2];
			
			$date_to = $this->input->post('sup_room_avail_date_to');
			$dat = explode("-",$date_to);
			$sup_room_avail_date_to = $dat[0].'-'.$dat[1].'-'.$dat[2];
			 
			$season_id = $this->input->post('season_id');
			$category_type = $this->input->post('category_type');
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
			
			
			//print'<pre />';print_r($dates); exit;
			$this->Supplier_Model->add_promotion($supplier_id, $hot_id, $room_tac_id, $room_avail_date_from, $room_avail_date_to, $staynights, $paynights, $bbdate, $hhdate, $promotion_avail_from, $promotion_avail_to, $dates, $weekday, $price, $extra_bed_price, $avail, $aadult, $achild, $child_price, $infant, $sup_charge,$booking_code,$sup_room_avail_date_from,$sup_room_avail_date_to, $season_id,$category_type,$multiple);
			
			redirect('index/promotion_details/'.$supplier_id.'/'.$hot_id.'/'.$room_tac_id,'refresh');
//		}
	}
        
        function update_promotion($supplier_id,$hot_id,$prop_id,$id,$status)
	{
            
		$this->Supplier_Model->update_promotion($id,$status);
		redirect('index/promotion_details/'.$supplier_id.'/'.$hot_id.'/'.$prop_id,'refresh');
	}
	
	
	public function latest_news()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$data['news_list'] = $this->admin_model->getnewsinfo();
		$this->load->view('latest_news',$data);
	}
	
	public function edit_news()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$data['news_list'] = $this->admin_model->getnewsinfo();
	$this->load->view('edit_news',$data);
	}
	
	public function update_news()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$offer = htmlentities(trim($this->input->post('offer_content')));
		$updated = $offer;
		$data['news_list'] = $this->admin_model->updatenewsinfo($updated);
		redirect('index/latest_news', 'refresh');
	}
	function add_cate($supplier_id,$hotel_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$cate_type = $this->input->post('cate_type');
		$this->Supplier_Model->add_cate($cate_type);
		redirect("index/add_cate_type/".$supplier_id."/".$hotel_id,'refresh');
	}
	
	function getCancelPolicies($rate_tac_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		//$rate_tac_id =  $_POST['room_rate_id']; 
		//echo $rate_tac_id;exit;
		
		$results = $this->Supplier_Model->getCancelPolicies($rate_tac_id);
	}
	function getMinimumStay()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$results = $this->Supplier_Model->getMinimumStay();
	}
	function view_allotment_list($supplier_id,$id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		$data['result'] = $this->Supplier_Model->inventory_allotment_list($supplier_id,$id);
		$this->load->view('inventory/allotment_list_view',$data);
	}
	function add_allotment($supplier_id,$prop_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$data['hotel_id'] = $prop_id;
		$data['supplier_id'] = $supplier_id;
		//print'<pre />';print_r($data);exit;
		$this->load->view('inventory/add_allotment_view',$data);	
	}
	function add_allotment_plan($supplier_id,$prop_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		//print'<pre />';print_r($_POST);exit;
			
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
								
			
			//print '<pre>';print_r($_REQUEST); exit;
			$this->Supplier_Model->add_allotment_plan($supplier_id, $prop_id, $season_id, $cate_type,$allocation_rooms, $allocation_release_days, $allocation_release_period, $allocation_validity_from, $allocation_validity_to);
			
			redirect('index/view_allotment_list/'.$supplier_id.'/'.$prop_id,'refresh');
		
	}
	
	function view_allotment($supplier_id,$prop_id, $id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$data['allot_details'] = $this->Supplier_Model->view_allotment($supplier_id,$prop_id, $id);
		$data['supplier_id']=$supplier_id;
		$data['prop_id'] = $prop_id;
		$data['id'] = $id;
		$this->load->view('inventory/edit_allotment_view',$data);
	}
	
	function edit_allotment_plan($supplier_id,$prop_id, $id)
	{   
	
			if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
			//print'<pre />';print_r($_POST);exit;
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
								
			
			//print '<pre>';print_r($_REQUEST); exit;
			$this->Supplier_Model->edit_allotment_plan($id, $supplier_id, $prop_id, $season_id, $cate_type,$allocation_rooms, $allocation_release_days, $allocation_release_period, $allocation_validity_from, $allocation_validity_to);
			
			redirect('index/view_allotment_list/'.$supplier_id.'/'.$prop_id,'refresh');
	}
	
	public function update_allotment_list($supplier_id,$prop_id, $id,$status)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$this->Supplier_Model->update_allotment_list($id,$status);
		redirect('index/view_allotment_list/'.$supplier_id.'/'.$prop_id,'refresh');
	}
	function add_early_bird_promotion($supplier_id,$prop_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$data['hotel_id'] = $prop_id;
		$data['supplier_id'] = $supplier_id;
		
		//print'<pre />';print_r($data);exit;
		$this->load->view('inventory/add_early_bird_promotion_view',$data);
	}
	
	function add_early_bird_plan($supplier_id,$prop_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		//print'<pre />';print_r($_POST);exit;
			
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
			
			//.print'<pre />';print_r($_REQUEST); exit;
			$result=$this->Supplier_Model->add_early_bird_plan($supplier_id, $prop_id, $season_id, $cate_type,$from_date, $to_date, $book_before_date, $discount ,$amount,$booking_code);
			
			
			redirect('index/early_bird/'.$supplier_id.'/'.$prop_id,'refresh');
		
	}
	function view_early_bird($supplier_id,$prop_id, $id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$data['allot_details'] = $this->Supplier_Model->view_early_bird($prop_id,$id);
		$data['prop_id'] = $prop_id;
		$data['supplier_id'] = $supplier_id;
		$data['id'] = $id;
		$this->load->view('inventory/edit_early_bird_promotion_view',$data);
	}
	
	function edit_early_bird_plan($supplier_id,$prop_id, $id)
	{   
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}	
			//print'<pre />';print_r($_POST);exit;
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
			
			//print '<pre>';print_r($_REQUEST); exit;
			$this->Supplier_Model->edit_early_bird_plan($id, $supplier_id, $prop_id, $season_id, $cate_type,$from_date, $to_date, $book_before_date, $discount,$amount,$booking_code);
			
			redirect('index/early_bird/'.$supplier_id.'/'.$prop_id,'refresh');
	}
	public function update_early_bird($supplier_id,$prop_id, $id,$status)
	{
		$this->Supplier_Model->update_early_bird($id,$status);
		redirect('index/early_bird/'.$supplier_id.'/'.$prop_id,'refresh');
	}
	function getAvailDatesForPromotion()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		 $results = $this->Supplier_Model->getAvailDatesForPromotion();
	}
	function edit_promotion_plan($supplier_id,$hot_id,$room_tac_id,$promo_id)
	{	 
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}       
	       //print'<pre>';print_r($_POST);exit;
			
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
			
			redirect('index/promotion_details/'.$supplier_id.'/'.$hot_id.'/'.$room_tac_id,'refresh');

	}
	function car_rental()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$data['result'] = $this->Supplier_Model->get_car_rental_period();
		$this->load->view('profile/car_rental',$data);
	}
	function add_car_rental_period(){
		
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$this->load->view('profile/add_car_rental_period');
	}
	
	function add_car_period()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		$this->form_validation->set_rules('from_date', 'From date', 'required');
		$this->form_validation->set_rules('to_date', 'To date', 'required');
		
		if($this->form_validation->run()==FALSE)
		{
			$this->load->view('profile/add_car_rental_period');
		}
			//print'<pre />';print_r($_POST);exit;
			
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
			$this->Supplier_Model->add_car_period($from_date, $to_date);
			
			redirect('index/car_rental','refresh');
	}
	function view_car_rental_period($id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		$data['car_period'] = $this->Supplier_Model->view_car_rental_period($id);
		$data['id'] = $id;
		$this->load->view('profile/edit_car_rental_period',$data);
	}
	function edit_car_period($id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		$this->form_validation->set_rules('from_date', 'From date', 'required');
		$this->form_validation->set_rules('to_date', 'To date', 'required');
		
		if($this->form_validation->run()==FALSE)
		{
			$this->load->view('profile/edit_car_rental_period');
		}
			//print'<pre />';print_r($_POST);exit;
			 
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
			$this->Supplier_Model->edit_car_period($from_date, $to_date,$id);
			
			redirect('index/car_rental','refresh');
		
	}
	function update_car_rental_period($id,$status)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		$this->Supplier_Model->update_car_rental_period($id,$status);
		redirect('index/car_rental', 'refresh');
	}
	function view_car_rental_details($sup_car_rental_period_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		//echo $id;exit;
		$data['sup_car_rental_period_id']= $sup_car_rental_period_id;
		$data['car_period'] = $this->Supplier_Model->get_car_rental_period_details($sup_car_rental_period_id);
		$data['result'] = $this->Supplier_Model->get_car_rental_details($sup_car_rental_period_id);
		//print'<pre />';print_r($data);exit;
		$this->load->view('profile/view_car_rental_details',$data);
	}
	public function add_car_rental($car_rental_period_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$data['car_rental_period_id'] = $car_rental_period_id;
		$this->load->view('profile/add_car_rental',$data);
	}
	function insert_car_rental_details($car_rental_period_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		//print'<pre />';print_r($_POST);exit;
		$matrix = $this->input->post('matrix');
		$car_type = $this->input->post('car_type');
		$no_of_doors = $this->input->post('no_of_doors');
		$no_of_passengers = $this->input->post('no_of_passengers');
		$from_days= $this->input->post('from_days');
		//print_r($sup_car_rental_period_id);exit;
		$to_days = $this->input->post('to_days');
		$rates_per_day = $this->input->post('rates_per_day');
		
		$currency= $this->input->post('currency');
		$pai = $this->input->post('pai');
		$min_rental_period = $this->input->post('min_rental_period');
		$rates_inclusion= $this->input->post('rates_inclusion');
		$insurance_access = $this->input->post('insurance_access');
		$rates_exclusions = $this->input->post('rates_exclusions');
		$security= $this->input->post('security');
		$fuel_policy = $this->input->post('fuel_policy');
		$public_holidays= $this->input->post('public_holidays');
		$airport_off_charges = $this->input->post('airport_off_charges');
		$driving_quali = $this->input->post('driving_quali');
		$driving_age= $this->input->post('driving_age');
		$additional_driver = $this->input->post('additional_driver');
		$driving_restrictions = $this->input->post('driving_restrictions');
		$non_coverage= $this->input->post('non_coverage');
		$break_down_procedure = $this->input->post('break_down_procedure');
		$toll_fee = $this->input->post('toll_fee');
		$parking_fee= $this->input->post('parking_fee');
		$special_equipment = $this->input->post('special_equipment');
		$driving_across_border = $this->input->post('driving_across_border');
		$collection_charges= $this->input->post('collection_charges');
		$oman_off_hire_charge = $this->input->post('oman_off_hire_charge');
		$chaufer_service = $this->input->post('chaufer_service');
		$late_return= $this->input->post('late_return');
		$allocations = $this->input->post('allocations');
		$black_out_dates = $this->input->post('black_out_dates');
		$cancellation_charges= $this->input->post('cancellation_charges');
		$stop_sale = $this->input->post('stop_sale');
		$upgrade_policy = $this->input->post('upgrade_policy');
		$sup_id = $this->input->post('supplier_name');
		$cancel_no_of_days = $this->input->post('cancel_no_of_days');
		$cancel_charge = $this->input->post('cancel_charge');
		$image1_url  = $_FILES['image1_url']['name'];
		$image2_url  = $_FILES['image2_url']['name'];
		
		 $target_path1 = 	$_SERVER['DOCUMENT_ROOT'] . '/upload_images';
		 $target_path = 	rtrim($target_path1,'/').'/'.basename($_FILES['image1_url']['name']);
		 $move1 		 =  move_uploaded_file($_FILES['image1_url']['tmp_name'], $target_path);
		
		$target_path2 = 	$_SERVER['DOCUMENT_ROOT'] . '/upload_images';
		$target_path2 = 	rtrim($target_path2,'/').'/'.basename($_FILES['image2_url']['name']); 
		$move2 		 =  move_uploaded_file($_FILES['image2_url']['tmp_name'], $target_path2);
		//print '<pre/>';print_r($sup_id);exit;
		
		
		$this->Supplier_Model->add_car_rental_details($car_rental_period_id,$matrix,$car_type,$no_of_doors,$no_of_passengers,$from_days,
		$to_days,$rates_per_day,$currency,$pai,$min_rental_period,$rates_inclusion,$insurance_access,$rates_exclusions,$security,$fuel_policy,$public_holidays,$airport_off_charges,$driving_quali,$driving_age,$additional_driver,$driving_restrictions,$non_coverage,$break_down_procedure,$toll_fee,$parking_fee,$special_equipment,$driving_across_border,$collection_charges,$oman_off_hire_charge,$chaufer_service,$late_return,$allocations,$black_out_dates,$cancellation_charges,$stop_sale,$upgrade_policy,$sup_id,$image2_url,$image1_url,$cancel_no_of_days,$cancel_charge);
		redirect('index/view_car_rental_details/'.$car_rental_period_id,'refresh');
	}
    function update_car_rental_details($car_rental_period_id, $id,$status)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$this->Supplier_Model->update_car_rental_details($id,$status);
		redirect('index/view_car_rental_details/'.$car_rental_period_id,'refresh');
	}
	function edit_car_rental_details($car_rental_period_id,$id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$data['car_rental']=$this->Supplier_Model->get_car_rental_tot_details($id);
		$this->load->view('profile/edit_car_rental',$data);
	
	}
	function add_matrix($supplier_id,$id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		$matrix = $this->input->post('matrix');
		
		$this->Supplier_Model->add_matrix($matrix,$supplier_id);
		redirect('index/add_car_rental/'.$supplier_id.'/'.$id,'refresh');
		
	}
	function add_car_type($supplier_id,$id)
	{
			if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
			}
			$car_type = $this->input->post('car_type');
			$this->Supplier_Model->add_car_type($car_type,$supplier_id);
			redirect('index/add_car_rental/'.$supplier_id.'/'.$id,'refresh');
		
	}
	function update_car_rental($car_rental_period_id,$id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		
		//print'<pre />';print_r($_POST);exit;
		$matrix = $this->input->post('matrix');
		$car_type = $this->input->post('car_type');
		$no_of_doors = $this->input->post('no_of_doors');
		$no_of_passengers = $this->input->post('no_of_passengers');
		$from_days= $this->input->post('from_days');
		$to_days = $this->input->post('to_days');
		$rates_per_day = $this->input->post('rates_per_day');
		
		$currency= $this->input->post('currency');
		$pai = $this->input->post('pai');
		$min_rental_period = $this->input->post('min_rental_period');
		$rates_inclusion= $this->input->post('rates_inclusion');
		$insurance_access = $this->input->post('insurance_access');
		$rates_exclusions = $this->input->post('rates_exclusions');
		$security= $this->input->post('security');
		$fuel_policy = $this->input->post('fuel_policy');
		$public_holidays= $this->input->post('public_holidays');
		$airport_off_charges = $this->input->post('airport_off_charges');
		$driving_quali = $this->input->post('driving_quali');
		$driving_age= $this->input->post('driving_age');
		$additional_driver = $this->input->post('additional_driver');
		$driving_restrictions = $this->input->post('driving_restrictions');
		$non_coverage= $this->input->post('non_coverage');
		$break_down_procedure = $this->input->post('break_down_procedure');
		$toll_fee = $this->input->post('toll_fee');
		$parking_fee= $this->input->post('parking_fee');
		$special_equipment = $this->input->post('special_equipment');
		$driving_across_border = $this->input->post('driving_across_border');
		$collection_charges= $this->input->post('collection_charges');
		$oman_off_hire_charge = $this->input->post('oman_off_hire_charge');
		$chaufer_service = $this->input->post('chaufer_service');
		$late_return= $this->input->post('late_return');
		$allocations = $this->input->post('allocations');
		$black_out_dates = $this->input->post('black_out_dates');
		$cancellation_charges= $this->input->post('cancellation_charges');
		$stop_sale = $this->input->post('stop_sale');
		$upgrade_policy = $this->input->post('upgrade_policy');
		$cancel_no_of_days = $this->input->post('cancel_no_of_days');
		$sup_id=$this->input->post('supplier_name');
		$cancel_charge = $this->input->post('cancel_charge');
		$img1_url = $this->input->post('img1_url');
		$img2_url = $this->input->post('img2_url');
		$image1_url ='';
		$image2_url ='';
		if(isset($_FILES['image1_url']['name']) && $_FILES['image1_url']['name'] != '')
		{
			$image1_url  	= $_FILES['image1_url']['name']; 
			$target_path1 = 	$_SERVER['DOCUMENT_ROOT'] . '/upload_images';
			$target_path = 	rtrim($target_path1,'/').'/'.basename($_FILES['image1_url']['name']);
		 	$move1 		 =  move_uploaded_file($_FILES['image1_url']['tmp_name'], $target_path);
		}
		else {
			$image1_url=$img1_url;
		}
		if(isset($_FILES['image2_url']['name']) && $_FILES['image2_url']['name'] != '')
		{
			$image2_url  	= $_FILES['image2_url']['name'];
			$target_path2 = 	$_SERVER['DOCUMENT_ROOT'] . '/upload_images';
			$target_path2 = 	rtrim($target_path2,'/').'/'.basename($_FILES['image2_url']['name']); 
			$move2 		 =  move_uploaded_file($_FILES['image2_url']['tmp_name'], $target_path2);
		}
		else {
			$image2_url=$img2_url;
		}
		
		
	
		$result =$this->Supplier_Model->update_car_rental($car_rental_period_id,$matrix,$car_type,$no_of_doors,$no_of_passengers,$from_days,
		$to_days,$rates_per_day,$id,$currency,$pai,$min_rental_period,$rates_inclusion,$insurance_access,$rates_exclusions,$security,$fuel_policy,$public_holidays,$airport_off_charges,$driving_quali,$driving_age,$additional_driver,$driving_restrictions,$non_coverage,$break_down_procedure,$toll_fee,$parking_fee,$special_equipment,$driving_across_border,$collection_charges,$oman_off_hire_charge,$chaufer_service,$late_return,$allocations,$black_out_dates,$cancellation_charges,$stop_sale,$upgrade_policy,$image1_url,$image2_url,$cancel_no_of_days,$cancel_charge,$sup_id);
		
		
		
		redirect('index/view_car_rental_details/'.$car_rental_period_id,'refresh');
	}
	function excursion()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		$data['result'] = $this->Supplier_Model->get_excursion_period();
		$this->load->view('profile/excursion',$data);
	}
	function excursion_period(){
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		$this->load->view('profile/add_excursion_period');
	}
	function add_excursion_period()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		$this->form_validation->set_rules('from_date', 'From date', 'required');
		$this->form_validation->set_rules('to_date', 'To date', 'required');
		
		if($this->form_validation->run()==FALSE)
		{
			$this->load->view('profile/add_excursion_period');
		}
			//print'<pre />';print_r($_POST);exit;
			
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
			$this->Supplier_Model->add_excursion_period($from_date, $to_date);
			
			redirect('index/excursion','refresh');
	}
	function update_excursion_period($id,$status)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		$this->Supplier_Model->update_excursion_period($id,$status);
		redirect('index/excursion','refresh');
	}
	function edit_excursion_period($id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		$data['car_period'] = $this->Supplier_Model->view_excursion_period($id);
		$data['id'] = $id;
		$this->load->view('profile/edit_excursion_period',$data);
	}
	function edit_excursion_period_details($id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		$this->form_validation->set_rules('from_date', 'From date', 'required');
		$this->form_validation->set_rules('to_date', 'To date', 'required');
		
		if($this->form_validation->run()==FALSE)
		{
			$this->load->view('profile/edit_car_rental_period');
		}
			//print'<pre />';print_r($_POST);exit;
			 
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
			$this->Supplier_Model->edit_excursion_period($from_date, $to_date,$id);
			
			redirect('index/excursion','refresh');
		
	}
	function view_excursion_details($id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		//echo $supplier_id;exit;
		 $data['id']=$id;
		$data['car_period'] = $this->Supplier_Model->get_excursion_period_details($id);
		$data['result'] = $this->Supplier_Model->get_excursion_details($id);
		$this->load->view('profile/view_excursion_details',$data);
	}
	function add_excursion($id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$data['id'] = $id;
		$this->load->view('profile/add_excursion',$data);
	}
	function add_excursion_details($excursion_period_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		//print'<pre />';print_r($_POST);exit;
		$excursion_name = $this->input->post('excursion_name');
		$description = $this->input->post('description');
		$no_of_passengers = $this->input->post('no_of_passengers');
		$pickup_time = $this->input->post('pickup_time');
		$duration= $this->input->post('duration');
		$adult_price = $this->input->post('adult_price');
		$child_price = $this->input->post('child_price');
		$notes= $this->input->post('notes');
		$sup_id = $this->input->post('supplier_name');
		$image1_url  = $_FILES['image1_url']['name'];
		$image2_url  = $_FILES['image2_url']['name'];
		
		 $target_path1 = 	$_SERVER['DOCUMENT_ROOT'] . '/upload_images';
		 $target_path = 	rtrim($target_path1,'/').'/'.basename($_FILES['image1_url']['name']);
		 $move1 		 =  move_uploaded_file($_FILES['image1_url']['tmp_name'], $target_path);
		
		$target_path2 = 	$_SERVER['DOCUMENT_ROOT'] . '/upload_images';
		$target_path2 = 	rtrim($target_path2,'/').'/'.basename($_FILES['image2_url']['name']); 
		$move2 		 =      move_uploaded_file($_FILES['image2_url']['tmp_name'], $target_path2);
		
		$this->Supplier_Model->add_excursion_details($excursion_period_id,$excursion_name,$description,$no_of_passengers,$pickup_time,$duration,
		$adult_price,$child_price,$notes,$sup_id,$image1_url,$image2_url);
		
		redirect('index/view_excursion_details/'.$excursion_period_id,'refresh');
	}
	function update_excursion_details($excursion_period_id, $id,$status)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$this->Supplier_Model->update_excursion_details($id,$status);
		redirect('index/view_excursion_details/'.$excursion_period_id,'refresh');
	}
	function edit_excursion_details($excursion_period_id,$id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$data['result']=$this->Supplier_Model->get_excursion_tot_details($id);
		$this->load->view('profile/edit_excursion',$data);
	
	}
	function edit_excursion($excursion_period_id,$id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		//print'<pre />';print_r($_POST);exit;
		$excursion_name = $this->input->post('excursion_name');
		$description = $this->input->post('description');
		$no_of_passengers = $this->input->post('no_of_passengers');
		$pickup_time = $this->input->post('pickup_time');
		$duration= $this->input->post('duration');
		$adult_price = $this->input->post('adult_price');
		$child_price = $this->input->post('child_price');
		$notes= $this->input->post('notes');
		$sup_id= $this->input->post('supplier_name');
		
		$img1_url = $this->input->post('img1_url');
		$img2_url = $this->input->post('img2_url');
		$image1_url ='';
		$image2_url ='';
		if(isset($_FILES['image1_url']['name']) && $_FILES['image1_url']['name'] != '')
		{
			$image1_url  	= $_FILES['image1_url']['name']; 
			$target_path1 = 	$_SERVER['DOCUMENT_ROOT'] . '/upload_images';
			$target_path = 	rtrim($target_path1,'/').'/'.basename($_FILES['image1_url']['name']);
		 	$move1 		 =  move_uploaded_file($_FILES['image1_url']['tmp_name'], $target_path);
		}
		else {
			$image1_url=$img1_url;
		}
		if(isset($_FILES['image2_url']['name']) && $_FILES['image2_url']['name'] != '')
		{
			$image2_url  	= $_FILES['image2_url']['name'];
			$target_path2 = 	$_SERVER['DOCUMENT_ROOT'] . '/upload_images';
			$target_path2 = 	rtrim($target_path2,'/').'/'.basename($_FILES['image2_url']['name']); 
			$move2 		 =  move_uploaded_file($_FILES['image2_url']['tmp_name'], $target_path2);
		}
		else {
			$image2_url=$img2_url;
		}
		
		
		$this->Supplier_Model->edit_excursion($excursion_period_id,$id,$excursion_name,$description,$no_of_passengers,$pickup_time,$duration,
		$adult_price,$child_price,$notes,$image1_url,$image2_url,$sup_id);
		
		redirect('index/view_excursion_details/'.$excursion_period_id,'refresh');
	}
	function transfer()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		$data['result'] = $this->Supplier_Model->get_transfer_period();
		$this->load->view('profile/transfer',$data);
	}
	function transfer_period(){
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		$this->load->view('profile/add_transfer_period');
	}
	function add_transfer_period()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$this->form_validation->set_rules('from_date', 'From date', 'required');
		$this->form_validation->set_rules('to_date', 'To date', 'required');
		
		if($this->form_validation->run()==FALSE)
		{
			$this->load->view('profile/add_excursion_period');
		}
			//print'<pre />';print_r($_POST);exit;
			
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
			$this->Supplier_Model->add_transfer_period($from_date, $to_date);
			
			redirect('index/transfer','refresh');
	}
	function update_transfer_period($id,$status)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		$this->Supplier_Model->update_transfer_period($id,$status);
		redirect('index/transfer','refresh');
	}
	function edit_transfer_period($id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		$data['car_period'] = $this->Supplier_Model->view_transfer_period($id);
		$data['id'] = $id;
		$this->load->view('profile/edit_transfer_period',$data);
	}
	function edit_transfer_period_details($id)
	{
		$this->form_validation->set_rules('from_date', 'From date', 'required');
		$this->form_validation->set_rules('to_date', 'To date', 'required');
		
		if($this->form_validation->run()==FALSE)
		{
			$this->load->view('profile/edit_transfer_period');
		}
			//print'<pre />';print_r($_POST);exit;
			 
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
			$this->Supplier_Model->edit_transfer_period( $from_date, $to_date,$id);
			
			redirect('index/transfer','refresh');
		
	}
	function view_transfer_details($transfer_period_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		//echo $supplier_id;exit;
		
		$data['transfer_period_id']=$transfer_period_id;
		$data['car_period'] = $this->Supplier_Model->get_transfer_period_details($transfer_period_id);
		$data['result'] = $this->Supplier_Model->get_transfer_details($transfer_period_id);
		$this->load->view('profile/view_transfer_details',$data);
	}
	function add_transfer($id)
	{
		$data['id'] = $id;
		$this->load->view('profile/add_transfer',$data);
	}
	function add_transfer_details($transfer_period_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		$this->form_validation->set_rules('pick_up', 'From', 'required');
		$this->form_validation->set_rules('drop_off', 'To ', 'required');
		if($this->form_validation->run()==FALSE)
		{
			$this->load->view('profile/add_transfer');
		}
		
		//print'<pre />';print_r($_POST);exit;
		$pick_up = $this->input->post('pick_up');
		$drop_off = $this->input->post('drop_off');
		$car_price = $this->input->post('car_price');
		$minivan_price = $this->input->post('minivan_price');
		$microbus1_price= $this->input->post('microbus1_price');
		$microbus2_price = $this->input->post('microbus2_price');
		$bus_price = $this->input->post('bus_price');
		$notes= $this->input->post('notes');
		$sup_id= $this->input->post('supplier_name');
		
		$this->Supplier_Model->add_transfer_details($transfer_period_id,$pick_up,$drop_off,$car_price,$minivan_price,$microbus1_price,
		$microbus2_price,$bus_price,$notes,$sup_id);
		redirect('index/view_transfer_details/'.$transfer_period_id,'refresh');
	}
	function update_transfer_details($transfer_period_id,$id,$status)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$this->Supplier_Model->update_transfer_details($id,$status);
		redirect('index/view_transfer_details/'.$transfer_period_id,'refresh');
	}
	function edit_transfer_details($transfer_period_id,$id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$data['result']=$this->Supplier_Model->get_transfer_tot_details($id);
		$this->load->view('profile/edit_transfer',$data);
	
	}
	function edit_transfer($transfer_period_id,$id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		$this->form_validation->set_rules('pick_up', 'From', 'required');
		$this->form_validation->set_rules('drop_off', 'To ', 'required');
		if($this->form_validation->run()==FALSE)
		{
			$this->load->view('profile/add_transfer');
		}
		
		//print'<pre />';print_r($_POST);exit;
		$pick_up = $this->input->post('pick_up');
		$drop_off = $this->input->post('drop_off');
		$car_price = $this->input->post('car_price');
		$minivan_price = $this->input->post('minivan_price');
		$microbus1_price= $this->input->post('microbus1_price');
		$microbus2_price = $this->input->post('microbus2_price');
		$bus_price = $this->input->post('bus_price');
		$notes= $this->input->post('notes');
		$sup_id= $this->input->post('supplier_name');
		
		$this->Supplier_Model->edit_transfer($transfer_period_id,$id,$pick_up,$drop_off,$car_price,$minivan_price,$microbus1_price,
		$microbus2_price,$bus_price,$notes,$sup_id);
		
		redirect('index/view_transfer_details/'.$transfer_period_id,'refresh');
	}
	function get_supplier_name()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$this->db->select('*');
		$this->db->from('supplier');
		$query = $this->db->get();
		
		if ($query->num_rows() > 0)
        {
            $data['response'] = 'true'; //If username exists set true
            $data['message'] = array();
			//print '<pre />';print_r($data);exit;
            foreach ($query->result() as $row)
            {
                $data['message'][] = array(
                    'label' => $row->name,
                    'value' => $row->name
                );
				//echo $data;exit;
            }
        }
        else
        {
            $data['response'] = 'false'; //Set false if user not valid
        }

        echo json_encode($data);

	}
	function prices_list()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$data['result'] = $this->Supplier_Model->get_price_details();
		$this->load->view('profile/prices_list',$data);
	}
	function add_price()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$this->load->view('profile/add_price');
	}
	function add_prices_details()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		$this->form_validation->set_rules('from_city', 'From', 'required');
		$this->form_validation->set_rules('to_city', 'To ', 'required');
		if($this->form_validation->run()==FALSE)
		{
			$this->load->view('profile/add_price');
		}
		
		//print'<pre />';print_r($_POST);exit;
		$from_city = $this->input->post('from_city');
		$to_city = $this->input->post('to_city');
		$seat50_5hrs_prc = $this->input->post('seat50_5hrs_prc');
		$seat50_10hrs_prc = $this->input->post('seat50_10hrs_prc');
		$seat50_extra_hrs_prc= $this->input->post('seat50_extra_hrs_prc');
		$mini_van_5hrs_prc = $this->input->post('mini_van_5hrs_prc');
		$mini_van_10hrs_prc = $this->input->post('mini_van_10hrs_prc');
		$mini_van_extra_hrs_prc = $this->input->post('mini_van_extra_hrs_prc');
		$car_5hrs_prc = $this->input->post('car_5hrs_prc');
		$car_10hrs_prc= $this->input->post('car_10hrs_prc');
		$car_extra_hrs_prc = $this->input->post('car_extra_hrs_prc');
		$seat15_5hrs_prc = $this->input->post('seat15_5hrs_prc');
		$seat15_10hrs_prc = $this->input->post('seat15_10hrs_prc');
		$seat15_extra_hrs_prc = $this->input->post('seat15_extra_hrs_prc');
		$seat30_5hrs_prc= $this->input->post('seat30_5hrs_prc');
		$seat30_10hrs_prc = $this->input->post('seat30_10hrs_prc');
		$seat30_extra_hrs_prc = $this->input->post('seat30_extra_hrs_prc');
		$notes= $this->input->post('notes');
		$sup_id= $this->input->post('supplier_name');
		
		$this->Supplier_Model->add_prices_details($from_city,$to_city,$seat50_5hrs_prc,$seat50_10hrs_prc,$seat50_extra_hrs_prc,$mini_van_5hrs_prc,$mini_van_10hrs_prc,$mini_van_extra_hrs_prc,$car_5hrs_prc,$car_10hrs_prc,$car_extra_hrs_prc,$seat15_5hrs_prc,$seat15_10hrs_prc,$seat15_extra_hrs_prc,$seat30_5hrs_prc,$seat30_10hrs_prc,$seat30_extra_hrs_prc,$notes,$sup_id);
		redirect('index/prices_list','refresh');
	}
	function update_price_list($id,$status)
	{
		$this->Supplier_Model->update_price_list($id,$status);
		redirect('index/prices_list','refresh');
	}
	function edit_price_list($id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		$data['id'] =$id;
		$data['result'] = $this->Supplier_Model->get_price_list($id);
		$this->load->view('profile/edit_price',$data);
	}
	function edit_price_details($id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		$this->form_validation->set_rules('from_city', 'From', 'required');
		$this->form_validation->set_rules('to_city', 'To ', 'required');
		if($this->form_validation->run()==FALSE)
		{
			$this->load->view('profile/add_price');
		}
		
		//print'<pre />';print_r($_POST);exit;
		$from_city = $this->input->post('from_city');
		$to_city = $this->input->post('to_city');
		$seat50_5hrs_prc = $this->input->post('seat50_5hrs_prc');
		$seat50_10hrs_prc = $this->input->post('seat50_10hrs_prc');
		$seat50_extra_hrs_prc= $this->input->post('seat50_extra_hrs_prc');
		$mini_van_5hrs_prc = $this->input->post('mini_van_5hrs_prc');
		$mini_van_10hrs_prc = $this->input->post('mini_van_10hrs_prc');
		$mini_van_extra_hrs_prc = $this->input->post('mini_van_extra_hrs_prc');
		$car_5hrs_prc = $this->input->post('car_5hrs_prc');
		$car_10hrs_prc= $this->input->post('car_10hrs_prc');
		$car_extra_hrs_prc = $this->input->post('car_extra_hrs_prc');
		$seat15_5hrs_prc = $this->input->post('seat15_5hrs_prc');
		$seat15_10hrs_prc = $this->input->post('seat15_10hrs_prc');
		$seat15_extra_hrs_prc = $this->input->post('seat15_extra_hrs_prc');
		$seat30_5hrs_prc= $this->input->post('seat30_5hrs_prc');
		$seat30_10hrs_prc = $this->input->post('seat30_10hrs_prc');
		$seat30_extra_hrs_prc = $this->input->post('seat30_extra_hrs_prc');
		$notes= $this->input->post('notes');
		$sup_id= $this->input->post('supplier_name');
		$this->Supplier_Model->edit_price_details($from_city,$to_city,$seat50_5hrs_prc,$seat50_10hrs_prc,$seat50_extra_hrs_prc,$mini_van_5hrs_prc,$mini_van_10hrs_prc,$mini_van_extra_hrs_prc,$car_5hrs_prc,$car_10hrs_prc,$car_extra_hrs_prc,$seat15_5hrs_prc,$seat15_10hrs_prc,$seat15_extra_hrs_prc,$seat30_5hrs_prc,$seat30_10hrs_prc,$seat30_extra_hrs_prc,$notes,$sup_id,$id);
		redirect('index/prices_list','refresh');
	}
	function markup_master_car_rental()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		 	$data['supp'] = $this->Supplier_Model->get_all_supplier_details();
			//$data['api'] = $this->admin_model->getAPIs();
			$data['car_type'] = $this->Supplier_Model->get_car_all_details();
			$data['car_period'] =$this->Supplier_Model->get_car_period_all_details();
			$data['car_markup'] =$this->Supplier_Model->get_car_markup_all_details();
			$this->load->view('markup_master_car_rental', $data);
	}
	function view_car_markup_details($car_markup_period_id,$sup_car_markup_period_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		$data['car_markup'] =$this->Supplier_Model->get_car_mark_up_all_details($sup_car_markup_period_id);
		//$data['car_markup'] =$this->Supplier_Model->get_car_markup_all_details();
		$data['car_markup_period_id']=$car_markup_period_id;
		$data['sup_car_markup_period_id']=$sup_car_markup_period_id;
		
		$this->load->view('markup_master_car_rental',$data);
	}
	function add_car_markup_details($car_markup_period_id,$sup_car_markup_period_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
			//print '<pre />';print_r($_POST);exit;
			$sup_id = $this->input->post('sup_id');
			$sup_car_type_id = $this->input->post('sup_car_type_id');
			$markup = $this->input->post('markup');
			$this->Supplier_Model->add_car_markup_details($car_markup_period_id,$sup_car_markup_period_id,$sup_id,$sup_car_type_id,$markup);
			redirect('index/view_car_markup_details/'.$car_markup_period_id.'/'.$sup_car_markup_period_id, 'refresh'); 
			
	}
	function update_car_markup($car_markup_period_id,$sup_car_markup_period_id,$id,$status)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$this->Supplier_Model->update_car_markup($id,$status);
		redirect('index/markup_master_car_rental/'.$car_markup_period_id.'/'.$sup_car_markup_period_id,'refresh');
	}
	function markup_car_rental_period()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$data['car_markup']=$this->Supplier_Model->get_car_markuo_period();
		$this->load->view('markup_car_rental_period' ,$data);
	}
	function markup_car_period()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
			$f_date = $this->input->post('from_date');
			$t_date = $this->input->post('to_date');
			
			if($f_date != ''){
			$sds = explode("-",$f_date);
			$from_date = $sds[2].'-'.$sds[1].'-'.$sds[0];
			}
			else{
				$from_date = "0000-00-00";
			}
			
			if($t_date != '') {
			$eds = explode("-",$t_date);
			$to_date = $eds[2].'-'.$eds[1].'-'.$eds[0];
			}
			else{
				$to_date = "0000-00-00";
			}
			$this->Supplier_Model->add_car_period_markup_details($from_date,$to_date);
			redirect('index/markup_car_rental_period','refresh');
	}
	function update_car_markup_period($id,$status)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$this->Supplier_Model->update_car_markup_period($id,$status);
		redirect('index/markup_car_rental_period','refresh');
	}
	function edit_car_markup_period($id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$data['car_period']=$this->Supplier_Model->get_car_markup_period_details($id);
		$this->load->view('edit_car_markup_period',$data);
	}
	function edit_ex_markup_period($id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$data['car_period']=$this->Supplier_Model->get_ex_markup_period_details($id);
		$this->load->view('edit_ex_markup_period',$data);
	}
	function edit_car_markup_period_details($id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
			$f_date = $this->input->post('from_date');
			$t_date = $this->input->post('to_date');
			//print '<pre />';print_r($_POST);exit;
			if($f_date != ''){
			$sds = explode("-",$f_date);
			$from_date = $sds[2].'-'.$sds[1].'-'.$sds[0];
			}
			else{
				$from_date = "0000-00-00";
			}
			
			if($t_date != '') {
			$eds = explode("-",$t_date);
			$to_date = $eds[2].'-'.$eds[1].'-'.$eds[0];
			}
			else{
				$to_date = "0000-00-00";
			}
			$this->Supplier_Model->edit_car_period_markup_details($from_date,$to_date,$id);
			redirect('index/markup_car_rental_period','refresh');
	}
	function add_car_markup($car_markup_period_id,$sup_car_markup_period_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$data['supp'] = $this->Supplier_Model->get_all_supplier_details();
			//$data['api'] = $this->admin_model->getAPIs();
		$data['car_type'] = $this->Supplier_Model->get_car_all_details();
		$this->load->view('add_car_markup',$data);
	}
	function markup_excursion_period()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$data['excursion_markup']=$this->Supplier_Model->get_ex_markup_period();
		$this->load->view('markup_excursion_period',$data);
	}
	function add_markup_excursion_period()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
			//print '<pre />';print_r($_POST);exit;
			$f_date = $this->input->post('from_date');
			$t_date = $this->input->post('to_date');
			
			if($f_date != ''){
			$sds = explode("-",$f_date);
			$from_date = $sds[2].'-'.$sds[1].'-'.$sds[0];
			}
			else{
				$from_date = "0000-00-00";
			}
			
			if($t_date != '') {
			$eds = explode("-",$t_date);
			$to_date = $eds[2].'-'.$eds[1].'-'.$eds[0];
			}
			else{
				$to_date = "0000-00-00";
			}
			$this->Supplier_Model->add_markup_excursion_period($from_date,$to_date);
			redirect('index/markup_excursion_period','refresh');
	}
	function update_ex_markup_period($id,$status)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		//echo $id.$status;exit;
		$this->Supplier_Model->update_ex_markup_period($id,$status);
		redirect('index/markup_excursion_period','refresh');
	}
	function view_ex_markup_details($excursion_markup_period_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		$data['car_markup'] =$this->Supplier_Model->get_ex_mark_up_all_details($excursion_markup_period_id);
		$data['excursion_markup_period_id']=$excursion_markup_period_id;
		$this->load->view('markup_master_excursion',$data);
	}
	function edit_ex_markup_period_details($id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
			$f_date = $this->input->post('from_date');
			$t_date = $this->input->post('to_date');
			//print '<pre />';print_r($_POST);exit;
			if($f_date != ''){
			$sds = explode("-",$f_date);
			$from_date = $sds[2].'-'.$sds[1].'-'.$sds[0];
			}
			else{
				$from_date = "0000-00-00";
			}
			
			if($t_date != '') {
			$eds = explode("-",$t_date);
			$to_date = $eds[2].'-'.$eds[1].'-'.$eds[0];
			}
			else{
				$to_date = "0000-00-00";
			}
			$this->Supplier_Model->edit_ex_period_markup_details($from_date,$to_date,$id);
			redirect('index/markup_excursion_period','refresh');
	}
	function add_excursion_markup($excursion_markup_period_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$data['supp'] = $this->Supplier_Model->get_all_supplier_details();
			//$data['api'] = $this->admin_model->getAPIs();
		$data['car_type'] = $this->Supplier_Model->get_excursion_all_details();
		$this->load->view('add_excursion_markup',$data);
	}
	function add_ex_markup_details($excursion_markup_period_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
			//print '<pre />';print_r($_POST);exit;
			$sup_id = $this->input->post('sup_id');
			$sup_excursion_id = $this->input->post('sup_excursion_id');
			$markup = $this->input->post('markup');
			$this->Supplier_Model->add_ex_markup_details($excursion_markup_period_id,$sup_id,$sup_excursion_id,$markup);
			redirect('index/view_ex_markup_details/'.$excursion_markup_period_id, 'refresh'); 
			
	}
	function update_excursion_markup($excursion_markup_period_id,$id,$status)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$this->Supplier_Model->update_excursion_markup($id,$status);
		redirect('index/view_ex_markup_details/'.$excursion_markup_period_id,'refresh');
	}
	function markup_transfer_period()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$data['excursion_markup']=$this->Supplier_Model->get_tr_markup_period();
		$this->load->view('markup_transfer_period',$data);
	}
	function add_markup_transfer_period()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
			//print '<pre />';print_r($_POST);exit;
			$f_date = $this->input->post('from_date');
			$t_date = $this->input->post('to_date');
			
			if($f_date != ''){
			$sds = explode("-",$f_date);
			$from_date = $sds[2].'-'.$sds[1].'-'.$sds[0];
			}
			else{
				$from_date = "0000-00-00";
			}
			
			if($t_date != '') {
			$eds = explode("-",$t_date);
			$to_date = $eds[2].'-'.$eds[1].'-'.$eds[0];
			}
			else{
				$to_date = "0000-00-00";
			}
			$this->Supplier_Model->add_markup_transfer_period($from_date,$to_date);
			redirect('index/markup_transfer_period','refresh');
	}
	function update_tr_markup_period($id,$status)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		//echo $id.$status;exit;
		$this->Supplier_Model->update_tr_markup_period($id,$status);
		redirect('index/markup_transfer_period','refresh');
	}
	function view_tr_markup_details($transfer_markup_period_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		$data['car_markup'] =$this->Supplier_Model->get_tr_mark_up_all_details($transfer_markup_period_id);
		$data['transfer_markup_period_id']=$transfer_markup_period_id;
		$this->load->view('markup_master_transfer',$data);
	}
	function add_transfer_markup($transfer_markup_period_id)
	{
		$data['supp'] = $this->Supplier_Model->get_all_supplier_details();
			//$data['api'] = $this->admin_model->getAPIs();
		$data['car_type'] = $this->Supplier_Model->get_transfer_all_details();
		$this->load->view('add_transfer_markup',$data);
	}
	function add_tr_markup_details($transfer_markup_period_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
			//print '<pre />';print_r($_POST);exit;
			$sup_id = $this->input->post('sup_id');
			$sup_transfer_id = $this->input->post('sup_transfer_id');
			$markup = $this->input->post('markup');
			$this->Supplier_Model->add_tr_markup_details($transfer_markup_period_id,$sup_id,$sup_transfer_id,$markup);
			redirect('index/view_tr_markup_details/'.$transfer_markup_period_id, 'refresh'); 
			
	}
	function update_transfer_markup($transfer_markup_period_id,$id,$status)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$this->Supplier_Model->update_transfer_markup($id,$status);
		redirect('index/view_tr_markup_details/'.$transfer_markup_period_id,'refresh');
	}
	function edit_tr_markup_period($id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$data['car_period']=$this->Supplier_Model->get_tr_markup_period_details($id);
		$this->load->view('edit_tr_markup_period',$data);
	}
	function edit_tr_markup_period_details($id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
			$f_date = $this->input->post('from_date');
			$t_date = $this->input->post('to_date');
			//print '<pre />';print_r($_POST);exit;
			if($f_date != ''){
			$sds = explode("-",$f_date);
			$from_date = $sds[2].'-'.$sds[1].'-'.$sds[0];
			}
			else{
				$from_date = "0000-00-00";
			}
			
			if($t_date != '') {
			$eds = explode("-",$t_date);
			$to_date = $eds[2].'-'.$eds[1].'-'.$eds[0];
			}
			else{
				$to_date = "0000-00-00";
			}
			$this->Supplier_Model->edit_tr_markup_period_details($from_date,$to_date,$id);
			redirect('index/markup_transfer_period','refresh');
	}
	function notice_board_offers()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		$data['agent_list']=$this->admin_model->get_offers_list();
		$this->load->view('notice_board_offers',$data);
	}
	function post_new_offer()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$data['agent_det'] = $this->admin_model->manage_user1();
		$this->load->view('post_new_offer_view',$data);
	}
	function insert_new_offer()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
	   // print'<pre />';print_r($_POST);exit;
	    $agent_ids = $this->input->post('agent_id');
		$offer = htmlentities(trim($this->input->post('offer_content')));
		$updated = $offer;
	    $this->admin_model->insert_new_offer($agent_ids,$updated);
		
		redirect('index/notice_board_offers', 'refresh');
	
	}
	function edit_offer_status($offer_id,$status)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		$this->admin_model->edit_offer_status($offer_id,$status);
			
		redirect('index/notice_board_offers','refresh');
		
	}
	function edit_agent_offer($offer_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$data['edited_offer'] = $this->admin_model->get_agent_edited_offer($offer_id);
		$data['agent_det'] = $this->admin_model->manage_user1();
		$this->load->view('edit_new_offer_view',$data);
		
	}
	function update_agent_offer($id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		
		$offer = htmlentities(trim($this->input->post('offer_content')));
		$updated = $offer;
		
		//print '<pre />';print_r($offer);exit;
		
		$agent_ids = $this->input->post('agent_id');
		$data['news_list'] = $this->admin_model->update_agent_offer($agent_ids,$updated,$id);
		redirect('index/notice_board_offers', 'refresh');
	}
	function suplier_available_market()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$data['result'] = $this->admin_model->get_avialble_markets();
		$this->load->view('market_management',$data);
	}
	function update_market_management($id,$status)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$this->admin_model->update_market_management($id,$status);
		redirect('index/suplier_available_market', 'refresh');
		
	}
	function market_add_country($id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$data['countries'] = $this->admin_model->get_all_countries();
		$data['result'] = $this->admin_model->get_all_country_avialable($id);
		$this->load->view('market_add_country',$data);
		
	}
	function sup_market_country($id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$country_id=$this->input->post('country_id');
		$this->admin_model->add_sup_market_country($id,$country_id);
		redirect('index/market_add_country/'.$id, 'refresh');
	}
	function update_market_country($market_id,$id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$this->admin_model->update_market_country($id);
		redirect('index/market_add_country/'.$market_id, 'refresh');
	}
	
	// ----------------------- Marhaba Services ---------------------- //
	function marhaba()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		$data['result'] = $this->Supplier_Model->get_marhaba_details();
		$this->load->view('profile/marhaba',$data);
	}
	
	function marhaba_service()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		$this->load->view('profile/add_marhaba_service');
	}
	
	function add_desc_cate()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		$cate = $this->input->post('cate');
		$cate = addslashes($cate);
		$this->Supplier_Model->add_desc_cate($cate);
		redirect('index/marhaba_service','refresh');
	}
	
	function add_air_code()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$airport = $this->input->post('airport');
		$airport = addslashes($airport);
		$this->Supplier_Model->add_air_code($airport);
		redirect('index/marhaba_service','refresh');
	}
	
	function add_marhaba_services()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$this->form_validation->set_rules('description', 'Description', 'required');
		$this->form_validation->set_rules('nbr_of_pax', 'Nbr Of Pax', 'required'); 
		$this->form_validation->set_rules('corp_rates', 'Corp Rates', 'required');
		
		if($this->form_validation->run()==FALSE)
		{
			$this->load->view('profile/add_marhaba_services');
		}
			
			$desc_cate = $this->input->post('desc_cate');
			$airport_code = $this->input->post('airport_code');
			$description = $this->input->post('description');
			$nbr_of_pax = $this->input->post('nbr_of_pax');
			$corp_rates = $this->input->post('corp_rates');
			
			$this->Supplier_Model->add_marhaba_services($desc_cate, $airport_code, $description, $nbr_of_pax, $corp_rates);
			
			redirect('index/marhaba','refresh');
	}
	
	function edit_marhaba_service($id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		$data['marhaba_service'] = $this->Supplier_Model->view_marhaba_service($id);
		$data['id'] = $id;
		$this->load->view('profile/edit_marhaba_service',$data);
	}
	
	function update_marhaba_services($marhaba_services_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		$desc_cate = $this->input->post('desc_cate');
		$airport_code = $this->input->post('airport_code');
		$description = $this->input->post('description');
		$nbr_of_pax = $this->input->post('nbr_of_pax');
		$corp_rates = $this->input->post('corp_rates');
	
		$result =$this->Supplier_Model->update_marhaba_services($marhaba_services_id, $desc_cate, $airport_code, $description, $nbr_of_pax, $corp_rates);
		redirect('index/edit_marhaba_service/'.$marhaba_services_id,'refresh');
	}
	
	function update_marhaba_service_status($id,$status)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		$this->Supplier_Model->update_marhaba_service_status($id,$status);
		redirect('index/marhaba','refresh');
	}
	
	//-------------------- Markup for Meet and Greet Airport ------
	function markup_meetandgreet()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$data['result']=$this->Supplier_Model->get_marhaba_details();
		$this->load->view('markup_meetandgreet' ,$data);
	}
	public function view_marhaba_markup_details($marhaba_services_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$data['result'] = $this->Supplier_Model->get_marhaba_part_details($marhaba_services_id);
		$data['car_markup'] =$this->Supplier_Model->get_marhaba_mark_up_all_details($marhaba_services_id);
		$this->load->view('markup_master_marhaba',$data);
	}
	public function add_marhaba_markup($id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$data['supp'] = $this->Supplier_Model->get_all_supplier_details();
			//$data['api'] = $this->admin_model->getAPIs();
		
		$this->load->view('add_marhaba_markup',$data);
	}
	function add_marhaba_markup_details($marhaba_services_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
			//print '<pre />';print_r($_POST);exit;
			$sup_id = $this->input->post('sup_id');
			$markup = $this->input->post('markup');
			$this->Supplier_Model->add_marhaba_markup_details($marhaba_services_id,$sup_id,$markup);
			redirect('index/view_marhaba_markup_details/'.$marhaba_services_id, 'refresh'); 
			
	}
	function update_marhabha_markup($marhaba_services_id,$id,$status)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		$this->Supplier_Model->update_marhabha_markup($id,$status);
		redirect('index/view_marhaba_markup_details/'.$marhaba_services_id,'refresh');
	}


	function booking_list($supplier_id, $hotel_id)
	{
		$supplier_id = $supplier_id;
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

	public function view_booking_agent($agent_id){
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		 $data['api'] = $this->admin_model->getAPIs();
		 $data['countries'] = $this->admin_model->getCountries();
		
		 $data['result_view']=$this->admin_model->view_trans_detail_b2b_byID($agent_id);
		//  $data['result_view']=$this->admin_model->view_trans_detail();
		$this->load->view('b2b_reports',$data);
	}

	function booking_number($book_id)
	{
		
	   
		$data['result_view']=$this->admin_model->book_detail_view_voucher1($book_id);
		
		//print_r($data); die;
		$con_id = $data['result_view']->customer_contact_details_id;
		
		$data['contact_info']=$this->admin_model->contact_info_detail_update($con_id);
		$data['trans']=$this->admin_model->transation_detail_contact($book_id);
		print_r($data);
		$agent_id = $data['trans']->user_id;
		$data['agent_info'] = $this->admin_model->agentInfo($agent_id);
		
		$con_id_pass = $data['contact_info']->customer_info_details_id;
		$data['pass_info']=$this->admin_model->pass_info_detail($con_id_pass);
		
		
		$hotel_id = $data['result_view']->hotel_code;
	//	$data['hotel_details']=$this->B2b_Model->gethb_hoteldet($hotel_id);
		
		$data['hotel_decs']='';
		//echo "<pre/>";
		//print_r($data);exit;
		$this->load->view('voucher3',$data);
		 
	 }


	


	 
}
