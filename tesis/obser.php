<?php
include ("conexion.php");

$cod='';
$cod=$_REQUEST['rol'];

$apli='';
$apli=$_REQUEST['apli'];

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


if($apli==11)
{
	$nomapli="4. Gestion de integracion del proyecto";
}	
if($apli==12)
{
	$nomapli="5. Gestion del alcance del proyecto";
}	
if($apli==13)
{
	$nomapli="6. Gestion del cronograma del proyecto";
}	
if($apli==14)
{
	$nomapli="7. Gestion de costos del proyecto";
}	
if($apli==15)
{
	$nomapli="8. Gestion de la calidad del proyecto";
}	
if($apli==16)
{
	$nomapli="9. Gestion de los recursos del proyecto";
}	
if($apli==17)
{
	$nomapli="10. Gestion de las comunicaciones del  proyecto";
}	
if($apli==18)
{
	$nomapli="11. Gestion de los riesgos del proyecto";
}	
if($apli==19)
{
	$nomapli="12. Gestion de las adquisiciones del proyecto";
}	
if($apli==20)
{
	$nomapli="13. Gestion de los interesados del proyecto";
}	


?>

<script>

function ver(salida,rol,area)
{
	AjaxConsulta('obser1.php', {salida:salida, rol:rol , area:area}, 'contenedor');	
	
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
<div class ="col-md-12">
<i><h3><?php ECHO htmlentities('REVISIÓN PROYECTO FASE (').$nomapli.')';?></h3></i>
</div>
</div>

<?php
/////////////////////////////////////////////toca validar por cada area
?>

<div class="row">
<div class ="col-md-1" align=left><label class="label" align=left><?php echo htmlentities('Proyecto:');?></label></div>
<div class ="col-md-5" align=left><?php echo $nombre_a;?></div>
<div class ="col-md-1" align=left><label class="label" align=left><?php echo htmlentities('Entidad:');?></label></div>
<div class ="col-md-5" align=left><?php echo$entidad_a;?></div>
</div>



<?php
//////////////////////////////////////////////////////////////////////
?>

<div class="row">
<div class ="col-md-12"></div>
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
				<button type=submit name=bt1 id=bt1 value='Regresar' title='Editar registro' onclick="ver(1,'<?php echo $cod;?>','<?php echo $apli;?>')" class="btn btn-primary color_botton1 ">Ver</button>
			</td>
		</tr>
		
		
</table>
</div>
</div>

</form>
