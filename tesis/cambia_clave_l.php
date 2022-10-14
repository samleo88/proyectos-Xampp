<?php

include ("conexion.php");

$codigo=$_SESSION['codigo'];
$clave=$_REQUEST['clave'];

$dbmy->beginTrans();
$q="update usuarios set clave='$clave' where id=$codigo";
//echo $q;
if(!$eq=$dbmy->Execute($q))
{
	echo "
	<script>
		alert('ERROR AL MODIFICAR, POR FAVOR COMUNIQUE AL ADMINISTRADOR DEL SISTEMA');
	</script>
	";
	$dbmy->RollbackTrans();
	die();
	exit();
}

$dbmy->CommitTrans();	

echo "
<script>
alert('LA CLAVE SE MODIFICO EXITOSAMENTE');
AjaxConsulta('inicio.php', {}, 'contenedor');	
</script>
";
	


?>