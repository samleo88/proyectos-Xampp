<?php
session_start();

include ("conexion_sin.php");

$us=$_REQUEST['us'];
$pa=$_REQUEST['pa'];


$q="select * from usuarios where usuario='$us' and clave='$pa'";
$eq=$dbmy->Execute($q);
$fq=$eq->RecordCount();
if($fq>0)
{
	$codigo = $eq -> fields['id'];
	$nombre = $eq -> fields['nombre'].' '.$eq -> fields['apellido'];
	

	$_SESSION["id"]=$codigo;
	$_SESSION["codigo"]=$codigo;
	$_SESSION["nombre"]=$nombre;

	
	$_SESSION["autentificado"]= "SI";
	$_SESSION["ultimoAcceso"]= date("Y-n-j H:i:s");
	
	echo "<script>location.href='general.php?m=1';</script>";
}
else
{
	echo "<script>alert('Los datos son incorrectos');
	location.href='login.php';
	</script>";
}
?>