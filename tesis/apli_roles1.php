<?php
include ("conexion.php");
include ("estilo.css");

$cod_usu='';
$cod_usu=$_REQUEST['rol'];


?>

<script>
function restablecer()
{
	AjaxConsulta('apli_roles1.php', {}, 'contenedor');	
}
function actualizar(nombre,cod_usuario,cod_rol)
{
	if(document.getElementById(nombre).checked==false)
	{
		//ifr1.location.href="apli_roles_l.php?op=E&cod_rol="+cod_rol+"&cod_usuario="+cod_usuario;
		AjaxConsulta('apli_roles1_l.php', {op:"E" , cod_rol:cod_rol , cod_usuario:cod_usuario}, 'contenedor');	
	}
	else
	{
		//ifr1.location.href="apli_roles_l.php?op=I&cod_rol="+cod_rol+"&cod_usuario="+cod_usuario;
		AjaxConsulta('apli_roles1_l.php', {op:"I" , cod_rol:cod_rol , cod_usuario:cod_usuario}, 'contenedor');	
	}
}

function consultar()
{
	//location.href='roles_aplicaciones.php?cod_rol='+document.form.rol.value;
	if(form.checkValidity()){

			debugger;
	
	        AjaxConsulta('apli_roles1.php', {rol:$('#rol').val()}, 'contenedor');	
	}	
	
	//document.form.action='apli_roles.php';
	
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
<i><h3><?php ECHO htmlentities('ASOCIACIÓN PROYECTOS AREAS');?></h3></i>
</div>
</div>
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-3">
<label><?php echo htmlentities('Seleccione del Usuario');?></label>
	<input type=hidden name=op id=op>
</div>
<div class="col-md-5">
	
	<select name=rol id=rol required class="form-control">
	<option value=''>-Seleccione-</option>
	<?php
	$query="select * from usuarios where id not in (1) and estado=1 order by nombre";
	$equery=$dbmy->Execute($query);
	$fquery=$equery->RecordCount();
	for ($i=0;$i<$fquery;$i++){
	
		$codigo=$equery->fields['id'];
		$nombre=$equery->fields['nombre'];
		$apellido=$equery->fields['apellido'];
		$datos=$nombre.' '.$apellido;
	
		if($cod_usu==$codigo)
		{
			echo "
			<option value='$codigo' selected>".utf8_encode($datos)."</option>
			";
		}
		else
		{
			echo "
			<option value='$codigo'>".utf8_encode($datos)."</option>
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
<button type=submit name=bt1 id=bt1 value='Consultar' title='De clic para Consultar' onclick='consultar();' class="btn btn-primary color_botton1"><i class="fa fa-search"  aria-hidden="true" style="font-size: 18px;"></i> &nbsp; Consultar</button>
</div>
</div>


<?php
if($cod_usu!='')
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
			<th align=center>NOMBRE DEL ROL</th>
			<th align=center>OP</th>
		</tr>	

	<?php

	$q1="select id,nombre from rol WHERE id not in (1) order by nombre ";
	$eq1=$dbmy->Execute($q1);
	$fq1=$eq1->RecordCount();

	for ($i=0;$i<$fq1;$i++){
		
		$j=$i+1;	
		$codigo_b=$eq1->fields['id'];
		$nombre_b=$eq1->fields['nombre'];
		
		$q="select * from rol_usuarios  where cod_rol=$codigo_b and cod_usuario=$cod_usu";
		$eq=$dbmy->Execute($q);
		$fq=$eq->RecordCount();
	?>
	<tr class="active">
		<td ><?php  echo $j;?></td>
		<td  ><?php echo $nombre_b;?></td>
		<?php
		if($fq==0)
		{
		?>
			<td >
			<input type='checkbox' name='ck<?php echo $j;?>' id='ck<?php echo $j;?>' value='<?php echo $codigo_b;?>' onclick="actualizar('ck<?php echo $j;?>',<?php echo $cod_usu;?>,<?php echo $codigo_b;?>);">
			</td>
		<?php
		}
		else
		{
		?>
			<td >
			<input type='checkbox' name='ck<?php echo $j;?>' id='ck<?php echo $j;?>' value='<?php echo $codigo_b;?>' onclick="actualizar('ck<?php echo $j;?>',<?php echo $cod_usu;?>,<?php echo $codigo_b;?>);" checked>
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


