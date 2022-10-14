<?php
include ("conexion.php");
include ("estilo.css");


?>

<script>
function ver(a)
{
	AjaxConsulta('subir2.php', {cod:a}, 'contenedor');	
	
}


function guia()
{
	AjaxConsulta('subir1.php', {}, 'contenedor');	
	
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
<i><h3><?php ECHO htmlentities('Subir documentos a Proyectos');?></h3></i>
</div>
</div>

<div class="row">
<div class ="col-md-12">
<button type=submit name=bt1 id=bt1 value='guia' title='De clic para ver documentos Guia' onclick='guia();' class="btn btn-primary color_botton1 ">Ver documentos Guia</button>
</div>
</div>
	
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
			<th align=center></th>
			
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
				<button type=submit name=bt1 id=bt1 value='Regresar' title='Editar registro' onclick='ver(<?php echo $codigo_b;?>)' class="btn btn-primary color_botton1 ">Agregar documentos</button>
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

