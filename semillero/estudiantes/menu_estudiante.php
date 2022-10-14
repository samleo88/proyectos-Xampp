  <?php
       // session_start();
        $codigo = $_SESSION["Codigo"];
        include '../admin/conexion.php';

        $inscripciones = mysql_num_rows(mysql_query("SELECT * FROM inscripciones_asignaturas where idEstudiante = $codigo"));
        $tareas = mysql_num_rows(mysql_query("SELECT entrega_tareas.idEntregaTareas as id, entrega_tareas.CodigoTareaDocente CodigoDocente, asignaturas.NombreAsignatura as Asignatura, entrega_tareas.Descripcion as Descripcion,  entrega_tareas.CodigoEnvioTarea as CodigoTarea, entrega_tareas.Archivo as Archivo
            FROM  entrega_tareas INNER JOIN asignaturas ON  entrega_tareas.idAsignatura =  asignaturas.idAsignatura 
                     INNER JOIN estudiantes ON  entrega_tareas.idEstudiante =  estudiantes.idEstudiante
            where estudiantes.idEstudiante = '$codigo'"));
    
    ?>