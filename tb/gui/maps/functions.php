<?php





function getAirports($countryCode, $airports = array())
{
	$uReg = array();
	$airportsSelect = "\n<select id=\"airports\">\n";
	foreach($airports as $k => $v)
	{
		if(!in_array($v[airport][name],$uReg))
		{
			$uReg[] = $v[airport][name];
			 
			if($v[country][code]== $countryCode)
			{
				//echo  $v[region][code] ." ~~ ". $v[country][name]. " ~~ ". $v[country][code];
		
				$airportsSelect .= "\n<option value='".$v[airport][code]."'>".$v[airport][name]."</option>";
			}
		}
	}  
	$airportsSelect .= "\n</select>";
	
	return $airportsSelect;
}





function getCountries($regionCode, $airports = array())
{
	$uReg = array();
	$countriesSelect = "\n<select id=\"countries\">\n";
	foreach($airports as $k => $v)
	{
		if(!in_array($v[country][name],$uReg))
		{
			$uReg[] = $v[country][name];
			 
			if($v[region][code]== $regionCode)
			{
				//echo  $v[region][code] ." ~~ ". $v[country][name]. " ~~ ". $v[country][code];
		
				$countriesSelect .= "\n<option value='".$v[country][code]."'>".$v[country][name]."</option>";
			}
		}
	}  
	$countriesSelect .= "\n</select>";
	
	return $countriesSelect;
	
	
}

function readCSV($fname = "")
{
	
	
	
	
	
	$fname = "airportsFile/airports_betaNEW.csv";
	
	
	/* $airports	=	array ( "region"  => array('name' => 'Europe', 'code' => 'eu'),
							"country" => array('name' => 'Greece', 'code' => 'GR'),
							"airport" => array('name' => 'Αθήνα - Eleftherios Venizelos (ATH)', 'code' => 'ATH');
	*/
	$airports = array();  // city, country code, region, country, '', airport, airport code 
	$helper = array();
	if (($handle = fopen($fname, "r")) !== FALSE) {
		while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
			$num = count($data);
		
		
			$regionArr = array( 'Africa'  => 'af',
								'Asia' 	=> 'as',
								'Caribbean' => 'cr',
								'Central America' => 'ca',	
								'Europe' => 'eu',
								'North America' => 'na',
								'Oceania'  => 'oc',
								'South America'  => 'sa'
							   );
		
		
			for ($c=0; $c < $num; $c++) {
				
				$helper = explode(';',$data[$c]);
				/*if($regionArr["$helper[2]"]=='eu' && $helper[1]=='GR')
				//{*/
				$airports[] =	array ( "region"  => array('name' => $helper[2], 'code' => $regionArr["$helper[2]"]),
										"country" => array('name' => $helper[3], 'code' => $helper[1]),
										"airport" => array('name' => $helper[5], 'code' => $helper[6]) );
				//echo "$data[$c]\n";						
				//}
				
			}
		}
		fclose($handle);
	}
	
	return $airports;
	
	
		
}





function getRegion($region="",$json)
{
	$jsonObj = json_decode($json);
	//die(print_r($jsonObj));
	
	$regionsArr = array(); // 0 => array ( "code" => "gr", name => "Greece" )
	$airports = readCSV();
	
	//print_r($airports);
	
	foreach($airports as $k => $v)
	{
		if($v[region][code]==$region)
		{
			$flag=true;
			foreach($regionsArr as $k2 => $v2)
			{
				if($v2[code] == $v[country][code])
				{
					$flag=false;
					break;
				}
			}
			if($flag)
			$regionsArr[] = array(  "code" => $v[country][code], "name" => $v[country][name]  );
		}
	}
	
	$regionJsonObj = new stdClass();
	
	//print_r($regionsArr);
	foreach($regionsArr as $k3 => $v3)
	{
	
		$flag=false;
		foreach($jsonObj->pathes as $id => $obj2)
		{
	 		if(mb_strtolower($v3[name],'UTF-8') == mb_strtolower($obj2->name,'UTF-8'))
			{
				$flag = true;
				$regValObj =  new stdClass();
				$innerObj = new stdClass();
				$myId = $v3[code];
				
				$innerObj->path = $obj2->path;
				$innerObj->name = $obj2->name;
				$regionJsonObj->pathes->$myId = $innerObj;
			}
		}
		if(!$flag)
		echo "$v3[name] not found\n";
	}
	echo "\n\n ---------------------------------- \n\n";
	
	foreach($jsonObj->pathes as $id => $obj2)
	{
		echo "$obj2->name \n";
	}
		
	print_r(json_encode($regionJsonObj));
	
	

}