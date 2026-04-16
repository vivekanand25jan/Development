<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Index extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('url', 'form', 'date'));
		$this->load->model('B2b_Model');
		$this->load->model('B2b_Hotel_Model');
		$this->load->library('session');
	}
	
	function index()
	{

		$sec_res = session_id();
		$_SESSION['ses_id'] = $sec_res;
		
		if ($this->session->userdata('agent_logged_in') || $this->session->userdata('staff_logged_in')) {
			redirect('b2b/agent_page', 'refresh'); 
		} else {
			redirect('b2b/login', 'refresh'); 
		}
		
	}
	
	
}
