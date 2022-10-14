<?php
include ("conexion.php");
include ("estilo.css");

$cod='';
$cod=$_REQUEST['cod'];

if($cod!='')
{
	$q="select * from usuarios where id=$cod";
	$eq=$dbmy->Execute($q);
	
	$id_a=$eq->fields['id'];
	$usuario_a=$eq->fields['usuario'];
	$nombre_a=$eq->fields['nombre'];
	$apellido_a=$eq->fields['apellido'];
	$clave_a=$eq->fields['clave'];
	$estado_a=$eq->fields['estado'];
	$celular_a=$eq->fields['celular'];
	$email_a=$eq->fields['email'];
	
}

?>

<script>
function restablecer()
{
	AjaxConsulta('usuario.php', {}, 'contenedor');	
}
function ver(cod)
{
	AjaxConsulta('usuario.php', {cod:cod}, 'contenedor');	
}
function insertar()
{	
document.form.op.value='I';	
		if(form.checkValidity()){

			debugger;
			AjaxConsulta('usuario_l.php', {op:$('#op').val(),codigo:$('#codigo').val(),usuario:$('#usuario').val(),nombre:$('#nombre').val(),apellido:$('#apellido').val(),clave:$('#clave').val(),estado:$('#estado').val(),celular:$('#celular').val(),email:$('#email').val()}, 'contenedor');	
		}
	//document.form.submit();
}
function modificar()
{
	document.form.op.value='M';	
		if(form.checkValidity()){

			debugger;
			AjaxConsulta('usuario_l.php', {op:$('#op').val(),codigo:$('#codigo').val(),usuario:$('#usuario').val(),nombre:$('#nombre').val(),apellido:$('#apellido').val(),clave:$('#clave').val(),estado:$('#estado').val(),celular:$('#celular').val(),email:$('#email').val()}, 'contenedor');	
		}
	//document.form.submit();
}
function eliminar()
{
	document.form.op.value='E';
		if(form.checkValidity()){

			debugger;
			AjaxConsulta('usuario_l.php', {op:$('#op').val(),codigo:$('#codigo').val(),usuario:$('#usuario').val(),nombre:$('#nombre').val(),apellido:$('#apellido').val(),clave:$('#clave').val(),estado:$('#estado').val(),celular:$('#celular').val(),email:$('#email').val()}, 'contenedor');	
		}
}


function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
  
<form name=form id=form  action="" method="post" onsubmit="return false;">
<div class="row">
<div class ="col-md-12">
<i><h3><?php ECHO htmlentities('GESTION DE USUARIOS');?></h3></i>
</div>
</div>

<div class="row">
<div class ="col-md-1">
<label class="label"><?php echo htmlentities('Nombres');?></label>
	<input type=hidden name=op id=op>
	<input type=hidden name=codigo id=codigo value='<?php echo $id_a;?>'>
</div>
<div class ="col-md-3">
	<input type=text name=nombre id=nombre  value='<?php echo $nombre_a;?>' class="form-control"  required>
</div>
	
<div class ="col-md-1">
	<label class="label"><?php echo htmlentities('Apellidos');?></label>
</div>
<div class ="col-md-3">
	<input type=text name=apellido id=apellido  value='<?php echo $apellido_a;?>' class="form-control"  required>
</div>
<div class ="col-md-1">
	<label class="label"><?php echo htmlentities('Usuario');?></label>
</div>
<div class ="col-md-3">
	<input type=text name=usuario id=usuario  value='<?php echo $usuario_a;?>' class="form-control"  required>
</div>
</div>
	
<div class="row">
<div class ="col-md-1">
	<label class="label"><?php echo htmlentities('Clave');?></label>
</div>
<div class ="col-md-3">
	<input type=password name=clave id=clave  value='<?php echo $clave_a;?>' class="form-control"  required>
</div>
<div class ="col-md-1">
	<label class="label"><?php echo htmlentities('Celular');?></label>
</div>
<div class ="col-md-3">
	<input type=text name=celular id=celular  value='<?php echo $celular_a;?>' class="form-control"  required>
</div>
<div class ="col-md-1">
	<label class="label"><?php echo htmlentities('Email');?></label>
</div>
<div class ="col-md-3">
	<input type=email name=email id=email  value='<?php echo $email_a;?>' class="form-control"  required>
</div>
</div>	

