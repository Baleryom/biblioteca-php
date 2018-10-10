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
//*** Create connection ***
$conn = new mysqli($host, $username, $password, $db_name);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//*** End Check connection ***
//*** End Create connection ***

//*** username and password sent from form *** 
$myusername=$_POST["myusername"]; 
//$mypassword=md5($_POST["mypassword"]);
$mypassword=$_POST["mypassword"];
//*** End username and password sent from form ***

//*** To protect MySQL injection (more detail about MySQL injection) ***
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysqli_real_escape_string($conn,$myusername);
$mypassword = mysqli_real_escape_string($conn,$mypassword);
//*** End To protect MySQL injection ***

//*** Run SQL Update ***
$tbl_name="utilizatori"; 
$sql="SELECT * FROM $tbl_name WHERE login='".$myusername."' and password='".$mypassword."'";
$result=mysqli_query($conn,$sql);
if ($result->num_rows > 0){
if ($row = mysqli_fetch_array ($result,MYSQLI_ASSOC))
    {
	/*$id=$row["userid"];
	$Nume = $row["nume"];
        $Indicativ = $row["indicativ"];
        $Atribute = $row["atribute"];   
      */  
    $Id = $row["id"];   
    $IdGuide = $row["idguide"];
	$Nume = $row["nume"];
	$Prenume = $row["prenume"];
	$Login = $row["login"];
    $Atribute = $row["atribute"];        
    }
// MySql Num Row is counting table row
$count=mysqli_num_rows($result);
// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){
if(($_POST["mynewpassword"])==($_POST["myverpassword"])){
	/*$strSQL = "UPDATE user SET ";
	$strSQL .="password = '".md5($_POST["mynewpassword"])."' "; 
	$strSQL .="WHERE userid = '".$id."' ";  8*/
	
	$strSQL = "UPDATE user SET ";
	$strSQL .="password = '".$_POST["mynewpassword"]."' "; 
	$strSQL .="WHERE id = '".$Id."' ";  
	
    $objQuery = mysqli_query($conn,$strSQL);  
    if(!$objQuery)  
    {  
    echo "Eroare actualizare parola : [".mysqli_error($conn)."]";  
    }
	else
	{
session_register("myusername");
session_register("mynewpassword"); 
$_SESSION["IdGuide"]=$IdGuide;
$_SESSION["Nume"]= $Nume;
$_SESSION["Prenume"]=$Prenume;
$_SESSION["Login"]=$myusername;
$_SESSION["Atribute"] = $Atribute;
header("location:login_success.php");
	}  	
	}else {
echo "Eroare verificare parola.";		
}
}
}else{
echo "Gresala la introducerea campurilor : utilizator sau  parola !";
}
$conn->close();
//*** End Run SQL Update ***
?>
