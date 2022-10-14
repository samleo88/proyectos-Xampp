<?php
session_start();
include '../admin/conexion.php';

if(isset($_SESSION['NombreUsuario'])) {
     if ($_SESSION["NivelUsuario"] == 3) {
            $user = $_SESSION['NombreUsuario'];
            $codigo = $_SESSION["Codigo"];
			$a = $_SESSION["NivelUsuario"];
			if ($a == 1)
				{
					
				$tipo= "Administrador";
				}else {
				$tipo="invitado";
				}
        ?>
           <?php 
          $consulta1="select idCarrera, NombreCarrera from carreras";
          $carrera=mysql_query($consulta1);
          $consulta2="select idYearAcademico, NombreYear from years_academicos";
          $year=mysql_query($consulta2);
          $consulta3="select idCuatrimestre, NombreCuatrimestre from cuatrimestres";
          $cuatrimestre=mysql_query($consulta3);
		  $consulta4="select idGrupo, NumeroGrupo from grupos";
          $grupo=mysql_query($consulta4);
		  
		  $consulta=mysql_query("select Foto from estudiantes where idEstudiante = $codigo");                  
                while($filas=mysql_fetch_array($consulta)){
                         $foto=$filas['Foto'];                           
                 }

                 $consulta5 = mysql_query("select concat (NombresEstudiante, ' ', ApellidosEstudiante) as Estudiante from estudiantes where idEstudiante = $codigo"); 
                 while($filas2=mysql_fetch_array($consulta5)){
                         $estudiante=$filas2['Estudiante'];                           
                 }
         
        ?>

    <script src="../../js/jquery.js"></script>
    <script src="../js/back-to-top.js"></script>
    <script src="../../js/bootstrap.min.js"></script>


           <?php
                include ('menu_inicio_estudiante.php');
            ?>
       <br>
        <div class="container">
            <div class="row">
            <div class="col-lg-12">
            <div class="col-md-3"><img src="../imagenes/logoSIAD.png" width="80" height="80" class="img-responsive"></div>
             <div class="col-md-6">         
               
                <img src="../imagenes/banerEst.png" class="img-responsive">
                     
             </div>
			 
               <div class="col-md-3">
			   <img class="img-responsive img-circle" src="<?php echo $foto ?>" width="50px" height="50px">
              <h5><i class="fa fa-circle fa-stack-1x fa-inverse" style="color:green; text-align: left; "></i><b> &nbsp; Online:</b> <?php echo $estudiante ?></h5>
               </div> 

            </div>
              <div class="col-lg-12">              
                <ol class="breadcrumb">
                    <li><a href="index.php">Inicio</a>
                    </li>
                    <li class="active">Estudiantes</li>
                </ol>
            </div>
        </div> 
        <!-- /.row -->
        <div class="row">
            <!-- Content Column -->
                      
            <div class="col-md-9">
                <div class="containe">
      <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="btn-group pull-right">
            </div>

            <center>

            <h4>
 <a href="inscripcion_asignatura.php"> <button class="btn btn-warning" style="float: left; "><i class="fa fa-arrow-left"></i> Volver al Listado</button> </a> 
            <b>Nueva Inscripcion</b></h4>
            </center>
        </div>
        <div class="panel-body">
            <div class="row">
                 
		               <div style="margin-left: : 10px; margin-right: 10px;">
                  <form id="formulario" class="form-group" action="" method="post">
            <div class="modal-body">

          <div class="form-group"> <label for="carrera" class="col-md-3 control-label">Semillero:</label>
                         <div class="col-md-9">
                       <select class="form-control" id="carrera" name="carrera">
					   <option>--SEMILLERO--</option>
                      <?php 
                          while($fila=mysql_fetch_row($carrera)){
                          echo "<option value='".$fila['0']."'>".$fila['1']."</option>";
                          }
                          ?>
                      </select>
                       </div>
                    </div> <br>

                       <div class="form-group"> <label for="carrera" class="col-md-3 control-label">Grupo:</label>
                         <div class="col-md-9">
                       <select class="form-control" id="grupo" name="grupo">
					   <option>--Grupo--</option>
                      <?php 
                          while($fila=mysql_fetch_row($grupo)){
                          echo "<option value='".$fila['0']."'>".$fila['1']."</option>";
                          }
                          ?>
                      </select>
                       </div>
                    </div> <br>

                       <div class="form-group"> <label for="carrera" class="col-md-3 control-label">Semestre:</label>
                         <div class="col-md-9">
                       <select class="form-control" id="Cuatrimestre" name="cuatrimestre">
					    <option>--SEMESTRE--</option>
						<?PHP
							 while($fila=mysql_fetch_row($cuatrimestre)){
                          echo "<option value='".$fila['0']."'>".$fila['1']."</option>";
                          }
						  ?>
                      </select>
                       </div>
                    </div> <br>
					
					
					
					
              <div style="margin-top: 10px"> <center><input type="submit" value="Buscar"  class="btn btn-success" /></center>    </div>         
             </div>         
            </form>
           </div>
          </div> 
                         
          



           <!-- Fin del Panel 1 -->
  
        <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="btn-group pull-right">
            </div><center><h4><b>Listado de Asignaturas a Inscribir</b></h4></center></div>
        <div class="panel-body">
            <div class="row">        
                   <div style="margin-left: : 10px; margin-right: 10px;">
                  <table class="table table-striped table-condensed table-hover table-responsive">
                    <tr>
                     <th>Codigo</th>
                      <th>Asignatura</th>
                      <th>Observaciones</th>
                      <th>Opcion</th>
                    </tr>
                    
				 
				  <?php

                       if (!isset($_POST['carrera'])){
                       	$consulta = " ";
                       echo "<td colspan='2'>No existen Datos que Mostrar</td>";
                      }
                      else {
						  $consulta=mysql_query("
						  select idAsignatura, 
						  NombreAsignatura 
						  from asignaturas where Idcarrera = '".$_POST['carrera']."' 
						  and IdGrupo = '".$_POST['grupo']."' and idcuatrimestre = '".$_POST['cuatrimestre']."'
						  ORDER BY idAsignatura desc"); 
                     
                      	
                     
                     
                           while($filas=mysql_fetch_array($consulta)){
                                 $nombre=$filas['NombreAsignatura'];
                                 $id=$filas['idAsignatura'];
                       
				 
					?>
                      <tr>
					   <form action="inscripcion_asignaturas/recibir_inscripcion.php" method="post" name="editar">
                      
                      <td><?php echo $id ?></td>
                       <td><?php echo $nombre ?></td>
					<td width="50%"><input type="text" name="observacion" maxlength="250" class="form-control"></td>
					   
                      <td> 
                            
                             <input name="asignatura" type="hidden" value="<?php echo $id ?>" />
							 <input name="carrera" type="hidden" value="<?php echo $_POST['carrera']?>" />
							 <input name="grupo" type="hidden" value="<?php echo $_POST['grupo']?>" />
                             <input type="submit" title="Inscribir esta Asignatura" class="btn btn-success" name="Inscribir" value="Inscribir Asignatura" />
                             </form>

						 
                      <?php  } }?>



				 
                 
                      <tr>

                        
                      

                      <?php }?>
                      </td>
                    </tr>

                  </table>
       

                            </div>
                        </div>                   
        </div>
  
        </div>
        <!-- Fin del Panel 2 -->

      </div>
    </div>
</div>
</div>
        <hr>
    </div>
    <?php
    include('../includes/footer.php');
 ?>
</body>
</html>
<?php
     }
     else{
        echo '<script> alert("No Tienes los permisos para acceder a esta pagina.");</script>';
         echo '<script> window.location="../../login.php"; </script>';
     }

?>
