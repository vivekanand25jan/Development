<?php

/*
note:
this is just a static test version using a hard-coded countries array.
normally you would be populating the array out of a database

the returned xml has the following structure
<results>
	<rs>foo</rs>
	<rs>bar</rs>
</results>
*/
$input = strtolower( $_GET['input'] );

/*$con=mysql_connect('localhost','root','');
mysql_select_db('solce');*/

//if($_SERVER['HTTP_HOST']=='192.168.0.245' || $_SERVER['HTTP_HOST']=='localhost')

$con=mysql_connect('localhost','provabex','GM-R{G#)ClFc');
mysql_select_db('provabex_travel_bay');

//$sql="select * from gta_city_code where `cityName` Like '$input%' group by cityName order by cityName ASC";
//$sql="select * from hotel_city where `City` Like '$input%' order by City ASC";

//$sql="(SELECT DISTINCT city FROM api_hotels_city WHERE `city` LIKE '$input%' ORDER BY city ASC)";
//$sql="(SELECT DISTINCT city FROM api_hotels_city WHERE `city` LIKE '$input,%' ORDER BY city ASC) UNION (SELECT DISTINCT city FROM api_hotels_city WHERE `city` LIKE '$input%' ORDER BY city ASC)";
$input1=mysql_escape_string($input);
$sql = "SELECT DISTINCT city FROM api_hotels_city WHERE `city` LIKE '$input1%' ORDER BY city LIKE '$input,%' DESC, pref,city ASC";
//$sql = "SELECT DISTINCT city FROM api_hotels_city WHERE `city` LIKE '$input%' ORDER BY pref,city ASC";

$query=mysql_query($sql);

$aUsers=array();

while($row=mysql_fetch_array($query))
{
$city_name= explode('-',$row['city']);
	if(count($city_name)==1)
	{
		$aUsers[]=$row['city'];
	}
}

//$aUsers = $aUsers,$aUsers1;
	
	$input = strtolower( $_GET['input'] );
	$len = strlen($input);
	
	$aResults = array();
	
	if ($len)
	{
		for ($i=0;$i<count($aUsers);$i++)
		{
			// had to use utf_decode, here
			// not necessary if the results are coming from mysql

			if (strtolower(substr(utf8_decode($aUsers[$i]),0,$len)) == $input)
				$aResults[] = array( "id"=>($i+1) ,"value"=>stripslashes($aUsers[$i]), "info"=>htmlspecialchars($aInfo[$i]) );
			

		}
	}
	
	header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
	header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // always modified
	header ("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
	header ("Pragma: no-cache"); // HTTP/1.0
	
	
	
	if (isset($_REQUEST['json']))
	{
		header("Content-Type: application/json");
	
		echo "{\"results\": [";
		$arr = array();
		for ($i=0;$i<count($aResults);$i++)
		{
			$arr[] = "{\"value\": \"".$aResults[$i]['value']."\"}";
		}
		//echo "<pre/>";
		//print_r($arr);exit;
		echo implode(", ", $arr);
		echo "]}";
	}

/*if (isset($_REQUEST['json']))
	{
		header("Content-Type: application/json");
	
		echo "{\"results\": [";
		$arr = array();
		for ($i=0;$i<count($aResults);$i++)
		{
			$arr[] = "{\"id\": \"".$aResults[$i]['id']."\", \"value\": \"".$aResults[$i]['value']."\", \"info\": \"\"}";
		}
		echo "<pre/>";
		print_r($arr);exit;
		echo implode(", ", $arr);
		echo "]}";
	}*/
?>