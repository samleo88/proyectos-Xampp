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
function ver(a)
{
	AjaxConsulta('subir1.php', {cod:cod}, 'contenedor');	
	
}

function descargar(a)
{
	if(a==1)
	{
		
		
	}	
	
}

function regresar()
{
	AjaxConsulta('subir.php', {}, 'contenedor');	
	
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
<div class ="col-md-1">
<button type=submit name=bt1 id=bt1 value='Regresar' title='De clic para Regresar' onclick='regresar();' class="btn btn-primary color_botton1 ">Regresar</button>
</div>
<div class ="col-md-12"></div>
</div>
<div class="row">
<div class ="col-md-12">
<i><h3><?php ECHO htmlentities('DESCARGAR DOCUMENTOS GUIA');?></h3></i>
</div>
</div>

<div class="row">
<table  id="myTable" class="table-responsive" WIDTH=100% border=1 cellspacing=0 cellspading=0>
		<tr class="header">
			<th align=center >#</th>
			<th align=center>TITULO DEL DOCUMENTO</th>
			<th align=center></th>
		</tr>
		<tr>
			<td>1</td>
			<td><?php echo 'Acta de constitución del proyecto';?></td>
			<td>
				<a href="documentos/ProjectPlanDefinition2.doc" download="ProjectPlanDefinition2" class="btn btn-primary color_botton1">Descargar
				</a>
			</td>
		</tr>
		
		<tr>
			<td>2</td>
			<td><?php echo 'Documento 2';?></td>
			<td>
				<button type=submit name=bt1 id=bt1 value='Descargar' title='De clic para Regresar' onclick='descargar(2);' class="btn btn-primary color_botton1 ">Descargar</button>
			</td>
		</tr>
		
		<tr>
			<td>3</td>
			<td><?php echo 'Documento 3';?></td>
			<td>
				<button type=submit name=bt1 id=bt1 value='Descargar' title='De clic para Regresar' onclick='descargar(3);' class="btn btn-primary color_botton1 ">Descargar</button>
			</td>
		</tr>
		
		<tr>
			<td>4</td>
			<td><?php echo 'Documento 4';?></td>
			<td>
				<button type=submit name=bt1 id=bt1 value='Descargar' title='De clic para Regresar' onclick='descargar(4);' class="btn btn-primary color_botton1 ">Descargar</button>
			</td>
		</tr>
		
		<tr>
			<td>5</td>
			<td><?php echo 'Documento 5';?></td>
			<td>
				<button type=submit name=bt1 id=bt1 value='Descargar' title='De clic para Regresar' onclick='descargar(5);' class="btn btn-primary color_botton1 ">Descargar</button>
			</td>
		</tr>
		
		<tr>
			<td>6</td>
			<td><?php echo 'Documento 6';?></td>
			<td>
				<button type=submit name=bt1 id=bt1 value='Descargar' title='De clic para Regresar' onclick='descargar(6);' class="btn btn-primary color_botton1 ">Descargar</button>
			</td>
		</tr>
		
		<tr>
			<td>7</td>
			<td><?php echo 'Documento 7';?></td>
			<td>
				<button type=submit name=bt1 id=bt1 value='Descargar' title='De clic para Regresar' onclick='descargar(7);' class="btn btn-primary color_botton1 ">Descargar</button>
			</td>
		</tr>
		
		<tr>
			<td>8</td>
			<td><?php echo 'Documento 8';?></td>
			<td>
				<button type=submit name=bt1 id=bt1 value='Descargar' title='De clic para Regresar' onclick='descargar(8);' class="btn btn-primary color_botton1 ">Descargar</button>
			</td>
		</tr>
		
		<tr>
			<td>9</td>
			<td><?php echo 'Documento 9';?></td>
			<td>
				<button type=submit name=bt1 id=bt1 value='Descargar' title='De clic para Regresar' onclick='descargar(9);' class="btn btn-primary color_botton1 ">Descargar</button>
			</td>
		</tr>
		
		<tr>
			<td>10</td>
			<td><?php echo 'Documento 10';?></td>
			<td>
				<button type=submit name=bt1 id=bt1 value='Descargar' title='De clic para Regresar' onclick='descargar(10);' class="btn btn-primary color_botton1 ">Descargar</button>
			</td>
		</tr>
</table>
		
</div>



</form>