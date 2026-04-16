<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		/* Standard Libraries */
		$this->load->database();
		$this->load->helper('url');
		/* ------------------ */	
		
		if (!$this->session->userdata('logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		$this->load->library('grocery_CRUD');	
		$this->load->view('header');
	}
	
	function _example_output($output = null)
	{
		$this->load->view('manage.php',$output);	
	}
	
	function offices()
	{
		$output = $this->grocery_crud->render();

		$this->_example_output($output);
	}
	
	function index()
	{
		$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}	
	
	function users()
	{
	
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('users');
			$crud->columns('firstname','lastname','email', 'contact_no', 'city_id');
			$crud->where('usertype = ', 3);
			
			$crud->set_relation('city_id','cities','city_name');
			$crud->display_as('city_id','City');
			
			
			//$crud->set_relation_n_n('actors', 'states', 'country', 'city_id', 'state_id', 'name','state_name');
			
			$crud->set_subject('User');

			//$crud->fields('usertype', 'password', 'firstname', 'middlename', 'lastname', 'email');
			//$crud->callback_add_field('password',array($this,'add_field_callback_1'));
			//$crud->unset_columns('firstname');
			//$crud->change_field_type('firstname', 'invisible');
			
			//$crud->set_rules('email', 'EMAIL', 'trim|required|valid_email'); 
			//$crud->set_rules('email', 'EMAIL', 'trim|required|valid_email|is_unique[users.email]'); 
			

			$crud->set_rules('email', 'EMAIL', 'trim|required|valid_email|callback_email_check'); 
			
		
			//$crud->set_rules('username','Username','required|is_unique[users.username]');
			
			$crud->required_fields(array('password', 'title', 'firstname', 'lastname', 'email', 'address', 'city_id', 'postal_code', 'status'));
			
			
			$crud->unset_add_fields('usertype', 'register_date', 'last_visit_date');
			$crud->unset_edit_fields('usertype', 'password','register_date', 'last_visit_date');
			
			$crud->change_field_type('status', 'true_false');
			
			$crud->callback_before_insert(array($this,'encrypt_password_callback'));
			
			$output = $crud->render();

			$this->_example_output($output);
			
	}
	
	function admin()
	{
	
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('users');
			$crud->columns('firstname','lastname','email', 'contact_no', 'address');
			$crud->where('usertype = ', 1);
			
			$crud->set_subject('Admin');

			$crud->set_rules('email', 'EMAIL', 'trim|required|valid_email|callback_email_check'); 
			
		
			$crud->required_fields(array('password', 'title', 'firstname', 'lastname', 'email', 'address', 'city_id', 'postal_code'));
			
			
			$crud->unset_edit_fields('usertype', 'register_date', 'last_visit_date', 'status');
			
			//$crud->change_field_type('password', 'password');
			
			$crud->callback_before_insert(array($this,'encrypt_password_callback'));
			
			$output = $crud->render();

			$this->_example_output($output);
			
	}
	
	public function email_check($str)
	{
		$id = $this->uri->segment(4);
		if(!empty($id) && is_numeric($id))
		{
			$email_old = $this->db->where("user_id",$id)->get('users')->row()->email;
			$this->db->where("email !=",$email_old);
		}

		$num_row = $this->db->where('email',$str)->get('users')->num_rows();
		
		if ($num_row >= 1)
		{
			$this->form_validation->set_message('email_check', 'The Email ID allready exist, Please use another Email ID');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	
	function encrypt_password_callback($post_array) {
	  $post_array['password'] = sha1($post_array['password']);
	 
	  return $post_array;
	}     
	

	function booking()
	{
	
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('transaction_details');
			$crud->columns('booking_number', 'amount', 'currency_type_id', 'created_date', 'customer_contact_details_id');
			$crud->where('booking_number != ', '');
			$crud->display_as('created_date','Booking Date');
			
			$crud->set_relation('currency_type_id','currency','currency');
			$crud->display_as('currency_type_id','Currency');
			
			$crud->set_relation('customer_contact_details_id','hotel_booking_info', '{check_in} / {check_out}');
			$crud->display_as('customer_contact_details_id','Check in/Check out Date');
			
		
			//$crud->set_model('My_Custom_model');
			
			//$crud->set_relation_n_n('xxx', 'hotel_booking_info', 'api_hotel_detail_p', 'customer_contact_details_id', 'api_hotel_id', 'hotel_name','check_out');
			
			$crud->set_subject('Booking');
			
			//$crud->fields('booking_number', 'amount', 'created_date');
		
			$crud->unset_add();
			$crud->unset_edit();
			$crud->unset_delete();
			
			$output = $crud->render();

			$this->_example_output($output);
			
	}
	
	

	function api()
	{
	
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('api');
			$crud->columns('api_name', 'api_order', 'active');
			$crud->set_subject('API');
			$crud->change_field_type('active', 'true_false');
			
			$crud->order_by('api.api_order', 'desc');
			
			$crud->required_fields(array('api_name', 'api_order', 'active'));
			
			$output = $crud->render();

			$this->_example_output($output);
			
	}
	
	function currency_converter()
	{
	
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('currency_converter');
			$crud->columns('country', 'value');
			$crud->set_subject('Currency');
			
			$crud->display_as('country','Currency');
			//$crud->required_fields(array('currency', 'currency_name', 'currency_value'));
			
//			ccc
			//$crud->unset_fields('currency_updated');
			
			$output = $crud->render();

			$this->_example_output($output);
			
	}
	
	function customer_markup()
	{
	
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('markup');
			$crud->columns('api_id', 'markup');
			$crud->set_subject('Markup');
			$crud->display_as('markup','Markup (%)');
			
			$crud->set_relation('api_id','api','api_name');
			$crud->display_as('api_id','API');
			
			$crud->required_fields(array('api_id', 'markup'));
			$crud->unset_fields('user_type');
			
			
			$output = $crud->render();

			$this->_example_output($output);
			
	}
	
	
	function offices_management()
	{
		try{
			/* This is only for the autocompletion */
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('offices');
			$crud->set_subject('Office');
			$crud->required_fields('city');
			$crud->columns('city','country','phone','addressLine1','postalCode');
			
			$output = $crud->render();
			
			$this->_example_output($output);
			
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	
	function employees_management()
	{
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('employees');
			$crud->set_relation('officeCode','offices','city');
			$crud->display_as('officeCode','Office City');
			$crud->set_subject('Employee');
			
			$crud->required_fields('lastName');
			
			$crud->set_field_upload('file_url','assets/uploads/files');
			
			$output = $crud->render();

			$this->_example_output($output);
	}
	
	function customers_management()
	{
			$crud = new grocery_CRUD();

			$crud->set_table('customers');
			$crud->columns('customerName','contactLastName','phone','city','country','salesRepEmployeeNumber','creditLimit');
			$crud->display_as('salesRepEmployeeNumber','from Employeer')
				 ->display_as('customerName','Name')
				 ->display_as('contactLastName','Last Name');
			$crud->set_subject('Customer');
			$crud->set_relation('salesRepEmployeeNumber','employees','{lastName} {firstName}');
			
			$output = $crud->render();
			
			$this->_example_output($output);
	}	
	
	function orders_management()
	{
			$crud = new grocery_CRUD();

			$crud->set_relation('customerNumber','customers','{contactLastName} {contactFirstName}');
			$crud->display_as('customerNumber','Customer');
			$crud->set_table('orders');
			$crud->set_subject('Order');
			$crud->unset_add();
			$crud->unset_delete();
			
			$output = $crud->render();
			
			$this->_example_output($output);
	}
	
	function products_management()
	{
			$crud = new grocery_CRUD();

			$crud->set_table('products');
			$crud->set_subject('Product');
			$crud->unset_columns('productDescription');
			$crud->callback_column('buyPrice',array($this,'valueToEuro'));
			
			$output = $crud->render();
			
			$this->_example_output($output);
	}	
	
	function valueToEuro($value, $row)
	{
		return $value.' &euro;';
	}
	
	function just_an_example()
{    
    $crud = new grocery_CRUD();
 
    $crud->set_model('My_Custom_model');
    $crud->set_table('film');
    $crud->set_relation_n_n('actors', 'film_actor', 'actor', 'film_id', 'actor_id', 'fullname','priority');  
     
    $output = $crud->render();
 
    $this->_example_output($output); 

}
	
	function film_management()
	{
		$crud = new grocery_CRUD();
		$crud->set_theme('datatables');
		
		//$crud->set_table('film');
		//$crud->set_relation_n_n('actorsss', 'film_actor', 'actor', 'film_id', 'actor_id', 'fullname');
		
			
		//$crud->set_relation_n_n('actorsss11', 'film_actor', 'actor', 'film_id', 'actor_id', 'fullname');
		//$crud->set_relation_n_n('category', 'film_category', 'category', 'film_id', 'category_id', 'name');
		//$crud->unset_columns('special_features','description');
		
		//$crud->fields('title', 'description', 'actors' ,  'category' ,'release_year', 'rental_duration', 'rental_rate', 'length', 'replacement_cost', 'rating', 'special_features');
		
		$output = $crud->render();
		
		$this->_example_output($output);
	}
	
}