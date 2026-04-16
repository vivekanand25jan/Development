<?php
//example for files out of pages dir
//$filepath = preg_replace('/\\\pages/','',dirname(__FILE__)) ;
//$file = $filepath[1] .	dirname(__FILE__) . "\ajaxContent\ariports.csv";


if(isset($_GET['ajax']) && is_numeric($_GET['ajax']) && $_GET['ajax'] == 1 )
{	
	if(isset($_GET['city'])) 
	{

		$data = array("Athens ,Greece El Venizelos (ATH)" => "ATH",
					  "Larnaca, Cyprus Larnaca (LCA)" => "LCA",
					  "Frankfurt, German Frankfurt (FRA)" => "FRA",
					  "Αθήνα, 1 (ATH)" => "ATH1",
					  "Αθήνα, 2 (ATH)" => "ATH2",
					  "Αθήνα, 3 (ATH)" => "ATH3",
		              "Αθήνα, 4 (ATH)" => "ATH1",
					  "Αθήνα, 5 (ATH)" => "ATH2",
					  "Αθήνα, 6 (ATH)" => "ATH3",
		              "Αθήνα, 7 (ATH)" => "ATH1",
					  "Αθήνα, 8 (ATH)" => "ATH2",
					  "Αθήνα, 9 (ATH)" => "ATH3",
		              "Αθήνα, 10 (ATH)" => "ATH1",
					  "Αθήνα, 11 (ATH)" => "ATH2",
					  "Αθήνα, 12 (ATH)" => "ATH3",
		              "Αθήνα, 13 (ATH)" => "ATH1",
					  "Αθήνα, 14 (ATH)" => "ATH2",
					  "Αθήνα, 15 (ATH)" => "ATH3",
				      "Αθήνα, 16 (ATH)" => "ATH1",
					  "Αθήνα, 17 (ATH)" => "ATH2",
					  "Αθήνα, 18 (ATH)" => "ATH3",
					  "Αθήνα, 19 (ATH)" => "ATH1",
					  "Αθήνα, 20 (ATH)" => "ATH2",
					  "Αθήνα, 21 (ATH)" => "ATH3",
					  "Αθήνα, 22 (ATH)" => "ATH1",
					  "Αθήνα, 23 (ATH)" => "ATH2",
					  "Αθήνα, 24 (ATH)" => "ATH3"
		
		);								

		

		//$q = iconv(mb_strtolower(urldecode($_GET["city"])));
		$q = mb_strtolower(urldecode($_GET["city"]), 'UTF-8');	
		if (!$q) return;
		foreach ($data as $key=>$value) {
			if (strpos(mb_strtolower($key, 'UTF-8'), $q) !== false || strpos(mb_strtolower($value, 'UTF-8'), $q) !== false)
				echo "$key|$value\n";
		}
	}
}
else if(isset($_GET['ajax']) && is_numeric($_GET['ajax']) && $_GET['ajax'] == 2 )
{
	if(isset($_GET['city'])) 
	{

		$data = array( "eu" => array( "Albania",
						"Armenia",
						"Austria",
						"Azerbaijan",
						"Belarus",
						"Belgium",
						"Bosnia & Herzegovina",
						"Bulgaria",
						"Croatia",
						"Cyprus",
						"Czech Republic",
						"Denmark",
						"Estonia",
						"Finland",
						"France",
						"Fyrom",
						"Georgia",
						"Germany",
						"Greece",
						"Greenland",
						"Hungary",
						"Iceland",
						"Ireland",
						"Italy",
						"Latvia",
						"Lithuania",
						"Luxembourg",
						"Malta",
						"Moldova",
						"Montenegro",
						"Netherlands",
						"Norway",
						"Poland",
						"Portugal",
						"Romania",
						"Russia",
						"San Marino",
						"Serbia",
						"Slovakia",
						"Slovenia",
						"Spain",
						"Sweden",
						"Switzerland",
						"Ukraine",
						"United Kingdom"
		));							

		if(isset($_GET[res]) && $_GET[res]=='All')
		{
			$dataJson = json_encode($data[$_GET[region]]);
			echo $dataJson;
			return;
		}
		$data = $data[eu]; 
		//$q = iconv(mb_strtolower(urldecode($_GET["city"])));
		$q = mb_strtolower(urldecode($_GET["city"]), 'UTF-8');	
		if (!$q) return;
		foreach ($data as $key=>$value) {
			if (strpos(mb_strtolower($key, 'UTF-8'), $q) !== false || strpos(mb_strtolower($value, 'UTF-8'), $q) !== false)
				echo "$value\n";
		}
	}	
}





?>	