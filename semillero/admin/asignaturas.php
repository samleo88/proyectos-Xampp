<?php
session_start();
include 'conexion.php';

if(isset($_SESSION['NombreUsuario'])) {
     if ($_SESSION["NivelUsuario"] == 1) {
            $user = $_SESSION['NombreUsuario'];
              $codigo = $_SESSION["Codigo"];
			  $a = $_SESSION["NivelUsuario"];
			if ($a == 1)
				{
					
				$tipo= "Administrador";
				}else {
				$tipo="invitado";
				}

              $consulta=mysql_query("select Foto from usuarios where Codigo = $codigo");                  
                while($filas=mysql_fetch_array($consulta)){
                         $foto=$filas['Foto'];                           
                 }
        ?>
           <?php 
          $consulta1="select IdCarrera, NombreCarrera from carreras";
          $carrera=mysql_query($consulta1);
           $consulta2="select idGrupo, NumeroGrupo from grupos";
          $grupos=mysql_query($consulta2);
           $consulta3="select idCuatrimestre, NombreCuatrimestre from cuatrimestres";
          $cuatrimestre=mysql_query($consulta3);
        ?>

    <link rel="shortcut icon" href="../imagenes/logoUNI.ico" type="image/x-icon">
  
    <script src="../js/jquery.js"></script>
   
    <script src="../js/bootstrap.min.js"></script>
    <script src="asignaturas/myjava.js"></script>


<body>
           <?php
        include ('menuAdmin.php');
            ?>
       <br>
        <div class="container">
            <div class="row">
            <div class="col-lg-12">
            <div class="col-md-3"><img src="../imagenes/logoSIAD.png" width="80" height="80" class="img-responsive"></div>
             <div class="col-md-6">         
               
                <img src="../imagenes/baner.png" class="img-responsive">
                     
             </div>
                <div class="col-md-3">
               <img class="img-responsive img-circle" src="<?php echo $foto ?>" width="50px" height="50px">
              <h5><i class="fa fa-circle fa-stack-1x fa-inverse" style="color:green; text-align: left; "></i><b> &nbsp; Online:</b> <?php echo $user ?>    
              </h5>
               </div>  

            </div>
            <div class="col-lg-12">
                    <ol class="breadcrumb">
                    <li><a href="../index.php">Inicio</a></li>
                    <li><a href="admin.php">Administrador</a></li>
                    <li class="active">Contenidos</li>
                </ol>
            </div>
        </div> 
        <!-- /.row -->
        <!-- Content Row -->
<?php //include('otros/menuAdministrador.php') ?>
       <div class="row">
            <!-- Content Column -->
            <div class="col-md-9">
                <div class="container">
      <div class="panel panel-success">
        <div class="panel-heading">
            <div class="btn-group pull-right">
            </div>
            <center><h4><b>Administracion de Contenidos</b></h4></center>
        </div>
        <div class="panel-body">
            <div class="row">
		               <div class="col-md-1"><h4>Buscar:</h4></div>
		               <div class="col-md-5">
		               <input type="text" name="s" id="bs-prod" class="form-control" placeholder="Escribir el nombre del Contenido">
		               </div>
		               	<div class="col-md-6">
		                  <button id="nuevo-producto" class="btn btn-success"> <i class="glyphicon glyphicon-plus"></i> Nuevo Contenido</button> 
		               </div>
	              <br>
 <br>
    <div class="registros" style="width:100%;" id="agrega-registros"></div>
      <div class="col-md-6" style="text-align: left;">
		    <center>
		        <ul class="pagination" id="pagination"></ul>
		    </center>
      </div>
      <div class="col-md-6">
		   <center>
		   <h4 style="font-weight: bold;"> 
    <?php
include('conexion.php');
    $numeroRegistros = mysql_num_rows(mysql_query("SELECT * FROM asignaturas"));
    echo "Registros Totales: $numeroRegistros";
        ?>
        </h4>
          </center>
      </div>
   
  
    <!-- MODAL PARA EL REGISTRO-->
    <div class="modal fade" id="registra-datos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header" style="background:#337ab7; text-align: center;">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" style="color:white;" id="myModalLabel"><b>
              <i class='glyphicon glyphicon-tasks'></i>&nbsp;&nbsp;Contenido</b></h4>
            </div>
            <form id="formulario" class="form-group" onsubmit="return agregarRegistro();">
            <div class="modal-body">

            <input type="text" class="form-control" required readonly id="id-registro" name="id-registro" readonly="readonly" style="visibility:hidden; height:5px;"/>

                 <div class="form-group"> <label for="codigo" class="col-md-2 control-label">Proceso:</label>
				<div class="col-md-10"><input type="text" class="form-control" required readonly id="pro" name="pro" hidden="true" /></div>
			   </div> <br>

               <div class="form-group"> <label for="carnet" class="col-md-2 control-label">Contenido:</label>
				<div class="col-md-10"><input type="text" class="form-control" id="nombre" name="nombre" required maxlength="50"></div>
			   </div> <br>    
                     <div class="form-group"> <label for="carrera" class="col-md-2 control-label">Semillero:</label>
                         <div class="col-md-10">
                       <select class="form-control" id="carrera" name="carrera">
                     <?php 
                          while($fila=mysql_fetch_row($carrera)){
                          echo "<option value='".$fila['0']."'>".$fila['1']."</option>";
                          }
                          ?>
                      </select>
                       </div>
                    </div> <br>
                    <div class="form-group"> <label for="cuatrimestre" class="col-md-2 control-label">Semestre:</label>
                         <div class="col-md-10">
                       <select class="form-control" id="cuatrimestre" name="cuatrimestre">
                     <?php 
                          while($fila=mysql_fetch_row($cuatrimestre)){
                          echo "<option value='".$fila['0']."'>".$fila['1']."</option>";
                          }
                          ?>
                      </select>
                       </div>
                    </div> <br>
                    
                    <div class="form-group"> <label for="year" class="col-md-2 control-label">Grupo:</label>
                         <div class="col-md-10">
                       <select class="form-control" id="year" name="year">
                     <?php 
                          while($fila=mysql_fetch_row($grupos)){
                          echo "<option value='".$fila['0']."'>".$fila['1']."</option>";
                          }
                          ?>
                      </select>
                       </div>
                    </div> <br>

                 <div id="mensaje"></div>           
             </div>         
            <div class="modal-footer">
                <input type="submit" value="Registrar" class="btn btn-success" id="reg"/>
                <input type="submit" value="Editar" class="btn btn-warning"  id="edi"/>
            </div>
            </form>
          </div>
        </div>
      </div>
            </div>
        </div>
    </div>

            </div>
                    
        </div>
        <!-- Fin del Panel -->
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
         echo '<script> window.location="../login.php"; </script>';
     }
}else{
 echo '<script> window.location="../login.php"; </script>';
}
?>
