<?PHP
require_once("./include/membersite_config.php");

if(isset($_GET['code']))
{
   if($fgmembersite->ConfirmUser())
   {
        $fgmembersite->RedirectToURL("thank-you-regd.html");
   }
}

?>

<html>

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta name="GENERATOR" content="Microsoft FrontPage 5.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>iGeniusStock-Registration Confirmation</title>
<meta http-equiv="Content-Type" content="text/html;">
<link rel="STYLESHEET" type="text/css" href="style/fg_membersite.css" />
<script type='text/javascript' src='scripts/gen_validatorv31.js'></script>
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
<p style="margin: 1 7"><b><font face="Arial" size="2" color="#0D4416"><a href='index.php'>Home</a></font></b></td>
</tr>
<tr>
<td width="100%" style="border-style: none; border-width: medium">
<p style="margin: 1 7"><b><font face="Arial" size="2" color="#0D4416"><a href='login.php'>Login</a></font></b></td>
</tr>
<tr>
<td width="100%" style="border-style: none; border-width: medium">
<p style="margin: 1 7"><b><font face="Arial" size="2" color="#0D4416"><a href='news.php'>Financial News</a></font></b></td>
</tr>
<tr>
<td width="100%" style="border-style: none; border-width: medium">
<p style="margin: 1 7"><b><font face="Arial" size="2" color="#0D4416"><a href='contact.php'>Contact</a></font></b></td>
</tr>
<tr>
<td width="100%" style="border-style: none; border-width: medium">
<p style="margin: 1 7"><b><font face="Arial" size="2" color="#0D4416"><a href='about.php'>About Us</a></font></b></td>
</tr>
<tr>
<td width="100%" style="border-style: none; border-width: medium">
<p style="margin: 1 7"><b><font face="Arial" size="2" color="#0D4416"><a href='terms.php'>Terms & Condition</a></font></b></td>
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
<p align="center"><b><font face="Arial" size="5" color="#0D4416">Confirmation</font></b></p>
<p><font face="Verdana" size="3" color="#0D4416">Please enter the confirmation code in the box below</font></p>
<!-- Form Code Start -->
<div id='fg_membersite'>
<form id='confirm' action='<?php echo $fgmembersite->GetSelfScript(); ?>' method='get' accept-charset='UTF-8'>
<div class='short_explanation'>* required fields</div>
<div><span class='error'><?php echo $fgmembersite->GetErrorMessage(); ?></span></div>
<div class='container'>
    <label for='code' >Confirmation Code:* </label><br/>
    <input type='text' name='code' id='code' maxlength="50" /><br/>
    <span id='register_code_errorloc' class='error'></span>
</div>
<div class='container'>
    <input type='submit' name='Submit' value='Submit' />
</div>

</form>
<!-- client-side Form Validations:
Uses the excellent form validation script from JavaScript-coder.com-->

<script type='text/javascript'>
// <![CDATA[

    var frmvalidator  = new Validator("confirm");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();
    frmvalidator.addValidation("code","req","Please enter the confirmation code");

// ]]>
</script>
</div>
<!--
Form Code End (see html-form-guide.com for more info.)
-->
</td>
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