<div class="row">
<div class ="col-md-1">
	<label class="label"><?php echo htmlentities('Estado');?></label>
</div>
<div class ="col-xs-1 col-md-3">
	<select name=estado id=estado class="form-control"  required>
	<?php
	if($estado_a=='1')
	{
	?>	
		<option value=''>-Seleccione-</option>
		<option value='1' selected>Activo</option>
		<option value='2'>Inactivo</option>
	<?php	
	}
	if($estado_a=='2')
	{
	?>	
		<option value=''>-Seleccione-</option>
		<option value='1'>Activo</option>
		<option value='2' selected>Inactivo</option>
	<?php	
	}
	if($estado_a=='')
	{	
	?>
		<option value=''>-Seleccione-</option>
		<option value='1'>Activo</option>
		<option value='2'>Inactivo</option>
	<?php	
	}
	?>	
	</select>
</div>
	<div class ="col-md-8">
</div>
</div>	



<?php
if($cod!='')
{
?>
    <div class ="row">
		<div class ="col-md-4"></div>
		<div class ="col-md-4">
			<center>
			<input type=button name=bt2 id=bt2 value='Restablecer' title='De clic para Restablecer' onclick='restablecer();' class="btn btn-primary color_botton1">
			<input type=submit name=bt3 id=bt3 value='Modificar' title='De clic para Modificar' onclick='modificar();' class="btn btn-primary color_botton1">
			<input type=submit name=bt4 id=bt4 value='Eliminar' title='De clic para Eliminar' onclick='eliminar();' class="btn btn-primary color_botton1">
			</center>
		</div>
		<div class ="col-md-4"></div>
	</div>
<?php
}
else{
?>
     <div class ="row">
		 <div class ="col-md-4"></div>
		 <div class ="col-md-4">
				<center>
					<!-- <input type=submit name=bt1 id=bt1 value='Insertar' title='De clic para Insertar' onclick='insertar();' class="btn btn-primary color_botton1 "> -->
					<button type=submit name=bt1 id=bt1 value='Insertar' title='De clic para Insertar' onclick='insertar();' class="btn btn-primary color_botton1 ">Insertar</button>
					
				<center>
		</div>
		<div class ="col-md-4"></div>
	</div>
<?php
}
?>
	
<div class ="row">	
<div  class="col-xs-12 col-md-12">
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Buscar por nombre.." class="form-control">
</div>

<div  class="col-xs-12 col-md-12">
	

<table  id="myTable" class="table-responsive" WIDTH=100% border=1 cellspacing=0 cellspading=0>
		<tr class="header">
			<th align=center >#</th>
			<th align=center>NOMBRES</th>
			<th align=center>APELLIDOS</th>
			<th align=center>CELULAR</th>
			<th align=center>ESTADO</th>
			<th align=center>USUARIO</th>
			<th align=center></th>
		</tr>

		<?php
		$q="select * from usuarios order by nombre";
		$eq=$dbmy->Execute($q);
		$fq=$eq->RecordCount();

		for ($i=0;$i<$fq;$i++){
			
			$j=$i+1;	
			$codigo_b=$eq->fields['id'];
			$usuario_b=$eq->fields['usuario'];
			$nombre_b=$eq->fields['nombre'];
			$apellido_b=$eq->fields['apellido'];
			$clave_b=$eq->fields['clave'];
			$estado_b=$eq->fields['estado'];
			if($estado_b=='1')
			{
				$nom_estado="ACTIVO";
			}
			else
			{
				$nom_estado="INACTVO";
			}		
			
			$celular_b=$eq->fields['celular'];
			$email_b=$eq->fields['email'];	
			
		
		?>
	
			<tr>
				<td><?php  echo $j;?></td>
				<td><?php echo $nombre_b;?></td>
				<td><?php echo $apellido_b;?></td>
				<td><?php echo $celular_b;?></td>
				<td><?php echo $nom_estado;?></td>
				<td><?php echo $usuario_b;?></td>
				<td>
				<img src="imagenes/lupa.png" style="cursor:pointer;" title="Editar registro" onclick='ver(<?php echo $codigo_b;?>)'></img>
				</td>
			</tr>
		<?php	
			$eq->MoveNext();
		}	
		?>
		
		<tr>
			<th colspan=7><?php echo $j.' Registros existentes'?></th>
		</tr>
</table>
</div>
</div>	
</form>

