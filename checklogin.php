<?php
include "config.php";
include "startup.php";
session_start();
//*** Nou ***
//*** Create connection ***
$conn = new mysqli($host, $username, $password, $db_name);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//*** End Check connection ***
//*** End Create connection ***

//*** username and password sent from form *** 
//$login=$_POST["Login"]; 
$myusername=$_POST["myusername"]; 
//$mypassword=md5($_POST["mypassword"]);
$mypassword=$_POST["mypassword"];
echo "User Name : ".$login."<br/><br/><br/>";
//*** End username and password sent from form ***

//*** To protect MySQL injection (more detail about MySQL injection) ***
//$login = stripslashes($login);
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
//$login = mysqli_real_escape_string($conn,$login);
$myusername = mysqli_real_escape_string($conn,$myusername);
$mypassword = mysqli_real_escape_string($conn,$mypassword);
//*** End To protect MySQL injection ***

//*** Run SQL ***
$tbl_name="user"; 
$sql="SELECT * FROM $tbl_name WHERE login='".$myusername."' and password='".$mypassword."'";
$result=mysqli_query($conn,$sql);
if ($result->num_rows > 0){
if ($row = mysqli_fetch_array ($result,MYSQLI_ASSOC))
    {
	$IdGuide = $row["idguide"];
	$Nume = $row["nume"];
	$Prenume = $row["prenume"];
	$Login = $row["login"];
    $Atribute = $row["atribute"];        
    }
// MySql_Num_Row is counting table row
$count=mysqli_num_rows($result);
// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){
// Register $myusername, $mypassword and redirect to file "login_success.php"
//session_register("login");
session_register("myusername");
session_register("mypassword");
$_SESSION["IdGuide"]=$IdGuide;
$_SESSION["Nume"]= $Nume;
$_SESSION["Prenume"]=$Prenume;
$_SESSION["Login"]=$myusername;
$_SESSION["Atribute"] = $Atribute;
header("location:login_success.php");
}else{echo "Eroare autentificare!";}
}else{
	echo "Login message ! <br/>";
	echo "Nume utilizator 'incorect' sau  parola 'incorecta'! <br/><br/>";	
?>
<p><INPUT TYPE="button" VALUE="Back" style="margin-top:10px; display:block; border:1px solid #000000; width:100px; height:25px;font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px; padding-left:2px; padding-right:2px; padding-top:0px; padding-bottom:2px; line-height:14px; background-color:#EFEFEF;" onClick="history.go(-1);return true;"></p><br/>
<?php
}
$conn->close();
//*** End Run SQL ***
?>
