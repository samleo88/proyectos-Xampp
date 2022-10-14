<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Semilleros </title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="../fuente/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="../fuente/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="../fuente/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="../fuente/css/AdminLTE.css" rel="stylesheet" type="text/css" />
		 <link href="../../fuente/css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- iCheck for checkboxes and radio inputs -->
        <link href="../../fuente/css/iCheck/all.css" rel="stylesheet" type="text/css" />
        <!-- Bootstrap Color Picker -->
        <link href="../../fuente/css/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet"/>
        <!-- Bootstrap time Picker -->
        <link href="../../fuente/css/timepicker/bootstrap-timepicker.min.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="../fuente/calendar/tcal.css" />
	<script type="text/javascript" src="../fuente/calendar/tcal.js"></script> 

        <script src="../fuente/js/calendario/jquery-ui.min.js" type="text/javascript" ></script>
        <script src="../fuente/js/tipo_alimen.js"></script>
        <script src="../fuente/js/validarfrom.js"></script>
        <!--<script src="cordova.js"></script>-->




  <script src="../fuente/js/jquery.min.js"></script>
        <!-- jQuery UI 1.10.3 -->
        <script src="../fuente/js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="../fuente/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="../js/bootstrap.min.js"></script>
        <!-- Morris.js charts -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="../fuente/js/plugins/morris/morris.min.js" type="text/javascript"></script>
        <!-- Sparkline -->
        <script src="../fuente/js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="../fuente/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="../fuente/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <!-- fullCalendar -->
        <script src="../fuente/js/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
        <!-- jQuery Knob Chart -->
        <script src="../fuente/js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="../fuente/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="../fuente/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="../fuente/js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

        <!-- AdminLTE App -->
        <script src="../fuente/js/AdminLTE/app.js" type="text/javascript"></script>
        
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="../fuente/js/AdminLTE/dashboard.js" type="text/javascript"></script>  

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
               CIBERSEGURIDAD
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
				 <div class="responsive">
           
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-center">
					
					 
					
                    <li >
                        <a href="material_didactico.php" ><i class="glyphicon glyphicon-folder-open"></i> &nbsp;  Material Didactico</a>
                    </li>
                    <li>
                        <a href="planificacion_tarea.php"><i class="glyphicon glyphicon-file"></i> &nbsp; Planificacion de Tareas</a>
                    </li>
                    <li>
                        <a href="evaluacion_estudiantes.php"><i class="glyphicon glyphicon-pencil"></i> &nbsp; Pantalla de Evaluaciones</a>
                    </li>
                    <li>
                        <a href="pantalla_reportes.php"><i class="glyphicon glyphicon-list-alt"></i> &nbsp; Pantalla de Reportes</a>
                    </li>
                    
					 <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span> <?php echo $user ?> <!-- User db --><i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
								
								
                                    <img src="<?php echo $foto ?>" class="img-circle" alt="User Image" /> <!-- aca se trae la imagen del usuario -->
                                    <p>
										<?php echo $docente ?> <!-- aca se trae el nombre y el apellido del usuario -->
                                        <small><?php echo $user ?></small> <!-- aca se trae el correo del usuario -->
										<small><?php echo $tipo ?></small> <!-- aca se trae el tipo del usuario -->
										
                                    </p></br>
                                </li>
                                <!-- Menu Body -->
                                
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    
                                    <div class="pull-right">
                                        <a href="../login/logout.php"  id="closed"  class="btn btn-default btn-flat" data-id="info" data-ajax="false">Salir</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                </ul>

            </div>
         
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
                            <img src="<?php echo $foto ?>" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>HOLA <br> <?php echo $docente ?></p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Conectado</a>
                        </div>
                    </div>
                    <!-- search form -->
                   
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        
                        <li class="active">
							
                            <a href="docentes.php" data-ajax="false">
							
                                <i class="fa fa-th"></i> <span>Principal</span> 
                            </a>
                        </li>
						<li class="active">
							<a href="material_didactico.php" class="list-group-item"> <i class="glyphicon glyphicon-folder-open"></i>   &nbsp;&nbsp; Material Didactico
							</a>
						</li>
						
						<li class="active">
							<a href="planificacion_tarea.php" class="list-group-item"><i class="glyphicon glyphicon-file"></i>   &nbsp;&nbsp; Planificacion de Tareas
							</a>
						</li>
						
						<li class="active">
							<a href="evaluacion_estudiantes.php" class="list-group-item"> <i class="glyphicon glyphicon-pencil"></i>   &nbsp;&nbsp; Pantalla de Evaluacion
							</a>
						</li>
						<li class="active">
							<a href="ver_tarea_estudiante.php" class="list-group-item"> <i class="glyphicon glyphicon-edit"></i>   &nbsp;&nbsp; Tarea de Estudiantes
							</a>
						</li>
						<li class="active">
							<a href="cambiar_foto.php" class="list-group-item"> <i class="glyphicon glyphicon-user"></i>   &nbsp;&nbsp; Cambiar Foto
							</a>
						</li>
						<li class="active">
							<a href="pantalla_reportes.php" class="list-group-item"> <i class="glyphicon glyphicon-list-alt"></i>   &nbsp;&nbsp; Pantalla de Reportes
							</a>
						</li>
						<li class="active">
							<a href="reportes/Mis_Asignaciones.php" class="list-group-item"><i class="glyphicon glyphicon-chevron-right"></i>   &nbsp;&nbsp; Asignaciones por Docente
							</a>
						</li>
						<li class="active">
							<a href="estudiantes_x_asignaturas.php" class="list-group-item"><i class="glyphicon glyphicon-chevron-right"></i>   &nbsp;&nbsp; Estudiantes por Asignatura
							</a>
						</li>
						<li class="active">
							<a href="entrega_tareas_estudiantes.php" class="list-group-item"> <i class="glyphicon glyphicon-chevron-right"></i>   &nbsp;&nbsp; Entrega de Tareas
							</a>
						</li>
						<li class="active">
							<a href="reportes/Mis_Materiales_Didacticos.php" class="list-group-item"><i class="glyphicon glyphicon-chevron-right"></i>   &nbsp;&nbsp; Material de Aprendizaje
							</a>
						</li>
						<li class="active">
							<a href="reportes/Tareas_Orientadas_Por_Docentes.php" class="list-group-item"><i class="glyphicon glyphicon-chevron-right"></i>   &nbsp;&nbsp; Tareas a los Estudiantres
								</a>
						</li>
						
						<li class="active">
							
                            <a href="../login/logout.php"  data-ajax="false">
							
                                <i class="fa fa-th"></i> <span>SALIR</span> 
                            </a>
                        </li>

                     
                        
						   
                    </ul>
					
                </section>
                <!-- /.sidebar -->
            </aside>
	 
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
			











