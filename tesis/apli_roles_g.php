<?php
include ("../conexion.php");

$cod_usu='';
$cod_usu=$_REQUEST['rol'];


?>
<link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
<link href="bootstrap/css/simple-sidebar.css" rel="stylesheet" type="text/css"/>
<link href="css/simple-sidebar.css" rel="stylesheet">
<script>
function restablecer()
{
	AjaxConsulta('apli_roles.php', {}, 'contenedor');	
}
function actualizar(nombre,cod_usuario,cod_rol)
{
	if(document.getElementById(nombre).checked==false)
	{
		//ifr1.location.href="apli_roles_l.php?op=E&cod_rol="+cod_rol+"&cod_usuario="+cod_usuario;
		AjaxConsulta('apli_roles_l.php', {op:"E" , cod_rol:cod_rol , cod_usuario:cod_usuario}, 'contenedor');	
	}
	else
	{
		//ifr1.location.href="apli_roles_l.php?op=I&cod_rol="+cod_rol+"&cod_usuario="+cod_usuario;
		AjaxConsulta('apli_roles_l.php', {op:"I" , cod_rol:cod_rol , cod_usuario:cod_usuario}, 'contenedor');	
	}
}

function consultar()
{
	//location.href='roles_aplicaciones.php?cod_rol='+document.form.rol.value;
	if(form.checkValidity()){

			debugger;
	
	        AjaxConsulta('apli_roles.php', {rol:$('#rol').val()}, 'contenedor');	
	}	
	
	//document.form.action='apli_roles.php';
	
}

</script>

<?php // JQuery.TableSorter paera adornar y ordenar los campos de las tablas?>



	<!-- Demo stuff -->
	<link rel="stylesheet" href="../tablesorter/css/jq.css">
	<link href="../tablesorter/css/prettify.css" rel="stylesheet">
	<script src="../tablesorter/js/prettify.js"></script>
	<script src="../tablesorter/js/docs.js"></script>

	<!-- Tablesorter: required -->
	<link rel="stylesheet" href="../tablesorter/css/theme.booststrap.css">
	<script src="../tablesorter/js/jquery.tablesorter.js"></script>

	<!-- Tablesorter: optional -->
	<link rel="stylesheet" href="../tablesorter/addons/pager/jquery.tablesorter.pager.css">
	<script src="../tablesorter/addons/pager/jquery.tablesorter.pager.js"></script>
	<script src="../tablesorter/js/jquery.tablesorter.widgets.js"></script>

	<script id="js">$(function(){

	// define pager options
	var pagerOptions = {
		// target the pager markup - see the HTML block below
		container: $(".pager"),
		// output string - default is '{page}/{totalPages}'; possible variables: {page}, {totalPages}, {startRow}, {endRow} and {totalRows}
		output: '{startRow} - {endRow} / {filteredRows} ({totalRows})',
		// if true, the table will remain the same height no matter how many records are displayed. The space is made up by an empty
		// table row set to a height to compensate; default is false
		fixedHeight: true,
		// remove rows from the table to speed up the sort of large tables.
		// setting this to false, only hides the non-visible rows; needed if you plan to add/remove rows with the pager enabled.
		removeRows: false,
		// go to page selector - select dropdown that sets the current page
		cssGoto: '.gotoPage'
	};

	// Initialize tablesorter
	// ***********************
	$("#uu")
		.tablesorter({
			theme: 'dropbox',
			headerTemplate : '{content} {icon}', // new in v2.7. Needed to add the bootstrap icon!
			widthFixed: true,
			widgets: ['zebra', 'filter']
		})

		// initialize the pager plugin
		// ****************************
		.tablesorterPager(pagerOptions);

		// Add two new rows using the "addRows" method
		// the "update" method doesn't work here because not all rows are
		// present in the table when the pager is applied ("removeRows" is false)
		// ***********************************************************************
		var r, $row, num = 50,
			row = '<tr><td>Student{i}</td><td>{m}</td><td>{g}</td><td>{r}</td><td>{r}</td><td>{r}</td><td>{r}</td></tr>' +
				'<tr><td>Student{j}</td><td>{m}</td><td>{g}</td><td>{r}</td><td>{r}</td><td>{r}</td><td>{r}</td></tr>';
		$('button:contains(Add)').click(function(){
			// add two rows of random data!
			r = row.replace(/\{[gijmr]\}/g, function(m){
				return {
					'{i}' : num + 1,
					'{j}' : num + 2,
					'{r}' : Math.round(Math.random() * 100),
					'{g}' : Math.random() > 0.5 ? 'male' : 'female',
					'{m}' : Math.random() > 0.5 ? 'Mathematics' : 'Languages'
				}[m];
			});
			num = num + 2;
			$row = $(r);
			$('#uu')
				.find('tbody').append($row)
				.trigger('addRows', [$row]);
			return false;
		});

		// Delete a row
		// *************
		$('#uu').delegate('button.remove', 'click' ,function(){
			var t = $('table');
			// disabling the pager will restore all table rows
			t.trigger('disable.pager');
			// remove chosen row
			$(this).closest('tr').remove();
			// restore pager
			t.trigger('enable.pager');
		});

		// Destroy pager / Restore pager
		// **************
		$('button:contains(Destroy)').click(function(){
			// Exterminate, annhilate, destroy! http://www.youtube.com/watch?v=LOqn8FxuyFs
			var $t = $(this);
			if (/Destroy/.test( $t.text() )){
				$('#uu').trigger('destroy.pager');
				$t.text('Restore Pager');
			} else {
				$('#uu').tablesorterPager(pagerOptions);
				$t.text('Destroy Pager');
			}
			return false;
		});

		
		// Disable / Enable
		// **************
		$('.toggle').click(function(){
			var mode = /Disable/.test( $(this).text() );
			$('#uu').trigger( (mode ? 'disable' : 'enable') + '.pager');
			$(this).text( (mode ? 'Enable' : 'Disable') + 'Pager');
			return false;
		});
		$('#uu').bind('pagerChange', function(){
			// pager automatically enables when table is sorted.
			$('.toggle').text('Disable');
		});

});</script>
	
