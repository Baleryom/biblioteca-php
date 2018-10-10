<?php
include "startup.php";
session_start();
if(!session_is_registered(myusername)){
header("location:index.php");
}
include "config.php";
?>

<html>  
	<title><?php print($BIB);?></title>
<head> 
<script type="text/javascript">
function goToURL(val){
location.href = val;
}
</script>
</head>
<body>
	<table width="100%">
		<tr>
			<td align="left">Autentificare realizata cu succes : <?php print($_SESSION["Nume"]." ".$_SESSION["Prenume"]);?></td>
			<td align="right"><BUTTON ONCLICK="javascript:goToURL('logout.php')" >Iesire</BUTTON></td>
		</tr>
	</table>
<br/>
<p align="center">
<table border="1">
	<tr>
		<td colspan="5" align="center"><?php print($BIB);?> - 2018</td>
	</tr>
	<tr>		
		<td>
			
		</td>
		<td>
			
		</td>
		<td>
			<INPUT TYPE="button" VALUE="Lista Titluri Carti" ONCLICK="javascript:goToURL('l.php')" style="margin-top:10px; display:block; border:1px solid #000000; width:250px; height:25px;font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px; padding-left:2px; padding-right:2px; padding-top:0px; padding-bottom:2px; line-height:14px; background-color:#EFEFEF;">
		</td>
		<td>
			
		</td>			
		<td>
			
		</td>					
	</tr>
</table>
</p>


<p align="center">
<table border="1">
	<tr>
		<td colspan="3" align="center"><?php print($BIB);?> - Administrare</td>
	</tr>
	<tr>
		<td>			
		</td>
		<td>		
			
		</td>
		<td>
			
		</td>
	</tr>
	<tr>
		<td>
			<INPUT TYPE="button" VALUE="Administrare Utilizatori" ONCLICK="javascript:goToURL('administrareuser.php')" style="margin-top:10px; display:block; border:1px solid #000000; width:250px; height:25px;font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px; padding-left:2px; padding-right:2px; padding-top:0px; padding-bottom:2px; line-height:14px; background-color:#EFEFEF;">		
		</td>		
	</tr>
	<tr>
		<td>
			<INPUT TYPE="button" VALUE="Schimba parola" ONCLICK="javascript:goToURL('change_password.php')" style="margin-top:10px; display:block; border:1px solid #000000; width:250px; height:25px;font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px; padding-left:2px; padding-right:2px; padding-top:0px; padding-bottom:2px; line-height:14px; background-color:#EFEFEF;">
		</td>
		
		
	</tr>
	
</table>
</p>
<br/>

</body>
</html>
