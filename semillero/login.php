<!DOCTYPE html>

<html class="no-js">

<head>
  
    <title>SEMILLERO</title>
  
    <link rel="shortcut icon" href="imagenes/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="inicio/css/bootstrap.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="inicio/css/estilo.css">
       
	  
	<link rel="stylesheet" href="./inicio/css/main.css">
	<script src="./js/jquery-3.1.1.min.js"></script>
	<script src="./js/bootstrap.min.js"></script>
	<script src="./js/material.min.js"></script>
	<script src="./js/ripples.min.js"></script>
	<script src="./js/sweetalert2.min.js"></script>
	<script src="./js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="./js/main.js"></script>
	<script>
		$.material.init();
	</script>
  
</head>
<body class="" style="background-image: url(imagenes/inicio.jpg);">

    
        <div class="row">
            <div class="panel-body" id="login-wrapper">
                
                   
					 <br> 
                    <div class="panel-body" >
						<form class="full-box logInForm"  method="post" action="login/validar.php" >
						<div style="text-align: center;" >
                       <p class="text-center text-muted"><i class="zmdi zmdi-account-circle zmdi-hc-5x"></i></p>
						<p class="text-center text-muted text-uppercase">Inicia sesión con tu cuenta</p>
						</div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="text" style="text-align: center;" class="form-control" name="usuario" placeholder="Introduce tu Email" required="true">
                                    <i class="fa fa-envelope"></i>
                                </div>
                            </div>
                            <div class="form-group">
                               <div class="col-md-12">
                                    <input type="password" style="text-align: center;" class="form-control" name="password" placeholder="Introduce tu Password" required="true">
                                    <i class="fa fa-lock"></i>
                                </div>
                            </div>
                            <center><h6 style="color:green;">Contacte al administrador para obtener sus credenciales de acceso</h6></center>
                            <div class="form-group">
                               <div class="col-md-12">
                               <center>
                                <input type="submit" name="Submit" value="Entrar"  class="btn btn-success" >
                                <a href="index.php" class="btn btn-danger">Salir</a>                             
                                 </center> 
                                </div>
                            </div>
                        </form>
                    </div>
                
            </div>
        </div>
  
	

</body>

</html>
