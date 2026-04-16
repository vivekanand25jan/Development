<?php 
class Agent extends Controller {

	function Agent()
	{
		parent::Controller();	
		$this->load->model('Home_Model');
		$this->load->model('Agent_Model');
		$this->load->library('session');
		$this->load->model('Search_Model');
		$this->load->library('pagination');
		$this->load->model('Booking_Model');			
		$this->load->database();	
		if($this->session->userdata('agentid')=='')
		{
			redirect('home/go_to_login','refresh');
		}	
	
	}
	function dotw_parse($pass_value)
	{
		$city1=$this->input->post('citycode');
		$row2=$this->Home_Model->cityCode_dotw($city1);
		if($row2 !='')
		{
			$data['city_code']=trim($row2->city_code);
			$data['disp_city']=$this->input->post('disp_city');  
		}
		$currency = $this->input->post('costtype');
		$data['nos_of_room'] = $this->input->post('noofroom');
		//single or double
		$room_type=$this->session->userdata('roomusedtype');
		$roomcount = $this->session->userdata('roomcount');
				
		$data['currency']=$this->Search_Model->get_dotw_currcode($currency);
		
		$cin_dte=explode('/',$this->input->post('sd'));
		$dotw_cin_dte = $cin_dte[2].'-'.$cin_dte[1].'-'.$cin_dte[0];
		$tim = $this->Home_Model->unixToMySQL(time()); 
		$dotw_cin_dte .= ' '.$tim;
		
		$cout_dte=explode('/',$this->input->post('ed'));
		$dotw_cout_dte = $cout_dte[2].'-'.$cout_dte[1].'-'.$cout_dte[0];
		$tim = $this->Home_Model->unixToMySQL(time()); 
		$dotw_cout_dte .= ' '.$tim;
		
		$data['cin'] = strtotime($dotw_cin_dte);
		$hotel_det['unix_checkin']  = strtotime($dotw_cin_dte);
		$data['cout'] = strtotime($dotw_cout_dte);
		$hotel_det['unix_checkout']  = strtotime($dotw_cout_dte);
		
		$this->session->set_userdata(array('unix_cin'=>$data['cin'],'unix_cout'=>$data['cout']));
		
		$sec_res=$this->session->userdata('sec_res');
		
		$room_nos=0;
		$room='';
		for($j=0;$j<count($room_type);$j++)
		{
			if($room_type[$j]=='1')//single room
			{
				if($roomcount[$j]==1) //one room
				{
					$room.='<room runno="'.$room_nos.'">
						<adultsCode>1</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
						<rateBasis>0</rateBasis></room>';
					$room_nos++;
				}
				if($roomcount[$j]==2)//two room
				{
					$room.='<room runno="'.$room_nos.'">
						<adultsCode>1</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
						<rateBasis>0</rateBasis>
					</room>';
					$room_nos++;
					$room='<room runno="'.$room_nos.'">
						<adultsCode>1</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
						<rateBasis>0</rateBasis>
					</room>
					';
					$room_nos++;
				}			
				if($roomcount[$j]==3)//three rooms
				{
					$room.='<room runno="'.$room_nos.'">
						<adultsCode>1</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
						<rateBasis>0</rateBasis>
					</room>';
					$room_nos++;
					$room.='<room runno="'.$room_nos.'">
						<adultsCode>1</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
						<rateBasis>0</rateBasis>
					</room>';
					$room_nos++;
					$room.='<room runno="'.$room_nos.'">
						<adultsCode>1</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
						<rateBasis>0</rateBasis>
					</room>';
					$room_nos++;
				}							
			}
			if($room_type[$j]=='3' || $room_type[$j] =='6') //double room or twin room
			{
				if($roomcount[$j]==1) //one room
				{
					$room.='<room runno="'.$room_nos.'">
						<adultsCode>2</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
						<rateBasis>0</rateBasis>
					</room>';
					$room_nos++;
				}
				if($roomcount[$j]==2)//two room
				{
					$room.='<room runno="'.$room_nos.'">
						<adultsCode>2</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
						<rateBasis>0</rateBasis>
					</room>';
					$room_nos++;
					$room.='<room runno="'.$room_nos.'">
						<adultsCode>2</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
						<rateBasis>0</rateBasis>
					</room>';
					$room_nos++;
				}			
				if($roomcount[$j]==3)//three rooms
				{
					$room.='<room runno="'.$room_nos.'">
						<adultsCode>2</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
						<rateBasis>0</rateBasis>
					</room>';
					$room_nos++;
					$room.='<room runno="'.$room_nos.'">
						<adultsCode>2</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
						<rateBasis>0</rateBasis>
					</room>';
					$room_nos++;
					$room.='<room runno="'.$room_nos.'">
						<adultsCode>2</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
						<rateBasis>0</rateBasis>
					</room>';
					$room_nos++;
				}						
			}
			if($room_type[$j]=='4' || $room_type[$j] =='7') //double plus child room or twin plus child room
			{
				if($roomcount[$j]==1)
				{
					$childage=$this->session->userdata('childage');
					$room.='<room runno="'.$room_nos.'">
						<adultsCode>2</adultsCode>
						<children no="1">
							<child runno="1">'.$childage[0].'</child>
						</children>
						<extraBed>0</extraBed>
						<rateBasis>0</rateBasis>
					</room>';
					$room_nos++;
				}
				if($roomcount[$j]==2)
				{
					$childage=$this->session->userdata('childage');
					$childage1=$this->session->userdata('childage2');
					$room.='<room runno="'.$room_nos.'">
						<adultsCode>2</adultsCode>
						<children no="1">
							<child runno="1">'.$childage[0].'</child>
						</children>
						<extraBed>0</extraBed>
						<rateBasis>0</rateBasis>
					</room>';
					$room_nos++;
					$room.='<room runno="'.$room_nos.'">
						<adultsCode>2</adultsCode>
						<children no="1">
							<child runno="1">'.$childage1[0].'</child>
						</children>
						<extraBed>0</extraBed>
						<rateBasis>0</rateBasis>
					</room>';
					$room_nos++;
				}
				if($roomcount[$j]==3)
				{
					$childage=$this->session->userdata('childage');
					$childage1=$this->session->userdata('childage2');
					$childage2=$this->session->userdata('childage3');
					$room.='<room runno="'.$room_nos.'">
						<adultsCode>2</adultsCode>
						<children no="1">
							<child runno="1">'.$childage[0].'</child>
						</children>
						<extraBed>0</extraBed>
						<rateBasis>0</rateBasis>
					</room>';
					$room_nos++;
					$room.='<room runno="'.$room_nos.'">
						<adultsCode>2</adultsCode>
						<children no="1">
							<child runno="1">'.$childage1[0].'</child>
						</children>
						<extraBed>0</extraBed>
						<rateBasis>0</rateBasis>
					</room>';
					$room_nos++;
					$room.='<room runno="'.$room_nos.'">
						<adultsCode>2</adultsCode>
						<children no="1">
							<child runno="1">'.$childage2[0].'</child>
						</children>
						<extraBed>0</extraBed>
						<rateBasis>0</rateBasis>
					</room>';
					$room_nos++;
				}							
			}
			if($room_type[$j]=='8')//Triple room
			{
				if($roomcount[$j]==1) //one room
				{
					$room.='<room runno="'.$room_nos.'">
						<adultsCode>3</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
						<rateBasis>0</rateBasis>
					</room>';
					$room_nos++;
				}
				if($roomcount[$j]==2)//two room
				{
					$room.='<room runno="'.$room_nos.'">
						<adultsCode>3</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
						<rateBasis>0</rateBasis>
					</room>';
					$room_nos++;
					$room='<room runno="'.$room_nos.'">
						<adultsCode>3</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
						<rateBasis>0</rateBasis>
					</room>
					';
					$room_nos++;
				}			
				if($roomcount[$j]==3)//three rooms
				{
					$room.='<room runno="'.$room_nos.'">
						<adultsCode>3</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
						<rateBasis>0</rateBasis>
					</room>';
					$room_nos++;
					$room.='<room runno="'.$room_nos.'">
						<adultsCode>3</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
						<rateBasis>0</rateBasis>
					</room>';
					$room_nos++;
					$room.='<room runno="'.$room_nos.'">
						<adultsCode>3</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
						<rateBasis>0</rateBasis>
					</room>';
					$room_nos++;
				}							
			}
			if($room_type[$j]=='9')//Quad room
			{
				if($roomcount[$j]==1) //one room
				{
					$room.='<room runno="'.$room_nos.'">
						<adultsCode>4</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
						<rateBasis>0</rateBasis>
					</room>';
					$room_nos++;
				}
				if($roomcount[$j]==2)//two room
				{
					$room.='<room runno="'.$room_nos.'">
						<adultsCode>4</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
						<rateBasis>0</rateBasis>
					</room>';
					$room_nos++;
					$room='<room runno="'.$room_nos.'">
						<adultsCode>4</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
						<rateBasis>0</rateBasis>
					</room>
					';
					$room_nos++;
				}			
				if($roomcount[$j]==3)//three rooms
				{
					$room.='<room runno="'.$room_nos.'">
						<adultsCode>4</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
						<rateBasis>0</rateBasis>
					</room>';
					$room_nos++;
					$room.='<room runno="'.$room_nos.'">
						<adultsCode>4</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
						<rateBasis>0</rateBasis>
					</room>';
					$room_nos++;
					$room.='<room runno="'.$room_nos.'">
						<adultsCode>4</adultsCode>
						<children no="0"></children>
						<extraBed>0</extraBed>
						<rateBasis>0</rateBasis>
					</room>';
					$room_nos++;
				}							
			}
		}
		//echo'<pre/>';print_r($room);exit;
		$usr = "Kamal";
		$pwd = md5('Kamal@solace.ae');
		$id='461006';
		$req='<?xml version="1.0" encoding="UTF-8" ?>
		<customer>
			<username>'.$usr.'</username>
			<password>'.$pwd.'</password>
			<id>'.$id.'</id>
			<source>1</source>
			<product>hotel</product>
			<request command="searchhotels">
			<bookingDetails>
				<fromDate>'.$data['cin'].'</fromDate>
				<toDate>'.$data['cout'].'</toDate>
				<currency>'.$data['currency'].'</currency>
				<rooms no="'.$data['nos_of_room'].'">
					'.$room.'
				</rooms>
			</bookingDetails>
			<return>
				<sorting order="asc">sortByPrice</sorting>
				<getRooms>true</getRooms>
				<filters>
					<city>'.$data['city_code'].'</city> 
					<nearbyCities>false</nearbyCities>
					<country>0</country> 
				</filters>
				<fields>
					<field>description1</field>
					<field>description2</field>
					<field>hotelName</field>
					<field>fullAddress</field>
					<field>address</field>
					<field>zipCode</field>
					<field>hotelId</field>
					<field>hotelPhone</field>
					<field>price</field>
					<field>location</field>
					<field>cityName</field>
					<field>cityCode</field>
					<field>countryName</field>				
					<field>hotelCheckIn</field>
					<field>hotelCheckOut</field>					
					<field>rating</field>
					<field>images</field>
					<field>geoPoint</field>					
				</fields>
				<resultsPerPage>10</resultsPerPage>
				<page>0</page>
			</return>
		</request>
	</customer>';			
		//echo'<pre/>';print_r($req);exit;
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
		
		//echo'<pre/>';print_r($data2);exit;
		
		
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
				$price_bkup['checkin_dte'] = date('Y-m-d', $cin);
				$price_bkup['checkout_dte'] =  date('Y-m-d', $cout);
				$price_bkup['sec_res']=$sec_res;
				$hotel_det['sec_res']=$sec_res;
			
			
				//Api Name
				$result['api_name'] ='dotw';
				
				//Currency Short
				$currencyShort=$dom2->getElementsByTagName("currencyShort");
				$result['cost_type']=$currencyShort->item(0)->nodeValue;
				
				//Hotel id
				$result['hotel_id']=$hotel->item($i)->getAttribute("hotelid");
				
				$price_bkup['hotel_id'] = $hotel->item($i)->getAttribute("hotelid");
				
				$hotel_det['hotel_id']=$hotel->item($i)->getAttribute("hotelid");
				$i++;
			
				//Description
				$description1 = $val->getElementsByTagName("description1");
				foreach($description1 as $val2)
				{
					$language = $val2->getElementsByTagName("language");
					$hotel_det['desc']=$description1->item(0)->nodeValue;
				}
			
				//Hotel Name
				$hotelName = $val->getElementsByTagName("hotelName");
				$result['hotel_name']=$hotelName->item(0)->nodeValue;
				$hotel_det['hotel_name']=$hotelName->item(0)->nodeValue;
				
				//Address & Zipcode
				//$address = $val->getElementsByTagName("address");
				//$hotel_det['address']=$address->item(0)->nodeValue;
				
				//Fulladdress
				$full_address = $val->getElementsByTagName("fullAddress");
				foreach($full_address as $full_add)
				{
					$hotelStreetAddress = $full_add->getElementsByTagName("hotelStreetAddress");
					$hotel_det['address']=$hotelStreetAddress->item(0)->nodeValue;
					
					$hotelZipCode = $full_add->getElementsByTagName("hotelZipCode");
					$hotel_det['zipCode']=$hotelZipCode->item(0)->nodeValue;
				}
				
				/*$hotel_det['zipCode']='';
				$zipCode = $val->getElementsByTagName("zipCode");
				foreach($zipCode as $zip)
				{
					$hotel_det['zipCode']=$zip->item(0)->nodeValue;
				}*/
				
				//Hotel phone
				$hotelPhone = $val->getElementsByTagName("hotelPhone");
				$hotel_det['hotelPhone']=$hotelPhone->item(0)->nodeValue;
				
				//Hotel Location
				$location = $val->getElementsByTagName("location");
				$result['location']=$location->item(0)->nodeValue;
				$hotel_det['location']=$location->item(0)->nodeValue;
				
				
				//Hotel City
				$cityName = $val->getElementsByTagName("cityName");
				$result['hotelCity']=$cityName->item(0)->nodeValue;
				$hotel_det['hotelCity']=$cityName->item(0)->nodeValue;
				
				//Hotel Country
				$countryName = $val->getElementsByTagName("countryName");
				$hotel_det['hotelCountry']=$countryName->item(0)->nodeValue;
				
				//Rating star
				$rating = $val->getElementsByTagName("rating");
				$result['star_rate']=$rating->item(0)->nodeValue;
				
				//Map Link
				//$mapLink = $val->getElementsByTagName("mapLink");
				//$hotel_det['mapLink']=$mapLink->item(0)->nodeValue;
				
				//unixtime stamp
				$hotel_det['unix_checkin']=$this->session->userdata('unix_cin');
				$hotel_det['unix_checkout']=$this->session->userdata('unix_cout');
				
				//Geo Point
				$geoPoint = $val->getElementsByTagName("geoPoint");
				foreach($geoPoint as $val3)
				{
					$lat = $val3->getElementsByTagName("lat");
					$hotel_det['lat']=$lat->item(0)->nodeValue;
					
					$lng = $val3->getElementsByTagName("lng");
					$hotel_det['lng']=$lng->item(0)->nodeValue;
				}
				
				//Thumb Images
				$images = $val->getElementsByTagName("images");
				foreach($images as $val4)
				{
					$thumb = $val4->getElementsByTagName("thumb");
					$hotel_det['thumb']=$thumb->item(0)->nodeValue;
					
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
						$hotel_det['url'] = $urls;
					}				
				}
				
				
				//pernight cost 
				$from = $val->getElementsByTagName("from");
				$result['nightperroom']=round($from->item(0)->nodeValue, 2);
				
				//Status available or not
				$availability = $val->getElementsByTagName("availability");
				$result['status']=$availability->item(0)->nodeValue;
				
				$rooms = $val->getElementsByTagName("rooms");
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
						//room type
						$price_bkup['room_type'] = $type;
						$roomType = $val8->getElementsByTagName("roomType");
						//room type code
						$price_bkup['roomtypecode']=$roomType->item(0)->getAttribute('roomtypecode');
						
