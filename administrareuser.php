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
if (instr($Atribute, "A")==0){	
header("location:faraacces.php");
}else{
include "config.php";
}
}  
//******* End Verificare Acces Utilizator *******
?>

<html>  
	<title><?php print($BIB);?> - Tabel Membri</title>
<head>  
<script type="text/javascript">
function goToURL(val){
location.href = val;
}
</script>
</head>  
    <body> 
    <p><?php print($BIB);?> - Tabel Membri</p>
    <p>User Curent : 
    <?php 
    print($_SESSION["Nume"].';');
    print(" Atribute utilizator : ".$_SESSION["Atribute"]);
    
    ?>
     <BUTTON ONCLICK="javascript:goToURL('logout.php')">Iesire</BUTTON>
     </p>        
    <table>
    	<tr>
    	<td>    
    	<INPUT TYPE="button" VALUE="Inapoi" style="margin-top:10px; display:block; border:1px solid #000000; width:100px; height:25px;font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px; padding-left:2px; padding-right:2px; padding-top:0px; padding-bottom:2px; line-height:14px; background-color:#EFEFEF;" onClick="history.go(-1);return true;">
    	</td>
       	<td>
    	<INPUT TYPE="button" VALUE="Mergi la panel" style="margin-top:10px; display:block; border:1px solid #000000; width:100px; height:25px;font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px; padding-left:2px; padding-right:2px; padding-top:0px; padding-bottom:2px; line-height:14px; background-color:#EFEFEF;" onClick="javascript:goToURL('login_success.php');">
    	</td>
    	</tr>
    </table>
    <br/>
    
    <table width="700" border="1"> 
    	<tr>
    		<td align"left" colspan="2">Tabel cu atribute si drepturile de acces la meniuri</td>
    	</tr>
    	<tr>
    		<td align="center">Atribut</td>
    		<td align="center">Drept de acces</td>
    	</tr>
    	<tr>
    		<td align="center">A</th>
    		<td align="Left">La meniul : Administrare Utilizatori</td>
    	</tr>
    	<tr>
    		<td align="center">P</th>
    		<td align="Left">La meniul : Schimba Parola </td>
    	</tr>
    	<tr>
    		<td align="center">L</th>
    		<td align="Left">La meniul : Lista titluri carti </td>
    	</tr>
    </table>
    <br/>  
    <?php  	  
//*** Nou ***
//*** Create connection ***
$conn = new mysqli($host, $username, $password, $db_name);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//*** End Check connection ***
//*** End Create connection ***
      
      
//*** Comenzi PHP ***      
    //*** Add Condition ***//  
    if($_POST["hdnCmd"] == "Add")  
    {  
    $strSQL = "INSERT INTO user ";  
    $strSQL .="(id,idguide,nume,prenume,login,password,atribute) ";  
    $strSQL .="VALUES ";  
    $strSQL .="('".$_POST["txtAddID"]."','".$_POST["txtAddIdGuide"]."' ";  
    $strSQL .=",'".$_POST["txtAddNume"]."' ";  
    $strSQL .=",'".$_POST["txtAddPrenume"]."' ";  
    $strSQL .=",'".$_POST["txtAddLogin"]."' ";  
    $strSQL .=",'".$_POST["txtAddPassword"]."','".$_POST["txtAddAtribute"]."') ";
    $objQuery = mysqli_query($conn,$strSQL); 
    if(!$objQuery)  
    {  
     echo "Eroare adaugare utilizator : [".mysqli_error($conn)."]"; 
    }  
    header("location:$_SERVER[PHP_SELF]");  
    exit(); 
    }  
      
    //*** Update Condition ***//  
    if($_POST["hdnCmd"] == "Update")  
    {  
    $strSQL = "UPDATE user SET ";  
    $strSQL .="id = '".$_POST["txtEditID"]."' ";  
    $strSQL .=",idguide = '".$_POST["txtEditIdGuide"]."' ";  
    $strSQL .=",nume = '".$_POST["txtEditNume"]."' ";
    $strSQL .=",prenume = '".$_POST["txtEditPrenume"]."' ";  
    $strSQL .=",login = '".$_POST["txtEditLogin"]."' ";  
    $strSQL .=",password = '".$_POST["txtEditPassword"]."' ";  
    $strSQL .=",atribute = '".$_POST["txtEditAtribute"]."' ";
    $strSQL .="WHERE id = '".$_POST["hdnEditID"]."' ";  
    $objQuery = mysqli_query($conn,$strSQL);  
    if(!$objQuery)  
    {  
    echo "Eroare actualizare utilizator : [".mysqli_error($conn)."]"; 
    }  
    header("location:$_SERVER[PHP_SELF]");  
    exit(); 
    }  
      
    //*** Delete Condition ***//  
    if($_GET["Action"] == "Del")  
    {  
    $strSQL = "DELETE FROM user ";  
    $strSQL .="WHERE id = '".$_GET["CusID"]."' ";  
    $objQuery = mysqli_query($conn,$strSQL); 
    if(!$objQuery)  
    {  
      echo "Eroare stergere utilizator : [".mysqli_error($conn)."]"; 
    }  
    header("location:$_SERVER[PHP_SELF]");  
    exit();  
    }  
//*** End Comenzi PHP ***      

