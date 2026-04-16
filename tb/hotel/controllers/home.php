<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);
//$this->session->userdata('ip_address');
session_start();
class Home extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		
		
		$this->load->model('Account_Model');
		
	}
	
	public function index()
	{
		
		$this->load->view('myaccount');
	}
	function logout()
	{
		session_destroy();
		redirect('hotel/index','refresh');
		
	}
	
	function b2c_registration()
	{
		$data['exist']='';
		$this->load->view('account/b2c_registration',$data);
	}
	function my_account()
	{
		$id = $_SESSION['b2c_userid'];
		 $data['result_view']=$this->Account_Model->view_trans_detail($id);
		 $data['profile']=$this->Account_Model->user_login($id);
		
		$this->load->view('account/my_account',$data);
	}
	function b2c_my_booking($id)
	{
		 $data['result_view']=$this->Account_Model->view_trans_detail($id);
		
		$this->load->view('account/b2c_my_booking',$data);
	}

function terms()
	{
		$this->load->view('terms');
	}
	
function privacy()
	{
		$this->load->view('privacypolicy');
	}

   function forgotusername($email,$fname,$pass)
	{
	

		$username = $this->Ajax_Model->forgotusername($email,$fname,$pass);
	
		if($username == '')
		{
			echo "Invalided Email Address :".$username;
			exit;
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
			$msg.='<tr><td>Greetings From Provab,</td></tr>';
			$msg.= '<tr><td>&nbsp;</td></tr>';
			$msg.='<tr><td>Many thanks for your Interest and Submitting Online Customer Registration using '.$urlLocal.' </td></tr>
			<tr><td> <b>Your  login details are given below</b> </td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td> Username : '.$email.' </td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td> Password : '.$pass.' </td></tr>
			<tr><td>&nbsp;</td></tr>';
			$msg.='<tr><td>Thanking  you,</td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td> Registration  &amp; Sales Team,</td></tr>
			<tr><td><b> Provab </b></td></tr>';
			$msg.='<tr><td>&nbsp;</td></tr>';
			$msg.='</table></body></html>';
			
			$from = 'bookings@stayaway.com';
			$sub = 'Registration Acknowledgment StayAway ';
			$this->email->from($from,'StayAway');
			$to = strip_tags($email);
			$this->email->to($to);
			$this->email->subject($sub);
			$this->email->message($msg);


				if($this->email->send())
				{
				
						//redirect('customer/login_page','refresh');
						$email = $this->Account_Model->addEmail($to,$from,$sub,$msg,0,1);
						$data['resend'] = 'No';
						$data['emailId'] = $email;
						$this->load->view('account/registration_activation',$data);
						//$this->template->load('template', 'login');
				$data['exist'] ='';
				}
				else
				{
					show_error($this->email->print_debugger());
				}
							
	}
 function forgotpasswd($email)
	{
	
		$pass = $this->Account_Model->forgotpasswd($email);
		if($pass == '')
		{
			echo "Innvalided Email Address :".$pass;
			exit;
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
			$msg.='<tr><td>Greetings From Provab,</td></tr>';
			$msg.= '<tr><td>&nbsp;</td></tr>';
			$msg.='<tr><td>Many thanks for your Interest and Submitting Online Customer Registration using '.$urlLocal.' </td></tr>
			<tr><td> <b>Your  login details are given below</b> </td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td> Username : '.$email.' </td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td> Password : '.$pass.' </td></tr>
			<tr><td>&nbsp;</td></tr>';
			$msg.='<tr><td>Thanking  you,</td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td> Registration  &amp; Sales Team,</td></tr>
			<tr><td><b> Provab </b></td></tr>';
			$msg.='<tr><td>&nbsp;</td></tr>';
			$msg.='</table></body></html>';
			
			$from = 'bookings@stayaway.com';
			$sub = 'Registration Acknowledgment Provab ';
			$this->email->from($from,'Provab');
			$to = strip_tags($email);
			$this->email->to($to);
			$this->email->subject($sub);
			$this->email->message($msg);


				if($this->email->send())
				{
				
						//redirect('customer/login_page','refresh');
						$email = $this->Account_Model->addEmail($to,$from,$sub,$msg,0,1);
						$data['resend'] = 'No';
						$data['emailId'] = $email;
						$this->load->view('account/registration_activation',$data);
						//$this->template->load('template', 'login');
				$data['exist'] ='';
				}
				else
				{
					show_error($this->email->print_debugger());
				}
							
	}
	
	function mybooking($id)
	{
		
	 $data['result_view']=$this->Account_Model->view_trans_detail($id);
	 $this->load->view('account/mybooking',$data);
	}
	function view_booking($id)
	{
	 $data['result_view']=$this->Account_Model->view_trans_detail($id);
	}
	function login()
	{
		 $this->load->view('account/login');
	}
	function booking_search($from='',$to='',$book_id='')
	{
		
		$condition = '';
		 if($from!='')
		 {
			  $this->db->where('transaction_details.created_date >=',$from);
			
		 }
		 if($to!='')
		 {
			 $this->db->where('transaction_details.created_date <=',$to);
			
		 }
		 if($book_id!='')
		 {
			  $this->db->where('transaction_details.booking_number',$book_id);
		 }
		   $this->db->select('*');
    	   $this->db->from('transaction_details');
		   $this->db->where('transaction_details.user_id',$_SESSION['b2c_userid']);
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
	function sss()
	{
		$this->load->view('account/registration_activation');
	}
	function registration_process()
	{
		$this->form_validation->set_rules('fname', 'First Name', 'required');
		$this->form_validation->set_rules('mname', 'Middle Name', 'required');
		
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('pass', 'Password', 'required|matches[cpass]');
		$this->form_validation->set_rules('cpass', 'Confirm Password', 'required');
		$this->form_validation->set_rules('terms', 'Terms & Condition', 'required');
	
			if($this->form_validation->run()==FALSE)
		{
   
			 $data['exist'] = "";
			 $this->load->view('account/b2c_registration',$data);
		}
		else
		{
			$email = $_POST['email'];
			
		$Query="select * from  user  where email ='".$email."'";
	 
		 $query=$this->db->query($Query);
		
		if ($query->num_rows() > 0)
		{
			$data['exist'] = "Your EmailID Already Registered.";
				$this->load->view('account/b2c_registration',$data);
		}
		else
		{
	   $fname = $this->input->post('fname');
	   $username = $this->input->post('username');
	   $mname = $this->input->post('mname');
	   $sname = '';
	   $email = $this->input->post('email');
	   $pass = $this->input->post('pass');
	   $country = '';
       $newsletter = '';
            
            $portal_id = '';
			
			$custid = $this->Account_Model->add_customer($username,$fname,$mname,$sname,$email,$pass,$country,3,$newsletter,$portal_id);
			
				
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
			$msg.='<tr><td>Greetings From StayAway.com,</td></tr>';
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
			<tr><td><b> Team - StayAway.com </b></td></tr>';
			$msg.='<tr><td>&nbsp;</td></tr>';
			$msg.='</table></body></html>';
			
			$from = 'bookings@stayaway.com';
			$sub = 'User Registration - StayAway.com ';
			$this->email->from($from,'StayAway');
			$to = strip_tags($email);
			$this->email->to($to);
			$this->email->subject($sub);
			$this->email->message($msg);


				if($this->email->send())
				{
				
						//redirect('customer/login_page','refresh');
						$email = $this->Account_Model->addEmail($to,$from,$sub,$msg,0,1);
						$data['resend'] = 'No';
						$data['emailId'] = $email;
						$this->load->view('account/registration_activation',$data);
						//$this->template->load('template', 'login');
				$data['exist'] ='';
				}
				else
				{
					show_error($this->email->print_debugger());
				}
			}
			else
			{
				$data['exist'] = "Your EmailID Already Registered.";
				$this->load->view('account/b2c_registration',$data);
			}
		}
		}
	}
	function resend_registration_mail()
	{
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
		$arrResult = $this->Account_Model->getEmail($id);
		$this->email->from($arrResult[0]->from,'StayAway');
		$this->email->to($arrResult[0]->to);
		$this->email->subject($arrResult[0]->subject);
		$this->email->message($arrResult[0]->content);
		$this->email->send();
		$data['emailId'] = $id;
		$data['resend'] = 'Yes';
		$this->load->view('account/registration_activation',$data);
	}

function user_login()
{
   		$this->form_validation->set_rules('pass', 'pass', 'required');
		$this->form_validation->set_rules('email', 'email', 'required|valid_email');
		if($this->form_validation->run()==FALSE)
		{
   
			 $data['status'] = "";
			 $this->load->view('account/login_page',$data);
		}
		else
		{
		
			 $email = $this->input->post('email');
			 $pass = $this->input->post('pass');
			
			 $userValied = $this->Account_Model->check_cust_login($email,$pass);
		
			 if($userValied)
			 {
				// print_r($this->session->userdata); exit;
				  // $this->session->set_userdata(array('custid'=>$custid->cust_uniqu_id));
			  $this->load->view('hotel_index');
			 }
			 else
			 {
				 
				 $data['status'] = "Your account has not been ready to activate &nbsp;";
				 
				 $this->load->view('account/login_page',$data);
			 }
		}
	
}
function forget_pass()
{
	
		$this->form_validation->set_rules('useremail', 'useremail', 'required|valid_email');
		if($this->form_validation->run()==FALSE)
		{
   
			 $data['status'] = "";
			 $this->load->view('account/login_page',$data);
		}
		else
		{
			$email = $_POST['useremail'];
			
		$Query="select * from  user  where email ='".$email."'  AND status = 1";
	 
		 $query=$this->db->query($Query);
		
		if ($query->num_rows() > 0)
		{
			 foreach ($query->result() as $row)
		   {
			 
                   $fname  = $row->first_name;
				   $email  = $row->email;
				   $pass  = $row->password;
			  
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
			$msg.='<tr><td>Greetings From Provab,</td></tr>';
			$msg.= '<tr><td>&nbsp;</td></tr>';
			$msg.='
			<tr><td> <b>Your  login details are given below</b> </td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td> Username : '.$email.' </td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td> Password : '.$pass.' </td></tr>
			<tr><td>&nbsp;</td></tr>';
			$msg.='<tr><td>Thanking  you,</td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td> Registration  &amp; Sales Team,</td></tr>
			<tr><td><b> Provab </b></td></tr>';
			$msg.='<tr><td>&nbsp;</td></tr>';
			$msg.='</table></body></html>';
			
			$from = 'bookings@stayaway.com';
			$sub = 'Registration Acknowledgment Provab ';
			$this->email->from($from,'Provab');
			$to = strip_tags($email);
			$this->email->to($to);
			$this->email->subject($sub);
			$this->email->message($msg);


				if($this->email->send())
				{
			  	 $data['status'] = "Your Password has been sent your EMIL ID. &nbsp;";
			     $this->load->view('account/login_page',$data);
						//redirect('customer/login_page','refresh');
						
				}
				else
				{
					$data['status'] = "Your Password has not been sent your EMIL ID. &nbsp;";
			     $this->load->view('account/login_page',$data);
				}
		}
		else
		{
			 $data['status'] = "Your account has been deactive. &nbsp;";
			 $this->load->view('account/login_page',$data);
				
		}
			
		}
}
function check_cust_login($email,$password)
	{		
		
		$Query="select * from  user  where email ='".$email."' AND password  ='".md5($password)."' AND status = 1";
	 
		 $query=$this->db->query($Query);
		// echo $this->db->last_query(); exit;
		if ($query->num_rows() > 0)
		{
		   foreach ($query->result() as $row)
		   {
			  $newdata = array(
                   'first_name'  => $row->first_name,
				   'userid'  => $row->user_id,
				   'last_name'  => $row->last_name,
                   'email'     => $row->email,
				   'user_name' => $row->user_name,
                   'logged_in' => TRUE
               );

				$this->session->set_userdata($newdata);
			  
		   }
		   return true;
		   
		} 
		else
		{
			return false;
		}
	}
	function login_page($code = null,$id = null)
	{
		if(isset($_SESSION['custid']))
	  	{
		  $this->load->view('account/my_account');
   		}

		$data['status'] = "";
		
		//print_r($code);exit;
		if($code != null && $id > 0)
		{
          
		  $status = $this->Account_Model->checkCodeValidation($id,$code);
                  
		  if($status == 0)
		  {
		  		$data['status'] = "Activation code has been expired";
		  }elseif($status == 3)
		  {
		  	$data['status'] = "Your account already activated";
		  }
		}
	
		//$this->load->view('login');
		redirect('home/user_login','refresh');
//	$this->load->view('account/login_page',$data);
	}
}
