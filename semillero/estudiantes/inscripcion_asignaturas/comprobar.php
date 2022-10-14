
<!DOCTYPE html PUBLIC "-//Clase A.O 1.0 ">
<html>
<head>
<title>Comprobar datos</title> 

</head>
<body>
<h1>Tus Datos de suscripción: </h1>
<p>Estos son los datos que nos has enviado:</p>
<?php  

echo "Semillero: "; echo $_POST['carrera']; echo "<br/>";
echo "Grupo: "; echo $_POST['grupo']; echo "<br/>";
echo "Asignatura: "; echo $_POST['idAsignatura']; echo "<br/>";
echo "Observacion: "; echo $_POST['observaciones']; echo "<br/>";
echo "Estudiante: "; echo $_POST['codigo']; echo "<br/>";
echo "Fecha: "; echo  date("Y-m-d"); echo "<br/>";


?>
<p>Comprueba tus datos antes de enviarlos, si no están bien vuelve a escribirlos.</p>
<p>Los datos son correctos: <a href="enviar.html">Enviar</a>
<p>Los datos no son correctos: <a href="../inscribir_asignatura.php">Volver a escribirlos</a>

</body>
</html>

