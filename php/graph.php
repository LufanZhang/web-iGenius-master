<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>
      stock chart
    </title>
<?PHP
require_once("./include/membersite_config.php");

session_start();
if(!$fgmembersite->CheckLogin())
{
    $fgmembersite->RedirectToURL("login.php");
    exit;
}
?>
<?php
// Create connection
if(isset($_POST['symbol'])){
  $word = $_POST['symbol'];
  }else{
  echo "empty";
  }
   if(isset($_POST['selYear'])){
  $year = $_POST['selYear'];
  }else{
  echo "empty";
  }
  if(isset($_POST['selMonth'])){
  $month = $_POST['selMonth'];
  }else{
  echo "empty";
  }
  if(isset($_POST['selDay'])){
  $day = $_POST['selDay'];
  }else{
  echo "empty";
  }

  $Year = strval($year);
  $Month = strval($month);
  $Day = strval($day);
  $hyphen = "-";

  
 $sum = $Year.$hyphen.$Month.$hyphen.$Day;
  $time = strtotime($sum);
  $date = date("Y-m-d",$time);
$con=mysql_connect("127.6.101.2:3306","adminkrszsvG","SnSwBtSija85");
if(!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
  $db_selected = mysql_select_db("group12",$con);
$result = mysql_query("select date,open,high,low,close,volume from stock_history where symbol='$word'",$con);
$resultArr = array();
while($row = mysql_fetch_array($result)) {
  //google chart API data sequence date, low , open, close, high, volume; 
  array_push($resultArr,array($row['date'],
  $row['low'],$row['open'],$row['close'],$row['high'],$row['volume']
  ));
}
$x = json_encode($resultArr); 
//close connection
mysql_close($con);
?>
    

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta name="GENERATOR" content="Microsoft FrontPage 5.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>iGeniusStock-Genius Prediction</title>
<meta http-equiv="Content-Type" content="text/html;">
 <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">
<script type="text/javascript">

</script>
</head>
<script>
var times = <?php echo $date; ?>; 


</script>

<body>

<div align="center">
<center>
<table border="0" cellpadding="0" cellspacing="0" width="672" 
style="border-collapse: collapse" bordercolor="#111111" height="273">
<!-- fwtable fwsrc="Untitled" fwbase="index.gif" fwstyle="Dreamweaver" fwdocid = "742308039" fwnested="0" -->
<tr>
<td height="1" width="21"><img src="images/spacer.gif" width="13" height="1" border="0"></td>
<td height="1" width="7"><img src="images/spacer.gif" width="7" height="1" border="0"></td>
<td height="1" width="147"><img src="images/spacer.gif" width="147" height="1" border="0"></td>
<td height="1" width="8"><img src="images/spacer.gif" width="7" height="1" border="0"></td>
<td height="1" width="12"><img src="images/spacer.gif" width="12" height="1" border="0"></td>
<td height="1" width="11"><img src="images/spacer.gif" width="11" height="1" border="0"></td>
<td height="1" width="105"><img src="images/spacer.gif" width="105" height="1" border="0"></td>
<td height="1" width="325"><img src="images/spacer.gif" width="325" height="1" border="0"></td>
<td height="1" width="11"><img src="images/spacer.gif" width="11" height="1" border="0"></td>
<td height="1" width="17"><img src="images/spacer.gif" width="17" height="1" border="0"></td>
<td height="1" width="8"><img src="images/spacer.gif" border="0" width="1" height="1"></td>
</tr>
<tr>
<td align="center" colspan="6" bgcolor="#0D4416" height="150" width="302"><img name="igenius" 
src="images/igenius.gif" border="0" width="144" height="144"></td>
<td align="center" colspan="4" bgcolor="#0D4416" height="150" width="302"><img name="genius_logo" 
src="images/Genius_logo.gif" border="0" width="375" height="135"></td>
</tr>
<tr>
<td rowspan="7" colspan="5" bgcolor="#209B31" valign="top" height="198">
<p style="margin-top: 0; margin-bottom: 0"><img name="index_r2_c1" 
src="images/index_r2_c1.gif" border="0" width="186" height="225"></p>
<p style="margin-top: 0; margin-bottom: 0">&nbsp;</p>
<div align="center">
<center>
<table border="1" cellpadding="0" cellspacing="0" 
style="border-collapse: collapse; border-width: 0" bordercolor="#111111" width="157" 
id="AutoNumber3" height="1">
<tr>
<td style="border-style: none; border-width: medium" bgcolor="#FFFFFF" height="1" 
valign="top" width="10"><img name="index_r5_c2" src="images/index_r5_c2.gif" border="0" 
width="7" height="7"></td>
<td width="158" style="border-style: none; border-width: medium" bgcolor="#FFFFFF" 
height="1"><img border="0" src="../template-63/images/spacer-white.gif" width="8" 
height="8"></td>
<td style="border-style: none; border-width: medium" bgcolor="#FFFFFF" height="1" 
valign="top" width="22"><img name="index_r5_c4" src="images/index_r5_c4.gif" border="0" 
align="right" hspace="0" width="7" height="7"></td>
</tr>
<tr>
<td width="190" style="border-style: none; border-width: medium" colspan="3" 
bgcolor="#FFFFFF" height="90">
<table border="1" cellpadding="0" cellspacing="0" 
style="border-collapse: collapse; border-width: 0" bordercolor="#111111" width="111%" 
id="AutoNumber4">
<tr>
<td width="100%" style="border-style: none; border-width: medium">
<p style="margin: 1 7"><b><font face="Arial" size="3" color="#0D4416">Logged in as:</font></b></td>
</tr>
<tr>
<td width="100%" style="border-style: none; border-width: medium">
<p style="margin: 1 7"><b><font face="Arial" size="2" color="#0D4416"><?= $fgmembersite->UserFullName() ?></font></b></td>
</tr>
<tr>
<td width="100%" style="border-style: none; border-width: medium">
<p style="margin: 1 7"><b><font face="Arial" size="2" color="#0D4416"><a href='login-home.php'>Home</a></font></b></td>
</tr>
<tr>
<td width="100%" style="border-style: none; border-width: medium">
<p style="margin: 1 7"><b><font face="Arial" size="2" color="#0D4416"><a href='stock-prediction.php'>Back</a></font></b></td>
</tr>
</table>
</td>
</tr>
<tr>
<td width="10" style="border-style: none; border-width: medium" bgcolor="#FFFFFF" 
height="1" valign="bottom">
<p align="left"><img name="index_r8_c2" src="images/index_r8_c2.gif" border="0" width="7" 
height="7"></td>
<td width="158" style="border-style: none; border-width: medium" bgcolor="#FFFFFF" 
height="1"><img border="0" src="../template-63/images/spacer-white.gif" width="8" 
height="8"></td>
<td style="border-style: none; border-width: medium" bgcolor="#FFFFFF" height="1" 
valign="bottom" width="22">
<p align="right"><img name="index_r8_c4" src="images/index_r8_c4.gif" border="0" 
width="7" height="7"></td>
</tr>
</table>
</center>
</div>
</td>
<td colspan="5" bgcolor="#209B31" valign="top" height="15" width="469"></td>
<td height="15" width="8"><img src="images/spacer.gif" width="1" height="15" border="0"></td>
</tr>
<tr>
<td valign="top" height="11" width="11">
<p align="left"><img name="index_r3_c6" src="images/index_r3_c6.gif" border="0" 
width="11" height="11"></td>
<td colspan="2" bgcolor="#ffffff" valign="top" height="11" width="430"></td>
<td valign="top" height="11" width="11">
<p align="right"><img name="index_r3_c9" src="images/index_r3_c9.gif" border="0" 
width="11" height="11"></td>
<td rowspan="6" bgcolor="#209B31" valign="top" height="130" width="17"></td>
<td height="11" width="8"><img src="images/spacer.gif" width="1" height="11" border="0"></td>
</tr>
<tr>
<form action = "manual.php" method = "post">
<td rowspan="3" bgcolor="#ffffff" valign="top" height="108" width="11"></td>
<td rowspan="3" colspan="2" bgcolor="#ffffff" valign="top" height="108" width="430">


<p align="center"><font face="Verdana" size="6" color="#0D4416">The history and predicted stock's price figure</br></font></p>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript">
      google.load('visualization', '1.1', {packages: ['corechart', 'controls']}); 
    </script>
    <script type="text/javascript">
  //pass data from database to javascript. 
    var jsArray = <?php echo $x; ?>; 
    
    for(var i=0; i<jsArray.length; i++){
        jsArray[i][0] = new Date(jsArray[i][0]); 
        for(var j=1; j < jsArray[i].length; j++){
            jsArray[i][j] = Number(jsArray[i][j]); 
           
        }
    }
   
    </script>
     <script type="text/javascript">
      google.load('visualization', '1', {packages: ['corechart']});
      
      function drawVisualization() {
        var data = google.visualization.arrayToDataTable([
           [jsArray[0][0],jsArray[0][1],jsArray[0][2],jsArray[0][3],jsArray[0][4]]
        ], true);

       
        for(var i=1;i<jsArray.length;i++){
         data.addRows([
          [jsArray[i][0],jsArray[i][1],jsArray[i][2],jsArray[i][3],jsArray[i][4]]
        ]);
        }
        
        var options = {
          legend:'none'
        };

        var chart = new google.visualization.CandlestickChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }

      google.setOnLoadCallback(drawVisualization);

    </script>
  
  <body>
    <div id="chart_div" style="width: 750px; height: 460px;"></div>
  </body>
  <body>
  <p align="center"><input type = "submit" value = "reselection"/></p>
  </form>
  </body>

<td rowspan="3" bgcolor="#ffffff" valign="top" height="108" width="11"></td>
<td height="1" width="8"><img src="images/spacer.gif" width="1" height="199" border="0"></td>
</tr>
<tr>
<td height="8" valign="top" width="8"><img src="images/spacer.gif" width="1" height="7" 
border="0"></td>
</tr>
<tr>
<td height="178" valign="top" width="8"><img src="images/spacer.gif" width="1" 
height="166" border="0"></td>
</tr>
<tr>
<td rowspan="2" valign="bottom" height="11" width="11">
<p align="left"><img name="index_r7_c6" src="images/index_r7_c6.gif" border="0" 
width="11" height="11"></td>
<td rowspan="2" colspan="2" bgcolor="#ffffff" valign="top" height="11" width="430"></td>
<td rowspan="2" valign="bottom" height="11" width="11">
<p align="right"><img name="index_r7_c9" src="images/index_r7_c9.gif" border="0" 
width="11" height="11"></td>
<td height="4" valign="top" width="8"><img src="images/spacer.gif" width="1" height="4" 
border="0"></td>
</tr>
<tr>
<td height="7" valign="top" width="8"><img src="images/spacer.gif" width="1" height="7" 
border="0"></td>
</tr>
<tr>
<td colspan="10" bgcolor="#209B31" valign="top" height="12" width="657"></td>
<td height="12" valign="top" width="8"><img src="images/spacer.gif" width="1" height="12" 
border="0"></td>
</tr>
<tr>
<td colspan="10" bgcolor="#0D4416" height="30" width="657">
<p align="center"><b><font size="1" color="#FFFFFF" face="Verdana">Copyright iGeniusStock 2014. All Rights Reserved.</font></b></td>
<td height="30" valign="top" width="8"><img src="images/spacer.gif" width="1" height="18" 
border="0"></td>
</tr>
</table>
</center>
</div>

</body>

</html>