<?php 

	//$conexion=mysqli_connect('localhost','root','','pruebas');
	$conexion =  new mysqli("localhost","root","","prestaciones");

 ?>


<!DOCTYPE html>
<html>
<head>
	<title>mostrar datos</title>
</head>
<body>

<br>

	<table border="1" >
		<tr>
			<td>id</td>
			<td>cedula</td>
			<td>nombre</td>
			<td>apellido</td>
			<td>email</td>
			<td>fecha</td>
			<td>codigo</td>
			<td>ultima</td>
			<td>estado</td>	
		</tr>

		<?php 
		$sql="SELECT * from empleados";
		$result=mysqli_query($conexion,$sql);

		while($mostrar=mysqli_fetch_array($result)){
		 ?>

		<tr>
			<td><?php echo $mostrar['idempl'] ?></td>
			<td><?php echo $mostrar['cedula'] ?></td>
			<td><?php echo $mostrar['nombre'] ?></td>
			<td><?php echo $mostrar['apellido'] ?></td>
			<td><?php echo $mostrar['email'] ?></td>
			<td><?php echo $mostrar['fecha'] ?></td>
			<td><?php echo $mostrar['codigo'] ?></td>
			<td><?php echo $mostrar['ultima'] ?></td>
			<td><?php echo $mostrar['estado'] ?></td>
			
		</tr>
	<?php 
	}
	 ?>
	</table>

</body>
</html>