						foreach($roomType as $val9)
						{
							//Room type name
							$rm_type = $val9->getElementsByTagName("name");
							$result['room_type']=$rm_type->item(0)->nodeValue;
							
							$rateBases = $val9->getElementsByTagName("rateBases");
							foreach($rateBases as $val10)
							{
								$rateBasis = $val10->getElementsByTagName("rateBasis");
								foreach($rateBasis as $val11)
								{
									//Allocation Details
									$allocationDetails = $val11->getElementsByTagName("allocationDetails");
									$price_bkup['alloc_det']=$allocationDetails->item(0)->nodeValue;
									
									//Total cost value
									$total = $val11->getElementsByTagName("total");
									$result['cost_value']=round($total->item(0)->nodeValue,2);
									
									$dates = $val11->getElementsByTagName("dates");
									foreach($dates as $val14)
									{
										$date = $val14->getElementsByTagName("date");
										$price_bkup['dte']=$date->item(0)->getAttribute('datetime');
										foreach($date as $val15)
										{
											$price = $val15->getElementsByTagName("price");
											$price_bkup['price']=round($price->item(0)->nodeValue,2);
											//echo'<pre/>';print_r($price_bkup);exit;
																					
										}
									}
									//echo'<pre/>';print_r($price_bkup);exit;
									$cost_value=$cost_value+$price_bkup['price'];
									
									
									
									$cancellationRules = $val11->getElementsByTagName("cancellationRules");
									$y=0;
									foreach($cancellationRules as $val12)
									{
										$rule = $val12->getElementsByTagName("rule");
										
										
										foreach($rule as $val13)
										{
											$rule_runno=$rule->item($y)->getAttribute('runno');
											
											if($rule_runno==0)
											{
												$toDate = $val13->getElementsByTagName("toDate");
												$result['cancellation_date_time']=$toDate->item(0)->nodeValue;
											}
											else if($rule_runno==1)
											{
												$fromDate = $val13->getElementsByTagName("fromDate");
												$result['cancellation_enddate_time']=$fromDate->item(0)->nodeValue;
												
												$charge = $val11->getElementsByTagName("charge");
												$result['cancellation_value']=round($charge->item(0)->nodeValue,2);
											}
											$y++;
										}
									}
								}
							}
						}$x++;
						//echo'<pre/>';print_r($price_bkup);
						$this->Search_Model->insert_price_brkup_dotw($price_bkup);
					}
					
					
				}
				$result['check_in'] = date('Y-m-d', $cin);
				$result['check_out'] = date('Y-m-d', $cout);
				
				$result['sec_res'] = $sec_res;				
					
				$result['inclusion'] ='';
				$result['cancellation_date']='';
				$result['cancellation_enddate']='';
				$result['cancellation_night']='';
				$result['cancellation_code']='';
				$result['cancellation_desc']='';
				$result['cancellation_before_days']='';
				$result['commission']='';
				$result['cost_value'] = $cost_value;
				//$result['room_code'] = $type;
				
				
				$rate_code = $result['star_rate'];
				$row3=$this->Home_Model->starCode_dotw($rate_code);
				$result['star_rate']=trim($row3->star_rate);				
				
				//echo'<pre/>';print_r($result);exit;
				//Insert Hotel Details
				$this->Search_Model->insert_hotel_det_dotw($hotel_det);
				$this->Search_Model->insert_search_result_dotw($result);
				//insert price break up details
				//$this->Search_Model->insert_price_brkup_dotw($price_bkup);	
			}//foreach endexit;
		}//if
	}
	//dotw function ends here	
	
	function index()
	{	
		set_time_limit(0);
		//echo'<pre/>';print_r($this->session->userdata);exit;

		//$this->session->unset_userdata('hot_name');
		$rules['noofroom']="required";
		$rules['sd']="required";
		$rules['ed']="required";
		//$rules['roomusedtype']="required";
		
		$this->validation->set_rules($rules);
		$fields['noofroom']="Number of room";
		$fields['sd']="Checkin";
		$fields['ed']="checkout";
		//$fields['roomusedtype']="Room Used Type";
		
		$this->validation->set_fields($fields);
	
		if($this->validation->run()==FALSE)
		{
			redirect('home/agent_main_home');
		}
		else
		{	
			
			$city1=$this->input->post('citycode');
			
			$row1=$this->Home_Model->cityCode_gta($city1);
			if($row1 !='')
			{
				$city_gta_code=trim($row1->cityCode);
				$destinationType=trim($row1->destinationType);
				$countrycode=trim($row1->countryCode);
				$data['disp_city']=$this->input->post('disp_city');  
			}
			
			$roomcount=$this->session->userdata('roomcount');
			$roomusedtypeval=$this->session->userdata('roomusedtype');
			$roomusedtype=$roomusedtypeval[0];
						
			$city=$city_gta_code;			
			$sec_res=$this->session->userdata('sec_res');			
			$costval=$this->input->post('costtype');
			$cost=$costval;
			$data['costtype']=$costval;
			$data['cost']=$this->Search_Model->get_currency_val($cost);			
			$data['cin']=$this->input->post('sd');
			$data['cout']=$this->input->post('ed');
			
			//$data['nor']=$noofroom;
			$data['rtype']=$roomusedtype;
			$data['city']=$city_gta_code;	
			
			$child=0;
            $adult=0;
			
			$noofroom1=0;
			for($i=0;$i< count($roomusedtypeval);$i++)
			{
                switch($roomusedtypeval[$i])
				{
					case 1:
						$adult=$adult+(1*$roomcount[$i]);
						$noofroom1=$noofroom1+$roomcount[$i];
					break;
					
					case 3:				
						$adult=$adult+(2*$roomcount[$i]);
						$noofroom1=$noofroom1+$roomcount[$i];
					break;
					
					case 9:
						$adult=$adult+(4*$roomcount[$i]);
						$noofroom1=$noofroom1+$roomcount[$i];
					break;
					
					case 6:
						$adult=$adult+(2*$roomcount[$i]);
						$noofroom1=$noofroom1+$roomcount[$i];
					break;
					
					case 5:
						 $adult=$adult+(1*$roomcount[$i]);
						 $noofroom1=$noofroom1+$roomcount[$i];
				   break;
				   
				   case 8:
						 $adult=$adult+(3*$roomcount[$i]);
						 $noofroom1=$noofroom1+$roomcount[$i];
				   break;
				   
				   case 4:												
						$child=$child+(1*$roomcount[$i]);
						$adult=$adult+(2*$roomcount[$i]);	
						$noofroom1=$noofroom1+$roomcount[$i];
					break;
					
					case 7:
						$child=$child+(1*$roomcount[$i]);
						$adult=$adult+(2*$roomcount[$i]);								
						$noofroom1=$noofroom1+$roomcount[$i];					
					break;
				}
									
			}
                        
				$data['child']=$child;
                $data['adult']=$adult;
				$data['nor']=$noofroom1;
				$data['room']=$noofroom=$noofroom1;
				
		 	//dotw api starts here janani
			// $dotw_result = $this->dotw_parse($data);			
			//dotw api ends here  janani
			$out=explode("/",$this->input->post('ed'));
			$cout=$out[2]."-".$out[1]."-".$out[0];
			$cout_hb=$out[2].$out[1].$out[0];
		
			
			$in=explode("/",$this->input->post('sd'));
			$cin=$in[2]."-".$in[1]."-".$in[0];
			$cin_hb=$in[2].$in[1].$in[0];
			
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
					
		  		$diff = strtotime($cout) - strtotime($cin);
	
				$sec   = $diff % 60;
				$diff  = intval($diff / 60);
				$min   = $diff % 60;
				$diff  = intval($diff / 60);
				$hours = $diff % 24;
				$days  = intval($diff / 24);
				$data['dt']=$days;
				
	//gta starts here
		
	$roomCode='';
	$rooms='';
	$room1='';
	$hotelbed_rooms='';
	$hotelbed_room1='';
	$roomtype='';

	for($i=0;$i< count($roomusedtypeval);$i++)
	{
		
			if($roomusedtypeval[$i]=='1')
			{
			$roomCode = 'SB';	
			$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$roomcount[$i].'"></Room>';	
						
			}
			elseif($roomusedtypeval[$i]=='3')
			{
			$roomCode = 'DB'; //'db';
			$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$roomcount[$i].'"></Room>';				
			}
			elseif($roomusedtypeval[$i]=='9')
			{
			$roomCode = 'Q'; //'db';	
			$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$roomcount[$i].'"></Room>';			
			}
			elseif($roomusedtypeval[$i]=='6')
			{
			$roomCode = 'TB'; //'db';	
			if($roomcount[$i]=='2')
				{
					$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$roomcount[$i].'">
								<ExtraBeds>
									<Age>5</Age>
									<Age>5</Age>
								</ExtraBeds>
								
							</Room>';				
				}
				if($roomcount[$i]=='3')
				{
					$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$roomcount[$i].'">
								<ExtraBeds>
									<Age>5</Age>
									<Age>5</Age>
									<Age>5</Age>
								</ExtraBeds>
								
							</Room>';				
				}
				else{
					$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$roomcount[$i].'">
								<ExtraBeds>
									<Age>5</Age>
								</ExtraBeds>
								
							</Room>';	
					}					
			}
			elseif($roomusedtypeval[$i]=='5')
			{
			$roomCode = 'TS'; //'db';
			$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$roomcount[$i].'"></Room>';				
			}
			elseif($roomusedtypeval[$i]=='8')
			{
			$roomCode = 'TR'; //'db';
			$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$roomcount[$i].'"></Room>';				
			}
			elseif($roomusedtypeval[$i]=='4')
			{
			$roomCode = 'DB'; //'db';	
				if($roomcount[$i]=='2')
				{
					$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$roomcount[$i].'">
								<ExtraBeds>
									<Age>5</Age>
									<Age>5</Age>
								</ExtraBeds>
								
							</Room>';				
				}
				if($roomcount[$i]=='3')
				{
					$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$roomcount[$i].'">
								<ExtraBeds>
									<Age>5</Age>
									<Age>5</Age>
									<Age>5</Age>
								</ExtraBeds>
								
							</Room>';				
				}
				else{
					$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$roomcount[$i].'">
								<ExtraBeds>
									<Age>5</Age>
								</ExtraBeds>
								
							</Room>';	
					}					
					
			}
			elseif($roomusedtypeval[$i]=='7')
			{
			$roomCode = 'TB'; //'db';	

				if($roomcount[$i]=='2')
				{
					$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$roomcount[$i].'">
								<ExtraBeds>
									<Age>5</Age>
									<Age>5</Age>
									<Age>5</Age>
									<Age>5</Age>
								</ExtraBeds>
								
							</Room>';				
				}
				if($roomcount[$i]=='3')
				{
					$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$roomcount[$i].'">
								<ExtraBeds>
									<Age>5</Age>
									<Age>5</Age>
									<Age>5</Age>
									<Age>5</Age>
									<Age>5</Age>
									<Age>5</Age>
								</ExtraBeds>
								
							</Room>';				
				}
				else{
					$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$roomcount[$i].'">
								<ExtraBeds>
									<Age>5</Age>
									<Age>5</Age>
								</ExtraBeds>
								
							</Room>';	
					}
			}	
			else
			{
				
			}
			$roomtype[]=$roomCode;
		
	
	}
	$data['roomCode']=$roomtype;
	$rooms=$room1;
	$roomusedtype=$roomCode;
	
	if($_SERVER['HTTP_HOST']=='localhost' || $_SERVER['HTTP_HOST']=='192.168.0.128')
	{					
		
		/*$client="347";
				$email="XML.PROVAB@NORAMIX.COM";
				$pass="PASS"; // local
				$URL2 = "https://interface.demo.octopustravel.com/rbsukapi/RequestListenerServlet"; //local*/
				$client="1184";
			 $email="XML.PROVAB@ITRAVELUKRAINE.COM";
			 $pass="PASS"; // local
			 $URL2 = "https://interface.demo.gta-travel.com/wbsapi/RequestListenerServlet";//local
	}
	else
	{
		$client="736";
		$email="kamal@solace.ae";	
		$pass="1001EVENTS"; // local 
		$URL2='https://interface.gta-travel.com/gtaapi/RequestListenerServlet';
	}


	if($_SERVER['HTTP_HOST']=='localhost' || $_SERVER['HTTP_HOST']=='192.168.0.128')
	{
		if($costval=='AED')
		{
			$costval_gta='GBP';
		}
		else
		{
			$costval_gta="$costval";
		}
	}
	else
	{
		$costval_gta="$costval";
	}


	$checkinDate = "$cin";
	$checkoutDate = "$cout"; // '2006-05-10'; 				<Duration>'.$duration.'</Duration>
	$duration = "$days"; //'2';



$this->session->set_userdata(array('roomcode'=>$data['roomCode']));
//$numberOfRooms = '1'; //'1';

$requestData = '<?xml version="1.0" encoding="UTF-8" ?>
		<Request>
			<Source>
				<RequestorID Client="'.trim($client).'" EMailAddress="'.trim($email).'" Password="'.trim($pass).'" />
				<RequestorPreferences Language="en" Currency="'.trim($costval_gta).'">
					<RequestMode>SYNCHRONOUS</RequestMode>
				</RequestorPreferences>
			</Source>
			<RequestDetails>
				<SearchHotelPriceRequest>';
				//echo $destinationType;exit;
				$city_cde = $this->session->userdata('citycode');
				$city_cde1 = explode('-',$city_cde);
				if(count($city_cde1)==1)
				{
					$city_cde1 = explode(' ',$city_cde1[0]);
				}

				if($city_cde1[0]=='Bali,Indonesia' || $city_cde1[0]=='Bali')
				{
					$requestData .= '<ItemDestination DestinationType="area" DestinationCode="BALI" />';
				}
				else if($city_cde1[0]=='Venice, Italy' || $city_cde1[0]=='Venice')
				{
					$requestData .= '<ItemDestination DestinationType="area" DestinationCode="VCE2" />';
				}
				else if($city_cde1[0]=='Tenerife' || $city_cde1[0]=='Tenerife')
				{
					$requestData .= '<ItemDestination DestinationType="area" DestinationCode="TEN" />';
				}
				else if($city_gta_code=='HKT')
				{
					$requestData .= '<ItemDestination DestinationType="area" DestinationCode="'.$city_gta_code.'" />';
				}
				else if($city_gta_code=='DUBW')
				{
					$requestData .= '<ItemDestination DestinationType="city" DestinationCode="DXB" />';
				}
				else
				{
					$requestData .= '<ItemDestination DestinationType="'.$destinationType.'" DestinationCode="'.$city_gta_code.'" />';
				}//'.$city_gta_code.'
					$requestData .= '<PeriodOfStay>
						<CheckInDate>'.$checkinDate.'</CheckInDate>
						<CheckOutDate>'.$checkoutDate.'</CheckOutDate>
					</PeriodOfStay>
					<Rooms>'.$rooms.'</Rooms>
					<OrderBy>pricelowtohigh</OrderBy>
				</SearchHotelPriceRequest>
			</RequestDetails>
		</Request>';
//echo $requestData;

		
        $ch2=curl_init();
        curl_setopt($ch2, CURLOPT_URL, $URL2);
        curl_setopt($ch2, CURLOPT_TIMEOUT, 180);
        curl_setopt($ch2, CURLOPT_HEADER, 0);
        curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch2, CURLOPT_POST, 1);
        curl_setopt($ch2, CURLOPT_POSTFIELDS, $requestData);
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
		
		/*echo '<pre>';
		echo $data2;
		echo '</pre>';		
		exit;*/
	//	var_dump($data2); exit();
		
if(!empty($data2))		
{

					$dom2=new DOMDocument();
					$dom2->loadXML($data2);

					$hotel=$dom2->getElementsByTagName("Hotel");

					foreach($hotel as $val)
					{
					$city = $val->getElementsByTagName("City");
					$cityVal=$city->item(0)->nodeValue;

					$cityCode=$city->item(0)->getAttribute("Code");

					$item = $val->getElementsByTagName("Item");
					$itemVal=$item->item(0)->nodeValue;

					$itemCode=$item->item(0)->getAttribute("Code");

					$EssentialInformation = $val->getElementsByTagName("EssentialInformation");
						$desc='';
						foreach($EssentialInformation as $essinfo)
						{
							$Text = $essinfo->getElementsByTagName("Text");
							$TextVal=$Text->item(0)->nodeValue;

							$FromDate = $essinfo->getElementsByTagName("FromDate");
							$FromDateVal=$FromDate->item(0)->nodeValue;

							$ToDate = $essinfo->getElementsByTagName("ToDate");
							$ToDateVal=$ToDate->item(0)->nodeValue;

							$desc=$TextVal.';'.$FromDateVal.';'.$ToDateVal;

						}

					$star = $val->getElementsByTagName("StarRating");
					$starVal=$star->item(0)->nodeValue;
					$room = $val->getElementsByTagName("RoomCategory");
					$i=0;
					foreach($room as $category)
					{

					$roomCategory = $category->getElementsByTagName("Description");
					$roomDesc=$roomCategory->item(0)->nodeValue;

					$roomdescCode=$room->item($i)->getAttribute("Id");

					$ItemPrice = $category->getElementsByTagName("ItemPrice");

					$Confirmation = $category->getElementsByTagName("Confirmation");
					$ConfirmationVal=$Confirmation->item(0)->nodeValue;

					$currency=$ItemPrice->item(0)->getAttribute("Currency");
					$IncludedOfferDiscount=$ItemPrice->item(0)->getAttribute("IncludedOfferDiscount");


					$ItemPriceVal=$ItemPrice->item(0)->nodeValue;
					$ItemPriceVal = $ItemPriceVal + $IncludedOfferDiscount;

					$meals = $category->getElementsByTagName("Meals");
					$mealsval=$meals->item(0)->nodeValue;

					  
/*echo '<pre>';
		print_r($this->session->userdata);
		echo '</pre>';		
		exit;*/
				$api4="gta";
				$agentid = $this->session->userdata('agentid');
				
				//$common_commission=$this->Search_Model->get_common_markup($api4);
				$agent_commission=$this->Search_Model->get_agent_markup($agentid);

				   $i++;
			//echo $agent_commission;exit;

						$currencyVal=$currency;
						$totamt=$ItemPriceVal;
						
						if($currencyVal!="AED")
						{
							$cur_val=$this->Search_Model->get_currency_val($currencyVal);
							
							$totamt=($totamt/$cur_val);
						}
						
						
						
						if($agent_commission!=0)
						{
							$finalNightValh_agent_markup=$totamt+$totamt*$agent_commission/100;
							$finalNightValh =$finalNightValh_agent_markup;
						}
						else
						{
							$finalNightValh = $totamt;
						}
						//echo $agent_commission.'---'.$finalNightValh.'---'.$totamt.'--'.$cur_val;exit;
						$pernite_totamt=$ItemPriceVal/$days;
						
						
						if($currencyVal!="AED")
						{
							$cur_val=$this->Search_Model->get_currency_val($currencyVal);
							/*$margin=$this->Search_Model->get_margin_val();
							if($margin!='')
							{
								$margin=(100-$margin)/100;
								$cur_val = $cur_val * $margin;
							}*/
							$pernite_totamt=($pernite_totamt/$cur_val);
						}

						if($agent_commission!=0)
						{
							$finalperNightValh_agent_markup=$pernite_totamt+$pernite_totamt*$agent_commission/100;
							$finalperNightValh =$finalperNightValh_agent_markup;
						}
						else
						{
							$finalperNightValh = $pernite_totamt;
						}
						
						$finalperNightValh = ceil($finalperNightValh);
						$finalNightValh = ceil($finalNightValh);
						
					  $dateFromValc='0';
					  $dateToValc='0';
					  $dateFromTimeValc='0';
					  $dateToTimeVal='0';
					  $noofNightVal="0";
					  $serviceval='0';
					  $cancelCodeVal='0';
					  $cancelDescVal='0';
					  $finalcurval='0';
					  $purTokenVal='0';
					  $image='NULL';
//$image=$this->Search_Model->get_image_gta_sep($cityCode,$itemCode);
					$this->Search_Model->insert_search_result_gta($sec_res,$api4,$cityCode,$itemCode,$itemVal,$starVal,$finalperNightValh,$finalNightValh,$currencyVal,$roomDesc,$mealsval,$dateFromValc,$dateToValc,$dateFromTimeValc,$dateToTimeVal,$serviceval,$finalcurval,$cancelCodeVal,$purTokenVal,'0','0',$roomdescCode,$ConfirmationVal,$cin,$cout,'0',$image,$desc);
				}
			  }		// gta ends here
			}
	else
	{
		echo 'empty array';exit;
	}

		$this->session->set_userdata(array('dt'=>$data['dt'],'room'=>$data['room'],'adult'=>$data['adult'],'child'=>$data['child'],'nor'=>$data['nor'],'rtype'=>$data['rtype'],'city'=>$data['city'],'cin'=>$cin,'cout'=>$cout,'cost'=>$data['cost'],'costtype'=>$data['costtype'],'disp_city'=>$data['disp_city'],'checkin'=>$checkinDate,'checkout'=>$checkoutDate,'modify_cin'=>$this->input->post('sd'),'modify_cout'=>$this->input->post('ed')));
				  
			  
		redirect('agent/search_result','refresh');
	
		 }    

	}
	
	function search_result()
	{
		
		$data['cost']=$this->session->userdata('cost');
		$data['costtype']=$this->session->userdata('costtype');
		$cin=$this->session->userdata('cin');
		$cout=$this->session->userdata('cout');
		$data['disp_city']=$this->session->userdata('disp_city');
		$data['star']='all';
		
		$city=$this->session->userdata('city');
		$data['cin']=$cin;
		$data['cout']=$cout;
		
		$data['nor']=$this->session->userdata('nor');
		$data['rtype']=$this->session->userdata('rtype');
		$data['city']=$this->session->userdata('city');
		$noofroom=$this->session->userdata('nor');
		$roomusedtype=$this->session->userdata('rtype');
		$days=$this->session->userdata('dt');
		
		
		$data['dt']=$days;
		$data['room']=$this->session->userdata('room');
		$data['adult']=$this->session->userdata('adult');
		$data['child']=$this->session->userdata('child');
		
		
		$data['a_id']=$this->session->userdata('agent_id');	
		
		$agnt=$this->session->userdata('agentid');			
		$data['last_log']=$this->Agent_Model->agent_last_login($agnt);		
		$data['acc_info']=$this->Agent_Model->accnt_information($agnt);			
		
		$sec_res=$this->session->userdata('sec_res');	
		$hname=$this->session->userdata('hot_name');
		 if($hname!='')
		{
			$query=$this->db->query("SELECT * FROM (`search_result`) WHERE `criteria_id` = '$sec_res' AND `status` IN ('AVAILABLE') AND `hotel_name` LIKE '%$hname%' GROUP BY `hotel_name`");
			$result=$query->result();
		}
		else
		{
			$query=$this->db->query("SELECT * FROM (`search_result`) WHERE `criteria_id` = '$sec_res' AND `status` IN ('AVAILABLE') GROUP BY `hotel_name` ORDER BY `nightperroom`");
			$result=$query->result();

			$result=$query->result();
		}
		
		$count= count($result);
		$data['total_rows']=$count;
		$config['base_url'] = base_url().'/agent/search_result/';
		$config['total_rows'] =$count;
		$config['per_page'] = '20';
		$config['full_tag_open'] = '<p>';
		$config['full_tag_close'] = '</p>';
		
		$this->pagination->initialize($config);
				$perpage=20;
				
		if($hname=='')
		{
			$sresult=$this->Search_Model->get_search_result_info($sec_res,$perpage,$this->uri->segment(3));
		
		}
		else
		{
			$hotel=$hname;
			$sresult=$this->Search_Model->get_search_result_info_hotel($sec_res,$hotel,$perpage,$this->uri->segment(3));
		}
		if($sresult!=''){
		//echo count($sresult);exit;
		foreach($sresult as $row){
		
			$cityNamesvalue=$row->city_name;
			$hotelCodevalue[]=$row->hotel_id;
			$cityCodevalue[]=$row->city_name;
			$hotelNamesvalue[]=$row->hotel_name;
			$categoryCodevalue[]=$row->star_rate;
			$pricePerNightvalue[]=$row->nightperroom;
			$RoomCostvalue1[]=$row->cost_value;
			$RoomCost[]=$row->cost_type;
			$apiNameValue[]=$row->api_name;
			$roomtypeValue[]=$row->room_type;
			$inclusionValue[]=$row->inclusion;
		
		}
		$data['criteria_id']=$sec_res;
		$data['hotelCodevalue']=$hotelCodevalue;
		$data['cityCodevalue']=$cityCodevalue;
		$data['apiNameValue']=$apiNameValue;
		$data['hotelNamesvalue']=$hotelNamesvalue;
		$data['categoryCodevalue']=$categoryCodevalue;
		$data['pricePerNightvalue']=$pricePerNightvalue;
		$data['RoomCostvalue1']=$RoomCostvalue1;
		$data['RoomCost']=$RoomCost;
		$data['cityNamesvalue']=$cityNamesvalue;
		$data['roomtypeValue']=$roomtypeValue;
		$data['inclusionValue']=$inclusionValue;	
		$this->load->view('agent_search/search_result',$data);	
		}
		else
		{
		$this->load->view('agent_search/search_result',$data);	
		}
		
	}
	
	// currency conversion start
	
