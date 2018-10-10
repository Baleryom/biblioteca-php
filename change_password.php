<?php
include "startup.php";
//******* Verificare Acces Utilizator *******
  function instr($haystack, $needle, $offset=0)
    {
    $result = stripos($haystack, $needle, $offset);
     
    if (is_numeric($result))
    {
    $result++;
    }
    else
    {
    $result = 0;
    }
    return $result;
    }
session_start();
if(!session_is_registered(myusername)){
header("location:logout.php");}    
if(empty($_SESSION["myusername"])){
header("location:logout.php");}else{
$Atribute=$_SESSION["Atribute"];
$Indicativ=$_SESSION["Indicativ"];
if (instr($Atribute, "P")==0){	
header("location:faraacces.php");
}else{
include "config.php";
}
}    
//******* End Verificare Acces Utilizator *******
?>
<html>  
<title>Schimba Parola - <?php print($BIB);?></title>
<head>  
<script type="text/javascript">
function goToURL(val){
location.href = val;
}
</script>
</head>	
<body>
<form name="form1" method="post" action="new_password.php">
<table width="437" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
	<tr align="center"><?php print($BIB);?>
		<td colspan="3" align="right">
		<table>
    	<tr>
    	<td>    
    	<INPUT TYPE="button" VALUE="Inapoi" style="margin-top:10px; display:block; border:1px solid #000000; width:100px; height:25px;font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px; padding-left:2px; padding-right:2px; padding-top:0px; padding-bottom:2px; line-height:14px; background-color:#EFEFEF;" onClick="history.go(-1);return true;">
    	<INPUT TYPE="button" VALUE="Iesire" style="margin-top:10px; display:block; border:1px solid #000000; width:100px; height:25px;font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px; padding-left:2px; padding-right:2px; padding-top:0px; padding-bottom:2px; line-height:14px; background-color:#EFEFEF;" onClick="javascript:goToURL('../biblioteca/logout.php')">    	
    	</td>
       	</tr>
		</table>
</td>
</tr>
</br>
<tr>
<td colspan="3" align="left"><strong>Schimba Parola   </strong></td>
</tr>
<tr>
<td width="377">User Name</td>
<td width="6">:</td>
<td width="294"><input name="myusername" type="text" id="myusername"></td>
</tr>
<tr>
<td>Parola</td>
<td>:</td>
<td><input name="mypassword" type="password" id="mypassword"></td>
</tr>
<tr>
<td>Parola Noua</td>
<td>:</td>
<td><input name="mynewpassword" type="password" id="mymewpassword"></td>
</tr>
<tr>
<td>Verificare Parola</td>
<td>:</td>
<td><input name="myverpassword" type="password" id="myverpassword"></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><input type="submit" name="Submit" value="Change"></td>
</tr>
</table>
</td>
</tr>
</table>
</form>
</body>
</html>
