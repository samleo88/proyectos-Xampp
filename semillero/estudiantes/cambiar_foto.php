
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

                        $consulta=mysql_query("select Foto from estudiantes where idEstudiante = $codigo");                  
                           while($filas=mysql_fetch_array($consulta)){
                                 $foto=$filas['Foto'];                           
                 }


               $consulta=mysql_query("select Foto from estudiantes where idEstudiante = $codigo");                  
                while($filas=mysql_fetch_array($consulta)){
                         $foto=$filas['Foto'];                           
                 }

                 $consulta2 = mysql_query("select concat (NombresEstudiante, ' ', ApellidosEstudiante) as Estudiante from estudiantes where idEstudiante = $codigo"); 
                 while($filas2=mysql_fetch_array($consulta2)){
                         $estudiante=$filas2['Estudiante'];                           
                 }

                 ?>


<?php
include ('menu_inicio_estudiante.php');
 ?>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        
            <div class="row">
            <div class="col-lg-12">
            <div class="col-md-3"><img src="../imagenes/logoSIAD.png" width="80" height="80" class="img-responsive"></div>
                 <div class="col-md-6">         
               
                <img src="../imagenes/banerEst.png" class="img-responsive">
                     
             </div>
               <div class="col-md-3">
               <br>
               <img class="img-responsive img-circle" src="<?php echo $foto ?>" width="50px" height="50px">
              <h5><i class="fa fa-circle fa-stack-1x fa-inverse" style="color:green; text-align: left; "></i><b> &nbsp; Online:</b> <?php echo $estudiante ?>
             
              </h5>
               </div> 

            </div>

            <div class="col-lg-12">
                    <ol class="breadcrumb">
                    <li><a href="../index.php">Inicio</a></li>
                    <li class="active">Estudiantes</li>
                </ol>
            </div>
        <!-- /.row -->

        <!-- Content Row -->
    
            <!-- Sidebar Column -->
            <?php
include ('menu_estudiante.php');
 ?>
            <!-- Content Column -->
            <div class="col-md-9">
                      <div class="containe">
      <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="btn-group pull-right">
            </div>
            <center>
            <h4><b>Cambio de Foto de Usuario</b></h4>
            </center>
        </div>
        <div class="panel-body">
            <div class="row">
                 
                       <div style="margin-left: : 10px; margin-right: 10px;">
                  <form id="formulario" action="recibir_foto.php" class="form-group" action="" method="post" enctype="multipart/form-data">
            <div class="modal-body">

          <div class="form-group"> <label for="carrera" class="col-md-1 control-label">Foto:</label>
                         <div class="col-md-9">
                      <input type="file" name="foto" id="foto" required="true" class="form-control">
                       </div>
                    </div> <br>
              <div style="margin-top: 10px"> <center><input type="submit" value="Cambiar Foto"  class="btn btn-success" /></center>    </div>         
             </div>         
            </form>
                            </div>
                        </div>                  
                </div>
        </div>
</div>
                    

            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
      

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
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
