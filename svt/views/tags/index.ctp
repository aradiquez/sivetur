<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Lista de Tags</div>
<?  if(count($Tags)>0) { ?>
	<table class="table">
	<tr>
	    <th>Nombre</th>
	    <th>Estado</th>
	    <th>Acciones</th>
	</tr>
	
	<? foreach($Tags as $row){ 	?>
	<tr>
	    <td><?=$row['Tag']['name']?></td>
	    <td class="estados"><?=$row['Tag']['estado']=='A'? 'Activo':'Inactivo';?></td>
	    <td class="actions">
	    <?=$html->link('Editar','/tags/edit/'.$row['Tag']['id'], array('class'=>"btn btn-warning", 'role'=>"button"))?>
	    <?=$html->link('Eliminar',"/tags/delete/{$row['Tag']['id']}",array('class'=>"btn btn-danger", 'role'=>"button"),'Esta seguro de eliminar este registro?')?>
	                     
	    </td>
	</tr>
	<? }//endforeach;?>
	</table>
 <?
	}#end count
?>
</div>
<p><?=$html->link('Nuevo tag','/tags/add', array('class'=>"btn btn-primary", 'role'=>"button"))?></p>
