<?PHP
require_once("./include/membersite_config.php");

session_start();
if(!$fgmembersite->CheckLogin())
{
    $fgmembersite->RedirectToURL("login.php");
    exit;
}
$isSent=$_REQUEST["isSent"];
$_SESSION['amount'] = $_POST['amount'];
$_SESSION['datepicker'] = $_POST['datepicker'];
$threshold = 5;
if($isSent=='sent')
{
	$threshold = $_SESSION["amount"];
}
$date = $_SESSION["datepicker"];
$expire=time()+60*60*24*30;
setcookie("T", $threshold, $expire);
setcookie("D", $date, $expire);
$month = strtok($date, "/");
$day = strtok("/");
$year = strtok("/");
/*Calculation should be done here*/
?>

<html>

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
$(function() {
	$( "#slider-range-max" ).slider({
	range: "max",
	min: 1,
	max: 10,
	value: <?php echo $threshold;?>,
	slide: function( event, ui ) {
	$( "#amount" ).val( ui.value );
	}
	});
	$( "#amount" ).val( $( "#slider-range-max" ).slider( "value" ) );
});

$(function() {
	$( "#datepicker" ).datepicker({
	showOn: "button",
	buttonImage: "images/calendar.gif",
	buttonImageOnly: true
	});
});
</script>
</head>

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
<td rowspan="3" bgcolor="#ffffff" valign="top" height="108" width="11"></td>
<td rowspan="3" colspan="2" bgcolor="#ffffff" valign="top" height="108" width="430">
<p align="center"><b><font face="Arial" size="5" color="#0D4416">Genius Predictor</font></b></p>
<table align="center" border="1" style="width:300px">
<tr style="background-color:red">
  <td colspan="3">Remove Later</td>
</tr>  
<tr style="background-color:green">
  <td>Stock Symbol</td>
  <td>Predicted % Change</td>		
  <td>Confidence Level</td>
 </tr>
<tr>
  <td>Coke</td>
  <td>+0.28</td>		
  <td>81%</td>
</tr>
<tr>
  <td>IBM</td>
  <td>-0.19</td>		
  <td>88%</td>
</tr>
<tr>
  <td>VZ</td>
  <td>-0.15</td>		
  <td>86%</td>
</tr>
<tr>
  <td>LMT</td>
  <td>-0.14</td>		
  <td>94%</td>
</tr>
<tr>
  <td>GOOG</td>
  <td>+0.14</td>		
  <td>93%</td>
</tr>
</table>
<form action="genius-prediction.php" method="post">
<p>
<label for="amount"><font face="Verdana" size="2" color="#0D4416">Risk Threshold:</font></label>
<input type="text" id="amount" name="amount" style="border:0; color:#f6931f; font-weight:bold;" value="<?php echo $_SESSION['amount'];?>"/>
</p>
<div id="slider-range-max"></div>

<table style="width:430px">
	<tr>
     		<td Align="left"><font face="Verdana" size="1" color="#0D4416">Safer</font></td>
     		<td Align="right"><font face="Verdana" size="1" color="#0D4416">Riskier</font></td>		
	</tr>
</table>
<p><font face="Verdana" size="2" color="#0D4416">Target Date:</font><input type="text" id="datepicker" name="datepicker" value="<?php echo $_SESSION['datepicker'];?>"/></p>
<input type="hidden" name="isSent" value="sent">
<input type="submit" value="Predict">
</form>
<table align="center" border="1" style="width:430px">
	<tr style="background-color:yellow">
  		<td>Threshold </td>
  		<td>Date</td>
  		<td>Month</td>
  		<td>Day</td>
  		<td>Year</td>		
	</tr>
	<tr>
  		<td><?php echo $threshold; ?></td>
  		<td><?php echo $date; ?></td>
  		<td><?php echo $month; ?></td>
  		<td><?php echo $day; ?></td>
  		<td><?php echo $year; ?></td>		
	</tr>
</table>
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
