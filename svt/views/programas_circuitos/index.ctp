<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Lista de Programas y Circuitos</div> 

<?  if(count($ProgramasCircuitos)>0) { ?>
	<table class="table">
		<thead>
			<tr>
			    <th>Nombre</th>
			    <th>Estado</th>
			    <th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			<?=$tree->show('ProgramasCircuito/programas_circuitos/name/estado/id', $ProgramasCircuitos); ?>
		</tbody>
	</table>
<? } ?>
</div>
<p><?=$html->link('Nuevo programa o circuito','/programas_circuitos/add', array('class'=>"btn btn-primary", 'role'=>"button"))?></p>
