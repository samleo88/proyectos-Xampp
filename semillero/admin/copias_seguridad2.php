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

    <link rel="shortcut icon" href="../imagenes/logoUNI.ico" type="image/x-icon">

    <script src="../js/jquery.js"></script>
    <script src="js/back-to-top.js"></script>
    <script src="../js/bootstrap.min.js"></script>

 

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
              <h5><i class="fa fa-circle fa-stack-1x fa-inverse" style="color:green; text-align: left; "></i><b> &nbsp; Online:</b> <?php echo $user ?></h5>
               </div> 

            </div>
            <div class="col-lg-12">
                    <ol class="breadcrumb">
                    <li><a href="../index.php">Inicio</a></li>
                    <li><a href="admin.php">Administrador</a></li>
                    <li class="active">Backup Semillero</li>
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
   
      <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="btn-group pull-right">
            </div>
            <center><h4><b>Copias de Seguridad de la Base de Datos</b></h4></center>
        </div>
        <div class="panel-body">
        
         
           <?php
        include 'backup/Connet.php';
    ?>
 <div class="row">
         <form action="backup/Backup.php" method="post">
                  <!--Fin del Segundo Row !-->
                    <div class="col-md-4">
                       <center>
                        <img src="images/db.png">
                        <input type="submit" name="copia" value="Realizar Copia de Seguridad" class="btn btn-success">
                       </center>
                       </form>
                   </div>
                   <div class="col-md-6">
                       <center>
                        <img src="images/db2.png">
                            
      <form action="backup/Restore.php" method="POST">
        <label>Selecciona un punto de restauraci??n</label>
        <select name="restorePoint" class="form-control" required="true">
            <option value="" disabled="" selected="">Selecciona un punto de restauraci??n</option>
            <?php
                $ruta="backup/".BACKUP_PATH;
                if(is_dir($ruta)){
                    if($aux=opendir($ruta)){
                        while(($archivo = readdir($aux)) !== false){
                            if($archivo!="."&&$archivo!=".."){
                                $nombrearchivo=str_replace(".sql", "", $archivo);
                                $nombrearchivo=str_replace("-", ":", $nombrearchivo);
                                $ruta_completa=$ruta.$archivo;
                                if(is_dir($ruta_completa)){
                                }else{
                                    echo '<option value="'.$ruta_completa.'">'.$nombrearchivo.'</option>';
                                }
                            }
                        }
                        closedir($aux);
                    }
                }else{
                    echo $ruta." No es ruta v??lida";
                }
            ?>
        </select>
        <br>
        <button type="submit" class="btn btn-primary" >Restaurar</button>
    </form>                        </center>
                   </div> 
                 </form>             
        </div>
        <!-- Fin del Panel -->
      </div>
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
