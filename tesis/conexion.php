<?php
session_start();
error_reporting(0);


//error_reporting(E_ALL);
include ("bases_datos/adodb/adodb.inc.php");
include ("bases_datos/usb_defglobales.inc");

if ($_SESSION["autentificado"] != "SI") 
{  	echo "<script>alert('Su sesion ha expirado, por favor autenticarse');</script>";
	echo "<script>location.href='/tag_new/general/login_consu.php';</script>";
	exit;
} 
else 
{  
	$fechaGuardada = $_SESSION["ultimoAcceso"];
    $ahora = date("Y-n-j H:i:s");
    $tiempo_transcurrido = (strtotime($ahora)-strtotime($fechaGuardada));
     if($tiempo_transcurrido >= $tiempo_sesion) {
		session_destroy(); 
		session_unset();
	}else {
    $_SESSION["ultimoAcceso"] = $ahora;
	}
} 

$dbmy = NewADOConnection("mysqli");
$dbmy->Connect($bd_host,$bd_usuario,$bd_password,$bd_base);
if (!$dbmy){
       echo "<br>error de conexion<br>";
       exit;
}


?>