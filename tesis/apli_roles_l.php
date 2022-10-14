<?php

include ("conexion.php");

$op=$_REQUEST['op'];
$cod_rol=$_REQUEST['cod_rol'];
$cod_usuario=$_REQUEST['cod_usuario'];


if($op=='I')
{
	$dbmy->beginTrans();
	$q="insert into rol_usuarios(cod_rol,cod_usuario) values($cod_rol,$cod_usuario)";

	
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
		$q="delete from rol_usuarios where cod_rol=$cod_rol and cod_usuario=$cod_usuario";
		
		
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
AjaxConsulta('apli_roles.php', {rol:$cod_usuario}, 'contenedor');	
</script>
";


?>