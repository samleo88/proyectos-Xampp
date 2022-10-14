<?php
include ("conexion.php");

$id_usuario=$_SESSION["id"];


$m=$_REQUEST['m'];

?>
<!DOCTYPE HTML>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
    <title>Gestor Proyectos</title>

	<link rel="stylesheet" href="styles.css">
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="bootstrap/css/simple-sidebar.css" rel="stylesheet" type="text/css"/>
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">

	<link rel="stylesheet" href="menu1/css/style.css">
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
	<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css'>
	<link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
	<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Montserrat'>
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<link rel="stylesheet" href="../menu1/css/style.css"> 
	<link rel="stylesheet" href="dist/accordion.min.css">
	

	<script language="javascript" type="text/javascript">
	function AjaxConsulta( pagDestino, parametros, htmlObjetivo ) {
		htmlObjetivo = "#"+htmlObjetivo;
		$(htmlObjetivo).html("<p align='center'><br/>Por favor espere unos segundos...</p>");
		$(htmlObjetivo).load(pagDestino, parametros);
	}
	</script>
	<script type="text/javascript">
	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-19682407-3']);
	  _gaq.push(['_trackPageview']);

	  (function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();
	</script>
	<script type="text/javascript">
	$(document).ready(function(e) {
    var mozillaPresente = false,
        mozilla = (function detectarNavegador(navegador) {
        if(navegador.indexOf("Firefox") != -1 ) {
            mozillaPresente = true;
        }   
    })(navigator.userAgent);

    $(document).ready(mostrar());

    function darEfecto(efecto) {
        el = $('.cajainterna');
        el.addClass(efecto);
        el.one('webkitAnimationEnd oanimationend msAnimationEnd animationend',
        function (e) {
            el.removeClass(efecto);
        });
    }
    function mostrar(e) {
        $(".cajaexterna").show();
        darEfecto("bounceIn");      
    }
    function ocultar() {
        $(".cajaexterna").fadeOut("fast", function() {
            if(mozillaPresente) {
            setTimeout(function() {
                $(".cajainterna").removeClass("bounceIn");
            }, 5);
        }
        });         
    }
    $("a.mostrarmodal").click(mostrar);
    $("a.cerrarmodal").click(ocultar);
}); 

</script>


</head>

<body bgcolor='#6B2212'>

	<div id="wrapper" style="height: auto;    min-width: 100%;">
	
	
	
       <div id="sidebar-wrapper" >
           <ul class="accordion-menu">
			  <?php
				//////TRAEMOS LOS ROLES PERTENECIENTES AL USUARIO AUTENTICADO
			  
				$q="select r.id id, r.nombre nombre from rol r, rol_usuarios u where u.cod_rol=r.id and u.cod_usuario=$id_usuario ORDER BY 2";
				$eq=$dbmy->Execute($q);
				$fq=$eq->RecordCount();
				for ($i=0;$i<$fq;$i++){

					$cod_rol=$eq->fields['id'];
					$nombre_rol=$eq->fields['nombre'];
					?>
					 <li>
						<div class="dropdownlink"><i class="fa fa-road" aria-hidden="true"></i><?php echo htmlentities($nombre_rol);?>
						  <i class="fa fa-chevron-down" aria-hidden="true"></i>
						</div>
						<ul class="submenuItems">
					<?php
				 
					/////TRAEMOS LAS APLICACIONES QUE PERTENECEN AL ROL
					$q1="select a.id,a.nombre,a.url from aplicaciones a,rol_aplicaciones r where r.cod_aplicacion=a.id and r.cod_rol=$cod_rol ORDER BY a.orden,a.nombre";
					$eq1=$dbmy->Execute($q1);
					$fq1=$eq1->RecordCount();
					
					for ($j=0;$j<$fq1;$j++){

						$id_apli=$eq1->fields['id'];
						$nombre_apli=$eq1->fields['nombre'];
						$url_apli=$eq1->fields['url'];
						
						$url_apli=$url_apli.'?rol='.$cod_rol.'&apli='.$id_apli;
						
						?>
						<li>
							<a href="#" style="cursor:pointer;" onclick="evento('<?php echo $url_apli;?>','<?php echo $cod_rol;?>');"><?php echo $nombre_apli;?></a>
						</li>
						<?php
						$eq1->MoveNext();
					}
				     
					?>
					 </ul>
					</li>					
					<?php
					$eq->MoveNext();
				}
				?>
			  
			    <li>
					<div class="dropdownlink" onclick="ocultarMenu();">
						<div ><i class="fa fa-arrow-right" aria-hidden="true"></i> &nbsp;Ocultar</div>
						
					</div>
				</li>	
				
			  
			</ul>
			
			
			
			
        </div>
	
	<nav class="navbar navbar-default nav-new">
  <div class="container-fluid">
    <div class="navbar-header col-sm-4">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">

        <span class="sr-only">Toggle navigation</span>
        <i class="fa fa-cogs" style="font-size: 22px;color: white"	aria-hidden="true"></i>
       <!--  <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> -->
      </button>
	  <a class="navbar-brand" href="#menu-toggle"  id="menu-toggle"><i class="fa fa-bars" aria-hidden="true"></i> &nbsp;MENU</a>
    </div>

	

    <div class="navbar-collapse collapse col-sm-4" id="bs-example-navbar-collapse-1" aria-expanded="false" style="height: 1px;">
	<ul class = "col-md-2 botton_login">
        <li class="active"><a href="#"><i class="fa fa-user" aria-hidden="true" style="font-size: 18px"></i> &nbsp;<?php echo $_SESSION["nombre"];?></a></li>
      </ul>

	  <ul class = "col-md-2 botton_login">
        <li class="active"><a href="#" onclick='inicio();'>Inicio</a></li>
      </ul>	
	  
	  <ul class = "col-md-2 botton_login">
	  
        <li class="active"><a href="#" onclick='clave();'>Cambiar Clave</a></li>
      </ul>		

      <ul class = "col-md-2 botton_login">

        <li><a href="salida.php"><i class="btn btn-default color_botton1"  aria-expanded="true" style="font-awesome: 30px"></i>&nbsp;Salida segura</a> </li>
      </ul>
    </div>
  </div>
</nav>	
		<div class="col-md-12"> 
				

					
					
		</div>
			
		
			
			<div class="row text-center" >
				<?php
				//////////DIV CONTENEDOR
				?>
				<div class="col-sm-12 col-12" id=contenedor name=contenedor  >
				
				</div>
			</div>

	<footer>
		<div class="row">
			
			<div class="col-md-4"></div>
				
		</div>
	</footer>
    </div>
    <script src="jquery/jquery.js" type="text/javascript"></script>
    <script src="jquery/jquery.min.js" type="text/javascript"></script>
	
	<script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
    <script src="menu1/js/index.js"></script>
	
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
        // $("#wrapper").css("opacity",".6");
    });

	
	function ocultarMenu()
		{
			closeNav();
			$("#wrapper").css("opacity","1");
		}
		
		function closeNav() {
    		//document.getElementById("sidebar-wrapper").style.width = "0";
			
			$("#wrapper").toggleClass("toggled");
			//$(".opacityMenu").css("opacity", 1 );
			//$(".opacityMenu-2").css("opacity", 1);
		}
		
	  function evento(a,b)
	  {
		closeNav();
		
		
		//alert('eeeeee');
		AjaxConsulta(a, {rol:b}, 'contenedor');
	  }
	  
	  function clave()
	  {
		AjaxConsulta('cambia_clave.php', '', 'contenedor');
	  }
	  
	  function inicio()
	  {
		  location.href='general.php?m=1'
		  
	  }
    </script>
	 
	
	
</body>

</html>


<?php


if($m==1)
{
?>
<script>
AjaxConsulta('entrada.php', '', 'contenedor'); 
</script>
<?php
}
?>