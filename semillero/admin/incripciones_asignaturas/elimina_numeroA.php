<?php
include('../conexion.php');

$id = $_POST['id'];

if (!mysql_query("DELETE FROM inscripciones_asignaturas WHERE idInscripcion = '$id'")) {
  echo '<script> alert("Este registro no se puede borrar porque esta siendo utilizado por el sistema.");</script>';
}

$registro = mysql_query("SELECT * FROM inscripciones_asignaturas");


	
       while($registro2 = mysql_fetch_array($registro)){
          echo '<tr>
                             
                              <td>'.$registro2['Carrera'].'</td>
                              <td>'.$registro2['Asignatura'].'</td>
                              <td>'.$registro2['Estudiantes'].'</td>
                              <td>'.$registro2['fecha'].'</td>
                              <td>'.$registro2['observaciones'].'</td>
							  <td> <a href="javascript:editarRegistro('.$registro2['id'].');">
                              <img src="images/lapiz.png" width="25" height="25" alt="delete" title="Editar" /></a>
                              <a href="javascript:eliminarRegistro('.$registro2['id'].');">
                             <img src="images/borrar.png" width="25" height="25" alt="delete" title="Eliminar" /></a>
                             </td>
                       </tr>';
					}
	
echo '</table>';
?>