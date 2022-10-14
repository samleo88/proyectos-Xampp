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
		
		<script src="../js/jquery.js"></script>
    <script src="js/back-to-top.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="estudiantes/myjava.js"></script>

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
                    <li><a href="../index.php">Inicio</a>
                    </li>
                    <li class="active">Administrador</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <!-- Content Row -->
<?php include('otros/menuAdministrador.php') ?>
    </div>
    <?php
    include('../includes/footer.php');
 ?>
</body>
    
    
    
    
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
   
    <script src="estudiantes/myjava.js"></script>
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
