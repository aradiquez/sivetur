<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Lista de Usuarios</div>
<? 
	if(count($Usuarios)>0)
 	{
?>
	<table class="table">
	<tr>
	    <th>Nombre</th>
	    <th>Usuario</th>
	    <th>Perfil</th>
	    <th>Estado</th>
	    <th>Ultimo Acceso</th>
	    <th>Acciones</th>
	</tr>
	
	<? $i=1;
	foreach($Usuarios as $row){
	
	switch ($row['Usuario']['perfil']) {
		case "0":
			$perfil="Administrador";
			break;
		case "1":
			$perfil="Mantenimiento";
			break;
		case "2":
			$perfil="Digitador";
			break;
		case "3":
			$perfil="Editador";
			break;
	}
	?>
	<tr <?=($i%2==0)? "class='altRow'": ''?>>
	  
	    <td><?=$row['Usuario']['nombre']?></td>
	    <td class="estados"><?=$row['Usuario']['usuario']?></td>
	    <td class="estados"><?=$perfil?></td>
	    
	    <td class="estados"><?=$row['Usuario']['estado']=='A'? 'Activo':'Inactivo';?></td>
	     <td class="estados"><?=$funciones->fnCambiaf_normal($row['Usuario']['ultimo_ingreso']).'&nbsp;&nbsp;'.$row['Usuario']['hora']?></td>
	 
	    <td class="actions">
		<?//=$html->link('Ver','/usuarios/view/'.$row['Usuario']['id'])?>
	    <?=$html->link('Editar','/usuarios/edit/'.$row['Usuario']['id'], array('class'=>"btn btn-warning", 'role'=>"button"))?>
	    <?=$html->link('Eliminar',"/usuarios/delete/{$row['Usuario']['id']}",array('class'=>"btn btn-danger", 'role'=>"button"),'Esta seguro de eliminar este usuario?')?>
	                     
	    </td>
	</tr>
	<? $i++; }//endforeach;?>
	</table>
 <?
	}#end count
?>
</div>
<p><?=$html->link('Nuevo usuario','/usuarios/add', array('class'=>"btn btn-primary", 'role'=>"button"))?></p>