function currency_convert()
	{

			$cost=$this->input->post('costtype');
			$data['costtype']=$this->input->post('costtype');
			
			$data['disp_city']=$this->session->userdata('disp_city');

			$data['cost']=$this->Search_Model->get_currency_val($cost);
			
			 // $data['cost']=$this->session->userdata('cost');
			  //$data['costtype']=$this->session->userdata('costtype');
			  
$this->session->set_userdata(array('cost'=>$data['cost'],'costtype'=>$data['costtype']));
			  	
	
	$data['star']='all';
	$cin=$this->input->post('cin');
	$cout=$this->input->post('cout');
	$nor=$this->input->post('nor');
	$rtype=$this->input->post('rtype');
	$city=$this->input->post('city');
	$room=$this->input->post('room');
	$adult=$this->input->post('adult');
	$child=$this->input->post('child');
	//$cost=$this->input->post('costtype');
			$data['cin']=$cin;
			$data['cout']=$cout;
			//$data['star']=$star;
			$data['nor']=$nor;
			$data['rtype']=$rtype;
			$data['city']=$city;
			$noofroom=$nor;
			$roomusedtype=$rtype;
			
			  	$sec_res=$this->session->userdata('sec_res');	
				$sresult=$this->Search_Model->get_search_result_info($sec_res);
				if($sresult!=''){
				foreach($sresult as $row){
					$cityNamesvalue=$row->city_name;
					$hotelCodevalue[]=$row->hotel_id;
					$hotelNamesvalue[]=$row->hotel_name;
					$categoryCodevalue[]=$row->star_rate;
					$pricePerNightvalue[]=$row->nightperroom;
					$RoomCostvalue1[]=$row->cost_value;
					$RoomCost[]=$row->cost_type;
					$apiNameValue[]=$row->api_name;
					$roomtypeValue[]=$row->room_type;
					$inclusionValue[]=$row->inclusion;
				}
				$data['criteria_id']=$sec_res;
				$data['hotelCodevalue']=$hotelCodevalue;

				$data['apiNameValue']=$apiNameValue;
				$data['hotelNamesvalue']=$hotelNamesvalue;
				$data['categoryCodevalue']=$categoryCodevalue;
				$data['pricePerNightvalue']=$pricePerNightvalue;
				$data['RoomCostvalue1']=$RoomCostvalue1;
		  		$data['RoomCost']=$RoomCost;
		  		$data['cityNamesvalue']=$cityNamesvalue;
				$data['roomtypeValue']=$roomtypeValue;
				$data['inclusionValue']=$inclusionValue;
				
		  		$diff = strtotime($cout) - strtotime($cin);
	
				$sec   = $diff % 60;
				$diff  = intval($diff / 60);
				$min   = $diff % 60;
				$diff  = intval($diff / 60);
				$hours = $diff % 24;
				$days  = intval($diff / 24);
				$data['dt']=$days;
				$data['room']=$room;
				$data['adult']=$adult;
				$data['child']=$child;
		  
		  
				$data['a_id']=$this->session->userdata('agent_id');	
			
				$agnt=$this->session->userdata('agentid');		
				
			
				
				$data['last_log']=$this->Agent_Model->agent_last_login($agnt);
			
				$data['acc_info']=$this->Agent_Model->accnt_information($agnt);
							
					
				$this->load->view('agent_search/search_result',$data);	
		  	//$this->load->view('footer');
		}
	
	
	}
	
	//currency conversion end	
	
	
	function star_rates()
	{
		
		$star = $this->input->post('category');
		$nor=$this->session->userdata('nor');
		$rtype=$this->session->userdata('rtype');
		$cin=$this->session->userdata('cin');
		$cout=$this->session->userdata('cout');
		$city=$this->session->userdata('city');
		$adult=$this->session->userdata('adult');
		$child=$this->session->userdata('child');
		$room=$this->session->userdata('room');
		$days=$this->session->userdata('dt');
		$data['cost']=$this->session->userdata('cost');
		$data['costtype']=$this->session->userdata('costtype');
		$data['disp_city']=$this->session->userdata('disp_city');
		$data['cin']=$cin;
		$data['cout']=$cout;
		$data['star']=$star;
		$data['nor']=$nor;
		$data['rtype']=$rtype;
		$data['city']=$city;
		$noofroom=$nor;
		$roomusedtype=$rtype;
			
		$sec_res=$this->session->userdata('sec_res');	
		$sresult=$this->Search_Model->get_star_search_result_info($sec_res,$star);
		if($sresult!=''){
		foreach($sresult as $row){
			$cityNamesvalue=$row->city_name;
			$hotelCodevalue[]=$row->hotel_id;
			$hotelNamesvalue[]=$row->hotel_name;
			$categoryCodevalue[]=$row->star_rate;
			$pricePerNightvalue[]=$row->nightperroom;
			$RoomCostvalue1[]=$row->cost_value;
			$RoomCost[]=$row->cost_type;
			$apiNameValue[]=$row->api_name;
			$roomtypeValue[]=$row->room_type;
			$inclusionValue[]=$row->inclusion;
		}
				$data['criteria_id']=$sec_res;
				$data['hotelCodevalue']=$hotelCodevalue;
				$data['apiNameValue']=$apiNameValue;
				$data['hotelNamesvalue']=$hotelNamesvalue;
				$data['categoryCodevalue']=$categoryCodevalue;
				$data['pricePerNightvalue']=$pricePerNightvalue;
				$data['RoomCostvalue1']=$RoomCostvalue1;
		  		$data['RoomCost']=$RoomCost;
		  		$data['cityNamesvalue']=$cityNamesvalue;
				$data['roomtypeValue']=$roomtypeValue;
				$data['inclusionValue']=$inclusionValue;
				

				$data['dt']=$days;
				$data['room']=$room;
				$data['adult']=$adult;
				$data['child']=$child;
		  
		  
				$data['a_id']=$this->session->userdata('agent_id');	
			
				$agnt=$this->session->userdata('agentid');		
	
				$data['last_log']=$this->Agent_Model->agent_last_login($agnt);
			
				$data['acc_info']=$this->Agent_Model->accnt_information($agnt);
							
					
				$this->load->view('agent_search/search_result',$data);	
		  	//$this->load->view('footer');
		}else{
		

				$data['dt']=$days;
				$data['room']=$room;
				$data['adult']=$adult;
				$data['child']=$child;

				$data['a_id']=$this->session->userdata('agent_id');	
			
				$agnt=$this->session->userdata('agentid');		
							
				
				$data['last_log']=$this->Agent_Model->agent_last_login($agnt);
			
				$data['acc_info']=$this->Agent_Model->accnt_information($agnt);
							
					
				$this->load->view('agent_search/search_result',$data);	
		  	
		}
	}
	
	function desc_order($star)
	{
	
	$nor=$this->session->userdata('nor');
	$rtype=$this->session->userdata('rtype');
	$cin=$this->session->userdata('cin');
	$cout=$this->session->userdata('cout');
	$city=$this->session->userdata('city');
	$adult=$this->session->userdata('adult');
	$child=$this->session->userdata('child');
	$room=$this->session->userdata('room');
	$days=$this->session->userdata('dt');	
		  $data['cost']=$this->session->userdata('cost');
		  $data['costtype']=$this->session->userdata('costtype');	
		  $data['disp_city']=$this->session->userdata('disp_city');$data['cin']=$cin;
			$data['cout']=$cout;
			$data['star']=$star;
			$data['nor']=$nor;
			$data['rtype']=$rtype;
			$data['city']=$city;
			$noofroom=$nor;

			$roomusedtype=$rtype;
			
			  	$sec_res=$this->session->userdata('sec_res');	
				$sresult=$this->Search_Model->get_order_search_result_info1($sec_res,$star);
				if($sresult!=''){
				foreach($sresult as $row){
					$cityNamesvalue=$row->city_name;
					$hotelCodevalue[]=$row->hotel_id;
					$hotelNamesvalue[]=$row->hotel_name;
					$categoryCodevalue[]=$row->star_rate;
					$pricePerNightvalue[]=$row->nightperroom;
					$RoomCostvalue1[]=$row->cost_value;
					$RoomCost[]=$row->cost_type;
					$apiNameValue[]=$row->api_name;
					$roomtypeValue[]=$row->room_type;
					$inclusionValue[]=$row->inclusion;
				}
				$data['criteria_id']=$sec_res;
				$data['hotelCodevalue']=$hotelCodevalue;
				$data['apiNameValue']=$apiNameValue;
				$data['hotelNamesvalue']=$hotelNamesvalue;
				$data['categoryCodevalue']=$categoryCodevalue;
				$data['pricePerNightvalue']=$pricePerNightvalue;
				$data['RoomCostvalue1']=$RoomCostvalue1;
		  		$data['RoomCost']=$RoomCost;
		  		$data['cityNamesvalue']=$cityNamesvalue;
				$data['roomtypeValue']=$roomtypeValue;
				$data['inclusionValue']=$inclusionValue;
				

				$data['dt']=$days;
				$data['room']=$room;
				$data['adult']=$adult;
				$data['child']=$child;
		  
		  
				$data['a_id']=$this->session->userdata('agent_id');	
			
				$agnt=$this->session->userdata('agentid');		
				
			
				
				$data['last_log']=$this->Agent_Model->agent_last_login($agnt);
			
				$data['acc_info']=$this->Agent_Model->accnt_information($agnt);
							
					
				$this->load->view('agent_search/search_result',$data);	
		  	
		}
	
	
	}
	
	function asc_order($star)
	{
	
	$nor=$this->session->userdata('nor');
	$rtype=$this->session->userdata('rtype');
	$cin=$this->session->userdata('cin');
	$cout=$this->session->userdata('cout');
	$city=$this->session->userdata('city');
	$adult=$this->session->userdata('adult');
	$child=$this->session->userdata('child');
	$room=$this->session->userdata('room');
	$days=$this->session->userdata('dt');	
			  $data['cost']=$this->session->userdata('cost');
			  $data['costtype']=$this->session->userdata('costtype');
			  $data['disp_city']=$this->session->userdata('disp_city');$data['cin']=$cin;
			$data['cout']=$cout;
			$data['star']=$star;
			$data['nor']=$nor;
			$data['rtype']=$rtype;
			$data['city']=$city;
			$noofroom=$nor;
			$roomusedtype=$rtype;
			
			  	$sec_res=$this->session->userdata('sec_res');	
				$sresult=$this->Search_Model->get_order_search_result_info2($sec_res,$star);
				if($sresult!=''){
				foreach($sresult as $row){
					$cityNamesvalue=$row->city_name;
					$hotelCodevalue[]=$row->hotel_id;
					$hotelNamesvalue[]=$row->hotel_name;
					$categoryCodevalue[]=$row->star_rate;
					$pricePerNightvalue[]=$row->nightperroom;
					$RoomCostvalue1[]=$row->cost_value;
					$RoomCost[]=$row->cost_type;
					$apiNameValue[]=$row->api_name;
					$roomtypeValue[]=$row->room_type;
					$inclusionValue[]=$row->inclusion;
					
				}
				$data['criteria_id']=$sec_res;
				$data['hotelCodevalue']=$hotelCodevalue;
				$data['apiNameValue']=$apiNameValue;
				$data['hotelNamesvalue']=$hotelNamesvalue;
				$data['categoryCodevalue']=$categoryCodevalue;
				$data['pricePerNightvalue']=$pricePerNightvalue;
				$data['RoomCostvalue1']=$RoomCostvalue1;
		  		$data['RoomCost']=$RoomCost;
		  		$data['cityNamesvalue']=$cityNamesvalue;
				$data['roomtypeValue']=$roomtypeValue;
				$data['inclusionValue']=$inclusionValue;
				

				$data['dt']=$days;
				$data['room']=$room;
				$data['adult']=$adult;
				$data['child']=$child;
		  
		  
				$data['a_id']=$this->session->userdata('agent_id');	
			
				$agnt=$this->session->userdata('agentid');		
				
			
				
				$data['last_log']=$this->Agent_Model->agent_last_login($agnt);
			
				$data['acc_info']=$this->Agent_Model->accnt_information($agnt);
							
					
				$this->load->view('agent_search/search_result',$data);	
		  	
		}
	
	
	}
	
	
	/*******************    price  ***********************/
	
	
	
	function desc_order_price($star)
	{
	
	$nor=$this->session->userdata('nor');
	$rtype=$this->session->userdata('rtype');
	$cin=$this->session->userdata('cin');
	$cout=$this->session->userdata('cout');
	$city=$this->session->userdata('city');
	$adult=$this->session->userdata('adult');
	$child=$this->session->userdata('child');
	$room=$this->session->userdata('room');
	$days=$this->session->userdata('dt');	
			  $data['cost']=$this->session->userdata('cost');
			  $data['costtype']=$this->session->userdata('costtype');	
			  $data['disp_city']=$this->session->userdata('disp_city');
			  $data['cin']=$cin;
			$data['cout']=$cout;
			$data['star']=$star;
			$data['nor']=$nor;
			$data['rtype']=$rtype;
			$data['city']=$city;
			$noofroom=$nor;
			$roomusedtype=$rtype;
			
			  	$sec_res=$this->session->userdata('sec_res');	
				$sresult=$this->Search_Model->get_order_search_result_info_price1($sec_res,$star);
				if($sresult!=''){
				foreach($sresult as $row){
					$cityNamesvalue=$row->city_name;
					$hotelCodevalue[]=$row->hotel_id;
					$hotelNamesvalue[]=$row->hotel_name;
					$categoryCodevalue[]=$row->star_rate;
					$pricePerNightvalue[]=$row->nightperroom;
					$RoomCostvalue1[]=$row->cost_value;
					$RoomCost[]=$row->cost_type;
					$apiNameValue[]=$row->api_name;
					$roomtypeValue[]=$row->room_type;
					$inclusionValue[]=$row->inclusion;
				}
				$data['criteria_id']=$sec_res;
				$data['hotelCodevalue']=$hotelCodevalue;
				$data['apiNameValue']=$apiNameValue;
				$data['hotelNamesvalue']=$hotelNamesvalue;
				$data['categoryCodevalue']=$categoryCodevalue;
				$data['pricePerNightvalue']=$pricePerNightvalue;
				$data['RoomCostvalue1']=$RoomCostvalue1;
		  		$data['RoomCost']=$RoomCost;
		  		$data['cityNamesvalue']=$cityNamesvalue;
				$data['roomtypeValue']=$roomtypeValue;
				$data['inclusionValue']=$inclusionValue;
				

				$data['dt']=$days;
				$data['room']=$room;
				$data['adult']=$adult;
				$data['child']=$child;
		  
		  
				$data['a_id']=$this->session->userdata('agent_id');	
			
				$agnt=$this->session->userdata('agentid');		
				
			
				
				$data['last_log']=$this->Agent_Model->agent_last_login($agnt);
			
				$data['acc_info']=$this->Agent_Model->accnt_information($agnt);
							
					
				$this->load->view('agent_search/search_result',$data);	
		  	//$this->load->view('footer');
		}
	
	
	}
	
	function asc_order_price($star)
	{
	
	$nor=$this->session->userdata('nor');
	$rtype=$this->session->userdata('rtype');
	$cin=$this->session->userdata('cin');
	$cout=$this->session->userdata('cout');
	$city=$this->session->userdata('city');
	$adult=$this->session->userdata('adult');
	$child=$this->session->userdata('child');
	$room=$this->session->userdata('room');
	$days=$this->session->userdata('dt');
		
			  $data['cost']=$this->session->userdata('cost');
			  $data['costtype']=$this->session->userdata('costtype');	
			  $data['disp_city']=$this->session->userdata('disp_city');
			  
			$data['cin']=$cin;
			$data['cout']=$cout;
			$data['star']=$star;
			$data['nor']=$nor;
			$data['rtype']=$rtype;
			$data['city']=$city;
			$noofroom=$nor;
			$roomusedtype=$rtype;
			
			  	$sec_res=$this->session->userdata('sec_res');	
				$sresult=$this->Search_Model->get_order_search_result_info_price2($sec_res,$star);
				if($sresult!=''){
				foreach($sresult as $row){
					$cityNamesvalue=$row->city_name;
					$hotelCodevalue[]=$row->hotel_id;
					$hotelNamesvalue[]=$row->hotel_name;
					$categoryCodevalue[]=$row->star_rate;
					$pricePerNightvalue[]=$row->nightperroom;
					$RoomCostvalue1[]=$row->cost_value;
					$RoomCost[]=$row->cost_type;
					$apiNameValue[]=$row->api_name;
					$roomtypeValue[]=$row->room_type;
					$inclusionValue[]=$row->inclusion;
				}
				$data['criteria_id']=$sec_res;
				$data['hotelCodevalue']=$hotelCodevalue;
				$data['apiNameValue']=$apiNameValue;
				$data['hotelNamesvalue']=$hotelNamesvalue;
				$data['categoryCodevalue']=$categoryCodevalue;
				$data['pricePerNightvalue']=$pricePerNightvalue;
				$data['RoomCostvalue1']=$RoomCostvalue1;
		  		$data['RoomCost']=$RoomCost;
		  		$data['cityNamesvalue']=$cityNamesvalue;
				$data['roomtypeValue']=$roomtypeValue;
				$data['inclusionValue']=$inclusionValue;
				

				$data['dt']=$days;
				$data['room']=$room;
				$data['adult']=$adult;
				$data['child']=$child;
		  
		  
				$data['a_id']=$this->session->userdata('agent_id');	
			
				$agnt=$this->session->userdata('agentid');		
				
			
				
				$data['last_log']=$this->Agent_Model->agent_last_login($agnt);
			
				$data['acc_info']=$this->Agent_Model->accnt_information($agnt);
							
					
				$this->load->view('agent_search/search_result',$data);	
		  	
		}
	
	
	}

	
	/*******************  end price   *********************************/
	
	
	
	/*******************    star  ***********************/
	
	
	
	function desc_order_star($star)
	{
	
	$nor=$this->session->userdata('nor');
	$rtype=$this->session->userdata('rtype');
	$cin=$this->session->userdata('cin');
	$cout=$this->session->userdata('cout');
	$city=$this->session->userdata('city');
	$adult=$this->session->userdata('adult');
	$child=$this->session->userdata('child');
	$room=$this->session->userdata('room');
	$days=$this->session->userdata('dt');
		
			  $data['cost']=$this->session->userdata('cost');
			  $data['costtype']=$this->session->userdata('costtype');	
			  $data['disp_city']=$this->session->userdata('disp_city');$data['cin']=$cin;
			$data['cout']=$cout;
			$data['star']=$star;
			$data['nor']=$nor;
			$data['rtype']=$rtype;
			$data['city']=$city;
			$noofroom=$nor;
			$roomusedtype=$rtype;
			
			  	$sec_res=$this->session->userdata('sec_res');	
				$sresult=$this->Search_Model->get_order_search_result_info_star1($sec_res,$star);
				if($sresult!=''){
				foreach($sresult as $row){
					$cityNamesvalue=$row->city_name;
					$hotelCodevalue[]=$row->hotel_id;
					$hotelNamesvalue[]=$row->hotel_name;
					$categoryCodevalue[]=$row->star_rate;
					$pricePerNightvalue[]=$row->nightperroom;
					$RoomCostvalue1[]=$row->cost_value;
					$RoomCost[]=$row->cost_type;
					$apiNameValue[]=$row->api_name;
					$roomtypeValue[]=$row->room_type;
					$inclusionValue[]=$row->inclusion;
				}
				$data['criteria_id']=$sec_res;
				$data['hotelCodevalue']=$hotelCodevalue;
				$data['apiNameValue']=$apiNameValue;
				$data['hotelNamesvalue']=$hotelNamesvalue;
				$data['categoryCodevalue']=$categoryCodevalue;
				$data['pricePerNightvalue']=$pricePerNightvalue;
				$data['RoomCostvalue1']=$RoomCostvalue1;
		  		$data['RoomCost']=$RoomCost;
		  		$data['cityNamesvalue']=$cityNamesvalue;
				$data['roomtypeValue']=$roomtypeValue;
				$data['inclusionValue']=$inclusionValue;
				

				$data['dt']=$days;
				$data['room']=$room;
				$data['adult']=$adult;
				$data['child']=$child;
		  
		  
				$data['a_id']=$this->session->userdata('agent_id');	
			
				$agnt=$this->session->userdata('agentid');		
				
			
				
				$data['last_log']=$this->Agent_Model->agent_last_login($agnt);
			
				$data['acc_info']=$this->Agent_Model->accnt_information($agnt);
							
					
				$this->load->view('agent_search/search_result',$data);	
		  	//$this->load->view('footer');
		}
	
	
	}
	
	function asc_order_star($star)
	{
	
	$nor=$this->session->userdata('nor');
	$rtype=$this->session->userdata('rtype');
	$cin=$this->session->userdata('cin');
	$cout=$this->session->userdata('cout');
	$city=$this->session->userdata('city');
	$adult=$this->session->userdata('adult');
	$child=$this->session->userdata('child');
	$room=$this->session->userdata('room');
	$days=$this->session->userdata('dt');
		
			  $data['cost']=$this->session->userdata('cost');
			  $data['costtype']=$this->session->userdata('costtype');	
			  $data['disp_city']=$this->session->userdata('disp_city');
			  $data['cin']=$cin;
			$data['cout']=$cout;
			$data['star']=$star;
			$data['nor']=$nor;
			$data['rtype']=$rtype;
			$data['city']=$city;
			$noofroom=$nor;
			$roomusedtype=$rtype;
			
			  	$sec_res=$this->session->userdata('sec_res');	
				$sresult=$this->Search_Model->get_order_search_result_info_star2($sec_res,$star);
				if($sresult!=''){
				foreach($sresult as $row){
					$cityNamesvalue=$row->city_name;
					$hotelCodevalue[]=$row->hotel_id;
					$hotelNamesvalue[]=$row->hotel_name;
					$categoryCodevalue[]=$row->star_rate;
					$pricePerNightvalue[]=$row->nightperroom;
					$RoomCostvalue1[]=$row->cost_value;
					$RoomCost[]=$row->cost_type;
					$apiNameValue[]=$row->api_name;
					$roomtypeValue[]=$row->room_type;
					$inclusionValue[]=$row->inclusion;
				}
				$data['criteria_id']=$sec_res;
				$data['hotelCodevalue']=$hotelCodevalue;

				$data['apiNameValue']=$apiNameValue;
				$data['hotelNamesvalue']=$hotelNamesvalue;
				$data['categoryCodevalue']=$categoryCodevalue;
				$data['pricePerNightvalue']=$pricePerNightvalue;
				$data['RoomCostvalue1']=$RoomCostvalue1;
		  		$data['RoomCost']=$RoomCost;
		  		$data['cityNamesvalue']=$cityNamesvalue;
				$data['roomtypeValue']=$roomtypeValue;
				$data['inclusionValue']=$inclusionValue;
				

				$data['dt']=$days;
				$data['room']=$room;
				$data['adult']=$adult;
				$data['child']=$child;
		  
		  
				$data['a_id']=$this->session->userdata('agent_id');	
			
				$agnt=$this->session->userdata('agentid');		
				
			
				
				$data['last_log']=$this->Agent_Model->agent_last_login($agnt);
			
				$data['acc_info']=$this->Agent_Model->accnt_information($agnt);
							
					
				$this->load->view('agent_search/search_result',$data);	
		  	//$this->load->view('footer');
		}
	
	
	}
	
	
	
	
	
	/*******************  end star   *********************************/
	
	
	
	function sort_by_albhabet($star,$var)
	{

	$nor=$this->session->userdata('nor');
	$rtype=$this->session->userdata('rtype');
	$cin=$this->session->userdata('cin');
	$cout=$this->session->userdata('cout');
	$city=$this->session->userdata('city');
	$adult=$this->session->userdata('adult');
	$child=$this->session->userdata('child');
	$room=$this->session->userdata('room');
	$days=$this->session->userdata('dt');
		
			  $data['cost']=$this->session->userdata('cost');
			  $data['costtype']=$this->session->userdata('costtype');	
			  $data['disp_city']=$this->session->userdata('disp_city');$data['cin']=$cin;
				$data['cout']=$cout;
				$data['star']=$star;
				$data['nor']=$nor;
				$data['rtype']=$rtype;
				$data['city']=$city;
				$noofroom=$nor;
				$roomusedtype=$rtype;
				
				  	$sec_res=$this->session->userdata('sec_res');	
					$sresult=$this->Search_Model->get_albhabet_search_result_info($sec_res,$star,$var);
					if($sresult!=''){
					foreach($sresult as $row){
						$cityNamesvalue=$row->city_name;
						$hotelCodevalue[]=$row->hotel_id;
						$hotelNamesvalue[]=$row->hotel_name;
						$categoryCodevalue[]=$row->star_rate;
						$pricePerNightvalue[]=$row->nightperroom;
						$RoomCostvalue1[]=$row->cost_value;
						$RoomCost[]=$row->cost_type;
						$apiNameValue[]=$row->api_name;
						$roomtypeValue[]=$row->room_type;
					$inclusionValue[]=$row->inclusion;
					}
					$data['criteria_id']=$sec_res;
					$data['hotelCodevalue']=$hotelCodevalue;
					$data['apiNameValue']=$apiNameValue;
					$data['hotelNamesvalue']=$hotelNamesvalue;
					$data['categoryCodevalue']=$categoryCodevalue;
					$data['pricePerNightvalue']=$pricePerNightvalue;
					$data['RoomCostvalue1']=$RoomCostvalue1;
					$data['RoomCost']=$RoomCost;
					$data['cityNamesvalue']=$cityNamesvalue;
					$data['roomtypeValue']=$roomtypeValue;
				    $data['inclusionValue']=$inclusionValue;
					

					$data['dt']=$days;
					$data['room']=$room;
					$data['adult']=$adult;
					$data['child']=$child;
			  
			  
				$data['a_id']=$this->session->userdata('agent_id');	
			
				$agnt=$this->session->userdata('agentid');		
				
			
				
				$data['last_log']=$this->Agent_Model->agent_last_login($agnt);
			

				$data['acc_info']=$this->Agent_Model->accnt_information($agnt);
							
					
				$this->load->view('agent_search/search_result',$data);	
				//$this->load->view('footer');
			}else{
		

				$data['dt']=$days;
				$data['room']=$room;
				$data['adult']=$adult;
				$data['child']=$child;

				$data['a_id']=$this->session->userdata('agent_id');	
			
				$agnt=$this->session->userdata('agentid');		
				
			
				
				$data['last_log']=$this->Agent_Model->agent_last_login($agnt);
			
				$data['acc_info']=$this->Agent_Model->accnt_information($agnt);
							
					
				$this->load->view('agent_search/search_result',$data);	
		  	//$this->load->view('footer');
		}
		
	
	}
	
	
	/******************* end albhabets sort ***************************************/
	
	
		function get_hotel_details($hotelcode)
		{
				//$hotelCode=$hotelcode;
			 $xml_data ='<HotelDetailRQ echoToken="DummyEchoToken" xmlns="http://www.hotelbeds.com/schemas/2005/06/messages" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.hotelbeds.com/schemas/2005/06/messages HotelDetailRQ.xsd">
		<Language>ENG</Language>
		<Credentials>
			<User>HOLIDAYWRIN21552</User>
			<Password>HOLIDAYWRIN21552</Password>
		</Credentials>
		<HotelCode>'.$hotelcode.'</HotelCode>
	</HotelDetailRQ>';
				
						$URL = "http://212.170.239.71/appservices/http/FrontendService";
			 
						$ch = curl_init($URL);
						//curl_setopt($ch, CURLOPT_MUTE, 1);
						curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
						curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
						curl_setopt($ch, CURLOPT_POST, 1);
						curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml'));
						curl_setopt($ch, CURLOPT_POSTFIELDS, "$xml_data");
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
						$xmls = curl_exec($ch);
						curl_close($ch);
						$data['xml']=$xmls;
			
			$dom=new DOMDocument();
			$dom->loadXML($xmls);
			$j=0;
				  
/*					            $data['roomFacilities']=$dom->getElementsByTagName("roomFacilities");
								$data['row']=$dom->getElementsByTagName("hotelInfo");	
								$data['hotelDesc']=$dom->getElementsByTagName("Description");	
								$data['locationDesc']=$dom->getElementsByTagName("locationDesc");	
								$data['pic']=$dom->getElementsByTagName("picture");	*/
			
			
								$data['Pic']=$dom->getElementsByTagName("Image");
								
								$hotel=$dom->getElementsByTagName("Hotel");
								foreach($hotel as $ht)
								{
									$htName=$ht->getElementsByTagName("Name");
									$HtNamevalueDate= $htName->item(0)->nodeValue; 
									
									$hoteladd=$dom->getElementsByTagName("Address");
										foreach($hoteladd as $hadd)
										{
											$stName=$hadd->getElementsByTagName("StreetName");
											$HtstName= $stName->item(0)->nodeValue; 
											
											//$stNumber=$hadd->getElementsByTagName("Number");
											//$HtstNumber= $stNumber->item(0)->nodeValue; 
											
											$stpin=$hadd->getElementsByTagName("PostalCode");
											$Htstpin= $stpin->item(0)->nodeValue;

											$stcity=$hadd->getElementsByTagName("City");
											$Htstcity= $stcity->item(0)->nodeValue; 
											
											$stcountry=$hadd->getElementsByTagName("CountryCode");
											$Htstcountry= $stcountry->item(0)->nodeValue; 
											
											
										}	
										$data['StNAME']=$HtstName;
										//$data['StNUMBER']=$HtstNumber;
										$data['StPIN']=$Htstpin;
										$data['StCITY']=$Htstcity;
										$data['StCOUNTRY']=$Htstcountry;
										
										
										$hotelemail=$dom->getElementsByTagName("EmailList");
										foreach($hotelemail as $hemail)
										{
											$EmailName=$hemail->getElementsByTagName("Email");
											$HtEmailName= $EmailName->item(0)->nodeValue; 
											
										}	
										$data['htEmail']=$HtEmailName;
										
										
										$hotelph=$dom->getElementsByTagName("PhoneList");
										
										foreach($hotelph as $hph)
										{
											$Ph=$hph->getElementsByTagName("ContactNumber");
											$HtPHONE=$Ph->item(0)->nodeValue; 
											
										}	
										$data['htph']=$HtPHONE;
										
										
										$hotelfax=$dom->getElementsByTagName("FaxList");
										foreach($hotelfax as $hfax)
										{
											$fax=$hfax->getElementsByTagName("ContactNumber");
											$HtFAX= $fax->item(0)->nodeValue; 
											
										}	
										$data['htfax']=$HtFAX;
										
																			
									
								}	
								$data['HOTELNAME']=$HtNamevalueDate;
								
								
								$hoteldesc=$dom->getElementsByTagName("DescriptionList");
								foreach($hoteldesc as $desc)
								{
									$hoteldesc=$desc->getElementsByTagName("Description");
									
									$valueDate[] = $hoteldesc->item($j)->nodeValue; 
									$j++;
									
								}	
								$data['hds']=$valueDate;																		
					
						$this->load->view('header');  
						$this->load->view('hotelbed_hotel_details',$data);  		
						$this->load->view('footer');
    }	
	
	
	function hotel_booking_view($resultid)
	{

	$this->session->set_userdata(array('a_result_id1'=>$resultid));
	
		$roomcount=$this->session->userdata('roomcount');
		$adult=$this->session->userdata('adult');
		$child=$this->session->userdata('child');

		$cost=$this->session->userdata('costtype');
		$data['costtype']=$cost;


		$costval="$cost";
		if($_SERVER['HTTP_HOST']=='localhost' || $_SERVER['HTTP_HOST']=='192.168.0.128')
		{	
			if($cost=='AED')
			{
				$costval='GBP';
			}
			else
			{
				$costval="$cost";
			}
		}
		else
		{
			$costval="$cost";
		}

		$result_view=$this->Search_Model->get_hotel_booking_info($resultid);
		$data['result_id']=$resultid;
		 $data['res']=$result_view;
		$citycode=$result_view[0]->city_name;
		$room=$result_view[0]->location;
		$checkin=$result_view[0]->cin;
		$api=$result_view[0]->api_name;
		$rtype=$result_view[0]->room_type;
		$hotelCode=$result_view[0]->hotel_id;
		$data['roomDesc']=$result_view[0]->location;
		$diff = strtotime($result_view[0]->cout) - strtotime($result_view[0]->cin);

		$sec   = $diff % 60;
		$diff  = intval($diff / 60);
		$min   = $diff % 60;
		$diff  = intval($diff / 60);
		$hours = $diff % 24;
		$days  = intval($diff / 24);
		$data['dt']=$days;

		// var_dump($result_view);
		$hotelname=$result_view[0]->hotel_name;
		 $data['res']=$result_view;
		 $data['checkin']=$this->session->userdata('cin');
		 $data['checkout']=$this->session->userdata('cout');
		 $data['hotelcode']=$hotelCode;
		 $data['roomtype']=$result_view[0]->room_type;
		 $data['hotelname']=$result_view[0]->hotel_name;
		 $data['room']=$this->session->userdata('room');
		 $data['adult']=$adult;
		 $data['child']=$child;


		
			if($_SERVER['HTTP_HOST']=='localhost' || $_SERVER['HTTP_HOST']=='192.168.0.128')
			{
				/*$client="347";
				$email="XML.PROVAB@NORAMIX.COM";
				$pass="PASS"; // local
				$URL = "https://interface.demo.octopustravel.com/rbsukapi/RequestListenerServlet"; //local*/
				
				$client="1184";
				 $email="XML.PROVAB@ITRAVELUKRAINE.COM";
				 $pass="PASS"; // local
				 $URL = "https://interface.demo.gta-travel.com/wbsapi/RequestListenerServlet";//local
			}
			else
			{
				$client="736";
				$email="kamal@solace.ae";	
				$pass="1001EVENTS"; // local 
				$URL='https://interface.gta-travel.com/gtaapi/RequestListenerServlet';
			}

			$roomusedtypeval=$this->session->userdata('roomusedtype');
			$roomCode='';
			$rooms='';
			$room1='';


				$count=count($roomusedtypeval);
		//echo'<pre/>';print_r($roomusedtypeval);exit;
	
		
		for($i=0;$i< count($roomusedtypeval);$i++)
		{
		
			if($roomusedtypeval[$i]=='1')
			{
			$roomCode = 'SB';	
			$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$roomcount[$i].'" Id="'.trim($room).'"></Room>';			
			}
			elseif($roomusedtypeval[$i]=='3')
			{
			$roomCode = 'DB'; //'db';
			$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$roomcount[$i].'" Id="'.trim($room).'"></Room>';				
			}
			elseif($roomusedtypeval[$i]=='9')
			{
			$roomCode = 'Q'; //'db';	
			$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$roomcount[$i].'" Id="'.trim($room).'"></Room>';			
			}
			elseif($roomusedtypeval[$i]=='6')
			{
			$roomCode = 'TB'; //'db';	
			$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$roomcount[$i].'" Id="'.trim($room).'"></Room>';			
			}
			elseif($roomusedtypeval[$i]=='5')
			{
			$roomCode = 'TS'; //'db';
			$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$roomcount[$i].'" Id="'.trim($room).'"></Room>';				
			}
			elseif($roomusedtypeval[$i]=='8')
			{
			$roomCode = 'TR'; //'db';
			$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$roomcount[$i].'" Id="'.trim($room).'"></Room>';				
			}
			elseif($roomusedtypeval[$i]=='4')
			{
			$roomCode = 'DB'; //'db';	
			
		
					if($roomcount[$i]=='2')
					{
						$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$roomcount[$i].'" Id="'.trim($room).'">
									<ExtraBeds>
										<Age>5</Age>
										<Age>5</Age>
									</ExtraBeds>
									
								</Room>';				
					}
					if($roomcount[$i]=='3')
					{
						$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$roomcount[$i].'" Id="'.trim($room).'">
									<ExtraBeds>
										<Age>5</Age>
										<Age>5</Age>
										<Age>5</Age>
									</ExtraBeds>
									
								</Room>';				
					}
					else{
						$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$roomcount[$i].'" Id="'.trim($room).'">
									<ExtraBeds>
										<Age>5</Age>
									</ExtraBeds>
									
								</Room>';	
						}
						
			
			}
			else if($roomusedtypeval[$i]=='7')
			{
				$roomCode = 'TB'; //'db';	
		
					if($roomcount[$i]=='2')
					{
						$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$roomcount[$i].'" Id="'.trim($room).'">
									<ExtraBeds>
										<Age>5</Age>
										<Age>5</Age>
										<Age>5</Age>
										<Age>5</Age>
									</ExtraBeds>
									
								</Room>';				
					}
					if($roomcount[$i]=='3')
					{
						$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$roomcount[$i].'" Id="'.trim($room).'">
									<ExtraBeds>
										<Age>5</Age>
										<Age>5</Age>
										<Age>5</Age>
										<Age>5</Age>
										<Age>5</Age>
										<Age>5</Age>
									</ExtraBeds>
									
								</Room>';				
					}
					else{
						$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$roomcount[$i].'" Id="'.trim($room).'">
									<ExtraBeds>
										<Age>5</Age>
										<Age>5</Age>
									</ExtraBeds>
									
								</Room>';	
						}	
				
			}	
			
		}
		
		
			$rooms=$room1;
			//$costval='USD';
			$xml_data ='<?xml version="1.0" encoding="UTF-8"?>
			<Request>
			<Source>
			<RequestorID Client="'.$client.'" EMailAddress="'.$email.'" Password="'.$pass.'" />
			<RequestorPreferences Language="en" Currency="'.trim($costval).'">
			<RequestMode>SYNCHRONOUS</RequestMode>
			</RequestorPreferences>
			</Source>
			<RequestDetails>
			<SearchChargeConditionsRequest>
			<ChargeConditionsHotel>
			<City>'.$citycode.'</City>
			<Item>'.$hotelCode.'</Item>

			<PeriodOfStay>
			<CheckInDate>'.$checkin.'</CheckInDate>
			<Duration>'.$days.'</Duration>
			</PeriodOfStay>
			<Rooms>'.$rooms.'
			</Rooms>
			</ChargeConditionsHotel>
			</SearchChargeConditionsRequest>
			</RequestDetails>
			</Request>';
			//echo $xml_data;exit;
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
			$data['xml_data'] = $output;

			/*  echo "<Pre>";
			print_r($output);
			echo "</Pre>";
				exit;	*/


			$dom=new DOMDocument();
			$dom->loadXML($output);

			$domTable = $dom->getElementsByTagName("ChargeCondition");

			$service=$this->Search_Model->get_gta_hotel_code1($resultid);
			
			$citycode=$service[0]->city_name;
			$hotel_name=$service[0]->hotel_name;
			$data['hotel_id']=$service[0]->hotel_id;

			$filename=$citycode.' _'.$hotelCode;
			$len=strlen($filename);

			$total=9-$len;
			if($total=='0')
			{
			$final=$filename;
			}
			elseif($total=='1')
			{
			$final=$filename.' ';
			}
			elseif($total=='2')
			{
			$final=$filename.'  ';
			}
			elseif($total=='3')
			{
			$final=$filename.'   ';
			}
			elseif($total=='4')
			{
			$final=$filename.'    ';
			}
			//echo 	$dy_fromvalue;
			//echo $_SERVER['DOCUMENT_ROOT']	;
			//	echo $file=$_SERVER['DOCUMENT_ROOT'].'/demo4/Full_Static_Data_Download_File/'.$final.'.xml';exit;	//server

			//echo $file='//192.168.0.25/demo4/Full_Static_Data_Download_File/'.$filename.'.xml';	//local

			$file='';
			if(file_exists($file))
			{
			$dom=new DOMDocument();
			$dom->load($file);

			$item=$dom->getElementsByTagName("ItemDetails");
			$street1val2='';
			foreach($item as $res)
			{


			$name = $res->getElementsByTagName( "Item" );
			$hn1 = $name->item(0)->nodeValue;

			$street1 = $res->getElementsByTagName( "AddressLine1" );
			$ana1 = $street1->item(0)->nodeValue;

			$street2 = $res->getElementsByTagName( "AddressLine2" );
			foreach( $street2 as $st)
			{
			$street1val2 = $street2->item(0)->nodeValue;
			}
			//echo "sri";
			$ad1=$street1val2."<br>".$street1val2;

			$city = $res->getElementsByTagName( "City" );
			$cina1 = $city->item(0)->nodeValue;

			$Report  = $res->getElementsByTagName( "Report" );
			$description = $Report ->item(0)->nodeValue;

			$fax = $res->getElementsByTagName( "Fax" );
			$fno1 = $fax->item(0)->nodeValue;

			$phone = $res->getElementsByTagName( "Telephone" );
			$tno1 = $phone->item(0)->nodeValue;


			/*$WebSite = $res->getElementsByTagName( "WebSite" );
			$WebSiteval = $WebSite->item(0)->nodeValue;	*/

			$cn1='';
			$pc1='';

			$ImageLinks = $res->getElementsByTagName("ImageLinks");
			foreach( $ImageLinks as $ils)
			{
				$ImageLink = $ils->getElementsByTagName("ImageLink");
				foreach( $ImageLink as $il)
				{
					$ThumbNail = $il->getElementsByTagName("ThumbNail");
					$picture = $ThumbNail->item(0)->nodeValue;

				}
			}
			}

			}
			else
			{

			$city1=$this->session->userdata('disp_city');
		$travelcube_row=$this->Home_Model->cityCode_gta($city1);
			if($travelcube_row !='')
			{
				
				$city_gta_code=trim($travelcube_row->cityCode);
				$destinationType=trim($travelcube_row->destinationType);
				$countrycode=trim($travelcube_row->countryCode);

			}
			$xml_data ='<?xml version="1.0" encoding="UTF-8"?>
			<Request>
			<Source>
			<RequestorID Client="'.$client.'" EMailAddress="'.$email.'" Password="'.$pass.'" />
			<RequestorPreferences Language="en">
			<RequestMode>SYNCHRONOUS</RequestMode>
			</RequestorPreferences>
			</Source>
			<RequestDetails>
			<SearchItemInformationRequest ItemType="hotel">
			';
				$city_cde = $this->session->userdata('citycode');
				$city_cde1 = explode('-',$city_cde);
				if(count($city_cde1)==1)
				{
					$city_cde1 = explode(' ',$city_cde1[0]);
				}
				if($city_cde1[0]=='Bali,Indonesia' || $city_cde1[0]=='Bali')
				{
					$xml_data .= '<ItemDestination DestinationType="area" DestinationCode="BALI" />';
				}
				else if($city_cde1[0]=='Venice, Italy' || $city_cde1[0]=='Venice')
				{
					$xml_data .= '<ItemDestination DestinationType="area" DestinationCode="VCE2" />';
				}
				else if($city_cde1[0]=='Tenerife' || $city_cde1[0]=='Tenerife')
				{
					$xml_data .= '<ItemDestination DestinationType="area" DestinationCode="TEN" />';
				}
				else if($city_gta_code=='HKT')
				{
					$xml_data .= '<ItemDestination DestinationType="area" DestinationCode="'.$city_gta_code.'" />';
				}
				else if($city_gta_code=='DUBW')
				{
					$xml_data .= '<ItemDestination DestinationType="city" DestinationCode="DXB" />';
				}
				else
				{
					$xml_data .= '<ItemDestination DestinationType="'.$destinationType.'" DestinationCode="'.$city_gta_code.'" />';
				}
					$xml_data .= '
			<ItemCode>'.$hotelCode.'</ItemCode>
			</SearchItemInformationRequest>
			</RequestDetails>
			</Request>';
				//echo $xml_data;exit;
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
			$output1=curl_exec($ch);
			$errno = curl_getinfo( $ch, CURLINFO_HTTP_CODE );
			curl_close($ch);
			//echo $output1;exit;
			/*echo "<Pre>";
			print_r($output1);
			echo "</Pre>";exit;*/

			$dom=new DOMDocument();
			$dom->loadXML($output1);

			$item=$dom->getElementsByTagName("ItemDetail");
			$street1val2='';

			foreach($item as $res)
			{

				$name = $res->getElementsByTagName( "Item" );
				$hn1 = $name->item(0)->nodeValue;

				$street1 = $res->getElementsByTagName( "AddressLine1" );
				$ana1 = $street1->item(0)->nodeValue;

				$street2 = $res->getElementsByTagName( "AddressLine2" );
				foreach( $street2 as $st){
				$street1val2 = $street2->item(0)->nodeValue;
				}


				//echo "sri";
				$ad1=$street1val2."<br>".$street1val2;


				$city = $res->getElementsByTagName( "City" );
				$cina1 = $city->item(0)->nodeValue;

				$Report  = $res->getElementsByTagName( "Report" );
				$description = $Report ->item(0)->nodeValue;

				$fax = $res->getElementsByTagName( "Fax" );
				$fno1 = $fax->item(0)->nodeValue;

				$phone = $res->getElementsByTagName( "Telephone" );
				$tno1 = $phone->item(0)->nodeValue;


				/*						$WebSite = $res->getElementsByTagName( "WebSite" );
				$WebSiteval = $WebSite->item(0)->nodeValue;	*/

				$cn1='';
				$pc1='';

					$ImageLinks = $res->getElementsByTagName("ImageLinks");
					foreach( $ImageLinks as $ils)
					{
						$ImageLink = $ils->getElementsByTagName("ImageLink");
						foreach( $ImageLink as $il)
						{
							$ThumbNail = $il->getElementsByTagName("ThumbNail");
							$picture = $ThumbNail->item(0)->nodeValue;

						}
					}
				//$picture=$ThumbNail->item(0)->nodeValue;
				}
			//	echo $val;

			}

		
								 $data['name']=$hn1;
								 $data['country']=$cn1;
								 $data['city']=$cina1;
								 $data['st1']=$ana1;
								 $data['st2']=$ad1;
								 $data['pin']=$pc1;
								 $data['phno']=$tno1;
								 $data['fax']=$fno1;
								 $data['api']=$api;
								 $data['pic']=$picture;
								 $data['descriptions']=$description;

								  $address1="$ana1,$tno1,$fno1,$cina1";
		 $address="$hn1,$ana1,$ad1,$pc1";
		// echo $address1;exit;
		 $this->session->set_userdata(array('sadd1'=>$address));	
		 $this->session->set_userdata(array('address'=>$address1));								 
		 $this->session->set_userdata(array('result_id'=>$resultid));
					$data['country_list']=$this->Home_Model->manage_country();
			//$data['currency_code'] = $this->Home_Model->get_currency_code();
			//$data['travelcube_res'] = $this->Search_Model->get_roomtype($resultid);
			
			 $data['api']='gta';
			 $data['a_id']=$this->session->userdata('agent_id');	
	
			 $agnt=$this->session->userdata('agentid');				
	
			 $data['last_log']=$this->Agent_Model->agent_last_login($agnt);	
			 $data['acc_info']=$this->Agent_Model->accnt_information($agnt);
			 $data['location'] = $room;
			
			 $this->load->view('header1',$data);
			 $this->load->view('agent_search/booking',$data);
			 $this->load->view('agent_search/footer');	 

		

	}	
	
	//dotw booking view
	function dotw_hotel_booking_view($resultid)
	{
		$data['checkin']=$this->session->userdata('cin');
		$data['checkout']=$this->session->userdata('cout');
		$data['room']=$this->session->userdata('room');
		$data['roomcount']=$this->session->userdata('roomcount');
		$data['adult']=$this->session->userdata('adult');
		$data['child']=$this->session->userdata('child');
		$data['a_id']=$this->session->userdata('agent_id');
		$agnt=$this->session->userdata('agentid');
		$data['last_log']=$this->Agent_Model->agent_last_login($agnt);	
		$data['acc_info']=$this->Agent_Model->accnt_information($agnt);
		$data['cost']=$this->session->userdata('costtype');	
	
		
		
		$result=$this->Search_Model->dotw_get_hotel_detail($resultid);
		$data['roomtype'] = $result->room_type;
		$data['can_dte'] = $result->can_dte;
		$data['can_end_dte'] = $result->can_end_dte;
		$data['cost_value'] = $result->cost_value;
		$data['cancellation_value'] = $result->cancellation_value;
		$data['hotel_id'] = $result->hotel_id;
		$data['hotel_name'] = $result->hotel_name;
		$data['desc'] = $result->desc;
		$data['address'] = $result->address;
		$data['zip_code'] = $result->zip_code;
		$data['hotel_phone'] = $result->hotel_phone;
		$data['location'] = $result->location;
		$data['hotel_city'] = $result->hotel_city;
		$data['hotel_country'] = $result->hotel_country;
		$data['thumb'] = $result->thumb;
		$data['img_url1'] = $result->img_url1;
		$data['img_url2'] = $result->img_url2;
		$data['img_url3'] = $result->img_url3;
		$data['img_url4'] = $result->img_url4;
		$data['img_url5'] = $result->img_url5;
		
		//echo'<pre/>';print_r($data);exit;
		
		
		
		// $this->session->set_userdata(array('address'=>$address1));								 
		// $this->session->set_userdata(array('result_id'=>$resultid));	
						 
		 $this->load->view('header1',$data);
		 $this->load->view('agent_search/dotw_booking',$data);
		 $this->load->view('agent_search/footer');	 	 
	}
	//dotw booking view ends
	
	//dotw booking janani
	
	function dotw_booking()
	{
		include('simple_html_dom.php');
		$agnt=$this->session->userdata('agentid');	
		$data['a_id']=$this->session->userdata('agent_id');	
		$data['last_log']=$this->Agent_Model->agent_last_login($agnt);
		$data['acc_info']=$this->Agent_Model->accnt_information($agnt);	
		$roomcount=$this->session->userdata('roomcount');	 
		$data['costtype']=$this->session->userdata('costtype');
		$bal=$this->input->post('balance');
		$book=$this->input->post('booked_amount_gta');
		$usedamt=$this->input->post('usedamt');
		$data['agnt']=$this->session->userdata('agentid');
		if($bal< $book)
		{
			//$this->load->view('agent_search/header',$data);
			$this->load->view('agent_search/error_info',$data);
			$this->load->view('agent_search/footer');
		}
	 	else
		{
			$sec_res=$this->session->userdata('sec_res');
			$data['unix_cin'] = $this->session->userdata('unix_cin');
			$data['unix_cout'] = $this->session->userdata('unix_cout');
			$costtype  = $this->session->userdata('costtype');
			$data['currency']=$this->Search_Model->get_dotw_currcode($costtype);
			$hotel_id=$this->input->post('hotelcode');
			$data['hotel_id'] =$this->input->post('hotelcode');
			$data['noofroom'] = $this->session->userdata('noofroom');
			
			$data['childage'] ='';
			
			$fname1=$this->input->post('fname');
			$data['fname']=$fname1[0];
			$lname1=$this->input->post('lname');
			$data['lname']=$lname1[0];
			$salutation1=$this->input->post('salutation');	
			$salutation=$salutation1[0];
			if($salutation==1)
				$salutation ='Mr';
			else if($salutation==2)
				$salutation ='Mrs';
			else if($salutation==3)
				$salutation ='Ms';
			else if($salutation==5)
				$salutation ='Dr';
			$data['salutation']=$this->Search_Model->get_dotw_salucode($salutation);
			
			
			
			
			
			$query=$this->Search_Model->roomtype_det($hotel_id,$sec_res);
			
			
			 $i=0;
			 $j=0;
			$req_room='';
			
			foreach ($query->result() as $row)
			{
				
				$room_type = $row->room_type;
				if($room_type=='Single')
				{
					$val['adults']=1;
					$val['children']=0;
				}
				else if($room_type=='Double/Twin')
				{
					$val['adults']=2;
					$val['children']=0;
				}
				else if($room_type=='Triple')
				{
					$val['adults']=3;
					$val['children']=0;
				}
				else if($room_type=='Quad')
				{
					$val['adults']=3;
					$val['children']=0;
				}
				else if($room_type=='Double plus child/Twin plus child')
				{
					$val['adults']=2;
					$val['children']=1;
				}
				$val['roomTypeCode'] = $row->room_type_code;
				$val['selectedRateBasis'] = '0';
				$val['allocationDetails'] = $row->alloc_det;
				
				//echo'<pre/>';print_r($val);
				$req_room .= '<room runno="'.$i.'">
					<roomTypeCode>'.$val['roomTypeCode'].'</roomTypeCode>
					<selectedRateBasis>0</selectedRateBasis>
					<allocationDetails>'.$val['allocationDetails'].'</allocationDetails>
					<adultsCode>'.$val['adults'].'</adultsCode>
					<children no="'.$val['children'].'"></children>';
					if($val['children']>0)
					{
						$req_room .= '<child runno="'.$j.'"></child>';
					}
					$req_room.='<extraBed>0</extraBed>
					<passengersDetails>
						<passenger leading="yes">
							<salutation>'.$data['salutation'].'</salutation>
							<firstName>'.$data['fname'].'</firstName>
							<lastName>'.$data['lname'].'</lastName>
						</passenger>
					</passengersDetails>
				</room>';
				$i++;
			}//exit;
		
		
			 $usr = "Kamal";
			 $pwd = md5('Kamal@solace.ae');
			 $id='461006';
			 
			 $save_room ='<?xml version="1.0" encoding="UTF-8" ?>
		<customer>
	<username>'.$usr.'</username>
	<password>'.$pwd.'</password>
	<id>'.$id.'</id>
	<source>1</source>
	<product>hotel</product>
	<request command="savebooking">
		<bookingDetails>
			<fromDate>'.$data['unix_cin'].'</fromDate>
			<toDate>'.$data['unix_cout'].'</toDate>
			<currency>'.$data['currency'].'</currency>
			<productId>'.$data['hotel_id'].'</productId>
			
			<rooms no="'.$data['noofroom'].'">
				'.$req_room.'
			</rooms>
		</bookingDetails>
	</request>
</customer>';
//echo $save_room;exit;
			  $URL2 = "http://xmldev.dotwconnect.com/gateway.dotw";//local
				 
				$block_ch2=curl_init();
				curl_setopt($block_ch2, CURLOPT_URL, $URL2);
				curl_setopt($block_ch2, CURLOPT_TIMEOUT, 180);
				curl_setopt($block_ch2, CURLOPT_HEADER, 0);
				curl_setopt($block_ch2, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($block_ch2, CURLOPT_POST, 1);
				curl_setopt($block_ch2, CURLOPT_POSTFIELDS, $save_room);
				curl_setopt($block_ch2, CURLOPT_SSL_VERIFYHOST, 1);
				curl_setopt($block_ch2, CURLOPT_SSL_VERIFYPEER, FALSE); 
				curl_setopt($block_ch2, CURLOPT_SSLVERSION, 3);	
				curl_setopt($block_ch2, CURLOPT_FOLLOWLOCATION, true);
		 
				$httpHeader2 = array(
					"Content-Type: text/xml; charset=UTF-8",
					"Content-Encoding: UTF-8"
				);
				curl_setopt($block_ch2, CURLOPT_HTTPHEADER, $httpHeader2);
				curl_setopt ($block_ch2, CURLOPT_ENCODING, "gzip");
		
				// Execute request, store response and HTTP response code
				$block_data=curl_exec($block_ch2);
				$block_error2=curl_getinfo( $block_ch2, CURLINFO_HTTP_CODE );
				curl_close($block_ch2);
				
				//echo'<pre/>';print_r($block_data);exit;
				
			 $confirm_book ='
			 <customer>
				<username>'.$usr.'</username>
				<password>'.$pwd.'</password>
				<id>'.$id.'</id>
				<source>1</source>
				<product>hotel</product>			
				<request command="confirmbooking">
					<bookingDetails>
						<fromDate>'.$data['unix_cin'].'</fromDate>
						<toDate>'.$data['unix_cout'].'</toDate>
						<currency>'.$data['currency'].'</currency>
						<productId>'.$data['hotel_id'].'</productId>
						<rooms no="'.$data['noofroom'].'">
							'.$req_room.'
						</rooms>
					</bookingDetails>
				</request>
			</customer>';
			
			$URL2 = "http://xmldev.dotwconnect.com/gateway.dotw";//local
			 
			$ch2=curl_init();
			curl_setopt($ch2, CURLOPT_URL, $URL2);
			curl_setopt($ch2, CURLOPT_TIMEOUT, 180);
			curl_setopt($ch2, CURLOPT_HEADER, 0);
			curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch2, CURLOPT_POST, 1);
			curl_setopt($ch2, CURLOPT_POSTFIELDS, $confirm_book);
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
					
			if(!empty($data2))		
			{
				$dom2=new DOMDocument();
				$dom2->loadXML($data2);
				
				$result=$dom2->getElementsByTagName("result");
				$vocc_dt = $result->item(0)->getAttribute("date");	
							
				$bookings=$dom2->getElementsByTagName("bookings");
				$i=0;
				$j=0;
				foreach($bookings as $val)
				{
					$booking=$val->getElementsByTagName("booking");
					foreach($booking as $val2)
					{
						$bookingCode = $val2->getElementsByTagName("bookingCode");
						$data['bookingCode'] = $bookingCode->item(0)->nodeValue;
						
						$bookingReferenceNumber = $val2->getElementsByTagName("bookingReferenceNumber");
						$data['book_ref_nos'] = $bookingReferenceNumber->item(0)->nodeValue;
						
						$bookingStatus = $val2->getElementsByTagName("bookingStatus");
						$book_status = $bookingStatus->item(0)->nodeValue;
						$data['book_status']=($book_status==1)?'On Request':'Confirmed';
						
						$servicePrice = $val2->getElementsByTagName("servicePrice");
						$data['service_price'] = round($servicePrice->item(0)->nodeValue,2);
						
						$price = $val2->getElementsByTagName("price");
						$data['price'] = round($price->item(0)->nodeValue,2);
						
						$voucher = $val2->getElementsByTagName("voucher");
						$data['voucher'] = $voucher->item(0)->nodeValue;
						
						$paymentGuaranteedBy = $val2->getElementsByTagName("paymentGuaranteedBy");
						$data['pay_guar_by'] = $paymentGuaranteedBy->item(0)->nodeValue;

						
					}		
				}
				
				
				$data['api'] ='dotw';
				$data['cin'] =$this->session->userdata('cin');
				$data['cout'] =$this->session->userdata('cout');
				$occ_dt=strtotime($vocc_dt);
				$data['vocc_dt']= date('Y-m-d',$occ_dt);
				$data['vocc_dt']= date('Y-m-d',$occ_dt);
				$data['hotel_id'] =$this->input->post('hotelcode');
				$res =$this->Search_Model->get_dotw_phonenos($data['hotel_id']);
				$data['phone_nos'] =$res['hotel_phone'];
				$data['address'] =$res['address'];
				$data['hotel_name'] =$res['hotel_name'];
				$data['city_name'] =$res['city_name'];
				
				
				$sec = $this->session->userdata('sec_res');
				$canc_res =$this->Search_Model->get_dotw_cancel_value($sec,$data['hotel_id']);
				$data['cancel_amt'] =$canc_res['cancel_amt'];
				$data['can_dte'] =$canc_res['can_dte'];
				$data['can_end_dte'] =$canc_res['can_end_dte'];
				 
							
			$dotw_book=$this->Booking_Model->dotw_booking($data['bookingCode'],'dotw',$data['book_ref_nos'],$data['book_status'],$data['hotel_id'],$data['price'],$data['hotel_name'],$data['address'],$data['cancel_amt'],$data['city_name']);
				 
				$fname1=$this->input->post('fname');
				$lname1=$this->input->post('lname');
				$salutation1=$this->input->post('salutation');
				
				for($i=0;$i< count($fname1);$i++){
					
					$this->Booking_Model->add_paaanger_gta($dotw_book,$fname1[$i],$lname1[$i],$salutation1[$i]);
				}
		
		       $cnt=$this->input->post('chil_cnt');
			   
			   if($cnt!=0)
			   {
				   $cfname=$this->input->post('cfname');
					$clname=$this->input->post('clname');
					$csalutation=$this->input->post('csalutation');
					$cage=$this->input->post('cage');
					
					for($k=0;$k < count($cfname);$k++){
						$this->Booking_Model->add_pass_child_info($dotw_book,$cfname[$i],$clname[$i],$csalutation[$i],$cage[$i]);
					}
				   
			   }
			}
			
			$api='dotw';
			$dotw_book ='50';
			$data['gta_re']=$this->Booking_Model->get_gtabooking_result($dotw_book);
			
			$childval=$this->session->userdata('child');		
			$data['child']=$childval;
			
			 $this->load->view('header1',$data);
			 $this->load->view('agent_search/dotw_booking_result',$data);
			 $this->load->view('footer');				
		}
	 		
	
	}
	
	
	//dotw booking ends here
	function book_load()
	{
		$this->load->view('agent_search/book_load',$_POST);
		
	}
	
	function booking()
	{
		//echo $this->session->userdata('address');exit;
		$cin=$this->session->userdata('cin');
		$cout=$this->session->userdata('cout');
		$data['disp_city']=$this->session->userdata('disp_city');
		$agnt=$this->session->userdata('agentid');	
		$data['a_id']=$this->session->userdata('agent_id');	
		$data['last_log']=$this->Agent_Model->agent_last_login($agnt);
			
		$roomcount=$this->session->userdata('roomcount');	 
				
				 
		$cost=$this->session->userdata('costtype');
		$data['costtype']=$cost;
		if($_SERVER['HTTP_HOST']=='localhost' || $_SERVER['HTTP_HOST']=='192.168.0.128')
		{
			if($cost=='AED')
			{
				$costval='GBP';
			}
			else
			{
				$costval="$cost";
			}
		}
		else
		{
			$costval="$cost";
		}
				
	
	 $data['agnt']=$this->session->userdata('agentid');		
	
	 
	 
	 $indate=$this->input->post('checkin');
	 $outdate=$this->input->post('checkout');
	 $hotelcode=$this->input->post('hotelcode');
	 
	  $hname=$this->Booking_Model->get_hotel_name_travco($hotelcode);
	// $roomtype=$this->input->post('roomtype');
	 $room=$this->input->post('roomtype');
	 //echo  $room;exit;
	 $data['indate1']=$indate;
	 $data['outdate1']=$outdate;
	 
	 $count=$this->input->post('count');
	 $api=$this->input->post('api');
	 $data['noofrm']=$count;
	 //$data['roomtype']='Delux';
	
	 $fname1=$this->input->post('fname');
	 $fname=$fname1[0];
	 $lname1=$this->input->post('lname');
	 $lname=$lname1[0];	
	 $age=$this->input->post('age');
	 $salutation1=$this->input->post('salutation');	
	 $salutation=$salutation1[0];
	$nopax=count($salutation1); 
 
	$roomusedtypeval=$this->session->userdata('roomusedtype');	
	
	$noofadult=$this->session->userdata('noofadult');
	$noofnit=$this->session->userdata('dt');
	 
	 
	 $data['api']=$this->input->post('api');
	 
	 $data['ph']=$this->input->post('ph');
	 $data['email']=$this->input->post('email');
	 
	 $ai=$this->input->post('i');
	 $cj=$this->input->post('j');
	 
 
	 $data['ai']=$ai+1;
	 $data['cj']=$cj+1;
 
	 
		 $data['salutation']=$this->input->post('salutation');
		 $data['fname']=$this->input->post('fname');
		 $data['lname']=$this->input->post('lname');
		 $data['age']=$this->input->post('age');
	 
		
		
		
	
					$service=$this->Search_Model->get_hotel_code($hotelcode,$room);
					$citycode=$service->city_name;	
					$roomdesc=$this->input->post("roomdesc");
					$data['roomtype']=$this->input->post("roomdesc");
					$roomval=$service->location;
					$roomval=$this->input->post('location');
					$roomusedtypeval=$this->session->userdata('roomusedtype');	
	
					$roomCode='';
					$rooms='';
					$room1='';
					$bookroom='';
					$nameval='';
					$paxid='';
	
						$m=1;
						$j=0;
						$child=0;
	for($i=0;$i< count($roomusedtypeval);$i++)
	{
	
			if($roomusedtypeval[$i]=='1')
			{
				$roomCode = 'SB';
				$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$roomcount[$i].'" Id="'.trim($roomval).'"></Room>';
			
				for($x=0;$x< $roomcount[$i];$x++)
				{
		
					$bookroom.='<HotelRoom Code="'.$roomCode.'" Id="'.$roomval.'"><PaxIds>';
			
						$bookroom.="<PaxId>$m</PaxId>";
						
			
					$bookroom.='</PaxIds></HotelRoom>';
			
					$nameval.="<PaxName PaxId=\"$m\">$fname1[$j] $lname1[$j]</PaxName>";
					$j++;
					$m++;
				}
			}
			elseif($roomusedtypeval[$i]=='3')
			{
			$roomCode = 'DB'; //'db';
			$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$roomcount[$i].'" Id="'.trim($roomval).'"></Room>';
	
				for($x=0;$x< $roomcount[$i];$x++)
				{
					$bookroom.='<HotelRoom Code="'.$roomCode.'" Id="'.$roomval.'"><PaxIds>';
			
					for($l=0;$l<2;$l++)
					{
						$bookroom.="<PaxId>$m</PaxId>";
			
			
					$nameval.="<PaxName PaxId=\"$m\">$fname1[$j] $lname1[$j]</PaxName>";
					$m++;
					$j++;
					}
					$bookroom.='</PaxIds></HotelRoom>';
				}
	
			}
			elseif($roomusedtypeval[$i]=='9')
			{
			$roomCode = 'Q'; //'db';
			$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$roomcount[$i].'" Id="'.trim($roomval).'"></Room>';
	
				for($x=0;$x< $roomcount[$i];$x++)
				{
					$bookroom.='<HotelRoom Code="'.$roomCode.'" Id="'.$roomval.'"><PaxIds>';
			
					for($l=0;$l<4;$l++)
					{
						$bookroom.="<PaxId>$m</PaxId>";
						
			
					$nameval.="<PaxName PaxId=\"$m\">$fname1[$j] $lname1[$j]</PaxName>";
					$j++;
							$m++;
					}
					$bookroom.='</PaxIds></HotelRoom>';
				}
	
			}
			elseif($roomusedtypeval[$i]=='6')
			{
			$roomCode = 'TB'; //'db';
			$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$roomcount[$i].'" Id="'.trim($roomval).'"></Room>';
	
				for($x=0;$x< $roomcount[$i];$x++)
				{
					$bookroom.='<HotelRoom Code="'.$roomCode.'" Id="'.$roomval.'"><PaxIds>';
			
					for($l=0;$l<2;$l++)
					{
						$bookroom.="<PaxId>$m</PaxId>";
						
			
					$nameval.="<PaxName PaxId=\"$m\">$fname1[$j] $lname1[$j]</PaxName>";
					$j++;
					$m++;
					}
					$bookroom.='</PaxIds></HotelRoom>';
				}
	
			}
			elseif($roomusedtypeval[$i]=='5')
			{
			$roomCode = 'TS'; //'db';
			$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$roomcount[$i].'" Id="'.trim($roomval).'"></Room>';
			
				for($x=0;$x< $roomcount[$i];$x++)
				{
					$bookroom.='<HotelRoom Code="'.$roomCode.'" Id="'.$roomval.'"><PaxIds>';
			
					$bookroom.="<PaxId>$m</PaxId>";
						
			
					$nameval.="<PaxName PaxId=\"$m\">$fname1[$j] $lname1[$j]</PaxName>";
					$j++;
					$m++;
			
					$bookroom.='</PaxIds></HotelRoom>';
				}
	
			}
			elseif($roomusedtypeval[$i]=='8')
			{
			$roomCode = 'TR'; //'db';
			$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$roomcount[$i].'" Id="'.trim($roomval).'"></Room>';
	
				for($x=0;$x< $roomcount[$i];$x++)
				{		
		
					$bookroom.='<HotelRoom Code="'.$roomCode.'" Id="'.$roomval.'"><PaxIds>';
			
					for($l=0;$l<3;$l++)
					{
						$bookroom.="<PaxId>$m</PaxId>";
						
			
					$nameval.="<PaxName PaxId=\"$m\">$fname1[$j] $lname1[$j]</PaxName>";
					$j++;
					$m++;
					}
					$bookroom.='</PaxIds></HotelRoom>';
				}
	
			}
			elseif($roomusedtypeval[$i]=='4')
			{
			$roomCode = 'DB'; //'db';
			
	
					if($roomcount[$i]=='2')
					{
						$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$roomcount[$i].'" Id="'.trim($room).'">
									<ExtraBeds>
										<Age>5</Age>
										<Age>5</Age>
									</ExtraBeds>
									
								</Room>';				
					}
					else if($roomcount[$i]=='3')
					{
						$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$roomcount[$i].'" Id="'.trim($room).'">
									<ExtraBeds>
										<Age>5</Age>
										<Age>5</Age>
										<Age>5</Age>
									</ExtraBeds>
									
								</Room>';	
					}
					else{
						$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$roomcount[$i].'" Id="'.trim($room).'">
									<ExtraBeds>
										<Age>5</Age>
									</ExtraBeds>
									
								</Room>';	
						}
					
				
	
				for($x=0;$x< $roomcount[$i];$x++)
				{
					$bookroom.='<HotelRoom Code="'.$roomCode.'" Id="'.$roomval.'"><PaxIds>';
			
					for($l=0;$l<2;$l++)
					{
						$bookroom.="<PaxId>$m</PaxId>";
						
			
					$nameval.="<PaxName PaxId=\"$m\">$fname1[$j] $lname1[$j]</PaxName>";
					$j++;
					$m++;
					}
					$bookroom.='</PaxIds></HotelRoom>';
			
					$nameval.="<PaxName PaxId=\"$m\" PaxType=\"child\" ChildAge=\"11\">Smith</PaxName>";
					$m++;
					$child++;
				}
				
				
			}
			elseif($roomusedtypeval[$i]=='7')
			{
			$roomCode = 'TB'; //'db';
			
	
					if($roomcount[$i]=='2')
					{
						$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$roomcount[$i].'" Id="'.trim($room).'">
									<ExtraBeds>
										<Age>5</Age>
										<Age>5</Age>
										<Age>5</Age>
										<Age>5</Age>
									</ExtraBeds>
									
								</Room>';				
					}
					else if($roomcount[$i]=='2')
					{
						$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$roomcount[$i].'" Id="'.trim($room).'">
									<ExtraBeds>
										<Age>5</Age>
										<Age>5</Age>
										<Age>5</Age>
										<Age>5</Age>
										<Age>5</Age>
										<Age>5</Age>
									</ExtraBeds>
									
								</Room>';	
					}
					else{
						$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$roomcount[$i].'" Id="'.trim($room).'">
									<ExtraBeds>
										<Age>5</Age>
										<Age>5</Age>
									</ExtraBeds>
									
								</Room>';	
						}
					
	
				for($x=0;$x< $roomcount[$i];$x++)
				{
					$bookroom.='<HotelRoom Code="'.$roomCode.'" Id="'.$roomval.'"><PaxIds>';
			
					for($l=0;$l<2;$l++)
					{
						$bookroom.="<PaxId>$m</PaxId>";
						
			
					$nameval.="<PaxName PaxId=\"$m\">$fname1[$j] $lname1[$j]</PaxName>";
					$j++;
							$m++;
					}
					$bookroom.='</PaxIds></HotelRoom>';
			
					$nameval.="<PaxName PaxId=\"$m\" PaxType=\"child\" ChildAge=\"11\">Smith</PaxName>";
					$m++;
					$child++;
				}
			}
	
	
	}
	
	
	$rooms=$room1;
	$broom=$bookroom;
	$paxidval=$paxid;
	$nameval2=$nameval;
	
	if($_SERVER['HTTP_HOST']=='localhost' || $_SERVER['HTTP_HOST']=='192.168.0.128')
	{		
		$client="1184";
		 $email="XML.PROVAB@ITRAVELUKRAINE.COM";
		 $pass="PASS"; // local
		 $URL = "https://interface.demo.gta-travel.com/wbsapi/RequestListenerServlet";//local
	}
	else
	{
		$client="736";
		$email="kamal@solace.ae";	
		$pass="1001EVENTS"; // local 
		$URL='https://interface.gta-travel.com/gtaapi/RequestListenerServlet';
	}	
		
	$gta_cin=$this->session->userdata('cin');
	$gta_out=$this->session->userdata('cout');
	
		$xml_data ='<?xml version="1.0" encoding="UTF-8"?>
	<Request>
	  <Source>
	<RequestorID Client="'.$client.'" EMailAddress="'.$email.'" Password="'.$pass.'" />
		<RequestorPreferences Language="en" Currency="'.trim($costval).'">
			  <RequestMode>SYNCHRONOUS</RequestMode> 
		</RequestorPreferences>
	  </Source>
		<RequestDetails>
		<SearchChargeConditionsRequest>
			<ChargeConditionsHotel>
				<City>'.$citycode.'</City>
				<Item>'.$hotelcode.'</Item>
				
				<PeriodOfStay>
					<CheckInDate>'.trim($gta_cin).'</CheckInDate>
					<Duration>'.$noofnit.'</Duration>
				</PeriodOfStay>
				<Rooms>'.$rooms.'
				</Rooms>
			</ChargeConditionsHotel>
		</SearchChargeConditionsRequest>
		</RequestDetails>
	</Request>';
	
	//echo $xml_data ;exit;
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
			$output1=curl_exec($ch);
			$errno = curl_getinfo( $ch, CURLINFO_HTTP_CODE );
			curl_close($ch);
			//echo $output1;exit;
			$data['cancel_data'] = $output1;
				
									
		//$refcode=date("YmdHis");
		$refcode='SOLACE'.time();
	$xml_data ='<?xml version="1.0" encoding="UTF-8"?>
	<Request xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="cbsapi.xsd">
		<Source>
			<RequestorID Client="'.$client.'" EMailAddress="'.$email.'" Password="'.$pass.'" />
			<RequestorPreferences Language="en" Currency="'.trim($costval).'">
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
						<Item Code="'.$hotelcode.'" />
						<HotelItem>
							<PeriodOfStay>
								<CheckInDate>'.$gta_cin.'</CheckInDate>
								<CheckOutDate>'.$gta_out.'</CheckOutDate>
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
			
			//echo $output;exit;
			
			
			$data['xml_data']=$output;		
			$checkin=$this->session->userdata('cin');
			$cout=$this->session->userdata('cout');
				$dom=new DOMDocument();
				$dom->loadXML($output);
				
				$ref_no=$dom->getElementsByTagName("BookingReference");
				$client_reference = $ref_no->item(0)->nodeValue;
				$api_reference = $ref_no->item(1)->nodeValue;
			   
				$api='gta';
				
				$bookingItemCode=$dom->getElementsByTagName("BookingItem");
					foreach($bookingItemCode as $cnno)
					{
						  $bookingItemCode1=$cnno->getElementsByTagName("ItemConfirmationReference");	
						  $bookingItemCodeval = $bookingItemCode1->item(0)->nodeValue;
						  
						  $ItemCity=$cnno->getElementsByTagName("ItemCity");
						  $hotel_city_code = $ItemCity->item(0)->getAttribute("Code");		
						  $hotel_city = $ItemCity->item(0)->nodeValue;
							   
						  $status=$cnno->getElementsByTagName("ItemStatus");	
						  $statusval = $status->item(0)->nodeValue;
						  
						  $HotelItem=$cnno->getElementsByTagName("HotelItem");
						  foreach($HotelItem as $hotel_item_val)
						  {
							  $HotelRooms=$hotel_item_val->getElementsByTagName("HotelRooms");
							  foreach($HotelRooms as $hotel_rooms_val)
							  {
								  $Description=$hotel_rooms_val->getElementsByTagName("Description");
								  $room_type = $Description->item(0)->nodeValue;
								   $PaxIds=$hotel_rooms_val->getElementsByTagName("PaxIds");
								   foreach($PaxIds as $paxid_val)
								   {
										$PaxId=$paxid_val->getElementsByTagName("PaxId");
										$pax = $PaxId->item(0)->nodeValue;
								   }
							  }
						  }
						  $Meals=$cnno->getElementsByTagName("Meals");
						  foreach($Meals as $meal_val)
						  {
							  $Basis=$meal_val->getElementsByTagName("Basis");
							  $inclusion = $Basis->item(0)->nodeValue;
						  }
							/*  $Breakfast=$meal_val->getElementsByTagName("Breakfast");
							foreach($PaxIds as $paxid_val)
							
							  $inclusion_condition = $Breakfast->item(0)->nodeValue;*/
							 
						 
					}
						
					$inclusion = trim($inclusion);
							
					$booked_amount_gta=$this->input->post('booked_amount_gta');
					$cancel_amount=$this->input->post('cancel_amount_gta');
					$canceldate=$this->input->post('canceldate');
					$remarks = $bal=$this->input->post('remarks');
					
					 $bal=$this->input->post('balance');
					 $credit_limit=$this->input->post('credit_limit');
					 $usedamt=$this->input->post('usedamt');
					
					$balance=$bal-$booked_amount_gta;	
					$credit_limit=$credit_limit-$booked_amount_gta;	
					$usedamt=$usedamt+$booked_amount_gta;
				
				$this->Agent_Model->agent_total_bal($agnt,$balance,$credit_limit,$usedamt);	
				
				$location = $this->input->post('location');
				$amend_status = $this->session->userdata('amend_status');
				
			   $gta_book=$this->Booking_Model->gta_booking($bookingItemCodeval,'gta',$statusval,$api_reference,$client_reference,$checkin,$cout,$hotelcode,$booked_amount_gta,$hname,$this->session->userdata('address'),$cancel_amount,$canceldate,$location,$amend_status,$remarks,$inclusion,$room_type,$pax,$hotel_city_code );
			 //  echo $gta_book;
		           $gta_re11=$this->Booking_Model->get_gtabooking_result_booking_new($gta_book);
				 //  print_r($gta_re11);exit;
				   $ref_no_new = $gta_re11->itemcode;
					$fname1=$this->input->post('fname');
					$lname1=$this->input->post('lname');
					$salutation1=$this->input->post('salutation');
					
					for($i=0;$i< count($fname1);$i++)
					{					
						$this->Booking_Model->add_paaanger_gta($gta_book,$fname1[$i],$lname1[$i],$salutation1[$i]);
					}
			
				   $cnt=$this->input->post('chil_cnt');
				   
				   if($cnt!=0){
					   
						/*$cfname=$this->input->post('cfname');
						$clname=$this->input->post('clname');
						$csalutation=$this->input->post('csalutation');
						$cage=$this->input->post('cage');*/
						$cfname='child';
						$clname='child';
						$csalutation='';
						$cage='5';
						
						for($k=0;$k< count($cfname);$k++)
						{
							$this->Booking_Model->add_pass_child_info($gta_book,$cfname[$i],$clname[$i],$csalutation[$i],$cage[$i]);
					}
					   
				   }
				   
		
		
	
		$api='gta';
		
		$data['gta_re']=$this->Booking_Model->get_gtabooking_result($gta_book);
		$data['acc_info']=$this->Agent_Model->accnt_information($agnt);	
		$childval=$this->session->userdata('child');		
		$data['child']=$childval;
		
		$this->booking_mail($gta_book);
		
		redirect('agent/thank_you/'.$ref_no_new,'refresh');					
	}
	function thank_you($bk_id)
	{
		$agnt=$this->session->userdata('agentid');	
		$data['a_id']=$this->session->userdata('agent_id');	
		$data['last_log']=$this->Agent_Model->agent_last_login($agnt);
		$data['acc_info']=$this->Agent_Model->accnt_information($agnt);
		$data['book_id']=$bk_id;
		 $this->load->view('header1',$data);
		 $this->load->view('booking/book_confirm',$data);
		 $this->load->view('footer');
	}
	function voucher_print($bk_id)
	{
	//	echo '<pre/>'; print_r($this->session->userdata);exit;
		$agnt=$this->session->userdata('agentid');	
		$data['a_id']=$this->session->userdata('agent_id');	
		$data['last_log']=$this->Agent_Model->agent_last_login($agnt);
		$data['acc_info']=$this->Agent_Model->accnt_information($agnt);
		
		$data['gta_re']=$gta_re=$this->Booking_Model->get_gtabooking_result($bk_id);
		$hotelcode = $gta_re->hotel_code;
		$city_code=$gta_re->countryPhonePrefix;
		if($_SERVER['HTTP_HOST']=='localhost' || $_SERVER['HTTP_HOST']=='192.168.0.128')
			{					
				
				/*$client="347";
				$email="XML.PROVAB@NORAMIX.COM";
				$pass="PASS"; // local
				$URL_det = "https://interface.demo.octopustravel.com/rbsukapi/RequestListenerServlet";//local*/
				$client="1184";
			 $email="XML.PROVAB@ITRAVELUKRAINE.COM";
			 $pass="PASS"; // local
			 $URL_det = "https://interface.demo.gta-travel.com/wbsapi/RequestListenerServlet";//local
			}
			else
			{
				$client="736";
				$email="kamal@solace.ae";	
				$pass="1001EVENTS"; // local 
				$URL_det='https://interface.gta-travel.com/gtaapi/RequestListenerServlet';
			}
	$hotel_det_data ='<?xml version="1.0" encoding="UTF-8"?>
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
				<ItemCode>'.$hotelcode.'</ItemCode>
			</SearchItemInformationRequest>
		</RequestDetails>
		</Request>';
		//echo $hotel_det_data;exit;
		$ch=curl_init();
        curl_setopt($ch, CURLOPT_URL, $URL_det);
        curl_setopt($ch, CURLOPT_TIMEOUT, 180);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $hotel_det_data);
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
        $det_out=curl_exec($ch);
        $errno = curl_getinfo( $ch, CURLINFO_HTTP_CODE );
        curl_close($ch);
		//print_r($det_out);exit;
		$dom=new DOMDocument();
		$dom->loadXML($det_out);			

			$item=$dom->getElementsByTagName("ItemDetails");
		
			foreach($item as $res)
			{
					$ThumbNail=$dom->getElementsByTagName("Image");
					$picture=$ThumbNail->item(0)->nodeValue;
					$Telephone=$dom->getElementsByTagName("Telephone");
					$tel=$Telephone->item(0)->nodeValue;
					$Fax=$dom->getElementsByTagName("Fax");
					$fax=$Fax->item(0)->nodeValue;
			}		
				
		$data['tel'] =$tel;
			$data['fax'] =$fax;		
		$data['ThumbNail'] =$picture;		
		 $this->load->view('header1',$data);
		 $this->load->view('agent_search/booking_result',$data);
		 $this->load->view('footer');
	}
	function send_voucher_mail()
	{
		$voucher_id = $this->input->post('res_id');
		$rules['sender_email']="required|valid_email";
		$rules['sender_name']="required";
		$rules['receiver_name']="required";
		$rules['receiver_email']="required|valid_email";


		$this->validation->set_rules($rules);

		$fields['sender_email']="Sender Email";
		$fields['sender_name']="Sender Name";
		$fields['receiver_name']="Receiver Name";
		$fields['receiver_email']="Receiver Email";

		$this->validation->set_fields($fields);

		if($this->validation->run()==FALSE)
		{
			redirect('agent/popup_voucher_mail/'.$voucher_id,'refresh');
		}
		else
		{
			$result_view=$this->Booking_Model->book_detail_view_voucher($voucher_id);

			$this->Booking_Model->popup_booking_mail($result_view);
			$data['email']='Email Sent';
			
			 $this->load->view('agent_search/popup_voucher_mail',$data);
		}
	}
	function popup_voucher_mail($bookid)
	{
		$data['email']='';
		$data['id']=$bookid;
		$this->load->view('agent_search/popup_voucher_mail',$data);
	}
	function test_mail()
	{
		require("PHPMailer/class.phpmailer.php");
		$mail = new PHPMailer();
		$mail->SMTPSecure = "ssl";
		$mail->Host='smtp.gmail.com';
		$mail->Port='465';
		$mail->Username   = 'sales@globalbooking.com';
		$mail->Password   = 'gbsalescolombo4';
		$mail->SMTPKeepAlive = true;
		$mail->Mailer = "smtp";
		$mail->IsSMTP();
		$mail->IsHTML(true);
		$body='test';
		$mail->AddReplyTo('support@solace.com',  'Provab');
		$email = 'janani.provab@gmail.com';
		$name = 'ruby';
		$mail->AddAddress($email);
		$mail->SetFrom('support@solace.com', 'Provab');
		$mail->Subject ='Booking Confirmation - provab';
		

		$mail->Body = $body;										
		$mail->SMTPAuth   = true;                 // enable SMTP authentication
		$mail->CharSet = 'utf-8';
		$mail->SMTPDebug  = 0;
		
		$mail->Send();
		
	}
	function booking_mail($id)
	{
		$agnt=$this->session->userdata('agentid');	
		$data['a_id']=$this->session->userdata('agent_id');	
		$data['last_log']=$this->Agent_Model->agent_last_login($agnt);
	
		$data['acc_info']=$acc_info=$this->Agent_Model->accnt_information($agnt);		
	
		$gta_re=$this->Search_Model->show_val($id);	
		
		$toemail=$acc_info->email;	
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
		$this->email->set_newline("\r\n");*/
				require("PHPMailer/class.phpmailer.php");
		$mail = new PHPMailer();
		$mail->SMTPSecure = "ssl";
		$mail->Host='smtp.gmail.com';
		$mail->Port='465';
		$mail->Username   = 'solace.holidays@gmail.com';
		$mail->Password   = 'solace123';
		$mail->SMTPKeepAlive = true;
		$mail->Mailer = "smtp";
		$mail->IsSMTP();
		$mail->IsHTML(true);
  $status= $gta_re->status;
		
		if($status=='Confirmed or Completed'  || $status=='Confirmed')
        {
            $vouch_title = 'Booking Voucher - Solace Holidays';
        }
        else if($status=='Pending Confirmation')
        {
            $vouch_title = 'Booking Status : Pending Confirmation - Solace Holidays';
        }
		else if($status=='Cancelled')
		{
			$vouch_title = 'Booking Status : Cancelled - Solace Holidays';
		}
  		$body='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
	@charset "utf-8";
	/* CSS Document */
	body{
	margin:0 0 0 0;
	padding:0 0 0 0;
	font-size:13px;
	}
	
	#main{
	width:800px;
	margin:0 auto;
	}
	.head{
	width:707px;
	float:left;
	padding:0 63px 0 30px ;
	height:207px;
	margin:15px 0 0 0;	
	}
	.logo_L{
	width:194px;
	margin:18px 0 0 0;
	float:left;
	height:177px;	
	}
	.logo_R{
	width:307px;
	float:right;
	font-size:24px;
	font-weight:bold;
	margin:162PX 0 0 0;
	height:25px;
	color: #666;
	}
	
	.contant{
	width:707px;
	float:left;
	padding:0 5px 0 5px ;
	background-image:url('.WEB_DIR.'images/cotant_bg.jpg);
	background-repeat:no-repeat;	
	}
	.table_01{
	width:683px;
	float:left;	
	margin:0 0 0 20px;
	}
	.row_01{
	width:683px;

	float:left;
	border-top:1px solid #000;
	border-right:none;
	border-left:1px solid #000;
	border-bottom:none;
	}
	.row_01_Ex{
	width:683px;

	float:left;
	border-top:1px solid #000;
	border-right:none;
	border-left:1px solid #000;
	border-bottom:1px solid #000;
	}
	.broder_R{
	border-right:1px solid #000;
	border-bottom:1px solid #000;
	}
	.broder_R_01{
	border-bottom:1px solid #000;
	}
	.padding_L{
	padding:2px 0 2px 10px;
	}
	
	.TEXT{
	width:683px;
	margin:15px 0 20px 0 ;

	float:left;
	}
	.TEXT_head{
	width:683px;
	text-align:center;
	font-size:18px;

	float:left;
	}
		.TEXT_head_01{
	width:332px;
	font-size:22px;
	font-weight:bold;

	float:left;
	text-align:left;
	}
			.TEXT_head_02{
	width:300px;
	font-size:22px;
	font-weight:bold;

	margin:0 auto;
	text-align:center;
	}
	.TEXT_02{
	width:683px;
	font-weight:bold;
	line-height:18px;

	padding:15px 0 25px 0 ;
	float:left;
	text-align:center;
	}
	.TEXT_03{
	width:683px;

	float:left;
	}
	.TEXT_03_L{
	width:175px;
	height:40px;
	font-weight:bold;
	text-align:center;
	line-height:22px;
	float:left;
	border-top:1px solid #000;
	}
		.TEXT_03_R{
	width:175px;
	height:40px;
	text-align:center;
	line-height:22px;
		border-top:1px solid #000;
	float:right;
	font-weight:bold;
	}
	@media print
{
.buttons{display:none;}

}
</style>
</head>

