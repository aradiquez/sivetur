<div class="cajainfo">
	<h3>Instrucciones:</h3>
	<ul>
		<li>Con estas opciones podr&aacute;s agregar un nuevo patrocinador a la lista, editar la informaci&oacute;n de los ya registrados, o bien eliminar uno de ellas.</li>
	</ul>
</div>
<?
echo $paginator->counter(array(
'format' => __('Pagina %page% de  %pages%, mostrando %current% registros de %count% en total, iniciando en el registro %start%, finalizando en %end%.', true)));
 

	if(count($Patrocinadores)>0)
 	{
?>
<h2><?php __('Lista de Patrocinadores');?></h2>
<table cellpadding="0" cellspacing="0">
<thead>
<tr>
    <th><?php echo $paginator->sort('Nombre','name');?></th>
    <th><?php echo $paginator->sort('Estado','status');?></th>
    <th>Fotos</th>
    <th>Acciones</th>
</tr>
    </thead>
<tbody>
<? $i=1;

//pr($Patrocinadores);
   foreach($Patrocinadores as $row)
   {
?>
<tr <?=($i%2==0)? "class='altRow'": ''?>>
    <td><?php echo $row['Patrocinadore']['name'];?></td>
    <td class="estados"><?=$row['Patrocinadore']['status']=='A'? 'Activa':'Inactiva'?></td>
    <td class="actions"><?=$html->link(__('Adminitrar',true),array('controller'=>'photos','action' => 'index/',$row['Patrocinadore']['id'],'5'));?></td>
    
    <td class="actions">
	<?php echo $html->link(__('Editar', true), array('action'=>'edit', $row['Patrocinadore']['id'])); ?>
	<?php echo $html->link(__('Eliminar', true), array('action'=>'delete', $row['Patrocinadore']['id']), null, sprintf(__('Esta seguro de eliminar este registro # %s?', true), $row['Patrocinadore']['id']));?>
  
    </td>
</tr>
<? $i++; }#endforeach;?>
</tbody>
</table>
<?
	}#end count
	
	//$top=count($Topicos);
	$top=2;
	if($top > 0)
	{
?>
<ul class="actions">
    <li><?=$html->link('Agregar nuevo Patrocinador','add')?></li>
</ul>
<? 	} ?>