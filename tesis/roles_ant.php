<?php
include ("conexion.php");


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

</script>
  
<form name=form id=form  action="" method="post" onsubmit="return false;">
<div class="row">
<div class ="col-md-12">
<i><h3><?php ECHO htmlentities('ROLES DE USUARIO');?></h3></i>
</div>
</div>

<div class="row">

<div class ="col-md-4">
</div>
<div class ="col-md-4">
<label class=""><?php echo htmlentities('Nombre del rol');?></label>
	<input type=hidden name=op id=op>
	<input type=hidden name=codigo id=codigo value='<?php echo $id_a;?>'>
	<input type=text name=nombre id=nombre  value='<?php echo $nombre_a;?>' class="form-control"  required>
</div>
	<div class ="col-md-4">
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
					<button type=submit name=bt1 id=bt1 value='Insertar' title='De clic para Insertar' onclick='insertar();' class="btn btn-primary color_botton1 "><i class="fa fa-plus-circle" aria-hidden="true" style="font-size: 18px;"></i>&nbsp; Insertar</button>
					
				<center>
		</div>
		<div class ="col-md-4"></div>
	</div>
<?php
}
?>
<br>
	
<div  class="col-xs-12 col-md-12">
	

<table class="tablesorter" WIDTH=100%>
	<thead>
		<tr class="tablesorter-ignoreRow">
			<td class="pager sorter-false" colspan="5">
				<img src="tablesorter11/addons/pager/icons/first.png" class="first" alt="First" />
				<img src="tablesorter11/addons/pager/icons/prev.png" class="prev" alt="Prev" />
				<span class="pagedisplay"></span> <!-- this can be any element, including an input -->
				<img src="tablesorter11/addons/pager/icons/next.png" class="next" alt="Next" />
				<img src="tablesorter11/addons/pager/icons/last.png" class="last" alt="Last" />
				<select class="pagesize">
					<option value="25">25</option>
				</select>
			</td>
		</tr>
		<tr>
			
			<th>#</th>
			<th>NOMBRE</th>
			<th>OP</th>
			
		</tr>
	</thead>
	<tfoot>
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
				<td><!-- <input type=button name=bt6 id=bt6 value='Ver' title='De clic para editar' class="btn btn-primary color_botton1" onclick='ver(<?php echo $codigo_b;?>)'> -->
				<button type=button name=bt6 id=bt6 value='Ver' title='De clic para editar' class="btn btn-primary color_botton1" onclick='ver(<?php echo $codigo_b;?>)'> <i class="fa fa-search" aria-hidden="true" style="font-size: 18px;"></i><span class="text_icon"> &nbsp;Ver</span>
				</button></td>
			</tr>
		<?php	
			$eq->MoveNext();
		}	
		?>
		
		
		
		<tr>
			<td class="pager" colspan="3">
				<img src="tablesorter11/addons/pager/icons/first.png" class="first" alt="First" />
				<img src="tablesorter11/addons/pager/icons/prev.png" class="prev" alt="Prev" />
				<span class="pagedisplay"></span> <!-- this can be any element, including an input -->
				<img src="tablesorter11/addons/pager/icons/next.png" class="next" alt="Next" />
				<img src="tablesorter11/addons/pager/icons/last.png" class="last" alt="Last" />
				<select class="pagesize">
					<option value="25">25</option>
				</select>
			</td>
		</tr>
	</tfoot>
	<tbody>
	</tbody>
</table>


	

</div>
	
	



</form>