<body>

<div  id="main">
<div class="head">
    	<div style="width:194px;margin:18px 0 0 0;float:left;height:177px;"><img src='.WEB_DIR.'images/logo_voc.jpg" /></div>
        <div stye="width:307px;
	float:right;
	font-size:24px;
	font-weight:bold;
	margin:162PX 0 0 0;
	height:25px;
	color: #666;">
        '.$vouch_title.'
        </div>
  </div>
  <div style="width:707px;
	float:left;
	padding:0 5px 0 5px ;
	background-image:url('.WEB_DIR.'images/cotant_bg.jpg);
	background-repeat:no-repeat;"> 
  <div style="width:683px;
	float:left;	
	margin:0 0 0 20px;">
  <div  style="width:683px;
	text-align:center;
	font-size:18px;

	float:left;"><div style="width:332px;
	font-size:22px;
	font-weight:bold;

	float:left;
	text-align:left;
	"> CLIENT REF : '.$gta_re->ph.'<br/>
   BOOKING NO :'.$gta_re->itemcode.'
  </div>
 
  </div>
  	<div style="width:683px;

	float:left;
	border-top:1px solid #000;
	border-right:none;
	border-left:1px solid #000;
	border-bottom:none;">
    <table width="683" border="0" align="center" cellpadding="0" cellspacing="0">';
	  
	  $paxname=$this->Booking_Model->get_paxname($gta_re->booking_no);
  $cntadult=count($paxname) ;
 $body.='
  <tr>
    <td width="341" style="border-right:1px solid #000;
	border-bottom:1px solid #000;padding:2px 0 2px 10px;"><b>Lead Name:';
      foreach($paxname as $get_guest_ac)
	   { 
	  
      	$body.=$get_guest_ac->fname.''.$get_guest_ac->lname;
      } 
	  $body.='
