 <!DOCTYPE html PUBLIC " Ejemplo de formulario clase Alirio Osorio"
<html>
<head>
<title> Formulario Multiple</title> 
<style type="text/css">
h1 { text-align: center; }
td { padding: 0.2em 2em ; }
</style>

<meta charset="UTF-8">
	<title></title> 
	<meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >
	<link rel="stylesheet" href="estilos.css">
	

</head>
<body>
	<form class="formulario" action="comprobar.php" method="post"/>
    
    <h1>Registrate</h1>
     <div class="contenedor">
     
     <div class="input-contenedor">
         <i class="fas fa-user icon"></i>
         <input type="text" name="nombre" placeholder="Nombre Completo">
         </div>
		 <div class="input-contenedor">
         <i class="fas fa-user icon"></i>
         <input type="text" name="apellidos" placeholder="Apellidos Completos">
         </div>
         
         <div class="input-contenedor">
         <i class="fas fa-envelope icon"></i>
         <input type="text" name="email" placeholder="Correo Electronico">
         
         </div>
         <div class="input-contenedor">
			<i class="fas fa-graduation-cap icon"></i>
         <input type="text" name="edu" placeholder="Nivel Educativo">
         </div>
		 
		 <div class="input-contenedor">
			<i class="fas fa-id-card-alt icon"></i>
         <input type="text" name="cedu"  placeholder="Cedula">
         </div>
		 
		  <div class="input-contenedor">
			<i class="fas fa-users icon"></i>
         <input type="text" name="sexo" placeholder="Sexo">
         </div>
		 
		 
         <div class="input-contenedor">
        <i class="fas fa-fingerprint icon"></i>
         <input type="password" name="contras" placeholder="Contraseña">
         </div>
		 
		 <div class="input-contenedor">
		 <td>   FACULTAD QUE LE INTERESA<br/>
   <input type="radio" name="estudios" value="INGENIERIA" checked="checked">  INGENIERIA<br/>
   <input type="radio" name="estudios" value="CIENCIAS ECONOMICAS"/>  CIENCIAS ECONOMICAS<br/>
   <input type="radio" name="estudios" value="COMUNICACION"/>  COMUNICACION <br/>
   <input type="radio" name="estudios" value="LENGUAS"/>     LENGUAS<br/>
   <input type="radio" name="estudios" value="EDUCACION CONTINUA"/>     EDUCACION CONTINUA<br/>
   </td>
   </div>
	
		   <i class="fas fa-journal-whills icon"></i>
		<select name="dia" >
			<option > JORNADA</option> 
			<option value="MAÑANA">MAÑANA</option> 
			<option value="TARDE">TARDE</option> 
			<option value="NOCHE">NOCHE</option> 
		</select>
		</p>
		
		<div class="input-contenedor">
        <i class="fas fa-comment-dots icon"></i><br/>
        <textarea name="comentario" rows="5" cols="63"> </textarea>
         </div>




		 
		 
         <input type="submit" value="Registrate" class="button"><br/><br/>
		 <input type="reset" value="borrar todo" class="button">
         <p>Al registrarte, aceptas nuestras Condiciones de uso y Política de privacidad.</p>
         <p>¿Ya tienes una cuenta?<a class="link" href="loginvista.html">Iniciar Sesion</a></p>
     </div>
    




</form>
</body>
</html>
En este formulario hemos querido incluir al menos un campo de cada tipo, para que se vean los resultados del traslado de datos.
