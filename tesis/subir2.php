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
<i><h3><?php ECHO htmlentities('SUBIR  DOCUMENTOS');?></h3></i>
</div>
</div>

<div class="row">
<div class ="col-md-1" align=left><label class="label" align=left><?php echo htmlentities('Proyecto:');?></label></div>
<div class ="col-md-5" align=left><?php echo $nombre_a;?></div>
<div class ="col-md-1" align=left><label class="label" align=left><?php echo htmlentities('Entidad:');?></label></div>
<div class ="col-md-5" align=left><?php echo $entidad_a;?></div>
</div>
<br>


<fieldset>

<div class="row">
<div class ="col-md-4" align=left><i><h4>Integraci&oacute;n</h4></i></div>
<div class ="col-md-8"></div>
</div>

<div class="row">
<div class ="col-md-1"></div>
<div class ="col-md-5" align=left><label class="label" align=left><?php echo htmlentities('Enunciado del trabajo del proyecto');?></label></div>
<div class ="col-md-3"><input type="file" name="ar1"  id="ar1" accept="application/pdf"></div>
<div class ="col-md-2"><button type=submit name=bt1 id=bt1 value='Subir' title='De clic para Regresar' onclick='regresar();' class="btn btn-primary color_botton1 ">Subir</button></div>
<div class ="col-md-1"></div>
</div>

<div class="row">
<div class ="col-md-1"></div>
<div class ="col-md-5" align=left><label class="label" align=left><?php echo htmlentities('Caso de negocio');?></label></div>
<div class ="col-md-3"><input type="file" name="ar1"  id="ar1" accept="application/pdf"></div>
<div class ="col-md-2"><button type=submit name=bt1 id=bt1 value='Subir' title='De clic para Regresar' onclick='regresar();' class="btn btn-primary color_botton1 ">Subir</button></div>
<div class ="col-md-1"></div>
</div>

<div class="row">
<div class ="col-md-1"></div>
<div class ="col-md-5" align=left><label class="label" align=left><?php echo htmlentities('Acuerdos');?></label></div>
<div class ="col-md-3"><input type="file" name="ar1"  id="ar1" accept="application/pdf"></div>
<div class ="col-md-2"><button type=submit name=bt1 id=bt1 value='Subir' title='De clic para Regresar' onclick='regresar();' class="btn btn-primary color_botton1 ">Subir</button></div>
<div class ="col-md-1"></div>
</div>

<div class="row">
<div class ="col-md-1"></div>
<div class ="col-md-5" align=left><label class="label" align=left><?php echo htmlentities('Factores ambientales de la empresa');?></label></div>
<div class ="col-md-3"><input type="file" name="ar1"  id="ar1" accept="application/pdf"></div>
<div class ="col-md-2"><button type=submit name=bt1 id=bt1 value='Subir' title='De clic para Regresar' onclick='regresar();' class="btn btn-primary color_botton1 ">Subir</button></div>
<div class ="col-md-1"></div>
</div>

<div class="row">
<div class ="col-md-1"></div>
<div class ="col-md-5" align=left><label class="label" align=left><?php echo htmlentities('Activos de los procesos de la organización');?></label></div>
<div class ="col-md-3"><input type="file" name="ar1"  id="ar1" accept="application/pdf"></div>
<div class ="col-md-2"><button type=submit name=bt1 id=bt1 value='Subir' title='De clic para Regresar' onclick='regresar();' class="btn btn-primary color_botton1 ">Subir</button></div>
<div class ="col-md-1"></div>
</div>
</legend>

</form>