</b></td>
    <td width="342" style="border-right:1px solid #000;
	border-bottom:1px solid #000;padding:2px 0 2px 10px;"><b>Nationality: '.$acc_info->state.'</b></td>
   
  </tr>
  <tr>
    <td width="341" style="border-right:1px solid #000;
	border-bottom:1px solid #000;padding:2px 0 2px 10px;"><b>Telephone/ fax /E-mail: '.$acc_info->mobile.'/'.$acc_info->email.'</b></td>
    <td width="342" style="border-right:1px solid #000;
	border-bottom:1px solid #000;padding:2px 0 2px 10px;"><b>Address / Companay:'.$acc_info->company_name.'</b></td>
   
  </tr>
  
</table>

    		
    </div>
    
    
    <div  style="margin:20px 0 0 0;width:683px;
	text-align:center;
	font-size:18px;

	float:left;">
      <div style="width:300px;
	font-size:22px;
	font-weight:bold;

	margin:0 auto;
	text-align:center;" >   ACCOMMODATION CNFMN</div></div>
    <div style="width:683px;
	float:left;
	border-top:1px solid #000;
	border-right:none;
	border-left:1px solid #000;
	border-bottom:none;"><table width="683" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="344" valign="top" style="border-right:1px solid #000;
	border-bottom:1px solid #000;padding:2px 0 2px 10px;">
	<br />
	
	<b>';
	 $hname= $this->Booking_Model->get_hotel_name($gta_re->hotel_code); 
	 $body.=$hname->hotel_name.'</b><br/>
	<br/>
    	
        <b></b><br/>
       <br/>
