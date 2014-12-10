<?  if(count($OfertasActivas)>0) { ?>
<div class="panel panel-success">
  <!-- Default panel contents -->
  <div class="panel-heading">Ofertas Activas</div>
	<table class="table">
	<tr>
	    <th>Nombre</th>
	    <th>Fecha de Inicio</th>
      <th>Fecha de Fin</th>
      <th>Precio</th>
	    <th>Acciones</th>
	</tr>
	
	<? foreach($OfertasActivas as $row){ ?>
	<tr>
	    <td><?=$row['Oferta']['name']?></td>
	    <td class="estados"><?=$funciones->formatDate($row['Oferta']['start_date']);?></td>
      <td class="estados"><?=$funciones->formatDate($row['Oferta']['end_date']);?></td>
      <td class="estados"><?=number_format($row['Oferta']['precio'], 0);?></td>
	    <td class="actions">
	    <?=$html->link('Editar','/ofertas/edit/'.$row['Oferta']['id'], array('class'=>"btn btn-warning", 'role'=>"button"))?>
	    <?=$html->link('Eliminar',"/ofertas/delete/{$row['Oferta']['id']}",array('class'=>"btn btn-danger", 'role'=>"button"),'Esta seguro de eliminar este registro?')?>
	    <?=$html->link('Agregar fotos','/photos/index/'.$row['Oferta']['id']."/3", array('class'=>"btn btn-primary", 'role'=>"button"))?>                 
	    </td>
	</tr>
	<? }//endforeach;?>
	</table>
</div>
<? }#end count ?>



<? if(count($OfertasInactivas)>0) { ?>
<div class="panel panel-danger">
  <!-- Default panel contents -->
  <div class="panel-heading">Ofertas Inactivas</div>
	<table class="table">
	<tr>
	    <th>Nombre</th>
	    <th>Fecha de Inicio</th>
      <th>Fecha de Fin</th>
      <th>Precio</th>
	    <th>Acciones</th>
	</tr>
	
	<? foreach($OfertasInactivas as $row){ ?>
	<tr>
	    <td><?=$row['Oferta']['name']?></td>
	    <td class="estados"><?=$funciones->formatDate($row['Oferta']['start_date']);?></td>
      <td class="estados"><?=$funciones->formatDate($row['Oferta']['end_date']);?></td>
      <td class="estados"><?=number_format($row['Oferta']['precio'], 0);?></td>
	    <td class="actions">
	    <?=$html->link('Editar','/ofertas/edit/'.$row['Oferta']['id'], array('class'=>"btn btn-warning", 'role'=>"button"))?>
	    <?=$html->link('Eliminar',"/ofertas/delete/{$row['Oferta']['id']}",array('class'=>"btn btn-danger", 'role'=>"button"),'Esta seguro de eliminar este registro?')?>
	    <?=$html->link('Agregar fotos','/photos/index/'.$row['Oferta']['id']."/3", array('class'=>"btn btn-primary", 'role'=>"button"))?>                                  
	    </td>
	</tr>
	<? }//endforeach;?>
	</table>
</div>  
<? }#end count ?>
<p><?=$html->link('Nuevo oferta','/ofertas/add', array('class'=>"btn btn-primary", 'role'=>"button"))?></p>
