<?php 
class Account_Model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
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
function addEmail($to,$from,$sub,$content,$send_by = 0,$status = 0)
{
	$data=array('to'=>$to,'from'=>$from,'subject'=>$sub,'content'=>$content,'sended_by'=>$send_by,'status'=>$status);
	$this->db->insert('emails',$data);
	return $this->db->insert_id(); 

}
function getEmail($id)
{
	$this->db->select('*');
	$this->db->from('emails');
	$this->db->where('email_id',$id);
	$query = $this->db->get();
	if($query->num_rows() <= 0){
		return '';			
	}else{
		return $query->result();				
	}
}
function user_login($id)
{
	$this->db->select('*');
	$this->db->from('user');
	$this->db->where('user_id',$id);
	
	$query = $this->db->get();
	if($query->num_rows() <= 0){
		return '';			
	}else{
		return $query->row();				
	}
}
function user_profile_info($id)
{
	$this->db->select('*');
	$this->db->from('user_profile');
	$this->db->where('user_id',$id);
	
	$query = $this->db->get(); 
	if($query->num_rows() <= 0){
		return '';			
	}else{
		return $query->row();				
	}
}

function view_trans_detail($id)
{
	
		       $this->db->select('*');
				$this->db->from('transaction_details');

					$this->db->where('user_id',$id);
				//$this->db->where('agent_id', $this->session->userdata('agentid'));
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

function check_cust_login($email,$password)
	{		
		
		
		$Query="select * from  user  where email ='".$email."' AND password  ='".$password."' AND status = 1";
	 
		 $query=$this->db->query($Query);
		// echo $this->db->last_query(); exit;
		if ($query->num_rows() > 0)
		{
		   foreach ($query->result() as $row)
		   {
			 
                  $_SESSION[ 'b2c_first_name' ]= $row->first_name;
				  $_SESSION['b2c_userid' ]= $row->user_id;
				  $_SESSION[ 'b2c_last_name' ]= $row->last_name;
                  $_SESSION[ 'b2c_email'     ]= $row->email;
				  $_SESSION[ 'b2c_user_name']= $row->user_name;
                  $_SESSION['logged_in' ]= TRUE;
			$Queryq="select * from  vister  where id ='".$row->user_id."'";
	 
		 $queryq=$this->db->query($Queryq);
		// echo $this->db->last_query(); exit;
		if ($queryq->num_rows() <= 0)
		{  
              $data=array('id'=>$row->user_id,'type'=>'b2c','ip'=>'ss');
			
		    $this->db->insert('vister',$data);
		     $this->db->insert_id();
	   }
		 

			  
		   }
		   return true;
		   
		} 
		else
		{
			return false;
		}
	}
	function checkCodeValidation($id,$code)
{
 	$this->db->select('*');
	$this->db->from('user');
	$this->db->where('user_id',$id);
	$query = $this->db->get();
	
	$result = $query->result();
	
    $statu =  $result[0]->status;	
    if($statu == 1)
	{
		return 3;
	}else{
			$query1 = $this->db->query("SELECT * FROM registration_tracker WHERE user_id = '$id' and code = '$code' and TIMESTAMPDIFF(DAY,CURRENT_TIMESTAMP,create_date) <= 5 ");
//echo "SELECT * FROM registration_tracker WHERE user_id = '$id' and code = '$code' and TIMESTAMPDIFF(DAY,create_date,CURRENT_TIMESTAMP) <= 5 ";exit;
		
			if($query1->num_rows() > 0)
			{ 
				$this->db->where('user_id', $id);
				$this->db->update('user',array('status'=>1));
				$this->db->delete('registration_tracker',array('user_id'=>$id,'code'=>$code));
				return 1;
			}else{
				//$this->db->delete('user',array('int_user_id'=>$id));
				$this->db->delete('registration_tracker',array('user_id'=>$id,'code'=>$code));
				return 0;
			}
	}//end else part
		
	
	
	
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