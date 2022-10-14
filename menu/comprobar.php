
<!DOCTYPE html PUBLIC "-//Clase A.O 1.0 ">
<html>
<head>
<title>Comprobar datos</title> 

</head>
<body>
<h1>Tus Datos de suscripción: </h1>
<p>Estos son los datos que nos has enviado:</p>
<?php  
echo "Nombre Completo: "; echo $_POST['nombre']; echo "<br/>";
echo "Apellidos: "; echo $_POST['apellidos']; echo "<br/>";
echo "E-mail: "; echo $_POST['email']; echo "<br/>";
echo "Nivel educativo: "; echo $_POST['edu']; echo "<br/>";
echo "Cedula: "; echo $_POST['cedu']; echo "<br/>";
echo "Sexo: "; echo $_POST['sexo']; echo "<br/>";
echo "contraseña: "; echo $_POST['contras']; echo "<br/>";

echo "Facultad que le interesa: "; echo $_POST['estudios']; echo "<br/>";
 
echo "Día de la semana: "; echo $_POST['dia']; echo "<br/>";
echo "Tu comentario: "; echo $_POST['comentario']; echo "<br/>";
?>
<p>Comprueba tus datos antes de enviarlos, si no están bien vuelve a escribirlos.</p>
<p>Los datos son correctos: <a href="enviar.html">Enviar</a>
<p>Los datos no son correctos: <a href="index.php">Volver a escribirlos</a>

</body>
</html>

