<?php
include ("conexion.php");
include ("estilo.css");

$cod='';
$cod=$_REQUEST['cod'];

if($cod!='')
{
	$q="select * from rol where id=$cod";
	$eq=$dbmy->Execute($q);
	
	$id_a=$eq->fields['id'];
	$nombre_a=$eq->fields['nombre'];
	$entidad_a=$eq->fields['entidad'];
	$responsable_a=$eq->fields['responsable'];
	$correo_a=$eq->fields['correo'];
	$nit_a=$eq->fields['nit'];
	
}

?>

<script>
function restablecer()
{
	AjaxConsulta('roles1.php', {}, 'contenedor');	
}
function ver(cod)
{
	AjaxConsulta('roles1.php', {cod:cod}, 'contenedor');	
}
function insertar()
{	
document.form.op.value='I';	
		if(form.checkValidity()){

			debugger;
			AjaxConsulta('roles1_l.php', {op:$('#op').val(),codigo:$('#codigo').val(),nombre:$('#nombre').val(),entidad:$('#entidad').val(),responsable:$('#responsable').val(),correo:$('#correo').val(),nit:$('#nit').val()}, 'contenedor');	
		}
	//document.form.submit();
}
function modificar()
{
	document.form.op.value='M';	
		if(form.checkValidity()){

			debugger;
			AjaxConsulta('roles1_l.php', {op:$('#op').val(),codigo:$('#codigo').val(),nombre:$('#nombre').val(),entidad:$('#entidad').val(),responsable:$('#responsable').val(),correo:$('#correo').val(),nit:$('#nit').val()}, 'contenedor');	
		}
	//document.form.submit();
}
function eliminar()
{
	document.form.op.value='E';
		if(form.checkValidity()){

			debugger;
			AjaxConsulta('roles1_l.php', {op:$('#op').val(),codigo:$('#codigo').val(),nombre:$('#nombre').val(),entidad:$('#entidad').val(),responsable:$('#responsable').val(),correo:$('#correo').val(),nit:$('#nit').val()}, 'contenedor');	
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
<i><h3><?php ECHO htmlentities('Nuevos Proyectos');?></h3></i>
</div>
</div>

<div class="row">
<div class ="col-md-2">
</div>
<div class ="col-md-2">
<label class="label"><?php echo htmlentities('Nombre del proyecto');?></label>
	<input type=hidden name=op id=op>
	<input type=hidden name=codigo id=codigo value='<?php echo $id_a;?>'>
</div>
<div class ="col-md-6">
	<input type=text name=nombre id=nombre  value='<?php echo $nombre_a;?>' class="form-control"  required>
</div>
	<div class ="col-md-2">
	</div>
</div>
	
	
<div class="row">
<div class ="col-md-2">
</div>
<div class ="col-md-2">
<label class="label"><?php echo htmlentities('Entidad');?></label>
</div>
<div class ="col-md-6">
	<input type=text name=entidad id=entidad  value='<?php echo $entidad_a;?>' class="form-control"  required>
</div>
	<div class ="col-md-2">
	</div>
</div>
		
		
<div class="row">
<div class ="col-md-2">
</div>
<div class ="col-md-2">
<label class="label"><?php echo htmlentities('Responsable');?></label>
</div>
<div class ="col-md-6">
	<input type=text name=responsable id=responsable  value='<?php echo $responsable_a;?>' class="form-control"  required>
</div>
	<div class ="col-md-2">
	</div>
</div>		

<div class="row">
<div class ="col-md-2">
</div>
<div class ="col-md-2">
<label class="label"><?php echo htmlentities('Correo electrónico');?></label>
</div>
<div class ="col-md-6">
	<input type=email name=correo id=correo  value='<?php echo $correo_a;?>' class="form-control"  required>
</div>
	<div class ="col-md-2">
	</div>
</div>		

<div class="row">
<div class ="col-md-2">
</div>
<div class ="col-md-2">
<label class="label"><?php echo htmlentities('Nit');?></label>
</div>
<div class ="col-md-6">
	<input type=text name=nit id=nit  value='<?php echo $nit_a;?>' class="form-control"  required>
</div>
	<div class ="col-md-2">
	</div>
</div>		

<br>
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
<br>
	
	
<div class ="row">	
<div  class="col-xs-12 col-md-12">
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Buscar por nombre.." class="form-control">
</div>

<div  class="col-xs-12 col-md-12">
	

<table  id="myTable" class="table-responsive" WIDTH=100% border=1 cellspacing=0 cellspading=0>
		<tr class="header">
			<th align=center >#</th>
			<th align=center>PROYECTO</th>
			<th align=center>ENTIDAD</th>
			<th align=center>RESPONSABLE</th>
			<th align=center>CORREO</th>
			<th align=center>NIT</th>
			<th align=center>OP</th>
		</tr>

		<?php
		$q="select * from rol where id not in (1,8) order by nombre";
		$eq=$dbmy->Execute($q);
		$fq=$eq->RecordCount();

		for ($i=0;$i<$fq;$i++){
			
			$j=$i+1;	
			$codigo_b=$eq->fields['id'];
			$nombre_b=$eq->fields['nombre'];
			$entidad_b=$eq->fields['entidad'];
			$responsable_b=$eq->fields['responsable'];
			$correo_b=$eq->fields['correo'];
			$nit_b=$eq->fields['nit'];
		
		
		?>
	
			<tr>
				<td><?php  echo $j;?></td>
				<td><?php echo $nombre_b;?></td>
				<td><?php echo $entidad_b;?></td>
				<td><?php echo $responsable_b;?></td>
				<td><?php echo $correo_b;?></td>
				<td><?php echo $nit_b;?></td>
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

