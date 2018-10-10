<?php 
include "startup.php";
session_start();
session_destroy();
session_start();

$_SESSION["TipComanda"]=null;
$_SESSION["NrCEBV"]=null;
$_SESSION["TipCEBV"]=null;
$_SESSION["Client"]=null;
$_SESSION["MDMDenumire"]=null;
$_SESSION["CodLista"]=null;
$_SESSION["MDMTip"]=null;
$_SESSION["MDMSerie"]=null;    
$_SESSION["NrComanda"]=null;
$_SESSION["NrBucati"]=null;
$_SESSION["Tarif"]=null;
$_SESSION["TarifTransport"]=null;
$_SESSION["DataComanda"]=null;
$_SESSION["DataEtalonare"]=null;
$_SESSION["DataEmitere"]=null;
$_SESSION["DataBV"]=null;
$_SESSION["NrFactura"]=null;
$_SESSION["DataFactura"]=null;
$_SESSION["SituatieFactura"]=null;
$_SESSION["DocumentDePlataTip"]=null;
$_SESSION["DocumentDePlataNr"]=null;
$_SESSION["DocumentDePlataData"]=null;


if(!session_is_registered(myusername)){
header("location:index.php");
}
?>