<br/>

<br/>
<b>Phone:</b><br/>
<b>Fax </b></td>
	 
   <td width="344" valign="top" style="border-right:1px solid #000;
	border-bottom:1px solid #000;padding:2px 0 2px 10px;"><b>Passenger Name</b><br/><br/>';
    	
      foreach($paxname as $get_guest_ac)
	   { 
	   		$body.=$get_guest_ac->fname.''.$get_guest_ac->lname;    
       
       } 
	   $body.='
       <br/>
        <br/>
<br/>
<br/>
<br/><br/>
<b></b><br/>
<b> </b>    </td>
  </tr>
  <tr>
    <td width="344" style="border-right:1px solid #000;
	border-bottom:1px solid #000;padding:2px 0 2px 10px;"><b>Room Type:</b>'.$gta_re->room_type.'</td>
    <td width="339" style="border-right:1px solid #000;
	border-bottom:1px solid #000;padding:2px 0 2px 10px;">
<b>Meal Basis:</b>'.$gta_re->inclusion.'</td>
  </tr>
  <tr>
    <td width="344" style="border-right:1px solid #000;
	border-bottom:1px solid #000;padding:2px 0 2px 10px;"><b>Check-in-date </b>'.$gta_re->check_in.'</td>
    <td width="339" style="border-right:1px solid #000;
	border-bottom:1px solid #000;padding:2px 0 2px 10px;"><b>Check out date:</b>'.$gta_re->check_out.'</td>
  </tr>
   <tr>
    <td width="344" style="border-right:1px solid #000;
	border-bottom:1px solid #000;padding:2px 0 2px 10px;"><b>Number of nights:</b>'; 
	$diff = strtotime($gta_re->check_out) - strtotime($gta_re->check_in);
	
	$sec   = $diff % 60;
	$diff  = intval($diff / 60);
	$min   = $diff % 60;
	$diff  = intval($diff / 60);
	$hours = $diff % 24;
	$days  = intval($diff / 24);
	$nights=$days;
	$body.=$nights.' nights</td>
    <td width="339" style="border-right:1px solid #000;
	border-bottom:1px solid #000;padding:2px 0 2px 10px;"><b>Number of Rooms:</b>'.$gta_re->no_of_room.'</td>
  </tr>
  <tr>
    <td width="344" style="border-right:1px solid #000;
	border-bottom:1px solid #000;padding:2px 0 2px 10px;"><b>Booking Status:</b>'.$gta_re->status.'</td>
   
  </tr>
 