//*** Query Afisare Date In Form ***
    $strSQL = "SELECT * FROM user ORDER BY `nume`";      
    $objQuery = mysqli_query($conn,$strSQL) or die ("Error Query [".$strSQL."]");  
    ?>  
    <form name="frmMain" method="post" action="<?=$_SERVER["PHP_SELF"];?>">  
    <input type="hidden" name="hdnCmd" value="">   
     <!--<div style="border:1px #000000 solid; width:100%; height:500px; overflow:auto;"> -->
    <table width="800" border="1">  
		<!-- *** Cap de Tabel Form *** -->
    <tr>  
    <th width="30"> <div align="center">ID </div></th>  
    <th width="70"> <div align="center">IdGuide </div></th>  
    <th width="70"> <div align="center">Nume </div></th>  
    <th width="70"> <div align="center">Prenume </div></th>  
    <th width="30"> <div align="center">Login </div></th>  
    <th width="30"> <div align="center">Password </div></th>  
    <th width="30"> <div align="center">Atribute </div></th>
    <th width="30"> <div align="center">Edit </div></th>  
    <th width="30"> <div align="center">Delete </div></th>  
    </tr>  
    <!-- *** End Cap de Tabel Form *** -->
    <?php  
//*** Load Query Data ***    
    while($objResult = mysqli_fetch_array ($objQuery,MYSQLI_ASSOC))
    {  
//*** Comanda Form Edit ***		    
    if($objResult["id"] == $_GET["CusID"] and $_GET["Action"] == "Edit")  
    {  
    ?>  
    <!-- *** Afisare date tabel form in mod editare *** -->
    <tr>  
    <td><div align="center">  
    <input type="text" name="txtEditID" size="7" value="<?=$objResult["id"];?>">  
    <input type="hidden" name="hdnEditID" size="7" value="<?=$objResult["id"];?>">  
    </div></td>  
     <td><input type="text" name="txtEditIdGuide" size="20" value="<?=$objResult["idguide"];?>"></td>  
    <td><input type="text" name="txtEditNume" size="20" value="<?=$objResult["nume"];?>"></td>  
    <td><input type="text" name="txtEditPrenume" size="6" value="<?=$objResult["prenume"];?>"></td>  
    <td><div align="center"><input type="text" name="txtEditLogin" size="20" value="<?=$objResult["login"];?>"></div></td>  
    <td align="left"><input type="text" name="txtEditPassword" size="10" value="<?=$objResult["password"];?>"></td>  
    <td align="left"><input type="text" name="txtEditAtribute" size="7" value="<?=$objResult["atribute"];?>"></td>  
    <td colspan="2" align="right"><div align="center">  
    <input name="btnUpdate" type="button" id="btnUpdate" value="Update" OnClick="frmMain.hdnCmd.value='Update';frmMain.submit();">  
    <input name="btnCancel" type="button" id="btnCancel" value="Cancel" OnClick="window.location='<?=$_SERVER["PHP_SELF"];?>';">  
    </div></td>  
    </tr>  
    <!-- *** End afisare tabel form in mod editare *** -->
    <?php  
    }  
    else  
    {  
    ?>  
     <!-- *** Afisare date tabel in form *** -->
    <tr>  
    <td><div align="center"><?=$objResult["id"];?></div></td>  
    <td><?=$objResult["idguide"];?></td>  
    <td><?=$objResult["nume"];?></td>  
    <td><div align="left"><?=$objResult["prenume"];?></div></td>  
    <td align="left"><?=$objResult["login"];?></td>  
    <td align="left"><?=$objResult["password"];?></td>  
    <td align="left"><?=$objResult["atribute"];?></td>
    <td align="center"><a href="<?=$_SERVER["PHP_SELF"];?>?Action=Edit&CusID=<?=$objResult["id"];?>">Edit</a></td>  
    <td align="center"><a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='<?=$_SERVER["PHP_SELF"];?>?Action=Del&CusID=<?=$objResult["id"];?>';}">Delete</a></td>  
    </tr>  
    <!-- *** End afisare date tabel in form *** -->
    <?php  
    }  
    ?>  
    <?php  
    }  
    ?>  
    <!-- *** Rand tabel de adugare date in form *** -->
    <tr>  
    <td><div align="center"><input type="text" name="txtAddID" size="7"></div></td>  
    <td><input type="text" name="txtAddIdGuide" size="20"></td>  
    <td><input type="text" name="txtAddNume" size="6"></td>  
    <td><input type="text" name="txtAddPrenume" size="20"></td>
    <td><input type="text" name="txtAddLogin" size="10"></td>
    <td><input type="text" name="txtAddPassword" size="7"></td>
    <td><input type="text" name="txtAddAtribute" size="7"></td>
    <td colspan="2" align="right">
	<div align="center">  
    <input name="btnAdd" type="button" id="btnAdd" value="Add" OnClick="frmMain.hdnCmd.value='Add';frmMain.submit();">  
    </div>
    </td>  
    </tr>  
    <!-- *** End rand tabel de adugare date in form *** -->
    </table>  
     <!--</div>-->
     <label>Nota : Parola implicita pentru un membru nou este : 12345 iar amprenta codificata este : 827ccb0eea8a706c4c34a16891f84e7b</label>
    </form>  
    <?php      
    $conn->close();
    ?>  
    </body>  
    </html>  
