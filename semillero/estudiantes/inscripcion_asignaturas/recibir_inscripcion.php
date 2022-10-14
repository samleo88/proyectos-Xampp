<?php 
session_start();
$codigo = $_SESSION["Codigo"];

include ('../../admin/conexion.php');

$carrera= $_POST['carrera'];
$grupo=$_POST['grupo'];
$asignatura=$_POST['asignatura'];
$observaciones=$_POST['observacion'];
$estudiante=$codigo;
$fecha = date("Y-m-d");


echo $carrera; echo "<br/>";
echo $grupo; echo "<br/>";
echo $asignatura; echo "<br/>";
echo $observaciones; echo "<br/>";
echo $estudiante; echo "<br/>";


$guardar = mysql_query("INSERT INTO inscripciones_asignaturas (idCarrera, idAsignatura, idEstudiante, fechaInscripcion, observaciones) VALUES('$carrera', '$asignatura','$estudiante','$fecha','$observaciones')");

					if ($guardar) {
							  echo '<script> alert("Inscripcion Realizada Correctamente.");</script>';
					       echo '<script> window.location="../inscripcion_asignatura.php"; </script>';
					}
					else
					{
							  echo '<script> alert("Error al Inscribir la asignatura. Intente de Nuevo.");</script>';
					          echo '<script> window.location="../inscripcion_asignatura.php"; </script>';
					}
					
					
?>