</table>

    		
    </div>
    <div  style="margin:15px 0 15px 0;width:683px;
	text-align:center;
	font-size:18px;

	float:left;">
    <div style="width:332px;
	font-size:22px;
	font-weight:bold;

	float:left;
	text-align:left;">ADDITIONAL REQUEST:</div>
    <table width="683" border="0" class="row_01" cellspacing="0" cellpadding="0">
  <tr style="width:683px;

	float:left;
	border-top:1px solid #000;
	border-right:none;
	border-left:1px solid #000;
	border-bottom:none;">
    <td width="341" style="border-right:1px solid #000;
	border-bottom:1px solid #000;padding:2px 0 2px 10px;">'.$gta_re->booking_remarks.'</td>
    <td width="341"  style="border-right:1px solid #000;
	border-bottom:1px solid #000;padding:2px 0 2px 10px;">&nbsp;</td>
  </tr>
    </table>

    </div>
    <div class=""><table width="683" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="297" style="padding:2px 0 2px 10px;"><b></b></td>
    <td width="386" style="padding:2px 0 2px 10px;"><b> </b></td>
   
  </tr>
  
  
</table>
    </div>
    
      
      <div style="padding:50px 0 20px 0; text-align:center;font-weight:bold;width:683px;float:left;">
      			Solace Online LLC<br/>
office Tel: + 971 4 3573447, Fax: +97143573347, P.O. Box: 31673,Dubai,Uae<br/>
Email:info@solace.ae, WEB:http://www.solace.ae
                
      </div>
    
  </div>
   </div>
