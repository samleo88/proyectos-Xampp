<?php
include ("conexion.php");
include ("estilo.css");

$cod_rol='';
$cod_rol=$_REQUEST['rol'];

?>
 
<script>
function restablecer()
{
		AjaxConsulta('roles_aplicaciones1.php', {}, 'contenedor');	
}
function actualizar(nombre,codigo,cod_rol)
{
	if(document.getElementById(nombre).checked==false)
	{
		//ifr1.location.href="roles_aplicaciones_l.php?op=E&cod_rol="+cod_rol+"&cod_aplicacion="+codigo;
		AjaxConsulta('roles_aplicaciones1_l.php', {op:"E" , cod_rol:cod_rol , cod_aplicacion:codigo}, 'contenedor');	
	}
	else
	{
		//ifr1.location.href="roles_aplicaciones_l.php?op=I&cod_rol="+cod_rol+"&cod_aplicacion="+codigo;
		AjaxConsulta('roles_aplicaciones1_l.php', {op:"I" , cod_rol:cod_rol , cod_aplicacion:codigo}, 'contenedor');
	}
}

function consultar()
{
	//location.href='roles_aplicaciones.php?cod_rol='+document.form.rol.value;
	
	if(form.checkValidity()){

			debugger;
	
	        AjaxConsulta('roles_aplicaciones1.php', {rol:$('#rol').val()}, 'contenedor');	
	}
	//document.form.action='roles_aplicaciones.php';
	
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

<form name=form id=form action="" method="post" onsubmit="return false;">
<div class="row">
<div class ="col-md-12">
<i><h3><?php ECHO htmlentities('ACCESO A PROYECTOS');?></h3></i>
</div>
</div>

<div class="row">
<div class="col-md-2"></div>
<div class="col-md-2">
	<label><?php echo htmlentities('Seleccione del Proyecto');?></label>
	<input type=hidden name=op id=op>
</div>
<div class="col-md-6">
	
	<select name=rol id=rol required class="form-control">
	<option value=''>-Seleccione-</option>
	<?php
	$query="select * from rol where id not in (1,8) order by nombre";
	$equery=$dbmy->Execute($query);
	$fquery=$equery->RecordCount();
	for ($i=0;$i<$fquery;$i++){
	
		$codigo=$equery->fields['id'];
		$nombre=$equery->fields['nombre'];
	
		if($cod_rol==$codigo)
		{
			echo "
			<option value='$codigo' selected>".utf8_encode($nombre)."</option>
			";
		}
		else
		{
			echo "
			<option value='$codigo'>".utf8_encode($nombre)."</option>
			";
		}
		
		
		$equery->MoveNext();
	}
	?>
	
	</select>
	
	</div>
<div class="col-md-2"></div>
</div>
<div class ="row">	
<div  class="col-xs-12 col-md-12">
<button type=submit name=bt1 id=bt1 value='Consultar' title='De clic para Consultar' onclick='consultar();' class="btn btn-primary color_botton1"><i class="fa fa-search" aria-hidden="true" style="font-size: 18px;"></i> &nbsp; Consultar </button>
</div>
</div>





<?php
if($cod_rol!='')
{
?>

	<div class ="row">	
	<div  class="col-xs-12 col-md-12">
	<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Buscar por nombre.." class="form-control">
	</div>

	<div  class="col-xs-12 col-md-12">
	<table  id="myTable" class="table-responsive" WIDTH=100% border=1 cellspacing=0 cellspading=0>
		<tr class="header">
			<th align=center >#</th>
			<th align=center>AREA</th>
			<th align=center>OP</th>
		</tr>
	
	<?php

	$q1="select id,nombre from aplicaciones where id in (11,12,13,14,15,16,17,18,19,20) order by orden ";
	$eq1=$dbmy->Execute($q1);
	$fq1=$eq1->RecordCount();

	for ($i=0;$i<$fq1;$i++){
		
		$j=$i+1;	
		$codigo_b=$eq1->fields['id'];
		$nombre_b=$eq1->fields['nombre'];
		
		$q="select * from rol_aplicaciones  where cod_rol=$cod_rol and cod_aplicacion=$codigo_b";
		$eq=$dbmy->Execute($q);
		$fq=$eq->RecordCount();
	?>

	<tr>
		<td align=center><?php  echo $j;?></td>
		<td ><?php echo $nombre_b;?></td>
		<?php
		if($fq==0)
		{
		?>
			<td>
			<input type='checkbox' name='ck<?php echo $j;?>' id='ck<?php echo $j;?>' value='<?php echo $codigo_b;?>' onclick="actualizar('ck<?php echo $j;?>',<?php echo $codigo_b;?>,<?php echo $cod_rol;?>);">
			</td>
		<?php
		}
		else
		{
		?>
			<td>
			<input type='checkbox' name='ck<?php echo $j;?>' id='ck<?php echo $j;?>' value='<?php echo $codigo_b;?>' onclick="actualizar('ck<?php echo $j;?>',<?php echo $codigo_b;?>,<?php echo $cod_rol;?>);" checked>
			</td>
		<?php
		}
		?>	
	</tr>
	<?php	
		$eq1->MoveNext();
	}	
	?>
		<tr>
			<th colspan=3><?php echo $j.' Registros existentes'?></th>
		</tr>
</table>
</div>
</div>
	
<?php
}
?>	
	
	
</form>

