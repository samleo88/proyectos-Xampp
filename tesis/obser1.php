<?php
include ("conexion.php");

	

$cod='';
$cod=$_REQUEST['rol'];

$apli='';
$apli=$_REQUEST['area'];

$salida='';
$salida=$_REQUEST['salida'];

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

$nomapli="4. Gestion de integracion del proyecto";
?>

<script>


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

<fieldset>
<div class="row">
<div class ="col-md-4" align=left><i><h4>Entradas:</h4></i></div>
<div class ="col-md-8"></div>
</div>

<div class="row">
<div class ="col-md-2"></div>
<div class ="col-md-4" align=left><a href="documentos/ProjectPlanDefinition2.doc" download="ProjectPlanDefinition2"><b><p style="color:#FFFFFF";>Enunciado del trabajo del proyecto</P></b></a></div>
<div class ="col-md-4" align=left><a href=#><b><p style="color:#FFFFFF";>Caso de negocio</P></b></a></div>
<div class ="col-md-2"></div>
</div>

<div class="row">
<div class ="col-md-2"></div>
<div class ="col-md-4" align=left><a href=#><b><p style="color:#FFFFFF";>Acuerdos</P></b></a></div>
<div class ="col-md-4" align=left><a href=#><b><p style="color:#FFFFFF";>Factores ambientales de la empresa</P></b></a></div>
<div class ="col-md-2"></div>
</div>

<div class="row">
<div class ="col-md-2"></div>
<div class ="col-md-4" align=left><a href=#><b><p style="color:#FFFFFF";>Activos de los procesos de la organización</P></b></a></div>
<div class ="col-md-4" align=left></div>
<div class ="col-md-2"></div>
</div>
</fieldset>

<?php
//////////////////////////////////////////////////////////////////////
?>
<br>
<div class="row">
<div class ="col-md-12">
<iframe width=100% height=250px src='documentos1/EAN.pdf'></iframe>
</div>
</div>
<br>

<div class="row">
<div class ="col-md-2"></div>
<div class ="col-md-4" align=left><label class="label"><?php echo htmlentities('Observaciones');?></label></div>
<div class ="col-md-4" align=left><input type=text name=obser id=obser  class="form-control"  required></div>
<div class ="col-md-2"></div>
</div>

<div class="row">
<div class ="col-md-2"></div>
<div class ="col-md-4" align=left><label class="label"><?php echo htmlentities('Entrada');?></label></div>
<div class ="col-md-4" align=left><input type=text name=entrada id=entrada  class="form-control"  required></div>
<div class ="col-md-2"></div>
</div>

<div class="row">
<div class ="col-md-2"></div>
<div class ="col-md-4" align=left><label class="label"><?php echo htmlentities('Estado');?></label></div>
<div class ="col-md-4" align=left><input type=text name=estado id=estado  class="form-control"  required></div>
<div class ="col-md-2"></div>
</div>
<br>
<div class="row">
<div class ="col-md-12"><button type=submit name=bt1 id=bt1 value='Insertar' title='De clic para Insertar' class="btn btn-primary color_botton1 ">Insertar</button></div>
</div>
<br>

<div class="row">
<div class ="col-md-12">

<table  id="myTable" class="table-responsive" WIDTH=100% border=1 cellspacing=0 cellspading=0>
		<tr class="header">
			<th align=center >#</th>
			<th align=center>OBSERVACIONES</th>
			<th align=center>ESTADO</th>
			<th align=center></th>
		
			
		</tr>

		
		
		<tr>
			<th colspan=4><?php echo $j.' Registros existentes'?></th>
		</tr>
</table>
</div>
</div>
</form>
