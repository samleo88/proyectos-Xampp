<?php

include ("conexion.php");

$op=$_REQUEST['op'];
$id=$_REQUEST['codigo'];
$usuario=$_REQUEST['usuario'];
$nombre=$_REQUEST['nombre'];
$apellido=$_REQUEST['apellido'];
$clave=$_REQUEST['clave'];
$estado=$_REQUEST['estado'];
$celular=$_REQUEST['celular'];
$email=$_REQUEST['email'];



if($op=='I')
{
	$dbmy->beginTrans();
	$q="insert into usuarios(usuario,nombre,apellido,clave,estado,id_padre,celular,email) values('$usuario','$nombre','$apellido','$clave','$estado','1','$celular','$email')";
	//echo "<br>".$q;
	
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
if($op=='M')
{
	$dbmy->beginTrans();
	$q="update usuarios set usuario='$usuario',nombre='$nombre',apellido='$apellido',clave='$clave',estado='$estado',celular='$celular',email='$email' where id=$id";
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
}
if($op=='E')
{
	$q1="select * from rol_usuarios where cod_usuario='$id'";
	$eq1=$dbmy->Execute($q1);
	$fq1=$eq1->RecordCount();
	
	if($fq1==0)
	{
		$dbmy->beginTrans();
		$q="delete from usuarios where id=$id";
		
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
	else
	{
		echo "<script>alert('Existen aplicaciones y usuarios asociados por favor modifique y vuelva a intentarlo');</script>";
	}	
	
		
}

echo "
<script>
alert('Transaccion exitosa');
AjaxConsulta('usuario.php',{}, 'contenedor');	
</script>
";
?>