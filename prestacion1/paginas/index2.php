<?php

	require_once("../sesion.class.php");
	
	$sesion = new sesion();
	$usuario = $sesion->get("usuario_dq");
	
	if( $usuario == false )
	{	
		header("Location: ../index.php");		
	}
	else 
	{
	
	date_default_timezone_set('America/caracas');
$hora = date('H:i:s a');
$fecha = date('d-m-Y ');
$hh = '10';

 include_once("../config.php");

		
		$consulta = "select usuario,tipo,nombre,apellido,correo,imagen from administrador where usuario = '$usuario';";
		
		$result = $conexion->query($consulta);
		
		if($result->num_rows > 0)
		{
			$fila = $result->fetch_assoc();
			
			 $a=$fila["tipo"];
			
		  $b=$fila["nombre"];
			
			$c=$fila["apellido"];
			$d=$fila["correo"];
			$imagen=$fila["imagen"];

				
				if ($a == 1)
				{
				$tipo= "Administrador";
				}else {
				$tipo="invitado";
				}
		}


	?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Prestaciones </title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="../css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="../css/AdminLTE.css" rel="stylesheet" type="text/css" />
		 <link href="../../css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- iCheck for checkboxes and radio inputs -->
        <link href="../../css/iCheck/all.css" rel="stylesheet" type="text/css" />
        <!-- Bootstrap Color Picker -->
        <link href="../../css/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet"/>
        <!-- Bootstrap time Picker -->
        <link href="../../css/timepicker/bootstrap-timepicker.min.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="../calendar/tcal.css" />
	<script type="text/javascript" src="../calendar/tcal.js"></script> 

        <script src="../js/calendario/jquery-ui.min.js" type="text/javascript" ></script>
        <script src="../js/tipo_alimen.js"></script>
        <script src="../js/validarfrom.js"></script>
        <!--<script src="cordova.js"></script>-->




  <script src="../js/jquery.min.js"></script>
        <!-- jQuery UI 1.10.3 -->
        <script src="../js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>
        <!-- Morris.js charts -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="../js/plugins/morris/morris.min.js" type="text/javascript"></script>
        <!-- Sparkline -->
        <script src="../js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="../js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="../js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <!-- fullCalendar -->
        <script src="../js/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
        <!-- jQuery Knob Chart -->
        <script src="../js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="../js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="../js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="../js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

        <!-- AdminLTE App -->
        <script src="../js/AdminLTE/app.js" type="text/javascript"></script>
        
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="../js/AdminLTE/dashboard.js" type="text/javascript"></script>  

        <script>
        $(function() {
            $( "[data-role='navbar']" ).navbar();
            $( "[data-role='header'], [data-role='footer']" ).toolbar();
        });
        // Update the contents of the toolbars
        $( document ).on( "pagecontainerchange", function() {
            // Each of the four pages in this demo has a data-title attribute
            // which value is equal to the text of the nav button
            // For example, on first page: <div data-role="page" data-title="Info">
            var current = $( ".ui-page-active" ).jqmData( "title" );
            // Change the heading
            $( "[data-role='header'] h1" ).text( current );
            // Remove active class from nav buttons
            $( "[data-role='navbar'] a.ui-btn-active" ).removeClass( "ui-btn-active" );
            // Add active class to current nav button
            $( "[data-role='navbar'] a" ).each(function() {
                if ( $( this ).text() === current ) {
                    $( this ).addClass( "ui-btn-active" );
                }
            });
        });
    </script>
        <script type="text/javascript">
var objeto2;  
function decimales(objeto, e){               
 var keynum           
 var keychar           
 var numcheck          
 if(window.event){
  /*/ IE*/            
 keynum = e.keyCode         
 }          
 else if(e.which){ 
 /*/ Netscape/Firefox/Opera/*/          
 keynum = e.which         
 }            
 if((keynum>=35 && keynum<=37) ||keynum==8||keynum==9||keynum==46||keynum==39) {
             return true;         
 }          
 if(keynum==190||keynum==110||(keynum>=95&&keynum<=105)||(keynum>=48&&keynum<=57)){
  posicion = objeto.value.indexOf('.');               
  if(posicion==-1) {              
   return true;           
  }else { 
  if(!(keynum==190||keynum==110)){
   objeto2=objeto;
   t = setTimeout('dosDecimales()',150);
   return true;
  }else{
   objeto2=null;
   return false;
  }
 }
 }else {
 return false;
 }        
}
 
function dosDecimales(){    
 var objeto = objeto2;
 var posicion = objeto.value.indexOf('.');
 var decimal = 2;
 if(objeto.value.length - posicion < decimal){
  objeto.value = objeto.value.substr(0,objeto.value.length-1);                                        
 }else {
  objeto.value = objeto.value.substr(0,posicion+decimal+1);                                            
 }
 return;
}
 
function enteros(objeto, e){
 var keynum
 var keychar
 var numcheck
  if(window.event){ /*/ IE*/
   keynum = e.keyCode
  }
  else if(e.which){ /*/ Netscape/Firefox/Opera/*/
   keynum = e.which
  }
  if((keynum>=35 && keynum<=37) ||keynum==8||keynum==9||keynum==46||keynum==39) {
   return true;
  }
  if((keynum>=95&&keynum<=105)||(keynum>=48&&keynum<=57)){
   return true;
  }else {
   return false;
  }
}
 
function caracteres(e) {
    tecla = (document.all) ? e.keyCode : e.which;
 if (tecla==8 || tecla==37 || tecla<=38 || tecla==39 || tecla<=40) return true;
    patron =/[A-Za-z]/;
    te = String.fromCharCode(tecla);
    return patron.test(te);
}
</script>
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="#" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                Prestaciones Sociales
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        <li class="dropdown messages-menu">
                          
                            
                        <!-- Notifications: style can be found in dropdown.less -->
                        
                        <!-- Tasks: style can be found in dropdown.less -->
                        <li class="dropdown tasks-menu">
                           
                           
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span> <?php echo $b;  ?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
								
								
                                    <img src="../img/<?php echo $imagen; ?>" class="img-circle" alt="User Image" />
                                    <p>
                                        <?php echo $b;  ?>, <?php echo $c; ?> 
                                        <small><?php echo $d; ?></small>
										<small><?php echo $tipo; ?></small>
										
                                    </p></br>
                                </li>
                                <!-- Menu Body -->
                                
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    
                                    <div class="pull-right">
                                        <a href="cerrar.php"  id="closed"  class="btn btn-default btn-flat" data-id="info" data-ajax="false">Salir</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="../img/avatar3.png" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>hola, <?php echo $usuario;  ?></p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Conectado</a>
                        </div>
                    </div>
                    <!-- search form -->
                   
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        
                        <li class="active"><?php
							if($a==1){
								echo '
                            <a href="index2.php" data-ajax="false">';
							}else {
							echo '
                            <a href="index2.php" data-ajax="false">';
							
							}  ?>
                                <i class="fa fa-th"></i> <span>Principal</span> 
                            </a>
                        </li>
                        <li class="treeview">
						
						<?php
							if($a==1){
								echo '
                            <a href="index2.php" data-ajax="false">';
							}else {
							echo '
                            <a href="index2.php" data-ajax="false">';
							
							}  ?>
                            
                               
                                <span>Registro De Hoja de vida</span>
                               <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                
                                <li><a href="empleadoslista.php" data-ajax="false"><i class="fa fa-angle-double-right"></i>Crear hoja de vida </a></li>
								
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                
                                <span>Prestaciones</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="empleadoslista.php" data-ajax="false"><i class="fa fa-angle-double-right"></i>Consultar Prestacion</a></li>
                                
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                 <span>Salarios & Intereses</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="meses.php" data-ajax="false"><i class="fa fa-angle-double-right"></i>Consulta Salario</a></li>
								
                            </ul>
                        </li>
                       
					
					   
                       <li class="treeview">
                            <a href="categorias.php?cate=5" data-ajax="false">
                                <i class="fa fa-angle-left pull-right"></i> <span>Liquidacion </span>
                            </a>
                            <ul class="treeview-menu">
                     <li><a href="liquidacionlista2.php" data-ajax="false"><i class="fa fa-angle-double-right"></i>Solicitar Liquidacion</a></li>
					 		  
                            </ul>
                        </li>
						<li class="treeview">
                            <a href="categorias.php?cate=5" data-ajax="false">
                                <i class="fa fa-angle-left pull-right"></i> <span>Certificados laborales </span>
                            </a>
                            <ul class="treeview-menu">
                     <li><a href="liquidacionlista2.php" data-ajax="false"><i class="fa fa-angle-double-right"></i>Solicitar certificado</a></li>
					 		  
                            </ul>
                        </li>
						
                      </ul>
					
                </section>
                <!-- /.sidebar -->
				
				
            </aside>
			 <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Prestaciones Sociales
                        <small>& liquidaciones </small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> INICIO</a></li>
                        <li class="active">Categoria Principales</li>
                    </ol>
                </section>

                       <!-- Main content -->
                <section class="content">
                    <h4 class="page-header">
                        OPCIONES PRINCIPALES PARA REGISTRO Y MANTENIMIENTO DE LAS PRESTACIONES SOCIALES<small>seleccione la opcion que desea editar o Consultar <code>!seleccione correctamente¡</code><code></code></small>
                   </h4>
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-purple">
                                <div class="inner">
                                    <h3>
                                         HOJA DE VIDA
                                    </h3>
                                    <p>
                                        agregar o editar Hoja de vida
                                    </p>
                                </div>
								
                                <div class="icon"><a href="empleadoslista.php"  id="alimen" data-icon="custom" data-transition="slide" data-prefetch="true" data-id="alimen" class="small-box-footer"><img src="../css/images/empleado2.png"  width='50' height='50'  alt="">
                                    
                                </div>
                                
                                    MAS INFORMACION <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
						
						<!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>
                                       Prestaciones<sup style="font-size: 20px"></sup>
                                    </h3>
                                    <p>
                                       Prestaciones Sociales
                                    </p>
                                </div>
                                <div class="icon">
                                    <a href="empleadoslista.php" class="small-box-footer"><img src="../css/images/prestacion2.png"  width='50' height='50'  alt="">
                                </div>
                                <a href="empleadoslista.php" class="small-box-footer">
                                    MAS INFORMACION <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-blue">
                                <div class="inner">
                                    <h3>Liquidacion </h3>
                                    <p>
                                        Planillas de Liquidacion
                                    </p>
                                </div>
                                <div class="icon">
                                    <a href="liquidacionlista2.php" class="small-box-footer"><img src="../css/images/liquida.png"  width='50' height='50'  alt="">
                                </div>
                                <a href="liquidacionlista2.php" class="small-box-footer">
                                    MAS INFORMACION <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>
                                       Salarios 
                                    </h3>
                                    <p>
                                        Salarios & Intereses.
                                    </p>
                                </div>
                                <div class="icon">
                                     <a href="meses.php" class="small-box-footer"><img src="../css/images/liquidacion2.png"  width='50' height='50'  alt="">
                                </div>
                                <a href="meses.php" class="small-box-footer">
                                    MAS INFORMACION <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                    </div><!-- /.row -->

                    <!-- Small boxes (Stat box) -->
                 
                    <!-- Widgets as boxes -->
                  

                   
                        <!-- START ACCORDION & CAROUSEL-->
                   
                    <div class="row">
                        <div class="col-md-6">
                            <div class="box box-solid">
                                <div class="box-header">
                                    <h3 class="box-title">Ultimos pagos de Parafiscales</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    
                                        <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                      
	
  
  			
     

   
</center>
<table id="example1" class="table  table-bordered table-striped">

  <tbody>
    <tr style="background:#6666666;">
      <td bgcolor="#CCCCCC" >Codigo</td>
      <td bgcolor="#CCCCCC">Nombre</td>
      <td bgcolor="#CCCCCC">Apellido</td>
	   <td bgcolor="#CCCCCC">Estado</td>
	  <td width="10%" scope="col">Opciones</td>
	 
    </tr>
 
 </tbody>
	</table>
                                          
                            
                        <!-- ./col -->
                    <!-- /.row -->
												
                                        
                                   
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div><!-- /.col -->
                       <div class="col-md-6">
                            <div class="box">
                                <div class="box-header">
	<h3 class="box-title">Certificados de nomina</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">

	

 

</center>
<table id="example1" class="table  table-bordered table-striped">

  <tbody>
    <tr style="background:#6666666;">
      <td bgcolor="#CCCCCC" >Fecha Inicio</td>
      <td bgcolor="#CCCCCC">Fecha Fin</td>
      <td bgcolor="#CCCCCC">Salario</td>
	  <td bgcolor="#CCCCCC">Interes</td>
	  <td bgcolor="#CCCCCC">Dias Libres</td>
	  <td width="10%" scope="col">Opciones</td>
	 
    </tr>
 
 </tbody>
	</table>
									
									
							

                      
                        </div><!-- /.col -->
								<!-- END ACCORDION & CAROUSEL-->
			</section>			
			<!-- Right side column. Contains the navbar and content of the page -->
						
						
						
			<aside class="right-side">
			
			
            
			<?php
			}

			?>