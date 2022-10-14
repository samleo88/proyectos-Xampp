<?php
include('../../admin/conexion.php');
session_start();
$codigo = $_SESSION["Codigo"];
$id = $_POST['id'];

mysql_query("DELETE FROM actas WHERE idActa = '$id'");

$registro = mysql_query("SELECT  actas.idActa AS id, actas.idDocente as idDocente, actas.Descripcion AS Descripcion, actas.Archivo as Archivo, actas.Codigo as Codigo, actas.Fecha as Fecha, numeros_asignaciones.numeroAsignado as Numero
FROM actas INNER JOIN numeros_asignaciones ON actas.idNumeroAsignacion = numeros_asignaciones.idNumeroAsignacion
where actas.idDocente = '$codigo' ORDER BY actas.idActa ASC");

echo '<table class="table table-striped table-condensed table-hover table-responsive">
        	          <tr>
                   
                        <th width="15%">Descripcion</th> 
                        <th width="15%">Archivo</th>
                        <th width="15%">Codigo M.</th>
                        <th width="15%">Fecha</th> 
                        <th width="15%">Asignacion</th>                  
                        <th width="20%">Opciones</th>
                   </tr>';
	while($registro2 = mysql_fetch_array($registro)){
		        echo '<tr>
		                     
                          <td>'.$registro2['Descripcion'].'</td>
                          <td>'.$registro2['Archivo'].'</td>
                          <td>'.$registro2['Codigo'].'</td>
                          <td>'.$registro2['Fecha'].'</td>
                          <td>'.$registro2['Numero'].'</td>                 
                           <td> <a href="acta/pdf/archivo.php?id='.$registro2['id'].'"> <img src="images/verArchivo.png" width="25" height="25" alt="delete" title="Ver Archivo" /></a>
                              <a href="javascript:eliminarRegistro('.$registro2['id'].');">
                             <img src="images/borrar.png" width="25" height="25" alt="delete" title="Eliminar" /></a>                                        
                             </td>
			         	</tr>';
	}
echo '</table>';
?>