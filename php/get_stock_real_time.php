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
$table_name = "stock_real_time_data";

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

// This script is scheduled on the server to run every minute
// If we only fetch once per minute, there might be some data lost due to 
// misalignment of script run timestamp and yahoo api timestamp.
// So we are doing 4 fetches each run, the fetches are 10 seconds apart. 
// This way ensures we will be able to get stock real time data for every minute of the day.
for ($loop_count = 0; $loop_count < 4; ++$loop_count)
{
	// Start fetching data for all the stocks in the stock list
	for ($i = 0; $i < count($stock_list); ++$i)
	{
		$symbol = $stock_list[$i];
		
		echo "fetching real time data for $symbol\n";
	 
		// yahoo quote api field descriptors
		// s - symbol
		// l1 - last trade price only
		// d1 - last trade date
		// t1 - last trade time
		// v  - volume
		$format = "sl1d1t1v";

		// fetch data from Yahoo!
		// s = stock code
		// f = format
		// e = filetype
	    $s = file_get_contents("http://finance.yahoo.com/d/quotes.csv?s=$symbol&f=$format&e=.csv");

	    // convert the comma separated data into array
	    $data = explode( ',', $s);

	    // Remove the quotation mark
	    $data[0] = trim($data[0], '"');
	    $data[2] = trim($data[2], '"');
	    $data[3] = trim($data[3], '"');

	    // Filter out invalid 0 or null price that yahoo API sometimes returns
	    if ($data[1] == "0" || $data[1] == "")
	    {
	    	continue;
	    }

	    $datetimestr="$data[2] $data[3]";
	    $datetime = new datetime($datetimestr);

	    $datetimestring = $datetime->format('Y-m-d H:i:s');
			
		// Check if the specific date for a specific stock already exists in the database table
		$q = "select volume from $table_name where datetime like '".$datetimestring."' and symbol like '".$symbol."'";
		$volume = mysql_query($q) or die(mysql_error());
		$row = mysql_fetch_array($volume, MYSQL_ASSOC);
		
		if($row['volume'] == "")
		{
			// Not existed yet, insert as new entry.
			$comma_separated = "'".$symbol."','".$datetimestring."','".$data[1]."','".$data[4]."'";
			$insertquery = "insert into $table_name values(".$comma_separated.");";
			mysql_query($insertquery);
		}
		else
		{
			// Existing entry, update the price history because there might be correction to the data
			// E.g. stock split happened, need to update previous price to reflect the split as well
			$updatequery = "update $table_name set symbol = '".$symbol."', datetime = '".$datetimestring."',price = '".$data[1]."',volume = '".$data[4]."'";
			mysql_query($updatequery);
		}
	} 

	echo "sleep for 10 seconds\n";
	shell_exec("sleep 10");
}

echo "script finished\n";


?>
