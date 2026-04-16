<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); error_reporting('E_ALL ^ E_NOTICE');
session_start();
class B2b extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		//$this->load->model('Hotel_Model');
		$this->load->model('B2b_Model');
		$this->load->model('B2b_Hotel_Model');
		$this->load->library('session');
		$this->load->helper(array('url', 'form', 'date'));
	}
	public function backtosearch()
{

		$this->load->view('b2b/hotel/search_result');
		
}
function view_ticket($id)
{
		if (!$this->session->userdata('agent_logged_in') && !$this->session->userdata('staff_logged_in')) {
			redirect('b2b/login', 'refresh'); 
		}
		$data['agent_list'] = $this->B2b_Model->getsupportinfo_details($id);
		$data['message'] = $this->B2b_Model->getsupportinfo_details_msg($id);

		$this->load->view('b2b/view_ticket',$data);
	
}
function update_ticket()
	{
		if (!$this->session->userdata('agent_logged_in') && !$this->session->userdata('staff_logged_in')) {
			redirect('b2b/login', 'refresh'); 
		}
		
		$message = $_POST['message'];
		$agent_id = $_POST['agent_id'];
		$ticket_id = $_POST['ticket_id'];
		
		$this->B2b_Model->update_ticket_agent($agent_id,$ticket_id,$message);
		redirect('b2b/view_ticket/'.$ticket_id ,'refresh');
	}
	
	 function support_ticket()
	{
	
		if (!$this->session->userdata('agent_logged_in') && !$this->session->userdata('staff_logged_in')) {
			redirect('b2b/login', 'refresh'); 
		}
		
		$agent_id = $this->session->userdata('agent_id');
		
		//print_r($_POST);
		
		//$this->load->view('b2b/my_booking');
		
		$agent_id = $this->session->userdata('agent_id');
		$agent_type = $this->session->userdata('agent_type');
		
		
		
		$booking_type = $this->input->post('booking_type');
		
		$branch_id = $this->session->userdata('branch_id');
					
			 $data['result_b'] = $this->B2b_Model->search_branch_booking_details($booking_number='', $passenger_name='', $booking_status='', $sel_date_type='', $fdate='', $todate='', $agent_id);
			
		
			 $data['result'] = $this->B2b_Model->search_my_booking_details($booking_number='', $passenger_name='', $booking_status='', $sel_date_type='', $fdate='',$todate='',$agent_id,$branch_id 	);
			
			 $data['result_p'] = $this->B2b_Model->search_tickets_p($agent_id,'Pending');
			// $data['result_h'] = $this->B2b_Model->search_tickets_p($agent_id,'On Hold');
			 $data['result_c'] = $this->B2b_Model->search_tickets_c($agent_id,'Closed');
			
		
			
			
			//echo '<pre/>';
			//print_r($data);exit;
				 $this->load->view('b2b/ticket',$data);
	
	}
	function close_ticket($id)
	{
		if (!$this->session->userdata('agent_logged_in')) {
			redirect('b2b/login', 'refresh'); 
		}
		$data = array(
			'status' => 'Closed',
			'process' => 'Agent',
			'order' => 1
			
			);
			
		$where = "ticket_id = $id";
		$this->db->update('support_ticket', $data, $where);
		redirect('b2b/support_ticket','refresh');
	}
	function new_ticket()
	{
		if (!$this->session->userdata('agent_logged_in')) {
			redirect('b2b/login', 'refresh'); 
		}
		
		$this->form_validation->set_rules('subject', 'Subject', 'required');
		$this->form_validation->set_rules('message', 'message', 'required');
		$agent_id = $this->session->userdata('agent_id');
		
		if($this->form_validation->run()==FALSE)
		{
			redirect('b2b/support_ticket','refresh');
		}
		else
		{
		
		   $catacery = $this->input->post('catacery');
		   $subject = $this->input->post('subject');
		   $res_no = $this->input->post('res_no');
		   $message = $this->input->post('message');
		   
		   if ($this->B2b_Model->add_ticket($agent_id, $catacery, $subject, $res_no, $message)) 
		   {
			 //$data['emailId'] = $email;
			 redirect('b2b/support_ticket', 'refresh');
				
			}
			else
			{
				$data['exist'] = "Error data inserting.";
			   redirect('b2b/support_ticket', 'refresh');
			}
		}
		
	}
	 function b2b_index()
	{
		$this->load->view('b2b/b2b_index');
	}
	function test_mail()
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
				$msg='';
				$msg.='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>

<body><table width="100%" border="0" cellspacing="6" cellpadding="6">
  <tr>
    <td>Dear ruby,<br />
bangalore, India</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Greetings From StayAway,</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><p>Many thanks for your Interest and Submitting Online Agent Registration using http://www.StayAway.com.
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
          <td>Please do not hesitate to contact us on <strong>info@stayaway.com</strong> for all your Urgent Queries / Reservation or Requirements.</td>
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
                  <td>Registration &amp; StayAway Team,</td>
                </tr>
                <tr>
                  <td><strong>StayAway.com</strong></td>
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
				
				
				$from = 'ruby.provab@gmail.com';
				$sub = 'Agent Registration Acknowledgment - StayAway.com ';
				$this->email->from($from,'StayAway.com');
				$to = strip_tags($from);
				$this->email->to($to);
				$this->email->subject($sub);
				$this->email->message($msg);


$this->email->send();
	}
	function login()
	{
		$newdata = array(
            'currency_value'  => 1,
			'currency'  => 'USD'
        );
		$this->session->set_userdata($newdata);
		
		if ($this->session->userdata('agent_logged_in') || $this->session->userdata('staff_logged_in')) {
			redirect('b2b/agent_page', 'refresh'); 
		} else {
			$this->load->view('b2b/login_page');
		}
		
		
	}
	
	function registration_process()
	{
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('company_name', 'Company Name', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		
		$this->form_validation->set_rules('country', 'Country', 'required');
		$this->form_validation->set_rules('city', 'City', 'required');
		$this->form_validation->set_rules('postal_code', 'Zip Code', 'required');
		//$this->form_validation->set_rules('office_phone', 'Office Phone', 'required');
		
		$this->form_validation->set_rules('mobile_no', 'Mobile', 'required');
		$this->form_validation->set_rules('currency', 'Currency', 'required');
		
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[agent.email_id]');
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
		   
		   
			 $this->load->view('b2b/login_page',$data);
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
		   
		   
			
			if ($this->B2b_Model->add_agent($name, $company_name, $address, $country, $city, $postal_code, $office_phone, $mobile_no,$currency, $email, $password)) {
			
				
		  
			  //$newdata = array('userid'=> $custid,'username'=>$fname,'lastname'=>$sname,'email'=>$email,'logged_in' => TRUE);
			  //$this->session->set_userdata($newdata);
				  
			
				  
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
    <td>Greetings From StayAway,</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><p>Many thanks for your Interest and Submitting Online Agent Registration using StayAway.com.
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
          <td>Please do not hesitate to contact us on <font color="#00CC33">info@stayaway.com</font> for all your Urgent Queries / Reservation or Requirements.</td>
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
                  <td>Registration &amp; StayAway Team,</td>
                </tr>
                <tr>
                  <td><strong>StayAway.com</strong></td>
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
				
				
				$from = 'bookings@stayaway.com';
				$sub = 'Agent Registration Acknowledgment - StayAway.com ';
				$this->email->from($from,'Admin - StayAway.com');
				$to = strip_tags($email);
				$this->email->to($to);
				$this->email->subject($sub);
				$this->email->message($msg);



				if($this->email->send())
				{
				
					//$data['emailId'] = $email;
					$this->load->view('b2b/registration_conformation');
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
				$this->load->view('b2b/login_page',$data);
			}
		//}
		}
	}
	
	public function index()
	{
		
		$sec_res = session_id();
		$_SESSION['ses_id'] = $sec_res;
		//$this->load->view('hotel_index');
		if ($this->session->userdata('agent_logged_in') || $this->session->userdata('staff_logged_in')) {
			redirect('index/agent_page', 'refresh'); 
		} else {
			redirect('index/login', 'refresh'); 
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

			 $this->load->view('b2b/login_page',$data);
		}
		else
		{
		
			 $email = $this->input->post('login_email');
			 $pass = $this->input->post('login_password');
			
			 $userValied = $this->B2b_Model->check_agent_login($email, $pass);
		
			 if($userValied)
			 {
				/*if ($this->session->userdata('agent_type') == 1) {
					redirect('/b2b/agent_page', 'refresh');
				} else {
					redirect('/b2b/my_booking', 'refresh');
				}*/
				redirect('/b2b/agent_page', 'refresh');
				
			 }
			 else
			 {
				 
				 $data['status'] = "Invalid Email ID/Password";
				 
				 $this->load->view('b2b/login_page',$data);
			 }
		}
	
	}
	function check_date_valued($end, $start, $valu)
    {

        //echo $start ;
        list($sday, $smonth, $syear) = explode('-', $start);
        $start_year = $syear . "-" . $smonth . "-" . $sday;

        list($eday, $emonth, $eyear) = explode('-', $end);
        $e_year = $eyear . "-" . $emonth . "-" . $eday;
        //$val="SELECT DATEDIFF('$e_year','$start_year') as date_diff";

        $val = "SELECT DATE_ADD('$start_year', INTERVAL '$valu' DAY) as date_int";
        $result = mysql_query($val);
        while ($row = mysql_fetch_array($result))
        {
            $date = $row['date_int'];
        }

        list($mday, $mmonth, $myear) = explode('-', $date);
       // echo $dat_dis = $myear . "-" . $mmonth . "-" . $mday;
		echo '<input  value="'.$dat_dis = $myear . "-" . $mmonth . "-" . $mday.'" name="ed" id="datepicker1" onchange="javascript:return check_night_valued(this.value)"   type="text" class="b2b-txtbox" /><img border="0" class="b2b-cal" src="'.WEB_DIR.'images/b2b-calicon.png">';
    }

    function check_date($end, $start)
    {

        //echo $start ;
        list($sday, $smonth, $syear) = explode('-', $start);
        $start_year = $syear . "-" . $smonth . "-" . $sday;

        list($eday, $emonth, $eyear) = explode('-', $end);
        $e_year = $eyear . "-" . $emonth . "-" . $eday;
        $val = "SELECT DATEDIFF('$e_year','$start_year') as date_diff";
        $result = mysql_query($val);
        while ($row = mysql_fetch_array($result))
        {
            $date = $row['date_diff'];
        }
        if ($date > 30)
        {

            echo "1";
        }
        else
        {
            ?>
            <select name="night" style="width:50px"  class="b2b-txtbox-lis" onchange="javascript:return  check_date_valued(this.value);">

                <option value="1" <?php
            if ($date == 1)
            {
                ?> selected="selected" <?php } ?>>1</option>
                <option value="2" <?php
            if ($date == 2)
            {
                ?> selected="selected" <?php } ?>>2</option>
                <option value="3" <?php
            if ($date == 3)
            {
                ?> selected="selected" <?php } ?>>3</option>
                <option value="4" <?php
            if ($date == 4)
            {
                ?> selected="selected" <?php } ?>>4</option>
                <option value="5" <?php
            if ($date == 5)
            {
                ?> selected="selected" <?php } ?>>5</option>
                <option value="6" <?php
            if ($date == 6)
            {
                ?> selected="selected" <?php } ?>>6</option>
                <option value="7" <?php
            if ($date == 7)
            {
                ?> selected="selected" <?php } ?>>7</option>
                <option value="8" <?php
            if ($date == 8)
            {
                ?> selected="selected" <?php } ?>>8</option>
                <option value="9" <?php
            if ($date == 9)
            {
                ?> selected="selected" <?php } ?>>9</option>
                <option value="10" <?php
            if ($date == 10)
            {
                ?> selected="selected" <?php } ?>>10</option>

                <option value="11" <?php
            if ($date == 11)
            {
                ?> selected="selected" <?php } ?>>11</option>
                <option value="12" <?php
            if ($date == 12)
            {
                ?> selected="selected" <?php } ?>>12</option>
                <option value="13" <?php
            if ($date == 13)
            {
                ?> selected="selected" <?php } ?>>13</option>
                <option value="14" <?php
            if ($date == 14)
            {
                ?> selected="selected" <?php } ?>>14</option>
                <option value="15" <?php
            if ($date == 15)
            {
                ?> selected="selected" <?php } ?>>15</option>
                <option value="16" <?php
            if ($date == 16)
            {
                ?> selected="selected" <?php } ?>>16</option>
                <option value="17" <?php
            if ($date == 17)
            {
                ?> selected="selected" <?php } ?>>17</option>
                <option value="18" <?php
            if ($date == 18)
            {
                ?> selected="selected" <?php } ?>>18</option>
                <option value="19" <?php
            if ($date == 19)
            {
                ?> selected="selected" <?php } ?>>19</option>
                <option value="20" <?php
            if ($date == 20)
            {
                ?> selected="selected" <?php } ?>>20</option>

                <option value="21" <?php
            if ($date == 21)
            {
                ?> selected="selected" <?php } ?>>21</option>
                <option value="22" <?php
            if ($date == 21)
            {
                ?> selected="selected" <?php } ?>>22</option>
                <option value="23" <?php
            if ($date == 23)
            {
                ?> selected="selected" <?php } ?>>23</option>
                <option value="24" <?php
            if ($date == 24)
            {
                ?> selected="selected" <?php } ?>>24</option>
                <option value="25" <?php
            if ($date == 25)
            {
                ?> selected="selected" <?php } ?>>25</option>
                <option value="26" <?php
            if ($date == 26)
            {
                ?> selected="selected" <?php } ?>>26</option>
                <option value="27" <?php
            if ($date == 27)
            {
                ?> selected="selected" <?php } ?>>27</option>
                <option value="28" <?php
            if ($date == 28)
            {
                ?> selected="selected" <?php } ?>>28</option>
                <option value="29" <?php
            if ($date == 29)
            {
                ?> selected="selected" <?php } ?>>29</option>
                <option value="30" <?php
            if ($date == 30)
            {
                ?> selected="selected" <?php } ?>>30</option>
            </select>
            <?php
        }
    }
	function my_favourite()
	{
		$data['result'] = $this->B2b_Hotel_Model->get_my_fav();
		$data['result1'] = $this->B2b_Hotel_Model->get_my_fav1();
		
		 $this->load->view('b2b/my_fav',$data);
	}
	function my_favourite_result($iddd)
	{
		// $iddd;
		//$data['result'] = $this->B2b_Hotel_Model->get_my_fav();
		$result1 = $this->B2b_Hotel_Model->get_my_fav2($iddd);
		
	echo '<table width="100%" border="0" cellspacing="3" cellpadding="8">
  <tr>
    <td bgcolor="#CCCCCC">No</td>
    <td bgcolor="#CCCCCC">City</td>
    <td bgcolor="#CCCCCC">Hotel Code</td>
    <td bgcolor="#CCCCCC">Hotel Name</td>
    <td bgcolor="#CCCCCC">Star</td>
    <td bgcolor="#CCCCCC">Creation Date</td>
    <td bgcolor="#CCCCCC">Delete</td>
  </tr>';
   
	for($i=0;$i<count($result1);$i++)
	{
	
echo '  <tr>
  <td bgcolor="#F5F5F5">'.($i+1).'</td>
    <td bgcolor="#F5F5F5"><a href="'.WEB_URL.'b2b_hotel/fav_search/'.$result1[$i]->fav_id.'">'.$result1[$i]->city.'</a></td>
    <td bgcolor="#F5F5F5">'.$result1[$i]->hotel_code.'</td>
    <td bgcolor="#F5F5F5">'.$result1[$i]->hotel_name.'</td>
    <td bgcolor="#F5F5F5">'.$result1[$i]->star.'</td>
    <td bgcolor="#F5F5F5">'.$result1[$i]->register_date.'</td>
    
    <td bgcolor="#F5F5F5"><a href="javascript:delete_fac_sorting('.$result1[$i]->fav_id.');">Delete</a></td>
  </tr>
  
  ';
	}
	
  
echo '</table>';
	}
	function delete_faav($idddf)
	{
		$result16 = $this->B2b_Hotel_Model->get_my_fav3($idddf);
		//echo $result16;exit;
		$this->db->where('fav_id',$idddf);	
		$this->db->delete('my_fav');
		$result1 = $this->B2b_Hotel_Model->get_my_fav4($result16);
		
	echo '<table width="100%" border="0" cellspacing="3" cellpadding="8">
  <tr>
    <td bgcolor="#CCCCCC">No</td>
    <td bgcolor="#CCCCCC">City</td>
    <td bgcolor="#CCCCCC">Hotel Code</td>
    <td bgcolor="#CCCCCC">Hotel Name</td>
    <td bgcolor="#CCCCCC">Star</td>
    <td bgcolor="#CCCCCC">Creation Date</td>
    <td bgcolor="#CCCCCC">Delete</td>
  </tr>';
   
	for($i=0;$i<count($result1);$i++)
	{
	
echo '  <tr>
  <td bgcolor="#F5F5F5">'.($i+1).'</td>
    <td bgcolor="#F5F5F5"><a href="'.WEB_URL.'b2b_hotel/fav_search/'.$result1[$i]->fav_id.'">'.$result1[$i]->city.'</a></td>
    <td bgcolor="#F5F5F5">'.$result1[$i]->hotel_code.'</td>
    <td bgcolor="#F5F5F5">'.$result1[$i]->hotel_name.'</td>
    <td bgcolor="#F5F5F5">'.$result1[$i]->star.'</td>
    <td bgcolor="#F5F5F5">'.$result1[$i]->register_date.'</td>
    
    <td bgcolor="#F5F5F5">
	<a href="javascript:delete_fac_sorting('.$result1[$i]->fav_id.');">Delete</a></td>
  </tr>
  
  ';
	}
	
  
echo '</table>';
		
	}
	
	function agent_page()
	{
		if (!$this->session->userdata('agent_logged_in') && !$this->session->userdata('staff_logged_in')) {
			redirect('b2b/login', 'refresh'); 
		}
		
		//echo '<pre/>';
		//print'<pre>';print_r($this->session->userdata);exit;
		$data = array();
		
		$agent_id = $this->session->userdata('agent_id');	
		$agent_type = $this->session->userdata('agent_type');	
		$branch_id = $this->session->userdata('branch_id');	
		if ($agent_type == 2) {
			$agent_acc_info = $this->B2b_Model->getAgentAccInfo($agent_id);
			
			if (!empty($agent_acc_info)) {
				$data['balance_credit'] = $agent_acc_info->balance_credit;
				$data['last_credit'] = $agent_acc_info->last_credit;
			}
		}
		
		$branch_acc_info = $this->B2b_Model->getBranchAccInfo($agent_id, $branch_id);
		//echo '<pre/>';
		//print_r($branch_acc_info);exit;
		if (!empty($branch_acc_info)) {
			if (count($branch_acc_info) == 1) {
					$branch_acc_info = (array) $branch_acc_info;
				}
				$data['branch_acc_info'] = $branch_acc_info;
		}
		
		$parent_agent = 0;
		//if (!empty($agent_id)) {
		if ($agent_type == 2) {
			$parent_agent = $agent_id;
		} else {
			$parent_agent = $agent_id = $this->session->userdata('parent_id');
		}
		$data['agent_offers'] = $this->B2b_Model->get_agent_offer($this->session->userdata('agent_id'));
		$data['agentTopCities'] = $this->B2b_Model->getAgentTopCities($parent_agent);
		$data['news_list'] = $this->B2b_Model->get_agent_newsinfo();
		//print'<pre>';print_r($data);exit;
		$this->load->view('b2b/b2b_index', $data);
	}
	
	public function search()
	{
	 
	   //print'<pre>';print_r($_POST);
		
	    $this->form_validation->set_rules('cityval', 'City Name', 'required');
		
		if($this->form_validation->run()==FALSE)
		{
			  
			$this->load->view('b2b/b2b_index');
		}
		else
		{
			
			
		if(isset($_POST['cityval']))
		{
		 
		if(isset($_SESSION['city']))
		{
				
		if($_SESSION['city'] == $_POST['cityval'] && $_SESSION['sd'] == $_POST['sd'] && $_SESSION['ed'] == $_POST['ed'] && $_SESSION['room_count'] == $_POST['room_count'] && $_SESSION['org_adult'] == $_POST['adult'])
		{
			$_SESSION['hashing_activate'] = 1;
		}
		else
		{
			$_SESSION['hashing_activate'] = '';
			$_SESSION['fav_hotel_detail']='';
			$this->B2b_Hotel_Model->delete_gta_temp_result($_SESSION['ses_id']);
		}
		}
		else
		{
			$_SESSION['hashing_activate'] = '';
			$this->B2b_Hotel_Model->delete_gta_temp_result($_SESSION['ses_id']);
		}
		$_SESSION['city'] = $_POST['cityval'];
		
		$_SESSION['sd'] = $_POST['sd'];
		$_SESSION['ed'] = $_POST['ed'];
		$_SESSION['room_count'] = $_POST['room_count'];
		$adultval = $_POST['adult'];
		$childval = $_POST['child'];
				$diff = strtotime($_POST['ed']) - strtotime($_POST['sd']);

			$sec   = $diff % 60;
			$diff  = intval($diff / 60);
			$min   = $diff % 60;
			$diff  = intval($diff / 60);
			$hours = $diff % 24;
			$days  = intval($diff / 24);
			$_SESSION['days']=$days;
		$room_used_type=array();
		$adult_count=0;
		$child_count=0;
		for($i=0;$i< $_POST['room_count'];$i++)
		{
			
			if($adultval[$i]==1 && $childval[$i]==0)
			{
				$room_used_type[] = 'sb';
				$adult_count = $adult_count + 1;
				$child_count = $child_count + 0;
    		}
			if($adultval[$i]==1 && $childval[$i]==1)
			{
				$room_used_type[] = 'db';
				$adult_count = $adult_count + 2;
				$child_count = $child_count + 0;
    		}
			if($adultval[$i]==1 && $childval[$i]==2)
			{
				$room_used_type[] = 'tr';
				$adult_count = $adult_count + 3;
				$child_count = $child_count + 0;
    		}
			if($adultval[$i]==1 && $childval[$i]==3)
			{
				$room_used_type[] = 'qu';
				$adult_count = $adult_count + 4;
				$child_count = $child_count + 0;
    		}
			if($adultval[$i]==2 && $childval[$i]==0)
			{
				
				$room_used_type[] = 'db';
				$adult_count = $adult_count + 2;
				$child_count = $child_count + 0;
    		}
			if($adultval[$i]==3 && $childval[$i]==0)
			{
				$room_used_type[] = 'tr';
				$adult_count = $adult_count + 3;
				$child_count = $child_count + 0;
    		}
			if($adultval[$i]==3 && $childval[$i]==1)
			{
				$room_used_type[] = 'qu';
				$adult_count = $adult_count + 4;
				$child_count = $child_count + 0;
    		}
			if($adultval[$i]==4 && $childval[$i]==0)
			{
				$room_used_type[] = 'qu';
				$adult_count = $adult_count + 4;
				$child_count = $child_count + 0;
    		}
			if($adultval[$i]==2 && $childval[$i]==1)
			{
				$room_used_type[] = 'dbc';
				$adult_count = $adult_count + 2;
				$child_count = $child_count + 1;
    		}
			if($adultval[$i]==2 && $childval[$i]==2)
			{
				$room_used_type[] = 'dbcc';
				$adult_count = $adult_count + 2;
				$child_count = $child_count + 2;
    		}
		}
	
		$_SESSION['room_used_type'] = $room_used_type;
		$_SESSION['adult_count'] = $adult_count;
		$_SESSION['child_count'] = $child_count;
		$_SESSION['org_adult'] = $_POST['adult'];
		$_SESSION['org_count'] = $_POST['child'];
		$_SESSION['child_age'] = $_POST['child_age'];
		$_SESSION['infant'] = $_POST['infant'];
	   
		$this->load->view('b2b/hotel/search_result');
		}
		else
		{
			$this->load->view('b2b/b2b_index');
		}
		}
	}
	
	function call_api($api)
	{
		
		$apiarray = array();
		switch ($api)
		 {
				case 'gta':
				$this->gta_hotel_availabilty();
				break;
				
				case 'hotelsbed':
			    $this->hotelsbed_hotel_availabilty();
				break;
				
				case 'hotelspro':
			    $this->hotelspro_hotel_availabilty();
				break;
				
				case 'hotelsbed_pre':
			    $this->hotelsbed_hotel_availabilty_pre();
				break;
				
				default:
				echo '';
		}
			$this->fetch_search_result();
	

	}
	
	function gta_hotel_availabilty()
	{
		
		$room_used_type=$_SESSION['room_used_type'];
		$city=$_SESSION['city'];
		$sd=$_SESSION['sd'];
		$room_count=$_SESSION['room_count'];
		$ed=$_SESSION['ed'];
		$city_val = $this->B2b_Hotel_Model->get_city_code($city);  
		$city_code = $city_val->gta;
		
		$cinval = explode("-",$sd);
		$cin = $cinval[2].'-'.$cinval[1].'-'.$cinval[0];
		$coutval = explode("-",$ed);
		$cout = $coutval[2].'-'.$coutval[1].'-'.$coutval[0];
			$sb_room_cnt =0;
		$db_room_cnt =0;
		$tb_room_cnt =0;
		$q_room_cnt =0;
		$dbc_room_cnt =0;
		$dbcc_room_cnt =0;
$room1='';
$hotelbed_rooms='';
		for($k=0;$k< $room_count;$k++)
		{
			if($room_used_type[$k]=='sb')
			{
				$sb_room_cnt =$sb_room_cnt + 1;
			}
			if($room_used_type[$k]=='db')
			{
				$db_room_cnt =$db_room_cnt + 1;
			}
			if($room_used_type[$k]=='dbc')
			{
				$dbc_room_cnt =$dbc_room_cnt + 1;
			}
			if($room_used_type[$k]=='dbcc')
			{
				$dbcc_room_cnt =$dbcc_room_cnt + 1;
			}
			if($room_used_type[$k]=='tr')
			{
				$tb_room_cnt =$tb_room_cnt + 1;
			}
			if($room_used_type[$k]=='qu')
			{
				$q_room_cnt =$q_room_cnt + 1;
			}

		}
		if($sb_room_cnt > 0)
			{
				$roomCode = 'SB';
				$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$sb_room_cnt.'"></Room>';

			}
			if($db_room_cnt > 0)
			{
				$roomCode = 'DB'; //'db';
				$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$db_room_cnt.'"></Room>';
			}
			if($q_room_cnt > 0)
			{
				$roomCode = 'Q'; //'db';
				$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$q_room_cnt.'"></Room>';
			}

			if($tb_room_cnt > 0)
			{
				$roomCode = 'TR'; //'db';
				$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$tb_room_cnt.'"></Room>';
			}
			if($dbc_room_cnt > 0)
			{
				$roomCode = 'DB'; //'db';
				if($dbc_room_cnt=='2')
				{
					$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$dbc_room_cnt.'">
								<ExtraBeds>
									<Age>5</Age>
									<Age>7</Age>
								</ExtraBeds>

							</Room>';
				}else if($dbc_room_cnt=='3'){
					$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$dbc_room_cnt.'">
								<ExtraBeds>
									<Age>5</Age>
									<Age>7</Age>
									<Age>5</Age>
								</ExtraBeds>

							</Room>';
					}
					else
					{
						$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$dbc_room_cnt.'">
								<ExtraBeds>
									<Age>5</Age>
								</ExtraBeds></Room>';
					}

			}
			if($dbcc_room_cnt > 0)
			{
			$roomCode = 'DB'; //'db';

				if($dbcc_room_cnt == '2')
				{
					$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$dbcc_room_cnt.'">
                                  <ExtraBeds>
									<Age>5</Age>
									<Age>7</Age>
									<Age>5</Age>
									<Age>3</Age>
								  </ExtraBeds>

							</Room>';
				}else if($dbcc_room_cnt == '3'){
					$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$dbcc_room_cnt.'">
								<ExtraBeds>
									<Age>5</Age>
									<Age>7</Age>
									<Age>5</Age>
									<Age>3</Age>
									<Age>5</Age>
									<Age>3</Age>
								</ExtraBeds>

							</Room>';
					}
					else if($dbcc_room_cnt == '1')
					{
						$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$dbcc_room_cnt.'">
<ExtraBeds>
									
									<Age>5</Age>
									<Age>3</Age>
								</ExtraBeds>
							</Room>';
					}
			}

			

			$roomtype[]=$roomCode;

		$client = 1184;
		$email = 'XML.PROVAB@ITRAVELUKRAINE.COM';
		$pass = 'PASS';
		$request = '<?xml version="1.0" encoding="UTF-8" ?>
		<Request>
		<Source>
			<RequestorID Client="'.$client.'" EMailAddress="'.$email.'" Password="'.$pass.'" />
				<RequestorPreferences Language="en" Currency="USD">
					<RequestMode>SYNCHRONOUS</RequestMode>
				</RequestorPreferences>
		</Source>
		<RequestDetails>
			<SearchHotelPriceRequest><ItemDestination DestinationType="city" DestinationCode="'.$city_code.'" /><ImmediateConfirmationOnly />
				<PeriodOfStay>
					<CheckInDate>'.$cin.'</CheckInDate>
					<CheckOutDate>'.$cout.'</CheckOutDate>
				</PeriodOfStay>
				<Rooms>
					'.$room1.'
				</Rooms>
				<OrderBy>pricelowtohigh</OrderBy>
			</SearchHotelPriceRequest>
		</RequestDetails>
		</Request>';
		//echo $request;exit;
		$URL2 = "https://interface.demo.gta-travel.com/wbsapi/RequestListenerServlet";//local demo
		$ch2=curl_init();
        curl_setopt($ch2, CURLOPT_URL, $URL2);
        curl_setopt($ch2, CURLOPT_TIMEOUT, 180);
        curl_setopt($ch2, CURLOPT_HEADER, 0);
        curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch2, CURLOPT_POST, 1);
        curl_setopt($ch2, CURLOPT_POSTFIELDS, $request);
		curl_setopt($ch2, CURLOPT_SSL_VERIFYHOST, 1);
		curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch2, CURLOPT_SSLVERSION, 3);
	  	curl_setopt($ch2, CURLOPT_FOLLOWLOCATION, true);

        $httpHeader2 = array(
            "Content-Type: text/xml; charset=UTF-8",
            "Content-Encoding: UTF-8",
			"Accept-Encoding: gzip,deflate"
        );
        curl_setopt($ch2, CURLOPT_HTTPHEADER, $httpHeader2);
		curl_setopt ($ch2, CURLOPT_ENCODING, "gzip,deflate");

        // Execute request, store response and HTTP response code
        $data2=curl_exec($ch2);
        $error2=curl_getinfo( $ch2, CURLINFO_HTTP_CODE );
        curl_close($ch2);
		
		if(!empty($data2))
		{/*
				$dom2=new DOMDocument();
				$dom2->loadXML($data2);
				$hotel=$dom2->getElementsByTagName("Hotel");
				foreach($hotel as $val)
				{
				$item = $val->getElementsByTagName("Item");
				$itemVal=$item->item(0)->nodeValue;
				$itemCode=$item->item(0)->getAttribute("Code");
				$room = $val->getElementsByTagName("RoomCategory");
				$i=0;
				foreach($room as $category)
				{
				$room_code=$room->item($i)->getAttribute("Id");
				$roomCategory = $category->getElementsByTagName("Description");
				$room_type=$roomCategory->item(0)->nodeValue;
				$cost = $category->getElementsByTagName("ItemPrice");
				$cost_val=$cost->item(0)->nodeValue;
				$status = $category->getElementsByTagName("Confirmation");
				$status_val=$status->item(0)->nodeValue;
				$meals = $category->getElementsByTagName("Meals");
				$meals_val=$meals->item(0)->nodeValue;
				$api="gta";
				$i++;
				$sec_res=$_SESSION['ses_id'];
			    // store the temp search table
				$this->Hotel_Model->insert_gta_temp_result($sec_res,$api,$itemCode,$room_code,$room_type,$cost_val,$status_val,$meals_val);
				}
			  }
		*/
		
		include('XMLParser.class.php');
		
		//Set up the parser object
		$parser = new XMLParser($data2);
		//Work the magic...
		$parser->Parse();
		$apiData = array();
		$rows=0;
		
  if(isset($parser->document->responsedetails[0]->searchhotelpriceresponse[0]->hoteldetails[0]->hotel))
  {
			foreach($parser->document->responsedetails[0]->searchhotelpriceresponse[0]->hoteldetails[0]->hotel as $hotels)
			{
				$code = $hotels->item[0]->tagAttrs['code'];
				$cols = 0;
				foreach($hotels->roomcategories[0]->tagChildren as $roomcategory)
				{
					/*$apiData[$rows][$cols]['hotel_code'] = $code;
					$apiData[$rows][$cols]['room_code'] = $roomcategory->tagAttrs['id'];
					$apiData[$rows][$cols]['total_cost'] = $roomcategory->itemprice[0]->tagData;
					$apiData[$rows][$cols]['status'] = $roomcategory->confirmation[0]->tagData;
					$apiData[$rows][$cols]['inclusion'] = $roomcategory->meals[0]->basis[0]->tagData;
					$apiData[$rows][$cols]['room_type'] = $roomcategory->description[0]->tagData;
					$cols++;*/
					$sec_res=$_SESSION['ses_id'];
					$adult =  $_SESSION['adult_count'];
					$child =  $_SESSION['child_count'];
					$this->B2b_Hotel_Model->insert_gta_temp_result($sec_res,'gta',$code,$roomcategory->tagAttrs['id'],$roomcategory->description[0]->tagData,$roomcategory->itemprice[0]->tagData,$roomcategory->confirmation[0]->tagData,$roomcategory->meals[0]->basis[0]->tagData,$adult,$child);
				}
				$rows++;
				
				
					
			}
  }
	
		
		}
		
	
	}
	
	public function fetch_search_result_filter() 
	{
		$minVal = 0;
		$maxVal = 0;
		$minStar = 0;
		$maxStar = 5;
		
		if (isset($_REQUEST['minVal'])) $minVal = $_REQUEST['minVal'];
		if (isset($_REQUEST['maxVal'])) $maxVal = $_REQUEST['maxVal'];
		
		if (isset($_REQUEST['minStar'])) $minStar = $_REQUEST['minStar'];
  		if (isset($_REQUEST['maxStar'])) $maxStar = $_REQUEST['maxStar'];
  
  		$_SESSION['minVal'] = $minVal;
		$_SESSION['maxVal'] = $maxVal;
		$_SESSION['minStar'] = $minStar;
		$_SESSION['maxStar'] = $maxStar;

		
		$tmp_data = $this->B2b_Hotel_Model->fetch_search_result($_SESSION['ses_id'], 1, $minVal, $maxVal, $minStar, $maxStar);

		$data['result'] = $tmp_data['result'];
		//$total_result = $tmp_data['count'];
		//$low_val = round($data['result'][0]->total_cost);
		$hotel_search_result = $this->load->view('b2b/hotel/search_result_ajax', $data, true);
		$min_val = round($tmp_data['minVal']);
		$max_val = round($tmp_data['maxVal']);
		$tot_rec = $tmp_data['totRow'];
		//echo "tt:".$min_val . "," . $max_val . ",". $tot_rec;
		echo json_encode(array(
			'hotel_search_result' => $hotel_search_result,
			'total_result' => $tot_rec,
			'min_val' => $min_val,
			'max_val' => $max_val
			));
	}
	
	public function fetch_search_result() 
	{
		
		$minVal = 0;
		$maxVal = 0;
		$minStar = 0;
		$maxStar = 5;
		
 
  		$_SESSION['minVal'] = $minVal;
		$_SESSION['maxVal'] = $maxVal;
		$_SESSION['minStar'] = $minStar;
		$_SESSION['maxStar'] = $maxStar;
		
		$tmp_data = $this->B2b_Hotel_Model->fetch_search_result($_SESSION['ses_id']);
		$data['result'] = $tmp_data['result'];
	//	print_r($data['result']);
	
		//$total_result = $tmp_data['count'];
		$hotel_search_result = $this->load->view('b2b/hotel/search_result_ajax', $data, true);
		
		
			
			$min_val = round($tmp_data['minVal']);
		$max_val = round($tmp_data['maxVal']);
		$tot_rec = $tmp_data['totRow'];
		//echo "tt:".$min_val . "," . $max_val . ",". $tot_rec;
		echo json_encode(array(
			'hotel_search_result' => $hotel_search_result,
			'total_result' => $tot_rec,
			'min_val' => $min_val,
			'max_val' => $max_val
			));
	}
	
	function agent_profile()
	{
		if (!$this->session->userdata('agent_logged_in')) {
			redirect('b2b/login', 'refresh'); 
		}
		
		$agent_id = $this->session->userdata('agent_id');	
		$data['result'] = $this->B2b_Model->getAgentInfo($agent_id);
		$agent_id = $this->session->userdata('agent_id');
		$txt_search = $this->input->post('txt_search');
		//echo "xx".$txt_search; exit;
	
		$data['result_branch'] = $this->B2b_Model->getBranchDtls($agent_id);
		$data['txt_search'] = $txt_search;
			$data['result_deposit'] = $this->B2b_Model->getBranchDepositDtls($agent_id);
		$data['result_staff'] = $this->B2b_Model->getStaffDtls($agent_id, $txt_search);
		$data['txt_search'] = $txt_search;
		
		$data['agent_markup'] = $this->B2b_Model->get_markup($agent_id);
		$data['result_deposit_req'] = $this->B2b_Model->getAgentDepositRequest($agent_id);
				
		$this->load->view('b2b/agent_profile', $data);
	}
	
	function __agent_edit_profile()
	{
		if (!$this->session->userdata('agent_logged_in')) {
			redirect('b2b/login', 'refresh'); 
		}
		
		$agent_id = $this->session->userdata('agent_id');	
		$data['result'] = $this->B2b_Model->getAgentInfo($agent_id);
		$this->load->view('b2b/agent_edit_profile', $data);
	}
	
	
	function agent_edit_profile()
	{
		if (!$this->session->userdata('agent_logged_in')) {
			redirect('b2b/login', 'refresh'); 
		}
		
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('company_name', 'Company Name', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		
		$this->form_validation->set_rules('country', 'Country', 'required');
		$this->form_validation->set_rules('city', 'City', 'required');
		$this->form_validation->set_rules('postal_code', 'Zip Code', 'required');
		$this->form_validation->set_rules('office_phone', 'Office Phone', 'required');
		
		$this->form_validation->set_rules('mobile', 'Mobile', 'required');
		//$this->form_validation->set_rules('currency', 'Currency', 'required');
		
		//$this->form_validation->set_rules('email_id', 'Email', 'required|valid_email|is_unique[agent.email_id]');
		$this->form_validation->set_rules('email_id', 'Email', 'required|valid_email');
		
		$agent_id = $this->session->userdata('agent_id');
		
		if($this->form_validation->run()==FALSE)
		{
			/*$data['exist'] = "";
			$data['name'] = $this->input->post('name');
		   $data['company_name'] = $this->input->post('company_name');
		   $data['address'] = $this->input->post('address');
		   $data['country'] = $this->input->post('country');
		   $data['city'] = $this->input->post('city');
		   $data['postal_code'] = $this->input->post('postal_code');
		   $data['office_phone'] = $this->input->post('office_phone');
		   $data['mobile'] = $this->input->post('mobile');
		   
		   //$data['currency'] = $this->input->post('currency');
		   $data['email_id'] = $this->input->post('email_id');*/
		   
		   
			// $this->load->view('b2b/agent_edit_profile',$data);
				
			$data['result'] = $this->B2b_Model->getAgentInfo($agent_id);
			$this->load->view('b2b/agent_edit_profile', $data);
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
		   $mobile = $this->input->post('mobile');
		   
		 //  $currency = $this->input->post('currency');
		   $email_id = $this->input->post('email_id');
		 
		   
		   
			
			if ($this->B2b_Model->edit_agent($agent_id, $name, $company_name, $address, $country, $city, $postal_code, $office_phone, $mobile, $email_id)) {
			
				
		  
			 
				
					//$data['emailId'] = $email;
					redirect('/b2b/agent_profile', 'refresh');
				
			}
			else
			{
				$data['exist'] = "Error data inserting.";
				$this->load->view('b2b/agent_edit_profile',$data);
			}
		}
		
	}
	
	function __password_change()
	{
		if (!$this->session->userdata('agent_logged_in')) {
			redirect('b2b/login', 'refresh'); 
		}
		
		$data['email_id'] = $this->session->userdata('email_id');
		$this->load->view('b2b/password_change',$data);
	}
	
	function password_change()
	{
		if (!$this->session->userdata('agent_logged_in')) {
			redirect('b2b/login', 'refresh'); 
		}
		
		$this->form_validation->set_rules('email_id', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('old_password', 'Old Password', 'required');
		
		$this->form_validation->set_rules('password', 'Password', 'required|matches[comform_password]');
		$this->form_validation->set_rules('comform_password', 'Confirm Password', 'required');
		
		if($this->form_validation->run()==FALSE)
		{
			//$data['exist'] = "";
			//$data['email_id'] = $this->input->post('email_id');
		   
		   
			 //$this->load->view('b2b/password_change',$data);
			 $data['status'] ='';
			 $data['email_id'] = $this->session->userdata('email_id');
			$this->load->view('b2b/password_change',$data);
		}
		else
		{
			$old_password = $this->input->post('old_password');
			$password = $this->input->post('password');
			$email_id = $this->input->post('email_id');
			$check = $this->B2b_Model->check_agent_password();
			if($check->password == $old_password)
			{
			if ($this->B2b_Model->change_password($email_id, $old_password, $password)) {
				$data['email_id'] = $this->input->post('email_id');
				$data['status'] ='Password Changed.';
				$this->load->view('b2b/password_change',$data);
			} else {
				$data['status'] ='Password Not Changed.';
				$data['email_id'] = $this->input->post('email_id');
				$this->load->view('b2b/password_change',$data);
			}
			}
			else
			{
				$data['status'] ='Wrong Old Password.';
				$data['email_id'] = $this->input->post('email_id');
				$this->load->view('b2b/password_change',$data);
			}
		}

	}
	
	function branch_manage()
	{
		if (!$this->session->userdata('agent_logged_in')) {
			redirect('b2b/login', 'refresh'); 
		}
		
		$agent_id = $this->session->userdata('agent_id');
		$txt_search = $this->input->post('txt_search');
		//echo "xx".$txt_search; exit;
		$data['result'] = $this->B2b_Model->getBranchDtls($agent_id, $txt_search);
		$data['txt_search'] = $txt_search;
		$this->load->view('b2b/branch_manage',$data);
	}
	
	function __add_branch()
	{
		if (!$this->session->userdata('agent_logged_in')) {
			redirect('b2b/login', 'refresh'); 
		}
		$this->load->view('b2b/add_branch');
	}
	
	
	function add_branch()
	{
		if (!$this->session->userdata('agent_logged_in')) {
			redirect('b2b/login', 'refresh'); 
		}
		
		$this->form_validation->set_rules('branch_name', 'Name', 'required');
		$this->form_validation->set_rules('branch_email', 'Company Name', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		
		$this->form_validation->set_rules('country', 'Country', 'required');
		$this->form_validation->set_rules('city', 'City', 'required');
		$this->form_validation->set_rules('postal_code', 'Zip Code', 'required');
		$this->form_validation->set_rules('telephone', 'Office Phone', 'required');
		
		$this->form_validation->set_rules('mobile', 'Mobile', 'required');
		
		
		$this->form_validation->set_rules('branch_email', 'Email', 'required|valid_email|is_unique[agent_branch_details.branch_email]');
		
	
		$this->form_validation->set_rules('status', 'Status', 'required');
	
		if($this->form_validation->run()==FALSE)
		{
		
			$data['status']='';
			/*$data['branch_name'] = $this->input->post('branch_name');
		   $data['branch_email'] = $this->input->post('branch_email');
		   $data['address'] = $this->input->post('address');
		   $data['country'] = $this->input->post('country');
		   $data['city'] = $this->input->post('city');
		   $data['postal_code'] = $this->input->post('postal_code');
		   $data['office_phone'] = $this->input->post('telephone');
		   $data['mobile_no'] = $this->input->post('mobile');
		   
		   $data['status'] = $this->input->post('status');*/
		   
		
		 
		   
		   
			 $this->load->view('b2b/add_branch',$data);
		}
		else
		{
		   $branch_name = $this->input->post('branch_name');
		   $branch_email = $this->input->post('branch_email');
		   $address = $this->input->post('address');
		   $country = $this->input->post('country');
		   $city = $this->input->post('city');
		   $postal_code = $this->input->post('postal_code');
		   $telephone = $this->input->post('telephone');
		   $mobile = $this->input->post('mobile');
		   $status = $this->input->post('status');
		   $agent_id = $this->session->userdata('agent_id');
			
			if ($this->B2b_Model->add_branch($agent_id, $branch_name, $branch_email, $address, $country, $city, $postal_code, $telephone, $mobile, $status)) {
			 $data['status']='New Branch Was Added Successfully.';
				$this->load->view('b2b/add_branch',$data);
				
			}
			else
			{
				$data['status']='New Branch Was Not Added.';
				$data['exist'] = "Error data inserting.";
				$this->load->view('b2b/add_branch',$data);
			}
	
		}
	}
	
	function edit_branch($branch_id)
	{
		if (!$this->session->userdata('agent_logged_in')) {
			redirect('b2b/login', 'refresh'); 
		}
		
		/*$agent_id = $this->session->userdata('agent_id');
		$data['result'] = $this->B2b_Model->getBranchInfo($branch_id, $agent_id);
		if (empty($data['result']->branch_id)) {
			redirect('b2b/branch_manage', 'refresh');
		} else {
			$this->load->view('b2b/edit_branch',$data);
		}*/
		
		$this->form_validation->set_rules('branch_name', 'Name', 'required');
		$this->form_validation->set_rules('branch_email', 'Company Name', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		
		$this->form_validation->set_rules('country', 'Country', 'required');
		$this->form_validation->set_rules('city', 'City', 'required');
		$this->form_validation->set_rules('postal_code', 'Zip Code', 'required');
		$this->form_validation->set_rules('telephone', 'Office Phone', 'required');
		
		$this->form_validation->set_rules('mobile', 'Mobile', 'required');
		
		
		$this->form_validation->set_rules('branch_email', 'Email', 'required|valid_email');
		
	
		$this->form_validation->set_rules('status', 'Status', 'required');
		
		if($this->form_validation->run()==FALSE)
		{
			$data['status'] = "";
			$data['branch_name'] = $this->input->post('branch_name');
		   $data['branch_email'] = $this->input->post('branch_email');
		   $data['address'] = $this->input->post('address');
		   $data['country'] = $this->input->post('country');
		   $data['city'] = $this->input->post('city');
		   $data['postal_code'] = $this->input->post('postal_code');
		   $data['office_phone'] = $this->input->post('telephone');
		   $data['mobile_no'] = $this->input->post('mobile');
		   
		   $data['branch_id'] = $this->input->post('branch_id');
		   
		
			// $this->load->view('b2b/edit_branch',$data);
		
			$agent_id = $this->session->userdata('agent_id');
			$data['result'] = $this->B2b_Model->getBranchInfo($branch_id, $agent_id);
			if (empty($data['result']->branch_id)) {
				$data['status']='Branch Was Not Edited';
				$this->load->view('b2b/edit_branch',$data);
			} else {
				$data['status']='Branch Was Not Edited';
				$this->load->view('b2b/edit_branch',$data);
			}
			
		} else {
				$data['status'] = "";
			$branch_name = $this->input->post('branch_name');
		   $branch_email = $this->input->post('branch_email');
		   $address = $this->input->post('address');
		   $country = $this->input->post('country');
		   $city = $this->input->post('city');
		   $postal_code = $this->input->post('postal_code');
		   $telephone = $this->input->post('telephone');
		   $mobile = $this->input->post('mobile');
		   $status = $this->input->post('status');
		   $branch_id = $this->input->post('branch_id');
			//echo $branch_id; exit;
			if ($this->B2b_Model->edit_branch($branch_id, $branch_name, $branch_email, $address, $country, $city, $postal_code, $telephone, $mobile, $status)) {
				$data['status']='Branch Was Edited';
					$data['exist'] = "";
					 $data['branch_id'] = $this->input->post('branch_id');
		   
					$agent_id = $this->session->userdata('agent_id');
			$data['result'] = $this->B2b_Model->getBranchInfo($branch_id, $agent_id);
				
				$this->load->view('b2b/edit_branch',$data);
				
			}
			else
			{
				 $data['branch_id'] = $this->input->post('branch_id');
		   
					$agent_id = $this->session->userdata('agent_id');
			$data['result'] = $this->B2b_Model->getBranchInfo($branch_id, $agent_id);
			
				$data['status']='Branch Was Not Edited';
				$data['exist'] = "Error data updating.";
				$this->load->view('b2b/edit_branch',$data);
			}
		}
		
		
	}
	
	
	function delete_branch($branch_id)
	{
		if (!$this->session->userdata('agent_logged_in')) {
			redirect('b2b/login', 'refresh'); 
		}
		
		$agent_id = $this->session->userdata('agent_id');
		if ($this->B2b_Model->delete_branch($branch_id, $agent_id)) {
			$result = 'success';
		} else {
			$result = 'fail';
		}
		echo json_encode($result);
	}
	
	function staff_manage()
	{
		if (!$this->session->userdata('agent_logged_in')) {
			redirect('b2b/login', 'refresh'); 
		}
		
		$agent_id = $this->session->userdata('agent_id');
		$txt_search = $this->input->post('txt_search');
		//echo "xx".$txt_search; exit;
		$data['result'] = $this->B2b_Model->getStaffDtls($agent_id, $txt_search);
		$data['txt_search'] = $txt_search;
		$this->load->view('b2b/staff_manage',$data);
	}
	
	function __add_staff()
	{
		if (!$this->session->userdata('agent_logged_in')) {
			redirect('b2b/login', 'refresh'); 
		}
		
		$agent_id = $this->session->userdata('agent_id');
		$data['branchs'] = $this->B2b_Model->getBranchs($agent_id);
		$this->load->view('b2b/add_staff', $data);
	}
	
	function add_staff()
	{
		if (!$this->session->userdata('agent_logged_in')) {
			redirect('b2b/login', 'refresh'); 
		}
		
		$this->form_validation->set_rules('branch', 'Name', 'required');
		$this->form_validation->set_rules('staff_name', 'Staff Name', 'required');
		
		$this->form_validation->set_rules('email_id', 'Email', 'required|valid_email|is_unique[agent.email_id]');
		
			$this->form_validation->set_rules('password', 'Password', 'required|matches[comform_password]');
		$this->form_validation->set_rules('comform_password', 'Confirm Password', 'required');

		$this->form_validation->set_rules('status', 'Status', 'required');
	
		if($this->form_validation->run()==FALSE)
		{
			
			$data['branch'] = $this->input->post('branch');
			$data['email_id'] = $this->input->post('email_id');
			
			$data['staff_name'] = $this->input->post('staff_name');
			
			$agent_id = $this->session->userdata('agent_id');
			$data['branchs'] = $this->B2b_Model->getBranchs($agent_id);
	   $data['status']='';
		   
			 $this->load->view('b2b/add_staff',$data);
		}
		else
		{

		   $staff_name = $this->input->post('staff_name');
		   $email_id = $this->input->post('email_id');
		  
		   $status = $this->input->post('status');
		   $branch_id = $this->input->post('branch');
		   
		   $status = $this->input->post('status');
		   
		   $password = $this->input->post('password');
			$agent_id = $this->session->userdata('agent_id');
			if ($this->B2b_Model->add_staff($agent_id, $branch_id, $staff_name, $email_id, $password, $status)) {
			$data['status']='New Staff Was Added';
					$data['exist'] = "";
				$this->load->view('b2b/add_staff',$data);
				
			}
			else
			{
				$data['status']='';
				$data['exist'] = "Error data updating.";
				$this->load->view('b2b/add_staff',$data);
			}
	
		}
	}
	
	function edit_staff($staff_id)
	{	
		if (!$this->session->userdata('agent_logged_in')) {
			redirect('b2b/login', 'refresh'); 
		}
		
		$this->form_validation->set_rules('branch', 'Name', 'required');
		$this->form_validation->set_rules('staff_name', 'Staff Name', 'required');
		
		
	
		$this->form_validation->set_rules('emailsss', 'Email', 'required|valid_email');
	
		$this->form_validation->set_rules('active', 'Status', 'required');
	
		if($this->form_validation->run()==FALSE)
		{
			
			$data['branch'] = $this->input->post('branch');
		   $data['staff_name'] = $this->input->post('staff_name');
		   $data['email'] = $this->input->post('emailsss');
		   $data['status'] = $this->input->post('status');
	   
			 //$this->load->view('b2b/edit_staff',$data);
			 $agent_id = $this->session->userdata('agent_id');
		
			$data['result'] = $this->B2b_Model->getStaffInfo($staff_id, $agent_id);
			if (empty($data['result']->staff_id)) {
				$data['branchs'] = $this->B2b_Model->getBranchs($agent_id);
				$this->load->view('b2b/edit_staff',$data);
				
			} else {
				$data['branchs'] = $this->B2b_Model->getBranchs($agent_id);
				
				//print_r($data);exit;
				$this->load->view('b2b/edit_staff',$data);
			}
		
		}
		else
		{
			
			
	
		   $branch = $this->input->post('branch');
		   $staff_name = $this->input->post('staff_name');
		   $email_id = $this->input->post('emailsss');
		   $active = $this->input->post('active');
		   $staff_id = $this->input->post('staff_id');
			//echo $branch_id; exit;
			if ($this->B2b_Model->edit_staff($staff_id, $branch, $staff_name, $email_id, $active)) {
			$data['exist'] = "";
			 //$this->load->view('b2b/edit_staff',$data);
			 $agent_id = $this->session->userdata('agent_id');
		
			$data['result'] = $this->B2b_Model->getStaffInfo($staff_id, $agent_id);
			$data['branchs'] = $this->B2b_Model->getBranchs($agent_id);
					$this->load->view('b2b/edit_staff',$data);
				
			}
			else
			{
				$data['branchs'] = $this->B2b_Model->getBranchs($agent_id);
				$data['exist'] = "Error data updating.";
				$this->load->view('b2b/edit_staff',$data);
			}
	
		}
		
		
		
	}
	
	
	function delete_staff($staff_id)
	{
		if (!$this->session->userdata('agent_logged_in')) {
			redirect('b2b/login', 'refresh'); 
		}
		$agent_id = $this->session->userdata('agent_id');
		if ($this->B2b_Model->delete_staff($agent_id, $staff_id)) {
			$result = 'success';
		} else {
			$result = 'fail';
		}
		echo json_encode($result);
	}
	
	public function logout()
    {
        $this->session->unset_userdata('sessionUserInfo');
		$this->session->sess_destroy();
        redirect('b2b/login', 'refresh'); 
    }
	
	function branch_deposit_manage()
	{
		if (!$this->session->userdata('agent_logged_in')) {
			redirect('b2b/login', 'refresh'); 
		}
		
		$agent_id = $this->session->userdata('agent_id');
		//$txt_search = $this->input->post('txt_search');
		//echo "xx".$txt_search; exit;
		$data['result'] = $this->B2b_Model->getBranchDepositDtls($agent_id);
		$this->load->view('b2b/branch_deposit_manage',$data);
	}
	
	function add_branch_deposit()
	{
		if (!$this->session->userdata('agent_logged_in')) {
			redirect('b2b/login', 'refresh'); 
		}
		
		$agent_id = $this->session->userdata('agent_id');
		$data['branchs'] = $this->B2b_Model->getBranchs($agent_id);
		$this->load->view('b2b/add_branch_deposit', $data);
	}
	
	function add_branch_deposit_process()
	{
		if (!$this->session->userdata('agent_logged_in')) {
			redirect('b2b/login', 'refresh'); 
		}
		
		$this->form_validation->set_rules('branch', 'Name', 'required');
		$this->form_validation->set_rules('amount', 'Amount', 'required');
		

	
		if($this->form_validation->run()==FALSE)
		{
		$agent_id = $this->session->userdata('agent_id');
			$data['branchs'] = $this->B2b_Model->getBranchs($agent_id);
			$data['branch'] = $this->input->post('branch');
		   $data['amount'] = $this->input->post('amount');
	   
			 $this->load->view('b2b/add_branch_deposit',$data);
		}
		else
		{
			
			
	
		   $branch = $this->input->post('branch');
		   $amount = $this->input->post('amount');
		   $agent_id = $this->session->userdata('agent_id');

		   if ($this->B2b_Model->add_branch_deposit($branch, $amount, $agent_id)) {
			
					redirect('b2b/agent_profile', 'refresh');
				
			}
			else
			{
				$data['branchs'] = $this->B2b_Model->getBranchs($agent_id);
			
				$data['exist'] = "Low Balance ";
				$this->load->view('b2b/add_branch_deposit',$data);
			}
	
		}
	}
	
	function __edit_branch_deposit($deposit_id)
	{	
		if (!$this->session->userdata('agent_logged_in')) {
			redirect('b2b/login', 'refresh'); 
		}
		
		$this->form_validation->set_rules('branch', 'Name', 'required');
		$this->form_validation->set_rules('amount', 'Amount', 'required');
		
		
	
		if($this->form_validation->run()==FALSE)
		{
			
			$data['branch'] = $this->input->post('branch');
		   $data['amount'] = $this->input->post('amount');
	   
			// $this->load->view('b2b/edit_branch_deposit',$data);
			
			$agent_id = $this->session->userdata('agent_id');
		
		$data['result'] = $this->B2b_Model->getBranchDepositInfo($deposit_id, $agent_id);
		
			if (empty($data['result']->deposit_id)) {
				redirect('b2b/branch_deposit_manage', 'refresh');
			} else {
				$data['branchs'] = $this->B2b_Model->getBranchs($agent_id);
				
				$this->load->view('b2b/edit_branch_deposit',$data);
			}
		
		}
		else
		{
			
			
	
		   $branch = $this->input->post('branch');
		   $amount = $this->input->post('amount');
		   $deposit_id = $this->input->post('deposit_id');
			//echo $branch_id; exit;
			if ($this->B2b_Model->edit_branch_deposit($deposit_id, $branch, $amount)) {
			
					redirect('b2b/branch_deposit_manage', 'refresh');
				
			}
			else
			{
				$data['exist'] = "Error data updating.";
				$this->load->view('b2b/edit_branch_deposit',$data);
			}
	
		}
		
		
		
		
	}
	

	function __delete_branch_deposit($deposit_id)
	{
		if (!$this->session->userdata('agent_logged_in')) {
			redirect('b2b/login', 'refresh'); 
		}
		
		if ($this->B2b_Model->delete_branch_deposit($deposit_id)) {
			$result = 'success';
		} else {
			$result = 'fail';
		}
		echo json_encode($result);
	}
	
	function branch_markup_manage()
	{
		if (!$this->session->userdata('agent_logged_in')) {
			redirect('b2b/login', 'refresh'); 
		}
		
		$agent_id = $this->session->userdata('agent_id');
		//$txt_search = $this->input->post('txt_search');
		//echo "xx".$txt_search; exit;
		$data['result'] = $this->B2b_Model->getBranchMarkupDtls($agent_id);
		$this->load->view('b2b/branch_markup_manage',$data);
	}
	
	function add_branch_markup()
	{
		if (!$this->session->userdata('agent_logged_in')) {
			redirect('b2b/login', 'refresh'); 
		}
		
		$agent_id = $this->session->userdata('agent_id');
		$data['branchs'] = $this->B2b_Model->getBranchs($agent_id);
		$this->load->view('b2b/add_branch_markup', $data);
	}
	
	function add_branch_markup_process()
	{
		if (!$this->session->userdata('agent_logged_in')) {
			redirect('b2b/login', 'refresh'); 
		}
		
		$this->form_validation->set_rules('branch', 'Name', 'required');
		$this->form_validation->set_rules('markup', 'markup', 'required');
		

	
		if($this->form_validation->run()==FALSE)
		{
			$agent_id = $this->session->userdata('agent_id');
			$data['branchs'] = $this->B2b_Model->getBranchs($agent_id);
			$data['branch'] = $this->input->post('branch');
			$data['markup'] = $this->input->post('markup');
	   
			 $this->load->view('b2b/add_branch_markup',$data);
		}
		else
		{
			
			
	
		   $branch = $this->input->post('branch');
		   $markup = $this->input->post('markup');

		   if ($this->B2b_Model->add_branch_markup($branch, $markup)) {
			
					redirect('b2b/branch_markup_manage', 'refresh');
				
			}
			else
			{
				$data['exist'] = "Error data updating.";
				$this->load->view('b2b/add_branch_markup',$data);
			}
	
		}
	}
	
	function edit_branch_markup($markup_id)
	{	
		if (!$this->session->userdata('agent_logged_in')) {
			redirect('b2b/login', 'refresh'); 
		}
		
		$this->form_validation->set_rules('branch', 'Name', 'required');
		$this->form_validation->set_rules('markup', 'Markup', 'required');
		
		
	
		if($this->form_validation->run()==FALSE)
		{
			
			$data['branch'] = $this->input->post('branch');
		   $data['markup'] = $this->input->post('markup');
	   
			// $this->load->view('b2b/edit_branch_markup',$data);
			$agent_id = $this->session->userdata('agent_id');
		
			$data['result'] = $this->B2b_Model->getBranchMarkUpInfo($markup_id, $agent_id);
			
			if (empty($data['result']->markup_id)) {
				redirect('b2b/branch_markup_manage', 'refresh');
			} else {
				$data['branchs'] = $this->B2b_Model->getBranchs($agent_id);
				
				$this->load->view('b2b/edit_branch_markup',$data);
			}
		}
		else
		{
			
			
	
		   $branch = $this->input->post('branch');
		   $markup = $this->input->post('markup');
		   $markup_id = $this->input->post('markup_id');
			//echo $branch_id; exit;
			if ($this->B2b_Model->edit_branch_markup($markup_id, $branch, $markup)) {
			
					redirect('b2b/branch_markup_manage', 'refresh');
				
			}
			else
			{
				$data['exist'] = "Error data updating.";
				$this->load->view('b2b/edit_branch_markup',$data);
			}
	
		}
		
		
		
		
	}
	
	function __edit_branch_markup_process()
	{
		if (!$this->session->userdata('agent_logged_in')) {
			redirect('b2b/login', 'refresh'); 
		}
		
		$this->form_validation->set_rules('branch', 'Name', 'required');
		$this->form_validation->set_rules('markup', 'Markup', 'required');
		
		
	
		if($this->form_validation->run()==FALSE)
		{
			
			$data['branch'] = $this->input->post('branch');
		   $data['markup'] = $this->input->post('markup');
	   
			 $this->load->view('b2b/edit_branch_markup',$data);
		}
		else
		{
			
			
	
		   $branch = $this->input->post('branch');
		   $markup = $this->input->post('markup');
		   $markup_id = $this->input->post('markup_id');
			//echo $branch_id; exit;
			if ($this->B2b_Model->edit_branch_markup($markup_id, $branch, $markup)) {
			
					redirect('b2b/branch_markup_manage', 'refresh');
				
			}
			else
			{
				$data['exist'] = "Error data updating.";
				$this->load->view('b2b/edit_branch_markup',$data);
			}
	
		}
	}
	
	function delete_branch_markup($markup_id)
	{
		if (!$this->session->userdata('agent_logged_in')) {
			redirect('b2b/login', 'refresh'); 
		}
		
		if ($this->B2b_Model->delete_branch_markup($markup_id)) {
			$result = 'success';
		} else {
			$result = 'fail';
		}
		echo json_encode($result);
	}
	function my_booking_search($fdate='',$tdate='',$booking_status='',$passenger_name='',$booking_number='')
	{
		if (!$this->session->userdata('agent_logged_in') && !$this->session->userdata('staff_logged_in')) {
			redirect('b2b/login', 'refresh'); 
		}
		
		$agent_id = $this->session->userdata('agent_id');
		
		//print_r($_POST);
		
		//$this->load->view('b2b/my_booking');
		
		$agent_id = $this->session->userdata('agent_id');
		$agent_type = $this->session->userdata('agent_type');
		
		$booking_number='';$ref='';$passenger_name='';$datetype='';$fdate='';$todate='';$sel_date_type='';
		$booking_status='';
		if($booking_number!='')
		{
			 $booking_number=$this->input->post('booking_number');
		}
		
		
		if($passenger_name!='')
		{
			 $passenger_name=$this->input->post('passenger_name');
		}
		
		/*if($this->input->post('booking_status')!='')
		{
			 $booking_status=$this->input->post('booking_status');
		}*/
		
		if($booking_status!='')
		{
			 $booking_status=$this->input->post('booking_status');
		}
		
		
		//echo "aa:".$booking_status;
		
		
		if($fdate!='')
		{
			 $fdate1=$fdate;
			 list($fday,$fmon,$fyear)=explode("/",$fdate1);
			 
			 $fdate=$fyear."-".$fmon."-".$fday;
			 
			 $data['fdate'] = $fdate1;
			
		}
		
		if($tdate!='')
		{
			 $tdate1=$tdate;
			// list($tday,$tmon,$tyear)=explode("/",$tdate1);
			 
			 $todate=$tdate;
			 
			 $data['tdate'] = $tdate1;
		}
		
		//$booking_type = $booking_type;
		
		$branch_id = $this->session->userdata('branch_id');

		
			 $result = $this->B2b_Model->search_my_booking_details_update($booking_number, $passenger_name, $booking_status, $fdate,$todate,$agent_id,$branch_id);
			 echo '<pre/>';print_r($result);exit;
			$data['booking_number'] = $booking_number;
			$data['passenger_name'] = $passenger_name;
			$data['booking_status'] = $booking_status;
			//$data['sel_date_type'] = $sel_date_type;
			
			echo '<table width="920" border="0" align="left" cellpadding="0" cellspacing="0" style="margin:15px 0 0 15px; border:1px solid #ccc;">
  <tr>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Booking Number</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Booking Date</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">CheckIn</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">CheckOut</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Status</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Cancel Till</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Amount</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Net Amount</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_ex">Action</td>
  </tr>';
 
  if($result!='')
  {

  for($i=0;$i< count($result);$i++)
  {
 
  echo '<tr>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit">'.$result[$i]->booking_number.'</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit">'.$result[$i]->created_date.'</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit">'.$result[$i]->check_in.' 	</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit">'.$result[$i]->check_out.' </td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit">'.$result[$i]->status.' </td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit">'.$result[$i]->cancel_tilldate.'</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit">'.$result[$i]->amount.'</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit">'.$result[$i]->net_amount.'</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit_ex">';
								if ($result[$i]->status != 'cancelled' && $result[$i]->booking_day_diff > 0) {
							 
							 echo '<a href="javascript:void(0);" onclick="cancel_booking('.$result[$i]->booking_number.','.$result[$i]->hotel_booking_id.','.$result[$i]->api.','.$result[$i]->prn_no.');">Cancel</a> | ';
							  } 
							 echo '<a href="'.WEB_URL.'b2b/voucher_print/' . $result[$i]->hotel_booking_id.'" target="_new">Voucher</a> |  
							<a href="'.WEB_URL . 'b2b/invoice_print/' . $result[$i]->hotel_booking_id.'" target="_new">Invoice</a>
							|  
							<a href="'.WEB_URL . 'b2b/send_voucher_email/' . $result[$i]->hotel_booking_id.'" target="_new">Mail</a> </td>
  </tr>';
  }
  }
  else
  {
	  echo '<td align="center" valign="top" colspan="9" class="my_profile_name_ex_tab_whit_ex">No Result Found... </td>';
     
  }
  

echo '</table>';
			
				// $this->load->view('b2b/my_booking',$data);
	}
	function my_booking()
	{
		if (!$this->session->userdata('agent_logged_in') && !$this->session->userdata('staff_logged_in')) {
			redirect('b2b/login', 'refresh'); 
		}
		
		$agent_id = $this->session->userdata('agent_id');
		
		//print_r($_POST);
		
		//$this->load->view('b2b/my_booking');
		
		$agent_id = $this->session->userdata('agent_id');
		$agent_type = $this->session->userdata('agent_type');
		
		
		
		$booking_type = $this->input->post('booking_type');
		
		$branch_id = $this->session->userdata('branch_id');
					
			 $data['result_p'] = $this->B2b_Model->search_my_booking_details_b($booking_number='', $passenger_name='', $booking_status='', $sel_date_type='', $fdate='', $todate='', $agent_id);
			
		
			 $data['result'] = $this->B2b_Model->search_my_booking_details($booking_number='', $passenger_name='', $booking_status='', $sel_date_type='', $fdate='',$todate='',$agent_id,$branch_id 	);
			 
			$data['booking_number'] = $booking_number;
			$data['passenger_name'] = $passenger_name;
			$data['booking_status'] = $booking_status;
			$data['sel_date_type'] = $sel_date_type;
			
			
			//echo '<pre/>';
			//print_r($data);exit;
				 $this->load->view('b2b/my_booking',$data);
	}
	function my_booking_confirm()
	{
		if (!$this->session->userdata('agent_logged_in') && !$this->session->userdata('staff_logged_in')) {
			redirect('b2b/login', 'refresh'); 
		}
		
		$agent_id = $this->session->userdata('agent_id');
		
		//print_r($_POST);
		
		//$this->load->view('b2b/my_booking');
		
		$agent_id = $this->session->userdata('agent_id');
		$agent_type = $this->session->userdata('agent_type');
		
		
		
		$booking_type = $this->input->post('booking_type');
		
		$branch_id = $this->session->userdata('branch_id');
					
			 $data['result_p'] = $this->B2b_Model->search_my_booking_details_b($booking_number='', $passenger_name='', $booking_status='Confirmed', $sel_date_type='', $fdate='', $todate='', $agent_id);
			
		
			 $data['result'] = $this->B2b_Model->search_my_booking_details($booking_number='', $passenger_name='', $booking_status='Confirmed', $sel_date_type='', $fdate='',$todate='',$agent_id,$branch_id 	);
			 
			$data['booking_number'] = $booking_number;
			$data['passenger_name'] = $passenger_name;
			$data['booking_status'] = $booking_status;
			$data['sel_date_type'] = $sel_date_type;
			
			
			//echo '<pre/>';
			//print_r($data);exit;
				 $this->load->view('b2b/my_booking_cofirm',$data);
	}
	function my_booking_cancel()
	{
		if (!$this->session->userdata('agent_logged_in') && !$this->session->userdata('staff_logged_in')) {
			redirect('b2b/login', 'refresh'); 
		}
		
		$agent_id = $this->session->userdata('agent_id');
		
		//print_r($_POST);
		
		//$this->load->view('b2b/my_booking');
		
		$agent_id = $this->session->userdata('agent_id');
		$agent_type = $this->session->userdata('agent_type');
		
		
		
		$booking_type = $this->input->post('booking_type');
		
		$branch_id = $this->session->userdata('branch_id');
					
			 $data['result_p'] = $this->B2b_Model->search_my_booking_details_b($booking_number='', $passenger_name='', $booking_status='Cancelled', $sel_date_type='', $fdate='', $todate='', $agent_id);
			
		
			 $data['result'] = $this->B2b_Model->search_my_booking_details($booking_number='', $passenger_name='', $booking_status='Cancelled', $sel_date_type='', $fdate='',$todate='',$agent_id,$branch_id 	);
			 
			$data['booking_number'] = $booking_number;
			$data['passenger_name'] = $passenger_name;
			$data['booking_status'] = $booking_status;
			$data['sel_date_type'] = $sel_date_type;
			
			
			//echo '<pre/>';
			//print_r($data);exit;
				 $this->load->view('b2b/my_booking_cancel',$data);
	}
	function my_booking_search_news($fdate='',$todate='',$booking_status='',$passenger_name='',$booking_number='')
	{
	
		if (!$this->session->userdata('agent_logged_in') && !$this->session->userdata('staff_logged_in')) {
			redirect('b2b/login', 'refresh'); 
		}
		
		$agent_id = $this->session->userdata('agent_id');
	
		//$this->load->view('b2b/my_booking');
		
		$agent_id = $this->session->userdata('agent_id');
		$agent_type = $this->session->userdata('agent_type');
		
$sel_date_type='';
		
		
		$branch_id = $this->session->userdata('branch_id');
				
	if($booking_number=='-')
	{
		$booking_number='';
	}
	if($passenger_name=='-')
	{
		$passenger_name='';
	}
	if($booking_status=='-')
	{
		$booking_status='';
	}
	if($fdate=='-')
	{
		$fdate='';
	}
	if($todate=='-')
	{
		$todate='';
	}
			 $result = $this->B2b_Model->search_my_booking_details($booking_number, $passenger_name, $booking_status, $sel_date_type, $fdate,$todate,$agent_id,$branch_id);
			 
			$data['booking_number'] = $booking_number;
			$data['passenger_name'] = $passenger_name;
			$data['booking_status'] = $booking_status;
			$data['sel_date_type'] = $sel_date_type;
			echo '<table width="920" border="0" align="left" cellpadding="0" cellspacing="0" style="margin:15px 0 0 15px; border:1px solid #ccc;">
  <tr>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Booking Number</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Booking Date</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">CheckIn</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">CheckOut</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Status</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Cancel Till</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Amount</td>
    <!--<td align="left" valign="top" class="my_profile_name_ex_tab">Net Amount</td>
	<td align="left" valign="top" class="my_profile_name_ex_tab">Margin</td>-->
    <td align="left" valign="top" class="my_profile_name_ex_tab_ex">Action</td>
  </tr>';
 
  if($result!='')
  {

  for($i=0;$i< count($result);$i++)
  {
 
  echo '<tr>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit">'.$result[$i]->booking_number.'</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit">'.$result[$i]->created_date.'</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit">'.$result[$i]->check_in.' 	</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit">'.$result[$i]->check_out.' </td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit">'.$result[$i]->status.' </td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit">'.$result[$i]->cancel_tilldate.'</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit">'.$result[$i]->amount.'</td>
	<!--<td align="left" valign="top" class="my_profile_name_ex_tab_whit">'.($result[$i]->amount-$result[$i]->agent_markup).'</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit">'.$result[$i]->agent_markup.'</td>-->
   <td align="left" valign="top" class="my_profile_name_ex_tab_whit_ex">';
								if ($result[$i]->status != 'cancelled' && $result[$i]->booking_day_diff > 0) {
							 
							echo ' <a href="'.WEB_URL.'b2b_hotel/cancel_booking/'.$result[$i]->transaction_details_id.'">Cancel</a>'; 
							}
							 if($result[$i]->agent_mode!='cash')
							 {
							 
					echo '	 |	<a  href="javascript:void(0);" onclick="JavaScript:newPopup('.WEB_URL . 'b2b/voucher_print/' . $result[$i]->hotel_booking_id.');" >Voucher</a> | 
                            <a  href="javascript:void(0);" onclick="JavaScript:newPopup1('.WEB_URL . 'b2b/invoice_print/' . $result[$i]->hotel_booking_id.');" >Invoice</a>
							
							| 
                             
                            <a  href="javascript:void(0);" onclick="JavaScript:newPopup2('.WEB_URL . 'b2b/send_voucher_email/' . $result[$i]->hotel_booking_id.');" >Mail</a>';
                         
							 }
						
							echo ' </td>
  </tr>';
  }
  }
  else
  {
	  echo '<td align="center" valign="top" colspan="10" class="my_profile_name_ex_tab_whit_ex">No Result Found... </td>';
     
  }
  

echo '</table>';
			
			
	}
	function my_booking_search_news_b($fdate='',$todate='',$booking_status='',$passenger_name='',$booking_number='')
	{
	
		if (!$this->session->userdata('agent_logged_in') && !$this->session->userdata('staff_logged_in')) {
			redirect('b2b/login', 'refresh'); 
		}
		
		$agent_id = $this->session->userdata('agent_id');
	
		//$this->load->view('b2b/my_booking');
		
		$agent_id = $this->session->userdata('agent_id');
		$agent_type = $this->session->userdata('agent_type');
		
$sel_date_type='';
		
		
		$branch_id = $this->session->userdata('branch_id');
				
	if($booking_number=='-')
	{
		$booking_number='';
	}
	if($passenger_name=='-')
	{
		$passenger_name='';
	}
	if($booking_status=='-')
	{
		$booking_status='';
	}
	if($fdate=='-')
	{
		$fdate='';
	}
	if($todate=='-')
	{
		$todate='';
	}
			 $result = $this->B2b_Model->search_my_booking_details_b($booking_number, $passenger_name, $booking_status, $sel_date_type, $fdate,$todate,$agent_id,$branch_id);
			 
			$data['booking_number'] = $booking_number;
			$data['passenger_name'] = $passenger_name;
			$data['booking_status'] = $booking_status;
			$data['sel_date_type'] = $sel_date_type;
			echo '<table width="920" border="0" align="left" cellpadding="0" cellspacing="0" style="margin:15px 0 0 15px; border:1px solid #ccc;">
  <tr>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Booking Number</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Booking Date</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">CheckIn</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">CheckOut</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Status</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Cancel Till</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Amount</td>
   <!-- <td align="left" valign="top" class="my_profile_name_ex_tab">Net Amount</td>
	<td align="left" valign="top" class="my_profile_name_ex_tab">Margin</td>-->
    <td align="left" valign="top" class="my_profile_name_ex_tab_ex">Action</td>
  </tr>';
 
  if($result!='')
  {

  for($i=0;$i< count($result);$i++)
  {
 
  echo '<tr>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit">'.$result[$i]->booking_number.'</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit">'.$result[$i]->created_date.'</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit">'.$result[$i]->check_in.' 	</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit">'.$result[$i]->check_out.' </td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit">'.$result[$i]->status.' </td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit">'.$result[$i]->cancel_tilldate.'</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit">'.$result[$i]->amount.'</td>
	<!--<td align="left" valign="top" class="my_profile_name_ex_tab_whit">'.($result[$i]->amount-$result[$i]->agent_markup).'</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit">'.$result[$i]->agent_markup.'</td>-->
   <td align="left" valign="top" class="my_profile_name_ex_tab_whit_ex">';
								if ($result[$i]->status != 'cancelled' && $result[$i]->booking_day_diff > 0) {
							 
							echo ' <a href="'.WEB_URL.'b2b_hotel/cancel_booking/'.$result[$i]->transaction_details_id.'">Cancel</a>'; 
							}
							 if($result[$i]->agent_mode!='cash')
							 {
							 
					echo '	 |	<a  href="javascript:void(0);" onclick="JavaScript:newPopup('.WEB_URL . 'b2b/voucher_print/' . $result[$i]->hotel_booking_id.');" >Voucher</a> | 
                            <a  href="javascript:void(0);" onclick="JavaScript:newPopup1('.WEB_URL . 'b2b/invoice_print/' . $result[$i]->hotel_booking_id.');" >Invoice</a>
							
							| 
                             
                            <a  href="javascript:void(0);" onclick="JavaScript:newPopup2('.WEB_URL . 'b2b/send_voucher_email/' . $result[$i]->hotel_booking_id.');" >Mail</a>';
                         
							 }
						
							echo ' </td>
  </tr>';
  }
  }
  else
  {
	  echo '<td align="center" valign="top" colspan="10" class="my_profile_name_ex_tab_whit_ex">No Result Found... </td>';
     
  }
  

echo '</table>';
			
			
	}
	
	function branch_booking()
	{
		if (!$this->session->userdata('agent_logged_in')) {
			redirect('b2b/login', 'refresh'); 
		}
		
		$agent_id = $this->session->userdata('agent_id');
		
		//$this->load->view('b2b/my_booking');
		$agent_id = $this->session->userdata('agent_id');
		$agent_type = $this->session->userdata('agent_type');
		
		$booking_number='';$ref='';$passenger_name='';$datetype='';$fdate='';$todate='';$sel_date_type='';$booking_status='';
		if($this->input->post('booking_number')!='')
		{
			 $booking_number=$this->input->post('booking_number');
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
		
	//	echo "xx:".$fdate.",". $todate;
		
		$booking_type = $this->input->post('booking_type');
		
		//echo $booking_type; exit;
		$branch_id = $this->session->userdata('branch_id');
		
		$agent_id = $this->session->userdata('agent_id');
			 $data['result'] = $this->B2b_Model->search_branch_booking_details($booking_number, $passenger_name, $booking_status, $sel_date_type, $fdate, $todate, $agent_id);
			 
			$data['booking_number'] = $booking_number;
			$data['passenger_name'] = $passenger_name;
			$data['booking_status'] = $booking_status;
			$data['sel_date_type'] = $sel_date_type;
			
				 $this->load->view('b2b/branch_booking',$data);
		
		
				 
	}
	
	function search_booking_details()
	{
	
		if (!$this->session->userdata('agent_logged_in') && !$this->session->userdata('staff_logged_in')) {
			redirect('b2b/login', 'refresh'); 
		}
		
		
		$agent_id = $this->session->userdata('agent_id');
		$agent_type = $this->session->userdata('agent_type');
		
		$booking_number='';$ref='';$passenger_name='';$datetype='';$fdate='';$todate='';$sel_date_type='';$booking_status='';
		if($this->input->post('booking_number')!='')
		{
			 $booking_number=$this->input->post('booking_number');
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
		}
		
		if($this->input->post('tdate')!='')
		{
			 $tdate1=$this->input->post('tdate');
			 list($tday,$tmon,$tyear)=explode("/",$tdate1);
			 
			 $todate=$tyear."-".$tmon."-".$tday;
		}
		
		$booking_type = $this->input->post('booking_type');
		$branch_id = $this->session->userdata('branch_id');
				
		
			 $data['result'] = $this->B2b_Model->search_booking_details($booking_number, $passenger_name, $booking_status, $sel_date_type, $fdate,$todate,$agent_id,$booking_type,$branch_id);
			 
			//if (count($data['result']) == 1) {
			//	$data['result'] = (array) $data['result'];
			//}
					
				//$this->load->view('header');
				 $this->load->view('b2b/my_booking',$data);
				//$this->load->view('admin/footer');	
//ccc				
	
	}
	
	function download_report()
	{
		
		if (!$this->session->userdata('agent_logged_in') && !$this->session->userdata('staff_logged_in')) {
			redirect('b2b/login', 'refresh'); 
		}
		
		$booking_number = $_REQUEST['booking_number'];
		$passenger_name = $_REQUEST['passenger_name'];
		$booking_status = $_REQUEST['booking_status'];
		$sel_date_type = $_REQUEST['sel_date_type'];
		$fdate = $_REQUEST['fdate'];
		$todate = $_REQUEST['todate'];
		$booking_type = $_REQUEST['booking_type'];
			
		//echo $booking_type; exit;
		$agent_id = $this->session->userdata('agent_id');
		
		
		//$this->load->view('b2b/my_booking');
		
		$agent_id = $this->session->userdata('agent_id');
		$agent_type = $this->session->userdata('agent_type');
		
		//$booking_number=''; $ref=''; $passenger_name=''; $datetype=''; $fdate=''; $todate=''; $sel_date_type='';$booking_status='';
		
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

		if ($booking_type == 'branch_booking') {
			$result = $this->B2b_Model->search_branch_booking_details($booking_number, $passenger_name, $booking_status, $sel_date_type, $fdate, $todate, $agent_id);
			
		} else {
			$result = $this->B2b_Model->search_my_booking_details($booking_number, $passenger_name, $booking_status, $sel_date_type, $fdate,$todate,$agent_id,$branch_id);
			
		}
		
			 
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
	
	function agent_deposit_request()
	{
		if (!$this->session->userdata('agent_logged_in')) {
			redirect('b2b/login', 'refresh');  
		}
		$agent_id = $this->session->userdata('agent_id');
		//$this->form_validation->set_rules('value', 'Value', 'required');
		
		
		//if($this->form_validation->run()==FALSE)
		//{
			$data['result'] = $this->B2b_Model->getAgentDepositRequest($agent_id);
			
			
			$this->load->view('b2b/agent_deposit_request',$data);	
		//} else {
		//	echo 'save';exit;
		//}
		
	}
	
	function add_agent_deposit_request()
	{
		if (!$this->session->userdata('agent_logged_in')) {
			redirect('b2b/login', 'refresh'); 
		}
		
		$agent_id = $this->session->userdata('agent_id');
		
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
		
	
		if($this->form_validation->run()==FALSE)
		{
			$this->load->view('b2b/add_agent_deposit_request');	
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
		   
		   
			if ($this->B2b_Model->add_agent_deposit_request($agent_id, $amount_credit, $deposited_date, $deposit_type, $deposited_bank, $deposited_branch, $deposited_city, $remarks, $transaction_id, $cheque_date, $cheque_number))
			{
				redirect('b2b/agent_profile', 'refresh');   
			}
			
		}
		
	}
	
	function markup_manage()
	{
		if (!$this->session->userdata('agent_logged_in')) {
			redirect('b2b/login', 'refresh');  
		}
		$agent_id = $this->session->userdata('agent_id');
		if (isset($_POST['mark_up'])) {
			$markup = $_POST['mark_up'];
			if ($this->B2b_Model->update_markup($agent_id, $markup))
			{
				redirect('b2b/agent_profile', 'refresh');   
			}
		} else {
			$data['agent'] = $this->B2b_Model->get_markup($agent_id);
			
			redirect('b2b/agent_profile', 'refresh');  
		}
	}
	
	function cancel_booking()
	{
		if (!$this->session->userdata('agent_logged_in') && !$this->session->userdata('staff_logged_in')) {
			redirect('b2b/login', 'refresh'); 
		}
		
		$id  = $_POST['id'];
		$api1  = $_POST['api'];
		$pnr  = $_POST['pnr'];
		$booking_number = $_POST['booking_number'];
		
		$api = $this->B2b_Model->get_api_name($api1);
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
				if ($this->B2b_Model->cancel_booking($booking_number)) 
				{
					$result = 'success';
				}
				else
				{
					$result = 'fail';
				}
			}
			else 
			{
				$result = 'fail';
			}
			
		}
		if($api == 'hotelsbed')
		{
			
			$user="PHUKETBNTH14573";
		$pass="PHUKETBNTH14573";
		$URL = "http://212.170.239.71/appservices/http/FrontendService";//local
       
				$xml_data ='<PurchaseCancelRQ xmlns="http://www.hotelbeds.com/schemas/2005/06/messages" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.hotelbeds.com/schemas/2005/06/messages PurchaseCancelRQ.xsd" type="C">
				<Language>ENG</Language>
				<Credentials>
					<User>'.$user.'</User>
					<Password>'.$pass.'</Password>
				</Credentials>
				<PurchaseReference>
					<FileNumber>'.$booking_number.'</FileNumber>
					<IncomingOffice code="'.$pnr.'"/>
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
			$array = $this->B2b_Model->xml2array($output);				
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
				if ($this->B2b_Model->cancel_booking($booking_number)) 
				{
					$result = 'success';
				}
				else
				{
					$result = 'fail';
				}
			}
			else 
			{
				$result = 'fail';
			}	
			
		}
		
		
		//echo json_encode($booking_number);
		
		//if ($this->B2b_Model->cancel_booking($booking_number)) {
			$result = 'success';
		//} else {
		//	$result = 'fail';
		//}
		echo json_encode($result);
	} // chitta
	
	function voucher_print($book_id)
	{
		if (!$this->session->userdata('agent_logged_in') && !$this->session->userdata('staff_logged_in')) {
			redirect('b2b/login', 'refresh'); 
		}
	   
		$data['result_view']=$this->B2b_Model->book_detail_view_voucher1($book_id);
		
		//print_r($data); die;
		$con_id = $data['result_view']->customer_contact_details_id;
		
		$data['contact_info']=$this->B2b_Model->contact_info_detail_update($con_id);
		$data['trans']=$this->B2b_Model->transation_detail_contact($con_id);
		
		$agent_id = $data['trans']->user_id;
		$data['agent_info'] = $this->B2b_Model->agentInfo($agent_id);
		
		$con_id_pass = $data['contact_info']->customer_info_details_id;
		$data['pass_info']=$this->B2b_Model->pass_info_detail($con_id_pass);
		
		
		$hotel_id = $data['result_view']->hotel_code;
	//	$data['hotel_details']=$this->B2b_Model->gethb_hoteldet($hotel_id);
		
		$data['hotel_decs']='';
		//echo "<pre/>";
		//print_r($data);exit;
		$this->load->view('b2b/voucher3',$data);
		 
	 }
	 
	 function invoice_print($book_id)
	{
		if (!$this->session->userdata('agent_logged_in') && !$this->session->userdata('staff_logged_in')) {
			redirect('b2b/login', 'refresh'); 
		}
		
		$data['result_view']=$this->B2b_Model->book_detail_view_voucher1($book_id);
		$con_id = $data['result_view']->customer_contact_details_id;
		
		$data['contact_info']=$this->B2b_Model->contact_info_detail_update($con_id);
		$data['trans']=$this->B2b_Model->transation_detail_contact($con_id);
		
		$agent_id = $data['trans']->user_id;
		$data['agent_info'] = $this->B2b_Model->agentInfo($agent_id);
		
		//customer_info_details_id
		$con_id_pass = $data['contact_info']->customer_info_details_id;
		$data['pass_info']=$this->B2b_Model->pass_info_detail($con_id_pass);
		
		
		 $hotel_id = $data['result_view']->hotel_code;
		// $data['hotel_details']=$this->B2b_Model->gethb_hoteldet($hotel_id);
		
		 $data['hotel_decs']='';
		//echo "<pre/>";
		//print_r($data);exit;
		 $this->load->view('b2b/invoice',$data);
		 
	 }
	
	
	// Below is OLD Data muna
	
	
	function ajax_left_price($starA,$starB)
	{
		$data['result'] = $this->Hotel_Model->get_price_shorting($_SESSION['ses_id'],$starA,$starB);
		$data['count']= count($data['result']);
		$this->load->view('hotel/search_result_ajax',$data);
	}
	function ajax_left_price_count($starA,$starB)
	{
		$data['result'] = $this->Hotel_Model->get_price_shorting($_SESSION['ses_id'],$starA,$starB);
		$a=  count($data['result']);
		echo $a.'&nbsp;&nbsp;Hotels found in '.$_SESSION['city'].', Showing 1-10';
		//$this->load->view('hotel/search_result_ajax',$data);
	}
	function ajax_left_star($starA,$starB)
	{
		
		$data['result'] = $this->Hotel_Model->get_star_shorting($_SESSION['ses_id'],$starA,$starB);
		$data['count']= count($data['result']);
		$this->load->view('hotel/search_result_ajax',$data);
	}
	
	function ajax_left_star_count($starA,$starB)
	{
		
		$data['result'] = $this->Hotel_Model->get_star_shorting($_SESSION['ses_id'],$starA,$starB);
		$a= count($data['result']);
			echo $a.'&nbsp;&nbsp;Hotels found in '.$_SESSION['city'].', Showing 1-10';
	}
	function desc_order_star($star)
	{
		$data['result'] = $this->Hotel_Model->order_star($_SESSION['ses_id'],'desc');
		$data['count']= count($data['result']);
		$this->load->view('hotel/search_result_ajax',$data);
	}
	function asc_order_star($star)
	{
		$data['result'] = $this->Hotel_Model->order_star($_SESSION['ses_id'],'asc');
		$data['count']= count($data['result']);
		$this->load->view('hotel/search_result_ajax',$data);
	}
	function desc_order_name($star)
	{
		$data['result'] = $this->Hotel_Model->order_name($_SESSION['ses_id'],'desc');
		$data['count']= count($data['result']);
		$this->load->view('hotel/search_result_ajax',$data);
	}
	function asc_order_name($star)
	{
		$data['result'] = $this->Hotel_Model->order_name($_SESSION['ses_id'],'asc');
		$data['count']= count($data['result']);
		$this->load->view('hotel/search_result_ajax',$data);
	}
	function desc_order_price($star)
	{
		$data['result'] = $this->Hotel_Model->order_price($_SESSION['ses_id'],'desc');
		$data['count']= count($data['result']);
		$this->load->view('hotel/search_result_ajax',$data);
	}
	function asc_order_price($star)
	{
		$data['result'] = $this->Hotel_Model->order_price($_SESSION['ses_id'],'asc');
		$data['count']= count($data['result']);
		$this->load->view('hotel/search_result_ajax',$data);
	}
	function child_dd_single()
	{
		echo  ' <select name="child[]" id="inputfiled1_1"  class="jumb_25_for_new_1"  onChange="display_child_count(this.value)">
                      <option value="0">0</option>
                      <option value="1">1</option>
                      <option value="2">2</option><option value="3">3</option>
                    </select>';
	}
	function child_dd_double()
	{
		echo  ' <select name="child[]" id="inputfiled1_1"  class="jumb_25_for_new_1"  onChange="display_child_count(this.value)">
                      <option value="0">0</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                    </select>';
	}
	function child_dd_triple()
	{
		echo  ' <select name="child[]" id="inputfiled1_1"  class="jumb_25_for_new_1"  onChange="display_child_count(this.value)">
                      <option value="0">0</option>
                      <option value="1">1</option>
                    
                    </select>';
	}
	function child_dd_show()
	{
		echo  '';
	}
     function gta_bd_merge()
	{
			ini_set("memory_limit","1400M");
        set_time_limit(0);
		$result = $this->Hotel_Model->gta_bed_fac1();
echo count($result)."<br>";
		for($i=0;$i<count($result);$i++)
		{
            $api = $result[$i]->api;
$hotel_code = $result[$i]->hotel_code;
$fac = $result[$i]->fac;
$fac_type  = $result[$i]->fac_type;

$this->Hotel_Model->gta_bed_fac($api,$fac_type,$hotel_code,$fac);
echo $i."<br>";
		}
	}

	
	
	
	
	function  result_price()
	{
		$asc = $this->Hotel_Model->order_price_count_value($_SESSION['ses_id'],'asc');
		echo  '$ '.$asc[0]->total_cost;
		
	}
	function  minval()
	{
		$asc = $this->Hotel_Model->order_price_count_value($_SESSION['ses_id'],'asc');
		echo $asc[0]->total_cost;
		
	}
	function  maxval()
	{
	
		$desc = $this->Hotel_Model->order_price_count_value($_SESSION['ses_id'],'desc');
	    echo $desc[0]->total_cost;

	}
	function price()
	{
		$asc = $this->Hotel_Model->order_price_count_value($_SESSION['ses_id'],'asc');
		$desc = $this->Hotel_Model->order_price_count_value($_SESSION['ses_id'],'desc');
	echo  $asc[0]->total_cost." $ - ".$desc[0]->total_cost." $";
	
	}
	function room_fac()
	{
		
		//$data1['room_facility'] = $this->Hotel_Model->fetch_gta_temp_result_room_facility($_SESSION['ses_id']);
		 $this->load->view('b2b/hotel/room_facility');
	}
	function hotel_fac()
	{
		
		//$data1['room_facility'] = $this->Hotel_Model->fetch_gta_temp_result_room_facility($_SESSION['ses_id']);
		 $this->load->view('b2b/hotel/hotel_facility');
	}
	function chain_fac()
	{
		
		//$data1['room_facility'] = $this->Hotel_Model->fetch_gta_temp_result_room_facility($_SESSION['ses_id']);
		 $this->load->view('hotel/chain_facility');
	}
	function result_count()
	{
		$result_count = $this->Hotel_Model->fetch_gta_temp_result_count($_SESSION['ses_id']);
		 echo $result_count.' Hotels found in '.$_SESSION['city'];
	}
	function room_fac_sorting($val)
	{
		$value1 = rawurldecode($val);
	 $value_fac = explode(",",$value1);
		$fac_result_con=array();
		for($t=0;$t<count($value_fac);$t++)
		{
			$fac_result_con[] = $this->Hotel_Model->get_facility_by_id($value_fac[$t]);
		}
		
		//$val_fac = explode("||",$value);.

		$value = implode(",",$fac_result_con);

		//Bathtub,Carpet,
		$value = rtrim($value,',');
		$value_b  = str_replace(",", "','", $value);

		$data['result'] = $this->Hotel_Model->get_room_facilities($_SESSION['ses_id'],$value_b);
		$data['count']= count($data['result']);
		$this->load->view('hotel/search_result_ajax',$data);
		
			
	}	
	function hotel_fac_sorting($val='')
	{
		$value1 = rawurldecode($val);
		
	  //  $value_fac = explode(",",$value1);
		
		$value = rtrim($value1,',');
		//$value_b  = str_replace(",", "','", $value);
		//echo $value_b;exit;
		//$value_b="bar";
		$data['result'] = $this->B2b_Hotel_Model->fetch_gta_temp_result_room_facility_new($_SESSION['ses_id'],$value);
		/*echo "<pre/>";
		print_r($data);exit;
*/
		/*$seresult_val=array();
		for($ii=0;$ii<count($seresult);$ii++)
		{
			$seresult_val[] = $seresult[$ii]->hotel_code;
		}
		
		$ds = implode(",",$seresult_val);
		$value_bs = str_replace(",", "&#39;,&#39;", $ds);*/

//$value_b="restaurant";
	//		$data['result'] = $this->Hotel_Model->get_room_facilities_by_hotel_new($_SESSION['ses_id'],$value_bs);
//echo "<pre/>";print_r($data);exit;
		//$data['count']= count($data['result']);
		$this->load->view('b2b/hotel/search_result_ajax',$data);
	}
	
	function hotel_fac_sorting_old() //$val
	{
		//print_r($_REQUEST);
		$val = $_REQUEST['finval'];
		$val = rawurldecode($val);
		$value_fac = explode(",",$val);
//		$value = rtrim($val,',');
		
		$minVal = 0;
		$maxVal = 0;
		$minStar = 0;
		$maxStar = 5;
		
		//if (isset($_REQUEST['finval'])) $finval = $_REQUEST['finval'];
	//	$_SESSION['finval'] = $finval;
		
		
		if (isset($_SESSION['minVal'])) $minVal = $_SESSION['minVal'];
		if (isset($_SESSION['maxVal'])) $maxVal = $_SESSION['maxVal'];
		if (isset($_SESSION['minStar'])) $minStar = $_SESSION['minStar'];
		if (isset($_SESSION['maxStar'])) $maxStar = $_SESSION['maxStar'];

		$fac_result_con=array();
		for($t=0;$t<count($value_fac);$t++)
		{
			$fac_result_con[] = $this->Hotel_Model->get_facility_by_id($value_fac[$t]);
		}
		
		//$val_fac = explode("||",$value);.

		$value = implode(",",$fac_result_con);

		//Bathtub,Carpet,
		$value = rtrim($value,',');
		$value_b  = str_replace(",", "','", $value);

		//$data = $this->Hotel_Model->get_hotel_facilities($_SESSION['ses_id'],$value, $minVal, $maxVal, $minStar, $maxStar);
		$data = $this->Hotel_Model->get_hotel_facilities($_SESSION['ses_id'],$value_b, $minVal, $maxVal, $minStar, $maxStar);
		
		$tot_rec = $data['totRow'];
//print_r($data);exit;
		$hotel_search_result = $this->load->view('hotel/search_result_ajax',$data,true);

		echo json_encode(array(
			'hotel_search_result' => $hotel_search_result,
			'total_result' => $tot_rec
			));
			
		
		
			
	}	
	
	function room_fac_sorting_count($val='')
	{
		$value1 = rawurldecode($val);
	   
		$value = rtrim($value1,',');
		//$value_b  = str_replace(",", "','", $value);
		//echo $value_b;exit;
		$data['result'] = $this->B2b_Hotel_Model->fetch_gta_temp_result_room_facility_new($_SESSION['ses_id'],$value);
		$a= count($data['result']);
			echo $a;
	}

	
	function room_facilities($val)
	{
		echo $val;print_r($val);exit;
	}
	function page_refresh()
	{
		$data['result'] = $this->Hotel_Model->fetch_gta_temp_result($_SESSION['ses_id']);
		$this->load->view('hotel/search_result_ajax',$data);
	}
	function page_refresh_count()
	{
		$data['result'] = $this->Hotel_Model->fetch_gta_temp_result($_SESSION['ses_id']);
		
		echo count($data['result']).'&nbsp;&nbsp;Hotels found in '.$_SESSION['city'];
	}
	
	function page_refresh_price()
	{
		$price = $this->Hotel_Model->fetch_gta_temp_result($_SESSION['ses_id']);
		
		echo '$ '.$price[0]->total_cost;
	}
		function all_filter_new1_desc($id)
	{
			$minVal = 0;
			$maxVal = 0;
			$minStar = 0;
			$maxStar = 5;
			
			if (isset($_SESSION['minVal'])) $minVal = $_SESSION['minVal'];
			if (isset($_SESSION['maxVal'])) $maxVal = $_SESSION['maxVal'];
			if (isset($_SESSION['minStar'])) $minStar = $_SESSION['minStar'];
			if (isset($_SESSION['maxStar'])) $maxStar = $_SESSION['maxStar'];
		
			$data = $this->B2b_Hotel_Model->fetch_search_result_for_page2_desc($_SESSION['ses_id'],$id, $minVal, $maxVal, $minStar, $maxStar);
		//	$data['result'] = $this->Hotel_Model->fetch_search_result($_SESSION['ses_id'],$id);
			//echo "<pre/>";
			//print_r($data);exit;
			//$data['count']= count($data['result']);
			$this->load->view('b2b/hotel/search_result_ajax',$data);
	}
	function all_filter_new1($id)
	{
			$minVal = 0;
			$maxVal = 0;
			$minStar = 0;
			$maxStar = 5;
			
			if (isset($_SESSION['minVal'])) $minVal = $_SESSION['minVal'];
			if (isset($_SESSION['maxVal'])) $maxVal = $_SESSION['maxVal'];
			if (isset($_SESSION['minStar'])) $minStar = $_SESSION['minStar'];
			if (isset($_SESSION['maxStar'])) $maxStar = $_SESSION['maxStar'];
		
			$data = $this->B2b_Hotel_Model->fetch_search_result_for_page2($_SESSION['ses_id'],$id, $minVal, $maxVal, $minStar, $maxStar);
		//	$data['result'] = $this->Hotel_Model->fetch_search_result($_SESSION['ses_id'],$id);
			//echo "<pre/>";
			//print_r($data);exit;
			//$data['count']= count($data['result']);
			$this->load->view('b2b/hotel/search_result_ajax',$data);
	}
	
	function all_filter_new1_facility($id,$value)
	{
		
			$data['result'] = $this->B2b_Hotel_Model->fetch_gta_temp_result_room_facility_new_page($_SESSION['ses_id'],$value,$id);
			
			$this->load->view('b2b/hotel/search_result_ajax',$data);
	}
	
	function pagination_call()
	{
		

if($_POST['page'])
{
$page = $_POST['page'];

/*$minVal = 0;
$maxVal = 0;
$minStar = 0;
$maxStar = 5;

if (isset($_SESSION['minVal'])) $minVal = $_SESSION['minVal'];
if (isset($_SESSION['maxVal'])) $maxVal = $_SESSION['maxVal'];
if (isset($_SESSION['minStar'])) $minStar = $_SESSION['minStar'];
if (isset($_SESSION['maxStar'])) $maxStar = $_SESSION['maxStar'];
*/		
$minVal = $_SESSION['minVal'];
$maxVal = 		$_SESSION['maxVal'];
$minStar =		$_SESSION['minStar'];
$maxStar =		$_SESSION['maxStar'];

$finval = 0;
if (isset($_SESSION['finval'])) $finval = $_SESSION['finval'];
			
$cur_page = $page;
$page -= 1;
$per_page = 10;
$previous_btn = true;
$next_btn = true;
$first_btn = true;
$last_btn = true;
$start = $page * $per_page;
//echo $cur_page;exit;
$msg = "";

$msg1 = "";
//print_r($_SESSION); exit;
 $hotellisst=$this->B2b_Hotel_Model->fetch_search_result_for_page($_SESSION['ses_id'], $page, $minVal, $maxVal, $minStar, $maxStar);

									$hotellist = $hotellisst['totRow'];	 
							 $per_page1=$start+$per_page;
							 if($hotellist<$per_page1)
							 {
								 $per_page2 = $hotellist;
							 }
							 else
							 {
								  $per_page2 = $per_page1;
							 }
							 //echo $per_page2;
							$_SESSION['start']=$start;
							$_SESSION['per_page1']=$per_page2;
$msg = "<div class='data'><ul>" . $msg . "</ul></div>"; // Content for Data


/* --------------------------------------------- */
$query_pag_num = $hotellist;

$count = $hotellist;

$no_of_paginations1 = ceil($count / $per_page);
$no_of_paginations = ceil($count / $per_page); //$no_of_paginations1-1;
//echo $count.'---'.$no_of_paginations;exit;
/* ---------------Calculating the starting and endign values for the loop----------------------------------- */
$pages_show = 10;
if ($cur_page >= $pages_show) {
	
    $start_loop = $cur_page - 1;
    if ($no_of_paginations > $cur_page + 1)
        $end_loop = $cur_page + 1;
    else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - 3) {
        $start_loop = $no_of_paginations - 1;
        $end_loop = $no_of_paginations;
    } else {
        $end_loop = $no_of_paginations;
    }
} else {
    $start_loop = 1;
    if ($no_of_paginations > $pages_show)
        $end_loop = $pages_show;
    else
        $end_loop = $no_of_paginations;
}

/* ----------------------------------------------------------------------------------------------------------- */
$msg .= "<div class='pagination1'><ul>";

// FOR ENABLING THE FIRST BUTTON
if ($first_btn && $cur_page > 1) {
    $msg .= "<li p='1' onclick='javascript:rrr1(1);' class='active'>First</li>";
} else if ($first_btn) {
    $msg .= "<li p='1' class='inactive'>First</li>";
}

// FOR ENABLING THE PREVIOUS BUTTON
if ($previous_btn && $cur_page > 1) {
    $pre = $cur_page - 1;
    $msg .= "<li p='$pre'  onclick='javascript:rrr1({$pre});' class='active'>Prev</li>";
} else if ($previous_btn) {
    $msg .= "<li class='inactive' >Prev</li>";
}
for ($i = $start_loop; $i <= $end_loop; $i++) {

    if ($cur_page == $i)
        $msg .= "<li p='$i' onclick='javascript:rrr1({$i});'  style='color:#fff;background-color:#006699;' class='active'>{$i}</li>";
    else
        $msg .= "<li p='$i'  onclick='javascript:rrr1({$i});' class='active'>{$i}</li>";
}

// TO ENABLE THE NEXT BUTTON
if ($next_btn && $cur_page < $no_of_paginations) {
    $nex = $cur_page + 1;
    $msg .= "<li p='$nex' onclick='javascript:rrr1({$nex});'  class='active'>Next</li>";
} else if ($next_btn) {
    $msg .= "<li class='inactive'>Next</li>";
}

// TO ENABLE THE END BUTTON
if ($last_btn && $cur_page < $no_of_paginations) {
    $msg .= "<li p='$no_of_paginations' onclick='javascript:rrr1({$no_of_paginations});'   class='active'>Last</li>";
} else if ($last_btn) {
    $msg .= "<li p='$no_of_paginations' class='inactive'>Last</li>";
}
$goto = "<input type='text' class='goto' size='1' style='margin-top:-1px;margin-left:60px;'/><input type='button' id='go_btn' class='go_button' value='Go'/>";
$total_string = "<span class='total' a='$no_of_paginations'>Page <b>" . $cur_page . "</b> of <b>$no_of_paginations</b></span>";
$msg = $msg . "</ul></div>";  // Content for pagination
echo $msg;

}


	
	}
	function pagination_call_price()
	{
		

if($_POST['page'])
{
$page = $_POST['page'];
$cur_page = $page;
$page -= 1;
$per_page = 10;
$previous_btn = true;
$next_btn = true;
$first_btn = true;
$last_btn = true;
$start = $page * $per_page;
//echo $cur_page;exit;
$msg = "";

$msg1 = "";
echo "<pre/>";
print_r($_SESSION);exit;
	// $hotellist=$this->Hotel_Model->fetch_gta_temp_result_count($_SESSION['ses_id'],$_POST['minval'],$_POST['maxval']);
		$data['result'] = $this->Hotel_Model->get_price_shorting($_SESSION['ses_id'],$_POST['minval'],$_POST['maxval']);
		$hotellist= count($data['result']);
							 
									//echo $hotellist;exit;		 
							 $per_page1=$start+$per_page;
							 if($hotellist<$per_page1)
							 {
								 $per_page2 = $hotellist;
							 }
							 else
							 {
								  $per_page2 = $per_page1;
							 }
							 //echo $per_page2;
							$_SESSION['start']=$start;
							$_SESSION['per_page1']=$per_page2;
$msg = $hotellist."<div class='data'><ul>" . $msg . "</ul></div>"; // Content for Data


/* --------------------------------------------- */
$query_pag_num = $hotellist;

$count = $hotellist;

$no_of_paginations1 = ceil($count / $per_page);
$no_of_paginations =$no_of_paginations1-1;
//echo $count.'---'.$no_of_paginations;exit;
/* ---------------Calculating the starting and endign values for the loop----------------------------------- */
$pages_show = 10;
if ($cur_page >= $pages_show) {
	
    $start_loop = $cur_page - 1;
    if ($no_of_paginations > $cur_page + 1)
        $end_loop = $cur_page + 1;
    else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - 3) {
        $start_loop = $no_of_paginations - 1;
        $end_loop = $no_of_paginations;
    } else {
        $end_loop = $no_of_paginations;
    }
} else {
    $start_loop = 1;
    if ($no_of_paginations > $pages_show)
        $end_loop = $pages_show;
    else
        $end_loop = $no_of_paginations;
}

/* ----------------------------------------------------------------------------------------------------------- */
$msg .= "<div class='pagination1'><ul>";

// FOR ENABLING THE FIRST BUTTON
if ($first_btn && $cur_page > 1) {
    $msg .= "<li p='1' onclick='javascript:rrr1(1);' class='active'>First</li>";
} else if ($first_btn) {
    $msg .= "<li p='1' class='inactive'>First</li>";
}

// FOR ENABLING THE PREVIOUS BUTTON
if ($previous_btn && $cur_page > 1) {
    $pre = $cur_page - 1;
    $msg .= "<li p='$pre'  onclick='javascript:rrr1({$pre});' class='active'>Prev</li>";
} else if ($previous_btn) {
    $msg .= "<li class='inactive' >Prev</li>";
}
for ($i = $start_loop; $i <= $end_loop; $i++) {

    if ($cur_page == $i)
        $msg .= "<li p='$i' onclick='javascript:rrr1({$i});'  style='color:#fff;background-color:#006699;' class='active'>{$i}</li>";
    else
        $msg .= "<li p='$i'  onclick='javascript:rrr1({$i});' class='active'>{$i}</li>";
}

// TO ENABLE THE NEXT BUTTON
if ($next_btn && $cur_page < $no_of_paginations) {
    $nex = $cur_page + 1;
    $msg .= "<li p='$nex' onclick='javascript:rrr1({$nex});'  class='active'>Next</li>";
} else if ($next_btn) {
    $msg .= "<li class='inactive'>Next</li>";
}

// TO ENABLE THE END BUTTON
if ($last_btn && $cur_page < $no_of_paginations) {
    $msg .= "<li p='$no_of_paginations' onclick='javascript:rrr1({$no_of_paginations});'   class='active'>Last</li>";
} else if ($last_btn) {
    $msg .= "<li p='$no_of_paginations' class='inactive'>Last</li>";
}
$goto = "<input type='text' class='goto' size='1' style='margin-top:-1px;margin-left:60px;'/><input type='button' id='go_btn' class='go_button' value='Go'/>";
$total_string = "<span class='total' a='$no_of_paginations'>Page <b>" . $cur_page . "</b> of <b>$no_of_paginations</b></span>";
$msg = $msg . "</ul></div>";  // Content for pagination
echo $msg;

}


	
	}
	function asc_order_price_new()
	{
		$tmp_data = $this->B2b_Hotel_Model->asc_order_price_new($_SESSION['ses_id']);
		$data['result'] = $tmp_data['result'];
	//	print_r($data['result']);
	
		//$total_result = $tmp_data['count'];
		$hotel_search_result = $this->load->view('b2b/hotel/search_result_ajax', $data, true);
		echo json_encode(array(
			'hotel_search_result' => $hotel_search_result
			
			));
	}
	function pagination_call_desc()
	{
		

if($_POST['page'])
{
$page = $_POST['page'];

/*$minVal = 0;
$maxVal = 0;
$minStar = 0;
$maxStar = 5;

if (isset($_SESSION['minVal'])) $minVal = $_SESSION['minVal'];
if (isset($_SESSION['maxVal'])) $maxVal = $_SESSION['maxVal'];
if (isset($_SESSION['minStar'])) $minStar = $_SESSION['minStar'];
if (isset($_SESSION['maxStar'])) $maxStar = $_SESSION['maxStar'];
*/		
$minVal = $_SESSION['minVal'];
$maxVal = 		$_SESSION['maxVal'];
$minStar =		$_SESSION['minStar'];
$maxStar =		$_SESSION['maxStar'];

$finval = 0;
if (isset($_SESSION['finval'])) $finval = $_SESSION['finval'];
			
$cur_page = $page;
$page -= 1;
$per_page = 10;
$previous_btn = true;
$next_btn = true;
$first_btn = true;
$last_btn = true;
$start = $page * $per_page;
//echo $cur_page;exit;
$msg = "";

$msg1 = "";
//print_r($_SESSION); exit;
 $hotellisst=$this->B2b_Hotel_Model->fetch_search_result_for_page_desc($_SESSION['ses_id'], $page, $minVal, $maxVal, $minStar, $maxStar);

									$hotellist = $hotellisst['totRow'];	 
							 $per_page1=$start+$per_page;
							 if($hotellist< $per_page1)
							 {
								 $per_page2 = $hotellist;
							 }
							 else
							 {
								  $per_page2 = $per_page1;
							 }
							 //echo $per_page2;
							$_SESSION['start']=$start;
							$_SESSION['per_page1']=$per_page2;
$msg = "<div class='data'><ul>" . $msg . "</ul></div>"; // Content for Data


/* --------------------------------------------- */
$query_pag_num = $hotellist;

$count = $hotellist;

$no_of_paginations1 = ceil($count / $per_page);
$no_of_paginations = ceil($count / $per_page); //$no_of_paginations1-1;
//echo $count.'---'.$no_of_paginations;exit;
/* ---------------Calculating the starting and endign values for the loop----------------------------------- */
$pages_show = 10;
if ($cur_page >= $pages_show) {
	
    $start_loop = $cur_page - 1;
    if ($no_of_paginations > $cur_page + 1)
        $end_loop = $cur_page + 1;
    else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - 3) {
        $start_loop = $no_of_paginations - 1;
        $end_loop = $no_of_paginations;
    } else {
        $end_loop = $no_of_paginations;
    }
} else {
    $start_loop = 1;
    if ($no_of_paginations > $pages_show)
        $end_loop = $pages_show;
    else
        $end_loop = $no_of_paginations;
}

/* ----------------------------------------------------------------------------------------------------------- */
$msg .= "<div class='pagination1'><ul>";

// FOR ENABLING THE FIRST BUTTON
if ($first_btn && $cur_page > 1) {
    $msg .= "<li p='1' onclick='javascript:rrr1_desc(1);' class='active'>First</li>";
} else if ($first_btn) {
    $msg .= "<li p='1' class='inactive'>First</li>";
}

// FOR ENABLING THE PREVIOUS BUTTON
if ($previous_btn && $cur_page > 1) {
    $pre = $cur_page - 1;
    $msg .= "<li p='$pre'  onclick='javascript:rrr1_desc({$pre});' class='active'>Prev</li>";
} else if ($previous_btn) {
    $msg .= "<li class='inactive' >Prev</li>";
}
for ($i = $start_loop; $i <= $end_loop; $i++) {

    if ($cur_page == $i)
        $msg .= "<li p='$i' onclick='javascript:rrr1_desc({$i});'  style='color:#fff;background-color:#006699;' class='active'>{$i}</li>";
    else
        $msg .= "<li p='$i'  onclick='javascript:rrr1_desc({$i});' class='active'>{$i}</li>";
}

// TO ENABLE THE NEXT BUTTON
if ($next_btn && $cur_page < $no_of_paginations) {
    $nex = $cur_page + 1;
    $msg .= "<li p='$nex' onclick='javascript:rrr1_desc({$nex});'  class='active'>Next</li>";
} else if ($next_btn) {
    $msg .= "<li class='inactive'>Next</li>";
}

// TO ENABLE THE END BUTTON
if ($last_btn && $cur_page < $no_of_paginations) {
    $msg .= "<li p='$no_of_paginations' onclick='javascript:rrr1_desc({$no_of_paginations});'   class='active'>Last</li>";
} else if ($last_btn) {
    $msg .= "<li p='$no_of_paginations' class='inactive'>Last</li>";
}
$goto = "<input type='text' class='goto' size='1' style='margin-top:-1px;margin-left:60px;'/><input type='button' id='go_btn' class='go_button' value='Go'/>";
$total_string = "<span class='total' a='$no_of_paginations'>Page <b>" . $cur_page . "</b> of <b>$no_of_paginations</b></span>";
$msg = $msg . "</ul></div>";  // Content for pagination
echo $msg;

}


	
	}
	function desc_order_price_new()
	{
		$tmp_data = $this->B2b_Hotel_Model->desc_order_price_new($_SESSION['ses_id']);
		$data['result'] = $tmp_data['result'];
	//	print_r($data['result']);
	
		//$total_result = $tmp_data['count'];
		$hotel_search_result = $this->load->view('b2b/hotel/search_result_ajax', $data, true);
		echo json_encode(array(
			'hotel_search_result' => $hotel_search_result
			
			));
	}
		function pagination_call_room_fac()
	{
		

if($_POST['page'])
{
$page = $_POST['page'];
$cur_page = $page;
$page -= 1;
$per_page = 10;
$previous_btn = true;
$next_btn = true;
$first_btn = true;
$last_btn = true;
$start = $page * $per_page;
//echo $cur_page;exit;
$msg = "";

$msg1 = "";

$val= $_POST['val'];
	$value1 = rawurldecode($val);
	 
		//Bathtub,Carpet,
		$value = rtrim($value1,',');
	//	$value_b  = str_replace(",", "','", $value);

	$data['result'] = $this->B2b_Hotel_Model->fetch_gta_temp_result_room_facility_new($_SESSION['ses_id'],$value);

	//$data['result'] = $this->Hotel_Model->get_star_shorting($_SESSION['ses_id'],$_POST['minval'],$_POST['maxval']);
		$hotellist= count($data['result']);

							 
									//echo $hotellist;exit;		 
							 $per_page1=$start+$per_page;
							 if($hotellist<$per_page1)
							 {
								 $per_page2 = $hotellist;
							 }
							 else
							 {
								  $per_page2 = $per_page1;
							 }
							 //echo $per_page2;
							$_SESSION['start']=$start;
							$_SESSION['per_page1']=$per_page2;
$msg = "<div class='data'><ul>" . $msg . "</ul></div>"; // Content for Data


/* --------------------------------------------- */
$query_pag_num = $hotellist;

$count = $hotellist;

$no_of_paginations1 = ceil($count / $per_page);
$no_of_paginations =$no_of_paginations1;
//echo $count.'---'.$no_of_paginations;exit;
/* ---------------Calculating the starting and endign values for the loop----------------------------------- */
$pages_show = 10;
if ($cur_page >= $pages_show) {
	
    $start_loop = $cur_page - 1;
    if ($no_of_paginations > $cur_page + 1)
        $end_loop = $cur_page + 1;
    else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - 3) {
        $start_loop = $no_of_paginations - 1;
        $end_loop = $no_of_paginations;
    } else {
        $end_loop = $no_of_paginations;
    }
} else {
    $start_loop = 1;
    if ($no_of_paginations > $pages_show)
        $end_loop = $pages_show;
    else
        $end_loop = $no_of_paginations;
}

/* ----------------------------------------------------------------------------------------------------------- */
$msg .= "<div class='pagination1'><ul>";

// FOR ENABLING THE FIRST BUTTON
if ($first_btn && $cur_page > 1) {
    $msg .= "<li p='1' onclick='javascript:rrr2(1,$value);' class='active'>First</li>";
} else if ($first_btn) {
    $msg .= "<li p='1' class='inactive'>First</li>";
}

// FOR ENABLING THE PREVIOUS BUTTON
if ($previous_btn && $cur_page > 1) {
    $pre = $cur_page - 1;
    $msg .= "<li p='$pre'  onclick='javascript:rrr2({$pre},$value);' class='active'>Prev</li>";
} else if ($previous_btn) {
    $msg .= "<li class='inactive' >Prev</li>";
}
for ($i = $start_loop; $i <= $end_loop; $i++) {

    if ($cur_page == $i)
        $msg .= "<li p='$i' onclick='javascript:rrr2({$i},$value);'  style='color:#fff;background-color:#006699;' class='active'>{$i}</li>";
    else
        $msg .= "<li p='$i'  onclick='javascript:rrr2({$i},$value);' class='active'>{$i}</li>";
}

// TO ENABLE THE NEXT BUTTON
if ($next_btn && $cur_page < $no_of_paginations) {
    $nex = $cur_page + 1;
    $msg .= "<li p='$nex' onclick='javascript:rrr2({$nex},$value);'  class='active'>Next</li>";
} else if ($next_btn) {
    $msg .= "<li class='inactive'>Next</li>";
}

// TO ENABLE THE END BUTTON
if ($last_btn && $cur_page < $no_of_paginations) {
    $msg .= "<li p='$no_of_paginations' onclick='javascript:rrr2({$no_of_paginations},$value);'   class='active'>Last</li>";
} else if ($last_btn) {
    $msg .= "<li p='$no_of_paginations' class='inactive'>Last</li>";
}
$goto = "<input type='text' class='goto' size='1' style='margin-top:-1px;margin-left:60px;'/><input type='button' id='go_btn' class='go_button' value='Go'/>";
$total_string = "<span class='total' a='$no_of_paginations'>Page <b>" . $cur_page . "</b> of <b>$no_of_paginations</b></span>";
$msg = $msg . "</ul></div>";  // Content for pagination
echo $msg;

}


	
	}
	function pagination_call_star()
	{
		

if($_POST['page'])
{
$page = $_POST['page'];
$cur_page = $page;
$page -= 1;
$per_page = 10;
$previous_btn = true;
$next_btn = true;
$first_btn = true;
$last_btn = true;
$start = $page * $per_page;
//echo $cur_page;exit;
$msg = "";

$msg1 = "";
	$data['result'] = $this->Hotel_Model->get_star_shorting($_SESSION['ses_id'],$_POST['minval'],$_POST['maxval']);
		$hotellist= count($data['result']);

							 
									//echo $hotellist;exit;		 
							 $per_page1=$start+$per_page;
							 if($hotellist<$per_page1)
							 {
								 $per_page2 = $hotellist;
							 }
							 else
							 {
								  $per_page2 = $per_page1;
							 }
							 //echo $per_page2;
							$_SESSION['start']=$start;
							$_SESSION['per_page1']=$per_page2;
$msg = "<div class='data'><ul>" . $msg . "</ul></div>"; // Content for Data


/* --------------------------------------------- */
$query_pag_num = $hotellist;

$count = $hotellist;

$no_of_paginations1 = ceil($count / $per_page);
$no_of_paginations =$no_of_paginations1-1;
//echo $count.'---'.$no_of_paginations;exit;
/* ---------------Calculating the starting and endign values for the loop----------------------------------- */
$pages_show = 10;
if ($cur_page >= $pages_show) {
	
    $start_loop = $cur_page - 1;
    if ($no_of_paginations > $cur_page + 1)
        $end_loop = $cur_page + 1;
    else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - 3) {
        $start_loop = $no_of_paginations - 1;
        $end_loop = $no_of_paginations;
    } else {
        $end_loop = $no_of_paginations;
    }
} else {
    $start_loop = 1;
    if ($no_of_paginations > $pages_show)
        $end_loop = $pages_show;
    else
        $end_loop = $no_of_paginations;
}



/* ----------------------------------------------------------------------------------------------------------- */
$msg .= "<div class='pagination1'><ul>";

// FOR ENABLING THE FIRST BUTTON
if ($first_btn && $cur_page > 1) {
    $msg .= "<li p='1' onclick='javascript:rrr1(1);' class='active'>First</li>";
} else if ($first_btn) {
    $msg .= "<li p='1' class='inactive'>First</li>";
}

// FOR ENABLING THE PREVIOUS BUTTON
if ($previous_btn && $cur_page > 1) {
    $pre = $cur_page - 1;
    $msg .= "<li p='$pre'  onclick='javascript:rrr1({$pre});' class='active'>Prev</li>";
} else if ($previous_btn) {
    $msg .= "<li class='inactive' >Prev</li>";
}
for ($i = $start_loop; $i <= $end_loop; $i++) {

    if ($cur_page == $i)
        $msg .= "<li p='$i' onclick='javascript:rrr1({$i});'  style='color:#fff;background-color:#006699;' class='active'>{$i}</li>";
    else
        $msg .= "<li p='$i'  onclick='javascript:rrr1({$i});' class='active'>{$i}</li>";
}

// TO ENABLE THE NEXT BUTTON
if ($next_btn && $cur_page < $no_of_paginations) {
    $nex = $cur_page + 1;
    $msg .= "<li p='$nex' onclick='javascript:rrr1({$nex});'  class='active'>Next</li>";
} else if ($next_btn) {
    $msg .= "<li class='inactive'>Next</li>";
}

// TO ENABLE THE END BUTTON
if ($last_btn && $cur_page < $no_of_paginations) {
    $msg .= "<li p='$no_of_paginations' onclick='javascript:rrr1({$no_of_paginations});'   class='active'>Last</li>";
} else if ($last_btn) {
    $msg .= "<li p='$no_of_paginations' class='inactive'>Last</li>";
}
$goto = "<input type='text' class='goto' size='1' style='margin-top:-1px;margin-left:60px;'/><input type='button' id='go_btn' class='go_button' value='Go'/>";
$total_string = "<span class='total' a='$no_of_paginations'>Page <b>" . $cur_page . "</b> of <b>$no_of_paginations</b></span>";
$msg = $msg . "</ul></div>";  // Content for pagination
echo $msg;

}


	
	}
	function __gta_hotel_availabilty()
	{
		
		$room_used_type=$_SESSION['room_used_type'];
		$city=$_SESSION['city'];
		$sd=$_SESSION['sd'];
		$room_count=$_SESSION['room_count'];
		$ed=$_SESSION['ed'];
		$city_val = $this->Hotel_Model->get_city_code($city);  
		$city_code = $city_val->gta;
		
		$cinval = explode("-",$sd);
		$cin = $cinval[2].'-'.$cinval[1].'-'.$cinval[0];
		$coutval = explode("-",$ed);
		$cout = $coutval[2].'-'.$coutval[1].'-'.$coutval[0];
			$sb_room_cnt =0;
		$db_room_cnt =0;
		$tb_room_cnt =0;
		$q_room_cnt =0;
		$dbc_room_cnt =0;
		$dbcc_room_cnt =0;
$room1='';
$hotelbed_rooms='';
		for($k=0;$k< $room_count;$k++)
		{
			if($room_used_type[$k]=='sb')
			{
				$sb_room_cnt =$sb_room_cnt + 1;
			}
			if($room_used_type[$k]=='db')
			{
				$db_room_cnt =$db_room_cnt + 1;
			}
			if($room_used_type[$k]=='dbc')
			{
				$dbc_room_cnt =$dbc_room_cnt + 1;
			}
			if($room_used_type[$k]=='dbcc')
			{
				$dbcc_room_cnt =$dbcc_room_cnt + 1;
			}
			if($room_used_type[$k]=='tr')
			{
				$tb_room_cnt =$tb_room_cnt + 1;
			}
			if($room_used_type[$k]=='qu')
			{
				$q_room_cnt =$q_room_cnt + 1;
			}

		}
		if($sb_room_cnt > 0)
			{
				$roomCode = 'SB';
				$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$sb_room_cnt.'"></Room>';

			}
			if($db_room_cnt > 0)
			{
				$roomCode = 'DB'; //'db';
				$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$db_room_cnt.'"></Room>';
			}
			if($q_room_cnt > 0)
			{
				$roomCode = 'Q'; //'db';
				$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$q_room_cnt.'"></Room>';
			}

			if($tb_room_cnt > 0)
			{
				$roomCode = 'TR'; //'db';
				$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$tb_room_cnt.'"></Room>';
			}
			if($dbc_room_cnt > 0)
			{
				$roomCode = 'DB'; //'db';
				if($dbc_room_cnt=='2')
				{
					$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$dbc_room_cnt.'">
								<ExtraBeds>
									<Age>5</Age>
									<Age>7</Age>
								</ExtraBeds>

							</Room>';
				}else if($dbc_room_cnt=='3'){
					$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$dbc_room_cnt.'">
								<ExtraBeds>
									<Age>5</Age>
									<Age>7</Age>
									<Age>5</Age>
								</ExtraBeds>

							</Room>';
					}
					else
					{
						$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$dbc_room_cnt.'">
								<ExtraBeds>
									<Age>5</Age>
								</ExtraBeds></Room>';
					}

			}
			if($dbcc_room_cnt > 0)
			{
			$roomCode = 'DB'; //'db';

				if($dbcc_room_cnt == '2')
				{
					$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$dbcc_room_cnt.'">
                                  <ExtraBeds>
									<Age>5</Age>
									<Age>7</Age>
									<Age>5</Age>
									<Age>3</Age>
								  </ExtraBeds>

							</Room>';
				}else if($dbcc_room_cnt == '3'){
					$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$dbcc_room_cnt.'">
								<ExtraBeds>
									<Age>5</Age>
									<Age>7</Age>
									<Age>5</Age>
									<Age>3</Age>
									<Age>5</Age>
									<Age>3</Age>
								</ExtraBeds>

							</Room>';
					}
					else if($dbcc_room_cnt == '1')
					{
						$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$dbcc_room_cnt.'">
<ExtraBeds>
									
									<Age>5</Age>
									<Age>3</Age>
								</ExtraBeds>
							</Room>';
					}
			}

			

			$roomtype[]=$roomCode;

		$client = 1184;
		$email = 'XML.PROVAB@ITRAVELUKRAINE.COM';
		$pass = 'PASS';
		$request = '<?xml version="1.0" encoding="UTF-8" ?>
		<Request>
		<Source>
			<RequestorID Client="'.$client.'" EMailAddress="'.$email.'" Password="'.$pass.'" />
				<RequestorPreferences Language="en" Currency="USD">
					<RequestMode>SYNCHRONOUS</RequestMode>
				</RequestorPreferences>
		</Source>
		<RequestDetails>
			<SearchHotelPriceRequest><ItemDestination DestinationType="city" DestinationCode="'.$city_code.'" /><ImmediateConfirmationOnly />
				<PeriodOfStay>
					<CheckInDate>'.$cin.'</CheckInDate>
					<CheckOutDate>'.$cout.'</CheckOutDate>
				</PeriodOfStay>
				<Rooms>
					'.$room1.'
				</Rooms>
				<OrderBy>pricelowtohigh</OrderBy>
			</SearchHotelPriceRequest>
		</RequestDetails>
		</Request>';
		//echo $request;exit;
		$URL2 = "https://interface.demo.gta-travel.com/wbsapi/RequestListenerServlet";//local demo
		$ch2=curl_init();
        curl_setopt($ch2, CURLOPT_URL, $URL2);
        curl_setopt($ch2, CURLOPT_TIMEOUT, 180);
        curl_setopt($ch2, CURLOPT_HEADER, 0);
        curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch2, CURLOPT_POST, 1);
        curl_setopt($ch2, CURLOPT_POSTFIELDS, $request);
		curl_setopt($ch2, CURLOPT_SSL_VERIFYHOST, 1);
		curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch2, CURLOPT_SSLVERSION, 3);
	  	curl_setopt($ch2, CURLOPT_FOLLOWLOCATION, true);

        $httpHeader2 = array(
            "Content-Type: text/xml; charset=UTF-8",
            "Content-Encoding: UTF-8",
			"Accept-Encoding: gzip,deflate"
        );
        curl_setopt($ch2, CURLOPT_HTTPHEADER, $httpHeader2);
		curl_setopt ($ch2, CURLOPT_ENCODING, "gzip,deflate");

        // Execute request, store response and HTTP response code
        $data2=curl_exec($ch2);
        $error2=curl_getinfo( $ch2, CURLINFO_HTTP_CODE );
        curl_close($ch2);
		
		if(!empty($data2))
		{/*
				$dom2=new DOMDocument();
				$dom2->loadXML($data2);
				$hotel=$dom2->getElementsByTagName("Hotel");
				foreach($hotel as $val)
				{
				$item = $val->getElementsByTagName("Item");
				$itemVal=$item->item(0)->nodeValue;
				$itemCode=$item->item(0)->getAttribute("Code");
				$room = $val->getElementsByTagName("RoomCategory");
				$i=0;
				foreach($room as $category)
				{
				$room_code=$room->item($i)->getAttribute("Id");
				$roomCategory = $category->getElementsByTagName("Description");
				$room_type=$roomCategory->item(0)->nodeValue;
				$cost = $category->getElementsByTagName("ItemPrice");
				$cost_val=$cost->item(0)->nodeValue;
				$status = $category->getElementsByTagName("Confirmation");
				$status_val=$status->item(0)->nodeValue;
				$meals = $category->getElementsByTagName("Meals");
				$meals_val=$meals->item(0)->nodeValue;
				$api="gta";
				$i++;
				$sec_res=$_SESSION['ses_id'];
			    // store the temp search table
				$this->Hotel_Model->insert_gta_temp_result($sec_res,$api,$itemCode,$room_code,$room_type,$cost_val,$status_val,$meals_val);
				}
			  }
		*/
		
		include('XMLParser.class.php');
		
		//Set up the parser object
		$parser = new XMLParser($data2);
		//Work the magic...
		$parser->Parse();
		$apiData = array();
		$rows=0;
		
  if(isset($parser->document->responsedetails[0]->searchhotelpriceresponse[0]->hoteldetails[0]->hotel))
  {
			foreach($parser->document->responsedetails[0]->searchhotelpriceresponse[0]->hoteldetails[0]->hotel as $hotels)
			{
				$code = $hotels->item[0]->tagAttrs['code'];
				$cols = 0;
				foreach($hotels->roomcategories[0]->tagChildren as $roomcategory)
				{
					/*$apiData[$rows][$cols]['hotel_code'] = $code;
					$apiData[$rows][$cols]['room_code'] = $roomcategory->tagAttrs['id'];
					$apiData[$rows][$cols]['total_cost'] = $roomcategory->itemprice[0]->tagData;
					$apiData[$rows][$cols]['status'] = $roomcategory->confirmation[0]->tagData;
					$apiData[$rows][$cols]['inclusion'] = $roomcategory->meals[0]->basis[0]->tagData;
					$apiData[$rows][$cols]['room_type'] = $roomcategory->description[0]->tagData;
					$cols++;*/
					$sec_res=$_SESSION['ses_id'];
					$this->Hotel_Model->insert_gta_temp_result($sec_res,'gta',$code,$roomcategory->tagAttrs['id'],$roomcategory->description[0]->tagData,$roomcategory->itemprice[0]->tagData,$roomcategory->confirmation[0]->tagData,$roomcategory->meals[0]->basis[0]->tagData);
				}
				$rows++;
				
				
					
			}
  }
	
		
		}
		
	
	}
	function gta_table_ruby()
	{
		$this->load->view('hotel/test1');
	}
	function parseToXML($htmlStr) 
	{ 
	$xmlStr=str_replace('<','&lt;',$htmlStr); 
	$xmlStr=str_replace('>','&gt;',$xmlStr); 
	$xmlStr=str_replace('"','&quot;',$xmlStr); 
	$xmlStr=str_replace("'",'&#39;',$xmlStr); 
	$xmlStr=str_replace("&",'&amp;',$xmlStr); 
	return $xmlStr; 
	} 
	function ajax_map_show($result_id='')
	{
		  $map='<markers>';
	if($result_id!='')
	{
		$hot_lat_long=$this->Hotel_Model->get_searchresult($result_id);
		//echo "sss";echo'<pre/>';print_r($hot_lat_long);exit;
		  
			$lat1 = $hot_lat_long->latitude;
			$long1 = $hot_lat_long->longitude;
			$hotel_name1 =  $this->parseToXML($hot_lat_long->hotel_name);
			$star1 =  $hot_lat_long->star;
			$desc1 =  '';
			$pic1 =  WEB_DIR.'hotelspro_image1/'.$hot_lat_long->hotel_code.'.jpg';
			$city1 =  $hot_lat_long->city;
			$area1 =  $this->parseToXML($hot_lat_long->address);
		
			$hotel_id1 = $hot_lat_long->hotel_code;
			$totalcost1 = $hot_lat_long->total_cost;
			//$room_type1 = implode(",",$room_type11);
			$room_type1 ='';
			
			$map.='<marker ';
			$map.='name="' . $hotel_name1 . '" ';
			$map.='lat="' . $lat1 . '" ';
			$map.='lng="' . $long1 . '" ';
			$map.='star="' . $star1 . '" ';
			$map.='desc="' . $desc1 . '" ';
			$map.='roomtype="' . $room_type1 . '" ';
			$map.='totalcost="' . $totalcost1 . '" ';
			$map.='pic="' . $pic1 . '" ';
			
			$map.=" />";
			//$hot_lat_long_roomtype=$this->Search_Model->get_hotel_lat_long_roomtype_new($hotel_id1);
			//$hot_lat_long_roomtype=$this->Hotel_Model->get_hotel_lat_long_roomtype($hotel_id1);
		
			//	$totalcost11=array();
			//$room_type11=array();
			//for($i=0;$i < count($hot_lat_long_roomtype); $i++)
			//{
			//	$totalcost11[] =  $hot_lat_long_roomtype[$i]->cost_value;
		     //	$room_type11[] =  $hot_lat_long_roomtype[$i]->room_type;
			//}
			
			//echo'<pre/>';print_r($hot_lat_long_roomtype);exit;
			
	}
	//$lat1,$long1,$hotel_name1,$city1
			$page_hot_lat_long=$this->Hotel_Model->get_searchresult_all();
	
		for($w=0;$w< count($page_hot_lat_long);$w++)
		{
			$lat = $page_hot_lat_long[$w]->latitude;
			$long = $page_hot_lat_long[$w]->longitude;
			$hotel_name =  $this->parseToXML($page_hot_lat_long[$w]->hotel_name);
			$star =  $page_hot_lat_long[$w]->star;
			$desc =  '';
			//$room_type =  $page_hot_lat_long[$w]->room_type;
			$pic =  $page_hot_lat_long[$w]->image;
			//$totalcost =  $page_hot_lat_long[$w]->cost_value;
			$area =  $this->parseToXML($page_hot_lat_long[$w]->address);
			$hotel_id = $page_hot_lat_long[$w]->hotel_code;
			//$page_hot_lat_long_roomtype=$this->Search_Model->get_hotel_lat_long_roomtype_new($hotel_id);
			//$page_hot_lat_long_roomtype=$this->Search_Model->get_hotel_lat_long_roomtype($hotel_id);
			
			//$totalcosta2=array();
			//$room_typea2=array();
			
			//for($i=0;$i < count($page_hot_lat_long_roomtype); $i++)
			//{
			//	$totalcosta2[] =  $page_hot_lat_long_roomtype[$i]->cost_value;
		   //  	$room_typea2[] =  $page_hot_lat_long_roomtype[$i]->room_type;
			//}
		//	$totalcost = implode(",",$totalcosta2);
		//	$room_type = implode(",",$room_typea2);
			
			$room_type ='';
			$totalcost =$page_hot_lat_long[$w]->total_cost;
			//$page_hot_lat_long_roomtype=$this->Search_Model->get_hotel_lat_long_roomtype($hotel_id);
			
			$map.='<marker ';
			$map.='name="' . $hotel_name . '" ';
			$map.='lat="' . $lat . '" ';
			$map.='lng="' . $long . '" ';
			$map.='star="' . $star . '" ';
			$map.='roomtype="' . $room_type . '" ';
			$map.='desc="' . $desc . '" ';
			$map.='totalcost="' . $totalcost . '" ';
			$map.='pic="' . $pic . '" ';
			
			/*for($t=0;$t< count($page_hot_lat_long_roomtype);$t++)
			{
				$map.='roomtype="' .$page_hot_lat_long_roomtype[$t]->room_type . ','.$hot_lat_long_roomtype[$t]->cost_value .'" ';
			}*/
			
			$map.=" />";
		}
			
		
		
	
		$map .="</markers>";
		
		  echo $map;
	}
	function gta_table()
	{
		
	$citycode = $_POST['city'];
		set_time_limit(0);

		 
		  $client = 736;
		$email = 'kamal@solace.ae';
		$pass = '1001EVENTS';
		  $item_req ='<?xml version="1.0" encoding="UTF-8"?>
						<Request>
						  <Source>
						<RequestorID Client="'.$client.'" EMailAddress="'.$email.'" Password="'.$pass.'" />
							<RequestorPreferences Language="en">
								  <RequestMode>SYNCHRONOUS</RequestMode>
							</RequestorPreferences>
						  </Source>
							<RequestDetails>
								<SearchItemRequest ItemType="hotel">
									<ItemDestination DestinationType="city" DestinationCode="'.$citycode.'" />
									<ItemName></ItemName>
								</SearchItemRequest>
							</RequestDetails>
						</Request>';
		$URL2 = "https://interface.gta-travel.com/gtaapi/RequestListenerServlet";//local demo
		$ch2=curl_init();
        curl_setopt($ch2, CURLOPT_URL, $URL2);
        curl_setopt($ch2, CURLOPT_TIMEOUT, 180);
        curl_setopt($ch2, CURLOPT_HEADER, 0);
        curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch2, CURLOPT_POST, 1);
        curl_setopt($ch2, CURLOPT_POSTFIELDS, $item_req);
		curl_setopt($ch2, CURLOPT_SSL_VERIFYHOST, 1);
		curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch2, CURLOPT_SSLVERSION, 3);
	  	curl_setopt($ch2, CURLOPT_FOLLOWLOCATION, true);

        $httpHeader2 = array(
            "Content-Type: text/xml; charset=UTF-8",
            "Content-Encoding: UTF-8",
			
        );
        curl_setopt($ch2, CURLOPT_HTTPHEADER, $httpHeader2);
		curl_setopt ($ch2, CURLOPT_ENCODING, "gzip");

        // Execute request, store response and HTTP response code
        $data2=curl_exec($ch2);
        $error2=curl_getinfo( $ch2, CURLINFO_HTTP_CODE );
        curl_close($ch2);
		
		if(!empty($data2))
		{
				$dom2=new DOMDocument();
				$dom2->loadXML($data2);
				$ItemDetail=$dom2->getElementsByTagName("ItemDetail");
				foreach($ItemDetail as $val)
				{
				$item = $val->getElementsByTagName("Item");
			    $itemCode=$item->item(0)->getAttribute("Code");
				$item_info_req ='<?xml version="1.0" encoding="UTF-8"?>
				<Request>
				  <Source>
				<RequestorID Client="'.$client.'" EMailAddress="'.$email.'" Password="'.$pass.'" />
					<RequestorPreferences Language="en">
					<RequestMode>SYNCHRONOUS</RequestMode>
					</RequestorPreferences>

				  </Source>
					<RequestDetails>
						<SearchItemInformationRequest ItemType="hotel">
							<ItemDestination DestinationType="city" DestinationCode="'.$citycode.'" />
							<ItemCode>'.$itemCode.'</ItemCode>
						</SearchItemInformationRequest>
					</RequestDetails>

				</Request>';
				$URL2 = "https://interface.gta-travel.com/gtaapi/RequestListenerServlet";//local demo
				$ch2=curl_init();
				curl_setopt($ch2, CURLOPT_URL, $URL2);

				curl_setopt($ch2, CURLOPT_HEADER, 0);
				curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch2, CURLOPT_POST, 1);
				curl_setopt($ch2, CURLOPT_POSTFIELDS, $item_info_req);
				curl_setopt($ch2, CURLOPT_SSL_VERIFYHOST, 1);
				curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, FALSE);
				curl_setopt($ch2, CURLOPT_SSLVERSION, 3);
				curl_setopt($ch2, CURLOPT_FOLLOWLOCATION, true);
		
				$httpHeader2 = array(
					"Content-Type: text/xml; charset=UTF-8",
					"Content-Encoding: UTF-8",
					
				);
				curl_setopt($ch2, CURLOPT_HTTPHEADER, $httpHeader2);
				curl_setopt ($ch2, CURLOPT_ENCODING, "gzip");
		
				// Execute request, store response and HTTP response code
				$data3=curl_exec($ch2);
				$error2=curl_getinfo( $ch2, CURLINFO_HTTP_CODE );
				curl_close($ch2);
				
				$dom3=new DOMDocument();
				$dom3->loadXML($data3);
				$City=$dom3->getElementsByTagName("City");
				$City_val='';
				
				foreach($City as $ddd)
				{
				$City_val=$City->item(0)->nodeValue;
				}
				$Item=$dom3->getElementsByTagName("Item");
				$itemVal='';
				foreach($Item as $Itemaa)
				{
				$itemVal=$Item->item(0)->nodeValue;
				$itemCode=$Item->item(0)->getAttribute("Code");
				}
			   
				
				$StarRating=$dom3->getElementsByTagName("StarRating");
				$star='';
				foreach($StarRating as $cccc )
				{
				$star=$StarRating->item(0)->nodeValue;
				}
				
				
				
				$Image=$dom3->getElementsByTagName("Image");
				$Image_val = '';
				foreach($Image as $Imageval)
				{
					$Image_val=$Image->item(0)->nodeValue;
				}
				
				//echo $Image_val;exit;
				$Report=$dom3->getElementsByTagName("Report");
				$Report_val = array();
				$j=0;
				foreach($Report as $Reportval)
				{
					$Report_val[]=$Report->item($j)->nodeValue;
					$j++;
				}
				$report_value= implode("<br>",$Report_val);
				
				$Location=$dom3->getElementsByTagName("Location");
				$Location_val = array();
				$k=0;
				foreach($Location as $Locationval)
				{
					$Location_val[]=$Location->item($k)->nodeValue;
					$k++;
				}
				$location_value= implode(",",$Location_val);
				
				
				$Latitude=$dom3->getElementsByTagName("Latitude");
				$lati='';
				foreach($Latitude as $Latitudeval)
				{
					$lati=$Latitude->item(0)->nodeValue;
				}
				
				$Longitude=$dom3->getElementsByTagName("Longitude");
				$longi='';
				foreach($Longitude as $Longitudeval)
				{
					$longi=$Longitude->item(0)->nodeValue;
				}

$api='gta';
				$Report=$dom3->getElementsByTagName("Report");
				$Report_val = array();
				$j=0;
				foreach($Report as $Reportval)
				{
					$Report_val[]=$Report->item($j)->nodeValue;
					$j++;
				}
				
				
				$RoomFacilities=$dom3->getElementsByTagName("RoomFacilities");
				
				foreach($RoomFacilities as $RoomFacilitiessal)
				{
					$j=0;
					$Facility=$RoomFacilitiessal->getElementsByTagName("Facility");
					foreach($Facility as $Facilityssss)
					{
						
						$Facility_val=$Facility->item($j)->nodeValue;
						$this->Hotel_Model->insert_room_fac_hotel($itemCode,$Facility_val);
						$j++;
						
					}
					
				}
				
				$Facilities=$dom3->getElementsByTagName("Facilities");
				
				foreach($Facilities as $Facilitiesaaa)
				{
					$h=0;
					$Facility=$Facilitiesaaa->getElementsByTagName("Facility");
					foreach($Facility as $Facilityaaaa)
					{
						
						$Facility_val=$Facility->item($h)->nodeValue;
						$this->Hotel_Model->insert_room_fac_hotel1($itemCode,$Facility_val);
						$h++;
						
					}
					
				}
				
				
			
			
			$A1='';$A2='';$A3='';
				$AddressLine1=$dom3->getElementsByTagName("AddressLine1");
				foreach($AddressLine1 as $AddressLine11111)
				{
					$A1=$AddressLine1->item(0)->nodeValue;
				
				}
				$AddressLine2=$dom3->getElementsByTagName("AddressLine2");
				foreach($AddressLine2 as $AddressLine2111)
				{
					$A2=$AddressLine2->item(0)->nodeValue;
				
				}
				$AddressLine3=$dom3->getElementsByTagName("AddressLine3");
				foreach($AddressLine3 as $AddressLine311111)
				{
					$A3=$AddressLine3->item(0)->nodeValue;
				
				}
				$address  = $A1."<br>".$A2."<br>".$A3;
				$fax_val='';
				$tel_val='';
				$Telephone=$dom3->getElementsByTagName("Telephone");
				foreach($Telephone as $Telephone11111)
				{
					$tel_val=$Telephone->item(0)->nodeValue;
				
				}
				$Fax=$dom3->getElementsByTagName("Fax");
				foreach($Fax as $Fax11111)
				{
					$fax_val=$Fax->item(0)->nodeValue;
				
				}
			if($Image_val !='')
			{
				$img = 'E:/xampp/htdocs/WDM/provab/image_gta1/'.$itemCode.'.jpg';
				$img1 =$itemCode.'.jpg';
				@file_put_contents($img, file_get_contents($Image_val));
			}
			
			
				$this->Hotel_Model->insert_permenant_result_pro($itemCode,$itemVal,$City_val,$star,$report_value,$location_value,$lati,$longi,$api,$address,$tel_val,$fax_val);
			
			    }
		}
	
          
	
	}
	function gta_table_london()
	{
		
	
		set_time_limit(0);
		
		  $client = 736;
		$email = 'kamal@solace.ae';
		$pass = '1001EVENTS';
		  $item_req ='<?xml version="1.0" encoding="UTF-8"?>
						<Request>
						  <Source>
						<RequestorID Client="'.$client.'" EMailAddress="'.$email.'" Password="'.$pass.'" />
							<RequestorPreferences Language="en">
								  <RequestMode>SYNCHRONOUS</RequestMode>
							</RequestorPreferences>
						  </Source>
							<RequestDetails>
								<SearchItemRequest ItemType="hotel">
									<ItemDestination DestinationType="city" DestinationCode="LON" />
									<ItemName></ItemName>
								</SearchItemRequest>
							</RequestDetails>
						</Request>';
		$URL2 = "https://interface.gta-travel.com/gtaapi/RequestListenerServlet";//local demo
		$ch2=curl_init();
        curl_setopt($ch2, CURLOPT_URL, $URL2);
        curl_setopt($ch2, CURLOPT_TIMEOUT, 180);
        curl_setopt($ch2, CURLOPT_HEADER, 0);
        curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch2, CURLOPT_POST, 1);
        curl_setopt($ch2, CURLOPT_POSTFIELDS, $item_req);
		curl_setopt($ch2, CURLOPT_SSL_VERIFYHOST, 1);
		curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch2, CURLOPT_SSLVERSION, 3);
	  	curl_setopt($ch2, CURLOPT_FOLLOWLOCATION, true);

        $httpHeader2 = array(
            "Content-Type: text/xml; charset=UTF-8",
            "Content-Encoding: UTF-8",
			
        );
        curl_setopt($ch2, CURLOPT_HTTPHEADER, $httpHeader2);
		curl_setopt ($ch2, CURLOPT_ENCODING, "gzip");

        // Execute request, store response and HTTP response code
        $data2=curl_exec($ch2);
        $error2=curl_getinfo( $ch2, CURLINFO_HTTP_CODE );
        curl_close($ch2);
		
		if(!empty($data2))
		{
				$dom2=new DOMDocument();
				$dom2->loadXML($data2);
				$ItemDetail=$dom2->getElementsByTagName("ItemDetail");
				foreach($ItemDetail as $val)
				{
				$item = $val->getElementsByTagName("Item");
			    $itemCode=$item->item(0)->getAttribute("Code");
				$item_info_req ='<?xml version="1.0" encoding="UTF-8"?>
				<Request>
				  <Source>
				<RequestorID Client="'.$client.'" EMailAddress="'.$email.'" Password="'.$pass.'" />
					<RequestorPreferences Language="en">
					<RequestMode>SYNCHRONOUS</RequestMode>
					</RequestorPreferences>
				  </Source>
					<RequestDetails>
						<SearchItemInformationRequest ItemType="hotel">
							<ItemDestination DestinationType="city" DestinationCode="LON" />
							<ItemCode>'.$itemCode.'</ItemCode>
						</SearchItemInformationRequest>
					</RequestDetails>

				</Request>';
				$URL2 = "https://interface.gta-travel.com/gtaapi/RequestListenerServlet";//local demo
				$ch2=curl_init();
				curl_setopt($ch2, CURLOPT_URL, $URL2);

				curl_setopt($ch2, CURLOPT_HEADER, 0);
				curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch2, CURLOPT_POST, 1);
				curl_setopt($ch2, CURLOPT_POSTFIELDS, $item_info_req);
				curl_setopt($ch2, CURLOPT_SSL_VERIFYHOST, 1);
				curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, FALSE);
				curl_setopt($ch2, CURLOPT_SSLVERSION, 3);
				curl_setopt($ch2, CURLOPT_FOLLOWLOCATION, true);
		
				$httpHeader2 = array(
					"Content-Type: text/xml; charset=UTF-8",
					"Content-Encoding: UTF-8",
					
				);
				curl_setopt($ch2, CURLOPT_HTTPHEADER, $httpHeader2);
				curl_setopt ($ch2, CURLOPT_ENCODING, "gzip");
		
				// Execute request, store response and HTTP response code
				$data3=curl_exec($ch2);
				$error2=curl_getinfo( $ch2, CURLINFO_HTTP_CODE );
				curl_close($ch2);
				
				$dom3=new DOMDocument();
				$dom3->loadXML($data3);
				$City=$dom3->getElementsByTagName("City");
				$City_val='';
				
				foreach($City as $ddd)
				{
				$City_val=$City->item(0)->nodeValue;
				}
				$Item=$dom3->getElementsByTagName("Item");
				$itemVal='';
				foreach($Item as $Itemaa)
				{

				$itemVal=$Item->item(0)->nodeValue;
				$itemCode=$Item->item(0)->getAttribute("Code");
				}
			   
				
				$StarRating=$dom3->getElementsByTagName("StarRating");
				$star='';
				foreach($StarRating as $cccc )
				{
				$star=$StarRating->item(0)->nodeValue;
				}
				
				
				
				$Image=$dom3->getElementsByTagName("Image");
				$Image_val = '';
				foreach($Image as $Imageval)
				{
					$Image_val=$Image->item(0)->nodeValue;
				}
				
				//echo $Image_val;exit;
				$Report=$dom3->getElementsByTagName("Report");
				$Report_val = array();
				$j=0;
				foreach($Report as $Reportval)
				{
					$Report_val[]=$Report->item($j)->nodeValue;
					$j++;
				}
				$report_value= implode("<br>",$Report_val);
				
				$Location=$dom3->getElementsByTagName("Location");
				$Location_val = array();
				$k=0;
				foreach($Location as $Locationval)
				{
					$Location_val[]=$Location->item($k)->nodeValue;
					$k++;
				}
				$location_value= implode(",",$Location_val);
				
				
				$Latitude=$dom3->getElementsByTagName("Latitude");
				$lati='';
				foreach($Latitude as $Latitudeval)
				{
					$lati=$Latitude->item(0)->nodeValue;
				}
				
				$Longitude=$dom3->getElementsByTagName("Longitude");
				$longi='';
				foreach($Longitude as $Longitudeval)
				{
					$longi=$Longitude->item(0)->nodeValue;
				}

$api='gta';
				$Report=$dom3->getElementsByTagName("Report");
				$Report_val = array();
				$j=0;
				foreach($Report as $Reportval)
				{
					$Report_val[]=$Report->item($j)->nodeValue;
					$j++;
				}
				
				
				$RoomFacilities=$dom3->getElementsByTagName("RoomFacilities");
				
				foreach($RoomFacilities as $RoomFacilitiessal)
				{
					$j=0;
					$Facility=$RoomFacilitiessal->getElementsByTagName("Facility");
					foreach($Facility as $Facilityssss)
					{
						
						$Facility_val=$Facility->item($j)->nodeValue;
						$this->Hotel_Model->dummy_insert_room_fac_hotel_pro1($itemCode,$Facility_val);
						$j++;
						
					}
					
				}
				
				$Facilities=$dom3->getElementsByTagName("Facilities");
				
				foreach($Facilities as $Facilitiesaaa)
				{
					$h=0;
					$Facility=$Facilitiesaaa->getElementsByTagName("Facility");
					foreach($Facility as $Facilityaaaa)
					{
						
						$Facility_val=$Facility->item($h)->nodeValue;
						$this->Hotel_Model->dummy_insert_room_fac_hotel_pro($itemCode,$Facility_val);
						$h++;
						
					}
					
				}
				
				
			
			
			$A1='';$A2='';$A3='';
				$AddressLine1=$dom3->getElementsByTagName("AddressLine1");
				foreach($AddressLine1 as $AddressLine11111)
				{
					$A1=$AddressLine1->item(0)->nodeValue;
				
				}
				$AddressLine2=$dom3->getElementsByTagName("AddressLine2");
				foreach($AddressLine2 as $AddressLine2111)
				{
					$A2=$AddressLine2->item(0)->nodeValue;
				
				}
				$AddressLine3=$dom3->getElementsByTagName("AddressLine3");
				foreach($AddressLine3 as $AddressLine311111)
				{
					$A3=$AddressLine3->item(0)->nodeValue;
				
				}
				$address  = $A1."<br>".$A2."<br>".$A3;
				$fax_val='';
				$tel_val='';
				$Telephone=$dom3->getElementsByTagName("Telephone");
				foreach($Telephone as $Telephone11111)
				{
					$tel_val=$Telephone->item(0)->nodeValue;
				
				}
				$Fax=$dom3->getElementsByTagName("Fax");
				foreach($Fax as $Fax11111)
				{
					$fax_val=$Fax->item(0)->nodeValue;
				
				}
			if($Image_val !='')
			{
				$img = 'E:/xampp/htdocs/WDM/provab/dummy_image/'.$itemCode.'.jpg';
				$img1 =$itemCode.'.jpg';
				@file_put_contents($img, file_get_contents($Image_val));
			}
			
			$Chainval='';
				$this->Hotel_Model->dummy_insert_permenant_result_pro($itemCode,$itemVal,$City_val,$star,$report_value,$location_value,$lati,$longi,$api,$address,$tel_val,$fax_val,$Chainval);
			
			    }
		}
	
          
	
	}
	function city_mapping()
	{
		
		$city1=$this->Hotel_Model->get_test();
		//echo "<pre/>";
		//print_r($city);exit;
		for($i=0;$i< count($city1);$i++)
		{
			$city=$this->Hotel_Model->get_gtt($city1[$i]->namr);
			if($city!='')
			{
			 if($city->city == $city1[$i]->namr)
			 {
				  //echo $city[$i]->city;exit;
				  $this->Hotel_Model->update_gtt($city->city,$city1[$i]->code);
			  }
			 else
			  {
				  
				  $citycon = $city1[$i]->namr;
				  $a=explode(", ",$citycon);
				  $this->Hotel_Model->insert_gtt($city1[$i]->namr,$a[1],$a[0],$city1[$i]->code);
			  }
			}
			else
			  {
				  
				  $citycon = $city1[$i]->namr;
				  $a=explode(", ",$citycon);
				  $this->Hotel_Model->insert_gtt($city1[$i]->namr,$a[1],$a[0],$city1[$i]->code);
			  }
			
		}
	}
	function bed_test()
	{
		//$hotel=array('120184');
		 $hotel=$this->Hotel_Model->dummy_get_hotelbed_hotel('120184');
	    	for($l=0;$l < count($hotel);$l++)
		
			{
			 $hotelcode = $hotel[$l]->HOTELCODE;
			 echo $hotelcode;
			 $name = $hotel[$l]->NAME;
			 $star = $hotel[$l]->CATEGORYCODE[0];
			 $lati = $hotel[$l]->LATITUDE;
			 $longi = $hotel[$l]->LONGITUDE;
			 
			 $contact=$this->Hotel_Model->gethb_hoteldetails($hotelcode);
			 if($contact!='')
			 {
			 $city = $contact->CITY;
			 $address = $contact->ADDRESS.' - '.$contact->POSTALCODE;
			 }
			 else
			 {
				$city = '';
				$address ='';
			 }
			 $image=$this->Hotel_Model->get_hotelbed_image($hotelcode);
			 if($image!='')
			 {
			 $imageval = 'http://www.hotelbeds.com/giata/'.$image->IMAGEPATH;
			 }
			 else
			 {
				 $imageval = '';
			 }
			 $phone=$this->Hotel_Model->get_hotelbed_phone($hotelcode);
			 if($phone!='')
			 {
			 $phoneval = $phone->NUMBER_;
			 }
			 else
			 {
				$phoneval =''; 
			 }
			 
			  $desc=$this->Hotel_Model->gethb_hotelfacility($hotelcode);
			  if($desc!='')
			  {
				  	 $descval = $desc->HotelFacilities;
			  }
			  else
			  {
				   $descval ='';
			  }
			 
			 $fax=$this->Hotel_Model->get_hotelbed_fax($hotelcode);
			 if($fax!='')
			  {
				  	 $faxval = $fax->NUMBER_;
			  }
			  else
			  {
				 $faxval ='';
			  }
			 
			 $api='hotelsbed';
			
			 $zone = $hotel[$l]->ZONECODE; 
			 $cityid = $hotel[$l]->DESTINATIONCODE;
			 $Chainval = $hotel[$l]->CHAINCODE;
			 
			 $zone_name=$this->Hotel_Model->get_zone_id($zone,$cityid);
			 if($zone_name!='')
			 {
			 $location_value = $zone_name->NAME;
			 }
			 else
			 {
				 $location_value=''; 
			 }
			  
			   if($imageval!='')
			   {
				$img = 'E:/xampp/htdocs/WDM/provab/hotelsbed_image/'.$hotelcode.'.jpg';
				$img1 =$hotelcode.'.jpg';
				@file_put_contents($img, file_get_contents($imageval));
			   }
				
				////////////////////////////////////////
				$hotel_fac = $this->Hotel_Model->gethb_hotelfec($hotelcode);
				
			    $hotel_room = $this->Hotel_Model->gethb_hotelroom($hotelcode);
	
				
				if($hotel_fac != '')
			 {
				
				 for($q=0;$q< count($hotel_fac);$q++)
				 {
				$this->Hotel_Model->insert_room_fac_hotel_pro($hotelcode,$hotel_fac[$q]);
				 }
			 }
			
			  if($hotel_room != '')
			 {
				
				 for($j=0;$j< count($hotel_room);$j++)
				 {
				$this->Hotel_Model->insert_room_fac_hotel_pro1($hotelcode,$hotel_room[$j]);
				 }
			 }
				echo $l."<br>";
				
				
			$this->Hotel_Model->insert_permenant_result_pro($hotelcode,$name,$city,$star,$descval,$location_value,$lati,$longi,$api,$address,$phoneval,$faxval,$Chainval);
			}
	}
	function test_bed()
	{
	$this->load->view('hotel/test');	
	}
	function ruby_bed()
	{
		//$hotelcode = $_POST['city'];
		$hotelcode="'LON','PAR'";
	//	echo $hotelcode;exit;
		 $hotel=$this->Hotel_Model->dummy_get_hotelbed_hotel_by_id($hotelcode);
		 $hotel_count = count($hotel);
		 echo $hotel_count.'<br>';
		 for($l=0;$l< $hotel_count;$l++)
		 {
			
			 $hotelcode = $hotel[$l]->HOTELCODE;
			 echo $hotelcode.' - ';
			 $name = $hotel[$l]->NAME;
			 $star = $hotel[$l]->CATEGORYCODE[0];
			 $lati = $hotel[$l]->LATITUDE;
			 $longi = $hotel[$l]->LONGITUDE;
			  echo ' - ';
			  if($hotelcode!= '78864')
			  {
			 $contact=$this->Hotel_Model->gethb_hoteldetails($hotelcode);
			 if($contact!='')
			 {
			 $city = $contact->CITY;
			 $address = $contact->ADDRESS.' - '.$contact->POSTALCODE;
			 }
			 else
			 {
				$city = '';
				$address ='';
			 }
			 echo ' - ';
			 $image=$this->Hotel_Model->get_hotelbed_image($hotelcode);
			 if($image!='')
			 {
			 $imageval = $image->IMAGEPATH;
			 }
			 else
			 {
				 $imageval = '';
			 }
			 echo ' - ';
			 $phone=$this->Hotel_Model->get_hotelbed_phone($hotelcode);
			 if($phone!='')
			 {
			 $phoneval = $phone->NUMBER_;
			 }
			 else
			 {
				$phoneval =''; 
			 }
			 echo ' - ';
			  $desc=$this->Hotel_Model->gethb_hotelfacility($hotelcode);
			  if($desc!='')
			  {
				  	 $descval = $desc->HotelFacilities;
			  }
			  else
			  {
				   $descval ='';
			  }
			 echo ' - ';
			 $fax=$this->Hotel_Model->get_hotelbed_fax($hotelcode);
			 if($fax!='')
			  {
				  	 $faxval = $fax->NUMBER_;
			  }
			  else
			  {
				 $faxval ='';
			  }
			 echo ' - ';
			 $api='hotelsbed';
			
			 $zone = $hotel[$l]->ZONECODE; 
			 $cityid = $hotel[$l]->DESTINATIONCODE;
			 $Chainval = $hotel[$l]->CHAINCODE;
			 
			 $zone_name=$this->Hotel_Model->get_zone_id($zone,$cityid);
			 echo ' - ';
			 if($zone_name!='')
			 {
			 $location_value = $zone_name->NAME;
			 }
			 else
			 {
				 $location_value=''; 
			 }
			   echo ' - ';
			  /* if($imageval!='')
			   {
				$img = 'E:/xampp/htdocs/WDM/provab/hotelsbed_image/'.$hotelcode.'.jpg';
				$img1 =$hotelcode.'.jpg';
				@file_put_contents($img, file_get_contents($imageval));
			   }*/
				 echo ' - ';
				////////////////////////////////////////
				$hotel_fac = $this->Hotel_Model->gethb_hotelfec($hotelcode);
				
			    $hotel_room = $this->Hotel_Model->gethb_hotelroom($hotelcode);
	
				 echo ' - ';
				if($hotel_fac != '')
			 {
				
				 for($q=0;$q< count($hotel_fac);$q++)
				 {
				$this->Hotel_Model->insert_room_fac_hotel_pro($hotelcode,$hotel_fac[$q]);
				 }
			 }
			 echo ' - ';
			  if($hotel_room != '')
			 {
				
				 for($j=0;$j< count($hotel_room);$j++)
				 {
				$this->Hotel_Model->insert_room_fac_hotel_pro1($hotelcode,$hotel_room[$j]);
				 }
			 }
			  echo ' - ';
				echo $l."<br>";
				
				
			$this->Hotel_Model->insert_permenant_result_pro($hotelcode,$name,$city,$star,$descval,$location_value,$lati,$longi,$api,$address,$phoneval,$faxval,$Chainval,$imageval);
			  }
		 }

	}
	function ruby_bed_london()
	{
		 $hotel=$this->Hotel_Model->dummy_get_hotelbed_hotel();
		
		 for($i=0;$i< count($hotel);$i++)
		 {
			 $hotelcode = $hotel[$i]->HOTELCODE;
			 $name = $hotel[$i]->NAME;
			 $star = $hotel[$i]->CATEGORYCODE[0];
			 $lati = $hotel[$i]->LATITUDE;
			 $longi = $hotel[$i]->LONGITUDE;
			 
			 $contact=$this->Hotel_Model->gethb_hoteldetails($hotelcode);
			 if($contact!='')
			 {
			 $city = $contact->CITY;
			 $address = $contact->ADDRESS.' - '.$contact->POSTALCODE;
			 }
			 else
			 {
				  $city = '';
				   $address = '';
			 }
			 $image=$this->Hotel_Model->get_hotelbed_image($hotelcode);
			 if($image!='')
			 {
			 $imageval = 'http://www.hotelbeds.com/giata/'.$image->IMAGEPATH;
			 }
			 else
			 {
				 $imageval = '';
			 }
			 $phone=$this->Hotel_Model->get_hotelbed_phone($hotelcode);
			 if($phone!='')
			 {
			 $phoneval = $phone->NUMBER_;
			 }
			 else
			 {
				$phoneval =''; 
			 }
			  $desc=$this->Hotel_Model->gethb_hotelfacility($hotelcode);
			  if($desc!='')
			  {
			 $descval = $desc->HotelFacilities;
			  }
			  else
			  {
				$descval = '';  
			  }
			 $fax=$this->Hotel_Model->get_hotelbed_fax($hotelcode);
			 if($fax!='')
			 {
			 $faxval = $fax->NUMBER_;
			 }
			 else
		 {
			 $faxval='';
		 }
			 $api='hotelsbed';
			 $location_value='';
			    
				$img = 'E:/xampp/htdocs/WDM/provab/dummy_image/'.$hotelcode.'.jpg';
				$img1 =$hotelcode.'.jpg';
				@file_put_contents($img, file_get_contents($imageval));
				
				$chainval='';
				
			//	$hotel_fac = $this->Hotel_Model->gethb_hotelfec($hotelcode);
			//$hotel_room = $this->Hotel_Model->gethb_hotelroom($hotelcode);
		
			/*if(isset($hotel_room))
			{
			 if($hotel_room != '')
			 {
				 $a=explode(";",$hotel_room);
				  for($q=0;$q< count($a);$q++)
				 {
					$this->Hotel_Model->dummy_insert_room_fac_hotel_pro1($hotelcode,$a[$q]);
				 }
			 }
			}
			if(isset($room_fac))
			{
			  if($room_fac != '')
			 {
				 $b=explode(";",$room_fac);
				 for($j=0;$j< count($b);$j++)
				 {
				$this->Hotel_Model->dummy_insert_room_fac_hotel_pro($hotelcode,$b[$j]);
				 }
			 }
			
			}*/
			$chainval='';
				//echo $hotelcode."<br>".$name."<br>".$city."<br>".$star."<br>".$img1."<br>".$descval."<br>".$location_value."<br>".$lati."<br>".$longi."<br>".$api."<br>".$address."<br>".$phoneval."<br>".$faxval;exit;
			$this->Hotel_Model->dummy_insert_permenant_result_pro($hotelcode,$name,$city,$star,$descval,$location_value,$lati,$longi,$api,$address,$phoneval,$faxval,$chainval);
		 }
		
	}
	function ruby_pro_london()
	{
		
		ini_set("memory_limit","1400M");
        set_time_limit(0);
		 $hotel=$this->Hotel_Model->dummy_hotelspri_city();
		
		
		 for($i=0;$i< count($hotel);$i++)
		 {
			 $hotelcode = $hotel[$i]->HotelCode;
			 $name = $hotel[$i]->HotelName;
			 $star = $hotel[$i]->StarRating;
			 $lati = $hotel[$i]->Latitude;
			 $longi = $hotel[$i]->Longitude;
			 
			 $city = $hotel[$i]->Destination;
			 $address = $hotel[$i]->HotelAddress.' - '.$hotel[$i]->HotelPostalCode;
			 
		     $imageval = $hotel[$i]->HotelImages1;
			
			 $phoneval = $hotel[$i]->HotelPhoneNumber;
			 
			 $Chainval = $hotel[$i]->Chain;
			 
			 
			 $desc=$this->Hotel_Model->get_hotelspro_desc($hotelcode);
			 if($desc!='')
			 {
			 $descval1 = $desc->HotelInfo;
			 if($descval1 != '')
			 {
				 $descval=$descval1;
			 }
			 else
			 {
				 $descval='';
			 }
			 
			 $location_value1 = $desc->HotelLocation;
			if($location_value1 != '')
			 {
				 $location_value=$location_value1;
			 }
			 else
			 {
				 $location_value='';
			 }
			 }
			 else
			 {
				$location_value='';
				$descval='';
				 
			 }
			 $faxval = '';
			 $api='hotelspro';
			 
			  $fac=$this->Hotel_Model->get_hotelspro_fac($hotelcode);
			  if($fac !='')
			  {
			  $hotel_fac = $fac->PAmenities;
			  $room_fac = $fac->RAmenities;
			 if($hotel_fac != '')
			 {
				 $a=explode(";",$hotel_fac);
				 for($q=0;$q< count($a);$q++)
				 {
				$this->Hotel_Model->dummy_insert_room_fac_hotel_pro($hotelcode,$a[$q]);
				 }
			 }
			
			  if($room_fac != '')
			 {
				 $b=explode(";",$room_fac);
				 for($j=0;$j< count($b);$j++)
				 {
				$this->Hotel_Model->dummy_insert_room_fac_hotel_pro1($hotelcode,$b[$j]);
				 }
			 }
			
			  }
			  else
			  {

				  $c='';
				  $this->Hotel_Model->dummy_insert_room_fac_hotel_pro($hotelcode,$c);
				$this->Hotel_Model->dummy_insert_room_fac_hotel_pro1($hotelcode,$c);  
			  }
				$img = 'E:/xampp/htdocs/WDM/provab/dummy_image/'.$hotelcode.'.jpg';
				$img1 =$hotelcode.'.jpg';
				@file_put_contents($img, file_get_contents($imageval));
				
				
				
				//echo $hotelcode."<br>".$name."<br>".$city."<br>".$star."<br>".$img1."<br>".$descval."<br>".$location_value."<br>".$lati."<br>".$longi."<br>".$api."<br>".$address."<br>".$phoneval."<br>".$faxval;exit;
			$this->Hotel_Model->dummy_insert_permenant_result_pro($hotelcode,$name,$city,$star,$descval,$location_value,$lati,$longi,$api,$address,$phoneval,$faxval,$Chainval);
		 }
		
	}
	
	function ruby_pro()
	{
		ini_set("memory_limit","1400M");
    set_time_limit(0);
		 $hotel=$this->Hotel_Model->get_hotelbed_hotel_pro();
		
		 for($i=0;$i< count($hotel);$i++)
		 {
			 $hotelcode = $hotel[$i]->HotelCode;
			 $name = $hotel[$i]->HotelName;
			 $star = $hotel[$i]->StarRating;
			 $lati = $hotel[$i]->Latitude;
			 $longi = $hotel[$i]->Longitude;
			 
			 $city = $hotel[$i]->Destination;
			 $address = $hotel[$i]->HotelAddress.' - '.$hotel[$i]->HotelPostalCode;
			 
		     $imageval = $hotel[$i]->HotelImages1;
			
			 $phoneval = $hotel[$i]->HotelPhoneNumber;
			 
			 $Chainval = $hotel[$i]->Chain;
			 
			 
			 $desc=$this->Hotel_Model->get_hotelspro_desc($hotelcode);
			 if($desc!='')
			 {
			 $descval1 = $desc->HotelInfo;
			 if($descval1 != '')
			 {
				 $descval=$descval1;
			 }
			 else
			 {
				 $descval='';
			 }
			 
			 $location_value1 = $desc->HotelLocation;
			if($location_value1 != '')
			 {
				 $location_value=$location_value1;
			 }
			 else
			 {
				 $location_value='';
			 }
			 }
			 else
			 {
				  $descval='';
				   $location_value='';
				  
			 }
			 $faxval = '';
			 $api='hotelspro';
			 
			  $fac=$this->Hotel_Model->get_hotelspro_fac($hotelcode);
			  if($fac!='')
			  {
			  $hotel_fac = $fac->PAmenities;
			  $room_fac = $fac->RAmenities;
			 if($hotel_fac != '')
			 {
				 $a=explode(";",$hotel_fac);
				 for($q=0;$q< count($a);$q++)
				 {
				$this->Hotel_Model->insert_room_fac_hotel_pro($hotelcode,$a[$q]);
				 }
			 }
			
			  if($room_fac != '')
			 {
				 $b=explode(";",$room_fac);
				 for($j=0;$j< count($b);$j++)
				 {
				$this->Hotel_Model->insert_room_fac_hotel_pro1($hotelcode,$b[$j]);
				 }
			 }
			  }
			  else
			  {
				  $c='';
				  $this->Hotel_Model->insert_room_fac_hotel_pro1($hotelcode,$c);
				  $this->Hotel_Model->insert_room_fac_hotel_pro($hotelcode,$c);
			  }
				
				$img = 'E:/xampp/htdocs/WDM/provab/image_hotelspro1/'.$hotelcode.'.jpg';
				$img1 =$hotelcode.'.jpg';
				@file_put_contents($img, file_get_contents($imageval));
				
				
				
				//echo $hotelcode."<br>".$name."<br>".$city."<br>".$star."<br>".$img1."<br>".$descval."<br>".$location_value."<br>".$lati."<br>".$longi."<br>".$api."<br>".$address."<br>".$phoneval."<br>".$faxval;exit;
			$this->Hotel_Model->insert_permenant_result_pro($hotelcode,$name,$city,$star,$descval,$location_value,$lati,$longi,$api,$address,$phoneval,$faxval,$Chainval);
		 }
		
	}
	function gta_permanent_detail()
	{
		echo "sss";exit;
		set_time_limit(0);
		 $city=$this->Hotel_Model->fetch_gta_city();
		
		 for($r=0;$r< count($city);$r++)
		 {
		  $client = 1184;
		$email = 'XML.PROVAB@ITRAVELUKRAINE.COM';
		$pass = 'PASS';
		  $item_req ='<?xml version="1.0" encoding="UTF-8"?>
						<Request>
						  <Source>
						<RequestorID Client="'.$client.'" EMailAddress="'.$email.'" Password="'.$pass.'" />
							<RequestorPreferences Language="en">
								  <RequestMode>SYNCHRONOUS</RequestMode>
							</RequestorPreferences>
						  </Source>
							<RequestDetails>
								<SearchItemRequest ItemType="hotel">
									<ItemDestination DestinationType="city" DestinationCode="'.$city[$r]->cityCode.'" />
									<ItemName></ItemName>
								</SearchItemRequest>
							</RequestDetails>
						</Request>';
		$URL2 = "https://interface.demo.gta-travel.com/wbsapi/RequestListenerServlet";//local demo
		$ch2=curl_init();
        curl_setopt($ch2, CURLOPT_URL, $URL2);
        curl_setopt($ch2, CURLOPT_TIMEOUT, 180);
        curl_setopt($ch2, CURLOPT_HEADER, 0);
        curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch2, CURLOPT_POST, 1);
        curl_setopt($ch2, CURLOPT_POSTFIELDS, $item_req);
		curl_setopt($ch2, CURLOPT_SSL_VERIFYHOST, 1);
		curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch2, CURLOPT_SSLVERSION, 3);
	  	curl_setopt($ch2, CURLOPT_FOLLOWLOCATION, true);

        $httpHeader2 = array(
            "Content-Type: text/xml; charset=UTF-8",
            "Content-Encoding: UTF-8",
			
        );
        curl_setopt($ch2, CURLOPT_HTTPHEADER, $httpHeader2);
		curl_setopt ($ch2, CURLOPT_ENCODING, "gzip");

        // Execute request, store response and HTTP response code
        $data2=curl_exec($ch2);
        $error2=curl_getinfo( $ch2, CURLINFO_HTTP_CODE );
        curl_close($ch2);
		
		if(!empty($data2))
		{
				$dom2=new DOMDocument();
				$dom2->loadXML($data2);
				$ItemDetail=$dom2->getElementsByTagName("ItemDetail");
				foreach($ItemDetail as $val)
				{
				$item = $val->getElementsByTagName("Item");
			    $itemCode=$item->item(0)->getAttribute("Code");
				$item_info_req ='<?xml version="1.0" encoding="UTF-8"?>
				<Request>
				  <Source>
				<RequestorID Client="'.$client.'" EMailAddress="'.$email.'" Password="'.$pass.'" />
					<RequestorPreferences Language="en">
					<RequestMode>SYNCHRONOUS</RequestMode>
					</RequestorPreferences>
				  </Source>
					<RequestDetails>
						<SearchItemInformationRequest ItemType="hotel">
							<ItemDestination DestinationType="city" DestinationCode="'.$city[$r]->cityCode.'" />
							<ItemCode>'.$itemCode.'</ItemCode>
						</SearchItemInformationRequest>
					</RequestDetails>

				</Request>';
				$URL2 = "https://interface.demo.gta-travel.com/wbsapi/RequestListenerServlet";//local demo
				$ch2=curl_init();
				curl_setopt($ch2, CURLOPT_URL, $URL2);

				curl_setopt($ch2, CURLOPT_HEADER, 0);
				curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch2, CURLOPT_POST, 1);
				curl_setopt($ch2, CURLOPT_POSTFIELDS, $item_info_req);
				curl_setopt($ch2, CURLOPT_SSL_VERIFYHOST, 1);
				curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, FALSE);
				curl_setopt($ch2, CURLOPT_SSLVERSION, 3);
				curl_setopt($ch2, CURLOPT_FOLLOWLOCATION, true);
		
				$httpHeader2 = array(
					"Content-Type: text/xml; charset=UTF-8",
					"Content-Encoding: UTF-8",
					
				);
				curl_setopt($ch2, CURLOPT_HTTPHEADER, $httpHeader2);
				curl_setopt ($ch2, CURLOPT_ENCODING, "gzip");
		
				// Execute request, store response and HTTP response code
				$data3=curl_exec($ch2);
				$error2=curl_getinfo( $ch2, CURLINFO_HTTP_CODE );
				curl_close($ch2);
				echo $data3;exit;
				
				$dom3=new DOMDocument();
				$dom3->loadXML($data3);
				$City=$dom3->getElementsByTagName("City");
				$City_val='';
				foreach($City as $ddd)
				{
				$City_val=$City->item(0)->nodeValue;
				}
				$Item=$dom3->getElementsByTagName("Item");
				$itemVal=$Item->item(0)->nodeValue;
				
			    $itemCode=$Item->item(0)->getAttribute("Code");
				
				$StarRating=$dom3->getElementsByTagName("StarRating");
				$star=$StarRating->item(0)->nodeValue;
				
				$StarRating=$dom3->getElementsByTagName("StarRating");
				$star = '';
				foreach($StarRating as $StarRatingval)
				{
					$star=$StarRating->item(0)->nodeValue;
				}
				
				$Image=$dom3->getElementsByTagName("Image");
				$Image_val = '';
				foreach($Image as $Imageval)
				{
					$Image_val=$Image->item(0)->nodeValue;
				}
				
				
				$Report=$dom3->getElementsByTagName("Report");
				$Report_val = array();
				foreach($Report as $Reportval)
				{
					$Report_val[]=$Report->item(0)->nodeValue;
				}
				$report_value= implode("<br>",$Report_val);

				
				$Location=$dom3->getElementsByTagName("Location");
				$Location_val = array();
				foreach($Location as $Locationval)
				{
					$Location_val[]=$Location->item(0)->nodeValue;
				}
				$location_value= implode(",",$Location_val);
				
				
				$Latitude=$dom3->getElementsByTagName("Latitude");
				$lati='';
				foreach($Latitude as $Latitudeval)
				{
					$lati=$Latitude->item(0)->nodeValue;
				}
				
				$Longitude=$dom3->getElementsByTagName("Longitude");
				$longi='';
				foreach($Longitude as $Longitudeval)
				{
					$longi=$Longitude->item(0)->nodeValue;
				}

$api='gta';
				
				
				$this->Hotel_Model->insert_permenant_result($itemCode,$itemVal,$City_val,$star,$Image_val,$report_value,$location_value,$lati,$longi,$api);
			    }
		}
	}
          
	}
	function hotelsbed_permanent_detail()
	{
		set_time_limit(0);
		 $city=$this->Hotel_Model->fetch_gta_city_hotelsbed();
		
		 for($r=0;$r< count($city);$r++)
		 {
		$refcode=date("YmdHis");
   		$xml_data ='<HotelValuedAvailRQ echoToken="DummyEchoToken" sessionId="'.$refcode.'" xmlns="http://www.hotelbeds.com/schemas/2005/06/messages" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.hotelbeds.com/schemas/2005/06/messages HotelValuedAvailRQ.xsd">
	<Language>ENG</Language>
	<Credentials>
	<User>PHUKETBNTH14573</User>
    <Password>PHUKETBNTH14573</Password>
	</Credentials>
	<PaginationData itemsPerPage="1999" pageNumber="1"/>
	<CheckInDate date="20120531"/>
	<CheckOutDate date="20120601"/>
	<Destination code="'.$city[$r]->DESTINATIONCODE.'" type="SIMPLE"/>
	<OccupancyList><HotelOccupancy>
				<RoomCount>1</RoomCount>
					<Occupancy>
						<AdultCount>1</AdultCount>
						<ChildCount>0</ChildCount>
					</Occupancy>
					</HotelOccupancy>
	</OccupancyList>
</HotelValuedAvailRQ>';
$URL = "http://212.170.239.71/appservices/http/FrontendService";//local
   			$ch = curl_init($URL);			
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml'));
			curl_setopt ($ch, CURLOPT_ENCODING, "gzip");
			curl_setopt($ch, CURLOPT_POSTFIELDS, "$xml_data");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		   $xmls = curl_exec($ch);
			$array=$this->xml2ary($xmls);
					//echo '<pre/>';
					//print_r($xmls);exit;
					
					
					
					
			
		  		
					 $dom = new DOMDocument();
					 $dom->loadXML($xmls);   
				  
					  $sh = $dom->getElementsByTagName( "ServiceHotel" );
					  $i=0;
					  foreach($sh as $val)
					  {
					  $HotelInfo = $val->getElementsByTagName( "HotelInfo" );
						  foreach( $HotelInfo as $HotelInfo1 )
						  {
								  $Code = $HotelInfo1->getElementsByTagName( "Code" );
								  $hotelCode = $Code->item(0)->nodeValue;
						
						$hotel_image= $this->Hotel_Model->gethb_hotelimage_new($hotelCode);
     					$hotel_hotel = $this->Hotel_Model->gethb_hoteldet($hotelCode);
						
						if($hotel_hotel!="")
						{
					    $lat=$hotel_hotel->LATITUDE;
						$long=$hotel_hotel->LONGITUDE;
						$HOTELNAME=$hotel_hotel ->NAME;
						$star_value=$hotel_hotel ->CATEGORYCODE;
						$star=$star_value[0];
						}else
						{
						$lat="0";
						$long="0";
						$HOTELNAME="";
						$star=0;
						}
						
					if($hotel_image!="")
					{
					 $img=$hotel_image[0]->IMAGEPATH;
					 $img1= "http://www.hotelbeds.com/giata/" . $img;
					 $img_array=$img1;
					 }
					 else
					 {
					 $img1="";
					 $img_array="";
					 }				
				$location_value='';
				$report_value='';
				$City_val=$city[$r]->NAME;
				$api='hotelsbed';
				$this->Hotel_Model->insert_permenant_result($hotelCode,$HOTELNAME,$City_val,$star,$img_array,$report_value,$location_value,$lat,$long,$api);
						  
							}					
							
						$i++;	  
					  }  
  		
		 }
				}
	function hotelspro_hotel_availabilty()
	{
		
		$room_used_type=$_SESSION['room_used_type'];
		$city=$_SESSION['city'];
		$sd=$_SESSION['sd'];
		$room_count=$_SESSION['room_count'];
		$ed=$_SESSION['ed'];
		$city_val = $this->Hotel_Model->get_city_code($city);  
		$city_code = $city_val->hotelspro;
		$cinval = explode("/",$sd);
		$cin = $cinval[2].'-'.$cinval[1].'-'.$cinval[0];
		$coutval = explode("/",$ed);
		$cout = $coutval[2].'-'.$coutval[1].'-'.$coutval[0];
			$sb_room_cnt =0;
		$db_room_cnt =0;
		$tb_room_cnt =0;
		$q_room_cnt =0;
		$dbc_room_cnt =0;
		$dbcc_room_cnt =0;
		$room1='';
		$hotelbed_rooms='';
		
		for($k=0;$k< $room_count;$k++)
		{
			if($room_used_type[$k]=='sb')
			{
				
				$sb_room_cnt =$sb_room_cnt + 1;
			}
			if($room_used_type[$k]=='db')
			{
				
				$db_room_cnt =$db_room_cnt + 1;
			}
			if($room_used_type[$k]=='dbc')
			{
				
				$dbc_room_cnt =$dbc_room_cnt + 1;
			}
			if($room_used_type[$k]=='dbcc')
			{
				$dbcc_room_cnt =$dbcc_room_cnt + 1;
			}
			if($room_used_type[$k]=='tr')
			{
				$tb_room_cnt =$tb_room_cnt + 1;
			}
			if($room_used_type[$k]=='qu')
			{
				$q_room_cnt =$q_room_cnt + 1;
			}

		}
		//for($i=0;$i< $count;$i++)
		//{

	$rooms = array();

//echo $sb_room_cnt.'--'.$db_room_cnt;exit;
		if($sb_room_cnt >0)
		{
			$tot_adult=1;
			for($h=0;$h< $sb_room_cnt;$h++)
			{
				  $rooms[] = array(array("paxType" => "Adult"));
			}

		}
		if($db_room_cnt>0)
		{
			
			$tot_adult=2;
			for($h=0;$h< $db_room_cnt;$h++)
			{
				 $rooms[] = array(array("paxType" => "Adult"), array("paxType" => "Adult"));
			}
		}

		if($dbc_room_cnt>0)
		{

			$tot_adult=2;
			$tot_child=1;
			for($h=0;$h< $dbc_room_cnt;$h++)
			{
				   $rooms[] = array(array("paxType" => "Adult"), array("paxType" => "Adult"), array("paxType" => "Child", "age" => 8));

			}

		}

		if($dbcc_room_cnt>0)
		{

			$tot_adult=2;
			$tot_child=2;
			for($h=0;$h< $dbcc_room_cnt;$h++)
			{
			
			   $rooms[] = array(array("paxType" => "Adult"), array("paxType" => "Adult"), array("paxType" => "Child", "age" => 8), array("paxType" => "Child", "age" => 8));
			}

		}
		if($tb_room_cnt >0)
		{
			$tot_adult=3;
			 $rooms[] = array(array("paxType" => "Adult"), array("paxType" => "Adult"), array("paxType" => "Adult"));
		}
	if($q_room_cnt>0)
		{
			$tot_adult=4;
			for($h=0;$h< $q_room_cnt;$h++)
			{
				 $rooms[] = array(array("paxType" => "Adult"), array("paxType" => "Adult"), array("paxType" => "Adult"), array("paxType" => "Adult"));
			}
		}
	
	// $client = new SoapClient("b2bHotelSOAP.wsdl", array('trace' => 1));
  $client = new SoapClient( "http://api.hotelspro.com/4.1/hotel/b2bHotelSOAP.wsdl", array('trace' => 1, 'compression' => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP));
  try {
       
					
	   /* $rooms[] = array(array("paxType" => "Adult"),array("paxType" => "Adult"));
		  $rooms[] = array(array("paxType" => "Adult"),array("paxType" => "Adult"),array("paxType" => "Adult"));*/
  
      $filters = array();
    //  $filters[] = array("filterType" => "hotelStar", "filterValue" => "3");
	   //   $filters[] = array("filterType" => "hotelName", "filterValue" => "Osterley Park Hotel");
   $filters[] = array("filterType" => "resultLimit", "filterValue" => "200");
      
      // make getAvailableHotel request (start search)
      $checkAvailability = $client->getAvailableHotel("TldsVFh3MEpXSnEwVWRSOHJWTGgzVlBzVDE5SHQzSDBwUm5SSmtQNUNXdmR0UXlPdGR5YUlRSkFtWDhocmk2Qg==", $city_code, $cin, $cout, "USD", "US", "false", $rooms, $filters);
  }
  catch (SoapFault $exception) {
      echo $exception->getMessage();
      exit;
  }	
 
	 
   if (is_object($checkAvailability->availableHotels)) 
  {
      $hotelResponse[] = $checkAvailability->availableHotels;
  } else 
  {
      $hotelResponse = $checkAvailability->availableHotels;
  }

  foreach ((array)$hotelResponse as $hnum => $hotel) 
  {

		$processId = $hotel->processId; 
		$hotelCode =  $hotel->hotelCode;
		$availabilityStatus = $hotel->availabilityStatus;
		$totalPrice = $hotel->totalPrice;
		$totalTax =  $hotel->totalTax;
		$currency =  $hotel->currency;
		$boardType =  $hotel->boardType;
  

      if (is_object($hotel->rooms))
	  {
          $roomResponse[] = $hotel;
      }
	  else 
	  {
          $roomResponse = $hotel->rooms;
      }
	  $roomCategory=array();
	//  $totalRoomRate=array();
	  $each_ngt_amount=array();
	  $totalcost_m_m_ddn=array();

      foreach ((array)$roomResponse as $rnum => $room) 
	  {

        $roomCategory[] = $room->roomCategory;
       
         $totalRoomRate =  $room->totalRoomRate;
       
          if (is_object($room->paxes)) 
		  {
              $roomsInfo[] = $room->paxes;
          } else 
		  {
              $roomsInfo = $room->paxes;
          }
		  
          if (is_object($room->ratesPerNight))
		  {
              $ratesPerNight[] = $room->ratesPerNight;
          } 
		  else 
		  {
              $ratesPerNight = $room->ratesPerNight;
          }
          
          foreach ((array)$roomsInfo as $pnum => $pax) 
		  {
              $paxType= $pax->paxType;
          }

          foreach ((array)$ratesPerNight as $rpnum => $price) 
		  {    
		   $priceeachrate = $price->date;
           $each_ngt_amount[] = $price->amount;
		 	
          }
		  $a=count($each_ngt_amount);
		
				$roomrateavg = $totalRoomRate/$a;
		unset($each_ngt_amount);
	   
		  $totalcost_m_m_ddn[]=$roomrateavg;
		  
	  
       }
	
				
		  $api="hotelspro";	

		
		   $totalcost_m_m = $totalPrice;
		
	        
	  $roomtype=implode("<br>",$roomCategory);
	  $totalRoomRate=implode("-",$totalcost_m_m_ddn);
	
         
	$api="hotelspro";

      $sec_res=$_SESSION['ses_id'];
				$this->Hotel_Model->insert_gta_temp_result($sec_res,'hotelspro',$hotelCode,$processId,$roomtype,$totalRoomRate,$availabilityStatus,$boardType);   
						 
  
    }
  
  
  
	}
	function hotelsbed_hotel_availabilty_pre()
	{
		$room_used_type=$_SESSION['room_used_type'];
		$city=$_SESSION['city'];
		$sd=$_SESSION['sd'];
		$room_count=$_SESSION['room_count'];
		$ed=$_SESSION['ed'];
		$city_val = $this->B2b_Hotel_Model->get_city_code($city);  
		$city_code = $city_val->hotelsbed;
		
		$cinval = explode("-",$sd);
		$cin = $cinval[2].$cinval[1].$cinval[0];
		$coutval = explode("-",$ed);
		$cout = $coutval[2].$coutval[1].$coutval[0];
			$sb_room_cnt =0;
		$db_room_cnt =0;
		$tb_room_cnt =0;
		$q_room_cnt =0;
		$dbc_room_cnt =0;
		$dbcc_room_cnt =0;
$room1='';
$hotelbed_rooms='';
		for($k=0;$k< $room_count;$k++)
		{
			if($room_used_type[$k]=='sb')
			{
				$sb_room_cnt =$sb_room_cnt + 1;
			}
			if($room_used_type[$k]=='db')
			{
				$db_room_cnt =$db_room_cnt + 1;
			}
			if($room_used_type[$k]=='dbc')
			{
				$dbc_room_cnt =$dbc_room_cnt + 1;
			}
			if($room_used_type[$k]=='dbcc')
			{
				$dbcc_room_cnt =$dbcc_room_cnt + 1;
			}
			if($room_used_type[$k]=='tr')
			{
				$tb_room_cnt =$tb_room_cnt + 1;
			}
			if($room_used_type[$k]=='qu')
			{
				$q_room_cnt =$q_room_cnt + 1;
			}

		}
		//for($i=0;$i< $count;$i++)
		//{

		if($sb_room_cnt > 0)
		{
			$roomCode = 'SB';
			$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="1"></Room>';
			$hotelbed_rooms.='<HotelOccupancy>
				<RoomCount>'.$sb_room_cnt.'</RoomCount>
				<Occupancy>
					<AdultCount>1</AdultCount>
					<ChildCount>0</ChildCount>
				</Occupancy>
			</HotelOccupancy>';

		}
		if($db_room_cnt >0)
		{
			$roomCode = 'DB'; //'db';
			$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="1"></Room>';
			$hotelbed_rooms.='<HotelOccupancy>
			<RoomCount>'.$db_room_cnt.'</RoomCount>
				<Occupancy>
					<AdultCount>2</AdultCount>
					<ChildCount>0</ChildCount>
				</Occupancy>
				</HotelOccupancy>';


		}
		if($q_room_cnt >0)
		{
			$roomCode = 'Q'; //'db';
			$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="1"></Room>';

				$hotelbed_rooms.='<HotelOccupancy>
					<RoomCount>'.$q_room_cnt.'</RoomCount>
					<Occupancy>
						<AdultCount>4</AdultCount>
						<ChildCount>0</ChildCount>
					</Occupancy>
				</HotelOccupancy>';


		}

		if($tb_room_cnt >0)
		{
		$roomCode = 'TR'; //'db';
		$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="1"></Room>';

				$hotelbed_rooms.='<HotelOccupancy>
					<RoomCount>'.$tb_room_cnt.'</RoomCount>
					<Occupancy>
						<AdultCount>3</AdultCount>
						<ChildCount>0</ChildCount>
					</Occupancy>
				</HotelOccupancy>';


		}
		if($dbc_room_cnt >0)
		{

								$roomCode = 'DB'; //'db';
								$room1.='<Room Code="'.$roomCode.'" NumberOfCots="2">
										<ExtraBeds>';
								if($dbc_room_cnt==1)
								{
									$room1.='<Age>5</Age>';
								}
								else if($dbc_room_cnt==2)
								{
									$room1.='<Age>5</Age>';
									$room1.='<Age>5</Age>';
								}
								else if($dbc_room_cnt==3)
								{
									$room1.='<Age>5</Age>';
									$room1.='<Age>5</Age>';
									$room1.='<Age>5</Age>';
								}
							$room1.='</ExtraBeds>
									</Room>';


								if($dbc_room_cnt==1)
								{
									$hotelbed_rooms.='<HotelOccupancy>
									<RoomCount>'.$dbc_room_cnt.'</RoomCount>
									<Occupancy>
										<AdultCount>2</AdultCount>
										<ChildCount>1</ChildCount>
										<GuestList>
										<Customer type = "CH">
											<Age>5</Age>
										</Customer>
										</GuestList>
									</Occupancy>
								</HotelOccupancy>';
								}
								else if($dbc_room_cnt==2)
								{
									$hotelbed_rooms.='<HotelOccupancy>
										<RoomCount>'.$dbc_room_cnt.'</RoomCount>
										<Occupancy>
											<AdultCount>2</AdultCount>
											<ChildCount>1</ChildCount>
											<GuestList>
											<Customer type = "CH">
												<Age>5</Age>
											</Customer>
											<Customer type = "CH">
												<Age>5</Age>
											</Customer>
											</GuestList>
										</Occupancy>
									</HotelOccupancy>';
								}
								else if($dbc_room_cnt==3)
								{
									$hotelbed_rooms.='<HotelOccupancy>
										<RoomCount>'.$dbc_room_cnt.'</RoomCount>
										<Occupancy>
											<AdultCount>2</AdultCount>
											<ChildCount>1</ChildCount>
											<GuestList>
												<Customer type = "CH">
													<Age>5</Age>
													</Customer>
												<Customer type = "CH">
													<Age>5</Age>
													</Customer>
												<Customer type = "CH">
													<Age>5</Age>
												</Customer>
											</GuestList>
										</Occupancy>
									</HotelOccupancy>';
								}



		}

		if($dbcc_room_cnt >0)

		{

			$roomCode = 'DB'; //'db';
			$room1.='<Room Code="'.$roomCode.'" NumberOfCots="2">
					<ExtraBeds>';
			if($dbcc_room_cnt==1)
			{
				$room1.='<Age>5</Age>';
				$room1.='<Age>5</Age>';
			}
			else if($dbcc_room_cnt==2)
			{
				$room1.='<Age>5</Age>';
				$room1.='<Age>5</Age>';
				$room1.='<Age>5</Age>';
				$room1.='<Age>5</Age>';
			}
			else if($dbcc_room_cnt==3)
			{
				$room1.='<Age>5</Age>';
				$room1.='<Age>5</Age>';
				$room1.='<Age>5</Age>';
				$room1.='<Age>5</Age>';
				$room1.='<Age>5</Age>';
				$room1.='<Age>5</Age>';
			}

		$room1.='</ExtraBeds>
				</Room>';

			if($dbcc_room_cnt==1)
			{
				$hotelbed_rooms.='<HotelOccupancy>
					<RoomCount>'.$dbcc_room_cnt.'</RoomCount>
					<Occupancy>
						<AdultCount>2</AdultCount>
						<ChildCount>2</ChildCount>
						<GuestList>
						<Customer type = "CH">
							<Age>5</Age>
						</Customer>
						<Customer type = "CH">
							<Age>5</Age>
						</Customer>

						</GuestList>
					</Occupancy>
				</HotelOccupancy>';
			}
			else if($dbcc_room_cnt==2)
			{
				$hotelbed_rooms.='<HotelOccupancy>
					<RoomCount>'.$dbcc_room_cnt.'</RoomCount>
					<Occupancy>
						<AdultCount>2</AdultCount>
						<ChildCount>2</ChildCount>
						<GuestList>
						<Customer type = "CH">
							<Age>5</Age>
						</Customer>
						<Customer type = "CH">
							<Age>5</Age>
						</Customer>
						<Customer type = "CH">
								<Age>5</Age>
							</Customer>
							<Customer type = "CH">
								<Age>5</Age>
							</Customer>
						</GuestList>
					</Occupancy>
				</HotelOccupancy>';
			}
			else if($dbcc_room_cnt==3)
			{
				$hotelbed_rooms.='<HotelOccupancy>
					<RoomCount>'.$dbcc_room_cnt.'</RoomCount>
					<Occupancy>
						<AdultCount>2</AdultCount>
						<ChildCount>2</ChildCount>
						<GuestList>
							<Customer type = "CH">
								<Age>5</Age>
								</Customer>
							<Customer type = "CH">
								<Age>5</Age>
								</Customer>

							<Customer type = "CH">
								<Age>5</Age>
							</Customer>
							<Customer type = "CH">
								<Age>5</Age>
							</Customer>
							<Customer type = "CH">
								<Age>5</Age>
							</Customer>
							<Customer type = "CH">
								<Age>5</Age>
							</Customer>
						</GuestList>
					</Occupancy>
				</HotelOccupancy>';
			}

		}

		//$roomtype[]=$roomCode;


		if($city_code !='')
		{
		$refcode=date("YmdHis");
   		$xml_data ='<HotelValuedAvailRQ echoToken="DummyEchoToken" sessionId="'.$refcode.'" xmlns="http://www.hotelbeds.com/schemas/2005/06/messages" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.hotelbeds.com/schemas/2005/06/messages HotelValuedAvailRQ.xsd">
	<Language>ENG</Language>
	<Credentials>
	<User>PHUKETBNTH14573</User>
    <Password>PHUKETBNTH14573</Password>
	</Credentials>
	<PaginationData itemsPerPage="15" pageNumber="1"/>
	<CheckInDate date="'.$cin.'"/>
	<CheckOutDate date="'.$cout.'"/>
	<Destination code="'.$city_code.'" type="SIMPLE"/>
	<OccupancyList>
				
					'.$hotelbed_rooms.'
	</OccupancyList>
</HotelValuedAvailRQ>';
//echo $xml_data;
$URL = "http://212.170.239.71/appservices/http/FrontendService";//local
   			$ch = curl_init($URL);			
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml'));
			curl_setopt ($ch, CURLOPT_ENCODING, "gzip");
			curl_setopt($ch, CURLOPT_POSTFIELDS, "$xml_data");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		    $xmls = curl_exec($ch);
			$array=$this->xml2ary($xmls);
			
					//echo '<pre/>';
					//print_r($xmls);exit;
				
					 $dom = new DOMDocument();
					 $dom->loadXML($xmls);   
				  
					  $sh = $dom->getElementsByTagName( "ServiceHotel" );
					  $i=0;
					  foreach($sh as $val)
					  {
							$token=$sh->item($i)->getAttribute("availToken");
							$incode=$val->getElementsByTagName("IncomingOffice");
							$inoffcode=$incode->item(0)->getAttribute("code");
					
							 $destCode=$val->getElementsByTagName("Destination");
							 $destCodeVal=$destCode->item(0)->getAttribute("code");
							 
							 $currency = $val->getElementsByTagName( "Currency" );
							 $currencyva1 = $currency->item(0)->nodeValue;
									 
					    	 $currencyv1=$currency->item(0)->getAttribute("code");
					        
							$contract=$val->getElementsByTagName("Contract");
										
								foreach($contract as $contractval)
							 
								$contractname=$contractval->getElementsByTagName("Name");
								$contractnameVal=$contractname->item(0)->nodeValue;
								
						  $HotelInfo = $val->getElementsByTagName( "HotelInfo" );
						  foreach( $HotelInfo as $HotelInfo1 )
						  {
								  $Code = $HotelInfo1->getElementsByTagName( "Code" );
								  $codev1 = $Code->item(0)->nodeValue;
								  
								  $Name = $HotelInfo1->getElementsByTagName( "Name" );
								  $namev1 = $Name->item(0)->nodeValue;
								  
								  $image=$HotelInfo1->getElementsByTagName( "ImageList" );
								  $im=0;
								  $Url=array();
								  foreach( $image as $Hoimageval )
						         {
								  $Image=$Hoimageval->getElementsByTagName( "Image" );
									  foreach( $Image as $Imageval )
									 {
										  $Url1=$Imageval->getElementsByTagName( "Url" );
										  $Url[] = $Url1->item($im)->nodeValue;
									  }
									  $im++;
								  }
								  $picture=implode('-',$Url);
								  
								  $Category = $HotelInfo1->getElementsByTagName( "Category" );
								 $categoryv1=$Category->item(0)->getAttribute("code");

								// echo "star".$categoryv1;exit;
					  
					  
									$HotelRoom = $val->getElementsByTagName( "AvailableRoom" );
									$j=0;
									  foreach($HotelRoom as $HotelRoom1)
									  {
											 $adult = $HotelRoom1->getElementsByTagName( "AdultCount" );
											 $adval = $adult->item(0)->nodeValue;
											 
											 $child = $HotelRoom1->getElementsByTagName( "ChildCount" );
											 $chval = $child->item(0)->nodeValue;
											 
											 $RoomCount = $HotelRoom1->getElementsByTagName( "RoomCount" );
											 $RoomCountval = $RoomCount->item(0)->nodeValue;									 
										
											if($adval =='1')
											{ $adult=1;
										    	$child=0;
												$pax=1;
											}
											elseif($adval=='2' && $chval=='0')
											{
											$adult=2;
											$child=0;
												$pax=3;
											}
											elseif($adval=='2' && $chval=='1')
											{
											$adult=2;
											$child=1;
												$pax=4;
											}
											elseif($adval=='2' && $chval=='2')
											{
											$adult=2;
											$child=2;
												$pax=7;
											}
											elseif($adval =='3')
											{
											$adult=3;
											$child=0;
												$pax=8;
											}
											elseif($adval =='4')
											{
											$adult=4;
											$child=0;
												$pax=9;
											}
											
					 
											  $shrui = $HotelRoom1->getElementsByTagName( "HotelRoom" );
											  $shruiVal=$shrui->item(0)->getAttribute("SHRUI"); 
								
											  $boardType=$HotelRoom1->getElementsByTagName("Board");
											  $boardTypeVal=$boardType->item(0)->getAttribute("code");
											  
											  $shortname=$boardType->item(0)->getAttribute("shortname");
								
								
											  $roomType=$HotelRoom1->getElementsByTagName("RoomType");
											  $roomTypeVal=$roomType->item(0)->getAttribute("code");
		
											 $charVal=$roomType->item(0)->getAttribute("characteristic");
									   
											 $room1 = $HotelRoom1->getElementsByTagName( "RoomType" );
											 $roomv1 = $room1->item(0)->nodeValue;
											 
											 $board1 = $HotelRoom1->getElementsByTagName( "Board" );
											 $boardv1 = $board1->item(0)->nodeValue;
										 
													  
											 $amount = $HotelRoom1->getElementsByTagName( "Amount" );
											 $amountv1 = $amount->item(0)->nodeValue;
					 
  				 	$sec_res=$_SESSION['ses_id'];
					$this->B2b_Hotel_Model->insert_hotelsbed_temp_result($sec_res,'hotelsbed',$codev1,$roomTypeVal,$roomv1,$amountv1,'Available',$boardv1,$shruiVal,$charVal,$adult,$child,$boardTypeVal,$token,$incode,$inoffcode,$contractnameVal,$destCodeVal,$shortname);  						   
														   
										$j++;
										}				  	
							}					
							
						$i++;	  
					  }  
  		
		}
	}
	
	function hotelsbed_hotel_availabilty()
	{
		$room_used_type=$_SESSION['room_used_type'];
		$city=$_SESSION['city'];
		$sd=$_SESSION['sd'];
		$room_count=$_SESSION['room_count'];
		$ed=$_SESSION['ed'];
		$city_val = $this->B2b_Hotel_Model->get_city_code($city);  
		$city_code = $city_val->hotelsbed;
		$cinval = explode("-",$sd);
		$cin = $cinval[2].$cinval[1].$cinval[0];
		$coutval = explode("-",$ed);
		$cout = $coutval[2].$coutval[1].$coutval[0];
			$sb_room_cnt =0;
		$db_room_cnt =0;
		$tb_room_cnt =0;
		$q_room_cnt =0;
		$dbc_room_cnt =0;
		$dbcc_room_cnt =0;
$room1='';
$hotelbed_rooms='';
		for($k=0;$k< $room_count;$k++)
		{
			if($room_used_type[$k]=='sb')
			{
				$sb_room_cnt =$sb_room_cnt + 1;
			}
			if($room_used_type[$k]=='db')
			{
				$db_room_cnt =$db_room_cnt + 1;
			}
			if($room_used_type[$k]=='dbc')
			{
				$dbc_room_cnt =$dbc_room_cnt + 1;
			}
			if($room_used_type[$k]=='dbcc')
			{
				$dbcc_room_cnt =$dbcc_room_cnt + 1;
			}
			if($room_used_type[$k]=='tr')
			{
				$tb_room_cnt =$tb_room_cnt + 1;
			}
			if($room_used_type[$k]=='qu')
			{
				$q_room_cnt =$q_room_cnt + 1;
			}

		}
		//for($i=0;$i< $count;$i++)
		//{

		if($sb_room_cnt > 0)
		{
			$roomCode = 'SB';
			$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="1"></Room>';
			$hotelbed_rooms.='<HotelOccupancy>
				<RoomCount>'.$sb_room_cnt.'</RoomCount>
				<Occupancy>
					<AdultCount>1</AdultCount>
					<ChildCount>0</ChildCount>
				</Occupancy>
			</HotelOccupancy>';

		}
		if($db_room_cnt >0)
		{
			$roomCode = 'DB'; //'db';
			$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="1"></Room>';
			$hotelbed_rooms.='<HotelOccupancy>
			<RoomCount>'.$db_room_cnt.'</RoomCount>
				<Occupancy>
					<AdultCount>2</AdultCount>
					<ChildCount>0</ChildCount>
				</Occupancy>
				</HotelOccupancy>';


		}
		if($q_room_cnt >0)
		{
			$roomCode = 'Q'; //'db';
			$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="1"></Room>';

				$hotelbed_rooms.='<HotelOccupancy>
					<RoomCount>'.$q_room_cnt.'</RoomCount>
					<Occupancy>
						<AdultCount>4</AdultCount>
						<ChildCount>0</ChildCount>
					</Occupancy>
				</HotelOccupancy>';


		}

		if($tb_room_cnt >0)
		{
		$roomCode = 'TR'; //'db';
		$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="1"></Room>';

				$hotelbed_rooms.='<HotelOccupancy>
					<RoomCount>'.$tb_room_cnt.'</RoomCount>
					<Occupancy>
						<AdultCount>3</AdultCount>
						<ChildCount>0</ChildCount>
					</Occupancy>
				</HotelOccupancy>';


		}
		if($dbc_room_cnt >0)
		{

								$roomCode = 'DB'; //'db';
								$room1.='<Room Code="'.$roomCode.'" NumberOfCots="2">
										<ExtraBeds>';
								if($dbc_room_cnt==1)
								{
									$room1.='<Age>5</Age>';
								}
								else if($dbc_room_cnt==2)
								{
									$room1.='<Age>5</Age>';
									$room1.='<Age>5</Age>';
								}
								else if($dbc_room_cnt==3)
								{
									$room1.='<Age>5</Age>';
									$room1.='<Age>5</Age>';
									$room1.='<Age>5</Age>';
								}
							$room1.='</ExtraBeds>
									</Room>';


								if($dbc_room_cnt==1)
								{
									$hotelbed_rooms.='<HotelOccupancy>
									<RoomCount>'.$dbc_room_cnt.'</RoomCount>
									<Occupancy>
										<AdultCount>2</AdultCount>
										<ChildCount>1</ChildCount>
										<GuestList>
										<Customer type = "CH">
											<Age>5</Age>
										</Customer>
										</GuestList>
									</Occupancy>
								</HotelOccupancy>';
								}
								else if($dbc_room_cnt==2)
								{
									$hotelbed_rooms.='<HotelOccupancy>
										<RoomCount>'.$dbc_room_cnt.'</RoomCount>
										<Occupancy>
											<AdultCount>2</AdultCount>
											<ChildCount>1</ChildCount>
											<GuestList>
											<Customer type = "CH">
												<Age>5</Age>
											</Customer>
											<Customer type = "CH">
												<Age>5</Age>
											</Customer>
											</GuestList>
										</Occupancy>
									</HotelOccupancy>';
								}
								else if($dbc_room_cnt==3)
								{
									$hotelbed_rooms.='<HotelOccupancy>
										<RoomCount>'.$dbc_room_cnt.'</RoomCount>
										<Occupancy>
											<AdultCount>2</AdultCount>
											<ChildCount>1</ChildCount>
											<GuestList>
												<Customer type = "CH">
													<Age>5</Age>
													</Customer>
												<Customer type = "CH">
													<Age>5</Age>
													</Customer>
												<Customer type = "CH">
													<Age>5</Age>
												</Customer>
											</GuestList>
										</Occupancy>
									</HotelOccupancy>';
								}



		}

		if($dbcc_room_cnt >0)

		{

			$roomCode = 'DB'; //'db';
			$room1.='<Room Code="'.$roomCode.'" NumberOfCots="2">
					<ExtraBeds>';
			if($dbcc_room_cnt==1)
			{
				$room1.='<Age>5</Age>';
				$room1.='<Age>5</Age>';
			}
			else if($dbcc_room_cnt==2)
			{
				$room1.='<Age>5</Age>';
				$room1.='<Age>5</Age>';
				$room1.='<Age>5</Age>';
				$room1.='<Age>5</Age>';
			}
			else if($dbcc_room_cnt==3)
			{
				$room1.='<Age>5</Age>';
				$room1.='<Age>5</Age>';
				$room1.='<Age>5</Age>';
				$room1.='<Age>5</Age>';
				$room1.='<Age>5</Age>';
				$room1.='<Age>5</Age>';
			}

		$room1.='</ExtraBeds>
				</Room>';

			if($dbcc_room_cnt==1)
			{
				$hotelbed_rooms.='<HotelOccupancy>
					<RoomCount>'.$dbcc_room_cnt.'</RoomCount>
					<Occupancy>
						<AdultCount>2</AdultCount>
						<ChildCount>2</ChildCount>
						<GuestList>
						<Customer type = "CH">
							<Age>5</Age>
						</Customer>
						<Customer type = "CH">
							<Age>5</Age>
						</Customer>

						</GuestList>
					</Occupancy>
				</HotelOccupancy>';
			}
			else if($dbcc_room_cnt==2)
			{
				$hotelbed_rooms.='<HotelOccupancy>
					<RoomCount>'.$dbcc_room_cnt.'</RoomCount>
					<Occupancy>
						<AdultCount>2</AdultCount>
						<ChildCount>2</ChildCount>
						<GuestList>
						<Customer type = "CH">
							<Age>5</Age>
						</Customer>
						<Customer type = "CH">
							<Age>5</Age>
						</Customer>
						<Customer type = "CH">
								<Age>5</Age>
							</Customer>
							<Customer type = "CH">
								<Age>5</Age>
							</Customer>
						</GuestList>
					</Occupancy>
				</HotelOccupancy>';
			}
			else if($dbcc_room_cnt==3)
			{
				$hotelbed_rooms.='<HotelOccupancy>
					<RoomCount>'.$dbcc_room_cnt.'</RoomCount>
					<Occupancy>
						<AdultCount>2</AdultCount>
						<ChildCount>2</ChildCount>
						<GuestList>
							<Customer type = "CH">
								<Age>5</Age>
								</Customer>
							<Customer type = "CH">
								<Age>5</Age>
								</Customer>

							<Customer type = "CH">
								<Age>5</Age>
							</Customer>
							<Customer type = "CH">
								<Age>5</Age>
							</Customer>
							<Customer type = "CH">
								<Age>5</Age>
							</Customer>
							<Customer type = "CH">
								<Age>5</Age>
							</Customer>
						</GuestList>
					</Occupancy>
				</HotelOccupancy>';
			}

		}

		//$roomtype[]=$roomCode;


		if($city_code !='')
		{
		$refcode=date("YmdHis");
   		$xml_data ='<HotelValuedAvailRQ echoToken="DummyEchoToken" sessionId="'.$refcode.'" xmlns="http://www.hotelbeds.com/schemas/2005/06/messages" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.hotelbeds.com/schemas/2005/06/messages HotelValuedAvailRQ.xsd">
	<Language>ENG</Language>
	<Credentials>
	<User>PHUKETBNTH14573</User>
    <Password>PHUKETBNTH14573</Password>
	</Credentials>
	<PaginationData itemsPerPage="400" pageNumber="1"/>
	<CheckInDate date="'.$cin.'"/>
	<CheckOutDate date="'.$cout.'"/>
	<Destination code="'.$city_code.'" type="SIMPLE"/>
	<OccupancyList>
				
					'.$hotelbed_rooms.'
	</OccupancyList>
</HotelValuedAvailRQ>';
//echo $xml_data;
$URL = "http://212.170.239.71/appservices/http/FrontendService";//local
   			$ch = curl_init($URL);			
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml'));
			curl_setopt ($ch, CURLOPT_ENCODING, "gzip");
			curl_setopt($ch, CURLOPT_POSTFIELDS, "$xml_data");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		    $xmls = curl_exec($ch);
			$array=$this->xml2ary($xmls);
			
					//echo '<pre/>';
				//	print_r($xmls);exit;
				
					 $dom = new DOMDocument();
					 $dom->loadXML($xmls);   
				  
					  $sh = $dom->getElementsByTagName( "ServiceHotel" );
					  $i=0;
					  foreach($sh as $val)
					  {
							$token=$sh->item($i)->getAttribute("availToken");
							$incode=$val->getElementsByTagName("IncomingOffice");
							$inoffcode=$incode->item(0)->getAttribute("code");
					
							 $destCode=$val->getElementsByTagName("Destination");
							 $destCodeVal=$destCode->item(0)->getAttribute("code");
							 
							 $currency = $val->getElementsByTagName( "Currency" );
							 $currencyva1 = $currency->item(0)->nodeValue;
									 
					    	 $currencyv1=$currency->item(0)->getAttribute("code");
					        
							$contract=$val->getElementsByTagName("Contract");
										
								foreach($contract as $contractval)
							 
								$contractname=$contractval->getElementsByTagName("Name");
								$contractnameVal=$contractname->item(0)->nodeValue;
								
						  $HotelInfo = $val->getElementsByTagName( "HotelInfo" );
						  foreach( $HotelInfo as $HotelInfo1 )
						  {
								  $Code = $HotelInfo1->getElementsByTagName( "Code" );
								  $codev1 = $Code->item(0)->nodeValue;
								  
								  $Name = $HotelInfo1->getElementsByTagName( "Name" );
								  $namev1 = $Name->item(0)->nodeValue;
								  
								  $image=$HotelInfo1->getElementsByTagName( "ImageList" );
								  $im=0;
								  $Url=array();
								  foreach( $image as $Hoimageval )
						         {
								  $Image=$Hoimageval->getElementsByTagName( "Image" );
									  foreach( $Image as $Imageval )
									 {
										  $Url1=$Imageval->getElementsByTagName( "Url" );
										  $Url[] = $Url1->item($im)->nodeValue;
									  }
									  $im++;
								  }
								  $picture=implode('-',$Url);
								  
								  $Category = $HotelInfo1->getElementsByTagName( "Category" );
								 $categoryv1=$Category->item(0)->getAttribute("code");

								// echo "star".$categoryv1;exit;
					  
					  
									$HotelRoom = $val->getElementsByTagName( "AvailableRoom" );
									$j=0;
									  foreach($HotelRoom as $HotelRoom1)
									  {
											 $adult = $HotelRoom1->getElementsByTagName( "AdultCount" );
											 $adval = $adult->item(0)->nodeValue;
											 
											 $child = $HotelRoom1->getElementsByTagName( "ChildCount" );
											 $chval = $child->item(0)->nodeValue;
											 
											 $RoomCount = $HotelRoom1->getElementsByTagName( "RoomCount" );
											 $RoomCountval = $RoomCount->item(0)->nodeValue;									 
										
											if($adval =='1')
											{ $adult=1;
										    	$child=0;
												$pax=1;
											}
											elseif($adval=='2' && $chval=='0')
											{
											$adult=2;
											$child=0;
												$pax=3;
											}
											elseif($adval=='2' && $chval=='1')
											{
											$adult=2;
											$child=1;
												$pax=4;
											}
											elseif($adval=='2' && $chval=='2')
											{
											$adult=2;
											$child=2;
												$pax=7;
											}
											elseif($adval =='3')
											{
											$adult=3;
											$child=0;
												$pax=8;
											}
											elseif($adval =='4')
											{
											$adult=4;
											$child=0;
												$pax=9;
											}
											
					 
											  $shrui = $HotelRoom1->getElementsByTagName( "HotelRoom" );
											  $shruiVal=$shrui->item(0)->getAttribute("SHRUI"); 
								
											  $boardType=$HotelRoom1->getElementsByTagName("Board");
											  $boardTypeVal=$boardType->item(0)->getAttribute("code");
											  
											  $shortname=$boardType->item(0)->getAttribute("shortname");
								
								
											  $roomType=$HotelRoom1->getElementsByTagName("RoomType");
											  $roomTypeVal=$roomType->item(0)->getAttribute("code");
		
											 $charVal=$roomType->item(0)->getAttribute("characteristic");
									   
											 $room1 = $HotelRoom1->getElementsByTagName( "RoomType" );
											 $roomv1 = $room1->item(0)->nodeValue;
											 
											 $board1 = $HotelRoom1->getElementsByTagName( "Board" );
											 $boardv1 = $board1->item(0)->nodeValue;
										 
													  
											 $amount = $HotelRoom1->getElementsByTagName( "Amount" );
											 $amountv1 = $amount->item(0)->nodeValue;
					 
  				 	$sec_res=$_SESSION['ses_id'];
					$this->B2b_Hotel_Model->insert_hotelsbed_temp_result($sec_res,'hotelsbed',$codev1,$roomTypeVal,$roomv1,$amountv1,'Available',$boardv1,$shruiVal,$charVal,$adult,$child,$boardTypeVal,$token,$incode,$inoffcode,$contractnameVal,$destCodeVal,$shortname);  						   
														   
										$j++;
										}				  	
							}					
							
						$i++;	  
					  }  
  		
		}
	}
	
	function hotel_detail($id)
	{
		
		
$fav_hotel_detail=array();
		
		if(isset($_SESSION['fav_hotel_detail']))
		{
			$hote_id = $_SESSION['fav_hotel_detail'];	
			//echo "sssss";exit;
			if($hote_id!='')
			{
			for($i=0;$i< count($hote_id);$i++)
			{
				if($id != $_SESSION['fav_hotel_detail'][$i])
				{
				$fav_hotel[] = $_SESSION['fav_hotel_detail'][$i];
				}
			}
			}
			$fav_hotel[] = $id;
			$fav_hotel= array_merge($fav_hotel);
			$_SESSION['fav_hotel_detail'] = $fav_hotel;
		}
		else
		{
			
			$fav_hotel[] = $id;
			$_SESSION['fav_hotel_detail'] = $fav_hotel;
			
		}
	
		$service=$this->B2b_Hotel_Model->get_searchresult($id);
		
		$api = $service->api;
		$hotel_code = $service->hotel_code;
		$hotel_name = $service->hotel_name;
		$star = $service->star;
		$image = $service->image;
		$data['service']=$service;
		$sec_res=$_SESSION['ses_id'];
		//$data['room_info']=$this->Hotel_Model->fetch_gta_temp_result_room($sec_res,$hotel_code);
		
	/*	if($api=='hotelsbed')
		{
			
			$hotel_contact = $this->Hotel_Model->gethb_hoteldetails($hotel_code);
			
			$hotel_facility = $this->Hotel_Model->gethb_hotelfacility($hotel_code);
			
			
			$hotel_hotel = $this->Hotel_Model->gethb_hoteldet($hotel_code);
			
			$data['hotelCode']=$hotel_code;
			if($hotel_contact!="")
			{
				$StNAME=$hotel_contact->ADDRESS;
				$StPIN=$hotel_contact->POSTALCODE;
				$StCITY=$hotel_contact->CITY;
				$htEmail=$hotel_contact->EMAIL; 
				$data['htEmail']=$htEmail;
				$data['StNAME']=$StNAME;
				$data['StPIN']=$StPIN;
				$data['StCITY']=$StCITY;
			}
			else
			{
				$data['htEmail']=""; 
				$data['StNAME']="";
				$data['StPIN']="";
				$data['StCITY']="";
			}
			if($hotel_hotel!="")
			{
				$data['lat']=$hotel_hotel->LATITUDE;
				$data['long']=$hotel_hotel->LONGITUDE;
				$data['HOTELNAME']=$hotel_hotel ->NAME;
				
				$data['nearby_hotel']=$this->Hotel_Model->get_nearby_hotels($data['lat'],$data['long'],$hotel_name,$StCITY);
			}
			else
			{
				$data['Latitude']="0";
				$data['Longitude']="0";
				$data['HOTELNAME']="";
			}
						
			if($hotel_facility!="")
			{ 
				$hds=$hotel_facility ->HotelFacilities;
				$root=$hotel_facility->HotelHowToGetThere;
				$time=$hotel_facility->HotelComments;
				$data['hds']=$hds;
				$data['root']=$root;
				$data['time']=$time;
			}
			else
			{
				$data['hds']="";
				$data['root']="";
				$data['time']="";
			}
			$data['address'] = $StNAME.' '.$StPIN;
			$data['dest'] = $StCITY;
			$data['result_id']=$id;
			$data['api'] = 'hotelsbed';
		$data['cur_id'] = $id;
		$this->load->view('hotel/hotel_detail',$data);	
			}
	   elseif($api=='gta')
		{*/
			
			$data['hotel_facility'] = $this->B2b_Hotel_Model->get_facility_details_hotel($hotel_code);
			$data['room_facility'] = $this->B2b_Hotel_Model->get_facility_details_room($hotel_code);
			
			
			$data['hotelCode']=$hotel_code;
			
			$data['star']=$service->star;
			$data['phone']=$service->phone;
			$data['location']=$service->location;
			
			
			$data['lat']=$service->latitude;
			$data['long']=$service->longitude;
			$data['hotel_name']=$service->hotel_name;
			
			$data['description'] = $service->description;
			$data['address'] = $service->address;
			$data['dest'] = $service->city ;
			
			$data['result_id']=$id;
			$data['cur_id'] = $id;
			$data['api'] = 'gta';
			if($data['lat'] !='' && $data['long']!='')
			{
			$data['nearby_hotel']=$this->B2b_Hotel_Model->get_nearby_hotels($data['lat'],$data['long'],$data['hotel_name'],$data['dest']);
			}
			else
			{
				$data['nearby_hotel']='';
			}
			if($api=='hotelsbed')
			{
			$hotel_image= $this->B2b_Hotel_Model->gethb_hotelimage_new($hotel_code);
		    if($hotel_image!="")
			{
				$img1=array();
				for($i=0;$i< count($hotel_image); $i++)
				{
					 $img=$hotel_image[$i]->IMAGEPATH;
					 $img1[]= "http://www.hotelbeds.com/giata/" . $img;
				}
				$data['img_array']=$img1;
			}
			else
			{
				$img1="";
				$data['img_array']="";
			}	
			}
			elseif($api=='gta')	
			{
				$data['img_array'][]= WEB_DIR.'image_gta/'.$hotel_code.'.jpg';
			}
			$this->load->view('b2b/hotel/hotel_detail',$data);	
			//}
	}
		function pre_booking($result_id)
	{
		
		
		
			$room_count = $_SESSION['room_count'];


		if($room_count == 1)
		{
			
			$service=$this->B2b_Hotel_Model->get_searchresult($result_id);
			$api = $service->api;
			$hotel_code = $service->hotel_code;
			$hotel_name = $service->hotel_name;
			$star = $service->star;
			$image = $service->image;
			$data['service']=$service;
			$sec_res=$_SESSION['ses_id'];
			$data['result_id']=$result_id;
			$rm_info=array();
		    $rm_info[]=$this->B2b_Hotel_Model->fetch_gta_temp_result_room_result_id($sec_res,$result_id);
			$data['room_info'] = $rm_info;
		}
		else
		{
			$result_id1 = explode("-",$result_id);
			$service=$this->B2b_Hotel_Model->get_searchresult($result_id1[0]);
			$api = $service->api;
			$hotel_code = $service->hotel_code;
			$hotel_name = $service->hotel_name;
			$star = $service->star;
			$image = $service->image;
			$data['service']=$service;
			$sec_res=$_SESSION['ses_id'];
			$data['result_id']=$result_id;
			$rm_info=array();
			for($r=0;$r< count($result_id1);$r++)
			{
			 $rm_info[]=$this->B2b_Hotel_Model->fetch_gta_temp_result_room_result_id($sec_res,$result_id1[$r]);
			}
			
			$data['room_info'] = $rm_info;
		}
		
		
		$sec_res=$_SESSION['ses_id'];
		
		if($api=='hotelsbed')
		{
			
			$hotel_contact = $this->B2b_Hotel_Model->gethb_hoteldetails($hotel_code);
			$hotel_facility = $this->B2b_Hotel_Model->gethb_hotelfacility($hotel_code);
			$hotel_image= $this->B2b_Hotel_Model->gethb_hotelimage_new($hotel_code);
			$hotel_hotel = $this->B2b_Hotel_Model->gethb_hoteldet($hotel_code);
			
			$data['hotelCode']=$hotel_code;
			if($hotel_contact!="")
			{
				$StNAME=$hotel_contact->ADDRESS;
				$StPIN=$hotel_contact->POSTALCODE;
				$StCITY=$hotel_contact->CITY;
				$htEmail=$hotel_contact->EMAIL; 
				$data['htEmail']=$htEmail;
				$data['StNAME']=$StNAME;
				$data['StPIN']=$StPIN;
				$data['StCITY']=$StCITY;
			}
			else
			{
				$data['htEmail']=""; 
				$data['StNAME']="";
				$data['StPIN']="";
				$data['StCITY']="";
			}
			if($hotel_hotel!="")
			{
				$data['lat']=$hotel_hotel->LATITUDE;
				$data['long']=$hotel_hotel->LONGITUDE;
				$data['HOTELNAME']=$hotel_hotel ->NAME;
				
				
			}
			else
			{
				$data['Latitude']="0";
				$data['Longitude']="0";
				$data['HOTELNAME']="";
			}
			if($hotel_image!="")
			{
				$img1=array();
				for($i=0;$i< count($hotel_image); $i++)
				{
					 $img=$hotel_image[$i]->IMAGEPATH;
					 $img1[]= "http://www.hotelbeds.com/giata/" . $img;
				}
				$data['img_array']=$img1;
			}
			else
			{
				$img1="";
				$data['img_array']="";
			}				
			
			$data['address'] = $StNAME.' '.$StPIN;
			$data['dest'] = $StCITY;
			
			$data['api'] = 'hotelsbed';
		
		
						$totalamt=0;
		$totroom=$_SESSION['room_count'];
		
		$adult_count1 = 0;
		$child_count1 = 0;
		$roomcount=$_SESSION['room_count'];
		$roomusedtype=$_SESSION['room_used_type'];
		$adult_count=array();
		$child_count=array();
		
		for($d=0;$d < count($roomusedtype);$d++)
		{
			if($roomusedtype[$d]=='sb')
			{
				
				 $adult_count[] = 1*1;
				 $child_count[] =  0;
		    }
			if($roomusedtype[$d]=='db')
			{
				 $adult_count[] =2*1;
				  $child_count[] =  0;
		    }
			
			if($roomusedtype[$d]=='qu')
			{
				 $adult_count[] = 4*1;
				  $child_count[] =  0;
		    }
			if($roomusedtype[$d]=='tr')
			{
				 $adult_count[] =  3*1;
				  $child_count[] =  0;
		    }
			if($roomusedtype[$d]=='dbc')
			{
			    if($roomcount[$d]==1)
				{
			        $adult_count[] =  2;
					$child_count[] =  1;
				}
				if($roomcount[$d]==2)
				{
			        $adult_count[] = $adult_count1 + 4;
					$child_count[] = $child_count1 + 2;
				}
				if($roomcount[$d]==3)
				{
			        $adult_count[] = $adult_count1 + 6*1;
					$child_count[] = $child_count1 + 3;
				}
			}
			if($roomusedtype[$d]=='dbcc')
			{
			    if($roomcount[$d]==1)
				{
			        $adult_count[] = $adult_count1 + 2;
					$child_count[] = $child_count1 + 2;
				}
				if($roomcount[$d]==2)
				{
			        $adult_count[] = $adult_count1 + 4;
					$child_count[] = $child_count1 + 4;
				}
				if($roomcount[$d]==3)
				{
			        $adult_count[] = $adult_count1 + 6;
					$child_count[] = $child_count1 + 6;
				}
			}
		}
		$mer_id=explode("-",$result_id);
		
		/*if(isset($mer_id1[1]))
		{
			$mer_id[]=$mer_id1;
		}
		else
		{
			for($u=0;$u< count($this->session->userdata('roomusedtype'));$u++)
			{
			$mer_id[] = $mer_id1[0];
			}
		}*/
		//print_r($mer_id);exit;
		for($k=0;$k <  count($mer_id);$k++)
		{
			$attribr[]=$this->B2b_Hotel_Model->get_cancel_attrib_new($mer_id[$k]);
		}
		
		//$mer_id=explode("-",$mer_res_id);
		
		
		if(count($attribr)==1)
		{
			 $attribb=$attribr;
		}
		else
		{
		for($k=0;$k < count($mer_id);$k++)
		{
			for($h=0;$h <  count($mer_id);$h++)
		    {
			
			                     $attribw=$this->B2b_Hotel_Model->get_cancel_attrib_new($mer_id[$k]);
								// echo "<pre/>";print_r($attribw);exit;
								  $adultw=trim($attribw->adult); 
								  $childw=trim($attribw->child);  
								  $result_idw=trim($attribw->api_temp_hotel_id);  

			         if($adult_count[$k] == $attribr[$h]->adult &&  $child_count[$k] == $attribr[$h]->child)
					 {
						
						         $attribb[]=$this->B2b_Hotel_Model->get_cancel_attrib_new($attribr[$h]->api_temp_hotel_id);
								
					 }
			}
		}
		}
		$cin= $_SESSION['sd'];
		$cin_val = explode("-",$cin);
		$checkin = $cin_val[2].$cin_val[1].$cin_val[0];	
		$cout= $_SESSION['ed'];
		$cout_val = explode("-",$cout);
		$checkout = $cout_val[2].$cout_val[1].$cout_val[0];	
		
		 for($k=0;$k <  count($mer_id);$k++)
		{
								$attrib = $attribb[$k];
	                             //$pax[]=trim($attrib->nopax);  // no of pax
								 $pax[]=trim($attrib->adult);
								 $token=trim($attrib->token);   //token
								 $contractnameVal=trim($attrib->contractnameVal);  // contract name
								 $inoffcode=trim($attrib->inoffcode);  // incoming office code
								 $cin_hb=$checkin;  // checkin date
								 $cout_hb=$checkout;   //checkout date
								 $codev1=trim($attrib->hotel_code);  // hotel code
								 $destCodeVal=trim($attrib->destCodeVal);  //destination code
								 $shruiVal[]=trim($attrib->shurival);   // shrui val
								 $boardTypeVal[]=trim($attrib->board_type);  // board type  BB-TH1
								 $roomTypeVal[]=trim($attrib->room_code);  // room type DBT-TH1
								 $charVal[]=trim($attrib->charval);	   // room char SP
								 $totalamt=$totalamt+$attrib->total_cost;
								// $roomcount[]=trim($attrib->roomcount);
								 $shortname[]=trim($attrib->shortname);
		}
                                
	$roomCode='';
		$rooms='';
		$room1='';
		$data['tot_tariff']=$totalamt;
		$j=0;
		$roomusedtype=$_SESSION['room_used_type'];
		$count=count($roomusedtype);
		$roomusedtype=$_SESSION['room_used_type'];
		$roomcount=$_SESSION['room_count'];
		//echo "<pre/>";
		//print_r($mer_id);exit;
		for($i=0;$i< count($mer_id);$i++)
		{
			if($roomusedtype[$i]=='sb')
			{
			$roomCode = 'SB';
			$room1.='<AvailableRoom>
					<HotelOccupancy>
						<RoomCount>1</RoomCount>
						<Occupancy>
								<AdultCount>1</AdultCount>
							<ChildCount>0</ChildCount>
						<GuestList>
								<Customer type="AD"/>
						</GuestList>
							
						</Occupancy>
					</HotelOccupancy>
					<HotelRoom SHRUI="'.$shruiVal[$j].'" >
						<Board type="SIMPLE" code="'.$boardTypeVal[$j].'" shortname="'.$shortname[$j].'"/>
						<RoomType type="SIMPLE" code="'.$roomTypeVal[$j].'" characteristic="'.$charVal[$j].'"/>
					</HotelRoom>
				</AvailableRoom>';	
				
			$j++;		
			}
			elseif($roomusedtype[$i]=='db' || $roomusedtype[$i]=='6')
			{
			$roomCode = 'DB'; //'db';
					
					$room1.='<AvailableRoom>
						<HotelOccupancy>
							<RoomCount>1</RoomCount>
							<Occupancy>
								<AdultCount>2</AdultCount>
								<ChildCount>0</ChildCount>
							<GuestList>
									<Customer type="AD"/>
							</GuestList>
							</Occupancy>
						</HotelOccupancy>
						<HotelRoom SHRUI="'.$shruiVal[$j].'" >
							<Board type="SIMPLE" code="'.$boardTypeVal[$j].'" shortname="'.$shortname[$j].'"/>
							<RoomType type="SIMPLE" code="'.$roomTypeVal[$j].'" characteristic="'.$charVal[$j].'"/>
						</HotelRoom>
					</AvailableRoom>';				
					
			$j++;				
			}
			elseif($roomusedtype[$i]=='qu')
			{
			$roomCode = 'Q'; //'db';	
	
	
					$room1.='<AvailableRoom>
						<HotelOccupancy>
							<RoomCount>1</RoomCount>
							<Occupancy>
								<AdultCount>4</AdultCount>
								<ChildCount>0</ChildCount>
							<GuestList>
									<Customer type="AD"/>
							</GuestList>
							</Occupancy>
						</HotelOccupancy>
						<HotelRoom SHRUI="'.$shruiVal[$j].'">
							<Board type="SIMPLE" code="'.$boardTypeVal[$j].'" shortname="'.$shortname[$j].'"/>
							<RoomType type="SIMPLE" code="'.$roomTypeVal[$j].'" characteristic="'.$charVal[$j].'"/>
						</HotelRoom>
					</AvailableRoom>';				
					
			$j++;			
			}
			elseif($roomusedtype[$i]=='tr')
			{
			$roomCode = 'TR'; //'db';
				
					$room1.='<AvailableRoom>
						<HotelOccupancy>
							<RoomCount>1</RoomCount>
							<Occupancy>
								<AdultCount>3</AdultCount>
								<ChildCount>0</ChildCount>
							<GuestList>
									<Customer type="AD"/>
							</GuestList>
							</Occupancy>
						</HotelOccupancy>
						<HotelRoom SHRUI="'.$shruiVal[$j].'">
							<Board type="SIMPLE" code="'.$boardTypeVal[$j].'" shortname="'.$shortname[$j].'"/>
							<RoomType type="SIMPLE" code="'.$roomTypeVal[$j].'" characteristic="'.$charVal[$j].'"/>
						</HotelRoom>
					</AvailableRoom>';				
					
			$j++;				
			}
			//'.$childage1[$i].'
			elseif($roomusedtype[$i]=='dbc')
			{
				$roomCode = 'DB'; //'db';
				if($roomcount[$i]=='1')
				{
					$room1.='<AvailableRoom>
						<HotelOccupancy>
							<RoomCount>'.$roomcount[$i].'</RoomCount>
							<Occupancy>
							<AdultCount>2</AdultCount>
								<ChildCount>1</ChildCount>
							<GuestList>
									<Customer type="AD"/>
									<Customer type="CH">
									<Age>9</Age>
									</Customer>
							</GuestList>
							</Occupancy>
						</HotelOccupancy>
						<HotelRoom SHRUI="'.$shruiVal[$j].'" >
							<Board type="SIMPLE" code="'.$boardTypeVal[$j].'" shortname="'.$shortname[$j].'"/>
							<RoomType type="SIMPLE" code="'.$roomTypeVal[$j].'" characteristic="'.$charVal[$j].'"/>
						</HotelRoom>
					</AvailableRoom>';			
				}
				else if($roomcount[$i]=='2')
				{
					$room1.='<AvailableRoom>
						<HotelOccupancy>
							<RoomCount>'.$roomcount[$i].'</RoomCount>
							<Occupancy>
								<AdultCount>2</AdultCount>
								<ChildCount>1</ChildCount>
							<GuestList>
									<Customer type="AD"/>
									<Customer type="CH">
									<Age>'.$childage1[$i].'</Age>
									</Customer>
									<Customer type="CH">
									<Age>'.$childage2[$i].'</Age>
									</Customer>	
							</GuestList>
							</Occupancy>
						</HotelOccupancy>
						<HotelRoom SHRUI="'.$shruiVal[$j].'">
							<Board type="SIMPLE" code="'.$boardTypeVal[$j].'" shortname="'.$shortname[$j].'"/>
							<RoomType type="SIMPLE" code="'.$roomTypeVal[$j].'" characteristic="'.$charVal[$j].'"/>
						</HotelRoom>
					</AvailableRoom>';			
				}
				
				else if($roomcount[$i]=='3')
				{
					$room1.='<AvailableRoom>
						<HotelOccupancy>
							<RoomCount>'.$roomcount[$i].'</RoomCount>
							<Occupancy>
								<AdultCount>2</AdultCount>
								<ChildCount>1</ChildCount>
							<GuestList>
									<Customer type="AD"/>
									<Customer type="CH">
									<Age>'.$childage1[$i].'</Age>
									</Customer>
									<Customer type="CH">
									<Age>'.$childage2[$i].'</Age>
									</Customer>	
									<Customer type="CH">
									<Age>'.$childage3[$i].'</Age>
									</Customer>	
							</GuestList>
							</Occupancy>
						</HotelOccupancy>
						<HotelRoom SHRUI="'.$shruiVal[$j].'" >
							<Board type="SIMPLE" code="'.$boardTypeVal[$j].'" shortname="'.$shortname[$j].'"/>
							<RoomType type="SIMPLE" code="'.$roomTypeVal[$j].'" characteristic="'.$charVal[$j].'"/>
						</HotelRoom>
					</AvailableRoom>';			
				}
			
				
			$j++;			
			}
				
			elseif($roomusedtype[$i]=='dbcc')
			{
				if($roomcount[$i]=='1')
				{
					$room1.='<AvailableRoom>
						<HotelOccupancy>
							<RoomCount>'.$roomcount[$i].'</RoomCount>
							<Occupancy>
								<AdultCount>2</AdultCount>
								<ChildCount>2</ChildCount>
							<GuestList>
									<Customer type="AD"/>
									<Customer type="CH">
									<Age>'.$childage1[$i].'</Age>
									</Customer>
									<Customer type="CH">
									<Age>'.$childage4[$i].'</Age>
									</Customer>
							</GuestList>
							</Occupancy>
						</HotelOccupancy>
						<HotelRoom SHRUI="'.$shruiVal[$j].'">
							<Board type="SIMPLE" code="'.$boardTypeVal[$j].'" shortname="'.$shortname[$j].'"/>
							<RoomType type="SIMPLE" code="'.$roomTypeVal[$j].'" characteristic="'.$charVal[$j].'"/>
						</HotelRoom>
					</AvailableRoom>';			
				}
				else if($roomcount[$i]=='2')
				{
					$room1.='<AvailableRoom>
						<HotelOccupancy>
							<RoomCount>'.$roomcount[$i].'</RoomCount>
							<Occupancy>
								<AdultCount>2</AdultCount>
								<ChildCount>2</ChildCount>
							<GuestList>
									<Customer type="AD"/>
									<Customer type="CH">
									<Age>'.$childage1[$i].'</Age>
									</Customer>
									<Customer type="CH">
									<Age>'.$childage4[$i].'</Age>
									</Customer>	
									<Customer type="CH">
									<Age>'.$childage2[$i].'</Age>
									</Customer>	
									<Customer type="CH">
									<Age>'.$childage5[$i].'</Age>
									</Customer>	
							</GuestList>
							</Occupancy>
						</HotelOccupancy>
						<HotelRoom SHRUI="'.$shruiVal[$j].'">
							<Board type="SIMPLE" code="'.$boardTypeVal[$j].'" shortname="'.$shortname[$j].'"/>
							<RoomType type="SIMPLE" code="'.$roomTypeVal[$j].'" characteristic="'.$charVal[$j].'"/>
						</HotelRoom>
					</AvailableRoom>';			
				}
				
				else if($roomcount[$i]=='3')
				{
					$room1.='<AvailableRoom>
						<HotelOccupancy>
							<RoomCount>'.$roomcount[$i].'</RoomCount>
							<Occupancy>
								<AdultCount>2</AdultCount>
								<ChildCount>2</ChildCount>
							<GuestList>
									<Customer type="AD"/>
									<Customer type="CH">
									<Age>'.$childage1[$i].'</Age>
									</Customer>
									<Customer type="CH">
									<Age>'.$childage4[$i].'</Age>
									</Customer>	
									<Customer type="CH">
									<Age>'.$childage2[$i].'</Age>
									</Customer>	
									<Customer type="CH">
									<Age>'.$childage5[$i].'</Age>
									</Customer>	
									<Customer type="CH">
									<Age>'.$childage3[$i].'</Age>
									</Customer>	
									<Customer type="CH">
									<Age>'.$childage6[$i].'</Age>
									</Customer>	
							</GuestList>
							</Occupancy>
						</HotelOccupancy>
						<HotelRoom SHRUI="'.$shruiVal[$j].'">
							<Board type="SIMPLE" code="'.$boardTypeVal[$j].'" shortname="'.$shortname[$j].'"/>
							<RoomType type="SIMPLE" code="'.$roomTypeVal[$j].'" characteristic="'.$charVal[$j].'"/>
						</HotelRoom>
					</AvailableRoom>';			
				}
			
				$j++;
			}			
	
		}
		
	
	$rooms=$room1; 
	
	
	//echo $rooms; exit();
		if($_SERVER['HTTP_HOST']=='localhost')
			{					
	$user="PHUKETBNTH14573";
			$pass="PHUKETBNTH14573";
			$URL = "http://212.170.239.71/appservices/http/FrontendService";//local
		}
			else

			{
	$user="PHUKETBNTH14573";
			$pass="PHUKETBNTH14573";
			$URL = "http://212.170.239.71/appservices/http/FrontendService";//local
			}							
	
	 $xml_datah ='<ServiceAddRQ xmlns="http://www.hotelbeds.com/schemas/2005/06/messages" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.hotelbeds.com/schemas/2005/06/messages ServiceAddRQ.xsd" echoToken="DummyEchoToken">
		<Language>ENG</Language>
		<Credentials>
			<User>'.$user.'</User>
		<Password>'.$pass.'</Password>
		</Credentials>
		<Service xsi:type="ServiceHotel" availToken="'.$token.'">
			<ContractList>
				<Contract>
					<Name>'.$contractnameVal.'</Name>
	
					<IncomingOffice code="'.$inoffcode.'"/>
				</Contract>
			</ContractList>
			<DateFrom date="'.$cin_hb.'"/>
			<DateTo date="'.$cout_hb.'"/>
			<HotelInfo xsi:type="ProductHotel">
				<Code>'.$codev1.'</Code>
				<Destination type="SIMPLE" code="'.$destCodeVal.'"/>
			</HotelInfo>'.$rooms.'
		</Service>
	</ServiceAddRQ>';

			//	echo $xml_datah;
			$ch = curl_init($URL);			
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml'));
			curl_setopt ($ch, CURLOPT_ENCODING, "gzip");
			curl_setopt($ch, CURLOPT_POSTFIELDS, "$xml_datah");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			 $xmls = curl_exec($ch);
			 	$error1=curl_getinfo($ch, CURLINFO_HTTP_CODE );
			//echo $xmls ; exit;
			  $dom1 = new DOMDocument();
			   $dom1->loadXML($xmls);
			   $Messageval='';
					$Message = $dom1->getElementsByTagName( "Message" );
					foreach($Message as $dddd)
					{
				$Messageval=$Message->item(0)->nodeValue;
					}
	
		
			
		$data['contract_remarks']='';
		if($Messageval =='')
		{
		if($error1=='200')
		{
			
			   $dom = new DOMDocument();
			   $dom->loadXML($xmls);
				
		
				$purToken = $dom->getElementsByTagName( "Purchase" );
				$purTokenVal=$purToken->item(0)->getAttribute("purchaseToken");
	
				   $service = $dom->getElementsByTagName("Service");
				  $serviceval=$service->item(0)->getAttribute("SPUI");
				  
				//$this->session->set_userdata(array('SPUI'=>$serviceval,'purchaseToken'=>$purTokenVal));
				$_SESSION['SPUI']=$serviceval;
		 		$_SESSION['purchaseToken']=$purTokenVal;  
				$Contract = $dom->getElementsByTagName( "Contract" );
				foreach($Contract as $contractval)
				{
					$CommentList=$contractval->getElementsByTagName( "CommentList" );
					foreach($CommentList as $commentval)
					{
						$Comment=$commentval->getElementsByTagName( "Comment" );
						$Comment=$Comment->item(0)->nodeValue;
						$data['contract_remarks'] = $Comment;
						
					}
				}
				
				$Supplier = $dom->getElementsByTagName( "Supplier" );
				$vatNumber=$Supplier->item(0)->getAttribute("vatNumber");

				 $criteria_id=$_SESSION['ses_id'];	
			   $cancel = $dom->getElementsByTagName( "CancellationPolicy" );
	
				  foreach($cancel as $canval)
				  {
	
					   $cancelprice=$canval->getElementsByTagName( "Amount" );
					   $canceldisplayValc=$cancelprice->item(0)->nodeValue;
							   $data['cancel_amt']=$canceldisplayValc;
	
	
	
									   $dateFromc=$canval->getElementsByTagName( "DateTimeFrom" );
					   $dateFromValc=$dateFromc->item(0)->getAttribute("date");
					   $time=$dateFromc->item(0)->getAttribute("time");
							   $data['datefrom']=$dateFromValc;
							   $data['time']=$time;
							   
							   $dateToc=$canval->getElementsByTagName( "DateTimeTo" );
					   $dateToValc=$dateToc->item(0)->getAttribute("date");
						$data['dateto']=$dateToValc;
							   
		
							 $CommentListval='';
							 $data['comment']=$CommentListval;			   
			   
					  $curr=$dom->getElementsByTagName( "Currency" );
					 $data['currencyCode']=$currencyCode=$curr->item(0)->getAttribute("code");	
	
	
					   $dateToc=$canval->getElementsByTagName( "DateTimeTo" );
					   $dateToValc=$dateToc->item(0)->getAttribute("date");
					   $data['dateto']=$dateToValc;
					   $data['criteria_id']=$criteria_id;
					 }
					 
			$AvailableRoom=$dom->getElementsByTagName( "AvailableRoom");
			$rt=0;
			foreach($AvailableRoom as $AvailableRoomval)
			{
			    $HotelRoom=$AvailableRoomval->getElementsByTagName( "HotelRoom" );
				$RoomType=$AvailableRoomval->getElementsByTagName( "RoomType" );	
				$rtname[]=$RoomType->item(0)->nodeValue;
				$CancellationPolicy=$AvailableRoomval->getElementsByTagName( "CancellationPolicy" );	
				foreach($CancellationPolicy as $CancellationPolicyval)
				{
				    $DateTimeFrom=$CancellationPolicyval->getElementsByTagName( "DateTimeFrom" );	
				    $from1[]=$DateTimeFrom->item(0)->getAttribute("date");
					$time1[]=$DateTimeFrom->item(0)->getAttribute("time");
					$Amount=$CancellationPolicyval->getElementsByTagName( "Amount" );	
				    $amt[]=$Amount->item(0)->nodeValue;
				 } 
				 $rt++;
			}	 
				$data['rtname']=$rtname;
				$data['from1']=$from1;
				$data['time1']=$time1;
				$data['amt']=$amt;
				$this->B2b_Hotel_Model->insert_booking_attrib($criteria_id,'hotelsbed',$purTokenVal,$serviceval,$canceldisplayValc,$dateFromValc,$dateToValc);
		
		$cancel_req='ok';
		} 
		else
		{
			$cancel_req='';
		}
		}
		else
		{
			echo $Messageval;exit;
		}
	
		if($cancel_req!='')
		{
		
			$cancel_policy='';
			
								
		 if($data['contract_remarks']=='')
		 {
			$_SESSION['contract_remarks']='No remarks given by hotel';
			$contract_remarks="No remarks given by hotel";
		 }
		 else
		 {
			 $_SESSION['contract_remarks']=$data['contract_remarks'];
			 $contract_remarks=$data['contract_remarks'];
		 }
		 
   $cancel_policy .= $contract_remarks;
			 
			     
      for($i=0;$i< count($rtname);$i++)
      {
		    $cancel_policy .= ' cancellation made  for '.$rtname[$i] ;
      
       // CONVERT TO EURO 
    
     if($currencyCode !='USD' )
     {
      $cur_val=$this->Search_Model->get_currency_val($currencyCode);
      $cancel_amt_eur = number_format($amt[$i] / $cur_val,2,'.','');
     }
     else
     {
      $cancel_amt_eur = number_format($amt[$i] ,2,'.','');
     }
     
     
    /*    if($currencyCode!="USD")
      {
       $cur_val=$this->Search_Model->get_currency_val($currencyCode);
       $cancel_amt_right=number_format($cur_val*$cancel_amt_eur,2,'.','');
      } 
      else
      {
       $cancel_amt_right=$cancel_amt_eur;
      }   
      $markup=1;
        $finalValh=($cancel_amt_right * $markup/100) + $cancel_amt_right;
             
      $camt=number_format($finalValh,2,'.','');   */
      
       $year=substr($from1[$i],0,4); 
       $mon=substr($from1[$i],4,2); 
       $date=substr($from1[$i],6,2);
       $hour=substr($time1[$i],0,2);
       $min=substr($time1[$i],2,2);
        $cancel_policy .= $date.'/'.$mon.'/'.$year.''.'Time'.$hour.':'. $min;
                        
                  $cancel_policy .= ' will be charged '.$cancel_amt_eur.' '.$currencyCode; 
       $newdate3=$year.'-'.$mon.'-'.$date;
      
                      $cancel_policy .=  '<br/>';
					  } 
             
       $data['cancel_policy']=$cancel_policy;
           
		}
		else
		{
			$data['cancel_policy']='Nil';
		}
          
		$this->load->view('b2b/hotel/pre_booking',$data);	
			}
	   elseif($api=='gta')
		{
			
				
		$sec_res=$_SESSION['ses_id'];
		
			
			$data['hotel_facility'] = $this->B2b_Hotel_Model->get_facility_details($hotel_code);
			
			
			$data['hotelCode']=$hotel_code;
			
			$data['star']=$service->star;
			$data['phone']=$service->phone;
			$data['location']=$service->location;
			$room=$service->room_code;
			
			
			$data['lat']=$service->latitude;
			$data['long']=$service->longitude;
			$data['hotel_name']=$service->hotel_name;
			
			$data['description'] = $service->description;
			$data['address'] = $service->address;
			$data['dest'] = $service->city ;
			$room_used_type=$_SESSION['room_used_type'];
		$city=$_SESSION['city'];
		$sd=$_SESSION['sd'];
		$room_count=$_SESSION['room_count'];
		$ed=$_SESSION['ed'];
		$city_val = $this->B2b_Hotel_Model->get_city_code($city);  
		$city_code = $city_val->gta;
		
		$cinval = explode("-",$sd);
		$cin = $cinval[2].'-'.$cinval[1].'-'.$cinval[0];
		$coutval = explode("-",$ed);
		$cout = $coutval[2].'-'.$coutval[1].'-'.$coutval[0];
			$sb_room_cnt =0;
		$db_room_cnt =0;
		$tb_room_cnt =0;
		$q_room_cnt =0;
		$dbc_room_cnt =0;
		$dbcc_room_cnt =0;
$room1='';
$hotelbed_rooms='';
		for($k=0;$k< $room_count;$k++)
		{
			if($room_used_type[$k]=='sb')
			{
				$sb_room_cnt =$sb_room_cnt + 1;
			}
			if($room_used_type[$k]=='db')
			{
				$db_room_cnt =$db_room_cnt + 1;
			}
			if($room_used_type[$k]=='dbc')
			{
				$dbc_room_cnt =$dbc_room_cnt + 1;
			}
			if($room_used_type[$k]=='dbcc')
			{
				$dbcc_room_cnt =$dbcc_room_cnt + 1;
			}
			if($room_used_type[$k]=='tr')
			{
				$tb_room_cnt =$tb_room_cnt + 1;
			}
			if($room_used_type[$k]=='qu')
			{
				$q_room_cnt =$q_room_cnt + 1;
			}

		}
		if($sb_room_cnt > 0)
			{
				$roomCode = 'SB';
				$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$sb_room_cnt.'" Id="'.trim($room).'"></Room>';

			}
			if($db_room_cnt > 0)
			{
				$roomCode = 'DB'; //'db';
				$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$db_room_cnt.'" Id="'.trim($room).'"></Room>';
			}
			if($q_room_cnt > 0)
			{
				$roomCode = 'Q'; //'db';
				$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$q_room_cnt.'" Id="'.trim($room).'"></Room>';
			}

			if($tb_room_cnt > 0)
			{
				$roomCode = 'TR'; //'db';
				$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$tb_room_cnt.'" Id="'.trim($room).'"></Room>';
			}
			if($dbc_room_cnt > 0)
			{
				$roomCode = 'DB'; //'db';
				if($dbc_room_cnt=='2')
				{
					$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$dbc_room_cnt.'">
								<ExtraBeds>
									<Age>5</Age>
									<Age>7</Age>
								</ExtraBeds>

							</Room>';
				}else if($dbc_room_cnt=='3'){
					$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$dbc_room_cnt.'">
								<ExtraBeds>
									<Age>5</Age>
									<Age>7</Age>
									<Age>5</Age>
								</ExtraBeds>

							</Room>';
					}
					else
					{
						$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$dbc_room_cnt.'">
								<ExtraBeds>
									<Age>5</Age>
								</ExtraBeds></Room>';
					}

			}
			if($dbcc_room_cnt > 0)
			{
			$roomCode = 'DB'; //'db';

				if($dbcc_room_cnt == '2')
				{
					$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$dbcc_room_cnt.'" Id="'.trim($room).'">
                                  <ExtraBeds>
									<Age>5</Age>
									<Age>7</Age>
									<Age>5</Age>
									<Age>3</Age>
								  </ExtraBeds>

							</Room>';
				}else if($dbcc_room_cnt == '3'){
					$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$dbcc_room_cnt.'" Id="'.trim($room).'">
								<ExtraBeds>
									<Age>5</Age>
									<Age>7</Age>
									<Age>5</Age>
									<Age>3</Age>
									<Age>5</Age>
									<Age>3</Age>
								</ExtraBeds>

							</Room>';
					}
					else if($dbcc_room_cnt == '1')
					{
						$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$dbcc_room_cnt.'" Id="'.trim($room).'">
<ExtraBeds>
									
									<Age>5</Age>
									<Age>3</Age>
								</ExtraBeds>
							</Room>';
					}
			}

			

			$roomtype[]=$roomCode;

			$client = 1184;
		$email = 'XML.PROVAB@ITRAVELUKRAINE.COM';
		$pass = 'PASS';
		$city=$_SESSION['city'];
		$city_val = $this->B2b_Hotel_Model->get_city_code($city);  
		$city_code = $city_val->gta;
		$URL2 = "https://interface.demo.gta-travel.com/wbsapi/RequestListenerServlet";//local demo
		$xml_data ='<?xml version="1.0" encoding="UTF-8"?>
		<Request>
		<Source>
		<RequestorID Client="'.$client.'" EMailAddress="'.$email.'" Password="'.$pass.'" />
		<RequestorPreferences Language="en" Currency="USD">

			  <RequestMode>SYNCHRONOUS</RequestMode>
		</RequestorPreferences>
		</Source>
		<RequestDetails>
		<SearchChargeConditionsRequest>
			<ChargeConditionsHotel>
				<City>'.$city_code.'</City>
				<Item>'.$hotel_code.'</Item>

				<PeriodOfStay>
					<CheckInDate>'.$cin.'</CheckInDate>
					<CheckOutDate>'.$cout.'</CheckOutDate>
				</PeriodOfStay>
				<Rooms>'.$room1.'
				</Rooms>
			</ChargeConditionsHotel>
		</SearchChargeConditionsRequest>
		</RequestDetails>
		</Request>';

	//	echo $xml_data;


			$ch=curl_init();
			curl_setopt($ch, CURLOPT_URL, $URL2);
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
		//	echo $output;exit;
			  
					   $dom=new DOMDocument(); 
					$dom->loadXML("$output"); 
					//echo $xml_data;exit;
					$day=$dom->getElementsByTagName("Condition"); 
				
				if(isset($day) && !empty($day))
				{
					$i=0;
					foreach($day as $val)
					{
						
						$dayfromval[]=$day->item($i)->getAttribute("FromDay"); 
						$daytoval[]=$day->item($i)->getAttribute("ToDay"); 
						$charge[]=$day->item($i)->getAttribute("Charge"); 
						//echo $day->item($i)->getAttribute("ChargeAmount"); exit;
						 $currencyVal="GBP";
						  
						$amt[]= $day->item($i)->getAttribute("ChargeAmount");
							
							
						$currency[]=$day->item($i)->getAttribute("Currency");
						
						$allowable[]=$day->item($i)->getAttribute("Allowable");
						
						$cday=$val->getElementsByTagName("1_attr"); 
					
						$i++;
					}
					
						
					$val_countterms= count($dayfromval);
				} 
				$pass_chg=$dom->getElementsByTagName("PassengerNameChange");
				if(isset($pass_chg) && !empty($pass_chg))
				{
					foreach($pass_chg as $pass_chgval)
					{
						$pass_chge=$pass_chg->item(0)->getAttribute("Allowable");
					}
				}
				$curr=$currency[0];
			 $amt0 = $amt[0];
		 
		  $curr1=$currency[1];
	 $amt1 = $amt[1];
			$out=explode("-",$_SESSION['ed']);
								$checkin1=$out[2]."-".$out[1]."-".$out[0];
									
					$newdate0 = strtotime ( "-$dayfromval[2] day" , strtotime ($checkin1) ) ;
					$cancel_todate0 = date ( 'd-M-Y' , $newdate0 );					
					$val1=$dayfromval[1]+1;
					$newdate1 = strtotime ( "-$val1 day" , strtotime ($checkin1) ) ;
					$cancel_todate1 = date ( 'd-M-Y' , $newdate1 );
					
					
					$gta_cancel_policy = 'Before '.$cancel_todate0.' No Charges Apply For Booking. ';
					
					$newdate2 = strtotime ( "-$dayfromval[1] day" , strtotime ($checkin1) ) ;
					$cancel_fromdate2 = date ( 'd-M-Y' , $newdate2);
					$tonewdate = strtotime ( "-$daytoval[1] day" , strtotime ($checkin1) ) ;
					$cancel_todate2 = date ( 'd-M-Y' , $tonewdate);
					$api4="gta";	
					// $agtid=$this->session->userdata('agentid');
					/* $service1=$this->Search_Model->get_markup_user($api4);
					 $markuph=$service1->Markup;
					 $commissionh=$service1->Commission;
					 $camt=$amt1;
					 $finalcosttype=$camt+$camt*$markuph/100;	*/
					  $finalcosttype=ceil($amt1);	
				
					$amt0=ceil($amt0);
					/*$camt=$amt0;
					 $finalcosttype=$camt+$camt*$markuph/100;	
					  $finalcosttype=ceil($finalcosttype);	*/	
					$newdate = strtotime ( "-$daytoval[0] day" , strtotime ($checkin1) ) ;
					$cancel_todate = date ( 'd-M-Y' , $newdate );
					$gta_cancel_policy .= 'Onwards '.$cancel_todate2.' Charges Will Apply  '.$amt0.' USD';
					
			$data['cancel_policy']=$gta_cancel_policy;
					
		
			
		
			$data['api'] = 'gta';
			if($data['lat'] !='' && $data['long']!='')
			{
			$data['nearby_hotel']=$this->B2b_Hotel_Model->get_nearby_hotels($data['lat'],$data['long'],$data['hotel_name'],$data['dest']);
			}
			else
			{
			$data['nearby_hotel']='';	
			}
			
				$data['img_array'][]= WEB_DIR.'image_gta/'.$hotel_code.'.jpg';
			
	$this->load->view('b2b/hotel/pre_booking',$data);	
			}
		
		

	
	}
	function book_view()
	{
		
          $_SESSION['book_final_book_val'] = $_POST;
         redirect("b2b/booking_final",'refresh');
	}
	
	function hotel_detail_near($hotel_cod,$cur_id)
	{
		
		$service_near=$this->Hotel_Model->get_searchresult_code($hotel_cod);
		if($service_near!='')
		{
			$data['cur_id'] = $cur_id;
		$id = $service_near->api_temp_hotel_id;
		$service=$this->Hotel_Model->get_searchresult($id);
		
		$api = $service->api;
		$hotel_code = $service->hotel_code;
		$hotel_name = $service->hotel_name;
		$star = $service->star;
		$image = $service->image;
		$data['service']=$service;
		$sec_res=$_SESSION['ses_id'];
		//$data['room_info']=$this->Hotel_Model->fetch_gta_temp_result_room($sec_res,$hotel_code);
		
		if($api=='hotelsbed')
		{
			
			$hotel_contact = $this->Hotel_Model->gethb_hoteldetails($hotel_code);
			
			$hotel_facility = $this->Hotel_Model->gethb_hotelfacility($hotel_code);
			
			$hotel_image= $this->Hotel_Model->gethb_hotelimage_new($hotel_code);
		
			$hotel_hotel = $this->Hotel_Model->gethb_hoteldet($hotel_code);
			
			$data['hotelCode']=$hotel_code;
			if($hotel_contact!="")
			{
				$StNAME=$hotel_contact->ADDRESS;
				$StPIN=$hotel_contact->POSTALCODE;
				$StCITY=$hotel_contact->CITY;
				$htEmail=$hotel_contact->EMAIL; 
				$data['htEmail']=$htEmail;
				$data['StNAME']=$StNAME;
				$data['StPIN']=$StPIN;
				$data['StCITY']=$StCITY;
			}
			else
			{
				$data['htEmail']=""; 
				$data['StNAME']="";
				$data['StPIN']="";
				$data['StCITY']="";
			}
			if($hotel_hotel!="")
			{
				$data['lat']=$hotel_hotel->LATITUDE;
				$data['long']=$hotel_hotel->LONGITUDE;
				$data['HOTELNAME']=$hotel_hotel ->NAME;
				
				$data['nearby_hotel']=$this->Hotel_Model->get_nearby_hotels($data['lat'],$data['long'],$hotel_name,$StCITY);
			}
			else
			{
				$data['Latitude']="0";
				$data['Longitude']="0";
				$data['HOTELNAME']="";
			}
			if($hotel_image!="")
			{
				$img1=array();
				for($i=0;$i< count($hotel_image); $i++)
				{
					 $img=$hotel_image[$i]->IMAGEPATH;
					 $img1[]= "http://www.hotelbeds.com/giata/" . $img;
				}
				$data['img_array']=$img1;
			}
			else
			{
				$img1="";
				$data['img_array']="";
			}				
			if($hotel_facility!="")
			{ 
				$hds=$hotel_facility ->HotelFacilities;
				$root=$hotel_facility->HotelHowToGetThere;
				$time=$hotel_facility->HotelComments;
				$data['hds']=$hds;
				$data['root']=$root;
				$data['time']=$time;
			}
			else
			{
				$data['hds']="";
				$data['root']="";
				$data['time']="";
			}
			$data['address'] = $StNAME.' '.$StPIN;
			$data['dest'] = $StCITY;
			$data['result_id']=$id;
			$data['api'] = 'hotelsbed';
		
		$this->load->view('hotel/hotel_detail',$data);	
			}
	   elseif($api=='gta')
		{
			
			$hotel_contact = $this->Hotel_Model->gethb_hoteldetails($hotel_code);
			
			$hotel_facility = $this->Hotel_Model->gethb_hotelfacility($hotel_code);
			
			$hotel_image= $this->Hotel_Model->gethb_hotelimage_new($hotel_code);
		
			$hotel_hotel = $this->Hotel_Model->gethb_hoteldet($hotel_code);
			
			$data['hotelCode']=$hotel_code;
			if($hotel_contact!="")
			{
				$StNAME=$hotel_contact->ADDRESS;
				$StPIN=$hotel_contact->POSTALCODE;
				$StCITY=$hotel_contact->CITY;
				$htEmail=$hotel_contact->EMAIL; 
				$data['htEmail']=$htEmail;
				$data['StNAME']=$StNAME;
				$data['StPIN']=$StPIN;
				$data['StCITY']=$StCITY;
			}
			else
			{
				$data['htEmail']=""; 
				$data['StNAME']="";
				$data['StPIN']="";
				$data['StCITY']="";
			}
			if($hotel_hotel!="")
			{
				$data['lat']=$hotel_hotel->LATITUDE;
				$data['long']=$hotel_hotel->LONGITUDE;
				$data['HOTELNAME']=$hotel_hotel ->NAME;
			}
			else
			{
				$data['Latitude']="0";
				$data['Longitude']="0";
				$data['HOTELNAME']="";
			}
			if($hotel_image!="")
			{
				$img1=array();
				for($i=0;$i< count($hotel_image); $i++)
				{
					 $img=$hotel_image[$i]->IMAGEPATH;
					 $img1[]= "http://www.hotelbeds.com/giata/" . $img;
				}
				$data['img_array']=$img1;
			}
			else
			{
				$img1="";
				$data['img_array']="";
			}				
			if($hotel_facility!="")
			{ 
				$hds=$hotel_facility ->HotelFacilities;
				$root=$hotel_facility->HotelHowToGetThere;
				$time=$hotel_facility->HotelComments;
				$data['hds']=$hds;
				$data['root']=$root;
				$data['time']=$time;
			}
			else
			{
				$data['hds']="";
				$data['root']="";
				$data['time']="";
			}
			$data['address'] = $StNAME.' '.$StPIN;
			$data['dest'] = $StCITY;
			$data['result_id']=$id;
			$data['api'] = 'hotelsbed';
			
		$this->load->view('hotel/hotel_detail',$data);	
			}
		}
		else
		{
			$this->hotel_detail($cur_id);
		}
	}
	function booking_roomtype($id)
	{
		
		
		$service=$this->Hotel_Model->get_searchresult($id);
		$api = $service->api;
		$hotel_code = $service->hotel_code;
		$hotel_name = $service->hotel_name;
		$star = $service->star;
		$image = $service->image;
		$data['service']=$service;
		$sec_res=$_SESSION['ses_id'];
		$data['room_info']=$this->Hotel_Model->fetch_gta_temp_result_room($sec_res,$hotel_code);
		
		if($api=='hotelsbed')
		{
			
			$hotel_contact = $this->Hotel_Model->gethb_hoteldetails($hotel_code);
			$hotel_facility = $this->Hotel_Model->gethb_hotelfacility($hotel_code);
			$hotel_image= $this->Hotel_Model->gethb_hotelimage_new($hotel_code);
			$hotel_hotel = $this->Hotel_Model->gethb_hoteldet($hotel_code);
			$data['hotelCode']=$hotel_code;
			if($hotel_contact!="")
			{
				$StNAME=$hotel_contact->ADDRESS;
				$StPIN=$hotel_contact->POSTALCODE;
				$StCITY=$hotel_contact->CITY;
				$htEmail=$hotel_contact->EMAIL; 
				$data['htEmail']=$htEmail;
				$data['StNAME']=$StNAME;
				$data['StPIN']=$StPIN;
				$data['StCITY']=$StCITY;
			}
			else
			{
				$data['htEmail']=""; 
				$data['StNAME']="";
				$data['StPIN']="";
				$data['StCITY']="";
			}
			if($hotel_hotel!="")
			{
				$data['lat']=$hotel_hotel->LATITUDE;
				$data['long']=$hotel_hotel->LONGITUDE;
				$data['HOTELNAME']=$hotel_hotel ->NAME;
			}
			else
			{
				$data['Latitude']="0";
				$data['Longitude']="0";
				$data['HOTELNAME']="";
			}
			if($hotel_image!="")
			{
				$img1=array();
				for($i=0;$i< count($hotel_image); $i++)
				{
					 $img=$hotel_image[$i]->IMAGEPATH;
					 $img1[]= "http://www.hotelbeds.com/giata/" . $img;
				}
				$data['img_array']=$img1;
			}
			else
			{
				$img1="";
				$data['img_array']="";
			}				
			if($hotel_facility!="")
			{ 
				$hds=$hotel_facility ->HotelFacilities;
				$root=$hotel_facility->HotelHowToGetThere;
				$time=$hotel_facility->HotelComments;
				$data['hds']=$hds;
				$data['root']=$root;
				$data['time']=$time;
			}
			else
			{

				$data['hds']="";
				$data['root']="";
				$data['time']="";
			}
			$data['address'] = $StNAME.' '.$StPIN;
			$data['dest'] = $StCITY;
			$data['result_id']=$id;
			$data['api'] = 'hotelsbed';
		$this->load->view('hotel/pre_booking_view',$data);	
			}
	
	}
	function booking_view($id)
	{
			
		$gender=$this->input->post('gender');
	$surname=$this->input->post('surname');
	$middle_name=$this->input->post('middle_name');
	$name=$this->input->post('name');
	$dob=$this->input->post('dob');
	$guestname=$this->input->post('guestname');
	$gus_name=$guestname[0];
	$req=$this->input->post('req');
	$data['gender']=$gender;
	$data['surname']=$surname;
	$data['middle_name']=$middle_name;
	$data['name']=$name;
	$data['dob']=$dob;
	$data['guestname']=$guestname;
	$_SESSION['gus_name']=$gus_name;
	$data['req']=$req;
	$service=$this->Hotel_Model->get_searchresult($id);
		$api = $service->api;
		$data['service']=$service;
		
		$this->load->view('hotel/booking_view',$data);	
	}
	
	function booking_final()
	{
	
        $value = $_SESSION['book_final_book_val'];
			
	$sec_res=$_SESSION['ses_id'];

	//print_r($userid);exit;
	$id=$value['result_id'];
	$id_1 = explode("-",$id);
	$service=array();
	$hotel_id='';
	$roomcat='';
	$roomty='';
	for($j=0;$j< count($id_1);$j++)
	{
	 $service =$this->B2b_Hotel_Model->get_searchresult($id_1[$j]);
	$hotel_id .= $service->hotel_code.'-'.$hotel_id;
	$roomcat .=$service->room_code.'-'.$roomcat;
    $roomty .=$service->room_type.'-'.$roomty;
	}
	
	$fname = $value['fname'];
	//print_r($gender);exit;
	$lname = array();
	$gender = 'M';
	// $guest_name = array('test'); 
		 for($i=0; $i< count($fname); $i++)
	 {

			if($i==0){
				$parent_id = 0;
			}
			$data1 = array(
			     //'flight_booking_id' => $flight_booking_ids,
				 'group' => 1,
				 'gender' => $gender,
				 'last_name' => '', 
				 'middle_name' => '',
				 'first_name' => $fname[$i],
				 'nationality' => '',
				 'product_id' => 1,
				 'parent_id' => $parent_id
			);
			
			$this->db->insert('customer_info_details', $data1);//adult_booking_details 
			$customer_info_details_id = $this->db->insert_id();
			
			if($i==0){
				$parent_id = $this->db->insert_id();
				//$_SESSION['parent_customer_id'] = $parent_id;
			
			}
			
		
            // insertion to flight_booking_info  single/multiple
			//adult_booking_details 	
	
		}
		
			$gende ='M';
		
		$data['gender_co']=$gende;
		$data['surname_co']='';
		$data['middle_co']='';
		$data['name_co']=$fname[0];
		$data['city_co']=$value['city'];
		$data['mobile_co']='';
		$data['phone_co']=$value['mobile'];
		$data['email_co']=$value['email'];
		//echo '<pre>'; //print_r($data); exit;
		//insert into customer_contact_details (all products) single record

				$data4 = array(
					 'customer_info_details_id' => $parent_id,
					 'gender' => $data['gender_co'],
					 'last_name' => $data['surname_co'], 
					 'middle_name' => $data['middle_co'],
					 'first_name' => $data['name_co'],
					 'city' => $data['city_co'],
					 'mobile' => $data['mobile_co'],
					 'phone' => $data['phone_co'], 
					 'email' => $data['email_co']
				);
				
					$user_id = 0;
				
				$this->db->insert('customer_contact_details', $data4); 
				$parent_customer_id = $this->db->insert_id();
		$data5 = array(
		 'product_id' => 2,
		 'user_id' => $user_id,
		 'amount' => $value['amount'],
		 'customer_contact_details_id' => $parent_customer_id, 
		 'created_date' => date("Y-m-d")
	);
	
	$this->db->insert('transaction_details', $data5); //exit;
	$parent_transaction_id = $this->db->insert_id();
	
	//$this->booking_final_pay($id,$parent_transaction_id);
		redirect('b2b/booking_final_pay/'.$id.'/'.$parent_transaction_id, 'refresh');
		
	}
	function booking_final_pay($result_id,$parent_transaction_id)
	{	
	
	$room_count = $_SESSION['room_count'];


		if($room_count == 1)
		{
			
			$service=$this->B2b_Hotel_Model->get_searchresult($result_id);
			$h_hotel_id = $service->hotel_code;
			$h_hotel_name = $service->hotel_name;
			$h_star = $service->star;
			$h_description = $service->description;
			$h_address = $service->address;
			$h_city = $service->city;
			$h_phone = $service->phone;
			$h_fax = $service->fax;
			
			$trans=$this->B2b_Hotel_Model->transation_detail($parent_transaction_id);
	 		$trans_id = $trans->customer_contact_details_id;
	 		$contact_info=$this->B2b_Hotel_Model->contact_info_detail($trans_id);
            $con_id = $contact_info->customer_info_details_id;
	 		$pass_info=$this->B2b_Hotel_Model->pass_info_detail($con_id);
		}
		else
		{
			$result_id1 = explode("-",$result_id);
			$service=$this->B2b_Hotel_Model->get_searchresult($result_id1[0]);
			$h_hotel_id = $service->hotel_code;
			$h_hotel_name = $service->hotel_name;
			$h_star = $service->star;
			$h_description = $service->description;
			$h_address = $service->address;
			$h_city = $service->city;
			$h_phone = $service->phone;
			$h_fax = $service->fax;
			
			$trans=$this->B2b_Hotel_Model->transation_detail($parent_transaction_id);
	 		$trans_id = $trans->customer_contact_details_id;
	 		$contact_info=$this->B2b_Hotel_Model->contact_info_detail($trans_id);
            $con_id = $contact_info->customer_info_details_id;
	 		$pass_info=$this->B2b_Hotel_Model->pass_info_detail($con_id);
	 
		
			
		}
		 $h_room_type = $_SESSION['book_final_book_val']['room_type'];
		 $h_cancel_policy = $_SESSION['book_final_book_val']['cancel_policy'];
		 
	
	
	 // echo "<pre/>";print_r($contact_info);exit;
	 if($service->api == 'hotelsbed')
	 {
		 $res_id=explode('-',$result_id);
		for($rs=0;$rs< count($res_id);$rs++)
		{
		  $search=$this->B2b_Hotel_Model->get_cancel_attrib_new($res_id[$rs]);
		  $adults[]=$search->adult;
		  $childs[]=$search->child;
		
		}
	
		$h_adult = implode("-",$adults);
		$h_child = implode("-",$childs);
		$data['guestadult']=$guestadult=array_sum($adults);
		$data['guestchild']=$guestchild=array_sum($childs);
		
			$address=$contact_info->city;
			
			
			$api='hotelsbed';
			
			 $fname1=$pass_info[0]->first_name;			 
			 $lname1=$pass_info[0]->last_name;			
			 
			 $roomusedtypeval=$_SESSION['room_used_type'];
			 $roomcount=$_SESSION['room_count'];
			
			 $markup = '';
			 
			 $username = '';
			 $email = $contact_info->email;
			 
			 $nameval='';
			/* $childage1=$this->session->userdata('childage');
			 $childage2=$this->session->userdata('childage2');	
			 $childage3=$this->session->userdata('childage3');
			 $childage4=$this->session->userdata('childage4');	 			
			 $childage5=$this->session->userdata('childage5');
			 $childage6=$this->session->userdata('childage6');
		*/	 	
			$m=1;
			$j=0;

			$adult=0;
			$child=0;
			$lname1=$fname1;
	for($i=0;$i< count($roomusedtypeval);$i++)
	{
		if($roomusedtypeval[$i]=='sb')
		{
				$roomCode = 'SB';
				
		
				$nameval.='<Customer type="AD">
								<CustomerId>'.$m.'</CustomerId>
								<Age>30</Age>
								<Name>'.$fname1[$j].'</Name>
								<LastName>'.$lname1[$j].'</LastName>
							</Customer>';
				$m++;
				$j++;
				
	
				
			}
		elseif($roomusedtypeval[$i]=='db')
		{
				$roomCode = 'DB'; //'db';
				
		
				$nameval.='<Customer type="AD">
								<CustomerId>'.$m.'</CustomerId>
								<Age>30</Age>
								<Name>'.$fname1[$j].'</Name>
								<LastName>'.$lname1[$j].'</LastName>
							</Customer>';
				$m++;
				$j++;
						
			
			
	
			}
		elseif($roomusedtypeval[$i]=='qu')
		{
				$roomCode = 'Q'; //'db';
				
		
				$nameval.='<Customer type="AD">
								<CustomerId>'.$m.'</CustomerId>
								<Age>30</Age>
								<Name>'.$fname1[$j].'</Name>
								<LastName>'.$lname1[$j].'</LastName>
							</Customer>';
				$m++;
				$j++;
						
	
		
	
			}
		elseif($roomusedtypeval[$i]=='8')
		{
				$roomCode = 'tr'; //'db';
				
		
				$nameval.='<Customer type="AD">
								<CustomerId>'.$m.'</CustomerId>
								<Age>30</Age>
								<Name>'.$fname1[$j].'</Name>
								<LastName>'.$lname1[$j].'</LastName>
							</Customer>';
				$m++;
				$j++;
		}
		elseif($roomusedtypeval[$i]=='4')
		{
				$roomCode = 'dbc'; //'db';
		//echo $roomcount[$i];exit;
				if($roomcount[$i]=='1')
				{
					$nameval.='<Customer type="AD">
								<CustomerId>'.$m.'</CustomerId>
								<Age>30</Age>
								<Name>'.$fname1[0].'</Name>
								<LastName>'.$lname1[0].'</LastName>
							</Customer>';
							$m++;
					$nameval.='<Customer type="CH">
					<CustomerId>'.$m.'</CustomerId>
					<Age>'.$childage1[$i].'</Age>
					</Customer>';
							$m++;
					$nameval.='<Customer type="AD">
							<CustomerId>'.$m.'</CustomerId>
							<Age>30</Age>
							<Name>'.$fname1[1].'</Name>
							<LastName>'.$fname1[1].'</LastName>
	
					</Customer>';
							$m++;
				}
				if($roomcount[$i]=='2')
				{
					
					$nameval.='<Customer type="AD">	
								<CustomerId>'.$m.'</CustomerId>
								<Age>30</Age>
								<Name>'.$fname1[0].'</Name>
								<LastName>'.$lname1[0].'</LastName>
							</Customer>';
							$m++;
					$nameval.='<Customer type="CH">
					<CustomerId>'.$m.'</CustomerId>
					<Age>'.$childage1[$i].'</Age>
					</Customer>';
							$m++;
					$nameval.='<Customer type="AD">
							<CustomerId>'.$m.'</CustomerId>
							<Age>30</Age>
							<Name>'.$fname1[1].'</Name>
							<LastName>'.$lname1[1].'</LastName>	
					</Customer>';
							$m++;
					$nameval.='<Customer type="CH">
					<CustomerId>'.$m.'</CustomerId>
					<Age>'.$childage2[$i].'</Age>
					</Customer>';
							$m++;
					$nameval.='<Customer type="AD">
								<CustomerId>'.$m.'</CustomerId>
								<Age>30</Age>
								<Name>'.$fname1[2].'</Name>	
								<LastName>'.$lname1[2].'</LastName>
							</Customer>';
							$m++;
					$nameval.='<Customer type="AD">
								<CustomerId>'.$m.'</CustomerId>
								<Age>30</Age>
								<Name>'.$fname1[3].'</Name>	
								<LastName>'.$lname1[3].'</LastName>	
							</Customer>';
					$m++;
					 }
				 if($roomcount[$i]=='3')
				 {
					 $nameval.='<Customer type="AD">
	
								<CustomerId>'.$m.'</CustomerId>
								<Age>30</Age>
								<Name>'.$fname1[0].'</Name>
								<LastName>'.$lname1[0].'</LastName>
							</Customer>';
							$m++;
					$nameval.='<Customer type="CH">
					<CustomerId>'.$m.'</CustomerId>

					<Age>'.$childage1[$i].'</Age>
					</Customer>';
							$m++;
					$nameval.='<Customer type="AD">
							<CustomerId>'.$m.'</CustomerId>
							<Age>30</Age>
							<Name>'.$fname1[1].'</Name>
							<LastName>'.$lname1[1].'</LastName>
	
					</Customer>';
							$m++;
					$nameval.='<Customer type="CH">
					<CustomerId>'.$m.'</CustomerId>
					<Age>'.$childage2[$i].'</Age>
					</Customer>';
							$m++;
					$nameval.='<Customer type="AD">
								<CustomerId>'.$m.'</CustomerId>
								<Age>30</Age>
								<Name>'.$fname1[2].'</Name>	
								<LastName>'.$lname1[2].'</LastName>
							</Customer>';
							$m++;
					$nameval.='<Customer type="AD">
								<CustomerId>'.$m.'</CustomerId>
								<Age>30</Age>
								<Name>'.$fname1[3].'</Name>	
								<LastName>'.$lname1[3].'</LastName>	
							</Customer>';
					$m++;
					$nameval.='<Customer type="CH">
					<CustomerId>'.$m.'</CustomerId>
					<Age>'.$childage3[$i].'</Age>
					</Customer>';
							$m++;
							$nameval.='<Customer type="AD">
								<CustomerId>'.$m.'</CustomerId>
								<Age>30</Age>
								<Name>'.$fname1[4].'</Name>	
								<LastName>'.$lname1[4].'</LastName>
							</Customer>';
							$m++;
					$nameval.='<Customer type="AD">
								<CustomerId>'.$m.'</CustomerId>
								<Age>30</Age>
								<Name>'.$fname1[5].'</Name>	
								<LastName>'.$lname1[5].'</LastName>	
							</Customer>';
					$m++;
				
		
				 }			
			}
		elseif($roomusedtypeval[$i]=='7')
		{
			$roomCode = 'dbcc'; //'db';
			if($roomcount[$i]=='1')
			{		
					$nameval.='<Customer type="AD">	
								<CustomerId>'.$m.'</CustomerId>
								<Age>30</Age>
								<Name>'.$fname1[0].'</Name>
								<LastName>'.$lname1[0].'</LastName>
							</Customer>';
							$m++;
					$nameval.='<Customer type="CH">
					<CustomerId>'.$m.'</CustomerId>
					<Age>'.$childage1[$i].'</Age>
					</Customer>';
							$m++;
					$nameval.='<Customer type="AD">
							<CustomerId>'.$m.'</CustomerId>
							<Age>30</Age>
							<Name>'.$fname1[1].'</Name>
							<LastName>'.$lname1[1].'</LastName>
	
					</Customer>';
							$m++;
					$nameval.='<Customer type="CH">
					<CustomerId>'.$m.'</CustomerId>
					<Age>'.$childage4[$i].'</Age>
					</Customer>';
							$m++;
					
			}
			if($roomcount[$i]=='2')
			{
				$nameval.='<Customer type="AD">	
								<CustomerId>'.$m.'</CustomerId>
								<Age>30</Age>
								<Name>'.$fname1[2].'</Name>
								<LastName>'.$lname1[2].'</LastName>
							</Customer>';
							$m++;
					$nameval.='<Customer type="CH">
					<CustomerId>'.$m.'</CustomerId>
					<Age>'.$childage1[$i].'</Age>
					</Customer>';
							$m++;
					$nameval.='<Customer type="AD">
							<CustomerId>'.$m.'</CustomerId>
							<Age>30</Age>
							<Name>'.$fname1[3].'</Name>
							<LastName>'.$lname1[3].'</LastName>	
					</Customer>';
							$m++;
					$nameval.='<Customer type="CH">
					<CustomerId>'.$m.'</CustomerId>
					<Age>'.$childage4[$i].'</Age>
					</Customer>';
							$m++;
					$nameval.='<Customer type="AD">
								<CustomerId>'.$m.'</CustomerId>
								<Age>30</Age>
								<Name>'.$fname1[4].'</Name>	
								<LastName>'.$lname1[4].'</LastName>
							</Customer>';
							$m++;
					$nameval.='<Customer type="AD">
								<CustomerId>'.$m.'</CustomerId>
								<Age>30</Age>
								<Name>'.$fname1[5].'</Name>	
								<LastName>'.$lname1[5].'</LastName>	
							</Customer>';
					$m++;
					$nameval.='<Customer type="CH">
					<CustomerId>'.$m.'</CustomerId>
					<Age>'.$childage2[$i].'</Age>
					</Customer>';
							$m++;
					$nameval.='<Customer type="CH">
					<CustomerId>'.$m.'</CustomerId>
					<Age>'.$childage5[$i].'</Age>
					</Customer>';
							$m++;
					
	
			}
			if($roomcount[$i]=='3')
			{
				
				$nameval.='<Customer type="AD">
	
								<CustomerId>'.$m.'</CustomerId>
								<Age>30</Age>
								<Name>'.$fname1[0].'</Name>
								<LastName>'.$lname1[0].'</LastName>
							</Customer>';
							$m++;
					$nameval.='<Customer type="CH">
					<CustomerId>'.$m.'</CustomerId>
					<Age>'.$childage1[$i].'</Age>
					</Customer>';
							$m++;
					$nameval.='<Customer type="AD">
							<CustomerId>'.$m.'</CustomerId>
							<Age>30</Age>
							<Name>'.$fname1[1].'</Name>
							<LastName>'.$lname1[1].'</LastName>
	
					</Customer>';
							$m++;
					$nameval.='<Customer type="CH">
					<CustomerId>'.$m.'</CustomerId>
					<Age>'.$childage4[$i].'</Age>
					</Customer>';
							$m++;
					$nameval.='<Customer type="AD">
								<CustomerId>'.$m.'</CustomerId>
								<Age>30</Age>
								<Name>'.$fname1[2].'</Name>
	
								<LastName>'.$lname1[2].'</LastName>
							</Customer>';
							$m++;
					$nameval.='<Customer type="AD">
								<CustomerId>'.$m.'</CustomerId>
								<Age>30</Age>
								<Name>'.$fname1[3].'</Name>
	
								<LastName>'.$lname1[3].'</LastName>
	
							</Customer>';
					$m++;
					$nameval.='<Customer type="CH">
					<CustomerId>'.$m.'</CustomerId>
					<Age>'.$childage2[$i].'</Age>
					</Customer>';
							$m++;
					$nameval.='<Customer type="CH">
					<CustomerId>'.$m.'</CustomerId>
					<Age>'.$childage5[$i].'</Age>
					</Customer>';
							$m++;
					
					$nameval.='<Customer type="AD">
								<CustomerId>'.$m.'</CustomerId>
								<Age>30</Age>
								<Name>'.$fname1[4].'</Name>
	
								<LastName>'.$lname1[4].'</LastName>
							</Customer>';
							$m++;
					$nameval.='<Customer type="AD">
								<CustomerId>'.$m.'</CustomerId>
								<Age>30</Age>
								<Name>'.$fname1[5].'</Name>
	
								<LastName>'.$lname1[5].'</LastName>
	
							</Customer>';
					$m++;
					$nameval.='<Customer type="CH">
					<CustomerId>'.$m.'</CustomerId>
					<Age>'.$childage3[$i].'</Age>
					</Customer>';
							$m++;
					$nameval.='<Customer type="CH">
					<CustomerId>'.$m.'</CustomerId>
					<Age>'.$childage6[$i].'</Age>
					</Customer>';
							$m++;
							
			}
	
	
			}		
	}

$nameval2=$nameval;
//print_r($_SESSION);exit;
	 
         $serviceval=$_SESSION['SPUI'];
		 $purTokenVal=$_SESSION['purchaseToken'];  
          
		$user="PHUKETBNTH14573";
		$pass="PHUKETBNTH14573";
		$URL = "http://212.170.239.71/appservices/http/FrontendService";//local
             
           $data ='<PurchaseConfirmRQ xmlns="http://www.hotelbeds.com/schemas/2005/06/messages" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.hotelbeds.com/schemas/2005/06/messages PurchaseConfirmRQ.xsd" echoToken="DummyEchoToken">
	<Language>ENG</Language>
	<Credentials>
		<User>'.$user.'</User>
		<Password>'.$pass.'</Password>
	</Credentials>
	<ConfirmationData purchaseToken="'.$purTokenVal.'">
		<Holder type="AD">
			<Name>'.$fname1[0].'</Name>
			<LastName>'.$lname1[0].'</LastName>
		</Holder>
		<AgencyReference>test</AgencyReference>
		<ConfirmationServiceDataList>
			<ServiceData xsi:type="ConfirmationServiceDataHotel" SPUI="'.$serviceval.'">
				<CustomerList>'.$nameval2.'
					</CustomerList>
			</ServiceData>
		</ConfirmationServiceDataList>
	</ConfirmationData>
</PurchaseConfirmRQ>';
	//echo $data;
	
		$ch = curl_init($URL);			
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml'));
			curl_setopt ($ch, CURLOPT_ENCODING, "gzip");
			curl_setopt($ch, CURLOPT_POSTFIELDS, "$data");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			 $xmls = curl_exec($ch);		
							
				//$array = $this->Home_Model->xml2ary($xmls);
	

	//	echo $xmls;exit;
 
			// $array = $this->Search_Model->xml2array($output);
			
			$dom=new DOMDocument();
			$dom->loadXML($xmls);		  
		  
					
						
			$IncomingOffice=$dom->getElementsByTagName("IncomingOffice");
			
            $IncomingOfficecode = $IncomingOffice->item(0)->nodeValue;
						 
			 
		   
			$bookingItemCode=$dom->getElementsByTagName("FileNumber");
			
            $bookingItemCodeval = $bookingItemCode->item(0)->nodeValue;
			
			
			
			 $statusval='';
			$status=$dom->getElementsByTagName("HotelRoom");
			foreach($status as $ddd)
			{
             $statusval = $status->item(0)->getAttribute("status");
			}
            
		   $cancel = $dom->getElementsByTagName( "CancellationPolicy" );
$dateFromValc='';
		  foreach($cancel as $canval)
		  {
	        $dateFromc=$canval->getElementsByTagName( "DateTimeFrom" );
		    $dateFromValc=$dateFromc->item(0)->getAttribute("date");
           
	      }
		
		
		$guestadult=$_SESSION['adult_count'];
		$guestchild=$_SESSION['child_count'];
		$cin=date("Y-m-d", strtotime($_SESSION['sd']));
		$cout=date("Y-m-d", strtotime($_SESSION['ed']));

		$date=date('Y-m-d');
		$roomcountss=$_SESSION['room_count'];;
		$bookingItemCodeval=$IncomingOfficecode.'-'.$bookingItemCodeval;	


	$user_id = 	$this->session->userdata('agent_id');
	
	$nights = $_SESSION['days'] ;
	$val_last=$this->B2b_Hotel_Model->inser_customer_book_hotelpro($h_hotel_id,$h_hotel_name,$h_star,$h_description,$h_address,$h_phone,$h_fax,$h_room_type,$h_cancel_policy,$cin,$cout,$date,$roomcountss,$user_id,$nights,$trans_id,$h_adult,$h_child,$con_id,$dateFromValc,$h_city);
 $this->B2b_Hotel_Model->inser_customer_book_hotelpro_trans_hotel($trans_id,$bookingItemCodeval,$user_id,$val_last);
		$this->voucher_email($val_last);	

			redirect('b2b/voucher/'.$val_last, 'refresh');		
		//	print_r($roomusedtypeval);echo '<br/>';print_r($roomcount);exit;
			
			    
			   		
     }
	 
	else if($service->api == 'gta')
	 {
		
		  $search=$this->B2b_Hotel_Model->get_cancel_attrib_new($result_id);
		  $adults=$search->adult;
		  $child=$search->child;
		   $roomcat=$search->room_code;
		   $hotel_id=$search->hotel_code;
		  $roomcountss=$_SESSION['room_count'];
		  $noofdays=$_SESSION['days'];
		 
		$data['guestadult']=$_SESSION['adult_count'];
		$data['guestchild']=$_SESSION['child_count'];
		
			$address=$contact_info->city;
		
		 $cin=date("Y-m-d", strtotime($_SESSION['sd']));
		$cout=date("Y-m-d", strtotime($_SESSION['ed']));
			$noofroom=$_SESSION['room_count'];
			$child=$_SESSION['child_count'];
			$adult=$_SESSION['adult_count'];
			$api='gta';
			
			 $fname1=$pass_info[0]->first_name;			 
			 $lname1=$pass_info[0]->last_name;			
			 
			 $roomusedtypeval=$_SESSION['room_used_type'];
			 $roomcount=$_SESSION['room_count'];
			 $result_id=$result_id;
			
			 $email = $contact_info->email;
			 
			 $nameval='';
			/* $childage1=$this->session->userdata('childage');
			 $childage2=$this->session->userdata('childage2');	
			 $childage3=$this->session->userdata('childage3');
			 $childage4=$this->session->userdata('childage4');	 			
			 $childage5=$this->session->userdata('childage5');
			 $childage6=$this->session->userdata('childage6');
		*/	 	
			$m=1;
			$j=0;

			$adult=0;
			$child=0;
			$lname1=$fname1;

	 		$room_used_type=$_SESSION['room_used_type'];
		$city=$_SESSION['city'];
		$sd=$_SESSION['sd'];
		$room_count=$_SESSION['room_count'];
		$ed=$_SESSION['ed'];
		$city_val = $this->B2b_Hotel_Model->get_city_code($city);  
		$citycode = $city_val->gta;
		
			$sb_room_cnt =0;
		$db_room_cnt =0;
		$tb_room_cnt =0;
		$q_room_cnt =0;
		$dbc_room_cnt =0;
		$dbcc_room_cnt =0;
$room1='';
$hotelbed_rooms='';
$bookroom='';
		for($k=0;$k< $room_count;$k++)
		{
			if($room_used_type[$k]=='sb')
			{
				$sb_room_cnt =$sb_room_cnt + 1;
			}
			if($room_used_type[$k]=='db')
			{
				$db_room_cnt =$db_room_cnt + 1;
			}
			if($room_used_type[$k]=='dbc')
			{
				$dbc_room_cnt =$dbc_room_cnt + 1;
			}
			if($room_used_type[$k]=='dbcc')
			{
				$dbcc_room_cnt =$dbcc_room_cnt + 1;
			}
			if($room_used_type[$k]=='tr')
			{
				$tb_room_cnt =$tb_room_cnt + 1;
			}
			if($room_used_type[$k]=='qu')
			{
				$q_room_cnt =$q_room_cnt + 1;
			}

		}
		if($sb_room_cnt > 0)
			{
				$roomCode = 'SB';
				$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$sb_room_cnt.'" Id="'.trim($roomcat).'"></Room>';
				for($x=0;$x< $sb_room_cnt;$x++)
				{

					$bookroom.='<HotelRoom Code="'.$roomCode.'" Id="'.$roomcat.'"><PaxIds>';

						$bookroom.="<PaxId>$m</PaxId>";


					$bookroom.='</PaxIds></HotelRoom>';

					$nameval.="<PaxName PaxId=\"$m\">$fname1</PaxName>";
					$j++;
					$m++;
				}

			}
			if($db_room_cnt > 0)
			{
				$roomCode = 'DB'; //'db';
				$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$db_room_cnt.'" Id="'.trim($roomcat).'"></Room>';

				for($x=0;$x< $db_room_cnt;$x++)
				{
					$bookroom.='<HotelRoom Code="'.$roomCode.'" Id="'.$roomcat.'"><PaxIds>';
					for($l=0;$l<2;$l++)
					{
						$bookroom.="<PaxId>$m</PaxId>";
						$nameval.="<PaxName PaxId=\"$m\">$fname1</PaxName>";
					    //echo $nameval;exit;
						$m++;
						$j++;
					}
					$bookroom.='</PaxIds></HotelRoom>';
				}

			}
			if($q_room_cnt > 0)
			{
				$roomCode = 'Q'; //'db';
				$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$q_room_cnt.'" Id="'.trim($roomcat).'"></Room>';

				for($x=0;$x< $q_room_cnt;$x++)
				{
					$bookroom.='<HotelRoom Code="'.$roomCode.'" Id="'.$roomcat.'"><PaxIds>';
					for($l=0;$l<4;$l++)
					{
						$bookroom.="<PaxId>$m</PaxId>";
						$nameval.="<PaxName PaxId=\"$m\">$fname1</PaxName>";
					//	echo $nameval;exit;
						$m++;
						$j++;
					}
					$bookroom.='</PaxIds></HotelRoom>';
				}

			}
			if($tb_room_cnt > 0)
			{
				$roomCode = 'TR'; //'db';
				$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$tb_room_cnt.'" Id="'.trim($roomcat).'"></Room>';

				for($x=0;$x< $tb_room_cnt;$x++)
				{
					$bookroom.='<HotelRoom Code="'.$roomCode.'" Id="'.$roomcat.'"><PaxIds>';
					for($l=0;$l<3;$l++)
					{
						$bookroom.="<PaxId>$m</PaxId>";
						$nameval.="<PaxName PaxId=\"$m\">$fname1</PaxName>";
					//	echo $nameval;exit;
						$m++;
						$j++;
					}
					$bookroom.='</PaxIds></HotelRoom>';
				}

			}

			if($dbc_room_cnt > 0)
			{
				$roomCode = 'TB'; //'db';
				$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$dbc_room_cnt.'" Id="'.trim($roomcat).'">
								<ExtraBeds>
									<Age>5</Age>
								</ExtraBeds>
							</Room>';

				for($x=0;$x< $dbc_room_cnt;$x++)
				{
					$bookroom.='<HotelRoom Code="'.$roomCode.'" Id="'.$roomcat.'"><PaxIds>';
					for($l=0;$l<2;$l++)
					{

						$bookroom.="<PaxId>$m</PaxId>";
						$nameval.="<PaxName PaxId=\"$m\">$fname1</PaxName>";
					//	echo $nameval;exit;
						$m++;
						$j++;
					}
					//$bookroom.="<PaxId>$m</PaxId>";


					$bookroom.='</PaxIds></HotelRoom>';
					$nameval.="<PaxName PaxId=\"$m\" PaxType=\"child\" ChildAge=\"5\">test</PaxName>";
					$m++;
					$child++;
				}

			}
			if($dbcc_room_cnt > 0)
			{
				if($dbcc_room_cnt==1)
				{
				$ch='<Age>5</Age>';
				}
				else if($dbcc_room_cnt==2)
				{
					$ch='<Age>5</Age><Age>5</Age>';
				}
					else if($dbcc_room_cnt==3)
				{
					$ch='<Age>5</Age><Age>5</Age><Age>5</Age>';
				}
				$roomCode = 'TB'; //'db';
				$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$dbcc_room_cnt.'" Id="'.trim($roomcat).'">
								<ExtraBeds>
									'.$ch.'
								</ExtraBeds>
							</Room>';

				for($x=0;$x< $dbcc_room_cnt;$x++)
				{
					$bookroom.='<HotelRoom Code="'.$roomCode.'" Id="'.$roomcat.'"><PaxIds>';
					for($l=0;$l<2;$l++)
					{
						$bookroom.="<PaxId>$m</PaxId>";
						$nameval.="<PaxName PaxId=\"$m\">$fname1</PaxName>";
					//	echo $nameval;exit;
						$m++;
						$j++;
					}
				//	$bookroom.="<PaxId>$m</PaxId>";
					$bookroom.='</PaxIds></HotelRoom>';
					$nameval.="<PaxName PaxId=\"$m\" PaxType=\"child\" ChildAge=\"7\">test</PaxName>";
					$m++;
					$child++;
				}

			}

			
			
$rooms=$room1;
$broom=$bookroom;
$paxidval='';
$nameval2=$nameval;
$refcode='ITRAVEL'.time();
$client="1184";
	$email="XML.PROVAB@ITRAVELUKRAINE.COM";
	$pass="PASS"; // local
	$URL = "https://interface.demo.gta-travel.com/wbsapi/RequestListenerServlet";//local
	
$xml_data ='<?xml version="1.0" encoding="UTF-8"?>
<Request xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="cbsapi.xsd">
	<Source>
		<RequestorID Client="'.$client.'" EMailAddress="'.$email.'" Password="'.$pass.'" />
		<RequestorPreferences Language="en" Currency="USD">
			<RequestMode>SYNCHRONOUS</RequestMode>
		</RequestorPreferences>
	</Source>
	<RequestDetails>
		<AddBookingRequest>
			<BookingReference>'.$refcode.'</BookingReference>
			<PaxNames>
				'.$nameval2.'
			</PaxNames>
			<BookingItems>
				<BookingItem ItemType="hotel">
		<ItemReference>1</ItemReference>
		<ItemCity Code="'.$citycode.'" />
					<Item Code="'.$hotel_id.'" />
					<HotelItem>
						<PeriodOfStay>
							<CheckInDate>'.$cin.'</CheckInDate>
							<CheckOutDate>'.$cout.'</CheckOutDate>
						</PeriodOfStay>
						<HotelRooms>'.$broom.'
						</HotelRooms>
					</HotelItem>
				</BookingItem>
			</BookingItems>
		</AddBookingRequest>
	</RequestDetails>
</Request>';
//echo $xml_data;exit;
	//$URL ='https://interface.gta-travel.com/gtaapi/RequestListenerServlet';//local
//	$URL = "https://interface.demo.gta-travel.com/wbsapi/RequestListenerServlet";//local

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

			$ref_no=$dom->getElementsByTagName("BookingReference");
            $book_noval = $ref_no->item(0)->nodeValue;
			$api='gta';
$hotelcodeval = $hotel_id;
			$bookingItemCode=$dom->getElementsByTagName("BookingItem");


				
						foreach($bookingItemCode as $cnno){
					       $bookingItemCode1=$cnno->getElementsByTagName("ItemConfirmationReference");
                           $bookingItemCodeval = $bookingItemCode1->item(0)->nodeValue;


						   $status=$cnno->getElementsByTagName("ItemStatus");
                           $statusval = $status->item(0)->nodeValue;


							

						}
						
			
	
		
		
		
		$guestadult=$_SESSION['adult_count'];
		$guestchild=$_SESSION['child_count'];
	
		$date=date('Y-m-d');
		$roomcountss=$_SESSION['room_count'];;
		

		$user_id=$this->session->userdata('agent_id');
	

	$dateFromValc = Date('Y-m-d', strtotime("+3 days" , strtotime ( $cin )));

	
	$nights = $_SESSION['days'] ;
	$val_last=$this->B2b_Hotel_Model->inser_customer_book_hotelpro($h_hotel_id,$h_hotel_name,$h_star,$h_description,$h_address,$h_phone,$h_fax,$h_room_type,$h_cancel_policy,$cin,$cout,$date,$noofroom,$user_id,$nights,$trans_id,$adults,$child,$con_id,$dateFromValc,$h_city);
 $this->B2b_Hotel_Model->inser_customer_book_hotelpro_trans_hotel($trans_id,$bookingItemCodeval,$user_id,$val_last);
		$this->voucher_email($val_last);	

			redirect('b2b/voucher/'.$val_last, 'refresh');		
			
/*	$val_last=$this->Hotel_Model->inser_customer_book_hotelpro($bookingItemCodeval,$bookingItemCodeval,$statusval,$hotelcodeval,$dateFromValc,$dateToValc,$dateFromValc,$amount,$BoardTypeVal,$bookingItemCodeval,$amount,$amount,'gta',$amount,$api_uni_id,0,$email,'test',$roomcountss,$guestadult,$guestchild,$RoomTypeVal,$cancelpol,1,$amount,$trans_id);
 
 $this->Hotel_Model->inser_customer_book_hotelpro_trans_hotel($trans_id,'',$bookingItemCodeval,$booked_amount_gta,$user_id,$val_last);
		$this->voucher_email($val_last);	
//$this->voucher($val_last);
	redirect('hotel/voucher/'.$val_last, 'refresh');*/			
		//	print_r($roomusedtypeval);echo '<br/>';print_r($roomcount);exit;
			
			    
			   		
     }
	 
	 
	}
	
	function send_voucher_email($id,$msg='')
{
	$data['id'] = $id;
	$data['msg'] = $msg;
	
	$this->form_validation->set_rules('from_name', 'From Name', 'required');
	$this->form_validation->set_rules('from_mail_id', 'From Mail Id', 'required|valid_email');
	$this->form_validation->set_rules('to_name', 'To Name', 'required');
	$this->form_validation->set_rules('to_mail_id', 'To Mail Id', 'required|valid_email');
	
	if($this->form_validation->run()==FALSE)
	{
		$this->load->view('b2b/send_voucher_email', $data);
	} else {
		$id = $_REQUEST['id'];
		$from_name = $_REQUEST['from_name'];
		$from_mail_id = $_REQUEST['from_mail_id'];
		$to_name = $_REQUEST['to_name'];
		$to_mail_id = $_REQUEST['to_mail_id'];
		
		//print_r($_REQUEST); exit;
		$result_view=$this->B2b_Hotel_Model->book_detail_view_voucher1($id);
		$con_id = $result_view->customer_contact_details_id;
		

		
		$contact_info=$this->B2b_Hotel_Model->contact_info_detail($con_id);
		
		$customer_info_details_id=$contact_info->customer_info_details_id;
		
		$trans=$this->B2b_Hotel_Model->transation_detail_contact($con_id);
		
		$agent_id = $trans->user_id;
		$agent_info = $this->B2b_Model->agentInfo($agent_id);
		  
		 $pass_info=$this->B2b_Hotel_Model->pass_info_detail($customer_info_details_id);
		 
			
		 $hotel_id = $result_view->hotel_code;
		 //$hotel_details=$this->B2b_Hotel_Model->gethb_hoteldet($hotel_id);
		// $hotel_image= $this->Hotel_Model->gethb_hotelimage_new($hotel_id);
		 $hotel_decs='';
		$first_name =$contact_info->first_name;
	//$data =$_SESSION['voucher_data'];
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
		$msg = '';
		
		$msg.='<table border="0" cellspacing="0" cellpadding="3">';
		$msg.="<tr><td>Booking Reference</td><td>$trans->booking_number</td></tr>";

		$msg.="<tr><td>Agent</td><td>$agent_info->company_name</td></tr>";
		$msg.="<tr><td>Agent Address</td><td>$agent_info->address</td></tr>";

		$msg.="<tr><td>Hotel Name</td><td>$result_view->hotel_name</td></tr>";
		$msg.="<tr><td>Star</td><td>$result_view->star</td></tr>";
		$msg.="<tr><td>Address</td><td>$result_view->address</td></tr>";
		$msg.="<tr><td>City Name</td><td>$result_view->city</td></tr>";

		$msg.="<tr><td>Phone</td><td>$result_view->phone</td></tr>";
		$msg.="<tr><td>FAX</td><td>$result_view->fax</td></tr>";
		$msg.="<tr><td>Total Room Price </td><td>$trans->amount USD</td></tr>";
		$msg.="<tr><td>Cancellation Policy</td><td>$result_view->cancel_policy</td></tr>";

		$msg.="<tr><td>Check-In Date</td><td>$result_view->check_in</td></tr>";
		$msg.="<tr><td>Check-Out Date</td><td>$result_view->check_out</td></tr>";
		$msg.="<tr><td>Confirmation No</td><td>$trans->booking_number</td></tr>";
		$msg.="<tr><td>Date Reservation Made</td><td>$result_view->voucher_date</td></tr>";
		$msg.="<tr><td>Status</td><td>$trans->status</td></tr>";

		$adult_co = explode("-",$result_view->adult);
		$adult_count = array_sum($adult_co);

		$child_co = explode("-",$result_view->child);
		$child_count = array_sum($child_co);

		$msg.="<tr><td>Guest Name</td><td style='text-transform:capitalize;'>$contact_info->first_name"." ".$contact_info->last_name."</td></tr>";
		$msg.="<tr><td>No. of Adults</td><td>$adult_count</td></tr>";
		$msg.="<tr><td>No. of Children</td><td> $child_count</td></tr>";
		$msg.="<tr><td>No of room</td><td>$result_view->no_of_room</td></tr>";
		$msg.="<tr><td>Room Type</td><td>$result_view->room_type</td></tr>";
		$msg.="<tr><td>No of Nights</td><td>$result_view->nights</td></tr>";
		$msg.='<tr><td colspan="2">Passenger Details</td></tr>';

		//echo count($pass_info);
		for($i=0;$i< count($pass_info);$i++)
		{
			$msg.='<tr><td colspan="2" style="padding-left:155px;text-transform:capitalize;">'.$pass_info[$i]->first_name.' '.$pass_info[$i]->last_name . '</td></tr>';
		}
				  
		$msg.="</table>";
	
		//echo $msg; exit;
		$this->email->reply_to($from_mail_id, $from_name);
		$this->email->from($from_mail_id, $from_name);
		$this->email->to($to_mail_id);
		
	    $this->email->subject('Hotel Booking Voucher - Provab');
		$this->email->message($msg);
		
		$msg = '';
		if ($this->email->send()) {
		
			$msg = 'Email sent to the recipients';
			
		}
		

		redirect('b2b/send_voucher_email/'.$id.'/'.$msg, 'refresh');
	}
	
	

}
	//mmm
	function voucher_email()
{

	
	
	
	$id = $_REQUEST['id'];
	$from_name = $_REQUEST['from_name'];
	$from_mail_id = $_REQUEST['from_mail_id'];
	$to_name = $_REQUEST['to_name'];
	$to_mail_id = $_REQUEST['to_mail_id'];
	
	//print_r($_REQUEST); exit;
	$result_view=$this->B2b_Hotel_Model->book_detail_view_voucher1($id);
	$con_id = $result_view->customer_contact_details_id;
	

	
	$contact_info=$this->B2b_Hotel_Model->contact_info_detail($con_id);
	
	$trans=$this->B2b_Hotel_Model->transation_detail_contact($con_id);
	
	$agent_id = $trans->user_id;
	$agent_info = $this->B2b_Model->agentInfo($agent_id);
	  
	 $pass_info=$this->B2b_Hotel_Model->pass_info_detail($con_id);
	 
		
		 $hotel_id = $result_view->hotel_code;
		 $hotel_details=$this->B2b_Hotel_Model->gethb_hoteldet($hotel_id);
		// $hotel_image= $this->Hotel_Model->gethb_hotelimage_new($hotel_id);
		 $hotel_decs='';
$first_name =$contact_info->first_name;
	//$data =$_SESSION['voucher_data'];
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
	$msg = '';
	
	$msg.='<table border="0" cellspacing="0" cellpadding="3">';
$msg.="<tr><td>Booking Reference</td><td>$trans->booking_number</td></tr>";

$msg.="<tr><td>Agent</td><td>$agent_info->company_name</td></tr>";
$msg.="<tr><td>Agent Address</td><td>$agent_info->address</td></tr>";

$msg.="<tr><td>Hotel Name</td><td>$result_view->hotel_name</td></tr>";
$msg.="<tr><td>Star</td><td>$result_view->star</td></tr>";
$msg.="<tr><td>Address</td><td>$result_view->address</td></tr>";
$msg.="<tr><td>City Name</td><td>$result_view->city</td></tr>";

$msg.="<tr><td>Phone</td><td>$result_view->phone</td></tr>";
$msg.="<tr><td>FAX</td><td>$result_view->fax</td></tr>";
$msg.="<tr><td>Total Room Price </td><td>$trans->amount USD</td></tr>";
$msg.="<tr><td>Cancellation Policy</td><td>$result_view->cancel_policy</td></tr>";

$msg.="<tr><td>Check-In Date</td><td>$result_view->check_in</td></tr>";
$msg.="<tr><td>Check-Out Date</td><td>$result_view->check_out</td></tr>";
$msg.="<tr><td>Confirmation No</td><td>$trans->booking_number</td></tr>";
$msg.="<tr><td>Date Reservation Made</td><td>$result_view->voucher_date</td></tr>";
$msg.="<tr><td>Status</td><td>$trans->status</td></tr>";


$adult_co = explode("-",$result_view->adult);
$adult_count = array_sum($adult_co);

$child_co = explode("-",$result_view->child);
$child_count = array_sum($child_co);



$msg.="<tr><td>Guest Name</td><td>$contact_info->first_name</td></tr>";
$msg.="<tr><td>No. of Adults</td><td>$adult_count</td></tr>";
$msg.="<tr><td>No. of Children</td><td> $child_count</td></tr>";
$msg.="<tr><td>No of room</td><td>$result_view->no_of_room</td></tr>";
$msg.="<tr><td>Room Type</td><td>$result_view->room_type</td></tr>";
$msg.="<tr><td>No of Nights</td><td>$result_view->nights</td></tr>";
$msg.='<tr><td colspan="2">Passenger Details</td></tr>';


for($i=0;$i< count($pass_info);$i++)
{
	$msg.='<tr><td colspan="2">'.$pass_info[$i]->first_name.' '.$pass_info[$i]->last_name . '</td></tr>';
}

              
			  
$msg.="</table>";
	
		
		$this->email->reply_to($from_mail_id, $from_name);
		$this->email->from($from_mail_id, $from_name);
		$this->email->to($to_mail_id);
		
	    $this->email->subject('Hotel Booking Voucher - Provab');
		$this->email->message($msg);
		
		$msg = '';
		if ($this->email->send()) {
		
			$msg = '/msg';
			
		}
		

		redirect('b2b/send_voucher_email/'.$id.$msg, 'refresh');
	
}


	function voucher($val_last)
	{
		
			$data['result_view']=$this->B2b_Hotel_Model->book_detail_view_voucher1($val_last);
	 $con_id = $data['result_view']->customer_contact_details_id;
	
	  $data['contact_info']=$this->B2b_Hotel_Model->contact_info_detail($con_id);
	  $data['trans']=$this->B2b_Hotel_Model->transation_detail_contact($con_id);
	//$trans_id = $trans->transaction_details_id;
	
	// $con_id = $contact_info->customer_info_details_id;
	 $data['pass_info']=$this->B2b_Hotel_Model->pass_info_detail($con_id);
	 
		
		 $hotel_id = $data['result_view']->hotel_code;
		 $data['hotel_details']=$this->B2b_Hotel_Model->gethb_hoteldet($hotel_id);
		 $data['hotel_image']= $this->B2b_Hotel_Model->gethb_hotelimage_new($hotel_id);
		 $data['hotel_decs']='';
		//echo "<pre/>";
		//print_r($data);exit;
		 $this->load->view('b2b/hotel/voucher',$data);
	}
	function xml2ary(&$string) {
    $parser = xml_parser_create();
    xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, 0);
    xml_parse_into_struct($parser, $string, $vals, $index);
    xml_parser_free($parser);

    $mnary=array();
    $ary=&$mnary;
    foreach ($vals as $r) {
        $t=$r['tag'];
        if ($r['type']=='open') {
            if (isset($ary[$t])) {
                if (isset($ary[$t][0])) 
				$ary[$t][]=array(); 
				else
				 $ary[$t]=array($ary[$t], array());
                $cv=&$ary[$t][count($ary[$t])-1];
            } 
			else $cv=&$ary[$t];
            if (isset($r['attributes']))
			{
			foreach ($r['attributes'] as $k=>$v) 
			$cv['_a'][$k]=$v;
			}
            $cv=array();
            $cv['_p']=&$ary;
            $ary=&$cv;

        } 
		elseif
		($r['type']=='complete')
		 {
            if (isset($ary[$t])) { // same as open
                if (isset($ary[$t][0])) $ary[$t][]=array(); else $ary[$t]=array($ary[$t], array());
                $cv=&$ary[$t][count($ary[$t])-1];
            } else $cv=&$ary[$t];
            if (isset($r['attributes'])) {foreach ($r['attributes'] as $k=>$v) $cv['_a'][$k]=$v;}
            $cv['_v']=(isset($r['value']) ? $r['value'] : '');

        } elseif ($r['type']=='close') {
            $ary=&$ary['_p'];
        }
    }    
    
		
		return $mnary;
	}
	function contact()
	{
		$this->load->view('b2b/contact');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
