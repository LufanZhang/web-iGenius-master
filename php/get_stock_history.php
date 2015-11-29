<?php

// ============================================================================
// Description: Script for getting stock history
// Author: Group 12 (Fei Xiang, Stephen Miano, Tong Wu, Cheng Li, Lufan Zhang)
// Project: Stock Prediction System
// Course: Spring 2014 Software Engineering of Web Applications
// ============================================================================

echo "script started\n";

date_default_timezone_set('America/New_York');

// Database parameters
$db_host = "127.6.101.2:3306";
$db_username = "adminkrszsvG";
$db_password = "SnSwBtSija85";

$db_name = "group12";
$table_name = "stock_history";

// We selected 50 stocks from the most valuable companies in the world.
// This array is very flexible and can be configured to use as many stocks as we want.
$stock_list = array("AAPL", "XOM",  "GOOG", "YHOO", "BAC",
				    "VZ",  	"JNJ",  "GE",  	"RHHBY","WMT",
				    "V", 	"WFC",  "DIS",  "NSRGY","NSRGF",
				    "GSK", 	"TOT",  "NVSEF","JPM",  "CVX",
				    "PG", 	"PFE",  "RHHVF","NVS",  "HBCYF",
				    "IBM",  "TOYOF","HSBC", "BHPBF","CHL",
				    "PTR", 	"CHLKF","SSNLF","TM", 	"VOD",
				    "VODPF","MSFT", "T", 	"KO",   "FB",
				    "ORCL", "CICHY","CICHF","AMZN", "BUD",
				    "MRK",  "FMX",  "AHBIF","SPY",  "BP");

// Parameters for retrieving stock historical prices
$start_month = 0;
$start_day   = 1;
$start_year  = 2013;
$frequency   = "d"; // daily

// Remote Server Directory Setup
$openshift_repo_dir = getenv('OPENSHIFT_REPO_DIR');
echo "openshift_repo_dir = $openshift_repo_dir\n";

// Connect to database, exit if connection fails. 
$link = @mysql_connect($db_host,
				      $db_username,
				      $db_password);

if (!$link)
{
	echo( "Unable to connect to database manager.\n");
	die('Could not connect: ' . mysql_error());
	exit();
} 
else 
{
	echo("Successfully Connected to MySQL Database Manager!\n");
}

// Select the database to use, exit if selection fails.
if (! @mysql_select_db($db_name) )
{
	echo( "Unable to  connect database...\n");
	exit();
} 
else 
{
	echo("Successfully Connected to Database '$db_name'!\n");
}

// Start fetching data for all the stocks in the stock list
for ($i = 0; $i < count($stock_list); ++$i)
{
	$symbol = $stock_list[$i];
	
	echo "fetching data for $symbol\n";
	
	$mmddyyyy = get_current_mmddyyyy_for_yahoo_api();
	
	// URL for calling Yanoo Finance API to retrieve historical quotes as a .csv file
	$fetchurl 
	= "http://ichart.yahoo.com/table.csv?s=$symbol&a=$start_month&b=$start_day&c=$start_year&d=$mmddyyyy[0]&e=$mmddyyyy[1]&f=$mmddyyyy[2]&g=$frequency&ignore=.csv";

	// Filename for temporarily storing the retrieved data
	$filename = "$openshift_repo_dir/tmp/stockprices.txt";
	
	// Retrieve the price history file
	$curl = curl_init();
    $fp = fopen("$filename", "w");
    curl_setopt ($curl, CURLOPT_URL, $fetchurl);
    curl_setopt($curl, CURLOPT_FILE, $fp);
	
    curl_exec ($curl);
    curl_close ($curl);
    fclose($fp);

	// Fetching data from file and store them into database
	$fcontents = file ("$filename"); 

	echo "retrieving records from $filename\n";

	for($j=1; $j<sizeof($fcontents); ++$j)
	{
		$line = trim($fcontents[$j]); 
		$arr = explode(",", $line); 
		
		// Remove last element because we don't need it (Adjusted Close Price)
		array_pop($arr); 
		
		// Check if the specific date for a specific stock already exists in the database table
		$q = "select volume from $table_name where date like '".$arr[0]."' and symbol like '".$symbol."'";
		$volume = mysql_query($q) or die(mysql_error());
		$row = mysql_fetch_array($volume, MYSQL_ASSOC);
		
		if($row['volume'] == "")
		{
			// Not existed yet, insert as new entry.
			$comma_separated = "'".$symbol."','".implode("','", $arr)."'";
			$insertquery = "insert into $table_name values(".$comma_separated.");";
			mysql_query($insertquery);
		}
		else
		{
			// Existing entry, update the price history because there might be correction to the data
			// E.g. stock split happened, need to update previous price to reflect the split as well
			$updatequery = "update $table_name set open = '".$arr[1]."', high = '".$arr[2]."',low = '".$arr[3]."',close = '".$arr[4]."',volume = '".$arr[5]."' where date = '".$arr[0]."' and symbol = '".$symbol."'";
			mysql_query($updatequery);
		}
	}
	
	// Sleep for one second. Too frequent queries to the API might trigger http error.
	echo "sleep for 1 seconds\n";
	shell_exec("sleep 1");
} 

echo "script finished\n";

// Function for getting today's date as yyyy, mm and dd
function get_current_mmddyyyy_for_yahoo_api()
{
	$currentDate = date("Y-m-d");
	
	$datearr = explode("-", $currentDate);

	$month 	= $datearr[1] - 1; // Yahoo API uses 0~11 to represent Jan to Dec
	$day 	= $datearr[2];
	$year 	= $datearr[0];
	
	return array($month, $day, $year);
}

?>
