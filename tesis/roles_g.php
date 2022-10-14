<?php
include ("../conexion.php");

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
   <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>

    <link href="bootstrap/css/simple-sidebar.css" rel="stylesheet" type="text/css"/>
    <link href="css/simple-sidebar.css" rel="stylesheet">
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

<form name=form id=form  action="" method="post" onsubmit="return false;">
<br>
<p align=center CLASS=subtitulo_catalogo1><?php ECHO htmlentities('ROLES DE USUARIO');?></p>
<BR>

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
	 <div class ="col-mod-4"></div>
	 <div class ="col-mod-4">
	 <center>
		<input type=button name=bt2 id=bt2 value='Restablecer' title='De clic para Restablecer' onclick='restablecer();' class="btn btn-primary">
		<input type=submit name=bt3 id=bt3 value='Modificar' title='De clic para Modificar' onclick='modificar();' class="btn btn-primary">
		<input type=submit name=bt4 id=bt4 value='Eliminar' title='De clic para Eliminar' onclick='eliminar();' class="btn btn-primary">
		</center>
		</div>
		<div class ="col-mod-4"></div>
</div>
<?php
}
else{
?>
     <div class ="row">
	 <div class ="col-mod-4"></div>
	 <div class ="col-mod-4">
	 <center>
		<input type=submit name=bt1 id=bt1 value='Insertar' title='De clic para Insertar' onclick='insertar();' class="btn btn-primary">
		<center>
		</div>
		<div class ="col-mod-4"></div>
</div>
<?php
}
?>
<br>
	
<div id="main" class="col-xs-12 col-md-12">
	<div class="pager"></div>

<table class="tablesorter table table-striped table-hover " name=uu id=uu width=98%>
	<thead>
		<tr>
			<th>#</th>
			<th>Nombre</th>
			<th>Op</th>
		</tr>
	</thead>
	
	<tbody>	
	
<?php

$q="select * from rol order by nombre";


$eq=$dbmy->Execute($q);
$fq=$eq->RecordCount();

for ($i=0;$i<$fq;$i++){
	
	$j=$i+1;	
	$codigo_b=$eq->fields['id'];
	$nombre_b=$eq->fields['nombre'];
	
	
?>

<tr class="active">
	<td><?php  echo $j;?></td>
	<td><?php echo $nombre_b;?></td>
	<td>
	<input type=button name=bt6 id=bt6 value='Ver' title='De clic para editar' class="btn btn-primary" onclick='ver(<?php echo $codigo_b;?>)'>
	</td>
</tr>
<?php	
	$eq->MoveNext();
}	
?>


</tbody>
	

<div class="pager">

	Page: <select class="gotoPage"></select>		
	<img src="../tablesorter/addons/pager/icons/first.png" class="first" alt="First" title="First page" />
	<img src="../tablesorter/addons/pager/icons/prev.png" class="prev" alt="Prev" title="Previous page" />
	<span class="pagedisplay"></span> <!-- this can be any element, including an input -->
	<img src="../tablesorter/addons/pager/icons/next.png" class="next" alt="Next" title="Next page" />
	<img src="../tablesorter/addons/pager/icons/last.png" class="last" alt="Last" title= "Last page" />
	<select class="pagesize">
		<option selected="selected" value="10" >10</option>
		<option value="20">20</option>
		<option value="30">30</option>
		<option value="40">40</option>
	</select>
</div>
</div>
</form>
<script type="text/javascript">
_uacct = "UA-2189649-2";
urchinTracker();
</script>