<form name=form id=form action="" method="post" onsubmit="return false;">
<br>
<p align=center CLASS=subtitulo_catalogo1>Asociaci&oacute;n aplicaciones a roles</p>
<BR>

<center>
<div class="row">
<div class="col-md-4"></div>
<div class="col-md-4">
	<label><?php echo htmlentities('Seleccione del rol');?></label>
	<input type=hidden name=op id=op>
	<select name=rol id=rol required class="form-control">
	<option value=''>-Seleccione-</option>
	<?php
	$query="select * from clientes where estado=1 order by nombres";
	$equery=$dbmy->Execute($query);
	$fquery=$equery->RecordCount();
	for ($i=0;$i<$fquery;$i++){
	
		$codigo=$equery->fields['id_cliente'];
		$nombre=$equery->fields['nombres'];
		$apellido=$equery->fields['apellidos'];
		$datos=$nombre.' '.$apellido;
	
		if($cod_usu==$codigo)
		{
			echo "
			<option value='$codigo' selected>$datos</option>
			";
		}
		else
		{
			echo "
			<option value='$codigo'>$datos</option>
			";
		}
		
		
		$equery->MoveNext();
	}
	?>
	
	
	</select>
	
	
	<input type=submit name=bt1 id=bt1 value='Consultar' title='De clic para Consultar' onclick='consultar();' class="btn btn-primary">
	</div>
<div class="col-md-4"></div>
</center>


<?php
if($cod_usu!='')
{
?>
	<div id="main" class="col-xs-12 col-md-12">
		<div class="pager"></div>

	<table class="tablesorter table table-striped table-hover " name=uu id=uu >
		<thead>
			<tr>
			
				<th>#</th>
				<th>Nombre del Rol</th>
				<th>Op</th>
				
			</tr>
		</thead>
		
		<tbody>	

	<?php

	$q1="select id,nombre from rol order by nombre ";
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


	</tbody>
		

	<div class="pager">
		Page: <select class="gotoPage"></select>		<img src="../tablesorter/addons/pager/icons/first.png" class="first" alt="First" title="First page" />
		<img src="../tablesorter/addons/pager/icons/prev.png" class="prev" alt="Prev" title="Previous page" />
		<span class="pagedisplay"></span> <!-- this can be any element, including an input -->
		<img src="../tablesorter/addons/pager/icons/next.png" class="next" alt="Next" title="Next page" />
		<img src="../tablesorter/addons/pager/icons/last.png" class="last" alt="Last" title= "Last page" />
		<select class="pagesize">
			<option selected="selected" value="10">10</option>
			<option value="20">20</option>
			<option value="30">30</option>
			<option value="40">40</option>
		</select>
	</div>
	</div>
<?php
}
?>	
	
	
</form>

<script type="text/javascript">
_uacct = "UA-2189649-2";
urchinTracker();
</script>
<iframe name=ifr1 id=ifr1  width=100% frameborder="0" style="display:none">

