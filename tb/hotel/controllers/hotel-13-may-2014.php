<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//error_reporting(0);
session_start();
class Hotel extends CI_Controller {
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
		
		if(!isset($_SESSION['ses_id']))
		{
			$sec_res = session_id();
	    	$_SESSION['ses_id'] = $sec_res;
			redirect('hotel/index','refresh');
			
		}
		
		
		$this->load->model('Hotel_Model');$this->load->model('Account_Model');
	}
	 function b2b_index()
	{
		$this->load->view('b2b/b2b_index');
	}
	function cookiesss()
	{
			$cookie = array(
  'name'   => 'gabi_cookie',
  'value'  => 'The Value',
  'expire' => '86500',
  'secure' => FALSE
);
   
$this->input->set_cookie($cookie);  
echo $this->input->cookie('gabi_cookie');

exit;

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
 $data=array('id'=>'visit','type'=>'visit','ip'=>'ss');
			
		    $this->db->insert('vister',$data);
		     $this->db->insert_id();
			 
		$this->session->set_userdata($newdata);
		
		//$this->load->view('hotel_index');
		$data['leftb_banner'] = $this->Hotel_Model->get_left_banner_bot();
		$data['top_destinations'] = $this->Hotel_Model->get_top_destinations();
		$data['hot_deals'] = $this->Hotel_Model->get_hot_deals();
		$data['banner'] = $this->Hotel_Model->get_banner();
		$data['preferred_hotels'] = $this->Hotel_Model->get_preferred_hotels();
		$data['preferred_hotels_dubai'] = $this->Hotel_Model->get_preferred_hotels_dubai();
		$data['why_choose_us'] = $this->Hotel_Model->get_why_choose_us();
		$data['spl_week'] = $this->Hotel_Model->get_spl_week();
		$this->load->view('hotel_index',$data);	
	}
	
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
	function hotelspro_email()
	{
		$URL2 = "http://static.hotelspro.com/xf_4.0/downloads/ZR6294hotellist.xml";//local demo
		$ch2=curl_init();
        curl_setopt($ch2, CURLOPT_URL, $URL2);
        curl_setopt($ch2, CURLOPT_TIMEOUT, 180);
        curl_setopt($ch2, CURLOPT_HEADER, 0);
        curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
      //  curl_setopt($ch2, CURLOPT_POST, 1);
     //   curl_setopt($ch2, CURLOPT_POSTFIELDS, $request);
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
		$array=$this->xml2ary($data2);
		echo "<pre/>";
		echo $data2;exit;
		    $dom4=new DOMDocument();
			$dom4->loadXML($data2);		  
			$AffiliateCode=$dom4->getElementsByTagName("AffiliateCode");
		    echo  $AffiliateCode->item(0)->nodeValue;exit;
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
public function backtosearch()
{

		$this->load->view('hotel/search_result');
		
}
function country_search($city)
{
	$city1 = strtr(base64_decode($city),array('+' => '.','=' => '-','/' => '~'));
	$data['city_val_pre'] = $this->Hotel_Model->get_country_code_pre(trim($city1)); 
	if(isset($data['city_val_pre'][0]))
	{ 
	
	$this->load->view('hotel/pre_search',$data);
	}
	else
	{
		redirect('hotel/index','refresh');
	}
}
	public function search()
	{
		
			$_SESSION['hotel_name']='';
		$_SESSION['fav_hotel']='';
		$_SESSION['fav_hotel_detail_new']='';
	$this->form_validation->set_rules('cityval', 'City Name', 'required');
		 $this->form_validation->set_rules('sd', 'CheckIn', 'required');
		  $this->form_validation->set_rules('ed', 'CheckOut', 'required');

		
			if($this->form_validation->run()==FALSE)
		{
   
			$this->load->view('hotel_index');
		}
		else
		{
			
			
		if(isset($_POST['cityval']))
		{
		 
		if(isset($_SESSION['city']))
		{	
		if($_SESSION['city'] == $_POST['cityval'] && $_SESSION['sd'] == $_POST['sd'] && $_SESSION['ed'] == $_POST['ed'] && $_SESSION['room_count'] == $_POST['room_count'] && $_SESSION['org_adult'] == $_POST['adult'] && $_SESSION['org_child'] == $_POST['child'])
		{
			$_SESSION['hashing_activate'] = 1;
		}
		else
		{
			
			$_SESSION['hashing_activate'] = '';
			$_SESSION['fav_hotel_detail']='';
			$this->Hotel_Model->delete_gta_temp_result($_SESSION['ses_id']);
			
		}
		}
		else
		{
			$_SESSION['hashing_activate'] = '';
			$this->Hotel_Model->delete_gta_temp_result($_SESSION['ses_id']);
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
		$_SESSION['org_child'] = $_POST['child'];
		$_SESSION['child_age'] = $_POST['child_age'];
				
		//set cokkies start
		//*******************
		$cookiecity = array(
		  'name'   => 'city',
		  'value'  => $_POST['cityval'],
		  'expire' => '34560',
		  'secure' => FALSE
		);
		$this->input->set_cookie($cookiecity); 
		
		$cookiesd = array(
		  'name'   => 'sd',
		  'value'  => $_POST['sd'],
		  'expire' => '34560',
		  'secure' => FALSE
		);
		$this->input->set_cookie($cookiesd); 
		
		
		$cookieed = array(
		  'name'   => 'ed',
		  'value'  => $_POST['ed'],
		  'expire' => '34560',
		  'secure' => FALSE
		);
		$this->input->set_cookie($cookieed); 
		
		
		$cookieroom_count = array(
		  'name'   => 'room_count',
		  'value'  => $_POST['room_count'],
		  'expire' => '34560',
		  'secure' => FALSE
		);
		$this->input->set_cookie($cookieroom_count);  
		$ad=implode("||",$_POST['adult']);
		$cookieadult = array(
		  'name'   => 'org_adult',
		  'value'  => $ad,
		  'expire' => '34560',
		  'secure' => FALSE
		);
		$this->input->set_cookie($cookieadult); 
		 
		$ch=implode("||",$_POST['child']);
		$cookiechild = array(
		  'name'   => 'org_child',
		  'value'  => $ch,
		  'expire' => '34560',
		  'secure' => FALSE
		);
		$this->input->set_cookie($cookiechild);  
		
		$cha=implode("||",$_POST['child_age']);
		$cookiechild1 = array(
		  'name'   => 'child_age',
		  'value'  => $cha,
		  'expire' => '34560',
		  'secure' => FALSE
		);
		$this->input->set_cookie($cookiechild1); 
		
		 
		//*******************
		//set cokkies stop
    	$city_val = $this->Hotel_Model->get_city_code($_SESSION['city']);  
			if($city_val=='')
			{
				$data['city_val_pre'] = $this->Hotel_Model->get_city_code_pre($_SESSION['city']);  
				if(isset($data['city_val_pre'][0]))
	{ 
	
	$this->load->view('hotel/pre_search',$data);
	}
	else
	{
		redirect('hotel/index','refresh');
	}
				//$this->load->view('hotel/pre_search',$data);
			}
			else
			{
				//$api_r='';
				$api_r=array();
				$api = $this->Hotel_Model->api_status_id();
				if($api != '')
				{
				for($k=0;$k<count($api);$k++)
				{	
				
				
					
					if($api[$k]->api_name != 'hotelsbed')
					{
						
						$api_r[]= "'".$api[$k]->api_name."'";
					}
					
				
					
				}
				$a = implode(",",$api_r);
				$api_f='';
				if($this->Hotel_Model->api_status('hotelsbed') == 1)
					{
						if($a !='')
						{
						$api_f = "'hotelsbed_pre',".$a.",'hotelsbed'";
						}
						else
						{
							$api_f = "'hotelsbed_pre','hotelsbed'";
						}
					}
					else
					{
						$api_f =$a;
					}
				}
				else
				{
					$api_f="'Nil'";
				}
				$data['api_fs'] =$api_f;
				$this->load->view('hotel/search_result',$data);
			}
		}
		else
		{
			$this->load->view('hotel_index');
		}
		}
	}
	public function search_index($id)
	{
		if($id==1)
		{
			$city_val ='Paris, France';
		}
		if($id==2)
		{
			$city_val ='London, United Kingdom';
		}
		if($id==3)
		{
			$city_val ='Dubai, United Arab Emirates';
		}
		if($id==4)
		{
			$city_val ='Singapore, Singapore';
		}
		if($id==5)
		{
			$city_val ='Sydney, Australia';
		}
		if($id==6)
		{
			$city_val ='New Delhi, India';
		}
		
	
		if(isset($city_val))
		{
		 
		if(isset($_SESSION['city']))
		{	
		if($_SESSION['city'] == $cityval && $_SESSION['sd'] == date("d-m-Y",strtotime("+9 days")) && $_SESSION['ed'] == date("d-m-Y",strtotime("+10 days")) && $_SESSION['room_count'] == 1 && $_SESSION['org_adult'] == array(1) && $_SESSION['org_child'] == array(0))
		{
			$_SESSION['hashing_activate'] = 1;
		}
		else
		{
			
			$_SESSION['hashing_activate'] = '';
			$_SESSION['fav_hotel_detail']='';
			$this->Hotel_Model->delete_gta_temp_result($_SESSION['ses_id']);
			
		}
		}
		else
		{
			$_SESSION['hashing_activate'] = '';
			$this->Hotel_Model->delete_gta_temp_result($_SESSION['ses_id']);
		}
		$_SESSION['city'] = $city_val;
		
		$_SESSION['sd'] = date("d-m-Y",strtotime("+9 days"));
		$_SESSION['ed'] = date("d-m-Y",strtotime("+10 days"));;
		
		$_SESSION['room_count'] = 1;
		$adultval = array(1);
		$childval = array(0);
				$diff = date("d-m-Y",strtotime("+9 days")) - date("d-m-Y",strtotime("+10 days"));

			$sec   = $diff % 60;
			$diff  = intval($diff / 60);
			$min   = $diff % 60;
			$diff  = intval($diff / 60);
			$hours = $diff % 24;
			$days  = intval($diff / 24);
			$_SESSION['days']=1;
		$room_used_type=array();
		$adult_count=0;
		$child_count=0;
		for($i=0;$i< 1;$i++)
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
	
		$_SESSION['room_used_type'] = array('sb');
		$_SESSION['adult_count'] =1;
		$_SESSION['child_count'] = 0;
		$_SESSION['org_adult'] = array(1);
		$_SESSION['org_child'] = array(0);
		$_SESSION['child_age'] = array(1,1,1);
		
		//set cokkies start
		//*******************
		$cookiecity = array(
		  'name'   => 'city',
		  'value'  => $cityval,
		  'expire' => '34560',
		  'secure' => FALSE
		);
		$this->input->set_cookie($cookiecity); 
		
		$cookiesd = array(
		  'name'   => 'sd',
		  'value'  => date("d-m-Y",strtotime("+9 days")),
		  'expire' => '34560',
		  'secure' => FALSE
		);
		$this->input->set_cookie($cookiesd); 
		
		
		$cookieed = array(
		  'name'   => 'ed',
		  'value'  => date("d-m-Y",strtotime("+10 days")),
		  'expire' => '34560',
		  'secure' => FALSE
		);
		$this->input->set_cookie($cookieed); 
		
		
		$cookieroom_count = array(
		  'name'   => 'room_count',
		  'value'  => 1,
		  'expire' => '34560',
		  'secure' => FALSE
		);
		$this->input->set_cookie($cookieroom_count);  
		$ad=implode("||",array(1));
		$cookieadult = array(
		  'name'   => 'org_adult',
		  'value'  => $ad,
		  'expire' => '34560',
		  'secure' => FALSE
		);
		$this->input->set_cookie($cookieadult); 
		 
		$ch=implode("||",array(0));
		$cookiechild = array(
		  'name'   => 'org_child',
		  'value'  => $ch,
		  'expire' => '34560',
		  'secure' => FALSE
		);
		$this->input->set_cookie($cookiechild);  
		
		$cha=implode("||",array(1,1,1));
		$cookiechild1 = array(
		  'name'   => 'child_age',
		  'value'  => $cha,
		  'expire' => '34560',
		  'secure' => FALSE
		);
		$this->input->set_cookie($cookiechild1); 
		
		 
		//*******************
		//set cokkies stop
    	$city_val = $this->Hotel_Model->get_city_code($_SESSION['city']);  
			if($city_val=='')
			{
				$data['city_val_pre'] = $this->Hotel_Model->get_city_code_pre($_SESSION['city']);  
				if(isset($data['city_val_pre'][0]))
				{ 
				
				$this->load->view('hotel/pre_search',$data);
				}
				else
				{
					redirect('hotel/index','refresh');
				}
				//$this->load->view('hotel/pre_search',$data);
			}
			else
			{
				//$api_r='';
				$api_r=array();
				$api = $this->Hotel_Model->api_status_id();
				if($api != '')
				{
				for($k=0;$k<count($api);$k++)
				{	
				
				
					
					if($api[$k]->api_name != 'hotelsbed')
					{
						
						$api_r[]= "'".$api[$k]->api_name."'";
					}
					
				
					
				}
				$a = implode(",",$api_r);
				$api_f='';
				if($this->Hotel_Model->api_status('hotelsbed') == 1)
					{
						if($a !='')
						{
						$api_f = "'hotelsbed_pre',".$a.",'hotelsbed'";
						}
						else
						{
							$api_f = "'hotelsbed_pre','hotelsbed'";
						}
					}
					else
					{
						$api_f =$a;
					}
				}
				else
				{
					$api_f="'Nil'";
				}
				$data['api_fs'] =$api_f;
				$this->load->view('hotel/search_result',$data);
			}
		}
		else
		{
			$this->load->view('hotel_index');
		}
		
	}
	
    function pre_search()
	{
		
		unset($_SESSION['city']);
		
		$_SESSION['city'] = $_POST['city'];
		//echo $_SESSION['city'];exit;
		$_SESSION['hashing_activate'] = '';
			$_SESSION['fav_hotel_detail']='';
			$this->Hotel_Model->delete_gta_temp_result($_SESSION['ses_id']);
		$this->load->view('hotel/search_result');
	}
	function currency_convertion($val)
	{
		
		$_SESSION['currency'] = $val;
		$_SESSION['hashing_activate'] = 1;
		$currency_det = $this->Hotel_Model->get_currecy_detail($val);

		$a= $currency_det->value;
    	$newdata = array(
                   'currency_value'  => $a,
				   'currency'  => $val
               );

$this->session->set_userdata($newdata);

	$api_r=array();
				$api = $this->Hotel_Model->api_status_id();
				if($api != '')
				{
				for($k=0;$k<count($api);$k++)
				{	
				
				
					
					if($api[$k]->api_name != 'hotelsbed')
					{
						
						$api_r[]= "'".$api[$k]->api_name."'";
					}
					
				
					
				}
				$a = implode(",",$api_r);
				$api_f='';
				if($this->Hotel_Model->api_status('hotelsbed') == 1)
					{
						if($a !='')
						{
						$api_f = "'hotelsbed_pre',".$a.",'hotelsbed'";
						}
						else
						{
							$api_f = "'hotelsbed_pre','hotelsbed'";
						}
					}
					else
					{
						$api_f =$a;
					}
				}
				else
				{
					$api_f="'Nil'";
				}
				$data['api_fs'] =$api_f;
		$this->load->view('hotel/search_result',$data);
	}
	function call_api($api)
	{
		if($_SESSION['hashing_activate']!=1)
		{
		//s	print_r($api);exit;	
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
				
				case 'travco':
			    $this->travco_hotel_availabilty();
				break;
				
				case 'tourico':
			    $this->tourico_hotel_availabilty();
				break;
				
				case 'crs':
			    $this->crs_hotel_availabilty();
				break;
				
				case 'dotw':
			    $this->dotw_hotel_availabilty();
				break;
				
				case 'jac':
			    $this->jac_hotel_availabilty();
				break;
				
				
				default:
				echo '';
		}
		}
			$this->fetch_search_result();
	//	$data['result'] = $this->Hotel_Model->fetch_gta_temp_result($_SESSION['ses_id']);
	//	$hotel_search_result = $this->load->view('hotel/search_result_ajax', $data, true);
		/*$paging = $this->load->view('hotel/pagination', $data, true);
		$googlemap = $this->load->view('hotel/googlemap', $data, true);
		$asc = $this->Hotel_Model->order_price_count_value($_SESSION['ses_id'],'asc');
		$desc = $this->Hotel_Model->order_price_count_value($_SESSION['ses_id'],'desc');
		$count = count($data['result']);
		$low = ceil($asc[0]->total_cost);
		$high = ceil($desc[0]->total_cost);*/
		
     //	echo json_encode(array(
     //                      'hotel_search_result' => $hotel_search_result,
						  			
	//						));
	
		/*
		$data['result'] = $this->Hotel_Model->fetch_gta_temp_result($_SESSION['ses_id']);
		$hotel_search_result = $this->load->view('hotel/search_result_ajax', $data, true);
		
		
		$paging = $this->load->view('hotel/pagination', $data, true);
		//'paging' => $paging,
		
	//	$result_count = $this->Hotel_Model->fetch_gta_temp_result_count($_SESSION['ses_id']);
		//$price = $this->Hotel_Model->fetch_gta_temp_result_price($_SESSION['ses_id']);
		
		
		$asc = $this->Hotel_Model->order_price_count_value($_SESSION['ses_id'],'asc');
		$desc = $this->Hotel_Model->order_price_count_value($_SESSION['ses_id'],'desc');
		
	    $lowest = '$ '.$asc[0]->total_cost;
		$low = $asc[0]->total_cost;
		$high = $desc[0]->total_cost;
	//	$city = $_SESSION['city'];
		$low_slider = '<input type="hidden" id="minval1" value="'.$low.'" class="range-txt" />';
		$high_slider = '<input type="hidden" id="maxval1" value="'.$high.'" class="range-txt" />';
		//echo $low.'-'.$high;exit;
		//echo "sddddddss";exit;
		echo json_encode(array(
                            'hotel_search_result' => $hotel_search_result,
						//	'result_count' => $result_count,
							//'city' => $city,
						'lowest' => $lowest,	
							'low' => $low,
							'high' => $high,						
							'low_slider' => $low_slider,
							'high_slider' => $high_slider,	
						//	'hotel_facility'=> $hotel_facility,	
						//	'room_facility'=> $room_facility,
							'paging' => $paging,	
						//	'chain_facility'=> $chain_facility					
							));
		*/

	}
	public function fetch_search_result_filter() 
	{
		$minVal = 0;
		$maxVal = 0;
		$minStar = 0;
		$maxStar = 5;
		
		if (isset($_REQUEST['minVal'])) $minVal = ceil($_REQUEST['minVal']/$this->session->userdata('currency_value'));
		if (isset($_REQUEST['maxVal'])) $maxVal = ceil($_REQUEST['maxVal']/$this->session->userdata('currency_value'));
		
		if (isset($_REQUEST['minStar'])) $minStar = $_REQUEST['minStar'];
  		if (isset($_REQUEST['maxStar'])) $maxStar = $_REQUEST['maxStar'];
  
		// facilities ccc
		
  		/*$_SESSION['minVal'] = $minVal;
		$_SESSION['maxVal'] = $maxVal;
		$_SESSION['minStar'] = $minStar;
		$_SESSION['maxStar'] = $maxStar;*/

		//echo $minStar.'-'.$maxStar;exit;
		
		$value1 = rawurldecode($_REQUEST['facilities']);
		$value2 = '+'.$value1;
		//$value = rtrim($value2,', +');
		
		$fac = rtrim($value2, ' +');
		
		$sorting = '';
		
		if (isset($_REQUEST['sorting'])) {
			$sorting = $_REQUEST['sorting'];
			$_SESSION['sorting'] = $sorting;
		} else if (!empty($_SESSION['sorting'])) {
			$sorting = $_SESSION['sorting'];
		} 
		
		$tmp_data = $this->Hotel_Model->fetch_search_result($_SESSION['ses_id'], 1, $minVal, $maxVal, $minStar, $maxStar, $fac, $sorting);

		$data['result'] = $tmp_data['result'];
		//$total_result = $tmp_data['count'];
		//$low_val = round($data['result'][0]->total_cost);
		$hotel_search_result = $this->load->view('hotel/search_result_ajax', $data, true);
		$min_val = floor($tmp_data['minVal']);
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
	
	function asc_order_name_new()
	{
		$tmp_data = $this->Hotel_Model->asc_order_name_new($_SESSION['ses_id']);
		$data['result'] = $tmp_data['result'];
	//	print_r($data['result']);
	
		//$total_result = $tmp_data['count'];
		$hotel_search_result = $this->load->view('hotel/search_result_ajax', $data, true);
		echo json_encode(array(
			'hotel_search_result' => $hotel_search_result			
			));
	}
	function desc_order_name_new()
	{
		$tmp_data = $this->Hotel_Model->desc_order_name_new($_SESSION['ses_id']);
		$data['result'] = $tmp_data['result'];
	    //print_r($data['result']);
		//$total_result = $tmp_data['count'];
		$hotel_search_result = $this->load->view('hotel/search_result_ajax', $data, true);
		echo json_encode(array(
		'hotel_search_result' => $hotel_search_result
		));
	}
	
	function asc_order_star_new()
	{
		$tmp_data = $this->Hotel_Model->asc_order_star_new($_SESSION['ses_id']);
		$data['result'] = $tmp_data['result'];
	//	print_r($data['result']);
	
		//$total_result = $tmp_data['count'];
		$hotel_search_result = $this->load->view('hotel/search_result_ajax', $data, true);
		echo json_encode(array(
			'hotel_search_result' => $hotel_search_result
			
			));
	}
	function desc_order_star_new()
	{
		$tmp_data = $this->Hotel_Model->desc_order_star_new($_SESSION['ses_id']);
		$data['result'] = $tmp_data['result'];
	    //print_r($data['result']);
		//$total_result = $tmp_data['count'];
		$hotel_search_result = $this->load->view('hotel/search_result_ajax', $data, true);
		echo json_encode(array(
		'hotel_search_result' => $hotel_search_result
		));
	}
	
	function asc_order_price_new()
	{
		$tmp_data = $this->Hotel_Model->asc_order_price_new($_SESSION['ses_id']);
		$data['result'] = $tmp_data['result'];
	//	print_r($data['result']);
	
		//$total_result = $tmp_data['count'];
		$hotel_search_result = $this->load->view('hotel/search_result_ajax', $data, true);
		echo json_encode(array(
			'hotel_search_result' => $hotel_search_result
			
			));
	}
	function desc_order_price_new()
	{
		$tmp_data = $this->Hotel_Model->desc_order_price_new($_SESSION['ses_id']);
		$data['result'] = $tmp_data['result'];
	//	print_r($data['result']);
	
		//$total_result = $tmp_data['count'];
		$hotel_search_result = $this->load->view('hotel/search_result_ajax', $data, true);
		echo json_encode(array(
			'hotel_search_result' => $hotel_search_result
			
			));
	}
	public function fetch_search_result() 
	{
		
		if (isset($_SESSION['sorting'])) {
			unset($_SESSION['sorting']); 
		}
		
		//echo $_SESSION['ses_id'];
		$tmp_data = $this->Hotel_Model->fetch_search_result($_SESSION['ses_id']);
		$data['result'] = $tmp_data['result'];

	
		//$total_result = $tmp_data['count'];
		$hotel_search_result = $this->load->view('hotel/search_result_ajax', $data, true);
		//$min_val = round($data['result'][0]->total_cost);
		//$max_val = round($data['result'][count($data['result'])-1]->total_cost);
		
		/*echo json_encode(array(
			'hotel_search_result' => $hotel_search_result,
			'total_result' => $total_result,
			'min_val' => $min_val,
			'max_val' => $max_val
			));*/
			
			$min_val = floor($tmp_data['minVal']*$this->session->userdata('currency_value'));
		$max_val = round($tmp_data['maxVal']*$this->session->userdata('currency_value'));
		$tot_rec = $tmp_data['totRow'];

//	echo "tt:".$min_val . "," . $max_val . ",". $tot_rec;
		echo json_encode(array(
			'hotel_search_result' => $hotel_search_result,
			'total_result' => $tot_rec,
			'min_val' => $min_val,
			'max_val' => $max_val
			));
	}
	function add_items()
	{
		$id= $_REQUEST['id'];
		//echo $id;exit;
		
		       $fav_hotel=array();

if(isset($_SESSION['fav_hotel']))
		{
			$hote_id = $_SESSION['fav_hotel'];
				//echo "sssss";exit;
			if($hote_id!='')
			{
			
			for($i=0;$i< count($hote_id);$i++)
			{
				$a = explode(",",$hote_id[$i]);
				if($a[0] !='images')
				{
				if($id != $a[0])
				{
					
					$fav_hotel[] = $a[0];
				}
				}
			}
			}
			$fav_hotel[] = $id;
			$fav_hotel= array_merge($fav_hotel);
			$_SESSION['fav_hotel'] = $fav_hotel;
		}
		else
		{
			
			$fav_hotel[] = $id;
			$hote_id = $fav_hotel;
			$_SESSION['fav_hotel'] = $fav_hotel;
			
		}

$count_fav = count($_SESSION['fav_hotel']);






		echo json_encode(array(
			'count_fav' => $count_fav
			));
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
		 $this->load->view('hotel/room_facility');
	}
	function hotel_fac()
	{
		
		//$data1['room_facility'] = $this->Hotel_Model->fetch_gta_temp_result_room_facility($_SESSION['ses_id']);
		 $this->load->view('hotel/hotel_facility');
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
		
		$value2 = '+'.$value1;
		//$value = rtrim($value2,', +');
		
		$value = rtrim($value2, ' +');
		
		
		//$value_b  = str_replace(",", "','", $value);
		//echo $value_b;exit;
		//$value_b="bar";
		
		$data['result'] = $this->Hotel_Model->fetch_gta_temp_result_room_facility_new($_SESSION['ses_id'],$value);
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
		$this->load->view('hotel/search_result_ajax',$data);
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
		$data['result'] = $this->Hotel_Model->fetch_gta_temp_result_room_facility_new($_SESSION['ses_id'],$value);
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
	
	function all_filter_new1($id, $minVal=0, $maxVal=0, $minStar=0, $maxStar=5, $facilities='', $sorting='')
	{
		
			/*$minVal = 0; //ccc
			$maxVal = 0;
			$minStar = 0;
			$maxStar = 5;
			
			if (isset($_SESSION['minVal'])) $minVal = $_SESSION['minVal'];
			if (isset($_SESSION['maxVal'])) $maxVal = $_SESSION['maxVal'];
			if (isset($_SESSION['minStar'])) $minStar = $_SESSION['minStar'];
			if (isset($_SESSION['maxStar'])) $maxStar = $_SESSION['maxStar'];*/
			
			if (!empty($facilities)) {
				$value1 = rawurldecode($facilities);
				$value2 = '+'.$value1;
			
				$facilities = rtrim($value2, ' +');
			}
			
			$sorting = '';
		
		if (!empty($_SESSION['sorting'])) {
			$sorting = $_SESSION['sorting'];
		} 
		
		
			$data = $this->Hotel_Model->fetch_search_result_for_page2($_SESSION['ses_id'],$id, $minVal, $maxVal, $minStar, $maxStar, $facilities, $sorting);
		
		//	$data['result'] = $this->Hotel_Model->fetch_search_result($_SESSION['ses_id'],$id);
			//echo "<pre/>";
			//print_r($data);exit;
			//$data['count']= count($data['result']);
			$this->load->view('hotel/search_result_ajax',$data);
	}
	function wish_list_view()
	{
		
		//echo '<pre/>';
		//print_r($_SESSION['fav_hotel']);exit;
			$data = $this->Hotel_Model->fetch_search_result_for_page2_wishlist($_SESSION['ses_id'],$_SESSION['fav_hotel']);
		
		//	$data['result'] = $this->Hotel_Model->fetch_search_result($_SESSION['ses_id'],$id);
			//echo "<pre/>";
			//print_r($data);exit;
			//$data['count']= count($data['result']);
			$this->load->view('hotel/search_result_ajax',$data);
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
		
			$data = $this->Hotel_Model->fetch_search_result_for_page2_desc($_SESSION['ses_id'],$id, $minVal, $maxVal, $minStar, $maxStar);
		//	$data['result'] = $this->Hotel_Model->fetch_search_result($_SESSION['ses_id'],$id);
			//echo "<pre/>";
			//print_r($data);exit;
			//$data['count']= count($data['result']);
			$this->load->view('hotel/search_result_ajax',$data);
	}
	function all_filter_name_asc($id)
	{
			$minVal = 0;
			$maxVal = 0;
			$minStar = 0;
			$maxStar = 5;
			
			if (isset($_SESSION['minVal'])) $minVal = $_SESSION['minVal'];
			if (isset($_SESSION['maxVal'])) $maxVal = $_SESSION['maxVal'];
			if (isset($_SESSION['minStar'])) $minStar = $_SESSION['minStar'];
			if (isset($_SESSION['maxStar'])) $maxStar = $_SESSION['maxStar'];
		
			$data = $this->Hotel_Model->fetch_search_result_for_page2_name_asc($_SESSION['ses_id'],$id, $minVal, $maxVal, $minStar, $maxStar);
		//	$data['result'] = $this->Hotel_Model->fetch_search_result($_SESSION['ses_id'],$id);
			//echo "<pre/>";
			//print_r($data);exit;
			//$data['count']= count($data['result']);
			$this->load->view('hotel/search_result_ajax',$data);
	}
	function all_filter_name_desc($id)
	{
			$minVal = 0;
			$maxVal = 0;
			$minStar = 0;
			$maxStar = 5;
			
			if (isset($_SESSION['minVal'])) $minVal = $_SESSION['minVal'];
			if (isset($_SESSION['maxVal'])) $maxVal = $_SESSION['maxVal'];
			if (isset($_SESSION['minStar'])) $minStar = $_SESSION['minStar'];
			if (isset($_SESSION['maxStar'])) $maxStar = $_SESSION['maxStar'];
		
			$data = $this->Hotel_Model->fetch_search_result_for_page2_name_desc($_SESSION['ses_id'],$id, $minVal, $maxVal, $minStar, $maxStar);
		//	$data['result'] = $this->Hotel_Model->fetch_search_result($_SESSION['ses_id'],$id);
			//echo "<pre/>";
			//print_r($data);exit;
			//$data['count']= count($data['result']);
			$this->load->view('hotel/search_result_ajax',$data);
	}
	
	function all_filter_star_asc($id)
	{
			$minVal = 0;
			$maxVal = 0;
			$minStar = 0;
			$maxStar = 5;
			
			if (isset($_SESSION['minVal'])) $minVal = $_SESSION['minVal'];
			if (isset($_SESSION['maxVal'])) $maxVal = $_SESSION['maxVal'];
			if (isset($_SESSION['minStar'])) $minStar = $_SESSION['minStar'];
			if (isset($_SESSION['maxStar'])) $maxStar = $_SESSION['maxStar'];
		
			$data = $this->Hotel_Model->fetch_search_result_for_page2_star_asc($_SESSION['ses_id'],$id, $minVal, $maxVal, $minStar, $maxStar);
		//	$data['result'] = $this->Hotel_Model->fetch_search_result($_SESSION['ses_id'],$id);
			//echo "<pre/>";
			//print_r($data);exit;
			//$data['count']= count($data['result']);
			$this->load->view('hotel/search_result_ajax',$data);
	}
	function all_filter_star_desc($id)
	{
			$minVal = 0;
			$maxVal = 0;
			$minStar = 0;
			$maxStar = 5;
			
			if (isset($_SESSION['minVal'])) $minVal = $_SESSION['minVal'];
			if (isset($_SESSION['maxVal'])) $maxVal = $_SESSION['maxVal'];
			if (isset($_SESSION['minStar'])) $minStar = $_SESSION['minStar'];
			if (isset($_SESSION['maxStar'])) $maxStar = $_SESSION['maxStar'];
		
			$data = $this->Hotel_Model->fetch_search_result_for_page2_star_desc($_SESSION['ses_id'],$id, $minVal, $maxVal, $minStar, $maxStar);
		//	$data['result'] = $this->Hotel_Model->fetch_search_result($_SESSION['ses_id'],$id);
			//echo "<pre/>";
			//print_r($data);exit;
			//$data['count']= count($data['result']);
			$this->load->view('hotel/search_result_ajax',$data);
	}
	
	
	function all_filter_new1_facility($id,$value)
	{
		
			$data['result'] = $this->Hotel_Model->fetch_gta_temp_result_room_facility_new_page($_SESSION['ses_id'],$value,$id);
			
			$this->load->view('hotel/search_result_ajax',$data);
	}
	
	function pagination_call()
	{
		
//zzz
if($_POST['page'])
{
$page = $_POST['page'];

$minVal = ceil($_REQUEST['minVal']/$this->session->userdata('currency_value'));
$maxVal = ceil($_REQUEST['maxVal']/$this->session->userdata('currency_value'));

$minStar = $_REQUEST['minStar'];
$maxStar = $_REQUEST['maxStar'];
  
		
		$value1 = rawurldecode($_REQUEST['facilities']);
		$value2 = '+'.$value1;
		
		$fac = rtrim($value2, ' +');
		
/*$minVal = 0;
$maxVal = 0;
$minStar = 0;
$maxStar = 5;

if (isset($_SESSION['minVal'])) $minVal = $_SESSION['minVal'];
if (isset($_SESSION['maxVal'])) $maxVal = $_SESSION['maxVal'];
if (isset($_SESSION['minStar'])) $minStar = $_SESSION['minStar'];
if (isset($_SESSION['maxStar'])) $maxStar = $_SESSION['maxStar'];*/
		
/*$minVal =       $_SESSION['minVal'];
$maxVal = 		$_SESSION['maxVal'];
$minStar =		$_SESSION['minStar'];
$maxStar =		$_SESSION['maxStar'];*/

//$finval = 0;
//if (isset($_SESSION['finval'])) $finval = $_SESSION['finval'];
			
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
 //$hotellisst=$this->Hotel_Model->fetch_search_result_for_page($_SESSION['ses_id'], $page, $minVal, $maxVal, $minStar, $maxStar, $fac);
 $hotellisst=$this->Hotel_Model->fetch_search_result($_SESSION['ses_id'], $page, $minVal, $maxVal, $minStar, $maxStar, $fac);

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
	
    $start_loop = $cur_page - 4;
    if ($no_of_paginations > $cur_page + 5)
        $end_loop = $cur_page + 5;
    else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - 9) {
        $start_loop = $no_of_paginations - 9;
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
 $hotellisst=$this->Hotel_Model->fetch_search_result_for_page_desc($_SESSION['ses_id'], $page, $minVal, $maxVal, $minStar, $maxStar);

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
	function pagination_name_asc()
	{
		

if($_POST['page'])
{
$page = $_POST['page'];
	
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
 $hotellisst=$this->Hotel_Model->fetch_search_result_for_page_desc($_SESSION['ses_id'], $page, $minVal, $maxVal, $minStar, $maxStar);

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
    $msg .= "<li p='1' onclick='javascript:name_asc(1);' class='active'>First</li>";
} else if ($first_btn) {
    $msg .= "<li p='1' class='inactive'>First</li>";
}

// FOR ENABLING THE PREVIOUS BUTTON
if ($previous_btn && $cur_page > 1) {
    $pre = $cur_page - 1;
    $msg .= "<li p='$pre'  onclick='javascript:name_asc({$pre});' class='active'>Prev</li>";
} else if ($previous_btn) {
    $msg .= "<li class='inactive' >Prev</li>";
}
for ($i = $start_loop; $i <= $end_loop; $i++) {

    if ($cur_page == $i)
        $msg .= "<li p='$i' onclick='javascript:name_asc({$i});'  style='color:#fff;background-color:#006699;' class='active'>{$i}</li>";
    else
        $msg .= "<li p='$i'  onclick='javascript:name_asc({$i});' class='active'>{$i}</li>";
}

// TO ENABLE THE NEXT BUTTON
if ($next_btn && $cur_page < $no_of_paginations) {
    $nex = $cur_page + 1;
    $msg .= "<li p='$nex' onclick='javascript:name_asc({$nex});'  class='active'>Next</li>";
} else if ($next_btn) {
    $msg .= "<li class='inactive'>Next</li>";
}

// TO ENABLE THE END BUTTON
if ($last_btn && $cur_page < $no_of_paginations) {
    $msg .= "<li p='$no_of_paginations' onclick='javascript:name_asc({$no_of_paginations});'   class='active'>Last</li>";
} else if ($last_btn) {
    $msg .= "<li p='$no_of_paginations' class='inactive'>Last</li>";
}
$goto = "<input type='text' class='goto' size='1' style='margin-top:-1px;margin-left:60px;'/><input type='button' id='go_btn' class='go_button' value='Go'/>";
$total_string = "<span class='total' a='$no_of_paginations'>Page <b>" . $cur_page . "</b> of <b>$no_of_paginations</b></span>";
$msg = $msg . "</ul></div>";  // Content for pagination
echo $msg;

}


	
	}
	function pagination_name_desc()
	{

if($_POST['page'])
{
$page = $_POST['page'];
	
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
 $hotellisst=$this->Hotel_Model->fetch_search_result_for_page_desc($_SESSION['ses_id'], $page, $minVal, $maxVal, $minStar, $maxStar);

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
    $msg .= "<li p='1' onclick='javascript:name_desc(1);' class='active'>First</li>";
} else if ($first_btn) {
    $msg .= "<li p='1' class='inactive'>First</li>";
}

// FOR ENABLING THE PREVIOUS BUTTON
if ($previous_btn && $cur_page > 1) {
    $pre = $cur_page - 1;
    $msg .= "<li p='$pre'  onclick='javascript:name_desc({$pre});' class='active'>Prev</li>";
} else if ($previous_btn) {
    $msg .= "<li class='inactive' >Prev</li>";
}
for ($i = $start_loop; $i <= $end_loop; $i++) {

    if ($cur_page == $i)
        $msg .= "<li p='$i' onclick='javascript:name_desc({$i});'  style='color:#fff;background-color:#006699;' class='active'>{$i}</li>";
    else
        $msg .= "<li p='$i'  onclick='javascript:name_desc({$i});' class='active'>{$i}</li>";
}

// TO ENABLE THE NEXT BUTTON
if ($next_btn && $cur_page < $no_of_paginations) {
    $nex = $cur_page + 1;
    $msg .= "<li p='$nex' onclick='javascript:name_desc({$nex});'  class='active'>Next</li>";
} else if ($next_btn) {
    $msg .= "<li class='inactive'>Next</li>";
}

// TO ENABLE THE END BUTTON
if ($last_btn && $cur_page < $no_of_paginations) {
    $msg .= "<li p='$no_of_paginations' onclick='javascript:name_desc({$no_of_paginations});'   class='active'>Last</li>";
} else if ($last_btn) {
    $msg .= "<li p='$no_of_paginations' class='inactive'>Last</li>";
}
$goto = "<input type='text' class='goto' size='1' style='margin-top:-1px;margin-left:60px;'/><input type='button' id='go_btn' class='go_button' value='Go'/>";
$total_string = "<span class='total' a='$no_of_paginations'>Page <b>" . $cur_page . "</b> of <b>$no_of_paginations</b></span>";
$msg = $msg . "</ul></div>";  // Content for pagination
echo $msg;

}


	
	}
	
	function pagination_star_asc()
	{
		

if($_POST['page'])
{
$page = $_POST['page'];
	
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
 $hotellisst=$this->Hotel_Model->fetch_search_result_for_page_desc($_SESSION['ses_id'], $page, $minVal, $maxVal, $minStar, $maxStar);

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
    $msg .= "<li p='1' onclick='javascript:star_asc(1);' class='active'>First</li>";
} else if ($first_btn) {
    $msg .= "<li p='1' class='inactive'>First</li>";
}

// FOR ENABLING THE PREVIOUS BUTTON
if ($previous_btn && $cur_page > 1) {
    $pre = $cur_page - 1;
    $msg .= "<li p='$pre'  onclick='javascript:star_asc({$pre});' class='active'>Prev</li>";
} else if ($previous_btn) {
    $msg .= "<li class='inactive' >Prev</li>";
}
for ($i = $start_loop; $i <= $end_loop; $i++) {

    if ($cur_page == $i)
        $msg .= "<li p='$i' onclick='javascript:star_asc({$i});'  style='color:#fff;background-color:#006699;' class='active'>{$i}</li>";
    else
        $msg .= "<li p='$i'  onclick='javascript:star_asc({$i});' class='active'>{$i}</li>";
}

// TO ENABLE THE NEXT BUTTON
if ($next_btn && $cur_page < $no_of_paginations) {
    $nex = $cur_page + 1;
    $msg .= "<li p='$nex' onclick='javascript:star_asc({$nex});'  class='active'>Next</li>";
} else if ($next_btn) {
    $msg .= "<li class='inactive'>Next</li>";
}

// TO ENABLE THE END BUTTON
if ($last_btn && $cur_page < $no_of_paginations) {
    $msg .= "<li p='$no_of_paginations' onclick='javascript:star_asc({$no_of_paginations});'   class='active'>Last</li>";
} else if ($last_btn) {
    $msg .= "<li p='$no_of_paginations' class='inactive'>Last</li>";
}
$goto = "<input type='text' class='goto' size='1' style='margin-top:-1px;margin-left:60px;'/><input type='button' id='go_btn' class='go_button' value='Go'/>";
$total_string = "<span class='total' a='$no_of_paginations'>Page <b>" . $cur_page . "</b> of <b>$no_of_paginations</b></span>";
$msg = $msg . "</ul></div>";  // Content for pagination
echo $msg;

}


	
	}
	function pagination_star_desc()
	{

if($_POST['page'])
{
$page = $_POST['page'];
	
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
 $hotellisst=$this->Hotel_Model->fetch_search_result_for_page_desc($_SESSION['ses_id'], $page, $minVal, $maxVal, $minStar, $maxStar);

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
    $msg .= "<li p='1' onclick='javascript:star_desc(1);' class='active'>First</li>";
} else if ($first_btn) {
    $msg .= "<li p='1' class='inactive'>First</li>";
}

// FOR ENABLING THE PREVIOUS BUTTON
if ($previous_btn && $cur_page > 1) {
    $pre = $cur_page - 1;
    $msg .= "<li p='$pre'  onclick='javascript:star_desc({$pre});' class='active'>Prev</li>";
} else if ($previous_btn) {
    $msg .= "<li class='inactive' >Prev</li>";
}
for ($i = $start_loop; $i <= $end_loop; $i++) {

    if ($cur_page == $i)
        $msg .= "<li p='$i' onclick='javascript:star_desc({$i});'  style='color:#fff;background-color:#006699;' class='active'>{$i}</li>";
    else
        $msg .= "<li p='$i'  onclick='javascript:star_desc({$i});' class='active'>{$i}</li>";
}

// TO ENABLE THE NEXT BUTTON
if ($next_btn && $cur_page < $no_of_paginations) {
    $nex = $cur_page + 1;
    $msg .= "<li p='$nex' onclick='javascript:star_desc({$nex});'  class='active'>Next</li>";
} else if ($next_btn) {
    $msg .= "<li class='inactive'>Next</li>";
}

// TO ENABLE THE END BUTTON
if ($last_btn && $cur_page < $no_of_paginations) {
    $msg .= "<li p='$no_of_paginations' onclick='javascript:star_desc({$no_of_paginations});'   class='active'>Last</li>";
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

	$data['result'] = $this->Hotel_Model->fetch_gta_temp_result_room_facility_new($_SESSION['ses_id'],$value);

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
	function jac_hotel_availabilty()
	{
		
		$room_used_type=$_SESSION['room_used_type'];
		$city=$_SESSION['city'];
		$sd=$_SESSION['sd'];
		$room_count=$_SESSION['room_count'];
		$ed=$_SESSION['ed'];
		$city_val = $this->Hotel_Model->get_city_code($city);  
		$city_code = $city_val->city_name;
		
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

		$checkin = date ( 'd M Y' ,strtotime($cin) );   //15 May 2011
			$xmldays=$_SESSION['days']-1;
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
			 $room1.='<ROOM>
						<OCCUPANCY>1</OCCUPANCY>
						<QUANTITY>'.$sb_room_cnt.'</QUANTITY>
						</ROOM>';
						$noofroom_sm[1]=$sb_room_cnt;
			}
			if($db_room_cnt > 0)
			{
				$roomCode = 'DB'; //'db';
				$room1.='<ROOM>
							<OCCUPANCY>3</OCCUPANCY>
							<QUANTITY>'.$db_room_cnt.'</QUANTITY>
							</ROOM>';
							$noofroom_sm[3]=$db_room_cnt;
			}
			if($q_room_cnt > 0)
			{
				$roomCode = 'Q'; //'db';
				$room1.='<ROOM>
						<OCCUPANCY>5</OCCUPANCY>
						<QUANTITY>'.$q_room_cnt.'</QUANTITY>';
					$room1.='</ROOM>';
					$noofroom_sm[5]=$q_room_cnt;
			}

			if($tb_room_cnt > 0)
			{
				$roomCode = 'TR'; //'db';
					$room1.='<ROOM>
						<OCCUPANCY>4</OCCUPANCY>
						<QUANTITY>'.$tb_room_cnt.'</QUANTITY>';
				$room1.='</ROOM>';
					$noofroom_sm[4]=$tb_room_cnt;
			}
			if($dbc_room_cnt > 0)
			{
				$roomCode = 'DB'; //'db';
					$room1.='<ROOM>
							<OCCUPANCY>7</OCCUPANCY>
							<QUANTITY>'.$dbc_room_cnt.'</QUANTITY>';
				if($dbc_room_cnt=='2')
				{
					$room1.='
						<CHILDREN>
						<CHILD_RATE CHILD_QUANTITY="2" CHILD_AGE="11"/>
						</CHILDREN>';
				}else if($dbc_room_cnt=='3'){
					$room1.='
						<CHILDREN>
						<CHILD_RATE CHILD_QUANTITY="3" CHILD_AGE="11"/>
						</CHILDREN>';
					}
					else
					{
						$room1.='
						<CHILDREN>
						<CHILD_RATE CHILD_QUANTITY="1" CHILD_AGE="11"/>
						</CHILDREN>';
					}
					$noofroom_sm[7]=$dbc_room_cnt;

			}
			if($dbcc_room_cnt > 0)
			{
				$roomCode = 'DB'; //'db';
					$room1.='<ROOM>
							<OCCUPANCY>7</OCCUPANCY>
							<QUANTITY>'.$dbcc_room_cnt.'</QUANTITY>';
				if($dbcc_room_cnt=='2')
				{
					$room1.='
						<CHILDREN>
						<CHILD_RATE CHILD_QUANTITY="2" CHILD_AGE="11"/>
						</CHILDREN>';
				}else if($dbcc_room_cnt=='3'){
					$room1.='
						<CHILDREN>
						<CHILD_RATE CHILD_QUANTITY="3" CHILD_AGE="11"/>
						</CHILDREN>';
					}
					else
					{
						$room1.='
						<CHILDREN>
						<CHILD_RATE CHILD_QUANTITY="1" CHILD_AGE="11"/>
						</CHILDREN>';
					}
						$noofroom_sm[7]=$dbcc_room_cnt;

			}
			$licence_key='4EFE152C-1215-4420-B46F-203520D753F0';
			$URL2 = "http://83.244.137.84/ServiceSearch.asp";//live
			
               $xml_data='<SERVICE_SEARCH_REQUEST>
				<VERSION_HISTORY APPLICATION_NAME="TSAPI API 1.0" XML_FILE_NAME="SERVICE_SEARCH_REQUEST.xml" LICENCE_KEY="'.$licence_key.'" TS_API_VERSION="v3.5.5" >
				<XML_VERSION_NO>1.0</XML_VERSION_NO>
				</VERSION_HISTORY>
				<GEO_LOCATION_NAME>'.$city_code.'</GEO_LOCATION_NAME>
				<START_DATE>'.$checkin.'</START_DATE>
				<NUMBER_OF_NIGHTS>'.$xmldays.'</NUMBER_OF_NIGHTS>
				<AVAILABLE_ONLY>true</AVAILABLE_ONLY>
				<GET_START_PRICE>true</GET_START_PRICE>
					<ROOMS_REQUIRED>'.$room1.'</ROOMS_REQUIRED>
				</SERVICE_SEARCH_REQUEST>';
		
//echo $xml_data;exit;
			   $ch2=curl_init();
        curl_setopt($ch2, CURLOPT_URL, $URL2);
        curl_setopt($ch2, CURLOPT_TIMEOUT, 0);
        curl_setopt($ch2, CURLOPT_HEADER, 0);
        curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch2, CURLOPT_POST, 1);
        curl_setopt($ch2, CURLOPT_POSTFIELDS, $xml_data);
		curl_setopt($ch2, CURLOPT_SSL_VERIFYHOST, 1);
		curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch2, CURLOPT_SSLVERSION, 3);
		//curl_setopt($ch2, CURLOPT_FOLLOWLOCATION, true);

        $httpHeader2 = array("Content-Type: text/xml; charset=UTF-8","Content-Encoding: UTF-8");
        curl_setopt($ch2, CURLOPT_HTTPHEADER, $httpHeader2);
		curl_setopt ($ch2, CURLOPT_ENCODING, "gzip");

        // Execut	e request, store response and HTTP response code
        $data2=curl_exec($ch2);
        $error2=curl_getinfo( $ch2, CURLINFO_HTTP_CODE );
        curl_close($ch2);


     //   $resp=str_replace('UTF-16','UTF-8', $data2);


 //   $array = $this->Hotel_Model->xml2array($resp);
	//echo '<pre/>';
	//print_r($array);exit;
		echo $data2;exit;
		if(!empty($array))
		{$dom = new DOMDocument();
		$dom->loadXML($resp);
		$SERVICE = $dom->getElementsByTagName( "SERVICE" );
		$i=0;
		
		foreach($SERVICE as $SERVICEval)
		{
			$SERVICE_ID=$SERVICE->item($i)->getAttribute("SERVICE_ID");
			$SERVICE_NAME=$SERVICE->item($i)->getAttribute("SERVICE_NAME");
			 $RATING=$SERVICE->item($i)->getAttribute("RATING");
			 $LOCATION=$SERVICE->item($i)->getAttribute("LOCATION");
			 $AVAILABLE=$SERVICE->item($i)->getAttribute("AVAILABLE");
			 $ISRECOMMENDEDPRODUCT=$SERVICE->item($i)->getAttribute("ISRECOMMENDEDPRODUCT");
			 $STARTING_PRICE=$SERVICE->item($i)->getAttribute("STARTING_PRICE");
			 $CURRENCY=$SELL_CURRENCY_CODE=$SERVICE->item($i)->getAttribute("CURRENCY");

			 $OPTIONS=$SERVICEval->getElementsByTagName("OPTIONS");
			 foreach($OPTIONS as $OPTIONSval)
			{
				$OPTION=$OPTIONSval->getElementsByTagName("OPTION");
			    foreach($OPTION as $OPTIONval)
			    {
					 $optid = $OPTIONval->getElementsByTagName( "OPTIONID" );
					 $OPTIONID = $optid->item(0)->nodeValue;

					  $optname = $OPTIONval->getElementsByTagName( "OPTION_NAME" );
					 $OPTION_NAME = $optname->item(0)->nodeValue;

					  $min_adult = $OPTIONval->getElementsByTagName( "MinAdult" );
					 $MinAdult = $min_adult->item(0)->nodeValue;

					  $max_adult = $OPTIONval->getElementsByTagName( "MaxAdult" );
					 $MaxAdult = $max_adult->item(0)->nodeValue;

					  $min_child = $OPTIONval->getElementsByTagName( "MinChild" );
					 $MinChild = $min_child->item(0)->nodeValue;

					 $max_child = $OPTIONval->getElementsByTagName( "MaxChild" );
					 $MaxChild = $max_child->item(0)->nodeValue;

					  $child_max_age = $OPTIONval->getElementsByTagName( "ChildMaxAge" );
					 $ChildMaxAge = $child_max_age->item(0)->nodeValue;

					  $occ = $OPTIONval->getElementsByTagName( "OCCUPANCY" );
					 $OCCUPANCY = $occ->item(0)->nodeValue;

					  $opt_status = $OPTIONval->getElementsByTagName( "OPTION_STATUS" );
					 $OPTION_STATUS = $opt_status->item(0)->nodeValue;

					 $prices = $OPTIONval->getElementsByTagName( "PRICES" );
					 $adult_amt=0;
					$adult_amt1=0;
					$TOTADULT =0;
					$TOTCHILD =0;
					$ROOM_QUANTITY=0;
					$SELL_PRICE_ID_SM='';
					 foreach($prices as $pricesval)
			    	{
						 $price = $pricesval->getElementsByTagName( "PRICE" );
						  foreach($price as $priceval)
			    		  {
							   $price_date = $priceval->getElementsByTagName( "PRICE_DATE" );
					 			$PRICE_DATE = $price_date->item(0)->nodeValue;

								$sell_price_id = $priceval->getElementsByTagName( "SELL_PRICE_ID" );
					 			$SELL_PRICE_ID = $sell_price_id->item(0)->nodeValue;
								if(!strstr($SELL_PRICE_ID_SM, $SELL_PRICE_ID)){
								$SELL_PRICE_ID_SM .= $SELL_PRICE_ID.',';
								}
								
								$sell_price_amt = $priceval->getElementsByTagName( "SELL_PRICE_AMOUNT" );
					 			$SELL_PRICE_AMOUNT = $sell_price_amt->item(0)->nodeValue;
								
								$sell_price_code = $priceval->getElementsByTagName( "SELL_CURRENCY_CODE" );
					 			$SELL_PRICE_CODE = $sell_price_code->item(0)->nodeValue;

								$meal_plan = $priceval->getElementsByTagName( "MEAL_PLAN" );
								foreach($meal_plan as $meal_planval)
			    		  		{
									$meal_plan_text = $meal_planval->getElementsByTagName( "MEAL_PLAN_TEXT" );
									$MEAL_PLAN = $meal_plan_text->item(0)->nodeValue;

									$meal_plan_type = $meal_planval->getElementsByTagName( "MEAL_PLAN_TYPE" );
									foreach($meal_plan_type as $meal_plan_typeval)
			    		  			{
										$include_bkfast = $meal_plan_typeval->getElementsByTagName( "INCLUDESBREAKFAST" );
									 	$MEAL_PLAN_TYPE = $include_bkfast->item(0)->nodeValue;
									}
								}
								
								$child_prices = $priceval->getElementsByTagName( "CHILD_PRICES" );
								$CHILD_PRICE=0;
								foreach($child_prices as $child_pricesval)
			    		  		{
									
									$child_price = $child_pricesval->getElementsByTagName( "CHILD_PRICE" );
									foreach($child_price as $child_priceval)
			    		  			{
										$cprice = $child_priceval->getElementsByTagName( "SELL_PRICE_AMOUNT" );
									 	$CHILD_PRICE1 = $cprice->item(0)->nodeValue;
										$CHILD_PRICE = $CHILD_PRICE + $CHILD_PRICE1;
								
									 
									}
								}
								
								$ori_sell_price_amt = $priceval->getElementsByTagName( "ORIGNAL_SELL_PRICE_AMOUNT" );
					 			$ORIGNAL_SELL_PRICE_AMOUNT = $ori_sell_price_amt->item(0)->nodeValue;
								if(array_key_exists($OCCUPANCY,$noofroom_sm)){
								  if($OCCUPANCY == 1){
								   $TOTADULT= $noofroom_sm[$OCCUPANCY] * 1;
								   $ROOM_QUANTITY= $noofroom_sm[$OCCUPANCY];
								   }
								   else if($OCCUPANCY == 3){
								   $TOTADULT= $noofroom_sm[$OCCUPANCY] * 2;
								   $ROOM_QUANTITY= $noofroom_sm[$OCCUPANCY];
								   }
								   else if($OCCUPANCY == 4){
								   $TOTADULT= $noofroom_sm[$OCCUPANCY] * 3;
								   $ROOM_QUANTITY= $noofroom_sm[$OCCUPANCY];
								   }
								   else if($OCCUPANCY == 5){
								   $TOTADULT= $noofroom_sm[$OCCUPANCY] * 4;
								   $ROOM_QUANTITY= $noofroom_sm[$OCCUPANCY];
								   }
								   else if($OCCUPANCY == 7){
								   $TOTADULT = $noofroom_sm[$OCCUPANCY] * 2;
								   $TOTCHILD = $noofroom_sm[$OCCUPANCY] * 1;
								   $ROOM_QUANTITY= $noofroom_sm[$OCCUPANCY];
								   }
								 
								   $adult_amt=$adult_amt+$SELL_PRICE_AMOUNT*$noofroom_sm[$OCCUPANCY];
								  
								}
								
								$adult_amt=$adult_amt+$CHILD_PRICE; 
								 
							
								 $this->Hotel_Model->insert_booking_details($PRICE_DATE,$SELL_PRICE_ID,$OPTIONID,$ROOM_QUANTITY,$TOTADULT,$TOTCHILD,$SERVICE_ID,$OCCUPANCY);
						  }
                      
					}
					
				
					$adult_amt=$adult_amt;
				
					
						$star=substr($RATING,0,1);


						 $inclusion=$MEAL_PLAN;
						 $api='jac';
						 $hoteldesc='';
						 $Image='';
						 $NumAdults=$MaxAdult;
						  $Quantity=substr($SELL_PRICE_ID_SM,0,-1); 
						 $roomID=$OCCUPANCY;
						 $session=$OPTIONID;

				
				$sec_res=$_SESSION['ses_id'];
				$currencyv1 = $CURRENCY;
									 if($currencyv1 !='USD')
											 {
												 $c_val1 =$this->Hotel_Model->get_currecy_detail($currencyv1);
												 $c_val = $c_val1->value;
												 $org_amt=$cost_val;
											
											$amountv = $cost_val /  $c_val;
											 }
											 else
											 {
												 $c_val =1; 
												 $org_amt=$cost_val;
												
												$amountv = $cost_val;
											 }
											
											$amountv1 = $amountv;
											
										$contry = $this->Hotel_Model->get_country($_SESSION['city']);
						$markup =  $this->Hotel_Model->get_markup_detail('jac',$contry);
						$pay_charge = $this->Hotel_Model->get_payment_charge();
											//echo $markup;exit;
											/*$amountv2 = ($markup /100);
											$amountv2pay = ($pay_charge /100);
											$amountv3 = $amountv2*$amountv1;
												
											$amountv3pay = $amountv2pay*$amountv1;
												
											$amountv4 = $amountv3+$amountv1+$amountv3pay;*/
																						
											$amountv2 = ($markup /100);
											$amountv3 = $amountv2*$amountv1;
											$amountv4 = $amountv3+$amountv1;
											
											$amountv2pay = ($pay_charge /100);
											$amountv3pay = $amountv2pay*$amountv4;
									
				$without_markup =  ceil($tot_amt);
				
		
	
$sec_res=$_SESSION['ses_id'];
					$adult =  $_SESSION['adult_count'];
											$child =  $_SESSION['child_count'];
					

$this->Hotel_Model->insert_gta_temp_result($sec_res,'jac',$SERVICE_ID,$roomID,$OPTION_NAME,$amountv4,$OPTION_STATUS,$MEAL_PLAN,$adult,$child,$amountv3,$org_amt,$currencyv1,$c_val,$amountv3pay,$cityVal);
						
				
			//$this->Search_Model->insert_search_result_jac($api,$LOCATION,$SERVICE_ID,$SERVICE_NAME,$star,$pernight,$tot_amt,$CURRENCY,$OPTION_NAME,$MEAL_PLAN,$LOCATION,$common_commission,$OPTION_STATUS,$without_markup,$hoteldesc,$Image,$NumAdults,$Quantity,$roomID,$session,$MEAL_PLAN_TYPE,$tot_room,$cout,$cin,$jac_image,$SERVICELONGITUTE,$SERVICELATITUTE);

				}
				
			}
		
			$i++;
		}}
		
	
	}
	function dotw_hotel_availabilty()
	{
		//print_r($_SESSION); exit;
		$sec_res=$_SESSION['ses_id'];
    	$adult =  $_SESSION['adult_count'];
		$child =  $_SESSION['child_count'];


	   	$room_used_type=$_SESSION['room_used_type'];
		$city_nm=$_SESSION['city'];
		$city_arr = explode(',',$city_nm);
		$city = $city_arr[0];		
		$sd=$_SESSION['sd'];
		$room_count=$_SESSION['room_count'];
		$ed=$_SESSION['ed'];
		//$city_val = $this->Hotel_Model->get_dotw_city_code($city);  
		//$city_code = $city_val->city_code;
		$city_val = $this->Hotel_Model->get_city_code($city_nm);  
		$city_code = $city_val->dotw;
		          
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
		
		$tim = $this->Hotel_Model->unixToMySQL(time()); 
		$dotw_cin_dte =$cin.' '.$tim;
		
		$tim = $this->Hotel_Model->unixToMySQL(time()); 
		$dotw_cout_dte =$cout.' '.$tim;
		
		$data['ucin'] = $dotw_cin_dte;//strtotime($dotw_cin_dte);
		
		$hotel_det['unix_checkin']  = $dtin = strtotime($dotw_cin_dte);
		$data['ucout'] = $dotw_cout_dte;//strtotime($dotw_cout_dte);
		$hotel_det['unix_checkout']  =  $dtout = strtotime($dotw_cout_dte);
		
		$this->session->set_userdata(array('unix_cin'=>$data['ucin'],'unix_cout'=>$data['ucout']));
		
	
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
		//echo 'sb='.$sb_room_cnt.' db='.$db_room_cnt.' dbc='.$dbc_room_cnt.' dbcc='.$dbcc_room_cnt.' tb='.$tb_room_cnt.' qb='.$q_room_cnt; exit;
		//print_r($room_used_type); exit;
		$room_nos = 0;
		$room='';
		
			//single room
			
				//sb
			
				if($sb_room_cnt==1) //one room
				{
					$room.='<room runno="'.$room_nos.'">
						<adultsCode>1</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
						<rateBasis>-1</rateBasis></room>';
					$room_nos++;
				}
				if($sb_room_cnt==2)//two room
				{
					$room.='<room runno="'.$room_nos.'">
						<adultsCode>1</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
						<rateBasis>-1</rateBasis>
					</room>';
					$room_nos++;
					$room.='<room runno="'.$room_nos.'">
						<adultsCode>1</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
						<rateBasis>-1</rateBasis>
					</room>
					';
					$room_nos++;
				}			
				if($sb_room_cnt==3)//three rooms
				{
					$room.='<room runno="'.$room_nos.'">
						<adultsCode>1</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
						<rateBasis>-1</rateBasis>
					</room>';
					$room_nos++;
					$room.='<room runno="'.$room_nos.'">
						<adultsCode>1</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
						<rateBasis>-1</rateBasis>
					</room>';
					$room_nos++;
					$room.='<room runno="'.$room_nos.'">
						<adultsCode>1</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
						<rateBasis>-1</rateBasis>
					</room>';
					$room_nos++;
				}
			
			 //double room or twin room
			
				//db
				if($db_room_cnt==1) //one room
				{
					$room.='<room runno="'.$room_nos.'">
						<adultsCode>2</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
						<rateBasis>-1</rateBasis>
					</room>';
					$room_nos++;
				}
				if($db_room_cnt==2)//two room
				{
					$room.='<room runno="'.$room_nos.'">
						<adultsCode>2</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
						<rateBasis>-1</rateBasis>
					</room>';
					$room_nos++;
					$room.='<room runno="'.$room_nos.'">
						<adultsCode>2</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
						<rateBasis>-1</rateBasis>
					</room>';
					$room_nos++;
				}			
				if($db_room_cnt==3)//three rooms
				{
					$room.='<room runno="'.$room_nos.'">
						<adultsCode>2</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
						<rateBasis>-1</rateBasis>
					</room>';
					$room_nos++;
					$room.='<room runno="'.$room_nos.'">
						<adultsCode>2</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
						<rateBasis>-1</rateBasis>
					</room>';
					$room_nos++;
					$room.='<room runno="'.$room_nos.'">
						<adultsCode>2</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
						<rateBasis>-1</rateBasis>
					</room>';
					$room_nos++;
				}						
			
			 //double plus child room or twin plus child room
			
				//dbc
				
				if($dbc_room_cnt==1)
				{
					$childage=$this->session->userdata('childage');
					$room.='<room runno="'.$room_nos.'">
						<adultsCode>2</adultsCode>
						<children no="1">
							<child runno="1">5</child>
						</children>
						<extraBed>0</extraBed>
						<rateBasis>-1</rateBasis>
					</room>';
					$room_nos++;
				}
				if($dbc_room_cnt==2)
				{
					
					$room.='<room runno="'.$room_nos.'">
						<adultsCode>2</adultsCode>
						<children no="1">
							<child runno="1">5</child>
						</children>
						<extraBed>0</extraBed>
						<rateBasis>-1</rateBasis>
					</room>';
					$room_nos++;
					$room.='<room runno="'.$room_nos.'">
						<adultsCode>2</adultsCode>
						<children no="1">
							<child runno="1">4</child>
						</children>
						<extraBed>0</extraBed>
						<rateBasis>-1</rateBasis>
					</room>';
					$room_nos++;
				}
				if($dbc_room_cnt==3)
				{
					
					$room.='<room runno="'.$room_nos.'">
						<adultsCode>2</adultsCode>
						<children no="1">
							<child runno="1">5</child>
						</children>
						<extraBed>0</extraBed>
						<rateBasis>-1</rateBasis>
					</room>';
					$room_nos++;
					$room.='<room runno="'.$room_nos.'">
						<adultsCode>2</adultsCode>
						<children no="1">
							<child runno="1">4</child>
						</children>
						<extraBed>0</extraBed>
						<rateBasis>-1</rateBasis>
					</room>';
					$room_nos++;
					$room.='<room runno="'.$room_nos.'">
						<adultsCode>2</adultsCode>
						<children no="1">
							<child runno="1">5</child>
						</children>
						<extraBed>0</extraBed>
						<rateBasis>-1</rateBasis>
					</room>';
					$room_nos++;
				}	

			
			//double plus child room or twin plus 2 child room
			

                //dbcc
				
				if($dbcc_room_cnt==1)
				{
					$childage=$this->session->userdata('childage');
					$room.='<room runno="'.$room_nos.'">
						<adultsCode>2</adultsCode>
						<children no="2">
							<child runno="0">5</child>
							<child runno="1">5</child>
						</children>
						<extraBed>0</extraBed>
						<rateBasis>-1</rateBasis>
					</room>';
					$room_nos++;
				}
				if($dbcc_room_cnt==2)
				{
					
					$room.='<room runno="'.$room_nos.'">
						<adultsCode>2</adultsCode>
						<children no="2">
							<child runno="0">5</child>
							<child runno="1">5</child>
						</children>
						<extraBed>0</extraBed>
						<rateBasis>-1</rateBasis>
					</room>';
					$room_nos++;
					$room.='<room runno="'.$room_nos.'">
						<adultsCode>2</adultsCode>
						<children no="2">
							<child runno="0">4</child>
							<child runno="1">5</child>
						</children>
						<extraBed>0</extraBed>
						<rateBasis>-1</rateBasis>
					</room>';
					$room_nos++;
				}
				if($dbcc_room_cnt==3)
				{
					
					$room.='<room runno="'.$room_nos.'">
						<adultsCode>2</adultsCode>
						<children no="2">
							<child runno="0">5</child>
							<child runno="1">5</child>
						</children>
						<extraBed>0</extraBed>
						<rateBasis>-1</rateBasis>
					</room>';
					$room_nos++;
					$room.='<room runno="'.$room_nos.'">
						<adultsCode>2</adultsCode>
						<children no="2">
							<child runno="0">5</child>
							<child runno="1">5</child>
						</children>
						<extraBed>0</extraBed>
						<rateBasis>-1</rateBasis>
					</room>';
					$room_nos++;
					$room.='<room runno="'.$room_nos.'">
						<adultsCode>2</adultsCode>
						<children no="2">
							<child runno="0">5</child>
							<child runno="1">5</child>
						</children>
						<extraBed>0</extraBed>
						<rateBasis>-1</rateBasis>
					</room>';
					$room_nos++;
				}									
				
			
			//Triple room
			
				//tb
				
				if($tb_room_cnt==1) //one room
				{
					$room.='<room runno="'.$room_nos.'">
						<adultsCode>3</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
						<rateBasis>-1</rateBasis>
					</room>';
					$room_nos++;
				}
				if($tb_room_cnt==2)//two room
				{
					$room.='<room runno="'.$room_nos.'">
						<adultsCode>3</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
						<rateBasis>-1</rateBasis>
					</room>';
					$room_nos++;
					$room.='<room runno="'.$room_nos.'">
						<adultsCode>3</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
						<rateBasis>-1</rateBasis>
					</room>
					';
					$room_nos++;
				}			
				if($tb_room_cnt==3)//three rooms
				{
					$room.='<room runno="'.$room_nos.'">
						<adultsCode>3</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
						<rateBasis>-1</rateBasis>
					</room>';
					$room_nos++;
					$room.='<room runno="'.$room_nos.'">
						<adultsCode>3</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
						<rateBasis>-1</rateBasis>
					</room>';
					$room_nos++;
					$room.='<room runno="'.$room_nos.'">
						<adultsCode>3</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
						<rateBasis>-1</rateBasis>
					</room>';
					$room_nos++;
				}							
			
			//Quad room
			
				//qb
				
				if($q_room_cnt==1) //one room
				{
					$room.='<room runno="'.$room_nos.'">
						<adultsCode>4</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
						<rateBasis>-1</rateBasis>
					</room>';
					$room_nos++;
				}
				if($q_room_cnt==2)//two room
				{
					$room.='<room runno="'.$room_nos.'">
						<adultsCode>4</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
						<rateBasis>-1</rateBasis>
					</room>';
					$room_nos++;
					$room.='<room runno="'.$room_nos.'">
						<adultsCode>4</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
						<rateBasis>-1</rateBasis>
					</room>
					';
					$room_nos++;
				}			
				if($q_room_cnt==3)//three rooms
				{
					$room.='<room runno="'.$room_nos.'">
						<adultsCode>4</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
						<rateBasis>-1</rateBasis>
					</room>';
					$room_nos++;
					$room.='<room runno="'.$room_nos.'">
						<adultsCode>4</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
						<rateBasis>-1</rateBasis>
					</room>';
					$room_nos++;
					$room.='<room runno="'.$room_nos.'">
						<adultsCode>4</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
						<rateBasis>-1</rateBasis>
					</room>';
					$room_nos++;
				}							
			
		
		
		
		$username = "LUXURY";
		$password = md5('Tayseer.ayad@mybookingplanner.');
		$user_id='583215';
		$req='<?xml version="1.0" encoding="UTF-8" ?>
		<customer>
			<username>'.$username.'</username>
			<password>'.$password.'</password>
			<id>'.$user_id.'</id>
			<source>1</source>
			<product>hotel</product>
			<request command="searchhotels">
			<bookingDetails>
				<fromDate>'.$cin.'</fromDate>
				<toDate>'.$cout.'</toDate>
				<currency>520</currency>
				<rooms no="'.$room_count.'">
					'.$room.'
				</rooms>
			</bookingDetails>
			<return>
				<sorting order="asc">sortByPrice</sorting>
				<getRooms>true</getRooms>
				<filters>
					<city>'.$city_code.'</city> 
					<nearbyCities>false</nearbyCities>
			    </filters>
				<fields>
					<field>description1</field>
					<field>description2</field>
					<field>hotelName</field>
					<field>fullAddress</field>
					<field>address</field>
					<field>zipCode</field>
					<field>hotelPhone</field>
					<field>location</field>
					<field>cityName</field>
					<field>cityCode</field>
					<field>countryName</field>				
					<field>hotelCheckIn</field>
					<field>hotelCheckOut</field>					
					<field>rating</field>
					<field>images</field>
					<field>geoPoint</field>	
					<field>builtYear</field>
					<field>renovationYear</field>
					<field>noOfRooms</field>
					<field>attraction</field>
					<field>amenitie</field>
					<field>leisure</field>
					<field>business</field>
					<field>transportation</field>
					<field>fireSafety</field>
				</fields>
				<resultsPerPage>500</resultsPerPage>
				<page>0</page>
			</return>
		</request>
	</customer>';	
	
			//echo $req; exit;
		//echo'<pre/>';print_r($req);
		$URL2 = "http://xmldev.dotwconnect.com/gateway.dotw";//local
	
		 
        $ch2=curl_init();
        curl_setopt($ch2, CURLOPT_URL, $URL2);
        curl_setopt($ch2, CURLOPT_TIMEOUT, 180);
        curl_setopt($ch2, CURLOPT_HEADER, 0);
        curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch2, CURLOPT_POST, 1);
        curl_setopt($ch2, CURLOPT_POSTFIELDS, $req);
		curl_setopt($ch2, CURLOPT_SSL_VERIFYHOST, 1);
		curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, FALSE); 
        curl_setopt($ch2, CURLOPT_SSLVERSION, 3);	
	  	curl_setopt($ch2, CURLOPT_FOLLOWLOCATION, true);
 
        $httpHeader2 = array(
            "Content-Type: text/xml; charset=UTF-8",
            "Content-Encoding: UTF-8"
        );
        curl_setopt($ch2, CURLOPT_HTTPHEADER, $httpHeader2);
		curl_setopt ($ch2, CURLOPT_ENCODING, "gzip");

        // Execute request, store response and HTTP response code
        
        $data2=curl_exec($ch2);
        $error2=curl_getinfo( $ch2, CURLINFO_HTTP_CODE );
        curl_close($ch2);		
		//echo $data2; exit;
		$room_resp_count = '';
		$totamount='';
		if(!empty($data2))		
		{
			//$XML_array = $this->xml2array($data2);
			//$response=xml2array($data2);
			$dom2=new DOMDocument();
			$dom2->loadXML($data2);
			
			$hotel=$dom2->getElementsByTagName("hotel");
			$i=0;
			$j=0;
			foreach($hotel as $val)
			{
				//Static 				
				$cin =strtotime($dotw_cin_dte);
				$cout =strtotime($dotw_cout_dte);
				
				//Currency Short
				$currencyShort=$dom2->getElementsByTagName("currencyShort");
				$currencyv1 = $currencyShort->item(0)->nodeValue;
				
				//Hotel id
				$hotelid = $hotel->item($i)->getAttribute("hotelid");
				$i++;
			
				//Description
				$description1 = $val->getElementsByTagName("description1");
				foreach($description1 as $val2)
				{
					$language = $val2->getElementsByTagName("language");
					$desc = $desc =$description1->item(0)->nodeValue;
				}

				//Hotel Name
				$hotelName = $val->getElementsByTagName("hotelName");
				$hnm = $hotelName->item(0)->nodeValue;
			
				//Fulladdress
				$full_address = $val->getElementsByTagName("fullAddress");
				foreach($full_address as $full_add)
				{
					$hotelStreetAddress = $full_add->getElementsByTagName("hotelStreetAddress");
					$addr = $hotelStreetAddress->item(0)->nodeValue;
					
					$hotelZipCode = $full_add->getElementsByTagName("hotelZipCode");
					$zip = $hotelZipCode->item(0)->nodeValue;
				}
				
		
				//Hotel phone
				$hotelPhone = $val->getElementsByTagName("hotelPhone");
				$phone = $hotelPhone->item(0)->nodeValue;
				
				//Hotel Location
				$location = $val->getElementsByTagName("location");
				$loc = $location->item(0)->nodeValue;
				
				
				//Hotel City
				$cityName = $val->getElementsByTagName("cityName");
				$hcity = $cityName->item(0)->nodeValue;
				
				
				//Hotel Country
				$countryName = $val->getElementsByTagName("countryName");
				$country = $countryName->item(0)->nodeValue;
				
				//Rating star
				$rating = $val->getElementsByTagName("rating");
				$rate_code=$rating->item(0)->nodeValue;
				$row3=$this->Hotel_Model->starCode_dotw($rate_code);
				
				$rate = trim($row3[0]->star_rate);	
				
		$lat ='';
		 $lon ='';
				//Geo Point
				$geoPoint = $val->getElementsByTagName("geoPoint");
				foreach($geoPoint as $val3)
				{
					$lat = $val3->getElementsByTagName("lat");
				 $lat = $lat->item(0)->nodeValue;
					
					$lng = $val3->getElementsByTagName("lng");
					 $lon =$lng->item(0)->nodeValue;
				}
				
				
				//Thumb Images
				$images = $val->getElementsByTagName("images");
				foreach($images as $val4)
				{
					$thumb = $val4->getElementsByTagName("thumb");
					$img =  $thumb->item(0)->nodeValue;
					//Hotel Images
					$hotelImages = $val4->getElementsByTagName("hotelImages");
					$urls='';
					foreach($hotelImages as $val5)
					{
						$image = $val5->getElementsByTagName("image");
						foreach($image as $val6)
						{
							$url = $val6->getElementsByTagName("url");
							$url=$url->item(0)->nodeValue;
							$urls .= $url.'&';
							
						}
						$url__ = $urls;
					}				
				}
				
			
				$availability = $val->getElementsByTagName("availability");
				 $status = $availability->item(0)->nodeValue;
				
				$rooms = $val->getElementsByTagName("rooms");
				foreach($rooms as $val7)
				{
					$room = $val7->getElementsByTagName("room");
					$x=0;
					$cost_value=0;
					foreach($room as $val8)
					{
						$ref_room = $room->item($x)->getAttribute('runno');
						
						$adults=$room->item($x)->getAttribute('adults');
						
						$children=$room->item($x)->getAttribute('children');
						
						$rcount=$room->item($x)->getAttribute('count');
						
						
						$childrenages=$room->item($x)->getAttribute('childrenages');
						$extrabed=$room->item($x)->getAttribute('extrabeds');
						
					$roomType = $val8->getElementsByTagName("roomType");
						//room type code
							
						$e=0;
						foreach($roomType as $val9)
						{
							//Room type name
						    $roomcode = $roomType->item($e)->getAttribute('roomtypecode');
							
							$rm_type = $val9->getElementsByTagName("name");
							$room_type =  $rm_type->item(0)->nodeValue;
							
							$rateBases = $val9->getElementsByTagName("rateBases");
							 $v=0;
							
							foreach($rateBases as $val10)							
							{
								
						       $rateBasis = $val10->getElementsByTagName("rateBasis");
							   
								foreach($rateBasis as $val11)
								{
									
									  $mealid=$rateBasis->item($v)->getAttribute('id');
									  //$result['price_breakup']=$mealid;
									  $meal=$rateBasis->item($v)->getAttribute('description');
									
									//Allocation Details
										
									$alloc_details = $val11->getElementsByTagName("allocationDetails");
									$alloc_det = $alloc_details->item(0)->nodeValue;
		                            //$this->session->set_userdata(array('alloc_detail'=>$alloc_detail));
									
									//Total cost value
									$total = $val11->getElementsByTagName("total");
									$cost_val = round($total->item(0)->nodeValue,2);
									
  								    $cancellationRuless = $val11->getElementsByTagName("cancellationRules");
									foreach($cancellationRuless as $cancellationRulessss)
									{
									$toDate = $cancellationRulessss->getElementsByTagName("toDate");
									$toDateval = $toDate->item(0)->nodeValue;
									
									$charge = $cancellationRulessss->getElementsByTagName("charge");
									$chargeval = $charge->item(1)->nodeValue;
									}
								    $code = $hotelid;		
									$rcount=1;
									$api="dotw";
				
									$sec_res=$_SESSION['ses_id'];
									 if($currencyv1 !='USD')
											 {
												 $c_val1 =$this->Hotel_Model->get_currecy_detail($currencyv1);
												 $c_val = $c_val1->value;
												 $org_amt=$cost_val;
											
											$amountv = $cost_val /  $c_val;
											 }
											 else
											 {
												 $c_val =1; 
												 $org_amt=$cost_val;
												
												$amountv = $cost_val;
											 }
											
											$amountv1 = $amountv;
											
										$contry = $this->Hotel_Model->get_country($_SESSION['city']);
						$markup =  $this->Hotel_Model->get_markup_detail('dotw',$contry);
						$pay_charge = $this->Hotel_Model->get_payment_charge();
																							
											$amountv2 = ($markup /100);
											$amountv3 = $amountv2*$amountv1;
											$amountv4 = $amountv3+$amountv1;
											
											$amountv2pay = ($pay_charge /100);
											$amountv3pay = $amountv2pay*$amountv4;
											$adult =  $_SESSION['adult_count'];
											$child =  $_SESSION['child_count'];
					$image = 'http://'.substr($url,14);
							  $api_perm = $this->Hotel_Model->check_permanant($code,$hnm,$hcity);
							  if($api_perm == '')
							{
							  $this->Hotel_Model->add_dotw_permanant($code,$hnm,$hcity,$rate,$image,$desc,$loc,$lat,$lon,$addr,$phone);
							}
						      $this->Hotel_Model->insert_dotw_temp_result($sec_res,'dotw',$code,$roomcode,$room_type,$amountv4,$status,$meal,$adults,$children,$amountv3,$org_amt,$currencyv1,$c_val,$amountv3pay,$hcity,$toDateval,$chargeval,$rcount,$alloc_det,$mealid,$ref_room);
								
							  //$api_perm = $this->Hotel_Model->check_permanant($code,$hnm,$hcity,$rate,$img,$desc,$loc,$lat,$lon,$addr,$phone);
									//print_r($api_perm); exit;
									//if($api_perm == '')
								//	{
								   	//    $this->Hotel_Model->add_dotw_permanant($code,$hnm,$hcity,$rate,$img,$desc,$loc,$lat,$lon,$addr,$phone);
								//	}
								
							//$this->Hotel_Model->insert_gta_temp_result($sec_res,'dotw',$code,$roomcode,$room_type,$totamount_dotw,$status,$meal,$adults,$children,$rcount,$mealid,$meal,$alloc_det,$ref_room);
									 	
								  $v++;		
								}
									
									
							}
						
							
							$e++;
						}$x++;
						
						
					}
					
					
				}
				
					
			}//foreach endexit;
		}//if
		
	}
	

	function gta_hotel_availabilty()
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
		//echo $request;
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
		//echo $data2;exit;
		if(!empty($data2))
		{
				$dom2=new DOMDocument();
				$dom2->loadXML($data2);
				$hotel=$dom2->getElementsByTagName("Hotel");
				foreach($hotel as $val)
				{
						
				$item = $val->getElementsByTagName("Item");
				$itemVal=$item->item(0)->nodeValue;
				$itemCode=$item->item(0)->getAttribute("Code");
				$room = $val->getElementsByTagName("RoomCategory");
				
				$city = $val->getElementsByTagName("City");
				$cityVal=$city->item(0)->nodeValue;
		
				$i=0;
				foreach($room as $category)
				{
				$room_code=$room->item($i)->getAttribute("Id");
				$roomCategory = $category->getElementsByTagName("Description");
				$room_type=$roomCategory->item(0)->nodeValue;
				$cost = $category->getElementsByTagName("ItemPrice");
				
				$currencyv1=$cost->item(0)->getAttribute("Currency");
				
				$cost_val=$cost->item(0)->nodeValue;
				$status = $category->getElementsByTagName("Confirmation");
				$status_val=$status->item(0)->nodeValue;
				$meals = $category->getElementsByTagName("Meals");
				$meals_val=$meals->item(0)->nodeValue;
				$api="gta";
				$i++;
				$sec_res=$_SESSION['ses_id'];
									 if($currencyv1 !='USD')
											 {
												 $c_val1 =$this->Hotel_Model->get_currecy_detail($currencyv1);
												 $c_val = $c_val1->value;
												 $org_amt=$cost_val;
											
											$amountv = $cost_val /  $c_val;
											 }
											 else
											 {
												 $c_val =1; 
												 $org_amt=$cost_val;
												
												$amountv = $cost_val;
											 }
											
											$amountv1 = $amountv;
											
										$contry = $this->Hotel_Model->get_country($_SESSION['city']);
						$markup =  $this->Hotel_Model->get_markup_detail('gta',$contry);
						$pay_charge = $this->Hotel_Model->get_payment_charge();
											//echo $markup;exit;
											/*$amountv2 = ($markup /100);
											$amountv2pay = ($pay_charge /100);
											$amountv3 = $amountv2*$amountv1;
												
											$amountv3pay = $amountv2pay*$amountv1;
												
											$amountv4 = $amountv3+$amountv1+$amountv3pay;*/
																						
											$amountv2 = ($markup /100);
											$amountv3 = $amountv2*$amountv1;
											$amountv4 = $amountv3+$amountv1;
											
											$amountv2pay = ($pay_charge /100);
											$amountv3pay = $amountv2pay*$amountv4;
											$adult =  $_SESSION['adult_count'];
											$child =  $_SESSION['child_count'];
					

						$this->Hotel_Model->insert_gta_temp_result($sec_res,'gta',$itemCode,$room_code,$room_type,$amountv4,$status_val,$meals_val,$adult,$child,$amountv3,$org_amt,$currencyv1,$c_val,$amountv3pay,$cityVal);
								
			    // store the temp search table
				//$this->B2b_Hotel_Model->insert_gta_temp_result($sec_res,$api,$itemCode,$room_code,$room_type,$cost_val,$status_val,$meals_val);
				}
			  }
		
//		include('XMLParser.class.php');
//		
//		//Set up the parser object
//		$parser = new XMLParser($data2);
//		//Work the magic...
//		$parser->Parse();
//		$apiData = array();
//		$rows=0;
//		
//  if(isset($parser->document->responsedetails[0]->searchhotelpriceresponse[0]->hoteldetails[0]->hotel))
//  {
//			foreach($parser->document->responsedetails[0]->searchhotelpriceresponse[0]->hoteldetails[0]->hotel as $hotels)
//			{
//				$org_city=$hotels->city[0]->tagData;
//				//echo $org_city;exit;
//				$code = $hotels->item[0]->tagAttrs['code'];
//				$cols = 0;
//				
//				foreach($hotels->roomcategories[0]->tagChildren as $roomcategory)
//				{
//					/*$apiData[$rows][$cols]['hotel_code'] = $code;
//					$apiData[$rows][$cols]['room_code'] = $roomcategory->tagAttrs['id'];
//					$apiData[$rows][$cols]['total_cost'] = $roomcategory->itemprice[0]->tagData;
//					$apiData[$rows][$cols]['status'] = $roomcategory->confirmation[0]->tagData;
//					$apiData[$rows][$cols]['inclusion'] = $roomcategory->meals[0]->basis[0]->tagData;
//					$apiData[$rows][$cols]['room_type'] = $roomcategory->description[0]->tagData;
//					$cols++;*/
//					$sec_res=$_SESSION['ses_id'];
//					$adult =  $_SESSION['adult_count'];
//					$child =  $_SESSION['child_count'];
//					
//					 $currencyv1 = $roomcategory->itemprice[0]->tagAttrs['currency'];
//											 if($currencyv1 !='USD')
//											 {
//												 $c_val1 =$this->B2b_Hotel_Model->get_currecy_detail($currencyv1);
//												 $c_val = $c_val1->value;
//												 $org_amt=$roomcategory->itemprice[0]->tagData;
//											
//											$amountv = $roomcategory->itemprice[0]->tagData *  $c_val;
//											 }
//											 else
//											 {
//												 $c_val =1; 
//												 $org_amt=$roomcategory->itemprice[0]->tagData;
//												
//												$amountv = 0;
//											 }
//											
//											$amountv1 = $amountv +$roomcategory->itemprice[0]->tagData;
//											
//											//$contry = $this->B2b_Hotel_Model->get_country($_SESSION['city']);
//											$markup =  $this->B2b_Hotel_Model->get_markup_detail('gta');
//											$pay_charge = 0;
//											//echo $markup;exit;
//											/*$amountv2 = ($markup /100);
//											$amountv2pay = ($pay_charge /100);
//											$amountv3 = $amountv2*$amountv1;
//												
//											$amountv3pay = $amountv2pay*$amountv1;
//												
//											$amountv4 = $amountv3+$amountv1+$amountv3pay;*/
//																						
//											$amountv2 = ($markup /100);
//											$amountv3 = $amountv2*$amountv1;
//											$amountv4 = $amountv3+$amountv1;
//											
//											$amountv2pay = ($pay_charge /100);
//											$amountv3pay = $amountv2pay*$amountv4;
//
//												
//		//echo $amountv3.' '.$amountv1.' '.$amountv3pay.' '.$roomcategory->itemprice[0]->tagData;
//
//					$this->B2b_Hotel_Model->insert_gta_temp_result($sec_res,'gta',$code,$roomcategory->tagAttrs['id'],$roomcategory->description[0]->tagData,$amountv4,$roomcategory->confirmation[0]->tagData,$roomcategory->meals[0]->basis[0]->tagData,$adult,$child,$amountv3,$org_amt,$currencyv1,$c_val,$amountv3pay,$org_city);
//				}
//				$rows++;
//				
//				
//					
//			}
//  }
//	
		
		}
		
	
	}
	
	function crs_hotel_availabilty()
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
		$where = '';
		
		if($sb_room_cnt > 0)
			{
				$where .='AND mm.adult = 1 AND mm.child=0';
			}
			if($db_room_cnt > 0)
			{
				$where .='AND mm.adult = 2 AND mm.child=0';
			}
			if($q_room_cnt > 0)
			{
				$where .='AND mm.adult = 4 AND mm.child=0';
			}
			if($tb_room_cnt > 0)
			{
				$where .='AND mm.adult = 3 AND mm.child=0';
			}
			if($dbc_room_cnt > 0)
			{
				$where .='AND mm.adult = 2 AND mm.child=1';
			}
			if($dbcc_room_cnt > 0)
			{
				$where .='AND mm.adult = 2 AND mm.child=2';
			}
			$where .=" AND sh.city ='".$_SESSION['city']."'";	
			
			$where .=" AND mm.date BETWEEN '".$cin."' AND '".$cout."'";	
					


		/*$select = "SELECT mm.hotel_id, mm.rate, mm.status, sh.sup_hotel_id, sh.crs_id, srt.hotel_id, srt.sup_rate_tactics_id, srt.rate_plan_name, srt.rate_of_room_plan, sct.sup_inv_cate_type_id, sct.hotel_id , sct.room_type 
							FROM sup_apart_maintain_month mm 
							LEFT JOIN sup_hotels sh ON mm.hotel_id = sh.sup_hotel_id 
							LEFT JOIN sup_rate_tactics srt ON sh.sup_hotel_id = srt.hotel_id
							LEFT JOIN sup_inv_cate_type sct ON srt.rate_of_room_plan = sct.sup_inv_cate_type_id  
							WHERE mm.status = 1 $where group by srt.sup_rate_tactics_id"; //exit;*/
							
		 echo	$select = "SELECT count(*) as value, mm.sup_apart_maintain_month_id, mm.sup_rate_tactics_id, mm.hotel_id, mm.rate as cost_val, mm.adult, mm.child, mm.status, sh.sup_hotel_id, sh.hotel_name, sh.star, srt.sup_rate_tactics_id as srt_rate_tactis_id, srt.category_type, sct.room_type
							FROM sup_apart_maintain_month mm 
							INNER JOIN sup_hotels sh ON mm.hotel_id = sh.sup_hotel_id
							INNER JOIN sup_rate_tactics srt ON mm.sup_rate_tactics_id = srt.sup_rate_tactics_id
							INNER JOIN sup_inv_cate_type sct ON srt.category_type = sct.sup_inv_cate_type_id
							WHERE
							mm.status = 1 $where GROUP BY mm.hotel_id ORDER BY cost_val ASC"; exit;
					
 		$query=$this->db->query($select);
		 
		if ($query->num_rows() > 0)
		{
		   $datas = $query->result();
		   for($i=0;$i< count($datas);$i++)
		   {
			   
			  $currencyv1='USD';
			  $cost_val = $datas[$i]->rate * $_SESSION['days'];
			  $api="crs";
			
				$sec_res=$_SESSION['ses_id'];
					if($currencyv1 !='USD')
					{
						$c_val1 =$this->Hotel_Model->get_currecy_detail($currencyv1);
						$c_val = $c_val1->value;
						$org_amt=$cost_val;
						$amountv = $cost_val /  $c_val;
					}
					else
					{
						$c_val =1; 
						$org_amt=$cost_val;
						$amountv = $cost_val;
					}
					$amountv1 = $amountv;
											
					$contry = $this->Hotel_Model->get_country($_SESSION['city']);
					$markup =  $this->Hotel_Model->get_markup_detail('crs',$contry);
					$pay_charge = $this->Hotel_Model->get_payment_charge();
					$amountv2 = ($markup /100);
					$amountv3 = $amountv2*$amountv1;
					$amountv4 = $amountv3+$amountv1;
					
					$amountv2pay = ($pay_charge /100);
					$amountv3pay = $amountv2pay*$amountv4;
					$adult =  $_SESSION['adult_count'];
					$child =  $_SESSION['child_count'];
					$itemCode=$datas[$i]->crs_id;
					$room_code=$datas[$i]->sup_rate_tactics_id;
					$room_type=$datas[$i]->room_type.'-'.$datas[$i]->rate_plan_name;
					$status_val='Available';
					$meals_val='Include';
					$dd = $_SESSION['city'];

					$this->Hotel_Model->insert_gta_temp_result($sec_res,'crs',$itemCode,$room_code,$room_type,$amountv4,$status_val,$meals_val,$adult,$child,$amountv3,$org_amt,$currencyv1,$c_val,$amountv3pay,$dd);
								
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
	function mapping_fun($id)
	{
		$data['result_id']=$id;
		$data['result']=$this->Hotel_Model->fetch_search_result_map_new_select($id);
		
		$this->load->view('hotel/map',$data);
		
	}
	function mapping_fun_all()
	{
		$data['result']=$this->Hotel_Model->fetch_search_result_map_new_select_session();
		$this->load->view('hotel/map_all',$data);
		
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
			set_time_limit(0);
		$gta = $this->Hotel_Model->get_city();
		
		for($i=0;$i< count($gta);$i++)
		{
		$citycode = $gta[$i]->cityCode;
	
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
				$img = 'E:/csv/gta_image/'.$itemCode.'.jpg';
				$img1 =$itemCode.'.jpg';
				@file_put_contents($img, file_get_contents($Image_val));
			}
			
			$Chainval='';
			echo $i.' - '.$citycode."<br>";
				$this->Hotel_Model->dummy_insert_permenant_result_pro($itemCode,$itemVal,$City_val,$star,$report_value,$location_value,$lati,$longi,$api,$address,$tel_val,$fax_val,$Chainval);
			
			    }
				
		}
		 
		
		
		}
          
	
	}
	public function fetch_map_data() 
	{
	
	
		$data = $this->Hotel_Model->fetch_search_result_map($_SESSION['ses_id']);



echo '[';
for($k=0;$k< count($data['result']);$k++)
{


$latitude=$data['result'][$k]->latitude;
$longitude=$data['result'][$k]->longitude;
$hotel_name=$data['result'][$k]->hotel_name;
$amount=$data['result'][$k]->low_cost;
$star=$data['result'][$k]->star;

if($star==1)
{
$st ="<img src='".WEB_DIR."images/1 star.jpg' />";
}
elseif($star==2)
{
$st ="<img src='".WEB_DIR."images/2 star.jpg' />";
}
elseif($star==3)
{
$st ="<img src='".WEB_DIR."images/3 star.jpg' />";
}
elseif($star==4)
{
$st ="<img src='".WEB_DIR."images/4 star.jpg' />";
}
elseif($star==5)
{
$st ="<img src='".WEB_DIR."images/5 star.jpg' />";
}
else
{
$st ="<img src='".WEB_DIR."images/0 star copy.jpg' />";

}

$info= "<div id='mapdetailsbox2'><div id='imgbox2'><img src='https://www.miki.co.uk/live/hotel/mikiNet/image/v1.0/GB/20504/5/lr/ext456.jpg'  width='70px' height='70px' /></div><div id='hotelname2'>".$hotel_name."</div><div id='star2'> ".$st." </div> <div id='avalabletxt2'> Avalable From</div><div id='doller2'>USD&nbsp;".$amount."</div><div id='pernight2'> Per Night</div><div style='clear:both'></div></div>";
echo '{lat:'.$latitude.',lng:'.$longitude.',name:"'.$hotel_name.'",info:"'.$info.'"},'; 
}

echo ']';

//echo json_encode($data['result']);
	}
	function yuvi_email()
	{
		$data['gta'] = $this->Hotel_Model->get_city();
		
		
		//$citycode = $gta[$i]->cityCode;
		$this->load->view('yuvi_email',$data);
	}
	function gta_table_london()
	{
		
		$city_code = $_POST['cityval'];
	
		//print_r($city_val);exit;
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
									<ItemDestination DestinationType="city" DestinationCode="'.$city_code.'" />
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
							<ItemDestination DestinationType="city" DestinationCode="'.$city_code.'" />
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
				$EmailAddress=$dom3->getElementsByTagName("EmailAddress");
				$EmailAddressval='';
				
				foreach($EmailAddress as $ddd)
				{
				$EmailAddressval=$EmailAddress->item(0)->nodeValue;
				}
				
				$this->Hotel_Model->dummy_gta_email($EmailAddressval);
			
			    }
				
				
				redirect('hotel/yuvi_emailsuccess','refresh');
		}
	
          
	
	}
	function yuvi_emailsuccess()
	{
	$this->load->view('yuvi_email1');	
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

	     $hotel=$this->Hotel_Model->get_hotelbed_hotel();
		// echo "<pre/>";
		// print_r($hotel);exit;
		// $hotel=$this->Hotel_Model->dummy_get_hotelbed_hotel_by_id($hotelcode);
		 $hotel_count = count($hotel);
		for($l=0;$l< $hotel_count;$l++)
		 {
			
			  $hotelcode = $hotel[$l]->HOTELCODE;
			 $hotel_lisd=$this->Hotel_Model->dummy_get_hotelbed_hotel_by_id($hotelcode);
			 $ADDRESS = mysql_escape_string($hotel_lisd->ADDRESS);
			 // $POSTALCODE = mysql_escape_string($hotel_lisd->POSTALCODE	);
			 // $CITY = mysql_escape_string($hotel_lisd->CITY);
			 // $EMAIL = mysql_escape_string($hotel_lisd->EMAIL);
			 // $WEB = mysql_escape_string($hotel_lisd->WEB);
				
			$this->Hotel_Model->malar($hotelcode,$ADDRESS);
			
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
	<User>HTLEXPLORAE64882</User>
    <Password>HTLEXPLORAE64882</Password>
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
		//echo $sd;exit;
		$room_count=$_SESSION['room_count'];
		$ed=$_SESSION['ed'];
		$city_val = $this->Hotel_Model->get_city_code($city);  
		$city_code = $city_val->hotelspro;
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
	$_SESSION['pro_search_id'] ='';
	// $client = new SoapClient("b2bHotelSOAP.wsdl", array('trace' => 1));
  $client = new SoapClient( "http://api.hotelspro.com/4.1_test/hotel/b2bHotelSOAP.wsdl", array('trace' => 1, 'compression' => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP));
  try {
       
					
	   /* $rooms[] = array(array("paxType" => "Adult"),array("paxType" => "Adult"));
		  $rooms[] = array(array("paxType" => "Adult"),array("paxType" => "Adult"),array("paxType" => "Adult"));*/
  
      $filters = array();
    //  $filters[] = array("filterType" => "hotelStar", "filterValue" => "3");
	   //   $filters[] = array("filterType" => "hotelName", "filterValue" => "Osterley Park Hotel");
   $filters[] = array("filterType" => "resultLimit", "filterValue" => "400");
      
      // make getAvailableHotel request (start search)
      $checkAvailability = $client->getAvailableHotel("TldsVFh3MEpXSnEwVWRSOHJWTGgzVlBzVDE5SHQzSDBwUm5SSmtQNUNXdmR0UXlPdGR5YUlRSkFtWDhocmk2Qg==", $city_code, $cin, $cout, "USD", "US", "false", $rooms, $filters);
  }
  catch (SoapFault $exception) {
      echo $exception->getMessage();
      exit;
  }	
 
	  $_SESSION['pro_search_id'] =  $checkAvailability->searchId;
  if (is_object($checkAvailability->availableHotels)) 
  {
      $hotelResponse[] = $checkAvailability->availableHotels;
  }
  else 
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
		 $totalRoomRate=array_sum($totalcost_m_m_ddn);
	
        

      $sec_res=$_SESSION['ses_id'];
	  $adult =  $_SESSION['adult_count'];
					$child =  $_SESSION['child_count'];
					
					 $currencyv1 = $currency;
											 if($currencyv1 !='USD')
											 {
												 $c_val1 =$this->Hotel_Model->get_currecy_detail($currencyv1);
												 $c_val = $c_val1->value;
												 $org_amt=$totalRoomRate;
											
											$amountv = $totalRoomRate /  $c_val;
											 }
											 else
											 {
												 $c_val =1; 
												 $org_amt=$totalRoomRate;
												
												$amountv = $totalRoomRate;
											 }
											
											$amountv1 = $amountv ;
											
											$contry = $this->Hotel_Model->get_country($_SESSION['city']);
											$markup =  $this->Hotel_Model->get_markup_detail('hotelspro',$contry);
											$pay_charge = $this->Hotel_Model->get_payment_charge();
											
											/*$amountv2 = ($markup /100);
											$amountv2pay = ($pay_charge /100);
											$amountv3 = $amountv2*$amountv1;
												
											$amountv3pay = $amountv2pay*$amountv1;
												
											$amountv4 = $amountv3+$amountv1+$amountv3pay;*/
																						
											$amountv2 = ($markup /100);
											$amountv3 = $amountv2*$amountv1;
											$amountv4 = $amountv3+$amountv1;
											
											$amountv2pay = ($pay_charge /100);
											$amountv3pay = $amountv2pay*$amountv4;
$city_name = $this->Hotel_Model->get_city_code_id($_SESSION['city']);
											
				$this->Hotel_Model->insert_gta_temp_result($sec_res,'hotelspro',$hotelCode,$processId,$roomtype,$amountv4,$availabilityStatus,$boardType,$adult,$child,$amountv3,$org_amt,$currencyv1,$c_val,$amountv3pay,$city_name->city_name);   
			//	$this->Hotel_Model->insert_gta_temp_result($sec_res,'gta',$code,$roomcategory->tagAttrs['id'],$roomcategory->description[0]->tagData,$amountv4,$roomcategory->confirmation[0]->tagData,$roomcategory->meals[0]->basis[0]->tagData,$adult,$child,$amountv3,$org_amt,$currencyv1,$c_val,$amountv3pay);
		
						 
  
    }
  
  
  
	}
	function hotelsbed_hotel_availabilty_pre()
	{
		$room_used_type=$_SESSION['room_used_type'];
		$city=$_SESSION['city'];
		$sd=$_SESSION['sd'];
		$room_count=$_SESSION['room_count'];
		$ed=$_SESSION['ed'];
		$city_val = $this->Hotel_Model->get_city_code($city);  
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
$dbc_age=array();
$dbcc_age=array();
$c_age=$_SESSION['child_age'];
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
if($dbc_room_cnt==1)
				{
				$dbc_age =array($c_age[0]);
				}
				if($dbc_room_cnt==2)
				{
				$dbc_age =array($c_age[0],$c_age[3]);
				}
				if($dbc_room_cnt==3)
				{
				$dbc_age =array($c_age[0],$c_age[3],$c_age[6]);
				}
	            if($dbcc_room_cnt==1)
				{
				$dbcc_age =array($c_age[0],$c_age[1]);
				}
				if($dbcc_room_cnt==2)
				{
				$dbcc_age =array($c_age[0],$c_age[1],$c_age[3],$c_age[4]);
				}
				if($dbcc_room_cnt==3)
				{
				$dbcc_age =array($c_age[0],$c_age[1],$c_age[3],$c_age[4],$c_age[6],$c_age[7]);
				}

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
									$room1.='<Age>'.$dbc_age[0].'</Age>';
								}
								else if($dbc_room_cnt==2)
								{
									$room1.='<Age>'.$dbc_age[0].'</Age>';
									$room1.='<Age>'.$dbc_age[1].'</Age>';
								}
								else if($dbc_room_cnt==3)
								{
									$room1.='<Age>'.$dbc_age[0].'</Age>';
									$room1.='<Age>'.$dbc_age[1].'</Age>';
									$room1.='<Age>'.$dbc_age[2].'</Age>';
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
											<Age>'.$dbc_age[0].'</Age>
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
												<Age>'.$dbc_age[0].'</Age>
											</Customer>
											<Customer type = "CH">
												<Age>'.$dbc_age[1].'</Age>
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
													<Age>'.$dbc_age[0].'</Age>
													</Customer>
												<Customer type = "CH">
													<Age>'.$dbc_age[1].'</Age>
													</Customer>
												<Customer type = "CH">
													<Age>'.$dbc_age[2].'</Age>
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
				$room1.='<Age>'.$dbcc_age[0].'</Age>';
				$room1.='<Age>'.$dbcc_age[1].'</Age>';
			}
			else if($dbcc_room_cnt==2)
			{
				$room1.='<Age>'.$dbcc_age[0].'</Age>';
				$room1.='<Age>'.$dbcc_age[1].'</Age>';
				$room1.='<Age>'.$dbcc_age[2].'</Age>';
				$room1.='<Age>'.$dbcc_age[3].'</Age>';
			}
			else if($dbcc_room_cnt==3)
			{
				$room1.='<Age>'.$dbcc_age[0].'</Age>';
				$room1.='<Age>'.$dbcc_age[1].'</Age>';
				$room1.='<Age>'.$dbcc_age[2].'</Age>';
				$room1.='<Age>'.$dbcc_age[3].'</Age>';
				$room1.='<Age>'.$dbcc_age[4].'</Age>';
				$room1.='<Age>'.$dbcc_age[5].'</Age>';
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
							<Age>'.$dbcc_age[0].'</Age>
						</Customer>
						<Customer type = "CH">
							<Age>'.$dbcc_age[1].'</Age>
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
							<Age>'.$dbcc_age[0].'</Age>
						</Customer>
						<Customer type = "CH">
							<Age>'.$dbcc_age[1].'</Age>
						</Customer>
						<Customer type = "CH">
								<Age>'.$dbcc_age[2].'</Age>
							</Customer>
							<Customer type = "CH">
								<Age>'.$dbcc_age[3].'</Age>
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
								<Age>'.$dbcc_age[0].'</Age>
								</Customer>
							<Customer type = "CH">
								<Age>'.$dbcc_age[1].'</Age>
								</Customer>

							<Customer type = "CH">
								<Age>'.$dbcc_age[2].'</Age>
							</Customer>
							<Customer type = "CH">
								<Age>'.$dbcc_age[3].'</Age>
							</Customer>
							<Customer type = "CH">
								<Age>'.$dbcc_age[4].'</Age>
							</Customer>
							<Customer type = "CH">
								<Age>'.$dbcc_age[5].'</Age>
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
	<User>HTLEXPLORAE64882</User>
    <Password>HTLEXPLORAE64882</Password>
	</Credentials>
	<PaginationData itemsPerPage="30" pageNumber="1"/>
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
			//$array=$this->xml2ary($xmls);
			
				//	echo '<pre/>';
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
								$org_city='';
							foreach($destCode as $destCodeddddd)
							 	{
								$destCodeaaaa=$destCodeddddd->getElementsByTagName("Name");
								$org_city=$destCodeaaaa->item(0)->nodeValue;
								}	 
					    	$currencyv1=$currency->item(0)->getAttribute("code");
					       // echo $currencyva1;exit;
							$contract=$val->getElementsByTagName("Contract");
										
								foreach($contract as $contractval)
							 	{
								$contractname=$contractval->getElementsByTagName("Name");
								$contractnameVal=$contractname->item(0)->nodeValue;
								}
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
					  
						  }
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
											// echo $currencyv1;exit;
											 if($currencyv1 !='USD')
											 {
												 $c_val1 =$this->Hotel_Model->get_currecy_detail($currencyv1);
												
												 $c_val = $c_val1->value;
												 if($c_val !='')
												 {
												 $org_amt=$amount->item(0)->nodeValue;
												 $amountv = $amount->item(0)->nodeValue /  $c_val;
												 }
												 else
												 {
													  $c_val =1; 
													 $org_amt=$amount->item(0)->nodeValue;
													$amountv = $amount->item(0)->nodeValue;
												
												 }
											 }
											 else
											 {
												 $c_val =1;
												 $org_amt=$amount->item(0)->nodeValue;
											$amountv =  $amount->item(0)->nodeValue; 
											 }
											//$org_amt=$amount->item(0)->nodeValue;
											//amountv = $amount->item(0)->nodeValue *  $c_val;
											$amountv1 = $amountv ;
											
											$contry = $this->Hotel_Model->get_country($_SESSION['city']);
											$markup =  $this->Hotel_Model->get_markup_detail('hotelsbed',$contry);
											$pay_charge = $this->Hotel_Model->get_payment_charge();
											/*$amountv2 = ($markup /100);
											$amountv2pay = ($pay_charge /100);
											$amountv3 = $amountv2*$amountv1;
											$amountv3pay = $amountv2pay*$amountv1;
											$amountv4 = $amountv3+$amountv1+$amountv3pay;*/
																						
											$amountv2 = ($markup /100);
											$amountv3 = $amountv2*$amountv1;
											$amountv4 = $amountv3+$amountv1;
											
											$amountv2pay = ($pay_charge /100);
											$amountv3pay = $amountv2pay*$amountv4;
									
  				 	$sec_res=$_SESSION['ses_id'];
					$this->Hotel_Model->insert_hotelsbed_temp_result($sec_res,'hotelsbed',$codev1,$roomTypeVal,$roomv1,$amountv4,'Available',$boardv1,$shruiVal,$charVal,$adult,$child,$boardTypeVal,$token,$incode,$inoffcode,$contractnameVal,$destCodeVal,$shortname,$RoomCountval,$amountv3,$org_amt,$currencyv1,$c_val,$amountv3pay,$org_city);  						   
														   
										$j++;
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
		$city_val = $this->Hotel_Model->get_city_code($city);  
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
$dbc_age=array();
$dbcc_age=array();
$c_age=$_SESSION['child_age'];
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
if($dbc_room_cnt==1)
				{
				$dbc_age =array($c_age[0]);
				}
				if($dbc_room_cnt==2)
				{
				$dbc_age =array($c_age[0],$c_age[3]);
				}
				if($dbc_room_cnt==3)
				{
				$dbc_age =array($c_age[0],$c_age[3],$c_age[6]);
				}
	            if($dbcc_room_cnt==1)
				{
				$dbcc_age =array($c_age[0],$c_age[1]);
				}
				if($dbcc_room_cnt==2)
				{
				$dbcc_age =array($c_age[0],$c_age[1],$c_age[3],$c_age[4]);
				}
				if($dbcc_room_cnt==3)
				{
				$dbcc_age =array($c_age[0],$c_age[1],$c_age[3],$c_age[4],$c_age[6],$c_age[7]);
				}

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
									$room1.='<Age>'.$dbc_age[0].'</Age>';
								}
								else if($dbc_room_cnt==2)
								{
									$room1.='<Age>'.$dbc_age[0].'</Age>';
									$room1.='<Age>'.$dbc_age[1].'</Age>';
								}
								else if($dbc_room_cnt==3)
								{
									$room1.='<Age>'.$dbc_age[0].'</Age>';
									$room1.='<Age>'.$dbc_age[1].'</Age>';
									$room1.='<Age>'.$dbc_age[2].'</Age>';
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
											<Age>'.$dbc_age[0].'</Age>
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
												<Age>'.$dbc_age[0].'</Age>
											</Customer>
											<Customer type = "CH">
												<Age>'.$dbc_age[1].'</Age>
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
													<Age>'.$dbc_age[0].'</Age>
													</Customer>
												<Customer type = "CH">
													<Age>'.$dbc_age[1].'</Age>
													</Customer>
												<Customer type = "CH">
													<Age>'.$dbc_age[2].'</Age>
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
				$room1.='<Age>'.$dbcc_age[0].'</Age>';
				$room1.='<Age>'.$dbcc_age[1].'</Age>';
			}
			else if($dbcc_room_cnt==2)
			{
				$room1.='<Age>'.$dbcc_age[0].'</Age>';
				$room1.='<Age>'.$dbcc_age[1].'</Age>';
				$room1.='<Age>'.$dbcc_age[2].'</Age>';
				$room1.='<Age>'.$dbcc_age[3].'</Age>';
			}
			else if($dbcc_room_cnt==3)
			{
				$room1.='<Age>'.$dbcc_age[0].'</Age>';
				$room1.='<Age>'.$dbcc_age[1].'</Age>';
				$room1.='<Age>'.$dbcc_age[2].'</Age>';
				$room1.='<Age>'.$dbcc_age[3].'</Age>';
				$room1.='<Age>'.$dbcc_age[4].'</Age>';
				$room1.='<Age>'.$dbcc_age[5].'</Age>';
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
							<Age>'.$dbcc_age[0].'</Age>
						</Customer>
						<Customer type = "CH">
							<Age>'.$dbcc_age[1].'</Age>
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
							<Age>'.$dbcc_age[0].'</Age>
						</Customer>
						<Customer type = "CH">
							<Age>'.$dbcc_age[1].'</Age>
						</Customer>
						<Customer type = "CH">
								<Age>'.$dbcc_age[2].'</Age>
							</Customer>
							<Customer type = "CH">
								<Age>'.$dbcc_age[3].'</Age>
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
								<Age>'.$dbcc_age[0].'</Age>
								</Customer>
							<Customer type = "CH">
								<Age>'.$dbcc_age[1].'</Age>
								</Customer>

							<Customer type = "CH">
								<Age>'.$dbcc_age[2].'</Age>
							</Customer>
							<Customer type = "CH">
								<Age>'.$dbcc_age[3].'</Age>
							</Customer>
							<Customer type = "CH">
								<Age>'.$dbcc_age[4].'</Age>
							</Customer>
							<Customer type = "CH">
								<Age>'.$dbcc_age[5].'</Age>
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
	<User>HTLEXPLORAE64882</User>
    <Password>HTLEXPLORAE64882</Password>
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
		//	$array=$this->xml2ary($xmls);
			
				//	echo '<pre/>';
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
					        $org_city='';
							foreach($destCode as $destCodeddddd)
							 	{
								$destCodeaaaa=$destCodeddddd->getElementsByTagName("Name");
								$org_city=$destCodeaaaa->item(0)->nodeValue;
								}
							$contract=$val->getElementsByTagName("Contract");
										
								foreach($contract as $contractval)
							 	{
								$contractname=$contractval->getElementsByTagName("Name");
								$contractnameVal=$contractname->item(0)->nodeValue;
								}
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
					  
						  }
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
											 
											 if($currencyv1 !='USD')
											 {
												 $c_val1 =$this->Hotel_Model->get_currecy_detail($currencyv1);
												 $c_val = $c_val1->value;
												 if($c_val !='')
												 {
												 $org_amt=$amount->item(0)->nodeValue;
												 $amountv = $amount->item(0)->nodeValue /  $c_val;
												 }
												 else
												 {
													  $c_val =1; 
													 $org_amt=$amount->item(0)->nodeValue;
													$amountv = $amount->item(0)->nodeValue;
												
												 }
											
											 }
											 else
											 {
												 $c_val =1; 
												 $org_amt=$amount->item(0)->nodeValue;
											$amountv =$amount->item(0)->nodeValue;
											
											 }
											$amountv1 = $amountv ;
											
											$contry = $this->Hotel_Model->get_country($_SESSION['city']);
											$markup =  $this->Hotel_Model->get_markup_detail('hotelsbed',$contry);
											$pay_charge = $this->Hotel_Model->get_payment_charge();
											
											$amountv2 = ($markup /100);
											$amountv3 = $amountv2*$amountv1;
											$amountv4 = $amountv3+$amountv1;
											
											$amountv2pay = ($pay_charge /100);
											$amountv3pay = $amountv2pay*$amountv4;
									
  				 	$sec_res=$_SESSION['ses_id'];
					$this->Hotel_Model->insert_hotelsbed_temp_result($sec_res,'hotelsbed',$codev1,$roomTypeVal,$roomv1,$amountv4,'Available',$boardv1,$shruiVal,$charVal,$adult,$child,$boardTypeVal,$token,$incode,$inoffcode,$contractnameVal,$destCodeVal,$shortname,$RoomCountval,$amountv3,$org_amt,$currencyv1,$c_val,$amountv3pay,$org_city);  						   
														   
										$j++;
										}				  	
												
							
						$i++;	  
					  }  
  		
		}
	}
	
	function travco_hotel_availabilty()
	{
		$room_used_type=$_SESSION['room_used_type'];
		$city=$_SESSION['city'];
		$sd=$_SESSION['sd'];
		$room_count=$_SESSION['room_count'];
		$ed=$_SESSION['ed'];
		$city_val = $this->Hotel_Model->get_city_code($city);  
		$city_code = $city_val->travco;
		$con_code = $city_val->trav_con_code;
		          
		$in = explode("-",$sd);
		 switch($in[1])
					{
					case '01':
					$checkin=$in[0]."/"."Jan"."/".$in[2];
					break;
					case '02':
					$checkin=$in[0]."/"."Feb"."/".$in[2];
					break;
					case '03':
					$checkin=$in[0]."/"."Mar"."/".$in[2];
					break;
					case '04':
					$checkin=$in[0]."/"."Apr"."/".$in[2];
					break;
					case '05':
					$checkin=$in[0]."/"."May"."/".$in[2];
					break;
					case '06':
					$checkin=$in[0]."/"."Jun"."/".$in[2];
					break;
					case '07':
					$checkin=$in[0]."/"."Jul"."/".$in[2];
					break;
					case '08':
					$checkin=$in[0]."/"."Aug"."/".$in[2];
					break;
					case '09':
					$checkin=$in[0]."/"."Sep"."/".$in[2];
					break;
					case '10':
					$checkin=$in[0]."/"."Oct"."/".$in[2];
					break;
					case '11':
					$checkin=$in[0]."/"."Nov"."/".$in[2];
					break;
					case '12':
					$checkin=$in[0]."/"."Dec"."/".$in[2];
					break;
					}
		$cin = $checkin;
		$out = explode("-",$ed);
	              


					switch($out[1])
					{
					case '01':
					$checkout=$out[0]."/"."Jan"."/".$out[2];
					break;
					case '02':
					$checkout=$out[0]."/"."Feb"."/".$out[2];
					break;
					case '03':
					$checkout=$out[0]."/"."Mar"."/".$out[2];
					break;
					case '04':
					$checkout=$out[0]."/"."Apr"."/".$out[2];
					break;
					case '05':
					$checkout=$out[0]."/"."May"."/".$out[2];
					break;
					case '06':
					$checkout=$out[0]."/"."Jun"."/".$out[2];
					break;
					case '07':
					$checkout=$out[0]."/"."Jul"."/".$out[2];
					break;
					case '08':
					$checkout=$out[0]."/"."Aug"."/".$out[2];
					break;
					case '09':
					$checkout=$out[0]."/"."Sep"."/".$out[2];
					break;
					case '10':
					$checkout=$out[0]."/"."Oct"."/".$out[2];
					break;
					case '11':
					$checkout=$out[0]."/"."Nov"."/".$out[2];
					break;
					case '12':
					$checkout=$out[0]."/"."Dec"."/".$out[2];
					break;
					}
		$cout = $checkout;
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
		//echo $dbcc_room_cnt;exit;
		//for($i=0;$i< $count;$i++)
		//{
        $room_trav='';
	    if($sb_room_cnt>0)
			{
				$roomCode = 'SB';

				$room_trav.="SINGLE_ROOMS='".$sb_room_cnt."'".' ';
				$travco_roomcode='SWB';
			}
			if($db_room_cnt >0)
			{
				$roomCode = 'DB'; //'db';

				$room_trav.="DOUBLE_ROOMS='".$db_room_cnt ."'".' ';
				$travco_roomcode='DWB';
				$double='DWB';
			}

			if($tb_room_cnt>0)
			{
				$roomCode = 'TR'; //'db';
				$room_trav.="TRIPLE_ROOMS='".$tb_room_cnt."'".' ';
				$travco_roomcode='TRP';
			}
			if($dbc_room_cnt >0)
			{
				$roomCode = 'DB'; //'db';
				if($dbc_room_cnt=='3')
				{
					$room_trav.="DOUBLE_ROOMS='1' DOUBLE_EXTRA_BEDS='3'".' ';
				}
				if($dbc_room_cnt=='2')
				{
					$room_trav.="DOUBLE_ROOMS='1' DOUBLE_EXTRA_BEDS='2'".' ';
				}else{
					$room_trav.="DOUBLE_ROOMS='1' DOUBLE_EXTRA_BEDS='1'".' ';
				}
				$travco_roomcode='DWB';
				$double='DWB';
			}
			if($dbcc_room_cnt >0)
			{
				//echo 'sds';exit;
				$roomCode = 'TB'; //'db';
				if($dbcc_room_cnt=='2')
				{
					$room_trav.="DOUBLE_ROOMS='1' DOUBLE_EXTRA_BEDS='2'".' ';
				}else{
					$room_trav.="DOUBLE_ROOMS='1' DOUBLE_EXTRA_BEDS='1'".' ';
				}
				$travco_roomcode='TWB';
				$twin='TWB';
			}
		//$roomtype[]=$roomCode;
        if($city_code !='')
		{
          //  $agentcode='133YZA'; //live
			//$agentpwd='250112XIAE'; //live
			////URL = "http://xmlv6.travco.co.uk/trlink/link1/trlink";//live
			//name_space = 'http://xmlv6.travco.co.uk/trlink/link1/trlink';//live
			
			 $agentcode='133YZA'; //live
			$agentpwd='130611YZ31'; //live
			   $URL ="http://xmlv5test.travco.co.uk/trlink/link1/trlink";
			$name_space = 'http://xmlv5test.travco.co.uk/trlink/schema/HotelAvailabilityV6Snd.xsd';//live
			
			
$xml_data="<?xml version='1.0' encoding='UTF-8' ?>
<BOOKING type='HA' lang='en-GB'  returnURLNeed='no' returnURL='http://' AGENTCODE='".$agentcode."' AGENTPASSWORD='".$agentpwd."' AVAILABLE_HOTELS_ONLY='NO' xmlns:xsi='http://www.w3.org/2001/XMLSchema-instance' xsi:noNamespaceSchemaLocation='".$name_space."'>
<DATA COUNTRY_CODE='".$con_code."' CITY_CODE='".$city_code."'>
<ROOMS_DATA ".$room_trav."/>
<DATE_DATA CHECK_IN_DATE='".$cin."' CHECK_OUT_DATE='".$cout."'/>
<OPTIONAL_DATA NeedReductionAmount='NO' NeedHotelMessages='NO' NeedFreeNightDetails='NO' SortingOrder='Low'/>
<ADDITIONAL_DATA PICTURE_NEED='YES' AMENITY_NEED='NO' HOTEL_ADDRESS_NEED='NO' TELEPHONE_NO_NEED='NO' FAX_NO_NEED='NO' EMAIL_NEED='NO' HotelDescription='NO' HotelCity='NO' HotelProperties='NO' HotelArrivalPointOther='NO' HotelArrivalPoint='NO' GeoCodes='NO' Location='NO' CityArea='NO' EnglishTextNeed='NO'/>
</DATA>
</BOOKING>";

//echo $xml_data; 
//$URL = "http://xmlv6.travco.co.uk/trlink/link1/trlink";//live
//$URL ="http://xmlv5test2.travco.co.uk/trlink/link1/trlink";//test
		$ch = curl_init($URL);
		//curl_setopt($ch, CURLOPT_MUTE, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml'));
		curl_setopt($ch, CURLOPT_POSTFIELDS, $xml_data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$xml = curl_exec($ch);
		curl_close($ch);
		
		//echo $xml;exit;
					 $dom = new DOMDocument();
					 $dom->loadXML($xml); 
					 $CITY_NAME=$dom->getElementsByTagName("CITY_NAME");
					   $CITY_NAMEval=$CITY_NAME->item(0)->nodeValue;  
				  $hotelInfo=$dom->getElementsByTagName("HOTEL_DATA");
				  
				//echo count($hotelInfo); exit();
				$j=0;
				foreach($hotelInfo as $hotelVal)
				{
					$hotelCode=$hotelInfo->item($j)->getAttribute("HOTEL_CODE");
					$STATUS=$hotelInfo->item($j)->getAttribute("STATUS");
					$CURRENCY_CODE=$hotelInfo->item($j)->getAttribute("CURRENCY_CODE");
					
					$roomData=$hotelVal->getElementsByTagName("ROOM_DATA");
				    $k=0;
					foreach($roomData as $roomVal)
					{
						//$totalprice_c=0;
                        $totalprice=$roomData->item($k)->getAttribute("TOTAL_ADULT_PRICE");
						$totalprice_ch=$roomData->item($k)->hasAttribute("TOTAL_CHILD_PRICE");
						//$child_price=0;
						if($totalprice_ch =='')
						{
						    $totalprice_ch=0;
						}
						
						
						$totalprice = $totalprice+$totalprice_ch;
						//echo $totalprice;exit;
						$roomcode=$roomData->item($k)->getAttribute("ROOM_CODE");
						$room_pax=$roomData->item($k)->getAttribute("ROOM_PAX");

						$roomType=$roomVal->getElementsByTagName("ROOM_NAME");
						$roomTypeVal1=$roomType->item(0)->nodeValue;
						$as = explode("-",$roomTypeVal1);
						$roomTypeVal = $as[0];
						if(isset($as[1]))
						{
						$inclustion = $as[1];
						}
						else
						{
							$inclustion ='Room Only';
						}
						$cancelCode=$roomData->item($k)->getAttribute("CCHARGES_CODE");
					

			/*if($CURRENCY_CODE!='USD')
			{
				if($CURRENCY_CODE=='PDS')
				{
					$CURRENCY_CODE='GBP';
				}
			
				$cur_val1=$this->Hotel_Model->get_currecy_detail($CURRENCY_CODE);
		    	$cur_val =$cur_val1->value;
				if($cur_val!='')
				{
				
					$totalprice = $totalprice / $cur_val;
				}
				
			 }*/
       		
			$amount = $totalprice;
			
			
		    $sec_res=$_SESSION['ses_id'];
			  
			  $adult = $room_pax;
			  $child = 0;
			  $r_count = 1;
			  
			  			  
						$currencyv1=$CURRENCY_CODE;				
													  
											// $amount = $HotelRoom1->getElementsByTagName( "Amount" );
											 
											 if($currencyv1 !='USD')
											 {
												 $c_val1 =$this->Hotel_Model->get_currecy_detail($currencyv1);
												 $c_val = $c_val1->value;
												 if($c_val !='')
												 {
												 $org_amt=$amount;
												 $amountv = $amount /  $c_val;
												 }
												 else
												 {
													  $c_val =1; 
													 $org_amt=$amount;
													$amountv = $amount;
												
												 }
											
											 }
											 else
											 {
												 $c_val =1; 
												 $org_amt=$amount;
											$amountv = $amount;
											
											 }
											$amountv1 = $amountv ;
											//echo $amountv1;exit;
											$contry = $this->Hotel_Model->get_country($_SESSION['city']);
											$markup =  $this->Hotel_Model->get_markup_detail('travco',$contry);
											$pay_charge = $this->Hotel_Model->get_payment_charge();
											
											$amountv2 = ($markup /100);
											$amountv3 = $amountv2*$amountv1;
											$amountv4 = $amountv3+$amountv1;
											
											$amountv2pay = ($pay_charge /100);
											$amountv3pay = $amountv2pay*$amountv4;
							if($STATUS!='Requestable')
						{						
											
			$this->Hotel_Model->insert_travco_temp_result_new($sec_res,'travco',$hotelCode,$roomcode,$roomTypeVal,$amountv4,$STATUS,$inclustion,$adult,$child,$cancelCode,$r_count,$amountv3,$org_amt,$currencyv1,$c_val,$amountv3pay,$CITY_NAMEval);
						}
			//exit;
			$k++;
		        }
		
		            $j++;
					
					
				}
 
				   
		}
	}
	
	function tourico_hotel_availabilty()
	{
		$room_used_type=$_SESSION['room_used_type'];
		$city=$_SESSION['city'];
		$sd=$_SESSION['sd'];
		$room_count=$_SESSION['room_count'];
		$ed=$_SESSION['ed'];
		$city_val = $this->Hotel_Model->get_city_code($city);  
	echo "<pre/>";
	print_r($city_val);exit;
			
			
	
	}
	function fetch_search_result_map()
	{
		
$query=$this->Hotel_Model->fetch_search_result_map_new();


$map_data = array();
$cnt=0;
for($k=0;$k< count($query);$k++)
{
	
	$map_data[$cnt]['lat'] = $query[$k]['latitude'];
	$map_data[$cnt]['lng'] = $query[$k]['longitude'];
	$map_data[$cnt]['name'] = $query[$k]['hotel_name'];
	$star = $query[$k]['star'];
	
if($star==1)
{
$st ="<img src='".WEB_DIR."images/1 star.jpg' />";
}
elseif($star==2)
{
$st ="<img src='".WEB_DIR."images/2 star.jpg' />";
}
elseif($star==3)
{
$st ="<img src='".WEB_DIR."images/3 star.jpg' />";
}
elseif($star==4)
{
$st ="<img src='".WEB_DIR."images/4 star.jpg' />";
}
elseif($star==5)
{
$st ="<img src='".WEB_DIR."images/5 star.jpg' />";
}
else
{
$st ="<img src='".WEB_DIR."images/0 star copy.jpg' />";

}
	$info = "<div id='mapdetailsbox2'><div id='imgbox2'><img src='' width='70px' height='70px' /></div><div id='hotelname2'>" . $query[$k]['hotel_name'] . "</div>"; 
	$info.="<div id='star2'> ".$st." </div> <div id='avalabletxt2'> Avalable From</div><div id='doller2'>" . $query[$k]['low_cost'] . "</div><div id='pernight2'> Per Night</div><div style='clear:both'></div></div>";
	$map_data[$cnt]['info'] = $info;
	$cnt++;
}

echo json_encode($map_data);


	}
	
	function fetch_search_result_map_select($id)
	{
		
$query=$this->Hotel_Model->fetch_search_result_map_new_select($id);
$map_data = array();
$cnt=0;
for($k=0;$k< count($query);$k++)
{
	
	$map_data[$cnt]['lat'] = $query[$k]['latitude'];
	$map_data[$cnt]['lng'] = $query[$k]['longitude'];
	$map_data[$cnt]['name'] = $query[$k]['hotel_name'];
	$star = $query[$k]['star'];
	
if($star==1)
{
$st ="<img src='".WEB_DIR."images/1 star.jpg' />";
}
elseif($star==2)
{
$st ="<img src='".WEB_DIR."images/2 star.jpg' />";
}
elseif($star==3)
{
$st ="<img src='".WEB_DIR."images/3 star.jpg' />";
}
elseif($star==4)
{
$st ="<img src='".WEB_DIR."images/4 star.jpg' />";
}
elseif($star==5)
{
$st ="<img src='".WEB_DIR."images/5 star.jpg' />";
}
else
{
$st ="<img src='".WEB_DIR."images/0 star copy.jpg' />";

}
	$info = "<div id='mapdetailsbox2'><div id='imgbox2'><img src='' width='70px' height='70px' /></div><div id='hotelname2'>" . $query[$k]['hotel_name'] . "</div>"; 
	$info.="<div id='star2'> ".$st." </div> <div id='avalabletxt2'> Avalable From</div><div id='doller2'>" . $query[$k]['low_cost'] . "</div><div id='pernight2'> Per Night</div><div style='clear:both'></div></div>";
	$map_data[$cnt]['info'] = $info;
	$cnt++;
}

echo json_encode($map_data);


	}
	
	
	function fetch_search_result_map_near()
	{
		
$query=$this->Hotel_Model->fetch_search_result_map_new();


$map_data = array();
$cnt=0;
for($k=0;$k< count($query);$k++)
{
	
	$map_data[$cnt]['lat'] = $query[$k]['latitude'];
	$map_data[$cnt]['lng'] = $query[$k]['longitude'];
	$map_data[$cnt]['name'] = $query[$k]['hotel_name'];
	$star = $query[$k]['star'];
	
if($star==1)
{
$st ="<img src='".WEB_DIR."images/1 star.jpg' />";
}
elseif($star==2)
{
$st ="<img src='".WEB_DIR."images/2 star.jpg' />";
}
elseif($star==3)
{
$st ="<img src='".WEB_DIR."images/3 star.jpg' />";
}
elseif($star==4)
{
$st ="<img src='".WEB_DIR."images/4 star.jpg' />";
}
elseif($star==5)
{
$st ="<img src='".WEB_DIR."images/5 star.jpg' />";
}
else
{
$st ="<img src='".WEB_DIR."images/0 star copy.jpg' />";

}
	$info = "<div id='mapdetailsbox2'><div id='imgbox2'><img src='' width='70px' height='70px' /></div><div id='hotelname2'>" . $query[$k]['hotel_name'] . "</div>"; 
	$info.="<div id='star2'> ".$st." </div> <div id='avalabletxt2'> Avalable From</div><div id='doller2'>" . $query[$k]['low_cost'] . "</div><div id='pernight2'> Per Night</div><div style='clear:both'></div></div>";
	$map_data[$cnt]['info'] = $info;
	$cnt++;
}

echo json_encode($map_data);


	}
	
	function error_page($error)
	{
		echo "sds";exit;
		$data['error']=$error;
		echo "sss";
			$this->load->view('hotel/error_page',$data);
	}
	function hotel_detail($id)
	{
		//$_SESSION['fav_hotel_detail']='';exit;
		
        $fav_hotel_detail=array();
		$idd=$this->Hotel_Model->get_cancel_attrib_new($id);
		if($idd->hotel_code !='')
		{
			//echo $idd->api_temp_hotel_id;exit;
			$this->Hotel_Model->get_cancel_attrib_new_nerw($idd->hotel_code,$idd->api_temp_hotel_id);
		}
		if(isset($_SESSION['fav_hotel_detail']))
		{
			$hote_id = $_SESSION['fav_hotel_detail'];
		//	print_r($hote_id);exit;
				//echo "sssss";exit;
			if($hote_id!='')
			{
			
			for($i=0;$i< count($hote_id);$i++)
			{
				$a = explode(",",$hote_id[$i]);
				if($a[0] !='images' && $a[0] !='Array')
				{
				if($id != $a[0])
				{
					//echo $a[0];
					$iddd=$this->Hotel_Model->get_cancel_attrib_new($a[0]);
					//echo $iddd->hotel_code;
					$fav_hotel[] = $a[0].','.$iddd->hotel_code;
				}
				}
			}
			}
			$fav_hotel[] = $id.','.$idd->hotel_code;
			$fav_hotel= array_merge($fav_hotel);
			$_SESSION['fav_hotel_detail'] = $fav_hotel;
		}
		else
		{
			
			$fav_hotel[] = $id.','.$idd->hotel_code;
			$hote_id = $fav_hotel;
			$_SESSION['fav_hotel_detail'] = $fav_hotel;
			
		}
		$service=$this->Hotel_Model->get_searchresult($id);
		
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
			
			$data['hotel_facility'] = $this->Hotel_Model->get_facility_details_hotel($hotel_code);
			$data['room_facility'] = $this->Hotel_Model->get_facility_details_room($hotel_code);
			
			
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
			$data['nearby_hotel']=$this->Hotel_Model->get_nearby_hotels($data['lat'],$data['long'],$data['hotel_name'],$data['dest']);
			}
			else
			{
				$data['nearby_hotel']='';
			}
			if($api=='hotelsbed')
			{
			$hotel_image= $this->Hotel_Model->gethb_hotelimage_new($hotel_code);
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
			elseif($api=='travco')	
			{
					$hotel_image= $this->Hotel_Model->gethb_hotelimage_new_travco($hotel_code);
					if($hotel_image!="")
					{
						$img1=array();
						for($i=0;$i< count($hotel_image); $i++)
						{
							 $img=$hotel_image[$i]->path;
							 $img1[]= "http://www.travco.co.uk/images/hotel_pics" . $img;
						}
						$data['img_array']=$img1;
					}
					else
					{
						$img1="";
						$data['img_array']="";
					}	
			}
			elseif($api=='hotelspro')	
			{
					$hotel_image= $this->Hotel_Model->get_hotelbed_hotel_pro_image($hotel_code);
					if($hotel_image!="")
					{
						
							 $img1[]= array($hotel_image->HotelImages1,$hotel_image->HotelImages2,$hotel_image->HotelImages3);
					
						$data['img_array']=$img1;
					}
					else
					{
						$img1="";
						$data['img_array']="";
					}	
			}
			elseif($api=='dotw')	
			{
						$img1="";
						$data['img_array']="";
						
			}
			//echo "<pre/>";
			//print_r($data);exit;
			$this->load->view('hotel/hotel_detail',$data);	
			//}
	}
	function pre_booking_old($result_id)
	{
		
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('city', 'City', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|matches[cemail]');
		$this->form_validation->set_rules('cemail', 'Confirm Email', 'required|valid_email');
		$this->form_validation->set_rules('pin', 'Post/Zip Code', 'required');
		$this->form_validation->set_rules('country', 'Country', 'required');
		$this->form_validation->set_rules('mobile', 'Mobile', 'required');
	
		if($this->form_validation->run()==FALSE)
		{
			$room_count = $_SESSION['room_count'];


		if($room_count == 1)
		{
			
			$service=$this->Hotel_Model->get_searchresult($result_id);
			$api = $service->api;
			$hotel_code = $service->hotel_code;
			$hotel_name = $service->hotel_name;
			$star = $service->star;
			$image = $service->image;
			$data['service']=$service;
			$sec_res=$_SESSION['ses_id'];
			$data['result_id']=$result_id;
			$rm_info=array();
		    $rm_info[]=$this->Hotel_Model->fetch_gta_temp_result_room_result_id($sec_res,$result_id);
			$data['room_info'] = $rm_info;
		}
		else
		{
			$result_id1 = explode("-",$result_id);
		//	print_r($result_id1);exit;
			$service=$this->Hotel_Model->get_searchresult($result_id1[0]);
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
			 $rm_info[]=$this->Hotel_Model->fetch_gta_temp_result_room_result_id($sec_res,$result_id1[$r]);
			}
			
			$data['room_info'] = $rm_info;
		}
		
		
		$sec_res=$_SESSION['ses_id'];
		
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
			
			$data['address'] = $StNAME.' '.$StPIN;
			$data['dest'] = $StCITY;
			
			$data['api'] = 'hotelsbed';
		
		
						$totalamt=0;
		$totroom=$_SESSION['room_count'];
		
		$adult_count1 = 0;
		$child_count1 = 0;
		$roomcount=$_SESSION['room_count'];
		//echo "<pre/>";print_r($_SESSION);exit;
		$roomusedtype=$_SESSION['room_used_type'];
		$adult_count=array();
		$child_count=array();
		$c_age=$_SESSION['child_age'];
		$sb_room_count=0;
$db_room_count=0;
$qu_room_count=0;
$tr_room_count=0;
$dbc_room_cout=0;
$dbcc_room_cout=0;
		for($d=0;$d < count($roomusedtype);$d++)
		{
			if($roomusedtype[$d]=='sb')
			{
				$sb_room_count= $sb_room_count +1;
				$room_cnt[] =  $sb_room_count +1;
				 $adult_count[] = 1*1;
				 $child_count[] =  0;
		    }
			if($roomusedtype[$d]=='db')
			{
				$db_room_count= $db_room_count +1;
				$room_cnt[] = $db_room_count +1;
				 $adult_count[] =2*1;
				  $child_count[] =  0;
		    }
			
			if($roomusedtype[$d]=='qu')
			{
				$qu_room_count= $qu_room_count +1;
				$room_cnt[] = $qu_room_count +1;
				 $adult_count[] = 4*1;
				  $child_count[] =  0;
		    }
			if($roomusedtype[$d]=='tr')
			{
				$tr_room_count= $tr_room_count +1;
				$room_cnt[] = $tr_room_count +1;
				 $adult_count[] =  3*1;
				  $child_count[] =  0;
		    }
			if($roomusedtype[$d]=='dbc')
			{
				$room_cnt[] = $dbc_room_cout+1;
				$dbc_room_cout = $dbc_room_cout+1;
			   
			        $adult_count[] =  2;
					$child_count[] =  1;
				
				
			}
			if($roomusedtype[$d]=='dbcc')
			{
				$room_cnt[] = $dbcc_room_cout+1;  
			    $dbcc_room_cout = $dbcc_room_cout+1;  
			    $adult_count[] = 2 ;
				$child_count[] = 2 ;
			}
		}
	
		
			
				if($dbcc_room_cout==1)
				{
				$dbcc_age =array($c_age[0],$c_age[1]);
				}
				if($dbcc_room_cout==2)
				{
				$dbcc_age =array($c_age[0],$c_age[1],$c_age[3],$c_age[4]);
				}
				if($dbcc_room_cout==3)
				{
				$dbcc_age =array($c_age[0],$c_age[1],$c_age[3],$c_age[4],$c_age[6],$c_age[7]);
				}

		
		
			if($dbc_room_cout==1)
				{
				$dbc_age =array($c_age[0]);
				}
				if($dbc_room_cout==2)
				{
				$dbc_age =array($c_age[0],$c_age[3]);
				}
				if($dbc_room_cout==3)
				{
				$dbc_age =array($c_age[0],$c_age[3],$c_age[6]);
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
			$attribr[]=$this->Hotel_Model->get_cancel_attrib_new($mer_id[$k]);
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
			
			       
					              $attribw=$this->Hotel_Model->get_cancel_attrib_new($mer_id[$k]);
								
								  $adultw=trim($attribw->adult); 
								  $childw=trim($attribw->child);  
								  $result_idw=trim($attribw->api_temp_hotel_id);  
 //echo "<pre/>";print_r($child_count);exit;	
			         if($adult_count[$k] == $attribr[$h]->adult &&  $child_count[$k] == $attribr[$h]->child)
					 {
						
						         $attribb[]=$this->Hotel_Model->get_cancel_attrib_new($attribr[$h]->api_temp_hotel_id);
								
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
								  $r_cnt[]=trim($attrib->room_count);   // shrui val
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
		$roomcount=$room_cnt;
		//echo "<pre/>";
	//	print_r($roomTypeVal);exit;
		for($i=0;$i< count($mer_id);$i++)
		{
			if($roomusedtype[$i]=='sb')
			{
			$roomCode = 'SB';
			$room1.='<AvailableRoom>
					<HotelOccupancy>
						<RoomCount>'.$r_cnt[$j].'</RoomCount>
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
							<RoomCount>'.$r_cnt[$j].'</RoomCount>
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
							<RoomCount>'.$r_cnt[$j].'</RoomCount>
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
							<RoomCount>'.$r_cnt[$j].'</RoomCount>
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
				if($dbc_room_cout=='1')
				{
					$room1.='<AvailableRoom>
						<HotelOccupancy>
							<RoomCount>'.$r_cnt[$j].'</RoomCount>
							<Occupancy>
							<AdultCount>2</AdultCount>
								<ChildCount>1</ChildCount>
							<GuestList>
									<Customer type="AD"/>
									<Customer type="CH">
									<Age>'.$dbc_age[0].'</Age>
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
				else if($dbc_room_cout=='2')
				{
					$room1.='<AvailableRoom>
						<HotelOccupancy>
							<RoomCount>'.$r_cnt[$j].'</RoomCount>
							<Occupancy>
								<AdultCount>2</AdultCount>
								<ChildCount>1</ChildCount>
							<GuestList>
									<Customer type="AD"/>
									<Customer type="CH">
									<Age>'.$dbc_age[0].'</Age>
									</Customer>
									<Customer type="CH">
									<Age>'.$dbc_age[1].'</Age>
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
				
				else if($dbc_room_cout=='3')
				{
					$room1.='<AvailableRoom>
						<HotelOccupancy>
							<RoomCount>'.$r_cnt[$j].'</RoomCount>
							<Occupancy>
								<AdultCount>2</AdultCount>
								<ChildCount>1</ChildCount>
							<GuestList>
									<Customer type="AD"/>
									<Customer type="CH">
									<Age>'.$dbc_age[0].'</Age>
									</Customer>
									<Customer type="CH">
									<Age>'.$dbc_age[1].'</Age>
									</Customer>	
									<Customer type="CH">
									<Age>'.$dbc_age[2].'</Age>
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
				
				if($dbcc_room_cout=='1')
				{
					
					$room1.='<AvailableRoom>
						<HotelOccupancy>
							<RoomCount>'.$r_cnt[$j].'</RoomCount>
							<Occupancy>
								<AdultCount>2</AdultCount>
								<ChildCount>2</ChildCount>
							<GuestList>
									<Customer type="AD"/>
									<Customer type="CH">
									<Age>'.$dbcc_age[0].'</Age>
									</Customer>
									<Customer type="CH">
									<Age>'.$dbcc_age[1].'</Age>
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
				else if($dbcc_room_cout=='2')
				{
					
					$room1.='<AvailableRoom>
						<HotelOccupancy>
							<RoomCount>'.$r_cnt[$j].'</RoomCount>
							<Occupancy>
								<AdultCount>2</AdultCount>
								<ChildCount>2</ChildCount>
							<GuestList>
									<Customer type="AD"/>
									<Customer type="CH">
									<Age>'.$dbcc_age[0].'</Age>
									</Customer>
									<Customer type="CH">
									<Age>'.$dbcc_age[1].'</Age>
									</Customer>	
									<Customer type="CH">
									<Age>'.$dbcc_age[2].'</Age>
									</Customer>	
									<Customer type="CH">
									<Age>'.$dbcc_age[3].'</Age>
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
				
				else if($dbcc_room_cout=='3')
				{
					$room1.='<AvailableRoom>
						<HotelOccupancy>
							<RoomCount>'.$r_cnt[$j].'</RoomCount>
							<Occupancy>
								<AdultCount>2</AdultCount>
								<ChildCount>2</ChildCount>
							<GuestList>
									<Customer type="AD"/>
									<Customer type="CH">
									<Age>'.$dbcc_age[0].'</Age>
									</Customer>
									<Customer type="CH">
									<Age>'.$dbcc_age[1].'</Age>
									</Customer>	
									<Customer type="CH">
									<Age>'.$dbcc_age[2].'</Age>
									</Customer>	
									<Customer type="CH">
									<Age>'.$dbcc_age[3].'</Age>
									</Customer>	
									<Customer type="CH">
									<Age>'.$dbcc_age[4].'</Age>
									</Customer>	
									<Customer type="CH">
									<Age>'.$dbcc_age[5].'</Age>
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
	$user="HTLEXPLORAE64882";
			$pass="HTLEXPLORAE64882";
			$URL = "http://212.170.239.71/appservices/http/FrontendService";//local
		}
			else
			{
	$user="HTLEXPLORAE64882";
			$pass="HTLEXPLORAE64882";
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
				$this->Hotel_Model->insert_booking_attrib($criteria_id,'hotelsbed',$purTokenVal,$serviceval,$canceldisplayValc,$dateFromValc,$dateToValc);
		
		$cancel_req='ok';
		} 
		else
		{
			$cancel_req='';
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
          
		$this->load->view('hotel/pre_booking',$data);
		
		
		}
		else
		{
				$data['cancel_policy']='Nil';
	
          
		$this->load->view('hotel/pre_booking',$data);
			//$data['error']=$Messageval;
			//$this->load->view('hotel/error_page',$data);
			//echo $Messageval;exit;
		}
	
			
			}
	   elseif($api=='gta')
		{
			
				
		$sec_res=$_SESSION['ses_id'];
		
			
			$data['hotel_facility'] = $this->Hotel_Model->get_facility_details($hotel_code);
			
			
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
					$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$dbc_room_cnt.'" Id="'.trim($room).'">
								<ExtraBeds>
									<Age>5</Age>
									<Age>7</Age>
								</ExtraBeds>

							</Room>';
				}else if($dbc_room_cnt=='3'){
					$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$dbc_room_cnt.'" Id="'.trim($room).'">
								<ExtraBeds>
									<Age>5</Age>
									<Age>7</Age>
									<Age>5</Age>
								</ExtraBeds>

							</Room>';
					}
					else
					{
						$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$dbc_room_cnt.'" Id="'.trim($room).'">
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
		$city_val = $this->Hotel_Model->get_city_code($city);  
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

		//echo $xml_data;


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
			//echo $output;exit;
			  
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
			$gta_cancel_policy='';
								$checkin1=$out[2]."-".$out[1]."-".$out[0];
									if(isset($dayfromval[2]))
									{
					$newdate0 = strtotime ( "-$dayfromval[2] day" , strtotime ($checkin1) ) ;
					$cancel_todate0 = date ( 'd-M-Y' , $newdate0 );					
					$val1=$dayfromval[1]+1;
					$newdate1 = strtotime ( "-$val1 day" , strtotime ($checkin1) ) ;
					$cancel_todate1 = date ( 'd-M-Y' , $newdate1 );
					
					
					$gta_cancel_policy .= 'Before '.$cancel_todate0.' No Charges Apply For Booking. ';
					}
					
		 			if(isset($dayfromval[1]))
		            {
						if($dayfromval[1]!=0)
						{
					$newdate2 = strtotime ( "-$dayfromval[1] day" , strtotime ($checkin1) ) ;
					$cancel_fromdate2 = date ( 'd-M-Y' , $newdate2);
					$tonewdate = strtotime ( "-$daytoval[1] day" , strtotime ($checkin1) ) ;
					$cancel_todate2 = date ( 'd-M-Y' , $tonewdate);
						}
						else
						{
							$tonewdate = strtotime ( "-$dayfromval[0] day" , strtotime ($checkin1) ) ;
				        	$cancel_todate2 = date ( 'd-M-Y');
						}
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
					
					$gta_cancel_policy .= 'Onwards '.$cancel_todate2.' Charges Will Apply  '.$amt0.' USD';
						
						
						
		          }
				  else
				  {
				 
					$amt0=ceil($amt0);
					$gta_cancel_policy .= ' Charges Will Apply  '.$amt0.' USD';
				  }
				  		
					
			$data['cancel_policy']=$gta_cancel_policy;
					
		
			
		
			$data['api'] = 'gta';
			if($data['lat'] !='' && $data['long']!='')
			{
			$data['nearby_hotel']=$this->Hotel_Model->get_nearby_hotels($data['lat'],$data['long'],$data['hotel_name'],$data['dest']);
			}
			else
			{
			$data['nearby_hotel']='';	
			}
			
				$data['img_array'][]= WEB_DIR.'image_gta/'.$hotel_code.'.jpg';
			
	$this->load->view('hotel/pre_booking',$data);	
			}
			elseif($api=='travco')
		{
			
				
		   $sec_res=$_SESSION['ses_id'];
		
			$data['hotel_facility'] = $this->Hotel_Model->get_facility_details($hotel_code);
			
			
			$data['hotelCode']=$hotel_code;
			
			$data['star']=$service->star;
			$data['phone']=$service->phone;
			$data['location']=$service->location;
			$room=$service->room_code;
			
			
			$data['lat']=$service->latitude;
			$data['long']=$service->longitude;
			$data['hotel_name']=$service->hotel_name;
			$cancel_val=$service->charval;
			
			$data['description'] = $service->description;
			$data['address'] = $service->address;
			$data['dest'] = $service->city ;
			$room_used_type=$_SESSION['room_used_type'];
		$city=$_SESSION['city'];
		$sd=$_SESSION['sd'];
		$room_count=$_SESSION['room_count'];
		$ed=$_SESSION['ed'];
		
		
		$in = explode("-",$sd);
		 switch($in[1])
					{
					case '01':
					$checkin=$in[0]."/"."Jan"."/".$in[2];
					break;
					case '02':
					$checkin=$in[0]."/"."Feb"."/".$in[2];
					break;
					case '03':
					$checkin=$in[0]."/"."Mar"."/".$in[2];
					break;
					case '04':
					$checkin=$in[0]."/"."Apr"."/".$in[2];
					break;
					case '05':
					$checkin=$in[0]."/"."May"."/".$in[2];
					break;
					case '06':
					$checkin=$in[0]."/"."Jun"."/".$in[2];
					break;
					case '07':
					$checkin=$in[0]."/"."Jul"."/".$in[2];
					break;
					case '08':
					$checkin=$in[0]."/"."Aug"."/".$in[2];
					break;
					case '09':
					$checkin=$in[0]."/"."Sep"."/".$in[2];
					break;
					case '10':
					$checkin=$in[0]."/"."Oct"."/".$in[2];
					break;
					case '11':
					$checkin=$in[0]."/"."Nov"."/".$in[2];
					break;
					case '12':
					$checkin=$in[0]."/"."Dec"."/".$in[2];
					break;
					}
		$cin = $checkin;
		$out = explode("-",$ed);
	              


					switch($out[1])
					{
					case '01':
					$checkout=$out[0]."/"."Jan"."/".$out[2];
					break;
					case '02':
					$checkout=$out[0]."/"."Feb"."/".$out[2];
					break;
					case '03':
					$checkout=$out[0]."/"."Mar"."/".$out[2];
					break;
					case '04':
					$checkout=$out[0]."/"."Apr"."/".$out[2];
					break;
					case '05':
					$checkout=$out[0]."/"."May"."/".$out[2];
					break;
					case '06':
					$checkout=$out[0]."/"."Jun"."/".$out[2];
					break;
					case '07':
					$checkout=$out[0]."/"."Jul"."/".$out[2];
					break;
					case '08':
					$checkout=$out[0]."/"."Aug"."/".$out[2];
					break;
					case '09':
					$checkout=$out[0]."/"."Sep"."/".$out[2];
					break;
					case '10':
					$checkout=$out[0]."/"."Oct"."/".$out[2];
					break;
					case '11':
					$checkout=$out[0]."/"."Nov"."/".$out[2];
					break;
					case '12':
					$checkout=$out[0]."/"."Dec"."/".$out[2];
					break;
					}
		$cout = $checkout;
		
	$days = $_SESSION['days'];
		     $agentcode='133YZA'; //travco//local
			$agentpwd='250112XIAE'; //travco//local
			//$URL ="http://xmlv5test2.travco.co.uk/trlink/link1/trlink";//test
			$URL = "http://xmlv6.travco.co.uk/trlink/link1/trlink";//live
			//$name_space = "http://xmlv5test.travco.co.uk/trlink/schema/HotelAvailabilityV6Snd.xsd";
			$name_space = 'http://xmlv6.travco.co.uk/trlink/link1/trlink';//live
			
	$xml_data="<?xml version='1.0' encoding='UTF-8'?>
		<BOOKING type='HCAD' lang='en-GB' returnURLNeed='no' returnURL='http://' AGENTCODE='".$agentcode."' AGENTPASSWORD='".$agentpwd."' xmlns:xsi='http://www.w3.org/2001/XMLSchema-instance' xsi:noNamespaceSchemaLocation='".$name_space."'>
			<HEADER>
				<INTERNAL_CODE1>DWEBCN</INTERNAL_CODE1>
				<INTERNAL_CODE2>ENQUIRE</INTERNAL_CODE2>
				<INTERNAL_CODE3>VB</INTERNAL_CODE3>
			</HEADER>
			<DATA	HOTEL_CODE='".$hotel_code."' CHECK_IN_DATE='".$cin."'	DURATION='".$days."'	CCHARGES_CODE='".$cancel_val."'/>
		</BOOKING>
		";
        $ch = curl_init($URL);
	//	curl_setopt($ch, CURLOPT_MUTE, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml'));
		curl_setopt($ch, CURLOPT_POSTFIELDS, "$xml_data");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$cancel_out = curl_exec($ch);
		
		curl_close($ch);
			
			
$dom=new DOMDocument();
					$dom->loadXML($cancel_out);
					
					   $cdetails=$dom->getElementsByTagName("DETAILS");
					   $z=0;
						foreach($cdetails as $cdetails1)
						{
						//echo count($cdetails1);
						 $daysbefore[]=$cdetails->item($z)->getAttribute("NO_OF_DAYS_BEFORE_ARRIVAL");
						
						 $dateToVal[]=$cdetails->item($z)->getAttribute("EFFECTIVE_FROM");
						
						 $dateFromTimeVal[]=$cdetails->item($z)->getAttribute("TIME_AFTER");
						
						$cancelMsg=$cdetails1->getElementsByTagName("MESSAGE");
						 $dateFromVal[]=$cancelMsg->item(0)->getAttribute("LAST_DATE_BY_WHICH_TO_CANCEL");
						 $dateToTimeVal[]=$cancelMsg->item(0)->getAttribute("TIME_BEFORE");
						
						$cancelDesc=$cdetails1->getElementsByTagName("FULL_CANCELLATION_POLICY");
						 $cancelDescVal[]=$cancelDesc->item(0)->nodeValue;
						$z++;
						}	
						$count=count($daysbefore);
						//print_r($daysbefore);
						$travco_cancel_policy='';
						if($count==1)
						{
//echo 'upto:'.$dateToTimeVal[0].' '.$dateFromVal[0].' '.'no charge'.'<br>';

$travco_cancel_policy .= 'upto:'.$dateToTimeVal[0].' '.$dateFromVal[0].' '.$cancelDescVal[0].'will be charged'.'<br>';

$travco_cancel_policy .=  'After:'.$dateToTimeVal[0].' '.$dateFromVal[0].' '.$cancelDescVal[0].'will be charged'.'<br>';					
						}
						elseif($count==2)
						{
	
$travco_cancel_policy .=  'Upto:'.$dateToTimeVal[0].' '.$dateFromVal[0].' '.'no charge'.'<br>';

$travco_cancel_policy .=  'Upto:'.$dateToTimeVal[0].' '.$dateFromVal[1].' '.$cancelDescVal[0].'will be charged'.'<br>';

$travco_cancel_policy .=  ' After:'.$dateToTimeVal[0].' '.$dateFromVal[1].' '.$cancelDescVal[1].'will be charged'.'<br>';							
					}				
	
                   
                    
                 
			$data['cancel_policy']=$travco_cancel_policy;
					
		
		
			$data['api'] = 'travco';
			if($data['lat'] !='' && $data['long']!='')
			{
			$data['nearby_hotel']=$this->Hotel_Model->get_nearby_hotels($data['lat'],$data['long'],$data['hotel_name'],$data['dest']);
			}
			else
			{
			$data['nearby_hotel']='';	
			}
			
			$hotel_image= $this->Hotel_Model->gethb_hotelimage_new_travco($hotel_code);
					if($hotel_image!="")
					{
						$img1=array();
						for($i=0;$i< count($hotel_image); $i++)
						{
							 $img=$hotel_image[$i]->path;
							 $img1[]= "http://www.travco.co.uk/images/hotel_pics" . $img;
						}
						$data['img_array']=$img1;
					}
					else
					{
						$img1="";
						$data['img_array']="";
					}	
			
	$this->load->view('hotel/pre_booking',$data);	
			}
		}
		
		else
		{

          $_SESSION['book_final_book_val'] = $_POST;
         redirect("hotel/booking_final",'refresh');
		}
	
	}
	function pro_pre_booking($result_id)
	{
		
		
			$room_count = $_SESSION['room_count'];
//echo $result_id;exit;

		if($room_count == 1)
		{
			
			$service=$this->Hotel_Model->get_searchresult($result_id);
			$api = $service->api;
			$hotel_code = $service->hotel_code;
			$hotel_name = $service->hotel_name;
			$star = $service->star;
			$image = $service->image;
			$data['service']=$service;
			$sec_res=$_SESSION['ses_id'];
			$data['result_id']=$result_id;
			$rm_info=array();
		    $rm_info[]=$this->Hotel_Model->fetch_gta_temp_result_room_result_id($sec_res,$result_id);
			$data['room_info'] = $rm_info;
		}
		else
		{
			
			$result_id1 = explode("-",$result_id);
		//	print_r($result_id1);exit;
			$service=$this->Hotel_Model->get_searchresult($result_id1[0]);
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
			 $rm_info[]=$this->Hotel_Model->fetch_gta_temp_result_room_result_id($sec_res,$result_id1[$r]);
			}
			
			$data['room_info'] = $rm_info;
		}
		
		
				
				$data['errordesc']='';
  $client = new SoapClient("http://api.hotelspro.com/4.1_test/hotel/b2bHotelSOAP.wsdl", array('trace' => 1));
  try {
	 $pid=$_SESSION['pro_search_id'];
	
	 $hid=$hotel_code;
	
     $allocateHotelCode = $client->allocateHotelCode("d2FBL3FqTkhiNmJ1SU1Zb0hyZDBGWXB6VHZtVHpNNy9wOFh4YXpBa3FzcEVlWm9qRDNsTy96Q3ZBcjlYcEJzMw==",$pid,$hid);
      }
	  
     catch (SoapFault $exception) 
     {
	     
    $data['errordesc'] = $exception->getMessage();
	   
      } 

	 if($data['errordesc']!='')
  {
	  
	  $data['error']=$data['errordesc'];
	 	 	 
	           	$this->load->view('hotel/error_page',$data);
				
  }
  else
  {
	
	if (is_object($allocateHotelCode->availableHotels)) {
      $availableHotels[] = $allocateHotelCode->availableHotels;
  } else
   {
      $availableHotels = $allocateHotelCode->availableHotels;
  }
		$roommm=array();
  foreach ($availableHotels as $hnum => $hotel) {
	  
    $process_id = $hotel->processId;
	$status =$hotel->availabilityStatus;
	$totalRoomRate = $hotel->totalPrice;
	$cur = $hotel->currency;
	$boardType = $hotel->boardType;
	
   	$currencyv1 = $cur;
											 if($currencyv1 !='USD')
											 {
												 $c_val1 =$this->Hotel_Model->get_currecy_detail($currencyv1);
												 $c_val = $c_val1->value;
												 $org_amt=$totalRoomRate;
											
											$amountv = $totalRoomRate /  $c_val;
											 }
											 else
											 {
												 $c_val =1; 
												 $org_amt=$totalRoomRate;
												
												$amountv = $totalRoomRate;
											 }
											
											$amountv1 = $amountv ;
											
											$contry = $this->Hotel_Model->get_country($_SESSION['city']);
											$markup =  $this->Hotel_Model->get_markup_detail('hotelspro',$contry);
											$pay_charge = $this->Hotel_Model->get_payment_charge();
											
																						
											$amountv2 = ($markup /100);
											$amountv3 = $amountv2*$amountv1;
											$amountv4 = $amountv3+$amountv1;
											
											$amountv2pay = ($pay_charge /100);
											$amountv3pay = $amountv2pay*$amountv4;
              if (is_object($hotel->rooms)) 
	          {
                  $roomResponse[] = $hotel->rooms;
              } 
			  else
	          {
                  $roomResponse = $hotel->rooms;
              }
	  
	 $roomCategory1=array();
      foreach ((array)$roomResponse as $rnum => $room)
	   {
           $roomCategory1[] = $room->roomCategory;
           $room = implode("<br>",$roomCategory1);
       }
      unset($roomResponse);
        $roommm[] = array('process_id'=>$process_id,'status'=>$status,'amountv4'=>$amountv4,'room'=>$room,'boardType'=>$boardType,'amountv3'=>$amountv3,'org_amt'=>$org_amt,'currencyv1'=>$currencyv1,'c_val'=>$c_val,'amountv3pay'=>$amountv3pay);
      }
  
	  
  
   $data['room_cat_details']= $roommm;
 // echo '<pre/>';
  // print_r($data);exit;
					$this->load->view('hotel/pro_pre_booking',$data);	
			}
			
			
       
		
	}
	function pre_booking($result_id)
	{
		
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('city', 'City', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|matches[cemail]');
		$this->form_validation->set_rules('cemail', 'Confirm Email', 'required|valid_email');
		$this->form_validation->set_rules('pin', 'Post/Zip Code', 'required');
		$this->form_validation->set_rules('country', 'Country', 'required');
		$this->form_validation->set_rules('mobile', 'Mobile', 'required');
	
		if($this->form_validation->run()==FALSE)
		{
			$room_count = $_SESSION['room_count'];
//echo $result_id;exit;

		if($room_count == 1)
		{
			
			$service=$this->Hotel_Model->get_searchresult($result_id);
			$api = $service->api;
			$hotel_code = $service->hotel_code;
			$hotel_name = $service->hotel_name;
			$star = $service->star;
			$image = $service->image;
			$data['service']=$service;
			$sec_res=$_SESSION['ses_id'];
			$data['result_id']=$result_id;
			$rm_info=array();
		    $rm_info[]=$this->Hotel_Model->fetch_gta_temp_result_room_result_id($sec_res,$result_id);
			$data['room_info'] = $rm_info;
		}
		else
		{
			
			$result_id1 = explode("-",$result_id);
		//	print_r($result_id1);exit;
			$service=$this->Hotel_Model->get_searchresult($result_id1[0]);
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
			 $rm_info[]=$this->Hotel_Model->fetch_gta_temp_result_room_result_id($sec_res,$result_id1[$r]);
			}
			
			$data['room_info'] = $rm_info;
		}
		
		$sec_res=$_SESSION['ses_id'];
		
		if($api=='hotelsbed___')
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
		//echo "<pre/>";print_r($_SESSION);exit;
		$roomusedtype=$_SESSION['room_used_type'];
		$adult_count=array();
		$child_count=array();
		$c_age=$_SESSION['child_age'];
		$sb_room_count=0;
$db_room_count=0;
$qu_room_count=0;
$tr_room_count=0;
$dbc_room_cout=0;
$dbcc_room_cout=0;
		for($d=0;$d < count($roomusedtype);$d++)
		{
			if($roomusedtype[$d]=='sb')
			{
				$sb_room_count= $sb_room_count +1;
				$room_cnt[] =  $sb_room_count +1;
				 $adult_count[] = 1*1;
				 $child_count[] =  0;
		    }
			if($roomusedtype[$d]=='db')

			{
				$db_room_count= $db_room_count +1;
				$room_cnt[] = $db_room_count +1;
				 $adult_count[] =2*1;
				  $child_count[] =  0;
		    }
			
			if($roomusedtype[$d]=='qu')
			{
				$qu_room_count= $qu_room_count +1;
				$room_cnt[] = $qu_room_count +1;
				 $adult_count[] = 4*1;
				  $child_count[] =  0;
		    }
			if($roomusedtype[$d]=='tr')
			{
				$tr_room_count= $tr_room_count +1;
				$room_cnt[] = $tr_room_count +1;
				 $adult_count[] =  3*1;
				  $child_count[] =  0;
		    }
			if($roomusedtype[$d]=='dbc')
			{
				$room_cnt[] = $dbc_room_cout+1;
				$dbc_room_cout = $dbc_room_cout+1;
			   
			        $adult_count[] =  2;
					$child_count[] =  1;
				
				
			}
			if($roomusedtype[$d]=='dbcc')
			{
				$room_cnt[] = $dbcc_room_cout+1;  
			    $dbcc_room_cout = $dbcc_room_cout+1;  
			    $adult_count[] = 2 ;
				$child_count[] = 2 ;
			}
		}
	
		
			
				if($dbcc_room_cout==1)
				{
				$dbcc_age =array($c_age[0],$c_age[1]);
				}
				if($dbcc_room_cout==2)
				{
				$dbcc_age =array($c_age[0],$c_age[1],$c_age[3],$c_age[4]);
				}
				if($dbcc_room_cout==3)
				{
				$dbcc_age =array($c_age[0],$c_age[1],$c_age[3],$c_age[4],$c_age[6],$c_age[7]);
				}

		
		
			if($dbc_room_cout==1)
				{
				$dbc_age =array($c_age[0]);
				}
				if($dbc_room_cout==2)
				{
				$dbc_age =array($c_age[0],$c_age[3]);
				}
				if($dbc_room_cout==3)
				{
				$dbc_age =array($c_age[0],$c_age[3],$c_age[6]);
				}
				
		
		$mer_id=explode("-",$result_id);
	
		
		$cin= $_SESSION['sd'];
		$cin_val = explode("-",$cin);
		$checkin = $cin_val[2].$cin_val[1].$cin_val[0];	
		$cout= $_SESSION['ed'];
		$cout_val = explode("-",$cout);
		$checkout = $cout_val[2].$cout_val[1].$cout_val[0];	
		  $cin_hb=$checkin;  // checkin date
								 $cout_hb=$checkout;   //checkout date
		
                                
	$roomCode='';
		$rooms='';
		$room1='';
		$data['tot_tariff']=$totalamt;
		$j=0;
		$roomusedtype=$_SESSION['room_used_type'];
		$count=count($roomusedtype);
		$roomusedtype=$_SESSION['room_used_type'];
		$roomcount=$room_cnt;
		//echo "<pre/>";
	//	print_r($roomTypeVal);exit;
	
		
$room1ss='';
	for($k=0;$k <  count($mer_id);$k++)
		{
			$attribr5=$this->B2b_Hotel_Model->get_cancel_attrib_new($mer_id[$k]);
			 $token=trim($attribr5->token);
			  $contractnameVal=trim($attribr5->contractnameVal);
			   $inoffcode=trim($attribr5->inoffcode);
			 $codev1=trim($attribr5->hotel_code);  // hotel code
								 $destCodeVal=trim($attribr5->destCodeVal);  //destination code
								 $ck='';
								 if($attribr5->child > 0)
								 {
									 $dd=$attribr5->room_count*$attribr5->child;
								 for($hh=0;$hh < $dd; $hh++)
								 {
									 
									 $chi .='<Customer type = "CH">
											<Age>10</Age>
										</Customer>';
								 }
								 }
								 else
								 {
									 $chi='';
								 }
			$room1ss.='<AvailableRoom>
					<HotelOccupancy>
						<RoomCount>'.$attribr5->room_count.'</RoomCount>
						<Occupancy>
								<AdultCount>'.$attribr5->adult.'</AdultCount>
							<ChildCount>'.$attribr5->child.'</ChildCount>
						<GuestList>
								<Customer type="AD"/>
								'.$chi.'
						</GuestList>
							
						</Occupancy>
					</HotelOccupancy>
					<hotelroom SHRUI="'.$attribr5->shurival.'" >
						<Board type="SIMPLE" code="'.$attribr5->board_type.'" shortname="'.$attribr5->shortname.'"/>
						<RoomType type="SIMPLE" code="'.$attribr5->room_code.'" characteristic="'.$attribr5->charval.'"/>
					</hotelroom>
				</AvailableRoom>';	
				
				
			
		}
		//echo '<pre/>';
		//echo $room1ss;exit;
	$rooms=$room1ss; 
	
	
	//echo $rooms; exit();
		if($_SERVER['HTTP_HOST']=='localhost')
			{					
	$user="RHLTYTOURSSA49653";
			$pass="RHLTYTOURSSA49653";
			$URL = "http://212.170.239.18/appservices/http/FrontendService";//local
		}
			else
			{
	$user="RHLTYTOURSSA49653";
			$pass="RHLTYTOURSSA49653";
			$URL = "http://212.170.239.18/appservices/http/FrontendService";//local
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

		echo $xml_datah;		
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
		echo $xmls;exit;
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
		
		
		if($cancel_req!='')
		{
		
			$cancel_policy='';
			
								
		 if($data['contract_remarks']=='')
		 {
			$_SESSION['contract_remarks']='No remarks given by hotel';
			$contract_remarks="No remarks given by hotel<br>";
		 }
		 else
		 {
			 $_SESSION['contract_remarks']=$data['contract_remarks'];
			 $contract_remarks=$data['contract_remarks'].'<br>';
		 }
		 
   $cancel_policy .= $contract_remarks;
			 
			     
      for($i=0;$i< count($rtname);$i++)
      {
		    $cancel_policy .= ' cancellation made  for '.$rtname[$i] ;
// CONVERT TO EURO 
//   if($currencyCode !='USD' )
//   {
//   $cur_val=$this->B2b_Hotel_Model->get_currency_val($currencyCode);
//    $cancel_amt_eur = number_format($amt[$i] / $cur_val,2,'.','');
//   }
//  else
// {
    $cancel_amt_eur = number_format($amt[$i] ,2,'.','');
//}
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
		else
		{
			
			$data['error']=$Messageval;
			$this->load->view('b2b/hotel/error_page',$data);
			//echo $Messageval;exit;
		}
	
			
			}
			elseif($api=='hotelsbed')
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
			
			$data['address'] = $StNAME.' '.$StPIN;
			$data['dest'] = $StCITY;
			
			$data['api'] = 'hotelsbed';
		
		
						$totalamt=0;
		$totroom=$_SESSION['room_count'];
		
		$adult_count1 = 0;
		$child_count1 = 0;
		$roomcount=$_SESSION['room_count'];
		//echo "<pre/>";print_r($_SESSION);exit;
		$roomusedtype=$_SESSION['room_used_type'];
		$adult_count=array();
		$child_count=array();
		$c_age=$_SESSION['child_age'];
		$sb_room_count=0;
$db_room_count=0;
$qu_room_count=0;
$tr_room_count=0;
$dbc_room_cout=0;
$dbcc_room_cout=0;
		for($d=0;$d < count($roomusedtype);$d++)
		{
			if($roomusedtype[$d]=='sb')
			{
				$sb_room_count= $sb_room_count +1;
				$room_cnt[] =  $sb_room_count +1;
				 $adult_count[] = 1*1;
				 $child_count[] =  0;
		    }
			if($roomusedtype[$d]=='db')

			{
				$db_room_count= $db_room_count +1;
				$room_cnt[] = $db_room_count +1;
				 $adult_count[] =2*1;
				  $child_count[] =  0;
		    }
			
			if($roomusedtype[$d]=='qu')
			{
				$qu_room_count= $qu_room_count +1;
				$room_cnt[] = $qu_room_count +1;
				 $adult_count[] = 4*1;
				  $child_count[] =  0;
		    }
			if($roomusedtype[$d]=='tr')
			{
				$tr_room_count= $tr_room_count +1;
				$room_cnt[] = $tr_room_count +1;
				 $adult_count[] =  3*1;
				  $child_count[] =  0;
		    }
			if($roomusedtype[$d]=='dbc')
			{
				$room_cnt[] = $dbc_room_cout+1;
				$dbc_room_cout = $dbc_room_cout+1;
			   
			        $adult_count[] =  2;
					$child_count[] =  1;
				
				
			}
			if($roomusedtype[$d]=='dbcc')
			{
				$room_cnt[] = $dbcc_room_cout+1;  
			    $dbcc_room_cout = $dbcc_room_cout+1;  
			    $adult_count[] = 2 ;
				$child_count[] = 2 ;
			}
		}
	
		
			
				if($dbcc_room_cout==1)
				{
				$dbcc_age =array($c_age[0],$c_age[1]);
				}
				if($dbcc_room_cout==2)
				{
				$dbcc_age =array($c_age[0],$c_age[1],$c_age[3],$c_age[4]);
				}
				if($dbcc_room_cout==3)
				{
				$dbcc_age =array($c_age[0],$c_age[1],$c_age[3],$c_age[4],$c_age[6],$c_age[7]);
				}

		
		
			if($dbc_room_cout==1)
				{
				$dbc_age =array($c_age[0]);
				}
				if($dbc_room_cout==2)
				{
				$dbc_age =array($c_age[0],$c_age[3]);
				}
				if($dbc_room_cout==3)
				{
				$dbc_age =array($c_age[0],$c_age[3],$c_age[6]);
				}
				
		
		$mer_id=explode("-",$result_id);
	
		
		$cin= $_SESSION['sd'];
		$cin_val = explode("-",$cin);
		$checkin = $cin_val[2].$cin_val[1].$cin_val[0];	
		$cout= $_SESSION['ed'];
		$cout_val = explode("-",$cout);
		$checkout = $cout_val[2].$cout_val[1].$cout_val[0];	
		  $cin_hb=$checkin;  // checkin date
								 $cout_hb=$checkout;   //checkout date
		
                                
	$roomCode='';
		$rooms='';
		$room1='';
		$data['tot_tariff']=$totalamt;
		$j=0;
		$roomusedtype=$_SESSION['room_used_type'];
		$count=count($roomusedtype);
		$roomusedtype=$_SESSION['room_used_type'];
		$roomcount=$room_cnt;
		//echo "<pre/>";
	//	print_r($roomTypeVal);exit;
	
		
$room1ss='';
 $chi ='';
	for($k=0;$k <  count($mer_id);$k++)
		{
			$attribr5=$this->Hotel_Model->get_cancel_attrib_new($mer_id[$k]);
			 $token=trim($attribr5->token);
			  $contractnameVal=trim($attribr5->contractnameVal);
			   $inoffcode=trim($attribr5->inoffcode);
			 $codev1=trim($attribr5->hotel_code);  // hotel code
								 $destCodeVal=trim($attribr5->destCodeVal);  //destination code
								 $ck='';
								 
								 if($attribr5->child > 0)
								 {
									 $dd=$attribr5->room_count*$attribr5->child;
								 for($hh=0;$hh < $dd; $hh++)
								 {
									 
									 $chi .='<Customer type = "CH">
											<Age>4</Age>
										</Customer>';
								 }
								 }
								 else
								 {
									 $chi .='';
								 }
			$room1ss.='<AvailableRoom>
					<HotelOccupancy>
						<RoomCount>'.$attribr5->room_count.'</RoomCount>
						<Occupancy>
								<AdultCount>'.$attribr5->adult.'</AdultCount>
							<ChildCount>'.$attribr5->child.'</ChildCount>
						<GuestList>
								<Customer type="AD"/>
								'.$chi.'
						</GuestList>
							
						</Occupancy>
					</HotelOccupancy>
					<HotelRoom SHRUI="'.$attribr5->shurival.'" >
						<Board type="SIMPLE" code="'.$attribr5->board_type.'" shortname="'.$attribr5->shortname.'"/>
						<RoomType type="SIMPLE" code="'.$attribr5->room_code.'" characteristic="'.$attribr5->charval.'"/>
					</HotelRoom>
				</AvailableRoom>';	
				
				
			
		}
		//echo '<pre/>';
		//echo $room1ss;exit;
	$rooms=$room1ss; 
	
	
	//echo $rooms; exit();
		if($_SERVER['HTTP_HOST']=='localhost')
			{					
	$user="HTLEXPLORAE64882";
			$pass="HTLEXPLORAE64882";
			$URL = "http://212.170.239.71/appservices/http/FrontendService";//local
		}
			else
			{
	$user="HTLEXPLORAE64882";
			$pass="HTLEXPLORAE64882";
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
	//	echo $xmls;exit;
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
				$this->Hotel_Model->insert_booking_attrib($criteria_id,'hotelsbed',$purTokenVal,$serviceval,$canceldisplayValc,$dateFromValc,$dateToValc);
		
		$cancel_req='ok';
		} 
		else
		{
			$cancel_req='';
		}
		
		$cancel_amt_eur=array();
		if($cancel_req!='')
		{
		
			$cancel_policy='';
			
								
		 if($data['contract_remarks']=='')
		 {
			$_SESSION['contract_remarks']='No remarks given by hotel';
			$contract_remarks="No remarks given by hotel<br>";
		 }
		 else
		 {
			 $_SESSION['contract_remarks']=$data['contract_remarks'];
			 $contract_remarks=$data['contract_remarks'].'<br>';
		 }
		 
   $cancel_policy .= $contract_remarks;
			 
			     
      for($i=0;$i< count($rtname);$i++)
      {
		    $cancel_policy .= ' Cancellation Made  For '.$rtname[$i].' ' ;
// CONVERT TO EURO 
//   if($currencyCode !='USD' )
//   {
//   $cur_val=$this->B2b_Hotel_Model->get_currency_val($currencyCode);
//    $cancel_amt_eur = number_format($amt[$i] / $cur_val,2,'.','');
//   }
//  else
// {
	$cancel_amt_eur_org = number_format($amt[$i] ,2,'.','');
	if($currencyCode !='USD')
											 {
												 $c_val1 =$this->Hotel_Model->get_currecy_detail($currencyCode);
												
												 $c_val = $c_val1->value;
												 if($c_val !='')
												 {
												 $org_amt_cancel=$amt[$i] /  $c_val;
												
												 }
												 else
												 {
													
													 $org_amt_cancel=$amt[$i];
												
												
												 }
											 }
											 else
											 {
												 $org_amt_cancel=$amt[$i];
											 }
    $cancel_amt_eur[] = number_format($org_amt_cancel ,2,'.','');
//}
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
        $cancel_policy .= ' '.$date.'-'.$mon.'-'.$year.', '.'Time'.$hour.':'. $min;
                   //  echo $cancel_amt_eur_org.' ';
                  $cancel_policy .= ' Will Be Charged '.$cancel_amt_eur_org.' '.$currencyCode; 
       $newdate3=$year.'-'.$mon.'-'.$date;
      
                      $cancel_policy .=  '<br/>';
					  } 
             
       $data['cancel_policy']=$cancel_policy;
           
			}
		else
		{
			$data['cancel_policy']='Nil';
		}
		//echo '<pre/>';
		//print_r($cancel_amt_eur);
           $data['new_cancelaion_till_date']=$year.'-'.$mon.'-'.$date;
			$data['new_cancelaion_charge']=array_sum($cancel_amt_eur);
		//echo $data['new_cancelaion_charge'];  
		$this->load->view('hotel/pre_booking',$data);
		
		
		}
		else
		{
			
			$data['error']=$Messageval;
			$this->load->view('hotel/error_page',$data);
			//echo $Messageval;exit;
		}
	
			
			
			}
	    elseif($api=='gta')
		{
			
				
		$sec_res=$_SESSION['ses_id'];
		
			
			$data['hotel_facility'] = $this->Hotel_Model->get_facility_details($hotel_code);
			
			
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
					$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$dbc_room_cnt.'" Id="'.trim($room).'">
								<ExtraBeds>
									<Age>5</Age>
									<Age>7</Age>
								</ExtraBeds>

							</Room>';
				}else if($dbc_room_cnt=='3'){
					$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$dbc_room_cnt.'" Id="'.trim($room).'">
								<ExtraBeds>
									<Age>5</Age>
									<Age>7</Age>
									<Age>5</Age>
								</ExtraBeds>

							</Room>';
					}
					else
					{
						$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$dbc_room_cnt.'" Id="'.trim($room).'">
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
$URL2 = "https://interface.demo.gta-travel.com/wbsapi/RequestListenerServlet";//local demo
		

		$city=$_SESSION['city'];
		$city_val = $this->Hotel_Model->get_city_code($city);  
		$city_code = $city_val->gta;
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
	//echo $xml_data;
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
		//echo $output;
				    $dom=new DOMDocument(); 
					$dom->loadXML("$output"); 
					//echo $xml_data;exit;
					$day=$dom->getElementsByTagName("Condition"); 
				
				if(isset($day) && !empty($day))
				{
				//	echo 'sdsdas';exit;
					$i=0;
					foreach($day as $val)
					{
						
						$dayfromval[]=$day->item($i)->getAttribute("FromDay"); 
						$daytoval[]=$day->item($i)->getAttribute("ToDay"); 
						$charge[]=$day->item($i)->getAttribute("Charge"); 
						//echo $day->item($i)->getAttribute("ChargeAmount"); exit;
						 $currencyVal="USD";
						  
						$amt[]= $day->item($i)->getAttribute("ChargeAmount");
							
							
						$currency[]=$day->item($i)->getAttribute("Currency");
						
						$allowable[]=$day->item($i)->getAttribute("Allowable");
						
						$cday=$val->getElementsByTagName("1_attr"); 
					
						$i++;
					}
					
						
					$val_countterms= count($dayfromval);
				} 
			//	echo '<pre/>';
				//print_r($amt);print_r($daytoval);
				//print_r($dayfromval);exit;
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
			$out=explode("-",$_SESSION['sd']);
			
			$gta_cancel_policy='';
								$checkin1=$out[2]."-".$out[1]."-".$out[0];
								//echo $checkin1.'--';
									if(isset($dayfromval[1]))
									{ 
					$newdate0 = strtotime ( "-$dayfromval[1] day" , strtotime ($checkin1) ) ;
					$cancel_todate0 = date ( 'd-M-Y' , $newdate0 );		
					//echo $cancel_todate0;exit;
								
					$val1=$dayfromval[1]+1;
					$newdate1 = strtotime ( "-$val1 day" , strtotime ($checkin1) ) ;
					$cancel_todate1 = date ( 'd-M-Y' , $newdate1 );
					
					
					$gta_cancel_policy .= 'Before '.$cancel_todate0.' No Charges Apply For Booking. ';
					}
											if($currency[0] !='USD')
											 {
												 $c_val1 =$this->Hotel_Model->get_currecy_detail($currency[0]);
												
												 $c_val = $c_val1->value;
												 if($c_val !='')
												 {
												 $org_amt_cancel=$amt[0] /  $c_val;
												
												 }
												 else
												 {
													
													 $org_amt_cancel=$amt[0];
												
												
												 }
											 }
											 else
											 {
												 $org_amt_cancel=$amt[0];
											 }
		 			if(isset($dayfromval[0]))
		            {
						//if($dayfromval[0]!=0)
						//{
					$newdate2 = strtotime ( "-$dayfromval[0] day" , strtotime ($checkin1) ) ;
					$cancel_fromdate2 = date ( 'd-M-Y' , $newdate2);
					$tonewdate = strtotime ( "-$daytoval[0] day" , strtotime ($checkin1) ) ;
					$cancel_todate2 = date ( 'd-M-Y' , $tonewdate);
					//	}
					//	else
					//	{
						//	$tonewdate = strtotime ( "-$dayfromval[0] day" , strtotime ($checkin1) ) ;
				      //  	$cancel_todate2 = date ( 'd-M-Y');
					//	}
					$api4="gta";	
					// $agtid=$this->session->userdata('agentid');
					/* $service1=$this->Search_Model->get_markup_user($api4);
					 $markuph=$service1->Markup;
					 $commissionh=$service1->Commission;
					 $camt=$amt1;
					 $finalcosttype=$camt+$camt*$markuph/100;	*/
					 // $finalcosttype=ceil($amt1);	
				
					$amt0=ceil($amt0);
					/*$camt=$amt0;
					 $finalcosttype=$camt+$camt*$markuph/100;	
					  $finalcosttype=ceil($finalcosttype);	*/	
					
					$gta_cancel_policy .= 'Onwards '.$cancel_todate2.' Charges Will Apply  '.$org_amt_cancel.' USD ';
						
						
						
		          }
				  else
				  {
				 
					//$amt0=ceil($amt0);
					$gta_cancel_policy .= ' Full Charges Will Apply ';
				  }
				  		
					
			$data['cancel_policy']=$gta_cancel_policy;
			$data['new_cancelaion_till_date']=$cancel_todate2;
			$data['new_cancelaion_charge']=$org_amt_cancel;

					
		
			
		
			$data['api'] = 'gta';
			if($data['lat'] !='' && $data['long']!='')
			{
			$data['nearby_hotel']=$this->Hotel_Model->get_nearby_hotels($data['lat'],$data['long'],$data['hotel_name'],$data['dest']);
			}
			else
			{
			$data['nearby_hotel']='';	
			}
			
				$data['img_array'][]= WEB_DIR.'image_gta/'.$hotel_code.'.jpg';
			
	$this->load->view('hotel/pre_booking',$data);	
			}
		elseif($api=='travco')
		{
			
				
		   $sec_res=$_SESSION['ses_id'];
		
			$data['hotel_facility'] = $this->Hotel_Model->get_facility_details($hotel_code);
			
			
			$data['hotelCode']=$hotel_code;
			
			$data['star']=$service->star;
			$data['phone']=$service->phone;
			$data['location']=$service->location;
			$room=$service->room_code;
			$data['lat']=$service->latitude;
			$data['long']=$service->longitude;
			$data['hotel_name']=$service->hotel_name;
			$cancel_val=$service->token;
			$data['description'] = $service->description;
			$data['address'] = $service->address;
			$data['dest'] = $service->city ;
			$room_used_type=$_SESSION['room_used_type'];
		$city=$_SESSION['city'];
		$sd=$_SESSION['sd'];
		$room_count=$_SESSION['room_count'];
		$ed=$_SESSION['ed'];
		
		
		$in = explode("-",$sd);
		 switch($in[1])
					{
					case '01':
					$checkin=$in[0]."/"."Jan"."/".$in[2];
					break;
					case '02':
					$checkin=$in[0]."/"."Feb"."/".$in[2];
					break;
					case '03':
					$checkin=$in[0]."/"."Mar"."/".$in[2];
					break;
					case '04':
					$checkin=$in[0]."/"."Apr"."/".$in[2];
					break;
					case '05':
					$checkin=$in[0]."/"."May"."/".$in[2];
					break;
					case '06':
					$checkin=$in[0]."/"."Jun"."/".$in[2];
					break;
					case '07':
					$checkin=$in[0]."/"."Jul"."/".$in[2];
					break;
					case '08':
					$checkin=$in[0]."/"."Aug"."/".$in[2];
					break;
					case '09':
					$checkin=$in[0]."/"."Sep"."/".$in[2];
					break;
					case '10':
					$checkin=$in[0]."/"."Oct"."/".$in[2];
					break;
					case '11':
					$checkin=$in[0]."/"."Nov"."/".$in[2];
					break;
					case '12':
					$checkin=$in[0]."/"."Dec"."/".$in[2];
					break;
					}
		$cin = $checkin;
		$out = explode("-",$ed);
	              


					switch($out[1])
					{
					case '01':
					$checkout=$out[0]."/"."Jan"."/".$out[2];
					break;
					case '02':
					$checkout=$out[0]."/"."Feb"."/".$out[2];
					break;
					case '03':
					$checkout=$out[0]."/"."Mar"."/".$out[2];
					break;
					case '04':
					$checkout=$out[0]."/"."Apr"."/".$out[2];
					break;
					case '05':
					$checkout=$out[0]."/"."May"."/".$out[2];
					break;
					case '06':
					$checkout=$out[0]."/"."Jun"."/".$out[2];
					break;
					case '07':
					$checkout=$out[0]."/"."Jul"."/".$out[2];
					break;
					case '08':
					$checkout=$out[0]."/"."Aug"."/".$out[2];
					break;
					case '09':
					$checkout=$out[0]."/"."Sep"."/".$out[2];
					break;
					case '10':
					$checkout=$out[0]."/"."Oct"."/".$out[2];
					break;
					case '11':
					$checkout=$out[0]."/"."Nov"."/".$out[2];
					break;
					case '12':
					$checkout=$out[0]."/"."Dec"."/".$out[2];
					break;
					}
		$cout = $checkout;
		
	$days = $_SESSION['days'];

			 $agentcode='133YZA'; //live
			$agentpwd='130611YZ31'; //live
			   $URL ="http://xmlv5test.travco.co.uk/trlink/link1/trlink";
			$name_space = 'http://xmlv5test.travco.co.uk/trlink/schema/HotelAvailabilityV6Snd.xsd';//live
		
								   /*  $agentcode='133YZA'; //travco//local
			$agentpwd='250112XIAE'; //travco//local
			//$URL ="http://xmlv5test2.travco.co.uk/trlink/link1/trlink";//test
			$URL = "http://xmlv6.travco.co.uk/trlink/link1/trlink";//live
			//$name_space = "http://xmlv5test.travco.co.uk/trlink/schema/HotelAvailabilityV6Snd.xsd";
			$name_space = 'http://xmlv6.travco.co.uk/trlink/link1/trlink';//live
			*/
	$xml_data="<?xml version='1.0' encoding='UTF-8'?>
		<BOOKING type='HCAD' lang='en-GB' returnURLNeed='no' returnURL='http://' AGENTCODE='".$agentcode."' AGENTPASSWORD='".$agentpwd."' xmlns:xsi='http://www.w3.org/2001/XMLSchema-instance' xsi:noNamespaceSchemaLocation='".$name_space."'>
			<HEADER>
				<INTERNAL_CODE1>DWEBCN</INTERNAL_CODE1>
				<INTERNAL_CODE2>ENQUIRE</INTERNAL_CODE2>
				<INTERNAL_CODE3>VB</INTERNAL_CODE3>
			</HEADER>
			<DATA	HOTEL_CODE='".$hotel_code."' CHECK_IN_DATE='".$cin."'	DURATION='".$days."'	CCHARGES_CODE='".$cancel_val."'/>
		</BOOKING>
		";
//echo $xml_data;
        $ch = curl_init($URL);

	//	curl_setopt($ch, CURLOPT_MUTE, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml'));
		curl_setopt($ch, CURLOPT_POSTFIELDS, "$xml_data");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$cancel_out = curl_exec($ch);
		
		curl_close($ch);
			//echo $cancel_out;exit;
		$dom=new DOMDocument();
					$dom->loadXML($cancel_out);
					
					   $cdetails=$dom->getElementsByTagName("DETAILS");
					   $z=0;
						foreach($cdetails as $cdetails1)
						{
						//echo count($cdetails1);
						 $daysbefore[]=$cdetails->item($z)->getAttribute("NO_OF_DAYS_BEFORE_ARRIVAL");
						
						 $dateToVal[]=$cdetails->item($z)->getAttribute("EFFECTIVE_FROM");
						
						 $dateFromTimeVal[]=$cdetails->item($z)->getAttribute("TIME_AFTER");
						
						$cancelMsg=$cdetails1->getElementsByTagName("MESSAGE");
						 $dateFromVal[]=$cancelMsg->item(0)->getAttribute("LAST_DATE_BY_WHICH_TO_CANCEL");
						 $dateToTimeVal[]=$cancelMsg->item(0)->getAttribute("TIME_BEFORE");
						
						$cancelDesc=$cdetails1->getElementsByTagName("FULL_CANCELLATION_POLICY");
						 $cancelDescVal[]=$cancelDesc->item(0)->nodeValue;
						$z++;
						}	
						$count=count($daysbefore);
						//print_r($daysbefore);
						$travco_cancel_policy='';
						  $a=explode("-",$result_id);
				  $sec_res=$_SESSION['ses_id'];
				  $cost=0;
				  for($k=0;$k< count($a);$k++)
				  {
					 $b=  $this->Hotel_Model->fetch_gta_temp_result_room_result_id($sec_res,$a[$k]);
					$cost = $cost + $b->total_cost;  
					 }
					 $org_cancel_charge = number_format($cost/$_SESSION['days'],'2','.','');
						if($count==1)
						{
//$travco_cancel_policy .=  'UpTo:'.$dateToTimeVal[0].' '.$dateFromVal[0].' '.'No Charges To Apply'.'<br>';
$travco_cancel_policy .=  'Upto '.$dateFromVal[0].', Time: '.$dateToTimeVal[0].'No Charges To Apply'.'<br>';

//$travco_cancel_policy .= 'upto:'.$dateToTimeVal[0].' '.$dateFromVal[0].' '.$cancelDescVal[0].'will be charged '.$org_cancel_charge.' USD<br>';

$travco_cancel_policy .=  'After '.$dateFromVal[0].', Time: '.$dateToTimeVal[0].' '.$cancelDescVal[0].' Will Be Charged '.$org_cancel_charge.' USD<br>';					
						}
						elseif($count==2)
						{
	
$travco_cancel_policy .=  'UpTo '.$dateFromVal[0].', Time: '.$dateToTimeVal[0].'No Charges To Apply'.'<br>';

$travco_cancel_policy .= 'UpTo:'.$dateFromVal[1].', Time:  '.$dateToTimeVal[0].' '.$cancelDescVal[0].'will be charged '.$org_cancel_charge.' USD<br>';

$travco_cancel_policy .=  'After '.$dateFromVal[1].', Time: '.$dateToTimeVal[0].' '.$cancelDescVal[1].' Will Be Charged '.$org_cancel_charge.' USD<br>';					
					}				
	
                   
                    
                 
			$data['cancel_policy']=$travco_cancel_policy;
					
		
		
			$data['api'] = 'travco';
			if($data['lat'] !='' && $data['long']!='')
			{
			$data['nearby_hotel']=$this->Hotel_Model->get_nearby_hotels($data['lat'],$data['long'],$data['hotel_name'],$data['dest']);
			}
			else
			{
			$data['nearby_hotel']='';	
			}
			
			$hotel_image= $this->Hotel_Model->gethb_hotelimage_new($hotel_code);
					if($hotel_image!="")
					{
						$img1=array();
						for($i=0;$i< count($hotel_image); $i++)
						{
							 $img=$hotel_image[$i]->path;
							 $img1[]= "http://www.travco.co.uk/images/hotel_pics" . $img;
						}
						$data['img_array']=$img1;
					}
					else
					{
						$img1="";
						$data['img_array']="";
					}	
				  $a=explode("-",$result_id);
				  $sec_res=$_SESSION['ses_id'];
				  $cost=0;
				  for($k=0;$k< count($a);$k++)
				  {
					 $b=  $this->Hotel_Model->fetch_gta_temp_result_room_result_id($sec_res,$a[$k]);
					$cost = $cost + $b->total_cost;  
					 }
					
//$newDate = date("Y-m-d", strtotime($dateFromVal[0]));
$ff=explode("/",$dateFromVal[0]);
$checkouzt='';
	switch($ff[1])
					{
					case 'Jan':
					$checkouzt=$ff[2]."-"."01"."-".$ff[0];
					break;
					case 'Feb':
					$checkouzt=$ff[2]."-"."02"."-".$ff[0];
					break;
					case 'Mar':
					$checkouzt=$ff[2]."-"."03"."-".$ff[0];
					break;
					case 'Apr':
					$checkouzt=$ff[2]."-"."04"."-".$ff[0];
					break;
					case 'May':
					$checkouzt=$ff[2]."-"."05"."-".$ff[0];
					break;
					case 'Jun':
					$checkouzt=$ff[2]."-"."06"."-".$ff[0];
					break;
					case 'Jul':
					$checkouzt=$ff[2]."-"."07"."-".$ff[0];
					break;
					case 'Aug':
					$checkouzt=$ff[2]."-"."08"."-".$ff[0];
					break;
					case 'Sep':
					$checkouzt=$ff[2]."-"."09"."-".$ff[0];
					break;
					case 'Oct':
					$checkouzt=$ff[2]."-"."10"."-".$ff[0];
					break;
					case 'Nov':
					$checkouzt=$ff[2]."-"."11"."-".$ff[0];
					break;
					case 'Dec':
					$checkouzt=$ff[2]."-"."12"."-".$ff[0];
					break;
					}
				$data['new_cancelaion_till_date']=$checkouzt;
			$data['new_cancelaion_charge']= number_format($cost/$_SESSION['days'],'2','.','');
				 
	$this->load->view('hotel/pre_booking',$data);	
			}
			elseif($api=='dotw')
		{
			
				
		$sec_res=$_SESSION['ses_id'];
		
			
			$data['hotel_facility'] = $this->Hotel_Model->get_facility_details($hotel_code);
			
			
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
		$city_val = $this->Hotel_Model->get_city_code($city);  
		$city_code = $city_val->gta;
		
		$cinval = explode("-",$sd);
		$cin = $cinval[2].'-'.$cinval[1].'-'.$cinval[0];
		$coutval = explode("-",$ed);
		$cout = $coutval[2].'-'.$coutval[1].'-'.$coutval[0];
		$s_amount = explode(".",$service->destCodeVal);
		$amountstt= substr($service->contractnameVal, 0, 10);
			$gta_cancel_policy = 'Before '.$service->contractnameVal.' No Charges Apply For Booking. Onwards '.$service->contractnameVal.' Charges Will Apply '.($s_amount[0]+1).' USD ';
		
				  		
					
			$data['cancel_policy']=$gta_cancel_policy;
			$data['new_cancelaion_till_date']=$amountstt ;
			$data['new_cancelaion_charge']=$s_amount[0]+1 ;

					
		
			
		
			$data['api'] = 'dotw';
			if($data['lat'] !='' && $data['long']!='')
			{
			$data['nearby_hotel']=$this->Hotel_Model->get_nearby_hotels($data['lat'],$data['long'],$data['hotel_name'],$data['dest']);
			}
			else
			{
			$data['nearby_hotel']='';	
			}
			
				$data['img_array'][]= '';
			
	$this->load->view('hotel/pre_booking',$data);	
			}
			else
			{
			
		$sec_res=$_SESSION['ses_id'];
					
		
			
			$data['hotel_facility'] = $this->Hotel_Model->get_facility_details($hotel_code);
			
			
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
		if(isset($_POST['process_id_fin']))
		{
		$pro_idd=explode("|||",$_POST['process_id_fin']);	
		$hotel_proid = $pro_idd[0];
		$amountv4 = $pro_idd[1];
		$room = $pro_idd[2];
		$amountv3 = $pro_idd[3];
		$boardType = $pro_idd[4];
		$org_amt = $pro_idd[5];
		$currencyv1 = $pro_idd[6];
		$c_val = $pro_idd[7];
		$amountv3pay = $pro_idd[8];
	
	 
		$this->Hotel_Model->Update_room_type_in_search_result($result_id,$hotel_proid,$amountv4,$room,$amountv3 ,$boardType,$org_amt,$currencyv1,$c_val,$amountv3pay);
	
		}
		
		set_time_limit (0);
	$time=time();
	$vat_time=date('Y-m-d')." "."T".date('h:i:s');
	
	$client = new SoapClient("http://api.hotelspro.com/4.1_test/hotel/b2bHotelSOAP.wsdl", array('trace' => 1));
    $processId=$hotel_proid;
 
		try {
		$data['errordesc']='';
		$getHotelCancellationPolicy = $client->getHotelCancellationPolicy("d2FBL3FqTkhiNmJ1SU1Zb0hyZDBGWXB6VHZtVHpNNy9wOFh4YXpBa3FzcEVlWm9qRDNsTy96Q3ZBcjlYcEJzMw==", $processId);
		}
		catch (SoapFault $exception)
		{
		
		$data['errordesc'] = $exception->getMessage();
		
		} 

  if($data['errordesc']!='')
  {
$data['error']=$data['errordesc'];
						 $this->load->view('hotel/error_page',$data);
					
  }
  else
  {
	
	
	  $val=array();
		$val1=array();
		$policies = is_array($getHotelCancellationPolicy->cancellationPolicy) ? $getHotelCancellationPolicy->cancellationPolicy : array($getHotelCancellationPolicy->cancellationPolicy);
		//echo "<pre/>";print_r($policies);
		foreach ($policies as $policy) {
         $val[]= $policy->cancellationDay;
		 if(isset($policy->currency))
		 {
          $val1[]=  $policy->currency;
		 }
		 else
		 {
			 $val1[]="USD";
		 }
		 if(isset($policy->feeAmount))
		 {
          $feeAmount[]=  $policy->feeAmount;
		 }
		 else
		 {
			 $feeAmount[]="";
		 }
		  if(isset($policy->feeType))
		 {
          $feeType[]=  $policy->feeType;
		 }
		 else
		 {
			 $feeType[]="";
		 }
		  if(isset($policy->cancellationDay))
		 {
          $cancellationDay[]=  $policy->cancellationDay;
		 }
		 else
		 {
			 $cancellationDay[]="";
		 }
		  if(isset($policy->remarks))
		 {
          $remarks[]=  $policy->remarks;
		 }
		 else
		 {
			 $remarks[]="";
		 }
      
   //  $policy->remarks;
            }
			if($feeType[0]!='')
			{
				if($feeType[0]=='Night')
				{
					$per_ngt=$amountv4/$_SESSION['days'];
					
					$cancelamount1=ceil($per_ngt * $feeAmount[0]);
				}
				elseif($feeType[0]=='Percent')
					{
					
					$cancelamount1=($amountv4/100)*$feeAmount[0];
					
					}
					elseif($feeType[0]=='Amount')
					{
					
					$cancelamount1=$feeAmount[0];
					
					}
					
			}
			if($feeType[1]!='')
			{
				if($feeType[1]=='Night')
				{
				$per_ngt=$amountv4/$_SESSION['days'];
					
					$cancelamount2=ceil($per_ngt * $feeAmount[0]);
				}
				elseif($feeType[1]=='Percent')
					{
					
					$cancelamount2=($amountv4/100)*$feeAmount[1];
					
					}
					elseif($feeType[1]=='Amount')
					{
					
					$cancelamount2=$feeAmount[1];
					
					}
					
			}


		$day_before_check=$val[0];

		$data['charge_ty']=$val1[0];
		$data['charge_amt']=$cancelamount1;

		$data['hotel_code']=$hotel_code;
		$data['hotel_proid']=$hotel_proid;
		$data['result_id']=$result_id;
		$data['api']='hotelspro';
	
		  $cancel='Cancellation penalty for cancellation made within '.$cancellationDay[0].' days of the '.$_SESSION['sd'].'
						  '.$cancelamount1.' '.$val1[0].' Charges Will Apply<br>';
			$cancel .='Cancellation penalty for cancellation made within '.$cancellationDay[1].' days of the '.$_SESSION['sd'].'
						  '.$cancelamount2.' '.$val1[1].' Charges Will Apply';

						  
                     $cancel .='<br>'.$remarks[0].'<br>'.$remarks[1];
					//echo $cancel;exit;
        $data['cancel_policy']=$cancel;
		$data['new_cancelaion_till_date']=  Date('Y-m-d', strtotime("-$cancellationDay[0] days" , strtotime ( $_SESSION['sd'] )));
			$data['new_cancelaion_charge']= $cancelamount1;
			
			$data['api'] = 'hotelspro';
			if($data['lat'] !='' && $data['long']!='')
			{
			$data['nearby_hotel']=$this->Hotel_Model->get_nearby_hotels($data['lat'],$data['long'],$data['hotel_name'],$data['dest']);
			}
			else
			{
			$data['nearby_hotel']='';	
			}
			
		$this->load->view('hotel/pre_booking',$data);
  }
			
			}
		}
		
		else
		{

          $_SESSION['book_final_book_val'] = $_POST;
          redirect("hotel/booking_final",'refresh');
		}
	
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
	//echo 'sdas'
//	for($j=0;$j< count($id_1);$j++)
	//{
	// $service =$this->Hotel_Model->get_searchresult($id_1[$j]);
//	$hotel_id .= $service->hotel_code.'-'.$hotel_id;
//	$roomcat .=$service->room_code.'-'.$roomcat;
 //   $roomty .=$service->room_type.'-'.$roomty;
//	}
	
	$fname = $value['fname'];
	//print_r($gender);exit;
	$lname = $value['lname'];
	$gender = $value['sal'];
	// $guest_name = array('test'); 

		 for($i=0; $i< count($fname); $i++)
	 {

			if($i==0){
				$parent_id = 0;
			}
			$data1 = array(
			     //'flight_booking_id' => $flight_booking_ids,
				 'group' => 1,
				 'gender' => $gender[$i],
				 'last_name' => $lname[$i], 
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
		
		$data['gender_co']=$gender[0];
		$data['surname_co']=$lname[0];
		$data['middle_co']='';
		$data['name_co']=$fname[0];
		$data['city_co']=$value['city'];
		$data['mobile_co']=$value['pin'];
		$data['country_co']=$value['country'];
				$data['address_co']=$value['address'];
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
					 'email' => $data['email_co'],
					 'country' => $data['country_co'], 
					 'address' => $data['address_co']
				);
				
					$user_id = 0;
				
				$this->db->insert('customer_contact_details', $data4); 
				$parent_customer_id = $this->db->insert_id();
		$data5 = array(
		 'product_id' => 2,
		 'user_id' => $user_id,
		 'user_type'=> 4,
		 'amount' => $value['amount'],
		  'gateway' => $value['payment_charge'],
		   'cancellation_till_date' => $value['cancel_till_n'],
		  'cancellation_till_charge' => $value['cancel_charge_n'],
		   'net_amount' => $value['org_amt'],
		    'markup' => $value['markup'],
			 'currency_val' => $value['currency_val'],
			  'xml_currency' => $value['xml_currency'],
		 'customer_contact_details_id' => $parent_customer_id, 
		 'created_date' => date("Y-m-d")
	);
	
	$this->db->insert('transaction_details', $data5); //exit;
	$parent_transaction_id = $this->db->insert_id();
	
	//$this->booking_final_pay($id,$parent_transaction_id);
		
		redirect('hotel/booking_final_pay/'.$id.'/'.$parent_transaction_id, 'refresh');
		
	}
	function booking_final_pay_old($result_id,$parent_transaction_id)
	{	
	//echo "<pre/>";
	//print_r($_SESSION);exit;
	$room_count = $_SESSION['room_count'];


		if($room_count == 1)
		{
			
			$service=$this->Hotel_Model->get_searchresult($result_id);
			$h_hotel_id = $service->hotel_code;
			$h_hotel_name = $service->hotel_name;
			$h_star = $service->star;
			$h_description = $service->description;
			$h_address = $service->address;
			$h_city = $service->city;
			$h_phone = $service->phone;
			$h_fax = $service->fax;
			
			$trans=$this->Hotel_Model->transation_detail($parent_transaction_id);
			
	 		$trans_id = $trans->customer_contact_details_id;
		
			
	 		$contact_info=$this->Hotel_Model->contact_info_detail_update($trans_id);
			//	echo "<pre/>";
			//print_r($contact_info);exit;
            $con_id = $contact_info->customer_info_details_id;
	 		$pass_info=$this->Hotel_Model->pass_info_detail($con_id);
			$con_id_org =$contact_info->customer_contact_details_id;
	//	echo $con_id_org;
			//echo "<pre/>";
			//print_r($pass_info);exit;
		}
		else
		{
			$result_id1 = explode("-",$result_id);
			$service=$this->Hotel_Model->get_searchresult($result_id1[0]);
			$h_hotel_id = $service->hotel_code;
			$h_hotel_name = $service->hotel_name;
			$h_star = $service->star;
			$h_description = $service->description;
			$h_address = $service->address;
			$h_city = $service->city;
			$h_phone = $service->phone;
			$h_fax = $service->fax;
			
			$trans=$this->Hotel_Model->transation_detail($parent_transaction_id);
			
	 		$trans_id = $trans->customer_contact_details_id;
		
			
	 		$contact_info=$this->Hotel_Model->contact_info_detail_update($trans_id);
			//	echo "<pre/>";
			//print_r($contact_info);exit;
            $con_id = $contact_info->customer_info_details_id;
	 		$pass_info=$this->Hotel_Model->pass_info_detail($con_id);
			$con_id_org =$contact_info->customer_contact_details_id;
			//$trans=$this->Hotel_Model->transation_detail($parent_transaction_id);
	 		//$trans_id = $trans->customer_contact_details_id;
	 		//$contact_info=$this->Hotel_Model->contact_info_detail($trans_id);
           // $con_id = $contact_info->customer_info_details_id;
	 		//$pass_info=$this->Hotel_Model->pass_info_detail($con_id);
	 
		
			
		}
		 $h_room_type = $_SESSION['book_final_book_val']['room_type'];
		 $h_cancel_policy = $_SESSION['book_final_book_val']['cancel_policy'];
		 
	
	
	// echo "<pre/>";print_r($contact_info);exit;
	 if($service->api == 'hotelsbed')
	 {
		 $res_id=explode('-',$result_id);
		for($rs=0;$rs< count($res_id);$rs++)
		{
		  $search=$this->Hotel_Model->get_cancel_attrib_new($res_id[$rs]);
		  $adults[]=$search->adult;
		  $childs[]=$search->child;
		
		}
	
		$h_adult = implode("-",$adults);
		$h_child = implode("-",$childs);
		$data['guestadult']=$guestadult=array_sum($adults);
		$data['guestchild']=$guestchild=array_sum($childs);
		
			$address=$contact_info->city;
			
			
			$api='hotelsbed';
			$fname1=array();$lname1=array();
			for($si=0;$si< count($pass_info); $si++)
			{
			 $fname1=$pass_info[$si]->first_name;			 
			 $lname1=$pass_info[$si]->last_name;			
			}
			 $roomusedtypeval=$_SESSION['room_used_type'];
			 $roomcount=$_SESSION['room_count'];
			 $child_age=$_SESSION['child_age'];
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
		//	echo "<pre/>";
		//print_r($roomusedtypeval);exit;
		$sb_room_cnt=0;
		$db_room_cnt=0;
		$dbc_room_cnt=0;
		$dbcc_room_cnt=0;
		$tb_room_cnt=0;
		$q_room_cnt=0;
		
$c_age=$_SESSION['child_age'];
		for($k=0;$k< $room_count;$k++)
		{
			if($roomusedtypeval[$k]=='sb')
			{
				$sb_room_cnt =$sb_room_cnt + 1;
			}
			if($roomusedtypeval[$k]=='db')
			{
				$db_room_cnt =$db_room_cnt + 1;
			}
			if($roomusedtypeval[$k]=='dbc')
			{
				$dbc_room_cnt =$dbc_room_cnt + 1;
				
			
			}
			if($roomusedtypeval[$k]=='dbcc')
			{
				$dbcc_room_cnt =$dbcc_room_cnt + 1;
				//echo "<pre/>";
				//print_r($room_used_type);exit;
				
				
			}
			if($roomusedtypeval[$k]=='tr')
			{
				$tb_room_cnt =$tb_room_cnt + 1;
			}
			if($roomusedtypeval[$k]=='qu')
			{
				$q_room_cnt =$q_room_cnt + 1;
			}

		}
if($dbcc_room_cnt==1)
				{
				$dbcc_age =array($c_age[0],$c_age[1]);
				}
				if($dbcc_room_cnt==2)
				{
				$dbcc_age =array($c_age[0],$c_age[1],$c_age[3],$c_age[4]);
				}
				if($dbcc_room_cnt==3)
				{
				$dbcc_age =array($c_age[0],$c_age[1],$c_age[3],$c_age[4],$c_age[6],$c_age[7]);
				}


if($dbc_room_cnt==1)
				{
				$dbc_age =array($c_age[0]);
				}
				if($dbc_room_cnt==2)
				{
				$dbc_age =array($c_age[0],$c_age[3]);
				}
				if($dbc_room_cnt==3)
				{
				$dbc_age =array($c_age[0],$c_age[3],$c_age[6]);
				}


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
		elseif($roomusedtypeval[$i]=='tr')
		{
				$roomCode = 'tr'; //'db';
				
	//	echo "sssS";exit;
				$nameval.='<Customer type="AD">
								<CustomerId>'.$m.'</CustomerId>
								<Age>30</Age>
								<Name>'.$fname1[$j].'</Name>
								<LastName>'.$lname1[$j].'</LastName>
							</Customer>';
				$m++;
				$j++;
		}
		elseif($roomusedtypeval[$i]=='dbc')
		{
				$roomCode = 'dbc'; //'db';
		//echo $roomcount[$i];exit;
				if($dbc_room_cnt=='1')
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
					<Age>'.$dbc_age[0].'</Age>
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
				if($dbc_room_cnt=='2')
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
					<Age>'.$dbc_age[0].'</Age>
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
					<Age>'.$dbc_age[1].'</Age>
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
				 if($dbc_room_cnt=='3')
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

					<Age>'.$dbc_age[0].'</Age>
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
					<Age>'.$dbc_age[1].'</Age>
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
					<Age>'.$dbc_age[2].'</Age>
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
		elseif($roomusedtypeval[$i]=='dbcc')
		{
			$roomCode = 'dbcc'; //'db';
			if($dbcc_room_cnt=='1')
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
					<Age>'.$dbcc_age[0].'</Age>
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
					<Age>'.$dbcc_age[1].'</Age>
					</Customer>';
							$m++;
					
			}
			if($dbcc_room_cnt=='2')
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
					<Age>'.$dbcc_age[0].'</Age>
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
					<Age>'.$dbcc_age[1].'</Age>
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
					<Age>'.$dbcc_age[2].'</Age>
					</Customer>';
							$m++;
					$nameval.='<Customer type="CH">
					<CustomerId>'.$m.'</CustomerId>
					<Age'.$dbcc_age[3].'</Age>
					</Customer>';
							$m++;
					
	
			}
			if($dbcc_room_cnt=='3')
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
					<Age>'.$dbcc_age[0].'</Age>
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
					<Age>'.$dbcc_age[1].'</Age>
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
					<Age>'.$dbcc_age[2].'</Age>
					</Customer>';
							$m++;
					$nameval.='<Customer type="CH">
					<CustomerId>'.$m.'</CustomerId>
					<Age>'.$dbcc_age[3].'</Age>
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
					<Age>'.$dbcc_age[4].'</Age>
					</Customer>';
							$m++;
					$nameval.='<Customer type="CH">
					<CustomerId>'.$m.'</CustomerId>
					<Age>'.$dbcc_age[5].'</Age>
					</Customer>';
							$m++;
							
			}
	
	
			}		
	}

$nameval2=$nameval;
//print_r($_SESSION);exit;
	 
         $serviceval=$_SESSION['SPUI'];
		 $purTokenVal=$_SESSION['purchaseToken'];  
          
		$user="HTLEXPLORAE64882";
		$pass="HTLEXPLORAE64882";
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
	

		//echo $xmls;exit;
 
			// $array = $this->Search_Model->xml2array($output);
			
			$dom=new DOMDocument();
			$dom->loadXML($xmls);		  
		  
					
						
			$IncomingOffice=$dom->getElementsByTagName("IncomingOffice");
			
            $IncomingOfficecode = $IncomingOffice->item(0)->nodeValue;
						 
			 
		   
			$bookingItemCode=$dom->getElementsByTagName("FileNumber");
			$bookingItemCodeval='';
			foreach($bookingItemCode as $aaaaaaaa)
			{
            $bookingItemCodeval = $bookingItemCode->item(0)->nodeValue;
			}
			
			
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

    if(isset($_SESSION['logged_in']))
	{
	$user_id = 	$_SESSION['b2c_userid'];
	}
	else
	{
		$user_id=0;
	}
	$nights = $_SESSION['days'] ;
	
	$val_last=$this->Hotel_Model->inser_customer_book_hotelpro($h_hotel_id,$h_hotel_name,$h_star,$h_description,$h_address,$h_phone,$h_fax,$h_room_type,$h_cancel_policy,$cin,$cout,$date,$roomcountss,$user_id,$nights,$trans_id,$h_adult,$h_child,$con_id_org,$dateFromValc,$h_city);
	
 $this->Hotel_Model->inser_customer_book_hotelpro_trans_hotel($con_id_org,$bookingItemCodeval,$user_id,$val_last);
		$this->voucher_email($val_last);	

			redirect('hotel/voucher/'.$val_last, 'refresh');		
		//	print_r($roomusedtypeval);echo '<br/>';print_r($roomcount);exit;
			
			    
			   		
     }
	 else if($service->api == 'gta')
	 {
		  $search=$this->Hotel_Model->get_cancel_attrib_new($result_id);
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
		$city_val = $this->Hotel_Model->get_city_code($city);  
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
	 if(isset($_SESSION['logged_in']))
	{
	$user_id = 	$_SESSION['b2c_userid'];
	}
	else
	{
		$user_id=0;
	}
	$dateFromValc = Date('Y-m-d', strtotime("+3 days" , strtotime ( $cin )));
	$nights = $_SESSION['days'] ;
	$val_last=$this->Hotel_Model->inser_customer_book_hotelpro($h_hotel_id,$h_hotel_name,$h_star,$h_description,$h_address,$h_phone,$h_fax,$h_room_type,$h_cancel_policy,$cin,$cout,$date,$noofroom,$user_id,$nights,$trans_id,$adults,$child,$con_id_org,$dateFromValc,$h_city);
 $this->Hotel_Model->inser_customer_book_hotelpro_trans_hotel($trans_id,$bookingItemCodeval,$user_id,$val_last);
		$this->voucher_email($val_last);	

			redirect('hotel/voucher/'.$val_last, 'refresh');		
			
/*	$val_last=$this->Hotel_Model->inser_customer_book_hotelpro($bookingItemCodeval,$bookingItemCodeval,$statusval,$hotelcodeval,$dateFromValc,$dateToValc,$dateFromValc,$amount,$BoardTypeVal,$bookingItemCodeval,$amount,$amount,'gta',$amount,$api_uni_id,0,$email,'test',$roomcountss,$guestadult,$guestchild,$RoomTypeVal,$cancelpol,1,$amount,$trans_id);
 
 $this->Hotel_Model->inser_customer_book_hotelpro_trans_hotel($trans_id,'',$bookingItemCodeval,$booked_amount_gta,$user_id,$val_last);
		$this->voucher_email($val_last);	
//$this->voucher($val_last);
	redirect('hotel/voucher/'.$val_last, 'refresh');*/			
		//	print_r($roomusedtypeval);echo '<br/>';print_r($roomcount);exit;
			
			    
			   		
     }
	 
	 else if($service->api == 'travco')
	 {
		echo "This is LIVE. Dont Make Booking......";	//redirect('hotel/voucher/'.$val_last, 'refresh');		
			   		
     }
	 
	 
	}
	function booking_final_pay($result_id,$parent_transaction_id)
	{	
	$room_count = $_SESSION['room_count'];


		if($room_count == 1)
		{
			
			$service=$this->Hotel_Model->get_searchresult($result_id);
			$h_hotel_id = $service->hotel_code;
			$h_hotel_name = $service->hotel_name;
			$h_star = $service->star;
			$h_description = $service->description;
			$h_address = $service->address;
			$h_city = $service->city;
			$h_phone = $service->phone;
			$h_fax = $service->fax;
			
			$trans=$this->Hotel_Model->transation_detail($parent_transaction_id);
			
	 		$trans_id = $trans->customer_contact_details_id;
		
			
	 		$contact_info=$this->Hotel_Model->contact_info_detail_update($trans_id);
			//	echo "<pre/>";
			//print_r($contact_info);exit;
            $con_id = $contact_info->customer_info_details_id;
	 		$pass_info=$this->Hotel_Model->pass_info_detail($con_id);
			$con_id_org =$contact_info->customer_contact_details_id;
	//	echo $con_id_org;
			//echo "<pre/>";
			//print_r($pass_info);exit;
		}
		else
		{
			$result_id1 = explode("-",$result_id);
			$service=$this->Hotel_Model->get_searchresult($result_id1[0]);
			$h_hotel_id = $service->hotel_code;
			$h_hotel_name = $service->hotel_name;
			$h_star = $service->star;
			$h_description = $service->description;
			$h_address = $service->address;
			$h_city = $service->city;
			$h_phone = $service->phone;
			$h_fax = $service->fax;
			
			$trans=$this->Hotel_Model->transation_detail($parent_transaction_id);
			
	 		$trans_id = $trans->customer_contact_details_id;
		
			
	 		$contact_info=$this->Hotel_Model->contact_info_detail_update($trans_id);
			//	echo "<pre/>";
			//print_r($contact_info);exit;
            $con_id = $contact_info->customer_info_details_id;
	 		$pass_info=$this->Hotel_Model->pass_info_detail($con_id);
			$con_id_org =$contact_info->customer_contact_details_id;
			//$trans=$this->Hotel_Model->transation_detail($parent_transaction_id);
	 		//$trans_id = $trans->customer_contact_details_id;
	 		//$contact_info=$this->Hotel_Model->contact_info_detail($trans_id);
           // $con_id = $contact_info->customer_info_details_id;
	 		//$pass_info=$this->Hotel_Model->pass_info_detail($con_id);
	 
		
			
		}
		 $h_room_type = $_SESSION['book_final_book_val']['room_type'];
		 $h_cancel_policy = $_SESSION['book_final_book_val']['cancel_policy'];



	 // echo "<pre/>";print_r($contact_info);exit;
	 if($service->api == 'hotelsbed')
	 {
		 $res_id=explode('-',$result_id);
		for($rs=0;$rs< count($res_id);$rs++)
		{
		  $search=$this->Hotel_Model->get_cancel_attrib_new($res_id[$rs]);
		  $adults[]=$search->adult;
		  $childs[]=$search->child;
		
		}
	
		$h_adult = implode("-",$adults);
		$h_child = implode("-",$childs);
		$data['guestadult']=$guestadult=array_sum($adults);
		$data['guestchild']=$guestchild=array_sum($childs);
		
			$address=$contact_info->city;
			
			
			$api='hotelsbed';
			$fname1=array();$lname1=array();
			for($si=0;$si< count($pass_info); $si++)
			{
			 $fname1[]=$pass_info[$si]->first_name;			 
			 $lname1[]=$pass_info[$si]->last_name;			
			}
			 $roomusedtypeval=$_SESSION['room_used_type'];
			 $roomcount=$_SESSION['room_count'];
			 $child_age=$_SESSION['child_age'];
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
		//	echo "<pre/>";
		//print_r($roomusedtypeval);exit;
		$sb_room_cnt=0;
		$db_room_cnt=0;
		$dbc_room_cnt=0;
		$dbcc_room_cnt=0;
		$tb_room_cnt=0;
		$q_room_cnt=0;
		
$c_age=$_SESSION['child_age'];
		for($k=0;$k< $room_count;$k++)
		{
			if($roomusedtypeval[$k]=='sb')
			{
				$sb_room_cnt =$sb_room_cnt + 1;
			}
			if($roomusedtypeval[$k]=='db')
			{
				$db_room_cnt =$db_room_cnt + 1;
			}
			if($roomusedtypeval[$k]=='dbc')
			{
				$dbc_room_cnt =$dbc_room_cnt + 1;
				
			
			}
			if($roomusedtypeval[$k]=='dbcc')
			{
				$dbcc_room_cnt =$dbcc_room_cnt + 1;
				//echo "<pre/>";
				//print_r($room_used_type);exit;
				
				
			}
			if($roomusedtypeval[$k]=='tr')
			{
				$tb_room_cnt =$tb_room_cnt + 1;
			}
			if($roomusedtypeval[$k]=='qu')
			{
				$q_room_cnt =$q_room_cnt + 1;
			}

		}
if($dbcc_room_cnt==1)
				{
				$dbcc_age =array($c_age[0],$c_age[1]);
				}
				if($dbcc_room_cnt==2)
				{
				$dbcc_age =array($c_age[0],$c_age[1],$c_age[3],$c_age[4]);
				}
				if($dbcc_room_cnt==3)
				{
				$dbcc_age =array($c_age[0],$c_age[1],$c_age[3],$c_age[4],$c_age[6],$c_age[7]);
				}


if($dbc_room_cnt==1)
				{
				$dbc_age =array($c_age[0]);
				}
				if($dbc_room_cnt==2)
				{
				$dbc_age =array($c_age[0],$c_age[3]);
				}
				if($dbc_room_cnt==3)
				{
				$dbc_age =array($c_age[0],$c_age[3],$c_age[6]);
				}

	//for($i=0;$i< count($roomusedtypeval);$i++)
	//{
		if($sb_room_cnt >0)
		{
			$roomCode = 'SB';
			if($sb_room_cnt=='1')
			{
				$nameval.='<Customer type="AD">
						   <CustomerId>'.$m.'</CustomerId>
						   <Age>30</Age>
						   <Name>'.$fname1[0].'</Name>
						   <LastName>'.$lname1[0].'</LastName>
						   </Customer>';
				$m++;
				
		   }
			if($sb_room_cnt=='2')
			{
				$nameval.='<Customer type="AD">
						   <CustomerId>'.$m.'</CustomerId>
						   <Age>30</Age>
						   <Name>'.$fname1[0].'</Name>
						   <LastName>'.$lname1[0].'</LastName>
						   </Customer>';
				$m++;
				$nameval.='<Customer type="AD">
						   <CustomerId>'.$m.'</CustomerId>
						   <Age>30</Age>
						   <Name>'.$fname1[0].'</Name>
						   <LastName>'.$lname1[0].'</LastName>
						   </Customer>';
				$m++;
			}
			if($sb_room_cnt=='3')
			{
				$nameval.='<Customer type="AD">
						   <CustomerId>'.$m.'</CustomerId>
						   <Age>30</Age>
						   <Name>'.$fname1[0].'</Name>
						   <LastName>'.$lname1[0].'</LastName>
						   </Customer>';
				$m++;
				$nameval.='<Customer type="AD">
						   <CustomerId>'.$m.'</CustomerId>
						   <Age>30</Age>
						   <Name>'.$fname1[0].'</Name>
						   <LastName>'.$lname1[0].'</LastName>
						   </Customer>';
				$m++;
				$nameval.='<Customer type="AD">
						   <CustomerId>'.$m.'</CustomerId>
						   <Age>30</Age>
						   <Name>'.$fname1[0].'</Name>
						   <LastName>'.$lname1[0].'</LastName>
						   </Customer>';
				$m++;
			}
		}
		if($db_room_cnt >0)
		{
		
			$roomCode = 'DB'; //'db';
			if($db_room_cnt=='1')
			{
				$nameval.='<Customer type="AD">
						   <CustomerId>'.$m.'</CustomerId>
						   <Age>30</Age>
						   <Name>'.$fname1[0].'</Name>
						   <LastName>'.$lname1[0].'</LastName>
						   </Customer>';
				$m++;
				
		   }
			if($db_room_cnt=='2')
			{
				$nameval.='<Customer type="AD">
						   <CustomerId>'.$m.'</CustomerId>
						   <Age>30</Age>
						   <Name>'.$fname1[0].'</Name>
						   <LastName>'.$lname1[0].'</LastName>
						   </Customer>';
				$m++;
				$nameval.='<Customer type="AD">
						   <CustomerId>'.$m.'</CustomerId>
						   <Age>30</Age>
						   <Name>'.$fname1[0].'</Name>
						   <LastName>'.$lname1[0].'</LastName>
						   </Customer>';
				$m++;
			}
			if($db_room_cnt=='3')
			{
				$nameval.='<Customer type="AD">
						   <CustomerId>'.$m.'</CustomerId>
						   <Age>30</Age>
						   <Name>'.$fname1[0].'</Name>
						   <LastName>'.$lname1[0].'</LastName>
						   </Customer>';
				$m++;
				$nameval.='<Customer type="AD">
						   <CustomerId>'.$m.'</CustomerId>
						   <Age>30</Age>
						   <Name>'.$fname1[0].'</Name>
						   <LastName>'.$lname1[0].'</LastName>
						   </Customer>';
				$m++;
				$nameval.='<Customer type="AD">
						   <CustomerId>'.$m.'</CustomerId>
						   <Age>30</Age>
						   <Name>'.$fname1[0].'</Name>
						   <LastName>'.$lname1[0].'</LastName>
						   </Customer>';
				$m++;
			}
		}
		if($q_room_cnt >0)
		{
		
			$roomCode = 'Q'; //'db';
			if($q_room_cnt=='1')
			{
				$nameval.='<Customer type="AD">
						   <CustomerId>'.$m.'</CustomerId>
						   <Age>30</Age>
						   <Name>'.$fname1[0].'</Name>
						   <LastName>'.$lname1[0].'</LastName>
						   </Customer>';
				$m++;
				
		   }
			if($q_room_cnt=='2')
			{
				$nameval.='<Customer type="AD">
						   <CustomerId>'.$m.'</CustomerId>
						   <Age>30</Age>
						   <Name>'.$fname1[0].'</Name>
						   <LastName>'.$lname1[0].'</LastName>
						   </Customer>';
				$m++;
				$nameval.='<Customer type="AD">
						   <CustomerId>'.$m.'</CustomerId>
						   <Age>30</Age>
						   <Name>'.$fname1[0].'</Name>
						   <LastName>'.$lname1[0].'</LastName>
						   </Customer>';
				$m++;
			}
			if($q_room_cnt=='3')
			{
				$nameval.='<Customer type="AD">
						   <CustomerId>'.$m.'</CustomerId>
						   <Age>30</Age>
						   <Name>'.$fname1[0].'</Name>
						   <LastName>'.$lname1[0].'</LastName>
						   </Customer>';
				$m++;
				$nameval.='<Customer type="AD">
						   <CustomerId>'.$m.'</CustomerId>
						   <Age>30</Age>
						   <Name>'.$fname1[0].'</Name>
						   <LastName>'.$lname1[0].'</LastName>
						   </Customer>';
				$m++;
				$nameval.='<Customer type="AD">
						   <CustomerId>'.$m.'</CustomerId>
						   <Age>30</Age>
						   <Name>'.$fname1[0].'</Name>
						   <LastName>'.$lname1[0].'</LastName>
						   </Customer>';
				$m++;
			}
		}
		if($tb_room_cnt >0)
		{
		
			$roomCode = 'tr'; //'db';
			if($tb_room_cnt=='1')
			{
				$nameval.='<Customer type="AD">
						   <CustomerId>'.$m.'</CustomerId>
						   <Age>30</Age>
						   <Name>'.$fname1[0].'</Name>
						   <LastName>'.$lname1[0].'</LastName>
						   </Customer>';
				$m++;
				
		   }
			if($tb_room_cnt=='2')
			{
				$nameval.='<Customer type="AD">
						   <CustomerId>'.$m.'</CustomerId>
						   <Age>30</Age>
						   <Name>'.$fname1[0].'</Name>
						   <LastName>'.$lname1[0].'</LastName>
						   </Customer>';
				$m++;
				$nameval.='<Customer type="AD">
						   <CustomerId>'.$m.'</CustomerId>
						   <Age>30</Age>
						   <Name>'.$fname1[0].'</Name>
						   <LastName>'.$lname1[0].'</LastName>
						   </Customer>';
				$m++;
			}
			if($tb_room_cnt=='3')
			{
				$nameval.='<Customer type="AD">
						   <CustomerId>'.$m.'</CustomerId>
						   <Age>30</Age>
						   <Name>'.$fname1[0].'</Name>
						   <LastName>'.$lname1[0].'</LastName>
						   </Customer>';
				$m++;
				$nameval.='<Customer type="AD">
						   <CustomerId>'.$m.'</CustomerId>
						   <Age>30</Age>
						   <Name>'.$fname1[0].'</Name>
						   <LastName>'.$lname1[0].'</LastName>
						   </Customer>';
				$m++;
				$nameval.='<Customer type="AD">
						   <CustomerId>'.$m.'</CustomerId>
						   <Age>30</Age>
						   <Name>'.$fname1[0].'</Name>
						   <LastName>'.$lname1[0].'</LastName>
						   </Customer>';
				$m++;
			}
		}
		if($dbc_room_cnt >0)
		{
				$roomCode = 'dbc'; //'db';
		 		if($dbc_room_cnt=='1')
				{
					$nameval.='<Customer type="AD">
								<CustomerId>'.$m.'</CustomerId>
								<Age>30</Age>
								<Name>'.$fname1[0].'</Name>
								<LastName>'.$lname1[0].'</LastName>
							</Customer>';
					$m++;
					$nameval.='<Customer type="AD">
							<CustomerId>'.$m.'</CustomerId>
							<Age>30</Age>
							<Name>'.$fname1[1].'</Name>
							<LastName>'.$fname1[1].'</LastName>
					        </Customer>';
					$m++;
					$nameval.='<Customer type="CH">
								<CustomerId>'.$m.'</CustomerId>
								<Age>'.$dbc_age[0].'</Age>
								</Customer>';
					$m++;
					
				}
				if($dbc_room_cnt=='2')
				{
					$nameval.='<Customer type="AD">
								<CustomerId>'.$m.'</CustomerId>
								<Age>30</Age>
								<Name>'.$fname1[0].'</Name>
								<LastName>'.$lname1[0].'</LastName>
							</Customer>';
					$m++;
					$nameval.='<Customer type="AD">
							<CustomerId>'.$m.'</CustomerId>
							<Age>30</Age>
							<Name>'.$fname1[1].'</Name>
							<LastName>'.$fname1[1].'</LastName>
					        </Customer>';
					$m++;
					$nameval.='<Customer type="CH">
								<CustomerId>'.$m.'</CustomerId>
								<Age>'.$dbc_age[0].'</Age>
								</Customer>';
					$m++;
					$nameval.='<Customer type="AD">
								<CustomerId>'.$m.'</CustomerId>
								<Age>30</Age>
								<Name>'.$fname1[0].'</Name>
								<LastName>'.$lname1[0].'</LastName>
							</Customer>';
					$m++;
					$nameval.='<Customer type="AD">
							<CustomerId>'.$m.'</CustomerId>
							<Age>30</Age>
							<Name>'.$fname1[1].'</Name>
							<LastName>'.$fname1[1].'</LastName>
					        </Customer>';
					$m++;
					$nameval.='<Customer type="CH">
								<CustomerId>'.$m.'</CustomerId>
								<Age>'.$dbc_age[0].'</Age>
								</Customer>';
					$m++;
				 }
				 if($dbc_room_cnt=='3')
				 {
					 $nameval.='<Customer type="AD">
								<CustomerId>'.$m.'</CustomerId>
								<Age>30</Age>
								<Name>'.$fname1[0].'</Name>
								<LastName>'.$lname1[0].'</LastName>
							</Customer>';
					$m++;
					$nameval.='<Customer type="AD">
							<CustomerId>'.$m.'</CustomerId>
							<Age>30</Age>
							<Name>'.$fname1[1].'</Name>
							<LastName>'.$fname1[1].'</LastName>
					        </Customer>';
					$m++;
					$nameval.='<Customer type="CH">
								<CustomerId>'.$m.'</CustomerId>
								<Age>'.$dbc_age[0].'</Age>
								</Customer>';
					$m++;
					$nameval.='<Customer type="AD">
								<CustomerId>'.$m.'</CustomerId>
								<Age>30</Age>
								<Name>'.$fname1[0].'</Name>
								<LastName>'.$lname1[0].'</LastName>
							</Customer>';
					$m++;
					$nameval.='<Customer type="AD">
							<CustomerId>'.$m.'</CustomerId>
							<Age>30</Age>
							<Name>'.$fname1[1].'</Name>
							<LastName>'.$fname1[1].'</LastName>
					        </Customer>';
					$m++;
					$nameval.='<Customer type="CH">
								<CustomerId>'.$m.'</CustomerId>
								<Age>'.$dbc_age[0].'</Age>
								</Customer>';
					$m++;
					$nameval.='<Customer type="AD">
								<CustomerId>'.$m.'</CustomerId>
								<Age>30</Age>
								<Name>'.$fname1[0].'</Name>
								<LastName>'.$lname1[0].'</LastName>
							</Customer>';
					$m++;
					$nameval.='<Customer type="AD">
							<CustomerId>'.$m.'</CustomerId>
							<Age>30</Age>
							<Name>'.$fname1[1].'</Name>
							<LastName>'.$fname1[1].'</LastName>
					        </Customer>';
					$m++;
					$nameval.='<Customer type="CH">
								<CustomerId>'.$m.'</CustomerId>
								<Age>'.$dbc_age[0].'</Age>
								</Customer>';
					$m++;
					}			
		}
		if($dbcc_room_cnt > 0)
		{
			$roomCode = 'dbcc'; //'db';
			if($dbcc_room_cnt=='1')
			{		
					$nameval.='<Customer type="AD">	
								<CustomerId>'.$m.'</CustomerId>
								<Age>30</Age>
								<Name>'.$fname1[0].'</Name>
								<LastName>'.$lname1[0].'</LastName>
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
								<Age>'.$dbcc_age[0].'</Age>
								</Customer>';
					$m++;
					$nameval.='<Customer type="CH">
								<CustomerId>'.$m.'</CustomerId>
								<Age>'.$dbcc_age[1].'</Age>
								</Customer>';
					$m++;
					
			}
			if($dbcc_room_cnt=='2')
			{
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
					<Age>'.$dbcc_age[0].'</Age>
					</Customer>';
							$m++;
					$nameval.='<Customer type="CH">
					<CustomerId>'.$m.'</CustomerId>
					<Age>'.$dbcc_age[1].'</Age>
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
					<Age>'.$dbcc_age[2].'</Age>
					</Customer>';
							$m++;
					$nameval.='<Customer type="CH">
					<CustomerId>'.$m.'</CustomerId>
					<Age>'.$dbcc_age[3].'</Age>
					</Customer>';
							$m++;
					
	
			}
			if($dbcc_room_cnt=='3')
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
					<Age>'.$dbcc_age[0].'</Age>
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
					<Age>'.$dbcc_age[1].'</Age>
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
					<Age>'.$dbcc_age[2].'</Age>
					</Customer>';
							$m++;
					$nameval.='<Customer type="CH">
					<CustomerId>'.$m.'</CustomerId>
					<Age>'.$dbcc_age[3].'</Age>
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
					<Age>'.$dbcc_age[4].'</Age>
					</Customer>';
							$m++;
					$nameval.='<Customer type="CH">
					<CustomerId>'.$m.'</CustomerId>
					<Age>'.$dbcc_age[5].'</Age>
					</Customer>';
							$m++;
							
			}
	
	
			}		
	//}

$nameval2=$nameval;
//print_r($_SESSION);exit;
	 
         $serviceval=$_SESSION['SPUI'];
		 $purTokenVal=$_SESSION['purchaseToken'];  
          
		$user="HTLEXPLORAE64882";
		$pass="HTLEXPLORAE64882";
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
//	echo $data;
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
	

	//echo $xmls;exit;
 
			// $array = $this->Search_Model->xml2array($output);
			
			$dom=new DOMDocument();
			$dom->loadXML($xmls);		  
		  
					
				$IncomingOfficecode=''	;	
			$IncomingOffice=$dom->getElementsByTagName("IncomingOffice");
			foreach($IncomingOffice as $sdasa)
			{
			$IncomingOfficecode = $IncomingOffice->item(0)->getAttribute("code");		 
			 }
			// echo $IncomingOfficecode;
			 //exit;
			$bookingItemCode=$dom->getElementsByTagName("FileNumber");
			$bookingItemCodeval='';
			foreach($bookingItemCode as $aaaaaaaa)
			{
            $bookingItemCodeval = $bookingItemCode->item(0)->nodeValue;
			}
			
			
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

    if(isset($_SESSION['logged_in']))
	{
	$user_id = 	$_SESSION['b2c_userid'];
	}
	else
	{
		$user_id=0;
	}
	$nights = $_SESSION['days'] ;
	
	$val_last=$this->Hotel_Model->inser_customer_book_hotelpro($h_hotel_id,$h_hotel_name,$h_star,$h_description,$h_address,$h_phone,$h_fax,$h_room_type,$h_cancel_policy,$cin,$cout,$date,$roomcountss,$user_id,$nights,$trans_id,$h_adult,$h_child,$con_id_org,$dateFromValc,$h_city,'hotelsbed');
	
 $this->Hotel_Model->inser_customer_book_hotelpro_trans_hotel($con_id_org,$bookingItemCodeval,$user_id,$val_last,$statusval);
		$this->voucher_email($val_last);	

			redirect('hotel/voucher/'.$val_last, 'refresh');		
		//	print_r($roomusedtypeval);echo '<br/>';print_r($roomcount);exit;
			
			    
			   		
     }
	 else if($service->api == 'gta')
	 {
		 //echo 'sdasd';exit;
		  $search=$this->Hotel_Model->get_cancel_attrib_new($result_id);
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
		$city_val = $this->Hotel_Model->get_city_code($city);  
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
echo $xml_data;
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
		
	echo $output;exit;
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
	 if(isset($_SESSION['logged_in']))
	{
	$user_id = 	$_SESSION['b2c_userid'];
	}
	else
	{
		$user_id=0;
	}
	$dateFromValc = Date('Y-m-d', strtotime("+3 days" , strtotime ( $cin )));
	$nights = $_SESSION['days'] ;
	$val_last=$this->Hotel_Model->inser_customer_book_hotelpro($h_hotel_id,$h_hotel_name,$h_star,$h_description,$h_address,$h_phone,$h_fax,$h_room_type,$h_cancel_policy,$cin,$cout,$date,$noofroom,$user_id,$nights,$trans_id,$adults,$child,$con_id_org,$dateFromValc,$h_city,'gta');
 $this->Hotel_Model->inser_customer_book_hotelpro_trans_hotel($trans_id,$bookingItemCodeval,$user_id,$val_last,$statusval);
		$this->voucher_email($val_last);	

			redirect('hotel/voucher/'.$val_last, 'refresh');		
			
/*	$val_last=$this->Hotel_Model->inser_customer_book_hotelpro($bookingItemCodeval,$bookingItemCodeval,$statusval,$hotelcodeval,$dateFromValc,$dateToValc,$dateFromValc,$amount,$BoardTypeVal,$bookingItemCodeval,$amount,$amount,'gta',$amount,$api_uni_id,0,$email,'test',$roomcountss,$guestadult,$guestchild,$RoomTypeVal,$cancelpol,1,$amount,$trans_id);
 
 $this->Hotel_Model->inser_customer_book_hotelpro_trans_hotel($trans_id,'',$bookingItemCodeval,$booked_amount_gta,$user_id,$val_last);
		$this->voucher_email($val_last);	
//$this->voucher($val_last);
	redirect('hotel/voucher/'.$val_last, 'refresh');*/			
		//	print_r($roomusedtypeval);echo '<br/>';print_r($roomcount);exit;
			
			    
			   		
     }
	 else if($service->api == 'travco')
	 {
		 	 $res_id=explode('-',$result_id);
		for($rs=0;$rs< count($res_id);$rs++)
		{
		  $search=$this->Hotel_Model->get_cancel_attrib_new($res_id[$rs]);
		  $adults[]=$search->adult;
		  $childs[]=$search->child;
		
		}
	
		$h_adult = implode("-",$adults);
		$h_child = implode("-",$childs);
		$data['guestadult']=$guestadult=array_sum($adults);
		$data['guestchild']=$guestchild=array_sum($childs);
		
			$address=$contact_info->city;
			
			
			$api='travco';
			$fname1=array();$lname1=array();
			for($si=0;$si< count($pass_info); $si++)
			{
			 $fname1[]=$pass_info[$si]->first_name;			 
			 $lname1[]=$pass_info[$si]->last_name;			
			}
			 $roomusedtypeval=$_SESSION['room_used_type'];
			 $roomcount=$_SESSION['room_count'];
			 $child_age=$_SESSION['child_age'];
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
		//	echo "<pre/>";
		//print_r($roomusedtypeval);exit;
		$sb_room_cnt=0;
		$db_room_cnt=0;
		$dbc_room_cnt=0;
		$dbcc_room_cnt=0;
		$tb_room_cnt=0;
		$q_room_cnt=0;
		
$c_age=$_SESSION['child_age'];
		for($k=0;$k< $room_count;$k++)
		{
			if($roomusedtypeval[$k]=='sb')
			{
				$sb_room_cnt =$sb_room_cnt + 1;
			}
			if($roomusedtypeval[$k]=='db')
			{
				$db_room_cnt =$db_room_cnt + 1;
			}
			if($roomusedtypeval[$k]=='dbc')
			{
				$dbc_room_cnt =$dbc_room_cnt + 1;
				
			
			}
			if($roomusedtypeval[$k]=='dbcc')
			{
				$dbcc_room_cnt =$dbcc_room_cnt + 1;
				//echo "<pre/>";
				//print_r($room_used_type);exit;
				
				
			}
			if($roomusedtypeval[$k]=='tr')
			{
				$tb_room_cnt =$tb_room_cnt + 1;
			}
			if($roomusedtypeval[$k]=='qu')
			{
				$q_room_cnt =$q_room_cnt + 1;
			}

		}
if($dbcc_room_cnt==1)
				{
				$dbcc_age =array($c_age[0],$c_age[1]);
				}
				if($dbcc_room_cnt==2)
				{
				$dbcc_age =array($c_age[0],$c_age[1],$c_age[3],$c_age[4]);
				}
				if($dbcc_room_cnt==3)
				{
				$dbcc_age =array($c_age[0],$c_age[1],$c_age[3],$c_age[4],$c_age[6],$c_age[7]);
				}


if($dbc_room_cnt==1)
				{
				$dbc_age =array($c_age[0]);
				}
				if($dbc_room_cnt==2)
				{
				$dbc_age =array($c_age[0],$c_age[3]);
				}
				if($dbc_room_cnt==3)
				{
				$dbc_age =array($c_age[0],$c_age[3],$c_age[6]);
				}
						$rooms='';
				$room1='';
				$child=0;
				
					$sd=$_SESSION['sd'];
	
		$in = explode("-",$sd);
		 switch($in[1])
					{
					case '01':
					$checkin=$in[0]."/"."Jan"."/".$in[2];
					break;
					case '02':
					$checkin=$in[0]."/"."Feb"."/".$in[2];
					break;
					case '03':
					$checkin=$in[0]."/"."Mar"."/".$in[2];
					break;
					case '04':
					$checkin=$in[0]."/"."Apr"."/".$in[2];
					break;
					case '05':
					$checkin=$in[0]."/"."May"."/".$in[2];
					break;
					case '06':
					$checkin=$in[0]."/"."Jun"."/".$in[2];
					break;
					case '07':
					$checkin=$in[0]."/"."Jul"."/".$in[2];
					break;
					case '08':
					$checkin=$in[0]."/"."Aug"."/".$in[2];
					break;
					case '09':
					$checkin=$in[0]."/"."Sep"."/".$in[2];
					break;
					case '10':
					$checkin=$in[0]."/"."Oct"."/".$in[2];
					break;
					case '11':
					$checkin=$in[0]."/"."Nov"."/".$in[2];
					break;
					case '12':
					$checkin=$in[0]."/"."Dec"."/".$in[2];
					break;
					}
		$arrdate = $checkin;
		
		// echo '<pre/>';
		// print_r($_SESSION);exit;
		 $dt=$_SESSION['days'];
		 foreach($service as $cancel)
			{
				$cancelCode=$service->token;
				$roomchar[]=$service->room_code;
				//print_r($roomchar);
			}
		$fname=$fname1[0];
			 $lname=$fname1[0];
			 $salutation='Mr';
			 $hotelcode = $h_hotel_id;
				if($sb_room_cnt > 0)
				{
					if(in_array('SWO',$roomchar))
					{
						if($sb_room_cnt=='3')
					{

							$room1.="<DATA_HOTEL ADULTS='3' DURATION='".$dt."' ARR_DATE='".$arrdate."' HOTEL_CODE='".$hotelcode."' ROOM_CODE='SWO'  STATUS='B' INTERNAL_CODE10='1'  INTERNAL_CODE11='1'>
							<PAX_NAME>".strtoupper($lname).'/'.strtoupper($fname).'/'.strtoupper($salutation)."</PAX_NAME>
							<REF_NO></REF_NO>
							<OUR_REF_NO>SA01</OUR_REF_NO>
							<AGENT_COMMENTS></AGENT_COMMENTS>
						</DATA_HOTEL>";

					}
					elseif($sb_room_cnt=='2')
					{

							$room1.="<DATA_HOTEL ADULTS='2' DURATION='".$dt."' ARR_DATE='".$arrdate."' HOTEL_CODE='".$hotelcode."' ROOM_CODE='SWO'  STATUS='B' INTERNAL_CODE10='1'  INTERNAL_CODE11='1'>
							<PAX_NAME>".strtoupper($lname).'/'.strtoupper($fname).'/'.strtoupper($salutation)."</PAX_NAME>
							<REF_NO></REF_NO>
							<OUR_REF_NO>SA01</OUR_REF_NO>
							<AGENT_COMMENTS></AGENT_COMMENTS>
						</DATA_HOTEL>";

					}else{

					$room1.="<DATA_HOTEL ADULTS='1' DURATION='".$dt."' ARR_DATE='".$arrdate."' HOTEL_CODE='".$hotelcode."' ROOM_CODE='SWO'  STATUS='B' INTERNAL_CODE10='1'  INTERNAL_CODE11='1'>
					<PAX_NAME>".strtoupper($lname).'/'.strtoupper($fname).'/'.strtoupper($salutation)."</PAX_NAME>
					<REF_NO></REF_NO>
					<OUR_REF_NO>SA01</OUR_REF_NO>
					<AGENT_COMMENTS></AGENT_COMMENTS>
				</DATA_HOTEL>";

				}
					}else{

					if($sb_room_cnt=='3')
					{
					$room1.="<DATA_HOTEL ADULTS='3' DURATION='".$dt."' ARR_DATE='".$arrdate."' HOTEL_CODE='".$hotelcode."' ROOM_CODE='SWB'  STATUS='B' INTERNAL_CODE10='1'  INTERNAL_CODE11='1'>
					<PAX_NAME>".strtoupper($lname).'/'.strtoupper($fname).'/'.strtoupper($salutation)."</PAX_NAME>
					<REF_NO></REF_NO>
					<OUR_REF_NO>SA01</OUR_REF_NO>
					<AGENT_COMMENTS></AGENT_COMMENTS>
				</DATA_HOTEL>";
					}elseif($sb_room_cnt=='2')
					{
					$room1.="<DATA_HOTEL ADULTS='2' DURATION='".$dt."' ARR_DATE='".$arrdate."' HOTEL_CODE='".$hotelcode."' ROOM_CODE='SWB'  STATUS='B' INTERNAL_CODE10='1'  INTERNAL_CODE11='1'>
					<PAX_NAME>".strtoupper($lname).'/'.strtoupper($fname).'/'.strtoupper($salutation)."</PAX_NAME>
					<REF_NO></REF_NO>
					<OUR_REF_NO>SA01</OUR_REF_NO>
					<AGENT_COMMENTS></AGENT_COMMENTS>
				</DATA_HOTEL>";
					}else{
					$room1.="<DATA_HOTEL ADULTS='1' DURATION='".$dt."' ARR_DATE='".$arrdate."' HOTEL_CODE='".$hotelcode."' ROOM_CODE='SWB'  STATUS='B' INTERNAL_CODE10='1'  INTERNAL_CODE11='1'>
					<PAX_NAME>".strtoupper($lname).'/'.strtoupper($fname).'/'.strtoupper($salutation)."</PAX_NAME>
					<REF_NO></REF_NO>
					<OUR_REF_NO>SA01</OUR_REF_NO>
					<AGENT_COMMENTS></AGENT_COMMENTS>
				</DATA_HOTEL>";
					}
				}

			    }
				if($db_room_cnt>0)
				{
					if(in_array('DWO',$roomchar))
					{
						if($db_room_cnt=='3')
						{
					$room1.="<DATA_HOTEL ADULTS='6' DURATION='".$dt."' ARR_DATE='".$arrdate."' HOTEL_CODE='".$hotelcode."' ROOM_CODE='DWO'  STATUS='B' INTERNAL_CODE10='1'  INTERNAL_CODE11='1'>

					<PAX_NAME>".strtoupper($lname).'/'.strtoupper($fname).'/'.strtoupper($salutation)."</PAX_NAME>
					<REF_NO></REF_NO>
					<OUR_REF_NO>SA01</OUR_REF_NO>
					<AGENT_COMMENTS></AGENT_COMMENTS>
				</DATA_HOTEL>";
						}
						elseif($db_room_cnt=='2')
						{
					$room1.="<DATA_HOTEL ADULTS='4' DURATION='".$dt."' ARR_DATE='".$arrdate."' HOTEL_CODE='".$hotelcode."' ROOM_CODE='DWO'  STATUS='B' INTERNAL_CODE10='1'  INTERNAL_CODE11='1'>

					<PAX_NAME>".strtoupper($lname).'/'.strtoupper($fname).'/'.strtoupper($salutation)."</PAX_NAME>
					<REF_NO></REF_NO>
					<OUR_REF_NO>SA01</OUR_REF_NO>
					<AGENT_COMMENTS></AGENT_COMMENTS>
				</DATA_HOTEL>";
						}else{
					$room1.="<DATA_HOTEL ADULTS='2' DURATION='".$dt."' ARR_DATE='".$arrdate."' HOTEL_CODE='".$hotelcode."' ROOM_CODE='DWO'  STATUS='B' INTERNAL_CODE10='1'  INTERNAL_CODE11='1'>

					<PAX_NAME>".strtoupper($lname).'/'.strtoupper($fname).'/'.strtoupper($salutation)."</PAX_NAME>
					<REF_NO></REF_NO>
					<OUR_REF_NO>SA01</OUR_REF_NO>
					<AGENT_COMMENTS></AGENT_COMMENTS>
				</DATA_HOTEL>";
					   }
					}else{
						if($db_room_cnt=='3')
						{
					$room1.="<DATA_HOTEL ADULTS='6' DURATION='".$dt."' ARR_DATE='".$arrdate."' HOTEL_CODE='".$hotelcode."' ROOM_CODE='DWB'  STATUS='B' INTERNAL_CODE10='1'  INTERNAL_CODE11='1'>

					<PAX_NAME>".strtoupper($lname).'/'.strtoupper($fname).'/'.strtoupper($salutation)."</PAX_NAME>
					<REF_NO></REF_NO>
					<OUR_REF_NO>SA01</OUR_REF_NO>
					<AGENT_COMMENTS></AGENT_COMMENTS>
				</DATA_HOTEL>";
						}
						elseif($db_room_cnt=='2')
						{
					$room1.="<DATA_HOTEL ADULTS='4' DURATION='".$dt."' ARR_DATE='".$arrdate."' HOTEL_CODE='".$hotelcode."' ROOM_CODE='DWB'  STATUS='B' INTERNAL_CODE10='1'  INTERNAL_CODE11='1'>

					<PAX_NAME>".strtoupper($lname).'/'.strtoupper($fname).'/'.strtoupper($salutation)."</PAX_NAME>
					<REF_NO></REF_NO>
					<OUR_REF_NO>SA01</OUR_REF_NO>
					<AGENT_COMMENTS></AGENT_COMMENTS>
				</DATA_HOTEL>";
						}else{
					$room1.="<DATA_HOTEL ADULTS='2' DURATION='".$dt."' ARR_DATE='".$arrdate."' HOTEL_CODE='".$hotelcode."' ROOM_CODE='DWB'  STATUS='B' INTERNAL_CODE10='1'  INTERNAL_CODE11='1'>

					<PAX_NAME>".strtoupper($lname).'/'.strtoupper($fname).'/'.strtoupper($salutation)."</PAX_NAME>
					<REF_NO></REF_NO>
					<OUR_REF_NO>GL01</OUR_REF_NO>
					<AGENT_COMMENTS></AGENT_COMMENTS>
				</DATA_HOTEL>";
						}
					}

				}
				if($tb_room_cnt>0)
				{
					if(in_array('TRO',$roomchar))
					{
							if($tb_room_cnt=='3')
							{
			$room1.="<DATA_HOTEL ADULTS='9' DURATION='".$dt."' ARR_DATE='".$arrdate."' HOTEL_CODE='".$hotelcode."' ROOM_CODE='TRO'  STATUS='B' INTERNAL_CODE10='1'  INTERNAL_CODE11='1'>
					<PAX_NAME>".strtoupper($lname).'/'.strtoupper($fname).'/'.strtoupper($salutation)."</PAX_NAME>
					<REF_NO></REF_NO>
					<OUR_REF_NO>SA01</OUR_REF_NO>
					<AGENT_COMMENTS></AGENT_COMMENTS>
				</DATA_HOTEL>";
							}elseif($tb_room_cnt=='2')
							{
			$room1.="<DATA_HOTEL ADULTS='6' DURATION='".$dt."' ARR_DATE='".$arrdate."' HOTEL_CODE='".$hotelcode."' ROOM_CODE='TRO'  STATUS='B' INTERNAL_CODE10='1'  INTERNAL_CODE11='1'>
					<PAX_NAME>".strtoupper($lname).'/'.strtoupper($fname).'/'.strtoupper($salutation)."</PAX_NAME>
					<REF_NO></REF_NO>
					<OUR_REF_NO>SA01</OUR_REF_NO>
					<AGENT_COMMENTS></AGENT_COMMENTS>
				</DATA_HOTEL>";
							}else{
			$room1.="<DATA_HOTEL ADULTS='3' DURATION='".$dt."' ARR_DATE='".$arrdate."' HOTEL_CODE='".$hotelcode."' ROOM_CODE='TRO'  STATUS='B' INTERNAL_CODE10='1'  INTERNAL_CODE11='1'>
					<PAX_NAME>".strtoupper($lname).'/'.strtoupper($fname).'/'.strtoupper($salutation)."</PAX_NAME>
					<REF_NO></REF_NO>
					<OUR_REF_NO>SA01</OUR_REF_NO>
					<AGENT_COMMENTS></AGENT_COMMENTS>
				</DATA_HOTEL>";
								}
					}else{
							if($tb_room_cnt=='3')
							{
			$room1.="<DATA_HOTEL ADULTS='9' DURATION='".$dt."' ARR_DATE='".$arrdate."' HOTEL_CODE='".$hotelcode."' ROOM_CODE='TRP'  STATUS='B' INTERNAL_CODE10='1'  INTERNAL_CODE11='1'>
					<PAX_NAME>".strtoupper($lname).'/'.strtoupper($fname).'/'.strtoupper($salutation)."</PAX_NAME>
					<REF_NO></REF_NO>
					<OUR_REF_NO>SA01</OUR_REF_NO>
					<AGENT_COMMENTS></AGENT_COMMENTS>
				</DATA_HOTEL>";
							}
							elseif($tb_room_cnt=='2')
							{
			$room1.="<DATA_HOTEL ADULTS='6' DURATION='".$dt."' ARR_DATE='".$arrdate."' HOTEL_CODE='".$hotelcode."' ROOM_CODE='TRP'  STATUS='B' INTERNAL_CODE10='1'  INTERNAL_CODE11='1'>
					<PAX_NAME>".strtoupper($lname).'/'.strtoupper($fname).'/'.strtoupper($salutation)."</PAX_NAME>
					<REF_NO></REF_NO>
					<OUR_REF_NO>SA01</OUR_REF_NO>
					<AGENT_COMMENTS></AGENT_COMMENTS>
				</DATA_HOTEL>";
							}else{
			$room1.="<DATA_HOTEL ADULTS='3' DURATION='".$dt."' ARR_DATE='".$arrdate."' HOTEL_CODE='".$hotelcode."' ROOM_CODE='TRP'  STATUS='B' INTERNAL_CODE10='1'  INTERNAL_CODE11='1'>
					<PAX_NAME>".strtoupper($lname).'/'.strtoupper($fname).'/'.strtoupper($salutation)."</PAX_NAME>
					<REF_NO></REF_NO>
					<OUR_REF_NO>GL01</OUR_REF_NO>
					<AGENT_COMMENTS></AGENT_COMMENTS>
				</DATA_HOTEL>";
							}
					}


				}
				if($dbc_room_cnt>0)
				{

				if(in_array('DWO',$roomchar))
				{
					if($dbc_room_cnt=='3')
					{
			$room1.="<DATA_HOTEL ADULTS='6' CHILDREN='3' DURATION='".$dt."' ARR_DATE='".$arrdate."' HOTEL_CODE='".$hotelcode."' ROOM_CODE='DWO'  STATUS='B' INTERNAL_CODE10='1'  INTERNAL_CODE11='1'>
				<PAX_NAME>".strtoupper($lname).'/'.strtoupper($fname).'/'.strtoupper($salutation)."</PAX_NAME>
				<REF_NO></REF_NO>
				<OUR_REF_NO>SA01</OUR_REF_NO>
				<AGENT_COMMENTS></AGENT_COMMENTS>
			</DATA_HOTEL>";
			$child=$child+3;
						}
						elseif($dbc_room_cnt=='2')
					{
			$room1.="<DATA_HOTEL ADULTS='4' CHILDREN='2' DURATION='".$dt."' ARR_DATE='".$arrdate."' HOTEL_CODE='".$hotelcode."' ROOM_CODE='DWO'  STATUS='B' INTERNAL_CODE10='1'  INTERNAL_CODE11='1'>
				<PAX_NAME>".strtoupper($lname).'/'.strtoupper($fname).'/'.strtoupper($salutation)."</PAX_NAME>
				<REF_NO></REF_NO>
				<OUR_REF_NO>SA01</OUR_REF_NO>
				<AGENT_COMMENTS></AGENT_COMMENTS>
			</DATA_HOTEL>";
			$child=$child+2;
						}else{
				$room1.="<DATA_HOTEL ADULTS='2' CHILDREN='1' DURATION='".$dt."' ARR_DATE='".$arrdate."' HOTEL_CODE='".$hotelcode."' ROOM_CODE='DWO'  STATUS='B' INTERNAL_CODE10='1'  INTERNAL_CODE11='1'>
				<PAX_NAME>".strtoupper($lname).'/'.strtoupper($fname).'/'.strtoupper($salutation)."</PAX_NAME>
				<REF_NO></REF_NO>
				<OUR_REF_NO>SA01</OUR_REF_NO>
				<AGENT_COMMENTS></AGENT_COMMENTS>
			</DATA_HOTEL>";
			$child++;
						}


				}else{
						if($dbc_room_cnt=='3')
						{
		$room1.="<DATA_HOTEL ADULTS='6' CHILDREN='3' DURATION='".$dt."' ARR_DATE='".$arrdate."' HOTEL_CODE='".$hotelcode."' ROOM_CODE='DWB'  STATUS='B' INTERNAL_CODE10='1'  INTERNAL_CODE11='1'>
				<PAX_NAME>".strtoupper($lname).'/'.strtoupper($fname).'/'.strtoupper($salutation)."</PAX_NAME>
				<REF_NO></REF_NO>
				<OUR_REF_NO>SA01</OUR_REF_NO>
				<AGENT_COMMENTS></AGENT_COMMENTS>
			</DATA_HOTEL>";

			$child=$child+3;
						}elseif($dbc_room_cnt=='2')
						{
		$room1.="<DATA_HOTEL ADULTS='4' CHILDREN='2' DURATION='".$dt."' ARR_DATE='".$arrdate."' HOTEL_CODE='".$hotelcode."' ROOM_CODE='DWB'  STATUS='B' INTERNAL_CODE10='1'  INTERNAL_CODE11='1'>
				<PAX_NAME>".strtoupper($lname).'/'.strtoupper($fname).'/'.strtoupper($salutation)."</PAX_NAME>
				<REF_NO></REF_NO>
				<OUR_REF_NO>SA01</OUR_REF_NO>
				<AGENT_COMMENTS></AGENT_COMMENTS>
			</DATA_HOTEL>";

			$child=$child+2;
						}else{
				$room1.="<DATA_HOTEL ADULTS='2' CHILDREN='1' DURATION='".$dt."' ARR_DATE='".$arrdate."' HOTEL_CODE='".$hotelcode."' ROOM_CODE='DWB'  STATUS='B' INTERNAL_CODE10='1'  INTERNAL_CODE11='1'>
				<PAX_NAME>".strtoupper($lname).'/'.strtoupper($fname).'/'.strtoupper($salutation)."</PAX_NAME>
				<REF_NO></REF_NO>
				<OUR_REF_NO>SA01</OUR_REF_NO>
				<AGENT_COMMENTS></AGENT_COMMENTS>
			</DATA_HOTEL>";

			$child++;
						}
					}

				}
				if($dbcc_room_cnt>0)
				{

					if(in_array('TWO',$roomchar))
					{
							if($dbcc_room_cnt=='3')
							{
			$room1.="<DATA_HOTEL ADULTS='6' CHILDREN='3' DURATION='".$dt."' ARR_DATE='".$arrdate."' HOTEL_CODE='".$hotelcode."' ROOM_CODE='TWO'  STATUS='B' INTERNAL_CODE10='1'  INTERNAL_CODE11='1'>
					<PAX_NAME>".strtoupper($lname).'/'.strtoupper($fname).'/'.strtoupper($salutation)."</PAX_NAME>
					<REF_NO></REF_NO>
					<OUR_REF_NO>SA01</OUR_REF_NO>
					<AGENT_COMMENTS></AGENT_COMMENTS>
				</DATA_HOTEL>";

				$child=$child+3;
							}
							elseif($dbcc_room_cnt=='2')
							{
			$room1.="<DATA_HOTEL ADULTS='4' CHILDREN='2' DURATION='".$dt."' ARR_DATE='".$arrdate."' HOTEL_CODE='".$hotelcode."' ROOM_CODE='TWO'  STATUS='B' INTERNAL_CODE10='1'  INTERNAL_CODE11='1'>
					<PAX_NAME>".strtoupper($lname).'/'.strtoupper($fname).'/'.strtoupper($salutation)."</PAX_NAME>
					<REF_NO></REF_NO>
					<OUR_REF_NO>SA01</OUR_REF_NO>
					<AGENT_COMMENTS></AGENT_COMMENTS>
				</DATA_HOTEL>";

				$child=$child+2;
							}else{

			$room1.="<DATA_HOTEL ADULTS='2' CHILDREN='1' DURATION='".$dt."' ARR_DATE='".$arrdate."' HOTEL_CODE='".$hotelcode."' ROOM_CODE='TWO'  STATUS='B' INTERNAL_CODE10='1'  INTERNAL_CODE11='1'>
					<PAX_NAME>".strtoupper($lname).'/'.strtoupper($fname).'/'.strtoupper($salutation)."</PAX_NAME>
					<REF_NO></REF_NO>
					<OUR_REF_NO>SA01</OUR_REF_NO>
					<AGENT_COMMENTS></AGENT_COMMENTS>
				</DATA_HOTEL>";

				$child++;
					  }
					}else{
							if($dbcc_room_cnt=='3')
							{
			$room1.="<DATA_HOTEL ADULTS='6' CHILDREN='3' DURATION='".$dt."' ARR_DATE='".$arrdate."' HOTEL_CODE='".$hotelcode."' ROOM_CODE='TWB'  STATUS='B' INTERNAL_CODE10='1'  INTERNAL_CODE11='1'>
					<PAX_NAME>".strtoupper($lname).'/'.strtoupper($fname).'/'.strtoupper($salutation)."</PAX_NAME>
					<REF_NO></REF_NO>
					<OUR_REF_NO>SA01</OUR_REF_NO>
					<AGENT_COMMENTS></AGENT_COMMENTS>
				</DATA_HOTEL>";

				$child=$child+3;
							}
							elseif($dbcc_room_cnt=='2')
							{
			$room1.="<DATA_HOTEL ADULTS='4' CHILDREN='2' DURATION='".$dt."' ARR_DATE='".$arrdate."' HOTEL_CODE='".$hotelcode."' ROOM_CODE='TWB'  STATUS='B' INTERNAL_CODE10='1'  INTERNAL_CODE11='1'>
					<PAX_NAME>".strtoupper($lname).'/'.strtoupper($fname).'/'.strtoupper($salutation)."</PAX_NAME>
					<REF_NO></REF_NO>
					<OUR_REF_NO>SA01</OUR_REF_NO>
					<AGENT_COMMENTS></AGENT_COMMENTS>
				</DATA_HOTEL>";

				$child=$child+2;
							}
							else{
			$room1.="<DATA_HOTEL ADULTS='2' CHILDREN='1' DURATION='".$dt."' ARR_DATE='".$arrdate."' HOTEL_CODE='".$hotelcode."' ROOM_CODE='TWB'  STATUS='B' INTERNAL_CODE10='1'  INTERNAL_CODE11='1'>
					<PAX_NAME>".strtoupper($lname).'/'.strtoupper($fname).'/'.strtoupper($salutation)."</PAX_NAME>
					<REF_NO></REF_NO>
					<OUR_REF_NO>SA01</OUR_REF_NO>
					<AGENT_COMMENTS></AGENT_COMMENTS>
				</DATA_HOTEL>";

				$child++;
							}
						}

				}
				$rooms=$room1;
				$refcode="TEST".date("YmdHis");
				$curdate=date("d-M-Y");
				
	
 $agentcode='133YZA'; //live
			$agentpwd='130611YZ31'; //live
			   $URL ="http://xmlv5test.travco.co.uk/trlink/link1/trlink";
			$name_space = 'http://xmlv5test.travco.co.uk/trlink/schema/HotelAvailabilityV6Snd.xsd';//live
			
				$xml_data = "<?xml version='1.0' encoding='UTF-8'?>
				<BOOKING type='HB'  returnURLNeed='no' returnURL='http://' AGENTCODE='".$agentcode."' AGENTPASSWORD='".$agentpwd."' xmlns:xsi='http://www.w3.org/2001/XMLSchema-instance' xsi:noNamespaceSchemaLocation='".$name_space."'>
					<HEADER>
						<INTERNAL_CODE1>DWEBCN</INTERNAL_CODE1>
						<INTERNAL_CODE2>".$refcode."</INTERNAL_CODE2>
						<INTERNAL_CODE3></INTERNAL_CODE3>
						<INTERNAL_CODE4>".$curdate."</INTERNAL_CODE4>
						<INTERNAL_CODE5>DWEBRS</INTERNAL_CODE5>
						<INTERNAL_CODE6></INTERNAL_CODE6>
						<INTERNAL_CODE7>1</INTERNAL_CODE7>
						<INTERNAL_CODE8>VB</INTERNAL_CODE8>
						<INTERNAL_CODE9>travel system</INTERNAL_CODE9>
					</HEADER>".$rooms."
				</BOOKING>";
				//echo $xml_data;exit;
					$ch = curl_init($URL);
					//curl_setopt($ch, CURLOPT_MUTE, 1);
				//	 ini_set('memory_limit', '-1');
				   $ch = curl_init($URL);
				   curl_setopt($ch, CURLOPT_URL, $URL);
				   curl_setopt($ch, CURLOPT_TIMEOUT, 180);
							curl_setopt($ch, CURLOPT_HEADER, 0);
				   //curl_setopt($ch, CURLOPT_MUTE, 1);
				   curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
				   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
				   curl_setopt($ch, CURLOPT_POST, 1);
				   curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml'));
				   curl_setopt($ch, CURLOPT_POSTFIELDS, "$xml_data");
				   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				   $xml = curl_exec($ch);
				   curl_close($ch);
				  // echo $xml;exit;
				    $array = $this->Hotel_Model->xml2array($xml);
				   if(isset($array['RETURNDATA']['DATA_HOTEL']['MESSAGE']))
					{
						$ERROR_DESCRIPTION = $array['RETURNDATA']['DATA_HOTEL']['MESSAGE']['ERROR_DESCRIPTION'];
						$data['error'] =$ERROR_DESCRIPTION;
					
						$this->load->view('hotel/error_page',$data);
					
					}
					else
					{
				   $no_room=$this->session->userdata('nor');

				   $dom2=new DOMDocument();
					$dom2->loadXML($xml);
					$TRAVCO_REF_NO =array();
					$DATA_HOTEL=$dom2->getElementsByTagName("DATA_HOTEL");
					foreach($DATA_HOTEL as $data_hotel_val)
					{
						$TRAVCO_REF_NO[]=$DATA_HOTEL->item(0)->getAttribute("TRAVCO_REF_NO");
						$statusval=$DATA_HOTEL->item(0)->getAttribute("STATUS");

						$AGENTS_REF_NO = $data_hotel_val->getElementsByTagName("AGENTS_REF_NO");
						$agentrefno=$AGENTS_REF_NO->item(0)->nodeValue;

						$ROOM_NAME = $data_hotel_val->getElementsByTagName("ROOM_NAME");
						$roomname=$ROOM_NAME->item(0)->nodeValue;


						$FULL_CANCELLATION_DETAILS = $data_hotel_val->getElementsByTagName("FULL_CANCELLATION_DETAILS");
						foreach($FULL_CANCELLATION_DETAILS as $full_cancel_deta)
						{
							$CANCELLATION_DETAILS = $full_cancel_deta->getElementsByTagName("CANCELLATION_DETAILS");
							$dateFromValc=$CANCELLATION_DETAILS->item(0)->getAttribute("LAST_POSSIBLE_CANCELLATION_DATE");
							$cancel_time_before=$CANCELLATION_DETAILS->item(0)->getAttribute("TIME_BEFORE");
						}

					}
				/*	$custname = $_SESSION['fname'];
					$zip = $_SESSION['cust_pincode'];
				//	$api_uni_id=$this->Search_Model->api_unique_id('Travco');
					
						$userid ='';
				
					$tot_amt = $_SESSION['bookamt'];
					$cancel_charge_amt = $_SESSION['cancelamt'];
                    $supplier_track_id = '';
$without_markup='';
					$travaco_book=$this->Search_Model->travaco_booking_cust($supplier_track_id,$agentrefno,'travco',$STATUS,$TRAVCO_REF_NO[0],$cancel_charge_amt,$cancel_Last_date,$cancel_time_before,$hotelcode,$tot_amt,$hname,$inclusion,$room,$email,$custname[0],$api_uni_id='',$travco_cancel,$zip,$hotel_country_naem,$without_markup);
					for($i=0;$i< count($_SESSION['book_pass_detail_id']);$i++){
			$this->Booking_Model->update_passanger_info_book_id($travaco_book,$_SESSION['book_pass_detail_id'][$i]);
			}*/
		
		$guestadult=$_SESSION['adult_count'];
		$guestchild=$_SESSION['child_count'];
		$cin=date("Y-m-d", strtotime($_SESSION['sd']));
		$cout=date("Y-m-d", strtotime($_SESSION['ed']));

		$date=date('Y-m-d');
		$roomcountss=$_SESSION['room_count'];;
		$bookingItemCodeval=$agentrefno.'-'.$TRAVCO_REF_NO[0];	

    if(isset($_SESSION['logged_in']))
	{
	$user_id = 	$_SESSION['b2c_userid'];
	}
	else
	{
		$user_id=0;
	}
	$nights = $_SESSION['days'] ;
	
	$val_last=$this->Hotel_Model->inser_customer_book_hotelpro($h_hotel_id,$h_hotel_name,$h_star,$h_description,$h_address,$h_phone,$h_fax,$h_room_type,$h_cancel_policy,$cin,$cout,$date,$roomcountss,$user_id,$nights,$trans_id,$h_adult,$h_child,$con_id_org,$dateFromValc,$h_city,'travco');
	
 $this->Hotel_Model->inser_customer_book_hotelpro_trans_hotel($con_id_org,$bookingItemCodeval,$user_id,$val_last,$statusval);
		$this->voucher_email($val_last);	

			redirect('hotel/voucher/'.$val_last, 'refresh');	
				
					
				}
			   		
     }
	  else if($service->api == 'hotelspro')
	 {
		
		  $search=$this->Hotel_Model->get_cancel_attrib_new($result_id);
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
		$city_val = $this->Hotel_Model->get_city_code($city);  
		$citycode = $city_val->hotelspro;
		
			$sb_room_cnt =0;
		$db_room_cnt =0;
		$tb_room_cnt =0;
		$q_room_cnt =0;
		$dbc_room_cnt =0;
		$dbcc_room_cnt =0;
$room1='';
$hotelbed_rooms='';
$bookroom='';
			//echo '<pre/>';
			//print_r($fname1);exit;
			$PFirstNamevalue= 'Mr.'.' '.$fname1.' '.$lname1;
      $leadTravellerInfo = array();
      $paxInfo = array("paxType" => "Adult", "title" => 'Mr', "firstName" => $fname1, "lastName" => $lname1);
	  $leadTravellerInfo["paxInfo"] = $paxInfo;
	  $leadTravellerInfo["nationality"] = "US";
		
	  $otherTravellerInfo = array();
    
	//echo '<pre/>';print_r($pass_info);exit;
   $processId=$search->room_code;
   if(count($pass_info)>1)
   {
	for($i=1;$i< count($pass_info);$i++)
	{
		  $otherTravellerInfo[] = array("title" => 'Mr', "firstName" => $pass_info[$i]->first_name, "lastName" => $pass_info[$i]->last_name);
	}
   }
   else
   {
	    $otherTravellerInfo='';
   }
/*echo '<pre/>';
print_r($leadTravellerInfo);
print_r($otherTravellerInfo);exit;*/
	$preferences = "";
      $note = "";
	   $agencyReferenceNumber = 'test';
	
		 $client = new SoapClient("http://api.hotelspro.com/4.1_test/hotel/b2bHotelSOAP.wsdl", array('trace' => 1));
  
  try {
 
	   $data['errordesc']='';
	   $makeHotelBooking = $client->makeHotelBooking("TldsVFh3MEpXSnEwVWRSOHJWTGgzVlBzVDE5SHQzSDBwUm5SSmtQNUNXdmR0UXlPdGR5YUlRSkFtWDhocmk2Qg==", $processId, $agencyReferenceNumber, $leadTravellerInfo,$otherTravellerInfo,  $preferences, $note);
      
      $hotel = $makeHotelBooking->hotelBookingInfo;
      $rooms = is_array($hotel->rooms) ? $hotel->rooms : array($hotel->rooms);
      $policies = is_array($hotel->cancellationPolicy) ? $hotel->cancellationPolicy : array($hotel->cancellationPolicy);
    }
	 catch (SoapFault $exception) {
	 
      $data['errordesc'] = $exception->getMessage();
     
  }
   if($data['errordesc']!='')
  {
	  $data['error']=$data['errordesc'];
  	   $this->load->view('hotel/error_page',$data);
	 
  }
  else
  {
   
 //echo $hotel->bookingStatus;exit;
 $ProcessIdvalue = $makeHotelBooking->trackingId;

  if (false == empty($hotel)) 
  {
  $BookingStatusvalue11 = $hotel->bookingStatus;
  if($BookingStatusvalue11==1)
  {
	  $BookingStatusvalue ='Confirmed';
  }
  elseif($BookingStatusvalue11==2)
  {
	  $BookingStatusvalue ='On Request';
  }
  elseif($BookingStatusvalue11==3)
  {
	  $BookingStatusvalue ='Rejected';
  }
  elseif($BookingStatusvalue11==4)
  {
	  $BookingStatusvalue ='Cancelled';
  }
  elseif($BookingStatusvalue11==5)
  {
	  $BookingStatusvalue ='Payment Processing';
  }
  
  $CheckInvalue = $hotel->checkIn;
  $CheckOutvalue = $hotel->checkOut;
  $BoardTypevalue = $hotel->boardType;
$cancellationPolicy11 = $hotel->cancellationPolicy;
         foreach ($cancellationPolicy11 as $policy)
		 {
         $val[]= $policy->cancellationDay;
		 if(isset($policy->currency))
		 {
          $val1[]=  $policy->currency;
		 }
		 else
		 {
			 $val1[]="USD";
		 }
      $val2=  $policy->feeAmount;
      $cutype = $policy->feeType;
   //  $policy->remarks;
            }
			$newdate = strtotime ( '-'.$val[0].' day' , strtotime ( $CheckInvalue ) ) ;
            $cancel_till_date = date ( 'Y-m-d' , $newdate );
/*			
if($cutype=='Percent')
{
	
	$cancelamount=($_REQUEST['amount']/100)*$val2;
	
}
else
{
	$cancelamount=$val2;
}*/

//end
  }
  //$currr = $this->session->userdata('costtype');
  $ConfirmationNumbervalue='';
 
//	$a=($booked_amount_gta1/100)*$markup;
	//		$final=$booked_amount_gta1-$a;
			//$TotalPricevalue=number_format($booked_amount_gta1,'2','.','');
  $hotelcode=$this->input->post('hotelcode');
 
  $client = new SoapClient("http://api.hotelspro.com/4.1_test/hotel/b2bHotelSOAP.wsdl", array('trace' => 1));
  $trackingId=$ProcessIdvalue;
  try {
	   $data['errordesc']='';
       $getHotelBookingStatus = $client->getHotelBookingStatus("TldsVFh3MEpXSnEwVWRSOHJWTGgzVlBzVDE5SHQzSDBwUm5SSmtQNUNXdmR0UXlPdGR5YUlRSkFtWDhocmk2Qg==", $trackingId);
  }
  catch (SoapFault $exception) 
  {
       $data['errordesc'] =  $exception->getMessage();
       exit;
  }
   if($data['errordesc']!='')
  {
	   $data['error']=$data['errordesc'];
	   $this->load->view('hotel/error_page',$data);
  }
  else
  {
     $ConfirmationNumbervalue=$getHotelBookingStatus->hotelBookingInfo->confirmationNumber;
  }
  
//  $perday_cancel_amt=$cancelamount;


$ProcessIdvalue=$ProcessIdvalue;
$BookingStatusvalue =$BookingStatusvalue;
$hotelcode = $hotelcode;
$CheckInvalue = $CheckInvalue;
$CheckOutvalue = $CheckOutvalue;
$cancel_date = $cancel_till_date;
//$amount = $booked_amount_gta1;
$BoardTypevalue = $BoardTypevalue;
$ConfirmationNumbervalue = $ConfirmationNumbervalue.'||'.$ProcessIdvalue;
		$guestadult=$_SESSION['adult_count'];
		$guestchild=$_SESSION['child_count'];
		$cin=date("Y-m-d", strtotime($_SESSION['sd']));
		$cout=date("Y-m-d", strtotime($_SESSION['ed']));
	$date=date('Y-m-d');
	$roomcountss=$_SESSION['room_count'];;
	if(isset($_SESSION['logged_in']))
	{
		$user_id = 	$_SESSION['b2c_userid'];
	}
	else
	{
		$user_id=0;
	}
	
	$nights = $_SESSION['days'] ;
    $dateFromValc = Date('Y-m-d', strtotime("-5 days" , strtotime ( $cin )));
	$nights = $_SESSION['days'] ;
	$api='hotelspro';
	$val_last=$this->Hotel_Model->inser_customer_book_hotelpro($h_hotel_id,$h_hotel_name,$h_star,$h_description,$h_address,$h_phone,$h_fax,$h_room_type,$h_cancel_policy,$cin,$cout,$date,$roomcountss,$user_id,$nights,$trans_id,$adults,$child,$con_id_org,$dateFromValc,$h_city,$api);
    //$this->Hotel_Model->inser_customer_book_hotelpro_trans_hotel($trans_id,$ConfirmationNumbervalue,$user_id,$val_last);
	 $this->Hotel_Model->inser_customer_book_hotelpro_trans_hotel($con_id_org,$ConfirmationNumbervalue,$user_id,$val_last,$BookingStatusvalue);

	$this->voucher_email($val_last);	
	redirect('hotel/voucher/'.$val_last, 'refresh');	//redirect('hotel/voucher/'.$val_last, 'refresh');		
	
	}
	}
	 else if($service->api == 'dotw')
	 {
		
		$res_id=explode('-',$result_id);
		//print_r($res_id); exit;
		for($rs=0;$rs< count($res_id);$rs++)
		{
		  $search=$this->Hotel_Model->get_cancel_attrib_new($res_id[$rs]);
		  $adults[]=$search->adult;
		  $childs[]=$search->child;		
		  //$allocation_detail[] = $search->contractnameVal;		
		}
	     
		$h_adult = implode("-",$adults);
		$h_child = implode("-",$childs);
		
		$data['guestadult']=$guestadult=array_sum($adults);
		$data['guestchild']=$guestchild=array_sum($childs);
		
			$address=$contact_info->city;
			//print_r($_SESSION); exit;
			
			
			$fname1=array();$lname1=array();
			for($si=0;$si< count($pass_info); $si++)
			{
			 $fname1=$pass_info[$si]->first_name;			 
			 $lname1=$pass_info[$si]->last_name;			
			}
			 $roomusedtypeval=$_SESSION['room_used_type'];
			 $roomcount=$_SESSION['room_count'];
			 $child_age=$_SESSION['child_age'];
			 $markup = '';
			 
			 $username = '';
			 $email = $contact_info->email;
			 


$hotelroom = '';
		//dotw booking XML 
		    	$adult =  $_SESSION['adult_count'];
		$children =  $_SESSION['child_count'];

		    for($j=0; $j< $roomcount; $j++)
			{
			$service=$this->Hotel_Model->get_searchresult($res_id[$j]);
			
	    	$roomtype_code = $service->room_code;
			
			$dateFromValc =$_SESSION['book_final_book_val']['cancel_till_n'];
			$hotel_code = $service->hotel_code;
			$inclusion_val = $service->inclusion;
			$allocation_detail = $service->shortname;
			$selectedroombasis = $service->inoffcode;
			}
			
			$getroom = '';
			$cin = $this->session->userdata('unix_cin');
			$cout = $this->session->userdata('unix_cout');
					$sec_res=$_SESSION['ses_id'];
    	$adult =  $_SESSION['adult_count'];
		$children =  $_SESSION['child_count'];


	   	$room_used_type=$_SESSION['room_used_type'];
		$city_nm=$_SESSION['city'];
		$city_arr = explode(',',$city_nm);
		$city = $city_arr[0];		
		$sd=$_SESSION['sd'];
		$room_count=$_SESSION['room_count'];
		$ed=$_SESSION['ed'];
	$city_val = $this->Hotel_Model->get_city_code($city_nm);  
		$city_code = $city_val->dotw;
		
		          
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
		
		$tim = $this->Hotel_Model->unixToMySQL(time()); 
		$dotw_cin_dte =$cin.' '.$tim;
		
		$tim = $this->Hotel_Model->unixToMySQL(time()); 
		$dotw_cout_dte =$cout.' '.$tim;
		
		$data['ucin'] = $dotw_cin_dte;//strtotime($dotw_cin_dte);
		
		$hotel_det['unix_checkin']  = strtotime($dotw_cin_dte);
		$data['ucout'] = $dotw_cout_dte;//strtotime($dotw_cout_dte);
		$hotel_det['unix_checkout']  = strtotime($dotw_cout_dte);
		
		$this->session->set_userdata(array('unix_cin'=>$data['ucin'],'unix_cout'=>$data['ucout']));
		
		
		$hotelroom='';
		
		
		$actual_getroom = '';



	   
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
				//echo 'sb='.$sb_room_cnt.' db='.$db_room_cnt.' dbc='.$dbc_room_cnt.' dbcc='.$dbcc_room_cnt.' tb='.$tb_room_cnt.' qb='.$q_room_cnt; exit;
		//print_r($room_used_type); exit;

		$room_nos = 0;
		$room='';
		
		
			//single room
			
				//sb
				
				if($sb_room_cnt==1) //one room
				{
					$room.='<adultsCode>1</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
						<rateBasis>-1</rateBasis>';
					$room_nos++;
				}
				if($sb_room_cnt==2)//two room
				{
					$room.='<adultsCode>1</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
						<rateBasis>-1</rateBasis>';
					$room_nos++;
					$room.='<adultsCode>1</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
						<rateBasis>-1</rateBasis>';
					$room_nos++;
				}			
				if($sb_room_cnt==3)//three rooms
				{
					$room.='<adultsCode>1</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
						<rateBasis>-1</rateBasis>';
					$room_nos++;
					$room.='<adultsCode>1</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
						<rateBasis>-1</rateBasis>';
					$room_nos++;
					$room.='<adultsCode>1</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
						<rateBasis>-1</rateBasis>';
					$room_nos++;
				}
			
			 //double room or twin room
			
				//db
				
				if($db_room_cnt==1) //one room
				{
					$room.='<adultsCode>2</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
						<rateBasis>-1</rateBasis>';
					$room_nos++;
				}
				if($db_room_cnt==2)//two room
				{
					$room.='<adultsCode>2</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
						<rateBasis>-1</rateBasis>';
					$room_nos++;
					$room.='<adultsCode>2</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
						<rateBasis>-1</rateBasis>';
					$room_nos++;
				}			
				if($db_room_cnt==3)//three rooms
				{
					$room.='<adultsCode>2</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
						<rateBasis>-1</rateBasis>';
					$room_nos++;
					$room.='<adultsCode>2</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
						<rateBasis>-1</rateBasis>';
					$room_nos++;
					$room.='<adultsCode>2</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
						<rateBasis>-1</rateBasis>';
					$room_nos++;
				}						
			
			 //double plus child room or twin plus child room
			
				//dbc
				
				if($dbc_room_cnt==1)
				{
					$childage=$this->session->userdata('childage');
					$room.='<adultsCode>2</adultsCode>
						<children no="1">
							<child runno="1">5</child>
						</children>
						<extraBed>0</extraBed>
						<rateBasis>-1</rateBasis>';
					$room_nos++;
				}
				if($dbc_room_cnt==2)
				{
					
					$room.='<adultsCode>2</adultsCode>
						<children no="1">
							<child runno="1">5</child>
						</children>
						<extraBed>0</extraBed>
						<rateBasis>-1</rateBasis>';
					$room_nos++;
					$room.='<adultsCode>2</adultsCode>
						<children no="1">
							<child runno="1">4</child>
						</children>
						<extraBed>0</extraBed>
						<rateBasis>-1</rateBasis>';
					$room_nos++;
				}
				if($dbc_room_cnt==3)
				{
					
					$room.='<adultsCode>2</adultsCode>
						<children no="1">
							<child runno="1">5</child>
						</children>
						<extraBed>0</extraBed>
						<rateBasis>-1</rateBasis>';
					$room_nos++;
					$room.='<adultsCode>2</adultsCode>
						<children no="1">
							<child runno="1">4</child>
						</children>
						<extraBed>0</extraBed>
						<rateBasis>-1</rateBasis>';
					$room_nos++;
					$room.='<adultsCode>2</adultsCode>
						<children no="1">
							<child runno="1">5</child>
						</children>
						<extraBed>0</extraBed>
						<rateBasis>-1</rateBasis>';
					$room_nos++;
				}	

			
			
			

                //dbcc
				
				if($dbcc_room_cnt==1)
				{
					$childage=$this->session->userdata('childage');
					$room.='<adultsCode>2</adultsCode>
						<children no="2">
							<child runno="0">5</child>
							<child runno="1">5</child>
						</children>
						<extraBed>0</extraBed>
						<rateBasis>-1</rateBasis>';
					$room_nos++;
				}
				if($dbcc_room_cnt==2)
				{
					
					$room.='<adultsCode>2</adultsCode>
						<children no="2">
							<child runno="0">5</child>
							<child runno="1">5</child>
						</children>
						<extraBed>0</extraBed>
						<rateBasis>-1</rateBasis>';
					$room_nos++;
					$room.='<adultsCode>2</adultsCode>
						<children no="2">
							<child runno="0">4</child>
							<child runno="1">5</child>
						</children>
						<extraBed>0</extraBed>
						<rateBasis>-1</rateBasis>';
					$room_nos++;
				}
				if($dbcc_room_cnt==3)
				{
					
					$room.='<adultsCode>2</adultsCode>
						<children no="2">
							<child runno="0">5</child>
							<child runno="1">5</child>
						</children>
						<extraBed>0</extraBed>
						<rateBasis>-1</rateBasis>';
					$room_nos++;
					$room.='<adultsCode>2</adultsCode>
						<children no="2">
							<child runno="0">5</child>
							<child runno="1">5</child>
						</children>
						<extraBed>0</extraBed>
						<rateBasis>-1</rateBasis>';
					$room_nos++;
					$room.='<adultsCode>2</adultsCode>
						<children no="2">
							<child runno="0">5</child>
							<child runno="1">5</child>
						</children>
						<extraBed>0</extraBed>
						<rateBasis>-1</rateBasis>';
					$room_nos++;
				}									
				
			
			//Triple room
			
				//tb
				
				if($tb_room_cnt==1) //one room
				{
					$room.='<adultsCode>3</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
						<rateBasis>-1</rateBasis>';
					$room_nos++;
				}
				if($tb_room_cnt==2)//two room
				{
					$room.='<adultsCode>3</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
						<rateBasis>-1</rateBasis>';
					$room_nos++;
					$room.='<adultsCode>3</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
						<rateBasis>-1</rateBasis>';
					$room_nos++;
				}			
				if($tb_room_cnt==3)//three rooms
				{
					$room.='<adultsCode>3</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
						<rateBasis>-1</rateBasis>';
					$room_nos++;
					$room.='<adultsCode>3</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
						<rateBasis>-1</rateBasis>';
					$room_nos++;
					$room.='<adultsCode>3</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
						<rateBasis>-1</rateBasis>';
					$room_nos++;
				}							
			
			//Quad room
			
				//qb
				
				if($q_room_cnt==1) //one room
				{
					$room.='<adultsCode>4</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
						<rateBasis>-1</rateBasis>';
					$room_nos++;
				}
				if($q_room_cnt==2)//two room
				{
					$room.='<adultsCode>4</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
						<rateBasis>-1</rateBasis>';
					$room_nos++;
					$room.='<adultsCode>4</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
						<rateBasis>-1</rateBasis>';
					$room_nos++;
				}			
				if($q_room_cnt==3)//three rooms
				{
					$room.='<adultsCode>4</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
						<rateBasis>-1</rateBasis>';
					$room_nos++;
					$room.='<adultsCode>4</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
						<rateBasis>-1</rateBasis>';
					$room_nos++;
					$room.='<adultsCode>4</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
						<rateBasis>-1</rateBasis>';
					$room_nos++;
				}							
			
		if($room_count == 1)
{
		    for($n=0; $n< count($res_id); $n++)
			{
		
			
	    	$roomtype_code = $roomtype_code;
			
			$hotel_code =$hotel_code;
			$inclusion =$inclusion_val;
			//echo $roomtype_code.'<br/>'.$hotel_code.'<br/>'.$inclusion; exit;
			$dotw_getrooms = $this->Hotel_Model->get_searchresult_dw($roomtype_code,$hotel_code,$inclusion);
			$allocation_search_detail = $dotw_getrooms->shortname;
			$selectRate_search = $dotw_getrooms->inoffcode;
			
			
			$actual_getroom .='<room runno="'.$n.'">
			                '.$room.'
			                <roomTypeSelected>
							<code>'.$roomtype_code.'</code>
				            <selectedRateBasis>'.$selectRate_search.'</selectedRateBasis>
				            <allocationDetails>'.$allocation_search_detail.'</allocationDetails>
							</roomTypeSelected>
							</room>';						
			}
}
else
{
	$allocation_multi__detail = array();
	$selectRate_multi = array();
	$adult_particular_count_multi = array();
	$child_particular_count_multi = array();
	$runno_particular = array();
	
	        
		    for($d=0; $d< count($res_id); $d++)
			{
				
				$roomtype_code = $roomtype_code;
			
			$hotel_code =$hotel_code;
			$inclusion =$inclusion_val;
				
	    	$cost = explode('-',$this->session->userdata('merge_total'));
			
			$runnumber = explode('-',$this->session->userdata('runno'));
			
			
			$dotw_get_multi_rooms=$this->Hotel_Model->get_dw_merge_getrroms($roomtype_code[$d],$hotel_code,$inclusion[$d],$cost[$d],$runnumber[$d]);
			
			$allocation_multi_detail[] = $dotw_get_multi_rooms->shortname;
			$selectRate_multi[] = $dotw_get_multi_rooms->inoffcode;
			$adult_particular_count_multi[] = $dotw_get_multi_rooms->adult;
   		    $child_particular_count_multi[] = $dotw_get_multi_rooms->child;
            $runno_particular[] = $dotw_get_multi_rooms->shurival;
			
			}
			
			for($k=0; $k< count($res_id); $k++)
			{
			$actual_getroom .='<room runno="'.$runnumber[$k].'">
			                <adultsCode>'.$adult_particular_count_multi[$k].'</adultsCode>
                            <children no="0"></children>
							<extraBed>0</extraBed>
                            <rateBasis>-1</rateBasis>
			                <roomTypeSelected>
							<code>'.$roomtype_code[$k].'</code>
				            <selectedRateBasis>'.$selectRate_multi[$k].'</selectedRateBasis>
				            <allocationDetails>'.$allocation_multi_detail[$k].'</allocationDetails>
							</roomTypeSelected>
							</room>';	
							
			}
	
}

		$username = "LUXURY";
		$password = md5('Tayseer.ayad@mybookingplanner.');
		$user_id_dot='583215';
		$req='<?xml version="1.0" encoding="UTF-8" ?>
		      <customer>
		      <username>'.$username.'</username>
			  <password>'.$password.'</password>
			  <id>'.$user_id_dot.'</id>
			  <source>1</source>
			  <product>hotel</product>
    <request command="getrooms">
    <bookingDetails>
    <fromDate>'.$cin.'</fromDate>
    <toDate>'.$cout.'</toDate>
    <currency>520</currency>
	<rooms no="'.count($res_id).'">
    '.$actual_getroom.'
	</rooms>    
    <productId>'.$hotel_code.'</productId>
    <roomModified></roomModified>
    </bookingDetails>
    </request>
    </customer>';
  // echo $req; exit;
    $URL2 = "http://xmldev.dotwconnect.com/gateway.dotw";//local
			 
    $ch2=curl_init();
    curl_setopt($ch2, CURLOPT_URL, $URL2);
    curl_setopt($ch2, CURLOPT_TIMEOUT, 180);
    curl_setopt($ch2, CURLOPT_HEADER, 0);
    curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch2, CURLOPT_POST, 1);
    curl_setopt($ch2, CURLOPT_POSTFIELDS, $req);
    curl_setopt($ch2, CURLOPT_SSL_VERIFYHOST, 1);
    curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, FALSE); 
    curl_setopt($ch2, CURLOPT_SSLVERSION, 3);	
    curl_setopt($ch2, CURLOPT_FOLLOWLOCATION, FALSE);

    $httpHeader2 = array("Content-Type: text/xml; charset=UTF-8","Content-Encoding: UTF-8");
    curl_setopt($ch2, CURLOPT_HTTPHEADER, $httpHeader2);
    curl_setopt ($ch2, CURLOPT_ENCODING, "gzip");
    $data2=curl_exec($ch2);
    $error2=curl_getinfo( $ch2, CURLINFO_HTTP_CODE );
    curl_close($ch2);
	//echo $data2; exit;
    $status_new='';
    $roomname='';
	$allocationDetails = array();
	$status_attr = array();
	$alloc = array();
	


    $dom2=new DOMDocument();
    $dom2->loadXML($data2);
				
     			$rooms = $dom2->getElementsByTagName("rooms");
				foreach($rooms as $val7)
				{
					$room = $val7->getElementsByTagName("room");
					$x=0;
					$cost_value=0;
					foreach($room as $val8)
					{
						$adults=$room->item($x)->getAttribute('adults');
						
						$children=$room->item($x)->getAttribute('children');
						
						$childrenages=$room->item($x)->getAttribute('childrenages');
						$extrabed=$room->item($x)->getAttribute('extrabeds');
						$result['extra_bed']=$extrabed;
						if($adults==1 && $children==0)
						{
							$type = 'Single';
						}
						else if($adults==2 && $children==0)
						{
							$type = 'Double/Twin';
						}
						else if($adults==3 && $children==0)
						{
							$type = 'Triple';
						}
						else if($adults==4 && $children==0)
						{
							$type = 'Quad';
						}
						else if($adults==2 && $children==1)
						{
							$type = 'Double plus child/Twin plus child';
						}
						else if($adults==2 && $children==2)
						{
							$type = 'Double plus Double child/Twin plus Twin child';
						}
						//room type
						$result['adultcode']=$adults;
						$result['childcode']=$children;
						
						
						$price_bkup['room_type'] = $type;
						$roomType = $val8->getElementsByTagName("roomType");
						//room type code
							
						$e=0;
						foreach($roomType as $val9)
						{
							//Room type name
							$price_bkup['roomtypecode']= $roomcode = $roomType->item($e)->getAttribute('roomtypecode');
							$result['room_catecode']=$price_bkup['roomtypecode'];
							$rm_type = $val9->getElementsByTagName("name");
							$result['room_type']= $room_type =  $rm_type->item(0)->nodeValue;
							
							$rateBases = $val9->getElementsByTagName("rateBases");
							 $v=0;
							
							foreach($rateBases as $val10)							
							{
								
						       $rateBasis = $val10->getElementsByTagName("rateBasis");
							   
								foreach($rateBasis as $val11)
								{
									
									  $mealid=$rateBasis->item($v)->getAttribute('id');
									  $meal=$rateBasis->item($v)->getAttribute('description');
									
									//Allocation Details
										
									$alloc_details = $val11->getElementsByTagName("allocationDetails");
									$alloc = $alloc_details->item(0)->nodeValue;
									
									
									$check_status = $val11->getElementsByTagName("status");
									$av_status = $check_status->item(0)->nodeValue;
									
									//Total cost value
									$total = $val11->getElementsByTagName("total");
									$costval = $result['cost_value']=round($total->item(0)->nodeValue,2);
									
									$cancellationRules = $val11->getElementsByTagName("cancellationRules");

								   	
									$this->Hotel_Model->update_dotw_alloc($this->session->userdata('hotelcode'),$meal,$roomcode,$alloc,$costval);
									
									 	
								  $v++;		
								}
									
									
							}
						
							
							$e++;
						}$x++;				
					}					
				}

	$adult =  $_SESSION['adult_count'];
		$children =  $_SESSION['child_count'];
$actual_room = '';


$room_nos = 0;
$room='';
		
       
		//echo 'sb='.$sb_room_cnt.' db='.$db_room_cnt.' dbc='.$dbc_room_cnt.' dbcc='.$dbcc_room_cnt.' tb='.$tb_room_cnt.' qu='.$q_room_cnt;  exit;         
		for($j=0;$j< $room_count;$j++)
		{
			if($room_used_type[$j]=='sb')//single room
			{
				if($sb_room_cnt==1) //one room
				{
					$room.='<adultsCode>1</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
						 <passengersDetails>
                <passenger leading="yes">
                    <salutation>147</salutation>
                    <firstName>fn</firstName>
                    <lastName>fgbn</lastName>
                </passenger>
            </passengersDetails>';
					$room_nos++;
				}
				if($sb_room_cnt==2)//two room
				{
					$room.='
						<adultsCode>1</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
						 <passengersDetails>
                <passenger leading="yes">
                    <salutation>147</salutation>
                    <firstName>fn</firstName>
                    <lastName>fgbn</lastName>
                </passenger>
				</passengersDetails>';
					$room_nos++;
					$room='<adultsCode>1</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
												 <passengersDetails>
                <passenger leading="yes">
                    <salutation>147</salutation>
                    <firstName>fn</firstName>
                    <lastName>fgbn</lastName>
                </passenger>
				</passengersDetails>
				';
				
					$room_nos++;
				}			
				if($sb_room_cnt==3)//three rooms
				{
					$room.='<adultsCode>1</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
												 <passengersDetails>
                <passenger leading="yes">
                    <salutation>147</salutation>
                    <firstName>fn</firstName>
                    <lastName>fgbn</lastName>
                </passenger>
				</passengersDetails>';
					$room_nos++;
					$room.='<adultsCode>1</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
												 <passengersDetails>
                <passenger leading="yes">
                    <salutation>147</salutation>
                    <firstName>fn</firstName>
                    <lastName>fgbn</lastName>
                </passenger>
				</passengersDetails>';
					$room_nos++;
					$room.='<adultsCode>1</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
												 <passengersDetails>
                <passenger leading="yes">
                    <salutation>147</salutation>
                    <firstName>fn</firstName>
                    <lastName>fgbn</lastName>
                </passenger>
				</passengersDetails>';
					$room_nos++;
				}							
			}
			if($room_used_type[$j]=='db') //double room or twin room
			{
				if($db_room_cnt==1) //one room
				{
					$room.='<adultsCode>2</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
												 <passengersDetails>
                <passenger leading="yes">
                    <salutation>147</salutation>
                    <firstName>fn</firstName>
                    <lastName>fgbn</lastName>
                </passenger>
				</passengersDetails>';
					$room_nos++;
				}
				if($db_room_cnt==2)//two room
				{
					$room.='<adultsCode>2</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
												 <passengersDetails>
                <passenger leading="yes">
                    <salutation>147</salutation>
                    <firstName>fn</firstName>
                    <lastName>fgbn</lastName>
                </passenger>
				</passengersDetails>';
					$room_nos++;
					$room.='<adultsCode>2</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
												 <passengersDetails>
                <passenger leading="yes">
                    <salutation>147</salutation>
                    <firstName>fn</firstName>
                    <lastName>fgbn</lastName>
                </passenger>
				</passengersDetails>';
					$room_nos++;
				}			
				if($db_room_cnt==3)//three rooms
				{
					$room.='<adultsCode>2</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
												 <passengersDetails>
                <passenger leading="yes">
                    <salutation>147</salutation>
                    <firstName>fn</firstName>
                    <lastName>fgbn</lastName>
                </passenger>
				</passengersDetails>';
					$room_nos++;
					$room.='<adultsCode>2</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
												 <passengersDetails>
                <passenger leading="yes">
                    <salutation>147</salutation>
                    <firstName>fn</firstName>
                    <lastName>fgbn</lastName>
                </passenger>
				</passengersDetails>';
					$room_nos++;
					$room.='<adultsCode>2</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
												 <passengersDetails>
                <passenger leading="yes">
                    <salutation>147</salutation>
                    <firstName>fn</firstName>
                    <lastName>fgbn</lastName>
                </passenger>
				</passengersDetails>';
					$room_nos++;
				}						
			}
			if($room_used_type[$j]=='dbc') //double plus child room or twin plus child room
			{
				if($dbc_room_cnt==1)
				{
					$childage=$this->session->userdata('childage');
					$room.='<adultsCode>2</adultsCode>
						<children no="1">
							<child runno="1">5</child>
						</children>
						<extraBed>0</extraBed>
												 <passengersDetails>
                <passenger leading="yes">
                    <salutation>147</salutation>
                    <firstName>fn</firstName>
                    <lastName>fgbn</lastName>
                </passenger>
				</passengersDetails>';
					$room_nos++;
				}
				if($dbc_room_cnt==2)
				{
					
					$room.='<adultsCode>2</adultsCode>
						<children no="1">
							<child runno="1">5</child>
						</children>
						<extraBed>0</extraBed>
												 <passengersDetails>
                <passenger leading="yes">
                    <salutation>147</salutation>
                    <firstName>fn</firstName>
                    <lastName>fgbn</lastName>
                </passenger>
				</passengersDetails>';
					$room_nos++;
					$room.='<adultsCode>2</adultsCode>
						<children no="1">
							<child runno="1">4</child>
						</children>
						<extraBed>0</extraBed>
												 <passengersDetails>
                <passenger leading="yes">
                    <salutation>147</salutation>
                    <firstName>fn</firstName>
                    <lastName>fgbn</lastName>
                </passenger>
				</passengersDetails>';
					$room_nos++;
				}
				if($dbc_room_cnt==3)
				{
					
					$room.='<adultsCode>2</adultsCode>
						<children no="1">
							<child runno="1">5</child>
						</children>
						<extraBed>0</extraBed>
												 <passengersDetails>
                <passenger leading="yes">
                    <salutation>147</salutation>
                    <firstName>fn</firstName>
                    <lastName>fgbn</lastName>
                </passenger>
				</passengersDetails>';
					$room_nos++;
					$room.='<adultsCode>2</adultsCode>
						<children no="1">
							<child runno="1">4</child>
						</children>
						<extraBed>0</extraBed>
												 <passengersDetails>
                <passenger leading="yes">
                    <salutation>147</salutation>
                    <firstName>fn</firstName>
                    <lastName>fgbn</lastName>
                </passenger>
				</passengersDetails>';
					$room_nos++;
					$room.='<adultsCode>2</adultsCode>
						<children no="1">
							<child runno="1">5</child>
						</children>
						<extraBed>0</extraBed>
												 <passengersDetails>
                <passenger leading="yes">
                    <salutation>147</salutation>
                    <firstName>fn</firstName>
                    <lastName>fgbn</lastName>
                </passenger>
				</passengersDetails>';
					$room_nos++;
				}							
			}
			if($room_used_type[$j]=='dbcc') //double plus child room or twin plus child room
			{
				if($dbcc_room_cnt==1)
				{
					$childage=$this->session->userdata('childage');
					$room.='<adultsCode>2</adultsCode>
						<children no="1">
							<child runno="1">5</child>
						</children>
						<extraBed>0</extraBed>
												 <passengersDetails>
                <passenger leading="yes">
                    <salutation>147</salutation>
                    <firstName>fn</firstName>
                    <lastName>fgbn</lastName>
                </passenger>
				</passengersDetails>';
					$room_nos++;
				}
				if($dbcc_room_cnt==2)
				{
					
					$room.='<adultsCode>2</adultsCode>
						<children no="1">
							<child runno="1">5</child>
						</children>
						<extraBed>0</extraBed>
												 <passengersDetails>
                <passenger leading="yes">
                    <salutation>147</salutation>
                    <firstName>fn</firstName>
                    <lastName>fgbn</lastName>
                </passenger>
				</passengersDetails>';
					$room_nos++;
					$room.='<adultsCode>2</adultsCode>
						<children no="1">
							<child runno="1">4</child>
						</children>
						<extraBed>0</extraBed>
												 <passengersDetails>
                <passenger leading="yes">
                    <salutation>147</salutation>
                    <firstName>fn</firstName>
                    <lastName>fgbn</lastName>
                </passenger>
				</passengersDetails>';
					$room_nos++;
				}
				if($dbcc_room_cnt==3)
				{
					
					$room.='<adultsCode>2</adultsCode>
						<children no="1">
							<child runno="1">5</child>
						</children>
						<extraBed>0</extraBed>
												 <passengersDetails>
                <passenger leading="yes">
                    <salutation>147</salutation>
                    <firstName>fn</firstName>
                    <lastName>fgbn</lastName>
                </passenger>
				</passengersDetails>';
					$room_nos++;
					$room.='<adultsCode>2</adultsCode>
						<children no="1">
							<child runno="1">4</child>
						</children>
						<extraBed>0</extraBed>
												 <passengersDetails>
                <passenger leading="yes">
                    <salutation>147</salutation>
                    <firstName>fn</firstName>
                    <lastName>fgbn</lastName>
                </passenger>
				</passengersDetails>';
					$room_nos++;
					$room.='<adultsCode>2</adultsCode>
						<children no="1">
							<child runno="1">5</child>
						</children>
						<extraBed>0</extraBed>
												 <passengersDetails>
                <passenger leading="yes">
                    <salutation>147</salutation>
                    <firstName>fn</firstName>
                    <lastName>fgbn</lastName>
                </passenger>
				</passengersDetails>';
					$room_nos++;
				}							
			}			
			if($room_used_type[$j]=='tr')//Triple room
			{
				if($tb_room_cnt==1) //one room
				{
					$room.='<adultsCode>3</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
												 <passengersDetails>
                <passenger leading="yes">
                    <salutation>147</salutation>
                    <firstName>fn</firstName>
                    <lastName>fgbn</lastName>
                </passenger>
				</passengersDetails>';
					$room_nos++;
				}
				if($tb_room_cnt==2)//two room
				{
					$room.='<adultsCode>3</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
												 <passengersDetails>
                <passenger leading="yes">
                    <salutation>147</salutation>
                    <firstName>fn</firstName>
                    <lastName>fgbn</lastName>
                </passenger>
				</passengersDetails>';
					$room_nos++;
					$room='<adultsCode>3</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
												 <passengersDetails>
                <passenger leading="yes">
                    <salutation>147</salutation>
                    <firstName>fn</firstName>
                    <lastName>fgbn</lastName>
                </passenger>
				</passengersDetails>';
					$room_nos++;
				}			
				if($tb_room_cnt==3)//three rooms
				{
					$room.='<adultsCode>3</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
												 <passengersDetails>
                <passenger leading="yes">
                    <salutation>147</salutation>
                    <firstName>fn</firstName>
                    <lastName>fgbn</lastName>
                </passenger>
				</passengersDetails>';
					$room_nos++;
					$room.='<adultsCode>3</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
												 <passengersDetails>
                <passenger leading="yes">
                    <salutation>147</salutation>
                    <firstName>fn</firstName>
                    <lastName>fgbn</lastName>
                </passenger>
				</passengersDetails>';
					$room_nos++;
					$room.='<adultsCode>3</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
												 <passengersDetails>
                <passenger leading="yes">
                    <salutation>147</salutation>
                    <firstName>fn</firstName>
                    <lastName>fgbn</lastName>
                </passenger>
				</passengersDetails>';
					$room_nos++;
				}							
			}
			if($room_used_type[$j]=='qu')//Quad room
			{
				if($q_room_cnt==1) //one room
				{
					$room.='<adultsCode>4</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
												 <passengersDetails>
                <passenger leading="yes">
                    <salutation>147</salutation>
                    <firstName>fn</firstName>
                    <lastName>fgbn</lastName>
                </passenger>
				</passengersDetails>';
					$room_nos++;
				}
				if($q_room_cnt==2)//two room
				{
					$room.='<adultsCode>4</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
												 <passengersDetails>
                <passenger leading="yes">
                    <salutation>147</salutation>
                    <firstName>fn</firstName>
                    <lastName>fgbn</lastName>
                </passenger>
				</passengersDetails>';
					$room_nos++;
					$room='<adultsCode>4</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
												 <passengersDetails>
                <passenger leading="yes">
                    <salutation>147</salutation>
                    <firstName>fn</firstName>
                    <lastName>fgbn</lastName>
                </passenger>
				</passengersDetails>';
					$room_nos++;
				}			
				if($q_room_cnt==3)//three rooms
				{
					$room.='<adultsCode>4</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
												 <passengersDetails>
                <passenger leading="yes">
                    <salutation>147</salutation>
                    <firstName>fn</firstName>
                    <lastName>fgbn</lastName>
                </passenger>
				</passengersDetails>';
					$room_nos++;
					$room.='<adultsCode>4</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
												 <passengersDetails>
                <passenger leading="yes">
                    <salutation>147</salutation>
                    <firstName>fn</firstName>
                    <lastName>fgbn</lastName>
                </passenger>
				</passengersDetails>';
					$room_nos++;
					$room.='<adultsCode>4</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
												 <passengersDetails>
                <passenger leading="yes">
                    <salutation>147</salutation>
                    <firstName>fn</firstName>
                    <lastName>fgbn</lastName>
                </passenger>
				</passengersDetails>';
					$room_nos++;
				}							
			}
		}


if($room_count == 1)
{
		    for($p=0; $p< count($res_id); $p++)
			{
		
		
			$inclusion =$inclusion_val;
			
			$dotw_rooms=$this->Hotel_Model->get_searchresult_dw($roomtype_code,$hotel_code,$inclusion);
			$all_detail = $dotw_rooms->shortname;
			$selectRate = $dotw_rooms->inoffcode;
			
			
			$actual_room .='<room runno="'.$p.'">
							<roomTypeCode>'.$roomtype_code.'</roomTypeCode>
				            <selectedRateBasis>'.$selectRate.'</selectedRateBasis>
				            <allocationDetails>'.$all_detail.'</allocationDetails>
							'.$room.'             
                			</room>';						
			}
}
else
{
	
		    for($p=0; $p< count($res_id); $p++)
			{
					
$roomtype_code = $roomtype_code;
			
			$hotel_code =$hotel_code;
			$inclusion =$inclusion_val;
			
			$cost = explode('-',$this->session->userdata('merge_total'));
			
			$dotw_rooms=$this->Hotel_Model->get_searchresult_dw_merge($roomtype_code[$p],$hotel_code,$inclusion[$p],$cost[$p]);
			$all_detail = $dotw_rooms->shortname;
			$selectRate = $dotw_rooms->inoffcode;
			$adult_particular_count = $dotw_rooms->adult;
   		    $child_particular_count = $dotw_rooms->child;

			
			
			$actual_room .='<room runno="'.$p.'">
			                <roomTypeCode>'.$roomtype_code[$p].'</roomTypeCode>
				            <selectedRateBasis>'.$selectRate.'</selectedRateBasis>
				            <allocationDetails>'.$all_detail.'</allocationDetails>
                            <adultsCode>'.$adult_particular_count.'</adultsCode>
						<children no="'.$child_particular_count.'"></children>
						<extraBed>0</extraBed>
						 <passengersDetails>
                <passenger leading="yes">
                    <salutation>147</salutation>
                    <firstName>fn</firstName>
                    <lastName>fgbn</lastName>
                </passenger>
            </passengersDetails>
			</room>';		
							
			}
			
			
	
}



		$username = "LUXURY";
		$password = md5('Tayseer.ayad@mybookingplanner.');
		$user_id_dot='583215';
		$req1='<?xml version="1.0" encoding="UTF-8" ?>
		      <customer>
		      <username>'.$username.'</username>
			  <password>'.$password.'</password>
			  <id>'.$user_id_dot.'</id>
			  <source>1</source>
			  <product>hotel</product>
			  <request command="confirmbooking">
			  <bookingDetails>
			    <fromDate>'.$cin.'</fromDate>
				<toDate>'.$cout.'</toDate>
				<currency>520</currency>
				<productId>'.$hotel_code.'</productId>
				<sendCommunicationTo>provabexpress@gmail.com</sendCommunicationTo>
				
				<rooms no="'.count($res_id).'">
                '.$actual_room.'
				</rooms>
				</bookingDetails>
				</request>
				</customer>';
				
		//	echo $req1; 
		//		
				
						$URL2 = "http://xmldev.dotwconnect.com/gateway.dotw";//local
	
		 
        $ch2=curl_init();
        curl_setopt($ch2, CURLOPT_URL, $URL2);
        curl_setopt($ch2, CURLOPT_TIMEOUT, 180);
        curl_setopt($ch2, CURLOPT_HEADER, 0);
        curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch2, CURLOPT_POST, 1);
        curl_setopt($ch2, CURLOPT_POSTFIELDS, $req1);
		curl_setopt($ch2, CURLOPT_SSL_VERIFYHOST, 1);
		curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, FALSE); 
        curl_setopt($ch2, CURLOPT_SSLVERSION, 3);	
	  	curl_setopt($ch2, CURLOPT_FOLLOWLOCATION, true);
 
        $httpHeader2 = array(
            "Content-Type: text/xml; charset=UTF-8",
            "Content-Encoding: UTF-8"
        );
        curl_setopt($ch2, CURLOPT_HTTPHEADER, $httpHeader2);
		curl_setopt ($ch2, CURLOPT_ENCODING, "gzip");

        // Execute request, store response and HTTP response code
        
        $data4=curl_exec($ch2);
        $error2=curl_getinfo( $ch2, CURLINFO_HTTP_CODE );
        curl_close($ch2);		

		//echo $data4; exit;
		
		$bookingItemCodeval = array();
				$dom2=new DOMDocument();
				$dom2->loadXML($data4);
				
				$result=$dom2->getElementsByTagName("result");
				$vocc_dt = $result->item(0)->getAttribute("date");	
				$successful = $dom2->getElementsByTagName("successful");
				$success_status = $successful->item(0)->nodeValue;
				if($success_status=="TRUE")
				{
				$statusval = 'Confirmed';
				}
				else
				{
					$statusval = 'Processing';
				}
				if($success_status=="TRUE"){			
					$bookings=$dom2->getElementsByTagName("bookings");
					
					$i=0;
					$j=0;
					
					foreach($bookings as $val)
					{
						$booking=$val->getElementsByTagName("booking");
						$bookid='';
						$book_ref_nos='';
						$price='';
						
						foreach($booking as $val2)
						{
							
							$bookingReferenceNumber = $val2->getElementsByTagName("bookingReferenceNumber");
							$bookingItemCodeval[] = $bookingReferenceNumber->item(0)->nodeValue;
						}
					}
					
					
					
				}
		//print_r($bookingItemCodeval); exit;
		$bookingItemCodeval = implode('/',$bookingItemCodeval);
		$noofroom = $room_count;
		$adults = $adult;
		$child = $children;	
	
		$guestadult=$_SESSION['adult_count'];
		$guestchild=$_SESSION['child_count'];
		$cin=date("Y-m-d", strtotime($_SESSION['sd']));
		$cout=date("Y-m-d", strtotime($_SESSION['ed']));

		$date=date('Y-m-d');
		$roomcountss=$_SESSION['room_count'];;
	
    if(isset($_SESSION['logged_in']))
	{
	$user_id = 	$_SESSION['b2c_userid'];
	}
	else
	{
		$user_id=0;

	}
	$nights = $_SESSION['days'] ;
	
	$val_last=$this->Hotel_Model->inser_customer_book_hotelpro($h_hotel_id,$h_hotel_name,$h_star,$h_description,$h_address,$h_phone,$h_fax,$h_room_type,$h_cancel_policy,$cin,$cout,$date,$roomcountss,$user_id,$nights,$trans_id,$h_adult,$h_child,$con_id_org,$dateFromValc,$h_city,'dotw');
	
 $this->Hotel_Model->inser_customer_book_hotelpro_trans_hotel($con_id_org,$bookingItemCodeval,$user_id,$val_last,$statusval);
		$this->voucher_email($val_last);	

			redirect('hotel/voucher/'.$val_last, 'refresh');		
	     }
	 
	}
	function voucher_email($id)
{

	
	$result_view=$this->Hotel_Model->book_detail_view_voucher1($id);
	$con_id = $result_view->customer_contact_details_id;
	 
	
//echo $con_id;
	$trans=$this->Hotel_Model->transation_detail_contact($con_id);
	  $contact_info=$this->Hotel_Model->contact_info_detail_update($con_id);
	 $pass_info=$this->Hotel_Model->pass_info_detail($con_id);
// echo "<pre/>";
	//print_r($pass_info);exit;
		
		 $hotel_id = $result_view->hotel_code;
		 $hotel_details=$this->Hotel_Model->gethb_hoteldet($hotel_id);
		// $hotel_image= $this->Hotel_Model->gethb_hotelimage_new($hotel_id);
		 $hotel_decs='';
		$_SESSION['helperr_result_view']=$result_view;
		$_SESSION['helperr_trans']=$trans;
		$_SESSION['helperr_contact_info']=$contact_info;
		$_SESSION['helperr_pass_info']=$pass_info;
		$_SESSION['helperr_pass_hotel_details']=$hotel_details;
		
		 $this->load->helper('test');
	//$this->load->file(WEB_DIR.'test.php',true);
    $first_name =$contact_info->first_name; 
	//echo "<pre/>";
	//print_r($contact_info);exit;
	//$data =$_SESSION['voucher_data'];
	/*
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
	$msg = '';*/
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
	$msg .= '<html>
<head>

</head>
<body>
<div >
 
    <div >
   <div>
    <div class="hotelnames" style="min-height:329px;">
    
        <table width="100%" border="0" cellspacing="7" cellpadding="3" class="r-hoteldeta">
          <tr>
		  <td  class="right-hotel-name">
            <img src="'.WEB_DIR.'images/logo.jpg">
			</td>
          	<td  class="right-hotel-name">
           <span  style=" font-weight:bold;font-size:20px;"> <font color="#227fb0"> BOOKING VOUCHER</font></span>
			</td>
          </tr>
		  <tr>
		  <td colspan="2">
		  
 <span style="float:left;">Hotel Name : '.$result_view->hotel_name.'</span>
            <span style="float:right;"></span>
            <div style="float:left; clear:both">
            	<span class="sum-txt">Booking Number :</span>
                <span>'.$trans->booking_number.'</span>
             </div>
		  </td>
          <tr>
          	<td colspan="2" ><span style="font-size:15px"><strong>Dear Mr '.$contact_info->first_name.'</strong></span><br />
<span>Thank  you for booking your hotel with Stayaway. We are pleased to confirm your booking details as below:</span></td>
          </tr>';
           
			$adult_co = explode("-",$result_view->adult);
			$adult_count = array_sum($adult_co);
			
			$child_co = explode("-",$result_view->child);
			$child_count = array_sum($child_co);
			
			
          $msg.=' <tr>
          	<td width="350" align="left" valign="top"><table width="100%" border="0" cellspacing="5" cellpadding="5" class="sum-txt">
                  <tr>
                    <td colspan="2" class="mid-txt" style=" font-size:15px; margin-top:15px;  background-color:#bee7ff; border-radius:10px;  text-align:center"><strong>Traveller Details</strong></td>
                  </tr>
                  <tr>
                    <td width="230"><strong>Guest Name</strong></td>
                    <td width="120"><strong>: Mr '.$contact_info->first_name.'</strong></td>
                  </tr>
                  <tr>
                    <td><strong>No. of Adults</strong></td>
                    <td><strong>:'.$adult_count.' Adults</strong></td>
                  </tr>
                  <tr>
                    <td><strong>No. of Childern</strong></td>
                    <td><strong>: '.$child_count.' Childern</strong></td>
                  </tr>
                  <tr>
                    <td><strong>Voucher Date</strong></td>
                    <td><strong>: '.$trans->created_date.'</strong></td>
                  </tr>
                </table>
                </td>
            <td width="350" align="left" valign="top"><table width="100%" border="0" cellspacing="5" cellpadding="5" class="sum-txt">
                  <tr>
                    <td colspan="2" class="mid-txt" style=" font-size:15px; margin-top:15px;  background-color:#bee7ff; border-radius:10px; text-align:center"><strong>Your Reservation</strong>
</td>
                  </tr>
                  <tr>
                    <td width="230"><strong>Hotel Booking Number</strong></td>
                    <td width="120"><strong>: '.$trans->booking_number.'</strong></td>
                  </tr>
                  <tr>
                    <td><strong>Check - in</strong></td>
                    <td><strong>: '.$result_view->check_in.'</strong></td>
                  </tr>
                  <tr>
                    <td><strong>Check - out</strong></td>
                    <td><strong>: '.$result_view->check_out.'</strong></td>
                  </tr>
                  <tr>
                    <td><strong>Rooms</strong></td>
                    <td><strong>: '.$result_view->no_of_room.' Room</strong></td>
                  </tr>
                   <tr>
                    <td><strong>Nights</strong></td>
                    <td><strong>: '.$result_view->nights.' nights</strong></td>
                  </tr>
                </table>
                </td>
          </tr>
         
        </table>
      
    </div>
    
    
   
     
    
    <table align="left" width="100%" border="0" cellspacing="5" cellpadding="5" class="sum-txt" style="margin-top:15px; font-size:15px; font-weight:bold; background-color:#bee7ff; border-radius:10px;">
      
      <tr>
         <td width="200" align="left">Hotel Details</td>
         <td  align="left">&nbsp;</td>
         
      </tr>
    </table>
     <table align="left" width="100%" border="0" cellspacing="0" cellpadding="5" class="sum-txt" style="margin-top:2px; font-size:15px; border:1px #bee7ff solid; border-radius:10px;">
      <tr>
         <td align="left">
         	
            
            
       
              
                	<p class="mid-txt">'.$result_view->hotel_name.' 
 </p><br />

                    <p>'.$result_view->description.'</p>
            <br /> Address :       '.$result_view->address.'<br>City : '.$result_view->city.'	<br>Phone :'.$result_view->phone.'
            	<br>Fax : '.$result_view->fax.'	
            
         </td>
      </tr>
    </table>
    
    
    <table align="left" width="100%" border="0" cellspacing="5" cellpadding="5" class="sum-txt" style="margin-top:15px; font-size:15px; font-weight:bold; background-color:#bee7ff; border-radius:10px;">
      
      <tr>
         <td width="200" align="left">Room Details</td>
         <td  align="left">&nbsp;</td>
         
      </tr>
    </table>
     <table align="left" width="100%" border="0" cellspacing="0" cellpadding="5" class="sum-txt" style="margin-top:2px; font-size:15px; border:1px #bee7ff solid; border-radius:10px;">
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
    </table>
    
    
     <table align="left" width="100%" border="0" cellspacing="5" cellpadding="5" class="sum-txt" style="margin-top:15px; font-size:15px; font-weight:bold; background-color:#bee7ff; border-radius:10px;">
      
      <tr>
         <td width="200" align="left">Fare Summary</td>
         <td  align="left">&nbsp;</td>
         
      </tr>
    </table>
     <table align="left" width="100%" border="0" cellspacing="0" cellpadding="5" class="sum-txt" style="margin-top:2px; font-size:15px; border:1px #bee7ff solid; border-radius:10px;">
      <tr>
         <td align="left">
         	<div style="width:700px; margin:0 auto;">
            
            	<div class="hotelfa-div" style="border:none">
            	<div style="width:150px; float:left;">Total Room Price:  </div>
                <div style="width:550px; float:left" class="mid-txt">'.$trans->amount.' USD</div>
                </div>
                
            </div>
         </td>
      </tr>
    </table>
    
    
    <table align="left" width="100%" border="0" cellspacing="5" cellpadding="5" class="sum-txt" style="margin-top:15px; font-size:15px; font-weight:bold; background-color:#bee7ff; border-radius:10px;">
      <tr>
         <td width="200" align="left">Cancellation Polycy</td>
         <td  align="left">&nbsp;</td>
         
      </tr>
    </table>
     <table align="left" width="100%" border="0" cellspacing="0" cellpadding="5" class="sum-txt" style="margin-top:2px; font-size:15px; border:1px #bee7ff solid; border-radius:10px;">
      <tr>
         <td align="left">
         	<div style="width:700px; margin:0 auto;">
            
            	<div class="hotelfa-div" style="border:none">
            	<div style="float:left;">'.$result_view->cancel_policy.'</div>
                </div>
                
            </div>
         </td>
      </tr>
    </table>
    
    
     <table align="left" width="100%" border="0" cellspacing="5" cellpadding="5" class="sum-txt" style="margin-top:15px; font-size:15px; font-weight:bold; background-color:#bee7ff; border-radius:10px;">
      <tr>
         <td width="200" align="left">Passenger Details</td>
         <td  align="left">&nbsp;</td>
         
      </tr>
    </table>
     <table align="left" width="100%" border="0" cellspacing="0" cellpadding="5" class="sum-txt" style="margin-top:2px; font-size:15px; border:1px #bee7ff solid; border-radius:10px;">
      <tr>
         <td align="left">
         	<div style="width:700px; margin:0 auto;">
             ';
					for($i=0;$i< count($pass_info);$i++)
					{
					
            	$msg .='<div class="hotelfa-div" style="border:none">
            	<div style="width:690px; float:left;">Mr. '.$pass_info[$i]->first_name.' '.$pass_info[$i]->last_name.'</div>
                </div>';
             
					}
					
           	$msg .=' </div>
         </td>
      </tr>
    </table>
    
    <div style="float:left; margin-top:25px;">
    	
    </div>
    
    
    
     
     

    
  </div>
  </div>
</div>
      
</body>
</html>
';
	
	$email_id =$contact_info->email;
	//$email ='ruby.provab@gmail.com';
			$name='Hotel Booking Voucher - StayAway.com';
		$mail->AddReplyTo('bookings@stayaway.com',  'StayAway');
		$mail->AddAddress($email_id, $name);
		$mail->AddAttachment('test.pdf', 'Hotel Booking Voucher.pdf');
		$mail->SetFrom('bookings@stayaway.com', 'StayAway');
		$mail->Subject ='Hotel Booking Voucher - StayAway.com';
		

		$mail->Body = $msg;										
		$mail->SMTPAuth   = true;                 // enable SMTP authentication
		$mail->CharSet = 'utf-8';
		$mail->SMTPDebug  = 0;
		$mail->Send();
	/*
	    $this->email->reply_to('Ruby.provab@gmail.com', 'Provab');
		$this->email->from('Ruby.provab@gmail.com', 'Provab');
		$this->email->to($email_id);
	    $this->email->subject('Hotel Booking Voucher - StayAway.com');
		$this->email->message($msg);
		//$this->email->attach('../../test.pdf');
		$this->email->send();*/
	
}

	function news($facilities)
	{
		
			 $email=$this->input->post('email');
			$value1 = rawurldecode($facilities);
			
		
			$data=array('email'=>$value1);
			$this->db->insert('email_notification',$data);
			 $this->db->insert_id();
			$this->db->set('reg_date', 'NOW()', FALSE); 
			
			echo '<p>
			Your EmailId Registered Successfully.
			</p>';
		   
	}
	function contact_process()
	{
		 $name=$this->input->post('person_name');
		 $email=$this->input->post('email');
		 $comment=$this->input->post('comm');
		
		$data=array('name'=>$name ,'email'=>$email,'comment'=>$comment);
		//print '<pre />';print_r($data);exit;
		$this->db->insert('contact_us',$data);
		$this->db->insert_id();
			$config['protocol'] = 'smtp';
        $config['smtp_host'] = 'mail.provabextranet.com';
        $config['smtp_port'] = 25;
        $config['smtp_user'] = 'provabex';
        $config['smtp_pass'] = 'admin123';
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
			$msg.='<tr><td>Greetings From TravelBay.com,</td></tr>';
			$msg.='<tr><td>&nbsp;</td></tr>';
			$msg.= '<tr><td>We have received your Feedback. We would get back to you as soon as possible.</td></tr>';
			$msg.='<tr><td>&nbsp;</td></tr>';
			$msg.='<tr><td>Your Questions/Problems/Feedback: </td></tr>
			<tr><td> '.$comment.' </td></tr>
			<tr><td>&nbsp;</td></tr>';
			$msg.='
			<tr><td>&nbsp;</td></tr>
			<tr><td> Thanks & Regards,</td></tr>
			<tr><td><b> Team - Travelbay.com </b></td></tr>';
			$msg.='<tr><td>&nbsp;</td></tr>';
			$msg.='</table></body></html>';
			
			//echo $msg; exit;
			
			$from = 'help@travelbay.com';
			$sub = 'User Contact Us - Travelbay.com ';
			$this->email->from($from,'TravelBay');
			$to = strip_tags($email);
			$this->email->to($to);
			$this->email->cc('help@travelbay.com'); 
			$this->email->subject($sub);
			$this->email->message($msg);


				if($this->email->send())
				{
					//redirect('customer/login_page','refresh');
					echo  '<div style="margin-top:20px; font-weight:bold; width:573px; text-align:center;color:#243419; font-size:18px;">Thank you for your inquiry/feedback. If this message requires a response from us, we will contact your shortly.</div>';
					//redirect('hotel/index','refresh');
					
				}
				else
				{
					show_error($this->email->print_debugger());
				}
		
			
	}
	function voucher($val_last)
	{
		
	 $data['result_view']=$this->Hotel_Model->book_detail_view_voucher1($val_last);
	 $con_id = $data['result_view']->customer_contact_details_id;
	
	  $data['contact_info']=$this->Hotel_Model->contact_info_detail_update($con_id);
	  $data['trans']=$this->Hotel_Model->transation_detail_contact($con_id);
	  if($_SESSION['ses_id'] == $data['trans']->session)
	  {
	//$trans_id = $trans->transaction_details_id;
	//customer_info_details_id
	 $con_id_pass = $data['contact_info']->customer_info_details_id;
	 $data['pass_info']=$this->Hotel_Model->pass_info_detail($con_id_pass);
	 
		
		 $hotel_id = $data['result_view']->hotel_code;
		 $data['hotel_details']=$this->Hotel_Model->gethb_hoteldet($hotel_id);
		 $data['hotel_image']= $this->Hotel_Model->gethb_hotelimage_new($hotel_id);
		 $data['hotel_decs']='';
	//echo "<pre/>";
	//print_r($data);exit;
	
		 $this->load->view('hotel/voucher',$data);
	  }
	  else
	  {
		redirect('hotel/index','refresh');
	  }
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
		$this->load->view('contact');
	}
	function advantage()
	{
		$this->load->view('advantage');
	}
	function about()
	{
		$this->load->view('about_us');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */