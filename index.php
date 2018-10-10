<?php
include "config.php";
include "startup.php"
?>
<html>  
	<title>Autentificare - <?php print($BIB);?></title>
<head>   
</head>
<body>
<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<form name="form1" method="post" action="checklogin.php">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
	<tr align="center"><?php print($BIB);?><td></br></td></tr>
</br>
<tr>
<td colspan="3"><strong>Autentificare</strong></td>
</tr>
<tr>
<td width="78">Utilizator</td>
<td width="6">:</td>
<td width="294"><input name="myusername" type="text" id="myusername"></td>
</tr>
<tr>
<td>Parola</td>
<td>:</td>
<td><input name="mypassword" type="password" id="mypassword"></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><input type="submit" name="Submit" value="Aplica"></td>
</tr>
</table>
</td>
</form>
</tr>
</table>
</body>
</html>
