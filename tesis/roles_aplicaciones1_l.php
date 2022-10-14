<?php

include ("conexion.php");
$op=$_REQUEST['op'];
$cod_rol=$_REQUEST['cod_rol'];
$cod_aplicacion=$_REQUEST['cod_aplicacion'];


if($op=='I')
{
	$dbmy->beginTrans();
	$q="insert into rol_aplicaciones(cod_rol,cod_aplicacion) values($cod_rol,$cod_aplicacion)";

	
	if(!$eq=$dbmy->Execute($q))
	{
		echo "
		<script>
			alert('ERROR AL INSERTAR, POR FAVOR COMUNIQUE AL ADMINISTRADOR DEL SISTEMA');
		</script>
		";
		$dbmy->RollbackTrans();
		die();
		exit();
	}
	$dbmy->CommitTrans();	
}

if($op=='E')
{
		$dbmy->beginTrans();
		$q="delete from rol_aplicaciones where cod_rol=$cod_rol and cod_aplicacion=$cod_aplicacion";
	
		
		if(!$eq=$dbmy->Execute($q))
		{
			echo "
			<script>
				alert('ERROR AL ELIMINAR, POR FAVOR COMUNIQUE AL ADMINISTRADOR DEL SISTEMA');
			</script>
			";
			$dbmy->RollbackTrans();
			die();
			exit();
		}
		$dbmy->CommitTrans();
	
		
}

echo "
<script>
AjaxConsulta('roles_aplicaciones1.php', {rol:$cod_rol}, 'contenedor');	
</script>
";

?>