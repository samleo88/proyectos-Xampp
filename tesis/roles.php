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
}

?>

<script>
function restablecer()
{
	AjaxConsulta('roles.php', {}, 'contenedor');	
}
function ver(cod)
{
	AjaxConsulta('roles.php', {cod:cod}, 'contenedor');	
}
function insertar()
{	
document.form.op.value='I';	
		if(form.checkValidity()){

			debugger;
			AjaxConsulta('roles_l.php', {op:$('#op').val(),codigo:$('#codigo').val(),nombre:$('#nombre').val()}, 'contenedor');	
		}
	//document.form.submit();
}
function modificar()
{
	document.form.op.value='M';	
		if(form.checkValidity()){

			debugger;
			AjaxConsulta('roles_l.php', {op:$('#op').val(),codigo:$('#codigo').val(),nombre:$('#nombre').val()}, 'contenedor');	
		}
	//document.form.submit();
}
function eliminar()
{
	document.form.op.value='E';
		if(form.checkValidity()){

			debugger;
			AjaxConsulta('roles_l.php', {op:$('#op').val(),codigo:$('#codigo').val(),nombre:$('#nombre').val()}, 'contenedor');	
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
<i><h3><?php ECHO htmlentities('ROLES DE USUARIO');?></h3></i>
</div>
</div>

<div class="row">

<div class ="col-md-2">
</div>
<div class ="col-md-2">
<label class="label"><?php echo htmlentities('Nombre del rol');?></label>
	<input type=hidden name=op id=op>
	<input type=hidden name=codigo id=codigo value='<?php echo $id_a;?>'>

</div>
<div class ="col-md-6">
	<input type=text name=nombre id=nombre  value='<?php echo $nombre_a;?>' class="form-control"  required>
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
			<th align=center>NOMBRE</th>
			<th align=center>OP</th>
		</tr>

		<?php
		$q="select * from rol order by nombre";
		$eq=$dbmy->Execute($q);
		$fq=$eq->RecordCount();

		for ($i=0;$i<$fq;$i++){
			
			$j=$i+1;	
			$codigo_b=$eq->fields['id'];
			$nombre_b=$eq->fields['nombre'];
		
		?>
	
			<tr>
				<td><?php  echo $j;?></td>
				<td><?php echo $nombre_b;?></td>
				<td>
				<img src="imagenes/lupa.png" style="cursor:pointer;" title="Editar registro" onclick='ver(<?php echo $codigo_b;?>)'></img>
				</td>
			</tr>
		<?php	
			$eq->MoveNext();
		}	
		?>
		
		<tr>
			<th colspan=3><?php echo $j.' Registros existentes'?></th>
		</tr>
</table>
</div>
</div>	
</form>

