<?php
include ("conexion.php");
?>
<script>

function insertar()
{	
		if(form.checkValidity()){

			debugger;
			if($('#clave1').val()==$('#clave2').val())
			{
				AjaxConsulta('cambia_clave_l.php', {clave:$('#clave1').val()}, 'contenedor');	
			}
			else
			{
				alert('La nueva clave y la  confirmacion no son la misma');
			}
			
			
			
		}
	//document.form.submit();
}


</script>
<form name=form id=form  action="" method="post" onsubmit="return false;">
<div class="row">
<div class ="col-md-12">
<i><h3><?php ECHO htmlentities('CAMBIAR MI CLAVE');?></h3></i>
</div>
</div>

<div class="row">
<div class ="col-md-4">
</div>
<div class ="col-md-4">
	<label class="form_control">Digite la nueva clave</label><input type=password name=clave1 id=clave1  value='' class="form-control"  required>
	<BR>
	<label class="form_control">Confirme la nueva clave</label><input type=password name=clave2 id=clave2  value='' class="form-control"  required>
</div>
<div class ="col-md-4">
</div>
</div>

     <div class ="row">
	 <div class ="col-mod-4"></div>
	 <div class ="col-mod-4">
	 <center>
		<!-- <input type=submit name=bt1 id=bt1 value='Insertar' title='De clic para Insertar' onclick='insertar();' class="btn btn-primary color_botton1"> -->
		<button type=submit name=bt1 id=bt1 value='Insertar' title='De clic para Insertar' onclick='insertar();' class="btn btn-default color_botton1">Modificar clave</button>
		<center>
		</div>
		<div class ="col-mod-4"></div>
</div>


</form>
<script type="text/javascript">
_uacct = "UA-2189649-2";
urchinTracker();
</script>

