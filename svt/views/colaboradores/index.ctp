<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Lista de Colaboradores</div>
<?  if(count($Colaboradores)>0) { ?>
	<table class="table">
	<tr>
	    <th>Nombre</th>
	    <th>Estado</th>
	    <th>Acciones</th>
	</tr>
	
	<? foreach($Colaboradores as $row){ 	?>
	<tr>
	    <td><?=$row['Colaboradore']['nombre']?></td>
	    <td class="estados"><?=$row['Colaboradore']['estado']=='A'? 'Activo':'Inactivo';?></td>
	    <td class="actions">
	    <?=$html->link('Editar','/colaboradores/edit/'.$row['Colaboradore']['id'], array('class'=>"btn btn-warning", 'role'=>"button"))?>
	    <?=$html->link('Eliminar',"/colaboradores/delete/{$row['Colaboradore']['id']}",array('class'=>"btn btn-danger", 'role'=>"button"),'Esta seguro de eliminar este registro?')?>
	    <?=$html->link('Agregar fotos','/photos/index/'.$row['Colaboradore']['id']."/4", array('class'=>"btn btn-primary", 'role'=>"button"))?>                 
	    </td>
	</tr>
	<? }//endforeach;?>
	</table>
 <?
	}#end count
?>
</div>
<p><?=$html->link('Nuevo Colaborador','/colaboradores/add', array('class'=>"btn btn-primary", 'role'=>"button"))?></p>