</div>
</body>
</html>
';
//  echo $body;exit;
$status= $gta_re->status;
		if($status=='Confirmed or Completed'  || $status=='Confirmed')
        {
            $vouch_title = 'Booking Voucher - Solace Holidays';
        }
        else if($status=='Pending Confirmation')
        {
            $vouch_title = 'Booking Status : Pending Confirmation - Solace Holidays';
        }
		else if($status=='Cancelled')
		{
			$vouch_title = 'Booking Status : Cancelled - Solace Holidays';
		}
		$mail->AddReplyTo('solace.holidays@gmail.com',  'solace');
		$mail->AddAddress($toemail);
		
		$mail->SetFrom('solace.holidays@gmail.com', 'solace');
		$mail->Subject =$vouch_title;
		

		$mail->Body = $body;										
		$mail->SMTPAuth   = true;                 // enable SMTP authentication
		$mail->CharSet = 'utf-8';
		$mail->SMTPDebug  = 0;
		
		$mail->Send();
		
  		/*$this->email->from('support@solace.com', 'Solace Holidays');
		$to = strip_tags($toemail);
		$this->email->to($to);
		$this->email->subject($vouch_title);
		$this->email->message($body);

  		$this->email->send();	*/
	
    }
	
    function search_booking_view()
	{	
		//print_r($_POST);exit;
		$agnt=$this->session->userdata('agentid');	
		$data['a_id']=$this->session->userdata('agent_id');	
		$data['last_log']=$this->Agent_Model->agent_last_login($agnt);
		
		$data['acc_info']=$this->Agent_Model->accnt_information($agnt);		 
		
		$in=explode("/",$this->input->post('sd'));
		$cin=$in[2]."-".$in[1]."-".$in[0];	 
		
		$out=explode("/",$this->input->post('ed'));
		$cout=$out[2]."-".$out[1]."-".$out[0];
		$data['agnt']=$this->session->userdata('agentid');	
		
		$type =$this->input->post('type2');
		
		$data['report']=$this->Agent_Model->search_booking_view($type,$cin,$cout);	
		$data['type'] =$type;
		//echo "<pre/>";print_r($data);exit;
		$this->load->view('header1',$data);
		$this->load->view('agent_search/search_booking_view',$data);
		$this->load->view('footer');
	
	}	
	
	function search_voucher($id)
	{
		$agnt=$this->session->userdata('agentid');	
		$data['a_id']=$this->session->userdata('agent_id');	
		$data['last_log']=$this->Agent_Model->agent_last_login($agnt);
		$data['acc_info']=$this->Agent_Model->accnt_information($agnt);	 
		$data['agnt']=$this->session->userdata('agentid');	
		//echo $id;	
		$data['res']=$this->Agent_Model->search_voucher($id);	
	
		 $this->load->view('agent_search/header',$data);
		 $this->load->view('agent_search/search_voucher_result',$data);
		 $this->load->view('agent_search/footer');
	
	}
	
	function show_search_booking()
	{
	
		 $agnt=$this->session->userdata('agentid');	
	 
		$data['a_id']=$this->session->userdata('agent_id'); // for unique agentid

		$data['last_log']=$this->Agent_Model->agent_last_login($agnt); // gets last login 
		
		$data['acc_info']=$this->Agent_Model->accnt_information($agnt); // display acct info

		$this->load->view('agent_search/header',$data);
	
		$this->load->view('agent_home/search_booking',$data);
		$this->load->view('agent_search/footer');
	
	
	}	
	
    function showcommission()
	{
		$agnt=$this->session->userdata('agentid');	
	 
		$data['a_id']=$this->session->userdata('agent_id'); // for unique agentid

		$data['last_log']=$this->Agent_Model->agent_last_login($agnt); // gets last login 
		
		$data['acc_info']=$this->Agent_Model->accnt_information($agnt); // display acct info

		$data['commission']=$this->Agent_Model->show_commission($agnt);
		
		$this->load->view('agent_search/header',$data);
	
		$this->load->view('agent_search/show_commission',$data);
		$this->load->view('agent_search/footer');
	}		
	
	function cancel_booking_view()
	{
		$agnt=$this->session->userdata('agentid');	
		$data['a_id']=$this->session->userdata('agent_id');	
		$data['last_log']=$this->Agent_Model->agent_last_login($agnt);
	
		$data['acc_info']=$this->Agent_Model->accnt_information($agnt);		 
				
		 //$sd=$this->input->post('sd');
		// $ed=$this->input->post('ed');
		 
				
		$data['agnt']=$this->session->userdata('agentid');		
		
		$data['report']=$this->Agent_Model->search_cancel_view();
		$this->load->view('agent_search/header',$data);
		$this->load->view('agent_search/cancel_booking',$data);
		$this->load->view('agent_search/footer');		
	
	}	
	
	function cancel_booking($id)
	{
		
		$agnt=$this->session->userdata('agentid');	
		$data['a_id']=$this->session->userdata('agent_id');	
		$data['last_log']=$this->Agent_Model->agent_last_login($agnt);
	
		$data['acc_info']=$acc_info=$this->Agent_Model->accnt_information($agnt);		
	
		$res=$this->Search_Model->show_val($id);
		//echo "<pre/>";print_r($res);exit;
		$api=$res->api;
		$bookcode=$res->booking_ref_no;
		$itemcode=$res->itemcode;
		$data['api']=$res->api;
		$cancel_date = date('Y-m-d', strtotime($res->cancel_fromdate));
		$today_date = date('Y-m-d');
		$cancel_amount=$res->cancel_amount;
		$book_amount=$res->amount;
		$Total_Bal=$acc_info->Total_Bal;
		$current_limit = $acc_info->current_limit;
		$usedamt = $acc_info->usedamt;
		$cost=$res->currency_type;
		$bookcodesolace=$res->ph;
		//echo $bookcodesolace;
		//$cost=$this->session->userdata('costtype');
		$data['costtype']=$cost;


		$costval="$cost";
		if($_SERVER['HTTP_HOST']=='localhost' || $_SERVER['HTTP_HOST']=='192.168.0.128')
		{	
			if($cost=='AED')
			{
				$costval='GBP';
			}
			else
			{
				$costval="$cost";
			}
		}
		else
		{
			$costval="$cost";
		}
		
 	

		if($_SERVER['HTTP_HOST']=='localhost' || $_SERVER['HTTP_HOST']=='192.168.0.128')
		{					
			
				/*$client="347";
					$email="XML.PROVAB@NORAMIX.COM";
					$pass="PASS"; // local
					$URL = "https://interface.demo.octopustravel.com/rbsukapi/RequestListenerServlet"; //local*/
					
					$client="1184";
			 $email="XML.PROVAB@ITRAVELUKRAINE.COM";
			 $pass="PASS"; // local
			 $URL = "https://interface.demo.gta-travel.com/wbsapi/RequestListenerServlet";//local
		}
		else
		{
			$client="736";
			$email="kamal@solace.ae";	
			$pass="1001EVENTS"; // local 
			$URL='https://interface.gta-travel.com/gtaapi/RequestListenerServlet';
		}
	
	
		

$xml_data ='<?xml version="1.0" encoding="UTF-8"?>
<Request>
 <Source>
  <RequestorID Client="'.$client.'" EMailAddress="'.$email.'" Password="'.$pass.'" />
  <RequestorPreferences Language="en" Currency="'.$costval.'">
   <RequestMode>SYNCHRONOUS</RequestMode>
  </RequestorPreferences>
 </Source>
 <RequestDetails>
  <CancelBookingItemRequest>
   <BookingReference ReferenceSource="client">'.$bookcodesolace.'</BookingReference>
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
//echo $output;
		    $dom=new DOMDocument();
			$dom->loadXML($output);

			
		/*$BookingStatus=$dom2->getElementsByTagName("BookingStatus");
		$cancel_status=$BookingStatus->item(0)->nodeValue;
*/
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
	//echo $statusval."<br>";
		 $update_status=$this->Booking_Model->Update_cancel_status_agent($statusval,$id);
		$data['xml_data']=$output;
		$data['book_id'] = $itemcode;
		
		if(strtotime($today_date)< strtotime($cancel_date))
		{
		//	echo $cancel_amount;
			
			$balance = $Total_Bal + $book_amount;
			$credit_limit = $current_limit + $book_amount;
			$usedamt = $usedamt - $book_amount;
			$this->Agent_Model->agent_total_bal($agnt,$balance,$credit_limit,$usedamt);
			//$this->Agent_Model->cancel_total_bal($agnt,$Total_Bal);
		}
		else
		{
			
			$balance = $Total_Bal + $cancel_amount;
			$credit_limit = $current_limit + $cancel_amount;
			$usedamt = $usedamt - $cancel_amount;
			$this->Agent_Model->agent_total_bal($agnt,$balance,$credit_limit,$usedamt);
		}
		//exit;
		//$this->Agent_Model->Update_cancel_status('Cancelled',$id);
		redirect('agent/gta_cancel_confirm/'.$id,'refresh');
		

	
	}
	function gta_cancel_confirm($id)
	{
		$agnt=$this->session->userdata('agentid');	
		$data['a_id']=$this->session->userdata('agent_id');	
		$data['last_log']=$this->Agent_Model->agent_last_login($agnt);
	
		$data['acc_info']=$acc_info=$this->Agent_Model->accnt_information($agnt);		
	
		$data['gta_re']=$res=$this->Search_Model->show_val($id);	
		$data['book_id']=$res->itemcode;
		$this->booking_mail($id);
		$this->load->view('header1',$data);
		$this->load->view('booking/cancel_confirm',$data);
		$this->load->view('agent_search/footer');	
	}
	function load()
	{
	
	session_start();		
	$sec_res=session_id(); 
	$this->session->unset_userdata('hot_name');
	
	//echo $sec_res;
		$this->Search_Model->delete_search_result($sec_res);
		//DELETE 1Hr old record
		$this->Search_Model->delete_one_hr();
	//$this->Search_Model->delete_book_result($sec_res);	

	$data['citycode']=$this->input->post('cityval');
	$data['disp_city']=$this->input->post('cityval');	
	$data['sd']=$this->input->post('sd');
	$data['ed']=$this->input->post('ed');
	$data['noofroom']=$this->input->post('noofroom');
	$data['roomusedtype']=$this->input->post('roomusedtype');
	
	$data['childage']=$this->input->post('childage1');
	$data['childage2']=$this->input->post('childage2'); 
	
	$data['childage3']=$this->input->post('childage3');
	$data['childage4']=$this->input->post('childage4');
	$data['available']=$this->input->post('available');	
	
	$data['roomcount']=$this->input->post('roomcount');	
	$data['costtype']=$this->input->post('costtype');
	$hotelname=$this->input->post('hotelval');
	
	if($hotelname!='')
			{
				$data['hotelname'] = $hotelname;
				$this->session->set_userdata(array('hot_name'=>$data['hotelname']));
			}
	
	$this->session->set_userdata(array('roomusedtype'=>$data['roomusedtype'],'childage'=>$data['childage'],'childage2'=>$data['childage2'],'roomcount'=>$data['roomcount'],'childage3'=>$data['childage3'],'childage4'=>$data['childage4'],'noofroom'=>$data['noofroom'],'sec_res'=>$sec_res,'available'=>$data['available']));
	$this->load->view('agent_search/load',$data);
	
	}
	
		function searchbyhotel($d){
	
			//$q = $_POST['queryString'];
			//echo $q;
			$sec_res=$this->session->userdata('sec_res');	
			$q=$d;
			$hotel_list=$this->Search_Model->searchbyhotel($q,$sec_res);
			//var_dump($data);
			if(isset($hotel_list))
			{ 
			if($hotel_list !='')
			{
			

				foreach($hotel_list as $row)
				{
				echo '<li type="none" onClick="fill1(\''.$row->hotel_name.'\');" >'.$row->hotel_name.'</li>';
				//echo '<li type="none" onClick="fill1(\''.$row->cityCode.'\');">'.$row->cityCode.'</li>';
				}
			
			}
			}
		}	
			
function hotel_result()
	{

			
			$data['disp_city']=$this->session->userdata('disp_city');

		
			$data['cost']=$this->session->userdata('cost');
			$data['costtype']=$this->session->userdata('costtype');
			  
			$data['star']='all';
			$cin=$this->input->post('cin');
			$cout=$this->input->post('cout');
			$nor=$this->input->post('nor');
			$rtype=$this->input->post('rtype');
			$city=$this->input->post('city');
			$room=$this->input->post('room');
			$adult=$this->input->post('adult');
			$child=$this->input->post('child');
			$hotel=$this->input->post('hotelval');
			$data['cin']=$cin;
			$data['cout']=$cout;
			//$data['star']=$star;
			$data['nor']=$nor;
			$data['rtype']=$rtype;
			$data['city']=$city;
			$noofroom=$nor;
			$roomusedtype=$rtype;
			
		  		$diff = strtotime($cout) - strtotime($cin);
	
				$sec   = $diff % 60;
				$diff  = intval($diff / 60);
				$min   = $diff % 60;
				$diff  = intval($diff / 60);
				$hours = $diff % 24;
				$days  = intval($diff / 24);
				$data['dt']=$days;
				$data['room']=$room;
				$data['adult']=$adult;
				$data['child']=$child;
		  
		  
				$data['a_id']=$this->session->userdata('agent_id');	
			
				$agnt=$this->session->userdata('agentid');		
				
			
				
				$data['last_log']=$this->Agent_Model->agent_last_login($agnt);
			
				$data['acc_info']=$this->Agent_Model->accnt_information($agnt);			
			
			  	$sec_res=$this->session->userdata('sec_res');	
				$sresult=$this->Search_Model->get_search_result_hotel($sec_res,$hotel);
				if($sresult!=''){
				foreach($sresult as $row){
					$cityNamesvalue[]=$row->city_name;
					$hotelCodevalue[]=$row->hotel_id;
					$hotelNamesvalue[]=$row->hotel_name;
					$categoryCodevalue[]=$row->star_rate;
					$pricePerNightvalue[]=$row->nightperroom;
					$RoomCostvalue1[]=$row->cost_value;
					$RoomCost[]=$row->cost_type;
					$apiNameValue[]=$row->api_name;
					$roomtypeValue[]=$row->room_type;
					$inclusionValue[]=$row->inclusion;
				}
				$data['criteria_id']=$sec_res;
				$data['hotelCodevalue']=$hotelCodevalue;

				$data['apiNameValue']=$apiNameValue;
				$data['hotelNamesvalue']=$hotelNamesvalue;
				$data['categoryCodevalue']=$categoryCodevalue;
				$data['pricePerNightvalue']=$pricePerNightvalue;
				$data['RoomCostvalue1']=$RoomCostvalue1;
		  		$data['RoomCost']=$RoomCost;
		  		$data['cityNamesvalue']=$cityNamesvalue;
				$data['roomtypeValue']=$roomtypeValue;
				$data['inclusionValue']=$inclusionValue;
				
	
					
				$this->load->view('agent_search/search_result',$data);	
		  	//$this->load->view('footer');
		}
					else
			{
			$this->load->view('agent_search/search_result',$data);	
			}
	
	
	}
	
	function price_breakup($reult_id)
	{
	   $result=$this->Search_Model->price_breakup($reult_id);	
	   
	   $cost=$this->session->userdata('costtype');
	   if($_SERVER['HTTP_HOST']=='localhost' || $_SERVER['HTTP_HOST']=='192.168.0.128')
	   {
			if($cost=='AED')
			{
				$costval='GBP';
			}
			else
			{
				$costval="$cost";
			}
	   }
	   else
		{
			$costval="$cost";
		}
	   
	  $hotelcode=trim($result->hotel_id);
	  $room=trim($result->location);
	  $city=trim($result->city_name);
	  

	   $cin=$this->session->userdata('cin');
	  
	   $days=$this->session->userdata('dt');
	   
  	   
	   $data['hotel_name']=trim($result->hotel_name);
       	$sess_city = explode(',',$this->session->userdata('disp_city'));
		$data['city_name']=trim($sess_city[1]);
	   $data['cin']=$cin;
	   $data['days']=$days;
	  
			$roomusedtypeval=$this->session->userdata('roomusedtype');	
			$roomcount=$this->session->userdata('roomcount');

$roomCode='';
$rooms='';
$room1='';
for($i=0;$i< count($roomusedtypeval);$i++)
{

		if($roomusedtypeval[$i]=='1')
		{
		$roomCode = 'SB';	
		$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$roomcount[$i].'" Id="'.trim($room).'"></Room>';			
		}
		elseif($roomusedtypeval[$i]=='3')
		{
		$roomCode = 'DB'; //'db';
		$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$roomcount[$i].'" Id="'.trim($room).'"></Room>';				
		}
		elseif($roomusedtypeval[$i]=='9')
		{
		$roomCode = 'Q'; //'db';	
		$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$roomcount[$i].'" Id="'.trim($room).'"></Room>';			
		}
		elseif($roomusedtypeval[$i]=='6')
		{
		$roomCode = 'TB'; //'db';	
		$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$roomcount[$i].'" Id="'.trim($room).'"></Room>';			
		}
		elseif($roomusedtypeval[$i]=='5')
		{
		$roomCode = 'TS'; //'db';
		$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$roomcount[$i].'" Id="'.trim($room).'"></Room>';				
		}
		elseif($roomusedtypeval[$i]=='8')
		{
		$roomCode = 'TR'; //'db';
		$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$roomcount[$i].'" Id="'.trim($room).'"></Room>';				
		}
		elseif($roomusedtypeval[$i]=='4')
		{
		$roomCode = 'DB'; //'db';	

				if($roomcount[$i]=='2')
				{
					$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$roomcount[$i].'" Id="'.trim($room).'">
								<ExtraBeds>
									<Age>5</Age>
									<Age>7</Age>
								</ExtraBeds>
								
							</Room>';				
				}else{
					$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$roomcount[$i].'" Id="'.trim($room).'">
								<ExtraBeds>
									<Age>5</Age>
								</ExtraBeds>
								
							</Room>';	
					}	
		
		}
		elseif($roomusedtypeval[$i]=='7')
		{
		$roomCode = 'TB'; //'db';	

				if($roomcount[$i]=='2')
				{
					$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$roomcount[$i].'" Id="'.trim($room).'">
								<ExtraBeds>
									<Age>5</Age>
									<Age>7</Age>
								</ExtraBeds>
								
							</Room>';				
				}else{
					$room1.='<Room Code="'.$roomCode.'" NumberOfRooms="'.$roomcount[$i].'" Id="'.trim($room).'">
								<ExtraBeds>
									<Age>5</Age>
								</ExtraBeds>
								
							</Room>';	
					}	
		
		}	
		else
		{
			
		}

}

$rooms=$room1;	  
if($_SERVER['HTTP_HOST']=='localhost' || $_SERVER['HTTP_HOST']=='192.168.0.128')
{					
	
	$client="347";
			$email="XML.PROVAB@NORAMIX.COM";
			$pass="PASS"; // local
			$URL2 = "https://interface.demo.octopustravel.com/rbsukapi/RequestListenerServlet"; //local
}
else
{
	$client="736";
	$email="kamal@solace.ae";	
	$pass="1001EVENTS"; // local 
	$URL2='https://interface.gta-travel.com/gtaapi/RequestListenerServlet';
}


$requestData = '<?xml version="1.0" encoding="UTF-8"?>
		<Request>
		  <Source>
		<RequestorID Client="'.trim($client).'" EMailAddress="'.trim($email).'" Password="'.trim($pass).'" />
			<RequestorPreferences Language="en" Currency="'.$costval.'">
				  <RequestMode>SYNCHRONOUS</RequestMode> 
			</RequestorPreferences>
		  </Source>
			<RequestDetails>
				<HotelPriceBreakdownRequest>
					<City>'.$city.'</City>
					<Item>'.$hotelcode.'</Item>
					<PeriodOfStay>
						<CheckInDate>'.$cin.'</CheckInDate>
						<Duration>'.$days.'</Duration>
					</PeriodOfStay>
					<Rooms>'.$rooms.'
					</Rooms>
				</HotelPriceBreakdownRequest>
			</RequestDetails>
		</Request>';
		
			//echo $requestData;exit;
					//$URL2 = "https://interface.demo.gta-travel.com/wbsapi/RequestListenerServlet";
					//$URL2 = "https://interface.gta-travel.com/gtaapi/RequestListenerServlet";
					
				
		 
				$ch2=curl_init();
				curl_setopt($ch2, CURLOPT_URL, $URL2);
				curl_setopt($ch2, CURLOPT_TIMEOUT, 180);
				curl_setopt($ch2, CURLOPT_HEADER, 0);
				curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch2, CURLOPT_POST, 1);
				curl_setopt($ch2, CURLOPT_POSTFIELDS, $requestData);
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
				//echo'<pre/>';print_r($data2);exit;
				$data['price']=$data2;
				
				
			$this->load->view('agent_search/price_breakup',$data);	

			}	
			
			//dotw price breakup starts here
		function dotw_price_breakup($reult_id)
		{
			
		   $result=$this->Search_Model->dotw_get_hotelid($reult_id);
		   $data['hotel_id']=trim($result->hotel_id);
		   $this->load->view('agent_search/dotw_price_breakup',$data);	
		}
			//ends here	
		function show_invoice($id)
		{
			$agnt=$this->session->userdata('agentid');	
			$data['a_id']=$this->session->userdata('agent_id');	
			$data['last_log']=$this->Agent_Model->agent_last_login($agnt);
			$data['acc_info']=$this->Agent_Model->accnt_information($agnt);		
			$data['result_view']=$result_view=$this->Booking_Model->book_detail_view_voucher($id);  
			$data['paxname']=$this->Booking_Model->get_paxname($id);
			
			$this->load->view('agent_search/booking_invoice',$data);
		}
}